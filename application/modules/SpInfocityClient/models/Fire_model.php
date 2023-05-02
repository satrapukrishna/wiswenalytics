<?php
class Fire_model extends CI_Model{
	function __construct(){
      parent::__construct();
  }
    
  function getChillerData()
  {
    $todayDate=date("Y-m-d");
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
      $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Chiller_4' AND TxnDate='".$todayDate."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
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
        
    $queryStatus="SELECT TxnDate,FromTime,ToTime,PrvReading,CurReading  FROM app_device_station_consumtion_cbre where LineConnected='Chiller_4' and TxnDate='".$todayDate."'";
    $dataStatus = $this->db->query($queryStatus)->result();
    $chillerdata= array();
    $hours = floor($tsh / 60);
    $min = $tsh - ($hours * 60);
    $chillerdata['meter']='Chiller_4';
    $chillerdata['status']=$dataStatus[count($dataStatus)-1]->CurReading;
    $chillerdata['RunningHours']=$hours." Hours ".$min." Min";

    return $chillerdata;
  }
  function getCoolingData()
  {
    $todayDate=date("Y-m-d");
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
      $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate='".$todayDate."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";

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
    $queryStatus="SELECT TxnDate,FromTime,ToTime,PrvReading,CurReading  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' and TxnDate='".$todayDate."'";
    $dataStatus = $this->db->query($queryStatus)->result();
        
    $chillerdata= array();
    $hours = floor($tsh / 60);
    $min = $tsh - ($hours * 60);
    $chillerdata['meter']='CT Fan';
    $chillerdata['status']=$dataStatus[count($dataStatus)-1]->CurReading;
    $chillerdata['RunningHours']=$hours." Hours ".$min." Min";
    return $chillerdata;
  }
  function getDashBoardData($locations){
        $todayDate=date('Y-m-d');
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
            //echo "string";die();
            //today
            $query="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            

            $data = $this->db->query($query)->result();
            //echo $query."<br>"; 
            $query1="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate='".$todayDate."'";
            $data1 = $this->db->query($query1)->result();
             //echo $query1."<br>"; 
            //yesterday
            $query2="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate='".$yesterDay."'";
            $data2 = $this->db->query($query2)->result();
             //echo $query2."<br>"; 
            //lastweek
            $query3="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' and Consumption<20";
            //echo $query3;
            $data3 = $this->db->query($query3)->result();
             //echo $query3."<br>";
            if($locations[$i]->Location=='Jockey Pump' ){
              $queryautosjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where LineConnected='HJ_Auto' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $querymanualsjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where LineConnected='HJ_Manual' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $dataasjp = $this->db->query($queryautosjp)->result();
            $datamsjp = $this->db->query($querymanualsjp)->result();

                if($dataasjp[0]->CurReading==0 && $datamsjp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='OFF';
            }
            if($dataasjp[0]->CurReading==0 && $datamsjp[0]->CurReading==1){
                $resultArray[$i]['SwitchStatus']='Manual';
            }
            if($dataasjp[0]->CurReading==1 && $datamsjp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='Auto';
            }
            }
            else if($locations[$i]->Location=='Hydrant1 Running Time_Fire Pump house' ){
              $queryautohjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='H J Manual Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            //echo $queryswitch1;die();
            $querymanualhjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='H J Auto Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $dataahjp = $this->db->query($queryautohjp)->result();
            $datamhjp = $this->db->query($querymanualhjp)->result();
                if($dataahjp[0]->CurReading==0 && $datamhjp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='OFF';
            }
            if($dataahjp[0]->CurReading==0 && $datamhjp[0]->CurReading==1){
                $resultArray[$i]['SwitchStatus']='Manual';
            }
            if($dataahjp[0]->CurReading==1 && $datamhjp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='Auto';
            }
            }
            else if($locations[$i]->Location=='Hydrant Pump' ){
              $queryautomhjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where LineConnected='MHP_Auto' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
           // echo $queryautomhjp;die();
            $querymanualmhjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where LineConnected='MHP_Manual' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $dataamhjp = $this->db->query($queryautomhjp)->result();
            $datammhjp = $this->db->query($querymanualmhjp)->result();
                if($dataamhjp[0]->CurReading==0 && $datammhjp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='OFF';
            }
            if($dataamhjp[0]->CurReading==0 && $datammhjp[0]->CurReading==1){
                $resultArray[$i]['SwitchStatus']='Manual';
            }
            if($dataamhjp[0]->CurReading==1 && $datammhjp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='Auto';
            }
            }if($locations[$i]->Location=='Sprinkler Pump' ){
              $queryautomsp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where LineConnected='MSP_Auto' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            //echo $queryautomsp;die();
            $querymanualmsp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where LineConnected='MSP_Manual' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $dataamsp = $this->db->query($queryautomsp)->result();
            $datammsp = $this->db->query($querymanualmsp)->result();
             
                if($dataamsp[0]->CurReading==0 && $datammsp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='OFF';
            }
            if($dataamsp[0]->CurReading==0 && $datammsp[0]->CurReading==1){
                $resultArray[$i]['SwitchStatus']='Manual';
            }
            if($dataamsp[0]->CurReading==1 && $datammsp[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='Auto';
            }
            
            }

            
            $resultArray[$i]['meter']=$locations[$i]->Location;
            $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
            // $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
            
            $resultArray[$i]['TodayRunn']=$data1[0]->Consumption;
            $resultArray[$i]['YesterdayRunn']=$data2[0]->Consumption;
            $resultArray[$i]['LastWeekRunn']=$data3[0]->Consumption;
        }

        //print_r($resultArray);
       return $resultArray;
    }
    function getPressureToday(){
      $todayDate=date('Y-m-d');
      $querypressure="SELECT round(CurReading*0.076,2) as CurReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Pressure' AND TxnDate='".$todayDate."' and StationId=2020000005 and FromTime NOT BETWEEN '23:56:00' AND '23:58:00' order by ToTime";
        $datapressure = $this->db->query($querypressure)->result();
        return $datapressure;
    }
    function getPressureDay($data){
      $minit = date('H:i:s');
      $todayDate=$data['fromdate'];

      $querypressure="SELECT round(CurReading*0.076,2) as CurReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Pressure' AND TxnDate='".$todayDate."' and StationId=2020000005 and FromTime < '".$minit."' order by ToTime";
      //echo $querypressure;die();
        $datapressure = $this->db->query($querypressure)->result();
        return $datapressure;
    }
  function getFireListData()
  {
      $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005 and LineConnected='Unit RHT'";
      //echo $query;
      $data = $this->db->query($query)->result(); 
      return $data;
  }
  function getChillerReportData($data)
  {
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    $fromtime = "'".$data['fromtime']."'";
    $totime = "'".$data['totime']."'";
    //$meter = $data['meter'];
    $fulldata=array();
    if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From')
    {
      // echo  "hello if";
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
        $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Chiller_4' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
        //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
        $data1D = $this->db->query($queryD)->result();
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
        $fulldata[$i]['Meter']='Chiller_4';
        $fulldata[$i]['runninghrs']=$tt;
      }
            
      return $fulldata;        
    }
    else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
        // echo "ff";die();
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
         
          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Chiller_4' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
          //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
          $data1D = $this->db->query($queryD)->result();
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
          $fulldata[$kt]['Meter']='Chiller_4';
          $fulldata[$kt]['runninghrs']=$tt;
          $kt++;
        }
      
      return $fulldata;
    }
    else
    {
      if($data['fromtime']!='Select Hours From')
      {
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

            $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Chiller_4' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
  
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
          $fulldata[$k]['Meter']='Chiller_4';
          $fulldata[$k]['runninghrs']=$tsh;

        }
        return $fulldata;

      }
      else
      {
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
            $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='Chiller_4' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";

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
          $fulldata[$k]['Meter']='Chiller_4';
          $fulldata[$k]['runninghrs']=$tsh;

        }
                                                  
        return $fulldata;
      }

    
    }
    
  }

  function getCoolingTowerReportData($data)
  {
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    $fromtime = "'".$data['fromtime']."'";
    $totime = "'".$data['totime']."'";
    //$meter = $data['meter'];
    $fulldata=array();
    if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From')
    {
      $date = "'".$data['fromdate']."'";

    for ($i=0; $i < 24; $i++) {
    $tt=0 ;
    $diff=0;
      if($i>9){
      $from =  $i.":00:00";
      $to =  ($i+1).":00:00";     
      }else{
      $from =  "0".$i.":00:00";
      $to =  "0".($i+1).":00:00"; 
      }
        $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
         // echo $queryD;
        $data1D = $this->db->query($queryD)->result();

        $rmin=0;
            if(count($data1D)!=0){
            if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

            $checkTime = strtotime($data1D[0]->ToTime);


            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));


            }else{

            $checkTime = strtotime($data1D[0]->FromTime);


            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));

            }      
            }else{
            $rmin="0";
            }


            if(abs($diff)>=3600){
            $diff=3599;
            }
            $tt=gmdate("i", abs($diff));
            if($tt>54){
            $tt="60";
            }
            // echo $diff."<br>";
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['Meter']='CT Fan';
            $fulldata[$i]['runninghrs']=$tt;  
    }
      return $fulldata;
    }
    else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
           // echo "ff";die();
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
          
              $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
                //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
              $data1D = $this->db->query($queryD)->result();
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
                  
               
                  if(abs($diff)>=3600){
                    $diff=3599;
                  }
                  $tt=gmdate("i", abs($diff));
                  if($tt>54){
                    $tt="60";
                  }
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['Meter']='CT Fan';
                    $fulldata[$kt]['runninghrs']=$tt;
                    $kt++;
                    }
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
                for ($k=0; $k < count($datesarray); $k++) { 
                       $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>=3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
                              $fulldata[$k]['Time']=$datesarray[$k];
                              $fulldata[$k]['Meter']='CT Fan';
                              $fulldata[$k]['runninghrs']=$tsh;
                   
                      }
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 
                       $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
 // echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>=3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              // echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
                              $fulldata[$k]['Time']=$datesarray[$k];
                              $fulldata[$k]['Meter']='CT Fan';
                              $fulldata[$k]['runninghrs']=$tsh;
                   
                      }
                            
                           
                            return $fulldata;
            }

    }
    
}
function getFirePumpRunnData($data){
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    $meters="SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName IN('Fuel_Level','Run Minutes')";
    $metersnames = $this->db->query($meters)->result();

    $meterList1=array($metersnames[0],$metersnames[1],$metersnames[2]);
    $meterList = array();
    for ($i=0; $i < count($meterList1); $i++) { 

      array_push($meterList,$meterList1[$i]->MeterName);
    }
    //echo count($metersnames);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        if($meterList[$i]=='Boiler_4'){
           $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' ";
        }else{
            $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meterList[$i]."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' ";
        }
    
    //echo $fueladd."<br>";

    $datafueladd = $this->db->query($fueladd)->result();

    $fulldata[$k][$i]['meter']=$meterList[$i];
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['FuelAdded']=$datafueladd[0]->fueladd;
    }

    }    
        return $fulldata;
}
function getCoolingTowerReportData11($data){
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($i=0; $i < 24; $i++) { 
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
                
                $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['Meter']='CT Fan';
                    $fulldata[$i]['runninghrs']=$data1[0]->Consumption;
            }
            
         return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            $kt=0;
            for ($i=$t1[0]; $i < $t[0]; $i++) { 
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";            
                
            $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['Meter']='CT Fan';
                    $fulldata[$kt]['runninghrs']=$data1[0]->Consumption;
                    $kt++;
                    }
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
                for ($k=0; $k < count($datesarray); $k++) { 
                     
                     $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate='".$datesarray[$k]."'   AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['Meter']='CT Fan';
                    $fulldata[$k]['runninghrs']=$data1[0]->Consumption;
                      }
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) {
                    $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where LineConnected='CT_Fan' AND TxnDate='".$datesarray[$k]."' ";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['Meter']='CT Fan';
                    $fulldata[$k]['runninghrs']=$data1[0]->Consumption;
                }
                            
                           
                            return $fulldata;
            }

    }
    
}
function getFirepumpGraphData($data){

    
        $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005 and LineConnected='Unit RHT'";
        //echo $query;
        $locations = $this->db->query($query)->result(); 
        //print_r($locations[0]->Location);die();
      
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($l=0; $l <count($locations) ; $l++) {
                    for ($i=0; $i < 24; $i++) { 
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
                
                $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$i]['Time']=$from." To ".$to;
                    $fulldata[$l][$i]['meter']=$locations[$l]->Location;
                    $fulldata[$l][$i]['runninghrs']=$data1[0]->Consumption;

            }
                
                }
            
            
         return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            
             for ($l=0; $l <count($locations) ; $l++) {
                $kt=0;
                 for ($i=$t1[0]; $i < $t[0]; $i++) { 
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";            
                
            $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$kt]['Time']=$from." To ".$to;
                      $fulldata[$l][$kt]['meter']='Jockey Running Time_Fire Pump house';
                    $fulldata[$l][$kt]['runninghrs']=$data1[0]->Consumption;
                    $kt++;

                    }
             }
           
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                 for ($l=0; $l <count($locations) ; $l++) {
                     for ($k=0; $k < count($datesarray); $k++) { 
                     
                     $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."'   AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$k]['Time']=$datesarray[$k];
                      $fulldata[$l][$k]['meter']=$locations[$l]->Location;
                    $fulldata[$l][$k]['runninghrs']=$data1[0]->Consumption;
                      }
                 }
               
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($l=0; $l <count($locations) ; $l++) {
                    for ($k=0; $k < count($datesarray); $k++) {
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."' ";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$k]['Time']=$datesarray[$k];
                    $fulldata[$l][$k]['meter']='Jockey Running Time_Fire Pump house';
                    $fulldata[$l][$k]['runninghrs']=$data1[0]->Consumption;
                }
                }
                
                            
                           
                            return $fulldata;
            }

    }
    
}

