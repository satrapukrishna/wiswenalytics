<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class FuelReport extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Boiler_model');
		$this->load->model('Boiler_graph_model');
		$this->load->model('Fuel_consumtion_model');
	}
	function fuelLoadReport()
	{
		$data['meters'] = $this->Boiler_graph_model->getBoilersMeterList();
		$this->load->view('fuelLoadView',$data);
	}

	
	function bolierDashboard()
	{
		$data['meters'] = $this->Boiler_model->getBoilersList();
		$this->load->view('BoilerDashboard',$data);
	}
	function getFuelLevelReport(){
		$fuelData = $this->Boiler_graph_model->getBoilerGraphData($this->input->get());
		$FuelArray =array();
		for ($i=0; $i < count($fuelData); $i++) { 
			$FuelArray[$i][0] = $fuelData[$i]->DateTime;
			$FuelArray[$i][1] = $fuelData[$i]->CurReading;
		}
		echo json_encode($FuelArray);
	}
	function getFuelLevelResult(){
		$result = array();
		$fuelData = $this->Boiler_graph_model->getBoilerRuningHours($this->input->get());
		$minutes = $fuelData[0]->RunningHours;
		$hours = floor($minutes / 60).':'.($minutes - floor($minutes / 60) * 60);
		$result['RunningHours'] = $hours;
		$fuelAdded = $this->Boiler_graph_model->getFuelFilled($this->input->get());
		$result['FuelFilled'] = $fuelAdded[0]->FuelFill;
		$fuelConsumed = $this->Boiler_graph_model->getFuelConsumed($this->input->get());
		$result['FuelConsumed'] = $fuelConsumed;
		$hours_in_points = round(floor($minutes / 60)+(($minutes%60)/60),2);
		$economy = round($fuelConsumed/$hours_in_points,2);
		$result['Economy'] = $economy;
		echo json_encode($result);
	}
	function getDashBoardData(){
		
		$fuelData = $this->Boiler_model->getDashBoilerRuningHours($this->input->get());
		$run_hrs = explode(",", $fuelData);
		$i = 0;
		foreach ($run_hrs as $value) {
			if($i == 0){
				$running['today'] = $value;
				$run['today']['cum'] = floor($value / 60).':'.($value - floor($value / 60) * 60);
				$run['today']['avg'] = $run['today']['cum'];
			}else if($i == 1){
				
				$week = $value/7;
				$running['lastweek'] = $week;
				$run['lastweek']['cum'] = floor($value / 60).':'.($value - floor($value / 60) * 60);
				$run['lastweek']['avg'] = floor($week / 60).':'.round($week - floor($week / 60) * 60);
			}else if($i == 2){
				
				$month = $value/30;
				$running['lastmonth'] = $month;
				$run['lastmonth']['cum'] = floor($value / 60).':'.($value - floor($value / 60) * 60);
				$run['lastmonth']['avg'] = floor($month / 60).':'.round($month - floor($month / 60) * 60);
			}else if($i == 3){
				$d = date('d')-1;
				$day = $value/$d;
				$running['thismonth'] = $day;
				$run['thismonth']['cum'] = floor($value / 60).':'.($value - floor($value / 60) * 60);
				$run['thismonth']['avg'] = floor($day / 60).':'.round($day - floor($day / 60) * 60);
			}else if($i == 4){
				$running['yesterday'] = $value;
				$run['yesterday']['cum'] = floor($value / 60).':'.($value - floor($value / 60) * 60);
				$run['yesterday']['avg'] = $run['yesterday']['cum'];
			}
			$i++;
		}
		$result['meter'] = $this->input->get('meter');
		$result['runningHours'] = $run;
		$fuelAdded = $this->Boiler_model->getDashBoilerAdded($this->input->get());
		$add = explode(",", $fuelAdded);
		$j = 0;
		foreach ($add as $value) {
			if($j == 0){
				$added['today']['cum'] = round($value,2);
				$added['today']['avg'] =  round($value,2); 
			}else if($j == 1){
				$added['lastweek']['cum'] = round($value,2);
				$added['lastweek']['avg'] = round(($value/7),2);
			}else if($j == 2){
				$added['lastmonth']['cum'] = round($value,2);
				$added['lastmonth']['avg'] = round(($value/30),2);
			}else if($j == 3){
				$d = date('d')-1;
				$added['thismonth']['cum'] = round($value,2);
				$added['thismonth']['avg'] = round(($value/$d),2);
			}else if($j == 4){
				
				$added['yesterday']['cum'] = round($value,2);
				$added['yesterday']['avg'] = round($value,2);
			}
			$j++;
		}
		$result['added'] = $added;

		$fuelconsumed = $this->Boiler_model->getDashBoilerConsumed($this->input->get());
		$con = explode(",", $fuelconsumed);
		$k = 0;
		foreach ($con as $value) {
			if($k == 0){
				$consumed['today']['cum'] = round($value,2);

				$consumed['today']['avg'] = round($value,2);
				$economy['today'] = round(($consumed['today']['avg']/($running['today']/60)),2);
			}else if($k == 1){
				$consumed['lastweek']['cum'] = round($value,2);
				$consumed['lastweek']['avg'] = round(($value/7),2);
				$economy['lastweek'] = round(($consumed['lastweek']['avg']/($running['lastweek']/60)),2);
			}else if($k == 2){
				$consumed['lastmonth']['cum'] = round($value,2);
				$consumed['lastmonth']['avg'] = round(($value/30),2);
				$economy['lastmonth'] = round(($consumed['lastmonth']['avg']/($running['lastmonth']/60)),2);
			}else if($k == 3){
				$d = date('d')-1;
				$consumed['thismonth']['cum'] = round($value,2);
				$consumed['thismonth']['avg'] = round(($value/$d),2);
				$economy['thismonth'] = round(($consumed['thismonth']['avg']/($running['thismonth']/60)),2);
			}else if($k == 4){
				$consumed['yesterday']['cum'] = round($value,2);
				$consumed['yesterday']['avg'] = round($value,2);
				$economy['yesterday'] = round(($consumed['yesterday']['avg']/($running['yesterday']/60)),2);
			}
			$k++;
		}
		$result['consumed'] = $consumed;
		$result['economy'] = $economy;
		/*$highconsumption = $this->Boiler_model->getDashBoilerHighConsumed($this->input->get());
		$result['high'] = $highconsumption;
		$lowconsumption = $this->Boiler_model->getDashBoilerLowConsumed($this->input->get());
		$result['low'] = $lowconsumption;*/
		echo json_encode($result);
	}
	function fuelConsumptionReport(){
		$data['meters'] = $this->Boiler_model->getBoilersList();
		$this->load->view('fuelConsumptionView',$data);
	}
	function getFuelReport(){
		//print_r($this->input->get());
		$fuelData = $this->Fuel_consumtion_model->getFuelRunnData($this->input->get());
		
		 echo json_encode($fuelData);
	}

}
?>