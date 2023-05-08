
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Push Buttons - Signup</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/intl-tel-input/build/css/intlTelInput.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/auth.css'); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/pushbutton_favicon.png'); ?>">
    
    <style>
        .iti { 
            display: block !important; 
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="rcs_auth_wrapper">
        <div class="rcs_auth_inner">
            <div class="rcs_auth_left">
                <div class="rcs_notifications rcs_error hide">
                <p><span class="rcs_head"></span><p class="rcs_notification_msg">Ooops, Something went wrong.<br>Please try again later</p></p>
                </div>
                <div class="rcs_auth_img"><img class="rcs_auth_vector" src="<?php echo base_url('assets/images/pushbutton_logo.png'); ?>"></div>
                <ul class="page_links">
                    <li><a href="https://pushbutton-vip.com/privacy-policy">Privacy Policy</a></li> 
                    <li><span>|</span></li>
                    <li><a href="https://pushbutton-vip.com/terms-condition">Terms and Conditions</a></li>
                </ul>
            </div>
            <div class="rcs_auth_form">
                <h2>HI, Welcome</h2>
                <p>Please register with your email</p>
                <form>
                    <div class="rcs_auth_box">
                        <div class="rcs_auth_fields">
                            <label>Name</label>
                            <input type="name" data-req="1" data-msg="Name is required." name="name" class="rcs_input" value="" placeholder="Enter your full name"/>
                            <div class="rcs_auth_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="14" height="16" viewBox="0 0 14 16"><path d="M2.875,10.812 C2.875,10.467 3.154,10.187 3.500,10.187 C3.845,10.187 4.125,10.467 4.125,10.812 C4.125,11.157 3.845,11.437 3.500,11.437 C3.154,11.437 2.875,11.157 2.875,10.812 ZM5.218,10.812 C5.218,10.467 5.498,10.187 5.843,10.187 C6.188,10.187 6.468,10.467 6.468,10.812 C6.468,11.157 6.188,11.437 5.843,11.437 C5.498,11.437 5.218,11.157 5.218,10.812 ZM7.562,10.812 C7.562,10.467 7.842,10.187 8.187,10.187 C8.532,10.187 8.812,10.467 8.812,10.812 C8.812,11.157 8.532,11.437 8.187,11.437 C7.842,11.437 7.562,11.157 7.562,10.812 ZM9.937,10.812 C9.937,10.467 10.217,10.187 10.562,10.187 C10.907,10.187 11.187,10.467 11.187,10.812 C11.187,11.157 10.907,11.437 10.562,11.437 C10.217,11.437 9.937,11.157 9.937,10.812 ZM13.375,11.312 C13.029,11.312 12.750,11.032 12.750,10.687 L12.750,8.375 C12.750,7.685 12.189,7.125 11.500,7.125 L2.500,7.125 C1.810,7.125 1.250,7.685 1.250,8.375 L1.250,13.500 C1.250,14.189 1.810,14.750 2.500,14.750 L11.500,14.750 C12.189,14.750 12.750,14.189 12.750,13.500 C12.750,13.154 13.029,12.875 13.375,12.875 C13.720,12.875 14.000,13.154 14.000,13.500 C14.000,14.878 12.878,16.000 11.500,16.000 L2.500,16.000 C1.121,16.000 -0.000,14.878 -0.000,13.500 L-0.000,8.375 C-0.000,6.996 1.121,5.875 2.500,5.875 L3.248,5.875 L3.248,3.670 C3.248,1.646 4.931,-0.000 6.998,-0.000 C9.066,-0.000 10.748,1.646 10.748,3.670 L10.748,5.875 L11.500,5.875 C12.878,5.875 14.000,6.996 14.000,8.375 L14.000,10.687 C14.000,11.032 13.720,11.312 13.375,11.312 ZM9.498,3.670 C9.498,2.336 8.377,1.250 6.998,1.250 C5.620,1.250 4.498,2.336 4.498,3.670 L4.498,5.875 L9.498,5.875 L9.498,3.670 Z" fill="#c0d1d5"/></svg>
                            </div>
                        </div>

                        <div class="rcs_auth_fields">
                            <label>Receipt Number</label>
                            <input type="text" data-req="1" data-msg="Receipt Number is required." name="receipt" class="rcs_input" value="" placeholder="Enter your Receipt Number"/>
                            <div class="rcs_auth_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="14" height="16" viewBox="0 0 14 16"><path d="M2.875,10.812 C2.875,10.467 3.154,10.187 3.500,10.187 C3.845,10.187 4.125,10.467 4.125,10.812 C4.125,11.157 3.845,11.437 3.500,11.437 C3.154,11.437 2.875,11.157 2.875,10.812 ZM5.218,10.812 C5.218,10.467 5.498,10.187 5.843,10.187 C6.188,10.187 6.468,10.467 6.468,10.812 C6.468,11.157 6.188,11.437 5.843,11.437 C5.498,11.437 5.218,11.157 5.218,10.812 ZM7.562,10.812 C7.562,10.467 7.842,10.187 8.187,10.187 C8.532,10.187 8.812,10.467 8.812,10.812 C8.812,11.157 8.532,11.437 8.187,11.437 C7.842,11.437 7.562,11.157 7.562,10.812 ZM9.937,10.812 C9.937,10.467 10.217,10.187 10.562,10.187 C10.907,10.187 11.187,10.467 11.187,10.812 C11.187,11.157 10.907,11.437 10.562,11.437 C10.217,11.437 9.937,11.157 9.937,10.812 ZM13.375,11.312 C13.029,11.312 12.750,11.032 12.750,10.687 L12.750,8.375 C12.750,7.685 12.189,7.125 11.500,7.125 L2.500,7.125 C1.810,7.125 1.250,7.685 1.250,8.375 L1.250,13.500 C1.250,14.189 1.810,14.750 2.500,14.750 L11.500,14.750 C12.189,14.750 12.750,14.189 12.750,13.500 C12.750,13.154 13.029,12.875 13.375,12.875 C13.720,12.875 14.000,13.154 14.000,13.500 C14.000,14.878 12.878,16.000 11.500,16.000 L2.500,16.000 C1.121,16.000 -0.000,14.878 -0.000,13.500 L-0.000,8.375 C-0.000,6.996 1.121,5.875 2.500,5.875 L3.248,5.875 L3.248,3.670 C3.248,1.646 4.931,-0.000 6.998,-0.000 C9.066,-0.000 10.748,1.646 10.748,3.670 L10.748,5.875 L11.500,5.875 C12.878,5.875 14.000,6.996 14.000,8.375 L14.000,10.687 C14.000,11.032 13.720,11.312 13.375,11.312 ZM9.498,3.670 C9.498,2.336 8.377,1.250 6.998,1.250 C5.620,1.250 4.498,2.336 4.498,3.670 L4.498,5.875 L9.498,5.875 L9.498,3.670 Z" fill="#c0d1d5"/></svg>
                            </div>
                        </div>

                        <div class="rcs_auth_fields">
                            <label>Email Address</label>
                            <input type="email" data-req="1" data-msg="Email is required." data-error="Email should be valid." name="email" class="rcs_input" value="" placeholder="Enter your email here..."/>
                            <div class="rcs_auth_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="16" height="12" viewBox="0 0 16 12"><path fill="#c0d1d5" d="M14.043,12.000 L1.956,12.000 C0.877,12.000 -0.000,11.135 -0.000,10.072 L-0.000,1.928 C-0.000,0.864 0.877,-0.000 1.956,-0.000 L14.046,-0.000 C15.125,-0.000 16.003,0.868 15.999,1.931 L15.999,10.072 C15.999,11.135 15.122,12.000 14.043,12.000 ZM14.933,2.000 C14.933,1.422 14.452,1.000 13.866,1.000 L2.133,1.000 C1.547,1.000 1.066,1.422 1.066,2.000 L1.066,10.000 C1.066,10.577 1.547,11.000 2.133,11.000 L13.866,11.000 C14.452,11.000 14.933,10.577 14.933,10.000 L14.933,2.000 ZM14.036,10.199 C13.947,10.290 13.831,10.336 13.712,10.336 C13.603,10.336 13.490,10.297 13.404,10.215 L9.425,6.489 L8.309,7.474 C8.226,7.550 8.117,7.589 8.011,7.589 C7.905,7.589 7.799,7.553 7.713,7.478 L6.627,6.522 L2.625,10.212 C2.539,10.290 2.430,10.329 2.320,10.329 C2.201,10.329 2.082,10.280 1.992,10.189 C1.824,10.010 1.834,9.732 2.012,9.566 L5.955,5.928 L1.996,2.440 C1.810,2.277 1.794,2.000 1.959,1.817 C2.125,1.634 2.406,1.618 2.592,1.781 L6.876,5.559 C6.902,5.579 6.925,5.598 6.948,5.621 C6.948,5.625 6.952,5.628 6.955,5.631 L8.008,6.558 L13.404,1.784 C13.589,1.621 13.871,1.638 14.036,1.817 C14.202,2.000 14.185,2.277 14.003,2.440 L10.090,5.899 L14.020,9.576 C14.198,9.742 14.205,10.023 14.036,10.199 Z"/></svg>
                            </div>
                        </div>
                        
                        <div class="rcs_auth_fields"> 
                            <label>Mobile Number</label>        
                            <input type="hidden"  id="country_code" name ="country_code" value="1"  class="rcs_input">  							
                            <input type="tel" data-req="1" data-msg="Mobile is required." data-error="Mobile should be valid."  id="mobile-number" name="mobile_number" class="rcs_input" value="" placeholder="Enter your mobile number here..."/>
                            <div class="rcs_auth_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="16" height="12" viewBox="0 0 16 12"><path fill="#c0d1d5" d="M14.043,12.000 L1.956,12.000 C0.877,12.000 -0.000,11.135 -0.000,10.072 L-0.000,1.928 C-0.000,0.864 0.877,-0.000 1.956,-0.000 L14.046,-0.000 C15.125,-0.000 16.003,0.868 15.999,1.931 L15.999,10.072 C15.999,11.135 15.122,12.000 14.043,12.000 ZM14.933,2.000 C14.933,1.422 14.452,1.000 13.866,1.000 L2.133,1.000 C1.547,1.000 1.066,1.422 1.066,2.000 L1.066,10.000 C1.066,10.577 1.547,11.000 2.133,11.000 L13.866,11.000 C14.452,11.000 14.933,10.577 14.933,10.000 L14.933,2.000 ZM14.036,10.199 C13.947,10.290 13.831,10.336 13.712,10.336 C13.603,10.336 13.490,10.297 13.404,10.215 L9.425,6.489 L8.309,7.474 C8.226,7.550 8.117,7.589 8.011,7.589 C7.905,7.589 7.799,7.553 7.713,7.478 L6.627,6.522 L2.625,10.212 C2.539,10.290 2.430,10.329 2.320,10.329 C2.201,10.329 2.082,10.280 1.992,10.189 C1.824,10.010 1.834,9.732 2.012,9.566 L5.955,5.928 L1.996,2.440 C1.810,2.277 1.794,2.000 1.959,1.817 C2.125,1.634 2.406,1.618 2.592,1.781 L6.876,5.559 C6.902,5.579 6.925,5.598 6.948,5.621 C6.948,5.625 6.952,5.628 6.955,5.631 L8.008,6.558 L13.404,1.784 C13.589,1.621 13.871,1.638 14.036,1.817 C14.202,2.000 14.185,2.277 14.003,2.440 L10.090,5.899 L14.020,9.576 C14.198,9.742 14.205,10.023 14.036,10.199 Z"/></svg>
                            </div>
                        </div>

                        <div class="rcs_auth_fields">
                            <label>Password</label>
                            <input type="password" data-req="1" data-msg="Password is required." name="password" class="rcs_input" value="" placeholder="**************"/>
                            <input type="hidden" name="user_ip" class="rcs_input" value="<?php echo getUserIpAddr(); ?>" />
                            <div class="rcs_auth_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="14" height="16" viewBox="0 0 14 16"><path d="M2.875,10.812 C2.875,10.467 3.154,10.187 3.500,10.187 C3.845,10.187 4.125,10.467 4.125,10.812 C4.125,11.157 3.845,11.437 3.500,11.437 C3.154,11.437 2.875,11.157 2.875,10.812 ZM5.218,10.812 C5.218,10.467 5.498,10.187 5.843,10.187 C6.188,10.187 6.468,10.467 6.468,10.812 C6.468,11.157 6.188,11.437 5.843,11.437 C5.498,11.437 5.218,11.157 5.218,10.812 ZM7.562,10.812 C7.562,10.467 7.842,10.187 8.187,10.187 C8.532,10.187 8.812,10.467 8.812,10.812 C8.812,11.157 8.532,11.437 8.187,11.437 C7.842,11.437 7.562,11.157 7.562,10.812 ZM9.937,10.812 C9.937,10.467 10.217,10.187 10.562,10.187 C10.907,10.187 11.187,10.467 11.187,10.812 C11.187,11.157 10.907,11.437 10.562,11.437 C10.217,11.437 9.937,11.157 9.937,10.812 ZM13.375,11.312 C13.029,11.312 12.750,11.032 12.750,10.687 L12.750,8.375 C12.750,7.685 12.189,7.125 11.500,7.125 L2.500,7.125 C1.810,7.125 1.250,7.685 1.250,8.375 L1.250,13.500 C1.250,14.189 1.810,14.750 2.500,14.750 L11.500,14.750 C12.189,14.750 12.750,14.189 12.750,13.500 C12.750,13.154 13.029,12.875 13.375,12.875 C13.720,12.875 14.000,13.154 14.000,13.500 C14.000,14.878 12.878,16.000 11.500,16.000 L2.500,16.000 C1.121,16.000 -0.000,14.878 -0.000,13.500 L-0.000,8.375 C-0.000,6.996 1.121,5.875 2.500,5.875 L3.248,5.875 L3.248,3.670 C3.248,1.646 4.931,-0.000 6.998,-0.000 C9.066,-0.000 10.748,1.646 10.748,3.670 L10.748,5.875 L11.500,5.875 C12.878,5.875 14.000,6.996 14.000,8.375 L14.000,10.687 C14.000,11.032 13.720,11.312 13.375,11.312 ZM9.498,3.670 C9.498,2.336 8.377,1.250 6.998,1.250 C5.620,1.250 4.498,2.336 4.498,3.670 L4.498,5.875 L9.498,5.875 L9.498,3.670 Z" fill="#c0d1d5"/></svg>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="rcs_btn rcs_digi_signup">Register</button>
                </form>
                <div class="rcs_regiester_link">
                    <p>Already have an account? <a href="<?php echo base_url(); ?>">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $default = {
            base_url : '<?php echo base_url(); ?>'
        };
    </script>
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/func.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/auth.js'); ?>"></script>

    <script src="<?php echo base_url('assets/intl-tel-input/build/js/intlTelInput.min.js'); ?>"></script>

    <script>
        $(function() {
            "use strict";

            var input = document.querySelector("#mobile-number");
            var iti = window.intlTelInput(input, {
                separateDialCode: true,
            });
            
            input.addEventListener("countrychange", function() {
                var countryData = iti.getSelectedCountryData();
                $("#country_code").val(countryData["dialCode"]);
            });
        });
    </script>
</body>

</html>