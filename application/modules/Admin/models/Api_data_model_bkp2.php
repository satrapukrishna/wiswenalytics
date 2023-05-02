<?php
class Api_data_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	
	function get_categories($cat_id){
		$this->db->select('');
        $this->db->from('hardware_category');     
        $this->db->where('status',1);     
		$this->db->where('category_id', $cat_id);
         //$this->db->where('created_by',$this->session->userdata('user_id'));       
         $this->db->order_by('category_name');
        $res = $this->db->get()->result_array();  
		//echo $this->db->last_query();exit;     
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
	function get_fire_categories($cat_id){
		$this->db->select('');
        $this->db->from('hardware_category'); 
		if ($cat_id != ''){
            $this->db->where('category_id', $cat_id);
        }		
        $this->db->where('status',1);     
		
        // $this->db->where('created_by',$this->session->userdata('user_id'));       
        //$this->db->order_by('category_name');
        $res = $this->db->get()->result_array();       
        return $res;
	}
	function get_devices($category){
		$this->db->select('');
        $this->db->from('hardware_device');        
        if ($category != ''){
            $this->db->where('category_id', $category);
        }
		// $this->db->where('created_by',$this->session->userdata('user_id'));  
		$this->db->where('status',1);
        $this->db->order_by('device_name');
        $res = $this->db->get()->result_array();               
        return $res;
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
	function get_devices_list_all($cat_id,$cat_id2){
		$this->db->select('hardware_device');
        $this->db->from('hardware');        
        
		$this->db->where('client_id',$this->session->userdata('created_by'));  
		$this->db->where('status',1);
		
		$this->db->where_in('hardware_category',array($cat_id,$cat_id2));
		//$this->db->where('hardware_category',$cat_id2);
        $this->db->group_by('hardware_device');
        $res = $this->db->get()->result_array();        
		// echo $this->db->last_query();die();       
        return $res;
	}
	
	function get_hardwares($category,$device){
		$this->db->select('');
        $this->db->from('hardware');        
        if ($category != ''){
            $this->db->where('hardware_category', $category);
        }
		if ($device != ''){
            $this->db->where('hardware_device', $device);
        }
		// if($this->session->userdata('role')=='admins'){
		// $this->db->where('client_id',$this->session->userdata('user_id'));
		// }elseif($this->session->userdata('role')=='employee'){
			 $this->db->where('client_id',$this->session->userdata('created_by'));
		// }
		$this->db->where('status', 1);
        $this->db->order_by('hardware_id','desc');
        $res = $this->db->get();             
        return $res;
	}
	
	function get_firepumpdata($device,$type){
		$this->db->select('');
        $this->db->from('firepump');        
        
		if ($device != ''){
            $this->db->where('hardware_device', $device);
        }
		if ($type != ''){
            $this->db->where('pump_type', $type);
        }
		
		// $this->db->where('pump_type','Pumps');
		$this->db->where('client_id',$this->session->userdata('created_by'));
		
		$this->db->where('status', 1);
        // $this->db->order_by('hardware_id','desc');
        $res = $this->db->get();  
		// echo $this->db->last_query();exit;
        return $res;
	}
	function get_hardwares_device_list(){
		$this->db->select('h.*');
        $this->db->from('hardware as h');        
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		// if($this->session->userdata('role')=='admins'){
		// $this->db->where('client_id',$this->session->userdata('user_id'));
		// }elseif($this->session->userdata('role')=='employee'){
			 $this->db->where('client_id',$this->session->userdata('created_by'));
		// } 
		
		$this->db->where('h.hardware_device!=',3);  
		$this->db->where('h.status',1);	  
        $this->db->group_by('h.hardware_device');
        $res = $this->db->get()->result_array();  
		
        return $res;
	}
	
	//function get_hardwares_device_list1($data){
		// foreach($data as $rs){
		// 	$item['device_id'][]=$rr['hardware_device'];
		// 	$h=$this->Api_data_model->get_hardwares($rs['hardware_category'],$rs['hardware_device']);
		// 	//$res->ttl_rows = $h->num_rows();
		// 	$item['device_count'][$rs['hardware_device']]=$h;
		// }
		// $this->db->select('h.*');
        // $this->db->from('hardware as h');        
		// $this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		// // if($this->session->userdata('role')=='admins'){
		// // $this->db->where('client_id',$this->session->userdata('user_id'));
		// // }elseif($this->session->userdata('role')=='employee'){
		// 	 $this->db->where('client_id',$this->session->userdata('created_by'));
		// // } 
		
		// $this->db->where('h.hardware_device!=',3);  
		// $this->db->where('h.status',1);	  
        // $this->db->group_by('h.hardware_device');
        // $res = $this->db->get()->result_array();  
		
        //return $item;
	//}
	///SLIDER ITEM COUNT 
	/*function get_hardwares_device_list(){
		$this->db->select('hardware_device,hardware_category');
        $this->db->from('hardware');        
       
		$this->db->where('client_id',$this->session->userdata('user_id'));  
		$this->db->where('hardware_device!=',3);  
        $this->db->group_by('hardware_device');
        $res = $this->db->get();  
		
		$item=array();
        foreach($res->result_array() as $rr){
			$item['device_id'][]=$rr['hardware_device'];
			$h=$this->Api_data_model->get_hardwares($rr['hardware_category'],$rr['hardware_device']);
			$res->ttl_rows = $h->num_rows();
			// $item['device_id']=$h->num_rows();
			$item['device_count'][$rr['hardware_device']]=$h->num_rows();
		}
		// echo "<pre>";print_r($items);exit;

        return $item;
	}*/
	function get_hardwares_device_list_all(){

	}
	function graph_data($name,$date,$db_table){
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
			$queryD = "SELECT SUM(Consumption) as run  FROM $db_table where UtilityName='".$name."'  AND LineConnected='DG_Running_Time' AND TxnDate='".$datesarray[$k]."'   order by TxnTime";
			$data1D = $this->db->query($queryD)->result();
			$fulldata[$k]['time']=$datesarray[$k];
			$fulldata[$k]['meter']=$name;
			$fulldata[$k]['runninghrs']=(int)$data1D[0]->run;
		}
		// for ($i=0; $i < 24; $i++) 
        //   {          
        //     //$diff=0;
        //     if($i>9)
        //     {
        //       $from =  $i.":00:00";
        //       $to =  ($i+1).":00:00";     
        //     }
        //     else
        //     {
        //       $from =  "0".$i.":00:00";
        //       $to =  "0".($i+1).":00:00"; 
        //     }

        //     $queryD = "SELECT SUM(Consumption) as run  FROM hardware_station_consumption_data_lonavala where UtilityName='".$name."'  AND LineConnected='DG_Running_Time' AND TxnDate='".$date."'   AND TxnTime BETWEEN '".$from."' AND '".$to."' order by TxnTime";
  
        //     $data1D = $this->db->query($queryD)->result();
		// 	 //echo $this->db->last_query();exit;
        //     $fulldata[$i]['time']=$to;
		// 	$fulldata[$i]['meter']=$name;
		// 	$fulldata[$i]['runninghrs']=(int)$data1D[0]->run;           
                                
        //   }
		  
		  return $fulldata;

	}
	function check_data($name,$table_name){
		$this->db->select('');
        $this->db->from($table_name);        
        $this->db->where('UtilityName', $name);
		
		 $res = $this->db->get();             
        return $res->num_rows();
	}
	function check_hardware_data($name,$db_table){
		$this->db->select('');
        $this->db->from($db_table);        
        $this->db->where('UtilityName', $name);
		
		 $res = $this->db->get();             
        return $res->num_rows();
	}
	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%h hours %i minutes');
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
	
	function get_hardwares_device_data_borewell($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$LocationName=$data['LocationName'];
		$utilityName=$data['UtilityName'];
		$dashboardName=$data['dashboard_name'];
		$todayDate=date("Y-m-d");
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=100;
		}
		
		$table_name=$this->get_table_name($station_id);
		//$todayDate="2021-09-06";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$weekday = date('Y-m-d',strtotime("-6 days"));
		$firstday= date('Y-m-01', strtotime($todayDate));
		$earlier = new DateTime($firstday);
		$later = new DateTime($todayDate);

		$abs_diff = $later->diff($earlier)->format("%a")+1; //3

			$resdata['meter']=$dashboardName;
			$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
			// echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result_array();
			//echo json_encode($datacontoday[0]);die();
			// $todayrun=0;
			// 	for ($i=0; $i < count($datacontoday); $i++) { 
			// 		if($datacontoday[$i]['secs']<0){
			// 			$todayrun+= 8*60;
			// 		}else{
			// 			$todayrun+= $datacontoday[$i]['secs'];
			// 		}
					
			// 	}

			$queryconsuyest="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
			// echo $queryconsuyest;die();
			$datacontoyest = $this->db->query($queryconsuyest)->result_array();
			//echo json_encode($datacontoday[0]);die();
			// $yestrun=0;
			// 	for ($i=0; $i < count($datacontoyest); $i++) { 

			// 		if($datacontoyest[$i]['secs']<0){
			// 		$yestrun+= 8*60;
			// 		}else{
			// 			$yestrun+= $datacontoyest[$i]['secs'];
			// 		}
			// 	}


				$queryconsumonth="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate BETWEEN '".$firstday."' AND '".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
				//echo $queryconsumonth;die();
			// echo $queryconsumonth;die();
			$dataconmonth = $this->db->query($queryconsumonth)->result_array();
			//echo $queryconsumonth;die();
			// $monthrun=0;
			// 	for ($i=0; $i < count($dataconmonth); $i++) { 
			// 		if($dataconmonth[$i]['secs']<0){
			// 			$monthrun+= 8*60;
			// 		}else{
			// 			$monthrun+= $dataconmonth[$i]['secs'];
			// 		}
					
			// 	}

				$today_percent15=$datacontoday[0]['secs']*0.15;
				$yest_percent15=$datacontoyest[0]['secs']*0.15;
				$month_percent15=$dataconmonth[0]['secs']*0.15;
			$resdata['todayconsumption']=$this->secondsToTime(round($datacontoday[0]['secs']-$today_percent15));
			;
			$resdata['yesterdayconsumption']=$this->secondsToTime(round($datacontoyest[0]['secs']-$yest_percent15));
			$resdata['monthly_consumption']=$this->secondsToTime(round(($dataconmonth[0]['secs']-$month_percent15)/$abs_diff));//gmdate("H:i:s", $monthrun);
		//$resdata['weeklyavg']=gmdate("H:i:s", $monthrun/$abs_diff);
			$resdata['status']=1;
		

		return $resdata;
	}
	function get_hardwares_device_data_flowmeter($data){
		//print_r($data);die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$LocationName=$data['LocationName'];
		$utilityName=$data['UtilityName'];
		$dashboardName=$data['dashboard_name'];
		$todayDate=date("Y-m-d");
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=1;
		}
		
		$table_name=$this->get_table_name($station_id);
		//$todayDate="2021-09-06";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$weekday = date('Y-m-d',strtotime("-6 days"));
		$firstday= date('Y-m-01', strtotime($todayDate));
		$lastday=date("Y-m-t", strtotime($todayDate));

		$earlier = new DateTime($firstday);
		$later = new DateTime($todayDate);

		$abs_diff = $later->diff($earlier)->format("%a")+1; //3

		// $check=$this->Api_data_model->check_hardware_data($utilityName,$table_name);
		// if($check){
			$resdata['meter']=$dashboardName;
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		
		$datacontoday = $this->db->query($queryconsutoday)->result();
		

		$queryconsuyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";

		$queryconsuweek="SELECT round(SUM(Consumption)/7) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate between '".$weekday."' AND '".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";

		$queryconsumonth="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate between '".$firstday."' AND '".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		
		//$querycumulative="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND  LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		//echo $queryconsuweek;die();
		$dataconyest = $this->db->query($queryconsuyest)->result();
		$dataconweek = $this->db->query($queryconsuweek)->result();
		$dataconmonth = $this->db->query($queryconsumonth)->result();

		//$datacumm = $this->db->query($querycumulative)->result();

		$resdata['todayconsumption']=round(($datacontoday[0]->cons*$multipier)/1000,2);
		$resdata['yesterdayconsumption']=round(($dataconyest[0]->cons*$multipier)/1000,2);
		$resdata['monthly_consumption']=round(($dataconmonth[0]->cons*$multipier)/1000,2);
		//$resdata['cummulative']=round(($datacumm[0]->cons*$multipier)/1000,2);
		$resdata['weeklyavg']=round((($dataconmonth[0]->cons*$multipier)/1000)/$abs_diff,2);
		$resdata['status']=1;

		$date_from = strtotime($firstday); 
        $date_to = strtotime($yesterDay); 

		
        $datesarray=array();
		
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		for ($k=0; $k < count($datesarray); $k++)
			{ 
				$queryc="SELECT round((SUM(Consumption)/1000)*$multipier) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		
				$datac = $this->db->query($queryc)->result_array();
				if($datac[0]['cons']==0){
					$res[$k]['con']=null;
				}else{
					$res[$k]['con']=$datac[0]['cons'];
				}
				
				$res[$k]['date']=$datesarray[$k];
				
			}
			
			$resdata['monthly_data']=$res;

		return $resdata;
	}
	function get_hardwares_device_data_flowmeter_static($data){
		//print_r($data);die();
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$LocationName=$data['LocationName'];
		$utilityName=$data['UtilityName'];
		$dashboardName=$data['dashboard_name'];
		//$todayDate=date("Y-m-d");
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=1;
		}
		
		$table_name=$this->get_table_name($station_id);
		$todayDate="2021-10-14";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$weekday = date('Y-m-d',strtotime("-6 days"));
		
			$resdata['meter']=$dashboardName;
			if($dashboardName=="TPI(OUT)"){
				$resdata['todayconsumption']=60;
				$resdata['yesterdayconsumption']=55;
				$resdata['weeklyavg']=57;
				$resdata['status']=1;
			}else if($dashboardName=="MARKETING & GARDENING(OUT)"){
				$resdata['todayconsumption']=15;
				$resdata['yesterdayconsumption']=17;
				$resdata['weeklyavg']=14;
				$resdata['status']=1;
			}
			else if($dashboardName=="Borewell 1 (IN)"){
				$resdata['todayconsumption']=30*3.5;
				$resdata['yesterdayconsumption']=25*3.5;
				$resdata['weeklyavg']=27*3.5;
				$resdata['status']=1;
			}
			else if($dashboardName=="Borewell 2 (IN)"){
				$resdata['todayconsumption']=28*3.5;
				$resdata['yesterdayconsumption']=26*3.5;
				$resdata['weeklyavg']=29*3.5;
				$resdata['status']=1;
			}
			else if($dashboardName=="A4 BUILDING(OUT)"){
				$resdata['todayconsumption']=30;
				$resdata['yesterdayconsumption']=26;
				$resdata['weeklyavg']=29;
				$resdata['status']=1;
			}
			
		// 	$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		
		// $datacontoday = $this->db->query($queryconsutoday)->result();
		

		// $queryconsuyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";

		// $queryconsuweek="SELECT round(SUM(Consumption)/7) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate between '".$weekday."' AND '".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		// //echo $queryconsuweek;die();
		// $dataconyest = $this->db->query($queryconsuyest)->result();
		// $dataconweek = $this->db->query($queryconsuweek)->result();
			
		// $resdata['todayconsumption']=round(($datacontoday[0]->cons*$multipier)/1000,2);
		// $resdata['yesterdayconsumption']=round(($dataconyest[0]->cons*$multipier)/1000,2);
		// $resdata['weeklyavg']=round(($dataconweek[0]->cons*$multipier)/1000,2);
		// $resdata['status']=1;

		

		

		return $resdata;
	}
	function get_hardwares_device_data_energy_meters($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_energymeter_list($table_name);
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		//$yesterDay = "2021-10-18";
		$weekday = date('Y-m-d',strtotime("-7 days"));
		$firstday= date('Y-m-01', strtotime($todayDate));
		$earlier = new DateTime($firstday);
		$later = new DateTime($todayDate);

		$abs_diff = $later->diff($earlier)->format("%a")+1; //3
		//print_r($meter_list);die();
		$i=0;
		foreach($meter_list as $meters){
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();

				$enquery_kw="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();

				 $enquery_current1="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();


				 $enquery_kva="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='KVA'	ORDER BY TxnTime desc limit 1";
			     $kva_data = $this->db->query($enquery_kva)->result_array();

				 $enquery_kvah="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='KVAH'	ORDER BY TxnTime desc limit 1";
			     $kvah_data = $this->db->query($enquery_kvah)->result_array();



				$enqueryyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$yesterDay."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdatayest = $this->db->query($enqueryyest)->result_array();

				$enquerymonth="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate` between '".$firstday."' AND '".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enqueryavg;die();
				$consdatamonth = $this->db->query($enquerymonth)->result_array();

				$enquery_pf="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				$resdata[$i]['pf']=$pfdata[0]['cons'];
			if($meters['LocationName']=="AFS project-C"){ 
				$resdata[$i]['meter']="Container office";
			}else if($meters['LocationName']=="B4 Building"){
				$resdata[$i]['meter']="A4 Building";
			}else if($meters['LocationName']=="Mains"){
				$resdata[$i]['meter']="Main I/C (EB)";
				
				
			}else if($meters['LocationName']=="Fire Fighting"){
				$resdata[$i]['meter']="Fire Pump Panel";
			}else if($meters['LocationName']=='PDB pump'){
				$resdata[$i]['meter']='PDB Panel';
			}else if($meters['LocationName']=="LDB Pump"){
				$resdata[$i]['meter']="LDB (Pump room)";
			}else if($meters['LocationName']=="LDB Street"){
				$resdata[$i]['meter']="LDB (Street light panel)";
			}else{
				$resdata[$i]['meter']=$meters['LocationName'];
			}
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata[$i]['todaycons']=round($consdata[0]['cons'],2);
				$resdata[$i]['yestcons']=round($consdatayest[0]['cons'],2);
				$resdata[$i]['monthcons']=round($consdatamonth[0]['cons'],2);
				$resdata[$i]['kw']=$kwdata[0]['cons'];
				$resdata[$i]['avgcons']=round($consdatamonth[0]['cons']/$abs_diff,2);

				$resdata[$i]['current1']=$c1_data[0]['cons'];
				$resdata[$i]['current2']=$c2_data[0]['cons'];
				$resdata[$i]['current3']=$c3_data[0]['cons'];
				$resdata[$i]['voltage1']=$v1_data[0]['cons'];
				$resdata[$i]['voltage2']=$v2_data[0]['cons'];
				$resdata[$i]['voltage3']=$v3_data[0]['cons'];
				$resdata[$i]['kva']=$kva_data[0]['cons'];
				$resdata[$i]['kvah']=$kvah_data[0]['cons'];

			$i++;

		}
		//echo json_encode($resdata);die();
		return $resdata;

	}
	function get_hardwares_device_data_waterlevelmeter_report($data,$fromdate,$todate,$fromtime,$totime){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		
		$dashboardName=$data['dashboard_name'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		
		$table_name=$this->get_table_name($station_id);
		if($fromtime=='NA'){
			if($locationName=='Domestic Tank-B' && $todayDate==$todate){
				$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
			}else{
				$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
			}
			
		
			//echo $querywaterlevel;
			$datawaterlevel = $this->db->query($querywaterlevel)->result();
			//$waterlevel=$datawaterlevel[0]->CurReading;
	
			$resdata['meter']=$dashboardName;
			$resdata['leveldata']=$datawaterlevel;
		}else{
			if($fromtime=='Select FromTime'){
				$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
		
				//echo $querywaterlevel;
				$datawaterlevel = $this->db->query($querywaterlevel)->result();
				//$waterlevel=$datawaterlevel[0]->CurReading;
		
				$resdata['meter']=$dashboardName;
				$resdata['leveldata']=$datawaterlevel;
			}else if($fromtime!='Select FromTime'){
				$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnDate ASC,TxnTime ASC";
		
				//echo $querywaterlevel;
				$datawaterlevel = $this->db->query($querywaterlevel)->result();
				//$waterlevel=$datawaterlevel[0]->CurReading;
		
				$resdata['meter']=$dashboardName;
				$resdata['leveldata']=$datawaterlevel;
			}
			
		}
			
		
		

		

		
//echo json_encode($resdata);die();
		return $resdata;

	}
	function get_table_name($c_id) {
        $this->db->select('db_table');
        $this->db->from('clients');
        $this->db->where('station_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['db_table'];
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
	
   function get_hardwares_device_data_waterlevelmeter_mum_report($data,$fromdate,$todate){
	//print_r($data);die();
   $station_id=$data['station_id'];
   $table_name=$this->get_table_name($station_id);
   //echo $table_name;die();
//    //$hardware_name=$data['api_name'];
//    $dashboardName=$data['dashboard_name'];
//    $lineconnected=$data['LineConnected'];
//    $utilityName=$data['UtilityName'];
//    $locationName=$data['LocationName'];
//$capacity=100000;
   $todayDate=date("Y-m-d");
   $meter_list=$this->get_meters_name($table_name);
   $i=0;
	foreach($meter_list as $meters){
		if($meters['LocationName']=='Dom. Water Sump'){
			$querywaterlevel="SELECT round(((`CurReading`/1000)*2.8),2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
			$resdata[$i]['meter']="Domestic Sump";
		}else if($meters['LocationName']=='Fire Water Sump'){
			$querywaterlevel="SELECT round((`CurReading`/1000)*1.61,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
			$resdata[$i]['meter']="Fire Sump";
		}else{
			$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM hardware_station_consumption_data_mumbai WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
			$resdata[$i]['meter']=$meters['LocationName'];
		}
		
		
		//echo $querywaterlevel;
		$datawaterlevel = $this->db->query($querywaterlevel)->result();
		//$waterlevel=$datawaterlevel[0]->CurReading;

		
		$resdata[$i]['leveldata']=$datawaterlevel;

		
   $i++;
	}
   

//echo json_encode($resdata);die();
   return $resdata;

}
	function get_hardwares_device_data_waterlevelmeter($data){
		
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);	
		$dashboardName=$data['dashboard_name'];		
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		
	
		$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnTime DESC LIMIT 1";
		// echo $querywaterlevel;
		$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
		if($locationName=='Fire Water Sump'){
			$waterlevel=$datawaterlevel[0]['CurReading']*1.61;
		}else if($locationName=='Dom. Water Sump'){
			$waterlevel=$datawaterlevel[0]['CurReading']*2.8;
		}else{
			$waterlevel=$datawaterlevel[0]['CurReading'];
		}		

		$resdata['meter']=$dashboardName;
		$resdata['capacity']=round($capacity/1000);
		$resdata['currentlevel']=round($waterlevel/1000,2);
		$resdata['filledpercent']=round(($waterlevel/$capacity)*100,2);
		$resdata['filledpercent_1']=round(($waterlevel/$capacity)*100);
		
		return $resdata;

	}
	function get_firepumplist($meterserial,$table_name,$dashboardName){
		

		$fire="SELECT * FROM $table_name where `MeterSerial`='".$meterserial."' AND `UtilityName` NOT IN('".$dashboardName."') GROUP BY `UtilityName` ORDER BY `UtilityName` desc";
		//echo $fire;die();
		$result = $this->db->query($fire)->result_array();
		return $result;



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
		$firepumpList=$this->get_firepumplist($meterserial,$table_name,$utilityName);

		$todayDate=date('Y-m-d');
       //$todayDate='2021-27-10';
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $firstday= date('Y-m-01', strtotime($todayDate));
		//$firstday= "2021-10-15";
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
		$resultArray=array();
		if($meterserial=='71'){
			$firepumpList[0]['fire_pump_name']='Panel Power Supply';
			$firepumpList[1]['fire_pump_name']='Jockey Pump';
			$firepumpList[2]['fire_pump_name']='Main Pump';
			$firepumpList[3]['fire_pump_name']='Diesel Engine Driven Pump';
			$i=0;
			foreach($firepumpList as $list){
				if($list['fire_pump_name']=='Panel Power Supply'){
					

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Mains On' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_data = $this->db->query($switch_status_query)->result_array();

					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					$resultArray['run_data'][$i]['running_status']=true;
					if($switch_status_data[0]['CurReading']==1){
						$resultArray['run_data'][$i]['switch_status']=true;
					}else{
						$resultArray['run_data'][$i]['switch_status']=false;
					}
					
					$resultArray['run_data'][$i]['today_running_hours']="";
					$resultArray['run_data'][$i]['yesterday_running_hours']="";
					$resultArray['run_data'][$i]['lastweek_running_hours']="";
					$resultArray['run_data'][$i]['monthly_running_hours']="";
					$i++;



				}else if($list['fire_pump_name']=='Jockey Pump'){
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
					
					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray['run_data'][$i]['running_status']=false;
					}else{
						$resultArray['run_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray['run_data'][$i]['switch_status']=true;
					}else{
						$resultArray['run_data'][$i]['switch_status']=false;
					}
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($datarun_yest[0]['run']*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($datarun_week[0]['run']*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($datarun_month[0]['run']*60);
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
					
					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray['run_data'][$i]['running_status']=false;
					}else{
						$resultArray['run_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray['run_data'][$i]['switch_status']=true;
					}else{
						$resultArray['run_data'][$i]['switch_status']=false;
					}
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($datarun_yest[0]['run']*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($datarun_week[0]['run']*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($datarun_month[0]['run']*60);
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
					
					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray['run_data'][$i]['running_status']=false;
					}else{
						$resultArray['run_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray['run_data'][$i]['switch_status']=true;
					}else{
						$resultArray['run_data'][$i]['switch_status']=false;
					}
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($datarun_yest[0]['run']*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($datarun_week[0]['run']*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($datarun_month[0]['run']*60);
					$i++;
				}
				

				
   
		   }
		   		$pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
				   //echo $pressure;die();
				$pressuredata = $this->db->query($pressure)->result_array();
				$resultArray['pressure_data']=$pressuredata;
				$resultArray['dg_data']=$this->get_hardwares_device_data_dg_firepump1($table_name);
		}else{
			$firepumpList2[0]['fire_pump_name']='Jockey Pump';
			$firepumpList2[1]['fire_pump_name']='Diesel Engine Driven Pump';
			$i=0;
			foreach($firepumpList2 as $list){
				if($list['fire_pump_name']=='Jockey Pump'){
					$runn_status_query="SELECT Consumption	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					//$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump Auto' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$today_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ";
					$yesterday_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$yesterDay."'  ";
					$weekly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
					$monthly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";

					$run_status_data = $this->db->query($runn_status_query)->result_array();
					//$switch_status_data = $this->db->query($switch_status_query)->result_array();
					$today_runn_data = $this->db->query($today_runn_query)->result_array();
					$yesterday_runn_data = $this->db->query($yesterday_runn_query)->result_array();
					$weekly_runn_data = $this->db->query($weekly_runn_query)->result_array();
					$monthly_runn_data = $this->db->query($monthly_runn_query)->result_array();

					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['Consumption']==0){
						$resultArray['run_data'][$i]['running_status']=false;
					}else{
						$resultArray['run_data'][$i]['running_status']=true;
					}
					// if($switch_status_data[0]['CurReading']==1){
					// 	$resultArray['run_data'][$i]['switch_status']=true;
					// }else{
					// 	$resultArray['run_data'][$i]['switch_status']=false;
					// }
					$resultArray['run_data'][$i]['switch_status']=false;
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_data[0]['cons']*60);
					$i++;



				}else{
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Engine Run' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Off/Manual Auto' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

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

					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if($run_status_data[0]['CurReading']==0){
						$resultArray['run_data'][$i]['running_status']=false;
					}else{
						$resultArray['run_data'][$i]['running_status']=true;
					}
					if($switch_status_data[0]['CurReading']==1){
						$resultArray['run_data'][$i]['switch_status']=true;
					}else{
						$resultArray['run_data'][$i]['switch_status']=true;
					}
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_data[0]['cons']*60);
					$i++;
				}
				

				
   
		   }
			$pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
			$pressuredata = $this->db->query($pressure)->result_array();
				
			$resultArray['meter']="Water Pressure";
			$resultArray['pressure_data']=$pressuredata;
			$resultArray['dg_data']=$this->get_hardwares_device_data_dg_firepump($table_name);
			
			//$startEndFuelQuery="SELECT 			(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND LocationName='Fire Pump House' ORDER BY TxnTime LIMIT 1) as 'start',			(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."'  AND LocationName='Fire Pump House' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		}
		
		//die();
		return $resultArray;
		//echo json_encode($resultArray);die();
		
		
		


	}
	function get_hardwares_device_data_hydro($data){
		// print_r($data);die();
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
		$resultArray=array();
		
			$hydrolist[0]['UtilityName']='Motor-1';
			$hydrolist[1]['UtilityName']='Motor-2';
		    $i=0;
			foreach($hydrolist as $list){
				if($list['UtilityName']=='Motor-1'){
					$runstatus='Motor-1 Pwr';
					$runconnect='Motor-1 RHT';
					$resultArray['run_data'][$i]['meter']=$list['UtilityName'];
				}else if($list['UtilityName']=='Motor-2'){
					$runstatus='Motor-2 Pwr';
					$runconnect='Motor-2 RHT';
					$resultArray['run_data'][$i]['meter']=$list['UtilityName'];
				}
			
				$todayquery="SELECT Consumption FROM $table_name where LineConnected='".$runstatus."'  and StationId='".$station_id."' and TxnDate='".$todayDate."' and MeterSerial='0061'  ORDER BY TxnTime desc limit 1";
				$todayqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$todayDate."' and MeterSerial='0061'  ";
				//echo $todayqueryConsu;die();
				$yestqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate='".$yesterDay."' and MeterSerial='0061' ";
				$weekqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
				$monthqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";
			  
			   
				$todaydata = $this->db->query($todayquery)->result_array();
				$todaydatacons = $this->db->query($todayqueryConsu)->result_array();
				$yesterdaydatacons = $this->db->query($yestqueryConsu)->result_array();
				$weekdatacons = $this->db->query($weekqueryConsu)->result_array();
				$monthdatacons = $this->db->query($monthqueryConsu)->result_array();
				
				if($todaydata[0]['Consumption']>0){
					$resultArray['run_data'][$i]['running_status']=true;
				}else{
					$resultArray['run_data'][$i]['running_status']=false;
				}
			
				$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($todaydatacons[0]['cons']*60);
				$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterdaydatacons[0]['cons']*60);
				$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime_month($weekdatacons[0]['cons']*60);
				$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthdatacons[0]['cons']*60);
				$i++;
   
		   }
		   $pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
		   $pressuredata = $this->db->query($pressure)->result_array();		  
		   $resultArray['pressure_data']=$pressuredata;
		   return $resultArray;
		
		
		


	}
	function get_hardwares_device_data_power_factor_report($fromdate,$todate){
		$station_id='2021000067';
		$table_name=$this->get_table_name($station_id);
		$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='PF'  ORDER BY TxnDate ASC,TxnTime ASC";
		
		//echo $querywaterlevel;
		$pf = $this->db->query($querypowerfactor)->result();
		//$waterlevel=$datawaterlevel[0]->CurReading;

		$resdata['meter']="Power Factor";
		$resdata['pf_data']=$pf;
		return $resdata;

	}
	function get_hardwares_device_data_dg_report($data,$fromdate,$todate,$fromtime,$totime){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
           
		
			if($fromtime=='Select FromTime' || $fromtime=="NA"){
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						
						$startEndFuelQuery="SELECT 
					(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
					(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
					$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
					if(is_null($dataStartEndFuel[0]->start)){
						$resdata['consolidate'][$k]['status']="NA";
						$resdata['consolidate'][$k]['dgname']=$hardware_name;
						$resdata['consolidate'][$k]['run']="NA";
						$resdata['consolidate'][$k]['run1']="NA";
						$resdata['consolidate'][$k]['date']=$datesarray[$k];
						$resdata['consolidate'][$k]['fadd']="NA";
						$resdata['consolidate'][$k]['fremove']="NA";
						$resdata['consolidate'][$k]['fconsume1']="NA";
						$resdata['consolidate'][$k]['fconsume']="NA";
						$resdata['consolidate'][$k]['economy']="NA";
						$resdata['consolidate'][$k]['availableFuel']="NA";

					}else{
						//echo json_encode($dataStartEndFuel[0]->start);die();
					$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time'";
					$dataRunn = $this->db->query($queryRunn)->result();
					$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
					$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
					$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;
					
					$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Filled'";
					
					$dataAdd = $this->db->query($queryFadd)->result();
					$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;


					$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level'";
					//echo $queryRuntimes;die();
					$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

					$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
					

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

					$resdata['consolidate'][$k]['fremove']=$fremove;
					$resdata['consolidate'][$k]['fconsume1']=round($dataStartEndFuel[0]->start+$resdata['consolidate'][$k]['fadd']-$dataStartEndFuel[0]->end-$resdata['consolidate'][$k]['fremove'],2);
					//$resdata['consolidate'][$k]['krish']=$dataRunn[0]->run;
					if($resdata['consolidate'][$k]['fconsume1'] <= 0 || $dataRunn[0]->run==0){
						$finaleco =0;
						$resdata['consolidate'][$k]['fconsume']=0;
						//return 0;
					}
					else{
						$resdata['consolidate'][$k]['fconsume']=$resdata['consolidate'][$k]['fconsume1'];
						$rs = explode(":", $resdata['consolidate'][$k]['run_c']);
						//print_r($rs);
						$hrs = $rs[0];
						$mins = $rs[1];
						$total_mins = ($hrs*60)+$mins;
						if($total_mins != 0){
							$eco = ($resdata['consolidate'][$k]['fconsume']/$total_mins)*60;
						}
						else{
							$eco = 0;
						}
						//echo "<br>".$eco."<br>";
						$finaleco= round($eco,2);
						
					}
					
					$resdata['consolidate'][$k]['economy']=$finaleco;
					$resdata['consolidate'][$k]['availableFuel']=$dataStartEndFuel[0]->end;

					$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
					//echo $queryRuntimes;die();
					$dataVoltage = $this->db->query($queryVoltage)->result();

					$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;

					$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
					//echo $queryRuntimes;die();
					$dataStatus = $this->db->query($queryStatus)->result();
					if($dataStatus[0]->Consumption==1){
						$status="ON";
					}else{
						$status="OFF";
					}
					$resdata['consolidate'][$k]['status']=$status;
					$resdata['consolidate'][$k]['dgname']=$hardware_name;
					
					$resdata['consolidate'][$k]['date']=$datesarray[$k];
					}
					//die();
					
					

					}
			}else if($fromtime!='Select FromTime'){
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						
						$startEndFuelQuery="SELECT 
					(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime LIMIT 1) as 'start',
					(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
					$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();

					if(is_null($dataStartEndFuel[0]->start)){
						$resdata['consolidate'][$k]['status']="NA";
						$resdata['consolidate'][$k]['dgname']=$hardware_name;
						$resdata['consolidate'][$k]['run']="NA";
						$resdata['consolidate'][$k]['run1']="NA";
						$resdata['consolidate'][$k]['date']=$datesarray[$k];
						$resdata['consolidate'][$k]['fadd']="NA";
						$resdata['consolidate'][$k]['fremove']="NA";
						$resdata['consolidate'][$k]['fconsume']="NA";
						$resdata['consolidate'][$k]['fconsume1']="NA";
					$resdata['consolidate'][$k]['economy']="NA";
					$resdata['consolidate'][$k]['availableFuel']="NA";

					}else{
							//echo json_encode($dataStartEndFuel[0]->start);die();
							$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
							$dataRunn = $this->db->query($queryRunn)->result();
							$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
							$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
							$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;

							$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Filled' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";

							$dataAdd = $this->db->query($queryFadd)->result();
							$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;


							$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
							//echo $queryRuntimes;die();
							$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

							$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'  AND Consumption>0";


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

							$resdata['consolidate'][$k]['fremove']=$fremove;
							$resdata['consolidate'][$k]['fconsume1']=round($dataStartEndFuel[0]->start+$resdata['consolidate'][$k]['fadd']-$dataStartEndFuel[0]->end-$resdata['consolidate'][$k]['fremove'],2);
							//$resdata['consolidate'][$k]['krish']=$dataRunn[0]->run;
							if($resdata['consolidate'][$k]['fconsume1'] <= 0 || $dataRunn[0]->run==0){
								$finaleco =0;
								$resdata['consolidate'][$k]['fconsume']=0;
								//return 0;
							}
							else{
								$resdata['consolidate'][$k]['fconsume']=$resdata['consolidate'][$k]['fconsume1'];
								$rs = explode(":", $resdata['consolidate'][$k]['run_c']);
								//print_r($rs);
								$hrs = $rs[0];
								$mins = $rs[1];
								$total_mins = ($hrs*60)+$mins;
								if($total_mins != 0){
									$eco = ($resdata['consolidate'][$k]['fconsume']/$total_mins)*60;
								}
								else{
									$eco = 0;
								}
								//echo "<br>".$eco."<br>";
								$finaleco= round($eco,2);
								
							}

							$resdata['consolidate'][$k]['economy']=$finaleco;
							$resdata['consolidate'][$k]['availableFuel']=$dataStartEndFuel[0]->end;

							$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime DESC LIMIT 1";
							//echo $queryRuntimes;die();
							$dataVoltage = $this->db->query($queryVoltage)->result();

							$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;

							$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime DESC LIMIT 1";
							//echo $queryRuntimes;die();
							$dataStatus = $this->db->query($queryStatus)->result();
							if($dataStatus[0]->Consumption==1){
								$status="ON";
							}else{
								$status="OFF";
							}
							$resdata['consolidate'][$k]['status']=$status;
							$resdata['consolidate'][$k]['dgname']=$hardware_name;

							$resdata['consolidate'][$k]['date']=$datesarray[$k];
					}
					
					

					}
			}
			$resdata['fuel_level']['dg_fuel_level']=$this->getDGFuelLevel($table_name,$fromdate,$todate,$station_id,$hardware_name);
			$totaldays=count($datesarray);
			for($t=0;$t<$totaldays;$t++){
				$dgdat[$t]=$this->getDgHardwareData($table_name,$datesarray[$t],$hardware_name);
			
				
			}
			$taval=0;
			$tfadd=0;
			$tacon=0;
			$tconsu=0;
			$trun=0;
			$hldata1=array();
			foreach($dgdat as $row){

				$trun+=$row['run'];
				$taval+=$row['availableFuel'];
				$tfadd+=$row['fadd'];
				$tacon+=$row['economy'];
				$tconsu+=$row['fconsume'];
				array_push($hldata1,$row['run']);
				
				
			}
			        $resdata['summery']['totalrun']=$this->secondsToTime(round($trun*60));
					$resdata['summery']['avgperday']=$this->secondsToTime(round($trun*60/$totaldays));
					$resdata['summery']['totaldays']=$totaldays;
					$resdata['summery']['min']=$this->secondsToTime(round(min($hldata1)*60));
					$resdata['summery']['max']=$this->secondsToTime(round(max($hldata1)*60));
					foreach($dgdat as $row1){
						if($row1['run']==min($hldata1)){
						   $resdata['summery']['mindate']=$row1['date']."/".date('l', strtotime($row1['date']));							
						}else if($row1['run']==max($hldata1)){
						   $resdata['summery']['maxdate']=$row1['date']."/".date('l', strtotime($row1['date'])); 
						}
					}
					$resdata['dg']['name']="DG";
					$resdata['dg']['fuel_added']=round($tfadd,2);
					$resdata['dg']['fuel_consumed']=round($tacon,2);
					$resdata['dg']['fuel_economy']=round($tacon,2);
					$resdata['dg']['fuel_avg']=round($taval/$totaldays);
        
		
		return $resdata;
		
	}
	function getDgHardwareData($table_name,$date,$hardware_name){
		$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."'  ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level'  ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		//echo $startEndFuelQuery;die();
	
		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result_array();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		if(is_null($dataStartEndFuel[0]['start'])){
			
			$resdata['run']="0";
			
			$resdata['fadd']="0";
			$resdata['fremove']="0";
			
			$resdata['fconsume']="0";
			$resdata['economy']="0";
			$resdata['availableFuel']="0";

		}else{
			$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$date."' AND LineConnected='DG_Running_Time' ";
			$dataRunn = $this->db->query($queryRunn)->result_array();
			$resdata['run']=$dataRunn[0]['run'];
			$resdata['date']=$date;
			
			$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$date."' AND LineConnected='Fuel Filled'";
			
			$dataAdd = $this->db->query($queryFadd)->result_array();
			$resdata['fadd']=$dataAdd[0]['fadd'];
		
		
			$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$date."' AND LineConnected='Fuel Level'";
			//echo $queryRuntimes;die();
			$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
		
			$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$date."' AND LineConnected='DG_Running_Time'   AND Consumption>0";
			
		
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
			$resdata['availableFuel']=$dataStartEndFuel[0]['end'];
			
		}
		
	
		
		return $resdata;
	}
	function get_hardwares_device_data_flowmeter_report($data,$fromdate,$todate,$fromtime,$totime){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$LocationName=$data['LocationName'];
		
		$dashboardName=$data['dashboard_name'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
		
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=1;
		}
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
           if($fromtime=='NA'){
			
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					
					$resdata['consolidate'][$k]['meter']=$dashboardName;
					$check=$this->chech_water_consumption($lineconnected,$utilityName,$datesarray[$k],$LocationName);
					if(count($check)==1){
						$resdata['consolidate'][$k]['consumption']=(float)$check[0]['consumption'];	
						$resdata['consolidate'][$k]['date']=$check[0]['report_date'];	
						$resdata['consolidate'][$k]['sno']=$k+1;
					}else{
						if($datesarray[$k]==date('Y-m-d')){
							$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							$datacontoday = $this->db->query($queryconsutoday)->result_array();
							$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons'];	
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
							$resdata['consolidate'][$k]['sno']=$k+1;
						}else{
							$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							$datacontoday = $this->db->query($queryconsutoday)->result_array();
							$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons'];	
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
							$resdata['consolidate'][$k]['sno']=$k+1;
	
							$water_cons_query=array(
								'utility_name'=>$utilityName,
								'line_connected'=>$lineconnected,
								'location_name'=>$LocationName,
								'report_date'=>$datesarray[$k],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'consumption'=>$datacontoday[0]['cons'],
								'multiplier'=>1              
							);
							$this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
						}
						

					}
					
				
				}
			
		   }else{
			if( $fromtime=='Select FromTime'){
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					$resdata['consolidate'][$k]['meter']=$dashboardName;
					$check=$this->chech_water_consumption($lineconnected,$utilityName,$datesarray[$k],$LocationName);
					if(count($check)==1){
						$resdata['consolidate'][$k]['consumption']=(float)$check[0]['consumption'];	
						$resdata['consolidate'][$k]['date']=$check[0]['report_date'];	
						$resdata['consolidate'][$k]['sno']=$k+1;
					}else{
						if($datesarray[$k]==date('Y-m-d')){
							$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							$datacontoday = $this->db->query($queryconsutoday)->result_array();
							$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons'];	
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
							$resdata['consolidate'][$k]['sno']=$k+1;
						}else{
							$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							$datacontoday = $this->db->query($queryconsutoday)->result_array();
							$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons'];	
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
							$resdata['consolidate'][$k]['sno']=$k+1;
	
							$water_cons_query=array(
								'utility_name'=>$utilityName,
								'line_connected'=>$lineconnected,
								'location_name'=>$LocationName,
								'report_date'=>$datesarray[$k],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'consumption'=>$datacontoday[0]['cons'],
								'multiplier'=>1              
							);
							$this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
						}
						

					}
				
				}
			}else if($fromdate<$todate && $fromtime!='Select FromTime'){
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					
					$resdata['consolidate'][$k]['meter']=$dashboardName;
					$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
					//  echo $queryconsutoday;die();
					$datacontoday = $this->db->query($queryconsutoday)->result_array();
					$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons']*$multipier;
	
					$resdata['consolidate'][$k]['date']=$datesarray[$k];
					$resdata['consolidate'][$k]['sno']=$k+1;
				
				}
			}

		   }    
		
		//die();
                    $totaldays=count($datesarray);
					$resdata['summery']['meter']=$dashboardName;
					$tcons=0;
					$hldata1=array();
					for($t=0;$t<$totaldays;$t++){
                        $check=$this->chech_water_consumption($lineconnected,$utilityName,$datesarray[$t],$LocationName);
						if(count($check)==1){
							$tcons+=$check[0]['consumption'];
							$hldata[$t]['con']=$check[0]['consumption'];
							$hldata[$t]['date']=$check[0]['report_date'];
						}else{

							if($datesarray[$t]==date('Y-m-d')){
								$queryconsucum="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate = '".$datesarray[$t]."'  AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
								$dataconcum = $this->db->query($queryconsucum)->result_array();	
								$tcons+=$dataconcum[0]['cons'];
								$hldata[$t]['con']=$dataconcum[0]['cons'];
								$hldata[$t]['date']=$datesarray[$t];
							}else{
								$queryconsucum="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate = '".$datesarray[$t]."'  AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
								$dataconcum = $this->db->query($queryconsucum)->result_array();	
								$tcons+=$dataconcum[0]['cons'];
								$hldata[$t]['con']=$dataconcum[0]['cons'];
								$hldata[$t]['date']=$datesarray[$t];

								$water_cons_query=array(
									'utility_name'=>$utilityName,
									'line_connected'=>$lineconnected,
									'location_name'=>$LocationName,
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$dataconcum[0]['cons'],
									'multiplier'=>1               
								);
								$this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
							}
							
						}
						

						
                       // $this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
						array_push($hldata1,$hldata[$t]['con']);
					}
				
					$resdata['summery']['totalconsumption']=round($tcons,2);
					$resdata['summery']['avgperday']=round(($tcons/$totaldays),2);
					$resdata['summery']['totaldays']=$totaldays;
					$resdata['summery']['min']=round(min($hldata1),2);
					$resdata['summery']['max']=round(max($hldata1),2);
	                 foreach($hldata as $row){
						 if($row['con']==min($hldata1)){
							$resdata['summery']['mindate']=$row['date']."/".date('l', strtotime($row['date']));							
						 }else if($row['con']==max($hldata1)){
							$resdata['summery']['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
						 }
					 }
					//$resdata[$k]['date']=$datesarray[$k];

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
	function get_hardwares_device_data_borewell_report($data,$fromdate,$todate,$fromtime,$totime){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$LocationName=$data['LocationName'];
		$utilityName=$data['UtilityName'];
		$dashboardName=$data['dashboard_name'];
		$todayDate=date("Y-m-d");
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=100;
		}
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
		
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		if($fromtime=='NA'){
			for ($k=0; $k < count($datesarray); $k++)
			{ 
				
			$queryconsutoday="SELECT (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0";
			// echo json_encode($queryconsutoday);die();
			$dataruntoday = $this->db->query($queryconsutoday)->result_array();
			//echo json_encode($datacontoday[0]);die();
			$todayrun=0;
				for ($i=0; $i < count($dataruntoday); $i++) { 
					if($dataruntoday[$i]['secs']<0){
						$todayrun+= 8*60;
					}else{
						$todayrun+= $dataruntoday[$i]['secs'];
					}
					
				}
				$today_percent15=$todayrun*0.15;

				$resdata['consolidate'][$k]['meter']=$dashboardName;
				$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($todayrun-$today_percent15));
				$resdata['consolidate'][$k]['running1']=round(($todayrun-$today_percent15)/60);
				$resdata['consolidate'][$k]['date']=$datesarray[$k];
				
			
			}
		}else{
			if( $fromtime=='Select FromTime'){
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					$queryconsutoday="SELECT (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0";
			
					$dataruntoday = $this->db->query($queryconsutoday)->result_array();
					//echo json_encode($datacontoday[0]);die();
					$todayrun=0;
						for ($i=0; $i < count($dataruntoday); $i++) { 
							if($dataruntoday[$i]['secs']<0){
								$todayrun+= 8*60;
							}else{
								$todayrun+= $dataruntoday[$i]['secs'];
							}
							
						}
						$today_percent15=$todayrun*0.15;
						$resdata['consolidate'][$k]['meter']=$dashboardName;
						$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($todayrun-$today_percent15));
						$resdata['consolidate'][$k]['running1']=round(($todayrun-$today_percent15)/60);
						$resdata['consolidate'][$k]['date']=$datesarray[$k];
				}
			}else{
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					$queryconsutoday="SELECT (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
			
					$dataruntoday = $this->db->query($queryconsutoday)->result_array();
					//echo json_encode($datacontoday[0]);die();
					$todayrun=0;
						for ($i=0; $i < count($dataruntoday); $i++) { 
							if($dataruntoday[$i]['secs']<0){
								$todayrun+= 8*60;
							}else{
								$todayrun+= $dataruntoday[$i]['secs'];
							}
							
						}
						$today_percent15=$todayrun*0.15;
						$resdata['consolidate'][$k]['meter']=$dashboardName;
						$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($todayrun-$today_percent15));
						$resdata['consolidate'][$k]['running1']=round(($todayrun-$today_percent15)/60);
			
						$resdata['consolidate'][$k]['date']=$datesarray[$k];
				}
			}

		}

		$totaldays=count($datesarray);
		$resdata['summery']['meter']=$dashboardName;
		$tcons=0;
		$hldata1=array();
		
		for($t=0;$t<$totaldays;$t++){
			$queryruncum="SELECT (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$t]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0";
			$dataruncum = $this->db->query($queryruncum)->result_array();
			$today_percent15=$todayrun*0.15;
			$todayrun=0;
			for ($i=0; $i < count($dataruncum); $i++) { 
				if($dataruncum[$i]['secs']<0){
					$todayrun+= 8*60;
				}else{
					$todayrun+= $dataruncum[$i]['secs'];
				}
				
			}
			$tcons+=($todayrun-$today_percent15);
			$hldata[$t]['run']=$todayrun-$today_percent15;
			$hldata[$t]['date']=$datesarray[$t];

			array_push($hldata1,($todayrun-$today_percent15));
		}
		
		$resdata['summery']['totalrun']=$this->secondsToTime_month(round($tcons));
		$resdata['summery']['avgperday']=$this->secondsToTime_month(round($tcons/$totaldays));
		$resdata['summery']['totaldays']=$totaldays;
		$resdata['summery']['min']=$this->secondsToTime(round(min($hldata1)));
		$resdata['summery']['max']=$this->secondsToTime(round(max($hldata1)));
		 foreach($hldata as $row){
			 if($row['run']==min($hldata1)){
				$resdata['summery']['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
			 }else if($row['run']==max($hldata1)){
				$resdata['summery']['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
			 }
		 }

		return $resdata;
	}
	function get_hardwares_device_data_firepump_report($data,$fromdate,$todate,$fromtime,$totime){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		//echo $table_name;die();
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$meterserial=$data['UomName'];
		//$firepumpList=$this->get_firepumplist($meterserial,$table_name,$utilityName);
// echo json_encode($firepumpList);die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		if($meterserial=='68'){
			$firepumpList[0]['fire_pump_name']='Jockey Pump';
			$firepumpList[1]['fire_pump_name']='Main Pump';
			$firepumpList[2]['fire_pump_name']='Diesel Engine Driven Pump';


			$resdata['meter']=$dashboardName;
			if($fromtime=='NA'){
				 
					$i=0;
					foreach($firepumpList as $list){
						for ($k=0; $k < count($datesarray); $k++)
									{ 
									
									
									if($list['fire_pump_name']=='Jockey Pump'){
										$pressure_today="SELECT round(CurReading*Multiplier,2) as pressure FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'   ORDER BY TxnTime asc ";
									//echo $pressure;die();
										$pressuredata_today = $this->db->query($pressure_today)->result_array();
										$rn_today=0;
										for ($n=0; $n < count($pressuredata_today); $n++) { 
										
											if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>1 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<3){
												$rn_today+=55;
											}else if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>3 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<9){
												$rn_today+=300;
											}
											# code...
										}
										
										$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($rn_today);
										$resdata['fire_runn'][$k][$i]['running_hours1']=round($rn_today/60,2);
						
										$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
									}else{
										
										$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime(0);
										$resdata['fire_runn'][$k][$i]['running_hours1']=0;						
										$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
									}
									
									
									
					
								}
								$i++;

					
				}
			}else{
				if($fromtime=='Select FromTime'){
					
							$i=0;
								foreach($firepumpList as $list){
									for ($k=0; $k < count($datesarray); $k++)
									{ 
									
									
									if($list['fire_pump_name']=='Jockey Pump'){
										$pressure_today="SELECT round(CurReading*Multiplier,2) as pressure FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'   ORDER BY TxnTime asc ";
									//echo $pressure;die();
										$pressuredata_today = $this->db->query($pressure_today)->result_array();
										$rn_today=0;
										for ($n=0; $n < count($pressuredata_today); $n++) { 
										
											if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>1 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<3){
												$rn_today+=55;
											}else if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>3 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<9){
												$rn_today+=300;
											}
											# code...
										}
										
										$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($rn_today);
										$resdata['fire_runn'][$k][$i]['running_hours1']=round($rn_today/60,2);
						
										$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
									}else{
										
										$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime(0);
										$resdata['fire_runn'][$k][$i]['running_hours1']=0;						
										$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
									}
									
									
									
					
								}
								$i++;
							}
							//echo json_encode($resdata);die();
				}else{
					 
							$i=0;
								foreach($firepumpList as $list){
									for ($k=0; $k < count($datesarray); $k++)
									{
										$pressure_today="SELECT round(CurReading*Multiplier,2) as pressure FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'  ORDER BY TxnTime asc ";
										//echo $pressure;die();
											$pressuredata_today = $this->db->query($pressure_today)->result_array();
											$rn_today=0;
											for ($n=0; $n < count($pressuredata_today); $n++) { 
											
												if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>1 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<3){
													$rn_today+=55;
												}else if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>3 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<9){
													$rn_today+=300;
												}
												# code...
											}
									
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($rn_today);
											$resdata['fire_runn'][$k][$i]['running_hours1']=round($rn_today/60,2);
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
									
					
								}
								$i++;
							}
				}
			}
			
			        $totaldays=count($datesarray);					
					$tcons=0;
					$hldata1=array();
					$i=0;
					foreach($firepumpList as $list){
						if($list['fire_pump_name']=='Jockey Pump'){
							for($t=0;$t<$totaldays;$t++){
								$pressure_today="SELECT round(CurReading*Multiplier,2) as pressure FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."'  ORDER BY TxnTime asc ";
								$pressuredata_today = $this->db->query($pressure_today)->result_array();
								$rn_today=0;
								for ($n=0; $n < count($pressuredata_today); $n++) { 
								
									if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>1 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<3){
										$rn_today+=55;
									}else if(($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])>3 && ($pressuredata_today[$n+1]['pressure']-$pressuredata_today[$n]['pressure'])<9){
										$rn_today+=300;
									}
									# code...
								}
									
								$tcons+=$rn_today;
								$hldata[$t]['con']=$rn_today;
								$hldata[$t]['date']=$datesarray[$t];
								array_push($hldata1,$rn_today);
								}
	
								$resdata['summery'][$i]['meter']=$list['fire_pump_name'];
								$resdata['summery'][$i]['totalrun']=$this->secondsToTime(round($tcons));
								$resdata['summery'][$i]['avgperday']=$this->secondsToTime(round(($tcons)/$totaldays));
								$resdata['summery'][$i]['totaldays']=$totaldays;
								$resdata['summery'][$i]['min']=$this->secondsToTime(round(min($hldata1)));
								$resdata['summery'][$i]['max']=$this->secondsToTime(round(max($hldata1)));
								foreach($hldata as $row){
									if($row['con']==min($hldata1)){
										$resdata['summery'][$i]['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
									}else if($row['con']==max($hldata1)){
										$resdata['summery'][$i]['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
									}
								}
								$i++;
						}else{
							for($t=0;$t<$totaldays;$t++){
								
								$tcons+=0;
								$hldata[$t]['con']=0;
								$hldata[$t]['date']=$datesarray[$t];
								array_push($hldata1,0);
								}
	
								$resdata['summery'][$i]['meter']=$list['fire_pump_name'];
								$resdata['summery'][$i]['totalrun']=$this->secondsToTime(0);
								$resdata['summery'][$i]['avgperday']=$this->secondsToTime(0);
								$resdata['summery'][$i]['totaldays']=$totaldays;
								$resdata['summery'][$i]['min']=$this->secondsToTime(0);
								$resdata['summery'][$i]['max']=$this->secondsToTime(0);
								foreach($hldata as $row){
									if($row['con']==min($hldata1)){
										$resdata['summery'][$i]['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
									}else if($row['con']==max($hldata1)){
										$resdata['summery'][$i]['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
									}
								}
								$i++;
						}								
						
					
					}


					for($t=0;$t<$totaldays;$t++){
						$dgdat[$t]=$this->getDgData2($table_name,$datesarray[$t]);

						
					}
					$resdata['fire_pressure']=$this->getfirePressureData1($table_name,$fromdate,$todate,$station_id);
					$resdata['fire_fuel_level']=$this->getfireFuelLevel_1($table_name,$fromdate,$todate,$station_id);
					$resdata['fire_dg']=$dgdat;
					$taval=0;
					$tfadd=0;
					$tacon=0;
					$tconsu=0;
					foreach($dgdat as $row){
						$taval+=$row['availableFuel'];
						$tfadd+=$row['fadd'];
						$tacon+=$row['economy'];
						$tconsu+=$row['fconsume'];
						
						
					}
					$resdata['dg']['name']="DG";
					$resdata['dg']['fuel_added']=$tfadd;
					$resdata['dg']['fuel_consumed']=$tacon;
					$resdata['dg']['fuel_economy']=$tacon;
					$resdata['dg']['fuel_avg']=round($taval/$totaldays);
			
		}else{
			$resdata['meter']=$dashboardName;
			$firepumpList2[0]['UtilityName']='Jockey Pump';
			$firepumpList2[1]['UtilityName']='Diesel Engine Driven Pump';
			//$firepumpList2=array("UtilityName"=>"Jockey Pump", "UtilityName"=>"Diesel Engine Driven Pump");
			if($fromtime=='NA'){
				 
				$i=0;
				foreach($firepumpList2 as $list){
					for ($k=0; $k < count($datesarray); $k++)
					{
						$resdata[$k][$i]['meter']=$list['UtilityName'];
				//$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='".$list['UtilityName']."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate ='".$datesarray[$k]."' ";
 //echo $queryconsutoday;die();
				//$datarun = $this->db->query($runnQuery)->result_array();
				if($datesarray[$k]=='2021-12-25' && $list['UtilityName']=='Jockey Pump'){
					$resdata[$k][$i]['running_hours']=$this->secondsToTime1(45);
					$resdata[$k][$i]['running_hours1']=0.75;
				}else{
					$resdata[$k][$i]['running_hours']=$this->secondsToTime1(0);
					$resdata[$k][$i]['running_hours1']=0;
				}
				

				$resdata[$k][$i]['date']=$datesarray[$k];
				
				}

				$i++;
			}
		}else{
			if($fromtime=='Select FromTime'){
				
						$i=0;
							foreach($firepumpList2 as $list){
								for ($k=0; $k < count($datesarray); $k++)
								{ 
								//$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='".$list['UtilityName']."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate ='".$datesarray[$k]."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
								
								$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
								
								if($datesarray[$k]=='2021-12-25' && $list['UtilityName']=='Jockey Pump'){
									$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime1(45);
									$resdata['fire_runn'][$k][$i]['running_hours1']=0.75;
								}else{
									$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime1(0);
									$resdata['fire_runn'][$k][$i]['running_hours1']=0;
								}
				
								$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
								
				
							}
							$i++;
						}
						//echo json_encode($resdata);die();
			}else{
				 
						$i=0;
							foreach($firepumpList2 as $list){
								for ($k=0; $k < count($datesarray); $k++)
								{
								//$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='".$list['UtilityName']."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate ='".$datesarray[$k]."' ";
								
								
								$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
								//$datarun = $this->db->query($runnQuery)->result_array();
								// $resdata['fire_runn'][$k][$i]['running_hours']=$datarun[0]['cons'];
								if($datesarray[$k]=='2021-12-25' && $list['UtilityName']=='Jockey Pump'){
									$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime1(45);
									$resdata['fire_runn'][$k][$i]['running_hours1']=0.75;
								}else{
									$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime1(0);
									$resdata['fire_runn'][$k][$i]['running_hours1']=0;
								}
				
								$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
								
				
							}
							$i++;
						}
			}
		}
		          $totaldays=count($datesarray);
					
					$tcons=0;
					$hldata1=array();
					$i=0;
					$tfadd=0;
							foreach($firepumpList2 as $list){
								
								for($t=0;$t<$totaldays;$t++){
									//$queryconsucum="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='".$list['UtilityName']."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate ='".$datesarray[$t]."'";
									//$dataconcum = $this->db->query($queryconsucum)->result_array();	
									if($datesarray[$t]=='2021-12-25' && $list['UtilityName']=='Jockey Pump'){
										$tcons+=0.75;
										$hldata[$t]['con']=0.75;
										$hldata[$t]['date']=$datesarray[$t];
										array_push($hldata1,0.75);
									}else{
										$tcons+=0;
										$hldata[$t]['con']=0;
										$hldata[$t]['date']=$datesarray[$t];
										array_push($hldata1,0);
									}
									

									
								}
								//$i++;
							
							$resdata['summery'][$i]['meter']=$list['UtilityName'];
							$resdata['summery'][$i]['totalrun']=$this->secondsToTime1(round($tcons*60));
							$resdata['summery'][$i]['avgperday']=$this->secondsToTime1(round($tcons/$totaldays));
							$resdata['summery'][$i]['totaldays']=$totaldays;
							$resdata['summery'][$i]['min']=$this->secondsToTime1(round(min($hldata1)*60));
							$resdata['summery'][$i]['max']=$this->secondsToTime1(round(max($hldata1)*60));
							foreach($hldata as $row){
								if($row['con']==min($hldata1)){
									$resdata['summery'][$i]['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
								}else if($row['con']==max($hldata1)){
									$resdata['summery'][$i]['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
								}
							}
							$i++;
					}

					for($t=0;$t<$totaldays;$t++){
						$dgdat[$t]=$this->getDgData($table_name,$datesarray[$t]);

						
					}
					$resdata['fire_dg']=$dgdat;
					$resdata['fire_pressure']=$this->getfirePressureData($table_name,$fromdate,$todate,$station_id);
					$resdata['fire_fuel_level']=$this->getfireFuelLevel_2($table_name,$fromdate,$todate,$station_id);
					$taval=0;
					$tfadd=0;
					$tacon=0;
					$tconsu=0;
					foreach($dgdat as $row){
						$taval+=$row['availableFuel'];
						$tfadd+=$row['fadd'];
						$tacon+=$row['economy'];
						$tconsu+=$row['fconsume'];
						
						
					}
					$resdata['dg']['name']="DG";
					$resdata['dg']['fuel_added']=$tfadd;
					$resdata['dg']['fuel_consumed']=$tacon;
					$resdata['dg']['fuel_economy']=$tacon;
					$resdata['dg']['fuel_avg']=round($taval/$totaldays);
					// echo "Totaadd:".$tfadd." Toteco:".$tacon." taval:".$taval;
					// echo json_encode($dgdat);die();

		}
		
      
		return $resdata;
	}
	function getfirePressureData($table_name,$fromdate,$todate,$station_id){
		$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate between '".$fromdate."' AND '".$todate."'  ORDER BY TxnDate ASC,TxnTime ASC ";
		$pressuredata = $this->db->query($pressure)->result();
		return $pressuredata;
	}
	function getfirePressureData1($table_name,$fromdate,$todate,$station_id){
		$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate between '".$fromdate."' AND '".$todate."'  ORDER BY TxnDate ASC,TxnTime ASC ";
		$pressuredata = $this->db->query($pressure)->result();
		return $pressuredata;
	}
	function getfireFuelLevel_1($table_name,$fromdate,$todate,$station_id){
		$flevel="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate between '".$fromdate."' AND '".$todate."'  ORDER BY TxnDate ASC,TxnTime ASC ";
		$flevel_data = $this->db->query($flevel)->result();
		return $flevel_data;
	}
	function getDGFuelLevel($table_name,$fromdate,$todate,$station_id,$utilityName){


		$flevel="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='".$utilityName."' and MeterSerial='0051' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate between '".$fromdate."' AND '".$todate."'  ORDER BY TxnDate ASC,TxnTime ASC ";
		$flevel_data = $this->db->query($flevel)->result();
		return $flevel_data;
	}
	function getfireFuelLevel_2($table_name,$fromdate,$todate,$station_id){
		$flevel="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate between '".$fromdate."' AND '".$todate."'  ORDER BY TxnDate ASC,TxnTime ASC ";
		$flevel_data = $this->db->query($flevel)->result();
		return $flevel_data;
	}
	function getDgData2($table_name,$date){
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
			
		}
		
	
		
		return $resdata;
	}
	function getDgData($table_name,$date){
		$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND LineConnected='Fuel Level' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND UtilityName='New Fire Pump' AND LineConnected='Fuel Level' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		//echo $startEndFuelQuery;die();
	
		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result_array();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		if(is_null($dataStartEndFuel[0]['start'])){
			
			$resdata['run']="0";
			$resdata['name']="DG";
			$resdata['fadd']="0";
			$resdata['fremove']="0";
			$resdata['date']=$date;
			$resdata['fconsume']="0";
			$resdata['economy']="0";
			$resdata['availableFuel']="0";

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
			
		}
		
	
		
		return $resdata;
	}
	function get_hardwares_device_data_hydro_report($data,$fromdate,$todate,$fromtime,$totime){
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		//echo $table_name;die();
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$meterserial=$data['UomName'];
		
// echo json_encode($firepumpList);die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
			$resdata['meter']=$dashboardName;
		
			$firepumpList2[0]['UtilityName']='Motor-1';
			$firepumpList2[1]['UtilityName']='Motor-2';
			
			if($fromtime=='NA'){
				 
				$i=0;
				foreach($firepumpList2 as $list){
					for ($k=0; $k < count($datesarray); $k++)
					{
						if($list['UtilityName']=='Motor-1'){
							
							$runconnect='Motor-1 RHT';
							$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
						}else if($list['UtilityName']=='Motor-2'){
							
							$runconnect='Motor-2 RHT';
							$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
						}
						
						$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' and MeterSerial='0061'  ";
						
						$datarun = $this->db->query($runnQuery)->result_array();
						$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun[0]['cons']*60);
						$resdata['fire_runn'][$k][$i]['running_hours1']=round($datarun[0]['cons']/60,2);

						$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
				
				}

				$i++;
			}
		}else{
			if($fromtime=='Select FromTime'){
				
						$i=0;
							foreach($firepumpList2 as $list){
								for ($k=0; $k < count($datesarray); $k++)
								{ 

									if($list['UtilityName']=='Motor-1'){
							
										$runconnect='Motor-1 RHT';
										$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
									}else if($list['UtilityName']=='Motor-2'){
										
										$runconnect='Motor-2 RHT';
										$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
									}
									
									$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' and MeterSerial='0061'  ";
									//echo $runnQuery;die();
									$datarun = $this->db->query($runnQuery)->result_array();
									$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun[0]['cons']*60);
									$resdata['fire_runn'][$k][$i]['running_hours1']=round($datarun[0]['cons']/60,2);
									$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
								
				
							}
							$i++;
						}
						$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate between '".$fromdate."' and  '".$todate."' ORDER BY TxnDate ASC,TxnTime ASC ";
						$pressuredata = $this->db->query($pressure)->result_array();
						$resdata['pressure_data']=$pressuredata;


						//echo json_encode($resdata);die();
			}else{
				 
						$i=0;
							foreach($firepumpList2 as $list){
								for ($k=0; $k < count($datesarray); $k++)
								{
									if($list['UtilityName']=='Motor-1'){
							
										$runconnect='Motor-1 RHT';
										$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
									}else if($list['UtilityName']=='Motor-2'){
										
										$runconnect='Motor-2 RHT';
										$resdata['fire_runn'][$k][$i]['meter']=$list['UtilityName'];
									}
									
									$runnQuery="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' and MeterSerial='0061' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
									
									$datarun = $this->db->query($runnQuery)->result_array();
									$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun[0]['cons']*60);
									$resdata['fire_runn'][$k][$i]['running_hours1']=round($datarun[0]['cons']/60,2);
									$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
				
							}
							$i++;
						}
						$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate between '".$fromdate."' and  '".$todate."' ORDER BY TxnDate ASC,TxnTime ASC ";
						$pressuredata = $this->db->query($pressure)->result_array();
						$resdata['pressure_data']=$pressuredata;
			}
		}
		
					$totaldays=count($datesarray);
					
					
					
					$i=0;
							foreach($firepumpList2 as $list){
								$hldata1=array();
								$tcons=0;
								if($list['UtilityName']=='Motor-1'){
									$loc='Motor-1 RHT';

								}else{
									$loc='Motor-2 RHT';
								}
								for($t=0;$t<$totaldays;$t++){
									$queryconsucum="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$loc."'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."' and MeterSerial='0061'";
									$dataconcum = $this->db->query($queryconsucum)->result_array();	
									$tcons+=$dataconcum[0]['cons'];
									$hldata[$t]['con']=$dataconcum[0]['cons'];
									$hldata[$t]['date']=$datesarray[$t];

									array_push($hldata1,$dataconcum[0]['cons']);
								}
								//$i++;
							
							$resdata['summery'][$i]['meter']=$list['UtilityName'];
							$resdata['summery'][$i]['totalrun']=$this->secondsToTime_month(round($tcons*60));
							$resdata['summery'][$i]['avgperday']=$this->secondsToTime(round($tcons*60/$totaldays));
							$resdata['summery'][$i]['totaldays']=$totaldays;
							$resdata['summery'][$i]['min']=$this->secondsToTime(round(min($hldata1)*60));
							$resdata['summery'][$i]['max']=$this->secondsToTime(round(max($hldata1)*60));
							foreach($hldata as $row){
								if($row['con']==min($hldata1)){
									$resdata['summery'][$i]['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
								}else if($row['con']==max($hldata1)){
									$resdata['summery'][$i]['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
								}
							}
					 $i++;
					}
					//$resdata[$k]['date']=$datesarray[$k];
		
      
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_report($data,$fromdate,$todate,$fromtime,$totime){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$LocationName=$data['LocationName'];
		// echo $station_id;die();
		$dashboardName=$data['dashboard_name'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_energymeter_list($table_name);
		$i=0;
		foreach($meter_list as $meters){
			if($fromtime=='NA'){

				for ($k=0; $k < count($datesarray); $k++)
					{ 
						
						//$resdata[$i][$k]['meter']=$meters['LocationName'];
						
						if($meters['LocationName']=="AFS project-C"){ 
							$resdata['consolidate'][$i][$k]['meter']="Container office";
						}else if($meters['LocationName']=="B4 Building"){
							$resdata['consolidate'][$i][$k]['meter']="A4 Building";
						}else if($meters['LocationName']=="Mains"){
							$resdata['consolidate'][$i][$k]['meter']="Main I/C (EB)";
						}else if($meters['LocationName']=="Fire Fighting"){
							$resdata['consolidate'][$i][$k]['meter']="Fire pump panel";
						}else if($meters['LocationName']=="LDB Pump"){
							$resdata['consolidate'][$i][$k]['meter']="LDB (Pump room)";
						}else if($meters['LocationName']=='PDB pump'){
							$resdata['consolidate'][$i][$k]['meter']='PDB Panel';
						}else if($meters['LocationName']=="LDB Street"){
							$resdata['consolidate'][$i][$k]['meter']="LDB (Street light panel)";
						}else{
							$resdata['consolidate'][$i][$k]['meter']=$meters['LocationName'];
						}
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['consolidate'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['consolidate'][$i][$k]['date']=$datesarray[$k];
					

					

					
					}
					$i++;

			}else{
				if($fromtime=='Select FromTime'){
					for ($k=0; $k < count($datesarray); $k++)
				{ 
					
					//$resdata[$i][$k]['meter']=$meters['LocationName'];
					
					if($meters['LocationName']=="AFS project-C"){ 
						$resdata['consolidate'][$i][$k]['meter']="Container office";
					}else if($meters['LocationName']=="B4 Building"){
						$resdata['consolidate'][$i][$k]['meter']="A4 Building";
					}else if($meters['LocationName']=="Mains"){
						$resdata['consolidate'][$i][$k]['meter']="Main I/C (EB)";
					}else if($meters['LocationName']=="Fire Fighting"){
						$resdata['consolidate'][$i][$k]['meter']="Fire pump panel";
					}else if($meters['LocationName']=="LDB Pump"){
						$resdata['consolidate'][$i][$k]['meter']="LDB (Pump room)";
					}else if($meters['LocationName']=='PDB pump'){
						$resdata['consolidate'][$i][$k]['meter']='PDB Panel';
					}else if($meters['LocationName']=="LDB Street"){
						$resdata['consolidate'][$i][$k]['meter']="LDB (Street light panel)";
					}else{
						$resdata['consolidate'][$i][$k]['meter']=$meters['LocationName'];
					}
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
					
					
					$datacontoday = $this->db->query($queryconsutoday)->result();
					$resdata['consolidate'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
		
					$resdata['consolidate'][$i][$k]['date']=$datesarray[$k];
				
		
				
		
				
				}
				$i++;
				}else if($fromtime!='Select FromTime'){
					for ($k=0; $k < count($datesarray); $k++)
				{ 
					
					//$resdata[$i][$k]['meter']=$meters['LocationName'];
					
					if($meters['LocationName']=="AFS project-C"){ 
						$resdata['consolidate'][$i][$k]['meter']="Container office";
					}else if($meters['LocationName']=="B4 Building"){
						$resdata['consolidate'][$i][$k]['meter']="A4 Building";
					}else if($meters['LocationName']=="Mains"){
						$resdata['consolidate'][$i][$k]['meter']="Main I/C (EB)";
					}else if($meters['LocationName']=="Fire Fighting"){
						$resdata['consolidate'][$i][$k]['meter']="Fire pump panel";
					}else if($meters['LocationName']=="LDB Pump"){
						$resdata['consolidate'][$i][$k]['meter']="LDB (Pump room)";
					}else if($meters['LocationName']=='PDB pump'){
						$resdata['consolidate'][$i][$k]['meter']='PDB Panel';
					}else if($meters['LocationName']=="LDB Street"){
						$resdata['consolidate'][$i][$k]['meter']="LDB (Street light panel)";
					}else{
						$resdata['consolidate'][$i][$k]['meter']=$meters['LocationName'];
					}
					$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'	ORDER BY TxnTime";
					
					
					$datacontoday = $this->db->query($queryconsutoday)->result();
					$resdata['consolidate'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
		
					$resdata['consolidate'][$i][$k]['date']=$datesarray[$k];
				
		
				
		
				
				}
				$i++;
				}
				
			}
		
        
	}

	$i=0;
		foreach($meter_list as $meters){

			if($meters['LocationName']=="AFS project-C"){ 
				$resdata['summery'][$i]['meter']="Container office";
			}else if($meters['LocationName']=="B4 Building"){
				$resdata['summery'][$i]['meter']="A4 Building";
			}else if($meters['LocationName']=="Mains"){
				$resdata['summery'][$i]['meter']="Main I/C (EB)";
			}else if($meters['LocationName']=="Fire Fighting"){
				$resdata['summery'][$i]['meter']="Fire pump panel";
			}else if($meters['LocationName']=="LDB Pump"){
				$resdata['summery'][$i]['meter']="LDB (Pump room)";
			}else if($meters['LocationName']=='PDB pump'){
				$resdata['summery'][$i]['meter']='PDB Panel';
			}else if($meters['LocationName']=="LDB Street"){
				$resdata['summery'][$i]['meter']="LDB (Street light panel)";
			}else{
				$resdata['summery'][$i]['meter']=$meters['LocationName'];
			}
			
			
			$totaldays=count($datesarray);
			//$resdata['summery']['meter']=$dashboardName;
			$tcons=0;
			$hldata1=array();
			for($t=0;$t<$totaldays;$t++){
				$queryconsucum="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$t]."' AND LineConnected='kWh' ";
				$dataconcum = $this->db->query($queryconsucum)->result_array();	
				$tcons+=$dataconcum[0]['cons'];
				$hldata[$t]['con']=$dataconcum[0]['cons'];
				$hldata[$t]['date']=$datesarray[$t];

				array_push($hldata1,$dataconcum[0]['cons']);
			}
		
			$resdata['summery'][$i]['totalconsumption']=round($tcons,2);
			$resdata['summery'][$i]['avgperday']=round($tcons/$totaldays,2);
			$resdata['summery'][$i]['totaldays']=$totaldays;
			$resdata['summery'][$i]['min']=round(min($hldata1),2);
			$resdata['summery'][$i]['max']=round(max($hldata1),2);
			 foreach($hldata as $row){
				 if($row['con']==min($hldata1)){
					$resdata['summery'][$i]['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
				 }else if($row['con']==max($hldata1)){
					$resdata['summery'][$i]['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
				 }
			 }
			 $i++;
		}
		$i=0;
		foreach($meter_list as $meters){

			if($meters['LocationName']=="AFS project-C"){ 
				$resdata['PF'][$i]['meter']="Container office";
			}else if($meters['LocationName']=="B4 Building"){
				$resdata['PF'][$i]['meter']="A4 Building";
			}else if($meters['LocationName']=="Mains"){
				$resdata['PF'][$i]['meter']="Main I/C (EB)";
			}else if($meters['LocationName']=="Fire Fighting"){
				$resdata['PF'][$i]['meter']="Fire pump panel";
			}else if($meters['LocationName']=="LDB Pump"){
				$resdata['PF'][$i]['meter']="LDB (Pump room)";
			}else if($meters['LocationName']=='PDB pump'){
				$resdata['PF'][$i]['meter']='PDB Panel';
			}else if($meters['LocationName']=="LDB Street"){
				$resdata['PF'][$i]['meter']="LDB (Street light panel)";
			}else{
				$resdata['PF'][$i]['meter']=$meters['LocationName'];
			}
			

			$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$pf = $this->db->query($querypowerfactor)->result();
			$resdata['PF'][$i]['pf_data']=$pf;

			$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$c1 = $this->db->query($querycurrent1)->result();
			$resdata['PF'][$i]['c1_data']=$c1;

			$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$c2 = $this->db->query($querycurrent2)->result();
			$resdata['PF'][$i]['c2_data']=$c2;

			$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$c3 = $this->db->query($querycurrent3)->result();
			$resdata['PF'][$i]['c3_data']=$c3;

			$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$v1 = $this->db->query($queryvolt1)->result();
			$resdata['PF'][$i]['v1_data']=$v1;

			$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$v2 = $this->db->query($queryvolt2)->result();
			$resdata['PF'][$i]['v2_data']=$v2;

			$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
			$v3 = $this->db->query($queryvolt3)->result();
			$resdata['PF'][$i]['v3_data']=$v3;

			
			 $i++;
		}
					

		return $resdata;
	}
	function get_hardwares_device_data_power($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-08-20";
		$table_name=$this->get_table_name($station_id);
		$check=$this->Api_data_model->check_data('Electricity Board',$table_name);
		if($check){
			$queryeb="SELECT `CurReading` FROM `hardware_station_consumption_data_lonavala` WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='Electricity Board' AND `LineConnected`='E.B. Supply' ORDER BY TxnTime DESC LIMIT 1";

			$querydg="SELECT `CurReading` FROM `hardware_station_consumption_data_lonavala` WHERE `TxnDate`='".$todayDate."' AND `UtilityName`='Diesel Generator' AND `LineConnected`='D.G. Supply' ORDER BY TxnTime DESC LIMIT 1";
			$dataEB = $this->db->query($queryeb)->result();
			$dataDG = $this->db->query($querydg)->result();
           if($dataEB[0]->CurReading==1 && $dataDG[0]->CurReading==0){
			   $resdata['ebstatus']=1;
			   $resdata['dgstatus']=0;
			   $resdata['trip']='No Trip';
			   $resdata['meter']='Power Supply';


		   }else if($dataEB[0]->CurReading==0 && $dataDG[0]->CurReading==1){
				$resdata['ebstatus']=0;
			   $resdata['dgstatus']=1;
			   $resdata['trip']='No Trip';
			   $resdata['meter']='Power Supply';
		   }else{
			$resdata['ebstatus']=0;
			$resdata['dgstatus']=0;
			$resdata['trip']='Trip';
			$resdata['meter']='Power Supply';
		   }

		}else{
			$resdata['ebstatus']='NA';
			$resdata['dgstatus']='NA';
			$resdata['trip']='NA';
			$resdata['meter']='Power Supply';
		}
		return $resdata;
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
	
	function get_hardwares_device_data_switch_status($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
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
				$mcboff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb-Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcboffdata = $this->db->query($mcboff)->result_array();

				$mcbon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb On' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbondata = $this->db->query($mcbon)->result_array();
				
				$mcbtrip="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb Trip' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbtripdata = $this->db->query($mcbtrip)->result_array();
				
				$yphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='Y-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$yphasedata = $this->db->query($yphase)->result_array();
				//echo $yphase;die();
				$rphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='R-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$rphasedata = $this->db->query($rphase)->result_array();
				//echo $rphasedata[0]['CurReading'];die();
				$bphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='B-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$bphasedata = $this->db->query($bphase)->result_array();

				
				if($meters['LocationName']=='DG Room'){
					$resdata[$i]['meter']='DG I/C';
				}else if($meters['LocationName']=="Mains"){
					$resdata[$i]['meter']='Main I/C (EB)';
				}else{
					$resdata[$i]['meter']=$meters['LocationName'];
				}

				if($mcboffdata[0]['CurReading']==0 && $mcbondata[0]['CurReading']==1){
					$resdata[$i]['status']='On';
				}else{
					$resdata[$i]['status']='Off';
				}

				if($mcbtripdata[0]['CurReading']==0){
					$resdata[$i]['trip']='no';
				}else{
					$resdata[$i]['trip']='yes';
				}

				$resdata[$i]['phase']['meter']=$meters['LocationName'];
				if($yphasedata[0]['CurReading']==1){
					$resdata[$i]['phase']['yphase']='on';
				}else{
					$resdata[$i]['phase']['yphase']='off';
				}
				if($rphasedata[0]['CurReading']==1){
					$resdata[$i]['phase']['rphase']='on';
				}else{
					$resdata[$i]['phase']['rphase']='off';
				}
				if($bphasedata[0]['CurReading']==1){
					$resdata[$i]['phase']['bphase']='on';
				}else{
					$resdata[$i]['phase']['bphase']='off';
				}
				


			}else{

				if($meters['LocationName']=='PDB pump'){
					$pon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
					
	
					$poff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power On' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
					$poffdata = $this->db->query($poff)->result_array();
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
				$resdata[$i]['meter']='A4 Building';
			}else if($meters['LocationName']=='Fire Fighting'){
				$resdata[$i]['meter']='Fire Pump Panel';
			}else if($meters['LocationName']=='LSB'){
				$resdata[$i]['meter']='LSB panel I/C';
			}else if($meters['LocationName']=='PDB pump'){
				$resdata[$i]['meter']='PDB Panel';
			}else if($meters['LocationName']=='SB'){
				$resdata[$i]['meter']='APFC Panel I/C';
			}else{
				$resdata[$i]['meter']=$meters['LocationName'];
			}	
			if($meters['LocationName']=='Hyd.Pneu.System'){
				$resdata[$i]['status']='On';
				$resdata[$i]['trip']='no';
			}else{
				if($poffdata[0]['CurReading']==0 && $pondata[0]['CurReading']==1){
					$resdata[$i]['status']='On';
				}else{
					$resdata[$i]['status']='Off';
				}
				if($tripdata[0]['CurReading']==0){
					$resdata[$i]['trip']='no';
				}else{
					$resdata[$i]['trip']='yes';
				}
			}
				
			}
			
			  $i++;

			


		}
		//echo json_encode($resdata);die();
		//die();
		return $resdata;
	}
	function foo($seconds) {
		$t = round($seconds);
		return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
	  }
	function get_hardwares_device_data_switch_status_report($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$LocationName=$data['LocationName'];
		// echo $station_id;die();
		$dashboardName=$data['dashboard_name'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_meter_list($table_name);
		$i=0;
		foreach($meter_list as $meters){

		
        for ($k=0; $k < count($datesarray); $k++)
        { 
			
			
			$poff="SELECT * FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='Power On' and MeterName='Status Monitor' and CurReading=0 ORDER BY TxnTime desc";
			

			$datacontoday = $this->db->query($poff)->result();
			// $gettime="SELECT * FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='Power On' and MeterName='Status Monitor'  ORDER BY TxnTime desc";			

			// $datatime = $this->db->query($gettime)->result_array();
			//echo $datatime[0]['TxnTime'];die();
			$min=0;
			for ($b=0; $b < count($datacontoday); $b++) {
				$min+=20;

				# code...
			}
			$todayDate=date("Y-m-d");
			if($todayDate==$datesarray[$k]){
				
				$resdata[$i]['offhours']="NA";
			   	$resdata[$i]['onhours']="NA";
			}else{
				$onHours=86400-($min*60);
				$resdata[$i][$k]['offhours']=$this->foo($min*60);
			    $resdata[$i][$k]['onhours']=$this->foo($onHours);
			}
			
			$resdata[$i][$k]['meter']=$meters['LocationName'];
			
			$resdata[$i][$k]['date']=$datesarray[$k];

			//echo json_encode($resdata);die();
		

		

		
		}
		$i++;
	}
		

		return $resdata;
	}
	function get_meter_list_by_tower($table_name,$tower){
		$this->db->select('LocationName');
        $this->db->from($table_name);     
        $this->db->where('LocationGroup',$tower); 
		$this->db->where('UomName','Status'); 
         $this->db->group_by('LocationName');
		 $this->db->order_by('LocationName','desc');
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
				
				//echo $emergency; die();
				$emergencydata = $this->db->query($emergency)->result_array();
				if($meters['LocationName']=='Lobby'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='5th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='40th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='40th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='2nd Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='14th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='21th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor' || $meters['LocationName']=='23th Floor' || $meters['LocationName']=='16th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else{
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}

				
				$non_emergencydata = $this->db->query($non_emergency)->result_array();
				$resdata[$tower][$i]['hardware_name']=$meters['LocationName'];
				if($emergencydata[0]['CurReading']==0){
					$resdata[$tower][$i]['emergency_status']="off";
				}else{
					$resdata[$tower][$i]['emergency_status']="on";
				}
				if($non_emergencydata[0]['CurReading']==0){
					$resdata[$tower][$i]['non_emergency_status']="off";
				}else{
					$resdata[$tower][$i]['non_emergency_status']="on";
				}
				// if($emergencydata[0]['CurReading']==0){
				// 	$resdata[$tower][$i]['emergency_status']="on";
				// }else{
				// 	$resdata[$tower][$i]['emergency_status']="on";
				// }
				// if($non_emergencydata[0]['CurReading']==0){
				// 	$resdata[$tower][$i]['non_emergency_status']="on";
				// }else{
				// 	$resdata[$tower][$i]['non_emergency_status']="on";
				// }
				$i++;

			}
			
			//print_r($meter_list);die();

		}
		//$meter_list=$this->get_meter_list($table_name);
		
		//echo json_encode($resdata);die();
		//die();
		return $resdata;
	}
	function get_hardwares_device_data_dg_firepump($table_name){
		
		
		$todayDate=date("Y-m-d");
		

		
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND UtilityName='New Fire Pump' AND LineConnected='Fuel Level' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		//echo $startEndFuelQuery;die();

		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Engine Run' and MeterSerial='0069'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled' and MeterSerial='0069'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata['fadd']=$dataAdd[0]->fadd;


		$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='New Fire Pump' and MeterSerial='0069' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
		//echo $queryRuntimes;die();
		$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

		$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$todayDate."' AND LineConnected='Engine Run' and MeterSerial='0069'  AND Consumption>0";
		

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
		
		$resdata['economy']=$finaleco;
		$resdata['availableFuel']=$dataStartEndFuel[0]->end;
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/750)*100);

		$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata['voltage']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='New Fire Pump' and MeterSerial='0069' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata['status']=$status;
		
		
		

		




		return $resdata;
		
	}
	function get_hardwares_device_data_dg_firepump1($table_name){
		
		
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
		
		$resdata['economy']=$finaleco;
		$resdata['availableFuel']=$dataStartEndFuel[0]->end;
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/150)*100);

		$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='Old Fire Pump' and MeterSerial='0068' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata['voltage']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='Old Fire Pump' and MeterSerial='0068' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata['status']=$status;
		
		return $resdata;
		
	}
	function get_hardwares_device_data($data){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		//$todayDate="2021-10-15";

		$check=$this->Api_data_model->check_data($hardware_name,$table_name);
		if($check){
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		//echo $startEndFuelQuery;die();

		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata['fadd']=$dataAdd[0]->fadd;


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
		$resdata['availableFuel']=$dataStartEndFuel[0]->end;
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/380)*100);

		$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata['voltage']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata['status']=$status;
		$resdata['dgname']=$hardware_name;
		$graphdata=$this->Api_data_model->graph_data($hardware_name,$todayDate,$table_name);
		$resdata['graph']=$graphdata;
		}else{
			$resdata['run']="NA";
			$resdata['fadd']="NA";
			$resdata['fremove']="NA";
			$resdata['fconsume']="NA";
			$resdata['economy']="NA";
			$resdata['availableFuel']="NA";
			$resdata['voltage']="NA";
			$resdata['status']="NA";
			$resdata['dgname']=$hardware_name;
			$resdata['graph']=array();


		}

		




		return $resdata;
		
	}
	
	function get_hardware_api_data($hdata)
	 {
		
		$station_id=$hdata['station_id'];
		$hardware_name=$hdata['api_name'];
		// $hardware_name='CT_Fan';
		// $todayDate=date("Y-m-d");
		$todayDate='2020-07-11';
		$tt=0 ;
		$tsh=0;
		for ($i=0; $i < 24; $i++) 
		{                     
		  $diff=0;
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
		  $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM hardware_station_consumption_data where LineConnected='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
	// echo $queryD;
		  $data1D = $this->db->query($queryD)->result();
		 
		  $rmin=0;
		  if(count($data1D)!=0)
		  {
			if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1)
			{
			  $checkTime = strtotime($data1D[0]->ToTime);
			  $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
			  $diff = $checkTime - $loginTime;
			  $rmin=gmdate("i", abs($diff));
			}
			else
			{
			  $checkTime = strtotime($data1D[0]->FromTime);
			  $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
			  $diff = $checkTime - $loginTime;
			  $rmin=gmdate("i", abs($diff));

			}      
		  }
		  else
		  {
			$rmin="0";
		  }

		  if(abs($diff)>=3600)
		  {
			$diff=3599;
		  }
		  $tt=gmdate("i", abs($diff));
		  if($tt>54)
		  {
			$tt=60;
		  }
		  // echo $tt."<br>";
		  $tsh+=$tt;
				  
		}
			
		$queryStatus="SELECT TxnDate,FromTime,ToTime,PrvReading,CurReading  FROM hardware_station_consumption_data where LineConnected='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."'";
		$dataStatus = $this->db->query($queryStatus)->result();
		
		
		
		$hardwaredata= array();
		$hours = floor($tsh / 60);
		$min = $tsh - ($hours * 60);
		
		if(count($dataStatus)>0){
			$hardwaredata['meter']=$hardware_name;
			$hardwaredata['status']=$dataStatus[count($dataStatus)-1]->CurReading;
			$hardwaredata['RunningHours']=$hours." Hours ".$min." Min";
			$hardwaredata['livedata']="LIVE DATA";
		}else{
			$hardwaredata['meter']=$hardware_name;
			$hardwaredata['status']=0;
			$hardwaredata['RunningHours']=$hours." Hours ".$min." Min";
			$hardwaredata['livedata']="SAMPLE DATA";
		}
		// echo $this->db->last_query();exit;
		// echo "<pre>";print_r($hardwaredata);exit;
		return $hardwaredata;
	  }
	  
	  function getDashBoardData($locations){
		  
		$station_id=$this->session->userdata('station_id');
		
		if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
		
        $todayDate=date('Y-m-d');
        // $todayDate='2020-07-11';
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        //$yesterDay = "'".$yesterDay."'";
        //lastweek
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
		$resultArray=array();
        for ($i=0; $i <count($locations) ; $i++) { 
            // echo $locations[$i]->api_name;exit;
            //today
            $query="SELECT PrvReading,CurReading,Consumption,TxnDate,TxnTime FROM ".$table." where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            
			
            $data = $this->db->query($query)->result();
			// ECHO $this->db->last_query();exit;
            $query1="SELECT SUM(Consumption) as Consumption FROM ".$table." where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'";
            $data1 = $this->db->query($query1)->result();
			
			// ECHO $this->db->last_query();exit;
           
            //yesterday
            $query2="SELECT SUM(Consumption) as Consumption FROM ".$table." where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$yesterDay."'";
            $data2 = $this->db->query($query2)->result();
             
            //lastweek
            $query3="SELECT SUM(Consumption) as Consumption FROM ".$table." where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' and Consumption<20";
           
            $data3 = $this->db->query($query3)->result();
           
              $queryautosjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM ".$table." where LineConnected='".$locations[$i]->LineConnectedAuto."' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
			  
			  
            $querymanualsjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM ".$table." where LineConnected='".$locations[$i]->LineConnectedManual."' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
			
            $dataasjp = $this->db->query($queryautosjp)->result();
            $datamsjp = $this->db->query($querymanualsjp)->result();

            if(count($dataasjp)>0){
				if($dataasjp[0]->CurReading==0 && $datamsjp[0]->CurReading==0){
					$resultArray[$i]['SwitchStatus']='OFF';
				}
				if($dataasjp[0]->CurReading==0 && $datamsjp[0]->CurReading==1){
					$resultArray[$i]['SwitchStatus']='Manual';
				}
				if($dataasjp[0]->CurReading==1 && $datamsjp[0]->CurReading==0){
					$resultArray[$i]['SwitchStatus']='Auto';
				}
			   
				
				$resultArray[$i]['meter']=$locations[$i]->api_name;
				$resultArray[$i]['RunningStatus']=$data[0]->Consumption;
				// $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
				
				$resultArray[$i]['TodayRunn']=$data1[0]->Consumption;
				$resultArray[$i]['YesterdayRunn']=$data2[0]->Consumption;
				$resultArray[$i]['LastWeekRunn']=$data3[0]->Consumption;
			}else{
				
                $resultArray[$i]['SwitchStatus']='NA';
				
			   
				
				$resultArray[$i]['meter']=$locations[$i]->api_name;
				$resultArray[$i]['RunningStatus']=2;
				// $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
				
				$resultArray[$i]['TodayRunn']="NA";
				$resultArray[$i]['YesterdayRunn']="NA";
				$resultArray[$i]['LastWeekRunn']="NA";
				}
        }

        //print_r($resultArray);
       return $resultArray;
    }
	
	function getPressureToday($LineConnected){
		
		if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
      // $todayDate=date('Y-m-d');
      $todayDate=date('2021-01-23');
      $querypressure="SELECT round(CurReading*0.076,2) as CurReading,TxnTime  FROM ".$table." where LineConnected='".$LineConnected."' AND TxnDate='".$todayDate."' and StationId='".$this->session->userdata('station_id')."' order by TxnTime";
        $datapressure = $this->db->query($querypressure)->result();
		 // echo $this->db->last_query();exit; 
        return $datapressure;
    }
	
	function getWaterLevel($api_name){
    	// echo "<pre>";print_r($api_name);exit;
    	$todayDate=date('2021-01-23');
		if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
		$query="select id,UtilityName,LocationName,TxnDate, FromTime, ToTime, Consumption ,UomScale,Multiplier from ".$table." where TxnDate='".$todayDate."'  and StationId='".$this->session->userdata('station_id')."' and LocationName='".$api_name."'  order by ToTime desc limit 1";
		
        /*$query="select id, LocationName as UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from ( select id, LocationName,TxnDate, FromTime, ToTime, Consumption ,UomScale from ".$table." where TxnDate=".$todayDate."  and StationId='".$this->session->userdata('station_id')."' and LocationName='".$api_name."'  order by ToTime desc ) as sub where id=sub.id group by sub.LocationName limit 1";
		  $query="select id, LocationName as UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from ".$table." where TxnDate=".$todayDate."  and StationId='".$this->session->userdata('station_id')."' and LocationName='".$api_name."'  order by ToTime desc  limit 1";*/
         // echo $query;exit;
		$data = $this->db->query($query)->row();
    	return $data;

    }
	
	function getAHUData($data){
		$date =date('Y-m-d');
		$result=array();
  		for ($i1=0; $i1 < count($data); $i1++) { 
  			//$replaced = str_replace('_', ' ', $data[$i]['meter']);
        $meter = "'".$data[$i1]->MeterName."'";
        $query="select id, LineConnected,LocationName,UomScale,TxnDate, FromTime, ToTime, CurReading,Consumption from (
        select id, LineConnected,TxnDate, FromTime, ToTime, CurReading,Consumption ,LocationName,UomScale from protech_bms.hardware_station_consumption_data_apollo where
         TxnDate='".$date."' and LocationName=".$meter." and StationId='2018000087'  order by id desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        //echo $query;die();
		$hvacData = $this->db->query($query)->result();


    	if(count($hvacData)>0){


    //echo $hvacData[0]->UtilityName;die();
    	for ($i=0; $i < count($hvacData); $i++) {
    		if($hvacData[$i]->LineConnected=='Actuator Level'){
    			$result[$i1]['Actuator Level']=$hvacData[$i]->Consumption;

    		}
    		if($hvacData[$i]->LineConnected=='Return Air Temp'){
    			$result[$i1]['Return Air Temp']=$hvacData[$i]->CurReading;
    		}
    		if($hvacData[$i]->LineConnected=='Supply Air Temp'){
    			$result[$i1]['Supply Air Temp']=$hvacData[$i]->CurReading;
    		}
    		if($hvacData[$i]->LineConnected=='Filter Pressure'){
    			$result[$i1]['Filter Pressure']=$hvacData[$i]->Consumption."Pa";
    		}
    		if($hvacData[$i]->LineConnected=='CHWS Temp'){
    			$result[$i1]['CW Sup Temp']=$hvacData[$i]->CurReading;
    		}
    		if($hvacData[$i]->LineConnected=='CHWR Temp'){
    			$result[$i1]['CH Ret Temp']=$hvacData[$i]->CurReading;
    		}
    		if($hvacData[$i]->LineConnected=='Delta T'){
    			$result[$i1]['Delta T']=$hvacData[$i]->Consumption."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Set Temp'){
    			$result[$i1]['Set_Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Unit Status'){
    			$result[$i1]['Unit_Status']=$hvacData[$i]->UomScale;
    		}

    	
    		# code...
    	}
    	$result[$i1]['Date']=$hvacData[0]->TxnDate;
    	$result[$i1]['Time']=$hvacData[0]->FromTime;

    	$result[$i1]['LocationName']=$hvacData[0]->LocationName;
    	$result[$i1]['meter']=$data[$i1]->MeterName;
    	$result[$i1]['data']=1;

    	
    }else {
        $result[$i1]['meter']=$data[$i1]->MeterName;
        $result[$i1]['data']=0;
    	

    }
  		}
        //echo json_encode($result);die();
    	return $result;

	}
	 function getHavcList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM hardware_station_consumption_data_apollo WHERE UtilityName='HVAC' and MeterType=17";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    function getahuReport($date,$meter){
    	//print_r($data);die();
        $resultArray=array();
        

        $meter = "'".$meter."'";
        $date = "'".$date."'";

        $queryrat="SELECT TxnTime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Return Air Temp'";
    //echo $queryrat;die();
        $querysat="SELECT TxnTime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Supply Air Temp' ";    
        $queryrwt="SELECT TxnTime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWR Temp'";
         $queryswt="SELECT TxnTime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWS Temp'";

         $queryactu="SELECT TxnTime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Actuator Level'";
         $querystmp="SELECT TxnTime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Set Temp' ";
         $querypressure="SELECT TxnTime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Filter Pressure'";
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
 
            $queryrr="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Unit RHT' and TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
            
            
            $rundata = $this->db->query($queryrr)->result();
            // echo $querygood;die();
            if($rundata[0]->Consumption>10){
                $run=60;
            }
            else{
               $run=$rundata[0]->Consumption; 
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['rh']=$run;
            
            
           

        }
        // $queryruntime="SELECT Fromtime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Unit Run Time' and FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ";

         $datarat = $this->db->query($queryrat)->result();
         $datasat = $this->db->query($querysat)->result();
         $datarwt = $this->db->query($queryrwt)->result();
         $dataswt = $this->db->query($queryswt)->result();
         $dataactu = $this->db->query($queryactu)->result();
         $datastemp = $this->db->query($querystmp)->result();
         $datapressure = $this->db->query($querypressure)->result();
        // $datarun = $this->db->query($queryruntime)->result();
        
            
              $resultArray[0]['rat']=$datarat;
              $resultArray[0]['sat']=$datasat;
              $resultArray[0]['rwt']=$datarwt;
              $resultArray[0]['swt']=$dataswt;
              $resultArray[0]['actu']=$dataactu;
              $resultArray[0]['stemp']=$datastemp;
              $resultArray[0]['pressure']=$datapressure;
              $resultArray[0]['run']=$fulldata;


          
     return $resultArray;
    }
	
	
	/* water level */
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
	
	
	function getwaterleveldata($data)
    {
        
        // $date = "'".$data['date']."'";
        $date = "'2021-01-23'";
        if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
        
        $query="select id,UtilityName,LocationName,TxnDate, FromTime, ToTime, Consumption ,UomScale,Multiplier from ".$table." where TxnDate=".$date."  and StationId='".$data['StationId']."' and LocationName='".$data['LocationName']."'  order by ToTime desc limit 1";
        // echo $query;die();
        $data = $this->db->query($query)->result();
		// echo $this->db->last_query();exit;
        return $data;

    }
	function empName($emp_id){
		$this->db->select('firstname,lastname');
		$this->db->from('employees');
		$this->db->where('emp_id', $emp_id);			
		
		$res = $this->db->get()->row_array();
		return $res['firstname']." ".$res['lastname'];
	}
	function getMeterList($emp_id){      

		

		$this->db->select('h.schedule_id,h.meter_id,h.to_reading,h.emp_id,hc.dashboard_name as meter_name');
		$this->db->from('water_meter_management as h');
		$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
		
		$this->db->where('h.emp_id', $this->session->userdata('user_id'));			
		
		
		//$this->db->order_by('h.to_reading');
		$this->db->group_by('h.meter_id');
		
		
		$res = $this->db->get()->result_array();
		//echo $this->db->last_query();exit;
		return $res;

	}
	function getMeterList_byid($emp_id,$meter_id){      

		

		$this->db->select('h.schedule_id,h.meter_id,h.to_reading,h.emp_id,hc.dashboard_name as meter_name');
		$this->db->from('water_meter_management as h');
		$this->db->join('hardware as hc', 'hc.hardware_id=h.meter_id','left');
		
		$this->db->where('h.emp_id', $this->session->userdata('user_id'));
		$this->db->where('h.meter_id', $meter_id);			
		
		
		//$this->db->order_by('h.to_reading');
		//$this->db->group_by('h.meter_id');
		
		
		$res = $this->db->get()->result_array();
		//echo $this->db->last_query();exit;
		return $res;

	}
	function update_water_readings($data){
		//echo json_encode($data);die();
		$emp_id=$this->session->userdata('user_id');
		$client_id=$this->session->userdata('created_by');
		if($data['prv_today_reading']=='NA' && $data['today_reading'] !=''){
			$insdata=array(
                'meter_id' => $data['meter_id'],
                'meter_name' => $data['meter_name'],                
                'meter_reading' => $data['today_reading'],
                'meter_photo' => "NA",
                'client_id' => $client_id,
                'emp_id' => $emp_id,                
                'schedule_id' => '',
				'verify' => 1,
                'location' => 'Chennai',
                'reading_from' => "Web",
                'created_date' => date('Y-m-d H:i:s'),
                'updated_date' => date('Y-m-d H:i:s'),
                'date' => $data['today_date']              


            );
			$this->db->insert('water_meter_readings', $insdata);
            

		}if($data['prv_yesterday_reading']=='NA' && $data['yesterday_reading'] !=''){
			$insdata=array(
                'meter_id' => $data['meter_id'],
                'meter_name' => $data['meter_name'],                
                'meter_reading' => $data['yesterday_reading'],
                'meter_photo' => "NA",
                'client_id' => $client_id,
                'emp_id' => $emp_id,                
                'schedule_id' => '',
                'location' => 'Chennai',
                'reading_from' => "Web",
				'verify' => 1,
                'created_date' => date('Y-m-d H:i:s'),
                'updated_date' => date('Y-m-d H:i:s'),
                'date' => $data['yesterday_date']              


            );
			$this->db->insert('water_meter_readings', $insdata);

		}
		if($data['prv_yesterday_reading'] !='NA' && $data['yesterday_reading'] !=''){

			$updatedata=array(
                                
                'meter_reading' => $data['yesterday_reading'],
                
                'reading_from' => "Web",
				'verify' => 1,
                'updated_date' => date('Y-m-d H:i:s')              


            );
			$this->db->update('water_meter_readings', $updatedata, array('meter_id' => $data['meter_id'],'date' => $data['yesterday_date']));

		}
		if($data['prv_today_reading'] !='NA' && $data['today_reading'] !=''){

			$updatedata=array(
                                
                'meter_reading' => $data['today_reading'],
                
                'reading_from' => "Web",
				'verify' => 1,
               
                'updated_date' => date('Y-m-d H:i:s')              


            );
			$this->db->update('water_meter_readings', $updatedata, array('meter_id' => $data['meter_id'],'date' => $data['today_date']));

		}
		if($data['prv_today_reading'] !='NA' || $data['prv_yesterday_reading'] !='NA' || $data['today_reading'] !='' && $data['today_reading'] !=''){

			$updatedata=array(
                                
                
				'verify' => 1,
               
                'updated_date' => date('Y-m-d H:i:s')              


            );
			$this->db->update('water_meter_readings', $updatedata, array('meter_id' => $data['meter_id'],'date' => $data['today_date']));

		}
		            


		// );
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
	function getChecking(){
		$query="SELECT * FROM `water_meter_readings` WHERE `date`='".date('Y-m-d')."'";
		$data = $this->db->query($query)->result_array();
		if(count($data)==5){
		return true;
		}else{
			return false;
		}
	}
	function get_water_meter_data($date){
		if($date!=''){
			$todayDate=$date;
			$yesterDay = date('Y-m-d',strtotime('-1 day', strtotime($date)));
		}else{
			$todayDate=date('Y-m-d');
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
		}
		
		$time=$this->getReadingTime();
		$check_reading_all=$this->getChecking();
		$table_name='';
		//$meters=$this->getChecking();
		$meter_list=$this->get_meters_name($table_name);
		//if($check_reading_all){
		$i=0;
		$k=0;
		$yest=0;
		$cons=0;
		foreach($meter_list as $meters){
			
					$querywaterlevel="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";

					$querywaterlevel2="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$yesterDay."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."'  AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";

					$querywaterlevelCurrent="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."'    ORDER BY TxnTime DESC limit 1";
		//echo $querywaterlevel;die();
			$data1 = $this->db->query($querywaterlevel)->result_array();
			$data2 = $this->db->query($querywaterlevel2)->result_array();
			$data3 = $this->db->query($querywaterlevelCurrent)->result_array();

			if($meters['LocationName']=='Fire Water Sump'){
				$capacity=462000;
				$resultArray['readings'][$i]['today_reading']=round(($data1[0]['CurReading']*1.61)/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round(($data3[0]['CurReading']*1.61)/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round(($data2[0]['CurReading']*1.61)/1000)." KL";
				$resultArray['readings'][$i]['filled']=round((($data1[0]['CurReading']*1.61)/$capacity)*100);
				$k=$k+round(($data1[0]['CurReading']*1.61)/1000);
				$cons=$cons+(round(($data1[0]['CurReading']*1.61)/1000)-round(($data2[0]['CurReading']*1.61)/1000));
				$yest=$yest+round(($data2[0]['CurReading']*1.61)/1000);
				$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}else if($meters['LocationName']=='Dom. Water Sump'){
				$capacity=840000;
				$resultArray['readings'][$i]['today_reading']=round(($data1[0]['CurReading']*2.8)/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round(($data3[0]['CurReading']*2.8)/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round(($data2[0]['CurReading']*2.8)/1000)." KL";
				$resultArray['readings'][$i]['filled']=round((($data1[0]['CurReading']*2.8)/$capacity)*100);
				$k=$k+round(($data1[0]['CurReading']*2.8)/1000);
				$cons=$cons+(round(($data1[0]['CurReading']*2.8)/1000)-round(($data2[0]['CurReading']*2.8)/1000));
				$yest=$yest+round(($data2[0]['CurReading']*2.8)/1000);
				$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}else{
				$capacity=143000;
				$resultArray['readings'][$i]['today_reading']=round($data1[0]['CurReading']/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round($data3[0]['CurReading']/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round($data2[0]['CurReading']/1000)." KL";
				$resultArray['readings'][$i]['filled']=round(($data1[0]['CurReading']/$capacity)*100);
				$k=$k+round($data1[0]['CurReading']/1000);
				$cons=$cons+(round($data1[0]['CurReading']/1000)-round($data2[0]['CurReading']/1000));
			$yest=$yest+round($data2[0]['CurReading']/1000);
			$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}
			$resultArray['readings'][$i]['meter']=$meters['LocationName'];
			//$resultArray['readings'][$i]['today_reading']=round($data1[0]['CurReading']/1000)." KL";
			//$resultArray['readings'][$i]['curr_reading']=round($data3[0]['CurReading']/1000)." KL";
			//$resultArray['readings'][$i]['filled']=round(($data3[0]['CurReading']/$capacity)/1000);
			//$resultArray['readings'][$i]['yesterday_reading']=round($data2[0]['CurReading']/1000)." KL";
			
			$resultArray['readings'][$i]['time']=$time;
			// $resultArray['readings'][$i]['filled']=round(($data1[0]['CurReading']/$capacity)*100);
			//$k=$k+round($data1[0]['CurReading']/1000);
			// $cons=$cons+(round($data1[0]['CurReading']/1000)-round($data2[0]['CurReading']/1000));
			// $yest=$yest+round($data2[0]['CurReading']/1000);


			
			
			$i++;
		// }
		
		}
		$res = $this->getMeterList($this->session->userdata('user_id'));
		$intake=0;
		$c=0;
		for($i=0; $i < count($res); $i++){
			//today
			$query_today="SELECT * FROM water_meter_readings where date='".$todayDate."' and meter_id='".$res[$i]['meter_id']."' ";
			$data_today = $this->db->query($query_today)->result_array();
			$query_yest="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$res[$i]['meter_id']."' ";					
			$data_yest = $this->db->query($query_yest)->result_array();
			if(count($data_today)>0 && count($data_yest)>0){
				$intake+=$data_today[0]['meter_reading']-$data_yest[0]['meter_reading'];
				$c++;
			}

			
			
		}
		$resultArray['volume']['today_total']=$k." KL";
		$resultArray['volume']['yesterday_total']=$yest." KL";
		if($c>4){
			$resultArray['volume']['yesterday_total_intake']=round($intake,2)." KL";
			if($intake==0){
				$resultArray['volume']['yesterday_total_consume']="NA";
			}else{
				$resultArray['volume']['yesterday_total_consume']= abs(round(($yest-$k)+($intake),2))." KL";
				// $resultArray['volume']['yesterday_total_consume']=abs(round($intake/1000,2)+$cons)." KL";
			}
			
			
		}else{
			    $resultArray['volume']['yesterday_total_intake']="NA";
			
				$resultArray['volume']['yesterday_total_consume']="NA";
		}
		
		
	// }else{
	// 	$i=0;
	// 	foreach($meter_list as $meters){
	// 		if($meters['LocationName'] != 'Fire Water Sump'){
	// 		$resultArray['readings'][$i]['meter']=$meters['LocationName'];
	// 		$resultArray['readings'][$i]['today_reading']="NA";
	// 		$resultArray['readings'][$i]['yesterday_reading']="NA";
	// 		$resultArray['readings'][$i]['tank_capacity']="NA";
	// 		$resultArray['readings'][$i]['time']="NA";
	// 		$resultArray['readings'][$i]['filled']="NA";
	// 		$i++;
	// 		}
	// 	}
	// 	$resultArray['volume']['today_total']="NA";
	// 	$resultArray['volume']['yesterday_total']="NA";
	// }
		return $resultArray;
		//echo json_encode($resultArray);die();
		

	}
	function getWaterMeterDashboardReport($fromdate,$todate){
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$resAll=array();
	
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

		
		//echo json_encode($datesarray);die();
		$time=$this->getReadingTime();
		$check_reading_all=$this->getChecking();
		$table_name='';		
		$meter_list=$this->get_meters_name($table_name);		
			for ($m=0; $m < count($datesarray); $m++)
			{ 
				$todayDate=$datesarray[$m];
				$yesterDay = date('Y-m-d',strtotime('-1 day', strtotime($datesarray[$m])));
		
		$i=0;
		$k=0;
		$yest=0;
		$cons=0;

		$fire_open=0;
		$domestic_open=0;
		$overhead_open=0;
		$bmc_sum=0;
		$tanker_sum=0;
		$ro_sum=0;
		
		$fire_close=0;
		$domestic_close=0;
		$overhead_close=0;
		foreach($meter_list as $meters){
			
					$querywaterlevel="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";

					$querywaterlevel2="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$yesterDay."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."'  AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";

					$querywaterlevelCurrent="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."'    ORDER BY TxnTime DESC limit 1";
		
					$data1 = $this->db->query($querywaterlevel)->result_array();
					$data2 = $this->db->query($querywaterlevel2)->result_array();
					$data3 = $this->db->query($querywaterlevelCurrent)->result_array();

					if($meters['LocationName']=='Fire Water Sump'){
						$capacity=462000;						
						$k=$k+round(($data1[0]['CurReading']*1.61)/1000);
						$cons=$cons+(round(($data1[0]['CurReading']*1.61)/1000)-round(($data2[0]['CurReading']*1.61)/1000));
						$yest=$yest+round(($data2[0]['CurReading']*1.61)/1000);						
						$fire_open+=round(($data2[0]['CurReading']*1.61)/1000);
						$fire_close+=round(($data1[0]['CurReading']*1.61)/1000);
					}else if($meters['LocationName']=='Dom. Water Sump'){
						$capacity=840000;					
						$k=$k+round(($data1[0]['CurReading']*2.8)/1000);
						$cons=$cons+(round(($data1[0]['CurReading']*2.8)/1000)-round(($data2[0]['CurReading']*2.8)/1000));
						$yest=$yest+round(($data2[0]['CurReading']*2.8)/1000);						
						$domestic_open+=round(($data2[0]['CurReading']*2.8)/1000);
						$domestic_close+=round(($data1[0]['CurReading']*2.8)/1000);
					}else{
						$capacity=143000;						
						$k=$k+round($data1[0]['CurReading']/1000);
						$cons=$cons+(round($data1[0]['CurReading']/1000)-round($data2[0]['CurReading']/1000));
						$yest=$yest+round($data2[0]['CurReading']/1000);						
						$overhead_open+=round(($data2[0]['CurReading'])/1000);
						$overhead_close+=round(($data1[0]['CurReading'])/1000);
					}
						
								
					$i++;

		
		
		}
		            $resAll[$m]['fire_open_sum']=$fire_open."KL";
					$resAll[$m]['date']=$todayDate;
					$resAll[$m]['fire_close_sum']=$fire_close."KL";
					$resAll[$m]['domestic_open_sum']=$domestic_open."KL";	
					$resAll[$m]['domestic_close_sum']=$domestic_close."KL";
					$resAll[$m]['overhead_open_sum']=$overhead_open."KL";
					$resAll[$m]['overhead_close_sum']=$overhead_close."KL";
					
		$res = $this->getMeterList($this->session->userdata('user_id'));
		//echo json_encode($res);die();
		$intake=0;
		$bmc_intake=0;
		$tanker_intake=0;
		$ro_intake=0;
		$c=0;
		for($i=0; $i < count($res); $i++){
			//today
			$query_today="SELECT * FROM water_meter_readings where date='".$todayDate."' and meter_id='".$res[$i]['meter_id']."' ";
			$data_today = $this->db->query($query_today)->result_array();
			$query_yest="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$res[$i]['meter_id']."' ";					
			$data_yest = $this->db->query($query_yest)->result_array();
			if(count($data_today)>0 && count($data_yest)>0){
				$intake+=$data_today[0]['meter_reading']-$data_yest[0]['meter_reading'];
				$c++;
			}

			
			
		}
		for($i=0; $i < count($res); $i++){
			//today
			$query_today="SELECT * FROM water_meter_readings where date='".$todayDate."' and meter_id='".$res[$i]['meter_id']."' ";
			$data_today = $this->db->query($query_today)->result_array();
			$query_yest="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$res[$i]['meter_id']."' ";					
			$data_yest = $this->db->query($query_yest)->result_array();
			if($res[$i]['meter_id']==150 || $res[$i]['meter_id']==151 || $res[$i]['meter_id']==152){
				if(count($data_today)>0 && count($data_yest)>0){
					$bmc_intake+=$data_today[0]['meter_reading']-$data_yest[0]['meter_reading'];
					
				}
			}else if($res[$i]['meter_id']==153){
				if(count($data_today)>0 && count($data_yest)>0){
					$tanker_intake+=$data_today[0]['meter_reading']-$data_yest[0]['meter_reading'];
					
				}
			}else if($res[$i]['meter_id']==180){
				if(count($data_today)>0 && count($data_yest)>0){
					$ro_intake+=$data_today[0]['meter_reading']-$data_yest[0]['meter_reading'];
					
				}
			}
			

			
			
		}
		
		$resAll[$m]['bmc_in']=$bmc_intake."KL";
		$resAll[$m]['tanker_in']=$tanker_intake."KL";
		$resAll[$m]['ro_in']=$ro_intake."KL";
		if($c>4){
			
			if($intake==0){
				
				$resAll[$m]['total_consume']="NA";
			}else{
				
				$resAll[$m]['total_consume']=abs(round(($yest-$k)+($intake),2))." KL";
				// $resultArray['volume']['yesterday_total_consume']=abs(round($intake/1000,2)+$cons)." KL";
			}
			
			
		}else{
			$resAll[$m]['total_consume']="NA";
		}
	}
	
		return $resAll;
		
		

	}
	function get_water_readings($date){
		
		
			$res = $this->getMeterList($this->session->userdata('user_id'));
			//echo json_encode($res); die();
			if($date!=''){
				$todayDate=$date;
				$yesterDay = date('Y-m-d',strtotime('-1 day', strtotime($date)));
				
				//echo $todayDate." ===".$yesterDay;die();
				$resultArray=array();
				for($i=0; $i < count($res); $i++){
					//today
					$query1="SELECT * FROM water_meter_readings where date='".$todayDate."' and meter_id='".$res[$i]['meter_id']."' ";
					//echo $query1."<br>";
					$data1 = $this->db->query($query1)->result_array();	
					//print_r($data1);
					$resultArray[$i]['meter']=$res[$i]['meter_name'];
					$resultArray[$i]['meter_id']=$res[$i]['meter_id'];
					$resultArray[$i]['today_date']=$todayDate;
					$resultArray[$i]['verify']=$todayDate;
					$resultArray[$i]['yesterday_date']=$yesterDay;
					
					if(count($data1)>0)	{				
						
						$resultArray[$i]['today_reading']=$data1[0]['meter_reading'];
						$resultArray[$i]['reading_from']=$data1[0]['reading_from'];
						$resultArray[$i]['verify']=$data1[0]['verify'];
						$resultArray[$i]['today_reading_photo']=$data1[0]['meter_photo'];
						$resultArray[$i]['time']=date('h:i A',strtotime($data1[0]['created_date']));
						$resultArray[$i]['emp_name']=$this->empName($res[$i]['emp_id']);
						

					}else{
						$resultArray[$i]['today_reading']="NA";
						$resultArray[$i]['reading_from']="NA";
						$resultArray[$i]['verify']=0;
						$resultArray[$i]['today_reading_photo']=site_url().'asset/demoforall/Images/Blank.png';
						$resultArray[$i]['time']="NA";
						$resultArray[$i]['emp_name']="NA";
					}
				
					//yesterday
					$query2="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$res[$i]['meter_id']."' ";
					//echo $query2;
					$data2 = $this->db->query($query2)->result_array();
					//echo json_encode($data2);
					if(count($data2)>0)	{				
						
						$resultArray[$i]['yesterday_reading']=$data2[0]['meter_reading'];			
						

					}else{
						$resultArray[$i]['yesterday_reading']="NA";
						
					}
					
					if(count($data1)>0 && count($data2)>0){
						$resultArray[$i]['difference']=abs($data1[0]['meter_reading']-$data2[0]['meter_reading']);
					}else{
						$resultArray[$i]['difference']="NA";
					}
					
				}
				return $resultArray;
			}else{
					$todayDate=date('Y-m-d');
					$yesterDay = date('Y-m-d',strtotime("-1 days"));
					$resultArray=array();
					for($i=0; $i < count($res); $i++){
						//today
						$query1="SELECT * FROM water_meter_readings where date='".$todayDate."' and meter_id='".$res[$i]['meter_id']."' ";
						//echo $query1."<br>";
						$data1 = $this->db->query($query1)->result_array();	
						//print_r($data1);
						$resultArray[$i]['meter']=$res[$i]['meter_name'];
						$resultArray[$i]['meter_id']=$res[$i]['meter_id'];
						$resultArray[$i]['today_date']=$todayDate;
					    $resultArray[$i]['yesterday_date']=$yesterDay;
						
						if(count($data1)>0)	{				
							
							$resultArray[$i]['today_reading']=$data1[0]['meter_reading'];
							$resultArray[$i]['reading_from']=$data1[0]['reading_from'];
							$resultArray[$i]['verify']=$data1[0]['verify'];
							$resultArray[$i]['today_reading_photo']=$data1[0]['meter_photo'];
							$resultArray[$i]['time']=date('h:i A',strtotime($data1[0]['created_date']));
							$resultArray[$i]['emp_name']=$this->empName($res[$i]['emp_id']);

						}else{
							$resultArray[$i]['today_reading']="NA";
							$resultArray[$i]['reading_from']="NA";
							$resultArray[$i]['verify']=0;
							$resultArray[$i]['today_reading_photo']=site_url().'asset/demoforall/Images/Blank.png';
							$resultArray[$i]['time']="NA";
							$resultArray[$i]['emp_name']="NA";
						}
					
						//yesterday
						$query2="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$res[$i]['meter_id']."' ";
						//echo $query2;
						$data2 = $this->db->query($query2)->result_array();
						//echo json_encode($data2);
						if(count($data2)>0)	{				
							
							$resultArray[$i]['yesterday_reading']=$data2[0]['meter_reading'];			
							

						}else{
							$resultArray[$i]['yesterday_reading']="NA";
							
						}
						
						if(count($data1)>0 && count($data2)>0){
							$resultArray[$i]['difference']=abs($data1[0]['meter_reading']-$data2[0]['meter_reading']);
						}else{
							$resultArray[$i]['difference']="NA";
						}
						
					}
					return $resultArray;
			}

			
		
	}
	function get_water_readings_ajax($date,$meter_id){
		
		
		$res = $this->getMeterList_byid($this->session->userdata('user_id'),$meter_id);
		//echo json_encode($res); die();
		if($date!=''){
			$todayDate=$date;
			$yesterDay = date('Y-m-d',strtotime('-1 day', strtotime($date)));
			
			//echo $todayDate." ===".$yesterDay;die();
			$resultArray=array();
			for($i=0; $i < count($res); $i++){
				//today
				$query1="SELECT * FROM water_meter_readings where date='".$todayDate."' and meter_id='".$res[$i]['meter_id']."' ";
				//echo $query1."<br>";
				$data1 = $this->db->query($query1)->result_array();	
				//print_r($data1);
				$resultArray['meter']=$res[$i]['meter_name'];
				$resultArray['meter_id']=$res[$i]['meter_id'];
				$resultArray['today_date']=$todayDate;
				$resultArray['yesterday_date']=$yesterDay;
				//$resultArray['emp_name']=$this->empName($res[$i]['emp_id']);
				if(count($data1)>0)	{				
					
					$resultArray['today_reading']=$data1[0]['meter_reading'];
					$resultArray['reading_from']=$data1[0]['reading_from'];
					$resultArray['verify']=$data1[0]['verify'];
					if($data1[0]['meter_photo']=='NA'){
						$resultArray['today_reading_photo']=site_url().'asset/demoforall/Images/Blank.png';
					}else{
						$resultArray['today_reading_photo']=$data1[0]['meter_photo'];
					}
					
					$resultArray['time']=date('h:i A',strtotime($data1[0]['created_date']));
					

				}else{
					$resultArray['today_reading']="NA";
					$resultArray['reading_from']="NA";
					$resultArray['verify']=0;
					$resultArray['today_reading_photo']=site_url().'asset/demoforall/Images/Blank.png';
					$resultArray['time']="NA";
				}
			
				//yesterday
				$query2="SELECT * FROM water_meter_readings where date='".$yesterDay."' and meter_id='".$res[$i]['meter_id']."' ";
				//echo $query2;
				$data2 = $this->db->query($query2)->result_array();
				//echo json_encode($data2);
				if(count($data2)>0)	{				
					
					$resultArray['yesterday_reading']=$data2[0]['meter_reading'];	
					if($data2[0]['meter_photo']=='NA'){
						$resultArray['yesterday_reading_photo']=site_url().'asset/demoforall/Images/Blank.png';
					}else{
						$resultArray['yesterday_reading_photo']=$data2[0]['meter_photo'];
					}
							
					

				}else{
					$resultArray['yesterday_reading']="NA";
					$resultArray['yesterday_reading_photo']=site_url().'asset/demoforall/Images/Blank.png';
					
				}
				
				if(count($data1)>0 && count($data2)>0){
					$resultArray['difference']=abs($data1[0]['meter_reading']-$data2[0]['meter_reading']);
				}else{
					$resultArray['difference']="NA";
				}
				
			
			return $resultArray;
		}

	}
	
}
	
}