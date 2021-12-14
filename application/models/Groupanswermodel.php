<?php

/**
 * Groupanswermodel
 *
 * @package Groupanswermodel
 */

class Groupanswermodel extends CI_Model
{

    //the table associated with the group model
	private $table_name = 'group_answer';
	
	private $primary_key = 'group_answer_id';
	//the required column/values for the group_answer tbl
	private $required_columns = array();

	//the default column/values for the  group_answer tbl
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
		//search
        if(isset($options['group_question_id']))
			$this->db->where('group_question_id', $options['group_question_id']);
			
        //search
        if(isset($options['group_question_id']))
            $this->db->where('group_question_id', $options['group_question_id']);
            
		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

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
	
	function getAnsweredCount($online_meeting_id = null) {

		if ($online_meeting_id == null)
		  $this->db->where("online_meeting_id is null");
		else
		  $this->db->where('online_meeting_id', $online_meeting_id);
	
		$this->db->select('user_id, user_email, count(group_question_id) as answered_questions');
		$this->db->group_by(array('user_id', 'user_email'));
	
		$query = $this->db->get($this->table_name);

		$res = $query->result();

		return $res;
	  }
}


?>