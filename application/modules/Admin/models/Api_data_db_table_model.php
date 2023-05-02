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
	function get_meters_name($table_name) {
        $this->db->select('');
        $this->db->from('hardware_station_consumption_data_mumbai');     
        $this->db->where('UtilityName','Water Monitor'); 
		$this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit; SELECT * FROM `hardware_station_consumption_data_mumbai` WHERE `UtilityName`='Water Monitor' GROUP BY `LocationName`
    
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
						if($meters['LocationName']=='Dom. Water Sump'){
							$querywaterlevel="SELECT round(((`CurReading`/1000)*2.8),2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
							$dashboardName="Domestic Sump";
						}else if($meters['LocationName']=='Fire Water Sump'){
							$querywaterlevel="SELECT round((`CurReading`/1000)*1.61,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
							$dashboardName="Fire Sump";
						}else{
							$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
							$dashboardName=$meters['LocationName'];
						}
						
						
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
							
							
							
							// echo  $this->db->last_query();die();
						
					
				}
						
		
	
	}
	function addWaterLevel(){
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$meter_list=$this->get_meters_name('hardware_station_consumption_data_mumbai');
		$time=$this->getReadingTime();
        //$date="2022-01-01";
		$date_from = strtotime($yesterDay); 
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
					$querywaterlevel="SELECT CurReading,TxnTime  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$datesarray[$m]."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";
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
}
	
