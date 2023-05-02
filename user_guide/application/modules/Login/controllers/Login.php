<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function autenticate(){
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('pwd');
		$result = $this->Login_model->validate_user($uname,$pwd);
		// echo $uname." ".$pwd;die();
		// print_r($result );die();
		if($result)
		{
			$this->setSession($result);
			if($result['user']->first_name == "My Vihanga"){
			redirect('MyVihanga');
			} else if($result['user']->first_name == "Apollo"){
			redirect('FuelReport/bolierDashboard');
			} else{
			redirect(base_url('Login'));
			}
		}
		else{
			redirect(base_url('Login'));
		}	
	}
	private function setSession($result){
		$this->session->set_userdata( array(
		'ProfileName' => $result['user']->first_name." ".$result['user']->last_name,
		'ClientName' => $result['branch'][0]->client_name,
		'Table' => $result['branch'][0]->station_id,
		'DB' => $result['branch'][0]->client_database_name,
		'UserId' => $result['user']->user_id,
		'BrancheId' => $result['branch'][0]->branch_id,
		'BrancheName' => $result['branch'][0]->branch_name,
		'StationCode' => $result['branch'][0]->station_code,
		'login' => true
		));
	}
	private function unsetSession(){
		$sessionArrKeys = array('ProfileName','ClientName','Table','DB','UserId','BrancheId','BrancheName','login');
		$this->session->unset_userdata($sessionArrKeys);
	}
	public function logout(){
		$this->unsetSession();
		redirect(base_url('Login'));
	}
	
}
