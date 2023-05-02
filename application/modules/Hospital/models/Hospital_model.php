<?php
class Hospital_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getHavcReport($data){
    	
    	//$date = "'2021-06-04'";
         $date = "'".$data['date']."'";
  //   	$query="select id, UtilityName,LocationName,UomScale,TxnDate, FromTime, ToTime, ValueMax from (
		// select id, UtilityName,TxnDate, FromTime, ToTime, ValueMax ,LocationName,UomScale from protech_bms.hardware_station_consumption_data_apollo2 where
		//  TxnDate=".$date." and LocationName=".$meter." and StationId='2018000087'  order by id desc 
		// ) as sub where id=sub.id group by sub.UtilityName";
        $replaced = str_replace('_', ' ', $data['meter']);
        $meter = "'".$replaced."'";
        $query="select id, LineConnected,LocationName,UomScale,TxnDate, TxnTime, CurReading,Consumption from (
        select id, LineConnected,TxnDate,TxnTime, CurReading,Consumption ,LocationName,UomScale from protech_bms.hardware_station_consumption_data_apollo3 where
         TxnDate=".$date." and LocationName=".$meter." and StationId='2018000087'  order by id desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        //echo $query;die();
		$data = $this->db->query($query)->result();
    	return $data;

    }
    function getHavcList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM hardware_station_consumption_data_apollo WHERE UtilityName IN ('HVAC','AHU') and MeterType IN(17,'HDA3')";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    function getahuReport($data){
        $resultArray=array();
        $mtr = str_replace('_', ' ', $data['meter']);

        $meter = "'".$mtr."'";
        $date = "'".$data['fromdate']."'";
        $ft=strtotime($data['fromdate']);
        //$tt=strtotime("2021-08-05");
        $tt=strtotime("2021-10-04");
      if($tt<$ft){
        //$hardware="hardware_station_consumption_data_apollo2";
        $hardware="hardware_station_consumption_data_apollo3";
        
      }else{
        $hardware="hardware_station_consumption_data_apollo";
      }
        $queryrat="SELECT TxnTime,CurReading FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Return Air Temp'";
    //echo $queryrat;die();
        $querysat="SELECT TxnTime,CurReading FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Supply Air Temp' ";    
        $queryrwt="SELECT TxnTime,CurReading FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWR Temp'";
         $queryswt="SELECT TxnTime,CurReading FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWS Temp' ";

         $queryactu="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Actuator Level' ";
         $querystmp="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Set Temp' ";
         $querypressure="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Filter Pressure' ";
         //echo $meter;die();
         if($mtr=='Trubeam AHU-1' || $mtr=='Trubeam AHU-2'){
            $queryraHumidity="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Set RA Humidity' ";

            $queryrastmp="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='RA Set Temp' ";

            $querydeltaair="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='DeltaT Air' ";

            $querydeltachill="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='DeltaT Chilled Water' ";

            $queryFan1power="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Fan 1 Power' ";

            $queryFan2power="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Fan 2 Power' ";

            $queryh1="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Heater 1 Status' ";

            $queryh2="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Heater 2 Status' ";

            $queryh3="SELECT TxnTime,Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Heater 2 Status' ";


        
            $datahumidity = $this->db->query($queryraHumidity)->result();
            $dataratemp = $this->db->query($queryrastmp)->result();
            $datadeltaair = $this->db->query($querydeltaair)->result();
            $datadeltachill = $this->db->query($querydeltachill)->result();
            $datafan1power = $this->db->query($queryFan1power)->result();
            $datafan2power = $this->db->query($queryFan2power)->result();
            $datah1 = $this->db->query($queryh1)->result();
            $datah2 = $this->db->query($queryh2)->result();
            $datah3 = $this->db->query($queryh3)->result();

            $resultArray[0]['humidity']=$datahumidity;
            $resultArray[0]['rastemp']=$dataratemp;
            $resultArray[0]['deltaair']=$datadeltaair;
            $resultArray[0]['deltachill']=$datadeltachill;
            $resultArray[0]['fan1power']=$datafan1power;
            $resultArray[0]['fan2power']=$datafan2power;
            $resultArray[0]['heater1']=$datah1;
            $resultArray[0]['heater2']=$datah2;
            $resultArray[0]['heater3']=$datah3;
         }
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
 
            $queryrr="SELECT SUM(Consumption) as Consumption FROM ".$hardware." where StationId=2018000087 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Unit RHT'    and TxnTime BETWEEN '".$from."' AND '".$to."'";
            
            
            $rundata = $this->db->query($queryrr)->result();
            // echo $querygood;die();
            if($rundata[0]->Consumption>60){
                $run=60;
            }elseif($rundata[0]->Consumption>48){
            $run=60;
		    }
            else{
               $run=$rundata[0]->Consumption; 
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['rh']=$run;
        }
       

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
              $resultArray[0]['meter']=$mtr;


          
     return $resultArray;
    }
}