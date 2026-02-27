<div class="modal-dialog modal-lg" style="width: 50% !important;">
    <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title">Add Bonus</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ url('add-bonus', $payment->id) }}" method="POST">@csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="addBonus">Add Bonus</label>
                        <input class="form-control" type="text" name="name" value="{{ $payment->name ?? '-' }}"
                            readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="addBonus">Bonus Amount</label>
                        <input class="form-control" type="text" name="addBonus">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <label for="addBonus">Remark</label>
                        <textarea name="remark" class="form-control"></textarea>
                    </div>

                    <div class="col-sm-6 mt-5">
                        <button class="btn btn-primary btn-block">Add</button>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>

    </div>
</div>
