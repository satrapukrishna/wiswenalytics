<?php
class Firepump_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_firepump($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('firepump', $data);
            return $res;
        }
        return false;
    }
	function update_firepump($hardware_id, $data) {
        if ($hardware_id != '') {
            $this->db->where('hardware_id', $hardware_id);
            $page = $this->db->update('firepump', $data);
            return $page;
        }
        return false;
    }
	
	function get_firepumps($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $status = $web_options['status'];
        $device_id = $web_options['hardware_device'];
		
		$this->db->select('f.*,hd.device_name');
        $this->db->from('firepump as f');
		// $this->db->join('hardware_category as hc', 'hc.category_id=h.hardware_category','left');
		$this->db->join('hardware_device as hd', 'hd.device_id=f.hardware_device','left');
		$this->db->where('f.hardware_device',$device_id);
        if ($search_keyword != '') {
            $this->db->where("(f.dashboard_name LIKE '%" . $search_keyword . "%' OR f.pump_type LIKE '%" . $search_keyword . "%' OR hd.device_name LIKE '%" . $search_keyword . "%')");
        }   
		if ($status != '') {
			$this->db->where('f.status',$status);
		}
		$this->db->where('f.client_id',$this->session->userdata('user_id'));
		//$this->db->order_by('f.hardware_device','ASC');
        if($limit!=''){
            $this->db->limit($limit, $start);
			}
        $websites = $this->db->get()->result();
		
		
        $this->db->select('count(f.hardware_id) as ttl_rows');
        $this->db->from('firepump as f');
		// $this->db->join('hardware_category as hc', 'hc.category_id=h.hardware_category','left');
		$this->db->join('hardware_device as hd', 'hd.device_id=f.hardware_device','left');
        
        if ($search_keyword != '') {
            $this->db->where("(f.dashboard_name LIKE '%" . $search_keyword . "%' OR f.pump_type LIKE '%" . $search_keyword . "%' OR hd.device_name LIKE '%" . $search_keyword . "%')");
        } 
		if ($status != '') {
			$this->db->where('f.status',$status);
		}
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	function get_firepump_device(){
		$this->db->select('f.*,hd.device_name');
        $this->db->from('firepump as f');
		$this->db->join('hardware_device as hd', 'hd.device_id=f.hardware_device','left');
        $this->db->where('hardware_device!=',10 );/**** multi firepump systems*******/
		$this->db->order_by('f.hardware_device','ASC');
		$this->db->group_by('f.hardware_device');
        $page = $this->db->get();
        return $page;
		
	}
	
	function get_firepump($hardware_id){
		$this->db->select('f.*,hd.device_name');
        $this->db->from('firepump as f');
		// $this->db->join('hardware_category as hc', 'hc.category_id=h.hardware_category','left');
		$this->db->join('hardware_device as hd', 'hd.device_id=f.hardware_device','left');
        $this->db->where('hardware_id', $hardware_id);
        $page = $this->db->get()->row_array();
        return $page;
	}
	function delete_firepump($hardware_id) {
		
        if ($hardware_id != '') {
            $this->db->where('hardware_id', $hardware_id);
            $page = $this->db->delete('firepump');
			
            return $page;
        }

        return false;
    }
	function update_status($h_id,$data)
    {
        if(count($data)>0 && $h_id != ''){
            $this->db->where('hardware_id',$h_id);
            $res = $this->db->update('firepump',$data);
            return $res;
        }
        return false;

    }
	
}