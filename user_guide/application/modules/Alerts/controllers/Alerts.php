<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alerts extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Alerts_model');
	}
	public function index()
	{
	 	//$data['myhomeData']=$this->Myhome_model->getMyhomeReport();
		//$this->load->view('domesticTankView');
	}
	public function getDeviceAlertData(){

	}
}
	?>