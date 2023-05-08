
<!DOCTYPE html>
<html lang="en">
<head>
<title>Push Buttons - Reset Password</title>
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
                <h2>Reset Password</h2>
                <p>Enter Your New Password Below.</p>
                <div class="mh_request_section mh_forget_form">
                    <form>
                        <div class="rcs_auth_box">
                            <div class="rcs_auth_fields">
                                <label>New Password</label>
                                <input type="password" class="rcs_input" placeholder="Enter new password" data-req="1" data-msg="New Password is required." name="npassword" id="rcs_newpass">
                            </div>
                            <div class="rcs_auth_fields">
                                <label>Confirm Password</label>
                                <input type="password" class="rcs_input" placeholder="Re-enter new password" data-req="1" data-msg="Confirm Password is required." name="cpassword" id="rcs_confpass">
                            </div>
                        </div>
						<input type="hidden" class="rcs_input" value="<?php echo $this->session->userdata( 'rcsPasswordOTP' ); ?>" name="code" >
						<input type="hidden" class="rcs_input" value="<?php echo $user_id; ?>" name="user_id" >
						<button type="submit" class="rcs_btn rcs_reset_password">Submit</button>
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