<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alerts extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	public function index()
	
	{
		//modules::run('admin/site/auth','employee_view');
       
        $limit = 25;
        $start = $this->uri->segment(4);
        $this->load->model('Alert_model');
        $data['device'] = array('' => 'Select Device', '16' => 'Air', '18' => 'Energy', '17' => 'Water');
		
		$data['hardware'] = array('' => 'Select Solution');
		
        $web_options = array(
            'start' => $start,
            'limit' => $limit,
            'order' => 'asc',
            'sort' => 'page_name',
			'alert_type' => $this->input->get('alert_type'),
			'device' => $this->input->get('device'),
			'from_date' => $this->input->get('from_date'),
            'to_date' => $this->input->get('to_date'),
            'search_keyword' => $this->input->get('search_keyword')
        );
        $data_alerts = $this->Alert_model->get_alerts($web_options);
        //print_r($web_options);die();
        //print_r($data_alerts->result());die();
        $data['alerts'] = $data_alerts->result();
        $data['starting'] = $start;
        $data['limit'] = $limit;
        $config['total_rows'] = $data_alerts->ttl_rows;
        $config['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('Admin/Alerts/index');
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['suffix'] = '?' . http_build_query($_GET, '', "&");
		// echo $data['pagination'];exit;
		if($this->session->userdata('role')=='employee'){
        $this->load->view('alerts/alert_list', $data);
		}else{
        $this->load->view('alerts/alert_list_client', $data);
		}
          
    }
	
	function alert_detail($alert_id = ''){
		
        $this->load->model('Alert_model');       
		$data['alert'] = $this->Alert_model->get_alert($alert_id);
		$this->db->where('alert_id', $alert_id);
        $res = $this->db->update('alerts', array('alert_read'=>1));
		if($res){
			if($this->session->userdata('role')=='employee'){
			$this->load->view('alerts/alert_view', $data);
			}else{
			$this->load->view('alerts/alert_view_client', $data);
			}
		}
		
	}
	function gethardwares($device){
		$this->load->model('Alert_model');
        $device = $this->input->get('device');
        $content ='<option value="">  - Select Solution - </option>';
        if($device==16){
          $content .='<option value="ahu">ahu</option>';
          $content .='<option value="indoor">indoor air quality</option>';
          $content .='<option value="chillers">chillers</option>';
          $content .='<option value="cooling">cooling towers</option>';
		}elseif($device==18){
          $content .='<option value="energy meter">energy meter</option>';
          $content .='<option value="btu">but</option>';
          $content .='<option value="dg">dg</option>';
          $content .='<option value="ups">ups</option>';
          $content .='<option value="lpg">lpg</option>';
		}elseif($device==17){
          $content .='<option value="water level">water level</option>';
          $content .='<option value="line pressure">line pressure</option>';
          $content .='<option value="motor monitoring">motor monitoring</option>';
          $content .='<option value="water meter">water meter</option>';
          $content .='<option value="firepump">firepump</option>';
		}
        echo $content;
	}
	
}
