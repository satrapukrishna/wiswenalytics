<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //error_reporting(E_ALL);

class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
       // modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('Test_model');
		// $this->load->library('session');
	}
	function index(){
     //$this->load->model('Data_model');
	}
	public function waterQuality(){
		$this->load->view('water-quality');
	}
	public function testData(){
		echo "string";
		$this->load->model("Data_model");
		$this->Data_model->saveData();
	}
	function getDeviceData(){

		$this->load->model("Data_model");
		$data['data']=$this->Data_model->get_device_data();
		$this->load->view('water-quality',$data);

	}
	function reports(){
		$date=$this->input->post('fromdate');
		$this->load->model("Data_model");
		$data['data']=$this->Data_model->get_device_data_report($date);
		// print_r($data['data']);die();
		$this->load->view('reports',$data);

	}

}