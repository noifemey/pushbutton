<div class="rcs_content_wrapper rcs_middle_box rcs_integration_wrapper">
    <div class="rcs_content_box rcs_integration_box rcs_middle_box_inner">
        <div class="rcs_table_head">
            <h2>RSS</h2>
        </div>
        <div class="rcs_integration_body">
            <button id="dev_test_btn">Test</button>
            <select name="category_id" id="" class="rcs_custom_input rcs_input" data-req="1" data-msg="Please select Category">
                <option value="">Select Category</option>
                <?php
                $json_url_dfy = "https://articles.thriivetank.com/category";
                $json_dfy = file_get_contents($json_url_dfy);
                $data_dfy = json_decode($json_dfy,1);
                foreach($data_dfy as $item){
                    echo "<option value='$item'>$item[id]</option>";
                }
                ?>
            </select>
            <textarea placeholder="Enter Content" class="rcs_custom_input rcs_input spinner-area" data-req="1" data-msg="Content required." name="content" id="editor">

            </textarea>
        </div>
<!--        <div class="rcs_integration_body">-->
<!---->
<!--            <form method="post" action="" style="margin-bottom: 15px;">-->
<!--                <input type="text" name="feedurl" placeholder="Enter website feed URL">&nbsp;<input type="submit" value="Submit" name="submit">-->
<!--            </form>-->
<!--            --><?php
//
////            $url = "http://makitweb.com/feed/";
//            if(isset($_POST['submit'])){
//                if($_POST['feedurl'] != ''){
//                    $url = $_POST['feedurl'];
//                }
//            }
//
//            $invalidurl = false;
//            if(@simplexml_load_file($url)){
//                $feeds = simplexml_load_file($url);
//            }else{
//                $invalidurl = true;
//                echo "<h2>Invalid RSS feed URL.</h2>";
//            }
//
//
//            $i=0;
//            if(!empty($feeds)){
//
//
//                $site = $feeds->channel->title;
//                $sitelink = $feeds->channel->link;
//
//                echo "<h1>".$site."</h1>";
//                foreach ($feeds->channel->item as $item) {
//
//                    $title = $item->title;
//                    $link = $item->link;
//                    $description = $item->description;
//                    $postDate = $item->pubDate;
//                    $pubDate = date('D, d M Y',strtotime($postDate));
//
//
//                    if($i>=5) break;
//                    ?>
<!--                    <div class="post">-->
<!--                        <div class="post-head">-->
<!--                            <h2><a class="feed_title" href="--><?php //echo $link; ?><!--">--><?php //echo $title; ?><!--</a></h2>-->
<!--                            <span>--><?php //echo $pubDate; ?><!--</span>-->
<!--                        </div>-->
<!--                        <div class="post-content">-->
<!--                            --><?php //echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?><!-- <a href="--><?php //echo $link; ?><!--">Read more</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    --><?php
//                    $i++;
//                }
//            }else{
//                if(!$invalidurl){
//                    echo "<h2>No item found</h2>";
//                }
//            }
//            ?>
<!---->
<!--        </div>-->
    </div>
</div>
