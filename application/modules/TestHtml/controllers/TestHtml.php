<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class TestHtml extends MX_Controller {
	function __construct(){
		parent::__construct();
       
	}
	public function index(){
		//$this->load->model('Device_model');
		//$data['apollo']=$this->Device_model->get_apollo_data();
		//$data['jll']=$this->Device_model->get_jll_data();
		//$data['myhome']=$this->Device_model->get_myhome_data();
		$this->load->view('01-Login');
	}
	
}
?>