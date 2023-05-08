var EMOJIPOPUP = !1,
	CurrentMessageBoxId = "",
	CursorPostion = 0;
$.fn.clickOff = function (callback, selfDestroy) {
	var clicked = !1;
	var parent = this;
	var destroy = selfDestroy || !0;
	parent.click(function () {
		clicked = !0;
	});
	$(document).click(function (event) {
		if (!clicked) {
			callback(parent, event);
		}
		if (destroy) {
		}
		clicked = !1;
	});
};

Date.prototype.addDays = function (days) {
	var dat = new Date(this.valueOf());
	dat.setDate(dat.getDate() + days);
	return dat;
};
Date.prototype.subDays = function (days) {
	var dat = new Date(this.valueOf());
	dat.setDate(dat.getDate() - days);
	return dat;
};

function valid_fields(parent = "") {
	var bool = false,
		data = {},
		msg = "",
		iobject = "",
		robject = "",
		cobject = "";
		vobject = "";
	if (parent == "") {
		iobject = $(".rcs_input");
		cobject = $(".rcs_checkbox");
		robject = $(".rcs_radio");
		vobject = $(".rcs_video");
	} else {
		iobject = $(parent).find(".rcs_input");
		cobject = $(parent).find(".rcs_checkbox");
		robject = $(parent).find(".rcs_radio");
		vobject = $(parent).find(".rcs_video");
	}
	iobject.each(function (i, v) {
		var a = $(this).val();
		if ($(this).data("req") && a.trim() == "") {
			msg = $(this).data("msg");
			bool = true;
			return false;
		}
		if (
			$(this).data("req") &&
			$(this).attr("type") == "email" &&
			!emailValidate(a)
		) {
			msg = $(this).data("error");
			bool = true;
			return false;
		}
		if (
			$(this).data("req") &&
			$(this).attr("type") == "url" &&
			!validURL(a)
		) {
			msg = $(this).data("error");
			bool = true;
			return false;
		}
		data[$(this).attr("name")] = $(this).val();
	});
	
	let oooo = [];

	cobject.each(function (i, v) {
		if ($(this).data("req") && $(this).prop("checked") == false) {
			if (data[$(this).attr("name")]) {
				return;
			} else {
				if ($("[name=" + $(this).attr("name") + "]").length > 1) {
					oooo.push($(this).attr("name"));
					return;
				} else {
					msg = $(this).data("msg");
					bool = true;
					return false;
				}
			}
		}
		if ($(this).prop("checked")) {
			if (data[$(this).attr("name")]) {
				if (Array.isArray(data[$(this).attr("name")])) {
					data[$(this).attr("name")].push($(this).val());
				} else {
					let a = data[$(this).attr("name")];
					data[$(this).attr("name")] = [a, $(this).val()];
				}
			} else data[$(this).attr("name")] = $(this).val();
		} else {
			data[$(this).attr("name")] = 0;
		}
	});
	for (let index = 0; index < oooo.length; index++) {
		if (!data[oooo[index]]) {
			msg = $(`[name="${oooo[index]}"]`).data("msg");
			bool = true;
			break;
		}
	}
	let radioSel = true,
		radioSelMsg = "";
	robject.each(function (i, v) {
		if ($(this).prop("checked")) {
			data[$(this).attr("name")] = $(this).val();
		} else if ($(this).data("req")) {
			radioSelMsg = $(this).data("msg");
			radioSel = false;
		}
	});
	if (robject.length) {
		if (!radioSel) {
			msg = radioSelMsg;
			bool = true;
		}
	}
	vobject.each(function (i, v) {
		let vsrc = $(this).attr('src');
		if (vsrc != null) {
			data[$(this).attr("name")] = vsrc;
			return;
		}
	});
	console.log(data);
	return [bool, msg, data];
}

function emailValidate(mail) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
		return true;
	}
	return false;
}

