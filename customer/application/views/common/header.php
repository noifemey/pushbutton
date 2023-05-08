<?php //echo"<pre>";print_r($title);die; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title><?php echo $site_name; ?>- <?php echo (isset($title))? $title: 'Blog Templates';?></title>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta property="og:title" content="<?php echo isset($sitesArticle['article_name']) ? $sitesArticle['article_name'] : ''; ?>">
   <meta property="og:description" content="<?php echo isset($sitesArticle['article_content']) ? strip_tags( $sitesArticle['article_content'] ) : ''; ?>">
   <?php if(!empty($sitesArticle['article_image_url'])){ ?>
   <meta property="og:image" content="<?php echo MAIN_URL.$sitesArticle['article_image_url']; ?>">
   <?php } ?>
   <meta property="og:url" content="<?php echo isset($sitesArticle['sa_id']) ? base_url('site/article/'.$sitesArticle['sa_id']) : ''; ?>">
   <meta name="MobileOptimized" content="320">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
   <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/fav.png');?>">
   <?php if(isset($font_family)){?>
   <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
      <script>
         WebFont.load({
               google: {
                  families: ['Uncial Antiqua','Metal Mania','Atomic Age','Emblema One','Miltonian','Poppins','Staatliches','Caveat','Satisfy','Electrolize','Luckiest Guy','Audiowide','Pangolin','Merienda One','Capriola','Fredericka the Great','Aladin','Alegreya SC','Ceviche One','Lemon','Abril+Fatface', 'Anton', 'Dancing+Script', 'Droid+Sans', 'Droid+Serif', 'Gloria+Hallelujah', 'Indie+Flower', 'Lato', 'Lobster', 'Lora', 'Montserrat', 'Open+Sans', 'Oswald', 'PT+Sans', 'PT+Serif', 'Pacifico', 'Playfair+Display', 'Raleway', 'Roboto', 'Roboto+Condensed', 'Roboto+Slab', 'Rubik', 'Slabo+27px', 'Source+Sans+Pro', 'Ubuntu', 'Monoton', 'Bungee+Inline', 'Black+Ops+One', 'Finger+Paint', 'Bungee+Shade', 'Ribeye+Marrow', 'Suez+One', 'Teko', 'Josefin+Sans', 'Acme', 'Varela Round', 'Archivo Black', 'Berkshire Swash', 'Righteous', 'Concert One', 'Fredoka One', 'Limelight', 'Cabin Sketch', 'Electrolize', 'Niconne', 'Aclonica', 'Reem Kufi', 'Love Ya Like A Sister', 'Vast Shadow', 'Ravi Prakash', 'Germania One', 'Nosifer', 'Pirata One', 'Rubik Mono One', 'Butcherman', 'Great Vibes', 'Teko', 'Quicksand', 'Bree+Serif', 'Francois+One', 'Kaushan+Script', 'Patua+One', 'Permanent+Marker', 'Alfa+Slab+One', 'Cookie', 'Lalezar', 'Patrick+Hand', 'Passion+One', 'Boogaloo', 'Paytone+One', 'Playball', 'Fugaz+One', 'Oleo+Script', 'Knewave', 'Bevan', 'Faster+One', 'Leckerli+One', 'Bungee', 'Pattaya', 'Rye', 'Federo', 'Nova+Square', 'Ranchers', 'New+Rocker']

               }
         });
      </script>
   <?php } ?> 
   <?php if(isset($social_share['social_share']) && $social_share['social_share']){ ?>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/assisfery/SocialShareJS@1.3/social-share.min.css">
      <script src="https://cdn.jsdelivr.net/gh/assisfery/SocialShareJS@1.3/social-share.min.js"></script>
   <?php } ?>
</head>

<?php $oldUrl = 'https://pushbutton-vip.com/' ?>
<?php if(isset($site_body_img) && isset($site_body_color)){ ?>
   <body style="background-image: url(<?= $oldUrl.$site_body_img; ?>); " class="<?php echo !empty($autoresponder['header_checkbox']) ? 'rcs_site_header_form_show' : ''; ?>"> 
<?php } ?>

<?php if(!empty($site_body_img)){ ?>
   <body style="background-image: url(<?= $oldUrl.$site_body_img;?>); " class="<?php echo !empty($autoresponder['header_checkbox']) ? 'rcs_site_header_form_show' : ''; ?>"> 
<?php }else{ ?>
   <body style="background-color: <?= $site_body_color;?>" class="<?php echo !empty($autoresponder['header_checkbox']) ? 'rcs_site_header_form_show' : ''; ?>"> 
<?php } ?>
   <!-- header start -->
   <div class="rcs_blog_header">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-5 col-sm-6 col-7">
               <div class="rcs_blog_logo">
                  <a href="<?php echo base_url();?>">
                     <?php if(!empty($logo)){ ?>
                        <img src="<?php echo $oldUrl.$logo;?>" alt="logo"><span><?php echo $site_name?></span>
                     <?php }else{ ?>
                        <span><?php echo $site_name?></span>
                     <?php } ?>
                  </a>
               </div>
            </div>
            <div class="col-lg-9 col-md-7 col-sm-6 col-5">
               <div class="rcs_blog_menu">
                  <ul>
                  <?php foreach($pages as $key => $page_value){ ?>
                     <li><a href="<?php echo base_url();?>site/page/<?php echo $page_value['p_id'];?>"><?php echo $page_value['page_name'];?></a></li>
                  <?php } ?>   
                  </ul>
                  <div class="rcs_menu_toggle"><span></span><span></span><span></span></div>
                  <div class="rcs_menu_overlay"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- header end -->