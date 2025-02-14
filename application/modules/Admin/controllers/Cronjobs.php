<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Cronjobs extends MX_Controller  {
    
	
    public function __construct() {
       parent::__construct();
      
       $this->load->model('Api_data_db_table_model');
      
       
    }
       
    
  function push_water_level_data(){
		$this->Api_data_db_table_model->addWaterLevel();
	}
  function push_water_level_graph_data_mumbai(){
    $yesterDay = date('Y-m-d',strtotime("-1 days"));
    // $first = "2025-01-01";
    // $last = "2025-02-10";
		$this->Api_data_db_table_model->get_hardwares_device_data_waterlevel_report_oberoi(2021000076,$yesterDay,$yesterDay);
	}
  function water_module_data(){
    
		$device_data=$this->Api_data_db_table_model->get_devices_list_all(5,6);
		if(count($device_data)>0){
			for ($i=0; $i < count($device_data) ; $i++) { 
				
				$device_name=$this->Api_data_db_table_model->get_device_name($device_data[$i]['hardware_device']);
				
				$hardwares[$device_name[0]->device_name]['hardaware_list']=$this->Api_data_db_table_model->get_hardwares_device_list1($device_data[$i]['hardware_device']);
				

			}
		}else{
			$hardwares[0]['hardaware_list']=array();
			//echo "No Hardware data";
		}
// echo json_encode($hardwares['DG']['hardaware_list']);die();
    for ($i=0; $i <count($hardwares['Borewells']['hardaware_list']) ; $i++) { 
      $this->Api_data_db_table_model->get_hardwares_device_data_borewell_report($hardwares['Borewells']['hardaware_list'][$i]);
    }
    for ($i=0; $i <count($hardwares['Water Level']['hardaware_list']) ; $i++) { 
      $this->Api_data_db_table_model->get_hardwares_device_data_waterlevelmeter_report($hardwares['Water Level']['hardaware_list'][$i]);
    }
    for ($i=0; $i <count($hardwares['Firepump']['hardaware_list']) ; $i++) { 
      $this->Api_data_db_table_model->get_hardwares_device_data_firepump_report($hardwares['Firepump']['hardaware_list'][$i]);
    }
    for ($i=0; $i <count($hardwares['Hydro Pnematic System']['hardaware_list']) ; $i++) { 
     $this->Api_data_db_table_model->get_hardwares_device_data_hydro_report($hardwares['Hydro Pnematic System']['hardaware_list'][$i]);
    }
    for ($i=0; $i <count($hardwares['Water Meter']['hardaware_list']) ; $i++) { 
      $this->Api_data_db_table_model->get_hardwares_device_data_flowmeter_report($hardwares['Water Meter']['hardaware_list'][$i]);
    }
    for ($i=0; $i <count($hardwares['DG']['hardaware_list']) ; $i++) { 
      //echo json_encode($hardwares['DG']['hardaware_list']);die();
      $this->Api_data_db_table_model->get_hardwares_device_data_dg_report($hardwares['DG']['hardaware_list'][$i]);
    }
    if(isset($hardwares['Energy Meter']['hardaware_list'][0])){
     $this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report($hardwares['Energy Meter']['hardaware_list'][0]);
     $this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report($hardwares['Energy Meter']['hardaware_list'][0]);
     $this->Api_data_db_table_model->get_hardwares_device_data_energymeter_voltage_report($hardwares['Energy Meter']['hardaware_list'][0]);
     $this->Api_data_db_table_model->get_hardwares_device_data_power_factor_report($hardwares['Energy Meter']['hardaware_list'][0]);
      
    }
    
  }
  function push_vegas_cons_data1(){
		$this->Api_data_db_table_model->addVegasCons();
	}
  function push_unicef_cons_hourly_data(){
    // echo date('Y-m-d h:m:s');die();
    $yesterDay = date('Y-m-d',strtotime("-1 days"));
    // echo $yesterDay;
    $energydathrly=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_unicef_hourly(2024000527,$yesterDay,$yesterDay);
  }
  function push_unicef_cons_data(){
    $yesterDay = date('Y-m-d',strtotime("-1 days"));

    $watermeterdata=$this->Api_data_db_table_model->get_hardwares_device_data_flowmeter_report_unicef(2024000527,$yesterDay,$yesterDay);
    $energydat=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_unicef(2024000527,$yesterDay,$yesterDay);
   
    $current_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report_unicef(2024000527,$yesterDay,$yesterDay);
    // echo json_encode($current_data);die();
    // $data['current']=$energydat;
    $voltage_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_voltage_report_unicef(2024000527,$yesterDay,$yesterDay);
    // echo json_encode($voltage_data);
    // $data['voltage']=$energydat;

    $pf_data=$this->Api_data_db_table_model->get_hardwares_device_data_power_factor_report_unicef(2024000527,$yesterDay,$yesterDay);
    // echo json_encode($pf_data);
    // $data['power_factor_data']=$energydat;
}
  function push_undp_cons_hourly_data(){
    // echo date('Y-m-d h:m:s');die();
    $yesterDay = date('Y-m-d',strtotime("-1 days"));
    // echo $yesterDay;
    $energydathrly=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_undp_hourly(66,$yesterDay,$yesterDay);
  }
  function push_undp_cons_hourly_data_bkp(){
    // echo date('Y-m-d h:m:s');die();
    $first = '2024-11-15';
    $last = '2024-11-16';
    $tabl="hardware_station_consumption_data_undp_missing_2024";
    // echo $yesterDay;
    $energydathrly=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_undp_hourly_bkp(66,$first,$last,$tabl);
  }
  function push_undp_cons_data(){
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $energydat=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_undp(66,$yesterDay,$yesterDay);
       
        $current_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report_undp(66,$yesterDay,$yesterDay);
        // echo json_encode($current_data);die();
        // $data['current']=$energydat;
        $voltage_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_voltage_report_undp(66,$yesterDay,$yesterDay);
        // echo json_encode($voltage_data);
        // $data['voltage']=$energydat;

        $pf_data=$this->Api_data_db_table_model->get_hardwares_device_data_power_factor_report_undp(66,$yesterDay,$yesterDay);
        // echo json_encode($pf_data);
        // $data['power_factor_data']=$energydat;
	}
  function push_undp_cons_data_bkp(){
    $first = '2024-11-15';
    $last = '2024-11-16';
    $tabl="hardware_station_consumption_data_undp_missing_2024";
    $energydat=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_undp_bkp(66,$first,$last,$tabl);
   
    $current_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report_undp_bkp(66,$first,$last,$tabl);
    // echo json_encode($current_data);die();
    // $data['current']=$energydat;
   $voltage_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_voltage_report_undp_bkp(66,$first,$last,$tabl);
    // echo json_encode($voltage_data);
    // $data['voltage']=$energydat;

    $pf_data=$this->Api_data_db_table_model->get_hardwares_device_data_power_factor_report_undp_bkp(66,$first,$last,$tabl);
    // echo json_encode($pf_data);
    // $data['power_factor_data']=$energydat;
}
  function push_vegas_cons_data(){
   // $yesterDay = date('Y-m-d',strtotime("-1 days"));
    
    $first = date('Y-m-d',strtotime("-1 days"));
    $last = date('Y-m-d',strtotime("-1 days"));

    // $first = '2024-06-01';
    // $last = '2024-06-15';
    $energydat=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_vegas(2022000313,$first,$last);
    //echo json_encode($energydat);
   $current_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report_vegas(2022000313,$first,$last);
   // echo json_encode($current_data);die();
    // $data['current']=$energydat;
    $voltage_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_voltage_report_vegas(2022000313,$first,$last);
    // echo json_encode($voltage_data);
    // $data['voltage']=$energydat;

    $pf_data=$this->Api_data_db_table_model->get_hardwares_device_data_power_factor_report_vegas(2022000313,$first,$last);
    // echo json_encode($pf_data);
    // $data['power_factor_data']=$energydat;
}
  function vegas_ahu(){
      //  $fromdate='2024-07-01';
      //  $todate='2024-07-15';

       $fromdate = date('Y-m-d',strtotime("-1 days"));
       $todate = date('Y-m-d',strtotime("-1 days"));
        $meters = $this->Api_data_db_table_model->getHavcList_vega();
        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
       
		
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
        for($t=0;$t<count($datesarray);$t++){
          $this->Api_data_db_table_model->getahuReportVegas(2022000313,$meters,$datesarray[$t]);
        }
        
  }
  function all_reports_rsbrother_mail(){
		//echo "<pre>";print_r($_POST);exit();
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		//flowmeter start	
		$this->load->model('Api_data_model');
		
			$device_data=$this->Api_data_model->get_devices_list_rsbros();
		// echo json_encode($device_data);die();
			for ($i=0; $i <count($device_data) ; $i++) { 
				$dgdata[$i]=$this->Api_data_model->get_hardwares_device_data_dg_report_rsbro_mail($device_data[$i],$yesterDay,$device_data[$i]['from']);
				
				
			}
			//$data['dgdata']=$dgdata;
		
      $this->sendMail($dgdata);
			// echo json_encode($dgdata);die();



      
	}
  function sendMail($message){
    
    $sdate=date('Y-m-d',strtotime("-1 days"));
   
    $msg_data = '<b>Hi </b> ,<br /> Client Name :<b> RSBroGenerators</b><br />Your Generator Details on ' . $sdate . ' are as below :<br />No of Generators :'.count($message).'<br/><b>Vehicles Details are :</b><br />
                <br/><table border="1" bgcolor="#fffff0"><tr><th style=" background-color: #4CAF50; color: white; ">S.No</th><th style=" background-color: #4CAF50; color: white; ">Generator</th><th style=" background-color: #4CAF50; color: white; ">Running Hours</th><th style=" background-color: #4CAF50; color: white; ">Fuel Consumed(In Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Economy(Ltrs/Hr)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Added(In Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Removed(In Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Left(In Ltrs)</th></tr>'; // Set email format to HTML;
     for($i = 0;$i<sizeof($message);$i++){
       $j = $i+1;
       if($message[$i]['from']=='wis'){
        $msg_data .='<tr><td align="center">'.$j.'</td><td>'.$message[$i]['dgname']."(".$message[$i]['location'].")".'</td><td>'.$message[$i]['run'].'</td><td align="center">'.$message[$i]['fconsume'].'</td><td align="center">'.$message[$i]['economy'].'</td><td align="center">'.$message[$i]['fadd'].'</td><td align="center">0</td><td align="center">'.$message[$i]['availableFuel'].'</td></tr>'; 
       }else{
        $msg_data .='<tr><td align="center">'.$j.'</td><td>'.$message[$i]['dgname'].'</td><td>'.$message[$i]['run'].'</td><td align="center">'.$message[$i]['fconsume'].'</td><td align="center">'.$message[$i]['economy'].'</td><td align="center">'.$message[$i]['fadd'].'</td><td align="center">0</td><td align="center">'.$message[$i]['availableFuel'].'</td></tr>'; 
       }
       
  
     } 				
    $msg_data.=  '</table><br />Thanks and Regards,<br />Wenalytics Team<br />   ';
    
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'wenalyticsiot2022@gmail.com',
      'smtp_pass' => 'bfzopxbwgawwjner',
      'mailtype'  => 'html', 
      'charset' => 'utf-8',
      'wordwrap' => TRUE
 
    );
    // echo $msg_data;die();
    $this->load->library('email');
    $this->email->initialize($config);   
    $this->email->set_newline("\r\n"); 
    $this->email->set_mailtype("html");   
    $this->email->from('Wenalytics@gmail.com', 'Wenalytics');
    
    $list = array('alerts@rsbrothers.net','security@rsbrothers.net','amareshwar@rsbrothers.net','krishna@wenalytics.com');
    
    // $list = array('krishna@wenalytics.com');
    $this->email->to($list);
    $this->email->subject('Daily Mail');
    $this->email->message($msg_data);
    
 
    $this->email->send();
    
  }
    	
}