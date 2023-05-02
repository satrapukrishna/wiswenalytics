<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class Sodexo extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Sodexo_model');
		
	}
	
	function sodexoDashboard()
	{
		
		//$this->load->view('Dashboard');
		$this->load->view('Dashboard1');
	}
	function getSodexoData(){

		$sodexoData=$this->Sodexo_model->getSodexoReport($this->input->get(),'Toilet01');		
		//$GetFeedbackData=$this->Sodexo_model->getFeedbackData();
		
		//echo count($sodexoData);
    	if(count($sodexoData)>0){
    		echo json_encode($sodexoData);
    	}else{
    		$result[0]['footfallcountMale']="No Data" ;
    		$result[0]['TxnDate']=date("Y-m-d");
    		$result[0]['ToTime']='00-00-00';
    		echo json_encode($result);
    	}
    	

	}
	function getAndUpdateFeedback(){
		$fbd=$this->input->post();
		// print_r($fbd);die();

		$toiletName="Toilet01";
        $toiletLocation="Madhapur";
        $HandTowel=$fbd['HandTowel'];
        $Toiletroll=$fbd['Toiletroll'];
        $DustbinFull=$fbd['DustbinFull'];
        $NoDustbin=$fbd['NoDustbin'];
        $FloorDry=$fbd['FloorDry'];
        $FloorWet=$fbd['FloorWet'];
        $HandSoap=$fbd['HandSoap'];
        // $HandTowel=0;
        // $Toiletroll=0;
        // $DustbinFull=0;
        // $NoDustbin=1;
        // $FloorDry=1;
        // $FloorWet=1;
        // $HandSoap=1;

		$Fdata=array();
		$Fdata['ToiletLocation']=$toiletLocation;
		$Fdata['UpdatedDate']=date("Y/m/d h:i:s");
        if($HandSoap==2){
        	$Fdata['HandSoap']=0; 
        	$Fdata['HandSoapTime']=date("Y/m/d h:i:s");       	
        }if($FloorWet==2){
        	$Fdata['FloorWet']= 0;
        	$Fdata['FloorWetTime']= date("Y/m/d h:i:s");
        }if($FloorDry==2){
        	$Fdata['FloorDry']=0;
        	$Fdata['FloorDryTime']= date("Y/m/d h:i:s");
        }if($NoDustbin==2){
        	$Fdata['NoDustbin']=0;
        	$Fdata['NoDustbinTime']= date("Y/m/d h:i:s");
        }if($DustbinFull==2){
        	$Fdata['DustbinFull']=0;
        	$Fdata['DustbinFullTime']= date("Y/m/d h:i:s");
        }if($Toiletroll==2){
        	$Fdata['Toiletroll']=0;
        	$Fdata['ToiletrollTime']= date("Y/m/d h:i:s");
        }if($HandTowel==2){
        	$Fdata['HandTowel']=0;
        	$Fdata['HandTowelTime']= date("Y/m/d h:i:s");
        }

        
		$FeedbackData=$this->Sodexo_model->getAndUpdateFeedbackData($Fdata);

		if($FeedbackData){
			$res['status']="Success";
			echo json_encode($res);
		}else{
			$res['status']="Failure";
			echo json_encode($res);
		}
	}
	function getFeedbackData(){
		$gfbd=$this->input->get();
		
		 $GetFeedbackData=$this->Sodexo_model->getFeedbackData($gfbd['tid']);
		 echo json_encode($GetFeedbackData);

	}
	function getAndUpdateJanitorData(){
		$fbd=$this->input->post();
		//print_r($fbd);die();
		$janitorName=$fbd['JanitorName'];
		$toiletName="Toilet01";
        $toiletLocation="Sodexo Office Jubilee Hills";
        $HandTowel=$fbd['HandTowel'];
        $Toiletroll=$fbd['Toiletroll'];
        $DustbinFull=$fbd['DustbinFull'];
        $NoDustbin=$fbd['NoDustbin'];
        $FloorDry=$fbd['FloorDry'];
        $FloorWet=$fbd['FloorWet'];
        $HandSoap=$fbd['HandSoap'];
       

		$Fdata=array();
		$Jdata=array();
		$Jdata['ToiletId']='2019000077';
		$Jdata['ToiletName']=$toiletName;
		$Jdata['JanitorName']=$janitorName;
		$Fdata['ToiletLocation']=$toiletLocation;
		$Fdata['UpdatedDate']=date("Y/m/d h:i:s");
		$Jdata['UpdatedDate']=date("Y/m/d h:i:s");
        if($HandSoap==2){
        	$Fdata['HandSoap']=1; 
        	$Jdata['HandSoap']=1;
        	$Fdata['HandSoapTime']=NULL;      	
        }if($FloorWet==2){
        	$Fdata['FloorWet']= 1;
        	$Jdata['FloorWet']= 1;
        	$Fdata['FloorWetTime']=NULL;
        }if($FloorDry==2){
        	$Fdata['FloorDry']=1;
        	$Jdata['FloorDry']=1;
        	$Fdata['FloorDryTime']= NULL;
        }if($NoDustbin==2){
        	$Fdata['NoDustbin']=1;
        	$Jdata['NoDustbin']=1;
        	$Fdata['NoDustbinTime']= NULL;
        }if($DustbinFull==2){
        	$Fdata['DustbinFull']=1;
        	$Jdata['DustbinFull']=1;
        	$Fdata['DustbinFullTime']= NULL;
        }if($Toiletroll==2){
        	$Fdata['Toiletroll']=1;
        	$Jdata['Toiletroll']=1;
        	$Fdata['ToiletrollTime']= NULL;
        }if($HandTowel==2){
        	$Fdata['HandTowel']=1;
        	$Jdata['HandTowel']=1;
        	$Fdata['HandTowelTime']= NULL;
        }

        
		$FeedbackData=$this->Sodexo_model->getAndUpdateFeedbackData($Fdata);
		$JanitorData=$this->Sodexo_model->updateJanitorData($Jdata);

		if($FeedbackData){
			$res['status']="Success";
			echo json_encode($res);
		}else{
			$res['status']="Failure";
			echo json_encode($res);
		}
	}
function checkData($date,$stationId){
    //echo $date;
    $fuelData = $this->Sodexo_model->getsodexoDataWithDate($date,$stationId);
    return $fuelData;
//echo count($fuelData);
    //print_r($fuelData);

}
    function getSodexoReport(){
        $data=$this->input->get();
        $date=$data['fromdate'];
        //echo $date;
        $stationId=2019000077;        
        $tdata=$this->checkData($date,$stationId);
        if(count($tdata)==0){
             $fuelData = $this->Sodexo_model->getsodexoData($this->input->get());        
          echo json_encode($fuelData);
        }else{
            echo json_encode($tdata);
        } 
       
    }
    function getSodexoReportCron(){  
        $fuelData = $this->Sodexo_model->getsodexoDataCron();  
        echo json_encode($fuelData);  
    }
}