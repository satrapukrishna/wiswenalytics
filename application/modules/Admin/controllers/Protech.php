<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);


class Protech extends MX_Controller {
	function __construct(){
		parent::__construct();
	}
	function airquality(){
		$this->load->model('Protech_data_model');
		$device_data=$this->Protech_data_model->get_devices_list(3);
		
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Protech_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Protech_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		// echo json_encode($hardwares);die();
			
		  if(count($hardwares['Indoor Air Quality']['hardaware_list'])>0){
				for ($i=0; $i <count($hardwares['Indoor Air Quality']['hardaware_list']) ; $i++) { 
					$iagdata[$i]=$this->Protech_data_model->get_hardwares_device_data_iaq($hardwares['Indoor Air Quality']['hardaware_list'][$i]);
				}
				// echo json_encode($iagdata);die();	
			$data['iaq_data']=$iagdata;
			}
		$this->load->view('air_quality_video',$data);
	}
	
	
	
	
	
	
}
