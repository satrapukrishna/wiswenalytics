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
		// if(isset($hardwares['Water Meter']['hardaware_list'])){
		// 	for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
		// 		$flowmeterdata[$i]=$this->Api_data_model->get_hardwares_device_data_flowmeter($hardwares['Water Meter']['hardaware_list'][$i]);
		// 	}
		// 	$data['water_meter_data']=$flowmeterdata;
		// }
			$ww[0]['meter']="Borewell 1 (IN)";
			$ww[0]['monthly_data']=[];
			$ww[0]['todayconsumption']=22;
			$ww[0]['yesterdayconsumption']=44;
			$ww[0]['monthly_consumption']=1304.7;
			$ww[0]['weeklyavg']=45;

			$ww[1]['meter']="Borewell 2 (IN)";
			$ww[1]['monthly_data']=[];
			$ww[1]['todayconsumption']=23;
			$ww[1]['yesterdayconsumption']=42;
			$ww[1]['monthly_consumption']=1244.7;
			$ww[1]['weeklyavg']=41;

			$ww[2]['meter']="Marketing Office & Garden";
			$ww[2]['monthly_data']=[];
			$ww[2]['todayconsumption']=0;
			$ww[2]['yesterdayconsumption']=6;
			$ww[2]['monthly_consumption']=125.7;
			$ww[2]['weeklyavg']=4.1;

			$ww[3]['meter']="TPI(OUT)";
			$ww[3]['monthly_data']=[];
			$ww[3]['todayconsumption']=4;
			$ww[3]['yesterdayconsumption']=9;
			$ww[3]['monthly_consumption']=234;
			$ww[3]['weeklyavg']=7;

			$ww[4]['meter']="A4 BUILDING(OUT)";
			$ww[4]['monthly_data']=[];
			$ww[4]['todayconsumption']=0;
			$ww[4]['yesterdayconsumption']=1;
			$ww[4]['monthly_consumption']=43;
			$ww[4]['weeklyavg']=1.6;
			$data['water_meter_data']=$ww;
			$tt[0]['meter']="Borewell 1 (IN)";
			
			$tt[0]['dates']=[
				"2022-01-01",
				"2022-01-02",
				"2022-01-03",
				"2022-01-04",
				"2022-01-05",
				"2022-01-06",
				"2022-01-07",
				"2022-01-08",
				"2022-01-09",
				"2022-01-10",
				"2022-01-11",
				"2022-01-12",
				"2022-01-13",
				"2022-01-14",
				"2022-01-15",
				"2022-01-16",
				"2022-01-17",
				"2022-01-18",
				"2022-01-19",
				"2022-01-20",
				"2022-01-21",
				"2022-01-22",
				"2022-01-23",
				"2022-01-24",
				"2022-01-25",
				"2022-01-26",
				"2022-01-27",
				"2022-01-28",
				"2022-01-29"
				];
			$tt[0]['conses']=[
				20,
				13,
				60,
				24,
				50,
				67,
				66,
				65,
				14,
				50,
				66,
				63,
				43,
				42,
				18,
				20,
				67,
				52,
				49,
				62,
				64,
				66,
				50,
				65,
				58,
				44,
				18,
				0,
				0
				];
				$tt[1]['meter']="Borewell 2 (IN)";
			$tt[1]['dates']=[
				"2022-01-01",
				"2022-01-02",
				"2022-01-03",
				"2022-01-04",
				"2022-01-05",
				"2022-01-06",
				"2022-01-07",
				"2022-01-08",
				"2022-01-09",
				"2022-01-10",
				"2022-01-11",
				"2022-01-12",
				"2022-01-13",
				"2022-01-14",
				"2022-01-15",
				"2022-01-16",
				"2022-01-17",
				"2022-01-18",
				"2022-01-19",
				"2022-01-20",
				"2022-01-21",
				"2022-01-22",
				"2022-01-23",
				"2022-01-24",
				"2022-01-25",
				"2022-01-26",
				"2022-01-27",
				"2022-01-28",
				"2022-01-29"
				];
			$tt[1]['conses']=[
				26,
				67,
				50,
				54,
				67,
				62,
				83,
				83,
				18,
				57,
				83,
				71,
				82,
				19,
				41,
				43,
				16,
				54,
				82,
				83,
				82,
				75,
				59,
				81,
				73,
				70,
				71,
				48,
				0
				];

			$tt[2]['meter']="Marketing Office & Garden";
			$tt[2]['dates']=[
				"2022-01-01",
				"2022-01-02",
				"2022-01-03",
				"2022-01-04",
				"2022-01-05",
				"2022-01-06",
				"2022-01-07",
				"2022-01-08",
				"2022-01-09",
				"2022-01-10",
				"2022-01-11",
				"2022-01-12",
				"2022-01-13",
				"2022-01-14",
				"2022-01-15",
				"2022-01-16",
				"2022-01-17",
				"2022-01-18",
				"2022-01-19",
				"2022-01-20",
				"2022-01-21",
				"2022-01-22",
				"2022-01-23",
				"2022-01-24",
				"2022-01-25",
				"2022-01-26",
				"2022-01-27",
				"2022-01-28",
				"2022-01-29"
				];
			$tt[2]['conses']=[
				0,
				0,
				0,
				0,
				1,
				0,
				1,
				2,
				0,
				0,
				12,
				9,
				5,
				3,
				4,
				2,
				0,
				4,
				12,
				23,
				14,
				12,
				0,
				1,
				2,
				1,
				1,
				1,
				6
				];

			$tt[3]['meter']="TPI(OUT)";
			$tt[3]['dates']=[
				"2022-01-01",
				"2022-01-02",
				"2022-01-03",
				"2022-01-04",
				"2022-01-05",
				"2022-01-06",
				"2022-01-07",
				"2022-01-08",
				"2022-01-09",
				"2022-01-10",
				"2022-01-11",
				"2022-01-12",
				"2022-01-13",
				"2022-01-14",
				"2022-01-15",
				"2022-01-16",
				"2022-01-17",
				"2022-01-18",
				"2022-01-19",
				"2022-01-20",
				"2022-01-21",
				"2022-01-22",
				"2022-01-23",
				"2022-01-24",
				"2022-01-25",
				"2022-01-26",
				"2022-01-27",
				"2022-01-28",
				"2022-01-29"
				];
			$tt[3]['conses']=[
				4,
				5,
				8,
				6,
				8,
				15,
				12,
				8,
				0,
				9,
				9,
				8,
				8,
				3,
				2,
				5,
				6,
				7,
				10,
				11,
				10,
				8,
				6,
				11,
				11,
				5,
				8,
				11,
				9
				];

			$tt[4]['meter']="A4 BUILDING(OUT)";
			$tt[4]['dates']=[
				"2022-01-01",
				"2022-01-02",
				"2022-01-03",
				"2022-01-04",
				"2022-01-05",
				"2022-01-06",
				"2022-01-07",
				"2022-01-08",
				"2022-01-09",
				"2022-01-10",
				"2022-01-11",
				"2022-01-12",
				"2022-01-13",
				"2022-01-14",
				"2022-01-15",
				"2022-01-16",
				"2022-01-17",
				"2022-01-18",
				"2022-01-19",
				"2022-01-20",
				"2022-01-21",
				"2022-01-22",
				"2022-01-23",
				"2022-01-24",
				"2022-01-25",
				"2022-01-26",
				"2022-01-27",
				"2022-01-28",
				"2022-01-29"
				];
			$tt[4]['conses']=[
				0,
				0,
				1,
				1,
				1,
				1,
				1,
				1,
				0,
				1,
				1,
				1,
				1,
				0,
				1,
				0,
				2,
				2,
				2,
				2,
				2,
				2,
				1,
				2,
				3,
				3,
				2,
				2,
				1
				];
		//echo json_encode($flowmeterdata);die();
		//  $dps1=array();
		
		// for($k=0;$k<count($flowmeterdata);$k++){
		// 	$dps1[$k]['meter']=$flowmeterdata[$k]['meter'];
			
		// 	$tot=0;
		// 	for ($i=0; $i < count($flowmeterdata[$k]['monthly_data']); $i++) { 
		// 		$dps1[$k]['dates'][$i]=$flowmeterdata[$k]['monthly_data'][$i]['date'];				
		// 		$dps1[$k]['conses'][$i]=(int)$flowmeterdata[$k]['monthly_data'][$i]['con'];						
				
		// 	}
		// }
		$data['water_meter_data_month']=$tt;
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
		
	
		//   if(count($hardwares['Water Level']['hardaware_list'])>0){
		// 		for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
		// 			$waterleveldata[$i]=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter($hardwares['Water Level']['hardaware_list'][$i]);
		// 		}		
		// 	$data['waterlevel_data']=$waterleveldata;
		// 	}
			$waterleveldata[0]['meter']="Fire Water Tank 01";
			$waterleveldata[0]['capacity']=270;
			$waterleveldata[0]['currentlevel']=245.93;
			$waterleveldata[0]['filledpercent']=91.08;
			$waterleveldata[0]['filledpercent_1']=91;

			$waterleveldata[1]['meter']="Fire Water Tank 02";
			$waterleveldata[1]['capacity']=305;
			$waterleveldata[1]['currentlevel']=283.26;
			$waterleveldata[1]['filledpercent']=92.87;
			$waterleveldata[1]['filledpercent_1']=93;

			$waterleveldata[2]['meter']="Fire Water Tank 03";
			$waterleveldata[2]['capacity']=305;
			$waterleveldata[2]['currentlevel']=264.27;
			$waterleveldata[2]['filledpercent']=86.65;
			$waterleveldata[2]['filledpercent_1']=87;

			$waterleveldata[3]['meter']="Raw Water Tank";
			$waterleveldata[3]['capacity']=107;
			$waterleveldata[3]['currentlevel']=52.93;
			$waterleveldata[3]['filledpercent']=87.08;
			$waterleveldata[3]['filledpercent_1']=87;
			$data['waterlevel_data']=$waterleveldata;
			// echo json_encode($waterleveldata);die();
		// if(isset($hardwares['Borewells']['hardaware_list'])){
		// 	for ($i=0; $i <count($hardwares['Borewells']['hardaware_list']) ; $i++) { 
		// 		$borewelldata[$i]=$this->Api_data_model->get_hardwares_device_data_borewell($hardwares['Borewells']['hardaware_list'][$i]);
		// 	}
		// 	// echo json_encode($waterleveldata);die();
			

		// 	$data['borewell_data']=$borewelldata;
		// }
		$b1[0]['meter']="Borewell 01";
			$b1[0]['todayconsumption']="4 hours 49 minutes";
			$b1[0]['yesterdayconsumption']="4 hours 20 minutes";
			$b1[0]['monthly_consumption']="9 hours 38 minutes";

			$b1[1]['meter']="Borewell 02";
			$b1[1]['todayconsumption']="3 hours 22 minutes";
			$b1[1]['yesterdayconsumption']="4 hours 33 minutes";
			$b1[1]['monthly_consumption']="8 hours 38 minutes";

			$data['borewell_data']="Borewell 01";
			$b1[0]['todayconsumption']="4 hours 49 minutes";
			$b1[0]['yesterdayconsumption']="4 hours 20 minutes";
			$b1[0]['monthly_consumption']="9 hours 38 minutes";

			$b1[1]['meter']="Borewell 02";
			$b1[1]['todayconsumption']="3 hours 22 minutes";
			$b1[1]['yesterdayconsumption']="4 hours 33 minutes";
			$b1[1]['monthly_consumption']="8 hours 38 minutes";

			$data['borewell_data']=$b1;
		// if(isset($hardwares['Firepump']['hardaware_list'])){
		// 	for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
		// 		$firepumpdata[$hardwares['Firepump']['hardaware_list'][$i]['dashboard_name']]=$this->Api_data_model->get_hardwares_device_data_firepump($hardwares['Firepump']['hardaware_list'][$i]);
		// 	}
		// 	// echo json_encode($firepumpdata);die();

		// 	// echo json_encode($firepumpdata['Phase-2 Fire Pump System']['dg_data']);die();
		// 	$data['firepump_data']=$firepumpdata;
		// }
		$ff['Phase-1 Fire Pump System']['run_data'][0]['meter']="Panel Power Supply";
		$ff['Phase-1 Fire Pump System']['run_data'][0]['running_status']=false;
		$ff['Phase-1 Fire Pump System']['run_data'][0]['switch_status']=true;
		$ff['Phase-1 Fire Pump System']['run_data'][0]['today_running_hours']="";
		$ff['Phase-1 Fire Pump System']['run_data'][0]['yesterday_running_hours']="";
		$ff['Phase-1 Fire Pump System']['run_data'][0]['lastweek_running_hours']="";
		$ff['Phase-1 Fire Pump System']['run_data'][0]['monthly_running_hours']="";

		$ff['Phase-1 Fire Pump System']['run_data'][1]['meter']="Jockey Pump";
		$ff['Phase-1 Fire Pump System']['run_data'][1]['running_status']=false;
		$ff['Phase-1 Fire Pump System']['run_data'][1]['switch_status']=true;
		$ff['Phase-1 Fire Pump System']['run_data'][1]['today_running_hours']="0 hours 2 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][1]['yesterday_running_hours']="0 hours 4 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][1]['lastweek_running_hours']="0 hours 24 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][1]['monthly_running_hours']="1 days, 5 hours, 7 minutes";

		$ff['Phase-1 Fire Pump System']['run_data'][2]['meter']="Main Pump";
		$ff['Phase-1 Fire Pump System']['run_data'][2]['running_status']=false;
		$ff['Phase-1 Fire Pump System']['run_data'][2]['switch_status']=true;
		$ff['Phase-1 Fire Pump System']['run_data'][2]['today_running_hours']="0 hours 0 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][2]['yesterday_running_hours']="0 hours 0 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][2]['lastweek_running_hours']="0 hours 0 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][2]['monthly_running_hours']="0 days, 0 hours, 0 minutes";

		$ff['Phase-1 Fire Pump System']['run_data'][3]['meter']="Diesel Engine Driven Pump";
		$ff['Phase-1 Fire Pump System']['run_data'][3]['running_status']=false;
		$ff['Phase-1 Fire Pump System']['run_data'][3]['switch_status']=true;
		$ff['Phase-1 Fire Pump System']['run_data'][3]['today_running_hours']="0 hours 0 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][3]['yesterday_running_hours']="0 hours 0 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][3]['lastweek_running_hours']="0 hours 0 minutes";
		$ff['Phase-1 Fire Pump System']['run_data'][3]['monthly_running_hours']="0 days, 0 hours, 0 minutes";

		$ff['Phase-1 Fire Pump System']['pressure_data'][0]['pressure']=9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][0]['TxnTime']="00:07:42";

		$ff['Phase-1 Fire Pump System']['pressure_data'][1]['pressure']=8.9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][1]['TxnTime']="01:32:00";

		$ff['Phase-1 Fire Pump System']['pressure_data'][2]['pressure']=8.9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][2]['TxnTime']="02:33:32";

		$ff['Phase-1 Fire Pump System']['pressure_data'][3]['pressure']=8.89;
		$ff['Phase-1 Fire Pump System']['pressure_data'][3]['TxnTime']="03:41:40";

		$ff['Phase-1 Fire Pump System']['pressure_data'][4]['pressure']=8.8;
		$ff['Phase-1 Fire Pump System']['pressure_data'][4]['TxnTime']="04:59:31";

		$ff['Phase-1 Fire Pump System']['pressure_data'][5]['pressure']=8.8;
		$ff['Phase-1 Fire Pump System']['pressure_data'][5]['TxnTime']="05:22:21";

		$ff['Phase-1 Fire Pump System']['pressure_data'][6]['pressure']=8.6;
		$ff['Phase-1 Fire Pump System']['pressure_data'][6]['TxnTime']="06:40:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][7]['pressure']=8.5;
		$ff['Phase-1 Fire Pump System']['pressure_data'][7]['TxnTime']="06:50:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][8]['pressure']=8.5;
		$ff['Phase-1 Fire Pump System']['pressure_data'][8]['TxnTime']="07:10:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][9]['pressure']=8.2;
		$ff['Phase-1 Fire Pump System']['pressure_data'][9]['TxnTime']="07:20:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][10]['pressure']=8.1;
		$ff['Phase-1 Fire Pump System']['pressure_data'][10]['TxnTime']="07:40:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][11]['pressure']=8.1;
		$ff['Phase-1 Fire Pump System']['pressure_data'][11]['TxnTime']="07:50:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][12]['pressure']=7.9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][12]['TxnTime']="08:10:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][13]['pressure']=8;
		$ff['Phase-1 Fire Pump System']['pressure_data'][13]['TxnTime']="08:20:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][14]['pressure']=8.1;
		$ff['Phase-1 Fire Pump System']['pressure_data'][14]['TxnTime']="08:30:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][15]['pressure']=8.2;
		$ff['Phase-1 Fire Pump System']['pressure_data'][15]['TxnTime']="08:50:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][16]['pressure']=8.2;
		$ff['Phase-1 Fire Pump System']['pressure_data'][16]['TxnTime']="09:50:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][17]['pressure']=8.2;
		$ff['Phase-1 Fire Pump System']['pressure_data'][17]['TxnTime']="10:00:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][18]['pressure']=8.3;
		$ff['Phase-1 Fire Pump System']['pressure_data'][18]['TxnTime']="10:20:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][19]['pressure']=8.5;
		$ff['Phase-1 Fire Pump System']['pressure_data'][19]['TxnTime']="10:30:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][20]['pressure']=8.5;
		$ff['Phase-1 Fire Pump System']['pressure_data'][20]['TxnTime']="10:50:05";
		
		$ff['Phase-1 Fire Pump System']['pressure_data'][21]['pressure']=8.9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][21]['TxnTime']="11:10:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][22]['pressure']=8.9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][22]['TxnTime']="11:30:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][23]['pressure']=8.9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][23]['TxnTime']="11:50:05";

		$ff['Phase-1 Fire Pump System']['pressure_data'][24]['pressure']=9;
		$ff['Phase-1 Fire Pump System']['pressure_data'][24]['TxnTime']="12:00:05";

		$ff['Phase-1 Fire Pump System']['dg_data']['run']="00:00";
		$ff['Phase-1 Fire Pump System']['dg_data']['fadd']=0;
		$ff['Phase-1 Fire Pump System']['dg_data']['fremove']=0;
		$ff['Phase-1 Fire Pump System']['dg_data']['fconsume1']=0;
		$ff['Phase-1 Fire Pump System']['dg_data']['fconsume']=0;
		$ff['Phase-1 Fire Pump System']['dg_data']['economy']=0;
		$ff['Phase-1 Fire Pump System']['dg_data']['availableFuel']=267;
		$ff['Phase-1 Fire Pump System']['dg_data']['filledper']=68;
		$ff['Phase-1 Fire Pump System']['dg_data']['voltage']="24.5";
		$ff['Phase-1 Fire Pump System']['dg_data']['status']="OFF";	

		
		$ff['Phase-2 Fire Pump System']['run_data'][1]['meter']="Jockey Pump";
		$ff['Phase-2 Fire Pump System']['run_data'][1]['running_status']=true;
		$ff['Phase-2 Fire Pump System']['run_data'][1]['switch_status']=true;
		$ff['Phase-2 Fire Pump System']['run_data'][1]['today_running_hours']="0 hours 2 minutes";
		$ff['Phase-2 Fire Pump System']['run_data'][1]['yesterday_running_hours']="0 hours 0 minutes";
		$ff['Phase-2 Fire Pump System']['run_data'][1]['lastweek_running_hours']="0 hours 4 minutes";
		$ff['Phase-2 Fire Pump System']['run_data'][1]['monthly_running_hours']="2 days, 0 hours, 40 minutes";

		$ff['Phase-2 Fire Pump System']['run_data'][2]['meter']="Diesel Engine Driven Pump";
		$ff['Phase-2 Fire Pump System']['run_data'][2]['running_status']=true;
		$ff['Phase-2 Fire Pump System']['run_data'][2]['switch_status']=true;
		$ff['Phase-2 Fire Pump System']['run_data'][2]['today_running_hours']="0 hours 0 minutes";
		$ff['Phase-2 Fire Pump System']['run_data'][2]['yesterday_running_hours']="0 hours 0 minutes";
		$ff['Phase-2 Fire Pump System']['run_data'][2]['lastweek_running_hours']="0 hours 0 minutes";
		$ff['Phase-2 Fire Pump System']['run_data'][2]['monthly_running_hours']="0 days, 0 hours, 0 minutes";


		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=4.58;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="00:07:42";

		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=4.58;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="01:32:00";

		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=4.58;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="02:33:32";

		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=4.58;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="03:41:40";

		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=5.58;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="04:59:31";

		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=5.38;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="05:22:21";

		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['pressure']=4.58;
		$ff['Phase-2 Fire Pump System']['pressure_data'][0]['TxnTime']="06:40:05";


		$ff['Phase-2 Fire Pump System']['dg_data']['run']="00:00";
		$ff['Phase-2 Fire Pump System']['dg_data']['fadd']=0;
		$ff['Phase-2 Fire Pump System']['dg_data']['fremove']=0;
		$ff['Phase-2 Fire Pump System']['dg_data']['fconsume1']=0;
		$ff['Phase-2 Fire Pump System']['dg_data']['fconsume']=0;
		$ff['Phase-2 Fire Pump System']['dg_data']['economy']=0;
		$ff['Phase-2 Fire Pump System']['dg_data']['availableFuel']=256;
		$ff['Phase-2 Fire Pump System']['dg_data']['filledper']=70;
		$ff['Phase-2 Fire Pump System']['dg_data']['voltage']="24.5";
		$ff['Phase-2 Fire Pump System']['dg_data']['status']="OFF";	

		$data['firepump_data']=$ff;
			// if(isset($hardwares['Hydro Pnematic System']['hardaware_list'])){
		// 	for ($i=0; $i <count($hardwares['Hydro Pnematic System']['hardaware_list']) ; $i++) { 
		// 		$hydrodata[$hardwares['Hydro Pnematic System']['hardaware_list'][$i]['dashboard_name']]=$this->Api_data_model->get_hardwares_device_data_hydro($hardwares['Hydro Pnematic System']['hardaware_list'][$i]);
		// 	}
			
		// 	//   echo json_encode($hydrodata);die();
		// 	$data['hydro_data']=$hydrodata;
		// }
		$hh['Hydro Pnematic System 01']['run_data'][0]['meter']= "Motor-1";
		$hh['Hydro Pnematic System 01']['run_data'][0]['running_status']= true;
		$hh['Hydro Pnematic System 01']['run_data'][0]['today_running_hours']= "7 hours 12 minutes";
		$hh['Hydro Pnematic System 01']['run_data'][0]['yesterday_running_hours']= "7 hours 12 minutes";
		$hh['Hydro Pnematic System 01']['run_data'][0]['lastweek_running_hours']= "3 days, 2 hours, 46 minutes";
		$hh['Hydro Pnematic System 01']['run_data'][0]['monthly_running_hours']= "0 days, 14 hours, 24 minutes";

		$hh['Hydro Pnematic System 01']['run_data'][1]['meter']= "Motor-2";
		$hh['Hydro Pnematic System 01']['run_data'][1]['running_status']= false;
		$hh['Hydro Pnematic System 01']['run_data'][1]['today_running_hours']= "5 hours 12 minutes";
		$hh['Hydro Pnematic System 01']['run_data'][1]['yesterday_running_hours']= "6 hours 12 minutes";
		$hh['Hydro Pnematic System 01']['run_data'][1]['lastweek_running_hours']= "2 days, 22 hours, 46 minutes";
		$hh['Hydro Pnematic System 01']['run_data'][1]['monthly_running_hours']= "0 days, 13 hours, 24 minutes";

		$hh['Hydro Pnematic System 01']['pressure_data'][0]['pressure']=4.58;
		$hh['Hydro Pnematic System 01']['pressure_data'][0]['TxnTime']="00:07:42";

		$hh['Hydro Pnematic System 01']['pressure_data'][1]['pressure']=4.58;
		$hh['Hydro Pnematic System 01']['pressure_data'][1]['TxnTime']="01:32:00";

		$hh['Hydro Pnematic System 01']['pressure_data'][2]['pressure']=4.58;
		$hh['Hydro Pnematic System 01']['pressure_data'][2]['TxnTime']="02:33:32";

		$hh['Hydro Pnematic System 01']['pressure_data'][3]['pressure']=4.58;
		$hh['Hydro Pnematic System 01']['pressure_data'][3]['TxnTime']="03:41:40";

		$hh['Hydro Pnematic System 01']['pressure_data'][4]['pressure']=5.58;
		$hh['Hydro Pnematic System 01']['pressure_data'][4]['TxnTime']="04:59:31";

		$hh['Hydro Pnematic System 01']['pressure_data'][5]['pressure']=5.38;
		$hh['Hydro Pnematic System 01']['pressure_data'][5]['TxnTime']="05:22:21";

		$hh['Hydro Pnematic System 01']['pressure_data'][6]['pressure']=4.58;
		$hh['Hydro Pnematic System 01']['pressure_data'][6]['TxnTime']="06:40:05";
		$data['hydro_data']=$hh;
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
		// if(isset($hardwares['DG']['hardaware_list'][0])){
        // for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
		// 	$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data($hardwares['DG']['hardaware_list'][$i]);
		// }
		// $data['dg_data']=$dgdata;
	    // }
			$ddg[0]['run']="0:0";
			$ddg[0]['fadd']=0;
			$ddg[0]['fremove']=0;
			$ddg[0]['fconsume']=0;
			$ddg[0]['economy']=0;
			$ddg[0]['availableFuel']=370;
			$ddg[0]['filledper']=97;
			$ddg[0]['voltage']="13.34";
			$ddg[0]['status']="OFF";
			$ddg[0]['dgname']="Diesel Generator";
			$gr[0]['time']="2023-05-19";
			$gr[0]['meter']="Diesel Generator";
			$gr[0]['runninghrs']=0;
			$gr[1]['time']="2023-05-20";
			$gr[1]['meter']="Diesel Generator";
			$gr[1]['runninghrs']=0;
			$gr[2]['time']="2023-05-21";
			$gr[2]['meter']="Diesel Generator";
			$gr[2]['runninghrs']=0;
			$gr[3]['time']="2023-05-22";
			$gr[3]['meter']="Diesel Generator";
			$gr[3]['runninghrs']=4;
			$gr[4]['time']="2023-05-23";
			$gr[4]['meter']="Diesel Generator";
			$gr[4]['runninghrs']=0;
			$gr[5]['time']="2023-05-24";
			$gr[5]['meter']="Diesel Generator";
			$gr[5]['runninghrs']=10;


						$ddg[0]['graph']=$gr;
						$data['dg_data']=$ddg;
		//echo json_encode($data['dg_data']);die();
		
			//$powerdata[]=$this->Api_data_model->get_hardwares_device_data_power($hardwares['Power Supply']['hardaware_list'][$i]);
			$tp[0]['ebstatus']=0;
			$tp[0]['dgstatus']=1;
			$tp[0]['trip']='No Trip';
			$tp[0]['meter']='Power Supply';
		    $data['power_data']=$tp;
		//echo json_encode($powerdata);die();
		
		$eng[0]['pf']= "0.963";
		$eng[0]['meter']= "Container office";
		$eng[0]['todaycons']= 70.14;
		$eng[0]['yestcons']= 132.51;
		$eng[0]['monthcons']= 140.28;
		$eng[0]['kw']= "2.269";
		$eng[0]['avgcons']= 140.28;
		$eng[0]['current1']= "0.39";
		$eng[0]['current2']= "0.161";
		$eng[0]['current3']= "9.048";
		$eng[0]['voltage1']= "245.032";
		$eng[0]['voltage2']= "246.427";
		$eng[0]['voltage3']= "245.492";
		$eng[0]['kva']= "2.356";
		$eng[0]['kvah']= "0.305";

		$eng[1]['pf']= "0.961";
		$eng[1]['meter']= "A4 Building";
		$eng[1]['todaycons']= 18.16;
		$eng[1]['yestcons']= 34.03;
		$eng[1]['monthcons']= 36.31;
		$eng[1]['kw']= "1.775";
		$eng[1]['avgcons']= 36.31;
		$eng[1]['current1']= "5.571";
		$eng[1]['current2']= "1.962";
		$eng[1]['current3']= "0";
		$eng[1]['voltage1']= "245.113";
		$eng[1]['voltage2']= "246.427";
		$eng[1]['voltage3']= "246.427";
		$eng[1]['kva']= "1.848";
		$eng[1]['kvah']= "0.094";

		$eng[2]['pf']= "0.947";
		$eng[2]['meter']= "LDB (Pump room)";
		$eng[2]['todaycons']= 10.16;
		$eng[2]['yestcons']= 13.03;
		$eng[2]['monthcons']= 21.31;
		$eng[2]['kw']= "0.575";
		$eng[2]['avgcons']= 21.31;
		$eng[2]['current1']= "0.998";
		$eng[2]['current2']= "1.23";
		$eng[2]['current3']= "0.243";
		$eng[2]['voltage1']= "244.113";
		$eng[2]['voltage2']= "246.427";
		$eng[2]['voltage3']= "245.427";
		$eng[2]['kva']= "0.607";
		$eng[2]['kvah']= "0.077";

		$eng[3]['pf']= "0.935";
		$eng[3]['meter']= "Main I/C (EB)";
		$eng[3]['todaycons']= 240.94;
		$eng[3]['yestcons']= 864.25;
		$eng[3]['monthcons']= 481.88;
		$eng[3]['kw']= "20.078";
		$eng[3]['avgcons']= 481.88;
		$eng[3]['current1']= "32.255";
		$eng[3]['current2']= "22.777";
		$eng[3]['current3']= "28.378";
		$eng[3]['voltage1']= "245.113";
		$eng[3]['voltage2']= "246.427";
		$eng[3]['voltage3']= "245.427";
		$eng[3]['kva']= "20.607";
		$eng[3]['kvah']= "20.077";

		
			
			$data['energy_meters_data']=$eng;
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
		
	
			$data['switch_status_data']=$this->Api_data_model->get_hardwares_device_data_switch_status($hardwares['Switch Status']['hardaware_list'][0]);
			// echo json_encode($data['switch_status_data']);die();
			$this->load->view('switch_control_chennai_staticchennai',$data);
		
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
