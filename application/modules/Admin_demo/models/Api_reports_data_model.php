<?php
class Api_reports_data_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function get_device($device){
		$this->db->select('');
           
        $this->db->from('hardware_device');
		
		$this->db->where('device_id', $device);
        
        $page = $this->db->get()->row_array();
        return $page;
	}
	function get_hardwares($device){
		$this->db->select('h.*,hd.device_name');
        $this->db->from('hardware h');        
        $this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		if ($device != ''){
            $this->db->where('h.hardware_device', $device);
        }
		// if($this->session->userdata('role')=='admins'){
		// $this->db->where('client_id',$this->session->userdata('user_id'));
		// }elseif($this->session->userdata('role')=='employee'){
			 $this->db->where('client_id',$this->session->userdata('created_by'));
		// }
		$this->db->where('h.status', 1);
        // $this->db->order_by('hardware_id','desc');
        $res = $this->db->get()->result_array();             
        return $res;
	}
	
	function get_firepump($pump_type){
		$this->db->select('f.*');
        $this->db->from('firepump f');        
       
		if ($pump_type != ''){
            $this->db->where('f.pump_type', $pump_type);
        }
		
			 $this->db->where('client_id',$this->session->userdata('created_by'));
		
		$this->db->where('f.status', 1);
        // $this->db->order_by('hardware_id','desc');
        $res = $this->db->get()->result_array();             
        return $res;
	}
	
	function getChillerReportData($data)
	{
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    $fromtime = "'".$data['fromtime']."'";
    $totime = "'".$data['totime']."'";
    $meter = $data['multiMeter'];
    $fulldata=array();
    if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From')
    {
      // echo  "sss";
      $date = "'".$data['fromdate']."'";
      // echo $date;
      for ($i=0; $i < 24; $i++) 
      {
        $tt=0 ;
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
        $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";
        //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
        $data1D = $this->db->query($queryD)->result();
		// echo $this->db->last_query();exit;
        //echo count($data1D);
        // print_r($data1D);
        $rmin=0;
        if(count($data1D)!=0)
        {
          if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1)
          {
            //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
            $checkTime = strtotime($data1D[0]->ToTime);
                
            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));
            //echo abs($diff)."<br>";

          }
          else
          {
            //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
            $checkTime = strtotime($data1D[0]->FromTime);
            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));
            // echo abs($diff)."<br>";
          }
                                               
        }

        else
        {
          $rmin="0";
        }
        
     
        if(abs($diff)>3600)
        {
          $diff=3599;
        }
        $tt=gmdate("i", abs($diff));
        if($tt>54){
          $tt="60";
        }
        $fulldata[$i]['Time']=$from." To ".$to;
        $fulldata[$i]['Meter']=$meter;
        $fulldata[$i]['runninghrs']=$tt;
      }
            
      return $fulldata;        
    }
    else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
        // echo "ff";exit;
        $date = "'".$data['fromdate']."'";
        $t=explode(':', $data['totime']);
        $t1=explode(':', $data['fromtime']);
        $kt=0;
        for ($i=$t1[0]; $i < $t[0]; $i++) 
        { 
          $tt=0 ;
          $diff=0;
          $from =  $i.":00:00";
          $to =  ($i+1).":00:00";            
                
         
         
          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";
          //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
          $data1D = $this->db->query($queryD)->result();
		  // echo $this->db->last_query();exit;
          //echo count($data1D);
          // print_r($data1D);
          $rmin=0;
          if(count($data1D)!=0)
          {
            if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1)
            {
              //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
              $checkTime = strtotime($data1D[0]->ToTime);
              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
              $diff = $checkTime - $loginTime;
              $rmin=gmdate("i", abs($diff));
              //echo abs($diff)."<br>";

            }
            else
            {
              //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
              $checkTime = strtotime($data1D[0]->FromTime);

              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
              $diff = $checkTime - $loginTime;
              $rmin=gmdate("i", abs($diff));
              // echo abs($diff)."<br>";
            }
                                                  
          }
          else
          {
            $rmin="0";
          }
                        
          if(abs($diff)>3600){
            $diff=3599;
          }
          $tt=gmdate("i", abs($diff));
          if($tt>54){
            $tt="60";
          }

          $fulldata[$kt]['Time']=$from." To ".$to;
          $fulldata[$kt]['Meter']=$meter;
          $fulldata[$kt]['runninghrs']=$tt;
          $kt++;
        }
      
      return $fulldata;
    }
    else
    {
		
      if($data['fromtime']!='Select Hours From')
      {
		  // echo "aaa";exit;
        $date_from = strtotime($data['fromdate']); 
        $date_to = strtotime($data['todate']); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
                
        for ($k=0; $k < count($datesarray); $k++)
        { 
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

            $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";
  
            $data1D = $this->db->query($queryD)->result();
			// echo $this->db->last_query();exit;
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

            if(abs($diff)>3600)
            {
              $diff=3599;
            }
            $tt=gmdate("i", abs($diff));
            if($tt>54)
            {
              $tt=60;
            }
            //echo $tt."<br>";
            $tsh+=$tt;
                                
          }
          $fulldata[$k]['Time']=$datesarray[$k];
          $fulldata[$k]['Meter']=$meter;
          $fulldata[$k]['runninghrs']=$tsh;

        }
        return $fulldata;

      }
      else
      {
		  // echo "bbb";exit;
        $date_from = strtotime($data['fromdate']); 
        $date_to = strtotime($data['todate']); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) 
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
        for($k=0; $k < count($datesarray); $k++) 
        { 
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
            $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";

            $data1D = $this->db->query($queryD)->result();
			// echo $this->db->last_query();exit;
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

            if(abs($diff)>3600)
            {
              $diff=3599;
            }
            $tt=gmdate("i", abs($diff));
            if($tt>54)
            {
              $tt=60;
            }
            //echo $tt."<br>";
            $tsh+=$tt;
          }
          $fulldata[$k]['Time']=$datesarray[$k];
          $fulldata[$k]['Meter']=$meter;
          $fulldata[$k]['runninghrs']=$tsh;

        }
                                                  
        return $fulldata;
      }

    
    }
    
	}
	function firedgdata($data){
    $station_id=$this->session->userdata('station_id');
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
     for ($k=0; $k < count($datesarray); $k++) { 
    
      
      
     // $firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'";
      
    //$runn = $this->db->query($firepump)->result();
    
    $fulldata[$k]['meter']='Diesel Generator';
     $fulldata[$k]['day']=1;
    $fulldata[$k]['date']=$datesarray[$k];                                
    $fulldata[$k]['RunningHours']=0;
    

    }
    
        
    return $fulldata;

  }
  function alertdata($data){
    $station_id=$this->session->userdata('station_id');
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
     for ($k=0; $k < count($datesarray); $k++) { 
    
      
      
     // $firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'";
      
    //$runn = $this->db->query($firepump)->result();
    
    //$fulldata[$k]['meter']='Diesel Generator';
     
    $fulldata[$k]['date']=$datesarray[$k];                                
    //$fulldata[$k]['fadd']=0;
    

    }
    
      // print_r($fulldata);die();  
    return $fulldata;
  }
  function firedgfadddata($data){
    $station_id=$this->session->userdata('station_id');
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
     for ($k=0; $k < count($datesarray); $k++) { 
    
      
      
     // $firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'";
      
    //$runn = $this->db->query($firepump)->result();
    
    $fulldata[$k]['meter']='Diesel Generator';
     
    $fulldata[$k]['date']=$datesarray[$k];                                
    $fulldata[$k]['fadd']=0;
    

    }
    
      // print_r($fulldata);die();  
    return $fulldata;

  }
	function firePumpRunnDataAll($data,$meters){
	
	if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
		
	$station_id=$this->session->userdata('station_id');
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
		array_push($datesarray, date("Y-m-d",$i1));

    }
     for ($k=0; $k < count($datesarray); $k++) { 
    
    for ($i=0; $i <count($meters); $i++) { 
    //echo   ; 
      
      $firepump = "SELECT SUM(Consumption) as Consumption FROM ".$table." where UtilityName='".$meters[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'";
      
    $runn = $this->db->query($firepump)->result();
    
    
    
    if($runn[0]->Consumption==null){
    $runn[0]->Consumption=0;
    }
    $fulldata[$k][$i]['meter']=$meters[$i]->api_name;
     $fulldata[$k][$i]['day']=1;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }
    
        
    return $fulldata;
  //   if($data['fromdate'] == $data['todate'] )
  //   {
      

  //     for ($k=0; $k <count($meters); $k++) { 
  //   //echo   ; 
  //       for ($i=0; $i < 24; $i++) 
  //           {
  //             $tt=0 ;
  //             $diff=0;
  //             if($i>9)
  //             {
  //               $from =  $i.":00:00";
  //               $to =  ($i+1).":00:00";     
  //             }
  //             else
  //             {
  //               $from =  "0".$i.":00:00";
  //               $to =  "0".($i+1).":00:00"; 
  //             }


  //             $firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$k]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$date_from."' and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            
  //             $runn = $this->db->query($firepump)->result();
          
          
          
  //             if($runn[0]->Consumption==null){
  //             $runn[0]->Consumption=0;
  //             }
  //             $fulldata[$k][$i]['meter']=$meters[$i]->api_name;
  //             $fulldata[$k][$i]['day']=0;
  //             $fulldata[$k][$i]['date']=$from." To ".$to;                                
  //             $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
  //         }

  //     }

      
      




  //   }else{
  //     for ($k=0; $k < count($datesarray); $k++) { 
    
  //   for ($i=0; $i <count($meters); $i++) { 
  //   //echo   ; 
      
  //     $firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$i]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$k]."'";
      
  //   $runn = $this->db->query($firepump)->result();
    
    
    
  //   if($runn[0]->Consumption==null){
  //   $runn[0]->Consumption=0;
  //   }
  //   $fulldata[$k][$i]['meter']=$meters[$i]->api_name;
  //    $fulldata[$k][$i]['day']=1;
  //   $fulldata[$k][$i]['date']=$datesarray[$k];                                
  //   $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
  //   }

  //   }
  //   }
        
		// return $fulldata;
	}
	
	function firePumpLinepressureData($data){
		if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
		
		$station_id=$this->session->userdata('station_id');
		$date_from = $data['fromdate']; 
		$date_to = $data['todate'];

		$firepump = "SELECT TxnTime,TxnDate,Consumption FROM ".$table." where TxnDate between '".$date_from."' and '".$date_to."' and LineConnected='Pressure' and UtilityName='Hydrant Pressure'  and StationId='".$station_id."' order by Id ASC";
      
		$runn = $this->db->query($firepump)->result_array();
		// echo $this->db->last_query();exit;
		// echo "<pre>";print_r($runn);exit;
		return $runn;
	}
	function firePumpGraphDataAll($data,$meters){
    // print_r($meters);
    $station_id=$this->session->userdata('station_id');
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($meters); $k++) { 
    
    for ($i=0; $i <count($datesarray); $i++) { 
    //echo   ; 
      
      $firepump = "SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data where UtilityName='".$meters[$k]->api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$datesarray[$i]."'";
      // echo $firepump;die();
    $runn = $this->db->query($firepump)->result();
    
    
    
    if($runn[0]->Consumption==null){
    $runn[0]->Consumption=0;
    }
    $fulldata[$k][$i]['meter']=$meters[$k]->api_name;
    $fulldata[$k][$i]['date']=$datesarray[$i];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    $fulldata[$k][$i]['id']=preg_replace("/\s+/", "", $meters[$k]->api_name);
    }

    }    
    return $fulldata;
  }
  function firePumpPressureGraphDataAll($data,$meters){
    $station_id=$this->session->userdata('station_id');
    $date_from = $data['fromdate']; 
    
 for ($k=0; $k < count($meters); $k++) { 
      $querypressure="SELECT round(CurReading*0.076,2) as CurReading,TxnTime  FROM hardware_station_consumption_data where LineConnected='".$meters[$k]->api_name."' AND TxnDate='".$date_from."' and StationId='".$station_id."'  order by TxnTime";
      // echo $querypressure;die();
        $datapressure = $this->db->query($querypressure)->result();
        $result[$k]['pdata']=$datapressure;
        $result[$k]['meter']=$meters[$k]->api_name;
      }
return $result;
  }
  function firePumpPressureGraphDataAllTest(){
    $station_id='2020000005';
    $date_from = '2020-07-11'; 
    
	 for ($k=0; $k < 1; $k++) { 
		  $querypressure="SELECT round(CurReading*0.076,2) as CurReading,TxnTime  FROM hardware_station_consumption_data where LineConnected='Pressure' AND TxnDate='".$date_from."' and StationId='".$station_id."'  order by TxnTime";
		  // echo $querypressure;die();
			$datapressure = $this->db->query($querypressure)->result();
			$result[$k]['pdata']=$datapressure;
			$result[$k]['meter']='Pressure';
		  }
	return $result;
	}
  
	function getwaterlevelreport($data)
	{
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    $fromtime = "'".$data['fromtime']."'";
    $totime = "'".$data['totime']."'";
    $meter = $data['hardware_name'];
	// echo "<pre>";print_r($data);exit;
	if($this->session->userdata('created_by')==10){
			$table="hardware_station_consumption_data_myhome";
		}else if($this->session->userdata('created_by')==17){
			$table="hardware_station_consumption_data_jll";
		}else if($this->session->userdata('created_by')==9){
			$table="hardware_station_consumption_data_cbre";
		}
		
		// echo $table;exit;
		
    $fulldata=array();
    if(	($data['fromdate'] == $data['todate']) && ($data['fromtime']==0))
    {
      // echo  "sss";exit;
      $date = "'".$data['fromdate']."'";
      // echo $date;
      for ($i=0; $i < 24; $i++) 
      {
        $tt=0 ;
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
        $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime,Consumption ,UomScale,Multiplier  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";
        //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
        $data1D = $this->db->query($queryD)->result();
		// echo $this->db->last_query();exit;
        //echo count($data1D);
        // print_r($data1D);
        $rmin=0;
        if(count($data1D)!=0)
        {
          if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1)
          {
            //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
            $checkTime = strtotime($data1D[0]->ToTime);
                
            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));
            //echo abs($diff)."<br>";

          }
          else
          {
            //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
            $checkTime = strtotime($data1D[0]->FromTime);
            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));
            // echo abs($diff)."<br>";
          }
                                               
        }

        else
        {
          $rmin="0";
        }
        
     
        if(abs($diff)>3600)
        {
          $diff=3599;
        }
        $tt=gmdate("i", abs($diff));
        if($tt>54){
          $tt="60";
        }
        $fulldata[$i]['Time']=$from." To ".$to;
        $fulldata[$i]['Meter']=$meter;
        $fulldata[$i]['runninghrs']=$tt;
        //$fulldata[$i]['Consumption']=$tt;
		$fulldata[$i]['Current_capacity']=$data1D[0]->Consumption*$data1D[0]->Multiplier%1000;

      }
            
      return $fulldata;        
    }
    else if($data['fromdate'] == $data['todate'] && $data['fromtime']!=0){
        // echo "ff";exit;
        $date = "'".$data['fromdate']."'";
        $t=explode(':', $data['totime']);
        $t1=explode(':', $data['fromtime']);
        $kt=0;
        for ($i=$t1[0]; $i < $t[0]; $i++) 
        { 
          $tt=0 ;
          $diff=0;
          $from =  $i.":00:00";
          $to =  ($i+1).":00:00";            
                
          // $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
          //     $data1 = $this->db->query($query1)->result();
          //         $fulldata[$kt]['Time']=$from." To ".$to;
          //         $fulldata[$kt]['Meter']='Chiller_4';
          //         $fulldata[$kt]['runninghrs']=$data1[0]->Consumption;
         
          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime,Consumption ,UomScale,Multiplier  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";
          //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
          $data1D = $this->db->query($queryD)->result();
		  // echo $this->db->last_query();exit;
          //echo count($data1D);
          // print_r($data1D);
          $rmin=0;
          if(count($data1D)!=0)
          {
            if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1)
            {
              //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
              $checkTime = strtotime($data1D[0]->ToTime);
              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
              $diff = $checkTime - $loginTime;
              $rmin=gmdate("i", abs($diff));
              //echo abs($diff)."<br>";

            }
            else
            {
              //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
              $checkTime = strtotime($data1D[0]->FromTime);

              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
              $diff = $checkTime - $loginTime;
              $rmin=gmdate("i", abs($diff));
              // echo abs($diff)."<br>";
            }
                                                  
          }
          else
          {
            $rmin="0";
          }
                        
          if(abs($diff)>3600){
            $diff=3599;
          }
          $tt=gmdate("i", abs($diff));
          if($tt>54){
            $tt="60";
          }

          $fulldata[$kt]['Time']=$from." To ".$to;
          $fulldata[$kt]['Meter']=$meter;
          $fulldata[$kt]['runninghrs']=$tt;
		  $fulldata[$kt]['Current_capacity']=$data1D[0]->Consumption*$data1D[0]->Multiplier%1000;

          $kt++;
        }
      
      return $fulldata;
    }
    else
    {
		
      if($data['fromtime']!=0)
      {
		  // echo "aaa";exit;
        $date_from = strtotime($data['fromdate']); 
        $date_to = strtotime($data['todate']); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
                
        for ($k=0; $k < count($datesarray); $k++)
        { 
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

            $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime,Consumption,UomScale,Multiplier  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND ToTime BETWEEN '".$from."' AND '".$to."' order by FromTime";
  
            $data1D = $this->db->query($queryD)->result();
			// echo $this->db->last_query();echo "<br/>";
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

            if(abs($diff)>3600)
            {
              $diff=3599;
            }
            $tt=gmdate("i", abs($diff));
            if($tt>54)
            {
              $tt=60;
            }
            //echo $tt."<br>";
            $tsh+=$tt;
                                
          }
		  // $rec[0]->Consumption*$rec[0]->Multiplier%1000;
          $fulldata[$k]['Time']=$datesarray[$k];
          $fulldata[$k]['Meter']=$meter;
          $fulldata[$k]['runninghrs']=$tsh;
		  $fulldata[$k]['Current_capacity']=$data1D[0]->Consumption*$data1D[0]->Multiplier%1000;
        }
        return $fulldata;
		
      }
      else
      {
		  // echo "bbb";exit;
        $date_from = strtotime($data['fromdate']); 
        $date_to = strtotime($data['todate']); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) 
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
        for($k=0; $k < count($datesarray); $k++) 
        { 
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
            $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime,Consumption,UomScale,Multiplier  FROM hardware_station_consumption_data_myhome where LocationName='".$meter."' and StationId='".$data['StationId']."' and TxnDate='".$datesarray[$k]."' order by ToTime desc limit 1";

            $data1D = $this->db->query($queryD)->result();
			// echo $this->db->last_query();exit;
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

            if(abs($diff)>3600)
            {
              $diff=3599;
            }
            $tt=gmdate("i", abs($diff));
            if($tt>54)
            {
              $tt=60;
            }
            //echo $tt."<br>";
            $tsh+=$tt;
          }
          $fulldata[$k]['Time']=$datesarray[$k];
          $fulldata[$k]['Meter']=$meter;
          $fulldata[$k]['runninghrs']=$tsh;
          $fulldata[$k]['Current_capacity']=$data1D[0]->Consumption*$data1D[0]->Multiplier%1000;

        }
                                                  
        return $fulldata;
      }

    
    }
    
	}
	
	
	function get_reports_dropdown($data){
		if($data['report_type']==0){
			$report_type='tabular';
		}else{
			$report_type='graphical';
		}
		$this->db->select('');
        $this->db->from('all_reports');
        $this->db->where('category_id', $data['category']);
        $this->db->where('device_id', $data['solution']);
		if($data['device']!=''){
        $this->db->where('hardware_id', $data['device']);
		}
        $this->db->where('report_type', $report_type);
      
		$this->db->where('status',1);
        $this->db->order_by('report_id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['report_id']] = $row['report_name'];
        }
        return $items;
	}
	
	
}