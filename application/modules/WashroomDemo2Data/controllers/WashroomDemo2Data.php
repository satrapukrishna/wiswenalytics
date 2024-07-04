<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 900);
class WashroomDemo2Data extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Demo_model');
        
    }
    function getWashroomDashboardData(){
        $branches=$this->Demo_model->getBranches();
        $wash_results=array();
        $i=0;
        $date=$this->input->get('date');
        $today=date("Y-m-d");
        if($date==$today){
            foreach ($branches as $row) {
                $wash_results[$i]=$this->Demo_model->getSodexoReport1($date,$row['location'],$row['branch'],$row['stationid'],$row['table_name_live'],$row['built_since'],$row['managed_by'],$row['operator_name'],$row['operator_contact']); 
                $i++;
            }
        }else{
            foreach ($branches as $row) {
                $wash_results[$i]=$this->Demo_model->getSodexoReport1($date,$row['location'],$row['branch'],$row['stationid'],$row['table_name'],$row['built_since'],$row['managed_by'],$row['operator_name'],$row['operator_contact']); 
                $i++;
            }
        }
        
        echo json_encode($wash_results);
        

    }
    function consolidatedReportTabular(){
        $data=$this->input->get();
        $branches=$this->Demo_model->getBranches();
        $foot= $this->Demo_model->getConsolidatedData($branches,$data['fromdate'],$data['todate']);  
        echo json_encode($foot); 
    }
    function consolidatedFootfallTabular(){
        $data=$this->input->get();
        $branches=$this->Demo_model->getBranches();
        $foot= $this->Demo_model->getConsolidatedFootfallData($branches,$data['fromdate'],$data['todate']);  
        echo json_encode($foot); 
    }
    function consolidatedFootfallWithpowerTabular(){
        $data=$this->input->get();
        $branches=$this->Demo_model->getBranches();
        $foot= $this->Demo_model->getConsolidatedFootfallPowerData($branches,$data['fromdate'],$data['todate']);  
        echo json_encode($foot); 
    }
    function consolidatedReportTimes(){
        $data=$this->input->get();
        $branches=$this->Demo_model->getBranches();
        $foot= $this->Demo_model->getConsolidatedDataTimes($branches,$data['fromdate'],$data['todate']);  
        echo json_encode($foot); 
    }
    function consolidatedReportDatewise(){
        $data=$this->input->get();
        $branches=$this->Demo_model->getBranches();
        $foot= $this->Demo_model->getConsolidatedDataDatewise($branches,$data['fromdate'],$data['todate']);  
        echo json_encode($foot); 
    }
    function consolidatedReportTabularCron(){
        //$data=$this->input->get();
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $branches=$this->Demo_model->getBranches();
        $foot= $this->Demo_model->getConsolidatedData($branches,$yesterDay,$yesterDay);  
        echo json_encode($foot); 
    }
    function Consolidated(){
        $this->load->view('consolidated');
    }
    
    function getWaterReportLive(){
        $data['water'] = $this->Demo_model->getWaterLevelLiveDashboard($this->input->get());  
        echo json_encode($data); 
    }
    function getPowerDataLive(){
        $data['power'] = $this->Demo_model->getPowerData($this->input->get());  
        echo json_encode($data); 
    }
    function getOudorLevelMaleReportLiveDashboard(){
        $data['odour'] = $this->Demo_model->getOudorLevelMaleLiveDashboard($this->input->get());         
        echo json_encode($data); 
    }
    function getOudorLevelFemaleReportLiveDashboard(){
        $data['odour'] = $this->Demo_model->getOudorLevelFemaleLiveDashboard($this->input->get());         
        echo json_encode($data); 
    }
    function getFootfallMaleFemaleLive(){
        $fuelData['footfall'] = $this->Demo_model->getFootfallDataLive($this->input->get());       
        echo json_encode($fuelData);        
       
    }
    function getFeedbackReportLive(){
        //echo "kk";
        $data['feedback'] = $this->Demo_model->getFeedbackDataDayLive($this->input->get());  
        echo json_encode($data); 
    }
    function getBranches(){
        $branches=$this->Demo_model->getBranches();
        $result=array();
        $i=0;
        foreach ($branches as $row) {
            $result[$i]['title']=$row['branch'];
            $result[$i]['lat']=$row['latitude'];
            $result[$i]['lng']=$row['langitude'];
            $result[$i]['description']=$row['branch'];
            $result[$i]['notificatins']=0;
            $result[$i]['type']="blue";
            $result[$i]['stationid']=$row['stationid'];
            $result[$i]['no_of_urinals_male']=$row['no_of_urinals_male'];
            $result[$i]['indian_seats_male']=$row['indian_seats_male'];
            $result[$i]['western_seats_male']=$row['western_seats_male'];
            $result[$i]['indian_seats_famale']=$row['indian_seats_famale'];
            $result[$i]['western_seats_female']=$row['western_seats_female'];
            $result[$i]['handicapped_seats']=$row['handicapped_seats'];
            $result[$i]['managed_by']=$row['managed_by'];
            $result[$i]['operator_name']=$row['operator_name'];
            $result[$i]['operator_contact']=$row['operator_contact'];
            $result[$i]['zone']=$row['zone'];
            $result[$i]['built_since']=$row['built_since'];
            $result[$i]['finance_model']=$row['finance_model'];
           
            $i++;
        }
        echo json_encode($result);
    }
    function getReport($id = '')
    {
        $data['id']=$id;
        //$this->load->view('Dashboard');
        $branches=$this->Demo_model->getBranches();
        $data['branches'] = array('' => 'None Selected') + $this->Demo_model->get_location_dropdown();
        $this->load->view('Reports',$data);
    }
    function getReport_rt($id = '')
    {
        $data['id']=$id;
        //$this->load->view('Dashboard');
        $branches=$this->Demo_model->getBranches();
        $data['branches'] = array('' => 'None Selected') + $this->Demo_model->get_location_dropdown();
        $this->load->view('Reports_rt',$data);
    }
    function getWashroomDataIndividual(){
        $data=$this->input->get();
        // $date="2022-09-06";
        $date=$data['date'];
        $branch=$this->Demo_model->getBranch($data['stationid']);
        $wash_results=$this->Demo_model->getSodexoReport1($date,$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name_live'],$branch[0]['built_since'],$branch[0]['managed_by'],$branch[0]['operator_name'],$branch[0]['operator_contact']);
        echo json_encode($wash_results);
    }
    function getFootfalReport(){
        $data=$this->input->get();
       
        $branch=$this->Demo_model->getBranch($data['location']);
        $footfalldata = $this->Demo_model->getFootfallData($data['fromdate'],$data['todate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']);        
          echo json_encode($footfalldata);
        
       
    }
    function getFootfalAnalysisReport(){
        $data=$this->input->get();
        $branch=$this->Demo_model->getBranch($data['location']);
        $fanalysisdata = $this->Demo_model->getFootfalAnalysisData($data['fromdate'],$data['todate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']);        
          echo json_encode($fanalysisdata);
        
       
    }
    function getOudorLevelReport(){
        $data=$this->input->get();
        $branch=$this->Demo_model->getBranch($data['location']);
        $data = $this->Demo_model->getOudorLevel($data['fromdate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']);  
        echo json_encode($data); 
    }
    function getFeedbackReport(){
        $data=$this->input->get();
        $branch=$this->Demo_model->getBranch($data['location']);
        $data = $this->Demo_model->getFeedbackDataDay($data['fromdate'],$data['todate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']);  
        echo json_encode($data); 
    }
    function getWaterLekageReport(){
        $data=$this->input->get();
        $branch=$this->Demo_model->getBranch($data['location']);
        $data['water_leak'] = $this->Demo_model->getLekageReport($data['fromdate'],$data['todate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']); 
        echo json_encode($data); 
    }
    function getWaterConsReport(){
        $data=$this->input->get();
        $branch=$this->Demo_model->getBranch($data['location']);
        $data['water_cons'] = $this->Demo_model->getWaterConsumptionReport($data['fromdate'],$data['todate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']);
        echo json_encode($data); 
    }
    function getHighOdourReport(){
        $data=$this->input->get();
        $branch=$this->Demo_model->getBranch($data['location']);
        $data['high_odour'] = $this->Demo_model->getHighOdReport($data['fromdate'],$data['todate'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name'],$branch[0]['table_name_live']); 
        echo json_encode($data); 
    }
    function consolidateReport(){
        $data=$this->input->get();
        $today=date("Y-m-d");
        
        $branch=$this->Demo_model->getBranch($data['location']);
        if($data['date']==$today){
            $data['footfallcount'] = $this->Demo_model->getFootfallReport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name_live']);
            $data['waterlevel'] = $this->Demo_model->getWaterLevelLiveDashboard_consolidated($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name_live']);
            $data['power'] = $this->Demo_model->getPowerConsoData($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']); 
             $data['odour'] = $this->Demo_model->getOudorLevelLiveDashboardcreport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name_live']);
    
            $data['footfall'] = $this->Demo_model->getsodexoDataLivecreport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name_live']);
            
            $data['feedback'] = $this->Demo_model->getFeedbackDataDayLivecreport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name_live']);
        }else{
            $data['footfallcount'] = $this->Demo_model->getFootfallReport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']);
            $data['waterlevel'] = $this->Demo_model->getWaterLevelLiveDashboard_consolidated($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']);
            $data['power'] = $this->Demo_model->getPowerConsoData($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']); 
             $data['odour'] = $this->Demo_model->getOudorLevelLiveDashboardcreport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']);
    
            $data['footfall'] = $this->Demo_model->getsodexoDataLivecreport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']);
            
            $data['feedback'] = $this->Demo_model->getFeedbackDataDayLivecreport($data['date'],$branch[0]['location'],$branch[0]['branch'],$branch[0]['stationid'],$branch[0]['table_name']);
        }
        
        echo json_encode($data); 
    }
    function getOdourUnaccReport()
    {
      
        $this->load->view('OdrReport');
    }
    function map()
    {
      
        $this->load->view('Map');
    }
    function getAnalysisReport()
    {
      
        $this->load->view('analysisReport');
    }
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
    function getAllReports(){
                $datedata=$this->input->get();
                
               // $day = strtotime($datedata['days']); 
                //print_r($datedata['day']);
                //$fromday = $this->get_days($from,$to,$datedata['days');
                if($datedata['day']==''){
                    $date_from = strtotime($datedata['fromdate']); 
                    $date_to = strtotime($datedata['todate']);
                     $datesarray=array();
                $result=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
               //print_r($datesarray);die();
                for ($k=0; $k < count($datesarray); $k++) {
                    $data[$k]['footfall']=$this->Demo_model->getFootfallReportHourly($datesarray[$k]);
                    $data[$k]['janitor'] = $this->Demo_model->getJanitorDataLiveDashboardAll($datesarray[$k]);
                    $data[$k]['odunacc'] = $this->Demo_model->getOdourUnaccepbleHourly($datesarray[$k]);
                    $data[$k]['supervsr'] = $this->Demo_model->getSupervsrHourly($datesarray[$k]);
                    $data[$k]['alerts'] = $this->Demo_model->getAlertsHourly($datesarray[$k]);
                     $data[$k]['cleaning'] = array();
                    $data[$k]['date'] = $datesarray[$k];
                }


        
                    echo json_encode($data);
                }else{
                    $startDate = new DateTime($datedata['fromdate']);
                    $endDate = new DateTime($datedata['todate']);
                    $datesarray = array();

                        while ($startDate <= $endDate) {
                            if ($startDate->format('w') == $datedata['day']) {
                                $datesarray[] = $startDate->format('Y-m-d');
                            }

                            $startDate->modify('+1 day');
                        }
                        for ($k=0; $k < count($datesarray); $k++) {
                                 $data[$k]['footfall']=$this->Demo_model->getFootfallReportHourly($datesarray[$k]);
                                $data[$k]['janitor'] = $this->Demo_model->getJanitorDataLiveDashboardAll($datesarray[$k]);
                                $data[$k]['odunacc'] = $this->Demo_model->getOdourUnaccepbleHourly($datesarray[$k]);
                                $data[$k]['supervsr'] = $this->Demo_model->getSupervsrHourly($datesarray[$k]);
                                $data[$k]['alerts'] = $this->Demo_model->getAlertsHourly($datesarray[$k]);
                                 $data[$k]['cleaning'] = array();
                                $data[$k]['date'] = $datesarray[$k];
                            }


        
                    echo json_encode($data);
                }
                
        
    }

    function getOdorUnacceptleReport(){
        $data = $this->Demo_model->getOdourUnaccepble($this->input->get());  
        echo json_encode($data); 
    }
    function demoData()
    {
        
        //$this->load->view('Dashboard');
        $this->load->view('Dashboard');
    }
    function getSupervisor(){
        $this->load->view('supervisor');
    }
    function getSodexoData(){

        $sodexoData=$this->Demo_model->getSodexoReport($this->input->get(),'Toilet02');     
        //$GetFeedbackData=$this->Sodexo_model->getFeedbackData();
        
        //echo count($sodexoData);
        if(count($sodexoData)>0){
            echo json_encode($sodexoData);
        }else{
            $result[0]['footfallcountMale']="No Data" ;
            $result[0]['TxnDate']=date("Y-m-d");
            $result[0]['ToTime']='00-00-00';
            echo json_encode($result);
        }
        

    }
    function getSupervisorDayData(){
        $supData=$this->Demo_model->getSupervisorData($this->input->get(),'Toilet03');
        echo json_encode($supData);
    }
    function getAndUpdateSupervisor(){
         //$account = $this->input->post();
        $fbd=$this->input->post();
    //print_r($fbd);die();

        $toiletName="Toilet05";
        $supervisorName=$fbd['supervisor'];
        $toiletLocation="Hyderabad";
        $HandTowel=$fbd['HandTowel'];
        $Toiletroll=$fbd['Toiletroll'];
        $Dustbin=$fbd['Dustbin'];
        $FloorDryWet=$fbd['FloorDryWet'];
        $HandSoap=$fbd['HandSoap'];
        $Odour=$fbd['Odour'];
        $Feedbacktext=$fbd['Feedback'];
        
        $Fdata=array();
        $Fdata['ToiletLocation']=$toiletLocation;
        $Fdata['UpdatedDate']=date("Y/m/d H:i:s");
        $Fdata['CreatedDate']=date("Y/m/d");
        $Fdata['Time']=date("H:i:s");

        $Fdata['HandTowel']=$HandTowel; 
        $Fdata['Toiletroll']= $Toiletroll;
        $Fdata['Dustbin']=$Dustbin;
        $Fdata['FloorWetDry']=$FloorDryWet;
        $Fdata['HandSoap']=$HandSoap;
        $Fdata['Odour']=$Odour;
        $Fdata['Feedback']=$Feedbacktext;    
        $Fdata['SupervisorName']=$supervisorName;
        $Fdata['ToiletName']=$toiletName;        
        $FeedbackData=$this->Demo_model->getAndUpdateSupervisorData($Fdata);

        if($FeedbackData){
            $res['status']="Success";
            echo json_encode($res);
        }else{
            $res['status']="Failure";
            echo json_encode($res);
        }
    }
    function getAndUpdateFeedback(){
        $fbd=$this->input->post();
        // print_r($fbd);die();

        $toiletName="Toilet02";
        $toiletLocation="Madhapur";
        $HandTowel=$fbd['HandTowel'];
        $Toiletroll=$fbd['Toiletroll'];
        $DustbinFull=$fbd['DustbinFull'];
        $NoDustbin=$fbd['NoDustbin'];
        $FloorDry=$fbd['FloorDry'];
        $FloorWet=$fbd['FloorWet'];
        $HandSoap=$fbd['HandSoap'];
        // $HandTowel=0;
        // $Toiletroll=0;
        // $DustbinFull=0;
        // $NoDustbin=1;
        // $FloorDry=1;
        // $FloorWet=1;
        // $HandSoap=1;

        $Fdata=array();
        $Fdata['ToiletLocation']=$toiletLocation;
        $Fdata['UpdatedDate']=date("Y/m/d h:i:s");
        if($HandSoap==2){
            $Fdata['HandSoap']=0; 
            $Fdata['HandSoapTime']=date("Y/m/d h:i:s");         
        }if($FloorWet==2){
            $Fdata['FloorWet']= 0;
            $Fdata['FloorWetTime']= date("Y/m/d h:i:s");
        }if($FloorDry==2){
            $Fdata['FloorDry']=0;
            $Fdata['FloorDryTime']= date("Y/m/d h:i:s");
        }if($NoDustbin==2){
            $Fdata['NoDustbin']=0;
            $Fdata['NoDustbinTime']= date("Y/m/d h:i:s");
        }if($DustbinFull==2){
            $Fdata['DustbinFull']=0;
            $Fdata['DustbinFullTime']= date("Y/m/d h:i:s");
        }if($Toiletroll==2){
            $Fdata['Toiletroll']=0;
            $Fdata['ToiletrollTime']= date("Y/m/d h:i:s");
        }if($HandTowel==2){
            $Fdata['HandTowel']=0;
            $Fdata['HandTowelTime']= date("Y/m/d h:i:s");
        }

        
        $FeedbackData=$this->Demo_model->getAndUpdateFeedbackData($Fdata);

        if($FeedbackData){
            $res['status']="Success";
            echo json_encode($res);
        }else{
            $res['status']="Failure";
            echo json_encode($res);
        }
    }
    function getFeedbackData(){
        $gfbd=$this->input->get();
        
         $GetFeedbackData=$this->Demo_model->getFeedbackData($gfbd['tid']);
         echo json_encode($GetFeedbackData);

    }
    function getAndUpdateJanitorData(){
        $fbd=$this->input->post();
        //print_r($fbd);die();
        $janitorName=$fbd['JanitorName'];
        $toiletName="Toilet02";
        $toiletLocation="Samsung Office Noida";
        $HandTowel=$fbd['HandTowel'];
        $Toiletroll=$fbd['Toiletroll'];
        $DustbinFull=$fbd['DustbinFull'];
        $NoDustbin=$fbd['NoDustbin'];
        $FloorDry=$fbd['FloorDry'];
        $FloorWet=$fbd['FloorWet'];
        $HandSoap=$fbd['HandSoap'];
       

        $Fdata=array();
        $Jdata=array();
        $Jdata['ToiletId']='2020000004';
        $Jdata['ToiletName']=$toiletName;
        $Jdata['JanitorName']=$janitorName;
        $Fdata['ToiletLocation']=$toiletLocation;
        $Fdata['UpdatedDate']=date("Y/m/d h:i:s");
        $Jdata['UpdatedDate']=date("Y/m/d h:i:s");
        if($HandSoap==2){
            $Fdata['HandSoap']=1; 
            $Jdata['HandSoap']=1;
            $Fdata['HandSoapTime']=NULL;        
        }if($FloorWet==2){
            $Fdata['FloorWet']= 1;
            $Jdata['FloorWet']= 1;
            $Fdata['FloorWetTime']=NULL;
        }if($FloorDry==2){
            $Fdata['FloorDry']=1;
            $Jdata['FloorDry']=1;
            $Fdata['FloorDryTime']= NULL;
        }if($NoDustbin==2){
            $Fdata['NoDustbin']=1;
            $Jdata['NoDustbin']=1;
            $Fdata['NoDustbinTime']= NULL;
        }if($DustbinFull==2){
            $Fdata['DustbinFull']=1;
            $Jdata['DustbinFull']=1;
            $Fdata['DustbinFullTime']= NULL;
        }if($Toiletroll==2){
            $Fdata['Toiletroll']=1;
            $Jdata['Toiletroll']=1;
            $Fdata['ToiletrollTime']= NULL;
        }if($HandTowel==2){
            $Fdata['HandTowel']=1;
            $Jdata['HandTowel']=1;
            $Fdata['HandTowelTime']= NULL;
        }

        
        $FeedbackData=$this->Demo_model->getAndUpdateFeedbackData($Fdata);
        $JanitorData=$this->Demo_model->updateJanitorData($Jdata);

        if($FeedbackData){
            $res['status']="Success";
            echo json_encode($res);
        }else{
            $res['status']="Failure";
            echo json_encode($res);
        }
    }
function checkData($date,$stationId){
    //echo $date;
    $fuelData = $this->Demo_model->getsodexoDataWithDate($date,$stationId);
    return $fuelData;
//echo count($fuelData);
    //print_r($fuelData);

}

    
    
    function getSodexoReportLivecreport(){
       
        //$date=date("Y-m-d");
       
             $fuelData = $this->Demo_model->getsodexoDataLivecreport($this->input->get('date'));        
          echo json_encode($fuelData);
         
       
    }

    function getSodexoReportCron(){  
        $fuelData = $this->Demo_model->getsodexoDataCron();  
        echo json_encode($fuelData);  
    }
    
    
    
    function getOudorLevelReportLiveDashboardreport(){
        $data = $this->Demo_model->getOudorLevelLiveDashboardcreport($this->input->get('date'));  
        echo json_encode($data); 
    }
    
    function getJanitorReport(){
        $data['od_collector'] = $this->Demo_model->getJanitorNormaReport($this->input->get());
        $data['od_jp'] = $this->Demo_model->getJanitorNormaReport_jp($this->input->get());
          //$data = $this->Demo_model->getJanitorData($this->input->get());  
        echo json_encode($data); 
    }
   
    
    
    function getJanitorReportLive(){
//print_r($this->input->get('date'));die();
        $data['collector'] = $this->Demo_model->getJanitorDataLiveDashboard($this->input->get('date'));
        $data['jp'] = $this->Demo_model->getJanitorDataLiveDashboard_jp($this->input->get('date'));  
        echo json_encode($data); 
    }
    
    function getJanitorReportfordate(){
//print_r($this->input->get('date'));die();
        $data = $this->Demo_model->getJanitorDataLiveDashboardreport($this->input->get('date'));  
        echo json_encode($data); 
    }
    function getFootfallReportfordate(){
//print_r($this->input->get('date'));die();
        $data = $this->Demo_model->getFootfallReport($this->input->get('date'));  
        echo json_encode($data); 
    }
    
      
    function getFeedbackReportLivecreport(){
        //echo "kk";
        $data = $this->Demo_model->getFeedbackDataDayLivecreport($this->input->get('date'));  
        echo json_encode($data); 
    }
    function sendMailReport(){
        $date = date('Y-m-d',strtotime("-1 days"));
        $odourRightLevels=$this->Demo_model->getOdourRightLevelsMail($date);
        $odourLeftLevels=$this->Demo_model->getOdourLeftLevelsMail($date);
        $mailData = $this->Demo_model->getSodexoReportMail($date); 
        $footfallData = $this->Demo_model->getsodexoDataMail($date);
        $odourReadingLeft=$this->Demo_model->getOdourLeftDataMail($date);
        $odourReadingRight=$this->Demo_model->getOdourRightDataMail($date); 

          

            $msg_data =   "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Hi,</b><br>";
            $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Date: ".$date." </b><br>";
            $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Client Name : 
            SWORKS DEMO</b>";
            $msg_data.= '<table bgcolor="#fffff0" style="width:100%;"><tr><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " rowspan="2">S.No</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " rowspan="2">FootFall</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="2">Number of Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="2">Odour Left</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="2">Odour Right</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="2">Highest Foot Fall(Hourly)</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;" colspan="2">Lowest Foot Fall(Hourly)</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="3">Feedback</th></tr><tr><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Swiped</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Verified</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Min</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Max</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Min</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Max</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">FootFall</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">FootFall</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Good</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Average</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Bad</th></tr>';

            $msg_data.="<tr style='background-color: #e6f1f5;'><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>1</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$mailData[0]['footfallcountMale']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$mailData[0]['swiped']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$mailData[0]['verified']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourReadingLeft[0]['min']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourReadingLeft[1]['max']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourReadingRight[0]['min']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourReadingRight[1]['max']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$footfallData[1]['Time']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$footfallData[1]['max']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$footfallData[0]['Time']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$footfallData[0]['min']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$mailData[0]['good']."</td><td align='center'style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$mailData[0]['avg']."</td><td align='center' style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$mailData[0]['poor']."</td></tr>";
            $msg_data.= "</table>";
             $msg_data.= '<div>';
           $msg_data.= '<div style="width: 50%; float:left">';
            $msg_data.= '<h5 style="    font-size: 15px;margin-bottom: 10px;font-family: arial;
    color: #333;">Odour Left Between 60 to 120</h5>';
            $msg_data.= '<table style="width:98%;">';
            $msg_data.='<tr style="text-align: center;"><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">S.No</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Reading</th></tr>';
            $j=1;
            for ($i=0; $i < count($odourLeftLevels[0]); $i++) { 
               $msg_data.="<tr style='text-align: center; background-color: #e6f1f5;'><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$j."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourLeftLevels[0][$i]->FromTime."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourLeftLevels[0][$i]->CurReading."</td></tr>"; 
               $j++;
            }

           $msg_data.= "</table>";
           $msg_data.= "</div>";
            $msg_data.= '<div style="width: 50%; float:left">';
            $msg_data.= '<h5 style="    font-size: 15px;margin-bottom: 10px;font-family: arial;
    color: #333;">Odour Left Above 120</h5>';
            $msg_data.= "<table style='width:98%;'>";
            $msg_data.='<tr style="text-align: center;"><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">S.No</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Reading</th></tr>';
            $j1=1;
            for ($i1=0; $i1 < count($odourLeftLevels[1]); $i1++) { 
               $msg_data.="<tr style='text-align: center; background-color: #e6f1f5;'><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$j1."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourLeftLevels[1][$i1]->FromTime."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourLeftLevels[1][$i1]->CurReading."</td></tr>"; 
                $j1++;
            }

           $msg_data.= "</table>";
            $msg_data.= "</div>";
            $msg_data.= '</div>';
             $msg_data.= "<br>";
            $msg_data.= '<div style="float: left; width: 100%;">';
            $msg_data.= '<div style="width: 50%; float:left">';
            $msg_data.= '<h5 style="    font-size: 15px;margin-bottom: 10px;font-family: arial;
    color: #333;">Odour Right Between 60 to 120</h5>';
            $msg_data.= '<table style="width:98%;">';
            $msg_data.='<tr style="text-align: center;"><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">S.No</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Reading</th></tr>';
            $k=1;
            for ($i=0; $i < count($odourRightLevels[0]); $i++) { 
               $msg_data.="<tr style='text-align: center; background-color: #e6f1f5;'><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$k."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourRightLevels[0][$i]->FromTime."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourRightLevels[0][$i]->CurReading."</td></tr>"; 
               $k++;
            }

           $msg_data.= "</table>";
           $msg_data.= "</div>";
            $msg_data.= '<div style="width: 50%; float:left">';
            $msg_data.= '<h5 style="    font-size: 15px;margin-bottom: 10px;font-family: arial;
    color: #333;">Odour Right Above 120</h5>';
            $msg_data.= '<table style="width:98%;">';
            $msg_data.='<tr style="text-align: center;"><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">S.No</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; ">Reading</th></tr>';
            $j11=1;
            for ($i1=0; $i1 < count($odourRightLevels[1]); $i1++) { 
               $msg_data.="<tr style='text-align: center; background-color: #e6f1f5;'><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$j11."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourRightLevels[1][$i1]->FromTime."</td><td style='font-family:arial;
    font-size: 12px;line-height: 25px;'>".$odourRightLevels[1][$i1]->CurReading."</td></tr>"; 
                $j11++;
            }

           $msg_data.= "</table>";
           $msg_data.= "</div>";
            $msg_data.= "</div>";
             $msg_data.= "<div style='bottom:0px;clear:both'>Thanks and Regards,<br />Wenalytics Team<br /></div>";
            //echo $msg_data;
            $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
       // 'smtp_user' => 'ChekhraApp@gmail.com',
         'smtp_user' => 'reportdemo21@gmail.com',
        //'smtp_pass' => 'Chk@1234',
         'smtp_pass' => 'report@12345678',
        'mailtype'  => 'html', 
        'charset' => 'utf-8',
        'wordwrap' => TRUE

    );
   echo $msg_data;
    $this->load->library('email');
    $this->email->initialize($config);   
    $this->email->set_newline("\r\n"); 
    $this->email->set_mailtype("html");   
    $this->email->from('reports@wenalytics.com', 'Wenalytics');
    
   $list = array('sunil.pillai@talbotforce.com','srikanth.r@sworks.co.in','mohit.khullar@sworks.co.in','krishna3175@gmail.com','sunilmanohar@wenalytics.com','hriday@wenalytics.com' );
    $this->email->to($list);
    $this->email->subject('Daily Mail');
    $this->email->message($msg_data);
    

    $this->email->send();
    }
}