<!DOCTYPE html>
<html lang="en">
<head>
    <title>Push Button - <?php echo $title?></title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/fontawesome.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/select.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/magnific-popup-min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/color-picker.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/date-picker.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>"> 
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/pushbutton_favicon.png');?>">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <?php if(isset($font_family)){?>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script> 
        <script>
            let g_fonts = [
                "Inter","Alata","Audiowide","Abel","Aladin","Slabo 27px","Abril Fatface","Poller One","Anton","Dancing Script","Droid Sans","Droid Serif","Gloria Hallelujah","Indie Flower","Lato:400,700","Lobster","Lobster Two:400,700","Sacramento","Homemade Apple","Lora:400,700","Oswald:400,700","PT Sans:400,700","PT Serif:400,700","Pacifico","Poppins:400,700","Nunito:400,700","Questrial","Playfair Display:400,700","Raleway:400,700","Roboto:400,700","Roboto Condensed:400,700","Roboto Slab:400,700","Rubik:400,700","Source Sans Pro:400,700","Ubuntu:400,700","Monoton","Bungee Inline","Black Ops One","Finger Paint","Bungee Shade","Ribeye Marrow","Suez One","Teko:400,700","Josefin Sans:400,700","Acme","Varela Round","Archivo Black","Berkshire Swash","Righteous","Concert One","Fredoka One","DM Sans:400,700","ABeeZee","Cinzel:400,700","Limelight","Cabin:400,700","Cabin Sketch:400,700","Electrolize","Niconne","Aclonica","Reem Kufi","Love Ya Like A Sister","Vast Shadow","Ravi Prakash","Germania One","Nosifer","Pirata One","Rubik Mono One","Butcherman","Great Vibes","Quicksand:400,700","Montserrat:400,700","Bree Serif","Francois One","Kaushan Script","Marck Script","Patua One","Permanent Marker","Alfa Slab One","Cookie","Lalezar","Patrick Hand","Passion One:400,700","Boogaloo","Paytone One","Playball","Fugaz One","Oleo Script:400,700","Knewave","Bevan","Faster One","Leckerli One","Bungee","Pattaya","Rye","Federo","Nova Square","Ranchers","New Rocker","Mr Dafoe","Yesteryear","Signika:400,700","Bitter:400,700","Karla:400,700","Work Sans:400,700","Chivo:400,700","Open Sans:400,700","Barlow:400,700","Shrikhand","Pathway Gothic","Eczar:400,700","Tenor Sans","Archivo:400,700","Ultra","Coda:400,800"
            ];
            WebFont.load({
                google: {
                    families: g_fonts
                }
            });
        </script>
    <?php } ?>    
