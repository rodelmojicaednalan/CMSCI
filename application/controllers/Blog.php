<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public $assets_dir = '';

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('admin_helper');

		// Load session library
		$this->load->library('session');
		$this->load->library('pagination');


		// load model
		$this->load->model('Usermodel');
		$this->load->model('Pagemodel');
		$this->load->model('Blogcategorymodel');
		$this->load->model('Blogcategoryxrefmodel');
		$this->load->model('Blogmodel');
		$this->load->model('Fileuploadmodel');
		$this->load->model('Blogimagemodel');
		$this->load->model('Blogcontentmodel');
		$this->load->model('Urlaliasmodel');
		$this->load->model('Contenttypedefinitionmodel');
		$this->load->model('Featureditemmodel');


		$this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
	}

	public function index()
	{
		$content = "";

		/*
		$page_id = 0;
		$pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
			if(isset($pageobj[0]->page_id)){
					$content = $pageobj[0]->page_content;
					$page_id = $pageobj[0]->page_id;
					$pageobj = $pageobj[0];
			}
		*/

		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Blog List page';
		$pageobj->page_title = 'Blog List';
		$pageobj->page_keywords = '';

		$content_type  = $this->Contenttypedefinitionmodel->get(array('type' => 'Blog'));
		
		$featured_item = $this->Featureditemmodel->get(array('content_type_id' => $content_type[0]->content_type_definition_id));
		
		$sort = '';

		$blog_category = $this->Blogcategorymodel->get();
		
		(isset($_POST['old_post']) ? $sort = "asc" : $sort = "desc");

		$filter = [
			'sortBy'			=> 'blog.blog_id',
			'sortDirection' 	=> $sort,
			'offset' 			=> 0,
			'published_date'	=> 1
		];

		if(!empty($featured_item)){
			$filter['featured_item'] =  $featured_item[0]->featured_item_content_id;
			$blog_featured = $this->Blogmodel->get(array('blog_id' => $featured_item[0]->featured_item_content_id));
		}

		
		$blog_posts = $this->Blogmodel->get($filter);
		
		
		//check if it is published
		if(!empty($blog_featured) &&  $blog_featured[0]->blog_status == 1){
			$blog_posts['featured_blog'] = $blog_featured[0];
		}
		
		$blog_object = array_map(function($blog_detail) {
			$blog_detail->blog_category_id = ($blog_detail->blog_category_id == "") ? '0' : $blog_detail->blog_category_id;

			$blog_detail->blog_preview_text = htmlspecialchars_decode($blog_detail->blog_preview_text);
			$blog_detail->blog_body 		= $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
			$blog_detail->blog_category 	= $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
			$blog_detail->author			= $this->Usermodel->get(array('id' => $blog_detail->user_id));
			$blog_detail->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));

			return $blog_detail;

		}, $blog_posts);

		//dd($blog_object);
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('blog_list'), array('data' => $blog_object, 'blog_category' => $blog_category), true),
			'page_obj'=>$pageobj
		));
	}

	public function categories($alias)
	{
		$content = "";

		/*
		$page_id = 0;
		$pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
			if(isset($pageobj[0]->page_id)){
					$content = $pageobj[0]->page_content;
					$page_id = $pageobj[0]->page_id;
					$pageobj = $pageobj[0];
			}
			*/

		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Blog categories';
		$pageobj->page_title = 'Blog Categories';
		$pageobj->page_keywords = '';

		$opt_arr = array();
		$opt_arr['url_alias_type'] = 'blogcategory';
		$opt_arr['url_alias_value'] = $alias;
		//$opt_arr['published_date'] = 1;

		$url_alias = $this->Urlaliasmodel->get($opt_arr);
		// dd($url_alias);
		$blog_category_id = $url_alias[0]->id;

		$page_count = count($this->Blogcategoryxrefmodel->get(array('blog_category_id' => $blog_category_id, 'blog_status' => 1)));

		$pagination = $this->pagination($page_count, $alias);

		$this->pagination->initialize($pagination);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$blog_category_details = $this->Blogcategoryxrefmodel->get(array('blog_category_id' => $blog_category_id, 'offset' => $page,  'limit' => $pagination['per_page'], 'blog_status' => 1));

		$blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_category_id));
		//blog_category_details = [];
		$blog_category_full = $this->Blogmodel->get(array('published_date' => 0));

		$unpub_post = array_column($blog_category_full, 'blog_id');
	
		foreach($blog_category_details as $index => $bd){
			if(in_array($bd->blog_id, $unpub_post)){
					unset($blog_category_details[$index]);
			}
		}
	
		$blog_object = array_map(function($blog_detail) {
				$blog_detail->blog_category_id = ($blog_detail->blog_category_id == "") ? '0' : $blog_detail->blog_category_id;

				$blog_detail->blog_details = $this->Blogmodel->get(array('blog_id' => $blog_detail->blog_id, 'published_date' => 1));
				
				$blog_detail->blog_details[0]->blog_preview_text = htmlspecialchars_decode($blog_detail->blog_details[0]->blog_preview_text);
				$blog_detail->blog_details[0]->blog_body = $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
				$blog_detail->blog_details[0]->blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
				$blog_detail->blog_details[0]->author				= $this->Usermodel->get(array('id' => $blog_detail->blog_details[0]->user_id));
				$blog_detail->blog_details[0]->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));

			return $blog_detail;
		}, $blog_category_details);

	


		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('blog_category_page'), array('blog_object' => $blog_object, 'blog_details' => $blog_category[0], 'pagination' => $this->pagination->create_links()), true),
			'page_obj'=>$pageobj
		));
	}

	public function post($alias)
	{
		$content = "";

		/*
		$page_id = 0;
		$pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
			if(isset($pageobj[0]->page_id)){
					$content = $pageobj[0]->page_content;
					$page_id = $pageobj[0]->page_id;
					$pageobj = $pageobj[0];
			}
		*/

		$opt_arr = array();
		$opt_arr['url_alias_type'] = 'blog';
		$opt_arr['url_alias_value'] = $alias;


		$url_alias = $this->Urlaliasmodel->get($opt_arr);

		$blog_id = $url_alias[0]->id;

		$blog_details = $this->Blogmodel->get(array('blog_id' => $blog_id));

		$blog_object = array_map(function($blog_detail) {
			$blog_detail->blog_category_id = ($blog_detail->blog_category_id == "") ? '0' : $blog_detail->blog_category_id;

			$blog_detail->blog_preview_text = htmlspecialchars_decode($blog_detail->blog_preview_text);
			$blog_detail->blog_body 		= $this->Blogcontentmodel->get(array('blog_id' => $blog_detail->blog_id));
			$blog_detail->blog_category = $this->Blogcategorymodel->get(array('blog_category_id' => $blog_detail->blog_category_id));
			$blog_detail->author				= $this->Usermodel->get(array('id' => $blog_detail->user_id));
			$blog_detail->blog_images		= $this->Blogimagemodel->get(array('blog_id' => $blog_detail->blog_id));
			//$blog_detail->blog_images 	= $this->Fileuploadmodel->get(array('file_upload_id' => ));

			return $blog_detail;
		}, $blog_details);

		// dd($blog_object);

		$pageobj = new stdClass();
		$pageobj->page_meta_description = $blog_object[0]->blog_meta_description;
		$pageobj->page_title = $blog_object[0]->blog_title;
		$pageobj->page_keywords = '';

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('blog_post'), array('blog_object' => $blog_object[0]), true),
			'page_obj'=>$pageobj
		));
	}

	public function pagination($total_rows, $category)
	{
			$config['uri_segment'] = 4;
			$config['base_url'] = base_url().'blog/categories/'.$category;
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
