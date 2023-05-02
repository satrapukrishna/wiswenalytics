<?php
class Capital_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getHavcReport($data){
      $meter = "'".$data['meter']."'";
      $date = "'".$data['date']."'";
  

        $query="select id, LineConnected,LocationName,UomScale,TxnDate, FromTime, ToTime, CurReading,Consumption from (
        select id, LineConnected,TxnDate, FromTime, ToTime, CurReading,Consumption ,LocationName,UomScale from app_device_station_consumtion_cyberspace where
         TxnDate=".$date." and FromTime NOT BETWEEN '23:56:00' AND '23:56:59' and LocationName=".$meter." and StationId='2020000021'  order by id desc 
        ) as sub where id=sub.id group by sub.LineConnected";

        
         //echo $query;die();
    $data = $this->db->query($query)->result();
      return $data;

    }
    function getahuRunnReort($data){
      //echo "hi";die();
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                $rslt=array();
                if($data['fromdate']==$data['todate']){
                 $fulldata=array();
         $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYO 2nd Floor' and TxnDate='".$data['fromdate']."' and LineConnected='Unit Status' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
       
      $data = $this->db->query($query)->result();
      $arrayrs=array();
      $k=0;
      $ttls=0;
      for ($i=0; $i < count($data); $i++) {

      for ($j=$i+1; $j <= $i+1; $j++) { 
       
          $checkTime = strtotime($data[$i]->ToTime);
          $loginTime = strtotime($data[$j]->FromTime);
          $diff = $checkTime - $loginTime;
          if($i==0){
            $arrayrs[$k]['start']=$data[$i]->ToTime;
          }
          if($diff>0){
            $arrayrs[$k]['last']=$data[$i]->ToTime;
          }
          //echo $data[$i]->ToTime."---".$data[$j]->FromTime."--".$diff."<br>";
      }
      //return $data;
      }
      
      for ($l=0; $l < count($arrayrs); $l++) { 
        //print_r($arrayrs[$l]['start']);
        $tm=explode(':', $arrayrs[$l]['start']);
         $tme=explode(':', $arrayrs[$l]['last']);
        //print_r($tm);die();
        $tt=0 ;
    $tsh=0;
    $n=0;
          for ($i=$tm[0]; $i <= $tme[0]; $i++) 
          {                     
            $diff=0;
            if($i>9)
            {
              $from =  $i.":00:00";
              $to =  ($i+1).":00:00";     
            }
            else
            {
              $from =  "0".$i.":00:00";
              $to =  "0".($i+1).":00:00"; 
            }
            if($i==$tm[0]){
              $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['start']);
              $diff = $t1 - $t2;
              //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
              for ($kl=0; $kl < $i+1; $kl++) { 
                if($kl==$i){
                  $fulldata[$n]['Time']=$from." To ".$to;
                  $fulldata[$n]['meter']="OYO SecondFloor";
                 $fulldata[$n]['rh']=(int)gmdate("i", $diff);
                 $ttls+=$fulldata[$n]['rh'];
              $n++;
            }else{
              $fulldata[$n]['Time']=$kl.":00:00"." To ".($kl+1).":00:00";
              $fulldata[$n]['meter']="OYO SecondFloor";
              $fulldata[$n]['rh']=0;
              $n++;
            }
                
              }
              
              //echo $to."-".$arrayrs[$l]['start']."<br>";
              //echo gmdate("H:i:s", $diff);
              //echo $to."-".$arrayrs[$l]['start']."-".$diff."<br>";
            }else if($i==$tme[0]){
             $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['last']);
              $diff = $t1 - $t2;
              //echo $to."-".$arrayrs[$l]['last']."<br>";
               //echo gmdate("H:i:s", $diff);
               //$rslt[$n]['run']=gmdate("H:i:s", $diff);
                //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
               $tr= explode(':', $arrayrs[$l]['last']);
                 $fulldata[$n]['Time']=$from." To ".$to;
                 $fulldata[$n]['meter']="OYO SecondFloor";
                 $fulldata[$n]['rh']=$tr[1];
              //$rslt[$n]['rh']=(int)gmdate("i", $diff);
              $ttls+=$fulldata[$n]['rh'];
               $n++;
               for ($h=$tme[0]; $h <24 ; $h++) { 
                 $fulldata[$n]['Time']=$h.":00:00"." To ".($h+1).":00:00";
                 $fulldata[$n]['meter']="OYO SecondFloor";
                 $fulldata[$n]['rh']=0;
                  $n++;
               }
              //echo $to."-".$arrayrs[$l]['last']."-".$diff."<br>"; 
            }else{
             // $rslt[$n]['run']=gmdate("H:i:s", 3600);
              $fulldata[$n]['Time']=$from." To ".$to;
              $fulldata[$n]['meter']="OYO SecondFloor";
              $fulldata[$n]['rh']=60;
              $ttls+=$fulldata[$n]['rh'];
              $n++;
              // echo $to."-".$from."<br>";
            }
            
          }
      }
                }else{
                    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                //$fulldata=array();
               // print_r($datesarray);die();
        for ($p=0; $p < count($datesarray); $p++) { 
                   
         $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYO 2nd Floor' and TxnDate='".$datesarray[$p]."' and LineConnected='Unit Status' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
       // echo $query;die();
      $data = $this->db->query($query)->result();
      $arrayrs=array();
      $k=0;
     
      for ($i=0; $i < count($data); $i++) {

      for ($j=$i+1; $j <= $i+1; $j++) { 
       
          $checkTime = strtotime($data[$i]->ToTime);
          $loginTime = strtotime($data[$j]->FromTime);
          $diff = $checkTime - $loginTime;
          if($i==0){
            $arrayrs[$k]['start']=$data[$i]->ToTime;
          }
          if($diff>0){
            $arrayrs[$k]['last']=$data[$i]->ToTime;
          }
          //echo $data[$i]->ToTime."---".$data[$j]->FromTime."--".$diff."<br>";
      }
      //return $data;
      }
      $rslt=array();
       $ttls=0;
      for ($l=0; $l < count($arrayrs); $l++) { 
        //print_r($arrayrs[$l]['start']);
        $tm=explode(':', $arrayrs[$l]['start']);
         $tme=explode(':', $arrayrs[$l]['last']);
        //print_r($tme);die();
        $tt=0 ;
    $tsh=0;
    $n=0;
          for ($i=$tm[0]; $i <= $tme[0]; $i++) 
          {                     
            $diff=0;
            if($i>9)
            {
              $from =  $i.":00:00";
              $to =  ($i+1).":00:00";     
            }
            else
            {
              $from =  "0".$i.":00:00";
              $to =  "0".($i+1).":00:00"; 
            }
            if($i==$tm[0]){
              $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['start']);
              $diff = $t1 - $t2;
              //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
                    for ($kl=0; $kl < $i+1; $kl++) { 
                      if($kl==$i){
                             $rslt[$n]['Time']=$from." To ".$to;
                              $rslt[$n]['rh']=(int)gmdate("i", $diff);
                              $ttls+=$rslt[$n]['rh'];
                              $n++;
                        }else{
                          $rslt[$n]['Time']=$kl.":00:00"." To ".($kl+1).":00:00";
                          $rslt[$n]['rh']=0;
                          $n++;
                        }
                            
                    }
              
              //echo $to."-".$arrayrs[$l]['start']."<br>";
              //echo gmdate("H:i:s", $diff);
              //echo $to."-".$arrayrs[$l]['start']."-".$diff."<br>";
            }else if($i==$tme[0]){
             $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['last']);
              $diff = $t1 - $t2;

              //echo $to."-".$arrayrs[$l]['last']."<br>";
               //echo gmdate("H:i:s", $diff);
               //$rslt[$n]['run']=gmdate("H:i:s", $diff);
                //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
             $tr= explode(':', $arrayrs[$l]['last']);
            // echo $tr[1];die();
                 //$rslt[$n]['Time']=$from." To ".$to;
              //$rslt[$n]['rh']=(int)gmdate("i", $diff);
               $ttls+=$tr[1];
               $n++;
              //echo $to."-".$arrayrs[$l]['last']."-".$diff."<br>"; die();
            }else{
             // $rslt[$n]['run']=gmdate("H:i:s", 3600);
              $rslt[$n]['Time']=$from." To ".$to;
              $rslt[$n]['rh']=60;
              $ttls+=$rslt[$n]['rh'];
              $n++;
              // echo $to."-".$from."<br>";
            }
            
          }
      }
     $fulldata[$p]['Time']=$datesarray[$p];
     $fulldata[$p]['meter']="OYO 2nd Floor";
     $fulldata[$p]['rh']=($ttls*60)/60; 
   }
                }
                
                
                
   return $fulldata;
   //print_r($fulldata);
}
    function getahuReport($data){
        $resultArray=array();
        $meter = "'".$data['meter']."'";
        $date = "'".$data['fromdate']."'";

        $queryrat="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Return Air Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00'";
      // echo $queryrat;die();
        $querysat="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Supply Air Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";    
        $queryrwt="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWR Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
         $queryswt="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='CHWS Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";

         $queryactu="SELECT Fromtime,Consumption FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Actuator Level' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
         $querystmp="SELECT ToTime as Fromtime,Consumption FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Set Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
        // echo $querystmp;die();
         $querypressure="SELECT Fromtime,Consumption FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and LineConnected='Filter Pressure' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
         $fulldata=array();
         $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYO 2nd Floor' and TxnDate=".$date." and LineConnected='Unit Status' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
       
      $data = $this->db->query($query)->result();
      $arrayrs=array();
      $k=0;
      $ttls=0;
      for ($i=0; $i < count($data); $i++) {

      for ($j=$i+1; $j <= $i+1; $j++) { 
       
          $checkTime = strtotime($data[$i]->ToTime);
          $loginTime = strtotime($data[$j]->FromTime);
          $diff = $checkTime - $loginTime;
          if($i==0){
            $arrayrs[$k]['start']=$data[$i]->ToTime;
          }
          if($diff>0){
            $arrayrs[$k]['last']=$data[$i]->ToTime;
          }
          //echo $data[$i]->ToTime."---".$data[$j]->FromTime."--".$diff."<br>";
      }
      //return $data;
      }
      $rslt=array();
      for ($l=0; $l < count($arrayrs); $l++) { 
        //print_r($arrayrs[$l]['start']);
        $tm=explode(':', $arrayrs[$l]['start']);
         $tme=explode(':', $arrayrs[$l]['last']);
        //print_r($tm);die();
        $tt=0 ;
    $tsh=0;
    $n=0;
          for ($i=$tm[0]; $i <= $tme[0]; $i++) 
          {                     
            $diff=0;
            if($i>9)
            {
              $from =  $i.":00:00";
              $to =  ($i+1).":00:00";     
            }
            else
            {
              $from =  "0".$i.":00:00";
              $to =  "0".($i+1).":00:00"; 
            }
            if($i==$tm[0]){
              $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['start']);
              $diff = $t1 - $t2;
              //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
              for ($kl=0; $kl < $i+1; $kl++) { 
                if($kl==$i){
                  $rslt[$n]['Time']=$from." To ".$to;
                 $rslt[$n]['rh']=(int)gmdate("i", $diff);
                 $ttls+=$rslt[$n]['rh'];
              $n++;
            }else{
              $rslt[$n]['Time']=$kl.":00:00"." To ".($kl+1).":00:00";
              $rslt[$n]['rh']=0;
              $n++;
            }
                
              }
              
              //echo $to."-".$arrayrs[$l]['start']."<br>";
              //echo gmdate("H:i:s", $diff);
              //echo $to."-".$arrayrs[$l]['start']."-".$diff."<br>";
            }else if($i==$tme[0]){
             $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['last']);
              $diff = $t1 - $t2;
              //echo $to."-".$arrayrs[$l]['last']."<br>";
               //echo gmdate("H:i:s", $diff);
               //$rslt[$n]['run']=gmdate("H:i:s", $diff);
                //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
               $tr= explode(':', $arrayrs[$l]['last']);
                 $rslt[$n]['Time']=$from." To ".$to;
                 $rslt[$n]['rh']=$tr[1];
              //$rslt[$n]['rh']=(int)gmdate("i", $diff);
              $ttls+=$rslt[$n]['rh'];
               $n++;
               for ($h=$tme[0]; $h <24 ; $h++) { 
                 $rslt[$n]['Time']=$h.":00:00"." To ".($h+1).":00:00";
                 $rslt[$n]['rh']=0;
                  $n++;
               }
              //echo $to."-".$arrayrs[$l]['last']."-".$diff."<br>"; 
            }else{
             // $rslt[$n]['run']=gmdate("H:i:s", 3600);
              $rslt[$n]['Time']=$from." To ".$to;
              $rslt[$n]['rh']=60;
              $ttls+=$rslt[$n]['rh'];
              $n++;
              // echo $to."-".$from."<br>";
            }
            
          }
      }
        

         $datarat = $this->db->query($queryrat)->result();
         $datasat = $this->db->query($querysat)->result();
         $datarwt = $this->db->query($queryrwt)->result();
         $dataswt = $this->db->query($queryswt)->result();
         $dataactu = $this->db->query($queryactu)->result();
         $datastemp = $this->db->query($querystmp)->result();
         $datapressure = $this->db->query($querypressure)->result();
        // $datarun = $this->db->query($queryruntime)->result();
        $ss=array();
       // $gg=array();
            
              $resultArray[0]['rat']=$datarat;
              $resultArray[0]['sat']=$datasat;
              $resultArray[0]['rwt']=$datarwt;
              $resultArray[0]['swt']=$dataswt;
              $resultArray[0]['actu']=$ss;
              $resultArray[0]['stemp']=$ss;
              $resultArray[0]['pressure']=$ss;
              // $resultArray[0]['stemp']=$datastemp;
              // $resultArray[0]['pressure']=$datapressure;
              $resultArray[0]['run']=$rslt;


          
     return $resultArray;
    }
    function getHavcList(){
      
        $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion_cyberspace WHERE  MeterType=17";
      $data = $this->db->query($query)->result();
      return $data;
    }
    function getSumRun($data){
      $date = "'".$data['date']."'";
       
        $fulldata=array();
         $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYO 2nd Floor' and TxnDate=".$date." and LineConnected='Unit Status' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
         //echo $query;die();
       
      $data = $this->db->query($query)->result();
      $arrayrs=array();
      $k=0;
     
      for ($i=0; $i < count($data); $i++) {

      for ($j=$i+1; $j <= $i+1; $j++) { 
       
          $checkTime = strtotime($data[$i]->ToTime);
          $loginTime = strtotime($data[$j]->FromTime);
          $diff = $checkTime - $loginTime;
          if($i==0){
            $arrayrs[$k]['start']=$data[$i]->ToTime;
          }
          if($diff>0){
            $arrayrs[$k]['last']=$data[$i]->ToTime;
          }
          //echo $data[$i]->ToTime."---".$data[$j]->FromTime."--".$diff."<br>";
      }
      //return $data;
      }
      $rslt=array();
       $ttls=0;
      for ($l=0; $l < count($arrayrs); $l++) { 
        //print_r($arrayrs[$l]['start']);
        $tm=explode(':', $arrayrs[$l]['start']);
         $tme=explode(':', $arrayrs[$l]['last']);
        //print_r($tme);die();
        $tt=0 ;
    $tsh=0;
    $n=0;
          for ($i=$tm[0]; $i <= $tme[0]; $i++) 
          {                     
            $diff=0;
            if($i>9)
            {
              $from =  $i.":00:00";
              $to =  ($i+1).":00:00";     
            }
            else
            {
              $from =  "0".$i.":00:00";
              $to =  "0".($i+1).":00:00"; 
            }
            if($i==$tm[0]){
              $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['start']);
              $diff = $t1 - $t2;
              //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
                    for ($kl=0; $kl < $i+1; $kl++) { 
                      if($kl==$i){
                             $rslt[$n]['Time']=$from." To ".$to;
                              $rslt[$n]['rh']=(int)gmdate("i", $diff);
                              $ttls+=$rslt[$n]['rh'];
                              $n++;
                        }else{
                          $rslt[$n]['Time']=$kl.":00:00"." To ".($kl+1).":00:00";
                          $rslt[$n]['rh']=0;
                          $n++;
                        }
                            
                    }
              
              //echo $to."-".$arrayrs[$l]['start']."<br>";
              //echo gmdate("H:i:s", $diff);
              //echo $to."-".$arrayrs[$l]['start']."-".$diff."<br>";
            }else if($i==$tme[0]){
             $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['last']);
              $diff = $t1 - $t2;

              //echo $to."-".$arrayrs[$l]['last']."<br>";
               //echo gmdate("H:i:s", $diff);
               //$rslt[$n]['run']=gmdate("H:i:s", $diff);
                //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
             $tr= explode(':', $arrayrs[$l]['last']);
            // echo $tr[1];die();
                 //$rslt[$n]['Time']=$from." To ".$to;
              //$rslt[$n]['rh']=(int)gmdate("i", $diff);
               $ttls+=$tr[1];
               $n++;
              //echo $to."-".$arrayrs[$l]['last']."-".$diff."<br>"; die();
            }else{
             // $rslt[$n]['run']=gmdate("H:i:s", 3600);
              $rslt[$n]['Time']=$from." To ".$to;
              $rslt[$n]['rh']=60;
              $ttls+=$rslt[$n]['rh'];
              $n++;
              // echo $to."-".$from."<br>";
            }
            
          }
      }
      //print_r($rslt);
      return gmdate("H:i:s", ($ttls*60));

    }
    function getRunnHrs($data){
      $date = "'".$data['date']."'";
       
        $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYOSecondFloor' and TxnDate='2020-02-20' and LocationWithUtility='Unit_Status_OYO SecondFloor' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
       
      $data = $this->db->query($query)->result();
      $arrayrs=array();
      $k=0;
      for ($i=0; $i < count($data); $i++) {

      for ($j=$i+1; $j <= $i+1; $j++) { 
       
          $checkTime = strtotime($data[$i]->ToTime);
          $loginTime = strtotime($data[$j]->FromTime);
          $diff = $checkTime - $loginTime;
          if($i==0){
            $arrayrs[$k]['start']=$data[$i]->ToTime;
          }
          if($diff>0){
            $arrayrs[$k]['last']=$data[$i]->FromTime;
          }
          //echo $data[$i]->ToTime."---".$data[$j]->FromTime."--".$diff."<br>";
      }
      //return $data;
      }
      $rslt=array();
      for ($l=0; $l < count($arrayrs); $l++) { 
        //print_r($arrayrs[$l]['start']);
        $tm=explode(':', $arrayrs[$l]['start']);
         $tme=explode(':', $arrayrs[$l]['last']);
        //print_r($tm);die();
        $tt=0 ;
    $tsh=0;
    $n=0;
          for ($i=$tm[0]; $i <= $tme[0]; $i++) 
          {                     
            $diff=0;
            if($i>9)
            {
              $from =  $i.":00:00";
              $to =  ($i+1).":00:00";     
            }
            else
            {
              $from =  "0".$i.":00:00";
              $to =  "0".($i+1).":00:00"; 
            }
            if($i==$tm[0]){
              $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['start']);
              $diff = $t1 - $t2;
              //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
              for ($kl=0; $kl < $i+1; $kl++) { 
                if($kl==$i){
                  $rslt[$n]['Time']=$from." To ".$to;
                 $rslt[$n]['run']=(int)gmdate("i", $diff);
              $n++;
            }else{
              $rslt[$n]['Time']=$kl.":00:00"." To ".($kl+1).":00:00";
              $rslt[$n]['run']=0;
              $n++;
            }
                
              }
              
              //echo $to."-".$arrayrs[$l]['start']."<br>";
              //echo gmdate("H:i:s", $diff);
              //echo $to."-".$arrayrs[$l]['start']."-".$diff."<br>";
            }else if($i==$tme[0]){
             $t1 = strtotime($to);
              $t2 = strtotime($arrayrs[$l]['last']);
              $diff = $t1 - $t2;
              //echo $to."-".$arrayrs[$l]['last']."<br>";
               //echo gmdate("H:i:s", $diff);
               //$rslt[$n]['run']=gmdate("H:i:s", $diff);
                //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
                 $rslt[$n]['Time']=$from." To ".$to;
              $rslt[$n]['run']=(int)gmdate("i", $diff);
               $n++;
              //echo $to."-".$arrayrs[$l]['last']."-".$diff."<br>"; 
            }else{
             // $rslt[$n]['run']=gmdate("H:i:s", 3600);
              $rslt[$n]['Time']=$from." To ".$to;
              $rslt[$n]['run']=60;
              $n++;
              // echo $to."-".$from."<br>";
            }
            
          }
      }
      return $rslt;
      //print_r($rslt);
    }

}