function validURL(str) {
	var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	return !!pattern.test(str);
}

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

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(";");
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == " ") {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function uploadFile(allow, file, server = "local") {
	return new Promise(function (resolve, reject) {
		let ext = file.value.split(".").pop().toLowerCase();
		if ($.inArray(ext, allow) == -1) {
			error_message(
				"Please select a valid file, File type allow : " +
					allow.join(",")
			);
			resolve(0);
			return false;
		}
		let fileData = file.files[0];
		let size = Math.round(fileData.size / 1024);
		if (size >= 10240) {
			error_message(
				"Only 10MB file size is allowed to upload from here.<br/> If you need to upload bigger file, upload to your hosting drives directly.<br/> Then import the products from here.<br/> This is set to minimize load on server"
			);
			resolve(0);
			return false;
		}
		$(".rcs_progress_box").removeClass("hide");
		var form_data = new FormData();
		form_data.append("mediaFile", fileData);
		form_data.append("allowType", allow.join("|"));
		form_data.append("server", server);
		$(".rcs_preloader").removeClass("hide");
		let xhr = $.ajax({
			url: $default.base_url + "media/upload",
			type: "POST",
			headers: {
				Authorization: JSON.stringify({
					access_token: getCookie("rcsAccessToken"),
				}),
			},
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			xhr: function () {
				//upload Progress
				var xhr = $.ajaxSettings.xhr();
				if (xhr.upload) {
					xhr.upload.addEventListener(
						"progress",
						function (event) {
							//console.log(rand);
							if (event.lengthComputable) {
								$(uploadProgressCls).css(
									"width",
									(event.loaded / event.total) * 100 + "%"
								);
							} else {
								console.log(
									"Failed to compute file upload length"
								);
							}
						},
						true
					);
				}
				return xhr;
			},
			success: function (data) {
				var result = jQuery.parseJSON(data);
				$(".rcs_progress_box").addClass("hide");
				success_message(result.msg);
				if (result.status) {
					resolve({
						file_id: result.file_id,
						url: result.url,
						thumb: result.thumb,
						name: result.name,
					});
				} else {
					error_message(result.msg);
				}
				$(".rcs_preloader").addClass("hide");
			},
		});
	});
}

function getSelectedOptions(sel) {
	var opts = [],
		opt;

	// loop through options in select list
	for (var i = 0, len = sel.options.length; i < len; i++) {
		opt = sel.options[i];

		// check if selected
		if (opt.selected) {
			// add to array of option elements to return from this function
			opts.push(opt.value);
		}
	}

	// return array containing references to selected option elements
	return opts;
}

function convertURLtoEmbedCode(URL, width = 420, height = 345) {
	var pattern1 = /(?:http?s?:\/\/)?(?:www\.)?(?:vimeo\.com)\/?(.+)/g;
	var pattern2 = /(?:http?s?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g;
	var pattern3 = /([-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?(?:jpg|jpeg|gif|png))/gi;
	html = "";
	if (pattern1.test(URL)) {
		var replacement =
			'<iframe width="' +
			width +
			'" height="' +
			height +
			'" src="https://player.vimeo.com/video/$1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

		var html = URL.replace(pattern1, replacement);
	}

	if (pattern2.test(URL)) {
		var replacement =
			'<iframe width="' +
			width +
			'" height="' +
			height +
			'" src="https://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>';
		var html = URL.replace(pattern2, replacement);
	}

	if (pattern3.test(URL)) {
		var replacement =
			'<a href="$1" target="_blank"><img class="sml" src="$1" /></a><br />';
		var html = URL.replace(pattern3, replacement);
	}

	return html;
}

function getCaretPosition(editableDiv) {
	var caretPos = 0,
		sel,
		range;
	if (window.getSelection) {
		sel = window.getSelection();
		if (sel.rangeCount) {
			range = sel.getRangeAt(0);
			if (range.commonAncestorContainer.parentNode == editableDiv) {
				caretPos = range.endOffset;
			}
		}
	} else if (document.selection && document.selection.createRange) {
		range = document.selection.createRange();
		if (range.parentElement() == editableDiv) {
			var tempEl = document.createElement("span");
			editableDiv.insertBefore(tempEl, editableDiv.firstChild);
			var tempRange = range.duplicate();
			tempRange.moveToElementText(tempEl);
			tempRange.setEndPoint("EndToEnd", range);
			caretPos = tempRange.text.length;
		}
	}
	return { range: range, caretPos: caretPos };
}
function insertAtCaret(html) {
	setCurrentCursorPosition(CursorPostion.range, CursorPostion.caretPos);
	var sel, range;
	if (window.getSelection) {
		sel = window.getSelection();
		if (sel.getRangeAt && sel.rangeCount) {
			range = sel.getRangeAt(0);
			range.deleteContents();
			var el = document.createElement("div");
			el.innerHTML = html;
			var frag = document.createDocumentFragment(),
				node,
				lastNode;
			while ((node = el.firstChild)) {
				lastNode = frag.appendChild(node);
			}
			range.insertNode(frag);
			if (lastNode) {
				range = range.cloneRange();
				range.setStartAfter(lastNode);
				range.collapse(!0);
				sel.removeAllRanges();
				sel.addRange(range);
			}
		}
	} else if (document.selection && document.selection.type != "Control") {
		document.selection.createRange().pasteHTML(html);
	}
}
var SetCursorPostionEditor = function (e) {
	CursorPostion = getCaretPosition(this);
	CurrentMessageBoxId = $(this);
	var length =
		parseInt($(this).text().length) + parseInt($(this).find("img").length);
	var letter = $(this).data("letter");
	$(this)
		.next()
		.find(".rcs_char_count span")
		.text(length + "/" + letter);
};

var sanitizeText = function (value) {
	// smart quotes! (derived from https://github.com/kellym/smartquotesjs)
	var sanitizedText = value
		.trim()
		.replace(/'''/g, "\u2034") // triple prime
		.replace(/(\W|^)"(\S)/g, "$1\u201c$2") // beginning "
		.replace(/(\u201c[^"]*)"([^"]*$|[^\u201c"]*\u201c)/g, "$1\u201d$2") // ending "
		.replace(/([^0-9])"/g, "$1\u201d") // remaining " at end of word
		.replace(/''/g, "\u2033") // double prime
		.replace(/(\W|^)'(\S)/g, "$1\u2018$2") // beginning '
		.replace(/([a-z])'([a-z])/gi, "$1\u2019$2") // conjunction's possession
		.replace(/((\u2018[^']*)|[a-z])'([^0-9]|$)/gi, "$1\u2019$3") // ending '
		.replace(
			/(\u2018)([0-9]{2}[^\u2019]*)(\u2018([^0-9]|$)|$|\u2019[a-z])/gi,
			"\u2019$2$3"
		) // abbrev. years like '93
		.replace(
			/(\B|^)\u2018(?=([^\u2019]*\u2019\b)*([^\u2019\u2018]*\W[\u2019\u2018]\b|[^\u2019\u2018]*$))/gi,
			"$1\u2019"
		) // backwards apostrophe
		.replace(/'/g, "\u2032");

	// default text
	if (sanitizedText.length === 0) {
		sanitizedText = "Your text here";
	}

	return sanitizedText;
};

function setCurrentCursorPosition(range, chars) {
	if (chars >= 0) {
		var selection = window.getSelection();

		if (range) {
			range.collapse(false);
			selection.removeAllRanges();
			selection.addRange(range);
		}
	}
}

function copyToClipboard(element) {
	element.select();
	document.execCommand("copy");
}

function isEmpty(obj) {
	return Object.keys(obj).length === 0;
}

function paginate(totalItems, currentPage = 1, pageSize = 10, maxPages = 10) {
	// calculate total pages
	let totalPages = Math.ceil(totalItems / pageSize);

	// ensure current page isn't out of range
	if (currentPage < 1) {
		currentPage = 1;
	} else if (currentPage > totalPages) {
		currentPage = totalPages;
	}

	let startPage = 0,
		endPage = 0;
	if (totalPages <= maxPages) {
		// total pages less than max so show all pages
		startPage = 1;
		endPage = totalPages;
	} else {
		// total pages more than max so calculate start and end pages
		let maxPagesBeforeCurrentPage = Math.floor(maxPages / 2);
		let maxPagesAfterCurrentPage = Math.ceil(maxPages / 2) - 1;
		if (currentPage <= maxPagesBeforeCurrentPage) {
			// current page near the start
			startPage = 1;
			endPage = maxPages;
		} else if (currentPage + maxPagesAfterCurrentPage >= totalPages) {
			// current page near the end
			startPage = totalPages - maxPages + 1;
			endPage = totalPages;
		} else {
			// current page somewhere in the middle
			startPage = currentPage - maxPagesBeforeCurrentPage;
			endPage = currentPage + maxPagesAfterCurrentPage;
		}
	}

	// calculate start and end item indexes
	let startIndex = (currentPage - 1) * pageSize;
	let endIndex = Math.min(startIndex + pageSize - 1, totalItems - 1);

	// create an array of pages to ng-repeat in the pager control
	let pages = Array.from(Array(endPage + 1 - startPage).keys()).map(
		(i) => startPage + i
	);

	// return object with all pager properties required by the view
	return {
		totalItems: totalItems,
		currentPage: currentPage,
		pageSize: pageSize,
		totalPages: totalPages,
		startPage: startPage,
		endPage: endPage,
		startIndex: startIndex,
		endIndex: endIndex,
		pages: pages,
	};
}

const qs = (s) => document.querySelector(s);

HTMLElement.prototype.qs = function (s) {
	return this.querySelector(s);
};

const qsAll = (s) => document.querySelectorAll(s);

HTMLElement.prototype.qsAll = function (s) {
	return this.querySelectorAll(s);
};

function ajax_call(url, data, callback, error_callback = null, type = "post") {
	$(".rcs_preloader").removeClass("hide");
	$.ajax({
		headers: {
			Authorization: JSON.stringify({
				access_token: getCookie("rcsAccessToken"),
			}),
		},
		type: type,
		url: $default.base_url + url,
		data: data,
		success: function (response) {
			$(".rcs_preloader").addClass("hide");
			var result = jQuery.parseJSON(response);
			if (result.status) {
				if (callback) {
					callback(result);
				}
			} else {
				error_message(result.msg);
				if (error_callback != null) {
					error_callback(result);
				}
			}
		},
		error: function (result) {
			if (error_callback != null) {
				error_callback(result);
			}
		},
	}).fail((result) => {
		if (error_callback != null) {
			error_callback(result);
		}
	});
}

function randomString(length, chars) {
	var result = "";
	for (var i = length; i > 0; --i)
		result += chars[Math.floor(Math.random() * chars.length)];
	return result;
}

function postFormJS(path, params, method = "post") {
	// The rest of this code assumes you are not using a library.
	// It can be made less wordy if you use one.
	const form = document.createElement("form");
	form.method = method;
	form.action = path;

	for (const key in params) {
		if (params.hasOwnProperty(key)) {
			const hiddenField = document.createElement("input");
			hiddenField.type = "hidden";
			hiddenField.name = key;
			hiddenField.value = params[key];

			form.appendChild(hiddenField);
		}
	}

	document.body.appendChild(form);
	form.submit();
}

function openMediaWindow() {
	ajax_call("media/getImages", {}, function (result) {
		let images_box = qs(`.rcs_my_images`);
		images_box.innerHTML = "";
		let dp = new DOMParser();
		if (result.data.length == 0) {
			let html = `<div class="rcs_library_empty">
				<p>No images have been uploaded yet.</p>
			</div>`;
			let doc = dp.parseFromString(html, "text/html");
			images_box.append(doc.body.children[0]);
		} else {
			let html = ``;
			html += `<div class="rcs_uploaded_library"><div class="rcs_row rcs_my_images_files"></div></div>`;
			let doc = dp.parseFromString(html, "text/html");
			images_box.append(doc.body.children[0]);
			html = ``;
			result.data.forEach((r) => {
				html = `<div class="rcs_col rcs_col4">
					<div class="rcs_image_lib_box">
						<div class="rcs_select_image">
							<img src="${$default.base_url}${r.thumb}" alt="">
							<div class="rcs_image_lib_button" data-file="${r.file}" data-image_id="${r.m_id}">
								<a href="javascript:;" class="rcs_use_image">use</a>
								<a href="${$default.base_url}${r.file}" target="_blank" class="rcs_view_image rcs_img_view">view</a>
								<a href="javascript:;" class="rcs_delete_image">delete</a>
							</div>
						</div>
						<p>${r.name}</p>
					</div>
				</div>`;
				let doc = dp.parseFromString(html, "text/html");
				qs(`.rcs_my_images_files`).append(doc.body.children[0]);
			});
		}
		$('.rcs_view_image').magnificPopup({
			type: 'image'
		});
	});
}