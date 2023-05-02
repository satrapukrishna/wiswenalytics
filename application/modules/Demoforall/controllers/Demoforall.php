<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class Demoforall extends CI_Controller
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
	function getWaterLevelGraphReport(){
        $waterList=$this->Demo_model->getWaterListData($this->input->get());
        echo json_encode($waterList);
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
    function waterLevelGraphReprot(){
        $this->load->view('WaterLevelGraphReport');
    }
    function waterGraphReport(){
        $this->load->view('WaterGraphReport');
    }
    function energyGraphReport(){
        $this->load->view('EnergyMeterGraphReport');
    }
    function energyConsumptionReport(){
        $this->load->view('EnergyConsumptionReport');
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
    function firepumpGraphReport(){
        $this->load->view('firepumpGraphReport');
    }
    function firepumpRunReport(){
        $this->load->view('firepumpRunReport');
    }
    
    function getFuelGraph(){
        $data['meters'] = $this->Demo_model->getMeterListdg();
        $this->load->view('DgFuelGraphReport',$data);
    }
	function firepumpGraphData(){
        $data=$this->Demo_model->getFirepumpGraphData($this->input->get());
        echo json_encode($data);
    }
    function getDayPressure(){
        $data=$this->Demo_model->getPressureDay($this->input->get());
        echo json_encode($data);
    }
    function firePumpRunningReport(){
        $data=$this->Demo_model->firePumpRunnDataAll($this->input->get());
        echo json_encode($data);
    }
}