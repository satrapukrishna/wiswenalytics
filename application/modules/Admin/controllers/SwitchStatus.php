<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);


class SwitchStatus extends MX_Controller {
	function __construct(){
		parent::__construct();
        //modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	function getSwitchStatusIith(){
		$this->load->model('Api_data_model_new');
		$ctlObj = modules::load('AjaxCall/AjaxCall/');
		$ctlObj->truncateIITH();
		$ctlObj->getIITA7thFloor();
		$ctlObj->getIITBShaft1();
		$ctlObj->getIITA4thFloor();
		$ctlObj->getIITA1stFloor();
		$ctlObj->getIITBShaft2();
		$ctlObj->getIITBShaft3();
		$ctlObj->getIITCShaft1();
		$ctlObj->getIITCShaft2();
		$ctlObj->getIITMSME();
		//2024000091//A7thFloor
		//2024000086//BShaft1
		//2024000089//A4thfloor
		//2024000087//A1stFllor
		//2024000088//BShaft2
		//2024000092//BShaft3
		//2024000094//CShaft1
		//2024000093//CShaft2
		//2024000090//MSME
		$stations = array(2024000091,2024000086,2024000089,2024000087,2024000088,2024000092,2024000094,2024000093,2024000090);
		
			$switchdata=$this->Api_data_model_new->get_switch_data($stations);

		echo json_encode($switchdata);
		//SELECT * FROM `hardware_station_consumption_data_iith` WHERE StationId=2024000086 and UtilityName='Channel1' ORDER BY TxnTime DESC limit 1;


		

    }
	function getSwitchStatusHcug(){
		$this->load->model('Api_data_model_new');
		$ctlObj = modules::load('AjaxCall/AjaxCall/');
		$ctlObj->truncateHCUG();
		$ctlObj->getHCUGDataLiveStatus();
		$switchdata=$this->Api_data_model_new->get_switch_data_hcug();
		echo json_encode($switchdata);
	}
	
	
	
	
	
}
