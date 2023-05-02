<?php
class Boiler_graph_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getBoilersMeterList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName IN('Fuel_Level','Run Minutes') and LocationName Not in('Boiler_4A','Boiler_4B')";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    function getBoilerGraphData($data){
    	
    	$fromdate = "'".$data['fromdate']."'";
    	$todate = "'".$data['todate']."'";
    	$fromtime = "'".$data['fromtime']."'";
    	$totime = "'".$data['totime']."'";
    	$meter = "'".$data['meter']."'";
    	if($data['fromdate'] == $data['todate']){
    		$date = "'".$data['fromdate']."'";
            if($data['meter']==='Boiler_4'){
                $query4A = "SELECT CONCAT(TxnDate,' ',ToTime) AS DateTime,CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime." order by Id ASC" ;
                $query4B = "SELECT CONCAT(TxnDate,' ',ToTime) AS DateTime,CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime." order by Id ASC" ;
                $data4A = $this->db->query($query4A)->result();
                $data4B = $this->db->query($query4B)->result();
                $b4array=array();
                $FuelArray =array();
                $kt=0;
                for ($i=1; $i < count($data4A); $i++) { 
                    if($kt==0){
                        $timestamp = strtotime($data4A[$i]->DateTime);
                        $new_date_format = date('Y-m-d H:i:s', $timestamp);

                        $FuelArray[0][0] = $new_date_format;
                        $FuelArray[0][1] = 0;
                        $kt++;
                        }
                        $FuelArray[$i][0] = $data4A[$i]->DateTime;
                        $FuelArray[$i][1] = (float)$data4A[$i]->CurReading+(float)$data4B[$i]->CurReading;
                }
                return $FuelArray;
                //echo $query;die();
            }else{
                $query = "SELECT CONCAT(TxnDate,' ',ToTime) AS DateTime,CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime." order by Id ASC" ;
                $fuelData = $this->db->query($query)->result();
                $FuelArray =array();
                    $kt=0;
                    for ($i=1; $i < count($fuelData)-1; $i++) { 
                        if($kt==0){
                            $timestamp = strtotime($fuelData[$i]->DateTime);
                        $new_date_format = date('Y-m-d H:i:s', $timestamp);

                        $FuelArray[0][0] = $new_date_format;
                        $FuelArray[0][1] = 0;
                        $kt++;
                        }
                        $FuelArray[$i][0] = $fuelData[$i]->DateTime;
                        $FuelArray[$i][1] = (float)$fuelData[$i]->CurReading;
                    }
                return $FuelArray;
            }
    		
            //echo $query;
    		
    	}
    	else{
            if($data['meter']==='Boiler_4'){
                
                $query4A = "SELECT CONCAT(TxnDate,' ',ToTime) AS DateTime,CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." order by Id ASC" ;
                $query4B = "SELECT CONCAT(TxnDate,' ',ToTime) AS DateTime,CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." order by Id ASC" ;
                $data4A = $this->db->query($query4A)->result();
                $data4B = $this->db->query($query4B)->result();
                $b4array=array();
                $FuelArray =array();
                $kt=0;
                for ($i=1; $i < count($data4A); $i++) { 
                    if($kt==0){
                        $timestamp = strtotime($data4A[$i]->DateTime);
                        $new_date_format = date('Y-m-d H:i:s', $timestamp);

                        $FuelArray[0][0] = $new_date_format;
                        $FuelArray[0][1] = 0;
                        $kt++;
                        }
                        $FuelArray[$i][0] = $data4A[$i]->DateTime;
                        $FuelArray[$i][1] = (float)$data4A[$i]->CurReading+(float)$data4B[$i]->CurReading;
                }
                return $FuelArray;
            }else{
                $query = "SELECT CONCAT(TxnDate,' ',ToTime) AS DateTime,CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime." order by Id ASC";
                $fuelData = $this->db->query($query)->result();
                $FuelArray =array();
                    $kt=0;
                    for ($i=1; $i < count($fuelData)-1; $i++) { 
                        if($kt==0){
                            $timestamp = strtotime($fuelData[$i]->DateTime);
                        $new_date_format = date('Y-m-d H:i:s', $timestamp);

                        $FuelArray[0][0] = $new_date_format;
                        $FuelArray[0][1] = 0;
                        $kt++;
                        }
                        $FuelArray[$i][0] = $fuelData[$i]->DateTime;
                        $FuelArray[$i][1] = (float)$fuelData[$i]->CurReading;
                    }
                return $FuelArray;
            }
    		
            //echo $query;die();
    		//$data = $this->db->query($query)->result();
    		//return $data;
    	}
    	
    }
    function getBoilerRuningHours($data){
    	$fromdate = "'".$data['fromdate']."'";
    	$todate = "'".$data['todate']."'";
    	$fromtime = "'".$data['fromtime']."'";
    	$totime = "'".$data['totime']."'";
    	$meter = "'".$data['meter']."'";
    	
    	if($data['fromdate'] == $data['todate']){
    		$date = "'".$data['fromdate']."'";
    		$query = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
    		$data = $this->db->query($query)->result();
    		return $data;
    	}else{
    		$query = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
    		$data = $this->db->query($query)->result();
    		return $data;
    	}
    }
    function getFuelFilled($data){
    	$fromdate = "'".$data['fromdate']."'";
    	$todate = "'".$data['todate']."'";
    	$fromtime = "'".$data['fromtime']."'";
    	$totime = "'".$data['totime']."'";
    	$meter = "'".$data['meter']."'";
    	
    	if($data['fromdate'] == $data['todate']){
    		$date = "'".$data['fromdate']."'";
    		$query = "SELECT SUM(Consumption) AS FuelFill FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled' AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
    		$data = $this->db->query($query)->result();
    		return $data;
    	}
    	else{

    		$query = "SELECT SUM(Consumption) AS FuelFill FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled' AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
    		$data = $this->db->query($query)->result();
    		return $data;
    	}
    }
    function getFuelConsumed($data){
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        $meter = "'".$data['meter']."'";
        
        if($data['fromdate'] == $data['todate']){
            $date = "'".$data['fromdate']."'";
            $query = "SELECT SUM(Consumption) AS consumption FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed' AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
            $data = $this->db->query($query)->result();
            return $data[0]->consumption;
        }
        else{

            $query = "SELECT SUM(Consumption) AS consumption FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed' AND TxnDate BETWEEN ".$fromdate." AND ".$todate." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
            $data = $this->db->query($query)->result();
            return $data[0]->consumption;
        }
    }
    function getFuelConsumedDummy($data){
    	$fromdate = "'".$data['fromdate']."'";
    	$todate = "'".$data['todate']."'";
    	$fromtime = "'".$data['fromtime']."'";
    	$totime = "'".$data['totime']."'";
    	$meter = "'".$data['meter']."'";
    	
    	if($data['fromdate'] == $data['todate']){
    		$date = "'".$data['fromdate']."'";
    		$start = explode(":", $data['fromtime']);
    		$end = explode(":", $data['totime']);
    		$j = $end[0];$list = "";$options = array();
            for($i=intval($start[0]),$k=0;$i<=$j ;$i++,$k++){
	            if($i<10)
	            $options[$k] =  "0".$i.":00:00";
	            else
	            $options[$k] =  $i.":00:00";
	    	}
	    	//print_r($options);
	    	$m = 0;
	    	$consumption = array();
            for ($i=0; $i < count($options)-1; $i++) { 
            	$start1 = "'".$options[$i]."'";
            	$start2mid = explode(":", $options[$i]);
            	$start2 = "'".$start2mid[0].":"."10:00"."'";
            	$end1 = "'".$start2mid[0].":"."50:00"."'";         	
            	$end2 = "'".$options[$i+1]."'"; 
            	//echo $start1." ".$start2." ".$end1." ".$end2."<br>";
            	$query1 = "SELECT  CurReading AS level FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND TxnDate=".$date." AND FromTime BETWEEN ".$start1." AND ".$start2;
            	$query2 = "SELECT CurReading AS level FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND TxnDate=".$date." AND FromTime BETWEEN ".$end1." AND ".$end2;
            	//echo $query1."<br>";
            	//echo $query2."<br>";
            	$data1 = $this->db->query($query1)->result();
            	$data2 = $this->db->query($query2)->result();
            	//print_r($data1);print_r($data2);echo "<br>";
            	if(!empty($data2)){
            		$consumptiondata  = $data1[0]->level-$data2[0]->level;
            		if($consumptiondata>10){
            			$consumption[$m] = $consumptiondata;
            			$m++;
            		}
            	}
            }
            //print_r($consumption);
            $total =array_sum($consumption);
            $query3 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled'  AND TxnDate=".$date." AND FromTime BETWEEN ".$fromtime." AND ".$totime;
            $data3 = $this->db->query($query3)->result();
            //echo $total." ".$data3[0]->consumption;die();
            //return $total;
            //echo $data3[0]->consumption."<br>";
            //echo $total;die();
            if($total < $data3[0]->consumption){
            	return $data3[0]->consumption;
            }else{
            	return $total;
            }
    	}else{
            $query3 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed'  AND TxnDate BETWEEN ".$fromdate." AND ".$todate;
            $data3 = $this->db->query($query3)->result();
            return $data3[0]->consumption;
        }
    }
}