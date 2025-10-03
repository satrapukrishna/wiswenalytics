<?php
class Api_data_db_table_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	function get_devices_list($cat_id){
		$this->db->select('hardware_device');
        $this->db->from('hardware');        
        
		$this->db->where('client_id',20);  
		$this->db->where('status',1);
		$this->db->where('hardware_category',$cat_id);
        $this->db->group_by('hardware_device');
        $res = $this->db->get()->result_array();        
		// echo $this->db->last_query();die();       
        return $res;
	}
	function get_devices_list_all($cat_id,$cat_id2){
		$this->db->select('hardware_device');
        $this->db->from('hardware');        
        
		$this->db->where('client_id',20);  
		$this->db->where('status',1);
		
		$this->db->where_in('hardware_category',array($cat_id,$cat_id2));
		//$this->db->where('hardware_category',$cat_id2);
        $this->db->group_by('hardware_device');
        $res = $this->db->get()->result_array();        
		// echo $this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_list1($device_id){
		$this->db->select('');
        $this->db->from('hardware as h');        
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		
		$this->db->where('h.client_id',20);
		if($device_id!=''){
			$this->db->where('h.hardware_device',$device_id);
		}	 
		
		$this->db->where('h.status',1);	  
        // $this->db->group_by('h.hardware_device');
        $res = $this->db->get()->result_array();  
		// echo $this->db->last_query();exit;
        return $res;
	}
	function get_table_name($c_id) {
        $this->db->select('db_table');
        $this->db->from('clients');
        $this->db->where('station_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['db_table'];
    }
	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%h hours %i minutes');
	}
	function get_device_name($id){
		$this->db->select('device_name');
        $this->db->from('hardware_device');     
        //$this->db->where('status',1);     
		$this->db->where('device_id', $id);
         
        $res = $this->db->get()->result();  
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_meters_name() {
        $this->db->select('');
        $this->db->from('hardware');     
        $this->db->where('UtilityName','Water Monitor'); 
		$this->db->where('client_id',26); 
		//$this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit; SELECT * FROM `hardware_station_consumption_data_mumbai` WHERE `UtilityName`='Water Monitor' GROUP BY `LocationName`
		// echo $this->db->last_query();exit;
        return $res;
    }

	
	function getReadingTime(){
		$query="SELECT `from_reading`,`to_reading` FROM `water_meter_management` LIMIT 1";
		$data = $this->db->query($query)->result_array();
		$from=$data[0]['from_reading'];
		$to=$data[0]['to_reading'];
		$ft=explode(":",$from);
		$tt=explode(":",$to);
		$ct=($ft[0]+$tt[0])/2;
		if(is_float($ct)){
			$time=floor($ct).":30:00";
		}else{
			$time=$ct.":00:00";
		}
		//print_r($time);die();
		
        return $time;
	}
	function get_hardwares_device_data_waterlevelmeter_report_mum_db(){
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$date_from = strtotime($yesterDay); 
		$date_to = strtotime($yesterDay); 
		$datesarray=array();
		$table_name='hardware_station_consumption_data_mumbai';
		
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
		{
		  array_push($datesarray, date("Y-m-d",$i1));  
		}
		$meter_list=$this->get_meters_name($table_name);
		
				for($t=0;$t<count($datesarray);$t++){
					foreach($meter_list as $meters){
						// if($meters['LocationName']=='Dom. Water Sump'){
						// 	$querywaterlevel="SELECT round(((`CurReading`/1000)*2.8),2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
						// 	$dashboardName="Domestic Sump";
						// }else if($meters['LocationName']=='Fire Water Sump'){
						// 	$querywaterlevel="SELECT round((`CurReading`/1000)*1.61,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
						// 	$dashboardName="Fire Sump";
						// }else{
						// 	$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
						// 	$dashboardName=$meters['LocationName'];
						// }
						
						$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['station_id']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
							$dashboardName=$meters['LocationName'];
						//echo $querywaterlevel;
						$datawaterlevel = $this->db->query($querywaterlevel)->result();
						$water_level_array=array(
							'utility_name'=>$meters['UtilityName'],
							'location_name'=>$meters['LocationName'],							
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'water_level_data'=>serialize($datawaterlevel),
							'meter_name'=>$dashboardName              
						);
						// echo json_encode($water_level_array);die();
						$this->db->insert('water_level_report_tbl_mumbai', $water_level_array);
						
					}
					
				}
						
		
	
	}
	function addWaterLevel(){
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$meter_list=$this->get_meters_name('hardware_station_consumption_data_mumbai');
		$time=$this->getReadingTime();
        $date="2023-07-21";
		$yesterDay ="2023-07-21";
		$date_from = strtotime($date); 
        $date_to = strtotime($yesterDay); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
//echo json_encode($datesarray);die();
      for ($m=0; $m < count($datesarray); $m++)
			{
				foreach($meter_list as $meters){
					$querywaterlevel="SELECT CurReading,TxnTime  FROM hardware_station_consumption_data_mumbai_24julyto5thOct2023 WHERE TxnDate='".$datesarray[$m]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";
					$data1 = $this->db->query($querywaterlevel)->result_array();
					$water_values_query=array(
						'location_name'=>$meters['LocationName'],
						'report_date'=>$datesarray[$m],
						'report_time'=>$time,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'water_level'=>$data1[0]['CurReading'],
						'utility_name'=>$meters['UtilityName'],
						'txn_time'=>$data1[0]['TxnTime']            
					);
					$this->db->insert('water_level_report_with_time_tbl', $water_values_query);
				}
			}

	}
	function chech_borewell_running($lineconnected,$utilityName,$datesarray,$LocationName){
		$this->db->select('*');
        $this->db->from('borewell_running_report_tbl');        
        
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('location_name',$LocationName);
		$this->db->where('report_date',$datesarray);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_borewell_report($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$LocationName=$data['LocationName'];
		$utilityName=$data['UtilityName'];
		$dashboardName=$data['dashboard_name'];
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		
		$table_name=$this->get_table_name($station_id);
		
		$check=$this->chech_borewell_running($lineconnected,$utilityName,$yesterDay,$LocationName);
		if(count($check)==1){
			echo $LocationName.":Borewell data already inserted</br>";
		}else{		
			$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
			//echo json_encode($queryconsutoday);die();
			$dataruntoday = $this->db->query($queryconsutoday)->result_array();			
			$today_percent15=$dataruntoday[0]['secs']*0.15;
			$borewell_runn_query=array(
				'utility_name'=>$utilityName,
				'line_connected'=>$lineconnected,
				'location_name'=>$LocationName,
				'report_date'=>$yesterDay,
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'running_min1'=>$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15)),
				'running_min2'=>round(($dataruntoday[0]['secs']-$today_percent15)/60)              
			);
			// echo json_encode($borewell_runn_query);die();
			$this->db->insert('borewell_running_report_tbl', $borewell_runn_query);					
		
	}
				
			

	}
	function check_water_level_data($utilityName,$location_name,$date){
		$this->db->select('*');
        $this->db->from('water_level_report_tbl');        
		$this->db->where('location_name',$location_name);
		$this->db->where('utility_name',$utilityName);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_waterlevelmeter_report($data){
		// echo "jj";die();
		$station_id=$data['station_id'];	
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];		
		$dashboardName=$data['dashboard_name'];
		$table_name=$this->get_table_name($station_id);
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$check=$this->check_water_level_data($utilityName,$locationName,$yesterDay);
		if(count($check)==1){
			echo $locationName.":Water Level Data already inserted</br>";
			
		}else{
			
				$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
				//echo $querywaterlevel;die();
				$datawaterlevel = $this->db->query($querywaterlevel)->result();
				
				$water_level_array=array(
					'utility_name'=>$utilityName,
					'location_name'=>$locationName,							
					'report_date'=>$yesterDay,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'water_level_data'=>serialize($datawaterlevel),
					'meter_name'=>$dashboardName              
				);
				// echo json_encode($water_level_array);die();
				$this->db->insert('water_level_report_tbl', $water_level_array);
				
			
		}

	}
	function check_firepump_running($lineconnected,$utilityName,$datesarray,$pump_name,$serial_no){
		$this->db->select('*');
        $this->db->from('firepump_running_report_tbl');        
        
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('pump_name',$pump_name);
		$this->db->where('meter_serial',$serial_no);
		$this->db->where('report_date',$datesarray);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		// echo "ll:".$this->db->last_query();die();       
        return $res;
	}
