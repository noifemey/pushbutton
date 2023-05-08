<?php //echo"<pre>";print_r($total_sites);die; ?>
<!---------- content section start ---------->
        <div class="rcs_content_wrapper">
            <div class="rcs_analytics_box">
                <h3 style="color: #FFF;">Analytics</h3> 
                <?php if($total_sites[0]['total'] > 0){ ?>
                <div class="rcs_right_div">
                    <h4 style="color: #FFF;">Created Websites</h4>
                    <div class="rcs_input_field">
                        <select name="site_name" id="site_name" class="rcs_custom_input" placeholder="Select Name" data-req="1" data-msg="">
                            <option value="">Select Site</option>
                            <?php 
                                if(!empty($sites)){
                                    foreach($sites as $key => $site_value){
                            ?>
                                <option value="<?php echo $site_value['s_id'];?>" ><?php echo $site_value['site_name'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="rcs_analytics_main_content">
                <div class="rcs_views_wrapper">
                    <div class="rcs_view_box ">
                        <span class="fas fa-eye"></span>
                        <div>
                            <h3 class="rcs_pageView"></h3>
                            <p>Number of pages views</p>
                        </div>
                    </div>
                    <div class="rcs_view_box rcs_pink">
                        <span class="fas fa-eye"></span>
                        <div>
                            <h3 class="rcs_uniquepageView"></h3>
                            <p>Number of unique pages views</p>
                        </div>
                    </div>
                    <div class="rcs_view_box rcs_green">
                        <span class="fas fa-eye"></span>
                        <div>
                            <h3 class="rcs_leadGenerated"></h3>
                            <p>Number of Leads Generated views</p>
                        </div>
                    </div>
                </div>
                <div class="rcs_content_box rcs_dashboard_box">
                    <div class="rcs_table_head">
                        <h2 class="rcs_total_subs"></h2>
                    </div>
                    <?php if($total_sites[0]['total'] == 0){?>
                    <div class="rcs_no_data_subs" >
                        <div class="rcs_empty_box">
                            <div class="rcs_empty_box_img">
								<img src="<?php echo base_url()?>assets/images/empty_box.png" alt="empty box">
							</div>
                            <div class="rcs_empty_box_txt">
                                <h3>Not any site is created yet</h3>
                                <p>There are not any site are available. If you want to create an site then click button below.</p>
                                <?php if(in_array(3, $this->session->userdata( 'access_level' ))){ ?>                  
                                    <a href="<?php echo base_url('user/dfy-page');?>" class="rcs_btn rcs_yellow_btn"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg> Done For You Push Button</a>
                                <?php } ?>
                                <?php if(in_array(2, $this->session->userdata( 'access_level' )) || (in_array(1, $this->session->userdata( 'access_level' )) && $total_sites[0]['total'] < 1)){ ?>
                                    <a href="<?php echo base_url('user/create-site');?>" class="rcs_btn"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg> Create Push Button Site</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="rcs_no_data_subs" >
						<div class="rcs_empty_box">
							<div class="rcs_empty_box_img">
								<img src="<?php echo base_url()?>assets/images/empty_box.png" alt="empty box">
							</div>
							<div class="rcs_empty_box_txt rcs_empty_txt ">
								<h3>No Data Found ! Please Select Website Name Above</h3>
							</div>
							<div class="rcs_empty_box_txt rcs_empty_txt_append "></div>
						</div>
                    </div>
                    <?php }?>
                    <div class="rcs_table hide">
                        <table>
                            <tr>
                                <th>#</th>
                                <th>Subscriber Name</th>
                                <th>Subscriber Email</th>
                                <th>Date Time</th>
                            </tr>
                            <tbody id="rcs_subscriber_Data"></tbody>    
                        </table>
                    </div>
                
                    <div class="rcs_table_footer hide"></div>
                </div>
            </div>
        </div>
        <!---------- content section end ---------->