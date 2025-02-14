<?php
class Api_data_model_clustertruck extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	
	function get_categories($cat_id){
		$this->db->select('');
        $this->db->from('hardware_category');     
        $this->db->where('status',1);     
		$this->db->where('category_id', $cat_id);
        //  $this->db->where('created_by',$this->session->userdata('user_id'));       
         $this->db->order_by('category_name');
        $res = $this->db->get()->result_array();  
		echo $this->db->last_query();exit;     
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
	function get_devices_list_rsbros(){
		$this->db->select('*');
        $this->db->from('rsbrothers_vehicle_info');   
		$this->db->where('status',1);
		// $this->db->where('station_id','2022000276');
		//$this->db->order_by('api_name','desc');
		// $this->db->where('from','wis');SIS Mall DG-1
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
	function graph_data($name,$date,$db_table,$station_id){
		// $to=date("Y-m-d");
		$to = date('Y-m-d',strtotime("-1 days"));
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
			$check=$this->chech_dg_running($name,$datesarray[$k],$station_id);
			if(count($check)==1){
				$fulldata[$k]['time']=$check[0]['report_date'];;
				$fulldata[$k]['meter']=$check[0]['dg_name'];
				$fulldata[$k]['runninghrs']=(int)$check[0]['running_min2'];
			}else{
				$queryD = "SELECT SUM(Consumption) as run  FROM $db_table where UtilityName='".$name."'  AND LineConnected='DG_Running_Time' AND StationId='".$station_id."' AND TxnDate='".$datesarray[$k]."'   order by TxnTime";
				$data1D = $this->db->query($queryD)->result();
				$fulldata[$k]['time']=$datesarray[$k];
				$fulldata[$k]['meter']=$name;
				$fulldata[$k]['runninghrs']=(int)$data1D[0]->run;
			}
			
		}
		
		  
		  return $fulldata;

	}
	function graph_data_rs($name,$date,$db_table,$station_id){
		// $to=date("Y-m-d");
		$to = date('Y-m-d',strtotime("-1 days"));
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
			$check=$this->chech_dg_running_rs($name,$datesarray[$k],$station_id);
			if(count($check)>=1){
				$fulldata[$k]['time']=$check[0]['report_date'];;
				$fulldata[$k]['meter']=$check[0]['dg_name'];
				$fulldata[$k]['runninghrs']=(int)$check[0]['running_min2'];
				$fulldata[$k]['from']="db";
			}else{
				$queryD = "SELECT SUM(Consumption) as run  FROM $db_table where UtilityName='".$name."'  AND LineConnected='DG_Running_Time' AND StationId='".$station_id."' AND TxnDate='".$datesarray[$k]."'   order by TxnTime";
				$data1D = $this->db->query($queryD)->result();
				$fulldata[$k]['time']=$datesarray[$k];
				$fulldata[$k]['meter']=$name;
				$fulldata[$k]['runninghrs']=(int)$data1D[0]->run;
			}
			
		}
		
		  
		  return $fulldata;

	}
	function graph_data_rs_chk($dg_name,$date){
		$to = date('Y-m-d',strtotime("-1 days"));
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
			$check=$this->Api_data_model->chech_dg_running_rs($dg_name,$datesarray[$k],'');
			
				if(count($check)==1){
					$fulldata[$k]['time']=$check[0]['report_date'];;
					$fulldata[$k]['meter']=$check[0]['dg_name'];
					$fulldata[$k]['runninghrs']=(int)$check[0]['running_min2'];
				}else{
					$date1=date("d-m-Y",strtotime($datesarray[$k]));
				$url="http://chekhra.in/Generators/chekhraMaps/show_all_rsbro_api.php?clintid=438&generatorsId=$dg_name&date=$date1";
				// echo $url;die();
				$ch = curl_init($url);                                                                      
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
				
		
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
																		  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
				$result = curl_exec($ch);
				$res1=json_decode($result, true);
				    $fulldata[$k]['time']=$datesarray[$k];
					$fulldata[$k]['meter']=$dg_name;
					$fulldata[$k]['runninghrs']=(int)$res1['run1'];
			}

		}
		     
		return $fulldata;

	}
	function check_data($name,$table_name,$station_id){
		$this->db->select('');
        $this->db->from($table_name);        
        $this->db->where('UtilityName', $name);
		$this->db->where('StationId', $station_id);
		
		 $res = $this->db->get();    
		 		//  echo "ll:".$this->db->last_query();  
         
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
		// $lineconnected=$data['LineConnected'];
		$lineconnected="Borewell";
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
		
		$date_from_month = strtotime($firstday); 
        $date_to_month = strtotime($todayDate); 
        $datesarray_month=array();
		for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
        {
          array_push($datesarray_month, date("Y-m-d",$i1));  
        }
		$abs_diff = $later->diff($earlier)->format("%a")+1; //3

			$resdata['meter']=$dashboardName;
			$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
			// echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result_array();
			$today_percent15=$datacontoday[0]['secs']*0.15;
			$today_runn=round($datacontoday[0]['secs']-$today_percent15);
			$check=$this->chech_borewell_running($lineconnected,$utilityName,$yesterDay,$LocationName);
			if(count($check)==1){
				$yesterday_running=(int)$check[0]['running_min2'];
			}else{
				$queryconsuyest="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
				// echo $queryconsuyest;die();
				$datacontoyest = $this->db->query($queryconsuyest)->result_array();
				$yest_percent15=$datacontoyest[0]['secs']*0.15;
				$yesterday_running=round($datacontoyest[0]['secs']-$yest_percent15);
			}
			
			$monthly_runn=0;
							for ($k=0; $k < count($datesarray_month); $k++)
									{ 
										$month_check=$this->chech_borewell_running($lineconnected,$utilityName,$datesarray_month[$k],$LocationName);
										if(count($month_check)==1){
											$monthly_runn+=(int)$month_check[0]['running_min2'];
										}else{
											$runn_week="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate = '".$datesarray_month[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0 ";
											// echo $runn_week;die();
											 $runn_month = $this->db->query($runn_week)->result_array();
											 $month_percent15=$runn_month[0]['secs']*0.15;
											 $monthly_runn+=(int)$runn_month[0]['run']-$month_percent15;
										}
										
									}
                 
				  				 $monthly_runn_with_today=$monthly_runn+$today_runn;
		
			
			$resdata['todayconsumption']=$this->secondsToTime(round($today_runn));
			;
			$resdata['yesterdayconsumption']=$this->secondsToTime(round($yesterday_running*60));
			$resdata['monthly_consumption']=$this->secondsToTime(round(($monthly_runn_with_today*60)/$abs_diff));//gmdate("H:i:s", $monthrun);
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
		if(isset($table_name)){
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			$weekday = date('Y-m-d',strtotime("-6 days"));
			$firstday= date('Y-m-01', strtotime($todayDate));
			$lastday=date("Y-m-t", strtotime($todayDate));
	
			$earlier = new DateTime($firstday);
			$later = new DateTime($todayDate);
	
			$abs_diff = $later->diff($earlier)->format("%a")+1; //3
	
			$resdata['meter']=$dashboardName;
			if($LocationName=='Tpi' || $LocationName=='A4 Building'){
				$queryconsutoday="SELECT SUM(Consumption)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
			}else{
				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
			}
			
			// echo $queryconsutoday;
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
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_water_consumption($lineconnected,$utilityName,$datesarray[$k],$LocationName);
					if(count($check)==1){
						if($LocationName=='Tpi' || $LocationName=='A4 Building'){
							$res[$k]['con']=(float)$check[0]['consumption']*10;
							$res[$k]['date']=$check[0]['report_date'];
							$month_consumption_without_today+=$res[$k]['con'];
						}else{
							$res[$k]['con']=(float)$check[0]['consumption'];
							$res[$k]['date']=$check[0]['report_date'];
							$month_consumption_without_today+=$res[$k]['con'];
						}
						
					}else{
						
						
							$queryc="SELECT round((SUM(Consumption)/1000)) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
						
						$datac = $this->db->query($queryc)->result_array();
						if($LocationName=='Tpi' || $LocationName=='A4 Building'){
							if($datac[0]['cons']==0){
								$res[$k]['con']=null;
							}else{
								$res[$k]['con']=(float)$datac[0]['cons']*10;
								$month_consumption_without_today+=$res[$k]['con'];
							}
						}else{
							if($datac[0]['cons']==0){
								$res[$k]['con']=null;
							}else{
								$res[$k]['con']=(float)$datac[0]['cons'];
								$month_consumption_without_today+=$res[$k]['con'];
							}
						}
						
						
						$res[$k]['date']=$datesarray[$k];
	
						$water_cons_query=array(
							'utility_name'=>$utilityName,
							'line_connected'=>$lineconnected,
							'location_name'=>$LocationName,
							'report_date'=>$datesarray[$k],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'consumption'=>(float)$datac[0]['cons'],
							'multiplier'=>1              
						);
						$this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
					}
					
					
				}
				$yest_check=$this->chech_water_consumption($lineconnected,$utilityName,$yesterDay,$LocationName);
				if(count($yest_check)==1){
					if($LocationName=='Tpi' || $LocationName=='A4 Building'){
						$yesterday_consumption=(float)$yest_check[0]['consumption']*10;
					}else{
						$yesterday_consumption=(float)$yest_check[0]['consumption'];
					}
					
				}else{
					if($LocationName=='Tpi' || $LocationName=='A4 Building'){
						$queryconsuyest="SELECT SUM(Consumption)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
					}else{
						$queryconsuyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
					}
					
					$dataconyest = $this->db->query($queryconsuyest)->result();
					$yesterday_consumption=round(($dataconyest[0]->cons)/1000,2);
				}
			
				$month_consumption_with_today=$month_consumption_without_today+$todayday_consumption;
				$resdata['monthly_data']=$res;
				$resdata['todayconsumption']=$todayday_consumption;
				$resdata['yesterdayconsumption']=$yesterday_consumption;
				$resdata['monthly_consumption']=$month_consumption_with_today;
				$resdata['weeklyavg']=round(($month_consumption_with_today/$abs_diff),2);
		}else{
			    $resdata['meter']=$dashboardName;
				$resdata['monthly_data']=array();
				$resdata['todayconsumption']="NA";
				$resdata['yesterdayconsumption']="NA";
				$resdata['monthly_consumption']="NA";
				$resdata['weeklyavg']="NA";
		}
		

		return $resdata;
	}
	function get_hardwares_device_data_watermeter($data){
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
		if(isset($table_name)){
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			$weekday = date('Y-m-d',strtotime("-6 days"));
			$firstday= date('Y-m-01', strtotime($todayDate));
			$lastday=date("Y-m-t", strtotime($todayDate));
	
			$earlier = new DateTime($firstday);
			$later = new DateTime($todayDate);
	
			$abs_diff = $later->diff($earlier)->format("%a")+1; //3
	
			$resdata['meter']=$dashboardName;
			if($LocationName=='Tpi' || $LocationName=='A4 Building'){
				$queryconsutoday="SELECT SUM(Consumption)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
			}else{
				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
			}
			
			// echo $queryconsutoday;
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
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_water_consumption($lineconnected,$utilityName,$datesarray[$k],$LocationName);
					if(count($check)==1){
						if($LocationName=='Tpi' || $LocationName=='A4 Building'){
							$res[$k]['con']=(float)$check[0]['consumption']*10;
							$res[$k]['date']=$check[0]['report_date'];
							$month_consumption_without_today+=$res[$k]['con'];
						}else{
							$res[$k]['con']=(float)$check[0]['consumption'];
							$res[$k]['date']=$check[0]['report_date'];
							$month_consumption_without_today+=$res[$k]['con'];
						}
						
					}else{
						
						
							$queryc="SELECT round((SUM(Consumption)/1000)) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
						
						$datac = $this->db->query($queryc)->result_array();
						if($LocationName=='Tpi' || $LocationName=='A4 Building'){
							if($datac[0]['cons']==0){
								$res[$k]['con']=null;
							}else{
								$res[$k]['con']=(float)$datac[0]['cons']*10;
								$month_consumption_without_today+=$res[$k]['con'];
							}
						}else{
							if($datac[0]['cons']==0){
								$res[$k]['con']=null;
							}else{
								$res[$k]['con']=(float)$datac[0]['cons'];
								$month_consumption_without_today+=$res[$k]['con'];
							}
						}
						
						
						$res[$k]['date']=$datesarray[$k];
	
						$water_cons_query=array(
							'utility_name'=>$utilityName,
							'line_connected'=>$lineconnected,
							'location_name'=>$LocationName,
							'report_date'=>$datesarray[$k],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'consumption'=>(float)$datac[0]['cons'],
							'multiplier'=>1              
						);
						$this->db->insert('water_meter_consumption_report_tbl', $water_cons_query);
					}
					
					
				}
				$yest_check=$this->chech_water_consumption($lineconnected,$utilityName,$yesterDay,$LocationName);
				if(count($yest_check)==1){
					if($LocationName=='Tpi' || $LocationName=='A4 Building'){
						$yesterday_consumption=(float)$yest_check[0]['consumption']*10;
					}else{
						$yesterday_consumption=(float)$yest_check[0]['consumption'];
					}
					
				}else{
					if($LocationName=='Tpi' || $LocationName=='A4 Building'){
						$queryconsuyest="SELECT SUM(Consumption)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
					}else{
						$queryconsuyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
					}
					
					$dataconyest = $this->db->query($queryconsuyest)->result();
					$yesterday_consumption=round(($dataconyest[0]->cons)/1000,2);
				}
			
				$month_consumption_with_today=$month_consumption_without_today+$todayday_consumption;
				$resdata['monthly_data']=$res;
				$resdata['todayconsumption']=$todayday_consumption;
				$resdata['yesterdayconsumption']=$yesterday_consumption;
				$resdata['monthly_consumption']=$month_consumption_with_today;
				$resdata['weeklyavg']=round(($month_consumption_with_today/$abs_diff),2);
		}else{
			    $resdata['meter']=$dashboardName;
				$resdata['monthly_data']=array();
				$resdata['todayconsumption']="NA";
				$resdata['yesterdayconsumption']="NA";
				$resdata['monthly_consumption']="NA";
				$resdata['weeklyavg']="NA";
		}
		

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
	function get_hardwares_device_data_energy_meters_vegas($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		// $todayDate=date("Y-m-d");
		$todayDate="2023-01-04";
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_energymeter_list_vega($table_name);
		
		// print_r($meter_list);die();
		$k=0;
		foreach($meter_list as $meters){
           
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
				$enquery="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh' AND TxnTime BETWEEN '".$from."' AND '".$to."'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);			
				$resdata[$i]['todaycons']=$today_cons;
				$resdata[$i]['ename']=$meters['UtilityName'];
				$resdata[$i]['time']=$from." To ".$to;
				$resdata[$i]['date']=$todayDate;
				
						
				}

				$resdata1[$k]=$resdata;
				

			$k++;

		}
		// echo json_encode($resdata1);die();
		return $resdata1;

	}
	function get_hardwares_device_data_energymeter_current_report_vegas($data,$fromdate,$todate){
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
		$meter_list=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","TFA");
		for ($i=0; $i < count($meter_list); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['PF'][$i]['meter']=$meter_list[$i];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_vegas('current',$meter_list[$i],$datesarray[$t]);
				if(count($check)==1){
				
					$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
					$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
					$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND  `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$c1 = $this->db->query($querycurrent1)->result();
						$current1_data=array_merge($current1_data,$c1);

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						$current2_data=array_merge($current2_data,$c2);

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						$current3_data=array_merge($current3_data,$c3);
						
						
					}else{
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$c1 = $this->db->query($querycurrent1)->result();
						$current1_data=array_merge($current1_data,$c1);

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						$current2_data=array_merge($current2_data,$c2);

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						$current3_data=array_merge($current3_data,$c3);
						$current_array=array(
							'location_name'=>$meter_list[$i],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'c1_data'=>serialize($c1),
							'c2_data'=>serialize($c2),
							'c3_data'=>serialize($c3),
							'meter_name'=>$resdata['PF'][$i]['meter']              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('current_report_tbl_vegas', $current_array);
					}
				}
			}
			$resdata['PF'][$i]['c1_data']=$current1_data;
			$resdata['PF'][$i]['c2_data']=$current2_data;
			$resdata['PF'][$i]['c3_data']=$current3_data;

			
			
			 
		}
					

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_current_report_undp($data,$fromdate,$todate){
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
		$meter_list_undp=$this->get_energymeter_list_station($table_name_live,2023000304);
		$meter_list_uncw=$this->get_energymeter_list_station($table_name_live,2023000303);
		$meter_list_unew=$this->get_energymeter_list_station($table_name_live,2023000300);
		$meter_list_unff=$this->get_energymeter_list_station($table_name_live,2023000302);
		$meter_list_unww=$this->get_energymeter_list_station($table_name_live,2023000301);
		$meter_list_unsg=$this->get_energymeter_list_station($table_name_live,2024000143);
		$meter_list_unab=$this->get_energymeter_list_station($table_name_live,2024000144);
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['undp'][$i]['meter']=$meter_list_undp[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_undp('current',$meter_list_undp[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
					$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
					$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND  `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
						}else{
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
						}
						
						
						
					}else{
						if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
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
						}else{
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
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
			$resdata['undp'][$i]['c1_data']=$current1_data;
			$resdata['undp'][$i]['c2_data']=$current2_data;
			$resdata['undp'][$i]['c3_data']=$current3_data;

			
			
			 
		}

		//
		for ($i=0; $i < count($meter_list_uncw); $i++) {
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data_undp('current',$meter_list_uncw[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
					$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
					$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
						
						
						
						
					}else{
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$current1_data=array_merge($current1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$current2_data=array_merge($current2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$current3_data=array_merge($current3_data,$c3);
							$current_array=array(
								'location_name'=>$meter_list_uncw[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_uncw[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'c1_data'=>serialize($c1),
								'c2_data'=>serialize($c2),
								'c3_data'=>serialize($c3),
								'meter_name'=>$resdata['uncw'][$i]['meter']              
							);
							//echo json_encode($pressure_array);die();
							$this->db->insert('current_report_tbl_undp', $current_array);
						
						
					}
				}
			}
			$resdata['uncw'][$i]['c1_data']=$current1_data;
			$resdata['uncw'][$i]['c2_data']=$current2_data;
			$resdata['uncw'][$i]['c3_data']=$current3_data;

			
			
			 
		}
		//
			//
			for ($i=0; $i < count($meter_list_unew); $i++) {
			
				$current1_data=[];
				$current2_data=[];
				$current3_data=[];
				
				$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
				
			
	
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_current_data_undp('current',$meter_list_unew[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
						$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
						$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
	
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
							
							
							
							
						}else{
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unew[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unew[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'c1_data'=>serialize($c1),
									'c2_data'=>serialize($c2),
									'c3_data'=>serialize($c3),
									'meter_name'=>$resdata['unew'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('current_report_tbl_undp', $current_array);
							
							
						}
					}
				}
				$resdata['unew'][$i]['c1_data']=$current1_data;
				$resdata['unew'][$i]['c2_data']=$current2_data;
				$resdata['unew'][$i]['c3_data']=$current3_data;
	
				
				
				 
			}
			//	
			//
			for ($i=0; $i < count($meter_list_unff); $i++) {
			
				$current1_data=[];
				$current2_data=[];
				$current3_data=[];
				
				$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
				
			
	
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_current_data_undp('current',$meter_list_unff[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
						$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
						$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
	
							if($meter_list_unff[$i]['UtilityName'] != 'Solar Meter'){
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND  `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
							}else{
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
							}
							
							
							
						}else{
							if($meter_list_unff[$i]['UtilityName'] != 'Solar Meter'){
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_1' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_2' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_3' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unff[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unff[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'c1_data'=>serialize($c1),
									'c2_data'=>serialize($c2),
									'c3_data'=>serialize($c3),
									'meter_name'=>$resdata['unff'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('current_report_tbl_undp', $current_array);
							}else{
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unff[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unff[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'c1_data'=>serialize($c1),
									'c2_data'=>serialize($c2),
									'c3_data'=>serialize($c3),
									'meter_name'=>$resdata['unff'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('current_report_tbl_undp', $current_array);
							}
							
						}
					}
				}
				$resdata['unff'][$i]['c1_data']=$current1_data;
				$resdata['unff'][$i]['c2_data']=$current2_data;
				$resdata['unff'][$i]['c3_data']=$current3_data;
	
				
				
				 
			}
			//	
			//
			for ($i=0; $i < count($meter_list_unww); $i++) {
			
				$current1_data=[];
				$current2_data=[];
				$current3_data=[];
				
				$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
				
			
	
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_current_data_undp('current',$meter_list_unww[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
						$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
						$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
	
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
							
							
							
							
						}else{
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$current1_data=array_merge($current1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$current2_data=array_merge($current2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$current3_data=array_merge($current3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unww[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unww[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'c1_data'=>serialize($c1),
									'c2_data'=>serialize($c2),
									'c3_data'=>serialize($c3),
									'meter_name'=>$resdata['unww'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('current_report_tbl_undp', $current_array);
							
							
						}
					}
				}
				$resdata['unww'][$i]['c1_data']=$current1_data;
				$resdata['unww'][$i]['c2_data']=$current2_data;
				$resdata['unww'][$i]['c3_data']=$current3_data;
	
				
				
				 
			}
			//
			//
for ($i=0; $i < count($meter_list_unsg); $i++) {
			
	$current1_data=[];
	$current2_data=[];
	$current3_data=[];
	
	$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
	


	for($t=0;$t<count($datesarray);$t++){
		$check=$this->check_current_data_undp('current',$meter_list_unsg[$i]['UtilityName'],$datesarray[$t]);
		if(count($check)==1){				
			$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
			$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
			$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
		}else{
			
			if($datesarray[$t]>=date('Y-m-d')){

				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$current1_data=array_merge($current1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$current2_data=array_merge($current2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$current3_data=array_merge($current3_data,$c3);
				
				
				
				
			}else{
				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$current1_data=array_merge($current1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$current2_data=array_merge($current2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$current3_data=array_merge($current3_data,$c3);
					$current_array=array(
						'location_name'=>$meter_list_unsg[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list_unsg[$i]['StationId'],
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'c1_data'=>serialize($c1),
						'c2_data'=>serialize($c2),
						'c3_data'=>serialize($c3),
						'meter_name'=>$resdata['unsg'][$i]['meter']              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('current_report_tbl_undp', $current_array);
				
				
			}
		}
	}
	$resdata['unsg'][$i]['c1_data']=$current1_data;
	$resdata['unsg'][$i]['c2_data']=$current2_data;
	$resdata['unsg'][$i]['c3_data']=$current3_data;

	
	
	 
}
//
//
for ($i=0; $i < count($meter_list_unab); $i++) {
			
	$current1_data=[];
	$current2_data=[];
	$current3_data=[];
	
	$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
	


	for($t=0;$t<count($datesarray);$t++){
		$check=$this->check_current_data_undp('current',$meter_list_unab[$i]['UtilityName'],$datesarray[$t]);
		if(count($check)==1){				
			$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
			$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
			$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
		}else{
			
			if($datesarray[$t]>=date('Y-m-d')){

				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND  `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$current1_data=array_merge($current1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$current2_data=array_merge($current2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$current3_data=array_merge($current3_data,$c3);
				
				
				
				
			}else{
				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_R' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$current1_data=array_merge($current1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_Y' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$current2_data=array_merge($current2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Current_B' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$current3_data=array_merge($current3_data,$c3);
					$current_array=array(
						'location_name'=>$meter_list_unab[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list_unab[$i]['StationId'],
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'c1_data'=>serialize($c1),
						'c2_data'=>serialize($c2),
						'c3_data'=>serialize($c3),
						'meter_name'=>$resdata['unab'][$i]['meter']              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('current_report_tbl_undp', $current_array);
				
				
			}
		}
	}
	$resdata['unab'][$i]['c1_data']=$current1_data;
	$resdata['unab'][$i]['c2_data']=$current2_data;
	$resdata['unab'][$i]['c3_data']=$current3_data;

	
	
	 
}
//
		return $resdata;
	}
	function get_hardwares_device_data_energymeter_voltage_report_vegas($data,$fromdate,$todate){
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
		
		$meter_list=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","TFA");
		for ($i=0; $i < count($meter_list); $i++) {
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
		
			$resdata['PF'][$i]['meter']=$meter_list[$i];

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_vegas('voltage',$meter_list[$i],$datesarray[$t]);
				if(count($check)==1){
				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					// die();
					if($datesarray[$t]>=date('Y-m-d')){
						$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v1 = $this->db->query($queryvolt1)->result();
						$voltage1_data=array_merge($voltage1_data,$v1);

						$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v2 = $this->db->query($queryvolt2)->result();
						$voltage2_data=array_merge($voltage2_data,$v2);

						$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v3 = $this->db->query($queryvolt3)->result();
						$voltage3_data=array_merge($voltage3_data,$v3);
						
						
					}else{
						$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v1 = $this->db->query($queryvolt1)->result();
						$voltage1_data=array_merge($voltage1_data,$v1);

						$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v2 = $this->db->query($queryvolt2)->result();
						$voltage2_data=array_merge($voltage2_data,$v2);

						$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v3 = $this->db->query($queryvolt3)->result();
						$voltage3_data=array_merge($voltage3_data,$v3);
						$voltage_array=array(
							'location_name'=>$meter_list[$i],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'v1_data'=>serialize($v1),
							'v2_data'=>serialize($v2),
							'v3_data'=>serialize($v3),
							'meter_name'=>$resdata['PF'][$i]['meter']              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('voltage_report_tbl_vegas', $voltage_array);
					}
				}
			}

			$resdata['PF'][$i]['v1_data']=$voltage1_data;
			$resdata['PF'][$i]['v2_data']=$voltage2_data;
			$resdata['PF'][$i]['v3_data']=$voltage3_data;
			
			 
		}
					

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_voltage_report_undp($data,$fromdate,$todate){
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
		
		$meter_list_undp=$this->get_energymeter_list_station($table_name_live,2023000304);
		$meter_list_uncw=$this->get_energymeter_list_station($table_name_live,2023000303);
		$meter_list_unew=$this->get_energymeter_list_station($table_name_live,2023000300);
		$meter_list_unff=$this->get_energymeter_list_station($table_name_live,2023000302);
		$meter_list_unww=$this->get_energymeter_list_station($table_name_live,2023000301);
		$meter_list_unsg=$this->get_energymeter_list_station($table_name_live,2024000143);
		$meter_list_unab=$this->get_energymeter_list_station($table_name_live,2024000144);
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
			$resdata['undp'][$i]['meter']=$meter_list_undp[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_undp('voltage',$meter_list_undp[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND  `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
						}else{
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
						}
						
						
						
					}else{
						if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
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
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_undp[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
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
			$resdata['undp'][$i]['v1_data']=$voltage1_data;
			$resdata['undp'][$i]['v2_data']=$voltage2_data;
			$resdata['undp'][$i]['v3_data']=$voltage3_data;

			
			
			 
		}

		//
		for ($i=0; $i < count($meter_list_uncw); $i++) {
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
			$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data_undp('voltage',$meter_list_uncw[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){

						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
						
						
						
						
					}else{
						
							$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
							$c1 = $this->db->query($querycurrent1)->result();
							$voltage1_data=array_merge($voltage1_data,$c1);
	
							$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c2 = $this->db->query($querycurrent2)->result();
							$voltage2_data=array_merge($voltage2_data,$c2);
	
							$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
						
							$c3 = $this->db->query($querycurrent3)->result();
							$voltage3_data=array_merge($voltage3_data,$c3);
							$current_array=array(
								'location_name'=>$meter_list_uncw[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_uncw[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'v1_data'=>serialize($c1),
								'v2_data'=>serialize($c2),
								'v3_data'=>serialize($c3),
								'meter_name'=>$resdata['uncw'][$i]['meter']              
							);
							//echo json_encode($pressure_array);die();
							$this->db->insert('voltage_report_tbl_undp', $current_array);
						
						
					}
				}
			}
			$resdata['uncw'][$i]['v1_data']=$voltage1_data;
			$resdata['uncw'][$i]['v2_data']=$voltage2_data;
			$resdata['uncw'][$i]['v3_data']=$voltage3_data;

			
			
			 
		}
		//
			//
			for ($i=0; $i < count($meter_list_unew); $i++) {
			
				$voltage1_data=[];
				$voltage2_data=[];
				$voltage3_data=[];
				
				$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
				
			
	
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_voltage_data_undp('voltage',$meter_list_unew[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
						$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
						$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
	
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
							
							
							
							
						}else{
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unew[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unew[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'v1_data'=>serialize($c1),
									'v2_data'=>serialize($c2),
									'v3_data'=>serialize($c3),
									'meter_name'=>$resdata['unew'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('voltage_report_tbl_undp', $current_array);
							
							
						}
					}
				}
				$resdata['unew'][$i]['v1_data']=$voltage1_data;
				$resdata['unew'][$i]['v2_data']=$voltage2_data;
				$resdata['unew'][$i]['v3_data']=$voltage3_data;
	
				
				
				 
			}
			//	
			//
			for ($i=0; $i < count($meter_list_unff); $i++) {
			
				$voltage1_data=[];
				$voltage2_data=[];
				$voltage3_data=[];
				
				$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
				
			
	
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_voltage_data_undp('voltage',$meter_list_unff[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
						$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
						$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
	
							if($meter_list_unff[$i]['UtilityName'] != 'Solar Meter'){
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND  `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
							}else{
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
							}
							
							
							
						}else{
							if($meter_list_unff[$i]['UtilityName'] != 'Solar Meter'){
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_1' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_2' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_3' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unff[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unff[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'v1_data'=>serialize($c1),
									'v2_data'=>serialize($c2),
									'v3_data'=>serialize($c3),
									'meter_name'=>$resdata['unff'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('voltage_report_tbl_undp', $current_array);
							}else{
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unff[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unff[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'v1_data'=>serialize($c1),
									'v2_data'=>serialize($c2),
									'v3_data'=>serialize($c3),
									'meter_name'=>$resdata['unff'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('voltage_report_tbl_undp', $current_array);
							}
							
						}
					}
				}
				$resdata['unff'][$i]['v1_data']=$voltage1_data;
				$resdata['unff'][$i]['v2_data']=$voltage2_data;
				$resdata['unff'][$i]['v3_data']=$voltage3_data;
	
				
				
				 
			}
			//	
			//
			for ($i=0; $i < count($meter_list_unww); $i++) {
			
				$voltage1_data=[];
				$voltage2_data=[];
				$voltage3_data=[];
				
				$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
				
			
	
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_voltage_data_undp('voltage',$meter_list_unww[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
						$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
						$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
	
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
							
							
							
							
						}else{
							
								$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
								$c1 = $this->db->query($querycurrent1)->result();
								$voltage1_data=array_merge($voltage1_data,$c1);
		
								$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c2 = $this->db->query($querycurrent2)->result();
								$voltage2_data=array_merge($voltage2_data,$c2);
		
								$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
							
								$c3 = $this->db->query($querycurrent3)->result();
								$voltage3_data=array_merge($voltage3_data,$c3);
								$current_array=array(
									'location_name'=>$meter_list_unww[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unww[$i]['StationId'],
									'report_date'=>$datesarray[$t],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'v1_data'=>serialize($c1),
									'v2_data'=>serialize($c2),
									'v3_data'=>serialize($c3),
									'meter_name'=>$resdata['unww'][$i]['meter']              
								);
								//echo json_encode($pressure_array);die();
								$this->db->insert('voltage_report_tbl_undp', $current_array);
							
							
						}
					}
				}
				$resdata['unww'][$i]['v1_data']=$voltage1_data;
				$resdata['unww'][$i]['v2_data']=$voltage2_data;
				$resdata['unww'][$i]['v3_data']=$voltage3_data;
	
				
				
				 
			}
			//
			//
for ($i=0; $i < count($meter_list_unsg); $i++) {
			
	$voltage1_data=[];
	$voltage2_data=[];
	$voltage3_data=[];
	
	$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
	


	for($t=0;$t<count($datesarray);$t++){
		$check=$this->check_voltage_data_undp('voltage',$meter_list_unsg[$i]['UtilityName'],$datesarray[$t]);
		if(count($check)==1){				
			$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
			$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
			$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
		}else{
			
			if($datesarray[$t]>=date('Y-m-d')){

				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$voltage1_data=array_merge($voltage1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$voltage2_data=array_merge($voltage2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$voltage3_data=array_merge($voltage3_data,$c3);
				
				
				
				
			}else{
				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$voltage1_data=array_merge($voltage1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$voltage2_data=array_merge($voltage2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$voltage3_data=array_merge($voltage3_data,$c3);
					$current_array=array(
						'location_name'=>$meter_list_unsg[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list_unsg[$i]['StationId'],
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'v1_data'=>serialize($c1),
						'v2_data'=>serialize($c2),
						'v3_data'=>serialize($c3),
						'meter_name'=>$resdata['unsg'][$i]['meter']              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('voltage_report_tbl_undp', $current_array);
				
				
			}
		}
	}
	$resdata['unsg'][$i]['v1_data']=$voltage1_data;
	$resdata['unsg'][$i]['v2_data']=$voltage2_data;
	$resdata['unsg'][$i]['v3_data']=$voltage3_data;

	
	
	 
}
//
//
for ($i=0; $i < count($meter_list_unab); $i++) {
			
	$voltage1_data=[];
	$voltage2_data=[];
	$voltage3_data=[];
	
	$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
	


	for($t=0;$t<count($datesarray);$t++){
		$check=$this->check_voltage_data_undp('voltage',$meter_list_unab[$i]['UtilityName'],$datesarray[$t]);
		if(count($check)==1){				
			$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
			$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
			$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
		}else{
			
			if($datesarray[$t]>=date('Y-m-d')){

				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND  `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$voltage1_data=array_merge($voltage1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$voltage2_data=array_merge($voltage2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$voltage3_data=array_merge($voltage3_data,$c3);
				
				
				
				
			}else{
				
					$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_R' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

					$c1 = $this->db->query($querycurrent1)->result();
					$voltage1_data=array_merge($voltage1_data,$c1);

					$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_Y' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c2 = $this->db->query($querycurrent2)->result();
					$voltage2_data=array_merge($voltage2_data,$c2);

					$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='Voltage_B' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
				
					$c3 = $this->db->query($querycurrent3)->result();
					$voltage3_data=array_merge($voltage3_data,$c3);
					$current_array=array(
						'location_name'=>$meter_list_unab[$i]['UtilityName'],
						'meter_serial'=>'',
						'station_id'=>$meter_list_unab[$i]['StationId'],
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'v1_data'=>serialize($c1),
						'v2_data'=>serialize($c2),
						'v3_data'=>serialize($c3),
						'meter_name'=>$resdata['unab'][$i]['meter']              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('voltage_report_tbl_undp', $current_array);
				
				
			}
		}
	}
	$resdata['unab'][$i]['v1_data']=$voltage1_data;
	$resdata['unab'][$i]['v2_data']=$voltage2_data;
	$resdata['unab'][$i]['v3_data']=$voltage3_data;

	
	
	 
}
//		

		return $resdata;
	}
	function get_hardwares_device_data_power_factor_report_vegas($data,$fromdate,$todate){
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

		$meter_list=array("Main Incomer", "Chiller-II");
		for ($i=0; $i < count($meter_list); $i++) {
			$powerfactor_data=[];
			
		
			$resdata['PF'][$i]['meter']=$meter_list[$i];
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_pf_data_vegas('PF',$meter_list[$i],$datesarray[$t]);
				if(count($check)==1){
				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					if($datesarray[$t]>=date('Y-m-d')){
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						
					}else{
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `UtilityName`='".$meter_list[$i]."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						$pf_array=array(
							'location_name'=>$meter_list[$i],
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
			}
			$resdata['PF'][$i]['pf_data']=$powerfactor_data;

			
			 
		}
		
		return $resdata;

	}
	
	function get_hardwares_device_data_power_factor_report_undp($data,$fromdate,$todate){
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
		$meter_list_undp=$this->get_energymeter_list_station($table_name_live,2023000304);
		$meter_list_uncw=$this->get_energymeter_list_station($table_name_live,2023000303);
		$meter_list_unew=$this->get_energymeter_list_station($table_name_live,2023000300);
		$meter_list_unff=$this->get_energymeter_list_station($table_name_live,2023000302);
		$meter_list_unww=$this->get_energymeter_list_station($table_name_live,2023000301);
		$meter_list_unsg=$this->get_energymeter_list_station($table_name_live,2024000143);
		$meter_list_unab=$this->get_energymeter_list_station($table_name_live,2024000144);
		
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
		for ($i=0; $i < count($meter_list_uncw); $i++) {
			
			$powerfactor_data=[];
			
			$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
		
		
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_pf_data_undp('PF',$meter_list_uncw[$i]['UtilityName'],$datesarray[$t]);
				if(count($check)==1){				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){
		
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
					}else{
						
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						$pf_array=array(
							'location_name'=>$meter_list_uncw[$i]['UtilityName'],
							'meter_serial'=>'',
							'station_id'=>$meter_list_uncw[$i]['StationId'],
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'pf_data'=>serialize($pf),
							'meter_name'=>$resdata['uncw'][$i]['meter']              
						);
						 //echo json_encode($pf_array);die();
						$this->db->insert('pf_report_tbl_undp', $pf_array);
						
						
					}
				}
			}
			$resdata['uncw'][$i]['pf_data']=$powerfactor_data;
		
			
			
			 
		}
		//
			//
			for ($i=0; $i < count($meter_list_unew); $i++) {
			
				$powerfactor_data=[];
				
				$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
				
			
			
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->chech_pf_data_undp('PF',$meter_list_unew[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
			
							$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
							$pf = $this->db->query($querypowerfactor)->result();						
							$powerfactor_data=array_merge($powerfactor_data,$pf);
						}else{
							
							$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unew[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
							$pf = $this->db->query($querypowerfactor)->result();						
							$powerfactor_data=array_merge($powerfactor_data,$pf);
							$pf_array=array(
								'location_name'=>$meter_list_unew[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_unew[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'pf_data'=>serialize($pf),
								'meter_name'=>$resdata['unew'][$i]['meter']              
							);
							 //echo json_encode($pf_array);die();
							$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
						}
					}
				}
				$resdata['unew'][$i]['pf_data']=$powerfactor_data;
			
				
				
				 
			}
			//	
			//
			for ($i=0; $i < count($meter_list_unff); $i++) {
			
				$powerfactor_data=[];
				
				$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
				
			
			
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->chech_pf_data_undp('PF',$meter_list_unff[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
			
							$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
							$pf = $this->db->query($querypowerfactor)->result();						
							$powerfactor_data=array_merge($powerfactor_data,$pf);
						}else{
							
							$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unff[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
							$pf = $this->db->query($querypowerfactor)->result();						
							$powerfactor_data=array_merge($powerfactor_data,$pf);
							$pf_array=array(
								'location_name'=>$meter_list_unff[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_unff[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'pf_data'=>serialize($pf),
								'meter_name'=>$resdata['unff'][$i]['meter']              
							);
							 //echo json_encode($pf_array);die();
							$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
						}
					}
				}
				$resdata['unff'][$i]['pf_data']=$powerfactor_data;
			
				
				
				 
			}
			//	
			//
			for ($i=0; $i < count($meter_list_unww); $i++) {
			
				$powerfactor_data=[];
				
				$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
				
			
			
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->chech_pf_data_undp('PF',$meter_list_unww[$i]['UtilityName'],$datesarray[$t]);
					if(count($check)==1){				
						$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
					}else{
						
						if($datesarray[$t]>=date('Y-m-d')){
			
							$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
							$pf = $this->db->query($querypowerfactor)->result();						
							$powerfactor_data=array_merge($powerfactor_data,$pf);
						}else{
							
							$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unww[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
			
							$pf = $this->db->query($querypowerfactor)->result();						
							$powerfactor_data=array_merge($powerfactor_data,$pf);
							$pf_array=array(
								'location_name'=>$meter_list_unww[$i]['UtilityName'],
								'meter_serial'=>'',
								'station_id'=>$meter_list_unww[$i]['StationId'],
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'pf_data'=>serialize($pf),
								'meter_name'=>$resdata['unww'][$i]['meter']              
							);
							 //echo json_encode($pf_array);die();
							$this->db->insert('pf_report_tbl_undp', $pf_array);
							
							
						}
					}
				}
				$resdata['unww'][$i]['pf_data']=$powerfactor_data;
			
				
				
				 
			}
			//
			//
for ($i=0; $i < count($meter_list_unsg); $i++) {
			
	$powerfactor_data=[];
	
	$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
	


	for($t=0;$t<count($datesarray);$t++){
		$check=$this->chech_pf_data_undp('PF',$meter_list_unsg[$i]['UtilityName'],$datesarray[$t]);
		if(count($check)==1){				
			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
		}else{
			
			if($datesarray[$t]>=date('Y-m-d')){

				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

				$pf = $this->db->query($querypowerfactor)->result();						
				$powerfactor_data=array_merge($powerfactor_data,$pf);
			}else{
				
				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

				$pf = $this->db->query($querypowerfactor)->result();						
				$powerfactor_data=array_merge($powerfactor_data,$pf);
				$pf_array=array(
					'location_name'=>$meter_list_unsg[$i]['UtilityName'],
					'meter_serial'=>'',
					'station_id'=>$meter_list_unsg[$i]['StationId'],
					'report_date'=>$datesarray[$t],
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'pf_data'=>serialize($pf),
					'meter_name'=>$resdata['unsg'][$i]['meter']              
				);
				 //echo json_encode($pf_array);die();
				$this->db->insert('pf_report_tbl_undp', $pf_array);
				
				
			}
		}
	}
	$resdata['unsg'][$i]['pf_data']=$powerfactor_data;

	
	
	 
}
//

//
for ($i=0; $i < count($meter_list_unab); $i++) {
			
	$powerfactor_data=[];
	
	$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
	


	for($t=0;$t<count($datesarray);$t++){
		$check=$this->chech_pf_data_undp('PF',$meter_list_unab[$i]['UtilityName'],$datesarray[$t]);
		if(count($check)==1){				
			$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
		}else{
			
			if($datesarray[$t]>=date('Y-m-d')){

				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

				$pf = $this->db->query($querypowerfactor)->result();						
				$powerfactor_data=array_merge($powerfactor_data,$pf);
			}else{
				
				$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."'  AND `LineConnected`='PF' AND `UtilityName`='".$meter_list_unab[$i]['UtilityName']."'  ORDER BY TxnDate ASC,TxnTime ASC";

				$pf = $this->db->query($querypowerfactor)->result();						
				$powerfactor_data=array_merge($powerfactor_data,$pf);
				$pf_array=array(
					'location_name'=>$meter_list_unab[$i]['UtilityName'],
					'meter_serial'=>'',
					'station_id'=>$meter_list_unab[$i]['StationId'],
					'report_date'=>$datesarray[$t],
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'pf_data'=>serialize($pf),
					'meter_name'=>$resdata['unab'][$i]['meter']              
				);
				 //echo json_encode($pf_array);die();
				$this->db->insert('pf_report_tbl_undp', $pf_array);
				
				
			}
		}
	}
	$resdata['unab'][$i]['pf_data']=$powerfactor_data;

	
	
	 
}
//

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_report_vega_cron(){
		
		$station_id=2022000313;
		// echo $station_id;die();
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$date_from = strtotime($yesterDay); 
        $date_to = strtotime($yesterDay); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
		$Building_Level_Energy_Consumption=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Capacitor Main Panel","Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","CT Fan_1","CT Fan-II","TFA","A Wing Gr FL Hvac","A Wing 2nd FL Hvac","A Wing 3rd FL Hvac","B Wing Gr FL Hvac","B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac","Light&Power Wing_A","Light&Power Wing_B","WTP");
		
		for ($i=0; $i < count($Building_Level_Energy_Consumption); $i++) {
			
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						$check=$this->chech_energy_consumotion_vegas($Building_Level_Energy_Consumption[$i],$datesarray[$k]);
                if(count($check)==1){
                    $resdata['blec'][$i][$k]['meter']=$check[0]['meter_name'];
                   
					$resdata['blec'][$i][$k]['consumption']=$check[0]['consumption'];

						$resdata['blec'][$i][$k]['date']=$check[0]['report_date'];
						$resdata['blec'][$i][$k]['from']='db';
                }else{
					
					if($datesarray[$k]>=date('Y-m-d')){
						$resdata['blec'][$i][$k]['meter']=$Building_Level_Energy_Consumption[$i];
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['blec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['blec'][$i][$k]['date']=$datesarray[$k];
					}else{
						$resdata['blec'][$i][$k]['meter']=$Building_Level_Energy_Consumption[$i];
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						// echo $queryconsutoday;die();
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['blec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['blec'][$i][$k]['date']=$datesarray[$k];

						$energy_cons_query=array(
							'location_name'=>$Building_Level_Energy_Consumption[$i],
							'meter_serial'=>'0',
							'report_date'=>$datesarray[$k],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'consumption'=>$resdata['blec'][$i][$k]['consumption'],
							'meter_name'=>$Building_Level_Energy_Consumption[$i]              
						);
						$this->db->insert('energy_consumption_report_tbl_vegas', $energy_cons_query);
					}
				}
						
						
					} 
	}
	
		
					

		echo json_encode( $resdata);
	}
	function get_hardwares_device_data_energymeter_report_vega($data,$fromdate,$todate){
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
		
		$Building_Level_Energy_Consumption=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Capacitor Main Panel");
		$Chiller_Plant_Equipment_Energy_Consumption=array("Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","CT Fan_1","CT Fan-II","TFA");
		$AHUs_Energy_Consumption=array("A Wing Gr FL Hvac","A Wing 2nd FL Hvac","A Wing 3rd FL Hvac","B Wing Gr FL Hvac","B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac");
		$Other_Energy_End_uses=array("Light&Power Wing_A","Light&Power Wing_B","WTP");
		for ($i=0; $i < count($Building_Level_Energy_Consumption); $i++) {
			
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						$check=$this->chech_energy_consumotion_vegas($Building_Level_Energy_Consumption[$i],$datesarray[$k]);
                if(count($check)==1){
                    $resdata['blec'][$i][$k]['meter']=$check[0]['meter_name'];
                   
					$resdata['blec'][$i][$k]['consumption']=$check[0]['consumption'];

						$resdata['blec'][$i][$k]['date']=$check[0]['report_date'];
						$resdata['blec'][$i][$k]['from']='db';
                }else{
					if($datesarray[$k]>=date('Y-m-d')){
						$resdata['blec'][$i][$k]['meter']=$Building_Level_Energy_Consumption[$i];
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['blec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['blec'][$i][$k]['date']=$datesarray[$k];
					}else{
						$resdata['blec'][$i][$k]['meter']=$Building_Level_Energy_Consumption[$i];
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						//echo $queryconsutoday;die();
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['blec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['blec'][$i][$k]['date']=$datesarray[$k];

						$energy_cons_query=array(
							'location_name'=>$Building_Level_Energy_Consumption[$i],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$k],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'consumption'=>$resdata['blec'][$i][$k]['consumption'],
							'meter_name'=>$Building_Level_Energy_Consumption[$i]              
						);
						$this->db->insert('energy_consumption_report_tbl_vegas', $energy_cons_query);
					}
				}
						
						
					} 
	}
	for ($i=0; $i < count($Chiller_Plant_Equipment_Energy_Consumption); $i++) {
			
		for ($k=0; $k < count($datesarray); $k++)
			{ 
				$check=$this->chech_energy_consumotion_vegas($Chiller_Plant_Equipment_Energy_Consumption[$i],$datesarray[$k]);
		if(count($check)==1){
			$resdata['cpeec'][$i][$k]['meter']=$check[0]['meter_name'];
		   
			$resdata['cpeec'][$i][$k]['consumption']=$check[0]['consumption'];

				$resdata['cpeec'][$i][$k]['date']=$check[0]['report_date'];
				$resdata['cpeec'][$i][$k]['from']='db';
		}else{
			if($datesarray[$k]>=date('Y-m-d')){
				$resdata['cpeec'][$i][$k]['meter']=$Chiller_Plant_Equipment_Energy_Consumption[$i];
				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
				
				
				$datacontoday = $this->db->query($queryconsutoday)->result();
				$resdata['cpeec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

				$resdata['cpeec'][$i][$k]['date']=$datesarray[$k];
			}else{
				$resdata['cpeec'][$i][$k]['meter']=$Chiller_Plant_Equipment_Energy_Consumption[$i];
				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
				
				//echo $queryconsutoday;die();
				$datacontoday = $this->db->query($queryconsutoday)->result();
				$resdata['cpeec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

				$resdata['cpeec'][$i][$k]['date']=$datesarray[$k];

				$energy_cons_query=array(
					'location_name'=>$Chiller_Plant_Equipment_Energy_Consumption[$i],
					'meter_serial'=>'',
					'report_date'=>$datesarray[$k],
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'consumption'=>$resdata['cpeec'][$i][$k]['consumption'],
					'meter_name'=>$Chiller_Plant_Equipment_Energy_Consumption[$i]              
				);
				$this->db->insert('energy_consumption_report_tbl_vegas', $energy_cons_query);
			}
		}
				
				
			} 
}
for ($i=0; $i < count($AHUs_Energy_Consumption); $i++) {
			
	for ($k=0; $k < count($datesarray); $k++)
		{ 
			$check=$this->chech_energy_consumotion_vegas($AHUs_Energy_Consumption[$i],$datesarray[$k]);
	if(count($check)==1){
		$resdata['aec'][$i][$k]['meter']=$check[0]['meter_name'];
	   
		$resdata['aec'][$i][$k]['consumption']=$check[0]['consumption'];

			$resdata['aec'][$i][$k]['date']=$check[0]['report_date'];
			$resdata['aec'][$i][$k]['from']='db';
	}else{
		if($datesarray[$k]>=date('Y-m-d')){
			$resdata['aec'][$i][$k]['meter']=$AHUs_Energy_Consumption[$i];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['aec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['aec'][$i][$k]['date']=$datesarray[$k];
		}else{
			$resdata['aec'][$i][$k]['meter']=$AHUs_Energy_Consumption[$i];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			//echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['aec'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['aec'][$i][$k]['date']=$datesarray[$k];

			$energy_cons_query=array(
				'location_name'=>$AHUs_Energy_Consumption[$i],
				'meter_serial'=>'',
				'report_date'=>$datesarray[$k],
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'consumption'=>$resdata['aec'][$i][$k]['consumption'],
				'meter_name'=>$AHUs_Energy_Consumption[$i]              
			);
			$this->db->insert('energy_consumption_report_tbl_vegas', $energy_cons_query);
		}
	}
			
			
		} 
}
for ($i=0; $i < count($Other_Energy_End_uses); $i++) {
			
	for ($k=0; $k < count($datesarray); $k++)
		{ 
			$check=$this->chech_energy_consumotion_vegas($Other_Energy_End_uses[$i],$datesarray[$k]);
	if(count($check)==1){
		$resdata['oee'][$i][$k]['meter']=$check[0]['meter_name'];
	   
		$resdata['oee'][$i][$k]['consumption']=$check[0]['consumption'];

			$resdata['oee'][$i][$k]['date']=$check[0]['report_date'];
			$resdata['oee'][$i][$k]['from']='db';
	}else{
		if($datesarray[$k]>=date('Y-m-d')){
			$resdata['oee'][$i][$k]['meter']=$Other_Energy_End_uses[$i];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['oee'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['oee'][$i][$k]['date']=$datesarray[$k];
		}else{
			$resdata['oee'][$i][$k]['meter']=$Other_Energy_End_uses[$i];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			//echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['oee'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['oee'][$i][$k]['date']=$datesarray[$k];

			$energy_cons_query=array(
				'location_name'=>$Other_Energy_End_uses[$i],
				'meter_serial'=>'',
				'report_date'=>$datesarray[$k],
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'consumption'=>$resdata['oee'][$i][$k]['consumption'],
				'meter_name'=>$Other_Energy_End_uses[$i]              
			);
			$this->db->insert('energy_consumption_report_tbl_vegas', $energy_cons_query);
		}
	}
			
			
		} 
}
		
					

		return $resdata;
	}
	function getTempDataClusterTruck1($fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		// print_r($datesarray);die();
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
				
							$resdata[$k]['meter']="Temerature";
							$resdata[$k]['date']=$datesarray[$k];
							
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
								
		
									
									//$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									$open="SELECT COUNT(ContactState) as open FROM `wwo7e6nq_bms_device_sensor_logs` WHERE `DeviceSensorID`=2 AND `ContactStateUpdatedTime` LIKE '%$datesarray[$k]%' AND `ContactState`='OPEN' AND  ContactStateUpdatedTime BETWEEN '$datesarray[$k] $from' AND '$datesarray[$k] $to' ORDER by `ContactStateUpdatedTime` DESC;";
									$close="SELECT COUNT(ContactState) as close FROM `wwo7e6nq_bms_device_sensor_logs` WHERE `DeviceSensorID`=2 AND `ContactStateUpdatedTime` LIKE '%$datesarray[$k]%' AND `ContactState`='CLOSED' AND  ContactStateUpdatedTime BETWEEN '$datesarray[$k] $from' AND '$datesarray[$k] $to' ORDER by `ContactStateUpdatedTime` DESC;";
									//echo $q;die();
									
									$dataopen = $this->db->query($open)->result();
									$dataclose = $this->db->query($close)->result();
									$resdata1[$i1]['open']=$dataopen[0]->open;
									$resdata1[$i1]['close']=$dataclose[0]->close;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata[$k]['data']=$resdata1;
						
						
					
					
					
					
				}
				return $resdata;
		
	}
	function getTempDataClusterTruck($fromdate,$todate){
		
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		// print_r($datesarray);die();
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
				
							$resdata[$k]['meter']="Temerature";
							$resdata[$k]['date']=$datesarray[$k];
							
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
								
		
									
									//$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									$queryconsutoday="SELECT MIN(`Temperature`) as min,MAX(`Temperature`) as max,AVG(`Temperature`) as avg FROM `wwo7e6nq_bms_device_sensor_logs` WHERE `DeviceSensorID`=1 AND `TemperatureUpdatedTime` LIKE '%$datesarray[$k]%' AND TemperatureUpdatedTime BETWEEN '$datesarray[$k] $from' AND '$datesarray[$k] $to' ORDER by `TemperatureUpdatedTime` DESC;";
									//echo $q;die();
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['min']=$datacontoday[0]->min;
									$resdata1[$i1]['max']=$datacontoday[0]->max;
									$resdata1[$i1]['avg']=$datacontoday[0]->avg;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata[$k]['data']=$resdata1;
						
						
					
					
					
					
				}
				return $resdata;
		
	}
	function get_hardwares_device_data_energymeter_report_undp($data,$fromdate,$todate,$sort){
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
		$meter_list_undp=$this->get_energymeter_list_station($table_name,2023000304);
		$meter_list_uncw=$this->get_energymeter_list_station($table_name,2023000303);
		$meter_list_unew=$this->get_energymeter_list_station($table_name,2023000300);
		$meter_list_unff=$this->get_energymeter_list_station($table_name,2023000302);
		$meter_list_unww=$this->get_energymeter_list_station($table_name,2023000301);
		$meter_list_unsg=$this->get_energymeter_list_station($table_name,2024000143);
		$meter_list_unab=$this->get_energymeter_list_station($table_name,2024000144);
		
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
							$resdata['undp'][$i][$k]['sort']=$sort;
							$resdata['undp'][$i][$k]['date']=$datesarray[$k];
							
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
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_undp[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['undp'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['undp'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['undp'][$i][$k]['from']='db4';
								$resdata['undp'][$i][$k]['sort']=$sort;
								$resdata['undp'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
								$resdata['undp'][$i][$k]['sort']=$sort;
								$resdata['undp'][$i][$k]['date']=$datesarray[$k];
							
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
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_undp[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['undp'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['undp'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['undp'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['undp'][$i][$k]['from']='db';
								$resdata['undp'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['undp'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['undp'][$i][$k]['date']=$datesarray[$k];
								$resdata['undp'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['undp'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['undp'][$i][$k]['date']=$datesarray[$k];
								$resdata['undp'][$i][$k]['sort']=$sort;
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
					
					
					
				} 
		}
		for ($i=0; $i < count($meter_list_uncw); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
							$resdata['uncw'][$i][$k]['sort']=$sort;
							$resdata['uncw'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['uncw'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_uncw[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['uncw'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['uncw'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['uncw'][$i][$k]['from']='db4';
								$resdata['uncw'][$i][$k]['sort']=$sort;
								$resdata['uncw'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
								$resdata['uncw'][$i][$k]['sort']=$sort;
								$resdata['uncw'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['uncw'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_uncw[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_uncw[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$meter_list_uncw[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_uncw[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['uncw'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['uncw'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['uncw'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['uncw'][$i][$k]['from']='db';
								$resdata['uncw'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['uncw'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['uncw'][$i][$k]['date']=$datesarray[$k];
								$resdata['uncw'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['uncw'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['uncw'][$i][$k]['date']=$datesarray[$k];
								$resdata['uncw'][$i][$k]['sort']=$sort;
								$energy_cons_query=array(
									'location_name'=>$meter_list_uncw[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_uncw[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$resdata['uncw'][$i][$k]['consumption'],
									'meter_name'=>$meter_list_uncw[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
							}
						}
					}
					
					
					
				} 
		}
		for ($i=0; $i < count($meter_list_unew); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
							$resdata['unew'][$i][$k]['sort']=$sort;
							$resdata['unew'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unew'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unew[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['unew'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['unew'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unew'][$i][$k]['from']='db4';
								$resdata['unew'][$i][$k]['sort']=$sort;
								$resdata['unew'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
								$resdata['unew'][$i][$k]['sort']=$sort;
								$resdata['unew'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unew'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unew[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unew[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$meter_list_unew[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_unew[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unew'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unew'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['unew'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unew'][$i][$k]['from']='db';
								$resdata['unew'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unew'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unew'][$i][$k]['date']=$datesarray[$k];
								$resdata['unew'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unew'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unew'][$i][$k]['date']=$datesarray[$k];
								$resdata['unew'][$i][$k]['sort']=$sort;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unew[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unew[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$resdata['unew'][$i][$k]['consumption'],
									'meter_name'=>$meter_list_unew[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
							}
						}
					}
					
					
					
				} 
		}
		for ($i=0; $i < count($meter_list_unff); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
							$resdata['unff'][$i][$k]['sort']=$sort;
							$resdata['unff'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unff'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unff[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['unff'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['unff'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unff'][$i][$k]['from']='db4';
								$resdata['unff'][$i][$k]['sort']=$sort;
								$resdata['unff'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
								$resdata['unff'][$i][$k]['sort']=$sort;
								$resdata['unff'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unff'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unff[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unff[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$meter_list_unff[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_unff[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unff'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unff'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['unff'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unff'][$i][$k]['from']='db';
								$resdata['unff'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unff'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unff'][$i][$k]['date']=$datesarray[$k];
								$resdata['unff'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unff'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unff'][$i][$k]['date']=$datesarray[$k];
								$resdata['unff'][$i][$k]['sort']=$sort;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unff[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unff[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$resdata['unff'][$i][$k]['consumption'],
									'meter_name'=>$meter_list_unff[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
							}
						}
					}
					
					
					
				} 
		}
		for ($i=0; $i < count($meter_list_unww); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
							$resdata['unww'][$i][$k]['sort']=$sort;
							$resdata['unww'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unww'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unww[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['unww'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['unww'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unww'][$i][$k]['from']='db4';
								$resdata['unww'][$i][$k]['sort']=$sort;
								$resdata['unww'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
								$resdata['unww'][$i][$k]['sort']=$sort;
								$resdata['unww'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unww'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unww[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unww[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$meter_list_unww[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_unww[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unww'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unww'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['unww'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unww'][$i][$k]['from']='db';
								$resdata['unww'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unww'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unww'][$i][$k]['date']=$datesarray[$k];
								$resdata['unww'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unww'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unww'][$i][$k]['date']=$datesarray[$k];
								$resdata['unww'][$i][$k]['sort']=$sort;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unww[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unww[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$resdata['unww'][$i][$k]['consumption'],
									'meter_name'=>$meter_list_unww[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
							}
						}
					}
					
					
					
				} 
		}
		for ($i=0; $i < count($meter_list_unsg); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['unsg'][$i][$k]['meter']=$meter_list_unsg[$i]['UtilityName'];
							$resdata['unsg'][$i][$k]['sort']=$sort;
							$resdata['unsg'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unsg'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unsg[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['unsg'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['unsg'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unsg'][$i][$k]['from']='db4';
								$resdata['unsg'][$i][$k]['sort']=$sort;
								$resdata['unsg'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['unsg'][$i][$k]['meter']=$meter_list_unsg[$i]['UtilityName'];
								$resdata['unsg'][$i][$k]['sort']=$sort;
								$resdata['unsg'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unsg'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unsg[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unsg[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$meter_list_unsg[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_unsg[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unsg'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unsg'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['unsg'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unsg'][$i][$k]['from']='db';
								$resdata['unsg'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unsg'][$i][$k]['meter']=$meter_list_unsg[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unsg'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unsg'][$i][$k]['date']=$datesarray[$k];
								$resdata['unsg'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unsg'][$i][$k]['meter']=$meter_list_unsg[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unsg'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unsg'][$i][$k]['date']=$datesarray[$k];
								$resdata['unsg'][$i][$k]['sort']=$sort;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unsg[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unsg[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$resdata['unsg'][$i][$k]['consumption'],
									'meter_name'=>$meter_list_unsg[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
							}
						}
					}
					
					
					
				} 
		}
		for ($i=0; $i < count($meter_list_unab); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					if($sort==2){
						if($datesarray[$k]>=date('Y-m-d')){
							$resdata['unab'][$i][$k]['meter']=$meter_list_unab[$i]['UtilityName'];
							$resdata['unab'][$i][$k]['sort']=$sort;
							$resdata['unab'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['unab'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_undp_hourly($meter_list_unab[$i]['UtilityName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['unab'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['unab'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unab'][$i][$k]['from']='db4';
								$resdata['unab'][$i][$k]['sort']=$sort;
								$resdata['unab'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								$resdata['unab'][$i][$k]['meter']=$meter_list_unab[$i]['UtilityName'];
								$resdata['unab'][$i][$k]['sort']=$sort;
								$resdata['unab'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['unab'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unab[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unab[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$meter_list_unab[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp_hourly', $energy_cons_query);
								}

							
								
						}
						
					}else{
						$check=$this->chech_energy_consumotion_undp($meter_list_unab[$i]['UtilityName'],$datesarray[$k]);
						if(count($check)==1){
							$resdata['unab'][$i][$k]['meter']=$check[0]['meter_name'];
						   
							$resdata['unab'][$i][$k]['consumption']=$check[0]['consumption'];
				
								$resdata['unab'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['unab'][$i][$k]['from']='db';
								$resdata['unab'][$i][$k]['count']=count($datesarray);
						}else{
							if($datesarray[$k]>=date('Y-m-d')){
								$resdata['unab'][$i][$k]['meter']=$meter_list_unab[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unab'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unab'][$i][$k]['date']=$datesarray[$k];
								$resdata['unab'][$i][$k]['count']=count($datesarray);
							}else{
								$resdata['unab'][$i][$k]['meter']=$meter_list_unab[$i]['UtilityName'];
								$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
								
								//echo $queryconsutoday;die();
								$datacontoday = $this->db->query($queryconsutoday)->result();
								$resdata['unab'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;
				
								$resdata['unab'][$i][$k]['date']=$datesarray[$k];
								$resdata['unab'][$i][$k]['sort']=$sort;
								$energy_cons_query=array(
									'location_name'=>$meter_list_unab[$i]['UtilityName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_unab[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>$resdata['unab'][$i][$k]['consumption'],
									'meter_name'=>$meter_list_unab[$i]['UtilityName']              
								);
								$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
							}
						}
					}
					
					
					
				} 
		}			
	if($sort==2){
	$rs=[];
	for ($t=0; $t < count($resdata['undp']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
		
			$rs['undp'][$t][$i]['meter']=$resdata['undp'][$t][0]['meter'];
			$rs['undp'][$t][$i]['sort']=$resdata['undp'][$t][0]['sort'];
			$rs['undp'][$t][$i]['date']=$resdata['undp'][$t][0]['data'][$i]['date'];
			for ($n=0; $n <count($resdata['undp'][$t]) ; $n++) { 
				$rt[$n]['date']=$resdata['undp'][$t][$n]['date'];
				$rt[$n]['consumption']=$resdata['undp'][$t][$n]['data'][$i]['consumption'];
			}
			$rs['undp'][$t][$i]['data']=$rt;
		}
	}
	for ($t=0; $t < count($resdata['uncw']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
			
				$rs['uncw'][$t][$i]['meter']=$resdata['uncw'][$t][0]['meter'];
				$rs['uncw'][$t][$i]['sort']=$resdata['uncw'][$t][0]['sort'];
				$rs['uncw'][$t][$i]['date']=$resdata['uncw'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['uncw'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['uncw'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['uncw'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['uncw'][$t][$i]['data']=$rt;
		}
	}
	for ($t=0; $t < count($resdata['unew']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
			
				$rs['unew'][$t][$i]['meter']=$resdata['unew'][$t][0]['meter'];
				$rs['unew'][$t][$i]['sort']=$resdata['unew'][$t][0]['sort'];
				$rs['unew'][$t][$i]['date']=$resdata['unew'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['unew'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['unew'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['unew'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['unew'][$t][$i]['data']=$rt;
		}
	}
	for ($t=0; $t < count($resdata['unff']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
			
				$rs['unff'][$t][$i]['meter']=$resdata['unff'][$t][0]['meter'];
				$rs['unff'][$t][$i]['sort']=$resdata['unff'][$t][0]['sort'];
				$rs['unff'][$t][$i]['date']=$resdata['unff'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['unff'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['unff'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['unff'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['unff'][$t][$i]['data']=$rt;
		}
	}
	for ($t=0; $t < count($resdata['unww']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
			
				$rs['unww'][$t][$i]['meter']=$resdata['unww'][$t][0]['meter'];
				$rs['unww'][$t][$i]['sort']=$resdata['unww'][$t][0]['sort'];
				$rs['unww'][$t][$i]['date']=$resdata['unww'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['unww'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['unww'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['unww'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['unww'][$t][$i]['data']=$rt;
		}
	}
	for ($t=0; $t < count($resdata['unsg']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
			
				$rs['unsg'][$t][$i]['meter']=$resdata['unsg'][$t][0]['meter'];
				$rs['unsg'][$t][$i]['sort']=$resdata['unsg'][$t][0]['sort'];
				$rs['unsg'][$t][$i]['date']=$resdata['unsg'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['unsg'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['unsg'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['unsg'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['unsg'][$t][$i]['data']=$rt;
		}
	}
	for ($t=0; $t < count($resdata['unab']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
			
				$rs['unab'][$t][$i]['meter']=$resdata['unab'][$t][0]['meter'];
				$rs['unab'][$t][$i]['sort']=$resdata['unab'][$t][0]['sort'];
				$rs['unab'][$t][$i]['date']=$resdata['unab'][$t][0]['data'][$i]['date'];
				for ($n=0; $n <count($resdata['unab'][$t]) ; $n++) { 
					$rt[$n]['date']=$resdata['unab'][$t][$n]['date'];
					$rt[$n]['consumption']=$resdata['unab'][$t][$n]['data'][$i]['consumption'];
				}
				$rs['unab'][$t][$i]['data']=$rt;
		}
	}
	
    // echo json_encode($resdata['undp'][0]);die();
	return $rs;
	}else{
		return $resdata;
	}
		
	}
	function get_hardwares_device_data_energymeter_report_undp_bkp($data,$fromdate,$todate){
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
		$meter_list_undp=$this->get_energymeter_list_station($table_name_live,2023000304);
		$meter_list_uncw=$this->get_energymeter_list_station($table_name_live,2023000303);
		$meter_list_unew=$this->get_energymeter_list_station($table_name_live,2023000300);
		$meter_list_unff=$this->get_energymeter_list_station($table_name_live,2023000302);
		$meter_list_unww=$this->get_energymeter_list_station($table_name_live,2023000301);
		
		
		
		for ($i=0; $i < count($meter_list_undp); $i++) {
			
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						$check=$this->chech_energy_consumotion_undp($meter_list_undp[$i]['UtilityName'],$datesarray[$k]);
                if(count($check)==1){
                    $resdata['undp'][$i][$k]['meter']=$check[0]['meter_name'];
                   
					$resdata['undp'][$i][$k]['consumption']=$check[0]['consumption'];

						$resdata['undp'][$i][$k]['date']=$check[0]['report_date'];
						$resdata['undp'][$i][$k]['from']='db';
                }else{
					if($datesarray[$k]>=date('Y-m-d')){
						$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['undp'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['undp'][$i][$k]['date']=$datesarray[$k];
					}else{
						$resdata['undp'][$i][$k]['meter']=$meter_list_undp[$i]['UtilityName'];
						$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
						
						//echo $queryconsutoday;die();
						$datacontoday = $this->db->query($queryconsutoday)->result();
						$resdata['undp'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

						$resdata['undp'][$i][$k]['date']=$datesarray[$k];

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
	}

	for ($i=0; $i < count($meter_list_uncw); $i++) {
			
		for ($k=0; $k < count($datesarray); $k++)
			{ 
				$check=$this->chech_energy_consumotion_undp($meter_list_uncw[$i]['UtilityName'],$datesarray[$k]);
		if(count($check)==1){
			$resdata['uncw'][$i][$k]['meter']=$check[0]['meter_name'];
		   
			$resdata['uncw'][$i][$k]['consumption']=$check[0]['consumption'];

				$resdata['uncw'][$i][$k]['date']=$check[0]['report_date'];
				$resdata['uncw'][$i][$k]['from']='db';
		}else{
			if($datesarray[$k]>=date('Y-m-d')){
				$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
				
				
				$datacontoday = $this->db->query($queryconsutoday)->result();
				$resdata['uncw'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

				$resdata['uncw'][$i][$k]['date']=$datesarray[$k];
			}else{
				$resdata['uncw'][$i][$k]['meter']=$meter_list_uncw[$i]['UtilityName'];
				$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
				
				//echo $queryconsutoday;die();
				$datacontoday = $this->db->query($queryconsutoday)->result();
				$resdata['uncw'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

				$resdata['uncw'][$i][$k]['date']=$datesarray[$k];

				$energy_cons_query=array(
					'location_name'=>$meter_list_uncw[$i]['UtilityName'],
					'meter_serial'=>'',
					'station_id'=>$meter_list_uncw[$i]['StationId'],
					'report_date'=>$datesarray[$k],
					'created_date'=>date('Y-m-d H:i:s'),
					'updated_date'=>date('Y-m-d H:i:s'),
					'consumption'=>$resdata['uncw'][$i][$k]['consumption'],
					'meter_name'=>$meter_list_uncw[$i]['UtilityName']              
				);
				$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
			}
		}
				
				
			} 
}
for ($i=0; $i < count($meter_list_unew); $i++) {
			
	for ($k=0; $k < count($datesarray); $k++)
		{ 
			$check=$this->chech_energy_consumotion_undp($meter_list_unew[$i]['UtilityName'],$datesarray[$k]);
	if(count($check)==1){
		$resdata['unew'][$i][$k]['meter']=$check[0]['meter_name'];
	   
		$resdata['unew'][$i][$k]['consumption']=$check[0]['consumption'];

			$resdata['unew'][$i][$k]['date']=$check[0]['report_date'];
			$resdata['unew'][$i][$k]['from']='db';
	}else{
		if($datesarray[$k]>=date('Y-m-d')){
			$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['unew'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['unew'][$i][$k]['date']=$datesarray[$k];
		}else{
			$resdata['unew'][$i][$k]['meter']=$meter_list_unew[$i]['UtilityName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			//echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['unew'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['unew'][$i][$k]['date']=$datesarray[$k];

			$energy_cons_query=array(
				'location_name'=>$meter_list_unew[$i]['UtilityName'],
				'meter_serial'=>'',
				'station_id'=>$meter_list_unew[$i]['StationId'],
				'report_date'=>$datesarray[$k],
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'consumption'=>$resdata['unew'][$i][$k]['consumption'],
				'meter_name'=>$meter_list_unew[$i]['UtilityName']              
			);
			$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
		}
	}
			
			
		} 
}
for ($i=0; $i < count($meter_list_unff); $i++) {
			
	for ($k=0; $k < count($datesarray); $k++)
		{ 
			$check=$this->chech_energy_consumotion_undp($meter_list_unff[$i]['UtilityName'],$datesarray[$k]);
	if(count($check)==1){
		$resdata['unff'][$i][$k]['meter']=$check[0]['meter_name'];
	   
		$resdata['unff'][$i][$k]['consumption']=$check[0]['consumption'];

			$resdata['unff'][$i][$k]['date']=$check[0]['report_date'];
			$resdata['unff'][$i][$k]['from']='db';
	}else{
		if($datesarray[$k]>=date('Y-m-d')){
			$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['unff'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['unff'][$i][$k]['date']=$datesarray[$k];
		}else{
			$resdata['unff'][$i][$k]['meter']=$meter_list_unff[$i]['UtilityName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			//echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['unff'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['unff'][$i][$k]['date']=$datesarray[$k];

			$energy_cons_query=array(
				'location_name'=>$meter_list_unff[$i]['UtilityName'],
				'meter_serial'=>'',
				'station_id'=>$meter_list_unff[$i]['StationId'],
				'report_date'=>$datesarray[$k],
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'consumption'=>$resdata['unff'][$i][$k]['consumption'],
				'meter_name'=>$meter_list_unff[$i]['UtilityName']              
			);
			$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
		}
	}
			
			
		} 
}
for ($i=0; $i < count($meter_list_unww); $i++) {
			
	for ($k=0; $k < count($datesarray); $k++)
		{ 
			$check=$this->chech_energy_consumotion_undp($meter_list_unww[$i]['UtilityName'],$datesarray[$k]);
	if(count($check)==1){
		$resdata['unww'][$i][$k]['meter']=$check[0]['meter_name'];
	   
		$resdata['unww'][$i][$k]['consumption']=$check[0]['consumption'];

			$resdata['unww'][$i][$k]['date']=$check[0]['report_date'];
			$resdata['unww'][$i][$k]['from']='db';
	}else{
		if($datesarray[$k]>=date('Y-m-d')){
			$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['unww'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['unww'][$i][$k]['date']=$datesarray[$k];
		}else{
			$resdata['unww'][$i][$k]['meter']=$meter_list_unww[$i]['UtilityName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			//echo $queryconsutoday;die();
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata['unww'][$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata['unww'][$i][$k]['date']=$datesarray[$k];

			$energy_cons_query=array(
				'location_name'=>$meter_list_unww[$i]['UtilityName'],
				'meter_serial'=>'',
				'station_id'=>$meter_list_unww[$i]['StationId'],
				'report_date'=>$datesarray[$k],
				'created_date'=>date('Y-m-d H:i:s'),
				'updated_date'=>date('Y-m-d H:i:s'),
				'consumption'=>$resdata['unww'][$i][$k]['consumption'],
				'meter_name'=>$meter_list_unww[$i]['UtilityName']              
			);
			$this->db->insert('energy_consumption_report_tbl_undp', $energy_cons_query);
		}
	}
			
			
		} 
}
	

		
					

		return $resdata;
	}
	function get_hardwares_device_data_energy_meters_vegasschool($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		// echo $table_name_live;die();
		$meter_list=$this->get_energymeter_list($table_name);
		// print_r($meter_list);die();
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		//$yesterDay = "2021-10-18";
		$weekday = date('Y-m-d',strtotime("-7 days"));
		$firstday= date('Y-m-01', strtotime($todayDate));
		$earlier = new DateTime($firstday);
		$later = new DateTime($todayDate);

		$abs_diff = $later->diff($earlier)->format("%a")+1; //3

		$date_from_month = strtotime($firstday); 
		$date_to_month = strtotime($todayDate); 
		$datesarray_month=array();
		for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
		{
		array_push($datesarray_month, date("Y-m-d",$i1));  
		}
		//print_r($meter_list);die();
		$Building_Level_Energy_Consumption=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Capacitor Main Panel");
		$Chiller_Plant_Equipment_Energy_Consumption=array("Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","CT Fan_1","CT Fan-II","TFA");
		$AHUs_Energy_Consumption=array("A Wing Gr FL Hvac","A Wing 2nd FL Hvac","A Wing 3rd FL Hvac","B Wing Gr FL Hvac","B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac");
		$Other_Energy_End_uses=array("Light&Power Wing_A","Light&Power Wing_B","WTP");
		for ($i=0; $i < count($Building_Level_Energy_Consumption); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();

				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();


				 

				 $check=$this->chech_energy_consumotion_vegas($Building_Level_Energy_Consumption[$i],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons=0;
				 for ($k=0; $k < count($datesarray_month); $k++)
						 { 
							$month_check=$this->chech_energy_consumotion_vegas($Building_Level_Energy_Consumption[$i],$datesarray_month[$k]);
							$monthly_cons+=(float)$month_check[0]['consumption'];
						 }
						 $monthly_cons_with_today=$monthly_cons+$today_cons;
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Building_Level_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['blec'][$i]['pf']="NA";
				}else{
					$resdata['blec'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['blec'][$i]['meter']=$Building_Level_Energy_Consumption[$i];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['blec'][$i]['todaycons']=round($today_cons,2);
				$resdata['blec'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['blec'][$i]['monthcons']=round($monthly_cons_with_today,2);
				$resdata['blec'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['blec'][$i]['avgcons']=round($monthly_cons_with_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['blec'][$i]['current1']="NA";
				}else{
					$resdata['blec'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['blec'][$i]['current2']="NA";
				}else{
					$resdata['blec'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['blec'][$i]['current3']="NA";
				}else{
					$resdata['blec'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['blec'][$i]['voltage1']="NA";
				}else{
					$resdata['blec'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['blec'][$i]['voltage2']="NA";
				}else{
					$resdata['blec'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['blec'][$i]['voltage3']="NA";
				}else{
					$resdata['blec'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}

		for ($i=0; $i < count($Chiller_Plant_Equipment_Energy_Consumption); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_vegas($Chiller_Plant_Equipment_Energy_Consumption[$i],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons=0;
				 for ($k=0; $k < count($datesarray_month); $k++)
						 { 
							$month_check=$this->chech_energy_consumotion_vegas($Chiller_Plant_Equipment_Energy_Consumption[$i],$datesarray_month[$k]);
							$monthly_cons+=(float)$month_check[0]['consumption'];
						 }
						 $monthly_cons_with_today=$monthly_cons+$today_cons;
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Chiller_Plant_Equipment_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['cpeec'][$i]['pf']="NA";
				}else{
					$resdata['cpeec'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['cpeec'][$i]['meter']=$Chiller_Plant_Equipment_Energy_Consumption[$i];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['cpeec'][$i]['todaycons']=round($today_cons,2);
				$resdata['cpeec'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['cpeec'][$i]['monthcons']=round($monthly_cons_with_today,2);
				$resdata['cpeec'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['cpeec'][$i]['avgcons']=round($monthly_cons_with_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['cpeec'][$i]['current1']="NA";
				}else{
					$resdata['cpeec'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['cpeec'][$i]['current2']="NA";
				}else{
					$resdata['cpeec'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['cpeec'][$i]['current3']="NA";
				}else{
					$resdata['cpeec'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['cpeec'][$i]['voltage1']="NA";
				}else{
					$resdata['cpeec'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['cpeec'][$i]['voltage2']="NA";
				}else{
					$resdata['cpeec'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['cpeec'][$i]['voltage3']="NA";
				}else{
					$resdata['cpeec'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}
		

		for ($i=0; $i < count($AHUs_Energy_Consumption); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_vegas($AHUs_Energy_Consumption[$i],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons=0;
				 for ($k=0; $k < count($datesarray_month); $k++)
						 { 
							$month_check=$this->chech_energy_consumotion_vegas($AHUs_Energy_Consumption[$i],$datesarray_month[$k]);
							$monthly_cons+=(float)$month_check[0]['consumption'];
						 }
						 $monthly_cons_with_today=$monthly_cons+$today_cons;
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$AHUs_Energy_Consumption[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['aec'][$i]['pf']="NA";
				}else{
					$resdata['aec'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['aec'][$i]['meter']=$AHUs_Energy_Consumption[$i];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['aec'][$i]['todaycons']=round($today_cons,2);
				$resdata['aec'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['aec'][$i]['monthcons']=round($monthly_cons_with_today,2);
				$resdata['aec'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['aec'][$i]['avgcons']=round($monthly_cons_with_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['aec'][$i]['current1']="NA";
				}else{
					$resdata['aec'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['aec'][$i]['current2']="NA";
				}else{
					$resdata['aec'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['aec'][$i]['current3']="NA";
				}else{
					$resdata['aec'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['aec'][$i]['voltage1']="NA";
				}else{
					$resdata['aec'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['aec'][$i]['voltage2']="NA";
				}else{
					$resdata['aec'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['aec'][$i]['voltage3']="NA";
				}else{
					$resdata['aec'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}


		for ($i=0; $i < count($Other_Energy_End_uses); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_vegas($Other_Energy_End_uses[$i],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons=0;
				 for ($k=0; $k < count($datesarray_month); $k++)
						 { 
							$month_check=$this->chech_energy_consumotion_vegas($Other_Energy_End_uses[$i],$datesarray_month[$k]);
							$monthly_cons+=(float)$month_check[0]['consumption'];
						 }
						 $monthly_cons_with_today=$monthly_cons+$today_cons;
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$Other_Energy_End_uses[$i]."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['oeeu'][$i]['pf']="NA";
				}else{
					$resdata['oeeu'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['oeeu'][$i]['meter']=$Other_Energy_End_uses[$i];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['oeeu'][$i]['todaycons']=round($today_cons,2);
				$resdata['oeeu'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['oeeu'][$i]['monthcons']=round($monthly_cons_with_today,2);
				$resdata['oeeu'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['oeeu'][$i]['avgcons']=round($monthly_cons_with_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['oeeu'][$i]['current1']="NA";
				}else{
					$resdata['oeeu'][$i]['current1']=$c1_data[0]['cons']."A";
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['oeeu'][$i]['current2']="NA";
				}else{
					$resdata['oeeu'][$i]['current2']=$c2_data[0]['cons']."A";
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['oeeu'][$i]['current3']="NA";
				}else{
					$resdata['oeeu'][$i]['current3']=$c3_data[0]['cons']."A";
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['oeeu'][$i]['voltage1']="NA";
				}else{
					$resdata['oeeu'][$i]['voltage1']=$v1_data[0]['cons']."V";
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['oeeu'][$i]['voltage2']="NA";
				}else{
					$resdata['oeeu'][$i]['voltage2']=$v2_data[0]['cons']."V";
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['oeeu'][$i]['voltage3']="NA";
				}else{
					$resdata['oeeu'][$i]['voltage3']=$v3_data[0]['cons']."V";
				}
				
				
		}
		
		// echo json_encode($resdata);die();
		return $resdata;

	}

	function get_hardwares_device_data_energy_meters_undp($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		$table_name_live=$this->get_table_name_live($station_id);
		// echo $table_name_live;die();
		$meter_list_undp=$this->get_energymeter_list_station($table_name_live,2023000304);
		$meter_list_uncw=$this->get_energymeter_list_station($table_name_live,2023000303);
		$meter_list_unew=$this->get_energymeter_list_station($table_name_live,2023000300);
		$meter_list_unff=$this->get_energymeter_list_station($table_name_live,2023000302);
		$meter_list_unww=$this->get_energymeter_list_station($table_name_live,2023000301);
		$meter_list_unsg=$this->get_energymeter_list_station($table_name_live,2024000143);
		$meter_list_unab=$this->get_energymeter_list_station($table_name_live,2024000144);
		// print_r($meter_list_undp);die();2024000143
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
		// print_r($datesarray_month);die();
		// $Building_Level_Energy_Consumption=array("Main Incomer", "DG-1 (200 KVA)", "DG-2 (65 KVA)","Capacitor Main Panel");
		// $Chiller_Plant_Equipment_Energy_Consumption=array("Hvac 250A","Chiller_1","Chiller-II","Primary Pump_1","Primary Pump_2","Primary Chill Pump_3","Condenser Pump_1","Condenser Pump_2","Condenser Pump_3","CT Fan_1","CT Fan-II","TFA");
		// $AHUs_Energy_Consumption=array("A Wing Gr FL Hvac","A Wing 2nd FL Hvac","A Wing 3rd FL Hvac","B Wing Gr FL Hvac","B Wing 1st FL Hvac","B Wing 2nd FL Hvac","B Wing 3rd FL Hvac","B Wing 4th FL Hvac");
		// $Other_Energy_End_uses=array("Light&Power Wing_A","Light&Power Wing_B","WTP");
		for ($i=0; $i < count($meter_list_undp); $i++) { 

			    $enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
			     $kwdata = $this->db->query($enquery_kw)->result_array();
                 if($meter_list_undp[$i]['UtilityName'] == 'AC Plant Incomer' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _2' || $meter_list_undp[$i]['UtilityName'] == 'Chiller _1' || $meter_list_undp[$i]['UtilityName'] == 'East Wing AHU' || $meter_list_undp[$i]['UtilityName'] == 'VFD Secondary Pump 2'){
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
			     $c1_data = $this->db->query($enquery_current1)->result_array();

				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
			     $c2_data = $this->db->query($enquery_current2)->result_array();

				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
			     $c3_data = $this->db->query($enquery_current3)->result_array();


				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
			     $v1_data = $this->db->query($enquery_volt1)->result_array();

				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
			     $v2_data = $this->db->query($enquery_volt2)->result_array();

				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
			     $v3_data = $this->db->query($enquery_volt3)->result_array();
				 }else{
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
					$c1_data = $this->db->query($enquery_current1)->result_array();
   
					$enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
					$c2_data = $this->db->query($enquery_current2)->result_array();
   
					$enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
					$c3_data = $this->db->query($enquery_current3)->result_array();
   
   
					$enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
					$v1_data = $this->db->query($enquery_volt1)->result_array();
   
					$enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
					$v2_data = $this->db->query($enquery_volt2)->result_array();
   
					$enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
					$v3_data = $this->db->query($enquery_volt3)->result_array();
				 }
				 


				 

				 $check=$this->chech_energy_consumotion_undp($meter_list_undp[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				//  $monthly_cons=0;
				//  for ($k=0; $k < count($datesarray_month); $k++)
				// 		 { 
				// 			$month_check=$this->chech_energy_consumotion_month_undp($meter_list_undp[$i]['UtilityName'],$firstday,$yesterDay);
				// 			$monthly_cons+=(float)$month_check[0]['consumption'];
				// 		 }
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_undp[$i]['UtilityName'],$firstday,$yesterDay);
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_undp[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['undp'][$i]['pf']="NA";
				}else{
					$resdata['undp'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['undp'][$i]['meter']=$meter_list_undp[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['undp'][$i]['todaycons']=round($today_cons,2);
				$resdata['undp'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['undp'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['undp'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['undp'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['undp'][$i]['current1']="NA";
				}else{
					$resdata['undp'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['undp'][$i]['current2']="NA";
				}else{
					$resdata['undp'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['undp'][$i]['current3']="NA";
				}else{
					$resdata['undp'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['undp'][$i]['voltage1']="NA";
				}else{
					$resdata['undp'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['undp'][$i]['voltage2']="NA";
				}else{
					$resdata['undp'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['undp'][$i]['voltage3']="NA";
				}else{
					$resdata['undp'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}

		for ($i=0; $i < count($meter_list_uncw); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_undp($meter_list_uncw[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				
				$monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_uncw[$i]['UtilityName'],$firstday,$yesterDay);
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_uncw[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['uncw'][$i]['pf']="NA";
				}else{
					$resdata['uncw'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['uncw'][$i]['meter']=$meter_list_uncw[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['uncw'][$i]['todaycons']=round($today_cons,2);
				$resdata['uncw'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['uncw'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['uncw'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['uncw'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['uncw'][$i]['current1']="NA";
				}else{
					$resdata['uncw'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['uncw'][$i]['current2']="NA";
				}else{
					$resdata['uncw'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['uncw'][$i]['current3']="NA";
				}else{
					$resdata['uncw'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['uncw'][$i]['voltage1']="NA";
				}else{
					$resdata['uncw'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['uncw'][$i]['voltage2']="NA";
				}else{
					$resdata['uncw'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['uncw'][$i]['voltage3']="NA";
				}else{
					$resdata['uncw'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}
		

		for ($i=0; $i < count($meter_list_unew); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_undp($meter_list_unew[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_unew[$i]['UtilityName'],$firstday,$yesterDay);
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unew[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['unew'][$i]['pf']="NA";
				}else{
					$resdata['unew'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['unew'][$i]['meter']=$meter_list_unew[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['unew'][$i]['todaycons']=round($today_cons,2);
				$resdata['unew'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['unew'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['unew'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['unew'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['unew'][$i]['current1']="NA";
				}else{
					$resdata['unew'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['unew'][$i]['current2']="NA";
				}else{
					$resdata['unew'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['unew'][$i]['current3']="NA";
				}else{
					$resdata['unew'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['unew'][$i]['voltage1']="NA";
				}else{
					$resdata['unew'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['unew'][$i]['voltage2']="NA";
				}else{
					$resdata['unew'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['unew'][$i]['voltage3']="NA";
				}else{
					$resdata['unew'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}


		for ($i=0; $i < count($meter_list_unff); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();

				 if($meter_list_unff[$i]['UtilityName']=='Solar Meter'){
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
					$c1_data = $this->db->query($enquery_current1)->result_array();
		   
					$enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
					$c2_data = $this->db->query($enquery_current2)->result_array();
		   
					$enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
					$c3_data = $this->db->query($enquery_current3)->result_array();
		   
		   
					$enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
					$v1_data = $this->db->query($enquery_volt1)->result_array();
		   
					$enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
					$v2_data = $this->db->query($enquery_volt2)->result_array();
		   
					$enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
					$v3_data = $this->db->query($enquery_volt3)->result_array();
				 }else{
					$enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_1'	ORDER BY TxnTime desc limit 1";
					$c1_data = $this->db->query($enquery_current1)->result_array();
		   
					$enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_2'	ORDER BY TxnTime desc limit 1";
					$c2_data = $this->db->query($enquery_current2)->result_array();
		   
					$enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_3'	ORDER BY TxnTime desc limit 1";
					$c3_data = $this->db->query($enquery_current3)->result_array();
		   
		   
					$enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_1'	ORDER BY TxnTime desc limit 1";
					$v1_data = $this->db->query($enquery_volt1)->result_array();
		   
					$enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_2'	ORDER BY TxnTime desc limit 1";
					$v2_data = $this->db->query($enquery_volt2)->result_array();
		   
					$enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_3'	ORDER BY TxnTime desc limit 1";
					$v3_data = $this->db->query($enquery_volt3)->result_array();
		   
				 }
		
				 
		
				 
		
				 $check=$this->chech_energy_consumotion_undp($meter_list_unff[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_unff[$i]['UtilityName'],$firstday,$yesterDay);
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unff[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['unff'][$i]['pf']="NA";
				}else{
					$resdata['unff'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['unff'][$i]['meter']=$meter_list_unff[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['unff'][$i]['todaycons']=round($today_cons,2);
				$resdata['unff'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['unff'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['unff'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['unff'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['unff'][$i]['current1']="NA";
				}else{
					$resdata['unff'][$i]['current1']=$c1_data[0]['cons']."A";
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['unff'][$i]['current2']="NA";
				}else{
					$resdata['unff'][$i]['current2']=$c2_data[0]['cons']."A";
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['unff'][$i]['current3']="NA";
				}else{
					$resdata['unff'][$i]['current3']=$c3_data[0]['cons']."A";
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['unff'][$i]['voltage1']="NA";
				}else{
					$resdata['unff'][$i]['voltage1']=$v1_data[0]['cons']."V";
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['unff'][$i]['voltage2']="NA";
				}else{
					$resdata['unff'][$i]['voltage2']=$v2_data[0]['cons']."V";
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['unff'][$i]['voltage3']="NA";
				}else{
					$resdata['unff'][$i]['voltage3']=$v3_data[0]['cons']."V";
				}
				
				
		}
		for ($i=0; $i < count($meter_list_unww); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_undp($meter_list_unww[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_unww[$i]['UtilityName'],$firstday,$yesterDay);
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unww[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['unww'][$i]['pf']="NA";
				}else{
					$resdata['unww'][$i]['pf']=$pfdata[0]['cons'];
				}				
			
				$resdata['unww'][$i]['meter']=$meter_list_unww[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['unww'][$i]['todaycons']=round($today_cons,2);
				$resdata['unww'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['unww'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['unww'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['unww'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['unww'][$i]['current1']="NA";
				}else{
					$resdata['unww'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['unww'][$i]['current2']="NA";
				}else{
					$resdata['unww'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['unww'][$i]['current3']="NA";
				}else{
					$resdata['unww'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['unww'][$i]['voltage1']="NA";
				}else{
					$resdata['unww'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['unww'][$i]['voltage2']="NA";
				}else{
					$resdata['unww'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['unww'][$i]['voltage3']="NA";
				}else{
					$resdata['unww'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}
		for ($i=0; $i < count($meter_list_unsg); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_undp($meter_list_unsg[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_unsg[$i]['UtilityName'],$firstday,$yesterDay);
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unsg[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['unsg'][$i]['pf']="NA";
				}else{
					$resdata['unsg'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['unsg'][$i]['meter']=$meter_list_unsg[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['unsg'][$i]['todaycons']=round($today_cons,2);
				$resdata['unsg'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['unsg'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['unsg'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['unsg'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['unsg'][$i]['current1']="NA";
				}else{
					$resdata['unsg'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['unsg'][$i]['current2']="NA";
				}else{
					$resdata['unsg'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['unsg'][$i]['current3']="NA";
				}else{
					$resdata['unsg'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['unsg'][$i]['voltage1']="NA";
				}else{
					$resdata['unsg'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['unsg'][$i]['voltage2']="NA";
				}else{
					$resdata['unsg'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['unsg'][$i]['voltage3']="NA";
				}else{
					$resdata['unsg'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}
		for ($i=0; $i < count($meter_list_unab); $i++) { 

			$enquery="SELECT SUM(Consumption) as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();
			$today_cons=round($consdata[0]['cons'],2);
				$enquery_kw="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kW'	ORDER BY TxnTime desc limit 1";
				 $kwdata = $this->db->query($enquery_kw)->result_array();
		
				 $enquery_current1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_R'	ORDER BY TxnTime desc limit 1";
				 $c1_data = $this->db->query($enquery_current1)->result_array();
		
				 $enquery_current2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_Y'	ORDER BY TxnTime desc limit 1";
				 $c2_data = $this->db->query($enquery_current2)->result_array();
		
				 $enquery_current3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Current_B'	ORDER BY TxnTime desc limit 1";
				 $c3_data = $this->db->query($enquery_current3)->result_array();
		
		
				 $enquery_volt1="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_R'	ORDER BY TxnTime desc limit 1";
				 $v1_data = $this->db->query($enquery_volt1)->result_array();
		
				 $enquery_volt2="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_Y'	ORDER BY TxnTime desc limit 1";
				 $v2_data = $this->db->query($enquery_volt2)->result_array();
		
				 $enquery_volt3="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Voltage_B'	ORDER BY TxnTime desc limit 1";
				 $v3_data = $this->db->query($enquery_volt3)->result_array();
		
		
				 
		
				 $check=$this->chech_energy_consumotion_undp($meter_list_unab[$i]['UtilityName'],$yesterDay);
				 $yest_consumption=(float)$check[0]['consumption'];
				 
				 $monthly_cons_without_today=$this->chech_energy_consumotion_month_undp($meter_list_unab[$i]['UtilityName'],$firstday,$yesterDay);
				
				$enquery_pf="SELECT Consumption as cons FROM $table_name_live WHERE `UtilityName`='".$meter_list_unab[$i]['UtilityName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
			//echo $enquery;die();kW
				
				$pfdata = $this->db->query($enquery_pf)->result_array();
				if(is_null($pfdata[0]['cons'])){
					$resdata['unab'][$i]['pf']="NA";
				}else{
					$resdata['unab'][$i]['pf']=$pfdata[0]['cons'];
				}
				
			
				$resdata['unab'][$i]['meter']=$meter_list_unab[$i]['UtilityName'];
			
				//$resdata[$i]['meter']=$meters['LocationName'];
				$resdata['unab'][$i]['todaycons']=round($today_cons,2);
				$resdata['unab'][$i]['yestcons']=round($yest_consumption,2);
				$resdata['unab'][$i]['monthcons']=round($monthly_cons_without_today,2);
				$resdata['unab'][$i]['kw']=$kwdata[0]['cons'];
				$resdata['unab'][$i]['avgcons']=round($monthly_cons_without_today/$abs_diff,2);
				if(is_null($c1_data[0]['cons'])){
					$resdata['unab'][$i]['current1']="NA";
				}else{
					$resdata['unab'][$i]['current1']=$c1_data[0]['cons'];
				}
				if(is_null($c2_data[0]['cons'])){
					$resdata['unab'][$i]['current2']="NA";
				}else{
					$resdata['unab'][$i]['current2']=$c2_data[0]['cons'];
				}
				if(is_null($c3_data[0]['cons'])){
					$resdata['unab'][$i]['current3']="NA";
				}else{
					$resdata['unab'][$i]['current3']=$c3_data[0]['cons'];
				}
				if(is_null($v1_data[0]['cons'])){
					$resdata['unab'][$i]['voltage1']="NA";
				}else{
					$resdata['unab'][$i]['voltage1']=$v1_data[0]['cons'];
				}
				if(is_null($v2_data[0]['cons'])){
					$resdata['unab'][$i]['voltage2']="NA";
				}else{
					$resdata['unab'][$i]['voltage2']=$v2_data[0]['cons'];
				}
				if(is_null($v3_data[0]['cons'])){
					$resdata['unab'][$i]['voltage3']="NA";
				}else{
					$resdata['unab'][$i]['voltage3']=$v3_data[0]['cons'];
				}
				
				
		}
		
		// echo json_encode($resdata);die();
		return $resdata;

	}
		function get_hardwares_device_data_energy_meters($data,$data2){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-10-15";
		$table_name=$this->get_table_name($station_id);
		if(isset($table_name)){
			$meter_list=$this->get_energymeter_list($table_name);
			$yesterDay = date('Y-m-d',strtotime("-1 days"));
			//$yesterDay = "2021-10-18";
			$weekday = date('Y-m-d',strtotime("-7 days"));
			$firstday= date('Y-m-01', strtotime($todayDate));
			$earlier = new DateTime($firstday);
			$later = new DateTime($todayDate);
	
			$abs_diff = $later->diff($earlier)->format("%a")+1; //3
	
			$date_from_month = strtotime($firstday); 
			$date_to_month = strtotime($todayDate); 
			$datesarray_month=array();
			for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
			{
			array_push($datesarray_month, date("Y-m-d",$i1));  
			}
			//print_r($meter_list);die();
			$i=0;
			foreach($meter_list as $meters){
				$enquery="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
				//echo $enquery;die();
					$consdata = $this->db->query($enquery)->result_array();
				$today_cons=round($consdata[0]['cons'],2);
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
					
					$enquery_pf="SELECT Consumption as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='PF'	ORDER BY TxnTime desc limit 1";
				//echo $enquery;die();kW
					
					$pfdata = $this->db->query($enquery_pf)->result_array();
					$resdata[$i]['pf']=$pfdata[0]['cons'];
				if($meters['LocationName']=="AFS project-C"){ 
					$resdata[$i]['meter']="Container office";
				}else if($meters['LocationName']=="B4 Building"){
					// $resdata[$i]['meter']="A4 Building";
					$resdata[$i]['meter']="STP";
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
					$resdata[$i]['todaycons']=round($today_cons,2);
					$resdata[$i]['yestcons']=round($yest_consumption,2);
					$resdata[$i]['monthcons']=round($monthly_cons_with_today,2);
					$resdata[$i]['kw']=$kwdata[0]['cons'];
					$resdata[$i]['avgcons']=round($monthly_cons_with_today/$abs_diff,2);
	
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
		}else{
			$i=0;
			foreach($data2 as $meters){
				$resdata[$i]['meter']=$meters['api_name'];
				$resdata[$i]['todaycons']="NA";
				$resdata[$i]['yestcons']="NA";
				$resdata[$i]['monthcons']="NA";
				$resdata[$i]['kw']="NA";
				$resdata[$i]['avgcons']="NA";

				$resdata[$i]['current1']="NA";
				$resdata[$i]['current2']="NA";
				$resdata[$i]['current3']="NA";
				$resdata[$i]['voltage1']="NA";
				$resdata[$i]['voltage2']="NA";
				$resdata[$i]['voltage3']="NA";
				$resdata[$i]['kva']="NA";
				$resdata[$i]['kvah']="NA";
			$i++;
			}
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
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

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
				$water_data=[];
				for($t=0;$t<count($datesarray);$t++){
					$check=$this->check_water_level_data($utilityName,$locationName,$datesarray[$t]);
					if(count($check)==1){
						//$resdata['meter']=$check[0]['meter_name'];
						$water_data=array_merge($water_data,unserialize($check[0]['water_level_data']));
						//$resdata['leveldata']=unserialize($check[0]['water_level_data']);
						
					}else{
						if($datesarray[$t]>=date('Y-m-d')){
							if($locationName=='Fire Tank-1'){
								$querywaterlevel="SELECT round(`CurReading`*1.34*500,2)/1000 as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
							}else{
								$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
							}
							
							//echo $querywaterlevel;die();
							$datawaterlevel = $this->db->query($querywaterlevel)->result();
							$water_data=array_merge($water_data,$datawaterlevel);
							$resdata['meter']=$dashboardName;
							$resdata['leveldata']=$datawaterlevel;
						}else{
							if($locationName=='Fire Tank-1'){
								$querywaterlevel="SELECT round(`CurReading`*1.34*500,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
							}else{
								$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
							}
							$datawaterlevel = $this->db->query($querywaterlevel)->result();
							$water_data=array_merge($water_data,$datawaterlevel);
							// $resdata['meter']=$dashboardName;
							// $resdata['leveldata']=$datawaterlevel;
							$water_level_array=array(
								'utility_name'=>$utilityName,
								'location_name'=>$locationName,							
								'report_date'=>$datesarray[$t],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'water_level_data'=>serialize($datawaterlevel),
								'meter_name'=>$dashboardName              
							);
							// echo json_encode($water_level_array);die();
							$this->db->insert('water_level_report_tbl', $water_level_array);
							// echo  $this->db->last_query();die();
						}
					}
				}
							$resdata['meter']=$dashboardName;
							$resdata['leveldata']=$water_data;
				
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
	function get_table_name_live($c_id) {
        $this->db->select('db_table_live');
        $this->db->from('clients');
        $this->db->where('station_id', $c_id);
        $page = $this->db->get()->row_array();
        return $page['db_table_live'];
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
	$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		
		$dashboardName=$data['dashboard_name'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		 for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
		 {
		   array_push($datesarray, date("Y-m-d",$i1));  
		 }
	$meter_list=$this->get_meters_name($table_name);
 
	$i=0;
	 foreach($meter_list as $meters){
		 $water_data=[];
		 for($t=0;$t<count($datesarray);$t++){
			$check=$this->check_water_level_data_mum($utilityName,$meters['LocationName'],$datesarray[$t]);
			if(count($check)==1){
				//$resdata['meter']=$check[0]['meter_name'];
				$water_data=array_merge($water_data,unserialize($check[0]['water_level_data']));
				//$resdata['leveldata']=unserialize($check[0]['water_level_data']);
				
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
					// echo $querywaterlevel."<br>";
					$datawaterlevel = $this->db->query($querywaterlevel)->result();
					$water_data=array_merge($water_data,$datawaterlevel);
					//$resdata['meter']=$dashboardName;
					//$resdata['leveldata']=$datawaterlevel;
				}else{
					$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$meters['LocationName']."' ORDER BY TxnDate ASC,TxnTime ASC";
					$datawaterlevel = $this->db->query($querywaterlevel)->result();
					$water_data=array_merge($water_data,$datawaterlevel);
					// $resdata['meter']=$dashboardName;
					// $resdata['leveldata']=$datawaterlevel;
					$water_level_array=array(
						'utility_name'=>$utilityName,
						'location_name'=>$meters['LocationName'],							
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'water_level_data'=>serialize($datawaterlevel),
						'meter_name'=>$dashboardName              
					);
					// echo json_encode($water_level_array);die();
					$this->db->insert('water_level_report_tbl_mumbai', $water_level_array);
					// echo  $this->db->last_query();die();
				}
			}
			 
		 }
		 $resdata[$i]['meter']=$meters['LocationName'];
		 $resdata[$i]['leveldata']=$water_data;			
		 
	$i++;
	 }
	
 
//  echo json_encode($resdata);die();
	return $resdata;

}

	function get_hardwares_device_data_waterlevelmeter($data){
		
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);	
		$dashboardName=$data['dashboard_name'];		
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$capacity=$data['capacity'];
		$multiplier=$data['multiplier'];
		$todayDate=date("Y-m-d");
		
		if(isset($table_name)){
			$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnTime DESC LIMIT 1";
			//echo $multiplier."<br>";die();
			// oberoi meters
			// Fire Water Sump,Dom. Water Sump
			//Fire Tank-1,Fire-2,Fire-3,Raw Water
			$datawaterlevel = $this->db->query($querywaterlevel)->result_array();
			
			$waterlevel=$datawaterlevel[0]['CurReading']*$multiplier;	
	
			$resdata['meter']=$dashboardName;
			$resdata['capacity']=round($capacity/1000);
			$resdata['currentlevel']=round($waterlevel/1000,2);
			$resdata['filledpercent']=round(($waterlevel/$capacity)*100,2);
			$resdata['filledpercent_1']=round(($waterlevel/$capacity)*100);
		}else{
			$resdata['meter']=$dashboardName;
			$resdata['capacity']=round($capacity/1000);
			$resdata['currentlevel']="NA";
			$resdata['filledpercent']="NA";
			$resdata['filledpercent_1']="NA";
		}
		
		
		return $resdata;

	}
	function get_hardwares_device_data_iaq($data){
		$dashboardName=$data['dashboard_name'];		
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$todayDate=date("Y-m-d");
		$tempQuery="SELECT MIN(CurReading) as min,MAX(CurReading) as max,round(AVG(CurReading),2) as avg FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Room Temp' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		$humidityQuery="SELECT MIN(CurReading) as min,MAX(CurReading) as max,round(AVG(CurReading),2) as avg FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Humidity' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		$tempdata = $this->db->query($tempQuery)->result_array();
		$humiditydata = $this->db->query($humidityQuery)->result_array();

		$tempQueryGraph="SELECT round(CurReading*9/5+32,2) as CurReading,TxnTime FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Room Temp' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		// echo $tempQueryGraph;die();
		$humidityQueryGraph="SELECT CurReading,TxnTime FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Humidity' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		$tempdatagraph = $this->db->query($tempQueryGraph)->result_array();
		$humiditydatagraph = $this->db->query($humidityQueryGraph)->result_array();

		if(is_null( $tempdata[0]['min'])){
			$resdata['meter']=$locationName;
			$resdata['tempMin']="NA";
			$resdata['tempMax']="NA";
			$resdata['tempAvg']="NA";
			$resdata['humMin']="NA";
			$resdata['humMax']="NA"; 
			$resdata['humAvg']="NA";
			$resdata['tempGraph']="NA";
			$resdata['humiGraph']="NA";
		}else{
			$resdata['meter']=$locationName;
			$resdata['tempMin']=round($tempdata[0]['min']*9/5+32,2);
			$resdata['tempMax']=round($tempdata[0]['max']*9/5+32,2);
			$resdata['tempAvg']=round($tempdata[0]['avg']*9/5+32,2);
			$resdata['humMin']=$humiditydata[0]['min'];
			$resdata['humMax']=$humiditydata[0]['max'];
			$resdata['humAvg']=$humiditydata[0]['avg'];
			$resdata['tempGraph']=$tempdatagraph;
			$resdata['humiGraph']=$humiditydatagraph;
		}
		    
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
		$week = date('Y-m-d',strtotime("-7 days"));
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);


		$date_from_week = strtotime($week); 
        $date_to_week = strtotime($yesterDay); 
        $datesarray_week=array();
		for ($i1=$date_from_week; $i1<=$date_to_week; $i1+=86400)
        {
          array_push($datesarray_week, date("Y-m-d",$i1));  
        }

		$date_from_month = strtotime($firstday); 
        $date_to_month = strtotime($todayDate); 
        $datesarray_month=array();
		for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
        {
          array_push($datesarray_month, date("Y-m-d",$i1));  
        }

// echo json_encode($datesarray_month);die();

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
					
					if(is_null($switch_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['running_status']="OFFLINE";
						$resultArray['run_data'][$i]['switch_status']="OFFLINE";
						$resultArray['run_data'][$i]['datar']="OFFLINE";
						$resultArray['run_data'][$i]['datas']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datar']="ONLINE";
						$resultArray['run_data'][$i]['datas']="ONLINE";
						$resultArray['run_data'][$i]['running_status']=true;
						if($switch_status_data[0]['CurReading']==1){
							$resultArray['run_data'][$i]['switch_status']=true;
						}else{
							$resultArray['run_data'][$i]['switch_status']=false;
						}
						
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
					$today_runn=(int)$datarun_today[0]['run'];
					$yest_check=$this->check_firepump_running('J_Pump Auto RHT','Old Fire Pump',$yesterDay,$list['fire_pump_name'],'0071');
                    if(count($yest_check)==1){
						$yesterday_runn=(int)$yest_check[0]['running_min2'];
					}else{
						$runn_yest="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
						//echo $pressure;die();
						 $datarun_yest = $this->db->query($runn_yest)->result_array();
						 $yesterday_runn=(int)$datarun_yest[0]['run'];
					}
					$weekly_runn=0;
                    for ($k=0; $k < count($datesarray_week); $k++)
							{ 
								$week_check=$this->check_firepump_running('J_Pump Auto RHT','Old Fire Pump',$datesarray_week[$k],$list['fire_pump_name'],'0071');
								if(count($week_check)==1){
									$weekly_runn+=$week_check[0]['running_min2'];
								}else{
									$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate = '".$datesarray_week[$k]."'  ";
									//echo $pressure;die();
									 $datarun_week = $this->db->query($runn_week)->result_array();
									 $weekly_runn+=$datarun_week[0]['run'];
								}
								
							}
							$monthly_runn=0;
							for ($k=0; $k < count($datesarray_month); $k++)
									{ 
										$month_check=$this->check_firepump_running('J_Pump Auto RHT','Old Fire Pump',$datesarray_month[$k],$list['fire_pump_name'],'0071');
										if(count($month_check)==1){
											$monthly_runn+=$month_check[0]['running_min2'];
										}else{
											$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate = '".$datesarray_month[$k]."'  ";
											//echo $pressure;die();
											 $runn_month = $this->db->query($runn_week)->result_array();
											 $monthly_runn+=$runn_month[0]['run'];
										}
										
									}
                 
				  				 $monthly_runn_with_today=$monthly_runn+$today_runn;

					
					
					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					
					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if(is_null($run_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datar']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datar']="ONLINE";
						if($run_status_data[0]['CurReading']==0){
							$resultArray['run_data'][$i]['running_status']=false;
						}else{
							$resultArray['run_data'][$i]['running_status']=true;
						}
					}
					if(is_null($switch_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datas']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datas']="ONLINE";
						if($switch_status_data[0]['CurReading']==1){
							$resultArray['run_data'][$i]['switch_status']=true;
						}else{
							$resultArray['run_data'][$i]['switch_status']=false;
						}
					}
					
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_with_today*60);
					$i++;



				}else if($list['fire_pump_name']=='Main Pump'){
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump On' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Auto Mode' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					

					$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$todayDate."' ";
				   //echo $pressure;die();
					$datarun_today = $this->db->query($runn_today)->result_array();
					$today_runn=(int)$datarun_today[0]['run'];
					$yest_check=$this->check_firepump_running('Main Pump RHT','Old Fire Pump',$yesterDay,$list['fire_pump_name'],'0071');
                    if(count($yest_check)==1){
						$yesterday_runn=(int)$yest_check[0]['running_min2'];
					}else{
						$runn_yest="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
						//echo $pressure;die();
						 $datarun_yest = $this->db->query($runn_yest)->result_array();
						 $yesterday_runn=(int)$datarun_yest[0]['run'];
					}
					
					$weekly_runn=0;
                    for ($k=0; $k < count($datesarray_week); $k++)
							{ 
								$week_check=$this->check_firepump_running('Main Pump RHT','Old Fire Pump',$datesarray_week[$k],$list['fire_pump_name'],'0071');
								if(count($week_check)==1){
									$weekly_runn+=$week_check[0]['running_min2'];
								}else{
									$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate = '".$datesarray_week[$k]."'  ";
									//echo $pressure;die();
									 $datarun_week = $this->db->query($runn_week)->result_array();
									 $weekly_runn+=$datarun_week[0]['run'];
								}
								
							}
							$monthly_runn=0;
							for ($k=0; $k < count($datesarray_month); $k++)
									{ 
										$month_check=$this->check_firepump_running('Main Pump RHT','Old Fire Pump',$datesarray_month[$k],$list['fire_pump_name'],'0071');
										if(count($month_check)==1){
											$monthly_runn+=$month_check[0]['running_min2'];
										}else{
											$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate = '".$datesarray_month[$k]."'  ";
											//echo $pressure;die();
											 $runn_month = $this->db->query($runn_week)->result_array();
											 $monthly_runn+=$runn_month[0]['run'];
										}
										
									}
                 
				  				 $monthly_runn_with_today=$monthly_runn+$today_runn;
					

					
					
					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					
					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if(is_null($run_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datar']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datar']="ONLINE";
						if($run_status_data[0]['CurReading']==0){
							$resultArray['run_data'][$i]['running_status']=false;
						}else{
							$resultArray['run_data'][$i]['running_status']=true;
						}
					}
					if(is_null($switch_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datas']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datas']="ONLINE";
						if($switch_status_data[0]['CurReading']==1){
							$resultArray['run_data'][$i]['switch_status']=true;
						}else{
							$resultArray['run_data'][$i]['switch_status']=false;
						}
					}
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_with_today*60);
					$i++;
				}else{
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG ON' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG Auto' and MeterSerial='0071' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					

					$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$todayDate."' ";
				   //echo $pressure;die();
					$datarun_today = $this->db->query($runn_today)->result_array();
					$today_runn=(int)$datarun_today[0]['run'];
					$yest_check=$this->check_firepump_running('DG On RHT','Old Fire Pump',$yesterDay,$list['fire_pump_name'],'0071');
                    if(count($yest_check)==1){
						$yesterday_runn=(int)$yest_check[0]['running_min2'];
					}else{
						$runn_yest="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$yesterDay."' ";
						//echo $pressure;die();
						 $datarun_yest = $this->db->query($runn_yest)->result_array();
						 $yesterday_runn=(int)$datarun_yest[0]['run'];
					}
					
					$weekly_runn=0;
                    for ($k=0; $k < count($datesarray_week); $k++)
							{ 
								$week_check=$this->check_firepump_running('DG On RHT','Old Fire Pump',$datesarray_week[$k],$list['fire_pump_name'],'0071');
								if(count($week_check)==1){
									$weekly_runn+=$week_check[0]['running_min2'];
								}else{
									$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate = '".$datesarray_week[$k]."'  ";
									//echo $pressure;die();
									 $datarun_week = $this->db->query($runn_week)->result_array();
									 $weekly_runn+=$datarun_week[0]['run'];
								}
								
							}
							$monthly_runn=0;
							for ($k=0; $k < count($datesarray_month); $k++)
									{ 
										$month_check=$this->check_firepump_running('DG On RHT','Old Fire Pump',$datesarray_month[$k],$list['fire_pump_name'],'0071');
										if(count($month_check)==1){
											$monthly_runn+=$month_check[0]['running_min2'];
										}else{
											$runn_week="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate = '".$datesarray_month[$k]."'  ";
											//echo $pressure;die();
											 $runn_month = $this->db->query($runn_week)->result_array();
											 $monthly_runn+=$runn_month[0]['run'];
										}
										
									}
                 
				  				 $monthly_runn_with_today=$monthly_runn+$today_runn;
					
					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					
					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if(is_null($run_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datar']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datar']="ONLINE";
						if($run_status_data[0]['CurReading']==0){
							$resultArray['run_data'][$i]['running_status']=false;
						}else{
							$resultArray['run_data'][$i]['running_status']=true;
						}
					}
					if(is_null($switch_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datas']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datas']="ONLINE";
						if($switch_status_data[0]['CurReading']==1){
							$resultArray['run_data'][$i]['switch_status']=true;
						}else{
							$resultArray['run_data'][$i]['switch_status']=false;
						}
					}
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_with_today*60);
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
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";


					$today_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ";
					$yesterday_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$yesterDay."'  ";
					$weekly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
					$monthly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";

					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$today_runn_data = $this->db->query($today_runn_query)->result_array();
					$yesterday_runn_data = $this->db->query($yesterday_runn_query)->result_array();
					$weekly_runn_data = $this->db->query($weekly_runn_query)->result_array();
					$monthly_runn_data = $this->db->query($monthly_runn_query)->result_array();

					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if(is_null($run_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datar']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datar']="ONLINE";
						if($run_status_data[0]['CurReading']==0){
							$resultArray['run_data'][$i]['running_status']=false;
						}else{
							$resultArray['run_data'][$i]['running_status']=true;
						}
					}
					
					
					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn_data[0]['cons']*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_data[0]['cons']*60);

					// $resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime(0*60);
					// $resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime(0*60);
					// $resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime(0*60);
					// $resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month(0*60);
					$i++;



				}else{
					$runn_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Engine Run' and MeterSerial='0070' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					$switch_status_query="SELECT CurReading	FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Off/Manual Auto' and MeterSerial='0070' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime desc limit 1";

					// $today_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ";
					// $yesterday_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate='".$yesterDay."'  ";
					// $weekly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$end_week."' and '".$todayDate."'";
					// $monthly_runn_query="SELECT SUM(Consumption) as cons FROM $table_name where UtilityName='New Fire Pump' and LineConnected='Jockey Pump RHT' and MeterSerial='0069' and StationId='".$station_id."' and TxnDate between '".$firstday."' and '".$todayDate."'";

					$run_status_data = $this->db->query($runn_status_query)->result_array();
					$switch_status_data = $this->db->query($switch_status_query)->result_array();
					// $today_runn_data = $this->db->query($today_runn_query)->result_array();
					// $yesterday_runn_data = $this->db->query($yesterday_runn_query)->result_array();
					// $weekly_runn_data = $this->db->query($weekly_runn_query)->result_array();
					// $monthly_runn_data = $this->db->query($monthly_runn_query)->result_array();

					$resultArray['run_data'][$i]['meter']=$list['fire_pump_name'];
					if(is_null($run_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datar']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datar']="ONLINE";
						if($run_status_data[0]['CurReading']==0){
							$resultArray['run_data'][$i]['running_status']=false;
						}else{
							$resultArray['run_data'][$i]['running_status']=true;
						}
					}
					if(is_null($switch_status_data[0]['CurReading'])){
						$resultArray['run_data'][$i]['datas']="OFFLINE";
					}else{
						$resultArray['run_data'][$i]['datas']="ONLINE";
						if($switch_status_data[0]['CurReading']==1){
							$resultArray['run_data'][$i]['switch_status']=true;
						}else{
							$resultArray['run_data'][$i]['switch_status']=false;
						}
					}
					
					// $resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime($today_runn_data[0]['cons']*60);
					// $resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime($yesterday_runn_data[0]['cons']*60);
					// $resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime($weekly_runn_data[0]['cons']*60);
					// $resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month($monthly_runn_data[0]['cons']*60);

					$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime(0*60);
					$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime(0*60);
					$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime(0*60);
					$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month(0*60);
					$i++;
				}
				

				
   
		   }
			//$pressure="SELECT round(CurReading*Multiplier/1.5,2) as pressure,TxnTime FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
			$pressure="SELECT round(CurReading*Multiplier,2) as pressure,TxnTime FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
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
		
		if(isset($table_name)){
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

		$date_from_week = strtotime($start_week); 
        $date_to_week = strtotime($end_week); 
        $datesarray_week=array();
		for ($i1=$date_from_week; $i1<=$date_to_week; $i1+=86400)
        {
          array_push($datesarray_week, date("Y-m-d",$i1));  
        }

		$date_from_month = strtotime($firstday); 
        $date_to_month = strtotime($todayDate); 
        $datesarray_month=array();
		for ($i1=$date_from_month; $i1<=$date_to_month; $i1+=86400)
        {
          array_push($datesarray_month, date("Y-m-d",$i1));  
        }


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
			
				
				$todayqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$todayDate."' and MeterSerial='0061'  ";
				// echo $todayqueryConsu;die();
				$todaydatacons = $this->db->query($todayqueryConsu)->result_array();
				$today_runn=$todaydatacons[0]['cons'];

				$yest_check=$this->chech_hydro_running($list['UtilityName'],$yesterDay,'0061');
				// echo json_encode($yest_check);die();
				if(count($yest_check)==1){
					$yesterday_running=(float)$yest_check[0]['running_min2']*60;
				}else{
					$yestqueryConsu="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."' and StationId='".$station_id."' and TxnDate='".$yesterDay."' and MeterSerial='0061' ";
					$yesterdaydatacons = $this->db->query($yestqueryConsu)->result_array();
					$yesterday_running=(float)$yesterdaydatacons[0]['cons'];
				}

				$weekly_runn=0;
                    for ($k=0; $k < count($datesarray_week); $k++)
							{ 
								$week_check=$this->chech_hydro_running($list['UtilityName'],$datesarray_week[$k],'0061');
								if(count($week_check)==1){
									$weekly_runn+=(float)$week_check[0]['running_min2']*60;
								}else{
									$runn_week="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and MeterSerial='0061'  and StationId='".$station_id."' and TxnDate = '".$datesarray_week[$k]."'  ";
									//echo $pressure;die();
									 $datarun_week = $this->db->query($runn_week)->result_array();
									 $weekly_runn+=(float)$datarun_week[0]['run'];
								}
								
							}
							//echo $weekly_runn;die();
							$monthly_runn=0;
							for ($k=0; $k < count($datesarray_month); $k++)
									{ 
										$month_check=$this->chech_hydro_running($list['UtilityName'],$datesarray_month[$k],'0061');
										if(count($month_check)==1){
											$monthly_runn+=(float)$month_check[0]['running_min2']*60;
										}else{
											$runn_month="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$runconnect."'  and MeterSerial='0061' and StationId='".$station_id."' and TxnDate = '".$datesarray_month[$k]."'  ";
											//echo $pressure;die();
											 $data_runn_month = $this->db->query($runn_month)->result_array();
											 $monthly_runn+=(float)$data_runn_month[0]['run'];
										}
										
									}
                 
				  				 $monthly_runn_with_today=$monthly_runn+$today_runn;

								//    echo $monthly_runn_with_today;die();
				$todayquery="SELECT Consumption FROM $table_name where LineConnected='".$runconnect."'  and StationId='".$station_id."' and TxnDate='".$todayDate."' and MeterSerial='0061'  ORDER BY TxnTime desc limit 1";
				$todaydata = $this->db->query($todayquery)->result_array();
				

				if(is_null($todaydata[0]['Consumption'])){
					$resultArray['run_data'][$i]['datar']="OFFLINE";
				}else{
					$resultArray['run_data'][$i]['datar']="ONLINE";
					if($todaydata[0]['Consumption']>0){
						$resultArray['run_data'][$i]['running_status']=true;
					}else{
						$resultArray['run_data'][$i]['running_status']=false;
					}
				}
				
			//echo $today_runn*60;die();
				$resultArray['run_data'][$i]['today_running_hours']=$this->secondsToTime(round($today_runn*60));
				$resultArray['run_data'][$i]['yesterday_running_hours']=$this->secondsToTime(round($yesterday_running*60));
				$resultArray['run_data'][$i]['lastweek_running_hours']=$this->secondsToTime_month(round($weekly_runn*60));
				$resultArray['run_data'][$i]['monthly_running_hours']=$this->secondsToTime_month(round($monthly_runn_with_today*60));
				$i++;
   
		   }
		   $pressure="SELECT round(CurReading*Multiplier/1.5,2) as pressure,TxnTime FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime asc ";
		//  echo  $pressure;die(); 
		   $pressuredata = $this->db->query($pressure)->result_array();		  
		   $resultArray['pressure_data']=$pressuredata;
		   return $resultArray;

		}else{
			for ($k=0; $k < count($data); $k++) { 
				$resultArray['run_data'][$i]['running_status']=false;
				$resultArray['run_data'][$k]['today_running_hours']="NA";
				$resultArray['run_data'][$k]['yesterday_running_hours']="NA";
				$resultArray['run_data'][$k]['lastweek_running_hours']="NA";
				$resultArray['run_data'][$k]['monthly_running_hours']="NA";
			}
			$resultArray['pressure_data']=array();
			return $resultArray;

		}
		
		
		
		


	}
	
	function get_hardwares_device_data_power_factor_report($fromdate,$todate){
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$station_id='2021000067';
		$table_name=$this->get_table_name($station_id);
		$meter_list=$this->get_energymeter_list($table_name);
		$i=0;
		foreach($meter_list as $meters){
			$powerfactor_data=[];
			
		
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
			
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_pf_data('PF',$meters['LocationName'],$datesarray[$t]);
				if(count($check)==1){
				
					$powerfactor_data=array_merge($powerfactor_data,unserialize($check[0]['pf_data']));
				}else{
					if($datesarray[$t]>=date('Y-m-d')){
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						
					}else{
						$querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='PF' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$pf = $this->db->query($querypowerfactor)->result();						
						$powerfactor_data=array_merge($powerfactor_data,$pf);
						$pf_array=array(
							'location_name'=>$meters['LocationName'],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'pf_data'=>serialize($pf),
							'meter_name'=>$resdata['PF'][$i]['meter']              
						);
						 //echo json_encode($pf_array);die();
						$this->db->insert('pf_report_tbl', $pf_array);
					}
				}
			}
			$resdata['PF'][$i]['pf_data']=$powerfactor_data;

			
			 $i++;
		}
		// $querypowerfactor="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `LineConnected`='PF'  ORDER BY TxnDate ASC,TxnTime ASC";
		
		// //echo $querywaterlevel;
		// $pf = $this->db->query($querypowerfactor)->result();
		// //$waterlevel=$datawaterlevel[0]->CurReading;

		// $resdata['meter']="Power Factor";
		// $resdata['pf_data']=$pf;
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
							$check=$this->chech_dg_running($hardware_name,$datesarray[$k],$station_id);
						if(count($check)==1){
							$resdata['consolidate'][$k]['status']=$check[0]['dg_name'];
							$resdata['consolidate'][$k]['dgname']=$check[0]['dg_name'];
							$resdata['consolidate'][$k]['run']=$check[0]['running_min1'];
							$resdata['consolidate'][$k]['run1']=(float)$check[0]['running_min2'];
							$resdata['consolidate'][$k]['date']=$check[0]['report_date'];
							$resdata['consolidate'][$k]['fadd']=$check[0]['fuel_add'];
							$resdata['consolidate'][$k]['fremove']=$check[0]['fuel_remove'];
							$resdata['consolidate'][$k]['fconsume1']=$check[0]['fuel_consume'];
							$resdata['consolidate'][$k]['fconsume']=$check[0]['fuel_consume'];
							$resdata['consolidate'][$k]['economy']=$check[0]['economy'];
							$resdata['consolidate'][$k]['availableFuel']=$check[0]['available_fuel'];
							$resdata['consolidate'][$k]['filled_percent']=$check[0]['filled_percent'];
							$resdata['consolidate'][$k]['voltage']=$check[0]['voltage'];
							
						}else{
							$startEndFuelQuery="SELECT 
							(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
							(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
							$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
							
							if($datesarray[$k]>=date('Y-m-d')){
								$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'";
								$dataRunn = $this->db->query($queryRunn)->result();
								$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
								$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
								$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;
								
								$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Filled'";
								
								$dataAdd = $this->db->query($queryFadd)->result();
								$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;
			
			
								$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level'";
								//echo $queryRuntimes;die();
								$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
			
								$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
								
			
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
			
								$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
								//echo $queryRuntimes;die();
								$dataVoltage = $this->db->query($queryVoltage)->result();
			
								$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;
			
								$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND  UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
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
							}else{
								$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'";
								$dataRunn = $this->db->query($queryRunn)->result();
								$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
								$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
								$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;
								
								$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Filled'";
								
								$dataAdd = $this->db->query($queryFadd)->result();
								$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;
			
			
								$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level'";
								//echo $queryRuntimes;die();
								$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
			
								$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time' AND `StationId`='".$station_id."'  AND Consumption>0";
								
			
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
			
								$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
								//echo $queryRuntimes;die();
								$dataVoltage = $this->db->query($queryVoltage)->result();
			
								$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;
			
								$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
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

								  $dg_runn_query=array(
									'meter_serial'=>'',
									'running_min1'=>$resdata['consolidate'][$k]['run'],
									'running_min2'=>$resdata['consolidate'][$k]['run1'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'fuel_add'=>$resdata['consolidate'][$k]['fadd'],
									'fuel_remove'=>$resdata['consolidate'][$k]['fremove'],
									'fuel_consume'=> $resdata['consolidate'][$k]['fconsume'],
									'economy'=>$resdata['consolidate'][$k]['economy'] ,
									'available_fuel'=>$resdata['consolidate'][$k]['availableFuel'],
									'filled_percent'=>'',
									'station_id'=>$station_id,
									'dg_name'=>$resdata['consolidate'][$k]['dgname'],
									'voltage'=>$resdata['consolidate'][$k]['voltage']
									             
								);
								$this->db->insert('dg_running_report_tbl', $dg_runn_query);
							}

						}
						//echo json_encode($dataStartEndFuel[0]->start);die();
					
					
					

					}
			}else if($fromtime!='Select FromTime'){
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						
						$startEndFuelQuery="SELECT 
					(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' AND `StationId`='".$station_id."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime LIMIT 1) as 'start',
					(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
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
							$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
							$dataRunn = $this->db->query($queryRunn)->result();
							$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
							$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
							$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;

							$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Filled' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";

							$dataAdd = $this->db->query($queryFadd)->result();
							$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;


							$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND `StationId`='".$station_id."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
							//echo $queryRuntimes;die();
							$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

							$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'  AND Consumption>0";


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

							$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime DESC LIMIT 1";
							//echo $queryRuntimes;die();
							$dataVoltage = $this->db->query($queryVoltage)->result();

							$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;

							$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' ORDER BY TxnTime DESC LIMIT 1";
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
			
			$totaldays=count($datesarray);
			for($t=0;$t<$totaldays;$t++){
				$dgdat[$t]=$this->getDgHardwareData($table_name,$datesarray[$t],$hardware_name,$station_id);	
				
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
			// echo json_encode($hldata1);die();
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
        
					$resdata['fuel_level']['dg_fuel_level']=$this->getDGFuelLevel($table_name,$fromdate,$todate,$station_id,$hardware_name,$datesarray);
		return $resdata;
		
	}
	function get_hardwares_device_data_dg_report_rsbro($data,$fromdate,$todate,$from,$type){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dg_name'];
		// $todayDate=date("Y-m-d");
		//$resdata['location']=$data['location'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		if($from=='wis'){
			$table_name="hardware_station_consumption_data_rsbrothers";
			$table_name_live="hardware_station_consumption_data_rsbrothers_live";
			}
		  
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
           
		
			
				for ($k=0; $k < count($datesarray); $k++)
					{ 
						 
							$check=$this->chech_dg_running_rs($dashboardName,$datesarray[$k],$station_id);
							if(count($check)>0){
								$resdata['consolidate'][$k]['status']=$check[0]['dg_name'];
								$resdata['consolidate'][$k]['dgname']=$check[0]['dg_name'];
								$resdata['consolidate'][$k]['run']=$check[0]['running_min1'];
								$resdata['consolidate'][$k]['run1']=(float)$check[0]['running_min2'];
								$resdata['consolidate'][$k]['date']=$check[0]['report_date'];
								$resdata['consolidate'][$k]['fadd']=$check[0]['fuel_add'];
								$resdata['consolidate'][$k]['fremove']=$check[0]['fuel_remove'];
								$resdata['consolidate'][$k]['fconsume1']=$check[0]['fuel_consume'];
								$resdata['consolidate'][$k]['fconsume']=$check[0]['fuel_consume'];
								$resdata['consolidate'][$k]['economy']=$check[0]['economy'];
								$resdata['consolidate'][$k]['availableFuel']=$check[0]['available_fuel'];
								$resdata['consolidate'][$k]['filled_percent']=$check[0]['filled_percent'];
								$resdata['consolidate'][$k]['voltage']=$check[0]['voltage'];
								$resdata['consolidate'][$k]['location']=$data['location'];
								
							}else{
								
								
								if($datesarray[$k]>=date('Y-m-d')){
									$startEndFuelQuery="SELECT 
								(SELECT Consumption as CurReading FROM $table_name_live WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
								(SELECT Consumption as CurReading FROM $table_name_live WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
								$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
									$queryRunn="SELECT SUM(Consumption) as run FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'";
									$dataRunn = $this->db->query($queryRunn)->result();
									$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
									$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
									$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;
									
									$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Filled'";
									
									$dataAdd = $this->db->query($queryFadd)->result();
									$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;
				
				
									$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level'";
									//echo $queryRuntimes;die();
									$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
				
									$queryRuntimes="SELECT TxnTime FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
									
				
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
				
									$queryVoltage="SELECT Consumption FROM $table_name_live WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
									//echo $queryRuntimes;die();
									$dataVoltage = $this->db->query($queryVoltage)->result();
				
									$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;
				
									$queryStatus="SELECT Consumption FROM $table_name_live WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND  UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
									//echo $queryRuntimes;die();
									$dataStatus = $this->db->query($queryStatus)->result();
									if($dataStatus[0]->Consumption==1){
										$status="ON";
									}else{
										$status="OFF";
									}
									$resdata['consolidate'][$k]['status']=$status;
									$resdata['consolidate'][$k]['dgname']=$dashboardName;
									$resdata['consolidate'][$k]['location']=$data['location'];
									$resdata['consolidate'][$k]['date']=$datesarray[$k];
								}else{
									$startEndFuelQuery="SELECT 
								(SELECT Consumption as CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
								(SELECT Consumption as CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
								$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
									$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'";
									$dataRunn = $this->db->query($queryRunn)->result();
									$resdata['consolidate'][$k]['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
									$resdata['consolidate'][$k]['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
									$resdata['consolidate'][$k]['run1']=(int)$dataRunn[0]->run;
									
									$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Filled'";
									
									$dataAdd = $this->db->query($queryFadd)->result();
									$resdata['consolidate'][$k]['fadd']=(float)$dataAdd[0]->fadd;
				
				
									$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level'";
									// echo $queryNonRuntimes;die();
									$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
				//echo $queryRuntimes;die();
									$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time' AND `StationId`='".$station_id."'  AND Consumption>0";
									
									
									//die();
									// $dataRunTimes = $this->db->query($queryRuntimes)->result();
									// $runarray=array();
									// for ($i=0; $i < count($dataRunTimes) ; $i++) { 
									// 	array_push($runarray,$dataRunTimes[$i]->TxnTime);
									// }
									$fremove=0;
									if($station_id==2023000054){

									}else{
										for ($nr=0; $nr < count($dataNonRunTimes)-1; $nr++) {
											//echo $dataNonRunTimes[$nr]->CurReading-$dataNonRunTimes[$nr+1]->PrvReading."<br>"; 
											$fm1=$dataNonRunTimes[$nr]->CurReading-$dataNonRunTimes[$nr+1]->PrvReading;
											if($fm1>15){
												$fremove+=$fm1;	
											}
											//echo $fm1."<br>";
										}
									}
				
									
				// die();
									// foreach ($dataNonRunTimes as $item)
									// { 
										
										
									// 		if (!in_array($item->TxnTime, $runarray))
									// 		{
									// 			//echo $item->PrvReading."----".$item->CurReading."<br>"; 
									// 			$fm= $item->PrvReading-$item->CurReading;
									// 			if($fm>3){
									// 				$fremove+=$fm;
									// 			}
												
									// 		}
									// }
				
									$resdata['consolidate'][$k]['fremove']=abs($fremove);
									$resdata['consolidate'][$k]['fconsume1']=abs(round($dataStartEndFuel[0]->start+$resdata['consolidate'][$k]['fadd']-$dataStartEndFuel[0]->end-$resdata['consolidate'][$k]['fremove'],2));
									// echo $resdata['consolidate'][$k]['fconsume1'];die();
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
				
									$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
									//echo $queryRuntimes;die();
									$dataVoltage = $this->db->query($queryVoltage)->result();
				
									$resdata['consolidate'][$k]['voltage']=$dataVoltage[0]->Consumption;
				
									$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
									//echo $queryRuntimes;die();
									$dataStatus = $this->db->query($queryStatus)->result();
									if($dataStatus[0]->Consumption==1){
										$status="ON";
									}else{
										$status="OFF";
									}
									$resdata['consolidate'][$k]['status']=$status;
									$resdata['consolidate'][$k]['dgname']=$dashboardName;
									
									$resdata['consolidate'][$k]['date']=$datesarray[$k];
									$resdata['consolidate'][$k]['location']=$data['location'];
									  $dg_runn_query=array(
										'meter_serial'=>'',
										'running_min1'=>$resdata['consolidate'][$k]['run'],
										'running_min2'=>$resdata['consolidate'][$k]['run1'],
										'report_date'=>$datesarray[$k],
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'fuel_add'=>$resdata['consolidate'][$k]['fadd'],
										'fuel_remove'=>$resdata['consolidate'][$k]['fremove'],
										'fuel_consume'=> $resdata['consolidate'][$k]['fconsume'],
										'economy'=>$resdata['consolidate'][$k]['economy'] ,
										'available_fuel'=>$resdata['consolidate'][$k]['availableFuel'],
										'filled_percent'=>'',
										'station_id'=>$station_id,
										'dg_name'=>$resdata['consolidate'][$k]['dgname'],
										'voltage'=>$resdata['consolidate'][$k]['voltage'],
										'location'=>$data['location']
													 
									);
									$this->db->insert('dg_running_report_tbl_rs', $dg_runn_query);
								}
	
							}
							if($type==1){
								$resdata['fuel_level']['dg_fuel_level']=$this->getDGFuelLevelRS($table_name,$table_name_live,$fromdate,$todate,$station_id,$hardware_name,$datesarray,$from,$dashboardName);
							}
							
						
						
					
					
					

					}
		return $resdata;
		
	}
	function get_hardwares_device_data_dg_report_rsbro_mail($data,$yesterday,$from){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dg_name'];
		
		if($from=='wis'){
			// $table_name="hardware_station_consumption_data_rsbrothers";
			$table_name_live="hardware_station_consumption_data_rsbrothers";
			}

						 if($from=='wis'){
							$check=$this->chech_dg_running_rs($dashboardName,$yesterday,$station_id);
							if(count($check)>0){
								$resdata['status']=$check[0]['dg_name'];
								$resdata['dgname']=$check[0]['dg_name'];
								$resdata['run']=$check[0]['running_min1'];
								$resdata['run1']=(float)$check[0]['running_min2'];
								$resdata['date']=$check[0]['report_date'];
								$resdata['fadd']=$check[0]['fuel_add'];
								$resdata['fremove']=$check[0]['fuel_remove'];
								$resdata['fconsume1']=$check[0]['fuel_consume'];
								$resdata['fconsume']=$check[0]['fuel_consume'];
								$resdata['economy']=$check[0]['economy'];
								$resdata['availableFuel']=$check[0]['available_fuel'];
								$resdata['filled_percent']=$check[0]['filled_percent'];
								$resdata['voltage']=$check[0]['voltage'];
								$resdata['location']=$data['location'];
								$resdata['from']="wis";
								
							}else{
								$startEndFuelQuery="SELECT 
								(SELECT Consumption as CurReading FROM $table_name_live WHERE TxnDate='".$yesterday."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
								(SELECT Consumption as CurReading FROM $table_name_live WHERE TxnDate='".$yesterday."' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
								// echo $startEndFuelQuery;die();
								$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
								// print_r($dataStartEndFuel);die();
									$queryRunn="SELECT SUM(Consumption) as run FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterday."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'";
									$dataRunn = $this->db->query($queryRunn)->result();
									$resdata['run_c']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
									$resdata['run']=floor($dataRunn[0]->run / 60).' Hours '.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60)." Min";
									$resdata['run1']=(int)$dataRunn[0]->run;
									
									$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterday."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Filled'";
									
									$dataAdd = $this->db->query($queryFadd)->result();
									$resdata['fadd']=(float)$dataAdd[0]->fadd;
				
				
									$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterday."' AND `StationId`='".$station_id."' AND LineConnected='Fuel Level'";
									//echo $queryRuntimes;die();
									$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
				
									$queryRuntimes="SELECT TxnTime FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$yesterday."' AND `StationId`='".$station_id."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
									
				
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
									$resdata['fconsume1']=abs(round($dataStartEndFuel[0]->start+$resdata['fadd']-$dataStartEndFuel[0]->end-$resdata['fremove'],2));
									// echo $resdata['fconsume1'];die();
									//$resdata['krish']=$dataRunn[0]->run;
									if($resdata['fconsume1'] <= 0 || $dataRunn[0]->run==0){
										$finaleco =0;
										$resdata['fconsume']=0;
										//return 0;
									}
									else{
										$resdata['fconsume']=$resdata['fconsume1'];
										$rs = explode(":", $resdata['run_c']);
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
				
									$queryVoltage="SELECT Consumption FROM $table_name_live WHERE TxnDate='".$yesterday."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
									//echo $queryRuntimes;die();
									$dataVoltage = $this->db->query($queryVoltage)->result();
				
									$resdata['voltage']=$dataVoltage[0]->Consumption;
				
									$queryStatus="SELECT Consumption FROM $table_name_live WHERE TxnDate='".$yesterday."' AND LineConnected='Battery' AND `StationId`='".$station_id."' AND  UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
									//echo $queryRuntimes;die();
									$dataStatus = $this->db->query($queryStatus)->result();
									if($dataStatus[0]->Consumption==1){
										$status="ON";
									}else{
										$status="OFF";
									}
									$resdata['status']=$status;
									$resdata['dgname']=$dashboardName;
									
									$resdata['date']=$yesterday;
									$resdata['location']=$data['location'];
									$resdata['from']="wis";

									$dg_runn_query=array(
										'meter_serial'=>'',
										'running_min1'=>$resdata['run'],
										'running_min2'=>$resdata['run'],
										'report_date'=>$yesterday,
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'fuel_add'=>$resdata['fadd'],
										'fuel_remove'=>$resdata['fremove'],
										'fuel_consume'=> $resdata['fconsume'],
										'economy'=>$resdata['economy'] ,
										'available_fuel'=>$resdata['availableFuel'],
										'filled_percent'=>'0',
										'station_id'=>$station_id,
										'location'=>$data['location'],
										'dg_name'=>$dashboardName,
										'voltage'=>$resdata['voltage']
													 
									);
									$this->db->insert('dg_running_report_tbl_rs', $dg_runn_query);
							}
							
									
	
							
							
						 }
							
						//echo json_encode($dataStartEndFuel[0]->start);die();
					
					
					

					
					
			//$resdata['fuel_level']['dg_fuel_level']=$this->getDGFuelLevel_rsbro($table_name,$table_name_live,$dashboardName,$todate,$station_id,$hardware_name,$datesarray);
		return $resdata;
		
	}
	function getDgHardwareData($table_name,$date,$hardware_name,$station_id){

		             $check=$this->chech_dg_running($hardware_name,$date,$station_id);
						if(count($check)==1){
							//$resdata['consolidate'][$k]['status']=$check[0]['dg_name'];
							$resdata['dgname']=$check[0]['dg_name'];
							$resdata['run']=$check[0]['running_min2'];
							$resdata['run1']=$check[0]['running_min2'];
							$resdata['date']=$check[0]['report_date'];
							$resdata['fadd']=$check[0]['fuel_add'];
							$resdata['fremove']=$check[0]['fuel_remove'];
							$resdata['fconsume']=$check[0]['fuel_consume'];
							$resdata['fconsume1']=$check[0]['fuel_consume'];
							$resdata['economy']=$check[0]['economy'];
							$resdata['availableFuel']=$check[0]['available_fuel'];
							$resdata['filled_percent']=$check[0]['filled_percent'];
							$resdata['voltage']=$check[0]['voltage'];
							
						}else{
							if($date>=date('Y-m-d')){
								$startEndFuelQuery="SELECT 
								(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."'  ORDER BY TxnTime LIMIT 1) as 'start',
								(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level'  ORDER BY TxnTime DESC LIMIT 1) as 'end'";
								//echo $startEndFuelQuery;die();
							
									$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result_array();
								
									
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
							}else{
								
								$startEndFuelQuery="SELECT 
								(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."'  ORDER BY TxnTime LIMIT 1) as 'start',
								(SELECT CurReading FROM $table_name WHERE TxnDate='".$date."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level'  ORDER BY TxnTime DESC LIMIT 1) as 'end'";
								//echo $startEndFuelQuery;die();
							
									$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result_array();
								
									
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

									$dg_runn_query=array(
										'meter_serial'=>'',
										'running_min1'=>$resdata['run'],
										'running_min2'=>$resdata['run'],
										'report_date'=>$date,
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'fuel_add'=>$resdata['fadd'],
										'fuel_remove'=>$resdata['fremove'],
										'fuel_consume'=> $resdata['fconsume'],
										'economy'=>$resdata['economy'] ,
										'available_fuel'=>$resdata['availableFuel'],
										'filled_percent'=>'',
										'station_id'=>$station_id,
										'dg_name'=>$hardware_name,
										'voltage'=>''
													 
									);
									$this->db->insert('dg_running_report_tbl', $dg_runn_query);


							}
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
						if($datesarray[$k]>=date('Y-m-d')){
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
						if($LocationName=='Tpi' || $LocationName=='A4 Building'){
							$resdata['consolidate'][$k]['consumption']=(float)$check[0]['consumption']*10;	
							$resdata['consolidate'][$k]['date']=$check[0]['report_date'];	
							$resdata['consolidate'][$k]['sno']=$k+1;
						}else{
							$resdata['consolidate'][$k]['consumption']=(float)$check[0]['consumption'];	
							$resdata['consolidate'][$k]['date']=$check[0]['report_date'];	
							$resdata['consolidate'][$k]['sno']=$k+1;
						}
						
					}else{
						if($datesarray[$k]>=date('Y-m-d')){
							if($LocationName=='Tpi' || $LocationName=='A4 Building'){
								$queryconsutoday="SELECT round(SUM(Consumption)/1000,2)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							}else{
								$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							}
							
							$datacontoday = $this->db->query($queryconsutoday)->result_array();
							$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons'];	
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
							$resdata['consolidate'][$k]['sno']=$k+1;
						}else{
							$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
							$datacontoday = $this->db->query($queryconsutoday)->result_array();
							if($LocationName=='Tpi' || $LocationName=='A4 Building'){
								$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons']*10;
							}else{
								$resdata['consolidate'][$k]['consumption']=(float)$datacontoday[0]['cons'];
							}
								
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
							if($LocationName=='Tpi' || $LocationName=='A4 Building'){
								$tcons+=$check[0]['consumption'];
								$hldata[$t]['con']=$check[0]['consumption']*10;
								$hldata[$t]['date']=$check[0]['report_date'];
							}else{
								$tcons+=$check[0]['consumption'];
								$hldata[$t]['con']=$check[0]['consumption'];
								$hldata[$t]['date']=$check[0]['report_date'];
							}
							
						}else{

							if($datesarray[$t]>=date('Y-m-d')){
								if($LocationName=='Tpi' || $LocationName=='A4 Building'){
									$queryconsucum="SELECT round(SUM(Consumption)/1000,2)*10 as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate = '".$datesarray[$t]."'  AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
								}else{
									$queryconsucum="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate = '".$datesarray[$t]."'  AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
								}
								
								$dataconcum = $this->db->query($queryconsucum)->result_array();	
								$tcons+=$dataconcum[0]['cons'];
								$hldata[$t]['con']=$dataconcum[0]['cons'];
								$hldata[$t]['date']=$datesarray[$t];
							}else{
								$queryconsucum="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate = '".$datesarray[$t]."'  AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
								$dataconcum = $this->db->query($queryconsucum)->result_array();	
								if($LocationName=='Tpi' || $LocationName=='A4 Building'){
									$tcons+=$dataconcum[0]['cons']*10;
									$hldata[$t]['con']=$dataconcum[0]['cons']*10;
									$hldata[$t]['date']=$datesarray[$t];
								}else{
									$tcons+=$dataconcum[0]['cons'];
									$hldata[$t]['con']=$dataconcum[0]['cons'];
									$hldata[$t]['date']=$datesarray[$t];
								}
								

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
	function chech_energy_consumotion_undp($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_undp');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();  
		 //$where = '(report_date between "'.$date.'" and "'.$date.'")';
     
        return $res;
	}
	function chech_energy_consumotion_month_undp($location_name,$from,$to){
		$this->db->select('sum(consumption) as cons');
        $this->db->from('energy_consumption_report_tbl_undp');   
		$where = '(report_date between "'.$from.'" and "'.$to.'")';     
		$this->db->where('location_name',$location_name);
		$this->db->where($where);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();  (float)$month_check[0]['consumption']
		 //$where = '(report_date between "'.$date.'" and "'.$date.'")';
     
        return (float)$res[0]['cons'];
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
	function chech_energy_consumotion_chennai_hourly($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_chennai_hourly');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
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
	function check_water_level_data_mum($utilityName,$location_name,$date){
		$this->db->select('*');
        $this->db->from('water_level_report_tbl_mumbai');        
		$this->db->where('location_name',$location_name);
		$this->db->where('utility_name',$utilityName);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function get_hardwares_device_data_borewell_report($data,$fromdate,$todate,$fromtime,$totime){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		// $lineconnected=$data['LineConnected'];
		$lineconnected="Borewell";
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
				$check=$this->chech_borewell_running($lineconnected,$utilityName,$datesarray[$k],$LocationName);
				if(count($check)==1){
					$resdata['consolidate'][$k]['meter']=$dashboardName;
					$resdata['consolidate'][$k]['running']=$check[0]['running_min1'];
					$resdata['consolidate'][$k]['running1']=(int)$check[0]['running_min2'];
					$resdata['consolidate'][$k]['date']=$check[0]['report_date'];
				}else{
					if($datesarray[$k]>=date('Y-m-d')){
						$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
						// echo json_encode($queryconsutoday);die();
						$dataruntoday = $this->db->query($queryconsutoday)->result_array();
							$today_percent15=$dataruntoday[0]['secs']*0.15;
			
							$resdata['consolidate'][$k]['meter']=$dashboardName;
							$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15));
							$resdata['consolidate'][$k]['running1']=round(($dataruntoday[0]['secs']-$today_percent15)/60);
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
					}else{
						$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
						// echo json_encode($queryconsutoday);die();
						$dataruntoday = $this->db->query($queryconsutoday)->result_array();
						
							$today_percent15=$dataruntoday[0]['secs']*0.15;
			
							$resdata['consolidate'][$k]['meter']=$dashboardName;
							$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15));
							$resdata['consolidate'][$k]['running1']=round(($dataruntoday[0]['secs']-$today_percent15)/60);
							$resdata['consolidate'][$k]['date']=$datesarray[$k];

							$borewell_runn_query=array(
								'utility_name'=>$utilityName,
								'line_connected'=>$lineconnected,
								'location_name'=>$LocationName,
								'report_date'=>$datesarray[$k],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'running_min1'=>$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15)),
								'running_min2'=>round(($dataruntoday[0]['secs']-$today_percent15)/60)              
							);
							$this->db->insert('borewell_running_report_tbl', $borewell_runn_query);
					}
					
				}
			
				
			
			}
		}else{
			if( $fromtime=='Select FromTime'){
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					$check=$this->chech_borewell_running($lineconnected,$utilityName,$datesarray[$k],$LocationName);
					if(count($check)==1){
						$resdata['consolidate'][$k]['meter']=$dashboardName;
						$resdata['consolidate'][$k]['running']=$check[0]['running_min1'];
						$resdata['consolidate'][$k]['running1']=(int)$check[0]['running_min2'];
						$resdata['consolidate'][$k]['date']=$check[0]['report_date'];
					}else{
					if($datesarray[$k]>=date('Y-m-d')){
						$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
						// echo json_encode($queryconsutoday);die();
						$dataruntoday = $this->db->query($queryconsutoday)->result_array();
						
							$today_percent15=$dataruntoday[0]['secs']*0.15;
			
							$resdata['consolidate'][$k]['meter']=$dashboardName;
							$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15));
							$resdata['consolidate'][$k]['running1']=round(($dataruntoday[0]['secs']-$today_percent15)/60);
							$resdata['consolidate'][$k]['date']=$datesarray[$k];
					}else{
						$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
						// echo json_encode($queryconsutoday);die();
						$dataruntoday = $this->db->query($queryconsutoday)->result_array();
						
							$today_percent15=$dataruntoday[0]['secs']*0.15;
			
							$resdata['consolidate'][$k]['meter']=$dashboardName;
							$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15));
							$resdata['consolidate'][$k]['running1']=round(($dataruntoday[0]['secs']-$today_percent15)/60);
							$resdata['consolidate'][$k]['date']=$datesarray[$k];

							$borewell_runn_query=array(
								'utility_name'=>$utilityName,
								'line_connected'=>$lineconnected,
								'location_name'=>$LocationName,
								'report_date'=>$datesarray[$k],
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s'),
								'running_min1'=>$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15)),
								'running_min2'=>round(($dataruntoday[0]['secs']-$today_percent15)/60)              
							);
							$this->db->insert('borewell_running_report_tbl', $borewell_runn_query);
					}
					
				}
				}
			}else{
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					
					$queryconsutoday="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."' and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
			
					$dataruntoday = $this->db->query($queryconsutoday)->result_array();
					
						$today_percent15=$dataruntoday[0]['secs']*0.15;
						$resdata['consolidate'][$k]['meter']=$dashboardName;
						$resdata['consolidate'][$k]['running']=$this->secondsToTime(round($dataruntoday[0]['secs']-$today_percent15));
						$resdata['consolidate'][$k]['running1']=round(($dataruntoday[0]['secs']-$today_percent15)/60);
			
						$resdata['consolidate'][$k]['date']=$datesarray[$k];
				}
			}

		}

		$totaldays=count($datesarray);
		$resdata['summery']['meter']=$dashboardName;
		$tcons=0;
		$hldata1=array();
		
		for($t=0;$t<$totaldays;$t++){
			$check=$this->chech_borewell_running($lineconnected,$utilityName,$datesarray[$t],$LocationName);
			if(count($check)==1){
			$tcons+=$check[0]['running_min2']*60;
			$hldata[$t]['run']=$check[0]['running_min2']*60;
			$hldata[$t]['date']=$check[0]['report_date'];
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$queryruncum="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$t]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
					$dataruncum = $this->db->query($queryruncum)->result_array();
					$today_percent15=$dataruncum[0]['secs']*0.15;
					
					$tcons+=($dataruncum[0]['secs']-$today_percent15);
					$hldata[$t]['run']=$dataruncum[0]['secs']-$today_percent15;
					$hldata[$t]['date']=$datesarray[$t];
				}else{
					$queryruncum="SELECT SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)) AS `secs` FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$t]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."' AND Consumption>0 and (TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))>0";
					$dataruncum = $this->db->query($queryruncum)->result_array();
					$today_percent15=$dataruncum[0]['secs']*0.15;
					
					$tcons+=($dataruncum[0]['secs']-$today_percent15);
					$hldata[$t]['run']=$dataruncum[0]['secs']-$today_percent15;
					$hldata[$t]['date']=$datesarray[$t];

					$borewell_runn_query=array(
						'utility_name'=>$utilityName,
						'line_connected'=>$lineconnected,
						'location_name'=>$LocationName,
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'running_min1'=>$this->secondsToTime(round($dataruncum[0]['secs']-$today_percent15)),
						'running_min2'=>round(($dataruncum[0]['secs']-$today_percent15)/60)              
					);
					$this->db->insert('borewell_running_report_tbl', $borewell_runn_query);
				}
				
			}
			

			array_push($hldata1,$hldata[$t]['run']);
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
	function chech_dg_running($hardware_name,$date,$station_id){
		$this->db->select('*');
        $this->db->from('dg_running_report_tbl');        
        
		$this->db->where('dg_name',$hardware_name);
		$this->db->where('station_id',$station_id);
		
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		// echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_dg_running_rs($hardware_name,$date,$station_id){
		if($station_id==''){
			$this->db->select('*');
			$this->db->from('dg_running_report_tbl_rs');        
			
			$this->db->where('dg_name',$hardware_name);
			//$this->db->where('station_id',$station_id);
			
			$this->db->where('report_date',$date);
		   
			$res = $this->db->get()->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('dg_running_report_tbl_rs');        
			
			$this->db->where('dg_name',$hardware_name);
			$this->db->where('station_id',$station_id);
			
			$this->db->where('report_date',$date);
		   
			$res = $this->db->get()->result_array();
			// echo "ll:".$this->db->last_query()."<br>";
		}
		
		//echo $res[0]['report_date'];die();        
		// echo "ll:".$this->db->last_query();die();       
        return $res;
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
		if($meterserial=='71'){
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
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
					
											$datarun_today = $this->db->query($runn_today)->result_array();
											
											
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}else if($list['fire_pump_name']=='Main Pump'){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
										//echo $pressure;die();
											$datarun_today = $this->db->query($runn_today)->result_array();
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
										
											$datarun_today = $this->db->query($runn_today)->result_array();
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
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
									$check=$this->check_firepump_running('J_Pump Auto RHT','Old Fire Pump',$datesarray[$k],$list['fire_pump_name'],'0071');
									if(count($check)==1){
										$resdata['fire_runn'][$k][$i]['meter']=$check[0]['pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$check[0]['running_min1'];
										$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$check[0]['running_min2'];
						
										$resdata['fire_runn'][$k][$i]['date']=$check[0]['report_date'];
										$resdata['fire_runn'][$k][$i]['data_from']="db";
									}else{
										if($datesarray[$k]>=date('Y-m-d')){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
				
											$datarun_today = $this->db->query($runn_today)->result_array();
											
											
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
				
											$datarun_today = $this->db->query($runn_today)->result_array();
											
											
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];

											$firepump_runn_array=array(
												'utility_name'=>'Old Fire Pump',
												'line_connected'=>'J_Pump Auto RHT',
												'pump_name'=>$list['fire_pump_name'],
												'report_date'=>$datesarray[$k],
												'created_date'=>date('Y-m-d H:i:s'),
												'updated_date'=>date('Y-m-d H:i:s'),
												'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
												'running_min2'=>(int)$datarun_today[0]['run'],
												'meter_serial'=> '0071'              
											);
											$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
										}
										
									}
										
									}else if($list['fire_pump_name']=='Main Pump'){
										$check=$this->check_firepump_running('Main Pump RHT','Old Fire Pump',$datesarray[$k],$list['fire_pump_name'],'0071');
									if(count($check)==1){
										$resdata['fire_runn'][$k][$i]['meter']=$check[0]['pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$check[0]['running_min1'];
										$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$check[0]['running_min2'];
						
										$resdata['fire_runn'][$k][$i]['date']=$check[0]['report_date'];
										$resdata['fire_runn'][$k][$i]['data_from']="db";
									}else{
										if($datesarray[$k]>=date('Y-m-d')){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
											//echo $pressure;die();
												$datarun_today = $this->db->query($runn_today)->result_array();
												$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
												$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
												$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
								
												$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
											//echo $pressure;die();
												$datarun_today = $this->db->query($runn_today)->result_array();
												$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
												$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
												$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
								
												$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
												$firepump_runn_array=array(
													'utility_name'=>'Old Fire Pump',
													'line_connected'=>'Main Pump RHT',
													'pump_name'=>$list['fire_pump_name'],
													'report_date'=>$datesarray[$k],
													'created_date'=>date('Y-m-d H:i:s'),
													'updated_date'=>date('Y-m-d H:i:s'),
													'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
													'running_min2'=>(int)$datarun_today[0]['run'],
													'meter_serial'=> '0071'              
												);
												$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
										}
									}
										
									}else{
										$check=$this->check_firepump_running('DG On RHT','Old Fire Pump',$datesarray[$k],$list['fire_pump_name'],'0071');
									if(count($check)==1){
										$resdata['fire_runn'][$k][$i]['meter']=$check[0]['pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$check[0]['running_min1'];
										$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$check[0]['running_min2'];
						
										$resdata['fire_runn'][$k][$i]['date']=$check[0]['report_date'];
										$resdata['fire_runn'][$k][$i]['data_from']="db";
									}else{
										if($datesarray[$k]>=date('Y-m-d')){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
									
											$datarun_today = $this->db->query($runn_today)->result_array();
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' ";
									
											$datarun_today = $this->db->query($runn_today)->result_array();
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];

											$firepump_runn_array=array(
												'utility_name'=>'Old Fire Pump',
												'line_connected'=>'DG On RHT',
												'pump_name'=>$list['fire_pump_name'],
												'report_date'=>$datesarray[$k],
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
									
									
									
					
								}
								$i++;
							}
							//echo json_encode($resdata);die();
				}else{
					 
							$i=0;
								foreach($firepumpList as $list){
									for ($k=0; $k < count($datesarray); $k++)
									{
										if($list['fire_pump_name']=='Jockey Pump'){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'  AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
											
											$datarun_today = $this->db->query($runn_today)->result_array();
										
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
										}else if($list['fire_pump_name']=='Main Pump'){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
										//echo $pressure;die();
											$datarun_today = $this->db->query($runn_today)->result_array();
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."' AND TxnTime BETWEEN '".$fromtime."' AND '".$totime."'";
										
											$datarun_today = $this->db->query($runn_today)->result_array();
											$resdata['fire_runn'][$k][$i]['meter']=$list['fire_pump_name'];
											$resdata['fire_runn'][$k][$i]['running_hours']=$this->secondsToTime($datarun_today[0]['run']*60);
											$resdata['fire_runn'][$k][$i]['running_hours1']=(int)$datarun_today[0]['run'];
							
											$resdata['fire_runn'][$k][$i]['date']=$datesarray[$k];
										}
									
					
								}
								$i++;
							}
				}
			}
			
			$i=0;
					foreach($firepumpList as $list){
						$totaldays=count($datesarray);					
						$tcons=0;
						$hldata1=array();
						
						if($list['fire_pump_name']=='Jockey Pump'){
							for($t=0;$t<$totaldays;$t++){
								$check=$this->check_firepump_running('J_Pump Auto RHT','Old Fire Pump',$datesarray[$t],$list['fire_pump_name'],'0071');
								if(count($check)==1){
									$tcons+=$check[0]['running_min2'];
									$hldata[$t]['con']=$check[0]['running_min2'];
									$hldata[$t]['date']=$check[0]['report_date'];
									$hldata[$t]['data_from']="db";
								}else{
									if($datesarray[$t]>=date('Y-m-d')){
										$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."' ";
											
										$datarun_today = $this->db->query($runn_today)->result_array();
		
											
										$tcons+=$datarun_today[0]['run'];
										$hldata[$t]['con']=$datarun_today[0]['run'];
										$hldata[$t]['date']=$datesarray[$t];
									}else{
										$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='J_Pump Auto RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."' ";
											
										$datarun_today = $this->db->query($runn_today)->result_array();
		
											
										$tcons+=$datarun_today[0]['run'];
										$hldata[$t]['con']=$datarun_today[0]['run'];
										$hldata[$t]['date']=$datesarray[$t];

										$firepump_runn_array=array(
											'utility_name'=>'Old Fire Pump',
											'line_connected'=>'J_Pump Auto RHT',
											'pump_name'=>$list['fire_pump_name'],
											'report_date'=>$datesarray[$t],
											'created_date'=>date('Y-m-d H:i:s'),
											'updated_date'=>date('Y-m-d H:i:s'),
											'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
											'running_min2'=>(int)$datarun_today[0]['run'],
											'meter_serial'=> '0071'              
										);
										$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
									}
									
								}
								
								array_push($hldata1,(int)$hldata[$t]['con']);
								}
	//  echo json_encode(min($hldata1));
	// echo json_encode($hldata1);die();
								$resdata['summery'][$i]['meter']=$list['fire_pump_name'];
								$resdata['summery'][$i]['totalrun']=$this->secondsToTime(round($tcons)*60);
								$resdata['summery'][$i]['avgperday']=$this->secondsToTime(round(($tcons*60)/$totaldays));
								$resdata['summery'][$i]['totaldays']=$totaldays;
								$resdata['summery'][$i]['min']=$this->secondsToTime(min($hldata1)*60);
								$resdata['summery'][$i]['max']=$this->secondsToTime(max($hldata1)*60);
								foreach($hldata as $row){
									if($row['con']==min($hldata1)){
										$resdata['summery'][$i]['mindate']=$row['date']."/".date('l', strtotime($row['date']));							;
									}else if($row['con']==max($hldata1)){
										$resdata['summery'][$i]['maxdate']=$row['date']."/".date('l', strtotime($row['date'])); 
									}
								}
								$i++;
						}else if($list['fire_pump_name']=='Main Pump'){
							for($t=0;$t<$totaldays;$t++){

								$check=$this->check_firepump_running('Main Pump RHT','Old Fire Pump',$datesarray[$t],$list['fire_pump_name'],'0071');
									if(count($check)==1){
										$tcons+=$check[0]['running_min2'];
										$hldata[$t]['con']=$check[0]['running_min2'];
										$hldata[$t]['date']=$check[0]['report_date'];
										$hldata[$t]['data_from']="db";
									}else{
										if($datesarray[$t]>=date('Y-m-d')){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."'";
											
											$datarun_today = $this->db->query($runn_today)->result_array();
			
												
											$tcons+=$datarun_today[0]['run'];
											$hldata[$t]['con']=$datarun_today[0]['run'];
											$hldata[$t]['date']=$datesarray[$t];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='Main Pump RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."'";
											
											$datarun_today = $this->db->query($runn_today)->result_array();
			
												
											$tcons+=$datarun_today[0]['run'];
											$hldata[$t]['con']=$datarun_today[0]['run'];
											$hldata[$t]['date']=$datesarray[$t];

											$firepump_runn_array=array(
												'utility_name'=>'Old Fire Pump',
												'line_connected'=>'Main Pump RHT',
												'pump_name'=>$list['fire_pump_name'],
												'report_date'=>$datesarray[$t],
												'created_date'=>date('Y-m-d H:i:s'),
												'updated_date'=>date('Y-m-d H:i:s'),
												'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
												'running_min2'=>(int)$datarun_today[0]['run'],
												'meter_serial'=> '0071'              
											);
											$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
										}
									}
								
								array_push($hldata1,(int)$hldata[$t]['con']);
								}
	
								$resdata['summery'][$i]['meter']=$list['fire_pump_name'];
								$resdata['summery'][$i]['totalrun']=$this->secondsToTime(round($tcons)*60);
								$resdata['summery'][$i]['avgperday']=$this->secondsToTime(round(($tcons*60)/$totaldays));
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
						}else{
							for($t=0;$t<$totaldays;$t++){
								$check=$this->check_firepump_running('DG On RHT','Old Fire Pump',$datesarray[$t],$list['fire_pump_name'],'0071');
									if(count($check)==1){
										$tcons+=$check[0]['running_min2'];
										$hldata[$t]['con']=$check[0]['running_min2'];
										$hldata[$t]['date']=$check[0]['report_date'];
									}else{
										if($datesarray[$t]>=date('Y-m-d')){
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."'";
											
											$datarun_today = $this->db->query($runn_today)->result_array();
			
												
											$tcons+=$datarun_today[0]['run'];
											$hldata[$t]['con']=$datarun_today[0]['run'];
											$hldata[$t]['date']=$datesarray[$t];
										}else{
											$runn_today="SELECT SUM(Consumption) as run FROM $table_name where UtilityName='Old Fire Pump' and LineConnected='DG On RHT' and MeterSerial='0071'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."'";
											
											$datarun_today = $this->db->query($runn_today)->result_array();
			
												
											$tcons+=$datarun_today[0]['run'];
											$hldata[$t]['con']=$datarun_today[0]['run'];
											$hldata[$t]['date']=$datesarray[$t];
											$firepump_runn_array=array(
												'utility_name'=>'Old Fire Pump',
												'line_connected'=>'DG On RHT',
												'pump_name'=>$list['fire_pump_name'],
												'report_date'=>$datesarray[$t],
												'created_date'=>date('Y-m-d H:i:s'),
												'updated_date'=>date('Y-m-d H:i:s'),
												'running_min1'=>$this->secondsToTime($datarun_today[0]['run']*60),
												'running_min2'=>(int)$datarun_today[0]['run'],
												'meter_serial'=> '0071'              
											);
											$this->db->insert('firepump_running_report_tbl', $firepump_runn_array);
										}
									}
								
								array_push($hldata1,(int)$hldata[$t]['con']);
								}
	
								$resdata['summery'][$i]['meter']=$list['fire_pump_name'];
								$resdata['summery'][$i]['totalrun']=$this->secondsToTime(round($tcons)*60);
								$resdata['summery'][$i]['avgperday']=$this->secondsToTime(round(($tcons*60)/$totaldays));
								$resdata['summery'][$i]['totaldays']=$totaldays;
								$resdata['summery'][$i]['min']=$this->secondsToTime(min($hldata1)*60);
								$resdata['summery'][$i]['max']=$this->secondsToTime(max($hldata1)*60);
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
					$resdata['fire_pressure']=$this->getfirePressureData1($table_name,$fromdate,$todate,$station_id,$datesarray);
					$resdata['fire_fuel_level']=$this->getfireFuelLevel_1($table_name,$fromdate,$todate,$station_id,$datesarray);
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
					$resdata['fire_pressure']=$this->getfirePressureData($table_name,$fromdate,$todate,$station_id,$datesarray);
					$resdata['fire_fuel_level']=$this->getfireFuelLevel_2($table_name,$fromdate,$todate,$station_id,$datesarray);
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
		
    //   echo json_encode($resdata);die();
		return $resdata;
	}
	
	function getfirePressureData1($table_name,$fromdate,$todate,$station_id,$datesarray){

		// $pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate between '".$fromdate."' AND '".$todate."'  ORDER BY TxnDate ASC,TxnTime ASC ";
		// $pressuredata = $this->db->query($pressure)->result();
		// echo json_encode($pressuredata);die();
		// return $pressuredata;

		
		$pressuredata2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->chech_firepump_pressure('Pressure','Old Fire Pump',$datesarray[$t],'Fire Pump House','0068');
			if(count($check)==1){
				
				$pressuredata2=array_merge($pressuredata2,unserialize($check[0]['pressure_data']));
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$pressure="SELECT round(CurReading*Multiplier/1.5,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					$pressuredata2=array_merge($pressuredata2,$pressuredata);
				}else{
					$pressure="SELECT round(CurReading*Multiplier/1.5,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					$pressuredata2=array_merge($pressuredata2,$pressuredata);
					$pressure_array=array(
						'utility_name'=>'Old Fire Pump',
						'line_connected'=>'Pressure',
						'location_name'=>'Fire Pump House',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'pressure_data'=>serialize($pressuredata),
						'meter_serial'=>'0068'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_pressure_report_tbl', $pressure_array);
				}
				
			}
			
		}
	
		return $pressuredata2;
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
	function check_current_data_vegas($type,$location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('current_report_tbl_vegas');
		// $this->db->where('type',$type);  
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
		      
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
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
	function chech_dg_fuel_level_rs($utilityName,$date,$station_id){
		$this->db->select('*');
        $this->db->from('dg_fuel_level_report_tbl_rs');
		$this->db->where('utility_name',$utilityName);  
		$this->db->where('station_id',$station_id);
		$this->db->where('report_date',$date);    
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
	function chech_dg_fuel_level_rs_chk($date,$utilityName){
		$this->db->select('*');
        $this->db->from('dg_fuel_level_report_tbl_rs');
		$this->db->where('utility_name',$utilityName);
		$this->db->where('report_date',$date);    
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
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
	function getfirePressureData($table_name,$fromdate,$todate,$station_id,$datesarray){
	

		$pressuredata2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->chech_firepump_pressure('Pressure','New Fire Pump',$datesarray[$t],'Fire Pump House','0069');
			if(count($check)==1){
				
				$pressuredata2=array_merge($pressuredata2,unserialize($check[0]['pressure_data']));
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$pressure="SELECT round(CurReading*Multiplier/1.5,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					$pressuredata2=array_merge($pressuredata2,$pressuredata);
				}else{
					$pressure="SELECT round(CurReading*Multiplier/1.5,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Pressure' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					$pressuredata2=array_merge($pressuredata2,$pressuredata);
					$pressure_array=array(
						'utility_name'=>'New Fire Pump',
						'line_connected'=>'Pressure',
						'location_name'=>'Fire Pump House',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'pressure_data'=>serialize($pressuredata),
						'meter_serial'=>'0069'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_pressure_report_tbl', $pressure_array);
				}
				
			}
			
		}
	
		return $pressuredata2;
	}
	function getfireFuelLevel_2($table_name,$fromdate,$todate,$station_id,$datesarray){
	
		$fuellevel2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->chech_firepump_fuel_level('Fuel Level','New Fire Pump',$datesarray[$t],'Fire Pump House','0069');
			//echo json_encode($check[0]['fuel_level_data']);die();
			if(count($check)==1){
				
				$fuellevel2=array_merge($fuellevel2,unserialize($check[0]['fuel_level_data']));
				// echo json_encode(unserialize($check[0]['fuel_level_data']));die();
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
				}else{
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='New Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0069' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
					$fuel_level_array=array(
						'utility_name'=>'New Fire Pump',
						'line_connected'=>'Fuel Level',
						'location_name'=>'Fire Pump House',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'fuel_level_data'=>serialize($fuelleveldata),
						'meter_serial'=>'0069'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_fuel_level_report_tbl', $fuel_level_array);
				}
				
			}
			
		}
	// echo json_encode($fuellevel2);die(); 
		return $fuellevel2;
	}
	function getfireFuelLevel_1($table_name,$fromdate,$todate,$station_id,$datesarray){

		$fuellevel2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->chech_firepump_fuel_level('Fuel Level','Old Fire Pump',$datesarray[$t],'Fire Pump House','0068');
			//echo json_encode($check[0]['fuel_level_data']);die();
			if(count($check)>0){
				
				$fuellevel2=array_merge($fuellevel2,unserialize($check[0]['fuel_level_data']));
				// echo json_encode(unserialize($check[0]['fuel_level_data']));die();
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
				}else{
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='Old Fire Pump' and LocationName='Fire Pump House' and MeterSerial='0068' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
					$fuel_level_array=array(
						'utility_name'=>'Old Fire Pump',
						'line_connected'=>'Fuel Level',
						'location_name'=>'Fire Pump House',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'fuel_level_data'=>serialize($fuelleveldata),
						'meter_serial'=>'0068'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('firepump_fuel_level_report_tbl', $fuel_level_array);
				}
				
			}
			
		}
	// echo json_encode($fuellevel2);die(); 
		return $fuellevel2;
	}
	function getDGFuelLevelRS($table_name,$table_name_live,$fromdate,$todate,$station_id,$utilityName,$datesarray,$from,$dashboardName){
		
			$fuellevel2=[];
			for($t=0;$t<count($datesarray);$t++){
				$check=$this->chech_dg_fuel_level_rs($utilityName,$datesarray[$t],$station_id);
				//echo json_encode($check[0]['fuel_level_data']);die();
				if(count($check)==1){
					
					$fuellevel2=array_merge($fuellevel2,unserialize($check[0]['fuel_level_data']));
					// echo json_encode(unserialize($check[0]['fuel_level_data']));die();
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){
						$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live where UtilityName='".$utilityName."' and MeterSerial='0051' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
						//echo $pressure;
						$fuelleveldata = $this->db->query($fuellevel_query)->result();
						$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
					}else{
						$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='".$utilityName."' and MeterSerial='0051' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
						//echo $pressure;
						$fuelleveldata = $this->db->query($fuellevel_query)->result();
						$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
						$fuel_level_array=array(
							'utility_name'=>$utilityName,
							'line_connected'=>'Fuel Level',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'fuel_level_data'=>serialize($fuelleveldata),
							'meter_serial'=>'0051',
							'station_id'=>$station_id              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('dg_fuel_level_report_tbl_rs', $fuel_level_array);
					}
					
				}
				
			}
		// echo json_encode($fuellevel2);die(); 
			return $fuellevel2;
		
		
	}
	function getDGFuelLevel($table_name,$fromdate,$todate,$station_id,$utilityName,$datesarray){


		

		$fuellevel2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->chech_dg_fuel_level('Fuel Level',$utilityName,$datesarray[$t],'0051');
			//echo json_encode($check[0]['fuel_level_data']);die();
			if(count($check)==1){
				
				$fuellevel2=array_merge($fuellevel2,unserialize($check[0]['fuel_level_data']));
				// echo json_encode(unserialize($check[0]['fuel_level_data']));die();
			}else{
				
				if($datesarray[$t]>=date('Y-m-d')){
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='".$utilityName."' and MeterSerial='0051' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
				}else{
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='".$utilityName."' and MeterSerial='0051' and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
					$fuel_level_array=array(
						'utility_name'=>$utilityName,
						'line_connected'=>'Fuel Level',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'fuel_level_data'=>serialize($fuelleveldata),
						'meter_serial'=>'0051'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('dg_fuel_level_report_tbl', $fuel_level_array);
				}
				
			}
			
		}
	// echo json_encode($fuellevel2);die(); 
		return $fuellevel2;
	}
	function getDGFuelLevel_rsbro($table_name,$table_name_live,$dashboardName,$todate,$station_id,$utilityName,$datesarray){


		

		$fuellevel2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->chech_dg_fuel_level('Fuel Level',$dashboardName,$datesarray[$t],'0051');
			//echo json_encode($check[0]['fuel_level_data']);die();
			if(count($check)==1){
				
				$fuellevel2=array_merge($fuellevel2,unserialize($check[0]['fuel_level_data']));
				// echo json_encode(unserialize($check[0]['fuel_level_data']));die();
			}else{
				
				if($datesarray[$t]>=date('Y-m-d')){
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name_live where UtilityName='".$utilityName."'  and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
				}else{
					$fuellevel_query="SELECT round(CurReading*Multiplier,2) as flevel,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='".$utilityName."'  and LineConnected='Fuel Level' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					// echo $fuellevel_query;die();
					$fuelleveldata = $this->db->query($fuellevel_query)->result();
					$fuellevel2=array_merge($fuellevel2,$fuelleveldata);
					$fuel_level_array=array(
						'utility_name'=>$dashboardName,
						'line_connected'=>'Fuel Level',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'fuel_level_data'=>serialize($fuelleveldata),
						'meter_serial'=>'0051'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('dg_fuel_level_report_tbl', $fuel_level_array);
				}
				
			}
			
		}
	// echo json_encode($fuellevel2);die(); 
		return $fuellevel2;
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
			$resdata['run']=(float)$check[0]['running_min2'];
			$resdata['date']=$check[0]['report_date'];
			$resdata['fadd']=(float)$check[0]['fuel_add'];
			$resdata['fremove']=(float)$check[0]['fuel_remove'];
			$resdata['name']=$check[0]['dg_name'];
			$resdata['fconsume']=$check[0]['fuel_consume'];
			$resdata['economy']=$check[0]['economy'];
			$resdata['availableFuel']=$check[0]['available_fuel'];
			$resdata['fuel_percent']=$check[0]['fuel_percent'];
			$resdata['data_from']="db";
		}else{
			if($date>=date('Y-m-d')){
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
		
		
	
		
		return $resdata;
	}
	function getDgData($table_name,$date){
		$check=$this->check_firepump_dg_running('Fuel Level','New Fire Pump',$date,'Diesel Engine','0069');
		if(count($check)==1){
			$resdata['run']=(float)$check[0]['running_min2'];
			$resdata['date']=$check[0]['report_date'];
			$resdata['fadd']=(float)$check[0]['fuel_add'];
			$resdata['fremove']=(float)$check[0]['fuel_remove'];
			$resdata['name']=$check[0]['dg_name'];
			$resdata['fconsume']=$check[0]['fuel_consume'];
			$resdata['economy']=$check[0]['economy'];
			$resdata['availableFuel']=$check[0]['available_fuel'];
			$resdata['fuel_percent']=$check[0]['fuel_percent'];
			$resdata['data_from']="db";
		}else{
			if($date>=date('Y-m-d')){
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
					$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0070'";
					$dataRunn = $this->db->query($queryRunn)->result_array();
					$resdata['run']=$dataRunn[0]['run'];
					
					$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Fuel Filled' and MeterSerial='0069'";
					
					$dataAdd = $this->db->query($queryFadd)->result_array();
					$resdata['fadd']=$dataAdd[0]['fadd'];
				
				
					$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='New Fire Pump' and MeterSerial='0069' AND TxnDate='".$date."' AND LineConnected='Fuel Level'";
					//echo $queryRuntimes;die();
					$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
				
					$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0070'  AND Consumption>0";
					
				
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
					$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0070'";
					$dataRunn = $this->db->query($queryRunn)->result_array();
					$resdata['run']=$dataRunn[0]['run'];
					
					$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Fuel Filled' and MeterSerial='0069'";
					
					$dataAdd = $this->db->query($queryFadd)->result_array();
					$resdata['fadd']=$dataAdd[0]['fadd'];
				
				
					$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='New Fire Pump' and MeterSerial='0069' AND TxnDate='".$date."' AND LineConnected='Fuel Level'";
					//echo $queryRuntimes;die();
					$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
				
					$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0070'  AND Consumption>0";
					
				
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
						// 'running_min1'=>$this->secondsToTime($resdata['run']),
						'running_min1'=>0,
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
		
		
	
		
		return $resdata;
	}
	function getDgData_gnp($table_name,$date){
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
			$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0070'";
			$dataRunn = $this->db->query($queryRunn)->result_array();
			$resdata['run']=$dataRunn[0]['run'];
			
			$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Fuel Filled' and MeterSerial='0069'";
			
			$dataAdd = $this->db->query($queryFadd)->result_array();
			$resdata['fadd']=$dataAdd[0]['fadd'];
		
		
			$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='New Fire Pump' and MeterSerial='0069' AND TxnDate='".$date."' AND LineConnected='Fuel Level'";
			//echo $queryRuntimes;die();
			$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
		
			$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='New Fire Pump' AND TxnDate='".$date."' AND LineConnected='Engine Run' and MeterSerial='0070'  AND Consumption>0";
			
		
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
									$check=$this->chech_hydro_running($list['UtilityName'],$datesarray[$k],'0061'); 
									if(count($check)==1){
										$resdata['fire_runn'][$k][$i]['meter']=$check[0]['pump_name'];
										$resdata['fire_runn'][$k][$i]['running_hours']=$check[0]['running_min1'];
										$resdata['fire_runn'][$k][$i]['running_hours1']=(float)$check[0]['running_min2'];
										$resdata['fire_runn'][$k][$i]['date']=$check[0]['report_date'];
									}else{
										if($datesarray[$k]>=date('Y-m-d')){
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
										}else{
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
											$hydro_runn_query=array(
												'utility_name'=>$utilityName,
												'line_connected'=>$runconnect,
												'pump_name'=>$list['UtilityName'],
												'report_date'=>$datesarray[$k],
												'created_date'=>date('Y-m-d H:i:s'),
												'updated_date'=>date('Y-m-d H:i:s'),
												'running_min1'=>$resdata['fire_runn'][$k][$i]['running_hours'],
												'running_min2'=>$resdata['fire_runn'][$k][$i]['running_hours1'],
												'meter_serial'=>'0061'              
											);
											$this->db->insert('hydro_running_report_tbl', $hydro_runn_query);
										}
									}

									
								
				
							}
							$i++;
						}
						// $pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate between '".$fromdate."' and  '".$todate."' ORDER BY TxnDate ASC,TxnTime ASC ";
						// $pressuredata = $this->db->query($pressure)->result_array();
						$resdata['pressure_data']=$this->gethydroPressureData($table_name,$fromdate,$todate,$station_id,$datesarray);
						//$pressuredata;


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
									$check=$this->chech_hydro_running($list['UtilityName'],$datesarray[$t],'0061'); 
									if(count($check)==1){
										$tcons+=$check[0]['running_min2']*60;
										$hldata[$t]['con']=$check[0]['running_min2']*60;
										$hldata[$t]['date']=$check[0]['report_date'];
									}else{
										if($datesarray[$t]>=date('Y-m-d')){
											$queryconsucum="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$loc."'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."' and MeterSerial='0061'";
											$dataconcum = $this->db->query($queryconsucum)->result_array();	
											$tcons+=$dataconcum[0]['cons'];
											$hldata[$t]['con']=$dataconcum[0]['cons'];
											$hldata[$t]['date']=$datesarray[$t];
										}else{
											$queryconsucum="SELECT SUM(Consumption) as cons FROM $table_name where LineConnected='".$loc."'  and StationId='".$station_id."' and TxnDate='".$datesarray[$t]."' and MeterSerial='0061'";
											$dataconcum = $this->db->query($queryconsucum)->result_array();	
											$tcons+=$dataconcum[0]['cons'];
											$hldata[$t]['con']=$dataconcum[0]['cons'];
											$hldata[$t]['date']=$datesarray[$t];

											$hydro_runn_query=array(
												'utility_name'=>'test',
												'line_connected'=>'test',
												'pump_name'=>$list['UtilityName'],
												'report_date'=>$datesarray[$t],
												'created_date'=>date('Y-m-d H:i:s'),
												'updated_date'=>date('Y-m-d H:i:s'),
												'running_min1'=>$this->secondsToTime($dataconcum[0]['cons']*60),
												'running_min2'=>round($dataconcum[0]['cons']/60,2),
												'meter_serial'=>'0061'              
											);
											$this->db->insert('hydro_running_report_tbl', $hydro_runn_query);

										}

									}
									

									array_push($hldata1,$hldata[$t]['con']);
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
	function gethydroPressureData($table_name,$fromdate,$todate,$station_id,$datesarray){
	

		$pressuredata2=[];
		for($t=0;$t<count($datesarray);$t++){
			$check=$this->check_hydro_pressure('PressureMonitor','Hyd.Pneu.System',$datesarray[$t]);
			if(count($check)==1){
				
				$pressuredata2=array_merge($pressuredata2,unserialize($check[0]['pressure_data']));
			}else{
				if($datesarray[$t]>=date('Y-m-d')){
					$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System'  and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					$pressuredata2=array_merge($pressuredata2,$pressuredata);
				}else{
					$pressure="SELECT round(CurReading*Multiplier,2) as pressure,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name where UtilityName='PressureMonitor' and LocationName='Hyd.Pneu.System' and StationId='".$station_id."' and TxnDate = '".$datesarray[$t]."'   ORDER BY TxnDate ASC,TxnTime ASC ";
					//echo $pressure;
					$pressuredata = $this->db->query($pressure)->result();
					$pressuredata2=array_merge($pressuredata2,$pressuredata);
					$pressure_array=array(
						'utility_name'=>'PressureMonitor',
						
						'location_name'=>'Hyd.Pneu.System',
						'report_date'=>$datesarray[$t],
						'created_date'=>date('Y-m-d H:i:s'),
						'updated_date'=>date('Y-m-d H:i:s'),
						'pressure_data'=>serialize($pressuredata),
						'meter_serial'=>'0000'              
					);
					//echo json_encode($pressure_array);die();
					$this->db->insert('hydro_pressure_report_tbl', $pressure_array);
				}
				
			}
			
		}
	
		return $pressuredata2;
	}
	function get_hardwares_device_data_energymeter_report_hourly($data,$fromdate,$todate,$sort){
		//echo $sort;die();
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
		$meter_list_chennai=$this->get_energymeter_list($table_name);
		
		for ($i=0; $i < count($meter_list_chennai); $i++) {
			
			for ($k=0; $k < count($datesarray); $k++)
				{ 
					
						if($datesarray[$k]>=date('Y-m-d')){

							//$resdata['chennai'][$i][$k]['meter']=$meter_list_chennai[$i]['LocationName'];

							if($meter_list_chennai[$i]['LocationName']=="AFS project-C"){ 
								$resdata['chennai'][$i][$k]['meter']="Container office";
							}else if($meter_list_chennai[$i]['LocationName']=="B4 Building"){
								$resdata['chennai'][$i][$k]['meter']="A4 Building";
							}else if($meter_list_chennai[$i]['LocationName']=="Mains"){
								$resdata['chennai'][$i][$k]['meter']="Main I/C (EB)";
							}else if($meter_list_chennai[$i]['LocationName']=="Fire Fighting"){
								$resdata['chennai'][$i][$k]['meter']="Fire pump panel";
							}else if($meter_list_chennai[$i]['LocationName']=="LDB Pump"){
								$resdata['chennai'][$i][$k]['meter']="LDB (Pump room)";
							}else if($meter_list_chennai[$i]['LocationName']=='PDB pump'){
								$resdata['chennai'][$i][$k]['meter']='PDB Panel';
							}else if($meter_list_chennai[$i]['LocationName']=="LDB Street"){
								$resdata['chennai'][$i][$k]['meter']="LDB (Street light panel)";
							}else{
								$resdata['chennai'][$i][$k]['meter']=$meter_list_chennai[$i]['LocationName'];
							}


							$resdata['chennai'][$i][$k]['sort']=$sort;
							$resdata['chennai'][$i][$k]['date']=$datesarray[$k];
							
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
								
		
									
									$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meter_list_chennai[$i]['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
									
									
									$datacontoday = $this->db->query($queryconsutoday)->result();
									$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
					
									$resdata1[$i1]['date']=$from." To ".$to;
								
										
								}
								$resdata['chennai'][$i][$k]['data']=$resdata1;
						}else{

							$check=$this->chech_energy_consumotion_chennai_hourly($meter_list_chennai[$i]['LocationName'],$datesarray[$k]);
							// echo count($check);die();
							if(count($check)==1){
								$resdata['chennai'][$i][$k]['meter']=$check[0]['meter_name'];
								$resdata['chennai'][$i][$k]['date']=$check[0]['report_date'];
								$resdata['chennai'][$i][$k]['from']='db4';
								$resdata['chennai'][$i][$k]['sort']=$sort;
								$resdata['chennai'][$i][$k]['data']=unserialize($check[0]['consumption']);
					
									
							}else{
								//$resdata['chennai'][$i][$k]['meter']=$meter_list_chennai[$i]['LocationName'];
								if($meter_list_chennai[$i]['LocationName']=="AFS project-C"){ 
									$resdata['chennai'][$i][$k]['meter']="Container office";
								}else if($meter_list_chennai[$i]['LocationName']=="B4 Building"){
									$resdata['chennai'][$i][$k]['meter']="A4 Building";
								}else if($meter_list_chennai[$i]['LocationName']=="Mains"){
									$resdata['chennai'][$i][$k]['meter']="Main I/C (EB)";
								}else if($meter_list_chennai[$i]['LocationName']=="Fire Fighting"){
									$resdata['chennai'][$i][$k]['meter']="Fire pump panel";
								}else if($meter_list_chennai[$i]['LocationName']=="LDB Pump"){
									$resdata['chennai'][$i][$k]['meter']="LDB (Pump room)";
								}else if($meter_list_chennai[$i]['LocationName']=='PDB pump'){
									$resdata['chennai'][$i][$k]['meter']='PDB Panel';
								}else if($meter_list_chennai[$i]['LocationName']=="LDB Street"){
									$resdata['chennai'][$i][$k]['meter']="LDB (Street light panel)";
								}else{
									$resdata['chennai'][$i][$k]['meter']=$meter_list_chennai[$i]['LocationName'];
								}
								$resdata['chennai'][$i][$k]['sort']=$sort;
								$resdata['chennai'][$i][$k]['date']=$datesarray[$k];
							
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
									
			
										
										$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meter_list_chennai[$i]['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND TxnTime BETWEEN '".$from."' AND '".$to."' AND LineConnected='kWh'	ORDER BY TxnTime";
										
										
										$datacontoday = $this->db->query($queryconsutoday)->result();
										$resdata1[$i1]['consumption']=(float)$datacontoday[0]->cons;
						
										$resdata1[$i1]['date']=$from." To ".$to;
									
											
									}
									$resdata['chennai'][$i][$k]['data']=$resdata1;
								$energy_cons_query=array(
									'location_name'=>$meter_list_chennai[$i]['LocationName'],
									'meter_serial'=>'',
									'station_id'=>$meter_list_chennai[$i]['StationId'],
									'report_date'=>$datesarray[$k],
									'created_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s'),
									'consumption'=>serialize($resdata1),
									'meter_name'=>$resdata['chennai'][$i][$k]['meter']              
								);
								$this->db->insert('energy_consumption_report_tbl_chennai_hourly', $energy_cons_query);
								}

							
								
						}
						
					
					
					
					
				} 
		}
		
		
	
	$rs=[];
	for ($t=0; $t < count($resdata['chennai']); $t++) { 
		for ($i=0; $i < 24; $i++) { 
		
			$rs['chennai'][$t][$i]['meter']=$resdata['chennai'][$t][0]['meter'];
			$rs['chennai'][$t][$i]['sort']=$resdata['chennai'][$t][0]['sort'];
			$rs['chennai'][$t][$i]['date']=$resdata['chennai'][$t][0]['data'][$i]['date'];
			for ($n=0; $n <count($resdata['chennai'][$t]) ; $n++) { 
				$rt[$n]['date']=$resdata['chennai'][$t][$n]['date'];
				$rt[$n]['consumption']=$resdata['chennai'][$t][$n]['data'][$i]['consumption'];
			}
			$rs['chennai'][$t][$i]['data']=$rt;
		}
	}
	
	return $rs;	
		
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
					$check=$this->chech_energy_consumotion($meters['LocationName'],$datesarray[$k]);
					if(count($check)==1){
						$resdata['consolidate'][$i][$k]['meter']=$check[0]['meter_name'];
						$resdata['consolidate'][$i][$k]['consumption']=$check[0]['consumption'];		
						$resdata['consolidate'][$i][$k]['date']=$check[0]['report_date'];
					}else{
						// die();
						if($datesarray[$k]>=date('Y-m-d')){
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
						}else{
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
									
									$energy_cons_query=array(
										'location_name'=>$meters['LocationName'],
										'meter_serial'=>'',
										'report_date'=>$datesarray[$k],
										'created_date'=>date('Y-m-d H:i:s'),
										'updated_date'=>date('Y-m-d H:i:s'),
										'consumption'=>$resdata['consolidate'][$i][$k]['consumption'],
										'meter_name'=>$resdata['consolidate'][$i][$k]['meter']              
									);
									$this->db->insert('energy_consumption_report_tbl', $energy_cons_query);
						}

					}
					
					
				
		
				
		
				
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
				$check=$this->chech_energy_consumotion($meters['LocationName'],$datesarray[$t]);
				if(count($check)==1){
					$tcons+=$check[0]['consumption'];
					$hldata[$t]['con']=$check[0]['consumption'];
					$hldata[$t]['date']=$check[0]['report_date'];
				}else{
					//die();
					$queryconsucum="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$t]."' AND LineConnected='kWh' ";
					$dataconcum = $this->db->query($queryconsucum)->result_array();	
					$tcons+=$dataconcum[0]['cons'];
					$hldata[$t]['con']=$dataconcum[0]['cons'];
					$hldata[$t]['date']=$datesarray[$t];
				}
				

				array_push($hldata1,$hldata[$t]['con']);
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
		
					

		return $resdata;
	}
	
	function get_hardwares_device_data_energymeter_current_report($data,$fromdate,$todate,$fromtime,$totime){
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
			
			$current1_data=[];
			$current2_data=[];
			$current3_data=[];
			
			
		
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
			
		

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_current_data('current',$meters['LocationName'],$datesarray[$t]);
				if(count($check)==1){
				
					$current1_data=array_merge($current1_data,unserialize($check[0]['c1_data']));
					$current2_data=array_merge($current2_data,unserialize($check[0]['c2_data']));
					$current3_data=array_merge($current3_data,unserialize($check[0]['c3_data']));
				}else{
					
					if($datesarray[$t]>=date('Y-m-d')){
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$c1 = $this->db->query($querycurrent1)->result();
						$current1_data=array_merge($current1_data,$c1);

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						$current2_data=array_merge($current2_data,$c2);

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						$current3_data=array_merge($current3_data,$c3);
						
						
					}else{
						$querycurrent1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$c1 = $this->db->query($querycurrent1)->result();
						$current1_data=array_merge($current1_data,$c1);

						$querycurrent2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c2 = $this->db->query($querycurrent2)->result();
						$current2_data=array_merge($current2_data,$c2);

						$querycurrent3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Current_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
					
						$c3 = $this->db->query($querycurrent3)->result();
						$current3_data=array_merge($current3_data,$c3);
						$current_array=array(
							'location_name'=>$meters['LocationName'],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'c1_data'=>serialize($c1),
							'c2_data'=>serialize($c2),
							'c3_data'=>serialize($c3),
							'meter_name'=>$resdata['PF'][$i]['meter']              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('current_report_tbl', $current_array);
					}
				}
			}
			$resdata['PF'][$i]['c1_data']=$current1_data;
			$resdata['PF'][$i]['c2_data']=$current2_data;
			$resdata['PF'][$i]['c3_data']=$current3_data;

			
			
			 $i++;
		}
					

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_voltage_report($data,$fromdate,$todate,$fromtime,$totime){
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
			
			$voltage1_data=[];
			$voltage2_data=[];
			$voltage3_data=[];
			
		
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
			

			for($t=0;$t<count($datesarray);$t++){
				$check=$this->check_voltage_data('voltage',$meters['LocationName'],$datesarray[$t]);
				if(count($check)==1){
				
					$voltage1_data=array_merge($voltage1_data,unserialize($check[0]['v1_data']));
					$voltage2_data=array_merge($voltage2_data,unserialize($check[0]['v2_data']));
					$voltage3_data=array_merge($voltage3_data,unserialize($check[0]['v3_data']));
				}else{
					// die();
					if($datesarray[$t]>=date('Y-m-d')){
						$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v1 = $this->db->query($queryvolt1)->result();
						$voltage1_data=array_merge($voltage1_data,$v1);

						$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v2 = $this->db->query($queryvolt2)->result();
						$voltage2_data=array_merge($voltage2_data,$v2);

						$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v3 = $this->db->query($queryvolt3)->result();
						$voltage3_data=array_merge($voltage3_data,$v3);
						
						
					}else{
						$queryvolt1="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_1' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v1 = $this->db->query($queryvolt1)->result();
						$voltage1_data=array_merge($voltage1_data,$v1);

						$queryvolt2="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_2' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v2 = $this->db->query($queryvolt2)->result();
						$voltage2_data=array_merge($voltage2_data,$v2);

						$queryvolt3="SELECT round(CurReading,2) as CurReading ,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE TxnDate = '".$datesarray[$t]."' AND `StationId`='".$station_id."' AND `LineConnected`='Voltage_3' AND `LocationName`='".$meters['LocationName']."'  ORDER BY TxnDate ASC,TxnTime ASC";
		
						$v3 = $this->db->query($queryvolt3)->result();
						$voltage3_data=array_merge($voltage3_data,$v3);
						$voltage_array=array(
							'location_name'=>$meters['LocationName'],
							'meter_serial'=>'',
							'report_date'=>$datesarray[$t],
							'created_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s'),
							'v1_data'=>serialize($v1),
							'v2_data'=>serialize($v2),
							'v3_data'=>serialize($v3),
							'meter_name'=>$resdata['PF'][$i]['meter']              
						);
						//echo json_encode($pressure_array);die();
						$this->db->insert('voltage_report_tbl', $voltage_array);
					}
				}
			}

			$resdata['PF'][$i]['v1_data']=$voltage1_data;
			$resdata['PF'][$i]['v2_data']=$voltage2_data;
			$resdata['PF'][$i]['v3_data']=$voltage3_data;
			
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
		$check=$this->Api_data_model->check_data('Electricity Board',$table_name,$station_id);
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
	function get_meter_list_iit($table_name){
		$this->db->select('');
        $this->db->from($table_name);     
        $this->db->where('MeterName','Switch Status FB-4'); 
         $this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
        return $res;

		

	}
	function get_meter_list_hcug($table_name){
		$this->db->select('');
        $this->db->from($table_name);
         $this->db->group_by('UtilityName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		// echo $this->db->last_query();exit;     
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
	function get_energymeter_list_station($table_name,$station_id){
		
		$this->db->select('');
        $this->db->from('undp_devices');     
        $this->db->where('LineConnected','kWh');
		$this->db->where('StationId',$station_id); 
		$this->db->group_by('UtilityName');
        $res = $this->db->get()->result_array(); 
		//echo json_encode($res[0]); die();
		//echo $this->db->last_query();exit;     
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
				
				$yphase="SELECT `CurReading` FROM $table_name WHERE  `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='Y-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$yphasedata = $this->db->query($yphase)->result_array();
				//echo $yphase;die();
				$rphase="SELECT `CurReading` FROM $table_name WHERE  `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='R-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$rphasedata = $this->db->query($rphase)->result_array();
				//echo $rphasedata[0]['CurReading'];die();
				$bphase="SELECT `CurReading` FROM $table_name WHERE  `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='B-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";

				// $yphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='Y-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				// $yphasedata = $this->db->query($yphase)->result_array();
				
				// $rphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='R-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				// $rphasedata = $this->db->query($rphase)->result_array();
				
				// $bphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND `UtilityName`='".$utilityName."' AND LineConnected='B-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
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
			if($meters['LocationName']=='Hyd.Pneu.System' || $meters['LocationName']=='Project'|| $meters['LocationName']=='MarketingOffice'|| $meters['LocationName']=='Fire Pump House'){
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
	function get_hardwares_device_data_switch_status_iit($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name_live($station_id);
		
		$meter_list=$this->get_meter_list_iit($table_name);
		$i=0;
		
		foreach($meter_list as $meters){
			$poff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Unit Status' and MeterName='Switch Status FB-4'	ORDER BY TxnTime DESC LIMIT 1";
			$poffdata = $this->db->query($poff)->result_array();
			$resdata[$i]['meter']=$meters['LocationName'];
			if($poffdata[0]['CurReading']==1){
					$resdata[$i]['status']='On';
				}else{
					$resdata[$i]['status']='Off';
				}
				$i++;
		}
		// echo json_encode($resdata);die();
		//die();
		return $resdata;
	}
	function get_hardwares_device_data_switch_status_hcug($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$yesterDay = date('Y-m-d',strtotime("-1 days")); 
		// echo $station_id;die();
		$table_name_live=$this->get_table_name_live($station_id);
		$table_name=$this->get_table_name($station_id);
		$meter_list=$this->get_meter_list_hcug($table_name);
		$i=0;
		
		foreach($meter_list as $meters){
			
			if($meters['UtilityId']==144){
				$poff="SELECT `CurReading` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$todayDate."' 	ORDER BY TxnTime DESC LIMIT 1";
			// echo $poff;die();
			$poffdata = $this->db->query($poff)->result_array();

			$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$todayDate."' and CurReading=0";
			$todayrunq = $this->db->query($queryruntoday)->result_array();

			$queryrunyest="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$yesterDay."' and CurReading=0";
			$yestrunq = $this->db->query($queryrunyest)->result_array();
				$resdata[$i]['meter']=$meters['UtilityName'];
				
				if(isset($todayrunq[0]['secs'])){
					$resdata[$i]['todayrunn']=gmdate("H:i:s", $todayrunq[0]['secs']);
					if($poffdata[0]['CurReading']==0){
						$resdata[$i]['status']=1;
					}else{
						$resdata[$i]['status']=0;
					}
				}else{
					$resdata[$i]['todayrunn']="00:00:00";
				}
				
				if(isset($yestrunq[0]['secs']) ){				
					
					$resdata[$i]['yestrunn']=gmdate("H:i:s", $yestrunq[0]['secs']);				

				}else{
					$resdata[$i]['yestrunn']="00:00:00";	
				}
			
			
				
			}else{
			$poff="SELECT `CurReading` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$todayDate."' 	ORDER BY TxnTime DESC LIMIT 1";
			// echo $poff;die();
			$poffdata = $this->db->query($poff)->result_array();

			$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$todayDate."' and CurReading=1";
			$todayrunq = $this->db->query($queryruntoday)->result_array();
				// echo $queryruntoday;die();
			$queryrunyest="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$yesterDay."' and CurReading=1";
			$yestrunq = $this->db->query($queryrunyest)->result_array();

			$resdata[$i]['meter']=$meters['UtilityName'];
			$resdata[$i]['status']=(int)$poffdata[0]['CurReading'];
				if(isset($todayrunq[0]['secs'])){
					$resdata[$i]['todayrunn']=gmdate("H:i:s", $todayrunq[0]['secs']);
					
						
					
				}else{
					$resdata[$i]['todayrunn']="00:00:00";
				}
				
				if(isset($yestrunq[0]['secs']) ){				
					
					$resdata[$i]['yestrunn']=gmdate("H:i:s", $yestrunq[0]['secs']);				

				}else{
					$resdata[$i]['yestrunn']="00:00:00";	
				}
			
			}
			
			
				$i++;
		}
		// echo json_encode($resdata);die();
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
		$table_name_live=$this->get_table_name_live($station_id);
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$meter_list=$this->get_meter_list_hcug($table_name);
		$i=0;
		foreach($meter_list as $meters){

			if($meters['UtilityId']==144){
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					if(count($datesarray)==1){
						if($datesarray[$k]>=date('Y-m-d')){
							$fulldata=array();
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
								$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=0 and TxnTime BETWEEN '".$from."' AND '".$to."'";
								$fulldata[$i1]['Time']=$from." To ".$to;
								$todayrunq = $this->db->query($queryruntoday)->result_array();
								if(is_null($todayrunq[0]['secs'])){
									$fulldata[$i1]['rh']=0;
								}else{
									$fulldata[$i1]['rh']=round($todayrunq[0]['secs']/60);
								}
								
				   				
								}
								$resdata[$i][$k]['meter']=$meters['UtilityName'];
								$resdata[$i][$k]['runn_h']=$fulldata;
								$resdata[$i][$k]['date']=$datesarray[$k];
								$resdata[$i][$k]['type']=1;
						}else{
							$fulldata=array();
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
								$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=0 and TxnTime BETWEEN '".$from."' AND '".$to."'";
								$fulldata[$i1]['Time']=$from." To ".$to;
								$todayrunq = $this->db->query($queryruntoday)->result_array();
								if(is_null($todayrunq[0]['secs'])){
									$fulldata[$i1]['rh']=0;
								}else{
									$fulldata[$i1]['rh']=round($todayrunq[0]['secs']/60);
								}
								
				   				
								}
								$resdata[$i][$k]['meter']=$meters['UtilityName'];
								$resdata[$i][$k]['runn_h']=$fulldata;
								$resdata[$i][$k]['date']=$datesarray[$k];
								$resdata[$i][$k]['type']=1;
						}
					}else{
						if($datesarray[$k]>=date('Y-m-d')){
							$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=0";
						// echo $queryruntoday;die();
				$todayrunq = $this->db->query($queryruntoday)->result_array();
						if(is_null($todayrunq[0]['secs'])){
							$resdata[$i][$k]['runn_h']="00:00:00";
						}else{
							$resdata[$i][$k]['runn_h']=gmdate("H:i:s", $todayrunq[0]['secs']);
						}
						
						$resdata[$i][$k]['meter']=$meters['UtilityName'];
						
						$resdata[$i][$k]['date']=$datesarray[$k];
						$resdata[$i][$k]['type']=2;
						
						$resdata[$i][$k]['runn_m']=round($todayrunq[0]['secs']/60);
						}else{
							$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=0";
						// echo $queryruntoday;die();
				$todayrunq = $this->db->query($queryruntoday)->result_array();
						if(is_null($todayrunq[0]['secs'])){
							$resdata[$i][$k]['runn_h']="00:00:00";
						}else{
							$resdata[$i][$k]['runn_h']=gmdate("H:i:s", $todayrunq[0]['secs']);
						}
						
						$resdata[$i][$k]['meter']=$meters['UtilityName'];
						
						$resdata[$i][$k]['date']=$datesarray[$k];
	
						$resdata[$i][$k]['type']=2;
						$resdata[$i][$k]['runn_m']=round($todayrunq[0]['secs']/60);
						}
					}
					
					
					
		
					//echo json_encode($resdata);die();
				
		
				
		
				
				}
			}else{
				for ($k=0; $k < count($datesarray); $k++)
				{ 
					if(count($datesarray)==1){
						if($datesarray[$k]>=date('Y-m-d')){
							$fulldata=array();
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
								$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=1 and TxnTime BETWEEN '".$from."' AND '".$to."'";
								$fulldata[$i1]['Time']=$from." To ".$to;
								$todayrunq = $this->db->query($queryruntoday)->result_array();
								if(is_null($todayrunq[0]['secs'])){
									$fulldata[$i1]['rh']=0;
								}else{
									$fulldata[$i1]['rh']=round($todayrunq[0]['secs']/60);
								}
								
				   				
								}
								$resdata[$i][$k]['meter']=$meters['UtilityName'];
								$resdata[$i][$k]['runn_h']=$fulldata;
								$resdata[$i][$k]['date']=$datesarray[$k];
								$resdata[$i][$k]['type']=1;
						}else{
							$fulldata=array();
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
								$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=1 and TxnTime BETWEEN '".$from."' AND '".$to."'";
								$fulldata[$i1]['Time']=$from." To ".$to;
								$todayrunq = $this->db->query($queryruntoday)->result_array();
								if(is_null($todayrunq[0]['secs'])){
									$fulldata[$i1]['rh']=0;
								}else{
									$fulldata[$i1]['rh']=round($todayrunq[0]['secs']/60);
								}
								
				   				
								}
								$resdata[$i][$k]['meter']=$meters['UtilityName'];
								$resdata[$i][$k]['runn_h']=$fulldata;
								$resdata[$i][$k]['date']=$datesarray[$k];
								$resdata[$i][$k]['type']=1;
						}
					}else{
						if($datesarray[$k]>=date('Y-m-d')){
							$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name_live WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=1";
						// echo $queryruntoday;die();
				$todayrunq = $this->db->query($queryruntoday)->result_array();
						if(is_null($todayrunq[0]['secs'])){
							$resdata[$i][$k]['runn_h']="00:00:00";
						}else{
							$resdata[$i][$k]['runn_h']=gmdate("H:i:s", $todayrunq[0]['secs']);
						}
						
						$resdata[$i][$k]['meter']=$meters['UtilityName'];
						
						$resdata[$i][$k]['date']=$datesarray[$k];
	
						$resdata[$i][$k]['type']=2;
						$resdata[$i][$k]['runn_m']=round($todayrunq[0]['secs']/60);
						}else{
							$queryruntoday="SELECT SUM( CASE  WHEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime)>=0 THEN TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime) ELSE 0 END) AS `secs` FROM $table_name WHERE `UtilityName`='".$meters['UtilityName']."' AND `TxnDate`='".$datesarray[$k]."' and CurReading=1";
						// echo $queryruntoday;die();
				$todayrunq = $this->db->query($queryruntoday)->result_array();
						if(is_null($todayrunq[0]['secs'])){
							$resdata[$i][$k]['runn_h']="00:00:00";
						}else{
							$resdata[$i][$k]['runn_h']=gmdate("H:i:s", $todayrunq[0]['secs']);
						}
						
						$resdata[$i][$k]['meter']=$meters['UtilityName'];
						
						$resdata[$i][$k]['date']=$datesarray[$k];
	
						$resdata[$i][$k]['type']=2;
						$resdata[$i][$k]['runn_m']=round($todayrunq[0]['secs']/60);
						}
					}
					
					
					
		
					//echo json_encode($resdata);die();
				
		
				
		
				
				}
			}
        
		$i++;
	}
		
	// echo json_encode($resdata);die();
		return $resdata;
	}
	function get_meter_list_by_tower($table_name,$tower){
		if($table_name==''){

		}else{
			$this->db->select('LocationName');
			$this->db->from($table_name); 
			$this->db->where('UomName','Status'); 
			$this->db->where('LocationGroup',$tower); 
			 $this->db->group_by('LocationName');
			 $this->db->order_by('LocationName','desc');
			$res = $this->db->get()->result_array(); 
			//echo json_encode($res[0]); die();
			// echo $this->db->last_query();exit;     
			return $res;
		}
		
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

				if($meters['LocationName']=='2nd Floor'){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='P4 Floor'){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='7th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='35th Floor'){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='42th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor' || $meters['LocationName']=='23th Floor' ){
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else{
					$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}
				
				//echo $emergency; die();
				$emergencydata = $this->db->query($emergency)->result_array();
				if($meters['LocationName']=='5th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='Lobby' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				}else if($meters['LocationName']=='40th Floor'){
					$non_emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='12th Floor' AND TxnDate='".$todayDate."' AND UtilityName='Non-Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
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
	function get_hardwares_device_data_switch_control_iit($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name_live($station_id);
		$towers=array('Tower-A','Tower-B','Tower-C');
		foreach($towers as $tower){
			$meter_list=$this->get_meter_list_by_tower($table_name,$tower);
			$i=0;
			foreach($meter_list as $meters){

				$emergency="SELECT `CurReading` FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$todayDate."' AND UtilityName='Emergency' AND UomName='Status'  ORDER BY TxnTime desc LIMIT 1";
				
				//echo $emergency; die();
				$emergencydata = $this->db->query($emergency)->result_array();
				
				$i++;

			}
			
			//print_r($meter_list);die();

		}
		
		//die();
		return $resdata;
	}
	function get_hardwares_device_data_switch_control_report($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
				
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		$towers=array('Tower-A','Tower-B','Tower-C');
		foreach($towers as $tower){
			$meter_list=$this->get_meter_list_by_tower($table_name,$tower);
			
			for($t=0;$t<count($datesarray);$t++){
				$i=0;
			foreach($meter_list as $meters){

				// if($meters['LocationName']=='2nd Floor'){
				// 	$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else if($meters['LocationName']=='P4 Floor'){
				// 	$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='7th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='7th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else if($meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor' || $meters['LocationName']=='23th Floor' ){
				// 	$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else{
				// 	$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }
				if($meters['LocationName']=='35th Floor'|| $meters['LocationName']=='P4 Floor'){
					$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='14th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='14th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}else if($meters['LocationName']=='2nd Floor' || $meters['LocationName']=='23th Floor' || $meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor'){
					$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}else{
					$emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}
				
				
				//echo $emergency; die();
				$emergencydata = $this->db->query($emergency)->result_array();
				$emergencydata_evng = $this->db->query($emergency_evng)->result_array();
				// if($meters['LocationName']=='Lobby'){
				// 	$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='5th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='5th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else if($meters['LocationName']=='40th Floor'){
				// 	$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='40th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='40th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1  AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else if($meters['LocationName']=='2nd Floor'){
				// 	$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else if($meters['LocationName']=='14th Floor'){
				// 	$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='21th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='21th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else if($meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor' || $meters['LocationName']=='23th Floor' || $meters['LocationName']=='16th Floor' ){
				// 	$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='16th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				// }else{
				// 	$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// 	$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime desc LIMIT 1";
				// }
				if($meters['LocationName']=='40th Floor'){
					$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='12th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='12th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1  AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}else if($meters['LocationName']=='14th Floor'){
					$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='7th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='7th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1  AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}else if($meters['LocationName']=='2nd Floor' || $meters['LocationName']=='23th Floor' || $meters['LocationName']=='37th Floor' || $meters['LocationName']=='30th Floor'){
					$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='9th Floor' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1  AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}else{
					$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
					$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE LocationGroup='".$tower."' AND LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='Non-Emergency' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";
				}
				
// echo $non_emergency_evng;die();
				
				$non_emergencydata = $this->db->query($non_emergency)->result_array();
				$non_emergencydata_evng = $this->db->query($non_emergency_evng)->result_array();
				$resdata[$tower][$t][$i]['hardware_name']=$meters['LocationName'];
				$resdata[$tower][$t][$i]['date']=$datesarray[$t];
				if($emergencydata[0]['TxnTime']==''){
					$resdata[$tower][$t][$i]['emergency_running_start_end']="NO Running";
					$resdata[$tower][$t][$i]['emergency_running']='NO Running';
				}else{
					$resdata[$tower][$t][$i]['emergency_running_start_end']="12:00 am TO ".date('g:i a', strtotime($emergencydata[0]['TxnTime']));
					$frd= $todayDate." 00:00:00";
					$tod= $todayDate." ".$emergencydata[0]['TxnTime'];
					$datetime1 = new DateTime($frd);
					$datetime2 = new DateTime($tod);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%h hours %i minutes');	
					$resdata[$tower][$t][$i]['emergency_running']=$elapsed;							
				}
				if($emergencydata_evng[0]['TxnTime']==''){
					$resdata[$tower][$t][$i]['emergency_running_start_end_evng']="NO Running";
					$resdata[$tower][$t][$i]['emergency_running_evng']="NO Running";
				}else{
					$resdata[$tower][$t][$i]['emergency_running_start_end_evng']=date('g:i a', strtotime($emergencydata_evng[0]['TxnTime']))." TO 11:59 pm";
					$frd=$todayDate." ".$emergencydata_evng[0]['TxnTime'];
					$tod=  $todayDate." 24:00:00";
					$datetime1 = new DateTime($frd);
					$datetime2 = new DateTime($tod);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%h hours %i minutes');	
					$resdata[$tower][$t][$i]['emergency_running_evng']=$elapsed;							
				}
				if($non_emergencydata[0]['TxnTime']==''){
					$resdata[$tower][$t][$i]['non_emergency_running_start_end']="No Running ";
					$resdata[$tower][$t][$i]['non_emergency_running']="No Running ";
				}else{
					$resdata[$tower][$t][$i]['non_emergency_running_start_end']="12:00 am TO ".date('g:i a', strtotime($non_emergencydata[0]['TxnTime']));
					$frd= $todayDate." 00:00:00";
					$tod= $todayDate." ".$non_emergencydata[0]['TxnTime'];
					$datetime1 = new DateTime($frd);
					$datetime2 = new DateTime($tod);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%h hours %i minutes');
					$resdata[$tower][$t][$i]['non_emergency_running']=$elapsed;	
				}

				if($non_emergencydata_evng[0]['TxnTime']==''){
					$resdata[$tower][$t][$i]['non_emergency_running_start_end_evng']="No Running ";
					$resdata[$tower][$t][$i]['non_emergency_running_evng']="No Running ";
				}else{
					$resdata[$tower][$t][$i]['non_emergency_running_start_end_evng']=date('g:i a', strtotime($non_emergencydata_evng[0]['TxnTime']))." TO 11:59 pm";
					
					$frd= $todayDate." ".$non_emergencydata_evng[0]['TxnTime'];
					$tod= $todayDate." 24:00:00";
					$datetime1 = new DateTime($frd);
					$datetime2 = new DateTime($tod);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%h hours %i minutes');
					$resdata[$tower][$t][$i]['non_emergency_running_evng']=$elapsed;	
				}
                

				
				//$resdata[$tower][$i]['non_emergency_status']="on";
				
				$i++;

			}
		}
			//print_r($meter_list);die();

		}
		//$meter_list=$this->get_meter_list($table_name);
		
		//echo json_encode($resdata);die();
		//die();
		return $resdata;
	}
	function get_hardwares_device_data_switch_control_report_iit($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$UtilityName=$data['UtilityName'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		// echo $table_name;die();
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
				
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
		
			$meter_list=$this->get_meter_list_by_tower($table_name,$tower);
			
			for($t=0;$t<count($datesarray);$t++){
				$i=0;
			foreach($meter_list as $meters){
				$non_emergency="SELECT `CurReading`,TxnTime FROM $table_name WHERE  LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='".$UtilityName."' AND UomName='Status' AND CurReading=1 AND TxnTime <='12:00:00' ORDER BY TxnTime desc LIMIT 1";
				$non_emergency_evng="SELECT `CurReading`,TxnTime FROM $table_name WHERE  LocationName='".$meters['LocationName']."' AND TxnDate='".$datesarray[$t]."' AND UtilityName='".$UtilityName."' AND UomName='Status' AND CurReading=1 AND TxnTime > '12:00:00' ORDER BY TxnTime asc LIMIT 1";

				$non_emergencydata = $this->db->query($non_emergency)->result_array();
				$non_emergencydata_evng = $this->db->query($non_emergency_evng)->result_array();
				$resdata[$t][$i]['hardware_name']=$meters['LocationName'];
				$resdata[$t][$i]['date']=$datesarray[$t];
				$min1=0;
				if($non_emergencydata[0]['TxnTime']==''){
					$resdata[$t][$i]['non_emergency_running_start_end']="No Running ";
					$resdata[$t][$i]['non_emergency_running']="No Running ";
					$resdata[$t][$i]['non_emergency_running_min']=0;
					$min=0;
				}else{
					$resdata[$t][$i]['non_emergency_running_start_end']="12:00 am TO ".date('g:i a', strtotime($non_emergencydata[0]['TxnTime']));
					$frd= $todayDate." 00:00:00";
					$tod= $todayDate." ".$non_emergencydata[0]['TxnTime'];
					$datetime1 = new DateTime($frd);
					$datetime2 = new DateTime($tod);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%h hours %i minutes');
					$hr = $interval->format('%h')*60;
					$min = $interval->format('%i')+$hr;
					$resdata[$t][$i]['non_emergency_running']=$elapsed;	
					$resdata[$t][$i]['non_emergency_running_min']=$min;
					$min1+=$min;
				}

				if($non_emergencydata_evng[0]['TxnTime']==''){
					$resdata[$t][$i]['non_emergency_running_start_end_evng']="No Running ";
					$resdata[$t][$i]['non_emergency_running_evng']="No Running ";
					$resdata[$t][$i]['non_emergency_running_evng_min']=0;
					$min=0;
				}else{
					$resdata[$t][$i]['non_emergency_running_start_end_evng']=date('g:i a', strtotime($non_emergencydata_evng[0]['TxnTime']))." TO 11:59 pm";
					
					$frd= $todayDate." ".$non_emergencydata_evng[0]['TxnTime'];
					$tod= $todayDate." 24:00:00";
					$datetime1 = new DateTime($frd);
					$datetime2 = new DateTime($tod);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%h hours %i minutes');
					$hr = $interval->format('%h')*60;
					$min = $interval->format('%i')+$hr;
					$resdata[$t][$i]['non_emergency_running_evng']=$elapsed;
					$resdata[$t][$i]['non_emergency_running_evng_min']=$min;	
					$min1+=$min;
				}
                
				$resdata[$t][$i]['non_emergency_running_min_tot']=$min1;
				$resdata[$t][$i]['non_emergency_running_min_tot_hr']=floor($min1 / 60).' hours '.($min1 -   floor($min1 / 60) * 60).' minutes';
				
				//$resdata[$tower][$i]['non_emergency_status']="on";
				
				$i++;

			}
		}
			//print_r($meter_list);die();

		
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
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/250)*100);
		// $resdata['filledper']=round(($dataStartEndFuel[0]->end/230)*100);

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
	function get_hardwares_device_data_dg_rsbro($data){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dg_name'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		$table_name_live="hardware_station_consumption_data_rsbrothers_live";
		$table_name="hardware_station_consumption_data_rsbrothers";
		
		//$todayDate="2021-10-15";
       // echo $station_id;
		$check=$this->Api_data_model->check_data($hardware_name,$table_name_live,$station_id);
		if($check){
			$startEndFuelQuery="SELECT 
		(SELECT Consumption as CurReading FROM $table_name_live WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT Consumption as CurReading FROM $table_name_live WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'"; 
		// echo $startEndFuelQuery."<br>";

		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND StationId='".$station_id."' AND LineConnected='DG_Running_Time'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata['fadd']=$dataAdd[0]->fadd;


		$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
		//echo $queryRuntimes;die();
		$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();

		$queryRuntimes="SELECT TxnTime FROM $table_name_live WHERE UtilityName='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
		

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
		// if($station_id==2022000271 || $station_id==2022000274 || $station_id==2022000270 || $station_id==2022000276){
		// 	$resdata['filledper']=round(($dataStartEndFuel[0]->end/230)*100);
		// }else{
		// 	$resdata['filledper']=round(($dataStartEndFuel[0]->end/380)*100);
		// }
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/$capacity)*100);

		$queryVoltage="SELECT Consumption FROM $table_name_live WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata['voltage']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name_live WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."'  AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata['status']=$status;
		$resdata['dgname']=$dashboardName;
		$resdata['location']=$data['location'];
		$graphdata=$this->Api_data_model->graph_data_rs($dashboardName,$todayDate,$table_name,$station_id);
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
			$resdata['location']=$data['location'];
			$resdata['dgname']=$dashboardName;
			$resdata['graph']=array();


		}

		




		return $resdata;
		
	}
	function get_hardwares_device_data_dg_rsbro_chk($data){
				$todayDate=date("Y-m-d");

				$url="http://chekhra.in/Generators/chekhraMaps/show_all_rsbro_api.php?clintid=438&generatorsId=".$data['dg_name'];
				// echo $url;die();
				$ch = curl_init($url);                                                                      
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
				
		
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
																		  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
				$result = curl_exec($ch);
				$fulldata=json_decode($result, true);
				$resdata['run']=$fulldata['run'];
				$resdata['fadd']=$fulldata['fadd'];
				$resdata['fremove']=$fulldata['fremove'];
				$resdata['fconsume']=$fulldata['fconsume'];
				$resdata['economy']=$fulldata['economy'];
				$resdata['availableFuel']=$fulldata['availableFuel'];
				$resdata['voltage']=$fulldata['voltage'];
				$resdata['status']=$fulldata['status'];
				// $resdata['location']=$data['location'];
				$resdata['dgname']=$data['dg_name'];
				//$resdata['graph']=array();json_decode($result, true);
	
				$graphdata=$this->Api_data_model->graph_data_rs_chk($data['dg_name'],$todayDate);
				$resdata['graph']=$graphdata;
				return $resdata;
		
		
	}
	function get_hardwares_device_data($data){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$todayDate=date("Y-m-d");
		if($station_id==2022000274 || $station_id==2022000270 || $station_id==2022000276){
			$table_name="hardware_station_consumption_data_rsbrothers_live";
		}else if($station_id==2021000067){
			$table_name=$this->get_table_name($station_id);
		}else{
			$table_name=$this->get_table_name_live($station_id);
		}
		if(isset($table_name)){
			$check=$this->Api_data_model->check_data($hardware_name,$table_name,$station_id);
			if($check){
				$startEndFuelQuery="SELECT 
			(SELECT Consumption as CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
			(SELECT Consumption as CurReading FROM $table_name WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'"; 
			// echo $startEndFuelQuery."<br>";
	
			$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
			//echo json_encode($dataStartEndFuel[0]->start);die();
			$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$todayDate."' AND StationId='".$station_id."' AND LineConnected='DG_Running_Time'";
			$dataRunn = $this->db->query($queryRunn)->result();
			$resdata['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
			
			$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Filled'";
			
			$dataAdd = $this->db->query($queryFadd)->result();
			$resdata['fadd']=$dataAdd[0]->fadd;
	
	
			$queryNonRuntimes="SELECT TxnTime,PrvReading,CurReading FROM $table_name WHERE UtilityName='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND LineConnected='Fuel Level'";
			//echo $queryRuntimes;die();
			$dataNonRunTimes = $this->db->query($queryNonRuntimes)->result();
	
			$queryRuntimes="SELECT TxnTime FROM $table_name WHERE UtilityName='".$hardware_name."' AND StationId='".$station_id."' AND TxnDate='".$todayDate."' AND LineConnected='DG_Running_Time'  AND Consumption>0";
			
	
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
			if($station_id==2022000271 || $station_id==2022000274 || $station_id==2022000270 || $station_id==2022000276){
				$resdata['filledper']=round(($dataStartEndFuel[0]->end/230)*100);
			}else{
				$resdata['filledper']=round(($dataStartEndFuel[0]->end/380)*100);
			}
			
	
			$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
			//echo $queryRuntimes;die();
			$dataVoltage = $this->db->query($queryVoltage)->result();
	
			$resdata['voltage']=$dataVoltage[0]->Consumption;
	
			$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$todayDate."' AND StationId='".$station_id."'  AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
			//echo $queryRuntimes;die();
			$dataStatus = $this->db->query($queryStatus)->result();
			if($dataStatus[0]->Consumption==1){
				$status="ON";
			}else{
				$status="OFF";
			}
			$resdata['status']=$status;
			$resdata['dgname']=$dashboardName;
			$graphdata=$this->Api_data_model->graph_data($hardware_name,$todayDate,$table_name,$station_id);
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
		//$todayDate="2021-10-15";
// echo $station_id;die();
	
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
	function getAHUData_vegas1(){
		$query="SELECT * FROM `ahu_monitoring`";
		$hvacData = $this->db->query($query)->result();
		for ($i=0; $i < count($hvacData); $i++) {		

			$result[$i]['LocationName']=$hvacData[$i]->location;
			$result[$i]['sid']=$hvacData[$i]->switch_id;
			$result[$i]['meter']=$hvacData[$i]->meter;
			$result[$i]['room_temp']=$hvacData[$i]->room_temp;
			$result[$i]['set_temp']=$hvacData[$i]->set_temp;
			$result[$i]['status']=$hvacData[$i]->status;
			$result[$i]['updated_date']=$hvacData[$i]->updated_date;
		}
		return $result;

	}
	function getAHUData_vegas($data,$table){
		$date =date('Y-m-d');
		$result=array();
		$i1=0;
  		for ($i12=0; $i12 < count($data); $i12++) {
			$meter = "'".$data[$i12]->MeterName."'"; 
			// echo $meter;die();
			$query1 = "SELECT DISTINCT LocationName  FROM $table WHERE UtilityName=".$meter." and LocationName !='LT Room' ";
			// echo $query1;die();
    		$data_loc = $this->db->query($query1)->result_array();
			// echo json_encode($data_loc);die();
  			//$replaced = str_replace('_', ' ', $data[$i]['meter']);
			
       for ($k=0; $k < count($data_loc); $k++) { 
		$loc=$data_loc[$k]['LocationName'];
		$q_s="SELECT DISTINCT TxnTime as TxnTime FROM $table WHERE LocationName='".$loc."' and UtilityName=".$meter." ORDER BY TxnTime desc LIMIT 1;
		";
		$qsd=$this->db->query($q_s)->result();
		$ttime=$qsd[0]->TxnTime;
		$query="select id, LineConnected,LocationName,UomScale,TxnDate, TxnTime, CurReading,Consumption,UtilityName from (
			select id, LineConnected,TxnDate,TxnTime, CurReading,Consumption ,LocationName,UomScale,UtilityName from $table where
			 TxnDate='".$date."' and LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnTime>='".$ttime."'  order by id desc 
			) as sub where id=sub.id group by sub.LineConnected";
// echo $query;die();
        
		$hvacData = $this->db->query($query)->result();


    	if(count($hvacData)>0){


    // echo $hvacData[0]->UtilityName;die();
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
    		if($hvacData[$i]->LineConnected=='Delta T Air'){
    			$result[$i1]['Delta T Air']=$hvacData[$i]->Consumption."&deg;C";
    		}
			if($hvacData[$i]->LineConnected=='Delta T CW'){
    			$result[$i1]['Delta T CW']=$hvacData[$i]->Consumption."&deg;C";
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
    	$result[$i1]['Time']=$hvacData[0]->TxnTime;

    	$result[$i1]['LocationName']=$hvacData[0]->LocationName;
    	$result[$i1]['meter']=$data[$i12]->MeterName;
    	$result[$i1]['data']=1;

    	
    }else {
        $result[$i1]['meter']=$data[$i12]->MeterName;
        $result[$i1]['data']=0;
    	

    }
	$i1++;
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
	function getHavcList_vega($table){
    	
        $query = "SELECT DISTINCT UtilityName AS MeterName FROM $table WHERE MeterName='HVAC'";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
	function getActuatorReportVegas($data,$fromdate,$todate,$table_live,$table){
		
        $resultArray=array();
		$datefrom="'".$fromdate."'";
		$dateto="'".$todate."'";
		$i1=0;
  		for ($i12=0; $i12 < count($data); $i12++) {
			$meter = "'".$data[$i12]->MeterName."'"; 
			// echo $meter;die();
			$query1 = "SELECT DISTINCT LocationName  FROM $table WHERE UtilityName=".$meter." and LocationName !='LT Room'";
			// echo $query1;die();
    		$data_loc = $this->db->query($query1)->result_array();
			// echo json_encode($data_loc);die();
  			//$replaced = str_replace('_', ' ', $data[$i]['meter']);
			
       for ($k=0; $k < count($data_loc); $k++) { 
		$loc=$data_loc[$k]['LocationName'];
		
			
				 $queryactu="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate between ".$datefrom." and ".$dateto." and LineConnected='Actuator Level' ";
				 $queryactuFb="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate between ".$datefrom." and ".$dateto." and LineConnected='Actuator FB' ";
				
				 $fulldata=array();
			
				  $dataactu = $this->db->query($queryactu)->result();
				  $dataactufb = $this->db->query($queryactuFb)->result();
				  $resultArray[$i1]['actu']=$dataactu;
				  $resultArray[$i1]['actufb']=$dataactufb;
				  $resultArray[$i1]['meter']=$meter;
				  $resultArray[$i1]['location']=$loc;
	
	
			  
				  $i1++;
		
			
			
		}
	
}
// echo json_encode($resultArray);die();
return $resultArray;
		
    }
	function getahuReportVegas($data,$fromdate,$table_live,$table){
		
        $resultArray=array();
		$date="'".$fromdate."'";
		$i1=0;
  		for ($i12=0; $i12 < count($data); $i12++) {
			$meter = "'".$data[$i12]->MeterName."'"; 
			// echo $meter;die();
			$query1 = "SELECT DISTINCT LocationName  FROM $table WHERE UtilityName=".$meter." and LocationName !='LT Room'";
			// echo $query1;die();
    		$data_loc = $this->db->query($query1)->result_array();
			// echo json_encode($data_loc);die();
  			//$replaced = str_replace('_', ' ', $data[$i]['meter']);
			
       for ($k=0; $k < count($data_loc); $k++) { 
		$loc=$data_loc[$k]['LocationName'];
		if($fromdate>=date('Y-m-d')){
			$queryrat="SELECT TxnTime,CurReading FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Return Air Temp'";
			// echo $queryrat;die();
				$querysat="SELECT TxnTime,CurReading FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Supply Air Temp' ";    
				$queryrwt="SELECT TxnTime,CurReading FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='CHWR Temp'";
				 $queryswt="SELECT TxnTime,CurReading FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='CHWS Temp' ";
		
				 $queryactu="SELECT TxnTime,Consumption FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Actuator Level' ";
				 $querystmp="SELECT TxnTime,Consumption FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Set Temp' ";
				 $querypressure="SELECT TxnTime,Consumption FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Filter Pressure' ";
				 $querydeltaair="SELECT TxnTime,Consumption FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Delta T Air' ";
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
		
				   $queryrr="SELECT SUM(Consumption) as Consumption FROM $table_live where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Unit RHT'    and TxnTime BETWEEN '".$from."' AND '".$to."'";
				   
				   
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
				  $resultArray[$i1]['meter']=$meter;
				  $resultArray[$i1]['location']=$loc;
	
	
			  
				  $i1++;
		}else{

				$check=$this->check_ahu_data_vegas($fromdate,$loc,$data[$i12]->MeterName);
				if(count($check)==1){
					
					$resultArray[$i1]['rat']=unserialize($check[0]['rat']);
					$resultArray[$i1]['sat']=unserialize($check[0]['sat']);
					$resultArray[$i1]['rwt']=unserialize($check[0]['rwt']);
					$resultArray[$i1]['swt']=unserialize($check[0]['swt']);
					$resultArray[$i1]['actu']=unserialize($check[0]['actu']);
					$resultArray[$i1]['stemp']=unserialize($check[0]['stemp']);
					$resultArray[$i1]['pressure']=unserialize($check[0]['pressure']);
					$resultArray[$i1]['run']=unserialize($check[0]['run']);
					$resultArray[$i1]['deltaair']=unserialize($check[0]['deltaair']);
					$resultArray[$i1]['meter']=$data[$i12]->MeterName;
					$resultArray[$i1]['location']=$loc;
					$resultArray[$i1]['from']="db";
					$i1++;
				}else{
					$queryrat="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Return Air Temp'";
			//echo $queryrat;die();
				$querysat="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Supply Air Temp' ";    
				$queryrwt="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='CHWR Temp'";
				 $queryswt="SELECT TxnTime,CurReading FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='CHWS Temp' ";
		
				 $queryactu="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Actuator Level' ";
				 $querystmp="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Set Temp' ";
				 $querypressure="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Filter Pressure' ";
				 $querydeltaair="SELECT TxnTime,Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Delta T Air' ";
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
		
				   $queryrr="SELECT SUM(Consumption) as Consumption FROM $table where LocationName='".$loc."' and UtilityName=".$meter." and StationId='2022000313' and TxnDate=".$date." and LineConnected='Unit RHT'    and TxnTime BETWEEN '".$from."' AND '".$to."'";
				   
				   
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
				  $resultArray[$i1]['meter']=$meter;
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
					'meter_name'=>$data[$i12]->MeterName              
				);
				
				$this->db->insert('ahu_report_tbl_vegas', $voltage_array);
				// echo json_encode($voltage_array);die();
	
			  
				  $i1++;

				}
			   
		}
			
			
		}
	
}
// echo json_encode($resultArray);die();
return $resultArray;
		
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
		// echo $querywaterlevel."<br>";
			$data1 = $this->db->query($querywaterlevel)->result_array();
			$data2 = $this->db->query($querywaterlevel2)->result_array();
			$data3 = $this->db->query($querywaterlevelCurrent)->result_array();

			if($meters['LocationName']=='Fire Water Sump'){
				$capacity=334000;
				$resultArray['readings'][$i]['today_reading']=round(($data1[0]['CurReading']*1.30)/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round(($data3[0]['CurReading']*1.30)/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round(($data2[0]['CurReading']*1.30)/1000)." KL";
				$resultArray['readings'][$i]['filled']=round((($data1[0]['CurReading']*1.30)/$capacity)*100);
				$k=$k+round(($data1[0]['CurReading']*1.30)/1000);
				$cons=$cons+(round(($data1[0]['CurReading']*1.30)/1000)-round(($data2[0]['CurReading']*1.30)/1000));
				$yest=$yest+round(($data2[0]['CurReading']*1.30)/1000);
				$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}else if($meters['LocationName']=='Dom. Water Sump'){
				$capacity=521000;
				$resultArray['readings'][$i]['today_reading']=round(($data1[0]['CurReading']*3.05*0.79)/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round(($data3[0]['CurReading']*3.05*0.79)/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round(($data2[0]['CurReading']*3.05*0.79)/1000)." KL";
				$resultArray['readings'][$i]['filled']=round((($data1[0]['CurReading']*3.05*0.79)/$capacity)*100);
				$k=$k+round(($data1[0]['CurReading']*3.05*0.79)/1000);
				$cons=$cons+(round(($data1[0]['CurReading']*3.05*0.79)/1000)-round(($data2[0]['CurReading']*3.05*0.79)/1000));
				$yest=$yest+round(($data2[0]['CurReading']*3.05*0.79)/1000);
				$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}else if($meters['LocationName']=='Domestic Tank-A'){
				$capacity=148000;
				$resultArray['readings'][$i]['today_reading']=round(($data1[0]['CurReading']*0.22)/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round(($data3[0]['CurReading']*0.22)/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round(($data2[0]['CurReading']*0.22)/1000)." KL";
				$resultArray['readings'][$i]['filled']=round((($data1[0]['CurReading']*0.22)/$capacity)*100);
				$k=$k+round(($data1[0]['CurReading']*0.22)/1000);
				$cons=$cons+(round(($data1[0]['CurReading']*0.22)/1000)-round(($data2[0]['CurReading']*0.22)/1000));
				$yest=$yest+round(($data2[0]['CurReading']*0.22)/1000);
				$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}else if($meters['LocationName']=='Domestic Tank-B'){
				$capacity=148000;
				$resultArray['readings'][$i]['today_reading']=round(($data1[0]['CurReading']*0.471*2.15)/1000)." KL";
				$resultArray['readings'][$i]['curr_reading']=round(($data3[0]['CurReading']*0.471*2.15)/1000)." KL";
				$resultArray['readings'][$i]['yesterday_reading']=round(($data2[0]['CurReading']*0.471*2.15)/1000)." KL";
				$resultArray['readings'][$i]['filled']=round((($data1[0]['CurReading']*0.471*2.15)/$capacity)*100);
				$k=$k+round(($data1[0]['CurReading']*0.471*2.15)/1000);
				$cons=$cons+(round(($data1[0]['CurReading']*0.471*2.15)/1000)-round(($data2[0]['CurReading']*0.471*2.15)/1000));
				$yest=$yest+round(($data2[0]['CurReading']*0.471*2.15)/1000);
				$resultArray['readings'][$i]['tank_capacity']=round($capacity/1000)." KL";
			}else{
				$capacity=148000;
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
		// die();
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
		// echo json_encode($resultArray);die();
		

	}
	function get_meters_name_mumbai($table_name){
		$this->db->select('');
        $this->db->from($table_name);     
        $this->db->where('UtilityName','Water Monitor'); 
		$this->db->group_by('LocationName');
        $res = $this->db->get()->result_array(); 
	
        return $res;
	}
	
	
	function checkWaterData($location,$utility,$date){
		$this->db->select('*');
        $this->db->from('water_level_report_with_time_tbl');
		$this->db->where('utility_name',$utility);  
		
		$this->db->where('location_name',$location);
		$this->db->where('report_date',$date);
	   
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
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
			$check_today=$this->checkWaterData($meters['LocationName'],$meters['UtilityName'],$todayDate);
			$check_yesterday=$this->checkWaterData($meters['LocationName'],$meters['UtilityName'],$yesterDay);
		// print_r($check_today);die();
			if(count($check_today)==1 && count($check_yesterday)==1){
				if($meters['LocationName']=='Fire Water Sump'){
					$capacity=334000;						
					$k=$k+round(($check_today[0]['water_level']*1.33)/1000);
					$cons=$cons+(round(($check_today[0]['water_level']*1.33)/1000)-round(($check_yesterday[0]['water_level']*1.33)/1000));
					$yest=$yest+round(($check_yesterday[0]['water_level']*1.33)/1000);						
					$fire_open+=round(($check_yesterday[0]['water_level']*1.33)/1000);
					$fire_close+=round(($check_today[0]['water_level']*1.33)/1000);
				}else if($meters['LocationName']=='Dom. Water Sump'){
					$capacity=521000;					
					$k=$k+round(($check_today[0]['water_level']*3.05)/1000);
					$cons=$cons+(round(($check_today[0]['water_level']*3.05)/1000)-round(($check_yesterday[0]['water_level']*3.05)/1000));
					$yest=$yest+round(($check_yesterday[0]['water_level']*3.05)/1000);						
					$domestic_open+=round(($check_yesterday[0]['water_level']*3.05)/1000);
					$domestic_close+=round(($check_today[0]['water_level']*3.05)/1000);
				}else{
					$capacity=148000;						
					$k=$k+round($check_today[0]['water_level']/1000);
					$cons=$cons+(round($check_today[0]['water_level']/1000)-round($check_yesterday[0]['water_level']/1000));
					$yest=$yest+round($check_yesterday[0]['water_level']/1000);						
					$overhead_open+=round(($check_yesterday[0]['water_level'])/1000);
					$overhead_close+=round(($check_today[0]['water_level'])/1000);
				}
			}else{
				$querywaterlevel="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$todayDate."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."' AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";

				$querywaterlevel2="SELECT CurReading  FROM hardware_station_consumption_data_mumbai WHERE TxnDate='".$yesterDay."' AND `StationId`='".$meters['StationId']."' AND `UtilityName`='".$meters['UtilityName']."' AND `LocationName`='".$meters['LocationName']."'  AND TxnTime <= '".$time."'  ORDER BY TxnTime DESC limit 1";

				$data1 = $this->db->query($querywaterlevel)->result_array();
				$data2 = $this->db->query($querywaterlevel2)->result_array();					

				if($meters['LocationName']=='Fire Water Sump'){
					$capacity=334000;						
					$k=$k+round(($data1[0]['CurReading']*1.33)/1000);
					$cons=$cons+(round(($data1[0]['CurReading']*1.33)/1000)-round(($data2[0]['CurReading']*1.33)/1000));
					$yest=$yest+round(($data2[0]['CurReading']*1.33)/1000);						
					$fire_open+=round(($data2[0]['CurReading']*1.33)/1000);
					$fire_close+=round(($data1[0]['CurReading']*1.33)/1000);
				}else if($meters['LocationName']=='Dom. Water Sump'){
					$capacity=521000;					
					$k=$k+round(($data1[0]['CurReading']*3.05)/1000);
					$cons=$cons+(round(($data1[0]['CurReading']*3.05)/1000)-round(($data2[0]['CurReading']*3.05)/1000));
					$yest=$yest+round(($data2[0]['CurReading']*3.05)/1000);						
					$domestic_open+=round(($data2[0]['CurReading']*3.05)/1000);
					$domestic_close+=round(($data1[0]['CurReading']*3.05)/1000);
				}else{
					$capacity=148000;						
					$k=$k+round($data1[0]['CurReading']/1000);
					$cons=$cons+(round($data1[0]['CurReading']/1000)-round($data2[0]['CurReading']/1000));
					$yest=$yest+round($data2[0]['CurReading']/1000);						
					$overhead_open+=round(($data2[0]['CurReading'])/1000);
					$overhead_close+=round(($data1[0]['CurReading'])/1000);
				}
				
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
				// echo "yest ".$yest." To ".$k."intake ".$intake;die();
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