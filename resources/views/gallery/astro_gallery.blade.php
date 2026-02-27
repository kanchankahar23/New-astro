<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Astrologer: <span style="color:rgb(20, 173, 184);">{{ ucfirst($user->name ?? '-') }}</span></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form class="forms-sample" action="{{ url('astrologer-gallery', $user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body" style="margin-left: 10%;">
                    <!-- Cover Image -->
                    <div class="row">
                        <div class="form-group col-9">
                            <label for="cover_image"><b>Cover Image</b></label>
                            <input type="file" name="cover_image" class="form-control"
                                onchange="initCropper(this, 'cover', {{ $user->id }})">
                        </div>
                        <div class="form-group col-3" style="margin-top: 30px;">
                            <img src="{{ url($user->cover_image ?? '-') }}" id="image-preview-cover-{{ $user->id }}"
                                alt="cover image" height="60px">
                        </div>
                    </div>

                    <!-- About Image -->
                    <div class="row">
                        <div class="form-group col-9">
                            <label for="about_image"><b>About Image</b></label>
                            <input type="file" name="about_image" class="form-control"
                                onchange="initCropper(this, 'about', {{ $user->id }})">
                        </div>
                        <div class="form-group col-3" style="margin-top: 30px;">
                            <img src="{{ url($user->about_image ?? '-') }}" id="image-preview-about-{{ $user->id }}"
                                alt="about image" height="60px">
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div id="gallery-container">
                        <div class="row">
                            <div class="form-group col-9">
                                <label for="gallery_image"><b>Gallary Image</b></label>
                                <div id="image-container">
                                    <div class="image-group">
                                        <input type="file" name="gallery_image[]" class="image-input"
                                            onchange="initCropper(this, 'gallery', 0)">
                                        <img id="image-preview-gallery-0" alt="gallery image" height="60px">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="remove-image btn btn-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-3" style="margin-top: 30px;">
                                <button type="button" id="add-image" class="btn btn-success btn-sm">Add Image</button>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 offset-3">
                                <center>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Cropper and Image Scripts -->
<script>
    function initCropper(input, imageType, id) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const image = document.getElementById('image-preview-' + imageType + '-' + id);
            image.src = e.target.result;
            const cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 2,
                autoCropArea: 1,
                crop(event) {
                    const canvas = cropper.getCroppedCanvas();
                    document.getElementById('cropped-image-' + imageType + '-' + id).value = canvas.toDataURL('image/jpeg');
                }
            });
        }
        reader.readAsDataURL(input.files[0]);
    }

    $(document).ready(function() {
        let imageCounter = 1;
        $('#add-image').click(function() {
            const imageGroups = $('.image-group').length;
            if (imageGroups >= 6) {
                alert('You cannot add more than 6 images.');
                return;
            }
            var newImageField = `<div class="image-group">
                                    <input type="file" name="gallery_image[]" class="image-input" onchange="initCropper(this, 'gallery', ${imageCounter})">
                                    <img id="image-preview-gallery-${imageCounter}" alt="gallery image" height="60px">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="remove-image btn btn-danger btn-sm mt-2">Remove</button>
                                 </div>`;
            $('#image-container').append(newImageField);
            imageCounter++;
        });
        $(document).on('click', '.remove-image', function() {
            $(this).parent('.image-group').remove();
        });
    });
</script>
