<div class="rcs_content_wrapper rcs_automation_list_wrapper">
    <div class="rcs_automation_heading">
        <h3>Select Website</h3>
        <div class="rcs_select_wrapper">
            <div class="rcs_input_field">
                <select class="rcs_custom_input rcs_automation_site">
                    <option value="">Select</option>
                    <?php if(!empty($sites)){ ?>
                        <?php foreach($sites as $site){ ?>
                            <option value="<?php echo $site['s_id']; ?>" ><?php echo $site['site_name']; ?></option>                            
                        <?php } ?>  
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div id="rcs_site_schedule_box"></div>
czczxcxzczxc
    <div class="rcs_popup_wrapper rcs_articleList_popup">
Sample1
        <div class="rcs_popup_overlay"></div>
Sample
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
                            <textarea placeholder="Article Content" class="rcs_custom_input" data-req="1" data-msg="Content is required." name="content" id="editor"></textarea>
                        </div>
                        <h4 class="rcs_above_input_heading">Schedule Post</h4>
                        <p>Set future date and time to post on selected website and the default timezone : <?php echo date_default_timezone_get(); ?></p>
                        <div class="rcs_datetime_field">
                            <div class="rcs_input_field rcs_date">
                                <label>Date</label>
                                <input type="date" placeholder="DD/MM/YYYY" class="rcs_custom_input rcs_datepicker rcs_input" data-req="1" data-msg="Article Schedule Date is required." name="date">
                                <span class="far fa-calendar-alt"></span>
                            </div>
                            <div class="rcs_input_field rcs_time">
                                <label>Time</label>
                                <input type="time" placeholder="02:00 AM" class="rcs_custom_input rcs_timepicker rcs_input" data-req="1" data-msg="Article Schedule Time is required." name="time">
                                <span class="far fa-clock"></span>
                            </div>
                        </div>
                        <?php if(isset($facebook_pages)){ ?>
                            <div>
                                <p class="rcs_share_fb"><a href="javascript:;"><input type="checkbox" value="1" name="share_facebook" class="rcs_checkbox rcs_facebook_share__"> Share on facebook</a></p>
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
                        <?php } ?>
                        <div class="rcs_input_field">
                            <input type="hidden" value="" name="schedule_article_id">
                            <button type="submit" class="rcs_btn">UPDATE</button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>

</div>

<div class="rcs_main_wrapper rcs_mail_schedule_box hide">
    <!---------- content section start ---------->
    <div class="rcs_content_wrapper rcs_integration_wrapper schedule_mail_page hide">
        <div class="rcs_content_box rcs_automation_box rcs_middle_box_inner">
           <div class="rcs_white_box">
            <div class="rcs_table_head ">
                    <h2 class="rcs_site_name"></h2>
                </div>
                <div class="rcs_custom_tab rcs_automation_tab">
                <form class="rcs_create_automation" method="post" >
                    <div class="rcs_row">
                        <div class="rcs_col">
                            <div class="rcs_input_field">
                                <label>Select Auto-responder</label>
                                <select name="autoresponder_name" id="autoresponder_mailign_ligt" class="rcs_custom_input">
                                </select>
                            </div>
                        </div>
                        <div class="rcs_col">
                            <div class="rcs_input_field">
                                <label>Select Mailing List</label>
                                <select name="autoresponse_mailing_list" id="autoresponse_mailing_list" class="rcs_custom_input ">                    
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="rcs_selected_autoresponder mt-50">
                        <h2>Mailing List Of Selected Auto Responder</h2>
                        <div class="rcs_tab_menu">
                            <div class="rcs_tab_content ">
                                <div class="rcs_tab_section rcs_mail_list">
                                </div>
                            </div>
                        </div>

                        <div class="rcs_table_footer rcs_schedule_mailing">
                            <div>
                                <h4>Schedule Mailing</h4>
                                <p>Emails will be set 24 hours interval for each email</p>
                            </div>
                            <div class="rcs_input_field rcs_time">
                                <label>Time</label>
                                <input type="number" readonly class="rcs_custom_input rcs_schedule_time rcs_input" data-req="1" data-msg="Article Schedule Time is required." name="time">
                                <!-- <span class="far fa-clock"></span> -->
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>