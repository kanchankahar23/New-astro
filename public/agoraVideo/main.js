
const APP_ID = $("#appid").val();
const TOKEN = $("#token").val();
const CHANNEL = $("#channel").val();

const client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

let localTracks = [];
let remoteUsers = {};

// let joinAndDisplayLocalStream = async () => {

//     client.on('user-published', handleUserJoined)

//     client.on('user-left', handleUserLeft)

//     let UID = await client.join(APP_ID, CHANNEL, TOKEN, null)

//     localTracks = await AgoraRTC.createMicrophoneAndCameraTracks()

//     let player = `<div class="video-container" id="user-container-${UID}">
//                         <div class="video-player" id="user-${UID}"></div>
//                   </div>`
//     document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

//     localTracks[1].play(`user-${UID}`)

//     await client.publish([localTracks[0], localTracks[1]])
// }


let joinStream = async () => {
    //    alert("Your User ID is: " + userId);
    try {
        //   alert(userId);
        await joinAndDisplayLocalStream();
        appendCss();
    } catch (err) {
        // alert(err.message);
        //   alert('Link has been expired please contact host provider');
        return;
    }
};

let handleUserJoined = async (user, mediaType) => {
    remoteUsers[userId] = user;
    await client.subscribe(user, mediaType);

    if (mediaType === "video") {
        let player = document.getElementById(`user-container-${userId}`);
        if (player != null) {
            player.remove();
        }

        player = `<div class="video-container" id="user-container-${userId}">
                        <div class="video-player" id="user-${userId}"></div>
                 </div>`;
        document
            .getElementById("video-streams")
            .insertAdjacentHTML("beforeend", player);

        user.videoTrack.play(`user-${userId}`);
        appendCss();
    }

    if (mediaType === "audio") {
        user.audioTrack.play();
    }
};

let handleUserLeft = async (user) => {
    delete remoteUsers[userId];
    document.getElementById(`user-container-${userId}`).remove();
};

   let leaveAndRemoveLocalStream = async () => {
    for (let i = 0; localTracks.length > i; i++) {
        localTracks[i].stop();
        localTracks[i].close();
    }
    await client.leave();
    document.getElementById("join-btn").style.display = "none";
    document.getElementById("stream-controls").style.display = "none";
    document.getElementById("video-streams").innerHTML = "";
    $("#timer").val(0);
    if (userTypes === 'user') {
            document.getElementById('popup').style.display = 'flex';
        }
        // document.getElementById('dataTable').style.display = 'block'
    };


    let togglerecording = async (e) => {
        if ($("#rec_user").val() == 0) {
            await startRecording();
            e.target.innerText = "Rec on";
            e.target.style.backgroundColor = "cadetblue";
            $("#rec_user").val(1);
        } else {
            var meetingId = $("#user_meeting").val();
            if (meetingId == 0) {
                alert("Please Wait while we are fetching recording id....");
                return;
            }
            await stopRecordingFromResource();
            e.target.innerText = "Rec off";
            e.target.style.backgroundColor = "#EE4B2B";
            $("#rec_user").val(0);
        }
    };

    document.getElementById("join-btn").addEventListener("click", joinStream);
    document.getElementById("leave-btn").addEventListener("click", leaveAndRemoveLocalStream);


