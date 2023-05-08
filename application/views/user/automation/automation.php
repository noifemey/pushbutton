<div class="rcs_main_wrapper">
        <!---------- content section start ---------->
        <div class="rcs_content_wrapper rcs_integration_wrapper">
            <div class="rcs_content_box rcs_automation_box rcs_middle_box_inner">
                <div class="rcs_table_head">
                    <h2>Select Content - <?php echo $site[0]['site_name']; ?></h2>
                    <div class="rcs_table_head_right hide">
                        <div class="rcs_input_feild">
                            <input type="text" class="rcs_custom_input" placeholder="Search your keyword here...">
                            <span class="fas fa-search"></span>
                        </div>
                    </div>
                </div>
                
                <div class="rcs_custom_tab rcs_automation_tab rcs_step_article_wrapper">
                    <div class="rcs_step_article_box">
                        <div class="rcs_step_article_tabs">
                            <ul>
                                <li><a href="javascript:;" data-tag="rcs_normal_article" class="activelink">Normal Articles</a></li>
                                <li><a href="javascript:;" data-tag="rcs_featured_article" >Featured Articles</a></li>
                            </ul>
                        </div>   
                        <div class="rcs_step_tab_content">
                            <div class="rcs_step_tab_box hide" id="rcs_featured_article">
                                <div class="rcs_row">
                                    
                                </div>
                                <div class="rcs_row">
                                    <div class="rcs_col rcs_full_col">
                                        <div class="">
                                            <a href="javascript:;" class="rcs_btn rcs_featuredarticle_schedule_btn">Schedule Article</a>
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
                                            <a href="javascript:;" class="rcs_btn rcs_normalarticle_schedule_btn">Schedule Article</a>
                                            <a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_normalarticle_load_more">Load More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           
                    </div>
                </div>

                <!-- <div class="rcs_table_footer">
                    <p>Showing -  10 out of 30</p>
                    <div class="rcs_pagination">
                        <ul>
                            <li class="rcs_pagination_prev"><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="8" height="8" viewBox="0 0 8 8"><path d="M0.193,3.526 L3.524,0.194 C3.788,-0.068 4.213,-0.068 4.477,0.194 C4.739,0.457 4.739,0.883 4.477,1.147 L1.621,4.002 L4.477,6.859 C4.739,7.121 4.739,7.548 4.477,7.810 C4.213,8.073 3.788,8.073 3.524,7.810 L0.193,4.477 C-0.069,4.215 -0.069,3.790 0.193,3.526 L0.193,3.526 ZM4.198,3.325 L6.845,0.536 C7.110,0.256 7.540,0.256 7.807,0.536 C8.072,0.816 8.072,1.271 7.807,1.551 L5.641,3.832 L7.807,6.113 C8.072,6.393 8.072,6.847 7.807,7.127 C7.540,7.408 7.110,7.408 6.845,7.127 L4.198,4.339 C3.933,4.059 3.933,3.605 4.198,3.325 L4.198,3.325 Z" fill="#7a8ebe"></path></svg></a></li>
                            <li><a href="javascript:;">01</a></li>
                            <li class="active"><a href="javascript:;">02</a></li>
                            <li><a href="javascript:;">03</a></li>
                            <li><span>...</span></li>
                            <li><a href="javascript:;">09</a></li>
                            <li><a href="javascript:;">10</a></li>
                            <li class="rcs_pagination_prev"><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="7.97" height="7.969" viewBox="0 0 7.97 7.969"><path d="M7.772,3.512 L4.454,0.193 C4.191,-0.068 3.768,-0.068 3.505,0.193 C3.244,0.454 3.244,0.879 3.505,1.142 L6.350,3.986 L3.505,6.831 C3.244,7.093 3.244,7.518 3.505,7.779 C3.768,8.042 4.191,8.042 4.454,7.779 L7.772,4.460 C8.033,4.198 8.033,3.775 7.772,3.512 L7.772,3.512 ZM3.782,3.311 L1.147,0.534 C0.882,0.255 0.454,0.255 0.188,0.534 C-0.076,0.813 -0.076,1.266 0.188,1.545 L2.345,3.817 L0.188,6.089 C-0.076,6.368 -0.076,6.820 0.188,7.099 C0.454,7.378 0.882,7.378 1.147,7.099 L3.782,4.322 C4.047,4.043 4.047,3.590 3.782,3.311 L3.782,3.311 Z" fill="#7a8ebe"></path></svg></a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="rcs_content_box rcs_automation_box rcs_schedule_article hide">
                <div class="rcs_table_head">
                    <h2>Schedule Articles</h2>
                    <div class="rcs_table_head_right">
                        <h2>Integrated Auto Responder</h2>
                        <div class="rcs_input_feild">
                            <select name="" class="rcs_custom_input rcs_custom_input2" data-req="1" data-msg="Access level is required" name="access_level">
                                <option value="biz-opp/mmp">ClickBank</option>
                                <option value="health-and-fitness">Warrior+</option>
                                <option value="health-and-fitness">Digistore</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="rcs_custom_tab rcs_automation_tab">
                    <h2>Mailing List Of Selected Auto Responder</h2>
                    <div class="rcs_tab_menu">
                        <ul>
                            <li class="active"><a href="javascript:;">All</a></li>
                            <li><a href="javascript:;">Biz opp /MMO</a></li>
                            <li><a href="javascript:;">Health and fitness</a></li>
                            <li><a href="javascript:;">Personal Development</a></li>
                            <li><a href="javascript:;">Relationships and Dating</a></li>
                            <li><a href="javascript:;">Survival</a></li>
                        </ul>
                        <div class="rcs_tab_content">
                            <div class="rcs_tab_section">
                                <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 01</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 02</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 03</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 04</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 05</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 06</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 01</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 02</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 03</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 04</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 05</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                                  <div class="rcs_article_box rcs_popup_btn" data-main_popup="rcs_emailcontent_popup" data-open_popup="rcs_popup_open">
                                    <h5>Email Title here 06</h5>
                                    <p>Hi there, John!</p>
                                    <p>Here is the dome dummy content Short Description of product in these Names lorem Ipsum the in the lorem part of the texts mails of has been industry and the particular bame the.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rcs_table_footer rcs_schedule_mailing">
                    <div>
                        <h4>Schedule Mailing</h4>
                        <p>Emails will be set 24 hours interval for each email</p>
                    </div>
                    <div class="rcs_input_field">
                        <label>Time</label>
                        <input type="text" class="rcs_custom_input" placeholder="24 hours">
                        <span class="far fa-clock"></span>
                    </div>
                </div>
            </div>

            <div class="rcs_input_field text-center hide">
                <button type="submit" class="rcs_btn">Upload & schedule  to broadcast</button>
                
            </div>
        </div>
        <!---------- content section end ---------->

        <div class="rcs_popup_wrapper rcs_articleList_popup">
            <div class="rcs_popup_overlay"></div>
            <div class="rcs_popup_inner"> 
                <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
                <div class="rcs_board_box">
                    <!-- <h4 class="rcs_popup_heading">Add User</h4> -->
                    <form action="" id="rcsAddArticle">
                        <div class="rcs_form_group">
                            <h4 class="rcs_above_input_heading">Articles List</h4>
                            <div class="rcs_input_field">
                                <label>Article Name</label>
                                <input type="text" placeholder="Enter article" class="rcs_custom_input rcs_input" data-req="1" data-msg="Article Title is required." name="title" value="">
                            </div>                         
                            <h4 class="rcs_above_input_heading">Content</h4>
                            <div class="rcs_input_field">
                                <input type="text" id="spinnerArticleContent" value="create_article" class="hidden">
                                <textarea placeholder="Article Content" class="rcs_custom_input" data-req="1" data-msg="Content is required." name="content" id="editor"></textarea>
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
                                    <div class="col-md-6" style="margin-top: 15px; margin-bottom: 15px;">
                                        <button type="button" id="submitSpinner" class="rcs_btn btn-primary">Spin Content</button>
                                    </div>
                                </div>
                            </div>


                            <h4 class="rcs_above_input_heading">Schedule Post</h4>
                            <p>Set future date and time to post on selected website and the default timezone : <?php echo date_default_timezone_get();?></p>
                            <div class="rcs_datetime_field">
                                <div class="rcs_input_field rcs_date">
                                    <label>Date</label>
										<input type="date" placeholder="DD/MM/YYYY" class="rcs_custom_input rcs_datepicker rcs_input" data-req="1" data-msg="Article Schedule Date is required." name="date" min='1899-01-01' max='2000-13-13' id="datefeild">
										<span class="far fa-calendar-alt"></span> 
                                </div>
                                <div class="rcs_input_field rcs_time">
                                    <label>Time</label>
                                    <input type="time" placeholder="02:00 AM" class="rcs_custom_input rcs_timepicker rcs_input" data-req="1" data-msg="Article Schedule Time is required." name="time"> 
                                    <span class="far fa-clock"></span>
                                </div>
                            </div>
                            <?php if(in_array(3, $this->session->userdata( 'access_level' ))){ ?>
                            <?php if(isset($facebook_pages)){ ?>
                                <div>
                                    <p class="rcs_share_fb"><a href="javascript:;"><input type="checkbox" value="1" name="share_facebook" class="rcs_checkbox rcs_facebook_share__" id="share_facebook"> <label for="share_facebook" style="cursor:pointer;">Share on facebook</label></a></p>
                                    <div class="rcs_input_field hide rcs_facebook_pages__">
                                        <label>Select Facebook Page</label>
                                            <select name="facebook_page_id" id="" class="rcs_custom_input rcs_input">
                                                <option value="">Select Facebook Page</option>
                                                <?php foreach ($facebook_pages as $page) {?>
                                                    <option value="<?= $page['id'] ?>"><?= $page['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                </div>
                            <?php }} ?>
                            <div class="rcs_input_field">
                                <input type="hidden" value="" name="article_id">
                                <button type="submit" class="rcs_btn">PUBLISH</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>

        
    </div>