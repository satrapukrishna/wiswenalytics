<?php
class Api_data_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function get_categories(){
		$this->db->select('');
        $this->db->from('hardware_category');     
        $this->db->where('status',1);     
		
        // $this->db->where('created_by',$this->session->userdata('user_id'));       
        //$this->db->order_by('category_name');
        $res = $this->db->get()->result_array();       
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
        return $res;
	}
	function get_hardwares_device_list(){
		$this->db->select('h.hardware_device');
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
            $query="SELECT PrvReading,CurReading,Consumption,TxnDate,TxnTime FROM hardware_station_consumption_data where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            
			
            $data = $this->db->query($query)->result();
			// ECHO $this->db->last_query();exit;
            $query1="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'";
            $data1 = $this->db->query($query1)->result();
			
			// ECHO $this->db->last_query();exit;
           
            //yesterday
            $query2="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$yesterDay."'";
            $data2 = $this->db->query($query2)->result();
             
            //lastweek
            $query3="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$locations[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' and Consumption<20";
           
            $data3 = $this->db->query($query3)->result();
           
              $queryautosjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data where LineConnected='".$locations[$i]->LineConnectedAuto."' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
			  
			  
            $querymanualsjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data where LineConnected='".$locations[$i]->LineConnectedManual."' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
			
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
      // $todayDate=date('Y-m-d');
      $todayDate=date('2020-07-15');
      $querypressure="SELECT round(CurReading*0.076,2) as CurReading,TxnTime  FROM hardware_station_consumption_data where LineConnected='".$LineConnected."' AND TxnDate='".$todayDate."' and StationId='".$this->session->userdata('station_id')."' order by TxnTime";
        $datapressure = $this->db->query($querypressure)->result();
		 // echo $this->db->last_query();exit; 
        return $datapressure;
    }
	
	function getWaterLevel($api_name){
    	
    	$todayDate=date('2020-07-15');
		
        $query="select id, LocationName as UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (
        select id, LocationName,TxnDate, FromTime, ToTime, Consumption ,UomScale from hardware_station_consumption_data where
         TxnDate=".$todayDate."  and StationId='".$this->session->userdata('station_id')."' and LocationName='".$api_name."'  order by ToTime desc ) as sub where id=sub.id group by sub.LocationName limit 1";
        //echo $query;
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
	
	
}