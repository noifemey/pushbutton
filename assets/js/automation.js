class AutomationHTML {
	createNode(html) {
		let dp = new DOMParser();
		let doc = dp.parseFromString(html, "text/html");
		return doc.body.children[0];
	}

	noArticleSchedule() {
		let html = ``;
		html += `<div class="rcs_empty_box_wrapper">
            <div class="rcs_content_box rcs_empty_box">
                <div class="rcs_white_box">
                    <div class="rcs_empty_box_img">
                        <img src="${$default.base_url}assets/images/empty_box.png" alt="empty box">
                    </div>
                    <div class="rcs_empty_box_txt">
                        <h3>Not any article is created yet</h3>
                        <p>There are not any articles are available for this website. If you want to create an article then click button below.</p>
                        <div class="rcs_input_field">
                            <a href="javascript:;" class="rcs_btn rcs_create_article_schedule"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>CREATE a post</a>
                            <a href="javascript:;" class="rcs_btn rcs_create_emails_schedule"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Follow Up Emails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
		return this.createNode(html);
	}

	articleSchedule(art) {
		let html = ``;
		html += `<div class="rcs_col rcs_full_col">
			<div class="rcs_custom_checkbox">
				<label>
					<input type="checkbox" value="${art.a_id}" class="${art.classInput}">
				</label>
			</div>
			<div class="rcs_step_article_data ${art.class}" data-article_id="${art.a_id}">
				<h3>${art.title}</h3>
				<p>${art.content}</p>
			</div>
		</div>`;
		return this.createNode(html);
	}

	userArticleSchedule(ua) {
		let html = ``;
		html += `<div class="rcs_content_box rcs_dashboard_box">
			<div class="rcs_table_head">
				<h2>${ua.site_name} - Articles</h2>
				<div>
				<a href="javascript:;" class="rcs_btn rcs_create_article_schedule"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>CREATE a post</a>
				<a href="javascript:;" class="rcs_btn rcs_create_emails_schedule"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15.97" height="16" viewBox="0 0 15.97 16"><path d="M7.191,5.011 C7.195,4.534 7.443,4.234 7.856,4.178 C8.350,4.110 8.734,4.434 8.746,4.959 C8.761,5.590 8.763,6.221 8.746,6.852 C8.739,7.133 8.827,7.226 9.110,7.217 C9.716,7.198 10.323,7.208 10.929,7.214 C11.465,7.220 11.799,7.528 11.796,8.000 C11.793,8.470 11.460,8.770 10.918,8.776 C10.360,8.782 9.801,8.777 9.241,8.778 C8.751,8.778 8.751,8.778 8.751,9.286 C8.751,9.774 8.751,10.263 8.751,10.751 C8.750,11.478 8.487,11.838 7.961,11.831 C7.437,11.824 7.189,11.471 7.188,10.733 C7.188,10.209 7.173,9.685 7.193,9.161 C7.203,8.873 7.122,8.761 6.817,8.772 C6.223,8.793 5.628,8.781 5.033,8.776 C4.474,8.771 4.137,8.462 4.148,7.976 C4.158,7.509 4.493,7.217 5.037,7.214 C5.736,7.209 6.435,7.213 7.189,7.213 C7.189,6.437 7.184,5.724 7.191,5.011 ZM15.897,8.953 C15.814,9.357 15.475,9.608 15.068,9.578 C14.682,9.549 14.370,9.218 14.365,8.811 C14.362,8.598 14.388,8.384 14.395,8.277 C14.453,4.555 11.658,1.612 8.121,1.562 C5.001,1.518 2.309,3.642 1.690,6.636 C1.046,9.748 2.638,12.791 5.583,13.973 C7.510,14.746 9.401,14.574 11.214,13.562 C11.287,13.522 11.355,13.473 11.428,13.434 C11.842,13.212 12.281,13.325 12.511,13.711 C12.728,14.077 12.624,14.521 12.237,14.768 C11.281,15.378 10.238,15.762 9.116,15.919 C5.261,16.461 1.652,14.233 0.391,10.540 C-1.239,5.764 2.015,0.615 7.019,0.054 C12.024,-0.508 16.227,3.461 15.953,8.492 C15.944,8.646 15.928,8.802 15.897,8.953 Z" fill="#ffffff"></path></svg>Follow Up Emails</a>
				</div> 
			</div>
			<div class="rcs_table">
				<table id="rcs_site_schedule_articles">
					<thead>
						<tr>
							<th>#</th>
							<th>Article Name</th>
							<th>Scheduled</th>
							<th>Schedule Date</th>
							<th>Schedule Time UTC</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>					

					</tbody>					
				</table>
			</div>
			<div class="rcs_table_footer hide">
				<div class="rcs_article_load_more">
					<a href="javascript:;" class="rcs_btn rcs_yellow_btn rcs_schedule_article_load_more">Load More</a>
				</div>
			</div>
		</div>`;
		return this.createNode(html);
	}

	userArticleScheduleRow(ua) {
		let html = ``;
		html += `<table><tbody><tr>
			<td>${ua.sno}</td>
			<td>${ua.article_title}</td>
			<td>${ua.status ? "No" : "Yes"}</td>
			<td>${ua.schedule_date}</td>
			<td>${ua.schedule_time}</td>
			<td>
				<div class="rcs_table_action">
					<a href="javascript:;" class="rcs_tooltip rcs_popup_btn rcs_edit_schedule_article" data-main_popup="rcs_articleList_popup" data-open_popup="rcs_popup_open" data-article_id="${
						ua.ssa_id
					}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="14" viewBox="0 0 14 14"><path d="M13.627,4.076 L12.450,5.243 C12.388,5.304 12.307,5.335 12.226,5.335 C12.144,5.335 12.063,5.304 12.001,5.242 L8.752,1.992 C8.628,1.868 8.628,1.667 8.751,1.542 L9.917,0.365 C10.400,-0.118 11.237,-0.117 11.718,0.364 L13.627,2.275 C13.867,2.515 14.000,2.835 14.000,3.175 C14.000,3.515 13.867,3.835 13.627,4.076 ZM9.570,3.842 C9.570,3.926 9.536,4.007 9.477,4.067 L3.425,10.122 C3.365,10.183 3.283,10.216 3.200,10.216 C3.183,10.216 3.166,10.214 3.149,10.212 C3.048,10.195 2.961,10.131 2.915,10.040 L2.666,9.543 L1.830,9.543 L1.395,11.066 L2.932,12.603 L4.454,12.168 L4.454,11.331 L3.957,11.083 C3.866,11.037 3.802,10.950 3.785,10.849 C3.769,10.748 3.802,10.645 3.875,10.573 L9.927,4.517 C10.046,4.398 10.257,4.398 10.376,4.517 L11.547,5.688 C11.607,5.748 11.640,5.829 11.640,5.914 C11.640,5.999 11.606,6.080 11.546,6.139 L4.996,12.634 C4.992,12.638 4.987,12.639 4.983,12.643 C4.967,12.657 4.949,12.666 4.931,12.677 C4.913,12.688 4.895,12.699 4.875,12.706 C4.869,12.708 4.865,12.712 4.860,12.714 L2.927,13.267 L0.405,13.988 C0.376,13.996 0.347,14.000 0.318,14.000 C0.234,14.000 0.153,13.967 0.093,13.907 C0.011,13.825 -0.020,13.705 0.012,13.594 L0.732,11.071 L1.285,9.137 C1.299,9.087 1.326,9.047 1.359,9.011 C1.362,9.008 1.361,9.003 1.365,9.000 L7.856,2.447 C7.915,2.387 7.996,2.353 8.081,2.353 L8.081,2.353 C8.166,2.353 8.247,2.386 8.306,2.446 L9.477,3.617 C9.536,3.676 9.570,3.757 9.570,3.842 Z" fill="#7a8ebe"/></svg><span class="rcs_tooltip_text">Edit</span> </a>
					<a href="javascript:;" class="rcs_tooltip rcs_delete_schedule_article" data-schedule_article_id="${
						ua.ssa_id
					}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="10" height="14" viewBox="0 0 10 14"><path d="M9.842,3.688 C9.794,3.722 9.736,3.742 9.673,3.742 L0.334,3.742 C0.271,3.742 0.214,3.722 0.165,3.688 C0.046,3.607 -0.018,3.443 0.031,3.283 L0.286,2.451 C0.352,2.232 0.541,2.084 0.752,2.084 L9.255,2.084 C9.467,2.084 9.655,2.232 9.722,2.451 L9.976,3.283 C10.025,3.443 9.961,3.607 9.842,3.688 ZM6.076,0.845 L3.932,0.845 L3.932,1.239 L3.158,1.239 L3.158,0.790 C3.158,0.354 3.482,-0.000 3.881,-0.000 L6.126,-0.000 C6.525,-0.000 6.850,0.354 6.850,0.790 L6.850,1.239 L6.076,1.239 L6.076,0.845 ZM1.370,4.587 L8.637,4.587 C8.837,4.587 8.993,4.772 8.977,4.989 L8.370,13.189 C8.336,13.647 7.986,14.000 7.566,14.000 L2.442,14.000 C2.021,14.000 1.672,13.647 1.638,13.189 L1.030,4.989 C1.014,4.772 1.171,4.587 1.370,4.587 ZM6.896,13.125 C6.904,13.126 6.912,13.126 6.919,13.126 C7.123,13.126 7.293,12.953 7.305,12.728 L7.669,5.996 C7.681,5.763 7.518,5.563 7.305,5.549 C7.091,5.536 6.908,5.713 6.896,5.946 L6.532,12.679 C6.520,12.912 6.683,13.111 6.896,13.125 ZM4.621,12.703 C4.621,12.937 4.794,13.126 5.008,13.126 C5.222,13.126 5.395,12.937 5.395,12.703 L5.395,5.971 C5.395,5.738 5.222,5.549 5.008,5.549 C4.794,5.549 4.621,5.738 4.621,5.971 L4.621,12.703 ZM2.720,12.729 C2.732,12.953 2.903,13.126 3.105,13.126 C3.113,13.126 3.122,13.126 3.130,13.125 C3.343,13.111 3.505,12.910 3.492,12.677 L3.112,5.945 C3.099,5.712 2.914,5.535 2.701,5.549 C2.488,5.564 2.326,5.764 2.339,5.997 L2.720,12.729 Z" fill="#7a8ebe"/></svg><span class="rcs_tooltip_text">Delete</span> </a>
				</div>
			</td>
		</tr></tbody></table>`;
		let dp = new DOMParser();
		let doc = dp.parseFromString(html, "text/html");
		return doc.body.qs("tr");
	}
}

let ah = new AutomationHTML();

class Automation {
	constructor(args) {
		let self = this;
		if (args.site_id) {
			self.site_id = args.site_id;
			self.category_name = args.ezine_cat_name;
			self.category_id = args.category_id;
			self.storeArticle = args.storeArticle;
			self.npage = 1;
			self.fpage = 1;
			self.normalArticles = [];
			self.featuredArticles = [];
			self.automation = args.automation;
			self.getAllArticles("normal");
			self.getAllArticles("featured");
		}
		this.addArticle = qs("#rcsAddArticle");
		self.scheduleArticle = [];
		this.createEvent();
	}
	createEvent() {

		let self = this;

		if (self.addArticle) {

			self.addArticle.addEventListener("submit", function (e) {
				
				alert("2");

				e.preventDefault();
				let valid = valid_fields($(this)[0]);
				if (valid[0]) {
					error_message(valid[1]);
					return false;
				}
				let data = {};
				if (self.site_id) {
					data = {
						site_id: self.site_id,
						article_id: this.elements["article_id"].value,
						title: this.elements["title"].value,
						content: editor.getData(),
						date: this.elements["date"].value,
						time: this.elements["time"].value,
					};
				} else {
					data = {
						schedule_article_id: this.elements[
							"schedule_article_id"
						].value,
						title: this.elements["title"].value,
						content: editor.getData(),
						date: this.elements["date"].value,
						time: this.elements["time"].value,
					};
				}
				if (this.elements["share_facebook"]) {
					if (
						this.elements["share_facebook"].checked &&
						this.elements["facebook_page_id"].value == ""
					) {
						error_message("Please select facebook page.");
						return false;
					}
					data["facebook"] = this.elements["share_facebook"].checked
						? 1
						: 0;
					data["facebook_page_id"] = this.elements[
						"facebook_page_id"
					].value;
				}
				if (editor.getData() == "") {
					error_message("Article Content is required.");
					return false;
				}
				let url = "ajax/setScheduleArticle";
				
				ajax_call(url, data, function (result) {
					success_message(result.msg);
					if (self.site_id) {
						self.addArticle.reset();
						qs(".rcs_popup_cross").click();
						/*self.storeArticle.push(data.article_id);
						qs(
							`[data-article_id="${data.article_id}"]`
						).classList.remove("rcs_popup_btn");
						qs(
							`[data-article_id="${data.article_id}"]`
						).classList.remove("rcs_get_featured_article");
						qs(
							`[data-article_id="${data.article_id}"]`
						).classList.remove("rcs_get_normal_article");
						qs(
							`[data-article_id="${data.article_id}"]`
						).classList.add("rcs_already_scheduled");*/

						setTimeout(() => {
							window.location.href =
								$default.base_url + "user/automation";
						}, 600);
					} else {
						setTimeout(() => {
							window.location.reload();
						}, 600);
					}
				});
			});
		}

		$(document).on("change", ".rcs_selected_list", function () {
			if ($(this).val() != "") {
				$(".rcs_selected_autoresponder").removeClass("hide");
			}
		});
		$(document).on("click", ".rcs_get_email_data", function () {
			let id = $(this).data("id");
			scheduleEmails.forEach((p) => {
				if (p.sse_id == id) {
					let content =
					"<p>" +
						p.content.replaceAll("\r\n", "</p><br><p>") +
						"</p>";
						content = content.replaceAll("<p></p>", "");
					$(".rcs_mailing_subject").text('Subject :- ' + p.subject);
					$(".rcs_mailing_content").html('Content :- ' + content);
					let f = qs("#rcs_edit_email");
					f.elements["email_subject"].value = p.subject;
					f.elements["email_content"].value = p.content;
					f.elements["sse_id"].value = p.sse_id;
				}
			});
		});
		$(document).on("submit", "#rcs_edit_email", function (e) {
			e.preventDefault();
			let id = $(this)[0].elements["sse_id"].value;
			let subject = $(this)[0].elements["email_subject"].value;
			let content = $(this)[0].elements["email_content"].value;
			let i = 0;
			scheduleEmails.forEach((p) => {
				if (p.sse_id == id) {
					scheduleEmails[i].subject = subject;
					scheduleEmails[i].content = content;
					$(`.rcs_get_email_data[data-id="${id}"]`)
						.find("h5")
						.text(subject);
					$(`.rcs_get_email_data[data-id="${id}"]`)
						.find("p")
						.text(content.substr(0, content.lastIndexOf(" ", 97)));
					content =
						"<p>" +
						content.replaceAll("\n", "</p><br><p>") +
						"</p>";
					content = content.replaceAll("<p></p>", "");
					$(".rcs_mailing_subject").text(subject);
					$(".rcs_mailing_content").html(content);
				}
				i++;
			});
			success_message("Email Content saved.");
			$(this)[0]
				.closest(".rcs_popup_wrapper")
				.qs(".rcs_popup_cross")
				.click();
		});

		$(document).on("change", ".rcs_facebook_share__", function (e) {
			e.preventDefault();
			let t = $(this)[0];
			if (t.checked) {
				$(".rcs_facebook_pages__").removeClass("hide");
			} else {
				$(".rcs_facebook_pages__").addClass("hide");
			}
		});

		$(document).on("click", ".rcs_edit_schedule_article", function (e) {
			e.preventDefault();
			let t = $(this)[0];
			let s = t.getAttribute("data-article_id");
			self.scheduleArticle.forEach((n) => {
				if (n.ssa_id == s) {
					let date = new Date(n.schedule_date);
					let MM =
						(date.getMonth() + 1 < 10 ? "0" : "") +
						(date.getMonth() + 1);
					let DD = (date.getDate() < 10 ? "0" : "") + date.getDate();
					let s_date = date.getFullYear() + "-" + MM + "-" + DD;
					let time = n.schedule_time;
					let hours = Number(time.match(/^(\d+)/)[1]);
					let minutes = Number(time.match(/:(\d+)/)[1]);
					let AMPM = time.match(/\s(.*)$/)[1];
					if (AMPM == "PM" && hours < 12) hours = hours + 12;
					if (AMPM == "AM" && hours == 12) hours = hours - 12;
					let sHours = hours.toString();
					let sMinutes = minutes.toString();
					if (hours < 10) sHours = "0" + sHours;
					if (minutes < 10) sMinutes = "0" + sMinutes;
					let a = qs("#rcsAddArticle");
					a.elements["schedule_article_id"].value = n.ssa_id;
					a.elements["title"].value = n.article_title;
					// a.elements["image_url"].value = n.file;
					CKEDITOR.instances["editor"].setData(n.article_content);
					a.elements["date"].value = s_date;
					a.elements["time"].value = sHours + ":" + sMinutes;
					if (n.share_facebook == 0) {
						return false;
					}
					if (parseInt(n.share_facebook)) {
						$(".rcs_facebook_pages__").removeClass("hide");
						a.elements["share_facebook"].checked = true;
						$(".rcs_facebook_pages__")
							.find("select")
							.val(n.facebook_page_id);
						$("select").select2().trigger("change");
					} else {
						a.elements["share_facebook"].checked = false;
						$(".rcs_facebook_pages__").addClass("hide");
					}
					editor.setData(n.article_content);
					return;
				}
			});
		});

		$(document).on("change", ".rcs_automation_site", function (e) {
			let s = $(this).val();
			let url = "ajax/getScheduleSiteArticles";
			ajax_call(url, { site_id: s }, function (result) {
				$(".rcs_site_name").html("");
				$("#autoresponder_mailign_ligt").html("");
				$("#autoresponse_mailing_list").html("");
				$(".rcs_mail_list").html("");
				$(".rcs_schedule_time").html("");

				let ssb = qs(`#rcs_site_schedule_box`);
				ssb.innerHTML = "";

				if (result.schedule_articles.length) {
					let ssa = qs(`#rcs_site_schedule_articles`);
					if (!ssa) {
						let d = ah.userArticleSchedule({
							site_name: result.site[0].site_name,
						});
						ssb.append(d);
						ssa = qs(`#rcs_site_schedule_articles`);
					}
					let i = 1;
					result.schedule_articles.forEach((sa) => {
						self.scheduleArticle.push(sa);
						sa.sno = i++;
						let d = ah.userArticleScheduleRow(sa);
						ssa.tBodies[0].append(d);
					});
					if (result.checkMailschedule.length > 0) {
						$(".rcs_create_emails_schedule").addClass("hide");
						$(".rcs_mail_schedule_box").removeClass("hide");
						let scheduleMailData = result.checkMailschedule[0];
						let automailList = result.automailList;

						let site_name = result.site[0].site_name;
						$(".rcs_site_name").append(
							"Schedule Emails - " + site_name
						);

						let autoresponderOptions = "";
						autoresponderOptions +=
							'<option value="' +
							scheduleMailData.autoresponder_name +
							'">' +
							scheduleMailData.autoresponder_name +
							"</option>";
						$("#autoresponder_mailign_ligt").append(
							autoresponderOptions
						);

						let autoresponseOptions = "";
						autoresponseOptions +=
							'<option value="' +
							automailList.list_value +
							'">' +
							automailList.list_name +
							"</option>";
						$("#autoresponse_mailing_list").append(
							autoresponseOptions
						);

						let emailData = result.emailData;
						let mailList = "";
						emailData.forEach((element) => {
							mailList +=
								'<div class="rcs_article_box rcs_popup_btn rcs_get_email_data">' +
								"<h5>" +
								element.subject +
								"</h5>" +
								"<p>" +
								element.content +
								"</p>" +
								"</div>";
						});
						$(".rcs_mail_list").append(mailList);
						$(".rcs_schedule_time").val(
							scheduleMailData.schedule_interval
						);
					} else {
						$(".rcs_mail_schedule_box").addClass("hide");
					}
				} else {
					$(".rcs_mail_schedule_box").addClass("hide");
					let no = ah.noArticleSchedule();
					ssb.append(no);
				}
			});
		});

		$(document).on("click", ".rcs_get_featured_article", function () {
			let t = $(this)[0];
			let s = t.getAttribute("data-article_id");
			self.featuredArticles.forEach((n) => {
				if (n.a_id == s) {
					let a = qs("#rcsAddArticle");
					a.elements["title"].value = n.title;
					// a.elements["image_id"].value = n.m_id;
					// a.elements["image_url"].value = n.file;
					a.elements["article_id"].value = n.a_id;
					editor.setData(n.content);
					return;
				}
			});
		});

		$(document).on("click", ".rcs_get_normal_article", function () {
			let t = $(this)[0];
			let s = t.getAttribute("data-article_id");
			self.normalArticles.forEach((n) => {
				if (n.a_id == s) {
					let a = qs("#rcsAddArticle");
					a.elements["title"].value = n.title;
					a.elements["article_id"].value = n.a_id;
					editor.setData( editor.getData() + '<p>' + n.content + '</p>');
					return;
				}
			});
		});

		$(document).on("click", ".rcs_featuredarticle_schedule_btn", function () {
			let id = [];
			qsAll('.rcs_get_article_id__f').forEach(p=>{
				if(p.checked){
					id.push(p.value);
				}
			});
			let editor_data = '';
			self.featuredArticles.forEach((n) => {
				if (id.indexOf(n.a_id) != -1) {
					if (self.automation) {
						let a = qs("#rcsAddArticle");
						a.elements["title"].value = n.title;
						// a.elements["image_id"].value = n.m_id;
						// a.elements["image_url"].value = n.file;
						a.elements["article_id"].value = n.a_id;
						editor_data += '<p>' + n.content + '</p>\n\n';
					}else{
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
	
						$(".rcs_featured_image").html(img);
						editor_data += '<p>' + n.content + '</p>\n\n';
					}
				}
			});
			if (self.automation) {
				editor.setData( editor_data );
				qs('.rcs_articleList_popup').classList.add('rcs_popup_open');
			}else{
				CKEDITOR.instances["editor"].setData(editor_data);
				$(".rcs_select_article_popup").removeClass("rcs_popup_open");
				$(".rcs_col.rcs_full_col").removeClass("hide");
			}
		});

		$(document).on("click", ".rcs_normalarticle_schedule_btn", function () {
			let id = [];
			qsAll('.rcs_get_article_id__n').forEach(p=>{
				if(p.checked){
					id.push(p.value);
				}
			});
			let editor_data = '';
			self.normalArticles.forEach((n) => {
				if (id.indexOf(n.a_id) != -1) {
					if (self.automation) {
						let a = qs("#rcsAddArticle");
						a.elements["title"].value = n.title;
						a.elements["article_id"].value = n.a_id;
						editor_data += '<p>' + n.content + '</p>\n\n';
					}else{
						let a = ".rcs_article_feild";

						$(a).find('input[name="title"]').val(n.title);
	
						editor_data += '<p>' + n.content + '</p>\n\n';
						$(".rcs_selected_image").html("");
					}
				}
			});
			if (self.automation) {
				editor.setData( editor_data );
				qs('.rcs_articleList_popup').classList.add('rcs_popup_open');
			}else{
				$("#rcsPopUpSelectContent").text('Back')
				CKEDITOR.instances["editor"].setData(editor_data);
				$(".rcs_select_article_popup").removeClass("rcs_popup_open");
				$(".rcs_col.rcs_full_col").removeClass("hide");
			}
		});

		$(document).on("click", ".rcs_newarticle_schedule_btn", function () {
			let editor_data = '';
			let newarticlecheckbox = $('.newarticlecheckbox').val();
			let checkNew = $('input[class=newarticlecheckbox]:checked');
			// console.log(checkNew.val());
			let content_new = document.getElementById('content_new_' + checkNew.val()).innerHTML;
			let title_new = document.getElementById('title_new_' + checkNew.val()).innerHTML;
			let trim_title_new = $.trim(title_new);
			editor_data += content_new;
			// console.log(trim_title_new);
			CKEDITOR.instances["editor"].setData(editor_data);
			$("input[name='title']").val(trim_title_new);
			$(".rcs_select_article_popup").removeClass("rcs_popup_open");
			$(".rcs_col.rcs_full_col").removeClass("hide");
			$("#rcsPopUpSelectContent").text('Back')
		});

		$(document).on("click", ".rcs_delete_schedule_article", function () {
			let t = $(this)[0];
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					let s = t.getAttribute("data-schedule_article_id");
					let url = "ajax/deleteScheduleArticle";
					ajax_call(
						url,
						{ schedule_article_id: s },
						function (result) {
							success_message(result.msg);
							let i = 0;
							let ut = t.closest("tbody").qsAll("tr");
							t.closest("tr").remove();
							ut.forEach((tr) => {
								tr.qs("td").textContent = i;
								i++;
							});
						}
					);
				}
			});
		});

		document.addEventListener("click", function (e) {
			let t = e.target;
			if (t.classList.contains("rcs_create_article_schedule")) {
				let s = $(".rcs_automation_site").val();
				window.location.href = $default.base_url + "user/schedule/" + s;
				return;
			}
			if (t.classList.contains("rcs_create_emails_schedule")) {
				let s = $(".rcs_automation_site").val();
				window.location.href =
					$default.base_url + "user/schedule-emails/" + s;
				return;
			}
			if (t.classList.contains("rcs_featuredarticle_load_more")) {
				self.getAllArticles("featured");
				return;
			}
			if (t.classList.contains("rcs_normalarticle_load_more")) {
				self.getAllArticles("normal");
				return;
			}
		});
		document.addEventListener("change", function (e) {
			let t = e.target;
		});
	}
	getAllArticles(action) {
		let self = this;
		if (action == "normal") {
			if (!self.npage) return;
			if (!qs("#rcs_normal_article .rcs_row")) return;
			let url = "ajax/getEzineArticles";
			let data = { page: self.npage, category_name: self.category_name };
			ajax_call(url, data, function (result) {
				let ssb = qs("#rcs_normal_article .rcs_row");
				let a = JSON.parse(result.articles);
				if (a.articles.length) {
					self.npage++;
					a.articles.forEach((element) => {
						let b = {};
						b.a_id = element.article.id;
						b.title = element.article.title;
						b.content = element.article.summary;
						b.classInput = 'rcs_get_article_id__n';
						b.class = '';
						/*if (self.automation) {
							if (
								self.storeArticle.indexOf(element.article.id) ==
								-1
							) {
								b.class =
									"rcs_popup_btn rcs_get_normal_article";
							} else {
								b.class = "rcs_already_scheduled";
							}
						} else {
							b.class = "rcs_set_article";
						}*/
						let g = ah.articleSchedule(b);
						ssb.append(g);
						self.normalArticles.push(b);
					});
				} else {
					self.npage = 0;
					qs(".rcs_normalarticle_load_more").classList.add("hide");
				}
			});
		}
		if (action == "featured") {
			if (!self.fpage) return;
			if (!qs("#rcs_featured_article .rcs_row")) return;
			let url = "ajax/getAdminArticles";
			let data = { page: self.fpage, category_id: self.category_id };
			ajax_call(url, data, function (result) {
				if (result.articles.length) {
					let ssb = qs("#rcs_featured_article .rcs_row");
					result.articles.forEach((element) => {
						/*if (self.automation) {
							if (self.storeArticle.indexOf(element.a_id) == -1) {
								element.class =
								"rcs_popup_btn rcs_get_featured_article";
							} else {
								element.class = "rcs_already_scheduled";
							}
						} else {
							element.class = "rcs_set_article";
						}*/
						element.classInput = 'rcs_get_article_id__f';
						element.class = '';
						let g = ah.articleSchedule(element);
						ssb.append(g);
						self.featuredArticles.push(element);
					});
					self.fpage++;
				} else {
					self.fpage = 0;
					qs(".rcs_featuredarticle_load_more").classList.add("hide");
				}
			});
		}
	}
}
function copy_data(containerid) {
	var range = document.createRange();
	range.selectNode(containerid); //changed here
	window.getSelection().removeAllRanges(); 
	window.getSelection().addRange(range); 
	document.execCommand("copy");
	window.getSelection().removeAllRanges();
	// alert("data copied");
	success_message("Email copied successfully.");
  }
