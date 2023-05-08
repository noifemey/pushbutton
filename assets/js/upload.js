$(document).ready(function () {
	
	
	$('#upload_source').on('change', function(){
		if( document.getElementById("upload_source").files.length == 0 ){
		} else {
			
			var myFormData = new FormData();
			myFormData.append('upload_source', $('[name="upload_source"]')[0].files[0]);
			myFormData.append('sa_id', $('[name="sa_id"]').val());
			
			$('.publish').attr('disabled', true);
			
			$.ajax({
				type: "POST",
				url: $default.base_url + 'FileUpload/uploadVideo',
				processData: false,
				contentType: false,
				dataType : 'json',
				data: myFormData,
				success: function(data)
				{
					
					$('.publish').attr('disabled', false);
				},
				error: function(data){
					
				}
			});
		}
	});
	
	$(document).on("submit", "#rcs_create_site_article_form", function (e) {
		// e.preventDefault();
		// if( document.getElementById("upload_source").files.length == 0 ){
			// console.log("");
		// } else {
			// var myFormData = new FormData();
			// myFormData.append('upload_source', $('[name="upload_source"]')[0].files[0]);
			// myFormData.append('art_id', $('#art_id').val());
			// myFormData.append('sa_id', $('[name="upload_source"]').val());
			
			// $.ajax({
				// type: "POST",
				// url: $default.base_url + 'FileUpload/uploadVideo',
				// processData: false,
				// contentType: false,
				// dataType : 'json',
				// data: myFormData,
				// success: function(data)
				// {
				   
				// },
				// error: function(data){
					
				// }
			// });
		// }
	});
	
	
});