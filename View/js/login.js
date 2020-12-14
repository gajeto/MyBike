                               <script>
                                    $(document).ready(function() {
                                    
                                        $('user_password').val = "";
                                    
                                        $(".footer.navbar").hide();
                                    
                                        //$('#check_email').on("click",function(){
                                        //  var icon_id = $(this).data("icon")
                                    
                                        //  var email = $('#email')
                                        //  if (isEmail(email.val())){
                                        //    email.css('color', 'green');
                                        //    set_icon(icon_id, true)
                                        //    hideandfade($('#one_click'));
                                        //    $('#submit_btn').prop("disabled",false);
                                        //    isUser(email);
                                        //  }
                                        //  else{
                                        //    $('#email').css('color', 'black');
                                        //    set_icon(icon_id, false)
                                        //    hide_login();
                                        //    showandfade($('#one_click'));      
                                        //    $('#submit_btn').prop("disabled",true);
                                        //  }
                                        //});
                                    
                                        $("#email").keypress(function(event) {
                                            if (event.which == 13) {
                                                event.preventDefault();
                                                $('#check_email').click();
                                            }
                                        });
                                    
                                        $('#email').on("keyup", function() {
                                            $('#email').css('color', 'black');
                                            reset_email();
                                        });
                                    
                                        $('#check_email').on("click", function() {
                                            var email = $('#email')
                                            if (isEmail(email.val())) {
                                                //$('#email').css('color', 'black');
                                                isUser(email.val());
                                            } else {
                                                $('#email').css('color', 'red');
                                                $('#submit_btn').prop("disabled", true);
                                            }
                                        });
                                    
                                        $('#email').on('blur', function() {
                                            $(this).mailcheck({
                                                suggested: function(element, suggestion) {
                                                    $('#email').css('color', 'red');
                                                    $('#email_error').removeClass("hidden");
                                                    $('#email_suggestion').html("Did you mean " + suggestion.full + "?");
                                    
                                                },
                                                empty: function(element) {
                                                    $('#email').css('color', 'black');
                                                    $('#email_error').addClass("hidden");
                                                }
                                            });
                                        });
                                    
                                        function isEmail(email) {
                                            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                            return regex.test(email);
                                    
                                        }
                                    
                                        function set_icon(icon_id, is_valid) {
                                            console.log(icon_id)
                                            console.log(is_valid)
                                            if (is_valid) {
                                                //console.log("hide")
                                                //$(icon_id).hide();
                                                $(icon_id).addClass("green")
                                                $(icon_id).removeClass("red")
                                                $(icon_id).addClass("fa-check-circle")
                                                $(icon_id).removeClass("fa-exclamation-circle")
                                            } else {
                                                $(icon_id).removeClass("green")
                                                $(icon_id).addClass("red")
                                                $(icon_id).removeClass("fa-check-circle")
                                                $(icon_id).addClass("fa-exclamation-circle")
                                            }
                                        }
                                    
                                        //$('#user_password').on("keyup",function(){
                                        //if ($('#user_password').val().length > 7){
                                        //checkPassword($('#email').val(), $(this).val());
                                        //}
                                        //});
                                    
                                        function hideandfade(element) {
                                            element.fadeOut("slow").addClass("hidden");
                                        }
                                    
                                        function showandfade(element) {
                                            element.fadeIn("slow").removeClass('hidden');
                                        }
                                    
                                        function checkPassword(e, p) {
                                            $.ajax({
                                                url: "/garage/users/user_check",
                                                type: "POST",
                                                data: "e=" + encodeURIComponent(e) + "&p=" + encodeURIComponent(p) + "&authenticity_token=3hOlE6Uzro0+mCMZrH/WsICnzeWp8L45gcsEoQNjikkltnJo2dQ2zIfSM/OFzhj8yuxm8x0qwtYXGKxfKJfUoA==",
                                                dataType: "HTML",
                                                success: function(data, status, xhr) {
                                                    console.log(data);
                                                    $('#login_err').text = "";
                                                    hideandfade($('#user_nope'));
                                                    showandfade($('#user_yep'));
                                    
                                                },
                                                error: function(jqXHR, textStatus, errorThrown) {
                                                    console.log(textStatus);
                                                    //console.log($.parseJSON(jqXHR["responseText"])["error"]);
                                                    $('#login_err').text($.parseJSON(jqXHR["responseText"])["error"]);
                                                    hideandfade($('#user_yep'));
                                                    showandfade($('#user_nope'));
                                                    // Handle errors here
                                                    console.log('ERRORS: ' + textStatus);
                                                    // STOP LOADING SPINNER
                                                }
                                            });
                                        }
                                    
                                        function isUser(email) {
                                    
                                            $.ajax({
                                                url: "/garage/users/user_exists",
                                                type: "POST",
                                                data: "email=" + encodeURIComponent(email) + "&authenticity_token=ayEBwOu9T50GlhkyGyeo03iYUnUQQZB9y/r6u/sbgE+QhNa7l1rX3L/cCdgylmafMtP5Y6Sb7JJdKVJF0O/epg==",
                                                dataType: "HTML",
                                                success: function(data, status, xhr) {
                                                    d = $.parseJSON(data);
                                                    console.log(d)
                                                    hideandfade($('#check_email'));
                                                    if (d["is_user"]) {
                                                        if (d["provider"] == "email") {
                                                            $('#existing_user_email').val(email);
                                                            show_password();
                                    
                                                        } else if (d["provider"] == "nbr") {
                                                            $(location).attr('href', "/nbr");
                                                        } else {
                                                            show_social(d);
                                                        }
                                    
                                                    } else {
                                                        $('#new_user_email').val(email);
                                                        show_sign_up();
                                    
                                                    }
                                                }
                                            });
                                        }
                                    
                                        function reset_email() {
                                            hideandfade($('.email_password'));
                                            hideandfade($('.new_user_passwords'));
                                            hideandfade($('.social_login'));
                                            hideandfade($('.social_login_btn'));
                                            showandfade($('#one_click'));
                                            showandfade($('#check_email'));
                                        }
                                    
                                        function hide_login() {
                                            console.log("hide login");
                                            hideandfade($('.social_login'));
                                            hideandfade($('.social_login_btn'));
                                            hideandfade($('.email_password'));
                                            hideandfade($('.new_user_passwords'));
                                        }
                                    
                                        function show_password() {
                                            console.log("show password");
                                            $('#login_err').text = "";
                                            hideandfade($('.social_login'));
                                            hideandfade($('.social_login_btn'));
                                            hideandfade($('#one_click'));
                                            hideandfade($('.new_user_passwords'));
                                            showandfade($('.email_password'));
                                        }
                                    
                                        function show_social(d) {
                                            console.log("show social");
                                            console.log(d["provider"]);
                                    
                                            hideandfade($('.email_password'));
                                            hideandfade($('#one_click'));
                                            hideandfade($('.new_user_passwords'));
                                            showandfade($('.social_login'));
                                            showandfade($("." + d["provider"]));
                                            $('#submit_btn').prop("disabled", true);
                                    
                                        }
                                    
                                        function show_sign_up() {
                                            console.log("show new user passwords")
                                            hideandfade($('.social_login'));
                                            hideandfade($('.social_login_btn'));
                                            hideandfade($('#one_click'));
                                            hideandfade($('.email_password'));
                                            showandfade($('.new_user_passwords'));
                                        }
                                    
                                    });
                                 </script>