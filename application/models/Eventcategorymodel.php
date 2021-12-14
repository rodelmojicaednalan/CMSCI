<?php

/**
 * Eventcategorymodel
 *
 * @package Eventcategorymodel
 */

class Eventcategorymodel extends CI_Model
{
	//the table associated with the Eventcategorymodel 
	private $table_name = 'event_categories';
	private $primary_key = 'id';
	//the required column/values for the Eventcategorymodel
	private $required_columns = array();

	//the default column/values for the Eventcategorymodel
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
		//$this->db->select("event_categories.*, event.event_count, url_alias.url_alias_value, url_alias.custom_url", FALSE);
		//$this->db->join('( select count(*) event_count, event_category_id from event group by `event_category_id` ) as event', 'event_categories.id = event.event_category_id', 'left');
		$this->db->select("event_categories.*, url_alias.url_alias_value, url_alias.custom_url", FALSE);
		$this->db->join('url_alias', 'url_alias.id = event_categories.id', 'left');
		$this->db->where('url_alias.url_alias_type', 'eventcategory');
		
		// id
		if(isset($options['id'])){
			$this->db->where('event_categories.id', $options['id']);
		}

		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($this->table_name.'.'.$options['sortBy'], $this->table_name.'.'.$options['sortDirection']);


		$query = $this->db->get($this->table_name);

		if(isset($options['count'])) return $query->num_rows();

		$res = $query->result();

		return $res;
	}
}

?>
