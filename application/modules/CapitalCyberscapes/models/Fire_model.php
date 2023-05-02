<?php
class Fire_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    
    function getChillerData(){
        $todayDate=date("Y-m-d");
                        $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate='".$todayDate."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
        
        $queryStatus="SELECT TxnDate,FromTime,ToTime,PrvReading,CurReading  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' and TxnDate='".$todayDate."'";
        $dataStatus = $this->db->query($queryStatus)->result();
        $chillerdata= array();
        $hours = floor($tsh / 60);
        $min = $tsh - ($hours * 60);
        $chillerdata['meter']='Chiller_4';
        $chillerdata['status']=$dataStatus[count($dataStatus)-1]->CurReading;
        $chillerdata['RunningHours']=$hours." Hours ".$min." Min";

         

        return $chillerdata;
    }
    function getCoolingData(){
        $todayDate=date("Y-m-d");
                        $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate='".$todayDate."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1 order by FromTime";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
        $queryStatus="SELECT TxnDate,FromTime,ToTime,PrvReading,CurReading  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' and TxnDate='".$todayDate."'";
        $dataStatus = $this->db->query($queryStatus)->result();
        

        $chillerdata= array();
     
        $hours = floor($tsh / 60);
        $min = $tsh - ($hours * 60);
        $chillerdata['meter']='CT Fan';
        $chillerdata['status']=$dataStatus[count($dataStatus)-1]->CurReading;
        $chillerdata['RunningHours']=$hours." Hours ".$min." Min";
        return $chillerdata;
    }
    function getDashBoardData($locations){
        $todayDate=date('Y-m-d');
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        //$yesterDay = "'".$yesterDay."'";
        //lastweek
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
       $resultArray=array();
        for ($i=0; $i <count($locations) ; $i++) { 
            //echo "string";die();
            //today
            $query="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $queryswitch1="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='Auto_Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            //echo $queryswitch1;die();
            $queryswitch2="SELECT PrvReading,CurReading,Consumption,TxnDate,FromTime,ToTime FROM app_device_station_consumtion_cbre where UtilityName='Manual_Status_SJ Pump' and StationId=2020000005 and TxnDate='".$todayDate."'  ORDER BY Id DESC limit 2";
            $datasw1 = $this->db->query($queryswitch1)->result();
            $datasw2 = $this->db->query($queryswitch2)->result();
            $data = $this->db->query($query)->result();
            //echo $query."<br>"; 
            $query1="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate='".$todayDate."'";
            $data1 = $this->db->query($query1)->result();
             //echo $query1."<br>"; 
            //yesterday
            $query2="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate='".$yesterDay."'";
            $data2 = $this->db->query($query2)->result();
             //echo $query2."<br>"; 
            //lastweek
            $query3="SELECT SUM(Consumption) as Consumption FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$i]->Location."' and StationId=2020000005 and TxnDate BETWEEN '".$start_week."' AND '".$end_week."' ";
            //echo $query3;
            $data3 = $this->db->query($query3)->result();
             //echo $query3."<br>";
            if($locations[$i]->Location=='Jockey Running Time_Fire Pump house'){
                if($datasw1[0]->CurReading==0 && $datasw2[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='OFF';
            }
            if($datasw1[0]->CurReading==0 && $datasw2[0]->CurReading==1){
                $resultArray[$i]['SwitchStatus']='Manual';
            }
            if($datasw1[0]->CurReading==1 && $datasw2[0]->CurReading==0){
                $resultArray[$i]['SwitchStatus']='Auto';
            }
            }else{
                 $resultArray[$i]['SwitchStatus']='NA';
            }
            
            $resultArray[$i]['meter']=$locations[$i]->Location;
            $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
            // $resultArray[$i]['RunningStatus']=$data[1]->Consumption;
            
            $resultArray[$i]['TodayRunn']=$data1[0]->Consumption;
            $resultArray[$i]['YesterdayRunn']=$data2[0]->Consumption;
            $resultArray[$i]['LastWeekRunn']=$data3[0]->Consumption;
        }
        //print_r($resultArray);
       return $resultArray;
    }
    function getFireListData(){
        $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
        //echo $query;
        $data = $this->db->query($query)->result(); 
        return $data;
    }
    function getChillerReportData($data){
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($i=0; $i < 24; $i++) {
            $tt=0 ;
            $diff=0;
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
                 $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
                 //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
                  $data1D = $this->db->query($queryD)->result();
                  //echo count($data1D);
           // print_r($data1D);
                  $rmin=0;
                  if(count($data1D)!=0){
                   if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){
                   //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
                        $checkTime = strtotime($data1D[0]->ToTime);
                        

                        $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                        $diff = $checkTime - $loginTime;
                        $rmin=gmdate("i", abs($diff));
                        //echo abs($diff)."<br>";

                   }else{
                    //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
                    $checkTime = strtotime($data1D[0]->FromTime);
                        

                        $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                        $diff = $checkTime - $loginTime;
                        $rmin=gmdate("i", abs($diff));
                       // echo abs($diff)."<br>";
                   }
                    

                                     
                  }else{
                    $rmin="0";
                  }
                  
               
                  if(abs($diff)>3600){
                    $diff=3599;
                  }
                  $tt=gmdate("i", abs($diff));
                  if($tt>54){
                    $tt="60";
                  }
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['Meter']='Chiller_4';
                    $fulldata[$i]['runninghrs']=$tt;
            }
            
         return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
           // echo "ff";die();
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            $kt=0;
            for ($i=$t1[0]; $i < $t[0]; $i++) { 
               $tt=0 ;
            $diff=0;
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";            
                
            // $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
            //     $data1 = $this->db->query($query1)->result();
            //         $fulldata[$kt]['Time']=$from." To ".$to;
            //         $fulldata[$kt]['Meter']='Chiller_4';
            //         $fulldata[$kt]['runninghrs']=$data1[0]->Consumption;


                    //
                    $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
                 //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
                  $data1D = $this->db->query($queryD)->result();
                  //echo count($data1D);
           // print_r($data1D);
                  $rmin=0;
                  if(count($data1D)!=0){
                   if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){
                   //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
                        $checkTime = strtotime($data1D[0]->ToTime);
                        

                        $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                        $diff = $checkTime - $loginTime;
                        $rmin=gmdate("i", abs($diff));
                        //echo abs($diff)."<br>";

                   }else{
                    //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
                    $checkTime = strtotime($data1D[0]->FromTime);
                        

                        $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                        $diff = $checkTime - $loginTime;
                        $rmin=gmdate("i", abs($diff));
                       // echo abs($diff)."<br>";
                   }
                    

                                     
                  }else{
                    $rmin="0";
                  }
                  
               
                  if(abs($diff)>3600){
                    $diff=3599;
                  }
                  $tt=gmdate("i", abs($diff));
                  if($tt>54){
                    $tt="60";
                  }
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['Meter']='Chiller_4';
                    $fulldata[$kt]['runninghrs']=$tt;
                    $kt++;
                    }
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
                for ($k=0; $k < count($datesarray); $k++) { 
                       $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
                              $fulldata[$k]['Time']=$datesarray[$k];
                              $fulldata[$k]['Meter']='Chiller_4';
                              $fulldata[$k]['runninghrs']=$tsh;
                   
                      }
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
               for ($k=0; $k < count($datesarray); $k++) { 
                       $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='Chiller Status_Chiller_4' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
                              $fulldata[$k]['Time']=$datesarray[$k];
                              $fulldata[$k]['Meter']='Chiller_4';
                              $fulldata[$k]['runninghrs']=$tsh;
                   
                      }
                            
                           
                            return $fulldata;
            }

    }
    
}
function getCoolingTowerReportData($data){
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

$date = "'".$data['fromdate']."'";

    for ($i=0; $i < 24; $i++) {
    $tt=0 ;
    $diff=0;
      if($i>9){
      $from =  $i.":00:00";
      $to =  ($i+1).":00:00";     
      }else{
      $from =  "0".$i.":00:00";
      $to =  "0".($i+1).":00:00"; 
      }
        $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";

        $data1D = $this->db->query($queryD)->result();

        $rmin=0;
            if(count($data1D)!=0){
            if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

            $checkTime = strtotime($data1D[0]->ToTime);


            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));


            }else{

            $checkTime = strtotime($data1D[0]->FromTime);


            $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
            $diff = $checkTime - $loginTime;
            $rmin=gmdate("i", abs($diff));

            }      
            }else{
            $rmin="0";
            }


            if(abs($diff)>3600){
            $diff=3599;
            }
            $tt=gmdate("i", abs($diff));
            if($tt>54){
            $tt="60";
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['Meter']='CT Fan';
            $fulldata[$i]['runninghrs']=$tt;  
    }

