<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMSController extends MX_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('Sms_model');
	$this->load->model('Services_model');
	$this->load->helper('sms_helper');
	// $this->load->helper('sms_helper1');
	$this->load->model('Api_data_model');

	}
function testsms(){
	$message="DG:: Fuel Added 56 Liters on 9:7
	From WISIOT";

							// echo $message;
							$mobile="9959451265";
							smssend( $mobile, $message );
}
	function PumpOnOffAlert(){
		$clients=$this->Sms_model->get_clients();
		
		// echo "<pre>";print_r($clients->result());
		foreach($clients->result() as $client){
			$device=$this->Services_model->get_devices(3);
			foreach ($device->result() as $row)
			{	
				$search_data = array(
				'device_id' => $row->device_id,
				'pump_type' => 'Pumps',
				'client_id' => $client->client_id);
				$pumps=$this->Services_model->get_firepumpdata($search_data);	
				foreach ($pumps->result() as $rec)
				{
					$api_search=array('station_id'=>$client->station_id,
					'api_name'=>$rec->api_name,
					'LineConnected'=>$rec->LineConnected);
					$pump_api=$this->Services_model->getDashBoardData($api_search);	
					
					// echo $this->db->last_query();exit;
					// echo "<pre>";print_r($pump_api);
						$insert_data=array(
						'client_id'=>$client->client_id,
						'device_id'=>$row->device_id,
						'UtilityName'=>$pump_api['meter'],
						'LineConnected'=>$pump_api['LineConnected'],
						'RunningStatus'=>$pump_api['RunningStatus'],
						'TxnDate'=>$pump_api['TxnDate'],
						'TxnTime'=>$pump_api['TxnTime'],
						'alert_name'=>"pump-on-off",
						'created_date'=>date('Y-m-d H:i:s')
						);
						 // echo "<pre>";print_r($insert_data);exit();
						
						if($pump_api['meter']!="Jockey Pump"){
						
						$a=array(
						'client_id'=>$client->client_id,
						'device_id'=>$row->device_id,
						'UtilityName'=>$pump_api['meter'],
						'LineConnected'=>$pump_api['LineConnected'],
						'RunningStatus'=>$pump_api['RunningStatus'],
						'alert_name'=>"pump-on-off",
						'TxnDate'=>$pump_api['TxnDate']
						);
						//echo "<pre>";print_r($a);exit();
						if($pump_api['RunningStatus']==0){
							$rstatus="OFF";
						}else{
							$rstatus="ON";
						}
						$this->load->helper('sms_helper');
						$ress=$this->check_alerts($a);
						 //echo "<pre>";print_r($a);
						// echo count($ress);exit();
						$count=count($ress);
						if($count==0){							
							$this->Sms_model->insert_alertsdata($insert_data);
							
							/////////////pump off/on alert msg////////////////////
							$message="Alert ".$pump_api['meter']." is ".$rstatus." : Please check in ".$row->device_name;
							// echo $message;
							$mobile="9959451265";
							smssend( $mobile, $message );	
							
							
							$msg=array(
							'client_id'=>$client->client_id,
							'hardware_device'=>$row->device_id,
							'hardware_id'=>$rec->api_name,
							'alert_name'=>$pump_api['meter']." On/Off",
							'alert_message'=>$message,
							'alert_read'=>0,
							'status'=>1,
							'created_date'=>date('Y-m-d H:i:s')
							);
							$this->Sms_model->insert_alerts_notification($msg);
							/////////////end pump off/on alert msg////////////////////
							
							
							
						}elseif($ress[0]['RunningStatus']!=$pump_api['RunningStatus']){
							$this->Sms_model->insert_alertsdata($insert_data);
							
							/////////////pump off/on alert msg////////////////////
							$message="Alert ".$pump_api['meter']." is ".$rstatus." : Please check in ".$row->device_name;
							$mobile="9959451265";
							smssend( $mobile, $message );	
							$msg=array(
							'client_id'=>$client->client_id,
							'hardware_device'=>$row->device_id,
							'hardware_id'=>$rec->api_name,
							'alert_name'=>$pump_api['meter']." On/Off",
							'alert_message'=>$message,
							'alert_read'=>0,
							'status'=>1,
							'created_date'=>date('Y-m-d H:i:s')
							);
							$this->Sms_model->insert_alerts_notification($msg);
							/////////////end pump off/on alert msg////////////////////
							
							
						}
						}
						
					
				}
			}
		}
		
	exit;
	}
	
	function check_alerts($data){
		// print_r($data);die();
		$res=$this->Sms_model->getFirepampAlertsData_check($data);
		return $res;
	}
	
	function PumpmoreconsumptionAlert(){
		$clients=$this->Sms_model->get_clients();
		
		// echo "<pre>";print_r($clients->result());
		foreach($clients->result() as $client){
			$device=$this->Services_model->get_devices(3);
			foreach ($device->result() as $row)
			{	
				$search_data = array(
				'device_id' => $row->device_id,
				'pump_type' => 'Pumps',
				'client_id' => $client->client_id);
				$pumps=$this->Services_model->get_firepumpdata($search_data);	
				foreach ($pumps->result() as $rec)
				{
					$api_search=array('station_id'=>$client->station_id,
					'api_name'=>$rec->api_name,
					'LineConnected'=>$rec->LineConnected);
					$pump_api=$this->Sms_model->getFirepampAlertsData($api_search);	
					
					// echo $this->db->last_query();exit;
					// echo "<pre>";print_r($pump_api);
						$insert_data=array(
						'client_id'=>$client->client_id,
						'device_id'=>$row->device_id,
						'UtilityName'=>$pump_api['meter'],
						'LineConnected'=>$pump_api['LineConnected'],
						'RunningStatus'=>$pump_api['RunningStatus'],
						'TxnDate'=>$pump_api['TxnDate'],
						'TxnTime'=>$pump_api['TxnTime'],
						'alert_name'=>"pump-more-consumption",
						'created_date'=>date('Y-m-d H:i:s')
						);
						// echo "<pre>";print_r($insert_data);
						
						
						$a=array(
						'client_id'=>$client->client_id,
						'device_id'=>$row->device_id,
						'UtilityName'=>$pump_api['meter'],
						'LineConnected'=>$pump_api['LineConnected'],
						'RunningStatus'=>$pump_api['RunningStatus'],
						'alert_name	'=>"pump-more-consumption",
						'TxnDate'=>$pump_api['TxnDate']
						);
						
						$ress=$this->check_alerts($a);
						
						$count=count($ress);
						if($count==0){	
							/////////////pump Pumps will run more then 2 min  alert msg////////////////////
							if($pump_api['total_consumption']>2){
								$this->Sms_model->insert_alertsdata($insert_data);
								$message1="Alert ".$row->device_name." : ".$pump_api['meter']." is Running more then 2min Please check ";
							// echo $message1;
								$mobile1="9959451265";
								smssend( $mobile1, $message1 );	
								
								
								$msg1=array(
								'client_id'=>$client->client_id,
								'hardware_device'=>$row->device_id,
								'hardware_id'=>$rec->api_name,
								'alert_name'=>$pump_api['meter']." More Consumption",
								'alert_message'=>$message1,
								'alert_read'=>0,
								'status'=>1,
								'created_date'=>date('Y-m-d H:i:s')
								);
								$this->Sms_model->insert_alerts_notification($msg1);
							}
							/////////////end pump Pumps will run more then 2 min  alert msg////////////////////
							
						}
				}
			}
		}
		
	//exit;
	}
