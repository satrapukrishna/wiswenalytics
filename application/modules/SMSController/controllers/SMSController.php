<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMSController extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sms_model');
		
	}
	
function smsSend(){
	//
	$data=$this->Sms_model->getOdourData();
	//$dataf=$this->Sms_model->getJanitorTimings();
	//$fdata=$this->Sms_model->getFootfallCount($dataf[0]->ToTime);
	//print_r($data);
	//$updateArray=array();
	$checkArray=array('StationId'=>$data[0]->StationId,
            'TxnDate'=>$data[0]->TxnDate,
            'LineConnected'=>$data[0]->LineConnected,
            'CurReading'=>$data[0]->CurReading,
            'TxnTime'=>$data[0]->TxnTime);

	       $check=$this->Sms_model->checkOdourData($checkArray);
	       if ($check) {
	       	echo "No Smell";
	       }else{
	       	echo "Smell enetered";

	       	if($data[0]->CurReading>120){
			echo "Smell";

			$this->load->helper('sms_helper');
			$this->Sms_model->pushOdourData($checkArray);
			//$alrtcount=$this->Sms_model->getAlrtCount($checkArray['ToTime']);
			$message="Please clean Washroom: Demo Washroom :: High odor level";
			//$message="Alert ".$alrtcount.":Please clean 'Gents Washroom Floor2'.";
		     //$mobile="9959451265";
			$mobile="9003152338,9971635658,9868092680,9758530031,9959451265,7799399299,9966084984";
			smssend( $mobile, $message );

	      		}	
	       }
	

		// if($data[0]->CurReading>100 || $fdata>30){
		// 	$this->load->helper('sms_helper');
		// 	$this->Sms_model->pushOdourData($checkArray);
		// 	$alrtcount=$this->Sms_model->getAlrtCount($checkArray['ToTime']);
		// 	$message="Please clean Washroom: Demo Washroom :: High odor level";
		// 	//$message="Alert ".$alrtcount.":Please clean 'Gents Washroom Floor2'.";
		// 	//$mobile="9959451265";
		// 	$mobile="9003152338,9971635658,9868092680,9758530031,9959451265,7799399299";
		// 	smssend( $mobile, $message );

	 //      }	
	// if($data[0]->CurReading>120){
	// 		$this->load->helper('sms_helper');
	// 		//$this->Sms_model->pushOdourData($checkArray);
	// 		//$alrtcount=$this->Sms_model->getAlrtCount($checkArray['ToTime']);
	// 		$message="Please clean Washroom: Demo Washroom :: High odor level";
	// 		//$message="Alert ".$alrtcount.":Please clean 'Gents Washroom Floor2'.";
	// 		//$mobile="9959451265";
	// 		$mobile="9003152338,9971635658,9868092680,9758530031,9959451265,7799399299";
	// 		smssend( $mobile, $message );

	//       }	
	
	
	
}
function footFall30(){
	//$dataf=$this->Sms_model->getJanitorTimings();
	//$fdata=$this->Sms_model->getFootfallCount($dataf[0]->ToTime);
	//echo $fdata;die();
	$fdata=32;
	if($fdata>30){
		$this->load->helper('sms_helper');
			
		    $message="Alert 1:Please clean 'Gents Washroom Floor2'.";
		   
			$mobile="7799399299";
			//$mobile="9959451265";
			//$mobile="9381974847";
			smssend( $mobile, $message );
	}
	
}

function sendTempAlertDelhiFairmont(){
$data=$this->Sms_model->getIaqData();
$this->load->helper('sms_helper');
// $message="<html>
// <body>Live IAQ Levels<br>Temperature::".$data[0]['temp']." , Humidity::".$data[0]['humidity'].".</body></html>";
//echo $msg;
$message="Live IAQ Levels  Temperature::".$data[0]['temp']." , Humidity::".$data[0]['humidity'].".";
$mobile="9594336122,8097409243,9959451265";
//$mobile="7799399299";
smssend( $mobile, $message );
//print_r($data);
}
function SendWaterAlert(){
	$data=$this->Sms_model->getWaterData();
$this->load->helper('sms_helper');
// $message="<html>
// <body>Live IAQ Levels<br>Temperature::".$data[0]['temp']." , Humidity::".$data[0]['humidity'].".</body></html>";
//echo $msg;


if($data[0]['water']<20){
$message="Flush tank :: Low water level alert (Below 20%)";
$mobile="9594336122,8097409243,9959451265";
smssend( $mobile, $message );
}elseif($data[0]['water']>80){
	$message="Flush tank :: High water level alert (Above 80%)";
$mobile="9594336122,8097409243,9959451265";
	smssend( $mobile, $message );
}




}	
	
}
