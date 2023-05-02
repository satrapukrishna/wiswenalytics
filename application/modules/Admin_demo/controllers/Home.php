<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
        // modules::run('Admin/is_logged_in',__CLASS__);
		//$this->load->model('login_model');
		// $this->load->library('session');
	}
	public function index()
	{
		// echo "aaaa"exit;
		$this->load->model('Api_data_model');
		$data['categories']=$this->Api_data_model->get_categories();
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

		$ch = curl_init('http://chekhra.net/chekhranew/Generators/chekhraMaps/show_all_prk.php?&generatorsId=HEADOFFICE&clientId=438');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
		

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);


	    $data['dgdata']=json_decode($result, true);
		// echo "<pre>";print_r($data['dgdata']);exit;
		
		
		$this->load->view('dashboard',$data);
	}
	public function waterQuality(){
		$this->load->view('water-quality');
	}
	public function getdata(){
		echo "string";
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
	function waterMeterData(){
		$this->load->model('Api_data_model');
		$device_data=$this->Api_data_model->get_devices_list(5);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}
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
		
	
		  if(count($hardwares['Water Level']['hardaware_list'])>0){
				for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
					$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][$i]);
				}		
			$data['waterlevel_data']=$waterleveldata;
			}
			// echo json_encode($waterleveldata);die();
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
			$this->load->view('water-dashboard-chennai',$data);
		
		
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
		 //echo json_encode($hardwares);die();
		if(isset($hardwares['DG']['hardaware_list'][0])){
        for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
			$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data($hardwares['DG']['hardaware_list'][$i]);
		}
		$data['dg_data']=$dgdata;
	    }
		
		//echo json_encode($data['dg_data']);die();
		
			$powerdata[]=$this->Api_data_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
		
		$data['power_data']=$powerdata;
		//echo json_encode($powerdata);die();
		$data['lpg']=6;
		$data['dg']=7;
		$data['ups']=8;
		
	
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$data['energy_meters_data']=$this->Api_data_model->get_hardwares_device_data_energy_meters($hardwares['Energy Meter']['hardaware_list'][0]);
			}
			//$data['energy_meters_data']=array();
			
			$this->load->view('energy-dashboard_chennai',$data);
		
		
		
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
		for ($i=0; $i <count($hardwares['Switch Control']['hardaware_list']) ; $i++) { 
			$scdata[$i]=$this->Api_data_model->get_hardwares_device_data_switch_control($hardwares['Switch Control']['hardaware_list'][$i]);
		}
		$data['switchcontrol_data']=$scdata;
		//echo json_encode($scdata);die();
	
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);
			//echo json_encode($data['switch_status_data']);die();
			$this->load->view('switch_control_chennai',$data);
		
	}
	function switchcontrol_one(){
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
		// for ($i=0; $i <count($hardwares['Switch Control']['hardaware_list']) ; $i++) { 
		// 	$scdata[$i]=$this->Api_data_model->get_hardwares_device_data_switch_control($hardwares['Switch Control']['hardaware_list'][$i]);
		// }
		//$data['switchcontrol_data']=$this->Api_data_model->get_hardwares_device_data_switch_control($hardwares['Switch Control']['hardaware_list'][0]);;
		// echo json_encode($data['switchcontrol_data']);die();
		
	
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);
			$this->load->view('switch_control_chennai',$data);
		
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
		
		if($data['data']['device']==41){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['energydata']=$energydat;
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
		
			
				
			
	
		
		
		
		
//echo json_encode($data);die();
		 
		 $this->load->view('all_reports_chennai',$data);
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
		
		if($data['data']['device']==41){
			if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
				$energydat=$this->Api_data_model->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('fromtime'),$this->input->post('totime'));
				$data['energydata']=$energydat;
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
		
			
				
			
	
		
		
		
		
//echo json_encode($data);die();
		 
		 $this->load->view('all_reports_chennai',$data);
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
			for ($i=0; $i <count($hardwares['Flow Meter']['hardaware_list']) ; $i++) { 
				$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter_report($hardwares['Flow Meter']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),'NA','NA');
			}
			for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
				$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data_dg_report($hardwares['DG']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),"NA","NA");
			}
			for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
				$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_report($hardwares['Water Level']['hardaware_list'][$i],$this->input->post('fromdate'),$this->input->post('todate'),"NA","NA");
			}
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
			
			//for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
				$waterleveldata=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_mum_report($hardwares['Water Level']['hardaware_list'][0],$this->input->post('fromdate'),$this->input->post('todate'));
			//}
			//$data['waterlevel_data']=$waterleveldata;
