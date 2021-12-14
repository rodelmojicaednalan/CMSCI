<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(['admin_helper', 'utility_helper']);
		$this->load->helper('boomity_helper/group_helper');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		$this->load->model('Usermodel');
		$this->load->model('Sitedesignmodel');
		$this->load->model('Groupsettingsmodel');
		$this->load->model('Timezonemodel');
		$this->load->model('Pagemodel');
		$this->load->model('Widgettypemodel');
		$this->load->model('Sidebarwidgetmodel');
		$this->load->model('Groupmodel');
		$this->load->model('Usergroupmodel');
		$this->load->model('Communityrequestmodel');
		$this->load->model('Groupquestionmodel');
		$this->load->model('Groupanswermodel');
		$this->load->model('Usergrantmodel');
		$this->load->model('boomity/BoomityGroupmodel');
		$this->load->model('boomity/BoomityConferencemodel');
		$this->load->model('Userfunctionmodel');
		$this->load->model('Userrolemodel');
		$this->load->model('Urlaliasmodel');
		$this->load->model('Mediamodel');
		$this->load->model('Mediacategorymodel');
		$this->load->model('boomity/Pagelayoutmodel', 'Pagelayoutmodel');

		$this->load->model('Blogcategorymodel');
		$this->load->model('Blogcategoryxrefmodel');
		$this->load->model('Blogmodel');
		$this->load->model('Fileuploadmodel');
		$this->load->model('Blogimagemodel');
		$this->load->model('Blogcontentmodel');
		$this->load->model('Documentcategorymodel');
		$this->load->model('Documentmodel');
		$this->load->model('Contenttypedefinitionmodel');
		$this->load->model('Featureditemmodel');
		$this->load->model('Eventsmodel');
		$this->load->model('Webanalyticsmodel');
		$this->load->model('Eventcategorymodel');
		$this->load->model('Navigationmodel');
		$this->load->model('Navigationcategorymodel');
		$this->load->model('Discussioncategorymodel');
		$this->load->model('Discussioncategorytopicmodel');
		// Load database
		//$this->load->model('login_database');
		//$login_database = & loadGroupModels('login_database');
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
				$data = array();
				$data['main_content'] = $this->load->view('admin/main/dashboard', '', true);
				$this->load->view('admin/main/main_home', $data);
		}else{
				$data = array();
				$data['main_content'] = $this->load->view('admin/login', '', true);
				$this->load->view('admin/main', $data);
		}
	}

	public function site_colors()
	{
		if(isset($this->session->userdata['logged_in'])){
			$site_design_obj = $this->Sitedesignmodel->get(array('limit'=>1));
			if($site_design_obj){
					$site_design_obj = $site_design_obj[0];
			}

			$data = array();
			$data['main_content'] = $this->load->view('admin/site_design/site_colors', array('site_design_obj' => $site_design_obj), true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}



	public function footer_content()
	{
		if(isset($this->session->userdata['logged_in'])){
			$site_design_obj = $this->Sitedesignmodel->get(array('limit'=>1));
			$footer_content = '';
			if($site_design_obj){
				$footer_content = ( $site_design_obj[0]->site_design_footer_attributes ) ? json_decode($site_design_obj[0]->site_design_footer_attributes) : '';
			}

			$data = array();
			$data['main_content'] = $this->load->view('admin/site_build/footer_content', [ 'data' => $footer_content ], true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}

	public function site_footer_save()
	{

		if(isset($this->session->userdata['logged_in'])){

			$str = '';
			$str_arr = [];
			$post = $_POST;

			foreach ($post as $key => $value){
					$value = addslashes($value);
					$str_arr[$key] = $value;
			}

			$str = json_encode($str_arr);
			$site_design_id = 0;
			$site_design_obj = $this->Sitedesignmodel->get(array('limit'=>1));

			if($site_design_obj){ //update
				$site_design_id = $site_design_obj[0]->site_design_id;

				$arr = [
					'site_design_id' 				=> $site_design_id,
					'site_design_footer_attributes' => $str
				];

				$updated = $this->Sitedesignmodel->update($arr);
			}

			print json_encode([ 'success'=>1, 'site_design_id' => $site_design_id ]);

		}else{
			print json_encode( [ 'success' => 0 ]);
		}
	}
	public function navigation_categories()
	{
		if(isset($this->session->userdata['logged_in'])){
			$params['sortBy'] = 'nav_category_id';
			$params['sortDirection'] = 'asc';
			// $params['id'] = isset($post->) 
			$nav = $this->Navigationcategorymodel->get();

			$data['main_content'] = $this->load->view('admin/navigation_categories/navigation_categories', [ 'data' => $nav ], true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
		if(isset($_POST['nav_category_id'])){
			$options  = [
				'id'	=> $_POST['nav_category_id']
			];
			$nav_item = $this->Navigationcategorymodel->get($options);
			return $nav_item;
		}
	}

	public function navigation_categories_delete()
	{
		if( isset($_POST['navs']) ) {
			$data = $_POST['navs'];

			foreach( $data as $key => $item  ) {
				$this->Navigationcategorymodel->delete([ 'nav_category_id' => $item ]);
			}

			print json_encode( [ 'success' => 1 ]);
			return true;
		}	

		print json_encode( [ 'success' => 0, 'msg' => "error" ]);
	}

	public function navigation_category_load_modal($id = 0)
	{
		$parents = $this->Navigationcategorymodel->get();

		$opt_arr['page_type_default_and_custom'] = 1;
		$opt_arr['page_is_admin'] = 0;
		$opt_arr['page_type_id'] = 2;
		$pages = $this->Pagemodel->get($opt_arr);
		// $pages = [];
		// echo('asdasd');

		echo $this->load->view('admin/navigation_categories/nav_categories_modal', compact('parents', 'pages'), true);
		// echo $this->load->view('admin/navigation_categories/navigation_categories', compact('data'), true);
	}
	public function navigation_categories_add()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = $_POST;

			$this->load->library('form_validation');

			$this->form_validation->set_rules('nav_category_description', 'Title', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				print json_encode( [ 'success' => 0, 'msg' => 'Error while saving' ] );
				return false;
			}

			$nav_id = $this->Navigationcategorymodel->add($_POST);

			print json_encode( [ 'success' => 1, 'msg' => 'Success' ] );
		}
	}
	public function navigation_categories_update()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = $_POST;

			$this->load->library('form_validation');

			// $this->form_validation->set_rules('media_category_parent_id', 'Username', 'required');
			$this->form_validation->set_rules('navigation_menu_default_label', 'Title', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				print json_encode( [ 'success' => 0, 'msg' => 'Error while saving' ] );
				return false;
			}


			$data['navigation_menu_modified_label'] = $data["navigation_menu_default_label"];
			$data['navigation_menu_open_to_new_tab'] = isset($data["navigation_menu_open_to_new_tab"]) ? $data["navigation_menu_open_to_new_tab"] : 0;
			$data['navigation_menu_show_in_footer'] = isset($data["navigation_menu_show_in_footer"]) ? $data["navigation_menu_show_in_footer"] : 0;
			$data['navigation_menu_is_nav_category'] = isset($data["navigation_menu_is_nav_category"]) ? $data["navigation_menu_is_nav_category"] : 0;

			$alias['navigation_alias'] = html_entity_decode($data["navigation_alias"]);
			$alias['custom_url_link'] = html_entity_decode($data["custom_url_link"]);

			unset($data["navigation_alias"]);
			unset($data["custom_url_link"]);


			$affected = $this->Navigationmodel->update( $data );

			$alias = addUrlAlias($data['navigation_menu_id'], 'navigation', $alias['navigation_alias'], $alias["custom_url_link"]);		
			print json_encode( [ 'success' => 1, 'alias' => $alias ] );

		}else{
			print json_encode( [ 'success' => 0, 'msg' => 'Error while saving' ] );
		}
	}

	public function navigation()
	{
		if(isset($this->session->userdata['logged_in'])){

			// $params['navigation_menu_is_active'] = 1;
			$params['navigation_menu_is_default'] = 0;
			$params['sortBy'] = 'navigation_menu_order';
			$params['sortDirection'] = 'asc';

			$nav = $this->Navigationmodel->get( $params );

			$data['main_content'] = $this->load->view('admin/site_build/navigation', [ 'data' => $nav ], true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}

	public function navigation_load_modal($id = 0)
	{
		$data = $this->Navigationmodel->get_details([ 'id' => $id ]);

		$opt_arr['page_type_default_and_custom'] = 1;
		$opt_arr['page_is_admin'] = 0;
		$opt_arr['page_type_id'] = 2;
		$pages = $this->Pagemodel->get($opt_arr);
		// $pages = [];


		echo $this->load->view('admin/site_build/nav_modal_data', compact('data', 'pages'), true);
	}


	public function navigation_add()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = $_POST;

			$this->load->library('form_validation');

			$this->form_validation->set_rules('navigation_menu_default_label', 'Title', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				print json_encode( [ 'success' => 0, 'msg' => 'Error while saving' ] );
				return false;
			}

			$nav_id = $this->Navigationmodel->add($_POST);

			$alias = "";
			if( $nav_id ){
				$alias = addUrlAlias($nav_id, 'navigation', $data['navigation_menu_default_label'], '');
			}

			// $file_upload = $this->Fileuploadmodel->add($_POST);
			print json_encode([ 'success'=>1, 'media_id' => $nav_id ]);
		}
	}
	public function navigation_update()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = $_POST;

			$this->load->library('form_validation');

			// $this->form_validation->set_rules('media_category_parent_id', 'Username', 'required');
			$this->form_validation->set_rules('navigation_menu_default_label', 'Title', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				print json_encode( [ 'success' => 0, 'msg' => 'Error while saving' ] );
				return false;
			}


			$data['navigation_menu_modified_label'] = $data["navigation_menu_default_label"];
			$data['navigation_menu_open_to_new_tab'] = isset($data["navigation_menu_open_to_new_tab"]) ? $data["navigation_menu_open_to_new_tab"] : 0;
			$data['navigation_menu_show_in_footer'] = isset($data["navigation_menu_show_in_footer"]) ? $data["navigation_menu_show_in_footer"] : 0;
			$data['navigation_menu_is_nav_category'] = isset($data["navigation_menu_is_nav_category"]) ? $data["navigation_menu_is_nav_category"] : 0;

			$alias['navigation_alias'] = html_entity_decode($data["navigation_alias"]);
			$alias['custom_url_link'] = html_entity_decode($data["custom_url_link"]);

			unset($data["navigation_alias"]);
			unset($data["custom_url_link"]);


			$affected = $this->Navigationmodel->update( $data );

			$alias = addUrlAlias($data['navigation_menu_id'], 'navigation', $alias['navigation_alias'], $alias["custom_url_link"]);		
			print json_encode( [ 'success' => 1, 'alias' => $alias ] );

		}else{
			print json_encode( [ 'success' => 0, 'msg' => 'Error while saving' ] );
		}
	}

	public function navigation_update_show_nav()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = $_POST;

			$data['navigation_menu_is_active'] = isset($data["navigation_menu_is_active"]) ? $data["navigation_menu_is_active"] : 0;

			$affected = $this->Navigationmodel->update( $data );

			if( $affected ) {
				print json_encode( [ 'success' => 1 ] );
			} else {
				print json_encode( [ 'success' => 0, 'msg' => "Error" ] );
			}

		}else{
			print json_encode( [ 'success' => 0, 'msg' => "Error" ] );
		}
	}
	public function navigation_update_parent() {
		if(isset($this->session->userdata['logged_in'])) {
			$data = $_POST;
			$affected = $this->Navigationmodel->update( $data );

			if( $affected ) {
				print json_encode( [ 'success' => 1 ] );
			} else {
				print json_encode( [ 'success' => 0, 'msg' => "Error" ] );
			}
		} else {
			print json_encode( [ 'success' => 0, 'msg' => "Error" ] );
		}
	}

	public function navigation_delete()
	{
		if(isset($this->session->userdata['logged_in'])){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$data = array();
						$data['navigation_menu_id'] = $_POST['navigation_menu_id'];
						$ret = $this->Navigationmodel->delete($data);
						echo json_encode(array('success'=>1));
				}else{
					print json_encode( [ 'success' => 0 ] );
				}
		}
	}

