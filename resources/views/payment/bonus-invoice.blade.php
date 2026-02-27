<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Astro-buddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ url('assets/invoice/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ url('assets/invoice/img/favicon.png')}}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ url('assets/invoice/css/style.css')}}">
</head>
<body>
    <div class="invoice-1 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner clearfix">
                        <div class="invoice-info clearfix" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row g-0">
                                    <div class="col-sm-6">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            <div class="logo">
                                                <img src="{{ url('assets/invoice/img/logos/logo.png')}}" alt="logo">
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6 invoice-id">
                                        <div class="info">
                                            <h1 class="color-white inv-header-1">Invoice</h1>
                                            <p class="color-white mb-1">Invoice Number <span>{{ $payment->id }}</span></p>
                                            <p class="color-white mb-0">Invoice Date <span>{{ $payment->created_at->format('d M, Y') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <h4 class="inv-title-1">Invoice To</h4>
                                            <h2 class="name mb-10">{{ $payment->GetTransection->name ?? '-' }}</h2>
                                            <p class="invo-addr-1">
                                                {{ ucfirst($payment->GetTransection->type) }} <br/> {{ $payment->GetTransection->email ?? '-' }} <br/> {{ $payment->GetTransection->address ?? '145 Mahananda Madan Mahal, Jabalpur, M.P, India' }} <br/>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Invoice From</h4>
                                                <h2 class="name mb-10">Astro-buddy</h2>
                                                <p class="invo-addr-1">
                                                    www.astro-buddy.com <br/> astro-buddy@gmail.com <br/> 145 Mahananda Jbp, india <br/>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr class="tr">
                                                <th>No.</th>
                                                <th class="pl0 text-start">Plan</th>
                                                <th class="text-center">Pay Id</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-end">Bonus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr">
                                                <td><div class="item-desc-1"><span>01</span></div></td>
                                                <td class="pl0">-</td>
                                                <td class="text-center">{{ $payment->razorpay_payment_id ?? '0' }}</td>
                                                <td class="text-center">{{ $payment->created_at->format('d M, Y') }}</td>
                                                <td class="text-end">{{ $payment->bonus ?? '0' }}.00</td>
                                            </tr>

                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center f-w-600 active-color">Grand Total</td>
                                                <td class="f-w-600 text-end active-color">{{ $payment->bonus ?? '00.00' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8 col-sm-7">
                                        <div class="mb-30 dear-client">
                                            <h3 class="inv-title-1">Terms & Conditions</h3>
                                            <p>This payment will not be refundable and the bonus amount will be credited only on our Astro-Buddy platform. it cannot be done on other platforms.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-5">
                                        <div class="mb-30 payment-method">
                                            <h3 class="inv-title-1">Payment Method</h3>
                                            <ul class="payment-method-list-1 text-14">
                                                <li><strong>Online</strong></li>
                                                <li><strong>Account Name:</strong>Astro-buddy</li>
                                                <li><strong>Branch Name:</strong>Sbi Jabalpur</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-contact clearfix">
                                <div class="row g-0">
                                    <div class="col-lg-9 col-md-11 col-sm-12">
                                        <div class="contact-info">
                                            <a href=""><i class="fa fa-phone"></i> +00 123 456 789</a>
                                            <a href=""><i class="fa fa-envelope"></i> astro@gmail.com</a>
                                            <a href="" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i> 169 Jabalpur mp, India</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Invoice
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 1 end -->





    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jspdf.min.js"></script>
    <script src="assets/js/html2canvas.js"></script>
    <script src="assets/js/app.js"></script>




</body>

</html>
