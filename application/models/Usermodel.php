<?php

/**
 * Usermodel
 *
 * @package Usermodel
 */

class Usermodel extends CI_Model
{
	//the table associated with the user model
	private $table_name = 'user';
	private $primary_key = 'user_id';
	//the required column/values for the tbl_user
	private $required_columns = array();

	//the default column/values for the tbl_user
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

		// Search
		if(isset($options['search_value'])){
			$this->db->like('user.user_firstname', $options['search_value']);
		}

		// Qualification
		if(isset($options['id'])){
			$this->db->where('user.user_id', $options['id']);
		}

		if(isset($options['emailaddress'])){
			$this->db->where('lower(user.user_email)', strtolower($options['emailaddress']));
		}

		if(isset($options['user_name'])){
			$this->db->where('lower(user.user_name)', strtolower($options['user_name']));
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

	public function login($data) {
		$condition = "user_email =" . "'" . $data['email'] . "' AND " . "user_password =" . "'" . md5($data['password']) . "' AND user_status = 1";
		$this->db->select('user.*, user_role.role_id');
		$this->db->from('user');
		$this->db->join('user_role', 'user.user_id = user_role.user_id', 'LEFT');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

    	public function setPasswordResetKey($email, $key){
    		$query = "UPDATE user SET user_reset_password_key=?, user_reset_password_expiration=? WHERE user_email=? LIMIT 1";
    		$this->db->query($query, Array($key, date("Y-m-d H:i:s",time()+86400), $email));
        }

	public function getUserByResetPasswordKey($key){
		$query = "SELECT user_id FROM user WHERE user_reset_password_key=? AND user_reset_password_expiration>=?";
                $query = $this->db->query($query, Array($key, date("Y-m-h H:i:s")));
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function forgotpassword($data){

	}
}

?>
