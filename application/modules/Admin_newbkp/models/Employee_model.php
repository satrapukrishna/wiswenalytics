<?php
class Employee_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_employee($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('employees', $data);
            return $res;
        }
        return false;
    }
	
	function get_employees($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $status = $web_options['status'];
		
		$this->db->select('e.*');
        $this->db->from('employees as e');
       
        if ($search_keyword != '') {
            $this->db->where("(e.firstname LIKE '%" . $search_keyword . "%' OR e.lastname LIKE '%" . $search_keyword . "%' OR e.email_id LIKE '%" . $search_keyword . "%')");
        } 
		if ($status != '') {
			$this->db->where('e.status',$status);
		}
		
		$this->db->where('e.created_by',$this->session->userdata('user_id'));

        if($limit!=''){
            $this->db->limit($limit, $start);
			}
        $websites = $this->db->get();
		
		
        $this->db->select('count(e.emp_id) as ttl_rows');
        $this->db->from('employees as e');
        
        if ($search_keyword != '') {
            $this->db->where("(e.firstname LIKE '%" . $search_keyword . "%' OR e.lastname LIKE '%" . $search_keyword . "%' OR e.email_id LIKE '%" . $search_keyword . "%')");
        }
		if ($status != '') {
			$this->db->where('e.status',$status);
		}
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_employee($e_id) {
        $this->db->select('');
        $this->db->from('employees');
        $this->db->where('emp_id', $e_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	
	function update_employee($emp_id, $data) {
        if ($emp_id != '') {
            $this->db->where('emp_id', $emp_id);
            $page = $this->db->update('employees', $data);
            return $page;
        }
        return false;
    }
	
	function delete_employee($employee_id) {
		
        if ($employee_id != '') {
            $this->db->where('emp_id', $employee_id);
            $page = $this->db->delete('employees');
            return $page;
        }

        return false;
    }
	
	function delete_building($building_id) {
		
        if ($building_id != '') {
            $this->db->where('building_id', $building_id);
            $page = $this->db->delete('building');
            return $page;
        }

        return false;
    }
	
	function get_partner_dropdown() {
        $this->db->select('partner_id,partner_name');
        $this->db->from('partners');
        $this->db->order_by('partner_name');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['partner_id']] = $row['partner_name'];
        }
        return $items;
    }
	
	function get_client_dropdown() {
        $this->db->select('client_id,client_name');
        $this->db->from('clients');
        $this->db->where('role',2);
        $this->db->where('status',1);
        $this->db->order_by('client_name');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['client_id']] = $row['client_name'];
        }
        return $items;
    }
	function update_status($e_id,$data)
    {
        if(count($data)>0 && $e_id != ''){
            $this->db->where('emp_id',$e_id);
            $res = $this->db->update('employees',$data);
            return $res;
        }
        return false;

    }
    
}