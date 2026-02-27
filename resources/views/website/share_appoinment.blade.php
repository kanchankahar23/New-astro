<div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Share Appointments</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form action="{{ url('shared-appoinment', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">@csrf
      <div class="modal-body">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>SNo.</th>
                <th>name</th>
                <th>Mobile No</th>
                <th>Time</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
            @foreach($shareAppointmentsLinks as $shareAppointmentsLink)
              <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" name="appointment_id[]" class="form-check-input" value="{{ $shareAppointmentsLink->id }}">
                    </div>
                </td>
                <td>{{ $shareAppointmentsLink->name }}</td>
                <td>{{ $shareAppointmentsLink->phone }}</td>
                <td>{{ $shareAppointmentsLink->preferred_time }}</td>
                <td>{{ $shareAppointmentsLink->preferred_date }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Share</button>
      </div>
    </form>
    </div>
  </div>
