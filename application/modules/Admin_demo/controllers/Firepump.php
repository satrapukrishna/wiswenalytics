<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Firepump extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	/*
	public function index()	
	{
		$limit1 = 25;
        $start1 = $this->uri->segment(4);
        $this->load->model('Firepump_model');        
        $web_options1 = array(
            'start' => $start1,
            'limit' => $limit1,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'status' => $this->input->get('status'),
            'category' => 'static'
        );
        $data_firepump = $this->Firepump_model->get_firepumps($web_options1);
        $data['firepumps'] = $data_firepump->result();
		
		// echo "<pre>"; print_r($data['hardwares']);exit;
        $data['starting'] = $start1;
        $data['limit'] = $limit1;
        $config1['total_rows'] = $data_firepump->ttl_rows;
        $config1['uri_segment'] = 4;
        $config1['per_page'] = $limit1;
        $config1['base_url'] = base_url('Admin/Firepump/index');
		$config1['full_tag_open'] = "<ul class='pagination'>";
		$config1['full_tag_close'] ="</ul>";
		$config1['num_tag_open'] = '<li>';
		$config1['num_tag_close'] = '</li>';
		$config1['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config1['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config1['next_tag_open'] = "<li>";
		$config1['next_tagl_close'] = "</li>";
		$config1['prev_tag_open'] = "<li>";
		$config1['prev_tagl_close'] = "</li>";
		$config1['first_tag_open'] = "<li>";
		$config1['first_tagl_close'] = "</li>";
		$config1['last_tag_open'] = "<li>";
		$config1['last_tagl_close'] = "</li>";
        $this->load->library('pagination');
        $this->pagination->initialize($config1);
        $data['pagination'] = $this->pagination->create_links();
        $data['suffix'] = '?' . http_build_query($_GET, '', "&");
		$this->load->view('firepump/firepump_list', $data);
	}*/
	
	function index(){
		$this->load->model('Firepump_model');
		$data['device']=$this->Firepump_model->get_firepump_device();
		foreach($data['device']->result() as $rec){
			$web_options1 = array(
            'start' => "",
            'limit' => "",
            'order' => "",
            'sort' => "",
            'search_keyword' => "",
            'status' => "",
            'hardware_device' => $rec->hardware_device
			);
			$firepump[$rec->hardware_device]=$this->Firepump_model->get_firepumps($web_options1);
		}
		$data['firepumps']=$firepump;
		echo "<pre>";print_r($data);die();
		
		$this->load->view('firepump/firepump_list', $data);
	}
	
	function create_firepump() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hardware_category_model');
        $this->load->model('Firepump_model');
        $this->load->model('Upload_model');
        $this->load->model('Client_model');
		$station_id=$this->Client_model->get_station_id($this->session->userdata('user_id'));
		
		$data['pump'] = array(0=>'Select Type','Pumps'=>'Pumps','Diesel Pump'=>'Diesel Pump','Water Level Sensors'=>'Water Level Sensors','Pressure Sensor'=>'Pressure Sensor');
		$data['device'] = array('' => 'Select Firepump') + $this->Hardware_category_model->get_hardware_device_dropdown(5);
			// echo "<pre>";print_r($data['device']);exit;
		// $data['template'] = $this->Hardware_template_model->get_hardware_template($category_id,$device_id);
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pump', 'Element Type', 'trim|required');
        $this->form_validation->set_rules('hardware_device', 'Firepump Name', 'trim|required');
        // $this->form_validation->set_rules('dashboard_name', 'Dashboard Name', 'trim|required');
        // $this->form_validation->set_rules('api_name', 'API Name', 'trim|required');
        // $this->form_validation->set_rules('factory_sr_no', 'Factory Serial No.', 'trim|required');
        // $this->form_validation->set_rules('UtilityName', 'Utility Name', 'trim|required');
        // $this->form_validation->set_rules('LineConnected', 'Line Connected', 'trim|required');
        // $this->form_validation->set_rules('UomName', 'Uom Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('firepump/firepump_form', $data);
        }else{
			
			// echo "<pre>";print_r($data['template']->result());
			// echo "<pre>";print_r($_POST);exit;
			
				///// pump /////////////
				if($this->input->post('pumpCount')>0){
				for($i=0;$i<=$this->input->post('pumpCount');$i++){
					$image = '';
					$time = time();
					if ($_FILES['pic']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('pic', 'installation_pic');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$image = $file_upl_data['file_name']; 
					
					   }
					}					
					if( isset($_POST['p_status'][$i]) ){
						$status=1;
					}else{
						$status=0;
					}				
					
					$website_data = array(
						'pump_type' => $this->input->post('pump'),
						'hardware_device' => $this->input->post('hardware_device'),
						'pump_name' => $this->input->post('p_dashboard_name')[$i],
						'api_name' => $this->input->post('p_api_name')[$i],
						'factory_sr_no' => $this->input->post('p_factory_sr_no')[$i],				
						'installation_location' => $this->input->post('installation_location'),
						'date_of_installation' => date("Y-m-d", strtotime($this->input->post('installation_date'))),
						'installed_by' => $this->input->post('installed_by'),
						'supervised_by' => $this->input->post('supervised_by'),
						'upload_pic' => $image,
						'client_id' => $this->session->userdata('user_id'),
						'station_id' => $station_id,
						'UtilityName' => $this->input->post('p_UtilityName')[$i],
						'LineConnected' => $this->input->post('p_LineConnected')[$i],
						'LineConnectedAuto' => $this->input->post('p_LineConnectedAuto')[$i],
						'LineConnectedManual' => $this->input->post('p_LineConnectedManual')[$i],
						'UomName' => $this->input->post('p_UomName')[$i],
						'HP' => $this->input->post('p_HP')[$i],
						'CutInPressure' => $this->input->post('p_CutInPressure')[$i],
						'CutOutPressure' => $this->input->post('p_CutOutPressure')[$i],
						'Location' => $this->input->post('p_Location')[$i],                
						'PumpsCapacity' => $this->input->post('p_PumpsCapacity')[$i],
						'PressureMaintained' => $this->input->post('p_PressureMaintained')[$i],
						'BatteryVoltage' => "",             
						'FuelTankHeight' => "",              
						'FuelTankVolume' => "",               
						'CorrectionFactor' => "",              
						'Length' => "",             
						'Breadth' => "",              
						'Height' => "",               
						'Volume' => "",                
						'MinLevel' =>"", 
						'Pressure' => "",    
						'MinPressure' => "",              
						'MaxPressure' => "",             
						'status' => $status,                     
						'created_time'=>date('Y-m-d H:i:s')			
					);
					

					$res = $this->Firepump_model->insert_firepump($website_data);
					$hardware_id = $this->db->insert_id();
					
					$qr_code=$this->session->userdata('user_id').$this->input->post('hardware_device').$hardware_id;
					
					$site_data= array(
					'unique_sr_no' => $qr_code,
					'qr_code' => $qr_code
					);			
					$res1 = $this->Firepump_model->update_firepump($hardware_id,$site_data);
					// echo "<pre>";print_r($website_data);exit;
				}
				}
				
				////////////////////// end pumps ///////////////////////////
				
				///// diesel /////////////		
				if($this->input->post('diselCount')>0){
				for($i=0;$i<=$this->input->post('diselCount');$i++){
					$image = '';
					$time = time();
					if ($_FILES['pic']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('pic', 'installation_pic');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$image = $file_upl_data['file_name']; 
					
					   }
					}					
					if( isset($_POST['d_status'][$i]) ){
						$status=1;
					}else{
						$status=0;
					}				
					
					$website_data = array(
						'pump_type' => $this->input->post('pump'),
						'hardware_device' => $this->input->post('hardware_device'),
						'pump_name' => $this->input->post('d_dashboard_name')[$i],
						'api_name' => $this->input->post('d_api_name')[$i],
						'factory_sr_no' => $this->input->post('d_factory_sr_no')[$i],				
						'installation_location' => $this->input->post('installation_location'),
						'date_of_installation' => date("Y-m-d", strtotime($this->input->post('installation_date'))),
						'installed_by' => $this->input->post('installed_by'),
						'supervised_by' => $this->input->post('supervised_by'),
						'upload_pic' => $image,
						'client_id' => $this->session->userdata('user_id'),
						'station_id' => $station_id,
						'UtilityName' => $this->input->post('d_UtilityName')[$i],
						'LineConnected' => $this->input->post('d_LineConnected')[$i],
						'LineConnectedAuto' => $this->input->post('d_LineConnectedAuto')[$i],
						'LineConnectedManual' => $this->input->post('d_LineConnectedManual')[$i],
						'UomName' => $this->input->post('d_UomName')[$i],
						'HP' => $this->input->post('d_HP')[$i],
						'CutInPressure' => $this->input->post('d_CutInPressure')[$i],
						'CutOutPressure' => $this->input->post('d_CutOutPressure')[$i],
						'Location' => $this->input->post('d_Location')[$i],                
						'PumpsCapacity' => "", 
						'PressureMaintained' => "", 
						'BatteryVoltage' => $this->input->post('d_BatteryVoltage')[$i],               
						'FuelTankHeight' => $this->input->post('d_FuelTankHeight')[$i],               
						'FuelTankVolume' => $this->input->post('d_FuelTankVolume')[$i],                
						'CorrectionFactor' => $this->input->post('d_CorrectionFactor')[$i],               
						'Length' => "",            
						'Breadth' => "",             
						'Height' => "",              
						'Volume' => "",        
						'MinLevel' => "", 
						'Pressure' => "",  
						'MinPressure' => "",            
						'MaxPressure' => "",                
						'status' => $status,                     
						'created_time'=>date('Y-m-d H:i:s')			
					);

					$res = $this->Firepump_model->insert_firepump($website_data);
					$hardware_id = $this->db->insert_id();
					
					$qr_code=$this->session->userdata('user_id').$this->input->post('hardware_device').$hardware_id;
					
					$site_data= array(
					'unique_sr_no' => $qr_code,
					'qr_code' => $qr_code
					);			
					$res1 = $this->Firepump_model->update_firepump($hardware_id,$site_data);
				}
				}
				
				////////////////////// end diesel ///////////////////////////
				
				///// water /////////////	
				if($this->input->post('waterCount')>0){				
				for($i=0;$i<=$this->input->post('waterCount');$i++){
					$image = '';
					$time = time();
					if ($_FILES['pic']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('pic', 'installation_pic');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$image = $file_upl_data['file_name']; 
					
					   }
					}					
					if( isset($_POST['w_status'][$i]) ){
						$status=1;
					}else{
						$status=0;
					}				
					
					$website_data = array(
						'pump_type' => $this->input->post('pump'),
						'hardware_device' => $this->input->post('hardware_device'),
						'pump_name' => $this->input->post('w_dashboard_name')[$i],
						'api_name' => $this->input->post('w_api_name')[$i],
						'factory_sr_no' => $this->input->post('w_factory_sr_no')[$i],				
						'installation_location' => $this->input->post('installation_location'),
						'date_of_installation' => date("Y-m-d", strtotime($this->input->post('installation_date'))),
						'installed_by' => $this->input->post('installed_by'),
						'supervised_by' => $this->input->post('supervised_by'),
						'upload_pic' => $image,
						'client_id' => $this->session->userdata('user_id'),
						'station_id' => $station_id,
						'UtilityName' => $this->input->post('w_UtilityName')[$i],
						'LineConnected' => $this->input->post('w_LineConnected')[$i],
						'LineConnectedAuto' => $this->input->post('w_LineConnectedAuto')[$i],
						'LineConnectedManual' => $this->input->post('w_LineConnectedManual')[$i],
						'UomName' => $this->input->post('w_UomName')[$i],
						'HP' => "", 
						'CutInPressure' => "", 
						'CutOutPressure' => "", 
						'Location' => $this->input->post('w_Location')[$i],                
						'PumpsCapacity' => "", 
						'PressureMaintained' => "", 
						'BatteryVoltage' => "",              
						'FuelTankHeight' => "",               
						'FuelTankVolume' =>"",            
						'CorrectionFactor' => $this->input->post('w_CorrectionFactor')[$i],               
						'Length' => $this->input->post('w_Length')[$i],                
						'Breadth' => $this->input->post('w_Breadth')[$i],               
						'Height' => $this->input->post('w_Height')[$i],               
						'Volume' => $this->input->post('w_Volume')[$i],       
						// 'HP' => $this->input->post('HP'),                
						'MinLevel' => $this->input->post('w_MinLevel')[$i],  
						'Pressure' => "",    
						'MinPressure' => "",             
						'MaxPressure' => "",            
						'status' => $status,                     
						'created_time'=>date('Y-m-d H:i:s')			
					);

					$res = $this->Firepump_model->insert_firepump($website_data);
					$hardware_id = $this->db->insert_id();
					
					$qr_code=$this->session->userdata('user_id').$this->input->post('hardware_device').$hardware_id;
					
					$site_data= array(
					'unique_sr_no' => $qr_code,
					'qr_code' => $qr_code
					);			
					$res1 = $this->Firepump_model->update_firepump($hardware_id,$site_data);
				}
				}
				
				////////////////////// end water ///////////////////////////
				
				
				///// pressure /////////////
				if($this->input->post('pressureCount')>0){							
				for($i=0;$i<=$this->input->post('pressureCount');$i++){
					$image = '';
					$time = time();
					if ($_FILES['pic']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('pic', 'installation_pic');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$image = $file_upl_data['file_name']; 
					
					   }
					}					
					if( isset($_POST['pr_status'][$i]) ){
						$status=1;
					}else{
						$status=0;
					}				
					
					$website_data = array(
						'pump_type' => $this->input->post('pump'),
						'hardware_device' => $this->input->post('hardware_device'),
						'pump_name' => $this->input->post('pr_dashboard_name')[$i],
						'api_name' => $this->input->post('pr_api_name')[$i],
						'factory_sr_no' => $this->input->post('pr_factory_sr_no')[$i],				
						'installation_location' => $this->input->post('installation_location'),
						'date_of_installation' => date("Y-m-d", strtotime($this->input->post('installation_date'))),
						'installed_by' => $this->input->post('installed_by'),
						'supervised_by' => $this->input->post('supervised_by'),
						'upload_pic' => $image,
						'client_id' => $this->session->userdata('user_id'),
						'station_id' => $station_id,
						'UtilityName' => $this->input->post('pr_UtilityName')[$i],
						'LineConnected' => $this->input->post('pr_LineConnected')[$i],
						'LineConnectedAuto' => $this->input->post('pr_LineConnectedAuto')[$i],
						'LineConnectedManual' => $this->input->post('pr_LineConnectedManual')[$i],
						'UomName' => $this->input->post('pr_UomName')[$i],
						'HP' => "", 
						'CutInPressure' => "", 
						'CutOutPressure' => "", 
						'Location' => "",          
						'PumpsCapacity' => "", 
						'PressureMaintained' => "", 
						'BatteryVoltage' => "",             
						'FuelTankHeight' => "",               
						'FuelTankVolume' => "",            
						'CorrectionFactor' => "",            
						'Length' => "",               
						'Breadth' => "",               
						'Height' => "",              
						'Volume' => "",       
						'MinLevel' => $this->input->post('pr_MinLevel')[$i],  
						'Pressure' => $this->input->post('pr_Pressure')[$i],      
						'MinPressure' => $this->input->post('pr_MinPressure')[$i],               
						'MaxPressure' => $this->input->post('pr_MaxPressure')[$i],                
						'status' => $status,                     
						'created_time'=>date('Y-m-d H:i:s')			
					);

					$res = $this->Firepump_model->insert_firepump($website_data);
					$hardware_id = $this->db->insert_id();
					
					$qr_code=$this->session->userdata('user_id').$this->input->post('hardware_device').$hardware_id;
					
					$site_data= array(
					'unique_sr_no' => $qr_code,
					'qr_code' => $qr_code
					);			
					$res1 = $this->Firepump_model->update_firepump($hardware_id,$site_data);
				}
				}
				
				////////////////////// end diesel ///////////////////////////
			
			
			// exit;
            if ($res1) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Firepump/create_firepump/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('firepump/firepump_form', $data);
            }
		
		}
	}
	function edit_firepump($hardware_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
       
        $this->load->model('Hardware_category_model');
        $this->load->model('Firepump_model');
        $this->load->model('Upload_model');
        $this->load->model('Client_model');
		$station_id=$this->Client_model->get_station_id($this->session->userdata('user_id'));
		$data['firepump']=$this->Firepump_model->get_firepump($hardware_id);
		
		$data['pump'] = array(0=>'Select Type','Pumps'=>'Pumps','Diesel Pump'=>'Diesel Pump','Water Level Sensors'=>'Water Level Sensors','Pressure Sensor'=>'Pressure Sensor');
		$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->get_hardware_device_dropdown(5);
			
		
        $data['mode'] = 'edit';
		
		// echo "<pre>";print_r($data['partner']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pump', 'Pump Type', 'trim|required');
        $this->form_validation->set_rules('hardware_device', 'Hardware Device Name', 'trim|required');
        $this->form_validation->set_rules('dashboard_name', 'Dashboard Name', 'trim|required');
        $this->form_validation->set_rules('api_name', 'API Name', 'trim|required');
        $this->form_validation->set_rules('factory_sr_no', 'Factory Serial No.', 'trim|required');
        $this->form_validation->set_rules('UtilityName', 'Utility Name', 'trim|required');
        $this->form_validation->set_rules('LineConnected', 'Line Connected', 'trim|required');
        $this->form_validation->set_rules('UomName', 'Uom Name', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('firepump/firepump_form', $data);
        }else{		
			
			if($_FILES['pic']['name'] !='')
			{
				$imageold = $this->input->post('old_file');			
				
				if(isset($_FILES['pic']['name']) && $_FILES['pic']['name'] != ''){		 		
					$file_upl_data = $this->Upload_model->uploadDocuments('pic', 'installation_pic');						
					if ($file_upl_data['success'] == 1)
					{		
					$imagenew = $file_upl_data['file_name'];
					}
					else			
					{
					$this->session->set_flashdata('error', 'The file you are attempting to upload exceedes the maximum size.');
					redirect(current_url());
					}
				}
				
				$image= $imagenew;			
			}
			else
			{
				$image = $this->input->post('old_file');
			}
			if( isset($_POST['status']) ){
				$status=1;
			}else{
				$status=0;
			}
			
				
			$website_data = array(
                'pump_type' => $this->input->post('pump'),
                'hardware_device' => $this->input->post('hardware_device'),
                'pump_name' => $this->input->post('dashboard_name'),
                'api_name' => $this->input->post('api_name'),
                'factory_sr_no' => $this->input->post('factory_sr_no'),                
                'installation_location' => $this->input->post('installation_location'),
                'date_of_installation' => date("Y-m-d", strtotime($this->input->post('installation_date'))),
                'installed_by' => $this->input->post('installed_by'),
                'supervised_by' => $this->input->post('supervised_by'),
                'upload_pic' => $image,
				'client_id' => $this->session->userdata('user_id'),
				'station_id' => $station_id,
				'UtilityName' => $this->input->post('UtilityName'),
				'LineConnected' => $this->input->post('LineConnected'),
				'LineConnectedAuto' => $this->input->post('LineConnectedAuto'),
				'LineConnectedManual' => $this->input->post('LineConnectedManual'),
				'UomName' => $this->input->post('UomName'),
				'HP' => $this->input->post('HP'),
				'CutInPressure' => $this->input->post('CutInPressure'),
				'CutOutPressure' => $this->input->post('CutOutPressure'),
				'Location' => $this->input->post('Location'),                
                'PumpsCapacity' => $this->input->post('PumpsCapacity'),
				'PressureMaintained' => $this->input->post('PressureMaintained'),
				'BatteryVoltage' => $this->input->post('BatteryVoltage'),                
                'FuelTankHeight' => $this->input->post('FuelTankHeight'),                
                'FuelTankVolume' => $this->input->post('FuelTankVolume'),                
                'CorrectionFactor' => $this->input->post('CorrectionFactor'),                
                'Length' => $this->input->post('Length'),                
                'Breadth' => $this->input->post('Breadth'),                
                'Height' => $this->input->post('Height'),                
                'Volume' => $this->input->post('Volume'),       
				// 'HP' => $this->input->post('HP'),                
                'MinLevel' => $this->input->post('MinLevel'),   
				'Pressure' => $this->input->post('Pressure'),      
                'MinPressure' => $this->input->post('MinPressure'),                
                'MaxPressure' => $this->input->post('MaxPressure'),     
				'status' => $status,
				'updated_time'=>date('Y-m-d H:i:s')		
            );
			
            $res = $this->Firepump_model->update_firepump($hardware_id,$website_data);
			
                
            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Firepump/edit_firepump/' . $hardware_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('Firepump/firepump_form', $data);
            }
		
			
		}
	
	}
	
	function view_firepump($hardware_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
       
        $this->load->model('Hardware_category_model');
        $this->load->model('Firepump_model');
        $this->load->model('Upload_model');
        $this->load->model('Client_model');
		$station_id=$this->Client_model->get_station_id($this->session->userdata('user_id'));
		// $data['hardware']=$this->Hardware_model->get_hardware($hardware_id);
		$data['pump'] = array(0=>'Select Type','Pumps'=>'Pumps','Diesel Pump'=>'Diesel Pump','Water Level Sensors'=>'Water Level Sensors','Pressure Sensor'=>'Pressure Sensor');
		$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->get_hardware_device_dropdown(3);
		$data['firepump']=$this->Firepump_model->get_firepump($hardware_id);
		$this->load->view('firepump/firepump_view', $data);
	}
	
	public function remove_firepump($hardware_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Firepump_model');
        $this->Firepump_model->delete_firepump($hardware_id);
        echo 1;
    }
	
	function status_change($h_id,$status)
    {        
        $this->load->model('Firepump_model');
        $user_data = array('status' => $status);
        $res = $this->Firepump_model->update_status($h_id, $user_data);  		
		redirect('Admin/Firepump');
    }
	
	
}
?>