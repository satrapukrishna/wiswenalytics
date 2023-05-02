<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);

class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
        modules::run('Admin/is_logged_in',__CLASS__);
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
	
	public function energy()
	{
		// echo "aaaa"exit;
		//$this->load->model('Api_data_model');
		//$data['categories']=$this->Api_data_model->get_categories();
		//$data['devices']=$this->Api_data_model->get_devices('');
		//$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		//$data['firepump_id']=$this->Api_data_model->get_devices(3);
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

		// $ch = curl_init('http://chekhra.net/chekhranew/Generators/chekhraMaps/show_all_prk.php?&generatorsId=HEADOFFICE&clientId=438');                                                                      
		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
		

		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                                                                  
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// $result = curl_exec($ch);


	    //$data['dgdata']=json_decode($result, true);
		// echo "<pre>";print_r($data['dgdata']);exit;
		
		
		$this->load->view('energy-dashboard');
		// $this->load->view('energy-dashboard',$data);
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
		echo "<pre>";print_r($data['hardware']);exit;
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
	
	function firepump_reports($status=''){
		
		// echo "sdsd";exit;
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device_id']=$device_id;
		$data['status']=$status;
		
		// $data['cat']=$this->Api_data_model->get_fire_categories(3);
		// $data['device']=$this->Api_reports_data_model->get_device($device_id);
		$data['devices']=$this->Api_data_model->get_devices(3);
		$item[]="Select Firepump";
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		// echo "<pre>";print_r($data['devices']);exit;
		if($status=='Running_hours'){
        $this->load->view('firepump_running_report1',$data);
		}elseif($status=='PressureGraph'){
			$this->load->view('firepump_pressure_graph',$data);
		}elseif($status=='Tabular'){
			$this->load->view('firepump_running_report1',$data);
		}
		elseif($status=='Graphical'){
			$this->load->view('firepump_graphical_report',$data);
		}
		else{
        $this->load->view('firepump_graph_report',$data);
		}
       
		
	}
	
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
	
	function energy_reports(){
		
		// echo "sdsd";exit;
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device_id']=$device_id;
		// $data['status']=$status;
		
		// $data['cat']=$this->Api_data_model->get_fire_categories(3);
		// $data['device']=$this->Api_reports_data_model->get_device($device_id);
		$data['devices']=$this->Api_data_model->get_devices(3);
		$item[]="Select Firepump";
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		//echo "<pre>";print_r($data['devices']);exit;
		
        $this->load->view('em_running_report',$data);
		
		
	}
	function energy_graph_reports(){
		
		// echo "sdsd";exit;
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device_id']=$device_id;
		// $data['status']=$status;
		
		// $data['cat']=$this->Api_data_model->get_fire_categories(3);
		// $data['device']=$this->Api_reports_data_model->get_device($device_id);
		$data['devices']=$this->Api_data_model->get_devices(3);
		$item[]="Select Firepump";
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		//echo "<pre>";print_r($data['devices']);exit;
		
        $this->load->view('em_graph_report',$data);
		
		
	}
	function energy_powerfctr_reports(){
		// echo "sdsd";exit;
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device_id']=$device_id;
		// $data['status']=$status;
		
		// $data['cat']=$this->Api_data_model->get_fire_categories(3);
		// $data['device']=$this->Api_reports_data_model->get_device($device_id);
		$data['devices']=$this->Api_data_model->get_devices(3);
		$item[]="Select Firepump";
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		//echo "<pre>";print_r($data['devices']);exit;
		
        $this->load->view('em_pf_graph',$data);

	}
	function btu_reports(){
		
		// echo "sdsd";exit;
		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		$data['device_id']=$device_id;
		//$data['status']=$status;
		
		// $data['cat']=$this->Api_data_model->get_fire_categories(3);
		// $data['device']=$this->Api_reports_data_model->get_device($device_id);
		$data['devices']=$this->Api_data_model->get_devices(3);
		$item[]="Select Firepump";
		foreach($data['devices'] as $rec){
			// echo $rec['device_name'];
			$item[$rec['device_id']]=$rec['device_name'];
		}
		$data['devices']=$item;
		//echo "<pre>";print_r($data['devices']);exit;
		
        $this->load->view('btu_running_report',$data);
		
		
	}
	function all_reports(){
		// echo "<pre>";print_r($_POST);exit();
		$device_id=$this->input->post('report');
		$data['radio']=$this->input->post('report_type');
		$data['m1']=$device_id;
		if(!empty($_POST)){
			$data['data']=$this->input->post();
		}else{
			$data['data']=array('solution'=>0);
		}
		

		   // print_r($data['data']);die();
		 $this->load->view('all_reports',$data);
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
	function all_reports_fire($pump=''){


		$this->load->model('Api_reports_data_model');
		$this->load->model('Api_data_model');
		
	// echo "<pre>";print_r($data);exit();
		$device_id1=$this->input->post('report');

		$data['radio']=$this->input->post('report_type');
		$data['m1']=$device_id1;
		if($device_id1=='fprr'){

			$data['devices']=$this->Api_data_model->get_devices(3);
		
			foreach($data['devices'] as $rec){
				// echo $rec['device_name'];
				$item[$rec['device_id']]=$rec['device_name'];
			}
			$data['devices']=$item;
			if($pump!=''){
				
			// echo $pump;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['runn']=1;
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			
			}

		}
		if($device_id1=='fpdrr'){
			$data['dgrunn_data']=$this->Api_reports_data_model->firedgdata($this->input->post());
		}
		if($device_id1=='fpdfar'){
			$data['dgfadd_data']=$this->Api_reports_data_model->firedgfadddata($this->input->post());
		}
		if($device_id1=='fpcr'){
			$data['devices']=$this->Api_data_model->get_devices(3);
		
			foreach($data['devices'] as $rec){
				// echo $rec['device_name'];
				$item[$rec['device_id']]=$rec['device_name'];
			}
			$data['devices']=$item;
			if($pump!=''){
				
			// echo $pump;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['runn']=1;
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
			
			}
			$data['dgrunn_data']=$this->Api_reports_data_model->firedgdata($this->input->post());
			$data['dgfadd_data']=$this->Api_reports_data_model->firedgfadddata($this->input->post());
			$data['alerts_data']=$this->Api_reports_data_model->alertdata($this->input->post());

		}
		if(!empty($_POST)){
			$data['data']=$this->input->post();
		}else{
			$data['data']=array('solution'=>0);
		}
		

		   // print_r($data);die();
		 $this->load->view('all_reports_fire',$data);
	}
	function getMap(){
		$this->load->view('getMap');
	}
	function em_more_details(){
		$this->load->view('em_more_details');
	}
	function water_fire(){
		$this->load->view('water-fire-dashboard');
	}
	

	function water(){
		$this->load->view('water-dashboard');
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
		$data['categories']=$this->Api_data_model->get_categories();
		$data['devices']=$this->Api_data_model->get_devices('');
		$data['device_list']=$this->Api_data_model->get_hardwares_device_list();
		$data['firepump_id']=$this->Api_data_model->get_devices(3);
		
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

	function test(){
		$config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
       // 'smtp_user' => 'ChekhraApp@gmail.com',
         'smtp_user' => 'reportdemo21@gmail.com',
        //'smtp_pass' => 'Chk@1234',
         'smtp_pass' => 'report@12345678',
        'mailtype'  => 'html', 
        'charset' => 'utf-8',
        'wordwrap' => TRUE

    );
   echo "$msg_data";
    $this->load->library('email');
    $this->email->initialize($config);   
    $this->email->set_newline("\r\n"); 
    $this->email->set_mailtype("html");   
    $this->email->from('reports@wenalytics.com', 'Wenalytics');
    
   $list = array('krishna3175@gmail.com' );
    $this->email->to($list);
    $this->email->subject('Daily Mail');
    $this->email->message($msg_data);
    $this->email->send();
	}
	
	
	
	
}
