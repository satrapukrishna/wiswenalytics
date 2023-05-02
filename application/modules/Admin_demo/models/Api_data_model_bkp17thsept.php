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
			$multipier=100;
		}
		
		$table_name=$this->get_table_name($station_id);
		//$todayDate="2021-09-06";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$weekday = date('Y-m-d',strtotime("-6 days"));
		
		$check=$this->Api_data_model->check_hardware_data($utilityName,$table_name);
		if($check){
			$resdata['meter']=$dashboardName;
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		
		$datacontoday = $this->db->query($queryconsutoday)->result();
		

		$queryconsuyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$yesterDay."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";

		$queryconsuweek="SELECT round(SUM(Consumption)/7) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate between '".$weekday."' AND '".$todayDate."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		//echo $queryconsuweek;die();
		$dataconyest = $this->db->query($queryconsuyest)->result();
		$dataconweek = $this->db->query($queryconsuweek)->result();

		$resdata['todayconsumption']=round(($datacontoday[0]->cons*$multipier)/1000,2);
		$resdata['yesterdayconsumption']=round(($dataconyest[0]->cons*$multipier)/1000,2);
		$resdata['weeklyavg']=round(($dataconweek[0]->cons*$multipier)/1000,2);
		$resdata['status']=1;

		

		}else{
			$resdata['meter']=$dashboardName;
			$resdata['todayconsumption']="NA";
			$resdata['yesterdayconsumption']="NA";
			$resdata['weeklyavg']="NA";
			$resdata['status']=0;
		}

		return $resdata;
	}
	function get_hardwares_device_data_energy_meters($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		
		$meter_list=$this->get_energymeter_list($table_name);
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$weekday = date('Y-m-d',strtotime("-7 days"));
		//print_r($meter_list);die();
		$i=0;
		foreach($meter_list as $meters){
			$enquery="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdata = $this->db->query($enquery)->result_array();

				$enqueryyest="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$yesterDay."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enquery;die();
				$consdatayest = $this->db->query($enqueryyest)->result_array();

				$enqueryavg="SELECT SUM(Consumption)/7 as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate` between '".$weekday."' AND '".$todayDate."' AND LineConnected='kWh'	ORDER BY TxnTime";
			//echo $enqueryavg;die();
				$consdataavg = $this->db->query($enqueryavg)->result_array();

				$resdata[$i]['meter']=$meters['LocationName'];
				$resdata[$i]['todaycons']=round($consdata[0]['cons'],2);
				$resdata[$i]['yestcons']=round($consdatayest[0]['cons'],2);
				$resdata[$i]['avgcons']=round($consdataavg[0]['cons'],2);

			$i++;

		}
		//echo json_encode($resdata);die();
		return $resdata;

	}
	function get_hardwares_device_data_waterlevelmeter_report($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		
		$dashboardName=$data['dashboard_name'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		
		$table_name=$this->get_table_name($station_id);
		$check=$this->Api_data_model->check_data($utilityName,$table_name);
		//echo $check;die();
		if($check){
			
		$querywaterlevel="SELECT round(`CurReading`/1000,2) as level,concat(`TxnDate`,' ',`TxnTime`)as time FROM $table_name WHERE `TxnDate`  BETWEEN '".$fromdate."' AND '".$todate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnDate ASC,TxnTime ASC";
		
		//echo $querywaterlevel;
		$datawaterlevel = $this->db->query($querywaterlevel)->result();
		//$waterlevel=$datawaterlevel[0]->CurReading;

		$resdata['meter']=$dashboardName;
		$resdata['leveldata']=$datawaterlevel;
		

		

		}else{
			$resdata['meter']=$dashboardName;
			$resdata['leveldata']=array();
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
	function get_hardwares_device_data_waterlevelmeter($data){
		 //print_r($data);die();
		$station_id=$data['station_id'];
		$table_name=$this->get_table_name($station_id);
		//echo $table_name;die();
		$hardware_name=$data['api_name'];
		$dashboardName=$data['dashboard_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$capacity=$data['capacity'];
		$todayDate=date("Y-m-d");
		
		
		if($hardware_name=='Fire-1'){
		$resdata['meter']=$dashboardName;
		$resdata['capacity']=350;
		$resdata['currentlevel']=340;
		$resdata['filledpercent']=round((340/350)*100,2);
		$resdata['filledpercent_1']=round((340/350)*100);
		}else if($hardware_name=='Fire-2'){
			$resdata['meter']=$dashboardName;
		$resdata['capacity']=350;
		$resdata['currentlevel']=320;
		$resdata['filledpercent']=round((320/350)*100,2);
		$resdata['filledpercent_1']=round((320/350)*100);
		}else if($hardware_name=='Fire-3'){
			$resdata['meter']=$dashboardName;
		$resdata['capacity']=350;
		$resdata['currentlevel']=330;
		$resdata['filledpercent']=round((335/350)*100,2);
		$resdata['filledpercent_1']=round((335/350)*100);
		}else{
			$querywaterlevel="SELECT `CurReading` FROM $table_name WHERE `TxnDate` ='".$todayDate."' AND `StationId`='".$station_id."' AND `UtilityName`='".$utilityName."' AND `LocationName`='".$locationName."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $querywaterlevel;die();
		$datawaterlevel = $this->db->query($querywaterlevel)->result();
		$waterlevel=$datawaterlevel[0]->CurReading;

		$resdata['meter']=$dashboardName;
		$resdata['capacity']=round($capacity/1000);
		$resdata['currentlevel']=round($waterlevel/1000,2);
		$resdata['filledpercent']=round(($waterlevel/$capacity)*100,2);
		$resdata['filledpercent_1']=round(($waterlevel/$capacity)*100);
		}
			
		

		

//echo json_encode($resdata);die();
		return $resdata;

	}
	function get_hardwares_device_data_dg_report($data,$fromdate,$todate){
		
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
                
        for ($k=0; $k < count($datesarray); $k++)
        { 
			$check=$this->Api_data_model->check_data($hardware_name,$table_name);
		if($check){
			$startEndFuelQuery="SELECT 
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Level' AND UtilityName='".$hardware_name."' ORDER BY TxnTime LIMIT 1) as 'start',
		(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND UtilityName='".$hardware_name."' AND LineConnected='Fuel Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
		$dataStartEndFuel = $this->db->query($startEndFuelQuery)->result();
		//echo json_encode($dataStartEndFuel[0]->start);die();
		$queryRunn="SELECT SUM(Consumption) as run FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='DG_Running_Time'";
		$dataRunn = $this->db->query($queryRunn)->result();
		$resdata[$k]['run']=floor($dataRunn[0]->run / 60).':'.($dataRunn[0]->run -   floor($dataRunn[0]->run / 60) * 60);
		$resdata[$k]['run1']=(int)$dataRunn[0]->run;
		
		$queryFadd="SELECT SUM(Consumption) as fadd FROM $table_name WHERE UtilityName='".$hardware_name."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='Fuel Filled'";
		
		$dataAdd = $this->db->query($queryFadd)->result();
		$resdata[$k]['fadd']=(float)$dataAdd[0]->fadd;


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

		$resdata[$k]['fremove']=$fremove;
		$resdata[$k]['fconsume1']=round($dataStartEndFuel[0]->start+$resdata[$k]['fadd']-$dataStartEndFuel[0]->end-$resdata[$k]['fremove'],2);
		//$resdata[$k]['krish']=$dataRunn[0]->run;
		if($resdata[$k]['fconsume1'] <= 0 || $dataRunn[0]->run==0){
			$finaleco =0;
			$resdata[$k]['fconsume']=0;
			//return 0;
		}
		else{
			$resdata[$k]['fconsume']=$resdata[$k]['fconsume1'];
			$rs = explode(":", $resdata[$k]['run']);
			//print_r($rs);
			$hrs = $rs[0];
			$mins = $rs[1];
			$total_mins = ($hrs*60)+$mins;
			if($total_mins != 0){
				$eco = ($resdata[$k]['fconsume']/$total_mins)*60;
			}
			else{
				$eco = 0;
			}
			//echo "<br>".$eco."<br>";
			$finaleco= round($eco,2);
			
		}
		
		$resdata[$k]['economy']=$finaleco;
		$resdata[$k]['availableFuel']=$dataStartEndFuel[0]->end;

		$queryVoltage="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataVoltage = $this->db->query($queryVoltage)->result();

		$resdata[$k]['voltage']=$dataVoltage[0]->Consumption;

		$queryStatus="SELECT Consumption FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Battery' AND UtilityName='".$hardware_name."' ORDER BY TxnTime DESC LIMIT 1";
		//echo $queryRuntimes;die();
		$dataStatus = $this->db->query($queryStatus)->result();
        if($dataStatus[0]->Consumption==1){
			$status="ON";
		}else{
			$status="OFF";
		}
		$resdata[$k]['status']=$status;
		$resdata[$k]['dgname']=$hardware_name;
		
		$resdata[$k]['date']=$datesarray[$k];
		}else{
			$resdata[$k]['run']="NA";
			$resdata[$k]['fadd']="NA";
			$resdata[$k]['fremove']="NA";
			$resdata[$k]['fconsume']="NA";
			$resdata[$k]['economy']="NA";
			$resdata[$k]['availableFuel']="NA";
			$resdata[$k]['voltage']="NA";
			$resdata[$k]['status']="NA";
			$resdata[$k]['dgname']=$hardware_name;
			$resdata[$k]['date']=$datesarray[$k];


			}

		}
		
		return $resdata;
		
	}
	
	function get_hardwares_device_data_flowmeter_report($data,$fromdate,$todate){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$utilityName=$data['UtilityName'];
		$LocationName=$data['LocationName'];
		//echo $fromdate;die();
		$dashboardName=$data['dashboard_name'];
		$date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		$table_name=$this->get_table_name($station_id);
		if($station_id==2021000046){
			$multipier=1;
		}else{
			$multipier=100;
		}
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
                
        for ($k=0; $k < count($datesarray); $k++)
        { 
			$check=$this->Api_data_model->check_data($utilityName,$table_name);
		if($check){
			$resdata[$k]['meter']=$dashboardName;
			$queryconsutoday="SELECT round(SUM(Consumption)/1000,2) as cons FROM $table_name WHERE UtilityName='".$utilityName."' AND TxnDate='".$datesarray[$k]."' AND LineConnected='".$lineconnected."' AND LocationName='".$LocationName."'";
		
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata[$k]['consumption']=(float)$datacontoday[0]->cons*$multipier;

			$resdata[$k]['date']=$datesarray[$k];
		

		

		}else{
			$resdata[$k]['meter']=$dashboardName;
			$resdata[$k]['consumption']="NA";
			$resdata[$k]['date']=$datesarray[$k];
			
		}
		}
		

		return $resdata;
	}
	function get_hardwares_device_data_energymeter_report($data,$fromdate,$todate){
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

		
        for ($k=0; $k < count($datesarray); $k++)
        { 
			
			$resdata[$i][$k]['meter']=$meters['LocationName'];
			$queryconsutoday="SELECT SUM(Consumption) as cons FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$datesarray[$k]."' AND LineConnected='kWh'	ORDER BY TxnTime";
			
			
			$datacontoday = $this->db->query($queryconsutoday)->result();
			$resdata[$i][$k]['consumption']=(float)$datacontoday[0]->cons;

			$resdata[$i][$k]['date']=$datesarray[$k];
		

		

		
		}
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
				$mcboff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb-Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcboffdata = $this->db->query($mcboff)->result_array();

				$mcbon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb On' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbondata = $this->db->query($mcbon)->result_array();
				
				$mcbtrip="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Mcb Trip' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$mcbtripdata = $this->db->query($mcbtrip)->result_array();
				
				$yphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Y-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$yphasedata = $this->db->query($yphase)->result_array();
				
				$rphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='R-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$rphasedata = $this->db->query($rphase)->result_array();
				//echo $rphasedata[0]['CurReading'];die();
				$bphase="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='B-Phase' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$bphasedata = $this->db->query($bphase)->result_array();

				$resdata[$i]['meter']=$meters['LocationName'];
				

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
				$poff="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power Off' and MeterName='Status Monitor'	ORDER BY TxnTime DESC LIMIT 1";
				$poffdata = $this->db->query($poff)->result_array();

				$pon="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Power On' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
				$pondata = $this->db->query($pon)->result_array();

				$trip="SELECT `CurReading` FROM $table_name WHERE `LocationName`='".$meters['LocationName']."' AND `TxnDate`='".$todayDate."' AND LineConnected='Trip' and MeterName='Status Monitor' ORDER BY TxnTime DESC LIMIT 1";
				$tripdata = $this->db->query($trip)->result_array();
			//echo "Meter:".$meters['LocationName']." poff:".$poffdata[0]['CurReading']." pon:".$pondata[0]['CurReading']."<br>";
				$resdata[$i]['meter']=$meters['LocationName'];
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
	function get_hardwares_device_data_switch_control($data){
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		//$todayDate="2021-08-20";
		$table_name=$this->get_table_name($station_id);
		$check=$this->Api_data_model->check_data($hardware_name,$table_name);
		if($check){
			$resdata['status']='NA';			
			$resdata['onhours']='NA';
			$resdata['offhours']='NA';
			$resdata['meter']=$hardware_name;

		}else{
			$resdata['status']='NA';			
			$resdata['onhours']='NA';
			$resdata['offhours']='NA';
			$resdata['meter']=$hardware_name;
		}
		return $resdata;
	}
	function get_hardwares_device_data($data){
		
		$station_id=$data['station_id'];
		$hardware_name=$data['api_name'];
		$lineconnected=$data['LineConnected'];
		$todayDate=date("Y-m-d");
		$table_name=$this->get_table_name($station_id);
		//$todayDate="2021-08-20";

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
		$resdata['filledper']=round(($dataStartEndFuel[0]->end/500)*100);

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
	function get_water_readings(){
		   //$this->db->select('wmr.*,concat(e.firstname,' ',e.lastname) as emp_name');
		   
		   $this->db->select('wmr.*,e.firstname,e.lastname');
			$this->db->from('water_meter_readings as wmr');
			$this->db->where('wmr.emp_id', $this->session->userdata('user_id'));
			$this->db->join('employees as e', 'e.emp_id=wmr.emp_id','left');			
			$this->db->group_by('wmr.meter_id');
			$res = $this->db->get()->result_array();
			//echo $this->db->last_query();exit;
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
				$resultArray[$i]['emp_name']=$res[$i]['firstname']." ".$res[$i]['lastname'];
				if(count($data1)>0)	{				
					
				    $resultArray[$i]['today_reading']=$data1[0]['meter_reading'];
					$resultArray[$i]['today_reading_photo']=$data1[0]['meter_photo'];
					$resultArray[$i]['time']=date('h:i A',strtotime($data1[0]['created_date']));
					

				}else{
					$resultArray[$i]['today_reading']="NA";
					$resultArray[$i]['today_reading_photo']="NA";
					$resultArray[$i]['time']="NA";
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