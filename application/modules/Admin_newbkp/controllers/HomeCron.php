<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);
ini_set('memory_limit', '-1');
class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
       
	}
	
	
	function vegas_cron(){
		$this->load->model('Api_data_model');
		$this->Api_data_model->get_hardwares_device_data_energymeter_report_vega_cron();
	}
	function all_reports_undp(){
		
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_undp();
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
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_vega_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_vega($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_vega_tab("");
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
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(6);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		// echo json_encode($hardwares);die();
		//if(isset($hardwares['DG']['hardaware_list'][0])){
       
			if($data['data']['device']==41){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report_undp($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['energydata']=$energydat;
				}
				
			}
			if($data['data']['device']==57){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_current_report_undp($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['current']=$energydat;
				}
				
			}
			
			if($data['data']['device']==58){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_voltage_report_undp($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['voltage']=$energydat;
				}
				
			}
			// echo json_encode($data['voltage']);die();
			if($data['data']['device']==51){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_power_factor_report_undp($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['power_factor_data']=$energydat;
				}
				
			}
			if($data['data']['device']==16){
				
				$meters = $this->Api_data_model->getHavcList_vega('hardware_station_consumption_data_vegaschool_live');

				$data['ahudata']=$this->Api_data_model->getahuReportVegas($meters,$this->input->post('fromdate'),'hardware_station_consumption_data_vegaschool_live','hardware_station_consumption_data_vegaschool');
			}
		
			//if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				// $data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters_vegas($hardwares['Energy Meter']['hardaware_list'][0]);
				//$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters_vegas_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
			//}
		
		// echo json_encode( $data['ahudata']);die();
		
		 $this->load->view('all_reports_undp',$data);
	}
	
	
	function ajax_hardware_device_dropdown(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
        $states = $this->Hardware_category_model->get_devices($category);            
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_demo(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
        $states = $this->Hardware_category_model->get_devices_demo($category);            
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_chennai(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_chennai_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_chennai($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_vega(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_vega_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_vega($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_undp(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_undp_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_vega($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_rainbow(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
		//echo $category;die();
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_rainbow_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_rainbow($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;die();
    }
	function ajax_hardware_device_dropdown_rainbow_cat(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
		//echo $category;die();
        $content ='<option value=""> Select Category </option>';
       // $states = $this->Hardware_category_model->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_hardware_category_dropdown_rainbow_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_hardware_category_dropdown_rainbow_graph($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;die();
    }
	function ajax_hardware_device_dropdown_lona(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_lona_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_lona($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_mumbai(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_mumbai_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_mumbai($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_iit(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_iit_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_iit($category);  
		}
                  
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_rsbro(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_rsbro_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_rsbro($category);  
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


}
