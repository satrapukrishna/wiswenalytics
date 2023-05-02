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
       $this->load->model('Services_model');
       
    }
       
    public function login_post() {
        
        // Get the post data
        
        $email = $this->post('email');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
           
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email_id' => $email,
                'password' => md5($password),
                'status' => 1
            );
            $user = $this->Restapi_model->getRows($con);
           // print_r($con);die();
            if($user){ 
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
                    'message' => 'Wrong email or password.',
                    'data' => (object)[]
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'Provide email and password.'
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
    public function getFirepumpRunReport_get(){
        $clid = $this->get('client_id');
        echo $clid;die();
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
        print_r($pumps->result());die();
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
            
            for ($n=0; $n < count($pumps->result()); $n++)
            {
                echo $rec->api_name;die();
                $fp_data[$n]['hardware_name']=$rec->api_name;
                $fp_data[$n]['running_hrs']='00:00:00';
                $fp_data[$n]['status']=1;
                $fp_data[$n]['date']=$datesarray[$k];
                
                
            }
            $fp_data1[$k]=$fp_data

            
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