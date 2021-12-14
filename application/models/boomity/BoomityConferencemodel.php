<?php

/**
 * BoomityConferencemodel
 *
 * @package BoomityConferencemodel
 */

class BoomityConferencemodel extends CI_Model
{

    //the table associated with the conference number model
	private $table_name = 'conference_number';
	
	private $primary_key = 'conference_number_id';
	//the required column/values for the tbl_conferencemodel in boomity_api
	private $required_columns = array();

	//the default column/values for the tbl_conferencemodel in boomity_api
	private $default_columns = array();

    private $db;
	
	function __construct()
	{
        parent::__construct();
        $this->db =  $this->load->database('default', true);
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
        if(isset($options['user_id']))
			$this->db->where('conference_number.user_id', $options['user_id']);

		if(isset($options['groups_id']))
			$this->db->where('conference_number.groups_id', $options['groups_id']);
    
        if(isset($options['free_conf_num']))
			$this->db->where('groups_id =', 0);

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
    
}


?>