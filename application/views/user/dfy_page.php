<?php //echo"<pre>";print_r($autoresponder_data);die; ?>
<!---------- content section start ---------->
        <div class="rcs_content_wrapper">
            <div class="rcs_create_site_box rcs_site_step1">
               <form class="rcs_create_dfysite" method="post" >
                    <div class="rcs_content_box">
                        <div class="rcs_white_box">
                            <h2>Create</h2>
                            <div class="rcs_row">
                                <div class="rcs_col">
                                    <div class="rcs_input_field">
                                        <label>Website Name / Title <span class="rcs_required_star">*</span></label>
                                            <input type="text" placeholder="Enter Website Name..." class="rcs_custom_input rcs_input" data-req="1" data-msg="Website name is required." name="site_name">
                                    </div>
                                </div>  
                                <div class="rcs_col">
                                    <div class="rcs_input_field">
                                        <label>Select Your Niche <span class="rcs_required_star">*</span></label>
                                            <select name="category_id" id="" class="rcs_custom_input rcs_input" data-req="1" data-msg="Please select site niche">
                                                <option value="">Select Category</option>
                                                <?php foreach ($categories as $key => $category_value) {?>
                                                    <option value="<?= $category_value['wc_id'] ?>"><?= $category_value['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="rcs_col rcs_full_col">
                                    <div class="rcs_subdomain_setting">
                                        <h3 class="rcs_above_input_heading">Sub-Domain Setting <span class="rcs_required_star">*</span></h3>
                                        <div class="rcs_subdomain_form">
                                            <span>https://</span>
                                                <input type="text" placeholder="Sub-Domain" data-req="1" data-msg="Subdomain name is required." name="sub_domain_name" class="rcs_input rcs_custom_input" value="<?php //echo $sub_domain; ?>"/>
                                                <span>.pushbutton-vip.com</span>
                                        </div>
                                        <div class="rcs_domain_note hide"><p>Note: These settings will decide your web URL. We have given you a sub-area on pushbutton-vip.com. You may change this effectively utilizing the Sub-Domain settings below.</p></div>
                                        <div class="rcs_domain_qus">
                                            <p> Do you want your own domain ? </p>
                                            <div class="rcs_custom_toggle">
                                                <label>
                                                    <input type="checkbox" value="" <?php echo !empty($site_data[0]['custom_domain']) ? 'checked' : '';?>>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rcs_domain_setting collapse " id="rcs_domain_collapse" style="<?php echo !empty($site_data[0]['custom_domain']) ? 'display:block;' : '';?>">
                                        <h3 class="rcs_above_input_heading">Domain Setting <span class="rcs_required_star">*</span></h3>
                                        <div class="rcs_domain_form">
                                            <span>https://</span>
                                                <input type="text" placeholder="Domain" data-req="" name="domain_name" class="rcs_input rcs_custom_input" value="<?php //echo $custom_domain; ?>"/>
                                        </div>
                                        <div class="rcs_domain_note"><p>Note: Go to DNS settings of your domain manager, add a brand new CNAME record, set your domain or subdomain as host and point it to pushbutton-vip.com. Also add Txt record & set value "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkb21haW4iOiJqb2JzaW5pbmRvcmUubmV0IiwiZXhwIjoxNjE0ODE2MDAwfQ.K-cB_lV5aamaz4haTEm7faPFEGKmxKnKZJw_b4QMA4Y" Please allow 24-48 hours for your custom domain DNS settings to propagate..</p></div>
                                    </div>
                                </div>
                                <div class="rcs_col">
                                    <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Preferred Network</h4> -->
                                    <div class="rcs_input_field">
                                        <label>Select Preferred Network <span class="rcs_required_star">*</span></label>
                                        <select name="preferred_network" id="preferred_network" class="rcs_custom_input" data-req="1" data-msg="">
                                            <option value="">Select Preferred Network</option>
                                        <?php foreach ($network as $key => $value ){ ?>
                                                <option value="<?php echo $value['n_id']?>"><?php echo $value['name']; ?></option>
                                        <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="rcs_col rcs_product_category">
                                    <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Category</h4> -->
                                    <div class="rcs_input_field">
                                        <label>Select Category <span class="rcs_required_star">*</span></label>
                                        <select name="preferred_network_category" id="preferred_network_category" class="rcs_custom_input" data-req="1" data-msg="">
                                            <option value="">Select Category</option>
                                            <?php foreach ($categories as $key => $category_value ){ ?>
                                                <option value="<?php echo $category_value['nc_id']?>" <?php echo ($products[0]['nc_id'] == $category_value['nc_id'])? 'selected' : ''; ?> ><?php echo $category_value['name']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="rcs_col rcs_product_subcategory">
                                    <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Parent Category</h4> -->
                                    <div class="rcs_input_field">
                                        <label>Select Sub Category <span class="rcs_required_star">*</span></label>
                                        <select name="preferrednetworkPcategory" id="preferrednetworkPcategory" class="rcs_custom_input" data-req="1" data-msg="">
                                            <option value="">Select Sub Category</option>
                                            <?php foreach ($subcategory as $key => $subcategory_value ){ ?>
                                                <option value="<?php echo $subcategory_value['nc_id']?>" <?php echo ($products[0]['nsc_id'] == $subcategory_value['nc_id'])? 'selected' : ''; ?> ><?php echo $subcategory_value['name']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="rcs_col rcs_dfyseleted_product">
                                    <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Parent Category</h4> -->
                                    <div class="rcs_input_field">
                                        <label>Select Product <span class="rcs_required_star">*</span></label>
                                        <select name="preferrednetworkProduct" id="preferrednetworkProduct" class="rcs_custom_input " data-req="1" data-msg="">
                                                <option value="" selected>Select Product</option>
                                                <?php if(isset($product_list)){
                                                    foreach ($product_list as $key => $product_lists ){
                                                        ?>
                                                <option value="<?php echo $product_lists['np_id']?>" <?php echo ($products[0]['np_id'] == $product_lists['np_id'])? 'selected' : ''; ?> ><?php echo $product_lists['name']?></option>
                                                <?php }}?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="rcs_col"> -->
                                    <div class="rcs_col rcs_product_data hide">
                                        <div class="rcs_create_web_slct_prdct">
                                            <div class="rcs_input_field">
												<label>Product Name <span class="rcs_required_star">*</span></label>
                                                <input type="text" name="product_name" class="rcs_custom_input rcs_input rcs_product_data" placeholder="Product Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rcs_col rcs_product_data hide">
                                        <div class="rcs_create_web_slct_prdct">
                                            <div class="rcs_input_field">
												<label>Product URL <span class="rcs_required_star">*</span></label>
                                                <input type="text" name="product_url" class="rcs_custom_input rcs_product_data rcs_input" placeholder="Product URL" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <div class="rcs_popup_create_web_info_box hide"></div>
                            <?php if(!empty($autoresponder_data)){?>
                            <div class="rcs_row">
                                <div class="rcs_col">
                                    <div class="rcs_input_field">
                                        <label>Select Auto-responder </label>
                                        <select name="autoresponder_name" id="autoresponder_mailign_ligt" class="rcs_custom_input autoresponder_name rcs_input">
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
                                        <select name="autoresponse_mailing_list" id="autoresponse_mailing_list" class="rcs_custom_input autoresponse_mailing_list rcs_input">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="rcs_content_box rcs_empty_box rcs_full_width">
                                    <div class="rcs_white_box">
                                        <div class="rcs_empty_box_txt">
                                            <p>Please connect at least one Autoresponder on integration page. To connect autoresponder click button below.</p>
                                            <div class="rcs_input_field">
                                                <a href="<?php echo base_url();?>user/integrations" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Connect Autoresponder</a>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            <?php } ?>
                            <div class="rcs_dfy_image_upload">
                                <div class="rcs_row">
                                    <div class="rcs_col">
                                        <h4 class="rcs_above_input_heading rcs_step_heading">Upload website logo</h4>
                                        <div class="rcs_featured_image_box rcs_image_box rcs_logo_image">
                                                <div class="rcs_selected_image">
                                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                </div>
                                                <p class="rcs_not_showing_img">No website logo image available right now</p>
                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="rcs_create_site_btns">
								<button type="submit" class="rcs_btn">Submit</button>
							</div>
                        </div>
                    </div>  
                    
               </form> 
            </div>
        </div>

        <!-- <div class="rcs_popup_wrapper rcs_create_website_popup">
                    <div class="rcs_popup_overlay"></div>
                    <div class="rcs_popup_inner">
                        <span class="rcs_popup_cross">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031">
                                <path
                                    d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z"
                                    fill="#c0c8db"
                                />
                            </svg>
                        </span>
                        <div class="rcs_cre_website_box">
                            <h4 class="rcs_popup_heading">Select Product</h4>
                            <form id="rcs_dfypage_product_form" method="post">
                                <div class="rcs_form_group">
                                    <div class="rcs_input_field">
                                        <label class="rcs_networkName"></label>
                                        <div class="select_parent">
                                            <select name="preferrednetworkProduct" id="preferrednetworkProduct" class="rcs_custom_input rcs_custom_input2" data-req="1" data-msg="" name="">
                                                 <option value="" selected>Select Producat</option>
                                                 <?php if(isset($product_list)){
                                                        foreach ($product_list as $key => $product_lists ){
                                                    ?>
                                                    <option value="<?php echo $product_lists['np_id']?>" <?php echo ($products[0]['np_id'] == $product_lists['np_id'])? 'selected' : ''; ?> ><?php echo $product_lists['name']?></option>
                                                    <?php }}?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="rcs_popup_create_web_info_box"></div>
                                    <div class="rcs_input_field">
                                        <button type="submit" class="rcs_btn">Save Product</button>
                                        <button type="button" class="rcs_popup_cross">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.968" height="16" viewBox="0 0 15.968 16">
                                                <path
                                                    d="M5.058,5.969 C4.969,5.646 5.146,5.308 5.436,5.158 C5.770,4.985 6.091,5.027 6.358,5.282 C6.805,5.709 7.239,6.150 7.670,6.592 C7.760,6.685 7.816,6.810 7.920,6.969 C8.427,6.450 8.848,6.019 9.271,5.589 C9.379,5.479 9.484,5.364 9.601,5.264 C9.929,4.986 10.380,4.991 10.671,5.270 C10.970,5.556 10.998,6.037 10.695,6.364 C10.275,6.817 9.829,7.246 9.390,7.681 C9.298,7.772 9.185,7.843 9.044,7.953 C9.500,8.414 9.906,8.824 10.312,9.234 C10.438,9.361 10.570,9.481 10.687,9.616 C10.981,9.956 10.976,10.419 10.682,10.712 C10.388,11.005 9.913,11.022 9.588,10.714 C9.105,10.256 8.644,9.775 8.173,9.305 C8.115,9.248 8.051,9.197 7.935,9.095 C7.452,9.596 6.983,10.097 6.494,10.578 C6.347,10.722 6.157,10.852 5.964,10.912 C5.643,11.010 5.302,10.835 5.143,10.553 C4.966,10.239 5.002,9.884 5.273,9.601 C5.692,9.163 6.125,8.738 6.556,8.312 C6.649,8.221 6.761,8.149 6.913,8.030 C6.346,7.468 5.842,6.983 5.358,6.479 C5.224,6.339 5.108,6.154 5.058,5.969 ZM15.954,8.498 C15.946,8.641 15.930,8.784 15.904,8.924 C15.823,9.352 15.485,9.611 15.063,9.577 C14.666,9.544 14.359,9.195 14.365,8.769 C14.368,8.567 14.391,8.365 14.404,8.163 C14.453,4.522 11.621,1.580 8.045,1.562 C4.935,1.546 2.280,3.693 1.677,6.713 C1.061,9.793 2.656,12.798 5.588,13.973 C7.514,14.746 9.406,14.573 11.218,13.559 C11.291,13.519 11.359,13.470 11.433,13.431 C11.846,13.211 12.287,13.326 12.514,13.713 C12.730,14.079 12.623,14.522 12.236,14.769 C11.280,15.378 10.236,15.762 9.114,15.918 C5.254,16.456 1.653,14.231 0.392,10.535 C-1.238,5.761 2.019,0.617 7.026,0.054 C12.028,-0.508 16.236,3.471 15.954,8.498 Z"
                                                    fill="#7a8ebe"
                                                />
                                            </svg>Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
        <!---------- content section end ---------->