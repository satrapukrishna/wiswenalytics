<?php
class Sms_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getOdourData(){
    	$today=date("Y-m-d");
    	$query="SELECT CurReading,TxnTime,TxnDate,LineConnected,StationId FROM hardware_station_consumption_data_samsung where StationId=2020000004 and LineConnected='Odour Male Right' and TxnDate='".$today."'  order by TxnTime desc limit 1";
    	$data = $this->db->query($query)->result();
         return $data;
    }
    function checkOdourData($data){
    	 $querycheck = $this->db->get_where('OdouSmsData', array('StationId'=>$data['StationId'],'TxnTime'=>$data['TxnTime'],'LineConnected'=>$data['LineConnected'],'CurReading'=>$data['CurReading'],'TxnDate'=>$data['TxnDate']
        ));
   // echo $this->db->last_query();

        $count = $querycheck->num_rows();
        return $count;

    }
    function pushOdourData($data){
    	$this->db->insert('OdouSmsData', $data);
    }
    function getJanitorTimings(){
    	$today=date("Y-m-d");
    	$query="SELECT TxnTime as ToTime FROM hardware_station_consumption_data_samsung where LineConnected in ('Janitor_1','Janitor_2') and StationId=2020000004 and TxnDate='".$today."' and Consumption>0 order by TxnTime desc limit 1";
    	$data = $this->db->query($query)->result();
         return $data;
    }
    function getFootfallCount($time){
    	$today=date("Y-m-d");
    	$query1="SELECT round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_samsung where LineConnected='Footfall Male' and StationId=2020000004 and TxnDate='".$today."' AND  ToTime >'".$time."'";
    	$data = $this->db->query($query1)->result();
    	return $data[0]->Consumption;
    	
    }
    function getAlrtCount($time1){
    	//$date = date($time);
    	$today=date("Y-m-d");
		$time = strtotime($time1);
		$first = $time - (10 * 60);
		$last = $time + (1 * 60);
		$date = date("H:i:s", $first);
		$date1 = date("H:i:s", $last);
		//echo "present: ".$date1." lsat:".$date;
		$query="select * FROM OdouSmsData where TxnDate='".$today."' and ToTime BETWEEN '".$date."' and '".$date1."'";
		$data = $this->db->query($query)->result();
         return count($data);
		//echo $query;

    }
    function getWaterData(){
         $todayDate=date('Y-m-d');
         $resultArray=array();
         $querywater="SELECT Round((Consumption/86000)*100) as Consumption,TxnTime FROM app_device_station_consumtion_jll where TxnDate='".$todayDate."' and StationId=2020000003 and UtilityName='UG Flush Tank' ORDER BY TxnTime DESC limit 1";

         
            $datawtr = $this->db->query($querywater)->result();

           
            $resultArray[0]['water']=$datawtr[0]->Consumption;
           
           
             
            return $resultArray;
    }
    function getIaqData(){
         $todayDate=date('Y-m-d');
         $resultArray=array();
         $querytemp="SELECT Consumption FROM app_device_station_consumtion_jll where StationId=2020000003 and TxnDate='".$todayDate."' and UomName='Temperature' ORDER BY Id DESC limit 1";
         //echo $querytemp;die();
         $queryhumi="SELECT Consumption FROM app_device_station_consumtion_jll where StationId=2020000003 and TxnDate='".$todayDate."' and UomName='Humidity' ORDER BY Id DESC limit 1";
         
       
            $datatmp = $this->db->query($querytemp)->result();
            $datahmd = $this->db->query($queryhumi)->result();

           
            $resultArray[0]['temp']=round($datatmp[0]->Consumption,2);
            $resultArray[0]['humidity']=round($datahmd[0]->Consumption,2);
           
             
            return $resultArray;

    }
    
}