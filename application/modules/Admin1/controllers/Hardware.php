<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hardware extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	public function index()
	
	{
		$limit1 = 25;
        $start1 = $this->uri->segment(4);
        $this->load->model('Hardware_model');        
        $web_options1 = array(
            'start' => $start1,
            'limit' => $limit1,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'category' => 'static'
        );
        $data_hardware = $this->Hardware_model->get_hardwares($web_options1);
        $data['hardwares'] = $data_hardware->result();
		
		// echo "<pre>"; print_r($data['hardwares']);exit;
        $data['starting'] = $start1;
        $data['limit'] = $limit1;
        $config1['total_rows'] = $data_hardware->ttl_rows;
        $config1['uri_segment'] = 4;
        $config1['per_page'] = $limit1;
        $config1['base_url'] = base_url('Admin/Hardware/index');
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
		$this->load->view('hardware/hardware_list', $data);
	}
	
	function create_hardware() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hardware_template_model');
        $this->load->model('Hardware_category_model');
        $this->load->model('Hardware_model');
        $this->load->model('Upload_model');
        $this->load->model('Client_model');
		$station_id=$this->Client_model->get_station_id($this->session->userdata('user_id'));
		
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
		if ($this->input->get('hardware_category') != '')
			{
				$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->
					get_hardware_device_dropdown($this->input->get('hardware_category'));
			} else
			{
				$data['device'] = array();
			}
		// $data['template'] = $this->Hardware_template_model->get_hardware_template($category_id,$device_id);
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hardware_category', 'Hardware Category Name', 'trim|required');
        $this->form_validation->set_rules('hardware_device', 'Hardware Device Name', 'trim|required');
        $this->form_validation->set_rules('dashboard_name', 'Dashboard Name', 'trim|required');
        $this->form_validation->set_rules('api_name', 'API Name', 'trim|required');
        $this->form_validation->set_rules('factory_sr_no', 'Factory Serial No.', 'trim|required');
        $this->form_validation->set_rules('UtilityName', 'Utility Name', 'trim|required');
        $this->form_validation->set_rules('LineConnected', 'Line Connected', 'trim|required');
        $this->form_validation->set_rules('UomName', 'Uom Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware/hardware_form', $data);
        }else{
			
			$template = $this->Hardware_template_model->get_hardware_template($this->input->post('hardware_category'),$this->input->post('hardware_device'));
			
			// echo "<pre>";print_r($data['template']->result());
			// echo "<pre>";print_r($_POST);exit;
			
			$image = '';
					$time = time();
					if ($_FILES['pic']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('pic', 'installation_pic');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$image = $file_upl_data['file_name']; 
					
               }
            }
			
			
            $website_data = array(
                'hardware_category' => $this->input->post('hardware_category'),
                'hardware_device' => $this->input->post('hardware_device'),
                'dashboard_name' => $this->input->post('dashboard_name'),
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
				'UomName' => $this->input->post('UomName'),
                'status' => 1,                     
				'created_time'=>date('Y-m-d H:i:s')			
            );

            $res = $this->Hardware_model->insert_hardware($website_data);
            $hardware_id = $this->db->insert_id();
			
			$qr_code=$this->session->userdata('user_id').$this->input->post('hardware_device').$hardware_id;
			
			$site_data= array(
			'unique_sr_no' => $qr_code,
			'qr_code' => $qr_code
			);			
			$res1 = $this->Hardware_model->update_hardware($hardware_id,$site_data);
			
			if($template->num_rows()>0){
				foreach($template->result() as $temp){				
					
					if($this->input->post($temp->control_name)!=''){
						$status=$this->input->post($temp->control_name);
					}else{
						$status='off';
					}
					
					$form_data= array(
					'temp_id' => $this->input->post($temp->control_name.'_id'),
					'hardware_id' => $hardware_id,
					'field_name' => $temp->control_name,
					'field_value' => $status
					);			
					$res1 = $this->Hardware_model->insert_hardware_template_value($form_data);
				}
			
			}
			// exit;
            if ($res1) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware/create_hardware/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('hardware/hardware_form', $data);
            }
		}
	
	}
	
	function edit_hardware($hardware_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hardware_template_model');
        $this->load->model('Hardware_category_model');
        $this->load->model('Hardware_model');
        $this->load->model('Upload_model');
        $this->load->model('Client_model');
		$station_id=$this->Client_model->get_station_id($this->session->userdata('user_id'));
		$data['hardware']=$this->Hardware_model->get_hardware($hardware_id);
		$data['template'] = $this->Hardware_template_model->get_hardware_template($data['hardware']['hardware_category'],$data['hardware']['hardware_device']);
		
		// echo "<pre>";print_r($data['template_values']->result());exit;
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
		if ($data['hardware']['hardware_category'] != '')
			{
				$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->
					get_hardware_device_dropdown($data['hardware']['hardware_category']);
			} else
			{
				$data['device'] = array();
			}
		$data['hardware']=$this->Hardware_model->get_hardware($hardware_id);
        $data['mode'] = 'edit';
		
		// echo "<pre>";print_r($data['partner']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hardware_category', 'Hardware Category Name', 'trim|required');
        $this->form_validation->set_rules('hardware_device', 'Hardware Device Name', 'trim|required');
        $this->form_validation->set_rules('dashboard_name', 'Dashboard Name', 'trim|required');
        $this->form_validation->set_rules('api_name', 'API Name', 'trim|required');
        $this->form_validation->set_rules('factory_sr_no', 'Factory Serial No.', 'trim|required');
        $this->form_validation->set_rules('UtilityName', 'Utility Name', 'trim|required');
        $this->form_validation->set_rules('LineConnected', 'Line Connected', 'trim|required');
        $this->form_validation->set_rules('UomName', 'Uom Name', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware/hardware_form', $data);
        }else{		
			
			// echo "<pre>";print_r($_POST);exit;
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
			
				
			$website_data = array(
                'hardware_category' => $this->input->post('hardware_category'),
                'hardware_device' => $this->input->post('hardware_device'),
                'dashboard_name' => $this->input->post('dashboard_name'),
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
				'UomName' => $this->input->post('UomName'),
				'updated_time'=>date('Y-m-d H:i:s')		
            );
			
            $res = $this->Hardware_model->update_hardware($hardware_id,$website_data);
			
			$template=$data['template'];
			if($template->num_rows()>0){
				foreach($template->result() as $temp){				
					
					if($this->input->post($temp->control_name)!=''){
						$status=$this->input->post($temp->control_name);
					}else{
						$status='off';
					}
					
					$form_data= array(
					'field_value' => $status
					);			
					$res1 = $this->Hardware_model->update_hardware_template_value($hardware_id,$this->input->post($temp->control_name.'_id'),$form_data);
				}
			
			}
                
            if ($res1) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware/edit_hardware/' . $hardware_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('Hardware/hardware_form', $data);
            }
		}
	
	}
	
	
	function ajax_hardware_template(){
        $this->load->model('Hardware_model');
		$this->load->model('Hardware_template_model');
        $category_id = $this->input->get('category');
        $device_id = $this->input->get('device');		
       
		$data['template'] = $this->Hardware_template_model->get_hardware_template($category_id,$device_id);
        echo $this->load->view('hardware/ajax_template',$data, true);
    }
	
	public function remove_hardware($hardware_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hardware_model');
        $this->Hardware_model->delete_hardware($hardware_id);
        echo 1;
    }
	
	
}
