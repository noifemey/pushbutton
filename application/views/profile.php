<div class="rcs_content_wrapper rcs_middle_box">
    <div class="rcs_content_box rcs_profile_main rcs_middle_box_inner">
        <div class="rcs_white_box">
            <h2>Profile Settings</h2> 
            <div class="rcs_profile_edit_box">
                <form action="ajax/updateProfile" id="rcsProfileUpdate">
                    <div class="rcs_profile_img_edit">
                        <div class="rcs_profile_img_circle rcs_image_box">
                            
                            <?php if(empty($profile_img)){ ?>
                                <div class="rcs_profile_short_name rcs_not_showing_img"><?php echo $short_nm; ?></div>
                            <?php } ?>

                            <div class="rcs_selected_image">
                                <?php if(!empty($profile_img)){ ?>
                                        <img src="<?php echo base_url($profile_img); ?>" alt="">
                                        <input type="hidden" value="<?php echo $this->session->userdata( 'profile_img_id' ); ?>" class="rcs_input" name="image_id">
                                        <input type="hidden" value="<?php echo $profile_img; ?>" name="image_url" class="rcs_input">
                                <?php } ?>
                            </div>
                                
                            <div class="rcs_profile_edit_icon rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="rcs_profile_user">
                            <h4><?php echo $name; ?></h4>
                            <p><?php echo $this->session->userdata( 'email' ); ?></p>
                        </div>
                    </div>
                    <div class="rcs_form_group">
                        <div class="rcs_row">
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Name</label>
                                    <input type="text" placeholder="Enter name here..." class="rcs_custom_input rcs_input" data-req="1" data-msg="Name is required." name="fullname" value="<?php echo $name; ?>">
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Email Address</label>
                                    <input type="email" placeholder="Enter email here..." class="rcs_custom_input" data-req="1" data-msg="Email is required." name="email" value="<?php echo $this->session->userdata( 'email' ); ?>" readonly>
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Website</label>
                                    <input type="url" placeholder="Enter website..." class="rcs_custom_input rcs_input" name="website" value="<?php echo isset($settings['website']) ? $settings['website'] : ''; ?>" >
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Add Your Facebook URL</label>
                                    <input type="url" placeholder="Enter facebook url..." class="rcs_custom_input rcs_input" name="fburl" value="<?php echo isset($settings['fburl']) ? $settings['fburl'] : ''; ?>">
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Add Your Instagram Handle</label>
                                    <input type="url" placeholder="Enter Instagram url..." class="rcs_custom_input rcs_input" name="instaurl" value="<?php echo isset($settings['instaurl']) ? $settings['instaurl'] : ''; ?>">
                                </div>
                            </div>
							
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Add Your Twitter URL</label>
                                    <input type="url" placeholder="Enter Twitter url..." class="rcs_custom_input rcs_input" name="twitterurl" value="<?php echo isset($settings['twitterurl']) ? $settings['twitterurl'] : ''; ?>">
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Add Your Linkedin Handle</label>
                                    <input type="url" placeholder="Enter Linkedin url..." class="rcs_custom_input rcs_input" name="linkedinurl" value="<?php echo isset($settings['linkedinurl']) ? $settings['linkedinurl'] : ''; ?>">
                                </div>
                            </div>
							
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Add Your Youtube Page URL</label>
                                    <input type="url" placeholder="Enter Youtube Page url..." class="rcs_custom_input rcs_input" name="yturl" value="<?php echo isset($settings['yturl']) ? $settings['yturl'] : ''; ?>">
                                </div>
                            </div>
							<div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>About You</label>
                                    <textarea height="200px" placeholder="Enter your data..." class="rcs_custom_input rcs_input" name="aboutyou"><?php echo isset($settings['aboutyou']) ? $settings['aboutyou'] : ''; ?></textarea>
                                </div>
                            </div>
							<div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Add Your Disclaimer</label>
                                    <textarea height="200px" placeholder="Enter your disclaimer..." class="rcs_custom_input rcs_input" name="disclaimer" ><?php echo isset($settings['disclaimer']) ? $settings['disclaimer'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Create Password</label>
                                    <input type="password" placeholder="***************" class="rcs_custom_input rcs_input" name="create_password">
                                </div>
                            </div>
                            <div class="rcs_col">
                                <div class="rcs_input_field">
                                    <label>Confirm Password</label>
                                    <input type="password" placeholder="***************" class="rcs_custom_input rcs_input" name="confirm_password">
                                </div>
                            </div>
                            <div class="rcs_col rcs_full_col"><p>If you'd like to change your password simply enter a new one here (Otherwise leave the field empty).</p></div>
                        </div>
                        <div class="rcs_input_field">
                            <button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="16" height="16" viewBox="0 0 16 16"><path d="M15.999,4.087 C16.000,3.712 15.883,3.421 15.630,3.172 C14.733,2.287 13.818,1.372 12.833,0.374 C12.581,0.119 12.292,-0.000 11.924,-0.000 C11.922,-0.000 11.921,-0.000 11.919,-0.000 C9.553,0.006 7.147,0.006 4.821,0.005 C3.869,0.005 2.917,0.005 1.964,0.006 C0.717,0.006 0.001,0.722 0.001,1.969 C-0.000,5.991 -0.000,10.013 0.001,14.035 C0.001,15.264 0.735,15.998 1.964,15.999 C2.780,16.000 3.597,16.000 4.414,16.000 C5.006,16.000 5.597,16.000 6.188,16.000 L7.959,16.000 L9.780,16.000 C11.197,16.000 12.613,16.000 14.029,15.999 C15.277,15.999 15.993,15.285 15.993,14.043 C15.994,13.080 15.994,12.117 15.994,11.155 C15.993,8.838 15.993,6.443 15.999,4.087 ZM6.157,4.119 L6.157,1.516 L9.823,1.516 L9.823,4.119 L6.157,4.119 ZM4.079,11.141 C4.080,10.985 4.114,10.819 4.502,10.818 C5.631,10.816 6.759,10.816 7.887,10.816 L8.978,10.817 L9.627,10.817 C10.250,10.816 10.895,10.816 11.529,10.819 C11.867,10.821 11.914,10.974 11.916,11.140 C11.923,11.992 11.921,12.826 11.920,13.709 C11.920,13.968 11.919,14.229 11.919,14.491 L4.075,14.491 C4.075,14.228 4.074,13.966 4.074,13.705 C4.073,12.824 4.071,11.992 4.079,11.141 ZM13.410,14.518 C13.407,14.471 13.405,14.429 13.405,14.387 C13.405,14.029 13.405,13.670 13.406,13.312 C13.407,12.584 13.409,11.832 13.398,11.091 C13.383,10.097 12.629,9.344 11.644,9.339 C9.172,9.328 6.719,9.328 4.353,9.340 C3.360,9.345 2.604,10.113 2.595,11.128 C2.587,11.953 2.589,12.762 2.591,13.618 C2.591,13.912 2.592,14.208 2.592,14.507 C2.546,14.508 2.499,14.510 2.454,14.511 C2.192,14.520 1.944,14.528 1.708,14.494 C1.633,14.483 1.478,14.460 1.479,14.069 C1.484,12.665 1.484,11.237 1.483,9.857 L1.483,6.566 C1.482,5.046 1.482,3.525 1.483,2.005 C1.483,1.551 1.547,1.488 2.012,1.488 C2.394,1.487 2.776,1.487 3.161,1.487 C3.442,1.487 3.725,1.487 4.009,1.487 L4.665,1.487 L4.665,2.232 C4.665,2.862 4.665,3.482 4.665,4.102 C4.665,5.176 5.127,5.634 6.209,5.634 L7.193,5.634 C8.111,5.635 9.029,5.635 9.946,5.633 C10.822,5.631 11.326,5.124 11.329,4.243 C11.331,3.564 11.330,2.886 11.330,2.201 L11.330,1.489 C11.682,1.445 11.949,1.557 12.221,1.853 C12.621,2.288 13.046,2.709 13.457,3.116 C13.753,3.409 14.060,3.713 14.353,4.018 C14.435,4.104 14.500,4.260 14.501,4.374 C14.513,7.385 14.512,10.446 14.511,13.407 L14.511,14.068 C14.511,14.438 14.436,14.514 14.065,14.517 C13.874,14.518 13.682,14.518 13.484,14.518 L13.410,14.518 Z" fill="#ffffff"/></svg>Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>