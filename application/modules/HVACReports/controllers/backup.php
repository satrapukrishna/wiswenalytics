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
    function getHvacData(){
    	$hvacData=$this->Havac_model->getHavcReport($this->input->get());
        //echo count($hvacData);
    	$result=array();
    	if(count($hvacData)>0){


    	//echo $hvacData[0]->UtilityName;die();
    	for ($i=0; $i < count($hvacData); $i++) {
    		if($hvacData[$i]->UtilityName=='Actuator Level'){
    			$result[0]['Actuator Level']=$hvacData[$i]->ValueMax;

    		}
    		if($hvacData[$i]->UtilityName=='Return Air Temp'){
    			$result[0]['Return Air Temp']=$hvacData[$i]->ValueMax."&deg;C";
    		}
    		if($hvacData[$i]->UtilityName=='Supply Air Temp'){
    			$result[0]['Supply Air Temp']=$hvacData[$i]->ValueMax."&deg;C";
    		}
    		if($hvacData[$i]->UtilityName=='Filter Pressure'){
    			$result[0]['Filter Pressure']=$hvacData[$i]->ValueMax."Pa";
    		}
    		if($hvacData[$i]->UtilityName=='CW Sup Temp'){
    			$result[0]['CW Sup Temp']=$hvacData[$i]->ValueMax."&deg;C";
    		}
    		if($hvacData[$i]->UtilityName=='CH Ret Temp'){
    			$result[0]['CH Ret Temp']=$hvacData[$i]->ValueMax."&deg;C";
    		}
    		if($hvacData[$i]->UtilityName=='Delta T'){
    			$result[0]['Delta T']=$hvacData[$i]->ValueMax."&deg;C";
    		}
    		if($hvacData[$i]->UtilityName=='Set_Temp'){
    			$result[0]['Set_Temp']=$hvacData[$i]->ValueMax."&deg;C";
    		}
    		if($hvacData[$i]->UtilityName=='Unit_Status'){
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