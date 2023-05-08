<style>
span.rcs_content {
    font-weight: 300;
    font-family: 'Abril Fatface';
    color: #910766;
    font-style: normal;
}

</style>
<?php //echo"<pre>";print_r($sitesPage);die; ?>
   <!-- top banner start-->
   <div class="rcs_top_ad_wrapper">
      <div class="container">
         <div class="rcs_top_ad_box">
         <?php if(isset($banners['topBanner']['logo_image_url'])){?>
            <a href="<?php echo $banners['topBanner']['top_banner_link'];?>" target = "_blank" ><img src="<?php echo MAIN_URL.$banners['topBanner']['logo_image_url'];?>" alt=""></a>
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
               <div class="rcs_blog_main">
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="rcs_blog_box">
                           <div class="rcs_blog_content">
                              <p class="rcs_post_title" style="font-weight: <?php echo $designs['headerFont']['headerfontWeight'];?>;font-family: '<?php echo $designs['headerFont']['headerfontFamily'];?>';color: <?php echo $designs['headerFont']['headerfontColor'];?>;font-style: <?php echo $designs['headerFont']['headerfontStyle'];?>;" ><?php echo $sitesPage['page_name'];?></p>
                              
                              <span class="rcs_content" style="font-weight: <?php echo $designs['normalFont']['normalfontWeight'];?>;font-family: '<?php echo $designs['normalFont']['normalfontFamily'];?>';color: <?php echo $designs['normalFont']['normalfontColor'];?>;font-style: <?php echo $designs['normalFont']['normalfontStyle'];?>;"  ><?php echo $sitesPage['content'];?></span>
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
                     <a href="<?php echo $banners['sideBanner']['sidebar_banner_link'];?>" target = "_blank"><img src="<?php echo MAIN_URL.$banners['sideBanner']['logo_image_url'];?>" alt=""></a>
                  <?php } ?>
                  <?php echo !empty($banners['sideBanner']['sidebar_banner_google_ads']) ? $banners['sideBanner']['sidebar_banner_google_ads'] : ''; ?>
                  </div>
                  <?php if(!empty($autoresponder['sidebar_checkbox'])){ ?>
                  <div class="rcs_post_option_form">
                     <div class="rcs_post_optin_img">
                        <?php if(!empty($autoresponder['sidebar_image_url'])){ ?>
                           <img src="<?php echo MAIN_URL.$autoresponder['sidebar_image_url'];?>" alt="">
                        <?php }elseif(isset($designs['siteLogo']['logo_image_url'])){ ?>
                           <img src="<?php echo MAIN_URL.$designs['siteLogo']['logo_image_url'];?>" alt="">
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
            <a href="<?php echo $banners['bottomBanner']['bottom_banner_link'];?>" target = "_blank"><img src="<?php echo MAIN_URL.$banners['bottomBanner']['logo_image_url'];?>" alt=""></a> 
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
               <img src="<?php echo MAIN_URL.$autoresponder['sliding_image_url'];?>" alt="">
            <?php }elseif(isset($designs['siteLogo']['logo_image_url'])){ ?>
               <img src="<?php echo MAIN_URL.$designs['siteLogo']['logo_image_url'];?>" alt="">
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
  