function get_hardwares_device_data_firepump_report($data){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		//echo $table_name;die();
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$meterserial=$data['UomName'];
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		
		if($meterserial=='71'){
			$firepumpList[0]['fire_pump_name']='Jockey Pump';
			$firepumpList[1]['fire_pump_name']='Main Pump';
			$firepumpList[2]['fire_pump_name']='Diesel Engine Driven Pump';
			$resdata['meter']=$dashboardName;
		
		foreach($firepumpList as $list){
			if($list['fire_pump_name']=='Jockey Pump'){
			$check=$this->check_firepump_running('J_Pump Auto RHT','Old Fire Pump',$yesterDay,$list['fire_pump_name'],'0071');
			if(count($check)==1){
				echo "Jockey Pump Data Inserted</br>";
			}else{				
				$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";

				$datarun_today = $this->db->query($runn_today)->result_array();								$firepump_runn_array=array(
					'utility_name'=>'Old Fire Pump',
					'line_connected'=>'J_Pump Auto RHT',
					'pump_name'=>$list['fire_pump_name'],
					'report_date'=>$yesterDay,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
					'running_min2'=>(int)$datarun_today[0]['run'],
					'meter_serial'=> '0071'              
				);
				$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);			
				
			}
				
			}else if($list['fire_pump_name']=='Main Pump'){
				$check=$this->check_firepump_running('Auto Mode RHT','Old Fire Pump',$yesterDay,$list['fire_pump_name'],'0071');
			if(count($check)==1){
				echo "Main Pump Data Inserted</br>";
			}else{										
				$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
				//echo $pressure;die();
				$datarun_today = $this->db->query($runn_today)->result_array();
				
				$firepump_runn_array=array(
					'utility_name'=>'Old Fire Pump',
					'line_connected'=>'Auto Mode RHT',
					'pump_name'=>$list['fire_pump_name'],
					'report_date'=>$yesterDay,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
					'running_min2'=>(int)$datarun_today[0]['run'],
					'meter_serial'=> '0071'              
				);
				$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
				
			}
				
			}else{
			$check=$this->check_firepump_running('DG On RHT','Old Fire Pump',$yesterDay,$list['fire_pump_name'],'0071');
			if(count($check)==1){
				echo "DG Pump Data Inserted</br>";
			}else{
				
					$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
			
					$datarun_today = $this->db->query($runn_today)->result_array();
					

					$firepump_runn_array=array(
						'utility_name'=>'Old Fire Pump',
						'line_connected'=>'DG On RHT',
						'pump_name'=>$list['fire_pump_name'],
						'report_date'=>$yesterDay,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
						'running_min2'=>(int)$datarun_today[0]['run'],
						'meter_serial'=> '0071'              
					);
					$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
				
			}
				
			}
			
	    }

		$this->getDgData2($table_name,$yesterDay);
		$resdata['fire_pressure']=$this->getfirePressureData1($table_name,$yesterDay,$station_id);
		$resdata['fire_fuel_level']=$this->getfireFuelLevel_1($table_name,$yesterDay,$station_id);
					
					
			
		}else{
			$resdata['meter']=$dashboardName;
			$firepumpList2[0]['UtilityName']='Jockey Pump';
			$firepumpList2[1]['UtilityName']='Diesel Engine Driven Pump';
			$this->getDgData($table_name,$yesterDay);

			$resdata['fire_pressure']=$this->getfirePressureData($table_name,$yesterDay,$station_id);
			$resdata['fire_fuel_level']=$this->getfireFuelLevel_2($table_name,$yesterDay,$station_id);
			

		}
		
    //   echo json_encode($resdata);die();
		return $resdata;
	}
	function getfireFuelLevel_2($table_name,$yesterDay,$station_id){
	
		
			$check=$this->chech_firepump_fuel_level('Fuel Level','New Fire Pump',$yesterDay,'Fire Pump House','0069');
			//echo json_encode($check[0]['fuel_level_data']);die();
			if(count($check)==1){
				
				echo "Firepump Phase2 Fuel level already inserted</br>";
			}else{
				
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$yesterDay."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					
					$fuel_level_array=array(
						'utility_name'=>'New Fire Pump',
						'line_connected'=>'Fuel Level',
						'location_name'=>'Fire Pump House',
						'report_date'=>$yesterDay,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'fuel_level_data'=>serialize($fuelleveldata),
						'meter_serial'=>'0069'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_fuel_level_report_tbl', $fuel_level_array);
				
				
			}
	
	}
	function getfirePressureData($table_name,$yesterDay,$station_id){
	
			$check=$this->chech_firepump_pressure('Pressure','New Fire Pump',$yesterDay,'Fire Pump House','0069');
			if(count($check)==1){
				echo "Firepump phase2 Pressure data already inserted</br>";
			}else{
				
					$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate = '".$yesterDay."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					
					$pressure_array=array(
						'utility_name'=>'New Fire Pump',
						'line_connected'=>'Pressure',
						'location_name'=>'Fire Pump House',
						'report_date'=>$yesterDay,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'pressure_data'=>serialize($pressuredata),
						'meter_serial'=>'0069'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_pressure_report_tbl', $pressure_array);
				
				
			}
			
		
	}
	function getDgData($table_name,$date){
		$check=$this->check_firepump_dg_running('Fuel Level','New Fire Pump',$date,'Diesel Engine','0069');
		if(count($check)==1){
			echo "Firepump Phase 2 DG Data Inserted</br>";
		}else{
			
				$startEndFuelQuery="SELECT 
				(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND LineConnected='Fuel Level' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime LIMIT 1) as 'start',
				(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND UtilityName='New Fire Pump' AND LineConnected='Fuel Level' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
				// echo $startEndFuelQuery;die();
			
				$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result_array();
				//echo json_encode($dataStartEndFuel[0]->start);die();
				if(is_null($dataStartEndFuel[0]['start'])){
					
					$resdata['run']="0";
					$resdata['date']=$date;
					$resdata['fadd']="0";
					$resdata['fremove']="0";
					$resdata['name']="DG";
					$resdata['fconsume']="0";
					$resdata['economy']="0";
					$resdata['availableFuel']="000";
					$resdata['fuel_percent']="0";
		
				}else{
					$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0069'";
					$dataRunn = $this->db->query($queryRunn)->result_array();
					$resdata['run']=$dataRunn[0]['run'];
					
					$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Fuel Filled' and MeterSerial='0069'";
					
					$dataAdd = $this->db->query($queryFadd)->result_array();
					$resdata['fadd']=$dataAdd[0]['fadd'];
				
				
					$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='New Fire Pump' and MeterSerial='0069' AND TxnDate='".$date."' AND LineConnected='Fuel Level'";
					//echo $queryRuntimes;die();
					$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
				
					$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0069'  AND Consumption>0";
					
				
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
					$resdata['fconsume1']=round($dataStartEndFuel[0]['start']+$resdata['fadd']-$dataStartEndFuel[0]['end']-$resdata['fremove'],2);
					if($resdata['fconsume1'] <= 0 || $dataRunn[0]['run']==0){
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
					
					$resdata['economy']=$finaleco;
					$resdata['name']="DG";
					$resdata['date']=$date;
					$resdata['availableFuel']=$dataStartEndFuel[0]['end'];
					$resdata['fuel_percent']="0";
					
				}
						$firepump_dg_runn_array=array(
						'utility_name'=>'New Fire Pump',
						'line_connected'=>'Fuel Level',
						'meter_serial'=>'0069',
						'report_date'=>$date,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'running_min1'=>0,
						// 'running_min1'=>$this->secondsToTime($resdata['run']),
						'running_min2'=>$resdata['run'],
						'fuel_add'=>$resdata['fadd'],
						'fuel_remove'=>$resdata['fremove'] ,
						'fuel_consume'=>$resdata['fconsume'],
						'economy'=>$resdata['economy'],
						'available_fuel'=>$resdata['availableFuel'],
						'filled_percent'=>$resdata['fuel_percent'],
						'dg_name'=>'Diesel Engine'              
					);
					$this->db->insert('firepump_dg_running_report_tbl', $firepump_dg_runn_array);
			

		}
		
		
	
		
		return $resdata;
	}
	function chech_firepump_fuel_level($lineconnected,$utilityName,$date,$location_name,$serial_no){
		$this->db->select('*');
        $this->db->from('firepump_fuel_level_report_tbl');
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		$this->db->where('meter_serial',$serial_no);       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function getfireFuelLevel_1($table_name,$yesterDay,$station_id){
		
			$check=$this->chech_firepump_fuel_level('Fuel Level','Old Fire Pump',$yesterDay,'Fire Pump House','0068');
			//echo json_encode($check[0]['fuel_level_data']);die();
			if(count($check)==1){
				
				echo "Phase 1 Fuel level already inserted</br>";
			}else{				
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$yesterDay."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					
					$fuel_level_array=array(
						'utility_name'=>'Old Fire Pump',
						'line_connected'=>'Fuel Level',
						'location_name'=>'Fire Pump House',
						'report_date'=>$yesterDay,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'fuel_level_data'=>serialize($fuelleveldata),
						'meter_serial'=>'0068'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_fuel_level_report_tbl', $fuel_level_array);
				
				
			}
	
	}
function chech_firepump_pressure($lineconnected,$utilityName,$date,$location_name,$serial_no){
		$this->db->select('*');
        $this->db->from('firepump_pressure_report_tbl');
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		$this->db->where('meter_serial',$serial_no);       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}	
function getfirePressureData1($table_name,$yesterDay,$station_id){

	$check=$this->chech_firepump_pressure('Pressure','Old Fire Pump',$yesterDay,'Fire Pump House','0068');
	if(count($check)==1){
		echo "Firepump Phase 1 Pressure already inserted</br>";
	}else{				
		$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate = '".$yesterDay."'   ORDER BY TxnDate ASC,TxnTime ASC ";
		
		$pressuredata = $this->db->query($pressure)->result();
		
		$pressure_array=array(
			'utility_name'=>'Old Fire Pump',
			'line_connected'=>'Pressure',
			'location_name'=>'Fire Pump House',
			'report_date'=>$yesterDay,
			'created_date'=>date('Y-m-d H:i:s'),
			'updated_date'=>date('Y-m-d H:i:s'),
			'pressure_data'=>serialize($pressuredata),
			'meter_serial'=>'0068'              
		);
		//echo json_encode($pressure_array);die();
		$this->db->insert('firepump_pressure_report_tbl', $pressure_array);	
		
	}		
}
function check_firepump_dg_running($lineconnected,$utilityName,$date,$dg_name,$serial_no){
		$this->db->select('*');
        $this->db->from('firepump_dg_running_report_tbl');
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('dg_name',$dg_name);
		$this->db->where('report_date',$date);
		$this->db->where('meter_serial',$serial_no);       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
		
	}
function getDgData2($table_name,$date){
		$check=$this->check_firepump_dg_running('Fuel Level','Old Fire Pump',$date,'Diesel Engine','0068');
		if(count($check)==1){
			echo "Firepump Phase 1 DG Data Already inserted</br>";
		}else{	
		$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND LineConnected='Fuel Level' AND UtilityName='Old Fire Pump' and MeterSerial='0068' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND UtilityName='Old Fire Pump' AND LineConnected='Fuel Level' and MeterSerial='0068' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		// echo $startEndFuelQuery;die();
	
		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result_array();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		if(is_null($dataStartEndFuel[0]['start'])){
			
			$resdata['run']="0";
			$resdata['date']=$date;
			$resdata['fadd']="0";
			$resdata['fremove']="0";
			$resdata['name']="DG";
			$resdata['fconsume']="0";
			$resdata['economy']="0";
			$resdata['availableFuel']="000";
			$resdata['fuel_percent']="0";

		}else{
			$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='Old Fire Pump' AND TxnDate='".$date."' AND LineConnected='Diesel Pump RHT' and MeterSerial='0068'";
			$dataRunn = $this->db->query($queryRunn)->result_array();
			$resdata['run']=$dataRunn[0]['run'];
			
			$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='Old Fire Pump' AND TxnDate='".$date."' AND LineConnected='Fuel Filled' and MeterSerial='0068'";
			
			$dataAdd = $this->db->query($queryFadd)->result_array();
			$resdata['fadd']=$dataAdd[0]['fadd'];
		
		
			$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='Old Fire Pump' and MeterSerial='0068' AND TxnDate='".$date."' AND LineConnected='Fuel Level'";
			//echo $queryRuntimes;die();
			$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
		
			$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='Old Fire Pump' AND TxnDate='".$date."' AND LineConnected='Diesel Pump RHT' and MeterSerial='0068'  AND Consumption>0";
			
		
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
			$resdata['fconsume1']=round($dataStartEndFuel[0]['start']+$resdata['fadd']-$dataStartEndFuel[0]['end']-$resdata['fremove'],2);
			if($resdata['fconsume1'] <= 0 || $dataRunn[0]['run']==0){
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
			
			$resdata['economy']=$finaleco;
			$resdata['name']="DG";
			$resdata['date']=$date;
			$resdata['availableFuel']=$dataStartEndFuel[0]['end'];
			$resdata['fuel_percent']="0";
			
		}
				$firepump_dg_runn_array=array(
				'utility_name'=>'Old Fire Pump',
				'line_connected'=>'Fuel Level',
				'meter_serial'=>'0068',
				'report_date'=>$date,
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'running_min1'=>$this->secondsToTime($resdata['run']),
				'running_min2'=>$resdata['run'],
				'fuel_add'=>$resdata['fadd'],
				'fuel_remove'=>$resdata['fremove'] ,
				'fuel_consume'=>$resdata['fconsume'],
				'economy'=>$resdata['economy'],
				'available_fuel'=>$resdata['availableFuel'],
				'filled_percent'=>$resdata['fuel_percent'],
				'dg_name'=>'Diesel Engine'              
			);
			$this->db->insert('firepump_dg_running_report_tbl', $firepump_dg_runn_array);
			

		}
		
		
	}
	function chech_hydro_running($pump_name,$date,$serial_no){
		$this->db->select('*');
        $this->db->from('hydro_running_report_tbl');
		$this->db->where('pump_name',$pump_name);		
		$this->db->where('report_date',$date);
		$this->db->where('meter_serial',$serial_no);       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_hydro_report($data){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$dashboardName=$data['dashboard_name'];
		
		$utilityName=$data['UtilityName'];	
		
		$resdata['meter']=$dashboardName;	
		$firepumpList2[0]['UtilityName']='Motor-1';
		$firepumpList2[1]['UtilityName']='Motor-2';
		
		foreach($firepumpList2 as $list){
			
				$check=$this->chech_hydro_running($list['UtilityName'],$yesterDay,'0061'); 
				if(count($check)==1){
					echo $list['UtilityName'].":Hydro Motor Runn already inserted.</br>";
				}else{
					
						if($list['UtilityName']=='Motor-1'){
		
							$runconnect='Motor-1 RHT';
							
						}else if($list['UtilityName']=='Motor-2'){
							
							$runconnect='Motor-2 RHT';
							
						}
						
						$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' and MeterSerial='0061'  ";
						//echo $runnQuery;die();
						$datarun = $this->db->query($runnQuery)->result_array();
						
						$hydro_runn_query=array(
							'utility_name'=>$utilityName,
							'line_connected'=>$runconnect,
							'pump_name'=>$list['UtilityName'],
							'report_date'=>$yesterDay,
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'running_min1'=>$this->secondsToTime($datarun[0]['cons']*60),
							'running_min2'=>round($datarun[0]['cons']/60,2),
							'meter_serial'=>'0061'              
						);
						$this->db->insert('hydro_running_report_tbl', $hydro_runn_query);
					
				}
			}
						
			$resdata['pressure_data']=$this->gethydroPressureData($table_name,$yesterDay,$station_id);
			
	}
	function check_hydro_pressure($utilityName,$location_name,$date){
		$this->db->select('*');
        $this->db->from('hydro_pressure_report_tbl');
		$this->db->where('utility_name',$utilityName);  
		
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
	   
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function gethydroPressureData($table_name,$yesterDay,$station_id){	

			$check=$this->check_hydro_pressure('PressureMonitor','Hyd.Pneu.System',$yesterDay);
			if(count($check)==1){
				echo "Hudro Pressure already inserted</br>";
			}else{				
				$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate = '".$yesterDay."'   ORDER BY TxnDate ASC,TxnTime ASC ";
				//echo $pressure;
				$pressuredata = $this->db->query($pressure)->result();
				
				$pressure_array=array(
					'utility_name'=>'PressureMonitor',
					
					'location_name'=>'Hyd.Pneu.System',
					'report_date'=>$yesterDay,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'pressure_data'=>serialize($pressuredata),
					'meter_serial'=>'0000'              
				);
				//echo json_encode($pressure_array);die();
				$this->db->insert('hydro_pressure_report_tbl', $pressure_array);
				
				
			}
		
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
	function get_hardwares_device_data_flowmeter_report($data){
		
		$station_id=$data['station_id'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$LocationName=$data['LocationName'];
		$yesterDay = date('Y-m-d',strtotime("-1 days"));		
		$table_name=$this->get_table_name($station_id);		
		$check=$this->chech_water_consumption($lineconnected,$utilityName,$yesterDay,$LocationName);
		if(count($check)==1){
			echo $LocationName."Water Meter data already inserted</br>";
		}else{
			
			$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
			$datacontoday = $this->db->query($queryconsutoday)->result_array();
			

			$water_cons_query=array(
				'utility_name'=>$utilityName,
				'line_connected'=>$lineconnected,
				'location_name'=>$LocationName,
				'report_date'=>$yesterDay,
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'consumption'=>$datacontoday[0]['cons'],
				'multiplier'=>1              
			);
			$this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
			
			

		}
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
	function get_hardwares_device_data_dg_report($data){
		//echo "test";die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$yesterDay = date('Y-m-d',strtotime("-1 days")); 
       
		$table_name=$this->get_table_name($station_id);
       
		$check=$this->chech_dg_running($hardware_name,$yesterDay);
		if(count($check)==1){
			echo "DG Data already inserted.</br>";
			
		}else{
			$startEndFuelQuery="SELECT 
			(SELECT CurReading FROM $table_name WHERE TxnDate='".$yesterDay."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
			(SELECT CurReading FROM $table_name WHERE TxnDate='".$yesterDay."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
			// echo $startEndFuelQuery;die();
			$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		
			$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterDay."' AND LineConnected='DG_Running_Time'";
			$dataRunn = $this->db->query($queryRunn)->result();
			$resdata['consolidate'][0]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
			$resdata['consolidate'][0]['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
			$resdata['consolidate'][0]['run1']=(int)$dataRunn[0]->run;
			
			$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterDay."' AND LineConnected='Fuel Filled'";
			
			$dataAdd = $this->db->query($queryFadd)->result();
			$resdata['consolidate'][0]['fadd']=(float)$dataAdd[0]->fadd;


			$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterDay."' AND LineConnected='Fuel Level'";
			//echo $queryRuntimes;die();
			$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

			$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterDay."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
			

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

				$resdata['consolidate'][0]['fremove']=$fremove;
				$resdata['consolidate'][0]['fconsume1']=round($dataStartEndFuel[0]->start+$resdata['consolidate'][0]['fadd']-$dataStartEndFuel[0]->end-$resdata['consolidate'][0]['fremove'],2);
				//$resdata['consolidate'][$k]['krish']=$dataRunn[0]->run;
				if($resdata['consolidate'][0]['fconsume1'] <= 0 || $dataRunn[0]->run==0){
					$finaleco =0;
					$resdata['consolidate'][0]['fconsume']=0;
					//return 0;
				}
				else{
					$resdata['consolidate'][0]['fconsume']=$resdata['consolidate'][0]['fconsume1'];
					$rs = explode(":", $resdata['consolidate'][0]['run_c']);
					//print_r($rs);
					$hrs = $rs[0];
					$mins = $rs[1];
					$total_mins = ($hrs*60)+$mins;
					if($total_mins != 0){
						$eco = ($resdata['consolidate'][0]['fconsume']/$total_mins)*60;
					}
					else{
						$eco = 0;
					}
					//echo "<br>".$eco."<br>";
					$finaleco= round($eco,2);
					
				}
				
				$resdata['consolidate'][0]['economy']=$finaleco;
				$resdata['consolidate'][0]['availableFuel']=$dataStartEndFuel[0]->end;

				$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$yesterDay."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
				//echo $queryRuntimes;die();
				$dataVoltage = $this->db->query($queryVoltage)->result();

				$resdata['consolidate'][0]['voltage']=$dataVoltage[0]->Consumption;

				$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$yesterDay."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
				//echo $queryRuntimes;die();
				$dataStatus = $this->db->query($queryStatus)->result();
				if($dataStatus[0]->Consumption==1){
					$status="ON";
				}else{
					$status="OFF";
				}
				$resdata['consolidate'][0]['status']=$status;
				$resdata['consolidate'][0]['dgname']=$hardware_name;
				
				$dg_runn_query=array(
				'meter_serial'=>'',
				'running_min1'=>$resdata['consolidate'][0]['run'],
				'running_min2'=>$resdata['consolidate'][0]['run1'],
				'report_date'=>$yesterDay,
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'fuel_add'=>$resdata['consolidate'][0]['fadd'],
				'fuel_remove'=>$resdata['consolidate'][0]['fremove'],
				'fuel_consume'=> $resdata['consolidate'][0]['fconsume'],
				'economy'=>$resdata['consolidate'][0]['economy'] ,
				'available_fuel'=>$resdata['consolidate'][0]['availableFuel'],
				'filled_percent'=>'',
				'dg_name'=>$resdata['consolidate'][0]['dgname'],
				'voltage'=>$resdata['consolidate'][0]['voltage']
								
			);
			$this->db->insert('dg_running_report_tbl', $dg_runn_query);
			

		}
		
	   	$this->getDGFuelLevel($table_name,$yesterDay,$station_id,$hardware_name);
		
		
	}
	function chech_dg_fuel_level($lineconnected,$utilityName,$date,$serial_no){
		$this->db->select('*');
        $this->db->from('dg_fuel_level_report_tbl');
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('line_connected',$lineconnected);
		$this->db->where('report_date',$date);
		$this->db->where('meter_serial',$serial_no);       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function getDGFuelLevel($table_name,$yesterDay,$station_id,$utilityName){


		$check=$this->chech_dg_fuel_level('Fuel Level',$utilityName,$yesterDay,'0051');
		//echo json_encode($check[0]['fuel_level_data']);die();
		if(count($check)==1){
			echo "DG Fuel data already inserted.</br>";
		}else{
		
			$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='".$utilityName."' and MeterSerial='0051' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$yesterDay."'   ORDER BY TxnDate ASC,TxnTime ASC ";
			//echo $fuellevel_query;die();
			$fuelleveldata = $this->db->query($fuellevel_query)->result();
			
			$fuel_level_array=array(
				'utility_name'=>$utilityName,
				'line_connected'=>'Fuel Level',
				'report_date'=>$yesterDay,
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'fuel_level_data'=>serialize($fuelleveldata),
				'meter_serial'=>'0051'              
			);
			//echo json_encode($pressure_array);die();
			$this->db->insert('dg_fuel_level_report_tbl', $fuel_level_array);
			
			
		}
		
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
	function get_hardwares_device_data_energymeter_report($data){
		$station_id=$data['station_id'];
		$yesterDay = date('Y-m-d',strtotime("-1 days"));  
      
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_energymeter_list($table_name);
		$i=0;
		foreach($meter_list as $meters){
			
			
				$check=$this->chech_energy_consumotion($meters['LocationName'],$yesterDay);
				if(count($check)==1){
					echo $meters['LocationName']."Energy Data already inserted.</br>";
				}else{
					
					if($meters['LocationName']=="AFS project-C"){ 
						$loc="Container office";
					}else if($meters['LocationName']=="B4 Building"){
						$loc="A4 Building";
					}else if($meters['LocationName']=="Mains"){
						$loc="Main I/C (EB)";
					}else if($meters['LocationName']=="Fire Fighting"){
						$loc="Fire pump panel";
					}else if($meters['LocationName']=="LDB Pump"){
						$loc="LDB (Pump room)";
					}else if($meters['LocationName']=='PDB pump'){
						$loc='PDB Panel';
					}else if($meters['LocationName']=="LDB Street"){
						$loc="LDB (Street light panel)";
					}else{
						$loc=$meters['LocationName'];
					}
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$yesterDay."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					
					$datacontoday = $this->db->query($queryconsutoday)->result();
				
					$energy_cons_query=array(
						'location_name'=>$meters['LocationName'],
						'meter_serial'=>'',
						'report_date'=>$yesterDay,
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>(float)$datacontoday[0]->cons,
						'meter_name'=>$loc              
					);
					$this->db->insert('energy_consumption_report_tbl', $energy_cons_query);
					

				}
					
		}
		
    
	}
	function check_current_data($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}	
	function get_hardwares_device_data_energymeter_current_report($data){
		$station_id=$data['station_id'];
		$yesterDay = date('Y-m-d',strtotime("-1 days")); 
		$table_name=$this->get_table_name($station_id);
		
       
		$meter_list=$this->get_energymeter_list($table_name);
		
		foreach($meter_list as $meters){
		
		
			if($meters['LocationName']=="AFS project-C"){ 
				$loc="Container office";
			}else if($meters['LocationName']=="B4 Building"){
				$loc="A4 Building";
			}else if($meters['LocationName']=="Mains"){
				$loc="Main I/C (EB)";
			}else if($meters['LocationName']=="Fire Fighting"){
				$loc="Fire pump panel";
			}else if($meters['LocationName']=="LDB Pump"){
				$loc="LDB (Pump room)";
			}else if($meters['LocationName']=='PDB pump'){
				$loc='PDB Panel';
			}else if($meters['LocationName']=="LDB Street"){
				$loc="LDB (Street light panel)";
			}else{
				$loc=$meters['LocationName'];
			}
			
		
			$check=$this->check_current_data('current',$meters['LocationName'],$yesterDay);
			if(count($check)==1){
			echo $meters['LocationName'].":Current Data already inserted.</br>";
			}else{
				
				$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

				$c1 = $this->db->query($querycurrent1)->result();
			

				$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
				$c2 = $this->db->query($querycurrent2)->result();
				

				$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
				$c3 = $this->db->query($querycurrent3)->result();
			
				$current_array=array(
					'location_name'=>$meters['LocationName'],
					'meter_serial'=>'',
					'report_date'=>$yesterDay,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'c1_data'=>serialize($c1),
					'c2_data'=>serialize($c2),
					'c3_data'=>serialize($c3),
					'meter_name'=>$loc              
				);
				//echo json_encode($pressure_array);die();
				$this->db->insert('current_report_tbl', $current_array);
				
			}
			
			
		}
		
	}
	function addVegasCons1(){
		$vegas=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Capacitor Main Panel","Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","CT Fan_1","CT Fan-II","TFA","A Wing Gr FL Hvac","A Wing 2nd FL Hvac","A Wing 3rd FL Hvac","B Wing Gr FL Hvac","B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac","Light&Power Wing_A","Light&Power Wing_B","WTP");
		
			for ($i=0; $i < count($vegas); $i++) {
				$todayDate= date('Y-m-d',strtotime("-1 days"));;
				$enquery="SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_vegaschool WHERE `UtilityName`='".$vegas[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$cons_array=array(
					'location_name'=>$vegas[$i],
					'meter_serial'=>'',							
					'report_date'=>$todayDate,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'consumption'=>$today_cons,
					'running_min2'=>'',
					'meter_name'=>$vegas[$i]              
				);
				// echo json_encode($cons_array);die();
				$this->db->insert('energy_consumption_report_tbl_vegas', $cons_array);
			}
		
		
		
		// echo json_encode($water_level_array);die();
		
	}
	function addVegasCons(){
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$vegas=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Capacitor Main Panel","Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","CT Fan_1","CT Fan-II","TFA","A Wing Gr FL Hvac","A Wing 2nd FL Hvac","A Wing 3rd FL Hvac","B Wing Gr FL Hvac","B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac","Light&Power Wing_A","Light&Power Wing_B","WTP");
		$date_from = strtotime($yesterDay); 
        $date_to = strtotime($yesterDay); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++) { 
			for ($i=0; $i < count($vegas); $i++) {
				$todayDate=$datesarray[$k];
				$enquery="SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_vegaschool WHERE `UtilityName`='".$vegas[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$cons_array=array(
					'location_name'=>$vegas[$i],
					'meter_serial'=>'',							
					'report_date'=>$todayDate,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'consumption'=>$today_cons,
					'running_min2'=>'',
					'meter_name'=>$vegas[$i]              
				);
				// echo json_encode($cons_array);die();
				$this->db->insert('energy_consumption_report_tbl_vegas', $cons_array);
			}
		}
		
		
		// echo json_encode($water_level_array);die();
		
	}
	function check_voltage_data($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('voltage_report_tbl');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_voltage_report($data){
		$station_id=$data['station_id'];
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_energymeter_list($table_name);
		
		foreach($meter_list as $meters){
		
			if($meters['LocationName']=="AFS project-C"){ 
				$loc="Container office";
			}else if($meters['LocationName']=="B4 Building"){
				$loc="A4 Building";
			}else if($meters['LocationName']=="Mains"){
				$loc="Main I/C (EB)";
			}else if($meters['LocationName']=="Fire Fighting"){
				$loc="Fire pump panel";
			}else if($meters['LocationName']=="LDB Pump"){
				$loc="LDB (Pump room)";
			}else if($meters['LocationName']=='PDB pump'){
				$loc='PDB Panel';
			}else if($meters['LocationName']=="LDB Street"){
				$loc="LDB (Street light panel)";
			}else{
				$loc=$meters['LocationName'];
			}
			

				$check=$this->check_voltage_data('voltage',$meters['LocationName'],$yesterDay);
				if(count($check)==1){
					echo $meters['LocationName'].":Vltage Data already inserted.</br>";
				}else{
					
						$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v1 = $this->db->query($queryvolt1)->result();
						
						$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v2 = $this->db->query($queryvolt2)->result();
						
						$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v3 = $this->db->query($queryvolt3)->result();
						
						$voltage_array=array(
							'location_name'=>$meters['LocationName'],
							'meter_serial'=>'',
							'report_date'=>$yesterDay,
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'v1_data'=>serialize($v1),
							'v2_data'=>serialize($v2),
							'v3_data'=>serialize($v3),
							'meter_name'=>$loc              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('voltage_report_tbl', $voltage_array);
					
				}
			
		}
	
	}
	function chech_pf_data($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('pf_report_tbl');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_power_factor_report($data){
		$station_id=$data['station_id'];
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_energymeter_list($table_name);
		foreach($meter_list as $meters){
		
			if($meters['LocationName']=="AFS project-C"){ 
				$loc="Container office";
			}else if($meters['LocationName']=="B4 Building"){
				$loc="A4 Building";
			}else if($meters['LocationName']=="Mains"){
				$loc="Main I/C (EB)";
			}else if($meters['LocationName']=="Fire Fighting"){
				$loc="Fire pump panel";
			}else if($meters['LocationName']=="LDB Pump"){
				$loc="LDB (Pump room)";
			}else if($meters['LocationName']=='PDB pump'){
				$loc='PDB Panel';
			}else if($meters['LocationName']=="LDB Street"){
				$loc="LDB (Street light panel)";
			}else{
				$loc=$meters['LocationName'];
			}
			
		
				$check=$this->chech_pf_data('PF',$meters['LocationName'],$yesterDay);
				if(count($check)==1){
					echo $meters['LocationName'].":PF Data already inserted.</br>";
				}else{
					
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$yesterDay."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						
						$pf_array=array(
							'location_name'=>$meters['LocationName'],
							'meter_serial'=>'',
							'report_date'=>$yesterDay,
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'pf_data'=>serialize($pf),
							'meter_name'=>$loc              
						);
						 //echo json_encode($pf_array);die();
						$this->db->insert('pf_report_tbl', $pf_array);
					
				}
			
			
		}
		

	}
	function get_hardwares_device_data_waterlevel_report_oberoi($station_id,$fromdate,$todate){
		
		
		$date_from = strtotime($fromdate); 
		$date_to = strtotime($todate); 
		$datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
		{
		  array_push($datesarray, date("Y-m-d",$i1));  
		}
		
		$meter_list=$this->get_meters_name($table_name);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_water_level_oberoi($meter_list[$i]['LocationName'],$datesarray[$k]);
			if(count($check)==1){
				
			}else{
				if($meter_list[$i]['LocationName']=='Dom. Water Sump'){
					//less 10 % from value
					$querywaterlevel="SELECT IF(CurReading*".$meter_list[$i]['multiplier']."/1000>200, round(CurReading*".$meter_list[$i]['multiplier']."/1000-CurReading*0.05*".$meter_list[$i]['multiplier']."/1000,2), round(CurReading*".$meter_list[$i]['multiplier']."/1000-CurReading*0.25*".$meter_list[$i]['multiplier']."/1000,2)) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$k]."' AND `StationId`='".$meter_list[$i]['station_id']."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `LocationName`='".$meter_list[$i]['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";

					
					//SELECT round(CurReading*3.03/1000,2) as level,IF(CurReading*3.03/1000>200, round(CurReading*3.03/1000-CurReading*0.05*3.03/1000,2), round(CurReading*3.03/1000-CurReading*0.25*3.03/1000,2)) as level1,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai_feb13ToAug1_2925 WHERE TxnDate = '2025-07-23' AND `StationId`='2021000076' AND `UtilityName`='Water Monitor' AND `LocationName`='Dom. Water Sump' ORDER BY TxnDate ASC,TxnTime ASC;

					// $querywaterlevel="SELECT round(CurReading*".$meter_list[$i]['multiplier']."/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai_feb13ToAug1_2925 WHERE TxnDate = '".$datesarray[$k]."' AND `StationId`='".$meter_list[$i]['station_id']."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `LocationName`='".$meter_list[$i]['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
// echo $querywaterlevel;die();
				}else{
					$querywaterlevel="SELECT round(CurReading*".$meter_list[$i]['multiplier']."/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$k]."' AND `StationId`='".$meter_list[$i]['station_id']."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `LocationName`='".$meter_list[$i]['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
				}
					
					
					
					// echo $querywaterlevel;die();
					$datawaterlevel = $this->db->query($querywaterlevel)->result();
					$dashboardName=$meter_list[$i]['LocationName'];
	
					$water_level_array=array(
								'utility_name'=>$meter_list[$i]['UtilityName'],
								'location_name'=>$meter_list[$i]['LocationName'],							
								'report_date'=>$datesarray[$k],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'water_level_data'=>serialize($datawaterlevel),
								'meter_name'=>$dashboardName              
							);
							// echo json_encode($water_level_array);die();
							$this->db->insert('water_level_report_tbl_mumbai', $water_level_array);
				
			}
					
					
				} 
		}
		
	
	
		
					
	
		return $resdata;
	}
	function chech_energy_consumotion_undp($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_undp');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();   energy_consumption_report_tbl_undp_single    
        return $res;
	}
	function chech_energy_consumotion_undp_single($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_undp_single');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();   energy_consumption_report_tbl_undp_single    
        return $res;
	}
	function chech_energy_consumotion_unicef($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_unicef');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_energy_consumotion_terotam($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_terotam');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_water_level_oberoi($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('water_level_report_tbl_mumbai');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_energy_consumotion_vegas($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_vegas');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_energymeter_list_station($table_name,$station_id,$date){
		// echo $table_name;die();
		$this->db->select('');
        $this->db->from('undp_devices');     
        $this->db->where('LineConnected','kWh');
		// $this->db->where('TxnDate',$date);
		$this->db->where('StationId',$station_id); 
		$this->db->group_by('UtilityName');
        $res = $this->db->get()->result_array(); 
		// echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_energymeter_vegas_devices(){
		// echo $table_name;die();
		$this->db->select('');
        $this->db->from('vegas_devices');     
        $this->db->where('LineConnected','kWh');
		$this->db->group_by('UtilityName');
        $res = $this->db->get()->result_array(); 
		// echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function chech_energy_consumotion_undp_hourly($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_undp_hourly');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_energy_consumotion_terotam_hourly($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_terotam_hourly');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_report_vegas($station_id,$fromdate,$todate){
		
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_vegas_devices();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_energy_consumotion_vegas($meter_list[$i]['UtilityName'],$datesarray[$k]);
			if(count($check)==1){
				$resdata['vegas'][$i][$k]['meter']=$check[0]['meter_name'];			   
				$resdata['vegas'][$i][$k]['consumption']=$check[0]['consumption'];

					$resdata['vegas'][$i][$k]['date']=$check[0]['report_date'];
					$resdata['vegas'][$i][$k]['from']='db';
			}else{
				
					$resdata['vegas'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					//echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result();
					$resdata['vegas'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

					$resdata['vegas'][$i][$k]['date']=$datesarray[$k];

					$energy_cons_query=array(
						'location_name'=>$meter_list[$i]['UtilityName'],
						'meter_serial'=>'',
						'report_date'=>$datesarray[$k],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>$resdata['vegas'][$i][$k]['consumption'],
						'meter_name'=>$meter_list[$i]['UtilityName']              
					);
					$this->db->insert('energy_consumption_report_tbl_vegas', $energy_cons_query);
				
			}
					
					
				} 
		}
		
	

		
					

		return $resdata;
	}
	function get_energymeter_list_unicef($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices_new'); 
		$this->db->where('StationId',$station_id); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_energymeter_list_unicef_old($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices'); 
		$this->db->where('StationId',$station_id); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_energymeter_list_terotam($station_id){
		
		$this->db->select('');
        $this->db->from('terotam_devices'); 
		$this->db->where('StationId',$station_id);
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_energymeter_list_undp_single($station_id){
		
		$this->db->select('');
        $this->db->from('undp_devices_single'); 
		$this->db->where('StationId',$station_id);
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_energymeter_list_cv_unicef($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices'); 
		$this->db->where('StationId',$station_id); 
		$this->db->where_in('ModelNo',array("EM6400NG","EM6436H"));
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_energymeter_list_undp(){
		
		$this->db->select('');
        $this->db->from('undp_devices1'); 
		//$this->db->where('StationId',$station_id); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_energymeter_list_cv_undp(){
		
		$this->db->select('');
        $this->db->from('undp_devices1'); 
		//$this->db->where('StationId',$station_id); 
		$this->db->where_in('ModelNo',array("EM6400NG","EM6436H","LG5310"));
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_water_meters($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices'); 
		$this->db->where('StationId',$station_id); 
		$this->db->where('UtilityName','Water Meter'); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_hardwares_device_data_energymeter_report_terotam_hourly($station_id,$fromdate,$todate){
		
		//echo $station_id;die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name(2025000133);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2025000133);
		
		
		
		for ($i=0; $i < count($meter_list); $i++) 
		{
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
							$check=$this->chech_energy_consumotion_terotam_hourly($meter_list[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								
							}else{
								
							
								for ($i1=0; $i1 < 24; $i1++) 
									{                     
									
									if($i1>9)
									{
										$from =  $i1.":00:00";
										$to =  ($i1+1).":00:00";     
									}
									else
									{
										$from =  "0".$i1.":00:00";
										$to =  "0".($i1+1).":00:00"; 
									}
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unicef'][$i][$k]['data']=$resdata1;
									$energy_cons_query=array(
										'location_name'=>$meter_list[$i]['UtilityName'],
										'meter_serial'=>'',
										'station_id'=>$meter_list[$i]['StationId'],
										'report_date'=>$datesarray[$k],
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'consumption'=>serialize($resdata1),
										'meter_name'=>$meter_list[$i]['DashboardName']              
								);
								$this->db->insert('energy_consumption_report_tbl_terotam_hourly', $energy_cons_query);
								}
					
				} 
		}
		
		return $resdata;
	}
	function chech_energy_consumotion_unicef_hourly($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_unicef_hourly');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		//  echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_report_unicef_hourly($station_id,$fromdate,$todate){
		
		// echo $station_id;die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name(2024000527);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		// echo json_encode($datesarray);die();
		$meter_list=$this->get_energymeter_list_unicef(2024000527);
		// echo json_encode($meter_list);die();
		
		
		for ($i=0; $i < count($meter_list); $i++) 
		{
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					// echo $datesarray[$k];die();
					
							$check=$this->chech_energy_consumotion_unicef_hourly($meter_list[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								
							}else{
								
							
								for ($i1=0; $i1 < 24; $i1++) 
									{                     
									
									if($i1>9)
									{
										$from =  $i1.":00:00";
										$to =  ($i1+1).":00:00";     
									}
									else
									{
										$from =  "0".$i1.":00:00";
										$to =  "0".($i1+1).":00:00"; 
									}
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unicef'][$i][$k]['data']=$resdata1;
									$energy_cons_query=array(
										'location_name'=>$meter_list[$i]['UtilityName'],
										'meter_serial'=>'',
										'station_id'=>$meter_list[$i]['StationId'],
										'report_date'=>$datesarray[$k],
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'consumption'=>serialize($resdata1),
										'meter_name'=>$meter_list[$i]['DashboardName']              
								);
								// echo json_encode($energy_cons_query);die();
								$this->db->insert('energy_consumption_report_tbl_unicef_hourly', $energy_cons_query);
								}
					
				} 
		}
		
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_undp_hourly($station_id,$fromdate,$todate){
		
		//echo $station_id;die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
	

		$meter_list=$this->get_energymeter_list_undp();
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) 
		{
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
							$check=$this->chech_energy_consumotion_undp_hourly($meter_list[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								
							}else{
								
							
								for ($i1=0; $i1 < 24; $i1++) 
									{                     
									
									if($i1>9)
									{
										$from =  $i1.":00:00";
										$to =  ($i1+1).":00:00";     
									}
									else
									{
										$from =  "0".$i1.":00:00";
										$to =  "0".($i1+1).":00:00"; 
									}
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unicef'][$i][$k]['data']=$resdata1;
									$energy_cons_query=array(
										'location_name'=>$meter_list[$i]['UtilityName'],
										'meter_serial'=>'',
										'station_id'=>$meter_list[$i]['StationId'],
										'report_date'=>$datesarray[$k],
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'consumption'=>serialize($resdata1),
										'meter_name'=>$meter_list[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}
					
				} 
		}
	

		
					

		//return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_undp_hourly_bkp($station_id,$fromdate,$todate,$table_name){
		
		//echo $station_id;die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		//$table_name="hardware_station_consumption_data_undp_bkpSep26ToJan21_2025";
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
	

		$meter_list_undp=$this->get_energymeter_list_station($table_name,2023000304,$datesarray[0]);
		// $meter_list_uncw=$this->get_energymeter_list_station($table_name,2023000303,$datesarray[0]);
		// $meter_list_unew=$this->get_energymeter_list_station($table_name,2023000300,$datesarray[0]);
		// $meter_list_unff=$this->get_energymeter_list_station($table_name,2023000302,$datesarray[0]);
		// $meter_list_unww=$this->get_energymeter_list_station($table_name,2023000301,$datesarray[0]);
		// $meter_list_unsg=$this->get_energymeter_list_station($table_name,2024000143,$datesarray[0]);
		// $meter_list_unab=$this->get_energymeter_list_station($table_name,2024000144,$datesarray[0]);
		
		
		
		for ($i=0; $i < count($meter_list_undp); $i++) 
		{
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_undp[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								
							}else{
								
							
								for ($i1=0; $i1 < 24; $i1++) 
									{                     
									
									if($i1>9)
									{
										$from =  $i1.":00:00";
										$to =  ($i1+1).":00:00";     
									}
									else
									{
										$from =  "0".$i1.":00:00";
										$to =  "0".($i1+1).":00:00"; 
									}
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['undp'][$i][$k]['data']=$resdata1;
									$energy_cons_query=array(
										'location_name'=>$meter_list_undp[$i]['UtilityName'],
										'meter_serial'=>'',
										'station_id'=>$meter_list_undp[$i]['StationId'],
										'report_date'=>$datesarray[$k],
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'consumption'=>serialize($resdata1),
										'meter_name'=>$meter_list_undp[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}
					
				} 
		}
		// for ($i=0; $i < count($meter_list_uncw); $i++) 
		// {
			
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
					
		// 					$check=$this->chech_energy_consumotion_undp_hourly($meter_list_uncw[$i]['UtilityName'],$datesarray[$k]);
		// 					// echo count($check);die();
		// 					if(count($check)==1){
								
		// 					}else{
								
							
		// 						for ($i1=0; $i1 < 24; $i1++) 
		// 							{                     
									
		// 							if($i1>9)
		// 							{
		// 								$from =  $i1.":00:00";
		// 								$to =  ($i1+1).":00:00";     
		// 							}
		// 							else
		// 							{
		// 								$from =  "0".$i1.":00:00";
		// 								$to =  "0".($i1+1).":00:00"; 
		// 							}
									
			
										
		// 								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
		// 								$datacontoday = $this->db->query($queryconsutoday)->result();
		// 								$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
		// 								$resdata1[$i1]['date']=$from." To ".$to;
									
											
		// 							}
		// 							$resdata['undp'][$i][$k]['data']=$resdata1;
		// 							$energy_cons_query=array(
		// 								'location_name'=>$meter_list_uncw[$i]['UtilityName'],
		// 								'meter_serial'=>'',
		// 								'station_id'=>$meter_list_uncw[$i]['StationId'],
		// 								'report_date'=>$datesarray[$k],
		// 								'created_date'=>date('Y-m-d H:i:s'),
		// 								'updated_date'=>date('Y-m-d H:i:s'),
		// 								'consumption'=>serialize($resdata1),
		// 								'meter_name'=>$meter_list_uncw[$i]['UtilityName']              
		// 						);
		// 						$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
		// 						}
					
		// 		} 
		// }
		// for ($i=0; $i < count($meter_list_unew); $i++) 
		// {
			
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
					
		// 					$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unew[$i]['UtilityName'],$datesarray[$k]);
		// 					// echo count($check);die();
		// 					if(count($check)==1){
								
		// 					}else{
								
							
		// 						for ($i1=0; $i1 < 24; $i1++) 
		// 							{                     
									
		// 							if($i1>9)
		// 							{
		// 								$from =  $i1.":00:00";
		// 								$to =  ($i1+1).":00:00";     
		// 							}
		// 							else
		// 							{
		// 								$from =  "0".$i1.":00:00";
		// 								$to =  "0".($i1+1).":00:00"; 
		// 							}
									
			
										
		// 								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
		// 								$datacontoday = $this->db->query($queryconsutoday)->result();
		// 								$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
		// 								$resdata1[$i1]['date']=$from." To ".$to;
									
											
		// 							}
		// 							$resdata['undp'][$i][$k]['data']=$resdata1;
		// 							$energy_cons_query=array(
		// 								'location_name'=>$meter_list_unew[$i]['UtilityName'],
		// 								'meter_serial'=>'',
		// 								'station_id'=>$meter_list_unew[$i]['StationId'],
		// 								'report_date'=>$datesarray[$k],
		// 								'created_date'=>date('Y-m-d H:i:s'),
		// 								'updated_date'=>date('Y-m-d H:i:s'),
		// 								'consumption'=>serialize($resdata1),
		// 								'meter_name'=>$meter_list_unew[$i]['UtilityName']              
		// 						);
		// 						$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
		// 						}
					
		// 		} 
		// }
		// for ($i=0; $i < count($meter_list_unff); $i++) 
		// {
			
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
					
		// 					$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unff[$i]['UtilityName'],$datesarray[$k]);
		// 					// echo count($check);die();
		// 					if(count($check)==1){
								
		// 					}else{
								
							
		// 						for ($i1=0; $i1 < 24; $i1++) 
		// 							{                     
									
		// 							if($i1>9)
		// 							{
		// 								$from =  $i1.":00:00";
		// 								$to =  ($i1+1).":00:00";     
		// 							}
		// 							else
		// 							{
		// 								$from =  "0".$i1.":00:00";
		// 								$to =  "0".($i1+1).":00:00"; 
		// 							}
									
			
										
		// 								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
		// 								$datacontoday = $this->db->query($queryconsutoday)->result();
		// 								$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
		// 								$resdata1[$i1]['date']=$from." To ".$to;
									
											
		// 							}
		// 							$resdata['undp'][$i][$k]['data']=$resdata1;
		// 							$energy_cons_query=array(
		// 								'location_name'=>$meter_list_unff[$i]['UtilityName'],
		// 								'meter_serial'=>'',
		// 								'station_id'=>$meter_list_unff[$i]['StationId'],
		// 								'report_date'=>$datesarray[$k],
		// 								'created_date'=>date('Y-m-d H:i:s'),
		// 								'updated_date'=>date('Y-m-d H:i:s'),
		// 								'consumption'=>serialize($resdata1),
		// 								'meter_name'=>$meter_list_unff[$i]['UtilityName']              
		// 						);
		// 						$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
		// 						}
					
		// 		} 
		// }
		// for ($i=0; $i < count($meter_list_unww); $i++) 
		// {
			
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
					
		// 					$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unww[$i]['UtilityName'],$datesarray[$k]);
		// 					// echo count($check);die();
		// 					if(count($check)==1){
								
		// 					}else{
								
							
		// 						for ($i1=0; $i1 < 24; $i1++) 
		// 							{                     
									
		// 							if($i1>9)
		// 							{
		// 								$from =  $i1.":00:00";
		// 								$to =  ($i1+1).":00:00";     
		// 							}
		// 							else
		// 							{
		// 								$from =  "0".$i1.":00:00";
		// 								$to =  "0".($i1+1).":00:00"; 
		// 							}
									
			
										
		// 								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
		// 								$datacontoday = $this->db->query($queryconsutoday)->result();
		// 								$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
		// 								$resdata1[$i1]['date']=$from." To ".$to;
									
											
		// 							}
		// 							$resdata['undp'][$i][$k]['data']=$resdata1;
		// 							$energy_cons_query=array(
		// 								'location_name'=>$meter_list_unww[$i]['UtilityName'],
		// 								'meter_serial'=>'',
		// 								'station_id'=>$meter_list_unww[$i]['StationId'],
		// 								'report_date'=>$datesarray[$k],
		// 								'created_date'=>date('Y-m-d H:i:s'),
		// 								'updated_date'=>date('Y-m-d H:i:s'),
		// 								'consumption'=>serialize($resdata1),
		// 								'meter_name'=>$meter_list_unww[$i]['UtilityName']              
		// 						);
		// 						$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
		// 						}
					
		// 		} 
		// }
		// for ($i=0; $i < count($meter_list_unsg); $i++) 
		// {
			
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
					
		// 					$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unsg[$i]['UtilityName'],$datesarray[$k]);
		// 					// echo count($check);die();
		// 					if(count($check)==1){
								
		// 					}else{
								
							
		// 						for ($i1=0; $i1 < 24; $i1++) 
		// 							{                     
									
		// 							if($i1>9)
		// 							{
		// 								$from =  $i1.":00:00";
		// 								$to =  ($i1+1).":00:00";     
		// 							}
		// 							else
		// 							{
		// 								$from =  "0".$i1.":00:00";
		// 								$to =  "0".($i1+1).":00:00"; 
		// 							}
									
			
										
		// 								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
		// 								$datacontoday = $this->db->query($queryconsutoday)->result();
		// 								$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
		// 								$resdata1[$i1]['date']=$from." To ".$to;
									
											
		// 							}
		// 							$resdata['undp'][$i][$k]['data']=$resdata1;
		// 							$energy_cons_query=array(
		// 								'location_name'=>$meter_list_unsg[$i]['UtilityName'],
		// 								'meter_serial'=>'',
		// 								'station_id'=>$meter_list_unsg[$i]['StationId'],
		// 								'report_date'=>$datesarray[$k],
		// 								'created_date'=>date('Y-m-d H:i:s'),
		// 								'updated_date'=>date('Y-m-d H:i:s'),
		// 								'consumption'=>serialize($resdata1),
		// 								'meter_name'=>$meter_list_unsg[$i]['UtilityName']              
		// 						);
		// 						$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
		// 						}
					
		// 		} 
		// }
		// for ($i=0; $i < count($meter_list_unab); $i++) 
		// {
			
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
					
		// 					$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unab[$i]['UtilityName'],$datesarray[$k]);
		// 					// echo count($check);die();
		// 					if(count($check)==1){
								
		// 					}else{
								
							
		// 						for ($i1=0; $i1 < 24; $i1++) 
		// 							{                     
									
		// 							if($i1>9)
		// 							{
		// 								$from =  $i1.":00:00";
		// 								$to =  ($i1+1).":00:00";     
		// 							}
		// 							else
		// 							{
		// 								$from =  "0".$i1.":00:00";
		// 								$to =  "0".($i1+1).":00:00"; 
		// 							}
									
			
										
		// 								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
		// 								$datacontoday = $this->db->query($queryconsutoday)->result();
		// 								$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
		// 								$resdata1[$i1]['date']=$from." To ".$to;
									
											
		// 							}
		// 							$resdata['undp'][$i][$k]['data']=$resdata1;
		// 							$energy_cons_query=array(
		// 								'location_name'=>$meter_list_unab[$i]['UtilityName'],
		// 								'meter_serial'=>'',
		// 								'station_id'=>$meter_list_unab[$i]['StationId'],
		// 								'report_date'=>$datesarray[$k],
		// 								'created_date'=>date('Y-m-d H:i:s'),
		// 								'updated_date'=>date('Y-m-d H:i:s'),
		// 								'consumption'=>serialize($resdata1),
		// 								'meter_name'=>$meter_list_unab[$i]['UtilityName']              
		// 						);
		// 						$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
		// 						}
					
		// 		} 
		// }
	

		
					

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_undp($station_id,$fromdate,$todate){
		
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_list_undp();
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_energy_consumotion_undp($meter_list[$i]['UtilityName'],$datesarray[$k]);
			if(count($check)>=1){
				
			}else{
				
					
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					//echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result();
					$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '09:30:00' AND '22:59:59'";
					
					$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '09:29:59' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '23:00:00' AND '24:00:00') t";
					// echo $nightquery;die();
					
					$dataday = $this->db->query($dayquery)->result();
					$datanight = $this->db->query($nightquery)->result();

					$energy_cons_query=array(
						'location_name'=>$meter_list[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list[$i]['StationId'],
						'report_date'=>$datesarray[$k],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>(float)$datacontoday[0]->cons,
						'day_consumption'=>(float)$dataday[0]->day_consumption,
						'night_consumption'=>(float)$datanight[0]->night_consumption,
						'meter_name'=>$meter_list[$i]['UtilityName']              
					);
					$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
				
			}
					
					
				} 
		}
	

		
					

		//return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_undp_bkp($station_id,$fromdate,$todate,$table_name){
		
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		//$table_name="hardware_station_consumption_data_undp_bkpSep26ToJan21_2025";
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list_undp=$this->get_energymeter_list_station($table_name,2023000304,$datesarray[0]);
		// $meter_list_uncw=$this->get_energymeter_list_station($table_name,2023000303,$datesarray[0]);
		// $meter_list_unew=$this->get_energymeter_list_station($table_name,2023000300,$datesarray[0]);
		//$meter_list_unff=$this->get_energymeter_list_station($table_name,2023000302,$datesarray[0]);
		// $meter_list_unww=$this->get_energymeter_list_station($table_name,2023000301,$datesarray[0]);
		//$meter_list_unsg=$this->get_energymeter_list_station($table_name,2024000143,$datesarray[0]);
		//$meter_list_unab=$this->get_energymeter_list_station($table_name,2024000144,$datesarray[0]);
		
		
		
		
	// 	for ($i=0; $i < count($meter_list_unff); $i++) {
					
	// 		for ($k=0; $k < count($datesarray); $k++)
	// 			{ 
	// 				$check=$this->chech_energy_consumotion_undp($meter_list_unff[$i]['UtilityName'],$datesarray[$k]);
	// 		if(count($check)==1){
	// 			$resdata['unff'][$i][$k]['meter']=$check[0]['meter_name'];
			
	// 			$resdata['unff'][$i][$k]['consumption']=$check[0]['consumption'];

	// 				$resdata['unff'][$i][$k]['date']=$check[0]['report_date'];
	// 				$resdata['unff'][$i][$k]['from']='db';
	// 		}else{
				
	// 				$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
	// 				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
	// 				//echo $queryconsutoday;die();
	// 				$datacontoday = $this->db->query($queryconsutoday)->result();
	// 				$resdata['unff'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

	// 				$resdata['unff'][$i][$k]['date']=$datesarray[$k];

	// 				$energy_cons_query=array(
	// 					'location_name'=>$meter_list_unff[$i]['UtilityName'],
	// 					'meter_serial'=>'',
	// 					'station_id'=>$meter_list_unff[$i]['StationId'],
	// 					'report_date'=>$datesarray[$k],
	// 					'created_date'=>date('Y-m-d H:i:s'),
	// 					'updated_date'=>date('Y-m-d H:i:s'),
	// 					'consumption'=>$resdata['unff'][$i][$k]['consumption'],
	// 					'meter_name'=>$meter_list_unff[$i]['UtilityName']              
	// 				);
	// 				$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
				
	// 		}
					
					
	// 			} 
	// }
		// for ($i=0; $i < count($meter_list_uncw); $i++) {
				
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
		// 			$check=$this->chech_energy_consumotion_undp($meter_list_uncw[$i]['UtilityName'],$datesarray[$k]);
		// 			if(count($check)==1){
		// 				$resdata['uncw'][$i][$k]['meter']=$check[0]['meter_name'];
					
		// 				$resdata['uncw'][$i][$k]['consumption']=$check[0]['consumption'];

		// 					$resdata['uncw'][$i][$k]['date']=$check[0]['report_date'];
		// 					$resdata['uncw'][$i][$k]['from']='db';
		// 			}else{
				
		// 			$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
		// 			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
		// 			//echo $queryconsutoday;die();
		// 			$datacontoday = $this->db->query($queryconsutoday)->result();
		// 			$resdata['uncw'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

		// 			$resdata['uncw'][$i][$k]['date']=$datesarray[$k];

		// 			$energy_cons_query=array(
		// 				'location_name'=>$meter_list_uncw[$i]['UtilityName'],
		// 				'meter_serial'=>'',
		// 				'station_id'=>$meter_list_uncw[$i]['StationId'],
		// 				'report_date'=>$datesarray[$k],
		// 				'created_date'=>date('Y-m-d H:i:s'),
		// 				'updated_date'=>date('Y-m-d H:i:s'),
		// 				'consumption'=>$resdata['uncw'][$i][$k]['consumption'],
		// 				'meter_name'=>$meter_list_uncw[$i]['UtilityName']              
		// 			);
		// 			$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
				
		// 				}
					
					
		// 		} 
		// }
	// 	for ($i=0; $i < count($meter_list_unew); $i++) {
					
	// 		for ($k=0; $k < count($datesarray); $k++)
	// 			{ 
	// 				$check=$this->chech_energy_consumotion_undp($meter_list_unew[$i]['UtilityName'],$datesarray[$k]);
	// 		if(count($check)==1){
	// 			$resdata['unew'][$i][$k]['meter']=$check[0]['meter_name'];
			
	// 			$resdata['unew'][$i][$k]['consumption']=$check[0]['consumption'];

	// 				$resdata['unew'][$i][$k]['date']=$check[0]['report_date'];
	// 				$resdata['unew'][$i][$k]['from']='db';
	// 		}else{
				
	// 				$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
	// 				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
	// 				//echo $queryconsutoday;die();
	// 				$datacontoday = $this->db->query($queryconsutoday)->result();
	// 				$resdata['unew'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

	// 				$resdata['unew'][$i][$k]['date']=$datesarray[$k];

	// 				$energy_cons_query=array(
	// 					'location_name'=>$meter_list_unew[$i]['UtilityName'],
	// 					'meter_serial'=>'',
	// 					'station_id'=>$meter_list_unew[$i]['StationId'],
	// 					'report_date'=>$datesarray[$k],
	// 					'created_date'=>date('Y-m-d H:i:s'),
	// 					'updated_date'=>date('Y-m-d H:i:s'),
	// 					'consumption'=>$resdata['unew'][$i][$k]['consumption'],
	// 					'meter_name'=>$meter_list_unew[$i]['UtilityName']              
	// 				);
	// 				$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
				
	// 		}
					
					
	// 			} 
	// }
		// for ($i=0; $i < count($meter_list_unww); $i++) {
					
		// 	for ($k=0; $k < count($datesarray); $k++)
		// 		{ 
		// 			$check=$this->chech_energy_consumotion_undp($meter_list_unww[$i]['UtilityName'],$datesarray[$k]);
		// 	if(count($check)==1){
		// 		$resdata['unww'][$i][$k]['meter']=$check[0]['meter_name'];
			
		// 		$resdata['unww'][$i][$k]['consumption']=$check[0]['consumption'];

		// 			$resdata['unww'][$i][$k]['date']=$check[0]['report_date'];
		// 			$resdata['unww'][$i][$k]['from']='db';
		// 	}else{
				
		// 			$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
		// 			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
		// 			//echo $queryconsutoday;die();
		// 			$datacontoday = $this->db->query($queryconsutoday)->result();
		// 			$resdata['unww'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

		// 			$resdata['unww'][$i][$k]['date']=$datesarray[$k];

		// 			$energy_cons_query=array(
		// 				'location_name'=>$meter_list_unww[$i]['UtilityName'],
		// 				'meter_serial'=>'',
		// 				'station_id'=>$meter_list_unww[$i]['StationId'],
		// 				'report_date'=>$datesarray[$k],
		// 				'created_date'=>date('Y-m-d H:i:s'),
		// 				'updated_date'=>date('Y-m-d H:i:s'),
		// 				'consumption'=>$resdata['unww'][$i][$k]['consumption'],
		// 				'meter_name'=>$meter_list_unww[$i]['UtilityName']              
		// 			);
		// 			$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
				
		// 	}
					
					
		// 		} 
		// }
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_energy_consumotion_undp($meter_list_undp[$i]['UtilityName'],$datesarray[$k]);
			if(count($check)==1){
				
			}else{
				
					//$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					//echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result();
					$resdata['undp'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

					//$resdata['undp'][$i][$k]['date']=$datesarray[$k];

					$energy_cons_query=array(
						'location_name'=>$meter_list_undp[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list_undp[$i]['StationId'],
						'report_date'=>$datesarray[$k],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>$resdata['undp'][$i][$k]['consumption'],
						'meter_name'=>$meter_list_undp[$i]['UtilityName']              
					);
					$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
				
			}
					
					
				} 
	}
		
	return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_undp_single($station_id,$fromdate,$todate){
		
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_list_undp_single(2023000302);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_energy_consumotion_undp_single($meter_list[$i]['UtilityName'],$datesarray[$k]);
			if(count($check)>=1){
				
			}else{
				
					
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					// echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result();
					$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '09:30:00' AND '22:59:59'";
					
					$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '09:29:59' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '23:00:00' AND '24:00:00') t";
					// echo $nightquery;die();
					
					$dataday = $this->db->query($dayquery)->result();
					$datanight = $this->db->query($nightquery)->result();

					$energy_cons_query=array(
						'location_name'=>$meter_list[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list[$i]['StationId'],
						'report_date'=>$datesarray[$k],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>(float)$datacontoday[0]->cons,
						'day_consumption'=>(float)$dataday[0]->day_consumption,
						'night_consumption'=>(float)$datanight[0]->night_consumption,
						'meter_name'=>$meter_list[$i]['UtilityName']              
					);
					$this->db->insert('energy_consumption_report_tbl_undp_single', $energy_cons_query);
				
			}
					
					
				} 
		}
	

		
					

		//return $resdata;
	}
	
	function get_hardwares_device_data_energymeter_report_terotam($station_id,$fromdate,$todate){
		
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_list_terotam(2025000133);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);
			if(count($check)==1){
				
			}else{
				
					
					$queryconsutoday="SELECT round(SUM(Consumption),2) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					// echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result();

					$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '06:00:00' AND '18:59:59'";
					
					$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '05:59:59' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00') t";
					// echo $nightquery;die();
					
					$dataday = $this->db->query($dayquery)->result();
					$datanight = $this->db->query($nightquery)->result();
					

					$energy_cons_query=array(
						'location_name'=>$meter_list[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list[$i]['StationId'],
						'report_date'=>$datesarray[$k],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>(float)$datacontoday[0]->cons,
						'day_consumption'=>(float)$dataday[0]->day_consumption,
						'night_consumption'=>(float)$datanight[0]->night_consumption,
						'meter_name'=>$meter_list[$i]['DashboardName']              
					);
					// echo json_encode($energy_cons_query);die();
					$this->db->insert('energy_consumption_report_tbl_terotam', $energy_cons_query);
				
			}
					
					
				} 
		}
		
	

		
					

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_unicef($station_id,$fromdate,$todate){
		
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_list_unicef(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_energy_consumotion_unicef($meter_list[$i]['UtilityName'],$datesarray[$k]);
			if(count($check)==1){
				
			}else{
				
					
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					//echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result();
					

					$energy_cons_query=array(
						'location_name'=>$meter_list[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list[$i]['StationId'],
						'report_date'=>$datesarray[$k],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'consumption'=>(float)$datacontoday[0]->cons,
						'meter_name'=>$meter_list[$i]['DashboardName']              
					);
					$this->db->insert('energy_consumption_report_tbl_unicef', $energy_cons_query);
				
			}
					
					
				} 
		}
		
	

		
					

		return $resdata;
	}
	function check_voltage_data_vegas($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('voltage_report_tbl_vegas');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_voltage_report_vegas($station_id,$fromdate,$todate){
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_vegas_devices();
		for ($i=0; $i < count($meter_list); $i++) {
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
		
			$resdata['v'][$i]['meter']=$meter_list[$i]['UtilityName'];

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_vegas('voltage',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){
				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					
						$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v1 = $this->db->query($queryvolt1)->result();
						$voltage1_data=array_merge($voltage1_data,$v1);

						$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v2 = $this->db->query($queryvolt2)->result();
						$voltage2_data=array_merge($voltage2_data,$v2);

						$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v3 = $this->db->query($queryvolt3)->result();
						$voltage3_data=array_merge($voltage3_data,$v3);
						$voltage_array=array(
							'location_name'=>$meter_list[$i]['UtilityName'],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'v1_data'=>serialize($v1),
							'v2_data'=>serialize($v2),
							'v3_data'=>serialize($v3),
							'meter_name'=>$resdata['v'][$i]['meter']              
						);
						// echo json_encode($voltage_array);die();
						$this->db->insert('voltage_report_tbl_vegas', $voltage_array);
					
				}
			}

			$resdata['v'][$i]['v1_data']=$voltage1_data;
			$resdata['v'][$i]['v2_data']=$voltage2_data;
			$resdata['v'][$i]['v3_data']=$voltage3_data;
			
			 
		}
					

		return $resdata;
	}
	function chech_pf_data_vegas($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('pf_report_tbl_vegas');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_power_factor_report_vegas($station_id,$fromdate,$todate){
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_vegas_devices();
		for ($i=0; $i < count($meter_list); $i++) {
			$powerfactor_data=[];
			
		
			$resdata['PF'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_pf_data_vegas('PF',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){
				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						$pf_array=array(
							'location_name'=>$meter_list[$i]['UtilityName'],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'pf_data'=>serialize($pf),
							'meter_name'=>$resdata['PF'][$i]['meter']              
						);
						 //echo json_encode($pf_array);die();
						$this->db->insert('pf_report_tbl_vegas', $pf_array);
					
				}
			}
			$resdata['PF'][$i]['pf_data']=$powerfactor_data;

			
			 
		}
		
		return $resdata;

	}
	function check_current_data_undp($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl_undp');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_current_data_unicef($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl_unicef');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_current_data_terotam($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl_terotam');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_current_data_vegas($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl_vegas');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		//  echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_current_report_vegas($station_id,$fromdate,$todate){
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_vegas_devices();
		for ($i=0; $i < count($meter_list); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['c'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_vegas('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){
				
					$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
					$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
					$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
				}else{
					
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$c1 = $this->db->query($querycurrent1)->result();
						$current1_data=array_merge($current1_data,$c1);

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						$current2_data=array_merge($current2_data,$c2);

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						$current3_data=array_merge($current3_data,$c3);
						$current_array=array(
							'location_name'=>$meter_list[$i]['UtilityName'],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'c1_data'=>serialize($c1),
							'c2_data'=>serialize($c2),
							'c3_data'=>serialize($c3),
							'meter_name'=>$resdata['c'][$i]['meter']              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('current_report_tbl_vegas', $current_array);
					
				}
			}
			$resdata['c'][$i]['c1_data']=$current1_data;
			$resdata['c'][$i]['c2_data']=$current2_data;
			$resdata['c'][$i]['c3_data']=$current3_data;

			
			
			 
		}
					

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_current_report_undp($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list=$this->get_energymeter_list_cv_undp();

		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_undp('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		// echo $querycurrent1;die();
							$c1 = $this->db->query($querycurrent1)->result();
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current_array=array(
								'location_name'=>$meter_list[$i]['UtilityName'],
								'meter_serial'=>'',
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'c1_data'=>serialize($c1),
								'c2_data'=>serialize($c2),
								'c3_data'=>serialize($c3),
								'meter_name'=>$meter_list[$i]['meter']              
							);
							
							//echo json_encode($current_array);die();
							$this->db->insert('current_report_tbl_undp', $current_array);
						
						
					
				}
			}
			
			 
		}
		
		//return $resdata;
	}
	function get_hardwares_device_data_energymeter_current_report_undp_bkp($station_id,$fromdate,$todate,$table_name){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		// $table_name="hardware_station_consumption_data_undp_bkpSep26ToJan21_2025";
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list_undp=$this->get_energymeter_list_station($table_name,2023000304,$datesarray[0]);
		// $meter_list_uncw=$this->get_energymeter_list_station($table_name,2023000303,$datesarray[0]);
		// $meter_list_unew=$this->get_energymeter_list_station($table_name,2023000300,$datesarray[0]);
		// $meter_list_unff=$this->get_energymeter_list_station($table_name,2023000302,$datesarray[0]);
		// $meter_list_unww=$this->get_energymeter_list_station($table_name,2023000301,$datesarray[0]);
		// $meter_list_unsg=$this->get_energymeter_list_station($table_name,2024000143,$datesarray[0]);
		// $meter_list_unab=$this->get_energymeter_list_station($table_name,2024000144,$datesarray[0]);

		
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			
			
			$resdata['undp'][$i]['meter']=$meter_list_undp[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_undp('current',$meter_list_undp[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
					if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
	
						$c1 = $this->db->query($querycurrent1)->result();
						

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						
						$current_array=array(
							'location_name'=>$meter_list_undp[$i]['UtilityName'],
							'meter_serial'=>'',
							'station_id'=>$meter_list_undp[$i]['StationId'],
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'c1_data'=>serialize($c1),
							'c2_data'=>serialize($c2),
							'c3_data'=>serialize($c3),
							'meter_name'=>$resdata['undp'][$i]['meter']              
						);
						//echo json_encode($current_array);die();
						$this->db->insert('current_report_tbl_undp', $current_array);
					}else{
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
	
						$c1 = $this->db->query($querycurrent1)->result();
						

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						
						$current_array=array(
							'location_name'=>$meter_list_undp[$i]['UtilityName'],
							'meter_serial'=>'',
							'station_id'=>$meter_list_undp[$i]['StationId'],
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'c1_data'=>serialize($c1),
							'c2_data'=>serialize($c2),
							'c3_data'=>serialize($c3),
							'meter_name'=>$resdata['undp'][$i]['meter']              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('current_report_tbl_undp', $current_array);
					}
				}
			}
			

			
			
			 
		}

		//
		// for ($i=0; $i < count($meter_list_uncw); $i++) {
			
			
			
		// 	$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
		

		// 	for($t=0;$t<count($datesarray);$t++){
		// 		$check=$this->check_current_data_undp('current',$meter_list_uncw[$i]['UtilityName'],$datesarray[$t]);
		// 		if(count($check)==1){				
					
		// 		}else{
					
		// 			$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
		// 					$c1 = $this->db->query($querycurrent1)->result();
							
		// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
		// 					$c2 = $this->db->query($querycurrent2)->result();
							
		// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
		// 					$c3 = $this->db->query($querycurrent3)->result();
							
		// 					$current_array=array(
		// 						'location_name'=>$meter_list_uncw[$i]['UtilityName'],
		// 						'meter_serial'=>'',
		// 						'station_id'=>$meter_list_uncw[$i]['StationId'],
		// 						'report_date'=>$datesarray[$t],
		// 						'created_date'=>date('Y-m-d H:i:s'),
		// 						'updated_date'=>date('Y-m-d H:i:s'),
		// 						'c1_data'=>serialize($c1),
		// 						'c2_data'=>serialize($c2),
		// 						'c3_data'=>serialize($c3),
		// 						'meter_name'=>$resdata['uncw'][$i]['meter']              
		// 					);
		// 					//echo json_encode($pressure_array);die();
		// 					$this->db->insert('current_report_tbl_undp', $current_array);
		// 		}
		// 	}
			
			
			 
		// }
		//
			//
			// for ($i=0; $i < count($meter_list_unew); $i++) {
			
				
				
			// 	$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
				
			
	
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_current_data_undp('current',$meter_list_unew[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$current1_data=array_merge($current1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$current2_data=array_merge($current2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$current3_data=array_merge($current3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unew[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unew[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'c1_data'=>serialize($c1),
			// 						'c2_data'=>serialize($c2),
			// 						'c3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unew'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('current_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				
	
				
				
				 
			// }
			//	
			//
			// for ($i=0; $i < count($meter_list_unff); $i++) {
			
				
				
			// 	$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
				
			
	
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_current_data_undp('current',$meter_list_unff[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
						
			// 				if($meter_list_unff[$i]['UtilityName'] != 'Solar Meter'){
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$current1_data=array_merge($current1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$current2_data=array_merge($current2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$current3_data=array_merge($current3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unff[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unff[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'c1_data'=>serialize($c1),
			// 						'c2_data'=>serialize($c2),
			// 						'c3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unff'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('current_report_tbl_undp', $current_array);
			// 				}else{
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$current1_data=array_merge($current1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$current2_data=array_merge($current2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$current3_data=array_merge($current3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unff[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unff[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'c1_data'=>serialize($c1),
			// 						'c2_data'=>serialize($c2),
			// 						'c3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unff'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('current_report_tbl_undp', $current_array);
			// 				}
							
						
			// 		}
			// 	}
				
	
				
				
				 
			// }
			//	
			//
			// for ($i=0; $i < count($meter_list_unww); $i++) {
			
				
				
			// 	$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
				
			
	
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_current_data_undp('current',$meter_list_unww[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$current1_data=array_merge($current1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$current2_data=array_merge($current2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$current3_data=array_merge($current3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unww[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unww[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'c1_data'=>serialize($c1),
			// 						'c2_data'=>serialize($c2),
			// 						'c3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unww'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('current_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				
	
				
				
				 
			// }
			//
			//
			// for ($i=0; $i < count($meter_list_unsg); $i++) {
					
					
					
			// 		$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
					


			// 	for($t=0;$t<count($datesarray);$t++){
			// 	$check=$this->check_current_data_undp('current',$meter_list_unsg[$i]['UtilityName'],$datesarray[$t]);
			// 	if(count($check)==1){				
					
			// 	}else{
					
						
			// 				$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 				$c1 = $this->db->query($querycurrent1)->result();
			// 				//$current1_data=array_merge($current1_data,$c1);

			// 				$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
			// 				$c2 = $this->db->query($querycurrent2)->result();
			// 				//$current2_data=array_merge($current2_data,$c2);

			// 				$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
			// 				$c3 = $this->db->query($querycurrent3)->result();
			// 				//$current3_data=array_merge($current3_data,$c3);
			// 				$current_array=array(
			// 					'location_name'=>$meter_list_unsg[$i]['UtilityName'],
			// 					'meter_serial'=>'',
			// 					'station_id'=>$meter_list_unsg[$i]['StationId'],
			// 					'report_date'=>$datesarray[$t],
			// 					'created_date'=>date('Y-m-d H:i:s'),
			// 					'updated_date'=>date('Y-m-d H:i:s'),
			// 					'c1_data'=>serialize($c1),
			// 					'c2_data'=>serialize($c2),
			// 					'c3_data'=>serialize($c3),
			// 					'meter_name'=>$resdata['unsg'][$i]['meter']              
			// 				);
			// 				//echo json_encode($pressure_array);die();
			// 				$this->db->insert('current_report_tbl_undp', $current_array);
						
						
					
			// 	}
			// 	}
				

			
			
			
			// }
			//
			//
			// for ($i=0; $i < count($meter_list_unab); $i++) {
						
				
			// 	$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
				


			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_current_data_undp('current',$meter_list_unab[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$current1_data=array_merge($current1_data,$c1);

			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$current2_data=array_merge($current2_data,$c2);

			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$current3_data=array_merge($current3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unab[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unab[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'c1_data'=>serialize($c1),
			// 						'c2_data'=>serialize($c2),
			// 						'c3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unab'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('current_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				

				
				
				
			// }
			//

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_current_report_unicef($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list=$this->get_energymeter_list_cv_unicef(2024000527);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_unicef('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		// echo $querycurrent1;die();
							$c1 = $this->db->query($querycurrent1)->result();
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current_array=array(
								'location_name'=>$meter_list[$i]['UtilityName'],
								'meter_serial'=>'',
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'c1_data'=>serialize($c1),
								'c2_data'=>serialize($c2),
								'c3_data'=>serialize($c3),
								'meter_name'=>$meter_list[$i]['DashboardName']              
							);
							//echo json_encode($current_array);die();
							$this->db->insert('current_report_tbl_unicef', $current_array);
						
						
					
				}
			}
			
			 
		}

		//
		

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_current_report_terotam($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list=$this->get_energymeter_list_terotam(2025000133);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_terotam('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		// echo $querycurrent1;die();
							$c1 = $this->db->query($querycurrent1)->result();
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current_array=array(
								'location_name'=>$meter_list[$i]['UtilityName'],
								'meter_serial'=>'',
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'c1_data'=>serialize($c1),
								'c2_data'=>serialize($c2),
								'c3_data'=>serialize($c3),
								'meter_name'=>$meter_list[$i]['DashboardName']              
							);
							//echo json_encode($current_array);die();
							$this->db->insert('current_report_tbl_terotam', $current_array);
						
						
					
				}
			}
			
			 
		}

		//
		

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_voltage_report_unicef($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list=$this->get_energymeter_list_cv_unicef(2024000527);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_unicef('voltage',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		// echo $querycurrent1;die();
							$c1 = $this->db->query($querycurrent1)->result();
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current_array=array(
								'location_name'=>$meter_list[$i]['UtilityName'],
								'meter_serial'=>'',
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'v1_data'=>serialize($c1),
								'v2_data'=>serialize($c2),
								'v3_data'=>serialize($c3),
								'meter_name'=>$meter_list[$i]['DashboardName']              
							);
							//echo json_encode($current_array);die();
							$this->db->insert('voltage_report_tbl_unicef', $current_array);
						
						
					
				}
			}
			
			 
		}

		//
		

		return $resdata;
	}
	function get_hardwares_device_data_power_factor_report_unicef($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list=$this->get_energymeter_list_cv_unicef(2024000527);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_pf_data_unicef('pf',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
					$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
					$pf = $this->db->query($querypowerfactor)->result();
							$pf_array=array(
								'location_name'=>$meter_list[$i]['UtilityName'],
								'meter_serial'=>'',
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'pf_data'=>serialize($pf),
								'meter_name'=>$meter_list[$i]['DashboardName']              
							);
							// echo json_encode($pf_array);die();
							$this->db->insert('pf_report_tbl_unicef', $pf_array);
						
						
					
				}
			}
			
			 
		}

		//
		

		return $resdata;
	}
	function get_hardwares_device_data_flowmeter_report_unicef($station_id,$fromdate,$todate){


		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		$meter_list=$this->get_water_meters(2024000527);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_water_data_unicef('water',$meter_list[$i]['MeterName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
					$waterm="SELECT round(SUM(Consumption),2) as cons FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Water Flow' AND `LocationName`='".$meter_list[$i]['MeterName']."'";
		// echo $waterm;die();
					$wm = $this->db->query($waterm)->result_array();
							$pf_array=array(
								'location_name'=>$meter_list[$i]['MeterName'],
								'meter_serial'=>'',
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'consumption'=>$wm[0]['cons'],
								'meter_name'=>$meter_list[$i]['MeterName']              
							);
							// echo json_encode($pf_array);die();
							$this->db->insert('watermeter_report_tbl_unicef', $pf_array);
						
						
					
				}
			}
			
			 
		}


	}
	function check_voltage_data_undp($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('voltage_report_tbl_undp');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_voltage_data_unicef($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('voltage_report_tbl_unicef');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_voltage_report_undp($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list=$this->get_energymeter_list_cv_undp();
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_undp('voltage',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		// echo $querycurrent1;die();
							$c1 = $this->db->query($querycurrent1)->result();
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current_array=array(
								'location_name'=>$meter_list[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'v1_data'=>serialize($c1),
								'v2_data'=>serialize($c2),
								'v3_data'=>serialize($c3),
								'meter_name'=>$meter_list[$i]['meter']              
							);
							// echo json_encode($current_array);die();
							$this->db->insert('voltage_report_tbl_undp', $current_array);
						
						
					
				}
			}
			
			 
		}		

		//return $resdata;
	}
	function get_hardwares_device_data_energymeter_voltage_report_undp_bkp($station_id,$fromdate,$todate,$table_name){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		//$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$meter_list_undp=$this->get_energymeter_list_station($table_name,2023000304,$datesarray[0]);
		// $meter_list_uncw=$this->get_energymeter_list_station($table_name,2023000303,$datesarray[0]);
		// $meter_list_unew=$this->get_energymeter_list_station($table_name,2023000300,$datesarray[0]);
		// $meter_list_unff=$this->get_energymeter_list_station($table_name,2023000302,$datesarray[0]);
		// $meter_list_unww=$this->get_energymeter_list_station($table_name,2023000301,$datesarray[0]);
		// $meter_list_unsg=$this->get_energymeter_list_station($table_name,2024000143,$datesarray[0]);
		// $meter_list_unab=$this->get_energymeter_list_station($table_name,2024000144,$datesarray[0]);
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			
			
			$resdata['undp'][$i]['meter']=$meter_list_undp[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_undp('voltage',$meter_list_undp[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							//$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							//$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							//$voltage3_data=array_merge($voltage3_data,$c3);
							$current_array=array(
								'location_name'=>$meter_list_undp[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_undp[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'v1_data'=>serialize($c1),
								'v2_data'=>serialize($c2),
								'v3_data'=>serialize($c3),
								'meter_name'=>$resdata['undp'][$i]['meter']              
							);
							// echo json_encode($current_array);die();
							$this->db->insert('voltage_report_tbl_undp', $current_array);
						}else{
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							//$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							//$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							//$voltage3_data=array_merge($voltage3_data,$c3);
							$current_array=array(
								'location_name'=>$meter_list_undp[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_undp[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'v1_data'=>serialize($c1),
								'v2_data'=>serialize($c2),
								'v3_data'=>serialize($c3),
								'meter_name'=>$resdata['undp'][$i]['meter']              
							);
							// echo json_encode($current_array);die();
							$this->db->insert('voltage_report_tbl_undp', $current_array);
						}
						
					
				}
			}
			

			
			
			 
		}

		//
		// for ($i=0; $i < count($meter_list_uncw); $i++) {
			
			
			
		// 	$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
		

		// 	for($t=0;$t<count($datesarray);$t++){
		// 		$check=$this->check_voltage_data_undp('voltage',$meter_list_uncw[$i]['UtilityName'],$datesarray[$t]);
		// 		if(count($check)==1){				
					
		// 		}else{
					
						
		// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
		// 					$c1 = $this->db->query($querycurrent1)->result();
		// 					//$voltage1_data=array_merge($voltage1_data,$c1);
	
		// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
		// 					$c2 = $this->db->query($querycurrent2)->result();
		// 					//$voltage2_data=array_merge($voltage2_data,$c2);
	
		// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
		// 					$c3 = $this->db->query($querycurrent3)->result();
		// 					//$voltage3_data=array_merge($voltage3_data,$c3);
		// 					$current_array=array(
		// 						'location_name'=>$meter_list_uncw[$i]['UtilityName'],
		// 						'meter_serial'=>'',
		// 						'station_id'=>$meter_list_uncw[$i]['StationId'],
		// 						'report_date'=>$datesarray[$t],
		// 						'created_date'=>date('Y-m-d H:i:s'),
		// 						'updated_date'=>date('Y-m-d H:i:s'),
		// 						'v1_data'=>serialize($c1),
		// 						'v2_data'=>serialize($c2),
		// 						'v3_data'=>serialize($c3),
		// 						'meter_name'=>$resdata['uncw'][$i]['meter']              
		// 					);
		// 					//echo json_encode($pressure_array);die();
		// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
						
						
					
		// 		}
		// 	}
			

			
			
			 
		// }
		//
			//
			// for ($i=0; $i < count($meter_list_unew); $i++) {
			
				
				
			// 	$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
				
			
	
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_voltage_data_undp('voltage',$meter_list_unew[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$voltage1_data=array_merge($voltage1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$voltage2_data=array_merge($voltage2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$voltage3_data=array_merge($voltage3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unew[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unew[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'v1_data'=>serialize($c1),
			// 						'v2_data'=>serialize($c2),
			// 						'v3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unew'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				
	
				
				
				 
			// }
			//	
			//
			// for ($i=0; $i < count($meter_list_unff); $i++) {
			
				
			// 	$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
				
			
	
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_voltage_data_undp('voltage',$meter_list_unff[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
			// 				if($meter_list_unff[$i]['UtilityName'] != 'Solar Meter'){
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$voltage1_data=array_merge($voltage1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$voltage2_data=array_merge($voltage2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$voltage3_data=array_merge($voltage3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unff[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unff[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'v1_data'=>serialize($c1),
			// 						'v2_data'=>serialize($c2),
			// 						'v3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unff'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
			// 				}else{
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$voltage1_data=array_merge($voltage1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$voltage2_data=array_merge($voltage2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$voltage3_data=array_merge($voltage3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unff[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unff[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'v1_data'=>serialize($c1),
			// 						'v2_data'=>serialize($c2),
			// 						'v3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unff'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
			// 				}
							
						
			// 		}
			// 	}
				
				
				
				 
			// }
			//	
			//
			// for ($i=0; $i < count($meter_list_unww); $i++) {
			
				
				
			// 	$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
				
			
	
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_voltage_data_undp('voltage',$meter_list_unww[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$voltage1_data=array_merge($voltage1_data,$c1);
		
			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$voltage2_data=array_merge($voltage2_data,$c2);
		
			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$voltage3_data=array_merge($voltage3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unww[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unww[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'v1_data'=>serialize($c1),
			// 						'v2_data'=>serialize($c2),
			// 						'v3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unww'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				
	
				
				
				 
			// }
			//
			//
			// for ($i=0; $i < count($meter_list_unsg); $i++) {
						
				
				
			// 	$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
				


			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_voltage_data_undp('voltage',$meter_list_unsg[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$voltage1_data=array_merge($voltage1_data,$c1);

			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$voltage2_data=array_merge($voltage2_data,$c2);

			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$voltage3_data=array_merge($voltage3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unsg[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unsg[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'v1_data'=>serialize($c1),
			// 						'v2_data'=>serialize($c2),
			// 						'v3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unsg'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				

				
				
				
			// }
			//
			//
			// for ($i=0; $i < count($meter_list_unab); $i++) {
						
				
				
			// 	$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
				


			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->check_voltage_data_undp('voltage',$meter_list_unab[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
						
			// 		}else{
						
						
							
			// 					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 					$c1 = $this->db->query($querycurrent1)->result();
			// 					//$voltage1_data=array_merge($voltage1_data,$c1);

			// 					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c2 = $this->db->query($querycurrent2)->result();
			// 					//$voltage2_data=array_merge($voltage2_data,$c2);

			// 					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
			// 					$c3 = $this->db->query($querycurrent3)->result();
			// 					//$voltage3_data=array_merge($voltage3_data,$c3);
			// 					$current_array=array(
			// 						'location_name'=>$meter_list_unab[$i]['UtilityName'],
			// 						'meter_serial'=>'',
			// 						'station_id'=>$meter_list_unab[$i]['StationId'],
			// 						'report_date'=>$datesarray[$t],
			// 						'created_date'=>date('Y-m-d H:i:s'),
			// 						'updated_date'=>date('Y-m-d H:i:s'),
			// 						'v1_data'=>serialize($c1),
			// 						'v2_data'=>serialize($c2),
			// 						'v3_data'=>serialize($c3),
			// 						'meter_name'=>$resdata['unab'][$i]['meter']              
			// 					);
			// 					//echo json_encode($pressure_array);die();
			// 					$this->db->insert('voltage_report_tbl_undp', $current_array);
							
							
						
			// 		}
			// 	}
				
				
				
			// }
//			

		return $resdata;
	}
	function chech_pf_data_undp($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('pf_report_tbl_undp');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_pf_data_unicef($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('pf_report_tbl_unicef');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_water_data_unicef($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('watermeter_report_tbl_unicef');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_power_factor_report_undp($station_id,$fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_cv_undp();
		for ($i=0; $i < count($meter_list); $i++) {
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_pf_data_undp('pf',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					
				}else{
					
						
					$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
					$pf = $this->db->query($querypowerfactor)->result();
					$pf_array=array(
						'location_name'=>$meter_list[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list[$i]['StationId'],
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'pf_data'=>serialize($pf),
						'meter_name'=>$meter_list[$i]['meter']              
					);
					 //echo json_encode($pf_array);die();
					$this->db->insert('pf_report_tbl_undp', $pf_array);
						
						
					
				}
			}
			
			 
		}

		//return $resdata;
	}
	function get_hardwares_device_data_power_factor_report_undp_bkp($station_id,$fromdate,$todate,$table_name){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		// $table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list_undp=$this->get_energymeter_list_station($table_name,2023000304,$datesarray[0]);
		// $meter_list_uncw=$this->get_energymeter_list_station($table_name,2023000303,$datesarray[0]);
		// $meter_list_unew=$this->get_energymeter_list_station($table_name,2023000300,$datesarray[0]);
		// $meter_list_unff=$this->get_energymeter_list_station($table_name,2023000302,$datesarray[0]);
		// $meter_list_unww=$this->get_energymeter_list_station($table_name,2023000301,$datesarray[0]);
		// $meter_list_unsg=$this->get_energymeter_list_station($table_name,2024000143,$datesarray[0]);
		// $meter_list_unab=$this->get_energymeter_list_station($table_name,2024000144,$datesarray[0]);
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			$powerfactor_data=[];
			
			$resdata['undp'][$i]['meter']=$meter_list_undp[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_pf_data_undp('PF',$meter_list_undp[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
					}else{
						
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						$pf_array=array(
							'location_name'=>$meter_list_undp[$i]['UtilityName'],
							'meter_serial'=>'',
							'station_id'=>$meter_list_uncw[$i]['StationId'],
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'pf_data'=>serialize($pf),
							'meter_name'=>$resdata['undp'][$i]['meter']              
						);
						 //echo json_encode($pf_array);die();
						$this->db->insert('pf_report_tbl_undp', $pf_array);
						
						
					}
				}
			}
			$resdata['undp'][$i]['pf_data']=$powerfactor_data;

			
			
			 
		}

		//
		// for ($i=0; $i < count($meter_list_uncw); $i++) {
			
		// 	$powerfactor_data=[];
			
		// 	$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
		
		
		// 	for($t=0;$t<count($datesarray);$t++){
		// 		$check=$this->chech_pf_data_undp('PF',$meter_list_uncw[$i]['UtilityName'],$datesarray[$t]);
		// 		if(count($check)==1){				
		// 			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
		// 		}else{
					
		// 			if($datesarray[$t]>=date('Y-m-d')){
		
		// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
		// 				$pf = $this->db->query($querypowerfactor)->result();						
		// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
		// 			}else{
						
		// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
		// 				$pf = $this->db->query($querypowerfactor)->result();						
		// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
		// 				$pf_array=array(
		// 					'location_name'=>$meter_list_uncw[$i]['UtilityName'],
		// 					'meter_serial'=>'',
		// 					'station_id'=>$meter_list_uncw[$i]['StationId'],
		// 					'report_date'=>$datesarray[$t],
		// 					'created_date'=>date('Y-m-d H:i:s'),
		// 					'updated_date'=>date('Y-m-d H:i:s'),
		// 					'pf_data'=>serialize($pf),
		// 					'meter_name'=>$resdata['uncw'][$i]['meter']              
		// 				);
		// 				 //echo json_encode($pf_array);die();
		// 				$this->db->insert('pf_report_tbl_undp', $pf_array);
						
						
		// 			}
		// 		}
		// 	}
		// 	$resdata['uncw'][$i]['pf_data']=$powerfactor_data;
		
			
			
			 
		// }
		//
			//
			// for ($i=0; $i < count($meter_list_unew); $i++) {
			
			// 	$powerfactor_data=[];
				
			// 	$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
				
			
			
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->chech_pf_data_undp('PF',$meter_list_unew[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
			// 			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
			// 		}else{
						
			// 			if($datesarray[$t]>=date('Y-m-d')){
			
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 			}else{
							
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 				$pf_array=array(
			// 					'location_name'=>$meter_list_unew[$i]['UtilityName'],
			// 					'meter_serial'=>'',
			// 					'station_id'=>$meter_list_unew[$i]['StationId'],
			// 					'report_date'=>$datesarray[$t],
			// 					'created_date'=>date('Y-m-d H:i:s'),
			// 					'updated_date'=>date('Y-m-d H:i:s'),
			// 					'pf_data'=>serialize($pf),
			// 					'meter_name'=>$resdata['unew'][$i]['meter']              
			// 				);
			// 				 //echo json_encode($pf_array);die();
			// 				$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
			// 			}
			// 		}
			// 	}
			// 	$resdata['unew'][$i]['pf_data']=$powerfactor_data;
			
				
				
				 
			// }
			//	
			//
			// for ($i=0; $i < count($meter_list_unff); $i++) {
			
			// 	$powerfactor_data=[];
				
			// 	$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
				
			
			
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->chech_pf_data_undp('PF',$meter_list_unff[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
			// 			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
			// 		}else{
						
			// 			if($datesarray[$t]>=date('Y-m-d')){
			
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 			}else{
							
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 				$pf_array=array(
			// 					'location_name'=>$meter_list_unff[$i]['UtilityName'],
			// 					'meter_serial'=>'',
			// 					'station_id'=>$meter_list_unff[$i]['StationId'],
			// 					'report_date'=>$datesarray[$t],
			// 					'created_date'=>date('Y-m-d H:i:s'),
			// 					'updated_date'=>date('Y-m-d H:i:s'),
			// 					'pf_data'=>serialize($pf),
			// 					'meter_name'=>$resdata['unff'][$i]['meter']              
			// 				);
			// 				 //echo json_encode($pf_array);die();
			// 				$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
			// 			}
			// 		}
			// 	}
			// 	$resdata['unff'][$i]['pf_data']=$powerfactor_data;
			
				
				
				 
			// }
			//	
			//
			// for ($i=0; $i < count($meter_list_unww); $i++) {
			
			// 	$powerfactor_data=[];
				
			// 	$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
				
			
			
			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->chech_pf_data_undp('PF',$meter_list_unww[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
			// 			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
			// 		}else{
						
			// 			if($datesarray[$t]>=date('Y-m-d')){
			
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 			}else{
							
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 				$pf_array=array(
			// 					'location_name'=>$meter_list_unww[$i]['UtilityName'],
			// 					'meter_serial'=>'',
			// 					'station_id'=>$meter_list_unww[$i]['StationId'],
			// 					'report_date'=>$datesarray[$t],
			// 					'created_date'=>date('Y-m-d H:i:s'),
			// 					'updated_date'=>date('Y-m-d H:i:s'),
			// 					'pf_data'=>serialize($pf),
			// 					'meter_name'=>$resdata['unww'][$i]['meter']              
			// 				);
			// 				 //echo json_encode($pf_array);die();
			// 				$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
			// 			}
			// 		}
			// 	}
			// 	$resdata['unww'][$i]['pf_data']=$powerfactor_data;
			
				
				
				 
			// }
			//
			//
			// for ($i=0; $i < count($meter_list_unsg); $i++) {
						
			// 	$powerfactor_data=[];
				
			// 	$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
				


			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->chech_pf_data_undp('PF',$meter_list_unsg[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
			// 			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
			// 		}else{
						
			// 			if($datesarray[$t]>=date('Y-m-d')){

			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 			}else{
							
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 				$pf_array=array(
			// 					'location_name'=>$meter_list_unsg[$i]['UtilityName'],
			// 					'meter_serial'=>'',
			// 					'station_id'=>$meter_list_unsg[$i]['StationId'],
			// 					'report_date'=>$datesarray[$t],
			// 					'created_date'=>date('Y-m-d H:i:s'),
			// 					'updated_date'=>date('Y-m-d H:i:s'),
			// 					'pf_data'=>serialize($pf),
			// 					'meter_name'=>$resdata['unsg'][$i]['meter']              
			// 				);
			// 				//echo json_encode($pf_array);die();
			// 				$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
			// 			}
			// 		}
			// 	}
			// 	$resdata['unsg'][$i]['pf_data']=$powerfactor_data;

				
				
				
			// }
			//

			//
			// for ($i=0; $i < count($meter_list_unab); $i++) {
						
			// 	$powerfactor_data=[];
				
			// 	$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
				


			// 	for($t=0;$t<count($datesarray);$t++){
			// 		$check=$this->chech_pf_data_undp('PF',$meter_list_unab[$i]['UtilityName'],$datesarray[$t]);
			// 		if(count($check)==1){				
			// 			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
			// 		}else{
						
			// 			if($datesarray[$t]>=date('Y-m-d')){

			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 			}else{
							
			// 				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

			// 				$pf = $this->db->query($querypowerfactor)->result();						
			// 				$powerfactor_data=array_merge($powerfactor_data,$pf);
			// 				$pf_array=array(
			// 					'location_name'=>$meter_list_unab[$i]['UtilityName'],
			// 					'meter_serial'=>'',
			// 					'station_id'=>$meter_list_unab[$i]['StationId'],
			// 					'report_date'=>$datesarray[$t],
			// 					'created_date'=>date('Y-m-d H:i:s'),
			// 					'updated_date'=>date('Y-m-d H:i:s'),
			// 					'pf_data'=>serialize($pf),
			// 					'meter_name'=>$resdata['unab'][$i]['meter']              
			// 				);
			// 				//echo json_encode($pf_array);die();
			// 				$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
			// 			}
			// 		}
			// 	}
			// 	$resdata['unab'][$i]['pf_data']=$powerfactor_data;

				
				
				
			// }
			//

		return $resdata;
	}
	function check_ahu_data_vegas($date,$location_name,$meter_name)
	{
		$this->db->select('*');
        $this->db->from('ahu_report_tbl_vegas');
		$this->db->where('location_name',$location_name);
		$this->db->where('meter_name',$meter_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function getHavcList_vega(){
    	
        $query = "SELECT * FROM ahu_list_vegas";
    	$data = $this->db->query($query)->result_array();
    	return $data;
    }
	function getahuReportVegas($station_id,$data,$fromdate){
		$table=$this->get_table_name($station_id);
        $resultArray=array();
		$date="'".$fromdate."'";
		$i1=0;
  		for ($i12=0; $i12 < count($data); $i12++) {
			    $meter = "'".$data[$i12]["meter_name"]."'"; 		
				$loc=$data[$i12]["location_name"];
				$check=$this->check_ahu_data_vegas($fromdate,$loc,$meter);
				if(count($check)==1){
					
				}else{
					$queryrat="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Return Air Temp'";
			//echo $queryrat;die();
				$querysat="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Supply Air Temp' ";    
				$queryrwt="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='CHWR Temp'";
				 $queryswt="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='CHWS Temp' ";
		
				 $queryactu="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Actuator Level' ";
				 $querystmp="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Set Temp' ";
				 $querypressure="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Filter Pressure' ";
				 $querydeltaair="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Delta T Air' ";
				 $fulldata=array();
				 for ($i=0; $i < 24; $i++) 
			   { 
				   if($i>9)
				   {
					   $from =  $i.":00:00";
					   $to =  ($i+1).":00:00";    
				   }
				   else
				   {
					   $from =  "0".$i.":00:00";
					   $to =  "0".($i+1).":00:00"; 
				   }
		
				   $queryrr="SELECT SUM(Consumption) as Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='".$station_id."' and TxnDate=".$date." and LineConnected='Unit RHT'    and TxnTime BETWEEN '".$from."' AND '".$to."'";
				   
				//    echo $queryrr;die();
				   $rundata = $this->db->query($queryrr)->result();
				   // echo $querygood;die();
				   if($rundata[0]->Consumption>60){
					   $run=60;
				   }elseif($rundata[0]->Consumption>48){
				   $run=60;
				   }
				   else{
					  $run=$rundata[0]->Consumption; 
				   }
				   $fulldata[$i]['Time']=$from." To ".$to;
				   $fulldata[$i]['rh']=$run;
			   }
			   //echo json_encode($fulldata);die();
				$datarat = $this->db->query($queryrat)->result();
				$datasat = $this->db->query($querysat)->result();
				$datarwt = $this->db->query($queryrwt)->result();
				$dataswt = $this->db->query($queryswt)->result();
				$dataactu = $this->db->query($queryactu)->result();
				$datastemp = $this->db->query($querystmp)->result();
				$datapressure = $this->db->query($querypressure)->result();
				$datadeltaair = $this->db->query($querydeltaair)->result();
				 
				  $resultArray[$i1]['rat']=$datarat;
				  $resultArray[$i1]['sat']=$datasat;
				  $resultArray[$i1]['rwt']=$datarwt;
				  $resultArray[$i1]['swt']=$dataswt;
				  $resultArray[$i1]['actu']=$dataactu;
				  $resultArray[$i1]['stemp']=$datastemp;
				  $resultArray[$i1]['pressure']=$datapressure;
				  $resultArray[$i1]['run']=$fulldata;
				  $resultArray[$i1]['deltaair']=$datadeltaair;
				  $resultArray[$i1]['meter']=$data[$i12]["meter_name"];
				  $resultArray[$i1]['location']=$loc;

				  $voltage_array=array(
					'location_name'=>$loc,
					'meter_serial'=>'8',
					'report_date'=>$fromdate,
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'rat'=>serialize($datarat),
					'sat'=>serialize($datasat),
					'rwt'=>serialize($datarwt),
					'swt'=>serialize($dataswt),
					'actu'=>serialize($dataactu),
					'stemp'=>serialize($datastemp),
					'pressure'=>serialize($datapressure),
					'run'=>serialize($fulldata),
					'deltaair'=>serialize($datadeltaair),
					'meter_name'=>$data[$i12]["meter_name"]             
				);
				
				$this->db->insert('ahu_report_tbl_vegas', $voltage_array);
				// echo json_encode($voltage_array);die();
	
			  
				  $i1++;

				}
			   
		
			
			
		
	
}
// echo json_encode($resultArray);die();
return $resultArray;
		
    }
}
	
