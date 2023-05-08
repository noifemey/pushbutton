<?php 
//echo"<pre>";print_r($pages);die; ?>
        <!---------- content section start ---------->
        <div class="rcs_content_wrapper">
            <div class="rcs_step_list">
                <ul>
                <?php if($this->uri->segment(3) != ''){ ?>
                    <li class="active"><a href="<?php echo base_url();?>user/create_site/<?php echo $this->uri->segment(3);?>">Create</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site_header/<?php echo $this->uri->segment(3);?>">Header</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site-design/<?php echo $this->uri->segment(3);?>">Design</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/site-article/<?php echo $this->uri->segment(3);?>">Create Content</a></li>
                    <li class="current_active"><a href="<?php echo base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>">Create Pages</a></li>
                    <li><a href="<?php echo base_url();?>user/site-banner/<?php echo $this->uri->segment(3);?>">Banner Ads</a></li>
                    <li><a href="<?php echo base_url();?>user/site-autoresponder/<?php echo $this->uri->segment(3);?>">Optin, Share and Publish</a></li>
                <?php }else{ ?>
                    <li class="active"><a href="javascript:;">Create</a></li>
                    <li class="active"><a href="javascript:;">Header</a></li>
                    <li class="active"><a href="javascript:;">Design</a></li>
                    <li class="active"><a href="javascript:;">Create Articles</a></li>
                    <li class="current_active"><a href="javascript:;">Create Pages</a></li>
                    <li><a href="javascript:;">Banner Ads</a></li>
                    <li><a href="javascript:;">Optin, Share and Publish</a></li>
                <?php } ?>
                </ul>
            </div>
            <div class="rcs_create_site_box rcs_site_step4">
				<?php if($total_page[0]['total'] > 0){?>
                <div class="rcs_content_box">
                    <div class="rcs_table_head">
                        <h2>Create Pages (<?php echo $total_page[0]['total'] ?>)</h2>
                        <div class="rcs_table_head_right">
                            <div class="rcs_input_feild">
                                <form action="<?php echo base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>" method="post">
                                    <input type="text" class="rcs_custom_input" name="search_page" placeholder="Search your keyword here..." value="<?php echo isset($_POST['search_page']) ? $_POST['search_page'] : '';?>">
                                    <span class="fas fa-search"></span>
                                </form>
                            </div>
                            <a href="javascipt:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_add_page_popup" data-open_popup="rcs_popup_open"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg> Create New page</a>
                        </div>
                    </div>
                    <div class="rcs_table">
                        <table>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Actions</th>
                            </tr>
                            <?php 
                                $i = 1;
                                foreach ($pages as $key => $value) {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $value['page_name'];?></td>
                                    <td data-page_id="<?= $value['p_id']; ?>">
                                        <div class="rcs_table_action">
                                            <a href="javascript:;" class="rcs_tooltip rcs_popup_btn rcs_edit_page" data-main_popup="rcs_add_page_popup" data-open_popup="rcs_popup_open"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="14" viewBox="0 0 14 14"><path d="M13.627,4.076 L12.450,5.243 C12.388,5.304 12.307,5.335 12.226,5.335 C12.144,5.335 12.063,5.304 12.001,5.242 L8.752,1.992 C8.628,1.868 8.628,1.667 8.751,1.542 L9.917,0.365 C10.400,-0.118 11.237,-0.117 11.718,0.364 L13.627,2.275 C13.867,2.515 14.000,2.835 14.000,3.175 C14.000,3.515 13.867,3.835 13.627,4.076 ZM9.570,3.842 C9.570,3.926 9.536,4.007 9.477,4.067 L3.425,10.122 C3.365,10.183 3.283,10.216 3.200,10.216 C3.183,10.216 3.166,10.214 3.149,10.212 C3.048,10.195 2.961,10.131 2.915,10.040 L2.666,9.543 L1.830,9.543 L1.395,11.066 L2.932,12.603 L4.454,12.168 L4.454,11.331 L3.957,11.083 C3.866,11.037 3.802,10.950 3.785,10.849 C3.769,10.748 3.802,10.645 3.875,10.573 L9.927,4.517 C10.046,4.398 10.257,4.398 10.376,4.517 L11.547,5.688 C11.607,5.748 11.640,5.829 11.640,5.914 C11.640,5.999 11.606,6.080 11.546,6.139 L4.996,12.634 C4.992,12.638 4.987,12.639 4.983,12.643 C4.967,12.657 4.949,12.666 4.931,12.677 C4.913,12.688 4.895,12.699 4.875,12.706 C4.869,12.708 4.865,12.712 4.860,12.714 L2.927,13.267 L0.405,13.988 C0.376,13.996 0.347,14.000 0.318,14.000 C0.234,14.000 0.153,13.967 0.093,13.907 C0.011,13.825 -0.020,13.705 0.012,13.594 L0.732,11.071 L1.285,9.137 C1.299,9.087 1.326,9.047 1.359,9.011 C1.362,9.008 1.361,9.003 1.365,9.000 L7.856,2.447 C7.915,2.387 7.996,2.353 8.081,2.353 L8.081,2.353 C8.166,2.353 8.247,2.386 8.306,2.446 L9.477,3.617 C9.536,3.676 9.570,3.757 9.570,3.842 Z" fill="#7a8ebe"/></svg><span class="rcs_tooltip_text ">Edit</span> </a>
                                            <a href="javascript:;" class="rcs_tooltip rcs_delete_page"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="10" height="14" viewBox="0 0 10 14"><path d="M9.842,3.688 C9.794,3.722 9.736,3.742 9.673,3.742 L0.334,3.742 C0.271,3.742 0.214,3.722 0.165,3.688 C0.046,3.607 -0.018,3.443 0.031,3.283 L0.286,2.451 C0.352,2.232 0.541,2.084 0.752,2.084 L9.255,2.084 C9.467,2.084 9.655,2.232 9.722,2.451 L9.976,3.283 C10.025,3.443 9.961,3.607 9.842,3.688 ZM6.076,0.845 L3.932,0.845 L3.932,1.239 L3.158,1.239 L3.158,0.790 C3.158,0.354 3.482,-0.000 3.881,-0.000 L6.126,-0.000 C6.525,-0.000 6.850,0.354 6.850,0.790 L6.850,1.239 L6.076,1.239 L6.076,0.845 ZM1.370,4.587 L8.637,4.587 C8.837,4.587 8.993,4.772 8.977,4.989 L8.370,13.189 C8.336,13.647 7.986,14.000 7.566,14.000 L2.442,14.000 C2.021,14.000 1.672,13.647 1.638,13.189 L1.030,4.989 C1.014,4.772 1.171,4.587 1.370,4.587 ZM6.896,13.125 C6.904,13.126 6.912,13.126 6.919,13.126 C7.123,13.126 7.293,12.953 7.305,12.728 L7.669,5.996 C7.681,5.763 7.518,5.563 7.305,5.549 C7.091,5.536 6.908,5.713 6.896,5.946 L6.532,12.679 C6.520,12.912 6.683,13.111 6.896,13.125 ZM4.621,12.703 C4.621,12.937 4.794,13.126 5.008,13.126 C5.222,13.126 5.395,12.937 5.395,12.703 L5.395,5.971 C5.395,5.738 5.222,5.549 5.008,5.549 C4.794,5.549 4.621,5.738 4.621,5.971 L4.621,12.703 ZM2.720,12.729 C2.732,12.953 2.903,13.126 3.105,13.126 C3.113,13.126 3.122,13.126 3.130,13.125 C3.343,13.111 3.505,12.910 3.492,12.677 L3.112,5.945 C3.099,5.712 2.914,5.535 2.701,5.549 C2.488,5.564 2.326,5.764 2.339,5.997 L2.720,12.729 Z" fill="#7a8ebe"/></svg><span class="rcs_tooltip_text">Delete</span> </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $i++; }?>
                        </table>
                    </div>
                </div>
				<?php }else{?>
                    <?php if(isset($_POST['search_page'])){ ?>
                        <div class="rcs_content_box rcs_empty_box rcs_full_width">
                            <div class="rcs_white_box">
                                <div class="rcs_empty_box_img">
                                    <img src="<?= base_url();?>assets/images/empty_box.png" alt="empty box">
                                </div>
                                <div class="rcs_empty_box_txt">
                                    <h3>Page not found</h3>
                                    <p>We are sorry, the page you requested could not be found. If you want to create a page then click button below.</p>
                                    <div class="rcs_input_field">
                                        <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_add_page_popup" data-open_popup="rcs_popup_open"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Create Page</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php }else{ ?>
                        <div class="rcs_content_box rcs_empty_box rcs_full_width">
                            <div class="rcs_white_box">
                                <div class="rcs_empty_box_img">
                                    <img src="<?= base_url();?>assets/images/empty_box.png" alt="empty box">
                                </div>
                                <div class="rcs_empty_box_txt">
                                    <h3>Not any page is created yet</h3>
                                    <p>There are not any page is available for this website. If you want to create a page then click button below.</p>
                                    <div class="rcs_input_field">
                                        <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_add_page_popup" data-open_popup="rcs_popup_open"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Create Page</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php } ?>
                <?php }?>
				
                <div class="rcs_create_site_btns">
                    <a href="<?= base_url();?>user/site_article/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_yellow_btn rcs_step_prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M2.686,5.843 C2.959,5.843 3.132,5.843 3.305,5.843 C7.412,5.845 11.518,5.846 15.625,5.848 C15.763,5.848 15.901,5.849 16.038,5.847 C16.674,5.835 16.996,5.556 17.001,5.016 C17.005,4.479 16.669,4.175 16.050,4.169 C15.402,4.162 14.754,4.163 14.107,4.163 C10.483,4.164 6.858,4.166 3.234,4.167 C3.076,4.167 2.918,4.167 2.644,4.167 C3.510,3.234 4.293,2.405 5.057,1.556 C5.211,1.385 5.346,1.148 5.390,0.920 C5.456,0.574 5.303,0.280 5.002,0.109 C4.670,-0.079 4.354,-0.020 4.090,0.255 C3.565,0.801 3.052,1.361 2.536,1.917 C1.815,2.694 1.096,3.471 0.377,4.250 C-0.118,4.786 -0.124,5.211 0.363,5.737 C1.579,7.050 2.795,8.363 4.016,9.671 C4.356,10.034 4.692,10.092 5.017,9.878 C5.484,9.570 5.542,8.964 5.133,8.516 C4.446,7.767 3.748,7.028 3.057,6.283 C2.954,6.171 2.860,6.049 2.686,5.843 Z" fill="#444444"/></svg>Prev</a>
                    <a href="<?= base_url();?>user/site_banner/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_step_next">Next <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M14.314,5.843 C14.041,5.843 13.868,5.843 13.695,5.843 C9.588,5.845 5.481,5.846 1.375,5.848 C1.237,5.848 1.099,5.849 0.961,5.847 C0.326,5.835 0.004,5.557 -0.001,5.016 C-0.005,4.479 0.331,4.175 0.950,4.169 C1.598,4.162 2.245,4.163 2.893,4.163 C6.517,4.164 10.142,4.166 13.766,4.167 C13.924,4.167 14.082,4.167 14.356,4.167 C13.490,3.234 12.706,2.405 11.943,1.556 C11.789,1.385 11.654,1.148 11.610,0.920 C11.543,0.574 11.697,0.280 11.998,0.109 C12.330,-0.079 12.646,-0.020 12.910,0.255 C13.435,0.801 13.948,1.361 14.464,1.917 C15.185,2.694 15.904,3.471 16.623,4.250 C17.118,4.786 17.124,5.211 16.637,5.737 C15.421,7.050 14.205,8.363 12.983,9.671 C12.644,10.034 12.308,10.092 11.982,9.878 C11.516,9.570 11.458,8.964 11.867,8.516 C12.554,7.767 13.251,7.028 13.943,6.283 C14.046,6.171 14.140,6.049 14.314,5.843 Z" fill="#ffffff"/></svg></a>
                </div>
            </div>
            
        </div>
        <!---------- content section end ---------->
        
        
<div class="rcs_popup_wrapper rcs_add_page_popup">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_board_box">
            <h4 class="rcs_popup_heading">Create Page</h4>
            <form id="rcs_site_page_form" action="ajax/addPage">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>Page Title <span class="rcs_required_star">*</span></label>
                        <input type="text" maxlength="80" placeholder="Enter Title" class="rcs_custom_input rcs_input" data-req="1" data-msg="Title is required." name="title">
                        <input type="hidden" class="rcs_custom_input rcs_input" name="page_id">
                    </div>
                    <div class="rcs_input_field">
                        <label>Page Content <span class="rcs_required_star">*</span></label>
                        <!--<h4 class="rcs_above_input_heading">Content</h4>-->
                        <div class="rcs_article_content">
                            <textarea placeholder="Enter Content" class="rcs_custom_input" data-req="1" data-msg="Content required." name="content" id="editor"></textarea>
                        </div>
                    </div>
                    <div class="rcs_input_field ">
						<div class="rcs_row">
							<div class="rcs_col">
								<a href="" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_preview_page_popup" data-open_popup="rcs_popup_open"><i class="fas fa-eye mr-6"></i>PREVIEW PAGE</a>
							</div>
							<div class="rcs_col rcs_align_right">
								<input type="hidden" name="s_id" value="<?php echo $this->uri->segment(3);?>" class="rcs_input">
								<button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg><span>PUBLISH</span></button>
								<button type="button" class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.968" height="16" viewBox="0 0 15.968 16"><path d="M5.058,5.969 C4.969,5.646 5.146,5.308 5.436,5.158 C5.770,4.985 6.091,5.027 6.358,5.282 C6.805,5.709 7.239,6.150 7.670,6.592 C7.760,6.685 7.816,6.810 7.920,6.969 C8.427,6.450 8.848,6.019 9.271,5.589 C9.379,5.479 9.484,5.364 9.601,5.264 C9.929,4.986 10.380,4.991 10.671,5.270 C10.970,5.556 10.998,6.037 10.695,6.364 C10.275,6.817 9.829,7.246 9.390,7.681 C9.298,7.772 9.185,7.843 9.044,7.953 C9.500,8.414 9.906,8.824 10.312,9.234 C10.438,9.361 10.570,9.481 10.687,9.616 C10.981,9.956 10.976,10.419 10.682,10.712 C10.388,11.005 9.913,11.022 9.588,10.714 C9.105,10.256 8.644,9.775 8.173,9.305 C8.115,9.248 8.051,9.197 7.935,9.095 C7.452,9.596 6.983,10.097 6.494,10.578 C6.347,10.722 6.157,10.852 5.964,10.912 C5.643,11.010 5.302,10.835 5.143,10.553 C4.966,10.239 5.002,9.884 5.273,9.601 C5.692,9.163 6.125,8.738 6.556,8.312 C6.649,8.221 6.761,8.149 6.913,8.030 C6.346,7.468 5.842,6.983 5.358,6.479 C5.224,6.339 5.108,6.154 5.058,5.969 ZM15.954,8.498 C15.946,8.641 15.930,8.784 15.904,8.924 C15.823,9.352 15.485,9.611 15.063,9.577 C14.666,9.544 14.359,9.195 14.365,8.769 C14.368,8.567 14.391,8.365 14.404,8.163 C14.453,4.522 11.621,1.580 8.045,1.562 C4.935,1.546 2.280,3.693 1.677,6.713 C1.061,9.793 2.656,12.798 5.588,13.973 C7.514,14.746 9.406,14.573 11.218,13.559 C11.291,13.519 11.359,13.470 11.433,13.431 C11.846,13.211 12.287,13.326 12.514,13.713 C12.730,14.079 12.623,14.522 12.236,14.769 C11.280,15.378 10.236,15.762 9.114,15.918 C5.254,16.456 1.653,14.231 0.392,10.535 C-1.238,5.761 2.019,0.617 7.026,0.054 C12.028,-0.508 16.236,3.471 15.954,8.498 Z" fill="#7a8ebe"/></svg>Cancel</button>
							</div>
						</div>
                    </div>  
                </div> 
            </form>
        </div>
    </div>
</div>

<div class="rcs_popup_wrapper rcs_preview_page_popup">
    <div class="rcs_popup_overlay"></div> 
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross_preview"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_board_box">
            <h4 class="rcs_popup_heading">Preview Page</h4>
			<div class="rcs_input_field">

				<iframe class="iframe-preview" id="iframe-preview" src="<?php echo "https://".$sites[0]['sub_domain'].".pushbutton-vip.com/";?>" title="test"></iframe>
			</div>
        </div>
    </div>
</div>
