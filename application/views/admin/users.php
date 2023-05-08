
<!---------- content section start ---------->
<div class="rcs_content_wrapper">
    <div class="rcs_content_box rcs_dashboard_box">
    <?php if($total_users[0]['total'] > 0){ ?>
        <div class="rcs_table_head">
            <h2>Users (<?php echo $total_users[0]['total']; ?>)</h2>
            <div class="rcs_table_head_right">
                <div class="rcs_input_feild">
                    <form action="<?php base_url('admin/user'); ?>" method="post"> 
                        <input type="text" class="rcs_custom_input" placeholder="Search your keyword here..." name="search_user" value="<?php echo isset($_POST['search_user']) ? $_POST['search_user'] : '';?>">
                        <button type="submit"  class="fas fa-search"></button>
                    </form> 
                </div>
                <a href="javascipt:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_add_user_popup" data-open_popup="rcs_popup_open" data-form="aadd_user"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg> Add User</a>
            </div>
        </div>
        <div class="rcs_table rcs_user_table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Access Level</th>
                    <th>Status</th>
                    <th>Source</th>
                    <th>Actions</th>
                </tr>
                    <?php 
                        $i = 1;
                        foreach ($userData as $key => $value) {
                    ?>
                <tbody class="rcs_user_table_tbody">
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['email'];?></td>
                        <td>
                            <?php
                                $access_level = json_decode($value['access_level'], true);
                                if(!empty($access_level)){
                                    echo '<ul class="rcs_access_level">';
                                    foreach($rcsProducts as $p){
                                        if(in_array($p['rp_id'], $access_level)){
                                            echo '<li>',$p['product_name'],'</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                            ?>
                        </td>
                        <td>
                            <div class="rcs_custom_toggle">
                                <label>
                                    <input type="checkbox" onchange="user_status_checkbox(this)" value ="<?= $value['user_id'];?>" <?php if ($value['status'] == 1){?> checked="checked" <?php } ?>  >
                                    <span></span>
                                </label>
                            </div>
                        </td>
                        <td><?php echo $value['source'];?></td>
                        <td data-user_id="<?= $value['user_id']; ?>">
                            <div class="rcs_table_action">
                                <a href="javascript:;" class="rcs_tooltip rcs_popup_btn rcs_edit_user" data-main_popup="rcs_add_user_popup" data-open_popup="rcs_popup_open"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="14" viewBox="0 0 14 14"><path d="M13.627,4.076 L12.450,5.243 C12.388,5.304 12.307,5.335 12.226,5.335 C12.144,5.335 12.063,5.304 12.001,5.242 L8.752,1.992 C8.628,1.868 8.628,1.667 8.751,1.542 L9.917,0.365 C10.400,-0.118 11.237,-0.117 11.718,0.364 L13.627,2.275 C13.867,2.515 14.000,2.835 14.000,3.175 C14.000,3.515 13.867,3.835 13.627,4.076 ZM9.570,3.842 C9.570,3.926 9.536,4.007 9.477,4.067 L3.425,10.122 C3.365,10.183 3.283,10.216 3.200,10.216 C3.183,10.216 3.166,10.214 3.149,10.212 C3.048,10.195 2.961,10.131 2.915,10.040 L2.666,9.543 L1.830,9.543 L1.395,11.066 L2.932,12.603 L4.454,12.168 L4.454,11.331 L3.957,11.083 C3.866,11.037 3.802,10.950 3.785,10.849 C3.769,10.748 3.802,10.645 3.875,10.573 L9.927,4.517 C10.046,4.398 10.257,4.398 10.376,4.517 L11.547,5.688 C11.607,5.748 11.640,5.829 11.640,5.914 C11.640,5.999 11.606,6.080 11.546,6.139 L4.996,12.634 C4.992,12.638 4.987,12.639 4.983,12.643 C4.967,12.657 4.949,12.666 4.931,12.677 C4.913,12.688 4.895,12.699 4.875,12.706 C4.869,12.708 4.865,12.712 4.860,12.714 L2.927,13.267 L0.405,13.988 C0.376,13.996 0.347,14.000 0.318,14.000 C0.234,14.000 0.153,13.967 0.093,13.907 C0.011,13.825 -0.020,13.705 0.012,13.594 L0.732,11.071 L1.285,9.137 C1.299,9.087 1.326,9.047 1.359,9.011 C1.362,9.008 1.361,9.003 1.365,9.000 L7.856,2.447 C7.915,2.387 7.996,2.353 8.081,2.353 L8.081,2.353 C8.166,2.353 8.247,2.386 8.306,2.446 L9.477,3.617 C9.536,3.676 9.570,3.757 9.570,3.842 Z" fill="#7a8ebe"/></svg><span class="rcs_tooltip_text">Edit</span> </a>
                                <a href="javascript:;" class="rcs_tooltip rcs_delete_user"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="10" height="14" viewBox="0 0 10 14"><path d="M9.842,3.688 C9.794,3.722 9.736,3.742 9.673,3.742 L0.334,3.742 C0.271,3.742 0.214,3.722 0.165,3.688 C0.046,3.607 -0.018,3.443 0.031,3.283 L0.286,2.451 C0.352,2.232 0.541,2.084 0.752,2.084 L9.255,2.084 C9.467,2.084 9.655,2.232 9.722,2.451 L9.976,3.283 C10.025,3.443 9.961,3.607 9.842,3.688 ZM6.076,0.845 L3.932,0.845 L3.932,1.239 L3.158,1.239 L3.158,0.790 C3.158,0.354 3.482,-0.000 3.881,-0.000 L6.126,-0.000 C6.525,-0.000 6.850,0.354 6.850,0.790 L6.850,1.239 L6.076,1.239 L6.076,0.845 ZM1.370,4.587 L8.637,4.587 C8.837,4.587 8.993,4.772 8.977,4.989 L8.370,13.189 C8.336,13.647 7.986,14.000 7.566,14.000 L2.442,14.000 C2.021,14.000 1.672,13.647 1.638,13.189 L1.030,4.989 C1.014,4.772 1.171,4.587 1.370,4.587 ZM6.896,13.125 C6.904,13.126 6.912,13.126 6.919,13.126 C7.123,13.126 7.293,12.953 7.305,12.728 L7.669,5.996 C7.681,5.763 7.518,5.563 7.305,5.549 C7.091,5.536 6.908,5.713 6.896,5.946 L6.532,12.679 C6.520,12.912 6.683,13.111 6.896,13.125 ZM4.621,12.703 C4.621,12.937 4.794,13.126 5.008,13.126 C5.222,13.126 5.395,12.937 5.395,12.703 L5.395,5.971 C5.395,5.738 5.222,5.549 5.008,5.549 C4.794,5.549 4.621,5.738 4.621,5.971 L4.621,12.703 ZM2.720,12.729 C2.732,12.953 2.903,13.126 3.105,13.126 C3.113,13.126 3.122,13.126 3.130,13.125 C3.343,13.111 3.505,12.910 3.492,12.677 L3.112,5.945 C3.099,5.712 2.914,5.535 2.701,5.549 C2.488,5.564 2.326,5.764 2.339,5.997 L2.720,12.729 Z" fill="#7a8ebe"/></svg><span class="rcs_tooltip_text">Delete</span> </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php $i++; } ?>

            <tbody class="rcs_user_table_search"></tbody>
            </table>
        </div>
        <?php }else{ ?>
            <?php if(isset($search_user)){ ?>
                <div class="rcs_table_head">
                    <h2>Users (<?php echo $total_users[0]['total']; ?>)</h2>
                    <div class="rcs_table_head_right">
                        <div class="rcs_input_feild">
                            <form action="<?php base_url('admin/user'); ?>" method="post"> 
                                <input type="text" class="rcs_custom_input" placeholder="Search your keyword here..." name="search_user" value="<?php echo isset($_POST['search_user']) ? $_POST['search_user'] : '';?>">
                                <button type="submit"  class="fas fa-search"></button>
                            </form> 
                        </div>
                        <a href="javascipt:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_add_user_popup" data-open_popup="rcs_popup_open" data-form="aadd_user"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg> Add User</a>
                    </div>
                </div>
                <div class="rcs_table rcs_user_table">
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Access Level</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td colspan="6" style="text-align:center;">No result found</td>
                            </tr>
                        </tbody>
                    <tbody class="rcs_user_table_search"></tbody>
                    </table>
                </div>

            <?php }else{?>
            <div class="rcs_content_box rcs_empty_box rcs_full_width">
                <div class="rcs_white_box">
                    <div class="rcs_empty_box_img">
                        <img src="<?= base_url();?>assets/images/empty_box.png" alt="empty box">
                    </div>
                    <div class="rcs_empty_box_txt">
                        <h3>Not any user is created yet</h3>
                        <p>There are not any user are available. If you want to create an user then click button below.</p>
                        <div class="rcs_input_field">
                            <a href="javascipt:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_add_user_popup" data-open_popup="rcs_popup_open" data-form="aadd_user"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg> Add User</a>
                        </div>
                    </div>
                </div> 
            </div>
        <?php }}?>
       
        <div class="rcs_table_footer">
            <p>Showing -  <?php echo count($userData); ?> out of <?php echo $total_users[0]['total']; ?></p>
            <?php if($total_users[0]['total'] > PAGINATIONNUMBER ){ ?>
                <?php
                    $tot = ceil( $total_users[0]['total'] / PAGINATIONNUMBER );
                    $prev_val = $currentPage - 1 == 0 ? 0 : $currentPage - 1;
                    $next_val = $currentPage + 1 <= $tot ? $currentPage + 1 : 0; 
                    $prev = $next = true;    
                ?>
                <div class="rcs_pagination">
                    <ul>
                        <li class="rcs_pagination_prev rcs_pagination_action"><a href="<?php echo $prev_val ? base_url('admin/users/'.$prev_val) : 'javascript:;'; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="8" height="8" viewBox="0 0 8 8"><path d="M0.193,3.526 L3.524,0.194 C3.788,-0.068 4.213,-0.068 4.477,0.194 C4.739,0.457 4.739,0.883 4.477,1.147 L1.621,4.002 L4.477,6.859 C4.739,7.121 4.739,7.548 4.477,7.810 C4.213,8.073 3.788,8.073 3.524,7.810 L0.193,4.477 C-0.069,4.215 -0.069,3.790 0.193,3.526 L0.193,3.526 ZM4.198,3.325 L6.845,0.536 C7.110,0.256 7.540,0.256 7.807,0.536 C8.072,0.816 8.072,1.271 7.807,1.551 L5.641,3.832 L7.807,6.113 C8.072,6.393 8.072,6.847 7.807,7.127 C7.540,7.408 7.110,7.408 6.845,7.127 L4.198,4.339 C3.933,4.059 3.933,3.605 4.198,3.325 L4.198,3.325 Z" fill="#7a8ebe"/></svg></a></li>
                        <?php 
                        for($k=1;$k<=$tot;$k++){ 
                            $num = (PAGINATIONNUMBER * ($k - 1));
                            if($k == 1 || $k == $tot || $k == ($tot -1) || ($num == ($currentPage - PAGINATIONNUMBER)) || ($num == ($currentPage + PAGINATIONNUMBER)) || $num == $currentPage){
                                echo '<li class="rcs_pagination_action ',($currentPage == $k) ? 'active' : '' ,'" ><a href="',base_url('admin/users/'.$k),'">',$k,'</a></li>';
                            }else{
                                if($prev && $num < $currentPage && ($k != 2 || $k != 3 || $k != 4 || $k != 5)){								
                                    echo '<li><span class="">...</span></li>';
                                    $prev = false;
                                }
                                if($next && $num > $currentPage && ($k != $tot - 1 || $k != $tot - 2 || $k != $tot - 3)){
                                    echo '<li><span class="">...</span></li>';
                                    $next = false;
                                }
                            }
                        } ?>
                        <li class="rcs_pagination_prev rcs_pagination_action"><a href="<?php echo $next_val ? base_url('admin/users/'.$next_val) : 'javascript:;'; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="7.97" height="7.969" viewBox="0 0 7.97 7.969"><path d="M7.772,3.512 L4.454,0.193 C4.191,-0.068 3.768,-0.068 3.505,0.193 C3.244,0.454 3.244,0.879 3.505,1.142 L6.350,3.986 L3.505,6.831 C3.244,7.093 3.244,7.518 3.505,7.779 C3.768,8.042 4.191,8.042 4.454,7.779 L7.772,4.460 C8.033,4.198 8.033,3.775 7.772,3.512 L7.772,3.512 ZM3.782,3.311 L1.147,0.534 C0.882,0.255 0.454,0.255 0.188,0.534 C-0.076,0.813 -0.076,1.266 0.188,1.545 L2.345,3.817 L0.188,6.089 C-0.076,6.368 -0.076,6.820 0.188,7.099 C0.454,7.378 0.882,7.378 1.147,7.099 L3.782,4.322 C4.047,4.043 4.047,3.590 3.782,3.311 L3.782,3.311 Z" fill="#7a8ebe"/></svg></a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <div class="rcs_user_search_pagination"></div>
    </div>
</div>
<!---------- content section end ---------->

<div class="rcs_popup_wrapper rcs_add_user_popup">
    <div class="rcs_popup_overlay"></div>
    <div class="rcs_popup_inner"> 
        <span class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="12.031" viewBox="0 0 12 12.031"><path d="M4.397,5.988 C3.817,5.413 3.254,4.860 2.697,4.301 C1.929,3.530 1.166,2.755 0.403,1.980 C-0.052,1.516 -0.056,0.797 0.389,0.344 C0.833,-0.109 1.543,-0.113 2.001,0.347 C3.264,1.614 4.523,2.884 5.782,4.155 C5.845,4.218 5.894,4.296 5.972,4.395 C6.301,4.064 6.598,3.770 6.892,3.472 C7.896,2.455 8.899,1.436 9.903,0.419 C10.400,-0.084 11.114,-0.101 11.573,0.376 C12.027,0.847 11.996,1.547 11.502,2.047 C10.258,3.307 9.014,4.568 7.771,5.829 C7.722,5.879 7.678,5.935 7.613,6.010 C8.013,6.411 8.406,6.803 8.798,7.198 C9.729,8.135 10.659,9.074 11.591,10.011 C12.099,10.522 12.139,11.234 11.682,11.706 C11.250,12.152 10.432,12.139 9.960,11.667 C9.198,10.903 8.442,10.134 7.687,9.363 C7.128,8.793 6.575,8.217 5.987,7.610 C5.527,8.087 5.101,8.534 4.668,8.975 C3.780,9.880 2.890,10.782 1.999,11.683 C1.645,12.041 1.211,12.085 0.755,11.974 C0.337,11.872 0.110,11.568 0.025,11.157 C-0.064,10.731 0.083,10.373 0.379,10.073 C1.648,8.786 2.917,7.500 4.185,6.214 C4.241,6.157 4.295,6.097 4.397,5.988 Z" fill="#c0c8db"/></svg></span>
        <div class="rcs_board_box">
            <h4 class="rcs_popup_heading">Add User</h4>
            <form id="rcs_user_form" action="ajax/addUser">
                <div class="rcs_form_group">
                    <div class="rcs_input_field">
                        <label>Name</label>
                        <input type="text" placeholder="Enter Name" class="rcs_custom_input rcs_input" data-req="1" data-msg="Name is required." name="name">
                    </div>
                    <div class="rcs_input_field">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter Email Address" class="rcs_custom_input rcs_input" data-req="1" data-msg="Email is required." name="email">
                    </div>
                    <div class="rcs_input_field">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" class="rcs_custom_input rcs_input" data-req="1" data-msg="Password is required." name="password">
                    </div>
                    <div class="rcs_input_field">
                        <label>Access Level</label>
                        <select class="rcs_custom_input" id="rcs_access_level" data-req="1" data-msg="Access level is required" name="access_level" multiple>
                        <?php foreach ($rcsProducts as $p) { ?>
                            <option value="<?= $p['rp_id'];?>"><?= $p['product_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="rcs_input_field">
                        <div class="rcs_custom_checkox">
                            <label>
                                <input type="checkbox" name="SendMailCheckbox" class="rcs_checkbox" value="1">
                                <p>Do you want to send details on mail?</p>
                            </label>
                        </div>
                    </div>
                    <div class="rcs_input_field">
                        <input type="hidden" name="admin_user_id" value="" class="rcs_input">
                        <button type="submit" class="rcs_btn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"/></svg><span>Add User</span></button>
                        <button type="button" class="rcs_popup_cross"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.968" height="16" viewBox="0 0 15.968 16"><path d="M5.058,5.969 C4.969,5.646 5.146,5.308 5.436,5.158 C5.770,4.985 6.091,5.027 6.358,5.282 C6.805,5.709 7.239,6.150 7.670,6.592 C7.760,6.685 7.816,6.810 7.920,6.969 C8.427,6.450 8.848,6.019 9.271,5.589 C9.379,5.479 9.484,5.364 9.601,5.264 C9.929,4.986 10.380,4.991 10.671,5.270 C10.970,5.556 10.998,6.037 10.695,6.364 C10.275,6.817 9.829,7.246 9.390,7.681 C9.298,7.772 9.185,7.843 9.044,7.953 C9.500,8.414 9.906,8.824 10.312,9.234 C10.438,9.361 10.570,9.481 10.687,9.616 C10.981,9.956 10.976,10.419 10.682,10.712 C10.388,11.005 9.913,11.022 9.588,10.714 C9.105,10.256 8.644,9.775 8.173,9.305 C8.115,9.248 8.051,9.197 7.935,9.095 C7.452,9.596 6.983,10.097 6.494,10.578 C6.347,10.722 6.157,10.852 5.964,10.912 C5.643,11.010 5.302,10.835 5.143,10.553 C4.966,10.239 5.002,9.884 5.273,9.601 C5.692,9.163 6.125,8.738 6.556,8.312 C6.649,8.221 6.761,8.149 6.913,8.030 C6.346,7.468 5.842,6.983 5.358,6.479 C5.224,6.339 5.108,6.154 5.058,5.969 ZM15.954,8.498 C15.946,8.641 15.930,8.784 15.904,8.924 C15.823,9.352 15.485,9.611 15.063,9.577 C14.666,9.544 14.359,9.195 14.365,8.769 C14.368,8.567 14.391,8.365 14.404,8.163 C14.453,4.522 11.621,1.580 8.045,1.562 C4.935,1.546 2.280,3.693 1.677,6.713 C1.061,9.793 2.656,12.798 5.588,13.973 C7.514,14.746 9.406,14.573 11.218,13.559 C11.291,13.519 11.359,13.470 11.433,13.431 C11.846,13.211 12.287,13.326 12.514,13.713 C12.730,14.079 12.623,14.522 12.236,14.769 C11.280,15.378 10.236,15.762 9.114,15.918 C5.254,16.456 1.653,14.231 0.392,10.535 C-1.238,5.761 2.019,0.617 7.026,0.054 C12.028,-0.508 16.236,3.471 15.954,8.498 Z" fill="#7a8ebe"/></svg>Cancel</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>

    