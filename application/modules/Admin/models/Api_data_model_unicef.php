<?php
class Api_data_model_unicef extends CI_Model{
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
	function get_energymeter_list_unicef($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices_new'); 
		$this->db->where('StationId',$station_id);
		$this->db->where('MeterName','Electricity'); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_energymeter_list_unicef_old($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices'); 
		$this->db->where('StationId',$station_id);
		$this->db->where('MeterName','Electricity'); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_energymeter_list_unicef1($station_id,$loop){
		
		$this->db->select('');
        $this->db->from('unicef_devices'); 
		$this->db->where('StationId',$station_id);
		$this->db->where('loop',$loop);
		$this->db->where('MeterName','Electricity'); 
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_energymeter_list_unicef_new($station_id,$loop){
		
		$this->db->select('');
        $this->db->from('unicef_devices_new'); 
		$this->db->where('StationId',$station_id);
		$this->db->where('loop',$loop);
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
	function check_voltage_data_unicef_old($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('voltage_report_tbl_unicef_old');
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
        $this->db->from('unicef_devices_new'); 
		$this->db->where('StationId',$station_id); 
		$this->db->where_in('ModelNo',array("EM6400NG","EM6436H"));
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_energymeter_list_cv_unicef_old($station_id){
		
		$this->db->select('');
        $this->db->from('unicef_devices'); 
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
	function get_hardwares_device_data_flowmeter_unicef_all($stn){
		
		$todayDate=date("Y-m-d");
		
		
		$table_name=$this->get_table_name_live($stn);
		//$todayDate="2021-09-06";
		
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			$weekday = date('Y-m-d',strtotime("-6 days"));
			$firstday= date('Y-m-d', strtotime("-30 days"));
			$lastday=date("Y-m-t", strtotime($todayDate));
	
			
			$queryconsutoday="SELECT round(SUM(Consumption),2) as cons FROM $table_name WHERE TxnDate = '".$todayDate."'  AND `LineConnected`='Water Flow'";
			
			// echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$todayday_consumption=round(($datacontoday[0]->cons)/1000,2);
			$yesterday_consumption=$this->check_water_data_unicef_all($yesterDay,$yesterDay);
			$month_consumption=$this->check_water_data_unicef_all($firstday,$yesterDay);

				$resdata['uncf_water'][0]['meter']="all";
				$resdata['uncf_water'][0]['todaycons']=$todayday_consumption;
				$resdata['uncf_water'][0]['yestcons']=$yesterday_consumption;
				$resdata['uncf_water'][0]['monthcons']=$month_consumption;
		
		
// echo json_encode($resdata);die();
		return $resdata;
	}
	function get_hardwares_device_data_flowmeter_unicef($meter,$stn){
		
		$todayDate=date("Y-m-d");
		
		
		$table_name=$this->get_table_name_live($stn);
		//$todayDate="2021-09-06";
		
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			$weekday = date('Y-m-d',strtotime("-6 days"));
			$firstday= date('Y-m-01', strtotime($todayDate));
			$lastday=date("Y-m-t", strtotime($todayDate));
	
			$earlier = new DateTime($firstday);
			$later = new DateTime($todayDate);
	
			$abs_diff = $later->diff($earlier)->format("%a")+1; //3
	
			$resdata['meter']=$meter;
			$queryconsutoday="SELECT round(SUM(Consumption),2) as cons FROM $table_name WHERE TxnDate = '".$todayDate."'  AND `LineConnected`='Water Flow' AND `LocationName`='".$meter."'";
			
			// echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$todayday_consumption=round(($datacontoday[0]->cons)/1000,2);
	
			$date_from = strtotime($firstday); 
			$date_to = strtotime($yesterDay); 
	
			
			$datesarray=array();
			
			for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
			{
			  array_push($datesarray, date("Y-m-d",$i1));  
			}
			// echo json_encode($datesarray);die();
			$month_consumption_without_today=0;
			if(count($datesarray)==0){
				
				$res[0]['con']=(float)$todayday_consumption;
				$res[0]['date']=$todayDate;
				//$month_consumption_without_today+=round($res[$k]['con']/1000,2);
			}else{
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->check_water_data_unicef("water",$meter,$datesarray[$k]);
					
				$res[$k]['con']=(float)round($check[0]['consumption']/1000,2);
				$res[$k]['date']=$datesarray[$k];
				$month_consumption_without_today+=round($res[$k]['con']/1000,2);
				}
			}

			
				$yest_check=$this->check_water_data_unicef("water",$meter,$yesterDay);
				
				$yesterday_consumption=(float)round($yest_check[0]['consumption']/1000,2);
			
				$month_consumption_with_today=$month_consumption_without_today+$todayday_consumption;
				$resdata['monthly_data']=$res;
				$resdata['todayconsumption']=$todayday_consumption;
				$resdata['yesterdayconsumption']=$yesterday_consumption;
				$resdata['monthly_consumption']=$month_consumption_with_today;
				$resdata['weeklyavg']=round(($month_consumption_with_today/$abs_diff),2);
		
		
// echo json_encode($resdata);die();
		return $resdata;
	}
	function get_hardwares_device_data_energy_meters_unicef($data){
		// echo json_encode($data);die();
		$station_id=$data['station_id'];
		
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		// echo $table_name;die();
		$power=$this->get_energymeter_list_unicef_new(2024000527,'power');
		$water=$this->get_energymeter_list_unicef_new(2024000527,'water');
		$hvac=$this->get_energymeter_list_unicef_new(2024000527,'hvac');
		$light=$this->get_energymeter_list_unicef_new(2024000527,'light');
		$fire=$this->get_energymeter_list_unicef_new(2024000527,'fire');
		// echo json_encode($meter_list);die();
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
				 
				if($power[$i]['ModelNo']=='EM6400NG' || $power[$i]['ModelNo']=='EM6436H'){
					
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					// echo $enquery_current1;die();
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();

				 $enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$power[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['uncf'][$i]['pf']="NA";
				}else{
					$resdata['uncf'][$i]['pf']=$pfdata[0]['cons'];
				}
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
				if(is_null($v1_data[0]['cons'])){
					$resdata['uncf'][$i]['voltage1']="NA";
				}else{
					$resdata['uncf'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['uncf'][$i]['voltage2']="NA";
				}else{
					$resdata['uncf'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['uncf'][$i]['voltage3']="NA";
				}else{
					$resdata['uncf'][$i]['voltage3']=$v3_data[0]['cons'];
				}
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
				
				 $check=$this->chech_energy_consumotion_unicef($power[$i]['UtilityName'],$yesterDay);
				 
				 $yest_consumption=(float)$check[0]['consumption'];
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_unicef($power[$i]['UtilityName'],$firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['uncf'][$i]['meter']=$power[$i]['DashboardName'];
				$resdata['uncf'][$i]['todaycons']=round($today_cons,2);
				$resdata['uncf'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['uncf'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['uncf'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['uncf'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);	
				
		}
		for ($i=0; $i < count($water); $i++) {
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();
				 
				if($water[$i]['ModelNo']=='EM6400NG' || $water[$i]['ModelNo']=='EM6436H'){
					
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					// echo $enquery_current1;die();
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();

				 $enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$water[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['water'][$i]['pf']="NA";
				}else{
					$resdata['water'][$i]['pf']=$pfdata[0]['cons'];
				}
				if(is_null($c1_data[0]['cons'])){
					$resdata['water'][$i]['current1']="NA";
				}else{
					$resdata['water'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['water'][$i]['current2']="NA";
				}else{
					$resdata['water'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['water'][$i]['current3']="NA";
				}else{
					$resdata['water'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['water'][$i]['voltage1']="NA";
				}else{
					$resdata['water'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['water'][$i]['voltage2']="NA";
				}else{
					$resdata['water'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['water'][$i]['voltage3']="NA";
				}else{
					$resdata['water'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				$resdata['water'][$i]['model']=$water[$i]['ModelNo'];
				}else{
					$resdata['water'][$i]['pf']="NA";
					$resdata['water'][$i]['model']=$water[$i]['ModelNo'];
					$resdata['water'][$i]['current1']="NA";
					$resdata['water'][$i]['current2']="NA";
					$resdata['water'][$i]['current3']="NA";
					$resdata['water'][$i]['voltage1']="NA";
					$resdata['water'][$i]['voltage2']="NA";
					$resdata['water'][$i]['voltage3']="NA";

				}
				
				 $check=$this->chech_energy_consumotion_unicef($water[$i]['UtilityName'],$yesterDay);
				 
				 $yest_consumption=(float)$check[0]['consumption'];
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_unicef($water[$i]['UtilityName'],$firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['water'][$i]['meter']=$water[$i]['DashboardName'];
				$resdata['water'][$i]['todaycons']=round($today_cons,2);
				$resdata['water'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['water'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['water'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['water'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);	
				
		}
		for ($i=0; $i < count($hvac); $i++) {
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();
				 
				if($hvac[$i]['ModelNo']=='EM6400NG' || $hvac[$i]['ModelNo']=='EM6436H'){
					
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					// echo $enquery_current1;die();
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();

				 $enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$hvac[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['hvac'][$i]['pf']="NA";
				}else{
					$resdata['hvac'][$i]['pf']=$pfdata[0]['cons'];
				}
				if(is_null($c1_data[0]['cons'])){
					$resdata['hvac'][$i]['current1']="NA";
				}else{
					$resdata['hvac'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['hvac'][$i]['current2']="NA";
				}else{
					$resdata['hvac'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['hvac'][$i]['current3']="NA";
				}else{
					$resdata['hvac'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['hvac'][$i]['voltage1']="NA";
				}else{
					$resdata['hvac'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['hvac'][$i]['voltage2']="NA";
				}else{
					$resdata['hvac'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['hvac'][$i]['voltage3']="NA";
				}else{
					$resdata['hvac'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				$resdata['hvac'][$i]['model']=$hvac[$i]['ModelNo'];
				}else{
					$resdata['hvac'][$i]['pf']="NA";
					$resdata['hvac'][$i]['model']=$hvac[$i]['ModelNo'];
					$resdata['hvac'][$i]['current1']="NA";
					$resdata['hvac'][$i]['current2']="NA";
					$resdata['hvac'][$i]['current3']="NA";
					$resdata['hvac'][$i]['voltage1']="NA";
					$resdata['hvac'][$i]['voltage2']="NA";
					$resdata['hvac'][$i]['voltage3']="NA";

				}
				
				 $check=$this->chech_energy_consumotion_unicef($hvac[$i]['UtilityName'],$yesterDay);
				 
				 $yest_consumption=(float)$check[0]['consumption'];
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_unicef($hvac[$i]['UtilityName'],$firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['hvac'][$i]['meter']=$hvac[$i]['DashboardName'];
				$resdata['hvac'][$i]['todaycons']=round($today_cons,2);
				$resdata['hvac'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['hvac'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['hvac'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['hvac'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);	
				
		}
		
		for ($i=0; $i < count($light); $i++) {
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();
				 
				if($light[$i]['ModelNo']=='EM6400NG' || $light[$i]['ModelNo']=='EM6436H'){
					
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					// echo $enquery_current1;die();
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();

				 $enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$light[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['light'][$i]['pf']="NA";
				}else{
					$resdata['light'][$i]['pf']=$pfdata[0]['cons'];
				}
				if(is_null($c1_data[0]['cons'])){
					$resdata['light'][$i]['current1']="NA";
				}else{
					$resdata['light'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['light'][$i]['current2']="NA";
				}else{
					$resdata['light'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['light'][$i]['current3']="NA";
				}else{
					$resdata['light'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['light'][$i]['voltage1']="NA";
				}else{
					$resdata['light'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['light'][$i]['voltage2']="NA";
				}else{
					$resdata['light'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['light'][$i]['voltage3']="NA";
				}else{
					$resdata['light'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				$resdata['light'][$i]['model']=$light[$i]['ModelNo'];
				}else{
					$resdata['light'][$i]['pf']="NA";
					$resdata['light'][$i]['model']=$light[$i]['ModelNo'];
					$resdata['light'][$i]['current1']="NA";
					$resdata['light'][$i]['current2']="NA";
					$resdata['light'][$i]['current3']="NA";
					$resdata['light'][$i]['voltage1']="NA";
					$resdata['light'][$i]['voltage2']="NA";
					$resdata['light'][$i]['voltage3']="NA";

				}
				
				 $check=$this->chech_energy_consumotion_unicef($light[$i]['UtilityName'],$yesterDay);
				 
				 $yest_consumption=(float)$check[0]['consumption'];
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_unicef($light[$i]['UtilityName'],$firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['light'][$i]['meter']=$light[$i]['DashboardName'];
				$resdata['light'][$i]['todaycons']=round($today_cons,2);
				$resdata['light'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['light'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['light'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['light'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);	
				
		}

		for ($i=0; $i < count($fire); $i++) {
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();
				 
				if($fire[$i]['ModelNo']=='EM6400NG' || $fire[$i]['ModelNo']=='EM6436H'){
					
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					// echo $enquery_current1;die();
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();

				 $enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$fire[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['fire'][$i]['pf']="NA";
				}else{
					$resdata['fire'][$i]['pf']=$pfdata[0]['cons'];
				}
				if(is_null($c1_data[0]['cons'])){
					$resdata['fire'][$i]['current1']="NA";
				}else{
					$resdata['fire'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['fire'][$i]['current2']="NA";
				}else{
					$resdata['fire'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['fire'][$i]['current3']="NA";
				}else{
					$resdata['fire'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['fire'][$i]['voltage1']="NA";
				}else{
					$resdata['fire'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['fire'][$i]['voltage2']="NA";
				}else{
					$resdata['fire'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['fire'][$i]['voltage3']="NA";
				}else{
					$resdata['fire'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				$resdata['fire'][$i]['model']=$fire[$i]['ModelNo'];
				}else{
					$resdata['fire'][$i]['pf']="NA";
					$resdata['fire'][$i]['model']=$fire[$i]['ModelNo'];
					$resdata['fire'][$i]['current1']="NA";
					$resdata['fire'][$i]['current2']="NA";
					$resdata['fire'][$i]['current3']="NA";
					$resdata['fire'][$i]['voltage1']="NA";
					$resdata['fire'][$i]['voltage2']="NA";
					$resdata['fire'][$i]['voltage3']="NA";

				}
				
				 $check=$this->chech_energy_consumotion_unicef($fire[$i]['UtilityName'],$yesterDay);
				 
				 $yest_consumption=(float)$check[0]['consumption'];
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_unicef($fire[$i]['UtilityName'],$firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['fire'][$i]['meter']=$fire[$i]['DashboardName'];
				$resdata['fire'][$i]['todaycons']=round($today_cons,2);
				$resdata['fire'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['fire'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['fire'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['fire'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);	
				
		}
		
		// echo json_encode($resdata);die();
		return $resdata;

	}
	function get_hardwares_device_data_energy_meters_unicef_all($data){
		// echo json_encode($data);die();
		$station_id=$data['station_id'];
		
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		//$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		// echo $table_name;die();
		//$power=$this->get_energymeter_list_unicef1(2024000527,'power');
		//$water=$this->get_energymeter_list_unicef1(2024000527,'water');
		//$hvac=$this->get_energymeter_list_unicef1(2024000527,'hvac');
		//$light=$this->get_energymeter_list_unicef1(2024000527,'light');
		//$fire=$this->get_energymeter_list_unicef1(2024000527,'fire');
		// echo json_encode($meter_list);die();
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		//$yesterDay = "2021-10-18";
		//$weekday = date('Y-m-d',strtotime("-7 days"));
		$firstday= date('Y-m-d', strtotime("-30 days"));
		
		
		
				$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE  `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			// echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				// echo $today_cons;die();
				
				 
				$yest_consumption=$this->chech_energy_consumotion_all($yesterDay,$yesterDay);;
				// echo $yest_consumption;die();
				$monthly_cons_without_today=$this->chech_energy_consumotion_all($firstday,$yesterDay);
				// echo $enquery;die();
				$resdata['uncf_all'][0]['meter']="all";
				$resdata['uncf_all'][0]['todaycons']=round($today_cons,2);
				$resdata['uncf_all'][0]['yestcons']=round($yest_consumption,2);
				$resdata['uncf_all'][0]['monthcons']=round($monthly_cons_without_today,2);
				
		
		
		
		// echo json_encode($resdata);die();
		return $resdata;

	}
	function chech_energy_consumotion_all($from,$to){
		$this->db->select('sum(consumption) as cons');
        $this->db->from('energy_consumption_report_tbl_unicef');   
		$where = '(report_date between "'.$from.'" and "'.$to.'")';     
		// $this->db->where('location_name',$location_name);
		$this->db->where($where);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		//  echo "ll:".$this->db->last_query();die();  
		 //(float)$month_check[0]['consumption']
		 //$where = '(report_date between "'.$date.'" and "'.$date.'")';
     
        return (float)$res[0]['cons'];
	}
	function chech_energy_consumotion_month_unicef($location_name,$from,$to){
		$this->db->select('sum(consumption) as cons');
        $this->db->from('energy_consumption_report_tbl_unicef');   
		$where = '(report_date between "'.$from.'" and "'.$to.'")';     
		$this->db->where('location_name',$location_name);
		$this->db->where($where);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();  (float)$month_check[0]['consumption']
		 //$where = '(report_date between "'.$date.'" and "'.$date.'")';
     
        return (float)$res[0]['cons'];
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
	function chech_energy_consumotion_unicef_old($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_unicef_old');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_report_unicef_old($data,$fromdate,$todate,$sort){
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
		$meter_list=$this->get_energymeter_list_unicef_old(2024000527);
		
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							echo date('Y-m-d');die();
							$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
							$resdata['unicef'][$i][$k]['sort']=$sort;
							$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
							
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
									$resdata1[$i1]['consumption']=round((float)$datacontoday[0]->cons,2);
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unicef'][$i][$k]['data']=$resdata1;
						}else{
							// echo date('Y-m-d');die();
								$check=$this->chech_energy_consumotion_unicef_hourly_old($meter_list[$i]['UtilityName'],$datesarray[$k]);
							
								$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
								$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
								$resdata['unicef'][$i][$k]['from']='db4';
								$resdata['unicef'][$i][$k]['sort']=$sort;
								$resdata['unicef'][$i][$k]['data']=unserialize($check[0]['consumption']);
					

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_unicef_old($meter_list[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unicef'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unicef'][$i][$k]['consumption']=round($check[0]['consumption'],2);
				
								$resdata['unicef'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unicef'][$i][$k]['from']='db';
								$resdata['unicef'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unicef'][$i][$k]['consumption']=round((float)$datacontoday[0]->cons,2);
				
								$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
								$resdata['unicef'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
								$resdata['unicef'][$i][$k]['consumption']=0;
				
								$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
								$resdata['unicef'][$i][$k]['count']=count($datesarray);
							}
						}
					}
					
					
					
				} 
		}
				
	if($sort==2){
	$rs=[];
	for ($t=0; $t < count($resdata['unicef']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
		
			$rs['unicef'][$t][$i]['meter']=$resdata['unicef'][$t][0]['meter'];
			$rs['unicef'][$t][$i]['sort']=$resdata['unicef'][$t][0]['sort'];
			$rs['unicef'][$t][$i]['date']=$resdata['unicef'][$t][0]['data'][$i]['date'];
			for ($n=0; $n <count($resdata['unicef'][$t]) ; $n++) { 
				$rt[$n]['date']=$resdata['unicef'][$t][$n]['date'];
				$rt[$n]['consumption']=$resdata['unicef'][$t][$n]['data'][$i]['consumption'];
			}
			$rs['unicef'][$t][$i]['data']=$rt;
		}
	}
	
	
    // echo json_encode($resdata['unicef'][0]);die();
	return $rs;
	}else{
		return $resdata;
	}
		
	}
	function get_hardwares_device_data_energymeter_report_unicef($data,$fromdate,$todate,$sort){
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
		$meter_list=$this->get_energymeter_list_unicef(2024000527);
		
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
							$resdata['unicef'][$i][$k]['sort']=$sort;
							$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
							
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
									$resdata1[$i1]['consumption']=round((float)$datacontoday[0]->cons,2);
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unicef'][$i][$k]['data']=$resdata1;
						}else{

								$check=$this->chech_energy_consumotion_unicef_hourly($meter_list[$i]['UtilityName'],$datesarray[$k]);
							
								$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
								$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
								$resdata['unicef'][$i][$k]['from']='db4';
								$resdata['unicef'][$i][$k]['sort']=$sort;
								$resdata['unicef'][$i][$k]['data']=unserialize($check[0]['consumption']);
					

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_unicef($meter_list[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unicef'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unicef'][$i][$k]['consumption']=round($check[0]['consumption'],2);
				
								$resdata['unicef'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unicef'][$i][$k]['from']='db';
								$resdata['unicef'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unicef'][$i][$k]['consumption']=round((float)$datacontoday[0]->cons,2);
				
								$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
								$resdata['unicef'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unicef'][$i][$k]['meter']=$meter_list[$i]['UtilityName'];
								$resdata['unicef'][$i][$k]['consumption']=0;
				
								$resdata['unicef'][$i][$k]['date']=$datesarray[$k];
								$resdata['unicef'][$i][$k]['count']=count($datesarray);
							}
						}
					}
					
					
					
				} 
		}
				
	if($sort==2){
	$rs=[];
	for ($t=0; $t < count($resdata['unicef']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
		
			$rs['unicef'][$t][$i]['meter']=$resdata['unicef'][$t][0]['meter'];
			$rs['unicef'][$t][$i]['sort']=$resdata['unicef'][$t][0]['sort'];
			$rs['unicef'][$t][$i]['date']=$resdata['unicef'][$t][0]['data'][$i]['date'];
			for ($n=0; $n <count($resdata['unicef'][$t]) ; $n++) { 
				$rt[$n]['date']=$resdata['unicef'][$t][$n]['date'];
				$rt[$n]['consumption']=$resdata['unicef'][$t][$n]['data'][$i]['consumption'];
			}
			$rs['unicef'][$t][$i]['data']=$rt;
		}
	}
	
	
    // echo json_encode($resdata['unicef'][0]);die();
	return $rs;
	}else{
		return $resdata;
	}
		
	}
	function chech_energy_consumotion_unicef_hourly_old($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_unicef_hourly_old');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		//  echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_energy_consumotion_unicef_hourly($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_unicef_hourly');        
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
	function check_current_data_unicef_old($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl_unicef_old');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_energymeter_current_report_unicef($data,$fromdate,$todate){
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
		$meter_list=$this->get_energymeter_list_cv_unicef(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['unicef'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_unicef('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
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
	function get_hardwares_device_data_energymeter_current_report_unicef_old($data,$fromdate,$todate){
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
		$meter_list=$this->get_energymeter_list_cv_unicef_old(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['unicef'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_unicef_old('current',$meter_list[$i]['UtilityName'],$datesarray[$t]);
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
	function get_hardwares_device_data_energymeter_voltage_report_unicef($data,$fromdate,$todate){
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
		
		$meter_list=$this->get_energymeter_list_cv_unicef(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
			$resdata['unicef'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_unicef('voltage',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND  `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
						
						
						
						
					}else{
						
						
					}
				}
			}
			$resdata['unicef'][$i]['v1_data']=$voltage1_data;
			$resdata['unicef'][$i]['v2_data']=$voltage2_data;
			$resdata['unicef'][$i]['v3_data']=$voltage3_data;

			
			
			 
		}

		//
			

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_voltage_report_unicef_old($data,$fromdate,$todate){
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
		
		$meter_list=$this->get_energymeter_list_cv_unicef_old(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
			$resdata['unicef'][$i]['meter']=$meter_list[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_unicef_old('voltage',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND  `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
						
						
						
						
					}else{
						
						
					}
				}
			}
			$resdata['unicef'][$i]['v1_data']=$voltage1_data;
			$resdata['unicef'][$i]['v2_data']=$voltage2_data;
			$resdata['unicef'][$i]['v3_data']=$voltage3_data;

			
			
			 
		}

		//
			

		return $resdata;
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
	function check_pf_data_unicef_old($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('pf_report_tbl_unicef_old');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function check_watermeter_data_unicef($type,$location_name,$date)
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
	function get_hardwares_device_data_power_factor_report_unicef_old($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_cv_unicef_old(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$powerfactor_data=[];
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_pf_data_unicef_old('PF',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
					}else{
						
					}
				}
			}
			$resdata['unicef'][$i]['pf_data']=$powerfactor_data;

			
			
			 
		}


		return $resdata;
	}
	function get_hardwares_device_data_power_factor_report_unicef($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list_cv_unicef(2024000527);
		
		for ($i=0; $i < count($meter_list); $i++) {
			
			$powerfactor_data=[];
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_pf_data_unicef('PF',$meter_list[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
					}else{
						
					}
				}
			}
			$resdata['unicef'][$i]['pf_data']=$powerfactor_data;

			
			
			 
		}


		return $resdata;
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
	function check_water_data_unicef_all($from,$to)
	{
		$this->db->select('sum(consumption) as cons');
        $this->db->from('watermeter_report_tbl_unicef');  
		$where = 'report_date between "'.$from.'" and "'.$to.'"';     
		// $this->db->where('location_name',$location_name);
		$this->db->where($where);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		//  echo "ll:".$this->db->last_query();die();       
        return (float)round($res[0]['cons']/1000,2);
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
	
	function get_hardwares_device_data_flowmeter_report_unicef($data,$fromdate,$todate){
		
		$station_id=$data['station_id'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
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
					$resdata['consolidate'][$i][$t]['meter']=$meter_list[$i]['MeterName'];				
					$resdata['consolidate'][$i][$t]['consumption']=(float)round($check[0]['consumption']/1000,2);	
					$resdata['consolidate'][$i][$t]['date']=$check[0]['report_date'];	
					$resdata['consolidate'][$i][$t]['sno']=$t+1;
						}else{
							
							if($datesarray[$t]>=date('Y-m-d')){
								$resdata['consolidate'][$i][$t]['meter']=$meter_list[$i]['MeterName'];
		
								$waterm="SELECT round(SUM(Consumption),2) as cons FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Water Flow' AND `LocationName`='".$meter_list[$i]['MeterName']."'";
								$wm = $this->db->query($waterm)->result_array();
								$resdata['consolidate'][$i][$t]['consumption']=(float)round($wm[0]['cons']/1000,2);	
								$resdata['consolidate'][$i][$t]['date']=$datesarray[$t];	
								$resdata['consolidate'][$i][$t]['sno']=$t+1;

							}else{
								
								$resdata['consolidate'][$i][$t]['meter']=$meter_list[$i]['MeterName'];				
								$resdata['consolidate'][$i][$t]['consumption']=0;	
								$resdata['consolidate'][$i][$t]['date']=$datesarray[$t];	
								$resdata['consolidate'][$i][$t]['sno']=$t+1;
							}
						}
			}
			
			 
		}
		return $resdata;
	}

	
}