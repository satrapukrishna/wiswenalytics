<?php
class Hardware_template_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_hardware_template($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('hardware_template', $data);
            return $res;
        }
        return false;
    }
	
	function get_hardware_template($category_id,$device_id){
		$this->db->select('');
        $this->db->from('hardware_template');
        $this->db->where('hardware_category', $category_id);
        $this->db->where('hardware_device', $device_id);
        $pages = $this->db->get();
        return $pages;
	}
	function get_template_by_id($temp_id){
		$this->db->select('');
        $this->db->from('hardware_template');
        $this->db->where('temp_id', $temp_id);
        $pages = $this->db->get()->row_array();
        return $pages;
	}
	
	function delete_template($category_id,$device_id) {
		
        // if ($partner_id != '') {
            $this->db->where('hardware_category', $category_id);
            $this->db->where('hardware_device', $device_id);
            $page = $this->db->delete('hardware_template');
            return $page;
        // }

        return false;
    }
	
}