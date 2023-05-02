<?php
class Ambiance_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getOudorLevel($data){
        $resultArray=array();
        $date = "'".$data['fromdate']."'";
        $queryleft="SELECT ToTime,CurReading FROM app_device_station_consumtion_samsung where StationId=2020000004 and LocationWithUtility='Odour_Male left' and TxnDate=".$date." order by Id ASC";
         

         $queryright="SELECT ToTime,CurReading FROM app_device_station_consumtion_samsung where StationId=2020000004 and LocationWithUtility='Odour_Male Right' and TxnDate=".$date." order by Id ASC";
         $dataleft = $this->db->query($queryleft)->result();
         $dataright = $this->db->query($queryright)->result();
            
             $resultArray[0]['left']=$dataleft;
              $resultArray[0]['right']=$dataright;


          
     return $resultArray;
    }
    function getOudorLevelLiveDashboard(){
        $resultArray=array();
        $today=date("Y-m-d");
        $date = "'".$today."'";
        $queryleft="SELECT ToTime,CurReading FROM app_device_station_consumtion_samsung where StationId=2020000004 and LocationWithUtility='Odour_Male left' and TxnDate=".$date." order by Id ASC";
         

         $queryright="SELECT ToTime,CurReading FROM app_device_station_consumtion_samsung where StationId=2020000004 and LocationWithUtility='Odour_Male Right' and TxnDate=".$date." order by Id ASC";
         $dataleft = $this->db->query($queryleft)->result();
         $dataright = $this->db->query($queryright)->result();
            
             $resultArray[0]['left']=$dataleft;
              $resultArray[0]['right']=$dataright;


          
     return $resultArray;
    }

    function getFootfallHourly($data){
        $result=array();
        $date = "'".$data['date']."'";
        
        $query1="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2020000004' and UtilityName='FootFall Male_RestRoom' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2020000004' and UtilityName='FootFall Male_RestRoom' ORDER BY Id DESC LIMIT 1) as 'last'";
    }
    function getSodexoDataReport($toiletId){
        $result=array();
        //$date = "'".$data['date']."'";
        $date = "'2019-12-09'";
        //echo $data['date'];die();
        $query1="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2020000004' and LocationwithUtility='FootFall Male_RestRoom' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM app_device_station_consumtion WHERE TxnDate=".$date." and
             StationId='2020000004' and LocationwithUtility='FootFall Male_RestRoom' ORDER BY Id DESC LIMIT 1) as 'last'";
        //echo $query1;die();
        $query="select id, LocationwithUtility,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LocationwithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from app_device_station_consumtion_samsung where
         TxnDate=".$date."  and StationId='2020000004'  order by ToTime desc 
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
    	$date = "'".$data['date']."'";
    //$date = "'2020-02-29'";
    	//echo $data['date'];die();
        $query1="SELECT round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FootFall Male_Male RestRoom' and TxnDate=".$date." AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00' and StationId='2020000004'";

        $queryj1swp="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate=".$date." and StationId='2020000004'";
        $queryj2swp="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate=".$date." and StationId='2020000004'";

        $queryj1timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate=".$date." and LocationWithUtility='Janitor_1_RestRoom' and Consumption>0 and StationId='2020000004'";
        $queryj2timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate=".$date." and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 and StationId='2020000004'";
        
        $queryavg="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Average_RestRoom' and TxnDate=".$date." and StationId='2020000004'";
        $querygood="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Good_RestRoom' and TxnDate=".$date." and StationId='2020000004'";
        $querypoor="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Poor_RestRoom' and TxnDate=".$date." and StationId='2020000004'";
        
        $queryj1="SELECT CurReading,FromTime,ToTime FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate=".$date." and Consumption>0 and StationId='2020000004'";
        $queryj2="SELECT CurReading,FromTime,ToTime FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate=".$date." and Consumption>0 and StationId='2020000004' ";
        //echo $query1;die();
        $query="select id, LocationwithUtility,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LocationwithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.app_device_station_consumtion_samsung where
         TxnDate=".$date."  and StationId='2020000004'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LocationwithUtility";
		$data1 = $this->db->query($query1)->result();
        $data = $this->db->query($query)->result();
        $dataj1 = $this->db->query($queryj1)->result();
        $dataj2 = $this->db->query($queryj2)->result();
        $dataj1swp = $this->db->query($queryj1swp)->result();
        $dataj2swp = $this->db->query($queryj2swp)->result();

        $j1data = $this->db->query($queryj1timings)->result();
        $j2data = $this->db->query($queryj2timings)->result();
        //print_r($dataj2times);die();
        $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

        $j1vfd=0;
        $j2vfd=0;
        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=$dataj2times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=$dataj2times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
    
        $dataavg = $this->db->query($queryavg)->result();
        $datagood = $this->db->query($querygood)->result();
        $datapoor = $this->db->query($querypoor)->result();
        //end
       // print_r($data1);die();
        for ($i=0; $i < count($data); $i++) { 
           $stname =explode("-",$data[$i]->StationName);
            if($data[$i]->LocationwithUtility=='FootFall Male_Male RestRoom'){
                $result[0]['footfallcountMale']=$data1[0]->Consumption;
                $result[0]['TxnDate']=$data[$i]->TxnDate;
                    $result[0]['StationName']=$stname[2];
                    $result[0]['ToTime']=$data[$i]->ToTime;
            }elseif($data[$i]->LocationwithUtility=='Odour_Male left'){
                    $result[0]['OdourMaleLeft']=$data[$i]->CurReading;
                }
                elseif($data[$i]->LocationwithUtility=='Odour_Male Right'){
                    $result[0]['OdourMaleRight']=$data[$i]->CurReading;
                }        
        } 
        $result[0]['swiped']=$jani1+$jani2;
        $result[0]['verified']=$j1vfd+$j2vfd;
        if(isset($dataavg[0]->Consumption)){
        $result[0]['avg']=$dataavg[0]->Consumption;
        $result[0]['good']=$datagood[0]->Consumption;
        $result[0]['poor']=$datapoor[0]->Consumption;
        $result[0]['feedbacktotal']=$dataavg[0]->Consumption+$datagood[0]->Consumption+$datapoor[0]->Consumption;
        }else{
        $result[0]['avg']=0;
        $result[0]['good']=0;
        $result[0]['poor']=0;
        $result[0]['feedbacktotal']=0;
        }
    
        $queryFeedback = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap,HandTowelTime,ToiletrollTime,DustbinFullTime,NoDustbinTime,FloorDryTime,FloorWetTime,HandSoapTime FROM ToiletData where ToiletId='2020000004' and ToiletName='".$toiletId."'";
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
    function getSodexoReportMail($date){
        $result=array();

        
        $query1="SELECT round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FootFall Male_Male RestRoom' and TxnDate='".$date."' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00' and StationId='2020000004'";

        $queryj1swp="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate='".$date."' and StationId='2020000004'";
        $queryj2swp="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate='".$date."' and StationId='2020000004'";

        $queryj1timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate='".$date."' and LocationWithUtility='Janitor_1_RestRoom' and Consumption>0 and StationId='2020000004'";
        $queryj2timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate='".$date."' and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 and StationId='2020000004'";
        
        $queryavg="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Average_RestRoom' and TxnDate='".$date."' and StationId='2020000004'";
        $querygood="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Good_RestRoom' and TxnDate='".$date."' and StationId='2020000004'";
        $querypoor="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Poor_RestRoom' and TxnDate='".$date."' and StationId='2020000004'";
        
        $queryj1="SELECT CurReading,FromTime,ToTime FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate='".$date."' and Consumption>0 and StationId='2020000004'";
        $queryj2="SELECT CurReading,FromTime,ToTime FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate='".$date."' and Consumption>0 and StationId='2020000004' ";
        //echo $query1;die();
        $query="select id, LocationwithUtility,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LocationwithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.app_device_station_consumtion_samsung where
         TxnDate='".$date."'  and StationId='2020000004'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LocationwithUtility";
        $data1 = $this->db->query($query1)->result();
        $data = $this->db->query($query)->result();
        $dataj1 = $this->db->query($queryj1)->result();
        $dataj2 = $this->db->query($queryj2)->result();
        $dataj1swp = $this->db->query($queryj1swp)->result();
        $dataj2swp = $this->db->query($queryj2swp)->result();

        $j1data = $this->db->query($queryj1timings)->result();
        $j2data = $this->db->query($queryj2timings)->result();
        //print_r($dataj2times);die();
        $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
        // print_r($dataj1times);die();
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }
//print_r($dataj2times);die();
        $j1vfd=0;
        $j2vfd=0;
        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=$dataj2times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=$dataj2times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
    
        $dataavg = $this->db->query($queryavg)->result();
        $datagood = $this->db->query($querygood)->result();
        $datapoor = $this->db->query($querypoor)->result();
        //end
       // print_r($data1);die();
        for ($i=0; $i < count($data); $i++) { 
           $stname =explode("-",$data[$i]->StationName);
            if($data[$i]->LocationwithUtility=='FootFall Male_Male RestRoom'){
                $result[0]['footfallcountMale']=$data1[0]->Consumption;
                $result[0]['TxnDate']=$data[$i]->TxnDate;
                    $result[0]['StationName']=$stname[2];
                    $result[0]['ToTime']=$data[$i]->ToTime;
            }elseif($data[$i]->LocationwithUtility=='Odour_Male left'){
                    $result[0]['OdourMaleLeft']=$data[$i]->CurReading;
                }
                elseif($data[$i]->LocationwithUtility=='Odour_Male Right'){
                    $result[0]['OdourMaleRight']=$data[$i]->CurReading;
                }        
        } 
        $result[0]['swiped']=$jani1+$jani2;
        $result[0]['verified']=$j1vfd+$j2vfd;
        if(isset($dataavg[0]->Consumption)){
        $result[0]['avg']=$dataavg[0]->Consumption;
        $result[0]['good']=$datagood[0]->Consumption;
        $result[0]['poor']=$datapoor[0]->Consumption;
        $result[0]['feedbacktotal']=$dataavg[0]->Consumption+$datagood[0]->Consumption+$datapoor[0]->Consumption;
        }else{
        $result[0]['avg']=0;
        $result[0]['good']=0;
        $result[0]['poor']=0;
        $result[0]['feedbacktotal']=0;
        }
    
       
        return $result;

    }

     function getJanitorDataLiveDashboard(){
 
        $fulldata=array();
        $today=date("Y-m-d");

        $date = "'".$today."'";
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate=".$date." and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 and FromTime BETWEEN '".$from."' AND '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate=".$date." and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 and FromTime BETWEEN '".$from."' AND '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1+$jani2;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
        return $fulldata;

     
    
}
    function getJanitorData($data){
 // print_r($data);die();
//$date = "'2019-12-09'";
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    

    $fulldata=array();
    if($data['fromdate'] == $data['todate'] )
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

           //  $query="select SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate=".$date." and LocationWithUtility='Janitor_1_RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."'";
           //  $data = $this->db->query($query)->result();
           //  $queryj2="select SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate=".$date." and LocationWithUtility='Janitor_2_RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."'";
           //  $dataj2 = $this->db->query($queryj2)->result();
           // if(isset($data[0]->Consumption)){
           //      $jani1=$data[0]->Consumption;
           //  }else{
           //      $jani1=0;
           //  }
           //  if(isset($dataj2[0]->Consumption)){
           //      $jani2=$dataj2[0]->Consumption;
           //  }else{
           //      $jani2=0;
           //  }
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate=".$date." and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 and FromTime BETWEEN '".$from."' AND '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate=".$date." and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 and FromTime BETWEEN '".$from."' AND '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['jani1Swiped']=$jani1;
            $fulldata[$i]['jani2Swiped']=$jani2;
            $fulldata[$i]['jani1verified']=$j1vfd;
             $fulldata[$i]['jani2verified']=$j2vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
        return $fulldata;

    } 
    else{
        // echo "string";die();
               $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 

                 //    $query="select SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate='".$datesarray[$k]."' and LocationWithUtility='Janitor_1_RestRoom' ";
                 //     $data = $this->db->query($query)->result();
                 //     $queryj2="select SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate='".$datesarray[$k]."' and LocationWithUtility='Janitor_2_RestRoom' ";
                 //     $dataj2 = $this->db->query($queryj2)->result();
                 //     if(isset($data[0]->Consumption)){
                 // $jani1=$data[0]->Consumption;
                 //    }else{
                 //        $jani1=0;
                 //    }
                 //    if(isset($dataj2[0]->Consumption)){
                 // $jani2=$dataj2[0]->Consumption;
                 //    }else{
                 //        $jani2=0;
                 //    }
                    $queryj1timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_1_RestRoom' and TxnDate='".$datesarray[$k]."' and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 ";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung where UtilityName='Janitor_2_RestRoom' and TxnDate='".$datesarray[$k]."' and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0 ";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //echo count($j1data);die();
            //print_r($j2data);die();
            //jani1swiped
            if(count($j1data)>0){
                 $dataj1times=array();
        $k=0;
        for ($i=0; $i < count($j1data); $i++) { 
            for ($j=$i+1; $j <=($i+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            if(count($j2data)>0){
                $dataj2times=array();
        $k1=0;
        for ($i=0; $i < count($j2data); $i++) { 
            for ($j=$i+1; $j <=($i+1); $j++) { 
                
                $ts1 = strtotime($j2data[$i]->ToTime);
                $ts2 = strtotime($j2data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;
        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=$dataj2times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=$dataj2times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male left' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM app_device_station_consumtion_samsung where
                UtilityName='Odour_Male Right' and StationId=2020000004 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //j1 end
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['jani1Swiped']=$jani1;
                    $fulldata[$k]['jani2Swiped']=$jani2;
                    $fulldata[$k]['jani1verified']=$j1vfd;
                     $fulldata[$k]['jani2verified']=$j2vfd;

                   
            

                }
                 return $fulldata;
    }
}
function getFeedbackDataDayLive($data){

   

    $fulldata=array();
  
       $today=date("Y-m-d");
        $date = "'".$today."'";
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
 
            $querygood="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Good_RestRoom' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
            $queryavg="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Average_RestRoom' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
             $querypoor="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Poor_RestRoom' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'"; 
            // echo $querygood;die();
            $gooddata = $this->db->query($querygood)->result();
            $avgdata = $this->db->query($queryavg)->result();
            $poordata = $this->db->query($querypoor)->result();
          //  echo $gooddata[0]->Consumption;
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['good']=$gooddata[0]->Consumption;
            $fulldata[$i]['avg']=$avgdata[0]->Consumption;
            $fulldata[$i]['poor']=$poordata[0]->Consumption;
            
           

        }
        return $fulldata;

     
    
}
    function getFeedbackDataDay($data){

    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    

    $fulldata=array();
    if($data['fromdate'] == $data['todate'] )
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
 
            $querygood="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Good_RestRoom' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
            $queryavg="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Average_RestRoom' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
             $querypoor="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Poor_RestRoom' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'"; 
            // echo $querygood;die();
            $gooddata = $this->db->query($querygood)->result();
            $avgdata = $this->db->query($queryavg)->result();
            $poordata = $this->db->query($querypoor)->result();
          //  echo $gooddata[0]->Consumption;
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['good']=$gooddata[0]->Consumption;
            $fulldata[$i]['avg']=$avgdata[0]->Consumption;
            $fulldata[$i]['poor']=$poordata[0]->Consumption;
            
           

        }
        return $fulldata;

    } 
    else{
        // echo "string";die();
               $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 

               

             $querygood="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Good_RestRoom' and TxnDate='".$datesarray[$k]."'";
            $queryavg="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Average_RestRoom' and TxnDate='".$datesarray[$k]."'";
             $querypoor="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_samsung where UtilityName='FB Poor_RestRoom' and TxnDate='".$datesarray[$k]."'"; 
            $gooddata = $this->db->query($querygood)->result();
            $avgdata = $this->db->query($queryavg)->result();
            $poordata = $this->db->query($querypoor)->result();

                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['good']=$gooddata[0]->Consumption;
                    $fulldata[$k]['avg']=$avgdata[0]->Consumption;
                    $fulldata[$k]['poor']=$poordata[0]->Consumption;
                }
                 return $fulldata;
    }
}
    function getAndUpdateFeedbackData($data){

         $ToiletName = "Toilet02";

            $this->db->where("ToiletName",$ToiletName);
            $this->db->update("ToiletData",$data);    
          // print_r($this->db->last_query()); 
            if($this->db->affected_rows() >=0){
              return true; //add your code here
            }else{
              return false; //add your your code here
            }

    }
    function getAndUpdateSupervisorData($data){

          //print_r($data);die();
             if(count($data)>0){
            $row=$this->db->insert("SupervisorData",$data);
            return $row;

        }else{
            return false;

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
    function getSupervisorData($data,$tname){
        $date=$data['fromdate'];
        $querySup="SELECT * FROM SupervisorData  where CreatedDate='".$date."'";
        $dataSup = $this->db->query($querySup)->result();
        //print_r($dataSup);die();
        
        $resultarray=array();
        for ($i=0; $i < count($dataSup); $i++) { 
           
            $resultarray[$i]['HandTowel']=$dataSup[$i]->HandTowel;
            $resultarray[$i]['Toiletroll']=$dataSup[$i]->Toiletroll;
            $resultarray[$i]['Dustbin']=$dataSup[$i]->Dustbin;
            $resultarray[$i]['FloorWetDry']=$dataSup[$i]->FloorWetDry;
            $resultarray[$i]['HandSoap']=$dataSup[$i]->HandSoap;
            $resultarray[$i]['Odour']=$dataSup[$i]->Odour;
            $resultarray[$i]['Time']=$dataSup[$i]->Time;
             $resultarray[$i]['Feedback']=$dataSup[$i]->Feedback;
           
        }
        return $resultarray;
    }
    function getFeedbackDataObject($toiletId){
         $query = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap FROM ToiletData where ToiletId='2020000004' and ToiletName='".$toiletId."'";
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
       
     $query = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap FROM ToiletData where ToiletId='2020000004' and ToiletName='".$toiletId."'";
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

      $resQuery="SELECT * FROM SodexoFootFall where StationId=2020000004 and Date='".$date."'";
      //echo $resQuery;die();
      $data = $this->db->query($resQuery)->result();
      $fulldata=array();

      for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->Timings;
            $fulldata[$i]['footfall']=$data[$i]->FootFallCount;
            $fulldata[$i]['Date']=$data[$i]->Date;
         
      }
        return   $fulldata;  

    }
    function getsodexoDataLive(){


        $date = "'".date("Y-m-d")."'";
        $date1 = date("Y-m-d");
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

            $query="select round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate=".$date." and LocationWithUtility='FootFall Male_Male RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";
           // echo $query;die();
            $data = $this->db->query($query)->result();
            //echo count($data);
            if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
            }else{
                $footfall="0";
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=(int)$footfall;
            $fulldata[$i]['Date']=$date1;

           // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2020000004,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
            // $this->db->query($insQuery);
           

        }
        return $fulldata;
    }
    function getOdourRightLevelsMail($date){
         
         $result=array();
         $query60to120="SELECT CurReading,FromTime FROM app_device_station_consumtion_samsung where TxnDate='".$date."' and StationId=2020000004 and UtilityName='Odour_Male Right' and CurReading BETWEEN 60 AND 120 order by FromTime";
         $query120="SELECT CurReading,FromTime FROM app_device_station_consumtion_samsung where TxnDate='".$date."' and StationId=2020000004 and UtilityName='Odour_Male Right' and CurReading >120 order by FromTime";
         $data60to120 = $this->db->query($query60to120)->result();
         $data120 = $this->db->query($query120)->result();
         $result[0]=$data60to120;
         $result[1]=$data120;
         return $result;

    }
    function getOdourLeftLevelsMail($date){
        
         $result=array();
         $query60to120="SELECT CurReading,FromTime FROM app_device_station_consumtion_samsung where TxnDate='".$date."' and StationId=2020000004 and UtilityName='Odour_Male left' and CurReading BETWEEN 60 AND 120 order by FromTime";
         $query120="SELECT CurReading,FromTime FROM app_device_station_consumtion_samsung where TxnDate='".$date."' and StationId=2020000004 and UtilityName='Odour_Male left' and CurReading >120 order by FromTime";
         $data60to120 = $this->db->query($query60to120)->result();
         $data120 = $this->db->query($query120)->result();
         $result[0]=$data60to120;
         $result[1]=$data120;
         return $result;

    }
    function getsodexoDataMail($date){


        $resultfoot=array();
        $resultDataFoot=array();
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

            $query="select round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate='".$date."' and LocationWithUtility='FootFall Male_Male RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";
           // echo $query;die();
            $data = $this->db->query($query)->result();
            //echo count($data);
            if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
            }else{
                $footfall=0;
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=(int)$footfall;
            $fulldata[$i]['Date']=$date1;
            if($footfall>0){
                 array_push($resultfoot, $footfall);
            }
           
         
           

        }
        $minvalue=min($resultfoot);
        $maxvalue=max($resultfoot);
       
        for ($i=0; $i < count($fulldata); $i++) { 
            if($fulldata[$i]['footfall']==$minvalue){
                $resultDataFoot[0]['min']=$minvalue;
                $resultDataFoot[0]['Time']=$fulldata[$i]['Time'];
            }
            if($fulldata[$i]['footfall']==$maxvalue){
                $resultDataFoot[1]['max']=$maxvalue;
                $resultDataFoot[1]['Time']=$fulldata[$i]['Time'];
            }
            //echo $fulldata[$i]['footfall'];
            # code...
        }


        return $resultDataFoot;
    }
    function getOdourLeftDataMail($date){

      
      $query="SELECT ToTime,CurReading FROM app_device_station_consumtion_samsung where StationId=2020000004 and LocationWithUtility='Odour_Male left' and TxnDate='".$date."'";
      //echo $query;
       $data = $this->db->query($query)->result();
       $fulldata=array();
       $resultodour=array();
       $resultodourfulldata=array();
       //print_r($data[0]->CurReading);
       for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->ToTime;
            $fulldata[$i]['odour']=(int)$data[$i]->CurReading;
           // $fulldata[$i]['Date']=$date1;
            if($data[$i]->CurReading>0){
                 array_push($resultodour, $data[$i]->CurReading);
            }
       }
       $minvalue=min($resultodour);
       $maxvalue=max($resultodour);
      
        for ($i=0; $i < count($fulldata); $i++) { 
            if($fulldata[$i]['odour']==$minvalue){
                $resultodourfulldata[0]['min']=$minvalue;
                $resultodourfulldata[0]['Time']=$fulldata[$i]['Time'];
            }
            if($fulldata[$i]['odour']==$maxvalue){
                $resultodourfulldata[1]['max']=$maxvalue;
                $resultodourfulldata[1]['Time']=$fulldata[$i]['Time'];
            }
            //echo $fulldata[$i]['footfall'];
            # code...
        }
        return $resultodourfulldata;
//print_r($resultodourfulldata);


    }
    function getOdourRightDataMail($date){

       
      $query="SELECT ToTime,CurReading FROM app_device_station_consumtion_samsung where StationId=2020000004 and LocationWithUtility='Odour_Male Right' and TxnDate='".$date."'";
      //echo $query;
       $data = $this->db->query($query)->result();
       $fulldata=array();
       $resultodour=array();
       $resultodourfulldata=array();
       //print_r($data[0]->CurReading);
       for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->ToTime;
            $fulldata[$i]['odour']=(int)$data[$i]->CurReading;
           // $fulldata[$i]['Date']=$date1;
            if($data[$i]->CurReading>0){
                 array_push($resultodour, $data[$i]->CurReading);
            }
       }
       $minvalue=min($resultodour);
       $maxvalue=max($resultodour);
      
        for ($i=0; $i < count($fulldata); $i++) { 
            if($fulldata[$i]['odour']==$minvalue){
                $resultodourfulldata[0]['min']=$minvalue;
                $resultodourfulldata[0]['Time']=$fulldata[$i]['Time'];
            }
            if($fulldata[$i]['odour']==$maxvalue){
                $resultodourfulldata[1]['max']=$maxvalue;
                $resultodourfulldata[1]['Time']=$fulldata[$i]['Time'];
            }
            //echo $fulldata[$i]['footfall'];
            # code...
        }
        return $resultodourfulldata;
