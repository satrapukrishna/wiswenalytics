<?php
class Device_model extends CI_Model{
	function __construct(){
		date_default_timezone_set('Asia/Kolkata');
	      parent::__construct();
    }
    // function get_apollo_data(){
    // 	$today=date("Y-m-d");
    // 	//$apollo = array("Tomo Therapy", "Waiting Hall", "Novalis Ch WD-1","Novalis Ch WD-2");
	// 	$queryD = "SELECT LocationName FROM hardware_station_consumption_data_apollo where StationId=2018000087 group by LocationName";
	// // echo $queryD;
	// 	  $apollo = $this->db->query($queryD)->result();

    // 	for ($i=0; $i < count($apollo); $i++) { 
    // 		$sql="select TxnTime,TxnDate,LocationName from hardware_station_consumption_data_apollo where TxnDate='".$today."' and LocationName='".$apollo[$i]->LocationName."' order by TxnTime desc limit 1";
    // 		$ddt = $this->db->query($sql)->result();
    // 		//echo count($ddt)."<br>";
    // 		if(count($ddt)>0){
    // 		$fulldata[$i]['Date']=$ddt[0]->TxnDate;
    // 		//$fulldata[$i]['Time']='11:30:08';
	// 		 $fulldata[$i]['Time']=$ddt[0]->TxnTime;
	// 		$dt= $fulldata[$i]['Date']." ".$fulldata[$i]['Time'];
	// 		$datetime1 = new DateTime();
	// 		$datetime2 = new DateTime($dt);
	// 		$interval = $datetime1->diff($datetime2);

	// 		$elapsed = $interval->format('%h:%i:%s');
	// 		if($interval->invert==1){
	// 			$fulldata[$i]['LateTime']=$elapsed;
	// 			$fulldata[$i]['EarlyTime']="NA";
	// 		}else{
	// 			$fulldata[$i]['EarlyTime']=$elapsed;
	// 			$fulldata[$i]['LateTime']="NA";
	// 		}
			
    // 		$fulldata[$i]['Device']=$apollo[$i]->LocationName;
    // 		$fulldata[$i]['status']=1;
    // 		}else{
    // 			$sql2="select TxnTime,TxnDate,LocationName from hardware_station_consumption_data_apollo where TxnDate='".$today."' and LocationName='".$apollo[$i]->LocationName."' order by TxnTime desc limit 1";
    // 			$ddt2 = $this->db->query($sql2)->result();
    // 		$fulldata[$i]['Date']=$ddt2[0]->TxnDate;
    // 		$fulldata[$i]['Time']=$ddt2[0]->TxnTime;
    // 		$fulldata[$i]['Device']=$apollo[$i]->LocationName;
    // 		$fulldata[$i]['status']=0;
    // 		}
    		
    // 	}
	// 	//echo json_encode($fulldata);die();
    // 	return $fulldata;

