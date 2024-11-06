<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);


class SwitchUpdate extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	function updateAhu(){
        $this->load->model('Switch_update_model');
        //$meter = $this->input->get('meter');
		//$location = $this->input->get('location');
		$temp = $this->input->get('temp');
		$switch_id = $this->input->get('sid');
		//echo $switch_id;die();
		$temp_data="V01#+".$temp;
		$ahu_data = array(
			'set_temp' => $temp,
			'updated_date'=>date('Y-m-d H:i:s')		
		);
		
		
		$datachennai = array("StoreCode" => "0024", "UserId" => "Wenalytics","SwitchId" => 1,"ActiveInput"=>1,"ValueStr"=>$temp_data,"Type"=>"CMU");
		// echo json_encode($dataMumbai); die();    
		$tokenData=  $this->Switch_update_model->getToken("lonavala");
		
		$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ControlsConfigData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	//  echo json_encode($json_chennai);die();
		$status = $this->Switch_update_model->update_temp($switch_id,$ahu_data);  
		if($status==1){
			$msg="success";
		}else{
$msg="failed";
			
		}
		return $msg;
    }
	
	
	
	
	
}
