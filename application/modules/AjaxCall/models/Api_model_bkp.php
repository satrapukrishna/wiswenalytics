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
        $time=$valueclient['ToTime'];
        $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
        $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));

           
          //  if(strtotime($adate)>strtotime($pdate)){
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
 $queryapollo = $this->db->get_where('hardware_station_consumption_data_apollo3', array(//making selection
        'StationId'=>$appDataApollo['StationId'],'TxnTime'=>$appDataApollo['TxnTime'],'LineConnected'=>$appDataApollo['LineConnected'],'LocationName'=>$appDataApollo['LocationName'],'TxnDate'=>$newDate
        ));
         $countap = $queryapollo->num_rows(); //counting result from query

                        if ($countap === 0) {

                        $this->db->insert('hardware_station_consumption_data_apollo3', $appDataApollo);
                        }
        }
    }
    function pushApiDataLonavala($json_lonavala){
        foreach ($json_lonavala as $valueclient) {
         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
         $time=$valueclient['ToTime'];
         $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
         $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));
 
            
           //  if(strtotime($adate)>strtotime($pdate)){
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
     function pushApiDataChennai($json_chennai){
        foreach ($json_chennai as $valueclient) {
         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
        
           //  if(strtotime($adate)>strtotime($pdate)){
           $appDataChennai=array(
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
         $querychennai = $this->db->get_where('hardware_station_consumption_data_chennai', array(//making selection
         'StationId'=>$appDataChennai['StationId'],'TxnTime'=>$appDataChennai['TxnTime'],'LineConnected'=>$appDataChennai['LineConnected'],'UtilityName'=>$appDataChennai['UtilityName'],'LocationName'=>$appDataChennai['LocationName'],'TxnDate'=>$newDate
         ));
          $countap = $querychennai->num_rows(); //counting result from query
 
                         if ($countap === 0) {
 
                         $this->db->insert('hardware_station_consumption_data_chennai', $appDataChennai);
                         }
         }
     }
     function pushApiDataMumbai($json_mumbai){
        foreach ($json_mumbai as $valueclient) {
         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
        
           //  if(strtotime($adate)>strtotime($pdate)){
           $appDataMumbai=array(
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
         $querymumbai = $this->db->get_where('hardware_station_consumption_data_mumbai', array(//making selection
         'StationId'=>$appDataMumbai['StationId'],'TxnTime'=>$appDataMumbai['TxnTime'],'LineConnected'=>$appDataMumbai['LineConnected'],'UtilityName'=>$appDataMumbai['UtilityName'],'LocationName'=>$appDataMumbai['LocationName'],'TxnDate'=>$newDate
         ));
          $countap = $querymumbai->num_rows(); //counting result from query
 
                         if ($countap === 0) {
 
                         $this->db->insert('hardware_station_consumption_data_mumbai', $appDataMumbai);
                         }
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
    //samsung backup
    // function pushClientApiDataSamsung($json_client)
    // {
    //     //print_r($json_client);die();
    //     foreach ($json_client as $valueclient) {
            
    //         $newDate = date("Y-m-d", strtotime($valueclient['TxnDate']));
    //         $time=$valueclient['ToTime'];
    //         $adate = date('Y-m-d H:i:s', strtotime("$newDate $time"));
    //         $pdate= date("Y-m-d H:i:s", strtotime("-60 minutes"));   
            
    //         //if(strtotime($adate)>strtotime($pdate)){
    //         $appData2=array(
    //             'StationId'=>$valueclient['StationId'],
    //             'StationName'=>$valueclient['StationName'],
    //             'UtilityName'=>$valueclient['UtilityName'],
    //             'UtilityId'=>$valueclient['UtilityId'],
    //             'UtilityGroup'=>$valueclient['UtilityGroup'],
    //             'LocationName'=>$valueclient['LocationName'],
    //             'LocationGroup'=>$valueclient['LocationGroup'],
    //             'MeterName'=>$valueclient['MeterName'],
    //             'MeterSerial'=>$valueclient['MeterSerial'],
    //             'MeterType'=>$valueclient['MeterType'],
    //             'LineName'=>$valueclient['LineName'],
    //             'LineConnected'=>$valueclient['LineConnected'],
    //             'TxnDate'=>$newDate,
    //             'TxnTime'=>$valueclient['TxnTime'],
    //             'FromTime'=>$valueclient['FromTime'],
    //             'ToTime'=>$valueclient['ToTime'],
    //             'PrvReading'=>$valueclient['PrvReading'],
    //             'CurReading'=>$valueclient['CurReading'],
    //             'Consumption'=>$valueclient['Consumption'],
    //             'Multiplier'=>$valueclient['Multiplier'],
    //             'UomName'=>$valueclient['UomName'],
    //             'UomScale'=>$valueclient['UomScale'],
    //             'UomGraph'=>$valueclient['UomGraph']                
    //         );

    //     $queryclient = $this->db->get_where('hardware_station_consumption_data_samsung', array(//making selection
    //     'StationId'=>$appData2['StationId'],'TxnTime'=>$appData2['TxnTime'],'LineConnected'=>$appData2['LineConnected'],'LineName'=>$appData2['LineName'],'TxnDate'=>$newDate
    //     ));

    //     $countclient = $queryclient->num_rows(); //counting result from query

    //     if ($countclient === 0) {

    //     $this->db->insert('hardware_station_consumption_data_samsung', $appData2);
    //     }
          
    //     }

    // }
    //end backup
function pushClientApiData($json_client)
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
                'CurReading'=>$valueclient['CurReading'],
                'Consumption'=>$valueclient['Consumption'],
                'Multiplier'=>$valueclient['Multiplier'],
                'UomName'=>$valueclient['UomName'],
                'UomScale'=>$valueclient['UomScale'],
                'UomGraph'=>$valueclient['UomGraph']                
            );

        $queryclient = $this->db->get_where('hardware_station_consumption_data', array(//making selection
        'StationId'=>$appData2['StationId'],'FromTime'=>$appData2['FromTime'],'ToTime'=>$appData2['ToTime'],'LineConnected'=>$appData2['LineConnected'],'LineName'=>$appData2['LineName'],'TxnDate'=>$newDate
        ));

        $countclient = $queryclient->num_rows(); //counting result from query

        if ($countclient === 0) {

        $this->db->insert('hardware_station_consumption_data', $appData2);
        }
          
        }

    }
}