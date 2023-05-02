<?php
header("Access-Control-Allow-Origin: *");
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
function getTokenGenerate(){


	    //$data = array("grant_type" => "password","username" => "factory123", "password" => "protechpwd");                                                                    
		//$data_string = json_encode($data);   

		$ch = curl_init('http://137.59.201.27/ClientDataService/token');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=password&username=factory123&password=protechpwd");

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		$json = json_decode($result, true);
		$this->Api_model->saveToken($json);

		//print_r($json);

}
function getApolloData(){
	   $today=date("d/m/Y");
	   //date('d.m.Y',strtotime("-1 days"));
		//echo $today;die();
		$data = array("FromDate" => $today, "ToDate" => $today,"QueryId" => "AH01", "UserId" => "Factory123");    
		$tokenData=  $this->Api_model->getToken();
		//print_r($tokenData) ;die();   
		$token= $tokenData['token'];  
		//echo 'Bearer '.$token.'';die();
		//echo $token;die();                                                       
		$data_string = json_encode($data);
		                                                                   
		                                                                                                               
		$ch = curl_init('http://137.59.201.27/ClientDataService/api/ConsumptionData');
		//$ch = curl_init('http://137.59.201.27/ClientDataService/api/ConsumptionData');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));  
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		//      'Content-Type: application/json',                                                                                
		//     'Authorization: Bearer f7EVNbyhUWwACREety03vzvmnEp6Cro2dICW7fu_LuTVj0LHjKkEP_Y3F0o4_yHeAu7V1ZVNXVQ1q2Kr3WRyFqtwqBzAMXs3wh9JZWFdR5-jJFkl_4RjrSicW7TKkzuPDf6BEIF5Dd3n-pHC0ccZFeizery1unhV3JMwsUVeMPsiWKBYOUE4T5djKqSIHBSlX-qKHC1a0yfbx9WZx9sOvqCaBKmKruAjCJikB4PAclpiZ5lY1_1IFtJ0ZtBHYAR_9s-ZzTzAbwk1RwhWi6Rd2e5u05c6rXzVlXYYhjc0a342rdvgohyK7nPG4mZqvmJJnp0hc3s5gz-RgjqIshVsk5AQaVvaile_b8IS60OfjbH37_K9NBZte0P59zXVNpZK9P3QsgXaR8nsXceE1ix6ZoRGX2Sgje4cx0HoTVwLyMATFsn42o702hoe0MnoHbBtOsltjt0fKXbaarRHX_q6oDaUxGSVR8W3H9kP3A7_12I'                                                                       
		// ));                                                                                                     
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization', 'OAuth '+$atoken));                                                                                                               
		                                                                                                                     
		$result = curl_exec($ch);
		$json = json_decode($result, true);
		//print_r($json);die();
		foreach ($json as $value) {

	 	$data=explode("_",$value['UtilityName']);
	 	//echo count($data);
	 	if(count($data)==2){
		$utilityName=$data[0];
		$locationname=$data[1];

	 	}
	 	elseif(count($data)==3){
	 		if($data[2]=='Waiting Hall'){
	 			$utilityName=$data[0]."_".$data[1];
				$locationname='WaitingHall';
	 		}elseif($data[2]=='OperationTheatr'){
	 			$utilityName=$data[0]."_".$data[1];
				$locationname=$data[2];
	 		}
	 		elseif($data[2]=='Tomotherapy'){
	 			$utilityName=$data[0]."_".$data[1];
				$locationname=$data[2];
	 		}
	 		else{
	 			$utilityName=$data[0];
				$locationname=$data[1]."_".$data[2];
	 		}
		
	 	}
	 	elseif(count($data)==4){
		$utilityName=$data[0]."_".$data[1];
		$locationname=$data[2]."_".$data[3];
	 	}else{
	 		$utilityName=$data[0]."_".$data[1]."_".$data[2];
			$locationname=$data[3]."_".$data[4];
	 	}
	 	
		$lname = str_replace(' ','', $locationname);
		
		$newDate = date("Y-m-d", strtotime($value['TxnDate']));
		$appData=array('StationId'=>$value['StationId'],
						'StationName'=>$value['StationName'],
						 'UtilityName'=>$utilityName,
						 'UomScale'=>$value['UomScale'],
						 'UomGraph'=>$value['UomGraph'],
						 'MeterName'=>$value['MeterName'],
						 'TxnDate'=>$newDate,
						 'FromTime'=>$value['FromTime'],
						 'ToTime'=>$value['ToTime'],
						 'PrvReading'=>$value['PrvReading'],
						 'CurReading'=>$value['CurReading'],
						 'Consumption'=>$value['Consumption'],
						 'ValueMax'=>$value['ValueMax'],
						 'ValueMin'=>$value['ValueMin'],
						 'ValueAvg'=>$value['ValueAvg'],
						 'MeterSerial'=>$value['MeterSerial'],
						 'LocationName'=>$lname,
						 'MeterType'=>$value['MeterType'],
						 'UomName'=>$value['UomName'],
						 'LocationWithUtility'=>$value['UtilityName']
						 );
		
		$uid=$this->Api_model->checkData($appData['StationId'],$appData['FromTime'],$appData['ToTime'],$appData['LocationWithUtility'],$newDate);
		if($uid<=0){
			$this->Api_model->putDbData($appData);

		}


		
	 }


}
function getMyHomeData(){
	$today=date("d/m/Y");
		//echo $today;die();
		$data = array("FromDate" => $today, "ToDate" => $today,"QueryId" => "MV01", "UserId" => "Factory123","Type"=>"YC");
		$tokenData=  $this->Api_model->getToken();
		//print_r($tokenData) ;die();   
		$token= $tokenData['token'];  
		//echo 'Bearer '.$token.'';die();                                                                    
		$data_string = json_encode($data);                                                                                   
		                                                                                                         
		$ch = curl_init('http://137.59.201.27/ClientDataService/api/ConsumptionData');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		     'Content-Type: application/json',                                                                                
		     'Authorization: Bearer '.$token.''                                                                       
		));                                                                                                                  
		                                                                                                                     
		$result = curl_exec($ch);
		  
		$json = json_decode($result, true);
		//print_r($json);die();
		foreach ($json as $value) {

	 	
		$currentime =  date('Y-m-d H:i:s');
		$newDate = date("Y-m-d", strtotime($value['TxnDate']));
		$appData=array('StationId'=>$value['StationId'],
						'StationName'=>$value['StationName'],
						 'UtilityName'=>$value['UtilityName'],
						 'UomScale'=>$value['UomScale'],
						 'UomGraph'=>$value['UomGraph'],
						 'MeterName'=>$value['MeterName'],
						 'TxnDate'=>$newDate,
						 'FromTime'=>$value['FromTime'],
						 'ToTime'=>$value['ToTime'],
						 'PrvReading'=>$value['PrvReading'],
						 'CurReading'=>$value['CurReading'],
						 'Consumption'=>$value['Consumption'],
						 'ValueMax'=>$value['ValueMax'],
						 'ValueMin'=>$value['ValueMin'],
						 'ValueAvg'=>$value['ValueAvg'],
						 'MeterSerial'=>$value['MeterSerial'],
						 'LocationName'=>'',
						 'MeterType'=>$value['MeterType'],
						 'UomName'=>$value['UomName'],
						 'LocationWithUtility'=>$value['UtilityName'],
						 'currentTime' => $currentime
						 );
		// print_r($appData);
		$uid=$this->Api_model->checkData($appData['StationId'],$appData['FromTime'],$appData['ToTime'],$appData['LocationWithUtility'],$newDate);
		if($uid<=0){
			$this->Api_model->putDbData($appData);

		}


		
	 }

}
}

?>