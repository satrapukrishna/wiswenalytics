<?php
class Protech_data_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function get_devices_list($cat_id){
		$this->db->select('hardware_device');
        $this->db->from('hardware');        
        
		$this->db->where('client_id',41);  
		$this->db->where('status',1);
		$this->db->where('hardware_category',$cat_id);
        $this->db->group_by('hardware_device');
        $res = $this->db->get()->result_array();        
		// echo $this->db->last_query();die();       
        return $res;
	}
	function get_device_name($id){
		$this->db->select('device_name');
        $this->db->from('hardware_device');     
        //$this->db->where('status',1);     
		$this->db->where('device_id', $id);
         
        $res = $this->db->get()->result();  
		//echo $this->db->last_query();exit;     
        return $res;
	}
	function get_hardwares_device_list1($device_id){
		$this->db->select('');
        $this->db->from('hardware as h');        
		$this->db->join('hardware_device as hd', 'hd.device_id=h.hardware_device','left');
		
		$this->db->where('h.client_id',41);
		if($device_id!=''){
			$this->db->where('h.hardware_device',$device_id);
		}	 
		
		$this->db->where('h.status',1);	  
        // $this->db->group_by('h.hardware_device');
        $res = $this->db->get()->result_array();  
		// echo $this->db->last_query();exit;
        return $res;
	}
	function get_hardwares_device_data_iaq($data){
		$dashboardName=$data['dashboard_name'];		
		$utilityName=$data['UtilityName'];
		$locationName=$data['LocationName'];
		$todayDate=date("Y-m-d");
		$tempQuery="SELECT MIN(CurReading) as min,MAX(CurReading) as max,round(AVG(CurReading),2) as avg FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Room Temp' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		$humidityQuery="SELECT MIN(CurReading) as min,MAX(CurReading) as max,round(AVG(CurReading),2) as avg FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Humidity' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		$tempdata = $this->db->query($tempQuery)->result_array();
		$humiditydata = $this->db->query($humidityQuery)->result_array();

		$tempQueryGraph="SELECT round(CurReading*9/5+32,2) as CurReading,TxnTime FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Room Temp' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		// echo $tempQueryGraph;die();
		$humidityQueryGraph="SELECT CurReading,TxnTime FROM `protech_narayana_device_data` WHERE TxnDate='".$todayDate."' AND LineConnected='Humidity' AND LocationName='".$locationName."' ORDER BY `TxnTime` ASC;";
		$tempdatagraph = $this->db->query($tempQueryGraph)->result_array();
		$humiditydatagraph = $this->db->query($humidityQueryGraph)->result_array();

		if(is_null( $tempdata[0]['min'])){
			$resdata['meter']=$dashboardName;
			$resdata['tempMin']="NA";
			$resdata['tempMax']="NA";
			$resdata['tempAvg']="NA";
			$resdata['humMin']="NA";
			$resdata['humMax']="NA"; 
			$resdata['humAvg']="NA";
			$resdata['tempGraph']="NA";
			$resdata['humiGraph']="NA";
		}else{
			$resdata['meter']=$dashboardName;
			$resdata['tempMin']=round($tempdata[0]['min']*9/5+32,2);
			$resdata['tempMax']=round($tempdata[0]['max']*9/5+32,2);
			$resdata['tempAvg']=round($tempdata[0]['avg']*9/5+32,2);
			$resdata['humMin']=$humiditydata[0]['min'];
			$resdata['humMax']=$humiditydata[0]['max'];
			$resdata['humAvg']=$humiditydata[0]['avg'];
			$resdata['tempGraph']=$tempdatagraph;
			$resdata['humiGraph']=$humiditydatagraph;
		}
		    
			return $resdata;

	}
	
	
	
}