<?php
class Device_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function saveToken($data){
        if (count($data) > 0) {
            $res = $this->db->insert('access_token_data', $data);
            return $res;
        }
        return false;
    }
    function trunToken(){
        $this->db->truncate('access_token_data');

    }
    function getTxnTime($date,$tbl,$stnid){
        $this->db->select('TxnTime');
        // $this->db->select('(TxnTime - INTERVAL 1 HOUR) as TxnTime');
        $this->db->from($tbl);
        $this->db->where('TxnDate', $date);
        $this->db->where('StationId', $stnid);
        $this->db->order_by('TxnTime', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getAccessToken(){
        $this->db->select('*');
        $this->db->from('access_token_data');
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function pushHcugApiData($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                 'UtilityName'=>$data->UtilityName,
                 'UtilityId'=>$data->UtilityId,
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$data->TxnTime,
                 'FromTime'=>$data->FromTime,
                 'ToTime'=>$data->ToTime,
                 'CurReading'=>$data->CurReading             
             );
             
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data_hcug_live', array('TxnTime'=>$apiData['TxnTime'],'StationId'=>$apiData['StationId'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_hcug_live', $apiData);
            }
         
        
     }
     function pushApiDataDate($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
           
            $this->db->insert('hardware_station_consumption_data_chennai', $apiData);
            
         
        
     }
     
     function pushApiDataChennaiLive($data){
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
                 'FromTime'=>'',
                 'ToTime'=>'',
                 'PrvReading'=>'',
                 'CurReading'=>'',
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>'',
                 'UomName'=>'',
                 'UomScale'=>'',
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data_chennai_live', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'MeterSerial'=>$apiData['MeterSerial'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_chennai_live', $apiData);
            }
         
        
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data_chennai_live', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'MeterSerial'=>$apiData['MeterSerial'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_chennai_live', $apiData);
            }
         
        
     }
     function pushCliffData($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                'StationName'=>$data->StationName,
                'UtilityName'=>$data->UtilityName,
                'UtilityId'=>$data->UtilityId,
                'UtilityGroup'=>$data->UtilityGroup,
                'LocationName'=>$data->LocationName,
                'LocationGroup'=>$data->LocationGroup,
                'MeterName'=>$data->MeterName,
                'MeterSerial'=>$data->MeterSerial,
                'MeterType'=>$data->MeterType,
                'LineName'=>$data->LineName,
                'LineConnected'=>$data->LineConnected,
                'TxnDate'=>$newDate,
                'TxnTime'=>$data->TxnTime,
                'FromTime'=>$data->FromTime,
                'ToTime'=>$data->ToTime,
                'PrvReading'=>$data->PrvReading,
                'CurReading'=>$data->CurReading,
                'Consumption'=>$data->Consumption,
                'Multiplier'=>$data->Multiplier,
                'UomName'=>$data->UomName,
                'UomScale'=>$data->UomScale,
                'UomGraph'=>$data->UomGraph               
             );
            
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data_lonavala', $apiData);
            
         
        
     }
     function pushRSbroData($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                 'UtilityName'=>$data->UtilityName,
                 'LocationName'=>$data->LocationName,
                 'MeterSerial'=>$data->MeterSerial,
                 'LineConnected'=>$data->LineConnected,
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$data->TxnTime,
                 'PrvReading'=>$data->PrvReading,
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier  ,
                 'UomScale'=>$data->UomScale,           
             );
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data_rsbrothers', $apiData);

           
            
         
        
     }
    function pushVegasData($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                 'UtilityName'=>$data->UtilityName,
                 'LocationName'=>$data->LocationName,
                 'MeterName'=>$data->MeterName,
                 'MeterSerial'=>$data->MeterSerial,
                 'LineConnected'=>$data->LineConnected,
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$data->TxnTime,
                 'FromTime'=>$data->FromTime,
                 'ToTime'=>$data->ToTime,
                 'PrvReading'=>$data->PrvReading,
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data_vegaschool', $apiData);
            
         
        
     }
     function pushUnicefData($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data__unicef', $apiData);
            
         
        
     }
     function pushTerotamData($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data_terotam', $apiData);
            
         
        
     }
     function pushUndpData($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                 'UtilityName'=>$data->UtilityName,
                 'LocationName'=>$data->LocationName,
                 'MeterName'=>$data->MeterName,
                 'MeterSerial'=>$data->MeterSerial,
                 'LineConnected'=>$data->LineConnected,
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$data->TxnTime,
                 'FromTime'=>$data->FromTime,
                 'ToTime'=>$data->ToTime,
                 'PrvReading'=>$data->PrvReading,
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            
            
            $this->db->insert('hardware_station_consumption_data_undp', $apiData);
         
        
     }
     function pushUnicefDataLive($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data__unicef_live', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'MeterSerial'=>$apiData['MeterSerial'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data__unicef_live', $apiData);
            }
         
        
     }
     function pushTerotamDataLive($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data_terotam_live', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'MeterSerial'=>$apiData['MeterSerial'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_terotam_live', $apiData);
            }
         
        
     }
     function pushCliffDataLive($data){
        // echo json_encode($data->TxnDate);die();
            $newDate = date("Y-m-d", strtotime($data->TxnDate));
                          
           $apiData=array(
                 'StationId'=>$data->StationId,
                'StationName'=>$data->StationName,
                'UtilityName'=>$data->UtilityName,
                'UtilityId'=>$data->UtilityId,
                'UtilityGroup'=>$data->UtilityGroup,
                'LocationName'=>$data->LocationName,
                'LocationGroup'=>$data->LocationGroup,
                'MeterName'=>$data->MeterName,
                'MeterSerial'=>$data->MeterSerial,
                'MeterType'=>$data->MeterType,
                'LineName'=>$data->LineName,
                'LineConnected'=>$data->LineConnected,
                'TxnDate'=>$newDate,
                'TxnTime'=>$data->TxnTime,
                'FromTime'=>$data->FromTime,
                'ToTime'=>$data->ToTime,
                'PrvReading'=>$data->PrvReading,
                'CurReading'=>$data->CurReading,
                'Consumption'=>$data->Consumption,
                'Multiplier'=>$data->Multiplier,
                'UomName'=>$data->UomName,
                'UomScale'=>$data->UomScale,
                'UomGraph'=>$data->UomGraph               
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data_lonavala_live', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'MeterSerial'=>$apiData['MeterSerial'],'TxnDate'=>$newDate
         ));
          $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_lonavala_live', $apiData);
            }
         
        
     }
     function pushApiDataMumbaiLive($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale ,
                 'updatedTime'=>date('Y-m-d h:i:sa')           
             );
            //  echo json_encode($apiData);die();
             $checkData = $this->db->get_where('hardware_station_consumption_data_mumbai_live', array('TxnTime'=>$apiData['TxnTime'],'LineConnected'=>$apiData['LineConnected'],'UtilityName'=>$apiData['UtilityName'],'LocationName'=>$apiData['LocationName'],'TxnDate'=>$newDate
         ));
              $chk = $checkData->num_rows();
          if ($chk === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_mumbai_live', $apiData);
            }
         
        
     }
     function pushApiDataMumbai($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale               
             );
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data_mumbai', $apiData);
            
         
        
     }
     function pushMumbaiDataDates($data){
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
                 'CurReading'=>$data->CurReading,
                 'Consumption'=>$data->Consumption,
                 'Multiplier'=>$data->Multiplier,
                 'UomName'=>$data->UomName,
                 'UomScale'=>$data->UomScale               
             );
            //  echo json_encode($apiData);die();
            
            $this->db->insert('hardware_station_consumption_data_mumbai', $apiData);
            
         
        
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
                'CurReading'=>$data->CurReading,
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