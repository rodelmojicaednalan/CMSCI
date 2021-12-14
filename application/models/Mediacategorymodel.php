<?php

/**
 * Sitedesignmodel
 *
 * @package Sitedesignmodel
 */

class Mediacategorymodel extends CI_Model
{
	//the table associated with the user model
	private $table_name = 'media_category';
	private $primary_key = 'media_category_id';
	//the required column/values for the tbl_user
	private $required_columns = array();

	//the default column/values for the tbl_user
	private $default_columns = array(
		// 'media_category_id',
		// 'user_id',
		// 'media_category_parent_id',
		// 'media_category_title',
		// 'media_category_description',
		// 'media_category_status',
		// 'media_category_created_on',
		// 'media_category_modified_on',
		// 'media_category_url'
	);


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

		// $this->db->insert($this->table_name, $options);
		// $data = [
		// 	'media_category_parent_id' => $options['media_category_parent_id'],
		// 	'media_category_title' => $options['media_category_title'],
		// 	'media_category_description' => $options['media_category_description'],
		// 	'media_category_url' =>  $this->db->escape($options['media_category_url'])
		// ];
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

		// Qualification
		if(isset($options['id'])){
			$this->db->where('media_category.media_category_id', $options['id']);
		}

		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		if( isset($options['where']) ) {
			foreach ( $options['where'] as $key => $where) {
				$this->db->where($where['field'], $where['value']);
			}
		}


		$query = $this->db->select('a.*, b.media_category_title AS parent_title')
					->from('media_category a')
					->join('media_category as b', 'a.media_category_id = b.media_category_parent_id', 'left')
					->get();

		if(isset($options['count'])) return $query->num_rows();

		$res = $query->result();

		return $res;
	}

	function get_details($id) 
	{
		$rs = $this->db->get_where( $this->table_name, [ 'media_category_id' => $id ] );
		
		return $rs->row();
	}

	function get_categories($execpt_id = 0) 
	{	
		if( $execpt_id > 0 ){
			$this->db->where('media_category_id != ' . $execpt_id);	
		}
		
		$rs = $this->db->get( $this->table_name );
		
		return $rs->result();
	}

	function get_max_pages($search = null, $options = [] )
	{
		if(!empty($search)){
			$this->db->where('media_category_title LIKE "%'.$search.'%"');
		}

		if( isset($options['media_category_id']) ) {
			$this->db->where('media_category_id', $options['media_category_id']);
		}

		return $this->db->count_all_results($this->table_name);
		// return ceil($total_recs / $recs_per_page);
	}

	
	function check_child_categories($parent_id)
	{
		$this->db->where('media_category_parent_id', $parent_id);
		return $this->db->count_all_results($this->table_name);	
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
