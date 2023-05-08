        <!---------- content section start ---------->
        <div class="rcs_content_wrapper rcs_middle_box">
            <div class="rcs_content_box rcs_admin_article rcs_middle_box_inner">
                <div class="rcs_white_box">
                    <?php
                        if(!empty($this->uri->segment(3))){ ?>
                            <h2>Update Article</h2>
                    <?php }else{ ?>
                        <h2>Create Article</h2>
                    <?php } ?>
                    <div class="rcs_admin_article_box">
                        <form id="rcs_create_article_form" action="">
                            <div class="rcs_form_group">
                                <div class="rcs_row">
                                    <div class="rcs_col">
                                        <div class="rcs_input_field">
                                            <label>Article Name / Title</label>
                                            <input type="hidden" name="a_id" value="<?php echo $this->uri->segment(3);?>" class="rcs_input" >
                                            <?php if(!empty($this->uri->segment(3))){?>
                                                <input type="text" placeholder="Enter Article Name" value="<?= $articles[0]['title']?>" class="rcs_custom_input rcs_input" data-req="1" data-msg="Article name is required." name="title">
                                            <?php }else{?>
                                                <input type="text" placeholder="Enter Article Name" class="rcs_custom_input rcs_input" data-req="1" data-msg="Article name is required." name="title">
                                            <?php }?>
                                        </div>
                                        <div class="rcs_input_field">
                                            <label>Category</label>
                                            <?php if(!empty($this->uri->segment(3))){?>
                                                <select name="category_id" id="" class="rcs_custom_input rcs_input" data-req="1" data-msg="Access level is required" name="access_level">
                                                <?php foreach ($categories as $key => $category_value) {?>
                                                    <option value="<?= $category_value['wc_id'] ?>" <?php echo ($articles[0]['category_id'] == $category_value['wc_id']) ? 'selected' : ''; ?>   ><?= $category_value['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php }else{?>
                                                <select name="category_id" id="" class="rcs_custom_input rcs_input" data-req="1" data-msg="Access level is required" name="access_level">
                                                    <?php foreach ($categories as $key => $category_value) {?>
                                                        <option value="<?= $category_value['wc_id'] ?>"><?= $category_value['name'] ?></option>
                                                        <?php } ?>
                                                </select>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="rcs_col">
                                        <h4 class="rcs_above_input_heading rcs_featured_image">Featured Image</h4>
                                        <?php if(!empty($this->uri->segment(3))){ ?>
                                            <div class="rcs_featured_image_box rcs_image_box">
                                                <div class="rcs_selected_image">
                                                    <img src="../../<?php echo $image_url[0]['file'];?>">
                                                     <input type="hidden" name="image_id" value="<?php echo $image_url[0]['image_url'];?>" class="rcs_input" >
                                                </div>
                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="rcs_featured_image_box rcs_image_box">
                                                <div class="rcs_selected_image">
                                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                                </div>
                                                <p class="rcs_not_showing_img">No article image available right now</p>
                                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library">Upload</a>
                                            </div>
                                        <?php } ?>
                                            
                                    </div>
                                    <div class="rcs_col rcs_full_col">
                                        <h4 class="rcs_above_input_heading">Content</h4>
                                            <div class="rcs_input_field">
                                                <textarea placeholder="Enter Content" class="rcs_custom_input rcs_input" data-req="1" data-msg="Content required." name="content" id="editor"><?php echo isset($articles[0]['content']) ? $articles[0]['content'] : '' ; ?></textarea>
                                            </div>
                                    </div>
                                </div>
                                <div class="rcs_input_field">
                                    <button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg><?php
                                    if(!empty($this->uri->segment(3))){ ?>Update Article <?php }else{ ?>Create Article<?php } ?></button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!---------- content section end ---------->

        <input type="hidden" name="media_image_id" class="rcs_media_image ">
  