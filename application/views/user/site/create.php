<!---------- content section start ---------->
<div class="rcs_content_wrapper">
	<div class="rcs_step_list">
		<ul>
			<?php if($this->uri->segment(3) != ''){ ?>
				<li class="current_active"><a href="<?php echo base_url();?>user/create_site/<?php echo $this->uri->segment(3);?>">Create</a></li>
				<li><a href="<?php echo base_url();?>user/site_header/<?php echo $this->uri->segment(3);?>">Header</a></li>
				<li><a href="<?php echo base_url();?>user/site-design/<?php echo $this->uri->segment(3);?>">Design</a></li>
				<li><a href="<?php echo base_url();?>user/site-article/<?php echo $this->uri->segment(3);?>">Create Content</a></li>
				<li><a href="<?php echo base_url();?>user/site_pages/<?php echo $this->uri->segment(3);?>">Create Pages</a></li>
				<li><a href="<?php echo base_url();?>user/site-banner/<?php echo $this->uri->segment(3);?>">Banner Ads</a></li>
				<li><a href="<?php echo base_url();?>user/site-autoresponder/<?php echo $this->uri->segment(3);?>">Optin, Share and Publish</a></li>
			<?php }else{ ?>
			<li class="current_active"><a href="javascript:;">Create</a></li>
			<li><a href="javascript:;">Header</a></li>
			<li><a href="javascript:;">Design</a></li>
			<li><a href="javascript:;">Create Content</a></li>
			<li><a href="javascript:;">Create Pages</a></li>
			<li><a href="javascript:;">Banner Ads</a></li>
			<li><a href="javascript:;">Optin, Share and Publish</a></li>
			<?php } ?>
		</ul>
	</div>
	<form class="rcs_create_site" >
	   <div class="rcs_create_site_box rcs_site_step1">
			<div class="rcs_content_box">
				<div class="rcs_white_box">
					<h2>Create </h2>
					<div class="rcs_row">
						<div class="rcs_col">
							<div class="rcs_input_field">
								<label>Website Name / Title <span class="rcs_required_star">*</span></label>
								<?php if(isset($site_data)){?>
									<input type="text" placeholder="Enter Website Name..." value="<?php echo $site_data[0]['site_name'];?>" class="rcs_custom_input rcs_input rcs_prev_input_text" data-req="1" data-msg="Website name is required." name="site_name" data-action="siteCreate" data-text="site_name">
									<input type="hidden" name="s_id" value="<?php echo $site_data[0]['s_id'];?>" class="rcs_custom_input rcs_input">
								<?php }else{?>
									<input type="text" placeholder="Enter Website Name..." class="rcs_custom_input rcs_input rcs_prev_input_text" data-req="1" data-msg="Website name is required." name="site_name" data-action="siteCreate" data-text="site_name">
								<?php }?>
								
							</div>
						</div>  
						<div class="rcs_col">
							<div class="rcs_input_field">
								<label>Select Your Niche <span class="rcs_required_star">*</span></label>
								<?php if(isset($site_data)){?>
									<select name="category_id" class="rcs_custom_input rcs_input" data-req="1" data-msg="Please select site niche">
										<option value="">Select Category</option>
										<?php foreach ($categories as $key => $category_value) {?>
											<option value="<?= $category_value['wc_id'];?>" <?php echo ($site_data[0]['category_id'] == $category_value['wc_id']) ? 'selected' : ''; ?>><?= $category_value['name'] ?></option>
										<?php } ?>
									</select>
								<?php }else{?>
									<select name="category_id" id="" class="rcs_custom_input rcs_input" data-req="1" data-msg="Please select site niche">
										<option value="">Select Category</option>
										<?php foreach ($categories as $key => $category_value) {?>
											<option value="<?= $category_value['wc_id'] ?>"><?= $category_value['name'] ?></option>
										<?php } ?>
									</select>
								<?php }?>
								
							</div>
						</div>
						<div class="rcs_col rcs_full_col">
							<!--<h4 class="rcs_above_input_heading">Add Domain</h4>-->
							<!--<div class="rcs_create_subdomain_box">-->
							<!--    <div class="rcs_create_subdomain_field rcs_select_input">-->
							<!--        <select name="custom_domain" id="" class="rcs_custom_input rcs_custom_input2 rcs_input" data-req="1" data-msg="Domain is required">-->
							<!--            <option value="sub-domain" selected>Create Sub Domain</option>-->
							<!--            <option value="custom_domain">Create Domain</option>-->
							<!--        </select>-->
							<!--    </div>-->
							<!--    <div class="rcs_input_field rcs_subdomain_name_field">-->
							<!--        <input type="text" placeholder="Enter word for sub-domain" class="rcs_custom_input rcs_input" data-req="1" data-msg="Domain is required." name="sub_domain" />-->
							<!--    </div>-->
							<!--</div>-->
							<div class="rcs_subdomain_setting">
								<h3 class="rcs_above_input_heading">Sub-Domain Setting <span class="rcs_required_star">*</span></h3>
								<div class="rcs_subdomain_form">
									<span>https://</span>
									<?php if(isset($site_data)){?>
										<input type="text" placeholder="Sub-Domain" data-req="1" readonly data-msg="Subdomain name is required." name="sub_domain_name" class="rcs_input rcs_custom_input" value="<?php echo $site_data[0]['sub_domain'];?>"/>
										<span>.pushbutton-vip.com</span>
									<?php }else{?>
										<input type="text" placeholder="Sub-Domain" data-req="1" data-msg="Subdomain name is required." name="sub_domain_name" class="rcs_input rcs_custom_input" value="<?php //echo $sub_domain; ?>"/>
										<span>.pushbutton-vip.com</span>
									<?php }?>
								</div>
								<div class="rcs_domain_note hide"><p>Note: These settings will decide your web URL. We have given you a sub-area on pushbutton-vip.com. You may change this effectively utilizing the Sub-Domain settings below.</p></div>
								<div class="rcs_domain_qus">
									<p> Do you want your own domain ? </p>
									<div class="rcs_custom_toggle">
										<label>
											<input type="checkbox" value="" <?php echo !empty($site_data[0]['custom_domain']) ? 'checked' : '';?>>
											<span></span>
										</label>
									</div>
								</div>
							</div>
							<div class="rcs_domain_setting collapse " id="rcs_domain_collapse" style="<?php echo !empty($site_data[0]['custom_domain']) ? 'display:block;' : '';?>">
								<h3 class="rcs_above_input_heading">Domain Setting <span class="rcs_required_star">*</span></h3>
								<div class="rcs_domain_form">
									<span>https://</span>
									<?php if(isset($site_data)){?>
										<input type="text" placeholder="Domain" data-req="" readonly name="domain_name" class="rcs_input rcs_custom_input" value="<?php echo $site_data[0]['custom_domain'];?>"/>
									<?php }else{?>
										<input type="text" placeholder="Domain" data-req="" name="domain_name" class="rcs_input rcs_custom_input" value="<?php //echo $custom_domain; ?>"/>
									<?php }?>
									
								</div>
								<div class="rcs_domain_note"><p>Note: Go to DNS settings of your domain manager, add a brand new CNAME record, set your domain or subdomain as host and point it to pushbutton-vip.com. Also add Txt record & set value "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkb21haW4iOiJqb2JzaW5pbmRvcmUubmV0IiwiZXhwIjoxNjE0ODE2MDAwfQ.K-cB_lV5aamaz4haTEm7faPFEGKmxKnKZJw_b4QMA4Y" Please allow 24-48 hours for your custom domain DNS settings to propagate..</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="rcs_blog_header">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-5 col-sm-6 col-7">
						   <div class="rcs_blog_logo">
								<a href="javascript:;">
									<span class="rec_prev_site_name">Health and fitness</span>
								</a>
						   </div>
						</div>
						<div class="col-lg-9 col-md-7 col-sm-6 col-5">
						   <div class="rcs_blog_menu">
							  <ul>
								<li><a href="javascript:;">About Us</a></li>
							  </ul>
							  <div class="rcs_menu_toggle"><span></span><span></span><span></span></div>
							  <div class="rcs_menu_overlay"></div>
						   </div>
						</div>
					</div>
				</div>
			</div>
			<div class="rcs_create_site_btns">
				<button type="submit" class="rcs_btn rcs_step_next">Next 
				<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="17" height="10" viewBox="0 0 17 10">
				<path d="M14.314,5.843 C14.041,5.843 13.868,5.843 13.695,5.843 C9.588,5.845 5.481,5.846 1.375,5.848 C1.237,5.848 1.099,5.849 0.961,5.847 C0.326,5.835 0.004,5.557 -0.001,5.016 C-0.005,4.479 0.331,4.175 0.950,4.169 C1.598,4.162 2.245,4.163 2.893,4.163 C6.517,4.164 10.142,4.166 13.766,4.167 C13.924,4.167 14.082,4.167 14.356,4.167 C13.490,3.234 12.706,2.405 11.943,1.556 C11.789,1.385 11.654,1.148 11.610,0.920 C11.543,0.574 11.697,0.280 11.998,0.109 C12.330,-0.079 12.646,-0.020 12.910,0.255 C13.435,0.801 13.948,1.361 14.464,1.917 C15.185,2.694 15.904,3.471 16.623,4.250 C17.118,4.786 17.124,5.211 16.637,5.737 C15.421,7.050 14.205,8.363 12.983,9.671 C12.644,10.034 12.308,10.092 11.982,9.878 C11.516,9.570 11.458,8.964 11.867,8.516 C12.554,7.767 13.251,7.028 13.943,6.283 C14.046,6.171 14.140,6.049 14.314,5.843 Z" fill="#ffffff"/>
				</svg>
				</button>
			</div>
		</div>
   </form> 
</div>
<!---------- content section end ---------->