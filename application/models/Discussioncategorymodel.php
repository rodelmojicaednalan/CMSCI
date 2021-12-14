<?php

/**
 * Discussioncategory model
 *
 * @package Discussioncategory model
 */

class Discussioncategorymodel extends CI_Model
{

    //the table associated with the discussion category model
	private $table_name = 'discussion_categories';
	
	private $primary_key = 'discussion_categories_id';
	//the required column/values for the discussion category tbl
	private $required_columns = array();

	//the default column/values for the discussion category tbl
	private $default_columns = array();

	
	function __construct()
	{
		parent::__construct();
		$this->load->database('group');
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

	function get($options = array())
	{
		$this->db->select("discussion_categories.*, discussion_topic.topic_count, url_alias.url_alias_value, url_alias.custom_url", FALSE);
		$this->db->join('(select count(*) topic_count, discussion_categories_id, discussion_categories_topic_deleted from discussion_categories_topic where discussion_categories_topic_deleted = 0 group by `discussion_categories_id`) as discussion_topic', 'discussion_categories.discussion_categories_id = discussion_topic.discussion_categories_id', 'left');
		$this->db->join('url_alias', 'url_alias.id = discussion_categories.discussion_categories_id', 'left');
		$this->db->where('url_alias.url_alias_type', 'discussioncategory');
		
		//filter id 
		if(isset($options['id']))
			$this->db->where('discussion_categories.discussion_categories_id', $options['id']);
			
		//filter flagged 
		if(isset($options['flagged'])) {
			$this->db->where('discussion_categories.discussion_categories_flagged', $options['flagged']);
			$this->db->where('discussion_categories.discussion_categories_deleted !=', $options['flagged']);
		}
		
		//filter deleted 
		if(isset($options['deleted'])) {
			$this->db->where('discussion_categories.discussion_categories_deleted', $options['deleted']);
		} else {
			$this->db->where('discussion_categories.discussion_categories_deleted', 0);
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
}


?>