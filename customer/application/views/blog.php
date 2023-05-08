<?php //echo"<pre>";print_r($designs);die; ?>

<?php $oldUrl = 'https://pushbutton-vip.com/' ?>
   <div class="rcs_blog_banner" style="background:url('<?php echo isset($sheader['image_url']) ? $oldUrl . $sheader['image_url'] : ''; ?>');">
      <div class="rcs_banner_content">
         <h5 style="color : <?php echo isset($sheader['subtextcolor']) ? $sheader['subtextcolor'] : ''; ?>;font-family: '<?php echo isset($sheader['subtextfontfamily']) ? $sheader['subtextfontfamily'] : ''; ?>' "><?php echo isset($sheader['subheading']) ? $sheader['subheading'] : ''; ?></h5>
         <h2 style="color : <?php echo isset($sheader['textcolor']) ? $sheader['textcolor'] : ''; ?>; font-family: '<?php echo isset($sheader['headingtextfontfamily']) ? $sheader['headingtextfontfamily'] : ''; ?>' "><?php echo isset($sheader['heading']) ? $sheader['heading'] : ''; ?></h2>

         <?php if(!empty($autoresponder['header_checkbox'])){ ?>
            <div class="rcs_post_option_form">
               <div class="rcs_post_option_data">
                  <?php if(!empty($autoresponder['header_image_url'])){ ?>
                     <img src="<?php echo $oldUrl.$autoresponder['header_image_url'];?>" alt="">
                  <?php }elseif(isset($designs['siteLogo']['logo_image_url'])){ ?>
                     <img src="<?php echo $oldUrlL.$designs['siteLogo']['logo_image_url'];?>" alt="">
                  <?php } ?>
                  <h3><?php echo $autoresponder['header_headline_text'];?></h3>
                  <p><?php echo $autoresponder['header_sub_headline_text'];?></p>
                  <form id="rcs_leads_form" action="ajax/leads" method="POST">
                     <input type="text" placeholder="Enter Name..." class="rcs_custom_input rcs_name" data-req="1" data-msg="Name is required." name="name">
                     <input type="text" placeholder="Enter Email..." class="rcs_custom_input rcs_input" data-req="1" data-msg="Email is required." name="email">
                     <input type="hidden" value="header" name="form">
                     <button type="submit" class="rcs_btn" style="color: <?php echo $autoresponder['header_button_text_color'];?>; background: <?php echo $autoresponder['header_button_color'];?>" ><?php echo $autoresponder['header_button_text'];?></button>
                  </form>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>
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
   <div class="rcs_blog_wrapper rcs_gridblog">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
            <?php if(empty($articles)){?>
               <div class="rcs_blog_empty">
                  <p>There are currently no posts available.</p>
               </div>
            <?php } ?>  
               <div class="rcs_blog_main">
                  <div class="row">
                  <?php foreach($articles as $key => $article){ if(empty($article['article_name'])) continue; ?>
                     <div class="col-lg-12 col-md-12">
                        <div class="rcs_blog_box">
                        <?php if(!empty($article['article_image_url'])){?>
                           <div class="rcs_blog_img">
                              <a href="<?php echo base_url();?>site/article/<?php echo $article['sa_id'];?>"><img src="<?php echo $oldUrl.$article['article_image_url'];?>" alt=""></a>
                           </div>
                        <?php } ?>   
                           <div class="rcs_blog_content">
                              <a href="<?php echo base_url();?>site/article/<?php echo $article['sa_id'];?>" style="font-weight: <?php echo $designs['headerFont']['headerfontWeight'];?>;font-family: '<?php echo $designs['headerFont']['headerfontFamily'];?>';color: <?php echo $designs['headerFont']['headerfontColor'];?>;font-style: <?php echo $designs['headerFont']['headerfontStyle'];?>;"  class="rcs_post_title"><?php echo $article['article_name'];?></a>

                              <div class="rcs_blog_des" style="font-weight: <?php echo $designs['normalFont']['normalfontWeight'];?>;font-family: '<?php echo $designs['normalFont']['normalfontFamily'];?>';color: <?php echo $designs['normalFont']['normalfontColor'];?>;font-style: <?php echo $designs['normalFont']['normalfontStyle'];?>;"  ><?php echo substr($article['article_content'],0,400).'...';?></div> 
                              <?php if(isset($designs['readmoreButton']['button_text'])){?>
                                  <br>
                                 <a href="<?php echo base_url();?>site/article/<?php echo $article['sa_id'];?>" class="rcs_read_more" style="color: <?php echo $designs['readmoreButton']['buttonfontColor'];?>";><?php echo $designs['readmoreButton']['button_text']; ?><i class="fas fa-caret-right"></i></a>
                                 <!-- //background: <?php //echo $designs['readmoreButton']['buttonBgColor'];?>"  -->
                              <?php }else{ ?>
                                 <!-- <a href="<?php //echo base_url();?>site/article/<?php //echo $article['sa_id'];?>" class="rcs_read_more">Read More <i class="fas fa-caret-right"></i></a> -->
                                  <br>
                                  <a href="<?php echo base_url();?>site/article/<?php echo $article['sa_id'];?>" class="rcs_read_more"><i class="fas fa-caret-right"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                     <?php if($totalArticle > $limit){ ?>
                        <div class="col-lg-12">
                           <div class="rcs_blog_load_more"  >
                              <a href="javascript:;" data-page="<?php echo $this->uri->segment(3);?>" class="rcs_load_more rcs_btn rcs_yellow_btn">Load More</a>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="rcs_sidebar_box">
                  <div class="rcs_post_search">
                  <form action="<?php echo base_url();?>site/index" method="post">
                     <input type="text" class="rcs_custom_input" name="search_article" placeholder="Search your keyword here..." value="<?php echo isset($_POST['search_article']) ? $_POST['search_article'] : '';?>">
                     <span class="fas fa-search"></span>
                  </form>
                  </div>
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
                     <?php foreach($articles as $key => $article){ if(empty($article['article_name'])) continue;?>
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
            <a href="<?php echo $banners['bottomBanner']['bottom_banner_link'];?>" target = "_blank" ><img src="<?php echo $oldUrl.$banners['bottomBanner']['logo_image_url'];?>" alt=""></a>
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
    console.log("blog");
</script>
   