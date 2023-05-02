<?php
class TemperatureAlert extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('TemperatureAlertModel');
	}
	function tempAlert()
	{
		$meters = $this->TemperatureAlertModel->getMetersList();
		$data['meters'] = $this->getMeterNames($meters);
		$this->load->view('TemperatureAlertView',$data);
	}
	function tempAlertSubmit(){
		$data = $this->input->post();
		$result = $this->TemperatureAlertModel->saveTemperatureAlert($data);
		if($result ==1){
			echo "Alert Added sucessfully";
		}else{
			echo "Failed to add the alert";
		}
	}
	function tempAlertUpdate(){
		$data = $this->input->get();
		$result = $this->TemperatureAlertModel->updateTemperatureAlert($data);
		if($result ==1){
			echo "Alert Updated sucessfully";
		}else{
			echo "Failed to add the alert";
		}
	}
	function subscribedAlerts(){
		$userdb = $this->session->userdata('DB');//echo $db;die();
        $usertable = $this->session->userdata('Table');
        $userdb = "'".$userdb."'";$usertable = "'".$usertable."'";
		$result = $this->TemperatureAlertModel->getSubscribedTemperratureAlerts($userdb,$usertable);
		echo json_encode($result);
	}
	function DeleteAlert($id){
        $result = $this->TemperatureAlertModel->DeleteSubscribedAlert($id);
		echo json_encode($result);
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
}
?>