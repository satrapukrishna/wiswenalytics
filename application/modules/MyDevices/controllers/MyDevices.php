<?php
header("Access-Control-Allow-Origin: *");


ini_set('memory_limit', '-1');


class MyDevices extends MX_Controller
{
	function __construct(){

		parent::__construct();
		$this->load->model('Api_model');
		$this->load->library('curl');
		
	}
	function getDateToTimeStamp(){
		//$date=new DateTime();
		date_default_timezone_set('America/New_York');
		echo date('Y-m-d')." 12:00:00 AM"."<br>";
		echo date('Y-m-d H:m:s A');
		//$date=new DateTime("'.date('Y-m-d').' 12:00:00 AM");
		//echo $date->getTimestamp();
	}
	function getDateToTimeStampy(){
		//$date=new DateTime();
		date_default_timezone_set('America/Chicago');
		$startdate= date('Y-m-d',strtotime("-1 days"))." 12:00:00 AM";
		// echo date('Y-m-d H:m:s A');
		$enddate= date('Y-m-d',strtotime("-1 days"))." 11:59:00 PM";
		//$date=new DateTime("'.date('Y-m-d').' 12:00:00 AM");
		echo strtotime($startdate),"<br>";
		echo strtotime($enddate);
	}
	function getTimeStampToDate($timestamp){
		echo date('Y-m-d H:i:s', $timestamp);
		
	}
   function getkingsCircleToken(){
	
	$ch = curl_init('https://api.iotinabox.com/v1.0/oauth/token');                                                                      
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
					"grant_type=password&client_id=wenalytics&client_secret=81ac93bd-e9a8-4cc2-b6c1-37c4a3c95bbf&username=kings@wenalytics.com&password=Wenalytics2023");
	
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
			
					$result = curl_exec($ch);
					curl_close($ch);
			
