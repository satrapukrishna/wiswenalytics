<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH . '/libraries/REST_Controller.php';
class Services extends MX_Controller {
	function __construct(){
		parent::__construct();
        //modules::run('admin/is_logged_in',__CLASS__);
		$this->load->model('Services_model');
	}
	function employee_login_post()	
    {
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $search_options = array('email_id' => $email, 'password' => $password);
		// print_r($search_options);exit;
        if ($email != '' && $password != '')
        {
            $user_data = $this->Services_model->get_employee_by_email($email);
            $item = array();
            if($user_data)
            {
                if(md5($password) == $user_data['password'])
                {
                    if($user_data['status'] ==1)
                    {
					$user_token=rand('100','999').date("dmY");
					$this->Services_model->update_employee($user_data['emp_id'], array('session' => $user_token));
					$client=$this->Services_model->get_client($user_data['created_by']);
					
                        $item = array(
							"session" => $user_token,
                            'user_id' => $user_data['emp_id'],
                            'email' => $user_data['email_id'],
                            'name' => $user_data['firstname']." ".$user_data['lastname'],
                            'client_id' => $user_data['created_by'],
                            'client_name' => $client['client_name'],
                            'station_id' => $client['station_id'],
                            'permissions' => $user_data['permissions']
                            );
                            $data['success'] = 1;
                            $data['message'] = '';
                            $data['data'] = $item;
                    }else
                    {
                        $data['success'] = 0;
                        $data['message'] = 'Account Inactive';
                    }
                }
                else
                {
                    $data['success'] = 0;
                    $data['message'] = 'Invalid email or password';
                }
            } else
            {
                $data['success'] = 0;
                $data['message'] = 'Email id not registered with us. Pelase signup';
            }
        } else
        {
            $data['success'] = 0;
            $data['message'] = 'Email and password required';
        }
		echo json_encode($data);
		// print_r($data);exit;
        // $this->response($data, 200);
    }
	
