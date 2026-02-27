<head>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ url('assets/css/onboard_model.css') }}" rel="stylesheet" />
</head>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Make Astrologer Payment</h4>
            <button type="button" class="close"
                data-dismiss="modal">&times;</button>
        </div>
        <form id="onboard" action="{{ url('make-astrologer-payment')}}"
            enctype="multipart/form-data" method="post">
            @csrf
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row formfile">
                    <input name="astroId" class="form-control" type="hidden"
                        value="{{ $astroId }}" required>
                    <div class="col-md-6">
                       <label for="mobile">Wallet Amount</label>
                        <input  class="form-control" type="text"
                            value="{{ getAstrologerWalletBalance($astroId) }}" id="mobile" readonly>
                    </div>
                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="mobile">Payout Amount</label>
                        <input name="astro_withdraw_amount" class="form-control" type="number"
                            value="" id="mobile" required>
                    </div>
                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="mobile">Upload Invoice</label>
                        <input name="payment_invoice" class="form-control" type="file"
                            value="" id="mobile" required>
                    </div>
                    <div class="col-md-6" >
                        <button style="margin-top: 30px;color: #ffffff;background: #5b45bb;" type="submit" class="btn btn-block"
                            id="onboardButton">Submit</button>
                    </div>
                </div>

            </div>
            {{-- <input name="avtar" value="{{ $user->image }}" type="hidden">
            --}}
        </form>


        <div class="mt-3"></div>
    </div>
</div>
