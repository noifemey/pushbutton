<?php //echo"<pre>";print_r($total_product);die; ?>
        <!---------- content section start ---------->
        <div class="rcs_content_wrapper">
            <div class="rcs_content_box rcs_dashboard_box rcs_multiplestream_box">
                <div class="rcs_table_head">
                    <h2>Product List</h2>
                    <!-- <div class="rcs_table_head_right">
                        <div class="rcs_input_feild">
                            <form action="<?php //base_url('user/recurringPassiveIncome'); ?>" method="post"> 
                                <input type="text" class="rcs_custom_input" placeholder="Search your keyword here..." name="search_product" value="<?php //echo isset($_POST['search_product']) ? $_POST['search_product'] : '';?>">
                                <button type="submit"  class="fas fa-search"></button>
                            </form> 
                        </div> 
                    </div> -->
                </div>
                <div class="rcs_table">
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Download Product</th>
                        </tr>
                        <tbody>
                        <?php
                            $i = 1;
                            if(!empty($products)){
                                foreach($products as $key => $products_value){
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                <?php if(!empty($products_value['product_image'])){?>
                                    <img height="90px" width="100px" src="<?= base_url();?>product/OTO 5/images/<?= $products_value['product_image'];?>" alt="">
                                <?php }else{ ?>
                                    <img src="<?= base_url();?>assets/images/product_img.jpg" alt="">
                                <?php } ?>
                                </td>
                                <td><?php echo $products_value['product_name'] ?></td>
                                <td><a href="<?= base_url();?>product/OTO 5/<?= $products_value['product_link'];?>"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="14" viewBox="0 0 14 14"> <defs><style>.cls-1{fill:#7a8ebe;fill-rule:evenodd}</style></defs> <path d="M13.067,14.000 L0.933,14.000 C0.418,14.000 0.000,13.609 0.000,13.125 L0.000,9.625 L1.867,9.625 L1.867,12.250 L12.133,12.250 L12.133,9.625 L14.000,9.625 L14.000,13.125 C14.000,13.609 13.583,14.000 13.067,14.000 ZM7.351,10.350 C7.262,10.445 7.134,10.500 7.000,10.500 C6.866,10.500 6.738,10.446 6.649,10.350 L3.382,6.850 C3.262,6.721 3.232,6.538 3.309,6.381 C3.384,6.226 3.550,6.125 3.733,6.125 L5.600,6.125 L5.600,0.437 C5.600,0.196 5.809,-0.000 6.067,-0.000 L7.933,-0.000 C8.191,-0.000 8.400,0.196 8.400,0.437 L8.400,6.125 L10.267,6.125 C10.449,6.125 10.616,6.225 10.691,6.381 C10.767,6.538 10.739,6.722 10.618,6.850 L7.351,10.350 Z" class="cls-1"/> </svg></span> Download</a></td>
                            </tr>
                            <?php $i++; } }?>
                        </tbody>
                    </table>
                </div>
                <div class="rcs_table_footer">
                    <p>Showing -  <?php echo count($products); ?> out of <?php echo $total_product[0]['total']; ?></p>
                    <?php if($total_product[0]['total'] > PAGINATIONNUMBER ){ ?>
                        <?php
                            $tot = ceil( $total_product[0]['total'] / PAGINATIONNUMBER );
                            $prev_val = $currentPage - 1 == 0 ? 0 : $currentPage - 1;
                            $next_val = $currentPage + 1 <= $tot ? $currentPage + 1 : 0; 
                            $prev = $next = true;    
                        ?>
                        <div class="rcs_pagination">
                            <ul>
                                <li class="rcs_pagination_prev rcs_pagination_action"><a href="<?php echo $prev_val ? base_url('user/recurringPassiveIncome/'.$prev_val) : 'javascript:;'; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="8" height="8" viewBox="0 0 8 8"><path d="M0.193,3.526 L3.524,0.194 C3.788,-0.068 4.213,-0.068 4.477,0.194 C4.739,0.457 4.739,0.883 4.477,1.147 L1.621,4.002 L4.477,6.859 C4.739,7.121 4.739,7.548 4.477,7.810 C4.213,8.073 3.788,8.073 3.524,7.810 L0.193,4.477 C-0.069,4.215 -0.069,3.790 0.193,3.526 L0.193,3.526 ZM4.198,3.325 L6.845,0.536 C7.110,0.256 7.540,0.256 7.807,0.536 C8.072,0.816 8.072,1.271 7.807,1.551 L5.641,3.832 L7.807,6.113 C8.072,6.393 8.072,6.847 7.807,7.127 C7.540,7.408 7.110,7.408 6.845,7.127 L4.198,4.339 C3.933,4.059 3.933,3.605 4.198,3.325 L4.198,3.325 Z" fill="#7a8ebe"/></svg></a></li>
                                <?php 
                                for($k=1;$k<=$tot;$k++){ 
                                    $num = (PAGINATIONNUMBER * ($k - 1));
                                    if($k == 1 || $k == $tot || $k == ($tot -1) || ($num == ($currentPage - PAGINATIONNUMBER)) || ($num == ($currentPage + PAGINATIONNUMBER)) || $num == $currentPage){
                                        echo '<li class="rcs_pagination_action ',($currentPage == $k) ? 'active' : '' ,'" ><a href="',base_url('user/recurringPassiveIncome/'.$k),'">',$k,'</a></li>';
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
                                <li class="rcs_pagination_prev rcs_pagination_action"><a href="<?php echo $next_val ? base_url('user/recurringPassiveIncome/'.$next_val) : 'javascript:;'; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="7.97" height="7.969" viewBox="0 0 7.97 7.969"><path d="M7.772,3.512 L4.454,0.193 C4.191,-0.068 3.768,-0.068 3.505,0.193 C3.244,0.454 3.244,0.879 3.505,1.142 L6.350,3.986 L3.505,6.831 C3.244,7.093 3.244,7.518 3.505,7.779 C3.768,8.042 4.191,8.042 4.454,7.779 L7.772,4.460 C8.033,4.198 8.033,3.775 7.772,3.512 L7.772,3.512 ZM3.782,3.311 L1.147,0.534 C0.882,0.255 0.454,0.255 0.188,0.534 C-0.076,0.813 -0.076,1.266 0.188,1.545 L2.345,3.817 L0.188,6.089 C-0.076,6.368 -0.076,6.820 0.188,7.099 C0.454,7.378 0.882,7.378 1.147,7.099 L3.782,4.322 C4.047,4.043 4.047,3.590 3.782,3.311 L3.782,3.311 Z" fill="#7a8ebe"/></svg></a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!---------- content section end ---------->