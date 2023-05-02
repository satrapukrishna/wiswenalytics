<?php
class Client_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_client($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('clients', $data);
            return $res;
        }
        return false;
    }
	
	function insert_token($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('token_info', $data);
            return $res;
        }
        return false;
    }
	function insert_permission($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('permissions', $data);
            return $res;
        }
        return false;
    }
	
	function get_clients($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $status = $web_options['status'];
		
		$this->db->select('c.*');
        $this->db->from('clients as c');
		
        if ($search_keyword != '') {
            $this->db->where("(c.client_name LIKE '%" . $search_keyword . "%' OR c.email_id LIKE '%" . $search_keyword . "%' OR c.client_type LIKE '%" . $search_keyword . "%')");
        }   
		if ($status != '') {
			$this->db->where('c.status',$status);
		}
		$this->db->where('c.client_id!=',1);

        if($limit!=''){
            $this->db->limit($limit, $start);
		}
        $websites = $this->db->get();
		
		
        $this->db->select('count(c.client_id) as ttl_rows');
        $this->db->from('clients as c');
        
        if ($search_keyword != '') {
            $this->db->where("(c.client_name LIKE '%" . $search_keyword . "%' OR c.email_id LIKE '%" . $search_keyword . "%' OR c.client_type LIKE '%" . $search_keyword . "%')");
        }
		if ($status != '') {
			$this->db->where('c.status',$status);
		}
		
		$this->db->where('c.client_id!=',1);
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_client($c_id) {
        $this->db->select('c.*,t.*,p.partner_name');
        $this->db->from('clients as c');
		$this->db->join('token_info as t', 't.client_id=c.client_id','left');
		$this->db->join('partners as p', 'p.partner_id=c.partner_id','left');
        $this->db->where('c.client_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	
	function get_station_id($c_id) {
        $this->db->select('station_id');
        $this->db->from('clients');
        $this->db->where('client_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['station_id'];
    }
	function get_buildings($c_id) {
        $this->db->select('');
        $this->db->from('building');
        $this->db->where('client_id', $c_id);
        $page = $this->db->get();
        return $page;
    }
	function update_client($client_id, $data) {
        if ($client_id != '') {
            $this->db->where('client_id', $client_id);
            $page = $this->db->update('clients', $data);
            return $page;
        }
        return false;
    }
	function update_token_data($client_id, $data) {
        if ($client_id != '') {
            $this->db->where('client_id', $client_id);
            $page = $this->db->update('token_info', $data);
            return $page;
        }
        return false;
    }
	
	function delete_client($client_id) {
		
        if ($client_id != '') {
            $this->db->where('client_id', $client_id);
            $page = $this->db->delete('clients');
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
        $this->db->where('status',1);
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
	function update_status($c_id,$data)
    {
        if(count($data)>0 && $c_id != ''){
            $this->db->where('client_id',$c_id);
            $res = $this->db->update('clients',$data);
            return $res;
        }
        return false;

    }
    
}