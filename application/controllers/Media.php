
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('pagination');

			// Load session library
		$this->load->library('session');

		$this->load->model(['Mediacategorymodel', 'Mediamodel', 'Mediatypemodel', 'Mediaitemtypemodel', 'Pagemodel']);

		// $this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
		$this->assets_dir = GROUP_ASSETS.'generic/';

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


		$config['base_url'] 		= base_url('media');
		$config['total_rows'] 		= $this->Mediamodel->get_max_pages( (isset($_GET['s']) ? $_GET['s'] : ''), [ 'media_published'	=> 1 ] );
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


		

		$media_category_id = isset($_GET['cat']) ? $_GET['cat'] : '';
		$mediatype_id = isset($_GET['type']) ? $_GET['type'] : '';
		$search = isset($_GET['s']) ? $_GET['s'] : '';
		$offset = $this->uri->segment(3);

		if(isset($offset) && is_numeric($offset))
			$offset = ($offset - 1) * 5;
		else
			$offset = 0;


		$options  = [
			'media_category_id' => $media_category_id,
			'mediatype_id'		=> $mediatype_id,
			'search'			=> $search,
			'limit'				=> '5',
			'offset'			=>	isset($_GET['per_page']) ? $_GET['per_page'] : 0,
			'media_published'	=> 1
		];

		$media = $this->Mediamodel->get($options);

		$media_count = $this->Mediamodel->get(array('count' => 'count'));

		$this->load->model('Mediatypemodel');

		$options['where'] = [
			[ 'field' => 'a.media_category_status', 'value' => 1 ]
		];

		$media_category = $this->Mediacategorymodel->get( $options );
		$media_type = $this->Mediatypemodel->get();

		$page_meta_description = '';
		$page_title = '';
		$ctr = count($media);
		$i = 0;
		foreach( $media as $key => $row){
			$page_meta_description .= $row->media_meta_description . ( $ctr < $i - 1 ? ', ' : '' );
			$page_title .= $row->media_title . ( $ctr < $i - 1 ? ', ' : '' );
			$i++;
		}

		$pageobj = new stdClass();
		$pageobj->page_meta_description = $page_meta_description;
		$pageobj->page_title 			= $page_title;
		$pageobj->page_keywords 		= $page_meta_description;

		$data = array();
		$data['main_content'] = $this->load->view('admin/manage_content/content_media', compact('media', 'media_category', 'media_type') , true);


		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('media'), [ 'count' => $media_count ], true),
			'page_obj'=> $pageobj
		));

	}


	public function media_category() {
		$uri = $this->uri->segment(3);
		$content = "";

		$config['base_url'] 		= base_url('media/categories/' . $uri);
		$config['total_rows'] 		= $this->Mediacategorymodel->get_max_pages( (isset($_GET['s']) ? $_GET['s'] : ''), [ 'media_category_id' => $uri ] );
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

		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Media categories';
		$pageobj->page_title = 'Media Categories';
		$pageobj->page_keywords = '';

		$media_category_id = $uri;
		$mediatype_id = isset($_GET['type']) ? $_GET['type'] : '';
		$search = isset($_GET['s']) ? $_GET['s'] : '';
		$offset = $this->uri->segment(5);

		if(isset($offset) && is_numeric($offset))
			$offset = ($offset - 1) * 5;
		else
			$offset = 0;

		$options  = [
			'media_category_id' => $media_category_id,
			'mediatype_id'		=> $mediatype_id,
			'search'			=> $search,
			'limit'				=> '5',
			'offset'			=> $offset,
			'media_published'	=> 1
		];

		

		$options  = [
			'media_category_id' => $media_category_id,
			'mediatype_id'		=> $mediatype_id,
			'search'			=> $search,
			'offset'			=> isset($_GET['per_page']) ? $_GET['per_page'] : 0,
			'media_published'	=> 1
		];

		$media = $this->Mediamodel->get($options);
		$media_count = sizeof($media);

		$media_category = $this->Mediacategorymodel->get_details($uri);

		$pageobj = new stdClass();
		$pageobj->page_meta_description = $media_category->media_category_description;
		$pageobj->page_title 			= $media_category->media_category_title;
		$pageobj->page_keywords 		= $media_category->media_category_title;

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('media_category'), [ 'data' => $media, 'category' => $media_category, 'count' => $media_count], true),
			'page_obj'=>$pageobj
		));
	}

	public function media_item() {
		$uri = $this->uri->segment(2);
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

		$media_category_id = isset($_GET['cat']) ? $_GET['cat'] : '';
		$mediatype_id = isset($_GET['type']) ? $_GET['type'] : '';
		$search = isset($_GET['s']) ? $_GET['s'] : '';

		$options  = [
			'media_category_id' => $media_category_id,
			'mediatype_id'		=> $mediatype_id,
			'search'			=> $search,
			'id'				=> $uri,
		];

		if( !isset( $_GET['preview'] )  ){
			$options['media_published'] = 1;
		}
		

		$media = $this->Mediamodel->get_details($uri, $options);
		$media_category = $this->Mediacategorymodel->get();

		$pageobj = new stdClass();
		$pageobj->page_meta_description 	= $media->media_meta_description;
		$pageobj->page_title 				= $media->media_title;
		$pageobj->page_keywords 			= $media->media_title;

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir,
			'content' => $this->load->view(getTemplate('media_page'), [ 'data' => $media, 'data_mc' => $media_category ], true),
			'page_obj'=>$pageobj
		));

	}


}
