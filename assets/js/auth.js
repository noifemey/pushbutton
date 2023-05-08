(($) => {
	"use strict";

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	let OTP = "";

	$(document).ready(function () {
		$(".rcs_auth_fields input")
			.on("focus blur", function (e) {
				$(this)
					.parents(".rcs_auth_fields")
					.toggleClass(
						"rcs_input_focesed",
						e.type === "focus" || this.value.length > 0
					);
			})
			.trigger("blur");

		$(document).on("click", ".rcs_digi_signup", digi_register);
		$(document).on("click", ".rcs_signup_member", register);
		$(document).on("click", ".rcs_login_member", login);
		$(document).on("click", ".rcs_login_team_member", team_member_login);
		$(document).on("click", ".rcs_forgot_password", forget_password);
		$(document).on("click", ".rcs_otp_submit", check_email_otp);
		$(document).on("click", ".rcs_reset_password", reset_password);
	});

	function register(e) {
		e.preventDefault();

		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}

		var data = valid[2];
		var url = "ajax/register";

		$(".rcs_preloader").removeClass("hide");

		ajax_call(url, data, function (result) {
			$(".rcs_preloader").addClass("hide");
			success_message(result.msg);
			setTimeout(() => {
				if (result.url) {
					window.location.href = result.url;
				}
			}, 500);
		});
	}


	function digi_register(e) {

		e.preventDefault();

		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}

		var data = valid[2];
		var url = "ajax/digiregister";

		$(".rcs_preloader").removeClass("hide");

		ajax_call(url, data, function (result) {
			$(".rcs_preloader").addClass("hide");
			success_message(result.msg);
			setTimeout(() => {
				if (result.url) {
					window.location.href = result.url;
				}
			}, 500);
		});
	}
	
	function login(e) {
		e.preventDefault();

		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}

		var data = valid[2];
		var url = "ajax/login";
		console.log(data);
		ajax_call(url, data, function (result) {
			success_message(result.msg);
			setTimeout(function () {
				if (result.url) {
					window.location.href = result.url;
				}
			}, 300);
		});
	}

	function team_member_login(e) {
		e.preventDefault();

		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}

		var data = valid[2];
		var url = "ajax/team_member_login";

		ajax_call(url, data, function (result) {
			success_message(result.msg);
			setTimeout(function () {
				if (result.url) {
					window.location.href = result.url;
				}
			}, 300);
		});
	}

	function forget_password(e) {
		e.preventDefault();

		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}

		var data = valid[2];
		var url = "ajax/forgot";

		ajax_call(url, data, function (result) {
			$(".rcs_request_section").addClass("hide");
			$(".rcs_otp_section").removeClass("hide");
			OTP = result.code;
			success_message(result.msg);
		});
	}

	function check_email_otp(e) {
		e.preventDefault();
		var inputOTP = $('input[name="otpDigit"]').val();
		if (atob(OTP) == inputOTP) {
			$(".rcs_otp_section").addClass("hide");
			$(".rcs_setpassword_section").removeClass("hide");
		} else {
			error_message("Invalid OTP");
		}
	}

	function reset_password(e) {
		e.preventDefault();

		var new_pass = $.trim($("#rcs_newpass").val());
		var conf_pass = $.trim($("#rcs_confpass").val());

		if (new_pass == "") {
			error_message("Please Enter Password.");
			if (new_pass == "") {
				$("#rcs_newpass").focus();
			}
		} else if (new_pass.length < 5) {
			error_message("Password should be atleast 5 character");
			if (new_pass == "") {
				$("#rcs_newpass").focus();
			}
		} else if (conf_pass == "") {
			error_message("Please Enter Confirm Password.");
			if (conf_pass == "") {
				$("#rcs_confpass").focus();
			}
		} else if (new_pass != conf_pass) {
			error_message("Confirm Password should be same as Password.");
			$("#rcs_confpass").focus();
		} else {
			var valid = valid_fields();

			if (valid[0]) {
				error_message(valid[1]);
				return false;
			}

			var data = valid[2];
			data["npassword"] = new_pass;
			data["cpassword"] = conf_pass;
			var url = "ajax/reset_password";
			ajax_call(url, data, function (result) {
				$(".wd_reset_password").hide();
				success_message(result.msg);
				setTimeout(function () {
					if (result.url) {
						window.location.href = result.url;
					}
				}, 2000);
			});
		}
	}
})(jQuery);