//Media Functions
	public function media($search = ''){
		if(isset($this->session->userdata['logged_in'])){

			$media_category_id = isset($_GET['cat']) ? $_GET['cat'] : '';
			$mediatype_id = isset($_GET['type']) ? $_GET['type'] : '';
			$search = isset($_GET['s']) ? $_GET['s'] : '';

			$options  = [
				'media_category_id' => $media_category_id,
				'mediatype_id'		=> $mediatype_id,
				'search'			=> $search
			];

			// print_r($options);
			// return 0;

			$media = $this->Mediamodel->get($options);

			$this->load->model('Mediatypemodel');



			$media_category = $this->Mediacategorymodel->get();
			$media_type = $this->Mediatypemodel->get();
			// print_r($media);
			// return 'test';
			// $media_category_content = json_encode($media_category_obj);

			$data = array();
			$data['main_content'] = $this->load->view('admin/manage_content/content_media', compact('media', 'media_category', 'media_type') , true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}
	public function media_delete(){
		if(isset($this->session->userdata['logged_in'])){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$data = array();
						$data['media_id'] = $_POST['media_id'];
						$ret = $this->Mediamodel->delete($data);
						echo json_encode(array('success'=>1));
				}
		}
	}
	public function media_category_delete(){
		if(isset($this->session->userdata['logged_in'])){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$data = array();
						$data['media_category_id'] = $_POST['media_category_id'];
						$items = $this->Mediacategorymodel->check_child_categories( $data['media_category_id'] );

						if( $items == 0 ){
							$ret = $this->Mediacategorymodel->delete($data);
							echo json_encode(array('success'=>1));
						} else {
							$message = 'there are ' . $items . ' subcategories under this category.';
							echo json_encode(array('success'=>0, 'message'=>$message));
						}


				}
		}
	}
	public function add_media(){//display content func temp

		if(isset($this->session->userdata['logged_in'])){

			$this->load->model([ 'Mediatypemodel', 'Mediaitemtypemodel' ]);

			$media_category_obj = $this->Mediacategorymodel->get();
			$media_type = $this->Mediatypemodel->get();
			$media_item_type = $this->Mediaitemtypemodel->get();
			$groups = $this->Groupmodel->get();

			$data = [
						'main_content' => $this->load->view('admin/manage_content/media_form', compact('media_type', 'media_category_obj', 'media_item_type', 'groups'), true)
					];

			$this->load->view('admin/main/main_home', $data);
		} else {
				redirect('/admin');
		}
	}

	public function media_create()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = $_POST;

			if(isset($data['media_embed_value'])) {
				$data['media_embed_value'] = html_entity_decode($data['media_embed_value']);
			}

			if(isset($data['product_url'])) {
				$data['product_url'] = html_entity_decode($data['product_url']);
			}


			$res = $this->Mediamodel->add( $data );

			echo json_encode( [ 'success' => 1 ]);
		} else {
			echo json_encode( [ 'success' => 0, 'message' => 'There is something wrong while saving!' ] );
		}
	}

	public function upload_media()
	{

		$this->load->helper('file');
		$this->load->library('upload');

		$subdomain = getSubDomain();

		$path = ($subdomain) ? 'assets/themes/' . $subdomain . '/media' : 'assets/themes/generic/media';

		if (!is_dir( $path )) {
			mkdir($path, 0777, TRUE);
		}

		$config = [
			'upload_path' 		=> $path,
			'allowed_types' 	=> '*',
			'overwrite' 		=> false
		];

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('file') )
		{
			$error = array('error' => $this->upload->display_errors());

			print json_encode([ 'data' => $error, 'fileupload_id' => 0  ]);
		}
		else
		{
			$upload_data = $this->upload->data();

			$full_path = $path . '/' . $upload_data['file_name'];
			$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;

			$data = [
				'user_id'					=> (isset($logged_in_user) ? $logged_in_user : 0),
				'file_upload_name'			=> $upload_data['file_name'],
				'file_upload_path'			=> $full_path,
				'file_upload_status'		=> 1,
				'file_upload_size'			=> filesize ( $full_path )
			];

			$fileupload_id = $this->Fileuploadmodel->add( $data );

			print json_encode([ 'data' => $upload_data, 'fileupload_id' => $fileupload_id ]);
			// print $fileupload_id;
		}
	}

	public function media_add(){//add media, edit for clarity
		if(isset($this->session->userdata['logged_in'])){

			// print_r($_FILES);
			// return 0;

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$media_id = $this->Mediamodel->add($_POST);
				// $file_upload = $this->Fileuploadmodel->add($_POST);
				print json_encode([ 'success'=>1, 'media_id' => $media_id ]);
			}
		} else {
			redirect('/admin');
		}
	}
	public function media_manage_categories($page = 0){
		if(isset($this->session->userdata['logged_in'])){


			$this->load->library('pagination');
			$config['base_url'] = base_url('admin/media_manage_categories');
			$config['total_rows'] = $this->Mediacategorymodel->get_max_pages((isset($_GET['s']) ? $_GET['s'] : ''));
			$config['per_page'] 		= 5;
			$config['full_tag_open'] 	= '<nav> <ul class="pagination justify-content-end">';
			$config['full_tag_close'] 	= '</nav> </ul>';
			$config['first_tag_open'] 	= false;
			$config['first_tag_close'] 	= false;
			$config['num_tag_open'] 	= '<li class="page-item">';
			$config['num_tag_close'] 	= '</li>';
			$config['attributes'] 		= array('class' => 'page-link');
			$config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] 	= '</a></li>';

			$config['next_tag_open'] 	= '<li class="page-item">';
					$config['next_link'] 		= '<span aria-hidden="true">&raquo;</span>
																				<span class="sr-only"></span>';
			$config['next_tag_close'] 	= '</li>';

			$config['prev_tag_open'] 	= '<li class="page-item">';
					$config['prev_link'] 		= '<span aria-hidden="true">&laquo;</span>
																				<span class="sr-only">Previous</span>';
			$config['prev_tag_close'] 	= '</a></li>';

			$config['first_link'] 		= false;
			$config['last_link'] 		= false;

			$config['page_query_string'] = TRUE;

			$this->pagination->initialize($config);


			$media_obj = $this->Mediamodel->get();
			$options  = [
				'limit'				=> '5',
				'offset'			=>	isset($_GET['per_page']) ? $_GET['per_page'] : 0,
				'sortBy'			=> 'media_category_title',
				'sortDirection'	=> 'ASC'
			];

			$media_category_obj = $this->Mediacategorymodel->get($options);

			$data = array();
			$data['main_content'] = $this->load->view('admin/manage_content/media_manage_categories', [ 'data' => $media_category_obj,'data_media' => $media_obj ], true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}


	public function media_edit_media($id = 0) { //for displaying content //temp, possibly change func name in future for clarity
		if(isset($this->session->userdata['logged_in'])){
			$media_id = $id;

			$this->load->model([ 'Mediatypemodel', 'Mediaitemtypemodel' ]);

			$media_category = $this->Mediacategorymodel->get();
			$media_type = $this->Mediatypemodel->get();
			$media_item_type = $this->Mediaitemtypemodel->get();
			$groups = $this->Groupmodel->get();

			$data = $this->Mediamodel->get_details( $media_id );
			// $media_content = json_encode($media_obj);
			$pData = array();
			$pData['main_content'] = $this->load->view('admin/manage_content/media_edit_media', compact('media_category', 'data', 'groups', 'media_item_type', 'media_type'), true);
			$this->load->view('admin/main/main_home', $pData);
		}else{
				redirect('/admin');
		}
	}
	public function edit_media() { //for actual edit of media
		if(isset($this->session->userdata['logged_in'])){

			$data = $_POST;

			$data['media_downloadable'] = isset($data['media_downloadable']) ? $data['media_downloadable'] : 0;

			$affected = $this->Mediamodel->update( $data );

			if( $affected ) {
				print json_encode( [ 'success' => 1 ] );
			} else {
				print json_encode( [ 'success' => 0 ] );
			}

		}else{
			print json_encode( [ 'success' => 0 ] );
		}
	}
	public function add_media_category() {
		if(isset($this->session->userdata['logged_in'])){

			$this->load->library('form_validation');

			// $this->form_validation->set_rules('media_category_parent_id', 'Username', 'required');
			$this->form_validation->set_rules('media_category_title', 'Title', 'required');
			$this->form_validation->set_rules('media_category_description', 'Category Description', 'required');
			// $this->form_validation->set_rules('email', 'Email', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				print json_encode( [ 'success' => 0 ] );
				return false;
			}


			$post = $_POST;
			$data = [
				'media_category_parent_id' => $post['media_category_parent_id'],
				'media_category_title' => $post['media_category_title'],
				'media_category_description' => $post['media_category_description'],
				'media_category_url' =>  html_entity_decode($post['media_category_url'])
			];
			$media_id = $this->Mediacategorymodel->add($data);
			print json_encode([ 'success'=>1, 'media_id' => $media_id ]);
		}
	}
	public function unpublish_media_category()
	{

		if(isset($this->session->userdata['logged_in'])){

			if( isset($_POST['media_id']) ) {

				$res = $this->Mediacategorymodel->get_details($_POST['media_id']);



				if( isset($res) ) {

					$data = [
							'media_category_id' => $_POST['media_id'],
							'media_category_status' => ( $res->media_category_status == 1 ) ? 0 :  1
						];

					$res = $this->Mediacategorymodel->update( $data );

					print json_encode( [ 'success'=> 1 ] );
					return true;
				}

			}

		}else{
			print json_encode( [ 'success' => 0 ]);
		}
	}
	public function publish_media_category() {
		if(isset($this->session->userdata['logged_in'])){

			$str = '';
			$str_arr = [];
			$post = $_POST;

			foreach ($post as $key => $value){
					$value = addslashes($value);
					$str_arr[$key] = $value;
			}

			$str = json_encode($str_arr);
			$media_id = $str_arr['media_id'];
			$media_obj = $this->Mediamodel->get();
			for($i = 0; sizeOf($media_obj) > $i; $i++) {
				if($media_obj[$i]->media_category_id == $media_id) {
					$arr = [
						'media_id' => $media_obj[$i]->media_id,
						'media_published' => '1'
					];
					$updated = $this->Mediamodel->update($arr);
				}
			}
			print json_encode([ 'success'=>1, 'media_id' => $media_id ]);

		}else{
			print json_encode( [ 'success' => 0 ]);
		}
	}
	public function unpublish_media() {
		if(isset($this->session->userdata['logged_in'])){

			$post = $_POST;
			$updated = $this->Mediamodel->update( $post );

			print json_encode([ 'success'=> 1 ]);

		}else{
			print json_encode( [ 'success' => 0 ]);
		}
	}
	public function publish_media() {
		if(isset($this->session->userdata['logged_in'])){

			$post = $_POST;
			$post['media_published_on']	= date('Y-m-d H:i:s');
			$updated = $this->Mediamodel->update( $post );

			print json_encode( [ 'success' => 1 ] );

		}else{
			print json_encode( [ 'success' => 0 ]);
		}
	}

	//Events
	public function events(){//display content func temp
		if(isset($this->session->userdata['logged_in'])){
			$events = $this->Eventsmodel->get();
			$event_CategoryObj = $this->Eventcategorymodel->get();

			$data = [
						'main_content' => $this->load->view('admin/manage_events/content_events', compact('events', 'event_CategoryObj'), true)
					];

			$this->load->view('admin/main/main_home', $data);
		} else {
				redirect('/admin');
		}
	}

	//Events
	public function get_events(){//display content func temp
			$events = $this->Eventsmodel->get();
			$all_events = array();
			$ctr = 0;
			foreach ($events as $key => $value) {
					$all_events[$ctr]['title'] = $value->event_title;
					$all_events[$ctr]['start'] = $value->event_start_time;
					$all_events[$ctr]['className'] = $value->color;

					$ctr++;
			}

			print json_encode($all_events);
	}

	public function events_manage() {
		if(isset($this->session->userdata['logged_in'])){

			/*
			$this->load->library('pagination');
			$config['base_url'] = base_url('admin/events_manage');
			$config['total_rows'] = $this->Eventsmodel->get_max_pages((isset($_GET['s']) ? $_GET['s'] : ''));
			$config['per_page'] 		= 5;
			$config['full_tag_open'] 	= '<nav> <ul class="pagination justify-content-end">';
			$config['full_tag_close'] 	= '</nav> </ul>';
			$config['first_tag_open'] 	= false;
			$config['first_tag_close'] 	= false;
			$config['num_tag_open'] 	= '<li class="page-item">';
			$config['num_tag_close'] 	= '</li>';
			$config['attributes'] 		= array('class' => 'page-link');
			$config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] 	= '</a></li>';

			$config['next_tag_open'] 	= '<li class="page-item">';
					$config['next_link'] 		= '<span aria-hidden="true">&raquo;</span>
																				<span class="sr-only"></span>';
			$config['next_tag_close'] 	= '</li>';

			$config['prev_tag_open'] 	= '<li class="page-item">';
					$config['prev_link'] 		= '<span aria-hidden="true">&laquo;</span>
																				<span class="sr-only">Previous</span>';
			$config['prev_tag_close'] 	= '</a></li>';

			$config['first_link'] 		= false;
			$config['last_link'] 		= false;

			$config['page_query_string'] = TRUE;

			$this->pagination->initialize($config);
			*/

			$options  = [
				'sortBy'			=> 'event_date',
				'sortDirection' => 'desc'
			];

			$events = $this->Eventsmodel->get($options);

			$data = [
						'main_content' => $this->load->view('admin/manage_events/events_manage', compact('events'), true)
					];

			$this->load->view('admin/main/main_home', $data);
		} else {
				redirect('/admin');
		}
	}
	public function events_manage_categories() {
		if(isset($this->session->userdata['logged_in'])){

			$this->load->library('pagination');
			$config['base_url'] = base_url('admin/events_manage_categories');
			$config['total_rows'] = $this->Eventsmodel->get_max_pages((isset($_GET['s']) ? $_GET['s'] : ''));
			$config['per_page'] 		= 5;
			$config['full_tag_open'] 	= '<nav> <ul class="pagination justify-content-end">';
			$config['full_tag_close'] 	= '</nav> </ul>';
			$config['first_tag_open'] 	= false;
			$config['first_tag_close'] 	= false;
			$config['num_tag_open'] 	= '<li class="page-item">';
			$config['num_tag_close'] 	= '</li>';
			$config['attributes'] 		= array('class' => 'page-link');
			$config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] 	= '</a></li>';

			$config['next_tag_open'] 	= '<li class="page-item">';
					$config['next_link'] 		= '<span aria-hidden="true">&raquo;</span>
																				<span class="sr-only"></span>';
			$config['next_tag_close'] 	= '</li>';

			$config['prev_tag_open'] 	= '<li class="page-item">';
					$config['prev_link'] 		= '<span aria-hidden="true">&laquo;</span>
																				<span class="sr-only">Previous</span>';
			$config['prev_tag_close'] 	= '</a></li>';

			$config['first_link'] 		= false;
			$config['last_link'] 		= false;

			$config['page_query_string'] = TRUE;

			$this->pagination->initialize($config);

			$options  = [
				'limit'				=> '5',
				'offset'			=>	isset($_GET['per_page']) ? $_GET['per_page'] : 0
			];

			$events = $this->Eventsmodel->get($options);

			$data = [
						'main_content' => $this->load->view('admin/manage_events/events_manage_categories', compact('events'), true)
					];

			$this->load->view('admin/main/main_home', $data);
		} else {
				redirect('/admin');
		}
	}
	public function add_event(){
		if(isset($this->session->userdata['logged_in'])){

			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				$this->load->library('form_validation');

				// $this->form_validation->set_rules('media_category_parent_id', 'Username', 'required');
				$this->form_validation->set_rules('event_title', 'Title', 'required');
				$this->form_validation->set_rules('event_description', 'Event Description', 'required');
				$this->form_validation->set_rules('event_address', 'Event Address', 'required');
				$this->form_validation->set_rules('event_city', 'City', 'required');
				$this->form_validation->set_rules('event_start_time', 'Event start time', 'required');
				$this->form_validation->set_rules('event_end_time', 'Event end time', 'required');

				if ($this->form_validation->run() == FALSE)
				{
					print json_encode( [ 'success' => 0, 'msg' => 'Please fill required fields!' ] );
					return false;
				}

				$data = $_POST;

				//check if end date > start date
				if(strtotime($data['event_end_time']) <= strtotime($data['event_start_time']) ){
						print json_encode( [ 'success' => 0, 'msg' => 'Event End Time should be after the event start time!' ] );
						return false;
				}


				if( isset($data['event_start_time']) && !empty($data['event_start_time']) ) {
					$data['event_start_time'] = $data['event_start_time'];
					// $data['event_start_time'] = date('Y-m-d h:i:s', strtotime($data['event_start_time']));
				}

				if( isset($data['event_end_time']) && !empty($data['event_end_time']) ) {
					$data['event_end_time'] = $data['event_end_time'];
					// $data['event_end_time'] = date('Y-m-d h:i:s', strtotime($data['event_end_time']));
				}

				if( isset($data['event_location_url']) && !empty($data['event_location_url']) ) {
					$data['event_location_url'] = html_entity_decode($data['event_location_url']);
				}

				if( isset($data['call_action_url']) && !empty($data['call_action_url']) ) {
					$data['call_action_url'] = html_entity_decode($data['call_action_url']);
				}

				$data['is_event_public'] = isset($data['is_event_public']) ? $data['is_event_public'] : 0;
				$data['is_call_action'] = isset($data['is_call_action']) ? $data['is_call_action'] : 0;

				if( isset($data['event_id']) && $data['event_id'] > 0 ) {

					$event = $this->Eventsmodel->update($data);
					$res = $this->Eventsmodel->get([ 'id' => $data['event_id'] ] );

					print json_encode(['success'=>1, 'id' => $data['event_id'], 'res' => $res]);
					return true;
				}

				unset($data['event_id']);
				$data['user_id'] = 	$this->session->userdata['logged_in']['user_obj']->user_id;
				$event_id = $this->Eventsmodel->add($data);
				$res = $this->Eventsmodel->get([ 'event_id' => $event_id ]);


				$alias = "";
				if( $event_id ){
					$alias = addUrlAlias($event_id, 'event', 	$data['event_title'], '');
				}

				// $file_upload = $this->Fileuploadmodel->add($_POST);

				print json_encode(['success'=>1, 'id' => $event_id, 'alias' => $alias, 'res' => $res]);
			}
		} else {
			redirect('/admin');
		}
	}

	public function event_delete_img()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = $_POST;
			$file = $this->Fileuploadmodel->get( [ 'file_upload_id' => $data['file_upload_id'] ] );

			if( $file ) {
					if( file_exists($file[0]->file_upload_path) ) {
						if (unlink($file[0]->file_upload_path)) {

							$this->Eventsmodel->update( [ 'event_id' => $data['event_id'], 'file_upload_id' => 0 ] );
							$this->Fileuploadmodel->delete( [ $data['file_upload_id'] ] );

							print json_encode([ 'success' => 1, "msg" => 'File has been deleted!']);
						}	else {
							print json_encode(['success' => 0, "msg" => 'unable to unlink file']);
						}
					} else {
						print json_encode([ 'success' => 0, "msg" => 'file does not exist']);
					}
			}


		}
	}

	public function add_event_content(){
		if(isset($this->session->userdata['logged_in'])){
			$events_category = $this->Eventcategorymodel->get();
			$events_templates = $this->Eventsmodel->get_event_templates();

			$data = [

						'main_content' => $this->load->view('admin/manage_events/events_add_new', compact('events_category', 'events_templates'), true)
					];

			$this->load->view('admin/main/main_home', $data);
		} else {
				redirect('/admin');
		}
	}
	public function edit_event_content(){
		if(isset($this->session->userdata['logged_in'])){
			$events_category = $this->Eventcategorymodel->get();
			$events_templates = $this->Eventsmodel->get_event_templates();

			$id = $this->uri->segment(3);
			$options = [
				'id' => $id
			];
			$events = $this->Eventsmodel->get($options);
			$editView = 1;

			// print_r($events);
			// return 0;
			$data = [
						'main_content' => $this->load->view('admin/manage_events/events_add_new', compact('events_category','events','editView','id', 'events_templates'), true)
					];

			$this->load->view('admin/main/main_home', $data);
		} else {
				redirect('/admin');
		}
	}
	public function update_event(){
		if(isset($this->session->userdata['logged_in'])){

			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				$this->load->library('form_validation');

				$this->form_validation->set_rules('event_title', 'Title', 'required');
				$this->form_validation->set_rules('event_description', 'Event Description', 'required');
				$this->form_validation->set_rules('event_address', 'Event Address', 'required');
				$this->form_validation->set_rules('event_city', 'City', 'required');
				$this->form_validation->set_rules('event_start_time', 'Event start time', 'required');
				$this->form_validation->set_rules('event_end_time', 'Event end time', 'required');

				if ($this->form_validation->run() == FALSE)
				{
					print json_encode( [ 'success' => 0, 'msg' => 'Please fill required fields!' ] );
					return false;
				}

				$data = $_POST;

				if(strtotime($data['event_end_time']) <= strtotime($data['event_start_time']) ){
						print json_encode( [ 'success' => 0, 'msg' => 'Event End Time should be after the event start time!' ] );
						return false;
				}

				if( isset($data['event_start_time']) && !empty($data['event_start_time']) ) {
					$data['event_start_time'] = $data['event_start_time'];
					// $data['event_start_time'] = date('Y-m-d h:i:s', strtotime($data['event_start_time']));
				}

				if( isset($data['event_end_time']) && !empty($data['event_end_time']) ) {
					$data['event_end_time'] = $data['event_end_time'];
					// $data['event_end_time'] = date('Y-m-d h:i:s', strtotime($data['event_end_time']));
				}

				if( isset($data['event_location_url']) && !empty($data['event_location_url']) ) {
					$data['event_location_url'] = html_entity_decode($data['event_location_url']);
				}

				if( isset($data['call_action_url']) && !empty($data['call_action_url']) ) {
					$data['call_action_url'] = html_entity_decode($data['call_action_url']);
				}

				$data['is_event_public'] = isset($data['is_event_public']) ? $data['is_event_public'] : 0;
				$data['is_call_action'] = isset($data['is_call_action']) ? $data['is_call_action'] : 0;

				$event = $this->Eventsmodel->update($data);
				$res = $this->Eventsmodel->get( [ 'id' => $data['event_id'] ] );
				// $file_upload = $this->Fileuploadmodel->add($_POST);
				print json_encode([ 'success'=>1, 'res' => $res]);
			}
		} else {
			redirect('/admin');
		}
	}

	public function downloadable_update()
	{
		if(isset($this->session->userdata['logged_in'])) {
			$post = $_POST;
			$data = [
				'media_downloadable' 	=> $post['downloadable'],
				'media_id' 				=> $post['media_id']
			];

			if( $this->Mediamodel->update( $data ) ) {

				print json_encode([ 'success' => 1, 'message' => 'update success']);

			}else{
				print json_encode( [ 'success' => 0, 'message' => 'Error!' ]);
			}


		}
	}

	public function media_edit_category(){
		if(isset($this->session->userdata['logged_in'])){
			$category_id = $this->uri->segment(3);
			$media_category_obj = $this->Mediacategorymodel->get_details( $category_id );
			$media_categories = $this->Mediacategorymodel->get_categories( $category_id );

			$data = array();
			$data['main_content'] = $this->load->view('admin/manage_content/media_edit_category', [ 'data' => $media_category_obj, 'uri' => $category_id, 'media_categories' => $media_categories ], true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}
	public function edit_media_category() { //for actual edit of media category
		if(isset($this->session->userdata['logged_in'])){

			$this->load->library('form_validation');

			// $this->form_validation->set_rules('media_category_parent_id', 'Username', 'required');
			$this->form_validation->set_rules('media_category_title', 'Title', 'required');
			$this->form_validation->set_rules('media_category_description', 'Category Description', 'required');
			// $this->form_validation->set_rules('email', 'Email', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				print json_encode( [ 'success' => 0 ] );
				return false;
			}

			$str = '';
			$str_arr = [];
			$post = $_POST;

			foreach ($post as $key => $value){
					$value = addslashes($value);
					$str_arr[$key] = $value;
			}

			$str = json_encode($str_arr);
			$media_id = $str_arr['media_category_id'];
			$media_obj = $this->Mediacategorymodel->get();
			if($media_obj){ //update
				$arr = [
					'media_category_id' => $media_id,
					'media_category_title' => $str_arr['media_category_title'],
					'media_category_description' => $str_arr['media_category_description'],
					'media_category_parent_id' => $str_arr['media_category_parent_id'],
					'media_category_url' => $str_arr['media_category_url']
				];
				$updated = $this->Mediacategorymodel->update($arr);
			}
			print json_encode([ 'success'=>1, 'media_id' => $media_id ]);

		}else{
			print json_encode( [ 'success' => 0 ]);
		}
	}
	public function media_new_category(){
		if(isset($this->session->userdata['logged_in'])){
			$media_category_obj = $this->Mediacategorymodel->get();
			$data = array();
			$data['main_content'] = $this->load->view('admin/manage_content/media_new_category', [ 'data' => $media_category_obj ], true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}
	//////////////////End Media, possibly change function names to improve readability

	public function site_design_save()
	{
		if(isset($this->session->userdata['logged_in'])){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$site_design_id = 0;
					$site_design_obj = $this->Sitedesignmodel->get(array('limit'=>1));

					if($site_design_obj){ //update
							$site_design_id = $site_design_obj[0]->site_design_id;

							$arr = $_POST;
							$arr['site_design_id'] = $site_design_id;
							$updated = $this->Sitedesignmodel->update($arr);
					}else{ //insert
							$site_design_id = $this->Sitedesignmodel->add($_POST);
					}

					print json_encode(array('success'=>1, 'site_design_id'=>$site_design_id));
			}
		}else{
				print json_encode(array('success'=>0));
		}
	}


	public function custom_design()
	{
		if(isset($this->session->userdata['logged_in'])){
			$site_design_obj = $this->Sitedesignmodel->get(array('limit'=>1));
			if($site_design_obj){
					$site_design_obj = $site_design_obj[0];
			}

			$data = array();
			$data['main_content'] = $this->load->view('admin/site_design/custom', array('site_design_obj' => $site_design_obj), true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}

	public function general_settings()
	{
		if(isset($this->session->userdata['logged_in'])){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$gs_obj = $this->Groupsettingsmodel->get(array('limit'=>1));

					if($gs_obj){ //update
							$arr = $_POST;
							$updated = $this->Groupsettingsmodel->update($arr);
					}else{ //insert
							$obj = $this->Groupsettingsmodel->add($_POST);
					}

					print json_encode(array('success'=>1));
			}
			else{
					$group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
					$timezones = $this->Timezonemodel->get();

					if($group_settings_obj){
							$group_settings_obj = $group_settings_obj[0];
					}

					$data = array();
					$data['main_content'] = $this->load->view('admin/group_settings/general_settings', array('group_settings_obj' => $group_settings_obj, 'timezones'=>$timezones), true);
					$this->load->view('admin/main/main_home', $data);
			}
		}else{
				redirect('/admin');
		}
	}

	public function communication()
	{
		if(isset($this->session->userdata['logged_in'])){

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$gs_obj = $this->Groupsettingsmodel->get(array('limit'=>1));

					if($gs_obj){ //update
							$arr = $_POST;
							$updated = $this->Groupsettingsmodel->update($arr);
					}else{ //insert
							$obj = $this->Groupsettingsmodel->add($_POST);
					}

					print json_encode(array('success'=>1));
			}else {
					//get user pages
					$opt_arr = array();
					$opt_arr['page_type_default_and_custom'] = 1;
					$opt_arr['page_is_admin'] = 0;
					$pages = $this->Pagemodel->get($opt_arr);

					$group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
					if($group_settings_obj){
							$group_settings_obj = $group_settings_obj[0];
					}

					$data = array();
					$data['main_content'] = $this->load->view('admin/group_settings/communication', array('group_settings_obj' => $group_settings_obj, 'pages'=>$pages), true);
					$this->load->view('admin/main/main_home', $data);
			}
		}else{
				redirect('/admin');
		}
	}

	public function clear_cache()
	{
		if(isset($this->session->userdata['logged_in'])){
			$data = array();
			$data['main_content'] = $this->load->view('admin/group_settings/clear_cache', array(), true);
			$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}

	public function login(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$data = array(
						'email' => $this->input->post('emailaddress'),
						'password' => $this->input->post('password')
					);

					$result = $this->Usermodel->login($data);

					if ($result !== FALSE) {
						$session_data = array(
							'user_obj' 	    => $result[0],
							'group_details' => $this->isDomainExisting()
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);

						redirect('/admin');
					} else {
						$data = array(
							'errmess' => 'Invalid Email or Password'
						);

						redirect('/admin');
					}
			}
	}

	public function forgotpassword(){

			$data = array();

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$data = array(
					'email' => $this->input->post('emailaddress'),
				);

				$this->load->helper('admin');
				sendForgotPasswordEmail($data['email']);

				$data['main_content'] = $this->load->view('admin/forgotpassword/emailsent', $data, true);
			} else {
				$data['main_content'] = $this->load->view('admin/forgotpassword/inputemail', null, true);
			}
			$this->load->view('admin/main', $data);
	}

	public function resetpassword(){

			$data = array();

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $this->Usermodel->getUserByResetPasswordKey((isset($_GET['r']) ? $_GET['r'] : null));
				$data = array(
					'user_id' => $user[0]->user_id,
					'user_password' => md5($this->input->post('newpassword')),
					'user_reset_password_key' => '',
					'user_reset_password_expiration' => '0000-00-00 00:00:00',
				);
				$this->Usermodel->update($data);
				redirect('/admin#passwordresetsuccess');
				//$data['main_content'] = $this->load->view('admin/forgotpassword/success', $data, true);
			} else {

				$user = $this->Usermodel->getUserByResetPasswordKey((isset($_GET['r']) ? $_GET['r'] : null));

				if($user === false){
					$data['main_content'] = $this->load->view('admin/forgotpassword/invalidlink', null, true);
				} else {
					$data['main_content'] = $this->load->view('admin/forgotpassword/resetpassword', null, true);
				}
			}
			$this->load->view('admin/main', $data);
	}

        public function tracking_code_fbpixel()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
                        if($group_settings_obj){
                                        $group_settings_obj = $group_settings_obj[0];
                        }

                        $data = array();
                        $data['main_content'] = $this->load->view('admin/trackingcodes/fbpixel', array('group_settings_obj' => $group_settings_obj), true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
		}


        public function tracking_code_googleanalytics()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
                        if($group_settings_obj){
                                        $group_settings_obj = $group_settings_obj[0];
                        }

                        $data = array();
                        $data['main_content'] = $this->load->view('admin/trackingcodes/googleanalytics', array('group_settings_obj' => $group_settings_obj), true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
        }

        public function tracking_code_googletagmanager()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
                        if($group_settings_obj){
                                        $group_settings_obj = $group_settings_obj[0];
                        }

                        $data = array();
                        $data['main_content'] = $this->load->view('admin/trackingcodes/googletagmanager', array('group_settings_obj' => $group_settings_obj), true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
        }

        public function tracking_code_pinterest()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
                        if($group_settings_obj){
                                        $group_settings_obj = $group_settings_obj[0];
                        }

                        $data = array();
                        $data['main_content'] = $this->load->view('admin/trackingcodes/pinterest', array('group_settings_obj' => $group_settings_obj), true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
        }

        public function tracking_code_twitter()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
                        if($group_settings_obj){
                                        $group_settings_obj = $group_settings_obj[0];
                        }

                        $data = array();
                        $data['main_content'] = $this->load->view('admin/trackingcodes/twitter', array('group_settings_obj' => $group_settings_obj), true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
        }

	public function tracking_code_save()
	{
		if(isset($this->session->userdata['logged_in'])){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$type = $_POST['type'];

				switch($type) {
					case "fbpixel":
					case "googleanalytics":
					case "googletagmanager":
					case "pinterest":
					case "twitter":


						$var = "group_settings_tracking_code_".$type;

                        			$group_settings_obj = $this->Groupsettingsmodel->get(array('limit'=>1));
                        			if($group_settings_obj){
                                		        $group_settings_obj = $group_settings_obj[0];
							$group_settings_obj->{$var} = $_POST['value'];
							$this->Groupsettingsmodel->update($group_settings_obj);
						}else{ //insert
							$group_settings_obj = new stdClass;
							$group_settings_obj->{$var} = $_POST['value'];
							$this->Groupsettingsmodel->add($group_settings_obj);
						}

						print json_encode(array('success'=>1));

					break;
					default:
						print json_encode(array('success'=>0));

				}
			}
		}else{
				print json_encode(array('success'=>0));
		}
	}



        public function faq()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $data = array();
                        $data['main_content'] = $this->load->view('admin/knowledgebase/faq', null, true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
        }

        public function custom_template()
        {
                if(isset($this->session->userdata['logged_in'])){
                        $data = array();
                        $data['main_content'] = $this->load->view('admin/templates/list', null, true);
                        $this->load->view('admin/main/main_home', $data);
                }else{
                                redirect('/admin');
                }
        }



		public function logout() {

			// Removing session data
			$sess_array = array(
				'user_obj' => ''
			);

			$this->session->unset_userdata('logged_in', $sess_array);
			redirect('/admin');
		}

		public function pages()
		{
			if(isset($this->session->userdata['logged_in'])){
				$this->load->library('pagination');
				$data = array();

				$keyword = '';
				if(isset($_GET['keyword']))
						$keyword = trim($_GET['keyword']);

				//for Pagination
				$config['base_url'] 		= base_url('admin/pages');
				$config['total_rows'] 		= $this->Pagemodel->get( array('keyword'=>$keyword, 'page_is_admin'=>0, 'page_type_id'=>2, 'count'=>1) );
				$config['per_page'] 		= 9;
				$config['full_tag_open'] 	= '<nav class="text-right"> <ul class="pagination">';
				$config['full_tag_close'] 	= '</nav> </ul>';
				$config['first_tag_open'] 	= false;
				$config['first_tag_close'] 	= false;
				$config['num_tag_open'] 	= '<li class="page-item">';
				$config['num_tag_close'] 	= '</li>';
				$config['attributes'] 		= array('class' => 'page-link');
				$config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
				$config['cur_tag_close'] 	= '</a></li>';
				$config['next_tag_open'] 	= '<li class="page-item">';
		    $config['next_link'] 		= '<span aria-hidden="true">&raquo;</span><span class="sr-only"></span>';
				$config['next_tag_close'] 	= '</li>';
				$config['prev_tag_open'] 	= '<li class="page-item">';
		    $config['prev_link'] 		= '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>';
				$config['prev_tag_close'] 	= '</a></li>';
				$config['first_link'] 		= false;
				$config['last_link'] 		= false;
				$config['page_query_string'] = TRUE;

				$this->pagination->initialize($config);

				$offset = isset($_GET['per_page']) ? $_GET['per_page'] : 0;
				//end for pagination

				$all_pages = $this->Pagemodel->get(array('keyword'=>$keyword, 'page_is_admin'=>0, 'page_type_id'=>2, 'limit'=>9, 'offset'=>$offset, 'sortBy'=>'page_created_on', 'sortDirection'=>'desc'));
				$layouts = $this->Pagelayoutmodel->get();

				$data['main_content'] = $this->load->view('admin/site_build/pages', array('pages'=>$all_pages, 'keyword'=>$keyword, 'page_layouts'=>$layouts), true);
				$this->load->view('admin/main/main_home', $data);
			}else{
					redirect('/admin');
			}
		}

		public function seoreport($pageid){
        $page = $this->Pagemodel->get(array('page_id'=>$pageid));
				if( isset($page[0]->page_id) ){
						$page = $page[0];

						$url = site_url($page->page_url_alias);//'http://merkergroup.boomity.net/debt-finance-attorney-ny-ny';
		        $metadata = get_all_meta_data($url);

		        $ch = curl_init($url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		        $content = curl_exec($ch);
		        curl_close($ch);


		        $data = Array(
		             "type" => 'page',
		             "url" => $url,
		             "title" => $page->page_title,
		             "id" => $pageid,
		             "metadata" => $metadata,
		             "body" => $page->page_content,
		             "whole" => $content
		        );

						$seo_body = $this->load->view("admin/site_build/modals/seo_body", $data, true);

						print json_encode(array('success'=>1, 'seo_body'=>$seo_body));
				}
    }

		public function copy_page(){
			if(isset($this->session->userdata['logged_in'])){
				$success = 0;
				$message = 'Page not found.';

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$page_arr = array();
						$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;
						$page_block = '';

						$page_id_to_clone = isset($_POST['page_id']) ? $_POST['page_id'] : 0;

						//get page details
						$page_obj = $this->Pagemodel->get(array('page_id'=>$page_id_to_clone));
						//end get page details

						if( isset($page_obj[0]->page_id) ){
								$page_obj = $page_obj[0];
								$page_arr['page_title'] = $page_obj->page_title.' - COPY';
								$page_arr['page_access_for_anonymous_users'] = $page_obj->page_access_for_anonymous_users;
								$page_arr['page_keywords'] = $page_obj->page_keywords;
								$page_arr['page_meta_description'] = $page_obj->page_meta_description;
								$page_arr['page_type_id'] = 2; //custom pages
								$page_arr['page_is_admin'] = 0;
								$page_arr['page_is_active'] = 0; //since its a copy set it to draft by default
								$page_arr['user_id'] = $logged_in_user;
								$page_arr['page_layout'] = $page_obj->page_layout;
								$page_arr['page_content'] = $page_obj->page_content;

								$page_id = $this->Pagemodel->add($page_arr);

								if($page_id){
										$success = 1;
										$message = 'success';

										$alias = addUrlAlias($page_id, 'page', $page_obj->page_title.' - COPY', '');

										//get image
										$img_str = getImgStr($page_obj->page_content);
										//end get image

										$page_block_data = new stdClass();
										$page_block_data->page_id = $page_id;
										$page_block_data->page_title = $page_obj->page_title.' - COPY';
										$page_block_data->page_is_homepage = 0;
										$page_block_data->page_url_alias = $alias;
										$page_block_data->page_is_active = 0;
										$page_block = $this->load->view('admin/site_build/page_block', array('page'=>$page_block_data, 'img_str'=>$img_str), true);



										print json_encode(array('success'=>$success, 'page_id'=>$page_id, 'message'=>$message, 'alias'=>$alias, 'page_block'=>$page_block));
								}else {
										$message = 'Error adding new page.';
										print json_encode(array('success'=>$success, 'message'=>$message));
								}

						}else {
								print json_encode(array('success'=>$success, 'message'=>$message));
						}
				}else {
						$message = 'Invalid method.';
						print json_encode(array('success'=>$success, 'message'=>$message));
				}
			}else{
					redirect('/admin');
			}
		}

		public function page($page_id){
			if(isset($this->session->userdata['logged_in'])){
				$success = 0;
				$message = 'Page not found.';

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$page_arr = array();
						$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;
						$page_block = '';

						$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : 0;
						$page_arr['page_title'] = $_POST['page_title'];
						$page_arr['page_access_for_anonymous_users'] = $_POST['page_access_for_anonymous_users'];
						$page_arr['page_keywords'] = $_POST['page_keywords'];
						$page_arr['page_meta_description'] = $_POST['page_meta_description'];
						$page_arr['page_type_id'] = 2; //custom pages
						$page_arr['page_is_admin'] = 0;
						$page_arr['user_id'] = $logged_in_user;

						if(isset($_POST['page_layout'])){
								$page_arr['page_layout'] = $_POST['page_layout'];
								$newlayout = $this->Pagelayoutmodel->get(array('page_layout_id'=>$_POST['page_layout']));

								$page_arr['page_content'] = '';
								if(isset($newlayout[0]->page_layout_id)){
										$newlayout = $newlayout[0];
										$page_arr['page_content'] = $newlayout->page_layout_html;
								}
						}

						if(isset($_POST['page_id']) && $_POST['page_id'] > 0){
								$page_arr['page_id'] = $page_id;
								$page_obj = $this->Pagemodel->update($page_arr);
								$success = 1;
								$message = 'success';

								$alias = addUrlAlias($page_id, 'page', $_POST['page_title'], $_POST['custom_url']);
						}
						else{
								$page_arr['page_is_active'] = $_POST['published'];
								$page_id = $this->Pagemodel->add($page_arr);
								$success = 1;
								$message = 'success';

								$alias = addUrlAlias($page_id, 'page', $_POST['page_title'], $_POST['custom_url']);

								$page_block_data = new stdClass();
								$page_block_data->page_id = $page_id;
								$page_block_data->page_title = $_POST['page_title'];
								$page_block_data->page_is_homepage = 0;
								$page_block_data->page_url_alias = $alias;
								$page_block_data->page_is_active = 0;

								//get Image
								$img_str = getImgStr($newlayout->page_layout_html);
								$page_block = $this->load->view('admin/site_build/page_block', array('page'=>$page_block_data, 'img_str'=>$img_str), true);
						}


						print json_encode(array('success'=>$success, 'page_id'=>$page_id, 'page_title'=>$_POST['page_title'], 'message'=>$message, 'alias'=>$alias, 'page_block'=>$page_block));

				}else {
						$page_obj = $this->Pagemodel->get(array('page_id'=>$page_id));
						$page_title = '';
						$page_url_alias = '';
						$custom_url = '';
						$page_perm = '';
						$keywords = '';
						$meta_description = '';

						if(isset($page_obj[0]->page_id)){
								$page_title = $page_obj[0]->page_title;
								$page_url_alias = $page_obj[0]->page_url_alias;
								$custom_url = $page_obj[0]->custom_url;
								$page_perm = $page_obj[0]->page_access_for_anonymous_users;
								$keywords = $page_obj[0]->page_keywords;
								$meta_description = $page_obj[0]->page_meta_description;
								$message = 'success';
								$success = 1;
						}

						print json_encode(array('success'=>$success, 'message'=>$message, 'page_id'=>$page_id, 'page_title'=>$page_title, 'page_url_alias'=>$page_url_alias, 'custom_url'=>$custom_url, 'page_perm'=>$page_perm, 'keywords'=>$keywords, 'meta_description'=>$meta_description));
				}
			}else{
					redirect('/admin');
			}
		}

		public function page_inline_save(){
			if(isset($this->session->userdata['logged_in'])){
				$success = 0;
				$message = 'Page not found.';

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$page_arr = array();
						$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;
						$page_block = '';

						$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : 0;

						if($page_id){
								$page_obj = $this->Pagemodel->get(array('page_id'=>$page_id));
								//$html = preg_replace('#<div[^>]*id="'.$_POST['container_id'].'"[^>]*>.*?</div>#is', '<div id="'.$_POST['container_id'].'" class="froala-container">'.$_POST['content'].'</div>', $page_obj[0]->page_content);

								/*
								$rgx
								= '#'               // REGEX DELIMITER
								. '('               // START CAPTURE GROUP
								. '<div id="'.$_POST['container_id'].'"'  // A LITERAL STRING
								. '['               // START CHARACTER CLASS
								. '^'               // NEGATION - MATCH NONE OF THIS CLASS
								. '>'               // THE RIGHT WICKET
								. ']'               // ENDOF CHARACTER CLASS
								. '*'               // ZERO OR MORE OF ANYTHING
								. '>'               // THE RIGHT WICKET
								. ')'               // ENDOF CAPTURE GROUP
								. '.*?'             // ANYTHING OR NOTHING
								. '('               // START CAPTURE GROUP
								. '</div>'          // CLOSE DIV TAG
								. ')'               // ENDOF CAPTURE GROUP
								. '#'               // REGEX DELIMITER
								. 'is'              // FLAGS: CASE-INSENSITIVE, STRING IS SINGLE LINE
								;

								preg_match($rgx, $page_obj[0]->page_content, $matches);
								die(var_dump($matches));

								//$html = preg_replace($rgx, '<div id="'.$_POST['container_id'].'" class="froala-container">'.$_POST['content'].'</div>', $page_obj[0]->page_content);
								if(isset($matches[1]))
									$html = preg_replace($rgx, $matches[1].$_POST['content'].'</div>', $page_obj[0]->page_content);
								else
									$html = preg_replace($rgx, '<div id="'.$_POST['container_id'].'" class="froala-container">'.$_POST['content'].'</div>', $page_obj[0]->page_content);
								*/

								$doc = new DOMDocument();
								libxml_use_internal_errors(true);
								$doc->loadHTML($page_obj[0]->page_content);
								libxml_clear_errors();
								$doc->getElementById($_POST['container_id'])->nodeValue = $_POST['content'];
								$html = $doc->saveHTML();

								preg_match('/<body>(.*)<\/body>/s', $html, $matches);

								if(isset($matches[1]))
										$html = $matches[1];

								$page_arr['page_content'] = htmlspecialchars_decode($html);
								$page_arr['user_id'] = $logged_in_user;
								$alias = '';

								if($page_obj[0]->page_is_active == 1){
										$page_arr['page_type_id'] = 2;
										$page_arr['page_title'] = $page_obj[0]->page_title.' - DRAFT';
										$page_arr['page_is_active'] = 0;
										$page_arr['draft_page_id'] = $page_id;
										$page_id = $this->Pagemodel->add($page_arr);

										$alias = addUrlAlias($page_id, 'page', $page_obj[0]->page_title.' - DRAFT', '');
								}else {
										$page_arr['page_id'] = $page_id;
										$page_obj = $this->Pagemodel->update($page_arr);
								}

								$success = 1;
								$message = 'success';
								print json_encode(array('success'=>$success, 'page_id'=>$page_id, 'alias'=>$alias));
						}
						else {
								$success = 0;
								$message = 'failed';
								print json_encode(array('success'=>$success));
						}
				}
			}
		}

		public function page_publish(){
			if(isset($this->session->userdata['logged_in'])){
				$success = 0;
				$message = 'Error publishing page.';

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$page_arr = array();
						$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;
						$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : 0;

						if($page_id){
								$page_obj = $this->Pagemodel->get(array('page_id'=>$page_id));
								$url_alias = $page_obj[0]->page_url_alias;
								$page_arr['user_id'] = $logged_in_user;
								$page_arr['page_is_active'] = 1;

								if($page_obj[0]->page_is_active == 1){
										$success = 1;
										$message = 'success';
								}else {
										if($page_obj[0]->draft_page_id != NULL && $page_obj[0]->draft_page_id > 0){
												$page_arr['page_content'] = $page_obj[0]->page_content;
												$page_arr['page_id'] = $page_obj[0]->draft_page_id;
												$page_update = $this->Pagemodel->update($page_arr);

												//delete draft record
												$page_deleted = $this->Pagemodel->delete(array('page_id'=>$page_id));

												//get alias
												$page_obj2 = $this->Pagemodel->get(array('page_id'=>$page_obj[0]->draft_page_id));
												$url_alias = $page_obj2[0]->page_url_alias;
										}else{ //update page is active only to 1
												$page_arr['page_id'] = $page_id;
												$page_update = $this->Pagemodel->update($page_arr);
										}
								}

								$success = 1;
								$message = 'success';
								print json_encode(array('success'=>$success, 'page_id'=>$page_id, 'url_alias'=>$url_alias));
						}
						else {
								$success = 0;
								$message = 'failed';
								print json_encode(array('success'=>$success));
						}
				}
			}
		}

		public function page_homepage($page_id){
			if(isset($this->session->userdata['logged_in'])){
						$success = 0;
						$message = 'Page not found.';

						if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$page_arr = array();

								$page_arr['page_is_homepage'] = $_POST['page_is_homepage'];
								$page_arr['page_id'] = $page_id;

								$page_obj = $this->Pagemodel->update($page_arr);
								$success = 1;
								$message = 'success';
						}

						print json_encode(array('success'=>$success, 'message'=>$message));
			}else{
					redirect('/admin');
			}
		}

		public function page_delete(){
			if(isset($this->session->userdata['logged_in'])){
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$data = array();
							$data['page_id'] = $_POST['page_id'];
							$ret = $this->Pagemodel->delete($data);

							//delete also url_alias
							$ret = $this->Urlaliasmodel->delete(array('id'=>$_POST['page_id'], 'url_alias_type'=>'page'));

							echo json_encode(array('success'=>1));
					}
			}else{
					redirect('/admin');
			}
		}

		public function widget($type, $widget_id = 0)
		{
				if(isset($this->session->userdata['logged_in'])){

					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$success = 0;
						$message = '';
						$sidebar_widget_id = 0;
						//get widget type format
						$widget_type_obj = $this->Widgettypemodel->get(array('id'=>$_POST['widget_type_id']));
						
						if(isset($widget_type_obj[0]->widget_type_value)){
								$widget_format = $widget_type_obj[0]->widget_type_value;
								$elements = explode(',', $widget_format);
								$new_elements = array();

								foreach ($elements as $key => $el) {
										$props = explode('|', $el);

										if(isset($_POST[preg_replace('/\s+/', '_', trim($props[0]))])){
												if(isset($props[2]))
														$props[2] = $_POST[preg_replace('/\s+/', '_', trim($props[0]))];
												else
														array_push($props,$_POST[preg_replace('/\s+/', '_', trim($props[0]))]);
										}

										$new_elements[] = implode('|', $props);
								}

								$sidebar_widget_value = implode(',', $new_elements);
								//save data
								$data = array();
								$data['widget_type_id'] = $_POST['widget_type_id'];
								$data['sidebar_widget_name'] = $_POST['sidebar_widget_name'];
								$data['sidebar_widget_value'] = $sidebar_widget_value;
								$data['sidebar_widget_display_title'] = isset($_POST['sidebar_widget_display_title']) ? $_POST['sidebar_widget_display_title'] : 0;
								$data['sidebar_widget_position'] = $_POST['sidebar_widget_position'];

								if(isset($_POST['sidebar_widget_id']) && $_POST['sidebar_widget_id'] != 0){ //update record
										$data['sidebar_widget_id'] = $_POST['sidebar_widget_id'];
										$sidebar_widget_id = $_POST['sidebar_widget_id'];
										$affected = $this->Sidebarwidgetmodel->update($data);
								}else { //new record
										$sidebar_widget_id = $this->Sidebarwidgetmodel->add($data);
								}
								$success = 1;
						}else{
								$message = 'Widget type does not exist.';
						}

						print json_encode(array('success'=>$success, 'message'=>$message, 'sidebar_widget_id'=>$sidebar_widget_id));
					}else {
							$data = array();
							$sidebar_widget = false;
							if($widget_id != 0)
									$sidebar_widget = $this->Sidebarwidgetmodel->get(array('id'=>$widget_id));

									//parse sidebar widget values
							    $fields = false;
							    if($sidebar_widget){
							        $sidebar_widget_value = $sidebar_widget[0]->sidebar_widget_value;
							        $elements = explode(',', $sidebar_widget_value);

							        $fields = array();
							        foreach ($elements as $el) {
							            $props = explode('|', $el);
							            $fields[$props[0]] = $props['2'];
							        }
							    }
							//die(var_dump($sidebar_widget[0]->sidebar_widget_name));

							$data['main_content'] = $this->load->view('admin/widgets/'.$type, array('widget_id'=>$widget_id, 'sidebar_widget'=>$sidebar_widget, 'fields'=>$fields), true);
							$this->load->view('admin/main/main_home', $data);
					}
				}else{
						redirect('/admin');
				}
		}

		public function widgets()
		{
			if(isset($this->session->userdata['logged_in'])){
				$data = array();

				$keyword = '';
				if(isset($_GET['keyword']))
						$keyword = trim($_GET['keyword']);

				$all_widgets = $this->Sidebarwidgetmodel->get(array('keyword'=>$keyword));

				$data['main_content'] = $this->load->view('admin/widgets/edit_widgets', array('widgets'=>$all_widgets, 'keyword'=>$keyword), true);
				$this->load->view('admin/main/main_home', $data);
			}else{
					redirect('/admin');
			}
		}

		public function widget_delete(){
			if(isset($this->session->userdata['logged_in'])){
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$data = array();
							$data['sidebar_widget_id'] = $_POST['sidebar_widget_id'];
							$ret = $this->Sidebarwidgetmodel->delete($data);

							echo json_encode(array('success'=>1));
					}
			}else{
					redirect('/admin');
			}
		}

		public function widget_active(){
			if(isset($this->session->userdata['logged_in'])){
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$data = array();
							$data['sidebar_widget_id'] = $_POST['sidebar_widget_id'];
							$data['sidebar_widget_is_active'] = $_POST['active'];
							$ret = $this->Sidebarwidgetmodel->update($data);

							echo json_encode(array('success'=>1));
					}
			}else{
					redirect('/admin');
			}
		}

		public function page_active(){
			if(isset($this->session->userdata['logged_in'])){
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$data = array();
							$data['page_id'] = $_POST['page_id'];
							$data['page_is_active'] = $_POST['active'];
							$ret = $this->Pagemodel->update($data);

							echo json_encode(array('success'=>1));
					}
			}else{
					redirect('/admin');
			}
		}

		public function manage_members()
		{
			if(isset($this->session->userdata['logged_in'])){
				if ( isset($_POST['search_value']) ) {

					$user_obj =  $this->Usermodel->get(array('search_value' => $_POST['search_value']));

				} else {

					$user_obj =  $this->Usermodel->get();
				}

				$group_obj = $this->Groupmodel->get();

				$result = array_map(function($user){
					$user['group'] = $this->Usergroupmodel->getGroups($user['user_id']);
					return $user;
				},  json_decode(json_encode($user_obj), true));

				$new_group_obj = json_decode(json_encode($result));

				$data = array();
				$data['main_content'] = $this->load->view('admin/members/members_manage', array('user_obj' => $new_group_obj, 'group_obj' => $group_obj), true);
				$this->load->view('admin/main/main_home', $data);

			}else{
					redirect('/admin');
			}
		}

		public function datatable_groups()
		{
			if(isset($this->session->userdata['logged_in'])){

				$group_obj = $this->Groupmodel->get();

				$result = array_map(function($group){
					$group['group_user'] = $this->Groupmodel->getMember($group['groups_id']);
					return $group;
				},  json_decode(json_encode($group_obj), true));

				$new_group_obj = json_decode(json_encode($result));

				$data = [];
				foreach($new_group_obj as $group){

					$member = "";

					foreach($group->group_user as $grp){
						$member .= '<p class="mb-0">'.$grp->user_firstname.'</p>';
					}

					$data[] = array(

					$group->groups_name,

					$group->groups_description,

					$member,

					'',

					'<!--<div>
						<input type="checkbox" id="switch1" checked data-switch="success"/>
						<label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
					</div>-->',

					'<div class="d-flex justify-content-around">
						<button id="edit_group" data-id="'.$group->groups_id.'" data-name="'.$group->groups_name.'" data-description="'.$group->groups_description.'" class="btn btn-sm btn-primary" type="button">&nbsp;Edit&nbsp;</button>
						<button id="delete_group" data-id="'.$group->groups_id.'" class="btn btn-sm btn-danger" type="submit">&nbsp;Delete&nbsp;</button>
					</div>'

					);
				}

				$output = array (
					"data" => $data
				);

				echo json_encode($output);

			}else{
				redirect('/admin');
			}
		}

		public function group_save()
		{
			if(isset($this->session->userdata['logged_in'])){
				if($_POST['groups_id'])
				{
					$this->Groupmodel->update($_POST);

				} else {

					 $this->Groupmodel->add($_POST);
				}

				print json_encode(array('success'=>1));

			}else{

				print json_encode(array('success'=>0));
			}
		}

		public function delete_group()
		{
			if(isset($this->session->userdata['logged_in'])){

				$group = $this->Groupmodel->delete($_POST);

				if($group){
					//delete group in user_group tbl
					$this->Usergroupmodel->deleteGroup($_POST['groups_id']);

				}

				print json_encode(array('success'=>1));

			}else{

				print json_encode(array('success'=>0));
			}
		}

		public function delete_member()
		{
			if(isset($this->session->userdata['logged_in'])){

				foreach($this->input->post('member_ids') as $member_id) {

					$user = $this->Usermodel->delete(array('user_id' => $member_id));

					if($user){
						//delete user in user group
						$this->Usergroupmodel->deleteUser($member_id);
					}

				}

				print json_encode(array('success'=>1));

			}else{

				print json_encode(array('success'=>0));
			}
		}

		public function save_user_groups()
		{
			if(isset($this->session->userdata['logged_in'])){

				$this->Usergroupmodel->add($_POST);

				print json_encode(array('success'=>1));

			}else{

				print json_encode(array('success'=>0));
			}
		}

		public function get_member_details()
		{
			if(isset($this->session->userdata['logged_in'])){

				$user_obj = $this->Usermodel->get(array('id' => $_POST['member_id']));

				//echo json_encode($user_obj[0]);
				$result = array_map(function($user){
					$user['group'] = $this->Usergroupmodel->getNotAssignedG($user['user_id']);
					return $user;
				},  json_decode(json_encode($user_obj), true));

				echo json_encode($result[0]);

				return;

			}else{

				print json_encode(array('success'=>0));
			}
		}

		public function get_members()
		{
			if(isset($this->session->userdata['logged_in'])){

				$search_data = [
					'search_value' 	=> 	$this->input->post('search_val'),
					'sortBy'	   	=>  $this->input->post('sort_by'),
					'sortDirection'	=>  'DESC',
				];

				$user_obj = $this->Usermodel->get($search_data);

				$result = array_map(function($user){
					$user['group'] = $this->Usergroupmodel->getGroups($user['user_id']);
					$user['user_lastactivity'] = time_since($user['user_lastactivity']);
					$user['user_status'] = ($user['user_status']) ? "Active" : "Inactive";
					return $user;
				},  json_decode(json_encode($user_obj), true));

				$res = array(
					'success'=>true,
					'data' => $result
				);
				echo json_encode($res);

			}else{

				print json_encode(array('success'=>0));
			}
		}

		public function member_request_list()
		{
			if(isset($this->session->userdata['logged_in'])){

				$_POST += ['filter_status' => 'new'];
				$c_request_obj = $this->Communityrequestmodel->get($_POST);

				$data = array();
				$data['main_content'] = $this->load->view('admin/members/members_requests', array('c_request_obj' => $c_request_obj), true);
				$this->load->view('admin/main/main_home', $data);

			}else{
					redirect('/admin');
			}
		}
		// community_request
		public function manage_crequest()
		{
			if(isset($this->session->userdata['logged_in'])){

				$crequest_affected_row = $this->Communityrequestmodel->update($_POST);

				if($crequest_affected_row > 0) {

					print json_encode(array('success'=>1));

				} else {

					print json_encode(array('success'=>0));
				}

			}else{
					redirect('/admin');
			}
		}

		public function member_questions()
		{
			if(isset($this->session->userdata['logged_in'])){

				$question_res = $this->Groupquestionmodel->get();

				$question_obj = array_map(function($questions){

					$questions->answer_options = json_decode($questions->group_question_answer_options);

					return $questions;
				},  $question_res);

				$user_answer_count = $this->Groupanswermodel->getAnsweredCount();

				$question_count = $this->Groupquestionmodel->getQuestionCount();

				$data = array();
				$data['main_content'] = $this->load->view('admin/members/members_questions', array('question_obj' => $question_obj, 'user_answer_count' => $user_answer_count, 'question_count' => $question_count), true);
				$this->load->view('admin/main/main_home', $data);

			}else{
					redirect('/admin');
			}
		}

		public function create_questions()
		{
			if(isset($this->session->userdata['logged_in'])){

				$data = array();

				$answer_options  = [];

				if(isset($_POST['answer']) && !empty($_POST['answer'])) {
					foreach($_POST['answer'] as $answer) {
						if(!empty($answer)){
							$answer_options[] = $answer;
						}
					}
				}

				$answer_option = (!empty($answer_options)) ? json_encode($answer_options) : ""; //trim(implode(",", $answer_options));
				$group_question_id =  (isset($_POST['group_question_id']) && $_POST['group_question_id'] != "") ? $_POST['group_question_id']  : "";
				$answer_required    = (isset($_POST['group_question_is_required'])) ?  1 : 0;
				$question_has_other = (isset($_POST['group_question_has_other'])) ? 1 : 0;
				$question_prompt = ($answer_required) ? "This question is required." : "";

				$data = [
					'group_question_id'					=> $group_question_id,
					'group_question_title'		    	=> $this->input->post('group_question_title'),
					'group_question_answer_options' 	=> $answer_option,
					'group_question_is_required'		=> $answer_required,
					'group_question_has_other'			=> $question_has_other,
					'group_question_has_other_field'	=> $this->input->post('group_question_has_other_field'),
					'answer_type_id'					=> $this->input->post('answer_type_id'),
					'group_question_is_required_prompt' => $question_prompt
				];

				if(empty($data['group_question_id'])){

					$id = $this->Groupquestionmodel->add($data);

						if($id){

							print json_encode(array('success'=>1, 'msg' => 'Successfully Added'));

						} else {

							print json_encode(array('success'=>0, 'msg' => 'Failed'));
						}

				} else {

					$id = $this->Groupquestionmodel->update($data);

						if($id){

							print json_encode(array('success'=>1, 'msg' => 'Successfully Updated'));

						} else {

							print json_encode(array('success'=>0, 'msg' => 'No changes Made'));
						}
				}

		   }else{
				   redirect('/admin');
		   }
		}

		public function delete_question()
		{
			if(isset($this->session->userdata['logged_in'])){

				$is_deleted = $this->Groupquestionmodel->delete($_POST);

				if($is_deleted){
					print json_encode(array('success'=>1));
				} else {
					print json_encode(array('success'=>0));
				}

		   }else{
				   redirect('/admin');
		   }
		}

		public function get_question()
		{
			if(isset($this->session->userdata['logged_in'])){

				$question_obj = $this->Groupquestionmodel->get($_POST);

				$data = array_map(function($questions){

					$questions->answer_options = json_decode($questions->group_question_answer_options);

					return $questions;
				},  $question_obj);

				$count = 0;
				$data_answer = [];

				if(isset($_POST['group_question_id'])){

					$count  = $this->Groupanswermodel->get(array('count' => 'count', 'group_question_id' => $_POST['group_question_id']));
					$answers = $this->Groupanswermodel->get(array('group_question_id' => $_POST['group_question_id']));

					$data_answer = array_map(function($answer){

						$answer->group_answers = json_decode($answer->group_answer_answers);

						return $answer;
					},  $answers);
				}

				$res = array(
					'success'=>true,
					'data'   => $data,
					'count'  => $count,
					'answer' => $data_answer
				);

				echo json_encode($res);

		   }else{

				print json_encode(array('success'=>0));
		   }
		}

		public function get_questions()
		{
			if(isset($this->session->userdata['logged_in'])){

				$question_obj = $this->Groupquestionmodel->get();

				$data = array_map(function($questions){

					$questions->answer_options = json_decode($questions->group_question_answer_options);

					return $questions;
				},  $question_obj);

					$res = array(
					'success'=>true,
					'data'   => $data
				);

				echo json_encode($res);

			}else{
					redirect('/admin');
			}
		}

		public function preview_widget(){
				if(isset($this->session->userdata['logged_in'])){
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$preview = $this->load->view('admin/widgets/preview/'.$_POST['type'], $_POST, true);

								echo json_encode(array('success'=>1, 'preview'=>$preview));
						}else {
								redirect('/admin');
						}
				}else {
						redirect('/admin');
				}
		}

		public function member_privileges()
		{
			if(isset($this->session->userdata['logged_in'])){

				$members = $this->Usermodel->get();

				$functionlist = $this->Userfunctionmodel->get(array('limit' => 7));

				$members_privileges_obj = array_map(function($member){

					$member->member_privileges = $this->Usergrantmodel->get(array('user_id' => $member->user_id));
					$member->role_id = array_column($this->Userrolemodel->get(array('user_id' => $member->user_id)), 'role_id');

					return $member;
				}, $members);

				$count_seats = $this->Usergrantmodel->get(array('count' => '1', 'countusedseats' => '1'));

				$data = array();
				$data['main_content'] = $this->load->view('admin/members/members_privileges', array('members_privileges_obj' => $members_privileges_obj, 'count_seats' => $count_seats, 'functionlist' => $functionlist), true);
				$this->load->view('admin/main/main_home', $data);

			}else{
					$this->load->view('admin/main');
			}
		}

		public function create_member()
		{
			if(isset($this->session->userdata['logged_in'])){

				//check first if username already existing
				$user_existing = $this->check_username_exists($_POST['user_name']);

				if(!$user_existing) {

					$user_function_ids = [];

					if(isset($_POST['user_function_id'])){

						foreach($_POST['user_function_id'] as $user_function){
							$user_function_ids[] = $user_function;
						}
					}
					//unset member privileges
					unset($_POST['user_function_id']);

					$mem_id  = $this->Usermodel->add($_POST);

					if($mem_id){
							//insert to user_function tbl
						if(!empty($user_function_ids)){

							foreach($user_function_ids as $user_function_id) {
								$this->Usergrantmodel->add(array('user_id' => $mem_id, 'user_function_id' => $user_function_id));
							}
						}

						print json_encode(array('success'=>1, 'msg' => 'Adding Member Success'));

					} else {
						print json_encode(array('success'=>0, 'msg' => 'Adding Member Failed'));
					}

				} else {

					print json_encode(array('success'=>0, 'msg' => 'Username Already Exists!'));
				}

			}else{

				$this->load->view('admin/main');
			}
		}

		public function check_username_exists($user_name)
		{
			if(isset($this->session->userdata['logged_in'])){

				$user_count = $this->Usermodel->get(array('user_name' => $user_name, 'count' => ''));

				$existing = false;

				if($user_count > 0) {

					$existing = true;

				}

				return $existing;

			}else{

				$this->load->view('admin/main');
			}
		}

		public function check_email_exists($email)
		{
			if(isset($this->session->userdata['logged_in'])){

				$user_count = $this->Usermodel->get(array('user_email' => $email, 'count' => ''));

				$existing = false;

				if($user_count > 0) {

					$existing = true;

				}

				return $existing;

			}else{

				$this->load->view('admin/main');
			}
		}

		public function isDomainExisting()
		{
			$subDomain = getSubDomain();

			$group_detail = $this->BoomityGroupmodel->get(array('groups_domain_name' => $subDomain));
			return $group_detail[0];
		}

		public function assign_privileges()
		{

			$memberlist = $this->input->post("user_id");

			$functionid = $this->input->post("user_function_id");

			if($functionid == '1')
				{
					$group   = $this->session->userdata['logged_in']['group_details'];
					$groups_id = $group->groups_id;

					foreach($memberlist as $member){
						$val_conference = addConference($groups_id, $member, '1');
					}
				}

			if($functionid == '0')
				{
					$group   = $this->session->userdata['logged_in']['group_details'];
					$groups_id = $group->groups_id;

					foreach($memberlist as $member){
						$val_conference = addConference($groups_id, $member, 'A0');
					}
				}

			$param = array();

			$functionlist = $this->Userfunctionmodel->get(array());

			foreach($memberlist as $userid) {

				$param['user_id'] = $userid;

				// revoke all privileges
				if($functionid == '0' ){

					foreach($functionlist as $function){
						$param["user_function_id"] = $function->user_function_id;
						 $useraccess = $this->Usergrantmodel->get(array( 'user_id'=>$userid, 'user_function_id'=>$function->user_function_id ));
							if(!empty($useraccess)) {
									$param["user_grant_access_id"] = $useraccess[0]->user_grant_access_id;
									$this->Usergrantmodel->delete($param);
							}
						}
				}

				else if($functionid == '1') {

					$functionlist = array_reverse($functionlist);
						foreach($functionlist as $function){
							$useraccess = $this->Usergrantmodel->get(array( 'user_id'=>$userid, 'user_function_id'=>$function->user_function_id ));
							if($useraccess && $function->user_function_id <> 1){
									$param["user_grant_access_id"] = $useraccess[0]->user_grant_access_id;
									$this->Usergrantmodel->delete($param);
							}
							elseif(!$useraccess && $function->user_function_id == 1){
								$param["user_function_id"] = 1;
								$this->Usergrantmodel->add($param);
							}
							elseif($useraccess && $function->user_function_id == 1){
								$param["user_grant_access_id"] = $useraccess[0]->user_grant_access_id;
								$this->Usergrantmodel->delete($param);
							}
						}
				}

				else if($functionid == '2') {

					foreach($functionlist as $function){
						$useraccess = $this->Usergrantmodel->get(array( 'user_id'=>$userid, 'user_function_id'=>$function->user_function_id ));
							if($useraccess && $function->user_function_id <> 2){
								$param["user_grant_access_id"] = $useraccess[0]->user_grant_access_id;
								$this->Usergrantmodel->delete($param);
							}
							elseif(!$useraccess && $function->user_function_id == 2){
								$param["user_function_id"] = 2;
								$this->Usergrantmodel->add($param);
							}
							elseif($useraccess && $function->user_function_id == 2){
								$param["user_grant_access_id"] = $useraccess[0]->user_grant_access_id;
								$this->Usergrantmodel->delete($param);
							}
						}
				}
				else{
					$param["user_function_id"] = $functionid;

					$useraccess = $this->Usergrantmodel->get(array( 'user_id'=>$userid, 'user_function_id'=>$functionid ));

					if(!$useraccess){
							$this->Usergrantmodel->add($param);
					} else {
						$param["user_grant_access_id"] = $useraccess[0]->user_grant_access_id;
						$this->Usergrantmodel->delete($param);
					}
				}
			}

		print json_encode(array('success'=>1));
		}

		public function login_check()
		{
				$logged_in = 0;
				if(isset($this->session->userdata['logged_in']))
						$logged_in = 1;


				print json_encode(array('logged_in'=>$logged_in));
		}

		public function content_blogs()
		{
			if(isset($this->session->userdata['logged_in'])){

				$blog_posts = $this->Blogmodel->get(array('sortBy' => 'blog.blog_id', 'sortDirection' => 'desc'));

				$blog_object = array_map(function($blog_detail) {
					$blog_detail->blog_category_id = ($blog_detail->blog_category_id == "") ? '0' : $blog_detail->blog_category_id;

					$blog_detail->blog_body 		= $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
					$blog_detail->blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
					$blog_detail->author				= $this->Usermodel->get(array('id' => $blog_detail->user_id));
					$blog_detail->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));
					$blog_detail->blog_groups   = $this->Groupmodel->get(array('groups_id' => $blog_detail->blog_permission ));

					return $blog_detail;
				}, $blog_posts);

				$content_type  = $this->Contenttypedefinitionmodel->get(array('type' => 'Blog'));

				$featured_item = $this->Featureditemmodel->get(array('content_type_id' => $content_type[0]->content_type_definition_id));

				//dd($blog_object);
				$data = array();
				$data['main_content'] = $this->load->view('admin/blog/content_blogs', array('blog_posts' => $blog_object, 'featured_item' => $featured_item), true);
				$this->load->view('admin/main/main_home', $data);

			}else{

				redirect('/admin');
			}
		}

		public function blog_manage_categories()
		{
			if(isset($this->session->userdata['logged_in'])){

				$blog_object = $this->Blogcategorymodel->get();

				$new_blog_object = array_map(function($blogs){

					$blogs->blog_category_parent_category_id = $this->Blogcategorymodel->get(array('blog_category_id' => $blogs->blog_category_parent_category_id));

					return $blogs;
				}, $blog_object);

				$data = array();
				$data['main_content'] = $this->load->view('admin/blog/blogs_manage_categories', array('blog_object' => $blog_object), true);
				$this->load->view('admin/main/main_home', $data);

			}else{

				redirect('/admin');
			}
		}

		public function blog_newcat()
		{
			if(isset($this->session->userdata['logged_in'])){

				$blog_object = $this->Blogcategorymodel->get();

				$data = array();
				$data['main_content'] = $this->load->view('admin/blog/blogs_newcat', array('blog_object' => $blog_object), true);
				$this->load->view('admin/main/main_home', $data);

			}else{

				redirect('/admin');
			}
		}

		public function blog_editcat()
		{
			if(isset($this->session->userdata['logged_in'])){

				$id = $this->uri->segment(3);
				$blog_object  = $this->Blogcategorymodel->get();
				$blog_details = $this->Blogcategorymodel->get(array('blog_category_id' => $id));

				$data = array();
				$data['main_content'] = $this->load->view('admin/blog/blogs_editcat', array('blog_object' => $blog_object, 'blog_details' => $blog_details[0]), true);
				$this->load->view('admin/main/main_home', $data);

			}else{

				redirect('/admin');
			}
		}

		public function add_blog_category()
		{
			if(isset($this->session->userdata['logged_in'])){

				$blog_cat_title  	 = $this->input->post('blog_title');

				$blog_cat_descrip	 	= isset($_POST['blog_description']) ? $_POST['blog_description'] : "";
				$blog_cat_custom_url = isset($_POST['blog_custom_url'])  ? str_replace(' ', '-', trim($_POST['blog_custom_url'])) : "";
				$blog_cat_parent 	 = isset($_POST['blog_parent_category']) ? $_POST['blog_parent_category'] : 0;
				$user_id 			 = $this->input->post('user_id');
				$blog_cat_status	 = 1;
				$blog_category_id	 = isset($_POST['blog_category_id']) ? $_POST['blog_category_id'] : "";
				$success = 1;
				$msg = "";

				$data = [
					'user_id'														=>	$user_id,
					'blog_category_parent_category_id'	=>  $blog_cat_parent,
					'blog_category_title'								=>  strtolower($blog_cat_title),
					'blog_category_description'					=>	$blog_cat_descrip,
					'blog_category_status'							=>	$blog_cat_status,
					'blog_category_id'									=>  $blog_category_id
				];

				if($blog_category_id == ""){

					$blog_id = $this->Blogcategorymodel->add($data);

					if(!$blog_id) {

						$success = 0;
						$msg = 'Adding Blog Category Failed';

					} else {
						//alias adding
						addUrlAlias($blog_id, 'blogcategory', strtolower($blog_cat_title), $blog_cat_custom_url);
						$this->session->set_flashdata('success_blogCategory', 'Successfully added a blog category');
					}

				} else {

					$blog_id = $this->Blogcategorymodel->update($data);

					if(!$blog_id) {

						$success = 0;
						$msg = 'No changes made';

					} else {
						//alias adding
						addUrlAlias($blog_category_id, 'blogcategory', strtolower($blog_cat_title), $blog_cat_custom_url);
						$this->session->set_flashdata('success_blogCategory', 'Successfully updated a blog category');
					}
				}

				print json_encode(array('success'=>$success, 'msg' => $msg));


			}else{

				redirect('/admin');
			}
		}

	public function delete_blog_category()
	{
		if(isset($this->session->userdata['logged_in'])){

			$blog_id = $this->Blogcategorymodel->delete($_POST);

			if($blog_id) {
					$blog_category_xref = $this->Blogcategoryxrefmodel->get(array('blog_category_id' => $_POST['blog_category_id']));

						foreach($blog_category_xref as $blog_category){
							 $this->Blogcategoryxrefmodel->update(array('blog_category_xref_id' => $blog_category->blog_category_xref_id, 'blog_category_id' => NULL));
						}
					//$this->Blogcategoryxrefmodel->delete(array('blog_category_id' => $_POST['blog_category_id']));
					$this->Urlaliasmodel->delete(array('id'=> $_POST['blog_category_id'], 'url_alias_type'=>'blogcategory'));

					print json_encode(array('success'=>1));
					$this->session->set_flashdata('success_blogCategory', 'Successfully deleted a blog category');
				} else {

					print json_encode(array('success'=>0, 'msg' => 'Deleting Blog Category Failed'));
				}

		}else{

			redirect('/admin');
		}
	}

	public function blog_newpost()
		{
			if(isset($this->session->userdata['logged_in'])){

				$blogAuthors 	= $this->Blogmodel->getBlogAuthorsList();
				$blogCategories = $this->Blogcategorymodel->get();
				$group_members 	= $this->Groupmodel->get();

				//dd($group_members);

				$data = array();
				$data['main_content'] = $this->load->view('admin/blog/blogs_newpost', array('blogAuthors' => $blogAuthors, 'blogCategories' => $blogCategories, 'group_members' => $group_members), true);
				$this->load->view('admin/main/main_home', $data);

			}else{

				redirect('/admin');
			}
		}

	public function add_post()
	{

		if(isset($this->session->userdata['logged_in'])){

			if(!isset($_FILES['post_image1'])) {

				$_FILES['post_image1']['name'] 		 = isset($_POST['post_image_name1']) ? $this->input->post('post_image_name1') : "";
				$_FILES['post_image1']['tmp_name'] = isset($_POST['post_image_path1']) ? $this->input->post('post_image_path1') : "";
				$_FILES['post_image1']['size'] 		 = isset($_POST['post_image_size1']) ? $this->input->post('post_image_size1') : "";
				$_FILES['post_image1']['is_copy']  = isset($_POST['post_image_iscopy1']) ? $this->input->post('post_image_iscopy1') : "";
			}

			if(!isset($_FILES['post_image2'])) {

				$_FILES['post_image2']['name']		 = isset($_POST['post_image_name2']) ? $this->input->post('post_image_name2') : "";
				$_FILES['post_image2']['tmp_name'] = isset($_POST['post_image_path2']) ? $this->input->post('post_image_path2') : "";
				$_FILES['post_image2']['size'] 		 = isset($_POST['post_image_size2']) ? $this->input->post('post_image_size2') : "";
				$_FILES['post_image2']['is_copy']  = isset($_POST['post_image_iscopy2']) ? $this->input->post('post_image_iscopy2') : "";
			}

			if(!isset($_FILES['post_image3'])) {

					$_FILES['post_image3']['name'] 	   = isset($_POST['post_image_name3']) ? $this->input->post('post_image_name3') : "";
					$_FILES['post_image3']['tmp_name'] = isset($_POST['post_image_path3']) ? $this->input->post('post_image_path3') : "";
					$_FILES['post_image3']['size']		 = isset($_POST['post_image_size3']) ? $this->input->post('post_image_size3') : "";
					$_FILES['post_image3']['is_copy']  = isset($_POST['post_image_iscopy3']) ? $this->input->post('post_image_iscopy3') : "";
			}

			$group_id = $this->session->userdata['logged_in']['group_details']->groups_id;

			$post_title  	    	= str_replace(' ', '-', trim($this->input->post('post_title')));
			$post_status  			= isset($_POST['post_published']) ? 1 : 0;
			$post_keyword 			= isset($_POST['post_keyword']) ? $_POST['post_keyword'] : "";
			$post_meta 	  			= isset($_POST['post_meta']) ? $_POST['post_meta'] : "";
			$post_description   = isset($_POST['post_article']) ? $_POST['post_article'] : "";
			$blog_recipe 				= isset($_POST['blog_is_recipe']) ? $_POST['blog_is_recipe'] : 0;
			$blog_job 					= isset($_POST['blog_is_job']) ? $_POST['blog_is_job'] : 0;
			$blog_custom_url    = isset($_POST['custom_post_url']) ? str_replace(' ', '-', trim($this->input->post('custom_post_url'))) : "";
			$post_published 		= isset($_POST['post_published']) ? date('Y-m-d H:i:s') : "0000-00-00 00:00:00";
			$post_category_id   = $this->input->post('post_blog_category');
			$post_permission    = $this->input->post('post_permission');

			$data = [
				'user_id' 							=> $_POST['post_author'],
				'blog_title'						=> $_POST['post_title'],
				'blog_status'						=> $post_status,
				'blog_tags'							=> $post_keyword,
				'blog_created_on'				=> date('Y-m-d H:i:s'),
				'blog_modified_on'			=> "0000-00-00 00:00:00",
				'blog_published_date'		=> $post_published,
				'blog_meta_description' => $post_meta,
				'blog_preview_text'			=> htmlspecialchars($_POST['post_description']),
				'blog_is_recipe'				=> $blog_recipe,
				'blog_is_job'						=> $blog_job,
				'blog_permission'				=> $post_permission
			];

			$blog_id = $this->Blogmodel->add($data);

			if($blog_id)
			{
					addUrlAlias($blog_id, 'blog', strtolower($post_title), $blog_custom_url);

					$this->Blogcategoryxrefmodel->add(array('blog_id' => $blog_id, 'blog_category_id' => $post_category_id));

					//$path = 'assets/'.getSubDomain();
					$path = 'assets/themes/'.getSubDomain();

					$upload_path = 'assets/themes/'.getSubDomain().'/blog';

					//check if path exists
					if(!file_exists($path)){
						//create path if not exists
						 mkdir($path);
					}

					if(!file_exists($upload_path)){
						//create upload path if not exists
						mkdir($upload_path);
					}

					for($i=1; $i<=3; $i++) {

						$images = array_column($this->Fileuploadmodel->get(), 'file_upload_name');
						$images_obj = [];
						$new_image_name  = $_FILES['post_image'.$i]['name'];
						$image_increment = 0;

						if(!empty($images)) {
								foreach($images as $image) {
									$image_name = pathinfo($image, PATHINFO_FILENAME);
									array_push($images_obj, $image_name);
								}
						}

						//dd($images_obj);
						if($new_image_name != ""){

							$image_filename = pathinfo($new_image_name, PATHINFO_FILENAME);
							$image_file_ext = pathinfo($new_image_name, PATHINFO_EXTENSION);

							while(in_array($image_filename,  $images_obj)){
								$image_filename = pathinfo($new_image_name, PATHINFO_FILENAME).'_'.($image_increment++);
							}

							$new_image_name = $image_filename.'.'.$image_file_ext;
						}


						$post_image = array(
							'user_id'	   		 		 => $this->session->userdata['logged_in']['user_obj']->user_id,
							'file_upload_name'   => $new_image_name,
							'file_upload_path' 	 => $upload_path.'/'.$new_image_name,
							'file_upload_status' => 1,
							'file_upload_size'	 => $_FILES['post_image'.$i]['size']
						);

						$file_upload_id = $this->Fileuploadmodel->add($post_image);

						if(isset($_FILES['post_image'.$i]['is_copy']) && $_FILES['post_image'.$i]['is_copy'] != ""){

							copy($_FILES['post_image'.$i]['tmp_name'], $upload_path.'/'.$new_image_name);

						}else{

							move_uploaded_file($_FILES['post_image'.$i]['tmp_name'], $upload_path.'/'.$new_image_name);

						}


						$blog_image = array(
							'blog_id'			 		=> $blog_id,
							'file_upload_id'  => $file_upload_id,
							'caption' 	   		=> $this->input->post('post_image' . $i . '_caption'),
							'order' 			 		=> $i,
						);

						$this->Blogimagemodel->add($blog_image);

					}

					for($x=1; $x<=5; $x++) {

						$blog_content = array(
							'blog_id'			 					=> $blog_id,
							'content_header'	 			=> isset($_POST['post_header'.$x]) ? $_POST['post_header'.$x]  : "",
							'content_article'    		=> isset($_POST['post_article'.$x]) ? trim($_POST['post_article'.$x])  : "",
							'blockquote' 	 	 				=> isset($_POST['post_blockquote'.$x]) ? $_POST['post_blockquote'.$x]  : "",
							'blockquote_author' 		=> isset($_POST['post_blockquote_author'.$x]) ? $_POST['post_blockquote_author'.$x]  : "",
							'blockquote_publication'=> isset($_POST['post_blockquote_publication'.$x]) ? $_POST['post_blockquote_publication'.$x]  : "",
							'order'									=> $x
						);

						$this->Blogcontentmodel->add($blog_content);
					}

				$this->session->set_flashdata('success_blog', 'Successfully created a blog post');

				print json_encode(array('success'=>1));

			} else {

				print json_encode(array('success'=>1, 'msg' => 'Failed'));
			}

		}else{

			redirect('/admin');
		}
	}

	public function blog_editpost()
		{
			if(isset($this->session->userdata['logged_in'])){


				$blog_id = $this->uri->segment(3);

				$blog_details = $this->Blogmodel->get(array('blog_id' => $blog_id));

				// dd($blog_details);
				$blog_object = array_map(function($blog_detail) {

					$blog_detail->blog_category_id = ($blog_detail->blog_category_id == "") ? '0' : $blog_detail->blog_category_id;

					$blog_detail->blog_body 		= $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
					$blog_detail->blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
					$blog_detail->author				= $this->Usermodel->get(array('id' => $blog_detail->user_id));
					$blog_detail->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));
					//$blog_detail->blog_images 	= $this->Fileuploadmodel->get(array('file_upload_id' => ));

					return $blog_detail;
				}, $blog_details);

				//dd($this->Blogimagemodel->get(array('blog_id' => $blog_id)));

				$blogAuthors 	= $this->Blogmodel->getBlogAuthorsList();
				$blogCategories = $this->Blogcategorymodel->get();
				$group_members 	= $this->Groupmodel->get();

				$data = array();
				$data['main_content'] = $this->load->view('admin/blog/blogs_editpost', array('blogAuthors' => $blogAuthors, 'blogCategories' => $blogCategories, 'group_members' => $group_members, 'blog_object' => $blog_object[0]), true);
				$this->load->view('admin/main/main_home', $data);

			}else{

				redirect('/admin');
			}
		}

		public function delete_blog()
		{
			if(isset($this->session->userdata['logged_in'])){

				// dd($_POST);
				foreach($this->input->post('blog_ids') as $blog_id)
				{
					$blog_status = $this->Blogmodel->delete(array('blog_id' => $blog_id));

					$content_type  = $this->Contenttypedefinitionmodel->get(array('type' => 'Blog'));

					$featured_item = $this->Featureditemmodel->get(array('content_type_id' => $content_type[0]->content_type_definition_id));

					if($blog_status) {
							if(!empty($featured_item)){
									if($featured_item[0]->featured_item_content_id == $blog_id){
										$this->Featureditemmodel->delete(array('featured_item_id' => $featured_item[0]->featured_item_id));
									}
							}
							//remove url alias
							$this->Urlaliasmodel->delete(array('id'=>$blog_id, 'url_alias_type'=>'blog'));
							//delete data in associate
							$blog_category_xref = $this->Blogcategoryxrefmodel->get(array('blog_id' => $blog_id));

							$this->Blogcategoryxrefmodel->delete(array('blog_category_xref_id' => $blog_category_xref[0]->blog_category_xref_id));

							//get blog content
							$blog_contents = $this->Blogcontentmodel->get(array('blog_id' => $blog_id));

							foreach($blog_contents as $blog_content){
								$this->Blogcontentmodel->delete(array('blog_content_id' => $blog_content->blog_content_id));
							}

							//get blog images
							$blog_images = $this->Blogimagemodel->get(array('blog_id' => $blog_id));



							foreach($blog_images as $blog_image){

									$this->Blogimagemodel->delete(array('blog_image_id' => $blog_image->blog_image_id));

									$file_status = $this->Fileuploadmodel->delete(array('file_upload_id' => $blog_image->file_upload_id));

									if($file_status) {

										if($blog_image->file_upload_name != ""){
												unlink($blog_image->file_upload_path);
										}
									}
							}
					}
				}
				$this->session->set_flashdata('success_blog', 'Successfully deleted a blog post(s)');
				print json_encode(array('success'=>1));

			}else{

				redirect('/admin');
			}
		}

		public function edit_post()
	{

		if(isset($this->session->userdata['logged_in'])){

			if(!isset($_FILES['post_image1'])) {

				$_FILES['post_image1']['name'] = "";
				$_FILES['post_image1']['tmp_name'] = "";
				$_FILES['post_image1']['size'] = "";

			}

			if(!isset($_FILES['post_image2'])) {

				$_FILES['post_image2']['name'] = "";
				$_FILES['post_image2']['tmp_name'] = "";
				$_FILES['post_image2']['size'] = "";

			}

			if(!isset($_FILES['post_image3'])) {

					$_FILES['post_image3']['name'] = "";
					$_FILES['post_image3']['tmp_name'] = "";
					$_FILES['post_image3']['size'] = "";

			}

			$post_title  	    	= str_replace(' ', '-', trim($this->input->post('post_title')));
			$post_status  			= isset($_POST['post_published']) ? 1 : 0;
			$post_keyword 			= isset($_POST['post_keyword']) ? $_POST['post_keyword'] : "";
			$post_meta 	  			= isset($_POST['post_meta']) ? $_POST['post_meta'] : "";
			$post_description   = isset($_POST['post_article']) ? $_POST['post_article'] : "";
			$blog_recipe 				= isset($_POST['blog_is_recipe']) ? $_POST['blog_is_recipe'] : 0;
			$blog_job 					= isset($_POST['blog_is_job']) ? $_POST['blog_is_job'] : 0;
			$blog_custom_url    = isset($_POST['custom_post_url']) ? str_replace(' ', '-', trim($this->input->post('custom_post_url'))) : "";
			$post_published 		= isset($_POST['post_published']) ? date('Y-m-d H:i:s') : "0000-00-00 00:00:00";
			$post_category_id   = $this->input->post('post_blog_category');
			$post_modified 			= date('Y-m-d H:i:s');
			$post_permission    = $this->input->post('post_permission');

			if(isset($_POST['post_draft'])){
				$post_status = 0;
			}

			$data = [
				'blog_id'								=> $_POST['blog_id'],
				'user_id' 							=> $_POST['post_author'],
				'blog_title'						=> $_POST['post_title'],
				'blog_status'						=> $post_status,
				'blog_tags'							=> $post_keyword,
				'blog_modified_on'			=> $post_modified,
				'blog_published_date'		=> $post_published,
				'blog_meta_description' => $post_meta,
				'blog_preview_text'			=> htmlspecialchars($_POST['post_description']),
				'blog_is_recipe'				=> $blog_recipe,
				'blog_is_job'						=> $blog_job,
				'blog_permission'				=> $post_permission
			];

			$blog_id = $this->Blogmodel->update($data);

			if($blog_id)
			{
					//update url alias
					addUrlAlias($_POST['blog_id'], 'blog', strtolower($post_title), $blog_custom_url);

					//update blog categoryxref
					$Blogcategoryxref = $this->Blogcategoryxrefmodel->get(array('blog_id' => $_POST['blog_id']));

					$this->Blogcategoryxrefmodel->update(array('blog_category_xref_id' => $Blogcategoryxref[0]->blog_category_xref_id, 'blog_category_id' => $post_category_id));

					$upload_path = 'assets/themes/'.getSubDomain().'/blog';

					for($i=1; $i<=3; $i++) {

						$images = array_column($this->Fileuploadmodel->get(), 'file_upload_name');

						$images_obj = [];

						$new_image_name  = $_FILES['post_image'.$i]['name'];

						$image_increment = 0;

						if(!empty($images)) {
								foreach($images as $image) {
									$image_name = pathinfo($image, PATHINFO_FILENAME);
									array_push($images_obj, $image_name);
								}
						}

						$file_image_update = $this->Blogimagemodel->get(array('blog_id' => $_POST['blog_id'], 'order' => $i));

						$blog_image = array(
							'caption' => $this->input->post('post_image' . $i . '_caption')
						);

						$blog_image['blog_image_id'] = $file_image_update[0]->blog_image_id;
						//update blog image table
						$blogimage_status = $this->Blogimagemodel->update($blog_image);

						//dd($images_obj);
						if($new_image_name != ""){

							$image_filename = pathinfo($new_image_name, PATHINFO_FILENAME);

							$image_file_ext = pathinfo($new_image_name, PATHINFO_EXTENSION);

							while(in_array($image_filename,  $images_obj)){
								$image_filename = pathinfo($new_image_name, PATHINFO_FILENAME).'_'.($image_increment++);
							}

							$new_image_name = $image_filename.'.'.$image_file_ext;

							//data for updating file upload table
							$post_image = array(
								'user_id'	   		 		 => $this->session->userdata['logged_in']['user_obj']->user_id,
								'file_upload_name'   => $new_image_name,
								'file_upload_path' 	 => $upload_path.'/'.$new_image_name,
								'file_upload_status' => 1,
								'file_upload_size'	 => $_FILES['post_image'.$i]['size']
							);

							$post_image['file_upload_id'] = $file_image_update[0]->file_upload_id;
							//update blog image table
							$this->Fileuploadmodel->update($post_image);

							//remove old image
							if($file_image_update[0]->file_upload_name != "") {
									unlink($file_image_update[0]->file_upload_path);
							}
							move_uploaded_file($_FILES['post_image'.$i]['tmp_name'], $upload_path.'/'.$new_image_name);
						}
					}

					for($x=1; $x<=5; $x++) {

						$blog_content = array(
							'content_header'	 			=> isset($_POST['post_header'.$x]) ? $_POST['post_header'.$x]  : "",
							'content_article'    		=> isset($_POST['post_article'.$x]) ? trim($_POST['post_article'.$x])  : "",
							'blockquote' 	 	 				=> isset($_POST['post_blockquote'.$x]) ? $_POST['post_blockquote'.$x]  : "",
							'blockquote_author' 		=> isset($_POST['post_blockquote_author'.$x]) ? $_POST['post_blockquote_author'.$x]  : "",
							'blockquote_publication'=> isset($_POST['post_blockquote_publication'.$x]) ? $_POST['post_blockquote_publication'.$x]  : ""
						);

						$blog_content_details = $this->Blogcontentmodel->get(array('blog_id' => $_POST['blog_id'], 'order' => $x));

						$blog_content['blog_content_id'] = $blog_content_details[0]->blog_content_id;

						$this->Blogcontentmodel->update($blog_content);
					}

				print json_encode(array('success'=>1));
			  $this->session->set_flashdata('success_blog', 'Successfully updated a blog post');
			} else {

				print json_encode(array('success'=>1, 'msg' => 'Failed'));
			}

		}else{

			redirect('/admin');
		}
	}

	public function unpublish_blog()
		{
			if(isset($this->session->userdata['logged_in'])){


				foreach($this->input->post('blog_ids') as $blog_id)
				{

					$post_modified = date('Y-m-d H:i:s');
					$post_status	 = 0;

					$data = [
						'blog_id' 		     => $blog_id,
						'blog_status' 	   => $post_status,
						'blog_modified_on' => $post_modified
					];

					$this->Blogmodel->update($data);

				}
				$this->session->set_flashdata('success_blog', 'Successfully unpublished a blog post(s)');
				print json_encode(array('success'=>1));

			}else{

				redirect('/admin');
			}
		}

		public function publish_post()
		{
			if(isset($this->session->userdata['logged_in'])){

					$blog_id = $this->input->post('blog_id');

					$blog_details = $this->Blogmodel->get(array('blog_id' => $blog_id));

					$published_date = strtotime($blog_details[0]->blog_published_date);
					$post_modified = date('Y-m-d H:i:s');
					$post_published_date = ($blog_details[0]->blog_published_date == "" || $blog_details[0]->blog_published_date == "0000-00-00 00:00:00") ?  $post_modified : $blog_details[0]->blog_published_date;
					$post_status	 = 1;

					$data = [

						'blog_id' 		     		=> $blog_id,
						'blog_status' 	   		=> $post_status,
						'blog_modified_on' 		=> $post_modified,
						'blog_published_date' => $post_published_date

					];

				$this->Blogmodel->update($data);
				$this->session->set_flashdata('success_blog', 'Successfully published a blog post');
				print json_encode(array('success'=>1));

			}else{

				redirect('/admin');
			}
	}

	public function getBlogDetails()
	{
			if(isset($this->session->userdata['logged_in'])){

				$blog_id = $_POST['blog_id'];

				$blog_details = $this->Blogmodel->get(array('blog_id' => $blog_id));

				$blog_object = array_map(function($blog_detail) {

					$blog_detail->blog_category_id = ($blog_detail->blog_category_id == "") ? '0' : $blog_detail->blog_category_id;

					$blog_detail->blog_body 		= $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
					$blog_detail->blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
					$blog_detail->author				= $this->Usermodel->get(array('id' => $blog_detail->user_id));
					$blog_detail->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));
					//$blog_detail->blog_images 	= $this->Fileuploadmodel->get(array('file_upload_id' => ));

					return $blog_detail;
				}, $blog_details);

				$data = [
					'data' 		=> $blog_object,
					'success' => 1
				];

				print json_encode($data);

			}else{

				redirect('/admin');
			}
	}

	public function blogseoreport($blog_id){
		$blog = $this->Blogmodel->get(array('blog_id'=>$blog_id));
		if( isset($blog[0]->blog_id) ){
				$blog = $blog[0];


				$blog_contents = $this->Blogcontentmodel->get(array('blog_id' => $blog_id));

				$blog_body = "";

				foreach($blog_contents as $blog_content){

					$blog_body .= $blog_content->content_header;
					$blog_body .= $blog_content->content_article;
					$blog_body .= $blog_content->blockquote;
					$blog_body .= $blog_content->blockquote_author;
					$blog_body .= $blog_content->blockquote_publication;

				}

				$blogurl = 'blog/';
        if($blog->blog_is_recipe == 1)
          $blogurl = 'recipe/';

        if($blog->blog_is_job == 1)
					$blogurl = 'job/';

				$url = site_url($blogurl.$blog->url_alias_value);
				//$url = 'http://merkergroup.boomity.net/debt-finance-attorney-ny-ny';
				$metadata = get_all_meta_data($url);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
				$content = curl_exec($ch);
				curl_close($ch);


				$data = Array(
						 "type" => 'blog',
						 "url" => $url,
						 "title" => $blog->blog_title,
						 "id" => $blog_id,
						 "metadata" => $metadata,
						 "body" => $blog_body,
						 "whole" => $content
				);

				$seo_body = $this->load->view("admin/blog/modal/seo_body", $data, true);
				print json_encode(array('success'=>1, 'seo_body'=>$seo_body));
		}
	}

	public function shareblogpost($blogid){

				$blog_id = $blogid;

				$blog_details = $this->Blogmodel->get(array('blog_id' => $blog_id));

				$blog_object = array_map(function($blog_detail) {
					$blog_detail->blog_preview_text = htmlspecialchars_decode($blog_detail->blog_preview_text);
					$blog_detail->blog_body 		= $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
					$blog_detail->blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
					$blog_detail->author				= $this->Usermodel->get(array('id' => $blog_detail->user_id));
					$blog_detail->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));

					return $blog_detail;
				}, $blog_details);

				//$share_body = $this->load->view("admin/blog/modal/share_body", array('blog_object' => $blog_object[0]), true);

				print json_encode(array('success'=>1, 'blog_share_body'=>$blog_object[0]));
		}

	public function save_image_froala()
	{
			// Allowed extentions.
			$allowedExts = array("gif", "jpeg", "jpg", "png");

			// Get filename.
			$temp = explode(".", $_FILES["image_param"]["name"]);

			// Get extension.
			$extension = end($temp);

			// An image check is being done in the editor but it is best to
			// check that again on the server side.
			// Do not use $_FILES["file"]["type"] as it can be easily forged.
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $_FILES["image_param"]["tmp_name"]);

			if ((($mime == "image/gif")
			|| ($mime == "image/jpeg")
			|| ($mime == "image/pjpeg")
			|| ($mime == "image/x-png")
			|| ($mime == "image/png"))
			&& in_array($extension, $allowedExts)) {
					// Generate new random name.
					$name = sha1(microtime()) . "." . $extension;

					// Generate response.
					$response = new StdClass;

					$path = 'assets/themes/'.getSubDomain();

					$upload_path = 'assets/themes/'.getSubDomain().'/blog';

				//check if path exists
					if(!file_exists($path)){
					//create path if not exists
						mkdir($path);
					}

					if(!file_exists($upload_path)){
					//create upload path if not exists
					mkdir($upload_path);
					}

					// Save file in the uploads folder.
					move_uploaded_file($_FILES["image_param"]["tmp_name"], getcwd() . "/".$upload_path."/" . $name);

					$response->link = "/".$upload_path."/" .$name;

					echo stripslashes(json_encode($response));
		}
	}

	public function save_image_remove(){

		unlink(substr($_REQUEST['src'], 1));
	}

	public function upload_file()
	{

		$this->load->helper('file');
		$this->load->library('upload');

		$subdomain = getSubDomain();

		$path = ($subdomain) ? 'assets/themes/' . $subdomain . '/assets' : 'assets/themes/generic/assets';

		if (!is_dir( $path )) {
			mkdir($path, 0777, TRUE);
		}

		$config = [
			'upload_path' 		=> $path,
			'allowed_types' 	=> '*',
			'overwrite' 		=> false
		];

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('file') )
		{
			$error = array('error' => $this->upload->display_errors());

			print json_encode([ 'data' => $error ]);
		}
		else
		{
			$upload_data = $this->upload->data();

			$full_path = $path . '/' . $upload_data['file_name'];
			$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;

			$data = [
				'user_id'					=> (isset($logged_in_user) ? $logged_in_user : 0),
				'file_upload_name'			=> $upload_data['file_name'],
				'file_upload_path'			=> $full_path,
				'file_upload_status'		=> 1,
				'file_upload_size'			=> filesize ( $full_path )
			];

			$fileupload_id = $this->Fileuploadmodel->add( $data );

			print json_encode([ 'link' => $full_path ]);
			//print $fileupload_id;
		}
	}

	public function docs_manage_categories()
	{
		if(isset($this->session->userdata['logged_in'])){

			$doc_categoryobj = $this->Documentcategorymodel->get();

			$doc_object = array_map(function($document){

				$document->category_parent = $this->Documentcategorymodel->get(array('document_category_id' => $document->document_category_parent_id));

				return $document;
			},  $doc_categoryobj);

			//dd($doc_object);

			$data = array();
			$data['main_content'] = $this->load->view('admin/document/docs_manage_categories', array('doc_categoryobj' => $doc_categoryobj), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function docs_newcat()
	{
		if(isset($this->session->userdata['logged_in'])){

			$doc_categoryobj = $this->Documentcategorymodel->get();

			$data = array();
			$data['main_content'] = $this->load->view('admin/document/docs_newcat', array('doc_categoryobj' => $doc_categoryobj), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function docs_editcat()
	{
		if(isset($this->session->userdata['logged_in'])){

			$doc_categoryobj  = $this->Documentcategorymodel->get();

			$category_id = $this->uri->segment(3);

			$category_details = $this->Documentcategorymodel->get(array('document_category_id' => $category_id));

			$data = array();
			$data['main_content'] = $this->load->view('admin/document/docs_editcat', array('doc_categoryobj' => $doc_categoryobj, 'category_details' => $category_details[0]), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function docs_createcategory()
	{
			if(isset($this->session->userdata['logged_in'])){

				$parent_category = ($this->input->post('document_category_parent') != "") ? $this->input->post('document_category_parent') : "";
				$doc_title  		 = $this->input->post('document_category_title');
				$doc_desc   		 = $this->input->post('document_category_description');
				$custom_url 		 = ($this->input->post('document_category_customurl') != "") ? $this->input->post('document_category_customurl') : "";

				$data = [
					'user_id'									 			=> $this->input->post('user_id'),
					'document_category_parent_id' 	=> $parent_category,
					'document_category_title'  			=> $doc_title,
					'document_category_description' => $doc_desc,
					'document_category_status'			=> 1
				];

				$id = $this->Documentcategorymodel->add($data);

				if($id){
						$this->session->set_flashdata('success_doc_category', 'Successfully added document category');
						$alias = addUrlAlias($id, 'documentcategory', $doc_title, $custom_url);

						print json_encode( [ 'success' => 1, 'msg' => 'Success']);

				} else {

						print json_encode( [ 'success' => 0, 'msg' => 'Failed']);
				}

			}else{

				redirect('/admin');

			}
	}

	public function docs_editcategory()
	{
			if(isset($this->session->userdata['logged_in'])){

				$parent_category = ($this->input->post('document_category_parent') != "") ? $this->input->post('document_category_parent') : "";
				$doc_title  		 = $this->input->post('document_category_title');
				$doc_desc   		 = $this->input->post('document_category_description');
				$custom_url 		 = ($this->input->post('document_category_customurl') != "") ? $this->input->post('document_category_customurl') : "";
				$category_id		 = $this->input->post('document_category_id');

				$data = [
					'document_category_id'					=> $category_id,
					'user_id'									 			=> $this->input->post('user_id'),
					'document_category_modified_on' => date('Y-m-d H:i:s'),
					'document_category_parent_id' 	=> $parent_category,
					'document_category_title'  			=> $doc_title,
					'document_category_description' => $doc_desc,
					'document_category_status'			=> 1
				];

				$status = $this->Documentcategorymodel->update($data);

				if($status){
						$this->session->set_flashdata('success_doc_category', 'Successfully updated document category');
						$alias = addUrlAlias($category_id, 'documentcategory', $doc_title, $custom_url);

						print json_encode( [ 'success' => 1, 'msg' => 'Success']);

				} else {

					  $alias = addUrlAlias($category_id, 'documentcategory', $doc_title, $custom_url);

						print json_encode( [ 'success' => 0, 'msg' => 'No changes Made']);
				}

			}else{

				redirect('/admin');

			}
	}

	public function unpublish_document_category()
	{
		if(isset($this->session->userdata['logged_in'])){

				$document_category_id  = $this->input->post('document_category_id');

				$data = [
					'document_category_id'					=> $document_category_id,
					'document_category_modified_on' => date('Y-m-d H:i:s'),
					'document_category_status'			=> 0
				];

				$status = $this->Documentcategorymodel->update($data);

				if($status){
				  	$this->session->set_flashdata('success_doc_category', 'Successfully unpublished document category');
						print json_encode( [ 'success' => 1, 'msg' => 'Success']);

				} else {

						print json_encode( [ 'success' => 0, 'msg' => 'No changes Made']);
				}

			}else{

				redirect('/admin');

			}
	}

	public function publish_document_category()
	{
		if(isset($this->session->userdata['logged_in'])){

				$document_category_id  = $this->input->post('document_category_id');

				$data = [
					'document_category_id'					=> $document_category_id,
					'document_category_modified_on' => date('Y-m-d H:i:s'),
					'document_category_status'			=> 1
				];

				$status = $this->Documentcategorymodel->update($data);

				if($status){
					  $this->session->set_flashdata('success_doc_category', 'Successfully published document category');
						print json_encode( [ 'success' => 1, 'msg' => 'Success']);

				} else {

						print json_encode( [ 'success' => 0, 'msg' => 'No changes Made']);
				}

			}else{

				redirect('/admin');

			}
	}

	public function delete_document_category()
	{

		if(isset($this->session->userdata['logged_in'])){

			$document_category_id = $this->input->post('document_category_id');

			$category_list = $this->Documentcategorymodel->get(array('parent_id' => $document_category_id));

			$document_list = $this->Documentmodel->get(array('document_category_id' => $document_category_id));

			foreach($category_list as $category){

				$this->Documentcategorymodel->update(array('document_category_id' => $category->document_category_id, 'document_category_parent_id' => ""));

			}

			foreach($document_list as $document){

				$this->Documentmodel->update(array('document_id' => $document->document_id, 'document_category_id' => ""));

			}

			$status = $this->Documentcategorymodel->delete($_POST);

			if($status){
					//remove url alias
					$this->Urlaliasmodel->delete(array('id'=>$_POST['document_category_id'], 'url_alias_type'=>'documentcategory'));
					$this->session->set_flashdata('success_doc_category', 'Successfully deleted document category');
					print json_encode( [ 'success' => 1, 'msg' => 'Success']);

			} else {

					print json_encode( [ 'success' => 0, 'msg' => 'No changes Made']);
			}

		}else{

			redirect('/admin');

		}
	}

	public function content_document()
	{
		if(isset($this->session->userdata['logged_in'])){

			$document = $this->Documentmodel->get(array('sortBy' => 'document_id', 'sortDirection' => 'desc'));

			$document_obj = array_map(function($doc){
					$doc->author    = $this->Usermodel->get(array('id' => $doc->user_id));
					$doc->category  = $this->Documentcategorymodel->get(array('document_category_id' => $doc->document_category_id));

					return $doc;
			}, $document);

			//  dd($document_obj);

			$data = array();
			$data['main_content'] = $this->load->view('admin/document/content_documents', array('document_obj' => $document_obj), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function document_new()
	{
		if(isset($this->session->userdata['logged_in'])){

			$doc_categoryobj = $this->Documentcategorymodel->get();
			$group_members 	= $this->Groupmodel->get();

			$data = array();
			$data['main_content'] = $this->load->view('admin/document/document_new', array('doc_categoryobj' => $doc_categoryobj, 'group_members' => $group_members), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function document_edit()
	{
		if(isset($this->session->userdata['logged_in'])){

			$document_id = $this->uri->segment(3);

			$document_details = $this->Documentmodel->get(array('document_id' => $document_id));

			$doc_categoryobj = $this->Documentcategorymodel->get();

			$group_members 	= $this->Groupmodel->get();

			//dd($document_details);
			$data = array();
			$data['main_content'] = $this->load->view('admin/document/docs_edit', array('document_details' => $document_details, 'doc_categoryobj' => $doc_categoryobj, 'group_members' => $group_members), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function new_document()
	{
		if(isset($this->session->userdata['logged_in'])){
			$url_title = ($this->input->post('document_name') != "") ? $this->input->post('document_name') : pathinfo($_FILES['myFile']['name'], PATHINFO_FILENAME);
			$init_alias = str_replace(' ', '-', trim($url_title));
			$regex = "![^a-z0-9.\-]+!i";
			$init_alias = preg_replace($regex, '', $init_alias);
			$doc_title = (is_numeric($init_alias)) ? strtolower("document-".$init_alias) : $init_alias ;
		
			$document_title = ($this->input->post('document_name') != "") ? $this->input->post('document_name') : pathinfo($_FILES['myFile']['name'], PATHINFO_FILENAME);

			$document_type = pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION);

			$document_custom_title = str_replace(' ', '-', $doc_title);

			sanitize_filename($document_title);

			$path = 'assets/themes/'.getSubDomain();

			$upload_path = 'assets/themes/'.getSubDomain().'/document';

			//check if path exists
			if(!file_exists($path)){
				//create path if not exists
					mkdir($path, 0777, true);
			}

			if(!file_exists($upload_path)){
				//create upload path if not exists
				mkdir($upload_path, 0777, true);
			}

			$documents = array_column($this->Fileuploadmodel->get(), 'file_upload_name');
			$document_obj = [];
			$new_document_name  = $_FILES['myFile']['name'];
			$document_increment = 0;

			if(!empty($documents)) {
					foreach($documents as $document) {
						$docu_name = pathinfo($document, PATHINFO_FILENAME);
						array_push($document_obj, $docu_name);
					}
			}

			if($new_document_name != ""){

				$document_filename = pathinfo($new_document_name, PATHINFO_FILENAME);
				$document_filename = str_replace(" ", "_", trim($document_filename));
				$document_file_ext = pathinfo($new_document_name, PATHINFO_EXTENSION);

				while(in_array($document_filename,  $document_obj)){
					$document_filename = pathinfo($new_document_name, PATHINFO_FILENAME).'_'.($document_increment++);
				}
				//replace white space


				$new_document_name = $document_filename.'.'.$document_file_ext;
			}

			$post_document = array(
				'user_id'	   		 		 => $this->input->post('user_id'),
				'file_upload_name'   => $new_document_name,
				'file_upload_path' 	 => $upload_path.'/'.$new_document_name,
				'file_upload_status' => 1,
				'file_upload_size'	 => $_FILES['myFile']['size']
			);

			$file_upload_id = $this->Fileuploadmodel->add($post_document);

			move_uploaded_file($_FILES['myFile']['tmp_name'], $upload_path.'/'.$new_document_name);

			$data = [
				'document_category_id' 			 => $this->input->post('document_category'),
				'user_id'							 			 => $this->input->post('user_id'),
				'file_upload_id'			 			 => $file_upload_id,
				'document_type'			   			 => $document_type,
				'document_title'		   			 => $document_title,
				'document_description' 			 => $this->input->post('document_description'),
				'document_preview_thumbnail' => '',
				'document_published'				 => 1,
				'document_downloadable'      => 1,
				'document_published_on'			 => date('Y-m-d H:i:s'),
				'document_created_on'			   => date('Y-m-d H:i:s'),
				'document_meta_description'  => '',
 			];

			$document_id = $this->Documentmodel->add($data);

			 if($document_id ){
					$this->session->set_flashdata('success_doc', 'Successfully uploaded a document');

					addUrlAlias($document_id, 'document', strtolower($document_custom_title), strtolower($document_custom_title));

					print json_encode( [ 'success' => 1 ]);
			 } else {
					print json_encode( [ 'success' => 0 ]);
			 }

		}else{

			redirect('/admin');
		}
	}

	public function publish_document()
	{
		if(isset($this->session->userdata['logged_in'])){

				$document_id  = $this->input->post('document_id');

				$data = [
					'document_id'										=> $document_id,
					'document_modified_on' 				  => date('Y-m-d H:i:s'),
					'document_published'						=> 1
				];

				$status = $this->Documentmodel->update($data);

				if($status){

						$this->session->set_flashdata('success_doc', 'Successfully published a document');

						print json_encode( [ 'success' => 1, 'msg' => 'Success']);

				} else {

						print json_encode( [ 'success' => 0, 'msg' => 'Failed']);
				}

			}else{

				redirect('/admin');

			}
	}

	public function unpublish_document()
	{
		if(isset($this->session->userdata['logged_in'])){


				foreach($this->input->post('doc_ids') as $document_id)
				{
					$post_modified = date('Y-m-d H:i:s');
					$post_status	 = 0;

					$data = [
						'document_id'										=> $document_id,
						'document_modified_on' 				  => date('Y-m-d H:i:s'),
						'document_published'						=> 0
					];

					$status = $this->Documentmodel->update($data);
				}

				$this->session->set_flashdata('success_doc', 'Successfully unpublished a document(s)');
				print json_encode( [ 'success' => 1, 'msg' => 'Success']);

			}else{

				redirect('/admin');

			}
	}

	public function delete_document()
	{
		if(isset($this->session->userdata['logged_in'])){


				foreach($this->input->post('doc_ids') as $document_id)
				{
					$post_modified = date('Y-m-d H:i:s');
					$post_status	 = 0;

					$data = [
						'document_id' => $document_id,
					];

					$document_data = $this->Documentmodel->get(array('document_id' => $document_id));

					$file_data = $this->Fileuploadmodel->get(array('file_upload_id' => $document_data[0]->file_upload_id));
			
					$status = $this->Documentmodel->delete($data);
					
					if($status){
						$this->Urlaliasmodel->delete(array('id'=>$document_id, 'url_alias_type'=>'document'));

						unlink($file_data[0]->file_upload_path);

						$this->Fileuploadmodel->delete(array('file_upload_id' => $file_data[0]->file_upload_id));
					}
				}
				$this->session->set_flashdata('success_doc', 'Successfully deleted a document(s)');
				print json_encode( [ 'success' => 1, 'msg' => 'Success']);

			}else{

				redirect('/admin');

			}
	}

	public function edit_document()
	{
		if(isset($this->session->userdata['logged_in'])){

		  // dd($_POST);
			$document_id = $this->input->post('document_id');

			$document_details  = $this->Documentmodel->get(array('document_id' => $document_id));

			$document_title = $this->input->post('document_name');

			$document_type = (isset($_FILES['myFile'])) ? pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION) : $document_details[0]->document_type;

			$document_custom_download = ($_POST['document_downloadlink'] != "") ? $_POST['document_downloadlink'] : $_POST['document_linkview'];

			$document_linkview = $_POST['document_linkview'];

			$user_id = $this->session->userdata['logged_in']['user_obj']->user_id;

			sanitize_filename($document_title);

			$path = 'assets/themes/'.getSubDomain();

			$upload_path = 'assets/themes/'.getSubDomain().'/document';

			$documents = array_column($this->Fileuploadmodel->get(), 'file_upload_name');
			$document_obj = [];
			$new_document_name  = (isset($_FILES['myFile'])) ? $_FILES['myFile']['name'] : "";
			$document_increment = 0;

			if(!empty($documents)) {
					foreach($documents as $document) {
						$docu_name = pathinfo($document, PATHINFO_FILENAME);
						array_push($document_obj, $docu_name);
					}
			}

			if($new_document_name != ""){

				$document_filename = pathinfo($new_document_name, PATHINFO_FILENAME);
				//replace white space
				$document_filename = str_replace(" ", "_", trim($document_filename));
				$document_file_ext = pathinfo($new_document_name, PATHINFO_EXTENSION);

				while(in_array($document_filename,  $document_obj)){
					$document_filename = pathinfo($new_document_name, PATHINFO_FILENAME).'_'.($document_increment++);
				}


				$new_document_name = $document_filename.'.'.$document_file_ext;

				$file_id = $document_details[0]->file_upload_id;

				$post_document = array(
					'file_upload_id'		 => $file_id,
					'user_id'	   		 		 => $user_id,
					'file_upload_name'   => $new_document_name,
					'file_upload_path' 	 => $upload_path.'/'.$new_document_name,
					'file_upload_status' => 1,
					'file_upload_size'	 => $_FILES['myFile']['size']
				);

				$file_upload_status = $this->Fileuploadmodel->update($post_document);

				if($file_upload_status > 0){

					unlink($document_details[0]->file_upload_path);

					move_uploaded_file($_FILES['myFile']['tmp_name'], $upload_path.'/'.$new_document_name);

				}
			}

			$data = [
				'document_id'								 => $document_id,
				'document_category_id' 			 => $this->input->post('document_category'),
				'user_id'							 			 => $user_id,
				'document_type'			   			 => $document_type,
				'document_title'		   			 => $document_title,
				'document_description' 			 => $this->input->post('document_description'),
				'document_preview_thumbnail' => '',
				'document_published'				 => $this->input->post('document_status'),
				'document_caption'				 	 => $this->input->post('document_caption'),
				'document_modified_on'			 => date('Y-m-d H:i:s'),
				'document_meta_description'  => '',
 			];

			$document_status = $this->Documentmodel->update($data);

			 if($document_status > 0){
					$this->session->set_flashdata('success_doc', 'Successfully updated a document');
					addUrlAlias($document_id, 'document', $document_linkview, $document_custom_download);

					print json_encode( [ 'success' => 1 ]);
			 } else {
					print json_encode( [ 'success' => 0 ]);
			 }

		}else{

			redirect('/admin');
		}
	}

	public function blog_featured()
	{
	  if(isset($this->session->userdata['logged_in'])){


	    $content_type  = $this->Contenttypedefinitionmodel->get(array('type' => 'Blog'));
	    $featured_item = $this->Featureditemmodel->get(array('content_type_id' => $content_type[0]->content_type_definition_id));

	    if(!empty($featured_item)) {
	            //update featured
	            $featured_status = $this->Featureditemmodel->update(array('featured_item_id' => $featured_item[0]->featured_item_id, 'featured_item_content_id' => $this->input->post('blog_id')));

	            if($featured_status){
								$this->session->set_flashdata('success_blog', 'Successfully featured a blog post');
	              print json_encode( [ 'success' => 1, 'msg' => 'Success']);
	            } else {
	              print json_encode( [ 'success' => 0, 'msg' => 'Failed']);
	            }

	      } else {
	            //insert featured
	            $featured_status = $this->Featureditemmodel->add(array('content_type_definition_id' => $content_type[0]->content_type_definition_id, 'featured_item_content_id' => $this->input->post('blog_id'), 'page_id' => $content_type[0]->page_id));
	            if($featured_status){
								$this->session->set_flashdata('success_blog', 'Successfully featured a blog post');
	              print json_encode( [ 'success' => 1, 'msg' => 'Success']);
	            } else {
	              print json_encode( [ 'success' => 0, 'msg' => 'Failed']);
	            }
	      }

	  }else{

			redirect('/admin');

		}
}

	public function email_marketing()
	{
		if(isset($this->session->userdata['logged_in'])){
				$group   = $this->session->userdata['logged_in']['group_details'];
				$groups_id = $group->groups_id;
				$subdomain = $group->groups_domain_name;
				$groups_name = $group->groups_name;

				$emmcontent = accessEmailMarketingMautic($groups_id, $subdomain, $groups_name);

				$data_obj = array(
						'groups_id' => $groups_id,
						'timezone' => 'America/Los_Angeles',
						'subdomain' => $subdomain,
						'username' => 'boomity',
						'password' => 'Sans0me!'
					);

				$data = array();
				$data['main_content'] = $this->load->view('admin/marketing/email', $data_obj, true);
				$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}

	public function web_analytics()
	{
		if(isset($this->session->userdata['logged_in'])){
				$group   = $this->session->userdata['logged_in']['group_details'];
				$groups_id = $group->groups_id;
				$subdomain = $group->groups_domain_name;
				$groups_name = $group->groups_name;

				$wa = $this->Webanalyticsmodel->get();

				if(isset($wa[0]->web_analytics_id))
						$wa = $wa[0];

				$data = array();
				$data['main_content'] = $this->load->view('admin/analytics/webanalytics', array('wa'=>$wa), true);
				$this->load->view('admin/main/main_home', $data);
		}else{
				redirect('/admin');
		}
	}

	public function sendEmail()
	{
		if(isset($this->session->userdata['logged_in'])){

				$message    = $this->input->post("email_message");
				$subject    = $this->input->post("email_subj");
				$recipient  = $this->input->post("email_to");
				$from     	=  $this->input->post("email_from");
				$headers  = "From:" . $from;

				$status   = mail($recipient , $subject, $message, $headers);

				if($status){

					print json_encode( [ 'success' => 1, 'msg' => 'Success']);

				} else {

					print json_encode( [ 'success' => 0, 'msg' => 'Failed']);
				}

		}else{
				redirect('/admin');
		}
	}

	public function preview_unsavepost()
	{
			if(isset($this->session->userdata['logged_in'])){

				if(!isset($_FILES['post_image1'])) {

					$_FILES['post_image1']['name'] 		 = isset($_POST['post_image_name1']) ? $this->input->post('post_image_name1') : "";
					$_FILES['post_image1']['tmp_name'] = isset($_POST['post_image_path1']) ? $this->input->post('post_image_path1') : "";
					$_FILES['post_image1']['size'] 		 = "";

				}

				if(!isset($_FILES['post_image2'])) {

					$_FILES['post_image2']['name']		 = isset($_POST['post_image_name2']) ? $this->input->post('post_image_name2') : "";
					$_FILES['post_image2']['tmp_name'] = isset($_POST['post_image_path2']) ? $this->input->post('post_image_path2') : "";
					$_FILES['post_image2']['size'] 		 = "";

				}

				if(!isset($_FILES['post_image3'])) {

						$_FILES['post_image3']['name'] 	   = isset($_POST['post_image_name3']) ? $this->input->post('post_image_name3') : "";
						$_FILES['post_image3']['tmp_name'] = isset($_POST['post_image_path3']) ? $this->input->post('post_image_path3') : "";
						$_FILES['post_image3']['size']		 = "";

				}

				$image[] = $_FILES;
				$datas[] = $_POST;

				$data_obj = array_map(function($data){
					$data['post_blog_category'] = (isset($data['post_blog_category']) && $data['post_blog_category'] != "") ? $data['post_blog_category'] : '0' ;
					$data['category'] = $this->Blogcategorymodel->get(array('blog_category_id' => $data['post_blog_category']));
					$data['author'] = $this->Usermodel->get(array('id' => $data['post_author']));

					return $data;
				},$datas);

				$preview_blog = $this->load->view('admin/blog/blog_preview', array('data_obj'=>$data_obj[0], 'image' => $image), true);

				$this->session->set_userdata('preview_blog', $preview_blog);

				print json_encode(array('success' => 1));

		}else{
				redirect('/admin');
		}

	}

	public function event_categories()
	{
		if(isset($this->session->userdata['logged_in'])){

			$event_CategoryObj = $this->Eventcategorymodel->get();

			//dd($event_CategoryObj);

			$data = array();
			$data['main_content'] = $this->load->view('admin/manage_events/events_manage_categories', array('event_CategoryObj' => $event_CategoryObj), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function event_new_category()
	{
		if(isset($this->session->userdata['logged_in'])){
				//dd($_POST);

				$opt_param = [
						'name'   => $this->input->post('category_name'),
						'color'  => $this->input->post('category_color')
				];

				$event_category_id = $this->Eventcategorymodel->add($opt_param);

				if($event_category_id) {

						addUrlAlias($event_category_id, 'eventcategory', strtolower(str_replace(' ', '-', trim($this->input->post('category_name')))), '');
						$this->session->set_flashdata('success_event_category', 'Successfully added an event category');
						print json_encode(['success'=>1]);

				} else {

					print json_encode(['success'=>0 ]);
				}

		}else{

				redirect('/admin');
		}
	}

	public function event_edit_category()
	{
		if(isset($this->session->userdata['logged_in'])){

			  $event_category_id = $this->input->post('event_category_id');

				$opt_param = [
						'id'	   => $event_category_id,
						'name'   => $this->input->post('edit_category_name'),
						'color'  => $this->input->post('edit_category_color')
				];


				$event_category_status = $this->Eventcategorymodel->update($opt_param);

				if($event_category_status) {

						addUrlAlias($event_category_id, 'eventcategory', strtolower(str_replace(' ', '-', trim($this->input->post('edit_category_name')))), '');
						$this->session->set_flashdata('success_event_category', 'Successfully updated an event category');
						print json_encode(['success'=>1]);

				} else {

					print json_encode(['success'=>0, 'msg' => 'No changes made' ]);
				}

		}else{

				redirect('/admin');
		}
	}

	public function event_delete_category()
	{
		if(isset($this->session->userdata['logged_in'])){

			  $event_category_id = $this->input->post('event_category_id');

				$event_category_status = $this->Eventcategorymodel->delete(array('id' => $event_category_id));

				if($event_category_status) {

					  $this->Urlaliasmodel->delete(array('id'=> $event_category_id, 'url_alias_type'=>'eventcategory'));
						$this->session->set_flashdata('success_event_category', 'Successfully deleted an event category');
						print json_encode(['success'=>1]);

				} else {

					print json_encode(['success'=>0 ]);
				}

		}else{

				redirect('/admin');
		}
	}

	public function event_delete()
	{
			if(isset($this->session->userdata['logged_in'])){

				$event_id = $this->input->post('event_id');

				$event_status = $this->Eventsmodel->delete(array('event_id' => $event_id));

				if($event_status) {

						$this->session->set_flashdata('success_event', 'Successfully deleted an event');

						print json_encode(['success'=>1]);

					} else {

						print json_encode(['success'=>0 ]);
					}

			}else{

					redirect('/admin');
			}
	}

	public function preview_blog()
	{
			if(isset($this->session->userdata['logged_in'])){

					echo $this->session->userdata('preview_blog');

				}else{

					redirect('/admin');
			}
	}

	public function remove_blog_image()
	{
			if(isset($this->session->userdata['logged_in'])){

			$file_upload_id = $this->input->post('file_upload_id');

			$file_upload = $this->Fileuploadmodel->get(array('file_upload_id' => $file_upload_id));

			//remove image
			if(file_exists($file_upload[0]->file_upload_path)){
				unlink($file_upload[0]->file_upload_path);
			}

			$data = [
					'file_upload_id'   => $file_upload_id,
					'file_upload_name' => '',
					'file_upload_path' => ''
			];

			$file_upload_status = $this->Fileuploadmodel->update($data);

				if($file_upload_status){

					print json_encode(['success'=>1]);

				} else {

					print json_encode(['success'=>0 ]);
				}

			}else{
				redirect('/admin');
			}
	}

	public function remove_slider_image()
	{
		if(isset($this->session->userdata['logged_in'])){

			$file_upload_id = (isset($_POST['file_upload_id'])) ? $this->input->post('file_upload_id') : "";
		
			$file_details = $this->Fileuploadmodel->get(array('file_upload_id' => $file_upload_id));
			
				if(!empty($file_details)) {
					$file_status = $this->Fileuploadmodel->delete(array('file_upload_id' => $file_upload_id));
				
					if( $file_status ) {
						if( file_exists($file_details[0]->file_upload_path) ) {
								//remove file
								unlink($file_details[0]->file_upload_path);
						}
					}
				}
			
			}else{
				redirect('/admin');
			}
	}

	public function document_downloadable()
	{
		if(isset($this->session->userdata['logged_in'])) {

			$data = [
				'document_downloadable' 	=> $_POST['downloadable'],
				'document_id' 					  => $_POST['document_id']
			];

			if( $this->Documentmodel->update( $data ) ) {

				print json_encode([ 'success' => 1, 'message' => 'update success']);

			}else{
				print json_encode( [ 'success' => 0, 'message' => 'Error!' ]);
			}
		}
	}

	public function content_discussion()
	{
		if(isset($this->session->userdata['logged_in'])){

			$filter = "filter";

			if(isset($_POST['filter'])){
				$filter = $_POST['filter'];
			} 

			$group_members 	= $this->Groupmodel->get();
			$discussion_topic = $this->Discussioncategorytopicmodel->get(array('sortBy' => 'discussion_categories_topic.discussion_categories_topic_id', 'sortDirection' => 'desc', $filter => 1));

			$discussion_topic_obj = array_map(function($discussion){
				
					$discussion->discussion_category = $this->Discussioncategorymodel->get(array('id' => $discussion->discussion_categories_id)); 

					return $discussion;
			}, $discussion_topic);

			$data = array();
			$data['main_content'] = $this->load->view('admin/discussion/content_discussion', array('discussion_obj' => $discussion_topic_obj, 'group_members' => $group_members), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function discussion_manage_categories()
	{
		if(isset($this->session->userdata['logged_in'])){

			$filter = "filter";

			if(isset($_POST['filter'])){
				$filter = $_POST['filter'];
			} 

			$discussions = $this->Discussioncategorymodel->get(array('sortBy' => 'discussion_categories_id', 'sortDirection' => 'desc', $filter => 1));
			
			$group_members 	= $this->Groupmodel->get();

			$discussion_obj = array_map(function($discussion){
					$discussion->permission = $this->Groupmodel->get(array('groups_id' => $discussion->discussion_categories_permission));
					return $discussion;
			}, $discussions);
			//dd($discussion_obj);
			$data = array();
			$data['main_content'] = $this->load->view('admin/discussion/discussion_manage_categories', array('discussion_category_obj' => $discussion_obj, 'group_members' => $group_members), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function discussion_newcat()
	{
		if(isset($this->session->userdata['logged_in'])){
		
			$discussion_category_id = $this->uri->segment('3');

			$discussion_categories  = $this->Discussioncategorymodel->get();
			$group_members 	= $this->Groupmodel->get();
			$discussion_category 	= $this->Discussioncategorymodel->get(array('id' => $discussion_category_id));
			// dd($discussion_category);
			$data = array();
			$data['main_content'] = $this->load->view('admin/discussion/discussion_newcat', array('discussion_categories' => $discussion_categories, 'group_members' => $group_members, 'discussion_category' => $discussion_category), true);
			$this->load->view('admin/main/main_home', $data);

		}else{

			redirect('/admin');
		}
	}

	public function save_discussion_category()
	{
		if(isset($this->session->userdata['logged_in'])){
				
				$user_id 	= $this->session->userdata['logged_in']['user_obj']->user_id;
				$category_title = $this->input->post('discussion_category_title');
				$discussion_category_id = "";

				$data = [
					'discussion_categories_title' 			=> $category_title,
					'user_id'														=> $user_id,
					'discussion_categories_description' => $this->input->post('discussion_category_description'),
					'discussion_categories_created_on'  => date('Y-m-d H:i:s'),
					'discussion_categories_parent_categories_id' => $this->input->post('discussion_category_parent'),
					'discussion_categories_permission'	=> $this->input->post('discussion_category_permission')
				];

				if($this->input->post('discussion_categories_id') == 0){
						$discussion_id = $this->Discussioncategorymodel->add($data);
						$discussion_category_id = $discussion_id;
						
				} else {
						$data['discussion_categories_id'] = $this->input->post('discussion_categories_id');
						$discussion_id = $this->Discussioncategorymodel->update($data);
						$discussion_category_id = $this->input->post('discussion_categories_id');
				}

				if($discussion_id){
						addUrlAlias($discussion_category_id, 'discussioncategory', $category_title, '');
						print json_encode([ 'success' => 1, 'message' => 'Discussion Category Saved!']);
				} else {
						print json_encode([ 'success' => 0, 'message' => 'Failed!']);
				}

		}else{

			redirect('/admin');
		}
	}

	public function delete_discussion_category()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = [
				'discussion_categories_id' => $this->input->post('discussion_id'),
				'discussion_categories_modified_on' => date('Y-m-d H:i:s'),
				'discussion_categories_deleted' => 1
			];

			$discussion_status = $this->Discussioncategorymodel->update($data);

			if($discussion_status){
				print json_encode([ 'success' => 1, 'message' => 'Discussion Category Deleted!']);
			} else {
				print json_encode([ 'success' => 0, 'message' => 'Failed!']);
			}

		}else{

			redirect('/admin');
		}
	}

	public function flagged_discussion_category()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = [
				'discussion_categories_id' => $this->input->post('discussion_id'),
				'discussion_categories_modified_on' => date('Y-m-d H:i:s'),
				'discussion_categories_flagged' => 1
			];

			$discussion_status = $this->Discussioncategorymodel->update($data);

			if($discussion_status){
				print json_encode([ 'success' => 1, 'message' => 'Discussion Category Flagged!']);
			} else {
				print json_encode([ 'success' => 0, 'message' => 'Failed!']);
			}

		}else{

			redirect('/admin');
		}
	}

	public function update_discussion_permission()
	{
		if(isset($this->session->userdata['logged_in'])){
			
			$data = [
				'discussion_categories_permission' => $this->input->post('permission_id'),
				'discussion_categories_modified_on' => date('Y-m-d H:i:s')
			];

			foreach($_POST['discussion_ids'] as $discussion_id) {
					$data['discussion_categories_id'] = $discussion_id;
					$discussion_status = $this->Discussioncategorymodel->update($data);
			}

			print json_encode([ 'success' => 1, 'message' => 'Discussion Category Updated!']);
		
		}else{

			redirect('/admin');
		}
	}

	public function flagged_discussion_topic()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = [
				'discussion_categories_topic_id' => $this->input->post('discussion_topic_id'),
				'discussion_categories_topic_modified_on' => date('Y-m-d H:i:s'),
				'discussion_categories_topic_flagged' => 1
			];

			$discussion_topic_status = $this->Discussioncategorytopicmodel->update($data);

			if($discussion_topic_status){
				print json_encode([ 'success' => 1, 'message' => 'Discussion Topic Flagged!']);
			} else {
				print json_encode([ 'success' => 0, 'message' => 'Failed!']);
			}

		}else{

			redirect('/admin');
		}
	}

	public function delete_discussion_topic()
	{
		if(isset($this->session->userdata['logged_in'])){

			$data = [
				'discussion_categories_topic_id' => $this->input->post('discussion_topic_id'),
				'discussion_categories_topic_modified_on' => date('Y-m-d H:i:s'),
				'discussion_categories_topic_deleted' => 1
			];

			$discussion_status = $this->Discussioncategorytopicmodel->update($data);

			if($discussion_status){
				print json_encode([ 'success' => 1, 'message' => 'Discussion Topic Deleted!']);
			} else {
				print json_encode([ 'success' => 0, 'message' => 'Failed!']);
			}

		}else{

			redirect('/admin');
		}
	}

	public function update_discussion_topic_permission()
	{
		if(isset($this->session->userdata['logged_in'])){
			
			$data = [
				'discussion_categories_topic_permission' => $this->input->post('permission_id'),
				'discussion_categories_topic_modified_on' => date('Y-m-d H:i:s')
			];

			foreach($_POST['discussion_topic_ids'] as $discussion_id) {
					$data['discussion_categories_topic_id'] = $discussion_id;
					$discussion_status = $this->Discussioncategorytopicmodel->update($data);
			}

			print json_encode([ 'success' => 1, 'message' => 'Discussion Category Updated!']);
		
		}else{

			redirect('/admin');
		}
	}
}
