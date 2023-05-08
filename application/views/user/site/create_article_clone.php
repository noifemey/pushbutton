<?php //echo "<pre>";print_r($products);die; ?>

<!---------- content section start ---------->
<div class="rcs_content_wrapper rcs_middle_box rcs_create_article_page">
    <div class="rcs_content_box rcs_dfy_create_website rcs_middle_box_inner">
        <div class="rcs_white_box">
            <a class="rcs_create_article_close" href="<?php echo base_url();?>user/site-article/<?php echo $this->uri->segment(3);?>"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span></a>
            <h2>Create Content</h2>
            <div class="rcs_create_website_box">
                <div class="rcs_form_group">
                    <div class="rcs_row">
                        <div class="rcs_col4">
                            <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Preferred Network</h4> -->
                            <div class="rcs_input_field">
                                <label>Select Preferred Network <span class="rcs_required_star">*</span></label>
                                <select name="preferred_network" id="preferred_network" class="rcs_custom_input" data-req="1" data-msg="">
                                    <option value="">Select Preferred Network</option>
                                    <?php if(isset($products)){
                                        foreach ($network as $key => $value ){
                                            ?>
                                            <option value="<?php echo $value['n_id']?>" <?php echo ($products[0]['n_id'] == $value['n_id'])? 'selected' : ''; ?> ><?php echo $value['name']?></option>

                                        <?php }}else{
                                        foreach ($network as $key => $value ){
                                            ?>
                                            <option value="<?php echo $value['n_id']?>"><?php echo $value['name']; ?></option>
                                        <?php }}?>
                                </select>
                            </div>
                        </div>
                        <?php if(isset($products) && $products[0]['n_id'] == 2 ){?>
                        <div class="rcs_col4 rcs_product_category hide">
                            <?php }else{?>
                            <div class="rcs_col4 rcs_product_category">
                                <?php }?>
                                <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Category</h4> -->
                                <div class="rcs_input_field">
                                    <label>Select Category <span class="rcs_required_star">*</span></label>
                                    <select name="preferred_network_category" id="preferred_network_category" class="rcs_custom_input" data-req="1" data-msg="">
                                        <option value="">Select Category</option>
                                        <?php if(isset($categories)){
                                            foreach ($categories as $key => $category_value ){
                                                ?>
                                                <option value="<?php echo $category_value['nc_id']?>" <?php echo ($products[0]['nc_id'] == $category_value['nc_id'])? 'selected' : ''; ?> ><?php echo $category_value['name']?></option>
                                            <?php }}?>

                                    </select>
                                </div>
                            </div>
                            <?php if(isset($products) && $products[0]['n_id'] == 2 ){?>
                            <div class="rcs_col4 rcs_product_subcategory hide">
                                <?php }else{?>
                                <div class="rcs_col4 rcs_product_subcategory">
                                    <?php }?>
                                    <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Parent Category</h4> -->
                                    <div class="rcs_input_field">
                                        <label>Select Sub Category <span class="rcs_required_star">*</span></label>
                                        <select name="preferrednetworkPcategory" id="preferrednetworkPcategory" class="rcs_custom_input" data-req="1" data-msg="">
                                            <option value="">Select Sub Category</option>
                                            <?php if(isset($subcategory)){
                                                foreach ($subcategory as $key => $subcategory_value ){
                                                    ?>
                                                    <option value="<?php echo $subcategory_value['nc_id']?>" <?php echo ($products[0]['nsc_id'] == $subcategory_value['nc_id'])? 'selected' : ''; ?> ><?php echo $subcategory_value['name']?></option>
                                                <?php }}?>
                                        </select>
                                    </div>
                                </div>

                                <?php if(isset($products) && $products[0]['n_id'] == 2 ){?>
                                    <div class="rcs_col rcs_full_col">
                                        <div class="rcs_dfy_product_select rcs_row ">
                                            <div class="rcs_col rcs_product_selector_div hide">
                                                <div class="rcs_create_web_slct_prdct">
                                                    <h4 class="rcs_above_input_heading rcs_font16">Select Product</h4>
                                                    <div class="rcs_upload_wrapper rcs_select_product_box">
                                                        <a class="rcs_popup_btn" data-main_popup="rcs_create_website_popup" data-open_popup="rcs_popup_open" href="">
                                                            <div class="rcs_upload_box">
                                                                <img src="<?php echo base_url();?>assets/images/select_product.png" alt="" />
                                                                <p>Select Product</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(!empty($product_data)){?>
                                                <div class="rcs_col rcs_product_selector_div hide">
                                                    <div class="rcs_upload_wrapper rcs_select_product_box rcs_selected_product">
                                                        <span class="rcs_select_product_name ">Product Name :</span>
                                                        <span class="rcs_select_product"><?php echo $products[0]['name'];?></span>
                                                    </div>
                                                </div>
                                            <?php }else{?>
                                                <div class="rcs_col rcs_product_selector_div hide">
                                                    <div class="rcs_upload_wrapper rcs_select_product_box rcs_selected_product">
                                                        <span class="rcs_select_product_name"  data-req="1" data-msg="Product is required">No Product Selected</span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="rcs_col rcs_product_data">
                                                <div class="rcs_create_web_slct_prdct">
                                                    <h4 class="rcs_above_input_heading rcs_font16">Product Name <span class="rcs_required_star">*</span></h4>
                                                    <div class="rcs_upload_wrapper rcs_select_product_box">
                                                        <?php if(!empty($products[0]['product_name'])){?>
                                                            <input type="text" name="product_name" value="<?php echo $products[0]['product_name'];?>" class="rcs_custom_input rcs_input rcs_product_data" placeholder="Product Name" data-req="1" data-msg="Product Name is required" />
                                                        <?php }else{?>
                                                            <input type="text" name="product_name" class="rcs_custom_input rcs_input rcs_product_data" placeholder="Product Name" data-req="1" data-msg="Product Name is required" />
                                                        <?php }?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rcs_col rcs_product_data">
                                                <div class="rcs_create_web_slct_prdct">
                                                    <h4 class="rcs_above_input_heading rcs_font16">Product URL <span class="rcs_required_star">*</span></h4>
                                                    <div class="rcs_upload_wrapper rcs_select_product_box">
                                                        <?php if(!empty($products[0]['product_url'])){?>
                                                            <input type="text" name="product_url" value="<?php echo $products[0]['product_url'];?>" class="rcs_custom_input rcs_product_data rcs_input" placeholder="Product URL" data-req="1" data-msg="Product URL is required" />
                                                        <?php }else{?>
                                                            <input type="text" name="product_url" class="rcs_custom_input rcs_product_data rcs_input" placeholder="Product URL" data-req="1" data-msg="Product URL is required" />
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php }else{?>
                                    <div class="rcs_col rcs_full_col">
                                        <div class="rcs_dfy_product_select rcs_row">
                                            <div class="rcs_col rcs_product_selector_div">
                                                <div class="rcs_create_web_slct_prdct">
                                                    <h4 class="rcs_above_input_heading rcs_font16">Select Product</h4>
                                                    <div class="rcs_upload_wrapper rcs_select_product_box">
                                                        <a class="rcs_popup_btn" data-main_popup="rcs_create_website_popup" data-open_popup="rcs_popup_open" href="">
                                                            <div class="rcs_upload_box">
                                                                <img src="<?php echo base_url();?>assets/images/select_product.png" alt="" />
                                                                <p>Select Product</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(!empty($product_data)){?>
                                                <div class="rcs_col rcs_product_selector_div">
                                                    <div class="rcs_upload_wrapper rcs_select_product_box rcs_selected_product">
                                                        <span class="rcs_select_product_name ">Product Name :</span>
                                                        <span class="rcs_select_product"><?php echo $product_data[0]['name'];?></span>
                                                    </div>
                                                </div>
                                            <?php }else{?>
                                                <div class="rcs_col rcs_product_selector_div">
                                                    <div class="rcs_upload_wrapper rcs_select_product_box rcs_selected_product">
                                                        <span class="rcs_select_product_name"  data-req="1" data-msg="Product is required">No Product Selected</span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="rcs_col rcs_product_data hide">
                                                <div class="rcs_create_web_slct_prdct">
                                                    <div class="rcs_input_field">
                                                        <label>Product Name </label>
                                                        <input type="text" name="product_name" id="product_name" class="rcs_custom_input rcs_input" placeholder="Product Name" data-req="1" data-msg="Product Name is required" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rcs_col rcs_product_data hide">
                                                <div class="rcs_create_web_slct_prdct">
                                                    <div class="rcs_input_field">
                                                        <label>Product URL </label>
                                                        <input type="text" name="product_url" id="product_url" class="rcs_custom_input rcs_input" placeholder="Product URL" data-req="1" data-msg="Product URL is required" />

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php }?>


                                <?php if(empty($products[0]['article_name'])){?>
                                    <div class="rcs_col">
                                        <!-- <h4 class="rcs_above_input_heading rcs_font16">Select Article</h4> -->
                                        <div class="rcs_input_field">
                                            <a id="rcsPopUpSelectContent" href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_select_article_popup" data-open_popup="rcs_popup_open" data-form="image_library">Select Article</a>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if(!empty($products[0]['article_name'])){?>
                                <div class="rcs_col rcs_full_col">
                                    <?php }else{?>
                                    <div class="rcs_col rcs_full_col hide">
                                        <?php } ?>

                                        <form id="rcs_create_site_article_form" action="" enctype="multipart/form-data">
                                            <div class="rcs_article_feild">
                                                <div class="rcs_row">
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Video</h4>
                                                        <br/>
                                                        <input type="radio" id="upload" name="video" value="upload">
                                                        <label for="upload">Upload</label>
                                                        <input type="radio" id="url" name="video" value="url">
                                                        <label for="url">Url</label>
                                                        <div>
                                                            <br/>
                                                            <div class="upload-btn-wrapper">
                                                                <a class="btn hidden rcs_btn" id="upload_btn">Upload a video</a>
                                                                <input type="file" id="upload_source" name="upload_source" accept="video/*" class="video-option hidden rcs_input" />
                                                            </div>
                                                        </div>
                                                        <input type="text"  id="url_source" class="video-option rcs_custom_input input-hidden" />
                                                    </div>
                                                    <div class="rcs_col">

                                                    </div>
                                                </div>
                                                <div class="rcs_row">
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Article Name / Title <span class="rcs_required_star">*</span></h4>
                                                        <div class="rcs_input_field">
                                                            <label>Article Name / Title</label>
                                                            <?php if(isset($products)){?>
                                                                <input type="text" name="title" class="rcs_custom_input rcs_input" value="<?= $products[0]['article_name'];?>" placeholder="Article Name / Title" data-req="1" data-msg="Article title is required" />
                                                            <?php }else{?>
                                                                <input type="text" name="title" class="rcs_custom_input rcs_input" placeholder="Article Name / Title" data-req="1" data-msg="Article title is required" />
                                                            <?php }?>
                                                        </div>

                                                        <h4 class="rcs_above_input_heading">Features Image</h4>
                                                        <div class="rcs_featured_image_box rcs_image_box">
                                                            <?php if(isset($products) && !empty($products[0]['article_image_url']) ){?>
                                                                <div class="rcs_selected_image">
                                                                    <img src="<?php echo base_url($products[0]['article_image_url']);?>">
                                                                    <input type="hidden" name="image_id" value="<?php echo $products[0]['article_image_id'];?>" class="rcs_input" >
                                                                    <input type="hidden" name="image_url" value="<?php echo $products[0]['article_image_url'];?>" class="rcs_input" >
                                                                </div>
                                                                <!-- <p class="rcs_not_showing_img hide">No website logo image available right now</p> -->
                                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }else{?>
                                                                <div class="rcs_selected_image rcs_featured_image">

                                                                </div>
                                                                <div class="rcs_selected_image rcs_fea_not_show_img">
                                                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                                </div>
                                                                <p class="rcs_not_showing_img">No website features image available right now</p>
                                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="rcs_col">
                                                        <h4 class="rcs_above_input_heading">Call to Action Button</h4>
                                                        <div class="rcs_input_field">
                                                            <label>Button Text <span class="rcs_required_star">*</span></label>
                                                            <?php if(isset($products)){?>
                                                                <input type="text" name="button_text" value="<?php echo  $products[0]['button_text'];?>" class="rcs_custom_input rcs_input" placeholder="Button text here..." data-req="1" data-msg="Button text is required" />
                                                            <?php }else{?>
                                                                <input type="text" name="button_text" value="" class="rcs_custom_input rcs_input" placeholder="Button text here..." data-req="1" data-msg="Button text is required" />
                                                            <?php }?>
                                                        </div>
                                                        <div class="rcs_input_field">
                                                            <label>Button text font family</label>
                                                            <select name="buttontextfontfamily" id="buttontextfontfamily" class="selectpicker rcs_custom_input rcs_custom_input2 rcs_input" data-req="1" data-msg="Button text family is required">
                                                                <?php if(isset($products)){?>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Abril Fatface')? 'selected' : ''; ?> data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Anton')? 'selected' : ''; ?> data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Dancing Script')? 'selected' : ''; ?> data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Droid Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Droid Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Gloria Hallelujah')? 'selected' : ''; ?> data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Indie Flower')? 'selected' : ''; ?> data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Lato')? 'selected' : ''; ?> data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Lobster')? 'selected' : ''; ?> data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Lora')? 'selected' : ''; ?> data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Montserrat')? 'selected' : ''; ?> data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Open Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Oswald')? 'selected' : ''; ?> data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'PT Sans')? 'selected' : ''; ?> data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'PT Serif')? 'selected' : ''; ?> data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Pacifico')? 'selected' : ''; ?> data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Playfair Display')? 'selected' : ''; ?> data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Raleway')? 'selected' : ''; ?> data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Roboto')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Roboto Condensed')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Roboto Slab')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Rubik')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Slabo 27px')? 'selected' : ''; ?> data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Source Sans Pro')? 'selected' : ''; ?> data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Ubuntu')? 'selected' : ''; ?> data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Monoton')? 'selected' : ''; ?> data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Bungee Inline')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Black Ops One')? 'selected' : ''; ?> data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Finger Paint')? 'selected' : ''; ?> data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Bungee Shade')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Ribeye Marrow')? 'selected' : ''; ?> data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Suez One')? 'selected' : ''; ?> data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Josefin Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Acme')? 'selected' : ''; ?> data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Varela Round')? 'selected' : ''; ?> data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Archivo Black')? 'selected' : ''; ?> data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Berkshire Swash')? 'selected' : ''; ?> data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Righteous')? 'selected' : ''; ?> data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Concert One')? 'selected' : ''; ?> data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Fredoka One')? 'selected' : ''; ?> data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Limelight')? 'selected' : ''; ?> data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Cabin Sketch')? 'selected' : ''; ?> data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Electrolize')? 'selected' : ''; ?> data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Niconne')? 'selected' : ''; ?> data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Aclonica')? 'selected' : ''; ?> data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Reem Kufi')? 'selected' : ''; ?> data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Love Ya Like A Sister')? 'selected' : ''; ?> data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Vast Shadow')? 'selected' : ''; ?> data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Ravi Prakash')? 'selected' : ''; ?> data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Germania One')? 'selected' : ''; ?> data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Nosifer')? 'selected' : ''; ?> data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Pirata One')? 'selected' : ''; ?> data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Rubik Mono One')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Butcherman')? 'selected' : ''; ?> data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Great Vibes')? 'selected' : ''; ?> data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Quicksand')? 'selected' : ''; ?> data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Bree Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Francois One')? 'selected' : ''; ?> data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Kaushan Script')? 'selected' : ''; ?> data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Patua One')? 'selected' : ''; ?> data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Permanent Marker')? 'selected' : ''; ?> data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Alfa Slab One')? 'selected' : ''; ?> data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Cookie')? 'selected' : ''; ?> data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Lalezar')? 'selected' : ''; ?> data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Patrick Hand')? 'selected' : ''; ?> data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Passion One')? 'selected' : ''; ?> data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Boogaloo')? 'selected' : ''; ?> data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Paytone One')? 'selected' : ''; ?> data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Playball')? 'selected' : ''; ?> data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Fugaz One')? 'selected' : ''; ?> data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Oleo Script')? 'selected' : ''; ?> data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Knewave')? 'selected' : ''; ?> data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Bevan')? 'selected' : ''; ?> data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Faster One')? 'selected' : ''; ?> data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Leckerli One')? 'selected' : ''; ?> data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Bungee')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Pattaya')? 'selected' : ''; ?> data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Rye')? 'selected' : ''; ?> data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Federo')? 'selected' : ''; ?> data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Nova Square')? 'selected' : ''; ?> data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'Ranchers')? 'selected' : ''; ?> data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
                                                                    <option <?php echo ($products[0]['button_text_family'] == 'New Rocker')? 'selected' : ''; ?> data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>
                                                                <?php }else{?>
                                                                    <option data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
                                                                    <option data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
                                                                    <option data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
                                                                    <option data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
                                                                    <option data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
                                                                    <option data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
                                                                    <option data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
                                                                    <option data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
                                                                    <option data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
                                                                    <option data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
                                                                    <option data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
                                                                    <option data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
                                                                    <option data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
                                                                    <option data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
                                                                    <option data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
                                                                    <option data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
                                                                    <option data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
                                                                    <option data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
                                                                    <option data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
                                                                    <option data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
                                                                    <option data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
                                                                    <option data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
                                                                    <option data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
                                                                    <option data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
                                                                    <option data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
                                                                    <option data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
                                                                    <option data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
                                                                    <option data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
                                                                    <option data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
                                                                    <option data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
                                                                    <option data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
                                                                    <option data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
                                                                    <option data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                                                    <option data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
                                                                    <option data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
                                                                    <option data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
                                                                    <option data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
                                                                    <option data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
                                                                    <option data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
                                                                    <option data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
                                                                    <option data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
                                                                    <option data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
                                                                    <option data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
                                                                    <option data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
                                                                    <option data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
                                                                    <option data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
                                                                    <option data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
                                                                    <option data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
                                                                    <option data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
                                                                    <option data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
                                                                    <option data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
                                                                    <option data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
                                                                    <option data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
                                                                    <option data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
                                                                    <option data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
                                                                    <option data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
                                                                    <option data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                                                    <option data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
                                                                    <option data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
                                                                    <option data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
                                                                    <option data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
                                                                    <option data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
                                                                    <option data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
                                                                    <option data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
                                                                    <option data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
                                                                    <option data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
                                                                    <option data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
                                                                    <option data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
                                                                    <option data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
                                                                    <option data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
                                                                    <option data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
                                                                    <option data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
                                                                    <option data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
                                                                    <option data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
                                                                    <option data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
                                                                    <option data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
                                                                    <option data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
                                                                    <option data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
                                                                    <option data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
                                                                    <option data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
                                                                    <option data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
                                                                    <option data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
                                                                    <option data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
                                                                    <option data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>
                                                                <?php }?>
                                                            </select>
                                                        </div>

                                                        <div class="rcs_row rcs_color_row">
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Color</h4>

                                                                <div class="rcs_color_picker_box">
                                                                    <div class="color-picker">
                                                                        <?php if(isset($products)){?>
                                                                            <input type="text" name="buttoncolor" class="rcs_color_input colorpicker-element rcs_input"  value="<?php echo $products[0]['button_color'];?>">
                                                                            <span style="background : <?php echo $products[0]['button_color'];?>"></span>
                                                                        <?php }else{ ?>
                                                                            <input type="text" name="buttoncolor" class="rcs_color_input colorpicker-element rcs_input"  value="#4169e1">
                                                                            <span style="background : #4169e1" ></span>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rcs_col">
                                                                <h4 class="rcs_above_input_heading">Button Text Color</h4>

                                                                <div class="rcs_color_picker_box">
                                                                    <div class="color-picker">
                                                                        <?php if(isset($products)){?>
                                                                            <input type="text" name="buttontextcolor" class="rcs_color_input colorpicker-element rcs_input" value="<?php echo $products[0]['button_text_color'];?>">
                                                                            <span style="background : <?php echo $products[0]['button_text_color'];?>"></span>
                                                                        <?php }else{ ?>
                                                                            <input type="text" name="buttontextcolor" class="rcs_color_input colorpicker-element rcs_input" value="#ffffff">
                                                                            <span style="background : #ffffff" ></span>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rcs_row">
                                                <div class="rcs_col rcs_full_col">
                                                    <h4 class="rcs_above_input_heading">Content</h4>
                                                    <input id="spinnerArticleContent" type="text" name="spinnerArticleContent" class="hidden rcs_input"  value="create_article">
                                                    <div>
                                                        <video width="540" height="310" id="vid-container" class="hidden" controls>
                                                            <source src="" id="vid-source" name="vid-source" class="">
                                                        </video>
                                                        <iframe src="" class="hidden rcs_video" id="vid-url" name="vid-url" allow='autoplay'></iframe>
                                                    </div>
                                                    <div class="rcs_article_content">
                                                        <?php if($products[0]['article_video'] != null){ ?>
                                                            <div>
                                                                <?php if (filter_var($products[0]['article_video'], FILTER_VALIDATE_URL)) {?>
                                                                    <iframe src="<?php echo $products[0]['article_video']?>" class="rcs_video" id="vid-url-2" name="vid-url-2" allow='autoplay'></iframe>
                                                                <?php } else {?>
                                                                    <video width="540" height="310" id="vid-container-2" controls>
                                                                        <source src="<?php echo base_url().'/'.$products[0]['article_video']?>" id="vid-source-2" name="vid-source-2" class="">
                                                                    </video>
                                                                <?php }?>
                                                            </div>
                                                        <?php }?>
                                                        <textarea placeholder="Enter Content" class="rcs_custom_input rcs_input" data-req="1" data-msg="Content required." name="content" id="editor">
																<?php echo isset($products[0]['article_content']) ? $products[0]['article_content'] : '' ; ?>
															</textarea>
                                                    </div>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-6" style="margin-top: 20px;">
                                                                <div class="rcs_input_field" style="width: 50%;">
                                                                    <label for="langSpinner">Language<span class="rcs_required_star">*</span></label>
                                                                    <select class="js-example-basic-single" name="langSpinner" id="langSpinner">
                                                                        <option value="en">English</option>
                                                                        <option value="du">Dutch</option>
                                                                        <option value="fr">French</option>
                                                                        <option value="sp">Spanish</option>
                                                                        <option value="ge">Germany</option>
                                                                        <option value="tr">Turkish</option>
                                                                        <option value="in">Indonesian</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" style="margin-top: 15px;">
                                                                <button type="button" id="submitSpinner" class="rcs_btn btn-primary">Spin Content</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rcs_row hide">
                                                <div class="rcs_col rcs_full_col">
                                                    <input type="checkbox" value="1" name="social_share" class="rcs_checkbox" id="social_share" <?php echo isset($products[0]['social_share']) && $products[0]['social_share'] ? 'checked' : '' ; ?>>
                                                    <label for="social_share" style="cursor:pointer;">Social Share</label>
                                                </div>
                                            </div>
                                            <div class="rcs_input_field">
                                                <input type="hidden" name="sa_id" value="<?php echo $this->uri->segment(4);?>" class="rcs_custom_input rcs_input"/>
                                                <input type="hidden" name="s_id" value="<?php echo $this->uri->segment(3);?>" class="rcs_custom_input rcs_input"/>
                                                <?php //if(!empty($product_data)){?>
                                                <button type="submit" class="rcs_btn publish">Publish Now</button>
                                                <?php //}else{ ?>
                                                <!-- <button class="rcs_btn" disabled>Create Articles</button> -->
                                                <?php //} ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rcs_popup_wrapper rcs_create_website_popup">
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
                            <form id="rcs_create_product_form" action="">
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
                                    <?php if(isset($product_data)){?>
                                        <div class="rcs_popup_create_web_info_box">
                                            <ul>
                                                <li>
                                                    <h5>Product Name</h5>
                                                    <p><?php echo $product_data[0]['name'];?></p>
                                                </li>

                                                <li>
                                                    <h5>Short Description</h5>
                                                    <p><?php echo $product_data[0]['description'];?></p>
                                                </li>

                                                <li>
                                                    <h5>Commission</h5>
                                                    <p><?php echo $product_data[0]['commission'];?></p>
                                                </li>

                                                <li>
                                                    <h5>Product URL</h5>
                                                    <p><?php echo $product_url;?></p>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php }else{?>
                                        <div class="rcs_popup_create_web_info_box hide"></div>
                                    <?php }?>

                                    <div class="rcs_input_field">
                                        <input type="hidden" name="s_id" value="<?php echo $this->uri->segment(3);?>" class="rcs_custom_input rcs_input"/>
                                        <input type="hidden" name="sa_id" value="<?php echo $this->uri->segment(4);?>" class="rcs_custom_input rcs_input"/>
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
                </div>


                <div class="rcs_popup_wrapper rcs_select_article_popup">
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
                        <div class="rcs_select_article_box">
                            <h4 class="rcs_popup_heading">Select Article</h4>
                            <div class="rcs_custom_tab rcs_step_article_wrapper">
                                <div class="rcs_step_article_box">
                                    <div class="rcs_step_article_tabs">
                                        <ul>
                                            <li><a href="javascript:;" data-tag="rcs_normal_article" class="activelink">Normal Articles</a></li>
                                            <li><a href="javascript:;" data-tag="rcs_featured_article" class="">Featured Articles</a></li>
                                            <li><a href="javascript:;" data-tag="rcs_new_article" class="">New</a></li>
                                        </ul>
                                    </div>
                                    <div class="rcs_step_tab_content">
                                        <div class="rcs_step_tab_box hide" id="rcs_featured_article">
                                            <div class="rcs_row">

                                            </div>
                                            <div class="rcs_row">
                                                <div class="rcs_col rcs_full_col">
                                                    <div class="">
                                                        <a href="javascript:;" class="rcs_btn rcs_featuredarticle_schedule_btn">Select Article</a>
                                                        <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_featuredarticle_load_more">Load More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rcs_step_tab_box" id="rcs_normal_article">
                                            <div class="rcs_row">

                                            </div>
                                            <div class="rcs_row">
                                                <div class="rcs_col rcs_full_col">
                                                    <div class="">
                                                        <a href="javascript:;" class="rcs_btn rcs_normalarticle_schedule_btn">Select Article</a>
                                                        <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_normalarticle_load_more">Load More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rcs_step_tab_box hide" id="rcs_new_article">
                                            <div class="rcs_row">
                                                <div class="rcs_col rcs_full_col">
                                                    <div class="rcs_input_field">
                                                        <label for="category_id_new">Select Category <span class="rcs_required_star">*</span></label>
                                                        <select id="category_id_new" name="category_id_new" class="rcs_custom_input rcs_input" data-req="1" data-msg="Please select Category">
                                                            <option value="0">Select Category</option>
                                                            <?php
                                                            $json_url_dfy = "https://articles.thriivetank.com/category";
                                                            $json_dfy = file_get_contents($json_url_dfy);
                                                            $data_dfy = json_decode($json_dfy,1);
                                                            foreach($data_dfy as $item){
                                                                echo "<option value='$item[id]'>$item[title]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="rcs_input_field">
                                                        <label for="keywords_id_new">Keywords</label>
                                                        <select id="keywords_id_new" class="form-control" multiple="multiple" data-select2-tags="true">
                                                        </select>
                                                    </div>
                                                    <div class="rcs_input_field">
                                                        <label for="logicKeywords_id_new">Logic for Keywords</label>
                                                        <select id="logicKeywords_id_new" name="logicKeywords_id_new" class="rcs_custom_input rcs_input" data-req="1" data-msg="Please select Category">
                                                            <option value="">Select Logic</option>
                                                            <option value="all">Contains All</option>
                                                            <option value="any">Contains Any</option>
                                                            <option value="none">Contains None</option>
                                                        </select>
                                                    </div>
                                                    <div class="rcs_input_field">
                                                        <a href="javascript:;" class="rcs_btn rcs_search_new_btn">Search</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="div_new_continue" class="rcs_row" style="display: none;">
                                                <div class="rcs_col rcs_full_col">
                                                    <div id="div_new_search_contents" class="div_new_contents">
                                                    </div>
                                                </div>
                                                <div class="rcs_col rcs_full_col">
                                                    <div class="">
                                                        <a href="javascript:;" class="rcs_btn rcs_newarticle_schedule_btn">Select Article</a>
                                                        <!--                                                        <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_normalarticle_load_more">Load More</a>-->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---------- content section end ---------->      