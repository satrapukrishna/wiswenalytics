<?php
class Fire_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getIaqData($data){
    $date = "'".$data['fromdate']."'";
    $uname=$data['meter'];
     $totime=date('H:i:s');
    $todayDate=date('Y-m-d');
   
    $query="SELECT TxnTime as FromTime,CurReading FROM hardware_station_consumption_data_jll where TxnDate=".$date." and UomName='".$uname."' and StationId='2020000003' order by TxnTime ASC";
     $data1 = $this->db->query($query)->result();
     if(count($data1)>0){
        $array=array();
     
     return $data1;
     }
     
  
    
    }
    
    function getIaqDashData(){
       // echo date('H:i:s');die();
        //$fromtime='00:00:00';
        $totime=date('H:i:s');
        //echo $totime;die();

         //$todayDate='2020-07-19';
         $todayDate=date('Y-m-d');
         $resultArray=array();
         $querytemp="SELECT Consumption FROM hardware_station_consumption_data_jll where StationId=2020000003  AND TxnTime BETWEEN '00:00:00' AND '".$totime."' AND TxnDate='".$todayDate."' and UomName='Temperature' ORDER BY Id DESC limit 1";
       //  echo $querytemp;die();
         $queryhumi="SELECT Consumption FROM hardware_station_consumption_data_jll where StationId=2020000003 AND TxnTime BETWEEN '00:00:00' AND '".$totime."' and TxnDate='".$todayDate."' and UomName='Humidity' ORDER BY Id DESC limit 1";
         $querytmpgraph="SELECT TxnTime as FromTime,ROUND(CurReading,2) as CurReading FROM hardware_station_consumption_data_jll where StationId=2020000003 AND TxnTime BETWEEN '00:00:00' AND '".$totime."' and TxnDate='".$todayDate."' and UomName='Temperature'";
         $queryhmdgraph="SELECT TxnTime as FromTime,ROUND(CurReading,2) as CurReading FROM hardware_station_consumption_data_jll where StationId=2020000003 AND TxnTime BETWEEN '00:00:00' AND '".$totime."' and TxnDate='".$todayDate."' and UomName='Humidity'";
         //echo $queryhmdgraph;die();
       
            $datatmp = $this->db->query($querytemp)->result();
            $datahmd = $this->db->query($queryhumi)->result();

            $datatmpgraph = $this->db->query($querytmpgraph)->result();
            $datahmdgraph = $this->db->query($queryhmdgraph)->result();

            $resultArray[0]['temp']=round($datatmp[0]->Consumption,2);
            $resultArray[0]['humidity']=round($datahmd[0]->Consumption,2);
            $resultArray[0]['co2']=NA;
             $resultArray[1]['tmp']=$datatmpgraph;
              $resultArray[1]['hmd']=$datahmdgraph;
               $resultArray[1]['co']=0;
            return $resultArray;

    }
    function getjllwaterdata($data)
    {
        
        $date = "'".$data['date']."'";
        
        // $query="select id, LocationWithUtility as UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (
        // select id, LocationWithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale from protech_bms.hardware_station_consumption_data_jll where
        //  TxnDate=".$date."  and StationId='2020000003'  order by ToTime desc 
        // ) as sub where id=sub.id group by sub.UomScale";
        $query="select id, UtilityName,TxnDate, FromTime, ToTime, Consumption ,UomScale from protech_bms.hardware_station_consumption_data_jll where TxnDate=".$date."  and StationId='2020000003' and UtilityName='UG Flush Tank'  order by ToTime desc limit 1";
        // echo $query;die();
        $data = $this->db->query($query)->result();
        return $data;

    }

    function fairmontgetDashBoardData($locations)
    {
        //print_r($locations);die();
        //$todayDate='2020-07-19';
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
            $query="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data_jll where LineConnected='".$locations[$i]->Location."' and StationId=2020000003 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $queryswitch1="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data_jll where UtilityName='Auto_Status_SJ Pump' and StationId=2020000003 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            //echo $queryswitch1;die();
            $queryswitch2="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM hardware_station_consumption_data_jll where UtilityName='Manual_Status_SJ Pump' and StationId=2020000003 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $datasw1 = $this->db->query($queryswitch1)->result();
            $datasw2 = $this->db->query($queryswitch2)->result();
            $data = $this->db->query($query)->result();
            //echo $query."<br>"; 
            $query1="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_jll where UtilityName='".$locations[$i]->Location."' and StationId=2020000003 and TxnDate='".$todayDate."'";
            $data1 = $this->db->query($query1)->result();
             //echo $query1."<br>"; 
            //yesterday
            $query2="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_jll where UtilityName='".$locations[$i]->Location."' and StationId=2020000003 and TxnDate='".$yesterDay."'";
            $data2 = $this->db->query($query2)->result();
             //echo $query2."<br>"; 
            //lastweek
            $query3="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_jll where UtilityName='".$locations[$i]->Location."' and StationId=2020000003 and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' ";
            //echo $query3;
            $data3 = $this->db->query($query3)->result();
             //echo $query3."<br>";
            if($locations[$i]->Location=='Jockey Running Time_Fire Pump house'){
                if($datasw1[1]->CurReading==0 && $datasw2[1]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='OFF';
            }
            if($datasw1[1]->CurReading==0 && $datasw2[1]->CurReading==1){
                $resultArray[$i]['SwitchStatus']='Manual';
            }
            if($datasw1[1]->CurReading==1 && $datasw2[1]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='Auto';
            }
            }else{
                 $resultArray[$i]['SwitchStatus']='NA';
            }
            
            $resultArray[$i]['meter']=$locations[$i]->Location;
            $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
            
            $resultArray[$i]['TodayRunn']=$data1[0]->Consumption;
            $resultArray[$i]['YesterdayRunn']=$data2[0]->Consumption;
            $resultArray[$i]['LastWeekRunn']=$data3[0]->Consumption;
        }
        //print_r($resultArray);
       return $resultArray;
    }
    function getfairmontFireListData()
    {
        $query="SELECT distinct(LineConnected) as Location  FROM hardware_station_consumption_data_jll where UomScale='Min' and StationId=2020000003 and LineConnected='Jockey Pump RHT'";
        //echo $query;
        $data = $this->db->query($query)->result(); 
        return $data;
    }
