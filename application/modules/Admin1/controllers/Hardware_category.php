<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hardware_category extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	public function index()
	
	{
		//modules::run('admin/site/auth','employee_view');
       
        $limit = 25;
        $start = $this->uri->segment(4);
        $this->load->model('Hardware_category_model');        
        $web_options = array(
            'start' => $start,
            'limit' => $limit,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'category' => 'static'
        );
        $data_hardware_category = $this->Hardware_category_model->get_hardware_category($web_options);
        $data['hardware_category'] = $data_hardware_category->result();
        $data['starting'] = $start;
        $data['limit'] = $limit;
        $config['total_rows'] = $data_hardware_category->ttl_rows;
        $config['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('Admin/Hardware_category/index');
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['suffix'] = '?' . http_build_query($_GET, '', "&");

		
        $this->load->view('hardware_category/hardware_category_list', $data);
	}
	function device(){
		$limit1 = 25;
        $start1 = $this->uri->segment(4);
        $this->load->model('Hardware_category_model');        
        $web_options1 = array(
            'start' => $start1,
            'limit' => $limit1,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
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
        $config1['base_url'] = base_url('Admin/Hardware_category/device');
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
		$this->load->view('hardware_category/hardware_category_device_list', $data);
	}
	
	function create_category() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hardware_category_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->
            get_hardware_category_dropdown();
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware_category/hardware_category_form', $data);
        }else{
			
					
			$website_data = array(
                'category_name' => $this->input->post('category_name'),               
                'status' => 1,
                'created_by' => $this->session->userdata('user_id'),     
				'created_time'=>date('Y-m-d H:i:s')			
            );

            $res = $this->Hardware_category_model->insert_category($website_data);
            $category_id = $this->db->insert_id();
			
            if ($res) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware_category/create_category/' . $category_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('hardware_category/hardware_category_form', $data);
            }
		}
	
	}
	function create_hardware_device() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hardware_category_model');
		
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('device_name', 'Device Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware_category/hardware_category_form', $data);
        }else{
			
					
			$website_data = array(
                'device_name' => $this->input->post('device_name'),               
                'category_id' => $this->input->post('parent_id'),               
                'status' => 1,
                'created_by' => $this->session->userdata('user_id'),     
				'created_time'=>date('Y-m-d H:i:s')			
            );

            $res = $this->Hardware_category_model->insert_device($website_data);
            // $category_id = $this->db->insert_id();
			
            if ($res) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware_category/create_category/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('hardware_category/hardware_category_form', $data);
            }
		}
	
	}
	
	function edit_category($c_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hardware_category_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->
            get_hardware_category_dropdown();
        $data['mode'] = 'edit';
		$data['category_name'] = $this->Hardware_category_model->get_category($c_id);
		
		// echo "<pre>";print_r($data['partner']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware_category/hardware_category_form', $data);
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
	function edit_device($d_id = '') {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hardware_category_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->
            get_hardware_category_dropdown();
        $data['mode'] = 'edit';
		$data['device'] = $this->Hardware_category_model->get_device($d_id);
		
		// echo "<pre>";print_r($data['partner']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('parent_id', 'Category ID', 'trim|required');
        $this->form_validation->set_rules('device_name', 'Device Name', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('hardware_category/hardware_category_form', $data);
        }else{		
			
			
			$website_data = array(
                'category_id' => $this->input->post('parent_id'),
                'device_name' => $this->input->post('device_name'),
                'updated_time'=>date('Y-m-d H:i:s')		
            );
			// echo "<pre>";print_r($website_data);exit;
			
            $res = $this->Hardware_category_model->update_device($d_id, $website_data);

               // echo $this->db->last_query();exit; 
            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Hardware_category/edit_device/'.$d_id);
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
	
}