//echo json_encode($waterleveldata);die();
			
			$data['watergraphdata']=$waterleveldata;
			$water_meter_dashboard_report=$this->Api_data_model->getWaterMeterDashboardReport($this->input->post('fromdate'),$this->input->post('todate'));
			//  echo json_encode($water_meter_dashboard_report[0]);die();
			$data['water_dashboard_report']=$water_meter_dashboard_report;
			//flow end

		   //print_r($data['flowdata']);die();
		 $this->load->view('all_reports_mumbai',$data);
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
	function getHvacData(){
		$this->load->model('Api_data_model');
    	$hvacData=$this->Api_data_model->getHavcReport($this->input->get());
       // print_r($hvacData);die();
        //echo count($hvacData);
    	$result=array();
    	if(count($hvacData)>0){


    //echo $hvacData[0]->UtilityName;die();
    	for ($i=0; $i < count($hvacData); $i++) {
    		if($hvacData[$i]->LineConnected=='Actuator Level'){
    			$result[0]['Actuator Level']=$hvacData[$i]->Consumption;

    		}
    		if($hvacData[$i]->LineConnected=='Return Air Temp'){
    			$result[0]['Return Air Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Supply Air Temp'){
    			$result[0]['Supply Air Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Filter Pressure'){
    			$result[0]['Filter Pressure']=$hvacData[$i]->Consumption."Pa";
    		}
    		if($hvacData[$i]->LineConnected=='CHWS Temp'){
    			$result[0]['CW Sup Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='CHWR Temp'){
    			$result[0]['CH Ret Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Delta T'){
    			$result[0]['Delta T']=$hvacData[$i]->Consumption."&deg;C";
    		}
    		if($hvacData[$i]->LineConnected=='Set Temp'){
    			$result[0]['Set_Temp']=$hvacData[$i]->CurReading."&deg;C";
    		}
    		
		if($hvacData[$i]->LineConnected=='Fan 1 Power'){
            $result[0]['Fan 1 Power']=$hvacData[$i]->CurReading."kW";
         }
         if($hvacData[$i]->LineConnected=='Fan 2 Power'){
            $result[0]['Fan 2 Power']=$hvacData[$i]->CurReading."kW";
         }
		if($hvacData[$i]->LineConnected=='DeltaT Air'){
            $result[0]['DeltaT Air']=$hvacData[$i]->CurReading."&deg;C";
         }
         if($hvacData[$i]->LineConnected=='RA Set Temp'){
            $result[0]['RA Set Temp']=$hvacData[$i]->CurReading."&deg;C";
         }
         if($hvacData[$i]->LineConnected=='Set RA Humidity'){
            $result[0]['Set RA Humidity']=$hvacData[$i]->CurReading."%RH";
         }
		 if($hvacData[$i]->LineConnected=='Auto/Man Status'){
			 if($hvacData[$i]->CurReading==1){
				$result[0]['Auto/Man Status']="On";
			 }else{
				$result[0]['Auto/Man Status']="Off";
			 }
            
         }
		 if($hvacData[$i]->LineConnected=='Unit Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Unit Status']="On";
			 }else{
				$result[0]['Unit Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='CWV Out Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['CWV Out Status']="On";
			 }else{
				$result[0]['CWV Out Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Filter Clog Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Filter Clog Status']="On";
			 }else{
				$result[0]['Filter Clog Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Fire Trip Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Fire Trip Status']="On";
			 }else{
				$result[0]['Fire Trip Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Heater 1 Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Heater 1 Status']="On";
			 }else{
				$result[0]['Heater 1 Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Heater 2 Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Heater 2 Status']="On";
			 }else{
				$result[0]['Heater 2 Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Heater 3 Status'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Heater 3 Status']="On";
			 }else{
				$result[0]['Heater 3 Status']="Off";
			 }
		 }
		 if($hvacData[$i]->LineConnected=='Unit Status F/B'){
			//$result[0]['Unit_Status']=$hvacData[$i]->UomScale;
			if($hvacData[$i]->CurReading==1){
				$result[0]['Unit Status F/B']="On";
			 }else{
				$result[0]['Unit Status F/B']="Off";
			 }
		 }

		 if($hvacData[$i]->LineConnected=='CHW Valve'){
            $result[0]['CHW Valve']=$hvacData[$i]->CurReading."%";
         }
		 if($hvacData[$i]->LineConnected=='DeltaT Chilled Water'){
            $result[0]['DeltaT Chilled Water']=$hvacData[$i]->CurReading."&deg;C";
         }
    	
    		# code...
    	}
    	$result[0]['Date']=$hvacData[0]->TxnDate;
    	$result[0]['Time']=$hvacData[0]->FromTime;

    	$result[0]['LocationName']=$hvacData[0]->LocationName;

    	echo json_encode($result);
    }else {
        return 0;
    	

    }
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
		$data['categories']=$this->Api_data_model->get_categories();
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		
		$this->load->view('airquality-dashboard',$data);
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
