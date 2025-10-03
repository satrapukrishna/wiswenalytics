<?php
header("Access-Control-Allow-Origin: *");
ini_set('memory_limit', '-1');
date_default_timezone_set("Asia/Calcutta"); 

class AjaxCall extends MX_Controller
{
	function __construct(){

		parent::__construct();
		$this->load->model('Api_model');
		$this->load->library('curl');
		
	}


	public function index()
	{
		
	}
function getJLLTokenGenerate()
{
	    

		$ch = curl_init('https://protechservice.in/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=Fairmont12&password=manohar123");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		$this->Api_model->saveToken($json,"jll");

		//print_r($json);

}
function getApolloTokenGenerate()
{
	    

		$ch = curl_init('https://protechservice.in/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=Apollohspt&password=manohar123");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		$this->Api_model->saveToken($json,"apollo");

		//print_r($json);Apollohspt

}
function getMyhomeTokenGenerate()
{
	    

		$ch = curl_init('https://protechservice.in/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=Myhomes123&password=manohar123");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		$this->Api_model->saveToken($json,"myhome");

		//print_r($json);

}
function getCBRETokenGenerate()
{
	    

		$ch = curl_init('https://protechservice.in/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=CBREindia1&password=manohar123");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		$this->Api_model->saveToken($json,"cbre");

		//print_r($json);

}
function getLonavalaTokenGenerate()
{
	  // echo "kkk"; 

		$ch = curl_init('https://protechservice.in/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=Wenalytics&password=wenalytics123%");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
				// echo json_encode($json);die();
		$this->Api_model->saveToken($json,"lonavala");

		// print_r($json);

}
function getLonavalaTokenGenerate_ssl()
{
	  // echo "kkk"; 

		$ch = curl_init('https://protechservice.in/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=Wenalytics&password=wenalytics123%");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		$this->Api_model->saveToken($json,"lonavala");

		// print_r($json);

}
function truncateHCUG(){
	
	
	$this->Api_model->trunHCUG();
	
}
function truncateHCUG36(){
	
	
	$this->Api_model->trunHCUG36();
	
}
function getHCUGDataLiveStatus(){
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "HCUG", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiHCUGStatus($json_chennai);
	
}
function getHCUG36DataLiveStatus(){
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0036", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiHCUG36Status($json_chennai);
	
}
function getHCUGDataLiveStatus_day(){
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "HCUG", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiHCUGStatus_day($json_chennai);
	
}
function getHCUG36DataLiveStatus_day(){
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0036", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiHCUG0036Status_day($json_chennai);
	
}

function truncateHCUGDay(){
	
	
	$this->Api_model->trunHCUGDay();
	
}
function truncateIITH(){
	
	
	$this->Api_model->trunIITH();
	
}
function getIITA7thFloor(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0037", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITBShaft1(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0038", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITA4thFloor(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0039", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITA1stFloor(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0040", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITBShaft2(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0041", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITBShaft3(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0042", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITCShaft1(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0043", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}

function getIITCShaft2(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0044", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}
function getIITMSME(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0045", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiIITH($json_chennai);
	
}

function getApolloData(){
	    $today=date("d/m/Y");
	   //$today=date("02/09/2021");	 
		$dataapollo = array("StoreCode" => "AH01", "QueryDate" => $today,"UserId" => "Apollohspt","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("apollo");
		 
		$token= $tokenData['token'];  
		                                                      
		$data_string_apollo = json_encode($dataapollo);                                                                                                              
		$ch_apolllo = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
		                                                                      
		curl_setopt($ch_apolllo, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_apolllo, CURLOPT_POSTFIELDS, $data_string_apollo);                                                                  
		curl_setopt($ch_apolllo, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_apolllo, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_apollo = curl_exec($ch_apolllo);
		curl_close($ch_apolllo);

		$json_apollo = json_decode($result_apollo, true);
		$this->Api_model->pushApiDataApollo($json_apollo);
}
function getLonavalaData(){
	$today=date("d/m/Y");
  // $today=date("01/07/2021");	 
	$datalonavala = array("StoreCode" => "0001", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_lonavala = json_encode($datalonavala);                                                                                                              
	$ch_lonavala = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_lonavala, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_lonavala, CURLOPT_POSTFIELDS, $data_string_lonavala);                                                                  
	curl_setopt($ch_lonavala, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_lonavala, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_lonavala = curl_exec($ch_lonavala);
	curl_close($ch_lonavala);
	$json_lonavala = json_decode($result_lonavala, true);
	$this->Api_model->pushApiDataLonavala($json_lonavala);
}
function getVegaschoolData(){
	
	$yesterDay = date('d/m/Y',strtotime("-1 days"));
	  
					$datachennai = array("StoreCode" => "0024", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
					$tokenData=  $this->Api_model->getToken("lonavala");
					
					$token= $tokenData['token'];  
																		
					$data_string_chennai = json_encode($datachennai);                                                                                                              
					$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																						
					curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
					curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
					curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
						'Content-Type: application/json',                                                                                
						'Authorization: Bearer '.$token.''                                                                       
					));  
					$result_chennai = curl_exec($ch_chennai);
					curl_close($ch_chennai);
					$json_chennai = json_decode($result_chennai, true);
					$this->Api_model->pushApiDataVegaschool($json_chennai);
				
	//$yesterDay=date("03/01/2023");	
	
	
}
function getVegaschoolData_dates(){
	
	// $yesterDay = date('d/m/Y',strtotime("-1 days"));
	   $date_from = strtotime("2025-03-26"); 
        $date_to = strtotime("2025-03-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
					$yesterDay = date('d/m/Y',strtotime($datesarray[$k]));
					$datachennai = array("StoreCode" => "0024", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
					$tokenData=  $this->Api_model->getToken("lonavala");
					
					$token= $tokenData['token'];  
																		
					$data_string_chennai = json_encode($datachennai);                                                                                                              
					$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																						
					curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
					curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
					curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
						'Content-Type: application/json',                                                                                
						'Authorization: Bearer '.$token.''                                                                       
					));  
					$result_chennai = curl_exec($ch_chennai);
					curl_close($ch_chennai);
					$json_chennai = json_decode($result_chennai, true);
					$this->Api_model->pushApiDataVegaschool($json_chennai);
				}
	//$yesterDay=date("03/01/2023");	
	
	
}
function getVegaschoolData_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "0024", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataVegaschoolLive($json_chennai);
	
}
function getUNDP_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNDP", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getTerotamDataLive(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "GMAG", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushTerotamDataLive($json_chennai);
	
}
function getUNDPDates(){

	$date_from = strtotime("2025-03-27"); 
	$date_to = strtotime("2025-03-31"); 
	$datesarray=array();
	
	
	for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
	{
	  array_push($datesarray, date("Y-m-d",$i1));  
	}
	for ($k=0; $k < count($datesarray); $k++)
			{ 
				$yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 
				// $yesterDay = date("26/05/202");	
				$datachennai = array("StoreCode" => "UNSG", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
				$tokenData=  $this->Api_model->getToken("lonavala");
				
				$token= $tokenData['token'];  
																	
				$data_string_chennai = json_encode($datachennai);                                                                                                              
				$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																					
				curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
				curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
				curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
					'Content-Type: application/json',                                                                                
					'Authorization: Bearer '.$token.''                                                                       
				));  
				$result_chennai = curl_exec($ch_chennai);
				curl_close($ch_chennai);
				$json_chennai = json_decode($result_chennai, true);
				// print_r($json_chennai);die();
				$this->Api_model->pushApiDataUNDPdates($json_chennai);
			}

	
	
}
function getUNDP(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNDP", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getUNCW_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNCW", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getUNCW(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNCW", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getUNEW_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNEW", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getUNEW(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNEW", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getUNFF_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNFF", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getUNFF(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNFF", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getUNWW_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNWW", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getUNWW(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNWW", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getUNSG_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNSG", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getUNSG(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNSG", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getUNAB_live(){
	
	$today=date("d/m/Y");
	$datachennai = array("StoreCode" => "UNAB", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataUNDPLive($json_chennai);
	
}
function getUNAB(){
	$yesterDay = date('d/m/Y',strtotime("-1 days")); 
	// $yesterDay = date("26/05/202");	
	$datachennai = array("StoreCode" => "UNAB", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataUNDP($json_chennai);
	
}
function getChennaiData(){
	
	$today=date("d/m/Y");
	// $today=date("01/07/2021");	
	$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	$this->Api_model->pushApiDataChennai($json_chennai);
	
}
function getChennaiDataDates(){
	$date_from = strtotime("2023-11-22"); 
	$date_to = strtotime("2023-11-25"); 
	$datesarray=array();
	
	
	for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
	{
	  array_push($datesarray, date("Y-m-d",$i1));  
	}
	// print_r($datesarray);die();
	for ($k=0; $k < count($datesarray); $k++)
			{ 
  $yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 
	$datachennai = array("StoreCode" => "0002", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->pushApiDataChennaiDates($json_chennai);
}
	
}

function getChennaiDataLive(){
	//$today=date("d/m/Y");
    $today=date("01/09/2022");	 
	$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	$this->Api_model->pushApiDataChennaiLive($json_chennai);
	
}
function getMumbaiData(){
	$today=date("d/m/Y");
  // $today=date("01/07/2021");	 
	$dataMumbai = array("StoreCode" => "0003", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_mumbai = json_encode($dataMumbai);                                                                                                              
	$ch_mumbai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_mumbai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_mumbai, CURLOPT_POSTFIELDS, $data_string_mumbai);                                                                  
	curl_setopt($ch_mumbai, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_mumbai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_mumbai = curl_exec($ch_mumbai);
	curl_close($ch_mumbai);
	$json_mumbai = json_decode($result_mumbai, true);
	$this->Api_model->pushApiDataMumbai($json_mumbai);
}
function getMumbaiDataLive(){
	$today=date("d/m/Y");
  // $today=date("01/07/2021");	 
	$dataMumbai = array("StoreCode" => "0003", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_mumbai = json_encode($dataMumbai);                                                                                                              
	$ch_mumbai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_mumbai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_mumbai, CURLOPT_POSTFIELDS, $data_string_mumbai);                                                                  
	curl_setopt($ch_mumbai, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_mumbai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_mumbai = curl_exec($ch_mumbai);
	curl_close($ch_mumbai);
	$json_mumbai = json_decode($result_mumbai, true);
	$this->Api_model->pushApiDataMumbaiLive($json_mumbai);
}
function getRainbowVikrampuriData(){
	$today=date("d/m/Y");
//   $today=date("26/03/2022");	 
	$datachennai = array("StoreCode" => "0004", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->getRainbowVikrampuriData($json_chennai);
	
}
function getRainbowKondapurData(){
	$today=date("d/m/Y");
  // $today=date("26/03/2022");	 
	$datachennai = array("StoreCode" => "0005", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->getRainbowKondaData($json_chennai);
	
}

function getWrlCollectorData_day(){
	// $today=date("d/m/Y");
  $today=date("04/05/2022");	 
	$datachennai = array("StoreCode" => "0006", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->getCollectorData_day($json_chennai);
	// $this->Api_model->getCollectorData_live($json_chennai);
	
}
function getJntu_day(){
	// $today=date("d/m/Y");
    $today=date("30/08/2024");	 
	$datachennai = array("StoreCode" => "JNTU", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->getJNTUData_day($json_chennai);
	// $this->Api_model->getCollectorData_live($json_chennai);
	
}
function getJntu_Live(){
	$today=date("d/m/Y");
  //$today=date("21/04/2022");	 
	$datachennai = array("StoreCode" => "JNTU", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	$this->Api_model->getJNTUData_live($json_chennai);
	
}
function getWrlJpnagarData_day(){
	//$today=date("d/m/Y");
  $today=date("04/05/2022");	 
	$datachennai = array("StoreCode" => "0007", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	// print_r($json_chennai);die();
	// $this->Api_model->getjpnagarData_live($json_chennai);
	$this->Api_model->getjpnagarData_day($json_chennai);
	
}
function getChennaiData_watermeter(){
	//$today=date("d/m/Y");
   $today=date("25/04/2021");	 
	$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	 //echo json_encode($json_chennai);die();
	$this->Api_model->pushApiDataChennai_watermeter($json_chennai);
	
}
function getChennaiData_day(){
	$today=date("d/m/Y");
  // $today=date("01/07/2021");	 
	$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	$this->Api_model->pushApiDataChennai_day($json_chennai);
	
}
function getChennaiData_ssl(){
	//$today=date("d/m/Y");
  $today=date("28/12/2021");	 
	$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN","FromTime"=>"00:00:00",	"ToTime"=>"01:00:00",	"MeterName"=> "Electricity",	"Parameter"=> "kWh");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	
	$token= $tokenData['token'];  
														  
	$data_string_chennai = json_encode($datachennai);                                                                                                              
	$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);   
	curl_setopt($ch_chennai,CURLOPT_SSL_VERIFYPEER, false);                                                               
	curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
	curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_chennai = curl_exec($ch_chennai);
	curl_close($ch_chennai);
	$json_chennai = json_decode($result_chennai, true);
	echo json_encode($json_chennai);
	//$this->Api_model->pushApiDataChennai($json_chennai);
}

function getMumbaiData_day(){
	// $today=date("d/m/Y");
  $today=date("29/04/2024");	 
	$dataMumbai = array("StoreCode" => "0003", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_mumbai = json_encode($dataMumbai);                                                                                                              
	$ch_mumbai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_mumbai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_mumbai, CURLOPT_POSTFIELDS, $data_string_mumbai);                                                                  
	curl_setopt($ch_mumbai, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_mumbai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_mumbai = curl_exec($ch_mumbai);
	curl_close($ch_mumbai);
	$json_mumbai = json_decode($result_mumbai, true);
	$this->Api_model->pushApiDataMumbai_day($json_mumbai);
}
function getMumbaiData_towerb(){
	// $today=date("d/m/Y");
   $today=date("21/02/2023");	 
	$dataMumbai = array("StoreCode" => "0003", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_mumbai = json_encode($dataMumbai);                                                                                                              
	$ch_mumbai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_mumbai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_mumbai, CURLOPT_POSTFIELDS, $data_string_mumbai);                                                                  
	curl_setopt($ch_mumbai, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_mumbai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_mumbai = curl_exec($ch_mumbai);
	curl_close($ch_mumbai);
	$json_mumbai = json_decode($result_mumbai, true);
	$this->Api_model->pushApiDataMumbai_towerb($json_mumbai);
}
function getMumbaiData_towerb_prev(){
	$today=date("d/m/Y");
//    $today=date("06/01/2022");	 
	$dataMumbai = array("StoreCode" => "0003", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
	$tokenData=  $this->Api_model->getToken("lonavala");
	 
	$token= $tokenData['token'];  
														  
	$data_string_mumbai = json_encode($dataMumbai);                                                                                                              
	$ch_mumbai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																		  
	curl_setopt($ch_mumbai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch_mumbai, CURLOPT_POSTFIELDS, $data_string_mumbai);                                                                  
	curl_setopt($ch_mumbai, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch_mumbai, CURLOPT_HTTPHEADER, array(                                                                          
		 'Content-Type: application/json',                                                                                
		 'Authorization: Bearer '.$token.''                                                                       
	));  
	$result_mumbai = curl_exec($ch_mumbai);
	curl_close($ch_mumbai);
	$json_mumbai = json_decode($result_mumbai, true);
	$this->Api_model->pushApiDataMumbai_towerb_prev($json_mumbai);
}
function getCBREData(){
	    $today=date("d/m/Y");
	   // echo $today;die();
	   //$today=date("22/01/2020");	 
		
		$data_cbre = array("StoreCode" => "CB03", "QueryDate" => $today,"UserId" => "CBREindia1","Type" => "TXN");   
		$tokenData=  $this->Api_model->getToken("cbre");
		 
		$token= $tokenData['token'];  
		                                                      
		$data_string_cbre = json_encode($data_cbre);                                                                                                              
		$ch_cbre = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
		                                                                      
		curl_setopt($ch_cbre, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_cbre, CURLOPT_POSTFIELDS, $data_string_cbre);                                                                  
		curl_setopt($ch_cbre, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_cbre, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_cbre = curl_exec($ch_cbre);
		curl_close($ch_cbre);
		$json_cbre = json_decode($result_cbre, true);
		// print_r($json_cbre);die()
		$this->Api_model->pushCBREApiData($json_cbre);
}

function getJLLData()
{
	    $today=date("d/m/Y");
	     //$today=date("27/01/2020");	 
		$data_jll = array("StoreCode" => "JLL1", "QueryDate" => $today,"UserId" => "Fairmont12","Type" => "TXN");    
		$tokenData=  $this->Api_model->getToken("jll");
		 
		$token= $tokenData['token'];  
		                                                      
		$data_string_jll = json_encode($data_jll);                                                                                                              
		$ch_jll = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
		                                                                      
		curl_setopt($ch_jll, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_jll, CURLOPT_POSTFIELDS, $data_string_jll);                                                                  
		curl_setopt($ch_jll, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_jll, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_jll = curl_exec($ch_jll);
		curl_close($ch_jll);
		$json_jll = json_decode($result_jll, true);
		// print_r($json_jll);die();
		$this->Api_model->pushJLLApiData($json_jll);
}
function getSamsungData()
{
	    $today=date("d/m/Y");
	     //$today=date("03/02/2020");	 
		$data_smsg = array("StoreCode" => "CB01", "QueryDate" => $today,"UserId" => "CBREindia1","Type" => "TXN");      
		$tokenData=  $this->Api_model->getToken("cbre");
		 
		$token= $tokenData['token'];    
		                                                      
		$data_string_smsg = json_encode($data_smsg);                                                                                                              
		$ch_smsg = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
		                                                                      
		curl_setopt($ch_smsg, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_smsg, CURLOPT_POSTFIELDS, $data_string_smsg);                                                                  
		curl_setopt($ch_smsg, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_smsg, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_smsg = curl_exec($ch_smsg);
		curl_close($ch_smsg);
		$json_smsg = json_decode($result_smsg, true);
		$this->Api_model->pushClientApiDataSamsung($json_smsg);
}
function getMyHomeData(){
		$today=date("d/m/Y");	
		 //$today=date("01/01/2020");	
		$data_myhome = array("StoreCode" => "MH01", "QueryDate" => $today,"UserId" => "Myhomes123","Type" => "TXN"); 
		$tokenData=  $this->Api_model->getToken("myhome");
		   
		$token= $tokenData['token']; 
		                                                                   
		$data_string_myhome = json_encode($data_myhome);                                                                                               
		$ch_myhome = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');                                                                      
		curl_setopt($ch_myhome, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_myhome, CURLOPT_POSTFIELDS, $data_string_myhome);                                                                  
		curl_setopt($ch_myhome, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_myhome, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));                                                                                                                  
		                                                                                                                     
		$result_myhome = curl_exec($ch_myhome);
		curl_close($ch_myhome);
		$json_myhome = json_decode($result_myhome, true);
		//print_r($json_myhome);die();
		$this->Api_model->pushMyhomeData($json_myhome);		

}
function getSodexoData(){
//
		$today=date("d/m/Y");
		 //$today=date("04/02/2020");
		$data_sodexo = array("FromDate" => $today, "ToDate" => $today,"QueryId" => "SO01", "UserId" => "Factory123","Type"=>"YC");
	
		$tokenData=  $this->Api_model->getToken();
		  
		$token= $tokenData['token'];  
		                                                                   
		$data_string_sodexo = json_encode($data_sodexo);                                                                                                        
		$ch_sodexo = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');                                                                      
		curl_setopt($ch_sodexo, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_sodexo, CURLOPT_POSTFIELDS, $data_string_sodexo);                                                                  
		curl_setopt($ch_sodexo, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_sodexo, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));                                                                                                                     
		$result_sodexo = curl_exec($ch_sodexo);
		curl_close($ch_sodexo);
		$json_sodexo = json_decode($result_sodexo, true);
		$this->Api_model->pushSodexoData($json_sodexo);
		
		

	}
function getCyberData(){
//
		$today=date("d/m/Y");
		 // $today=date("24/05/2020");
		
		$data_cyber = array("StoreCode" => "CB02", "QueryDate" => $today,"UserId" => "CBREindia1","Type" => "TXN"); 
	
		$tokenData=  $this->Api_model->getToken("cbre");
		  
		$token= $tokenData['token'];  
		                                                                   
		$data_string_cyber = json_encode($data_cyber);                                                                                                        
		$ch_cyber = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');                                                                      
		curl_setopt($ch_cyber, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_cyber, CURLOPT_POSTFIELDS, $data_string_cyber);                                                                  
		curl_setopt($ch_cyber, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch_cyber, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));                                                                                                                     
		$result_cyber = curl_exec($ch_cyber);
		curl_close($ch_cyber); 
		$json_cyber = json_decode($result_cyber, true);
		$this->Api_model->pushCyberSpaceData($json_cyber);
		
		

	}
	function getAPIData(){
		
	    $today=date("d/m/Y");
		
		$this->db->select('client_id,store_code,token_username');
        $this->db->from('token_info');        
        $this->db->order_by('client_id');
        $clients = $this->db->get();   
		
        foreach($clients->result() as $c)
        {
			$data_client = array("StoreCode" => $c->store_code, "QueryDate" => $today,"UserId" => $c->token_username,"Type" => "TXN");   
			$tokenData=  $this->Api_model->getClientToken($c->client_id);
			 
			$token= $tokenData['token'];  
																  
			$data_string_client = json_encode($data_client);                                                                                                              
			$ch_client = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																				  
			curl_setopt($ch_client, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch_client, CURLOPT_POSTFIELDS, $data_string_client);                                                                  
			curl_setopt($ch_client, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch_client, CURLOPT_HTTPHEADER, array(                                                                          
				 'Content-Type: application/json',                                                                                
				 'Authorization: Bearer '.$token.''                                                                       
			));  
			$result_client = curl_exec($ch_client);
			curl_close($ch_client);
			$json_client = json_decode($result_client, true);
			// print_r($json_cbre);die()
			$this->Api_model->pushClientApiData($json_client);			
		}
		
	}
	function getApiAlertsData(){
		
	    $today=date("d/m/Y");
		
		$this->db->select('client_id,store_code,token_username');
        $this->db->from('token_info');      
        $this->db->where('client_id',9);  
        $this->db->order_by('client_id');
        $clients = $this->db->get();   
		//print_r($clients->result());die();
        foreach($clients->result() as $c)
        {
			$data_client = array("StoreCode" => $c->store_code, "QueryDate" => $today,"UserId" => $c->token_username,"Type" => "TXN");   
			$tokenData=  $this->Api_model->getClientToken($c->client_id);
			 
			$token= $tokenData['token'];  
																  
			$data_string_client = json_encode($data_client);                                                                                                              
			$ch_client = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																				  
			curl_setopt($ch_client, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch_client, CURLOPT_POSTFIELDS, $data_string_client);                                                                  
			curl_setopt($ch_client, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch_client, CURLOPT_HTTPHEADER, array(                                                                          
				 'Content-Type: application/json',                                                                                
				 'Authorization: Bearer '.$token.''                                                                       
			));  
			$result_client = curl_exec($ch_client);
			curl_close($ch_client);
			$json_client = json_decode($result_client, true);
			echo json_encode($json_client);
			 //print_r($json_cbre);die()
			//$this->Api_model->pushClientApiData($json_client);			
		}
		
	}
	function getHCUGDataDates(){
		$date_from = strtotime("2024-03-16"); 
        $date_to = strtotime("2024-04-21"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k]));
		$datachennai = array("StoreCode" => "HCUG", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushHCUGDataDates($json_chennai);
	}
		
	}
	function getChennaiDataFromTo(){
		$date_from = strtotime("2023-06-23"); 
        $date_to = strtotime("2023-06-23"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
					$yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 	
					$datachennai = array("StoreCode" => "0002", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
					$tokenData=  $this->Api_model->getToken("lonavala");
					 
					$token= $tokenData['token'];  
																		  
					$data_string_chennai = json_encode($datachennai);                                                                                                              
					$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																						  
					curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
					curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
					curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
						 'Content-Type: application/json',                                                                                
						 'Authorization: Bearer '.$token.''                                                                       
					));  
					$result_chennai = curl_exec($ch_chennai);
					curl_close($ch_chennai);
					$json_chennai = json_decode($result_chennai, true);
					$this->Api_model->pushApiDataChennaiFromTo($json_chennai);
				}
		
		
	}
	function getMumbaiDataFromTo(){
		$date_from = strtotime("2025-01-01"); 
        $date_to = strtotime("2025-02-10"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
					$yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 	
					$datachennai = array("StoreCode" => "0003", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
					$tokenData=  $this->Api_model->getToken("lonavala");
					 
					$token= $tokenData['token'];  
																		  
					$data_string_chennai = json_encode($datachennai);                                                                                                              
					$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																						  
					curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
					curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
					curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
						 'Content-Type: application/json',                                                                                
						 'Authorization: Bearer '.$token.''                                                                       
					));  
					$result_chennai = curl_exec($ch_chennai);
					curl_close($ch_chennai);
					$json_chennai = json_decode($result_chennai, true);
					// print_r($result_chennai);die();
					$this->Api_model->pushApiDataMumbaiFromTo($json_chennai);
				}
		
		
	}
	//
	//WARANGAL ALL WASHROOM DATA
	//
	function getWrlCollectorData(){
			
	  $yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0006", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->getCollectorData($json_chennai);
		
	}
	function getWrlCollectorDataDates(){
		$date_from = strtotime("2024-01-14"); 
        $date_to = strtotime("2024-04-14"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		// print_r($datesarray);die();
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	  $yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 
		$datachennai = array("StoreCode" => "0006", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->getCollectorData($json_chennai);
	}
		
	}
	function getWrlCollectorDataLive(){
		$today=date("d/m/Y");
	  //$today=date("21/04/2022");	 
		$datachennai = array("StoreCode" => "0006", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->getCollectorDataLive($json_chennai);
		
	}
	function getWrlJpnagarDataDates(){
		$date_from = strtotime("2022-09-08"); 
        $date_to = strtotime("2022-12-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k]));  
		$datachennai = array("StoreCode" => "0007", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->getjpnagarData($json_chennai);
	}
		
	}
	function getWrlJpnagarData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days"));	 
		$datachennai = array("StoreCode" => "0007", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->getjpnagarData($json_chennai);
		
	}
	function getWrlJpnagarDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0007", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->getjpnagarDataLive($json_chennai);
		
	}
	function getPoliceHeadquartersDataDates(){
		$date_from = strtotime("2022-09-08"); 
        $date_to = strtotime("2022-12-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 	 
		$datachennai = array("StoreCode" => "0009", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushPoliceHeadquartersData($json_chennai);
	}
		
	}
	function getPoliceHeadquartersData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days"));	 
		$datachennai = array("StoreCode" => "0009", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushPoliceHeadquartersData($json_chennai);
		
	}
	function getPoliceHeadquartersDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0009", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushPoliceHeadquartersDataLive($json_chennai);
		
	}
	
	function getMissionHospitalDataDates(){
		$date_from = strtotime("2022-09-08"); 
        $date_to = strtotime("2022-12-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 	 
		$datachennai = array("StoreCode" => "0010", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		//print_r($json_chennai);die();
		$this->Api_model->pushMissionHospitalData($json_chennai);
	}
		
	}
	function getMissionHospitalData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0010", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushMissionHospitalData($json_chennai);
		
	}
	function getMissionHospitalDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0010", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushMissionHospitalDataLive($json_chennai);
		
	}
	function getLICOfficeMarketRoadDataDates(){
		$date_from = strtotime("2023-07-25"); 
        $date_to = strtotime("2023-07-25"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 
		$datachennai = array("StoreCode" => "0011", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushLICOfficeMarketRoadData($json_chennai);
	}
		
	}

	function getLICOfficeMarketRoadData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0011", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushLICOfficeMarketRoadData($json_chennai);
		
	}	function getLICOfficeMarketRoadDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0011", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushLICOfficeMarketRoadDataLive($json_chennai);
		
	}
	function getChintalBridgeDataDates(){
		$date_from = strtotime("2022-09-08"); 
        $date_to = strtotime("2022-12-31");  
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 
		$datachennai = array("StoreCode" => "0012", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushChintalBridgeData($json_chennai);
	}
		
	}
	function getChintalBridgeData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0012", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushChintalBridgeData($json_chennai);
		
	}
	function getChintalBridgeDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0012", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushChintalBridgeDataLive($json_chennai);
		
	}
	function getKazipetRailwayStationDataDates(){
		$date_from = strtotime("2023-03-25"); 
        $date_to = strtotime("2023-03-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k]));
		$datachennai = array("StoreCode" => "0013", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushKazipetRailwayStationData($json_chennai);
	}
		
	}
	function getKazipetRailwayStationData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days"));
		$datachennai = array("StoreCode" => "0013", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushKazipetRailwayStationData($json_chennai);
		
	}
	function getKazipetRailwayStationDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0013", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushKazipetRailwayStationDataLive($json_chennai);
		
	}
	function getRadhikaTheatreLaneDataDates(){
		$date_from = strtotime("2023-01-01"); 
        $date_to = strtotime("2023-07-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k]));
		$datachennai = array("StoreCode" => "0014", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRadhikaTheatreLaneData($json_chennai);
	}
		
	}
	function getRadhikaTheatreLaneData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days"));
		$datachennai = array("StoreCode" => "0014", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRadhikaTheatreLaneData($json_chennai);
		
	}
	function getRadhikaTheatreLaneDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0014", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRadhikaTheatreLaneDataLive($json_chennai);
		
	}
	function getGopalaswamiTempleDataDates(){
		$date_from = strtotime("2023-06-05"); 
        $date_to = strtotime("2023-06-06");  
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k]));
		$datachennai = array("StoreCode" => "0015", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushGopalaswamiTempleData($json_chennai);
	}
		
	}
	function getGopalaswamiTempleData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0015", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushGopalaswamiTempleData($json_chennai);
		
	}
	function getGopalaswamiTempleDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0015", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushGopalaswamiTempleDataLive($json_chennai);
		
	}
	
	function getDistrictCourtDataDates(){
		$date_from = strtotime("2022-10-10"); 
        $date_to = strtotime("2022-12-31"); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
				{ 
	    $yesterDay = date('d/m/Y',strtotime($datesarray[$k]));
		// $yesterDay = date("26/05/202");	
		$datachennai = array("StoreCode" => "0016", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushDistrictCourtData($json_chennai);
	}
		
	}
	function getDistrictCourtData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		// $yesterDay = date("26/05/202");	
		$datachennai = array("StoreCode" => "0016", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushDistrictCourtData($json_chennai);
		
	}
	function getDistrictCourtDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0016", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushDistrictCourtDataLive($json_chennai);
		
	}
	function getSsmallGeneratorsData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0018", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getRsbroGeneratorsData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0017", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getSismalldg1Data(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0019", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getSismalldg2Data(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0020", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getNarayanapuramData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0022", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getRSBrothersDates(){

		$date_from = strtotime("2025-03-27"); 
		$date_to = strtotime("2025-04-01"); 
		$datesarray=array();
		
		
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
		{
		  array_push($datesarray, date("Y-m-d",$i1));  
		}
		for ($k=0; $k < count($datesarray); $k++)
				{ 
					$yesterDay = date('d/m/Y',strtotime($datesarray[$k])); 
					// $yesterDay = date("26/05/202");	
					$datachennai = array("StoreCode" => "0023", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN"); 
					//Store Codes: 0023 0026 0027 0028 0029 0030 0031 0032 0033    
					$tokenData=  $this->Api_model->getToken("lonavala");
					
					$token= $tokenData['token'];  
																		
					$data_string_chennai = json_encode($datachennai);                                                                                                              
					$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																						
					curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
					curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
					curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
						'Content-Type: application/json',                                                                                
						'Authorization: Bearer '.$token.''                                                                       
					));  
					$result_chennai = curl_exec($ch_chennai);
					curl_close($ch_chennai);
					$json_chennai = json_decode($result_chennai, true);
					// print_r($json_chennai);die();
					$this->Api_model->pushRsbroGeneratorsData($json_chennai);
				}
	
		
		
	}
	function getSismallData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0023", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getRSBPatnyData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0030", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getRSBMehadiData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0031", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getRSBSuchitraData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0026", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getRSBNarayaniData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0028", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getSISMadinagudaData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0029", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getSISUppalData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0032", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getNarayaniBoduppalData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0033", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
	function getSISSuchitraData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0027", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsData($json_chennai);
		
	}
  function getIitData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0021", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushIItData($json_chennai);
		
	}
	function getHCUGData(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "HCUG", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushHCUGData($json_chennai);
		
	}
	function getHCUGDataLive(){
		$today=date("d/m/Y");
		$datachennai = array("StoreCode" => "HCUG", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushHCUGDataLive($json_chennai);
		
	}
	function getHCUG0036Data(){
		$yesterDay = date('d/m/Y',strtotime("-1 days")); 
		$datachennai = array("StoreCode" => "0036", "QueryDate" => $yesterDay,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);

		$this->Api_model->pushHCUG0036Data($json_chennai);
		
	}

	function getHCUG0036DataLive(){
		$today=date("d/m/Y");
		$datachennai = array("StoreCode" => "0036", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);

		$this->Api_model->pushHCUG0036DataLive($json_chennai);
		
	}
	function getRsbroGeneratorsDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0017", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSsmallGeneratorsDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0018", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSismalldg1DataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0019", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSismalldg2DataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0020", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getKanchipuramDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0022", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSismallDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0023", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getRSBPatnyDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0030", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getRSBMehadiDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0031", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getRSBSuchitraDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0026", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getRSBNarayaniDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0028", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSISMadinagudaDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0029", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSISUppalDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0032", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getNarayaniBoduppalDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0033", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getSISSuchitraDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0027", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushRsbroGeneratorsDataLive($json_chennai);
		
	}
	function getIItDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0021", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushIItDataLive($json_chennai);
		
	}
	function getDelhiDataLive(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0035", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushDelhiDataLive($json_chennai);
		
	}
	function getDelhiDataLive1(){
		$today=date("d/m/Y");
	  // $today=date("26/03/2022");	 
		$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushDelhiDataLive1($json_chennai);
		
	}
	function getDelhiDataYest(){
		// $today=date("d/m/Y");
	    $today=date("01/10/2023");	 
		$datachennai = array("StoreCode" => "0002", "QueryDate" => $today,"UserId" => "Wenalytics","Type" => "TXN");     
		$tokenData=  $this->Api_model->getToken("lonavala");
		 
		$token= $tokenData['token'];  
															  
		$data_string_chennai = json_encode($datachennai);                                                                                                              
		$ch_chennai = curl_init('https://protechservice.in/ClientDataService/api/ConsumptionData');
																			  
		curl_setopt($ch_chennai, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch_chennai, CURLOPT_POSTFIELDS, $data_string_chennai);                                                                  
		curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch_chennai, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch_chennai, CURLOPT_RETURNTRANSFER, true);                                                                    
		curl_setopt($ch_chennai, CURLOPT_HTTPHEADER, array(                                                                          
			 'Content-Type: application/json',                                                                                
			 'Authorization: Bearer '.$token.''                                                                       
		));  
		$result_chennai = curl_exec($ch_chennai);
		curl_close($ch_chennai);
		$json_chennai = json_decode($result_chennai, true);
		// print_r($json_chennai);die();
		$this->Api_model->pushDelhiDataLive2($json_chennai);
		
	}
	function getDeleteAllLive(){		
		$this->Api_model->deleteAllLiveData();		
	}
	function getDeleteUndpLive(){		
		$this->Api_model->deleteUndpLiveData();		
	}
	function updatewarangalData(){
		
		$branches=$this->Api_model->getBranches();
		foreach ($branches as $row) {
			$this->Api_model->updateWarangal($row['table_name']);
		}
		
	}
	function updatewarangalDataLive(){
		
		$branches=$this->Api_model->getBranches();
		foreach ($branches as $row) {
			$this->Api_model->updateWarangal($row['table_name_live']);
		}
		
	}
}

?>