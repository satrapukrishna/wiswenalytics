<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class PRKHospital extends CI_Controller
{
	function __construct(){
		//
		parent::__construct();
		$this->load->model('Prk_model');
	}
	
	function prkDashboard()
	{	
		$data['meters'] = $this->Prk_model->getMeterList();
		$this->load->view('Dashboard',$data);
		// $this->load->view('Dashboard');
	}
	function prkDashboardHari()
	{	
		$this->load->view('prkDashboardHariView');
	}
	function getEnergyMeterData(){
		$prkEnergyData=$this->Prk_model->getPrkEnergyData($this->input->get());
	}
	function getFuelGraph(){
		$data['meters'] = $this->Prk_model->getMeterList();
		$this->load->view('Fuel-Graph-Report',$data);
	}
	function getRunningHours(){
		$data['meters'] = $this->Prk_model->getMeterList();
		$this->load->view('Running-Hours-Report',$data);
	}
	function getWaterFlow(){
		$this->load->view('WaterFlow-Report');
	}
	function getFirePump(){
		$this->load->view('WaterFlow-Report');
	}
	function getConsumptionGraph(){
		$this->load->view('Consumption-Graph-Report');
	}
	function getConsumption(){
		$data['meters'] = $this->Prk_model->getEnergyList();
		$this->load->view('Consumption-Report',$data);
	}
	function getEnergyMeterReport(){
		$fuelData = $this->Prk_model->getConsumptionData($this->input->get());
		
		 echo json_encode($fuelData);
	}
}