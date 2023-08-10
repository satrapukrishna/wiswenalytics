<?php
class Api_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function saveToken($data,$clname){
       // echo $data["access_token"];
        $date =date("Y-m-d");
        $idata=array('token'=>$data["access_token"],'date'=>$date,'clientname'=>$clname);
       $row=$this->db->insert("token_data",$idata);
       


    }
    function getToken($cname){
        $this->db->select('token');
        $this->db->from('token_data');
        $this->db->where('clientname', $cname);
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
// print_r($this->db->last_query());die();
        return $result[0];
    }
    function pushApiDataChennaiLive($json_chennai){
        foreach ($json_chennai as $valueclient) {
            //$newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $newDate = "2022-10-01";
            $appDataChennai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'update_date'=>date("Y-m-d H:i:s")               
            );
             $this->db->insert('hardware_station_consumption_data_chennai_live', $appDataChennai);
         
        }
     }
     function pushApiDataChennaiFromTo($json_chennai){
        foreach ($json_chennai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
           
            $appDataChennai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'update_date'=>date("Y-m-d H:i:s")               
            );
             $this->db->insert('hardware_station_consumption_data_chennai_bkp_27octTo6Nov2022', $appDataChennai);
         
        }
     }
     function pushApiDataVegaschoolLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            if(strtotime($adate)>strtotime($pdate)){
            
            //$newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
                           $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomScale'=>$valueclient['UomScale'],
                    'update_date'=>date("Y-m-d H:i:s")               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_vegaschool_live
        _live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'UtilityName'=>$appData2['UtilityName'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_vegaschool_live', $appData2);
        }
    }
          
        }

    }
     function pushApiDataVegaschool($json_chennai){
        foreach ($json_chennai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
           
           $appDatavegas=array(
                 'StationId'=>$valueclient['StationId'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'LocationName'=>$valueclient['LocationName'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomScale'=>$valueclient['UomScale'],
                 'update_date'=>date("Y-m-d H:i:s")               
             );
             $this->db->insert('hardware_station_consumption_data_vegaschool', $appDatavegas);
         
        }
     }
    function pushApiDataChennai($json_chennai){
        foreach ($json_chennai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
                          
           $appDataChennai=array(
                 'StationId'=>$valueclient['StationId'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'LocationName'=>$valueclient['LocationName'],
                 'LocationGroup'=>$valueclient['LocationGroup'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomName'=>$valueclient['UomName'],
                 'UomScale'=>$valueclient['UomScale'],
                 'update_date'=>date("Y-m-d H:i:s")               
             );
             $querychennai = $this->db->get_where('hardware_station_consumption_data_chennai', array('StationId'=>$appDataChennai['StationId'],'TxnTime'=>$appDataChennai['TxnTime'],'LineConnected'=>$appDataChennai['LineConnected'],'UtilityName'=>$appDataChennai['UtilityName'],'LocationName'=>$appDataChennai['LocationName'],'MeterSerial'=>$appDataChennai['MeterSerial'],'TxnDate'=>$newDate
         ));
          $countap = $querychennai->num_rows();
          if ($countap === 0) 
            {
            $this->db->insert('hardware_station_consumption_data_chennai', $appDataChennai);
            }
         
        }
     }
     function pushApiDataMumbaiFromTo($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));            
            $appDataMumbai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],               
            );
             $this->db->insert('hardware_station_consumption_data_mumbai', $appDataMumbai);
            
        }
     }
     
      
     function pushApiDataMumbai($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));            
            $appDataMumbai=array(
                 'StationId'=>$valueclient['StationId'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'LocationName'=>$valueclient['LocationName'],
                 'LocationGroup'=>$valueclient['LocationGroup'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomName'=>$valueclient['UomName'],
                 'UomScale'=>$valueclient['UomScale'],               
             );
             $querymumbai = $this->db->get_where('hardware_station_consumption_data_mumbai', array('StationId'=>$appDataMumbai['StationId'],'TxnTime'=>$appDataMumbai['TxnTime'],'LineConnected'=>$appDataMumbai['LineConnected'],'UtilityName'=>$appDataMumbai['UtilityName'],'LocationName'=>$appDataMumbai['LocationName'],'TxnDate'=>$newDate
                    ));
             $countap = $querymumbai->num_rows(); 

            if ($countap === 0) {

            $this->db->insert('hardware_station_consumption_data_mumbai', $appDataMumbai);
            }
            
        }
     }
     function pushApiDataMumbaiLive($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));            
            $appDataMumbai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],               
            );
             $querymumbai = $this->db->get_where('hardware_station_consumption_data_mumbai_live', array('StationId'=>$appDataMumbai['StationId'],'TxnTime'=>$appDataMumbai['TxnTime'],'LineConnected'=>$appDataMumbai['LineConnected'],'UtilityName'=>$appDataMumbai['UtilityName'],'LocationName'=>$appDataMumbai['LocationName'],'TxnDate'=>$newDate
                    ));
             $countap = $querymumbai->num_rows(); 

            if ($countap === 0) {

            $this->db->insert('hardware_station_consumption_data_mumbai_live', $appDataMumbai);
            }
            
        }
     }
    function checkData($stationid,$fromtime,$totime,$utilityname,$newdate,$data){
       
         $querycheck = $this->db->get_where('app_device_station_consumtion', array(//making selection
            'StationId'=>$stationid,'FromTime'=>$fromtime,'ToTime'=>$totime,'LocationWithUtility'=>$utilityname,'TxnDate'=>$newdate
        ));

        $count = $querycheck->num_rows(); //counting result from query

        if ($count === 0) {
            
            $this->db->insert('app_device_station_consumtion', $data);
        }



       
    }
     
  
    function pushCyberSpaceData($json_cyber){
        print_r($json_cyber);die();
    foreach ($json_cyber as $valuecyber) 
    {
            $newDate = date("Y-m-d", strtotime($valuecyber['TxnDate']));
            $time=$valuecyber['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            //if(strtotime($adate)>strtotime($pdate)){
                
              
               $appDataCyber=array('StationId'=>$valuecyber['StationId'],
            'StationName'=>$valuecyber['StationName'],
            'UtilityName'=>$valuecyber['UtilityName'],
            'UomScale'=>$valuecyber['UomScale'],
            'UomGraph'=>$valuecyber['UomGraph'],
            'MeterName'=>$valuecyber['MeterName'],
            'TxnDate'=>$newDate,
            'FromTime'=>$valuecyber['FromTime'],
            'ToTime'=>$valuecyber['ToTime'],
            'PrvReading'=>$valuecyber['PrvReading'],
            'CurReading'=>$valuecyber['CurReading'],
            'Consumption'=>$valuecyber['Consumption'],
            'LineConnected'=>$valuecyber['LineConnected'],
            
            'MeterSerial'=>$valuecyber['MeterSerial'],
            'LocationName'=>$valuecyber['LocationName'],
            'MeterType'=>$valuecyber['MeterType'],
            'UomName'=>$valuecyber['UomName'],
            'LocationWithUtility'=>$valuecyber['UtilityName']
            );

        $querycyber = $this->db->get_where('app_device_station_consumtion_cyberspace', array('StationId'=>$appDataCyber['StationId'],'FromTime'=>$appDataCyber['FromTime'],'ToTime'=>$appDataCyber['ToTime'],'LineConnected'=>$appDataCyber['LineConnected'],'TxnDate'=>$newDate
        ));

        $countcb = $querycyber->num_rows(); //counting result from query

        if ($countcb === 0) 
        {
            $this->db->insert('app_device_station_consumtion_cyberspace', $appDataCyber);
        } 
            //}
        

    }
}
    function pushApiDataApollo($json_apollo){
       foreach ($json_apollo as $valueclient) {
        $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
         $time=$valueclient['TxnTime'];
         $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
         $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));
 
            
            if(strtotime($adate)>strtotime($pdate)){
          $appDataApollo=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
 $queryapollo = $this->db->get_where('hardware_station_consumption_data_apollo', array(//making selection
        'StationId'=>$appDataApollo['StationId'],'TxnTime'=>$appDataApollo['TxnTime'],'LineConnected'=>$appDataApollo['LineConnected'],'LocationName'=>$appDataApollo['LocationName'],'TxnDate'=>$newDate
        ));
         $countap = $queryapollo->num_rows(); //counting result from query

                        if ($countap === 0) {

                        $this->db->insert('hardware_station_consumption_data_apollo', $appDataApollo);
                        }
        }
    }
    }
    function pushApiDataApollo_list($json_apollo){
        foreach ($json_apollo as $valueclient) {
         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
          
           $appDataApollo=array(
                 'StationId'=>$valueclient['StationId'],
                 'StationName'=>$valueclient['StationName'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'UtilityId'=>$valueclient['UtilityId'],
                 'UtilityGroup'=>$valueclient['UtilityGroup'],
                 'LocationName'=>$valueclient['LocationName'],
                 'LocationGroup'=>$valueclient['LocationGroup'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'MeterType'=>$valueclient['MeterType'],
                 'LineName'=>$valueclient['LineName'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomName'=>$valueclient['UomName'],
                 'UomScale'=>$valueclient['UomScale'],
                 'UomGraph'=>$valueclient['UomGraph']                
             );
             $this->db->insert('hardware_station_consumption_data_apollo', $appDataApollo);
         
     }
     }
    function pushApiDataLonavala($json_lonavala){
        foreach ($json_lonavala as $valueclient) {
         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
         $time=$valueclient['TxnTime'];
         $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
         $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));
 
            
            if(strtotime($adate)>strtotime($pdate)){
           $appDataApollo=array(
                 'StationId'=>$valueclient['StationId'],
                 'StationName'=>$valueclient['StationName'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'UtilityId'=>$valueclient['UtilityId'],
                 'UtilityGroup'=>$valueclient['UtilityGroup'],
                 'LocationName'=>$valueclient['LocationName'],
                 'LocationGroup'=>$valueclient['LocationGroup'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'MeterType'=>$valueclient['MeterType'],
                 'LineName'=>$valueclient['LineName'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomName'=>$valueclient['UomName'],
                 'UomScale'=>$valueclient['UomScale'],
                 'UomGraph'=>$valueclient['UomGraph']                
             );
 //CREATE INDEX hardware_station_consumption_data_samsung_index ON hardware_station_consumption_data_samsung (StationId, TxnTime,LineConnected,LineName,TxnDate);
         $queryapollo = $this->db->get_where('hardware_station_consumption_data_lonavala', array(//making selection
         'StationId'=>$appDataApollo['StationId'],'TxnTime'=>$appDataApollo['TxnTime'],'LineConnected'=>$appDataApollo['LineConnected'],'LocationName'=>$appDataApollo['LocationName'],'TxnDate'=>$newDate
         ));
          $countap = $queryapollo->num_rows(); //counting result from query
 
                         if ($countap === 0) {
 
                         $this->db->insert('hardware_station_consumption_data_lonavala', $appDataApollo);
                         }
         }
        }
     }
     function getRainbowVikrampuriData($json_vikram){
        foreach ($json_vikram as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['TxnTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-30 minutes"));
    
               
              //if(strtotime($adate)>strtotime($pdate)){
           $appDatavikram=array(
                 'StationId'=>$valueclient['StationId'],
                 'StationName'=>$valueclient['StationName'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'UtilityId'=>$valueclient['UtilityId'],
                 'UtilityGroup'=>$valueclient['UtilityGroup'],
                 'LocationName'=>$valueclient['LocationName'],
                 'LocationGroup'=>$valueclient['LocationGroup'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'MeterType'=>$valueclient['MeterType'],
                 'LineName'=>$valueclient['LineName'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomName'=>$valueclient['UomName'],
                 'UomScale'=>$valueclient['UomScale'],
                 'UomGraph'=>$valueclient['UomGraph'] ,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
             //$this->db->insert('hardware_station_consumption_data_rainbow_vikrampuri', $appDatavikram);
         $querychennai = $this->db->get_where('hardware_station_consumption_data_rainbow_vikrampuri', array(//making selection
         'StationId'=>$appDatavikram['StationId'],'TxnTime'=>$appDatavikram['TxnTime'],'LineConnected'=>$appDatavikram['LineConnected'],'UtilityName'=>$appDatavikram['UtilityName'],'LocationName'=>$appDatavikram['LocationName'],'MeterSerial'=>$appDatavikram['MeterSerial'],'TxnDate'=>$newDate
         ));
          $countap = $querychennai->num_rows(); //counting result from query
 
                         if ($countap === 0) {
 
                         $this->db->insert('hardware_station_consumption_data_rainbow_vikrampuri', $appDatavikram);
                         }
         //}
        }
     }
     function getRainbowKondaData($json_vikram){
        foreach ($json_vikram as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['TxnTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-30 minutes"));
    
               
              //if(strtotime($adate)>strtotime($pdate)){
           $appDatavikram=array(
                 'StationId'=>$valueclient['StationId'],
                 'StationName'=>$valueclient['StationName'],
                 'UtilityName'=>$valueclient['UtilityName'],
                 'UtilityId'=>$valueclient['UtilityId'],
                 'UtilityGroup'=>$valueclient['UtilityGroup'],
                 'LocationName'=>$valueclient['LocationName'],
                 'LocationGroup'=>$valueclient['LocationGroup'],
                 'MeterName'=>$valueclient['MeterName'],
                 'MeterSerial'=>$valueclient['MeterSerial'],
                 'MeterType'=>$valueclient['MeterType'],
                 'LineName'=>$valueclient['LineName'],
                 'LineConnected'=>$valueclient['LineConnected'],
                 'TxnDate'=>$newDate,
                 'TxnTime'=>$valueclient['TxnTime'],
                 'FromTime'=>$valueclient['FromTime'],
                 'ToTime'=>$valueclient['ToTime'],
                 'PrvReading'=>$valueclient['PrvReading'],
                 'CurReading'=>$valueclient['PrvReading'],
                 'Consumption'=>$valueclient['Consumption'],
                 'Multiplier'=>$valueclient['Multiplier'],
                 'UomName'=>$valueclient['UomName'],
                 'UomScale'=>$valueclient['UomScale'],
                 'UomGraph'=>$valueclient['UomGraph'] ,
                 'update_date'=>date("Y-m-d H:i:s")               
             );
            //$this->db->insert('hardware_station_consumption_data_rainbow_kondapur', $appDatavikram);
         $querychennai = $this->db->get_where('hardware_station_consumption_data_rainbow_kondapur', array(//making selection
         'StationId'=>$appDatavikram['StationId'],'TxnTime'=>$appDatavikram['TxnTime'],'LineConnected'=>$appDatavikram['LineConnected'],'UtilityName'=>$appDatavikram['UtilityName'],'LocationName'=>$appDatavikram['LocationName'],'MeterSerial'=>$appDatavikram['MeterSerial'],'TxnDate'=>$newDate
         ));
          $countap = $querychennai->num_rows(); //counting result from query
 
                         if ($countap === 0) {
 
                         $this->db->insert('hardware_station_consumption_data_rainbow_kondapur', $appDatavikram);
                         }
        //  }
        }
     }
     
     function pushApiDataChennai_watermeter($json_chennai){
        foreach ($json_chennai as $valueclient) {
            //$newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
             $newDate = "2021-12-28";
           if($valueclient['LocationName']=='Borewell-2' || $valueclient['LocationName']=='Marketing&Gardn'){
            $appDataChennai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'update_date'=>date("Y-m-d H:i:s")               
            );
            $this->db->insert('hardware_station_consumption_data_chennai', $appDataChennai);
           }  
        }
     }
     function pushApiDataChennai_day($json_chennai){
        foreach ($json_chennai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['TxnTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-30 minutes"));
    
           
              
               
            $appDataChennai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'update_date'=>date("Y-m-d H:i:s")               
            );
             $this->db->insert('hardware_station_consumption_data_chennai', $appDataChennai);
 //CREATE INDEX hardware_station_consumption_data_samsung_index ON hardware_station_consumption_data_samsung (StationId, TxnTime,LineConnected,LineName,TxnDate);
         
         
        }
     }
     
     function pushApiDataMumbai_day($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['TxnTime'];
           
            $appDataMumbai=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],               
            );
             $this->db->insert('hardware_station_consumption_data_mumbai', $appDataMumbai);
 
        }
     }
     function pushApiDataMumbai_towerb($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
            date_default_timezone_set('Asia/Kolkata');
		    $ttime= date('H:i:s');
           // $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $newDate = date('Y-m-d');
            if($valueclient['LocationName']=='Domestic Tank-B' && $ttime>$valueclient['TxnTime']){
                $appDataMumbai=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale'],               
                );
             $querymumbai = $this->db->get_where('hardware_station_consumption_data_mumbai', array(//making selection
                'StationId'=>$appDataMumbai['StationId'],'TxnTime'=>$appDataMumbai['TxnTime'],'LineConnected'=>$appDataMumbai['LineConnected'],'UtilityName'=>$appDataMumbai['UtilityName'],'LocationName'=>$appDataMumbai['LocationName'],'TxnDate'=>$newDate
                ));
                 $countap = $querymumbai->num_rows(); //counting result from query
        
                                if ($countap === 0) {
        
                                $this->db->insert('hardware_station_consumption_data_mumbai', $appDataMumbai);
                                }
           
                
             }
             
 
        }
     }
     function pushApiDataMumbai_towerb_prev($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
           
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            //$newDate = date('Y-m-d');
            // if($valueclient['LocationName']=='Domestic Tank-B'){
                $appDataMumbai=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale'],               
                );
             $this->db->insert('hardware_station_consumption_data_mumbai', $appDataMumbai);
            
           
                
            //  }
             
 
        }
     }
function pushCBREApiData($json_cbre)
{
      // print_r($json_cbre);die();
        foreach ($json_cbre as $valueclient) {
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            //if(strtotime($adate)>strtotime($pdate)){


            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
//CREATE INDEX hardware_station_consumption_data_samsung_index ON hardware_station_consumption_data_samsung (StationId, TxnTime,LineConnected,LineName,TxnDate);
        $querycbre = $this->db->get_where('hardware_station_consumption_data_cbre', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'LineName'=>$appData2['LineName'],'TxnDate'=>$newDate
        ));

        $countcbr = $querycbre->num_rows(); //counting result from query

        if ($countcbr === 0) {

        $this->db->insert('hardware_station_consumption_data_cbre', $appData2);
        }
    }
}




function pushJLLApiData($json_jll)
{

    foreach ($json_jll as $valueclient) 
    {
         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            //if(strtotime($adate)>strtotime($pdate)){


            $appDatajll=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );

        $queryjll = $this->db->get_where('hardware_station_consumption_data_jll', array('StationId'=>$appDatajll['StationId'],'UtilityName'=>$appDatajll['UtilityName'],'TxnTime'=>$appDatajll['TxnTime'],'UomName'=>$appDatajll['UomName'],'TxnDate'=>$newDate,'LineConnected'=>$appDatajll['LineConnected']));

        $countjll = $queryjll->num_rows(); //counting result from query
        //echo $this->db->last_query();
//echo $countjll;die();
        if ($countjll === 0) 
        {
            $this->db->insert('hardware_station_consumption_data_jll', $appDatajll);
        }
            //}
        

    }

}
function pushSamsungApiData($json_smsg)
{
// print_r($json);die();
    foreach ($json_smsg as $valuesmsg) 
    {
            $newDate = date("Y-m-d", strtotime($valuesmsg['TxnDate']));
            $time=$valuesmsg['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            if(strtotime($adate)>strtotime($pdate)){
               $appDataSam=array('StationId'=>$valuesmsg['StationId'],
        'StationName'=>$valuesmsg['StationName'],
        'UtilityName'=>$valuesmsg['UtilityName'],
        'UomScale'=>$valuesmsg['UomScale'],
        'UomGraph'=>$valuesmsg['UomGraph'],
        'MeterName'=>$valuesmsg['MeterName'],
        'TxnDate'=>$newDate,
        'FromTime'=>$valuesmsg['FromTime'],
        'ToTime'=>$valuesmsg['ToTime'],
        'PrvReading'=>$valuesmsg['PrvReading'],
        'CurReading'=>$valuesmsg['CurReading'],
        'Consumption'=>$valuesmsg['Consumption'],
        'ValueMax'=>$valuesmsg['ValueMax'],
        'ValueMin'=>$valuesmsg['ValueMin'],
        'ValueAvg'=>$valuesmsg['ValueAvg'],
        'MeterSerial'=>$valuesmsg['MeterSerial'],
        'LocationName'=>'',
        'MeterType'=>$valuesmsg['MeterType'],
        'UomName'=>$valuesmsg['UomName'],
        'LocationWithUtility'=>$valuesmsg['UtilityName']
        );

        $querysams = $this->db->get_where('app_device_station_consumtion_samsung', array('StationId'=>$appDataSam['StationId'],'FromTime'=>$appDataSam['FromTime'],'ToTime'=>$appDataSam['ToTime'],'LocationWithUtility'=>$appDataSam['LocationWithUtility'],'TxnDate'=>$newDate
        ));

        $countsm = $querysams->num_rows(); //counting result from query

        if ($countsm === 0) 
        {
            $this->db->insert('app_device_station_consumtion_samsung', $appDataSam);
        } 
            }
        

    }

}
function pushSodexoData($json_sodexo)
{
// print_r($json);die();
    foreach ($json_sodexo as $valuesodexo) 
    {
            $newDate = date("Y-m-d", strtotime($valuesodexo['TxnDate']));
            $time=$valuesodexo['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            if(strtotime($adate)>strtotime($pdate)){
               $appDataSodexo=array('StationId'=>$valuesodexo['StationId'],
        'StationName'=>$valuesodexo['StationName'],
        'UtilityName'=>$valuesodexo['UtilityName'],
        'UomScale'=>$valuesodexo['UomScale'],
        'UomGraph'=>$valuesodexo['UomGraph'],
        'MeterName'=>$valuesodexo['MeterName'],
        'TxnDate'=>$newDate,
        'FromTime'=>$valuesodexo['FromTime'],
        'ToTime'=>$valuesodexo['ToTime'],
        'PrvReading'=>$valuesodexo['PrvReading'],
        'CurReading'=>$valuesodexo['CurReading'],
        'Consumption'=>$valuesodexo['Consumption'],
        'ValueMax'=>$valuesodexo['ValueMax'],
        'ValueMin'=>$valuesodexo['ValueMin'],
        'ValueAvg'=>$valuesodexo['ValueAvg'],
        'MeterSerial'=>$valuesodexo['MeterSerial'],
        'LocationName'=>'',
        'MeterType'=>$valuesodexo['MeterType'],
        'UomName'=>$valuesodexo['UomName'],
        'LocationWithUtility'=>$valuesodexo['UtilityName']
        );

        $querysode = $this->db->get_where('app_device_station_consumtion_sodexo', array('StationId'=>$appDataSodexo['StationId'],'FromTime'=>$appDataSodexo['FromTime'],'ToTime'=>$appDataSodexo['ToTime'],'LocationWithUtility'=>$appDataSodexo['LocationWithUtility'],'TxnDate'=>$newDate
        ));

        $countso = $querysode->num_rows(); //counting result from query

        if ($countso === 0) 
        {
            $this->db->insert('app_device_station_consumtion_sodexo', $appDataSodexo);
        } 
            }
        

    }

}

