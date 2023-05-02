<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 900);
class HospitalAdmin_demo extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Hospital_model');
        
    }
    public function index()
	{
        $this->load->view('Login');
		
	}
    public function dashboard()
	{
        $this->load->view('Dashboard');
		
	}
    function notifications(){
        $this->load->view('Notifications');
    }
    function settings(){
        $this->load->view('Settings');
    }
    function login(){
        $this->load->view('Login');
    }
    function hospitalSelection(){
        $this->load->view('HospitalSelection');
    }
    function engineering(){
        $this->load->view('Engineering');
    }
    function machinery(){
        $this->load->view('Machinery');
    }
    function resources(){
        $this->load->view('Resources');
    }
    function sanitation(){
        $this->load->view('Sanitation');
    }
    function repairMaintenance(){
        $this->load->view('RepairMaintenance');
    }
    function inventoryManagement(){
        $this->load->view('InventoryManagement');
    }
    function checklist(){
        $this->load->view('Checklist');
    }
    function pPM(){
        $this->load->view('PPM');
    }
    function aMC(){
        $this->load->view('AMC');
    }
    function attendence(){
        $this->load->view('Attendence');
    }
    function bedsOccupancy(){
        $this->load->view('BedsOccupancy');
    }
    function manpowerUtilization(){
        $this->load->view('ManpowerUtilization');
    }
    function billingSoftware(){
        $this->load->view('BillingSoftware');
    }
    function complaintFeedback(){
        $this->load->view('ComplaintFeedback');
    }
    function audits(){
        $this->load->view('Audits');
    }
    function benchmarking(){
        $this->load->view('Benchmarking');
    }
    function recommendations(){
        $this->load->view('Recommendations');
    }
    function comparisions(){
        $this->load->view('Comparisions');
    }
    function carbonFootprint(){
        $this->load->view('CarbonFootprint');
    }
    function plans(){
        $this->load->view('Plans');
    }
    function engineering_Water(){
        $this->load->view('Engineering-Water');
    }
    function engineering_Energy(){
        $this->load->view('Engineering-Energy');
    }
    function engineering_AirConditioning(){
        $this->load->view('Engineering-AirConditioning');
    }
    function engineering_AirQuality(){
        $this->load->view('Engineering-AirQuality');
    }
    function engineering_SoftIntegration(){
        $this->load->view('Engineering-SoftIntegration');
    }
    function engineering_SpecializedSolutions(){
        $this->load->view('Engineering-SpecializedSolutions');
    }
    function machineryDetails(){
        $this->load->view('MachineryDetails');
    }
    function sanitation_Washroom(){
        $this->load->view('Sanitation-Washroom');
    }
    function sanitation_WasteManagement(){
        $this->load->view('Sanitation-WasteManagement');
    }
    function sanitation_PestControl(){
        $this->load->view('Sanitation-PestControl');
    }
    function sanitation_FacadeCleaning(){
        $this->load->view('Sanitation-FacadeCleaning');
    }
    function sanitation_Washroom_Details(){
        $this->load->view('Sanitation-Washroom-Details');
    }
    function inventorySanitation(){
        $this->load->view('InventorySanitation');
    }
    function inventorySanitationDetails(){
        $this->load->view('InventorySanitationDetails');
    }
    function attendenceCustomDate(){
        $this->load->view('AttendenceCustomDate');
    }
    function checklistDetails(){
        $this->load->view('ChecklistDetails');
    }
    function checklistDetails_electrical(){
        $this->load->view('ChecklistDetails_electrical');
    }
    function checklistDetails_elv(){
        $this->load->view('ChecklistDetails_elv');
    }
    function checklistDetails_fire(){
        $this->load->view('ChecklistDetails_fire');
    }
    function checklistDetails_hvac(){
        $this->load->view('ChecklistDetails_hvac');
    }
    function checklistDetails_phe(){
        $this->load->view('ChecklistDetails_phe');
    }
    function checklistSubDetails(){
        $this->load->view('ChecklistSubDetails');
    }
    function attendenceDeptDetail(){
        $this->load->view('AttendenceDeptDetail');
    }
    function bedsOccupancyDetails(){
        $this->load->view('BedsOccupancyDetails');
    }
    function audit_Observations(){
        $this->load->view('Audit-Observations');
    }
    function audit_Recommendations(){
        $this->load->view('Audit-Recommendations');
    }
    function amc_Observations(){
        $this->load->view('Amc-Observations');
    }
    function amc_Recommendations(){
        $this->load->view('Amc-Recommendations');
    }
    function floorPlans(){
        $this->load->view('FloorPlans');
    }
    function fireEvacuationPlans(){
        $this->load->view('FireEvacuationPlans');
    }
    function about(){
        $this->load->view('About');
    }
    function listView(){
        $limit = 25;
        $start = $this->uri->segment(4);
        $this->load->model('Hospital_model');
        
        $web_options = array(
            'start' => $start,
            'limit' => $limit,
            'order' => 'asc',
            'sort' => 'page_name',
            'search_keyword' => $this->input->get('search_keyword'),
            'status' => $this->input->get('status'),
            'category' => 'static'
        );
        $data_employees = $this->Hospital_model->get_employees($web_options);
        //echo json_encode($data_employees['rows']);die();
        $data['employees'] = $data_employees;
        $data['starting'] = $start;
        $data['limit'] = $limit;
        $config['total_rows'] = $data_employees['rows'];
        $config['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('HospitalAdmin_demo/listView');
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
		
        $this->load->view('ListView', $data);

        // $this->load->view('ListView');
    }
    function createEmployee(){
        
        $this->load->view('CreateEmployee');
    }
    function updateList(){
        $this->load->view('UpdateList');
    }
    function attendenceList(){
        $this->load->view('AttendenceList');
    }
    function checkListMobile(){
        $this->load->view('checkListMobile');
    }
    function departments(){
        $this->load->view('Departments');
    }
    public function remove_department($department_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hospital_model');
		// unlink('image/image_name.jpg');
        $this->Hospital_model->delete_department($department_id);
        $data['ddata']=$this->Hospital_model->get_departments(1);
        echo 1;
    }
    function get_department($id){
        $this->load->model('Hospital_model');
        $data=$this->Hospital_model->get_departments_byid(1,$id);
        echo json_encode($data);
    }
    function create_department() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hospital_model');
		
        $data['mode'] = 'create';
		
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('department_name', 'Department Name', 'trim|required');
        $this->form_validation->set_rules('department_sub_name', 'Department Sub Name', 'trim|required');
      
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        // echo $this->form_validation->run();die();
    //    echo $_POST['id'];die();
        if ($this->form_validation->run() == false) {
            $data['ddata']=$this->Hospital_model->get_departments(1);
            $this->load->view('ListViewDepartment', $data);
        }else{
			if( isset($_POST['id']) && $_POST['id']>0){
                $website_data = array(
                    'service_department_name' => $this->input->post('department_name'),
                    'service_sub_department_name' => $this->input->post('department_sub_name'),                             
                    'status' => 1,
                    //'created_by' => $this->session->userdata('user_id'),
                    'created_by' => 1,     
                    'created_time'=>date('Y-m-d H:i:s')			
                );
                $res = $this->Hospital_model->update_department($_POST['id'], $website_data);
                $data['ddata']=$this->Hospital_model->get_departments(1); 
                if ($res) {
                    $data['msg'] = 'Details Updated Succefully';
                    $this->load->view('ListViewDepartment', $data);
                } else {
                    $data['error'] = 'Failed to save details';
                    $this->load->view('ListViewDepartment', $data);
                }
            }else{
                if( isset($_POST['status']) ){
                    $status=1;
                }else{
                    $status=0;
                }
                
                $website_data = array(
                    'service_department_name' => $this->input->post('department_name'),
                    'service_sub_department_name' => $this->input->post('department_sub_name'),                             
                    'status' => $status,
                    //'created_by' => $this->session->userdata('user_id'),
                    'created_by' => 1,     
                    'created_time'=>date('Y-m-d H:i:s')			
                );
                $prevCount = $this->Hospital_model->getRows($this->input->post('department_name'),$this->input->post('department_sub_name'));
    
                if($prevCount > 0){
                // // Update member data
                // $condition = array('location' => $row['location'],
                // 	'data_date' => $row['Date']);
                // $update = $this->member->update($memData, $condition);
                $data['ddata']=$this->Hospital_model->get_departments(1);
    
                $data['error'] = 'Allready Department is there.';
                $this->load->view('ListViewDepartment', $data);
                }else{
                // Insert member data
                $res = $this->Hospital_model->insert_category($website_data);
                $data['ddata']=$this->Hospital_model->get_departments(1);
                if ($res) {
                    $data['msg'] = 'Details Saved Succefully';
                    //$this->session->set_flashdata('msg', $data['msg']);
                    $this->load->view('ListViewDepartment', $data);
                } else {
                    $data['error'] = 'Failed to save details';
                    $this->load->view('ListViewDepartment', $data);
                }
    
                }
            }
			
			
           // $res = $this->Hospital_model->insert_category($website_data);
            //$department_id = $this->db->insert_id();
			
           
		}
	
	}
    function ajax_sub_department_dropdown(){
        $this->load->model('Hospital_model');
        $department = $this->input->get('department');
        $content ='<option value="">  - Select Sub Department - </option>';
        $states = $this->Hospital_model->get_sub_department($department);            
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
    public function remove_employee($emp_id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hospital_model');
		// unlink('image/image_name.jpg');
        $this->Hospital_model->delete_employee($emp_id);
        //redirect('HospitalAdmin_demo/listView/');
        //$data['ddata']=$this->Hospital_model->get_departments(1);
        echo 1;
    }
    function create_employee() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hospital_model');
        $this->load->model('Upload_model');
        $data['gender'] = array('' => 'Select Gender','Male'=>'Male','Female'=>'Female','Other'=>'Other');
		$data['department'] = array('' => 'Select Department') + $this->Hospital_model->get_department_dropdown();
		if ($this->input->get('department') != '')
			{
				$data['sub_department'] = array('' => 'Select Sub Department') + $this->Hospital_model->
                get_sub_department($this->input->get('department'));
			} else
			{
				$data['sub_department'] = array();
			}
        $data['mode'] = 'create';
        $this->load->helper('form');
        //$this->load->helper('util');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('empname', 'Employee Name', 'trim|required');
        $this->form_validation->set_rules('empid', 'Employee ID', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email ID', 'trim|required');
        //$this->form_validation->set_rules('contact', 'Mobile Number', 'trim|required');
       
        
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        // echo $this->form_validation->run();die();
       if ($this->form_validation->run() == false) {
            $this->load->view('employee_form', $data);
        }else{
			// echo "<pre>";print_r($_FILES);exit;
            if ($this->input->post('empid') != '') {
            $this->db->select('');
            $this->db->where('emp_id', $this->input->post('empid'));
            $this->db->from('hospital_employees');
            $unique = $this->db->get()->num_rows();
                if ($unique>0) {
                $this->session->set_flashdata('error', 'User is already exist. Please enter another User');
                redirect(current_url());
                }
            }
			
			
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

                    $config['upload_path'] = 'asset/hospital_admin/employee_docs/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|xlsx|xls|doc|docx|csv|pdf|';
                    $config['max_size'] = '5000'; // max_size in kb
                    $config['file_name'] = 'employee_document_'.date('YmdHis').'_'.$_FILES['files']['name'][$i];

                    $this->load->library('upload',$config); 
                        if($this->upload->do_upload('file')){
                        
                            $uploadData = $this->upload->data();
                            
                            $filename = $uploadData['file_name'];

                            
                            $filenames[] = $filename;
                        }else{
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                                    redirect(current_url());
                            
                        }
                    }
                }
	            $files=implode(',',$filenames);
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
			

					
			$website_data = array(
                'emp_id' => $this->input->post('empid'),
                'name' => $this->input->post('empname'),                
                'email_id' => $this->input->post('email_id'),
                
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact'),
                'gender' => $this->input->post('gender'),
                'department' => $this->input->post('department'),
                'sub_department' => $this->input->post('sub_department'),
                'city' => $this->input->post('city'),
                'date_of_joining' => date("Y-m-d", strtotime($this->input->post('date_of_joining'))),   
                
                'doc' => $files,
                'profile_pic' => $image,
                'status' => $status,
				
				'created_by' => 1,
				'created_time'=>date('Y-m-d H:i:s')			
            );
// echo json_encode($website_data);die();
            $res = $this->Hospital_model->insert_employee($website_data);
			
            // $client_id = $this->db->insert_id;		
			
            if ($res) {
                $data['msg'] = 'Details Saved Succefully';
                $this->session->set_flashdata('msg', $data['msg']);
                redirect('HospitalAdmin_demo/create_employee/');
            } else {
                $data['error'] = 'Failed to save details';
                $this->load->view('employee_form', $data);
            }
		}
	
	}
    function edit_employee($e_id = '') {
       
		
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
			
			$fileold = $this->input->post('old_file');
			
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

          $config['upload_path'] = 'asset/admin/employee_docs/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif|xlsx|xls|doc|docx|csv|pdf|';
          $config['max_size'] = '5000'; // max_size in kb
          $config['file_name'] = 'employee_document_'.date('YmdHis').'_'.$_FILES['files']['name'][$i];
 
          $this->load->library('upload',$config); 
			
         
          if($this->upload->do_upload('file')){
           
            $uploadData = $this->upload->data();
			
            $filename = $uploadData['file_name'];

            
            $filenames[] = $filename;
          }else{
			  $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(current_url());
			  
		  }
        }
 
      }
	  if(count($filenames)>0){
		  $files=implode(',',$filenames);
		  if($fileold!=''){
			
			$new_files=$files.','.$fileold;
		  }else{
			$new_files=$files;  
		  }
	  }else{
		  $new_files=$fileold;
	  }
	  // echo $new_files;exit;

			// if($_FILES['file']['name'] !='')
			// {
				// $fileold = $this->input->post('old_file');			
				
				// if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){		 		
					// $file_upl_data = $this->Upload_model->uploadDocuments('file', 'employee_docs');						
					// if ($file_upl_data['success'] == 1)
					// {		
					// $filenew = $file_upl_data['file_name'];
					// }
					// else			
					// {
					// $this->session->set_flashdata('error', 'The file you are attempting to upload exceedes the maximum size.');
					// redirect(current_url());
					// }
				// }
				
				// $file= $fileold.','. $filenew;			
			// }
			// else
			// {
				// $file = $this->input->post('old_file');
			// }
			
			
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
					$this->session->set_flashdata('error', 'Please Upload gif | jpg | png | jpeg formates only');
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
			if($this->session->userdata('user_id')==1){
				$permission="";
			}else{
				$permission=implode(',',$this->input->post('permissions'));
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
                'permissions' => $permission,
                'doc' => $new_files,
                'profile_pic' => $image,
                'status' => $status,
				'department' => $this->input->post('department'),
				'updated_time'=>date('Y-m-d H:i:s')					
            );
			if($this->input->post('password')!=''){
               $website_data['password'] = md5($this->input->post('password'));
           }
		   
		   if ($this->input->post('username') != '') {
                $username = $this->input->post('username');
                $this->db->select('');
                $this->db->where('username', $this->input->post('username'));
                $this->db->where('emp_id !=', $e_id);
                $this->db->from('employees');
                $unique = $this->db->get();
                if ($unique->num_rows() == '0') {
                    $website_data['username'] = $username;
                } elseif ($unique->num_rows()>0) {
                    $this->session->set_flashdata('error', 'User is already exist. Please enter another User');
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
    function create_department_excel() {
        //modules::run('admin/site/auth','employee_modify');
        
        $this->load->model('Hospital_model');
         $file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");
			$c = 0;//
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				if($c>0){					/* SKIP THE FIRST ROW */
                    $departments = array(
                        'service_department_name' => $filesop[1],
                        'service_sub_department_name' => $filesop[2],                             
                        'status' => 1,
                        //'created_by' => $this->session->userdata('user_id'),
                        'created_by' => 1,     
                        'created_time'=>date('Y-m-d H:i:s')			
                    );
                    //echo json_encode($departments);die();
					$prevCount = $this->Hospital_model->getRows($filesop[1],$filesop[2]);

                    if($prevCount > 0){
                    // // Update member data
                    // $condition = array('location' => $row['location'],
                    // 	'data_date' => $row['Date']);
                    // $update = $this->member->update($memData, $condition);

                    }else{
                    // Insert member data
                    $this->Hospital_model->insert_category($departments);

                    }
				}
				$c = $c + 1;
			}
            $data['msg'] = 'sucessfully import data';
            
            $data['ddata']=$this->Hospital_model->get_departments(1);
            $this->load->view('ListViewDepartment', $data);
			//echo "sucessfully import data !";


	
	}
    function listViewDepartment(){
        $data['ddata']=$this->Hospital_model->get_departments(1);
        $this->load->view('ListViewDepartment', $data);
    }
    function listViewVacancy(){
        $this->load->view('ListViewVacancy');
    }
    function leadershipTeam(){
        $this->load->view('LeadershipTeam');
    }
    function bedsOccupancyFullDetails(){
        $this->load->view('BedsOccupancyFullDetails');
    }

    function complaintDashboard(){
		$this->load->view('web/ComplaintsNDashboard');
	}
    function complaintList(){
		$this->load->view('web/ComplaintsNList');
	}
    function complaintAttendence(){
		$this->load->view('web/ComplaintsNAttendance');
	}
    function complaintEReports(){
		$this->load->view('web/ComplaintsNEReport');
	}
    function complaintCReports(){
		$this->load->view('web/ComplaintsNCReport');
	}
    function complaintDetReports(){
		$this->load->view('web/ComplaintAttendenceDeptDetail');
	}
    function sanitation_Washroom_Full_Details(){
        $this->load->view('Sanitation-Washroom-Full-Details');
    }
}