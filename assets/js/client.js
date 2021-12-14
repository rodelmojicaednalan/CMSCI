$(document).ready(function(evt){
	$.ajax({
			url : '/admin/login_check/',
			type : 'POST',
			data : '',
			dataType: 'json',
			async: false,
			success : function(data) {
					if(data.logged_in == 1 && _get("page_id") == undefined && _get("event_id") == undefined){
						$('div.froala-container')
							.froalaEditor({
								key: '6F6F5F4E3bA2B6C4A3F4B2D2C3H2E1uhdcg1gH-9iI1C-22ve1==',
								toolbarInline: true,
								toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineClass', 'inlineStyle', 'paragraphStyle', 'lineHeight', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertTable', '|', 'fontAwesome', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'spellChecker', 'help', 'html', '|', 'undo', 'redo'],
								saveInterval: 2500,
								saveParam: 'content',
								saveURL: '/admin/page_inline_save',
								saveMethod: 'POST',
								saveParams: {page_id: $('#hid_page_id').val()},
								// Set the image upload parameter.
				        imageUploadParam: 'file',
				        // Set the image upload URL.
				        imageUploadURL: '/admin/upload_file',
				        // Set request type.
				        imageUploadMethod: 'POST',

				        // Set max image size to 5MB.
				        imageMaxSize: 5 * 1024 * 1024,

				        // Allow to upload PNG and JPG.
				        imageAllowedTypes: ['jpeg', 'jpg', 'png']
							})
							.on('froalaEditor.save.before', function (e, editor) {
								// Before save request is made.
								var newOpts = {saveParams: {container_id: e.target.id, page_id: $('#hid_page_id').val()}}
								$.extend(editor.opts, newOpts)
							})
							.on('froalaEditor.save.after', function (e, editor, response) {
								// After successfully save request.
								var myArray = jQuery.parseJSON(response);
								if(myArray['success'] == 1){
										$('#hid_page_id').val(myArray['page_id']);

										if($.trim(myArray['alias']) != '')
												window.history.pushState("", "", '/'+myArray['alias']);

										var preview_page = '/?page_id='+myArray['page_id'];
										$(".page-preview").attr("onclick","window.open('"+preview_page+"', '_blank')");

										shownotif('success', 'Changes automatically saved.', 'topCenter');
								}
								else
										shownotif('error', 'Error saving page content');
							})
							.on('froalaEditor.save.error', function (e, editor, error) {
								// Do something here.
							})
							.on('froalaEditor.image.error', function (e, editor, error, response) {
								console.log(error.code);
								// Bad link.
				        if (error.code == 1) {  }

				        // No link in upload response.
				        else if (error.code == 2) {  }

				        // Error during image upload.
				        else if (error.code == 3) {  }

				        // Parsing response failed.
				        else if (error.code == 4) {  }

				        // Image too text-large.
				        else if (error.code == 5) {  }

				        // Invalid image type.
				        else if (error.code == 6) {  }

				        // Image can be uploaded only to same domain in IE 8 and IE 9.
				        else if (error.code == 7) {  }

				        // Response contains the original server response to the request if available.
				      });
					}
			}
	});


	$(document).on('click', '.publish-page', function(e){
			e.preventDefault();

			var page_id = $('#hid_page_id').val();

			$.ajax({
					url : '/admin/page_publish/',
					type : 'POST',
					data : 'page_id='+page_id,
					dataType: 'json',
					async: false,
					success : function(data) {
							if(data.success == 1){
									shownotif('success', 'Page Published.');

									setTimeout(function(){ window.location = '/'+data.url_alias; }, 2000);
							}
							else
									shownotif('error', 'Error publishing page.');
					}
			});
	});



	jsSocials.shares.tumblr = {
		label: "Share",
		logo: "fa fa-tumblr",
		shareUrl: "http://www.tumblr.com/share/link?url={url}",
		countUrl: "",
		getCount: function(data) {
			return data.response.blog.likes;
		}
	};

	$("#share-blog").jsSocials({
		shares: [
				{ share: "facebook", logo: "fab fa-facebook-f", css: "icons-sm fb-ic p-2"},
				{ share: "twitter", logo: "fab fa-twitter", css: "icons-sm tw-ic p-2"},
				{ share: "linkedin", logo: "fab fa-linkedin-in" , css: "icons-sm li-ic p-2"},
				{ share: "pinterest", logo: "fab fa-pinterest-square", css: "icons-sm li-ic p-2"},
				{ share: "tumblr", logo: "fab fa-tumblr-square", css: "icons-sm fb-ic p-2"},
				{ share: "googleplus", logo: "far fa-envelope", css: "icons-sm fb-ic p-2"},
			],

		url: window.location.href,
		showLabel: false,
		showCount: false,
	});

	$('.jssocials-share-link').css('color', '#FF7622');


	$('#frmRegistration').on('submit', function(e){
			e.preventDefault();
			var form = $(this);

			//check if password the same with confirm password
			if($('#password1').val() != $('#confirm-password').val()){
					shownotif('error', 'Password and confirm password does not match.');
					$('#password1').focus();
					return false;
			}

			var user_id = 0;
			if($('input[name="id"]').length)
					user_id = $('input[name="id"]').val();

			//check username and email already exists
			$.ajax({
					url : '/member/checkUserExist',
					type : 'POST',
					data : 'user_email='+$('input[name="user_email"]').val()+'&user_name='+$('input[name="user_name"]').val()+'&id='+user_id,
					dataType: 'json',
					async: false,
					success : function(data) {
							if(data.exist >= 1){
									shownotif('error', data.check+' already exists.');

									if(data.check == 'email address')
											$('input[name="user_email"]').focus();
									if(data.check == 'user name')
											$('input[name="user_name"]').focus();

									return false;
							}else{
									$.ajax({
											url : '/member/register',
											type : 'POST',
											data : form.serialize()+'&state='+$('select[name="state"]').val(),
											dataType: 'json',
											async: false,
											success : function(data) {
													if($('input[name="id"]').length){
														shownotif('success', 'You have successfully saved your profile settings.');
														setTimeout(function(){ window.location = '/edit-profile'; }, 2000);
													}else{
														shownotif('success', 'You have successfully registered to our community. You can now login using your registered email and password.');
														$('#frmRegistration')[0].reset();
														setTimeout(function(){ window.location = '/'; }, 3000);
													}
											}
									});
							}
					}
			});
	});

	$('#cancel_registration').on('click', function(e){
			window.location = '/';
	});

	if($('#inputState').length && $('#hidstate').length && $.trim($('#hidstate').val()) != ''){
			$('#inputState').val($('#hidstate').val());
	}


	$('textarea#froala-editor').froalaEditor({
		key: '6F6F5F4E3bA2B6C4A3F4B2D2C3H2E1uhdcg1gH-9iI1C-22ve1==',
		toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|',
				'fontFamily', 'fontSize', 'color', 'inlineClass', 'inlineStyle', 'paragraphStyle', 'lineHeight', '|',
				'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent',
				'indent', 'quote', '-', 'insertLink', 'insertImage',
				'insertVideo', 'embedly', 'insertTable', '|', 'fontAwesome', 'specialCharacters',
				 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'spellChecker',
				 'help', 'html', '|', 'undo', 'redo']
	})

	$(document).on('submit', '#frm-discussion', function(e){
			e.preventDefault();
			var form = $(this);

			$.ajax({
				url : '/discussion/save_topic',
				type : 'POST',
				data : form.serialize(),
				dataType: 'json',
				success : function(data) {
						if(data.success){
							shownotif('success', 'You have successfully post a new topic.');
							setTimeout(function(){ window.location = '/discussion'; }, 2000);
					} else
							shownotif('error', 'Failed!');
				}
			});
	});

	$(document).on('submit', '#frm-discussion-reply', function(e){
			e.preventDefault();
			var form = $(this);

			$.ajax({
				url : '/discussion/save_reply',
				type : 'POST',
				data : form.serialize(),
				dataType: 'json',
				success : function(data) {
						if(data.success){
							shownotif('success', 'Successfully saved!');
							setTimeout(function(){ window.location = '/discussion'; }, 2000);
					} else
							shownotif('error', 'Failed!');
				}
			});
	});

	$(document).on('click', '#btn-quote', function() {
			var last_val = $('div#comment:last').text();
			$('textarea.topic_coment_coment').froalaEditor("html.set", '<blockquote>'+last_val+'</blockquote>');
	});
	
	$(document).on('click', '.dropdown-search a', function(e){
			e.preventDefault();
			$(this).parents('.input-group-prepend').find('.dropdown-toggle').html($(this).text());
			$('input[name="search_option"]').val($(this).text());

	});

	$(document).on('click', '#btn_bookmark', function(e){
			e.preventDefault();
			var topic_id = $(this).data('topic-id');

			$.ajax({
				url : '/discussion/save_bookmark',
				type : 'POST',
				data : {topic_id:topic_id},
				dataType: 'json',
				success : function(data) {
						if(data.success){
							shownotif('success', data.message);
					} else
							shownotif('error', data.message);
				}
			});
	});

	$('.btn_remove_bookmark').on('change', function(){
			var topic_bookmark_id = $(this).data('topic-bookmark-id');
			var is_deleted = 0;

			if( $(this).is(':checked') ) {
				is_deleted = 1;
			} else {
				is_deleted = 0;
			}

			$.ajax({
				url 		: '/discussion/remove_bookmark',
				dataType	: 'json',
				type  		: 'POST',
				data 		: { topic_bookmark_id : topic_bookmark_id, is_deleted : is_deleted },
				success: function(data) {
				
					if(data.success) {
						shownotif('success', data.message);
						location.reload('/discussion/discussion_bookmarked');
					} else
						shownotif('error',  data.message);
				}
			});
	});

});
