<style>
    * {
        font-family: 'Avenir';
    }

    .bubbleWrapper {
        padding: 10px 10px;
        display: flex;
        justify-content: flex-end;
        flex-direction: column;
        align-self: flex-end;
        color: #fff;
    }

    .inlineContainer {
        display: inline-flex;
    }

    .inlineContainer.own {
        flex-direction: row-reverse;
    }

    .inlineIcon {
        width: 20px;
        object-fit: contain;
    }

    .ownBubble {
        min-width: 60px;
        max-width: 700px;
        width: 400px;
        padding: 14px 18px;
        margin: 6px 8px;
        background-color: #5b5377;
        border-radius: 16px 16px 0 16px;
        border: 1px solid #443f56;

    }

    .otherBubble {
        min-width: 60px;
        max-width: 700px;
        width: 400px;
        padding: 14px 18px;
        margin: 6px 8px;
        background-color: #6C8EA4;
        border-radius: 16px 16px 16px 0;
        border: 1px solid #54788e;

    }

    .own {
        align-self: flex-end;
    }

    .other {
        align-self: flex-start;
    }

    span.own,
    span.other {
        font-size: 14px;
        color: grey;
    }
</style>
<style>
    .drawer {
        overflow: hidden;
    }

    #remarkParent_ {
            {
            $tender->id
        }
    }

        {
        height: 400px;
        /* Or any other fixed height */
        overflow-y: auto;
        /* Ensure vertical scrollbar is enabled */
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">

<div class="modal-dialog modal-xl" style="max-height:calc(100vh - 56px);">
    <div class="modal-content" style="max-height:calc(100vh - 56px);">
        <div class="modal-header">
            <h6 class="modal-title">Name : {{ Auth::user()->name ?? '-' }} </h6>
            <button type="button" class="btn btn-primary" data-dismiss="modal">
                <i class="fa fa-close" style="font-size:24px color:#000!important;">&#10060;</i>
            </button>
        </div>
        <div class="modal-body" id="response" style="overflow-x:hidden; overflow-y: auto;height: 700px;">
            @if ($remarks)
                @foreach ($remarks as $i => $remark)
                    @if ($remark->user_id !== Auth::user()->id)
                        <div class="bubbleWrapper">
                            <div class="inlineContainer">
                                <img class="inlineIcon" src="https://astro-buddy.com/assets/images/dummy1.png">
                                <div class="otherBubble other">
                                    <p>Name:{{ ucfirst($remark->getUser->name ?? '-') }}</p>
                                    {{ $remark->remark ?? 'No Comments' }}
                                </div>
                            </div>
                            @if (!empty($remark->image))
                            <div class="mt-4 mb-4 me-15">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative"
                                    style="padding: 4px;
                                                                                                                             background: white;">
                                    @if (!is_null($remark) && !is_null($remark->image) &&
                                    is_array(json_decode($remark->image)))
                                    @foreach (json_decode($remark->image) as $imageUrl)
                                    <a href="{{ url($imageUrl) }}" target="_blank"> <img style="height: 100px;"
                                            src="{{ url($imageUrl) }}" alt="">
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @endif
                            <span class="other">{{ $remark->created_at->format('dM, Y / h:i A') }}</span>
                        </div>
                    @endif
                    @if ($remark->user_id == Auth::user()->id)
                        <div class="bubbleWrapper">
                            <div class="inlineContainer own">
                                <img class="inlineIcon" src="https://astro-buddy.com/assets/images/dummy2.png">
                                <div class="ownBubble own">
                                    <p>
                                        Name:{{ ucfirst($remark->getUser->name ?? '-') }}</p>
                                    {{ $remark->remark ?? 'No Comments' }}
                                </div>
                            </div>
                            @if (!empty($remark->image))
                            <div class="mt-4 mb-4 me-15">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative"
                                    style="padding: 4px;
                                                                                                                                        background: white;">
                                    @if (!is_null($remark) && !is_null($remark->image) &&
                                    is_array(json_decode($remark->image)))
                                    @foreach (json_decode($remark->image) as $imageUrl)
                                    <a style="text-align: end;" href="{{ url($imageUrl) }}" target="_blank"> <img style="height: 100px;"
                                            src="{{ url($imageUrl) }}" alt="">
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @endif
                            <span class="own">{{ $remark->created_at->format('dM, Y / h:i A') }}</span>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <form id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom: 9px;">
                <div class="col-sm-10" style="width: 60%; position: relative; margin-left: 7px;">
                    <textarea id="remark" name="remark" class="form-control" style="padding-right:140px;"></textarea>
                    <input type="hidden" value="{{ $candidate->id ?? '' }}" name="enquiry_id" id="candidate_id">
                </div>
                <span class="btn btn-file">
                    <i class="fas fa-file-image" style="color: #4683ec;font-size: 25px;"></i>
                    <input type="file" accept=".jpg, .jpeg, .png" multiple name="image[]"
                        id="image">
                </span>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary" style="margin-top: 4px;"
                        id="submitButton">Send</button>
                </div>
                <div id="errorMessages"></div>
            </div>
        </form>

    </div>
</div>

<!-- jQuery -->
{{-- <script>
    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();
            var remark = $("#remark").val();

            if (remark === "") {
                alert("Comment field is empty. Please enter some data.");
                return;
            }

            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('sms-remark') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let html = `<div class="bubbleWrapper">
                        <div class="inlineContainer own">
                            <img class="inlineIcon" src="{{ url('images/dummy.png') }}">
                            <div class="ownBubble own">
                                <p>
                                    Name:{{ ucfirst($remark->getUser->name ?? '-') }}</p>
                                {{ $remark->remark ?? 'No Comments' }}
                            </div>
                        </div><span class="own">{{ $remark->created_at->format('dM, Y / h:i A') }}</span>
                    </div>`;

                    $("#response").append(html);
                    scrollBottom();
                },
                error: function(response) {
                    console.log(response);
                }
            });

            $("#myForm textarea").val("");
            $("#screenshot").val("");
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        const errorContainer = $("#errorMessages");
        $('#myForm').submit(function(e) {
            e.preventDefault();

            var remark = $("#remark").val().trim();

            if (remark === "") {
                alert("Remark field is empty. Please enter some text.");
                return;
            }
            const imageFiles = document.getElementById("image").files;
            if (( !remark) && imageFiles.length === 0) {
            errorContainer.html(
            '<p class="text-danger">Either remark or image is required.</p>');
            return;
            }
            errorContainer.empty();
            var formData = new FormData(this);
            for (let i = 0; i < imageFiles.length; i++) { formData.append('imagess[]',
                imageFiles[i]); }
            $.ajax({
                type: 'POST',
                url: "{{ url('sms-remark') }}", // Your route
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let images = response.ss_image ? (typeof response.ss_image ===
                            "string") ? JSON.parse(response.ss_image) : response.ss_image : [];
                    let html = `<div class="bubbleWrapper">
                        <div class="inlineContainer own">
                            <img class="inlineIcon" src="https://astro-buddy.com/assets/images/dummy1.png">
                            <div class="ownBubble own">
                                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                ${response.remark}
                            </div>
                        </div>
                        ${images.map(image => ` <a style="text-align: end;" href="${image}"
                            target="_blank">
                            <img style="height: 100px;" src="${image}" alt="" />
                        </a>`).join('')}
                        <span class="own">${response.created_at}</span>
                    </div>`;

                    $("#response").append(html);
                    $("#remark").val("");
                    $("#image").val("");
                    scrollBottom();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert("Something went wrong.");
                }
            });
        });
    });

    function scrollBottom() {
        $('html, body').animate({
            scrollTop: $(document).height()
        }, 500);
    }
</script>
