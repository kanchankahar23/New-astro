jQuery(document).ready(function($) {
    "use strict";
    $('.add_to_wishlist ').on('click', function() {

        jQuery.ajax({
            type: "post",
            url: frontadminajax.ajax_url,
            data: {
                'action': "add_to_wishlist"
            },
            success: function(response) {
                toastr.success('Product has been added to your wishlist');
            }
        });
    });

    $('.daily_prediction').on('click', function() {
        $('.astrol-horoscope-section').css('display', 'none');
        var sign = $(this).attr('sign-name');
        jQuery.ajax({
            type: "post",
            url: frontadminajax.ajax_url,
            data: {
                'action': "astro_daily_horoscope_prediction",
                'sign': sign
            },
            success: function(response) {
                console.log(response);
                $('.astrol-horoscope-info').html('<p>' + response + '</p>');
                $('.astrol-horoscope-section').css('display', 'block');
            }
        });
    });

    /**
     * Newsletter Ajax Script
     */
    $('#astrologer_newsletters').on('click', function() {

        var customer_email = $('#astro_newsletter_email').val();

        if (!validateEmail(customer_email)) {

            $(".ss_messages").html("<span style='color:red;'>Please make sure you enter a valid email address.</span>");

        } else {
            jQuery.ajax({
                type: "post",
                url: frontadminajax.ajax_url,
                data: {
                    'action': "astrologercore_send_newsletter",
                    customer_email: customer_email
                },
                success: function(response) {
                    $('.as-news-email').val('');
                    var result = JSON.parse(response);
                    if (result.status == "success") {
                        $(".ss_messages").html('<span style="color:green;">You have successfully subscribed to our mailing list.</span>');
                    } else if (result.status == "error") {
                        $(".ss_messages").html('<span style="color:red;"> You are already subscribed</span>');
                    } else {
                        $(".ss_messages").html('<span style="color:red;">Please Check Email Address</span>');
                    }
                }
            });
        }

    });


    /**
     * email checker
     */
    function validateEmail(uemail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(uemail)) {
            return true;
        } else {
            return false;
        }
    }

});