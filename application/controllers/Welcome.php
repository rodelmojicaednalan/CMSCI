<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $assets_dir = '';

	public function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->model('Pagemodel');
		$this->load->model('Eventsmodel');
		$this->load->model('Navigationmodel');

		$this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
	}

	public function index()
	{
			$content = '';
			$page_id = 0;
			$pageobj = false;

			//get navigations
			$params['navigation_menu_is_active'] = 1;
			$params['navigation_menu_is_default'] = 0;
			$params['sortBy'] = 'navigation_menu_order';
			$params['sortDirection'] = 'asc';
			$nav_obj = $this->Navigationmodel->get($params);

			if(isset($_GET['page_id']) && is_numeric($_GET['page_id'])){
				$pageobj = $this->Pagemodel->get(array('page_id'=>$_GET['page_id']));
				if(isset($pageobj[0]->page_id)){
						$content = $pageobj[0]->page_content;
						$pageobj = $pageobj[0];
						$pageobj->content_type = 'preview';
				}else {
						$content = '<section><section class="hero">Page not found.</section></section>';
						$pageobj = new stdClass();
						$pageobj->page_title = 'Preview';
						$pageobj->page_keywords = '';
						$pageobj->page_meta_description = '';
				}
			}elseif(isset($_GET['event_id']) && is_numeric($_GET['event_id'])){
				$event_obj = $this->Eventsmodel->get(array('id'=>$_GET['event_id']));
				if(isset($event_obj[0]->event_id)){
						$pageobj = new stdClass();
						$content = $event_obj[0]->body;

						//replace real values
						$content = str_replace('#event_title#', $event_obj[0]->event_title, $content);
						$content = str_replace('#event_description#', $event_obj[0]->event_description, $content);

						$content = str_replace('#event_location_url#', $event_obj[0]->event_location_url, $content);
						$content = str_replace('#event_location#', $event_obj[0]->event_location, $content);
						$content = str_replace('#event_address#', $event_obj[0]->event_address, $content);
						$content = str_replace('#event_city#', $event_obj[0]->event_city, $content);
						$content = str_replace('#event_state#', $event_obj[0]->event_state, $content);
						$content = str_replace('#event_zip#', $event_obj[0]->event_zip, $content);
						$content = str_replace('#event_country#', $event_obj[0]->event_country, $content);

						$content = str_replace('#event_start_date#', date("F j, Y", strtotime($event_obj[0]->event_start_time)), $content);

						if(date("F j, Y", strtotime($event_obj[0]->event_start_time)) != date("F j, Y", strtotime($event_obj[0]->event_end_time)))
								$content = str_replace('#event_end_date#', date("F j, Y", strtotime($event_obj[0]->event_end_time)), $content);
						else
								$content = str_replace('#event_end_date#', "", $content);

						$content = str_replace('#event_start_time#', date("g:i a", strtotime($event_obj[0]->event_start_time)), $content);
						$content = str_replace('#event_end_time#', date("g:i a", strtotime($event_obj[0]->event_end_time)), $content);

						$page_id = false;

						$pageobj->page_meta_description = 'Event Preview';
						$pageobj->page_title = 'Preview';
						$pageobj->page_keywords = '';
						$pageobj->content_type = 'preview';
				}else {
						$content = '<section><section class="hero">Event not found.</section></section>';
						$pageobj = new stdClass();
						$pageobj->page_title = 'Preview';
						$pageobj->page_keywords = '';
						$pageobj->page_meta_description = '';
				}
			}else{
					$pageobj = $this->Pagemodel->get(array('page_is_homepage'=>1));
					if(isset($pageobj[0]->page_id)){
							$content = $pageobj[0]->page_content;
							$page_id = $pageobj[0]->page_id;
							$pageobj = $pageobj[0];
					}
			}


			$this->load->view(getTemplate('main'), array('content'=>$content, 'page_id'=>$page_id, 'assets_dir'=>$this->assets_dir, 'page_obj'=>$pageobj, 'nav_obj'=>$nav_obj));
	}
}
