jQuery(document).ready(function($) {
    'use strict';
    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    /** 
     * stripe Payment Detail Save
     */
    $(document).on('submit', '#hl_booking_form', function(e) {
        e.preventDefault();
        var Astro_check_in = $('.t-input-check-in').val();
        var Astro_check_out = $('.t-input-check-out').val();
        var Astro_number_of_people = $('#Astro_number_of_people').val();
        var Astro_room_type = $('#Astro_room_type').val();
        var formdata = 'Astro_check_in=' + Astro_check_in + '&Astro_check_out=' + Astro_check_out + '&Astro_number_of_people=' + Astro_number_of_people + '&Astro_room_type=' + Astro_room_type;
        formdata += '&action=Astro_hotel_room_filter';
        $(".hl-preloader").show();
        $.ajax({
            type: 'post',
            url: Astro_ajax_path.url,
            data: formdata,
            success: function(response) {
                $('#hl_room_filter').html(response);
                $(".hl-preloader").hide();
                localStorage.setItem("Astro_check_in", Astro_check_in);
                localStorage.setItem("Astro_check_out", Astro_check_out);
                $.cookie('check_in', Astro_check_in);
                $.cookie('check_out', Astro_check_in);
                $.cookie('hotel_number_of_people', Astro_number_of_people);
                localStorage.setItem("Astro_number_of_people", Astro_number_of_people);
                localStorage.setItem("Astro_room_type", Astro_room_type);
            }
        });

    });

    /**
     * Hotel Room Filter
     */
    if ($.fn.datepicker) {
        var current = new Date();
        // Hotel Booking Date Picker
        $('.t-datepicker').tDatePicker({});
        // options here
        // Event Booking Date Picker
        var unavailableDates = JSON.parse(Astro_ajax_path.disbale_cafe_datas);
        $('#booking_date').datepicker({
            format: 'yyyy-mm-dd',
            startDate: current,
            pickTime: false,
            autoclose: true,
            datesDisabled: unavailableDates,
        });
        $("#booking_date").datepicker().on("changeDate", function(e) {
            var date = new Date(e.date);
            var yr = date.getFullYear();
            var month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
            var day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
            var newDate = yr + '-' + month + '-' + day;
            if (newDate) {
                $('#booking_cafe_date').val(newDate)
                $("#hl-event-modal").modal("show");
            }
        });
        jQuery('#booking_time').datetimepicker({
            pickDate: false,
            minuteStep: 15,
            pickerPosition: 'bottom-right',
            format: 'HH:ii p',
            autoclose: true,
            showMeridian: true,
            startView: 1,
            maxView: 1
        });
    }
    /**
     * Hotel Room Gallery Images
     */
    if ($.fn.fancybox) {
        $('[data-fancybox="gallery"]').fancybox({
            buttons: [
                "slideShow",
                "thumbs",
                "zoom",
                "fullScreen",
                "share",
                "close"
            ],
            loop: false,
            protect: true
        });
    }

    /**
     * Hotel Room Booking Ajax
     */
    $(document).on('submit', '#hl_booking_room', function(e) {
        e.preventDefault();
        var first_name = $('#hl_bfirst_name').val();
        var last_name = $('#hl_blast_name').val();
        var email = $('#hl_bemail').val();
        var contact_number = $('#hl_bcontact_number').val();
        var address = $('#hl_baddress').val();
        var num_of_peoples = $('#number_of_peoples').val();
        var badults = $('#hl_badults').val();
        var bchildren = $('#hl_bchildren').val();
        var new_price = $('#new_price').val();
        var tax_name_n = $('#tax_name_n').val();
        var text_percent_n = $('#text_percent_n').val();

        var booking_form_vailidetion = true;
        var enter_number = parseInt(badults) + parseInt(bchildren);
        if (num_of_peoples != enter_number) {
            toastr.error('Please Check Your Book Number!');
            booking_form_vailidetion = false;
        }
        var check_in = localStorage.getItem("Astro_check_in");
        var check_out = localStorage.getItem("Astro_check_out");
        var Astro_room_type = localStorage.getItem("Astro_room_type");

        if (first_name == '') {
            toastr.error('Please Enter First Name!');
            booking_form_vailidetion = false;
        }
        if (last_name == '') {
            toastr.error('Please Enter Last Name!');
            booking_form_vailidetion = false;
        }
        if (email == '') {
            toastr.error('Please Enter Email!');
            booking_form_vailidetion = false;
        }
        if (email == '') {
            toastr.error('Please Enter Email!');
            booking_form_vailidetion = false;
        } else {
            if (validateEmail(email) == false) {
                toastr.error('Email-id is invalid');
                booking_form_vailidetion = false;
            }
        }
        if (contact_number == '') {
            toastr.error('Please Enter Phone Number!');
            booking_form_vailidetion = false;
        } else {
            if (phonenumber(contact_number) == false) {
                toastr.error('Please Enter valid Phone Number!');
                booking_form_vailidetion = false;
            }
        }
        if (address == '') {
            toastr.error('Please Enter Address!');
            booking_form_vailidetion = false;
        }
        if (num_of_peoples == '') {
            toastr.error('Please Select Number of Peoples!');
            booking_form_vailidetion = false;
        }
        if (badults == '') {
            toastr.error('Please Enter Adults Number!');
            booking_form_vailidetion = false;
        }
        if (booking_form_vailidetion == true) {
            var Astro_check_in = $('#hl_check_in_date').val();
            var Astro_check_out = $('#Astro_check_out').val();
            var hl_room_id = $('#hl_room_id').val();
            var formdata = 'Astro_check_in=' + Astro_check_in + '&Astro_check_out=' + Astro_check_out;
            formdata += '&action=Astro_hotel_singel_page_checkdate';
            $.ajax({
                type: 'post',
                url: Astro_ajax_path.url,
                data: formdata,
                success: function(response) {
                    var arr_check = $.parseJSON(response);
                    if (arr_check_val(hl_room_id, arr_check) == 'Exist') {
                        $.cookie('first_name', first_name);
                        $.cookie('last_name', last_name);
                        $.cookie('email', email);
                        $.cookie('contact_number', contact_number);
                        $.cookie('address', address);
                        $.cookie('num_of_peoples', num_of_peoples);
                        $.cookie('badults', badults);
                        $.cookie('bchildren', bchildren);
                        $.cookie('check_in', check_in);
                        $.cookie('check_out', check_out);
                        $.cookie('Astro_room_type', Astro_room_type);
                        var review_data = '<ul><li><span>Check In Date:</span>' + check_in + '</li><li><span>Check Out Date:</span> ' + check_out + '</li><li><span>First Name:</span>' + first_name + '</li><li><span>Last Name:</span>' + last_name + '</li><li><span>Eamil Address:</span>' + email + '</li><li><span>Address:</span> ' + address + '</li><li><span>Room Type:</span>' + Astro_room_type + '</li><li><span>Adults:</span>' + badults + '</li><li><span>Children:</span>' + bchildren + '</li></ul>';
                        $('#first_name').val(first_name);
                        $('#last_name').val(last_name);
                        $('#email').val(email);
                        $('#contact_number').val(contact_number);
                        $('#address').val(address);
                        $('#num_of_peoples').val(num_of_peoples);
                        $('#badults').val(badults);
                        $('#bchildren').val(bchildren);
                        $('#check_in').val(check_in);
                        $('#check_out').val(check_out);
                        $('#room_type').val(Astro_room_type);
                        $('#hotal_review_data').html(review_data);
                        var formdata = 'hl_room_id=' + hl_room_id + '&first_name=' + first_name + '&last_name=' + last_name + '&email=' + email + '&contact_number=' + contact_number + '&address=' + address + '&num_of_peoples=' + num_of_peoples + '&badults=' + badults + '&bchildren=' + bchildren + '&check_in=' + check_in + '&check_out=' + check_out + '&room_type=' + Astro_room_type + '&new_price=' + new_price + '&tax_name_n=' + tax_name_n + '&text_percent_n=' + text_percent_n;
                        formdata += '&action=Astro_hotel_stripe_payment';
                        $.ajax({
                            type: 'post',
                            url: Astro_ajax_path.url,
                            data: formdata,
                            success: function(response) {
                                $('#hotal_stripe_payment_button').html(response);
                            }
                        });
                        $("#hotel_payment_option").modal("show");

                    } else {
                        toastr.error('Please Check Booking Date ' + check_in + ' to ' + check_out);
                    }
                }
            });
        }
    });

    // Room Booking razorpay 
    $(document).on('submit', '#form_data_razorpay', function(e) {
        var item_id = $('#item_id').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var eamil = $('#eamil').val();
        var badults = $('#badults').val();
        var bchildren = $('#bchildren').val();
        var num_of_peoples = $('#num_of_peoples').val();
        var address = $('#address').val();
        var check_in = $('#check_in').val();
        var check_out = $('#check_out').val();
        var room_type = $('#room_type').val();
        var contact_number = $('#contact_number').val();
        var razorpay = $('#razorpay').val();
        var razorpay_success_url = $('#razorpay_success_url').val();
        var razorpay_cancel_url = $('#razorpay_cancel_url').val();
        var razorpay_url = $('#razorpay_url').val();
        var room_price = $('#room_price').val();
        var new_price = $('#new_price').val();
        var tax_name_n = $('#tax_name_n').val();
        var text_percent_n = $('#text_percent_n').val();
        var currency = $('#currency').val();

        var options = {
            //redirect: true,
            "key": razorpay,
            "amount": room_price * 100,
            "currency": currency,
            "name": "Payment",
            "event": "Payment",
            "description": 'totalAmount',
            "image": "",
            "handler": function(response) {
                $.ajax({
                    url: razorpay_url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        item_id: item_id,
                        first_name: first_name,
                        last_name: last_name,
                        eamil: eamil,
                        badults: badults,
                        bchildren: bchildren,
                        num_of_peoples: num_of_peoples,
                        address: address,
                        check_in: check_in,
                        check_out: check_out,
                        room_type: room_type,
                        contact_number: contact_number,
                        room_price: room_price,
                        new_price: new_price,
                        tax_name_n: tax_name_n,
                        text_percent_n: text_percent_n,
                        currency: currency,
                    },
                    success: function(result) {
                        location.replace(result.url);
                    }
                });
            },
            "theme": {
                "color": "#528FF0"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    });


    // Event Booking razorpay 
    $(document).on('submit', '#form_data_razorpay_cafe', function(e) {
        var strip_cust_name = $('#strip_cust_name').val();
        var eamil = $('#eamil').val();
        var contact_number = $('#contact_number').val();
        var event_type = $('#event_type').val();
        var num_of_guests = $('#num_of_guests').val();
        var strip_booking_date = $('#strip_booking_date').val();
        var strip_booking_time = $('#strip_booking_time').val();
        var strip_cust_message = $('#strip_cust_message').val();
        var razorpay = $('#razorpay').val();
        var razorpay_success_url = $('#razorpay_success_url').val();
        var razorpay_cancel_url = $('#razorpay_cancel_url').val();
        var razorpay_url = $('#razorpay_url').val();
        var amount = $('#amount').val();
        var total = $('#new_price').val();
        var tax_name_n = $('#tax_name_n').val();
        var text_percent_n = $('#text_percent_n').val();
        var options = {
            //redirect: true,
            "key": razorpay,
            "amount": total * 100,
            "name": "Payment",
            "event": "Payment",
            "description": 'totalAmount',
            "image": "",
            "handler": function(response) {
                $.ajax({
                    url: razorpay_url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        strip_cust_name: strip_cust_name,
                        eamil: eamil,
                        contact_number: contact_number,
                        event_type: event_type,
                        num_of_guests: num_of_guests,
                        strip_booking_date: strip_booking_date,
                        strip_booking_time: strip_booking_time,
                        strip_cust_message: strip_cust_message,
                        total: total,
                        tax_name_n: tax_name_n,
                        text_percent_n: text_percent_n,
                        amount: amount,
                    },
                    success: function(result) {
                        location.replace(result.url);
                    }
                });
            },
            "theme": {
                "color": "#528FF0"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    });


    // app Booking razorpay 
    $(document).on('submit', '#form_data_razorpay_app', function(e) {
        var item_id = $('#item_id').val();
        var strip_cust_name = $('#strip_cust_name').val();
        var eamil = $('#eamil').val();
        var contact_number = $('#contact_number').val();
        var strip_cust_message = $('#strip_cust_message').val();
        var strip_booking_date = $('#strip_booking_date').val();
        var strip_booking_time = $('#strip_booking_time').val();
        var razorpay = $('#razorpay').val();
        var razorpay_success_url = $('#razorpay_success_url').val();
        var razorpay_cancel_url = $('#razorpay_cancel_url').val();
        var razorpay_url = $('#razorpay_url').val();
        var price = $('#schedule_price').val();
        var total = $('#new_prices').val();
        var tax_name_n = $('#tax_name_n').val();
        var text_percent_n = $('#text_percent_n').val();
        var options = {
            //redirect: true,
            "key": razorpay,
            "amount": total * 100,
            "name": "Payment",
            "event": "Payment",
            "description": 'totalAmount',
            "image": "",
            "handler": function(response) {
                $.ajax({
                    url: razorpay_url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        item_id: item_id,
                        strip_cust_name: strip_cust_name,
                        eamil: eamil,
                        contact_number: contact_number,
                        strip_booking_date: strip_booking_date,
                        strip_booking_time: strip_booking_time,
                        strip_cust_message: strip_cust_message,
                        price: price,
                        total: total,
                        tax_name_n: tax_name_n,
                        text_percent_n: text_percent_n,
                    },
                    success: function(result) {
                        location.replace(result.url);
                    }
                });
            },
            "theme": {
                "color": "#528FF0"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    });


    // Room Booking PrintArea 
    $("#hl_print_button").on('click', function() {
        $("#hl-booking-invoice").printArea();
    });
    /**
     * Astro Event Booking 
     */
    $(document).on('submit', '#Astro_cafe_booking', function(e) {
        e.preventDefault();
        var cust_name = $('#cust_name').val();
        var cust_email = $('#cust_email').val();
        var cust_phone = $('#cust_number').val();
        var cust_event_type = $('#cafe_event_type').val();
        var cust_date = $('#booking_cafe_date').val();
        var cust_time = $('#booking_time').val();
        var cust_numberof_guests = $('#numberof_guests').val();
        var cust_message = $('#cust_message').val();
        var booking_form_vailidetion = true;

        if (cust_name == '') {
            toastr.error('Please Enter Name!');
            booking_form_vailidetion = false;
        }
        if (cust_email == '') {
            toastr.error('Please Enter Email!');
            booking_form_vailidetion = false;
        } else {
            if (validateEmail(cust_email) == false) {
                toastr.error('Email-id is invalid');
                booking_form_vailidetion = false;
            }
        }

        if (cust_phone == '') {
            toastr.error('Please Enter Phone Number!');
            booking_form_vailidetion = false;
        } else {
            if (phonenumber(cust_phone) == false) {
                toastr.error('Please Enter valid Phone Number!');
                booking_form_vailidetion = false;
            }
        }
        if (cust_event_type == '') {
            toastr.error('Please Select Event!');
            booking_form_vailidetion = false;
        }
        if (cust_date == '') {
            toastr.error('Please Check Your Booking Date!');
            booking_form_vailidetion = false;
        }
        if (cust_time == '') {
            toastr.error('Please Select Booking Time!');
            booking_form_vailidetion = false;
        }
        if (cust_numberof_guests == '') {
            toastr.error('Please Enter Number Of Guests!');
            booking_form_vailidetion = false;
        }
        if (cust_message == '') {
            toastr.error('Please Enter Message!');
            booking_form_vailidetion = false;
        }
        if (booking_form_vailidetion == true) {
            $.cookie('cust_name', cust_name);
            $.cookie('cust_email', cust_email);
            $.cookie('cust_phone', cust_phone);
            $.cookie('cust_event_type', cust_event_type);
            $.cookie('cust_date', cust_date);
            $.cookie('cust_time', cust_time);
            $.cookie('cust_numberof_guests', cust_numberof_guests);
            $.cookie('cust_message', cust_message);

            var review_data = '<ul><li><span>Name:</span>' + cust_name + '</li><li><span>Eamil Address:</span>' + cust_email + '</li><li><span>Contact Number:</span> ' + cust_phone + '</li><li><span>Event Type:</span>' + cust_event_type + '</li><li><span>Number Of Guests:</span>' + cust_numberof_guests + '</li><li><span>Booking Date:</span>' + cust_date + '</li><li><span>Booking Time:</span>' + cust_time + '</li><li><span>Message:</span>' + cust_message + '</li></ul>';
            $('#hl_cafe_review_date').html(review_data);

            // Strip Payment Field 
            $('.strip_cust_name').val(cust_name);
            $('.eamil').val(cust_email);
            $('.contact_number').val(cust_phone);
            $('.event_type').val(cust_event_type);
            $('.num_of_guests').val(cust_numberof_guests);
            $('.strip_booking_date').val(cust_date);
            $('.strip_booking_time').val(cust_time);
            $('.strip_cust_message').val(cust_message);
            $('.stripe-button').val(cust_email);

            $("#hl-event-modal").modal("hide");
            $("#cafe_payment_option").modal("show");
        }
    });

    /**
     * Astro Free Appointment Booking 
     */
    $(document).on('submit', '#free_booking_form_data', function(e) {
        e.preventDefault();

        var strip_cust_name = $('#strip_cust_name').val();
        var eamil = $('#eamil').val();
        var contact_number = $('#contact_number').val();
        var cust_date = $('#booking_date').val();
        var strip_cust_message = $('#strip_cust_message').val();
        var schedule_price = $('#schedule_price').val();
        var booking_id = $('#booking_id').val();
        var new_price = $('#new_price').val();
        var appoint_time = $("input[name='hl_appoint_time']:checked").val();
        var booking_form_vailidetion = true;
        if (appoint_time == undefined) {
            toastr.error('Please Choose Schedule Time!');
            booking_form_vailidetion = false;
        }
        if (strip_cust_name == '') {
            toastr.error('Please Enter Name!');
            booking_form_vailidetion = false;
        }
        if (eamil == '') {
            toastr.error('Please Enter Email!');
            booking_form_vailidetion = false;
        } else {
            if (validateEmail(eamil) == false) {
                toastr.error('Email-id is invalid');
                booking_form_vailidetion = false;
            }
        }
        if (contact_number == '') {
            toastr.error('Please Enter Phone Number!');
            booking_form_vailidetion = false;
        } else {
            if (phonenumber(contact_number) == false) {
                toastr.error('Please Enter valid Phone Number!');
                booking_form_vailidetion = false;
            }
        }

        if (cust_date == '') {
            toastr.error('Please Check Your Booking Date!');
            booking_form_vailidetion = false;
        }

        if (strip_cust_message == '') {
            toastr.error('Please Enter Message!');
            booking_form_vailidetion = false;
        }
        if (booking_form_vailidetion == true) {
            $.cookie('strip_cust_name', strip_cust_name);
            $.cookie('eamil', eamil);
            $.cookie('contact_number', contact_number);
            $.cookie('cust_date', cust_date);
            $.cookie('cust_time', appoint_time);
            $.cookie('strip_cust_message', strip_cust_message);
            var review_data = '<ul><li><span>Name:</span>' + strip_cust_name + '</li><li><span>Eamil Address:</span>' + eamil + '</li><li><span>Contact Number:</span> ' + contact_number + '</li><li><span>Booking Date:</span>' + cust_date + '</li><li><span>Booking Time:</span>' + appoint_time + '</li><li><span>Message:</span>' + strip_cust_message + '</li></ul>';
            $('#hl_appointment_review_date').html(review_data);
            var formdata = 'booking_id=' + booking_id + '&strip_cust_name=' + strip_cust_name + '&eamil=' + eamil + '&contact_number=' + contact_number + '&cust_date=' + cust_date + '&appoint_time=' + appoint_time + '&strip_cust_message=' + strip_cust_message + '&new_price=' + new_price;

            formdata += '&action=Astro_appointment_free_payment';
            $.ajax({
                type: 'post',
                url: Astro_ajax_path.url,
                data: formdata,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result.status == 'true') {
                        location.reload(result.success_url);
                        toastr.success(result.massage);
                    } else {
                        toastr.error(result.massage);
                    }
                },
            });
            $("#hl-appointment-modal").modal("hide");
            $("#appointment_payment_option").modal("show");
        }

    });

    /**
     * Astro Appointment Booking 
     */
    $(document).on('submit', '#Astro_appointment_booking', function(e) {
        e.preventDefault();
        var cust_name = $('#cust_name').val();
        var cust_email = $('#cust_email').val();
        var cust_phone = $('#cust_number').val();
        var cust_date = $('#appointment_booking_date').val();
        var cust_message = $('#cust_message').val();
        var schedule_price = $('#schedule_price').val();
        var schedule_currency = $('#schedule_currency').val();
        var schedule_id = $('#schedule_id').val();

        var appoint_time = $("input[name='hl_appoint_time']:checked").val();
        var booking_form_vailidetion = true;
        if (appoint_time == undefined) {
            toastr.error('Please Choose Schedule Time!');
            booking_form_vailidetion = false;
        }
        if (cust_name == '') {
            toastr.error('Please Enter Name!');
            booking_form_vailidetion = false;
        }
        if (cust_email == '') {
            toastr.error('Please Enter Email!');
            booking_form_vailidetion = false;
        } else {
            if (validateEmail(cust_email) == false) {
                toastr.error('Email-id is invalid');
                booking_form_vailidetion = false;
            }
        }
        if (cust_phone == '') {
            toastr.error('Please Enter Phone Number!');
            booking_form_vailidetion = false;
        } else {
            if (phonenumber(cust_phone) == false) {
                toastr.error('Please Enter valid Phone Number!');
                booking_form_vailidetion = false;
            }
        }

        if (cust_date == '') {
            toastr.error('Please Check Your Booking Date!');
            booking_form_vailidetion = false;
        }

        if (cust_message == '') {
            toastr.error('Please Enter Message!');
            booking_form_vailidetion = false;
        }
        if (booking_form_vailidetion == true) {
            $.cookie('cust_name', cust_name);
            $.cookie('cust_email', cust_email);
            $.cookie('cust_phone', cust_phone);
            $.cookie('cust_date', cust_date);
            $.cookie('cust_time', appoint_time);
            $.cookie('cust_message', cust_message);
            var review_data = '<ul><li><span>Name:</span>' + cust_name + '</li><li><span>Eamil Address:</span>' + cust_email + '</li><li><span>Contact Number:</span> ' + cust_phone + '</li><li><span>Booking Date:</span>' + cust_date + '</li><li><span>Booking Time:</span>' + appoint_time + '</li><li><span>Message:</span>' + cust_message + '</li></ul>';
            $('#hl_appointment_review_date').html(review_data);
            var formdata = 'schedule_id=' + schedule_id + '&cust_name=' + cust_name + '&cust_email=' + cust_email + '&cust_phone=' + cust_phone + '&cust_date=' + cust_date + '&appoint_time=' + appoint_time + '&cust_message=' + cust_message;
            formdata += '&action=Astro_appointment_stripe_payment';
            $.ajax({
                type: 'post',
                url: Astro_ajax_path.url,
                data: formdata,
                success: function(response) {
                    $('#hl_appointment_stripe_option').html(response);
                }
            });
            $("#hl-appointment-modal").modal("hide");
            $("#appointment_payment_option").modal("show");
        }
    });

    /**
     * Email Vaildation 
     */
    var validateEmail = (email) => {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Mobile Number Vaildetion 
     */
    var phonenumber = (inputtxt) => {
        var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if (phoneno.test(inputtxt)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Array In value check
     */
    var arr_check_val = (vals, arr) => {
        var result = "Doesn't exist";
        for (var i = 0; i < arr.length; i++) {
            var name = arr[i];
            if (name == vals) {
                result = 'Exist';
                break;
            }
        }
        return result;
    }
});