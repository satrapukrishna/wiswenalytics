
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyVihanga extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Myhome_model');
	}
	public function index()
	{
	 	//$data['myhomeData']=$this->Myhome_model->getMyhomeReport();
		$this->load->view('domesticTankView');
	}
	public function getMyhomeData(){
		$myhomeData=$this->Myhome_model->getMyhomeReport($this->input->get());
    	$result=array();
    	if(count($myhomeData)>0){
    		echo json_encode($myhomeData);
    	}


	}

	public function domestic()
	{
		$this->load->view('domesticTankView');
	}

	public function flush()
	{
		$this->load->view('flushTankView');
	}

	public function collection()
	{
		$this->load->view('collectionTankView');
	}
	public function all()
	{
		$this->load->view('allTankView');
	}

	public function newDashboard()
	{
		$this->load->view('newDashboard');
	}

	public function circularDashboard()
	{
		$this->load->view('circularDashboard');
	}
}