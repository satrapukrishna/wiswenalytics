<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		// $this->load->view('login');
		$this->load->view('Admin/login');
	}
	public function ambiencelogin()
	{
		$this->load->view('ambienceloginview');
	}
	public function capitallogin()
	{
		$this->load->view('capitalloginview');
	}
	public function demologin()
	{
		$this->load->view('demologinview');
	}
	public function apollo()
	{
		$this->load->view('apollo');

	}
	public function demo_ahu()
	{
		$this->load->view('apollo');
		
	}
	public function wshrmmntrlogin()
	{
		$this->load->view('wshrmntrloginView');
	}
	public function wrllogin()
	{
		$this->load->view('wrlloginView');
	}

	public function wdemologin()
	{
		$this->load->view('demologin');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function demo(){
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('pwd');
		$rsarray=array();
		$result = $this->Login_model->validate_user($uname,$pwd);
		if($result)
		{
			$rsarray["message"]="success";
			echo json_encode($rsarray);
		}else{
			$rsarray["message"]="failure";
			echo json_encode($rsarray);
		}

	}
	public function autenticate()
	{
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('pwd');
		$result = $this->Login_model->validate_user($uname,$pwd);
		//echo $uname." ".$pwd;
		// print_r($result);die();
		if($result)
		{		
			$this->setSession($result);
			if($result['user']->first_name == "My Vihanga")
			{
				redirect('MyVihanga');
			} 
			// else if($result['user']->first_name == "Demo" )
			// {
			// 	redirect('FuelReport/bolierDashboard');
			// } 
			else if($result['user']->first_name == "Apollo" )
			{
				redirect('AHU/tomotherapy');
				//redirect('FuelReport/bolierDashboard');
			}
			else if($result['user']->first_name == "Koramangala" )
			{
				redirect('AHU_demo/tomotherapy');
				//redirect('FuelReport/bolierDashboard');
			} 
			else if($result['user']->first_name == "Sodexo")
			{
				redirect('Sodexo/sodexoDashboard');
			}
			else if($result['user']->first_name == "DemoClient")
			{
				redirect('Democlient/frmntdshbrd');
			}
			else if($result['user']->first_name == "Ambience")
			{
				redirect('Ambience/ambiencedata');
			}
			else if($result['user']->first_name == "demo02")
			{
				redirect('Demoforall/demoDashboard');
			}
			else if($result['user']->first_name == "Capital")
			{
				redirect('CapitalCyberscapes/HVACDashboard');
			}
			else if($result['user']->first_name == "WashRoom1")
			{
				redirect('MonitoringDemo/wshrmntrdata');
			}
			else if($result['user']->first_name == "WashRoom")
			{
				redirect('Demo2/demoData');
			}
			else if($result['user']->user_id == 20)
			{
				redirect('WashroomData/demoData');
				// redirect('WRLData/demoData');
			}
			else if($result['user']->user_id == 19)
			{
				redirect('WashroomDemoData/demoData');
				// redirect('WRLData/demoData');
			}
			else if($result['user']->user_id == 21)
			{
				redirect('WRLJPNagar/demoData');
			}
			else if($result['user']->first_name == "WDemoClient")
			{
				//redirect(base_url('Login/wdemologin'));
				redirect('WashroomDemoData/demoData');
			}
			else if($result['user']->first_name == "test")
			{
				//redirect(base_url('Login/wdemologin'));
				redirect('WashroomDemo2Data/demoData');
			}

			else
			{
				//redirect(base_url('Login'));
				redirect(base_url('Login/wdemologin'));
			}
		}
		else{
			redirect(base_url('Login/wdemologin'));
			//redirect(base_url('Login'));
		}	
	}
	public function autenticatewashrm()
	{
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('pwd');
		$result = $this->Login_model->validate_user($uname,$pwd);
		//echo $uname." ".$pwd;
		//print_r($result);die();
		if($result)
		{		
			$this->setSession($result);
			 if($result['user']->first_name == "WDemoClient")
			{
				redirect('Demo2/demoData');
			}

			else
			{
				redirect(base_url('Login/wdemologin'));
			}
		}
		else{
			redirect(base_url('Login/wdemologin'));
		}	
	}
	private function setSession($result){
		// print_r($result);die();
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
		redirect(base_url('Login/wdemologin'));
		//redirect(base_url('Login'));
	}
	public function dltlogout(){
		$this->unsetSession();
		redirect(base_url('Login/ambiencelogin'));
	}
	public function dltlogout1(){
		$this->unsetSession();
		redirect(base_url('Login/wdemologin'));
		//redirect(base_url('Login'));
	}
	public function demologout(){
		$this->unsetSession();
		redirect(base_url('Login/demologin'));
	}
	public function apollologout(){
		$this->unsetSession();
		redirect(base_url('Login/apollo'));
	}
	public function capitallogout(){
		$this->unsetSession();
		redirect(base_url('Login/capitallogin'));
	}
	public function wshrmmntrlogout(){
		$this->unsetSession();
		redirect(base_url('Login/wshrmmntrlogin'));
	}
	function prklogin(){
		$this->load->view('Login/prkLogin');
	}

function wdemologout(){
		$this->load->view('Login/demologin');
	}
	
}
