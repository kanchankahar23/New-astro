@extends('website.dashboard_master')
@section('title','Chat')
@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-0 user-dashboard-info-box">
                <section class="chit-chat">
                    <div class="container_main d-flex ">
                        <div class="bg-white leftContainer ">
                            <div class="asideLeft ">
                                <div class="top ">
                                    <!-- <div class="topLeft">
                      <h3>Recent</h3>
                      <p>Chat from your friends 😘</p>
                  </div> -->
                                    <!-- <div class="topRight ">
                      <i class="fa-solid fa-border-all "></i>
                  </div> -->
                                </div>
                                <!-- <div class="image-crousel">
                  <div class="images"><img src="images/crsl1.jpg" alt="">
                      <section class="prfl_name">
                          <div class="name">John Deo</div>
                          <div class="online"></div>
                      </section>
                  </div>
                  <div class="images"><img src="images/crsl2.jpg" alt=""></div>
                  <div class="images"><img src="images/crsl3.jpg" alt=""></div>
                  <div class="images"><img src="images/crsl3.jpg" alt=""></div>
                  <div class="images"><img src="images/crsl3.jpg" alt=""></div>
                  <div class="images"><img src="images/crsl1.jpg" alt=""></div>
              </div> -->
                                <section class="scrollSection">

                                    <div class="media">
                                        <div class="searchbar ">
                                            <div class="left">
                                                <h3>Chat</h3>
                                                <p>Start New Conversation</p>
                                            </div>
                                            <div class="right">
                                                <i
                                                    class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="theme-tab">
                                        <!-- <section class="trippleC ">
                          <div class="call">
                              <div class="icon">
                                  <svg data-v-4d521fc4="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-message-square feather__content">
                                      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                  </svg>
                              </div>
                              <div class="para">
                                  <h6>Call</h6>
                              </div>
                          </div>
                          <div class="call">
                              <div class="icon ">
                                  <svg data-v-4d521fc4="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-phone feather__content">
                                      <path
                                          d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                      </path>
                                  </svg>
                              </div>
                              <div class="para">
                                  <h6>Chat</h6>
                              </div>
                          </div>
                          <div class="call">
                              <div class="icon d-flex align-items-center">
                                  <svg data-v-4d521fc4="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-users feather__content">
                                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                      <circle cx="9" cy="7" r="4"></circle>
                                      <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                  </svg>
                              </div>
                              <div class="para">
                                  <h6>Contact</h6>
                              </div>
                          </div>
                      </section> -->
                                        <!-- <section class="group_sec">
                          <div class="direct">
                              <h6>Direct
                              </h6>
                          </div>
                          <div class="direct ">
                              <h6>Group</h6>
                          </div>
                      </section> -->
                                        <section class="All_chats">
                                            @foreach($users as $user)
                                            <div class="chats"
                                                onclick="openChat(this,'{{ $user->id }}')">
                                                <div
                                                    class="prfl_pic_name_parent">
                                                    <div id="logo"
                                                        class="prfl-pic">
                                                        <span></span><img
                                                            src="{{ $user->avtar ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                                            alt="">
                                                        <div class="online">
                                                        </div>
                                                    </div>
                                                    <div class="name">
                                                        <h6>{{
                                                            ucwords($user->name
                                                            ?? '') }}</h6>
                                                        <p id="blue">Hi, i am
                                                            josephin. How are
                                                            you..</p>
                                                    </div>
                                                </div>
                                                <div class="date">
                                                    <!-- <svg data-testid="DeleteIcon"></svg> -->
                                                    <span><i
                                                            class="fa-solid fa-thumbtack"></i></span>


                                                    <!-- <i class="fa-solid fa-thumbtack"></i> -->
                                                    <p>22/10/19</p>
                                                    <h6
                                                        class="msgStts text-success ">
                                                        Seen</h6>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- <div class="Add_contact_parent">
                                                <div class="Add_contact ">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div> -->
                                        </section>
                                    </div>

                                </section>

                            </div>
                        </div>
                        <div class="asideRight bg-#eff7fe">
                            <div class="header d-flex " id="profile-section">
                                <div class="profile_sec">
                                    <div class="left_sec d-flex">
                                        <div id="logo" class="prfl-pic">
                                            <span></span>
                                            <img id="userImage"
                                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                                alt="">
                                            <div class="online"></div>
                                        </div>
                                        <div class="name">
                                            <h6 id="username"></h6>
                                            <h6 id="blue_circle"
                                                class="msgStts">
                                                <span>Active</span>
                                            </h6>
                                        </div>
                                        <input type="hidden" id="chat-with"
                                            value="">
                                        <span class="verticle_line"></span>
                                        <div class="search d-flex">
                                            <div class="topRight ">
                                                <i
                                                    class="fa-solid fa-volume-high"></i>
                                            </div>
                                            <div class="topRight ">
                                                <i
                                                    class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right_sec">
                                        <div class="search d-flex">
                                            <div class="topRight ">
                                                <i
                                                    class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="topRight ">
                                                <i
                                                    class="fa-solid fa-video"></i>
                                            </div>
                                            <div class="topRight ">
                                                <i
                                                    class="fa-solid fa-border-all"></i>
                                            </div>
                                            <div class="top ">
                                                <i
                                                    class="fa-solid fa-ellipsis-vertical"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="mid personalChat" id="chatShow">
                                <div
                                    style="display: flex;justify-content: center;">
                                    <div>
                                        <h4>No Message Found</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="footer_parent" id="chatBox-display"
                                style="display: none;">

                                <div id="plus_button" class="plus_button">
                                    <div class="items ">
                                        <i class="fa-solid fa-image"></i>
                                        <h6>gallery</h6>
                                    </div>
                                    <div class="items">
                                        <i class="fa-solid fa-camera"></i>
                                        <h6>camera</h6>
                                    </div>

                                    <div>
                                        <input type="file" id="fileInput">
                                        <label style=" margin-bottom: 0;"
                                            class="items" for="fileInput"
                                            id="customButton">
                                            <i
                                                class="fa-solid fa-clipboard"></i>
                                            <h6 id="docs">document</h6>
                                        </label>

                                    </div>

                                    <div class="file-upload">

                                        <input type="file" id="fileInput"
                                            accept="image/*">
                                        <label class="items" for="fileInput"
                                            id="customButton"><i
                                                class="fa-solid fa-paperclip"></i>
                                            <h6>attach</h6>
                                        </label>

                                    </div>
                                </div>
                                <div class="footer d-flex">
                                    <div class="search d-flex">
                                        <div onclick="toggleGifs()"
                                            class="topLeft ">
                                            <i class="fa-solid fa-film"></i>
                                        </div>
                                        <div onclick="toggleImojies()"
                                            class="topLeft ">
                                            <i
                                                class="fa-regular fa-face-smile"></i>
                                        </div>
                                        <div id="toggle_button"
                                            class="topLeft ">
                                            <i class=" fa-solid fa-plus"></i>
                                        </div>
                                        <div class="top">
                                            <input id="message" type="text"
                                                placeholder="Write Your Message...">
                                        </div>
                                    </div>
                                    <div class="right d-flex">
                                        <div class="topLeft ">
                                            <i
                                                class="fa-solid fa-microphone"></i>
                                        </div>
                                        <div class="topLeft">
                                            <i class="fa-regular fa-paper-plane"
                                                onclick="sendMessage()"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js">
