<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class Aurush extends MX_Controller {
	function __construct(){
		parent::__construct();
       // modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	

	
	
	function water(){
		
		
		
		$this->load->model('Aurush_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Aurush_data_model->get_devices_arush();
		$device_id=$this->input->post('category');
		$data['radio']=$this->input->post('report_type');
		$data['device']=$device_id;
		$device_data=$this->Aurush_data_model->get_devices_list_all(5,6);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Aurush_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Aurush_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		
	
			
		  
			// echo json_encode($waterleveldata);die();
		
		// if(isset($hardwares['Firepump']['hardaware_list'])){
		// 	for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
		// 		$firepumpdata[$hardwares['Firepump']['hardaware_list'][$i]['dashboard_name']]=$this->Aurush_data_model->get_hardwares_device_data_firepump($hardwares['Firepump']['hardaware_list'][$i]);
		// 	}
		// 	// echo json_encode($firepumpdata);die();

		// 	// echo json_encode($firepumpdata['Phase-2 Fire Pump System']['dg_data']);die();
		// 	$data['firepump_data']=$firepumpdata;
		// }
		
		//echo count($data['energy_meters_data']);
		// echo json_encode($data);die();
		
		if($this->input->post('fromdate') != null){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0]) && $device_id==41){
				$data['energy_meters_data']=$this->Aurush_data_model->get_hardwares_device_data_energy_meters($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
			}
			if(count($hardwares['Water Level']['hardaware_list'])>0 && $device_id==19){
				
				$data['waterlevel_data']=$this->Aurush_data_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
				// echo json_encode($data['waterlevel_data']);die();
			
				}
				if(count($hardwares['Water Meter']['hardaware_list'])>0 && $device_id==25){
					
					$data['watermeter_data']=$this->Aurush_data_model->get_hardwares_device_data_water_meters($hardwares['Water Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					
				}
				if(count($hardwares['Firepump']['hardaware_list'])>0 && $device_id==23){	 
				$data['pressure_data']=$this->Aurush_data_model->get_hardwares_device_data_firepump($hardwares['Firepump']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
				// echo json_encode($data['pressure_data']);die();
				}
						}else{
							$data['data']=array();
						}
						$this->load->view('aurush_reports_chennai',$data);
	}
	
	
	
	
	
}
