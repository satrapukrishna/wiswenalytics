<?php
class Water_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_partner($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('partners', $data);
            return $res;
        }
        return false;
    }
	
	
	
}