function putFireRunHrs(){
        $date_from = strtotime('2021-01-01'); 
        $date_to = strtotime('2021-01-23'); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) 
        {
            array_push($datesarray, date("Y-m-d",$i1));
        }
       for ($k=0; $k < count($datesarray); $k++) 
        { 
            $quer="INSERT INTO `protech_bms`.`fire_pump_run`
(`run_date`,`meter`,`runHrs`)VALUES('".$datesarray[$k]."','Jockey Pump','0')";
$this->db->query($quer);
        }
}
    function getFirePumpRunnData($data)
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
            $meters="SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName IN('Fuel_Level','Run Minutes') and StationId='2020000003'";
            $metersnames = $this->db->query($meters)->result();

            $meterList1=array($metersnames[0],$metersnames[1],$metersnames[2]);
            $meterList = array();
            for ($i=0; $i < count($meterList1); $i++) 
            { 
                array_push($meterList,$meterList1[$i]->MeterName);
            }
            //echo count($metersnames);die();
            for ($i=0; $i < count($meterList); $i++)
            { 
               
                if($meterList[$i]=='Boiler_4')
                {
                   $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' ";
                }
                else
                {
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

    function fairmontfirePumpRunnDataAll($data)
    {
        $date_from = strtotime($data['fromdate']); 
        $date_to = strtotime($data['todate']); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
            array_push($datesarray, date("Y-m-d",$i1));
        }
       // print_r($datesarray);die();
        for ($k=0; $k < count($datesarray); $k++) 
        { 
            
            for ($i=0; $i < 1; $i++) 
            { 
                $firepump = "SELECT run_date,meter,runHrs  FROM fire_pump_run where run_date='".$datesarray[$k]."'  ";
           
              

                $runn = $this->db->query($firepump)->result();
                
                $fulldata[$k][$i]['meter']=$runn[0]->meter;
                $fulldata[$k][$i]['date']=$runn[0]->run_date;                                
                $fulldata[$k][$i]['RunningHours']=$runn[0]->runHrs;
            }

        }    
        return $fulldata;
    }
function getPressureData($data){
    if($data['fromdate'] == $data['todate']){
        $query="SELECT TxnTime as FromTime,CurReading FROM hardware_station_consumption_data_jll where TxnDate='".$data['fromdate']."' and LineConnected='Hydrant Pressure' and StationId='2020000003' order by TxnTime ASC";
    
     $data1 = $this->db->query($query)->result();
     $array=array();
     
     return $data1;
    }
    // $today = date("Y-m-d"); 
       
    


}
function getPressureDataDash(){
       // $today = '2020-07-19'; 
        $today = date("Y-m-d"); 
       
    $query="SELECT Consumption FROM hardware_station_consumption_data_jll where TxnDate='".$today."' and LineConnected='Hydrant Pressure'  and StationId='2020000003' order by Id desc limit 1";
     //echo $query;die();
     $data1 = $this->db->query($query)->result();
     // $array=array();Hydrant Pressure

     
     return $data1;


}
function getTempMails($date){
    
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
                
                    $query1 = "SELECT max(CurReading) as max,min(CurReading) as min FROM hardware_station_consumption_data_jll where StationId=2020000003  and UomName='Temperature' AND TxnDate='".$date."'   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                    //echo $query1;die();
                        $data1 = $this->db->query($query1)->result();
                        $fulldata[$i]['Time']=$from." To ".$to;
                       $fulldata[$i]['min']=$data1[0]->min;
                       $fulldata[$i]['max']=$data1[0]->max;

                }
                
            
            return $fulldata;
            
        
}
function getHimidMails($date){
    
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
                
                    $query1 = "SELECT max(Consumption) as max,min(Consumption) as min FROM hardware_station_consumption_data_jll where StationId=2020000003  and UomName='Humidity' AND TxnDate='".$date."'   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                    //echo $query1;die();
                        $data1 = $this->db->query($query1)->result();
                        $fulldata[$i]['Time']=$from." To ".$to;
                       $fulldata[$i]['min']=$data1[0]->min;
                       $fulldata[$i]['max']=$data1[0]->max;

                }
                
            
            return $fulldata;
            
        
}
    function getFirepumpGraphData($data)
    {
        $query="SELECT distinct(LineConnected) as Location  FROM hardware_station_consumption_data_jll where UomScale='Min' and StationId=2020000003 and LineConnected LIKE '%RHT'";

        //echo $query;
        $locations = $this->db->query($query)->result(); 
        //print_r($locations[0]->Location);die();
      
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From')
        {
            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($l=0; $l <count($locations) ; $l++) 
            {
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
                
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM hardware_station_consumption_data_jll where LineConnected='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' and StationId=2020000003";
                    $data1 = $this->db->query($query1)->result();
                        $fulldata[$l][$i]['Time']=$from." To ".$to;
                        $fulldata[$l][$i]['meter']=$locations[$l]->Location;
                        $fulldata[$l][$i]['runninghrs']=$data1[0]->Consumption;

                }
                
            }
            return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From')
        {
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            
            for ($l=0; $l <count($locations) ; $l++) 
            {
                $kt=0;
                for ($i=$t1[0]; $i < $t[0]; $i++) 
                { 
                    $from =  $i.":00:00";
                    $to =  ($i+1).":00:00";            
                
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM hardware_station_consumption_data_jll where LineConnected='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' and StationId=2020000003";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$kt]['Time']=$from." To ".$to;
                      $fulldata[$l][$kt]['meter']=$locations[$l]->Location;
                    $fulldata[$l][$kt]['runninghrs']=$data1[0]->Consumption;
                    $kt++;

                }
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
                for ($l=0; $l <count($locations) ; $l++)
                {
                    for ($k=0; $k < count($datesarray); $k++) 
                    { 
                        $query1 = "SELECT SUM(Consumption) as Consumption  FROM hardware_station_consumption_data_jll where LineConnected='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."'   AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." and StationId=2020000003";
                        $data1 = $this->db->query($query1)->result();
                        $fulldata[$l][$k]['Time']=$datesarray[$k];
                          $fulldata[$l][$k]['meter']=$locations[$l]->Location;
                        $fulldata[$l][$k]['runninghrs']=$data1[0]->Consumption;
                    }
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
                for ($l=0; $l <count($locations) ; $l++) 
                {
                    for ($k=0; $k < count($datesarray); $k++) 
                    {
                        $query1 = "SELECT SUM(Consumption) as Consumption  FROM hardware_station_consumption_data_jll where LineConnected='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."' and StationId=2020000003";
                        $data1 = $this->db->query($query1)->result();
                        $fulldata[$l][$k]['Time']=$datesarray[$k];
                        $fulldata[$l][$k]['meter']=$locations[$l]->Location;
                        $fulldata[$l][$k]['runninghrs']=$data1[0]->Consumption;
                    }
                }
                return $fulldata;
            }

        }
    
    }

}