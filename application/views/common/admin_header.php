<!DOCTYPE html>
<html lang="en">
<head>
    <title>Push Buttons - <?php echo $title?></title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/pushbutton_favicon.png');?>">
</head>
<body>
    <div class="rcs_main_wrapper">
    
        <!---------- header sidebar start ---------->
        <div class="rcs_header_sidebar">
            <div class="rcs_hsidebar_logo"> 
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url('assets/images/pushbutton_logo.png');?>" alt="" class="rcs_desktop_logo">
                    <img src="<?php echo base_url('assets/images/pushbutton_favicon.png');?>" alt="" class="rcs_mobile_logo">
                </a>
            </div>
            <div class="rcs_header_menu_box">
                <ul>
                    <li class="rcs_cyan_box">	
                        <a href="<?php echo base_url('admin/users'); ?>" class="rcs_menu_link <?php echo $menu == 'admin_user' ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15" height="16" viewBox="0 0 15 16"><path d="M13.979,16.000 L9.604,16.000 C9.041,16.000 8.583,15.542 8.583,14.979 L8.583,12.354 C8.583,11.791 9.041,11.333 9.604,11.333 L13.979,11.333 C14.542,11.333 15.000,11.791 15.000,12.354 L15.000,14.979 C15.000,15.542 14.542,16.000 13.979,16.000 ZM5.396,4.667 L1.021,4.667 C0.458,4.667 -0.000,4.209 -0.000,3.646 L-0.000,1.021 C-0.000,0.458 0.458,-0.000 1.021,-0.000 L5.396,-0.000 C5.959,-0.000 6.417,0.458 6.417,1.021 L6.417,3.646 C6.417,4.209 5.959,4.667 5.396,4.667 Z" fill="#3cceff"/><path d="M13.979,9.167 L9.604,9.167 C9.041,9.167 8.583,8.709 8.583,8.146 L8.583,1.021 C8.583,0.458 9.041,-0.000 9.604,-0.000 L13.979,-0.000 C14.542,-0.000 15.000,0.458 15.000,1.021 L15.000,8.146 C15.000,8.709 14.542,9.167 13.979,9.167 ZM5.396,16.000 L1.021,16.000 C0.458,16.000 -0.000,15.542 -0.000,14.979 L-0.000,7.854 C-0.000,7.291 0.458,6.833 1.021,6.833 L5.396,6.833 C5.959,6.833 6.417,7.291 6.417,7.854 L6.417,14.979 C6.417,15.542 5.959,16.000 5.396,16.000 Z" fill="#a6e9ff"/></svg></span>
                            Users
                        </a>
                    </li>
                    <li class="rcs_pink_box">
                        <a href="<?php echo base_url('admin/articles'); ?>" class="rcs_menu_link <?php echo ($menu == 'articles') ? 'active' : ''; ?>" data-original-title="" title="">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="17" viewBox="0 0 14 17"><path d="M12.250,3.667 L4.932,3.667 C3.966,3.667 3.182,4.489 3.182,5.500 L3.182,15.167 C3.182,16.178 3.966,17.000 4.932,17.000 L12.250,17.000 C13.215,17.000 14.000,16.178 14.000,15.167 L14.000,5.500 C14.000,4.489 13.215,3.667 12.250,3.667 L12.250,3.667 ZM10.977,15.000 L6.204,15.000 C5.941,15.000 5.727,14.776 5.727,14.500 C5.727,14.224 5.941,14.000 6.204,14.000 L10.977,14.000 C11.241,14.000 11.454,14.224 11.454,14.500 C11.454,14.776 11.241,15.000 10.977,15.000 L10.977,15.000 ZM10.977,12.333 L6.204,12.333 C5.941,12.333 5.727,12.109 5.727,11.833 C5.727,11.557 5.941,11.333 6.204,11.333 L10.977,11.333 C11.241,11.333 11.454,11.557 11.454,11.833 C11.454,12.109 11.241,12.333 10.977,12.333 L10.977,12.333 ZM10.977,10.000 L6.204,10.000 C5.941,10.000 5.727,9.776 5.727,9.500 C5.727,9.224 5.941,9.000 6.204,9.000 L10.977,9.000 C11.241,9.000 11.454,9.224 11.454,9.500 C11.454,9.776 11.241,10.000 10.977,10.000 L10.977,10.000 ZM10.977,7.333 L6.204,7.333 C5.941,7.333 5.727,7.109 5.727,6.833 C5.727,6.557 5.941,6.333 6.204,6.333 L10.977,6.333 C11.241,6.333 11.454,6.557 11.454,6.833 C11.454,7.109 11.241,7.333 10.977,7.333 L10.977,7.333 Z" fill="#be63f9"/><path d="M1.909,5.500 C1.861,3.223 1.843,1.995 4.000,2.000 L11.000,2.000 C10.790,1.233 9.798,-0.000 9.000,-0.000 L2.000,-0.000 C1.034,-0.000 -0.000,0.989 -0.000,2.000 L-0.000,13.167 C-0.000,14.178 0.785,15.000 1.750,15.000 L1.909,15.000 L1.909,5.500 Z" fill="#d9a4fc"/></svg></span>
                            Articles
                        </a>
                    </li>
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
                        <p><?php echo $this->session->userdata( 'email' ); ?></p>
                    </div>
                    <span class="fas fa-caret-down"></span>
                </div>
                <div class="rcs_profile_edit">
                    <a href="<?php echo base_url('admin/profile'); ?>" class="rcs_edit_profile"><img src="<?php echo base_url('assets/images/edit.svg');?>" alt=""> Edit Profile</a>
                    <a href="<?php echo base_url('admin/logout'); ?>" class="rcs_logout"><img src="<?php echo base_url('assets/images/logout.svg');?>" alt=""> Logout</a>
                </div>
            </div>
        </div>
        <!---------- header sidebar end ---------->