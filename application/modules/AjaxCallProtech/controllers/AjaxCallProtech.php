<?php

header("Access-Control-Allow-Origin: *");
ini_set('memory_limit', '-1');
date_default_timezone_set("Asia/Calcutta"); 
class AjaxCallProtech extends MX_Controller
{
	function __construct(){

		parent::__construct();
		$this->load->library('curl');
		$this->load->model('Device_model');
		
	}

function getProtechData(){

	$ProtechToken = $this->getAccessToken();
	$data = [
		"StoreCode" => '0001',
		"UserId" => 'NarayanaHp',
		"QueryDate" => date('d/m/Y'),
		"Type" => "TXN"
	];
	$headers =
		['Content-Type: application/json', 'Authorization: Bearer ' . $ProtechToken];
	
	$Result = $this->CallProtechAPI('https://protechservice.in/ClientDataService/api/ConsumptionData', $data, $headers);
	$data = json_decode($Result);
	$latestEntryTime=$this->Device_model->getTxnTime(date("Y-m-d"));
	// print_r($latestEntryTime);die(); 
	$latestEntries = [];
	// Loop through the array of objects$AccessToken[0]['expiry_date']
	foreach ($data as $entry) {
		
		$newDate = date("Y-m-d", strtotime($entry->TxnDate));
		$dataPro=array(
			'StationId'=>$entry->StationId,
			'UtilityName'=>$entry->UtilityName,
			'LocationName'=>$entry->LocationName,
			'LocationGroup'=>$entry->LocationGroup,
			'MeterName'=>$entry->MeterName,
			'MeterSerial'=>$entry->MeterSerial,
			'LineConnected'=>$entry->LineConnected,
			'TxnDate'=>$newDate,
			'TxnTime'=>$entry->TxnTime,
			'FromTime'=>$entry->FromTime,
			'ToTime'=>$entry->ToTime,
			'PrvReading'=>$entry->PrvReading,
			'CurReading'=>$entry->PrvReading,
			'Consumption'=>$entry->Consumption,
			'Multiplier'=>$entry->Multiplier,
			'UomName'=>$entry->UomName,
			'UomScale'=>$entry->UomScale,
			'update_date'=>date("Y-m-d H:i:s")               
		);

		// Convert TxnTime to a DateTime object for comparison
		$txnTime = new DateTime(date('Y-m-d') . ' ' . $entry->TxnTime);
		//echo $txnTime;die();
		$existingTxnTime = new DateTime(date('Y-m-d') . ' ' . $latestEntryTime[0]['TxnTime']);
		// echo $txnTime;die();
			if ($txnTime > $existingTxnTime) {
				// $latestEntries[] = $entry;
				$this->Device_model->pushApiData($entry);
			}
	
	}
		
}	
	
function getAccessToken()
{
        $AccessToken=$this->Device_model->getAccessToken();
		$date=date('Y-m-d H:i:s');
		$expiryDate=$AccessToken[0]['expiry_date'];
		//echo strtotime($date)." tttt".strtotime($expiryDate);die();
        if(isset($AccessToken) && strtotime($expiryDate)>strtotime($date)){
			return $AccessToken[0]['token'];
			
		}else{
			try {
				$data = [
					'username' => 'NarayanaHp',
					'password' => 'NarayanaHp123%',
					'grant_type' => 'password'
				];
				$Result = $this->CallProtechAPI('https://protechservice.in/ClientDataService/token', $data, [], 'POST', 'HTTP');
				$AccessTokenData = json_decode($Result);
				$AccessToken = $AccessTokenData->access_token;
				$TokenExpiryDate = $AccessTokenData->{'.expires'};
				$TokenData=array(
					'token'=>$AccessToken,
					'expiry_date'=>date('Y-m-d H:i:s',strtotime($TokenExpiryDate))           
				);
				$this->Device_model->trunToken();
				$this->Device_model->saveToken($TokenData);
				//echo json_encode($TokenData);die();
				return $AccessToken;
			} catch (Exception $Exception) {
				throw new Exception($Exception->getMessage());
			}
		}
		
	}
	
	function CallProtechAPI($url, $data = [], $headers = [], $method = 'POST', $DataModel = 'JSON')
	{
		try {
	
			$curl = curl_init();
	
			// Set the URL
			curl_setopt($curl, CURLOPT_URL, $url);
	
			// Set the HTTP method (GET, POST, PUT, DELETE, etc.)
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
	
			// Set the data to send (if any)
			if ($data) {
				if ($DataModel == 'JSON') {
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
				} else {
					curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
				}
			}
			// $headers = ['Content-Type: application/json', 'Authorization: Bearer ' . $token];
	
			// Set additional headers (if any)
			if (!empty($headers)) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			}
	
			// Return the response as a string instead of outputting it directly
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
			// Execute the request
			$response = curl_exec($curl);
	
			// Check for errors
			if ($response === false) {
				throw new Exception(curl_error($curl));
			}
	
			// Close cURL resource
			curl_close($curl);
	
			return $response;
		} catch (PDOException $Exception) {
			throw new Exception($Exception->getMessage());
		} catch (Exception $Exception) {
			throw new Exception($Exception->getMessage());
		}
	}

	
}

?>