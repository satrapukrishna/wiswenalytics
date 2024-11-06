<?php
class Device_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function saveToken($data){
        if (count($data) > 0) {
            $res = $this->db->insert('access_token_data_protech', $data);
            return $res;
        }
        return false;
    }
    function trunToken(){
        $this->db->truncate('access_token_data_protech');

    }
    function getTxnTime($date){
        $this->db->select('(TxnTime - INTERVAL 1 HOUR) as TxnTime');
        $this->db->from('protech_narayana_device_data');
        $this->db->where('TxnDate', $date);
        $this->db->order_by('TxnTime', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getAccessToken(){
        $this->db->select('*');
        $this->db->from('access_token_data_protech');
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function pushApiData($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                 'UtilityName'=>$data->UtilityName,
                 'LocationName'=>$data->LocationName,
                 'LocationGroup'=>$data->LocationGroup,
                 'MeterName'=>$data->MeterName,
                 'MeterSerial'=>$data->MeterSerial,
                 'LineConnected'=>$data->LineConnected,
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$data->TxnTime,
                 'FromTime'=>$data->FromTime,
                 'ToTime'=>$data->ToTime,
                 'PrvReading'=>$data->PrvReading,
                 'CurReading'=>$data->PrvReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('protech_narayana_device_data', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'MeterSerial'=>$apiData['MeterSerial'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('protech_narayana_device_data', $apiData);
            }
         
        
     }
     function pushApiDataJNTU($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
            
            $apiData=array(
                'StationId'=>$data->StationId,
                'UtilityName'=>$data->UtilityName,
                'LocationName'=>$data->LocationName,
                'LocationGroup'=>$data->LocationGroup,
                'MeterName'=>$data->MeterName,
                'MeterSerial'=>$data->MeterSerial,
                'LineConnected'=>$data->LineConnected,
                'TxnDate'=>$newDate,
                'TxnTime'=>$data->TxnTime,
                'FromTime'=>$data->FromTime,
                'ToTime'=>$data->ToTime,
                'PrvReading'=>$data->PrvReading,
                'CurReading'=>$data->PrvReading,
                'Consumption'=>$data->Consumption,
                'Multiplier'=>$data->Multiplier,
                'UomName'=>$data->UomName,
                'UomScale'=>$data->UomScale              
            );
       
             //echo json_encode($apiData);die();
             $checkData = $this->db->get_where('device_data_kakinada', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('device_data_kakinada', $apiData);
            }
         
        
     }
    
}