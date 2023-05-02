<?php
class Services_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
    function get_employee_by_email($to, $data = array())
    {        
        $this->db->select($data);
        $this->db->from('employees');
        $this->db->where('email_id', $to);
        $user = $this->db->get()->row_array();
       
        return $user;
    }

    function get_employee_by_id($id)
    {        
        $this->db->select();
        $this->db->from('employees');
        $this->db->where('emp_id', $id);
        $this->db->where('status', 1);
        $user = $this->db->get()->row_array();
       // echo $this->db->last_query();exit;
        //echo "<pre>";print_r($user);exit;
        return $user;
    }
	
	 function update_employee($emp_id, $emp_data)
    {
        if ($emp_id != '' && count($emp_data) > 0)
        {
            $res = $this->db->update('employees', $emp_data, array('emp_id' => $emp_id));
            return $res;
        } else
        {
            return false;
        }
    }
	function update_version($ver_data,$id){
		$res = $this->db->update('version_data', $ver_data, array('id' => $id));
		return $res;
	}
	function get_client($id)
    {        
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_id', $id);
        $user = $this->db->get()->row_array();
        return $user;
    }
	function getVegasData($StationId,$QueryDate,$table_name,$utilityName){
		$this->db->distinct();
		$this->db->select('TxnDate,TxnTime,FromTime,ToTime');
        $this->db->from($table_name);     
        $this->db->where('TxnDate',$QueryDate);     
		$this->db->where('StationId', $StationId);
		$this->db->where('UtilityName', $utilityName);
        $res = $this->db->get()->result_array();  
		// echo $this->db->last_query();exit;     
        return $res;
	}
	function get_energymeter_list_vega($table_name){
		
		$this->db->select('UtilityName');
        $this->db->from($table_name);     
        $this->db->where('LineConnected','kWh'); 
		$this->db->group_by('UtilityName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;

		

	}
	function getVegasAllData($StationId,$QueryDate,$table_name,$utilityName,$TxnTime,$TxnDate,$fromtime,$totime){
		// echo $utilityName."<br>";
		$kwdata = array("A Wing 2nd FL Hvac", "A Wing 3rd FL Hvac", "A Wing Gr FL Hvac", "B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac","B Wing Gr FL Hvac","Capacitor Main Panel","CT Fan_1","CT Fan_11","Light&Power Wing_A","Light&Power Wing_B","WTP");
		$ktov=array("Chiller_1","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","DG-1 (200 KVA)","DG-2 (65 KVA)","Primary Chill Pump_3","Primary Pump_1","Primary Pump_2","Secondary ChillPump3","Secondary Pump_1","Secondary Pump_2","TFA");
		$ktop=array("Chiller-II","Main Incomer");
		
		// if (in_array($utilityName, $kwdata)){
		// 	$enquery_kWh="SELECT Consumption FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='kWh'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	// echo $enquery_kWh;
		// 	$kwhdata = $this->db->query($enquery_kWh)->result_array();
		// 	$enquery_kWh_cur="SELECT CurReading,MeterSerial FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='kWh'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$kwhdatacur = $this->db->query($enquery_kWh_cur)->result_array();
		// 	$result['MeterName']=$utilityName;
        //     $result['MeterSerial']=$kwhdatacur[0]['MeterSerial'];
        //     $result['TxnDate']=$TxnDate;
        //     $result['TxnTime']=$TxnTime;
        //     $result['CurReading']=$kwhdatacur[0]['CurReading'];
        //     $result['Consumption']=$kwhdata[0]['Consumption'];            
        //     $result['ActivePower']='';
        //     $result['ReactivePower']='';
        //     $result['ApparentPower']='';
        //     $result['Current_1']='';
        //     $result['Current_2']='';
        //     $result['Current_3']='';
        //     $result['Voltage_1']='';
        //     $result['Voltage_2']='';
        //     $result['Voltage_3']='';
        //     $result['PowerFactor']='';
        //     $result['frequency']='';
		// }
		if ($utilityName=="Chiller-II" || $utilityName=="Main Incomer"){
			$enquery_kWh="SELECT Consumption FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='kWh'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			// echo $enquery_kWh;die();
			$kwhdata = $this->db->query($enquery_kWh)->result_array();
			$enquery_kWh_cur="SELECT CurReading,MeterSerial FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='kWh'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			$kwhdatacur = $this->db->query($enquery_kWh_cur)->result_array();

			$enquery_current1="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Current_1'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			
			$c1_data = $this->db->query($enquery_current1)->result_array();
			if(count($c1_data)){
				$c1=$c1_data[0]['cons'];
			}else{
				$c1='';
			}
			// echo $enquery_current1;die();
			$enquery_current2="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Current_2'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			$c2_data = $this->db->query($enquery_current2)->result_array();
			if(count($c2_data)){
				$c2=$c2_data[0]['cons'];
			}else{
				$c2='';
			}
			$enquery_current3="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Current_3'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			$c3_data = $this->db->query($enquery_current3)->result_array();
			if(count($c3_data)){
				$c3=$c3_data[0]['cons'];
			}else{
				$c3='';
			}

			$enquery_volt1="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Voltage_1'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			$v1_data = $this->db->query($enquery_volt1)->result_array();
			if(count($v1_data)){
				$v1=$v1_data[0]['cons'];
			}else{
				$v1='';
			}
			$enquery_volt2="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Voltage_2'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			$v2_data = $this->db->query($enquery_volt2)->result_array();
			if(count($v2_data)){
				$v2=$v2_data[0]['cons'];
			}else{
				$v2='';
			}
			$enquery_volt3="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Voltage_3'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			$v3_data = $this->db->query($enquery_volt3)->result_array();
			if(count($v3_data)){
				$v3=$v3_data[0]['cons'];
			}else{
				$v3='';
			}

		   
		   $enquery_pf="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='PF'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		   $pfdata = $this->db->query($enquery_pf)->result_array();
		   if(count($pfdata)){
			$pf=$pfdata[0]['cons'];
		}else{
			$pf='';
		}
			
			$start = strtotime($fromtime);
			$end = strtotime($totime);
			$mins = ($end - $start) / 60;
			// echo $mins;
			if($mins<0){
				$min=10;
			}else{
				$min=$mins;
			}
			
			$result['MeterName']=$utilityName;
            $result['MeterSerial']=$kwhdatacur[0]['MeterSerial'];
            $result['TxnDate']=$TxnDate;
            $result['TxnTime']=$TxnTime;
            $result['CurReading']=$kwhdatacur[0]['CurReading'];
            $result['Consumption']=$kwhdata[0]['Consumption'];            
            $result['ActivePower']='';
            $result['ReactivePower']='';
            $result['ApparentPower']='';
            $result['Current_1']=$c1;
            $result['Current_2']=$c2;
            $result['Current_3']=$c3;
            $result['Voltage_1']=$v1;
            $result['Voltage_2']=$v2;
            $result['Voltage_3']=$v3;
            $result['PowerFactor']=$pf;
            $result['frequency']=round($min);
			return $result;
		}

		
		// 	$enquery_kWh="SELECT Consumption FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='kWh'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	// echo $enquery_kWh;
		// 	$kwhdata = $this->db->query($enquery_kWh)->result_array();
		// 	$enquery_kWh_cur="SELECT CurReading,MeterSerial FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='kWh'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$kwhdatacur = $this->db->query($enquery_kWh_cur)->result_array();

		// 	$enquery_current1="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Current_1'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
			
		// 	$c1_data = $this->db->query($enquery_current1)->result_array();
		// 	if(count($c1_data)){
		// 		$c1=$c1_data[0]['cons'];
		// 	}else{
		// 		$c1='';
		// 	}
		// 	//echo $enquery_current1;die();
		// 	$enquery_current2="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Current_2'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$c2_data = $this->db->query($enquery_current2)->result_array();
		// 	if(count($c2_data)){
		// 		$c2=$c2_data[0]['cons'];
		// 	}else{
		// 		$c2='';
		// 	}
		// 	$enquery_current3="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Current_3'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$c3_data = $this->db->query($enquery_current3)->result_array();
		// 	if(count($c3_data)){
		// 		$c3=$c3_data[0]['cons'];
		// 	}else{
		// 		$c3='';
		// 	}

		// 	$enquery_volt1="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Voltage_1'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$v1_data = $this->db->query($enquery_volt1)->result_array();
		// 	if(count($v1_data)){
		// 		$v1=$v1_data[0]['cons'];
		// 	}else{
		// 		$v1='';
		// 	}
		// 	$enquery_volt2="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Voltage_2'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$v2_data = $this->db->query($enquery_volt2)->result_array();
		// 	if(count($v2_data)){
		// 		$v2=$v2_data[0]['cons'];
		// 	}else{
		// 		$v2='';
		// 	}
		// 	$enquery_volt3="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='Voltage_3'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		// 	$v3_data = $this->db->query($enquery_volt3)->result_array();
		// 	if(count($v3_data)){
		// 		$v3=$v3_data[0]['cons'];
		// 	}else{
		// 		$v3='';
		// 	}

		   
		//    $enquery_pf="SELECT Consumption as cons FROM $table_name WHERE `UtilityName`='".$utilityName."'  AND LineConnected='PF'	AND `TxnDate`='".$TxnDate."'	and TxnTime= '".$TxnTime."'";
		//    $pfdata = $this->db->query($enquery_pf)->result_array();
		//    if(count($pfdata)){
		// 	$pf=$pfdata[0]['cons'];
		// }else{
		// 	$pf='';
		// }
		// 	// echo $enquery_pf;die();
		// 	$start = strtotime($fromtime);
		// 	$end = strtotime($totime);
		// 	$mins = ($end - $start) / 60;
		// 	// echo $mins;
			
		// 	$result['MeterName']=$utilityName;
        //     $result['MeterSerial']=$kwhdatacur[0]['MeterSerial'];
        //     $result['TxnDate']=$TxnDate;
        //     $result['TxnTime']=$TxnTime;
        //     $result['CurReading']=$kwhdatacur[0]['CurReading'];
        //     $result['Consumption']=$kwhdata[0]['Consumption'];            
        //     $result['ActivePower']='';
        //     $result['ReactivePower']='';
        //     $result['ApparentPower']='';
        //     $result['Current_1']=$c1;
        //     $result['Current_2']=$c2;
        //     $result['Current_3']=$c3;
        //     $result['Voltage_1']=$v1;
        //     $result['Voltage_2']=$v2;
        //     $result['Voltage_3']=$v3;
        //     $result['PowerFactor']=$pf;
        //     $result['frequency']=$mins;
			// echo json_encode($result);die();
			

			

		

	}
	function get_devices($category){
		$this->db->select('hd.*,hc.category_name');
        $this->db->from('hardware_device as hd');  
        $this->db->join('hardware_category as hc', 'hc.category_id=hd.category_id','left');      
        if ($category != ''){
            $this->db->where('hd.category_id', $category);
        }
		// $this->db->where('created_by',$this->session->userdata('user_id'));  
		$this->db->where('hd.status',1);
        $this->db->order_by('hd.device_name');
        $res = $this->db->get();     
        //echo $this->db->last_query();die();          
        return $res;
	}
    function get_categories(){
		$this->db->select('');
        $this->db->from('hardware_category');     
        $this->db->where('status',1);     
		//$this->db->where('category_id', $cat_id);
         //$this->db->where('created_by',$this->session->userdata('user_id'));       
         $this->db->order_by('category_name');
        $res = $this->db->get()->result_array();  
		//echo $this->db->last_query();exit;     
        return $res;
	}
    function get_devices_bydid($deviceid){
		$this->db->select('');
        $this->db->from('hardware_device');        
        if ($deviceid != ''){
            $this->db->where('device_id', $deviceid);
        }
		// $this->db->where('created_by',$this->session->userdata('user_id'));  
		$this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get();     
        //echo $this->db->last_query();die();          
        return $res;
	}
	function get_firepumpdata($search_data){
		$this->db->select('');
        $this->db->from('firepump');        
        
		if ($search_data['device_id'] != ''){
            $this->db->where('hardware_device', $search_data['device_id']);
        }
		if ($search_data['pump_type'] != ''){
            $this->db->where('pump_type', $search_data['pump_type']);
        }
		
		// $this->db->where('pump_type','Pumps');
		$this->db->where('client_id',$search_data['client_id']);
		
		$this->db->where('status', 1);
        // $this->db->order_by('hardware_id','desc');
        $res = $this->db->get();             
        return $res;
	}
	function get_firepumphardwaredata($search_data){
       // print_r($search_data['hardware_device']);
		$this->db->select('');
        $this->db->from('hardware');        
        
		if ($search_data['hardware_category'] != ''){
            $this->db->where('hardware_category', $search_data['hardware_category']);
        }
		if ($search_data['hardware_device'] != ''){
            $this->db->where('hardware_device', $search_data['hardware_device']);
        }
		//echo $this->db->last_query();die();
		// $this->db->where('pump_type','Pumps');
		$this->db->where('client_id',$search_data['client_id']);
		
		$this->db->where('status', 1);
       // 
        // $this->db->order_by('hardware_id','desc');
        $res = $this->db->get();    
        //print_r($res);die();         
        return $res;
	}
    function get_hardwares_device_list($client_id,$device_id){
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
	function check_notification($hardware_id){
		$this->db->select();
        $this->db->from('alerts');
        $this->db->where('hardware_id', $hardware_id);
		$this->db->where('alert_date', date("Y-m-d"));
        $user = $this->db->get()->result_array();
        return $user;
		//SELECT * FROM `alerts` WHERE `emp_id`=27 and `alert_date`='2021-10-26' AND `hardware_id`=154


	}
	function check_waterMeterNotification($hardware_id){
		$this->db->select();
        $this->db->from('water_meter_alerts');
        $this->db->where('hardware_id', $hardware_id);
		$this->db->where('alert_date', date("Y-m-d"));
        $user = $this->db->get()->result_array();
        return $user;
		//SELECT * FROM `alerts` WHERE `emp_id`=27 and `alert_date`='2021-10-26' AND `hardware_id`=154


	}
    function unreadNotification($client_id){
    $this->db->select('*');
    $this->db->from('alerts');
    $this->db->where('client_id',$client_id);
    $this->db->where('alert_read',0);
	$this -> db -> order_by('created_date', 'DESC', FALSE);
    $res=$this->db->get()->result_array();
    return $res;
    }
	function unreadWaterMeterNotification($client_id,$emp_id){
		$this->db->select('*');
		$this->db->from('water_meter_alerts');
		$this->db->where('client_id',$client_id);
		$this->db->where('emp_id',$emp_id);
		$this->db->where('alert_read',0);
		
		$res=$this->db->get()->result_array();
		return $res;
		}
    function readNotification($client_id){
        $this->db->select('*');
        $this->db->from('alerts');
        $this->db->where('client_id',$client_id);
        $this->db->where('alert_read',1);
		$this -> db -> order_by('created_date', 'DESC', FALSE);
        $res=$this->db->get()->result_array();
        return $res;
        }
		function readWaterMeterNotification($client_id,$emp_id){
			$this->db->select('*');
			$this->db->from('water_meter_alerts');
			$this->db->where('client_id',$client_id);
			$this->db->where('alert_read',1);
			$res=$this->db->get()->result_array();
			return $res;
			}
			function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%h:%i:%s');
	}
	function secondsToTime1($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%h hours %i minutes %s seconds');
	}
	function secondsToTime_month($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
	}
	function getSchedules($emp_id){      

		

			$this->db->select('h.schedule_id,h.meter_id,h.to_reading,hc.dashboard_name as meter_name');
			$this->db->from('water_meter_management as h');
			$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
			
			$this->db->where('h.emp_id', $emp_id);			
			
			
			//$this->db->order_by('h.to_reading');
			$this->db->group_by('h.meter_id');
			
			
			$res = $this->db->get()->result_array();
			//echo $this->db->last_query();exit;
			return $res;
	
		}
		function getSchedulesbyid($emp_id,$meter_id){
			$this->db->select('h.schedule_id,h.meter_id,h.to_reading,hc.dashboard_name as meter_name');
			$this->db->from('water_meter_management as h');
			$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
			
			$this->db->where('h.emp_id', $emp_id);
			$this->db->where('h.meter_id', $meter_id);			
			
			
			//$this->db->order_by('h.to_reading');
			$this->db->group_by('h.meter_id');
			
			
			$res = $this->db->get()->result_array();
			//echo $this->db->last_query();exit;
			return $res;
		}
		function checkReading($meter_id){
			$todayDate=date('Y-m-d');
			$this->db->select('*');
			$this->db->from('water_meter_readings');
			$this->db->where('meter_id', $meter_id);
			$this->db->where('date', $todayDate);	
			
			$res = $this->db->get()->result_array();
			// echo $this->db->last_query();exit;
			return $res;

		}
		function getDifference($meter_id){
			       
					$yesterDay = date('Y-m-d',strtotime("-1 days"));
					
					
						//yesterday
						$query2="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$meter_id."' ";
						//echo $query2;die();
						$data2 = $this->db->query($query2)->result_array();
						if(count($data2)>0)	{
							return $data2[0]['meter_reading'];
						}else{
							return '0';
						}
						
					
						
					
		}
		function getYestData($meter_id){
			       
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			
			
				//yesterday
				$query2="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$meter_id."' ";
				//echo $query2;die();
				$data2 = $this->db->query($query2)->result_array();
				if(count($data2)>0)	{
					return $data2[0]['meter_reading'];
				}else{
					return false;
				}
				
			
				
			
}
		function getSchedules_m($emp_id){      

		

			$this->db->select('h.schedule_id,h.meter_id,h.to_reading,hc.dashboard_name');
			$this->db->from('water_meter_management as h');
			$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
			$this->db->join('water_meter_readings as wmr', 'h.schedule_id!=wmr.schedule_id','inner');
			$this->db->where('h.emp_id', $emp_id);			
			
			$this->db->order_by('hc.dashboard_name');
			$this->db->order_by('h.to_reading');
			$this->db->group_by('h.meter_id');
			
			
			$res = $this->db->get()->result_array();
			//echo $this->db->last_query();exit;
			return $res;
	
		}
		function getSchedulesbyQR($emp_id,$meter_id){      

			
	
	
				$this->db->select('h.schedule_id,h.meter_id,h.to_reading,hc.dashboard_name');
				$this->db->from('water_meter_management as h');
				$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
				//$this->db->join('water_meter_readings as wmr', 'h.schedule_id!=wmr.schedule_id','inner');
				$this->db->where('h.emp_id', $emp_id);
				$this->db->where('h.meter_id', $meter_id);			
				
				// $this->db->order_by('hc.dashboard_name');
				// $this->db->order_by('h.to_reading');
				$this->db->group_by('h.meter_id');
				
				
				$res = $this->db->get()->result_array();
				//echo $this->db->last_query();exit;
				return $res;
		
			}
	function checkSchedules($schedule_id){
		    $this->db->select('*');
			$this->db->from('water_meter_readings');
			$this->db->where('schedule_id', $schedule_id);			
			
			$res = $this->db->get()->result_array();
			return $res;

	}	
	
	function insert_schedules($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('water_meter_readings', $data);
            return $res;
        }
        return false;
    }
	function addTokenInfo($data){
		
             $this->db->insert('access_token', $data);
            
	}
	function get_clientid($emp_id){
		$this->db->select('created_by as client_id');
		$this->db->from('employees');
		$this->db->where('emp_id', $emp_id);			
		
		$res = $this->db->get()->row_array();
		return $res['client_id'];
	}
	function empName($emp_id){
		$this->db->select('firstname,lastname');
		$this->db->from('employees');
		$this->db->where('emp_id', $emp_id);			
		
		$res = $this->db->get()->row_array();
		return $res['firstname']." ".$res['lastname'];
	}
	function get_meter_name($meter_id){
		$this->db->select('dashboard_name as meter_name');
		$this->db->from('hardware');
		$this->db->where('hardware_id', $meter_id);			
		
		$res = $this->db->get()->row_array();
		return $res['meter_name'];
	}
	function get_location_name($meter_id){
		$this->db->select('installation_location as location_name');
		$this->db->from('hardware');
		$this->db->where('hardware_id', $meter_id);			
		
		$res = $this->db->get()->row_array();
		return $res['location_name'];
	}
	function get_hardwares_device_data_firepump($data){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		$todayDate=date('Y-m-d');

		$yesterDay = date('Y-m-d',strtotime("-1 days"));
        $firstday= date('Y-m-01', strtotime($todayDate));
		//$firstday= "2021-10-15";
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);


		$firepumps=array('Phase-1 Fire Pump System','Phase-2 Fire Pump System');
		for ($p=0; $p < count($firepumps); $p++) { 
			$resultArray[$p]['hardware_name']=$firepumps[$p];
			if($p==0){
				$firepumpList[0]['fire_pump_name']='Jockey Pump';
				$firepumpList[1]['fire_pump_name']='Main Pump';
				$firepumpList[2]['fire_pump_name']='Diesel Engine Driven Pump';
				$i=0;
				foreach($firepumpList as $list){
					if($list['fire_pump_name']=='Jockey Pump'){
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Jockey Pump On' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";
	
					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Jockey Pump Auto' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$todayDate."' ";
				//    echo $runn_today;die();
					$datarun_today = $this->db->query($runn_today)->result_array();
					
					$runn_yest="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
				   //echo $pressure;die();
					$datarun_yest = $this->db->query($runn_yest)->result_array();

					$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."' ";
				   //echo $pressure;die();
					$datarun_week = $this->db->query($runn_week)->result_array();

					$runn_month="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."' ";
				   //echo $pressure;die();
					$datarun_month = $this->db->query($runn_month)->result_array();

					
					
					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					
					$resultArray[$p]['running_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray[$p]['running_data'][$i]['running_status']=false;
					}else{
						$resultArray[$p]['running_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray[$p]['running_data'][$i]['switch_status']=true;
					}else{
						$resultArray[$p]['running_data'][$i]['switch_status']=false;
					}
					
					$resultArray[$p]['running_data'][$i]['today_running']=$this->secondsToTime($datarun_today[0]['run']*60);
					$resultArray[$p]['running_data'][$i]['yesterday_running']=$this->secondsToTime($datarun_yest[0]['run']*60);
					$resultArray[$p]['running_data'][$i]['lastweek_running']=$this->secondsToTime($datarun_week[0]['run']*60);
					$resultArray[$p]['running_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($datarun_month[0]['run']*60);
					$i++;

					}else if($list['fire_pump_name']=='Main Pump'){
						$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump On' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";
	
						$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";
	
						
	
						$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$todayDate."' ";
					   //echo $pressure;die();
						$datarun_today = $this->db->query($runn_today)->result_array();
						
						$runn_yest="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
					   //echo $pressure;die();
						$datarun_yest = $this->db->query($runn_yest)->result_array();
	
						$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."' ";
					   //echo $pressure;die();
						$datarun_week = $this->db->query($runn_week)->result_array();
	
						$runn_month="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."' ";
					   //echo $pressure;die();
						$datarun_month = $this->db->query($runn_month)->result_array();
	
						
						
						$run_status_data = $this->db->query($runn_status_query)->result_array();
						$switch_status_data = $this->db->query($switch_status_query)->result_array();
						
						$resultArray[$p]['running_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray[$p]['running_data'][$i]['running_status']=false;
					}else{
						$resultArray[$p]['running_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray[$p]['running_data'][$i]['switch_status']=true;
					}else{
						$resultArray[$p]['running_data'][$i]['switch_status']=false;
					}
					
					$resultArray[$p]['running_data'][$i]['today_running']=$this->secondsToTime($datarun_today[0]['run']*60);
					$resultArray[$p]['running_data'][$i]['yesterday_running']=$this->secondsToTime($datarun_yest[0]['run']*60);
					$resultArray[$p]['running_data'][$i]['lastweek_running']=$this->secondsToTime($datarun_week[0]['run']*60);
					$resultArray[$p]['running_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($datarun_month[0]['run']*60);
					$i++;
					}else{
						$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG ON' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";
	
						$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG Auto' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";
	
						
	
						$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$todayDate."' ";
					   //echo $pressure;die();
						$datarun_today = $this->db->query($runn_today)->result_array();
						
						$runn_yest="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
					   //echo $pressure;die();
						$datarun_yest = $this->db->query($runn_yest)->result_array();
	
						$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."' ";
					   //echo $pressure;die();
						$datarun_week = $this->db->query($runn_week)->result_array();
	
						$runn_month="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."' ";
					   //echo $pressure;die();
						$datarun_month = $this->db->query($runn_month)->result_array();
	
						
						
						$run_status_data = $this->db->query($runn_status_query)->result_array();
						$switch_status_data = $this->db->query($switch_status_query)->result_array();
						
						$resultArray[$p]['running_data'][$i]['meter']=$list['fire_pump_name'];
						if($run_status_data[0]['CurReading']==0){
							$resultArray[$p]['running_data'][$i]['running_status']=false;
						}else{
							$resultArray[$p]['running_data'][$i]['running_status']=true;
						}
						if($switch_status_data[0]['CurReading']==1){
							$resultArray[$p]['running_data'][$i]['switch_status']=true;
						}else{
							$resultArray[$p]['running_data'][$i]['switch_status']=false;
						}
						
						$resultArray[$p]['running_data'][$i]['today_running']=$this->secondsToTime($datarun_today[0]['run']*60);
						$resultArray[$p]['running_data'][$i]['yesterday_running']=$this->secondsToTime($datarun_yest[0]['run']*60);
						$resultArray[$p]['running_data'][$i]['lastweek_running']=$this->secondsToTime($datarun_week[0]['run']*60);
						$resultArray[$p]['running_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($datarun_month[0]['run']*60);
						$i++;
					}
				}
												

				 

				$pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
				$pressuredata = $this->db->query($pressure)->result_array();
				for ($n=0; $n < count($pressuredata); $n++) { 
					$presure[$n]['pressure']=(float)$pressuredata[$n]['pressure'];
					$presure[$n]['time']=$pressuredata[$n]['TxnTime'];
					# code...
				}


			
			$resdata['graph']=array();
			
			$resultArray[$p]['pressure_graph']=$presure;
			$pdata['min_pressure']="6 PSI";
			$pdata['max_pressure']="8.8 PSI";
			$pdata['current_pressure']=(string)$presure[count($presure)-1]['pressure'];
			$resultArray[$p]['pressure_data']=$pdata;
			
			$resultArray[$p]['dg_data']=$this->get_hardwares_device_data_dg_firepump_old($table_name);


			}else{
				$meters=array('Jockey Pump','Diesel Engine Driven Pump');
				$i=0;
				foreach($meters as $meter){
					$resultArray[$p]['running_data'][$i]['meter']=$meter;
					$resultArray[$p]['running_data'][$i]['running_status']=false;
					$resultArray[$p]['running_data'][$i]['switch_status']=false;
					
					$resultArray[$p]['running_data'][$i]['today_running']="NA";
					$resultArray[$p]['running_data'][$i]['yesterday_running']="NA";
					$resultArray[$p]['running_data'][$i]['lastweek_running']="NA";
					$i++;
				}
			$firepumpList2[0]['fire_pump_name']='Jockey Pump';
			$firepumpList2[1]['fire_pump_name']='Diesel Engine Driven Pump';
			$i=0;
			foreach($firepumpList2 as $list){
				if($list['fire_pump_name']=='Jockey Pump'){
					$runn_status_query="SELECT Consumption	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump Auto' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$today_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ";
					$yesterday_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$yesterDay."'  ";
					$weekly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
					$monthly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";

					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					$today_runn_data = $this->db->query($today_runn_query)->result_array();
					$yesterday_runn_data = $this->db->query($yesterday_runn_query)->result_array();
					$weekly_runn_data = $this->db->query($weekly_runn_query)->result_array();
					$monthly_runn_data = $this->db->query($monthly_runn_query)->result_array();

					$resultArray[$p]['running_data'][$i]['meter']=$list['fire_pump_name'];
						if($run_status_data[0]['CurReading']==0){
							$resultArray[$p]['running_data'][$i]['running_status']=false;
						}else{
							$resultArray[$p]['running_data'][$i]['running_status']=true;
						}
						if($switch_status_data[0]['CurReading']==1){
							$resultArray[$p]['running_data'][$i]['switch_status']=true;
						}else{
							$resultArray[$p]['running_data'][$i]['switch_status']=false;
						}
						
						$resultArray[$p]['running_data'][$i]['today_running']=$this->secondsToTime($today_runn_data[0]['cons']*60);
						$resultArray[$p]['running_data'][$i]['yesterday_running']=$this->secondsToTime($yesterday_runn_data[0]['cons']*60);
						$resultArray[$p]['running_data'][$i]['lastweek_running']=$this->secondsToTime($weekly_runn_data[0]['cons']*60);
						$resultArray[$p]['running_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_data[0]['cons']*60);
						$i++;



				}else{
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Engine Run' and MeterSerial='0070' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Off/Manual Auto' and MeterSerial='0070' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$today_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ";
					$yesterday_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$yesterDay."'  ";
					$weekly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
					$monthly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";

					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					$today_runn_data = $this->db->query($today_runn_query)->result_array();
					$yesterday_runn_data = $this->db->query($yesterday_runn_query)->result_array();
					$weekly_runn_data = $this->db->query($weekly_runn_query)->result_array();
					$monthly_runn_data = $this->db->query($monthly_runn_query)->result_array();

					$resultArray[$p]['running_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray[$p]['running_data'][$i]['running_status']=false;
					}else{
						$resultArray[$p]['running_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray[$p]['running_data'][$i]['switch_status']=true;
					}else{
						$resultArray[$p]['running_data'][$i]['switch_status']=true;
					}
					
					$resultArray[$p]['running_data'][$i]['today_running']=$this->secondsToTime($today_runn_data[0]['cons']*60);
					$resultArray[$p]['running_data'][$i]['yesterday_running']=$this->secondsToTime($yesterday_runn_data[0]['cons']*60);
					$resultArray[$p]['running_data'][$i]['lastweek_running']=$this->secondsToTime($weekly_runn_data[0]['cons']*60);
					$resultArray[$p]['running_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_data[0]['cons']*60);
					$i++;
				}
				

				
   
		   }

				// $pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc";

				$pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
			$pressuredata = $this->db->query($pressure)->result_array();
			for ($n=0; $n < count($pressuredata); $n++) { 
				$presure[$n]['pressure']=(float)$pressuredata[$n]['pressure'];
				$presure[$n]['time']=$pressuredata[$n]['TxnTime'];
				# code...
			}


			
			$resdata['graph']=array();
			
			$resultArray[$p]['pressure_graph']=$presure;
			$pdata['min_pressure']="6";
			$pdata['max_pressure']="8.8";
			$pdata['current_pressure']=(string)$presure[count($presure)-1]['pressure'];
			$resultArray[$p]['pressure_data']=$pdata;
			//$resultArray[$p]['dg_data_1']=$resdata;
			$resultArray[$p]['dg_data']=$this->get_hardwares_device_data_dg_firepump_new($table_name);
			}
			
			
			
		}
			
			//$resultArray['pressure_data']="12 Min";

			return 	$resultArray;

	}
	function get_hardwares_device_data_dg_firepump_new($table_name){
		
		
		$todayDate=date("Y-m-d");
		

		
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND UtilityName='New Fire Pump' AND LineConnected='Fuel Level' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		//echo $startEndFuelQuery;die();

		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Engine Run' and MeterSerial='0070'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled' and MeterSerial='0069'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata['fadd']=$dataAdd[0]->fadd;


		$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='New Fire Pump' and MeterSerial='0069' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
		//echo $queryRuntimes;die();
		$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

		$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Engine Run' and MeterSerial='0070'  AND Consumption>0";
		

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
			$rs = explode(":", $resdata['run']);
			//print_r($rs);
			$hrs = $rs[0];
			$mins = $rs[1];
			$total_mins = ($hrs*60)+$mins;
			if($total_mins != 0){
				$eco = ($resdata['fconsume']/$total_mins)*60;
			}
			else{
				$eco = 0;
			}
			//echo "<br>".$eco."<br>";
			$finaleco= round($eco,2);
			
		}
		
		$resdata['economy_1']=$finaleco;
		$resdata['availableFuel']=$dataStartEndFuel[0]->end;
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/750)*100);

		$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata['voltage_1']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata['status_1']=$status;
		
		
		
		$resdata['running_hours']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		$resdata['fuel_add']=(string)$dataAdd[0]->fadd;
		$resdata['fuel_remove']=(string)$fremove;
		$resdata['fuel_consume']=(string)$resdata['fconsume1'];
		$resdata['economy']=(string)$finaleco;
		$resdata['available_fuel']=(string)$dataStartEndFuel[0]->end;
		$resdata['voltage']=(string)$dataVoltage[0]->Consumption;
		$resdata['status']=(string)$status;
		$resdata['hardware_name']="DG";
		$resdata['tank_capacity']="750 Ltrs";
		$resdata['filled_percent']=(string)round(($dataStartEndFuel[0]->end/750)*100);
		




		return $resdata;
		
	}
	function get_hardwares_device_data_dg_firepump_old($table_name){
		
		


		$todayDate=date("Y-m-d");
		
		
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='Old Fire Pump' and MeterSerial='0068' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND UtilityName='Old Fire Pump' AND LineConnected='Fuel Level' and MeterSerial='0068' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		//echo $startEndFuelQuery;die();Old Fire Pump Diesel Pump RHT



		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='Old Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Diesel Pump RHT' and MeterSerial='0068'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='Old Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled' and MeterSerial='0068'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata['fadd']=$dataAdd[0]->fadd;


		$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='Old Fire Pump' and MeterSerial='0068' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
		//echo $queryRuntimes;die();
		$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

		$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='Old Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Diesel Pump RHT' and MeterSerial='0068'  AND Consumption>0";
		

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
			$rs = explode(":", $resdata['run']);
			//print_r($rs);
			$hrs = $rs[0];
			$mins = $rs[1];
			$total_mins = ($hrs*60)+$mins;
			if($total_mins != 0){
				$eco = ($resdata['fconsume']/$total_mins)*60;
			}
			else{
				$eco = 0;
			}
			//echo "<br>".$eco."<br>";
			$finaleco= round($eco,2);
			
		}
		
		$resdata['economy_1']=$finaleco;
		$resdata['availableFuel']=$dataStartEndFuel[0]->end;
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/250)*100);

		$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='Old Fire Pump' and MeterSerial='0068' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata['voltage_1']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='Old Fire Pump' and MeterSerial='0068' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata['status_1']=$status;
		


			$resdata['running_hours']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
			$resdata['fuel_add']=(string)$dataAdd[0]->fadd;
			$resdata['fuel_remove']=(string)$fremove;
			$resdata['fuel_consume']=(string)$resdata['fconsume1'];
			$resdata['economy']=(string)$finaleco;
			$resdata['available_fuel']=(string)$dataStartEndFuel[0]->end;
			$resdata['voltage']=(string)$dataVoltage[0]->Consumption;
			$resdata['status']=(string)$status;
			$resdata['hardware_name']="DG";
			$resdata['tank_capacity']="150 Ltrs";
			$resdata['filled_percent']=(string)round(($dataStartEndFuel[0]->end/250)*100);
		return $resdata;
		
	}
	function get_hardwares_device_data_hydro($data){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		$todayDate=date('Y-m-d');
       // $todayDate='2020-07-11';
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $firstday= date('Y-m-01', strtotime($todayDate));
		//$firstday= "2021-10-15";
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
		$firepumps=array('Hydro Pnematic System');
		for ($p=0; $p < count($firepumps); $p++) { 
			$meters=array('Pump1','Pump2');
			$i=0;
			foreach($meters as $meter){
				$resultArray[$p]['running_data'][$i]['meter']=$meter;
				$resultArray[$p]['running_data'][$i]['running_status']=false;
				$resultArray[$p]['running_data'][$i]['switch_status']=false;
				
				$resultArray[$p]['running_data'][$i]['today_running']="NA";
				$resultArray[$p]['running_data'][$i]['yesterday_running']="NA";
				$resultArray[$p]['running_data'][$i]['lastweek_running']="NA";
				$i++;
			}
			$resultArray=array();
		
			$hydrolist[0]['UtilityName']='Motor-1';
			$hydrolist[1]['UtilityName']='Motor-2';
		    $i=0;
			foreach($hydrolist as $list){
				if($list['UtilityName']=='Motor-1'){
					$runstatus='Motor-1 Pwr';
					$runconnect='Motor-1 RHT';
					$resultArray[$p]['running_data'][$i]['meter']=$list['UtilityName'];
				}else if($list['UtilityName']=='Motor-2'){
					$runstatus='Motor-2 Pwr';
					$runconnect='Motor-2 RHT';
					$resultArray[$p]['running_data'][$i]['meter']=$list['UtilityName'];
				}
			
				$todayquery="SELECT Consumption FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$todayDate."' and MeterSerial='0061'  ORDER BY TxnTime desc limit 1";
				$todayqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$todayDate."' and MeterSerial='0061'  ";
				//echo $todayqueryConsu;die();
				$yestqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate='".$yesterDay."' and MeterSerial='0061' ";
				//$weekqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
				//$monthqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";
			  
			   
				$todaydata = $this->db->query($todayquery)->result_array();
				$todaydatacons = $this->db->query($todayqueryConsu)->result_array();
				$yesterdaydatacons = $this->db->query($yestqueryConsu)->result_array();
				//$weekdatacons = $this->db->query($weekqueryConsu)->result_array();
				//$monthdatacons = $this->db->query($monthqueryConsu)->result_array();
				
				if($todaydata[0]['Consumption']>0){
					$resultArray[$p]['running_data'][$i]['running_status']=true;
				}else{
					$resultArray[$p]['running_data'][$i]['running_status']=false;
				}
				$resultArray[$p]['running_data'][$i]['switch_status']=false;

				$resultArray[$p]['running_data'][$i]['today_running']=$this->secondsToTime($todaydatacons[0]['cons']*60);
				$resultArray[$p]['running_data'][$i]['yesterday_running']=$this->secondsToTime($yesterdaydatacons[0]['cons']*60);
				//$resultArray[$p]['running_data'][$i]['lastweek_running']=$this->secondsToTime_month($weekdatacons[0]['cons']*60);
				//$resultArray[$p]['running_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthdatacons[0]['cons']*60);
				$i++;
   
		   }
			$pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1 ";
			$pressuredata = $this->db->query($pressure)->result_array();
			$pdata['current_pressure']=$pressuredata[0]['pressure'];
			$pdata['min_pressure']="2.4";
			$pdata['max_pressure']="3.4";
			
			$resultArray[$p]['pressure_data']=$pdata;

			
		}
			
			//$resultArray['pressure_data']="12 Min";

			return 	$resultArray;

	}
	function getDashBoardData($data){
		  
		$station_id=$data['station_id'];
		$api_name=$data['api_name'];
		$LineConnectedAuto=$data['LineConnectedAuto'];
		$LineConnectedManual=$data['LineConnectedManual'];
        // $todayDate=date('Y-m-d');
        $todayDate='2020-07-11';
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        //$yesterDay = "'".$yesterDay."'";
        //lastweek
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
		$resultArray=array();
       
            $query="SELECT PrvReading,CurReading,Consumption,TxnDate,TxnTime FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            
			
            $data = $this->db->query($query)->result();
			// ECHO $this->db->last_query();exit;
            $query1="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'";
            $data1 = $this->db->query($query1)->result();
			
			// ECHO $this->db->last_query();exit;
           
            //yesterday
            $query2="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$yesterDay."'";
            $data2 = $this->db->query($query2)->result();
             
            //lastweek
            $query3="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' and Consumption<20";
           
            $data3 = $this->db->query($query3)->result();
           
              $queryautosjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data where LineConnected='".$LineConnectedAuto."' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
			  
			  
            $querymanualsjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data where LineConnected='".$LineConnectedManual."' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
			
            $dataasjp = $this->db->query($queryautosjp)->result();
            $datamsjp = $this->db->query($querymanualsjp)->result();
			
            if(count($dataasjp)>0){
				if($dataasjp[0]->CurReading==0 && $datamsjp[0]->CurReading==0){
					$resultArray['SwitchStatus']='OFF';
				}
				if($dataasjp[0]->CurReading==0 && $datamsjp[0]->CurReading==1){
					$resultArray['SwitchStatus']='Manual';
				}
				if($dataasjp[0]->CurReading==1 && $datamsjp[0]->CurReading==0){
					$resultArray['SwitchStatus']='Auto';
				}
			   
				
				$resultArray['meter']=$api_name;
				$resultArray['RunningStatus']=$data[0]->Consumption;
				// $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
				
				$resultArray['TodayRunn']=$data1[0]->Consumption;
				$resultArray['YesterdayRunn']=$data2[0]->Consumption;
				$resultArray['LastWeekRunn']=$data3[0]->Consumption;
			}else{
				
                
				
			   
				if($api_name=='Hydrant Pump'){
                    $resultArray['SwitchStatus']='Off';
                }else if($api_name=='Sprinkler Pump'){
                    $resultArray['SwitchStatus']='Manual';
                }else{
                    $resultArray['SwitchStatus']='Auto';
                }
				$resultArray['meter']=$api_name;
				$resultArray['RunningStatus']=0;
				// $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
				
				$resultArray['TodayRunn']="00:00:02";
				$resultArray['YesterdayRunn']="00:00:00";
				$resultArray['LastWeekRunn']="00:00:06";
				}
       

        //print_r($resultArray);
       return $resultArray;
    }
	
	function getPressureToday($data){
		$station_id=$data['station_id'];
		$LineConnected=$data['LineConnected'];
      // $todayDate=date('Y-m-d');
      $todayDate=date('2020-07-15');
      $querypressure="SELECT round(CurReading*0.076,2) as CurReading,TxnTime  FROM hardware_station_consumption_data where LineConnected='".$LineConnected."' AND TxnDate='".$todayDate."' and StationId='".$station_id."' order by TxnTime";
        $datapressure = $this->db->query($querypressure)->result();
		 // echo $this->db->last_query();
							// echo "<br>";
        return $datapressure;
    }
	
	function getWaterLevel($data){
    	$station_id=$data['station_id'];
		$api_name=$data['api_name'];
    	$todayDate=date('2020-07-11');
		
        /*$query="select id, LocationName as LocationName,UomScale,TxnDate, TxnTime, Consumption from (
        // select id, LocationName,TxnDate, TxnTime, Consumption ,UomScale from hardware_station_consumption_data where
         // TxnDate=".$todayDate."  and StationId='".$station_id."' and LocationName='".$api_name."'  order by TxnTime desc ) as sub where id=sub.id group by sub.LocationName limit 1";*/
		 
		$query="select LocationName,TxnDate,TxnTime,Consumption from hardware_station_consumption_data where
         TxnDate='".$todayDate."'  and StationId='".$station_id."' and LocationName='".$api_name."'  order by TxnTime desc limit 1";
		 
		  /*$query="select id, LocationName as UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (
        // select id, LocationName,TxnDate, FromTime, ToTime, Consumption ,UomScale from hardware_station_consumption_data where
         // TxnDate=".$todayDate."  and StationId='".$station_id."' and LocationName='".$api_name."'  order by ToTime desc ) as sub where id=sub.id group by sub.LocationName limit 1";*/
        
		$data = $this->db->query($query)->row();
        $sumpdata['sumpdata']=$data;
        $sumpdata['totalcapacity']='500KL';
        $sumpdata['filled']='84%';
        $sumpdata['currentLevel']='420KL';

		// echo $this->db->last_query();exit;
    	return $sumpdata;

    }
	function firePumpRunnDataAll($data,$meters){
		// echo $data['station_id'];
		// echo "<pre>";print_r($data);exit;
	$station_id=$data['station_id'];
    $date_from = strtotime($data['from_date']); 
    $date_to = strtotime($data['to_date']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
		array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    
		for ($i=0; $i <count($meters); $i++) { 
		
			
			$firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'";
			
		$runn = $this->db->query($firepump)->result();
		
		
		
		if($runn[0]->Consumption==null){
		$runn[0]->Consumption=0;
		}
		$fulldata[$k][$i]['meter']=$meters[$i]->api_name;
		$fulldata[$k][$i]['date']=$datesarray[$k];                                
		$fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
		}

		}    
		return $fulldata;
	}
	function get_client_valid($id,$sid)
    {        
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_id', $id);
        $this->db->where('station_id', $sid);
        $user = $this->db->get()->row_array();
        return $user;
    }


	function get_table_name($c_id) {
        $this->db->select('db_table');
        $this->db->from('clients');
        $this->db->where('station_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['db_table'];
    }
    // Hardware api data
    function get_hardwares_device_data_waterlevelmeter($data){
		//echo json_encode($data);die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$dashboard_name=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		//echo $table_name;
		if($table_name != ''){

			$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnTime DESC LIMIT 1";
		// echo $querywaterlevel;die();
		$datawaterlevel = $this->db->query($querywaterlevel)->result();
		//$waterlevel=$datawaterlevel[0]->CurReading;
		if($locationName=='Fire-3'){
			$waterlevel=$datawaterlevel[0]->CurReading;
		}else if($locationName=='Fire Tank-1'){
			// $waterlevel=$datawaterlevel[0]->CurReading*3.5;
			$waterlevel=$datawaterlevel[0]->CurReading*1.34;
		}else if($locationName=='Fire-2'){
			// $waterlevel=$datawaterlevel[0]->CurReading*3.5;
			$waterlevel=$datawaterlevel[0]->CurReading*0.925;
		}else if($locationName=='Raw Water'){
			$waterlevel=$datawaterlevel[0]->CurReading*0.47;
		}else if($locationName=='Domestic Tank-A' ||$locationName=='Domestic Tank-B'||$locationName=='Domestic Tank-C'){
			$waterlevel=$datawaterlevel[0]->CurReading;
			// $waterlevel=$datawaterlevel[0]['CurReading']*3.51;
		}else{
			$waterlevel=$datawaterlevel[0]->CurReading;
		}
		$resdata['hardware_name']=(string)$dashboard_name;
		$resdata['tank_capacity']=(string)round($capacity/1000)." KL";
		$resdata['current_level']=(string)round($waterlevel/1000,2)." KL";
		$resdata['filled_percent']=(string)round(($waterlevel/$capacity)*100,2);
		$resdata['filled_percent_1']=(string)round(($waterlevel/$capacity)*100);
		}else{
			$resdata['hardware_name']=(string)$dashboard_name;
			$resdata['tank_capacity']="NA";
			$resdata['current_level']="NA";
			$resdata['filled_percent']="NA";
			$resdata['filled_percent_1']="NA";
		}
		
//echo json_encode($resdata);die();
		return $resdata;

	}
	function get_meters_name() {
        $this->db->select('');
        $this->db->from('hardware_station_consumption_data_mumbai_bkp_aprl12');     
        $this->db->where('UtilityName','Water Monitor'); 
		$this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit; SELECT * FROM `hardware_station_consumption_data_mumbai` WHERE `UtilityName`='Water Monitor' GROUP BY `LocationName`
		//echo $this->db->last_query();exit;
        return $res;
    }
	function get_hardwares_device_data_waterlevelmeter_mum($data){
		//print_r($data);die();
	   $station_id=$data['station_id'];
	   $table_name=$this->get_table_name($station_id);
	   date_default_timezone_set('Asia/Kolkata');
		$ttime= date('H:i:s');
	   //echo $table_name;die();
	//    //$hardware_name=$data['api_name'];
	//    $dashboardName=$data['dashboard_name'];
	//    $lineconnected=$data['LineConnected'];
	//    $utilityName=$data['UtilityName'];
	//    $locationName=$data['LocationName'];
	//    $capacity=100000;
	   $todayDate=date("Y-m-d");
	   $meter_list=$this->get_meters_name($table_name);
	   $i=0;
		foreach($meter_list as $meters){
			// if($meters['LocationName']=='Domestic Tank-B'){
			// 	$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='2021-12-20' AND TxnTime< '".$ttime."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnTime DESC LIMIT 1";
			// }else{
			// 	$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnTime DESC LIMIT 1";
			// }
			$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnTime DESC LIMIT 1";
			
	   //echo $querywaterlevel;die();
	   $datawaterlevel = $this->db->query($querywaterlevel)->result_array();
	   if($meters['LocationName']=='Fire Water Sump'){
		$waterlevel=$datawaterlevel[0]['CurReading']*1.33;
		$capacity=334000;
	}else if($meters['LocationName']=='Dom. Water Sump'){
		$waterlevel=$datawaterlevel[0]['CurReading']*3.05*0.79;
		$capacity=521000;
	}else if($meters['LocationName']=='Domestic Tank-B'){
		$waterlevel=$datawaterlevel[0]['CurReading']*0.471*2.15;
		$capacity=148000;
	}else{
		$waterlevel=$datawaterlevel[0]['CurReading'];
		$capacity=148000;
	}
	   
	   

	   $resdata[$i]['hardware_name']=(string)$meters['LocationName'];
		$resdata[$i]['tank_capacity']=(string)round($capacity/1000)." KL";
		$resdata[$i]['current_level']=(string)round($waterlevel/1000,2)." KL";
		$resdata[$i]['filled_percent']=(string)round(($waterlevel/$capacity)*100,2);
		$resdata[$i]['filled_percent_1']=(string)round(($waterlevel/$capacity)*100);
	   $i++;
		}
	   // if($hardware_name=='Fire-1'){
	   // $resdata['meter']=$dashboardName;
	   // $resdata['capacity']=350;
	   // $resdata['currentlevel']=340;
	   // $resdata['filledpercent']=round((340/350)*100,2);
	   // $resdata['filledpercent_1']=round((340/350)*100);
	   // }else{
		   
	   //}
		   
	   

	   

//echo json_encode($resdata);die();
	   return $resdata;

   }
function get_version($app_id,$operator){
	 $this->db->select('*');
		$this->db->from('version_data');
		$this->db->where('app_id', $app_id);
		$this->db->where('operator', $operator);			
		$res = $this->db->get()->row_array();
		return $res;
}
    function get_hardwares_device_data_flowmeter($data){
		//print_r($data);die();
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$dashboardName=$data['dashboard_name'];
		$LocationName=$data['LocationName'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-09-06";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$weekday = date('Y-m-d',strtotime("-6 days"));
		$firstday= date('Y-m-01', strtotime($todayDate));
		$earlier = new DateTime($firstday);
		$later = new DateTime($todayDate);

		$abs_diff = $later->diff($earlier)->format("%a")+1;
		$date_from = strtotime($firstday); 
        $date_to = strtotime($yesterDay); 

		
        $datesarray=array();
		
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=1;
		}
		//$check=$this->Api_data_model->check_data($utilityName);
		//if($check){
			if($table_name!=''){
				if($LocationName=='Tpi' || $LocationName=='A4 Building'){
					$queryconsutoday="SELECT round(SUM(Consumption)/1000,2)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
				}else{
					$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
				}
				
			
				$datacontoday = $this->db->query($queryconsutoday)->result();
				$todayday_consumption=$datacontoday[0]->cons;
				$yest_check=$this->chech_water_consumption($lineconnected,$utilityName,$yesterDay,$LocationName);
				if(count($yest_check)==1){
					if($LocationName=='Tpi' || $LocationName=='A4 Building'){
						$yesterday_consumption=(float)$yest_check[0]['consumption']*10;
					}else{
						$yesterday_consumption=(float)$yest_check[0]['consumption'];
					}
					
				}else{
					if($LocationName=='Tpi' || $LocationName=='A4 Building'){
						$queryconsuyest="SELECT round(SUM(Consumption)/1000,2)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
					}else{
						$queryconsuyest="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
					}
					
					$dataconyest = $this->db->query($queryconsuyest)->result();
					$yesterday_consumption=(float)$dataconyest[0]->cons;
				}
				
				$month_consumption_without_today=0;
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						$check=$this->chech_water_consumption($lineconnected,$utilityName,$datesarray[$k],$LocationName);
						if(count($check)==1){
							if($LocationName=='Tpi' || $LocationName=='A4 Building'){
								$month_consumption_without_today+=(float)$check[0]['consumption']*10;
							}else{
								$month_consumption_without_today+=(float)$check[0]['consumption'];
							}
							
						}else{
							if($LocationName=='Tpi' || $LocationName=='A4 Building'){
								$queryc="SELECT round((SUM(Consumption)/1000))*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							}else{
								$queryc="SELECT round((SUM(Consumption)/1000)) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							}
							
				
							$datac = $this->db->query($queryc)->result_array();
							$month_consumption_without_today+=(float)$datac[0]['cons'];
							
						}
						
						
					}
					$month_consumption_with_today=$month_consumption_without_today+$todayday_consumption;
				
				$resdata['hardware_name']=(string)$dashboardName;
				$resdata['today_inflow']=(string)$todayday_consumption." KL";
				$resdata['yesterday_inflow']=(string)$yesterday_consumption." KL";
				$resdata['monthly_inflow']=(string)$month_consumption_with_today." KL";
				$resdata['weekly_avg']=(string)round($month_consumption_with_today/$abs_diff,2)." KL";
				
				$resdata['status']=true;
				
			}else{
				$resdata['hardware_name']=(string)$dashboardName;
				$resdata['today_inflow']="NA";
				$resdata['yesterday_inflow']="NA";
				$resdata['monthly_inflow']="NA";
				$resdata['weekly_avg']="NA";
				
				$resdata['status']=true;
			}
			

		return $resdata;
	}
	function chech_water_consumption($lineconnected,$utilityName,$datesarray,$LocationName){
		$this->db->select('*');
        $this->db->from('water_meter_consumption_report_tbl');        
        
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('location_name',$LocationName);
		$this->db->where('report_date',$datesarray);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_energymeter_list($table_name){
		
		$this->db->select('');
        $this->db->from($table_name);     
        $this->db->where('LineConnected','kWh'); 
		$this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_hardwares_device_data_energy_meters($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$dashboardName=$data['dashboard_name'];
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		if($table_name !=''){
			$meter_list=$this->get_energymeter_list($table_name);
			if(count($meter_list)>0){
				$yesterDay = date('Y-m-d',strtotime("-1 days"));
				//$yesterDay = "2021-10-18";
				$weekday = date('Y-m-d',strtotime("-7 days"));
				$firstday= date('Y-m-01', strtotime($todayDate));
				$earlier = new DateTime($firstday);
				$later = new DateTime($todayDate);
				$date_from_month = strtotime($firstday); 
				$date_to_month = strtotime($todayDate); 
				$datesarray_month=array();
				for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
				{
				array_push($datesarray_month, date("Y-m-d",$i1));  
				}
				$abs_diff = $later->diff($earlier)->format("%a")+1;
				//print_r($meter_list);die();
				$i=0;
				foreach($meter_list as $meters){
					$enquery="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
					//echo $enquery;die();
						$consdata = $this->db->query($enquery)->result_array();
						$today_cons=round($consdata[0]['cons'],2);
						$check=$this->chech_energy_consumotion($meters['LocationName'],$yesterDay);
						if(count($check)==1){
						   $yest_consumption=(float)$check[0]['consumption'];
						}else{
							$enqueryyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$yesterDay."' AND LineConnected='kWh'	ORDER BY TxnTime";
							//echo $enquery;die();
								$consdatayest = $this->db->query($enqueryyest)->result_array();
								$yest_consumption=round($consdatayest[0]['cons'],2);
						}
						
						$monthly_cons=0;
						for ($k=0; $k < count($datesarray_month); $k++)
								{ 
								   $month_check=$this->chech_energy_consumotion($meters['LocationName'],$datesarray_month[$k]);
								   if(count($month_check)==1){
									   $monthly_cons+=(float)$month_check[0]['consumption'];
								   }else{
									   $runn_month="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate` = '".$datesarray_month[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
									   //echo $pressure;die();
										$runn_month_data = $this->db->query($runn_month)->result_array();
										
										$monthly_cons+=(float)$runn_month_data[0]['cons'];
								   }
								}
								$monthly_cons_with_today=$monthly_cons+$today_cons;
						
		
					if($meters['LocationName']=="AFS project-C"){ 
						$resdata[$i]['hardware_name']="Container office";
					}else if($meters['LocationName']=="B4 Building"){
						$resdata[$i]['hardware_name']="A4 Building";
					}else if($meters['LocationName']=="Mains"){
						$resdata[$i]['hardware_name']="Main I/C (EB)";
					}else if($meters['LocationName']=="Fire Fighting"){
						$resdata[$i]['hardware_name']="Fire pump panel";
					}else if($meters['LocationName']=="LDB Pump"){
						$resdata[$i]['hardware_name']="LDB (Pump room)";
					}else if($meters['LocationName']=="LDB Street"){
						$resdata[$i]['hardware_name']="LDB (Street light panel)";
					}else{
						$resdata[$i]['hardware_name']=$meters['LocationName'];
					}
		
						//$resdata[$i]['meter']=$meters['LocationName'];
						$resdata[$i]['today_consumption']=(string)$today_cons." Kwh";
						$resdata[$i]['yesterday_consumption']=(string)$yest_consumption." Kwh";
						$resdata[$i]['monthly_consumption']=(string)$monthly_cons_with_today." Kwh";
						$resdata[$i]['weekly_avg']=(string)round($monthly_cons_with_today/$abs_diff,2)." Kwh";
						//$resdata[$i]['scale']="Kwh";
		
					$i++;
		
				}
			}else{
				$resdata[0]['hardware_name']=$dashboardName;
				$resdata[0]['today_consumption']="NA";
				$resdata[0]['yesterday_consumption']="NA";
				$resdata[0]['monthly_consumption']="NA";
				$resdata[0]['weekly_avg']="NA";
			}
			
		}else{
			$resdata[0]['hardware_name']=$dashboardName;
			$resdata[0]['today_consumption']="NA";
			$resdata[0]['yesterday_consumption']="NA";
			$resdata[0]['monthly_consumption']="NA";
			$resdata[0]['weekly_avg']="NA";
		}
		
		//echo json_encode($resdata);die();
		return $resdata;

	}
	function chech_energy_consumotion($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
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
	function get_meter_list_by_tower($table_name,$tower){
		$this->db->select('LocationName');
        $this->db->from($table_name);     
        $this->db->where('LocationGroup',$tower); 
		$this->db->where('UomName','Status'); 
         $this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_hardwares_device_data_switch_control($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		$towers=array('Tower-A','Tower-B','Tower-C');
		foreach($towers as $tower){
			$meter_list=$this->get_meter_list_by_tower($table_name,$tower);
			$i=0;
			foreach($meter_list as $meters){
				if($meters['LocationName']=='26th Floor'){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='19th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='2nd Floor'){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='P4 Floor'){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='7th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor' || $meters['LocationName']=='23th Floor' ){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else{
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}
				if($meters['LocationName']=='Lobby'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='5th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='40th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='40th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='2nd Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='14th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='21th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor' || $meters['LocationName']=='23th Floor' || $meters['LocationName']=='16th Floor' || $meters['LocationName']=='44th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else{
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}
				
				//echo $emergency; die();
				$emergencydata = $this->db->query($emergency)->result_array();

				
				$non_emergencydata = $this->db->query($non_emergency)->result_array();
				$resdata[$tower][$i]['hardware_name']=$meters['LocationName'];
				if($emergencydata[0]['CurReading']==0){
					$resdata[$tower][$i]['emergency_status']=false;
				}else{
					$resdata[$tower][$i]['emergency_status']=true;
				}
				if($non_emergencydata[0]['CurReading']==0){
					$resdata[$tower][$i]['non_emergency_status']=false;
				}else{
					$resdata[$tower][$i]['non_emergency_status']=true;
				}
				
				$i++;

			}
			
			//print_r($meter_list);die();

		}
		//$meter_list=$this->get_meter_list($table_name);
		
		//echo json_encode($resdata);die();
		//die();
		return $resdata;
	}
	function get_hardwares_device_data_switch_status($data){
		// print_r($data);die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_meter_list($table_name);
		$i=0;
		$j=0;
		$mcb = array("DG Room", "Mains");
		foreach($meter_list as $meters){
			if (in_array($meters['LocationName'], $mcb)){
				if($meters['LocationName']=="Mains"){
					$utilityName='Electricity';
				}else{
					$utilityName='Diesel Generator';
				}
				$mcboff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb-Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcboffdata = $this->db->query($mcboff)->result_array();

				$mcbon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb On' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbondata = $this->db->query($mcbon)->result_array();
				
				$mcbtrip="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb Trip' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbtripdata = $this->db->query($mcbtrip)->result_array();
				
				$yphase="SELECT `CurReading` FROM $table_name WHERE  `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='Y-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$yphasedata = $this->db->query($yphase)->result_array();
				//echo $yphase;die();
				$rphase="SELECT `CurReading` FROM $table_name WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='R-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$rphasedata = $this->db->query($rphase)->result_array();
				//echo $rphasedata[0]['CurReading'];die();
				$bphase="SELECT `CurReading` FROM $table_name WHERE  `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='B-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$bphasedata = $this->db->query($bphase)->result_array();
				if($meters['LocationName']=='DG Room'){
					$resdata['non_phase'][$i]['meter']='DG I/C';
				}else if($meters['LocationName']=="Mains"){
					$resdata['non_phase'][$i]['meter']='Main I/C (EB)';
				}else{
					$resdata['non_phase'][$i]['meter']=$meters['LocationName'];
				}
				
				

				if($mcboffdata[0]['CurReading']==0 && $mcbondata[0]['CurReading']==1){
					$resdata['non_phase'][$i]['status']=true;
				}else{
					$resdata['non_phase'][$i]['status']=false;
				}

				if($mcbtripdata[0]['CurReading']==0){
					$resdata['non_phase'][$i]['trip']=false;
				}else{
					$resdata['non_phase'][$i]['trip']=true;
				}
				if($meters['LocationName']=='DG Room'){
					$resdata['phase'][$j]['meter']='DG I/C';
				}else if($meters['LocationName']=="Mains"){
					$resdata['phase'][$j]['meter']='Main I/C (EB)';
				}else{
					$resdata['phase'][$j]['meter']=$meters['LocationName'];
				}
				
				if($yphasedata[0]['CurReading']==1){
					$resdata['phase'][$j]['yphase']=true;
				}else{
					$resdata['phase'][$j]['yphase']=false;
				}
				if($rphasedata[0]['CurReading']==1){
					$resdata['phase'][$j]['rphase']=true;
				}else{
					$resdata['phase'][$j]['rphase']=false;
				}
				if($bphasedata[0]['CurReading']==1){
					$resdata['phase'][$j]['bphase']=true;
				}else{
					$resdata['phase'][$j]['bphase']=false;
				}
				
				$j++;

			}else{
				if($meters['LocationName']=='PDB pump'){
					$poff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power On' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
					$poffdata = $this->db->query($poff)->result_array();
	
					$pon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power Off' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
					$pondata = $this->db->query($pon)->result_array();
	
					$trip="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Trip' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
					$tripdata = $this->db->query($trip)->result_array();
				}else{
					$poff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
					$poffdata = $this->db->query($poff)->result_array();
	
					$pon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power On' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
					$pondata = $this->db->query($pon)->result_array();
	
					$trip="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Trip' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
					$tripdata = $this->db->query($trip)->result_array();
				}
				
			//echo "Meter:".$meters['LocationName']." poff:".$poffdata[0]['CurReading']." pon:".$pondata[0]['CurReading']."<br>";
				
				if($meters['LocationName']=='Bg Building'){
					$resdata['non_phase'][$i]['meter']='A4 Building';
				}else if($meters['LocationName']=='Fire Fighting'){
					$resdata['non_phase'][$i]['meter']='Fire pump panel';
				}else if($meters['LocationName']=='LSB'){
					$resdata['non_phase'][$i]['meter']='LSB panel I/C';
				}else if($meters['LocationName']=='PDB pump'){
					$resdata['non_phase'][$i]['meter']='PDB Panel';
				}else if($meters['LocationName']=='SB'){
					$resdata['non_phase'][$i]['meter']='APFC Panel I/C';
				}else{
					$resdata['non_phase'][$i]['meter']=$meters['LocationName'];
				}
				if($meters['LocationName']=='Hyd.Pneu.System' || $meters['LocationName']=='Project'|| $meters['LocationName']=='MarketingOffice' || $meters['LocationName']=='Fire Pump House' ){
					$resdata['non_phase'][$i]['status']=true;
					$resdata['non_phase'][$i]['trip']=false;
				}else{
					if($poffdata[0]['CurReading']==0 && $pondata[0]['CurReading']==1){
						$resdata['non_phase'][$i]['status']=true;
					}else{
						$resdata['non_phase'][$i]['status']=false;
					}
					if($tripdata[0]['CurReading']==0){
						$resdata['non_phase'][$i]['trip']=false;
					}else{
						$resdata['non_phase'][$i]['trip']=true;
					}
				}

				
			}
			
			  $i++;

			


		}
		//echo json_encode($resdata);die();
		//die();
		return $resdata;
	}
    function get_hardwares_device_data_dg($data){
		
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-08-20";

		if($table_name !=''){
			$startEndFuelQuery="SELECT 
			(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
			(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
			$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
			//echo json_encode($dataStartEndFuel[0]->start);die();
			if(is_null($dataStartEndFuel[0]->start)){
				$resdata1['hardware_name']=(string)$hardware_name;
			$resdata1['running_hours']="NA";
			$resdata1['fuel_add']="NA";
			$resdata1['fuel_remove']="NA";
			$resdata1['fuel_consume']="NA";
			$resdata1['economy']="NA";
			$resdata1['available_fuel']="NA";
			$resdata1['tank_capacity']="NA";		
			$resdata1['filled_percent']="0";
			$resdata1['voltage']="NA";
			$resdata1['graph']=array();
			}else{
				$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'";
			$dataRunn = $this->db->query($queryRunn)->result();
			
			$resdata['running_hours']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
			$resdata1['running_hours']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
			
			$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled'";
			
			$dataAdd = $this->db->query($queryFadd)->result();
			$resdata['fuel_add']=(string)$dataAdd[0]->fadd;
			$resdata1['fuel_add']=(string)$dataAdd[0]->fadd." Ltrs";
	
	
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
	
			$resdata['fuel_remove']=(string)$fremove;
			$resdata1['fuel_remove']=(string)$fremove." Ltrs";
			$resdata['fuel_consume1']=(string)round($dataStartEndFuel[0]->start+$resdata['fuel_add']-$dataStartEndFuel[0]->end-$resdata['fuel_remove'],2);
			if($resdata['fuel_consume1'] <= 0 || $dataRunn[0]->run==0){
				$finaleco =0;
				$resdata['fuel_consume']="0 Ltrs";
				$resdata1['fuel_consume']="0 Ltrs";
				//return 0;
			}
			else{
				$resdata['fuel_consume']=(string)$resdata['fuel_consume1'];
				$resdata1['fuel_consume']=(string)$resdata['fuel_consume1']." Ltrs";
				$rs = explode(":", $resdata['run']);
				//print_r($rs);
				$hrs = $rs[0];
				$mins = $rs[1];
				$total_mins = ($hrs*60)+$mins;
				if($total_mins != 0){
					$eco = ($resdata['fuel_consume']/$total_mins)*60;
				}
				else{
					$eco = 0;
				}
				//echo "<br>".$eco."<br>";
				$finaleco= round($eco,2);
				
			}
			$resdata1['hardware_name']=(string)$hardware_name;
			$resdata['economy']=(string)$finaleco;
			$resdata1['economy']=(string)$finaleco;
			$resdata['available_fuel']=(string)$dataStartEndFuel[0]->end;
			$resdata1['available_fuel']=(string)$dataStartEndFuel[0]->end." Ltrs";
			$resdata1['tank_capacity']="380 Ltrs";
			$resdata['filled_percent']=(string)round(($dataStartEndFuel[0]->end/380)*100);
			$resdata1['filled_percent']=(string)round(($dataStartEndFuel[0]->end/380)*100);
	
			$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
			//echo $queryRuntimes;die();
			$dataVoltage = $this->db->query($queryVoltage)->result();
	
			$resdata1['voltage']=(string)$dataVoltage[0]->Consumption." Volt";
			//$resdata['scale']="Ltrs";
	
			$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
			//echo $queryRuntimes;die();
			$dataStatus = $this->db->query($queryStatus)->result();
			if($dataStatus[0]->Consumption==1){
				$status=true;
			}else{
				$status=false;
			}
			$resdata1['status']=$status;
			
			$graphdata=$this->graph_data($hardware_name,$todayDate,$table_name);
			$resdata1['graph']=$graphdata;
			// }else{
			//     $resdata['hardware_name']=$hardware_name;
			// 	$resdata['run']="NA";
			// 	$resdata['fadd']="NA";
			// 	$resdata['fremove']="NA";
			// 	$resdata['fconsume']="NA";
			// 	$resdata['economy']="NA";
			// 	$resdata['availableFuel']="NA";
			// 	$resdata['voltage']="NA";
			// 	$resdata['status']="NA";
			// 	$resdata['filledpercent']="NA";
			// 	$resdata['graph']=array();
	
	
			// }
			}
			
			
		}else{
			$resdata1['hardware_name']=(string)$hardware_name;
			$resdata1['running_hours']="NA";
			$resdata1['fuel_add']="NA";
			$resdata1['fuel_remove']="NA";
			$resdata1['fuel_consume']="NA";
			$resdata1['economy']="NA";
			$resdata1['available_fuel']="NA";
			$resdata1['tank_capacity']="NA";		
			$resdata1['filled_percent']="0";
			$resdata1['voltage']="NA";
			$resdata1['graph']=array();

		}
			
		return $resdata1;
		
	}
	function graph_data($name,$date,$table_name){
		$to=date("Y-m-d");
		$from = date('Y-m-d',strtotime("-6 days"));
		
		$date_from = strtotime($from); 
        $date_to = strtotime($to); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) 
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for($k=0; $k < count($datesarray); $k++) 
        {
			$check=$this->chech_dg_running($name,$datesarray[$k]);
			if(count($check)==1){
				$fulldata[$k]['time']=$check[0]['report_date'];;
				$fulldata[$k]['hardware_name']=$check[0]['dg_name'];
				$fulldata[$k]['runninghrs']=(int)$check[0]['running_min2'];
			}else{
				$queryD = "SELECT SUM(Consumption) as run  FROM $table_name where UtilityName='".$name."'  AND LineConnected='DG_Running_Time' AND TxnDate='".$datesarray[$k]."'   order by TxnTime";
				$data1D = $this->db->query($queryD)->result();
				$fulldata[$k]['time']=$datesarray[$k];
				$fulldata[$k]['hardware_name']=$name;
				$fulldata[$k]['runninghrs']=(int)$data1D[0]->run;
			}
			
			//$fulldata[$k]['scale']=(int)$data1D[0]->run;
		}
		
		  
		  return $fulldata;

	}
	function chech_dg_running($hardware_name,$date){
		$this->db->select('*');
        $this->db->from('dg_running_report_tbl');        
        
		$this->db->where('dg_name',$hardware_name);
		
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		// echo "ll:".$this->db->last_query();die();       
        return $res;
	}
    function get_hardwares_device_data_power($data){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-08-20";

		// $check=$this->Api_data_model->check_data('Electricity Board');
		// if($check){
			if($table_name != ''){
				$queryeb="SELECT `CurReading` FROM $table_name WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='Electricity Board' AND `LineConnected`='E.B. Supply' ORDER BY TxnTime DESC LIMIT 1";

			$querydg="SELECT `CurReading` FROM $table_name WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='Diesel Generator' AND `LineConnected`='D.G. Supply' ORDER BY TxnTime DESC LIMIT 1";
			$dataEB = $this->db->query($queryeb)->result_array();
			$dataDG = $this->db->query($querydg)->result_array();
			if(count($dataEB)>0 && count($dataDG)>0){
				if($dataEB[0]['CurReading']==1 && $dataDG[0]['CurReading']==0){
					$resdata['hardware_name']='Power Supply';
					   $resdata['eb_status']=true;
					   $resdata['dg_status']=false;
					   $resdata['trip']=false;
					   
		
		
				   }else if($dataEB[0]['CurReading']==0 && $dataDG[0]['CurReading']==1){
					$resdata['hardware_name']='Power Supply';
						$resdata['eb_status']=false;
					   $resdata['dg_status']=true;
					   $resdata['trip']=false;
					   
				   }else if($dataEB[0]['CurReading']==1 && $dataDG[0]['CurReading']==1){
					$resdata['hardware_name']='Power Supply';
						$resdata['eb_status']=true;
					   $resdata['dg_status']=true;
					   $resdata['trip']=true;
					   
				   }else{
					$resdata['hardware_name']='Power Supply';
					$resdata['eb_status']=false;
					$resdata['dg_status']=false;
					$resdata['trip']=false;
					
				   }
			}else{
				$resdata['hardware_name']='Power Supply';
				$resdata['eb_status']="NA";
				$resdata['dg_status']="NA";
				$resdata['trip']="NA";
			}
           

			}else{
				$resdata['hardware_name']='Power Supply';
				$resdata['eb_status']="NA";
				$resdata['dg_status']="NA";
				$resdata['trip']="NA";
			}
			

		// }else{
        //     $resdata['hardware_name']='Power Supply';
		// 	$resdata['ebstatus']='NA';
		// 	$resdata['dgstatus']='NA';
		// 	$resdata['trip']='NA';
			
		// }
		return $resdata;
	}

	
}