<?php
class TemperatureModel extends CI_Model{
	function __construct(){
	      parent::__construct();
    }   
    function getMetersList(){
    	//print_r($this->session->userdata());
    	$db = $this->session->userdata('DB');
    	$table = $this->session->userdata('Table');
    	$this->load->database($db);//, [MeterSerial],'_'
        $query = "SELECT DISTINCT CONCAT([UtilityName], '_',[LocationName] )  AS [UtilityName],[LocationId] FROM ".$db.".[dbo].".$table." WHERE [MeterType] = 0003 AND [UomGraph] = 'SIN'";// AND [UtilityName] LIKE 'EB_%'
        //echo $query;
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    function getTempMeterPerHour($meter,$location,$date,$fromtime,$totime){
    	$date = "'".$date."'";$fromtime = "'".$fromtime."'";$totime = "'".$totime."'";$meter = "'".$meter."'";$location = "'".$location."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $querymax = "SELECT MAX([FromTime]) as [MaxTime], MAX([Multiplier] * [CurReading])  AS [CurReadingMax],MIN([Multiplier] * [CurReading])  AS [CurReadingMin],AVG([Multiplier] * [CurReading])  AS [CurReadingAvg] FROM $tablename where [UtilityName] = ".$meter." AND [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
       //echo $querymax;die();
        $data = $this->db->query($querymax)->result();

        $fulldata['CurReadingMax']=$data[0]->CurReadingMax;
        $fulldata['CurReadingMin']=$data[0]->CurReadingMin;
        $fulldata['CurReadingAvg']=$data[0]->CurReadingAvg;

        $querymaxtime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [Multiplier] * [CurReading]=".$data[0]->CurReadingMax." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;

        $querymintime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [Multiplier] * [CurReading]=".$data[0]->CurReadingMin." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;

       

        $data1 = $this->db->query($querymaxtime)->result();
        $data2 = $this->db->query($querymintime)->result();
       
       $fulldata['MaxTime']=$data1[0]->FromTime;
       $fulldata['MinTime']=$data2[0]->FromTime;
        return $fulldata;
    }
    function getTempMeterPerDay($meter,$location,$date,$fromtime,$totime){
        $fulldata=array();
        $date = "'".$date."'";$meter = "'".$meter."'";$location = "'".$location."'";
        $fromtime = "'".$fromtime."'";$totime = "'".$totime."'";
        $db = $this->session->userdata('DB');
        $table = $this->session->userdata('Table');
        $tablename = $db.".[dbo].".$table;
        $querymax = "SELECT MAX([FromTime]) as [MaxTime],MAX([Multiplier] * [CurReading])  AS [CurReadingMax],MIN([Multiplier] * [CurReading])  AS [CurReadingMin],AVG([Multiplier] * [CurReading])  AS [CurReadingAvg] FROM $tablename where [UtilityName] = ".$meter." AND [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;
       //echo $querymax;die(); 
        $data = $this->db->query($querymax)->result();
        //print_r($data);die();
        //print_r($data[0]->CurReadingMax);
        $fulldata['CurReadingMax']=$data[0]->CurReadingMax;
        $fulldata['CurReadingMin']=$data[0]->CurReadingMin;
        $fulldata['CurReadingAvg']=$data[0]->CurReadingAvg;

        $querymaxtime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [Multiplier] * [CurReading]=".$data[0]->CurReadingMax." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;

        $querymintime = "SELECT [FromTime] FROM $tablename where [UtilityName] = ".$meter." AND [Multiplier] * [CurReading]=".$data[0]->CurReadingMin." AND  [LocationName]=".$location." AND [TxnDate] =".$date." AND [FromTime] BETWEEN ".$fromtime." AND ".$totime." AND [ToTime] BETWEEN ".$fromtime." AND ".$totime;

       

        $data1 = $this->db->query($querymaxtime)->result();
        $data2 = $this->db->query($querymintime)->result();
       
       $fulldata['MaxTime']=$data1[0]->FromTime;
       $fulldata['MinTime']=$data2[0]->FromTime;
     
      // print_r($fulldata);die();
      
        return $fulldata;
    }
}
?>