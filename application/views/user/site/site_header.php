<div class="rcs_content_wrapper">
    <div class="rcs_step_list">
        <ul>
            <?php if($this->uri->segment(3) != ''){ ?>
                <li class="active"><a href="<?php echo base_url();?>user/create_site/<?php echo $this->uri->segment(3);?>">Create</a></li>
                <li class="current_active"><a href="<?php echo base_url();?>user/site_header/<?php echo $this->uri->segment(3);?>">Header</a></li>
                <li><a href="<?php echo base_url();?>user/site-design/<?php echo $this->uri->segment(3);?>">Design</a></li>
                <li><a href="<?php echo base_url();?>user/site-article/<?php echo $this->uri->segment(3);?>">Create Content</a></li>
                <li><a href="<?php echo base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>">Create Pages</a></li>
                <li><a href="<?php echo base_url();?>user/site-banner/<?php echo $this->uri->segment(3);?>">Banner Ads</a></li>
                <li><a href="<?php echo base_url();?>user/site-autoresponder/<?php echo $this->uri->segment(3);?>">Optin, Share and Publish</a></li>
            <?php }else{ ?>
                <li class="active"><a href="javascript:;">Create</a></li>
                <li class="current_active"><a href="javascript:;">Header</a></li>
                <li><a href="javascript:;">Design</a></li>
                <li><a href="javascript:;">Create Articles</a></li>
                <li><a href="javascript:;">Create Pages</a></li>
                <li><a href="javascript:;">Banner Ads</a></li>
                <li><a href="javascript:;">Optin, Share and Publish</a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="rcs_create_site_box rcs_site_step4 rcs_site_header_step rcs_row">
		<div class="rcs_col4">
        <form id="rcs_form_header">
        <div class="rcs_content_box">
            <div class="rcs_white_box"> 
                <h2>Header Design</h2>
                <div class="rcs_row">
                    <div class="rcs_col4 rcs_full_col">
                        <h4 class="rcs_above_input_heading" style="display:block;">Background</h4>
                        <div class="rcs_featured_image_box rcs_image_box rcs_bg_image">
                            <?php if(isset($siteheader['image_url'])){ ?>
                                <div class="rcs_selected_image">
                                    <span class="rcs_selected_remove_image "><i class="fas fa-trash-alt"></i></span>
                                    <img src="<?php echo base_url($siteheader['image_url']);?>">
                                    <input type="hidden" name="image_id" value="<?php echo $siteheader['image_id'];?>" class="rcs_input" >
                                    <input type="hidden" name="image_url" value="<?php echo $siteheader['image_url'];?>" class="rcs_input" >
                                </div>
                                <p class="rcs_not_showing_img rcs_not_showing_image hide">No banner background image available right now please click on UPLOAD to upload new image</p>
                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteHeader" data-image="background_image">Upload</a>
                            <?php }else{ ?>    
                                <div class="rcs_selected_image">
                                    <img src="<?= base_url()?>assets/images/error_vector.png" alt="" class="hide">
                                </div>
                                <p class="rcs_not_showing_img rcs_not_showing_image">No banner background image available right now please click on UPLOAD to upload new image</p>
                                <a href="javascript:;" class="rcs_btn rcs_popup_btn" data-main_popup="rcs_user_image_popup" data-open_popup="rcs_popup_open" data-form="image_library" data-action="siteHeader" data-image="background_image">Upload</a>
                            <?php } ?>    
                        </div>
                    </div>
                    <div class="rcs_col8 rcs_full_col rcs_text_formating">
                        <h4 class="rcs_above_input_heading rcs_step_heading">Header Text</h4>
                        <form action="">
                            <div class="rcs_row">
                                <div class="rcs_col rcs_full_col">
                                    <div class="rcs_input_field">
                                        <label>Header Headline</label>
                                        <input type="text" maxlength="80" class="rcs_input rcs_custom_input rcs_imput rcs_prev_input_text" name="heading" placeholder="Enter Banner Heading" value="<?php echo isset($siteheader['heading']) ? $siteheader['heading'] : '' ; ?>" data-req="1" data-msg="Header heading is required." data-action="siteHeader" data-text="banner_heading">
                                    </div>
                                </div>
                                <div class="rcs_col rcs_full_col">
                                    <div class="rcs_input_field">
                                        <label>Header Sub-Headline</label>
                                        <input type="text" maxlength="120" class="rcs_input rcs_custom_input rcs_imput rcs_prev_input_text" name="subheading" placeholder="Enter Banner Sub-Heading" value="<?php echo isset($siteheader['subheading']) ? $siteheader['subheading'] : '' ; ?>" data-req="1" data-msg="Header subheading is required." data-action="siteHeader" data-text="banner_sub_heading">
                                    </div> 
                                </div>
                                <div class="rcs_col rcs_full_col">
                                    <div class="rcs_color_picker_main body_bg_color">
                                        <h4 class="rcs_above_input_heading">Headline Color </h4>
                                        <div class="rcs_color_picker_box">
                                            <div class="color-picker">
                                                <?php if(isset($siteheader['textcolor'])){ ?>
                                                    <input type="text" name="textcolor" value="<?php echo $siteheader['textcolor'];?>" class="rcs_color_input rcs_input" data-action="siteHeader" data-colorp="banner_heading"/>
                                                    <span style="background : <?php echo $siteheader['textcolor'];?>"></span>
                                                <?php }else{?>  
                                                    <input type="text" name="textcolor" value="#f1f6f9" class="rcs_color_input rcs_input" data-action="siteHeader" data-colorp="banner_heading" />
                                                    <span style="background : #f1f6f9"></span>
                                                <?php }?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rcs_col rcs_full_col">
                                    <div class="rcs_color_picker_main body_bg_color">
                                        <h4 class="rcs_above_input_heading">Sub Headline Color </h4>
                                        <div class="rcs_color_picker_box">
                                            <div class="color-picker">
                                                <?php if(isset($siteheader['subtextcolor'])){ ?>
                                                    <input type="text" name="subtextcolor" value="<?php echo $siteheader['subtextcolor'];?>" class="rcs_color_input rcs_input" data-action="siteHeader" data-colorp="banner_sub_heading"/>
                                                    <span style="background : <?php echo $siteheader['subtextcolor'];?>"></span>
                                                <?php }else{?>  
                                                    <input type="text" name="subtextcolor" value="#4169e1" class="rcs_color_input rcs_input" data-action="siteHeader" data-colorp="banner_sub_heading"/>
                                                    <span style="background : #4169e1"></span>
                                                <?php }?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rcs_col rcs_full_col">
									<div class="rcs_input_field">
                                    <label>Heading text font family</label>
                                    <select name="headingtextfontfamily" id="headingtextfontfamily" class="selectpicker rcs_custom_input rcs_custom_input2 rcs_input rcs_prev_font" data-req="1" data-msg="Button text family is required" data-action="siteHeader" data-font="banner_heading">
                                    <?php if(isset($siteheader['headingtextfontfamily'])){?>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Abril Fatface')? 'selected' : ''; ?> data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Anton')? 'selected' : ''; ?> data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Dancing Script')? 'selected' : ''; ?> data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Droid Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Droid Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Gloria Hallelujah')? 'selected' : ''; ?> data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Indie Flower')? 'selected' : ''; ?> data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Lato')? 'selected' : ''; ?> data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Lobster')? 'selected' : ''; ?> data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Lora')? 'selected' : ''; ?> data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Montserrat')? 'selected' : ''; ?> data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Open Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Oswald')? 'selected' : ''; ?> data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'PT Sans')? 'selected' : ''; ?> data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'PT Serif')? 'selected' : ''; ?> data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Pacifico')? 'selected' : ''; ?> data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Playfair Display')? 'selected' : ''; ?> data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Raleway')? 'selected' : ''; ?> data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Roboto')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Roboto Condensed')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Roboto Slab')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Rubik')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Slabo 27px')? 'selected' : ''; ?> data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Source Sans Pro')? 'selected' : ''; ?> data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Ubuntu')? 'selected' : ''; ?> data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Monoton')? 'selected' : ''; ?> data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Bungee Inline')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Black Ops One')? 'selected' : ''; ?> data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Finger Paint')? 'selected' : ''; ?> data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Bungee Shade')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Ribeye Marrow')? 'selected' : ''; ?> data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Suez One')? 'selected' : ''; ?> data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Josefin Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Acme')? 'selected' : ''; ?> data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Varela Round')? 'selected' : ''; ?> data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Archivo Black')? 'selected' : ''; ?> data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Berkshire Swash')? 'selected' : ''; ?> data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Righteous')? 'selected' : ''; ?> data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Concert One')? 'selected' : ''; ?> data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Fredoka One')? 'selected' : ''; ?> data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Limelight')? 'selected' : ''; ?> data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Cabin Sketch')? 'selected' : ''; ?> data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Electrolize')? 'selected' : ''; ?> data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Niconne')? 'selected' : ''; ?> data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Aclonica')? 'selected' : ''; ?> data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Reem Kufi')? 'selected' : ''; ?> data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Love Ya Like A Sister')? 'selected' : ''; ?> data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Vast Shadow')? 'selected' : ''; ?> data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Ravi Prakash')? 'selected' : ''; ?> data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Germania One')? 'selected' : ''; ?> data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Nosifer')? 'selected' : ''; ?> data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Pirata One')? 'selected' : ''; ?> data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Rubik Mono One')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Butcherman')? 'selected' : ''; ?> data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Great Vibes')? 'selected' : ''; ?> data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Quicksand')? 'selected' : ''; ?> data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Bree Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Francois One')? 'selected' : ''; ?> data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Kaushan Script')? 'selected' : ''; ?> data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Patua One')? 'selected' : ''; ?> data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Permanent Marker')? 'selected' : ''; ?> data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Alfa Slab One')? 'selected' : ''; ?> data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Cookie')? 'selected' : ''; ?> data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Lalezar')? 'selected' : ''; ?> data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Patrick Hand')? 'selected' : ''; ?> data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Passion One')? 'selected' : ''; ?> data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Boogaloo')? 'selected' : ''; ?> data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Paytone One')? 'selected' : ''; ?> data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Playball')? 'selected' : ''; ?> data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Fugaz One')? 'selected' : ''; ?> data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Oleo Script')? 'selected' : ''; ?> data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Knewave')? 'selected' : ''; ?> data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Bevan')? 'selected' : ''; ?> data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Faster One')? 'selected' : ''; ?> data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Leckerli One')? 'selected' : ''; ?> data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Bungee')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Pattaya')? 'selected' : ''; ?> data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Rye')? 'selected' : ''; ?> data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Federo')? 'selected' : ''; ?> data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Nova Square')? 'selected' : ''; ?> data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'Ranchers')? 'selected' : ''; ?> data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
                                        <option <?php echo ($siteheader['headingtextfontfamily'] == 'New Rocker')? 'selected' : ''; ?> data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>	
                                    <?php }else{?>   
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
                                <div class="rcs_col rcs_full_col">
									<div class="rcs_input_field">
                                    <label>Sub Heading text font family</label>
                                    <select name="subtextfontfamily" id="subtextfontfamily" class="selectpicker rcs_custom_input rcs_custom_input2 rcs_input rcs_prev_font" data-req="1" data-msg="Button text family is required" data-action="siteHeader" data-font="banner_sub_heading">
                                    <?php if(isset($siteheader['subtextfontfamily'])){?>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Abril Fatface')? 'selected' : ''; ?> data-content="<div style='font-family: Abril Fatface;'>Abril Fatface</div>" value="Abril Fatface">Abril Fatface</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Anton')? 'selected' : ''; ?> data-content="<div style='font-family: Anton;'>Anton</div>" value="Anton">Anton</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Dancing Script')? 'selected' : ''; ?> data-content="<div style='font-family: Dancing Script;'>Dancing Script</div>" value="Dancing Script">Dancing Script</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Droid Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Sans;'>Droid Sans</div>" value="Droid Sans">Droid Sans</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Droid Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Droid Serif;'>Droid Serif</div>" value="Droid Serif">Droid Serif</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Gloria Hallelujah')? 'selected' : ''; ?> data-content="<div style='font-family: Gloria Hallelujah;'>Gloria Hallelujah</div>" value="Gloria Hallelujah">Gloria Hallelujah</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Indie Flower')? 'selected' : ''; ?> data-content="<div style='font-family: Indie Flower;'>Indie Flower</div>" value="Indie Flower">Indie Flower</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Lato')? 'selected' : ''; ?> data-content="<div style='font-family: Lato;'>Lato</div>" value="lato">Lato</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Lobster')? 'selected' : ''; ?> data-content="<div style='font-family: Lobster;'>Lobster</div>" value="Lobster">Lobster</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Lora')? 'selected' : ''; ?> data-content="<div style='font-family: Lora;'>Lora</div>" value="Lora">Lora</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Montserrat')? 'selected' : ''; ?> data-content="<div style='font-family: Montserrat;'>Montserrat</div>" value="Montserrat">Montserrat</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Open Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Open Sans;'>Open Sans</div>" value="Open Sans">Open Sans</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Oswald')? 'selected' : ''; ?> data-content="<div style='font-family: Oswald;'>Oswald</div>" value="Oswald">Oswald</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'PT Sans')? 'selected' : ''; ?> data-content="<div style='font-family: PT Sans;'>PT Sans</div>" value="PT Sans">PT Sans</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'PT Serif')? 'selected' : ''; ?> data-content="<div style='font-family: PT Serif;'>PT Serif</div>" value="PT Serif">PT Serif</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Pacifico')? 'selected' : ''; ?> data-content="<div style='font-family: Pacifico;'>Pacifico</div>" value="Pacifico">Pacifico</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Playfair Display')? 'selected' : ''; ?> data-content="<div style='font-family: Playfair Display;'>Playfair Display</div>" value="Playfair Display">Playfair Display</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Raleway')? 'selected' : ''; ?> data-content="<div style='font-family: Raleway;'>Raleway</div>" value="Raleway">Raleway</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Roboto')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto;'>Roboto</div>" value="Roboto">Roboto</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Roboto Condensed')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Condensed;'>Roboto Condensed</div>" value="Roboto Condensed">Roboto Condensed</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Roboto Slab')? 'selected' : ''; ?> data-content="<div style='font-family: Roboto Slab;'>Roboto Slab</div>" value="Roboto Slab">Roboto Slab</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Rubik')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik;'>Rubik</div>" value="Rubik">Rubik</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Slabo 27px')? 'selected' : ''; ?> data-content="<div style='font-family: Slabo 27px;'>Slabo 27px</div>" value="Slabo 27px">Slabo 27px</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Source Sans Pro')? 'selected' : ''; ?> data-content="<div style='font-family: Source Sans Pro;'>Source Sans Pro</div>" value="Source Sans Pro">Source Sans Pro</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Ubuntu')? 'selected' : ''; ?> data-content="<div style='font-family: Ubuntu;'>Ubuntu</div>" value="Ubuntu">Ubuntu</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Monoton')? 'selected' : ''; ?> data-content="<div style='font-family: Monoton;'>Monoton</div>" value="Monoton">Monoton</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Bungee Inline')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Inline;'>Bungee Inline</div>" value="Bungee Inline">Bungee Inline</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Black Ops One')? 'selected' : ''; ?> data-content="<div style='font-family: Black Ops One;'>Black Ops One</div>" value="Black Ops One">Black Ops One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Finger Paint')? 'selected' : ''; ?> data-content="<div style='font-family: Finger Paint;'>Finger Paint</div>" value="Finger Paint">Finger Paint</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Bungee Shade')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee Shade;'>Bungee Shade</div>" value="Bungee Shade">Bungee Shade</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Ribeye Marrow')? 'selected' : ''; ?> data-content="<div style='font-family: Ribeye Marrow;'>Ribeye Marrow</div>" value="Ribeye Marrow">Ribeye Marrow</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Suez One')? 'selected' : ''; ?> data-content="<div style='font-family: Suez One;'>Suez One</div>" value="Suez One">Suez One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Josefin Sans')? 'selected' : ''; ?> data-content="<div style='font-family: Josefin Sans;'>Josefin Sans</div>" value="Josefin Sans">Josefin Sans</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Acme')? 'selected' : ''; ?> data-content="<div style='font-family: Acme;'>Acme</div>" value="Acme">Acme</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Varela Round')? 'selected' : ''; ?> data-content="<div style='font-family: Varela Round;'>Varela Round</div>" value="Varela Round">Varela Round</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Archivo Black')? 'selected' : ''; ?> data-content="<div style='font-family: Archivo Black;'>Archivo Black</div>" value="Archivo Black">Archivo Black</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Berkshire Swash')? 'selected' : ''; ?> data-content="<div style='font-family: Berkshire Swash;'>Berkshire Swash</div>" value="Berkshire Swash">Berkshire Swash</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Righteous')? 'selected' : ''; ?> data-content="<div style='font-family: Righteous;'>Righteous</div>" value="Righteous">Righteous</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Concert One')? 'selected' : ''; ?> data-content="<div style='font-family: Concert One;'>Concert One</div>" value="Concert One">Concert One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Fredoka One')? 'selected' : ''; ?> data-content="<div style='font-family: Fredoka One;'>Fredoka One</div>" value="Fredoka One">Fredoka One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Limelight')? 'selected' : ''; ?> data-content="<div style='font-family: Limelight;'>Limelight</div>" value="Limelight">Limelight</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Cabin Sketch')? 'selected' : ''; ?> data-content="<div style='font-family: Cabin Sketch;'>Cabin Sketch</div>" value="Cabin Sketch">Cabin Sketch</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Electrolize')? 'selected' : ''; ?> data-content="<div style='font-family: Electrolize;'>Electrolize</div>" value="Electrolize">Electrolize</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Niconne')? 'selected' : ''; ?> data-content="<div style='font-family: Niconne;'>Niconne</div>" value="Niconne">Niconne</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Aclonica')? 'selected' : ''; ?> data-content="<div style='font-family: Aclonica;'>Aclonica</div>" value="Aclonica">Aclonica</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Reem Kufi')? 'selected' : ''; ?> data-content="<div style='font-family: Reem Kufi;'>Reem Kufi</div>" value="Reem Kufi">Reem Kufi</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Love Ya Like A Sister')? 'selected' : ''; ?> data-content="<div style='font-family: Love Ya Like A Sister;'>Love Ya Like A Sister</div>" value="Love Ya Like A Sister">Love Ya Like A Sister</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Vast Shadow')? 'selected' : ''; ?> data-content="<div style='font-family: Vast Shadow;'>Vast Shadow</div>" value="Vast Shadow">Vast Shadow</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Ravi Prakash')? 'selected' : ''; ?> data-content="<div style='font-family: Ravi Prakash;'>Ravi Prakash</div>" value="Ravi Prakash">Ravi Prakash</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Germania One')? 'selected' : ''; ?> data-content="<div style='font-family: Germania One;'>Germania One</div>" value="Germania One">Germania One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Nosifer')? 'selected' : ''; ?> data-content="<div style='font-family: Nosifer;'>Nosifer</div>" value="Nosifer">Nosifer</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Pirata One')? 'selected' : ''; ?> data-content="<div style='font-family: Pirata One;'>Pirata One</div>" value="Pirata One">Pirata One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Rubik Mono One')? 'selected' : ''; ?> data-content="<div style='font-family: Rubik Mono One;'>Rubik Mono One</div>" value="Rubik Mono One">Rubik Mono One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Butcherman')? 'selected' : ''; ?> data-content="<div style='font-family: Butcherman;'>Butcherman</div>" value="Butcherman">Butcherman</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Great Vibes')? 'selected' : ''; ?> data-content="<div style='font-family: Great Vibes;'>Great Vibes</div>" value="Great Vibes">Great Vibes</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Teko')? 'selected' : ''; ?> data-content="<div style='font-family: Teko;'>Teko</div>" value="Teko">Teko</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Quicksand')? 'selected' : ''; ?> data-content="<div style='font-family: Quicksand;'>Quicksand</div>" value="Quicksand">Quicksand</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Bree Serif')? 'selected' : ''; ?> data-content="<div style='font-family: Bree Serif;'>Bree Serif</div>" value="Bree Serif">Bree Serif</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Francois One')? 'selected' : ''; ?> data-content="<div style='font-family: Francois One;'>Francois One</div>" value="Francois One">Francois One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Kaushan Script')? 'selected' : ''; ?> data-content="<div style='font-family: Kaushan Script;'>Kaushan Script</div>" value="Kaushan Script">Kaushan Script</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Patua One')? 'selected' : ''; ?> data-content="<div style='font-family: Patua One;'>Patua One</div>" value="Patua One">Patua One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Permanent Marker')? 'selected' : ''; ?> data-content="<div style='font-family: Permanent Marker;'>Permanent Marker</div>" value="Permanent Marker">Permanent Marker</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Alfa Slab One')? 'selected' : ''; ?> data-content="<div style='font-family: Alfa Slab One;'>Alfa Slab One</div>" value="Alfa Slab One">Alfa Slab One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Cookie')? 'selected' : ''; ?> data-content="<div style='font-family: Cookie;'>Cookie</div>" value="Cookie">Cookie</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Lalezar')? 'selected' : ''; ?> data-content="<div style='font-family: Lalezar;'>Lalezar</div>" value="Lalezar">Lalezar</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Patrick Hand')? 'selected' : ''; ?> data-content="<div style='font-family: Patrick Hand;'>Patrick Hand</div>" value="Patrick Hand">Patrick Hand</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Passion One')? 'selected' : ''; ?> data-content="<div style='font-family: Passion One;'>Passion One</div>" value="Passion One">Passion One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Boogaloo')? 'selected' : ''; ?> data-content="<div style='font-family: Boogaloo;'>Boogaloo</div>" value="Boogaloo">Boogaloo</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Paytone One')? 'selected' : ''; ?> data-content="<div style='font-family: Paytone One;'>Paytone One</div>" value="Paytone One">Paytone One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Playball')? 'selected' : ''; ?> data-content="<div style='font-family: Playball;'>Playball</div>" value="Playball">Playball</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Fugaz One')? 'selected' : ''; ?> data-content="<div style='font-family: Fugaz One;'>Fugaz One</div>" value="Fugaz One">Fugaz One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Oleo Script')? 'selected' : ''; ?> data-content="<div style='font-family: Oleo Script;'>Oleo Script</div>" value="Oleo Script">Oleo Script</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Knewave')? 'selected' : ''; ?> data-content="<div style='font-family: Knewave;'>Knewave</div>" value="Knewave">Knewave</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Bevan')? 'selected' : ''; ?> data-content="<div style='font-family: Bevan;'>Bevan</div>" value="Bevan">Bevan</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Faster One')? 'selected' : ''; ?> data-content="<div style='font-family: Faster One;'>Faster One</div>" value="Faster One">Faster One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Leckerli One')? 'selected' : ''; ?> data-content="<div style='font-family: Leckerli One;'>Leckerli One</div>" value="Leckerli One">Leckerli One</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Bungee')? 'selected' : ''; ?> data-content="<div style='font-family: Bungee;'>Bungee</div>" value="Bungee">Bungee</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Pattaya')? 'selected' : ''; ?> data-content="<div style='font-family: Pattaya;'>Pattaya</div>" value="Pattaya">Pattaya</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Rye')? 'selected' : ''; ?> data-content="<div style='font-family: Rye;'>Rye</div>" value="Rye">Rye</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Federo')? 'selected' : ''; ?> data-content="<div style='font-family: Federo;'>Federo</div>" value="Federo">Federo</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Nova Square')? 'selected' : ''; ?> data-content="<div style='font-family: Nova Square;'>Nova Square</div>" value="Nova Square">Nova Square</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'Ranchers')? 'selected' : ''; ?> data-content="<div style='font-family: Ranchers;'>Ranchers</div>" value="Ranchers">Ranchers</option>
                                        <option <?php echo ($siteheader['subtextfontfamily'] == 'New Rocker')? 'selected' : ''; ?> data-content="<div style='font-family: New Rocker;'>New Rocker</div>" value="New Rocker">New Rocker</option>	
                                    <?php }else{?>   
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
		</div>
		<div class="rcs_col8">
			<div class="rcs_banner_preview">
				<div class="rcs_blog_banner rcs_prev_site_header_section" style="background:url('https://pushbutton-vip.com/uploads/user_70/images/d9647e14.jpg');">
					<div class="rcs_banner_content">
						<h5 style="color : #717091;font-family: 'Abril Fatface' " class="rcs_prev_site_header_section_subheading">We care for your health and fitness</h5>
						<h2 style="color : #717091; font-family: 'Abril Fatface' " class="rcs_prev_site_header_section_heading">We Provide Best Health & Fitness Tips</h2>
						<div class="rcs_post_option_form">
						   <div class="rcs_post_option_data">
								<img src="https://pushbutton-vip.com/uploads/user_70/images/2983cfcd.png" alt="">
								<h3>Get more stuff like this</h3>
								<p>Join our mailing list for latest updates</p>
								<form id="rcs_leads_form" action="ajax/leads" method="POST">
									<input type="text" placeholder="Enter Name..." class="rcs_custom_input rcs_name" data-req="1" data-msg="Name is required." name="name">
									<input type="text" placeholder="Enter Email..." class="rcs_custom_input rcs_input" data-req="1" data-msg="Email is required." name="email">
									<input type="hidden" value="header" name="form">
									<button type="submit" class="rcs_btn" style="color: #ffffff; background: #2d5cef">Subscribe Now</button>
								</form>
						   </div>
						</div> 
					</div>
			   </div> 
		   </div>
	   </div>
	   <div class="rcs_col rcs_full_col">

        <div class="rcs_create_site_btns">
            <a href="<?= base_url();?>user/create_site/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_yellow_btn rcs_step_prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M2.686,5.843 C2.959,5.843 3.132,5.843 3.305,5.843 C7.412,5.845 11.518,5.846 15.625,5.848 C15.763,5.848 15.901,5.849 16.038,5.847 C16.674,5.835 16.996,5.556 17.001,5.016 C17.005,4.479 16.669,4.175 16.050,4.169 C15.402,4.162 14.754,4.163 14.107,4.163 C10.483,4.164 6.858,4.166 3.234,4.167 C3.076,4.167 2.918,4.167 2.644,4.167 C3.510,3.234 4.293,2.405 5.057,1.556 C5.211,1.385 5.346,1.148 5.390,0.920 C5.456,0.574 5.303,0.280 5.002,0.109 C4.670,-0.079 4.354,-0.020 4.090,0.255 C3.565,0.801 3.052,1.361 2.536,1.917 C1.815,2.694 1.096,3.471 0.377,4.250 C-0.118,4.786 -0.124,5.211 0.363,5.737 C1.579,7.050 2.795,8.363 4.016,9.671 C4.356,10.034 4.692,10.092 5.017,9.878 C5.484,9.570 5.542,8.964 5.133,8.516 C4.446,7.767 3.748,7.028 3.057,6.283 C2.954,6.171 2.860,6.049 2.686,5.843 Z" fill="#444444"/></svg>Prev</a>
            <a href="<?= base_url();?>user/site_design/<?php echo $this->uri->segment(3);?>" class="rcs_btn rcs_step_next rcs_header_form">Next <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10"><path d="M14.314,5.843 C14.041,5.843 13.868,5.843 13.695,5.843 C9.588,5.845 5.481,5.846 1.375,5.848 C1.237,5.848 1.099,5.849 0.961,5.847 C0.326,5.835 0.004,5.557 -0.001,5.016 C-0.005,4.479 0.331,4.175 0.950,4.169 C1.598,4.162 2.245,4.163 2.893,4.163 C6.517,4.164 10.142,4.166 13.766,4.167 C13.924,4.167 14.082,4.167 14.356,4.167 C13.490,3.234 12.706,2.405 11.943,1.556 C11.789,1.385 11.654,1.148 11.610,0.920 C11.543,0.574 11.697,0.280 11.998,0.109 C12.330,-0.079 12.646,-0.020 12.910,0.255 C13.435,0.801 13.948,1.361 14.464,1.917 C15.185,2.694 15.904,3.471 16.623,4.250 C17.118,4.786 17.124,5.211 16.637,5.737 C15.421,7.050 14.205,8.363 12.983,9.671 C12.644,10.034 12.308,10.092 11.982,9.878 C11.516,9.570 11.458,8.964 11.867,8.516 C12.554,7.767 13.251,7.028 13.943,6.283 C14.046,6.171 14.140,6.049 14.314,5.843 Z" fill="#ffffff"/></svg></a>
        </div>
        </div>
    </div>
    
</div>
<!---------- content section end ---------->