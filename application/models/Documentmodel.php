<?php

/**
 * Documentmodel
 *
 * @package Documentmodel
 */

class Documentmodel extends CI_Model
{

    //the table associated with the Documentmodel
	private $table_name = 'document';
	
	private $primary_key = 'document_id';
	//the required column/values for the Document model
	private $required_columns = array();

	//the default column/values for the Document model
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
		$this->db->select("document.*, url_alias.url_alias_value, url_alias.custom_url, file_upload.*");

		$this->db->join('url_alias', 'url_alias.id = document.document_id', 'left');

		$this->db->where('url_alias.url_alias_type', 'document');

		$this->db->join('file_upload', 'file_upload.file_upload_id = document.file_upload_id', 'left');

		if(isset($options['document_category_id']))
			$this->db->where('document.document_category_id', $options['document_category_id']);

		if(isset($options['document_id']))
			$this->db->where('document.document_id', $options['document_id']);

		if(isset($options['document_category_id']))
			$this->db->where('document.document_category_id', $options['document_category_id']);

		if(isset($options['status']))
			$this->db->where('document.document_published', $options['status']);
			
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