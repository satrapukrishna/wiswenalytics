<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller
{
	function __construct(){
		parent::__construct();
		//$this->load->model('Havac_model');
		
	}

	
	function scan_eng()
    {
       
		//$this->load->view('TomotherapyView',$data);
		$this->load->view('Scan-Eng');
        
    }
	function washroom($id = ''){
		if($id==1){
			$this->load->view('Scan-Eng');
		}else if($id==2){
			$this->load->view('Scan-Tel');
		}else if($id==3){
			$this->load->view('Scan-Hin');
		}else{
			$this->load->view('Scan-Eng');
		}
		
	}
	function room($id = ''){
		if($id==1){
			$this->load->view('Scan-Eng_room');
		}else if($id==2){
			$this->load->view('Scan-Tel_room');
		}else if($id==3){
			$this->load->view('Scan-Hin_room');
		}else{
			$this->load->view('Scan-Eng_room');
		}
	}
	function submit_issue(){
		// print_r($_POST);die();
		$data['data']=$_POST;
		$this->load->view('ThankYou',$data);
	}
	function submit_issue_room(){
		// print_r($_POST);die();
		$data['data']=$_POST;
		$this->load->view('ThankYou_room',$data);
	}
	function heat_cool(){
		$this->load->view('HeatingCooling');
	}
	function heat_cool_room(){
		$this->load->view('HeatingCooling_room');
	}
	function clean(){
		$this->load->view('Cleanliness');
	}
	function clean_room(){
		$this->load->view('Cleanliness_room');
	}
	function water(){
		$this->load->view('Water');
	}
	function water_room(){
		$this->load->view('Water_room');
	}

	function equipment(){
		$this->load->view('Equipment');
	}
	function equipment_room(){
		$this->load->view('Equipment_room');
	}
	function damages_room(){
		$this->load->view('Damages_room');
	}
	function tissue(){
		$this->load->view('Tissues');
	}
	function soap(){
		$this->load->view('Soap');
	}
	function drinking_room(){
		$this->load->view('DrinkingWater');
	}
	function scan_hin()
    {
       
		//$this->load->view('TomotherapyView',$data);
		$this->load->view('Scan-Hin');
        
    }
	function scan_tel()
    {
       
		//$this->load->view('TomotherapyView',$data);
		$this->load->view('Scan-Tel');
        
    }
	function qr_generate() {
			//QR code links
			$this->load->library('phpqrcode/Qrlib');
			$SERVERFILEPATH = 'asset/hospital/qrcodes/';
			$url = "http://wenalytics.in/Hospital/washroom";
				
			$folder = $SERVERFILEPATH;
			$file_name1 = "washroom.png";
			$file_name = $folder.$file_name1;
			// $ecc stores error correction capability('L')
			$ecc = 'L';
			$pixel_Size = 10;
			$frame_Size = 10;
			
			// Generates QR Code and Stores it in directory given
			QRcode::png($url, $file_name, $ecc, $pixel_Size, $frame_Size);

			
			
		
	
	}
	
}



?>