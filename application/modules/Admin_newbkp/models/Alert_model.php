<?php
class Alert_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function get_alerts($web_options) {
		// echo "<pre>";print_r($this->session->userdata('user_id'));exit;
        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
        $alert_type = $web_options['alert_type'];
        $device = $web_options['device'];
        $from_date = $web_options['from_date'];
        $to_date = $web_options['to_date'];
		$from = ($from_date) ? date('Y-m-d 00:00:00',strtotime($from_date)) : '';
        $to = ($to_date) ? date('Y-m-d 23:59:59',strtotime($to_date)) : '';
        // exit;
		
		$this->db->select('a.*,hd.device_name,f.pump_name as hardware_name');
        $this->db->from('alerts as a');
		$this->db->join('hardware_device as hd', 'hd.device_id=a.hardware_device','left');
		$this->db->join('firepump as f', 'f.hardware_id=a.hardware_id','left');
		if($this->session->userdata('role')=='employee'){
        $this->db->where('a.client_id',$this->session->userdata('created_by'));     
		}else{
		$this->db->where('a.client_id',$this->session->userdata('user_id'));
		}
        if ($search_keyword != '') {
            $this->db->where("(a.alert_name LIKE '%" . $search_keyword . "%' OR a.alert_message LIKE '%" . $search_keyword . "%' OR hd.device_name LIKE '%" . $search_keyword . "%' OR f.pump_name LIKE '%" . $search_keyword . "%' OR a.alert_type LIKE '%" . $search_keyword . "%')");
        } 
		if($alert_type!=''){
            $this->db->where('a.alert_type', $alert_type);
		}
        if($device!=''){
            $this->db->where('a.hardware_device', $device);
        }
		if($from!= ''){
            $this->db->where("a.created_date >= ",$from);
        }
        if($to!= ''){
            $this->db->where("a.created_date <= ",$to);
        }
        if($limit!=''){
            $this->db->limit($limit, $start);
		}
        
       // $order = sprintf('FIELD(a.alert_read, %s)', 1);
        //$order = sprintf('FIELD(a.alert_read, %s)', implode(', ', $id));
        $this -> db -> order_by('a.created_date', 'DESC', FALSE);
       // $this -> db -> order_by('FIELD ( a.alert_read,  1 )', 'ASC', FALSE);

        //$this -> db -> order_by("FIELD ( a.alert_read, 1 )");
        //$this -> db -> order_by($order);

		//$this->db->order_by('FIELD(a.alert_id,1)');
       // $this -> db -> order_by(FIELD ( 'a.alert_read', 1 ),'DESC');

        //$this->db->order_by_field('a.alert_read','DESC');
        $websites = $this->db->get();
		 //echo $this->db->last_query();exit;
		
        $this->db->select('count(a.alert_id) as ttl_rows');
        $this->db->from('alerts as a');
		$this->db->join('hardware_device as hd', 'hd.device_id=a.hardware_device','left');
		$this->db->join('firepump as f', 'f.hardware_id=a.hardware_id','left');
        if($this->session->userdata('role')=='employee'){
        $this->db->where('a.client_id',$this->session->userdata('created_by'));     
		}else{
		$this->db->where('a.client_id',$this->session->userdata('user_id'));
		}
		
        if ($search_keyword != '') {
            $this->db->where("(a.alert_name LIKE '%" . $search_keyword . "%' OR a.alert_message LIKE '%" . $search_keyword . "%' OR hd.device_name LIKE '%" . $search_keyword . "%' OR f.pump_name LIKE '%" . $search_keyword . "%')");
        } 
		if($alert_type!=''){
            $this->db->where('a.alert_type', $alert_type);
		}
        if($device!=''){
            $this->db->where('a.hardware_device', $device);
        }
		if($from != ''){
            $this->db->where("a.created_date >= ",$from);
        }
        if($to != ''){
            $this->db->where("a.created_date <= ",$to);
        }
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_alert($alert_id) {
        $this->db->select('a.*,hd.device_name,f.pump_name as hardware_name');
        $this->db->from('alerts as a');
		$this->db->join('hardware_device as hd', 'hd.device_id=a.hardware_device','left');
		$this->db->join('firepump as f', 'f.hardware_id=a.hardware_id','left');
        $this->db->where('a.alert_id', $alert_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
    function get_water_meter_alert($alert_id) {
        $this->db->select('a.*,hd.device_name,f.pump_name as hardware_name');
        $this->db->from('water_meter_alerts as a');
		$this->db->join('hardware_device as hd', 'hd.device_id=a.hardware_device','left');
		$this->db->join('firepump as f', 'f.hardware_id=a.hardware_id','left');
        $this->db->where('a.alert_id', $alert_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	
    
}