					$json = json_decode($result, true);
					echo json_encode($json);
			$this->Api_model->saveToken($json,"kings");
   }
   function getEmbassyToken(){
	
	$ch = curl_init('https://api.iotinabox.com/v1.0/oauth/token');                                                                      
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
					"grant_type=password&client_id=wenalytics&client_secret=81ac93bd-e9a8-4cc2-b6c1-37c4a3c95bbf&username=embassy@wenalytics.com&password=Wenalytics2023");
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
			
					$result = curl_exec($ch);
					curl_close($ch);
			
					$json = json_decode($result, true);
					echo json_encode($json);
			$this->Api_model->saveToken($json,"embassy");
   }
   function getKingsData(){
		   $tokenData=  $this->Api_model->getToken("kings");	 
		   $token= $tokenData['token'];
	       $companyId=$this->getCompanyId($token);
		   $locationId=$this->getLocationId($companyId,$token);
		   $things=$this->getThings($locationId,$companyId,$token);
		   //$things_data= json_decode($things);
		//    echo print_r($things);die();
		$result=array();
		$k=0;
		   for ($i=0; $i < count($things); $i++) {
			$thing_history= $this->getThingsHistory($things[$i]['id'],$locationId,$companyId,$token);
			$thing= $this->getThing($things[$i]['id'],$locationId,$companyId,$token);
			// echo json_encode($thing['children']);die();
			if(count($thing_history['readings'])>0){
				//echo print_r($thing_history['readings'][0]);die();
				for ($m=0; $m <count($thing_history['readings']) ; $m++) { 
		
				
				for ($n=0; $n < count($thing_history['readings'][$m]['sensors']); $n++) { 
					// print_r($thing_history['readings'][$m]['sensors'][$n]['channel']);die();
					
					
					// $result[$k]['from']=$thing_history['units'][$n]['from'];
					for ($t=0; $t < count($thing_history['units']); $t++) { 
						if($thing_history['readings'][$m]['sensors'][$n]['channel']==$thing_history['units'][$t]['channel']){
							
							for ($r=0; $r < count($thing['children']); $r++) { 
								if($thing_history['units'][$t]['sensor_id']==$thing['children'][$r]['id']){
									
									$result[$k]['StationId']=$thing['children'][$r]['company_id'];
									$result[$k]['LocationId']=$thing['children'][$r]['location_id'];
									$result[$k]['SensorType']=$thing['children'][$r]['sensor_type'];
									$result[$k]['UtilityName']=$thing['children'][$r]['thing_name'];
								}
							}
							$result[$k]['UomScale']=$thing_history['units'][$t]['from'];
							//$result[$k]['sensor_id']=$thing_history['units'][$t]['sensor_id'];
							//$result[$k]['channel']=$thing_history['units'][$t]['channel'];
						}
					}
					$result[$k]['TxnDate']=$this->getUsaDate($thing_history['readings'][$m]['ts']);
					$result[$k]['TxnFullDate']=$this->getUsaDateFull($thing_history['readings'][$m]['ts']);
					$result[$k]['TxnTime']=$this->getUsaTime($thing_history['readings'][$m]['ts']);
					$result[$k]['LineConnected']=$things[$i]['thing_name'];

					//$result[$k]['channel']=$thing_history['readings'][$m]['sensors'][$n]['channel'];
					$result[$k]['Consumption']=$thing_history['readings'][$m]['sensors'][$n]['v'];
					$k++;
				}
			}

			}
			
			
			
		   }
		   echo json_encode($result);die();
		     
   }
   function getEmbassyData(){
	$tokenData=  $this->Api_model->getToken("embassy");	 
	$token= $tokenData['token'];
	$companyId=$this->getCompanyId($token);
	$locationId=$this->getLocationId($companyId,$token);
	$things=$this->getThings($locationId,$companyId,$token);
	$things_data= json_decode($things);
    // echo print_r($companyId);die();
 $result=array();
 $k=0;
	for ($i=0; $i < count($things); $i++) {
	 $thing_history= $this->getThingsHistory($things[$i]['id'],$locationId,$companyId,$token);
	 $thing= $this->getThing($things[$i]['id'],$locationId,$companyId,$token);
	 // echo json_encode($thing['children']);die();
	 if(count($thing_history['readings'])>0){
		 //echo print_r($thing_history['readings'][0]);die();
		 for ($m=0; $m <count($thing_history['readings']) ; $m++) { 
 
		 
		 for ($n=0; $n < count($thing_history['readings'][$m]['sensors']); $n++) { 
			 // print_r($thing_history['readings'][$m]['sensors'][$n]['channel']);die();
			 
			 
			 // $result[$k]['from']=$thing_history['units'][$n]['from'];
			 for ($t=0; $t < count($thing_history['units']); $t++) { 
				if($thing_history['units'][$t]['from'] !='null' || $thing_history['units'][$t]['from'] !='dbm'){
				 if($thing_history['readings'][$m]['sensors'][$n]['channel']==$thing_history['units'][$t]['channel']){
					 
					 for ($r=0; $r < count($thing['children']); $r++) { 
						 if($thing_history['units'][$t]['sensor_id']==$thing['children'][$r]['id']){
							 
							 $result[$k]['StationId']=$thing['children'][$r]['company_id'];
							 $result[$k]['LocationId']=$thing['children'][$r]['location_id'];
							 $result[$k]['SensorType']=$thing['children'][$r]['sensor_type'];
							 $result[$k]['UtilityName']=$thing['children'][$r]['thing_name'];
						 }
					 }
					 $result[$k]['UomScale']=$thing_history['units'][$t]['from'];
					 //$result[$k]['sensor_id']=$thing_history['units'][$t]['sensor_id'];
					 //$result[$k]['channel']=$thing_history['units'][$t]['channel'];
				 }
				}
			 }
			 $result[$k]['TxnDate']=$this->getUsaDate($thing_history['readings'][$m]['ts']);
			 $result[$k]['TxnFullDate']=$this->getUsaDateFull($thing_history['readings'][$m]['ts']);
			 $result[$k]['TxnTime']=$this->getUsaTime($thing_history['readings'][$m]['ts']);
			 $result[$k]['LineConnected']=$things[$i]['thing_name'];

			 //$result[$k]['channel']=$thing_history['readings'][$m]['sensors'][$n]['channel'];
			 $result[$k]['Consumption']=$thing_history['readings'][$m]['sensors'][$n]['v'];
			 $k++;
		 }
	 }

	 }
	 
	 
	 
	}
	$this->Api_model->saveDeviceData($result);
	// echo json_encode($result);die();
	  
}
function getEmbassyData_prev(){
	$tokenData=  $this->Api_model->getToken("embassy");	 
	$token= $tokenData['token'];
	$companyId=$this->getCompanyId($token);
	$locationId=$this->getLocationId($companyId,$token);
	$things=$this->getThings($locationId,$companyId,$token);
	//$things_data= json_decode($things);
	$date=$this->input->get('date');
   // echo print_r($date);die();
    // echo print_r($companyId);die();
 $result=array();
 $k=0;
	for ($i=0; $i < count($things); $i++) {
	 $thing_history= $this->getThingsHistory_prev($things[$i]['id'],$locationId,$companyId,$token,$date);
	 $thing= $this->getThing($things[$i]['id'],$locationId,$companyId,$token);
	 // echo json_encode($thing['children']);die();
	 if(count($thing_history['readings'])>0){
		 //echo print_r($thing_history['readings'][0]);die();
		 for ($m=0; $m <count($thing_history['readings']) ; $m++) { 
 
		 
		 for ($n=0; $n < count($thing_history['readings'][$m]['sensors']); $n++) { 
			 // print_r($thing_history['readings'][$m]['sensors'][$n]['channel']);die();
			 
			 
			 // $result[$k]['from']=$thing_history['units'][$n]['from'];
			 for ($t=0; $t < count($thing_history['units']); $t++) { 
				if($thing_history['units'][$t]['from'] !='null' || $thing_history['units'][$t]['from'] !='dbm'){
				 if($thing_history['readings'][$m]['sensors'][$n]['channel']==$thing_history['units'][$t]['channel']){
					 
					 for ($r=0; $r < count($thing['children']); $r++) { 
						 if($thing_history['units'][$t]['sensor_id']==$thing['children'][$r]['id']){
							 
							 $result[$k]['StationId']=$thing['children'][$r]['company_id'];
							 $result[$k]['LocationId']=$thing['children'][$r]['location_id'];
							 $result[$k]['SensorType']=$thing['children'][$r]['sensor_type'];
							 $result[$k]['UtilityName']=$thing['children'][$r]['thing_name'];
						 }
					 }
					 $result[$k]['UomScale']=$thing_history['units'][$t]['from'];
					 //$result[$k]['sensor_id']=$thing_history['units'][$t]['sensor_id'];
					 //$result[$k]['channel']=$thing_history['units'][$t]['channel'];
				 }
				}
			 }
			 $result[$k]['TxnDate']=$this->getUsaDate($thing_history['readings'][$m]['ts']);
			 $result[$k]['TxnFullDate']=$this->getUsaDateFull($thing_history['readings'][$m]['ts']);
			 $result[$k]['TxnTime']=$this->getUsaTime($thing_history['readings'][$m]['ts']);
			 $result[$k]['LineConnected']=$things[$i]['thing_name'];

			 //$result[$k]['channel']=$thing_history['readings'][$m]['sensors'][$n]['channel'];
			 $result[$k]['Consumption']=$thing_history['readings'][$m]['sensors'][$n]['v'];
			 $k++;
		 }
	 }

	 }
	 
	 
	 
	}
	$this->Api_model->saveDeviceData_prev($result);
	// echo json_encode($result);die();
	  
}
function getEmbassyData_prev_morning(){
	$tokenData=  $this->Api_model->getToken("embassy");	 
	$token= $tokenData['token'];
	$companyId=$this->getCompanyId($token);
	$locationId=$this->getLocationId($companyId,$token);
	$things=$this->getThings($locationId,$companyId,$token);
	//$things_data= json_decode($things);
	$date=$this->input->get('date');
   // echo print_r($date);die();
    // echo print_r($companyId);die();
	// echo count($things);die();
 $result=array();
 $k=0;
	for ($i=0; $i < count($things); $i++) {
	 $thing_history= $this->getThingsHistory_prev_mornig($things[$i]['id'],$locationId,$companyId,$token,$date);
	 $thing= $this->getThing($things[$i]['id'],$locationId,$companyId,$token);
	 // echo json_encode($thing['children']);die();
	 if(count($thing_history['readings'])>0){
		 //echo print_r($thing_history['readings'][0]);die();
		 for ($m=0; $m <count($thing_history['readings']) ; $m++) { 
 
		 
		 for ($n=0; $n < count($thing_history['readings'][$m]['sensors']); $n++) { 
			 // print_r($thing_history['readings'][$m]['sensors'][$n]['channel']);die();
			 
			 
			 // $result[$k]['from']=$thing_history['units'][$n]['from'];
			 for ($t=0; $t < count($thing_history['units']); $t++) { 
				if($thing_history['units'][$t]['from'] !='null' || $thing_history['units'][$t]['from'] !='dbm'){
				 if($thing_history['readings'][$m]['sensors'][$n]['channel']==$thing_history['units'][$t]['channel']){
					 
					 for ($r=0; $r < count($thing['children']); $r++) { 
						 if($thing_history['units'][$t]['sensor_id']==$thing['children'][$r]['id']){
							 
							 $result[$k]['StationId']=$thing['children'][$r]['company_id'];
							 $result[$k]['LocationId']=$thing['children'][$r]['location_id'];
							 $result[$k]['SensorType']=$thing['children'][$r]['sensor_type'];
							 $result[$k]['UtilityName']=$thing['children'][$r]['thing_name'];
						 }
					 }
					 $result[$k]['UomScale']=$thing_history['units'][$t]['from'];
					 //$result[$k]['sensor_id']=$thing_history['units'][$t]['sensor_id'];
					 //$result[$k]['channel']=$thing_history['units'][$t]['channel'];
				 }
				}
			 }
			 $result[$k]['TxnDate']=$this->getUsaDate($thing_history['readings'][$m]['ts']);
			 $result[$k]['TxnFullDate']=$this->getUsaDateFull($thing_history['readings'][$m]['ts']);
			 $result[$k]['TxnTime']=$this->getUsaTime($thing_history['readings'][$m]['ts']);
			 $result[$k]['LineConnected']=$things[$i]['thing_name'];

			 //$result[$k]['channel']=$thing_history['readings'][$m]['sensors'][$n]['channel'];
			 $result[$k]['Consumption']=$thing_history['readings'][$m]['sensors'][$n]['v'];
			 $k++;
		 }
	 }

	 }
	 
	 
	 
	}
	$this->Api_model->saveDeviceData_prev($result);
	// echo json_encode($result);die();
	  
}
   function getUsaDate($millisecond){
	date_default_timezone_set('America/Chicago');
	//$mil = 1677394876242;
	$seconds = $millisecond / 1000;
	$newformat = date('Y-m-d',$seconds);
	return $newformat;
   }
   function getUsaDateFull($millisecond){
	date_default_timezone_set('America/Chicago');
	//$mil = 1677394876242;
	$seconds = $millisecond / 1000;
	$newformat = date('Y-m-d h:i A',$seconds);
	return $newformat;
   }
   function getUsaTime($millisecond){
	date_default_timezone_set('America/Chicago');
	//$mil = 1677394876242;
	$seconds = $millisecond / 1000;
	$newformat = date('H:i:s',$seconds);
	return $newformat;
   }
   function getThingsHistory($thingId,$locaId,$compId,$token){
	// echo $token;die();https://api.iotinabox.com/companies/27257/locations
	date_default_timezone_set('America/Chicago');
		$startdate= date('Y-m-d')." 12:00:00 AM";
		$enddate= date('Y-m-d h:m:s A');
	$start_date=strtotime($startdate)*1000;
	$end_date=strtotime($enddate)*1000;
	$url='https://api.iotinabox.com/companies/'.$compId.'/locations/'.$locaId.'/things/'.$thingId.'/history?start_date='.$start_date.'&end_date='.$end_date.'&type=custom&units=d,p,v,dbm,mins';
	// echo $url;die();
			$ch = curl_init($url);                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Authorization: Bearer '.$token.''                                                                       
		   ));
				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

			$result = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($result, true);
			return $json;
   }
   function getThingsHistory_prev($thingId,$locaId,$compId,$token,$date){
		date_default_timezone_set('America/Chicago');
		// $enddate2= date('Y-m-d',strtotime("-1 days"))." 11:59:00 PM";
		//$date="2023-04-01";
		$startdate1= $date." 12:00:00 AM";
		//echo date('Y-m-d H:m:s A');
		$enddate1= $date." 12:00:00 PM";
		$startdate2= $date." 12:00:00 PM";
		//echo date('Y-m-d H:m:s A');
		$enddate2= $date." 11:59:00 PM";
		// $startdate= date('Y-m-d')." 12:00:00 AM";
		// $enddate= date('Y-m-d h:m:s A');
		$start_date1=strtotime($startdate1)*1000;
		$end_date1=strtotime($enddate1)*1000;

		$start_date2=strtotime($startdate2)*1000;
		$end_date2=strtotime($enddate2)*1000;
		$url='https://api.iotinabox.com/companies/'.$compId.'/locations/'.$locaId.'/things/'.$thingId.'/history?start_date=' . $start_date2 . '&end_date=' . $end_date2 . '&type=custom&units=d,p,v,dbm,mins';
		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Authorization: Bearer '.$token.''                                                                       
		));
				
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		// echo json_encode($json);
		return $json;
   }
   function getThingsHistory_prev_mornig($thingId,$locaId,$compId,$token,$date){
	date_default_timezone_set('America/Chicago');
	// $enddate2= date('Y-m-d',strtotime("-1 days"))." 11:59:00 PM";
	//$date="2023-04-01";
	$startdate1= $date." 12:00:00 AM";
	//echo date('Y-m-d H:m:s A');
	$enddate1= $date." 12:00:00 PM";
	
	$start_date1=strtotime($startdate1)*1000;
	$end_date1=strtotime($enddate1)*1000;

	$url='https://api.iotinabox.com/companies/'.$compId.'/locations/'.$locaId.'/things/'.$thingId.'/history?start_date=' . $start_date1 . '&end_date=' . $end_date1 . '&type=custom&units=d,p,v,dbm,mins';
	$ch = curl_init($url);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',                                                                                
		'Authorization: Bearer '.$token.''                                                                       
	));
			
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($result, true);
	// echo json_encode($json);
	return $json;
}
   function getThing($thingId,$locaId,$compId,$token){
	
	$url='https://api.iotinabox.com/companies/'.$compId.'/locations/'.$locaId.'/things/'.$thingId;
	// echo $url;die();
			$ch = curl_init($url);                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Authorization: Bearer '.$token.''                                                                       
		   ));
				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

			$result = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($result, true);
			return $json;
   }
   function getThings($locaId,$compId,$token){
	// echo $token;die();https://api.iotinabox.com/companies/27257/locations
			$ch = curl_init('https://api.iotinabox.com/companies/'.$compId.'/locations/'.$locaId.'/things');                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Authorization: Bearer '.$token.''                                                                       
		   ));
				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

			$result = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($result, true);
			return $json;
   }
   function getLocationId($compId,$token){
	// echo $token;die();https://api.iotinabox.com/companies/27257/locations
			$ch = curl_init('https://api.iotinabox.com/companies/'.$compId.'/locations');                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Authorization: Bearer '.$token.''                                                                       
		   ));
				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

			$result = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($result, true);
			return json_encode($json[0]['id']);
   }
   function getCompanyId($token){
	// echo $token;die();
			$ch = curl_init('https://api.iotinabox.com/companies');                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Authorization: Bearer '.$token.''                                                                       
		   ));
				
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

			$result = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($result, true);
			return json_encode($json[0]['id']);
   }
   
	

}

?>