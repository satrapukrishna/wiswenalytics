<?php
class Api_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function saveToken($data,$clname){
       // echo $data["access_token"];
        $date =date("Y-m-d");
        $idata=array('token'=>$data["access_token"],'date'=>$date,'clientname'=>$clname);
       $row=$this->db->insert("token_data_usa",$idata);
       


    }
    function getToken($cname){
        $this->db->select('token');
        $this->db->from('token_data_usa');
        $this->db->where('clientname', $cname);
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
// print_r($this->db->last_query());die();
        return $result[0];
    }
    function saveDeviceData($json_emb){
        foreach ($json_emb as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));            
            $embessyData=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationId'=>$valueclient['LocationId'],
                'UomScale'=>$valueclient['UomScale'],
                'SensorType'=>$valueclient['SensorType'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'Consumption'=>$valueclient['Consumption']            
              );
             $querymumbai = $this->db->get_where('device_data_embessy', array('StationId'=>$embessyData['StationId'],'TxnTime'=>$embessyData['TxnTime'],'LineConnected'=>$embessyData['LineConnected'],'UtilityName'=>$embessyData['UtilityName'],'UomScale'=>$embessyData['UomScale'],'TxnDate'=>$newDate
                    ));
                    
             $countap = $querymumbai->num_rows(); 
echo $countap."<br>";
            if ($countap == 0) {

            $this->db->insert('device_data_embessy', $embessyData);
            }
            
        }
    }
    function saveDeviceData_prev($json_emb){
        foreach ($json_emb as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));            
            $embessyData=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationId'=>$valueclient['LocationId'],
                'UomScale'=>$valueclient['UomScale'],
                'SensorType'=>$valueclient['SensorType'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'Consumption'=>$valueclient['Consumption']            
              );
              $this->db->insert('hardware_station_consumption_data_embessy', $embessyData);
              $this->db->insert('hardware_station_consumption_data_embessy_test', $embessyData);
            
        }
    }
    
}