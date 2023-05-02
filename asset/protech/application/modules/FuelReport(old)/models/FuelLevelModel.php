<?php
class FuelLevelModel extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getFuelMetersList(){
    	$db = $this->session->userdata('DB');
    	$table = $this->session->userdata('Table');
    	$this->load->database($db);//, [MeterSerial],'_'
        $query = "SELECT DISTINCT CONCAT( [UtilityName],'_',[LocationName] ) AS [MeterName] FROM [Factory123].[dbo].[2018000087_YC] WHERE [UtilityName]='Fuel_Level'";// AND [UtilityName] LIKE 'EB_%'
    	$data = $this->db->query($query)->result();
    	return $data;
    }
}
?>