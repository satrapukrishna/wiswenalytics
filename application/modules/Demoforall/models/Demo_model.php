<?php
class Demo_model extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function getMeterList(){

        $query = "SELECT vname FROM dgnames WHERE clientid=534";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getFirepumpGraphData($data){

    
        $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
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
function firePumpRunnDataAll($data){
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    $meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
        

    $metersnames = $this->db->query($meters)->result();

    $meterList=array($metersnames[0]->Location,$metersnames[1]->Location,$metersnames[2]->Location,$metersnames[3]->Location);
    
    //echo count($metersnames);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$meterList[$i]."' AND TxnDate='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";

    $runn = $this->db->query($firepump)->result();
    if($meterList[$i]=='Jockey Running Time_Fire Pump house'){
        $meter='Sprinkler Jockey';
    }else if($meterList[$i]=='Hydrant Running Time_Fire Pump house'){
    $meter='Main Hydrant';
    }else if($meterList[$i]=='Sprinkler Running Time_Fire Pump house'){
    $meter='Main Sprinkler';
    }else if($meterList[$i]=='Hydrant1 Running Time_Fire Pump house'){
    $meter='Hydrant Pump';
    }

    $fulldata[$k][$i]['meter']=$meter;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }    
        return $fulldata;
}
function getMeterListdg(){

        $query = "SELECT vname FROM dgnames WHERE clientid=534";
        $data = $this->db->query($query)->result();
        return $data;
    }
 function getPressureDay($data){
      $minit = date('H:i:s');
      $todayDate=$data['fromdate'];

      $querypressure="SELECT round(CurReading*0.0075,2) as CurReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Pipe Pressure_Fire Pump house' AND TxnDate='".$todayDate."' and StationId=2020000005 and FromTime < '".$minit."' order by ToTime";
      //echo $querypressure;die();
        $datapressure = $this->db->query($querypressure)->result();
        return $datapressure;
    }
    function getWaterListData($data){
        $query="SELECT LocationName as Location FROM app_device_station_consumtion_myhome where TxnDate='2020-05-15' group by LocationName";
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
                   
                
                $query1 = "SELECT LocationName as UtilityName,FromTime, ToTime,round(Consumption/1000,2) as Level,TxnDate FROM app_device_station_consumtion_myhome where TxnDate=".$date." and LocationName='".$locations[$l]->Location."' ";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$l]=$data1;
                   

           
                
                }
            
            
         return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            
             for ($l=0; $l <count($locations) ; $l++) {
                      
                
            $query1 = "SELECT LocationName as UtilityName,FromTime, ToTime,round(Consumption/1000,2) as Level,TxnDate FROM app_device_station_consumtion_myhome where TxnDate=".$date." and LocationName='".$locations[$l]->Location."'   AND FromTime BETWEEN '".$data['fromtime']."' AND '".$data['totime']."' AND ToTime BETWEEN '".$data['fromtime']."' AND '".$data['totime']."'";
                //echo $query1;die();
                 $data1 = $this->db->query($query1)->result();
                    $fulldata[$l]=$data1;
                    

                    
             }
           
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                
                 for ($l=0; $l <count($locations) ; $l++) {
                    // for ($k=0; $k < count($datesarray); $k++) { 
                     
                     $query1 = "SELECT  LocationName as UtilityName,FromTime, ToTime,round(Consumption/1000,2) as Level,TxnDate FROM app_device_station_consumtion_myhome where  LocationName='".$locations[$l]->Location."' and  TxnDate BETWEEN '".$data['fromdate']."' AND '".$data['todate']."'   AND FromTime BETWEEN '".$data['fromtime']."' AND '".$data['totime']."' AND ToTime BETWEEN '".$data['fromtime']."' AND '".$data['totime']."'";
                     //echo $query1;die();
                    $data1 = $this->db->query($query1)->result();
                     $fulldata[$l]=$data1;
                      //}
                 }
               
                       return $fulldata;

            }else{
                
                for ($l=0; $l <count($locations) ; $l++) {
                    
                    $query1 = "SELECT  LocationName as UtilityName,FromTime, ToTime,round(Consumption/1000,2) as Level,TxnDate FROM app_device_station_consumtion_myhome where  LocationName='".$locations[$l]->Location."' and  TxnDate BETWEEN '".$data['fromdate']."' AND '".$data['todate']."' ";
                     $data1 = $this->db->query($query1)->result();
                     $fulldata[$l]=$data1;
                
                }
                
                            
                           
                            return $fulldata;
            }

    }
    
}
    function getFireListData()
  {
      $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
      //echo $query;
      $data = $this->db->query($query)->result(); 
      return $data;
  }
   function getPressureToday(){
      $todayDate="2020-02-20";
     // $todayDate=date('Y-m-d');
      $querypressure="SELECT round(CurReading*0.0075,2) as CurReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Pipe Pressure_Fire Pump house' AND TxnDate='".$todayDate."' and StationId=2020000005 and FromTime NOT BETWEEN '23:56:00' AND '23:59:00' order by ToTime";
        $datapressure = $this->db->query($querypressure)->result();
        return $datapressure;
    }
    function getDashBoardData($locations){
        //$todayDate=date('Y-m-d');
        $todayDate="2020-02-28";
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
            $query3="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' ";
            //echo $query3;
            $data3 = $this->db->query($query3)->result();
             //echo $query3."<br>";
            if($locations[$i]->Location=='Jockey Running Time_Fire Pump house' ){
              $queryautosjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='Auto_Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $querymanualsjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='Manual_Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
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
            else if($locations[$i]->Location=='Hydrant Running Time_Fire Pump house' ){
              $queryautomhjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='MHP Auto Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
           // echo $queryautomhjp;die();
            $querymanualmhjp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='MHP Manual Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
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
            }if($locations[$i]->Location=='Sprinkler Running Time_Fire Pump house' ){
              $queryautomsp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='MSP Auto Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
           // echo $queryswitch1;die();
            $querymanualmsp="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='MSP Manual Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
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
    
}