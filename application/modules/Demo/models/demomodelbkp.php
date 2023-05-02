<?php
class Demo_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getFootfallHourly($data){
        $result=array();
        $date = "'".$data['date']."'";
        
        $query1="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2019000077' and UtilityName='FootFall Male_RestRoom' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2019000077' and UtilityName='FootFall Male_RestRoom' ORDER BY Id DESC LIMIT 1) as 'last'";
    }
    function getSodexoDataReport($toiletId){
        $result=array();
        //$date = "'".$data['date']."'";
        $date = "'2019-12-09'";
        //echo $data['date'];die();
        $query1="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2019000077' and LocationwithUtility='FootFall Male_RestRoom' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2019000077' and LocationwithUtility='FootFall Male_RestRoom' ORDER BY Id DESC LIMIT 1) as 'last'";
        //echo $query1;die();
        $query="select id, LocationwithUtility,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LocationwithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.app_device_station_consumtion where
         TxnDate=".$date."  and StationId='2019000077'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LocationwithUtility";
        $data1 = $this->db->query($query1)->result();
        $data = $this->db->query($query)->result();
       // print_r($data1);die();
        for ($i=0; $i < count($data); $i++) { 
           $stname =explode("-",$data[$i]->StationName);
            if($data[$i]->LocationwithUtility=='FootFall Male_RestRoom'){
                $result[0]['footfallcountMale']=($data1[0]->last)-($data1[0]->first);
                $result[0]['TxnDate']=$data[$i]->TxnDate;
                    $result[0]['StationName']=$stname[2];
                    $result[0]['ToTime']=$data[$i]->ToTime;
            }elseif($data[$i]->LocationwithUtility=='Odour Male_RestRoom'){
                    $result[0]['OdourMale']=$data[$i]->CurReading;
                }        
        }  
        return $result;

    }
    function getSodexoReport($data,$toiletId){
    	$result=array();
    	//$date = "'".$data['date']."'";
        $date = "'2019-12-09'";
    	//echo $data['date'];die();
        $query1="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2019000077' and LocationwithUtility='FootFall Male_RestRoom' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2019000077' and LocationwithUtility='FootFall Male_RestRoom' ORDER BY Id DESC LIMIT 1) as 'last'";
        //echo $query1;die();
        $query="select id, LocationwithUtility,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LocationwithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.app_device_station_consumtion where
         TxnDate=".$date."  and StationId='2019000077'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LocationwithUtility";
		$data1 = $this->db->query($query1)->result();
        $data = $this->db->query($query)->result();
       // print_r($data1);die();
        for ($i=0; $i < count($data); $i++) { 
           $stname =explode("-",$data[$i]->StationName);
            if($data[$i]->LocationwithUtility=='FootFall Male_RestRoom'){
                $result[0]['footfallcountMale']=($data1[0]->last)-($data1[0]->first);
                $result[0]['TxnDate']=$data[$i]->TxnDate;
                    $result[0]['StationName']=$stname[2];
                    $result[0]['ToTime']=$data[$i]->ToTime;
            }elseif($data[$i]->LocationwithUtility=='Odour Male_RestRoom'){
                    $result[0]['OdourMale']=$data[$i]->CurReading;
                }        
        }     
        $queryFeedback = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap,HandTowelTime,ToiletrollTime,DustbinFullTime,NoDustbinTime,FloorDryTime,FloorWetTime,HandSoapTime FROM ToiletData where ToiletId='2019000077' and ToiletName='".$toiletId."'";
     $dataFeedback = $this->db->query($queryFeedback)->result(); 
    $result[1]['ToiletName']=$dataFeedback[0]->ToiletName;
    $result[1]['HandTowel']=$dataFeedback[0]->HandTowel;
    $result[1]['DustbinFull']=$dataFeedback[0]->DustbinFull;
    $result[1]['Toiletroll']=$dataFeedback[0]->Toiletroll;
    $result[1]['NoDustbin']=$dataFeedback[0]->NoDustbin;
    $result[1]['FloorDry']=$dataFeedback[0]->FloorDry;
    $result[1]['FloorWet']=$dataFeedback[0]->FloorWet;
    $result[1]['HandSoap']=$dataFeedback[0]->HandSoap;
    if(isset($dataFeedback[0]->HandTowelTime)){
        $datetime1 = new DateTime($dataFeedback[0]->HandTowelTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);         
         $result[1]['HandTowelTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    } 
    if(isset($dataFeedback[0]->ToiletrollTime)){
        $datetime1 = new DateTime($dataFeedback[0]->ToiletrollTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);
        $result[1]['ToiletrollTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    }
    if(isset($dataFeedback[0]->HandSoapTime)){
        $datetime1 = new DateTime($dataFeedback[0]->HandSoapTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);
        $result[1]['HandSoapTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    }
    if(isset($dataFeedback[0]->NoDustbinTime)){
        $datetime1 = new DateTime($dataFeedback[0]->NoDustbinTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);
        $result[1]['NoDustbinTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    }
    if(isset($dataFeedback[0]->FloorDryTime)){
        $datetime1 = new DateTime($dataFeedback[0]->FloorDryTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);
        $result[1]['FloorDryTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    }
    if(isset($dataFeedback[0]->FloorWetTime)){
        $datetime1 = new DateTime($dataFeedback[0]->FloorWetTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);
        $result[1]['FloorWetTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    }
    if(isset($dataFeedback[0]->DustbinFullTime)){
        $datetime1 = new DateTime($dataFeedback[0]->DustbinFullTime);
        $datetime2 = new DateTime(date("Y-m-d h:i:s"));
        $interval = $datetime1->diff($datetime2);
        $result[1]['DustbinFullTime']=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    } 
    	return $result;

    }
    function getAndUpdateFeedbackData($data){

         $ToiletName = "Toilet01";

            $this->db->where("ToiletName",$ToiletName);
            $this->db->update("ToiletData",$data);    
          // print_r($this->db->last_query()); 
            if($this->db->affected_rows() >=0){
              return true; //add your code here
            }else{
              return false; //add your your code here
            }

    }
    function updateJanitorData($data){
         if(count($data)>0){
            $row=$this->db->insert("JanitorToiletData",$data);
            return $row;

        }else{
            return false;

        }

    }
    function getFeedbackDataObject($toiletId){
         $query = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap FROM ToiletData where ToiletId='2019000077' and ToiletName='".$toiletId."'";
     $data = $this->db->query($query)->result();
     $rslt=array();
    $rslt[0]['ToiletName']=$data[0]->ToiletName;
    $rslt[0]['HandTowel']=$data[0]->HandTowel;
    $rslt[0]['DustbinFull']=$data[0]->DustbinFull;
    $rslt[0]['Toiletroll']=$data[0]->Toiletroll;
    $rslt[0]['NoDustbin']=$data[0]->NoDustbin;
    $rslt[0]['FloorDry']=$data[0]->FloorDry;
    $rslt[0]['FloorWet']=$data[0]->FloorWet;
    $rslt[0]['HandSoap']=$data[0]->HandSoap;
     return $rslt; 
    }
    function getFeedbackData($toiletId){
       
     $query = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap FROM ToiletData where ToiletId='2019000077' and ToiletName='".$toiletId."'";
     $data = $this->db->query($query)->result();
     //print_r($data[0]->ToiletName);
    $rslt=array();
    $rslt['ToiletName']=$data[0]->ToiletName;
    $rslt['HandTowel']=$data[0]->HandTowel;
    $rslt['DustbinFull']=$data[0]->DustbinFull;
    $rslt['Toiletroll']=$data[0]->Toiletroll;
    $rslt['NoDustbin']=$data[0]->NoDustbin;
    $rslt['FloorDry']=$data[0]->FloorDry;
    $rslt['FloorWet']=$data[0]->FloorWet;
    $rslt['HandSoap']=$data[0]->HandSoap;
     return $rslt; 

    }
    function getsodexoDataWithDate($date,$stationId){

      $resQuery="SELECT * FROM SodexoFootFall where StationId=2019000077 and Date='".$date."'";
      $data = $this->db->query($resQuery)->result();
      $fulldata=array();

      for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->Timings;
            $fulldata[$i]['footfall']=$data[$i]->FootFallCount;
            $fulldata[$i]['Date']=$data[$i]->Date;
         
      }
        return   $fulldata;  

    }
    function getsodexoData($data){
 // print_r($data);die();
//$date = "'2019-12-09'";
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    $fromtime = "'".$data['fromtime']."'";
    $totime = "'".$data['totime']."'";
    // $meter = "'".$data['meter']."'";

    $fulldata=array();
    if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From')
    {

        $date = "'".$data['fromdate']."'";
        $date1 = $data['fromdate'];
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

            $query="select Consumption FROM protech_bms.app_device_station_consumtion where StationId=2019000077 and TxnDate=".$date." and LocationWithUtility='FootFall Male_RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
            $data = $this->db->query($query)->result();
            //echo $query;die();
            $m=0;
            for ($j=0; $j <count($data) ; $j++) {
            //echo $data[$j]->Consumption;
            $m +=round($data[$j]->Consumption);

            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=$m;
            $fulldata[$i]['Date']=$date1;

            $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2019000077,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
            $this->db->query($insQuery);
           

        }
        return $fulldata;

    } 
    else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From')
    {
        $date = "'".$data['fromdate']."'";
        $date1 = $data['fromdate'];
        $t=explode(':', $data['totime']);
        for ($i=0; $i < $t[0]; $i++) 
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
            
            $query="select Consumption FROM protech_bms.app_device_station_consumtion where StationId=2019000077 and TxnDate=".$date." and LocationWithUtility='FootFall Male_RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
            $data = $this->db->query($query)->result();
            //echo $query;die();
            $m=0;
            for ($j=0; $j <count($data) ; $j++) 
            {
                //echo $data[$j]->Consumption;
                $m +=round($data[$j]->Consumption);

            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=$m;
            $fulldata[$i]['Date']=$date1;
        }
        return $fulldata;
    }
}
function getsodexoDataCron(){
 
    $fulldata=array();
    
        //$date=date("Y-m-d");
        $date = date("Y-m-d", strtotime($date .' -1 day'));
        $date = "'".$date."'";
        
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

            $query="select Consumption FROM protech_bms.app_device_station_consumtion where StationId=2019000077 and TxnDate=".$date." and LocationWithUtility='FootFall Male_RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
            $data = $this->db->query($query)->result();
            //echo $query;die();
            $m=0;
            for ($j=0; $j <count($data) ; $j++) {
            //echo $data[$j]->Consumption;
            $m +=round($data[$j]->Consumption);

            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=$m;
            $fulldata[$i]['Date']=$date;

            $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2019000077,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",".$fulldata[$i]['Date'].")";
            //echo $insQuery;
            $this->db->query($insQuery);
           

        }
        return $fulldata;

     
    
}
}