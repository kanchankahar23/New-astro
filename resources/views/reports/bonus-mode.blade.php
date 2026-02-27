
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Special Offer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-4">{{ $payment->name ?? '-' }}</div>
                    <div class="col-sm-4">{{ $payment->remark ?? '-' }}</div>
                    <div class="col-sm-4">{{ $payment->bonus ?? '-' }}</div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>

