<?php

/**
 * Discussioncategorytopic model
 *
 * @package Discussioncategorytopic model
 */

class Discussioncategorytopicmodel extends CI_Model
{

    //the table associated with the discussion category topic model
	private $table_name = 'discussion_categories_topic';
	
	private $primary_key = 'discussion_categories_topic_id';
	//the required column/values for the discussion category topic tbl
	private $required_columns = array();

	//the default column/values for the discussion category topic tbl
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
		$this->db->select("discussion_categories_topic.*, user.user_name, user.user_picture, tc.comment_count, url_alias.url_alias_value, url_alias.custom_url, discussion_categories.discussion_categories_title", FALSE);
		$this->db->join('(select count(*) comment_count, discussion_categories_topic_id from topic_comment group by `discussion_categories_topic_id`) as tc', 'discussion_categories_topic.discussion_categories_topic_id = tc.discussion_categories_topic_id', 'left');
		$this->db->join('user', 'user.user_id = discussion_categories_topic.user_id');
		$this->db->join('discussion_categories', 'discussion_categories.discussion_categories_id = discussion_categories_topic.discussion_categories_id');
		$this->db->join('url_alias', 'url_alias.id = discussion_categories_topic.discussion_categories_topic_id', 'left');
        $this->db->where('url_alias.url_alias_type', 'discussioncategorytopic');
		//filter id 
		if(isset($options['id']))
			$this->db->where('discussion_categories_topic.discussion_categories_topic_id', $options['id']);

		//filter title 
		if(isset($options['search_topic']))
			$this->db->like('discussion_categories_topic.discussion_categories_topic_title', $options['search_topic']);

		//filter by category 
		if(isset($options['search_category']))
			$this->db->like('discussion_categories.discussion_categories_title', $options['search_category']);

		//filter by category 
		if(isset($options['search_user']))
			$this->db->like('user.user_name', $options['search_user']);

		//filter by category
		if(isset($options['category_id']))
			$this->db->where('discussion_categories_topic.discussion_categories_id', $options['category_id']);
			
		//filter flagged 
		if(isset($options['flagged'])) {
			$this->db->where('discussion_categories_topic.discussion_categories_topic_flagged', $options['flagged']);
			$this->db->where('discussion_categories_topic.discussion_categories_topic_deleted !=', $options['flagged']);
		}
		
		//filter deleted 
		if(isset($options['deleted'])) {
			$this->db->where('discussion_categories_topic.discussion_categories_topic_deleted', $options['deleted']);
		} else {
			$this->db->where('discussion_categories_topic.discussion_categories_topic_deleted !=', 1);
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