<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MX_Controller {
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
        $this->load->model('Employee_model');
        
        $web_options = array(
            'start' => $start,
            'limit' => $limit,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'category' => 'static'
        );
        $data_employees = $this->Employee_model->get_employees($web_options);
        $data['employees'] = $data_employees->result();
        $data['starting'] = $start;
        $data['limit'] = $limit;
        $config['total_rows'] = $data_employees->ttl_rows;
        $config['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('Admin/Employees/index');
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
		
        $this->load->view('employees/employee_list', $data);

	}
	function create_employee() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Employee_model');
        $this->load->model('Upload_model');
       
        // $data['permissions'] = $this->db->get_where('permissions');
		
		$this->db->select('');
		$this->db->where('user_type', 2);
		$this->db->from('permissions');
		$data['permissions'] = $this->db->get();
				
        
        // $data['partners'] = array(0=>'Select','1'=>'partner1','2'=>'partner2');
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email ID', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('employees/employee_form', $data);
        }else{
			// echo "<pre>";print_r($_POST);exit;
			if ($this->input->post('email_id') != '') {
                $this->db->select('');
                $this->db->where('email_id', $this->input->post('email_id'));
                $this->db->from('employees');
                $unique = $this->db->get()->num_rows();
				if ($unique>0) {
                    $this->session->set_flashdata('error', 'Email id is already exist. Please enter another email');
                    redirect(current_url());
                }
            }
			$doc = '';
					$time = time();
					if ($_FILES['file']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('file', 'employee_docs');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$doc = $file_upl_data['file_name']; 
					
               }
            }
			$image = '';
					$time = time();
					if ($_FILES['image']['name'] != '') {
					$file_upl_data = $this->Upload_model->uploadDocuments('image', 'employee_pic');
					// echo "<pre>";print_r($file_upl_data);
					if ($file_upl_data['success'] == 1){
					$image = $file_upl_data['file_name']; 
					}else{
						$this->session->set_flashdata('error', 'Please Upload gif | jpg | png | jpeg formates only');
						redirect(current_url());
					}
            }
			if( isset($_POST['status']) ){
				$status=1;
			}else{
				$status=0;
			}
			
			//echo $status;exit;
					
			$website_data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),                
                'email_id' => $this->input->post('email_id'),
				'password' => md5($this->input->post('password')),
                'designation' => $this->input->post('designation'),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact'),
                'job_type' => $this->input->post('job_type'),
                'city' => $this->input->post('city'),
                'date_of_joining' => $this->input->post('date_of_joining'),                
                'permissions' => implode(',',$this->input->post('permissions')),
                'doc' => $doc,
                'profile_pic' => $image,
                'status' => $status,
				'created_by' => $this->session->userdata('user_id'),
				'created_time'=>date('Y-m-d H:i:s')			
            );

            $res = $this->Employee_model->insert_employee($website_data);
			
            // $client_id = $this->db->insert_id;		
			
            if ($res) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Employees/create_employee/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('employees/employee_form', $data);
            }
		}
	
	}
	
	function edit_employee($e_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Employee_model');
       $this->load->model('Upload_model');
        $this->db->select('');
		$this->db->where('user_type', 2);
		$this->db->from('permissions');
		$data['permissions'] = $this->db->get();
		
        $data['mode'] = 'edit';
		$data['employee'] = $this->Employee_model->get_employee($e_id);
		
		// echo "<pre>";print_r($data['employee']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email ID', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('employees/employee_form', $data);
        }else{

			if($_FILES['file']['name'] !='')
			{
				$fileold = $this->input->post('old_file');			
				
				if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){		 		
					$file_upl_data = $this->Upload_model->uploadDocuments('file', 'employee_docs');						
					if ($file_upl_data['success'] == 1)
					{		
					$filenew = $file_upl_data['file_name'];
					}
					else			
					{
					$this->session->set_flashdata('error', 'The file you are attempting to upload exceedes the maximum size.');
					redirect(current_url());
					}
				}
				
				$file= $fileold.','. $filenew;			
			}
			else
			{
				$file = $this->input->post('old_file');
			}
			
			
			if($_FILES['image']['name'] !='')
			{
				
				$imageold = $this->input->post('old_image');			
				
				if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ''){		 		
					$file_upl_data = $this->Upload_model->uploadDocuments('image', 'employee_pic');						
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
				$image = $this->input->post('old_image');
			}
			
			if( isset($_POST['status']) ){
				$status=1;
			}else{
				$status=0;
			} 
			
			$website_data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),                
                'email_id' => $this->input->post('email_id'),
                'designation' => $this->input->post('designation'),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact'),
                'job_type' => $this->input->post('job_type'),
                'city' => $this->input->post('city'),
                'date_of_joining' => $this->input->post('date_of_joining'),                
                'permissions' => implode(',',$this->input->post('permissions')),
                'doc' => $file,
                'profile_pic' => $image,
                'status' => $status,
				'updated_time'=>date('Y-m-d H:i:s')					
            );
			if($this->input->post('password')!=''){
               $website_data['password'] = md5($this->input->post('password'));
           }
		   
		   if ($this->input->post('email_id') != '') {
                $mail = $this->input->post('email_id');
                $this->db->select('');
                $this->db->where('email_id', $this->input->post('email_id'));
                $this->db->where('emp_id !=', $e_id);
                $this->db->from('employees');
                $unique = $this->db->get();
                if ($unique->num_rows() == '0') {
                    $website_data['email_id'] = $mail;
                } elseif ($unique->num_rows()>0) {
                    $this->session->set_flashdata('error', 'Email id is already exist. Please enter another email');
                    redirect(current_url(), $data);
                }
            }
            $res = $this->Employee_model->update_employee($e_id, $website_data);

            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Employees/edit_employee/' . $e_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('employees/employee_form', $data);
            }
		}
	
	}
	
	public function remove_employee($employee_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Employee_model');
        $this->Employee_model->delete_employee($employee_id);
        echo 1;
    }
	
	
}