function getFirepumpGraphDataMobile222($data){

    
        $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005 and LineConnected='Unit RHT'";
        //echo $query;
        $locations = $this->db->query($query)->result(); 
        //print_r($locations[0]->Location);die();
      
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        $meterData=array();
        if($data['fromdate'] == $data['todate'] ){

            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($l=0; $l <count($locations) ; $l++) {
                    for ($i=0; $i < 24; $i++) { 
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
                
                $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$i]['date']=$from." To ".$to;
                    $fulldata[$l][$i]['meter']=$locations[$l]->Location;
                    $fulldata[$l][$i]['Runninghrs']=$data1[0]->Consumption;

            }
                
                }
            
           $meterData["success"]  =200;
           $meterData["meterData"]=$fulldata; 
         return $meterData;
            
        }
        else{
           
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($l=0; $l <count($locations) ; $l++) {
                    for ($k=0; $k < count($datesarray); $k++) {
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."' ";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$k]['date']=$datesarray[$k];
                    $fulldata[$l][$k]['meter']=$locations[$l]->Location;
                    $fulldata[$l][$k]['Runninghrs']=$data1[0]->Consumption;
                }
                }
                
                            
                           $meterData["success"]  =200;
     $meterData["meterData"]=$fulldata;
                            return $meterData;
            

    }
    
}
function getFirepumpGraphDataMobile($data){

    $date_from = strtotime($_GET['fromdate']); 
    $date_to = strtotime($_GET['todate']); 
    $datesarray=array();
    $meterData=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    //$meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      $meters="SELECT distinct(meter) as Location FROM fire_pump_run"; ; 

    $metersnames = $this->db->query($meters)->result();

    $meterList=$metersnames ;
    //print_r($meterList[0]->Location);die();
    //echo count($metersnames);die();
    //print_r($meterList);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(runHrs) as Consumption  FROM fire_pump_run where meter='".$meterList[$i]->Location."' AND run_date='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";die();

    $runn = $this->db->query($firepump)->result();
    
        if($runn[0]->Consumption==null){
        $runn[0]->Consumption=0;
        }
    $fulldata[$k][$i]['meter']=$meterList[$i]->Location;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }  
       
                
                            
                           $meterData["success"]  =200;
     $meterData["meterData"]=$fulldata;
                            return $meterData;
            

    }
    

