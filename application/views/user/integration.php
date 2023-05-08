<!---------- content section start ---------->
<div class="rcs_content_wrapper rcs_middle_box rcs_integration_wrapper">
    <div class="rcs_content_box rcs_integration_box rcs_middle_box_inner">
        <div class="rcs_table_head">
            <h2>Integrations</h2>
        </div>
        <div class="rcs_integration_body">
            <p>Update Affiliate Network ID</p>
            <div class="rcs_integration_logo_section">
                <div class="rcs_row">
                    <div class="rcs_col4">
                        <div class="rcs_integration_logo_box">
                            <span><img src="<?php echo base_url();?>assets/images/integration_img1.png" alt="" /></span>
                            <a class="rcs_btn rcs_popup_btn <?php echo !empty($affiliate['ClickBank']) ? 'rcs_yellow_btn' : ''; ?>" data-main_popup="rcs_integration_cb_popup" data-open_popup="rcs_popup_open" href="javascript:;"><?php echo !empty($affiliate['ClickBank']) ? 'Update Affiliate ID' : 'Add Affiliate ID'; ?></a>
                        </div>
                    </div>
                    <div class="rcs_col4 hide">
                        <div class="rcs_integration_logo_box">
                            <span><img src="<?php echo base_url();?>assets/images/integration_img2.png" alt="" /></span>
                            <a class="rcs_btn rcs_popup_btn" data-main_popup="rcs_integration_wp_popup" data-open_popup="rcs_popup_open" href="javascript:;">update Affiliate</a>
                        </div>
                    </div>
                    <div class="rcs_col4">
                        <div class="rcs_integration_logo_box">
                            <span><img src="<?php echo base_url();?>assets/images/integration_img3.png" alt="" /></span>
                            <a class="rcs_btn rcs_popup_btn <?php echo !empty($affiliate['DigiStore24']) ? 'rcs_yellow_btn' : ''; ?>" data-main_popup="rcs_integration_ds_popup" data-open_popup="rcs_popup_open" href="javascript:;"><?php echo !empty($affiliate['DigiStore24']) ? 'Update Affiliate ID' : 'Add Affiliate ID'; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rcs_integration_body rcs_integration_row2">
            <p>Connect Autoresponder</p>
            <div class="rcs_integration_logo_section">
                <div class="rcs_row">
                    <?php foreach($list as $l){ ?>
                        <div class="rcs_col4">
                            <div class="rcs_integration_logo_box rcs_autoresponder_box <?php echo $l; ?>">
                                <span></span>
                                <?php if(in_array($l, $selected)){ ?>
                                    <a href="javascript:;" class="rcs_btn rcs_popup_btn rcs_autoresponsder rcs_yellow_btn active" data-arname="<?php echo $l; ?>">
                                        Disconnect <?php echo $l; ?>
                                    </a>
                                <?php }else{ ?>
                                    <a href="javascript:;" class="rcs_btn rcs_popup_btn rcs_autoresponsder" data-arname="<?php echo $l; ?>">
                                        Connect <?php echo $l; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>             
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if(in_array(3, $this->session->userdata( 'access_level' ))){ ?>
        <div class="rcs_integration_share_body rcs_integration_row2">
            <p>Connect Facebook Account</p>
            <div class="rcs_integration_share_box">
                <?php if($facebook_auth_url == ''){ ?>
                    <div class="rcs_integration_details">
                        <h4><?php echo $facebook_users['name']; ?></h4>
                        <p title="<?php echo $facebook_users['email']; ?>"><?php echo $facebook_users['email']; ?></p>
                        <div class="rcs_integration_detail_img"><img src="<?php echo $facebook_users['picture']; ?>" alt="<?php echo $facebook_users['name']; ?>"></div>
                    </div>
                    <div class="integration_btn">
                        <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_disconnect_facebook">Disconnect</a>
                    </div>
                <?php }else{ ?>
                    <div class="rcs_integration_share_icon">
                        <span><i class="fab fa-facebook-f"></i></span>
                        <div class="rcs_integration_share_txt">
                            <p class="rcs_integration_share_txt1">Connect facebook account</p>
                            <p class="rcs_integration_share_txt2">Connect facebook account to start posting.</p>                           
                        </div>
                    </div>
                    <div class="rcs_integration_share_btn">
                        <a class="rcs_btn" href="<?php echo $facebook_auth_url; ?>">Connect</a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

    </div>
</div>
<!---------- content section end ---------->

<div class="rcs_popup_wrapper rcs_integration_cb_popup">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_pop_box">
            <h4 class="rcs_popup_heading rcs_popup_heading2">ClickBank Integrations</h4>
            <form action="ajax/saveIntegration" class="rcs_integration_network">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>ClickBank Network ID</label>
                        <input type="text" placeholder="Please enter affiliate id" class="rcs_custom_input rcs_input" name="ClickBank" data-req="1" data-msg="Affiliate ID is required." value="<?php echo isset($affiliate['ClickBank']) ? $affiliate['ClickBank'] : ''; ?>">
                        <p><a href="https://support.clickbank.com/hc/en-us/articles/115010826808-What-is-my-Affiliate-ID-" target="_blank">How do I find this information?</a></p>
                    </div>
                    <div class="rcs_input_field rcs_integration_popup_btn">
                        <button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg>Save</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div> 

<div class="rcs_popup_wrapper rcs_integration_wp_popup hide">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_pop_box">
            <h4 class="rcs_popup_heading rcs_popup_heading2">WarriorPlus Integrations</h4>
            <form action="ajax/saveIntegration" class="rcs_integration_network">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>WarriorPlus Network ID</label>
                        <input type="text" placeholder="Please enter affiliate id" class="rcs_custom_input rcs_input" name="WarriorPlus" data-req="1" data-msg="Affiliate ID is required." value="<?php echo isset($affiliate['WarriorPlus']) ? $affiliate['WarriorPlus'] : ''; ?>">
                        <p><a href="https://help.warriorplus.com/en/articles/1939294-how-do-i-find-my-affiliate-or-vendor-id" target="_blank">How do I find this information?</a></p>
                    </div>
                    <div class="rcs_input_field rcs_integration_popup_btn">
                        <button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg>Save</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div> 

<div class="rcs_popup_wrapper rcs_integration_ds_popup">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_pop_box">
            <h4 class="rcs_popup_heading rcs_popup_heading2">DigiStore24 Integrations</h4>
            <form action="ajax/saveIntegration" class="rcs_integration_network">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>DigiStore24 Network ID</label>
                        <input type="text" placeholder="Please enter affiliate id" class="rcs_custom_input rcs_input" name="DigiStore24" data-req="1" data-msg="Affiliate ID is required." value="<?php echo isset($affiliate['DigiStore24']) ? $affiliate['DigiStore24'] : ''; ?>">
                        <p><a href="https://docs.digistore24.com/knowledge-base/promolink-and-content-link-for-vendors/?lang=en" target="_blank">How do I find this information?</a></p>
                    </div>
                    <div class="rcs_input_field rcs_integration_popup_btn">
                        <button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg>Save</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div> 

<div id="Aweber_popup" class="rcs_popup_wrapper">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_pop_box">
            <h4 class="rcs_popup_heading rcs_popup_heading2">Aweber Integrations</h4>
            <a href="<?php echo base_url('aweber'); ?>" class="rcs_btn"> Click here to authenticate </a>
        </div>
    </div>
</div> 

<div id="GetResponse_popup" class="rcs_popup_wrapper">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_pop_box">
            <h4 class="rcs_popup_heading rcs_popup_heading2">GetResponse Integrations</h4>
            <p class="rcs_popup_text">Enter API code and connect your GetResponse.</p>
            <form id="GetResponse" action="">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>API Key:</label>
                        <input type="text" placeholder="Enter API Key" class="rcs_custom_input api_key" data-req="1" data-msg="API code is required.">
                        <p><a href="https://www.getresponse.com/help/where-do-i-find-the-api-key.html" target="_blank">How do I find this information?</a></p>
                    </div>
                    <div class="rcs_input_field rcs_integration_popup_btn">
                        <button type="submit" class="rcs_btn rcs_autoResponder_connect" data-responder="GetResponse"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg>Connect Integrations</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div> 

<div id="Mailchimp_popup" class="rcs_popup_wrapper">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_pop_box">
            <h4 class="rcs_popup_heading rcs_popup_heading2">Mailchimp Integrations</h4>
            <p class="rcs_popup_text">Enter API code and connect your Mailchimp.</p>
            <form id="Mailchimp" action="">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>API Key:</label>
                        <input type="text" placeholder="Enter API Key" class="rcs_custom_input api_key" data-req="1" data-msg="API code is required.">
                        <p><a href="https://www.getresponse.com/help/where-do-i-find-the-api-key.html" target="_blank">How do I find this information?</a></p>
                    </div>
                    <div class="rcs_input_field rcs_integration_popup_btn">
                        <button type="submit" class="rcs_btn rcs_autoResponder_connect" data-responder="Mailchimp"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg>Connect Integrations</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div> 