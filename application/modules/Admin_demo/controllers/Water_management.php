<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Water_management extends MX_Controller {
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
        $this->load->model('Water_model');
        
        $web_options = array(
            'start' => $start,
            'limit' => $limit,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'status' => $this->input->get('status'),
            'category' => 'static'
        );
        $data_partners = $this->Water_model->get_partners($web_options);
        $data['partners'] = $data_partners->result();
        $data['starting'] = $start;
        $data['limit'] = $limit;
        $config['total_rows'] = $data_partners->ttl_rows;
        $config['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('Admin/Water_management/index');
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
		
        $this->load->view('WaterManagementApp/WaterManagementSettings', $data);

	}
    
	function create_watermanagement() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->view('WaterManagementApp/WaterManagementSetNew');
           
	
	}
    function view_watermanagement() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->view('watermeter_magement');
           
	
	}
	
	function view_partner($p_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Partner_model');
        $this->load->model('Upload_model');
        $data['mode'] = 'edit';
		$data['partner'] = $this->Partner_model->get_partner($p_id);
		
            $this->load->view('partners/partner_view', $data);
	}	
	
	function edit_partner($p_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Partner_model');
        $this->load->model('Upload_model');
        $data['mode'] = 'edit';
		$data['partner'] = $this->Partner_model->get_partner($p_id);
		
		// echo "<pre>";print_r($data['partner']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('partner_name', 'Partner Name', 'trim|required');
        $this->form_validation->set_rules('partner_type', 'Partner Type', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('partners/partner_form', $data);
        }else{		
			
			if($_FILES['file']['name'] !='')
			{
				$imageold = $this->input->post('old_file');			
				
				if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){		 		
					$file_upl_data = $this->Upload_model->uploadDocuments('file', 'partner_doc');						
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
				
				$image= $imageold.','. $imagenew;			
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
                'partner_name' => $this->input->post('partner_name'),
                'partner_type' => $this->input->post('partner_type'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'doc' => $image,
                'status' => $status,
				'updated_time'=>date('Y-m-d H:i:s')		
            );
			
            $res = $this->Partner_model->update_partner($p_id, $website_data);

                
            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Partners/edit_partner/' . $p_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('partners/partner_form', $data);
            }
		}
	
	}
	
	public function remove_partner($partner_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Partner_model');
        $this->Partner_model->delete_partner($partner_id);
        echo 1;
    }
	function status_change($partner_id,$status)
    {
        
        $this->load->model('Partner_model');
        $user_data = array('status' => $status);
        $res = $this->Partner_model->update_status($partner_id, $user_data);       
		redirect('Admin/Partners');
    }
	
}
