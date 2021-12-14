<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public $assets_dir = '';

	public function __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Pagemodel');
		$this->load->model('Eventsmodel');
		$this->load->model('Navigationmodel');
		$this->load->model('Usermodel');
		$this->load->model('Userrolemodel');
		$this->load->model('boomity/BoomityGroupmodel');

		$this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
	}

	public function index()
	{

	}

	public function register(){
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
					$user_id = 0;
					$params = $_POST;

					if(isset($params['user_password']) && trim($params['user_password']) != '')
							$params['user_password'] = md5($params['user_password']);

					if(isset($params['user_password']) && trim($params['user_password']) == '')
							unset($params['user_password']);

					if(isset($params['id']) && is_numeric($params['id']) && $params['id'] > 0){
							$params['user_id'] = $params['id'];
							unset($params['id']);
							$affected = $this->Usermodel->update($params);
							$user_id = $params['user_id'];
					}
					else{
							$user_id = $this->Usermodel->add($params);
							$user_role_id = $this->Userrolemodel->add(array('user_id'=>$user_id, 'role_id'=>2));
					}

					print json_encode(array('status'=>1, 'user_id'=>$user_id));
			}else{
					if(isset($this->session->userdata['logged_in'])){
							redirect('/');
					}else{
							$pageobj = new stdClass();
							$pageobj->page_title = 'Member Registration';
							$pageobj->page_keywords = '';
							$pageobj->page_meta_description = '';

							$content = $this->load->view('client/templates/default/registration', array(), true);
							$this->load->view(getTemplate('main'), array('content'=>$content, 'assets_dir'=>$this->assets_dir, 'page_obj'=>$pageobj));
					}
			}
	}

	public function isDomainExisting()
	{
		$subDomain = getSubDomain();

		$group_detail = $this->BoomityGroupmodel->get(array('groups_domain_name' => $subDomain));
		return $group_detail[0];
	}

	public function login(){
			if(isset($this->session->userdata['logged_in'])){
					redirect('/');
			}else{
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$data = array(
								'email' => $this->input->post('user_email'),
								'password' => $this->input->post('user_password')
							);

							$result = $this->Usermodel->login($data);

							if ($result !== FALSE) {
								$session_data = array(
									'user_obj' 	    => $result[0],
									'group_details' => $this->isDomainExisting()
								);
								// Add user data in session
								$this->session->set_userdata('logged_in', $session_data);

								redirect('/');
							} else {
								$data = array(
									'errmess' => 'Invalid Email or Password'
								);

								redirect('/login?invalid=1&email='.$this->input->post('user_email'));
							}
					}else{
							$pageobj = new stdClass();
							$pageobj->page_title = 'Member Login';
							$pageobj->page_keywords = '';
							$pageobj->page_meta_description = '';

							$invalid = false;
							if(isset($_GET['invalid']) && $_GET['invalid'] == 1)
									$invalid = true;

							$content = $this->load->view('client/templates/default/login', array('invalid'=>$invalid), true);
							$this->load->view(getTemplate('main'), array('content'=>$content, 'assets_dir'=>$this->assets_dir, 'page_obj'=>$pageobj));
					}
			}
	}

	public function checkUserExist(){
			$exist = 0;
			$check = 0;

			if(isset($_POST['user_email'])){
					$userobj = $this->Usermodel->get(array('emailaddress'=>$_POST['user_email']));

					foreach ($userobj as $key => $value) {
							if(isset($_POST['id']) && $value->user_id == $_POST['id'])
									continue;
							else{
									$exist = 1;
									$check = 'email address';
									die(json_encode(array('exist'=>$exist, 'check'=>$check)));
							}
					}
			}

			if(isset($_POST['user_name'])){
					$userobj = $this->Usermodel->get(array('user_name'=>$_POST['user_name']));

					foreach ($userobj as $key => $value) {
							if(isset($_POST['id']) && $value->user_id == $_POST['id'])
									continue;
							else{
									$exist = 1;
									$check = 'user name';
									die(json_encode(array('exist'=>$exist, 'check'=>$check)));
							}
					}
			}

			print json_encode(array('exist'=>$exist, 'check'=>$check));
	}

	public function logout() {

		// Removing session data
		$sess_array = array(
			'user_obj' => ''
		);

		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('/');
	}

	public function edit_profile(){
			if(!isset($this->session->userdata['logged_in'])){
					redirect('/');
			}else{
					$logged_in_user = $this->session->userdata['logged_in']['user_obj']->user_id;

					if($_SERVER['REQUEST_METHOD'] == 'POST') {

					}else{
							$pageobj = new stdClass();
							$pageobj->page_title = 'Edit Profile';
							$pageobj->page_keywords = '';
							$pageobj->page_meta_description = '';

							$user_obj = $this->Usermodel->get(array('id'=>$logged_in_user));

							$content = '';
							if(isset($user_obj[0]->user_id)){
									$content = $this->load->view('client/templates/default/registration', array('user_obj'=>$user_obj[0]), true);
							}

							$this->load->view(getTemplate('main'), array('content'=>$content, 'assets_dir'=>$this->assets_dir, 'page_obj'=>$pageobj));
					}
			}
	}

	public function profile($user_id){
			if(!isset($this->session->userdata['logged_in'])){
					redirect('/');
			}else{
					$pageobj = new stdClass();
					$pageobj->page_title = 'Member Profile';
					$pageobj->page_keywords = '';
					$pageobj->page_meta_description = '';

					$user_obj = $this->Usermodel->get(array('id'=>$user_id));

					$content = '';
					if(isset($user_obj[0]->user_id)){
							$content = $this->load->view('client/templates/default/member_profile', array('user_obj'=>$user_obj[0]), true);
					}

					$this->load->view(getTemplate('main'), array('content'=>$content, 'assets_dir'=>$this->assets_dir, 'page_obj'=>$pageobj));
			}
	}

	public function messages(){
			if(!isset($this->session->userdata['logged_in'])){
					redirect('/');
			}else{
					$pageobj = new stdClass();
					$pageobj->page_title = 'Messages';
					$pageobj->page_keywords = '';
					$pageobj->page_meta_description = '';

					$user_obj = $this->Usermodel->get(array());

					$content = '';
					if(isset($user_obj[0]->user_id)){
							$content = $this->load->view('client/templates/default/member_messages', array('user_obj'=>$user_obj), true);
					}

					$this->load->view(getTemplate('main'), array('content'=>$content, 'assets_dir'=>$this->assets_dir, 'page_obj'=>$pageobj));
			}
	}
}
