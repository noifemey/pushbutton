      <?php //echo"<pre>"; print_r($autoresponder_data);die;?>
        <!---------- content section start ---------->
        <div class="rcs_content_wrapper">
            <div class="rcs_step_list">
                <ul>
                <?php if($this->uri->segment(3) != ''){ ?>
                    <li class="active"><a href="<?php echo base_url();?>user/create_site/<?php echo $this->uri->segment(3);?>">Create</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site_header/<?php echo $this->uri->segment(3);?>">Header</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site-design/<?php echo $this->uri->segment(3);?>">Design</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site-article/<?php echo $this->uri->segment(3);?>">Create Content</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>">Create Pages</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site-banner/<?php echo $this->uri->segment(3);?>">Banner Ads</a></li>
                    <li class="current_active"><a href="<?php echo base_url();?>user/site-autoresponder/<?php echo $this->uri->segment(3);?>">Optin, Share and Publish</a></li>
                <?php }else{ ?>
                    <li class="active"><a href="javascript:;">Create</a></li>
                    <li class="active"><a href="javascript:;">Header</a></li>
                    <li class="active"><a href="javascript:;">Design</a></li>
                    <li class="active"><a href="javascript:;">Create Articles</a></li>
                    <li class="active"><a href="javascript:;">Create Pages</a></li>
                    <li class="active"><a href="javascript:;">Banner Ads</a></li>
                    <li class="current_active"><a href="javascript:;">Optin, Share and Publish</a></li>
                <?php } ?>
                </ul>
            </div>
            <?php if(empty($autoresponder_data)){?>
                <div class="rcs_content_box rcs_empty_box rcs_full_width">
                    <div class="rcs_white_box">
                        <div class="rcs_empty_box_img">
                            <img src="<?= base_url();?>assets/images/empty_box.png" alt="empty box">
                        </div>
                        <div class="rcs_empty_box_txt">
                            <!-- <h3>Not any page is created yet</h3> -->
                            <p>Please connect your autoresponder account on integration page to complete Optin form settings.</p>
                            <div class="rcs_input_field">
                                <a href="<?php echo base_url();?>user/integrations" class="rcs_btn rcs_connect_integration_page"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Connect Autoresponder</a>
                            </div>
                        </div>
                    </div> 
                </div>
            <?php }else{ ?>
            <div class="rcs_create_site_box rcs_site_step6">
            <form id="rcs_autoresponder_form" method="post">
                <div class="rcs_content_box">
                    <div class="rcs_white_box">
                        <h2>Optin, Share and Publish</h2>
                            <div class="rcs_row">
                                <div class="rcs_col8">
                                    <div class="rcs_row">
                                        <div class="rcs_col">
                                            <div class="rcs_input_field">
                                                <label>Select Auto-responder </label>
                                                <select name="autoresponder_name" id="autoresponder_mailign_ligt" class="rcs_custom_input autoresponder_name rcs_input" >
                                                <!-- data-req="1" data-msg="Auto responder is required" -->
                                                    <option value="">Select Auto-responder</option>
                                                    <?php for ($i=0; $i < count($autoresponder_data); $i++) {  ?>
                                                        <option value="<?php echo $autoresponder_data[$i]['name'];?>" <?php echo (isset($autoresponder->autoresponder_name) && $autoresponder->autoresponder_name == $autoresponder_data[$i]['name'])? 'selected': '';?> ><?php echo $autoresponder_data[$i]['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="rcs_col">
                                            <div class="rcs_input_field">
                                                <label>Select Mailing List </label>
                                                <select name="autoresponse_mailing_list" id="autoresponse_mailing_list" class="rcs_custom_input autoresponse_mailing_list rcs_input" >
                                                <!-- data-req="1" data-msg="Mailing List is required" -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!------ sliding option form start----------->
                                    <div class="rcs_optin_form_box">
                                        <h2 class="rcs_above_input_heading">Select Optin Form</h2> 
                                        <div class="rcs_optin_toggle">
                                            <h4>Sliding Optin Form</h4>
                                            <div class="rcs_custom_toggle">
                                                <label>
                                                    <input type="checkbox" class="rcs_sliding_checkbox" value="sliding" <?php echo (isset($autoresponder->sliding_checkbox) && $autoresponder->sliding_checkbox == 1)? 'checked': '';?>>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="rcs_optin_form_main" <?php echo (isset($autoresponder->sliding_checkbox) && $autoresponder->sliding_checkbox == 1)? 'style="display:block;"': '';?>>
                                            <!-- <form id="rcs_sliding_optin_form"> -->
                                                <div class="rcs_row">
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Text</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Headline Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sliding_headline_text) ){?>
                                                                <input type="text" placeholder="Headline text here..." value="<?php echo $autoresponder->sliding_headline_text ?>" class="rcs_custom_input rcs_input" name="sliding_headline_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Headline text here..." class="rcs_custom_input rcs_input" name="sliding_headline_text">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Sub Headline Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sliding_sub_headline_text) ){?>
                                                                <input type="text" placeholder="Sub headline text here..." value="<?php echo $autoresponder->sliding_sub_headline_text ?>" maxlength="80" class="rcs_custom_input rcs_input" name="sliding_sub_headline_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Sub headline text here..." maxlength="50" class="rcs_custom_input rcs_input" name="sliding_sub_headline_text">
                                                            <?php }?>
                                                        </div>
                                                        <h4 class="rcs_above_input_heading">Image Upload ( Optional )</h4>
                                                            <div class="rcs_featured_image_box rcs_image_box rcs_sliding_image">
                                                            <?php if(!empty($autoresponder->sliding_image_url) ){?>
                                                                <div class="rcs_selected_image">
                                                                <span class="rcs_selected_remove_image"><i class="fas fa-trash-alt"></i></span>
                                                                <img src="<?php echo base_url($autoresponder->sliding_image_url);?>">
                                                                <input type="hidden" name="image_id" value="<?php echo $autoresponder->sliding_image_id;?>" class="rcs_input" >
                                                                <input type="hidden" name="image_url" value="<?php echo $autoresponder->sliding_image_url;?>" class="rcs_input" >
                                                                </div>
                                                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No preview available</p>
                                                                <a href="javascript:;" class="rcs_input rcs_popup_btn rcs_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }else{?>    
                                                                <div class="rcs_selected_image">
                                                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                                </div>
                                                                <p class="rcs_not_showing_img rcs_not_showing_image">No preview available</p>
                                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }?>                                                                
                                                            </div>
                                                    </div>
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Button</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Button Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sliding_button_text) ){?>
                                                                <input type="text" placeholder="Button text here..." value="<?php echo $autoresponder->sliding_button_text;?>" class="rcs_custom_input rcs_input" name="sliding_button_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Button text here..." class="rcs_custom_input rcs_input" name="sliding_button_text">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_row">
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Text Color <span class="rcs_required_star">*</span></h4>
                                                                <div class="rcs_color_picker_box">
                                                                    <div class="color-picker">
                                                                    <?php if(isset($autoresponder->sliding_button_text_color) ){?>
                                                                        <input type="text" value="<?php echo $autoresponder->sliding_button_text_color;?>" class="rcs_color_input rcs_input" name="sliding_button_text_color">
                                                                        <span style="background : <?php echo $autoresponder->sliding_button_text_color;?>"></span>
                                                                    <?php }else{?>
                                                                        <input type="text" name="sliding_button_text_color" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : #ffffff" ></span> 
                                                                    <?php }?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Color <span class="rcs_required_star">*</span></h4>
                                                                <div class="rcs_color_picker_box">
                                                                    <div class="color-picker">
                                                                    <?php if(isset($autoresponder->sliding_button_color) ){?>
                                                                        <input type="text" name="sliding_button_color" value="<?php echo $autoresponder->sliding_button_color;?>" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : <?php echo $autoresponder->sliding_button_color;?>"></span>
                                                                    <?php }else{?>
                                                                        <input type="text" name="sliding_button_color" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : #4169e1" ></span>
                                                                    <?php }?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="rcs_above_input_heading">Button Action</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Thank You Message <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sliding_thankyou_message) ){?>
                                                                <input type="text" placeholder="Thank you message here..." value="<?php echo $autoresponder->sliding_thankyou_message;?>" class="rcs_custom_input rcs_input" name="sliding_thankyou_message">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Thank you message here..." class="rcs_custom_input rcs_input" name="sliding_thankyou_message">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Set Redirect link</label>
                                                            <?php if(isset($autoresponder->sliding_btn_redirect_link) ){?>
                                                                <input type="url" placeholder="Set redirect link here..." value="<?php echo $autoresponder->sliding_btn_redirect_link;?>" class="rcs_custom_input rcs_input" name="sliding_btn_redirect_link">
                                                            <?php }else{?>
                                                                <input type="url" placeholder="Set redirect link here..." class="rcs_custom_input rcs_input" name="sliding_btn_redirect_link">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="rcs_input_field">
                                                        <input type="hidden" class="rcs_custom_input rcs_input" name="sliding" value="sliding" >
                                                        <input type="hidden" class="rcs_custom_input rcs_input" name="s_id" value="<?php echo $this->uri->segment(3);?>" >
                                                        <button type="submit" class="rcs_btn">Save</button>
                                                    </div> -->
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <!------ sliding option form end----------->
                                    <!------ banner option form ----------->
                                    <div class="rcs_optin_form_box rcs_sidebar_optin_form">
                                        <div class="rcs_optin_toggle">
                                            <h4>Header Optin Form</h4>
                                            <div class="rcs_custom_toggle">
                                                <label>
                                                    <input type="checkbox" class="rcs_header_checkbox" value="sidebar" <?php echo (isset($autoresponder->header_checkbox) && $autoresponder->header_checkbox == 1)? 'checked': '';?>>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="rcs_optin_form_main" <?php echo (isset($autoresponder->header_checkbox) && $autoresponder->header_checkbox == 1)? 'style="display:block;"': '';?>>
                                            <!-- <form id="rcs_sidebar_optin_form"> -->
                                                <div class="rcs_row">
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Text</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Headline Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->header_headline_text)){?>
                                                                <input type="text" placeholder="Headline text here..." value="<?php echo $autoresponder->header_headline_text;?>" class="rcs_custom_input rcs_input" name="header_headline_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Headline text here..." class="rcs_custom_input rcs_input" name="header_headline_text">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Sub Headline Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->header_sub_headline_text)){?>
                                                                <input type="text" placeholder="Sub headline text here..." value="<?php echo $autoresponder->header_sub_headline_text;?>" maxlength="50" class="rcs_custom_input rcs_input" name="header_sub_headline_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Sub headline text here..." maxlength="50" class="rcs_custom_input rcs_input" name="header_sub_headline_text">
                                                            <?php }?>
                                                        </div>
                                                        <h4 class="rcs_above_input_heading">Image Upload ( Optional )</h4>
                                                            <div class="rcs_featured_image_box rcs_image_box rcs_sidebar_image">
                                                            <?php if(!empty($autoresponder->header_image_url)){?>
                                                                <div class="rcs_selected_image">
                                                                <span class="rcs_selected_remove_image"><i class="fas fa-trash-alt"></i></span>
                                                                <img src="<?php echo base_url($autoresponder->header_image_url);?>">
                                                                <input type="hidden" name="image_id" value="<?php echo $autoresponder->header_image_id;?>" class="rcs_input" >
                                                                <input type="hidden" name="image_url" value="<?php echo $autoresponder->header_image_url;?>" class="rcs_input" >
                                                                </div>
                                                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No preview available</p>
                                                                <a href="javascript:;" class="rcs_input rcs_popup_btn rcs_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }else{?>    
                                                                <div class="rcs_selected_image">
                                                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                                </div>
                                                                <p class="rcs_not_showing_img rcs_not_showing_image">No preview available</p>
                                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }?>
                                                            </div>
                                                    </div>
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Button</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Button Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->header_button_text)){?>
                                                                <input type="text" placeholder="Button text here..." value="<?php echo $autoresponder->header_button_text;?>" class="rcs_custom_input rcs_input" name="header_button_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Button text here..." class="rcs_custom_input rcs_input" name="header_button_text">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_row">
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Text Color <span class="rcs_required_star">*</span></h4>
                                                                <div class="rcs_color_picker_box">
																	<div class="color-picker">
                                                                    <?php if(isset($autoresponder->header_button_text_color)){?>
                                                                        <input type="text" value="<?php echo $autoresponder->header_button_text_color;?>" class="rcs_color_input rcs_input" name="header_button_text_color">
                                                                        <span style="background : <?php echo $autoresponder->header_button_text_color;?>"></span>
                                                                    <?php }else{?>
                                                                        <input type="text" name="header_button_text_color" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : #ffffff" ></span>
                                                                    <?php }?>
																	</div>
                                                                </div>
                                                            </div>
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Color <span class="rcs_required_star">*</span></h4>
                                                                <div class="rcs_color_picker_box">
                                                                    <div class="color-picker">
                                                                    <?php if(isset($autoresponder->header_button_color)){?>
                                                                        <input type="text" name="header_button_color" value="<?php echo $autoresponder->header_button_color;?>" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : <?php echo $autoresponder->header_button_color;?>"></span>
                                                                    <?php }else{?>
                                                                        <input type="text" name="header_button_color" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : #4169e1" ></span>
                                                                    <?php }?>                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="rcs_above_input_heading">Button Action</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Thank You Message <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->header_thankyou_message)){?>
                                                                <input type="text" placeholder="Thank you message here..." value="<?php echo $autoresponder->header_thankyou_message;?>" class="rcs_custom_input rcs_input" name="header_thankyou_message">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Thank you message here..." class="rcs_custom_input rcs_input" name="header_thankyou_message">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Set Redirect link</label>
                                                            <?php if(isset($autoresponder->header_btn_redirect_link)){?>
                                                                <input type="url" placeholder="Set redirect link here..." value="<?php echo $autoresponder->header_btn_redirect_link;?>" class="rcs_custom_input rcs_input" name="header_btn_redirect_link">
                                                            <?php }else{?>
                                                                <input type="url" placeholder="Set redirect link here..." class="rcs_custom_input rcs_input" name="header_btn_redirect_link">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="rcs_input_field">
                                                        <input type="hidden" class="rcs_custom_input rcs_input" name="sidebar" value="sidebar" >
                                                        <input type="hidden" class="rcs_custom_input rcs_input" name="s_id" value="<?php echo $this->uri->segment(3);?>" >
                                                        <button type="submit" class="rcs_btn">Save</button>
                                                    </div> -->
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <!------ banner option form end----------->
                                    <!------ sidebar option form start----------->
                                    <div class="rcs_optin_form_box rcs_sidebar_optin_form">
                                        <div class="rcs_optin_toggle">
                                            <h4>Sidebar Optin Form</h4>
                                            <div class="rcs_custom_toggle">
                                                <label>
                                                    <input type="checkbox" class="rcs_sidebar_checkbox" value="sidebar" <?php echo (isset($autoresponder->sidebar_checkbox) && $autoresponder->sidebar_checkbox == 1)? 'checked': '';?>>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="rcs_optin_form_main" <?php echo (isset($autoresponder->sidebar_checkbox) && $autoresponder->sidebar_checkbox == 1)? 'style="display:block;"': '';?>>
                                            <!-- <form id="rcs_sidebar_optin_form"> -->
                                                <div class="rcs_row">
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Text</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Headline Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sidebar_headline_text)){?>
                                                                <input type="text" placeholder="Headline text here..." value="<?php echo $autoresponder->sidebar_headline_text;?>" class="rcs_custom_input rcs_input" name="sidebar_headline_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Headline text here..." class="rcs_custom_input rcs_input" name="sidebar_headline_text">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Sub Headline Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sidebar_sub_headline_text)){?>
                                                                <input type="text" placeholder="Sub headline text here..." value="<?php echo $autoresponder->sidebar_sub_headline_text;?>" maxlength="50" class="rcs_custom_input rcs_input" name="sidebar_sub_headline_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Sub headline text here..." maxlength="50" class="rcs_custom_input rcs_input" name="sidebar_sub_headline_text">
                                                            <?php }?>
                                                        </div>
                                                        <h4 class="rcs_above_input_heading">Image Upload ( Optional )</h4>
                                                            <div class="rcs_featured_image_box rcs_image_box rcs_sidebar_image">
                                                            <?php if(!empty($autoresponder->sidebar_image_url)){?>
                                                                <div class="rcs_selected_image">
                                                                <span class="rcs_selected_remove_image"><i class="fas fa-trash-alt"></i></span>
                                                                <img src="<?php echo base_url($autoresponder->sidebar_image_url);?>">
                                                                <input type="hidden" name="image_id" value="<?php echo $autoresponder->sidebar_image_id;?>" class="rcs_input" >
                                                                <input type="hidden" name="image_url" value="<?php echo $autoresponder->sidebar_image_url;?>" class="rcs_input" >
                                                                </div>
                                                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No preview available</p>
                                                                <a href="javascript:;" class="rcs_input rcs_popup_btn rcs_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }else{?>    
                                                                <div class="rcs_selected_image">
                                                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                                </div>
                                                                <p class="rcs_not_showing_img rcs_not_showing_image">No preview available</p>
                                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }?>
                                                            </div>
                                                    </div>
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Button</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Button Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sidebar_button_text)){?>
                                                                <input type="text" placeholder="Button text here..." value="<?php echo $autoresponder->sidebar_button_text;?>" class="rcs_custom_input rcs_input" name="sidebar_button_text">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Button text here..." class="rcs_custom_input rcs_input" name="sidebar_button_text">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_row">
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Text Color <span class="rcs_required_star">*</span></h4>
                                                                <div class="rcs_color_picker_box">
																	<div class="color-picker">
                                                                    <?php if(isset($autoresponder->sidebar_button_text_color)){?>
                                                                        <input type="text" value="<?php echo $autoresponder->sidebar_button_text_color;?>" class="rcs_color_input rcs_input" name="sidebar_button_text_color">
                                                                        <span style="background : <?php echo $autoresponder->sidebar_button_text_color;?>"></span>
                                                                    <?php }else{?>
                                                                        <input type="text" name="sidebar_button_text_color" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : #ffffff" ></span>    
                                                                    <?php }?>
																	</div>
                                                                </div>
                                                            </div>
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Color <span class="rcs_required_star">*</span></h4>
                                                                <div class="rcs_color_picker_box">
                                                                    <div class="color-picker">
                                                                    <?php if(isset($autoresponder->sidebar_button_color)){?>
                                                                        <input type="text" name="sidebar_button_color" value="<?php echo $autoresponder->sidebar_button_color;?>" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : <?php echo $autoresponder->sidebar_button_color;?>"></span>
                                                                    <?php }else{?>
                                                                        <input type="text" name="sidebar_button_color" class="rcs_color_input colorpicker-element rcs_input">
                                                                        <span style="background : #4169e1" ></span>
                                                                    <?php }?>                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="rcs_above_input_heading">Button Action</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Thank You Message <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($autoresponder->sidebar_thankyou_message)){?>
                                                                <input type="text" placeholder="Thank you message here..." value="<?php echo $autoresponder->sidebar_thankyou_message;?>" class="rcs_custom_input rcs_input" name="sidebar_thankyou_message">
                                                            <?php }else{?>
                                                                <input type="text" placeholder="Thank you message here..." class="rcs_custom_input rcs_input" name="sidebar_thankyou_message">
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Set Redirect link</label>
                                                            <?php if(isset($autoresponder->sidebar_btn_redirect_link)){?>
                                                                <input type="url" placeholder="Set redirect link here..." value="<?php echo $autoresponder->sidebar_btn_redirect_link;?>" class="rcs_custom_input rcs_input" name="sidebar_btn_redirect_link">
                                                            <?php }else{?>
                                                                <input type="url" placeholder="Set redirect link here..." class="rcs_custom_input rcs_input" name="sidebar_btn_redirect_link">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="rcs_input_field">
                                                        <input type="hidden" class="rcs_custom_input rcs_input" name="sidebar" value="sidebar" >
                                                        <input type="hidden" class="rcs_custom_input rcs_input" name="s_id" value="<?php echo $this->uri->segment(3);?>" >
                                                        <button type="submit" class="rcs_btn">Save</button>
                                                    </div> -->
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="rcs_col4">
                                    <div class="rcs_row">
                                        <div class="rcs_col rcs_full_col rcs_share_toggle">
											<div class="rcs_optin_toggle">
												<h4>Social Share</h4>
												<div class="rcs_custom_toggle">
													<label>
														<input type="checkbox" value="1" name="social_share" class="rcs_checkbox" id="rcs_social_share" <?php echo isset($social_share['social_share']) && $social_share['social_share'] ? 'checked' : '' ; ?>> 
														<span></span>
													</label>
												</div>
											</div>
                                        <div class="rcs_social_share_object <?php echo isset($social_share['social_share']) && $social_share['social_share'] ? '' : 'hide' ; ?>">
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="facebook" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_facebook" <?php echo isset($social_share['data']) && in_array('facebook', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_facebook" style="cursor:pointer;">Facebook</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="twitter" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_twitter" <?php echo isset($social_share['data']) && in_array('twitter', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_twitter" style="cursor:pointer;">Twitter</label>
                                            </div >
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="pinterest" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_pinterest" <?php echo isset($social_share['data']) && in_array('pinterest', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_pinterest" style="cursor:pointer;">Pinterest</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="linkedin" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_linkedin" <?php echo isset($social_share['data']) && in_array('linkedin', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_linkedin" style="cursor:pointer;">Linkedin</label>
                                            </div>
                                            <div  class="rcs_social_label">
                                                <input type="checkbox" value="messenger" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_messenger" <?php echo isset($social_share['data']) && in_array('messenger', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_messenger" style="cursor:pointer;">Messenger</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="whatsapp" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_whatsapp" <?php echo isset($social_share['data']) && in_array('whatsapp', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_whatsapp" style="cursor:pointer;">Whatsapp</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="viber" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_viber" <?php echo isset($social_share['data']) && in_array('viber', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_viber" style="cursor:pointer;">Viber</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="telegram" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_telegram" <?php echo isset($social_share['data']) && in_array('telegram', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_telegram" style="cursor:pointer;">Telegram</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="tumblr" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_tumblr" <?php echo isset($social_share['data']) && in_array('tumblr', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_tumblr" style="cursor:pointer;">Tumblr</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="reddit" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_reddit" <?php echo isset($social_share['data']) && in_array('reddit', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_reddit" style="cursor:pointer;">Reddit</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="pocket" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_pocket" <?php echo isset($social_share['data']) && in_array('pocket', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_pocket" style="cursor:pointer;">Pocket</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="email" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_email" <?php echo isset($social_share['data']) && in_array('email', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_email" style="cursor:pointer;">Email</label>
                                            </div>
                                            <div class="rcs_social_label">
                                                <input type="checkbox" value="sms" name="social_share_data" class="rcs_checkbox" id="rcs_social_share_sms" <?php echo isset($social_share['data']) && in_array('sms', $social_share['data']) ? 'checked' : '' ; ?>> 
                                                <label for="rcs_social_share_sms" style="cursor:pointer;">SMS</label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="rcs_option_social_media">
                                        <h2 class="rcs_above_input_heading">Social Media Links </h2>
                                        <div class="rcs_social_box rcs_social_facebook">
                                            <span><i class="fab fa-facebook-f"></i></span>
                                            <?php if(isset($social_links)){?>
                                                <input type="text" name="facebook_link" value="<?php echo $social_links->facebook_link;?>" placeholder="https://www.facebook.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="facebook_link" placeholder="https://www.facebook.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php } ?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_twitter">
                                            <span><i class="fab fa-twitter"></i></span>
                                            <?php if(isset($social_links)){?>
                                                <input type="text" name="twitter_link" value="<?php echo $social_links->twitter_link;?>" placeholder="https://www.twitter.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="twitter_link" placeholder="https://www.twitter.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php } ?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_pinterest">
                                            <span><i class="fab fa-pinterest-p"></i></span>
                                            <?php if(isset($social_links)){?>
                                                <input type="text" name="pinterest_link" value="<?php echo $social_links->pinterest_link;?>" placeholder="https://www.pinterest.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input"  >
                                            <?php }else{ ?>
                                                <input type="text" name="pinterest_link" placeholder="https://www.pinterest.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input"  >
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_linkedin">
                                            <span><i class="fab fa-linkedin-in"></i></span>
                                            <?php if(isset($social_links)){?>
                                                <input type="text" name="linkedin_link" value="<?php echo $social_links->linkedin_link;?>" placeholder="https://www.linkedin.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="linkedin_link" placeholder="https://www.linkedin.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_whatsapp">
                                            <span><i class="fab fa-whatsapp"></i></span>
                                            <?php if(isset($social_links->whatsapp_link)){?>
                                                <input type="text" name="whatsapp_link" value="<?php echo $social_links->whatsapp_link;?>" placeholder="https://www.whatsapp.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="whatsapp_link" placeholder="https://www.whatsapp.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_reddit">
                                            <span><i class="fab fa-reddit"></i></span>
                                            <?php if(isset($social_links->reddit_link)){?>
                                                <input type="text" name="reddit_link" value="<?php echo $social_links->reddit_link;?>" placeholder="https://www.reddit.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="reddit_link" placeholder="https://www.reddit.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_tumblr">
                                            <span><i class="fab fa-tumblr"></i></span>
                                            <?php if(isset($social_links->tumblr_link)){?>
                                                <input type="text" name="tumblr_link" value="<?php echo $social_links->tumblr_link;?>" placeholder="https://www.tumblr.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="tumblr_link" placeholder="https://www.tumblr.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_buffer">
                                            <span><i class="fab fa-buffer"></i></span>
                                            <?php if(isset($social_links->buffer_link)){?>
                                                <input type="text" name="buffer_link" value="<?php echo $social_links->linkedin_link;?>" placeholder="https://www.buffer.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="buffer_link" placeholder="https://www.buffer.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_digg">
                                            <span><i class="fab fa-digg"></i></span>
                                            <?php if(isset($social_links->digg_link)){?>
                                                <input type="text" name="digg_link" value="<?php echo $social_links->digg_link;?>" placeholder="https://www.digg.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="digg_link" placeholder="https://www.digg.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_flipboard">
                                            <span><i class="fab fa-flipboard"></i></span>
                                            <?php if(isset($social_links->flipboard_link)){?>
                                                <input type="text" name="flipboard_link" value="<?php echo $social_links->flipboard_link;?>" placeholder="https://www.flipboard.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="flipboard_link" placeholder="https://www.flipboard.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_meneame">
                                            <span><i class="fab fa-meneame"></i></span>
                                            <?php if(isset($social_links->meneame_link)){?>
                                                <input type="text" name="meneame_link" value="<?php echo $social_links->meneame_link;?>" placeholder="https://www.meneame.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="meneame_link" placeholder="https://www.meneame.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_blogger">
                                            <span><i class="fab fa-blogger"></i></span>
                                            <?php if(isset($social_links->blogger_link)){?>
                                                <input type="text" name="blogger_link" value="<?php echo $social_links->blogger_link;?>" placeholder="https://www.blogger.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="blogger_link" placeholder="https://www.blogger.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_evernote">
                                            <span><i class="fab fa-evernote"></i></span>
                                            <?php if(isset($social_links->evernote_link)){?>
                                                <input type="text" name="evernote_link" value="<?php echo $social_links->evernote_link;?>" placeholder="https://www.evernote.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="evernote_link" placeholder="https://www.evernote.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_instapaper">
                                            <span><i class="fas fa-italic"></i></span>
                                            <?php if(isset($social_links->instapaper_link)){?>
                                                <input type="text" name="instapaper_link" value="<?php echo $social_links->instapaper_link;?>" placeholder="https://www.instapaper.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="instapaper_link" placeholder="https://www.instapaper.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_pocket">
                                            <span><i class="fab fa-get-pocket"></i></span>
                                            <?php if(isset($social_links->pocket_link)){?>
                                                <input type="text" name="pocket_link" value="<?php echo $social_links->pocket_link;?>" placeholder="https://www.pocket.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="pocket_link" placeholder="https://www.pocket.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_telegram">
                                            <span><i class="fab fa-telegram"></i></span>
                                            <?php if(isset($social_links->telegram_link)){?>
                                                <input type="text" name="telegram_link" value="<?php echo $social_links->telegram_link;?>" placeholder="https://www.telegram.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="telegram_link" placeholder="https://www.telegram.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_wordpress">
                                            <span><i class="fab fa-wordpress"></i></span>
                                            <?php if(isset($social_links->wordpress_link)){?>
                                                <input type="text" name="wordpress_link" value="<?php echo $social_links->wordpress_link;?>" placeholder="https://www.wordpress.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="wordpress_link" placeholder="https://www.wordpress.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_stumbleupon">
                                            <span><i class="fab fa-stumbleupon"></i></span>
                                            <?php if(isset($social_links->reddit_link)){?>
                                                <input type="text" name="stumbleupon_link" value="<?php echo $social_links->linkedin_link;?>" placeholder="https://www.stumbleupon.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="reddit_link" placeholder="https://www.stumbleupon.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_bibsonomy">
                                            <span><i class="fas fa-bold"></i></span>
                                            <?php if(isset($social_links->bibsonomy_link)){?>
                                                <input type="text" name="bibsonomy_link" value="<?php echo $social_links->bibsonomy_link;?>" placeholder="https://www.bibsonomy.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="bibsonomy_link" placeholder="https://www.bibsonomy.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_mix">
                                            <span><i class="fab fa-mix"></i></span>
                                            <?php if(isset($social_links->mix_link)){?>
                                                <input type="text" name="mix_link" value="<?php echo $social_links->mix_link;?>" placeholder="https://www.mix.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="mix_link" placeholder="https://www.mix.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
										
                                        <div class="rcs_social_box rcs_social_care2">
                                            <span><i class="fab fa-care2"></i></span>
                                            <?php if(isset($social_links->care2_link)){?>
                                                <input type="text" name="care2_link" value="<?php echo $social_links->care2_link;?>" placeholder="https://www.care2.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="care2_link" placeholder="https://www.care2.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_blogmarks hide">
                                            <span><i class="fab fa-blogmarks"></i></span>
                                            <?php if(isset($social_links->blogmarks_link)){?>
                                                <input type="text" name="blogmarks_link" value="<?php echo $social_links->blogmarks_link;?>" placeholder="https://www.blogmarks.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="blogmarks_link" placeholder="https://www.blogmarks.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_livejournal">
                                            <span><i class="fab fa-livejournal"></i></span>
                                            <?php if(isset($social_links->livejournal_link)){?>
                                                <input type="text" name="livejournal_link" value="<?php echo $social_links->livejournal_link;?>" placeholder="https://www.livejournal.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="livejournal_link" placeholder="https://www.livejournal.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_folkd hide">
                                            <span><i class="fab fa-folkd"></i></span>
                                            <?php if(isset($social_links->folkd_link)){?>
                                                <input type="text" name="folkd_link" value="<?php echo $social_links->folkd_link;?>" placeholder="https://www.folkd.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="folkd_link" placeholder="https://www.folkd.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_myspace">
                                            <span><i class="fab fa-myspace"></i></span>
                                            <?php if(isset($social_links->myspace_link)){?>
                                                <input type="text" name="myspace_link" value="<?php echo $social_links->myspace_link;?>" placeholder="https://www.myspace.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="myspace_link" placeholder="https://www.myspace.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_plurk">
                                            <span><i class="fab fa-plurk"></i></span>
                                            <?php if(isset($social_links->plurk_link)){?>
                                                <input type="text" name="plurk_link" value="<?php echo $social_links->plurk_link;?>" placeholder="https://www.plurk.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="plurk_link" placeholder="https://www.plurk.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_symbaloo">
                                            <span><i class="fab fa-symbaloo"></i></span>
                                            <?php if(isset($social_links->symbaloo_link)){?>
                                                <input type="text" name="symbaloo_link" value="<?php echo $social_links->symbaloo_link;?>" placeholder="https://www.symbaloo.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="symbaloo_link" placeholder="https://www.symbaloo.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_social_box rcs_social_vk">
                                            <span><i class="fab fa-vk"></i></span>
                                            <?php if(isset($social_links->vk_link)){?>
                                                <input type="text" name="vk_link" value="<?php echo $social_links->vk_link;?>" placeholder="https://www.vk.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input" >
                                            <?php }else{ ?>
                                                <input type="text" name="vk_link" placeholder="https://www.vk.com/help/?id=1005122956291711" class="rcs_custom_input rcs_input">
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="rcs_create_site_btns">
                    <a href="<?= base_url();?>user/site_banner/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_yellow_btn rcs_step_prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M2.686,5.843 C2.959,5.843 3.132,5.843 3.305,5.843 C7.412,5.845 11.518,5.846 15.625,5.848 C15.763,5.848 15.901,5.849 16.038,5.847 C16.674,5.835 16.996,5.556 17.001,5.016 C17.005,4.479 16.669,4.175 16.050,4.169 C15.402,4.162 14.754,4.163 14.107,4.163 C10.483,4.164 6.858,4.166 3.234,4.167 C3.076,4.167 2.918,4.167 2.644,4.167 C3.510,3.234 4.293,2.405 5.057,1.556 C5.211,1.385 5.346,1.148 5.390,0.920 C5.456,0.574 5.303,0.280 5.002,0.109 C4.670,-0.079 4.354,-0.020 4.090,0.255 C3.565,0.801 3.052,1.361 2.536,1.917 C1.815,2.694 1.096,3.471 0.377,4.250 C-0.118,4.786 -0.124,5.211 0.363,5.737 C1.579,7.050 2.795,8.363 4.016,9.671 C4.356,10.034 4.692,10.092 5.017,9.878 C5.484,9.570 5.542,8.964 5.133,8.516 C4.446,7.767 3.748,7.028 3.057,6.283 C2.954,6.171 2.860,6.049 2.686,5.843 Z" fill="#444444"/></svg>Prev</a>
                    <!-- <a href="<?= base_url();?>ajax/site_autoresponder/<?php //echo $this->uri->segment(3);?>" class="rcs_btn">Publish</a> -->
                    <input type="hidden" class="rcs_custom_input rcs_input" name="s_id" value="<?php echo $this->uri->segment(3);?>" >
                    <button type="submit" class="rcs_btn">Publish</button>
                </div>
            </form>
            </div>
            <?php } ?>
            
        </div>
        <!---------- content section end ---------->