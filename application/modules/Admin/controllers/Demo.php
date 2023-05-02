<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class Demo extends MX_Controller {
	function __construct(){
		parent::__construct();
       // modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	
	public function waterQuality(){
		$this->load->view('water-quality');
	}
	
	
	
	
	
	
}