    // }
	function get_apollo_data_client(){
    	$today=date("Y-m-d");
    	//$apollo = array("Tomo Therapy", "Waiting Hall", "Novalis Ch WD-1","Novalis Ch WD-2");
		$queryD = "SELECT * FROM hardware_station_consumption_data_apollo where TxnDate='".$today."'  order by TxnTime desc limit 1";
	// echo $queryD;
		  $apollo = $this->db->query($queryD)->result();

		//echo json_encode($fulldata);die();
    	return $fulldata;

    }
	function get_chennai_data($table_name){
		
			$water_level_devices=$this->Device_model->get_water_level_list('hardware_station_consumption_data_chennai_device_list');
			$water_meter_devices=$this->Device_model->get_water_meter_list('hardware_station_consumption_data_chennai_device_list');
			$old_firepump_devices=$this->Device_model->get_old_firepump_list('hardware_station_consumption_data_chennai_device_list');
			$new_firepump_devices=$this->Device_model->get_new_firepump_list('hardware_station_consumption_data_chennai_device_list');
			$hydro_devices=$this->Device_model->get_hydro_list('hardware_station_consumption_data_chennai_device_list');
			$energy_devices=$this->Device_model->get_energy_list('hardware_station_consumption_data_chennai_device_list');
			$dg_devices=$this->Device_model->get_dg_list('hardware_station_consumption_data_chennai_device_list');
			$switch_devices=$this->Device_model->get_switch_list('hardware_station_consumption_data_chennai_device_list');
			$data['water_level_data']=$this->Device_model->get_water_level($table_name,$water_level_devices);
			$data['water_meter_data']=$this->Device_model->get_water_meter_chennai($table_name,$water_meter_devices);
			$data['old_firepump_data']=$this->Device_model->get_old_firepump_chennai($table_name,$old_firepump_devices);
			$data['new_firepump_data']=$this->Device_model->get_new_firepump_chennai($table_name,$new_firepump_devices);
			$data['hydro_data']=$this->Device_model->get_hydro_chennai($table_name,$hydro_devices);
			$data['energy_data']=$this->Device_model->get_energy_chennai($table_name,$energy_devices);
			$data['energy_data']=$this->Device_model->get_dg_chennai($table_name,$dg_devices);
			$data['switch_data']=$this->Device_model->get_switch_chennai($table_name,$switch_devices);

			//echo json_encode($data);
			return $data;
		


	}
	function get_mumbai_data($table_name){
		
		$water_level_devices=$this->Device_model->get_water_level_list('hardware_station_consumption_data_mumbai_device_list');
		$switchcontrol_devices=$this->Device_model->get_switchcontrol_list('hardware_station_consumption_data_mumbai_device_list');
		
		$data['water_level_data']=$this->Device_model->get_water_level($table_name,$water_level_devices);
		$data['switchcontrol_data']=$this->Device_model->get_switchcontrol_mumbai($table_name,$switchcontrol_devices);
		

		// echo json_encode($data);
		return $data;
	


}
function get_apollo_data($table_name){
		
	$ahu_devices=$this->Device_model->get_ahu_list('hardware_station_consumption_data_apollo_device_list');
	
	$data['ahu_data']=$this->Device_model->get_ahu_apollo($table_name,$ahu_devices);
	

	// echo json_encode($data);
	return $data;



}
	function get_ahu_apollo($table_name,$devices){
		

		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$querywaterlevel="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LocationName`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
			$fulldata[$i]['last_recieved_date']=$datawaterlevel[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datawaterlevel[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			// $date = date('Y-m-d H:i:s');
			// echo $date;die();
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datawaterlevel[0]['ToTime']);
			$time2 = new DateTime($datawaterlevel[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');

    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_switchcontrol_mumbai($table_name,$devices){
		

		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$querywaterlevel="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LocationName`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
			$fulldata[$i]['last_recieved_date']=$datawaterlevel[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datawaterlevel[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			// $date = date('Y-m-d H:i:s');
			// echo $date;die();
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datawaterlevel[0]['ToTime']);
			$time2 = new DateTime($datawaterlevel[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');

    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_water_level($table_name,$devices){
		

		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$querywaterlevel="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LocationName`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
			$fulldata[$i]['last_recieved_date']=$datawaterlevel[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datawaterlevel[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			// $date = date('Y-m-d H:i:s');
			// echo $date;die();
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datawaterlevel[0]['ToTime']);
			$time2 = new DateTime($datawaterlevel[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');

    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_water_meter_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$querywaterlevel="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LocationName`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
			$fulldata[$i]['last_recieved_date']=$datawaterlevel[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datawaterlevel[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datawaterlevel[0]['ToTime']);
			$time2 = new DateTime($datawaterlevel[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_old_firepump_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$query_old_firepump="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LineConnected`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$dataoldfirepump = $this->db->query($query_old_firepump)->result_array();
			$fulldata[$i]['last_recieved_date']=$dataoldfirepump[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$dataoldfirepump[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($dataoldfirepump[0]['ToTime']);
			$time2 = new DateTime($dataoldfirepump[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_new_firepump_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$query_new_firepump="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LineConnected`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datanewfirepump = $this->db->query($query_new_firepump)->result_array();
			$fulldata[$i]['last_recieved_date']=$datanewfirepump[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datanewfirepump[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datanewfirepump[0]['ToTime']);
			$time2 = new DateTime($datanewfirepump[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_hydro_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$query_hydro="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LineConnected`='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datahydro = $this->db->query($query_hydro)->result_array();
			$fulldata[$i]['last_recieved_date']=$datahydro[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datahydro[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datahydro[0]['ToTime']);
			$time2 = new DateTime($datahydro[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_energy_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$query_energy="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE `LineConnected`='kWh' and LocationName='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$dataenergy = $this->db->query($query_energy)->result_array();
			$fulldata[$i]['last_recieved_date']=$dataenergy[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$dataenergy[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($dataenergy[0]['ToTime']);
			$time2 = new DateTime($dataenergy[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_switch_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$query_switch="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE MeterName='Status Monitor' and LocationName='".$value['LocationName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$dataswitch = $this->db->query($query_switch)->result_array();
			$fulldata[$i]['last_recieved_date']=$dataswitch[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$dataswitch[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($dataswitch[0]['ToTime']);
			$time2 = new DateTime($dataswitch[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['LocationName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_dg_chennai($table_name,$devices){
		// echo json_encode($devices);die();
		$i=0;
		foreach ($devices as $key => $value) {
			$query_dg="SELECT TxnDate,TxnTime,FromTime,ToTime FROM $table_name WHERE  UtilityName='".$value['UtilityName']."' ORDER BY TxnDate DESC, TxnTime DESC LIMIT 1";				
			$datadg = $this->db->query($query_dg)->result_array();
			$fulldata[$i]['last_recieved_date']=$datadg[0]['TxnDate'];
    		$fulldata[$i]['last_recieved_time']=$datadg[0]['TxnTime'];

			$dt= $fulldata[$i]['last_recieved_date']." ".$fulldata[$i]['last_recieved_time'];
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($dt);
			$interval = $datetime1->diff($datetime2);
			$elapsed = $interval->format('%a Days,%h:%i:%s');
			$fulldata[$i]['time_delay']=$elapsed;

			$time1 = new DateTime($datadg[0]['ToTime']);
			$time2 = new DateTime($datadg[0]['FromTime']);
			$interval3 = $time1->diff($time2);
			$fulldata[$i]['data_frequency']=$interval3->format('%h:%i:%s');
			
    		$fulldata[$i]['device']=$value['UtilityName'];
			$i++;
			//print_r($datawaterlevel);
		}
		//echo json_encode($fulldata);die();
		return $fulldata;

	}
	function get_switchcontrol_list($table_name){
		$query_switchcontrol_devices = "SELECT DISTINCT `LocationName` FROM $table_name WHERE UomName='Status';
		";
		$switchcontrol_devices = $this->db->query($query_switchcontrol_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $switchcontrol_devices;
	}
	function get_water_level_list($table_name){
		$query_wate_level_devices = "SELECT LocationName FROM $table_name WHERE `LineConnected`='Water Level'  GROUP BY `LocationName`";
		$water_devices = $this->db->query($query_wate_level_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $water_devices;
	}
	function get_ahu_list($table_name){
		$query_ahu_devices = "SELECT DISTINCT LocationName FROM $table_name ";
		$ahu_devices = $this->db->query($query_ahu_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $ahu_devices;
	}
	function get_water_meter_list($table_name){
		$query_wate_meter_devices = "SELECT distinct LocationName FROM $table_name where MeterName='Water Flow'";
		$water_meter_devices = $this->db->query($query_wate_meter_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $water_meter_devices;
	}
	function get_old_firepump_list($table_name){
		$query_old_firepump_devices = "SELECT distinct LineConnected as LocationName FROM $table_name where UtilityName='Old Fire Pump' and LineConnected IN('Mains On','Jockey Pump On','Main Pump On','DG ON','Pressure')";
		$old_firepump_devices = $this->db->query($query_old_firepump_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $old_firepump_devices;
	}
	function get_new_firepump_list($table_name){
		$query_new_firepump_devices = "SELECT distinct LineConnected as LocationName FROM $table_name where UtilityName='New Fire Pump' and LineConnected IN('Jockey Pump RHT','Engine Run','Pressure')";
		$new_firepump_devices = $this->db->query($query_new_firepump_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $new_firepump_devices;
	}
	function get_hydro_list($table_name){
		$query_hydro_devices = "SELECT distinct LineConnected as LocationName FROM $table_name where MeterSerial='0061' and LineConnected IN('Motor-1 RHT','Motor-2 RHT','Pressure')";
		$hydro_devices = $this->db->query($query_hydro_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $hydro_devices;
	}
	function get_energy_list($table_name){
		$query_energy_devices = "SELECT distinct LocationName FROM $table_name where  LineConnected='kWh'";
		$energy_devices = $this->db->query($query_energy_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $energy_devices;
	}
	function get_dg_list($table_name){
		$query_dg_devices = "SELECT distinct UtilityName FROM $table_name where  UtilityName='Diesel Generator'";
		$dg_devices = $this->db->query($query_dg_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $dg_devices;
	}
	function get_switch_list($table_name){
		$query_switch_devices = "SELECT distinct LocationName FROM hardware_station_consumption_data_chennai_device_list where MeterName='Status Monitor'";
		$switch_devices = $this->db->query($query_switch_devices)->result_array();
		//echo $this->db->last_query();die();  
		return $switch_devices;
	}
	function check_data($date,$table_name){
		$this->db->select('*');
        $this->db->from($table_name);        
        $this->db->where('TxnDate', $date);
		
		 $res = $this->db->get();   
		 //echo $this->db->last_query();die();           
        return $res->num_rows();
	}
    function get_jll_data(){
    	$today=date("Y-m-d");
    	$jll = array("Indore Air Quality", "Fire Pump House", "UG Flush Tank");
    	for ($i=0; $i < count($jll); $i++) { 
    		$sql="select TxnTime,TxnDate,UtilityName from hardware_station_consumption_data_jll where TxnDate='".$today."' and UtilityName='".$jll[$i]."' order by TxnTime desc limit 1";
    		$ddt = $this->db->query($sql)->result();
    		//echo count($ddt)."<br>";
    		if(count($ddt)>0){
				$fulldata[$i]['Date']=$ddt[0]->TxnDate;
				//$fulldata[$i]['Time']='11:30:08';
				 $fulldata[$i]['Time']=$ddt[0]->TxnTime;
				$dt= $fulldata[$i]['Date']." ".$fulldata[$i]['Time'];
				$datetime1 = new DateTime();
				$datetime2 = new DateTime($dt);
				$interval = $datetime1->diff($datetime2);
	
				$elapsed = $interval->format('%h:%i:%s');
				if($interval->invert==1){
					$fulldata[$i]['LateTime']=$elapsed;
					$fulldata[$i]['EarlyTime']="NA";
				}else{
					$fulldata[$i]['EarlyTime']=$elapsed;
					$fulldata[$i]['LateTime']="NA";
				}
    		$fulldata[$i]['Device']=$ddt[0]->UtilityName;
    		$fulldata[$i]['status']=1;
    		}else{
    			$sql2="select TxnTime,TxnDate,UtilityName from hardware_station_consumption_data_jll where TxnDate='".$today."' and UtilityName='".$apollo[$i]."' order by TxnTime desc limit 1";
    			$ddt2 = $this->db->query($sql2)->result();
    		$fulldata[$i]['Date']=$ddt2[0]->TxnDate;
    		$fulldata[$i]['Time']=$ddt2[0]->TxnTime;
    		$fulldata[$i]['Device']=$ddt2[0]->UtilityName;
    		$fulldata[$i]['status']=0;
    		}
    		
    	}
    	return $fulldata;

    }
    function get_myhome_data(){
    	$today=date("Y-m-d");
    	$myhome = array("CT_1-6", "CT_8-10", "CT_13-16","CT_17-20","CT_11-12","DT_1-4/27-20","DT_5-10/11-16","FT_1-4/17-20","FT_5-10/11-16");
    	for ($i=0; $i < count($myhome); $i++) { 
    		$sql="select TxnTime,TxnDate,LocationName from hardware_station_consumption_data_myhome where TxnDate='".$today."' and LocationName='".$myhome[$i]."' order by TxnTime desc limit 1";
    		$ddt = $this->db->query($sql)->result();
    		//echo count($ddt)."<br>";
    		if(count($ddt)>0){
				$fulldata[$i]['Date']=$ddt[0]->TxnDate;
				//$fulldata[$i]['Time']='11:30:08';
				 $fulldata[$i]['Time']=$ddt[0]->TxnTime;
				$dt= $fulldata[$i]['Date']." ".$fulldata[$i]['Time'];
				$datetime1 = new DateTime();
				$datetime2 = new DateTime($dt);
				$interval = $datetime1->diff($datetime2);
	
				$elapsed = $interval->format('%h:%i:%s');
				if($interval->invert==1){
					$fulldata[$i]['LateTime']=$elapsed;
					$fulldata[$i]['EarlyTime']="NA";
				}else{
					$fulldata[$i]['EarlyTime']=$elapsed;
					$fulldata[$i]['LateTime']="NA";
				}
    		$fulldata[$i]['Device']=$myhome[$i];
    		$fulldata[$i]['status']=1;
    		}else{
    			$sql2="select TxnTime,TxnDate,LocationName from hardware_station_consumption_data_myhome where  LocationName='".$myhome[$i]."' order by TxnTime desc limit 1";
    			$ddt2 = $this->db->query($sql2)->result();
    		$fulldata[$i]['Date']=$ddt2[0]->TxnDate;
    		$fulldata[$i]['Time']=$ddt2[0]->TxnTime;
    		$fulldata[$i]['Device']=$myhome[$i];
    		$fulldata[$i]['status']=0;
    		}
    		
    	}
    	return $fulldata;

    }
}
?>