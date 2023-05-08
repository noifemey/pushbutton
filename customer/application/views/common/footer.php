<?php //echo $designs['footer']['footer_image_url'];?>
<!-- footer copyright -->
<?php if(empty($designs['footer']['footer_image_url']) && empty($designs['footer']['footerBgColor'])){ ?>
   <div class="rcs_footer_wrapper" style="background-color:#4169e1;">
<?php }else if(!empty($designs['footer']['footer_image_url'])){ ?>
   <div class="rcs_footer_wrapper" style="background-image:url(<?php echo MAIN_URL.$designs['footer']['footer_image_url'];?>);">
<?php }else{ ?>
   <div class="rcs_footer_wrapper" style="background:<?php echo $designs['footer']['footerBgColor'];?>;">
<?php } ?>

      <div class="rcs_footer_box">
<?php if((!empty($social_links['facebook_link']) || !empty($social_links['twitter_link'])) || (!empty($social_links['pinterest_link']) || !empty($social_links['linkedin_link']))) { ?>
         <div class="rcs_post_social rcs_no_social_links">
            <h4 style="color:<?php echo $designs['footer']['footerfontColor'];?>">Social Links</h4>
            <ul>
               <?php if(!empty($social_links['facebook_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['facebook_link']))? $social_links['facebook_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>" ><span class="fab fa-facebook-f"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['twitter_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['twitter_link']))? $social_links['twitter_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-twitter"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['pinterest_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['pinterest_link']))? $social_links['pinterest_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-pinterest-p"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['linkedin_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['linkedin_link']))? $social_links['linkedin_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-linkedin-in"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['whatsapp_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['whatsapp_link']))? $social_links['whatsapp_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-whatsapp"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['reddit_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['reddit_link']))? $social_links['reddit_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-reddit"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['tumblr_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['tumblr_link']))? $social_links['tumblr_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-tumblr"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['buffer_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['buffer_link']))? $social_links['buffer_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-buffer"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['digg_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['digg_link']))? $social_links['digg_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-digg"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['flipboard_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['flipboard_link']))? $social_links['flipboard_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-flipboard"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['meneame_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['meneame_link']))? $social_links['meneame_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 97.386 97.386"><path  style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M49.481,45.874c-2.066,1.283-4.135,2.01-6.312,2.467c-3.193,0.671-6.396,0.671-9.586,0.059
			c-2.756-0.528-5.017-2.016-6.841-4.089c-3.615-4.108-6.22-8.751-6.991-14.257c-1.057-7.544,1.588-13.655,7.375-18.45
			c4.152-3.44,9.083-5.107,14.32-6.037c8.217-1.457,15.988,0.141,23.509,3.394c3.861,1.671,7.593,3.647,11.581,5.026
			c0.88,0.305,1.771,0.58,2.697,0.711c1.671,0.234,3.04-0.332,4.141-1.574c1.438-1.625,1.944-3.58,1.94-5.707
			c0.404-0.023,0.488,0.293,0.617,0.531c1.227,2.254,0.877,5.921-0.788,7.83c-1.742,2-4.059,2.356-6.521,2.071
			c-2.798-0.323-5.457-1.14-8.008-2.355c-4.793-2.285-9.655-4.394-14.863-5.573c-6.52-1.477-12.988-1.217-19.317,0.885
			c-9.215,3.061-14.059,12.217-11.55,21.614c1.447,5.423,4.497,9.694,9.261,12.714c2.061,1.307,4.333,1.717,6.73,1.686
			c2.426-0.035,4.79-0.508,7.159-0.956C48.444,45.785,48.844,45.683,49.481,45.874z"/><path  style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M59.172,92.101c-0.442-0.148-1.268,0.346-1.399-0.271c-0.129-0.603,0.733-0.801,1.234-1.011
			c3.056-1.271,6.137-2.485,9.194-3.754c1.903-0.79,3.76-1.683,5.469-2.849c0.587-0.401,1.127-0.857,1.603-1.388
			c0.756-0.843,0.938-1.732,0.497-2.839c-2.325-5.822-4.921-11.54-6.959-17.478c-1.643-4.788-2.946-9.643-3.293-14.735
			c-0.408-6.007,1.672-10.678,6.856-13.893c2.443-1.518,5.067-2.649,7.694-3.785c3.248-1.404,6.463-2.844,9.312-5.02
			c4.264-3.252,5.664-7.613,5.299-12.758c-0.164-2.316-0.551-4.591-1.08-6.848c-0.061-0.256-0.409-0.634,0.052-0.832
			c0.415-0.18,0.636,0.143,0.815,0.472c1.388,2.523,2.473,5.141,2.812,8.04c0.655,5.577-1.785,9.83-5.644,13.51
			c-2.462,2.348-5.485,3.801-8.467,5.316c-2.693,1.369-5.473,2.58-8.01,4.243c-2.766,1.812-5.058,4.019-5.819,7.388
			c-0.62,2.74-0.117,5.451,0.435,8.134c1.214,5.899,3.603,11.394,5.962,16.893c1.22,2.837,2.52,5.641,3.49,8.574
			c1.565,4.729,0.259,8.376-3.95,11.032c-3.027,1.908-6.42,2.743-9.9,3.298C63.339,91.863,61.282,91.964,59.172,92.101z"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M18.435,35.377c-0.075,0.492-0.354,0.866-0.621,1.247c-4.5,6.421-8.355,13.191-11.262,20.491
			c-2.025,5.087-2.511,10.282-1.174,15.597c1.655,6.575,6.033,10.635,12.205,13.022c4.475,1.73,9.14,2.562,13.873,3.119
			c6.577,0.778,13.18,1.297,19.771,1.937c0.634,0.061,1.261,0.236,1.88,0.403c0.298,0.08,0.683,0.202,0.642,0.605
			c-0.05,0.467-0.482,0.327-0.774,0.351c-4.267,0.347-8.54,0.54-12.821,0.604c-6.023,0.09-12.067,0.132-18.007-0.869
			c-9.651-1.626-17.131-6.43-20.761-15.91c-1.946-5.087-1.701-10.386-0.134-15.552c2.351-7.75,5.908-14.862,11.699-20.686
			c1.5-1.507,3.19-2.803,4.844-4.135C17.956,35.474,18.105,35.271,18.435,35.377z"/><path  style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M34.902,70.655c6.825-1.119,13.637-1.732,20.499-0.911c3.269,0.393,3.89,1.062,3.966,4.359 c0.123,5.218-0.606,10.335-2.086,15.341c-0.247,0.833-0.553,1.653-1.07,2.365c-0.204,0.281-0.431,0.635-0.85,0.488 c-0.37-0.129-0.32-0.521-0.336-0.834c-0.1-2.23,0.265-4.429,0.471-6.639c0.295-3.165,0.825-6.315,0.533-9.521 c-0.093-1.014-0.558-1.631-1.458-2.063c-2.661-1.275-5.516-1.69-8.401-1.974c-3.526-0.343-7.072-0.31-10.605-0.521 C35.342,70.732,35.124,70.686,34.902,70.655z"/></svg></a></li>
               <?php } ?>
               <?php if(!empty($social_links['blogger_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['blogger_link']))? $social_links['blogger_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-blogger"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['evernote_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['evernote_link']))? $social_links['evernote_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-evernote"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['instapaper_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['instapaper_link']))? $social_links['instapaper_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fas fa-italic"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['pocket_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['pocket_link']))? $social_links['pocket_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-get-pocket"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['telegram_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['telegram_link']))? $social_links['telegram_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-telegram"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['wordpress_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['wordpress_link']))? $social_links['wordpress_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-wordpress"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['stumbleupon_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['stumbleupon_link']))? $social_links['stumbleupon_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-stumbleupon"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['bibsonomy_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['bibsonomy_link']))? $social_links['bibsonomy_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fas fa-bold"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['mix_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['mix_link']))? $social_links['mix_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-mix"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['care2_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['care2_link']))? $social_links['care2_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><svg width="19" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 269.994 269.994"><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M269.8,50.743L269.8,50.743c-1.78-5.744-11.059-9.395-20.997-10.383 c-12.215-1.223-27.84,1.321-41.432,6.959c-10.324,4.283-19.889,9.614-29.721,17.347c-15.463,12.154-23.654,21.936-27.796,27.4
					c-3.347,4.413-4.059,9.449-7.13,11.768c-0.155-1.163,0.258-4.226-1.739-5.387c-0.588-0.341-1.249-0.736-1.913-1.123
					c0.748-3.086,4.615-17.909,10.821-26.413c7.539-10.349,15.965-16.273,17.062-16.954c1.333-0.841,2.749-0.906,3.678-1.487
					c0.705-0.437,1.175-2.367,0.789-2.579c-1.432-0.783-3.023,0.91-4.014,1.987c-1.045,1.142-11.975,8.63-18.662,18.378
					c-6.25,9.104-10.191,23.66-10.9,26.399c-1.17-0.627-2.244-1.112-2.847-1.112c-0.544,0-1.467,0.395-2.486,0.917
					c-0.816-3.171-4.734-17.417-10.845-26.339c-6.688-9.745-17.621-17.101-18.667-18.243c-0.979-1.077-2.575-2.77-4.003-1.987
					c-0.402,0.211,0.073,2.142,0.778,2.579c0.936,0.581,2.34,0.646,3.683,1.487c1.091,0.68,9.514,6.475,17.057,16.816
					c6.077,8.331,9.904,22.818,10.782,26.341c-0.794,0.453-1.6,0.929-2.301,1.332c-1.979,1.161-1.572,4.225-1.734,5.387
					c-2.77-1.487-5.003-7.965-9.059-13.975c-4.31-6.413-10.397-13.039-25.848-25.193c-9.851-7.732-19.408-13.064-29.727-17.347
					c-13.592-5.639-29.222-8.183-41.437-6.959c-9.951,0.989-19.24,4.64-20.998,10.383c-1.365,4.454,4.734,18.271,10.387,26.297
					c4.203,5.967,5.081,12.863,6.631,19.667c2.211,9.724,6.223,24.234,17.248,27.843c10.095,3.318,29.826-2.649,29.826-2.649
					s0.433,3.533-6.193,6.185c-6.896,2.763-10.617,7.07-14.585,14.584c-3.563,6.74-6.402,15.777-6.402,19.768
					c0,6.187,1.545,8.397,1.316,11.268c-0.268,3.554,0.996,7.071,3.436,9.721c2.737,3,1.65,5.635,2.872,8.951
					c1.102,2.996,5.411,5.416,5.411,5.416s-0.487,6.78,4.422,11.271c3.966,3.642,8.461,6.021,11.382,8.611
					c2.971,2.658,5.192,4.76,11.594,5.973c3.69,0.701,5.972,6.706,13.7,6.266c8.388-0.48,8.366-0.14,13.71-2.327
					c8.607-3.531,12.457-20.199,16.123-36.296c2.881-12.602,5.086-20.421,8.896-23.067c-1.081,7.376,0.533,19.634,0.533,19.634
					s-1.169,6.293-0.09,7.375c-0.499,3.233,0.504,7.656,1.051,7.547c0.224,2.642,1.602,7.447,3.539,7.447
					c1.935,0,3.318-4.806,3.529-7.447c0.561,0.109,1.551-4.313,1.057-7.547c1.076-1.082-0.088-7.375-0.088-7.375
					s1.489-11.51,0.498-19.797c3.402,1.734,6.049,10.629,8.921,23.23c3.676,16.097,7.521,32.765,16.138,36.296
					c5.332,2.188,5.317-0.034,13.699,0.444c7.734,0.441,10.012-6.875,13.699-7.568c6.413-1.217,8.623-3.315,11.6-5.969
					c2.934-2.596,7.404-4.973,11.389-8.617c4.891-4.492,4.41-11.274,4.41-11.274s4.332-2.429,5.428-5.415
					c1.197-3.313,0.117-5.951,2.86-8.949c2.433-2.648,3.704-6.167,3.424-9.72c-0.218-2.874,1.337-5.085,1.337-11.268
					c0-3.99-2.848-9.841-6.424-16.581c-3.972-7.514-7.678-11.821-14.577-14.584c-6.626-2.652-6.185-6.185-6.185-6.185
					s19.711,5.967,29.838,2.649c11.009-3.609,15.027-18.119,17.232-27.843c1.549-6.804,2.433-13.701,6.629-19.667
					C265.055,69.013,271.17,55.197,269.8,50.743z"/></svg></a></li>
               <?php } ?>
               <?php if(!empty($social_links['blogmarks_link'])){ ?>
                  <li class="hide"><a href="<?php echo (isset($social_links['blogmarks_link']))? $social_links['blogmarks_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-blogmarks"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['livejournal_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['livejournal_link']))? $social_links['livejournal_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><svg width="19" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 304.999 304.999"><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M160.662,19.47c-18.934,0-37.323,3.668-54.693,10.881L76.353,0.732c-0.819-0.82-2.094-0.967-3.082-0.359 C44.436,18.201,19.773,42.865,1.947,71.699c-0.61,0.986-0.462,2.262,0.358,3.082l28.39,28.383 c-8.491,18.637-12.808,38.5-12.808,59.074c0,78.719,64.049,142.762,142.775,142.762c78.721,0,142.765-64.043,142.765-142.762 C303.427,83.515,239.383,19.47,160.662,19.47z M217.225,148.664l9.943,42.082l9.543,44.395l-44.337-9.533l-42.055-9.893 L36.712,102.111c14.252-29.338,38.339-52.619,68.114-65.832L217.225,148.664z"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M221.76,187.396l-7.522-33.023c-25.891,11.889-46.404,32.402-58.283,58.295l33.023,7.52 C195.989,206.165,207.747,194.41,221.76,187.396z"/></svg></a></li>
               <?php } ?>
               <?php if(!empty($social_links['folkd_link'])){ ?>
                  <li class="hide"><a href="<?php echo (isset($social_links['folkd_link']))? $social_links['folkd_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-folkd"></span></a></li>
               <?php } ?>
               <?php if(!empty($social_links['myspace_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['myspace_link']))? $social_links['myspace_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><svg width="19" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 395.999 395.999"><circle style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" cx="56.14" cy="175.7" r="51.01"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M55.449,240.044C24.567,240.416,0,266.188,0,297.072v14.363c0,3.325,2.696,6.021,6.021,6.021H106.26 c3.325,0,6.021-2.696,6.021-6.021V296.18C112.281,264.947,86.771,239.667,55.449,240.044z"/><circle style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" cx="185.34" cy="164.05" r="55.21"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M184.592,233.681c-33.42,0.402-60.006,28.292-60.006,61.715v16.039c0,3.325,2.696,6.021,6.021,6.021 h109.467c3.325,0,6.021-2.696,6.021-6.021v-17.004C246.094,260.628,218.488,233.273,184.592,233.681z"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="M326.422,204.991c34.917,0,63.223-28.308,63.223-63.229c0-34.913-28.307-63.221-63.223-63.221 c-34.919,0-63.223,28.308-63.223,63.221C263.199,176.683,291.504,204.991,326.422,204.991z"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;"d="M326.421,221.509L326.421,221.509c-38.427,0-69.578,31.151-69.578,69.578v20.349 c0,3.325,2.696,6.021,6.021,6.021h127.114c3.325,0,6.021-2.696,6.021-6.021v-20.348C396,252.66,364.848,221.509,326.421,221.509z"/></svg></a></li>
               <?php } ?>
               <?php if(!empty($social_links['plurk_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['plurk_link']))? $social_links['plurk_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><svg enable-background="new 0 0 24 24" width="19" height="19" viewBox="0 0 24 24" width="19" ><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;" d="m12.902 2c-3.401 0-6.182 1.497-8.164 4.027.307-.195-.06-.05.779-.467.299-.111.602-.146.9-.087 1.44.286 2.19 2.584 1.675 5.134-.984 4.871-4.968 5.646-5.353 1.136v-.005c.027 1.57.161 2.936 1.032 4.684l-.026-.058c.224.465-.952.598-.643 1.55l-.002-.006c.025.067.028.087.067.162l-.003-.005.05-.039.23-.172c.276-.21.585.209.316.412l-.282.212c1.045 1.154 1.182 1.764 1.881 1.764.217 0 .417-.075.573-.201l-.002.003c.104-.045.356-.424.633-.208h-.001c1.85 1.467 4.187 2.234 6.542 2.16h-.014c2.095-.053 4.02-.733 5.603-1.858l-.03.021c.116-.084.277-.073.38.025.101.074.314.4.787.4.21 0 .403-.07.557-.189l-.002.002c-.1-.093-.314-.292-.214-.199-.234-.237.11-.591.358-.377l.225.208c1.057-1.186 1.508-1.345 1.508-1.932 0-.755-.841-.833-.597-1.257l-.001.001c1.162-2.037 1.513-4.445 1.094-6.67l.01.061c.301-.275.853-.816 1.069-1.28.231-.497.29-1.01-.323-.785-.476.175-.842.288-1.286.188-1.478-3.711-5.124-6.329-9.322-6.354h-.003zm-10.638 4.3c-.908.018-1.473.969-1.079 1.754l-.003-.006c-.659.025-1.182.561-1.182 1.217 0 .997 1.139 1.558 1.94.995l-.004.003c.177-.123.306-.286.395-.466.186.339.46.621.778.815-.005.192-.001.386.018.615l-.001-.021c.293 3.498 3.382 2.877 4.139-.876.4-1.97-.18-3.748-1.295-3.968-1.099-.218-2.033 1.1-2.438 2.142-.146-.03-.251-.139-.342-.158.722-.771.173-2.046-.903-2.046-.008 0-.016 0-.024 0zm2.862 1.232c.992 0 1.224 1.513 1.004 2.598-.482 2.391-2.451 2.863-2.688.646.609.233 1.281.167 1.7-.387.346-.461.084-1.737-.374-1.902-.356-.129-.567.027-.884.05.257-.474.707-.999 1.242-1.005z"/></svg></a></li>
               <?php } ?>
               <?php if(!empty($social_links['symbaloo_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['symbaloo_link']))? $social_links['symbaloo_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 97.668 97.668"><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;"  d="M48.834,0C21.864,0,0,21.863,0,48.834c0,26.971,21.864,48.834,48.834,48.834c26.971,0,48.834-21.863,48.834-48.834 C97.668,21.863,75.805,0,48.834,0z M48.834,93.334c-24.537,0-44.499-19.963-44.499-44.5S24.297,4.335,48.834,4.335 s44.5,19.962,44.5,44.499S73.371,93.334,48.834,93.334z"/><path style="fill: <?php echo $designs['footer']['sociallinkfontColor'];?>;"  d="M48.809,7.588c-22.78,0-41.246,18.466-41.246,41.246c0,22.779,18.466,41.246,41.246,41.246 c22.779,0,41.246-18.467,41.246-41.246C90.055,26.054,71.588,7.588,48.809,7.588z M38.767,68.427c0,0.943-0.765,1.707-1.707,1.707 h-8.957c-0.942,0-1.707-0.764-1.707-1.707v-8.958c0-0.941,0.765-1.705,1.707-1.705h8.957c0.942,0,1.707,0.764,1.707,1.705V68.427z M38.767,53.422c0,0.943-0.765,1.707-1.707,1.707h-8.957c-0.942,0-1.707-0.764-1.707-1.707v-8.958 c0-0.941,0.765-1.706,1.707-1.706h8.957c0.942,0,1.707,0.765,1.707,1.706V53.422z M38.767,38.428c0,0.943-0.765,1.706-1.707,1.706 h-8.957c-0.942,0-1.707-0.763-1.707-1.706v-8.957c0-0.942,0.765-1.707,1.707-1.707h8.957c0.942,0,1.707,0.765,1.707,1.707V38.428z M55.164,68.427c0,0.943-0.764,1.707-1.707,1.707H44.5c-0.942,0-1.707-0.764-1.707-1.707v-8.958c0-0.941,0.765-1.705,1.707-1.705 h8.957c0.943,0,1.707,0.764,1.707,1.705V68.427z M55.164,53.422c0,0.943-0.764,1.707-1.707,1.707H44.5 c-0.942,0-1.707-0.764-1.707-1.707v-8.958c0-0.941,0.765-1.706,1.707-1.706h8.957c0.943,0,1.707,0.765,1.707,1.706V53.422z M55.164,38.428c0,0.943-0.764,1.706-1.707,1.706H44.5c-0.942,0-1.707-0.763-1.707-1.706v-8.957c0-0.942,0.765-1.707,1.707-1.707 h8.957c0.943,0,1.707,0.765,1.707,1.707V38.428z M71.598,68.427c0,0.943-0.765,1.707-1.707,1.707h-8.957 c-0.941,0-1.707-0.764-1.707-1.707v-8.958c0-0.941,0.766-1.705,1.707-1.705h8.957c0.943,0,1.707,0.764,1.707,1.705V68.427 L71.598,68.427z M71.598,53.422c0,0.943-0.765,1.707-1.707,1.707h-8.957c-0.941,0-1.707-0.764-1.707-1.707v-8.958 c0-0.941,0.766-1.706,1.707-1.706h8.957c0.943,0,1.707,0.765,1.707,1.706V53.422L71.598,53.422z M71.598,38.428 c0,0.943-0.765,1.706-1.707,1.706h-8.957c-0.941,0-1.707-0.763-1.707-1.706v-8.957c0-0.942,0.766-1.707,1.707-1.707h8.957 c0.943,0,1.707,0.765,1.707,1.707V38.428L71.598,38.428z"/></svg></a></li>
               <?php } ?>
               <?php if(!empty($social_links['vk_link'])){ ?>
                  <li><a href="<?php echo (isset($social_links['vk_link']))? $social_links['vk_link'] : ''; ?>" style="color: <?php echo $designs['footer']['sociallinkfontColor'];?>;background: <?php echo $designs['footer']['sociallinkBgColor'];?>"><span class="fab fa-vk"></span></a></li>
               <?php } ?>
            </ul>
         </div>
   <?php } ?>
         <div class="rcs_copyright">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <?php if(isset($designs['footer']['copyright_text'])){?>               
                        <p style="color:<?php echo $designs['footer']['footerfontColor'];?>"><?php echo $designs['footer']['copyright_text'];?></p>
                     <?php }else{ ?>
                        <p>&copy; Copyright 2021. All rights reserved</p>
                     <?php } ?>
                  </div>
                  <div class="col-lg-6">
                     <ul class="page_links">
                        <?php foreach($footerpages as $key => $page_value){ ?>
                        <li><a href="<?php echo base_url();?>site/page/<?php echo $page_value['p_id'];?>"><?php echo $page_value['page_name'];?></a></li>
                        <?php } ?> 
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer copyright -->
<div class="rcs_notifications hide">
    <div class="rcs_notification_details"><h6 class="rcs_notification_heading rcs_notification_msg">All fields are required.</h6></div>
    <div class="rcs_notification_close"><i class="fal fa-times"></i></div>
</div>
<script>
    $default = {
        base_url : '<?php echo base_url(); ?>'
    };
    let uploadProgressCls = '.rcs_upload_progress_bar';
</script>
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url('assets/js/plugin/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/func.js?q='.time());?>"></script>
<?php if(isset($customScriptBefore)){ ?>
    <script>
        <?php for($i=0;$i<count($customScriptBefore);$i++){ echo $customScriptBefore[$i]; } ?>    
    </script>
<?php } ?>

<?php 
    if(isset($scripts)){ 
        for($i=0;$i<count($scripts);$i++){ echo "<script src=\"", base_url() ,"assets/js/", $scripts[$i] ,"\"></script>"; }
    }
?>
<script src="<?php echo base_url('assets/js/custom.js?q='.time());?>"></script>

<?php if(isset($customScriptAfter)){ ?>
    <script>
        <?php for($i=0;$i<count($customScriptAfter);$i++){ echo $customScriptAfter[$i]; } ?>    
    </script>
<?php } ?>
</body>
</html>