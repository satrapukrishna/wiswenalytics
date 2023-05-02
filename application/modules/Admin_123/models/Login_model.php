<?php
class Login_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function validate_user($credentials)
    {
	$result_ary = array();
        $conditions = array('email_id' => $credentials["email_id"], 'password' => $credentials["password"]);
        $this->db->select('');
        $this->db->from('clients');
        $this->db->where($conditions);
        $this->db->limit(1);
        $login = $this->db->get();
        $row = $login->row_array();
		
        if ($login->num_rows() > 0) {
            if ($row['status'] == 1) {
                $result_ary['status'] = 'success';
                $result_ary['msg'] = 'Logged in successfully';
                $loggedin_user = array(
                    'is_logged_in' => true,
                    'user_id' => $row['client_id'],
                    'logintype' => 1,
                    'permissions' => $row['permissions'],
					'email_id' => $row['email_id'],
                    'client_name' => $row['client_name'],
                    'role' => 'admins'
                );
                $this->session->set_userdata($loggedin_user);
                log_message('INFO', 'User session created for ' . $row['client_id']);
                log_message("INFO", 'LOGIN user_id - ' . $row['client_id'] . ' ano from ' . $this->input->ip_address());
            } elseif ($row['status'] == 0) {
                $result_ary['status'] = 'blocked';
                $result_ary['msg'] = 'Profile is Blocked';
            } elseif ($row['status'] == 2) {
                $result_ary['status'] = 'blocked';
                $result_ary['msg'] = 'Profile is Deleted';
            } else {
                $result_ary['status'] = 'failure';
                $result_ary['msg'] = 'Login failed. Please try again later';
            }
        } else {
            $result_ary['status'] = 'failure';
            $result_ary['msg'] = 'Invalid email or password';
        }
        return $result_ary;
    }
	
	function employee_validate_user($credentials)
    {
	$result_ary = array();
        $conditions = array('email_id' => $credentials["email_id"], 'password' => $credentials["password"]);
        $this->db->select('');
        $this->db->from('employees');
        $this->db->where($conditions);
        $this->db->limit(1);
        $login = $this->db->get();
        $row = $login->row_array();
		
        if ($login->num_rows() > 0) {
            if ($row['status'] == 1) {
                $result_ary['status'] = 'success';
                $result_ary['msg'] = 'Logged in successfully';
                $loggedin_user = array(
                    'is_logged_in' => true,
                    'user_id' => $row['emp_id'],
                    'logintype' => 1,
                    'permissions' => $row['permissions'],
                    'email_id' => $row['email_id'],
                    'employee_name' => $row['firstname'].' '.$row['lastname'],
                    'role' => 'employee'
                );
                $this->session->set_userdata($loggedin_user);
                // log_message('INFO', 'User session created for ' . $row['client_id']);
                // log_message("INFO", 'LOGIN user_id - ' . $row['client_id'] . ' ano from ' . $this->input->ip_address());
            } elseif ($row['status'] == 0) {
                $result_ary['status'] = 'blocked';
                $result_ary['msg'] = 'Profile is Blocked';
            } elseif ($row['status'] == 2) {
                $result_ary['status'] = 'blocked';
                $result_ary['msg'] = 'Profile is Deleted';
            } else {
                $result_ary['status'] = 'failure';
                $result_ary['msg'] = 'Login failed. Please try again later';
            }
        } else {
            $result_ary['status'] = 'failure';
            $result_ary['msg'] = 'Invalid email or password';
        }
        return $result_ary;
    }
}