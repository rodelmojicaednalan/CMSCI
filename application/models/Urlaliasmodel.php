<?php

/**
 * Urlaliasmodel
 *
 * @package Urlaliasmodel
 */

class Urlaliasmodel extends CI_Model
{
	//the table associated with the user model
	private $table_name = 'url_alias';
	private $primary_key = 'url_alias_id';
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
			$valid = false;
			if(isset($options[$this->primary_key])){
				$this->db->where($this->primary_key, $options[$this->primary_key]);
				$valid = true;
			}
			if(isset($options['id']) && isset($options['url_alias_type'])){
				$this->db->where('id', $options['id']);
				$this->db->where('url_alias_type', $options['url_alias_type']);
				$valid = true;
			}

			if($valid )
				$this->db->delete($this->table_name);

			return true;
	}

	function get($options = array())
	{
	   	if(isset($options[$this->primary_key])){
				$this->db->where($this->primary_key, $options[$this->primary_key]);
			}

			if(isset($options['id'])){
				$this->db->where('id', $options['id']);
			}

			if(isset($options['url_alias_value'])){
				$this->db->where('url_alias_value', $options['url_alias_value']);
			}

			if(isset($options['url_alias_type'])){
				$this->db->where('url_alias_type', $options['url_alias_type']);
			}

			if(isset($options['custom_url'])){
				$this->db->where('custom_url', $options['custom_url']);
			}

			// limit / offset
			if(isset($options['limit']) && isset($options['offset']))
				$this->db->limit($options['limit'], $options['offset']);
			else if(isset($options['limit']))
				$this->db->limit($options['limit']);

			// sort
			if(isset($options['sortBy']) && isset($options['sortDirection']))
				$this->db->order_by($options['sortBy'], $options['sortDirection']);

			$query = $this->db->get('url_alias');

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

	function getlastalias($options = array())
	{

			if(isset($options[$this->primary_key])){
			//$this->db->where($this->table_name.'.'.$this->primary_key, $options[$this->primary_key]);
				$this->db->where($this->primary_key, $options[$this->primary_key]);
			}

			if (isset($options['id'])) {
				$this->db->where('id', $options['id']);
			}
			if (isset($options['url_alias_type'])) {
				$this->db->where('url_alias_type', $options['url_alias_type']);
			}
			if (isset($options['url_alias_value'])) {
				$this->db->like('url_alias_value', $options['url_alias_value']);
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
}

?>
