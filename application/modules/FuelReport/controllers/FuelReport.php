<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class FuelReport extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Boiler_model');
		$this->load->model('Fuel_model');
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
		
		echo json_encode($fuelData);
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
	function getFuelDashboardData(){
		$fuelData = $this->Fuel_model->getFuelDashData($this->input->get());
		echo json_encode($fuelData);
	}
	
	function getDashBoardData(){
		

			function convertToHoursMins($time, $format = '%02d:%02d') {
			    if ($time < 1) {
			        return;
			    }
			    $hours = floor($time / 60);
			    $minutes = ($time % 60);
			    return sprintf($format, $hours, $minutes);
			}




		$fuelData = $this->Boiler_model->getDashBoilerRuningHours($this->input->get());
		$runtimings = $this->Boiler_model->getDashBoilerRuningTimings($this->input->get());
		//print_r($runtimings);die();
		$run_hrs = explode(",", $fuelData);
		$i = 0;
		foreach ($run_hrs as $value) {
			if($i == 0){
				$running['today'] = $value;

				$run['today']['cum'] = convertToHoursMins($value, '%02d:%02d:00');
				
			}else if($i == 1){
				$running['yesterday'] = $value;
				$run['yesterday']['cum'] = convertToHoursMins($value, '%02d:%02d:00');
			}else if($i == 2){
				$week = $value;
				$running['lastweek'] = $week;
				$run['lastweek']['cum'] = convertToHoursMins($value, '%02d:%02d:00');
				$run['lastweek']['avg'] = convertToHoursMins($week/7, '%02d:%02d:00');
				
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
				
			}else if($j == 1){
				$added['yesterday']['cum'] = round($value,2);
				
			}else if($j == 2){
				$added['lastweek']['cum'] = round($value,2);
				$added['lastweek']['avg'] = round(($value/7),2);
			}
			$j++;
		}
		$result['added'] = $added;

		$fuelconsumed = $this->Boiler_model->getDashBoilerConsumed($this->input->get());
		// $fuelconsumed = $this->Boiler_model->getDashBoilerConsumed($this->input->get(),$runtimings);
		//print_r($fuelconsumed);die();
		$con = explode(",", $fuelconsumed);
		$k = 0;

		foreach ($con as $value) {
			if($k == 0){
				if($running['today']['cum']>0){
					$consumed['today']['cum'] = round($value,2);
				  $economy['today'] = round(($consumed['today']['cum']/($running['today']/60)),2);
				}else{
					$consumed['today']['cum'] = 0;
				  $economy['today'] = 0;
				}
			}else if($k == 1){
				if($running['yesterday']['cum']>0){
					$consumed['yesterday']['cum'] = round($value,2);
				  $economy['yesterday'] = round(($consumed['yesterday']['cum']/($running['yesterday']/60)),2);
				}else{
					$consumed['yesterday']['cum'] = 0;
				  $economy['yesterday'] = 0;
				}
				
			}else if($k == 2){
				$consumed['lastweek']['cum'] = round($value,2);
				$consumed['lastweek']['avg'] = round(($value/7),2);
				//$economy['lastweek'] = round(($consumed['lastweek']['cum']/($running['lastweek']/60)),2);

				$economy['lastweek'] = round(($value/($running['lastweek']/60)),2);
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
	function apolloDashboardData(){
		//this->input->get()
		$fuelData = $this->Fuel_consumtion_model->getDashboardDetails($this->input->get());
		
		 echo json_encode($fuelData);
	}
	function fuelConsumptionReport(){
		$data['meters'] = $this->Boiler_model->getBoilersList();
		$this->load->view('fuelConsumptionView',$data);
	}
	function getFuelReport(){
		//print_r($this->input->get());die();
		$fuelData = $this->Fuel_consumtion_model->getFuelRunnData($this->input->get());
		
		 echo json_encode($fuelData);
	}
	function getFuelAddedReport(){
		//print_r($this->input->get());die();
		$fuelData = $this->Fuel_consumtion_model->getFuelAddedData($this->input->get());
		
		 echo json_encode($fuelData);
	}
	function getFuelAddedView(){
		//print_r($this->input->get());die();
		$this->load->view('fuelAddedView');
	}
	function getRunninGraphReport(){
		$fuelData = $this->Fuel_consumtion_model->getFuelRunnData($this->input->get());
		//$fuelData = $this->Fuel_consumtion_model->getRunninggraph($this->input->get());
		
		 echo json_encode($fuelData);
	}
	//for prk purpose

	function getSodexoReport(){
		//print_r($this->input->get());
		$fuelData = $this->Fuel_consumtion_model->getsodexoData($this->input->get());
		
		 echo json_encode($fuelData);
	}
	function getApolloReport(){
		//print_r($this->input->get());
		$fuelData = $this->Fuel_consumtion_model->getApolloData($this->input->get());
		
		 echo json_encode($fuelData);
	}
	function getMailDataForBoilers(){
		
		$this->load->library('email');
		$fuelData = $this->Fuel_consumtion_model->getDailyMailData();
		//echo json_encode($fuelData);die();
			$msg_data =	"<b>Hi,</b><br>";
			$msg_data.= "<b>Date: </b>".date('Y-m-d',strtotime("-1 days"))." <br>";
			$msg_data.= "<b>Client Name : 
			Apollo Hospital</b>";
			$msg_data.= '<table border="1" bgcolor="#fffff0"><tr><th style=" background-color: #4CAF50; color: white; ">S.No</th><th style=" background-color: #4CAF50; color: white; ">MeterName</th><th style=" background-color: #4CAF50; color: white; ">Start Fuel</th><th style=" background-color: #4CAF50; color: white; ">Fuel Added(in Lts)</th><th style=" background-color: #4CAF50; color: white; ">Fuel Removed(in Lts)</th><th style=" background-color: #4CAF50; color: white; ">RunningHours</th><th style=" background-color: #4CAF50; color: white; ">Fuel Consumed (Ltrs)</th><th style=" background-color: #4CAF50; color: white; ">Economy</th><th style=" background-color: #4CAF50; color: white; ">End Fuel(in Lts)</th></tr>';
	//echo count($fuelData);die();
		for($e = 0;$e<count($fuelData);$e++)
		{	
			$e1 = $e+1;	
			
			$msg_data.="<tr><td align='center'>".$e1."</td><td align='center'>".$fuelData[$e]['meter']."</td><td align='center'>".$fuelData[$e]['StartFuel']."</td><td align='center'>".$fuelData[$e]['FuelAdded']."</td><td align='center'>NA</td><td align='center'>".$fuelData[$e]['runninghrs']."</td><td align='center'>".$fuelData[$e]['Fuelconsume']."</td><td align='center'>".$fuelData[$e]['economy']."</td><td align='center'>".$fuelData[$e]['EndFuel']."</td></tr>";
			
		}
	$msg_data.= "</table>";
	$config = Array(
		'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'ChekhraApp@gmail.com',
        'smtp_pass' => 'Chk@1234',
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
    //$list = array('srinivasulureddy_p@apollohospitals.com','krishna3175@gmail.com','sirijarugula461@gmail.com','sunilmanohar9@gmail.com');
    $list = array('krishna3175@gmail.com');
    $this->email->to($list);
    $this->email->subject('Daily Fuel Mail');
    $this->email->message($msg_data);
    

    $this->email->send();
   // echo $this->email->print_debugger();

	
	
	
	}
}
?>