//print_r($resultodourfulldata);


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
    if($data['fromdate'] == $data['todate'] )
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

            $query="select round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate=".$date." and LocationWithUtility='FootFall Male_Male RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";
            $data = $this->db->query($query)->result();
           if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
            }else{
                $footfall="0";
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=$footfall;
            $fulldata[$i]['Date']=$date1;

           // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2020000004,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
           // $this->db->query($insQuery);
           

        }
        return $fulldata;

    } 
    else{
        // echo "string";die();
               $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 

                    $query="select round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate='".$datesarray[$k]."' and LocationWithUtility='FootFall Male_Male RestRoom' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";
                     $data = $this->db->query($query)->result();
                     if(isset($data[0]->Consumption)){
                 $footfall=$data[0]->Consumption;
                    }else{
                        $footfall="0";
                    }
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['footfall']=$footfall;
                    $fulldata[$k]['Date']=$datesarray[$k];

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

            $query="select Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate=".$date." and LocationWithUtility='FootFall Male_RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";
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

            $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2020000004,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",".$fulldata[$i]['Date'].")";
            //echo $insQuery;
            $this->db->query($insQuery);
           

        }
        return $fulldata;

     
    
}
function getTimings(){
     $query="SELECT DISTINCT FromTime,ToTime,Consumption FROM app_device_station_consumtion_samsung 
where UtilityName='Janitor_2_RestRoom' and TxnDate='2020-02-01' and LocationWithUtility='Janitor_2_RestRoom' and Consumption>0";
            $data = $this->db->query($query)->result();
            return $data;
}
}