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
	function get_client($id)
    {        
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_id', $id);
        $user = $this->db->get()->row_array();
        return $user;
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
        $res = $this->db->get();               
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
				
                $resultArray['SwitchStatus']='NA';
				
			   
				
				$resultArray['meter']=$api_name;
				$resultArray['RunningStatus']=2;
				// $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
				
				$resultArray['TodayRunn']="NA";
				$resultArray['YesterdayRunn']="NA";
				$resultArray['LastWeekRunn']="NA";
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
		// echo $this->db->last_query();exit;
    	return $data;

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
	
}