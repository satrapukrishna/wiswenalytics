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
        $this->db->where('client_id', 23);
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
	function get_hardwares_device_data_dg($data){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$client_id=$data['client_id'];
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		//$todayDate="2021-08-20";

		$check=$this->Api_data_model->check_data($hardware_name);
		if($check){
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM hardware_station_consumption_data_lonavala WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM hardware_station_consumption_data_lonavala WHERE TxnDate='".$todayDate."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM `hardware_station_consumption_data_lonavala` WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM `hardware_station_consumption_data_lonavala` WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata['fadd']=$dataAdd[0]->fadd;


		$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM `hardware_station_consumption_data_lonavala` WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
		//echo $queryRuntimes;die();
		$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

		$queryRuntimes="SELECT TxnTime FROM `hardware_station_consumption_data_lonavala` WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
		

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
			$message=$hardware_name.':: Fuel Drop of '".$resdata['fadd']."' Liters on '.$todayDate;
			
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
					$this->Sms_model->insert_alerts_notification($msg);
				}

				
		}
		if($resdata['fadd']>0){
			$message=$hardware_name.':: Fuel Added '".$resdata['fadd']."' Liters on '.$todayDate;
			
			$msg=array(
				'client_id'=>$client_id,
				'hardware_device'=>$hardware_device,
				'hardware_id'=>$hardware_id,
				'alert_name'=>'Fuel Added',
				'alert_message'=>$message,
				'alert_date'=>$todayDate,
				'alert_type'=>'moderate',
				'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				$check_notif=$this->Sms_model->check_notification($msg);
				if(count($check_notif)==0){
					$this->Sms_model->insert_alerts_notification($msg);
				}

				
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
				'alert_read'=>0,
				'status'=>1,
				'created_date'=>date('Y-m-d H:i:s')
				);
				$check_notif=$this->Sms_model->check_notification($msg);
				if(count($check_notif)==0){
					$this->Sms_model->insert_alerts_notification($msg);
				}


		   }

		}
	}

	function get_hardwares_device_data_waterlevelmeter($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$capacity=$data['capacity'];
		$client_id=$data['client_id'];
		$hardware_device=$data['hardware_device'];
		$hardware_id=$data['hardware_id'];
		$todayDate=date("Y-m-d");
		
		
		$check=$this->Api_data_model->check_data($utilityName);
		//echo $check;die();
		if($check){
			
		$querywaterlevel="SELECT `CurReading` FROM `hardware_station_consumption_data_lonavala` WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $querywaterlevel;
		$datawaterlevel = $this->db->query($querywaterlevel)->result();
		$waterlevel=$datawaterlevel[0]->CurReading;

		$resdata['meter']=$hardware_name;
		$resdata['capacity']=round($capacity/1000);
		$resdata['currentlevel']=round($waterlevel/1000,2);
		$resdata['filledpercent']=round(($waterlevel/$capacity)*100,2);
		$resdata['filledpercent_1']=round(($waterlevel/$capacity)*100);
		
		if($resdata['filledpercent_1']<30){
			$message=$hardware_name.':: Low water level alert (Below 30%)';
			$msg=array(
				'client_id'=>$client_id,
				'hardware_device'=>$hardware_device,
				'hardware_id'=>$hardware_id,
				'alert_name'=>$hardware_name,
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

				
		}

		

		}

	}
	function check_notification($data){
		$query="SELECT * FROM alerts where client_id='".$data['client_id']."' and hardware_device='".$data['hardware_device']."' and hardware_id='".$data['hardware_id']."' and alert_date='".$data['alert_date']."' and alert_name='".$data['alert_name']."' and alert_read='".$data['alert_read']."' ";
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
	function insert_alerts_notification($data){
		if (count($data) > 0) {
            $res = $this->db->insert('alerts', $data);
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
	//echo $query;die();
	    $this->db->query($query);

}
	
}