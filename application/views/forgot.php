
<!DOCTYPE html>
<html lang="en">
<head>
<title>Push Buttons - Forgot</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/auth.css'); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/fav.png'); ?>">
</head>
<body>
    <div class="rcs_auth_wrapper">
        <div class="rcs_auth_inner">
            <div class="rcs_auth_left">
                <div class="rcs_notifications rcs_error hide">
				<p><span class="rcs_head">uhhh ohhh...</span><p class="rcs_notification_msg">Ooops, Something went wrong.<br>Please try again later</p></p>
                </div>
                <div class="rcs_auth_img"><img class="rcs_auth_vector" src="<?php echo base_url('assets/images/pushbutton_logo.png'); ?>"></div>
                <ul class="page_links">
                    <li><a href="https://pushbutton-vip.com/privacy-policy">Privacy Policy</a></li> 
                    <li><span>|</span></li>
                    <li><a href="https://pushbutton-vip.com/terms-condition">Terms and Conditions</a></li>
                </ul>
            </div>
            <div class="rcs_auth_form">
			<a href="" class="rcs_logo"><img src="<?php echo base_url('assets/images/pushbutton_logo_small.png'); ?>"/></a>
                <h2>Forgot Your Password?</h2>
                <p>Enter Your Registered Email Address Below.</p>
                <div class="mh_request_section mh_forget_form">
                    <form>
                        <div class="rcs_auth_box">
                            <div class="rcs_auth_fields">
                                <label>Email Address</label>
                                <input type="text" data-req="1" data-msg="Email is required." name="email" class="rcs_input" value="" placeholder="Enter your email here..."/>
                                <div class="rcs_auth_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="16" height="12" viewBox="0 0 16 12"><path fill="#c0d1d5" d="M14.043,12.000 L1.956,12.000 C0.877,12.000 -0.000,11.135 -0.000,10.072 L-0.000,1.928 C-0.000,0.864 0.877,-0.000 1.956,-0.000 L14.046,-0.000 C15.125,-0.000 16.003,0.868 15.999,1.931 L15.999,10.072 C15.999,11.135 15.122,12.000 14.043,12.000 ZM14.933,2.000 C14.933,1.422 14.452,1.000 13.866,1.000 L2.133,1.000 C1.547,1.000 1.066,1.422 1.066,2.000 L1.066,10.000 C1.066,10.577 1.547,11.000 2.133,11.000 L13.866,11.000 C14.452,11.000 14.933,10.577 14.933,10.000 L14.933,2.000 ZM14.036,10.199 C13.947,10.290 13.831,10.336 13.712,10.336 C13.603,10.336 13.490,10.297 13.404,10.215 L9.425,6.489 L8.309,7.474 C8.226,7.550 8.117,7.589 8.011,7.589 C7.905,7.589 7.799,7.553 7.713,7.478 L6.627,6.522 L2.625,10.212 C2.539,10.290 2.430,10.329 2.320,10.329 C2.201,10.329 2.082,10.280 1.992,10.189 C1.824,10.010 1.834,9.732 2.012,9.566 L5.955,5.928 L1.996,2.440 C1.810,2.277 1.794,2.000 1.959,1.817 C2.125,1.634 2.406,1.618 2.592,1.781 L6.876,5.559 C6.902,5.579 6.925,5.598 6.948,5.621 C6.948,5.625 6.952,5.628 6.955,5.631 L8.008,6.558 L13.404,1.784 C13.589,1.621 13.871,1.638 14.036,1.817 C14.202,2.000 14.185,2.277 14.003,2.440 L10.090,5.899 L14.020,9.576 C14.198,9.742 14.205,10.023 14.036,10.199 Z"/></svg>
                                </div> 
                            </div>
                        </div>
                        <button type="submit" class="rcs_btn rcs_forgot_password">Reset Password</button>
                    </form>
                </div>
                <div class="rcs_regiester_link">
                    <p>Remember The Password? <a href="<?php echo base_url(); ?>">Login</a></p> 
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
</body>

</html>