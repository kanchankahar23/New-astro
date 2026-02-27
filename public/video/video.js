    const socket = io('https://astro-buddy.in/');
    const roomId = "{{ $roomId }}";
    const userId = "{{ $sender }}";
    const remoteUserId = "{{ $receiver }}";

    let useFrontCamera = true;
    let localStream;
    let remoteDescriptionSet = false;
    const pendingCandidates = [];

    const peerConnection = new RTCPeerConnection({
        iceServers: [{ urls: 'stun:stun.l.google.com:19302' }]
    });

    async function getUserMediaStream() {
        const constraints = {
            video: appointmentType === 'video' ? { facingMode: useFrontCamera ? "user" : "environment" } : false,
            audio: true
        };
        return await navigator.mediaDevices.getUserMedia(constraints);
    }

    // async function joinRoom() {
    //     try {
    //         socket.emit('join-room', { roomId, userId });
    //         localStream = await getUserMediaStream();
    //         if (appointmentType === 'video') {
    //             document.getElementById('localVideo').srcObject = localStream;
    //         } else {
    //             document.getElementById('localVideo').style.display = 'none';
    //         }
    //         localStream.getTracks().forEach(track => {
    //             peerConnection.addTrack(track, localStream);
    //         });
    //     } catch (error) {
    //         console.error("❌ Failed to join room:", error);
    //     }
    // }
    async function joinRoom() {
        try {
            console.log("Joining room:", roomId, "for user:", userId);
            console.log("Appointment type:", appointmentType);
            socket.emit('join-room', { roomId, userId });
            const constraints = {
                video: appointmentType === 'video' ? { facingMode: useFrontCamera ? "user" : "environment" } : false,
                audio: true
            };
            localStream = await navigator.mediaDevices.getUserMedia(constraints);
            if (appointmentType === "video") {
                console.log("Appointment type:", 1);
                document.getElementById('localVideo').srcObject = localStream;
                document.getElementById('localUserImage').style.display = 'none';
            } else {
                console.log("Appointment type:", 2);
                document.getElementById('localVideo').srcObject = null;
                document.getElementById('localUserImage').style.display = 'block';
            }
            localStream.getTracks().forEach(track => {
                peerConnection.addTrack(track, localStream);
            });
        } catch (error) {
            console.error("❌ Failed to join room:", error);
        }
    }
// async function joinRoom() {
//     try {
//         console.log("Joining room:", roomId, "for user:", userId);
//         console.log("Appointment type:", appointmentType);

//         socket.emit('join-room', { roomId, userId });

//         const constraints = {
//             video: appointmentType === 'video' ? { facingMode: useFrontCamera ? "user" : "environment" } : false,
//             audio: true
//         };
//         console.log("Media constraints:", constraints);

//         localStream = await navigator.mediaDevices.getUserMedia(constraints);

//         const localVideo = document.getElementById('localVideo');
//         const localImage = document.getElementById('localUserImage');

//         if (appointmentType === 'video' && localStream.getVideoTracks().length > 0) {
//             console.log("Appointment type:", 1);
//             localVideo.srcObject = localStream;
//             localImage.style.display = 'none';
//         } else {
//             console.log("Appointment type:", 12);
//             localVideo.srcObject = null;
//             localImage.style.display = 'block';
//         }

//         localStream.getTracks().forEach(track => {
//             peerConnection.addTrack(track, localStream);
//         });

