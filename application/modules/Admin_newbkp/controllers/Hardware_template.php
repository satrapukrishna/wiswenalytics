<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hardware_template extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	
	public function index()	{
		$limit1 = 25;
        $start1 = $this->uri->segment(4);
        $this->load->model('Hardware_category_model');        
        $web_options1 = array(
            'start' => $start1,
            'limit' => $limit1,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'status' => $this->input->get('status'),
            'category' => 'static'
        );
		
        $data_hardware_category1 = $this->Hardware_category_model->get_hardware_category1($web_options1);
        $data['hardware_category1'] = $data_hardware_category1->result();
		
		// $data['parent_name'] = $this->Hardware_category_model->get_parent_name($web_options);
		// echo "<pre>"; print_r($data['hardware_category1']);exit;
        $data['starting'] = $start1;
        $data['limit'] = $limit1;
        $config1['total_rows'] = $data_hardware_category1->ttl_rows;
        $config1['uri_segment'] = 4;
        $config1['per_page'] = $limit1;
        $config1['base_url'] = base_url('Admin/Hardware_template/index');
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
		$this->load->view('hardware_template/hardware_template_list', $data);
	}
	
	function create_hardware_template() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hardware_template_model');
        $this->load->model('Hardware_category_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
		if ($this->input->get('hardware_category') != '')
			{
				$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->
					get_hardware_device_dropdown($this->input->get('hardware_category'));
			} else
			{
				$data['device'] = array();
			}
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hardware_category', 'Hardware Category Name', 'trim|required');
        $this->form_validation->set_rules('hardware_device', 'Hardware Device Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware_template/hardware_template_form', $data);
        }else{
			
			// echo "<pre>";print_r($_POST);
			if($this->input->post('Dynamicdropdownname')!=''){
				
				$control_type="dropdown";
				// $dropdowndata=explode(",",$this->input->post('dropdown_data'));
				$dropdowndata=json_encode($this->input->post('Dynamicdropdown'), JSON_FORCE_OBJECT);
		
				$website_data1 = array(
					'hardware_category' => $this->input->post('hardware_category'),               
					'hardware_device' => $this->input->post('hardware_device'),               
					'control_type' => $control_type,               
					'control_name' => str_replace(' ','_',$this->input->post('Dynamicdropdownname')),    
					'control_value' => $dropdowndata,
					'created_by' => $this->session->userdata('user_id'),     
					'created_time'=>date('Y-m-d H:i:s')			
					);
					$res=$this->Hardware_template_model->insert_hardware_template($website_data1);
				
			}
			
			if($this->input->post('textbox_data')!=''){
				
				$control_type="textbox";
				$textdata=explode(",",str_replace(' ','_',$this->input->post('textbox_data')));
				$c=count($textdata)-1;
				for($i=0;$c>$i;$i++){
					$website_data = array(
					'hardware_category' => $this->input->post('hardware_category'),               
					'hardware_device' => $this->input->post('hardware_device'),               
					'control_type' => $control_type,               
					'control_name' => $textdata[$i],
					'created_by' => $this->session->userdata('user_id'),     
					'created_time'=>date('Y-m-d H:i:s')			
					);
					$res=$this->Hardware_template_model->insert_hardware_template($website_data);
				}
			}
			
			
			
			if($this->input->post('DynamicRadio')!=''){
				
				$control_type="radiobutton";
				
					$website_data = array(
					'hardware_category' => $this->input->post('hardware_category'),               
					'hardware_device' => $this->input->post('hardware_device'),               
					'control_type' => $control_type,               
					'control_name' => str_replace(' ','_',$this->input->post('DynamicRadio')),
					'created_by' => $this->session->userdata('user_id'),  
					'created_time'=>date('Y-m-d H:i:s')			
					);
					$res=$this->Hardware_template_model->insert_hardware_template($website_data);
				
			}
			
			// echo $row;exit;

           
            // $category_id = $this->db->insert_id();
			
            if ($res) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware_template/create_hardware_template/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('hardware_template/hardware_template_form', $data);
            }
		}
	
	}
	
	function view_template($category_id,$device_id){
		
		$this->load->model('Hardware_template_model');
        $this->load->model('Hardware_category_model');
		$data['template'] = $this->Hardware_template_model->get_hardware_template($category_id,$device_id);
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
		// echo "<pre>";print_r($data['category']);exit;
		$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->get_hardware_device_dropdown($category_id);
		$data['category_id']=$category_id;
		$data['device_id']=$device_id;
		
		// echo "<pre>";print_r($data['template']->result());exit;
		$this->load->view('hardware_template/hardware_template_view', $data);
	}
	
	function ajax_hardware_device_dropdown(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value="">  - Select Device - </option>';
        $states = $this->Hardware_category_model->get_devices($category);            
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	
	function remove_template(){
		$this->load->model('Hardware_template_model');
		$category=$_GET['category'];
		$device=$_GET['device'];
		$res=$this->Hardware_template_model->delete_template($category,$device);
		if($res){
			echo "1";
		}
	}
	
	function add_textbox(){
		$val=$this->input->get('category');
		echo $val;
	}
	
	function edit_template($category_id,$device_id) {
        //modules::run('admin/site/auth','employee_modify');
		$this->load->model('Hardware_template_model');
        $this->load->model('Hardware_category_model');
		
		$data['template'] = $this->Hardware_template_model->get_hardware_template($category_id,$device_id);
		$data['category_id']=$category_id;
		$data['device_id']=$device_id;
		// echo "<pre>";print_r($data['template']);exit;
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
		$data['device'] = array('' => 'Select Device') + $this->Hardware_category_model->
					get_hardware_device_dropdown($category_id);
			
        $data['mode'] = 'edit';
		
		// echo "<pre>";print_r($data['partner']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hardware_category', 'Hardware Category Name', 'trim|required');
        $this->form_validation->set_rules('hardware_device', 'Hardware Device Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware_template/hardware_template_form', $data);
        }else{		
			
			
			$website_data = array(
                'category_name' => $this->input->post('category_name'),
                'updated_time'=>date('Y-m-d H:i:s')		
            );
			
            $res = $this->Hardware_category_model->update_category($c_id, $website_data);

                
            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware_category/edit_category/'.$c_id);
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('hardware_category/hardware_category_form', $data);
            }
		}
	
	}
	
	public function remove_category($category_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hardware_category_model');
        $this->Hardware_category_model->delete_category($category_id);
        echo 1;
    }
	
	
	public function remove_device($device_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hardware_category_model');
        $this->Hardware_category_model->delete_device($device_id);
        echo 1;
    }
	
	function status_change($d_id,$status)
    {
        
        $this->load->model('Hardware_template_model');
        $user_data = array('status' => $status);
        $res = $this->Hardware_template_model->update_status($d_id, $user_data);  
		
		redirect('Admin/Hardware_template');
    }
	
}
