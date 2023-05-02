<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMSController extends MX_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('Sms_model');
	$this->load->model('Services_model');
	$this->load->helper('sms_helper');

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

}
