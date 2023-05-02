<?php
class Prk_model extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function getPrkEnergyData($data){
        
        $date = "'".$data['date']."'";
        //$query="select id, UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (select id, UtilityName,TxnDate, FromTime, ToTime, Consumption ,UomScale from protech_bms.app_device_station_consumtion where TxnDate=".$date."  and StationId='2019000037'  order by id desc ) as sub where id=sub.id group by sub.UtilityName";
        // "SELECT round(sum(Consumption)) as consumption FROM Factory123.`dbo.2018000019_YC` where TxnDate='2018-03-21';"
        $query="select id, UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (
        select id, UtilityName,TxnDate, FromTime, ToTime, Consumption ,UomScale from protech_bms.app_device_station_consumtion where
         TxnDate=".$date."  and StationId='2019000037'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.UtilityName";
        $data = $this->db->query($query)->result();
        return $data;

    }
    function getEnergyList(){
        

        $query = "SELECT DISTINCT UtilityName AS MeterName FROM Factory123.`dbo.2018000019_YC` where UtilityGroup='SUP' limit 2";//"SELECT DISTINCT [LocationName] AS [MeterName] FROM ".$db.".[dbo].".$table." WHERE [MeterType] = 0017";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterList(){

        $query = "SELECT vname FROM dgnames WHERE clientid=534";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getConsumptionData($data){
         // print_r($data);die();
        
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        $meter = $data['meter'];
        
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
                
                $query = "SELECT Consumption  FROM Factory123.`dbo.2018000019_YC` where UtilityName='".$meter."' AND TxnDate='2018-06-06'  AND FromTime NOT BETWEEN '23:58:00' AND Consumption<50 AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                echo $query;die();

                $data = $this->db->query($query)->result();
                //echo count($data)."<br>";
                //echo  $query."<br>";
                $m=0;
                for ($j=0; $j <count($data) ; $j++) {
                    $m +=$data[$j]->Consumption;

                    # code...
                }
                if($m>60){
                    $s=60;
                }else{
                    $s=$m;
                }
               
                
                  $fuelfirst = "SELECT PrvReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";
                //echo  $fuelfirst."<br>";
                  $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                 // echo  $fuellast."<br>";
                   $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";
                //echo  $fueladd."<br>";
                        $dataConsumefirst = $this->db->query($fuelfirst)->result();
                        $dataConsumelast = $this->db->query($fuellast)->result();
                        $datafueladd = $this->db->query($fueladd)->result();
                        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                     //echo  $fuelconsume;die();                                        
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
                
                //print_r($fulldata);die();

                
            }
            
            //$data = $this->db->query($query)->result();
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
            //  if($i>9){
            //  $from =  $i.":00:00";
            //  $to =  ($i+1).":00:00";     
            // }else{
            //  $from =  "0".$i.":00:00";
            //  $to =  "0".($i+1).":00:00"; 
            // }
            $query = "SELECT CurReading,Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data = $this->db->query($query)->result();
                //echo count($data)."<br>";
                //echo  $query."<br>";
                $m=0;
                for ($j=0; $j <count($data) ; $j++) {
                    $m +=$data[$j]->Consumption;

                    # code...
                }
                if($m>60){
                    $s=60;
                }else{
                    $s=$m;
                }
                 $fuelfirst = "SELECT PrvReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id asc limit 1";

                  $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ORDER BY id desc limit 1";
                   $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."' ";

                        $dataConsumefirst = $this->db->query($fuelfirst)->result();
                        $dataConsumelast = $this->db->query($fuellast)->result();
                        $datafueladd = $this->db->query($fueladd)->result();
                        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
               
                //$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
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
       // die();
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
                //print_r($datesarray);die();
                for ($k=0; $k < count($datesarray); $k++) { 
                    $query =  "SELECT CurReading,Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";

                    //echo $query;die();
                    $data = $this->db->query($query)->result();
                   
                    $m=0;
                                for ($j=0; $j <count($data) ; $j++) {
                                    $m +=$data[$j]->Consumption;

                                   
                                }
                          $fuelfirst = "SELECT PrvReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id asc limit 1";

                  $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime." ORDER BY id desc limit 1";
                   $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
//echo $fuellast;die();
                        $dataConsumefirst = $this->db->query($fuelfirst)->result();
                        $dataConsumelast = $this->db->query($fuellast)->result();
                        $datafueladd = $this->db->query($fueladd)->result();
                        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);      
                                //$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
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
                            
                            //$data = $this->db->query($query)->result();
                            return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 
                    $query = "SELECT CurReading,Consumption  FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='DG_Running_Time' AND Consumption<50 AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'";
                   // echo $query;die();
                    

                    $data = $this->db->query($query)->result();
                   
                    $m=0;
                                for ($j=0; $j <count($data) ; $j++) {
                                    $m +=$data[$j]->Consumption;

                                    # code...
                                }
                                $fuelfirst = "SELECT PrvReading as first FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";

                  $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";
                   $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meter."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ";

                        $dataConsumefirst = $this->db->query($fuelfirst)->result();
                        $dataConsumelast = $this->db->query($fuellast)->result();
                        $datafueladd = $this->db->query($fueladd)->result();
                        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
                                
                                //$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
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
                            
                            //$data = $this->db->query($query)->result();
                            return $fulldata;
            }

                
                
                }

                            
                        }
                        //end
}