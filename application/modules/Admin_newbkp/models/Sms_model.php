<?php
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
	function get_clients()
    {        
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_id', 20);
        $user = $this->db->get();
        return $user;
    }
	function get_devices_list($client_id){
		$this->db->select('hardware_device');
        $this->db->from('hardware');       
        
		$this->db->where('client_id',$client_id);  
		$this->db->where('status',1);
		//$this->db->where('hardware_category',$cat_id);
        $this->db->group_by('hardware_device');
        $res = $this->db->get()->result_array();               
        return $res;
	}
	function get_hardwares_device_list($device_id,$client_id){
		$this->db->select('');
        $this->db->from('hardware as h');        
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		
		$this->db->where('h.client_id',$client_id);
		if($device_id!=''){
			$this->db->where('h.hardware_device',$device_id);
		}	 
		
		$this->db->where('h.status',1);	  
        // $this->db->group_by('h.hardware_device');
        $res = $this->db->get()->result_array();  
		// echo $this->db->last_query();exit;
        return $res;
	}
	function check_data($name){
		$this->db->select('');
        $this->db->from('hardware_station_consumption_data_lonavala');        
        $this->db->where('UtilityName', $name);
		
		 $res = $this->db->get();             
        return $res->num_rows();
	}
	function get_access($emp_id){
		
		
		$this->db->select('fb_token');
        $this->db->from('access_token');  
		$this->db->where('emp_id', $emp_id);     
		$this->db->order_by("created_date", "desc");
		$this->db->limit(1); 
        $res = $this->db->get()->row_array();               
        return $res['fb_token'];
	}
	function get_table_name($c_id) {
        $this->db->select('db_table');
        $this->db->from('clients');
        $this->db->where('station_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['db_table'];
    }
	function get_meter_list($table_name){
		$this->db->select('');
        $this->db->from($table_name);     
        $this->db->where('MeterName','Status Monitor'); 
         $this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_hardwares_device_data_switch_status($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$client_id=$data['client_id'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_meter_list($table_name);
		$i=0;
		$mcb = array("DG Room", "Mains");
		foreach($meter_list as $meters){
			if (in_array($meters['LocationName'], $mcb)){
				if($meters['LocationName']=="Mains"){
					$utilityName='Electricity';
				}else{
					$utilityName='Diesel Generator';
				}
				$mcboff="SELECT `CurReading`,TxnTime FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb-Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcboffdata = $this->db->query($mcboff)->result_array();

				$mcbon="SELECT `CurReading`,TxnTime FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb On' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbondata = $this->db->query($mcbon)->result_array();
				
				$mcbtrip="SELECT `CurReading`,TxnTime FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb Trip' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbtripdata = $this->db->query($mcbtrip)->result_array();
				
				$yphase="SELECT `CurReading`,TxnTime FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='Y-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$yphasedata = $this->db->query($yphase)->result_array();
				//echo $yphase;die();
				$rphase="SELECT `CurReading`,TxnTime FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='R-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$rphasedata = $this->db->query($rphase)->result_array();
				//echo $rphasedata[0]['CurReading'];die();
				$bphase="SELECT `CurReading`,TxnTime FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='B-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$bphasedata = $this->db->query($bphase)->result_array();

				$resdata[$i]['meter']=$meters['LocationName'];
				
              if($meters['LocationName']=="Mains"){
				if($mcboffdata[0]['CurReading']==0 && $mcbondata[0]['CurReading']==1){
					$resdata[$i]['status']='On';
				}else{
					$message=$meters['LocationName'].':: Power Supply Off '.$todayDate." ".$mcbondata[0]['TxnTime'];
			
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Power Supply',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						$check_notif=$this->Sms_model->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
						}
					//$resdata[$i]['status']='Off';
				}

				if($mcbtripdata[0]['CurReading']==0){
					$resdata[$i]['trip']='no';
				}else{
					$message=$meters['LocationName'].':: Has Trip on '.$todayDate." ".$mcbtripdata[0]['TxnTime'];
			        $mobile="9959451265";
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Trip',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						$check_notif=$this->Sms_model->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
							// smssend( $mobile, $message );
						}
				}

				$resdata[$i]['phase']['meter']=$meters['LocationName'];
				if($yphasedata[0]['CurReading']==1){
					$resdata[$i]['phase']['yphase']='on';
				}else{
					$message=$meters['LocationName'].':: Y-Phase  Off on '.$todayDate." ".$yphasedata[0]['TxnTime'];
			
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Phase',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						$check_notif=$this->Sms_model->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
							// smssend( $mobile, $message );
						}
				}
				if($rphasedata[0]['CurReading']==1){
					$resdata[$i]['phase']['rphase']='on';
				}else{
					$message=$meters['LocationName'].':: R-Phase  Off on '.$todayDate." ".$rphasedata[0]['TxnTime'];
			
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Phase',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						$check_notif=$this->Sms_model->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
							// smssend( $mobile, $message );
						}
				}
				if($bphasedata[0]['CurReading']==1){
					$resdata[$i]['phase']['bphase']='on';
				}else{
					$message=$meters['LocationName'].':: B-Phase  Off on '.$todayDate." ".$bphasedata[0]['TxnTime'];
			
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Phase',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						$check_notif=$this->Sms_model->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
							// smssend( $mobile, $message );
						}
				}
			}


			}else{
				 if($meters['LocationName']!='Hyd.Pneu.System'){
				$poff="SELECT `CurReading`,`TxnTime` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$poffdata = $this->db->query($poff)->result_array();

				$pon="SELECT `CurReading`,`TxnTime` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power On' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
				$pondata = $this->db->query($pon)->result_array();

				$trip="SELECT `CurReading`,`TxnTime` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Trip' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
				$tripdata = $this->db->query($trip)->result_array();
			//echo "Meter:".$meters['LocationName']." poff:".$poffdata[0]['CurReading']." pon:".$pondata[0]['CurReading']."<br>";
				//$resdata[$i]['meter']=$meters['LocationName'];
				
				if($poffdata[0]['CurReading']==0 && $pondata[0]['CurReading']==1){
					//print_r($poffdata[0]['TxnTime']);
					//$resdata[$i]['status']='On';
				}else{
					//print_r($poffdata[0]['TxnTime']);
					$message=$meters['LocationName'].':: Power Supply off on '.$todayDate." ".$poffdata[0]['TxnTime'];
			
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Power Supply',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						//echo json_encode($msg);die();
						$check_notif=$this->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
							// smssend( $mobile, $message );
						}
				}
				if($tripdata[0]['CurReading']==0){
					$resdata[$i]['trip']='no';
				}else{
					$message=$meters['LocationName'].':: Has Trip on '.$todayDate." ".$poffdata[0]['TxnTime'];
			
					$msg=array(
						'client_id'=>$client_id,
						'emp_id'=>"27",
						'hardware_device'=>$hardware_device,
						'hardware_id'=>$hardware_id,
						'alert_name'=>'Phase',
						'alert_message'=>$message,
						'alert_date'=>$todayDate,
						'alert_type'=>'critical',
						'alert_read'=>0,
						'status'=>1,
						'created_date'=>date('Y-m-d H:i:s')
						);
						$check_notif=$this->Sms_model->check_notification($msg);
						if(count($check_notif)==0){
							$this->Sms_model->insert_alerts_notification($msg);
							// smssend( $mobile, $message );
						}
				}
			}
			}
			
			  $i++;

			


		}
		//echo json_encode($resdata);die();
		//die();
		//return $resdata;
	}
	function get_hardwares_device_data_firepump($data){
		//print_r($data);die();
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		//echo $table_name;die();
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$meterserial=$data['UomName'];

		$client_id=$data['client_id'];
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		

		$todayDate=date('Y-m-d');
		 //$todayDate='2021-12-31';
		 //$mobile="9959451265,7799399299,9966084984";
		 $mobile="9959451265";
      
		$resultArray=array();
		if($meterserial=='71'){
			$firepumpList[0]['fire_pump_name']='Panel Power Supply';
			$firepumpList[1]['fire_pump_name']='Jockey Pump';
			$firepumpList[2]['fire_pump_name']='Main Pump';
			$firepumpList[3]['fire_pump_name']='Diesel Engine Driven Pump';
			$i=0;
			foreach($firepumpList as $list){
				if($list['fire_pump_name']=='Jockey Pump'){
					$runn_status_query="SELECT Consumption,TxnTime FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc";

					$run_status_data = $this->db->query($runn_status_query)->result_array();
					for ($k=0; $k < count($run_status_data); $k++) { 
						if($run_status_data[$k]['Consumption']>0){
							//$message=$hardware_name.':: Pump On Alert -'.$list['fire_pump_name'].' is ON on at '.$todayDate." ".$run_status_data[$k]['TxnTime'];

							$message=$hardware_name.":: Pump On Alert - ".$list['fire_pump_name']." is ON on at ".$todayDate." ".$run_status_data[$k]['TxnTime']."
From WISIOT";
							$msg=array(
								'client_id'=>$client_id,
								'hardware_device'=>$hardware_device,
								'hardware_id'=>$hardware_id,
								'alert_name'=>'Pump On',
								'alert_message'=>$message,
								'alert_date'=>$todayDate,
								'alert_type'=>'moderate',
								'alert_read'=>0,
								'alert_time'=>$run_status_data[$k]['TxnTime'],
								'status'=>1,
								'created_date'=>date('Y-m-d H:i:s'),
								//'created_date'=>$todayDate
								);
								$check_notif=$this->Sms_model->check_notification($msg);
								if(count($check_notif)==0){
									$access_key=$this->get_access(21);
								//echo $access_key;
								$msg_notif = array
										(
										'body'  => $message,
										'title'     => "Pump On",
										'vibrate'   => 1,
										'sound'     => 1,
										);
								$fields = array
										(
										'to'=> $access_key,'notification'=> $msg_notif
										);
										//echo json_encode($fields);
									 $this->sendPushNotification_aaurush($fields);
									$this->Sms_model->insert_alerts_notification($msg);
									smssend( $mobile, $message );
									$this->sendMail_aaurush($message,'Pump On',$todayDate);
								}
						}
					}
					$pressure_today="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
				   //echo $pressure;die();
					$pressuredata_today = $this->db->query($pressure_today)->result_array();
					$rn_today=0;
					for ($n=0; $n < count($pressuredata_today); $n++) { 
						

						if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>4){
							$message=$hardware_name.':: Low Pressure( '.$pressuredata_today[$n]['pressure'].') on '.$todayDate." ".$pressuredata_today[$n]['TxnTime'];
							$msg=array(
								'client_id'=>$client_id,
								'hardware_device'=>$hardware_device,
								'hardware_id'=>$hardware_id,
								'alert_name'=>'Low Pressure',
								'alert_message'=>$message,
								'alert_date'=>$todayDate,
								'alert_type'=>'critical',
								'alert_read'=>0,
								'status'=>1,
								'alert_time'=>$pressuredata_today[$n]['TxnTime'],
								'created_date'=>date('Y-m-d H:i:s'),
								//'created_date'=>$todayDate
								);
								$check_notif=$this->Sms_model->check_notification($msg);
								if(count($check_notif)==0){
									$access_key=$this->get_access(21);
								//echo $access_key;
								$msg_notif = array
										(
										'body'  => $message,
										'title'     => "Low Pressure",
										'vibrate'   => 1,
										'sound'     => 1,
										);
								$fields = array
										(
										'to'=> $access_key,'notification'=> $msg_notif
										);
										//echo json_encode($fields);
									 $this->sendPushNotification_aaurush($fields);
									 $this->sendMail_aaurush($message,'Low Pressure',$todayDate);
									//  smssend( $mobile, $message );
									$this->Sms_model->insert_alerts_notification($msg);
								}
								//echo json_encode($msg);
						}
						
						
					}
					
				
			
					
					
					
				
					
					$i++;



				}
				

				
   
		   }
		   	
				
		}else{
			$firepumpList2[0]['fire_pump_name']='Jockey Pump';
			$firepumpList2[1]['fire_pump_name']='Diesel Engine Driven Pump';
			$i=0;
			foreach($firepumpList2 as $list){
				if($list['fire_pump_name']=='Jockey Pump'){
					



				}else{
					
				}
				

				
   
		   }
			
			
			
			
		}
		
	
		
		
		


	}
	function get_hardwares_device_data_dg($data){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$client_id=$data['client_id'];
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		//$todayDate="2021-12-21";
		$table_name=$this->get_table_name($station_id);
		
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT Consumption,TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled' and Consumption>0";
		//echo $queryFadd;
		$dataAdd = $this->db->query($queryFadd)->result();
		$add=0;
		for ($k=0; $k < count($dataAdd); $k++) { 
			$faddtime=$dataAdd[$k]->TxnTime;
			$add+=$dataAdd[$k]->Consumption;

		}
		$resdata['fadd']=$add;

//echo $add;die();
		$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
		//echo $queryRuntimes;die();
		$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

		$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
		

		$dataRunTimes = $this->db->query($queryRuntimes)->result();
		$runarray=array();
		for ($i=0; $i < count($dataRunTimes) ; $i++) { 
			array_push($runarray,$dataRunTimes[$i]->TxnTime);
		}
		$fremove=0;



		foreach ($dataNonRunTimes as $item)
        { 
			
			
                if (!in_array($item->TxnTime, $runarray))
                {
					//echo $item->PrvReading."----".$item->CurReading."<br>"; 
					$fm= $item->PrvReading-$item->CurReading;
					if($fm>3){
						$fremove+=$fm;
					}
					
                }
        }
		
		
		$resdata['fremove']=$fremove;
		$resdata['fconsume1']=round($dataStartEndFuel[0]->start+$resdata['fadd']-$dataStartEndFuel[0]->end-$resdata['fremove'],2);
		if($resdata['fconsume1'] <= 0 || $dataRunn[0]->run==0){
			$finaleco =0;
			$resdata['fconsume']=0;
			//return 0;
		}
		else{
			$resdata['fconsume']=$resdata['fconsume1'];
			
			
		}
		
		if($resdata['fremove']>0){
			$message=$hardware_name.':: Fuel Drop of '.$resdata['fadd'].' Liters on '.$todayDate;
			
			$msg=array(
				'client_id'=>$client_id,
				'hardware_device'=>$hardware_device,
				'hardware_id'=>$hardware_id,
				'alert_name'=>'Fuel Removed',
				'alert_message'=>$message,
				'alert_date'=>$todayDate,
				'alert_type'=>'moderate',
				'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				$check_notif=$this->Sms_model->check_notification($msg);
				if(count($check_notif)==0){
					$access_key=$this->get_access(21);
				//echo $access_key;
				$msg_notif = array
						(
						'body'  => $message,
						'title'     => "Fuel Removed",
						'vibrate'   => 1,
						'sound'     => 1,
						);
				$fields = array
						(
						'to'=> $access_key,'notification'=> $msg_notif
						);
						//echo json_encode($fields);
				    $this->sendPushNotification_aaurush($fields);
					$this->Sms_model->insert_alerts_notification($msg);
					smssend( $mobile, $message );
					$this->sendMail_aaurush($message,'Fuel Removed',$todayDate);
				}

				
		}
		if($resdata['fadd']>0){
			$message=$hardware_name.':: Fuel Added '.$resdata['fadd'].' Liters on '.$todayDate." ".$faddtime;
			
			$msg=array(
				'client_id'=>$client_id,
				'hardware_device'=>$hardware_device,
				'hardware_id'=>$hardware_id,
				'alert_name'=>'Fuel Added',
				'alert_message'=>$message,
				'alert_date'=>$todayDate,
				'alert_type'=>'moderate',
				//'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				//echo json_encode($msg);
				$check_notif=$this->Sms_model->check_notification($msg);
				if(count($check_notif)==0){
					$access_key=$this->get_access(21);
				//echo $access_key;
				$msg_notif = array
						(
						'body'  => $message,
						'title'     => "Fuel Added",
						'vibrate'   => 1,
						'sound'     => 1,
						);
				$fields = array
						(
						'to'=> $access_key,'notification'=> $msg_notif
						);
						//echo json_encode($fields);
				     $this->sendPushNotification_aaurush($fields);
					$this->Sms_model->insert_alerts_notification($msg);
					smssend( $mobile, $message );
					$this->sendMail_aaurush($message,'Fuel Added',$todayDate);
				}

				
		}
		
	
		
		
		

		
		
	}
	function get_hardwares_device_data_power($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$client_id=$data['client_id'];
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		//$todayDate="2021-08-20";

		$check=$this->Api_data_model->check_data('Electricity Board');
		if($check){
			$queryeb="SELECT `CurReading` FROM `hardware_station_consumption_data_lonavala` WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='Electricity Board' AND `LineConnected`='E.B. Supply' ORDER BY TxnTime DESC LIMIT 1";

			$querydg="SELECT `CurReading` FROM `hardware_station_consumption_data_lonavala` WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='Diesel Generator' AND `LineConnected`='D.G. Supply' ORDER BY TxnTime DESC LIMIT 1";
			$dataEB = $this->db->query($queryeb)->result();
			$dataDG = $this->db->query($querydg)->result();
           if($dataEB[0]->CurReading==1 && $dataDG[0]->CurReading==1){
			$message=$hardware_name.':: It has Trip';
			$msg=array(
				'client_id'=>$client_id,
				'hardware_device'=>$hardware_device,
				'hardware_id'=>$hardware_id,
				'alert_name'=>'Trip Status',
				'alert_message'=>$message,
				'alert_date'=>$todayDate,
				'alert_type'=>'critical',
				//'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				$check_notif=$this->Sms_model->check_notification($msg);
				if(count($check_notif)==0){
					$this->Sms_model->insert_alerts_notification($msg);
					// smssend( $mobile, $message );
				}


		   }

		}
	}
	function sendPushNotification_aaurush($fields = array())
	{
		//define( 'API_ACCESS_KEY', 'AAAAa6LIPPI:APA91bEB9xXHdpnw4sE6XXOV6RTE0c_lR5v5wzDSGbDnl6OqEcmHVQ5kDORIiJvCdu6E1avfcJ4B-RnDMePf9av8uqK2HegF5VAY2iPf2nOQqvRnlEEKWYMN2mOU0IgPakourQoAuHYR' );
	
	
		$headers = array
		(
			'Authorization: key=AAAAwhrQACA:APA91bFcifVaoywM2GAaqZXaVyDtWrzAnqDxc7dNxu-VuT23eet0zkFXBOMIAXyvUdhor6b2LVSdEA86ebCKCh7qLrHbQPH0A1nCXPX-x0kK8vlrqqWx6f7ds4k5_KIVw_q16Qx9slUy',
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
	function sendMail_aaurush($msg,$alert_name,$date){

		//$date = date('Y-m-d',strtotime("-1 days"));
		

		   $msg_data =   "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Hi,</b><br>";
		   $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Date: ".$date." </b><br>";
		   $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Client Name : 
		   Aarush Logistics Park</b><br>";
		   $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Alert Name : 
		   ".$alert_name."</b><br>";
		   $msg_data.= "<div style='font-size: 13px;font-family: arial; line-height: 25px;'> 
		   ".$msg."</div>";
		  $msg_data.= '<br>Thanks and Regards,<br />Wenalytics Team<br />';
		   echo $msg_data;
		   $config = Array(
	   'protocol' => 'smtp',
	   'smtp_host' => 'ssl://smtp.googlemail.com',
	   'smtp_port' => 465,
	   'smtp_user' => 'wenalyticsiot2022@gmail.com',
	   'smtp_pass' => 'bfzopxbwgawwjner',
	   'mailtype'  => 'html', 
	   'charset' => 'utf-8',
	   'wordwrap' => TRUE

   );
   // echo $msg_data;die();
   $this->load->library('email');
   $this->email->initialize($config);   
   $this->email->set_newline("\r\n"); 
   $this->email->set_mailtype("html");   
   $this->email->from('Wenalytics@gmail.com', 'Wenalytics');
   
   $list = array('krishna3175@wenalytics.com','sunilmanohar@wenalytics.com','Madhan.RajR@ap.jll.com','divyani.devaliya@firstspacedevelopment.in','dinesh.malokar@firstspacedevelopment.in','sivaprathab.r@firstspacedevelopment.in','hriday@wenalytics.com');
   
   //$list = array('krishna3175@gmail.com');
   $this->email->to($list);
   $this->email->subject('Daily Mail');
   $this->email->message($msg_data);
   

   $this->email->send();
	}
	function sendPushNotification_oberoi($fields = array())
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
	function sendPushNotification_oberoi_water($fields = array())
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
	function sendPushNotification_lonovala($fields = array())
	{
		//define( 'API_ACCESS_KEY', 'AAAAa6LIPPI:APA91bEB9xXHdpnw4sE6XXOV6RTE0c_lR5v5wzDSGbDnl6OqEcmHVQ5kDORIiJvCdu6E1avfcJ4B-RnDMePf9av8uqK2HegF5VAY2iPf2nOQqvRnlEEKWYMN2mOU0IgPakourQoAuHYR' );
	
	
		$headers = array
		(
			'Authorization: key=AAAAgKAab_c:APA91bESSUXMLmlhKuapuL81u4D9PqpM7W1TPGEuauvaL6Sx1b1_xAP5nqBRj_cX1OhR1cUzDpJ3XXri6LYq3Nu4tYqSaKmgE6f7_z32MnocLjCkUxx9HcogyFDIGeUJILynFOEIrkHu',
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
	function get_hardwares_device_data_waterlevelmeter($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$capacity=$data['capacity'];
		$client_id=$data['client_id'];
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		
		//$check=$this->Api_data_model->check_data($utilityName);
		//echo $check;die();
		//if($check){
			
		$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $querywaterlevel;
		$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
		// if($locationName=='Fire Water Sump'){
		// 	$waterlevel=$datawaterlevel[0]['CurReading']*1.61;
		// }else if($locationName=='Dom. Water Sump'){
		// 	$waterlevel=$datawaterlevel[0]['CurReading']*2.8;
		// }else{
		// 	$waterlevel=$datawaterlevel[0]['CurReading'];
		// }
		if($datawaterlevel[0]['CurReading']==''){
			//echo "no";
		}else{
			if($locationName=='Fire Water Sump'){
				$waterlevel=$datawaterlevel[0]['CurReading']*1.33;
			}else if($locationName=='Dom. Water Sump'){
				$waterlevel=$datawaterlevel[0]['CurReading']*3.05;
			}else if($locationName=='Fire-3'){
				$waterlevel=$datawaterlevel[0]['CurReading']*1.5;
				//$waterlevel=$datawaterlevel[0]['CurReading']/1.137;
			}else if($locationName=='Fire Tank-1'){
				$waterlevel=$datawaterlevel[0]['CurReading']*3.5;
				//$waterlevel=$datawaterlevel[0]['CurReading']*2.26;
			}else if($locationName=='Raw Water'){
				$waterlevel=$datawaterlevel[0]['CurReading']*0.66;
				// $waterlevel=$datawaterlevel[0]['CurReading']*0.57;
				// $waterlevel=$datawaterlevel[0]['CurReading']*0.83;
			}else{
				$waterlevel=$datawaterlevel[0]['CurReading'];
			}
			//$waterlevel=$datawaterlevel[0]->CurReading;
	
			$resdata['meter']=$dashboardName;
			$resdata['capacity']=round($capacity/1000);
			$resdata['currentlevel']=round($waterlevel/1000,2);
			$resdata['filledpercent']=round(($waterlevel/$capacity)*100,2);
			$resdata['filledpercent_1']=round(($waterlevel/$capacity)*100);
			
			if($resdata['filledpercent_1']<30  && $resdata['filledpercent_1']>0){
				$message=$dashboardName.':: Low water level alert (Below 30%)';
				$msg=array(
					'client_id'=>$client_id,
					//'emp_id'=>21,
					'hardware_device'=>$hardware_device,
					'hardware_id'=>$hardware_id,
					'alert_name'=>$dashboardName,
					'alert_message'=>$message,
					'alert_date'=>$todayDate,
					'alert_type'=>'critical',
					'alert_read'=>0,
					'status'=>1,
					'created_date'=>date('Y-m-d H:i:s')
					);
					$check_notif=$this->check_notification($msg);
					if(count($check_notif)==0){
						$access_key=$this->get_access(21);
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
						$this->sendPushNotification_aaurush($fields);
						$this->Sms_model->insert_alerts_notification($msg);
						smssend( $mobile, $message );
						$this->sendMail_aaurush($message,'Water Level',$todayDate);
					}
	
					
			}
		}
		

	}
	function water_availability($data){
	$today=date("Y-m-d");
	$table_name=$data['table_name_live'];
     $queryc="SELECT COUNT(*) as c FROM $table_name WHERE TxnDate ='".$today."'";
	 $resc=$this->db->query($queryc)->result_array();
	 //echo $data['branch']."-".$resc[0]['c']."<br>";
	 if($resc[0]['c']>0){
		$query="SELECT CurReading,TxnTime FROM $table_name WHERE TxnDate='".$today."' AND LineConnected='Water Level' order by TxnTime desc  LIMIT 1";
		$res=$this->db->query($query)->result_array();
		if($res[0]['CurReading']<=0){
		   $message=$data['branch'].':: No water Availability. From WISIOT';
		  // echo $message."-".$res[0]['TxnTime']."<br>";
		  $mobile='9959451265';
		//   $mobile='9959451265,7799399299,9000172555,9000944923,9701999689,8500559853,7680888384,9701999658,9866236713,8297000029';
		   $msg=array(
			   'alert_time'=>$res[0]['TxnTime'],
			   'alert_name'=>$data['branch'],
			   'alert_message'=>$message,
			   'alert_date'=>$today,
			   'alert_type'=>'critical',
			   'alert_read'=>0,
			   'status'=>1,
			   'created_date'=>date('Y-m-d H:i:s')
			   );
			   $check_notif=$this->check_notification_wrlng($msg);
			   
			    //$start = strtotime($check_notif[0]['alert_time']);
				//$end = strtotime($res[0]['TxnTime']);
				//$mins = ($end - $start) / 60;
				// echo $mins."<br>";die();

			   if(count($check_notif)==0){
				// if(count($check_notif)==0 || $mins>30){
				$this->Sms_model->insert_alerts_notification_wrngl($msg);
				smssend( $mobile, urlencode($message) ,1407167230380177324);
			   }
			   
			   //smssend( $mobile, $message,1407167230380177324 );
		}
	 }
     

	//  print_r($res);
	//  echo $res['CurReading'];
	//  echo $query."<br>"; 
	}
	function high_odour($data){
		$today=date("Y-m-d");
		$table_name=$data['table_name_live'];
		
		 $od_male="SELECT CurReading,TxnTime FROM $table_name WHERE  TxnDate = '".$today."' and LineConnected='Odour Male' AND CurReading>120  ";
		 //echo $od_male;

	  	$od_female="SELECT CurReading,TxnTime FROM $table_name WHERE  TxnDate = '".$today."' and LineConnected='Odour Female' AND CurReading>120  ";

		//   echo $od_female."<br>";
		$od_maledata = $this->db->query($od_male)->result_array();

		$od_femaledata = $this->db->query($od_female)->result_array();
		// echo json_encode($od_femaledata);
		for ($i=0; $i < count($od_maledata); $i++) { 
			if($od_maledata[$i]['CurReading']>250){
				$tt=$od_maledata[$i]['CurReading'].'ppm '.$od_maledata[$i]['TxnTime'];
				$message=$data['branch'].':: High Male Odour level alert '.$tt.'.From WISIOT ';
				$mobile='9959451265,7799399299,9000172555,9000944923,9701999689,8500559853,7680888384,9701999658,9866236713,8297000029';
		   $msg=array(
			   'alert_time'=>$od_maledata[$i]['TxnTime'],
			   'alert_name'=>$data['branch'],
			   'alert_message'=>$message,
			   'alert_date'=>$today,
			   'alert_type'=>'critical',
			   'alert_read'=>0,
			   'status'=>1,
			   'created_date'=>date('Y-m-d H:i:s')
			   );
			   $check_notif=$this->check_notification_wrlng($msg);
			   if(count($check_notif)==0){
				$this->Sms_model->insert_alerts_notification_wrngl($msg);
				smssend( $mobile, urlencode($message) ,1407167230419638357);
			   }
			 }
		}
		for ($i=0; $i < count($od_femaledata); $i++) {
		 if($od_femaledata[$i]['CurReading']>120){
			$message=$data['branch'].':: High Female Odour level alert '.$od_femaledata[$i]['CurReading'].'ppm '.$od_femaledata[$i]['TxnTime'].'.From WISIOT ';
			$mobile='9959451265,7799399299,9000172555,9000944923,9701999689,8500559853,7680888384,9701999658,9866236713,8297000029';
		   $msg=array(
			   'alert_time'=>$od_femaledata[$i]['TxnTime'],
			   'alert_name'=>$data['branch'],
			   'alert_message'=>$message,
			   'alert_date'=>$today,
			   'alert_type'=>'critical',
			   'alert_read'=>0,
			   'status'=>1,
			   'created_date'=>date('Y-m-d H:i:s')
			   );
			   $check_notif=$this->check_notification_wrlng($msg);
			   if(count($check_notif)==0){
				$this->Sms_model->insert_alerts_notification_wrngl($msg);
				smssend( $mobile, urlencode($message) ,1407167825739208068);
			   }
		 }
		}
	
		//  print_r($res);
		//  echo $res['CurReading'];
		//  echo $query."<br>"; 
		}
		function no_footfall($data){
			$today=date("Y-m-d");
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			$table_name=$data['table_name_live'];
			$table_name_p=$data['table_name'];
			$queryc="SELECT COUNT(*) as c FROM $table_name WHERE TxnDate ='".$today."'";
	 		$resc=$this->db->query($queryc)->result_array();

			 $querycy="SELECT COUNT(*) as c FROM $table_name_p WHERE TxnDate ='".$yesterDay."'";
			 $rescy=$this->db->query($querycy)->result_array();
// echo $resc[0]['c']."oo".$rescy[0]['c'];
             if($resc[0]['c']>0 && $rescy[0]['c']>0){

				$querymaletoday="select round(SUM(Consumption)/2) as Consumption FROM $table_name where TxnDate = '".$today."' and LineConnected IN('Footfall Male','Footfall Female') ";
				$resmaletoday=$this->db->query($querymaletoday)->result_array();

				$querymaleyest="select round(SUM(Consumption)/2) as Consumption FROM $table_name_p where TxnDate = '".$yesterDay."' and LineConnected IN('Footfall Male','Footfall Female') ";
				$resmaleyest=$this->db->query($querymaleyest)->result_array();
				$mt=$resmaletoday[0]['Consumption']+$resmaleyest[0]['Consumption'];
				
				
				if($mt<0){
					$message=$data['branch'].':: No Footfall in Washroom from Last Two days. From WISIOT';
		  // echo $message."-".$res[0]['TxnTime']."<br>";
		  $mobile='9959451265,7799399299,9000172555,9000944923,9701999689,8500559853,7680888384,9701999658,9866236713,8297000029';
		   $msg=array(
			   'alert_time'=>$res[0]['TxnTime'],
			   'alert_name'=>$data['branch'],
			   'alert_message'=>$message,
			   'alert_date'=>$today,
			   'alert_type'=>'critical',
			   'alert_read'=>0,
			   'status'=>1,
			   'created_date'=>date('Y-m-d H:i:s')
			   );
			   $check_notif=$this->check_notification_wrlng($msg);
			   if(count($check_notif)==0){
				$this->Sms_model->insert_alerts_notification_wrngl($msg);
				smssend( $mobile, urlencode($message) ,1407167230365211467);
			   }
				}

			 }
			
			}
	function check_notification_wrlng($data){
		$query="SELECT * FROM alerts_warangal where  alert_date='".$data['alert_date']."'  and alert_time='".$data['alert_time']."' and alert_name='".$data['alert_name']."' and alert_message='".$data['alert_message']."' ";
            // echo $query;die()
		$res=$this->db->query($query)->result_array();
		return $res;

	}
	function check_notification($data){
		$query="SELECT * FROM alerts where client_id='".$data['client_id']."' and hardware_device='".$data['hardware_device']."' and hardware_id='".$data['hardware_id']."' and alert_date='".$data['alert_date']."'  and alert_name='".$data['alert_name']."' and alert_message='".$data['alert_message']."' ";
            // echo $query;die()
		$res=$this->db->query($query)->result_array();
		return $res;

	}
	function getFirepampAlertsData($data){
		$station_id=$data['station_id'];
		$api_name=$data['api_name'];
		$LineConnected=$data['LineConnected'];
		
        // $todayDate=date('Y-m-d');
        $todayDate='2020-07-11';
        
		$resultArray=array();
       
            $query="SELECT * FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime DESC limit 1";
            
			$res=$this->db->query($query)->result();
			
			$query1="SELECT sum(Consumption)as total_consumption FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'";
            
			$res1=$this->db->query($query1)->result();
			
            if(count($res)>0){
				$resultArray['meter']=$api_name;
				$resultArray['RunningStatus']=$res[0]->Consumption;
				$resultArray['LineConnected']=$res[0]->LineConnected;
				$resultArray['TxnDate']=$res[0]->TxnDate;
				$resultArray['TxnTime']=$res[0]->TxnTime;
				$resultArray['total_consumption']=$res1[0]->total_consumption;
			}
			
        // echo "<pre>";print_r($resultArray);
       return $resultArray;
	}
	function insert_alertsdata($data){
		// print_r($data);die();
		if (count($data) > 0) {
            $res = $this->db->insert('firepump_alerts_data', $data);
            return $res;
        }
        return false;
	}
	function insert_water_meter_alerts_notification($data){
		if (count($data) > 0) {
            $res = $this->db->insert('water_meter_alerts', $data);
            return $res;
        }
        return false;
	}
	function insert_alerts_notification($data){
		if (count($data) > 0) {
            $res = $this->db->insert('alerts', $data);
            return $res;
        }
        return false;
	}
	function insert_alerts_notification_wrngl($data){
		if (count($data) > 0) {
            $res = $this->db->insert('alerts_warangal', $data);
			// echo $this->db->last_query();exit; 
            return $res;
        }
        return false;
	}
	function getFirepampAlertsData_check($data){
		 $query="SELECT * FROM firepump_alerts_data where client_id='".$data['client_id']."' and device_id='".$data['device_id']."' and UtilityName='".$data['UtilityName']."' and TxnDate='".$data['TxnDate']."' and alert_name='".$data['alert_name']."' order by TxnTime DESC limit 1";
            // echo $query;die()
		$res=$this->db->query($query)->result_array();
		return $res;
	}
function deleteAlertData(){
			$date = date('Y-m-d',strtotime("-2 days"));
	$query="delete from firepump_alerts_data where TxnDate< '".$date."'";
	    $this->db->query($query);

}
	
}