return $fulldata;

}
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
           // echo "ff";die();
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            $kt=0;
            for ($i=$t1[0]; $i < $t[0]; $i++) { 
               $tt=0 ;
            $diff=0;
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";            
          
                    $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate=".$date."   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
                 //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
                  $data1D = $this->db->query($queryD)->result();
                  //echo count($data1D);
           // print_r($data1D);
                  $rmin=0;
                  if(count($data1D)!=0){
                   if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){
                   //echo $data1D[0]->ToTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."ee<br>";
                        $checkTime = strtotime($data1D[0]->ToTime);
                        

                        $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                        $diff = $checkTime - $loginTime;
                        $rmin=gmdate("i", abs($diff));
                        //echo abs($diff)."<br>";

                   }else{
                    //echo $data1D[0]->FromTime."-".$data1D[count($data1D)-1]->ToTime."rr".$diff."<br>";
                    $checkTime = strtotime($data1D[0]->FromTime);
                        

                        $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                        $diff = $checkTime - $loginTime;
                        $rmin=gmdate("i", abs($diff));
                       // echo abs($diff)."<br>";
                   }
                    

                                     
                  }else{
                    $rmin="0";
                  }
                  
               
                  if(abs($diff)>3600){
                    $diff=3599;
                  }
                  $tt=gmdate("i", abs($diff));
                  if($tt>54){
                    $tt="60";
                  }
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['Meter']='CT Fan';
                    $fulldata[$kt]['runninghrs']=$tt;
                    $kt++;
                    }
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
                for ($k=0; $k < count($datesarray); $k++) { 
                       $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
                              $fulldata[$k]['Time']=$datesarray[$k];
                              $fulldata[$k]['Meter']='CT Fan';
                              $fulldata[$k]['runninghrs']=$tsh;
                   
                      }
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 
                       $tt=0 ;
                       $tsh=0;
                    for ($i=0; $i < 24; $i++) {
                       
                        $diff=0;
                          if($i>9){
                          $from =  $i.":00:00";
                          $to =  ($i+1).":00:00";     
                          }else{
                          $from =  "0".$i.":00:00";
                          $to =  "0".($i+1).":00:00"; 
                          }
                          $queryD = "SELECT CurReading,PrvReading,FromTime,ToTime  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate='".$datesarray[$k]."'   AND ToTime BETWEEN '".$from."' AND '".$to."'  and CurReading=1";
//echo  $queryD;
                          $data1D = $this->db->query($queryD)->result();

                          $rmin=0;
                              if(count($data1D)!=0){
                              if($data1D[0]->PrvReading==0 && $data1D[0]->CurReading==1){

                              $checkTime = strtotime($data1D[0]->ToTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));


                              }else{

                              $checkTime = strtotime($data1D[0]->FromTime);


                              $loginTime = strtotime($data1D[count($data1D)-1]->ToTime);
                              $diff = $checkTime - $loginTime;
                              $rmin=gmdate("i", abs($diff));

                              }      
                              }else{
                              $rmin="0";
                              }


                              if(abs($diff)>3600){
                              $diff=3599;
                              }
                              $tt=gmdate("i", abs($diff));
                              if($tt>54){
                              $tt=60;
                              }
                              //echo $tt."<br>";
                              $tsh+=$tt;
                                
                      }
                              $fulldata[$k]['Time']=$datesarray[$k];
                              $fulldata[$k]['Meter']='CT Fan';
                              $fulldata[$k]['runninghrs']=$tsh;
                   
                      }
                            
                           
                            return $fulldata;
            }

    }
    
}
function getFirePumpRunnData($data){
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    $meters="SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName IN('Fuel_Level','Run Minutes')";
    $metersnames = $this->db->query($meters)->result();

    $meterList1=array($metersnames[0],$metersnames[1],$metersnames[2]);
    $meterList = array();
    for ($i=0; $i < count($meterList1); $i++) { 

      array_push($meterList,$meterList1[$i]->MeterName);
    }
    //echo count($metersnames);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        if($meterList[$i]=='Boiler_4'){
           $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' ";
        }else{
            $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='".$meterList[$i]."' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Filled' ";
        }
    
    //echo $fueladd."<br>";

    $datafueladd = $this->db->query($fueladd)->result();

    $fulldata[$k][$i]['meter']=$meterList[$i];
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['FuelAdded']=$datafueladd[0]->fueladd;
    }

    }    
        return $fulldata;
}
function getCoolingTowerReportData11($data){
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($i=0; $i < 24; $i++) { 
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
                
                $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['Meter']='CT Fan';
                    $fulldata[$i]['runninghrs']=$data1[0]->Consumption;
            }
            
         return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            $kt=0;
            for ($i=$t1[0]; $i < $t[0]; $i++) { 
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";            
                
            $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$kt]['Time']=$from." To ".$to;
                    $fulldata[$kt]['Meter']='CT Fan';
                    $fulldata[$kt]['runninghrs']=$data1[0]->Consumption;
                    $kt++;
                    }
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
                for ($k=0; $k < count($datesarray); $k++) { 
                     
                     $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate='".$datesarray[$k]."'   AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['Meter']='CT Fan';
                    $fulldata[$k]['runninghrs']=$data1[0]->Consumption;
                      }
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) {
                    $query1 = "SELECT SUM(CurReading)*11 as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='CT Fan Status_CT Fan' AND TxnDate='".$datesarray[$k]."' ";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['Meter']='CT Fan';
                    $fulldata[$k]['runninghrs']=$data1[0]->Consumption;
                }
                            
                           
                            return $fulldata;
            }

    }
    
}
function getFirepumpGraphData($data){

    
        $query="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
        //echo $query;
        $locations = $this->db->query($query)->result(); 
        //print_r($locations[0]->Location);die();
      
        $fromdate = "'".$data['fromdate']."'";
        $todate = "'".$data['todate']."'";
        $fromtime = "'".$data['fromtime']."'";
        $totime = "'".$data['totime']."'";
        //$meter = $data['meter'];
        $fulldata=array();
        if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

            $date = "'".$data['fromdate']."'";
           // echo $date;
            for ($l=0; $l <count($locations) ; $l++) {
                    for ($i=0; $i < 24; $i++) { 
                if($i>9){
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";     
            }else{
                $from =  "0".$i.":00:00";
                $to =  "0".($i+1).":00:00"; 
            }
                
                $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$i]['Time']=$from." To ".$to;
                    $fulldata[$l][$i]['meter']=$locations[$l]->Location;
                    $fulldata[$l][$i]['runninghrs']=$data1[0]->Consumption;

            }
                
                }
            
            
         return $fulldata;
            
        }
        else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
            $date = "'".$data['fromdate']."'";
            $t=explode(':', $data['totime']);
            $t1=explode(':', $data['fromtime']);
            
             for ($l=0; $l <count($locations) ; $l++) {
                $kt=0;
                 for ($i=$t1[0]; $i < $t[0]; $i++) { 
                $from =  $i.":00:00";
                $to =  ($i+1).":00:00";            
                
            $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate=".$date."   AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
                $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$kt]['Time']=$from." To ".$to;
                      $fulldata[$l][$kt]['meter']='Jockey Running Time_Fire Pump house';
                    $fulldata[$l][$kt]['runninghrs']=$data1[0]->Consumption;
                    $kt++;

                    }
             }
           
      
        return $fulldata;
    }else{
            if($data['fromtime']!='Select Hours From'){
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                 for ($l=0; $l <count($locations) ; $l++) {
                     for ($k=0; $k < count($datesarray); $k++) { 
                     
                     $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."'   AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$k]['Time']=$datesarray[$k];
                      $fulldata[$l][$k]['meter']='Jockey Running Time_Fire Pump house';
                    $fulldata[$l][$k]['runninghrs']=$data1[0]->Consumption;
                      }
                 }
               
                       return $fulldata;

            }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($l=0; $l <count($locations) ; $l++) {
                    for ($k=0; $k < count($datesarray); $k++) {
                    $query1 = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$locations[$l]->Location."' AND TxnDate='".$datesarray[$k]."' ";
                    $data1 = $this->db->query($query1)->result();
                    $fulldata[$l][$k]['Time']=$datesarray[$k];
                    $fulldata[$l][$k]['meter']='Jockey Running Time_Fire Pump house';
                    $fulldata[$l][$k]['runninghrs']=$data1[0]->Consumption;
                }
                }
                
                            
                           
                            return $fulldata;
            }

    }
    
}
function firePumpRunnDataAll($data){
    $date_from = strtotime($data['fromdate']); 
    $date_to = strtotime($data['todate']); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
    array_push($datesarray, date("Y-m-d",$i1));

    }
    for ($k=0; $k < count($datesarray); $k++) { 
    $meters="SELECT distinct(UtilityName) as Location  FROM app_device_station_consumtion_cbre where UomScale='Min' and StationId=2020000005";
        

    $metersnames = $this->db->query($meters)->result();

    $meterList=array($metersnames[0]->Location,$metersnames[1]->Location,$metersnames[2]->Location);
    
    //echo count($metersnames);die();
    for ($i=0; $i < count($meterList); $i++) { 
    //echo   ; 
        
        $firepump = "SELECT SUM(Consumption) as Consumption  FROM app_device_station_consumtion_cbre where UtilityName='".$meterList[$i]."' AND TxnDate='".$datesarray[$k]."'  ";
    
    // echo $firepump."<br>";

    $runn = $this->db->query($firepump)->result();
    if($meterList[$i]=='Jockey Running Time_Fire Pump house'){
        $meter='Sprinkler Jockey';
    }else if($meterList[$i]=='Hydrant Running Time_Fire Pump house'){
    $meter='Main Hydrant';
    }else if($meterList[$i]=='Sprinkler Running Time_Fire Pump house'){
    $meter='Main Sprinkler';
    }else{
       $meter='NA'; 
    }

    $fulldata[$k][$i]['meter']=$meter;
    $fulldata[$k][$i]['date']=$datesarray[$k];                                
    $fulldata[$k][$i]['RunningHours']=$runn[0]->Consumption;
    }

    }    
        return $fulldata;
}
}