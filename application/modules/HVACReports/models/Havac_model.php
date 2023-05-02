<?php
class Havac_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getHavcReport($data){
    	
    	$date = "'".$data['date']."'";
  //   	$query="select id, UtilityName,LocationName,UomScale,TxnDate, FromTime, ToTime, ValueMax from (
		// select id, UtilityName,TxnDate, FromTime, ToTime, ValueMax ,LocationName,UomScale from protech_bms.hardware_station_consumption_data_apollo where
		//  TxnDate=".$date." and LocationName=".$meter." and StationId='2018000087'  order by id desc 
		// ) as sub where id=sub.id group by sub.UtilityName";
        $replaced = str_replace('_', ' ', $data['meter']);
        $meter = "'".$replaced."'";
        $query="select id, LineConnected,LocationName,UomScale,TxnDate, FromTime, ToTime, CurReading,Consumption from (
        select id, LineConnected,TxnDate, FromTime, ToTime, CurReading,Consumption ,LocationName,UomScale from protech_bms.hardware_station_consumption_data_apollo where
         TxnDate=".$date." and LocationName=".$meter." and StationId='2018000087'  order by id desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        //echo $query;die();
		$data = $this->db->query($query)->result();
    	return $data;

    }
    function getHavcList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM hardware_station_consumption_data_apollo WHERE UtilityName='HVAC' and MeterType=17";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    function getahuReport($data){
        $resultArray=array();
        $mtr = str_replace('_', ' ', $data['meter']);

        $meter = "'".$mtr."'";
        $date = "'".$data['fromdate']."'";

        $queryrat="SELECT Fromtime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Return Air Temp' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00'";
    //echo $queryrat;die();
        $querysat="SELECT Fromtime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Supply Air Temp' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00' ";    
        $queryrwt="SELECT Fromtime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWR Temp' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00' ";
         $queryswt="SELECT Fromtime,CurReading FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWS Temp' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00' ";

         $queryactu="SELECT Fromtime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Actuator Level' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00' ";
         $querystmp="SELECT Fromtime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Set Temp' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00' ";
         $querypressure="SELECT Fromtime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Filter Pressure' and FromTime NOT BETWEEN '23:57:00' AND '24:00:00' ";
         $fulldata=array();
          for ($i=0; $i < 24; $i++) 
        { 
            if($i>9)
            {
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";    
            }
            else
            {
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
 
            $queryrr="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Unit RHT' and FromTime NOT BETWEEN '23:58:00' AND '24:00:00'   and FromTime BETWEEN '".$from."' AND '".$to."'";
            
            
            $rundata = $this->db->query($queryrr)->result();
            // echo $querygood;die();
            if($rundata[0]->Consumption>60){
                $run=60;
            }
            else{
               $run=$rundata[0]->Consumption; 
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['rh']=$run;
            
            
           

        }
        // $queryruntime="SELECT Fromtime,Consumption FROM hardware_station_consumption_data_apollo where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Unit Run Time' and FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ";

         $datarat = $this->db->query($queryrat)->result();
         $datasat = $this->db->query($querysat)->result();
         $datarwt = $this->db->query($queryrwt)->result();
         $dataswt = $this->db->query($queryswt)->result();
         $dataactu = $this->db->query($queryactu)->result();
         $datastemp = $this->db->query($querystmp)->result();
         $datapressure = $this->db->query($querypressure)->result();
        // $datarun = $this->db->query($queryruntime)->result();
        
            
              $resultArray[0]['rat']=$datarat;
              $resultArray[0]['sat']=$datasat;
              $resultArray[0]['rwt']=$datarwt;
              $resultArray[0]['swt']=$dataswt;
              $resultArray[0]['actu']=$dataactu;
              $resultArray[0]['stemp']=$datastemp;
              $resultArray[0]['pressure']=$datapressure;
              $resultArray[0]['run']=$fulldata;


          
     return $resultArray;
    }
}