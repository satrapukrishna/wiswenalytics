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

	
	public function qrcodeGenerator ( )
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
	
	
	
	
	
	
}
