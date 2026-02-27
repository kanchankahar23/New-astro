
<style>

</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Share Astrologer</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{ url('shared-astrologer') }}" method="POST" enctype="multipart/form-data">@csrf
            <div class="modal-body">
                <div class="boxes">
                    <h4 style="color: #fff !important;">Astrologer &nbsp;:&nbsp;{{ucfirst($astrologer->name) }}</h4><br>
                    <input type="hidden" value="{{ $astrologer->id }}" name="shared_astrologer">
                    @foreach ($users as $user)

                        <input type="checkbox" id="box-{{ $user->id }}" name="shareToUsers[]" value="{{ $user->id }}">
                        <label for="box-{{ $user->id }}">{{ ucfirst($user->name) }}</label>

                    @endforeach
                </div>
            </div>


        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Share</button>
        </div>
    </form>
    </div>
</div>
