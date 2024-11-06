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
    function insert_device1($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('hardware_device1', $data);
            return $res;
        }
        return false;
    }
	
	
	function get_hardware_category_dropdown() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        // $this->db->where('category_id!=',3);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
	function get_hardware_category_dropdown_demo() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[5,6,10]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_chennai() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[5,6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_vega() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[4,6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_undp() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_hcug() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[10]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_rsbro() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_rainbow() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[4,5,6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_rainbow_tab() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_rainbow_graph() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[4,5,6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_lona() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[5,6]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_mumbai() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[5,10]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['category_id']] = $row['category_name'];
        }
        return $items;
    }
    function get_hardware_category_dropdown_iit() {
        $this->db->select('category_id,category_name');
        $this->db->from('hardware_category');
        $this->db->where_in('category_id',[11]);
        $this->db->where('status',1);
        $this->db->order_by('category_id');
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
		$this->db->where('status',1);
        $this->db->order_by('device_name');
		//$this->db->limit(1);
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
        $this->db->where('device_id!=',3);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
	function get_devices_demo($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[19,30,28,34,36,35,37,38]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_rainbow($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[16,19,41]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        // echo $this->db->last_query();exit; 
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_chennai($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[41,19,28,35,25,51,20,27,26,57,58]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_vega($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[16,41,19,35,25,51,20,27,26,57,58]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_chennai_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[41,28,35,25,20,27,26]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_vega_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[41]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_rainbow_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[41]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_lona($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[19,28,34,35]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_mumbai($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[19]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_iit($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[40]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_hcug($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[37]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_rsbro($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[28]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_lona_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[28,34,35]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_mumbai_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[35,25]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_iit_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[40]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_hcug_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[37]);
        $this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    function get_devices_rsbro_tab($category){
		$this->db->select('device_id as id,device_name as name');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
        $this->db->where_in('device_id',[28]);
        $this->db->where('status',1);
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
		$status = $web_options['status'];
		$this->db->select('hc.*');
        $this->db->from('hardware_category as hc');
		// $this->db->where('hc.parent_id',0);
		// $this->db->join('hardware_category as hcc', 'hcc.parent_id=hc.category_id','left');
        if ($search_keyword != '') {
            $this->db->where("(hc.category_name LIKE '%" . $search_keyword . "%')");
        }    
		if ($status != '') {
			$this->db->where('hc.status',$status);
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
		if ($status != '') {
			$this->db->where('hc.status',$status);
		}
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_hardware_category1($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $status = $web_options['status'];
		
		$this->db->select('hcc.*,hc.category_name');
        $this->db->from('hardware_device as hcc');
		// $this->db->where('hc.category_id',);
		$this->db->join('hardware_category as hc', 'hcc.category_id=hc.category_id','left');
        if ($search_keyword != '') {
            $this->db->where("(hcc.device_name LIKE '%" . $search_keyword . "%')");
        } 
		if ($status != '') {
			$this->db->where('hcc.status',$status);
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
		if ($status != '') {
			$this->db->where('hcc.status',$status);
		}
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
    function get_hardware_category_demo($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $status = $web_options['status'];
		
		$this->db->select('hcc.*,hc.category_name');
        $this->db->from('hardware_device1 as hcc');
		// $this->db->where('hc.category_id',);
		$this->db->join('hardware_category as hc', 'hcc.category_id=hc.category_id','left');
        if ($search_keyword != '') {
            $this->db->where("(hcc.device_name LIKE '%" . $search_keyword . "%')");
        } 
		if ($status != '') {
			$this->db->where('hcc.status',$status);
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
		if ($status != '') {
			$this->db->where('hcc.status',$status);
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
        $this->db->select('hd.*,hc.category_name');
        $this->db->from('hardware_device as hd');
		$this->db->join('hardware_category as hc', 'hd.category_id=hc.category_id','left');
        $this->db->where('hd.device_id', $d_id);
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
	function update_status($c_id,$data)
    {
        if(count($data)>0 && $c_id != ''){
            $this->db->where('category_id',$c_id);
            $res = $this->db->update('hardware_category',$data);
            return $res;
        }
        return false;

    }
	function update_status1($d_id,$data)
    {
        if(count($data)>0 && $d_id != ''){
            $this->db->where('device_id',$d_id);
            $res = $this->db->update('hardware_device',$data);
            return $res;
        }
        return false;

    }
    function get_hardware(){
		$this->db->select('hardware_id as id,dashboard_name as name');
        $this->db->from('hardware');        
        
        $this->db->where('hardware_device', 25);
       
        
        $this->db->where('client_id',$this->session->userdata('created_by'));
        $this->db->where('status',1);
        $this->db->order_by('dashboard_name');
        $res = $this->db->get();
        $items = array();
        foreach ($res->result_array() as $row) {
            $items[$row['id']] = $row['name'];
        }
        return $items;
	}
    
}