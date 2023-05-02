<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Cronjobs extends MX_Controller  {
    
	
    public function __construct() {
       parent::__construct();
      
       $this->load->model('Api_data_model');
      
       
    }
       
    
    function push_water_level_data(){
		$device_data=$this->Api_data_model->addWaterLevel();
	}
    function push_water_level_graph_data(){
		$device_data=$this->Api_data_model->get_hardwares_device_data_waterlevelmeter_report_mum_db();
	}
    	
}