<?php

class Energymetermodel extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function getEnergyMetersUmoScale($meters,$locationId){
        $meters = "'".$meters."'";
       $db = str_replace( array('[',']') , ''  , $this->session->userdata('DB') );//echo $db;die();
        $table =str_replace( array('[',']') , ''  , $this->session->userdata('Table') ); 
        $this->load->database($db);
        $query = "SELECT DISTINCT UomScale FROM ".$db.".`dbo.".$table."` WHERE UtilityName=".$meters." AND LocationId=".$locationId;
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getEnergymetersList(){
        //print_r($this->session->userdata());
        $db = str_replace( array('[',']') , ''  , $this->session->userdata('DB') );//echo $db;die();
        $table =str_replace( array('[',']') , ''  , $this->session->userdata('Table') ); 
        $this->load->database($db);//, [MeterSerial],'_'
        $query = "SELECT DISTINCT CONCAT(UtilityName, '_', LocationId, '_',LocationName )  AS UtilityName,LocationId FROM ".$db.".`dbo.".$table."` WHERE MeterType = 0002 AND UomGraph = 'CUM'";// AND [UtilityName] LIKE 'EB_%'
        //echo  $query; 
        $data = $this->db->query($query)->result();
        //print($data);die();
        return $data;
    }
    function getEnergymetersLoadList(){
        $db = $this->session->userdata('DB');//echo $db;die();
        $table = $this->session->userdata('Table');
        $this->load->database($db);
        //$query = "SELECT DISTINCT CONCAT([UtilityName], '_', [LocationId] )  AS [UtilityName] FROM ".$db.".[dbo].".$table." WHERE [UtilityName] LIKE 'EB_KWH%'";
        $query = "SELECT DISTINCT CONCAT(UtilityName, '_', LocationName )  AS UtilityName,LocationId FROM ".$db.".`dbo.".$table." `WHERE MeterType = 0002 AND UomGraph = 'SIN'";// AND [UtilityName] LIKE 'EB_%'
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMAXPerDayTime($day,$meter,$fromtime,$totime,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";$fromtime ="'".$fromtime."'";$totime ="'".$totime."'";
        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".dbo.".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  MAX( Multiplier * Consumption) AS consumption FROM $tablename where UtilityName = ".$meter." AND LocationId=".$LocationId." AND TxnDate = ".$day." AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime;
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    
    function getMeterMINPerDay($day,$meter,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";
        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  MIN( [Multiplier] * [Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day;
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMINPerDayTime($day,$meter,$fromtime,$totime,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";$fromtime ="'".$fromtime."'";$totime ="'".$totime."'";        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  MIN( [Multiplier] * [Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMAXPerDay($day,$meter,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";
        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  MAX( [Multiplier] * [Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day;
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterAvgPerDay($day,$meter,$fromtime,$totime,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";$fromtime ="'".$fromtime."'";$totime ="'".$totime."'";
        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  SUM([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterAvgPerDayOLD($day,$meter,$fromtime,$totime,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";$fromtime ="'".$fromtime."'";$totime ="'".$totime."'";
        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  SUM([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //Previous query 02-10-2018
        // $query = "SELECT  [Multiplier],[Consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //echo $query."<br>";die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterAvgPerDayWithoutTime($day,$meter,$LocationId){
        $day ="'".$day."'";$meter ="'".$meter."'";
        
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;//[BNation123].[dbo].[2017000060_YC]
        $query = "SELECT  SUM([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] = ".$day;
       // echo $query;die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterAvgPerSelectedDates($fromdate,$todate,$meter,$location){
       // echo $fromdate." ".$todate." ".$meter." ".$location;
        $fromdate = "'".$fromdate."'";  $todate = "'".$todate."'";   $meter = "'".$meter."'";  
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT SUM([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$location." AND [TxnDate] BETWEEN ".$fromdate." AND ".$todate;
        //echo $query;die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMAXPerSelectedDateTime($date,$fromtime,$totime,$meter,$LocationId){
        $date = "'".$date."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT MAX([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        /*"SELECT top 1 MAX(  [Consumption]) AS [maxconsumption],[FromTime] FROM 
  [BNation123].[dbo].[2017000060_YC] where [UtilityName] = 'EB_KVAH' AND [LocationId]=4 
  AND [TxnDate] ='2018-09-10' AND [FromTime] BETWEEN '00:00:00' AND '24:00:00' AND [ToTime] BETWEEN '00:00:00' AND '24:00:00'
    group by  [FromTime] order by [maxconsumption] DESC"*/
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMAXPerSelectedDate($date,$meter,$LocationId){
        $date = "'".$date."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT MAX([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] =".$date;
        $data = $this->db->query($query)->result();
        return $data;
    }
    function energymeterMaxValuewithOutTime($date,$meter,$locationId){
        $date = "'".$date."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT  TOP 1 MAX([Consumption]) AS [Consumption],[Multiplier],[FromTime] FROM [BNation123].[dbo].[2017000060_YC] where [UtilityName] = ".$meter." AND [LocationId]=".$locationId." AND [TxnDate] =".$date." GROUP BY [Consumption],[Multiplier],[FromTime] ORDER BY [Consumption] DESC";
        //echo  $query;
        $data = $this->db->query($query)->result();
        return $data;
    }
    function energymeterMinValuewithOutTime($date,$meter,$locationId){
        $date = "'".$date."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT  TOP 1 MIN([Consumption]) AS [Consumption],[Multiplier],[FromTime] FROM [BNation123].[dbo].[2017000060_YC] where [UtilityName] = ".$meter." AND [LocationId]=".$locationId." AND [TxnDate] =".$date." GROUP BY [Consumption],[Multiplier],[FromTime] ORDER BY [Consumption] ASC";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function energymeterMaxValuewithTime($date,$meter,$fromtime,$totime,$locationId){
        $date = "'".$date."'";$meter = "'".$meter."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";
                $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT  TOP 1 MAX([Consumption]) AS [Consumption],[Multiplier],[FromTime] FROM [BNation123].[dbo].[2017000060_YC] where [UtilityName] = ".$meter." AND [LocationId]=".$locationId." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime." GROUP BY [Consumption],[Multiplier],[FromTime] ORDER BY [Consumption] DESC";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function energymeterMinValuewithTime($date,$meter,$fromtime,$totime,$locationId){
        $date = "'".$date."'";$meter = "'".$meter."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";
                $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT  TOP 1 MIN([Consumption]) AS [Consumption],[Multiplier],[FromTime] FROM [BNation123].[dbo].[2017000060_YC] where [UtilityName] = ".$meter." AND [LocationId]=".$locationId." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime." GROUP BY [Consumption],[Multiplier],[FromTime] ORDER BY [Consumption] ASC";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMINPerSelectedDateTime($date,$fromtime,$totime,$meter,$LocationId){
        $date = "'".$date."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT MIN([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterMINPerSelectedDate($date,$meter,$LocationId){
        $date = "'".$date."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT MIN([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] =".$date;
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getMeterAvgPerSelectedDateTime($date,$fromtime,$totime,$meter,$LocationId){
        $date = "'".$date."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";$meter = "'".$meter."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $query = "SELECT SUM([Consumption]) AS [consumption] FROM $tablename where [UtilityName] = ".$meter." AND [LocationId]=".$LocationId." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //echo  $query;die();
        $data = $this->db->query($query)->result();
        return $data;
    }
    function getEnergyMeterLoadPerHour($meter,$location,$date,$fromtime,$totime){
        $date = "'".$date."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";$meter = "'".$meter."'";$location = "'".$location."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $querymax = "SELECT MAX([CurReading]) AS [MaxRead], MIN([CurReading]) AS [MinRead],MAX([Multiplier] * [CurReading])  AS [CurReadingMax],MIN([Multiplier] * [CurReading])  AS [CurReadingMin],AVG([Multiplier] * [CurReading])  AS [CurReadingAvg] FROM $tablename where [UtilityName] = ".$meter." AND [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //echo $querymax;die();
        $data = $this->db->query($querymax)->result();
        if(isset($data[0]->MaxRead)){
            $fulldata['CurReadingMax']=$data[0]->CurReadingMax;
        $fulldata['CurReadingMin']=$data[0]->CurReadingMin;
        $fulldata['CurReadingAvg']=$data[0]->CurReadingAvg;

        $querymaxtime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [CurReading]=".$data[0]->MaxRead." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
//echo $querymaxtime;die();

        $querymintime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [CurReading]=".$data[0]->MinRead." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;

       //echo $querymintime;die();

        $data1 = $this->db->query($querymaxtime)->result();
        $data2 = $this->db->query($querymintime)->result();
       
       $fulldata['MaxTime']=$data1[0]->FromTime;
       $fulldata['MinTime']=$data2[0]->FromTime;
        return $fulldata;

        }

        
       
    }
    function getEnergyMeterLoadPerDay($meter,$location,$date,$fromtime,$totime){
        $date = "'".$date."'";$meter = "'".$meter."'";$location = "'".$location."'";
        $fromtime = "'".$fromtime."'";$totime = "'".$totime."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $querymax = "SELECT MAX([CurReading]) AS [MaxRead], MIN([CurReading]) AS [MinRead],MAX([Multiplier] * [CurReading])  AS [CurReadingMax],MIN([Multiplier] * [CurReading])  AS [CurReadingMin],AVG([Multiplier] * [CurReading])  AS [CurReadingAvg] FROM $tablename where [UtilityName] = ".$meter." AND [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
        //echo  $querymax;die();
        $data = $this->db->query($querymax)->result();
         if(isset($data[0]->MaxRead)){
        $fulldata['CurReadingMax']=$data[0]->CurReadingMax;
        $fulldata['CurReadingMin']=$data[0]->CurReadingMin;
        $fulldata['CurReadingAvg']=$data[0]->CurReadingAvg;

        $querymaxtime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [CurReading]=".$data[0]->MaxRead." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
//echo $querymaxtime;

        $querymintime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [CurReading]=".$data[0]->MinRead." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;

       //echo $querymintime;die();

        $data1 = $this->db->query($querymaxtime)->result();
        $data2 = $this->db->query($querymintime)->result();
       //print_r($data2);die();
       $fulldata['MaxTime']=$data1[0]->FromTime;
       $fulldata['MinTime']=$data2[0]->FromTime;
        return $fulldata;
    }
    }
}