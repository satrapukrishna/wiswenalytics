<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);
ini_set('memory_limit', '-1');
class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	public function index()
	{
		//echo "aaaa";exit;
		$this->load->model('Api_data_model');
		$data['categories']=$this->Api_data_model->get_categories();
		echo "<pre>";print_r($data['categories']);exit;
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		
		// echo "<pre>";print_r($data['firepump_id']);exit;
		// $line_pressure=$this->Api_data_model->get_firepumpdata(9,'Pressure Sensor');
		// $line_pressure=$this->Api_data_model->get_firepumpdata(10,'Pressure Sensor');
		// $data['line_pressure']=$line_pressure;
		// $j=0;
		// foreach($line_pressure->result() as $rec){
			// $data1[]=$this->Api_data_model->getPressureToday($rec->LineConnected);			
			// for($i=0;count($data1[$j])>$i;$i++){
				// $data['pdata'][$rec->LineConnected]['readings'][$i]=$data1[$j][$i]->CurReading;
				// $data['pdata'][$rec->LineConnected]['timings'][$i]=$data1[$j][$i]->ToTime;				
			// }			
		// $j++;
		// }

		
		// echo "<pre>";print_r($data['dgdata']);exit;
		
		
		$this->load->view('dashboard',$data);
	}
	public function waterQuality(){
		$this->load->view('water-quality');
	}
	public function getdata(){
		echo "string";
	}
	function rainbow_dashboard() {
		$date=$this->input->post('d_date');
		//echo $date;die();
		$this->load->model('Api_data_model_rainbow');
		
		if(!empty($_POST)){
			//$this->load->model('Api_data_model');
			$data['rainbow_main_data']=$this->Api_data_model_rainbow->rainbow_main_data($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard',$data);

		}else{
			$yesterDay = "2022-02-28";
			// $yesterDay = date('Y-m-d',strtotime("-1 days"));

			//$this->load->model('Api_data_model');
			$data['rainbow_main_data']=$this->Api_data_model_rainbow->rainbow_main_data($yesterDay);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard',$data);
		}
	}
	function rainbow_dashboard_usa() {
		$date=$this->input->post('d_date');
		//echo $date;die();
		$this->load->model('Api_data_model_rainbow');
		
		if(!empty($_POST)){
			//$this->load->model('Api_data_model');
			$data['rainbow_main_data']=$this->Api_data_model_rainbow->rainbow_main_data($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard_usa',$data);

		}else{
			$yesterDay = "2022-02-28";
			// $yesterDay = date('Y-m-d',strtotime("-1 days"));

			//$this->load->model('Api_data_model');
			$data['rainbow_main_data']=$this->Api_data_model_rainbow->rainbow_main_data($yesterDay);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard_usa',$data);
		}
	}
	function all_reports_dynamic(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
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
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices($this->input->post('category'));
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices("");
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
				
		

		   // print_r($data['data']);die();
		 $this->load->view('all_reports',$data);
	}
	function waterMeterData_unicef(){
		$this->load->model('Api_data_model_unicef');
		
		$meter_list=$this->Api_data_model_unicef->get_water_meters(2024000527);
		// echo json_encode($meter_list);die();
			for ($i=0; $i <count($meter_list) ; $i++) { 
				$flowmeterdata[$i]=$this->Api_data_model_unicef->get_hardwares_device_data_flowmeter_unicef($meter_list[$i]['MeterName'],2024000527);
			}
			$data['water_meter_data']=$flowmeterdata;
		
		
		//echo json_encode($flowmeterdata);die();
		 $dps1=array();
		
		for($k=0;$k<count($flowmeterdata);$k++){
			$dps1[$k]['meter']=$flowmeterdata[$k]['meter'];
			
			$tot=0;
			for ($i=0; $i < count($flowmeterdata[$k]['monthly_data']); $i++) { 
				$dps1[$k]['dates'][$i]=$flowmeterdata[$k]['monthly_data'][$i]['date'];				
				$dps1[$k]['conses'][$i]=(int)$flowmeterdata[$k]['monthly_data'][$i]['con'];						
				
			}
		}
		$data['water_meter_data_month']=$dps1;
		//echo json_encode($flowmeterdata);die();
		//echo json_encode($dps1);die();
			echo json_encode($data);
			//$data['water_meter_data']=$flowmeterdata;
		
	}
	function waterMeterData(){
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(5);
		
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}
// print_r($hardwares);die();
		if(isset($hardwares['Water Meter']['hardaware_list'])){
			for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
				$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter($hardwares['Water Meter']['hardaware_list'][$i]);
			}
			$data['water_meter_data']=$flowmeterdata;
		}
		
		//echo json_encode($flowmeterdata);die();
		 $dps1=array();
		
		for($k=0;$k<count($flowmeterdata);$k++){
			$dps1[$k]['meter']=$flowmeterdata[$k]['meter'];
			
			$tot=0;
			for ($i=0; $i < count($flowmeterdata[$k]['monthly_data']); $i++) { 
				$dps1[$k]['dates'][$i]=$flowmeterdata[$k]['monthly_data'][$i]['date'];				
				$dps1[$k]['conses'][$i]=(int)$flowmeterdata[$k]['monthly_data'][$i]['con'];						
				
			}
		}
		$data['water_meter_data_month']=$dps1;
		//echo json_encode($flowmeterdata);die();
		//echo json_encode($dps1);die();
			echo json_encode($data);
			//$data['water_meter_data']=$flowmeterdata;
		
	}
	function water(){
		
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(5);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		
	
		if($this->session->userdata('created_by')==20 || $this->session->userdata('created_by')==23){
			
		  if(count($hardwares['Water Level']['hardaware_list'])>0){
				for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
					$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][$i]);
				}		
			$data['waterlevel_data']=$waterleveldata;
			}
			
		if(isset($hardwares['Borewells']['hardaware_list'])){
			for ($i=0; $i <count($hardwares['Borewells']['hardaware_list']) ; $i++) { 
				$borewelldata[$i]=$this->Api_data_model->get_hardwares_device_data_borewell($hardwares['Borewells']['hardaware_list'][$i]);
			}
			// echo json_encode($waterleveldata);die();
			$data['borewell_data']=$borewelldata;
		}
		
		if(isset($hardwares['Firepump']['hardaware_list'])){
			for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
				$firepumpdata[$hardwares['Firepump']['hardaware_list'][$i]['dashboard_name']]=$this->Api_data_model->get_hardwares_device_data_firepump($hardwares['Firepump']['hardaware_list'][$i]);
			}
			// echo json_encode($firepumpdata);die();

			// echo json_encode($firepumpdata['Phase-2 Fire Pump System']['dg_data']);die();
			$data['firepump_data']=$firepumpdata;
		}
		if(isset($hardwares['Hydro Pnematic System']['hardaware_list'])){
			for ($i=0; $i <count($hardwares['Hydro Pnematic System']['hardaware_list']) ; $i++) { 
				$hydrodata[$hardwares['Hydro Pnematic System']['hardaware_list'][$i]['dashboard_name']]=$this->Api_data_model->get_hardwares_device_data_hydro($hardwares['Hydro Pnematic System']['hardaware_list'][$i]);
			}
			
			//   echo json_encode($hydrodata);die();
			$data['hydro_data']=$hydrodata;
		}
		// echo json_encode($data);die();
			$this->load->view('water-dashboard-chennai',$data);
		}else if($this->session->userdata('created_by')==42){
			$this->load->view('water-dashboard-unicef');
		}else{
			 //echo json_encode($hardwares);die();
					// if(isset($hardwares['Flow Meter']['hardaware_list'])){
					// 	for ($i=0; $i <count($hardwares['Flow Meter']['hardaware_list']) ; $i++) { 
					// 		$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter($hardwares['Flow Meter']['hardaware_list'][$i]);
					// 	}
					// 	$data['flowmeter_data']=$flowmeterdata;
					// }
					// if(isset($hardwares['Water Meter']['hardaware_list'])){
					// 	for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
					// 		$watermeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_watermeter($hardwares['Water Meter']['hardaware_list'][$i]);
					// 	}
					// 	$data['watermeter_data']=$watermeterdata;
					// 	// echo json_encode($watermeterdata);die();
					// }
					if(isset($hardwares['Water Level']['hardaware_list'])){
					//if(count($hardwares['Water Level']['hardaware_list'])>0){
					for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
						$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][$i]);
					}
					// echo json_encode($waterleveldata);die();
					$data['waterlevel_data']=$waterleveldata;
				}
				// if(isset($hardwares['Borewells']['hardaware_list'])){
				// 	for ($i=0; $i <count($hardwares['Borewells']['hardaware_list']) ; $i++) { 
				// 		$borewelldata[$i]=$this->Api_data_model->get_hardwares_device_data_borewell($hardwares['Borewells']['hardaware_list'][$i]);
				// 	}
				// 	// echo json_encode($waterleveldata);die();
				// 	$data['borewell_data']=$borewelldata;
				// }
				if(isset($hardwares['Wate Level(Independent)']['hardaware_list'])){
					for ($i=0; $i <count($hardwares['Wate Level(Independent)']['hardaware_list']) ; $i++) { 
						$waterlevelinddata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter($hardwares['Wate Level(Independent)']['hardaware_list'][$i]);
					}
					
					$data['waterlevel_independent_data']=$waterlevelinddata;
				}
				
				
				// if(isset($hardwares['Firepump']['hardaware_list'])){
				// 	for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
				// 		$firepumpdata[$hardwares['Firepump']['hardaware_list'][$i]['dashboard_name']]=$this->Api_data_model->get_hardwares_device_data_firepump($hardwares['Firepump']['hardaware_list'][$i]);
				// 	}
					
				// 	//  echo json_encode($firepumpdata);die();
				// 	$data['firepump_data']=$firepumpdata;
				// }
				// if(isset($hardwares['Hydro Pnematic System']['hardaware_list'])){
				// 	for ($i=0; $i <count($hardwares['Hydro Pnematic System']['hardaware_list']) ; $i++) { 
				// 		$hydrodata[$i]=$this->Api_data_model->get_hardwares_device_data_hydro($hardwares['Hydro Pnematic System']['hardaware_list'][$i]);
				// 	}
					
				// 	//echo json_encode($hydrodata[0]['pressure_data']);die();
				// 	$data['hydro_data']=$hydrodata;
				// }
			$this->load->view('water-dashboard',$data);
		}
		
	}
	function rainbow_water(){
		$id=$this->input->get('id');
		$loc=$this->input->get('loc');
		$data['id']=$id;
		$data['loc']=$loc;
		//print_r($_GET);
		//echo $id."--".$loc;die();
		$this->load->model('Api_data_model_rainbow');
		$device_data=$this->Api_data_model_rainbow->get_devices_list(5);
		$device_data_konda=$this->Api_data_model_rainbow->get_devices_list_konda(5);
		//print_r($device_data_konda);die();
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list_vikram']=$this->Api_data_model_rainbow->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}if(count($device_data_konda)>0){
			for ($i=0; $i < count($device_data_konda) ; $i++) { 
				
				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data_konda[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list_konda']=$this->Api_data_model_rainbow->get_hardwares_device_list1_konda($device_data_konda[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list_vikram']=array();
			//echo "No Hardware data";
		}
		//echo json_encode($hardwares);die();
	
		  if(count($hardwares['Water Level']['hardaware_list_vikram'])>0){
				for ($i=0; $i <count($hardwares['Water Level']['hardaware_list_vikram']) ; $i++) { 
					$waterleveldata[$i]=$this->Api_data_model_rainbow->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list_vikram'][$i]);
				}		
			$data['waterlevel_data']=$waterleveldata;
			}
			if(count($hardwares['Water Level']['hardaware_list_konda'])>0){
				for ($i=0; $i <count($hardwares['Water Level']['hardaware_list_konda']) ; $i++) { 
					$waterleveldata_konda[$i]=$this->Api_data_model_rainbow->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list_konda'][$i]);
				}		
			$data['waterlevel_data_konda']=$waterleveldata_konda;
			}
			// die();
			// echo json_encode($hardwares['Water Level']['hardaware_list_konda']);die();
		    
			$this->load->view('water-dashboard-rainbow',$data);
		
		
	}
	function rainbow_kondapur_water(){
		
		$this->load->model('Api_data_model_rainbow');
		$device_data=$this->Api_data_model_rainbow->get_devices_list(5);
		$device_data_konda=$this->Api_data_model_rainbow->get_devices_list(5);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list_vikram']=$this->Api_data_model_rainbow->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}if(count($device_data_konda)>0){
			for ($i=0; $i < count($device_data_konda) ; $i++) { 
				
				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data_konda[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list_konda']=$this->Api_data_model_rainbow->get_devices_list_konda($device_data_konda[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list_vikram']=array();
			//echo "No Hardware data";
		}
		
	
		  if(count($hardwares['Water Level']['hardaware_list_vikram'])>0){
				for ($i=0; $i <count($hardwares['Water Level']['hardaware_list_vikram']) ; $i++) { 
					$waterleveldata[$i]=$this->Api_data_model_rainbow->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list_vikram'][$i]);
				}		
			$data['waterlevel_data']=$waterleveldata;
			}
			if(count($hardwares['Water Level']['hardaware_list_konda'])>0){
				for ($i=0; $i <count($hardwares['Water Level']['hardaware_list_konda']) ; $i++) { 
					$waterleveldata_konda[$i]=$this->Api_data_model_rainbow->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list_konda'][$i]);
				}		
			$data['waterlevel_data_konda']=$waterleveldata_konda;
			}
		
			$this->load->view('water-dashboard-rainbow',$data);
		
		
	}
	function firepump(){
		$this->load->view('firepump_dashboard');
	}
	function essential(){
		$this->load->view('essential_dashboard');
	}
	public function energy()
	{
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
		// echo json_encode($hardwares['DG']['hardaware_list']);die();
		if(isset($hardwares['DG']['hardaware_list'][0])){
        for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
			// echo "kj";
			$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data($hardwares['DG']['hardaware_list'][$i]);
		}
		$data['dg_data']=$dgdata;
	    }
		
		// echo json_encode($data['dg_data']);
		// echo json_encode($hardwares['Power Supply']['hardaware_list']);die();
		if(isset($hardwares['Power Supply']['hardaware_list'][0])){
		for ($i=0; $i <count($hardwares['Power Supply']['hardaware_list']) ; $i++) { 
			$powerdata[$i]=$this->Api_data_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
		}
		$data['power_data']=$powerdata;
		}
		// echo json_encode($hardwares['DG']['hardaware_list']);die();
		$data['lpg']=6;
		$data['dg']=7;
		$data['ups']=8;
		
		
		if($this->session->userdata('created_by')==20){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters($hardwares['Energy Meter']['hardaware_list'][0],$hardwares['Energy Meter']['hardaware_list']);
			}
			//$data['energy_meters_data']=array();
			
			$this->load->view('energy-dashboard_chennai',$data);
		}else{
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters($hardwares['Energy Meter']['hardaware_list'][0],$hardwares['Energy Meter']['hardaware_list']);
			}
			$this->load->view('energy-dashboard_dynamic',$data);
		}
		
		
	}
	public function energy_vega()
	{
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
       
		
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters_vegas($hardwares['Energy Meter']['hardaware_list'][0]);
			}
			//$data['energy_meters_data']=array();
			
			$this->load->view('energy-dashboard_dynamic_vega',$data);
		
		
	}
	public function energy_vegasschool()
	{
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
	
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters_vegasschool($hardwares['Energy Meter']['hardaware_list'][0]);
			}
			//$data['energy_meters_data']=array();
			
			$this->load->view('energy-dashboard_vegas',$data);
		
	}
	public function energy_undp()
	{
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
	
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters_undp($hardwares['Energy Meter']['hardaware_list'][0]);
			}
			//$data['energy_meters_data']=array();
			// echo json_encode($data['energy_meters_data']);die();
			$this->load->view('energy-dashboard_undp',$data);
		
	}
	public function energy_unicef()
	{
		$this->load->model('Api_data_model_unicef');
		$device_data=$this->Api_data_model_unicef->get_devices_list(6);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model_unicef->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model_unicef->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		// echo json_encode($hardwares['Energy Meter']['hardaware_list']);die();
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model_unicef->get_hardwares_device_data_energy_meters_unicef($hardwares['Energy Meter']['hardaware_list'][0]);
			}
			//$data['energy_meters_data']=array();
			// echo json_encode($data['energy_meters_data']);die();
			$this->load->view('energy-dashboard_unicef',$data);
		
	}
	public function energy_rsbrother()
	{
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list_rsbros();
		$l=0;
			$n=0;
        for ($i=0; $i <count($device_data) ; $i++) { 
			// echo json_encode($device_data[0]['station_id']);die();
			
			if($device_data[$i]['from']=='wis'){
				$dgdata['wis'][$l]=$this->Api_data_model->get_hardwares_device_data_dg_rsbro($device_data[$i]);
				$l++;
			}else{
				//$dgdata['chk'][$n]=$this->Api_data_model->get_hardwares_device_data_dg_rsbro_chk($device_data[$i]);
				
				//$n++;
				//$dgdata['chk'][$n]=[];
				//$n++;
			}
			
		}
		$data['dg_data']=$dgdata;
	    
		// echo json_encode($dgdata);die();
		$this->load->view('energy-dashboard_dynamic_rsbro',$data);
		
		
	}
	public function rainbow_energy()
	{
		$id=$this->input->get('id');
		$loc=$this->input->get('loc');
		$data['id']=$id;
		$data['loc']=$loc;
		$this->load->model('Api_data_model_rainbow');
		$device_data=$this->Api_data_model_rainbow->get_devices_list(6);
		$device_data_konda=$this->Api_data_model_rainbow->get_devices_list_konda(6);
		//print_r($device_data_konda);die();
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list_vikram']=$this->Api_data_model_rainbow->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}if(count($device_data_konda)>0){
			for ($i=0; $i < count($device_data_konda) ; $i++) { 
				
				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data_konda[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list_konda']=$this->Api_data_model_rainbow->get_hardwares_device_list1_konda($device_data_konda[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list_vikram']=array();
			//echo "No Hardware data";
		}
		
		
		
			if(isset($hardwares['Energy Meter']['hardaware_list_vikram'][0])){
				$data['energy_meters_data']=$this->Api_data_model_rainbow->get_hardwares_device_data_energy_meters($hardwares['Energy Meter']['hardaware_list_vikram'][0]);
			}
			if(isset($hardwares['Energy Meter']['hardaware_list_konda'][0])){
				$data['energy_meters_data_konda']=$this->Api_data_model_rainbow->get_hardwares_device_data_energy_meters_kondapur($hardwares['Energy Meter']['hardaware_list_konda'][0]);
			}
			//$data['energy_meters_data']=array();
			// $data['id']=$id;
			$this->load->view('energy-dashboard_rainbow',$data);
		
		
		
	}
	function switchcontrol(){
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(11);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		//echo json_encode($hardwares);die();
		if(isset($hardwares['Switch Control']['hardaware_list'][0])){
		for ($i=0; $i <count($hardwares['Switch Control']['hardaware_list']) ; $i++) { 
			$scdata[$i]=$this->Api_data_model->get_hardwares_device_data_switch_control($hardwares['Switch Control']['hardaware_list'][$i]);
		}
		$data['switchcontrol_data']=$scdata;
	}
		//echo json_encode($scdata);die();
		
		
		if($this->session->userdata('created_by')==20){
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);
			// echo json_encode($data['switch_status_data']);die();
			$this->load->view('switch_control_chennai',$data);
		}else if($this->session->userdata('created_by')==34){
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status_iit($hardwares['Switch Status']['hardaware_list'][0]);
			$this->load->view('switch_control_iit',$data);
		}else if($this->session->userdata('created_by')==39){
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status_hcug($hardwares['Switch Status']['hardaware_list'][0]);
			// echo json_encode($data['switch_status_data']);die();
			$this->load->view('switch_control_hcug',$data);
		}else{
			$this->load->view('switch_control',$data);
		}
	}
	function switchcontrol_one(){
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(10);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		//echo json_encode($hardwares);die();
		// for ($i=0; $i <count($hardwares['Switch Control']['hardaware_list']) ; $i++) { 
		// 	$scdata[$i]=$this->Api_data_model->get_hardwares_device_data_switch_control($hardwares['Switch Control']['hardaware_list'][$i]);
		// }
		
		
		
		if($this->session->userdata('created_by')==20){
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);
			$this->load->view('switch_control_chennai',$data);
		}else{
			$data['switchcontrol_data']=$this->Api_data_model->get_hardwares_device_data_switch_control($hardwares['Switch Control']['hardaware_list'][0]);
		// echo json_encode($data['switchcontrol_data']);die();
			$this->load->view('switch_control',$data);
		}
	}
	function reports($device_id='',$status=''){
		
		
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device_id']=$device_id;
		$data['status']=$status;
		
		$data['device']=$this->Api_reports_data_model->get_device($device_id);
		$hardware=$this->Api_reports_data_model->get_hardwares($device_id);
		foreach($hardware as $rec){
			$item[$rec['api_name']]=$rec['api_name'];
		}
		$data['hardware']=$item;
		// echo "<pre>";print_r($device);exit;
		if($status=='Running_hours'){
        $this->load->view('running_report1',$data);
		}else{
        $this->load->view('graph_report1',$data);
		}
       
		
	}
	
	function reports_search($device_id=''){
		
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device']=$this->Api_reports_data_model->get_device($device_id);
		$hardware=$this->Api_reports_data_model->get_hardwares($device_id);
		foreach($hardware as $rec){
			$item[$rec['api_name']]=$rec['api_name'];
		}
		$data['hardware']=$item;
		$data['device_id']=$device_id;
		// echo "<pre>";print_r($data['hardware']);exit;
		if($device_id!=3){
			$data['running_data']=$this->Api_reports_data_model->getChillerReportData($this->input->post());
		}else{
			$firepumps=$this->Api_data_model->get_hardwares(1,$device_id);
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			// $data['running_data']=$rdata;
		}
		
		if(isset($_POST['export'])){
			// echo "ssqss";exit;
            $i = 1;
			if($device_id!=3){
				$list[] = array('Sno', 'Meter', 'Date/Hours','Running Hours');
				foreach ($data['running_data'] as $row) {
					$t = $row['runninghrs'];
					$h = floor($t/60) ? floor($t/60) .' Hours' : '0 Hours';
					$m = $t%60 ? $t%60 .' Min' : '0 Min';
					$hrs=$h && $m ? $h.' '.$m : $h.$m;
									
					$list[] = array($i++,
						$row['Meter'],
						$row['Time'],
						$hrs
					);
				}
				// echo "<pre>";print_r($list);exit;
			}else{
				$list1 = array('Sno', 'Date');
				
				for($y=0;$y<count($data['running_data'][0]);$y++){
					array_push($list1,$data['running_data'][0][$y]['meter']);
					// $list[]=$data['running_data'][0][$y]['meter'];
					// $list.push
				}
				$new_list[]=$list1;
				for($x=0;$x<count($data['running_data']);$x++){	
					$new_list1 = array($i++,
						$data['running_data'][$x][0]['date']						
					);
					for($y=0;$y<count($data['running_data'][$x]);$y++){									
						array_push($new_list1,$data['running_data'][$x][$y]['RunningHours']);
					}
					$new_list2[]=$new_list1;
					
				}
				$list=array_merge($new_list,$new_list2);
				// echo "<pre>";print_r($new_list);
				// echo "<pre>";print_r($new_list2);exit;
				
			}
            $file_name = $data['device']['device_name'].'_RunningReports-' . date('YmdHis') . '.csv';
            $fp = fopen('asset/admin/reports/' . $file_name, 'w');
            foreach ($list as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            redirect('asset/admin/reports/' . $file_name);
			 $this->load->view('running_report1',$data);
        }else{
            $this->load->view('running_report1',$data);
        }
		
	}
	
	function graph_reports_search($device_id=''){
		
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device']=$this->Api_reports_data_model->get_device($device_id);
		$hardware=$this->Api_reports_data_model->get_hardwares($device_id);
		foreach($hardware as $rec){
			$item[$rec['api_name']]=$rec['api_name'];
		}
		$data['hardware']=$item;
		$data['device_id']=$device_id;
		
		if($device_id!=3){
			$data['running_data']=$this->Api_reports_data_model->getChillerReportData($this->input->post());
			
			$dps1=array();
			$dps2=array();
			for($i=0;count($data['running_data'])>$i;$i++){
				$data['dps1'][]=$data['running_data'][$i]['runninghrs'];
				$data['dps2'][]=$data['running_data'][$i]['Time'];		
			}
			// echo "<pre>";print_r($data['running_data']);
			// echo "<pre>";print_r($data['dps1']);
			// echo "<pre>";print_r($data['dps2']);exit;
			
		}else{
			$firepumps=$this->Api_data_model->get_hardwares(1,$device_id);
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			$data['meter']=$firepumps->result_array();
			// echo "<pre>";print_r($data['meter']);exit;
		}
		
        $this->load->view('graph_report1',$data);
        
		
	}
	
	function client_dashboard(){
		
		 $this->load->view('dashboard2');
	}
	function water_management_dashboard(){
		
		$this->load->view('WaterManagementApp/WaterManagement1');
   }
	
	// function firepump_reports($status=''){
		
	// 	// echo "sdsd";exit;
	// 	$this->load->model('Api_reports_data_model');
	// 	$this->load->model('Api_data_model');
	// 	$data['device_id']=$device_id;
	// 	$data['status']=$status;
		
	// 	// $data['cat']=$this->Api_data_model->get_fire_categories(3);
	// 	// $data['device']=$this->Api_reports_data_model->get_device($device_id);
	// 	$data['devices']=$this->Api_data_model->get_devices(3);
	// 	$item[]="Select Firepump";
	// 	foreach($data['devices'] as $rec){
	// 		// echo $rec['device_name'];
	// 		$item[$rec['device_id']]=$rec['device_name'];
	// 	}
	// 	$data['devices']=$item;
	// 	// echo "<pre>";print_r($data['devices']);exit;
	// 	if($status=='Running_hours'){
    //     $this->load->view('firepump_running_report1',$data);
	// 	}elseif($status=='PressureGraph'){
	// 		$this->load->view('firepump_pressure_graph',$data);
	// 	}elseif($status=='Tabular'){
	// 		$this->load->view('firepump_running_report1',$data);
	// 	}
	// 	elseif($status=='Graphical'){
	// 		$this->load->view('firepump_graphical_report',$data);
	// 	}
	// 	else{
    //     $this->load->view('firepump_graph_report',$data);
	// 	}
       
		
	// }
	
	function firepump_reports_search($pump=''){
		
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['devices']=$this->Api_data_model->get_devices(3);
		
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		if($pump!=''){
			$device_id1=$this->input->post('multiMeter1');
			//echo $device_id1;die();
			if($device_id1==1){
				$device_id=$this->input->post('multiMeter');
			// echo $pump;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['runn']=1;
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			}
			else if($device_id1==2){			
			
			$data['status_view']=2;
			}
			else if($device_id1==3){			
			
			$data['dg']=3;
			}
			else if($device_id1==4){			
			
			$data['fadded']=4;
			}
			else if($device_id1==5){			
			
			$data['consol']=5;
			$device_id=$this->input->post('multiMeter');
			// echo $pump;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			}
			
			// $data['running_data']=$rdata;
		}
		
		if(isset($_POST['export'])){
			// echo "ssqss";exit;
            $i = 1;
			
				$list1 = array('Sno', 'Date');
				
				for($y=0;$y<count($data['running_data'][0]);$y++){
					array_push($list1,$data['running_data'][0][$y]['meter']);
					// $list[]=$data['running_data'][0][$y]['meter'];
					// $list.push
				}
				$new_list[]=$list1;
				for($x=0;$x<count($data['running_data']);$x++){	
					$new_list1 = array($i++,
						$data['running_data'][$x][0]['date']						
					);
					for($y=0;$y<count($data['running_data'][$x]);$y++){									
						array_push($new_list1,$data['running_data'][$x][$y]['RunningHours']);
					}
					$new_list2[]=$new_list1;
					
				}
				$list=array_merge($new_list,$new_list2);
				// echo "<pre>";print_r($new_list);
				// echo "<pre>";print_r($new_list2);exit;
				
			
            $file_name = $data['device']['device_name'].'_RunningReports-' . date('YmdHis') . '.csv';
            $fp = fopen('asset/admin/reports/' . $file_name, 'w');
            foreach ($list as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            redirect('asset/admin/reports/' . $file_name);
			 $this->load->view('firepump_running_report1',$data);
        }else{
            $this->load->view('firepump_running_report1',$data);
        }
		
	}
	
	function firepump_graph_search($pump=''){
		
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['devices']=$this->Api_data_model->get_devices(3);
		
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		if($pump!=''){
			$device_id=$this->input->post('multiMeter');
			$device_id1=$this->input->post('multiMeter1');
			// echo $pump;
			if($device_id1==1){
				$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
				$data['runn']=1;
			// echo "<pre>";print_r($firepumps->result());exit;
			    $data['running_data']=$this->Api_reports_data_model->firePumpGraphDataAll($this->input->post(),$firepumps->result());
			}
			else if($device_id1==2){			
			
			$data['status_view']=2;
			}
			else if($device_id1==3){			
			//echo $device_id1;die;
			$data['linepressure']=3;
			$data['pressure_data']=$this->Api_reports_data_model->firePumpPressureGraphDataAllTest();
			}
			else if($device_id1==4){			
			
			$data['waterlevel']=4;
			}
			
			// $data['running_data']=$rdata;
		}		
		// print_r($data);die();
            $this->load->view('firepump_graphical_report',$data);
        
		
	}
	
	function firepump_pressure_graph_search($pump=''){
		
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['devices']=$this->Api_data_model->get_devices(3);
		
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		if($pump!=''){
			$device_id=$this->input->post('multiMeter');
			// echo $pump;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,"Pressure Sensor");
			 // echo "<pre>";print_r($firepumps->result());exit;
			$data['pressure_data']=$this->Api_reports_data_model->firePumpPressureGraphDataAll($this->input->post(),$firepumps->result());
			// $data['running_data']=$rdata;
		}		
		 // print_r($data);die();
            $this->load->view('firepump_pressure_graph',$data);
        
		
	}
	
	// function energy_reports(){
		
	// 	// echo "sdsd";exit;
	// 	$this->load->model('Api_reports_data_model');
	// 	$this->load->model('Api_data_model');
	// 	$data['device_id']=$device_id;
	// 	// $data['status']=$status;
		
	// 	// $data['cat']=$this->Api_data_model->get_fire_categories(3);
	// 	// $data['device']=$this->Api_reports_data_model->get_device($device_id);
	// 	$data['devices']=$this->Api_data_model->get_devices(3);
	// 	$item[]="Select Firepump";
	// 	foreach($data['devices'] as $rec){
	// 		// echo $rec['device_name'];
	// 		$item[$rec['device_id']]=$rec['device_name'];
	// 	}
	// 	$data['devices']=$item;
	// 	//echo "<pre>";print_r($data['devices']);exit;
		
    //     $this->load->view('em_running_report',$data);
		
		
	// }
	// function energy_graph_reports(){
		
	// 	// echo "sdsd";exit;
	// 	$this->load->model('Api_reports_data_model');
	// 	$this->load->model('Api_data_model');
	// 	$data['device_id']=$device_id;
	// 	// $data['status']=$status;
		
	// 	// $data['cat']=$this->Api_data_model->get_fire_categories(3);
	// 	// $data['device']=$this->Api_reports_data_model->get_device($device_id);
	// 	$data['devices']=$this->Api_data_model->get_devices(3);
	// 	$item[]="Select Firepump";
	// 	foreach($data['devices'] as $rec){
	// 		// echo $rec['device_name'];
	// 		$item[$rec['device_id']]=$rec['device_name'];
	// 	}
	// 	$data['devices']=$item;
	// 	//echo "<pre>";print_r($data['devices']);exit;
		
    //     $this->load->view('em_graph_report',$data);
		
		
	// }
	// function energy_powerfctr_reports(){
	// 	// echo "sdsd";exit;
	// 	$this->load->model('Api_reports_data_model');
	// 	$this->load->model('Api_data_model');
	// 	$data['device_id']=$device_id;
	// 	// $data['status']=$status;
		
	// 	// $data['cat']=$this->Api_data_model->get_fire_categories(3);
	// 	// $data['device']=$this->Api_reports_data_model->get_device($device_id);
	// 	$data['devices']=$this->Api_data_model->get_devices(3);
	// 	$item[]="Select Firepump";
	// 	foreach($data['devices'] as $rec){
	// 		// echo $rec['device_name'];
	// 		$item[$rec['device_id']]=$rec['device_name'];
	// 	}
	// 	$data['devices']=$item;
	// 	//echo "<pre>";print_r($data['devices']);exit;
		
    //     $this->load->view('em_pf_graph',$data);

	// }
	// function btu_reports(){
		
	// 	// echo "sdsd";exit;
	// 	$this->load->model('Api_reports_data_model');
	// 	$this->load->model('Api_data_model');
	// 	$data['device_id']=$device_id;
	// 	//$data['status']=$status;
		
	// 	// $data['cat']=$this->Api_data_model->get_fire_categories(3);
	// 	// $data['device']=$this->Api_reports_data_model->get_device($device_id);
	// 	$data['devices']=$this->Api_data_model->get_devices(3);
	// 	$item[]="Select Firepump";
	// 	foreach($data['devices'] as $rec){
	// 		// echo $rec['device_name'];
	// 		$item[$rec['device_id']]=$rec['device_name'];
	// 	}
	// 	$data['devices']=$item;
	// 	//echo "<pre>";print_r($data['devices']);exit;
		
    //     $this->load->view('btu_running_report',$data);
		
		
	// }
	function all_reports(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
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
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices($this->input->post('category'));
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices("");
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
				
			if($this->session->userdata('user_id')==25){
				$this->load->view('all_reports_lonavala',$data);
			}else{
				$this->load->view('all_reports',$data);
			}

		   // print_r($data['data']);die();
		 
	}
	function all_reports_demo(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_demo();
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
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_demo($this->input->post('category'));
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_demo("");
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
				
		

		   // print_r($data['data']);die();
		 $this->load->view('all_reports_demo',$data);
	}
	
	function all_reports_chennai(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_chennai();
		$device_id=$this->input->post('report');
		$data['radio']=$this->input->post('report_type');
		$data['m1']=$device_id;
		$data['sort']=$this->input->post('sorttype');
		if(!empty($_POST)){
			$data['data']=$this->input->post();
		}else{
			$data['data']=array('solution'=>0);
		}
		
		if ($this->input->post('category') != '')
			{
				if($this->input->post('report_type')==0){
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_chennai_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_chennai($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
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
		$this->load->model('Api_data_model');
			if($this->input->post('report_type')==2 || $this->input->post('report_type')==3 || $this->input->post('report_type')==4){
				$device_data=$this->Api_data_model->get_devices_list_all(5,6);
			}else{
				$device_data=$this->Api_data_model->get_devices_list($this->input->post('category'));
			}
		
		//
		for ($i=0; $i < count($device_data) ; $i++) { 

			$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
			
			$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
			

		}
		if($this->input->post('report_type')==2 || $this->input->post('report_type')==3 || $this->input->post('report_type')==4){
			for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
				$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter_report($hardwares['Water Meter']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
	
			
	
			$dps1=array();
			
			for($k=0;$k<count($flowmeterdata);$k++){		
			
				for ($i=0; $i < count($flowmeterdata[$k]['consolidate']); $i++) { 
					$dps1[$k]['meter']=$flowmeterdata[$k]['consolidate'][$i]['meter'];
					$dps1[$k]['dates'][$i]=$flowmeterdata[$k]['consolidate'][$i]['date'];				
					$dps1[$k]['conses'][$i]=(float)$flowmeterdata[$k]['consolidate'][$i]['consumption'];						
					
				}
			}
			$data['water_meter_data_month']=$dps1;
			$data['flowdata']=$flowmeterdata;

			for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
				$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data_dg_report($hardwares['DG']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			$data['dgdata']=$dgdata;

            for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
				$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_report($hardwares['Water Level']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			$data['watergraphdata']=$waterleveldata;
			//echo json_encode($waterleveldata);die();
            if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$data['energydata']=$energydat;
				
				
				// echo json_encode($energydat);die();
				$current=$this->Api_data_model->get_hardwares_device_data_energymeter_current_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['current']=$current;
				// echo json_encode($current);die();
				$voltage=$this->Api_data_model->get_hardwares_device_data_energymeter_voltage_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['voltage']=$voltage;
			}
			
            $data['power_factor_data']=$this->Api_data_model->get_hardwares_device_data_power_factor_report($this->input->post('fromdate'),$this->input->post('todate'));

            for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
				$firepumpdata[$i]=$this->Api_data_model->get_hardwares_device_data_firepump_report($hardwares['Firepump']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			
		
			$data['firepump_data']=$firepumpdata;
			// echo json_encode($firepumpdata);die();
            for ($i=0; $i <count($hardwares['Hydro Pnematic System']['hardaware_list']) ; $i++) { 
				$hydrodata[$i]=$this->Api_data_model->get_hardwares_device_data_hydro_report($hardwares['Hydro Pnematic System']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			
			//echo json_encode($hydrodata);die();
			$data['hydro_data']=$hydrodata;

            for ($i=0; $i <count($hardwares['Borewells']['hardaware_list']) ; $i++) { 
					$borewelldata[$i]=$this->Api_data_model->get_hardwares_device_data_borewell_report($hardwares['Borewells']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				}
				//  echo json_encode($borewelldata[0]['consolidate'][0]['meter']);die();
				$data['borewell_data']=$borewelldata;

// echo json_encode();die();
		}else{
			if($data['data']['device']==25){
				for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
					$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter_report($hardwares['Water Meter']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				}
		
				
		
				$dps1=array();
				
				for($k=0;$k<count($flowmeterdata);$k++){		
				
					for ($i=0; $i < count($flowmeterdata[$k]['consolidate']); $i++) { 
						$dps1[$k]['meter']=$flowmeterdata[$k]['consolidate'][$i]['meter'];
						$dps1[$k]['dates'][$i]=$flowmeterdata[$k]['consolidate'][$i]['date'];				
						$dps1[$k]['conses'][$i]=(float)$flowmeterdata[$k]['consolidate'][$i]['consumption'];						
						
					}
				}
				$data['water_meter_data_month']=$dps1;
				$data['flowdata']=$flowmeterdata;
			}
			//if()
		
		//echo json_encode($data['water_meter_data_month']);die();
		if($data['data']['device']==28){
			for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
				$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data_dg_report($hardwares['DG']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			$data['dgdata']=$dgdata;
		}
		
		//echo json_encode($dgdata[0]['fuel_level']['dg_fuel_level']);die();
		if($data['data']['device']==19){
			for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
				$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_report($hardwares['Water Level']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			$data['watergraphdata']=$waterleveldata;
		}
		// echo json_encode($data['watergraphdata']);die();
		if($data['data']['device']==41){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				if($this->input->post('sorttype')==2){
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report_hourly($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('sorttype'));
					$data['energydata']=$energydat;
					//echo json_encode($data['energydata']);die();
				}else{
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$data['energydata']=$energydat;
				}
			}
			
		}
		if($data['data']['device']==57){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_current_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['current']=$energydat;
			}
			
		}
		if($data['data']['device']==58){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_voltage_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['voltage']=$energydat;
			}
			
		}
		if($data['data']['device']==51){
			$data['power_factor_data']=$this->Api_data_model->get_hardwares_device_data_power_factor_report($this->input->post('fromdate'),$this->input->post('todate'));
		}
	//echo json_encode($energydat['PF'][0]);die();
		// if(isset($hardwares['Switch Status']['hardaware_list'][0])){
		// 	$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status_report($hardwares['Switch Status']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
		// }
		
		if($data['data']['device']==20){
			for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
				$firepumpdata[$i]=$this->Api_data_model->get_hardwares_device_data_firepump_report($hardwares['Firepump']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			
		
			$data['firepump_data']=$firepumpdata;
		}
		if($data['data']['device']==26){
			for ($i=0; $i <count($hardwares['Hydro Pnematic System']['hardaware_list']) ; $i++) { 
				$hydrodata[$i]=$this->Api_data_model->get_hardwares_device_data_hydro_report($hardwares['Hydro Pnematic System']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			
			//echo json_encode($hydrodata);die();
			$data['hydro_data']=$hydrodata;
		}
			

			if($data['data']['device']==27){
				for ($i=0; $i <count($hardwares['Borewells']['hardaware_list']) ; $i++) { 
					$borewelldata[$i]=$this->Api_data_model->get_hardwares_device_data_borewell_report($hardwares['Borewells']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				}
				//  echo json_encode($borewelldata[0]['consolidate'][0]['meter']);die();
				$data['borewell_data']=$borewelldata;
			}
		}
			
				
			
	
		
		
		
		
//echo json_encode($data);die();
		 
		 $this->load->view('all_reports_chennai',$data);
	}
	function vegas_cron(){
		$this->load->model('Api_data_model');
		$this->Api_data_model->get_hardwares_device_data_energymeter_report_vega_cron();
	}
	function all_reports_hcug(){
		
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_hcug();
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
				get_devices_hcug_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_hcug($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_hcug_tab("");
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
		$device_data=$this->Api_data_model->get_devices_list(10);
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
       
			if($data['data']['device']==37){
				if(isset($hardwares['Motor Switch Control']['hardaware_list'][0])){
					$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status_report($hardwares['Motor Switch Control']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					// echo json_encode( $data['switch_status_data']);die();
				}
				
			}
			
		
		// echo json_encode( $data['energydata']['undp'][0]);die();
		
		
		 $this->load->view('all_reports_hcug',$data);
	}
	function all_reports_unicef(){
		
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_unicef();
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
					get_devices_unicef_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_vega($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_unicef_tab("");
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
		$this->load->model('Api_data_model_unicef');
		$device_data=$this->Api_data_model_unicef->get_devices_list(6);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model_unicef->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model_unicef->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
		// echo json_encode($hardwares);die();
		//if(isset($hardwares['DG']['hardaware_list'][0])){
       
			if($data['data']['device']==41){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){

					$energydat=$this->Api_data_model_unicef->get_hardwares_device_data_energymeter_report_unicef($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('sorttype'));
					$data['energydata']=$energydat;
				}
				
			}
			// echo json_encode($energydat);die();
			if($data['data']['device']==57){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model_unicef->get_hardwares_device_data_energymeter_current_report_unicef($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['current']=$energydat;
				}
				
			}
			
			if($data['data']['device']==58){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model_unicef->get_hardwares_device_data_energymeter_voltage_report_unicef($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['voltage']=$energydat;
				}
				
			}
			// echo json_encode($data['voltage']);die();
			if($data['data']['device']==51){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model_unicef->get_hardwares_device_data_power_factor_report_unicef($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['power_factor_data']=$energydat;
				}
				
			}
			if($data['data']['device']==25){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$flowmeterdata=$this->Api_data_model_unicef->get_hardwares_device_data_flowmeter_report_unicef($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
				}
		
				// echo json_encode($flowmeterdata['consolidate']);die();
		
				
				$data['flowdata']=$flowmeterdata;
			}
			
		
		// echo json_encode($dps1);die();
		 $this->load->view('all_reports_unicef',$data);
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

					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report_undp($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('sorttype'));
					$data['energydata']=$energydat;
				}
				
			}
			// echo json_encode($energydat['unsg']);die();
			if($data['data']['device']==222){
				
					$evch=$this->Api_data_model->get_hardwares_device_data_evch_report_undp($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('sorttype1'));
					$data['evch']=$evch;
				
				
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
			
		
		// echo json_encode($data);die();
		 $this->load->view('all_reports_undp',$data);
	}
	function all_reports_vega(){
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_vega();
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
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report_vega($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['energydata']=$energydat;
				}
				
			}
			if($data['data']['device']==57){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_current_report_vegas($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['current']=$energydat;
				}
				
			}
			if($data['data']['device']==58){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_voltage_report_vegas($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
					$data['voltage']=$energydat;
				}
				
			}
			if($data['data']['device']==51){
				if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
					$energydat=$this->Api_data_model->get_hardwares_device_data_power_factor_report_vegas($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
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
		
		 $this->load->view('all_reports_vega',$data);
	}
	function all_reports_rsbrother(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_rsbro();
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
				get_devices_chennai_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_chennai($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
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
		$this->load->model('Api_data_model');
		if(!empty($_POST)){
			$device_data=$this->Api_data_model->get_devices_list_rsbros();
		// echo json_encode($device_data);die();
			for ($i=0; $i <count($device_data) ; $i++) { 
				$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data_dg_report_rsbro($device_data[$i],$this->input->post('fromdate'),$this->input->post('todate'),$device_data[$i]['from'],$data['radio']);
				
				
			}
			$data['dgdata']=$dgdata;
		}
		
		
			// echo json_encode($data['dgdata']);die();
		
			
		 
		 $this->load->view('all_reports_rsbrother',$data);
	}
	function all_reports_rainbow(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_rainbow_tab();
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
				get_devices_rainbow_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_rainbow($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
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
			// get_hardwares_device_list1_konda
		//flowmeter start	
		$this->load->model('Api_data_model_rainbow');
		$location=$this->input->post('location');
		if($location==1){
			$device_data=$this->Api_data_model_rainbow->get_devices_list($this->input->post('category'));
			for ($i=0; $i < count($device_data) ; $i++) { 

				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model_rainbow->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				
	
			}
		}else{
			$device_data=$this->Api_data_model_rainbow->get_devices_list_konda($this->input->post('category'));
			for ($i=0; $i < count($device_data) ; $i++) { 

				$device_name=$this->Api_data_model_rainbow->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model_rainbow->get_hardwares_device_list1_konda($device_data[$i]['hardware_device']);
				
	
			}
		}
		
		// echo json_encode($hardwares);die();
		if($data['data']['device']==16){
		$meters = $this->Api_data_model_rainbow->getHavcList_rainbow();
		$meters_kondapur = $this->Api_data_model_rainbow->getHavcList_rainbow_kondapur();
		//print_r($meters);die();
		if($location==1){
			$data['ahudata']=$this->Api_data_model_rainbow->getahuReportRainbow($meters,$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'),'hardware_station_consumption_data_rainbow_vikrampuri','2022000093');
		}else{
			$data['ahudata']=$this->Api_data_model_rainbow->getahuReportRainbow($meters_kondapur,$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'),'hardware_station_consumption_data_rainbow_kondapur','2022000100');
		}
		
		//$data['ahudata_kondapur']=$this->Api_data_model_rainbow->getAHUData_rainbow_kondapur($meters_kondapur,$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
		}
		// echo json_encode($data['ahudata']);die();

		if($data['data']['device']==19){
			for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
				$waterleveldata[$i]=$this->Api_data_model_rainbow->get_hardwares_device_data_waterlevelmeter_report($hardwares['Water Level']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			}
			$data['watergraphdata']=$waterleveldata;
		}
		//$hvacData=$this->Havac_model->getahuReport($this->input->get());
		if($data['data']['device']==41){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				if($location==1){
					$energydat=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$energydat_tbl=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_report_tbl($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$energydat_c=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_current_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$energydat_v=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_voltage_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['voltage']=$energydat_v;
				$data['current']=$energydat_c;
				}else{
					$energydat=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_report_kondapur($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$energydat_tbl=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_report_kondapur_tbl($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$energydat_c=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_current_report_kondapur($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
					$energydat_v=$this->Api_data_model_rainbow->get_hardwares_device_data_energymeter_voltage_report_kondapur($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['voltage']=$energydat_v;
				$data['current']=$energydat_c;
				}
				
				$data['energydata']=$energydat;
				$data['energydata_table']=$energydat_tbl;
			}
			
		}
		// echo json_encode($data['current']);die();
	
		
		 $this->load->view('all_reports_rainbow',$data);
	}
	function file_upload(){
		$this->load->view('excel_upload');
	}
	
	function rainbow_data_upload(){
		$this->load->model('Api_data_model_rainbow');
		$insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
		// If file uploaded
		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			// Load CSV reader library
			$this->load->library('CSVReader');
			
			// Parse data from CSV file
			$csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
			
			// Insert/update CSV data into database
			// SNO	Date	Water	Energy	fuel	medical gas	occupancy	inpatient	outpatient	location

			// `id``location``data_date``water_consumption``energy_consuption``fuel_consumption``medical_gas``occupency``in_patient``out_patient``created_date``total_beds`SELECT * FROM `rainbow_dashbord_data`

			if(!empty($csvData)){
				foreach($csvData as $row){ 					
					// Prepare data for DB insertion
					$memData = array(
						'location' => $row['location'],
						'data_date' => date("Y-m-d", strtotime($row['Date'])),
						'water_consumption' => $row['Water'],
						'energy_consuption' => $row['Energy'],
						'fuel_consumption' => $row['fuel'],
						'medical_gas' => $row['medical gas'],
						'occupency' => $row['occupancy'],
						'in_patient' => $row['inpatient'],
						'out_patient' => $row['outpatient'],
						'created_date' => date("Y-m-d"),
						'total_beds' => 0,
					);
					// echo json_encode($memData);die();
					
					$prevCount = $this->Api_data_model_rainbow->getRows($row['location'],$row['Date']);
					
					if($prevCount > 0){
						// // Update member data
						// $condition = array('location' => $row['location'],
						// 	'data_date' => $row['Date']);
						// $update = $this->member->update($memData, $condition);
						
					}else{
						// Insert member data
						$this->Api_data_model_rainbow->insert($memData);
						
					}
				}
			}
				
				
		

	}
}
	function all_reports_lonavala(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_lona();
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
				get_devices_lona_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_lona($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_lona_tab("");
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
			$this->load->model('Api_data_model');
			
			$device_data=$this->Api_data_model->get_devices_list($this->input->post('category'));
			//
			for ($i=0; $i < count($device_data) ; $i++) { 

				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
			if($data['data']['device']==25){
				for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
					$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter_report($hardwares['Water Meter']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				}
		
				
		
				$dps1=array();
				
				for($k=0;$k<count($flowmeterdata);$k++){		
				
					for ($i=0; $i < count($flowmeterdata[$k]['consolidate']); $i++) { 
						$dps1[$k]['meter']=$flowmeterdata[$k]['consolidate'][$i]['meter'];
						$dps1[$k]['dates'][$i]=$flowmeterdata[$k]['consolidate'][$i]['date'];				
						$dps1[$k]['conses'][$i]=(float)$flowmeterdata[$k]['consolidate'][$i]['consumption'];						
						
					}
				}
				$data['water_meter_data_month']=$dps1;
				$data['flowdata']=$flowmeterdata;
			}
			// for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
			// 	$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data_dg_report($hardwares['DG']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			// }
			// $data['dgdata']=$dgdata;

            // for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
			// 	$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_report($hardwares['Water Level']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
			// }
			$data['watergraphdata']=$waterleveldata;
			//$data['waterlevel_data']=$waterleveldata;

			$data['flowdata']=$flowmeterdata;
			$data['dgdata']=$dgdata;
			$data['watergraphdata']=$waterleveldata;
			//flow end

		   //print_r($data['flowdata']);die();
		 $this->load->view('all_reports_lonavala',$data);
	}
	function all_reports_mumbai(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_mumbai();
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
				get_devices_mumbai_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_mumbai($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_mumbai_tab("");
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
			$this->load->model('Api_data_model');
			
			$device_data=$this->Api_data_model->get_devices_list($this->input->post('category'));
			//
			for ($i=0; $i < count($device_data) ; $i++) { 

				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
			//echo json_encode($device_data);die();
			// for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
				if(isset($hardwares['Water Level']['hardaware_list'][0])){
				$waterleveldata=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_mum_report($hardwares['Water Level']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
				$data['watergraphdata']=$waterleveldata;
			}
			//$data['waterlevel_data']=$waterleveldata;
// echo json_encode($waterleveldata);die();
			
			
			$water_meter_dashboard_report=$this->Api_data_model->getWaterMeterDashboardReport($this->input->post('fromdate'),$this->input->post('todate'));
			//$switch_control_data=$this->Api_data_model->getWaterMeterDashboardReport($this->input->post('fromdate'),$this->input->post('todate'));
			
			//echo json_encode($data['switchcontrol_data']);die();
			$data['water_dashboard_report']=$water_meter_dashboard_report;
			//flow end
			if(isset($hardwares['Switch Control']['hardaware_list'][0])){
				$data['switchcontrol_data']=$this->Api_data_model->get_hardwares_device_data_switch_control_report($hardwares['Switch Control']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
				// echo json_encode($data['switchcontrol_data']['Tower-A'][1][0]);die();
			}
			
		   //print_r($data['flowdata']);die();
		 $this->load->view('all_reports_mumbai',$data);
	}
	function all_reports_iithyd(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_iit();
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
				get_devices_iit_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_iit($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_iit_tab("");
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
			$this->load->model('Api_data_model');
			
			$device_data=$this->Api_data_model->get_devices_list($this->input->post('category'));
			//
			for ($i=0; $i < count($device_data) ; $i++) { 

				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
			//echo json_encode($hardwares);die();
			
			//flow end
			if(isset($hardwares['Switch Status']['hardaware_list'][0])){
				$data['switchcontrol_data']=$this->Api_data_model->get_hardwares_device_data_switch_control_report_iit($hardwares['Switch Status']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
				// echo json_encode($data['switchcontrol_data']['Tower-A'][1][0]);die();
			}
			
		//    print_r($data['switchcontrol_data']);die();
		 $this->load->view('all_reports_iit',$data);
	}
	function all_reports_cbre(){
		//echo "<pre>";print_r($_POST);exit();
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_chennai();
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
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_chennai($this->input->post('category'));
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_chennai("");
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
				
		

		   // print_r($data['data']);die();
		 $this->load->view('all_reports_cbre',$data);
	}
	
	function all_reports_search(){		
		
		// echo "<pre>";print_r($_POST);exit;
		$this->load->model('Api_data_model');
		$this->load->model('Api_reports_data_model');
		// $this->load->model('Api_reports_data_model');
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown();
		$data['radio']=$this->input->post('report_type');
		if ($this->input->post('category') != '')
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_hardware_device_dropdown($this->input->post('category'));
			} else
			{
				$data['solution'] = array('' => 'Select Solution');
			}
			
			if ($this->input->post('device') != '')
			{
				$data['hardware'] = array('' => 'Select Device') + $this->Hardware_model->
					get_category_solution_hardwares_dropdown($this->input->post('category'),$this->input->post('device'));
					
					
			} else
			{
				$data['hardware'] = array('' => 'Select Device');
			}
			
		$device_id=$this->input->post('device');
		$data['device']=$this->Api_reports_data_model->get_device($device_id);
		// $hardware=$this->Api_reports_data_model->get_hardwares($device_id);
		$hardware_name=$this->Hardware_model->get_hardware($this->input->post('hardware'));
		$data['hardware_name']=$hardware_name;
		// foreach($hardware as $rec){
			// $item[$rec['api_name']]=$rec['api_name'];
		// }
		// $data['hardware']=$item;
		$data['device_id']=$device_id;
		
		if($device_id!=20){
			$pdata=array(
			'hardware_name'=>$hardware_name['dashboard_name'],
			//'hardware_name'=>$this->input->post('hardware'),
			'fromdate'=>$this->input->post('fromdate'),
			'todate'=>$this->input->post('todate'),
			'fromtime'=>$this->input->post('fromtime'),
			'totime'=>$this->input->post('totime'),	
			'StationId'=>$this->session->userdata('station_id')
			);
			$data['running_data']=$this->Api_reports_data_model->getwaterlevelreport($pdata);
			foreach($data['running_data'] as $rec){
				
				$time[]=$rec['Time'];
				$level[]=$rec['Current_capacity'];
			}
			$data['meter']=$data['running_data'][0]['Meter'];
			$data['time']=$time;
			$data['level']=$level;
			
		}else{
			
			if($this->input->post('report')==4){
			$data['firepump']=20;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,'Pumps');
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			$data['time']=array();
			$data['level']=array();
			}elseif($this->input->post('report')==5){
				
			}elseif($this->input->post('report')==6){
				echo "sadasdas";exit;
				$data['pressure_data']=$this->Api_reports_data_model->firePumpLinepressureData($this->input->post());

				foreach($data['pressure_data'] as $rec1){				
				$time[]=$rec1['TxnTime'];
				$txndate[$rec1['TxnDate']]=$rec1['TxnTime'];
				$consumption[]=(float)$rec1['Consumption'];
				// $txndate[]=$rec1->TxnDate;
				}
			$data['meter']="Hydrant Pressure";
			$data['time']=$time;
			$data['consumption']=$consumption;
			$data['txndate']=$txndate;
				
			}elseif($this->input->post('report')==7){
				
				// $diesel=$this->Api_data_model->get_firepumpdata(20,'Diesel Pump');
		
				// $data['disel_data']=$diesel->result_array();
				
				$date_from = strtotime($this->input->post('fromdate')); 
				$date_to = strtotime($this->input->post('todate')); 
				$datesarray=array();
				for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
					array_push($datesarray, date("Y-m-d",$i1));

				}
				for ($k=0; $k < count($datesarray); $k++) { 
				
				// echo "http://chekhra.in/Generators/fuelSensor/runningHours.php?generatorId=RSBDSNR&date=".$datesarray[$k]."&client=438";
				// echo "<br>";
				
					$ch = curl_init("http://chekhra.in/Generators/fuelSensor/runningHours.php?generatorId=RSBDSNR&date=".$datesarray[$k]."&client=438");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
					

					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
																			  
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					$result = curl_exec($ch);


					$data['dgdata'][]=json_decode($result, true);
				}
				
			}
			// $data['running_data']=$rdata;
		}
		// echo json_encode($data['consumption']);exit;
		// echo "<pre>";print_r($data['time']);
		// echo "<pre>";print_r($data['consumption']);
		// echo "<pre>";print_r($data['txndate']);
		// echo "<pre>";print_r($data['dgdata']);exit;
		if(isset($_POST['export'])){
			// echo "ssqss";exit;
            $i = 1;
			if($device_id!=3){
				$list[] = array('Sno', 'Meter', 'Date/Hours','Running Hours');
				foreach ($data['running_data'] as $row) {
					$t = $row['runninghrs'];
					$h = floor($t/60) ? floor($t/60) .' Hours' : '0 Hours';
					$m = $t%60 ? $t%60 .' Min' : '0 Min';
					$hrs=$h && $m ? $h.' '.$m : $h.$m;
									
					$list[] = array($i++,
						$row['Meter'],
						$row['Time'],
						$hrs
					);
				}
				// echo "<pre>";print_r($list);exit;
			}else{
				$list1 = array('Sno', 'Date');
				
				for($y=0;$y<count($data['running_data'][0]);$y++){
					array_push($list1,$data['running_data'][0][$y]['meter']);
					// $list[]=$data['running_data'][0][$y]['meter'];
					// $list.push
				}
				$new_list[]=$list1;
				for($x=0;$x<count($data['running_data']);$x++){	
					$new_list1 = array($i++,
						$data['running_data'][$x][0]['date']						
					);
					for($y=0;$y<count($data['running_data'][$x]);$y++){									
						array_push($new_list1,$data['running_data'][$x][$y]['RunningHours']);
					}
					$new_list2[]=$new_list1;
					
				}
				$list=array_merge($new_list,$new_list2);
				// echo "<pre>";print_r($new_list);
				// echo "<pre>";print_r($new_list2);exit;
				
			}
            $file_name = $data['device']['device_name'].'_RunningReports-' . date('YmdHis') . '.csv';
            $fp = fopen('asset/admin/reports/' . $file_name, 'w');
            foreach ($list as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            redirect('asset/admin/reports/' . $file_name);
			 $this->load->view('all_reports',$data);
        }else{
			//echo "<pre>";print_r($data);exit;
            $this->load->view('all_reports',$data);
        }
		
	}
	
	function all_reports_apollo(){
		 //echo "<pre>";print_r($_POST);exit();
		$device_id=$this->input->post('solution');
		$this->load->model('Api_data_model');
		if($device_id==62){
			$ah='Tomo Therapy';
			$dd=$this->input->post('date');
			$data['ahdata']=$this->Api_data_model->getahuReport($dd,$ah);

		}
		if($device_id==63){
			$ah='Waiting Hall';
			$dd=$this->input->post('date');
			$data['ahdata']=$this->Api_data_model->getahuReport($dd,$ah);

		}
		if($device_id==43){
			$ah='Novalis Ch WD-1';
			$dd=$this->input->post('date');
			$data['ahdata']=$this->Api_data_model->getahuReport($dd,$ah);
			//die();

		}
		if($device_id==44){
			$ah='Novalis Ch WD-2';
			$dd=$this->input->post('date');
			$data['ahdata']=$this->Api_data_model->getahuReport($dd,$ah);

		}
		$data['m1']=$device_id;
		if(!empty($_POST)){
			$data['data']=$this->input->post();
		}else{
			$data['data']=array('solution'=>0);
		}
		

		  //echo json_encode($data['ahdata']);die();
		 $this->load->view('all_reports_apollo',$data);
	}
	// function all_reports_fire($pump=''){


	// 	$this->load->model('Api_reports_data_model');
	// 	$this->load->model('Api_data_model');
		
	// // echo "<pre>";print_r($data);exit();
	// 	$device_id1=$this->input->post('report');

	// 	$data['radio']=$this->input->post('report_type');
	// 	$data['m1']=$device_id1;
	// 	if($device_id1=='fprr'){

	// 		$data['devices']=$this->Api_data_model->get_devices(3);
		
	// 		foreach($data['devices'] as $rec){
	// 			// echo $rec['device_name'];
	// 			$item[$rec['device_id']]=$rec['device_name'];
	// 		}
	// 		$data['devices']=$item;
	// 		if($pump!=''){
				
	// 		// echo $pump;
	// 		$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
	// 		// echo "<pre>";print_r($firepumps->result());exit;
	// 		$data['runn']=1;
	// 		$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			
	// 		}

	// 	}
	// 	if($device_id1=='fpdrr'){
	// 		$data['dgrunn_data']=$this->Api_reports_data_model->firedgdata($this->input->post());
	// 	}
	// 	if($device_id1=='fpdfar'){
	// 		$data['dgfadd_data']=$this->Api_reports_data_model->firedgfadddata($this->input->post());
	// 	}
	// 	if($device_id1=='fpcr'){
	// 		$data['devices']=$this->Api_data_model->get_devices(3);
		
	// 		foreach($data['devices'] as $rec){
	// 			// echo $rec['device_name'];
	// 			$item[$rec['device_id']]=$rec['device_name'];
	// 		}
	// 		$data['devices']=$item;
	// 		if($pump!=''){
				
	// 		// echo $pump;
	// 		$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
	// 		// echo "<pre>";print_r($firepumps->result());exit;
	// 		$data['runn']=1;
	// 		$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			
	// 		}
	// 		$data['dgrunn_data']=$this->Api_reports_data_model->firedgdata($this->input->post());
	// 		$data['dgfadd_data']=$this->Api_reports_data_model->firedgfadddata($this->input->post());
	// 		$data['alerts_data']=$this->Api_reports_data_model->alertdata($this->input->post());

	// 	}
	// 	if(!empty($_POST)){
	// 		$data['data']=$this->input->post();
	// 	}else{
	// 		$data['data']=array('solution'=>0);
	// 	}
		

	// 	   // print_r($data);die();
	// 	 $this->load->view('all_reports_fire',$data);
	// }
	function getMap(){
		$this->load->view('getMap');
	}
	function em_more_details(){
		$this->load->view('em_more_details');
	}
	function water_fire(){
		$this->load->view('water-fire-dashboard');
	}
	

	
	function specialized(){
		$this->load->view('specializedsolution-dashboard');
	}
    function energy1(){
		$this->load->model('Api_data_model');
		$data['categories']=$this->Api_data_model->get_categories();
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		$data['lpg']=6;
		$data['dg']=7;
		$data['ups']=8;
		
		// echo "<pre>";print_r($data['firepump_id']);exit;
		// $line_pressure=$this->Api_data_model->get_firepumpdata(9,'Pressure Sensor');
		// $line_pressure=$this->Api_data_model->get_firepumpdata(10,'Pressure Sensor');
		// $data['line_pressure']=$line_pressure;
		// $j=0;
		// foreach($line_pressure->result() as $rec){
			// $data1[]=$this->Api_data_model->getPressureToday($rec->LineConnected);			
			// for($i=0;count($data1[$j])>$i;$i++){
				// $data['pdata'][$rec->LineConnected]['readings'][$i]=$data1[$j][$i]->CurReading;
				// $data['pdata'][$rec->LineConnected]['timings'][$i]=$data1[$j][$i]->ToTime;				
			// }			
		// $j++;
		// }

		$ch = curl_init('http://chekhra.net/chekhranew/Generators/chekhraMaps/show_all_prk.php?&generatorsId=HEADOFFICE&clientId=438');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
		

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);


	    $data['dgdata']=json_decode($result, true);
		// echo "<pre>";print_r($data['dgdata']);exit;
		
		
		
		$this->load->view('energy1-dashboard',$data);
	}

	function air(){
		$this->load->model('Api_data_model');
		$data['categories']=$this->Api_data_model->get_categories();
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		
		$this->load->view('air-dashboard1',$data);
	}
	function aircondition(){
		$this->load->model('Api_data_model');
		// $data['categories']=$this->Api_data_model->get_categories();
		// $data['devices']=$this->Api_data_model->get_devices('');
		// $data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		$data['meters'] = $this->Api_data_model->getHavcList();
		$this->load->view('aircondition-dashboard',$data);
	}
	function ahu_monitoring(){
		$this->load->model('Api_data_model');
		// $data['categories']=$this->Api_data_model->get_categories();
		// $data['devices']=$this->Api_data_model->get_devices('');
		// $data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$table='hardware_station_consumption_data_vegaschool_live';
		$meters = $this->Api_data_model->getHavcList_vega($table);
		// echo json_encode($meters);die();
		$data['ahudata']=$this->Api_data_model->getAHUData_vegas($meters,$table);
		// echo json_encode($data['ahudata']);die();
		$this->load->view('ahu-monitoring-dashboard',$data);
	}
	function ahu_controlling(){
		$this->load->model('Api_data_model');
		
		$data['ahudata']=$this->Api_data_model->getAHUData_vegas1();
		// echo json_encode($data['ahudata']);die();
		$this->load->view('aircondition-dashboard-controlling',$data);
	}
	function vfd_monitoring(){
		$this->load->model('Api_data_model');
		// $data['categories']=$this->Api_data_model->get_categories();
		// $data['devices']=$this->Api_data_model->get_devices('');
		// $data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		//$table='hardware_station_consumption_data_vegaschool_live';
		//$meters = $this->Api_data_model->getHavcList_vega($table);
		// echo json_encode($meters);die();
		$data['ahudata']=[];
		// echo json_encode($data['ahudata']);die();
		$this->load->view('vfd-monitoring-dashboard',$data);
	}
	function vfd_controlling(){
		$this->load->model('Api_data_model');
		// $data['categories']=$this->Api_data_model->get_categories();
		// $data['devices']=$this->Api_data_model->get_devices('');
		// $data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		//$table='hardware_station_consumption_data_vegaschool_live';
		//$meters = $this->Api_data_model->getHavcList_vega($table);
		// echo json_encode($meters);die();
		$data['ahudata']=[];
		// echo json_encode($data['ahudata']);die();
		$this->load->view('vfd-dashboard-controlling',$data);
	}
	
	function aircondition_rainbow(){
		$this->load->model('Api_data_model_rainbow');
		//$data['categories']=$this->Api_data_model->get_categories();
		//$data['devices']=$this->Api_data_model->get_devices('');
		//$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		//$data['firepump_id']=$this->Api_data_model->get_devices(3);
		$meters = $this->Api_data_model_rainbow->getHavcList_rainbow();
		$meters_kondapur = $this->Api_data_model_rainbow->getHavcList_rainbow_kondapur();
		//print_r($meters);die();
		$data['ahudata']=$this->Api_data_model_rainbow->getAHUData_rainbow($meters);
		$data['ahudata_kondapur']=$this->Api_data_model_rainbow->getAHUData_rainbow_kondapur($meters_kondapur);
		// echo json_encode($data['ahudata']);
		// die();
		$id=$this->input->get('id');
		$loc=$this->input->get('loc');
		$data['id']=$id;
		$data['loc']=$loc;
		$this->load->view('aircondition-dashboard-rainbow',$data);
	}
	function aircondition_apollo(){
		$this->load->model('Api_data_model');
		$data['categories']=$this->Api_data_model->get_categories();
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		$meters = $this->Api_data_model->getHavcList();
		//print_r($meters[0]->MeterName);die();
		$data['ahudata']=$this->Api_data_model->getAHUData($meters);
		//echo json_encode($data['ahudata']);
		//die();
		$this->load->view('aircondition-dashboard-apollo',$data);
	}
	function boilers(){
		$this->load->model('Api_data_model');
		$data['categories']=$this->Api_data_model->get_categories();
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		
		//echo json_encode($data['ahudata']);
		//die();
		$this->load->view('boilerdashboard',$data);
	}
	function airquality(){
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(3);
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
			
		  if(count($hardwares['Indoor Air Quality']['hardaware_list'])>0){
				for ($i=0; $i <count($hardwares['Indoor Air Quality']['hardaware_list']) ; $i++) { 
					$iagdata[$i]=$this->Api_data_model->get_hardwares_device_data_iaq($hardwares['Indoor Air Quality']['hardaware_list'][$i]);
				}
				// echo json_encode($iagdata);die();	
			$data['iaq_data']=$iagdata;
			}
		$this->load->view('air_quality',$data);
	}
	function airqualityvideo(){
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(3);
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
			
		  if(count($hardwares['Indoor Air Quality']['hardaware_list'])>0){
				for ($i=0; $i <count($hardwares['Indoor Air Quality']['hardaware_list']) ; $i++) { 
					$iagdata[$i]=$this->Api_data_model->get_hardwares_device_data_iaq($hardwares['Indoor Air Quality']['hardaware_list'][$i]);
				}
				// echo json_encode($iagdata);die();	
			$data['iaq_data']=$iagdata;
			}
		$this->load->view('air_quality_video',$data);
	}
	function protech_reports(){
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		$this->load->model('Api_reports_data_model');
		$data['category'] = array('' => 'Select Category') + $this->Hardware_category_model->get_hardware_category_dropdown_hcug();
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
				get_devices_hcug_tab($this->input->post('category'));
				}else{
					$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
				get_devices_hcug($this->input->post('category'));
				}
				
			} else
			{
				$data['solution'] = array('' => 'Select Solution') + $this->Hardware_category_model->
					get_devices_hcug_tab("");
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
		$device_data=$this->Api_data_model->get_devices_list(10);
		$this->load->view('air_quality_report',$data);
	}
	function soft_integration(){
		
		 $this->load->view('softintegration-dashboard');
	}

// 	function test(){
// 		$config = Array(
//         'protocol' => 'smtp',
//         'smtp_host' => 'ssl://smtp.googlemail.com',
//         'smtp_port' => 465,
//        // 'smtp_user' => 'ChekhraApp@gmail.com',
//          'smtp_user' => 'reportdemo21@gmail.com',
//         //'smtp_pass' => 'Chk@1234',
//          'smtp_pass' => 'report@12345678',
//         'mailtype'  => 'html', 
//         'charset' => 'utf-8',
//         'wordwrap' => TRUE

//     );
//    echo "$msg_data";
//     $this->load->library('email');
//     $this->email->initialize($config);   
//     $this->email->set_newline("\r\n"); 
//     $this->email->set_mailtype("html");   
//     $this->email->from('reports@wenalytics.com', 'Wenalytics');
    
//    $list = array('krishna3175@gmail.com' );
//     $this->email->to($list);
//     $this->email->subject('Daily Mail');
//     $this->email->message($msg_data);
//     $this->email->send();
// 	}
	
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
			//$content .='<option value="222">EV Charger</option>';
		}else{
			$states = $this->Hardware_category_model->get_devices_vega($category);  
		}          
        foreach ($states as $sid=>$state){
          $content .='<option value="'. $sid .'">'. $state .'</option>';
        }
        echo $content;
    }
	function ajax_hardware_device_dropdown_unicef(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
       // $states = $this->Hardware_category_model->get_devices_chennai($category);  
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_unicef_tab($category);  
			//$content .='<option value="222">EV Charger</option>';
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
	function ajax_hardware_device_dropdown_hcug(){
        $this->load->model('Hardware_category_model');
        $category = $this->input->get('category');
        $content ='<option value=""> Select Solution </option>';
		//echo $this->input->post('report_type');
		if($this->input->get('type')==0){
			$states = $this->Hardware_category_model->get_devices_hcug_tab($category);  
		}else{
			$states = $this->Hardware_category_model->get_devices_hcug($category);  
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


	function addwatermeter(){
		$this->load->model('Hardware_model');
		$this->load->model('Hardware_category_model');
		
		$data['meters'] = array('' => 'Select Meter') + $this->Hardware_category_model->get_hardware();

		$this->load->view('addwatermeter',$data);
	}
	function watermeterDashboard(){
		$date=$this->input->post('date');
		//echo $date;die();
		$this->load->model('Api_data_model');
		$data['water_meter_data_times']=$this->Api_data_model->get_water_meter_data($date);
		// echo json_encode($data['water_meter_data_times']);die();
		$update=$this->Api_data_model->update_water_readings($_POST);
		if(!empty($_POST)){
			//$this->load->model('Api_data_model');
			$data['water_meter_data']=$this->Api_data_model->get_water_readings($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('watermeter_magement',$data);

		}else{
			//$this->load->model('Api_data_model');
			$data['water_meter_data']=$this->Api_data_model->get_water_readings($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('watermeter_magement',$data);
		}
		


	}
	function rainbowMainDashboard(){
		$date=$this->input->post('d_date');
		//echo $date;die();
		$this->load->model('Api_data_model_rainbow');
		
		if(!empty($_POST)){
			//$this->load->model('Api_data_model');
			$data['rainbow_main_data']=$this->Api_data_model_rainbow->rainbow_main_data($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard',$data);

		}else{
			//$this->load->model('Api_data_model');
			$data['rainbow_main_data']=$this->Api_data_model_rainbow->rainbow_main_data($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('Rainbow-Dashboard',$data);
		}
		


	}
	function waterMeterReadingUpdate(){
		$this->load->model('Api_data_model');
		$update=$this->Api_data_model->update_water_readings($_POST);
		$date='';
		    $this->load->model('Api_data_model');
			$data['water_meter_data']=$this->Api_data_model->get_water_readings($date);
			//echo json_encode($data['water_meter_data']);die();
			$this->load->view('watermeter_magement',$data);
	}
	function getWaterMeterReadingAjax(){
		$this->load->model('Api_data_model');
		$meter_id = $this->input->get('meter_id');
        $date = $this->input->get('today');
		$data=$this->Api_data_model->get_water_readings_ajax($date,$meter_id);
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
		

		$this->load->model('Hardware_category_model');
		$data['hardwares'] = array('' => 'All Water Meter') + $this->Hardware_category_model->get_hardware();
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
		$this->load->model('Hardware_category_model');
		
		$data['meters'] = array('' => 'Select Meter') + $this->Hardware_category_model->get_hardware();
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
