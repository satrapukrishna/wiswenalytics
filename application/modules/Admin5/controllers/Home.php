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
		// print_r($data);
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
		$item[]="select Firepump";
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
		}
		else{
        $this->load->view('firepump_graph_report',$data);
		}
       
		
	}
	
	function firepump_reports_search($pump=''){
		//($pump);die();
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
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['running_data']=$this->Api_reports_data_model->firePumpRunnDataAll($this->input->post(),$firepumps->result());
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
			// echo $pump;
			$firepumps=$this->Api_data_model->get_firepumpdata($device_id,$pump);
			// echo "<pre>";print_r($firepumps->result());exit;
			$data['running_data']=$this->Api_reports_data_model->firePumpGraphDataAll($this->input->post(),$firepumps->result());
			// $data['running_data']=$rdata;
		}		
		// print_r($data);die();
            $this->load->view('firepump_graph_report',$data);
        
		
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
	

	
	
	
	
}
