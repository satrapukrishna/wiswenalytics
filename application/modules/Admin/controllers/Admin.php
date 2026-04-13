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
    function test(){
		$this->load->view('test');
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

                $user_id = $this->session->userdata('user_id');
                $created_by = $this->session->userdata('created_by');

                switch ($user_id) {
                    case 28:
                        redirect('Admin/Home/essential');
                        break;

                    case 15:
                        redirect('Admin/Home/aircondition_apollo');
                        break;

                    case 3:
                        redirect('Admin_feb21/Home/water');
                        break;

                    case 19:
                        redirect('Admin_demo/Home/water');
                        break;

                    case 44:
                        redirect('Admin/Home/energy_rsbrother');
                        break;

                    case 43:
                        redirect('Admin/Home/energy_undp_single');
                        break;

                    default:
                        // If no user_id match, check created_by
                        switch ($created_by) {

                            case 34:
                                redirect('Admin/Home/switchcontrol');
                                break;

                            case 35:
                                redirect('Admin/Home/energy_vegasschool');
                                break;

                            case 38:
                                redirect('Admin/Home/energy_undp');
                                break;

                            case 30:
                                redirect('Admin/Home/energy');
                                break;

                            case 39:
                                redirect('Admin/Home/switchcontrol');
                                break;

                            case 37:
                                redirect('Admin/HomeNew/energy');
                                break;

                            case 41:
                                redirect('Admin/Home/airquality');
                                break;

                            case 43:
                                redirect('Admin/Home/energy_terotam');
                                break;

                            case 42:
                                redirect('Admin/Home/energy_unicef');
                                break;

                            default:
                                redirect('Admin/Home/water');
                                break;
                        }
                        break;
                }
                
            } else {
                $data['info_msg'] = 'Please Login below';
                $data['go_to_url'] = '';
                $this->load->view('login', $data);
            }
        }
    }
	
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
