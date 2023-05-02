<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class CapitalCyberscapes extends CI_Controller 
{
	function __construct(){
		//
		parent::__construct();
		$this->load->model('Capital_model');
	}
	
	
	function HVACDashboard()
    {
       
         $this->load->view('Dashboard');
        
    }
    function getGraphReport(){
    	$this->load->view('GraphReport');
    }
    function getahuData(){
        $hvacData=$this->Capital_model->getahuReport($this->input->get());
        echo json_encode($hvacData);
    }
    function getRunnHrsReport(){
         $this->load->view('RunnHrsReport');
    }
    function getahuRunningMultiData(){
        $hvacData=$this->Capital_model->getahuRunnReort($this->input->get());
        echo json_encode($hvacData);
    }
    function getTimings(){
    	$runn=$this->Capital_model->getSumRun($this->input->get());
    }
     function getHvacData(){
    	$hvacData=$this->Capital_model->getHavcReport($this->input->get());
    	$runn=$this->Capital_model->getSumRun($this->input->get());
    	//print_r($runn);die();
        //echo count($hvacData);die();
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
    		if($hvacData[$i]->LineConnected=='Delta T Air'){
    			$result[0]['Delta T']=$hvacData[$i]->Consumption."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Set Temp'){
    			$result[0]['Set_Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Unit Status'){
    			$result[0]['Unit_Status']=$hvacData[$i]->CurReading;
    		}
            // if($hvacData[$i]->UtilityName=='Unit_Status'){
            //     $result[0]['Unit_Status']=$hvacData[$i]->UomScale;
            // }


    	
    		# code...
    	}
    	$result[0]['RunnHrs']=$runn;
    	$result[0]['Date']=$hvacData[0]->TxnDate;
    	$result[0]['Time']=$hvacData[0]->FromTime;

    	$result[0]['LocationName']=$hvacData[0]->LocationName;

    	echo json_encode($result);
    }else {
        return 0;
    	

    }
    }

}