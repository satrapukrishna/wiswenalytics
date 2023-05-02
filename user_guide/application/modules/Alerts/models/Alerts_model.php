<?php
class Alerts_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getMyhomeReport($data){
    	
    	$date = "'".$data['date']."'";
    	$query="select id, UtilityName,UomScale,TxnDate, FromTime, ToTime, Consumption from (
		select id, UtilityName,TxnDate, FromTime, ToTime, Consumption ,UomScale from protech_bms.app_device_station_consumtion where
		 TxnDate=".$date."  and StationId='2019000037'  order by id desc 
		) as sub where id=sub.id group by sub.UtilityName";
		$data = $this->db->query($query)->result();
    	return $data;

    }
}