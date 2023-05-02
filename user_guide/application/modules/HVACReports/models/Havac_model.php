<?php
class Havac_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getHavcReport($data){
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query="select id, UtilityName,LocationName,UomScale,TxnDate, FromTime, ToTime, ValueMax from (
		select id, UtilityName,TxnDate, FromTime, ToTime, ValueMax ,LocationName,UomScale from protech_bms.app_device_station_consumtion where
		 TxnDate=".$date." and LocationName=".$meter." and StationId='2018000087'  order by id desc 
		) as sub where id=sub.id group by sub.UtilityName";
		$data = $this->db->query($query)->result();
    	return $data;

    }
    function getHavcList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE MeterType=17";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
}