	function dashboard_get(){	
		$client_id=$this->input->get('client_id');
		$station_id=$this->input->get('station_id');
		if ($client_id != '' && $station_id != '')
        {
			$res=$this->Services_model->get_client_valid($client_id,$station_id);
			if(count($res)>0){
			
				$device=$this->Services_model->get_devices(3);		   
				if ($device->num_rows())
				{
					foreach ($device->result() as $row)
					{	
						$search_data = array(
						'device_id' => $row->device_id,
						'pump_type' => 'Pumps',
						'client_id' => $this->input->get('client_id'));
						
						$search_data1 = array(
						'device_id' => $row->device_id,
						'pump_type' => 'Pressure Sensor',
						'client_id' => $this->input->get('client_id'));
						
						$search_data2 = array(
						'device_id' => $row->device_id,
						'pump_type' => 'Water Level Sensors',
						'client_id' => $this->input->get('client_id'));
						
						$pumps=$this->Services_model->get_firepumpdata($search_data);	
						$line_pressure=$this->Services_model->get_firepumpdata($search_data1);	
						$water_level=$this->Services_model->get_firepumpdata($search_data2);
						// echo "<pre>";print_r($water_level->result());exit;
						$item = array();
						
						
						$item['device_id'] = $row->device_id;
						$item['device_name'] = $row->device_name;
						$item['category_id'] = $row->category_id;
						$item['client_id'] = $row->created_by;
						$item['dashboard_icon'] = $row->created_by;
						$item['menu_icon'] = $row->created_by;  
						
						//////////////////// pumps data /////////////////////////
							$i=0;
							$item1 = array();
							foreach ($pumps->result() as $rec)
							{
								$api_search=array('station_id'=>$this->input->get('station_id'),
								'api_name'=>$rec->api_name,
								'LineConnectedAuto'=>$rec->LineConnectedAuto,
								'LineConnectedManual'=>$rec->LineConnectedManual);
								$pump_api=$this->Services_model->getDashBoardData($api_search);
								// echo "<pre>";print_r($pump_api);
								
								$item1[$i]['hardware_id'] = $rec->hardware_id;
								$item1[$i]['pump_name'] = $rec->pump_name;
								$item1[$i]['api_name'] = $rec->api_name;
								$item1[$i]['qr_code'] = $rec->qr_code;
								$item1[$i]['UtilityName'] = $rec->UtilityName;
								$item1[$i]['LineConnected'] = $rec->LineConnected;
								$item1[$i]['LineConnectedAuto'] = $rec->LineConnectedAuto;
								$item1[$i]['LineConnectedManual'] = $rec->LineConnectedManual;
								$item1[$i]['CutInPressure'] = $rec->CutInPressure;
								$item1[$i]['CutOutPressure'] = $rec->CutOutPressure;
								$item1[$i]['PumpsCapacity'] = $rec->PumpsCapacity;
								$item1[$i]['PressureMaintained'] = $rec->PressureMaintained;
								$item1[$i]['SwitchStatus'] = $pump_api['SwitchStatus'];
								$item1[$i]['meter'] = $pump_api['SwitchStatus'];
								$item1[$i]['RunningStatus'] = $rec->api_name;
								$item1[$i]['TodayRunn'] = $pump_api['TodayRunn'];
								$item1[$i]['YesterdayRunn'] = $pump_api['YesterdayRunn'];
								$item1[$i]['LastWeekRunn'] = $pump_api['LastWeekRunn'];
								
								
								$i++;
							}
						
						$item['data']['pumps']=$item1;
						////////////////////// end pump data /////////////////////////
						
						
						//////////////////// line pressure data /////////////////////////
							$j=0;
							$pressure_data=array();
							foreach ($line_pressure->result() as $rec1)
							{
								$api_search1=array('station_id'=>$this->input->get('station_id'),
								'LineConnected'=>$rec1->LineConnected);
								
								$api_line=$this->Services_model->getPressureToday($api_search1);
								// echo count($api_line);exit;
								// echo "<pre>";print_r($api_line);exit;
								// $item2 = array();
								// $K=0;
								// foreach($api_line as $press){
									// $item2[$rec1]['CurReading']=$press->CurReading;
									// $item2[$k]['TxnTime']=$press->TxnTime;
									// $k++;
								// }						
								if(count($api_line)>0){
								$pressure_data[$j]['api_name']=$rec1->api_name;
								$pressure_data[$j]['data']=$api_line;
								}
								
								$j++;
							}
						
						$item['data']['line_pressure']=$pressure_data;
						////////////////////// end line pressure data /////////////////////////
						
						
						//////////////////// water level data /////////////////////////
							$k=0;
							$item2=array();
							foreach ($water_level->result() as $rec2)
							{
								$api_search2=array('station_id'=>$this->input->get('station_id'),
								'api_name'=>$rec2->api_name);
								
								$api_water=$this->Services_model->getWaterLevel($api_search2);
								if($api_water->Consumption!=''){
								// echo "<pre>";print_r($api_water);
								$item2[$k]['api_name'] = $rec2->api_name;
								$item2[$k]['Total_Capacity'] = $rec2->Volume;
								$item2[$k]['Current_Level'] = $api_water->Consumption;
								}
							$k++;	
							}
						
						$item['data']['water_level']=$item2;
						////////////////////// end line pressure data /////////////////////////
						
						$items[] = $item;
						
						
					}
					
					$data['success'] = 1;
					$data['message'] = '';
					$data['data'] = $items;
				} else
				{
					$data['success'] = 0;
					$data['message'] = 'No Firepumps found';
				}
			}else{
				$data['success'] = 0;
				$data['message'] = 'Invalid Station ID and Client ID';
			}
				
		}else{
			$data['success'] = 0;
			$data['message'] = 'Station ID and Client ID required';
		}
	echo json_encode($data);
	}
	
	function firepump_run_report_post()	
    {
        $client_id=$this->input->post('client_id');
		$station_id=$this->input->post('station_id');
        $device_id = $this->input->post('device_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
		
		if ($client_id != '' && $station_id != '')
        {
			$res=$this->Services_model->get_client_valid($client_id,$station_id);
			if(count($res)>0){
				if ($device_id != '' && $from_date != ''&& $to_date != '')
				{
					$search_data = array(
					'device_id' => $device_id,
					'pump_type' => 'Pumps',
					'from_date' => $from_date,
					'to_date' => $to_date,
					'station_id' => $station_id,
					'client_id' => $client_id);				
					$pumps=$this->Services_model->get_firepumpdata($search_data);
					$running_data=$this->Services_model->firePumpRunnDataAll($search_data,$pumps->result());
					if($running_data){
						$data['success'] = 1;
						$data['message'] = '';
						$data['data'] = $running_data;
					}
				}else{
					$data['success'] = 0;
					$data['message'] = 'Hardware Device, Fromdate and Todate required';
				}
			}else{
				$data['success'] = 0;
				$data['message'] = 'Invalid Station ID and Client ID';
			}
		}else{
			$data['success'] = 0;
			$data['message'] = 'Station ID and Client ID required';
		}
	echo json_encode($data);    
		
	}
	
	
}
?>
