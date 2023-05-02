<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
	}
	public function index()
	
	{
		
		
        $this->load->view('datamanagement/management_list');

	}
	
	function view_account($account_id = ''){
	
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Account_model');
        $this->load->model('Client_model');
		$this->load->model('Upload_model');
		
		$data['account_type'] = array('' => 'Select Type of Document','Quotation'=>'Quotation','Purchase Order'=>'Purchase Order','Invoices'=>'Invoices','Survey Report'=>'Survey Report','Agreement Copies'=>'Agreement Copies','Installation Reports'=>'Installation Reports');
        $data['mode'] = 'edit';
		$data['account'] = $this->Account_model->get_account($account_id);
		$this->load->view('accounts/account_view', $data);
	}
	
	function edit_account($account_id = ''){
	
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Account_model');
        $this->load->model('Client_model');
		$this->load->model('Upload_model');
		
		$data['account_type'] = array('' => 'Select Type of Document','Quotation'=>'Quotation','Purchase Order'=>'Purchase Order','Invoices'=>'Invoices','Survey Report'=>'Survey Report','Agreement Copies'=>'Agreement Copies','Installation Reports'=>'Installation Reports');
        $data['mode'] = 'edit';
		$data['account'] = $this->Account_model->get_account($account_id);
		// echo "<pre>";print_r($data['account']);exit;
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('client', 'Client', 'trim|required');
        $this->form_validation->set_rules('account_type', 'Account Type', 'trim|required');
        // $this->form_validation->set_rules('files', 'Document', 'required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('accounts/account_form', $data);
        }else{
			
			if($_FILES['file']['name'] !='')
			{
				$imageold = $this->input->post('old_file');			
				
				if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){		 		
					$file_upl_data = $this->Upload_model->uploadDocuments('file', 'account_docs');						
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
                'account_type' => $this->input->post('account_type'),
                'client' => $this->input->post('client'),
                
                'doc' => $image,
               
				'updated_time'=>date('Y-m-d H:i:s')		
            );
			
            $res = $this->Account_model->update_account($account_id, $website_data);

                
            if ($res) {
                $data['msg'] = 'Details Updated Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Accounts/edit_account/' . $account_id );
            } else {
                $data['error'] = 'Failed to save details';
                 $this->load->view('accounts/account_form', $data);
            }
		}
	}
	function create_account() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Account_model');
        $this->load->model('Client_model');
		$this->load->model('Upload_model');
		// $data['clients'] = array('' => 'Select  Client') + $this->Client_model->
            // get_client_dropdown();
		$data['account_type'] = array('' => 'Select Type of Document','Quotation'=>'Quotation','Purchase Order'=>'Purchase Order','Invoices'=>'Invoices','Survey Report'=>'Survey Report','Agreement Copies'=>'Agreement Copies','Installation Reports'=>'Installation Reports');
        $data['clients'] = array('' => 'Select Client') + $this->Account_model->
				get_clients();
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('client_id', 'Client', 'trim|required');
        $this->form_validation->set_rules('account_type', 'Account Type', 'trim|required');
        // $this->form_validation->set_rules('files', 'Document', 'required');
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        if ($this->form_validation->run() == false) {
            $this->load->view('accounts/account_form', $data);
        }else{
			// echo $_FILES['file']['name'];exit;
			// $image = '';
					// $time = time();
					// if ($_FILES['file']['name'] != '') {
					// $file_upl_data = $this->Upload_model->uploadDocuments('file', 'account_docs');
					// echo "<pre>";print_r($file_upl_data);
					// if ($file_upl_data['success'] == 1){
					// $image = $file_upl_data['file_name']; 
					
               // }
            // }
			$filenames = array();

      $files=''; 
      $countfiles = count($_FILES['files']['name']);
	 
      for($i=0;$i<$countfiles;$i++){
 
        if(!empty($_FILES['files']['name'][$i])){
 
          
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
		 
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];

          $config['upload_path'] = 'asset/admin/account_docs/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif|xlsx|xls|doc|docx|csv|pdf|';
          $config['max_size'] = '5000'; // max_size in kb
          $config['file_name'] = 'account_docs_'.date('YmdHis').'_'.$_FILES['files']['name'][$i];
 
          $this->load->library('upload',$config); 
			
         
          if($this->upload->do_upload('file')){
           
            $uploadData = $this->upload->data();
			
            $filename = $uploadData['file_name'];
			
			
			$website_data = array(
                // 'client_id' => 1,
                'client' => $this->input->post('client'),
                'account_type' => $this->input->post('account_type'),
                'doc' => $filename,
                'created_by' => $this->session->userdata('user_id'),     
				'created_time'=>date('Y-m-d H:i:s')			
            );
			$res = $this->Account_model->insert_account($website_data);
            
            // $filenames[] = $filename;
          }else{
			  $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(current_url());
			  
		  }
        }
 
      }
	  // $files=implode(',',$filenames);
	  
			// echo "<pre>";print_r($_POST);exit;
			
			

            
            // $account_id = $this->db->insert_id();
			
            if ($res) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('Admin/Accounts/create_account/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('accounts/account_form', $data);
            }
		}
	
	}
	
	
	
	public function remove_account($account_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Account_model');
        $this->Account_model->delete_account($account_id);
        echo 1;
    }
	
	function view_file($filename){
		 if(isset($filename)){
            $fileName = htmlspecialchars(trim($filename));
            if($fileName){
                $dldFile    = $fileName;
                if(file_exists($fileName)){
                    $size       = @filesize($fileName);
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . $fileName);
                    header('Content-Transfer-Encoding: binary');
                    header('Connection: Keep-Alive');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . $size);
                    return TRUE;
                }
            }
            return FALSE;
        }

        
	}
	
}
