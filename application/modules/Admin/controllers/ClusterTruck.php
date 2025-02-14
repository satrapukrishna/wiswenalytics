<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);
ini_set('memory_limit', '-1');
class ClusterTruck extends MX_Controller {
	function __construct(){
		parent::__construct();
        // modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	public function index()
	{
		echo "sdasdasdsa";
	}
	
	function clusterTruckReport(){
		$this->load->model('Api_data_model_clustertruck');
		// $temp=$this->Api_data_model->getTempDataClusterTruck($this->input->post('fromdate'),$this->input->post('todate'));
		// $data['tempdata']=$temp;
		$opn=$this->Api_data_model->getTempDataClusterTruck1($this->input->post('fromdate'),$this->input->post('todate'));
		$data['tempdata']=$opn;
		// echo json_encode($data['tempdata']);die();
		$this->load->view('all_reports_clusterTruck',$data);
	}
}
?>