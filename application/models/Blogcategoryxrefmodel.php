<?php

/**
 * Blogcategoryxrefmodel
 *
 * @package Blogcategoryxrefmodel
 */

class Blogcategoryxrefmodel extends CI_Model
{
	//the table associated with the Blog model
	private $table_name = 'blog_category_xref';
	private $primary_key = 'blog_category_xref_id';
	//the required column/values for the Blogcategoryxrefmodel
	private $required_columns = array();

	//the default column/values for the Blogcategoryxrefmodel
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

		return $this->db->last_query();
		//return $this->db->affected_rows();
	}

	function delete($options = array()){
		// if(!$this->_required(
		// 	array($this->primary_key),
		// 	$options)
		// ) return false;

		if (empty($options)) {
			return false;
		  }

		if(isset($options['blog_id'])){
			$this->db->where('blog_id', $options['blog_id']);
		  }
	  
		if(isset($options['blog_category_id'])){
			$this->db->where('blog_category_id', $options['blog_category_id']);
		}
	
		if(isset($options['blog_category_xref_id'])){
			$this->db->where($this->primary_key, $options['blog_category_xref_id']);
		}
		
		$this->db->delete($this->table_name);

		return true;
	}

	function get($options = array())
	{
			// search blog by category id
			if(isset($options['blog_category_id']))
				$this->db->where('blog_category_xref.blog_category_id', $options['blog_category_id']);

			if(isset($options['blog_id']))
				$this->db->where('blog_category_xref.blog_id', $options['blog_id']);

			if(isset($options['blog_status'])){
				$this->db->join('blog', 'blog.blog_id = blog_category_xref.blog_id');
				$this->db->where('blog.blog_status', '1');
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
