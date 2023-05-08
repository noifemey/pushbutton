(($) => {

	$(document).ready(function () {
		$(document).on("click", ".rcs_profile_box", function () {
			$(".rcs_profile_wrapper").toggleClass("rcs_edit_open");
		});
		
		/*------ sidebanner js start ----------
		var h = $('.rcs_blog_banner').height();
		$(".rcs_banner_preview").css({'height': h});
		/*------ sidebanner js end ----------*/
		/*------ back date not select js start ---------*/
		if ($("#datefeild").length > 0) {
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();
			if (dd < 10) {
				dd = "0" + dd;
			}
			if (mm < 10) {
				mm = "0" + mm;
			}

			today = yyyy + "-" + mm + "-" + dd;
			document.getElementById("datefeild").setAttribute("min", today);
		}
		
		/*------ back date not select js end ---------*/
		/*-------- custom toggle js start ------*/
		$('.rcs_toggle').click(function(e) {
				var dropDown = $(this).closest('.accordion li').find('.inner');
				$(this).closest('.accordion').find('.inner').not(dropDown).slideUp();
				
				if ($(this).hasClass('active')) {
				  $(this).removeClass('active');
				} else {
				  $(this).closest('.accordion').find('.rcs_toggle.active').removeClass('active');
				  $(this).addClass('active'); 
				}
				
				dropDown.stop(false, true).slideToggle();
		});
		/*-------- custom toggle js end ------*/
		/*--- popup js start -----*/
		$(document).on("click", ".rcs_popup_cross", function () {
			//$('.rcs_side_popup').removeClass('rcs_side_popup_open');
			/* let p = $(this).data("close_popup"); */
			$(this).parents(".rcs_popup_wrapper").removeClass("rcs_popup_open");
		});

		$(document).on("click", ".rcs_popup_cross", function (e) {
			e.preventDefault();
			// window.location.reload();
		});
		
		$(document).on("click", ".rcs_popup_cross_preview", function () {
			//$('.rcs_side_popup').removeClass('rcs_side_popup_open');
			/* let p = $(this).data("close_popup"); */
			$(this).parents(".rcs_preview_page_popup").removeClass("rcs_popup_open");
		});

		$(document).on("click", ".rcs_popup_cross_preview", function (e) {
			e.preventDefault();
			// window.location.reload();
		});
		// $(document).on("click", "#rcsPopUpSelectContent", function (e) {
		// 		e.preventDefault();
		//
		// 		console.log($(this).attr('id'));
		// 		let n_id = $("#preferred_network option:selected").val();
		// 		if(n_id <= 0){
		// 			error_message("Preferred Network is required.");
		// 			return false;
		// 		}
		// 		let prefNetCat = $("#preferred_network_category option:selected").val();
		// 		let prefNetSubCat = $("#preferrednetworkPcategory option:selected").val();
		// 		let productName = $('.rcs_selected_product span').html();
		// 		// console.log(productName);
		// 		if(prefNetCat <= 0){
		// 			error_message("Category is required.");
		// 			return false;
		// 		}else if (prefNetSubCat <= 0){
		// 			error_message("Sub Category is required.");
		// 			return false;
		// 		}else{
		// 			if(productName == "No Product Selected"){
		// 				error_message("Product is required.");
		// 				return false;
		// 			}
		// 		}
		// 	}
		// );
		$(document).on("click", ".rcs_popup_btn", function (e) {
			e.preventDefault();

			if($(this).attr('id') == "rcsPopUpSelectContent"){
				let n_id = $("#preferred_network option:selected").val();
				let prefNetCat = $("#preferred_network_category option:selected").val();
				let prefNetSubCat = $("#preferrednetworkPcategory option:selected").val();
				let productName = $('.rcs_selected_product span').html();
				if(n_id <= 0){
					if(prefNetCat <= 0 && prefNetSubCat <= 0 && productName == "No Product Selected"){
						$(".rcs_select_article_popup").hide();
						error_message("Please fill required fields.");
						return false;
					}
					// error_message("Preferred Network is required.");
					// return false;
				}
				if(n_id != 2){
					if(prefNetCat <= 0 && prefNetSubCat <= 0 && productName == "No Product Selected"){
						error_message("Please fill required fields.");
						$(".rcs_select_article_popup").hide();
						return false;
					}
					else if(prefNetCat <= 0){
						error_message("Category is required.");
						$(".rcs_select_article_popup").hide();
						return false;
					}else if (prefNetSubCat <= 0){
						error_message("Sub Category is required.");
						$(".rcs_select_article_popup").hide();
						return false;
					}else{
						if(productName == "No Product Selected"){
							error_message("Product is required.");
							$(".rcs_select_article_popup").hide();
							return false;
						}
					}
				}
			}else{
				let o = "." + $(this).data("main_popup");
				let p = $(this).data("open_popup");
				$(o).addClass(p);
				let f = $(this).data("form");
				if (f == "aadd_user") {
					$(o).find('input[name="password"]').data("req", 1);
					$(o).find('[name="admin_user_id"]').val("");
					$(o).find(".rcs_popup_heading").text("Add User");
					$(o).find('button[type="submit"] span').text("Add User");
				}
				if (f == "image_library") {
					imageSelectAction = $(this)[0];
					openMediaWindow();
				}
			}
		});
		$(document).on("click", ".rcs_popup_btn", function (e) {
			e.preventDefault();
			let o = "." + $(this).data("main_popup");
			let p = $(this).data("open_popup");
			$(o).addClass(p);
			let f = $(this).data("form");
			if (f == "aadd_user") {
				$(o).find('input[name="password"]').data("req", 1);
				$(o).find('[name="admin_user_id"]').val("");
				$(o).find(".rcs_popup_heading").text("Add User");
				$(o).find('button[type="submit"] span').text("Add User");
			}
			if (f == "image_library") {
				imageSelectAction = $(this)[0];
				openMediaWindow();
			}
		});
		/*--- popup js end -----*/
		/*------------ step optin toggle js start ---------*/
		$('.rcs_domain_qus .rcs_custom_toggle input[type="checkbox"]').change(
			function () {
				$(".rcs_domain_setting").slideToggle();
			}
		);
		/*------------ step optin toggle js end ---------*/
		/*--- select2 js start -----*/
		if ($("select").length > 0) {
			$("select").select2({
				minimumResultsForSearch: 2,
			});
		}
		/*--- select2 js end -----*/
		/*------ sidebar toggle css start -------*/
		$(".rcs_header_toggle").on("click", function () {
			$("body").toggleClass("rcs_sidebar_open");
		});
		/*------ sidebar toggle css end -------*/
		/*------------ step optin toggle js start ---------*/
		$('.rcs_optin_toggle .rcs_custom_toggle input[type="checkbox"]').change(
			function () {
				$(this)
					.parents(".rcs_optin_form_box")
					.children(".rcs_optin_form_main")
					.slideToggle();
			}
		);
		/*------------ step optin toggle js end ---------*/
		/*------------ custom tab js start ---------------*/
		$(".rcs_step_article_tabs ul li a").click(function () {
			$(".rcs_step_article_tabs ul li a").removeClass("activelink");
			$(this).addClass("activelink");
			var tagid = $(this).data("tag");
			$(".rcs_step_tab_box").removeClass("active").addClass("hide");
			$("#" + tagid)
				.addClass("active")
				.removeClass("hide");
		});
		/*------------ custom tab js end ---------------*/
		/*------------ date picker js start ---------------*/
		// $("#rcs_datepicker").datepicker({
		// 	autoclose: true,
		// 	todayHighlight: true
		// }).datepicker('update', new Date());
		/*------------ date picker js end ---------------*/
		/*---------- color picker js start -----------*/
		if ($(".color-picker").length > 0) {
			$(".rcs_color_input").colorpicker({
				customClass: "colorpicker-2x",
				align: "left",
				sliders: {
					saturation: {
						maxLeft: 200,
						maxTop: 200,
					},
					hue: {
						maxTop: 200,
					},
					alpha: {
						maxTop: 200,
					},
				},
			});
			$(".rcs_color_input")
				.colorpicker()
				.on("changeColor", function (e) {
					var color = e.color.toString("rgba");
					$(this).next().css({
						"background-color": color,
					});
					if($(this)[0].getAttribute('data-action') != undefined){
						let action = $(this)[0].getAttribute('data-action');
						let s = $(this)[0].getAttribute('data-colorp');
						sitePreviewData[action][s]['colorp'] = color;
						sitePreview(action);
					}
					// if($(this)[0].getAttribute('data-action') != undefined){
					// 	let action = $(this)[0].getAttribute('data-action');
					// 	let s = $(this)[0].getAttribute('data-weight');
					// 	sitePreviewData[action][s]['weight'] = weight;
					// 	sitePreview(action);
					// }
				});
		}
		/*---------- color picker js end -----------*/

		$(document).on('keyup', '.rcs_prev_input_text', function(e){
			e.preventDefault();
			let action = $(this)[0].getAttribute('data-action');
			let s = $(this)[0].getAttribute('data-text');
			sitePreviewData[action][s]['text'] = $(this).val();
			sitePreview(action);
		});
		$(document).on('change', '.rcs_prev_font', function(e){
			e.preventDefault();
			let action = $(this)[0].getAttribute('data-action');
			let s = $(this)[0].getAttribute('data-font');
			sitePreviewData[action][s]['font'] = $(this).val();
			sitePreview(action);
		});
		$(document).on('change', '.rcs_prev_font_weight', function(e){
		 	e.preventDefault();
		 	let action = $(this)[0].getAttribute('data-action');
		 	let s = $(this)[0].getAttribute('data-weight');
		 	sitePreviewData[action][s]['weight'] = $(this).val();
		 	sitePreview(action);
		});
		$(document).on('change', '.rcs_prev_font_style', function(e){
		 	e.preventDefault();
		 	let action = $(this)[0].getAttribute('data-action');
		 	let s = $(this)[0].getAttribute('data-style');
		 	sitePreviewData[action][s]['style'] = $(this).val();
		 	sitePreview(action);
		});

		if (document.querySelector("#editor")) {
			window.editor = CKEDITOR.replace("editor");
		}

		$(document).on("submit", "#rcsProfileUpdate", function (e) {
			e.preventDefault();
			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			let data = valid[2];
			let url = this.getAttribute("action");

			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.reload();
				}, 600);
			});
		});
		$(document).on("change", ".rcs_image_upload", function (e) {
			e.preventDefault();
			let file = this;
			let upload = new Promise(function (resolve, reject) {
				resolve(uploadFile(["jpg", "jpeg", "png"], file));
			});
			upload.then(function (rs) {
				if (!rs) {
					return;
				}
				let html = ``;
				let dp = new DOMParser();
				html += `<div class="rcs_col rcs_col4">
					<div class="rcs_image_lib_box">
						<div class="rcs_select_image">
							<img src="${$default.base_url}${rs.thumb}" alt="">
							<div class="rcs_image_lib_button" data-file="${rs.url}" data-image_id="${rs.file_id}">
								<a href="javascript:;" class="rcs_use_image">use</a>
								<a href="${$default.base_url}${rs.url}" class="rcs_view_image rcs_img_view">view</a>
								<a href="javascript:;" class="rcs_delete_image">delete</a>
							</div>
						</div>
						<p>${rs.name}</p>
					</div>
				</div>`;
				let doc = dp.parseFromString(html, "text/html");
				qs(`.rcs_my_images_files`).append(doc.body.children[0]);
			});
			$(".rcs_view_image").magnificPopup({
				type: "image",
			});
		});
		$(document).on("click", ".rcs_use_image", function (e) {
			e.preventDefault();
			let file_id = $(this).parent().data("image_id");
			let file = $(this).parent().data("file");
			imageSelectAction
				.closest(".rcs_image_box")
				.qs(".rcs_selected_image").innerHTML = "";
			imageSelectAction
				.closest(".rcs_image_box")
				.qs(
					".rcs_selected_image"
				).innerHTML = `<img src="${$default.base_url}${file}" alt=""><input type="hidden" value="${file_id}" name="image_id" class="rcs_input"><input type="hidden" value="${file}" name="image_url" class="rcs_input">`;
			if (
				imageSelectAction
					.closest(".rcs_image_box")
					.qs(".rcs_not_showing_img")
			) {
				imageSelectAction
					.closest(".rcs_image_box")
					.qs(".rcs_not_showing_img")
					.classList.add("hide");
			}
			$(".rcs_popup_wrapper").removeClass("rcs_popup_open");
			if (imageSelectAction.closest(".rcs_ad_banner_box")) {
				imageSelectAction
					.closest(".rcs_ad_banner_box")
					.qs(".rcs_banner_remove")
					.classList.remove("hide");
			}
			if(imageSelectAction.getAttribute('data-action') != undefined){
				sitePreviewData[imageSelectAction.getAttribute('data-action')][imageSelectAction.getAttribute('data-image')] = $default.base_url + file;
				sitePreview(imageSelectAction.getAttribute('data-action'));
			}
		});
		$(document).on("click", ".rcs_delete_image", function (e) {
			e.preventDefault();
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					let obj = $(this)[0];
					let file_id = $(this).parent().data("image_id");
					ajax_call(
						"media/delete",
						{ file_id: file_id },
						function (result) {
							success_message(result.msg);
							obj.closest(".rcs_col.rcs_col4").remove();
						}
					);
				}
			});
		});

		$(document).on("click", ".rcs_disconnect_facebook", function () {
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					ajax_call("ajax/disconnectFacebook", {}, function (result) {
						success_message(result.msg);
						setTimeout(() => {
							window.location.reload();
						}, 600);
					});
				}
			});
		});

		/* Autoresponder */
		$("body").on("click", ".rcs_autoresponsder:not(.active)", function (e) {
			e.preventDefault();
			let a = $(this).data("arname");
			$("#" + a + "_popup").addClass("rcs_popup_open");
		});
		$("body").on("click", ".rcs_autoresponsder.active", function (e) {
			e.preventDefault();
			let a = $(this).data("arname");
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					let data = { eraser: 1, gowith: "connect", responder: a };
					let url = "ajax/autoresponder";
					ajax_call(url, data, function (result) {
						success_message(result.msg);
						setTimeout(function () {
							window.location.reload();
						}, 600);
					});
				}
			});
		});
		$(document).on("click", ".rcs_autoResponder_connect", function (e) {
			e.preventDefault();

			var responder = $(this).data("responder");
			var data = {
				action: "autoresponder",
				responder: responder,
				apikey: "",
				gowith: "connect",
			};
			switch (responder) {
				case "Aweber":
					var aweber_code = $("#" + responder)
						.find(".aweber_code")
						.val();

					if (aweber_code == "") {
						error_message("Aweber Code is required.");
						return;
					}

					data.apikey = { aweber_code: aweber_code };

					break;

				case "Mailchimp":
					var api_key = $("#" + responder)
						.find(".api_key")
						.val();

					if (api_key == "") {
						error_message("API Key is required.");
						return;
					}

					data.apikey = { api_key: api_key };

					break;

				case "GetResponse":
					var api_key = $("#" + responder)
						.find(".api_key")
						.val();

					if (api_key == "") {
						error_message("API Key is required.");
						return;
					}

					data.apikey = { api_key: api_key };

					break;
			}
			let url = "ajax/autoresponder";
			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(function () {
					if(result.url != ''){
						window.location.href = result.url;
					}else{
						window.location.reload();
					}
				}, 600);
			});
		});
		/* Autoresponder */

		$(document).on("submit", ".rcs_integration_network", function (e) {
			e.preventDefault();
			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			let data = valid[2];
			let url = this.getAttribute("action");

			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.reload();
				}, 600);
			});
		});

		/* kuldeep */

		$(document).on("submit", ".rcs_create_site", function (e) {
			e.preventDefault();

			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}

			let data = valid[2];
			let url = "ajax/createSite";

			let pattern = /^[a-zA-Z0-9_.-]*$/;

			if(!pattern.test(data.sub_domain_name)){
				error_message("Please, enter valid domain.");
				return false;
			}

			ajax_call(url, data, function (result) {
				ajax_call('ajax/createDomainForSite', data, function (rm) {
					success_message(result.msg);
					setTimeout(() => {
						window.location.href = result.url;
					}, 500);
				}, function(rm){
					success_message(result.msg);
					setTimeout(() => {
						window.location.href = result.url;
					}, 500);
				});
			});
		});

		$(document).on("click", ".rcs_delete_site", function (e) {
			let s_id = $(this).closest("td").data("s_id");

			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					let url = "ajax/deleteSite";
					let data = { s_id: s_id };
					ajax_call(url, data, function (result) {
						success_message(result.msg);
						setTimeout(() => {
							window.location.href = result.url;
						}, 500);
					});
				}
			});
		});

		$(document).on("submit", ".rsc_design", function (e) {
			e.preventDefault();

			let valid = valid_fields($(this)[0]);

			let logo_image_id = $(".rcs_logo_image")
				.find("[name=image_id]")
				.val();
			let logo_image_url = $(".rcs_logo_image")
				.find("[name=image_url]")
				.val();

			let bg_image_id = $(".rcs_bg_image").find("[name=image_id]").val();
			let bg_image_url = $(".rcs_bg_image")
				.find("[name=image_url]")
				.val();

			let footer_image_id = $(".rcs_footer_bg_image")
				.find("[name=image_id]")
				.val();
			let footer_image_url = $(".rcs_footer_bg_image")
				.find("[name=image_url]")
				.val();

			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}

			/*if (logo_image_id == undefined) {
				error_message("logo Image is required.");
				return false;
			}*/

			let image_data = {
				logo_image_id: logo_image_id,
				logo_image_url: logo_image_url,
				bg_image_id: bg_image_id,
				bg_image_url: bg_image_url,
				footer_image_id: footer_image_id,
				footer_image_url: footer_image_url,
			};

			let data = { data: valid[2], image_data: image_data };
			let url = "ajax/site_design";

			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});

		$(document).on("change", "#preferred_network", function (e) {
			e.preventDefault();

			let tt = $("#preferred_network option:selected").val();
			let data = { n_id: tt };
			if (tt == 2) {
				$(".rcs_popup_create_web_info_box").addClass("hide");
			}
			let network_name = $("#preferred_network option:selected").text();
			$(".rcs_networkName label").append(network_name);
			$("#preferred_network_category").html("");
			$("#preferrednetworkProduct").html("");
			$(".rcs_popup_create_web_info_box").html("");

			ajax_call("ajax/site_article", data, function (result) {
				let data = result.data;
				let n_id = $("#preferred_network option:selected").val();
				if (n_id == 2) {
					$(".rcs_product_data").removeClass("hide");
					$(".rcs_product_category").addClass("hide");
					$(".rcs_product_subcategory").addClass("hide");
					$(".rcs_product_selector_div").addClass("hide");
					$(".rcs_product_selector_div").addClass("hide");
					$(".rcs_dfyseleted_product").addClass("hide");
				} else {
					$(".rcs_product_data").addClass("hide");
					$(".rcs_product_category").removeClass("hide");
					$(".rcs_product_subcategory").removeClass("hide");
					$(".rcs_product_selector_div").removeClass("hide");
					$(".rcs_dfyseleted_product").removeClass("hide");

					let options = "";
					options += '<option value="">Select Category</option>';
					for (var i = 0; i < data.length; i++) {
						// Loop through the data & construct the options
						options +=
							'<option value="' +
							data[i].nc_id +
							'">' +
							data[i].name +
							"</option>";
					}

					$("#preferred_network_category").append(options);
				}
			});
		});

		$(document).on("change", "#preferred_network_category", function (e) {
			e.preventDefault();

			let n_id = $("#preferred_network option:selected").val();
			let nc_id = $("#preferred_network_category option:selected").val();
			let data = { nc_id: nc_id, n_id: n_id };

			$("#preferrednetworkPcategory").html("");
			$(".rcs_popup_create_web_info_box").html("");

			ajax_call("ajax/site_article", data, function (result) {
				let data = result.data;
				let options = "";
				options += '<option value="">Select SubCategory</option>';
				for (var i = 0; i < data.length; i++) {
					options +=
						'<option value="' +
						data[i].nc_id +
						'">' +
						data[i].name +
						"</option>";
				}

				$("#preferrednetworkPcategory").append(options);
			});
		});

		$(document).on("change", "#preferrednetworkPcategory", function (e) {
			e.preventDefault();

			let n_id = $("#preferred_network option:selected").val();
			let nc_id = $("#preferred_network_category option:selected").val();
			let nsc_id = $("#preferrednetworkPcategory option:selected").val();
			let data = { nc_id: nc_id, n_id: n_id, nsc_id: nsc_id };

			$("#preferrednetworkProduct").html("");
			ajax_call("ajax/site_article", data, function (result) {
				let data = result.data;
				// console.log(data);
				let options = "";
				options += '<option value="">Select Product</option>';
				for (var i = 0; i < data.length; i++) {
					options +=
						'<option value="' +
						data[i].np_id +
						'">' +
						data[i].name +
						"</option>";
				}

				$("#preferrednetworkProduct").append(options);
			});
		});

		$(document).on("change", "#preferrednetworkProduct", function (e) {
			e.preventDefault();

			let n_id = $("#preferred_network option:selected").val();
			let nc_id = $("#preferred_network_category option:selected").val();
			let nsc_id = $("#preferrednetworkPcategory option:selected").val();
			let np_id = $("#preferrednetworkProduct option:selected").val();
			let product_name = $(
				"#preferrednetworkProduct option:selected"
			).text();

			let data = {
				nc_id: nc_id,
				n_id: n_id,
				nsc_id: nsc_id,
				np_id: np_id,
			};

			$(".rcs_popup_create_web_info_box").html("");
			$(".rcs_select_product").html(product_name);
			$(".rcs_select_product_name").removeClass("hide");

			ajax_call("ajax/site_article", data, function (result) {
				$(".rcs_popup_create_web_info_box").removeClass("hide");
				let data = result.data[0];
				console.log(data);
				// return false;
				let product_url = result.product_url;
				// let product_url = str.replace("userid", data.n_id);
				let html = "";
				html = `<h3 class="rcs_above_input_heading">Product Details </h3>
						<ul>
							<li>
								<h5>Product Name</h5>
								<p>${data.name}</p>
							</li>

							<li>
								<h5>Short Description</h5>
								<p>${data.description}</p>
							</li>

							<li>
								<h5>Commission</h5>
								<p>${data.commission}</p>
							</li>

							<li>
								<h5>Product URL</h5>
								<p>${product_url}</p>
							</li>
						</ul>`;
				$(".rcs_popup_create_web_info_box").append(html);
			});
		});

		$(document).on("click", ".rcs_header_form", function (e) {
			e.preventDefault();
			let valid = valid_fields($("#rcs_form_header")[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			let data = valid[2];
			if (!data["image_id"]) {
				error_message("Site Header Background Image is required.");
				return;
			}
			data["site_id"] = site_id;
			ajax_call("ajax/site_header", data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});
		$(document).on("click", ".rcs_set_article", function (e) {
			e.preventDefault();
			let t = $(this)[0];
			let s = t.getAttribute("data-article_id");
			amt.featuredArticles.forEach((n) => {
				if (n.a_id == s) {
					let a = ".rcs_article_feild";
					let i = ".rcs_featured_image";
					$(i).removeClass("hide");					
					$(".rcs_fea_not_show_img").addClass("hide");					
					$(".rcs_not_showing_img").addClass("hide");					

					$(a).find('input[name="title"]').val(n.title);
					$(".rcs_featured_image").html("");

					let img = ` `;
					img += `<img src="${$default.base_url}${n.file}">`;
					img += `<input type="hidden" name="image_id" value="${n.m_id}" class="rcs_input" >`;
					img += `<input type="hidden" name="image_url" value="${n.file}" class="rcs_input" >`;

					$(".rcs_featured_image").append(img);
					let s = CKEDITOR.instances["editor"].getData();
					CKEDITOR.instances["editor"].setData(s + '<p>' + n.content + '</p>');
					return;
				}
			});
			amt.normalArticles.forEach((n) => {
				if (n.a_id == s) {
					let a = ".rcs_article_feild";

					$(a).find('input[name="title"]').val(n.title);

					let s = CKEDITOR.instances["editor"].getData();
					CKEDITOR.instances["editor"].setData(s + '<p>' + n.content + '</p>');
					$(".rcs_selected_image").html("");
					return;
				}
			});
			$(".rcs_select_article_popup").removeClass("rcs_popup_open");
			$(".rcs_col.rcs_full_col").removeClass("hide");
		});

		$(document).on("change", "#siteArticle", function (e) {
			e.preventDefault();

			$(".rcs_col.rcs_full_col").removeClass("hide");
			let a_id = $("#siteArticle option:selected").val();
			//  alert(a_id);
			let data = { a_id: a_id };

			ajax_call("ajax/site_article", data, function (result) {
				let data = result.data;
				let image = result.image_url;
				let a = ".rcs_article_feild";

				$(a).find('input[name="title"]').val(data[0].title);
				CKEDITOR.instances["editor"].setData(data[0].content);
				$(".rcs_selected_image").html("");

				let img = ` `;
				img += `<img src="../../../${image[0].file}">`;
				img += `<input type="hidden" name="image_id" value="${image[0].image_url}" class="rcs_input" >`;
				img += `<input type="hidden" name="image_url" value="${image[0].file}" class="rcs_input" >`;

				$(".rcs_not_showing_img").addClass("hide");
				// let content = ` `;
				// content += `<textarea placeholder="Enter Content" class="rcs_custom_input rcs_input" data-req="1" data-msg="Content required." name="content" id="editor">${data[0].content}</textarea>`;

				$(".rcs_selected_image").append(img);
				//  $('.rcs_article_content').append(content);
			});
		});

		$(document).on("submit", "#rcs_create_product_form", function (e) {
			e.preventDefault();

			let n_id = $("#preferred_network option:selected").val();
			let nc_id = $("#preferred_network_category option:selected").val();
			let nsc_id = $("#preferrednetworkPcategory option:selected").val();
			let np_id = $("#preferrednetworkProduct option:selected").val();

			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}

			let data = {
				data: valid[2],
				nc_id: nc_id,
				n_id: n_id,
				nsc_id: nsc_id,
				np_id: np_id,
			};

			ajax_call("ajax/site_product", data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});

		$(document).on("submit", "#rcs_create_site_article_form", function (e) {
			e.preventDefault();
			
			var fd = new FormData();
			
			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			let a_id = $("#siteArticle option:selected").val();
			if (a_id == undefined) {
				var data = { data: valid[2], article_id: a_id };
				// fd.append('data', valid[2]);
				// fd.append('article_id', a_id);
				// fd.append('file', $('#upload_source').prop('files')[0]);
				// console.log($('#upload_source').prop('files')[0]);
			}
			let n_id = $("#preferred_network option:selected").val();
			if(n_id <= 0){
				error_message("Preferred Network is required.");
				return false;
			}
			if (n_id == 2) {
				let product_name = $(".rcs_product_data")
					.find('[name="product_name"]')
					.val();
				let product_url = $(".rcs_product_data")
					.find('[name="product_url"]')
					.val();

				if (product_name == "") {
					error_message("Product Name is required.");
					return false;
				}
				if (product_url == "") {
					error_message("Product Url is required.");
					return false;
				}
				let product_urlValid = validURL(product_url);
				if (product_urlValid == false && product_url != "") {
					error_message(
						"Product Url should be valid and please enter URL with http or https."
					);
					return false;
				}
				var data = {
					data: valid[2],
					n_id: n_id,
					product_name: product_name,
					product_url: product_url,
				};
				// fd.append('data', valid[2]);
				// fd.append('n_id', n_id);
				// fd.append('product_name', product_name);
				// fd.append('product_url', product_url);
				// fd.append('file', $('#upload_source').prop('files')[0]);
			} else {
				let prefNetCat = $("#preferred_network_category option:selected").val();
				let prefNetSubCat = $("#preferrednetworkPcategory option:selected").val();
				let productName = $('.rcs_selected_product span').html();
				// console.log(productName);
				if(prefNetCat <= 0){
					error_message("Category is required.");
					return false;
				}else if (prefNetSubCat <= 0){
					error_message("Sub Category is required.");
					return false;
				}else{
					if(productName == "No Product Selected"){
						error_message("Product is required.");
						return false;
					}else{
						var data = { data: valid[2] };
						// fd.append('data', valid[2]);
						// fd.append('file', $('#upload_source').prop('files')[0]);
					}
				}
				// if(prefNetCat > 0 && n_id > 0 && prefNetSubCat > 0){
				// 	var data = { data: valid[2] };
				// }
				// else if(){
				// 	error_message("Category is required.");
				// 	return false;
				// }
			}
			
			let url = "ajax/addsiteArticle";
			console.log(fd);
			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});

		$(document).on("click", ".rcs_delete_article", function (e) {
			let sa_id = $(this).closest("td").data("sa_id");
			let s_id = $(this).closest("td").data("s_id");

			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					let url = "ajax/deleteSiteArticle";
					let data = { sa_id: sa_id, s_id: s_id };
					ajax_call(url, data, function (result) {
						success_message(result.msg);
						setTimeout(() => {
							window.location.href = result.url;
						}, 500);
					});
				}
			});
		});

		$(document).on("submit", "#rcs_site_page_form", function (e) {
			e.preventDefault();
			var valid = valid_fields();

			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			let conte = CKEDITOR.instances["editor"].getData();
			let content = btoa(conte);
			var data = { data: valid[2], content: content };
			var url = $(this).attr("action");

			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});

		$(document).on("click", ".rcs_edit_page", function (e) {
			e.preventDefault();
			let p_id = $(this).closest("td").data("page_id");
			let data = { id: p_id };
			let url = "ajax/getPage";
			ajax_call(url, data, function (result) {
				let page_data = result.data;
				// console.log(page_data);
				// return false;
				let o = ".rcs_add_page_popup";
				$(o).addClass("rcs_popup_open");
				$(o).find('[name="page_id"]').val(page_data.p_id);

				$(o).find('input[name="title"]').val(page_data.page_name);
				CKEDITOR.instances["editor"].setData(page_data.content);

				// $(o).find('[name="name"]').text(user_data.name);
				$(o).find(".rcs_popup_heading").text("Update Page");
				$(o).find('button[type="submit"] span').text("Update Page");
			});
		});

		$(document).on("click", ".rcs_delete_page", function (e) {
			let page_id = $(this).closest("td").data("page_id");
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					let url = "ajax/deletePage";
					let data = { id: page_id };
					ajax_call(url, data, function (result) {
						success_message(result.msg);
						setTimeout(() => {
							window.location.reload();
						}, 500);
					});
				}
			});
		});

		$(document).on("submit", "#rcs_create_site_banner_form", function (e) {
			e.preventDefault();

			var valid = valid_fields();

			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			let top_banner_google_ads = $(".top_banner_google_ads").val();
			let bottom_banner_google_ads = $(".bottom_banner_google_ads").val();
			let sidebar_banner_google_ads = $(".sidebar_banner_google_ads").val();

			let s_id = $(".site_id").val();

			let top_banner_id = $(".rcs_top_banner")
				.find("[name= image_id]")
				.val();
			let top_banner_url = $(".rcs_top_banner")
				.find("[name=image_url]")
				.val();

			let top_banner_link = $("[name=top_banner_link]").val();

			if (top_banner_link == "" && top_banner_id != undefined) {
				error_message("Top Banner link is required.");
				return false;
			}

			let top_urlValid = validURL(top_banner_link);
			if (
				top_urlValid == false &&
				top_banner_link != "" &&
				top_banner_id != undefined
			) {
				error_message(
					"Top Banner Link should be valid and please enter URL with http or https."
				);
				return false;
			}

			let bottom_banner_id = $(".rcs_bottom_banner")
				.find("[name=image_id]")
				.val();
			let bottom_banner_url = $(".rcs_bottom_banner")
				.find("[name=image_url]")
				.val();
			let bottom_banner_link = $("[name=bottom_banner_link]").val();
			if (bottom_banner_link == "" && bottom_banner_id != undefined) {
				error_message("Bottom Banner link is required.");
				return false;
			}
			let bottom_urlValid = validURL(bottom_banner_link);
			if (
				bottom_urlValid == false &&
				bottom_banner_link != "" &&
				bottom_banner_id != undefined
			) {
				error_message(
					"Bottom Banner Link should be valid and please enter URL with http or https."
				);
				return false;
			}

			let side_banner_id = $(".rcs_sidebar_banner")
				.find("[name=image_id]")
				.val();
			let side_banner_url = $(".rcs_sidebar_banner")
				.find("[name=image_url]")
				.val();

			let sidebar_banner_link = $("[name=sidebar_banner_link]").val();

			if (sidebar_banner_link == "" && side_banner_id != undefined) {
				error_message("Side Banner link is required.");
				return false;
			}
			let sidebar_urlValid = validURL(sidebar_banner_link);
			if (
				sidebar_urlValid == false &&
				sidebar_banner_link != "" &&
				side_banner_id != undefined
			) {
				error_message(
					"Sidebar Banner Link should be valid and please enter URL with http or https."
				);
				return false;
			}

			let data = {
				data: valid[2],
				s_id: s_id,
				top_banner_id: top_banner_id,
				top_banner_url: top_banner_url,
				bottom_banner_id: bottom_banner_id,
				bottom_banner_url: bottom_banner_url,
				side_banner_id: side_banner_id,
				side_banner_url: side_banner_url,
				top_banner_google_ads: btoa(top_banner_google_ads),
				bottom_banner_google_ads: btoa(bottom_banner_google_ads),
				sidebar_banner_google_ads: btoa(sidebar_banner_google_ads),
			};
			console.log(valid[2]);


			let url = "ajax/site_banner";

			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});

		$(document).on("click", ".rcs_banner_remove", function (e) {
			e.preventDefault();
			$(this)[0]
				.closest(".rcs_ad_banner_box")
				.qs(".rcs_selected_image").innerHTML = "";
			$(this)[0]
				.closest(".rcs_ad_banner_box")
				.qs(".rcs_not_showing_image")
				.classList.remove("hide");
			$(this).addClass("hide");
		});
		$(document).on("click", ".rcs_selected_remove_image", function (e) {
			e.preventDefault();
			if(confirm('Are you sure?')){
				$(this)[0]
					.closest(".rcs_featured_image_box")
					.qs(".rcs_not_showing_image")
					.classList.remove("hide");
				$(this)[0]
					.closest(".rcs_featured_image_box")
					.qs(".rcs_selected_image").innerHTML = "";
			}
		});

		$(document).on("change", "#autoresponder_mailign_ligt", function (e) {
			// Autoresponder.addEventListener("change", function (e) {
			e.preventDefault();
			let autoresponder = $(
				"#autoresponder_mailign_ligt option:selected"
			).val();
			let data = { gowith: "list", responder: autoresponder };
			let url = "ajax/autoresponder";
			ajax_call(url, data, function (result) {
				// console.log(result);
				$("#autoresponse_mailing_list").html("");
				if (result.list) {
					let data = result.list;
					// console.log(data);
					let options = "";
					options +=
						'<option value="">Select Mailing List</option>';
					for (var i = 0; i < data.length; i++) {
						options +=
							'<option value="' +
							data[i].list_value +
							'">' +
							data[i].list_name +
							"</option>";
					}
					$("#autoresponse_mailing_list").append(options);
				}
			});
		});

		// $('.rcs_optin_toggle .rcs_custom_toggle input[type="checkbox"]').change(
		// 	function () {
		// 		alert($(this).val())
		// 	}
		// );

		$(document).on("submit", "#rcs_autoresponder_form", function (e) {
			e.preventDefault();

			let valid = valid_fields($(this)[0]);
			let autoresponder_name = $(
				".autoresponder_name option:selected"
			).val();
			let mailing_list_id = $(
				".autoresponse_mailing_list option:selected"
			).val();
			let mailing_list_name = $(
				".autoresponse_mailing_list option:selected"
			).text();

			let sidebar_image_id = $(".rcs_sidebar_image")
				.find("[name=image_id]")
				.val();
			let sidebar_image_url = $(".rcs_sidebar_image")
				.find("[name=image_url]")
				.val();
			let header_image_id = $(".rcs_sidebar_image")
				.find("[name=image_id]")
				.val();
			let header_image_url = $(".rcs_sidebar_image")
				.find("[name=image_url]")
				.val();

			let facebook_link = $(".rcs_social_facebook").find("[name=facebook_link]").val();
			let twitter_link = $(".rcs_social_twitter").find("[name=twitter_link]").val();
			let pinterest_link = $(".rcs_social_pinterest").find("[name=pinterest_link]").val();
			let linkedin_link = $(".rcs_social_linkedin").find("[name=linkedin_link]").val();
			let whatsapp_link = $(".rcs_social_whatsapp").find("[name=whatsapp_link]").val();
			
			let reddit_link = $(".rcs_social_reddit").find("[name=reddit_link]").val();
			let tumblr_link = $(".rcs_social_tumblr").find("[name=tumblr_link]").val();
			let buffer_link = $(".rcs_social_buffer").find("[name=buffer_link]").val();
			let digg_link = $(".rcs_social_digg").find("[name=digg_link]").val();
			let flipboard_link = $(".rcs_social_flipboard").find("[name=flipboard_link]").val();
			
			let meneame_link = $(".rcs_social_meneame").find("[name=meneame_link]").val();
			let blogger_link = $(".rcs_social_blogger").find("[name=blogger_link]").val();
			let evernote_link = $(".rcs_social_evernote").find("[name=evernote_link]").val();
			let instapaper_link = $(".rcs_social_instapaper").find("[name=instapaper_link]").val();
			let pocket_link = $(".rcs_social_pocket").find("[name=pocket_link]").val();
			
			let telegram_link = $(".rcs_social_telegram").find("[name=telegram_link]").val();
			let wordpress_link = $(".rcs_social_wordpress").find("[name=wordpress_link]").val();
			let stumbleupon_link = $(".rcs_social_stumbleupon").find("[name=stumbleupon_link]").val();
			let bibsonomy_link = $(".rcs_social_bibsonomy").find("[name=bibsonomy_link]").val();
			let mix_link = $(".rcs_social_mix").find("[name=mix_link]").val();
			
			let care2_link = $(".rcs_social_care2").find("[name=care2_link]").val();
			let blogmarks_link = $(".rcs_social_blogmarks").find("[name=blogmarks_link]").val();
			let livejournal_link = $(".rcs_social_livejournal").find("[name=livejournal_link]").val();
			let folkd_link = $(".rcs_social_folkd").find("[name=folkd_link]").val();
			let myspace_link = $(".rcs_social_myspace").find("[name=myspace_link]").val();
			
			let plurk_link = $(".rcs_social_plurk").find("[name=plurk_link]").val();
			let symbaloo_link = $(".rcs_social_symbaloo").find("[name=symbaloo_link]").val();
			let vk_link = $(".rcs_social_vk").find("[name=vk_link]").val();

			// console.log(stumbleupon_link);
			
			if (facebook_link != "") {
				let facebook_linkValid = validURL(facebook_link);
				if (facebook_linkValid == false) {
					error_message(
						"Facebook Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (twitter_link != "") {
				let twitter_linkValid = validURL(twitter_link);
				if (twitter_linkValid == false) {
					error_message(
						"Twitter Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (pinterest_link != "") {
				let pinterest_linkValid = validURL(pinterest_link);
				if (pinterest_linkValid == false) {
					error_message(
						"Pinterest Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (linkedin_link != "") {
				let linkedin_linkValid = validURL(linkedin_link);
				if (linkedin_linkValid == false) {
					error_message(
						"Linkedin Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (whatsapp_link != "") {
				let whatsapp_linkValid = validURL(whatsapp_link);
				if (whatsapp_linkValid == false) {
					error_message(
						"Whatsapp Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (reddit_link != "") {
				let reddit_linkValid = validURL(reddit_link);
				if (reddit_linkValid == false) {
					error_message(
						"Reddit Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (tumblr_link != "") {
				let tumblr_linkValid = validURL(tumblr_link);
				if (tumblr_linkValid == false) {
					error_message(
						"Tumblr Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (buffer_link != "") {
				let buffer_linkValid = validURL(buffer_link);
				if (buffer_linkValid == false) {
					error_message(
						"Buffer Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (digg_link != "") {
				let digg_linkValid = validURL(digg_link);
				if (digg_linkValid == false) {
					error_message(
						"Digg Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (flipboard_link != "") {
				let flipboard_linkValid = validURL(flipboard_link);
				if (flipboard_linkValid == false) {
					error_message(
						"Flipboard Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (meneame_link != "") {
				let meneame_linkValid = validURL(meneame_link);
				if (meneame_linkValid == false) {
					error_message(
						"Meneame Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (blogger_link != "") {
				let blogger_linkValid = validURL(blogger_link);
				if (blogger_linkValid == false) {
					error_message(
						"Blogger Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (evernote_link != "") {
				let evernote_linkValid = validURL(evernote_link);
				if (evernote_linkValid == false) {
					error_message(
						"Evernote Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (instapaper_link != "") {
				let instapaper_linkValid = validURL(instapaper_link);
				if (instapaper_linkValid == false) {
					error_message(
						"Instapaper Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (pocket_link != "") {
				let pocket_linkValid = validURL(pocket_link);
				if (pocket_linkValid == false) {
					error_message(
						"Pocket Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (telegram_link != "") {
				let telegram_linkValid = validURL(telegram_link);
				if (telegram_linkValid == false) {
					error_message(
						"Telegram Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (wordpress_link != "") {
				let wordpress_linkValid = validURL(wordpress_link);
				if (wordpress_linkValid == false) {
					error_message(
						"Wordpress Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (stumbleupon_link != "" && stumbleupon_link != undefined) {
				let stumbleupon_linkValid = validURL(stumbleupon_link);
				if (stumbleupon_linkValid == false) {
					error_message(
						"Stumbleupon Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (bibsonomy_link != "") {
				let bibsonomy_linkValid = validURL(bibsonomy_link);
				if (bibsonomy_linkValid == false) {
					error_message(
						"Bibsonomy Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (mix_link != "") {
				let mix_linkValid = validURL(mix_link);
				if (mix_linkValid == false) {
					error_message(
						"Mix Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (care2_link != "") {
				let care2_linkValid = validURL(care2_link);
				if (care2_linkValid == false) {
					error_message(
						"Care2 Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (blogmarks_link != "") {
				let blogmarks_linkValid = validURL(blogmarks_link);
				if (blogmarks_linkValid == false) {
					error_message(
						"Blogmarks Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (livejournal_link != "") {
				let livejournal_linkValid = validURL(livejournal_link);
				if (livejournal_linkValid == false) {
					error_message(
						"Livejournal Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (folkd_link != "") {
				let folkd_linkValid = validURL(folkd_link);
				if (folkd_linkValid == false) {
					error_message(
						"Folkd Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (myspace_link != "") {
				let myspace_linkValid = validURL(myspace_link);
				if (myspace_linkValid == false) {
					error_message(
						"Myspace Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (plurk_link != "") {
				let plurk_linkValid = validURL(plurk_link);
				if (plurk_linkValid == false) {
					error_message(
						"plurk Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (symbaloo_link != "") {
				let symbaloo_linkValid = validURL(symbaloo_link);
				if (symbaloo_linkValid == false) {
					error_message(
						"Symbaloo Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}
			if (vk_link != "") {
				let vk_linkValid = validURL(vk_link);
				if (vk_linkValid == false) {
					error_message(
						"Vk Url should be valid and please enter URL with http or https ."
					);
					return false;
				}
			}

			if (
				sidebar_image_id == undefined &&
				sidebar_image_url == undefined
			) {
				sidebar_image_id = "";
				sidebar_image_url = "";
			}
			if (header_image_id == undefined && header_image_url == undefined) {
				header_image_id = "";
				header_image_url = "";
			}
			let sliding_image_id = $(".rcs_sliding_image")
				.find("[name=image_id]")
				.val();
			let sliding_image_url = $(".rcs_sliding_image")
				.find("[name=image_url]")
				.val();

			if (
				sliding_image_id == undefined &&
				sliding_image_url == undefined
			) {
				sliding_image_id = "";
				sliding_image_url = "";
			}

			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			// $('.rcs_optin_toggle .rcs_custom_toggle input[type="checkbox"]').val();
			if ($(".rcs_sliding_checkbox:checked").length) {
				let sliding_headline_text = $(
					"[name=sliding_headline_text]"
				).val();
				let sliding_sub_headline_text = $(
					"[name=sliding_sub_headline_text]"
				).val();
				let sliding_button_text = $("[name=sliding_button_text]").val();
				let sliding_button_text_color = $(
					"[name=sliding_button_text_color]"
				).val();
				let sliding_button_color = $(
					"[name=sliding_button_color]"
				).val();
				let sliding_thankyou_message = $(
					"[name=sliding_thankyou_message]"
				).val();
				let sliding_btn_redirect_link = $(
					"[name=sliding_btn_redirect_link]"
				).val();

				if (sliding_headline_text == "") {
					error_message("Headline text is required.");
					return false;
				}
				if (sliding_sub_headline_text == "") {
					error_message("Sub Headline text is required.");
					return false;
				}
				if (sliding_button_text == "") {
					error_message("Button text is required.");
					return false;
				}
				if (sliding_button_text_color == "") {
					error_message("Button text color text is required.");
					return false;
				}
				if (sliding_button_color == "") {
					error_message("Button color is required.");
					return false;
				}
				if (sliding_thankyou_message == "") {
					error_message("Thank you message is required.");
					return false;
				}
				// if (sliding_btn_redirect_link == '') {
				// 	error_message("Set redirect link is required.");
				// 	return false;
				// }
				if (sliding_image_id == undefined) {
					error_message("Sliding Image is required.");
					return false;
				}
			}
			if ($(".rcs_sidebar_checkbox:checked").length) {
				let sidebar_headline_text = $(
					"[name=sidebar_headline_text]"
				).val();
				let sidebar_sub_headline_text = $(
					"[name=sidebar_sub_headline_text]"
				).val();
				let sidebar_button_text = $("[name=sidebar_button_text]").val();
				let sidebar_button_text_color = $(
					"[name=sidebar_button_text_color]"
				).val();
				let sidebar_button_color = $(
					"[name=sidebar_button_color]"
				).val();
				let sidebar_thankyou_message = $(
					"[name=sidebar_thankyou_message]"
				).val();
				let sidebar_btn_redirect_link = $(
					"[name=sidebar_btn_redirect_link]"
				).val();

				if (sidebar_headline_text == "") {
					error_message("Headline text is required.");
					return false;
				}
				if (sidebar_sub_headline_text == "") {
					error_message("Sub Headline text is required.");
					return false;
				}
				if (sidebar_button_text == "") {
					error_message("Button text is required.");
					return false;
				}
				if (sidebar_button_text_color == "") {
					error_message("Button text color text is required.");
					return false;
				}
				if (sidebar_button_color == "") {
					error_message("Button color is required.");
					return false;
				}
				if (sidebar_thankyou_message == "") {
					error_message("Thank you message is required.");
					return false;
				}
				// if (sidebar_btn_redirect_link == '') {
				// 	error_message("Set redirect link is required.");
				// 	return false;
				// }
				if (sidebar_image_id == undefined) {
					sliding_image_id = "";
					sliding_image_url = "";
				}
			}
			if ($(".rcs_header_checkbox:checked").length) {
				let header_headline_text = $(
					"[name=header_headline_text]"
				).val();
				let header_sub_headline_text = $(
					"[name=header_sub_headline_text]"
				).val();
				let header_button_text = $("[name=header_button_text]").val();
				let header_button_text_color = $(
					"[name=header_button_text_color]"
				).val();
				let header_button_color = $("[name=header_button_color]").val();
				let header_thankyou_message = $(
					"[name=header_thankyou_message]"
				).val();
				let header_btn_redirect_link = $(
					"[name=header_btn_redirect_link]"
				).val();

				if (header_headline_text == "") {
					error_message("Headline text is required.");
					return false;
				}
				if (header_sub_headline_text == "") {
					error_message("Sub Headline text is required.");
					return false;
				}
				if (header_button_text == "") {
					error_message("Button text is required.");
					return false;
				}
				if (header_button_text_color == "") {
					error_message("Button text color text is required.");
					return false;
				}
				if (header_button_color == "") {
					error_message("Button color is required.");
					return false;
				}
				if (header_thankyou_message == "") {
					error_message("Thank you message is required.");
					return false;
				}
				// if (header_btn_redirect_link == '') {
				// 	error_message("Set redirect link is required.");
				// 	return false;
				// }
				if (header_image_id == undefined) {
					header_image_id = "";
					header_image_url = "";
				}
			}
			if ($(".rcs_sidebar_checkbox:checked").length) {
				var sidebar_checkbox = 1;
			}
			if ($(".rcs_sliding_checkbox:checked").length) {
				var sliding_checkbox = 1;
			}
			if ($(".rcs_header_checkbox:checked").length) {
				var header_checkbox = 1;
			}

			let social_share_data = [];
			qsAll('[name="social_share_data"]').forEach(p=>{
				if(p.checked){
					social_share_data.push(p.value);
				}
			});
			valid[2].social_share_data = social_share_data;

			let data = {
				data: valid[2],
				sidebar_checkbox: sidebar_checkbox,
				header_checkbox: header_checkbox,
				sliding_checkbox: sliding_checkbox,
				sidebar_image_id: sidebar_image_id,
				sidebar_image_url: sidebar_image_url,
				header_image_id: header_image_id,
				header_image_url: header_image_url,
				sliding_image_id: sliding_image_id,
				sliding_image_url: sliding_image_url,
				autoresponder_name: autoresponder_name,
				mailing_list_id: mailing_list_id,
				mailing_list_name: mailing_list_name,
			};
			let url = "ajax/site_autoresponder";

			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			});
		});

		// $(document).on("submit", "#rcs_dfypage_product_form", function (e) {
		// 	e.preventDefault();

		// 	let n_id = $("#preferred_network option:selected").val();
		// 	let nc_id = $("#preferred_network_category option:selected").val();
		// 	let nsc_id = $("#preferrednetworkPcategory option:selected").val();
		// 	let np_id = $("#preferrednetworkProduct option:selected").val();

		// 	let valid = valid_fields($(this)[0]);
		// 	if (valid[0]) {
		// 		error_message(valid[1]);
		// 		return false;
		// 	}

		// 	let data = {
		// 		data: valid[2],
		// 		nc_id: nc_id,
		// 		n_id: n_id,
		// 		nsc_id: nsc_id,
		// 		np_id: np_id,
		// 	};

		// 	ajax_call("ajax/dfy_page_product", data, function (result) {
		// 		success_message(result.msg);
		// 		setTimeout(() => {
		// 			window.location.href = result.url;
		// 		}, 500);
		// 	});
		// });

		$(document).on("submit", ".rcs_create_dfysite", function (e) {
			e.preventDefault();

			let n_id = $("#preferred_network option:selected").val();
			let nc_id = $("#preferred_network_category option:selected").val();
			let nsc_id = $("#preferrednetworkPcategory option:selected").val();
			let np_id = $("#preferrednetworkProduct option:selected").val();
			
			let autoresponder_name = $("#autoresponder_mailign_ligt option:selected").val();

			let mailing_list_id = $(
				"#autoresponse_mailing_list option:selected"
			).val();
			let mailing_list_name = $(
				"#autoresponse_mailing_list option:selected"
			).text();

			let logo_image_id = $(".rcs_logo_image")
				.find("[name=image_id]")
				.val();

			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}
			if (n_id == 2) {
				let product_name = $(".rcs_product_data")
					.find('[name="product_name"]')
					.val();
				let product_url = $(".rcs_product_data")
					.find('[name="product_url"]')
					.val();

				if (product_name == "") {
					error_message("Product Name is required.");
					return false;
				}
				if (product_url == "") {
					error_message("Product Url is required.");
					return false;
				}
				let product_urlValid = validURL(product_url);
				if (product_urlValid == false && product_url != "") {
					error_message(
						"Product Url should be valid and please enter URL with http or https."
					);
					return false;
				}
			}else{
				if (nc_id == '') {
					error_message("Network Category is required.");
					return false;
				}
				if (nsc_id == '') {
					error_message("Network Subcategory is required.");
					return false;
				}
				if (np_id == '') {
					error_message("Product is required.");
					return false;
				}
			}

			if (n_id == '') {
				error_message("Preferred Network is required.");
				return false;
			}
			
			// if (autoresponder_name == '') {
			// 	error_message("Auto responder is required.");
			// 	return false;
			// }
			// if (mailing_list_id == '' || mailing_list_id == undefined) {
			// 	error_message("Mailing List is required.");
			// 	return false;
			// }
			// if (logo_image_id == undefined) {
			// 	error_message("logo Image is required.");
			// 	return false;
			// }
			
			
			let data = {
				data: valid[2],
				nc_id: nc_id,
				n_id: n_id,
				nsc_id: nsc_id,
				np_id: np_id,
				autoresponder_name: autoresponder_name,
				mailing_list_id: mailing_list_id,
				mailing_list_name: mailing_list_name,
			};
			let url = "ajax/create_dfySite";

			ajax_call(url, data, function (result) {
				ajax_call('ajax/createDomainForSite', {'sub_domain_name' : data.data.sub_domain_name, 'domain_name': data.data.domain_name}, function (rm) {
					success_message(result.msg);
					setTimeout(() => {
						window.location.href = result.url;
					}, 500);
				}, function(rm){
					success_message(result.msg);
					setTimeout(() => {
						window.location.href = result.url;
					}, 500);
				});
			});
		});

		$(document).on("change", "#site_name", function (e) {
			e.preventDefault();
			let s_id = $("#site_name option:selected").val();
			if (s_id == "") {
				return false;
			}

			let data = { s_id: s_id, page: 1 };
			let url = "ajax/analytics_page";
			$(".rcs_pageView").html("");
			$(".rcs_uniquepageView").html("");
			$(".rcs_leadGenerated").html("");
			$(".rcs_total_subs").text("");
			$("#rcs_subscriber_Data").html("");
			$(".rcs_table_footer").html("");
			$(".rcs_empty_box_txt.rcs_empty_txt_append").html("");

			ajax_call(url, data, function (result) {
				$(".rcs_table").removeClass("hide");
				$(".rcs_no_data_subs").addClass("hide");
				// console.log(result);
				// return;
				let data = result.data;
				let pagination = result.pagination;
				let subs = data.subsData;
				let total_subs = data.total_subs;

				if (total_subs.total == 0) {
					$(".rcs_empty_box_txt.rcs_empty_txt").addClass("hide");
					let txt =
						"<h3>No Data Found ! Please Select Another Website Name Above</h3>";
					$(".rcs_empty_box_txt.rcs_empty_txt_append").append(txt);
				}

				let siteData = data.siteData;
				let total = data.count_subs;
				$(".rcs_pageView").append(siteData.page_view);
				$(".rcs_uniquepageView").append(siteData.unique_page_view);
				$(".rcs_leadGenerated").append(siteData.num_leads);

				let html = ``;
				let i = 1;
				subs.forEach(function (ss) {
					html = `<tr>
					<td>${i}</td>
					<td>${ss.name}</td>
					<td>${ss.email}</td>
					<td>${ss.isCreated.replace(/:[^:]*$/,'')}</td>
					</tr>`;
					i++;
					$("#rcs_subscriber_Data").append(html);
				});

				if (total_subs.total > 0) {
					$(".rcs_table_footer").removeClass("hide");

					$(".rcs_total_subs").append(
						"Subscribers List(" + total_subs.total + ")"
					);

					let currentPage = pagination.currentPage;
					let PAGINATIONNUMBER = pagination.PAGINATIONNUMBER;

					let pag = paginate(
						total_subs.total,
						currentPage,
						PAGINATIONNUMBER,
						PAGINATIONNUMBER
					);
					console.log(pag);

					if (pag.pageSize < total_subs.total) {
						let pagination_html = ``;
						pagination_html += `<p>Showing -  ${total_subs.total} out of ${pag.totalItems}</p>`;
						pagination_html += `<div class="rcs_pagination"><ul>`;

						pagination_html += `<li class="rcs_pagination_prev"><a href="javascript:;" data-page="${
							pag.currentPage - 1
						}" class="rcs_paginate_js___"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="8" height="8" viewBox="0 0 8 8"><path d="M0.193,3.526 L3.524,0.194 C3.788,-0.068 4.213,-0.068 4.477,0.194 C4.739,0.457 4.739,0.883 4.477,1.147 L1.621,4.002 L4.477,6.859 C4.739,7.121 4.739,7.548 4.477,7.810 C4.213,8.073 3.788,8.073 3.524,7.810 L0.193,4.477 C-0.069,4.215 -0.069,3.790 0.193,3.526 L0.193,3.526 ZM4.198,3.325 L6.845,0.536 C7.110,0.256 7.540,0.256 7.807,0.536 C8.072,0.816 8.072,1.271 7.807,1.551 L5.641,3.832 L7.807,6.113 C8.072,6.393 8.072,6.847 7.807,7.127 C7.540,7.408 7.110,7.408 6.845,7.127 L4.198,4.339 C3.933,4.059 3.933,3.605 4.198,3.325 L4.198,3.325 Z" fill="#7a8ebe"/></svg></a></li>`;

						for (let i = 0; i < pag.pages.length; i++) {
							pagination_html += `<li class="${
								pag.currentPage == pag.pages[i] ? "active" : ""
							}" ><a href="javascript:;" data-page="${
								pag.pages[i]
							}" class="rcs_paginate_js___">${
								pag.pages[i]
							}</a></li>`;
						}

						pagination_html += `<li class="rcs_pagination_prev"><a href="javascript:;" data-page="${
							parseInt(pag.currentPage) + 1 > pag.totalPages
								? 0
								: parseInt(pag.currentPage) + 1
						}" class="rcs_paginate_js___"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="7.97" height="7.969" viewBox="0 0 7.97 7.969"><path d="M7.772,3.512 L4.454,0.193 C4.191,-0.068 3.768,-0.068 3.505,0.193 C3.244,0.454 3.244,0.879 3.505,1.142 L6.350,3.986 L3.505,6.831 C3.244,7.093 3.244,7.518 3.505,7.779 C3.768,8.042 4.191,8.042 4.454,7.779 L7.772,4.460 C8.033,4.198 8.033,3.775 7.772,3.512 L7.772,3.512 ZM3.782,3.311 L1.147,0.534 C0.882,0.255 0.454,0.255 0.188,0.534 C-0.076,0.813 -0.076,1.266 0.188,1.545 L2.345,3.817 L0.188,6.089 C-0.076,6.368 -0.076,6.820 0.188,7.099 C0.454,7.378 0.882,7.378 1.147,7.099 L3.782,4.322 C4.047,4.043 4.047,3.590 3.782,3.311 L3.782,3.311 Z" fill="#7a8ebe"/></svg></a></li>`;

						pagination_html += `</ul></div>`;

						$(".rcs_table_footer").append(pagination_html);
					} else {
						let pagination_html = ``;
						pagination_html += `<p>Showing -  ${total_subs.total} out of ${pag.totalItems}</p>`;
						$(".rcs_table_footer").append(pagination_html);
					}
				} else {
					$(".rcs_table").addClass("hide");
					$(".rcs_no_data_subs").removeClass("hide");
				}
			});
		});

		$(document).on("click", ".rcs_paginate_js___", function (e) {
			e.preventDefault();
			let s_id = $("#site_name option:selected").val();
			let page = $(this).data("page");
			if (!page) return;
			let data = { s_id: s_id, page: page };
			let url = "ajax/analytics_page";
			$(".rcs_pageView").html("");
			$(".rcs_uniquepageView").html("");
			$(".rcs_leadGenerated").html("");
			$(".rcs_total_subs").text("");
			$("#rcs_subscriber_Data").html("");
			$(".rcs_table_footer").html("");

			ajax_call(url, data, function (result) {
				$(".rcs_table").removeClass("hide");
				$(".rcs_no_data_subs").addClass("hide");
				// return;
				let data = result.data;
				let pagination = result.pagination;
				let subs = data.subsData;
				let total_subs = data.total_subs;
				let siteData = data.siteData;
				let total = data.count_subs;
				$(".rcs_pageView").append(siteData.page_view);
				$(".rcs_uniquepageView").append(siteData.unique_page_view);
				$(".rcs_leadGenerated").append(siteData.num_leads);
				let html = ``;
				let i = 1;
				subs.forEach(function (ss) {
					html = `<tr>
					<td>${i}</td>
					<td>${ss.name}</td>
					<td>${ss.email}</td>
					<td>${ss.isCreated.replace(/:[^:]*$/,'')}</td>
					</tr>`;
					i++;
					$("#rcs_subscriber_Data").append(html);
				});
				$(".rcs_total_subs").append(
					"Subscribers List(" + total_subs.total + ")"
				);

				let currentPage = pagination.currentPage;
				let PAGINATIONNUMBER = pagination.PAGINATIONNUMBER;

				let pag = paginate(
					total_subs.total,
					currentPage,
					PAGINATIONNUMBER,
					PAGINATIONNUMBER
				);

				let pagination_html = ``;
				pagination_html += `<p>Showing -  ${total_subs.total} out of ${pag.totalItems}</p>`;

				pagination_html += `<div class="rcs_pagination"><ul>`;

				pagination_html += `<li class="rcs_pagination_prev"><a href="javascript:;" data-page="${
					pag.currentPage - 1
				}" class="rcs_paginate_js___"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="8" height="8" viewBox="0 0 8 8"><path d="M0.193,3.526 L3.524,0.194 C3.788,-0.068 4.213,-0.068 4.477,0.194 C4.739,0.457 4.739,0.883 4.477,1.147 L1.621,4.002 L4.477,6.859 C4.739,7.121 4.739,7.548 4.477,7.810 C4.213,8.073 3.788,8.073 3.524,7.810 L0.193,4.477 C-0.069,4.215 -0.069,3.790 0.193,3.526 L0.193,3.526 ZM4.198,3.325 L6.845,0.536 C7.110,0.256 7.540,0.256 7.807,0.536 C8.072,0.816 8.072,1.271 7.807,1.551 L5.641,3.832 L7.807,6.113 C8.072,6.393 8.072,6.847 7.807,7.127 C7.540,7.408 7.110,7.408 6.845,7.127 L4.198,4.339 C3.933,4.059 3.933,3.605 4.198,3.325 L4.198,3.325 Z" fill="#7a8ebe"/></svg></a></li>`;

				for (let i = 0; i < pag.pages.length; i++) {
					pagination_html += `<li class="${
						pag.currentPage == pag.pages[i] ? "active" : ""
					}" ><a href="javascript:;" class="rcs_paginate_js___" data-page="${
						pag.pages[i]
					}">${pag.pages[i]}</a></li>`;
				}

				pagination_html += `<li class="rcs_pagination_prev"><a href="javascript:;" data-page="${
					parseInt(pag.currentPage) + 1 > pag.totalPages
						? 0
						: parseInt(pag.currentPage) + 1
				}" class="rcs_paginate_js___"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="7.97" height="7.969" viewBox="0 0 7.97 7.969"><path d="M7.772,3.512 L4.454,0.193 C4.191,-0.068 3.768,-0.068 3.505,0.193 C3.244,0.454 3.244,0.879 3.505,1.142 L6.350,3.986 L3.505,6.831 C3.244,7.093 3.244,7.518 3.505,7.779 C3.768,8.042 4.191,8.042 4.454,7.779 L7.772,4.460 C8.033,4.198 8.033,3.775 7.772,3.512 L7.772,3.512 ZM3.782,3.311 L1.147,0.534 C0.882,0.255 0.454,0.255 0.188,0.534 C-0.076,0.813 -0.076,1.266 0.188,1.545 L2.345,3.817 L0.188,6.089 C-0.076,6.368 -0.076,6.820 0.188,7.099 C0.454,7.378 0.882,7.378 1.147,7.099 L3.782,4.322 C4.047,4.043 4.047,3.590 3.782,3.311 L3.782,3.311 Z" fill="#7a8ebe"/></svg></a></li>`;

				pagination_html += `</ul></div>`;
				$(".rcs_table_footer").append(pagination_html);
			});
		});

		$(document).on("submit", ".rcs_create_automation", function (e) {
			e.preventDefault();

			let valid = valid_fields($(this)[0]);
			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}

			let autoresponder = $(
				"#autoresponder_mailign_ligt option:selected"
			).val();
			let autoresponse = $(
				"#autoresponse_mailing_list option:selected"
			).val();

			let data = {
				autoresponder: autoresponder,
				autoresponse: autoresponse,
				schedule_time: valid[2],
			};
			let url = "ajax/automation";
			ajax_call(url, data, function (result) {
				success_message(result.msg);
				setTimeout(() => {
					window.location.reload();
				}, 500);
			});
		});
		if ($(".selectpicker.rcs_custom_input").length) {
			var g_font_list_data = [
				{
					id: "Alata",
					html:
						"<span class='hvr_fnt' style='font-family:Alata;'>Alata</span>",
					text: "Alata",
				},
				{
					id: "Audiowide",
					html:
						"<span class='hvr_fnt' style='font-family:Audiowide;'>Audiowide</span>",
					text: "Audiowide",
				},
				{
					id: "Abel",
					html:
						"<span class='hvr_fnt' style='font-family:Abel;'>Abel</span>",
					text: "Abel",
				},
				{
					id: "Aladin",
					html:
						"<span class='hvr_fnt' style='font-family:Aladin;'>Aladin</span>",
					text: "Aladin",
				},
				{
					id: "Abril Fatface",
					html:
						"<span class='hvr_fnt' style='font-family:Abril Fatface;'>Abril Fatface</span>",
					text: "Abril Fatface",
				},
				{
					id: "Poller One",
					html:
						"<span class='hvr_fnt' style='font-family:Poller One;'>Poller One</span>",
					text: "Poller One",
				},
				{
					id: "Anton",
					html:
						"<span class='hvr_fnt' style='font-family:Anton;'>Anton</span>",
					text: "Anton",
				},
				{
					id: "Dancing Script",
					html:
						"<span class='hvr_fnt' style='font-family:Dancing Script;'>Dancing Script</span>",
					text: "Dancing Script",
				},
				{
					id: "Droid Sans",
					html:
						"<span class='hvr_fnt' style='font-family:Droid Sans;'>Droid Sans</span>",
					text: "Droid Sans",
				},
				{
					id: "Droid Serif",
					html:
						"<span class='hvr_fnt' style='font-family:Droid Serif;'>Droid Serif</span>",
					text: "Droid Serif",
				},
				{
					id: "Gloria Hallelujah",
					html:
						"<span class='hvr_fnt' style='font-family:Gloria Hallelujah;'>Gloria Hallelujah</span>",
					text: "Gloria Hallelujah",
				},
				{
					id: "Indie Flower",
					html:
						"<span class='hvr_fnt' style='font-family:Indie Flower;'>Indie Flower</span>",
					text: "Indie Flower",
				},
				{
					id: "Lato",
					html:
						"<span class='hvr_fnt' style='font-family:Lato;'>Lato</span>",
					text: "Lato",
				},
				{
					id: "Lobster",
					html:
						"<span class='hvr_fnt' style='font-family:Lobster;'>Lobster</span>",
					text: "Lobster",
				},
				{
					id: "Lobster Two",
					html:
						"<span class='hvr_fnt' style='font-family:Lobster Two;'>Lobster Two</span>",
					text: "Lobster Two",
				},
				{
					id: "Sacramento",
					html:
						"<span class='hvr_fnt' style='font-family:Sacramento;'>Sacramento</span>",
					text: "Sacramento",
				},
				{
					id: "Homemade Apple",
					html:
						"<span class='hvr_fnt' style='font-family:Homemade Apple;'>Homemade Apple</span>",
					text: "Homemade Apple",
				},
				{
					id: "Lora",
					html:
						"<span class='hvr_fnt' style='font-family:Lora;'>Lora</span>",
					text: "Lora",
				},
				{
					id: "Oswald",
					html:
						"<span class='hvr_fnt' style='font-family:Oswald;'>Oswald</span>",
					text: "Oswald",
				},
				{
					id: "PT Sans",
					html:
						"<span class='hvr_fnt' style='font-family:PT Sans;'>PT Sans</span>",
					text: "PT Sans",
				},
				{
					id: "PT Serif",
					html:
						"<span class='hvr_fnt' style='font-family:PT Serif;'>PT Serif</span>",
					text: "PT Serif",
				},
				{
					id: "Pacifico",
					html:
						"<span class='hvr_fnt' style='font-family:Pacifico;'>Pacifico</span>",
					text: "Pacifico",
				},
				{
					id: "Poppins",
					html:
						"<span class='hvr_fnt' style='font-family:Poppins;'>Poppins</span>",
					text: "Poppins",
				},
				{
					id: "Nunito",
					html:
						"<span class='hvr_fnt' style='font-family:Nunito;'>Nunito</span>",
					text: "Nunito",
				},
				{
					id: "Questrial",
					html:
						"<span class='hvr_fnt' style='font-family:Questrial;'>Questrial</span>",
					text: "Questrial",
				},
				{
					id: "Playfair Display",
					html:
						"<span class='hvr_fnt' style='font-family:Playfair Display;'>Playfair Display</span>",
					text: "Playfair Display",
				},
				{
					id: "Raleway",
					html:
						"<span class='hvr_fnt' style='font-family:Raleway;'>Raleway</span>",
					text: "Raleway",
				},
				{
					id: "Roboto",
					html:
						"<span class='hvr_fnt' style='font-family:Roboto;'>Roboto</span>",
					text: "Roboto",
				},
				{
					id: "Roboto Condensed",
					html:
						"<span class='hvr_fnt' style='font-family:Roboto Condensed;'>Roboto Condensed</span>",
					text: "Roboto Condensed",
				},
				{
					id: "Roboto Slab",
					html:
						"<span class='hvr_fnt' style='font-family:Roboto Slab;'>Roboto Slab</span>",
					text: "Roboto Slab",
				},
				{
					id: "Rubik",
					html:
						"<span class='hvr_fnt' style='font-family:Rubik;'>Rubik</span>",
					text: "Rubik",
				},
				{
					id: "Source Sans Pro",
					html:
						"<span class='hvr_fnt' style='font-family:Source Sans Pro;'>Source Sans Pro</span>",
					text: "Source Sans Pro",
				},
				{
					id: "Ubuntu",
					html:
						"<span class='hvr_fnt' style='font-family:Ubuntu;'>Ubuntu</span>",
					text: "Ubuntu",
				},
				{
					id: "Monoton",
					html:
						"<span class='hvr_fnt' style='font-family:Monoton;'>Monoton</span>",
					text: "Monoton",
				},
				{
					id: "Bungee Inline",
					html:
						"<span class='hvr_fnt' style='font-family:Bungee Inline;'>Bungee Inline</span>",
					text: "Bungee Inline",
				},
				{
					id: "Black Ops One",
					html:
						"<span class='hvr_fnt' style='font-family:Black Ops One;'>Black Ops One</span>",
					text: "Black Ops One",
				},
				{
					id: "Finger Paint",
					html:
						"<span class='hvr_fnt' style='font-family:Finger Paint;'>Finger Paint</span>",
					text: "Finger Paint",
				},
				{
					id: "Bungee Shade",
					html:
						"<span class='hvr_fnt' style='font-family:Bungee Shade;'>Bungee Shade</span>",
					text: "Bungee Shade",
				},
				{
					id: "Ribeye Marrow",
					html:
						"<span class='hvr_fnt' style='font-family:Ribeye Marrow;'>Ribeye Marrow</span>",
					text: "Ribeye Marrow",
				},
				{
					id: "Suez One",
					html:
						"<span class='hvr_fnt' style='font-family:Suez One;'>Suez One</span>",
					text: "Suez One",
				},
				{
					id: "Josefin Sans",
					html:
						"<span class='hvr_fnt' style='font-family:Josefin Sans;'>Josefin Sans</span>",
					text: "Josefin Sans",
				},
				{
					id: "Acme",
					html:
						"<span class='hvr_fnt' style='font-family:Acme;'>Acme</span>",
					text: "Acme",
				},
				{
					id: "Varela Round",
					html:
						"<span class='hvr_fnt' style='font-family:Varela Round;'>Varela Round</span>",
					text: "Varela Round",
				},
				{
					id: "Archivo",
					html:
						"<span class='hvr_fnt' style='font-family:Archivo;'>Archivo</span>",
					text: "Archivo",
				},
				{
					id: "Archivo Black",
					html:
						"<span class='hvr_fnt' style='font-family:Archivo Black;'>Archivo Black</span>",
					text: "Archivo Black",
				},
				{
					id: "Berkshire Swash",
					html:
						"<span class='hvr_fnt' style='font-family:Berkshire Swash;'>Berkshire Swash</span>",
					text: "Berkshire Swash",
				},
				{
					id: "Righteous",
					html:
						"<span class='hvr_fnt' style='font-family:Righteous;'>Righteous</span>",
					text: "Righteous",
				},
				{
					id: "Concert One",
					html:
						"<span class='hvr_fnt' style='font-family:Concert One;'>Concert One</span>",
					text: "Concert One",
				},
				{
					id: "Fredoka One",
					html:
						"<span class='hvr_fnt' style='font-family:Fredoka One;'>Fredoka One</span>",
					text: "Fredoka One",
				},
				{
					id: "DM Sans",
					html:
						"<span class='hvr_fnt' style='font-family:DM Sans;'>DM Sans</span>",
					text: "DM Sans",
				},
				{
					id: "ABeeZee",
					html:
						"<span class='hvr_fnt' style='font-family:ABeeZee;'>ABeeZee</span>",
					text: "ABeeZee",
				},
				{
					id: "Cinzel",
					html:
						"<span class='hvr_fnt' style='font-family:Cinzel;'>Cinzel</span>",
					text: "Cinzel",
				},
				{
					id: "Limelight",
					html:
						"<span class='hvr_fnt' style='font-family:Limelight;'>Limelight</span>",
					text: "Limelight",
				},
				{
					id: "Cabin",
					html:
						"<span class='hvr_fnt' style='font-family:Cabin;'>Cabin</span>",
					text: "Cabin",
				},
				{
					id: "Cabin Sketch",
					html:
						"<span class='hvr_fnt' style='font-family:Cabin Sketch;'>Cabin Sketch</span>",
					text: "Cabin Sketch",
				},
				{
					id: "Electrolize",
					html:
						"<span class='hvr_fnt' style='font-family:Electrolize;'>Electrolize</span>",
					text: "Electrolize",
				},
				{
					id: "Niconne",
					html:
						"<span class='hvr_fnt' style='font-family:Niconne;'>Niconne</span>",
					text: "Niconne",
				},
				{
					id: "Aclonica",
					html:
						"<span class='hvr_fnt' style='font-family:Aclonica;'>Aclonica</span>",
					text: "Aclonica",
				},
				{
					id: "Reem Kufi",
					html:
						"<span class='hvr_fnt' style='font-family:Reem Kufi;'>Reem Kufi</span>",
					text: "Reem Kufi",
				},
				{
					id: "Love Ya Like A Sister",
					html:
						"<span class='hvr_fnt' style='font-family:Love Ya Like A Sister;'>Love Ya Like A Sister</span>",
					text: "Love Ya Like A Sister",
				},
				{
					id: "Vast Shadow",
					html:
						"<span class='hvr_fnt' style='font-family:Vast Shadow;'>Vast Shadow</span>",
					text: "Vast Shadow",
				},
				{
					id: "Ravi Prakash",
					html:
						"<span class='hvr_fnt' style='font-family:Ravi Prakash;'>Ravi Prakash</span>",
					text: "Ravi Prakash",
				},
				{
					id: "Germania One",
					html:
						"<span class='hvr_fnt' style='font-family:Germania One;'>Germania One</span>",
					text: "Germania One",
				},
				{
					id: "Nosifer",
					html:
						"<span class='hvr_fnt' style='font-family:Nosifer;'>Nosifer</span>",
					text: "Nosifer",
				},
				{
					id: "Pirata One",
					html:
						"<span class='hvr_fnt' style='font-family:Pirata One;'>Pirata One</span>",
					text: "Pirata One",
				},
				{
					id: "Rubik Mono One",
					html:
						"<span class='hvr_fnt' style='font-family:Rubik Mono One;'>Rubik Mono One</span>",
					text: "Rubik Mono One",
				},
				{
					id: "Butcherman",
					html:
						"<span class='hvr_fnt' style='font-family:Butcherman;'>Butcherman</span>",
					text: "Butcherman",
				},
				{
					id: "Great Vibes",
					html:
						"<span class='hvr_fnt' style='font-family:Great Vibes;'>Great Vibes</span>",
					text: "Great Vibes",
				},
				{
					id: "Teko",
					html:
						"<span class='hvr_fnt' style='font-family:Teko;'>Teko</span>",
					text: "Teko",
				},
				{
					id: "Quicksand",
					html:
						"<span class='hvr_fnt' style='font-family:Quicksand;'>Quicksand</span>",
					text: "Quicksand",
				},
				{
					id: "Montserrat",
					html:
						"<span class='hvr_fnt' style='font-family:Montserrat;'>Montserrat</span>",
					text: "Montserrat",
				},
				{
					id: "Bree Serif",
					html:
						"<span class='hvr_fnt' style='font-family:Bree Serif;'>Bree Serif</span>",
					text: "Bree Serif",
				},
				{
					id: "Francois One",
					html:
						"<span class='hvr_fnt' style='font-family:Francois One;'>Francois One</span>",
					text: "Francois One",
				},
				{
					id: "Kaushan Script",
					html:
						"<span class='hvr_fnt' style='font-family:Kaushan Script;'>Kaushan Script</span>",
					text: "Kaushan Script",
				},
				{
					id: "Marck Script",
					html:
						"<span class='hvr_fnt' style='font-family:Marck Script;'>Marck Script</span>",
					text: "Marck Script",
				},
				{
					id: "Patua One",
					html:
						"<span class='hvr_fnt' style='font-family:Patua One;'>Patua One</span>",
					text: "Patua One",
				},
				{
					id: "Permanent Marker",
					html:
						"<span class='hvr_fnt' style='font-family:Permanent Marker;'>Permanent Marker</span>",
					text: "Permanent Marker",
				},
				{
					id: "Alfa Slab One",
					html:
						"<span class='hvr_fnt' style='font-family:Alfa Slab One;'>Alfa Slab One</span>",
					text: "Alfa Slab One",
				},
				{
					id: "Cookie",
					html:
						"<span class='hvr_fnt' style='font-family:Cookie;'>Cookie</span>",
					text: "Cookie",
				},
				{
					id: "Lalezar",
					html:
						"<span class='hvr_fnt' style='font-family:Lalezar;'>Lalezar</span>",
					text: "Lalezar",
				},
				{
					id: "Patrick Hand",
					html:
						"<span class='hvr_fnt' style='font-family:Patrick Hand;'>Patrick Hand</span>",
					text: "Patrick Hand",
				},
				{
					id: "Passion One",
					html:
						"<span class='hvr_fnt' style='font-family:Passion One;'>Passion One</span>",
					text: "Passion One",
				},
				{
					id: "Boogaloo",
					html:
						"<span class='hvr_fnt' style='font-family:Boogaloo;'>Boogaloo</span>",
					text: "Boogaloo",
				},
				{
					id: "Paytone One",
					html:
						"<span class='hvr_fnt' style='font-family:Paytone One;'>Paytone One</span>",
					text: "Paytone One",
				},
				{
					id: "Playball",
					html:
						"<span class='hvr_fnt' style='font-family:Playball;'>Playball</span>",
					text: "Playball",
				},
				{
					id: "Fugaz One",
					html:
						"<span class='hvr_fnt' style='font-family:Fugaz One;'>Fugaz One</span>",
					text: "Fugaz One",
				},
				{
					id: "Oleo Script",
					html:
						"<span class='hvr_fnt' style='font-family:Oleo Script;'>Oleo Script</span>",
					text: "Oleo Script",
				},
				{
					id: "Knewave",
					html:
						"<span class='hvr_fnt' style='font-family:Knewave;'>Knewave</span>",
					text: "Knewave",
				},
				{
					id: "Bevan",
					html:
						"<span class='hvr_fnt' style='font-family:Bevan;'>Bevan</span>",
					text: "Bevan",
				},
				{
					id: "Faster One",
					html:
						"<span class='hvr_fnt' style='font-family:Faster One;'>Faster One</span>",
					text: "Faster One",
				},
				{
					id: "Leckerli One",
					html:
						"<span class='hvr_fnt' style='font-family:Leckerli One;'>Leckerli One</span>",
					text: "Leckerli One",
				},
				{
					id: "Bungee",
					html:
						"<span class='hvr_fnt' style='font-family:Bungee;'>Bungee</span>",
					text: "Bungee",
				},
				{
					id: "Pattaya",
					html:
						"<span class='hvr_fnt' style='font-family:Pattaya;'>Pattaya</span>",
					text: "Pattaya",
				},
				{
					id: "Rye",
					html:
						"<span class='hvr_fnt' style='font-family:Rye;'>Rye</span>",
					text: "Rye",
				},
				{
					id: "Federo",
					html:
						"<span class='hvr_fnt' style='font-family:Federo;'>Federo</span>",
					text: "Federo",
				},
				{
					id: "Nova Square",
					html:
						"<span class='hvr_fnt' style='font-family:Nova Square;'>Nova Square</span>",
					text: "Nova Square",
				},
				{
					id: "Ranchers",
					html:
						"<span class='hvr_fnt' style='font-family:Ranchers;'>Ranchers</span>",
					text: "Ranchers",
				},
				{
					id: "New Rocker",
					html:
						"<span class='hvr_fnt' style='font-family:New Rocker;'>New Rocker</span>",
					text: "New Rocker",
				},
				{
					id: "Mr Dafoe",
					html:
						"<span class='hvr_fnt' style='font-family:Mr Dafoe;'>Mr Dafoe</span>",
					text: "Mr Dafoe",
				},
				{
					id: "Yesteryear",
					html:
						"<span class='hvr_fnt' style='font-family:Yesteryear;'>Yesteryear</span>",
					text: "Yesteryear",
				},
				{
					id: "Bitter",
					html:
						"<span class='hvr_fnt' style='font-family:Bitter;'>Bitter</span>",
					text: "Bitter",
				},
				{
					id: "Karla",
					html:
						"<span class='hvr_fnt' style='font-family:Karla;'>Karla</span>",
					text: "Karla",
				},
				{
					id: "Work Sans",
					html:
						"<span class='hvr_fnt' style='font-family:Work Sans;'>Work Sans</span>",
					text: "Work Sans",
				},
				{
					id: "Chivo",
					html:
						"<span class='hvr_fnt' style='font-family:Chivo;'>Chivo</span>",
					text: "Chivo",
				},
				{
					id: "Open Sans",
					html:
						"<span class='hvr_fnt' style='font-family:Open Sans;'>Open Sans</span>",
					text: "Open Sans",
				},
				{
					id: "Barlow",
					html:
						"<span class='hvr_fnt' style='font-family:Barlow;'>Barlow</span>",
					text: "Barlow",
				},
				{
					id: "Shrikhand",
					html:
						"<span class='hvr_fnt' style='font-family:Shrikhand;'>Shrikhand</span>",
					text: "Shrikhand",
				},
				{
					id: "Pathway Gothic",
					html:
						"<span class='hvr_fnt' style='font-family:Pathway Gothic;'>Pathway Gothic</span>",
					text: "Pathway Gothic",
				},
				{
					id: "Eczar",
					html:
						"<span class='hvr_fnt' style='font-family:Eczar;'>Eczar</span>",
					text: "Eczar",
				},
				{
					id: "Tenor Sans",
					html:
						"<span class='hvr_fnt' style='font-family:Tenor Sans;'>Tenor Sans</span>",
					text: "Tenor Sans",
				},
				{
					id: "Signik",
					html:
						"<span class='hvr_fnt' style='font-family:Signik;'>Signik</span>",
					text: "Signik",
				},
				{
					id: "Ultra",
					html:
						"<span class='hvr_fnt' style='font-family:Ultra;'>Ultra</span>",
					text: "Ultra",
				},
				{
					id: "Coda",
					html:
						"<span class='hvr_fnt' style='font-family:Coda;'>Coda</span>",
					text: "Coda",
				},
				{
					id: "Slabo 27px",
					html:
						"<span class='hvr_fnt' style='font-family:Slabo 27px;'>Slabo 27px</span>",
					text: "Slabo 27px",
				},
			];
			$(".selectpicker.rcs_custom_input").select2({
				data: g_font_list_data,
				escapeMarkup: function (markup) {
					return markup;
				},
				templateResult: function (data) {
					return data.html;
				},
			});
		}

		/* kuldeep */
		
		
		$('[name="video"]').on('click', function(){
			var video = $(this).val();
			
			if (video == "upload") {
				$('#upload_btn').removeClass('hidden');
				$('#url_source').addClass('input-hidden');
				$('#divLocation').removeClass('hidden');
			} else if (video == "url") {
				$('#url_source').removeClass('input-hidden');
				$('#upload_btn').addClass('hidden');
				$('#divLocation').removeClass('hidden');
			} else if (video == "noneVideo") {
				$('#upload_btn').addClass('hidden');
				$('#url_source').addClass('input-hidden');
				$('#divLocation').addClass('hidden');
				$('#upload_source').val('');
				$('#url_source').val('');
			}
		});
		
		$('.btn').click(function(){
			$('#upload_source')[0].click();
		});
		
		const videoSrc = document.querySelector('#vid-source');
		const videoCon = document.querySelector('#vid-container');
			
		function readVideo(event) {
			console.log(event.target.files)
			if (event.target.files && event.target.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					console.log('loaded');
					videoSrc.src = e.target.result;
					videoCon.load();
				}.bind(this)
				
				console.log(videoSrc.src);
				reader.readAsDataURL(event.target.files[0]);
			}
		}

		$('#upload_source').on('change', function(event){
			const filename = $(this).val().trim();
			let fileList = event.target.files;
			
			if(filename.split('.').pop() != 'mp4'){
				swal('Error!', 'Please select mp4 file.', 'error');
			}
			$('#vid-container').removeClass('hidden');
			$('#vid-url').addClass('hidden');
			readVideo(event);
		});
		
		$('#url_source').on('change', function(){
			$('#vid-container').addClass('hidden');
			var url = $(this).val().trim();
			
			if(url.length == 0){
				swal('Error!', 'Please input a url', 'error');
				$('#vid-url').addClass('hidden');
			}
			
			var new_url = url.replace('watch?v=', 'embed/');
			
			$('#vid-url').removeClass('hidden');
			$('#vid-url').attr('src', new_url);
		});
		
		$('#upload_source').val('');
	});

	$(".rcs_profile_menu a").on('click', function() {
		if( $(this).hasClass("rcs_user_lib") ) {
			if( $(this).hasClass("active") === false) {
				$(".rcs_profile_menu a").removeClass("active");
				$(this).addClass("active");
				$(".rcs_upload_wrapper, .rcs_my_images").removeClass("hide");
				$(".rcs_pixabay_search, .rcs_pixabay_images").addClass("hide");
			}
		}else{
			if( $(this).hasClass("active") === false ) {
				$(".rcs_profile_menu a").removeClass("active");
				$(this).addClass("active");
				$(".rcs_pixabay_search, .rcs_pixabay_images").removeClass("hide");
				$(".rcs_upload_wrapper, .rcs_my_images").addClass("hide");
			}
		}
	});

	$(document).on('change', '#rcs_social_share', function(){
		if($(this).prop('checked')){
			$('.rcs_social_share_object').removeClass('hide');
		}else{
			$('.rcs_social_share_object').addClass('hide');
		}
	});

	/* Pixabay */
	$(".rcs_pixabay_search input").keydown(function (e) {
		var key = e.which || e.keyCode; // key detection
		if (key == 13) {
			var q = $(this).val();
			var page = 1;
			$(".rcs_pixabay_images .rcs_my_images_files").html("");
			call_api_pixabay(q, page);
		}
	});

	function call_api_pixabay(q, page) {
		var xhr = new XMLHttpRequest();
		var pixaApiKey = "20579593-4873d31d034f0a6adc36ba5b4";
		xhr.open(
			"GET",
			"https://pixabay.com/api/?key=" +
				pixaApiKey +
				"&response_group=high_resolution&q=" +
				encodeURIComponent(q) +
				"&pretty=true&safesearch=true&per_page=40&page=" +
				page
		);
		xhr.onreadystatechange = function () {
			if (this.status == 200 && this.readyState == 4) {
				var data = JSON.parse(this.responseText);
				if (!(data.totalHits > 0)) {
					console.log("Try different keyword");
					return false;
				}
				render_pixabay_results(q, data, page);
			}
		};
		xhr.send();
		return false;
	}
	/*function render_pixabay_results(q, data, page) {
		var html = "";
		var obj = $(".rcs_pixabay_images");
		jQuery.each(data.hits, function (k, v) {
			html = "";
			html += '<div class="ed_imglist_item">';
			html +=
				'<div class="ed_image" data-url="' +
				v.largeImageURL +
				'" data-user="' +
				v.user +
				'" data-w="' +
				v.webformatWidth +
				'" data-h="' +
				v.webformatHeight +
				'">';
			html +=
				'<img src="' + v.previewURL.replace("_80", "_80") + '" alt="">';
			html += "</div>";
			html += "</div>";
			obj.append(html);
		});
	}*/
	function render_pixabay_results(q, data, page) {
		var html = "";
		var obj = $(".rcs_pixabay_images .rcs_my_images_files");
		jQuery.each(data.hits, function (k, v) {
			html = '<div class="rcs_col rcs_col4"><div class="rcs_image_lib_box" data-url="' +
			v.largeImageURL +
			'" data-user="' +
			v.user +
			'" data-w="' +
			v.webformatWidth +
			'" data-h="' +
			v.webformatHeight +
			'"><div class="rcs_select_image"><img src="' + v.largeImageURL + '" alt=""><div class="rcs_image_lib_button" ><a href="javascript:;" class="rcs_download_image">Select</a></div></div><p>' +
			v.user +
			'</p></div>';
		
			
			obj.append(html);
		});
	}

	$(document).on('click', '.rcs_download_image', function() {
		var imgUrl = $(this).parents(".rcs_image_lib_box").attr('data-url');
		if(imgUrl) {
			let url = "ajax/download_pixabay";
			var data = {};
			data['image_url'] = imgUrl;
			ajax_call(url, data, function (result) {
				if(result.status) {
					$('.rcs_my_images .rcs_my_images_files').prepend(result.resHtm);
					$(".rcs_profile_menu .rcs_user_lib").trigger('click');
					qs('.rcs_my_images .rcs_my_images_files .rcs_use_image').click();
				}
				success_message(result.msg);
			});
		}
	});
	/*SPINNER*/
	$('#submitSpinner').on('click', function() {
		var lang = $("#langSpinner").val();
		var locationSpin = document.getElementById("spinnerArticleContent").value;

		if(locationSpin == "create_article"){
			var textCreateArticle = CKEDITOR.instances.editor.getData();
			$.post("../../../extended/ajax/spinner.php", {data:textCreateArticle,lang:lang}, function(results){
				CKEDITOR.instances['editor'].setData(results);
			});
		}else{
			var text = $(".spinner-area").val();
			$.post("../extended/ajax/spinner.php", {data:text,lang:lang}, function(results){
				$(".spinner-area").val(results);
			});
		}
	});

	$('#resetSpinner').on('click', function() {
		var locationSpin = document.getElementById("spinnerArticleContent").value;

		if(locationSpin == "create_article"){
			var textCreateArticle = CKEDITOR.instances.editor.getData();
		}else{
			var text = $(".spinner-area").val();
			$(".spinner-area").val("");
		}
	});
	/*/SPINNER*/

	$('#rcs_search_news_btn').on('click', function() {
		let divNewsContentArticle = document.getElementById("rcs_news_article_content");
		let feedKeywordsNews = document.getElementById("feedKeywordsNews").value;
		console.log(feedKeywordsNews);

		if(feedKeywordsNews != ""){
			divNewsContentArticle.style.display = "block";
		}else{
			divNewsContentArticle.style.display = "block";
		}
	});

	$("#keywords_id_new").select2({
		tags: true
	});

	$('#category_id_new').on('change', function() {
		let category_id_new = $('#category_id_new').find(":selected").val();
		let div_new_continue = document.getElementById("div_new_continue");

		if(category_id_new == "0"){
			div_new_continue.style.display = "none";
		}else{

		}

	});

	$('.rcs_search_new_btn').on('click', function() {
		let category_id_new = $('#category_id_new').find(":selected").val();
		let div_new_continue = document.getElementById("div_new_continue");
		let logic_keyword_new = $('#logicKeywords_id_new').find(":selected").val();

		if(category_id_new == "0"){
			div_new_continue.style.display = "none";
		}else{
			// if(logic_keyword_new == "all" || logic_keyword_new == "any" || logic_keyword_new == "none"){
				let keyword_new = $('#keywords_id_new').select2('data');
				let keyword_length = keyword_new.length;
				var keys = [];
				for (let keywordLength = 0; keywordLength < keyword_length; keywordLength++){
					keys.push(keyword_new[keywordLength].text)
				}
				$.post('http://localhost/pushbutton/dFYSitesContents/getByKeywords/', { 'logic' : logic_keyword_new, 'category' : category_id_new, 'keywords' : keys, 'offset' : '0', 'limit' : '50'}, function(data, textStatus) {
					//data contains the JSON object
					div_new_continue.style.display = "block";
					document.getElementById("div_new_search_contents").innerHTML = "";
					for (let dataLength = 0; dataLength < data.length; dataLength++) {
						var text = `
					<div class="rcs_col rcs_full_col">
						<div class="rcs_custom_checkbox">
							<label>
								<input class="newarticlecheckbox" type="checkbox" value="${data[dataLength].id}">
							</label>
						</div>
						<div class="rcs_step_article_data" id="main_div_new_${data[dataLength].id}">
							<div id="title_new_${data[dataLength].id}" style="font-weight: bold">
								${data[dataLength].title}
							</div>
							<div id="content_new_${data[dataLength].id}" style="overflow-y: scroll; height:250px;">
								${data[dataLength].content}
							</div>
						</div>
					</div>
				`
						$( ".div_new_contents" ).append(text);
					}
				}, "json");
			// }else{
			// 	div_new_continue.style.display = "block";
			// 	document.getElementById("div_new_search_contents").innerHTML = "";
			// 	$.getJSON('https://pushbutton-vip.com/dFYSitesContents/searchFeed/' + category_id_new + '', function(data) {
			//
			// 		for (let dataLength = 0; dataLength < data.length; dataLength++) {
			// 			var text = `
			// 		<div class="rcs_col rcs_full_col">
			// 			<div class="rcs_custom_checkbox">
			// 				<label>
			// 					<input class="newarticlecheckbox" type="checkbox" value="${data[dataLength].id}">
			// 				</label>
			// 			</div>
			// 			<div class="rcs_step_article_data" id="main_div_new_${data[dataLength].id}">
			// 				<div id="title_new_${data[dataLength].id}" style="font-weight: bold">
			// 					${data[dataLength].title}
			// 				</div>
			// 				<div id="content_new_${data[dataLength].id}" style="overflow-y: scroll; height:250px;">
			// 					${data[dataLength].content}
			// 				</div>
			// 			</div>
			// 		</div>
			// 	`
			// 			$(".div_new_contents").append(text);
			// 		}
			// 	});
			// }
		}
	});

	/*Vid*/
	$('input[type=radio][name=radioVideo_CreateArticle]').change(function() {
		let divFeedURLVideo = document.getElementById("divFeedURLVideo");
		let divFileUploadVideo = document.getElementById("divFileUploadVideo");
		if (this.value == 'urlVideo_CreateArticle') {
			console.log("URL");
			divFeedURLVideo.style.display = "block";
			divFileUploadVideo.style.display = "none";
		}
		else if (this.value == 'uploadVideo_CreateArticle') {
			console.log("Upload");
			divFeedURLVideo.style.display = "none";
			divFileUploadVideo.style.display = "block";
		}
	});
	/*/Vid*/

	/* Pixabay */
	$(document).on('click', '.rcs_connect_integration_page', function(e){
		e.preventDefault();
		ajax_call('ajax/goAutoresponderPageToconnection', {site_id: site_id}, function (result) {
			window.location.href = result.url;
		});
	});
})(jQuery);

function setMailList(s) {
	let autoresponder = $("#autoresponder_mailign_ligt option:selected").val();
	let data = { gowith: "list", responder: autoresponder };
	let url = "ajax/autoresponder";
	ajax_call(url, data, function (result) {
		// console.log(result);
		$("#autoresponse_mailing_list").html("");
		if (result.list) {
			let data = result.list;
			// console.log(data);
			let options = "";
			options += '<option value="">Select Mailing List</option>';
			for (var i = 0; i < data.length; i++) {
				options +=
					'<option value="' +
					data[i].list_value +
					'" ' +
					(s == data[i].list_value ? "selected" : "") +
					" >" +
					data[i].list_name +
					"</option>";
			}
			$("#autoresponse_mailing_list").append(options);
		}
	});
}

function sitePreview(action){
	if(action == 'siteHeader'){
		let prev = sitePreviewData.siteHeader;
		$('.rcs_prev_site_header_section_heading').text(prev.banner_heading.text);
		$('.rcs_prev_site_header_section_subheading').text(prev.banner_sub_heading.text);
		$('.rcs_prev_site_header_section').css({'background-image':'url('+prev.background_image+')'});
		$('.rcs_prev_site_header_section_heading').css({'color':prev.banner_heading.colorp, 'font-family':prev.banner_heading.font});
		$('.rcs_prev_site_header_section_subheading').css({'color':prev.banner_sub_heading.colorp, 'font-family':prev.banner_sub_heading.font});
	}
	if(action == 'siteCreate'){
		let prev = sitePreviewData.siteCreate;
		$('.rec_prev_site_name').html(prev.site_name.text);
	}
	if(action == 'siteDesign'){
		let prev = sitePreviewData.siteDesign;
		$('.rcs_prev_copy_right').text(prev.copy_right.text);
		$('.rcs_prev_footer_color').css({'color':prev.copy_right.colorp});
		
		if(prev.logo != ''){
			$('.rcs_prev_logo').html('<img src="'+prev.logo+'" >');
		}else{
			$('.rcs_prev_logo').html('<span>'+prev.site_name+'</span>');
		}
		if(prev.body_bg_image != ''){
			$('.rcs_preview_box').css({'background-image':'url('+prev.body_bg_image+')'});
		}else{
			$('.rcs_preview_box').css({'background-color':prev.body_bg_color.colorp});
		}
		$('.rcs_read_more').text(prev.readmoreButton.text);
		$('.rcs_read_more').css({'color':prev.readmoreButton.colorp});
		
		if(prev.footer_image_url != ''){
			$('.rcs_footer_wrapper').css({'background-image':'url('+prev.footer_image_url+')'});
		}else{
			$('.rcs_footer_wrapper').css({'background-color':prev.footerBgColor.colorp});
		}
		
		$('.rcs_header_text').css({'color':prev.header_font.colorp, 'font-family':prev.header_font.font, 'font-weight':prev.header_font.weight, 'font-style':prev.header_font.style });

		// console.log(prev.normal_header_font.colorp);

		$('.rcs_prev_descriptions').css({'color':prev.normal_header_font.colorp, 'font-family':prev.normal_header_font.font, 'font-weight':prev.normal_header_font.weight, 'font-style':prev.normal_header_font.style });

		$('.rcs_social_icon_color').css({'color':prev.social_link_font_Color.colorp});
		$('.rcs_social_icon_color').css({'background-color':prev.social_link_Bg_Color.colorp});
		
		
		// if(prev.bg_image_url != ''){
			// 	$('.rcs_prev_logo').html('<img src="'+prev.bg_image_url+'" >');
		// }else{
		// 	$('.rcs_prev_logo').html('<span>'+prev.site_name+'</span>');
		// }
	}
}