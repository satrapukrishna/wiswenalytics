<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);


class HomeNew extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	public function index()
	{
		$this->load->view('dashboard');
	}
	
	public function energy()
	{
		$this->load->model('Api_data_model_new');
		$device_data=$this->Api_data_model_new->get_devices_list(6);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model_new->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model_new->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		
		// echo json_encode($hardwares['Energy Meter']['hardaware_list'][0]);die();
		
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model_new->get_hardwares_device_data_energy_meters($hardwares['Energy Meter']['hardaware_list'][0]);
			}
			// echo json_encode($data['energy_meters_data']);die();
			//$data['energy_meters_data']=array();
			
			//$this->load->view('energy-dashboard_chennai',$data);
			$this->load->view('energy-dashboard_new_design1',$data);
		
		
		
	}
	
	
	function all_reports_new(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model_new');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model_new->get_hardware_category_dropdown_chennai();
		$device_id=$this->input->post('report');
		$data['radio']=$this->input->post('report_type');
		$data['m1']=$device_id;
		if(!empty($_POST)){
			$data['data']=$this->input->post();
		}else{
			$data['data']=array('solution'=>0);
		}
		
		if ($this->input->post('category') != '')
			{
				if($this->input->post('report_type')==0){
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model_new->
				get_devices_chennai_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model_new->
				get_devices_chennai($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model_new->
					get_devices_chennai_tab("");
			}
			
		
			if ($this->input->post('device') != '')
			{		
				$rdata=array(
				'category'=>$this->input->post('category'),
				'solution'=>$this->input->post('device'),
				'device'=>"",
				'report_type'=>$this->input->post('report_type')
				);
				//print_r($rdata);exit;
				$data['report'] =  array('' => 'Select Report') + $this->Api_reports_data_model->get_reports_dropdown($rdata);
				//echo "<pre>";print_r($data['report']);exit;
			}
				
		//flowmeter start	
		$this->load->model('Api_data_model_new');
		$device_data=$this->Api_data_model_new->get_devices_list($this->input->post('category'));
		
		//
		for ($i=0; $i < count($device_data) ; $i++) { 

			$device_name=$this->Api_data_model_new->get_device_name($device_data[$i]['hardware_device']);
			
			$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model_new->get_hardwares_device_list1($device_data[$i]['hardware_device']);
			

		}
		
		
		
		if($data['data']['device']==41){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model_new->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['energydata']=$energydat;
			}
			
		}
		if($data['data']['device']==57){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model_new->get_hardwares_device_data_energymeter_current_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['current']=$energydat;
			}
			
		}
		if($data['data']['device']==58){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model_new->get_hardwares_device_data_energymeter_voltage_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['voltage']=$energydat;
			}
			
		}
		if($data['data']['device']==51){
			$data['power_factor_data']=$this->Api_data_model_new->get_hardwares_device_data_power_factor_report($this->input->post('fromdate'),$this->input->post('todate'));
		}
	
		
		 
		 $this->load->view('all_reports_new',$data);
	}
	
	
	function ajax_hardware_device_dropdown(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
        $states = $this->Hardware_category_model_new->get_devices($category);            
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_demo(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
        $states = $this->Hardware_category_model_new->get_devices_demo($category);            
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_chennai(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model_new->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_chennai_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_chennai($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_vega(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model_new->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_vega_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_vega($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_rainbow(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
		//echo $category;die();
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model_new->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_rainbow_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_rainbow($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;die();
    }
	function ajax_hardware_device_dropdown_rainbow_cat(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
		//echo $category;die();
        $content ='<option value=""> Select Category </option>';
       // $states = $this->Hardware_category_model_new->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_hardware_category_dropdown_rainbow_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_hardware_category_dropdown_rainbow_graph($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;die();
    }
	function ajax_hardware_device_dropdown_lona(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_lona_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_lona($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_mumbai(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_mumbai_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_mumbai($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_iit(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_iit_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_iit($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_rsbro(){
        $this->load->model('Hardware_category_model_new');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model_new->get_devices_rsbro_tab($category);  
		}else{
			$states = $this->Hardware_category_model_new->get_devices_rsbro($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	
	
	function ajax_hardware_dropdown(){
        $this->load->model('Hardware_model');
        $category = $this->input->get('category');
        $solution = $this->input->get('solution');
        $content ='<option value=""> Select Device </option>';
        $res = $this->Hardware_model->get_category_solution_hardwares_dropdown($category,$solution);   
			//echo "<pre>";print_r($res);exit;
		foreach ($res as $sid=>$state){
			$content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        
        echo $content;
    }
	
	function ajax_report_dropdown(){
        $this->load->model('Api_reports_data_model');
        $category = $this->input->get('category');
        $solution = $this->input->get('solution');
        $device = $this->input->get('device');
        $report_type = $this->input->get('report_type');
		if($solution!=''){
			$content ='<option value=""> Select Report </option>';
			$rdata=array(
			'category'=>$category,
			'solution'=>$solution,
			'device'=>$device,
			'report_type'=>$report_type
			);
			$res = $this->Api_reports_data_model->get_reports_dropdown($rdata);       
			foreach ($res as $sid=>$row){
			  $content .='<option value="'. $sid .'">'. $row .'</option>';
			}
			echo $content;
		}
    }


	function addwatermeter(){
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model_new');
		
		$data['meters'] = array('' => 'Select Meter') + $this->Hardware_category_model_new->get_hardware();

		$this->load->view('addwatermeter',$data);
	}
	function watermeterDashboard(){
		$date=$this->input->post('date');
		//echo $date;die();
		$this->load->model('Api_data_model_new');
		$data['water_meter_data_times']=$this->Api_data_model_new->get_water_meter_data($date);
		// echo json_encode($data['water_meter_data_times']);die();
		$update=$this->Api_data_model_new->update_water_readings($_POST);
		if(!empty($_POST)){
			//$this->load->model('Api_data_model_new');
			$data['water_meter_data']=$this->Api_data_model_new->get_water_readings($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('watermeter_magement',$data);

		}else{
			//$this->load->model('Api_data_model_new');
			$data['water_meter_data']=$this->Api_data_model_new->get_water_readings($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('watermeter_magement',$data);
		}
		


	}
	function rainbowMainDashboard(){
		$date=$this->input->post('d_date');
		//echo $date;die();
		$this->load->model('Api_data_model_new_rainbow');
		
		if(!empty($_POST)){
			//$this->load->model('Api_data_model_new');
			$data['rainbow_main_data']=$this->Api_data_model_new_rainbow->rainbow_main_data($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard',$data);

		}else{
			//$this->load->model('Api_data_model_new');
			$data['rainbow_main_data']=$this->Api_data_model_new_rainbow->rainbow_main_data($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard',$data);
		}
		


	}
	function waterMeterReadingUpdate(){
		$this->load->model('Api_data_model_new');
		$update=$this->Api_data_model_new->update_water_readings($_POST);
		$date='';
		    $this->load->model('Api_data_model_new');
			$data['water_meter_data']=$this->Api_data_model_new->get_water_readings($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('watermeter_magement',$data);
	}
	function getWaterMeterReadingAjax(){
		$this->load->model('Api_data_model_new');
		$meter_id = $this->input->get('meter_id');
        $date = $this->input->get('today');
		$data=$this->Api_data_model_new->get_water_readings_ajax($date,$meter_id);
		echo json_encode($data);

	}
	
	function addschedule(){
       //print_r($_POST);die();
	   $this->load->model('Hardware_model');
	   $schedule=$this->input->post('schedule');
	   for ($i=1; $i <= $schedule; $i++) { 

		  $pdata=array(
			'meter_id'=>$this->input->post('hardware'),
			'schedule'=>'Reading '.$i,
			'from_reading'=>$this->input->post('from'.$i),
			'to_reading'=>$this->input->post('to'.$i),
			'emp_id'=>$this->session->userdata('user_id'),
			'client_id'=>$this->session->userdata('created_by'),	
			'created_date'=>date('Y-m-d H:i:s'),
			'updated_date'=>date('Y-m-d H:i:s')

			);
			//echo "<pre>";print_r($pdata);
			$res = $this->Hardware_model->add_watermeter_schedule($pdata);
			
            //$client_id = $this->db->insert_id();
	   }
	   //echo $res;exit();
	   $this->session->set_flashdata('msg', 'Schedue Added Successfully');

	   redirect('Admin/Home/waterMeterList');
	   

	   //$this->load->view('water_meter_list');

		
	}
	function waterMeterList(){
		$mtrid=$this->input->post('hardware');
		$this->load->model('Hardware_model');
		

		$this->load->model('Hardware_category_model_new');
		$data['hardwares'] = array('' => 'All Water Meter') + $this->Hardware_category_model_new->get_hardware();
		$data['meters']=$this->Hardware_model->get_watermeter_schedule($mtrid);
		$this->load->view('water_meter_list',$data);
		
		
	}
	public function remove_schedule($id) {
		
        //modules::run('admin/site/auth','employee_modify');
        $this->load->model('Hardware_model');
        $this->Hardware_model->delete_schedule($id);
        echo 1;
    }

	function editschedule($sid){
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model_new');
		
		$data['meters'] = array('' => 'Select Meter') + $this->Hardware_category_model_new->get_hardware();
		$data['scheduled'] = $this->Hardware_model->get_watermeter_sche($sid);
		
            $this->load->view('editwatermeter',$data);
		
	}

	function updateschedule($sid){
		$this->load->model('Hardware_model');
		
 
		   $pdata=array(
			 'meter_id'=>$this->input->post('hardware'),
			 'from_reading'=>$this->input->post('from'),
			 'to_reading'=>$this->input->post('to'),
			 'updated_date'=>date('Y-m-d H:i:s')
 
			 );
			 //echo "<pre>";print_r($pdata);
			 $res = $this->Hardware_model->update_watermeter_schedule($sid,$pdata);
			 
			
		$this->session->set_flashdata('msg', 'Schedue Updated Successfully');
 
		redirect('Admin/Home/waterMeterList');
	}
	
	
	
	
}
