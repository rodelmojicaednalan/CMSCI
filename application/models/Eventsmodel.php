<?php

/**
 * Sitedesignmodel
 *
 * @package Sitedesignmodel
 */

class Eventsmodel extends CI_Model
{
	//the table associated with the user model
	private $table_name = 'event';
	private $primary_key = 'event_id';
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

		$this->db->select($this->table_name . '.*, event_templates.body, file_upload.file_upload_name, file_upload.file_upload_path, event_categories.color, url_alias.url_alias_value, url_alias.url_alias_type, url_alias.custom_url, user.user_name, user.user_email, user.user_firstname, user.user_lastname');
		$this->db->join('event_categories', 'event.event_categories_id = event_categories.id', 'LEFT');
		$this->db->join('event_templates', 'event.event_templates_id = event_templates.id', 'LEFT');
		$this->db->join('file_upload', $this->table_name .'.file_upload_id = file_upload.file_upload_id', 'LEFT');
		$this->db->join('url_alias', $this->table_name .'.event_id = url_alias.id AND url_alias.url_alias_type = "event"', 'LEFT');
		$this->db->join('user', $this->table_name .'.user_id = user.user_id', 'LEFT');

		// Qualification
		if(isset($options['id'])){
			$this->db->where('event.event_id', $options['id']);
		}

		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);


		$query = $this->db->get($this->table_name);

		if(isset($options['count'])) return $query->num_rows();

		$res = $query->result();

		return $res;
	}

	function get_details($id)
	{
		$this->db->select($this->table_name . '.*, event_templates.body, file_upload.file_upload_name, file_upload.file_upload_path');
		$this->db->join('event_categories', 'event.event_categories_id = event_categories.id', 'LEFT');
		$this->db->join('event_templates', 'event.event_templates_id = event_templates.id', 'LEFT');
		$this->db->join('file_upload', $this->table_name .'.file_upload_id = file_upload.file_upload_id', 'LEFT')
				->where( $this->table_name . '.event_id', $id  )
				->from($this->table_name);

		$rs = $this->db->get();

		return $rs->row();
	}
	function get_max_pages($search = null )
	{
		if(!empty($search)){
			$this->db->where('event_title LIKE "%'.$search.'%"');
		}

		return $this->db->count_all_results($this->table_name);
		// return ceil($total_recs / $recs_per_page);
	}


	function get_event_templates($options = array())
	{
		// Search
		if(isset($options['id'])){
			$this->db->where('id', $options['id']);
		}

		if(isset($options['status'])){
			$this->db->where('status', $options['status']);
		}

		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($this->table_name.'.'.$options['sortBy'], $this->table_name.'.'.$options['sortDirection']);


		$query = $this->db->get('event_templates');

		if(isset($options['count'])) return $query->num_rows();

		$res = $query->result();

		return $res;
	}
}

?>
