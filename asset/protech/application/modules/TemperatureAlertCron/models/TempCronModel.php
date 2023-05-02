<?php
class TempCronModel extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getActiveAlerts(){
    	$db = '[protech_bms]';//echo $db;die();
        $table = '[app_temp_alerts]';
        $this->load->database($db);
        $query = "SELECT * FROM ".$db.".[dbo].".$table;
        $data = $this->db->query($query)->result();
        return $data;
    }
}
?>