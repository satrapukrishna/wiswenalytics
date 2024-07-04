<?php
class Switch_update_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	
	
	function update_temp($sid,$data) {
        if ($sid != '') {
            $this->db->where('switch_id', $sid);
            $page = $this->db->update('ahu_monitoring', $data);
            return $page;
        }
        return false;
    }
    function getToken($cname){
        $this->db->select('token');
        $this->db->from('token_data');
        $this->db->where('clientname', $cname);
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
// print_r($this->db->last_query());die();
        return $result[0];
    }
	
    
}