<?php
class Auth_model extends CI_Model {

	const TYPE_ADMIN = 1;
	const TYPE_USER = 2;
	const TYPE_GUEST = 3;
    public function __construct()
    {
        $this->load->database();
    }

    public function checkAccess($key)
	{
		$query = $this->db->get_where('auth_key', array('key' => $key));
		$row = $query->row_array();
		if(!empty($row)){
			return $row['type'];
		}
		else{
			return false;
		}
	}  

	public function userAuthId($key)
	{
		$query = $this->db->get_where('auth_key', array('key' => $key));
		$row = $query->row_array();
		if(!empty($row)){
			return $row['id'];
		}
		else{
			return false;
		}
	} 
}