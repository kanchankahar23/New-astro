(function($) {
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

    $(function() {

        var cust_id = '',
            agent_id = '',
            CurrentChatInterval = '';

        $('.motov3_chat_btn').click(function(e) {
            e.preventDefault();
            $('.moc_error_msg').text('');
            var name = '',
                email = '',
                info = '',
                msg = '';
            name = $('#moc_name').val();
            email = $('#moc_email').val();
            msg = $('#moc_msg').val();
            info = $('#moc_info').val();
            if (name.trim() == '' || email.trim() == '' || msg.trim() == '') {
                $('.moc_error_msg').text('All fields are required.');
                return false;
            }
            var data = {
                'name': name,
                'email': email,
                'role': 'customer',
                'info': info,
                'msg': msg,
                'action': 'moc_connectchat'
            };

            $.ajax({
                url: moc_obj.ajax_url,
                data: data,
                type: 'post',
                success: function(result) {
                    var results = jQuery.parseJSON(result);
                    if (results.status) {
                        cust_id = results.customer_id;
                        agent_id = results.agent_id;
                        var msg_id = results.msg_id;
                        $('.moc_chat_win .moc_chat_inner .moc_type_message').data('cust_id', cust_id);
                        $('.moc_chat_win .moc_chat_inner .moc_type_message').data('agent_id', agent_id);
                        $('.moc_chat_register').addClass('hide');
                        $('.moc_chat_inner').removeClass('hide');
                        $('.moc_chat_inner .moc_chat_title').text(name.trim());
                        setCookie('moc_customer_id', cust_id);
                        setCookie('moc_agent_id', agent_id);
                        setCookie('moc_customer_c_name', results.c_name);
                        setCookie('moc_customer_name', name.trim());
                        var html = chat(results.c_name, results.msg, 'sender', msg_id);
                        $('.moc_chat_content').prepend(html);
                        CurrentChatInterval = setInterval(receivemessage, 3000);
                    }
                }
            });
        });

        var GetChatHistory = function(cust_id, agent_id) {
            $('.moc_chat_register').addClass('hide');
            $('.moc_chat_inner').removeClass('hide');
            $.ajax({
                url: moc_obj.ajax_url,
                data: {
                    'action': 'getchathistory',
                    'user_to': cust_id,
                    'user_from': agent_id
                },
                type: 'post',
                success: function(result) {
                    var results = jQuery.parseJSON(result);
                    //console.log(results);
                    if (results.status) {
                        var html = '',
                            nm = '',
                            msg = '',
                            type = '';
                        var mChat = results.data;
                        $('.moc_chat_inner .moc_chat_title').text(getCookie('moc_customer_name'));
                        for (var i = 0; i < mChat.length; i++) {
                            nm = results.user_name[mChat[i].user_from];
                            msg = mChat[i].msg;
                            type = mChat[i].user_from == cust_id ? 'sender' : '';
                            html = chat(nm, msg, type, mChat[i].msg_id);
                            $('.moc_chat_win .moc_chat_inner .moc_chat_content').prepend(html);

                            nm = '', msg = '', type = '';
                        }
                        CurrentChatInterval = setInterval(receivemessage, 3000);
                    }
                }
            });
        };

        $('.moc_chat_wrapper').on('click', '.moc_close_window', function(e) {
            e.preventDefault();
            clearInterval(CurrentChatInterval);
            $('.moc_chat_wrapper').remove();
        });

        if (getCookie('moc_customer_id') != '' && getCookie('moc_agent_id') != '') {
            GetChatHistory(getCookie('moc_customer_id'), getCookie('moc_agent_id'));
        }

        $(document).ready(function() {
            $("#show").on("click", function() {
                $("#toggle_text").show();
                $("#show").hide();
                $("#hide").show();
            });
            $("#hide").on("click", function() {
                $("#toggle_text").hide();
                $("#hide").hide();
                $("#show").show();
            });
        });

        function sendmessage(msg) {
            cust_id = getCookie('moc_customer_id');
            agent_id = getCookie('moc_agent_id');
            $.ajax({
                url: moc_obj.ajax_url,
                data: {
                    'action': 'sendmessage',
                    'user_from': cust_id,
                    'user_to': agent_id,
                    'user_msg': msg
                },
                type: 'post',
                success: function(result) {
                    var results = jQuery.parseJSON(result);
                    if (results.status) {
                        var html = chat(getCookie('moc_customer_c_name'), results.msg, 'sender', results.msg_id);
                        $('.moc_chat_content').prepend(html);
                    }
                }
            });
        }

        function receivemessage() {
            var cust_id = getCookie('moc_customer_id');
            var msg_id = $('.moc_type_message').data('lastid');
            var is_type = 0;
            if ($('.moc_type_message').val() != '') {
                var is_type = 1;
            }
            $.ajax({
                url: moc_obj.ajax_url,
                data: {
                    'action': 'receivemessage',
                    'cust_id': cust_id,
                    'last_msgid': msg_id,
                    'is_type': is_type
                },
                type: 'post',
                success: function(result) {
                    var results = jQuery.parseJSON(result);
                    if (results.status) {
                        //console.log(results);
                        var html = '',
                            msg = '';
                        var mChat = results.data;
                        for (var i = 0; i < mChat.length; i++) {
                            msg = mChat[i].msg;
                            html = chat('A', msg, '', mChat[i].msg_id);
                            $('.moc_chat_win .moc_chat_inner .moc_chat_content').prepend(html);
                            msg = '';
                        }
                        if (results.is_type === '1') {
                            var str = $('.moc_chat_win .moc_chat_inner .moc_chat_title').text();
                            $('.moc_chat_win .moc_chat_inner .moc_user_typing').text('Agent is typing...');
                        } else {
                            $('.moc_chat_win .moc_chat_inner .moc_user_typing').text('');
                        }
                    }
                }
            });
        }

        $(document).keypress(function(e) {
            if (e.which == 13) {
                if ($('.moc_type_message').val() != '') {
                    var msg = $('.moc_type_message').val();
                    $('.moc_type_message').val('');
                    sendmessage(msg);
                    receivemessage();
                }
            }
        });

        function chat(name, msg, type = '', msg_id) {
            var html = '';
            html += '<div class="moc_chat_item ' + type + '">';
            html += '<div class="moc_message">';
            html += '<div class="moc_chat_user">';
            html += '<label>' + name + '</label>';
            html += '</div>';
            html += '<div class="moc_chat_text">';
            html += '<p>' + msg + '</p>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            if (type == '') {
                $('.moc_chat_win .moc_chat_inner .moc_type_message').data('lastid', msg_id);
            }
            return html;
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCookie() {
            var user = getCookie("username");
            if (user != "") {
                alert("Welcome again " + user);
            } else {
                user = prompt("Please enter your name:", "");
                if (user != "" && user != null) {
                    setCookie("username", user, 365);
                }
            }
        }
    });

})(jQuery);