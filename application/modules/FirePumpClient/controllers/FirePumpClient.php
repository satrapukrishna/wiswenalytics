<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class FirePumpClient extends CI_Controller
{
	function __construct(){
		//
		parent::__construct();
		$this->load->model('Fire_model');
	}
	
	function FirepumpReqNewDashboard()
	{	
		// $data['meters'] = $this->Prk_model->getMeterList();
		$this->load->view('Dashboard');
		// $this->load->view('Dashboard');
	}
	function prkDashboardHari()
	{	
		$this->load->view('prkDashboardHariView');
	}
	function chillerRunReport(){
    	$this->load->view('ChillerRunningReport');
    }
    function chillerGraphReport(){
    	$this->load->view('chillerGraphReport');
    }
    function coolingRunReport(){
    	$this->load->view('coolingRunningReport');
    }
    function coolingGraphReport(){
    	$this->load->view('coolingGraphReport');
    }
    function firepumpRunReport(){
    	$this->load->view('firepumpRunReport');
    }
    function firepumpGraphReport(){
    	$this->load->view('firepumpGraphReport');
    }
	
	function getChillerData(){
		$data=$this->Fire_model->getChillerData();

		echo json_encode($data);

	}
	function getCoolingData(){
		$data=$this->Fire_model->getCoolingData();
		
		echo json_encode($data);

	}
	function dashBoardData(){
		$fireList=$this->Fire_model->getFireListData();
		
        $fireData=$this->Fire_model->getDashBoardData($fireList);
        echo json_encode($fireData);
    }
    function chillerReport(){
    	$data=$this->Fire_model->getChillerReportData($this->input->get());
    	echo json_encode($data);
    }
    function coolingTowerReport(){
    	$data=$this->Fire_model->getCoolingTowerReportData($this->input->get());
    	echo json_encode($data);
    }
    
    function firepumpGraphData(){
    	$data=$this->Fire_model->getFirepumpGraphData($this->input->get());
    	echo json_encode($data);
    }
    function firePumpRunningReport(){
    	$data=$this->Fire_model->firePumpRunnDataAll($this->input->get());
    	echo json_encode($data);
    }

}