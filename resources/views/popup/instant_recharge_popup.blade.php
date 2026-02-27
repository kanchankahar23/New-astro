<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astrologer Recharge Popup</title>
    <link rel="stylesheet" href="{{ asset('popup/popup4.css') }}" />
    <style>

    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .popup-content{
            position: absolute;
            top: 20%;
            font-family: 'poppins',sans-serif;
            left: 25%;
        }

        .package {
            font-family: 'poppins',sans-serif;

        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  </head>
    @php
         $isModel = $isOpen ?? false;
    @endphp
  <body>


    <!-- <button id="open-popup-btn">Show Recharge Popup</button> -->
    <!-- Popup Container -->
    <div class="popup" id="instant" style="z-index: 999;">
      <div class="popup-content">
        <div class="popup-header">
          <img src="{{ asset('popup/image/23 (3).png')}}" alt="Logo" class="logo" />
          <img src="{{ asset('popup/image/22 (1).png')}}" alt="Logo" class="logo1" />
          @if($isModel == false)
          <span class="close-btn"  onclick="closePopup()">&times;</span>
          @else
          <span class="close-btn"  onclick="closePopup()">&times;</span>
          @endif
        </div>

        @if (session('neededBalance', 0) > 0)
        <div class="balance-container">
            <h2>Insufficient Balance</h2>
            <div class="current-balance">
                <div class="balance-box">
                    <span>Needed Amount:</span>
                    <span id="balance">₹ {{ session('neededBalance') }}</span>
                </div>
            </div>
        </div>
        @else
            <div class="balance-container">
                <h2>Recharge Your Balance</h2>
                <div class="current-balance">
                    <div class="balance-box">
                        <span>Current Balance:</span>
                        <span id="balance">₹ {{ $walletInfo ?? '0' }}</span>
                    </div>
                </div>
            </div>
        @endif
        <div class="packages">
            @php
                $packages = \App\Models\Package::where('is_active', 1)->orderBy('id', 'DESC')->get();
            @endphp
         @foreach($packages as $package)
                <div class="package" onclick="rechargeFromPackage({{ $package->total }})" style="cursor:pointer;" >
                    <h3>Add ₹ {{ $package->price ?? 0 }}</h3>
                    <p>Get Bonus ₹ {{ $package->extra ?? 0 }}</p>
                    <img src="{{ asset('popup/image/package.png')}}" alt="Package Icon" />
                </div>
        @endforeach
        </div>
        <button class="recharge-btn" >
            Recharge Now
          </button>
        <div>
        @if(Session::has('error'))
            <div class="mt-2 alert alert-danger">
                <b>{{ Session::get('error') }}</b>
            </div>
        @endif
        </div>
      </div>
    </div>
    <script src="{{ asset('popup/popup4.js')}}"></script>

     <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
     <script>
        function rechargeFromPackage(e){
            var amount = e * 100;
             var options = {
                 "key": "{{ env('RAZORPAY_KEY') }}",
                 "amount": amount,
                 "currency": "INR",
                 "name": "http://astro-buddy.com/",
                 "description": "Razorpay",
                 "image": "https://astro-buddy.com/website/uploads/sites/23 (3).png",
                 "prefill": {
                     "name": "{{ Auth::user()->name }}",
                     "email": "{{ Auth::user()->email }}"
                 },
                 "theme": {
                     "color": "#ff7529"
                 },
                 "handler": function(response) {
                    let payment = {
                        value:e,
                        rzp_id:response.razorpay_payment_id
                    }
                    instantRecharege(payment);
                 },
                 "modal": {
                     "ondismiss": function() {
                         alert("Payment process was interrupted. Please try again.");
                     }
                 }
             };
             var rzp1 = new Razorpay(options);
             rzp1.open();
        }

        function instantRecharege(payment){

            const url = "{{ url('instant-recharge') }}";
            var pathName = window.location.pathname;
            var param = pathName.split('/').pop();
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({"payment" : payment,
                    "meeting" : param
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);


            })
            .catch(error => console.log('Error saving time:', error));
        }
     </script>
  </body>
</html>
