<?php //echo "<pre>";print_r($banner_Data->topBanner->top_banner_link);die; ?>
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
                    <li class="current_active"><a href="<?php echo base_url();?>user/site-banner/<?php echo $this->uri->segment(3);?>">Banner Ads</a></li>
                    <li><a href="<?php echo base_url();?>user/site-autoresponder/<?php echo $this->uri->segment(3);?>">Optin, Share and Publish</a></li>
                <?php }else{ ?>
                    <li class="active"><a href="javascript:;">Create</a></li>
                    <li class="active"><a href="javascript:;">Header</a></li>
                    <li class="active"><a href="javascript:;">Design</a></li>
                    <li class="active"><a href="javascript:;">Create Articles</a></li>
                    <li class="active"><a href="javascript:;">Create Pages</a></li>
                    <li class="current_active"><a href="javascript:;">Banner Ads</a></li>
                    <li><a href="javascript:;">Optin, Share and Publish</a></li>
                <?php } ?>
                </ul>
            </div>
            <div class="rcs_create_site_box rcs_site_step5">
                <div class="rcs_content_box">
                <form id="rcs_create_site_banner_form" action="">
                    <div class="rcs_white_box">
                        <h2>Banner Ads</h2>
                        <div class="rcs_row">
                            <div class="rcs_col4">
                                <div class="rcs_ad_banner_wrapper rcs_sidebar_ad_box">
                                    <h3>Add Top Banner</h3>
                                    <div class="rcs_ad_banner_box">
                                        <?php if(isset($banner_Data->topBanner->logo_image_url)){?>
                                        <div class="rcs_ad_banner_upload">
                                            <div class="rcs_featured_image_box rcs_image_box rcs_top_banner">
                                                <div class="rcs_selected_image">
                                                    <img src="<?php echo base_url($banner_Data->topBanner->logo_image_url);?>">
                                                    <input type="hidden" name="image_id" value="<?php echo $banner_Data->topBanner->logo_image_id;?>" class="rcs_input" >
                                                    <input type="hidden" name="image_url" value="<?php echo $banner_Data->topBanner->logo_image_url;?>" class="rcs_input" >
                                                </div>
                                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No top banner image available right now<br> 
												Image size should be maximum - 1110*134 pixels</p>
                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div> 
                                            <?php //if(isset($banner_Data->topBanner->top_banner_link)){?>
                                            <div class="rcs_input_field" style="margin-bottom:20px;">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" data-error="Link should be valid." value="<?php echo ($banner_Data->topBanner->top_banner_link != '')? $banner_Data->topBanner->top_banner_link : '';?>" class="rcs_custom_input rcs_banner_link rcs_input" name="top_banner_link">
												<p style="margin: 15px 0 0;text-align: center;width: 100%;">OR</p>
                                            </div>  
											<div class="rcs_input_field">
												<label>Google-Ad code</label>
												<textarea class="rcs_custom_input top_banner_google_ads" placeholder="Enter Google-Ad Code" name="top_banner_google_ads"><?php echo isset($banner_Data->topBanner->top_banner_google_ads) && ($banner_Data->topBanner->top_banner_google_ads != '')? $banner_Data->topBanner->top_banner_google_ads : '';?></textarea>
                                            </div>
                                            <?php //}else{ ?>
                                            <!-- <div class="rcs_input_field">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" name="top_banner_link">
                                            </div> -->
                                            <?php //} ?>

                                        </div> 
                                        <div class="rcs_ad_banner_btn">
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_banner_remove ">remove Banner</a>
                                        </div>
                                        <?php }else{?>
                                        <div class="rcs_ad_banner_upload">
                                            <div class="rcs_featured_image_box rcs_image_box rcs_top_banner">
                                                <div class="rcs_selected_image">
                                                        <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                </div>
                                                    <p class="rcs_not_showing_img rcs_not_showing_image">No top banner image available right now <br>Image size should be maximum - 1110*134 pixels</p>
                                                    <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div>
                                            <div class="rcs_input_field" style="margin-bottom:20px;">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" name="top_banner_link">
												<p style="margin: 15px 0 0;text-align: center;width: 100%;">OR</p>
                                            </div>
											<div class="rcs_input_field">
												<label>Google-Ad code</label>
												<textarea class="rcs_custom_input top_banner_google_ads" placeholder="Enter Google-Ad Code" name="top_banner_google_ads"><?php echo isset($banner_Data->topBanner->top_banner_google_ads) && ($banner_Data->topBanner->top_banner_google_ads != '')? $banner_Data->topBanner->top_banner_google_ads : '';?></textarea>
                                            </div>
                                        </div>
                                        <div class="rcs_ad_banner_btn">
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_banner_remove hide">remove Banner</a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="rcs_col4">
                                <div class="rcs_ad_banner_wrapper rcs_sidebar_ad_box">
                                    <h3>Add Bottom Banner</h3>
                                    <div class="rcs_ad_banner_box">
                                        <?php if(isset($banner_Data->bottomBanner->logo_image_url)){?>
                                        <div class="rcs_ad_banner_upload">
                                            <div class="rcs_featured_image_box rcs_image_box rcs_bottom_banner">
                                                <div class="rcs_selected_image">
                                                    <img src="<?php echo base_url($banner_Data->bottomBanner->logo_image_url);?>">
                                                    <input type="hidden" name="image_id" value="<?php echo $banner_Data->bottomBanner->logo_image_id;?>" class="rcs_input" >
                                                    <input type="hidden" name="image_url" value="<?php echo $banner_Data->bottomBanner->logo_image_url;?>" class="rcs_input" >
                                                </div>
                                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No top banner image available right now <br>Image size should be maximum - 1110*134 pixels</p>
                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div>
                                            <?php //if(isset($banner_Data->bottomBanner->bottom_banner_link)){?>
                                            <div class="rcs_input_field" style="margin-bottom:20px;">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" value="<?php echo ($banner_Data->bottomBanner->bottom_banner_link != '')? $banner_Data->bottomBanner->bottom_banner_link : '';?>" name="bottom_banner_link">
												<p style="margin: 15px 0 0;text-align: center;width: 100%;">OR</p>
                                            </div>
											<div class="rcs_input_field">
												<label>Google-Ad code</label>
												<textarea class="rcs_custom_input bottom_banner_google_ads" placeholder="Enter Google-Ad Code" name="bottom_banner_google_ads"><?php echo isset($banner_Data->bottomBanner->bottom_banner_google_ads) && ($banner_Data->bottomBanner->bottom_banner_google_ads != '')? $banner_Data->bottomBanner->bottom_banner_google_ads : '';?></textarea>
                                            </div>
                                            <?php //}else{ ?>  
                                            <!-- <div class="rcs_input_field">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" name="bottom_banner_link">
                                            </div>  -->
                                            <?php //} ?>   
                                        </div> 
                                        <div class="rcs_ad_banner_btn">
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_banner_remove ">remove Banner</a>
                                        </div>
                                        <?php }else{?>
                                        <div class="rcs_ad_banner_upload">
                                            <div class="rcs_featured_image_box rcs_image_box rcs_bottom_banner">
                                                <div class="rcs_selected_image">
                                                        <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                </div>
                                                    <p class="rcs_not_showing_img rcs_not_showing_image">No top banner image available right now <br>Image size should be maximum - 1110*134 pixels</p>
                                                    <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div>
                                            <div class="rcs_input_field" style="margin-bottom:20px;">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" name="bottom_banner_link">
												<p style="margin: 15px 0 0;text-align: center;width: 100%;">OR</p>
                                            </div>
											<div class="rcs_input_field">
												<label>Google-Ad code</label>
												<textarea class="rcs_custom_input bottom_banner_google_ads" name="bottom_banner_google_ads" placeholder="Enter Google-Ad Code"><?php echo isset($banner_Data->bottomBanner->bottom_banner_google_ads) && ($banner_Data->bottomBanner->bottom_banner_google_ads != '')? $banner_Data->bottomBanner->bottom_banner_google_ads : '';?></textarea>
                                            </div>
                                        </div>
                                        <div class="rcs_ad_banner_btn">
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_banner_remove hide">remove Banner</a>
                                        </div>
                                        <?php } ?>
                                    </div> 
                                </div>
                            </div>
                            <div class="rcs_col4">
                                <div class="rcs_ad_banner_wrapper rcs_sidebar_ad_box">
                                    <h3>Add Sidebar Banner</h3>
                                    <div class="rcs_ad_banner_box">
                                        <?php if(isset($banner_Data->sideBanner->logo_image_url)){?>
                                        <div class="rcs_ad_banner_upload">
                                            <div class="rcs_featured_image_box rcs_image_box rcs_sidebar_banner">
                                                <div class="rcs_selected_image">
                                                    <img src="<?php echo base_url($banner_Data->sideBanner->logo_image_url);?>">
                                                    <input type="hidden" name="image_id" value="<?php echo $banner_Data->sideBanner->logo_image_id;?>" class="rcs_input" >
                                                    <input type="hidden" name="image_url" value="<?php echo $banner_Data->sideBanner->logo_image_url;?>" class="rcs_input" >
                                                </div>
                                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No top banner image available right now <br>Image size should be maximum - 350*350 pixels</p>
                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div>   
                                            <?php //if(isset($banner_Data->sideBanner->sidebar_banner_link)){?> 
                                            <div class="rcs_input_field" style="margin-bottom:20px;">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" value="<?php echo ($banner_Data->sideBanner->sidebar_banner_link != '')? $banner_Data->sideBanner->sidebar_banner_link :'';?>" name="sidebar_banner_link">
												<p style="margin: 15px 0 0;text-align: center;width: 100%;">OR</p>
												</div>
												<div class="rcs_input_field">
													<label>Google-Ad code</label>
													<textarea class="rcs_custom_input sidebar_banner_google_ads" placeholder="Enter Google-Ad Code" name="sidebar_banner_google_ads"><?php echo isset($banner_Data->sideBanner->sidebar_banner_google_ads) && ($banner_Data->sideBanner->sidebar_banner_google_ads != '')? $banner_Data->sideBanner->sidebar_banner_google_ads :'';?></textarea>
												</div>
                                            <?php //}else{ ?>
                                            <!-- <div class="rcs_input_field">
                                                <label>Ad banner link</label>
                                                <input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" name="sidebar_banner_link">
                                            </div>  -->
                                            <?php //} ?>
                                        </div> 
                                        <div class="rcs_ad_banner_btn">
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_banner_remove">remove Banner</a>
                                        </div>
                                        <?php }else{?>
                                        <div class="rcs_ad_banner_upload">
                                            <div class="rcs_featured_image_box rcs_image_box rcs_sidebar_banner">
                                                <div class="rcs_selected_image">
                                                        <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                </div>
                                                    <p class="rcs_not_showing_img rcs_not_showing_image">No top banner image available right now <br>Image size should be maximum - 350*350 pixels</p>
                                                    <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                </div>
												<div class="rcs_input_field" style="margin-bottom:20px;">
													<label>Ad banner link</label>
													<input type="text" placeholder="Enter ad banner link" class="rcs_custom_input rcs_input" name="sidebar_banner_link">
													<p style="margin: 15px 0 0;text-align: center;width: 100%;">OR</p>
												</div>
												<div class="rcs_input_field">
													<label>Google-Ad code</label>
													<textarea class="rcs_custom_input sidebar_banner_google_ads" placeholder="Enter Google-Ad Code" name="sidebar_banner_google_ads"><?php echo isset($banner_Data->sideBanner->sidebar_banner_google_ads) && ($banner_Data->sideBanner->sidebar_banner_google_ads != '')? $banner_Data->sideBanner->sidebar_banner_google_ads :'';?></textarea>
												</div>
                                            </div>
                                        <div class="rcs_ad_banner_btn">
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_banner_remove hide">remove Banner</a>
                                        </div>
                                        <?php } ?>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="rcs_input_field rcs_banner_btn">
                            <input type="hidden" name="s_id" value="<?php echo $this->uri->segment(3);?>" class="rcs_custom_input rcs_input site_id"/>
                            <button type="submit" class="rcs_btn">Save Banner</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="rcs_create_site_btns">
                    <a href="<?= base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_yellow_btn rcs_step_prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M2.686,5.843 C2.959,5.843 3.132,5.843 3.305,5.843 C7.412,5.845 11.518,5.846 15.625,5.848 C15.763,5.848 15.901,5.849 16.038,5.847 C16.674,5.835 16.996,5.556 17.001,5.016 C17.005,4.479 16.669,4.175 16.050,4.169 C15.402,4.162 14.754,4.163 14.107,4.163 C10.483,4.164 6.858,4.166 3.234,4.167 C3.076,4.167 2.918,4.167 2.644,4.167 C3.510,3.234 4.293,2.405 5.057,1.556 C5.211,1.385 5.346,1.148 5.390,0.920 C5.456,0.574 5.303,0.280 5.002,0.109 C4.670,-0.079 4.354,-0.020 4.090,0.255 C3.565,0.801 3.052,1.361 2.536,1.917 C1.815,2.694 1.096,3.471 0.377,4.250 C-0.118,4.786 -0.124,5.211 0.363,5.737 C1.579,7.050 2.795,8.363 4.016,9.671 C4.356,10.034 4.692,10.092 5.017,9.878 C5.484,9.570 5.542,8.964 5.133,8.516 C4.446,7.767 3.748,7.028 3.057,6.283 C2.954,6.171 2.860,6.049 2.686,5.843 Z" fill="#444444"/></svg>Prev</a>
                    <a href="<?= base_url();?>user/site_autoresponder/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_step_next">Next <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M14.314,5.843 C14.041,5.843 13.868,5.843 13.695,5.843 C9.588,5.845 5.481,5.846 1.375,5.848 C1.237,5.848 1.099,5.849 0.961,5.847 C0.326,5.835 0.004,5.557 -0.001,5.016 C-0.005,4.479 0.331,4.175 0.950,4.169 C1.598,4.162 2.245,4.163 2.893,4.163 C6.517,4.164 10.142,4.166 13.766,4.167 C13.924,4.167 14.082,4.167 14.356,4.167 C13.490,3.234 12.706,2.405 11.943,1.556 C11.789,1.385 11.654,1.148 11.610,0.920 C11.543,0.574 11.697,0.280 11.998,0.109 C12.330,-0.079 12.646,-0.020 12.910,0.255 C13.435,0.801 13.948,1.361 14.464,1.917 C15.185,2.694 15.904,3.471 16.623,4.250 C17.118,4.786 17.124,5.211 16.637,5.737 C15.421,7.050 14.205,8.363 12.983,9.671 C12.644,10.034 12.308,10.092 11.982,9.878 C11.516,9.570 11.458,8.964 11.867,8.516 C12.554,7.767 13.251,7.028 13.943,6.283 C14.046,6.171 14.140,6.049 14.314,5.843 Z" fill="#ffffff"/></svg></a>
                </div>
            </div>
            
        </div>
        <!---------- content section end ---------->