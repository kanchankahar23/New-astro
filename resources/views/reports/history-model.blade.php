<style>
    .bonus1 {
        font-size: 20px;
        color: rgb(248, 245, 243);
        font-weight: bold;
        padding: 6px 8px;
        background-color: rgb(99, 8, 245);
        border-radius: 10px;
        text-decoration: none;
    }
</style>
<div class="modal-dialog modal-lg" style="width: 60% !important;">
    <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title bonus1">Appointment History</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <b>
                <div class="row">
                    <div class="col-sm-1">S.No</div>
                    <div class="col-sm-2">User Name</div>
                    <div class="col-sm-2">Astro.Name</div>
                    <div class="col-sm-2">Date</div>
                    <div class="col-sm-2">Duration</div>
                    <div class="col-sm-2">Debit Amount</div>
                    <div class="col-sm-1">Medium</div>
                </div>
            </b>
            @foreach ($appointments as $i => $appointment)
                <div class="row">
                    <div class="col-sm-1">{{ ++$i }}</div>
                    <div class="col-sm-2">{{ $appointment->name ?? '-' }}</div>
                    <div class="col-sm-2">{{ $appointment->astroDetails->name ?? '-' }}</div>
                    <div class="col-sm-2">{{ \Carbon\Carbon::parse($appointment->getChatlogs->date)->format('d M, Y') }}
                    </div>
                    <div class="col-sm-2">{{ \Carbon\Carbon::parse($appointment->preferred_time)->format('H:i A') }}
                    </div>
                    <div class="col-sm-2">&#8377; &nbsp;{{ $appointment->getChatlogs->deduct_amount ?? '-' }}</div>
                    <div class="col-sm-1">&nbsp;Chat</div>
                </div>
            @endforeach
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

    </div>
</div>
