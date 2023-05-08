<?php //echo"<pre>";print_r($designs);die; ?>
<?php $oldUrl = 'https://pushbutton-vip.com/' ?>
<!-- top banner start-->
<div class="rcs_top_ad_wrapper">
    <div class="container">
        <div class="rcs_top_ad_box">
            <?php if(isset($banners['topBanner']['logo_image_url'])){?>
                <a href="<?php echo $banners['topBanner']['top_banner_link'];?>" target = "_blank"><img src="<?php echo $oldUrl.$banners['topBanner']['logo_image_url'];?>" alt=""></a>
            <?php } ?>
            <?php echo !empty($banners['topBanner']['top_banner_google_ads']) ? $banners['topBanner']['top_banner_google_ads'] : ''; ?>
        </div>
    </div>
</div>
<!-- top banner start-->
<!-- blog section start-->
<div class="rcs_blog_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-lg-2">
                <div class="rcs_blog_main rcs_blog_single_box">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="rcs_blog_box">
                                <div class="rcs_blog_content">
                                    <h3 style="font-weight: bold">
                                        <p class="rcs_post_title" style="font-weight: <?php echo $designs['headerFont']['headerfontWeight'];?>;font-family: '<?php echo $designs['headerFont']['headerfontFamily'];?>';color: <?php echo $designs['headerFont']['headerfontColor'];?>;font-style: <?php echo $designs['headerFont']['headerfontStyle'];?>;" ><?php echo $sitesArticle['article_name'];?></p>
                                    </h3>
                                    <div class="rcs_blog_img" style="margin-top: 25px;">
                                        <?php if(!empty($sitesArticle['article_image_url'])){?>
                                            <img src="<?php echo $oldUrl.$sitesArticle['article_image_url'];?>" alt="">
                                        <?php } ?>
                                    </div>

                                    <?php if(isset($social_share['social_share']) && $social_share['social_share'] && !empty($social_share['data'])){ ?>
                                        <div class="ss-box" data-ss-social="<?php echo implode(', ', $social_share['data']); ?>"></div>
                                    <?php } ?>
                                    <?php if($sitesArticle['video_position'] == "top"){ if($sitesArticle['article_video'] != ""){?>
                                        <?php if(strpos($sitesArticle['article_video'], 'youtube') !== false){?>
                                            <div>
                                                <iframe width="100%" height="480"
                                                        style="margin-top: 45px;"
                                                        src="<?php echo $sitesArticle['article_video'];?>">
                                                </iframe>
                                            </div>
                                        <?php }else{?>
                                            <div>
                                                <video width="100%" height="480" controls>
                                                    <source src="<?php echo $oldUrl.$sitesArticle['article_video'];?>" type="video/mp4">
                                                </video>
                                            </div>
                                        <?php }?>
                                    <?php }else{
                                        echo "";
                                    }}?>
                                    <span style="font-weight: <?php echo $designs['normalFont']['normalfontWeight'];?>;font-family: '<?php echo $designs['normalFont']['normalfontFamily'];?>';color: <?php echo $designs['normalFont']['normalfontColor'];?>;font-style: <?php echo $designs['normalFont']['normalfontStyle'];?>;" ><?php echo $sitesArticle['article_content'];?></span>
                                    <?php if($sitesArticle['video_position'] == "bottom"){ if($sitesArticle['article_video'] != ""){?>
                                        <?php if(strpos($sitesArticle['article_video'], 'youtube') !== false){?>
                                                <div>
                                                    <iframe width="100%" height="480"
                                                            style="margin-top: 45px;"
                                                            src="<?php echo $sitesArticle['article_video'];?>">
                                                    </iframe>
                                                </div>
                                        <?php }else{?>
                                                <div>
                                                    <video width="100%" height="480" controls>
                                                        <source src="<?php echo $oldUrl.$sitesArticle['article_video'];?>" type="video/mp4">
                                                    </video>
                                                </div>
                                        <?php }?>
                                    <?php }else{
                                        echo "";
                                    }}?>
                                    <div>
                                        <a class="rcs_btn rcs_products_btn" target="_blank" style="color: <?php echo $sitesArticle['button_text_color'];?>; background-color: <?php echo $sitesArticle['button_color'];?>; font-family: '<?php echo $sitesArticle['button_text_family'];?>';" href="<?php echo $sitesArticle['product_url'];?>" target="_blank"><?php echo $sitesArticle['button_text'];?></a>
                                    </div>

                                </div>
                                <div class="rcs_blog_author">
                                    <div class="rcs_author_img">
                                        <span><?php echo $author['short_nm']; ?></span>
                                        <?php if(isset($author_img)){ ?>
                                            <img src="<?php echo $oldUrl.$author_img; ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="rcs_author_data">
                                        <h3><?php echo $author['name']; ?> <span>Author</span></h3>
                                        <h5>Email:- <a href="mailto:<?php echo $author['email']; ?>"><?php echo $author['email']; ?></a> </h5>
                                        <?php if(!empty($settings['website'])){ ?>
                                            <h5>Website:- <a href="<?php echo $settings['website']; ?>" target="_blank"><?php echo $settings['website']; ?></a> </h5>
                                        <?php } ?>
                                        <?php if(!empty($settings['aboutyou'])){ ?>
                                            <p><span>About Author:- </span><?php echo $settings['aboutyou']; ?></p>
                                        <?php } ?>
                                        <?php if(!empty($settings['disclaimer'])){ ?>
                                            <p><span>Disclaimer:- </span><?php echo $settings['disclaimer']; ?></p>
                                        <?php } ?>
                                        <ul>
                                            <?php if(!empty($settings['fburl'])){ ?>
                                                <li><a href="<?php echo $settings['fburl']; ?>" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                                            <?php } ?>
                                            <?php if(!empty($settings['twitterurl'])){ ?>
                                                <li><a href="<?php echo $settings['twitterurl']; ?>" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                            <?php } ?>
                                            <?php if(!empty($settings['instaurl'])){ ?>
                                                <li><a href="<?php echo $settings['instaurl']; ?>" target="_blank"><span class="fab fa-instagram"></span></a></li>
                                            <?php } ?>
                                            <?php if(!empty($settings['linkedinurl'])){ ?>
                                                <li><a href="<?php echo $settings['linkedinurl']; ?>" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                                            <?php } ?>
                                            <?php if(!empty($settings['yturl'])){ ?>
                                                <li><a href="<?php echo $settings['yturl']; ?>" target="_blank"><span class="fab fa-youtube"></span></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1">
                <div class="rcs_sidebar_box">
                    <!-- <div class="rcs_post_search">
                       <input type="text" class="rcs_custom_input" placeholder="Search here...">
                       <span class="fas fa-search"></span>
                    </div> -->
                    <div class="rcs_sidebar_banner">
                        <?php if(isset($banners['sideBanner']['logo_image_url'])){?>
                            <a href="<?php echo $banners['sideBanner']['sidebar_banner_link'];?>" target = "_blank"><img src="<?php echo $oldUrl.$banners['sideBanner']['logo_image_url'];?>" alt=""></a>
                        <?php } ?>
                        <?php echo !empty($banners['sideBanner']['sidebar_banner_google_ads']) ? $banners['sideBanner']['sidebar_banner_google_ads'] : ''; ?>
                    </div>
                    <?php if(!empty($autoresponder['sidebar_checkbox'])){ ?>
                        <div class="rcs_post_option_form">
                            <div class="rcs_post_optin_img">
                                <?php if(!empty($autoresponder['sidebar_image_url'])){ ?>
                                    <img src="<?php echo $oldUrl.$autoresponder['sidebar_image_url'];?>" alt="">
                                <?php }elseif(isset($designs['siteLogo']['logo_image_url'])){ ?>
                                    <img src="<?php echo $oldUrl.$designs['siteLogo']['logo_image_url'];?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="rcs_post_option_data">
                                <h3><?php echo $autoresponder['sidebar_headline_text'];?></h3>
                                <p><?php echo $autoresponder['sidebar_sub_headline_text'];?></p>
                                <form id="rcs_leads_form" action="ajax/leads" method="POST">
                                    <input type="text" placeholder="Enter Name..." class="rcs_custom_input rcs_name" data-req="1" data-msg="Name is required." name="name">
                                    <input type="text" placeholder="Enter Email..." class="rcs_custom_input rcs_input" data-req="1" data-msg="Email is required." name="email">
                                    <input type="hidden" value="sidebar" name="form">
                                    <button type="submit" class="rcs_btn" style="color: <?php echo $autoresponder['sidebar_button_text_color'];?>; background: <?php echo $autoresponder['sidebar_button_color'];?>" ><?php echo $autoresponder['sidebar_button_text'];?></button>

                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="rcs_related_posts">
                        <h3>Related Posts</h3>
                        <ul>
                            <?php foreach($articles as $key => $article){ if(empty($article['article_name'])) continue; ?>
                                <li><a href="<?php echo base_url();?>site/article/<?php echo $article['sa_id'];?>" class="rcs_post_title"><?php echo $article['article_name'];?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog section end-->
<!-- top banner start-->
<div class="rcs_bottom_ad_wrapper">
    <div class="container">
        <div class="rcs_bottom_ad_box">
            <?php if(isset($banners['bottomBanner']['logo_image_url'])){?>
                <a href="<?php echo $banners['bottomBanner']['bottom_banner_link'];?>" target = "_blank"><img src="<?php echo $oldUrl.$banners['bottomBanner']['logo_image_url'];?>" alt=""></a>
            <?php } ?>
            <?php echo !empty($banners['bottomBanner']['bottom_banner_google_ads']) ? $banners['bottomBanner']['bottom_banner_google_ads'] : ''; ?>
        </div>
    </div>
</div>
<!-- top banner start-->
<!--- sliding optin form  -->
<?php if(!empty($autoresponder['sliding_checkbox'])){ ?>
    <div class="rcs_post_popup rcs_optin_open">
        <div class="rcs_post_option_form">
            <div class="rcs_option_cross"><span class="fas fa-times"></span></div>
            <div class="rcs_post_optin_img">
                <?php if(!empty($autoresponder['sliding_image_url'])){ ?>
                    <img src="<?php echo $oldUrl.$autoresponder['sliding_image_url'];?>" alt="">
                <?php }elseif(isset($designs['siteLogo']['logo_image_url'])){ ?>
                    <img src="<?php echo $oldUrl.$designs['siteLogo']['logo_image_url'];?>" alt="">
                <?php } ?>
            </div>
            <div class="rcs_post_option_data">
                <h3><?php echo $autoresponder['sliding_headline_text'];?></h3>
                <p><?php echo $autoresponder['sliding_sub_headline_text'];?></p>
                <form id="rcs_leads_form" action="ajax/leads" method="POST">
                    <input type="text" placeholder="Enter Name..." class="rcs_custom_input rcs_name" data-req="1" data-msg="Name is required." name="name">
                    <input type="text" placeholder="Enter Email..." class="rcs_custom_input rcs_input" data-req="1" data-msg="Email is required." name="email">
                    <input type="hidden" value="sliding" name="form">
                    <button type="submit" class="rcs_btn" style="color: <?php echo $autoresponder['sliding_button_text_color'];?>; background: <?php echo $autoresponder['sliding_button_color'];?>" ><?php echo $autoresponder['sliding_button_text'];?></button>

                </form>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    console.log("blog_single");
</script>