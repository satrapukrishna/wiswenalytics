<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class Device extends MX_Controller {
	function __construct(){
		parent::__construct();
       
	}
	public function index(){
		$this->load->model('Device_model');
		$data['chennai']=$this->Device_model->get_chennai_data('hardware_station_consumption_data_chennai');
		$data['mumbai']=$this->Device_model->get_mumbai_data('hardware_station_consumption_data_mumbai');
		$data['apollo']=$this->Device_model->get_apollo_data('hardware_station_consumption_data_apollo');
		
		//$this->load->view('Dashboard',$data);
		echo json_encode($data);
	}
	
}
?>