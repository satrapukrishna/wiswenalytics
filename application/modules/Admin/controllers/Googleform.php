<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googleform extends MX_Controller {
	function __construct(){
		parent::__construct();
       // modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	
	
	function getQrcode() {
        

			//QR code links
			$this->load->library('phpqrcode/Qrlib');
			$SERVERFILEPATH = 'asset/admin/hardware_qrcodes/';
			$url = "https://forms.gle/x1PECqdXAxu9nLCv6";
				
			$folder = $SERVERFILEPATH;
			$file_name1 = "site_assessment_qrcode.png";
			$file_name = $folder.$file_name1;
			// $ecc stores error correction capability('L')
			$ecc = 'L';
			$pixel_Size = 10;
			$frame_Size = 10;
			
			// Generates QR Code and Stores it in directory given
			QRcode::png($url, $file_name, $ecc, $pixel_Size, $frame_size);

			//QRcode device link
			//$destination = 'asset/admin/hardware_device_qrcodes/';
			//$file2 = "site_assessment_qrcode.png";
			// $dev_name = $destination.$file2;
			// $txt="Device ID:".$this->session->userdata('user_id').$this->input->post('hardware_device').$hardware_id;
			// QRcode::png($txt, $dev_name, $ecc, $pixel_Size, $frame_size);


			// $site_data= array(
			// 'unique_sr_no' => $qr_code,
			// 'qr_code' => $qr_code,
			// 'qrcode_img_path'=>$file_name,
			// 'qrcode_device_path'=>$dev_name
			// );			
			
		
	
	}
	
	function view_qrcode() {
        
		$this->load->view('hardware/qrcode_list');
	}
	
	
	

	
}
?>
