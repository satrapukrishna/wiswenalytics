<?php

header("Access-Control-Allow-Origin: *");
ini_set('memory_limit', '-1');
date_default_timezone_set("Asia/Calcutta"); 
class DeviceData extends MX_Controller
{
	function __construct(){

		parent::__construct();
		$this->load->library('curl');
		$this->load->model('Device_model');
		
	}
function getUnichefDataLive()
{
    $this->fetchLiveData(
        'UCDL',
        'hardware_station_consumption_data__unicef_live',
        2024000527,
        'insertLiveData'
    );
}

function getChennaiDataLive()
{
    $this->fetchLiveData(
        '0002',
        'hardware_station_consumption_data_chennai_live',
        2021000067,
        'insertLiveData'
    );
}
function getChennaiDataPre()
{
    $this->fetchPreData(
        '0002',
        'hardware_station_consumption_data_chennai',
        2021000067,
        'insertLiveData'
    );
}
function getTerotamDataLive()
{
    $this->fetchLiveData(
        'GMAG',
        'hardware_station_consumption_data_terotam_live',
        2025000133,
        'insertLiveData'
    );
}
function getMumbaiDataLive()
{
    $this->fetchLiveData(
        '0003',
        'hardware_station_consumption_data_mumbai_live',
        2021000076,
        'insertLiveData'
    );
}
function fetchPreData($storeCode, $tableName, $stationId, $insertFunction)
{
	$yesterDay = date('d/m/Y', strtotime("-1 days"));
    // Get token
    $token = $this->getAccessToken();

    if (empty($token)) {
        return;
    }

    // API payload
    $payload = [
        "StoreCode" => $storeCode,
        "UserId"    => 'Wenalytics',
        "QueryDate" => $yesterDay,
        "Type"      => "TXN"
    ];

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    ];

    // Call API
    $result = $this->CallProtechAPI(
        'https://protechservice.in/ClientDataService/api/ConsumptionData',
        $payload,
        $headers
    );

    $response = json_decode($result);

    // Validate response
    if (empty($response) || !is_array($response)) {
        return;
    }

    

    foreach ($response as $entry) {

        if (empty($entry->TxnTime)) {
            continue;
        }

       $this->Device_model->$insertFunction($entry,$tableName);
    }
}
function fetchLiveData($storeCode, $tableName, $stationId, $insertFunction)
{
    // Get token
    $token = $this->getAccessToken();

    if (empty($token)) {
        return;
    }

    // API payload
    $payload = [
        "StoreCode" => $storeCode,
        "UserId"    => 'Wenalytics',
        "QueryDate" => date('d/m/Y'),
        "Type"      => "TXN"
    ];

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    ];

    // Call API
    $result = $this->CallProtechAPI(
        'https://protechservice.in/ClientDataService/api/ConsumptionData',
        $payload,
        $headers
    );

    $response = json_decode($result);

    // Validate response
    if (empty($response) || !is_array($response)) {
        return;
    }

    // Get last stored time
    $latestEntry = $this->Device_model->getTxnTime(
        date("Y-m-d"),
        $tableName,
        $stationId
    );

    $lastTxnTime = (!empty($latestEntry))
        ? $latestEntry[0]['TxnTime']
        : "00:00:00";

    // Create once (outside loop)
    $existingTxnTime = new DateTime(date('Y-m-d') . ' ' . $lastTxnTime);

    foreach ($response as $entry) {

        if (empty($entry->TxnTime)) {
            continue;
        }

        $txnTime = new DateTime(date('Y-m-d') . ' ' . $entry->TxnTime);

        if ($txnTime > $existingTxnTime) {
            $this->Device_model->$insertFunction($entry,$tableName);
        }
    }
}
function getAccessToken()
{
    $AccessToken = $this->Device_model->getAccessToken();
    $currentDate = date('Y-m-d H:i:s');

    if (!empty($AccessToken)) {

        $expiryDate = $AccessToken[0]['expiry_date'];

        if (strtotime($expiryDate) > strtotime($currentDate)) {
            return $AccessToken[0]['token'];
        }
    }

    // Generate new token
    try {
        $data = [
            'username'   => 'Wenalytics',
            'password'   => 'wenalytics123%',
            'grant_type' => 'password'
        ];

        $result = $this->CallProtechAPI(
            'https://protechservice.in/ClientDataService/token',
            $data,
            [],
            'POST',
            'HTTP'
        );

        $tokenData = json_decode($result);

        if (empty($tokenData->access_token)) {
            return null;
        }

        $token = $tokenData->access_token;
        $expiry = date('Y-m-d H:i:s', strtotime($tokenData->{'.expires'}));

        $this->Device_model->trunToken();
        $this->Device_model->saveToken([
            'token' => $token,
            'expiry_date' => $expiry
        ]);

        return $token;

    } catch (Exception $e) {
        log_message('error', $e->getMessage());
        return null;
    }
}
function CallProtechAPI($url, $data = [], $headers = [], $method = 'POST', $type = 'JSON')
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30
    ]);

    // Enable SSL in production
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);

    if (!empty($data)) {
        curl_setopt(
            $curl,
            CURLOPT_POSTFIELDS,
            ($type == 'JSON') ? json_encode($data) : http_build_query($data)
        );
    }

    if (!empty($headers)) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        log_message('error', curl_error($curl));
        curl_close($curl);
        return null;
    }

    curl_close($curl);

    return $response;
}
	
}

?>