function firePumpRunnDataAll($data){
    $date_from = strtotime($_GET['fromdate']); 
    $date_to = strtotime($_GET['todate']); 
    $datesarray=array();
    $meterData=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    //$meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      $meters="SELECT distinct(meter) as Location FROM fire_pump_run_cbre"; ; 

    $metersnames = $this->db->query($meters)->result();

    $meterList=$metersnames ;
    //print_r($meterList[0]->Location);die();
    //echo count($metersnames);die();
    //print_r($meterList);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(runHrs) as Consumption  FROM fire_pump_run_cbre where meter='".$meterList[$i]->Location."' AND run_date='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";die();

    $runn = $this->db->query($firepump)->result();
    
        if($runn[0]->Consumption==null){
        $runn[0]->Consumption=0;
        }
    $fulldata[$k][$i]['meter']=$meterList[$i]->Location;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }    
        return $fulldata;
}
function firePumpRunnDataAllgraph($data){
    $date_from = strtotime($_GET['fromdate']); 
    $date_to = strtotime($_GET['todate']); 
    $datesarray=array();
    $meterData=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
  
    //$meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      $meters="SELECT distinct(meter) as Location FROM fire_pump_run_cbre"; ; 

    $metersnames = $this->db->query($meters)->result();

    $meterList=$metersnames ;
    //print_r($meterList[0]->Location);die();
    //echo count($metersnames);die();
    //print_r($meterList);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
          for ($k=0; $k < count($datesarray); $k++) { 
        $firepump = "SELECT SUM(runHrs) as Consumption  FROM fire_pump_run_cbre where meter='".$meterList[$i]->Location."' AND run_date='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";die();

    $runn = $this->db->query($firepump)->result();
    
        if($runn[0]->Consumption==null){
        $runn[0]->Consumption=0;
        }
    $fulldata[$i][$k]['meter']=$meterList[$i]->Location;
    $fulldata[$i][$k]['date']=$datesarray[$k];                                
    $fulldata[$i][$k]['RunningHours']=$runn[0]->Consumption;
    }

    }    
        return $fulldata;
}
function firePumpRunnDataAllbkp($data){
    $date_from = strtotime($_GET['fromdate']); 
    $date_to = strtotime($_GET['todate']); 
    $datesarray=array();
    $meterData=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    //$meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      $meters="SELECT DISTINCT UtilityName as Location FROM app_device_station_consumtion_cbre where TxnDate='2020-06-27' and LineConnected='Unit RHT'";  

    $metersnames = $this->db->query($meters)->result();

    $meterList=$metersnames ;
    //print_r($meterList[0]->Location);die();
    //echo count($metersnames);die();
    //print_r($meterList);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$meterList[$i]->Location."' AND TxnDate='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";die();

    $runn = $this->db->query($firepump)->result();
    
        if($runn[0]->Consumption==null){
        $runn[0]->Consumption=0;
        }
    $fulldata[$k][$i]['meter']=$meterList[$i]->Location;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }    
        return $fulldata;
}
function firePumpRunnDataAllMobile(){

    $date_from = strtotime($_GET['fromdate']); 
    $date_to = strtotime($_GET['todate']); 
    $datesarray=array();
    $meterData=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    //$meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      $meters="SELECT distinct(meter) as Location FROM fire_pump_run"; ; 

    $metersnames = $this->db->query($meters)->result();

    $meterList=$metersnames ;
    //print_r($meterList[0]->Location);die();
    //echo count($metersnames);die();
    //print_r($meterList);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(runHrs) as Consumption  FROM fire_pump_run where meter='".$meterList[$i]->Location."' AND run_date='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";die();

    $runn = $this->db->query($firepump)->result();
    
        if($runn[0]->Consumption==null){
        $runn[0]->Consumption=0;
        }
    $fulldata[$k][$i]['meter']=$meterList[$i]->Location;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }  
    $meterData["success"]  =200;
     $meterData["meterData"]=$fulldata;
        return $meterData;

}
function firePumpRunnDataAll66($data){
    $date_from = strtotime($_GET['fromdate']); 
    $date_to = strtotime($_GET['todate']); 
    $datesarray=array();
    $meterData=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    //$meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      $meters="SELECT distinct(meter) as Location FROM fire_pump_run_cbre"; ; 

    $metersnames = $this->db->query($meters)->result();

    $meterList=$metersnames ;
    //print_r($meterList[0]->Location);die();
    //echo count($metersnames);die();
    //print_r($meterList);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(runHrs) as Consumption  FROM fire_pump_run_cbre where meter='".$meterList[$i]->Location."' AND run_date='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";die();

    $runn = $this->db->query($firepump)->result();
    
        if($runn[0]->Consumption==null){
        $runn[0]->Consumption=0;
        }
    $fulldata[$k][$i]['meter']=$meterList[$i]->Location;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }    
        return $fulldata;
}
}