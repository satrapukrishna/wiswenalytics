<?php
class FuelReport extends CI_Controller
{
	function __construct(){
        parent::__construct();
        $this->load->model('FuelLevelModel');
    }
	function fuelLoadReport()
	{
		$meters = $this->FuelLevelModel->getFuelMetersList();
        $data['meters'] = $meters;
		$this->load->view('fuelLoadView',$data);
	}

	function fuelConsumptionReport()
	{
		$this->load->view('fuelConsumptionView');
	}
}





?>