</script>

<script>
    // $(document).ready(function() {
    //     id = sessionStorage.getItem('astroChatId');
    //     if(id){
    //         openChat('',id);
    //     }
    // });
    var chat_active = null;

    function openChat(clickedChat,userId) {
        if (chat_active !== null) {
            chat_active.classList.remove('chat_active');

        }
        clickedChat.classList.add('chat_active');
        chat_active = clickedChat;

        getChat(userId);
        document.querySelector('.personalChat').id = 'chatShow'+userId;
        $('#chat-with').val(userId)

    }


    function getChat(userId){
        $(`.personalChat`).empty();
       document.querySelector('#chatBox-display').style.display="block";
        var data = {
            userId,
            _token:"{{ csrf_token() }}"
        }
       $.ajax({
            url:"{{ url('/get-chat') }}",
            type:'POST',
            data:data,
            success:(response)=>{
                var image = document.querySelector('#userImage');
                    image.src = response.user.avtar ?? "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                var userImage = response.user.avtar ?? "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                var name = document.querySelector('#username');
                    name.innerHTML = capitalize(response.user.name);
                var userName = capitalize(response.user.name);
        const messageImage = response.user.avtar ?? "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
        const currentUser = '{{Auth::user()->id}}';
        var chats = response.chats ?? [];
        chats.map((obj) => {
        // Create a Date object from the string
        let date = new Date(obj.created_at);
        // Format the date and time
        let formattedDate = date.toLocaleString('en-IN', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        });

    if (currentUser == obj.sender_id) {
        $(`#chatShow${userId}`).append(`
            <div class="own_message">
                <div class=" own_sec d-flex">
                    <div class="own">
                        <div class="namedate">
                            <h6 class="pt-1 ">{{ucwords(Auth::user()->name)}}</h6>
                            <section>${formattedDate}</section>
                        </div>
                        <p>${obj.message}</p>
                    </div>
                    <div id="own_logo" class="prfl-pic"><span></span><img
                            src="{{Auth::user()->avtar}}" alt="">
                    </div>
                </div>
            </div>
        `);
    } else {
        $(`#chatShow${userId}`).append(`
            <div class="message">
                <div class="d-flex">
                    <div id="logo" class="mr-4 prfl-pic"><span></span><img
                            src="${userImage}" alt="">
                    </div>
                    <div class="name">
                        <!-- You can add sender's name here if needed -->
                    </div>
                    <div class="own">
                        <div class="namedate d-flex">
                            <h6 class="pt-1 pr-4 ">${userName}</h6>
                            <section>${formattedDate}</section>
                        </div>
                        <p>${obj.message}</p>
                    </div>
                </div>
            </div>
        `);
    }
});
            },
            error:(error)=>{
                console.log(error);
            }
       })

    }

    function capitalize(string) {
        if (!string) return string;
        return string.charAt(0).toUpperCase() + string.slice(1);
    }


    $(document).ready(function() {
        $('#message').keypress(function(event) {
            if (event.which === 13) { // 13 is the Enter key
                sendMessage()
            }
        });
    });


    function sendMessage() {
            var chatWith = $('#chat-with').val();
            var message = document.querySelector('#message').value;
            var data = {
                reciverId: chatWith,
                chat: message,
                _token: "{{ csrf_token() }}"
            };

            // var messageHtml = `
            // <div class="own_message">
            //     <div class=" own_sec d-flex">
            //         <div class="own">
            //             <div class="namedate">
            //                 <h6 class="pt-1 ">Kapil Kumar Astro</h6>
            //                 <section>27 May 2024, 06:11 pm</section>
            //             </div>
            //             <p>${message}</p>
            //         </div>
            //         <div id="own_logo" class="prfl-pic"><span></span><img src="user_image/1237746721_1713431465.png" alt="">
            //         </div>
            //     </div>
            // </div>`;

            $.ajax({
                url: "{{ url('/save-chat') }}",
                type: "POST",
                data: data,
                success: function(response) {
                    console.log(response);
                    document.querySelector('#message').value="";

                    // $('#chatShow').append(messageHtml);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        setTimeout(() => {
                        window.Echo.channel('chating').listen('ChatingEvent', (e) => {
                            console.log(e.message);
                            console.log(e.user);
                            if(e.user == "{{ Auth::user()->id}}"){
                                $(`.personalChat`).append(`<div class="own_message">
                                <div class=" own_sec d-flex">
                                    <div class="own">
                                        <div class="namedate">
                                            <h6 class="pt-1 ">{{ ucwords(Auth::user()->name ?? '') }}</h6>
                                            <section>${e.date}</section>
                                        </div>
                                        <p>${e.message}</p>
                                    </div>
                                    <div id="own_logo" class="prfl-pic"><span></span><img src="{{ Auth::user()->avtar ?? '' }}" alt="">
                                    </div>
                                </div>
                            </div>
                              `)
                        }
                        if(e.user != "{{ Auth::user()->id}}"){
                                $(`.personalChat`).append(`<div class="message">
                                <div class="d-flex">
                                    <div id="logo" class="mr-4 prfl-pic"><span></span><img
                                            src="${e.image}" alt="">
                                    </div>
                                    <div class="name">
                                        <!-- You can add sender's name here if needed -->
                                    </div>
                                    <div class="own">
                                        <div class="namedate d-flex">
                                            <h6 class="pt-1 pr-4 ">${e.name}</h6>
                                            <section>${e.date}</section>
                                        </div>
                                        <p>${e.message}</p>
                                    </div>
                                </div>
                            </div>`)
                        }
                      var chatContainer = document.querySelector('.personalChat');
                        chatContainer.scrollTop = chatContainer.scrollHeight;
                        });
                    }, 200);

        // setTimeout(() => {
        //                 window.Echo.private('chating.user.{{ Auth::id() }}').listen('PrivateChatEvent', (e) => {
        //                     console.log(e.message);
        //                     $(`#chatShow6`).append(`<div class="own_message">
        //                         <div class=" own_sec d-flex">
        //                             <div class="own">
        //                                 <div class="namedate">
        //                                     <h6 class="pt-1 ">{{ Auth::user()->name ?? '' }}</h6>
        //                                     <section>27 May 2024, 06:11 pm</section>
        //                                 </div>
        //                                 <p>${e.message}</p>
        //                             </div>
        //                             <div id="own_logo" class="prfl-pic"><span></span><img src="{{ Auth::user()->avtar ?? '' }}" alt="">
        //                             </div>
        //                         </div>
        //                     </div>
        //                       `)

        //                 });
        //             }, 200);


</script>
@endsection
