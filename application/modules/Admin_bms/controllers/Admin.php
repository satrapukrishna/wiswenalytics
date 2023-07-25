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
	}
	function super_admin(){
		$this->load->view('login1');
	}
    function rainbow_login(){
		$this->load->view('Rainbow-Login');
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
				// echo "<pre>";print_r($this->session->userdata());exit;
                $go_to = 'Admin/Home/client_dashboard';
                // $go_to = 'Admin/Test';
                redirect($go_to);
            } else {
                $data['info_msg'] = 'Please Login below';
                $data['go_to_url'] = '';
                $this->load->view('login', $data);
            }
        }
    }
	
	function login_user1(){
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('uname', 'uname', 'trim|required');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required|min_length[5]');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('login1');
        } else {
            $pid = $this->input->post('uname');
            $credentials = array('username' => $pid, 'password' => md5($this->input->post('pwd')));
            // $go_to = $this->input->post('go_to_url');
            // $data['go_to_url'] = $go_to;
            log_message('INFO', 'Login starts for ' . $pid . ' fn:' . __function__ . ' lc:' . __file__);
            $this->load->model('Login_model');
            $res = $this->Login_model->validate_user1($credentials);			
            log_message('INFO', 'Login status ' . $pid . ' ' . $res['status']);
        //    print_r($res);die();
            if($res['status'] == 'failure') {
                $data['errmsg'] = 'Invalid Login id or Password.';
                $this->load->view('login1', $data);
            } elseif ($res['status'] == 'blocked') {
                $data['errmsg'] = 'Your Account was Blocked.';
                $this->load->view('login1', $data);
            } elseif ($res['status'] == 'success' && $this->session->userdata('user_id') != '') {    
				// echo "<pre>";print_r($this->session->userdata());exit;
                $go_to = 'Admin/Home/client_dashboard';
                // if($this->session->userdata('user_id')==1){
                //     $go_to = 'Admin/Home/client_dashboard';
                // }else{
                //     $go_to = 'Admin_qr/Home/client_dashboard';
                // }
                
                // $go_to = 'Admin/Test';
                redirect($go_to);
            } else {	
                $data['info_msg'] = 'Please Login below';
                $data['go_to_url'] = '';
                $this->load->view('login1', $data);
            }
        }
    }
    
	function rainbow_emp_login_user(){
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
           // echo $pid;die();
            //$credentials = array('email_id' => $pid, 'password' => md5($this->input->post('pwd')));
            
          $credentials = array('username' => $pid, 'password' => md5($this->input->post('pwd')));
            // $go_to = $this->input->post('go_to_url');
            // $data['go_to_url'] = $go_to;
            log_message('INFO', 'Login starts for ' . $pid . ' fn:' . __function__ . ' lc:' . __file__);
            $this->load->model('Login_model');
            $res = $this->Login_model->employee_validate_user($credentials);
            log_message('INFO', 'Login status ' . $pid . ' ' . $res['status']);
            if($res['status'] == 'failure') {
                $data['errmsg'] = 'Invalid Login id or Password.';
                $this->load->view('Rainbow-Login', $data);
            } elseif ($res['status'] == 'blocked') {
                $data['errmsg'] = 'Your Account was Blocked.';
                $this->load->view('Rainbow-Login', $data);
            } elseif ($res['status'] == 'success' && $this->session->userdata('user_id') != '') {   
				// echo "<pre>";print_r($this->session->userdata());exit;   
                
                    $go_to = 'Admin/Home/rainbow_dashboard';
                   redirect($go_to);
                
            } else {
                $data['info_msg'] = 'Please Login below';
                $data['go_to_url'] = '';
                $this->load->view('Rainbow-Login', $data);
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
           // echo $pid;die();
            //$credentials = array('email_id' => $pid, 'password' => md5($this->input->post('pwd')));
            
          $credentials = array('username' => $pid, 'password' => md5($this->input->post('pwd')));
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
                if($this->session->userdata('user_id')==28) {
                    $go_to = 'Admin/Home/essential';
                     redirect($go_to);

                }
                if($this->session->userdata('user_id')==15) {
                    $go_to = 'Admin/Home/aircondition_apollo';
                     redirect($go_to);

                }if($this->session->userdata('user_id')==3) {
                    $go_to = 'Admin_feb21/Home/water';
                     redirect($go_to);

                }if($this->session->userdata('user_id')==19) {
                    $go_to = 'Admin_demo/Home/water';
                    //$go_to = 'Admin_feb21/Home/water';
                     redirect($go_to);

                }if($this->session->userdata('user_id')==44) {
                    $go_to = 'Admin/Home/energy_rsbrother';
                    //$go_to = 'Admin_feb21/Home/water';
                     redirect($go_to);

                }if($this->session->userdata('created_by')==34) {
                    $go_to = 'Admin/Home/switchcontrol';
                    //$go_to = 'Admin_feb21/Home/water';
                     redirect($go_to);

                }if($this->session->userdata('created_by')==35) {
                    $go_to = 'Admin/Home/energy_vegasschool';
                    //$go_to = 'Admin_feb21/Home/water';
                     redirect($go_to);

                }else{
                    $go_to = 'Admin/Home/water';
                   redirect($go_to);
                }
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
		if($this->session->userdata('role')=='admins'){
		
			redirect('Admin');
		
		}elseif($this->session->userdata('role')=='superadmin'){
			redirect('SuperAdmin');
	
		}else{
			redirect('Admin');
		}
			
		
    }
    function logout_rainbow() {
        $array_items = array('is_logged_in' => '','user_id' => '','password' => '','logintype' => '','user_name' => '','StationCode' => '','permissions' => '','client_name' => '','__ci_last_regenerate' => '', 'role' => '');
         $this->session->unset_userdata($array_items);
          $this->session->sess_destroy();
         if($this->session->userdata('role')=='admins'){
         
             redirect('Admin/rainbow_login');
         
         }elseif($this->session->userdata('role')=='superadmin'){
             redirect('SuperAdmin');
     
         }else{
             redirect('Admin/rainbow_login');
         }
             
         
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
           // $this->load->view('login', $data);
           redirect('Admin');
            exit();
        }
    }

	function auth($permission){
		
        $permissions = $this->db->get_where('employees',array('emp_id' => $this->session->userdata('user_id')))->row_array();
        if(in_array($permission,explode(',',$permissions['permissions']))){
           echo 1;
        }else{
            redirect('Admin/Home');
        }
    }
    
	
	
}
?>
