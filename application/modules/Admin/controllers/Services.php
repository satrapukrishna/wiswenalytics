<?php
   
require(APPPATH.'/libraries/REST_Controller.php');
     
class Services extends REST_Controller  {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('Restapi_model');
       $this->load->model('Api_data_model');
       $this->load->model('Services_model');
       
    }
       
    public function login_post() {
        
        // Get the post data
        
        $username = $this->post('username');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($username) && !empty($password)){
           
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'username' => $username,
                'password' => md5($password),
                'status' => 1
            );
            $user = $this->Restapi_model->getRows($con);
            $user['client_id']=$user['created_by'];
           // print_r($user);die();
            if($user['emp_id']){ 
                $tokendata = array(
                    'fb_token' => $this->post('fb_token'),
                    'emp_id' => $user['emp_id'],
                    'created_date' => date('Y-m-d H:i:s'),
                    'date'    => date('Y-m-d')
                );
                $this->Services_model->addTokenInfo($tokendata);
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response([
                    'status' => FALSE,
                    'message' => 'Wrong username or password.',
                    'data' => (object)[]
                ], REST_Controller::HTTP_UNAUTHORIZED);
            }
        }else{
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'Provide username and password.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getEmpDevices_get(){
        $emp_id = $this->get('emp_id');
        if($emp_id != '' || $emp_id != NULL){
            $data_emp=$this->Services_model->get_employee_by_id($emp_id);
            if(count($data_emp)>0){
                $categories=$this->Services_model->get_categories();
                $icon=site_url()."asset/admin/img/";
        
                foreach($categories as $cat){
                    $data_water=$this->Services_model->get_devices($cat['category_id']);
                    
                    //$data_per_device['category_icon'][]=$icon.$cat['menu_icon'];
                    $data_device=array();
        
                        foreach($data_water->result_array() as $res){
                           
                            $per=strtolower($res['category_name']).'_'.str_replace(" ","-",$res['device_name']);
                            
                            if(in_array($per,explode(',',$data_emp['permissions']))){
                                $data_device['category_name']=$cat['category_name'];
                                $data_device['category_id']=$cat['category_id'];
                                $data_device['category_icon']=$icon.$cat['menu_icon'];
                                $data_device['device_list'][]=array("device_name"=>$res['device_name'],"device_id"=>$res['device_id'],"menu_icon"=>$icon.$res['menu_icon'],"dashboard_icon"=>$icon.$res['dashboard_icon']);
                            }
                        }
                        if(count($data_device) !=0){
                            $data_per_device[]=$data_device;
                        }
                      
                        
                }
               
                $this->response([
                    'status' => TRUE,
                    'message' => 'Device Lists.',
                    'data' => $data_per_device
                ], REST_Controller::HTTP_OK);

            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Employee does not exist.'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
           
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Provide Employee ID.'
            ], REST_Controller::HTTP_BAD_REQUEST);

        }
        
    }
    
    function getHardwareData_get(){
        $client_id = $this->get('client_id');
        $device_id = $this->get('device_id');
        
        if(($client_id != '' || $client_id != NULL) &&  ($device_id != '' || $device_id != NULL) ){
            $data_hardware_list=$this->Services_model->get_hardwares_device_list($client_id,$device_id);
            if(count($data_hardware_list)>0){
                $hardware_data=array();
            $data['device_name']=$data_hardware_list[0]['device_name'];
            for ($i=0; $i <count($data_hardware_list) ; $i++) { 
                if($device_id==19){ //water level
                    if($client_id==26){
                        $hardware_data=$this->Services_model->get_hardwares_device_data_waterlevelmeter_mum($data_hardware_list[0]);
                    }else{
                        $hardware_data[]=$this->Services_model->get_hardwares_device_data_waterlevelmeter($data_hardware_list[$i]);
                    }
                    
                }

                if($device_id==34){ //Flow Meter
                    $hardware_data[]=$this->Services_model->get_hardwares_device_data_flowmeter($data_hardware_list[$i]);
                }
                if($device_id==25){ //Water Meter
                    $hardware_data[]=$this->Services_model->get_hardwares_device_data_flowmeter($data_hardware_list[$i]);
                }

                if($device_id==28){ //DG
                    $hardware_data[]=$this->Services_model->get_hardwares_device_data_dg($data_hardware_list[$i]);
                }

                if($device_id==48){ //Power Supply
                    $hardware_data[]=$this->Services_model->get_hardwares_device_data_power($data_hardware_list[$i]);
                }
                if($device_id==41){ //energy meter
                    $hardware_data=$this->Services_model->get_hardwares_device_data_energy_meters($data_hardware_list[$i]);
                }
                // if($device_id==40){ //switch status
                //     $hardware_data[]=$this->Services_model->get_hardwares_device_data_switch_status($data_hardware_list[0]);
                // }
                
            }
            if($device_id==35){ //switch Control
                $hardware_data=$this->Services_model->get_hardwares_device_data_switch_control($data_hardware_list[0]);
            }
            if($device_id==40){ //switch status
                $hardware_data=$this->Services_model->get_hardwares_device_data_switch_status($data_hardware_list[0]);
            }
            if($device_id==20){ //Firepump
                $hardware_data=$this->Services_model->get_hardwares_device_data_firepump($data_hardware_list[0]);
            }
            if($device_id==26){ //hydro pnematic
                $hardware_data=$this->Services_model->get_hardwares_device_data_hydro($data_hardware_list[0]);
            }
            $data['hardware_data']=$hardware_data;
            $this->response([
                'status' => TRUE,
               // 'message' => 'Hardware Lists.',
                'data' => $data
            ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Client or Device Id does not exist.'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
            //echo count($data_hardware_list);die();
            
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Provide Client And Device ID.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }


    }
    function getUnreadNotifications_get(){
       $client_id=$this->get('client_id');
       $emp_id=$this->get('emp_id');
       if($client_id != '' || $client_id != NULL){
       $alert_data = $this->Services_model->unreadNotification($client_id);
       $alerts_count=count($alert_data);

       $this->response([
                'status' => TRUE,
               // 'message' => 'Hardware Lists.',
                'unread_count' => $alerts_count,
                'unread_data' => $alert_data,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Provide Client ID.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }
    function getUnreadWaterMeterNotifications_get(){
        $client_id=$this->get('client_id');
        $emp_id=$this->get('emp_id');
        if($client_id != '' || $client_id != NULL){
        $alert_data = $this->Services_model->unreadWaterMeterNotification($client_id,$emp_id);
        $alerts_count=count($alert_data);
 
        $this->response([
                 'status' => TRUE,
                // 'message' => 'Hardware Lists.',
                 'unread_count' => $alerts_count,
                 'unread_data' => $alert_data,
             ], REST_Controller::HTTP_OK);
         }else{
             $this->response([
                 'status' => FALSE,
                 'message' => 'Provide Client ID.'
             ], REST_Controller::HTTP_BAD_REQUEST);
         }
 
     }
    function updateNotification_get(){
		$alert_id=$this->get('alert_id');
        if($alert_id != '' || $alert_id != NULL){
            $this->load->model('Alert_model');       
		$data = $this->Alert_model->get_alert($alert_id);
		$this->db->where('alert_id', $alert_id);
        $res = $this->db->update('alerts', array('alert_read'=>1));

		if($data){
			$this->response([
                'status' => TRUE,
                'message' => 'Alert Updated',
            ], REST_Controller::HTTP_OK);
		}else{
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Alert Id',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Please Provide alert id.',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
		
	}
    function updateWaterMeterNotification_get(){
		$alert_id=$this->get('alert_id');
        if($alert_id != '' || $alert_id != NULL){
            $this->load->model('Alert_model');       
		$data = $this->Alert_model->get_water_meter_alert($alert_id);
		$this->db->where('alert_id', $alert_id);
        $res = $this->db->update('water_meter_alerts', array('alert_read'=>1));

		if($data){
			$this->response([
                'status' => TRUE,
                'message' => 'Alert Updated',
            ], REST_Controller::HTTP_OK);
		}else{
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Alert Id',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Please Provide alert id.',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
		
	}
    function getReadNotifications_get(){
        $client_id=$this->get('client_id');
        $emp_id=$this->get('emp_id');
       if($client_id != '' || $client_id != NULL){
       $alert_data = $this->Services_model->readNotification($client_id);
       $alerts_count=count($alert_data);

       $this->response([
                'status' => TRUE,
               // 'message' => 'Hardware Lists.',
                'read_count' => $alerts_count,
                'read_data' => $alert_data,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Provide Client ID.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }
    function getReadWaterMeterNotifications_get(){
        $client_id=$this->get('client_id');
        $emp_id=$this->get('emp_id');
       if($client_id != '' || $client_id != NULL){
       $alert_data = $this->Services_model->readWaterMeterNotification($client_id,$emp_id);
       $alerts_count=count($alert_data);

       $this->response([
                'status' => TRUE,
               // 'message' => 'Hardware Lists.',
                'read_count' => $alerts_count,
                'read_data' => $alert_data,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Provide Client ID.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    function getMeterList_get(){
        $emp_id=$this->get('emp_id');
        if($emp_id != '' || $emp_id != NULL){
            $schedule_data = $this->Services_model->getSchedules($emp_id);
            // $i=0;
            // date_default_timezone_set('Asia/Kolkata');
            // $now=date('H:m:s',strtotime(date('Y-m-d h:i:s A')));            ;
            // foreach($schedule_data as $rec){
            //     //$check_schedule=$this->Services_model->checkSchedules($rec['schedule_id']);
            //     $res[$i]['schedule_id']=$rec['schedule_id']; 
            //     $res[$i]['meter_id']=$rec['meter_id'];
            //     $res[$i]['meter_name']=$rec['dashboard_name'];
            //     $fr=strtotime(date('H:m:s', strtotime(date('Y-m-d')." ".$rec['to_reading'])));
            //     $pr=strtotime($now);

            //     $res[$i]['schedueled_at']=date('h A', strtotime($rec['to_reading']));
                
            //     $diff=abs($fr-$pr);
            //     if(($fr-$pr)>0){
            //         $res[$i]['schedueled_delay']="NA";
            //     }else{
            //         $res[$i]['schedueled_delay']=floor($diff / 3600)." Hours ".floor(($diff / 60) % 60)." Mins";
                     
            //     }

            //     $i++;
                
                

            // }
            
     
            $this->response([
                     'status' => TRUE,
                    
                     'meter_list' => $schedule_data,
                 ], REST_Controller::HTTP_OK);
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'Provide Employee ID.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }


    }
    function checkReading_get(){
        $emp_id=$this->get('emp_id');
        $meter_id=$this->get('meter_id');
        if($meter_id != '' || $meter_id != NULL){
            $meter_data = $this->Services_model->getSchedulesbyid($emp_id,$meter_id);
            $check_data = $this->Services_model->checkReading($meter_id);
            
            if(count($check_data)>0){
                $check_data[0]['emp_name']=$this->Services_model->empName($check_data[0]['emp_id']);
                $yesterdayread=$this->Services_model->getDifference($meter_id);
                if($yesterdayread != 0){
                    $check_data[0]['difference']=(string)abs($check_data[0]['meter_reading']-$yesterdayread);
                }else{
                    $check_data[0]['difference']="NA";
                }
                $this->response([
                    'status' => TRUE,                   
                    'meter_data' => $meter_data,
                    'meter_reading_data' => $check_data,
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'meter_data' => $meter_data,
                    'meter_reading_data' => array(),
                ], REST_Controller::HTTP_OK);
            }
            


        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Provide Meter ID.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    function getQRData_get(){
        $emp_id=$this->get('emp_id');
        $qr_id=$this->get('qr_id');
        $client_id = $this->Services_model->get_clientid($emp_id);
        $device_id=25;
        $qrcode=(string)$qr_id;
        $hid_qr=$client_id.$device_id;
       // echo $hid_qr;
        $meter_id=str_replace($hid_qr,'',$qrcode);
        //print_r($g);
        if($emp_id != '' || $emp_id != NULL){
            $meter_data = $this->Services_model->getSchedulesbyid($emp_id,$meter_id);
            // $i=0;
            // date_default_timezone_set('Asia/Kolkata');
            // $now=date('H:m:s',strtotime(date('Y-m-d h:i:s A')));            ;
            // foreach($schedule_data as $rec){
            //     //$check_schedule=$this->Services_model->checkSchedules($rec['schedule_id']);
            //     $res[$i]['schedule_id']=$rec['schedule_id']; 
            //     $res[$i]['meter_id']=$rec['meter_id'];
            //     $res[$i]['meter_name']=$rec['dashboard_name'];
            //     $fr=strtotime(date('H:m:s', strtotime(date('Y-m-d')." ".$rec['to_reading'])));
            //     $pr=strtotime($now);

            //     $res[$i]['schedueled_at']=date('h A', strtotime($rec['to_reading']));
                
            //     $diff=abs($fr-$pr);
            //     if(($fr-$pr)>0){
            //         $res[$i]['schedueled_delay']="NA";
            //     }else{
            //         $res[$i]['schedueled_delay']=floor($diff / 3600)." Hours ".floor(($diff / 60) % 60)." Mins";
                     
            //     }

            //     $i++;
                
                

            // }
            
     
            $check_data = $this->Services_model->checkReading($meter_id);
           
            if(count($check_data)>0){
                $check_data[0]['emp_name']=$this->Services_model->empName($check_data[0]['emp_id']);
                $yesterdayread=$this->Services_model->getDifference($meter_id);
                if($yesterdayread != 0){
                    $check_data[0]['difference']=(string)abs($check_data[0]['meter_reading']-$yesterdayread);
                }else{
                    $check_data[0]['difference']="NA";
                }
                $this->response([
                    'status' => TRUE,
                   
                    'meter_data' => $meter_data,
                    'meter_reading_data' => $check_data,
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => TRUE,
                   
                    'meter_data' => $meter_data,
                    'meter_reading_data' => array(),
                ], REST_Controller::HTTP_OK);
            }
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'Provide Employee ID.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }


    }
    function updateVersion_post(){
        
        $app_name = $this->post('app_name');
        $id = $this->post('id');
        $version = $this->post('version');
        $playstore_link = $this->post('playstore_link');
        
        if($app_name != '' || $version != NULL){
           
        $vdata=array(
            'id' => $id,
           // 'app_name' => $app_name,                
            'playstore_link' => $playstore_link,
            'version' => $version
            
        );
       $res = $this->Services_model->update_version($vdata,$id);
        
 
        $this->response([
                 'status' => TRUE,                    
                 'message' => 'Update Successfully.',
                 'data' => $res
             ], REST_Controller::HTTP_OK);
            
            
            
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'Provide App Name And Version.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }


    }
    function getVersion_get(){
        $app_id=$this->get('app_id');
        $operator=$this->get('operator');
        $version_data=$this->Services_model->get_version($app_id,$operator);
        if($app_id !='' && $operator != ''){
            $this->response([
                'status' => TRUE,
               // 'message' => 'Hardware Lists.',
                'data' => $version_data
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' =>'Provide App Id and Operator.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }
    function addMeterReadings_post(){
        $this->load->model('Upload_model');
        $meter_id = $this->post('meter_id');
        $meter_reading = $this->post('meter_reading');
        $schedule_id = $this->post('schedule_id');
        
        $emp_id = $this->post('emp_id');
        



        if($emp_id != '' || $emp_id != NULL){
            $client_id = $this->Services_model->get_clientid($emp_id);
            $meter_name = $this->Services_model->get_meter_name($meter_id); 
            $location_name = $this->Services_model->get_location_name($meter_id); 
            $yesterdayread=$this->Services_model->getDifference($meter_id);
            if($yesterdayread=='0'){
                
                $image = '';
                $time = time();
                if ($_FILES['photo']['name'] != '') {
                $file_upl_data = $this->Upload_model->uploadDocuments('photo', 'scheduled_doc');
                // echo "<pre>";print_r($file_upl_data);
                if ($file_upl_data['success'] == 1){
                $image = $file_upl_data['file_name']; 
                
           }
        }
        $pdata=array(
            'meter_id' => $meter_id,
            'meter_name' => $meter_name,                
            'meter_reading' => $meter_reading,
            'meter_photo' => base_url()."asset/admin/scheduled_doc/".$image,
            'client_id' => $client_id,
            'emp_id' => $emp_id,                
            'schedule_id' => $schedule_id,
            'location' => $location_name,
            'reading_from' => "Mobile",
            'created_date' => date('Y-m-d H:i:s'),
            'updated_date' => date('Y-m-d H:i:s'),
            'date' => date('Y-m-d')              


        );
       $res = $this->Services_model->insert_schedules($pdata);
        
 
        $this->response([
                 'status' => TRUE,                    
                 'message' => 'Insert Successfully.',
             ], REST_Controller::HTTP_OK);
            }else{
                if( $yesterdayread>$meter_reading){
                    $this->response([
                        'status' => FALSE,
                        'message' => 'In Correct Reading.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }else{
                    $image = '';
                    $time = time();
                    if ($_FILES['photo']['name'] != '') {
                    $file_upl_data = $this->Upload_model->uploadDocuments('photo', 'scheduled_doc');
                    // echo "<pre>";print_r($file_upl_data);
                    if ($file_upl_data['success'] == 1){
                    $image = $file_upl_data['file_name']; 
                    
               }
            }
            $pdata=array(
                'meter_id' => $meter_id,
                'meter_name' => $meter_name,                
                'meter_reading' => $meter_reading,
                'meter_photo' => base_url()."asset/admin/scheduled_doc/".$image,
                'client_id' => $client_id,
                'emp_id' => $emp_id,                
                'schedule_id' => $schedule_id,
                'location' => $location_name,
                'reading_from' => "Mobile",
                'created_date' => date('Y-m-d H:i:s'),
                'updated_date' => date('Y-m-d H:i:s'),
                'date' => date('Y-m-d')              
    
    
            );
           $res = $this->Services_model->insert_schedules($pdata);
            
     
            $this->response([
                     'status' => TRUE,                    
                     'message' => 'Insert Successfully.',
                 ], REST_Controller::HTTP_OK);
                }
            }
            
            
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'Provide Employee ID.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }


    }

    public function getFirepumpList_get(){
        $clid = $this->get('clientid');
        //SELECT DISTINCT `hardware_device` FROM `hardware` WHERE client_id=21 and hardware_category=5 and hardware_device IN(20,39)
        $fdata=array();
        for ($i=0; $i < 3; $i++) {
            if($i==0){
            $fdata[$i]['location']= 'Reports';
            $fdata[$i]['location_id']= $i;
            $fdata[$i]['hardware']= 'Reports';
            $fdata[$i]['img_base_url']=base_url()."asset/admin/img/";
            $fdata[$i]['menuicon']='device_icon_20200715211109.png';
            $fdata[$i]['dashboardicon']='device_icon_20200715211109.png';
            }else{
            $fdata[$i]['location']= 'Chennai Building '.$i;
            $fdata[$i]['location_id']= $i;
            $fdata[$i]['hardware']= 'FirePump'.$i;
            $fdata[$i]['img_base_url']=base_url()."asset/admin/img/";
            $fdata[$i]['menuicon']='device_icon_20200715211109.png';
            $fdata[$i]['dashboardicon']='device_icon_20200715211109.png';
            }
            

            
        }
   

        
        $this->response([
            'status' => TRUE,
            'message' => 'Fire Pump Location Lists.',
            'client_id'=>$clid,
            'data' => $fdata
        ], REST_Controller::HTTP_OK);

    }
    public function getFirepumpData_get(){
        $clid = $this->get('clientid');
        $locid = $this->get('locid');
        $empid = $this->get('empid');
        $mdata=array();
        if($clid!='' && $locid!='' && $empid!=''){
            $con = array(
                'hardware_category' => 5,
                'hardware_device' => 20,
                'client_id' => $clid);
            $pumps = $this->Services_model->get_firepumphardwaredata($con);
            $ddata=$this->Services_model->get_devices_bydid(20);
            $mdata['device_name']=$ddata->result();
            $mdata['img_base_url']=base_url()."asset/admin/img/";
            $mdata['firepump_data']=array();
            $mdata['pressure_data']=array();
            $mdata['dg_data']=array();
    
            $sump_search=array('station_id'=>2020000005,
                        'api_name'=>'CT_1-6');
                        $Sump_data=$this->Services_model->getWaterLevel($sump_search);
                        $mdata['firesump_data']=$Sump_data;
             $pressure_search=array('station_id'=>2020000005,
                        'LineConnected'=>'Pressure');
                        $pressure_data=$this->Services_model->getPressureToday($pressure_search);
                        $mdata['pressure_data']=$pressure_data;
    
            $dg_data=array('dg_name'=>'DG 01',
                        'fuel_consumed'=>'10 Ltrs',
                        'running_hrs'=>'05:25:50',
                        'fuel_added'=>'0',
                        'fuel_remove'=>'0',
                        'current_fuel'=>'70 Ltrs',
                        'battaery_voltage'=>'23 voolts',
                        'status'=>1,
                        'switch_status'=>'AUTO');
                        $mdata['dg_data']=$dg_data;
                    
                        
          $p=0;
            foreach ($pumps->result() as $rec)
                    {
                        $api_search=array('station_id'=>$rec->station_id,
                        'api_name'=>$rec->api_name,
                        'LineConnected'=>$rec->LineConnected,
                        'LineConnectedAuto'=>$rec->LineConnectedAuto,
                        'LineConnectedManual'=>$rec->LineConnectedManual);
                        $pump_api[$p]=$this->Services_model->getDashBoardData($api_search);
                        $p++;
                    }
                $mdata['firepump_data']=$pump_api;
            $this->response([
                'status' => TRUE,
                'message' => 'FirePump Data.',
                'client_id'=>$clid,
                'data' => $mdata
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No FirePump Data.',
                'client_id'=>$clid,
                'data' => $mdata
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
      
      

    }
    public function getFirepumpDGReport_get(){
        $clid = $this->get('client_id');
        $locid = $this->get('location_id');
        $empid = $this->get('emp_id');
        $hardware = $this->get('hardware');

        $fromdate = $this->get('fromdate');
        $todate =  $this->get('todate');
        $fromtime = $this->get('fromtime');
        $totime =$this->get('totime');


        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
        //print_r($datesarray);die();
        for ($k=0; $k < count($datesarray); $k++)
        {
            $dg_data[$k]=array('dg_name'=>$hardware,
            'fuel_consumed'=>'0 Ltrs',
            'running_hrs'=>'00:00:00',
            'fuel_added'=>'0',
            'fuel_remove'=>'0',
            'current_fuel'=>'70 Ltrs',
            'battaery_voltage'=>'23 voolts',
            'status'=>1,
            'date'=>$datesarray[$k]); 
        }

        $mdata['dg_data']=$dg_data;
      // print_r($pumps);die();
        $this->response([
            'status' => TRUE,
            'message' => 'DG Report.',
            'client_id'=>$clid,
            'data' => $mdata
        ], REST_Controller::HTTP_OK);

    }
    function getVegasSchoolData_post(){
        // $StationId=$this->post('StationId');
        // $QueryDate=$this->post('QueryDate');
        $StationId=$this->post('StationId');
        $QueryDate=$this->post('QueryDate');
        if($StationId != '' || $QueryDate != ''){
            $table_name="hardware_station_consumption_data_vegaschool";
            $ktop=array("Chiller-II","Main Incomer");

         
         $i=0;
         $result=array();
        //  echo count($data);die();

        $k=0;
         for ($i=0; $i <count($ktop) ; $i++) { 
            $data = $this->Services_model->getVegasData($StationId,$QueryDate,$table_name,$ktop[$i]);
            for ($l=0; $l < count($data); $l++) { 
                if ($ktop[$i]=="Chiller-II" || $ktop[$i]=="Main Incomer"){
                    $result[$k] = $this->Services_model->getVegasAllData($StationId,$QueryDate,$table_name,$ktop[$i],$data[$l]['TxnTime'],$data[$l]['TxnDate'],$data[$l]['FromTime'],$data[$l]['ToTime']); 
                    $k++;
                    }
            }
            
         }
        //  foreach ($data as $row) {
        //    // print_r($row);die();
        //     $result[$i] = $this->Services_model->getVegasAllData($StationId,$QueryDate,$table_name,$row['UtilityName'],$row['TxnTime'],$row['TxnDate'],$row['FromTime'],$row['ToTime']);
        //    // Current_1,Current_2,Current_3,Voltage_1,Voltage_2,Voltage_3,kWh,kW,PF
        //    // $result[$i]=$data;
        //     $i++;
        //  }
 
        $this->response(
            $result
             , REST_Controller::HTTP_OK);
         }else{
             $this->response([
                 'status' => FALSE,
                 'message' => 'Please Provide Station Id and Date.'
             ], REST_Controller::HTTP_BAD_REQUEST);
         }
 
     }
    public function getFirepumpRunReport_get(){
        $clid = $this->get('client_id');
        //echo $clid;die();
        $locid = $this->get('location_id');
        $empid = $this->get('emp_id');
        //$hardware = $this->get('hardware');

        $fromdate = $this->get('fromdate');
        $todate =  $this->get('todate');
        $fromtime = $this->get('fromtime');
        $totime =$this->get('totime');

        $con = array(
            'hardware_category' => 5,
            'hardware_device' => 20,
            'client_id' => $clid);
        $pumps = $this->Services_model->get_firepumphardwaredata($con);
        $pumpDetails=$pumps->result();
        //print_r($pumpDetails[0]->api_name);die();
        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
        //print_r($datesarray);die();
        for ($k=0; $k < count($datesarray); $k++)
        {
            
            for ($n=0; $n < count($pumpDetails); $n++)
            {
                //echo $rec->api_name;die();
                $fp_data[$n]['hardware_name']=$pumpDetails[$n]->api_name;
                $fp_data[$n]['running_hrs']='2';
                $fp_data[$n]['status']=1;
                $fp_data[$n]['date']=$datesarray[$k];
                
                
            }
            $fp_data1[$k]=$fp_data;

            
        }

        $mdata['fp_data']=$fp_data1;
      // print_r($pumps);die();
        $this->response([
            'status' => TRUE,
            'message' => 'Firepump Report.',
            'client_id'=>$clid,
            'data' => $mdata
        ], REST_Controller::HTTP_OK);

    }
    
    

    	
}