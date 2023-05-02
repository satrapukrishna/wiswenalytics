<?php
ini_set('max_execution_time', 300);
class Energymeters extends MX_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Energymeter_model');
    }
    /* this will show the energy meters report*/
    function energymeterView()
    {
        //$this->load->model('EnergyMeterModel');
        $meters = $this->Energymeter_model->getEnergymetersList();
        $data['meters'] = $this->getMeterNames($meters);
        $this->load->view('EnergymeterView',$data);
    }
    function energymeterLoad()
    {
        $meters = $this->Energymeter_model->getEnergymetersLoadList();
        //echo "<pre>";print_r($meters);die();
        $data['meters'] = $this->getMeterNames($meters);
        //$this->load->view('energymeterLoad',$data);
        $this->load->view('energymeterLoad',$data);
    }
    /* this will fetch all the mondays($day variable) between two selected dates*/
    function get_days ( $s, $e ,$day) 
    { 
        //echo $s." ". $e." ".$day;
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
                if($i == 0){
                    $s = date ("Y-m-d",strtotime($s));
                }else{
                    $s = date ("Y-m-d", strtotime("+1 days", strtotime($s)));
                }

                
                //$s = date ("Y-m-d",strtotime($s));
                //echo $s."<br>";

                $dayOfWeek = date("l", strtotime($s));

                if($dayOfWeek == $day){
                    $days[$i] = $s;
                    $i++;
                }
            }
        }
        
        //print_r($days);die();
        return $days;
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

    /* it will process the fetched data from the db*/
    function getFinaldata($res,$avg,$specific,$formdata,$days){

        $maxvaluearray=array();
        $result = array();
        $i = 0;
        $i1=1;
        
        foreach ($res as $value) {
            $result[$i]['date'] = $value['date'];
            $result[$i]['meters'] = $value['meters'];
            $result[$i]['day'] = $value['day'];
            $result[$i]['location'] = $value['location'];

            $result[$i]['consumption'] = $value['data'][0]->consumption;
            $maxvaluearray[$i] =$value['data'][0]->consumption;
            $i++;
        }
        //print_r($maxvaluearray);die();
        if($avg == "avgperday" && $specific == 'true'){
            $size = count($result);
            if($avg == "avgperday"){
                $total = 0;         
                foreach ($result as $value) {
                    $total += $value['consumption'];
                }

                $result["avg"]['consumption'] = round($total/$size);
            }
            return $result;
        }else if($avg == "maxperday" && $specific == 'true'){
            $result["avg"]['consumption'] =max($maxvaluearray);
            return $result; 
        }else if($avg == "maxperday" && $specific == 'false'){
            $result["avg"]['consumption'] = max($maxvaluearray);
            return $result; 
        }else if($avg == "minperday" && $specific == 'true'){
            $result["avg"]['consumption'] = min($maxvaluearray);
            return $result; 
        }else if($avg == "minperday" && $specific == 'false'){
            $result["avg"]['consumption'] = min($maxvaluearray);
            return $result; 
        }
        else if($avg == "avgperday" && $specific == 'false'){
            $datediff = strtotime($formdata['todate']) - strtotime($formdata['fromdate']);
            $nofdays = round($datediff / (60 * 60 * 24))+1;
            $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($formdata['fromdate'],$formdata['todate'],$result[0]['meters'],$result[0]['location']);
            $result["avg"]['consumption'] = round($consumption[0]->consumption/$nofdays);
            return $result; 
        }else if($avg == "lastweek" && $specific == 'false'){
            $fromday = date("Y-m-d", strtotime($formdata['todate'] .' -6 day'));
            $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($fromday,$formdata['todate'],$result[0]['meters'],$result[0]['location']);
            $result["avg"]['consumption'] = round($consumption[0]->consumption/7);
            return $result;
        }else if($avg == "lastmonth" && $specific == 'false'){
            $fromday = date("Y-m-d", strtotime($formdata['todate'] .' -1 month'));
            $datediff = strtotime($formdata['todate']) - strtotime($fromday);
            $nofdays = round($datediff / (60 * 60 * 24));
            $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($fromday,$formdata['todate'],$result[0]['meters'],$result[0]['location']);
            $result["avg"]['consumption'] = round($consumption[0]->consumption/$nofdays);
            return $result;
        }else if($avg == "last6months" && $specific == 'false'){
            $fromday = date("Y-m-d", strtotime($formdata['todate'] .' -6 month'));
            $datediff = strtotime($formdata['todate']) - strtotime($fromday);
            $nofdays = round($datediff / (60 * 60 * 24));
            $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($fromday,$formdata['todate'],$result[0]['meters'],$result[0]['location']);
            $result["avg"]['consumption'] = round($consumption[0]->consumption/$nofdays);
            return $result;
        }
        else if($avg == "lastweek" && $specific == 'true'){
            $from = date("Y-m-d", strtotime($formdata['todate'] .' -8 day'));
            $to = date("Y-m-d", strtotime($formdata['todate'] .' -1 day'));
            $fromday = $this->get_days($from,$to,$formdata['days'][0]);
            $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($fromday[0],$formdata['fromtime'],$formdata['totime'],$result[0]['meters'],$result[0]['location']);
            $result["avg"]['consumption'] = round($consumption[0]->consumption);
            return $result;
        }else if($avg == "lastmonth" && $specific == 'true'){
            $from = date("Y-m-d", strtotime($formdata['todate'] .' -1 month'));
            $to = date("Y-m-d", strtotime($formdata['todate'] .' -2 day'));
            $fromday = $this->get_days($from,$to,$formdata['days'][0]);
            $consumptiontotal = 0;
            foreach ($fromday as $value) {
                $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($value,$formdata['fromtime'],$formdata['totime'],$result[0]['meters'],$result[0]['location']);
                $consumptiontotal += $consumption[0]->consumption;
            }
            $result["avg"]['consumption'] = round($consumptiontotal/count($fromday));
            return $result;
        }else if($avg == "last6months" && $specific == 'true'){
            $from = date("Y-m-d", strtotime($formdata['todate'] .' -6 month'));
            $to = date("Y-m-d", strtotime($formdata['todate'] .' -2 day'));
            //echo $from." ".$to;
            $fromday = $this->get_days($from,$to,$formdata['days'][0]);
            //print_r($fromday);die();
            $consumptiontotal = 0;
            foreach ($fromday as $value) {
                $consumption = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($value,$formdata['fromtime'],$formdata['totime'],$result[0]['meters'],$result[0]['location']);
                $consumptiontotal += $consumption[0]->consumption;
            }
            $result["avg"]['consumption'] = round($consumptiontotal/count($fromday));
            return $result;
        }
        
    }
    /*it will fetch the selected data from the report */
    function getenergyMeterConsumptionReport(){

        $data = $this->input->get();
        if(count($data['meters']) == 1){
        	
            if(isset($data['days'])){

                if(count($data['days']) == 1){
                    $res = array();
                    $days = $this->get_days ( $data['fromdate'],$data['todate'],$data['days'][0]); 
                    $i = 0;
                    foreach ($days as $value) {
                        $meter_data = explode("_", $data['meters'][0]);
                        //$meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        //print_r($meter_data);die();
                        //$locationId = $meter_data[2];
                        $res[$i]['date'] = $value;
                        $res[$i]['meters'] =  $meters;
                        $res[$i]['data'] = $this->EnergyMeterModel->getMeterAvgPerDayOLD($value,$res[$i]['meters'],$data['fromtime'],$data['totime'],$locationId);
                        $res[$i]['day']= $data['days'][0];
                        $res[$i]['location'] = $locationId;
                        $i++;
                    }
                    $result = $this->getFinaldata($res,$data['avg'],$data['specific'],$data,$days);
                    echo json_encode($result);
                }

            }else {
                if($data['avg'] == "avgperday")
                {
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $meter_m_name = explode("_", $data['meters'][0]);
                   //print_r($meter_m_name);die();
                    if(isset($meter_m_name[4])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3]."_".$meter_m_name[4];
                        $locationId = $meter_m_name[2];
                    }else if(isset($meter_m_name[3])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3];
                        $locationId = $meter_m_name[2];
                    }else{
                        $meter_name = $meter_m_name[0];
                        $location = $meter_m_name[2];
                        $locationId = $meter_m_name[1];
                    }
                    
                    $i = 0;
                    $totalconsumption  = 0;
                    foreach ($days as  $value) {
                        if($data['specific'] == 'true'){
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                            $final1  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                        }elseif($data['specific'] == 'false'){
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                            $final1 = $this->EnergyMeterModel->getMeterAvgPerDayWithoutTime($value['date'],$meter_name,$locationId);
                        }
                        $res[$i]['consumption']=$final[0]->consumption;
                        $res[$i]['date'] = $value['date'];
                        $res[$i]['meters'] = $meter_name;
                        $res[$i]['day'] = $value['day'];
                        $res[$i]['location'] = $location;
                        $totalconsumption += $final1[0]->consumption;
                        $i++;
                    }
                    $res['avg']['consumption'] = $totalconsumption/count($days);
                    echo json_encode($res); 
                }else if($data['avg'] == "maxperday"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $meter_m_name = explode("_", $data['meters'][0]);
                     if(isset($meter_m_name[4])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3]."_".$meter_m_name[4];
                        $locationId = $meter_m_name[2];
                    }else if(isset($meter_m_name[3])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3];
                        $locationId = $meter_m_name[2];
                    }else{
                        $meter_name = $meter_m_name[0];
                        $location = $meter_m_name[2];
                        $locationId = $meter_m_name[1];
                    }
                    $i = 0;
                    $totalconsumption  = 0;
                    foreach ($days as  $value) {
                        if($data['specific'] == 'true'){
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                        }elseif($data['specific'] == 'false'){
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                        }
                        $res[$i]['consumption']=$final[0]->consumption;
                        $res[$i]['date'] = $value['date'];
                        $res[$i]['meters'] = $meter_name;
                        $res[$i]['day'] = $value['day'];
                        $res[$i]['location'] = $location;
                        $maxvaluearray[$i] =$final[0]->consumption;
                        //$totalconsumption += $final1[0]->consumption;
                        $i++;
                    }
                    $res['avg']['consumption'] = max($maxvaluearray);
                    echo json_encode($res); 
                }else if($data['avg'] == "minperday"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $meter_m_name = explode("_", $data['meters'][0]);
                     if(isset($meter_m_name[4])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3]."_".$meter_m_name[4];
                        $locationId = $meter_m_name[2];
                    }else if(isset($meter_m_name[3])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3];
                        $locationId = $meter_m_name[2];
                    }else{
                        $meter_name = $meter_m_name[0];
                        $location = $meter_m_name[2];
                        $locationId = $meter_m_name[1];
                    }
                    $i = 0;
                    $totalconsumption  = 0;
                    foreach ($days as  $value) {
                        if($data['specific'] == 'true'){
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                        }elseif($data['specific'] == 'false'){
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                        }
                        if(count($days)==1){
                            $res[$i]['consumption']=$final[0]->consumption;
                        $res[$i]['date'] = $value['date'];
                        $res[$i]['meters'] = $meter_name;
                        $res[$i]['day'] = $value['day'];
                        $res[$i]['location'] = $location;
                        //$maxvaluearray[$i] =0;
                        }else{
                            $res[$i]['consumption']=$final[0]->consumption;
                        $res[$i]['date'] = $value['date'];
                        $res[$i]['meters'] = $meter_name;
                        $res[$i]['day'] = $value['day'];
                        $res[$i]['location'] = $location;
                       // $maxvaluearray[$i] =$final[0]->consumption;
                        }
                        $maxvaluearray[$i] =$final[0]->consumption;
                        //$totalconsumption += $final1[0]->consumption;
                        $i++;
                    }
                    $res['avg']['consumption'] = min($maxvaluearray);
                    echo json_encode($res); 
                }
                else if($data['avg'] == "lastweek" || $data['avg'] == "lastmonth" || $data['avg'] == "last6months"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $i = 0;
                    $meter_m_name = explode("_", $data['meters'][0]);
                     if(isset($meter_m_name[4])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3]."_".$meter_m_name[4];
                        $locationId = $meter_m_name[2];
                    }else if(isset($meter_m_name[3])){
                        $meter_name = $meter_m_name[0]."_".$meter_m_name[1];
                        $location = $meter_m_name[3];
                        $locationId = $meter_m_name[2];
                    }else{
                        $meter_name = $meter_m_name[0];
                        $location = $meter_m_name[2];
                        $locationId = $meter_m_name[1];
                    }
                    foreach ($days as  $value) {
                        $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meter_name,$data['fromtime'],$data['totime'],$locationId);
                        $res[$i]['consumption']=$final[0]->consumption;
                        $res[$i]['date'] = $value['date'];
                        $res[$i]['meters'] = $meter_name;
                        $res[$i]['day'] = $value['day'];
                        $res[$i]['location'] = $location;
                        $i++;
                    }
                    if($data['avg'] == "lastweek"){
                        $from = date("Y-m-d", strtotime($data['todate'] .' -6 days'));
                    }else if( $data['avg'] == "lastmonth" ){
                        $from = date("Y-m-d", strtotime($data['todate'] .' -1 month'));
                    }else if( $data['avg'] == "last6months" ){
                        $from = date("Y-m-d", strtotime($data['todate'] .' -6 month'));
                    }

                    $to = date("Y-m-d", strtotime($data['todate']));
                    $date1 = date_create($from);
                    $date2 = date_create($to);

                    //difference between two dates
                    $diff = date_diff($date1,$date2);
                    $countdays = $diff->format("%a");

                    if($data['specific'] == 'false'){
                        $average  = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($from,$to,$meter_name,$locationId);
                        if($data['avg'] == "lastweek"){
                            $res['avg']['consumption'] = round($average[0]->consumption/7,2);
                        }else{
                            $res['avg']['consumption'] = round($average[0]->consumption/$countdays,2);
                        }
                    }else{
                        $total_avg = 0;
                        while (strtotime($from) < strtotime($to)) {
                            $from = date ("Y-m-d", strtotime("+1 days", strtotime($from)));
                            $average = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($from,$data['fromtime'],$data['totime'],$meter_name,$locationId);
                            $total_avg += $average[0]->consumption;
                        }
                        if($data['avg'] == "lastweek"){
                            $res['avg']['consumption'] = round($total_avg/7,2);
                        }else{
                            $res['avg']['consumption'] = round($total_avg/$countdays,2);
                        }
                    }
                    echo json_encode($res);
                }
            }
        }else if(count($data['meters']) > 1){

            if(!isset($data['days'])){
                $no = 0; 
                foreach ($data['meters'] as $value) {
                    $before_val = explode("_", $value);
                    if(isset($before_val[4])){
                        $meter_names_array[$no] = $before_val[0]."_".$before_val[1]."_".$before_val[3]."_".$before_val[4];
                    }else if(isset($before_val[3])){
                        $meter_names_array[$no] = $before_val[0]."_".$before_val[1]."_".$before_val[3];
                    }else if(isset($before_val[2])){
                        $meter_names_array[$no] = $before_val[0]."_".$before_val[2];
                    }
                    $no++;
                }
               // print_r($meter_names_array);die();
                if($data['avg'] == "avgperday"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $datediff = strtotime($data['todate']) - strtotime($data['fromdate']);
                    $nofdays = round($datediff / (60 * 60 * 24))+1;
                    //echo $data['fromdate']." ".$data['todate']." ".$nofdays;die();
                    $i = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                        $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }


                        //$locationId = $meter_data[2];
                        //$meters = $meter_data[0]."_".$meter_data[1]; 
                        foreach ($days as  $value) {
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                    if($data['specific'] == 'true'){
                        $countres =count($res);

                        for ($k=0; $k < $countres ; $k++) { 
                            $resc = count($res[$k]);
                            $total = 0;
                            for ($l=0; $l <$resc; $l++) { 
                                $total += $res[$k][$l];
                                if($l == ($resc-1)){
                                    $con = round($total/$resc);
                                    $res[$k][$resc] = $con;
                                }
                            }
                        }
                        if($data['avg'] == "avgperday"){
                            array_push($resultdays, "Average Per Day");
                        }
                        
                        $result['days'] = $resultdays;
                        //$result['meters'] = $data['meters'];
                        $result['meters'] = $meter_names_array;
                        $result['Data'] = $res;
                        echo json_encode($result);
                    }else if($data['specific'] == 'false'){
                        $k =0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            //$average = $this->EnergyMeterModel->getMeterAvgPerDayWithoutTime($value['date'],$meters,$locationId);
                            $average  = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($data['fromdate'],$data['todate'],$meters,$locationId);
                            //echo "<pre>";print_r($average[0]->consumption);
                            $count = count($res[$k]);
                            $res[$k][$count] = $average[0]->consumption/$nofdays;
                            $k++;
                        }
                        if($data['avg'] == "avgperday"){
                            array_push($resultdays, "Average Per Day");
                        }
                        $result['days'] = $resultdays;
                        //$result['meters'] = $data['meters'];
                        $result['meters'] = $meter_names_array;
                        $result['Data'] = $res;
                        echo json_encode($result);
                    }
                }else if($data['avg'] =="maxperday"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $i = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                        $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                   // print_r($res);die();
                    array_push($resultdays, "Maximum Per Day");
                    $rescount = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        $k = 0;$subcount = count($res[$rescount]);
                        foreach ($days as  $value) {
                            if($data['specific'] == 'true'){
                                $final = $this->EnergyMeterModel->energymeterMaxValuewithTime($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            }else if($data['specific'] == 'false'){
                                $final = $this->EnergyMeterModel->energymeterMaxValuewithOutTime($value['date'],$meters,$locationId);
                            }
                            $maxarray['values'][$k] =  $final[0]->Consumption*$final[0]->Multiplier;
                            $maxarray['time'][$k] =  $value['date']." ".$final[0]->FromTime;
                            $k++;
                        }
                        //echo "<pre>";print_r($maxarray);
                        $res[$rescount][$subcount] = max($res[$rescount]);
                        $index = array_search($res[$rescount][$subcount],$maxarray['values']);
                        $result['time'][$rescount] = $maxarray['time'][$index];
                        $rescount++;
                    }
                    $result['days'] = $resultdays;
                    $result['meters'] = $meter_names_array;
                    $result['Data'] = $res;
                    echo json_encode($result);
                    
                }
                else if($data['avg'] =="minperday"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $i = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                        $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                    array_push($resultdays, "Minimum Per Day");
                    $rescount = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        $k = 0;$subcount = count($res[$rescount]);
                        foreach ($days as  $value) {
                            if($data['specific'] == 'true'){
                                $final = $this->EnergyMeterModel->energymeterMinValuewithTime($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            }else if($data['specific'] == 'false'){
                                $final = $this->EnergyMeterModel->energymeterMinValuewithOutTime($value['date'],$meters,$locationId);
                            }
                            $maxarray['values'][$k] =  $final[0]->Consumption*$final[0]->Multiplier;
                            $maxarray['time'][$k] =  $value['date']." ".$final[0]->FromTime;
                            $k++;
                        }
                        //echo "<pre>";print_r($maxarray);
                        $res[$rescount][$subcount] = min($res[$rescount]);
                        $index = array_search($res[$rescount][$subcount],$maxarray['values']);
                        $result['time'][$rescount] = $maxarray['time'][$index];
                        $rescount++;
                    }
                    $result['days'] = $resultdays;
                    $result['meters'] = $meter_names_array;
                    $result['Data'] = $res;
                    echo json_encode($result);
                    
                }
                else if($data['avg'] == "lastweek"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $i = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                       $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                    $from = date("Y-m-d", strtotime($data['todate'] .' -6 days'));
                    $to = date("Y-m-d", strtotime($data['todate']));
                    if($data['specific'] == 'false'){
                        
                        $k =0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                            $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            
                            $average  = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($from,$to,$meters,$locationId);

                            $count = count($res[$k]);
                            $res[$k][$count] = ($average[0]->consumption)/7;
                            $k++;
                        }
                        
                    }else{
                        $days1 = $this->get_weekdays($from,$to);
                        //print_r($days1);
                        $i = 0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                            $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            $total_avg = 0;
                            foreach ($days1 as $value) {
                                $average = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($value['date'],$data['fromtime'],$data['totime'],$meters,$locationId);
                                $total_avg += $average[0]->consumption;
                                //echo $i." ".$j." ".$total_avg."<pre>";print_r($average);
                                $j++;
                            }
                            $count = count($res[$i]);
                            $res[$i][$count] = round(($total_avg/7),2);
                            $i++;
                        }
                        
                    }   
                    array_push($resultdays, "Average Per Last Week");
                    $result['days'] = $resultdays;
                    //$result['meters'] = $data['meters'];
                    $result['meters'] = $meter_names_array;
                    $result['Data'] = $res;
                    echo json_encode($result);
                }else if($data['avg'] == "lastmonth"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $i = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                       $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                    $from = date("Y-m-d", strtotime($data['todate'] .' -1 month'));
                    $to = date("Y-m-d", strtotime($data['todate']));
                    $datediff = strtotime($to) - strtotime($from);
                    $nofdays = round($datediff / (60 * 60 * 24));
                    if($data['specific'] == 'false'){
                        
                        $k =0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                            $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        } 
                            
                            $average  = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($from,$to,$meters,$locationId);

                            $count = count($res[$k]);
                            $res[$k][$count] = ($average[0]->consumption)/$nofdays;
                            $k++;
                        }
                        
                    }else{
                        $days1 = $this->get_weekdays($from,$to);
                        //print_r($days1);
                        $i = 0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                           $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            $total_avg = 0;
                            foreach ($days1 as $value) {
                                $average = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($value['date'],$data['fromtime'],$data['totime'],$meters,$locationId);
                                $total_avg += $average[0]->consumption;
                                //echo $i." ".$j." ".$total_avg."<pre>";print_r($average);
                                $j++;
                            }
                            $count = count($res[$i]);
                            $res[$i][$count] = round(($total_avg/$nofdays),2);
                            $i++;
                        }
                        
                    }   
                    array_push($resultdays, "Average Per Last Month");
                    $result['days'] = $resultdays;
                    //$result['meters'] = $data['meters'];
                    $result['meters'] = $meter_names_array;
                    $result['Data'] = $res;
                    echo json_encode($result);
                }else if($data['avg'] == "last6months"){
                    $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
                    $resultdays = $this->formateDayDate($days);
                    $i = 0;
                    foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                       $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value['date'],$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                    $from = date("Y-m-d", strtotime($data['todate'] .' -6 month'));
                    $to = date("Y-m-d", strtotime($data['todate']));
                    $datediff = strtotime($to) - strtotime($from);
                    $nofdays = round($datediff / (60 * 60 * 24));
                    if($data['specific'] == 'false'){
                        
                        $k =0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                           $meter_data = explode("_", $meters);

                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            
                            $average  = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($from,$to,$meters,$locationId);

                            $count = count($res[$k]);
                            $res[$k][$count] = ($average[0]->consumption)/$nofdays;
                            $k++;
                        }
                        
                    }else{
                        $days1 = $this->get_weekdays($from,$to);
                        //print_r($days1);
                        $i = 0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                        $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            $total_avg = 0;
                            foreach ($days1 as $value) {
                                $average = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($value['date'],$data['fromtime'],$data['totime'],$meters,$locationId);
                                $total_avg += $average[0]->consumption;
                                //echo $i." ".$j." ".$total_avg."<pre>";print_r($average);
                                $j++;
                            }
                            $count = count($res[$i]);
                            $res[$i][$count] = round(($total_avg/$nofdays),2);
                            $i++;
                        }
                        
                    }   
                    array_push($resultdays, "Average Per Last 6 Months");
                    $result['days'] = $resultdays;
                    //$result['meters'] = $data['meters'];
                    $result['meters'] = $meter_names_array;
                    $result['Data'] = $res;
                    echo json_encode($result);
                }
            }else{
            	//die();
                //print_r($data);die();
                $no = 0; 
                $UmoScales = array();
                foreach ($data['meters'] as $value) {
                    $before_val = explode("_", $value);
                    if(isset($before_val[4])){
                        $meter_names_array[$no] = $before_val[0]."_".$before_val[1]."_".$before_val[3]."_".$before_val[4];
                    }else if(isset($before_val[3])){
                        $meter_names_array[$no] = $before_val[0]."_".$before_val[1]."_".$before_val[3];
                    }else if(isset($before_val[2])){
                        $meter_names_array[$no] = $before_val[0]."_".$before_val[2];
                    }
                    $no++;
                }
                $days = $this->get_days ( $data['fromdate'],$data['todate'],$data['days'][0]); 
              //print_r($days);die();
                $resultdays = $this->formateWeekDayDate($days,$data['days'][0]);
                //print_r($resultdays);
                $i = 0;
                foreach ($data['meters'] as $meters) 
                {
                    $j = 0;
                    $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                    $UmoScales_mid = $this->EnergyMeterModel->getEnergyMetersUmoScale($meters,$locationId); 
                    $UmoScales[$i] = $UmoScales_mid[0]->UomScale;
                    foreach ($days as  $value) {
                        $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value,$meters,$data['fromtime'],$data['totime'],$locationId);
                        $res[$i][$j]=$final[0]->consumption;
                        $j++;
                    }
                    $i++;
                }
               // echo "<pre>";print_r($res);die();
               // echo $data['avg'];die();
                if($data['avg'] == "avgperday"){
                    if($data['specific'] == 'true'){
                        $countres =count($res);

                        for ($k=0; $k < $countres ; $k++) { 
                            $resc = count($res[$k]);
                            $total = 0;
                            for ($l=0; $l <$resc; $l++) { 
                                $total += $res[$k][$l];
                                if($l == ($resc-1)){
                                    $con = round($total/$resc);
                                    $res[$k][$resc] = $con;
                                }
                            }
                        }
                        if($data['avg'] == "avgperday"){
                            array_push($resultdays, "Average Per Day");
                        }
                    }else if($data['specific'] == 'false'){
                        $k =0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        } 
                            $average = $this->EnergyMeterModel->getMeterAvgPerDayWithoutTime($value,$meters,$locationId);
                            $count = count($res[$k]);
                            $res[$k][$count] = $average[0]->consumption;
                            $k++;
                        }
                        if($data['avg'] == "avgperday"){
                            array_push($resultdays, "Average Per Day");
                        }
                    }
                    $result['days'] = $resultdays;
                //$result['meters'] = $data['meters'];
                $result['meters'] = $meter_names_array;
                $result['Data'] = $res;
                $result['units'] = $UmoScales;
                echo json_encode($result);
                }
                else if($data['avg'] =="minperday"){
                    $days = $this->get_days ( $data['fromdate'],$data['todate'],$data['days'][0]); 
             
                    $i = 0;
                     foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                        $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                           // array_push($resultdays,  $value);
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value,$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                	
                            array_push($resultdays, "Min Per Day");
                            $rescount = 0;
                    foreach ($data['meters'] as $meters) 
                    { 
                        $k = 0;$subcount = count($res[$rescount]);
                        
                        $res[$rescount][$subcount] = min($res[$rescount]);
                       
                        $rescount++;
                    }
                      
                $result['days'] = $resultdays;
                //$result['meters'] = $data['meters'];
                $result['meters'] = $meter_names_array;
                $result['Data'] = $res;
                $result['units'] = $UmoScales;
                echo json_encode($result);

                }else if($data['avg'] =="maxperday"){
                    $days = $this->get_days ( $data['fromdate'],$data['todate'],$data['days'][0]); 
             
                    $i = 0;
                     foreach ($data['meters'] as $meters) 
                    {
                        $j = 0;
                        $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                        foreach ($days as  $value) {
                           // array_push($resultdays,  $value);
                            $final  = $this->EnergyMeterModel->getMeterAvgPerDay($value,$meters,$data['fromtime'],$data['totime'],$locationId);
                            $res[$i][$j]=$final[0]->consumption;
                            $j++;
                        }
                        $i++;
                    }
                	
                            array_push($resultdays, "Max Per Day");
                            $rescount = 0;
                    foreach ($data['meters'] as $meters) 
                    { $k = 0;$subcount = count($res[$rescount]);
                        
                        $res[$rescount][$subcount] = max($res[$rescount]);
                       
                        $rescount++;
                    }
                      
                $result['days'] = $resultdays;
                //$result['meters'] = $data['meters'];
                $result['meters'] = $meter_names_array;
                $result['Data'] = $res;
                $result['units'] = $UmoScales;
                echo json_encode($result);

                }else if($data['avg'] == "lastmonth" || $data['avg'] == "last6months" || $data['avg'] == "lastweek"){
                    if($data['avg'] == "lastweek"){
                        $from = date("Y-m-d", strtotime($data['todate'] .' -6 days'));
                    }
                    else if($data['avg'] == "lastmonth"){
                        $from = date("Y-m-d", strtotime($data['todate'] .' -1 month'));
                    }else if($data['avg'] == "last6months"){
                        $from = date("Y-m-d", strtotime($data['todate'] .' -6 month'));
                    }
                    
                    $to = date("Y-m-d", strtotime($data['todate']));
                    $datediff = strtotime($to) - strtotime($from);
                    $nofdays = round($datediff / (60 * 60 * 24));
                    $res;
                    if($data['specific'] == 'true'){
                        $days1 = $this->get_weekdays($from,$to);
                        //print_r($days1);
                        $i = 0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                            $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            $total_avg = 0;
                            foreach ($days1 as $value) {
                                $average = $this->EnergyMeterModel->getMeterAvgPerSelectedDateTime($value['date'],$data['fromtime'],$data['totime'],$meters,$locationId);
                                $total_avg += $average[0]->consumption;
                                $j++;
                            }
                            if(isset($res[$i])){
                                $count = count($res[$i]);
                            }else{
                                $count = 0;
                            }
                            $res[$i][$count] = round(($total_avg/$nofdays),2);
                            $i++;
                        }
                    }else{
                        $k =0;
                        foreach ($data['meters'] as $meters) 
                        {
                            $j = 0;
                            $meter_data = explode("_", $meters);
                        if(isset($meter_data[4])){
                        $meters = $meter_data[0]."_".$meter_data[1];                       
                        $locationId = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meters = $meter_data[0]."_".$meter_data[1];                       
                            $locationId = $meter_data[2];
                        }else{
                            $meters = $meter_data[0];                      
                            $locationId = $meter_data[1];
                        }
                            
                            $average  = $this->EnergyMeterModel->getMeterAvgPerSelectedDates($from,$to,$meters,$locationId);
                            if(isset($res[$k])){
                                $count = count($res[$k]);
                            }else{
                                $count =0;
                            }
                            
                            $res[$k][$count] = ($average[0]->consumption)/$nofdays;

                            $k++;
                        }
                    }
                    if($data['avg'] == "lastweek"){
                        array_push($resultdays, "Average Per Last Week");
                    }else if($data['avg'] == "lastmonth"){
                        array_push($resultdays, "Average Per Last Month");
                    }else if($data['avg'] == "last6months"){
                        array_push($resultdays, "Average Per Last 6 Months");
                    }
                    $result['days'] = $resultdays;
                //$result['meters'] = $data['meters'];
                $result['meters'] = $meter_names_array;
                $result['Data'] = $res;
                $result['units'] = $UmoScales;
                echo json_encode($result);
                }
                
            }
        }
    }
    private function formateDayDate($days){
        $newDays = array();
        foreach ($days as $value) {
            $date = date("d-m-Y",strtotime($value['date']));
            $newdate = $date."(".$value['day'].")";
            array_push($newDays, $newdate);
        }
        return $newDays;
    }
    private function formateWeekDayDate($days,$weekday){
        $newDays = array();
        foreach ($days as $value) {
            $date = date("d-m-Y",strtotime($value));
            $newdate = $date."(".$weekday.")";
            array_push($newDays, $newdate);
        }
        return $newDays;
    }
    private function totalConsumed($res){
        //echo "bollo<pre>";print_r($res);
        $total = 0;
        foreach ($res as $value) {
            $total += round($value->Multiplier*$value->Consumption,2);
        }
        return $total;
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
    
    function getenergyMeterLoadReport(){
        $data = $this->input->get();
        $location = "";
        $meter_name = "";
        //echo "<pre>";print_r($data);
        $meter_data = explode("_", $data['meter']);
        //echo "<pre>";print_r($meterData);
        $days = $this->get_weekdays( $data['fromdate'],$data['todate']);
        $noofdays = count($days);
        //echo $noofdays;die();
        $hours = $this->get_hours_bw($data['fromtime'],$data['totime']);
        $result['input'] = $data;
        
       
                        if(isset($meter_data[4])){
                        $meter_name = $meter_data[0]."_".$meter_data[1];                       
                        $location = $meter_data[2];
                        }else if(isset($meter_data[3])){
                            $meter_name = $meter_data[0]."_".$meter_data[1];                       
                            $location = $meter_data[2];
                        }else{
                            $meter_name = $meter_data[0];                      
                            $location = $meter_data[1];
                        }
        if(!$data['day']){
            $i = 0; 
            if($noofdays == 1){
                $result['hours'] = $hours;
                for ($j=0; $j < (count($hours)-1); $j++) { 
                    $res[$j] = $this->EnergyMeterModel->getEnergyMeterLoadPerHour($meter_name,$location,$days[0]['date'],$hours[$j],$hours[$j+1]);
                }
                $result['result'] = $res;
                echo json_encode($result);
            }else{
                $days_graph = array();
                $days_graph[0] = 'yyyy-mm-dd';
                foreach ($days as $val) { 
                    $days_graph[$i+1] = $val['date'];
                    $res[$i] = $this->EnergyMeterModel->getEnergyMeterLoadPerDay($meter_name,$location,$val['date'],$data['fromtime'],$data['totime']);
                    $i++;

                }
                $result['hours'] = $days_graph;
                $result['result'] = $res;
                echo json_encode($result);
            }
        }else{
            //echo " set";
            $days = $this->get_days( $data['fromdate'],$data['todate'],$data['day']);
            $noofdays = count($days);
            //print_r($days);
            $i = 0; 
            if($noofdays == 1){
                $result['hours'] = $hours;
                for ($j=0; $j < (count($hours)-1); $j++) { 
                    $res[$j] = $this->EnergyMeterModel->getEnergyMeterLoadPerHour($meter_name,$location,$days[0],$hours[$j],$hours[$j+1]);
                }
                $result['result'] = $res;
                echo json_encode($result);
            }else{
                $days_graph = array();
                $days_graph[0] = 'yyyy-mm-dd';
                foreach ($days as $val) { 
                    $days_graph[$i+1] = $val;
                    $res[$i] = $this->EnergyMeterModel->getEnergyMeterLoadPerDay($meter_name,$location,$val,$data['fromtime'],$data['totime']);
                    $i++;

                }
                $result['hours'] = $days_graph;
                $result['result'] = $res;
                echo json_encode($result);
            }
        }
    }  
}
?>