<?php
class Api_data_model_undp_single extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function get_devices_list($cat_id){
		$this->db->select('hardware_device');
        $this->db->from('hardware');        
        
		$this->db->where('client_id',$this->session->userdata('created_by'));  
		$this->db->where('status',1);
		$this->db->where('hardware_category',$cat_id);
        $this->db->group_by('hardware_device');
        $res = $this->db->get()->result_array();        
		// echo $this->db->last_query();die();       
        return $res;
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
	function get_hardwares_device_list1($device_id){
		$this->db->select('');
        $this->db->from('hardware as h');        
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		
		$this->db->where('h.client_id',$this->session->userdata('created_by'));
		if($device_id!=''){
			$this->db->where('h.hardware_device',$device_id);
		}	 
		
		$this->db->where('h.status',1);	  
        // $this->db->group_by('h.hardware_device');
        $res = $this->db->get()->result_array();  
		// echo $this->db->last_query();exit;
        return $res;
	}
	function get_energymeter_list_terotam($station_id){
		
		$this->db->select('');
        $this->db->from('undp_devices_single'); 
		$this->db->where('StationId',$station_id);
		$this->db->where('MeterName','Electricity'); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
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
	function get_energymeter_list_cv_unicef($station_id){
		
		$this->db->select('');
        $this->db->from('undp_devices_single'); 
		$this->db->where('StationId',$station_id); 
		$this->db->where_in('ModelNo',array("EM6400NG","EM6436H"));
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
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
	function get_table_name_live($c_id) {
        $this->db->select('db_table_live');
        $this->db->from('clients');
        $this->db->where('station_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['db_table_live'];
    }
	
	function get_hardwares_device_data_energy_meters_tero($data){
		// echo json_encode($data);die();
		$station_id=$data['station_id'];
		
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		// echo $table_name;die();
		$power=$this->get_energymeter_list_terotam(2023000302);
		
		// echo json_encode($power);die();
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		//$yesterDay = "2021-10-18";
		$weekday = date('Y-m-d',strtotime("-7 days"));
		$firstday= date('Y-m-d', strtotime("-30 days"));
		$earlier = new DateTime($firstday);
		$later = new DateTime($yesterDay);

		$abs_diff = $later->diff($earlier)->format("%a")+1; //3

		$date_from_month = strtotime($firstday); 
		$date_to_month = strtotime($yesterDay); 
		$datesarray_month=array();
		for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
		{
		array_push($datesarray_month, date("Y-m-d",$i1));  
		}
		
		for ($i=0; $i < count($power); $i++) {
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();
				 
				if($power[$i]['ModelNo']=='EM6400NG' || $power[$i]['ModelNo']=='EM6433H'){
					
				$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					// echo $enquery_current1;die();
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				if(is_null($c1_data[0]['cons'])){
					$resdata['uncf'][$i]['current1']="NA";
				}else{
					$resdata['uncf'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['uncf'][$i]['current2']="NA";
				}else{
					$resdata['uncf'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['uncf'][$i]['current3']="NA";
				}else{
					$resdata['uncf'][$i]['current3']=$c3_data[0]['cons'];
				}
				// if(is_null($v1_data[0]['cons'])){
				// 	$resdata['uncf'][$i]['voltage1']="NA";
				// }else{
				// 	$resdata['uncf'][$i]['voltage1']=$v1_data[0]['cons'];
				// }
				// if(is_null($v2_data[0]['cons'])){
				// 	$resdata['uncf'][$i]['voltage2']="NA";
				// }else{
				// 	$resdata['uncf'][$i]['voltage2']=$v2_data[0]['cons'];
				// }
				// if(is_null($v3_data[0]['cons'])){
				// 	$resdata['uncf'][$i]['voltage3']="NA";
				// }else{
				// 	$resdata['uncf'][$i]['voltage3']=$v3_data[0]['cons'];
				// }
				$resdata['uncf'][$i]['model']=$power[$i]['ModelNo'];
				}else{
					$resdata['uncf'][$i]['pf']="NA";
					$resdata['uncf'][$i]['model']=$power[$i]['ModelNo'];
					$resdata['uncf'][$i]['current1']="NA";
					$resdata['uncf'][$i]['current2']="NA";
					$resdata['uncf'][$i]['current3']="NA";
					$resdata['uncf'][$i]['voltage1']="NA";
					$resdata['uncf'][$i]['voltage2']="NA";
					$resdata['uncf'][$i]['voltage3']="NA";

				}
				
				$check=$this->chech_energy_consumotion_terotam($power[$i]['UtilityName'],$yesterDay);
				 
				$yest_consumption=(float)$check[0]['consumption'];
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_terotam($power[$i]['UtilityName'],$firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['uncf'][$i]['meter']=$power[$i]['DashboardName'];
				$resdata['uncf'][$i]['todaycons']=round($today_cons,2);
				$resdata['uncf'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['uncf'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['uncf'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['uncf'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);	
				
		}
		
		
		// echo json_encode($resdata);die();
		return $resdata;

	}
	
	function chech_energy_consumotion_month_terotam($location_name,$from,$to){
		$this->db->select('sum(consumption) as cons');
        $this->db->from('energy_consumption_report_tbl_undp_single');   
		$where = '(report_date between "'.$from.'" and "'.$to.'")';     
		$this->db->where('location_name',$location_name);
		$this->db->where($where);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();  (float)$month_check[0]['consumption']
		 //$where = '(report_date between "'.$date.'" and "'.$date.'")';
     
        return (float)round($res[0]['cons'],2);
	}
	function chech_energy_consumotion_terotam($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_undp_single');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_energy_consumotion_terotam_monthly($meter,$ftdate,$tdate)
	{
		$this->db->select('SUM(consumption) as sum');
        $this->db->from('energy_consumption_report_tbl_undp_single');  
		$where = '(report_date between "'.$ftdate.'" and "'.$tdate.'")';      
		// $this->db->where('location_name',$location_name);
		$this->db->where($where);
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		//  echo "ll:".$this->db->last_query();die();       
        return round($res[0]['sum'],2);
	}
	function get_energy_consumption_weekday($meter,$ftdate,$tdate,$type){
		$query="SELECT
    SUM(CASE WHEN DAYOFWEEK(report_date) = $type THEN consumption ELSE 0 END) AS sum
	FROM
		energy_consumption_report_tbl_undp_single
	WHERE
		report_date BETWEEN '".$ftdate."' AND '".$tdate."'";
		$res=$this->db->query($query)->result_array();
		return round($res[0]['sum'],2);
	}
	function get_hardwares_device_data_energymeter_report_terotam_daynight_monthly($data,$fromdate,$todate){
		//echo $sort;die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		
		$firstday= date('Y-m-01', strtotime(date('Y-m-d')));
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
		// echo $date_to;die();
        $datesarray=array();
		
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		//echo date('l', strtotime($datesarray[0]));die();
		//SELECT SUM(t.cons) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-19' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-20' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00') t;
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
						$res[$k]['date']=$datesarray[$k];
						$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);

						if(count($check)==1){
							
								
								$res[$k]['day']=round($check[0]['day_consumption'],2);
								$res[$k]['night']=round($check[0]['night_consumption'],2);
								
						}else{
							if($datesarray[$k]>=date('Y-m-d')){								
								$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '06:00:00' AND '18:59:59'";
								$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '17:00:00' AND '24:00:00') t";
								// echo $queryconsutoday;die();
								
								$dataday = $this->db->query($dayquery)->result();
								$datanight = $this->db->query($nightquery)->result();
								
								

								$res[$k]['day']=round((float)$dataday[0]->day_consumption,2);
								$res[$k]['night']=round((float)$datanight[0]->night_consumption,2);
							}else{
								
								
								$res[$k]['day']=0;
								$res[$k]['night']=0;
							}
						}
						
						
						
						
						
					
					
					
				} 
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				
				$resdata['tero']['data']=$res;
				
				

		}
			//$p=0;
			$day_con=[];
			$night_con=[];
			$time=[];
			foreach ($res as $key => $value) {
				array_push($day_con, (float)$value['day']);
				array_push($night_con, (float)$value['night']);
				array_push($time, $value['date']);
				//echo json_encode($value);die();
			}
			$res3['day']=$day_con;
			$res3['night']=$night_con;	
			$res3['date']=$time;	
			
	// echo json_encode($resdata);die();
		return $res3;
	
		
	}
	function get_hardwares_device_data_energymeter_report_terotam_daynight_dashboard_monthly($data,$fromdate,$todate){
		//echo $sort;die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		
		$firstday= date('Y-m-01', strtotime(date('Y-m-d')));
		$date_from = strtotime($firstday); 
        $date_to = strtotime(date('Y-m-d')); 
		// echo $date_to;die();
        $datesarray=array();
		
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		//echo date('l', strtotime($datesarray[0]));die();
		//SELECT SUM(t.cons) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-19' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-20' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00') t;
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
						$res[$k]['date']=$datesarray[$k];
						$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);

						if(count($check)==1){
							
								
								$res[$k]['day']=round($check[0]['day_consumption'],2);
								$res[$k]['night']=round($check[0]['night_consumption'],2);
								
						}else{
							if($datesarray[$k]>=date('Y-m-d')){								
								$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '06:00:00' AND '18:59:59'";
								$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '17:00:00' AND '24:00:00') t";
								// echo $queryconsutoday;die();
								
								$dataday = $this->db->query($dayquery)->result();
								$datanight = $this->db->query($nightquery)->result();
								
								

								$res[$k]['day']=round((float)$dataday[0]->day_consumption,2);
								$res[$k]['night']=round((float)$datanight[0]->night_consumption,2);
							}else{
								
								
								$res[$k]['day']=0;
								$res[$k]['night']=0;
							}
						}
						
						
						
						
						
					
					
					
				} 
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				
				$resdata['tero']['data']=$res;
				
				

		}
			//$p=0;
			$day_con=[];
			$night_con=[];
			$time=[];
			foreach ($res as $key => $value) {
				array_push($day_con, (float)$value['day']);
				array_push($night_con, (float)$value['night']);
				array_push($time, $value['date']);
				//echo json_encode($value);die();
			}
			$res3['day']=$day_con;
			$res3['night']=$night_con;	
			$res3['date']=$time;	
			
	// echo json_encode($resdata);die();
		return $res3;
	
		
	}
	function get_hardwares_device_data_energymeter_report_terotam_daynight_dashboard($data,$fromdate,$todate){
		//echo $sort;die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime('2025-06-01'); 
		
        $date_to = strtotime(date('Y-m-d')); 
		// echo $date_to;die();
        $datesarray=array();
		
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		//echo date('l', strtotime($datesarray[0]));die();
		//SELECT SUM(t.cons) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-19' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-20' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00') t;
		
		for ($i=0; $i < count($meter_list); $i++) {
			$day=0;
			$night=0;
			$total=0;
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
						$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);
						
						if(count($check)==1){
							
								$day+=round($check[0]['day_consumption'],2);
								$night+=round($check[0]['night_consumption'],2);
								$total+=round($check[0]['consumption'],2);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){								
								$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '06:00:00' AND '18:59:59'";
								$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '17:00:00' AND '24:00:00') t";
								// echo $dayquery;die();
								
								$dataday = $this->db->query($dayquery)->result();
								$datanight = $this->db->query($nightquery)->result();
								
								$day+=round((float)$dataday[0]->day_consumption,2);
								$night+=round((float)$datanight[0]->night_consumption,2);
								$total+=round($dataday[0]->day_consumption+$datanight[0]->night_consumption,2);
							}else{
								
								$day+=0;
								$night+=0;
								$total+=0;
							}
						}
						
						
						
						
						
					
					
					
				} 
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['daycons']=$day;
				$resdata['tero']['nightcons']=$night;
				$resdata['tero']['totalcons']=$total;
				$resdata['tero']['avgdaycons']=round($day/$total,2)*100;
				$resdata['tero']['avgnightcons']=round($night/$total,2)*100;
				
				

		}
				
	// echo json_encode($resdata);die();
		return $resdata;
	
		
	}
	function get_hardwares_device_data_energymeter_report_terotam_daynight($data,$fromdate,$todate){
		//echo $sort;die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		//echo date('l', strtotime($datesarray[0]));die();
		//SELECT SUM(t.cons) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-19' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-20' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00') t;
		
		for ($i=0; $i < count($meter_list); $i++) {
			$day=0;
			$night=0;
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
						$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							
								$day+=round($check[0]['day_consumption'],2);
								$night+=round($check[0]['night_consumption'],2);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){								
								$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '06:00:00' AND '18:59:59'";
								$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '17:00:00' AND '24:00:00') t";
								// echo $queryconsutoday;die();
								
								$dataday = $this->db->query($dayquery)->result();
								$datanight = $this->db->query($nightquery)->result();
								
								$day+=round((float)$dataday[0]->cons,2);
								$night+=round((float)$datanight[0]->cons,2);
							}else{
								
								$day+=0;
								$night+=0;
							}
						}
						
						
						
						
						
					
					
					
				} 
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['daycons']=$day;
				$resdata['tero']['nightcons']=$night;
				

		}
				
	// echo json_encode($resdata);die();
		return $resdata;
	
		
	}
	function getWeekdays(string $startDate, string $endDate)
	{
		$sundays = [];
		$mondays = [];
		$tusdays = [];
		$wedsdays = [];
		$thursdays = [];
		$fridays = [];
		$saterdays = [];
		$start = new DateTime($startDate);
		$end = new DateTime($endDate);
		$interval = new DateInterval('P1D');
		$datePeriod = new DatePeriod($start, $interval, $end);

		foreach ($datePeriod as $date) {
			$dayOfWeek = (int)$date->format('N'); // 1 for Monday, 7 for Sunday

			if ($dayOfWeek === 7) {
				$sundays[] = $date->format('Y-m-d');
			} elseif ($dayOfWeek === 1) {
				$mondays[] = $date->format('Y-m-d');
			}
			elseif ($dayOfWeek === 2) {
				$tusdays[] = $date->format('Y-m-d');
			}
			elseif ($dayOfWeek === 3) {
				$wedsdays[] = $date->format('Y-m-d');
			}
			elseif ($dayOfWeek === 4) {
				$thursdays[] = $date->format('Y-m-d');
			}
			elseif ($dayOfWeek === 5) {
				$fridays[] = $date->format('Y-m-d');
			}
			elseif ($dayOfWeek === 6) {
				$saterdays[] = $date->format('Y-m-d');
			}
		}

		return [
			'sundays' => $sundays,
			'mondays' => $mondays,
			'tusdays' => $tusdays,
			'wedsdays' => $wedsdays,
			'thursdays' => $thursdays,
			'fridays' => $fridays,
			'saterdays' => $saterdays,
		];
	}


	function get_hardwares_device_data_energymeter_report_terotam_week($data,$fromdate,$todate){
		//echo $sort;die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		//echo date('l', strtotime($datesarray[0]));die();
		//SELECT SUM(t.cons) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-19' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM hardware_station_consumption_data_terotam where TxnDate='2025-06-20' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00') t;
		
		for ($i=0; $i < count($meter_list); $i++) {
						$weekday=0;
						$weekend=0;
						$weekdaycons=0;
						$weekendcons=0;
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
						if(date('l', strtotime($datesarray[$k]))=='Sunday' || date('l', strtotime($datesarray[$k]))=='Saturday'){
							$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							
								$weekendcons+=round($check[0]['consumption'],2);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								// echo $queryconsutoday;die();
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								
								$weekendcons+=round((float)$datacontoday[0]->cons,2);
							}else{
								
								$weekendcons+=0;
							}
						}
						$weekend++;
						
						}else{
							$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							
								$weekdaycons+=round($check[0]['consumption'],2);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								// echo $queryconsutoday;die();
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								
								$weekdaycons+=round((float)$datacontoday[0]->cons,2);
							}else{
								
								$weekdaycons+=0;
							}
						}
						$weekday++;
						
						}
						
						
					
					
					
				} 
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['weekdaycount']=$weekday;
				$resdata['tero']['weekendcount']=$weekend;
				
				$resdata['tero']['weekendcons']=round($weekendcons,2);
				$resdata['tero']['weekdaycons']=round($weekdaycons,2);
				// echo json_encode($resdata);die();
				if($resdata['tero']['weekendcons']==0 ){
					$resdata['tero']['avgweekendcons']=0;
				}else{
					$resdata['tero']['avgweekendcons']=round($resdata['tero']['weekendcons']/$resdata['tero']['weekendcount'],2);
				}
				
				if($resdata['tero']['weekdaycons']==0){
					$resdata['tero']['avgweekdaycons']=0;
				}else{
					$resdata['tero']['avgweekdaycons']=round(round($weekdaycons,2)/$weekday,2);
				}
				
				
				$resdata['tero']['totalcons']=round($weekendcons,2)+round($weekdaycons,2);
				
				$resdata['tero']['avgcons']=round((round($weekendcons,2)+round($weekdaycons,2))/($weekday+$weekend),2);

		}
				
	// echo json_encode($resdata);die();
		return $resdata;
	
		
	}
	function get_hardwares_device_data_energymeter_report_terotam($data,$fromdate,$todate,$sort){
		//echo $sort;die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		// echo json_encode($meter_list);die();
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['tero'][$i][$k]['meter']=$meter_list[$i]['DashboardName'];
							$resdata['tero'][$i][$k]['sort']=$sort;
							$resdata['tero'][$i][$k]['date']=$datesarray[$k];
							
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
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['tero'][$i][$k]['data']=$resdata1;
								// echo json_encode($resdata['tero']);die();
						}else{

							$check=$this->chech_energy_consumotion_terotam_hourly($meter_list[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							
								$resdata['tero'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['tero'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['tero'][$i][$k]['from']='db4';
								$resdata['tero'][$i][$k]['sort']=$sort;
								$resdata['tero'][$i][$k]['data']=unserialize($check[0]['consumption']);
								
						}
						
					}else{						
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['tero'][$i][$k]['meter']=$meter_list[$i]['DashboardName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['tero'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

								$dayquery="SELECT round(SUM(Consumption),2) as day_consumption FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '06:00:00' AND '18:59:59'";
								$nightquery="SELECT round(SUM(t.cons),2) AS night_consumption FROM (SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate='".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '00:00:00' AND '06:00:00' UNION ALL SELECT SUM(Consumption) as cons FROM $table_name_live where TxnDate = '".$datesarray[$k]."' AND `UtilityName`='".$meter_list[$i]['UtilityName']."' AND LineConnected='kWh' AND TxnTime BETWEEN '19:00:00' AND '24:00:00') t";
								// echo $queryconsutoday;die();
								
								$dataday = $this->db->query($dayquery)->result();
								$datanight = $this->db->query($nightquery)->result();
								
								$resdata['tero'][$i][$k]['day_consumption']=round((float)$dataday[0]->day_consumption,2);
								$resdata['tero'][$i][$k]['night_consumption']=round((float)$datanight[0]->night_consumption,2);


				
								$resdata['tero'][$i][$k]['date']=$datesarray[$k];
								$resdata['tero'][$i][$k]['count']=count($datesarray);
							}else{
									$check=$this->chech_energy_consumotion_terotam($meter_list[$i]['UtilityName'],$datesarray[$k]);
								
									   $resdata['tero'][$i][$k]['meter']=$check[0]['meter_name'];
								
									   $resdata['tero'][$i][$k]['consumption']=$check[0]['consumption'];
									   $resdata['tero'][$i][$k]['day_consumption']=$check[0]['day_consumption'];
									   $resdata['tero'][$i][$k]['night_consumption']=$check[0]['night_consumption'];
						
										$resdata['tero'][$i][$k]['date']=$check[0]['report_date'];
										$resdata['tero'][$i][$k]['from']='db';
										$resdata['tero'][$i][$k]['count']=count($datesarray);
								
							}
						
					}
					
					
					
				} 
		}
		$fullData=array();	
		//if($sort==2){
		$rs=[];
		for ($t=0; $t < count($resdata['tero']); $t++) { 
			for ($i=0; $i < 24; $i++) { 
			
				$rs['tero'][$t][$i]['meter']=$resdata['tero'][$t][0]['meter'];
				$rs['tero'][$t][$i]['sort']=$resdata['tero'][$t][0]['sort'];
				$rs['tero'][$t][$i]['date']=$resdata['tero'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['tero'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['tero'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['tero'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['tero'][$t][$i]['data']=$rt;
			}
		}
		$fullData['hourly']=$rs;
	//return $rs;
	//}else{
		$fullData['day']=$resdata;
	//echo json_encode($fullData);die();
		return $fullData;
		
	
	
	}
	function chech_energy_consumotion_terotam_hourly($location_name,$date)
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
	function get_hardwares_device_data_energymeter_day_report_terotam($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			
			$resdata['unicef'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$querycurrent1="SELECT round(Consumption,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Kwh' AND  `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
				$c1 = $this->db->query($querycurrent1)->result();

			}
			$resdata['unicef'][$i]['c1_data']=$c1;

			
			
			 
		}

		//
		
//
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_monthly__year_to_year_report_terotam($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		$m1_fdate='2025-01-01';
		$m1_tdate='2025-01-31';

		$m2_fdate='2025-02-01';
		$m2_tdate='2025-02-28';

		$m3_fdate='2025-03-01';
		$m3_tdate='2025-03-31';

		$m4_fdate='2025-04-01';
		$m4_tdate='2025-04-30';

		$m5_fdate='2025-05-01';
		$m5_tdate='2025-05-31';
		
		$m6_fdate='2025-06-01';
		$m6_tdate='2025-06-30';

		$m7_fdate='2025-07-01';
		$m7_tdate='2025-07-31';

		$m8_fdate='2025-08-01';
		$m8_tdate='2025-08-31';

		$m9_fdate='2025-09-01';
		$m9_tdate='2025-09-30';

		$m10_fdate='2025-10-01';
		$m10_tdate='2025-10-31';

		$m11_fdate='2025-11-01';
		$m11_tdate='2025-11-30';

		$m12_fdate='2025-12-01';
		$m12_tdate='2025-12-31';

		//echo json_encode($days);die();
        // for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        // {
        //   array_push($datesarray, date("Y-m-d",$i1));  
        // }
		// $time=strtotime(date("Y-m-d"));
		// $month=date("F",$time);
		// echo $month;die();
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		for ($i=0; $i < count($meter_list); $i++) {
			
					
			$m1=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate);
			$m2=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate);
			$m3=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate);
			$m4=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate);
			$m5=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate);
			$m6=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate);
			$m7=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate);
			$m8=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate);
			$m9=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate);
			$m10=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate);
			$m11=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate);
			$m12=$this->chech_energy_consumotion_terotam_monthly($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate);


						
						$data_this_year=[(float)$m1,(float)$m2,(float)$m3,(float)$m4,(float)$m5,(float)$m6,(float)$m7,(float)$m8,(float)$m9,(float)$m10,(float)$m11,(float)$m12];
						$data_last_year=[0,0,0,0,0,0,0,0,0,0,0,0,0];
						
						$data_this_year_avg=[(float)round($m1/31,2),(float)round($m2/28,2),(float)round($m3/31,2),(float)round($m4/30,2),(float)round($m5/31,2),(float)round($m6/30,2),(float)round($m7/31,2),(float)round($m8/31,2),(float)round($m9/30,2),(float)round($m10/31,2),(float)round($m11/30,2),(float)round($m12/31,2)];	
						
					
					
					
				
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['this_yaer_data']=$data_this_year;
				$resdata['tero']['this_yaer_data_avg']=$data_this_year_avg;
				$resdata['tero']['last_yaer_data']=$data_last_year;
				// $resdata['tero']['q1date']=$data;
				

		}
		

		//
		
