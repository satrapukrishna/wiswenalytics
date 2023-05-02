<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MX_Controller {
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
        $this->load->model('Client_model');
        
        $web_options = array(
            'start' => $start,
            'limit' => $limit,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'status' => $this->input->get('status'),
            'category' => 'static'
        );
        $data_clients = $this->Client_model->get_clients($web_options);
        $data['clients'] = $data_clients->result();
		// echo "<pre>";print_r($data['clients']);exit;
        $data['starting'] = $start;
        $data['limit'] = $limit;
        $config['total_rows'] = $data_clients->ttl_rows;
        $config['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('Admin/Clients/index');
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
        
        $this->load->view('clients/client_list', $data);

    }
    function create_client() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Client_model');
       
        // $data['permissions'] = $this->db->get_where('permissions');
        $this->db->select('');
        $this->db->where('user_type', 4);
        $this->db->from('permissions');
        $data['permissions'] = $this->db->get();
        
        
        
        
        $data['property_type'] = array(0=>'Select Property Type','Residential'=>'Residential','Commercial'=>'Commercial');
        $data['partners'] = array('' => 'Select ') + $this->Client_model->
            get_partner_dropdown();
        // $data['partners'] = array(0=>'Select','1'=>'partner1','2'=>'partner2');
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('client_name', 'client_name', 'trim|required');        
        $this->form_validation->set_rules('client_type', 'client_type', 'trim|required');
        $this->form_validation->set_rules('property_type', 'property_type', 'trim|required');
        $this->form_validation->set_rules('email_id', 'email_id', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[10]|numeric');
        $this->form_validation->set_rules('station_id', 'Station Id', 'trim|required');
        $this->form_validation->set_rules('grand_type', 'Grand Type', 'trim|required');
        $this->form_validation->set_rules('token_username', 'Token UserName', 'trim|required');
        $this->form_validation->set_rules('token_password', 'Token Password', 'trim|required');
        $this->form_validation->set_rules('store_code', 'Client Store Code', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('clients/client_form', $data);
        }else{
            // echo "<pre>";print_r($_POST);exit;
            if ($this->input->post('email_id') != '') {
                $this->db->select('');
                $this->db->where('email_id', $this->input->post('email_id'));
                $this->db->from('clients');
                $unique = $this->db->get()->num_rows();
                if ($unique>0) {
                    $this->session->set_flashdata('error', 'Email id is already exist. Please enter another email');
                    redirect(current_url());
                }
            }
            if( isset($_POST['status']) ){
                $status=1;
            }else{
                $status=0;
            }
            
            // $permission=implode(',',$this->input->post('permissions'));
            
            //echo $status;exit;
            
            if($this->input->post('permissions')!=''){              
                $permission=implode(',',$this->input->post('permissions'));
            }else{
                $permission="";
            }
            
                    
            $website_data = array(
                'client_name' => $this->input->post('client_name'),
                'station_id' => $this->input->post('station_id'),
                'password' => md5($this->input->post('password')),
                'email_id' => $this->input->post('email_id'),
                'mobile' => $this->input->post('mobile'),
                'client_type' => $this->input->post('client_type'),
                'property_type' => $this->input->post('property_type'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'partner_id' => $this->input->post('partner_id'),
                'no_buildings' => $this->input->post('no_buildings'),
                'permissions' => $permission,
                'status' => $status,
                'role' => 2,
                'created_time'=>date('Y-m-d H:i:s')         
            );

            $res = $this->Client_model->insert_client($website_data);
            $client_id = $this->db->insert_id();
            
            //// Access Token Generation ///////////////
            
            $grand_type=$this->input->post('grand_type');
            $token_username=$this->input->post('token_username');
            $token_password=$this->input->post('token_password');
            
            $ch = curl_init('http://137.59.201.64/ClientDataService/token');                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "grant_type=$grand_type&username=$token_username&password=$token_password");
                
            /*curl_setopt($ch, CURLOPT_POSTFIELDS,
                "grant_type=password&username=CBREindia1&password=manohar123");*/

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));                                                                   
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $json = json_decode($result, true);
            // $this->Api_model->saveToken($json,"cbre");
            //$access_token=$json['access_token'];
             $access_token="test";
        
            
            $token_data = array(
                'token' => $access_token,
                'station_id' => $this->input->post('station_id'),
                'client_id' => $client_id,
                'client_name' => $this->input->post('client_name'),
                'store_code' => $this->input->post('store_code'),
                'grant_type' => $this->input->post('grand_type'),
                // 'token_username' => $this->input->post('token_username'),
                'token_username' => $this->input->post('token_username'),
                'token_password' => $this->input->post('token_password'),
                'date'=>date('Y-m-d H:i:s')         
            );
            
            $res1 = $this->Client_model->insert_token($token_data);
            
            $count = trim($this->input->post('localcontactCount'));
            $hiddenval = explode(',', trim($this->input->post('hiddenlocal')));
            $appcount = 0;

                for ($i = 1; $i <= $count; $i++)
                {
                    if (!in_array($i, $hiddenval))
                    {
                        if (trim($this->input->post('building_name' . $i)) != '' && trim($this->input->
                            post('address' . $i)) != '' && trim($this->input->post('floors' . $i)) != '')
                        {
                            $localdetails = array(
                                'client_id' => $client_id,
                                'building_name' => trim($this->input->post('building_name' . $i)),
                                'address' => trim($this->input->post('address' . $i)),
                                'floors' => trim($this->input->post('floors' . $i)),
                               
                                'created_time' => date('Y-m-d H:i:s'),
                                'created_by' => $this->session->userdata('user_id'));
                            
                                $this->db->insert('building', $localdetails);
                                
                                $appcount++;
                            
                        }
                    }
                }
                
            if ($res1) {
                
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                // redirect('Admin/Clients/edit_client/' . $client_id);
                redirect('Admin/Clients/edit_client/' . $client_id);
                
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('clients/client_form', $data);
            }
        }
    
    }
    
    function view_client($c_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Client_model');
       
        $data['permissions'] = $this->db->get_where('permissions');
        $data['property_type'] = array(0=>'Select Property Type','Residential'=>'Residential','Commercial'=>'Commercial');
        $data['partners'] = array('' => 'Select ') + $this->Client_model->
            get_partner_dropdown();
        $data['mode'] = 'edit';
        $data['client'] = $this->Client_model->get_client($c_id);
        $data['buildings'] = $this->Client_model->get_buildings($c_id);
         $this->load->view('clients/client_view', $data);
    }   
    
    function edit_client($c_id = '') {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Client_model');
        $this->load->model('Hardware_model');
       
        $this->db->select('');
        $this->db->where('user_type', 4);
        $this->db->from('permissions');
        $data['permissions'] = $this->db->get();
        
        $data['property_type'] = array(0=>'Select Property Type','Residential'=>'Residential','Commercial'=>'Commercial');
        $data['partners'] = array('' => 'Select ') + $this->Client_model->
            get_partner_dropdown();
        $data['mode'] = 'edit';
        $data['client'] = $this->Client_model->get_client($c_id);
        $data['buildings'] = $this->Client_model->get_buildings($c_id);
        // echo "<pre>";print_r($data['buildings']->result());exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('client_name', 'client_name', 'trim|required');
        $this->form_validation->set_rules('client_type', 'client_type', 'trim|required');
        $this->form_validation->set_rules('property_type', 'property_type', 'trim|required');
        $this->form_validation->set_rules('email_id', 'email_id', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[10]|numeric');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('clients/client_form', $data);
        }else{      
            
            if( isset($_POST['status']) ){
                $status=1;
            }else{
                $status=0;
            } 
            
            $website_data = array(
                'client_name' => $this->input->post('client_name'),                
                'email_id' => $this->input->post('email_id'),
                'station_id' => $this->input->post('station_id'),
                'mobile' => $this->input->post('mobile'),
                'client_type' => $this->input->post('client_type'),
                'property_type' => $this->input->post('property_type'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'partner_id' => $this->input->post('partner_id'),
                'no_buildings' => $this->input->post('no_buildings'),
                'permissions' => implode(',',$this->input->post('permissions')),
                'status' => $status,
                'updated_time'=>date('Y-m-d H:i:s')         
            );
            if($this->input->post('pass')!=''){
               $website_data['password'] = md5($this->input->post('pass'));
           }
           
           if ($this->input->post('email_id') != '') {
                $mail = $this->input->post('email_id');
                $this->db->select('');
                $this->db->where('email_id', $this->input->post('email_id'));
                $this->db->where('client_id !=', $c_id);
                $this->db->from('clients');
                $unique = $this->db->get();
                if ($unique->num_rows() == '0') {
                    $website_data['email_id'] = $mail;
                } elseif ($unique->num_rows()>0) {
                    $this->session->set_flashdata('error', 'Email id is already exist. Please enter another email');
                    redirect(current_url(), $data);
                }
            }
            // echo "<pre>";print_r($website_data);exit;
            $res = $this->Client_model->update_client($c_id, $website_data);
            $ress = $this->Hardware_model->update_hardware_client($c_id, array('station_id'=>$this->input->post('station_id')));
            
            $token_data = array(
                'station_id' => $this->input->post('station_id'),                
                'grant_type' => $this->input->post('grand_type'),
                'store_code' => $this->input->post('store_code'),
                'token_username' => $this->input->post('token_username'),
                'token_password' => $this->input->post('token_password')
            );
            
            $res1 = $this->Client_model->update_token_data($c_id, $token_data);

            
            $count = trim($this->input->post('localcontactCount'));
            $hiddenval = explode(',', trim($this->input->post('hiddenlocal')));
            $appcount = 0;
            // echo "<pre>";print_r($_POST);exit;
            $this->db->where('client_id', $c_id);
            $this->db->delete('building');
            
                for ($i = 1; $i <= $count; $i++)
                {
                    if (!in_array($i, $hiddenval))
                    {
                        if (trim($this->input->post('building_name' . $i)) != '' && trim($this->input->
                            post('address' . $i)) != '' && trim($this->input->post('floors' . $i)) != '')
                        {
                            $localdetails = array(
                                'client_id' => $c_id,
                                'building_name' => trim($this->input->post('building_name' . $i)),
                                'address' => trim($this->input->post('address' . $i)),
                                'floors' => trim($this->input->post('floors' . $i)),                     
                                'created_time' => date('Y-m-d H:i:s'),
                                'created_by' => $this->session->userdata('user_id'));
                            
                                $this->db->insert('building', $localdetails);
                                
                                $appcount++;
                            
                        }
                    }
                }
                
            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Clients/edit_client/' . $c_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('Admin/Clients/client_form', $data);
            }
        }
    
    }
    
    public function remove_client($client_id) {
        
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Client_model');
        $this->Client_model->delete_client($client_id);
        echo 1;
    }
    
    public function remove_building($building_id) {
        
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Client_model');
        $this->Client_model->delete_building($building_id);
        echo 1;
    }
    function status_change($c_id,$status)
    {
        
        $this->load->model('Client_model');
        $user_data = array('status' => $status);
        $res = $this->Client_model->update_status($c_id, $user_data);       
        redirect('Admin/Clients');
    }
    function create_permission()
    {       
        $this->load->model('Client_model');
        if($this->input->post('per_type')==5){
            $type_name="water";
        }else if($this->input->post('per_type')==6){
            $type_name="energy";
        }else if($this->input->post('per_type')==7){
            $type_name="Air Quality";
        }else if($this->input->post('per_type')==8){
            $type_name="Air Conditioning";
        }else if($this->input->post('per_type')==9){
            $type_name="Remote Control";
        }else if($this->input->post('per_type')==10){
            $type_name="Soft Integrations";
        }else if($this->input->post('per_type')==11){
            $type_name="Specialised Solutions";
        }else if($this->input->post('per_type')==12){
            $type_name="Billing";
        }
        $data = array(
                'key' => str_replace(' ', '_', $this->input->post('per_key')),
                'description' => $this->input->post('per_key'),
                'user_type' => $this->input->post('per_type'),
                'type_name' => $type_name
                );
            
            $res = $this->Client_model->insert_permission($data);
            redirect('Admin/Clients/create_client#create_per');
    }
    
    
    function client_permission($c_id){
        $this->load->model('Client_model');
        $data['client'] = $this->Client_model->get_client($c_id);
        $this->db->select('');
        $this->db->where('user_type', 4);
        $this->db->from('permissions');
        $data['permissions'] = $this->db->get();
        $this->load->view('clients/client_inner_permission', $data);
    }
    
    function edit_client_permissions($c_id){
        $this->load->model('Client_model');
        $website_data=array(
        'inner_permissions' => implode(',',$this->input->post('inner_permissions')),
        'updated_time'=>date('Y-m-d H:i:s')
        );
        $res = $this->Client_model->update_client($c_id, $website_data);
        if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Clients/edit_client/' . $c_id );
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('Admin/Clients/client_form', $data);
            }
        
    }
    
}
