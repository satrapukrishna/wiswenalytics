<?php
class Fuel_consumtion_model extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function putDbData($data){
        if(count($data)>0){
            $row=$this->db->insert("app_device_station_consumtion",$data);
            return $row;

        }else{
            return false;

        }
        //print_r($data);die();

    }
    function putDbData1($data){
        if(count($data)>0){

            $row=$this->db->query($data);
            return $row;

        }else{
            return false;

        }
       

    }
    //mail purpose
    function getDailyMailData(){
       
                $yesterDay = date('Y-m-d',strtotime("-1 days"));
                $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName IN('Fuel_Level','Run Minutes') and LocationName Not in('Boiler_4A','Boiler_4B')";
                $meters = $this->db->query($query)->result();
                $meterList1=array($meters[1],$meters[3],$meters[4],$meters[2],$meters[0]);
                $meterList = array();
                for ($i=0; $i < count($meterList1); $i++) { 

                  array_push($meterList,$meterList1[$i]->MeterName);
                }
               
                $fulldata=array();
                //echo count($meters);die();
                //print_r($meters);die();
               // $meters=
                for ($k=0; $k < count($meterList); $k++) {
                $m=0; 
                $meter= $meterList[$k];
                if($meter=='Boiler_1&2'){

                           
                            $fulldata[$k]['meter']=$meter;
                            $fulldata[$k]['Time']=$yesterDay;
                            // $fulldata[$k]['runninghrs']=$m;
                            $fulldata[$k]['runninghrs']=0;
                            $fulldata[$k]['FuelAdded']="NA";
                            $fulldata[$k]['StartFuel']="NA";
                            $fulldata[$k]['EndFuel']="NA";
                            $fulldata[$k]['Fuelconsume']=0;
                            $fulldata[$k]['economy']=0;
                           
                         
                     }elseif($meter=='Boiler_2'){
                      $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName='Boiler_2' AND UtilityName='Run Minutes'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate='".$yesterDay."'";  
                       $dataruntday = $this->db->query($queryrunday)->result();
                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$yesterDay;
                    $fulldata[$k]['runninghrs']=$dataruntday[0]->RunningHours;
                    // $fulldata[$k]['runninghrs']=$m;
                    $fulldata[$k]['FuelAdded']="NA";
                    $fulldata[$k]['StartFuel']="NA";
                        $fulldata[$k]['EndFuel']="NA";
                        $fulldata[$k]['Fuelconsume']=0;
                    $fulldata[$k]['economy']=0;
                    
                    

                }elseif($meter==='Boiler_4'){
                    $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName in ('Boiler_4A','Boiler_4A') AND UtilityName='DG_Running_Time'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate='".$yesterDay."'";  
                    $fuelConsumetoday4a="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                $fuelConsumetoday4b="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName in('Boiler_4A','Boiler_4B') AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Filled' ";
                     $dataruntday = $this->db->query($queryrunday)->result();
                      $datacontday4a = $this->db->query($fuelConsumetoday4a)->result();
                     $datacontday4b = $this->db->query($fuelConsumetoday4b)->result();
                     $dataadtday = $this->db->query($fueladdToday)->result(); 

                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$yesterDay;
                    $fulldata[$k]['runninghrs']=$dataruntday[0]->RunningHours;
                    $fulldata[$k]['FuelAdded']=round($dataadtday[0]->fueladd);
                    $fulldata[$k]['StartFuel']=round($datacontday4a[0]->first+$datacontday4b[0]->first);
                    $fulldata[$k]['EndFuel']=round($datacontday4a[0]->last+$datacontday4b[0]->last);
                    $fulldata[$k]['Fuelconsume']=round(abs(abs(($datacontday4a[0]->first+$datacontday4b[0]->first)-($datacontday4a[0]->last+$datacontday4b[0]->last))-$dataadtday[0]->fueladd));
                    $fulldata[$k]['economy']=round($fulldata[$k]['Fuelconsume']/($dataruntday[0]->CumRunningHours/60));
                   
                    

              }elseif($meter==='Boiler_3'){
                 $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName='Boiler_3' AND UtilityName='DG_Running_Time'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate='".$yesterDay."'"; 
                  $fuelConsumetoday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_3' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_3' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                 $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_3' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Filled' ";
                    $dataruntday = $this->db->query($queryrunday)->result();
                     $datacontday = $this->db->query($fuelConsumetoday)->result();
                     $dataadtday = $this->db->query($fueladdToday)->result();
                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$yesterDay;
                    $fulldata[$k]['runninghrs']=$dataruntday[0]->RunningHours;
                    $fulldata[$k]['FuelAdded']=round($dataadtday[0]->fueladd);
                    $fulldata[$k]['StartFuel']=round($datacontday[0]->first);
                    $fulldata[$k]['EndFuel']=round($datacontday[0]->last);
                    $fulldata[$k]['Fuelconsume']=round(abs(abs($datacontday[0]->first-$datacontday[0]->last)-$dataadtday[0]->fueladd));
                    $fulldata[$k]['economy']=round($fulldata[$k]['Fuelconsume']/($dataruntday[0]->CumRunningHours/60));

              }elseif($meter==='Boiler_1'){
                $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName='Boiler_1' AND UtilityName='DG_Running_Time'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate='".$yesterDay."'"; 
                 $fuelConsumetoday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_1' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_1' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                 $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$yesterDay."' AND UtilityName='Fuel_Filled' ";
                 $dataruntday = $this->db->query($queryrunday)->result();
                 $datacontday = $this->db->query($fuelConsumetoday)->result();
                $dataadtday = $this->db->query($fueladdToday)->result();
                 $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$yesterDay;
                    $fulldata[$k]['runninghrs']=$dataruntday[0]->RunningHours;
                    $fulldata[$k]['FuelAdded']=round($dataadtday[0]->fueladd);
                    $fulldata[$k]['StartFuel']=round($datacontday[0]->first);
                    $fulldata[$k]['EndFuel']=round($datacontday[0]->last);
                     if($dataruntday[0]->CumRunningHours>0){
                        $fulldata[$k]['Fuelconsume']=round(abs(abs($datacontday[0]->first-$datacontday[0]->last)-$dataadtday[0]->fueladd));
                        $fulldata[$k]['economy']=round($fulldata[$k]['Fuelconsume']/($dataruntday[0]->CumRunningHours/60));
                     }else{
                        $fulldata[$k]['Fuelconsume']=0;
                        $fulldata[$k]['economy']=0;
                     }
                    
                    
              }
  
        }
              
                   return $fulldata;
            
    }
    //for PRK purpose
