<?php
class Fuel_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getBoilersList(){
    	
        $query = "SELECT DISTINCT LocationName AS MeterName FROM app_device_station_consumtion WHERE UtilityName IN('Fuel_Level','Run Minutes') and LocationName Not in('Boiler_4A','Boiler_4B')";//"SELECT DISTINCT [LocationName] AS [MeterName] FROM ".$db.".[dbo].".$table." WHERE [MeterType] = 0017";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    /*function getBoilerConsumptionData(){
    	$db = $this->session->userdata('DB');
    	$table = $this->session->userdata('Table');
    	$this->load->database($db);
    }*/
    function getFuelDashData($data){
        //today
    	$date = "'".$data['date']."'";
        //yesterday
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $yesterDay = "'".$yesterDay."'";
        //lastweek
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $startweekdate = "'".$start_week."'";
        $endweekdate = "'".$end_week."'";


        // if($data['meter']=='Boiler_4'){
        //    $data['meter']='Boiler_4A' ;
        // }
//echo $data['meter'];die();
        $meter = "'".$data['meter']."'";
        if($data['meter']=='Boiler_3'){
            //running Hours
           $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName='DG_Running_Time'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate=".$date;         
         // echo $queryrunday;die();
           $queryrunyester = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate=".$yesterDay;

            $queryrunlastweek = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,CONCAT(FLOOR((SUM(Consumption)/7)/60),':',MOD(ROUND((SUM(Consumption)/7)),60),':00')  AS AvgRunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND  UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;

            //fuel Consume
              $fuelConsumetoday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
              $fuelconsumeyesterday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                //fuel add
                $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";
                $fueladdYesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";
                //consume and add result
                $datacontday = $this->db->query($fuelConsumetoday)->result();
                $dataadtday = $this->db->query($fueladdToday)->result();
                $dataconyday = $this->db->query($fuelconsumeyesterday)->result();
                $dataaddyday = $this->db->query($fueladdYesterday)->result();
                //run result
                $dataruntday = $this->db->query($queryrunday)->result();
                $dataarunyday = $this->db->query($queryrunyester)->result();
                $datarunweek = $this->db->query($queryrunlastweek)->result();

                $date_from = strtotime($start_week); 
                $date_to = strtotime($end_week); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                $faddweek=0;
                $fconsweek=0;
                for ($k=0; $k < count($datesarray); $k++) {
                 $fuelConsumeweek="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                
                 $fueladdweek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate='".$datesarray."' AND UtilityName='Fuel_Filled' ";
                 $dataconweek = $this->db->query($fuelConsumeweek)->result();
                 $fconsweek+=abs($dataconweek[0]->first-$dataconweek[0]->last);
                 $dataaddweek = $this->db->query($fueladdweek)->result();
                 $faddweek+=$dataaddweek[0]->fueladd;
                }
                $run['today']['cum']=$dataruntday[0]->RunningHours;
                $run['yesterday']['cum']=$dataarunyday[0]->RunningHours;
                $run['lastweek']['cum']=$datarunweek[0]->RunningHours;
                $run['lastweek']['avg']=$datarunweek[0]->AvgRunningHours;

                $added['today']['cum']=round($dataadtday[0]->fueladd);
                $added['yesterday']['cum']=round($dataaddyday[0]->fueladd);
                $added['lastweek']['cum'] = round($faddweek);
                $added['lastweek']['avg'] = round($faddweek/7);

                $consumed['today']['cum']=round(abs(abs($datacontday[0]->first-$datacontday[0]->last)-$dataadtday[0]->fueladd));
                $consumed['yesterday']['cum']=round(abs(abs($dataconyday[0]->first-$dataconyday[0]->last)-$dataaddyday[0]->fueladd));
                $consumed['lastweek']['cum'] = round($fconsweek-$faddweek);
                $consumed['lastweek']['avg'] = round(($fconsweek-$faddweek)/7);

                $economy['today']=round($consumed['today']['cum']/($dataruntday[0]->CumRunningHours/60));
                $economy['yesterday']=round( $consumed['yesterday']['cum']/($dataarunyday[0]->CumRunningHours/60));
                $economy['lastweek']=round($consumed['lastweek']['cum']/($datarunweek[0]->CumRunningHours/60));
                $result['meter'] = $this->input->get('meter');
                $result['runningHours'] = $run;
                $result['added'] = $added;
                $result['consumed'] = $consumed;
                $result['economy'] = $economy;
               return $result;
              //echo $fuelyesterday;die();

        }else if($data['meter']=='Boiler_4'){
            //running Hours
           $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName in ('Boiler_4A','Boiler_4A') AND UtilityName='DG_Running_Time'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate=".$date;         
          //echo $queryrunday;die();
           $queryrunyester = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName in ('Boiler_4A','Boiler_4A') AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate=".$yesterDay;

            $queryrunlastweek = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,CONCAT(FLOOR((SUM(Consumption)/7)/60),':',MOD(ROUND((SUM(Consumption)/7)),60),':00')  AS AvgRunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName in ('Boiler_4A','Boiler_4A') AND  UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
           // echo $queryrunlastweek;
            //fuel Consume
              $fuelConsumetoday4a="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                //echo $fuelConsumetoday;die();
              $fuelconsumeyesterday4a="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                $fuelConsumetoday4b="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                //echo $fuelConsumetoday;die();
              $fuelconsumeyesterday4b="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";

                //fuel add
                $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName in('Boiler_4A','Boiler_4B') AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";
                
                $fueladdYesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName in('Boiler_4A','Boiler_4B') AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";

                //consume and add result
                $datacontday4a = $this->db->query($fuelConsumetoday4a)->result();
                $datacontday4b = $this->db->query($fuelConsumetoday4b)->result();
                
                $dataconyday4a = $this->db->query($fuelconsumeyesterday4a)->result();              
                $dataconyday4b = $this->db->query($fuelconsumeyesterday4b)->result();

                $dataadtday = $this->db->query($fueladdToday)->result();              
                $dataaddyday = $this->db->query($fueladdYesterday)->result();
                //run result
                $dataruntday = $this->db->query($queryrunday)->result();

                $dataarunyday = $this->db->query($queryrunyester)->result();
               // print_r($dataarunyday[0]->CumRunningHours);die();
                $datarunweek = $this->db->query($queryrunlastweek)->result();

                $date_from = strtotime($start_week); 
                $date_to = strtotime($end_week); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                $faddweek=0;
                $fconsweek=0;
                for ($k=0; $k < count($datesarray); $k++) {
                 $fuelConsumeweek4a="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4A' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                $fuelConsumeweek4b="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName='Boiler_4B' AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                
                 $fueladdweek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName in('Boiler_4A','Boiler_4B') AND TxnDate='".$datesarray."' AND UtilityName='Fuel_Filled' ";
                 $dataconweek4a = $this->db->query($fuelConsumeweek4a)->result();
                 $dataconweek4b = $this->db->query($fuelConsumeweek4b)->result();
                 $fconsweek+=abs(($dataconweek4a[0]->first+$dataconweek4b[0]->first)-($dataconweek4a[0]->last+$dataconweek4b[0]->last));
                 $dataaddweek = $this->db->query($fueladdweek)->result();
                 $faddweek+=$dataaddweek[0]->fueladd;
                }
                $run['today']['cum']=$dataruntday[0]->RunningHours;
                $run['yesterday']['cum']=$dataarunyday[0]->RunningHours;
                $run['lastweek']['cum']=$datarunweek[0]->RunningHours;
                $run['lastweek']['avg']=$datarunweek[0]->AvgRunningHours;

                $added['today']['cum']=round($dataadtday[0]->fueladd);
                $added['yesterday']['cum']=round($dataaddyday[0]->fueladd);
                $added['lastweek']['cum'] = round($faddweek);
                $added['lastweek']['avg'] = round($faddweek/7);

              //if()
                $consumed['today']['cum']=round(abs(abs(($datacontday4a[0]->first+$datacontday4b[0]->first)-($datacontday4a[0]->last+$datacontday4b[0]->last))-$dataadtday[0]->fueladd));
                $consumed['yesterday']['cum']=round(abs(abs(($dataconyday4a[0]->first+$dataconyday4b[0]->first)-($dataconyday4a[0]->last+$dataconyday4b[0]->last))-$dataaddyday[0]->fueladd));
                $consumed['lastweek']['cum'] = round(abs($fconsweek-$faddweek));
                $consumed['lastweek']['avg'] = round(abs($fconsweek-$faddweek)/7);

                $economy['today']=round($consumed['today']['cum']/($dataruntday[0]->CumRunningHours/60));
                $economy['yesterday']=round( $consumed['yesterday']['cum']/($dataarunyday[0]->CumRunningHours/60));
                $economy['lastweek']=round($consumed['lastweek']['cum']/($datarunweek[0]->CumRunningHours/60));
                $result['meter'] = $this->input->get('meter');
                $result['runningHours'] = $run;
                $result['added'] = $added;
                $result['consumed'] = $consumed;
                $result['economy'] = $economy;
                return $result;

      }else if($data['meter']=='Boiler_2'){
        //  $timings="SELECT FromTime,ToTime FROM app_device_station_consumtion WHERE LocationName='Boiler_2' AND UtilityName='Run Minutes'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption>0 AND  TxnDate=".$date." order by  FromTime ASC";
        //  $datatimes = $this->db->query($timings)->result();
        //  $k=0;
        //   $datab2times=array();
        // for ($i1=0; $i1 < count($datatimes); $i1++) { 
        //     for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
        //         $ts1 = strtotime($datatimes[$i1]->ToTime);
        //         $ts2 = strtotime($datatimes[$j]->FromTime);     
        //         $seconds_diff = $ts2 - $ts1; 
        //         if($seconds_diff!=0) {
                    
        //             $datab2times[$k]->FromTime=$datatimes[$i1]->FromTime;
        //             $datab2times[$k]->ToTime=$datatimes[$i1]->ToTime;
                    
        //             $k++;
        //         } else if($seconds_diff==0){
                    
        //         }                         
               
                
        //     }
        //  }

             $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName='Run Minutes'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate=".$date;         
          //echo $queryrunday;die();
           $queryrunyester = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName ='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate=".$yesterDay;

            $queryrunlastweek = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,CONCAT(FLOOR((SUM(Consumption)/7)/60),':',MOD(ROUND((SUM(Consumption)/7)),60),':00')  AS AvgRunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND  UtilityName ='Run Minutes' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;

            //fuel Consume
              //$fuelConsumetoday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',(SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
              //$fuelconsumeyesterday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',(SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                //fuel add
               // $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";
                //$fueladdYesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";
                //consume and add result
               // $datacontday = $this->db->query($fuelConsumetoday)->result();
                //$dataadtday = $this->db->query($fueladdToday)->result();
               // $dataconyday = $this->db->query($fuelconsumeyesterday)->result();
                //$dataaddyday = $this->db->query($fueladdYesterday)->result();
                //run result
                $dataruntday = $this->db->query($queryrunday)->result();
                $dataarunyday = $this->db->query($queryrunyester)->result();
                $datarunweek = $this->db->query($queryrunlastweek)->result();

                // $date_from = strtotime($start_week); 
                // $date_to = strtotime($end_week); 
                // $datesarray=array();
                // for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                //     array_push($datesarray, date("Y-m-d",$i1));
                    
                // }
                // $faddweek=0;
                // $fconsweek=0;
                // for ($k=0; $k < count($datesarray); $k++) {
                //  $fuelConsumeweek="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                // (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                
                //  $fueladdweek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate='".$datesarray."' AND UtilityName='Fuel_Filled' ";
                //  $dataconweek = $this->db->query($fuelConsumeweek)->result();
                //  $fconsweek+=abs($dataconweek[0]->first-$dataconweek[0]->last);
                //  $dataaddweek = $this->db->query($fueladdweek)->result();
                //  $faddweek+=$dataaddweek[0]->fueladd;
                // }
                $run['today']['cum']=$dataruntday[0]->RunningHours;
                $run['yesterday']['cum']=$dataarunyday[0]->RunningHours;
                $run['lastweek']['cum']=$datarunweek[0]->RunningHours;
                $run['lastweek']['avg']=$datarunweek[0]->AvgRunningHours;

                $added['today']['cum']='NA';
                $added['yesterday']['cum']='NA';
                $added['lastweek']['cum'] = 'NA';
                $added['lastweek']['avg'] ='NA';

                $consumed['today']['cum']='NA';
                $consumed['yesterday']['cum']='NA';
                $consumed['lastweek']['cum'] = 'NA';
                $consumed['lastweek']['avg'] = 'NA';

                $economy['today']='NA';
                $economy['yesterday']='NA';
                $economy['lastweek']='NA';
                $result['meter'] = $this->input->get('meter');
                $result['runningHours'] = $run;
                $result['added'] = $added;
                $result['consumed'] = $consumed;
                $result['economy'] = $economy;
                return $result;
        }else if($data['meter']=='Boiler_1'){
            //running Hours
           $queryrunday = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName='DG_Running_Time'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND  TxnDate=".$date;         
         
           $queryrunyester = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate=".$yesterDay;

            $queryrunlastweek = "SELECT CONCAT(FLOOR(SUM(Consumption)/60),':',MOD(SUM(Consumption),60),':00')  AS RunningHours,CONCAT(FLOOR((SUM(Consumption)/7)/60),':',MOD(ROUND((SUM(Consumption)/7)),60),':00')  AS AvgRunningHours,SUM(Consumption) AS CumRunningHours FROM app_device_station_consumtion WHERE LocationName=".$meter." AND  UtilityName ='DG_Running_Time' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;

            //fuel Consume
              $fuelConsumetoday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
              $fuelconsumeyesterday="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                //fuel add
                $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";
                $fueladdYesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";
                //consume and add result
                $datacontday = $this->db->query($fuelConsumetoday)->result();
                $dataadtday = $this->db->query($fueladdToday)->result();
                $dataconyday = $this->db->query($fuelconsumeyesterday)->result();
                $dataaddyday = $this->db->query($fueladdYesterday)->result();
                //run result
                $dataruntday = $this->db->query($queryrunday)->result();
                $dataarunyday = $this->db->query($queryrunyester)->result();
                $datarunweek = $this->db->query($queryrunlastweek)->result();

                $date_from = strtotime($start_week); 
                $date_to = strtotime($end_week); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                $faddweek=0;
                $fconsweek=0;
                for ($k=0; $k < count($datesarray); $k++) {
                 $fuelConsumeweek="SELECT (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id LIMIT 1) as 'first',
                (SELECT CurReading FROM app_device_station_consumtion WHERE LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' ORDER BY id DESC LIMIT 1) as 'last'";
                
                 $fueladdweek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate='".$datesarray."' AND UtilityName='Fuel_Filled' ";
                 $dataconweek = $this->db->query($fuelConsumeweek)->result();
                 $fconsweek+=abs($dataconweek[0]->first-$dataconweek[0]->last);
                 $dataaddweek = $this->db->query($fueladdweek)->result();
                 $faddweek+=$dataaddweek[0]->fueladd;
                }
                $run['today']['cum']=$dataruntday[0]->RunningHours;
                $run['yesterday']['cum']=$dataarunyday[0]->RunningHours;
                $run['lastweek']['cum']=$datarunweek[0]->RunningHours;
                $run['lastweek']['avg']=$datarunweek[0]->AvgRunningHours;

                $added['today']['cum']=round($dataadtday[0]->fueladd);
                $added['yesterday']['cum']=round($dataaddyday[0]->fueladd);
                $added['lastweek']['cum'] = round($faddweek);
                $added['lastweek']['avg'] = round($faddweek/7);
                if($dataruntday[0]->CumRunningHours>0){
                    $consumed['today']['cum']=round(abs(abs($datacontday[0]->first-$datacontday[0]->last)-$dataadtday[0]->fueladd));
                    $economy['today']=round($consumed['today']['cum']/($dataruntday[0]->CumRunningHours/60));
                }else{
                    $consumed['today']['cum']=0;
                    $economy['today']=0;
                }
                if($dataarunyday[0]->CumRunningHours>0){
                     $consumed['yesterday']['cum']=round(abs(abs($dataconyday[0]->first-$dataconyday[0]->last)-$dataaddyday[0]->fueladd));
                     $economy['yesterday']=round( $consumed['yesterday']['cum']/($dataarunyday[0]->CumRunningHours/60));
                }else{
                   $consumed['yesterday']['cum']=0;
                   $economy['yesterday']=0; 
                }
                if($datarunweek[0]->CumRunningHours>0){
                    $consumed['lastweek']['cum'] = round($fconsweek-$faddweek);
                $consumed['lastweek']['avg'] = round(($fconsweek-$faddweek)/7);
                $economy['lastweek']=round($consumed['lastweek']['cum']/($datarunweek[0]->CumRunningHours/60));
                }else{
                    $consumed['lastweek']['cum'] = 0;
                    $consumed['lastweek']['avg'] = 0;
                    $economy['lastweek']=0;
                }
                
                $result['meter'] = $this->input->get('meter');
                $result['runningHours'] = $run;
                $result['added'] = $added;
                $result['consumed'] = $consumed;
                $result['economy'] = $economy;
               return $result;

        }
        else if($data['meter']=='Boiler_1&2'){
              $run['today']['cum']=0;
                $run['yesterday']['cum']=0;
                $run['lastweek']['cum']=0;
                $run['lastweek']['avg']=0;

                $added['today']['cum']='0';
                $added['yesterday']['cum']='0';
                $added['lastweek']['cum'] = '0';
                $added['lastweek']['avg'] ='0';

                $consumed['today']['cum']='0';
                $consumed['yesterday']['cum']='0';
                $consumed['lastweek']['cum'] = '0';
                $consumed['lastweek']['avg'] = '0';

                $economy['today']='0';
                $economy['yesterday']='0';
                $economy['lastweek']='0';
                $result['meter'] = 'Boiler_1&2';
                $result['runningHours'] = $run;
                $result['added'] = $added;
                $result['consumed'] = $consumed;
                $result['economy'] = $economy;
               return $result;
        }
    	
		
    }
   
    function getDashBoilerRuningTimings($data){
        // today calculation
        $meter = "'".$data['meter']."'";
        $date = "'".$data['date']."'";

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
        $startweekdate = "'".$start_week."'";
        $endweekdate = "'".$end_week."'";
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $yesterDay = "'".$yesterDay."'";
         // Function to get all the dates in given range 
                function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
                      
                    // Declare an empty array 
                    $array = array(); 
                      
                    // Variable that store the date interval 
                    // of period 1 day 
                    $interval = new DateInterval('P1D'); 
                  
                    $realEnd = new DateTime($end); 
                    $realEnd->add($interval); 
                  
                    $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
                  
                    // Use loop to store date into array 
                    foreach($period as $date) {                  
                        $array[] = $date->format($format);  
                    } 
                  
                    // Return the array elements 
                    return $array; 
                }

        if($data['meter']==='Boiler_1'){

            //today
            $querytoday="SELECT FromTime,ToTime,TxnDate  FROM app_device_station_consumtion WHERE LocationName='Boiler_1' AND  UtilityName in ('DG_Running_Time') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND Consumption>0 AND TxnDate=".$date;
            //yesterday
            $queryyesterday="SELECT FromTime,ToTime,TxnDate  FROM app_device_station_consumtion WHERE LocationName='Boiler_1' AND  UtilityName in ('DG_Running_Time') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND Consumption>0 AND TxnDate=".$yesterDay;
            //lastweek
           
            $weekdays = getDatesFromRange($start_week, $end_week); 
            for ($i=0; $i < count($weekdays); $i++) {
              $wq="SELECT FromTime,ToTime,TxnDate  FROM app_device_station_consumtion WHERE LocationName='Boiler_1' AND  UtilityName in ('DG_Running_Time') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND Consumption>0 AND TxnDate='".$weekdays[$i]."'";
               //echo $wq."<br>";
              $data = $this->db->query($wq)->result();
               $count=0;
              if (count($data)>2) {
                $count=count($data);
                // $dt=explode(':', $data[0]->FromTime);
                // $time=$dt[0].":".$dt[1]-15).":".$dt[2];
                // echo  $time;

               // $dateformat=explode(':', $data[0]->FromTime);
                $res[$i]['lastweek']['first']=$data[0]->FromTime;
                $res[$i]['lastweek']['last']=$data[$count-1]->ToTime;
                $res[$i]['lastweek']['date']=$data[0]->TxnDate;
                
            }else{
                $res[$i]['lastweek']['first']='00:00:00';
                $res[$i]['lastweek']['last']='00:00:00';;
                $res[$i]['lastweek']['date']=$weekdays[$i];
            }
             // echo $wq;
                # code...
            }

            $datatoday = $this->db->query($querytoday)->result();
               $count1=0;
              if (count($datatoday)>2) {
                $count1=count($datatoday);
                $res['today']['first']=$datatoday[0]->FromTime;
                $res['today']['last']=$datatoday[$count1-1]->ToTime;
                $res['today']['date']=$datatoday[0]->TxnDate;
                
            }else{
                $res['today']['first']='00:00:00';
                $res['today']['last']='00:00:00';
                $res['today']['date']=$data['date'];
            }
            $datayesterday = $this->db->query($queryyesterday)->result();
               $count1=0;
              if (count($datayesterday)>2) {
                $count1=count($datayesterday);
                $res['yesterday']['first']=$datayesterday[0]->FromTime;
                $res['yesterday']['last']=$datayesterday[$count1-1]->ToTime;
                $res['yesterday']['date']=$datayesterday[0]->TxnDate;
                
            }else{
                $res['yesterday']['first']='00:00:00';
                $res['yesterday']['last']='00:00:00';
                $res['yesterday']['date']=date('Y-m-d',strtotime("-1 days"));
            }

           return $res;

        }
        if($data['meter']==='Boiler_2'){
               

                //today
            $querytoday="SELECT FromTime,ToTime,TxnDate  FROM app_device_station_consumtion WHERE LocationName='Boiler_2' AND  UtilityName in ('Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND Consumption>0 AND TxnDate=".$date;
            //yesterday
            $queryyesterday="SELECT FromTime,ToTime,TxnDate  FROM app_device_station_consumtion WHERE LocationName='Boiler_2' AND  UtilityName in ('Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND Consumption>0 AND TxnDate=".$yesterDay;
            //lastweek
            
            $weekdays = getDatesFromRange($start_week, $end_week); 
            for ($i=0; $i < count($weekdays); $i++) {             
              $wq="SELECT FromTime,ToTime,TxnDate  FROM app_device_station_consumtion WHERE LocationName='Boiler_2' AND  UtilityName in ('Run Minutes') AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00' AND Consumption<50 AND Consumption>0 AND TxnDate='".$weekdays[$i]."'";
               //echo $wq."<br>";
              $dataweek = $this->db->query($wq)->result();
               $count=0;
              if (count($dataweek)>2) {
                $count=count($dataweek);
                $res[$i]['lastweek']['first']=$dataweek[0]->FromTime;
                $res[$i]['lastweek']['last']=$dataweek[$count-1]->ToTime;
                $res[$i]['lastweek']['date']=$dataweek[0]->TxnDate;
                
            }else{
                $res[$i]['lastweek']['first']='00:00:00';
                $res[$i]['lastweek']['last']='00:00:00';;
                $res[$i]['lastweek']['date']=$weekdays[$i];
            }
             // echo $wq;
                # code...
            }

            $datatoday = $this->db->query($querytoday)->result();
               $count1=0;
              if (count($datatoday)>2) {
                $count1=count($datatoday);
                $res['today']['first']=$datatoday[0]->FromTime;
                $res['today']['last']=$datatoday[$count1-1]->ToTime;
                $res['today']['date']=$datatoday[0]->TxnDate;
                
            }else{
                $res['today']['first']='00:00:00';
                $res['today']['last']='00:00:00';
                $res['today']['date']=$data['date'];
            }
            $datayesterday = $this->db->query($queryyesterday)->result();
               $count1=0;
              if (count($datayesterday)>2) {
                $count1=count($datayesterday);
                $res['yesterday']['first']=$datayesterday[0]->FromTime;
                $res['yesterday']['last']=$datayesterday[$count1-1]->ToTime;
                $res['yesterday']['date']=$datayesterday[0]->TxnDate;
                
            }else{
                $res['yesterday']['first']='00:00:00';
                $res['yesterday']['last']='00:00:00';
                $res['yesterday']['date']=date('Y-m-d',strtotime("-1 days"));
            }

            return $res;
            }
                  
}
    function getDashBoilerAdded($data){
    	// today calculation
    	// if($data['meter']==='Boiler_2'){
     //        $data['meter']='Boiler_1';
     //    }

       
        //$meter = "'".$data['meter']."'";
        $date = "'".$data['date']."'";
        if($data['meter']=='Boiler_4'){
           $data['meter']='Boiler_4A' ;
        }

        $meter = "'".$data['meter']."'";
        $query = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate=".$date;
        //echo $query;die();
        $data = $this->db->query($query)->result();
        //last week calculation 
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
        $startweekdate = "'".$start_week."'";
        $endweekdate = "'".$end_week."'";
         
        $query1 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
        //echo $query1;die();
        $data1 = $this->db->query($query1)->result();
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $yesterDay = "'".$yesterDay."'";

        $query4 = "SELECT SUM(Consumption) AS consumption  FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Filled' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate=".$yesterDay;
        //echo $query4;die();
        $data4 = $this->db->query($query4)->result();
        return $data[0]->consumption.",".$data4[0]->consumption.",".$data1[0]->consumption;
       


    	
    }
    function getDashBoilerConsumed($data){
       // print_r($timings);die();
    	// today calculation
    	if($data['meter']==='Boiler_2'){
            $data['meter']='Boiler_1';
        }
       
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";

        //last week calculation 
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
        $startweekdate = "'".$start_week."'";
        $endweekdate = "'".$end_week."'";
        //yesterday
        $yesterDay = date('Y-m-d',strtotime("-1 days"));
        $yesterDay = "'".$yesterDay."'";
        
        if($data['meter']==='Boiler_4'){
           //today 4A and 4B
           $fuelfirst4AToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

           $fuellast4AToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
           $fuelfirst4BToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

           $fuellast4BToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
           $fueladd4Today = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";
            $dataConsumefirst4AToday = $this->db->query($fuelfirst4AToday)->result();
            $dataConsumelast4AToday = $this->db->query($fuellast4AToday)->result();
            $dataConsumefirst4BToday = $this->db->query($fuelfirst4BToday)->result();
            $dataConsumelast4BToday = $this->db->query($fuellast4BToday)->result();
            $datafueladdToday = $this->db->query($fueladd4Today)->result();
            $A4consumeToday=abs(abs($dataConsumefirst4AToday[0]->first-$dataConsumelast4AToday[0]->last));
            $B4consumeToday=abs(abs($dataConsumefirst4BToday[0]->first-$dataConsumelast4BToday[0]->last));
            $consume4Today=$A4consumeToday+$B4consumeToday;
            // echo  $consume4Today;die();
            $fuelconsume4Today=abs($consume4Today-$datafueladdToday[0]->fueladd);
             //echo $A4consumeToday."===".$B4consumeToday;die();
           
            //yesterday 4A and 4B
           $fuelfirst4AYesterday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

           $fuellast4AYesterday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
           $fuelfirst4BYesterday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

           $fuellast4BYesterday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
           $fueladd4Yesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";
            $dataConsumefirst4AYesterday = $this->db->query($fuelfirst4AYesterday)->result();
            $dataConsumelast4AYesterday = $this->db->query($fuellast4AYesterday)->result();
            $dataConsumefirst4BYesterday = $this->db->query($fuelfirst4BYesterday)->result();
            $dataConsumelast4BYesterday = $this->db->query($fuellast4BYesterday)->result();
            $datafueladdYesterday = $this->db->query($fueladd4Yesterday)->result();
            $A4consumeYesterday=abs(abs($dataConsumefirst4AYesterday[0]->first-$dataConsumelast4AYesterday[0]->last));
            $B4consumeYesterday=abs(abs($dataConsumefirst4BYesterday[0]->first-$dataConsumelast4BYesterday[0]->last));
            $consume4Yesterday=$A4consumeYesterday+$B4consumeYesterday;
            $fuelconsume4Yesterday=abs($consume4Yesterday-$datafueladdYesterday[0]->fueladd);
            //echo  $fuelconsume4Yesterday;die();
            //Lastweek 4A and 4B
           $fuelfirst4ALastweek = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

           $fuellast4ALastweek = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
           $fuelfirst4BLastweek = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

           $fuellast4BLastweek = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName='Boiler_4B' AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
           $fueladd4Lastweek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName='Boiler_4A' AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Filled' ";
            $dataConsumefirst4ALastweek = $this->db->query($fuelfirst4ALastweek)->result();
            $dataConsumelast4ALastweek = $this->db->query($fuellast4ALastweek)->result();
            $dataConsumefirst4BLastweek = $this->db->query($fuelfirst4BLastweek)->result();
            $dataConsumelast4BYesterday = $this->db->query($fuellast4BLastweek)->result();
            $datafueladdLastweek = $this->db->query($fueladd4Lastweek)->result();
            $A4consumeLastweek=abs(abs($dataConsumefirst4ALastweek[0]->first-$dataConsumelast4ALastweek[0]->last));
            $B4consumeLastweek=abs(abs($dataConsumefirst4BLastweek[0]->first-$dataConsumelast4BLastweek[0]->last));
            $consume4Lastweek=$A4consumeLastweek+$B4consumeLastweek;
            $fuelconsume4Lastweek=abs($consume4Lastweek-$datafueladdLastweek[0]->fueladd);
            //echo  $fuelconsume4Lastweek;die();

            return $fuelconsume4Today.",".$fuelconsume4Yesterday.",".$fuelconsume4Lastweek;



        }elseif($data['meter']==='Boiler_1')
            {                
            //today
                 $fuelfirstToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

            $fuellastToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";

            $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";
            // $fuelfirstToday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime  BETWEEN '".$timings['today']['first']."' AND '".$timings['today']['last']."' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

            // $fuellastToday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime  BETWEEN '".$timings['today']['first']."' AND '".$timings['today']['last']."' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";

            // $fueladdToday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate='".$timings['today']['date']."' AND UtilityName='Fuel_Filled' ";

            $dataConsumefirstToday = $this->db->query($fuelfirstToday)->result();
            $dataConsumelastToday = $this->db->query($fuellastToday)->result();
            $datafueladdToday = $this->db->query($fueladdToday)->result();
            $fuelconsumeToday=abs((abs($dataConsumefirstToday[0]->first-$dataConsumelastToday[0]->last))-$datafueladdToday[0]->fueladd);
            //yesterday
            $fuelfirstYesterday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND  FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

            $fuellastYesterday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level'  AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
            //echo $fuellastYesterday;die();
            $fueladdYesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";
            // $fuelfirstYesterday = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime  BETWEEN '".$timings['yesterday']['first']."' AND '".$timings['yesterday']['last']."' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

            // $fuellastYesterday = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime  BETWEEN '".$timings['yesterday']['first']."' AND '".$timings['yesterday']['last']."' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
            // //echo $fuellastYesterday;die();
            // $fueladdYesterday = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate='".$timings['yesterday']['date']."' AND UtilityName='Fuel_Filled' ";
            //echo  $fueladdYesterday ;die();
            $dataConsumefirstYesterday = $this->db->query($fuelfirstYesterday)->result();
            //print_r($dataConsumefirstYesterday);
            $dataConsumelastYesterday = $this->db->query($fuellastYesterday)->result();
            //print_r($dataConsumelastYesterday);
            $datafueladdYesterday = $this->db->query($fueladdYesterday)->result();
            $fuelconsumeYesterday=abs((abs($dataConsumefirstYesterday[0]->first-$dataConsumelastYesterday[0]->last))-$datafueladdYesterday[0]->fueladd);
            
            //lastweek
            $fuelfirstWeek = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND  TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";
       // echo  $fuelfirst1;die();

            $fuellastWeek = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
             $fueladdWeek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Filled' ";

              $dataConsumefirstWeek = $this->db->query($fuelfirstWeek)->result();
            $dataConsumelastWeek = $this->db->query($fuellastWeek)->result();
            $datafueladdWeek = $this->db->query($fueladdWeek)->result();
            $fuelconsumeWeek=abs((abs($dataConsumefirstWeek[0]->first-$dataConsumelastWeek[0]->last))-$datafueladdWeek[0]->fueladd);
            //echo count($timings);
//             $fuelconsumeWeek=0;
//             for ($i=0; $i < count($timings)-2; $i++) { 
//                $fuelfirstWeek = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime  BETWEEN '".$timings[$i]['lastweek']['first']."' AND '".$timings[$i]['lastweek']['last']."' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";
// //echo $fuelfirstWeek."<br>";
//             $fuellastWeek = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime  BETWEEN '".$timings[$i]['lastweek']['first']."' AND '".$timings[$i]['lastweek']['last']."' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
//             //echo $fuelfirst;die();
//             $fueladdWeek = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate='".$timings[$i]['lastweek']['date']."' AND UtilityName='Fuel_Filled' ";
//             $dataConsumefirstWeek = $this->db->query($fuelfirstWeek)->result();
//             $dataConsumelastWeek = $this->db->query($fuellastWeek)->result();
//             $datafueladdWeek = $this->db->query($fueladdWeek)->result();
//             //echo $datafueladdWeek[0]->fueladd."<br>";
//             if ((abs($dataConsumefirstWeek[0]->first-$dataConsumelastWeek[0]->last))>0) {
//                $fuelconsumeWeek+=abs((abs($dataConsumefirstWeek[0]->first-$dataConsumelastWeek[0]->last))-$datafueladdWeek[0]->fueladd);
//             }
//             else{
//                 $fuelconsumeWeek+=(abs($dataConsumefirstWeek[0]->first-$dataConsumelastWeek[0]->last));
//             }
            
//             }
            return $fuelconsumeToday.",".$fuelconsumeYesterday.",".$fuelconsumeWeek;
            //echo $fuelconsumeToday.",".$fuelconsumeYesterday.",".$fuelconsumeWeek;
//die();
            }else{
            //today
           $fuelfirst = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";

        $fuellast = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";
//lastweek

        $fuelfirst1 = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND  TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id desc limit 1";
       // echo  $fuelfirst;die();

        $fuellast1 = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  ORDER BY id asc limit 1";

        //yesretday
        $fuelfirst2 = "SELECT CurReading as first FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id desc limit 1";
       // echo  $fuelfirst2;die();
        $fuellast2 = "SELECT CurReading as last FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Level' AND FromTime NOT BETWEEN '23:54:00' AND '24:00:00'  ORDER BY id asc limit 1";

        $fueladd = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='Fuel_Filled' ";

        $dataConsumefirst = $this->db->query($fuelfirst)->result();
        $dataConsumelast = $this->db->query($fuellast)->result();
        $datafueladd = $this->db->query($fueladd)->result();
        $fuelconsume=abs((abs($dataConsumefirst[0]->first-$dataConsumelast[0]->last))-$datafueladd[0]->fueladd);
        //echo $fuelconsume;
        //echo $dataConsumefirst[0]->first."--".$dataConsumelast[0]->last;die();
        //last week     

        $fueladd1 = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate." AND UtilityName='Fuel_Filled'";

        $dataConsumefirst1 = $this->db->query($fuelfirst1)->result();
        $dataConsumelast1 = $this->db->query($fuellast1)->result();
        $datafueladd1 = $this->db->query($fueladd1)->result();
        $fuelconsume1=abs((abs($dataConsumefirst1[0]->first-$dataConsumelast1[0]->last))-$datafueladd1[0]->fueladd);        
        //yesterday

        $fueladd2 = "SELECT SUM(Consumption)  as fueladd FROM app_device_station_consumtion where LocationName=".$meter." AND TxnDate=".$yesterDay." AND UtilityName='Fuel_Filled' ";

        $dataConsumefirst2 = $this->db->query($fuelfirst2)->result();
        $dataConsumelast2 = $this->db->query($fuellast2)->result();
        $datafueladd2 = $this->db->query($fueladd2)->result();
        
        $fuelconsume2=abs((abs($dataConsumefirst2[0]->first-$dataConsumelast2[0]->last))-$datafueladd2[0]->fueladd);
        return $fuelconsume.",".$fuelconsume2.",".$fuelconsume1;
        }    


        
    }
    function getDashBoilerHighConsumed($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT CONCAT(TxnDate,' ',FromTime) AS [DateTime],(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate=".$date;
    	$data = $this->db->query($query)->result();
    	$current = 0;$time = "";
    	foreach ($data as  $value) {
    		if($current<$value->sub && $value->sub>0){
    			$current = $value->sub;
    			$time = $value->DateTime;
    		}
    	}
    	$result['today']['time'] = $time;
    	$result['today']['con'] = round($current);
    	//last week calculation

		$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT CONCAT(TxnDate,' ',FromTime) AS [DateTime],(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
    	$data1 = $this->db->query($query1)->result();
    	$current1 = 0;$time1 = "";
    	foreach ($data1 as  $value) {
    		if($current1<$value->sub  && $value->sub>0){
    			$current1 = $value->sub;
    			$time1 = $value->DateTime;
    		}
    	}
    	$result['lastweek']['time'] = $time1;
    	$result['lastweek']['con'] = round($current1);
    	//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
    	$data2 = $this->db->query($query2)->result();
    	$current2 = 0;$time2 = "";
    	foreach ($data2 as  $value) {
    		if($current2<$value->sub  && $value->sub>0){
    			$current2 = $value->sub;
    			$time2 = $value->DateTime;
    		}
    	}
    	$result['lastmonth']['time'] = $time2;
    	$result['lastmonth']['con'] = round($current2);
    	//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		$query3 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level' AND FromTime NOT BETWEEN '23:58:00' AND '24:00:00'  AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
    	$data3 = $this->db->query($query3)->result();
    	$current3 = 0;$time3 = "";
    	foreach ($data3 as  $value) {
    		if($current3<$value->sub  && $value->sub>0){
    			$current3 = $value->sub;
    			$time3 = $value->DateTime;
    		}
    	}
    	$result['thismonth']['time'] = $time3;
    	$result['thismonth']['con'] = round($current3);
    	return $result;	
    }
    function getDashBoilerLowConsumed($data){
    	// today calculation
    	
    	$meter = "'".$data['meter']."'";
    	$date = "'".$data['date']."'";
    	$query = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate=".$date;
    	$data = $this->db->query($query)->result();
    	$current = 20;$time = "";
    	foreach ($data as  $value) {
    		if($current>$value->sub && $value->sub>0){
    			$current = $value->sub;
    			$time = $value->DateTime;
    		}
    	}
    	$result['today']['time'] = $time;
    	$result['today']['con'] = round($current);
    	$previous_week = strtotime("-1 week +1 day");
		$start_week = strtotime("last sunday midnight",$previous_week);
		$end_week = strtotime("next saturday",$start_week);
		$start_week = date("Y-m-d",$start_week);
		$end_week = date("Y-m-d",$end_week);
		$startweekdate = "'".$start_week."'";
		$endweekdate = "'".$end_week."'";
		$query1 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$startweekdate." AND ".$endweekdate;
    	$data1 = $this->db->query($query1)->result();
    	$current1 = 20;$time1 = "";
    	foreach ($data1 as  $value) {
    		if($current1>$value->sub && $value->sub>0){
    			$current1 = $value->sub;
    			$time1 = $value->DateTime;
    		}
    	}
    	$result['lastweek']['time'] = $time1;
    	$result['lastweek']['con'] = round($current1);
    	//last month
		$current_month=date('m');
		$current_year=date('Y');
		$lastmonth = $current_month-1;
		$firstdate = $current_year."-".$lastmonth."-01";
		$lastdateofmonth = date('t',$lastmonth);
		$lastdate = $current_year."-".$lastmonth."-".$lastdateofmonth;
		$firstdate = "'".$firstdate."'";
		$lastdate = "'".$lastdate."'";
		$query2 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$firstdate." AND ".$lastdate;
    	$data2 = $this->db->query($query2)->result();
    	$current2 = 20;$time2 = "";
    	foreach ($data2 as  $value) {
    		if($current2>$value->sub && $value->sub>0){
    			$current2 = $value->sub;
    			$time2 = $value->DateTime;
    		}
    	}
    	$result['lastmonth']['time'] = $time2;
    	$result['lastmonth']['con'] = round($current2);
    	//this month till date
		$first_day_this_month = date('Y-m-01');
		$first_day_this_month = "'".$first_day_this_month."'";
		$yesterDay = date('Y-m-d',strtotime("-1 days"));
		$yesterDay = "'".$yesterDay."'";
		$query3 = "SELECT CONCAT(TxnDate,' ',FromTime) AS DateTime,(PrvReading-CurReading) AS sub FROM app_device_station_consumtion WHERE LocationName=".$meter." AND UtilityName= 'Fuel_Level'  AND TxnDate BETWEEN ".$first_day_this_month." AND ".$yesterDay;
    	$data3 = $this->db->query($query3)->result();
    	$current3 = 20;$time3 = "";
    	foreach ($data3 as  $value) {
    		if($current3>$value->sub && $value->sub>0){
    			$current3 = $value->sub;
    			$time3 = $value->DateTime;
    		}
    	}
    	$result['thismonth']['time'] = $time3;
    	$result['thismonth']['con'] = round($current3);
    	return $result;
    }
}