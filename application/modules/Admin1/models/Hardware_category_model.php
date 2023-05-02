<?php
class Hardware_category_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_category($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('hardware_category', $data);
            return $res;
        }
        return false;
    }
	function insert_device($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('hardware_device', $data);
            return $res;
        }
        return false;
    }
	
	
	function get_hardware_category_dropdown() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        // $this->db->where('parent_id',0);
        $this->db->order_by('category_name');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
	
	function get_hardware_device_dropdown($category) {
        $this->db->select('device_id,device_name');
        $this->db->from('hardware_device');
        $this->db->where('category_id', $category);
        $this->db->order_by('device_name');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['device_id']] = $row['device_name'];
        }
        return $items;
    }
	
	function get_devices($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
	
	function get_hardware_category($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
		
		$this->db->select('hc.*');
        $this->db->from('hardware_category as hc');
		// $this->db->where('hc.parent_id',0);
		// $this->db->join('hardware_category as hcc', 'hcc.parent_id=hc.category_id','left');
        if ($search_keyword != '') {
            $this->db->where("(hc.category_name LIKE '%" . $search_keyword . "%')");
        }      

        if($limit!=''){
            $this->db->limit($limit, $start);
			}
		// $this->db->group_by('hc.category_id');
        $websites = $this->db->get();
		
		
        $this->db->select('count(hc.category_id) as ttl_rows');
		
        $this->db->from('hardware_category as hc');
		// $this->db->where('hc.parent_id',0);
		// $this->db->join('hardware_category as hcc', 'hcc.parent_id=hc.category_id','left');
       
       if ($search_keyword != '') {
            $this->db->where("(hc.category_name LIKE '%" . $search_keyword . "%')");
        }  
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_hardware_category1($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
		
		$this->db->select('hcc.*,hc.category_name');
        $this->db->from('hardware_device as hcc');
		// $this->db->where('hc.category_id',);
		$this->db->join('hardware_category as hc', 'hcc.category_id=hc.category_id','left');
        if ($search_keyword != '') {
            $this->db->where("(hcc.device_name LIKE '%" . $search_keyword . "%')");
        }      

        if($limit!=''){
            $this->db->limit($limit, $start);
			}
		// $this->db->group_by('hc.category_id');
        $websites = $this->db->get();
		
		
        $this->db->select('count(hcc.device_id) as ttl_rows');
		$this->db->from('hardware_device as hcc');
		// $this->db->where('hc.category_id',);
		$this->db->join('hardware_category as hc', 'hcc.category_id=hc.category_id','left');
       
       if ($search_keyword != '') {
            $this->db->where("(hcc.device_name LIKE '%" . $search_keyword . "%')");
        }  
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	function get_category($c_id) {
        $this->db->select('');
        $this->db->from('hardware_category');
        $this->db->where('category_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	function get_device($d_id) {
        $this->db->select('');
        $this->db->from('hardware_device');
        $this->db->where('device_id', $d_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	function update_category($c_id, $data) {
        if ($c_id != '') {
            $this->db->where('category_id', $c_id);
            $page = $this->db->update('hardware_category', $data);
            return $page;
        }
        return false;
    }
	function update_device($d_id, $data) {
        if ($d_id != '') {
            $this->db->where('device_id', $d_id);
            $page = $this->db->update('hardware_device', $data);
            return $page;
        }
        return false;
    }
	function delete_category($category_id) {
		
        if ($category_id != '') {
            $this->db->where('category_id', $category_id);
            $page = $this->db->delete('hardware_category');
			
			$this->db->where('category_id', $category_id);
            $page1 = $this->db->delete('hardware_device');
			
			$this->db->where('hardware_category', $category_id);
            $page1 = $this->db->delete('hardware');
            return $page;
        }

        return false;
    }
	
	function delete_device($device_id) {
		
        if ($device_id != '') {
            $this->db->where('device_id', $device_id);
            $page = $this->db->delete('hardware_device');
			
			$this->db->where('hardware_device', $device_id);
            $page1 = $this->db->delete('hardware');
            return $page;
        }

        return false;
    }
}