<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 900);
class Demo2 extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Demo_model');
        
    }
    
    function getReport($id = '')
    {
        $data['id']=$id;
        //$this->load->view('Dashboard');
        $this->load->view('Reports',$data);
    }
    function getOdourUnaccReport()
    {
      
        $this->load->view('OdrReport');
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
//print_r($this->input->get());die();
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
function getSodexoReport(){
        $data=$this->input->get();
        $date=$data['fromdate'];
        $dateto=$data['todate'];
        //echo $date;die();
        $fuelData = $this->Demo_model->getsodexoData($this->input->get());        
          echo json_encode($fuelData);
        // if($data['fromdate'] == $data['todate'] ){
        //     $stationId=2020000004;  
        //  // $fuelData = $this->Demo_model->getsodexoData($this->input->get());        
        //  //  echo json_encode($fuelData);      
        // $tdata=$this->checkData($date,$stationId);
        // if(count($tdata)==0){
        //      $fuelData = $this->Demo_model->getsodexoData($this->input->get());        
        //   echo json_encode($fuelData);
        // }else{
        //     echo json_encode($tdata);
        // } 
        // }else{
        //    $fuelData = $this->Demo_model->getsodexoData($this->input->get());        
        //   echo json_encode($fuelData); 
        // }
        
       
    }
    function getSodexoReportLive(){
       
        $date=date("Y-m-d");
       
             $fuelData = $this->Demo_model->getsodexoDataLive();        
          echo json_encode($fuelData);
         
       
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
    function getOudorLevelReport(){
        $data = $this->Demo_model->getOudorLevel($this->input->get());  
        echo json_encode($data); 
    }
    function getOudorLevelReportLiveDashboard(){
        $data = $this->Demo_model->getOudorLevelLiveDashboard();  
        echo json_encode($data); 
    }
    function getOudorLevelReportLiveDashboardreport(){
        $data = $this->Demo_model->getOudorLevelLiveDashboardcreport($this->input->get('date'));  
        echo json_encode($data); 
    }
    
    function getJanitorReport(){
        $data = $this->Demo_model->getJanitorNormaReport($this->input->get());
          //$data = $this->Demo_model->getJanitorData($this->input->get());  
        echo json_encode($data); 
    }
    function getJanitorReportLive(){
//print_r($this->input->get('date'));die();
        $data = $this->Demo_model->getJanitorDataLiveDashboard();  
        echo json_encode($data); 
    }
    function consolidateReport(){
       
        $fdata=$this->Demo_model->getFootfallReportDb($this->input->get('date'));
        //print_r($fdata);
        if($fdata[2]>0){
            $c[0]=$fdata[0];
             $c[1]=$fdata[1];
             $c[2]='from db';
            $data['footfallcount'] = $c;
        }else{
            $data['footfallcount'] = $this->Demo_model->getFootfallReport($this->input->get('date'));
        }
        
        
       // print_r($data['footfallcount']);
       // die();
        // $jdata=$this->Demo_model->getJanitorDataFromDb($this->input->get('date'));
        // if($jdata['jan']>0){

        // $jt['xdata']=$jdata['xdata'];
        // $jt['ydataswipej2']=$jdata['ydataswipej2'];
        // $jt['ydataverifyj2']=$jdata['ydataverifyj2'];
        // $jt['fromdb']='yes';
        // $data['janitor']=$jt;
        // }else{
        //    $data['janitor'] = $this->Demo_model->getJanitorConsoData($this->input->get('date'));  
        // }
        $data['janitor'] = $this->Demo_model->getJanitorConsoData($this->input->get('date')); 
       // print_r($data['janitor']);
        //die();
         $oddata=$this->Demo_model->getOdourDataFromDb($this->input->get('date'));
         if($oddata['odr']>0){
            $odr['leftxdata']=$oddata['leftxdata'];
            $odr['leftydata']=$oddata['leftydata'];
            $odr['rightxdata']=$oddata['rightxdata'];
            $odr['rightydata']=$oddata['rightydata'];
            $odr['fromdb']='yes';
            $data['odour'] =$odr;
         }else{
            $data['odour'] = $this->Demo_model->getOudorLevelLiveDashboardcreport($this->input->get('date'));
         }
        $ffall=$this->Demo_model->getFootfallDataFromDb($this->input->get('date'));
        if($ffall['ffal']>0){
            $ffl['xdata']=$ffall['xdata'];
            $ffl['ydata']=$ffall['ydata'];
            $ffl['fromdb']='yes';
            $data['footfall']=$ffl;

        }else{
            $data['footfall'] = $this->Demo_model->getsodexoDataLivecreport($this->input->get('date'));
        }

        
        $data['feedback'] = $this->Demo_model->getFeedbackDataDayLivecreport($this->input->get('date'));
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
    function getFeedbackReport(){
        //echo "kk";
        $data = $this->Demo_model->getFeedbackDataDay($this->input->get());  
        echo json_encode($data); 
    }
      function getFeedbackReportLive(){
        //echo "kk";
        $data = $this->Demo_model->getFeedbackDataDayLive($this->input->get());  
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