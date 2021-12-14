<?php

/**
 * Pagemodel
 *
 * @package Pagemodel
 */

class Usergroupmodel extends CI_Model
{

    //the table associated with the group model
	private $table_name = 'user_groups';
	
	private $primary_key = 'user_groups_id';
	//the required column/values for the tbl_group
	private $required_columns = array();

	//the default column/values for the tbl_group
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
        // Qualification
		if(isset($options['user_id'])) {
			$this->db->where('user_groups.user_id', $options['user_id']);
        }
        
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

    function delete($options = array())
    {
		if(!$this->_required(
			array($this->primary_key),
			$options)
		) return false;

		$this->db->where($this->primary_key, $options[$this->primary_key]);
		$this->db->delete($this->table_name);
		

		return true;
    }
    
    public function getGroups($id)
    {

        $this->db->select('user_groups.groups_id, groups.groups_name');
        $this->db->join('groups', 'groups.groups_id = user_groups.groups_id');
        $this->db->where('user_groups.user_id', $id);

        $query = $this->db->get('user_groups');

        if($query->num_rows() > 0){

            return $query->result();

        }else{

            return array();
        }
	}
	
	public function deleteUser($user_id)
    {
        $this->db->where('user_id', $user_id);
		$this->db->delete($this->table_name);

		if( !$this->db->affected_rows() ) {
			return false;
		}

		return true;
	}
	
	public function deleteGroup($grp_id)
    {

        $this->db->where('groups_id', $grp_id);
		$this->db->delete($this->table_name);

		if( !$this->db->affected_rows() ) {
			return false;
		}

		return true;
	}

	//list of not assigned groups
	public function getNotAssignedG($id)
    {
        $this->db->select('user_groups.groups_id');
        $this->db->join('groups', 'groups.groups_id = user_groups.groups_id');
        $this->db->where('user_groups.user_id', $id);
		
		//get list of groups that assigned to user
		$query = $this->db->get('user_groups');

		$results = $query->result();

		if($query->num_rows() > 0)
		{
	
			$group_ids = [];

			foreach($results as $res){
				$group_ids[] = $res->groups_id;
			}
			
			$this->db->where_not_in('groups.groups_id', $group_ids);
	
			$query_2 = $this->db->get('groups');
			
			return $query_2->result(); // list of groups that not been assigned to a user

		} else {
			
			$query_2 = $this->db->get('groups');
			
			return $query_2->result(); //return all groups
		}

	}

}


?>