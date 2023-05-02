<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	public function index()
	{
		
		$this->load->view('dashboard');
	}
	
	
	
}
