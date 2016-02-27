<?php
class Block_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function checkNotBlock($ip)
	{
		$query = $this->db->get_where('block_guest', array('ip_address' => $ip));
		$getModel = $query->row_array();
        if(!empty($getModel)){
        	if($getModel['minute'] == date('i')){
        		if($getModel['count'] == 1){
        			//$this->db->where('ip_address', $ip); 
					$this->db->update('block_guest', array('count'=>2 ), array('ip_address' => $ip) );
					return true;
        		}
        		else{
        			return false;
        		}
        	}
        	else{
        		//$this->db->where('ip_address', $ip); 
				$this->db->update('block_guest', array('count'=>1, 'minute'=>date('i') ), array('ip_address' => $ip) );
				return true;
        	}
        }
        else{
        	$data = array();
			$data['ip_address'] = $ip;
			$data['minute'] = date('i');
			$data['count']	= 1;
			$this->db->insert('block_guest', $data);
			return true;
        }
			

	} 

}