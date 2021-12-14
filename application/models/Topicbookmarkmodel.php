<?php

/**
 * Topicbookmarkmodel model
 *
 * @package Topicbookmarkmodel model
 */

class Topicbookmarkmodel extends CI_Model
{

    //the table associated with the topic_bookmark model
	private $table_name = 'topic_bookmark';
	
	private $primary_key = 'topic_bookmark_id';
	//the required column/values for the topic_bookmark tbl
	private $required_columns = array();

	//the default column/values for the topic_bookmark tbl
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
        //filter topic id 
		if(isset($options['topic_id']))
            $this->db->where('topic_bookmark.discussion_categories_topic_id', $options['topic_id']);

        if(isset($options['user_id']))
            $this->db->where('topic_bookmark.user_id', $options['user_id']);

		//filter id 
		if(isset($options['id']))
			$this->db->where('topic_bookmark.topic_bookmark_id', $options['id']);

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