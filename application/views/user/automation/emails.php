<div class="rcs_main_wrapper">
    <!---------- content section start ---------->
    <?php //echo"<pre>";print_r($total_product);die; ?>
        <!---------- content section start ---------->
        <!---------- content section end ---------->
    <div class="rcs_content_wrapper rcs_integration_wrapper ">
    <?php if(!empty($autoresponder_data)){?>
        <div class="rcs_content_box rcs_automation_box rcs_middle_box_inner " >
            <div class="rcs_white_box">
                <div class="">
                    <h2><?php echo $site[0]['site_name']; ?></h2>
                </div>
                <div class="rcs_custom_tab rcs_automation_tab rcs_mailelist_wrap">
                <form class="rcs_create_automation" method="post" >

                    <div class="rcs_input_field hide">
                        <label>Select Auto-responder</label>
                        <select name="autoresponder_name" id="autoresponder_mailign_ligt" class="rcs_custom_input autoresponder_name" data-req="1" data-msg="Auto responder is required">
                            <option value="">Select Auto-responder</option>
                            <?php if(!empty($autoresponder_data)){?>
                                <?php foreach($autoresponder_data as $responder){ ?>
                                    <option value="<?php echo $responder['name'];?>" ><?php echo $responder['name'];?></option>
                                <?php } ?>                                                    
                            <?php } ?>                                                    
                        </select>
                    </div>

                    <div class="rcs_input_field hide">
                        <label>Select Mailing List</label>
                        <select name="autoresponse_mailing_list" id="autoresponse_mailing_list" class="rcs_custom_input autoresponse_mailing_list rcs_selected_list" data-req="1" data-msg="Mailing List is required">                    
                        </select>
                    </div>

                    <div class="rcs_selected_autoresponder ">
                        
                        <!-- <h2>Mailing List Of Selected Auto Responder</h2> -->
                        <h2>Mailing List Of Selected Follow Up Emails</h2>
                        <p>Niche - <?php echo $category[0]['name']; ?></p>
                        <div class="rcs_tab_menu">
                             <a class="rcs_mailList_close hide" href="<?php echo base_url();?>user/automation"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span></a>
                            <div class="rcs_tab_content">
                                <div class="rcs_tab_section">

                                    <?php if($scheduleEmails){ ?>
                                        <?php foreach($scheduleEmails as $email){ ?>
                                            <div class="rcs_article_box rcs_popup_btn rcs_get_email_data" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open" data-id="<?php echo $email['sse_id']; ?>">
                                                <h5><?php echo $email['subject']; ?></h5>
                                                <p><?php echo substr($email['content'], 0, 100); ?></p>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="rcs_table_footer rcs_schedule_mailing hide" >
                            <div>
                                <h4>Schedule Mailing</h4>
                                <p>Emails will be set 24 hours interval for each email</p>
                            </div>
                            <div class="rcs_input_field rcs_time">
                                <label>Time</label>
                                <input type="time" min="1" max="24"  class="rcs_custom_input rcs_schedule_time rcs_input" data-req="1" data-msg="Article Schedule Time is required." name="time">
                                <!-- <span class="far fa-clock"></span> -->
                            </div>
                        </div>

                        <div class="rcs_input_field text-center hide">
                            <input type="hidden" value="<?php echo $this->uri->segment(3);?>" class="rcs_custom_input rcs_input" name="s_id">
                            <button type="submit" class="rcs_btn">Upload & schedule  to broadcast</button>                    
                        </div>
                    </div>
                    </form>
                </div>
                <!-- <a href="javascript:;" class="rcs_btn">Download</a> -->
            </div>
        </div>
        <?php }else{ ?>
            <div class="rcs_content_box rcs_empty_box rcs_full_width">
                <div class="rcs_white_box">
                    <div class="rcs_empty_box_img">
                        <img src="<?= base_url();?>assets/images/empty_box.png" alt="empty box">
                    </div>
                    <div class="rcs_empty_box_txt">
                        <!-- <h3>Not any page is created yet</h3> -->
                        <p>There are no any connection is available for this website. If you want to create a connection then click button below.</p>
                        <div class="rcs_input_field">
                            <a href="<?php echo base_url();?>user/integrations" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Create Connection</a>
                        </div>
                    </div>
                </div> 
            </div>
        <?php } ?>
    </div>
</div>


<div class="rcs_popup_wrapper rcs_emailcontent_popup">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_board_box">
            <!-- <h4 class="rcs_popup_heading">Add User</h4> -->
            <form action="">
                <div class="rcs_form_group">
                    <div class="rcs_popup_create_web_info_box " id="rcs_email_contents">
                        <label><span class="rcs_mailing_subject"></span></label>
                        <br>
                        <br>
                        <span class="rcs_mailing_content"></span>
                     </div>
                    <!-- <label class="rcs_mailing_subject  rcs_email_subject">Email title here 01</label>
                    <div class="rcs_popup_create_web_info_box rcs_mailing_content  rcs_email_content">
                        <p>Hi there,John!</p>
                        <br>
                        <p>Here is the dome dummy content Short Description of product in
                            these Names lorem Ipsum the in the lorem part of the texts mails
                            of has been industry and the particular bame the par of news the
                            standard dummy text..</p>
                        <br>
                        <p>Thank you</p> 
                        <p>Doe</p>
                    </div> -->
                    <div class="rcs_input_field">

                        <button class="rcs_btn rcs_email_content_copy" onclick="copy_data(rcs_email_contents)"> 
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15" height="14" viewBox="0 0 15 14"> <defs><style>.cls-1{fill:#fff;fill-rule:evenodd}</style></defs> <path d="M14.161,4.644 L9.320,9.239 C8.584,9.934 7.609,10.317 6.574,10.317 L4.970,10.317 C4.504,10.317 4.124,9.957 4.124,9.514 L4.124,7.992 C4.124,7.009 4.527,6.084 5.259,5.387 L10.107,0.786 C10.657,0.263 11.396,-0.016 12.189,0.001 C12.938,0.015 13.638,0.297 14.160,0.792 C15.279,1.855 15.279,3.583 14.161,4.644 ZM9.560,3.575 L6.456,6.521 C6.043,6.914 5.815,7.436 5.815,7.992 L5.815,8.712 L6.574,8.712 C7.159,8.712 7.710,8.496 8.125,8.103 L11.228,5.158 L9.560,3.575 ZM12.965,1.927 C12.742,1.716 12.446,1.600 12.131,1.600 C12.131,1.600 12.131,1.600 12.130,1.600 C11.815,1.600 11.519,1.716 11.296,1.927 L10.756,2.440 L12.424,4.023 L12.965,3.510 C13.424,3.074 13.424,2.363 12.965,1.927 ZM6.438,2.447 L2.277,2.447 C1.954,2.447 1.691,2.697 1.691,3.004 L1.691,11.838 C1.691,12.145 1.954,12.395 2.277,12.395 L10.154,12.395 C10.478,12.395 10.741,12.145 10.741,11.838 L10.741,9.704 C10.741,9.261 11.120,8.901 11.586,8.901 C12.052,8.901 12.432,9.261 12.432,9.704 L12.432,11.838 C12.432,13.030 11.410,14.000 10.154,14.000 L2.277,14.000 C1.021,14.000 -0.000,13.030 -0.000,11.838 L-0.000,3.004 C-0.000,1.812 1.021,0.842 2.277,0.842 L6.438,0.842 C6.904,0.842 7.283,1.202 7.283,1.645 C7.283,2.088 6.904,2.447 6.438,2.447 Z" class="cls-1"/> </svg></span> COPY EMAIL CONTENT</button>
                        <!-- <button type="submit" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_editemailcontent_popup" data-open_popup="rcs_popup_open"> -->
                        <!-- <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15" height="14" viewBox="0 0 15 14"> <defs><style>.cls-1{fill:#fff;fill-rule:evenodd}</style></defs> <path d="M14.161,4.644 L9.320,9.239 C8.584,9.934 7.609,10.317 6.574,10.317 L4.970,10.317 C4.504,10.317 4.124,9.957 4.124,9.514 L4.124,7.992 C4.124,7.009 4.527,6.084 5.259,5.387 L10.107,0.786 C10.657,0.263 11.396,-0.016 12.189,0.001 C12.938,0.015 13.638,0.297 14.160,0.792 C15.279,1.855 15.279,3.583 14.161,4.644 ZM9.560,3.575 L6.456,6.521 C6.043,6.914 5.815,7.436 5.815,7.992 L5.815,8.712 L6.574,8.712 C7.159,8.712 7.710,8.496 8.125,8.103 L11.228,5.158 L9.560,3.575 ZM12.965,1.927 C12.742,1.716 12.446,1.600 12.131,1.600 C12.131,1.600 12.131,1.600 12.130,1.600 C11.815,1.600 11.519,1.716 11.296,1.927 L10.756,2.440 L12.424,4.023 L12.965,3.510 C13.424,3.074 13.424,2.363 12.965,1.927 ZM6.438,2.447 L2.277,2.447 C1.954,2.447 1.691,2.697 1.691,3.004 L1.691,11.838 C1.691,12.145 1.954,12.395 2.277,12.395 L10.154,12.395 C10.478,12.395 10.741,12.145 10.741,11.838 L10.741,9.704 C10.741,9.261 11.120,8.901 11.586,8.901 C12.052,8.901 12.432,9.261 12.432,9.704 L12.432,11.838 C12.432,13.030 11.410,14.000 10.154,14.000 L2.277,14.000 C1.021,14.000 -0.000,13.030 -0.000,11.838 L-0.000,3.004 C-0.000,1.812 1.021,0.842 2.277,0.842 L6.438,0.842 C6.904,0.842 7.283,1.202 7.283,1.645 C7.283,2.088 6.904,2.447 6.438,2.447 Z" class="cls-1"/> </svg></span> EDIT EMAIL CONTENT</button> -->
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>
<div class="rcs_popup_wrapper rcs_editemailcontent_popup">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_board_box">
            <!-- <h4 class="rcs_popup_heading">Add User</h4> -->
            <form action="" id="rcs_edit_email">
                <h4 class="rcs_popup_heading">Edit Email Content</h4>
                <div class="rcs_input_field ">
                    <label>Email Title</label>
                    <input type="text" placeholder="Here is the email title" class="rcs_custom_input" data-req="1" data-msg="Email title is required." name="email_subject">
                </div>
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>Description</label>
                        <textarea name="email_content"></textarea>
                    </div>
                    <div class="rcs_input_field">
                        <input type="hidden" value="" name="sse_id">
                        <button type="submit" class="rcs_btn"><span class="far fa-save"></span> SAVE CHANGES</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>