//     } catch (error) {
//         console.error("❌ Failed to join room:", error.name, error.message);
//     }
// }

    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            socket.emit('ice-candidate', {
                target: remoteUserId,
                candidate: event.candidate,
                userId
            });
        }
    };

    // peerConnection.ontrack = event => {
    //     const remoteVideo = document.getElementById('remoteVideo');
    //     if (remoteVideo.srcObject !== event.streams[0]) {
    //         remoteVideo.srcObject = event.streams[0];
    //     }
    //     startTimer();
    // };

        peerConnection.ontrack = event => {
            const stream = event.streams[0];
            const remoteVideo = document.getElementById('remoteVideo');
            const remoteImage = document.getElementById('remoteUserImage');

            remoteVideo.srcObject = stream;

            const hasVideoTrack = stream.getVideoTracks().length > 0;

            if (hasVideoTrack) {
                remoteVideo.style.display = 'block';
                remoteImage.style.display = 'none';
            } else {
                remoteVideo.style.display = null;
                remoteImage.style.display = 'block';
            }

            startTimer(); // Your existing logic
        };


    socket.on('offer', async ({ sdp, userId: remote }) => {
        try {
            await peerConnection.setRemoteDescription(new RTCSessionDescription(sdp));
            remoteDescriptionSet = true;
            const answer = await peerConnection.createAnswer();
            await peerConnection.setLocalDescription(answer);
            socket.emit('answer', {
                target: remote,
                answer: peerConnection.localDescription,
                userId
            });
            for (const candidate of pendingCandidates) {
                await peerConnection.addIceCandidate(new RTCIceCandidate(candidate));
            }
        } catch (err) {
            console.error("❌ Error handling offer:", err);
        }
    });

    socket.on('answer', async (data) => {
        try {
            const answer = data.answer;
            if (answer?.type === 'answer' && answer?.sdp) {
                if (peerConnection.signalingState === 'have-local-offer' && !peerConnection.remoteDescription) {
                    await peerConnection.setRemoteDescription(new RTCSessionDescription(answer));
                    remoteDescriptionSet = true;
                    for (const candidate of pendingCandidates) {
                        await peerConnection.addIceCandidate(new RTCIceCandidate(candidate));
                    }
                    pendingCandidates.length = 0;
                }
                console.log("joined call successfully");
            } else {
                console.error("❌ Invalid answer SDP:", answer);
            }
        } catch (error) {
            console.error("❌ Error setting remote answer:", error);
        }
    });

    socket.on('ice-candidate', async ({ candidate }) => {
        if (remoteDescriptionSet) {
            try {
                await peerConnection.addIceCandidate(new RTCIceCandidate(candidate));
                console.log("joined call successfully 11");
            } catch (err) {
                console.error("❌ Error adding ICE candidate:", err);
            }
        } else {
            pendingCandidates.push(candidate);
        }
    });

    async function makeCall() {
        if (!localStream) return console.error("❌ Local stream not ready");
        const offer = await peerConnection.createOffer();
        await peerConnection.setLocalDescription(offer);
        socket.emit('offer', {
            target: remoteUserId,
            sdp: offer,
            userId
        });
        document.getElementById('stream-controls').style.display = 'flex';
        document.getElementsByClassName('headLinks')[0].style.display = 'none';
    }

    window.onload = async () => {
        await joinRoom();
         await makeCall();
    };

    // function toggleCamera() {
    //     const videoTrack = localStream?.getVideoTracks()[0];
    //     const btn = document.getElementById('toggleCameraBtn');

    //     if (videoTrack) {
    //         videoTrack.enabled = !videoTrack.enabled;
    //         btn.style.backgroundColor = videoTrack.enabled ? 'white' : 'red';
    //         document.getElementById('localUserImage').style.display = 'block';
    //     }
    // }

    function toggleCamera() {
        const videoTrack = localStream?.getVideoTracks()[0];
        const btn = document.getElementById('toggleCameraBtn');

        if (videoTrack) {
            videoTrack.enabled = !videoTrack.enabled;

            // Update local UI
            btn.style.backgroundColor = videoTrack.enabled ? 'white' : 'red';
            document.getElementById('localUserImage').style.display = videoTrack.enabled ? 'none' : 'block';

            // Emit event to remote user
            socket.emit('offer', {
                sender: userId,
                receiver: remoteUserId,
                isCameraOn: videoTrack.enabled
            });
        }
    }

    //poorvi
    //  function toggleCamera() {
    //         const videoTrack = localStream.getVideoTracks()[0];
    //         const btn = document.getElementById('toggleCameraBtn');
    //         const cameraoff=document.getElementsByClassName('fa-video-slash')[0];
    //         const camera=document.getElementsByClassName('fa-video')[0];

    //         if (videoTrack) {
    //             videoTrack.enabled = !videoTrack.enabled;
    //             console.log("Camera", videoTrack.enabled ? "ON" : "OFF");
    //             if (videoTrack.enabled) {
    //                 // btn.style.backgroundColor = '#555555ad';
    //                 // btn.textContent = 'Camera ON';
    //                 camera.style.display="block";
    //                 cameraoff.style.display="none";
    //             } else {
    //                 // btn.style.backgroundColor = 'red';
    //                 // btn.textContent = 'Camera OFF';
    //                 camera.style.display="none";
    //                 cameraoff.style.display="block";
    //             }
    //         }
    //     }

        socket.on('offer', (data) => {
                const remoteVideo = document.getElementById('remoteVideo');
                const remoteImage = document.getElementById('remoteUserImage');

                if (data.isCameraOn) {
                    remoteVideo.style.display = 'block';
                    remoteImage.style.display = 'none';
                } else {
                    remoteVideo.style.display = 'none';
                    remoteImage.style.display = 'block';
                }
            });



    function toggleMic() {
        const audioTrack = localStream?.getAudioTracks()[0];
        const btn = document.getElementById('toggleAudioBtn');

        if (audioTrack) {
            audioTrack.enabled = !audioTrack.enabled;
            btn.style.backgroundColor = audioTrack.enabled ? 'white' : 'red';
        }
    }

            //poorvi
        // function toggleMic() {
        //     const audioTrack = localStream.getAudioTracks()[0];
        //     const btn = document.getElementById('toggleAudioBtn');
        //     const mute = document.getElementsByClassName('fa-microphone-slash')[0];
        //     const unmute = document.getElementsByClassName("fa-microphone")[0];
        //     if (audioTrack) {
        //         audioTrack.enabled = !audioTrack.enabled;
        //         console.log("Audio", audioTrack.enabled ? "ON" : "OFF");
        //         if (audioTrack.enabled) {
        //             // btn.style.backgroundColor = '#555555ad';
        //             unmute.style.display="block";
        //             mute.style.display="none";
        //         } else {
        //             // btn.style.backgroundColor = 'red';
        //             // btn.textContent = 'Camera OFF';
        //             unmute.style.display="none";
        //             mute.style.display="block";
        //         }
        //     }
        // }
        
    async function flipCamera() {
        if (appointmentType !== 'video') return;
        useFrontCamera = !useFrontCamera;
        const newStream = await getUserMediaStream();
        const videoSender = peerConnection.getSenders().find(s => s.track.kind === "video");
        const newVideoTrack = newStream.getVideoTracks()[0];
        if (videoSender && newVideoTrack) {
            await videoSender.replaceTrack(newVideoTrack);
        }
        localStream.getTracks().forEach(track => track.stop());
        localStream = newStream;
        document.getElementById('localVideo').srcObject = newStream;
    }
