
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('utility_helper');
        $this->load->helper('admin_helper');

			// Load session library
        $this->load->library('session');
        $this->load->library('pagination');

		$this->load->model(['Documentmodel', 'Documentcategorymodel', 'Usermodel', 'Pagemodel', 'Urlaliasmodel']);

		// $this->assets_dir = GROUP_ASSETS.getSubDomain().'/';
		$this->assets_dir = GROUP_ASSETS.'generic/';

	}

	public function index()
	{
		 $content = "";
		// $page_id = 0;
		// $pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
		// 	if(isset($pageobj[0]->page_id)){
		// 			$content = $pageobj[0]->page_content;
		// 			$page_id = $pageobj[0]->page_id;
		// 			$pageobj = $pageobj[0];
		//     }
		
		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Document List page';
		$pageobj->page_title = 'Document List';
		$pageobj->page_keywords = '';
            

        $document_category = $this->Documentcategorymodel->get();

        $page_count = count($this->Documentmodel->get(array('status' => '1')));

        $pagination = $this->pagination($page_count, 2, 'documents');

		$this->pagination->initialize($pagination);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        
        $document = $this->Documentmodel->get(array('offset' => $page,  'limit' => $pagination['per_page'], 'status' => '1', 'sortBy' => 1, 'sortDirection' => 'desc'));


        $document_obj = array_map(function($doc){
            $doc->author    = $this->Usermodel->get(array('id' => $doc->user_id));
            $doc->category  = $this->Documentcategorymodel->get(array('document_category_id' => $doc->document_category_id));

            return $doc;
        }, $document);

        //dd($document_obj);
		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir, 
			'content' => $this->load->view(getTemplate('document'), array('document' => $document_obj, 'document_category' => $document_category, 'pagination' => $this->pagination->create_links()), true),
			'page_obj'=>$pageobj
		));
    }

    public function categories($alias)
    {
        // $content = "";
		// $page_id = 0;
		// $pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
		// 	if(isset($pageobj[0]->page_id)){
		// 			$content = $pageobj[0]->page_content;
		// 			$page_id = $pageobj[0]->page_id;
		// 			$pageobj = $pageobj[0];
        //     }
		 
		$pageobj = new stdClass();
		$pageobj->page_meta_description = 'Document categories';
		$pageobj->page_title = 'Document Categories';
		$pageobj->page_keywords = '';

        $opt_arr = array();
        $opt_arr['url_alias_type'] = 'documentcategory';
        $opt_arr['url_alias_value'] = $alias;


        $url_alias = $this->Urlaliasmodel->get($opt_arr);

        $category_id = $url_alias[0]->id;

        $page_count = count($this->Documentmodel->get(array('document_category_id' => $category_id, 'status' => '1')));

        $pagination = $this->pagination($page_count, 4, 'documents/categories/'.$alias);

		$this->pagination->initialize($pagination);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
        $document_category = $this->Documentcategorymodel->get(array('document_category_id' => $category_id));
		
		$document_category[0]->page = $page;
		$document_category[0]->per_page = $pagination['per_page'];
	
        $category_obj = array_map(function($cat){
            $cat->documents = $this->Documentmodel->get(array('document_category_id' => $cat->document_category_id, 'offset' => $cat->page,  'limit' => $cat->per_page, 'status' => '1', 'sortBy' => 1, 'sortDirection' => 'desc'));

            return $cat;
        }, $document_category);
        
        //dd($category_obj);

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir, 
			'content' => $this->load->view(getTemplate('document_category'), array('category_obj' => $category_obj, 'pagination' => $this->pagination->create_links()), true),
			'page_obj'=>$pageobj
		));
    }

    public function document_item($alias)
    {
        $content = "";
		// $page_id = 0;
		// $pageobj = $this->Pagemodel->get(array('page_is_homepage'=>0));
		// 	if(isset($pageobj[0]->page_id)){
		// 			$content = $pageobj[0]->page_content;
		// 			$page_id = $pageobj[0]->page_id;
		// 			$pageobj = $pageobj[0];
		//     }
		
        $opt_arr = array();
        $opt_arr['url_alias_type'] = 'document';
        $opt_arr['url_alias_value'] = $alias;


		$url_alias = $this->Urlaliasmodel->get($opt_arr);

        $document_id = $url_alias[0]->id;

        $document = $this->Documentmodel->get(array('document_id' => $document_id));

        $document_obj = array_map(function($doc){
            $doc->author    = $this->Usermodel->get(array('id' => $doc->user_id));
            $doc->category  = $this->Documentcategorymodel->get(array('document_category_id' => $doc->document_category_id));

            return $doc;
        }, $document);
        
		// dd($document_obj);
		
		$pageobj = new stdClass();
		$pageobj->page_meta_description = $document_obj[0]->document_meta_description;
		$pageobj->page_title = $document_obj[0]->document_title;
		$pageobj->page_keywords = '';

		$this->load->view(getTemplate('main'), array(
			'assets_dir'=>$this->assets_dir, 
			'content' => $this->load->view(getTemplate('document_page'), array('document_obj' => $document_obj[0]), true),
			'page_obj'=>$pageobj
		));
	}
	
	public function download($alias)
	{
		$opt_arr = array();
        $opt_arr['url_alias_type'] = 'document';
        $opt_arr['custom_url'] = $alias;

		$url_alias = $this->Urlaliasmodel->get($opt_arr);
	
	
		if(!empty($url_alias)){
			$document_id = $url_alias[0]->id;
			$document_details = $this->Documentmodel->get(array('document_id' => $document_id));
				if (file_exists($document_details[0]->file_upload_path)) {
				
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename="'.basename($document_details[0]->file_upload_path).'"');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: ' . filesize($document_details[0]->file_upload_path));
					flush(); // Flush system output buffer
					readfile($document_details[0]->file_upload_path);
					exit;

				}
		} else {
			exit;
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
