<?php
class Boiler_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getBoilersList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName='Fuel_Level'";//"SELECT DISTINCT [LocationName] AS [MeterName] FROM ".$db.".[dbo].".$table." WHERE [MeterType] = 0017";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    /*function getBoilerConsumptionData(){
    	$db = $this->session->userdata('DB');
    	$table = $this->session->userdata('Table');
    	$this->load->database($db);
    }*/
    function getDashBoilerRuningHours($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate=".$date;
		$data = $this->db->query($query)->result();
		//last week calculation 
		$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
		$data1 = $this->db->query($query1)->result();
		//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
		//echo $query2."<br>";
		$data2 = $this->db->query($query2)->result();
		//echo $data2[0]->RunningHours."<br>";
		//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		//echo $first_day_this_month." ".$yesterDay;
		$query3 = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
		$data3 = $this->db->query($query3)->result();
		//echo $data3[0]->RunningHours."<br>";
		$query4 = "SELECT SUM(Consumption) AS RunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'DG_Running_Time' AND TxnDate=".$yesterDay;
		$data4 = $this->db->query($query4)->result();

		return $data[0]->RunningHours.",".$data1[0]->RunningHours.",".$data2[0]->RunningHours.",".$data3[0]->RunningHours.",".$data4[0]->RunningHours;
    }
    function getDashBoilerAdded($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled'  AND TxnDate=".$date;
    	$data = $this->db->query($query)->result();
    	//last week calculation 
		$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
    	$data1 = $this->db->query($query1)->result();
    	//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled'  AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
    	$data2 = $this->db->query($query2)->result();
    	//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		$query3 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled'  AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
    	$data3 = $this->db->query($query3)->result();

    	$query4 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled'  AND TxnDate=".$date;
    	$data4 = $this->db->query($query4)->result();
    	return $data[0]->consumption.",".$data1[0]->consumption.",".$data2[0]->consumption.",".$data3[0]->consumption.",".$data4[0]->consumption;
    }
    function getDashBoilerConsumed($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed'  AND TxnDate=".$date;
    	$data = $this->db->query($query)->result();
    	//last week calculation 
		$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
    	$data1 = $this->db->query($query1)->result();
    	//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed'  AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
    	$data2 = $this->db->query($query2)->result();
    	//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		$query3 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed'  AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
    	$data3 = $this->db->query($query3)->result();

    	$query4 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel-Consumed'  AND TxnDate=".$yesterDay;
    	$data4 = $this->db->query($query4)->result();
    	return $data[0]->consumption.",".$data1[0]->consumption.",".$data2[0]->consumption.",".$data3[0]->consumption.",".$data4[0]->consumption;
    }
    function getDashBoilerHighConsumed($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT CONCAT(TxnDate,' ',FromTime) AS [DateTime],(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate=".$date;
    	$data = $this->db->query($query)->result();
    	$current = 0;$time = "";
    	foreach ($data as  $value) {
    		if($current<$value->sub && $value->sub>0){
    			$current = $value->sub;
    			$time = $value->DateTime;
    		}
    	}
    	$result['today']['time'] = $time;
    	$result['today']['con'] = round($current);
    	//last week calculation

		$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT CONCAT(TxnDate,' ',FromTime) AS [DateTime],(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
    	$data1 = $this->db->query($query1)->result();
    	$current1 = 0;$time1 = "";
    	foreach ($data1 as  $value) {
    		if($current1<$value->sub  && $value->sub>0){
    			$current1 = $value->sub;
    			$time1 = $value->DateTime;
    		}
    	}
    	$result['lastweek']['time'] = $time1;
    	$result['lastweek']['con'] = round($current1);
    	//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
    	$data2 = $this->db->query($query2)->result();
    	$current2 = 0;$time2 = "";
    	foreach ($data2 as  $value) {
    		if($current2<$value->sub  && $value->sub>0){
    			$current2 = $value->sub;
    			$time2 = $value->DateTime;
    		}
    	}
    	$result['lastmonth']['time'] = $time2;
    	$result['lastmonth']['con'] = round($current2);
    	//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		$query3 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
    	$data3 = $this->db->query($query3)->result();
    	$current3 = 0;$time3 = "";
    	foreach ($data3 as  $value) {
    		if($current3<$value->sub  && $value->sub>0){
    			$current3 = $value->sub;
    			$time3 = $value->DateTime;
    		}
    	}
    	$result['thismonth']['time'] = $time3;
    	$result['thismonth']['con'] = round($current3);
    	return $result;	
    }
    function getDashBoilerLowConsumed($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate=".$date;
    	$data = $this->db->query($query)->result();
    	$current = 20;$time = "";
    	foreach ($data as  $value) {
    		if($current>$value->sub && $value->sub>0){
    			$current = $value->sub;
    			$time = $value->DateTime;
    		}
    	}
    	$result['today']['time'] = $time;
    	$result['today']['con'] = round($current);
    	$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
    	$data1 = $this->db->query($query1)->result();
    	$current1 = 20;$time1 = "";
    	foreach ($data1 as  $value) {
    		if($current1>$value->sub && $value->sub>0){
    			$current1 = $value->sub;
    			$time1 = $value->DateTime;
    		}
    	}
    	$result['lastweek']['time'] = $time1;
    	$result['lastweek']['con'] = round($current1);
    	//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
    	$data2 = $this->db->query($query2)->result();
    	$current2 = 20;$time2 = "";
    	foreach ($data2 as  $value) {
    		if($current2>$value->sub && $value->sub>0){
    			$current2 = $value->sub;
    			$time2 = $value->DateTime;
    		}
    	}
    	$result['lastmonth']['time'] = $time2;
    	$result['lastmonth']['con'] = round($current2);
    	//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		$query3 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
    	$data3 = $this->db->query($query3)->result();
    	$current3 = 20;$time3 = "";
    	foreach ($data3 as  $value) {
    		if($current3>$value->sub && $value->sub>0){
    			$current3 = $value->sub;
    			$time3 = $value->DateTime;
    		}
    	}
    	$result['thismonth']['time'] = $time3;
    	$result['thismonth']['con'] = round($current3);
    	return $result;
    }
}