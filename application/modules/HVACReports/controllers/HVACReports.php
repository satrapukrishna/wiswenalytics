<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HVACReports extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Havac_model');
		
	}

	
	function tomotherapy()
    {
       $data['meters'] = $this->Havac_model->getHavcList();
		$this->load->view('TomotherapyView',$data);
        
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
    		if($hvacData[$i]->LineConnected=='Unit Status'){
    			$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
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