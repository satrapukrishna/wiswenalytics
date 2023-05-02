<?php

class Temperature extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('TemperatureModel');
	}
	
  function temperatureView()
	{
		$meters = $this->TemperatureModel->getMetersList();
		$data['meters'] = $this->getMeterNames($meters);
		$this->load->view('temperatureView',$data);
		
	}
	
	/*this function will fetch the selected meters in the required formate*/
	private function getMeterNames($meters){
		$result = array();
		$i = 0;
		foreach ($meters as $value) {
		    $result[$i] = $value->UtilityName;
		    $i++;
		}
		return $result;
	}
	function get_weekdays($s,$e){
		$days = array();$i = 0;$j = 0;
		$date_from = strtotime($s); // Convert date to a UNIX timestamp   
		$date_to = strtotime($e); // Convert date to a UNIX timestamp  
		// Loop from the start date to end date and output all dates inbetween  
		for ($i=$date_from; $i<=$date_to; $i+=86400) {  
		    $s1 = date("Y-m-d", $i); 
		    $dayOfWeek = date("l", strtotime($s1));
		    $days[$j]['date'] = $s1;
		    $days[$j]['day'] = $dayOfWeek;
		    $j++;
		} 
	    return $days;
	}
	function get_hours_bw($s,$e){
		$timings = array();
		$from = strtotime($s);
		$time = date("H:i:s",$from);
		$timings[0] = $time;
		$to = strtotime($e);
		$i =1;
		//$from += 3600;
		while($from!=$to){
			$from += 3600;
			$time = date("H:i:s",$from);
			if($timings[$i-1] == '23:00:00' && $time == '00:00:00'){
				$timings[$i] = '24:00:00';
			}else{
				$timings[$i] = $time;
			}
			$i++;
		}
		return $timings;
	}
	function get_days ( $s, $e ,$day) 
	{ 
	    $days = array();$i = 0;
	    if(strtotime($s) == strtotime($e)){
	    	$s = date ("Y-m-d", strtotime($s));
		    	

	    	$dayOfWeek = date("l", strtotime($s));

	    	if($dayOfWeek == $day){
	    		$days[$i] = $s;
	    		$i++;
	    	}
	    }else{
	    	while (strtotime($s) < strtotime($e)) {

		    	$s = date ("Y-m-d", strtotime("+1 days", strtotime($s)));
		    	

		    	$dayOfWeek = date("l", strtotime($s));

		    	if($dayOfWeek == $day){
		    		$days[$i] = $s;
		    		$i++;
		    	}
		    }
	    }
	    

	    return $days;
	}
	function getTemperatureMeterReport(){
		$data = $this->input->get();
		//print_r($data);die();
		$location = "";
		$meter_name = "";
		//echo "<pre>";print_r($data);
		$meterData = explode("_", $data['meter']);
		//echo "<pre>";print_r($meterData);die();
		$days = $this->get_weekdays( $data['fromdate'],$data['todate']);
		$noofdays = count($days);
		//echo $noofdays;die();
		$hours = $this->get_hours_bw($data['fromtime'],$data['totime']);
		$result['input'] = $data;

		    $meter_name = $meterData[0];
		    $location = $meterData[1];
			
			//echo $meter_name." ".$location;
			//print_r($hours);
			if(!$data['day']){
			//echo "not set";

			$i = 0; 
			if($noofdays == 1){
				$result['hours'] = $hours;
				for ($j=0; $j < (count($hours)-1); $j++) { 
					$res[$j] = $this->TemperatureModel->getTempMeterPerHour($meter_name,$location,$days[0]['date'],$hours[$j],$hours[$j+1]);
				}
				$result['result'] = $res;
				echo json_encode($result);
			}else{
				$days_graph = array();
				$days_graph[0] = 'yyyy-mm-dd';
				foreach ($days as $val) { 
					$days_graph[$i+1] = $val['date'];
					$res[$i] = $this->TemperatureModel->getTempMeterPerDay($meter_name,$location,$val['date'],$data['fromtime'],$data['totime']);
					$i++;

				}
				$result['hours'] = $days_graph;
				$result['result'] = $res;
				echo json_encode($result);
			}
		}else{
			//echo " set";
			$days = $this->get_days( $data['fromdate'],$data['todate'],$data['day']);
			//echo count($days);die();
			if(count($days)>0){
				$noofdays = count($days);
			//echo $noofdays;
			//print_r($days);die();

			$i = 0; 
			if($noofdays == 1){
				$result['hours'] = $hours;
				for ($j=0; $j < (count($hours)-1); $j++) { 
					$res[$j] = $this->TemperatureModel->getTempMeterPerHour($meter_name,$location,$days[0],$hours[$j],$hours[$j+1]);
				}
				$result['result'] = $res;
				echo json_encode($result);
			}else{
				$days_graph = array();
				$days_graph[0] = 'yyyy-mm-dd';
				foreach ($days as $val) { 
					$days_graph[$i+1] = $val;
					$res[$i] = $this->TemperatureModel->getTempMeterPerDay($meter_name,$location,$val,$data['fromtime'],$data['totime']);
					$i++;

				}
				$result['hours'] = $days_graph;
				$result['result'] = $res;
				echo json_encode($result);
			}

			}else{
				$result['result'][0] = "nodata";
				echo json_encode($result);
			}
			
		}

	}

}
?>