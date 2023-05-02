<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class Qrcontroller extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('phpqrcode/qrlib');
		$this->load->helper('url');
	}
	public function index()
	{	
		//$this->load->view('include-template/header.php');
		$this->load->view('qrcodetext.php');
		//$this->load->view('include-template/footer.php');
	}

	
	public function qrcodeGenerator()
		{
				
			$qrtext = $this->input->post('qrcode_text');	
			if(isset($qrtext))
			{
			//$row=["certificate_name"->'krishna',"admission_no"->666,"admission_no"->90];
			$emailId="krisna3175@gmail.com";
			$SERVERFILEPATH = 'asset/admin/qrcodes/';
			$text = "Student Name: ".$row['certificate_name']."\nEmail ID: ".$emailId."\nAdmission No: ".$row['admission_no'];

			$text1= substr($text, 0,9);	
			$folder = $SERVERFILEPATH;
			$file_name1 = "QR" . rand(8,200) . ".png";
			$file_name = $folder.$file_name1;
			echo $filename;
			QRcode::png($text,$file_name);		
			//echo"<center><img src=".'http://localhost/qrcode-generation-in-codeigniter/images/'.$file_name1."></center";
			}
			else
			{
			echo 'No Text Entered';
			}	
		}
	public function get_qr_hardware_data($hardware_id){
		//$hardware_id=$this->input->get('id');
		//echo "$hardware_id"; 
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Client_model');


		$data['hardware']=$this->Hardware_model->get_hardware($hardware_id);
		$hardware_catogory_name=$this->Hardware_category_model->get_category($data['hardware']['hardware_category']);
	    $hardware_device_name=$this->Hardware_category_model->get_device($data['hardware']['hardware_device']);
		$client=$this->Client_model->get_client($data['hardware']['client_id']);
		
		$data['catogory_name']=$hardware_device_name['category_name'];
		$data['device_name']=$hardware_device_name['device_name'];
		$data['client']=$client;
			if($hardware_id==29 || $hardware_id==30){
				$this->load->view('QRScan_details/hardware_details',$data);
			}else if($hardware_id==40 || $hardware_id==39 || $hardware_id==41){
				$this->load->view('QRScan_details/hardware_details_dynamic_s',$data);
			}else if($hardware_id==42 || $hardware_id==43 || $hardware_id==44 || $hardware_id==45){
				$this->load->view('QRScan_details/hardware_details_dynamic_w',$data);
			}else if($hardware_id==48){
				$this->load->view('QRScan_details/hardware_details_dynamic_dg',$data);
			}else{
				$this->load->view('QRScan_details/hardware_details_dynamic',$data);
			}
		
	}
	
	
	
	
	
}
