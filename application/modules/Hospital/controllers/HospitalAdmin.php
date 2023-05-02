<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HospitalAdmin extends CI_Controller
{
	function __construct(){
		parent::__construct();
		//$this->load->model('Havac_model');
		
	}

	
	function login()
    {
       
		//$this->load->view('TomotherapyView',$data);
		$this->load->view('web/Login');
        
    }
	function dashboard(){
		$this->load->view('web/Dashboard');
	}
	function complaintList(){
		$this->load->view('web/ComplaintsNList');
	}
	function complaintList1(){
		$this->load->view('web/ComplaintsNList1');
	}
	function complaintList2(){
		$this->load->view('web/ComplaintsNList2');
	}
	function complaintDashboard(){
		$this->load->view('web/ComplaintsNDashboard');
	}
	function complaintAttendence(){
		$this->load->view('web/ComplaintsNAttendance');
	}
	function complaintReports(){
		$this->load->view('web/ComplaintsNReport');
	}
	function complaintCReports(){
		$this->load->view('web/ComplaintsNCReport');
	}
	function complaintEReports(){
		$this->load->view('web/ComplaintsNEReport');
	}
	function complaintDetReports(){
		$this->load->view('web/ComplaintAttendenceDeptDetail');
	}
	
	
}



?>