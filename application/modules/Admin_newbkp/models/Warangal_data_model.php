<?php
class Warangal_data_model extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function getBranches(){
		$this->db->select('');
        $this->db->from('warangal_washroom_branches');     
        // $this->db->where('status',1);     
		
        $res = $this->db->get()->result_array();  
		//echo $this->db->last_query();exit;     
        return $res;
	}
    
}