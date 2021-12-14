<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion extends CI_Controller {

	public $assets_dir = '';

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper('admin_helper');

		// Load session library
		$this->load->library('session');
		$this->load->library('pagination');

		// load model
		$this->load->model('Usermodel');
		$this->load->model('Pagemodel');
		$this->load->model('Urlaliasmodel');
		$this->load->model('Fileuploadmodel');
		$this->load->model('Discussioncategorymodel');
		$this->load->model('Discussioncategorytopicmodel');
		$this->load->model('Topiccommentmodel');
		$this->load->model('Topicbookmarkmodel');


		$this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
	}

	public function index()
	{
        $content = "";
        
		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Discussion List page';
		$pageobj->page_title = 'Discussions';
        $pageobj->page_keywords = '';
		
		$discussion_topic = $this->Discussioncategorytopicmodel->get(array('limit' => 3, 'sortBy' => 'discussion_categories_topic.discussion_categories_topic_id', 'sortDirection' => 'desc'));

		$discussions = $this->Discussioncategorymodel->get();
		
		$discussion_category_obj = array_map(function($discussion){
			$discussion->topic = $this->Discussioncategorytopicmodel->get(array('category_id' => $discussion->discussion_categories_id, 'limit' => 3, 'sortBy' => 'discussion_categories_topic.discussion_categories_topic_id', 'sortDirection' => 'desc'));
			
			return $discussion;
		},$discussions);
		
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('Discussion'), array('discussions' => $discussion_category_obj, 'discussion_topic' => $discussion_topic), true),
			'page_obj'=>$pageobj
		));
	}

	public function category($alias)
	{
		$content = "";

		$opt_arr = array();
		$opt_arr['url_alias_type'] = 'discussioncategory';
		$opt_arr['url_alias_value'] = $alias;

		$url_alias = $this->Urlaliasmodel->get($opt_arr);

		$category_id = $url_alias[0]->id;
		
		$discussion_category = $this->Discussioncategorymodel->get(array('id' => $category_id));

		$discussions = $this->Discussioncategorymodel->get();

		//pagination
		$page_count = count($this->Discussioncategorytopicmodel->get(array('category_id' => $discussion_category[0]->discussion_categories_id)));

		$pagination = $this->pagination($page_count, 4, 'discussion/categories/'.$alias);

		$this->pagination->initialize($pagination);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//eof pagination

		$discussion_category_obj = array_map(function($discussion) use ($page, $pagination){
			
			$discussion->topic = $this->Discussioncategorytopicmodel->get(array('category_id' => $discussion->discussion_categories_id, 'offset' => $page,  'limit' => $pagination['per_page'], 'sortBy' => 'discussion_categories_topic.discussion_categories_topic_id', 'sortDirection' => 'desc'));
			return $discussion;
		},$discussion_category);
	
		$pageobj = new stdClass();
		$pageobj->page_meta_description = $discussion_category[0]->discussion_categories_description;
		$pageobj->page_title = $discussion_category[0]->discussion_categories_title;
        $pageobj->page_keywords = '';
        
        $discussions = $this->Discussioncategorymodel->get();

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('discussion_category'), array('discussion_category' => $discussion_category_obj[0], 'discussions' => $discussions, 'pagination' => $this->pagination->create_links()), true),
			'page_obj'=>$pageobj
		));
	}

	public function new_discussion($alias)
	{
		$content = "";
		
		$opt_arr = array();
		$opt_arr['url_alias_type'] = 'discussioncategory';
		$opt_arr['url_alias_value'] = $alias;


		$url_alias = $this->Urlaliasmodel->get($opt_arr);

		$category_id = $url_alias[0]->id;

		$discussion_category = $this->Discussioncategorymodel->get(array('id' => $category_id));

		$pageobj = new stdClass();
		$pageobj->page_meta_description = $discussion_category[0]->discussion_categories_description;
		$pageobj->page_title = $discussion_category[0]->discussion_categories_title;
        $pageobj->page_keywords = '';
        
        $discussions = $this->Discussioncategorymodel->get();
		
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('discussion_new'), array('discussion_category' => $discussion_category[0]), true),
			'page_obj'=>$pageobj
		));
	}

	public function save_topic()
	{
		$user_id = isset($_SESSION['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_id : 0;

		$data = [
			'user_id' => $user_id,
			'discussion_categories_id' => $this->input->post('discussion_category_id'),
			'discussion_categories_topic_title' => $this->input->post('discussion_topic_title'),
			'discussion_categories_topic_description' => $this->input->post('discussion_topic_description'),
			'discussion_categories_topic_notify_group' => (isset($_POST['discussion_categories_topic_notify_group']) ? 1 : 0),
			'discussion_categories_topic_created_on' => date('Y-m-d H:i:s')
		];

		$discussion_topic_id =  $this->Discussioncategorytopicmodel->add($data);

			if($discussion_topic_id) {
				addUrlAlias($discussion_topic_id, 'discussioncategorytopic', $this->input->post('discussion_topic_title'), '');
				print json_encode(array('success'=>1));
			}	
			else 
				print json_encode(array('success'=>0));
		
	}

	public function topic($alias)
	{
		$content = "";
		
		$opt_arr = array();
		$opt_arr['url_alias_type'] = 'discussioncategorytopic';
		$opt_arr['url_alias_value'] = $alias;


		$url_alias = $this->Urlaliasmodel->get($opt_arr);

		$topic_id = $url_alias[0]->id;

		$discussions = $this->Discussioncategorymodel->get();

		$discussion_topic = $this->Discussioncategorytopicmodel->get(array('id' => $topic_id));

		$discussion_topic_obj = array_map(function($topic){
			$topic->category = $this->Discussioncategorymodel->get(array('id' => $topic->discussion_categories_id));
			return $topic;
		}, $discussion_topic);

		$topic_comment = $this->Topiccommentmodel->get(array('discussion_id' => $discussion_topic[0]->discussion_categories_topic_id));

		$pageobj = new stdClass();
		$pageobj->page_meta_description = $discussion_topic[0]->discussion_categories_topic_description;
		$pageobj->page_title = $discussion_topic[0]->discussion_categories_topic_title;
        $pageobj->page_keywords = '';
        
        $discussions = $this->Discussioncategorymodel->get();
		
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('discussion_topic'), array('discussion_topic' => $discussion_topic_obj[0], 'discussions' => $discussions, 'topic_comment' => $topic_comment), true),
			'page_obj'=>$pageobj
		));
	}

	public function reply($alias, $parent_id = 0)
	{
		$content = "";
		
		$opt_arr = array();
		$opt_arr['url_alias_type'] = 'discussioncategorytopic';
		$opt_arr['url_alias_value'] = $alias;


		$url_alias = $this->Urlaliasmodel->get($opt_arr);

		$topic_id = $url_alias[0]->id;

		$discussions = $this->Discussioncategorymodel->get();

		$discussion_topic = $this->Discussioncategorytopicmodel->get(array('id' => $topic_id));

		$discussion_topic_obj = array_map(function($topic){
			$topic->category = $this->Discussioncategorymodel->get(array('id' => $topic->discussion_categories_id));
			return $topic;
		}, $discussion_topic);

		$topic_comment = $this->Topiccommentmodel->get(array('discussion_id' => $discussion_topic[0]->discussion_categories_topic_id));

		$pageobj = new stdClass();
		$pageobj->page_meta_description = $discussion_topic[0]->discussion_categories_topic_description;
		$pageobj->page_title = $discussion_topic[0]->discussion_categories_topic_title;
        $pageobj->page_keywords = '';
        
        $discussions = $this->Discussioncategorymodel->get();
		
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('discussion_topic_reply'), array('discussion_topic' => $discussion_topic_obj[0], 'discussions' => $discussions, 'parent_id' => $parent_id, 'topic_comment' => $topic_comment), true),
			'page_obj'=>$pageobj
		));
	}

	public function save_reply()
	{
		//user details
		$user_id    = isset($_SESSION['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_id : 0;
		$user_name  = isset($_SESSION['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_firstname : "";
		$user_email = isset($_SESSION['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_email : "";
		
		//topic details
		$topic_subject = $this->input->post('topic_subject');
		$topic_id = $this->input->post('topic_id');
		
		//comment details
		$comment_parent_id =  $this->input->post('topic_parent_id');
		$comment =  $this->input->post('topic_coment_coment');

		$data = [
			'discussion_categories_topic_id' => $this->input->post('topic_id'),
			'user_id' => $user_id,
			'topic_comment_parent_id' => $comment_parent_id,
			'topic_comment_subject' => $topic_subject,
			'topic_comment_comment' => $comment,
			'topic_comment_name' => $user_name,
			'topic_comment_email' => $user_email,
			'topic_comment_created_on' => date('Y-m-d H:i:s')
		];

		$topic_comment =  $this->Topiccommentmodel->add($data);

		if($topic_comment) {
			print json_encode(array('success'=>1));
		}	
		else 
			print json_encode(array('success'=>0));
		
	}

	public function search()
	{
		$content = "";
		$search_option = isset($_GET['search_option']) ? $_GET['search_option'] : "";
		$search_value = isset($_GET['search_val']) ?  $_GET['search_val'] : "";
	
		$filter_key = "search_topic";

		//filter key
		if($search_option == "All Discussions")
			$filter_key = "search_topic";
		elseif($search_option == "This Category")
			$filter_key = "search_category";
		elseif($search_option == "Users")
			$filter_key = "search_user";

		//pagination
		$page_count = count($this->Discussioncategorytopicmodel->get(array($filter_key => $search_value)));

		$pagination = $this->pagination($page_count, 3, 'discussion/search');

		$this->pagination->initialize($pagination);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		//eof pagination

		$discussion_topic = $this->Discussioncategorytopicmodel->get(array($filter_key => $search_value, 'offset' => $page,  'limit' => $pagination['per_page'], 'sortBy' => 'discussion_categories_topic.discussion_categories_topic_id', 'sortDirection' => 'desc'));

		$discussion_topic_obj = array_map(function($topic){
			$topic->category = $this->Discussioncategorymodel->get(array('id' => $topic->discussion_categories_id));
			return $topic;
		}, $discussion_topic);

		//dd($discussion_topic_obj);
		$pageobj = new stdClass();
		$pageobj->page_meta_description = "Discussion Search";
		$pageobj->page_title = $search_value;
        $pageobj->page_keywords = '';
        
        $discussions = $this->Discussioncategorymodel->get();
		
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('discussion_search_results'), array('discussion_topic' => $discussion_topic_obj, 'discussions' => $discussions, 'pagination' => $this->pagination->create_links()), true),
			'page_obj'=>$pageobj
		));
	}

	public function save_bookmark()
	{
		if(!isset($this->session->userdata['logged_in'])){
			print json_encode(array('success' => 0, 'message' => 'You must login!'));
		} else {

			$user_id = isset($_SESSION['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_id : 0;
			$topic_id = $this->input->post('topic_id');
			
			$data = [
				'discussion_categories_topic_id' => $topic_id,
				'user_id' => $user_id,
				'topic_bookmark_created_on' => date('Y-m-d H:i:s')

			];

			$topic_bookmark = $this->Topicbookmarkmodel->get(array('topic_id' => $topic_id, 'user_id' => $user_id));
			
			if(count($topic_bookmark) < 1) {
				$bookmark_status = $this->Topicbookmarkmodel->add($data);
				print json_encode(array('success' => 1, 'message' => 'Successfully bookmarked!'));
			} else {
				print json_encode(array('success' => 0, 'message' => 'Topic is already mark as bookmarked!'));

			}
		}
	}

	public function discussion_bookmarked()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('/');
		} else {

			$user_id = $this->session->userdata['logged_in']['user_obj']->user_id;

			//pagination
			$page_count = count($this->Topicbookmarkmodel->get(array('user_id' => $user_id)));

			$pagination = $this->pagination($page_count, 3, 'discussion/discussion_bookmarked');

			$this->pagination->initialize($pagination);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			//eof pagination

			$topic_bookmark = $this->Topicbookmarkmodel->get(array('user_id' => $user_id, 'offset' => $page,  'limit' => $pagination['per_page'],'sortBy' => 'topic_bookmark.topic_bookmark_id', 'sortDirection' => 'desc'));

			$topic_bookmark_obj = array_map(function($bookmark){
				$bookmark->discussion_topic = $this->Discussioncategorytopicmodel->get(array('id' => $bookmark->discussion_categories_topic_id));

				return $bookmark;
			},$topic_bookmark);

			//dd($topic_bookmark);
			$pageobj = new stdClass();
			$pageobj->page_meta_description = "Discussion";
			$pageobj->page_title = 'Bookmarked Discussion';
			$pageobj->page_keywords = '';
			
			$discussions = $this->Discussioncategorymodel->get();
			
			$this->load->view(getTemplate('main'), array(
				'assets_dir'=>$this->assets_dir,
				'content' => $this->load->view(getTemplate('discussion_bookmarked'), array('topic_bookmark_obj' => $topic_bookmark_obj, 'discussions' => $discussions, 'pagination' => $this->pagination->create_links()), true),
				'page_obj'=>$pageobj
			));
			
		}
	}

	public function remove_bookmark()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('/');
		} else {

			if($this->input->post('is_deleted')){
				$bookmark_status = $this->Topicbookmarkmodel->delete(array('topic_bookmark_id' => $this->input->post('topic_bookmark_id')));
				
				if($bookmark_status)
					print json_encode(array('success' => 1, 'message' => 'Successfully removed from bookmark'));
				else
					print json_encode(array('success' => 0, 'message' => 'Failed!'));
			} else 
					print json_encode(array('success' => 0, 'message' => 'Failed!'));
		}
	}

	public function pagination($total_rows, $segment, $uri)
	{
			$config['uri_segment'] = $segment;
			$config['base_url'] = base_url().$uri;
			$config['total_rows'] = $total_rows;
			$config['per_page'] = 10;

			$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-end">';
			$config['full_tag_close'] 	= '</ul></nav></div>';
			$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] 	= '</span></li>';
			$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close'] 	= '</span></li>';
			$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close'] 	= '</span></li>';

			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			
			return $config;
	}
}

?>
