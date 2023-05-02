<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	function __construct(){
		parent::__construct();
        //modules::run('admin/is_logged_in',__CLASS__);
		$this->load->model('Login_model');
	}
	public function index()
	{
        $this->load->view('login');
		// if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('user_id') != '' && $this->session->userdata('role') == 'admins') {
		// 	$go_to = 'admin/home';
  //           redirect($go_to);
  //       }else{
		// $this->load->view('login');
		// }
	}
	function login_user(){
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('uname', 'uname', 'trim|required');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required|min_length[5]');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $pid = $this->input->post('uname');
            $credentials = array('email_id' => $pid, 'password' => md5($this->input->post('pwd')));
            // $go_to = $this->input->post('go_to_url');
            // $data['go_to_url'] = $go_to;
            log_message('INFO', 'Login starts for ' . $pid . ' fn:' . __function__ . ' lc:' . __file__);
            $this->load->model('Login_model');
            $res = $this->Login_model->validate_user($credentials);
            log_message('INFO', 'Login status ' . $pid . ' ' . $res['status']);
           // print_r($res);die();
            if($res['status'] == 'failure') {
                $data['errmsg'] = 'Invalid Login id or Password.';
                $this->load->view('login', $data);
            } elseif ($res['status'] == 'blocked') {
                $data['errmsg'] = 'Your Account was Blocked.';
                $this->load->view('login', $data);
            } elseif ($res['status'] == 'success' && $this->session->userdata('user_id') != '') {                
                $go_to = 'Admin/Home';
                redirect($go_to);
            } else {
                $data['info_msg'] = 'Please Login below';
                $data['go_to_url'] = '';
                $this->load->view('login', $data);
            }
        }
    }
	
	function employee_login_user(){
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('uname', 'uname', 'trim|required');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required|min_length[5]');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $pid = $this->input->post('uname');
            $credentials = array('email_id' => $pid, 'password' => md5($this->input->post('pwd')));
            // $go_to = $this->input->post('go_to_url');
            // $data['go_to_url'] = $go_to;
            log_message('INFO', 'Login starts for ' . $pid . ' fn:' . __function__ . ' lc:' . __file__);
            $this->load->model('Login_model');
            $res = $this->Login_model->employee_validate_user($credentials);
            log_message('INFO', 'Login status ' . $pid . ' ' . $res['status']);
            if($res['status'] == 'failure') {
                $data['errmsg'] = 'Invalid Login id or Password.';
                $this->load->view('login', $data);
            } elseif ($res['status'] == 'blocked') {
                $data['errmsg'] = 'Your Account was Blocked.';
                $this->load->view('login', $data);
            } elseif ($res['status'] == 'success' && $this->session->userdata('user_id') != '') {   
				// echo "<pre>";print_r($this->session->userdata());exit;   
                $go_to = 'Admin/Home';
                redirect($go_to);
            } else {
                $data['info_msg'] = 'Please Login below';
                $data['go_to_url'] = '';
                $this->load->view('login', $data);
            }
        }
    }
	/*public function autenticate(){
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('pwd');
		$result = $this->admin_model->validate_user($uname,$pwd);
		// print_r($result );die();
		if($result){
			//echo "<pre>";print_r($result);exit;
			$this->setSession($result);
			/*if($result['user']->first_name == "test"){
				redirect('SpInfocityClient/FirepumpReqNewDashboard');
			} else{
				redirect(base_url('SpInfocityLogin'));
			}
			redirect('SpInfocityClient/FirepumpReqNewDashboard');
		}else{
			redirect(base_url('Admin'));
		}	
	}
	private function setSession($result){
		//print_r($result);die();
		$this->session->set_userdata( array(
		'client_name' => $result['client_name'],
		'user_name' => $result['email_id'],
		'password' => $result['password'],
		'role' => $result['role'],
		'login' => true
		));
	}*/
	function logout() {
       $array_items = array('is_logged_in' => '','user_id' => '','password' => '','logintype' => '','user_name' => '','StationCode' => '','permissions' => '','client_name' => '','__ci_last_regenerate' => '', 'role' => '');
        $this->session->unset_userdata($array_items);
		 $this->session->sess_destroy();
        redirect('Admin');
		
    }   
	private function unsetSession(){
		$sessionArrKeys = array('ProfileName','ClientName','Table','DB','UserId','BrancheId','BrancheName','login');
		$this->session->unset_userdata($sessionArrKeys);
	}
	function is_logged_in() {
        if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('user_id') != '' && $this->session->userdata('role') == 'admins') {
            return true;
        } elseif ($this->session->userdata('is_logged_in') == true && $this->session->userdata('user_id') != '' && $this->session->userdata('role') != 'admins') {
            return true;
        } else {
            $this->load->helper('form');
            $array_items = array('is_logged_in' => '', 'user_id' => '');
            $this->session->unset_userdata($array_items);
            $data['info_msg'] = 'Please Login below';
            $data['go_to_url'] = uri_string();
            //$this->load->view('admin/login', $data);
            exit();
        }
    }                    
    
	
	
}
?>
