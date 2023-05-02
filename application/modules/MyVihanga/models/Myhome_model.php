<?php
class Myhome_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getMyhomeReport($data){
    	
    	$date = "'".$data['date']."'";
        //$date = '"2020-02-21"';
    	
        // $query="select id, LocationWithUtility as UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (
        // select id, LocationWithUtility,TxnDate, FromTime, ToTime, Consumption ,UomScale from app_device_station_consumtion_myhome where
        //  TxnDate=".$date."  and StationId='2019000037'  order by ToTime desc 
        // ) as sub where id=sub.id group by sub.LocationWithUtility";
        $query="select id, LocationName as UtilityName,UomScale,TxnDate, TxnTime, Consumption from (
        select id, LocationName,TxnDate, TxnTime, Consumption ,UomScale from hardware_station_consumption_data_myhome where
         TxnDate=".$date."  and StationId='2019000037'  order by TxnTime desc 
        ) as sub where id=sub.id group by sub.LocationName";
        //echo $query;
		$data = $this->db->query($query)->result();
    	return $data;

    }
}