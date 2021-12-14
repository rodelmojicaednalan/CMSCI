<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aliases extends CI_Controller {

	public $assets_dir = '';

	public function __construct() {
		parent::__construct();

		// Load session library
		$this->load->library('session');
		$this->load->model('Pagemodel');
		$this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
	}

	public function check($alias){
			//get page object
			$opt_arr = array();
			$opt_arr['page_type_id'] = 2; //custom page
			$opt_arr['page_url_alias'] = $alias;

			$page_obj = $this->Pagemodel->get($opt_arr);

			if(isset($page_obj[0]->page_id)){
					$page_obj = $page_obj[0];
					$content = $page_obj->page_content;
					$page_id = $page_obj->page_id;
					$this->load->view(getTemplate('main'), array('assets_dir'=>$this->assets_dir, 'page_id'=>$page_id, 'content'=>$content, 'page_obj'=>$page_obj));
			}else{
					$this->load->view(getTemplate('404'), array('assets_dir'=>$this->assets_dir));
			}
	}
}