function deleteFirepumpAlertData(){
	$this->Sms_model->deleteAlertData();


}
function sendPushNotification($fields = array())
{
    //define( 'API_ACCESS_KEY', 'AAAAa6LIPPI:APA91bEB9xXHdpnw4sE6XXOV6RTE0c_lR5v5wzDSGbDnl6OqEcmHVQ5kDORIiJvCdu6E1avfcJ4B-RnDMePf9av8uqK2HegF5VAY2iPf2nOQqvRnlEEKWYMN2mOU0IgPakourQoAuHYR' );


    $headers = array
    (
        'Authorization: key=AAAAa6LIPPI:APA91bH9arNcOBfUDKI1MQWXh1GryIFA7aLaliTYAL0Gd6rb5s6vsbfyNsrQbvjdxLdXDbAJWLAytfypboGRtVeGJ6uwaqROQpHz5MKpJVsrIXXDj_ZsxlDOUZ1428nCf4HGzmXU4Bq2',
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
	//echo json_encode($result);
    curl_close( $ch );
    return $result;
}
function sendPushNotification_oberoia($fields = array())
{
    //define( 'API_ACCESS_KEY', 'AAAAa6LIPPI:APA91bEB9xXHdpnw4sE6XXOV6RTE0c_lR5v5wzDSGbDnl6OqEcmHVQ5kDORIiJvCdu6E1avfcJ4B-RnDMePf9av8uqK2HegF5VAY2iPf2nOQqvRnlEEKWYMN2mOU0IgPakourQoAuHYR' );


    $headers = array
    (
        'Authorization: key=AAAAMKNHUgk:APA91bE1ZUzopVnlq6zUCfRvd2lN7H6MCaacy0jYQ1wuGbXQM6Pc_SexPAApQYoIKV8IwV8fOp-MQ7GoePGObpyub3_ZM2t-frxiwRUp7IODDh3byueb8V9lIxzAkjvloPwwMIs4_ZOF',
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
	//echo json_encode($result);
    curl_close( $ch );
    return $result;
}
function sendPushNotification_chennai($fields = array())
{
    //define( 'API_ACCESS_KEY', 'AAAAa6LIPPI:APA91bEB9xXHdpnw4sE6XXOV6RTE0c_lR5v5wzDSGbDnl6OqEcmHVQ5kDORIiJvCdu6E1avfcJ4B-RnDMePf9av8uqK2HegF5VAY2iPf2nOQqvRnlEEKWYMN2mOU0IgPakourQoAuHYR' );


    $headers = array
    (
        'Authorization: key=AAAAMKNHUgk:APA91bE1ZUzopVnlq6zUCfRvd2lN7H6MCaacy0jYQ1wuGbXQM6Pc_SexPAApQYoIKV8IwV8fOp-MQ7GoePGObpyub3_ZM2t-frxiwRUp7IODDh3byueb8V9lIxzAkjvloPwwMIs4_ZOF',
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
	//echo json_encode($result);
    curl_close( $ch );
    return $result;
}
function waterMeterAlerts(){
	$this->load->model('Services_model');
	$emp_id=27;
	$meter_data = $this->Services_model->getSchedules($emp_id);
	$client_id = $this->Services_model->get_clientid($emp_id);
	//print_r($meter_data);
	foreach($meter_data as $meters){
		$check_data = $this->Services_model->checkReading($meters['meter_id']);
		//echo json_encode($meters);die();
		date_default_timezone_set('Asia/Kolkata');
       $a_time=date("Y-m-d")." ".$meters['to_reading'];
	   $c_time=date('Y-m-d H:i:s');

		
		
		//echo "<br>".$a_time."===".$c_time;
		//echo "<br>".strtotime($a_time)."===".strtotime($c_time);
		
		if(count($check_data)==0){
			if(strtotime($a_time)<strtotime($c_time)){
			
		 $check_notif=$this->Services_model->check_waterMeterNotification($meters['meter_id']);
		 if(count($check_notif)==0){
			$message=$meters['meter_name'].':: Please Add Water Meter Reading';
			$msg=array(
				'client_id'=>$client_id,
				'emp_id'=>$emp_id,
				'hardware_device'=>'17',
				'hardware_id'=>$meters['meter_id'],
				'alert_name'=>'Water Meter',
				'alert_message'=>$message,
				'alert_date'=>date('Y-m-d'),
				'alert_type'=>'critical',
				'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				$this->Sms_model->insert_water_meter_alerts_notification($msg);
				$access_key=$this->Sms_model->get_access($emp_id);
				//echo $access_key;
				$msg_notif = array
						(
						'body'  => $message,
						'title'     => "Water Meter",
						'vibrate'   => 1,
						'sound'     => 1,
						);
				$fields = array
						(
						'to'=> $access_key,'notification'=> $msg_notif
						);
						//echo json_encode($fields);
				$this->sendPushNotification($fields);
					}

			}			
		}
		//echo $meters['meter_id'];
	}
	// $check_data = $this->Services_model->checkReading($meter_id);
}
function waterLevelAlerts_oberoai(){
	$this->load->model('Services_model');
	$emp_id=27;
	
	$client_id = $this->Services_model->get_clientid($emp_id);
	//print_r($meter_data);
	
		
		
			
			
		 
			$message='Water Level:: Low Water Level';
			$msg=array(
				'client_id'=>$client_id,
				'emp_id'=>$emp_id,
				'hardware_device'=>'19',
				'hardware_id'=>67,
				'alert_name'=>'Water Level',
				'alert_message'=>$message,
				'alert_date'=>date('Y-m-d'),
				'alert_type'=>'critical',
				'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				$this->Sms_model->insert_alerts_notification($msg);
				$access_key=$this->Sms_model->get_access($emp_id);
				//echo $access_key;
				$msg_notif = array
						(
						'body'  => $message,
						'title'     => "Water Level",
						'vibrate'   => 1,
						'sound'     => 1,
						);
				$fields = array
						(
						'to'=> $access_key,'notification'=> $msg_notif
						);
						//echo json_encode($fields);
				$this->sendPushNotification_oberoia($fields);
					

				
		
		//echo $meters['meter_id'];
	
	// $check_data = $this->Services_model->checkReading($meter_id);
}
function clientNotifications(){
	$clients=$this->Sms_model->get_clients();
	foreach($clients->result() as $client){

		$device_data=$this->Sms_model->get_devices_list($client->client_id);
		//print_r($client->client_id);die();
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Sms_model->get_hardwares_device_list($device_data[$i]['hardware_device'],$client->client_id);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}

		// for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
		// 	 //print_r( $hardwares['Water Level']['hardaware_list'][$i]);
		// 	 $this->Sms_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][$i]);

		// }
		// for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
		// 	//print_r( $hardwares['Water Level']['hardaware_list'][$i]);
		// 	$this->Sms_model->get_hardwares_device_data_dg($hardwares['DG']['hardaware_list'][$i]);			

	   	// }
		// for ($i=0; $i <count($hardwares['Power Supply']['hardaware_list']) ; $i++) { 
		// 	$this->Sms_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
		// }
		// for ($i=0; $i <count($hardwares['Power Supply']['hardaware_list']) ; $i++) { 
		// 	$this->Sms_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
		// }
		$this->Sms_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);


	}



}
function clientNotifications_aarush(){
	

		$device_data=$this->Sms_model->get_devices_list(20);
		//print_r($client->client_id);die();
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Sms_model->get_hardwares_device_list($device_data[$i]['hardware_device'],20);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		 for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
			
		 	$this->Sms_model->get_hardwares_device_data_dg($hardwares['DG']['hardaware_list'][$i]);			

	   	 }
		
		for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
			$firepumpdata[$hardwares['Firepump']['hardaware_list'][$i]['dashboard_name']]=$this->Sms_model->get_hardwares_device_data_firepump($hardwares['Firepump']['hardaware_list'][$i]);
		}
		for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
			
			 $this->Sms_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][$i]);

		}
		
			// echo json_encode($firepumpdata);die();

			
		
		// for ($i=0; $i <count($hardwares['Power Supply']['hardaware_list']) ; $i++) { 
		// 	$this->Sms_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
		// }
		// for ($i=0; $i <count($hardwares['Power Supply']['hardaware_list']) ; $i++) { 
		// 	$this->Sms_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
		// }
		//$this->Sms_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);


	



}
function clientNotifications_warangal(){
	$this->load->model('Warangal_data_model');
	$branches=$this->Warangal_data_model->getBranches();
	foreach ($branches as $row) {
		// echo $row['table_name_live']."<br>";
		//$this->Sms_model->water_availability($row);
		$this->Sms_model->high_odour($row);
		//$this->Sms_model->no_footfall($row);
	}
	// echo json_encode($branches);

}

}