function getsodexoData($data){
 // print_r($data);die();

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
    //end
//for apollo purpose dummy
 function getApolloData($data){

$fromdate = "'".$data['fromdate']."'";
$todate = "'".$data['todate']."'";
$fromtime = "'".$data['fromtime']."'";
$totime = "'".$data['totime']."'";
$meter = "'".$data['meter']."'";

$fulldata=array();
if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

$date = "'".$data['fromdate']."'";
for ($i=0; $i < 24; $i++) { 
if($i>9){
$from =  $i.":00:00";
$to =  ($i+1).":00:00";    
}else{
$from =  "0".$i.":00:00";
$to =  "0".($i+1).":00:00"; 
}

    $query="select Consumption FROM protech_bms.app_device_station_consumtion where StationId=2018000087 and TxnDate=".$date." and UtilityName='DG_Running_Time' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
    $query1="select Consumption FROM protech_bms.app_device_station_consumtion where StationId=2018000087 and TxnDate=".$date." and UtilityName='Fuel-Consumed' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
    $data1 = $this->db->query($query1)->result();

    $data = $this->db->query($query)->result();

        $m=0;
        for ($j=0; $j <count($data) ; $j++) {
        if(($data[$j]->Consumption)>12){
        $m +=11;
        }else{
        $m +=round($data[$j]->Consumption);
        }

        }

        $m1=0;
        for ($j1=0; $j1 <count($data1) ; $j1++) {
        $m1 +=round($data1[$j1]->Consumption);

        # code...
        }

$fulldata[$i]['Time']=$from." To ".$to;
$fulldata[$i]['running']=$m;
$fulldata[$i]['consume']=$m1;

}


return $fulldata;

}
}
//end
function getFuelAddedData($data){
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

    function getFuelRunnData($data){
       // print_r($data);die();
        
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        $meter = $data['meter'];
       //echo $meter;die();
   
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

            $date = "'".$data['fromdate']."'";
            for ($i=0; $i < 24; $i++) { 
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
            //echo $meter;die();
                if($meter=='Boiler_1&2'){
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                    $query2 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_2' AND TxnDate=".$date." AND UtilityName ='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                    $data1 = $this->db->query($query1)->result();
                    $data2 = $this->db->query($query2)->result();
                    if($data1[0]->Consumption>0 && $data2[0]->Consumption>0){
                       $s= $data1[0]->Consumption;
                    }
                    $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                    $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";

                   $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$i]['meter']=$meter;
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['runninghrs']=$s;
                    $fulldata[$i]['FuelAdded']="NA";
                    if($s>0){
                    $fulldata[$i]['Fuelconsume']=$fuelconsume;
                    $fulldata[$i]['economy']=round($fuelconsume/($s/60),3);
                    }else{
                    $fulldata[$i]['Fuelconsume']=0;
                    $fulldata[$i]['economy']=0;
                    }

                    
                }elseif($meter=='Boiler_2'){
                     $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                     $data = $this->db->query($query)->result();
                     $s= $data[0]->Consumption;
                     $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                    $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";

                   $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$i]['meter']=$meter;
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['runninghrs']=$s;
                    $fulldata[$i]['FuelAdded']="NA";
                    if($s>0){
                    $fulldata[$i]['Fuelconsume']=$fuelconsume;
                    $fulldata[$i]['economy']=round($fuelconsume/($s/60),3);
                    }else{
                    $fulldata[$i]['Fuelconsume']=0;
                    $fulldata[$i]['economy']=0;
                    }


                }elseif($meter==='Boiler_4'){
                    $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                   // echo $query;die(); 
                     $data = $this->db->query($query)->result();
                     $s= $data[0]->Consumption;

                     $fuelfirst4AToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id desc limit 1";

                   $fuellast4AToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id asc limit 1";
                   $fuelfirst4BToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id desc limit 1";

                   $fuellast4BToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id asc limit 1";
                   $fueladd4Today = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' AND UtilityName='Fuel_Filled' ";
                    $dataConsumefirst4AToday = $this->db->query($fuelfirst4AToday)->result();
                    $dataConsumelast4AToday = $this->db->query($fuellast4AToday)->result();
                    $dataConsumefirst4BToday = $this->db->query($fuelfirst4BToday)->result();
                    $dataConsumelast4BToday = $this->db->query($fuellast4BToday)->result();
                    $datafueladdToday = $this->db->query($fueladd4Today)->result();
                    $A4consumeToday=abs(abs($dataConsumefirst4AToday[0]->first-$dataConsumelast4AToday[0]->last));
                    $B4consumeToday=abs(abs($dataConsumefirst4BToday[0]->first-$dataConsumelast4BToday[0]->last));
                    $consume4Today=$A4consumeToday+$B4consumeToday;
                    $fuelconsume4Today=abs($consume4Today-$datafueladdToday[0]->fueladd);
                    $fueladd=$datafueladdToday[0]->fueladd;
                    $fulldata[$i]['meter']=$meter;
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['runninghrs']=$s;
                    $fulldata[$i]['FuelAdded']=$fueladd;
                    if($s>0){
                    $fulldata[$i]['Fuelconsume']=$fuelconsume4Today;
                    $fulldata[$i]['economy']=round($fuelconsume4Today/($s/60),3);
                    }else{
                    $fulldata[$i]['Fuelconsume']=0;
                    $fulldata[$i]['economy']=0;
                    }


              } else{
                $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                    //echo $query;
                     $data = $this->db->query($query)->result();
                     $s= $data[0]->Consumption;
                     $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                   $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";
// echo $fuelfirst;die();
                  $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$i]['meter']=$meter;
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['runninghrs']=$s;
                    $fulldata[$i]['FuelAdded']=$datafueladd[0]->fueladd;
                    if($s>0){
                    $fulldata[$i]['Fuelconsume']=$fuelconsume;
                    $fulldata[$i]['economy']=round($fuelconsume/($s/60),3);
                    }else{
                    $fulldata[$i]['Fuelconsume']=0;
                    $fulldata[$i]['economy']=0;
                    }
              }    
                
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
            
                if($meter=='Boiler_1&2'){
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName in ('DG_Running_Time','Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                    $query2 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_2' AND TxnDate=".$date." AND UtilityName in ('DG_Running_Time','Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                    $data1 = $this->db->query($query1)->result();
                    $data2 = $this->db->query($query2)->result();
                    if($data1[0]->Consumption>0 && $data2[0]->Consumption>0){
                       $s= $data1[0]->Consumption;
                    }
                    $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                    $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";

                   $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$kt]['meter']=$meter;
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['runninghrs']=$s;
                    $fulldata[$kt]['FuelAdded']="NA";
                    if($s>0){
                    $fulldata[$kt]['Fuelconsume']=$fuelconsume;
                    $fulldata[$kt]['economy']=round($fuelconsume/($s/60),3);
                    }else{
                    $fulldata[$kt]['Fuelconsume']=0;
                    $fulldata[$kt]['economy']=0;
                    }
                    $kt++;
                }elseif($meter=='Boiler_2'){
                     $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                     $data = $this->db->query($query)->result();
                     $s= $data[0]->Consumption;
                     $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                    $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";

                   $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$kt]['meter']=$meter;
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['runninghrs']=$s;
                    $fulldata[$kt]['FuelAdded']="NA";
                    if($s>0){
                    $fulldata[$kt]['Fuelconsume']=$fuelconsume;
                    $fulldata[$kt]['economy']=round($fuelconsume/($s/60),3);
                    }else{
                    $fulldata[$kt]['Fuelconsume']=0;
                    $fulldata[$kt]['economy']=0;
                    }
                    $kt++;

                }elseif($meter==='Boiler_4'){
                    $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                   // echo $query;die(); 
                     $data = $this->db->query($query)->result();
                     $s= $data[0]->Consumption;

                     $fuelfirst4AToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id desc limit 1";

                   $fuellast4AToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id asc limit 1";
                   $fuelfirst4BToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id desc limit 1";

                   $fuellast4BToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'  ORDER BY id asc limit 1";
                   $fueladd4Today = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' AND UtilityName='Fuel_Filled' ";
                    $dataConsumefirst4AToday = $this->db->query($fuelfirst4AToday)->result();
                    $dataConsumelast4AToday = $this->db->query($fuellast4AToday)->result();
                    $dataConsumefirst4BToday = $this->db->query($fuelfirst4BToday)->result();
                    $dataConsumelast4BToday = $this->db->query($fuellast4BToday)->result();
                    $datafueladdToday = $this->db->query($fueladd4Today)->result();
                    $A4consumeToday=abs(abs($dataConsumefirst4AToday[0]->first-$dataConsumelast4AToday[0]->last));
                    $B4consumeToday=abs(abs($dataConsumefirst4BToday[0]->first-$dataConsumelast4BToday[0]->last));
                    $consume4Today=$A4consumeToday+$B4consumeToday;
                    $fuelconsume4Today=abs($consume4Today-$datafueladdToday[0]->fueladd);
                    $fueladd=$datafueladdToday[0]->fueladd;
                    $fulldata[$kt]['meter']=$meter;
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['runninghrs']=$s;
                    $fulldata[$kt]['FuelAdded']=$fueladd;
                    if($s>0){
                    $fulldata[$kt]['Fuelconsume']=$fuelconsume4Today;
                    $fulldata[$kt]['economy']=round($fuelconsume4Today/($s/60),3);
                    }else{
                    $fulldata[$kt]['Fuelconsume']=0;
                    $fulldata[$kt]['economy']=0;
                    }
                    $kt++;

              }else{
                $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                    //echo $query;
                     $data = $this->db->query($query)->result();
                     $s= $data[0]->Consumption;
                     $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                   $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";

                  $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$kt]['meter']=$meter;
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['runninghrs']=$s;
                    $fulldata[$kt]['FuelAdded']=$datafueladd[0]->fueladd;
                    if($s>0){
                    $fulldata[$kt]['Fuelconsume']=$fuelconsume;
                    $fulldata[$kt]['economy']=round($fuelconsume/($s/60),3);
                    }else{
                    $fulldata[$kt]['Fuelconsume']=0;
                    $fulldata[$kt]['economy']=0;
                    }
                    $kt++;
              }
            

        }
      
        return $fulldata;
    }
        else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
                for ($k=0; $k < count($datesarray); $k++) { 
                     if($meter=='Boiler_1&2'){

                            $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName in ('DG_Running_Time','Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                            $query2 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_2' AND TxnDate='".$datesarray[$k]."' AND UtilityName in ('DG_Running_Time','Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                            $data1 = $this->db->query($query1)->result();
                            $data2 = $this->db->query($query2)->result();
                            if($data1[0]->Consumption>0 && $data2[0]->Consumption>0){
                               $m= $data1[0]->Consumption;
                            }
                            $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ";
                            $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id asc limit 1";

                           $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id desc limit 1";
                            $dataConsumefirst = $this->db->query($fuelfirst)->result();
                            $dataConsumelast = $this->db->query($fuellast)->result();
                            $datafueladd = $this->db->query($fueladd)->result();
                            $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                            $fulldata[$k]['meter']=$meter;
                            $fulldata[$k]['Time']=$datesarray[$k];
                            $fulldata[$k]['runninghrs']=$m;
                            $fulldata[$k]['FuelAdded']="NA";
                            if($m>0){
                            $fulldata[$k]['Fuelconsume']=$fuelconsume;
                            $fulldata[$k]['economy']=round($fuelconsume/($m/60),3);
                            }else{
                            $fulldata[$k]['Fuelconsume']=0;
                            $fulldata[$k]['economy']=0;
                            }
                         
                     }elseif($meter=='Boiler_2'){
                     $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                     $data = $this->db->query($query)->result();
                     $m= $data[0]->Consumption;
                     $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ";
                    $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id asc limit 1";

                   $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['runninghrs']=$m;
                    $fulldata[$k]['FuelAdded']="NA";
                    if($m>0){
                    $fulldata[$k]['Fuelconsume']=$fuelconsume;
                    $fulldata[$k]['economy']=round($fuelconsume/($m/60),3);
                    }else{
                    $fulldata[$k]['Fuelconsume']=0;
                    $fulldata[$k]['economy']=0;
                    }
                    

                }elseif($meter==='Boiler_4'){
                    $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                   // echo $query;die(); 
                     $data = $this->db->query($query)->result();
                     $m= $data[0]->Consumption;

                     $fuelfirst4AToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."  ORDER BY id desc limit 1";

                   $fuellast4AToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."  ORDER BY id asc limit 1";
                   $fuelfirst4BToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."  ORDER BY id desc limit 1";

                   $fuellast4BToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."  ORDER BY id asc limit 1";
                   $fueladd4Today = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." AND UtilityName='Fuel_Filled' ";
                    $dataConsumefirst4AToday = $this->db->query($fuelfirst4AToday)->result();
                    $dataConsumelast4AToday = $this->db->query($fuellast4AToday)->result();
                    $dataConsumefirst4BToday = $this->db->query($fuelfirst4BToday)->result();
                    $dataConsumelast4BToday = $this->db->query($fuellast4BToday)->result();
                    $datafueladdToday = $this->db->query($fueladd4Today)->result();
                    $A4consumeToday=abs(abs($dataConsumefirst4AToday[0]->first-$dataConsumelast4AToday[0]->last));
                    $B4consumeToday=abs(abs($dataConsumefirst4BToday[0]->first-$dataConsumelast4BToday[0]->last));
                    $consume4Today=$A4consumeToday+$B4consumeToday;
                    $fuelconsume4Today=abs($consume4Today-$datafueladdToday[0]->fueladd);
                    $fueladd=$datafueladdToday[0]->fueladd;
                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['runninghrs']=$m;
                    $fulldata[$k]['FuelAdded']=$fueladd;
                    if($m>0){
                    $fulldata[$k]['Fuelconsume']=$fuelconsume4Today;
                    $fulldata[$k]['economy']=round($fuelconsume4Today/($m/60),3);
                    }else{
                    $fulldata[$k]['Fuelconsume']=0;
                    $fulldata[$k]['economy']=0;
                    }
                    

              }else{
                        
                        $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                        //echo $query;
                        $data = $this->db->query($query)->result();
                        $m= $data[0]->Consumption;
                        $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ";
                        $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id asc limit 1";

                        $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id desc limit 1";
                        $dataConsumefirst = $this->db->query($fuelfirst)->result();
                        $dataConsumelast = $this->db->query($fuellast)->result();
                        $datafueladd = $this->db->query($fueladd)->result();
                        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                        $fulldata[$k]['meter']=$meter;
                        $fulldata[$k]['Time']=$datesarray[$k];
                        $fulldata[$k]['runninghrs']=$m;
                        $fulldata[$k]['FuelAdded']=$datafueladd[0]->fueladd;
                        if($m>0){
                        $fulldata[$k]['Fuelconsume']=$fuelconsume;
                        $fulldata[$k]['economy']=round($fuelconsume/($m/60),3);
                        }else{
                        $fulldata[$k]['Fuelconsume']=0;
                        $fulldata[$k]['economy']=0;
                        }
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
                for ($k=0; $k < count($datesarray); $k++) { 
                     if($meter=='Boiler_1&2'){

                            $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName in ('DG_Running_Time','Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  ";
                            $query2 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_2' AND TxnDate='".$datesarray[$k]."' AND UtilityName in ('DG_Running_Time','Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND Consumption<50 AND '24:00:00' ";
                            $data1 = $this->db->query($query1)->result();
                            $data2 = $this->db->query($query2)->result();
                            if($data1[0]->Consumption>0 && $data2[0]->Consumption>0){
                               $s= $data1[0]->Consumption;
                            }
                            $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ";
                            $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id asc limit 1";

                           $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id desc limit 1";
                            $dataConsumefirst = $this->db->query($fuelfirst)->result();
                            $dataConsumelast = $this->db->query($fuellast)->result();
                            $datafueladd = $this->db->query($fueladd)->result();
                            $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                            $fulldata[$k]['meter']=$meter;
                            $fulldata[$k]['Time']=$datesarray[$k];
                            $fulldata[$k]['runninghrs']=$m;
                            $fulldata[$k]['FuelAdded']="NA";
                            if($m>0){
                            $fulldata[$k]['Fuelconsume']=$fuelconsume;
                            $fulldata[$k]['economy']=round($fuelconsume/($m/60),3);
                            }else{
                            $fulldata[$k]['Fuelconsume']=0;
                            $fulldata[$k]['economy']=0;
                            }
                         
                     }elseif($meter=='Boiler_2'){
                     $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  ";
                     $data = $this->db->query($query)->result();
                     $m= $data[0]->Consumption;
                     $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ";
                    $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id asc limit 1";

                   $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_1' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id desc limit 1";
                    $dataConsumefirst = $this->db->query($fuelfirst)->result();
                    $dataConsumelast = $this->db->query($fuellast)->result();
                    $datafueladd = $this->db->query($fueladd)->result();
                    $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['runninghrs']=$m;
                    $fulldata[$k]['FuelAdded']="NA";
                    if($m>0){
                    $fulldata[$k]['Fuelconsume']=$fuelconsume;
                    $fulldata[$k]['economy']=round($fuelconsume/($m/60),3);
                    }else{
                    $fulldata[$k]['Fuelconsume']=0;
                    $fulldata[$k]['economy']=0;
                    }
                    

                }elseif($meter==='Boiler_4'){
                    $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  ";
                    //echo $query."<br>"; 
                     $data = $this->db->query($query)->result();
                     $m= $data[0]->Consumption;

                     $fuelfirst4AToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'   ORDER BY id desc limit 1";

                   $fuellast4AToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'   ORDER BY id asc limit 1";
                   $fuelfirst4BToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'   ORDER BY id desc limit 1";

                   $fuellast4BToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'   ORDER BY id asc limit 1";
                   $fueladd4Today = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."'  AND UtilityName='Fuel_Filled' ";
                    $dataConsumefirst4AToday = $this->db->query($fuelfirst4AToday)->result();
                    $dataConsumelast4AToday = $this->db->query($fuellast4AToday)->result();
                    $dataConsumefirst4BToday = $this->db->query($fuelfirst4BToday)->result();
                    $dataConsumelast4BToday = $this->db->query($fuellast4BToday)->result();
                    $datafueladdToday = $this->db->query($fueladd4Today)->result();
                    $A4consumeToday=abs(abs($dataConsumefirst4AToday[0]->first-$dataConsumelast4AToday[0]->last));
                    $B4consumeToday=abs(abs($dataConsumefirst4BToday[0]->first-$dataConsumelast4BToday[0]->last));
                    $consume4Today=$A4consumeToday+$B4consumeToday;
                   //  echo $consume4Today."<br>";
                    $fuelconsume4Today=abs($consume4Today-$datafueladdToday[0]->fueladd);
                    //echo $fuelconsume4Today."<br>";
                    $fueladd=$datafueladdToday[0]->fueladd;
                    $fulldata[$k]['meter']=$meter;
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['runninghrs']=$m;
                    $fulldata[$k]['FuelAdded']=$fueladd;
                    if($m>0){
                    $fulldata[$k]['Fuelconsume']=$fuelconsume4Today;
                    $fulldata[$k]['economy']=round($fuelconsume4Today/($m/60),3);
                    }else{
                    $fulldata[$k]['Fuelconsume']=0;
                    $fulldata[$k]['economy']=0;
                    }
                    

              }else{
                        
                        $query = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50  ";
                        //echo $query;
                        $data = $this->db->query($query)->result();
                        $m= $data[0]->Consumption;
                        $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ";
                        $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id asc limit 1";

                        $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id desc limit 1";
                        $dataConsumefirst = $this->db->query($fuelfirst)->result();
                        $dataConsumelast = $this->db->query($fuellast)->result();
                        $datafueladd = $this->db->query($fueladd)->result();
                        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                        $fulldata[$k]['meter']=$meter;
                        $fulldata[$k]['Time']=$datesarray[$k];
                        $fulldata[$k]['runninghrs']=$m;
                        $fulldata[$k]['FuelAdded']=$datafueladd[0]->fueladd;
                        if($m>0){
                        $fulldata[$k]['Fuelconsume']=$fuelconsume;
                        $fulldata[$k]['economy']=round($fuelconsume/($m/60),3);
                        }else{
                        $fulldata[$k]['Fuelconsume']=0;
                        $fulldata[$k]['economy']=0;
                        }
                        }
                   
                                
                                
                            }
                            
                           
                            return $fulldata;
            }

                
                
                }

                            
                        }
                        //end
                    
    }
        