function pushMyhomeData($json_myhome)
{
    //echo "string";
//print_r($json_myhome);die();
    foreach ($json_myhome as $valueclient) 
    {
        $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));           
            //if(strtotime($adate)>strtotime($pdate)){


            $appDatamyhome=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );

            $querymyhome = $this->db->get_where('hardware_station_consumption_data_myhome', array('StationId'=>$appDatamyhome['StationId'],'LocationName'=>$appDatamyhome['LocationName'],'TxnTime'=>$appDatamyhome['TxnTime'],'TxnDate'=>$newDate));

      

        $countmh = $querymyhome->num_rows(); //counting result from query

        if ($countmh === 0) 
        {
            $this->db->insert('hardware_station_consumption_data_myhome', $appDatamyhome);
        } 
            }
        

    }


function getClientToken($client_id){
        $this->db->select('token');
        $this->db->from('token_info');
        $this->db->where('client_id', $client_id);
        $this->db->order_by('token_id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0];
    }
    function pushClientApiDataSamsung($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
//CREATE INDEX hardware_station_consumption_data_samsung_index ON hardware_station_consumption_data_samsung (StationId, TxnTime,LineConnected,LineName,TxnDate);
        $queryclient = $this->db->get_where('hardware_station_consumption_data_samsung', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'LineName'=>$appData2['LineName'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_samsung', $appData2);
        }
          
        }

    }
    function getCollectorDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            if($valueclient['LineConnected']=='Footfall Male' && $valueclient['Consumption']>=8){
                //echo "hi";
                $user_data = array('Consumption' => $valueclient['Consumption']*7,'CurReading' => $valueclient['Consumption']*7);
                $this->db->where('LineConnected','Odour Male');
                $this->db->where('TxnTime',$valueclient['FromTime']);
                $this->db->where('TxnDate',$newDate);
                $this->db->update('hardware_station_consumption_data_wr_collector_live',$user_data);
               //echo  $this->db->last_query();die();


            }
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
//CREATE INDEX hardware_station_consumption_data_samsung_index ON hardware_station_consumption_data_samsung (StationId, TxnTime,LineConnected,LineName,TxnDate);
        $queryclient = $this->db->get_where('hardware_station_consumption_data_wr_collector_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_wr_collector_live', $appData2);
        }
          
        }

    }
    function getCollectorData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
             
            if($valueclient['LineConnected']=='Footfall Male' && $valueclient['Consumption']>=8){
               
                $user_data = array('Consumption' => $valueclient['Consumption']*7,'CurReading' => $valueclient['Consumption']*7);
                $this->db->where('LineConnected','Odour Male');
                $this->db->where('TxnTime',$valueclient['FromTime']);
                $this->db->where('TxnDate',$newDate);
                $this->db->update('hardware_station_consumption_data_wr_collector_2022',$user_data);
               
            }
           
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
           
         $this->db->insert('hardware_station_consumption_data_wr_collector_2022', $appData2);
          
        }

    }
    function getjpnagarDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );

        $queryclient = $this->db->get_where('hardware_station_consumption_data_wr_jpnagar_live', array('StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_wr_jpnagar_live', $appData2);
        }
          
        }

    }
    function getjpnagarData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_wr_jpnagar', $appData2);
          
        }

    }
    function getCollectorData_day($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
              
            if($valueclient['LineConnected']=='Footfall Male' && $valueclient['Consumption']>=8){
                //echo "hi";
                $user_data = array('Consumption' => $valueclient['Consumption']*7,'CurReading' => $valueclient['Consumption']*7);
                $this->db->where('LineConnected','Odour Male');
                $this->db->where('TxnTime',$valueclient['FromTime']);
                $this->db->where('TxnDate',$newDate);
                $this->db->update('hardware_station_consumption_data_wr_collector',$user_data);
               //echo  $this->db->last_query();die();


            }
            //if(strtotime($adate)>strtotime($pdate)){ Odour Male
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
           $this->db->insert('hardware_station_consumption_data_wr_collector', $appData2);

          
        }

    }
    
    function pushPoliceHeadquartersDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_police_headquarters_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_police_headquarters_live', $appData2);
        }
          
        }

    }
    function pushPoliceHeadquartersData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
           
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_police_headquarters', $appData2);
          
        }

    }
    function pushMissionHospitalDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_mission_hospital_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_mission_hospital_live', $appData2);
        }
          
        }

    }
    function pushMissionHospitalData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_mission_hospital', $appData2);
          
        }

    }
    function pushLICOfficeMarketRoadDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_lic_office_marketroad_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_lic_office_marketroad_live', $appData2);
        }
          
        }

    }
    function pushLICOfficeMarketRoadData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
           
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_lic_office_marketroad', $appData2);
          
        }

    }
    function pushChintalBridgeDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_chintal_bridge_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_chintal_bridge_live', $appData2);
        }
          
        }

    }
    function pushChintalBridgeData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
           
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_chintal_bridge', $appData2);
          
        }

    }
    function pushKazipetRailwayStationDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_kazipet_railwaystation_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_kazipet_railwaystation_live', $appData2);
        }
          
        }

    }
    function pushKazipetRailwayStationData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_kazipet_railwaystation', $appData2);
          
        }

    }
    function pushRadhikaTheatreLaneDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_radhika_theatre_lane_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_radhika_theatre_lane_live', $appData2);
        }
          
        }

    }
    function pushRadhikaTheatreLaneData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_radhika_theatre_lane', $appData2);
          
        }

    }
    function pushGopalaswamiTempleDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_gopalaswami_temple_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_gopalaswami_temple_live', $appData2);
        }
          
        }

    }
    function pushGopalaswamiTempleData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale']               
            );
            $this->db->insert('hardware_station_consumption_data_gopalaswami_temple', $appData2);
          
        }

    }
    function pushDistrictCourtDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
                $appData2=array(
                    'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']               
                );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_district_court_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_district_court_live', $appData2);
        }
          
        }

    }
    function pushRsbroGeneratorsDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
           
            //if(strtotime($adate)>strtotime($pdate)){
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomScale'=>$valueclient['UomScale']             
            );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_rsbrothers_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_rsbrothers_live', $appData2);
        }
          
        }

    }
    function pushIItDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            $time=$valueclient['ToTime'];
            $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
            $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
            //if(strtotime($adate)>strtotime($pdate)){
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_iithyd_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_iithyd_live', $appData2);
        }
          
        }

    }
    
    function pushIItData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
            $this->db->insert('hardware_station_consumption_data_iithyd', $appData2);
          
        }

    }
    function pushNarayanasilkData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
            $this->db->insert('hardware_station_consumption_data_narayanisilk', $appData2);
          
        }

    }
    function pushNarayanasilkDataLive($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            //if(strtotime($adate)>strtotime($pdate)){
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'StationName'=>$valueclient['StationName'],
                'UtilityName'=>$valueclient['UtilityName'],
                'UtilityId'=>$valueclient['UtilityId'],
                'UtilityGroup'=>$valueclient['UtilityGroup'],
                'LocationName'=>$valueclient['LocationName'],
                'LocationGroup'=>$valueclient['LocationGroup'],
                'MeterName'=>$valueclient['MeterName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'MeterType'=>$valueclient['MeterType'],
                'LineName'=>$valueclient['LineName'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'FromTime'=>$valueclient['FromTime'],
                'ToTime'=>$valueclient['ToTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );
        $queryclient = $this->db->get_where('hardware_station_consumption_data_narayanisilk_live', array(//making selection
        'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data_narayanisilk_live', $appData2);
        }
          
        }

    }
    function pushRsbroGeneratorsData($json_client)
    {
        //print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                'UtilityName'=>$valueclient['UtilityName'],
                'LocationName'=>$valueclient['LocationName'],
                'MeterSerial'=>$valueclient['MeterSerial'],
                'LineConnected'=>$valueclient['LineConnected'],
                'TxnDate'=>$newDate,
                'TxnTime'=>$valueclient['TxnTime'],
                'PrvReading'=>$valueclient['PrvReading'],
                'CurReading'=>$valueclient['PrvReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomScale'=>$valueclient['UomScale']             
            );
            $this->db->insert('hardware_station_consumption_data_rsbrothers', $appData2);
          
        }

    }
    function pushDistrictCourtData($json_client)
    {
        // print_r($json_client);die();
        foreach ($json_client as $valueclient) {
            
            $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
            
            $appData2=array(
                'StationId'=>$valueclient['StationId'],
                    'UtilityName'=>$valueclient['UtilityName'],
                    'LocationName'=>$valueclient['LocationName'],
                    'LocationGroup'=>$valueclient['LocationGroup'],
                    'MeterName'=>$valueclient['MeterName'],
                    'MeterSerial'=>$valueclient['MeterSerial'],
                    'LineConnected'=>$valueclient['LineConnected'],
                    'TxnDate'=>$newDate,
                    'TxnTime'=>$valueclient['TxnTime'],
                    'FromTime'=>$valueclient['FromTime'],
                    'ToTime'=>$valueclient['ToTime'],
                    'PrvReading'=>$valueclient['PrvReading'],
                    'CurReading'=>$valueclient['PrvReading'],
                    'Consumption'=>$valueclient['Consumption'],
                    'Multiplier'=>$valueclient['Multiplier'],
                    'UomName'=>$valueclient['UomName'],
                    'UomScale'=>$valueclient['UomScale']                 
            );
            
            $this->db->insert('hardware_station_consumption_data_district_court', $appData2);
           

          
        }

    }
    function deleteAllLiveData(){
        $tables = array("hardware_station_consumption_data_district_court_live","hardware_station_consumption_data_gopalaswami_temple_live","hardware_station_consumption_data_radhika_theatre_lane_live","hardware_station_consumption_data_kazipet_railwaystation_live","hardware_station_consumption_data_chintal_bridge_live","hardware_station_consumption_data_lic_office_marketroad_live","hardware_station_consumption_data_mission_hospital_live","hardware_station_consumption_data_police_headquarters_live","hardware_station_consumption_data_wr_jpnagar_live","hardware_station_consumption_data_wr_collector_live","hardware_station_consumption_data_rsbrothers_live","hardware_station_consumption_data_vegaschool_live");
        $date = date('Y-m-d',strtotime("-1 days"));
        foreach($tables as $table) {
            $this->db->where('TxnDate', $date);
            $this->db->delete($table);
        }
           
    }
    function updateWarangal($table_name){
        $where = 'UomName="Count" and Consumption > 10 or Consumption<0';
        $this->db->where($where);
        $this->db->update($table_name, array('Consumption' => 2));
       
        // echo $this->db->last_query();exit; 
       
    }
    function displayWarangal($table_name){
        $this->db->select('*');
        $this->db->from($table_name);
        $where = '(UomName="Count" and Consumption=100> or Consumption<0)';
        $this->db->where($where);
        echo $this->db->last_query();exit; 
        //$this->db->update($table_name, array('Consumption' => 0));
       
    }

    function getBranches(){
        $this->db->select('');
        $this->db->from('warangal_washroom_branches');     
        // $this->db->where('status',1);     
        
        $res = $this->db->get()->result_array();  
        //echo $this->db->last_query();exit;     
        return $res;
    }
}