//
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_monthly_report_terotam($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		$m1_fdate='2025-01-01';
		$m1_tdate='2025-01-31';

		$m2_fdate='2025-02-01';
		$m2_tdate='2025-02-28';

		$m3_fdate='2025-03-01';
		$m3_tdate='2025-03-31';

		$m4_fdate='2025-04-01';
		$m4_tdate='2025-04-30';

		$m5_fdate='2025-05-01';
		$m5_tdate='2025-05-31';
		
		$m6_fdate='2025-06-01';
		$m6_tdate='2025-06-30';

		$m7_fdate='2025-07-01';
		$m7_tdate='2025-07-31';

		$m8_fdate='2025-08-01';
		$m8_tdate='2025-08-31';

		$m9_fdate='2025-09-01';
		$m9_tdate='2025-09-30';

		$m10_fdate='2025-10-01';
		$m10_tdate='2025-10-31';

		$m11_fdate='2025-11-01';
		$m11_tdate='2025-11-30';

		$m12_fdate='2025-12-01';
		$m12_tdate='2025-12-31';

		//echo json_encode($days);die();
        // for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        // {
        //   array_push($datesarray, date("Y-m-d",$i1));  
        // }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		for ($i=0; $i < count($meter_list); $i++) {
			
					
			// $m1_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,1);
			// $m1_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,2);
			// $m1_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,3);
			// $m1_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,4);
			// $m1_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,5);
			// $m1_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,6);
			// $m1_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,7);

			// $m2_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,1);
			// $m2_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,2);
			// $m2_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,3);
			// $m2_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,4);
			// $m2_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,5);
			// $m2_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,6);
			// $m2_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m2_fdate,$m2_tdate,7);

			//$m3_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,1);
						// $m3_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,2);
						// $m3_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,3);
						// $m3_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,4);
						// $m3_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,5);
						// $m3_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,6);
						// $m3_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m3_fdate,$m3_tdate,7);

						// $m4_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,1);
						// $m4_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,2);
						// $m4_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,3);
						// $m4_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,4);
						// $m4_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,5);
						// $m4_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,6);
						// $m4_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m4_fdate,$m4_tdate,7);

						// $m5_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,1);
						// $m5_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,2);
						// $m5_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,3);
						// $m5_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,4);
						// $m5_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,5);
						// $m5_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,6);
						// $m5_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m5_fdate,$m5_tdate,7);

						$m6_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,1);
						$m6_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,2);
						$m6_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,3);
						$m6_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,4);
						$m6_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,5);
						$m6_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,6);
						$m6_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m6_fdate,$m6_tdate,7);

						$m7_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,1);
						$m7_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,2);
						$m7_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,3);
						$m7_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,4);
						$m7_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,5);
						$m7_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,6);
						$m7_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m7_fdate,$m7_tdate,7);

						$m8_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,1);
						$m8_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,2);
						$m8_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,3);
						$m8_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,4);
						$m8_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,5);
						$m8_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,6);
						$m8_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m8_fdate,$m8_tdate,7);

						$m9_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,1);
						$m9_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,2);
						$m9_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,3);
						$m9_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,4);
						$m9_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,5);
						$m9_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,6);
						$m9_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m9_fdate,$m9_tdate,7);

						// $m10_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,1);
						// $m10_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,2);
						// $m10_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,3);
						// $m10_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,4);
						// $m10_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,5);
						// $m10_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,6);
						// $m10_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m10_fdate,$m10_tdate,7);

						// $m11_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,1);
						// $m11_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,2);
						// $m11_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,3);
						// $m11_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,4);
						// $m11_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,5);
						// $m11_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,6);
						// $m11_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m11_fdate,$m11_tdate,7);

						// $m12_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,1);
						// $m12_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,2);
						// $m12_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,3);
						// $m12_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,4);
						// $m12_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,5);
						// $m12_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,6);
						// $m12_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m12_fdate,$m12_tdate,7);

						
						//$data=[0,(float)$m1_sunday,(float)$m1_monday,(float)$m1_tusday,(float)$m1_wednesday,(float)$m1_thursday,(float)$m1_friday,(float)$m1_saturday,0,(float)$m2_sunday,(float)$m2_monday,(float)$m2_tusday,(float)$m2_wednesday,(float)$m2_thursday,(float)$m2_friday,(float)$m2_saturday,0,(float)$m3_sunday,(float)$m3_monday,(float)$m3_tusday,(float)$m3_wednesday,(float)$m3_thursday,(float)$m3_friday,(float)$m3_saturday,0,(float)$m4_sunday,(float)$m4_monday,(float)$m4_tusday,(float)$m4_wednesday,(float)$m4_thursday,(float)$m4_friday,(float)$m4_saturday,0,(float)$m5_sunday,(float)$m5_monday,(float)$m5_tusday,(float)$m5_wednesday,(float)$m5_thursday,(float)$m5_friday,(float)$m5_saturday,0,(float)$m6_sunday,(float)$m6_monday,(float)$m6_tusday,(float)$m6_wednesday,(float)$m6_thursday,(float)$m6_friday,(float)$m6_saturday,0,(float)$m7_sunday,(float)$m7_monday,(float)$m7_tusday,(float)$m7_wednesday,(float)$m7_thursday,(float)$m7_friday,(float)$m7_saturday,(float)$m8_sunday,(float)$m8_monday,(float)$m8_tusday,(float)$m8_wednesday,(float)$m8_thursday,(float)$m8_friday,(float)$m8_saturday];
						$data=[0,(float)$m6_sunday,(float)$m6_monday,(float)$m6_tusday,(float)$m6_wednesday,(float)$m6_thursday,(float)$m6_friday,(float)$m6_saturday,0,(float)$m7_sunday,(float)$m7_monday,(float)$m7_tusday,(float)$m7_wednesday,(float)$m7_thursday,(float)$m7_friday,(float)$m7_saturday,0,(float)$m8_sunday,(float)$m8_monday,(float)$m8_tusday,(float)$m8_wednesday,(float)$m8_thursday,(float)$m8_friday,(float)$m8_saturday,0,(float)$m9_sunday,(float)$m9_monday,(float)$m9_tusday,(float)$m9_wednesday,(float)$m9_thursday,(float)$m9_friday,(float)$m9_saturday];
						
						
						
					
					
					
				
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['mdata']=$data;
				// $resdata['tero']['q1date']=$data;
				

		}
		

		//
		
