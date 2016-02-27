<?php
class Airport_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get($id){
        $query = $this->db->get_where('airport', array('id' => $id));
        return $query->row_array();
	}  

	public function insert($post,$auth_key_id){
		unset($post['key']);
		$post['auth_key_id'] = $auth_key_id;
        $this->db->insert('airport', $post);
   		return $this->db->insert_id();
	} 

	public function update($post){
		unset($post['key']);
		$this->db->where('id', $post['id']); 
		$result = $this->db->update('airport', $post, array('id' => $post['id']));
        return $result;
	}

	public function delete($id){
		$result = $this->db->delete('airport', array('id' => $id)); 
		return $result;
	}

	public function search($match) {
		unset($match['key']);
		$result = $this->db->like($match)->get('airport');
		return $result->result();
	}

	public function checkUserRecord($city, $userId){
		$query = $this->db->get_where('airport', array('city' => $city, 'auth_key_id'=> $userId));
        $res = $query->row_array();
        if(empty($res)){
        	return true;
        }
        else{
        	return false;
        }
	}

}