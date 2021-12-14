Dropzone.autoDiscover = false;
$(document).ready(function(evt){
		if($('.datetimepicker').length > 0){
				var date = new Date();
				date.setDate(date.getDate());
				$('.datetimepicker').datetimepicker({
						todayHighlight: true,
						autoclose: true,
						format: 'yyyy-mm-dd hh:ii:ss',
						startDate: date
				});
		}

		$('#page_block_container').on('change', '.page-switch-active', function(e){
			var active = $(this).prop("checked");
			var page_id = $(this).data('page_id');

			$.ajax({
					url : '/admin/page_active',
					type : 'POST',
					data : 'page_id='+page_id+'&active='+(active?1:0),
					dataType: 'json',
					success : function(data) {
							if(data.success == 1){
									shownotif('success', 'Page status changed to '+(active?'Published':'Draft'));
							}
							else
									shownotif('error', 'Error saving page status!');
					}
			});
		});

		$('#page_block_container').on('click', '.seo-page', function(e) {
				e.preventDefault();
				$('#seo-modal .modal-body').html('');
				var page_id = $(this).data('page_id');

				$.ajax({
						url : '/admin/seoreport/'+page_id,
						type : 'GET',
						data : '',
						dataType: 'json',
						success : function(data) {
								if(data.success == 1){
										$('#seo-modal .modal-body').html(data.seo_body);
								}
								else
										shownotif('error', 'Error retrieving seo report.');
						}
				});
		});

		$('#page_block_container').on('click', '.copy-page', function(e) {
				e.preventDefault();
				var page_id = $(this).data('page_id');

				$.ajax({
            url : '/admin/copy_page',
            type : 'POST',
            data : 'page_id='+page_id,
            dataType: 'json',
						async: false,
            success : function(data) {
								if(data.success == 1){
										$('#page_block_container').append(data.page_block);
										shownotif('success', 'Page successfully copied!');
								}
								else
										shownotif('error', data.message);
            }
      	});
		});

		$('#page_block_container').on('change', '.chkhomepage', function(e) {
				e.preventDefault();
				var page_id = $(this).data('page_id');
				var page_is_homepage = $(this).is(':checked') ? 1 : 0;


				//loop all and remove checks
				$('.chkhomepage').each(function () {
						if($(this).data('page_id') != page_id || page_is_homepage == 0)
								$(this).prop('checked', false);
				});


				$.ajax({
            url : '/admin/page_homepage/'+page_id,
            type : 'POST',
            data : 'page_is_homepage='+page_is_homepage,
            dataType: 'json',
						async: false,
            success : function(data) {
								if(data.success == 1){
										shownotif('success', 'Page successfully saved!');
								}
								else
										shownotif('error', 'Error saving page!');
            }
      	});

		});

		$('#modals_container').on('click', '.newpagemodal', function(e){
				e.preventDefault();

				$('#frmnewpage').trigger("reset");
		});

		$('#newpage-modal').on('click', '.save-page', function(e){
				e.preventDefault();
				var published = $(this).data('published');

				$.ajax({
            url : '/admin/page/0',
            type : 'POST',
            data : $('#frmnewpage').serialize()+'&published='+published,
            dataType: 'json',
						async: false,
            success : function(data) {
								if(data.success == 1){
										shownotif('success', 'Page successfully saved!');
										$('#page_block_container').prepend(data.page_block);
										$('#newpage-modal').modal('hide');
								}
								else
										shownotif('error', 'Error saving page!');
            }
      	});
		});

		$('#page_list').on('click', '.metadata-modal', function(e){
				e.preventDefault();
				var page_id = $(this).data('page_id');

				$.ajax({
            url : '/admin/page/'+page_id,
            type : 'GET',
            data : '',
            dataType: 'json',
						async: false,
            success : function(data) {
								if(data.success == 1){
										//assign VALUES
										$('input[name="page_id"]').val(data.page_id);
										$('input[name="page_title"]').val(data.page_title);
										$('#page_url_alias').html(data.page_url_alias);
										$('input[name="custom_url"]').val(data.custom_url);

										var page_perm = data.page_perm == 1 ? 1 : 0;
										$('select[name="page_access_for_anonymous_users"]').val(page_perm);
										$('textarea[name="page_keywords"]').val(data.keywords);
										$('textarea[name="page_meta_description"]').val(data.meta_description);
								}
								else
										shownotif('error', 'Page details not found!');
            }
      	});
		});

		$('#metadata-modal').on('click', '.save-page', function(e){
				e.preventDefault();
				var published = $(this).data('published');
				var page_id = $('input[name="page_id"]').val();

				$.ajax({
            url : '/admin/page/'+page_id,
            type : 'POST',
            data : $('#frmmetadata').serialize()+'&published='+published,
            dataType: 'json',
						async: false,
            success : function(data) {
								if(data.success == 1){
										shownotif('success', 'Page successfully saved!');
										$('#metadata-modal').modal('hide');
								}
								else
										shownotif('error', 'Error saving page!');
            }
      	});
		});

		$('#1tab').click();
		$(document).on('click', '.widget-preview-btn', function(e){
				e.preventDefault();

				$.ajax({
            url : '/admin/preview_widget',
            type : 'POST',
            data : $('#frmwidget').serialize(),
            dataType: 'json',
						async: false,
            success : function(data) {
								if(data.success == 1){
										$('.modal-body').html(data.preview);

										if($('input[name="sidebar_widget_display_title"]').is(":checked")){
												$('#myModalLabel').html($('input[name="sidebar_widget_name"]').val());
												$('#myModalLabel').show();
										}else
												$('#myModalLabel').hide();
								}
								else
										shownotif('error', 'Error displaying widget preview!');
            }
      	});



		});

		$(document).on('click', '.delete-page-btn', function(e){
				e.preventDefault();
				var id = $(this).data('page_id');
				$('#delete_page_modal_btn').data('page_id', id);
		});

		$(document).on('click', '#delete_page_modal_btn', function(e){
				e.preventDefault();
				var id = $(this).data('page_id');

				$.ajax({
            url : '/admin/page_delete',
            type : 'POST',
            data : 'page_id='+id,
            dataType: 'json',
            success : function(data) {
								if(data.success == 1){
										$('#page_id_'+id).remove();
										shownotif('success', 'Page successfully deleted!');
								}
								else
										shownotif('error', 'Error deleting page!');
            }
      	});
		});

		$(document).on('click', '.delete-widget-btn', function(e){
				e.preventDefault();
				var id = $(this).data('sidebar_widget_id');
				$('#delete_widget_modal_btn').data('sidebar_widget_id', id);
		});

		$(document).on('click', '#delete_widget_modal_btn', function(e){
				e.preventDefault();
				var id = $(this).data('sidebar_widget_id');

				$.ajax({
            url : '/admin/widget_delete',
            type : 'POST',
            data : 'sidebar_widget_id='+id,
            dataType: 'json',
            success : function(data) {
								if(data.success == 1){
										$('#sidebar_widget_'+id).remove();
										shownotif('success', 'Widget successfully deleted!');
								}
								else
										shownotif('error', 'Error deleting widget!');
            }
      	});
		});

		$('input.widget-switch-active').change(function() {
        var active = $(this).prop("checked");
				var sidebar_widget_id = $(this).data('sidebar_widget_id');

				$.ajax({
            url : '/admin/widget_active',
            type : 'POST',
            data : 'sidebar_widget_id='+sidebar_widget_id+'&active='+(active?1:0),
            dataType: 'json',
            success : function(data) {
								if(data.success == 1){
										shownotif('success', 'Widget status saved!');
								}
								else
										shownotif('error', 'Error saving widget status!');
            }
      	});
    });

		$(document).on('click', '.save-site-colors', function(e){
				e.preventDefault();
				var published = $(this).data('published');

				$.ajax({
            url : '/admin/site_design_save',
            type : 'POST',
            data : $('#frmsitecolors').serialize()+'&published='+published,
            dataType: 'json',
            success : function(data) {
								if(data.success == 1)
										shownotif('success', 'Successfully saved!');
								else
										shownotif('error', 'Error saving!');
            }
      	});
		});

		$(document).on('click', '.save-custom-design', function(e){
				e.preventDefault();
				var published = $(this).data('published');

				$.ajax({
					url : '/admin/site_design_save',
					type : 'POST',
					data : $('#frmcustomdesign').serialize()+'&custom_design_published='+published,
					dataType: 'json',
					success : function(data) {
						if(data.success == 1)
								shownotif('success', 'Successfully saved!');
						else
								shownotif('error', 'Error saving!');
            		}
      			});
		});

		$(document).on( 'click', 'button#btnPublish', function(e){
			e.preventDefault();

			var frm = $('form#frmFooterContent');
			$.ajax({
				url : '/admin/site_footer_save',
				type : 'POST',
				data : frm.serialize(),
				dataType: 'json',
				success : function(data) {

					console.log(data);
					if(data.success == 1)
							shownotif('success', 'Successfully saved!');
					else
							shownotif('error', 'Error saving!');
				}
			});
		} );
		$(document).on( 'click', '#froala-save', function(e){
			e.preventDefault();
			var frm = $('form#frmFooterContent');
			console.log(frm.serialize());
			$.ajax({
				url : '/admin/site_footer_save',
				type : 'POST',
				data : frm.serialize(),
				dataType: 'json',
				success : function(data) {

					console.log(data);
					if(data.success == 1)
							shownotif('success', 'Successfully saved!');
					else
							shownotif('error', 'Error saving!');
				}
			});
		} );


		$(document).on('click', '.save-tracking-code', function(e){
				e.preventDefault();
				var published = $(this).data('published');

				$.ajax({
            url : '/admin/tracking_code_save',
            type : 'POST',
            data : $('#frmtrackingcode').serialize(),
            dataType: 'json',
            success : function(data) {
								if(data.success == 1)
										shownotif('success', 'Successfully saved!');
								else
										shownotif('error', 'Error saving!');
            }
      	});
		});

		$(document).on('click', '.save-general-settings', function(e){
				e.preventDefault();

				$.ajax({
            url : '/admin/general_settings',
            type : 'POST',
            data : $('#frmgeneralsettings').serialize(),
            dataType: 'json',
            success : function(data) {
								if(data.success == 1)
										shownotif('success', 'Successfully saved!');
								else
										shownotif('error', 'Error saving!');
            }
      	});
		});

		$(document).on('click', '.save-settings-communications', function(e){
				e.preventDefault();

				$.ajax({
            url : '/admin/communication',
            type : 'POST',
            data : $('#frmcommunications').serialize(),
            dataType: 'json',
            success : function(data) {
								if(data.success == 1)
										shownotif('success', 'Successfully saved!');
								else
										shownotif('error', 'Error saving!');
            }
      	});
		});


		var group_table = $("#group_table").DataTable({
			language:{
				paginate:{
					previous:"<i class='mdi mdi-chevron-left'> ", next:" <i class='mdi mdi-chevron-right'>"},
					info:"Showing Groups _START_ to _END_ of _TOTAL_"},
					//lengthMenu:'Display <select class=\'ml-1 mr-1\'><option value="1">1</option><option value="10">10</option>'},
					lengthChange: false,
					pageLength: 5,
					ordering: false,
					searching: false,
					processing: true,
					ajax :{
					  url : "/admin/datatable_groups",
					  type : 'POST'
					},
					drawCallback:function(){
						$(".dataTables_paginate > .pagination").addClass("pagination-rounded text-right")
					}

				})


		$(document).on('click', '.save-group', function(e){
				e.preventDefault();

				if(!$('#groupname').val()){
					$('#errtext').removeClass('d-none');
					return false;
				}

				$.ajax({
            url : '/admin/group_save',
            type : 'POST',
            data : $('#manage_group').serialize(),
            dataType: 'json',
            success : function(data) {
								if(data.success == 1)
										reloadMemberTable(),
										$("#addgroups-modal input").val(""),
										$('#errtext').addClass('d-none'),
										$('#cancel_edit').addClass('d-none'),
										group_table.ajax.reload(),
										shownotif('success', 'Successfully saved!');
								else
										shownotif('error', 'Error saving!');
            }
      	});
		});

		$( "#addgroups-modal" ).on('hidden.bs.modal', function(){
			$("#addgroups-modal input").val("")
			$('#errtext').addClass('d-none');
			$('#cancel_edit').addClass('d-none');
		});

		$(document).on('click', '#cancel_edit', function(){
			$('#errtext').addClass('d-none');
			$('#groupid').val('');
			$(this).addClass('d-none');
		});


		$(document).on('click', '#edit_group', function() {
			$('#groupid').val($(this).data('id'));
			$('#groupname').val($(this).data('name'));
			$('#group-descrip').val($(this).data('description'));
			$('#cancel_edit').removeClass('d-none');
		});

		$(document).on('click', '#delete_group', function(){
			var group_id   = $(this).data('id');
			var alert = confirm("Are you sure you want to delete?");
			if(alert) {
				$.ajax({
					url : '/admin/delete_group',
					type : 'POST',
					data : {groups_id : group_id},
					dataType: 'json',
					success : function(data) {
										if(data.success == 1)
												group_table.ajax.reload(),
												reloadMemberTable(),
												shownotif('success', 'Successfully Deleted!');
										else
												shownotif('error', 'Error Deleting!');
					}
				  });
				}
		});
		//member action
		$(document).on('click', '#btn_member_action', function(){
			var value = $('#memberaction-select').val();
			var member_ids = [];


			 $('input[name="chk_name"]:checked').each(function () {
				member_ids.push($(this).data('id'));
			});

			if(value == 'delete'){
				$.ajax({
					url : '/admin/delete_member',
					type : 'POST',
					data : {member_ids : member_ids},
					dataType: 'json',
					success : function(data) {
										if(data.success == 1)
												reloadMemberTable(),
												group_table.ajax.reload(),
												shownotif('success', 'Successfully Deleted!');
										else
												shownotif('error', 'Error Deleting!');
					}
				  });
			}
		});

		$('#frmwidget').on('submit', function(e){
			e.preventDefault();

				if($.trim($('input[name="sidebar_widget_name"]').val()) == ''){
						return false;
				}
				else{
						$.ajax({
								url : '/admin/widget/'+$('input[name="type"]').val(),
								type : 'POST',
								data : $('#frmwidget').serialize(),
								dataType: 'json',
								success : function(data) {
										if(data.success == 1){
												$('input[name="sidebar_widget_id"]').val(data.sidebar_widget_id);
												shownotif('success', 'Successfully saved!');

												setTimeout(function(){ window.location = '/admin/widgets'; }, 2000);

										}
										else
												shownotif('error', data.message);
								}
						});
				}
		});

		var select = []; //copy select tag for assigning group

		$(document).on('click', '#view_member', function(){
				var id    = $(this).data('id');
				select = $('#group_assign').clone();

				$.ajax({
            url : '/admin/get_member_details',
            type : 'POST',
            data : {member_id:id},
            dataType: 'json',
            success : function(data) {

								for(var i = 0; i<data.group.length; i++){

									$( '#group_assign' ).append( '<option value='+data.group[i].groups_id +'>'+data.group[i].groups_name +'</option>');
								}

								var date = data.user_created.split(" ");
								var image = "";
								if(data.user_picture != "") {
									image = data.user_picture
								}
								else
								image = "no_picture.jpg";

								$('#user-picture').attr('src', base_url+'assets/images/users/'+ image);
								$('#member_name').text(data.user_firstname);
								$('#member_username').text(data.user_name);
								$('#member_email').text(data.user_email);
								$('#member_jdate').text(date[0]);
								$('#member_about').text(data.user_about_me);
								$('#view_question').attr('data-id', data.user_id);
								$('#btn_assign').attr('data-id', data.user_id);

            	}
      	});
		});

		$(document).on('click', '#btn_assign', function(){
			var user_id     = $(this).data('id');
			var group_id	= $('#group_assign').val();

			if(group_id != "") {
				$.ajax({
					url : '/admin/save_user_groups',
					type : 'POST',
					data : {groups_id : group_id,
							user_id: user_id},
					dataType: 'json',
					success : function(data) {
										if(data.success == 1)
												$('#group_assign option[value="'+ group_id +'"]').remove(),
												window.location.reload(),
												shownotif('success', 'Successfully Added!');
										else
												shownotif('error', 'Error Adding!');
					}
				  });
				}
		});

		$(document).on('hidden.bs.modal', '#assigngroup-modal', function (e) {
				$('#td-group').children().remove();
				$(select).appendTo('#td-group');
		  });


		//Froala(rich text editor) toggle

		$('#event_invite_email_text').froalaEditor({
			toolbarSticky: false,
			key: '6F6F5F4E3bA2B6C4A3F4B2D2C3H2E1uhdcg1gH-9iI1C-22ve1==',
			toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'quote', 'insertHR', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html']
    });

		$('div#froala-editor').froalaEditor({
			})
			$('div#froala-editor').froalaEditor('destroy');
		  });

		// Save state+
		$('a#froala-save').on('click', function (e) {
			e.preventDefault();
			if($('.fr-element').html() == '<p><br></p>'){
				$('#froalaHidden').val('');
			}
			else {
				$('#froalaHidden').val($('.fr-element').html());
			}

			if ($('div#froala-editor').data('froala.editor')) {
				$('div#froala-editor').froalaEditor('destroy');
				$('a#froala-save').hide();
				$('a#froala-edit').show();
			}
		});

		// Edit
		$('a#froala-edit').on('click', function (e) {
			e.preventDefault();
			if (!$('div#froala-editor').data('froala.editor')) {
				$('div#froala-editor').froalaEditor();
				$('a#froala-edit').hide();
				$('a#froala-save').show();
			}
		});

		// Navigation js
		// Initialize Dragula
		if($('#dragulaParent').length) {
				$containers = JSON.parse($('#dragulaParent').attr('data-containers'));
				var obj = [];
				for($i = 0; $i < $containers.length;$i++)
					obj[$i] = document.getElementById($containers[$i]);

				var drake = window.dragula(obj);
				drake.on("drop", function(el,target) {
					var origin_id = el.id.split("-")[2];
					var target_id = target.id.split("-")[2];
					if(origin_id == undefined) {
						shownotif('error', "Parent Nav cannot be moved");
						setTimeout(function(){ window.location = '/admin/navigation'; }, 2500);
					} else {
						$.post('/admin/navigation_update_parent', { 
							navigation_menu_id : origin_id, 
							navigation_menu_parent_id : target_id 
						}, function(data){},'json').done(function(data){
							console.log(data);
							if(data.success == 1) {
								shownotif('success', "Parent updated");
							} else {
								shownotif('error', data.msg);
							}
						});
					}
					
				});

				drake.on('accepts', function (el, target, source, sibling) {
                	return sibling === null || $(sibling).is('.siblings');
			    	// return true; // elements can be dropped in any of the `containers` by default
			  	});
		}

		$('body').on('click', '.btn-navigation', function(){
			var id = $(this).data('id');
			// $('#update-nav-modal-form').modal({backdrop: 'static'});
			$('#update-nav-modal-form').modal('show');
			$('#update-nav-modal-form .modal-content').empty();

			$('#update-nav-modal-form .modal-content').load(base_url+'/admin/navigation_load_modal/' + id, function() {

			});

			$('#update-nav-modal-form').one('hidden.bs.modal', function(e) {
				$('#update-nav-modal-form .modal-content').empty();
				$(e.target).removeData('bs.modal');
			});

		});

		$('.admin-navigation').on('submit', "#frm-navigation", function(e){
			e.preventDefault();

			$.ajax({
				url  : 	'/admin/navigation_update',
				type : 'POST',
				data : $('#frm-navigation').serialize(),
				dataType: 'json',
				success : function(data) {
						$(this).attr('disabled', false);
						if(data.success == 1) {
							shownotif('success', "Navigation Updated!");
							setTimeout(function(){ window.location = '/admin/navigation'; }, 1000);
						} else {
							shownotif('error', data.msg);
						}
				},
				error:function(error) {
					$(this).attr('disabled', false);
					console.error(error.responseText);
				}
				});

		});

		$(document).on('click', 'input[name="navigation_menu_is_active"]', function(){
			var id = $(this).val();
			var navigation_menu_is_active = 0;

			if( $(this).is(':checked') ){
				navigation_menu_is_active = 1;
			}

			$.post('/admin/navigation_update_show_nav', { navigation_menu_id : id, navigation_menu_is_active : navigation_menu_is_active }, function(data){

			},'json' ).done(function(data){
				console.log(data);
				if(data.success == 1) {
					shownotif('success', "Show in Nav updated");
				} else {
					shownotif('error', data.msg);
				}
			});

		});

		$('#saveNewNavCol').on('click', function() {
			$.ajax({
				url  : 	'/admin/navigation_add',
				type : 'POST',
				data : $('#nav-add-col-form').serialize(),
				dataType: 'json',
				success : function(data) {
						$(this).attr('disabled', false);
						if(data.success == 1) {
							shownotif('success', "Navigation Column Saved!");
							setTimeout(function(){ window.location = '/admin/navigation'; }, 1000);
						} else {
							shownotif('error', data.msg);
						}
				},
				error:function(error) {
					$(this).attr('disabled', false);
					console.error(error.responseText);
				}
				});
		});
		/*$('#edit-nav-btn').on('click', function(){
			$.ajax({
				url  : 	'/admin/navigation_update',
				type : 'POST',
				data : $('#update-nav-form').serialize(),
				dataType: 'json',
				success : function(data) {
						$(this).attr('disabled', false);
						if(data.success == 1) {
							shownotif('success', "Navigation Column Updated!");
							setTimeout(function(){ window.location = '/admin/navigation'; }, 1000);
						} else {
							console.error(data);
						}
				},
				error:function(error) {
					$(this).attr('disabled', false);
					console.error(error.responseText);
				}
				});
		});*/
		$('#add-nav-item-btn').on('click', function(){
			$.ajax({
				url  : 	'/admin/navigation_update',
				type : 'POST',
				data : $('#update-nav-form').serialize(),
				dataType: 'json',
				success : function(data) {

						if(data.success == 1) {
							shownotif('success', "Navigation Column Updated!");
							setTimeout(function(){ window.location = '/admin/navigation'; }, 1000);
						} else {
							console.error(data);
						}
				},
				error:function(error) {
					$(this).attr('disabled', false);
					console.error(error.responseText);
				}
				});
		});
		$('#delete-nav-btn').on('click', function(e) {
			var deleteNavItem = $('#delete-nav-id').val();
			console.log(deleteNavItem);
			$.ajax({
				url:	  '/admin/navigation_delete',
				dataType: 'json',
				type:	  'POST',
				data:	   {navigation_menu_id : deleteNavItem},
				success:function(data) {
					if(data.success == 1){
							shownotif('success', 'Successfully Deleted!');
							setTimeout(function(){ window.location = '/admin/navigation'; }, 1000);
					}
					else
							shownotif('error', data.message);
				},
				error:function(error) {
					console.error(error.responseText);
				}
			});

		});
		var currentNavColID = 0;
		$('#update-nav-modal').on('show.bs.modal', function (e) {
			var clickedBtn = $(e.relatedTarget)[0].id.split("-");
			currentNavColID = clickedBtn[3];
			$('#nav_id').val(currentNavColID);
		});
		$('#addcol-nav-modal').on('show.bs.modal', function (e) {
			var clickedBtn = $(e.relatedTarget)[0].id.split("-");
			currentNavColID = clickedBtn[2];
			$('#navigation_menu_parent_id').val(currentNavColID);
		});

		$('#deleteitem-nav-modal').on('show.bs.modal', function (e) {
			var clickedBtn = $(e.relatedTarget)[0].id.split("-");
			currentNavColID = clickedBtn[2];
			console.log(currentNavColID);
			$('#delete-nav-id').val(currentNavColID);
		});
		/////
		// Nav Category JS'

		$('#btn_nav_categories_delete').on('click', function(){

			// alert( );
			if( $('#tbl_nav_Categories input.nav_categories:checked').length > 0 ) {

				var arrData = [];
				$('#tbl_nav_Categories input.nav_categories:checked').each(function() {
				    arrData.push($(this).data('id'));
				});


				$.ajax({
					url  : 	'/admin/navigation_categories_delete',
					type : 'POST',
					data : { navs : arrData },
					dataType: 'json',
					success : function(data) {
							$(this).attr('disabled', false);
							if(data.success == 1) {
								shownotif('success', "Nav Category Deleted");
								setTimeout(function(){ window.location = '/admin/navigation_categories'; }, 1000);
							} else {
								shownotif('error', data.msg);
							}
					},
					error:function(error) {
						$(this).attr('disabled', false);
						console.error(error.responseText);
					}
				});

			} else {
				$('#deleteitem-nav-modal').modal('hide');
				shownotif('error', "no items selected!");
			}
			
		});
		$("#add-nav-cat-modal").on('click', "#add-nav-cat-btn", function() {
			$.ajax({
				url  : 	'/admin/navigation_categories_add',
				type : 'POST',
				data : $('#add-nav-cat-form').serialize(),
				dataType: 'json',
				success : function(data) {
						$(this).attr('disabled', false);
						if(data.success == 1) {
							shownotif('success', "Navigation Category Saved!");
							setTimeout(function(){ window.location = '/admin/navigation_categories'; }, 1000);
						} else {
							shownotif('error', data.msg);
						}
				},
				error:function(error) {
					$(this).attr('disabled', false);
					console.error(error.responseText);
				}
			});
		});

		$('#add_new_nav_categories').on('click', function(){
			$('#add-nav-cat-modal').modal('show');
			$('#add-nav-cat-modal .modal-content').empty();

			$('#add-nav-cat-modal .modal-content').load(base_url+'/admin/navigation_category_load_modal', function() {

			});

			$('#add-nav-cat-modal').one('hidden.bs.modal', function(e) {
				$('#add-nav-cat-modal .modal-content').empty();
				$(e.target).removeData('bs.modal');
			});

		});

		$('#edit-nav-cat-modal-btn').on('click', function(){
			$('.nav-cat-checkbox:checkbox:checked').each(function () {
				var currentNavCatColID = (this.checked ? $(this).data("id") : "");
				$('#edit-nav-cat-modal-form').modal('show');
				$('#edit-nav-cat-modal-form .modal-content').empty();

				$('#edit-nav-cat-modal-form .modal-content').load(base_url+'/admin/navigation_category_load_modal/' + currentNavCatColID, function() {

				});

				$('#edit-nav-cat-modal-form').one('hidden.bs.modal', function(e) {
					$('#edit-nav-cat-modal-form .modal-content').empty();
					$(e.target).removeData('bs.modal');
				});
		});
		});
		// End nav cat JS

		///Media JS
		var currentMediaID = 0;
		$('#delete-alert-modal').on('show.bs.modal', function(e) {
			var clickedBtn = $(e.relatedTarget);
			var temp = clickedBtn[0].id;
			var currentID = temp.split("-");
			currentMediaID = currentID[2];
		});
		$('#unpublish-modal').on('show.bs.modal', function(e) {
			var clickedBtn = $(e.relatedTarget);
			var temp = clickedBtn[0].id;
			var currentID = temp.split("-");
			currentMediaID = currentID[2];
		});
		$('#delete-media-btn').on('click', function(e) {
			$.ajax({
				url:	  '/admin/media_delete',
				dataType: 'json',
				type:	  'POST',
				data:	   {media_id : currentMediaID},
				success:function(data) {
					if(data.success == 1){
							shownotif('success', 'Successfully Deleted!');
							location.reload();
					}
					else
							shownotif('error', 'Error!');
				},
				error:function(error) {
					console.error(error.responseText);
				}
			});

		});

		$('body').on('click', 'button.btn-mc-delete', function(){
			var id = $(this).parents('tr').attr('data-id');
			currentMediaID = id;
			$('input#confirmation_id').val('');
			$('input#confirmation_id').val(id);

		});


		$('#delete-media-category-btn').on('click', function(e) {
			var id = $('input#confirmation_id').val();

			$.ajax({
				url:	  '/admin/media_category_delete',
				dataType: 'json',
				type:	  'POST',
				data:	   {media_category_id : id},
				success:function(data) {
					if(data.success == 1){
							shownotif('success', 'Successfully Deleted!');
							$('tr#'+id).remove();
							// location.reload();
					}
					else
							shownotif('error', data.message);
				},
				error:function(error) {
					console.error(error.responseText);
				}
			});

		});



		$('#unpublish-media-category-btn, #publish-media-category-btn').on('click', function(e) {

			$.ajax({
				url:	'/admin/unpublish_media_category',
				dataType: 'json',
				type: 'POST',
				data: {media_id : currentMediaID ,media_published : 0},
				success: function(data) {
					// console.log(data);
					if(data.success == 1) {
						shownotif('success', 'Successfully Unpublished!');
						// location.reload();
						setTimeout(location.reload.bind(location), 2000);
					}
					else
						shownotif('error', 'Error!');
				},
				error: function(error) {
					// console.error(error.responseText);
				}
			});
		});


		$('body').on('click', 'button.btn-upblish', function(){
			var id = $(this).parents('tr').attr('data-id');
			currentMediaID = id;
		});

		$('button.update-media-btn').on('click', function(e) {
			$.ajax({
				url:	'/admin/edit_media',
				dataType: 'json',
				type: 'POST',
				data: $('#formEditMedia').serialize(),
				success: function(data) {
					if(data.success == 1) {
						shownotif('success', 'Successfully Updated!');
						setTimeout(function(){ window.location = '/admin/media'; }, 2000);
					}
					else
						shownotif('error', 'Error!');
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});
		});
		$('#update-media-category-btn').on('click', function(e) {
			$.ajax({
				url:	'/admin/edit_media_category',
				dataType: 'json',
				type: 'POST',
				data: $('#formEditMediaCategory').serialize(),
				success: function(data) {
					if(data.success == 1) {
						shownotif('success', 'Successfully Updated!');
						// location.reload();
						setTimeout(function(){ window.location = '/admin/media_manage_categories'; }, 1000);
					}
					else
						shownotif('error', 'Error!');
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});
		});


		$('#unpublish-media-btn').on('click', function(e) {

			// alert(currentMediaID);
			$.ajax({
				url:	'/admin/unpublish_media',
				dataType: 'json',
				type: 'POST',
				data: {media_id : currentMediaID ,media_published : 0},
				success: function(data) {
					if(data.success == 1) {
						$('button span[data-publish="'+currentMediaID+'"]').text('Publish');
						$('span[data-published-status="'+currentMediaID+'"]').text('Not Published');

						shownotif('success', 'Successfully Unpublished!');
						// location.reload();
					}
					else
						shownotif('error', 'Error!');
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});
		});
		$('#publish-media-btn').on('click', function(e) {
			$.ajax({
				url:	'/admin/publish_media',
				dataType: 'json',
				type: 'POST',
				data: {media_id : currentMediaID ,media_published : 1},
				success: function(data) {
					if(data.success == 1) {
						$('button span[data-publish="'+currentMediaID+'"]').text('Unpublish');
						$('span[data-published-status="'+currentMediaID+'"]').text('Published');
						shownotif('success', 'Successfully Published!');
						// location.reload();
					}
					else
						shownotif('error', 'Error!');
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});
		});
		$('#add-new-media-category').on('click', function(e) {//edit media_new_category.php, not yet complete fields
			$.ajax({
				url:	'/admin/add_media_category',
				dataType: 'json',
				type: 'POST',
				data: $('#formAddNewCategory').serialize(),
				success: function(data) {
					console.log(data);
					if(data.success == 1) {
						document.getElementById("formAddNewCategory").reset();
						shownotif('success', 'Successfully Added!');

						setTimeout(function(){ window.location = '/admin/media_manage_categories'; }, 1000);
					}
					else
						shownotif('error', 'Error!');
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});
		});

		function submitMediaForm() {
			$('#add-new-media-btn').attr( 'disabled','disabled' );
			var frm = $("form#formMedia");
			$.ajax({
				url:	frm.attr('action'),
				dataType: 'json',
				type: 'POST',
				data: frm.serialize(),
				success: function(data) {
					console.log(data);
					if(data.success == 1) {
						document.getElementById("formMedia").reset();
						shownotif('success', 'Successfully Added!');
						setTimeout(function(){ window.location = '/admin/media'; }, 1000);
					} else{
						shownotif('error', 'Error!');
					}
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});
		}


		$("#formMedia").validate({
			rules: {
				media_title: {
					required: true
				},
				product_label: {
					required: false
				},
				product_url: {
					required: false,
					url: true
				},
				media_description: {
					required: true
				},
				media_embed_value: {
					required: false
				}
			},
			submitHandler: function(form) {
				submitMediaForm();
			}
		});

		$('.allow_downloabale').on('change', function(){
			var _obj = $(this);
			var media_id = $(this).attr('data-media-id');
			var dp = 0;
			console.log($(this).parents('.card-body').find('ul.list-unstyled li span.downloadable-text').html());
			if( $(this).is(':checked') ) {
				dp = 1;
				$(this).parents('.card-body').find('ul.list-unstyled li span.downloadable-text').html('Yes');
			} else {
				dp = 0;
				$(this).parents('.card-body').find('ul.list-unstyled li span.downloadable-text').html('No');
			}


			$.ajax({
				url 		: '/admin/downloadable_update',
				dataType	: 'json',
				type  		: 'POST',
				data 		: { media_id : media_id, downloadable : dp },
				success: function(data) {
					console.log(data);
					if(data.success == 1) {
						shownotif('success', data.message);
						// setTimeout(function(){ window.location = '/admin/media'; }, 2000);
					} else{
						shownotif('error',  data.message);
					}
				},
				error: function(error) {
					console.error(error.responseText);
				}
			});



		});

		///////////////End Media JS, possibly change button names to improve readability



		function reloadMemberTable(_search = null, _filter = 'user_firstname')
		{
			$.ajax({
				url : '/admin/get_members',
				type : 'POST',
				data : {search_val : _search,
						sort_by: _filter},
				dataType: 'json',
				success : function(data) {

							var output = "";

							if(data.success == 1)
								$.each(data.data, function(key, value){

								var groups = "";
								for(var i = 0; i < value.group.length; i++){
									groups += `<p class="mb-0">`+value.group[i].groups_name+`</p>`;
								}
								output += `<tr>
										<td>
											<span class="custom-control custom-checkbox">
											<input type="checkbox" name="chk_name" class="custom-control-input memberCheck" data-id=" ${value.user_id }" id="memberCheck[${value.user_id}]" ${(session_uid == value.user_id) ? "disabled" : ""}>
											<label class="custom-control-label" for="memberCheck[${value.user_id}]">${value.user_firstname + ' ' + value.user_lastname  }</label>
											</span>
										</td>
										<td>${groups}</td>
										<td>${value.user_name}</td>
										<td>${value.user_email}</td>
										<td>${value.user_lastactivity}</td>
										<td>${value.user_status}</td>
										<td><button id="view_member" data-id="${value.user_id}" data-toggle="modal" data-target="#assigngroup-modal" class="btn btn-sm btn-primary" type="submit">&nbsp;View&nbsp;</button></td>
								 </tr>`;
							});

							$('.m-tbody').html(output);
				}
			  });

		}

		$(document).on('click', '#accept_request', function(){
			var crequest_id = $(this).data('id');
			var crequest_name = $(this).data('name');
			var alert =  confirm("Are you sure you want to accept? " + crequest_name);
			if(alert){
				$.ajax({
					url: 	  '/admin/manage_crequest',
					type:	  'POST',
					dataType: 'json',
					data:	  {community_request_id : crequest_id,
							   community_request_status: 'accepted'},
					success:function(data) {

							if(data.success == 1)
												shownotif('success', 'Successfully accepted a request!'),
												$('#c_request_row[data-id="'+crequest_id+'"]').remove(); //remove row
							else
												shownotif('error', 'Error!');
					}
				})
			}
		});

		$(document).on('click', '#deny_request', function(){
			var crequest_id = $(this).data('id');
			var crequest_name = $(this).data('name');
			var alert =  confirm("Are you sure you want to deny? " + crequest_name);
			if(alert){
				$.ajax({
					url: 	  '/admin/manage_crequest',
					type:	  'POST',
					dataType: 'json',
					data:	  {community_request_id : crequest_id,
							   community_request_status: 'denied'},
					success:function(data) {

							if(data.success == 1)
												shownotif('success', 'Successfully deny a request!'),
												$('#c_request_row[data-id="'+crequest_id+'"]').remove(); //remove row
							else
												shownotif('error', 'Error!');
					}
				})
			}
		});

		$(document).on('click','#fname_filter', function(e){
			e.preventDefault();
			var search_val = $('#search_val').val();
			reloadMemberTable(search_val, 'user_firstname');
		});

		$(document).on('click','#lname_filter', function(e){
			e.preventDefault();
			var search_val = $('#search_val').val();
			reloadMemberTable(search_val, 'user_lastname');
		});

		$(document).on('click','#btn_search', function(e){
			e.preventDefault();
			var search_val = $('#search_val').val();
			reloadMemberTable(search_val, 'user_lastname');
		});

		$(document).on('click', '.custom-control-label', function(){
			var id = $(this).attr('for');

			 if($(this).siblings('input[id="'+id+'"]').is(':checked')){
					$('input[id="'+id+'"]').prop('check', false);
			   } else {
					$('input[id="'+id+'"]').prop('check', true);
			   }
		});

		$(document).on('click', '#btn_qmodal', function(e){
			e.preventDefault();

			var modalId = $('input[name="inlineRadioOptions"]:checked').attr('id');

			if(modalId){

					$('#'+modalId).modal('show');

			} else {

				//alert("Please Select an option");
				$('#question-warning-modal').modal('show');
			}
		});

		$(document).on('click', '#save_singleline', function(e){
			e.preventDefault();
			var FormData = $('#singleline_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										reload_question_list(),
										shownotif('success', data.msg);
					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#finish_singleline', function(e){
			e.preventDefault();
			var FormData = $('#singleline_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										//shownotif('success', data.msg),
										location.reload();
					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#save_multipleline', function(e){
			e.preventDefault();
			var FormData = $('#multipleline_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										reload_question_list(),
										shownotif('success', data.msg);

					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#finish_multipleline', function(e){
			e.preventDefault();
			var FormData = $('#multipleline_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										location.reload();
					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#multiple-moreCheck2', function(){
			if($(this).prop('checked')){
				$('.additional-info').append('<input type="text" class="form-control" id="append-input" name="group_question_has_other_field" placeholder="label for other field">');
			}else{
				if($('#append-input').length){
					$('#append-input').remove();
				}
			}
		});

		$(document).on('click', '#save_single_answer', function(e){
			e.preventDefault();
			var FormData = $('#singleanswer_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										//$('#singleanswer_form')[0].reset(),
										reload_question_list(),
										shownotif('success', data.msg);

					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#finish_single_answer', function(e){
			e.preventDefault();
			var FormData = $('#singleanswer_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										location.reload();
					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#save_multiple_answer', function(e){
			e.preventDefault();
			var FormData = $('#multipleanswer_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										//$('#multipleanswer_form')[0].reset(),
										reload_question_list(),
										shownotif('success', data.msg);

					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#finish_multiple_answer', function(e){
			e.preventDefault();
			var FormData = $('#multipleanswer_form').serialize();

			$.ajax({
				url:	  '/admin/create_questions',
				dataType: 'json',
				type:	  'POST',
				data:	   FormData,
				success:function(data) {

					if(data.success == 1)
										location.reload();
					else
										shownotif('error', data.msg);
				}
			});
		});

		$(document).on('click', '#confirm_delete', function(){
			var id = $(this).data('id');
			$('#delete_question').attr('data-id', id);
			$('#question-alert-modal').modal('show');
		});

		$(document).on('click', '#delete_question', function(){
			var question_id = $(this).data('id');

			$.ajax({
				url:	  '/admin/delete_question',
				dataType: 'json',
				type:	  'POST',
				data:	   {group_question_id:question_id},
				success:function(data) {

					if(data.success == 1)
										//shownotif('success', 'Successfully Deleted!');
										location.reload();
					else
										shownotif('error', 'Error!');
				}
			});
		});

		$(document).on('click', '#moreCheck2', function(){
			if($(this).prop('checked')){
				$('.additional-info2').append('<input type="text" class="form-control" id="append-input2" name="group_question_has_other_field" placeholder="label for other field">');
			}else{
				if($('#append-input2').length){
					$('#append-input2').remove();
				}
			}
		});

		var input_layout = `
		<div class="col-sm" >
			<div class="input-group mb-2">
				<input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
				<div class="input-group-append">
					<button class="btn btn-primary" id="btn_remove"  type="button">X</button>
				</div>
			</div>
		</div>`; // answer input layout

		var defaultInputLayout = ""; // container for default input to display

		// default input for multiple and single answer question
		for(let i = 0; i < 3; i++){
			defaultInputLayout += `
			<div class="col-sm" >
				<div class="input-group mb-2">
					<input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
					<div class="input-group-append">
						<button class="btn btn-primary" id="btn_remove"  type="button">X</button>
					</div>
				</div>
			</div>`
		}

		$(document).on('click', '#add-multiple-answer', function(){
			$('.multiple-ans-box').append($(input_layout));
		});

		$(document).on('click', '#add-single-answer', function(){
			$('.single-ans-box').append($(input_layout));
		});

		$(document).on('click', '#btn_remove', function(){
			$(this).parent().parent().parent().remove();
		});

		$(document).on('click', '#edit_question', function(){
			var activity_id = $(this).data('activityid');
			var question_id = $(this).data('id');
			var modal 		= $('.select-modal[data-id="'+activity_id+'"]');
			$.ajax({
				url:	  '/admin/get_question',
				dataType: 'json',
				type:	  'POST',
				data:	   {group_question_id:question_id},
				success:function(data) {

					if(data.success == 1)
										$.each(data.data, function(key, value){
											modal.find('input[name="group_question_title"]').val(value.group_question_title);
											modal.find('input[name="group_question_id"]').val(value.group_question_id);
											if(value.group_question_answer_options.length > 0) {
												if(value.answer_type_id == 4){
													$('.single-ans-box').html("");
													$.each(value.answer_options, function(key, value){
														$('.single-ans-box').append(`<div class="col-sm" >
															<div class="input-group mb-2">
																<!--<label for="multiple-answer1">Answer 1</label>-->
																<input class="form-control" name="answer[]" type="text" value="${value}" id="multiple-answer1" placeholder="Type Your Answer">
																<div class="input-group-append">
																	<button class="btn btn-primary" id="btn_remove"  type="button">X</button>
																</div>
															</div>
														</div>`);
													});
												}else if(value.answer_type_id == 3){
													$('.multiple-ans-box').html("");
													$.each(value.answer_options, function(key, value){
														$('.multiple-ans-box').append(`<div class="col-sm" >
															<div class="input-group mb-2">
																<!--<label for="multiple-answer1">Answer 1</label>-->
																<input class="form-control" name="answer[]" type="text" value="${value}" id="multiple-answer1" placeholder="Type Your Answer">
																<div class="input-group-append">
																	<button class="btn btn-primary" id="btn_remove"  type="button">X</button>
																</div>
															</div>
														</div>`);
													});
												}
											}
											if(value.group_question_is_required == 1){
												modal.find('input[name="group_question_is_required"]').prop('checked', true);
											} else {
												modal.find('input[name="group_question_is_required"]').prop('checked', false);
											}

											if(value.group_question_has_other == 1){
												modal.find('input[name="group_question_has_other"]').prop('checked', true);

												if(value.answer_type_id == 4) {

													if(!$('#append-input2').length){

														$('.additional-info2').append('<input type="text" class="form-control" id="append-input2" name="group_question_has_other_field" placeholder="label for other field">');

													}

												} else if(value.answer_type_id == 3) {

													if(!$('#append-input').length){

														$('.additional-info').append('<input type="text" class="form-control" id="append-input" name="group_question_has_other_field" placeholder="label for other field">');
													}
												}

												modal.find('input[name="group_question_has_other_field"]').val(value.group_question_has_other_field);

											} else {
												modal.find('input[name="group_question_has_other"]').prop('checked', false);
											}

											$('.select-modal[data-id="'+activity_id+'"]').modal('show');
										});
					else
										shownotif('error', 'Error!');
				}
			});
		});

		//reset all changes in add question modal when closed
		$('.select-modal').on('hidden.bs.modal', function (e) {

			$('input[name="group_question_id"]').val('');

			$(this).find('form')[0].reset();

			//reset the input to default
			if($(this).data('id') == 4) {
				$('.single-ans-box').html(defaultInputLayout);
			}
			else if ($(this).data('id') == 3) {
				$('.multiple-ans-box').html(defaultInputLayout);
			}

			if($('#append-input').length){
				$('#append-input').remove();
			}

			if($('#append-input2').length){
				$('#append-input2').remove();
			}
		});

		$(document).on('click', '#btn_view_report', function(){
			$.ajax({
				url:	  '/admin/get_question',
				dataType: 'json',
				type:	  'POST',
				success:function(data) {
					var question_options = "";
					if(data.success == 1)
										$.each(data.data, function(key, value){
											question_options += `<option value="${value.group_question_id}">${value.group_question_title}</option>`;
										}),
										$('#select-question-option').html(question_options);
					else
										shownotif('error', 'Error Fetching Data!');
				}
			});
		});

		//reset all changes in modal when closed
		$('#viewreports-modal').on('hidden.bs.modal', function (e) {
			$('#select-question-option').html('<option value=""></option>');
		});

		$(document).on('click', '#btn_view_qdetails', function(e){
			e.preventDefault();

			var group_question_id = $('#select-question-option').val();

			$.ajax({
				url:	  '/admin/get_question',
				dataType: 'json',
				type:	  'POST',
				data: {group_question_id : group_question_id},

				success:function(data) {
					var output = `<table class="table">
						<thead>
							<tr>
								<th>${data.data[0].group_question_title}</th>
								<th>Out of ${data.count} answers...</th>
							</tr>
						</thead>
					<tbody>`;

					var has_other = [];
					var has_other_bool = false;
					var count_other_each = {}; // other answer key value pair

					//check if there is a another answer
					if(data.data[0].group_question_has_other == 1){
						has_other_bool = true;
					}

					$.each(data.answer, function(key, val){
						//check for other answer
						$.each(val.group_answers, function( group_answer_key, group_answer_value){
							if(data.data[0].answer_options){

								if(data.data[0].answer_options.indexOf(group_answer_value) < 0){
									has_other.push(group_answer_value);
								}

							} else {

								has_other.push(group_answer_value);
							}
						});
					}),

					//count other answer in array
					has_other.forEach(function(x) { count_other_each[x] = (count_other_each[x] || 0)+1; });

					var total_count_each_selection = [];
					var total_amount = 0;
					var selection_answer_sum = 0;

					if(data.success == 1)
										$.each(data.data[0].answer_options, function(key, value){
											var count1 = 0;
											$.each(data.answer, function(key, val){
												// check if the answer exists in array
												if(!!(val.group_answers.indexOf(value)+1)){
													count1++;
												}
											});

											total_count_each_selection.push(count1);

											//function for getting the sum of all selection answer
											arrSum = function(arr){
												return arr.reduce(function(a,b){
												  return a + b
												}, 0);
											  }

											selection_answer_sum = arrSum(total_count_each_selection);
											total_amount = selection_answer_sum + has_other.length;
										}),

										$.each(data.data[0].answer_options, function(key, value){
											var count = 0;
											$.each(data.answer, function(key, val){
												// check if the answer exists in array
												if(!!(val.group_answers.indexOf(value)+1)){
													count++;
												}
											});

											output += `
													<tr>
														<td> `;
														if(data.data[0].group_question_answer_options != ""){
															output += `<div class="progress">
														   <div style="width: ${ (isNaN(Math.floor(count/total_amount * 100))) ? 0 : Math.floor(count/total_amount * 100) }%; background-color:#800d4d;">
														   <strong>${ (isNaN(Math.floor(count/total_amount * 100))) ? 0 : Math.floor(count/total_amount * 100) }%</strong>
														   </div>
														 </div>`;
													   }
											output += `</td>
														<td> ${value}</td>
													</tr>
												`;
										}),

										//append here other answer
										(has_other_bool) ? output += `
										<tr class="">
										<td>
											<strong class="label">other</strong>
											<div class="progress">
												<div style="width:${(isNaN(Math.floor(has_other.length/total_amount * 100))) ? 0 : Math.floor(has_other.length/total_amount * 100)}%; background-color:#800d4d;">
												<strong>${(isNaN(Math.floor(has_other.length/total_amount * 100))) ? 0 : Math.floor(has_other.length/total_amount * 100)}%</strong>
												</div>
											</div>
										</td>
											<td>
												<strong>${ has_other.length } chose other</strong>
											</td>
										</tr>` : "" ,

										//append for multiple or single line answer
										(data.data[0].answer_type_id == 1 || data.data[0].answer_type_id == 2) ? $.each(count_other_each, function(count_other_key, count_other_value){
										output += `
										<tr class="">
											<td>
												<strong>${count_other_key}</strong>
											</td>
											<td>
												(${count_other_value} person)
											</td>
										</tr>`
											}) : "" ,

										output += `</tbody>
											</table>`,

										$('#question_details_box').html(output); // display
					else
										shownotif('error', 'Error Fetching Data!');
				}

			});
		});

		$('#viewreports-modal').on('hidden.bs.modal', function(){
			$('#question_details_box').html('');
		});

		function reload_question_list()
		{
			$.ajax({
				url:	  '/admin/get_questions',
				dataType: 'json',
				type:	  'POST',
				success:function(data) {
					var output = "";
					var count = 1;
					if(data.success == 1)
										$.each(data.data, function(key, value){
											output+= `<div class="card border">
													<div class="card-body">
														<label> ${count++}. ${value.group_question_title} </label>`;
													if(value.answer_type_id == 1){
														output += `<input type="text" class="form-control mb-1">`;
													}
													else if(value.answer_type_id == 2){
														output +=	`<textarea class="form-control mb-1" id="example-textarea" rows="5"></textarea>`;
													}
													else if(value.answer_type_id == 3){
														if(value.group_question_answer_options != ""){
															$.each(value.answer_options, function(key, val){
																output += `<div class="row">
																				<div class="col-lg-12">
																					<input type="checkbox"> &nbsp <label for=""> ${val}
																				</div>
																			</div>`;
															});
														}
													}
													else if(value.answer_type_id == 4){
														if(value.group_question_answer_options != ""){
															$.each(value.answer_options, function(key, val){
																output += `<div class="row">
																				<div class="col-lg-12">
																					<input type="radio" name="radio> &nbsp <label for=""> ${val}
																				</div>
																			</div>`;
															});
														}
													}
													output += `<button type="button" class="btn btn-sm btn-primary" id="edit_question" data-activityid ="${value.answer_type_id}" data-id="${value.group_question_id }">Edit</button>
																	<button type="button" class="btn btn-sm btn-danger" id="confirm_delete"  data-id="${value.group_question_id }">Delete</button>
																</div>
															</div>`;
										}),
										$('#questions-container').html(output);
					else
										shownotif('error', 'Error Fetching Data! Reload the Page');
				}
			});
		}

		if($("#chart-value").length)         // use this if you are using class to check
		{
			//report_chart
			var chart_value = $("#chart-value").val().split(",");
			var ctx = document.getElementById("answer-question").getContext('2d');
			var myPieChart = new Chart(ctx,{
				type: 'pie',

				data:  {
				datasets: [{
					data: chart_value,
					backgroundColor: ["#800d4d", "#e97319"],
				}],
				labels: [
					'Complete',
					'Incomplete',
				]

				},
				options: {
				}
			});
		}

		$(document).on('submit', '#member_createform', function(e){
			e.preventDefault();

			var formData = $(this).serialize();
			var url =$(this).attr('action');

			$.ajax({
				url  : 	url,
				type : 'POST',
				data : formData,
				dataType: 'json',
				success : function(data) {
						if(data.success == 1)
									shownotif('error', data.msg),
									window.location = '/admin/member_privileges';
						else
									shownotif('error', data.msg);
					}
			  });

		});

		$(document).on('click', '#apply_privilege', function(e){
			e.preventDefault();

			var member_ids = [];
			var takenseats = $('#takenseats').val();
  			var purchasedseats = $('#purchasedseats').val();
			var functionid = $('#member-privilege-select').val();

			$.each($('.member-chk:checked'), function(){
				member_ids.push($(this).data('id'));
			});

			if((functionid == '1' || functionid == '2') && (parseInt(purchasedseats) < (parseInt(takenseats) + parseInt(member_ids.length) )) ){
				//doSearch_item();
				alert('error', "Maximum amount of seats reached.");
				return false;
			 }
			//console.log(member_ids);
			if(member_ids.length){
				var alert = confirm("Are you sure you want to apply privilege?");
				if(alert){
					$.ajax({
						url  : 	'/admin/assign_privileges',
						type : 'POST',
						data : {user_function_id: functionid,
								user_id: member_ids},
						dataType: 'json',
						success : function(data) {
								if(data.success == 1)
											//shownotif('success', data.msg),
											window.location = '/admin/member_privileges';
								else
											shownotif('error', data.msg);
							}
					  });
				}
			}
		});

		$(document).on('click', '.member_chk', function(){

			var member_id   	= $(this).data('member_id');
			var function_id 	= $(this).data('function_id');
			var ischecked 		= $('#memberCheck_'+ member_id + '_' + function_id).prop('checked') ? true : false;
			var purchasedseats 	= $('#purchasedseats').val();
			var takenseats 		= $('#takenseats').val();
			var member_ids		= [];
			member_ids.push(member_id);

			console.log(member_id);
			// if(ischecked == true && (function_id == 1 || function_id == 2) && (parseInt(purchasedseats) < (parseInt(takenseats) + 1 )) ){
			// 	alert("Maximum amount of seats reached.");
			// 	return false;
		  //  }

		   $.ajax({
			url  : 	'/admin/assign_privileges',
			type : 'POST',
			data : {user_function_id: function_id,
					user_id: member_ids},
			dataType: 'json',
			success : function(data) {
					if(data.success == 1)

								window.location = '/admin/member_privileges';
					else
								shownotif('error', data.msg);
				}
		  });
		});

		$(document).on('submit', '#frm_blog_category', function(e){
			e.preventDefault();

				var formData  = $(this).serialize();
				var trimmedCatTitle = $.trim($('#cattitle-input').val());


				if(trimmedCatTitle == ""){

					$('#err-cattitle').removeClass('d-none');

				}	else {

					$('#err-cattitle').addClass('d-none');

					if ( $(this).data('requestRunning') ) {
						return;
					}

					$(this).data('requestRunning', true);

					$.ajax({
						url  : 	'/admin/add_blog_category',
						type : 'POST',
						data : formData,
						dataType: 'json',
						success : function(data) {
								if(data.success == 1)

											window.location = '/admin/blog_manage_categories';
								else
											shownotif('error', data.msg);
							},
							complete: function() {
									$(this).data('requestRunning', false);
							}

						});
				}
		});

		$(document).on('submit', '#frm_edit_blog_category', function(e){
			e.preventDefault();

				var formData  = $(this).serialize();
				var trimmedCatTitle = $.trim($('#cattitle-input').val());


				if(trimmedCatTitle == ""){

					$('#err-cattitle').removeClass('d-none');

				}	else {

					$('#err-cattitle').addClass('d-none');

					if ( $(this).data('requestRunning') ) {
						return;
					}

					$(this).data('requestRunning', true);

					$.ajax({
						url  : 	'/admin/add_blog_category',
						type : 'POST',
						data : formData,
						dataType: 'json',
						success : function(data) {
								if(data.success == 1)

											window.location = '/admin/blog_manage_categories';
								else
											shownotif('error', data.msg);
							},
							complete: function() {
									$(this).data('requestRunning', false);
							}

						});
				}
		});

		$(document).on('input', '#cattitle-input', function(){
				if($(this).val() != ""){
					$('#err-cattitle').addClass('d-none');
				}

				var categoryval = $(this).val().trim();
				var categoryreplace = categoryval.replace(/ /g,"-")
				$('#blogtitle-input').val(categoryreplace);
		});

		$(document).on('click', '#edit_blog_category', function(e){
				e.preventDefault();

					var id  = $(this).data('id');
					var url = $(this).attr('href');

					//if($('#customRadio'+id).prop('checked')){
							window.location.href = url;
					//}

		});

		$(document).on('click', '#delete_blog_category', function(e){
			e.preventDefault();

				var id  = $(this).data('id');
				var url = $(this).attr('href');

				//if($('#customRadio'+id).prop('checked')){

						$('#blog-category-modal').modal('show');
						$('#blog_category_delete').attr('data-id', id)
				//}

	});

		$(document).on('click', '#blog_category_delete', function(){

				var id  = $(this).data('id');

				$.ajax({
					url  : 	'/admin/delete_blog_category',
					type : 'POST',
					data : {blog_category_id : id},
					dataType: 'json',
					success : function(data) {
							if(data.success == 1)

										window.location = '/admin/blog_manage_categories';
							else
										shownotif('error', data.msg);
						}
					});
	});

	$("#category-datatable").DataTable({
		keys:!0,
		language:{
			paginate:{
				previous:"<i class='mdi mdi-chevron-left'>",
				next:"<i class='mdi mdi-chevron-right'>"
			}},
			drawCallback:function(){
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
			});

		$(function() {

			$('textarea#froala-editor').froalaEditor({
				key: '6F6F5F4E3bA2B6C4A3F4B2D2C3H2E1uhdcg1gH-9iI1C-22ve1==',
				toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|',
				'fontFamily', 'fontSize', 'color', 'inlineClass', 'inlineStyle', 'paragraphStyle', 'lineHeight', '|',
				'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent',
				'indent', 'quote', '-', 'insertLink', 'insertImage',
				'insertVideo', 'embedly', 'insertTable', '|', 'fontAwesome', 'specialCharacters',
				 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'spellChecker',
				 'help', 'html', '|', 'undo', 'redo'],

             // Set the image upload parameter.
						 imageUploadParam: 'image_param',

						 // Set the image upload URL.
						 imageUploadURL: '/admin/save_image_froala',

						 // Additional upload params.
						 imageUploadParams: {id: 'my_editor'},

						 // Set request type.
						 imageUploadMethod: 'POST',

						 // Set max image size to 5MB.
						 imageMaxSize: 5 * 1024 * 1024,

						 // Allow to upload PNG and JPG.
						 imageAllowedTypes: ['jpeg', 'jpg', 'png']
					 })
					 .on('froalaEditor.image.beforeUpload', function (e, editor, images) {

					 })
					 .on('froalaEditor.image.uploaded', function (e, editor, response) {
						 // Image was uploaded to the server.
						 console.log(response);
					 })
					 .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
						 // Image was inserted in the editor.
						 console.log(response);
					 })
					 .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
						 // Image was replaced in the editor.
						 console.log(response);
					 })
					 .on('froalaEditor.image.error', function (e, editor, error, response) {
						console.log(response);
						 // Bad link.
						 if (error.code == 1) { console.log("test1"); }

						 // No link in upload response.
						 else if (error.code == 2) { console.log("test2");  }

						 // Error during image upload.
						 else if (error.code == 3) {  console.log("test3"); }

						 // Parsing response failed.
						 else if (error.code == 4) { console.log("test4"); }

						 // Image too text-large.
						 else if (error.code == 5) { console.log("test5"); }

						 // Invalid image type.
						 else if (error.code == 6) {  console.log("test6");}

						 // Image can be uploaded only to same domain in IE 8 and IE 9.
						 else if (error.code == 7) { console.log("test7"); }

						 // Response contains the original server response to the request if available.
					 })
				.on('froalaEditor.image.removed', function (e, editor, $img) {
				$.ajax({
					// Request method.
					method: "POST",

					// Request URL.
					url: "/admin/save_image_remove",

					// Request params.
					data: {
						src: $img.attr('src')
					}
				})
				.done (function (data) {
					console.log ('image was deleted');
				})
				.fail (function () {
					console.log ('image delete problem');
				})
			})
		});

		$(document).on('input', '#posttitle-input', function(){
				var titleval = $(this).val().trim();
				var replaceVal = titleval.replace(/ /g,"-")
				$('#blogtitle-input').val(replaceVal);

				if(titleval != ""){
					$('#err-post-title').addClass('d-none');
				}
		});

		$(document).on('input', '#meta-textarea', function(){
			if($(this).val().trim() != ""){
				$('#err-post-meta').addClass('d-none');
			}
		});


		$(document).on('focusout', '#blogtitle-input', function(){
			var titleval = $(this).val().trim();
			var replaceVal = titleval.replace(/ /g,"-")
			$(this).val(replaceVal);
		});

		$(document).on('click', '#blog-delete', function(){
			var blog_ids = [];

			 $('input[name="chk_blog_id"]:checked').each(function () {
					blog_ids.push($(this).data('id'));
			});
			// console.log(blog_ids);
					$.ajax({
						url : '/admin/delete_blog',
						type : 'POST',
						data : {blog_ids : blog_ids},
						dataType: 'json',
						success : function(data) {
											if(data.success == 1)
													location.reload();
													//shownotif('success', 'Successfully Deleted!');
											else
													shownotif('error', 'Error Deleting!');
							}
						});

		});

		$(document).ready(function(){

		$("#blog-list-datatable").DataTable({
			keys:!0,
			order: [],
			language:{
				paginate:{
					previous:"<i class='mdi mdi-chevron-left'>",
					next:"<i class='mdi mdi-chevron-right'>"
				}},
				drawCallback:function(){
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
			});

			$("#basic-datatable").DataTable({
				keys:!0,
				order: [],
				language:{
					paginate:{
						previous:"<i class='mdi mdi-chevron-left'>",
						next:"<i class='mdi mdi-chevron-right'>"
					}},
					drawCallback:function(){
						$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
				});

		$(document).on('click', '#apply_action', function(){
			var blog_ids = [];

			var actionValue = $('#postaction-select').val();

			 $('input[name="chk_blog_id"]:checked').each(function () {
					blog_ids.push($(this).data('id'));
			});

			if(actionValue == "unpublish") {
				var alert = confirm("Are you sure you want to unpublish the post?");
				if(alert){

					$.ajax({
						url : '/admin/unpublish_blog',
						type : 'POST',
						data : {blog_ids : blog_ids},
						dataType: 'json',
						success : function(data) {
											if(data.success == 1)
													location.reload();
													//shownotif('success', 'Successfully Deleted!');
											else
													shownotif('error', 'Failed!');
							}
						});
				} else {
					return false;
				}
			}
		});

		$(document).on('click', '#publish_post', function(){
				 var blog_id = $(this).data('id');

					$.ajax({
						url : '/admin/publish_post',
						type : 'POST',
						data : {blog_id : blog_id},
						dataType: 'json',
						success : function(data) {
											if(data.success == 1)
													location.reload();
											else
													shownotif('error', 'Failed!');
							}

						});
		});

		$(document).on('click', '#seo_post', function(){
			var blog_id = $(this).data('id');

					var modal = $('#seo-modal').modal();

					$.ajax({
						url : '/admin/blogseoreport/'+blog_id,
						type : 'GET',
						data : '',
						dataType: 'json',
						success : function(data) {
								if(data.success == 1){
										$('#blog-seo-modal .modal-body').html(data.seo_body);
								}
								else
										shownotif('error', 'Error retrieving seo report.');
						}
				});
					$('#blog-seo-modal').modal('show');

		});

		$(document).on('click', '#share_post', function(){
			var blog_id = $(this).data('id');
			var url =$(this).data('url');

					$('#admin-share').jsSocials({
						shares: [
							{ share: "facebook", logo: "fa fa-facebook-f", css: "icons-sm fb-ic p-2"},
							{ share: "twitter", logo: "fa fa-twitter", css: "icons-sm tw-ic p-2"},
							{ share: "linkedin", logo: "fa fa-linkedin-in" , css: "icons-sm li-ic p-2"},
							{ share: "pinterest", logo: "fa fa-pinterest", css: "icons-sm li-ic p-2"},
							{ share: "googleplus", logo: "far fa-envelope", css: "icons-sm fb-ic p-2"},
						],
							url : url,
							showLabel: false,
							showCount: false,
							shareIn: "popup",
					});

				$('.jssocials-share-link').css('color', '#FF7622');

					$.ajax({
						url : '/admin/shareblogpost/'+blog_id,
						type : 'GET',
						data : '',
						dataType: 'json',
						success : function(data) {
								if(data.success == 1) {
										var alt = (data.blog_share_body.blog_images[0].caption) ? data.blog_share_body.blog_images[0].caption : data.blog_share_body.blog_images[0].file_upload_name;
										$('#blog_post_title').text(data.blog_share_body.blog_title);
										$('#blog_post_image').attr({'src':base_url+data.blog_share_body.blog_images[0].file_upload_path, 'alt': alt});
										$('#blog_post_preview').html(data.blog_share_body.blog_preview_text);
										$('#blog_post_url').val(base_url+'blog/'+data.blog_share_body.url_alias_value);
										$('#content-textarea').val(base_url+'blog/'+data.blog_share_body.url_alias_value);
								}
								else
										shownotif('error', 'Error retrieving blog report.');
						}
				});

				$('#blog-share-modal').modal('show');
		});

		$(document).on('click', '#btn_edit_post', function(){

			var blog_id  = $(this).data('id');

					window.location = '/admin/blog_editpost/'+blog_id;

		});

		$(document).on('change', '#postaction-select', function(){

			var blog_ids = [];

			 $('input[name="chk_blog_id"]:checked').each(function () {
					blog_ids.push($(this).data('id'));
			});

				if($(this).val() == 'delete' && blog_ids.length > 0){
						$('#blog-delete-alert-modal').modal('show');
				}
		});

		$(document).on('input', '#docscat-input', function(){
				var val = $(this).val();

				$('#custom-caturl-input').val(urlValidation(val));
				//remove special char
				$(this).val(val.replace(/[^A-Za-z0-9 .\-]/gi, ''));
		});

		$(document).on('input', '#custom-caturl-input', function(){
				var val = $(this).val();
				$(this).val(urlValidation(val));
		});

		// document category new
		$(document).on('submit', '#frm_new_doccat', function(e){
				e.preventDefault();

				var form = $(this).serialize();

				if ( $(this).data('requestRunning') ) {
					return;
				}

				$(this).data('requestRunning', true);

				$.ajax({
					url  : 	'/admin/docs_createcategory',
					type : 'POST',
					data : form,
					dataType: 'json',
					success : function(data) {
							if(data.success == 1)

										// $('#frm_new_doccat')[0].reset(),

										// shownotif('success', data.msg);
										window.location = '/admin/docs_manage_categories';

							else
										shownotif('error', data.msg);
						},
						complete: function() {
								$(this).data('requestRunning', false);
						}
					});

		});

		//document category datatable
		$("#document_category").DataTable({
			keys:!0,
			language:{
				paginate:{
					previous:"<i class='mdi mdi-chevron-left'>",
					next:"<i class='mdi mdi-chevron-right'>"
				}},
				drawCallback:function(){
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
			});

			// redirect document category edit page
			$(document).on('click', '#editdoc_category', function(){
				var document_cat_id = $(this).data('id');

				//if($('#categoryRadio'+document_cat_id).prop('checked')){
						window.location = '/admin/docs_editcat/'+document_cat_id;
			 //}

			});

		//document category edit
		$(document).on('submit', '#frm_edit_doccat', function(e){
			e.preventDefault();

			var form = $(this).serialize();

			$.ajax({
				url  : 	'/admin/docs_editcategory',
				type : 'POST',
				data : form,
				dataType: 'json',
				success : function(data) {
						if(data.success == 1)

									//shownotif('success', data.msg);
									window.location = '/admin/docs_manage_categories';

						else
									shownotif('error', data.msg);
					}
				});
		});

		$(document).on('click', '#doc_categorystatus', function(){

				var document_cat_id = $(this).data('id');

				//if($('#categoryRadio'+document_cat_id).prop('checked')){

						$('#document-unpublish-modal').modal('show');
						$('#unpublish_documentcat').attr("data-id", document_cat_id);
						$('#publish_documentcat').attr("data-id", document_cat_id);
			 //}

		});

		$(document).on('click', '#unpublish_documentcat', function(){

				var document_cat_id = $(this).data('id');

				$.ajax({
					url  : 	'/admin/unpublish_document_category',
					type : 'POST',
					data : {document_category_id : document_cat_id},
					dataType: 'json',
					success : function(data) {
							if(data.success == 1)

										window.location = '/admin/docs_manage_categories';

							else
										shownotif('error', data.msg);
						}
					});
		});

		$(document).on('click', '#publish_documentcat', function(){

			var document_cat_id = $(this).data('id');

			$.ajax({
				url  : 	'/admin/publish_document_category',
				type : 'POST',
				data : {document_category_id : document_cat_id},
				dataType: 'json',
				success : function(data) {
						if(data.success == 1)

									window.location = '/admin/docs_manage_categories';

						else
									shownotif('error', data.msg);
					}
				});
	});

		$(document).on('click', '#doc_deletecategory', function(){

					var document_cat_id = $(this).data('id');

					//if($('#categoryRadio'+document_cat_id).prop('checked')){

						$('#doc-category-modal').modal('show');

						$('#confirm_doccategory_delete').attr("data-id", document_cat_id);

					//}
		});

		//delete document category modal
		$(document).on('click', '#confirm_doccategory_delete', function(){

			var document_cat_id = $(this).data('id');

			$.ajax({
				url  : 	'/admin/delete_document_category',
				type : 'POST',
				data : {document_category_id : document_cat_id},
				dataType: 'json',
				success : function(data) {
						if(data.success == 1)

									window.location = '/admin/docs_manage_categories';

						else
									shownotif('error', data.msg);
					}
				});
		});

		//document category datatable
		$("#content_document").DataTable({
			keys:!0,
			order: [],
			language:{
				paginate:{
					previous:"<i class='mdi mdi-chevron-left'>",
					next:"<i class='mdi mdi-chevron-right'>"
				}},
				drawCallback:function(){
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
			});

		if($('#document-form').length > 0 ){

			var token = false;
			var myDropzone1 = new Dropzone("#document-form", {
				url: "/admin/new_document",
				autoProcessQueue: false,
				maxFiles: 1,
				maxFilesize:100,
				parallelUploads: 10000,
				addRemoveLinks: true,
				acceptedFiles: ".doc,.docx,.xls,.xlsx,.pps,.ppt,.pptx,.pdf,.pages,.ai,.psd,.tif,.tiff,.dxf,.svg,.eps,.ps,.ttf,.xps",
				paramName: "myFile", // The name that will be used to transfer the file
				data: $("#frm-new-document").serializeArray(),
				//previewsContainer: '#my-awesome-dropzone',
				init:function(){

						var myDropzone1 = this;
						//console.log(myDropzone1);
						$(document).on("submit", "#frm-new-document", function(e){
								// Make sure that the form isn't actually being sent.
								e.preventDefault();
								e.stopPropagation();

				if(!token){
					token = true;
									if (myDropzone1.getQueuedFiles().length > 0) {
											$('#err-document-dropzone').addClass("d-none");
											myDropzone1.processQueue();

									}else{
										 myDropzone1.removeAllFiles(true);
										 $('#err-document-dropzone').removeClass("d-none");
										 token = false;
										 return;
									}
				}else{
					return;
				}
						});

						// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
						// of the sending event because uploadMultiple is set to true.
						this.on("sendingmultiple", function() {

						});

						this.on("successmultiple", function(files, response) {

						});

						this.on("success", function(file, responseText) {
									if(responseText.success == false){

									}else{
											window.location.href = "/admin/content_document";
											//console.log(responseText);
									}
						});
						this.on("error", function(files, response) {
								//alert("Please Try Again!");
								token = false;
								// this.removeAllFiles();
						});
						this.on("totaluploadprogress", function(progress) {

								//console.log(progress);
						});

						this.on("sending", function(file, xhr, formData){

						formData.append('document_name', $("input[name=document_name]").val());
						formData.append('document_description', $("textarea[name=document_description]").val());
						formData.append('document_category', $("select[name=document_category]").val());
						formData.append('document_permission', $("select[name=document_permission]").val());
						formData.append('user_id', $("input[name=user_id]").val());
						var serial = $("#frm-new-document").serializeArray();

						});
				}
			});
		}

		$(document).on('click', '#publish_document', function(){
			var document_id = $(this).data('id');

				// if($('#Document1Check'+document_id).prop('checked')){

					$.ajax({
						url  : 	'/admin/publish_document',
						type : 'POST',
						data : {document_id : document_id},
						dataType: 'json',
						success : function(data) {
								if(data.success == 1)

											window.location = '/admin/content_document';

								else
											shownotif('error', data.msg);
							}
						});
				// }

		});

		var document_ids = [];

		$(document).on('click', '#document_action', function(){
				var doc_ids = [];

				var value = $('#document-select').val();

				$('input[name="chk_doc_id"]:checked').each(function () {
						doc_ids.push($(this).data('id'));
				});

				if(value == "unpublish"){
						if(doc_ids.length > 0 ){
								$.ajax({
											url  : 	'/admin/unpublish_document',
											type : 'POST',
											data : {doc_ids : doc_ids},
											dataType: 'json',
											success : function(data) {
													if(data.success == 1)

																window.location = '/admin/content_document';

													else
																shownotif('error', data.msg);
												}
											});
							}
				}
		});

		$(document).on('change', '#document-select', function(){
					var doc_ids = [];

					$('input[name="chk_doc_id"]:checked').each(function () {
						doc_ids.push($(this).data('id'));
					});

					if($(this).val() == 'delete'){
						if(doc_ids.length > 0 ){
							$('#document-alert-modal').modal('show');
							document_ids = doc_ids;
						}
					}
		});

		$(document).on('click', '#cfrm-delete-document', function(){

					$.ajax({
						url  : 	'/admin/delete_document',
						type : 'POST',
						data : {doc_ids : document_ids},
						dataType: 'json',
						success : function(data) {
								if(data.success == 1)

											window.location = '/admin/content_document';

								else
											shownotif('error', data.msg);
							}
						});
		});

		$(document).on('click', '#edit_document', function(){
			var document_id = $(this).data('id');

				//if($('#Document1Check'+document_id).prop('checked')){

						window.location = '/admin/document_edit/'+document_id;
				//}

		});

		$(document).on('click', '#preview_document', function(){
				var alias = $(this).data('alias');

				window.open('/documents/'+alias, '_blank');

		});

		if($('#document-editform').length > 0 ){

			var token = false;
			var myDropzone2 = new Dropzone("#document-editform", {
				url: "/admin/edit_document",
				autoProcessQueue: false,
				maxFiles: 1,
				maxFilesize:100,
				parallelUploads: 10000,
				addRemoveLinks: true,
				acceptedFiles: ".doc,.docx,.xls,.xlsx,.pps,.ppt,.pptx,.pdf,.pages,.ai,.psd,.tif,.tiff,.dxf,.svg,.eps,.ps,.ttf,.xps",
				paramName: "myFile", // The name that will be used to transfer the file
				data: $("#frm-edit-document").serializeArray(),

				init:function(){

						var myDropzone2 = this;

						$(document).on("submit", "#frm-edit-document", function(e){
								// Make sure that the form isn't actually being sent.
								e.preventDefault();
								e.stopPropagation();

				if(!token){
					token = true;
									if (myDropzone2.getQueuedFiles().length > 0) {
										  myDropzone2.processQueue();

									}else{
										var serial = $("#frm-edit-document").serializeArray();

										$.ajax({
											url  : 	'/admin/edit_document',
											type : 'POST',
											data : serial,
											dataType: 'json',
											success : function(data) {
													if(data.success == 1)
																// console.log(data);
																window.location = '/admin/content_document';

													else
																shownotif('error', data.msg);
												}
											});
									}
				}else{
					return;
				}
						});
						// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
						// of the sending event because uploadMultiple is set to true.
						this.on("sendingmultiple", function() {

						});

						this.on("successmultiple", function(files, response) {

						});

						this.on("success", function(file, responseText) {
									if(responseText.success == false){

									}else{
											window.location.href = "/admin/content_document";
									}
						});
						this.on("error", function(files, response) {
								token = false;
						});
						this.on("totaluploadprogress", function(progress) {
								//console.log(progress);
						});

						this.on("sending", function(file, xhr, formData){

						formData.append('document_name', $("input[name=document_name]").val());
						formData.append('document_description', $("textarea[name=document_description]").val());
						formData.append('document_caption', $("input[name=document_caption]").val());
						formData.append('document_id', $("input[name=document_id]").val());
						formData.append('document_category', $("select[name=document_category]").val());
						formData.append('document_permission', $("select[name=document_permission]").val());
						formData.append('document_downloadlink', $("input[name=document_downloadlink]").val());
						formData.append('document_linkview', $("input[name=document_linkview]").val());
						formData.append('document_status', $("input[name=document_status]:checked").val());

						var serial = $("#frm-edit-document").serializeArray();

						});
				}
			});
		}

		$(document).on('input', '#doc1link-input', function(){
				var val = $(this).val();
				$(this).val(urlValidation(val));
		});

		$(document).on('input', '#doc1download-input', function(){
			var val = $(this).val();
			$(this).val(urlValidation(val));
		});

		function urlValidation(val)
		{
			var pattern = " ";

			re = new RegExp(pattern, "g");

			val = val.replace(re, '-');

			val = val.replace(/[^A-Za-z0-9.\-]/gi, '');

			return val.toLowerCase();
		}

		$(document).on('click', '#feature_post', function(){
				var blog_id = $(this).data('id');

				//$('#Blog1Check'+blog_id+':checked').each(function () {

							$.ajax({
								url  : 	'/admin/blog_featured',
								type : 'POST',
								data : {blog_id : blog_id },
								dataType: 'json',
								success : function(data) {
										if(data.success == 1)
													window.location = '/admin/content_blogs';
										else
													shownotif('error', data.msg);
									}
								});
				//});
		});

		$(document).on('click', '#preview_post', function(){
				var alias = $(this).data('alias');

				window.open('/blog/'+alias, '_blank');
		});

		// Events js
		/* froala for email */
		// Save state+
		$('a#events-email-text-save').on('click', function (e) {
			e.preventDefault();
			if($('.fr-element').html() == '<p><br></p>'){
				$('#froalaHidden').val('');
			}
			else {
				$('#froalaHidden').val($('.fr-element').html());
			}
			if ($('div#froala-editor').data('froala.editor')) {
				$('div#froala-editor').froalaEditor('destroy');
				$('a#events-email-text-save').hide();
				$('a#events-email-text-edit').show();
			}
		});

		// Edit
		$('a#events-email-text-edit').on('click', function (e) {
			e.preventDefault();
			if (!$('div#froala-editor').data('froala.editor')) {
				$('div#froala-editor').froalaEditor();
				$('a#events-email-text-edit').hide();
				$('a#events-email-text-save').show();
			}
		});
		/* end froala for email */

		/* preview tab */
		$("#preview_emailbtn").on('click', function(){
			$('#preview-event-title').html($("input[name='event_title']").val());
			$('#preview-event-start').html($("input[name='event_start_time']").val());
			$('#preview-event-end').html($("input[name='event_end_time']").val());
			$('#preview-event-org').html($("input[name='event_host']").val());
			$('#preview-event-location').html($("input[name='event_location']").val());
			$('#preview-event-address').html($("input[name='event_address']").val());
			$('#preview-event-invitees').html($("input[name='event_email_event']").val());
			$('#preview-event-subject').html($("input[name='event_email_subject']").val());
			$('#preview-event-text').html($("textarea[name='event_email_message']").val());

			$('.preview-event-text').html($("textarea[name='event_email_message']").val());

			$('#formAddEvent').submit();
		});
		/* end preview tab */

		/* Add event */
		// $(document).on('submit', '#formAddEvent', function(){
		// 	console.log("asdasd");
		// 	$.ajax({
		// 		url  : 	'/admin/add_event',
		// 		type : 'POST',
		// 		data : $('#formAddEvent').serialize(),
		// 		dataType: 'json',
		// 		success : function(data) {
		// 				if(data.success == 1)
		// 					window.location = '/admin/events';
		// 				else
		// 					shownotif('error', data.msg);
		// 		},
		// 		error:function(error) {
		// 			console.error(error.responseText);
		// 		}
		// 		});
		// });


		$('#formAddEvent').on('submit', function(e) {
			e.preventDefault();



			var startDate = new Date($('input[name="event_start_time"]').val());
			var endDate = new Date($('input[name="event_end_time"]').val());
			var valid_dates = true;

			if(endDate.getTime() <= startDate.getTime()){
					valid_dates = false;
					$('#btnwizard').bootstrapWizard('show', 0);
					shownotif('error', 'Event End Time should be after the event start time!');
		      return false;
			}



				$.ajax({
					url  : 	'/admin/add_event',
					type : 'POST',
					data : $('#formAddEvent').serialize(),
					dataType: 'json',
					async: false,
					success : function(data) {
							if(data.success == 1){
								$('#currentId').val(data.id);
								$('input[name="event_id"]').val(data.id);
								if( $( '[data-toggle="tab"]' ).hasClass('disabled') ){
									$( '[data-toggle="tab"]' ).removeClass('disabled');
									$("#btnwizard").bootstrapWizard('next');

									if( data.alias ){
										$('a#event_preview').attr('href', data.alias);
									}

									// window.location = '/admin/events';
									$('div#vEventTitle').html( data.res[0].event_title );
									$('div#vStartDate').html( data.res[0].event_start_time );
									$('div#vEndDate').html( data.res[0].event_end_time );
									$('div#vOrganization').html( data.res[0].event_host );
									$('div#vLocation').html( data.res[0].event_location );
									$('div#vEventAddress').html( data.res[0].event_details );
									$('div#vInvitees').html( data.res[0].event_email_event );
									$('div#vSubject').html( data.res[0].event_email_subject );
									$('div#vEmailText').html( data.res[0].event_email_message );
								}

							} else {
								//$("#btnwizard").bootstrapWizard('previous');
								//$( '[data-toggle="tab"]' ).addClass('disabled');
								shownotif('error', data.msg);
							}

					},
					error:function(error) {
						console.log($('#formAddEvent').serialize());
						console.error(error.responseText);
					}
					});

		});



		$('#btn_event_save_draft').on('click', function(){
			$.ajax({
				url  : 	'/admin/add_event',
				type : 'POST',
				data : $('#formAddEvent').serialize(),
				dataType: 'json',
				success : function(data) {

						if(data.success == 1){
							$('#currentId').val(data.id);
							$('input[name="event_id"]').val(data.id);

								// window.location = '/admin/events';
								$('div#vEventTitle').html( data.res[0].event_title );
								$('div#vStartDate').html( data.res[0].event_start_time );
								$('div#vEndDate').html( data.res[0].event_end_time );
								$('div#vOrganization').html( data.res[0].event_host );
								$('div#vLocation').html( data.res[0].event_location );
								$('div#vEventAddress').html( data.res[0].event_details );
								$('div#vInvitees').html( data.res[0].event_email_event );
								$('div#vSubject').html( data.res[0].event_email_subject );
								$('div#vEmailText').html( data.res[0].event_email_message );

								shownotif('success', "Save as Draft");
						} else {
							shownotif('error', data.msg);
						}

				},
				error:function(error) {
					console.log($('#formAddEvent').serialize());
					console.error(error.responseText);
				}
				});


		});

		$('#btn_event_preview').on('click', function(){
			$.ajax({
				url  : 	'/admin/add_event',
				type : 'POST',
				data : $('#formAddEvent').serialize(),
				dataType: 'json',
				success : function(data) {

						if(data.success == 1){
							$('#currentId').val(data.id);
							$('input[name="event_id"]').val(data.id);

								// window.location = '/admin/events';
								$('div#vEventTitle').html( data.res[0].event_title );
								$('div#vStartDate').html( data.res[0].event_start_time );
								$('div#vEndDate').html( data.res[0].event_end_time );
								$('div#vOrganization').html( data.res[0].event_host );
								$('div#vLocation').html( data.res[0].event_location );
								$('div#vEventAddress').html( data.res[0].event_details );
								$('div#vInvitees').html( data.res[0].event_email_event );
								$('div#vSubject').html( data.res[0].event_email_subject );
								$('div#vEmailText').html( data.res[0].event_email_message );

								window.open(base_url+'?event_id=' + data.id,'_blank');

						} else {
							shownotif('error', data.msg);
						}

				},
				error:function(error) {
					console.log($('#formAddEvent').serialize());
					console.error(error.responseText);
				}
				});


		});

		$('#btn_event_edit').on('click', function(){

			// window.open(, '_blank');

			$.ajax({
				url  : 	'/admin/add_event',
				type : 'POST',
				data : $('#formAddEvent').serialize(),
				dataType: 'json',
				success : function(data) {

						if(data.success == 1){
							$('#currentId').val(data.id);
							$('input[name="event_id"]').val(data.id);


								// window.location = '/admin/events';
								$('div#vEventTitle').html( data.res[0].event_title );
								$('div#vStartDate').html( data.res[0].event_start_time );
								$('div#vEndDate').html( data.res[0].event_end_time );
								$('div#vOrganization').html( data.res[0].event_host );
								$('div#vLocation').html( data.res[0].event_location );
								$('div#vEventAddress').html( data.res[0].event_details );
								$('div#vInvitees').html( data.res[0].event_email_event );
								$('div#vSubject').html( data.res[0].event_email_subject );
								$('div#vEmailText').html( data.res[0].event_email_message );

								window.open(base_url + 'event/' + data.res[0].url_alias_value,'_blank');


						} else {
							shownotif('error', data.msg);
						}

				},
				error:function(error) {
					console.log($('#formAddEvent').serialize());
					console.error(error.responseText);
				}
				});


		});


		$('#add_event_btn').on('click', function(){
			$(this).attr('disabled', true);

			$.ajax({
				url  : 	'/admin/add_event',
				type : 'POST',
				data : $('#formAddEvent').serialize(),
				dataType: 'json',
				success : function(data) {
						$(this).attr('disabled', false);
						if(data.success == 1) {
							shownotif('success', "Event Saved!");
							setTimeout(function(){ window.location = '/admin/events_manage'; }, 1000);
						} else {
							shownotif('error', data.msg);
						}



				},
				error:function(error) {
					$(this).attr('disabled', false);
					console.log($('#formAddEvent').serialize());
					console.error(error.responseText);
				}
				});

		});
		$('#edit_event_btn').on('click', function(){
			$.ajax({
				url  : 	'/admin/update_event',
				type : 'POST',
				data : $('#formAddEvent').serialize(),
				dataType: 'json',
				success : function(data) {
					if(data.success == 1) {

						console.log( data );
						// window.location = '/admin/events';
						$('div#vEventTitle').html( data.res[0].event_title );
						$('div#vStartDate').html( data.res[0].event_start_time );
						$('div#vEndDate').html( data.res[0].event_end_time );
						$('div#vOrganization').html( data.res[0].event_host );
						$('div#vLocation').html( data.res[0].event_location );
						$('div#vEventAddress').html( data.res[0].event_details );
						$('div#vInvitees').html( data.res[0].event_email_event );
						$('div#vSubject').html( data.res[0].event_email_subject );
						$('div#vEmailText').html( data.res[0].event_email_message );

						shownotif('success', "Event Saved!");
					} else {
						shownotif('error', data.msg);
					}
				},
				error:function(error) {
					console.log($('#formAddEvent').serialize());
					console.error(error.responseText);
				}
				});
		});

		$('#delete_img').on('click', function(){
				var file_upload_id = $('input[name="file_upload_id"]').val();
				var event_id = $('input[name="event_id"]').val();
				$.post('/admin/event_delete_img', { event_id : event_id, file_upload_id : file_upload_id }, function(data){

				},'json' ).done(function(data){
					console.log(data);
					if(data.success == 1) {
						$('#file-previews').html("");
						$('input[name="file_upload_id"]').val("0");
						$('#delete_img').hide();
						myDropzone.removeAllFiles();
						shownotif('success', data.msg);
					} else {
						shownotif('error', data.msg);
					}
				});
		});

		function UpdateEventDetailsView(){

			console.log( $('textarea[name="event_email_event"]').text() );
			// console.log( $('textarea[name="event_email_subject"]').text() );
			// console.log( $('textarea[name="event_email_event"]').text() );

			$('div#vEventTitle').html( $('input[name="event_title"]').val() );
			$('div#vStartDate').html($('input[name="event_start_time"]').val() );
			$('div#vEndDate').html( $('input[name="event_end_time"]').val() );
			$('div#vOrganization').html( $('input[name="event_host"]').val() );
			$('div#vLocation').html( $('input[name="event_location"]').val() );
			$('div#vEventAddress').html( $('textarea[name="event_details"]').text() );
			$('div#vInvitees').html( $('#emails-textarea').text() );
			$('div#vSubject').html( $('input[name="event_email_subject"]').val() );
			$('div#vEmailText').html( $('#event_invite_email_text').froalaEditor('html.get').text() );
		}



		$('body').on('keyup', 'input[name="event_email_subject"]', function(){

			$('div#vSubject').html( $(this).val() );
		});

		$('body').on('keyup', 'textarea[name="event_details"]', function(){

			$('div#vEventAddress').html( $(this).text() );
		});

		$('body').on('keyup', 'textarea[name="event_email_event"]', function(){
			$('div#vInvitees').html( $(this).text() );
		});

		$('body').on('keyup', 'textarea[name="event_email_message"]', function(){
			console.log("TSG : " + $('#event_invite_email_text').froalaEditor('html.get').text());
			$('div#vEmailText').html( $('#event_invite_email_text').froalaEditor('html.get').text() );
		});

		/* end add event */

		/* FullCalendar */
		let today = new Date().toISOString().slice(0, 10)
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: today,
			defaultView: 'month',
			editable: true,
			droppable: true,
			dayClick: function(date, jsEvent, view) {
				$("#event-modal").modal("show");
			},
			eventClick: function(date, jsEvent, view) {
				$("#event-modal").modal("show");
			},
			drop: function() {
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			},
			events: '/admin/get_events'
		});
		/* end fullcalendar */

		$(document).on('click', '#viewdoc_category', function(){
			var document_cat_id = $(this).data('id');
			var url = $(this).data('url');

					window.open(url, '_blank');
		});

		$(document).on('submit', '#frm_sendEmail', function(e){
			e.preventDefault();

			var formData  = $(this).serialize();
			$.ajax({
				url  : 	'/admin/sendEmail',
				type : 'POST',
				data : formData,
				dataType: 'json',
				success : function(data) {
						if(data.success == 1) {
							shownotif('success', data.msg);
							$('#frm_sendEmail').trigger("reset");
							$('#blog-share-modal').modal('hide');
						}
						else {
							shownotif('error', data.msg);
						}
				},
				});
		});

		$('#page_accordion').on('hidden.bs.collapse', function () {
			  Cookies.set('page_accordion_state', 'hide');
		});

		$('#page_accordion').on('shown.bs.collapse', function () {
			  Cookies.set('page_accordion_state', 'show');
		});

		$("#event_category_table").DataTable({
			keys:!0,
			language:{
				paginate:{
					previous:"<i class='mdi mdi-chevron-left'>",
					next:"<i class='mdi mdi-chevron-right'>"
				}},
				drawCallback:function(){
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
				});

		/*
		$(".basic-datatable").DataTable({
			keys:!0,
			aaSorting: [],
			language:{
				paginate:{
					previous:"<i class='mdi mdi-chevron-left'>",
					next:"<i class='mdi mdi-chevron-right'>"
				}},
				drawCallback:function(){
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
		});
		*/

		$(document).on('click', '#save-event-category', function () {
				var formData = $('#frm_event_category').serialize();

				if($('#event_category_name').val() == ""){
				  	$('#err-category-name').removeClass('d-none');
						return false;
				} else{
					  $('#err-category-name').addClass('d-none');
				}

				if ($('input[name=category_color]:checked').length <= 0) {
						$('#err-category').removeClass('d-none');
						return false;
				} else{
					  $('#err-category').addClass('d-none');
				}

				$.ajax({
							url: '/admin/event_new_category',
							type: 'POST',
							data: formData,
							dataType: 'json',
							success: function( data ) {
								if(data.success == 1)
										 //shownotif('success', "Successfully created Event Category");
										 location.reload();
								else
										 shownotif('error', "Saving failed");
							}
				});
		});

		$(document).on('click', '#event-category', function(e) {
					 e.preventDefault();

					var color = $(this).data('color');

					$('#edit_category_name').val($(this).data('name'));
					$('#event_category_id').val($(this).data('id'));
					$("#edit_category_color[value="+color+"]"). prop("checked", true);
					$('#edit-event-category').modal('show');
		});

		$(document).on('click', '#save-edit-category', function () {
				var formData = $('#frm-edit-event').serialize();

				if($('#edit_category_name').val() == ""){
						$('#err-edit-category-name').removeClass('d-none');
						return false;
				} else{
						$('#err-edit-category-name').addClass('d-none');
				}

				if ($('input[name=edit_category_color]:checked').length <= 0) {
						$('#err-edit-category').removeClass('d-none');
						return false;
				} else{
						$('#err-edit-category').addClass('d-none');
				}

				$.ajax({
							url: '/admin/event_edit_category',
							type: 'POST',
							data: formData,
							dataType: 'json',
							success: function( data ) {
								if(data.success == 1)
										//shownotif('success', "Successfully created Event Category");
										location.reload();
								else
										shownotif('error', data.msg);
							}
				});
		});

		$(document).on('click', '#delete-category-event', function(e) {
						e.preventDefault();
						var event_category_id = $(this).data('id');

						$('#cfrm-delecategory').attr('data-id', event_category_id);
						$('#delete-event-alert').modal('show');
		});

		$(document).on('click', '#cfrm-delecategory', function(e) {
						e.preventDefault();
						var event_category_id = $(this).data('id');

						$.ajax({
							url: '/admin/event_delete_category',
							type: 'POST',
							data: {event_category_id : event_category_id},
							dataType: 'json',
							success: function( data ) {
								if(data.success == 1)
										//shownotif('success', "Successfully created Event Category");
										location.reload();
								else
										shownotif('error', "Updating failed");
							}
					});
		});

		$(document).on('click', '#event-delete', function(e) {
					e.preventDefault();
					var event_id = $(this).data('id');
					$('#cfrm-edelete').attr('data-id', event_id);
					$('#event-alert-modal').modal('show')
		});

		$(document).on('click', '#cfrm-edelete', function() {
					var event_id = $(this).data('id');

					$.ajax({
						url: '/admin/event_delete',
						type: 'POST',
						data: {event_id : event_id},
						dataType: 'json',
						success: function( data ) {
							if(data.success == 1)
									//shownotif('success', "Successfully created Event Category");
									location.reload();
							else
									shownotif('error', "Updating failed");
						}
				});
		});

	// Blog Post : Add and Draft with Dropzone
	if($('#frm_blog_post').length > 0) {

		const dropzones = []
		$('.dropzone').each(function(i, el){
			const name = $(this).find($('input[type="file"]')).attr('name');
			var myDropzone = new Dropzone(el, {
				url: window.location.pathname,
				autoProcessQueue: false,
				acceptedFiles: 'image/*',
				uploadMultiple: false,
				parallelUploads: 100,
				maxFiles: 1,
				paramName: name,
				addRemoveLinks: true,
			})

			myDropzone.on("addedfile", function(file) {

        var removeButton = Dropzone.createElement('<button type="button" class="btn btn-danger btn-icon btn-rounded" value="submit"><i class="mdi mdi-delete"></i>&nbsp;Delete Image</button> ');

				var _this = this;

        removeButton.addEventListener("click", function(e) {

          e.preventDefault();
          e.stopPropagation();

          _this.removeFile(file);

				});

				myDropzone.on("thumbnail", function(files){
					if(files.status != "error"){
						$('.dz-delete-preview'+i).html(removeButton);
					}
			 });

      });

			myDropzone.on("error", function(file, errorMessage ) {
				myDropzone.removeFile(file);
				shownotif('error', errorMessage);
			});

			dropzones.push(myDropzone)
		})

		$(document).on('click', '#add_draft_post', function(e){
    // Make sure that the form isn't actually being sent.
    e.preventDefault();
		e.stopPropagation();

		$('#add_save_type').attr('name', 'post_draft');

		let form = new FormData($('#frm_blog_post')[0]);

		dropzones.forEach(dropzone => {

      let  { paramName }  = dropzone.options
      dropzone.files.forEach((file, i) => {
				form.append(paramName, file)
      })
		})
		//console.log(dropzones[0].files);
		var posttitle = $('#posttitle-input').val();

		var postmeta  = $('#meta-textarea').val();

		if(posttitle == "" ){
			$('#err-post-title').removeClass('d-none');
			$('#posttitle-input').focus();
			return false;
		}

		if(postmeta == "" ){
			$('#err-post-meta').removeClass('d-none');
			$('#meta-textarea').focus();
			return false;
		}

		if(dropzones[0].files.length < 1){
			$('#err-post-img1').removeClass('d-none');
			$('#image1caption-input').focus();
			return false;
		}

		if ( $(this).data('requestRunning') ) {
			return;
		}

		$(this).data('requestRunning', true);

    $.ajax({
				url : '/admin/add_post',
        method: 'POST',
				data: form,
				dataType: 'json',
        processData: false,
        contentType: false,
        success : function(data) {
					if(data.success == 1)
									window.location = '/admin/content_blogs';
						else
									shownotif('error', data.msg);
					},
					complete: function() {
							$(this).data('requestRunning', false);
					}
			});
		});

		$(document).on('click', '#add_publish_post', function(e){

			e.preventDefault();
			e.stopPropagation();

			$('#add_save_type').attr('name', 'post_published');

			let form = new FormData($('#frm_blog_post')[0]);

			dropzones.forEach(dropzone => {

				let  { paramName }  = dropzone.options
				dropzone.files.forEach((file, i) => {

					form.append(paramName, file)
				})
			})

			var posttitle = $('#posttitle-input').val();

			var postmeta  = $('#meta-textarea').val();

			if(posttitle == "" ){
				$('#err-post-title').removeClass('d-none');
				$('#posttitle-input').focus();
				return false;
			}

			if(postmeta == "" ){
				$('#err-post-meta').removeClass('d-none');
				$('#meta-textarea').focus();
				return false;
			}

			if(dropzones[0].files.length < 1){
				$('#err-post-img1').removeClass('d-none');
				$('#image1caption-input').focus();
				return false;
			}

			if ( $(this).data('requestRunning') ) {
				return;
			}

			$(this).data('requestRunning', true);

			$.ajax({
					url : '/admin/add_post',
					method: 'POST',
					data: form,
					dataType: 'json',
					processData: false,
					contentType: false,
					success : function(data) {
						if(data.success == 1)
										window.location = '/admin/content_blogs';
							else
										shownotif('error', data.msg);
						},
						complete: function() {
								$(this).data('requestRunning', false);
						}
				});
			});


		$(document).on('click', '#preview_unsavepost', function(e) {
			e.preventDefault();
			e.stopPropagation();

				let form = new FormData($('#frm_blog_post')[0]);

			dropzones.forEach(dropzone => {

				let  { paramName }  = dropzone.options
				dropzone.files.forEach((file, i) => {
					form.append(paramName, file)
				})
			})

			var posttitle = $('#posttitle-input').val();

			var postmeta  = $('#meta-textarea').val();

			if(posttitle == "" ){
				$('#err-post-title').removeClass('d-none');
				return false;
			}

			if(postmeta == "" ){
				$('#err-post-meta').removeClass('d-none');
				$('#meta-textarea').focus();
				return false;
			}

			if(dropzones[0].files.length < 1){
				$('#err-post-img1').removeClass('d-none');
				$('#image1caption-input').focus();
				return false;
			}

					$.ajax({
						url  : 	'/admin/preview_unsavepost',
						type : 'POST',
						data : form,
						dataType: 'json',
						contentType: false,
						processData: false,
						success : function( data ) {
							if(data.success == 1)
								window.open('/admin/preview_blog', '_blank');
							}
					});
			});
		}

		//Blog : Edit and Draft
		if($('#edit_frm_blog_post').length > 0) {

			const dropzones = []
			$('.dropzone').each(function(i, el){
				const name = $(this).find($('input[type="file"]')).attr('name');
				var myDropzone = new Dropzone(el, {
					url: window.location.pathname,
					autoProcessQueue: false,
					acceptedFiles: 'image/*',
					uploadMultiple: false,
					parallelUploads: 100,
					maxFiles: 1,
					paramName: name,
					addRemoveLinks: true,
				})

				myDropzone.on("error", function(file, errorMessage ) {
					myDropzone.removeFile(file);
					shownotif('error', errorMessage);
				});

				myDropzone.on("addedfile", function(file) {

						var removeButton = Dropzone.createElement('<button type="button" id="preview_existing_delete" class="btn btn-danger btn-icon btn-rounded" value="submit"><i class="mdi mdi-delete"></i>&nbsp;Delete Image</button>');

						var _this = this;

						removeButton.addEventListener("click", function(e) {
						e.preventDefault();
						e.stopPropagation();

						_this.removeFile(file);

							var id = $(this).parent().data('id');
							var name = $(this).parent().data('name');
							var file_id = $('#blog_file_upload_id').data('id');
							var preview_button = $(this);

							if(name != "") {

									$.ajax({
										url  : 	'/admin/remove_blog_image',
										type : 'POST',
										data : {file_upload_id : id},
										dataType: 'json',
										success : function(data) {
												if(data.success == 1)
															$('.preview_existing_blog'+id+'').remove();
															$(preview_button).parent().attr('data-name', "");
											}
										});

										if(id == file_id) {
											$('#blog_file_upload_id').val("");
										}
								}
						});

						myDropzone.on("thumbnail", function(files){
							if(files.status != "error"){
								$('.dz-delete-preview'+i).html(removeButton);
							}
					});
				});

				dropzones.push(myDropzone)
			})

			$(document).on('click', '#edit_save_draft', function(e) {
				e.preventDefault();

				$('#edit_save_type').attr('name', 'post_draft');

				let form = new FormData($('#edit_frm_blog_post')[0])

				dropzones.forEach(dropzone => {

					let  { paramName }  = dropzone.options
					dropzone.files.forEach((file, i) => {
						form.append(paramName, file)
					})
				})

				var posttitle = $('#posttitle-input').val();
				var postmeta  = $('#meta-textarea').val();
				var file_val  = $('#blog_file_upload_id').val();
				var post_status = $('#blog_status').val();
				var url = "";

				if(posttitle == "" ){
					$('#err-post-title').removeClass('d-none');
					return false;
				}

				if(postmeta == "" ){
					$('#err-post-meta').removeClass('d-none');
					$('#meta-textarea').focus();
					return false;
				}

				if(dropzones[0].files.length < 1 && file_val == ""){
					$('#err-post-img1').removeClass('d-none');
					$('#image1caption-input').focus();
					return false;
				}

				if(post_status == 1){
						url = "/admin/add_post";
				} else {
						url = "/admin/edit_post";
				}

				if ( $(this).data('requestRunning') ) {
					return;
				}

				$(this).data('requestRunning', true);

						$.ajax({
							url  : url,
							type : 'POST',
							data : form,
							dataType: 'json',
							contentType: false,
							processData: false,
							success : function(data) {
									if(data.success == 1)
												window.location = '/admin/content_blogs';
									else
												shownotif('error', data.msg);
								},
								complete: function() {
										$(this).data('requestRunning', false);
								}
							});
		});

		$(document).on('click', '#edit_publish_post', function(e) {
			e.preventDefault();

			$('#edit_save_type').attr('name', 'post_published');

			let form = new FormData($('#edit_frm_blog_post')[0])

			dropzones.forEach(dropzone => {

				let  { paramName }  = dropzone.options
				dropzone.files.forEach((file, i) => {
					form.append(paramName, file)
				})
			})

			var posttitle = $('#posttitle-input').val();
			var postmeta  = $('#meta-textarea').val();
			var file_val  = $('#blog_file_upload_id').val();

			if(posttitle == "" ){
				$('#err-post-title').removeClass('d-none');
				return false;
			}

			if(postmeta == "" ){
				$('#err-post-meta').removeClass('d-none');
				$('#meta-textarea').focus();
				return false;
			}

			if(dropzones[0].files.length < 1 && file_val == ""){
				$('#err-post-img1').removeClass('d-none');
				$('#image1caption-input').focus();
				return false;
			}

			if ( $(this).data('requestRunning') ) {
				return;
			}

			$(this).data('requestRunning', true);

					$.ajax({
						url  : 	'/admin/edit_post',
						type : 'POST',
						data : form,
						dataType: 'json',
						contentType: false,
						processData: false,
						success : function(data) {
								if(data.success == 1)
											window.location = '/admin/content_blogs';
								else
											shownotif('error', data.msg);
							},
							complete: function() {
									$(this).data('requestRunning', false);
							}
						});
			});

			$(document).on('click', '#preview_editpost', function(e) {
				e.preventDefault();
				e.stopPropagation();

					let form = new FormData($('#edit_frm_blog_post')[0]);

				dropzones.forEach(dropzone => {

					let  { paramName }  = dropzone.options
					dropzone.files.forEach((file, i) => {
						form.append(paramName, file)
					})
				})

				var posttitle = $('#posttitle-input').val();

				var postmeta  = $('#meta-textarea').val();

				var file_val  = $('#blog_file_upload_id').val();

				if(posttitle == "" ){
					$('#err-post-title').removeClass('d-none');
					return false;
				}

				if(postmeta == "" ){
					$('#err-post-meta').removeClass('d-none');
					$('#meta-textarea').focus();
					return false;
				}

				if(dropzones[0].files.length < 1 && file_val == ""){
					$('#err-post-img1').removeClass('d-none');
					$('#image1caption-input').focus();
					return false;
				}

						$.ajax({
							url  : 	'/admin/preview_unsavepost',
							type : 'POST',
							data : form,
							dataType: 'json',
							contentType: false,
							processData: false,
							success : function( data ) {
								if(data.success == 1)
									window.open('/admin/preview_blog', '_blank');
								}
						});
				});
		}

		$(document).on('click', '#preview_existing_delete', function() {

			var file_id = $('#blog_file_upload_id').data('id');
			var preview_button = $(this);
			var name = $(this).parent().data('name');
			var id = $(this).parent().data('id');

			if(id == file_id) {
					$('#blog_file_upload_id').val("");
			}

			if(name != "") {
				$.ajax({
					url  : 	'/admin/remove_blog_image',
					type : 'POST',
					data : {file_upload_id : id},
					dataType: 'json',
					success : function(data)  {
								if(data.success == 1) {
									$('.preview_existing_blog'+id+'').remove();
									$(preview_button).parent().attr('data-name', "");
								}
							}
					});
				}
		});
		// unpublish blog post
		$(document).on('click', '#unpublish_post', function(){
			var blog_ids = [];
			var blog_id = $(this).data('id');

			blog_ids.push(blog_id);

			 $.ajax({
				 url : '/admin/unpublish_blog',
				 type : 'POST',
				 data : {blog_ids : blog_ids},
				 dataType: 'json',
				 success : function(data) {
									 if(data.success == 1)
											 location.reload();
									 else
											 shownotif('error', 'Failed!');
					 }

				 });
		 });
		 	// unpublish document post
		 $(document).on('click', '#unpublish_document', function(){
			  	var doc_ids = [];
					var document_id = $(this).data('id');

					doc_ids.push(document_id);

					$.ajax({
						url  : 	'/admin/unpublish_document',
						type : 'POST',
						data : {doc_ids : doc_ids},
						dataType: 'json',
						success : function(data) {
								if(data.success == 1)

											window.location = '/admin/content_document';

								else
											shownotif('error', data.msg);
							}
						});
		});

		if($('.frm-slider').length > 0 ){
		
				$('.dropzone').each(function(i, el){
					var fileElement = $(this).find($('input#slider_image'));
					var myDropzone  = new Dropzone(el, {
						url: base_url+"admin/upload_media", 
						acceptedFiles: 'image/*',
						uploadMultiple: false,
						parallelUploads: 100,
						maxFiles: 1,
						paramName: "file",
						addRemoveLinks: true,

						init: function () {
												this.on("processing", function (file) {
												});
												this.on("removedfile", function (file) {
														var file_id = $(fileElement).val();
														$.post("/admin/remove_slider_image", { file_upload_id: file_id } );
												});
												this.on("maxfilesexceeded",
														function (file) {
											
														});
												this.on("success",
														function (file, responseText) {
														 	$(fileElement).val(responseText)
														});
												this.on("error",
												 	function(file, errorMessage ) {
														this.removeFile(file);
														shownotif('error', errorMessage);
												});
											}
									})
							})
			}

			$('.document_downloadable').on('change', function(){
				var document_id = $(this).data('document-id');
				var doc_status = 0;
	
				if( $(this).is(':checked') ) {
					doc_status = 1;
				} else {
					doc_status = 0;
				}

				$.ajax({
					url 		: '/admin/document_downloadable',
					dataType	: 'json',
					type  		: 'POST',
					data 		: { document_id : document_id, downloadable : doc_status },
					success: function(data) {
					
						if(data.success == 1) {
							shownotif('success', data.message);
						} else{
							shownotif('error',  data.message);
						}
					}
				});
			});

			$(document).on('click', '#save_discussion_category', function(){
			
				var form  = $('#frm-discussion-cat').serializeArray();
		
				if($('#diss-cat-input').val() == ""){
						$('#err-category-title').removeClass('d-none');
					return false;
				}

				$.ajax({
					url  : 	'/admin/save_discussion_category',
					type : 'POST',
					data : form,
					dataType: 'json',
					success : function(data) {
							if(data.success == 1){
								shownotif('success', data.message);
								setTimeout(function(){ window.location = '/admin/discussion_manage_categories'; }, 1000);
							} else
								shownotif('error', data.message);
						}
					});
			});

			$(document).on('input', '#diss-cat-input', function(){
					if($(this).val() != "") {
						$('#err-category-title').addClass('d-none');
					}
			});

			$(document).on('click', '#discussion-modal', function(e){
					e.preventDefault();
					var discussion_id = $(this).data('id');
					$('#cfrm-delete-discussion').attr('data-id', discussion_id);

					$('#delete-alert-discussion').modal('show');
			});

			$(document).on('click', '#cfrm-delete-discussion', function(e){
				e.preventDefault();
				var discussion_id = $(this).data('id');

					$.ajax({
						url: '/admin/delete_discussion_category',
						type: 'POST',
						data: {discussion_id : discussion_id},
						dataType:'json',
						success: function (data) {
								if(data.success) {
								shownotif('success', data.message);
								setTimeout(function(){ window.location = '/admin/discussion_manage_categories'; }, 1000);
							} else 
								shownotif('error', data.message);
						}
					})
			});

			$(document).on('click', '#flagged-discussion', function(e){
				e.preventDefault();
				var discussion_id = $(this).data('id');

					$.ajax({
						url: '/admin/flagged_discussion_category',
						type: 'POST',
						data: {discussion_id : discussion_id},
						dataType:'json',
						success: function (data) {
								if(data.success) {
								shownotif('success', data.message);
								//setTimeout(function(){ window.location = '/admin/discussion_manage_categories'; }, 1000);
							} else 
								shownotif('error', data.message);
						}
					})
			});

			$(document).on('click', '#cfrm-discussion', function(){
					var group_action = $('#discussion-group').val();
					var discussion_ids = [];

						if(group_action == ""){
							return false;
						}

						$('input[name="chk-discussion"]:checked').each(function () {
							discussion_ids.push($(this).data('id'));
						});

						$.ajax({
							url: '/admin/update_discussion_permission',
							type: "POST",
							data: {discussion_ids : discussion_ids,
										permission_id: group_action},
							dataType: "json",
							success: function(data) {
								if(data.success) {
									shownotif('success', data.message);
									setTimeout(function(){ window.location = '/admin/discussion_manage_categories'; }, 1000);
								} else 
									shownotif('error', data.message);
							}
						})
			});

			$("#discussion-categories").DataTable({
				keys:!0,
				order: [],
				language:{
					paginate:{
						previous:"<i class='mdi mdi-chevron-left'>",
						next:"<i class='mdi mdi-chevron-right'>"
					}},
					drawCallback:function(){
						$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
						$("#discussion-categories_filter").addClass("d-flex justify-content-between flex-column flex-lg-row");
						$("#discussion-categories_length").addClass("d-flex");
						$("#discussion-categories_length").parent().removeClass("col-md-6").addClass("col-md-5");
						$("#discussion-categories_filter").parent().removeClass("col-md-6").addClass("col-md-7");
						$("#discussion-categories_filter").children("label").addClass("col-sm-5");
					},
					initComplete: function(){
						$('.dataTables_filter').prepend(`<form action="/admin/discussion_manage_categories" method="POST" class="form-group col-sm-7">
						<div class="row">
						<div class="col-md-10 col-12">
								<div class="row">
										<div class="col-2 py-1 px-md-0">
												<label for="tablesort-select">View: &nbsp;</label>
										</div>
										<div class="col-9 px-md-1">
												<select class="form-control" id="postaction-select" name="filter">
														<option value="flagged">Flagged Categories</option>
														<option value="deleted">Deleted Categories</option>
												</select>  
										</div>
										<div class="col-1 px-md-0">
											<button type="submit" class="btn btn-outline-primary">Apply</button>
										</div> 
								</div>
						</div>
					
					</div>
						</form>`);
				 }  
				});

				$("#discussion-topic").DataTable({
					keys:!0,
					order: [],
					language:{
						paginate:{
							previous:"<i class='mdi mdi-chevron-left'>",
							next:"<i class='mdi mdi-chevron-right'>"
						}},
						drawCallback:function(){
							$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
							$("#discussion-topic_filter").addClass("d-flex justify-content-between flex-column flex-lg-row");
							$("#discussion-topic_length").addClass("d-flex");
							$("#discussion-topic_length").parent().removeClass("col-md-6").addClass("col-md-5");
							$("#discussion-topic_filter").parent().removeClass("col-md-6").addClass("col-md-7");
							$("#discussion-topic_filter").children("label").addClass("col-sm-5");
						},
						initComplete: function(){
							$('.dataTables_filter').prepend(`<form action="/admin/content_discussion" method="POST" class="form-group col-sm-7">
							<div class="row">
							<div class="col-md-10 col-12">
									<div class="row">
											<div class="col-2 py-1 px-md-0">
													<label for="tablesort-select">View: &nbsp;</label>
											</div>
											<div class="col-9 px-md-1">
													<select class="form-control" id="postaction-select" name="filter">
														<option class="active">Most Active Posts</option>
														<option value="flagged">Flagged Posts</option>
														<option value="deleted">Deleted Posts</option>
													</select>  
											</div>
											<div class="col-1 px-md-0">
												<button type="submit" class="btn btn-outline-primary">Apply</button>
											</div> 
									</div>
							</div>
						
						</div>
							</form>`);
					 }  
					});
				// discussion topic js
				$(document).on('click', '#flagged-discussion-topic', function(e){
							e.preventDefault();
							var discussion_topic_id = $(this).data('id');
			
								$.ajax({
									url: '/admin/flagged_discussion_topic',
									type: 'POST',
									data: {discussion_topic_id : discussion_topic_id},
									dataType:'json',
									success: function (data) {
											if(data.success) 
											shownotif('success', data.message);
										else 
											shownotif('error', data.message);
									}
								})
					});

				$(document).on('click', '#discussion-topic-modal', function(e){
						e.preventDefault();
						var discussion_topic_id = $(this).data('id');
						$('#cfrm-delete-discussion-topic').attr('data-id', discussion_topic_id);
	
						$('#delete-discussion-topic').modal('show');
				});
	
				$(document).on('click', '#cfrm-delete-discussion-topic', function(e){
						e.preventDefault();
						var discussion_topic_id = $(this).data('id');
		
							$.ajax({
								url: '/admin/delete_discussion_topic',
								type: 'POST',
								data: {discussion_topic_id : discussion_topic_id},
								dataType:'json',
								success: function (data) {
										if(data.success) {
										shownotif('success', data.message);
										setTimeout(function(){ window.location = '/admin/content_discussion'; }, 1000);
									} else 
										shownotif('error', data.message);
								}
							})
				}); 
				
				$(document).on('click', '#cfrm-discussion-topic', function(){
					var group_action = $('#discussion-topic-group').val();
					var discussion_topic_ids = [];

						if(group_action == ""){
							return false;
						}

						$('input[name="chk-discussion-topic"]:checked').each(function () {
							discussion_topic_ids.push($(this).data('id'));
						});

						$.ajax({
							url: '/admin/update_discussion_topic_permission',
							type: "POST",
							data: {discussion_topic_ids : discussion_topic_ids,
										permission_id: group_action},
							dataType: "json",
							success: function(data) {
								if(data.success) {
									shownotif('success', data.message);
									setTimeout(function(){ window.location = '/admin/content_discussion'; }, 1000);
								} else 
									shownotif('error', data.message);
							}
						})
			});// eof discussion topic js

}); //eof documenbt ready
