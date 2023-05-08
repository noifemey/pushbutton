<?php $oldUrl = 'https://pushbutton-vip.com/' ?>
        <!---------- content section start ---------->
        <div class="rcs_content_wrapper">
            <div class="rcs_step_list">
                <ul>
				<?php if($this->uri->segment(3) != ''){ ?>
					<li class="active"><a href="<?php echo base_url();?>user/create_site/<?php echo $this->uri->segment(3);?>">Create</a></li>
					<li class="active"><a href="<?php echo base_url();?>user/site_header/<?php echo $this->uri->segment(3);?>">Header</a></li>
					<li class="current_active"><a href="<?php echo base_url();?>user/site-design/<?php echo $this->uri->segment(3);?>">Design</a></li>
					<li><a href="<?php echo base_url();?>user/site-article/<?php echo $this->uri->segment(3);?>">Create Content</a></li>
					<li><a href="<?php echo base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>">Create Pages</a></li>
					<li><a href="<?php echo base_url();?>user/site-banner/<?php echo $this->uri->segment(3);?>">Banner Ads</a></li>
					<li><a href="<?php echo base_url();?>user/site-autoresponder/<?php echo $this->uri->segment(3);?>">Optin, Share and Publish</a></li>
				<?php }else{ ?>
                    <li class="active"><a href="javascript:;">Create</a></li>
                    <li class="current_active"><a href="javascript:;">Header</a></li>
                    <li class="current_active"><a href="javascript:;">Design</a></li>
                    <li><a href="javascript:;">Create Articles</a></li>
                    <li><a href="javascript:;">Create Pages</a></li> 
                    <li><a href="javascript:;">Banner Ads</a></li>
                    <li><a href="javascript:;">Optin, Share and Publish</a></li>
				<?php } ?>
                </ul>
            </div>
        <form class="rsc_design" >
                   
            <div class="rcs_create_site_box rcs_site_step2 rcs_row">
				<div class="rcs_col">
					<div class="rcs_content_box">
						<div class="rcs_white_box"> 
						
							<h2>Design</h2>
							<div class="rcs_row">
								<div class="rcs_col">
									<h4 class="rcs_above_input_heading rcs_step_heading">Upload website logo <span class="rcs_required_star hide">*</span></h4>
									<div class="rcs_featured_image_box rcs_image_box rcs_logo_image">
										<?php if(!empty($design_Data['siteLogo'])){?>
											<div class="rcs_selected_image">
												<span class="rcs_selected_remove_image"><i class="fas fa-trash-alt"></i></span>
											  <img src="<?php echo base_url($design_Data['siteLogo']['logo_image_url']);?>">
											   <input type="hidden" name="image_id" value="<?php echo $design_Data['siteLogo']['logo_image_id'];?>" class="rcs_input" >
											   <input type="hidden" name="image_url" value="<?php echo $design_Data['siteLogo']['logo_image_url'];?>" class="rcs_input" >
											</div>
											<p class="rcs_not_showing_img rcs_not_showing_image hide">No website logo image available right now</p>
											<a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteDesign" data-image="logo">Upload</a>
										<?php }else{?>
											<div class="rcs_selected_image">
												<img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
											</div>
											<p class="rcs_not_showing_img rcs_not_showing_image">No website logo image available right now please click on UPLOAD to upload new image</p>
											<a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteDesign" data-image="logo">Upload</a>
										<?php }?>
										
									</div>
									<div class="rcs_input_field hide">
										<label>Site Title</label>
										<?php if(!empty($design_Data['site_title'])){?>
											<input type="text" class="rcs_custom_input rcs_input" value="<?php echo $design_Data['site_title']['site_title'];?>"  placeholder="Enter Site title here..." name="site_title">
										<?php }else{?>
											<input type="text" class="rcs_custom_input rcs_input"  placeholder="Enter Site title here..." name="site_title">
										<?php }?>
									</div>
									<h4 class="rcs_above_input_heading rcs_step_heading">Background</h4>
									<h4 class="rcs_above_input_heading" style="display:block;">Body Background Image</h4>
									<div class="rcs_featured_image_box rcs_image_box rcs_bg_image">
										<?php if(isset($design_Data['siteBanner']['bg_image_id'])){?>
											<div class="rcs_selected_image">
												<span class="rcs_selected_remove_image "><i class="fas fa-trash-alt"></i></span>
												<img src="<?php echo base_url($design_Data['siteBanner']['bg_image_url']);?>">
											   <input type="hidden" name="image_id" value="<?php echo $design_Data['siteBanner']['bg_image_id'];?>" class="rcs_input" >
											   <input type="hidden" name="image_url" value="<?php echo $design_Data['siteBanner']['bg_image_url'];?>" class="rcs_input" >
											</div>
											<p class="rcs_not_showing_img rcs_not_showing_image hide">No body background image available right now please click on UPLOAD to upload new image</p>
											<a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteDesign" data-image="body_bg_image">Upload</a>
										<?php }else{?>    
											<div class="rcs_selected_image">
												<img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
											</div>
											<p class="rcs_not_showing_img rcs_not_showing_image">No body background image available right now please click on UPLOAD to upload new image</p>
											<a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteDesign" data-image="body_bg_image" >Upload</a>
										<?php }?>    
									</div>
									<div class="rcs_color_picker_main body_bg_color">
										<h4 class="rcs_above_input_heading">Body Background Color </h4>
										<div class="rcs_color_picker_box">
											<div class="color-picker">
												<?php if(isset($design_Data)){?>
													<input type="text" name="sitebannerColor" value="<?php echo $design_Data['siteBanner']['sitebannerColor'];?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="body_bg_color">
													<span style="background-color : <?php echo $design_Data['siteBanner']['sitebannerColor'];?> "></span>
												<?php }else{?>  
													<input type="text" name="sitebannerColor" value="#f1f6f9" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="body_bg_color">
													<span style="background-color : #f1f6f9"></span>
												<?php }?>  
											</div>
										</div>
									</div>
									<h4 class="rcs_above_input_heading rcs_step_heading" style="display:block;">Read More Button Setting</h4>
									<div class="rcs_row">
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Button Text <span class="rcs_required_star">*</span></label>
												<?php if(isset($design_Data['readmoreButton']['button_text'])){?>
													<input type="text" placeholder="Enter Button text..." value="<?php echo $design_Data['readmoreButton']['button_text']; ?>" class="rcs_custom_input rcs_prev_input_text rcs_input" data-req="1" data-msg="Read More Button Text is required." name="button_text" data-action="siteDesign" data-text="readmoreButton">
												<?php }else{?>
													<input type="text" placeholder="Enter Button text..." data-req="1" data-msg="Read More Button Text is required." class="rcs_custom_input rcs_prev_input_text rcs_input" name="button_text" data-action="siteDesign" data-text="readmoreButton">
												<?php } ?>
											</div>
										</div>					
										<div class="rcs_full_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Button Text Color</h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php if(isset($design_Data['readmoreButton']['buttonfontColor'])){?>
														<input type="text" name="buttonfontColor" value="<?php echo $design_Data['readmoreButton']['buttonfontColor']; ?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="readmoreButton" />
														<span style="background-color : <?php echo $design_Data['readmoreButton']['buttonfontColor'];?>"></span>
													<?php }else{?>
														<input type="text" name="buttonfontColor" value="#ffffff" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="readmoreButton" />
														<span style="background-color : #ffffff"></span>
													<?php }?>
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="rcs_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Button Background Color </h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php //if(isset($design_Data['readmoreButton']['buttonBgColor'])){?>
														<input type="text" name="buttonBgColor" value="<?php //echo $design_Data['readmoreButton']['buttonBgColor']; ?>" class="rcs_color_input rcs_input" />
														<span style="background-color : <?php //echo $design_Data['readmoreButton']['buttonBgColor'];?>"></span>
													<?php //}else{?>
														<input type="text" name="buttonBgColor" value="#4169e1" class="rcs_color_input rcs_input" />
														<span style="background-color : #4169e1"></span>
													<?php //}?> 
													</div>
												</div>
											</div>
										</div> -->
																		
									</div>
									<h4 class="rcs_above_input_heading rcs_step_heading">Footer</h4>
									<h4 class="rcs_above_input_heading" style="display:block;">Footer Background Image</h4>
									<div class="rcs_featured_image_box rcs_image_box rcs_footer_bg_image">
										<?php if(!empty($design_Data['footer']['footer_image_url'])){?>
											<div class="rcs_selected_image">
												<span class="rcs_selected_remove_image "><i class="fas fa-trash-alt"></i></span>
												<img src="<?php echo base_url($design_Data['footer']['footer_image_url']);?>">
											   <input type="hidden" name="image_id" value="<?php echo $design_Data['footer']['footer_image_id'];?>" class="rcs_input" >
											   <input type="hidden" name="image_url" value="<?php echo $design_Data['footer']['footer_image_url'];?>" class="rcs_input" >
											</div>
											<p class="rcs_not_showing_img rcs_not_showing_image hide">No footer background image available right now please click on UPLOAD to upload new image</p>
											<a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteDesign" data-image="footer_image_url">Upload</a>
										<?php }else{?>    
											<div class="rcs_selected_image">
												<img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
											</div>
											<p class="rcs_not_showing_img rcs_not_showing_image ">No footer background image available right now please click on UPLOAD to upload new image</p>
											<a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteDesign" data-image="footer_image_url">Upload</a>
										<?php }?>    
									</div>
									<div class="rcs_color_picker_main">
										<h4 class="rcs_above_input_heading">Footer Background Color</h4>
										<div class="rcs_color_picker_box">
											<div class="color-picker">
												<?php if(isset($design_Data['footer']['footerBgColor'])){?>
													<input type="text" name="footerBgColor" value="<?php echo $design_Data['footer']['footerBgColor'];?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="footerBgColor" />
													<span style="background-color : <?php echo $design_Data['footer']['footerBgColor'];?>"></span>
												<?php }else{?>  
													<input type="text" name="footerBgColor" value="#4169e1" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="footerBgColor" />
													<span  style="background-color : #4169e1"></span>
												<?php }?>
											</div>
										</div>
									</div>
								</div>
								<div class="rcs_col rcs_text_formating">
									<h4 class="rcs_above_input_heading rcs_step_heading">Fonts</h4>
									<h4 class="rcs_above_input_heading" style="display:block;">Font For Header</h4>
									<div class="rcs_row">
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Select Font Weight</label>
												<select name="headerfontWeight" id="headerfontWeight" class="rcs_custom_input rcs_input rcs_prev_font_weight" data-req="1" data-msg="" data-action="siteDesign" data-weight="header_font" >
													<?php if(isset($design_Data)){?>
														<option value="300" <?php echo ($design_Data['headerFont']['headerfontWeight'] == 'light')? 'selected' : ''; ?> >Light 300</option>
														<option value="400" <?php echo ($design_Data['headerFont']['headerfontWeight'] == 'regular')? 'selected' : ''; ?> >Regular 400</option>
														<option value="500" <?php echo ($design_Data['headerFont']['headerfontWeight'] == 'medium')? 'selected' : ''; ?> >Medium 500</option>
														<option value="700" <?php echo ($design_Data['headerFont']['headerfontWeight'] == 'bold')? 'selected' : ''; ?> >Bold 700</option>
														<option value="900" <?php echo ($design_Data['headerFont']['headerfontWeight'] == 'black')? 'selected' : ''; ?> >Black 900</option>
													<?php }else{?>
														<option value="300" selected>Light 300</option>
														<option value="400">Regular 400</option>
														<option value="500">Medium 500</option>
														<option value="700">Bold 700</option>
														<option value="900">Black 900</option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Select Font Style</label>
												<select name="headerfontStyle" id="headerfontStyle" class="rcs_custom_input rcs_input rcs_prev_font_style" data-req="1" data-msg="" data-action="siteDesign" data-style="header_font"> 
													<?php if(isset($design_Data)){?>
														<option value="normal" <?php echo ($design_Data['headerFont']['headerfontStyle'] == 'normal')? 'selected' : ''; ?> >Normal</option>
														<option value="italic" <?php echo ($design_Data['headerFont']['headerfontStyle'] == 'italic')? 'selected' : ''; ?> >Italic</option>
													<?php }else{?>
														<option value="normal" selected>Normal</option>
														<option value="italic">Italic</option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Select Font Family</label>
												<select class="selectpicker rcs_custom_input rcs_input rcs_prev_font" name="headerfontFamily" id="ed_canvas_fontfamily" data-live-search="true" data-action="siteDesign" data-font="header_font">
												<?php if(isset($design_Data)){?>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Inter')? 'selected' : ''; ?> data-content="<div style='font-family: Inter;'>Inter</div>" value="Inter">Inter</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Abril Fatface')? 'selected' : ''; ?> data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Anton')? 'selected' : ''; ?> data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Dancing Script')? 'selected' : ''; ?> data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Droid Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Droid Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Gloria Hallelujah')? 'selected' : ''; ?> data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Indie Flower')? 'selected' : ''; ?> data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Lato')? 'selected' : ''; ?> data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Lobster')? 'selected' : ''; ?> data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Lora')? 'selected' : ''; ?> data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Montserrat')? 'selected' : ''; ?> data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Open Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Oswald')? 'selected' : ''; ?> data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'PT Sans')? 'selected' : ''; ?> data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'PT Serif')? 'selected' : ''; ?> data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Pacifico')? 'selected' : ''; ?> data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Playfair Display')? 'selected' : ''; ?> data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Raleway')? 'selected' : ''; ?> data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Roboto')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Roboto Condensed')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Roboto Slab')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Rubik')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Slabo 27px')? 'selected' : ''; ?> data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Source Sans Pro')? 'selected' : ''; ?> data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Ubuntu')? 'selected' : ''; ?> data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Monoton')? 'selected' : ''; ?> data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Bungee Inline')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Black Ops One')? 'selected' : ''; ?> data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Finger Paint')? 'selected' : ''; ?> data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Bungee Shade')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Ribeye Marrow')? 'selected' : ''; ?> data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Suez One')? 'selected' : ''; ?> data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Josefin Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Acme')? 'selected' : ''; ?> data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Varela Round')? 'selected' : ''; ?> data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Archivo Black')? 'selected' : ''; ?> data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Berkshire Swash')? 'selected' : ''; ?> data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Righteous')? 'selected' : ''; ?> data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Concert One')? 'selected' : ''; ?> data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Fredoka One')? 'selected' : ''; ?> data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Limelight')? 'selected' : ''; ?> data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Cabin Sketch')? 'selected' : ''; ?> data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Electrolize')? 'selected' : ''; ?> data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Niconne')? 'selected' : ''; ?> data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Aclonica')? 'selected' : ''; ?> data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Reem Kufi')? 'selected' : ''; ?> data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Love Ya Like A Sister')? 'selected' : ''; ?> data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Vast Shadow')? 'selected' : ''; ?> data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Ravi Prakash')? 'selected' : ''; ?> data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Germania One')? 'selected' : ''; ?> data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Nosifer')? 'selected' : ''; ?> data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Pirata One')? 'selected' : ''; ?> data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Rubik Mono One')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Butcherman')? 'selected' : ''; ?> data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Great Vibes')? 'selected' : ''; ?> data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Quicksand')? 'selected' : ''; ?> data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Bree Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Francois One')? 'selected' : ''; ?> data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Kaushan Script')? 'selected' : ''; ?> data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Patua One')? 'selected' : ''; ?> data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Permanent Marker')? 'selected' : ''; ?> data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Alfa Slab One')? 'selected' : ''; ?> data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Cookie')? 'selected' : ''; ?> data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Lalezar')? 'selected' : ''; ?> data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Patrick Hand')? 'selected' : ''; ?> data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Passion One')? 'selected' : ''; ?> data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Boogaloo')? 'selected' : ''; ?> data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Paytone One')? 'selected' : ''; ?> data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Playball')? 'selected' : ''; ?> data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Fugaz One')? 'selected' : ''; ?> data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Oleo Script')? 'selected' : ''; ?> data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Knewave')? 'selected' : ''; ?> data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Bevan')? 'selected' : ''; ?> data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Faster One')? 'selected' : ''; ?> data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Leckerli One')? 'selected' : ''; ?> data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Bungee')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Pattaya')? 'selected' : ''; ?> data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Rye')? 'selected' : ''; ?> data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Federo')? 'selected' : ''; ?> data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Nova Square')? 'selected' : ''; ?> data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'Ranchers')? 'selected' : ''; ?> data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
													<option <?php echo ($design_Data['headerFont']['headerfontFamily'] == 'New Rocker')? 'selected' : ''; ?> data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>	
												<?php }else{?>

													<option data-content="<div style='font-family: Inter;'>Inter</div>" value="Inter">Inter</option>
													<option data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
													<option data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
													<option data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
													<option data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
													<option data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
													<option data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
													<option data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
													<option data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
													<option data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
													<option data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
													<option data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
													<option data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
													<option data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
													<option data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
													<option data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
													<option data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
													<option data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
													<option data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
													<option data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
													<option data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
													<option data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
													<option data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
													<option data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
													<option data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
													<option data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
													<option data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
													<option data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
													<option data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
													<option data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
													<option data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
													<option data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
													<option data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
													<option data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
													<option data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
													<option data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
													<option data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
													<option data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
													<option data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
													<option data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
													<option data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
													<option data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
													<option data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
													<option data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
													<option data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
													<option data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
													<option data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
													<option data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
													<option data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
													<option data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
													<option data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
													<option data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
													<option data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
													<option data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
													<option data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
													<option data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
													<option data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
													<option data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
													<option data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
													<option data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
													<option data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
													<option data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
													<option data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
													<option data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
													<option data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
													<option data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
													<option data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
													<option data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
													<option data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
													<option data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
													<option data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
													<option data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
													<option data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
													<option data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
													<option data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
													<option data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
													<option data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
													<option data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
													<option data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
													<option data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
													<option data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
													<option data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
													<option data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>
												<?php }?>
												</select>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Font Color </h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php if(isset($design_Data)){?>
														<input type="text" name="headerfontColor" value="<?php echo $design_Data['headerFont']['headerfontColor'];?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="header_font" />
														<span style="background-color : <?php echo $design_Data['headerFont']['headerfontColor'];?>"></span>
													<?php }else{?>  
														<input type="text" name="headerfontColor" value="#717091" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="header_font" />
														<span style="background-color : #717091"></span>
													<?php }?> 
														<!-- <span></span> -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<h4 class="rcs_above_input_heading">Font for Normal Text</h4>
									<div class="rcs_row">
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Select Font Weight</label>
												<select name="normalfontWeight" id="normalfontWeight" class="rcs_custom_input rcs_input rcs_prev_font_weight" data-req="1" data-msg="" data-action="siteDesign" data-weight="normal_header_font" >
												<?php if(isset($design_Data)){?>
														<option value="300" <?php echo ($design_Data['normalFont']['normalfontWeight'] == 'light')? 'selected' : ''; ?> >Light 300</option>
														<option value="400" <?php echo ($design_Data['normalFont']['normalfontWeight'] == 'regular')? 'selected' : ''; ?> >Regular 400</option>
														<option value="500" <?php echo ($design_Data['normalFont']['normalfontWeight'] == 'medium')? 'selected' : ''; ?> >Medium 500</option>
														<option value="700" <?php echo ($design_Data['normalFont']['normalfontWeight'] == 'bold')? 'selected' : ''; ?> >Bold 700</option>
														<option value="900" <?php echo ($design_Data['normalFont']['normalfontWeight'] == 'black')? 'selected' : ''; ?> >Black 900</option>
													<?php }else{?>
														<option value="300" selected>Light 300</option>
														<option value="400">Regular 400</option>
														<option value="500">Medium 500</option>
														<option value="700">Bold 700</option>
														<option value="900">Black 900</option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Select Font Style</label>
												<select name="normalfontStyle" id="normalfontStyle" class="rcs_custom_input rcs_input" data-req="1" data-msg="" data-action="siteDesign" data-style="normal_header_font">
													<?php if(isset($design_Data)){?>
														<option value="normal" <?php echo ($design_Data['normalFont']['normalfontStyle'] == 'normal')? 'selected' : ''; ?> >Normal</option>
														<option value="italic" <?php echo ($design_Data['normalFont']['normalfontStyle'] == 'italic')? 'selected' : ''; ?> >Italic</option>
													<?php }else{?>
														<option value="normal" selected>Normal</option>
														<option value="italic">Italic</option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Select Font Family</label>
												<select class="selectpicker rcs_custom_input rcs_input rcs_prev_font" name="normalfontFamily" id="ed_canvas_fontfamily2" data-live-search="true" data-action="siteDesign" data-font="normal_header_font">
												<?php if(isset($design_Data)){?>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Inter')? 'selected' : ''; ?> data-content="<div style='font-family: Inter;'>Inter</div>" value="Inter">Inter</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Abril Fatface')? 'selected' : ''; ?> data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Anton')? 'selected' : ''; ?> data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Dancing Script')? 'selected' : ''; ?> data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Droid Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Droid Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Gloria Hallelujah')? 'selected' : ''; ?> data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Indie Flower')? 'selected' : ''; ?> data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Lato')? 'selected' : ''; ?> data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Lobster')? 'selected' : ''; ?> data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Lora')? 'selected' : ''; ?> data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Montserrat')? 'selected' : ''; ?> data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Open Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Oswald')? 'selected' : ''; ?> data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'PT Sans')? 'selected' : ''; ?> data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'PT Serif')? 'selected' : ''; ?> data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Pacifico')? 'selected' : ''; ?> data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Playfair Display')? 'selected' : ''; ?> data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Raleway')? 'selected' : ''; ?> data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Roboto')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Roboto Condensed')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Roboto Slab')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Rubik')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Slabo 27px')? 'selected' : ''; ?> data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Source Sans Pro')? 'selected' : ''; ?> data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Ubuntu')? 'selected' : ''; ?> data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Monoton')? 'selected' : ''; ?> data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Bungee Inline')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Black Ops One')? 'selected' : ''; ?> data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Finger Paint')? 'selected' : ''; ?> data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Bungee Shade')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Ribeye Marrow')? 'selected' : ''; ?> data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Suez One')? 'selected' : ''; ?> data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Josefin Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Acme')? 'selected' : ''; ?> data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Varela Round')? 'selected' : ''; ?> data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Archivo Black')? 'selected' : ''; ?> data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Berkshire Swash')? 'selected' : ''; ?> data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Righteous')? 'selected' : ''; ?> data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Concert One')? 'selected' : ''; ?> data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Fredoka One')? 'selected' : ''; ?> data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Limelight')? 'selected' : ''; ?> data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Cabin Sketch')? 'selected' : ''; ?> data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Electrolize')? 'selected' : ''; ?> data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Niconne')? 'selected' : ''; ?> data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Aclonica')? 'selected' : ''; ?> data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Reem Kufi')? 'selected' : ''; ?> data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Love Ya Like A Sister')? 'selected' : ''; ?> data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Vast Shadow')? 'selected' : ''; ?> data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Ravi Prakash')? 'selected' : ''; ?> data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Germania One')? 'selected' : ''; ?> data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Nosifer')? 'selected' : ''; ?> data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Pirata One')? 'selected' : ''; ?> data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Rubik Mono One')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Butcherman')? 'selected' : ''; ?> data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Great Vibes')? 'selected' : ''; ?> data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Quicksand')? 'selected' : ''; ?> data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Bree Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Francois One')? 'selected' : ''; ?> data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Kaushan Script')? 'selected' : ''; ?> data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Patua One')? 'selected' : ''; ?> data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Permanent Marker')? 'selected' : ''; ?> data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Alfa Slab One')? 'selected' : ''; ?> data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Cookie')? 'selected' : ''; ?> data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Lalezar')? 'selected' : ''; ?> data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Patrick Hand')? 'selected' : ''; ?> data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Passion One')? 'selected' : ''; ?> data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Boogaloo')? 'selected' : ''; ?> data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Paytone One')? 'selected' : ''; ?> data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Playball')? 'selected' : ''; ?> data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Fugaz One')? 'selected' : ''; ?> data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Oleo Script')? 'selected' : ''; ?> data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Knewave')? 'selected' : ''; ?> data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Bevan')? 'selected' : ''; ?> data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Faster One')? 'selected' : ''; ?> data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Leckerli One')? 'selected' : ''; ?> data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Bungee')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Pattaya')? 'selected' : ''; ?> data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Rye')? 'selected' : ''; ?> data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Federo')? 'selected' : ''; ?> data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Nova Square')? 'selected' : ''; ?> data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'Ranchers')? 'selected' : ''; ?> data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
													<option <?php echo ($design_Data['normalFont']['normalfontFamily'] == 'New Rocker')? 'selected' : ''; ?> data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>	
												<?php }else{?>

													<option data-content="<div style='font-family: Inter;'>Inter</div>" value="Inter">Inter</option>
													<option data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
													<option data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
													<option data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
													<option data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
													<option data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
													<option data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
													<option data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
													<option data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
													<option data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
													<option data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
													<option data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
													<option data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
													<option data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
													<option data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
													<option data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
													<option data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
													<option data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
													<option data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
													<option data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
													<option data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
													<option data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
													<option data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
													<option data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
													<option data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
													<option data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
													<option data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
													<option data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
													<option data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
													<option data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
													<option data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
													<option data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
													<option data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
													<option data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
													<option data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
													<option data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
													<option data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
													<option data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
													<option data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
													<option data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
													<option data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
													<option data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
													<option data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
													<option data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
													<option data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
													<option data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
													<option data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
													<option data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
													<option data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
													<option data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
													<option data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
													<option data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
													<option data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
													<option data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
													<option data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
													<option data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
													<option data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
													<option data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
													<option data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
													<option data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
													<option data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
													<option data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
													<option data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
													<option data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
													<option data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
													<option data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
													<option data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
													<option data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
													<option data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
													<option data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
													<option data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
													<option data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
													<option data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
													<option data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
													<option data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
													<option data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
													<option data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
													<option data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
													<option data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
													<option data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
													<option data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
													<option data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
													<option data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
													<option data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>
												<?php }?>
												</select>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Font Color</h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php if(isset($design_Data)){?>
														<input type="text" name="normalfontColor" value="<?= $design_Data['normalFont']['normalfontColor'] ?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="normal_header_font" />
														<span style="background-color : <?php echo $design_Data['normalFont']['normalfontColor'];?>"></span>
													<?php }else{?>
														<input type="text" name="normalfontColor" value="#a1a3ce" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="normal_header_font" />
														<span style="background-color : #a1a3ce"></span>
													<?php }?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<h4 class="rcs_above_input_heading" style="display:block;">Footer Setting</h4>
									<div class="rcs_row">
										<div class="rcs_full_col">
											<div class="rcs_input_field">
												<label>Copyright Text <span class="rcs_required_star">*</span></label>
												<?php if(isset($design_Data['footer']['copyright_text'])){?>
													<input type="text" placeholder="Enter Copyright text..." value="<?php echo $design_Data['footer']['copyright_text']; ?>" class="rcs_custom_input rcs_input rcs_prev_input_text" data-req="1" data-msg="Copyright text is required." name="copyright_text"  data-action="siteDesign" data-text="copy_right">
												<?php }else{?>
													<input type="text" placeholder="Enter Copyright text..." class="rcs_custom_input rcs_input rcs_prev_input_text" data-req="1" data-msg="Copyright text is required." name="copyright_text"  data-action="siteDesign" data-text="copy_right">
												<?php } ?>
											</div>
										</div>	
										<div class="rcs_full_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Footer Text Color </h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php if(isset($design_Data['footer']['footerfontColor'])){?>
														<input type="text" name="footerfontColor" value="<?php echo $design_Data['footer']['footerfontColor']; ?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="copy_right"/>
														<span style="background-color : <?php echo $design_Data['footer']['footerfontColor'];?>"></span>
													<?php }else{?>
														<input type="text" name="footerfontColor" value="#ffffff" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="copy_right"/>
														<span style="background-color : #ffffff"></span>
													<?php }?>
													</div>
												</div>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Social Link Text Color </h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php if(isset($design_Data['footer']['sociallinkfontColor'])){?>
														<input type="text" name="sociallinkfontColor" value="<?= $design_Data['footer']['sociallinkfontColor']; ?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="social_link_font_Color" />
														<span style="background-color : <?php echo $design_Data['footer']['sociallinkfontColor'];?>"></span>
													<?php }else{?>
														<input type="text" name="sociallinkfontColor" value="#ffffff" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="social_link_font_Color"/>
														<span style="background-color : #ffffff"></span>
													<?php }?>
													</div>
												</div>
											</div>
										</div>
										<div class="rcs_full_col">
											<div class="rcs_color_picker_main">
												<h4 class="rcs_above_input_heading">Social Link Background Color </h4>
												<div class="rcs_color_picker_box">
													<div class="color-picker">
													<?php if(isset($design_Data['footer']['sociallinkBgColor'])){?>
														<input type="text" name="sociallinkBgColor" value="<?= $design_Data['footer']['sociallinkBgColor']; ?>" class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="social_link_Bg_Color"/>
														<span style="background-color : <?php echo $design_Data['footer']['sociallinkBgColor'];?>"></span>
													<?php }else{?>
														<input type="text" name="sociallinkBgColor" value="#4169e1"  class="rcs_color_input rcs_input" data-action="siteDesign" data-colorp="social_link_Bg_Color"/>
														<span style="background-color : #4169e1"></span>
													<?php }?>
													</div>
												</div>
											</div>
										</div>									
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
				
				<div class="rcs_col">
					<div class="rcs_content_box rcs_preview_box"> 
					   <!-- header start -->
					   <div class="rcs_blog_header">
						  <div class="container">
							 <div class="row">
								<div class="col-lg-3 col-md-5 col-sm-6 col-3">
								   <div class="rcs_blog_logo">
									  <a href="#" class="rcs_prev_logo">
										<span>Health and fitness</span>
									  </a>
								   </div>
								</div>
								<div class="col-lg-9 col-md-7 col-sm-6 col-9">
								   <div class="rcs_blog_menu">
										  <ul>
											<li><a href="https://health-and-fitness.pushbutton-vip.com/site/page/80">About Us</a></li>
											 
										  </ul>
									  <div class="rcs_menu_toggle"><span></span><span></span><span></span></div>
									  <div class="rcs_menu_overlay"></div>
								   </div>
								</div>
							 </div>
						  </div>
					   </div>
					   <div class="rcs_blog_banner rcs_prev_site_header_section" style="background:url('https://pushbutton-vip.com/uploads/user_70/images/d9647e14.jpg');">
							<div class="rcs_banner_content">
								<h5 style="color : #717091;font-family: 'Abril Fatface' " class="rcs_prev_site_header_section_subheading">We care for your health and fitness</h5>
								<h2 style="color : #717091; font-family: 'Abril Fatface' " class="rcs_prev_site_header_section_heading">We Provide Best Health & Fitness Tips</h2>
								<div class="rcs_post_option_form">
								<div class="rcs_post_option_data">
										<img src="https://pushbutton-vip.com/uploads/user_70/images/2983cfcd.png" alt="">
										<h3>Get more stuff like this</h3>
										<p>Join our mailing list for latest updates</p>
										
											<input type="text" placeholder="Enter Name..." class="rcs_custom_input rcs_name" data-req="1" data-msg="Name is required." name="name">
											<input type="text" placeholder="Enter Email..." class="rcs_custom_input" data-req="1" data-msg="Email is required." name="email">
											<input type="hidden" value="header" name="form">
											<button type="submit" class="rcs_btn" style="color: #ffffff; background: #2d5cef">Subscribe Now</button>
										
								</div>
								</div>
							</div>
					</div>
					   <!-- top banner start-->
					   <div class="rcs_top_ad_wrapper">
						  <div class="container">
							 <div class="rcs_top_ad_box">
								<a href="https://www.google.com/" target="_blank"><img src="https://pushbutton-vip.com/uploads/user_70/images/e805d8e2.jpg" alt=""></a>
							 </div>
						  </div>
					   </div>
					   <!-- top banner start-->
						   <!-- blog section start-->
						<div class="rcs_blog_wrapper rcs_gridblog">
							<div class="container">
								<div class="row">
									<div class="col-lg-8">
									    <div class="rcs_blog_main">
										  <div class="row">
												<div class="col-lg-12 col-md-12">
													<div class="rcs_blog_box">
														<div class="rcs_blog_img">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311"><img src="https://pushbutton-vip.com/uploads/user_70/images/0ce57d03.png" alt=""></a>
														</div>
												   
														<div class="rcs_blog_content">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_post_title rcs_header_text">Lorem Ipsum is simply dummy text of the printing</a>

															<div class="rcs_blog_des rcs_prev_descriptions">
																<p class="rcs_normal_header_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
																<p class="rcs_normal_header_text">written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
															</div> 
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_read_more">Read More<i class="fas fa-caret-right"></i></a>
														</div>
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="rcs_blog_box">
														<div class="rcs_blog_img">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311"><img src="https://pushbutton-vip.com/uploads/user_70/images/cad25a4d.png" alt=""></a>
														</div>
												   
														<div class="rcs_blog_content">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_post_title rcs_header_text">Lorem Ipsum is simply dummy text of the printing</a>

															<div class="rcs_blog_des rcs_prev_descriptions">
																<p class="rcs_normal_header_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
																<p class="rcs_normal_header_text">written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
															</div> 
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_read_more">Read More<i class="fas fa-caret-right"></i></a>
														</div>
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="rcs_blog_box">
														<div class="rcs_blog_img">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311"><img src="https://pushbutton-vip.com/uploads/user_70/images/bd9c3a33.png" alt=""></a>
														</div>
												   
														<div class="rcs_blog_content">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_post_title rcs_header_text">Lorem Ipsum is simply dummy text of the printing</a>

															<div class="rcs_blog_des rcs_prev_descriptions">
																<p class="rcs_normal_header_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
																<p class="rcs_normal_header_text">written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
															</div> 
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_read_more">Read More<i class="fas fa-caret-right"></i></a>
														</div>
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="rcs_blog_box">
														<div class="rcs_blog_img">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311"><img src="https://pushbutton-vip.com/uploads/user_70/images/07ef723b.png" alt=""></a>
														</div>
												   
														<div class="rcs_blog_content">
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_post_title rcs_header_text">Lorem Ipsum is simply dummy text of the printing</a>

															<div class="rcs_blog_des rcs_prev_descriptions">
																<p class="rcs_normal_header_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
																<p class="rcs_normal_header_text">written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
															</div> 
															<a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_read_more">Read More<i class="fas fa-caret-right"></i></a>
														</div>
													</div>
												</div>
											</div>
									   </div>
									</div>
									<div class="col-lg-4">
									   <div class="rcs_sidebar_box">
											<div class="rcs_post_search">
											  
												 <input type="text" class="rcs_custom_input" name="search_article" placeholder="Search your keyword here..." value="">
												 <span class="fas fa-search"></span>
											 
											</div>
											<div class="rcs_sidebar_banner">
												<a href="https://www.google.com/" target="_blank"><img src="https://pushbutton-vip.com/uploads/user_70/images/138e07c8.jpg" alt=""></a>
							 
											</div>
											<div class="rcs_post_option_form">
												 <div class="rcs_post_optin_img">
													   <img src="https://pushbutton-vip.com/uploads/user_70/images/2983cfcd.png" alt="">
												 </div>
												 <div class="rcs_post_option_data">
													<h3>Get more stuff like this</h3>
													<p>Join our mailing list for latest updates</p>
													
													   <input type="text" placeholder="Enter Name..." class="rcs_custom_input rcs_name" name="name">
													   <input type="text" placeholder="Enter Email..." class="rcs_custom_input rcs_input" name="email">
													   <input type="hidden" value="sidebar" name="form">
													   <button type="submit" class="rcs_btn">Subscribe Now</button>
													
												 </div>
											  </div>
											<!--div class="rcs_related_posts">
												<h3>Related Posts</h3>
												<ul>
												 <li><a href="https://health-and-fitness.pushbutton-vip.com/site/article/311" class="rcs_post_title">Five health habits may help keep acid reflux at bay</a></li>
												 <li><a href="https://health-and-fitness.pushbutton-vip.com/site/article/312" class="rcs_post_title">Omega 3 Benefits</a></li>
												 <li><a href="https://health-and-fitness.pushbutton-vip.com/site/article/313" class="rcs_post_title">Respect your body, its the only one you get</a></li>
												 <li><a href="https://health-and-fitness.pushbutton-vip.com/site/article/314" class="rcs_post_title">4 Amazing Health Benefits of Aloe Vera</a></li>
												 <li><a href="https://health-and-fitness.pushbutton-vip.com/site/article/315" class="rcs_post_title">Urgent Care: What Is It and When Should You Seek It?</a></li>
												 <li><a href="https://health-and-fitness.pushbutton-vip.com/site/article/323" class="rcs_post_title">Mango Peeling: A Food To Prevent Bad Cholesterol</a></li>
											  </ul>
										  </div-->
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
									<a href="https://www.google.com/" target="_blank"><img src="https://pushbutton-vip.com/uploads/user_70/images/80a093a1.jpg" alt=""></a> 
								</div>
						  </div>
					   </div>
					   <!-- top banner start-->
						  <!-- footer copyright -->
					   <div class="rcs_footer_wrapper rcs_footer_bg_color" style="background:#4169e1;">
						  <div class="rcs_footer_box">
							 <div class="rcs_post_social rcs_no_social_links">
								<h4 style="color:#ffffff">Social Links</h4>
								<ul>
									<li><a href="https://facebook.com" class="rcs_social_icon_color" style="color: #4169e1;background: #ffffff"><span class="fab fa-facebook-f"></span></a></li>
									<li><a href="https://twitter.com/" class="rcs_social_icon_color" style="color: #4169e1;background: #ffffff"><span class="fab fa-twitter"></span></a></li>
									<li><a href="https://in.pinterest.com" class="rcs_social_icon_color" style="color: #4169e1;background: #ffffff"><span class="fab fa-pinterest-p"></span></a></li>
									<li><a href="https://www.w3schools.com/php/func_misc_sleep.asp" class="rcs_social_icon_color" style="color: #4169e1;background: #ffffff"><span class="fab fa-vk"></span></a></li>
								</ul>
							 </div>
								<div class="rcs_copyright rcs_prev_footer_color">
								<div class="container">
								   <div class="row">
									  <div class="col-lg-6">	
											<p class="rcs_prev_copy_right">Copyright 2021. All rights reserved.</p>
										</div>
									  <div class="col-lg-6">
										 <ul class="page_links">
											<li><a href="https://health-and-fitness.pushbutton-vip.com/site/page/78">Privacy Policy</a></li>
											<li><a href="https://health-and-fitness.pushbutton-vip.com/site/page/79">Terms and Conditions</a></li>
										 </ul>
									  </div>
								   </div>
								</div>
							 </div>
						  </div>
					   </div>
					</div>
				</div>
				
				<div class="rcs_full_col">
					<div class="rcs_create_site_btns">
						<input type="hidden" name="s_id" class="rcs_input" value="<?php echo $this->uri->segment(3);?>">

						<a href="<?= base_url();?>user/site_header/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_yellow_btn rcs_step_prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M2.686,5.843 C2.959,5.843 3.132,5.843 3.305,5.843 C7.412,5.845 11.518,5.846 15.625,5.848 C15.763,5.848 15.901,5.849 16.038,5.847 C16.674,5.835 16.996,5.556 17.001,5.016 C17.005,4.479 16.669,4.175 16.050,4.169 C15.402,4.162 14.754,4.163 14.107,4.163 C10.483,4.164 6.858,4.166 3.234,4.167 C3.076,4.167 2.918,4.167 2.644,4.167 C3.510,3.234 4.293,2.405 5.057,1.556 C5.211,1.385 5.346,1.148 5.390,0.920 C5.456,0.574 5.303,0.280 5.002,0.109 C4.670,-0.079 4.354,-0.020 4.090,0.255 C3.565,0.801 3.052,1.361 2.536,1.917 C1.815,2.694 1.096,3.471 0.377,4.250 C-0.118,4.786 -0.124,5.211 0.363,5.737 C1.579,7.050 2.795,8.363 4.016,9.671 C4.356,10.034 4.692,10.092 5.017,9.878 C5.484,9.570 5.542,8.964 5.133,8.516 C4.446,7.767 3.748,7.028 3.057,6.283 C2.954,6.171 2.860,6.049 2.686,5.843 Z" fill="#444444"/></svg>Prev</a>
						<button type="submit" class="rcs_btn rcs_step_next">Next <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M14.314,5.843 C14.041,5.843 13.868,5.843 13.695,5.843 C9.588,5.845 5.481,5.846 1.375,5.848 C1.237,5.848 1.099,5.849 0.961,5.847 C0.326,5.835 0.004,5.557 -0.001,5.016 C-0.005,4.479 0.331,4.175 0.950,4.169 C1.598,4.162 2.245,4.163 2.893,4.163 C6.517,4.164 10.142,4.166 13.766,4.167 C13.924,4.167 14.082,4.167 14.356,4.167 C13.490,3.234 12.706,2.405 11.943,1.556 C11.789,1.385 11.654,1.148 11.610,0.920 C11.543,0.574 11.697,0.280 11.998,0.109 C12.330,-0.079 12.646,-0.020 12.910,0.255 C13.435,0.801 13.948,1.361 14.464,1.917 C15.185,2.694 15.904,3.471 16.623,4.250 C17.118,4.786 17.124,5.211 16.637,5.737 C15.421,7.050 14.205,8.363 12.983,9.671 C12.644,10.034 12.308,10.092 11.982,9.878 C11.516,9.570 11.458,8.964 11.867,8.516 C12.554,7.767 13.251,7.028 13.943,6.283 C14.046,6.171 14.140,6.049 14.314,5.843 Z" fill="#ffffff"/></svg></button>
					</div>
				</div>
            </form>
            
        </div>
        <!---------- content section end ---------->