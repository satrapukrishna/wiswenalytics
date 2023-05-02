<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		$this->load->model('Client_model');
	}
	public function index()	
	{
		// echo "<pre>";print_r($this->session->userdata());exit;
		$data['client'] = $this->Client_model->get_client($this->session->userdata('user_id'));
		$this->db->select('');
		$this->db->where('user_type', 4);
		$this->db->from('permissions');
		$data['permissions'] = $this->db->get();
		$this->load->view('clients/client_permission', $data);
	}
	
	
	
}
