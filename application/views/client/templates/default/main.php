<?php

$CI =& get_instance();
$nav_obj = isset($nav_obj) ? $nav_obj : false;

if($nav_obj == false){
	$CI->load->model('Navigationmodel');
	$params['navigation_menu_is_active'] = 1;
	$params['navigation_menu_is_default'] = 0;
	$params['sortBy'] = 'navigation_menu_order';
	$params['sortDirection'] = 'asc';
	$nav_obj = $CI->Navigationmodel->get($params);
}

?>

<!DOCTYPE html>
<html lang="en">
	<?=$CI->load->view(getTemplate('head'), array(), true)?>
  <body>
		<?=$CI->load->view(getTemplate('header'), array('nav_obj'=>$nav_obj), true)?>
    <!--<main role="main">-->
				<?php if(isset($page_id) && !isset($no_header)){ ?>
					<input type="hidden" id="hid_page_id" value="<?=$page_id?>" />
				<?php } ?>

				<?php if(!isset($page_id) && !isset($no_header)){ ?>
					<section>
							<section class="hero">
				<?php } ?>


							<?php if(isset($page_id) && isset($CI->session->userdata['logged_in']) && isset($page_obj->page_type_id) && $page_obj->page_type_id == 2 && !isset($_GET['page_id']) ){ ?>
								<div class="pub-container">
										<input type="button" onclick="window.open('/?page_id=<?=isset($page_obj->page_id) ? $page_obj->page_id : 0?>', '_blank')" class="btn btn-secondary d-inline page-preview" value="Preview" />
										<input type="button" class="publish-page btn btn-primary d-inline" value="Publish" />
								</div>
								<div style="clear:both;">&nbsp;</div>
							<?php } ?>

							<?=(isset($content) && !empty($content) ? $content : '')?>

							<?php if(isset($page_id) && isset($CI->session->userdata['logged_in']) && isset($page_obj->page_type_id) && $page_obj->page_type_id == 2 && !isset($_GET['page_id']) ){ ?>
								<div style="clear:both;">&nbsp;</div>
								<div class="pub-container">
										<input type="button" onclick="window.open('/?page_id=<?=isset($page_obj->page_id) ? $page_obj->page_id : 0?>', '_blank')" class="btn btn-secondary d-inline page-preview" value="Preview" />
										<input type="button" class="publish-page btn btn-primary d-inline" value="Publish" />
								</div>
								<div style="clear:both;">&nbsp;</div>
							<?php } ?>

				<?php if(!isset($page_id)){ ?>
						</section>
				</section>
			<?php } ?>
    <!--</main>-->

		<?=$CI->load->view(getTemplate('footer'), array(), true)?>
		<?=$CI->load->view(getTemplate('assets_js'), array(), true) ?>
  </body>
</html>
