<?php
class Hardware_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_hardware($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('hardware', $data);
            return $res;
        }
        return false;
    }
	function insert_hardware_template_value($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('hardware_template_values', $data);
            return $res;
        }
        return false;
    }
	function update_hardware($hardware_id, $data) {
        if ($hardware_id != '') {
            $this->db->where('hardware_id', $hardware_id);
            $page = $this->db->update('hardware', $data);
            return $page;
        }
        return false;
    }
	function update_hardware_template_value($hardware_id, $temp_id, $data) {
        if ($hardware_id != '') {
            $this->db->where('hardware_id', $hardware_id);
            $this->db->where('temp_id', $temp_id);
            $page = $this->db->update('hardware_template_values', $data);
            return $page;
        }
        return false;
    }
	
	function get_hardwares($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $status = $web_options['status'];
		
		$this->db->select('h.*,hc.category_name,hd.device_name');
        $this->db->from('hardware as h');
		$this->db->join('hardware_category as hc', 'hc.category_id=h.hardware_category','left');
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
        if ($search_keyword != '') {
            $this->db->where("(h.dashboard_name LIKE '%" . $search_keyword . "%' OR hc.category_name LIKE '%" . $search_keyword . "%' OR hd.device_name LIKE '%" . $search_keyword . "%')");
        }   
		if ($status != '') {
			$this->db->where('h.status',$status);
		}
		$this->db->where('h.client_id',$this->session->userdata('user_id'));
        if($limit!=''){
            $this->db->limit($limit, $start);
			}
        $websites = $this->db->get();
		
		
        $this->db->select('count(h.hardware_id) as ttl_rows');
        $this->db->from('hardware as h');
		$this->db->join('hardware_category as hc', 'hc.category_id=h.hardware_category','left');
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
        
        if ($search_keyword != '') {
            $this->db->where("(h.dashboard_name LIKE '%" . $search_keyword . "%' OR hc.category_name LIKE '%" . $search_keyword . "%' OR hd.device_name LIKE '%" . $search_keyword . "%')");
        } 
		if ($status != '') {
			$this->db->where('h.status',$status);
		}
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_hardware($hardware_id){
		$this->db->select('h.*,hc.category_name,hd.device_name');
        $this->db->from('hardware as h');
		$this->db->join('hardware_category as hc', 'hc.category_id=h.hardware_category','left');
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
        $this->db->where('hardware_id', $hardware_id);
        $page = $this->db->get()->row_array();
        return $page;
	}
	function get_hardware_template_values($hardware_id,$temp_id){
		$this->db->select('');
        $this->db->from('hardware_template_values');
        $this->db->where('hardware_id', $hardware_id);
        $this->db->where('temp_id', $temp_id);
        $page = $this->db->get()->row_array();
        return $page;
	}
	
	function delete_hardware($hardware_id) {
		
        if ($hardware_id != '') {
            $this->db->where('hardware_id', $hardware_id);
            $page = $this->db->delete('hardware');
			
			$this->db->where('hardware_id', $hardware_id);
            $page = $this->db->delete('hardware_template_values');
			
            return $page;
        }

        return false;
    }
	
	function update_status($h_id,$data)
    {
        if(count($data)>0 && $h_id != ''){
            $this->db->where('hardware_id',$h_id);
            $res = $this->db->update('hardware',$data);
            return $res;
        }
        return false;

    }
}