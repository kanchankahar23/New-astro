<style>
    .status{
        background-color: red;
        color: white !important;
        padding: 2px 7px;
        font-size: smaller;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .action{
        background-color: rgb(114, 118, 115);
        color: white !important;
        padding: 2px 7px;
        font-size: smaller;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .accept{
        background-color: #28513c;
        color: white !important;
        padding: 2px 7px;
        font-size: smaller;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .generate{
        background-color: #006fff;
        color: white !important;
        padding: 2px 7px;
        font-size: smaller;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .wallet {
    padding: 10px 30px;
    position: relative;
    overflow: hidden;
    box-sizing: border-box;
    background: #fff !important;
    border-color: #fff !important;
    font-size: 35px !important;
    border-radius: 3px;
    color: #000000 !important;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
</style>
<div class="modal fade" id="userAppointmentPopup{{ $appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
           Appointment Request
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="text-center col-4">
                    <img
                    src="{{ asset($user->userDetails->avtar) }}" alt="user" style="    width: 80px;
                    height: 80px;
                    overflow: hidden;
                    border-radius: 50%;
                    border: 2px solid #ff7010;">
                </div>
                <div class="col-8">
                    <h6>Name: {{ ucwords($user->userDetails->name) }}</h6>
                    <h6>Phone: {{ ucwords($user->userDetails->mobile) }}</h6>
                    <button type="button" class="accept" onclick="acceptAppointment({{ $user->id }},1)">Accept</button>
                    <button type="button" class="action" data-bs-dismiss="modal"  onclick="acceptAppointment({{ $user->id }},2)">Reject</button>
                </div>
            </div>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <script>
        function acceptAppointment(id,param){
           $.ajax({
            url:"{{ url('accept-appointment') }}",
            method:"POST",
            data:{
                _token:"{{ @csrf_token() }}",
                id:id,
                accept:param
            },
            success:(response)=>{
                console.log(response)
                if(response.data == "success"){
                    window.location.reload();
                }else{
                    alert("something went wrong")
                }
            },
            error: (xhr) => {
            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.error) {
            alert(xhr.responseJSON.error); // Show "Insufficient wallet balance"
            } else {
            alert("An unexpected error occurred.");
            }
            }
            });
        }
  </script>
