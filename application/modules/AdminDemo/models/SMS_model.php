<?php
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
	function get_clients()
    {        
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_id', 9);
        $user = $this->db->get();
        return $user;
    }
	
	function getFirepampAlertsData($data){
		$station_id=$data['station_id'];
		$api_name=$data['api_name'];
		$LineConnected=$data['LineConnected'];
		
        // $todayDate=date('Y-m-d');
        $todayDate='2020-07-11';
        
		$resultArray=array();
       
            $query="SELECT * FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'  ORDER BY TxnTime DESC limit 1";
            
			$res=$this->db->query($query)->result();
			
			$query1="SELECT sum(Consumption)as total_consumption FROM hardware_station_consumption_data where UtilityName='".$api_name."' and LineConnected='Unit RHT' and StationId='".$station_id."' and TxnDate='".$todayDate."'";
            
			$res1=$this->db->query($query1)->result();
			
            if(count($res)>0){
				$resultArray['meter']=$api_name;
				$resultArray['RunningStatus']=$res[0]->Consumption;
				$resultArray['LineConnected']=$res[0]->LineConnected;
				$resultArray['TxnDate']=$res[0]->TxnDate;
				$resultArray['TxnTime']=$res[0]->TxnTime;
				$resultArray['total_consumption']=$res1[0]->total_consumption;
			}
			
        // echo "<pre>";print_r($resultArray);
       return $resultArray;
	}
	function insert_alertsdata($data){
		// print_r($data);die();
		if (count($data) > 0) {
            $res = $this->db->insert('firepump_alerts_data', $data);
            return $res;
        }
        return false;
	}
	function insert_alerts_notification($data){
		if (count($data) > 0) {
            $res = $this->db->insert('alerts', $data);
            return $res;
        }
        return false;
	}
	function getFirepampAlertsData_check($data){
		 $query="SELECT * FROM firepump_alerts_data where client_id='".$data['client_id']."' and device_id='".$data['device_id']."' and UtilityName='".$data['UtilityName']."' and TxnDate='".$data['TxnDate']."' and alert_name='".$data['alert_name']."' order by TxnTime DESC limit 1";
            // echo $query;die()
		$res=$this->db->query($query)->result_array();
		return $res;
	}
function deleteAlertData(){
			$date = date('Y-m-d',strtotime("-2 days"));
	$query="delete from firepump_alerts_data where TxnDate< '".$date."'";
	    $this->db->query($query);

}
	
}