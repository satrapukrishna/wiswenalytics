<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class Uploaddata extends CI_Controller
{
	function __construct(){
		parent::__construct();
		// $this->load->model('Boiler_model');
		// $this->load->model('Boiler_graph_model');
		$this->load->model('Fuel_consumtion_model');
	}
	function getData(){ 
	 
	 $str = file_get_contents('http://localhost:8081/WenalyticsRepo/asset/test.json');
	 $json = json_decode($str, true);
	// print_r($json);die();
	 foreach ($json as $value) {

	 	$data=explode("_",$value['UtilityName']);
	 	//echo count($data);
	 	if(count($data)==3){
		$utilityName=$data[0];
		$locationname=$data[1]."_".$data[2];
	 	}
	 	elseif(count($data)==4){
		$utilityName=$data[0]."_".$data[1];
		$locationname=$data[2]."_".$data[3];
	 	}else{
	 		$utilityName=$data[0]."_".$data[1]."_".$data[2];
			$locationname=$data[3]."_".$data[4];
	 	}
		
		$newDate = date("Y-m-d", strtotime($value['TxnDate']));
		$appData=array('StationId'=>$value['StationId'],
						'StationName'=>$value['StationName'],
						 'UtilityName'=>$utilityName,
						 'UomScale'=>$value['UomScale'],
						 'UomGraph'=>$value['UomGraph'],
						 'MeterName'=>$value['MeterName'],
						 'TxnDate'=>$newDate,
						 'FromTime'=>$value['FromTime'],
						 'ToTime'=>$value['ToTime'],
						 'PrvReading'=>$value['PrvReading'],
						 'CurReading'=>$value['CurReading'],
						 'Consumption'=>$value['Consumption'],
						 'ValueMax'=>$value['ValueMax'],
						 'ValueMin'=>$value['ValueMin'],
						 'ValueAvg'=>$value['ValueAvg'],
						 'MeterSerial'=>$value['MeterSerial'],
						 'LocationName'=>$locationname,
						 'UomName'=>$value['UomName']
						 );
		$this->Fuel_consumtion_model->putDbData($appData);
		
		//print_r($appData);die();
	 	
		 // $query="INSERT INTO `Factory123`.`dbo.2018000087_YC`(`StationId`,`StationName`,`UtilityName`,`LocationId`,`UtilityGroup`,`UomScale`,`UomGraph`,`LineId`,`MeterName`,`MeterType`,`TxnDate`,`FromTime`,`ToTime`,`Multiplier`,`PrvReading`,`CurReading`,`Consumption`,`PlanDayCons`,`DayMin`,`DayMax`,`DayAvg`,`ValueMax`,`ValueMin`,`ValueAvg`,`UtilityId`,`UomId`,`SerialId`,`MeterSerial`,`LocationName`,`UomName`)VALUES('".$value['StationId']."','".$value['StationName']."','".$utilityName."','','','".$value['UomScale']."','".$value['UomGraph']."','','".$value['MeterName']."','','".$value['TxnDate']."','".$value['FromTime']."','".$value['ToTime']."','','".$value['PrvReading']."','".$value['CurReading']."','".$value['Consumption']."','','','','','".$value['ValueMax']."','".$value['ValueMin']."','".$value['ValueAvg']."','','','','".$value['MeterSerial']."','".$locationname."','".$value['UomName']."')";
	 }
	
	}
	
	

}
?>