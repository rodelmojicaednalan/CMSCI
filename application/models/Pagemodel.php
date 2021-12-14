<?php

/**
 * Pagemodel
 *
 * @package Pagemodel
 */

class Pagemodel extends CI_Model
{
	//the table associated with the user model
	private $table_name = 'page';
	private $primary_key = 'page_id';
	//the required column/values for the tbl_user
	private $required_columns = array();

	//the default column/values for the tbl_user
	private $default_columns = array();


	function __construct()
	{
		parent::__construct();
		$this->load->database('group');
	}



	function get_table_name(){
		return $this->table_name;
	}
	/** Utility Methods **/
	/*
	 * This function would check for the required fields and return true if its valid and false if not.
	 */
	function _required($required, $data)
	{
		foreach($required as $field)
			if(!isset($data[$field])) return false;

		return true;
	}
	/*
	 * This method would set default values to the array if they were not set initially
	 */
	function _default($defaults, $options)
	{
		return array_merge($defaults, $options);
	}



	function add($options = array())
	{
		// required values
		if(!$this->_required(
			$this->required_columns,
			$options)
		) return false;
		$options = $this->_default($this->default_columns, $options);

		$this->db->insert($this->table_name, $options);

		return $this->db->insert_id();

	}

	function update($options = array())
	{
			//if homepage is set, set is homepage to 0
			if(isset($options['page_is_homepage'])){
					$sql = "UPDATE page SET page_is_homepage = 0";
					$this->db->query($sql);
			}

			// required values
			if(!$this->_required(
				array($this->primary_key),
				$options)
			) return false;

			foreach($options as $key=>$val){
				if($key != $this->primary_key)
					$this->db->set($key, $val);
			}

			$this->db->where($this->primary_key, $options[$this->primary_key]);
			$this->db->update($this->table_name);

			//return $this->db->last_query();
			return $this->db->affected_rows();
	}

	function delete($options = array()){
		if(!$this->_required(
			array($this->primary_key),
			$options)
		) return false;

		$this->db->where($this->primary_key, $options[$this->primary_key]);
		$this->db->delete($this->table_name);

		return true;
	}

	function get($options = array())
	{
	   	$this->db->join('user', 'user.user_id = page_url_alias_v.user_id');
	   	$this->db->join('( Select file_upload_id, file_upload_path as user_picture_path from file_upload ) as file_upload', 'file_upload.file_upload_id = user.user_picture', 'left');
		 	$this->db->join('page_type', 'page_type.page_type_id = page_url_alias_v.page_type_id');

			if(isset($options['keyword'])){
				$this->db->where("page_url_alias_v.page_title like '%".$this->db->escape_like_str($options['keyword'])."%'");
			}

			if(isset($options['content_library_list'])){
		   		$this->db->join('content_library', 'page_url_alias_v.'.$this->primary_key . ' = content_library.content_library_item_id');
		   		$this->db->where('content_library.content_library_item_type', 'page');
		  }

			if(isset($options[$this->primary_key])){
				$this->db->where($this->primary_key, $options[$this->primary_key]);
			}

			if(isset($options['page_title'])){
				$this->db->where('page_title', $options['page_title']);
			}

			if(isset($options['page_type_id'])){
				$this->db->where('page_url_alias_v.page_type_id', $options['page_type_id']);
			}

			if(isset($options['search_value'])){
				$this->db->like('page_title', $options['search_value']);
			}

			if (isset($options['page_type_default_and_custom'])) {
				$sql = "(page_url_alias_v.page_type_id = ".PAGE_TYPE_DEFAULT." or page_url_alias_v.page_type_id = ".PAGE_TYPE_CUSTOM." or page_url_alias_v.page_type_id = ".PAGE_TYPE_TPL.")";
				$this->db->where($sql, NULL, FALSE);
			}

			if (isset($options['page_type_custom'])) {
				$sql = "(page_url_alias_v.page_type_id = ".PAGE_TYPE_CUSTOM.")";
				$this->db->where($sql, NULL, FALSE);
			}

			if (isset($options['page_is_admin'])) {
				$this->db->where('page_is_admin', $options['page_is_admin']);
			}

			if (isset($options['page_is_homepage'])) {
				$this->db->where('page_is_homepage', $options['page_is_homepage']);
			}

			if (isset($options['page_url_alias'])) {
				$this->db->where('page_url_alias', $options['page_url_alias']);
			}


			if(isset($options['fields'])){
				$field_str = '';
				foreach ($options['fields'] as $field_value) {
					$field_str .= ($field_str == '' ? $field_value : ', '.$field_value);
				}

				if(trim($field_str) != ''){
					$this->db->select($field_str, FALSE);
				}
				else{
					$this->db->select("*", FALSE);
				}
			}

			// limit / offset
			if(isset($options['limit']) && isset($options['offset']))
				$this->db->limit($options['limit'], $options['offset']);
			else if(isset($options['limit']))
				$this->db->limit($options['limit']);

			// sort
			if(isset($options['sortBy']) && isset($options['sortDirection']))
				$this->db->order_by($options['sortBy'], $options['sortDirection']);

			$query = $this->db->get('page_url_alias_v');

			if(isset($options['count'])) return $query->num_rows();

			$res = $query->result();

			return $res;
	}

	/*
	 * This would return all the columns of the table
	 */
	function get_table_column(){

		$fields = $this->db->list_fields($this->table_name);
		$field_name = array();
		foreach ($fields as $field)
		{
		   $field_name[$field] = $field;
		}
		return $field_name;
	}
}

?>
