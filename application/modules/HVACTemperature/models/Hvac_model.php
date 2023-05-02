<?php
class Hvac_model extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function getHVACList(){
        
       $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE MeterType = 0017 ";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getCompStatus1Timings($data){
        $MeterName = "'".$data['meters']."'";$fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";$totime = "'".$data['totime']."'";
        
        $query = "SELECT TxnDate,FromTime,ToTime FROM app_device_station_consumtion WHERE MeterType = 0017 AND UtilityName='Comp Status' AND LocationName=".$MeterName." AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime."  ORDER BY TxnDate";
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        //echo "<pre>";print_r($data);die();
        return $data;
    }
    function getDeltavalue($TxnDate,$FromTime,$ToTime,$meter){
        $FromTime="'".$FromTime."'";$ToTime ="'".$ToTime."'";
        $TxnDate = "'".$TxnDate."'";$meter = "'".$meter."'";
        
        $Returnquery = "SELECT ValueMax AS temp,TxnDate,FromTime FROM app_device_station_consumtion WHERE MeterType = 0017 AND UtilityName='Return Air Temp' AND LocationName=".$meter." AND TxnDate =".$TxnDate." AND FromTime =".$FromTime." AND ToTime=".$ToTime;
        $Supplyquery = "SELECT ValueMax AS temp FROM app_device_station_consumtion WHERE MeterType = 0017 AND UtilityName='Supply Air Temp'  AND LocationName=".$meter." AND TxnDate =".$TxnDate." AND FromTime =".$FromTime." AND ToTime=".$ToTime;
        //echo $Returnquery."<br> ".$Supplyquery;die();
        $data1 = $this->db->query($Returnquery)->result();
        $data2 = $this->db->query($Supplyquery)->result();
        $result['value'] = round($data1[0]->temp-$data2[0]->temp,1);
        $result['time'] = $data1[0]->TxnDate." ".$data1[0]->FromTime;
        return $result;
    }
    function getConsumptionData($data){
        $MeterName = "'".$data['meters']."'";$fromdate = "'".$data['fromdate']."'";$todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";$totime = "'".$data['totime']."'";
       
        $CompressorQuery ="SELECT SUM(Consumption) AS Compressor FROM app_device_station_consumtion WHERE MeterType = 0017 AND LocationName=".$MeterName." AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND  UtilityName='Comp Run Time'";
        $UnitQuery ="SELECT SUM(Consumption) AS Unit FROM app_device_station_consumtion WHERE MeterType = 0017 AND LocationName=".$MeterName." AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND  UtilityName='Unit Run Time'";
        //echo $CompressorQuery."<br>";echo $UnitQuery."<br>";die();
        $data1 = $this->db->query($CompressorQuery)->result();
        $data2 = $this->db->query($UnitQuery)->result();
        if($data2[0]->Unit==0){
           $res = 1; 
       }else{
        $res = round(($data1[0]->Compressor/$data2[0]->Unit)*100,2);
       }
        
        if($res>100){
            $res = 100;
        }
        return $res;
    }
    function getRuntimes($data){
        $MeterName = "'".$data['meters']."'";$fromdate = "'".$data['fromdate']."'";$todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";$totime = "'".$data['totime']."'";
      
        $cRunTimeQuery = "SELECT SUM((TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))) AS diff FROM app_device_station_consumtion WHERE MeterType = 0017 AND LocationName=".$MeterName." AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND UtilityName='Comp Run Time' AND FromTime<ToTime";
        $uRunTimeQuery = "SELECT SUM((TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))) AS diff FROM app_device_station_consumtion WHERE MeterType = 0017 AND LocationName=".$MeterName." AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND UtilityName='Unit Run Time' AND FromTime<ToTime";
        //echo $cRunTimeQuery."<br>";
        //echo $uRunTimeQuery."<br>";die();
        $cdata = $this->db->query($cRunTimeQuery)->result();
        $udata = $this->db->query($uRunTimeQuery)->result();
        $result[0] = $cdata[0]->diff;
        $result[1] = $udata[0]->diff;
        return $result;
    }
    function getReturnAirTemp($TxnDate,$FromTime,$ToTime,$meter){
        $FromTime="'".$FromTime."'";$ToTime ="'".$ToTime."'";
        $TxnDate = "'".$TxnDate."'";$meter = "'".$meter."'";
        
        $Returnquery = "SELECT ValueMax AS temp,TxnDate,FromTime FROM app_device_station_consumtion WHERE MeterType = 0017 AND UtilityName='Return Air Temp' AND LocationName=".$meter." AND TxnDate =".$TxnDate." AND FromTime =".$FromTime." AND ToTime=".$ToTime;
        //echo $Returnquery;die();
        $data1 = $this->db->query($Returnquery)->result();
        $result['temp'] = $data1[0]->temp;
        $result['TxnDate'] = $data1[0]->TxnDate;
        $result['FromTime'] = $data1[0]->FromTime;
        return $result;
    }
    function getFilterPressure($TxnDate,$FromTime,$ToTime,$meter){
        $FromTime="'".$FromTime."'";$ToTime ="'".$ToTime."'";
        $TxnDate = "'".$TxnDate."'";$meter = "'".$meter."'";
        
        $Returnquery = "SELECT ValueMax AS Pressure,TxnDate,FromTime FROM app_device_station_consumtion WHERE MeterType = 0017 AND UomName='Measure of Pressure' AND LocationName=".$meter." AND TxnDate =".$TxnDate." AND FromTime =".$FromTime." AND ToTime=".$ToTime;
        //echo   $Returnquery;die();
        $data1 = $this->db->query($Returnquery)->result();
        if(count($data1) == 0){
            return null;
        }
        $result['temp'] = $data1[0]->Pressure;
        $result['TxnDate'] = $data1[0]->TxnDate;
        $result['FromTime'] = $data1[0]->FromTime;
        return $result;
    }
}