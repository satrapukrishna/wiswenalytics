<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AHU_demo extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Havac_model');
		
	}

	
	function tomotherapy()
    {
       $data['meters'] = $this->Havac_model->getHavcList();
		//$this->load->view('TomotherapyView',$data);
		$this->load->view('TomotherapyView_test',$data);
        
    }
	function ahudata()
    {
       $data['meters'] = $this->Havac_model->getHavcList();
		$this->load->view('TomotherapyView_test',$data);
        
    }
    function hvacReport()
    {
       $data['meters'] = $this->Havac_model->getHavcList();
        $this->load->view('hvacreportView',$data);
        
    }
    function getahuData(){
        $hvacData=$this->Havac_model->getahuReport($this->input->get());
        echo json_encode($hvacData);
    }
    function getHvacData(){
    	$hvacData=$this->Havac_model->getHavcReport($this->input->get());
       // print_r($hvacData);die();
        //echo count($hvacData);
    	$result=array();
    	if(count($hvacData)>0){


    //echo $hvacData[0]->UtilityName;die();
    	for ($i=0; $i < count($hvacData); $i++) {
    		if($hvacData[$i]->LineConnected=='Actuator Level'){
    			$result[0]['Actuator Level']=$hvacData[$i]->Consumption;

    		}
    		if($hvacData[$i]->LineConnected=='Return Air Temp'){
    			$result[0]['Return Air Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Supply Air Temp'){
    			$result[0]['Supply Air Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Filter Pressure'){
    			$result[0]['Filter Pressure']=$hvacData[$i]->Consumption."Pa";
    		}
    		if($hvacData[$i]->LineConnected=='CHWS Temp'){
    			$result[0]['CW Sup Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='CHWR Temp'){
    			$result[0]['CH Ret Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Delta T'){
    			$result[0]['Delta T']=$hvacData[$i]->Consumption."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Set Temp'){
    			$result[0]['Set_Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		
		if($hvacData[$i]->LineConnected=='Fan 1 Power'){
            $result[0]['Fan 1 Power']=$hvacData[$i]->CurReading."kW";
         }
         if($hvacData[$i]->LineConnected=='Fan 2 Power'){
            $result[0]['Fan 2 Power']=$hvacData[$i]->CurReading."kW";
         }
		if($hvacData[$i]->LineConnected=='DeltaT Air'){
            $result[0]['DeltaT Air']=$hvacData[$i]->CurReading."&deg;C";
         }
         if($hvacData[$i]->LineConnected=='RA Set Temp'){
            $result[0]['RA Set Temp']=$hvacData[$i]->CurReading."&deg;C";
         }
         if($hvacData[$i]->LineConnected=='Set RA Humidity'){
            $result[0]['Set RA Humidity']=$hvacData[$i]->CurReading."%RH";
         }
		 if($hvacData[$i]->LineConnected=='Auto/Man Status'){
			 if($hvacData[$i]->CurReading==1){
				$result[0]['Auto/Man Status']="On";
			 }else{
				$result[0]['Auto/Man Status']="Off";
			 }
            
         }
		 if($hvacData[$i]->LineConnected=='Unit Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Unit Status']="On";
			 }else{
				$result[0]['Unit Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='CWV Out Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['CWV Out Status']="On";
			 }else{
				$result[0]['CWV Out Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Filter Clog Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Filter Clog Status']="On";
			 }else{
				$result[0]['Filter Clog Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Fire Trip Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Fire Trip Status']="On";
			 }else{
				$result[0]['Fire Trip Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Heater 1 Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Heater 1 Status']="On";
			 }else{
				$result[0]['Heater 1 Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Heater 2 Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Heater 2 Status']="On";
			 }else{
				$result[0]['Heater 2 Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Heater 3 Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Heater 3 Status']="On";
			 }else{
				$result[0]['Heater 3 Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Unit Status F/B'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Unit Status F/B']="On";
			 }else{
				$result[0]['Unit Status F/B']="Off";
			 }
		 }

		 if($hvacData[$i]->LineConnected=='CHW Valve'){
            $result[0]['CHW Valve']=$hvacData[$i]->CurReading."%";
         }
		 if($hvacData[$i]->LineConnected=='DeltaT Chilled Water'){
            $result[0]['DeltaT Chilled Water']=$hvacData[$i]->CurReading."&deg;C";
         }
    	
    		# code...
    	}
    	$result[0]['Date']=$hvacData[0]->TxnDate;
    	$result[0]['Time']=$hvacData[0]->FromTime;

    	$result[0]['LocationName']=$hvacData[0]->LocationName;

    	echo json_encode($result);
    }else {
        return 0;
    	

    }
    }
}



?>