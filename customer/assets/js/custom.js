(($) => {
	"use strict";

	$(document).ready(function () {
		$(".rcs_menu_toggle").on("click", function () {
			$("body").toggleClass("menu_open");
		});
		$(".rcs_menu_overlay").on("click", function () {
			$("body").removeClass("menu_open");
		});

		$(window).on("load", function (e) {
			e.preventDefault();
			if (typeof Storage != "undefined") {
				if (localStorage.getItem("uniqueView") == null) {
					localStorage.setItem("uniqueView", "Yes");
					let data = { site_id: site_id, user_id: user_id };
					let url = "ajax/analytics";
					$.ajax({
						url: url,
						type: "POST",
						data: data,
					});
				}
			}
		});

		/*---------- word count -------*/
		$(".rcs_blog_des p").text(function(index, currentText) {
			var maxLength = $(this).parent().attr('data-maxlength');
			if(currentText.length >= maxLength) {
			  return currentText.substr(0, maxLength) + "...";
			} else {
			  return currentText
			} 
		  });
		/*---------- word count -------*/

		$(document).on("click", ".rcs_load_more", function (e) {
			e.preventDefault();
			let data = {};
			let page = $(".rcs_blog_load_more a").data("page");
			
			if(page == ''){
				data["page"] = 0;
			}else{
				console.log(page)
				data['page'] = page + 1;
			}
			
			ajax_call("ajax/load_more_articles", data, function (result) {
				// success_message(result.msg);
				// setTimeout(() => {
				// 	window.location.href = result.url;
				// }, 500);
			});
		});

		$(document).on("click", ".rcs_option_cross", function () {
			$(this).parents(".rcs_post_popup ").removeClass("rcs_optin_open");			
		});


		$(document).on("submit", "#rcs_leads_form", function (e) {
			e.preventDefault();
			// alert('hi');
			let name = $(this).find("[name=name]").val();
			let email = $(this).find("[name=email]").val();
			let form = $(this).find("[name=form]").val();
			if(name == ""){
				error_message("Name fileds required");
				return false;
			}
			if(email == ""){
				error_message("Email fileds required");
				return false;
			}
			let check_valid = emailValidate(email);
			if (check_valid == false) {
				error_message("Email Id is not valid");
				return false;
			}

			let data = {
				name: name,
				email: email,
				form: form,
				site_id: site_id,
				user_id: user_id,
			};
			let url = this.getAttribute("action");
			let obj = $(this);
			$.ajax({
				url: url,
				type: "POST",
				data: data,
				success: function (result) {
					let res = JSON.parse(result);
					if (res.status == 0) {
						error_message(res.msg);
					}
					if (res.msg != "" && res.status == 1) {
						success_message(res.msg);
					}
					if (res.url != "") {
						setTimeout(() => {
							window.location.href = res.url;
						}, 500);
					}
					obj.find("[name=name]").val("");
					obj.find("[name=email]").val("");
				},
			});
		});
		/* kuldeep */
	});
	function success_message(msg) {
		$(".rcs_notifications").removeClass("rcs_success rcs_error hide");
		$(".rcs_notification_msg").html(msg);
		$(".rcs_notifications").addClass("rcs_success");
		$(".rcs_auth_img").addClass("hide");
		setTimeout(function () {
			$(".rcs_notifications").addClass("hide");
			$(".rcs_auth_img").removeClass("hide");
		}, 5000);
	}
	
	function error_message(msg) {
		$(".rcs_notifications").removeClass("rcs_success rcs_error hide");
		$(".rcs_notification_msg").html(msg);
		$(".rcs_notifications").addClass("rcs_error");
		$(".rcs_auth_img").addClass("hide");
		setTimeout(function () {
			$(".rcs_notifications").addClass("hide");
			$(".rcs_auth_img").removeClass("hide");
		}, 5000);
	}

	function emailValidate(mail) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
			return true;
		}
		return false;
	}
})(jQuery);
