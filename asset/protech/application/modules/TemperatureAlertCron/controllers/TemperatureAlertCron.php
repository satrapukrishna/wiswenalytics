<?php
class TemperatureAlertCron extends CI_Controller
{
	function __construct(){
        parent::__construct();
        $this->load->model('TempCronModel');
    }
	function RunCron(){
		$alerts = $this->TempCronModel->getActiveAlerts();
		echo "<pre>";print_r($alerts);
		$curTime = date('H:i:s');
		foreach ($alerts as $value) {
			$day = str_replace(", ",",",$value->days);
			$days = explode(",", $day);
			foreach ($days as $today) {
				if($today == date('l') && (strtotime($value->from_time)<=strtotime($curTime)) && (strtotime($curTime)<=strtotime($value->to_time))){
					echo $curTime." ".$value->from_time." ".$value->to_time."<br>";
					$meters = str_replace(", ",",",$value->meter_name);
					$metersarr = explode(",",$meters);
					print_r($metersarr);

				}
			}
		}
	
	}
}
?>