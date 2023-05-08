$(document).ready(function () {
	$(document).on("submit", "#rcs_user_form", function (e) {
		e.preventDefault();
		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}
		var data = valid[2];
		var url = $(this).attr("action");
		if ($("#rcs_access_level").val().length <= 0) {
			error_message("Access Level is required.");
			return false;
		}
		data.access_level = $("#rcs_access_level").val();

		ajax_call(url, data, function (result) {
			success_message(result.msg);
			setTimeout(() => {
				window.location.reload();
			}, 500);
		});
	});

	$(document).on("click", ".rcs_edit_user", function (e) {
		e.preventDefault();
		let user_id = $(this).closest("td").data("user_id");

		let url = "ajax/getUser";
		let data = { id: user_id };
		ajax_call(url, data, function (result) {
			let user_data = result.data;
			let o = ".rcs_add_user_popup";
			let data = JSON.parse(user_data.access_level);
			$('select').select2().val(data).trigger('change')

			$("#rcs_access_level").val(data);
			$(o).addClass("rcs_popup_open");
			$(o).find('[name="admin_user_id"]').val(user_id);

			$(o).find('input[name="name"]').val(user_data.name);
			$(o).find('input[name="password"]').data("req", 0);
			$(o).find('input[name="email"]').val(user_data.email);
			$(o).find('input[name="access_level"]').val(data);

			// $(o).find('[name="name"]').text(user_data.name);
			$(o).find(".rcs_popup_heading").text("Update User");
			$(o).find('button[type="submit"] span').text("Update User");
		});
	});

	$(document).on("click", ".rcs_popup_cross", function (e) {
		e.preventDefault();
			window.location.reload();
	});
	
	$(document).on("click", ".rcs_pagination_action", function (e) {
		let s = $('[name="search_user"]').val();
		if (s.trim() != "") {
			e.preventDefault();
			postFormJS($(this).find("a").attr("href"), { search_user: s });
		}
	});
	$(document).on("click", ".rcs_articles_pagination_action", function (e) {
		let s = $('[name="search_articles"]').val();
		if (s.trim() != "") {
			e.preventDefault();
			postFormJS($(this).find("a").attr("href"), { search_articles: s });
		}
	});

	$(document).on("click", ".rcs_delete_user", function (e) {
		let user_id = $(this).closest("td").data("user_id");
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				let url = "ajax/deleteUser";
				let data = { id: user_id };
				ajax_call(url, data, function (result) {
					success_message(result.msg);
					setTimeout(() => {
						window.location.reload();
					}, 500);
				});
			}
		});
	});

	$(document).on("submit", "#rcs_create_article_form", function (e) {
		e.preventDefault();
		var valid = valid_fields();

		if (valid[0]) {
			error_message(valid[1]);
			return false;
		}
		var data = valid[2];
		if (!data.image_id) {
			error_message("Please upload image!");
			return false;
		}

		let url = "ajax/addArticle";
		ajax_call(url, data, function (result) {
			success_message(result.msg);
			if (result.url) {
				setTimeout(() => {
					window.location.href = result.url;
				}, 500);
			}
		});
	});

	$(document).on("click", ".rcs_delete_article", function (e) {
		let a_id = $(this).closest("td").data("a_id");
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				let url = "ajax/deleteArticle";
				let data = { id: a_id };
				ajax_call(url, data, function (result) {
					success_message(result.msg);
					setTimeout(() => {
						window.location.href = result.url;
					}, 500);
				});
			}
		});
	});
});
function user_status_checkbox(t) {
	let user_id = t.value;
	if (t.checked == true) {
		var value = 1;
	} else {
		var value = 0;
	}
	let data = { user_id: user_id, status: value };

	let url = "ajax/updateUserStatus";

	ajax_call(url, data, function (result) {
		success_message(result.msg);
		setTimeout(() => {
			if (result.url) {
				window.location.href = result.url;
			}
		}, 500);
	});
}

// function search(event) {
// 	if(event.keyCode === 13) {
// 		alert(event.value);
// 		var search_value = $('.rcs_custom_input').val();
// 		console.log(search_value);
// 		let data = {search_value :search_value};
// 		let url = "ajax/searchUser";
// 		ajax_call(url, data, function (result) {
// 			success_message(result.msg);
// 			if (result.data.length) {
// 				console.log(result.data);
// 			}
// 		});
// 		return false;
// 	}else{
// 		alert(event.value);

// 	}

// }
function user_delete(t) {
	console.log(t);
	return false;
}
