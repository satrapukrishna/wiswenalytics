<?php
   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
require(APPPATH.'/libraries/REST_Controller.php');
     
class UsaServices extends REST_Controller  {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('Usa_model');
       
    }
    function getEmbassyDataLive_get(){
        date_default_timezone_set('America/Chicago');
		$date= date('Y-m-d');
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
		$week = date('Y-m-d',strtotime("-7 days"));
        $devices=$this->Usa_model->getDevicesData();
        $embassy_data = $this->Usa_model->getEmbessyData($date,$yesterDay,$week,$devices);
        if($embassy_data != ''){


            $this->response([
                     'status' => TRUE,
                     'data' => $embassy_data,
                 ], REST_Controller::HTTP_OK);
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'No Data.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }
    }
    function getEmbassyDataReport_get(){
        date_default_timezone_set('America/Chicago');
        $date = $this->get('date');
        $startDay = date( "Y-m-d", strtotime( "$date -1 day" ) );
        $endDay = date( "Y-m-d", strtotime( "$date -7 day" ) );
        //echo date('M d, Y', $date);
        
       $devices=$this->Usa_model->getDevicesData();
        $embassy_data = $this->Usa_model->getEmbessyReportData($endDay,$startDay,$devices);
        if($embassy_data != ''){


            $this->response([
                     'status' => TRUE,
                     'data' => $embassy_data,
                 ], REST_Controller::HTTP_OK);
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'No Data.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }
    } 
    function getEmbassyData_get(){
        date_default_timezone_set('America/Chicago');
        $fdate = $this->get('fromdate');
        $tdate = $this->get('todate');
        $startDay = date( "Y-m-d", strtotime($fdate) );
        $endDay = date( "Y-m-d", strtotime($tdate) );
        //echo date('M d, Y', $date);
        
       $devices=$this->Usa_model->getDevicesData();
       $utility=$this->Usa_model->getUtilityData();
        $embassy_data = $this->Usa_model->getEmbessyFullData($startDay,$endDay,$devices,$utility);
        if($embassy_data != ''){


            $this->response([
                    $embassy_data,
                 ], REST_Controller::HTTP_OK);
             }else{
                 $this->response([
                     'status' => FALSE,
                     'message' => 'No Data.'
                 ], REST_Controller::HTTP_BAD_REQUEST);
             }
    }  
    
    

    	
}