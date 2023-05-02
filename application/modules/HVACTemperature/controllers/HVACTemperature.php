<?php
ini_set('max_execution_time', 300);
class HVACTemperature extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Hvac_model');
	}
	function hvacTempView()
	{
		$data['meters'] = $this->Hvac_model->getHVACList();
		$this->load->view('hvacTemperatureView',$data);
	}
	function seconds($seconds) {
		// CONVERT TO HH:MM:SS
		$hours = floor($seconds/3600);
		$remainder_1 = ($seconds % 3600);
		$minutes = floor($remainder_1 / 60);
		$seconds = ($remainder_1 % 60);
 
		// PREP THE VALUES
		if(strlen($hours) == 1) {
			$hours = "0".$hours;
		}
 
		if(strlen($minutes) == 1) {
			$minutes = "0".$minutes;
		}
 
		if(strlen($seconds) == 1) {
			$seconds = "0".$seconds;
		}
 
		return $hours.":".$minutes.":".$seconds;
 
	}
	function HAVCPerformance(){
		//$data = $this->input->post();
		$data = $this->input->post();
		//print_r($data);die();
		//1st calculation 
		
		$timings = $this->Hvac_model->getCompStatus1Timings($data);
		if(isset($timings)){
			$i = 0;$values = array();
		foreach ($timings as $value) {
			$mid = $this->Hvac_model->getDeltavalue($value->TxnDate,$value->FromTime,$value->ToTime,$data['meters']);
			$res[$i] = $mid;
			$values[$i] = $mid['value'];
			$i++;
		}
		$deltaValue = max($values);
		$maxValue = max($values);
		$maxIndex = array_search($maxValue,$values);
		
		//before avg 
		for ($i=0; $i < count($values); $i++) { 
			if($values[$i] < 0){
				$values[$i] = 0;
			}
		}
		$minValue = min($values);
		$minIndex = array_search($minValue,$values);
		$avgValue = round(array_sum($values)/count($values),1);
		$maxTime = $res[$maxIndex]['time'];
		$minTime = $res[$minIndex]['time'];
		$result['meter'] = $data['meters'];
		$result['Delta']['delta'] = $deltaValue;
		$result['Delta']['maxValue'] = $maxValue;
		$result['Delta']['minValue'] = $minValue;
		$result['Delta']['maxTime'] = $maxTime;
		$result['Delta']['minTime'] = $minTime;
		$result['Delta']['avg'] = $avgValue;
		// 2nd calculation 
		$runtimings = $this->Hvac_model->getRuntimes($data);
		$result['consumption']['value'] = $this->Hvac_model->getConsumptionData($data);
		$result['consumption']['cruntime'] = $this->seconds($runtimings[0]);
		$result['consumption']['uruntime'] = $this->seconds($runtimings[1]);
		// 3rd calculation
		$j = 0;
		foreach ($timings as $value) {
			$mid = $this->Hvac_model->getReturnAirTemp($value->TxnDate,$value->FromTime,$value->ToTime,$data['meters']);
			$res1[$j] = $mid;
			$values1[$j] = $mid['temp'];
			$j++;
		}
		$result['returnAirTemp']['MinTemp'] = min($values1);
		$result['returnAirTemp']['MaxTemp'] = max($values1);
		$result['returnAirTemp']['AvgTemp'] = round(array_sum($values1)/count($values1),1);
		$minreIndex = array_search($result['returnAirTemp']['MinTemp'],$values1);
		$maxreIndex = array_search($result['returnAirTemp']['MaxTemp'],$values1);
		$result['returnAirTemp']['MinTime'] = $res1[$minreIndex]['TxnDate']." ".$res1[$minreIndex]['FromTime'];
		$result['returnAirTemp']['MaxTime'] = $res1[$maxreIndex]['TxnDate']." ".$res1[$maxreIndex]['FromTime'];
		//4th calculation 
		$k = 0;
		foreach ($timings as $value) {
			$mid = $this->Hvac_model->getFilterPressure($value->TxnDate,$value->FromTime,$value->ToTime,$data['meters']);
			$res2[$k] = $mid;
			$values2[$k] = $mid['temp'];
			$k++;
		}
		//if($values2[0] != null){
			$result['pressure']['MinTemp'] = min($values2);
			$result['pressure']['MaxTemp'] = max($values2);
			$result['pressure']['AvgTemp'] = round(array_sum($values2)/count($values2),1);
			$minpIndex = array_search($result['pressure']['MinTemp'],$values2);
			$maxpIndex = array_search($result['pressure']['MaxTemp'],$values2);
			$result['pressure']['MinTime'] = $res2[$minpIndex]['TxnDate']." ".$res2[$minpIndex]['FromTime'];
			$result['pressure']['MaxTime'] = $res2[$maxpIndex]['TxnDate']." ".$res2[$maxpIndex]['FromTime'];

		}else{
			$result['meter'] = $data['meters'];
		$result['Delta']['delta'] = 0;
		$result['Delta']['maxValue'] = 0;
		$result['Delta']['minValue'] = 0;
		$result['Delta']['maxTime'] = 0;
		$result['Delta']['minTime'] = 0;
		$result['Delta']['avg'] = 0;
		$result['consumption']['value'] = 0;
		$result['consumption']['cruntime'] = 0;
		$result['consumption']['uruntime'] = 0;
		$result['returnAirTemp']['MinTemp'] =0;
		$result['returnAirTemp']['MaxTemp'] =0;
		$result['returnAirTemp']['AvgTemp'] =0;
		$result['returnAirTemp']['MinTime'] = 0;
		$result['returnAirTemp']['MaxTime'] = 0;
		$result['pressure']['MinTemp'] = 0;
			$result['pressure']['MaxTemp'] = 0;
			$result['pressure']['AvgTemp'] = 0;
		$result['pressure']['MinTime'] = 0;
			$result['pressure']['MaxTime'] = 0;
		}
		
		//}
		echo json_encode($result);
	}
}
?>