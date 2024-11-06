<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_shift extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	public function index()
	
	{
        $this->load->view('holiday_shift/holiday_form');
	}
	
	
	function create_holiday() {
        //modules::run('admin/site/auth','employee_modify');
        $this->load->view('holiday_shift/holiday_form');
	
	}
    function create_shifts() {
        //modules::run('admin/site/auth','employee_modify');
        $this->load->view('holiday_shift/shift_form');
	
	}
	
	
	
	
}
