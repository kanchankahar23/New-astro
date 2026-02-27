@extends('website.website_master')
@section('title', 'Refund Policy')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="192x192" />
        <link rel="stylesheet" href="{{ asset('website/styles/style.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">

        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/style.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" />

        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet" />

        <link href="{{ url('assets/css/website_style.css') }}" rel="stylesteet">
    </head>

    <body id="horoscope-data-container">
        @include('website.website_header')
        <div class="container" style="margin-top:100px;">
            <h1>Refund and Cancellation policy</h1>
            <p>This refund and cancellation policy outlines how you can cancel or seek a refund for a product / service
                that you have purchased through the Platform. Under this policy:</p><br>
            <ul>
                <li>1.Cancellations will only be considered if the request is made of placing the order.15 days
                    However, cancellation requests may not be entertained if the orders have been communicated to
                    such sellers / merchant(s) listed on the Platform and they have initiated the process of shipping
                    them, or the product is out for delivery. In such an event, you may choose to reject the product at
                    the doorstep.</li><br>
                <li>2.Astro Buddy does not accept cancellation requests for perishable items like flowers, eatables, etc.
                    However, the refund / replacement can be made if the user establishes that the quality of the
                    product delivered is not good.</li><br>

                <li>3.In case of receipt of damaged or defective items, please report to our customer service team. The
                    request would be entertained once the seller/ merchant listed on the Platform, has checked and
                    determined the same at its own end. This should be reported within of receipt of products.15 days
                    In case you feel that the product received is not as shown on the site or as per your expectations,
                    you must bring it to the notice of our customer service within of receiving the product.15 days
                    The customer service team after looking into your complaint will take an appropriate decision.</li><br>

                <li>4.In case of complaints regarding the products that come with a warranty from the manufacturers,
                    please refer the issue to them.</li>

                <li>5.In case of any refunds approved by , it will take for the refund to beAstro Buddy 15 days
                    processed to you.</li><br>
            </ul>
        </div>
    </body>
    <!--Price End-->


@endsection
