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
	function update_hardware_client($c_id, $data) {
        if ($c_id != '') {
            $this->db->where('client_id', $c_id);
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
		// echo $this->db->last_query();exit;
		
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
	function get_category_solution_hardwares_dropdown($category,$solution){
		$this->db->select('hardware_id,dashboard_name');
        $this->db->from('hardware');
        $this->db->where('hardware_category', $category);
        $this->db->where('hardware_device', $solution);
        $this->db->where('client_id', $this->session->userdata('created_by'));
		$this->db->where('status',1);
        $this->db->order_by('hardware_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['hardware_id']] = $row['dashboard_name'];
        }
        return $items;
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
    function add_watermeter_schedule($data){
        if (count($data) > 0) {
            $res = $this->db->insert('water_meter_management', $data);
            return $res;
        }
        return false;
    }
   
    function get_watermeter_schedule($mid){
        


        $this->db->select('h.*,hc.dashboard_name');
        $this->db->from('water_meter_management as h');
		$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
        $this->db->where('h.emp_id', $this->session->userdata('user_id'));
        if($mid != ''){
            $this->db->where('h.meter_id', $mid);
        }
        
        
        $this->db->where('h.client_id', $this->session->userdata('created_by'));
        $this->db->order_by('hc.dashboard_name');

        $res = $this->db->get()->result_array();
        return $res;

    }
    function delete_schedule($id) {
		
        if ($id != '') {
            $this->db->where('schedule_id', $id);
            $page = $this->db->delete('water_meter_management');		
			
            return $page;
        }

        return false;
    }

    function get_watermeter_sche($sid){
        $this->db->select('');
        $this->db->from('water_meter_management');
        $this->db->where('schedule_id ', $sid);
        //$this->db->where('temp_id', $temp_id);
        $page = $this->db->get()->row_array();
        return $page;
    }

    function update_watermeter_schedule($s_id, $data) {
        if ($s_id != '') {
            $this->db->where('schedule_id', $s_id);
            $page = $this->db->update('water_meter_management', $data);
            return $page;
        }
        return false;

    }
    
}