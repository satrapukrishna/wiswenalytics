<?php
class Capital_model extends CI_Model{
	function __construct()
  {
	 parent::__construct();
  }
  function getHavcReport($data)
  {
    $meter = "'".$data['meter']."'";
    $date = "'".$data['date']."'";

    $query="select id, UtilityName,LocationName,UomScale,TxnDate, FromTime, ToTime, CurReading,Consumption from (
      select id, UtilityName,TxnDate, FromTime, ToTime, CurReading,Consumption ,LocationName,UomScale from app_device_station_consumtion_cyberspace where
       TxnDate=".$date." and FromTime NOT BETWEEN '23:56:00' AND '23:56:59' and LocationName=".$meter." and StationId='2020000021'  order by id desc 
        ) as sub where id=sub.id group by sub.UtilityName";
 
    // echo $query;die();
    $data = $this->db->query($query)->result();
      return $data;

  }
  function getahuReport($data)
  {
    $resultArray=array();
    $meter = "'".$data['meter']."'";
    $date = "'".$data['fromdate']."'";

    $queryrat="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Return Air Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00'";
        //echo $queryrat;die();
    $querysat="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Supply Air Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";    
    $queryrwt="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='CH Ret Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
    $queryswt="SELECT Fromtime,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='CW Sup Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";

    $queryactu="SELECT Fromtime,Consumption FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Actuator Level' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
    $querystmp="SELECT Fromtime,Consumption FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Set_Temp' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
    $querypressure="SELECT Fromtime,Consumption FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName=".$meter." and TxnDate=".$date." and UtilityName='Filter Pressure' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' ";
    $fulldata=array();
    $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYOSecondFloor' and TxnDate=".$date." and LocationWithUtility='Unit_Status_OYO SecondFloor' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
       
    $data = $this->db->query($query)->result();
    $arrayrs=array();
    $k=0;
    $ttls=0;
    for ($i=0; $i < count($data); $i++) 
    {
      for ($j=$i+1; $j <= $i+1; $j++) 
      { 
        $checkTime = strtotime($data[$i]->ToTime);
        $loginTime = strtotime($data[$j]->FromTime);
        $diff = $checkTime - $loginTime;
        if($i==0)
        {
          $arrayrs[$k]['start']=$data[$i]->ToTime;
        }
        if($diff>0)
        {
          $arrayrs[$k]['last']=$data[$i]->ToTime;
        }
        //echo $data[$i]->ToTime."---".$data[$j]->FromTime."--".$diff."<br>";
      }
      //return $data;
    }
    $rslt=array();
    for ($l=0; $l < count($arrayrs); $l++) 
    { 
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
        if($i==$tm[0])
        {
          $t1 = strtotime($to);
          $t2 = strtotime($arrayrs[$l]['start']);
          $diff = $t1 - $t2;
          //$rslt[$n]['Time']=$to." To ".$arrayrs[$l]['last'];
          for ($kl=0; $kl < $i+1; $kl++) 
          { 
            if($kl==$i)
            {
              $rslt[$n]['Time']=$from." To ".$to;
              $rslt[$n]['rh']=(int)gmdate("i", $diff);
              $ttls+=$rslt[$n]['rh'];
              $n++;
            }
            else
            {
              $rslt[$n]['Time']=$kl.":00:00"." To ".($kl+1).":00:00";
              $rslt[$n]['rh']=0;
              $n++;
            }
                
          }
              
          //echo $to."-".$arrayrs[$l]['start']."<br>";
          //echo gmdate("H:i:s", $diff);
          //echo $to."-".$arrayrs[$l]['start']."-".$diff."<br>";
        }
        else if($i==$tme[0])
        {
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
          for ($h=$tme[0]; $h <24 ; $h++) 
          { 
            $rslt[$n]['Time']=$h.":00:00"." To ".($h+1).":00:00";
            $rslt[$n]['rh']=0;
            $n++;
          }
          //echo $to."-".$arrayrs[$l]['last']."-".$diff."<br>"; 
        }
        else
        {
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
    $resultArray[0]['actu']=$dataactu;
    $resultArray[0]['stemp']=$ss;
    $resultArray[0]['pressure']=$ss;
    // $resultArray[0]['stemp']=$datastemp;
    // $resultArray[0]['pressure']=$datapressure;
    $resultArray[0]['run']=$rslt;

    return $resultArray;
  }

  function getahuRunnhrsReport($data)
  {
    $resultArray=array();
    $meter = "'".$data['meter']."'";
    $fromdate = $data['fromdate'];
    $todate = $data['fromdate'];
    $fromdate1 = "'".$data['fromdate']."'";
    $todate1 = "'".$data['todate']."'";
    // echo $fromdate."".$todate." ".$meter;
    $fulldata=array();
    $datesarray=array();
    if($data['fromdate'] == $data['todate'] )
    {
      $date = "'".$data['fromdate']."'";
      $date1 = $data['fromdate'];
      for ($i=0; $i < 24; $i++) 
      { 
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

        $query="select round(SUM(Consumption)/2) as Consumption FROM app_device_station_consumtion_samsung where StationId=2020000004 and TxnDate=".$date." and LocationWithUtility='FootFall Male_Male RestRoom' AND FromTime BETWEEN '".$from."' AND '".$to."' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";
        $data = $this->db->query($query)->result();
        if(isset($data[0]->Consumption))
        {
            $footfall=$data[0]->Consumption;
        }
        else
        {
            $footfall="0";
        }
        $fulldata[$i]['Time']=$from." To ".$to;
        $fulldata[$i]['footfall']=$footfall;
        $fulldata[$i]['Date']=$date1;

        // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2020000004,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
        // $this->db->query($insQuery);
         

      }
      return $fulldata;
    } 

    else
    {
      // echo "string";
      $date_from = strtotime($data['fromdate']); 
      $date_to = strtotime($data['todate']); 
      // echo $date_from."".$date_to;
      
      for ($i1=$date_from; $i1<=$date_to; $i1+=86400) 
      {
        array_push($datesarray, date("Y-m-d",$i1));  
      }
      // print_r($datesarray);
      // return $fromdate1;
      for ($k=0; $k < count($datesarray); $k++) 
      { 
        // $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYOSecondFloor' and TxnDate=".$date." and LocationWithUtility='Unit_Status_OYO SecondFloor' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
        $query="select round(SUM(Consumption)) as Consumption FROM protech_bms.app_device_station_consumtion_cyberspace where StationId=2020000021 and TxnDate='".$datesarray[$k]."' and LocationWithUtility='Unit Run Time_OYO SecondFloor' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00'";

          // select round(SUM(Consumption)/2) as Consumption FROM protech_bms.app_device_station_consumtion_cyberspace 
          // where StationId=2020000021 and TxnDate='2020-02-20' and 
          // LocationWithUtility='Unit Run Time_OYO SecondFloor' AND  FromTime NOT BETWEEN '23:56:00' AND '23:57:00';
        // echo $query;
        $data = $this->db->query($query)->result();
        if(isset($data[0]->Consumption))
        {
          $runnhrs_mins=$data[0]->Consumption;
          // $runnhrs = 
        }
        else
        {
          $runnhrs_mins="0";
        }
        $fulldata[$k]['meter']=$meter;
        $fulldata[$k]['runnhrs']=$runnhrs_mins;
        $fulldata[$k]['Date']=$datesarray[$k];

      }
      return $fulldata;
    }
    // $fulldata=array();
    // $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYOSecondFloor' and TxnDate=".$date." and LocationWithUtility='Unit_Status_OYO SecondFloor' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
       
    // $data = $this->db->query($query)->result();
    
    // return $resultArray;
  }


  function getHavcList()
  {
    $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion_cyberspace WHERE  MeterType=17";
    $data = $this->db->query($query)->result();
    return $data;
  }
    function getSumRun($data){
      $date = "'".$data['date']."'";
       
        $fulldata=array();
         $query="SELECT FromTime,ToTime,PrvReading,CurReading FROM app_device_station_consumtion_cyberspace where StationId=2020000021 and LocationName='OYOSecondFloor' and TxnDate=".$date." and LocationWithUtility='Unit_Status_OYO SecondFloor' and FromTime NOT BETWEEN '23:56:00' AND '24:00:00' and CurReading>0";
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