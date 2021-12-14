<?php

/**
 * Blogmodel
 *
 * @package Blogmodel
 */

class Blogmodel extends CI_Model
{
	//the table associated with the Blog model
	private $table_name = 'blog';
	private $primary_key = 'blog_id';
	//the required column/values for the Blogmodel
	private $required_columns = array();

	//the default column/values for the Blogmodel
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
		$this->db->join('url_alias', 'url_alias.id = blog.blog_id', 'left');
		$this->db->where('url_alias.url_alias_type', 'blog');
		// $this->db->join('blog_content', 'blog_content.blog_id = blog.blog_id');
		$this->db->join('blog_category_xref', 'blog_category_xref.blog_id = blog.blog_id');
		// search blog by id

		if(isset($options['blog_id']))
			$this->db->where('blog.blog_id', $options['blog_id']);

		if(isset($options['published_date']))
			$this->db->where('blog.blog_status', $options['published_date']);

		if(isset($options['featured_item']))
			$this->db->where('blog.blog_id !=', $options['featured_item']);
		
		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('blog');

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

	function getBlogAuthorsList($options = array()){
	
		$qrystring = "select a.*
		              from user a
			      left join (select distinct user_id, 1 as access
			                 from user_grant_access where user_function_id = 1 || user_function_id = 2 || user_function_id = 3) b on a.user_id = b.user_id
			      left join (select user_id, role_id
			                 from user_role where role_id = 1 || role_id = 4) c on a.user_id = c.user_id
			      where (b.access = 1 or role_id = 1 or role_id = 4) and a.user_status != 0
				  order by a.user_name asc";
				  	      
		$query = $this->db->query($qrystring);
		
		$res = $query->result();
		
		return $res;
	}
}

?>