</head>
<body>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <?php 
    $users = $this->db->where('user_id', $_SESSION['user_id'])->get('users', 1)->row();
    if(empty($users->contactNumber)) { 
        
        $this->db->select('code, name'); 
        $this->db->from('country_code'); 
		$country_codes = $this->db->get()->result(); ?>

        <div class="modal" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" style = "background-color:red">
                    <h5 class="modal-title">Please add your phone number so we can send you your FREE $10k/month training via SMS</h5>
                    <!--<button type="button" class="close" data-dismiss="addForm" aria-label="Close">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    <!--</button>-->
                </div>
                    <form id="addForm" name="addForm" role="form">
                        <div class="modal-body" style = "background-color:coral">
                            <div class = "row">
                                <div class = "col-6">
                                    <select class="form-control" name="country_code"  id="country_code" required>
                                    <option value="" selected>Select Country Code</option>
                                    <?php 
                                        foreach($country_codes as $country) { ?>
                                        <option value="<?php echo $country->code; ?>"><?php echo $country->name . "(+" . $country->code . ")"; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class = "col-6">
                                    <input class="form-control" type="text" id="mobile_number" name="mobile_number" class="rcs_input" value="" placeholder="Enter your mobile number here..."  style = "font-size: .9rem ;height: 3.5rem ; " required/>
                                </div>

                                <input type="hidden" id = "user_id" name = "user_id" value = "<?php echo $users->user_id; ?>">
                                <input type="hidden" id = "user_name" name = "user_name" value = "<?php echo $users->name; ?>">
                                <input type="hidden" id = "user_email" name = "user_email" value = "<?php echo $users->email; ?>">
                            </div>
                        </div>
                        <div class="modal-footer" style = "background-color:coral">
                            <!-- <button type="button" class="btn btn-primary" id="add_mobile">Save</button> -->
                            <input type="submit" class="btn btn-success" id="add_mobile">
                             <button type="button" class="btn btn-danger"  id="close_modal" data-dismiss="modal">Close</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
        $(function(){
            $("#myModal").show();

            $("#addForm").submit(function(event){
                event.preventDefault();
                var data = $('form#addForm').serialize();
                var url = "../ajax/add_mobile";
                $.ajax({
                    type: "POST",
                    url: url,
                    cache:false,
                    data: data,
                    success: function(response){
                        $("#myModal").hide();
                    },
                    error: function(){
                        alert("Error");
                    }
                });
            })
            
            $("#close_modal").click(function(event){
                event.preventDefault();
                $("#myModal").hide();
            })
        });
    </script>
    <?php } ?>

    
    <div class="rcs_main_wrapper">
    
        <!---------- header sidebar start ---------->
        <div class="rcs_header_sidebar">
            <div class="rcs_header_toggle">
                <i class="fas fa-bars"></i>
            </div>
            <div class="rcs_hsidebar_logo" style="margin-top:10px; margin-bottom:10px;"> 
                <a href="<?php echo base_url(); ?>" style="display: -webkit-inline-box;">
                    <img src="<?php echo base_url('assets/images/pushbutton_logo.png');?>" alt="" width="100%" style="margin-right: 2%;">
                    <!-- <img src="<?php //echo base_url('assets/images/rcs-logo.png');?>" alt="" width="49%"> -->
                </a>
            </div>
            <div class="rcs_header_menu_box">
                <ul>
					<?php
				    $expireDate = date('Y-m-d H:i:s', strtotime($this->session->userdata( 'isCreated' ). ' + 7 days'));
				    $dateNow = date("Y-m-d H:i:s");?>
				    
					<input type="hidden" id="date-joined" value="<?=$expireDate?>" />
					<input type="hidden" id="date-now" value="<?=$dateNow?>" />
					<?php if(!in_array(2, $this->session->userdata( 'access_level' ))){ ?>
                        <?php if($expireDate>=$dateNow) {?>
                            <li class="rcs_cyan_box">
                                <a href="<?php echo base_url('user/welcome'); ?>" class="rcs_menu_link <?php echo $menu == 'welcome' ? 'active' : ''; ?>" data-original-title="" title="">
                                    <span class="fa fa-door-open" aria-hidden="true"></span>
                                    Welcome <i id="countDownActivate" style="margin-left: 10px;"></i>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="rcs_cyan_box">
                                <a href="<?php echo base_url('user/welcome-new'); ?>" class="rcs_menu_link <?php echo $menu == 'welcome' ? 'active' : ''; ?>" data-original-title="" title="">
                                    <span class="fa fa-door-open" aria-hidden="true"></span>
                                    Welcome <i id="countDownActivate" style="margin-left: 10px;"></i>
                                </a>
                            </li>
                            <?php } ?>
					<?php }else{ ?>
						<li class="rcs_cyan_box">
							<a href="<?php echo base_url('user/welcome-new'); ?>" class="rcs_menu_link <?php echo $menu == 'welcome' ? 'active' : ''; ?>" data-original-title="" title="">
								<span class="fa fa-door-open" aria-hidden="true"></span>
								Welcome
							</a>
						</li>
					<?php } ?>
                    <li class="rcs_orange_box">	
                        <a href="<?php echo base_url('user/integrations'); ?>" class="rcs_menu_link <?php echo $menu == 'integrations' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15" height="15" viewBox="0 0 15 15"><path d="M7.046,12.334 C7.046,12.048 7.046,11.784 7.046,11.493 C8.122,11.493 9.196,11.493 10.295,11.493 C10.295,11.786 10.295,12.050 10.295,12.334 C9.207,12.334 8.134,12.334 7.046,12.334 ZM5.640,8.791 C6.672,7.758 7.740,6.689 8.806,5.622 C8.976,5.810 9.161,6.013 9.336,6.207 C8.300,7.240 7.231,8.306 6.158,9.377 C5.995,9.193 5.813,8.986 5.640,8.791 ZM3.082,15.000 C1.390,15.002 -0.004,13.601 -0.000,11.902 C0.004,10.200 1.391,8.825 3.101,8.828 C4.787,8.831 6.166,10.215 6.163,11.902 C6.161,13.610 4.781,14.999 3.082,15.000 ZM2.661,4.707 C2.954,4.707 3.218,4.707 3.502,4.707 C3.502,5.789 3.502,6.863 3.502,7.949 C3.216,7.949 2.952,7.949 2.661,7.949 C2.661,6.873 2.661,5.799 2.661,4.707 Z" fill="#fc573b"/><path d="M13.089,13.826 C12.029,13.826 11.177,12.976 11.172,11.914 C11.167,10.860 12.034,9.989 13.084,9.992 C14.146,9.994 14.999,10.849 15.001,11.909 C15.002,12.969 14.147,13.825 13.089,13.826 ZM11.079,5.834 C10.014,5.840 9.158,4.997 9.149,3.934 C9.140,2.868 9.979,2.013 11.046,2.002 C12.107,1.992 12.967,2.838 12.977,3.903 C12.986,4.966 12.139,5.827 11.079,5.834 ZM3.101,3.847 C2.032,3.854 1.167,2.984 1.173,1.908 C1.180,0.849 2.048,-0.013 3.097,-0.001 C4.152,0.011 5.000,0.877 4.996,1.938 C4.992,2.973 4.132,3.840 3.101,3.847 Z" fill="#fd907e"/></svg></span>
                            Integrations
                        </a>
                    </li>
                    <li class="rcs_green_box">	
                        <a href="<?php echo base_url('user/training'); ?>" class="rcs_menu_link <?php echo $menu == 'training' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg width="19" height="20" viewBox="0 -32 512 512"  xmlns="http://www.w3.org/2000/svg"><path d="m464.871094 0h-224.941406c-26.03125 0-47.128907 21.101562-47.128907 47.128906v110.800782c11.890625 5.910156 24.738281 12.300781 36.730469 18.261718l18.347656-36.710937c11.109375-22.199219 38.191406-31.21875 60.382813-20.128907 22.238281 11.128907 31.25 38.136719 20.117187 60.378907l-32.707031 65.429687c.867187 8.660156.097656 17.390625-2.34375 25.839844h21.59375l-56.953125 156.609375c-3.378906 9.289063 3.152344 20.128906 14.101562 20.128906 6.121094 0 11.878907-3.777343 14.089844-9.878906l60.679688-166.859375h10.511718l61.296876 166.910156c2.230468 6.070313 7.972656 9.828125 14.089843 9.828125 10.230469 0 17.730469-10.21875 14.070313-20.167969l-57.5-156.570312h75.5625c26.027344 0 47.128906-21.101562 47.128906-47.128906v-176.742188c0-26.027344-21.101562-47.128906-47.128906-47.128906zm-32.140625 206.738281h-67.300781c-8.28125 0-15-6.71875-15-15 0-8.289062 6.71875-15 15-15h67.300781c8.289062 0 15 6.710938 15 15 0 8.28125-6.710938 15-15 15zm0-56.238281h-67.300781c-8.28125 0-15-6.710938-15-15 0-8.28125 6.71875-15 15-15h67.300781c8.289062 0 15 6.71875 15 15 0 8.289062-6.710938 15-15 15zm0-56.230469h-160.660157c-8.289062 0-15-6.71875-15-15s6.710938-15 15-15h160.660157c8.289062 0 15 6.71875 15 15s-6.710938 15-15 15zm0 0" fill="#29cc39"/><path fill="#29cc39" d="m263.921875 264.566406c2.710937-7.941406 2.691406-16.238281.402344-23.808594l37.226562-74.445312c3.703125-7.410156.703125-16.421875-6.707031-20.125-7.40625-3.707031-16.417969-.703125-20.125 6.707031l-31.75 63.492188c-18.976562-9.449219-47.808594-23.785157-71.035156-35.335938-21.609375-10.746093-37.03125-20.382812-63.34375-20.382812h-13.253906c20.488281 0 38.773437-9.429688 50.742187-24.1875 9.132813-11.230469 14.59375-25.542969 14.59375-41.140625 0-36.089844-29.25-65.339844-65.34375-65.339844-36.078125 0-65.328125 29.25-65.328125 65.339844 0 17.332031 6.75 33.082031 17.761719 44.769531 11.90625 12.660156 28.816406 20.558594 47.5625 20.5625-25.132813 0-49.703125 10.183594-67.378907 27.90625-18.019531 17.972656-27.945312 41.917969-27.945312 67.425781v48.199219c0 20.75 13.472656 38.40625 32.132812 44.6875v83.84375c0 8.285156 6.714844 15 15 15h96.398438c8.285156 0 15-6.714844 15-15v-168.535156c14.222656 7.109375 32.90625 16.449219 48.023438 24.011719 10.597656 5.296874 22.980468 5.773437 34.023437 1.28125 11.011719-4.53125 19.5-13.550782 23.285156-24.75.019531-.058594.039063-.117188.058594-.175782zm0 0"/></svg></span>
                            Training
                        </a>
                    </li> 
                    <li class="rcs_cyan_box">	
                        <a href="<?php echo base_url('user/dashboard'); ?>" class="rcs_menu_link <?php echo $menu == 'dashboard' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15" height="16" viewBox="0 0 15 16"><path d="M13.979,16.000 L9.604,16.000 C9.041,16.000 8.583,15.542 8.583,14.979 L8.583,12.354 C8.583,11.791 9.041,11.333 9.604,11.333 L13.979,11.333 C14.542,11.333 15.000,11.791 15.000,12.354 L15.000,14.979 C15.000,15.542 14.542,16.000 13.979,16.000 ZM5.396,4.667 L1.021,4.667 C0.458,4.667 -0.000,4.209 -0.000,3.646 L-0.000,1.021 C-0.000,0.458 0.458,-0.000 1.021,-0.000 L5.396,-0.000 C5.959,-0.000 6.417,0.458 6.417,1.021 L6.417,3.646 C6.417,4.209 5.959,4.667 5.396,4.667 Z" fill="#3cceff"/><path d="M13.979,9.167 L9.604,9.167 C9.041,9.167 8.583,8.709 8.583,8.146 L8.583,1.021 C8.583,0.458 9.041,-0.000 9.604,-0.000 L13.979,-0.000 C14.542,-0.000 15.000,0.458 15.000,1.021 L15.000,8.146 C15.000,8.709 14.542,9.167 13.979,9.167 ZM5.396,16.000 L1.021,16.000 C0.458,16.000 -0.000,15.542 -0.000,14.979 L-0.000,7.854 C-0.000,7.291 0.458,6.833 1.021,6.833 L5.396,6.833 C5.959,6.833 6.417,7.291 6.417,7.854 L6.417,14.979 C6.417,15.542 5.959,16.000 5.396,16.000 Z" fill="#a6e9ff"/></svg></span>
                            <?php 
                            if(in_array(4, $this->session->userdata( 'access_level' ))){
                                echo"Secret Society Unlimited";
                            }else{
                                echo "Commission Sites (Basic)";
                            }?>
                        </a>
                    </li>
					<li class="rcs_orange_box">	
						<?php if(in_array(3, $this->session->userdata( 'access_level' ))){ ?>   
						<a href="<?php echo base_url('user/dfy-page');?>" class="rcs_menu_link <?php echo $menu == 'dfy' ? 'active' : ''; ?>" data-original-title="" title="">  
						<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#fd907e"/></svg></span>
						<?php }else{ ?>
						<a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto2_popup" data-open_popup="rcs_popup_open">  
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="-250 0 1000 600"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" 
							fill="#fd907e"/></svg></span>
						<?php } ?>
                            Done For You Sites <?php //if(in_array(3, $this->session->userdata( 'access_level' ))){echo"";}else{echo "(Upgrade)";}?>
                        </a>
                    </li> 

                    
                    <?php if(in_array(2, $this->session->userdata( 'access_level' ))){ ?>
                    <li class="rcs_green_box">	
                        <a href="<?php echo base_url('user/commission_streams'); ?>" class="rcs_menu_link <?php echo $menu == '20 Commissions Streams' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg width="19" height="20" viewBox="0 -32 512 512"  xmlns="http://www.w3.org/2000/svg"><path d="m464.871094 0h-224.941406c-26.03125 0-47.128907 21.101562-47.128907 47.128906v110.800782c11.890625 5.910156 24.738281 12.300781 36.730469 18.261718l18.347656-36.710937c11.109375-22.199219 38.191406-31.21875 60.382813-20.128907 22.238281 11.128907 31.25 38.136719 20.117187 60.378907l-32.707031 65.429687c.867187 8.660156.097656 17.390625-2.34375 25.839844h21.59375l-56.953125 156.609375c-3.378906 9.289063 3.152344 20.128906 14.101562 20.128906 6.121094 0 11.878907-3.777343 14.089844-9.878906l60.679688-166.859375h10.511718l61.296876 166.910156c2.230468 6.070313 7.972656 9.828125 14.089843 9.828125 10.230469 0 17.730469-10.21875 14.070313-20.167969l-57.5-156.570312h75.5625c26.027344 0 47.128906-21.101562 47.128906-47.128906v-176.742188c0-26.027344-21.101562-47.128906-47.128906-47.128906zm-32.140625 206.738281h-67.300781c-8.28125 0-15-6.71875-15-15 0-8.289062 6.71875-15 15-15h67.300781c8.289062 0 15 6.710938 15 15 0 8.28125-6.710938 15-15 15zm0-56.238281h-67.300781c-8.28125 0-15-6.710938-15-15 0-8.28125 6.71875-15 15-15h67.300781c8.289062 0 15 6.71875 15 15 0 8.289062-6.710938 15-15 15zm0-56.230469h-160.660157c-8.289062 0-15-6.71875-15-15s6.710938-15 15-15h160.660157c8.289062 0 15 6.71875 15 15s-6.710938 15-15 15zm0 0" fill="#29cc39"/><path fill="#29cc39" d="m263.921875 264.566406c2.710937-7.941406 2.691406-16.238281.402344-23.808594l37.226562-74.445312c3.703125-7.410156.703125-16.421875-6.707031-20.125-7.40625-3.707031-16.417969-.703125-20.125 6.707031l-31.75 63.492188c-18.976562-9.449219-47.808594-23.785157-71.035156-35.335938-21.609375-10.746093-37.03125-20.382812-63.34375-20.382812h-13.253906c20.488281 0 38.773437-9.429688 50.742187-24.1875 9.132813-11.230469 14.59375-25.542969 14.59375-41.140625 0-36.089844-29.25-65.339844-65.34375-65.339844-36.078125 0-65.328125 29.25-65.328125 65.339844 0 17.332031 6.75 33.082031 17.761719 44.769531 11.90625 12.660156 28.816406 20.558594 47.5625 20.5625-25.132813 0-49.703125 10.183594-67.378907 27.90625-18.019531 17.972656-27.945312 41.917969-27.945312 67.425781v48.199219c0 20.75 13.472656 38.40625 32.132812 44.6875v83.84375c0 8.285156 6.714844 15 15 15h96.398438c8.285156 0 15-6.714844 15-15v-168.535156c14.222656 7.109375 32.90625 16.449219 48.023438 24.011719 10.597656 5.296874 22.980468 5.773437 34.023437 1.28125 11.011719-4.53125 19.5-13.550782 23.285156-24.75.019531-.058594.039063-.117188.058594-.175782zm0 0"/></svg></span>
                            20 Commissions Streams
                        </a>
                    </li> 
                    <?php }else{ ?>
                    <li class="rcs_pink_box">
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto3_popup" data-open_popup="rcs_popup_open">
                            <span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="-250 0 1000 600">
                                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" 
							fill="#d9a4fc"/></svg></span>
							20 Commissions Streams
                        </a>
                    </li>  
                    <?php } ?>

                    <li class="rcs_pink_box">
                        <a href="<?php echo base_url('user/automation'); ?>" class="rcs_menu_link <?php echo $menu == 'automation' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="17" viewBox="0 0 14 17"><path d="M12.250,3.667 L4.932,3.667 C3.966,3.667 3.182,4.489 3.182,5.500 L3.182,15.167 C3.182,16.178 3.966,17.000 4.932,17.000 L12.250,17.000 C13.215,17.000 14.000,16.178 14.000,15.167 L14.000,5.500 C14.000,4.489 13.215,3.667 12.250,3.667 L12.250,3.667 ZM10.977,15.000 L6.204,15.000 C5.941,15.000 5.727,14.776 5.727,14.500 C5.727,14.224 5.941,14.000 6.204,14.000 L10.977,14.000 C11.241,14.000 11.454,14.224 11.454,14.500 C11.454,14.776 11.241,15.000 10.977,15.000 L10.977,15.000 ZM10.977,12.333 L6.204,12.333 C5.941,12.333 5.727,12.109 5.727,11.833 C5.727,11.557 5.941,11.333 6.204,11.333 L10.977,11.333 C11.241,11.333 11.454,11.557 11.454,11.833 C11.454,12.109 11.241,12.333 10.977,12.333 L10.977,12.333 ZM10.977,10.000 L6.204,10.000 C5.941,10.000 5.727,9.776 5.727,9.500 C5.727,9.224 5.941,9.000 6.204,9.000 L10.977,9.000 C11.241,9.000 11.454,9.224 11.454,9.500 C11.454,9.776 11.241,10.000 10.977,10.000 L10.977,10.000 ZM10.977,7.333 L6.204,7.333 C5.941,7.333 5.727,7.109 5.727,6.833 C5.727,6.557 5.941,6.333 6.204,6.333 L10.977,6.333 C11.241,6.333 11.454,6.557 11.454,6.833 C11.454,7.109 11.241,7.333 10.977,7.333 L10.977,7.333 Z" fill="#be63f9"/><path d="M1.909,5.500 C1.861,3.223 1.843,1.995 4.000,2.000 L11.000,2.000 C10.790,1.233 9.798,-0.000 9.000,-0.000 L2.000,-0.000 C1.034,-0.000 -0.000,0.989 -0.000,2.000 L-0.000,13.167 C-0.000,14.178 0.785,15.000 1.750,15.000 L1.909,15.000 L1.909,5.500 Z" fill="#d9a4fc"/></svg></span>
                            Automation 
                        </a>
                    </li>

					<li class="rcs_yellow_box">	
                        <a href="<?php echo base_url('user/content_spinner'); ?>" class="rcs_menu_link <?php echo $menu == 'content_spinner' ? 'active' : ''; ?>" data-original-title="" title="">  
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="21" height="121" viewBox="30 0 300 300"><path d="M289.006,47.695c-5.857-5.858-15.355-5.858-21.213,0c-5.858,5.858-5.858,15.355,0,21.213  c42.876,42.877,42.876,112.642,0,155.518c-20.77,20.77-48.385,32.209-77.759,32.209s-56.989-11.439-77.759-32.209  c-23.143-23.142-34.505-55.142-31.806-87.099l30.104,20.115c2.522,1.686,5.428,2.528,8.333,2.528c2.905,0,5.812-0.843,8.333-2.528  c5.045-3.371,7.562-9.448,6.379-15.398l-17.238-86.668c-0.776-3.902-3.07-7.335-6.378-9.546c-3.308-2.209-7.357-3.015-11.26-2.24  L12.074,60.828c-5.95,1.184-10.601,5.835-11.786,11.786c-1.184,5.95,1.334,12.027,6.378,15.398l46.189,30.863  c-9.238,45.745,4.899,93.458,38.206,126.764c26.436,26.436,61.585,40.996,98.972,40.996s72.536-14.559,98.972-40.996  C343.579,191.066,343.579,102.268,289.006,47.695z M89.883,75.94l7.248,36.438L78.14,99.689c-0.017-0.011-0.034-0.022-0.05-0.034  L53.445,83.187L89.883,75.94z" fill="#ffe777"/></svg></span>
                            Content Spinner
                        </a>
                    </li>
					<li class="rcs_yellow_box">	
                        <a href="<?php echo base_url('user/analytics'); ?>" class="rcs_menu_link <?php echo $menu == 'analytics' ? 'active' : ''; ?>" data-original-title="" title="">  
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="15" viewBox="0 0 14 15"><path d="M13.580,15.000 L11.620,15.000 C11.388,15.000 11.200,14.820 11.200,14.599 L11.200,5.796 C11.200,5.550 11.409,5.350 11.667,5.350 L13.533,5.350 C13.791,5.350 14.000,5.550 14.000,5.796 L14.000,14.599 C14.000,14.820 13.812,15.000 13.580,15.000 ZM9.847,15.000 L7.887,15.000 C7.655,15.000 7.467,14.820 7.467,14.599 L7.467,9.363 C7.467,9.117 7.675,8.917 7.933,8.917 L9.800,8.917 C10.058,8.917 10.267,9.117 10.267,9.363 L10.267,14.599 C10.267,14.820 10.079,15.000 9.847,15.000 ZM6.113,15.000 L4.153,15.000 C3.921,15.000 3.733,14.820 3.733,14.599 L3.733,7.580 C3.733,7.333 3.942,7.134 4.200,7.134 L6.067,7.134 C6.324,7.134 6.533,7.333 6.533,7.580 L6.533,14.599 C6.533,14.820 6.345,15.000 6.113,15.000 ZM2.380,15.000 L0.420,15.000 C0.188,15.000 -0.000,14.820 -0.000,14.599 L-0.000,10.255 C-0.000,10.008 0.209,9.809 0.467,9.809 L2.333,9.809 C2.591,9.809 2.800,10.008 2.800,10.255 L2.800,14.599 C2.800,14.820 2.612,15.000 2.380,15.000 Z" fill="#ffd200"/><path d="M8.867,4.459 C8.580,4.459 8.314,4.542 8.092,4.684 L6.463,3.517 C6.505,3.391 6.533,3.260 6.533,3.121 C6.533,2.383 5.905,1.783 5.133,1.783 C4.361,1.783 3.733,2.383 3.733,3.121 C3.733,3.260 3.762,3.391 3.803,3.517 L2.175,4.684 C1.953,4.542 1.687,4.459 1.400,4.459 C0.628,4.459 -0.000,5.059 -0.000,5.796 C-0.000,6.534 0.628,7.134 1.400,7.134 C2.172,7.134 2.800,6.534 2.800,5.796 C2.800,5.657 2.771,5.526 2.730,5.400 L4.358,4.234 C4.580,4.375 4.847,4.459 5.133,4.459 C5.420,4.459 5.686,4.375 5.908,4.234 L7.536,5.400 C7.495,5.526 7.467,5.657 7.467,5.796 C7.467,6.534 8.095,7.134 8.867,7.134 C9.639,7.134 10.267,6.534 10.267,5.796 C10.267,5.497 10.160,5.223 9.985,5.000 L12.269,2.633 C12.375,2.658 12.485,2.675 12.600,2.675 C13.372,2.675 14.000,2.075 14.000,1.338 C14.000,0.600 13.372,-0.000 12.600,-0.000 C11.828,-0.000 11.200,0.600 11.200,1.338 C11.200,1.637 11.307,1.910 11.481,2.133 L9.198,4.501 C9.091,4.476 8.981,4.459 8.867,4.459 Z" fill="#ffe777"/></svg></span>
                            Analytics
                        </a>
                    </li>
                    <li class="rcs_cyan_box">	
                        <a href="<?php echo base_url('user/bonuses'); ?>" class="rcs_menu_link <?php echo $menu == 'bonuses' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512" width="19" xmlns="http://www.w3.org/2000/svg"><g><path fill="#8ce1eb" d="m151.965 21.622h30v50.25h-30z" transform="matrix(.877 -.48 .48 .877 -1.951 85.862)"/><path fill="#8ce1eb" d="m319.398 31.747h50.25v30h-50.25z" transform="matrix(.48 -.877 .877 .48 138.169 326.567)"/><path fill="#8ce1eb" d="m240.744 0h30v37.125h-30z"/><path fill="#8ce1eb" d="m405.961 73.106h37.125v30h-37.125z" transform="matrix(.707 -.707 .707 .707 62.04 325.989)"/><path fill="#8ce1eb" d="m73.737 69.544h30v37.125h-30z" transform="matrix(.707 -.707 .707 .707 -36.31 88.552)"/><path fill="#8ce1eb" d="m63.744 203.333h145v37.667h-145z"/><path fill="#8ce1eb" d="m302.744 203.333h145v37.667h-145z"/><path fill="#8ce1eb" d="m238.744 203.333h34v37.667h-34z"/><path fill="#8ce1eb" d="m238.744 271h34v241h-34z"/><path fill="#8ce1eb" d="m302.744 271h124.93v241h-124.93z"/><path fill="#8ce1eb" d="m331.834 173.333c8.502-8.177 13.8-19.66 13.8-32.388-.004-25.214-20.856-44.962-44.945-44.945-24.823 0-44.945 20.122-44.945 44.945 0-24.823-20.122-44.945-44.945-44.945-25.215.005-44.963 20.857-44.945 44.945.003 12.849 5.426 24.27 13.925 32.388z"/><path fill="#8ce1eb" d="m83.814 271h124.93v241h-124.93z"/></g></svg></span>
                            Bonuses
                        </a>
                    </li> 
					<li class="rcs_cyan_box">	
                        <a href="<?php echo base_url('user/upgrade'); ?>" class="rcs_menu_link <?php echo $menu == 'upgrade' ? 'active' : '';?>" data-original-title="" title="">  
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="18" height="15" viewBox="0 0 18 15"><path d="M10.163,9.987 C10.163,7.224 7.883,4.975 5.081,4.975 C2.280,4.975 -0.000,7.224 -0.000,9.987 C-0.000,12.751 2.280,15.000 5.081,15.000 C7.883,15.000 10.163,12.751 10.163,9.987 L10.163,9.987 ZM5.874,12.748 L5.609,12.748 L5.609,13.602 L4.554,13.602 L4.554,12.748 L3.131,12.748 L3.131,11.707 L5.874,11.707 C6.221,11.707 6.504,11.428 6.504,11.085 C6.504,10.742 6.221,10.463 5.874,10.463 L4.601,10.463 C3.697,10.463 2.961,9.738 2.961,8.845 C2.961,7.969 3.671,7.253 4.554,7.229 L4.554,6.373 L5.609,6.373 L5.609,7.227 L6.750,7.227 L6.750,8.268 L4.601,8.268 C4.278,8.268 4.015,8.527 4.015,8.845 C4.015,9.164 4.278,9.423 4.601,9.423 L5.874,9.423 C6.803,9.423 7.559,10.169 7.559,11.085 C7.559,12.002 6.803,12.748 5.874,12.748 L5.874,12.748 Z" fill="#26c6da"/><path d="M16.705,11.382 C15.732,11.806 14.427,12.039 13.030,12.039 C12.299,12.039 11.581,11.973 10.921,11.847 C11.093,11.321 11.195,10.764 11.214,10.186 C11.796,10.271 12.404,10.314 13.030,10.314 C14.570,10.314 16.026,10.050 17.130,9.569 C17.461,9.426 17.751,9.265 18.000,9.092 L18.000,10.167 C18.000,10.575 17.516,11.029 16.705,11.382 ZM16.705,8.618 C15.732,9.041 14.427,9.274 13.030,9.274 C12.378,9.274 11.749,9.223 11.155,9.123 C11.061,8.481 10.865,7.872 10.584,7.311 C11.345,7.466 12.178,7.549 13.030,7.549 C14.570,7.549 16.026,7.285 17.130,6.804 C17.461,6.661 17.751,6.500 18.000,6.327 L18.000,7.402 C18.000,7.810 17.516,8.264 16.705,8.618 ZM16.705,5.853 C15.732,6.276 14.427,6.509 13.030,6.509 C11.789,6.509 10.604,6.321 9.675,5.979 C9.215,5.468 8.670,5.033 8.061,4.698 L8.061,3.562 C8.310,3.736 8.601,3.896 8.931,4.039 C10.035,4.520 11.491,4.785 13.030,4.785 C14.570,4.785 16.026,4.520 17.130,4.039 C17.461,3.896 17.751,3.736 18.000,3.562 L18.000,4.637 C18.000,5.045 17.516,5.499 16.705,5.853 ZM16.705,3.088 C15.732,3.511 14.427,3.744 13.030,3.744 C11.634,3.744 10.329,3.511 9.357,3.088 C8.546,2.735 8.061,2.280 8.061,1.872 C8.061,1.464 8.546,1.009 9.357,0.656 C10.329,0.233 11.634,-0.000 13.030,-0.000 C14.427,-0.000 15.732,0.233 16.705,0.656 C17.516,1.009 18.000,1.464 18.000,1.872 C18.000,2.280 17.516,2.735 16.705,3.088 Z" fill="#8ce1eb"/></svg></span>
							Upgrades
                        </a>
                    </li>
					
                    <?php if(in_array(2, $this->session->userdata( 'access_level' ))){ ?>
                   <!-- <li class="rcs_green_box">
                        <a href="<?php /*echo base_url('user/chiBonus'); */?>" class="rcs_menu_link <?php /*echo $menu == 'chi_bonus' ? 'active' : ''; */?>" data-original-title="" title="">
                            <span><img src="https://pushbutton-vip.com/img/Click-Home-Income-Icon.png"></span>
                            Click Home Income Bonus
                        </a>
                    </li>-->
                    <?php }else{ ?>
                  <!--  <li class="rcs_green_box">
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto1_popup" data-open_popup="rcs_popup_open">
                            <span><img src="https://pushbutton-vip.com/img/Click-Home-Income-Icon.png"></span>
                            Click Home Income Bonus
                        </a>
                    </li>  -->
                    <?php } ?>
                    <?php if(in_array(5, $this->session->userdata( 'access_level' ))){ ?>
                    <!--<li class="rcs_green_box">	
                        <a href="<?php echo base_url('user/multipleStreamsIncome'); ?>" class="rcs_menu_link <?php echo $menu == 'multiple_streams_income' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="19" height="19" viewBox="0 0 19 19"><path d="M18.234,18.080 C17.397,18.759 16.215,18.683 15.464,17.960 C14.752,17.274 14.546,16.022 15.380,15.072 C14.792,14.408 14.204,13.744 13.613,13.077 C12.713,13.820 11.687,14.224 10.521,14.251 C9.355,14.278 8.313,13.921 7.380,13.220 C7.346,13.260 7.312,13.300 7.278,13.340 C7.179,13.451 7.058,13.492 6.913,13.447 C6.768,13.403 6.696,13.297 6.679,13.154 C6.668,13.065 6.700,12.984 6.757,12.914 C6.794,12.867 6.832,12.822 6.867,12.780 C5.564,11.348 5.166,9.708 5.679,7.839 C5.588,7.801 5.488,7.759 5.389,7.718 C4.419,7.320 3.449,6.923 2.480,6.523 C2.434,6.504 2.406,6.509 2.372,6.543 C2.185,6.727 1.963,6.850 1.707,6.904 C1.251,7.000 0.842,6.897 0.486,6.597 C0.248,6.397 0.097,6.142 0.034,5.840 C-0.061,5.388 0.045,4.983 0.345,4.631 C0.542,4.398 0.794,4.251 1.092,4.183 C1.711,4.043 2.363,4.332 2.659,4.931 C2.804,5.223 2.838,5.530 2.765,5.849 C2.760,5.867 2.757,5.886 2.752,5.909 C3.812,6.345 4.864,6.777 5.916,7.209 C5.922,7.211 5.928,7.211 5.942,7.213 C6.125,6.839 6.350,6.489 6.618,6.168 C6.888,5.846 7.197,5.566 7.542,5.314 C7.495,5.239 7.451,5.166 7.405,5.093 C6.924,4.327 6.441,3.560 5.961,2.793 C5.935,2.752 5.914,2.743 5.866,2.754 C5.264,2.900 4.643,2.609 4.339,2.076 C4.073,1.610 4.117,0.981 4.445,0.560 C4.661,0.282 4.937,0.095 5.283,0.032 C5.842,-0.070 6.312,0.101 6.670,0.544 C6.907,0.838 6.996,1.181 6.956,1.554 C6.922,1.865 6.790,2.134 6.572,2.361 C6.560,2.374 6.547,2.386 6.534,2.399 C6.530,2.404 6.527,2.410 6.520,2.419 C7.051,3.263 7.581,4.108 8.111,4.952 C10.000,4.071 11.786,4.237 13.484,5.458 C13.550,5.368 13.621,5.270 13.695,5.174 C13.789,5.052 13.924,5.004 14.061,5.041 C14.281,5.101 14.380,5.357 14.253,5.547 C14.178,5.659 14.097,5.768 14.013,5.875 C13.981,5.916 13.987,5.936 14.021,5.973 C14.622,6.618 15.027,7.368 15.228,8.227 C15.333,8.677 15.370,9.133 15.347,9.594 C15.326,10.002 15.252,10.402 15.129,10.792 C14.918,11.459 14.576,12.053 14.115,12.579 C14.109,12.585 14.104,12.593 14.095,12.605 C14.700,13.288 15.306,13.972 15.910,14.654 C17.072,14.054 18.246,14.598 18.726,15.443 C19.230,16.330 19.023,17.440 18.234,18.080 ZM10.738,7.721 C10.738,7.698 10.740,7.674 10.741,7.647 C10.908,7.671 11.066,7.707 11.205,7.796 C11.321,7.870 11.386,7.973 11.388,8.116 C11.390,8.285 11.537,8.416 11.710,8.425 C11.886,8.434 12.038,8.284 12.046,8.124 C12.056,7.927 12.005,7.747 11.902,7.580 C11.729,7.303 11.466,7.150 11.159,7.064 C11.023,7.026 10.883,7.003 10.738,6.972 C10.738,6.950 10.738,6.923 10.738,6.897 C10.738,6.693 10.739,6.488 10.738,6.284 C10.736,6.094 10.591,5.943 10.410,5.942 C10.230,5.941 10.077,6.089 10.076,6.270 C10.074,6.505 10.075,6.740 10.075,6.978 C9.992,6.993 9.911,7.005 9.831,7.022 C9.541,7.084 9.274,7.195 9.071,7.420 C8.832,7.684 8.732,8.006 8.801,8.345 C8.899,8.825 9.202,9.173 9.638,9.398 C9.774,9.468 9.925,9.511 10.072,9.567 C10.072,10.081 10.072,10.605 10.072,11.129 C9.777,11.078 9.486,10.875 9.355,10.602 C9.311,10.511 9.286,10.411 9.245,10.319 C9.182,10.175 9.010,10.100 8.861,10.145 C8.706,10.192 8.590,10.357 8.620,10.501 C8.714,10.953 8.970,11.294 9.353,11.545 C9.571,11.687 9.815,11.766 10.075,11.812 C10.075,11.965 10.075,12.116 10.075,12.267 C10.076,12.327 10.070,12.388 10.083,12.446 C10.118,12.612 10.279,12.731 10.433,12.712 C10.612,12.691 10.735,12.555 10.738,12.375 C10.739,12.215 10.738,12.055 10.738,11.895 C10.738,11.872 10.740,11.848 10.742,11.826 C10.789,11.819 10.828,11.813 10.867,11.806 C10.909,11.799 10.950,11.790 10.991,11.780 C11.392,11.683 11.715,11.476 11.913,11.106 C12.064,10.826 12.112,10.522 12.112,10.208 C12.112,9.902 11.986,9.651 11.781,9.433 C11.515,9.151 11.174,9.016 10.799,8.957 C10.743,8.948 10.737,8.927 10.737,8.880 C10.738,8.494 10.738,8.108 10.738,7.721 ZM11.449,10.222 C11.437,10.358 11.429,10.497 11.396,10.628 C11.324,10.918 11.118,11.075 10.834,11.140 C10.805,11.147 10.774,11.151 10.742,11.156 C10.742,10.639 10.742,10.129 10.742,9.612 C10.990,9.662 11.213,9.743 11.364,9.955 C11.420,10.035 11.458,10.123 11.449,10.222 ZM9.565,8.465 C9.540,8.426 9.519,8.384 9.498,8.343 C9.401,8.157 9.462,7.917 9.637,7.797 C9.767,7.709 9.914,7.673 10.071,7.648 C10.071,8.052 10.071,8.453 10.071,8.863 C9.854,8.785 9.685,8.656 9.565,8.465 ZM16.371,2.688 C16.334,2.736 16.297,2.785 16.260,2.835 C16.143,2.993 15.934,3.026 15.776,2.911 C15.633,2.807 15.605,2.593 15.713,2.441 C15.752,2.387 15.792,2.334 15.835,2.277 C15.590,1.969 15.480,1.619 15.527,1.229 C15.569,0.874 15.730,0.575 16.002,0.342 C16.504,-0.087 17.225,-0.116 17.747,0.275 C18.317,0.703 18.478,1.411 18.159,2.044 C17.897,2.562 17.197,3.000 16.371,2.688 ZM15.646,3.552 C15.651,3.554 15.657,3.556 15.662,3.558 C15.636,3.622 15.620,3.694 15.581,3.749 C15.362,4.053 15.139,4.354 14.914,4.654 C14.794,4.814 14.586,4.839 14.430,4.720 C14.287,4.611 14.267,4.398 14.382,4.244 C14.600,3.950 14.816,3.655 15.034,3.360 C15.127,3.236 15.275,3.188 15.419,3.235 C15.561,3.281 15.643,3.397 15.646,3.552 ZM2.633,16.237 C3.031,16.157 3.397,16.241 3.728,16.474 C3.739,16.482 3.750,16.490 3.760,16.497 C3.816,16.444 3.862,16.390 3.918,16.347 C4.046,16.251 4.225,16.265 4.341,16.373 C4.453,16.476 4.482,16.657 4.399,16.787 C4.352,16.861 4.292,16.928 4.234,16.995 C4.207,17.028 4.200,17.054 4.217,17.095 C4.283,17.252 4.318,17.418 4.318,17.586 C4.318,17.881 4.240,18.156 4.067,18.399 C3.855,18.697 3.571,18.893 3.211,18.967 C2.753,19.061 2.342,18.954 1.988,18.647 C1.758,18.447 1.609,18.197 1.548,17.899 C1.455,17.446 1.559,17.042 1.860,16.690 C2.065,16.450 2.326,16.299 2.633,16.237 ZM4.355,15.922 C4.353,15.829 4.391,15.754 4.448,15.685 C4.634,15.462 4.821,15.239 5.007,15.016 C5.128,14.871 5.330,14.845 5.478,14.956 C5.622,15.064 5.653,15.277 5.540,15.425 C5.453,15.540 5.357,15.648 5.265,15.759 C5.160,15.885 5.057,16.013 4.949,16.137 C4.770,16.340 4.456,16.275 4.372,16.019 C4.362,15.988 4.361,15.955 4.355,15.922 ZM5.519,14.531 C5.521,14.462 5.544,14.382 5.586,14.329 C5.780,14.082 5.982,13.843 6.184,13.604 C6.274,13.498 6.430,13.466 6.557,13.516 C6.686,13.567 6.769,13.689 6.770,13.826 C6.770,13.906 6.745,13.979 6.694,14.041 C6.501,14.273 6.309,14.507 6.114,14.738 C6.018,14.852 5.873,14.889 5.739,14.842 C5.613,14.797 5.514,14.672 5.519,14.531 Z" fill="#29cc39"/></svg></span>
                            Multiple Streams of Income
                        </a>
                    </li>-->
                    <?php }else{ ?>
                   <!-- <li class="rcs_green_box">	
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto6_popup" data-open_popup="rcs_popup_open">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="19" height="19" viewBox="0 0 19 19"><path d="M18.234,18.080 C17.397,18.759 16.215,18.683 15.464,17.960 C14.752,17.274 14.546,16.022 15.380,15.072 C14.792,14.408 14.204,13.744 13.613,13.077 C12.713,13.820 11.687,14.224 10.521,14.251 C9.355,14.278 8.313,13.921 7.380,13.220 C7.346,13.260 7.312,13.300 7.278,13.340 C7.179,13.451 7.058,13.492 6.913,13.447 C6.768,13.403 6.696,13.297 6.679,13.154 C6.668,13.065 6.700,12.984 6.757,12.914 C6.794,12.867 6.832,12.822 6.867,12.780 C5.564,11.348 5.166,9.708 5.679,7.839 C5.588,7.801 5.488,7.759 5.389,7.718 C4.419,7.320 3.449,6.923 2.480,6.523 C2.434,6.504 2.406,6.509 2.372,6.543 C2.185,6.727 1.963,6.850 1.707,6.904 C1.251,7.000 0.842,6.897 0.486,6.597 C0.248,6.397 0.097,6.142 0.034,5.840 C-0.061,5.388 0.045,4.983 0.345,4.631 C0.542,4.398 0.794,4.251 1.092,4.183 C1.711,4.043 2.363,4.332 2.659,4.931 C2.804,5.223 2.838,5.530 2.765,5.849 C2.760,5.867 2.757,5.886 2.752,5.909 C3.812,6.345 4.864,6.777 5.916,7.209 C5.922,7.211 5.928,7.211 5.942,7.213 C6.125,6.839 6.350,6.489 6.618,6.168 C6.888,5.846 7.197,5.566 7.542,5.314 C7.495,5.239 7.451,5.166 7.405,5.093 C6.924,4.327 6.441,3.560 5.961,2.793 C5.935,2.752 5.914,2.743 5.866,2.754 C5.264,2.900 4.643,2.609 4.339,2.076 C4.073,1.610 4.117,0.981 4.445,0.560 C4.661,0.282 4.937,0.095 5.283,0.032 C5.842,-0.070 6.312,0.101 6.670,0.544 C6.907,0.838 6.996,1.181 6.956,1.554 C6.922,1.865 6.790,2.134 6.572,2.361 C6.560,2.374 6.547,2.386 6.534,2.399 C6.530,2.404 6.527,2.410 6.520,2.419 C7.051,3.263 7.581,4.108 8.111,4.952 C10.000,4.071 11.786,4.237 13.484,5.458 C13.550,5.368 13.621,5.270 13.695,5.174 C13.789,5.052 13.924,5.004 14.061,5.041 C14.281,5.101 14.380,5.357 14.253,5.547 C14.178,5.659 14.097,5.768 14.013,5.875 C13.981,5.916 13.987,5.936 14.021,5.973 C14.622,6.618 15.027,7.368 15.228,8.227 C15.333,8.677 15.370,9.133 15.347,9.594 C15.326,10.002 15.252,10.402 15.129,10.792 C14.918,11.459 14.576,12.053 14.115,12.579 C14.109,12.585 14.104,12.593 14.095,12.605 C14.700,13.288 15.306,13.972 15.910,14.654 C17.072,14.054 18.246,14.598 18.726,15.443 C19.230,16.330 19.023,17.440 18.234,18.080 ZM10.738,7.721 C10.738,7.698 10.740,7.674 10.741,7.647 C10.908,7.671 11.066,7.707 11.205,7.796 C11.321,7.870 11.386,7.973 11.388,8.116 C11.390,8.285 11.537,8.416 11.710,8.425 C11.886,8.434 12.038,8.284 12.046,8.124 C12.056,7.927 12.005,7.747 11.902,7.580 C11.729,7.303 11.466,7.150 11.159,7.064 C11.023,7.026 10.883,7.003 10.738,6.972 C10.738,6.950 10.738,6.923 10.738,6.897 C10.738,6.693 10.739,6.488 10.738,6.284 C10.736,6.094 10.591,5.943 10.410,5.942 C10.230,5.941 10.077,6.089 10.076,6.270 C10.074,6.505 10.075,6.740 10.075,6.978 C9.992,6.993 9.911,7.005 9.831,7.022 C9.541,7.084 9.274,7.195 9.071,7.420 C8.832,7.684 8.732,8.006 8.801,8.345 C8.899,8.825 9.202,9.173 9.638,9.398 C9.774,9.468 9.925,9.511 10.072,9.567 C10.072,10.081 10.072,10.605 10.072,11.129 C9.777,11.078 9.486,10.875 9.355,10.602 C9.311,10.511 9.286,10.411 9.245,10.319 C9.182,10.175 9.010,10.100 8.861,10.145 C8.706,10.192 8.590,10.357 8.620,10.501 C8.714,10.953 8.970,11.294 9.353,11.545 C9.571,11.687 9.815,11.766 10.075,11.812 C10.075,11.965 10.075,12.116 10.075,12.267 C10.076,12.327 10.070,12.388 10.083,12.446 C10.118,12.612 10.279,12.731 10.433,12.712 C10.612,12.691 10.735,12.555 10.738,12.375 C10.739,12.215 10.738,12.055 10.738,11.895 C10.738,11.872 10.740,11.848 10.742,11.826 C10.789,11.819 10.828,11.813 10.867,11.806 C10.909,11.799 10.950,11.790 10.991,11.780 C11.392,11.683 11.715,11.476 11.913,11.106 C12.064,10.826 12.112,10.522 12.112,10.208 C12.112,9.902 11.986,9.651 11.781,9.433 C11.515,9.151 11.174,9.016 10.799,8.957 C10.743,8.948 10.737,8.927 10.737,8.880 C10.738,8.494 10.738,8.108 10.738,7.721 ZM11.449,10.222 C11.437,10.358 11.429,10.497 11.396,10.628 C11.324,10.918 11.118,11.075 10.834,11.140 C10.805,11.147 10.774,11.151 10.742,11.156 C10.742,10.639 10.742,10.129 10.742,9.612 C10.990,9.662 11.213,9.743 11.364,9.955 C11.420,10.035 11.458,10.123 11.449,10.222 ZM9.565,8.465 C9.540,8.426 9.519,8.384 9.498,8.343 C9.401,8.157 9.462,7.917 9.637,7.797 C9.767,7.709 9.914,7.673 10.071,7.648 C10.071,8.052 10.071,8.453 10.071,8.863 C9.854,8.785 9.685,8.656 9.565,8.465 ZM16.371,2.688 C16.334,2.736 16.297,2.785 16.260,2.835 C16.143,2.993 15.934,3.026 15.776,2.911 C15.633,2.807 15.605,2.593 15.713,2.441 C15.752,2.387 15.792,2.334 15.835,2.277 C15.590,1.969 15.480,1.619 15.527,1.229 C15.569,0.874 15.730,0.575 16.002,0.342 C16.504,-0.087 17.225,-0.116 17.747,0.275 C18.317,0.703 18.478,1.411 18.159,2.044 C17.897,2.562 17.197,3.000 16.371,2.688 ZM15.646,3.552 C15.651,3.554 15.657,3.556 15.662,3.558 C15.636,3.622 15.620,3.694 15.581,3.749 C15.362,4.053 15.139,4.354 14.914,4.654 C14.794,4.814 14.586,4.839 14.430,4.720 C14.287,4.611 14.267,4.398 14.382,4.244 C14.600,3.950 14.816,3.655 15.034,3.360 C15.127,3.236 15.275,3.188 15.419,3.235 C15.561,3.281 15.643,3.397 15.646,3.552 ZM2.633,16.237 C3.031,16.157 3.397,16.241 3.728,16.474 C3.739,16.482 3.750,16.490 3.760,16.497 C3.816,16.444 3.862,16.390 3.918,16.347 C4.046,16.251 4.225,16.265 4.341,16.373 C4.453,16.476 4.482,16.657 4.399,16.787 C4.352,16.861 4.292,16.928 4.234,16.995 C4.207,17.028 4.200,17.054 4.217,17.095 C4.283,17.252 4.318,17.418 4.318,17.586 C4.318,17.881 4.240,18.156 4.067,18.399 C3.855,18.697 3.571,18.893 3.211,18.967 C2.753,19.061 2.342,18.954 1.988,18.647 C1.758,18.447 1.609,18.197 1.548,17.899 C1.455,17.446 1.559,17.042 1.860,16.690 C2.065,16.450 2.326,16.299 2.633,16.237 ZM4.355,15.922 C4.353,15.829 4.391,15.754 4.448,15.685 C4.634,15.462 4.821,15.239 5.007,15.016 C5.128,14.871 5.330,14.845 5.478,14.956 C5.622,15.064 5.653,15.277 5.540,15.425 C5.453,15.540 5.357,15.648 5.265,15.759 C5.160,15.885 5.057,16.013 4.949,16.137 C4.770,16.340 4.456,16.275 4.372,16.019 C4.362,15.988 4.361,15.955 4.355,15.922 ZM5.519,14.531 C5.521,14.462 5.544,14.382 5.586,14.329 C5.780,14.082 5.982,13.843 6.184,13.604 C6.274,13.498 6.430,13.466 6.557,13.516 C6.686,13.567 6.769,13.689 6.770,13.826 C6.770,13.906 6.745,13.979 6.694,14.041 C6.501,14.273 6.309,14.507 6.114,14.738 C6.018,14.852 5.873,14.889 5.739,14.842 C5.613,14.797 5.514,14.672 5.519,14.531 Z" fill="#29cc39"/></svg></span>
                            Multiple Streams of Income
                        </a>
                    </li>-->
                    <?php } ?>
                    <?php if(in_array(6, $this->session->userdata( 'access_level' ))){ ?>
                    <!--<li class="rcs_cyan_box">	
                        <a href="<?php echo base_url('user/recurringPassiveIncome'); ?>" class="rcs_menu_link <?php echo $menu == 'recurring_passive_income' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="18" height="15" viewBox="0 0 18 15"><path d="M10.163,9.987 C10.163,7.224 7.883,4.975 5.081,4.975 C2.280,4.975 -0.000,7.224 -0.000,9.987 C-0.000,12.751 2.280,15.000 5.081,15.000 C7.883,15.000 10.163,12.751 10.163,9.987 L10.163,9.987 ZM5.874,12.748 L5.609,12.748 L5.609,13.602 L4.554,13.602 L4.554,12.748 L3.131,12.748 L3.131,11.707 L5.874,11.707 C6.221,11.707 6.504,11.428 6.504,11.085 C6.504,10.742 6.221,10.463 5.874,10.463 L4.601,10.463 C3.697,10.463 2.961,9.738 2.961,8.845 C2.961,7.969 3.671,7.253 4.554,7.229 L4.554,6.373 L5.609,6.373 L5.609,7.227 L6.750,7.227 L6.750,8.268 L4.601,8.268 C4.278,8.268 4.015,8.527 4.015,8.845 C4.015,9.164 4.278,9.423 4.601,9.423 L5.874,9.423 C6.803,9.423 7.559,10.169 7.559,11.085 C7.559,12.002 6.803,12.748 5.874,12.748 L5.874,12.748 Z" fill="#26c6da"/><path d="M16.705,11.382 C15.732,11.806 14.427,12.039 13.030,12.039 C12.299,12.039 11.581,11.973 10.921,11.847 C11.093,11.321 11.195,10.764 11.214,10.186 C11.796,10.271 12.404,10.314 13.030,10.314 C14.570,10.314 16.026,10.050 17.130,9.569 C17.461,9.426 17.751,9.265 18.000,9.092 L18.000,10.167 C18.000,10.575 17.516,11.029 16.705,11.382 ZM16.705,8.618 C15.732,9.041 14.427,9.274 13.030,9.274 C12.378,9.274 11.749,9.223 11.155,9.123 C11.061,8.481 10.865,7.872 10.584,7.311 C11.345,7.466 12.178,7.549 13.030,7.549 C14.570,7.549 16.026,7.285 17.130,6.804 C17.461,6.661 17.751,6.500 18.000,6.327 L18.000,7.402 C18.000,7.810 17.516,8.264 16.705,8.618 ZM16.705,5.853 C15.732,6.276 14.427,6.509 13.030,6.509 C11.789,6.509 10.604,6.321 9.675,5.979 C9.215,5.468 8.670,5.033 8.061,4.698 L8.061,3.562 C8.310,3.736 8.601,3.896 8.931,4.039 C10.035,4.520 11.491,4.785 13.030,4.785 C14.570,4.785 16.026,4.520 17.130,4.039 C17.461,3.896 17.751,3.736 18.000,3.562 L18.000,4.637 C18.000,5.045 17.516,5.499 16.705,5.853 ZM16.705,3.088 C15.732,3.511 14.427,3.744 13.030,3.744 C11.634,3.744 10.329,3.511 9.357,3.088 C8.546,2.735 8.061,2.280 8.061,1.872 C8.061,1.464 8.546,1.009 9.357,0.656 C10.329,0.233 11.634,-0.000 13.030,-0.000 C14.427,-0.000 15.732,0.233 16.705,0.656 C17.516,1.009 18.000,1.464 18.000,1.872 C18.000,2.280 17.516,2.735 16.705,3.088 Z" fill="#8ce1eb"/></svg></span>
                            Recurring Passive Income
                        </a>
                    </li>-->
                    <?php }else{ ?>
                    <!--<li class="rcs_cyan_box">	
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto5_popup" data-open_popup="rcs_popup_open">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="18" height="15" viewBox="0 0 18 15"><path d="M10.163,9.987 C10.163,7.224 7.883,4.975 5.081,4.975 C2.280,4.975 -0.000,7.224 -0.000,9.987 C-0.000,12.751 2.280,15.000 5.081,15.000 C7.883,15.000 10.163,12.751 10.163,9.987 L10.163,9.987 ZM5.874,12.748 L5.609,12.748 L5.609,13.602 L4.554,13.602 L4.554,12.748 L3.131,12.748 L3.131,11.707 L5.874,11.707 C6.221,11.707 6.504,11.428 6.504,11.085 C6.504,10.742 6.221,10.463 5.874,10.463 L4.601,10.463 C3.697,10.463 2.961,9.738 2.961,8.845 C2.961,7.969 3.671,7.253 4.554,7.229 L4.554,6.373 L5.609,6.373 L5.609,7.227 L6.750,7.227 L6.750,8.268 L4.601,8.268 C4.278,8.268 4.015,8.527 4.015,8.845 C4.015,9.164 4.278,9.423 4.601,9.423 L5.874,9.423 C6.803,9.423 7.559,10.169 7.559,11.085 C7.559,12.002 6.803,12.748 5.874,12.748 L5.874,12.748 Z" fill="#26c6da"/><path d="M16.705,11.382 C15.732,11.806 14.427,12.039 13.030,12.039 C12.299,12.039 11.581,11.973 10.921,11.847 C11.093,11.321 11.195,10.764 11.214,10.186 C11.796,10.271 12.404,10.314 13.030,10.314 C14.570,10.314 16.026,10.050 17.130,9.569 C17.461,9.426 17.751,9.265 18.000,9.092 L18.000,10.167 C18.000,10.575 17.516,11.029 16.705,11.382 ZM16.705,8.618 C15.732,9.041 14.427,9.274 13.030,9.274 C12.378,9.274 11.749,9.223 11.155,9.123 C11.061,8.481 10.865,7.872 10.584,7.311 C11.345,7.466 12.178,7.549 13.030,7.549 C14.570,7.549 16.026,7.285 17.130,6.804 C17.461,6.661 17.751,6.500 18.000,6.327 L18.000,7.402 C18.000,7.810 17.516,8.264 16.705,8.618 ZM16.705,5.853 C15.732,6.276 14.427,6.509 13.030,6.509 C11.789,6.509 10.604,6.321 9.675,5.979 C9.215,5.468 8.670,5.033 8.061,4.698 L8.061,3.562 C8.310,3.736 8.601,3.896 8.931,4.039 C10.035,4.520 11.491,4.785 13.030,4.785 C14.570,4.785 16.026,4.520 17.130,4.039 C17.461,3.896 17.751,3.736 18.000,3.562 L18.000,4.637 C18.000,5.045 17.516,5.499 16.705,5.853 ZM16.705,3.088 C15.732,3.511 14.427,3.744 13.030,3.744 C11.634,3.744 10.329,3.511 9.357,3.088 C8.546,2.735 8.061,2.280 8.061,1.872 C8.061,1.464 8.546,1.009 9.357,0.656 C10.329,0.233 11.634,-0.000 13.030,-0.000 C14.427,-0.000 15.732,0.233 16.705,0.656 C17.516,1.009 18.000,1.464 18.000,1.872 C18.000,2.280 17.516,2.735 16.705,3.088 Z" fill="#8ce1eb"/></svg></span>
                            Recurring Passive Income
                        </a>
                    </li>-->
                    <?php } ?>
                    <?php if(in_array(8, $this->session->userdata( 'access_level' ))){ ?>
                    <!--<li class="rcs_orange_box">	
                        <a href="<?php echo base_url('user/high-ticket-maximizer'); ?>" class="rcs_menu_link <?php echo $menu == 'high_ticket_maximizer' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg width="19" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M466.089,139.805c-25.928,25.928-67.966,25.928-93.895,0c-25.929-25.928-25.928-67.967,0-93.895L326.284,0L0,326.284 l45.911,45.911c25.928-25.928,67.967-25.928,93.895,0c25.928,25.928,25.928,67.967,0,93.895l45.91,45.91L512,185.716 L466.089,139.805z M255.519,182.946l-21.298-21.298l21.213-21.213l21.298,21.298L255.519,182.946z M298.115,225.543 l-21.299-21.298l21.213-21.213l21.299,21.298L298.115,225.543z M340.711,268.14l-21.298-21.299l21.213-21.213l21.298,21.299 L340.711,268.14z" fill="#fd907e"/></svg></span>
                            High Ticket Maximizer
                        </a>
                    </li>-->
                    <?php }else{ ?>
                    <!--<li class="rcs_orange_box">	
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto3_popup" data-open_popup="rcs_popup_open">
                            <span><svg width="19" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M466.089,139.805c-25.928,25.928-67.966,25.928-93.895,0c-25.929-25.928-25.928-67.967,0-93.895L326.284,0L0,326.284 l45.911,45.911c25.928-25.928,67.967-25.928,93.895,0c25.928,25.928,25.928,67.967,0,93.895l45.91,45.91L512,185.716 L466.089,139.805z M255.519,182.946l-21.298-21.298l21.213-21.213l21.298,21.298L255.519,182.946z M298.115,225.543 l-21.299-21.298l21.213-21.213l21.299,21.298L298.115,225.543z M340.711,268.14l-21.298-21.299l21.213-21.213l21.298,21.299 L340.711,268.14z" fill="#fd907e"/></svg></span>
                            High Ticket Maximizer
                        </a>
                    </li>-->
                    <?php } ?>
                    <?php if(in_array(9, $this->session->userdata( 'access_level' ))){ ?>
                    <!--<li class="rcs_yellow_box">
                        <a href="<?php /*echo base_url('user/traffic-booster'); */?>" class="rcs_menu_link <?php /*echo $menu == 'traffic_booster' ? 'active' : ''; */?>" data-original-title="" title="">
                            <span><svg enable-background="new 0 0 512.004 512.004" height="19" viewBox="0 0 512.004 512.004" width="19" xmlns="http://www.w3.org/2000/svg"><path fill="#ffe777" d="m130.239 138.268-44.358 3.427c-12.343.954-23.336 7.423-30.162 17.748l-51.157 77.372c-5.177 7.83-6 17.629-2.203 26.213 3.798 8.584 11.603 14.566 20.878 16.003l40.615 6.29c9.501-50.42 32.245-100.716 66.387-147.053z"/><path fill="#ffe777" d="m226.682 448.151 6.291 40.615c1.437 9.275 7.419 17.08 16.002 20.877 3.571 1.58 7.351 2.36 11.112 2.36 5.283 0 10.529-1.539 15.102-4.563l77.374-51.156c10.325-6.827 16.794-17.821 17.746-30.162l3.427-44.358c-46.338 34.143-96.633 56.887-147.054 66.387z"/><path fill="#ffe777" d="m211.407 420c1.41 0 2.828-.116 4.243-.352 21.124-3.532 41.484-9.482 60.906-17.27l-166.93-166.93c-7.788 19.421-13.738 39.781-17.27 60.906-1.392 8.327 1.401 16.81 7.37 22.78l93.144 93.144c4.956 4.955 11.645 7.722 18.537 7.722z"/><path fill="#ffe777" d="m471.178 227.003c40.849-78.974 42.362-162.43 40.227-201.57-.731-13.411-11.423-24.103-24.835-24.834-6.373-.348-13.926-.599-22.439-.599-43.766 0-113.017 6.629-179.131 40.826-52.542 27.177-121.439 87.018-162.087 165.66.48.375.949.773 1.391 1.215l180 180c.442.442.839.91 1.214 1.39 78.642-40.649 138.483-109.546 165.66-162.088zm-173.48-118.763c29.241-29.241 76.822-29.244 106.065 0 14.166 14.165 21.967 33 21.967 53.033s-7.801 38.868-21.967 53.033c-14.619 14.619-33.829 21.93-53.032 21.932-19.209.001-38.41-7.309-53.033-21.932-14.166-14.165-21.968-33-21.968-53.033s7.802-38.868 21.968-53.033z"/><path fill="#ffe777" d="m318.911 193.092c17.545 17.545 46.095 17.546 63.64 0 8.499-8.5 13.18-19.8 13.18-31.82s-4.681-23.32-13.18-31.819c-8.772-8.773-20.296-13.159-31.82-13.159-11.523 0-23.047 4.386-31.819 13.159-8.499 8.499-13.181 19.799-13.181 31.819s4.681 23.321 13.18 31.82z"/><path fill="#ffe777" d="m15.305 421.938c3.839 0 7.678-1.464 10.606-4.394l48.973-48.973c5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0l-48.973 48.973c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.394 10.607 4.394z"/><path fill="#ffe777" d="m119.765 392.239c-5.857-5.858-15.355-5.858-21.213 0l-94.155 94.155c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.393 10.607 4.393s7.678-1.464 10.606-4.394l94.154-94.154c5.859-5.858 5.859-15.355.001-21.213z"/><path fill="#ffe777" d="m143.432 437.12-48.972 48.973c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.394 10.606 4.394s7.678-1.464 10.606-4.394l48.973-48.973c5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0z"/></svg></span>
                            Traffic Booster
                        </a>
                    </li> -->
                    <?php }else{ ?>
                    <!--<li class="rcs_yellow_box">
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto7_popup" data-open_popup="rcs_popup_open">
                            <span><svg enable-background="new 0 0 512.004 512.004" height="19" viewBox="0 0 512.004 512.004" width="19" xmlns="http://www.w3.org/2000/svg"><path fill="#ffe777" d="m130.239 138.268-44.358 3.427c-12.343.954-23.336 7.423-30.162 17.748l-51.157 77.372c-5.177 7.83-6 17.629-2.203 26.213 3.798 8.584 11.603 14.566 20.878 16.003l40.615 6.29c9.501-50.42 32.245-100.716 66.387-147.053z"/><path fill="#ffe777" d="m226.682 448.151 6.291 40.615c1.437 9.275 7.419 17.08 16.002 20.877 3.571 1.58 7.351 2.36 11.112 2.36 5.283 0 10.529-1.539 15.102-4.563l77.374-51.156c10.325-6.827 16.794-17.821 17.746-30.162l3.427-44.358c-46.338 34.143-96.633 56.887-147.054 66.387z"/><path fill="#ffe777" d="m211.407 420c1.41 0 2.828-.116 4.243-.352 21.124-3.532 41.484-9.482 60.906-17.27l-166.93-166.93c-7.788 19.421-13.738 39.781-17.27 60.906-1.392 8.327 1.401 16.81 7.37 22.78l93.144 93.144c4.956 4.955 11.645 7.722 18.537 7.722z"/><path fill="#ffe777" d="m471.178 227.003c40.849-78.974 42.362-162.43 40.227-201.57-.731-13.411-11.423-24.103-24.835-24.834-6.373-.348-13.926-.599-22.439-.599-43.766 0-113.017 6.629-179.131 40.826-52.542 27.177-121.439 87.018-162.087 165.66.48.375.949.773 1.391 1.215l180 180c.442.442.839.91 1.214 1.39 78.642-40.649 138.483-109.546 165.66-162.088zm-173.48-118.763c29.241-29.241 76.822-29.244 106.065 0 14.166 14.165 21.967 33 21.967 53.033s-7.801 38.868-21.967 53.033c-14.619 14.619-33.829 21.93-53.032 21.932-19.209.001-38.41-7.309-53.033-21.932-14.166-14.165-21.968-33-21.968-53.033s7.802-38.868 21.968-53.033z"/><path fill="#ffe777" d="m318.911 193.092c17.545 17.545 46.095 17.546 63.64 0 8.499-8.5 13.18-19.8 13.18-31.82s-4.681-23.32-13.18-31.819c-8.772-8.773-20.296-13.159-31.82-13.159-11.523 0-23.047 4.386-31.819 13.159-8.499 8.499-13.181 19.799-13.181 31.819s4.681 23.321 13.18 31.82z"/><path fill="#ffe777" d="m15.305 421.938c3.839 0 7.678-1.464 10.606-4.394l48.973-48.973c5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0l-48.973 48.973c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.394 10.607 4.394z"/><path fill="#ffe777" d="m119.765 392.239c-5.857-5.858-15.355-5.858-21.213 0l-94.155 94.155c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.393 10.607 4.393s7.678-1.464 10.606-4.394l94.154-94.154c5.859-5.858 5.859-15.355.001-21.213z"/><path fill="#ffe777" d="m143.432 437.12-48.972 48.973c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.394 10.606 4.394s7.678-1.464 10.606-4.394l48.973-48.973c5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0z"/></svg></span>
                            Traffic Booster
                        </a>
                    </li>-->
                    <?php } ?>
                    <?php if(in_array(7, $this->session->userdata( 'access_level' ))){ ?>
                    <!--<li class="rcs_purple_box">	
                        <a href="<?php echo base_url('user/resellerRights'); ?>" class="rcs_menu_link <?php echo $menu == 'reseller_rights' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="19" height="20" viewBox="0 0 19 20"><path d="M18.522,13.309 C17.789,13.734 17.051,14.152 16.314,14.573 C14.621,15.539 12.942,16.530 11.225,17.453 C10.747,17.710 10.168,17.836 9.621,17.894 C8.929,17.968 8.223,17.912 7.523,17.912 C7.523,17.914 7.523,17.916 7.523,17.918 C6.763,17.918 6.003,17.907 5.243,17.923 C4.960,17.929 4.829,17.833 4.726,17.563 C4.253,16.329 3.749,15.106 3.264,13.877 C3.219,13.762 3.176,13.604 3.219,13.503 C3.712,12.343 4.645,11.232 6.229,11.230 C6.363,11.230 6.509,11.214 6.628,11.260 C7.995,11.786 9.425,11.560 10.830,11.616 C11.514,11.643 11.801,11.979 11.654,12.643 C11.585,12.954 11.415,13.139 11.067,13.135 C10.397,13.126 9.727,13.135 9.056,13.132 C8.702,13.131 8.415,13.240 8.400,13.636 C8.385,14.049 8.682,14.148 9.033,14.148 C9.719,14.148 10.404,14.165 11.089,14.144 C11.335,14.136 11.596,14.080 11.820,13.979 C13.190,13.363 14.547,12.720 15.916,12.103 C16.718,11.742 17.549,11.682 18.397,11.944 C18.699,12.037 18.956,12.162 18.995,12.519 C19.036,12.900 18.821,13.135 18.522,13.309 ZM3.881,19.159 C3.377,19.411 2.889,19.695 2.330,20.000 C1.553,18.046 0.788,16.123 -0.000,14.143 C0.613,13.806 1.218,13.473 1.868,13.116 C2.135,13.793 2.389,14.438 2.645,15.082 C3.118,16.268 3.584,17.457 4.071,18.637 C4.181,18.902 4.137,19.032 3.881,19.159 Z" fill="#8555da"/><path d="M14.037,9.148 C11.588,9.173 9.525,7.146 9.503,4.693 C9.480,2.111 11.456,0.022 13.939,0.001 C16.457,-0.020 18.516,1.984 18.545,4.483 C18.575,7.068 16.589,9.122 14.037,9.148 ZM15.147,3.529 C15.225,3.332 15.302,3.108 15.401,2.894 C15.513,2.652 15.454,2.486 15.200,2.419 C14.765,2.302 14.435,2.114 14.584,1.570 C14.202,1.570 13.884,1.570 13.514,1.570 C13.644,2.065 13.413,2.299 13.043,2.558 C12.317,3.065 12.371,4.146 13.105,4.650 C13.385,4.841 13.730,4.939 14.005,5.134 C14.157,5.242 14.228,5.464 14.336,5.634 C14.144,5.713 13.937,5.880 13.765,5.850 C13.439,5.794 13.133,5.623 12.817,5.499 C12.246,6.635 12.340,6.493 13.241,6.882 C13.355,6.931 13.443,7.086 13.496,7.212 C13.543,7.324 13.525,7.463 13.537,7.590 C13.879,7.590 14.184,7.590 14.405,7.590 C14.529,7.284 14.559,6.920 14.746,6.802 C15.291,6.456 15.603,6.024 15.570,5.380 C15.537,4.724 15.129,4.335 14.569,4.070 C14.354,3.969 14.133,3.878 13.932,3.753 C13.846,3.700 13.806,3.573 13.744,3.479 C13.849,3.413 13.963,3.279 14.056,3.292 C14.404,3.340 14.744,3.437 15.147,3.529 Z" fill="#ab7cff"/></svg></span>
                            Reseller Rights
                        </a>
                    </li>-->
                    <?php }else{ ?>
                    <!--<li class="rcs_purple_box">	
                        <a href="javascript:;" class="rcs_menu_link rcs_popup_btn" data-main_popup="rcs_oto8_popup" data-open_popup="rcs_popup_open">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="19" height="20" viewBox="0 0 19 20"><path d="M18.522,13.309 C17.789,13.734 17.051,14.152 16.314,14.573 C14.621,15.539 12.942,16.530 11.225,17.453 C10.747,17.710 10.168,17.836 9.621,17.894 C8.929,17.968 8.223,17.912 7.523,17.912 C7.523,17.914 7.523,17.916 7.523,17.918 C6.763,17.918 6.003,17.907 5.243,17.923 C4.960,17.929 4.829,17.833 4.726,17.563 C4.253,16.329 3.749,15.106 3.264,13.877 C3.219,13.762 3.176,13.604 3.219,13.503 C3.712,12.343 4.645,11.232 6.229,11.230 C6.363,11.230 6.509,11.214 6.628,11.260 C7.995,11.786 9.425,11.560 10.830,11.616 C11.514,11.643 11.801,11.979 11.654,12.643 C11.585,12.954 11.415,13.139 11.067,13.135 C10.397,13.126 9.727,13.135 9.056,13.132 C8.702,13.131 8.415,13.240 8.400,13.636 C8.385,14.049 8.682,14.148 9.033,14.148 C9.719,14.148 10.404,14.165 11.089,14.144 C11.335,14.136 11.596,14.080 11.820,13.979 C13.190,13.363 14.547,12.720 15.916,12.103 C16.718,11.742 17.549,11.682 18.397,11.944 C18.699,12.037 18.956,12.162 18.995,12.519 C19.036,12.900 18.821,13.135 18.522,13.309 ZM3.881,19.159 C3.377,19.411 2.889,19.695 2.330,20.000 C1.553,18.046 0.788,16.123 -0.000,14.143 C0.613,13.806 1.218,13.473 1.868,13.116 C2.135,13.793 2.389,14.438 2.645,15.082 C3.118,16.268 3.584,17.457 4.071,18.637 C4.181,18.902 4.137,19.032 3.881,19.159 Z" fill="#8555da"/><path d="M14.037,9.148 C11.588,9.173 9.525,7.146 9.503,4.693 C9.480,2.111 11.456,0.022 13.939,0.001 C16.457,-0.020 18.516,1.984 18.545,4.483 C18.575,7.068 16.589,9.122 14.037,9.148 ZM15.147,3.529 C15.225,3.332 15.302,3.108 15.401,2.894 C15.513,2.652 15.454,2.486 15.200,2.419 C14.765,2.302 14.435,2.114 14.584,1.570 C14.202,1.570 13.884,1.570 13.514,1.570 C13.644,2.065 13.413,2.299 13.043,2.558 C12.317,3.065 12.371,4.146 13.105,4.650 C13.385,4.841 13.730,4.939 14.005,5.134 C14.157,5.242 14.228,5.464 14.336,5.634 C14.144,5.713 13.937,5.880 13.765,5.850 C13.439,5.794 13.133,5.623 12.817,5.499 C12.246,6.635 12.340,6.493 13.241,6.882 C13.355,6.931 13.443,7.086 13.496,7.212 C13.543,7.324 13.525,7.463 13.537,7.590 C13.879,7.590 14.184,7.590 14.405,7.590 C14.529,7.284 14.559,6.920 14.746,6.802 C15.291,6.456 15.603,6.024 15.570,5.380 C15.537,4.724 15.129,4.335 14.569,4.070 C14.354,3.969 14.133,3.878 13.932,3.753 C13.846,3.700 13.806,3.573 13.744,3.479 C13.849,3.413 13.963,3.279 14.056,3.292 C14.404,3.340 14.744,3.437 15.147,3.529 Z" fill="#ab7cff"/></svg></span>
                            Reseller Rights
                        </a>
                    </li> -->
                    <?php } ?>
                </ul>
            </div>
            <div class="rcs_profile_wrapper">
                <div class="rcs_profile_box">
                    <div class="rcs_profile_img">
                        <div class="rcs_profile_short_name"><?php echo $short_nm; ?></div>
                        <?php if(!empty($profile_img)){ ?>
                            <img src="<?php echo base_url($profile_img); ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="rcs_profile_user">
                        <h4><?php echo $name; ?></h4>
                        <p title="<?php echo $this->session->userdata( 'email' ); ?>"><?php echo $this->session->userdata( 'email' ); ?></p>
                    </div>
                    <span class="fas fa-caret-down"></span>
                </div>
                <div class="rcs_profile_edit">
                    <a href="<?php echo base_url('user/profile'); ?>" class="rcs_edit_profile"><img src="<?php echo base_url('assets/images/edit.svg');?>" alt=""> Edit Profile</a>
                    <a href="<?php echo base_url('user/logout'); ?>" class="rcs_logout"><img src="<?php echo base_url('assets/images/logout.svg');?>" alt=""> Logout</a>
                </div>
            </div>
        </div>
        <!---------- header sidebar end ---------->