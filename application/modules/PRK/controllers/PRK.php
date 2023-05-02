<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class PRK extends CI_Controller
{
	function __construct(){
		//
		parent::__construct();
		$this->load->model('Demo_model');
	}
	
	function demoDashboard()
	{	
		$data['meters'] = $this->Demo_model->getMeterList();
		//$this->load->view('energy',$data);
		$this->load->view('Dashboard',$data);
		// $this->load->view('Dashboard');
	}
	
	function dashBoardData(){
		$fireList=$this->Demo_model->getFireListData();
		
        $fireData=$this->Demo_model->getDashBoardData($fireList);
        echo json_encode($fireData);
    }
    function getLivePressure(){
        $data=$this->Demo_model->getPressureToday();
        echo json_encode($data);
    }
    function waterReprot(){
    	$this->load->view('Consumption-Report');
    }
    function waterInReprot(){
    	$this->load->view('waterInReport');
    }
    function chillerRunnHrsReport(){
        $this->load->view('ChillerRunningReport');
    }
    function chillerGraphReport(){
        $this->load->view('chillerGraphReport');
    }
    function coolingRunnHrsReport(){
        $this->load->view('coolingRunningReport');
    }
    function coolingtwrGraphReport(){
        $this->load->view('coolingGraphReport');
    }
	
}