//
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_weekday_report_terotam($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		$m1_fdate='2025-01-01';
		$m1_tdate='2025-12-31';


		//echo json_encode($days);die();
        // for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        // {
        //   array_push($datesarray, date("Y-m-d",$i1));  
        // }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		for ($i=0; $i < count($meter_list); $i++) {
			
					
			$m1_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,1);
			$m1_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,2);
			$m1_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,3);
			$m1_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,4);
			$m1_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,5);
			$m1_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,6);
			$m1_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$m1_fdate,$m1_tdate,7);
			$weekend=	round($m1_sunday+$m1_saturday,2);
			$weekdays=	round($m1_monday+$m1_tusday+$m1_wednesday+$m1_thursday+$m1_friday,2);

			
						
						$data=[(float)$m1_sunday,(float)$m1_monday,(float)$m1_tusday,(float)$m1_wednesday,(float)$m1_thursday,(float)$m1_friday,(float)$m1_saturday];
						//$data_wewd=[(float)$weekend,(float)$weekdays];
						
		     
						
					
					
					
				
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['mdata']=$data;
				$resdata['tero']['weekend']=$weekend;
				$resdata['tero']['weekdays']=$weekdays;
				// $resdata['tero']['q1date']=$data;
				

		}
		

		//
		
//
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_quarter_report_terotam($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		// $q1_fdate='2025-01-01';
		// $q1_tdate='2025-03-31';

		$q2_fdate='2025-04-01';
		$q2_tdate='2025-06-30';

		$q3_fdate='2025-07-01';
		$q3_tdate='2025-09-30';

		// $q3_fdate='2025-10-01';
		// $q3_tdate='2025-12-31';
		

		//echo json_encode($days);die();
        // for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        // {
        //   array_push($datesarray, date("Y-m-d",$i1));  
        // }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		for ($i=0; $i < count($meter_list); $i++) {
			
					
						// $q1_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,1);
						// $q1_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,2);
						// $q1_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,3);
						// $q1_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,4);
						// $q1_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,5);
						// $q1_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,6);
						// $q1_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q1_fdate,$q1_tdate,7);

						$q2_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,1);
						$q2_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,2);
						$q2_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,3);
						$q2_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,4);
						$q2_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,5);
						$q2_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,6);
						$q2_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q2_fdate,$q2_tdate,7);

						$q3_sunday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,1);
						$q3_monday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,2);
						$q3_tusday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,3);
						$q3_wednesday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,4);
						$q3_thursday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,5);
						$q3_friday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,6);
						$q3_saturday=$this->get_energy_consumption_weekday($meter_list[$i]['UtilityName'],$q3_fdate,$q3_tdate,7);

						
						$data=[0,(float)$q2_sunday,(float)$q2_monday,(float)$q2_tusday,(float)$q2_wednesday,(float)$q2_thursday,(float)$q2_friday,(float)$q2_saturday,0,(float)$q3_sunday,(float)$q3_monday,(float)$q3_tusday,(float)$q3_wednesday,(float)$q3_thursday,(float)$q3_friday,(float)$q3_saturday];
						
						
						
					
					
					
				
				$resdata['tero']['meter']=$meter_list[$i]['DashboardName'];
				$resdata['tero']['data']=$data;
				// $resdata['tero']['q1date']=$data;
				

		}
		

		//
		
//
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_current_report_terotam($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_terotam(2023000302);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['unicef'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_terotam('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
					$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
					$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND  `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
						
						
						
						
					}else{
						
						
					}
				}
			}
			$resdata['unicef'][$i]['c1_data']=$current1_data;
			$resdata['unicef'][$i]['c2_data']=$current2_data;
			$resdata['unicef'][$i]['c3_data']=$current3_data;

			
			
			 
		}

		//
		
//
		return $resdata;
	}

	

	
}