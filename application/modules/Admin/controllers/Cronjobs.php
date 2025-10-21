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
    // $first = "2025-07-27";
    // $last = "2025-08-05";
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
  function push_terotam_cons_hourly_data(){
    // echo date('Y-m-d h:m:s');die();
    $yesterDay = date('Y-m-d',strtotime("-1 days"));
    // echo $yesterDay;
    $energydathrly=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_terotam_hourly(2025000133,$yesterDay,$yesterDay);
  }
  function push_terotam_cons_data(){
    $yesterDay = date('Y-m-d',strtotime("-1 days"));

    
    $energydat=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_terotam(2025000133,$yesterDay,$yesterDay);
   
    $current_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report_terotam(2025000133,$yesterDay,$yesterDay);
    
    // echo json_encode($current_data);die();
    
    // $data['power_factor_data']=$energydat;
}
function push_undp_cons_data_single(){
  $yesterDay = date('Y-m-d',strtotime("-1 days"));

  
  $energydat=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_report_undp_single(66,$yesterDay,$yesterDay);
 
  // $current_data=$this->Api_data_db_table_model->get_hardwares_device_data_energymeter_current_report_terotam(2025000133,$yesterDay,$yesterDay);
  
  // echo json_encode($current_data);die();
  
  // $data['power_factor_data']=$energydat;
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
    $first = date('Y-m-d',strtotime("-1 days"));;
    $last = date('Y-m-d',strtotime("-1 days"));;
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

    // $first = '2025-10-03';
    // $last = '2025-10-06';
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
      //  $fromdate='2025-10-03';
      //  $todate='2025-10-06';

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
  function terotam_mail(){
		//echo "<pre>";print_r($_POST);exit();
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		//flowmeter start	
		$this->load->model('Api_data_model_tero');
		  $hardware_data=$this->Api_data_model_tero->get_hardwares_device_data_energy_meters_tero_mail($yesterDay);
      if($hardware_data['cons']>400){
        $this->sendMailTero($hardware_data);
      }
      
			//echo json_encode($hardware_data);die();



      
	}
  function sendMailTero($Result){
    
    //$sdate=date('Y-m-d',strtotime("-1 days"));
   
    // $msg_data = '<b>Hi </b> ,<br /> Client Name :<b> RSBroGenerators</b><br />Your Generator Details on ' . $sdate . ' are as below :<br />No of Generators :'.count($message).'<br/><b>Vehicles Details are :</b><br />
    //             <br/><table border="1" bgcolor="#fffff0"><tr><th style=" background-color: #4CAF50; color: white; ">S.No</th><th style=" background-color: #4CAF50; color: white; ">Generator</th><th style=" background-color: #4CAF50; color: white; ">Running Hours</th><th style=" background-color: #4CAF50; color: white; ">Fuel Consumed(In Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Economy(Ltrs/Hr)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Added(In Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Removed(In Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Left(In Ltrs)</th></tr>'; // Set email format to HTML;
    //  for($i = 0;$i<sizeof($message);$i++){
    //    $j = $i+1;
    //    if($message[$i]['from']=='wis'){
    //     $msg_data .='<tr><td align="center">'.$j.'</td><td>'.$message[$i]['dgname']."(".$message[$i]['location'].")".'</td><td>'.$message[$i]['run'].'</td><td align="center">'.$message[$i]['fconsume'].'</td><td align="center">'.$message[$i]['economy'].'</td><td align="center">'.$message[$i]['fadd'].'</td><td align="center">0</td><td align="center">'.$message[$i]['availableFuel'].'</td></tr>'; 
    //    }else{
    //     $msg_data .='<tr><td align="center">'.$j.'</td><td>'.$message[$i]['dgname'].'</td><td>'.$message[$i]['run'].'</td><td align="center">'.$message[$i]['fconsume'].'</td><td align="center">'.$message[$i]['economy'].'</td><td align="center">'.$message[$i]['fadd'].'</td><td align="center">0</td><td align="center">'.$message[$i]['availableFuel'].'</td></tr>'; 
    //    }
       
  
    //  } 				
    // $msg_data.=  '</table><br />Thanks and Regards,<br />Wenalytics Team<br />   ';
    $Body = '<!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    </head>
                    <body style="background: #F6F7F8; margin: 0; padding: 20px; border: 0; text-align: center;">
                        <table cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; max-width: 800px;" align="center" width="100%">
                            <tr>
                                <td style="padding: 20px;">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-family: \'Nunito\', Arial; font-size: 13px; color: #263238; text-align: left; padding-top: 20px; padding-bottom: 20px;">
                                                Dear <strong>Customer</strong>,
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: \'Nunito\', Arial; font-size: 13px; color: #263238; text-align: left; padding-top: 10px; padding-bottom: 20px;">
                                                 <strong>Alerts For Ganesh Meridian Site</strong>,
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: \'Nunito\', Arial; font-size: 13px; color: #263238; text-align: left;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td style="padding: 15px; border: 1px solid #E7ECEE;">
                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                <tr>
                                                                    <td style="font-family: \'Nunito\', Arial; font-size: 15px; font-weight: bold; color: #263238; padding-bottom: 10px; border-bottom: 1px solid #E7ECEE;">
                                                                    High Consumption Alert
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding-top: 10px; padding-bottom: 10px;">
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                            <tr>
                                                                                <td style="width: 25%; font-family: \'Nunito\', Arial; font-size: 13px; color: #263238; vertical-align: top; text-align: left;">Meter Name<br /><strong>EB BuildingA</strong>
                                                                                </td>
                                                                                
                                                                                <td style="width: 30%; font-family: \'Nunito\', Arial; font-size: 13px; color: #263238; vertical-align: top; text-align: left;">
                                                                                Date<br /><strong>' . $Result['date'] . '</strong>
                                                                                </td>
                                                                                <td style="width: 20%; font-family: \'Nunito\', Arial; font-size: 13px; color: #263238; vertical-align: top; text-align: left;">Consumption<br /><strong>' . $Result['cons'] . 'kWh</strong>
                                                                                <br />
                                                                                <small>(Threshold: Greater Than 400)</small>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: \'Nunito\', Arial; font-size: 13px; color: #263238;  text-align: left; padding-top: 20px;">
                                                Thank you.<br/><br />Best Regards,<br />
                                                <strong>Tero TAM</strong>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>';
    
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
    // echo $Body;die();
    $this->load->library('email');
    $this->email->initialize($config);   
    $this->email->set_newline("\r\n"); 
    $this->email->set_mailtype("html");   
    $this->email->from('Wenalytics@gmail.com', 'Wenalytics');
    
    $list = array('krishna@wenalytics.com');
    
    // $list = array('krishna@wenalytics.com');
    $this->email->to($list);
    $this->email->subject('High Consumption Alert');
    $this->email->message($Body);
    
 
    $this->email->send();
    
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