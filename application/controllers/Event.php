<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public $assets_dir = '';

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');

			// Load session library
		$this->load->library('session');

		$this->load->model(['Eventsmodel', 'Pagemodel', 'Urlaliasmodel']);

		$this->assets_dir = GROUP_ASSETS.getSubDomain().'/';

		// $this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
		$this->assets_dir = GROUP_ASSETS.'generic/';

	}

	public function index()
	{
		$content = "";

		$page_id = 0;
		$pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
		if(isset($pageobj[0]->page_id)){
				$content = $pageobj[0]->page_content;
				$page_id = $pageobj[0]->page_id;
				$pageobj = $pageobj[0];
		}

		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Event page';
		$pageobj->page_title = 'Event';
		$pageobj->page_keywords = '';

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('event'), [], true),
			'no_header' => 1,
			'page_obj'=>$pageobj
		));

	}

	public function item($alias){
			$alias_obj = $this->Urlaliasmodel->get(array('url_alias_value'=>$alias, 'url_alias_type'=>'event'));

			if(isset($alias_obj[0]->id)){
					$event_obj = $this->Eventsmodel->get(array('id'=>$alias_obj[0]->id));
					$page_obj = new stdClass();
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

					$page_obj->page_meta_description = $event_obj[0]->event_description;
					$page_obj->page_title = $event_obj[0]->event_title;
					$page_obj->page_keywords = '';
					$page_obj->content_type = 'event';

					$this->load->view(getTemplate('main'), array('assets_dir'=>$this->assets_dir, 'page_id'=>$page_id, 'content'=>$content, 'page_obj'=>$page_obj));
			}else {
					$this->load->view(getTemplate('404'), array('assets_dir'=>$this->assets_dir));
			}
	}
}
