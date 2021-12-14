<?php

/**
 * Sitedesignmodel
 *
 * @package Sitedesignmodel
 */

class Mediamodel extends CI_Model
{
	//the table associated with the user model
	private $table_name = 'media';
	private $primary_key = 'media_id';
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

		$this->db->select($this->table_name . '.*, media_category.media_category_title, groups.groups_name, file_upload.file_upload_name, file_upload.file_upload_path, file_upload.file_upload_size')
				->from($this->table_name)
				->join('media_category', $this->table_name .'.media_category_id = media_category.media_category_id', 'left')
				->join('groups', $this->table_name . '.media_permissions = groups.groups_id', 'left')
				->join('file_upload', $this->table_name . '.file_upload_id = file_upload.file_upload_id', 'left');

		// Qualification
		if(isset($options['id'])){
			$this->db->where('media.media_id', $options['id']);
		}

		if( isset($options['media_category_id']) && ($options['media_category_id'] != '') ) {
			$this->db->where('media.media_category_id', $options['media_category_id']);
		}

		if( isset($options['mediatype_id']) && ($options['mediatype_id'] != '') ) {
			$this->db->where('media.mediatype_id', $options['mediatype_id']);
		}


		if( isset($options['search']) && ($options['search'] != '') ) {
			$this->db->where('media.media_title LIKE "%' .$options['search'] . '%"');
		}

		if( isset($options['media_published']) ) {
			$this->db->where('media.media_published', $options['media_published']);
		}

		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($this->table_name.'.'.$options['sortBy'], $this->table_name.'.'.$options['sortDirection']);


		$query = $this->db->get();

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

	function get_details($id, $options = []) 
	{
		$this->db->select($this->table_name . '.*, media_category.media_category_title, groups.groups_name, file_upload.file_upload_path, file_upload.file_upload_name, file_upload.file_upload_size')
				->from($this->table_name)
				->join('media_category', $this->table_name .'.media_category_id = media_category.media_category_id', 'left')
				->join('groups', $this->table_name . '.media_permissions = groups.groups_id', 'left')
				->join('file_upload',  $this->table_name . '.file_upload_id = file_upload.file_upload_id', 'left')
				->where( $this->table_name . '.media_id', $id  );

		if( isset($options['media_published']) ) {
			$this->db->where('media.media_published', $options['media_published']);
		}

		$rs = $this->db->get();
		
		return $rs->row();
	}

	function get_max_pages($search = null, $options = [] )
	{
		if(!empty($search)){
			$this->db->where('media_category_title LIKE "%'.$search.'%"');
		}

		if( isset($options['media_published']) ) {
			$this->db->where('media_published', $options['media_published']);
		}

		return $this->db->count_all_results($this->table_name);
		// return ceil($total_recs / $recs_per_page);
	}

}

?>
