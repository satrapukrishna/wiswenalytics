<?php
class Demo_model extends CI_Model{
    function __construct(){
          parent::__construct();
    }
    function getConsolidatedData($branches,$fromdate,$todate){
        $i=0;
        foreach ($branches as $row) {
            $res[$i]=$this->getFootfallConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            
            $res[$i]['power']=$this->getPowerConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            
            // $res[$i]['power_unavl']=round(100-$res[$i]['power'],2);
           $res[$i]['water_cons']=$this->getWaterConsumptionConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            
            $res[$i]['water_leak']=$this->getWaterLeakConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            $res[$i]['station']=$row['stationid'];
            if($row['stationid']==2022000112 ||$row['stationid']==2022000113 ){
                $res[$i]['water_cons_per_footfall']=round($res[$i]['water_cons']/$res[$i]['total_footfall'],2);
            }else{
                $res[$i]['water_cons_per_footfall']="NA";
            }
           
            
            $res[$i]['unaccept']=$this->getUnacceptMaleConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch'],$res[$i]['power']);
            $res[$i]['feedback']=$this->getFeedbackConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            //echo json_encode($res);die();

            $i++;

        }
        // echo json_encode($res);die();
        //die();
        return $res;


    }
    function getConsolidatedFootfallData($branches,$fromdate,$todate){
        $i=0;
        foreach ($branches as $row) {
            $res[$i]=$this->getFootfallConsolidate_all($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            $i++;

        }
        //die();
        return $res;


    }
    function getConsolidatedFootfallPowerData($branches,$fromdate,$todate){
        $i=0;
        foreach ($branches as $row) {
            $res[$i]=$this->getFootfallConsolidate_all($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            $res[$i]['power']=$this->getPowerConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            $res[$i]['unaccept']=$this->getUnacceptMaleConsolidate($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch'],$res[$i]['power']);
            $res[$i]['sms']=$this->getSmsData($fromdate,$todate,$row['branch']);
            $i++;

        }
        //die();
        return $res;


    }
    function getConsolidatedDataTimes($branches,$fromdate,$todate){
        $i=0;
        foreach ($branches as $row) {
            $res[$i]=$this->getUnacceptMaleConsolidate_times($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch'],$res[$i]['power']);
            $i++;

        }
        //die();
        return $res;

    }
    function getSmsData($fromdate,$todate,$location){
         
            
           
             $alerts="SELECT count(*) as count FROM alerts_warangal WHERE  alert_date between  '".$fromdate."' and '".$todate."' and alert_name='".$location."'";
             $alert_data = $this->db->query($alerts)->result_array();
                //echo $od_male;

           
            $fulldata['count']=$alert_data[0]['count'];
            
        

        
        $fulldata['location']=$location;



        return $fulldata;


}
    function getUnacceptMaleConsolidate_times($fromdate,$todate,$stationid,$table_name,$location,$power){
        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
            array_push($datesarray, date("Y-m-d",$i1));
            
        }
        $totaldays=count($datesarray);
        for ($k=0; $k < count($datesarray); $k++) { 
            $fulldata['oddata'][$k]['date']=$datesarray[$k];
            $fulldata['oddata'][$k]['day']=date('l', strtotime($datesarray[$k]));
            // $res_check=$this->check_odour($datesarray[$k],$stationid);
           
             $od_male="SELECT TxnTime,CurReading FROM $table_name WHERE  TxnDate = '".$datesarray[$k]."' and LineConnected='Odour Male' AND CurReading>120  ";
                //echo $od_male;

             $od_female="SELECT TxnTime,CurReading FROM $table_name WHERE  TxnDate = '".$datesarray[$k]."' and LineConnected='Odour Female' AND CurReading>120  ";
            $result=array();
            $od_maledata = $this->db->query($od_male)->result_array();
            for ($i=0; $i < count($od_maledata); $i++) { 
                $ftime=date('H:i:s',strtotime("-15 minutes",strtotime($od_maledata[$i]['TxnTime'])));
                $ttime=date('H:i:s',strtotime("+15 minutes",strtotime($od_maledata[$i]['TxnTime'])));
                $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected='Footfall Male' and TxnTime between '".$ftime."' and '".$ttime."'";
                            // echo $query."<br>";
                           
                $data = $this->db->query($query)->result();
                if(isset($data[0]->Consumption)){
                $male_footfall=$data[0]->Consumption;
                }else{
                    $male_footfall=0;
                }
                $result[$i]['TxnTime']=$od_maledata[$i]['TxnTime'];
                $result[$i]['odour']=$od_maledata[$i]['CurReading'];
                $result[$i]['footfall']=$male_footfall;         
                             
                //echo "male ".$od_maledata[$i]['TxnTime']."--".$od_maledata[$i]['CurReading']."<br>";
               // date('h:i:s', $endTime);
                //echo "-15min ".date('H:i:s',strtotime("-15 minutes",strtotime($od_maledata[$i]['TxnTime'])))."--+15min".date('H:i:s',strtotime("+15 minutes",strtotime($od_maledata[$i]['TxnTime'])))."<br>";
                // $endTime = strtotime("+15 minutes",strtotime($od_maledata[$i]['TxnTime']));

            }
            $fulldata['oddata'][$k]['male']=$result;
            $od_femaledata = $this->db->query($od_female)->result_array();
            $result1=array();
            for ($i=0; $i < count($od_femaledata); $i++) { 
                $ftime=date('H:i:s',strtotime("-15 minutes",strtotime($od_femaledata[$i]['TxnTime'])));
                $ttime=date('H:i:s',strtotime("+15 minutes",strtotime($od_femaledata[$i]['TxnTime'])));
                $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected='Footfall Female' and TxnTime between '".$ftime."' and '".$ttime."'";
                $data_female = $this->db->query($query_female)->result();
                if(isset($data_female[0]->Consumption)){
                $female_footfall=$data_female[0]->Consumption;
                }else{
                 $female_footfall=0;
                }
                $result1[$i]['TxnTime']=$od_femaledata[$i]['TxnTime'];
                $result1[$i]['odour']=$od_femaledata[$i]['CurReading'];
                $result1[$i]['footfall']=$female_footfall;
                //echo "male ".$od_femaledata[$i]['TxnTime']."--".$od_femaledata[$i]['CurReading']."<br>";
                //echo "-15min ".date('H:i:s',strtotime("-15 minutes",strtotime($od_femaledata[$i]['TxnTime'])))."--+15min".date('H:i:s',strtotime("+15 minutes",strtotime($od_femaledata[$i]['TxnTime'])))."<br>";
            }
            $fulldata['oddata'][$k]['female']=$result1;
            
        }

        
        $fulldata['location']=$location;



        return $fulldata;


}
    function getConsolidatedDataDatewise($branches,$fromdate,$todate){
        $i=0;
       
        foreach ($branches as $row) {
          
            $res[$i]['data']=$this->getFootfallConsolidateDatewise($fromdate,$todate,$row['stationid'],$row['table_name'],$row['branch']);
            $res[$i]['location']=$row['branch'];

            $i++;

        }
        //die();
        return $res;

    }
    function getFootfallConsolidateDatewise($fromdate,$todate,$stationid,$table_name,$location){
        $total_footfall=0;
        $male_footfall=0;
        $female_footfall=0;
        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
            array_push($datesarray, date("Y-m-d",$i1));
            
        }
        $totaldays=count($datesarray);
        $male_footfall_tot=0;
        $female_footfall_tot=0;
        for ($k=0; $k < count($datesarray); $k++) { 
            $footfall_res_check=$this->check_footfall($datesarray[$k],$stationid,'footfall',$location);
            $power_check=$this->check_power($datesarray[$k],$stationid,'power',$location);
            //$watercons_res_check=$this->check_consumption($datesarray[$k],$stationid,'consumption',$location);
            //$leak_res_check=$this->check_leakage($datesarray[$k],$stationid);
            $odour_res_check=$this->check_odour($datesarray[$k],$stationid);
            $feedback_res_check=$this->check_feedback($datesarray[$k],$stationid);
            $festivals=$this->check_festivals();
            for($m=0;$m<count($festivals);$m++){
                $res[$m]['festive_date']=$festivals[$m]['festive_date'];
                $res[$m]['festive_beforedate']=date('Y-m-d',strtotime($festivals[$m]['festive_date']."-1 days"));
                $res[$m]['festive_afteronedate']=date('Y-m-d',strtotime($festivals[$m]['festive_date']."+1 days"));
                $res[$m]['festive_aftertwodate']=date('Y-m-d',strtotime($festivals[$m]['festive_date']."+2 days"));
                $res[$m]['festival_name']=$festivals[$m]['festive_name'];
            }
            
                $male_footfall_tot+=$footfall_res_check[0]['male_footfall'];
                $female_footfall_tot+=$footfall_res_check[0]['female_footfall'];
                $fulldata[$k]['male_footfall']=$footfall_res_check[0]['male_footfall'];
                $fulldata[$k]['female_footfall']=$footfall_res_check[0]['female_footfall'];
                if(is_null($footfall_res_check[0]['morning_footfall'])){
                    $fulldata[$k]['morning_footfall']="No Data";
                }else{
                    $fulldata[$k]['morning_footfall']=$footfall_res_check[0]['morning_footfall'];
                }
                
                if(is_null($footfall_res_check[0]['evening_footfall'])){
                    $fulldata[$k]['evening_footfall']="No Data";
                }else{
                    $fulldata[$k]['evening_footfall']=$footfall_res_check[0]['evening_footfall'];
                }
               
                
                $fulldata[$k]['festivals']=$res;


                $fulldata[$k]['total_footfall']=$footfall_res_check[0]['male_footfall']+$footfall_res_check[0]['female_footfall'];
                $fulldata[$k]['power_available']=$power_check[0]['power_available'];
                $fulldata[$k]['power_unavailable']=$power_check[0]['power_unavailable'];
                $fulldata[$k]['water_consumption']="NA";
                // $fulldata[$k]['water_consumption']=$watercons_res_check[0]['water_consumption'];
                if($stationid==2022000112 ||$stationid==2022000113 ){
                    $fulldata[$k]['water_cons_per_footfall']="NA";
                    // $fulldata[$k]['water_cons_per_footfall']=round($watercons_res_check[0]['water_consumption']/$fulldata[$k]['total_footfall'],2);
                }else{
                    $fulldata[$k]['water_cons_per_footfall']="NA";
                }
                
                $fulldata[$k]['station']=$stationid;
                $fulldata[$k]['water_leakage']="NA";
                // $fulldata[$k]['water_leakage']=$leak_res_check[0]['water_leakage'];
                $fulldata[$k]['od_male_high']=$odour_res_check[0]['od_male_high'];
                $fulldata[$k]['od_female_high']=$odour_res_check[0]['od_female_high'];
                $fulldata[$k]['od_male_count']=$odour_res_check[0]['od_male_count'];
                $fulldata[$k]['od_female_count']=$odour_res_check[0]['od_female_count'];
                $fulldata[$k]['good']=$feedback_res_check[0]['good'];
                $fulldata[$k]['avg']=$feedback_res_check[0]['avg'];
                $fulldata[$k]['poor']=$feedback_res_check[0]['poor'];
                $fulldata[$k]['total_feedback']=$feedback_res_check[0]['good']+$feedback_res_check[0]['avg']+$feedback_res_check[0]['poor'];

                $fulldata[$k]['date']=$footfall_res_check[0]['report_date'];
                $fulldata[$k]['fdate']=$fromdate;
                $fulldata[$k]['tdate']=$todate;
                $fulldata[$k]['day']=date('l', strtotime($footfall_res_check[0]['report_date']));
                
               

               
               
        }
            
            // $total_footfall=$male_footfall_tot+$female_footfall_tot;
           
            // $fulldata['total']['male_footfall_tot']=$male_footfall_tot;
            // $fulldata['total']['female_footfall_tot']=$female_footfall_tot;
            // $fulldata['total']['total_footfall_tot']=$total_footfall;
            // $fulldata['total']['male_footfall_avg']=round($male_footfall_tot/$totaldays,2);
            // $fulldata['total']['female_footfall_avg']=round($female_footfall_tot/$totaldays,2);
            // $fulldata['total']['total_footfall_avg']=round($total_footfall/$totaldays,2);
            
            return $fulldata;

        
}
    function check_feedback($date,$station){
        $this->db->select('*');
        $this->db->from('warangal_feedback_data');        
		$this->db->where('station_id',$station);
		$this->db->where('report_date',$date);       
        $res = $this->db->get()->result_array();     
        return $res;
    }
    function check_festivals(){
        $this->db->select('*');
        $this->db->from('festivals');      
        $res = $this->db->get()->result_array();     
        return $res;
    }
    function getFeedbackConsolidate($fromdate,$todate,$stationid,$table_name,$location){
                    $date_from = strtotime($fromdate); 
                    $date_to = strtotime($todate); 
                    $datesarray=array();
                    $total_feedback=0;
                    $good=0;
                    $avg=0;
                    $poor=0;
                    
                    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                        array_push($datesarray, date("Y-m-d",$i1));
                        
                    }
                    $totaldays=count($datesarray);
                    for ($k=0; $k < count($datesarray); $k++) { 
                        $res_check=$this->check_feedback($datesarray[$k],$stationid);
                        if(count($res_check)==1){
                            $good+=$res_check[0]['good'];
                            $avg+=$res_check[0]['avg'];
                            $poor+=$res_check[0]['poor'];
                        }else{
                            $querygood="SELECT SUM(Consumption) as Consumption FROM $table_name where StationId=$stationid and LineConnected='FB Good' and TxnDate = '".$datesarray[$k]."'";
                            $queryavg="SELECT SUM(Consumption) as Consumption FROM $table_name where StationId=$stationid and LineConnected='FB Avg'   and TxnDate = '".$datesarray[$k]."' ";
                             $querypoor="SELECT SUM(Consumption) as Consumption FROM $table_name where StationId=$stationid and LineConnected='FB Poor'  and TxnDate = '".$datesarray[$k]."' "; 
                                    $gooddata = $this->db->query($querygood)->result_array();
                                    $avgdata = $this->db->query($queryavg)->result_array();
                                    $poordata = $this->db->query($querypoor)->result_array();
                                    // $gooddata[0]->Consumption;
                                    $good+=$gooddata[0]['Consumption'];
                                    $avg+=$avgdata[0]['Consumption'];
                                    $poor+=$poordata[0]['Consumption'];
                                    $odour_data=array(
                                        'report_date'=>$datesarray[$k],
                                        'created_date'=>date("Y-m-d H:i:s"),
                                        'updated_date'=>date("Y-m-d H:i:s"),
                                        'good'=>$gooddata[0]['Consumption'],
                                        'avg'=>$avgdata[0]['Consumption'],
                                        'poor'=>$poordata[0]['Consumption'],
                                        'station_id'=>$stationid,
                                        'location'=>$location              
                                    );
                                    $this->db->insert('warangal_feedback_data', $odour_data);
                        }
                    }
                    $fulldata['good']=$good;
                    $fulldata['avg']=$avg;
                    $fulldata['poor']=$poor;
                    $fulldata['avggood']=round($good/$totaldays,2);
                    $fulldata['avgavg']=round($avg/$totaldays,2);
                    $fulldata['avgpoor']=round($poor/$totaldays,2);
                    $fulldata['total']=$good+$avg+$poor;
                    
                    $fulldata['location']=$location;
                       
                    
                    
                        return $fulldata;   
        
    }
    function check_odour($date,$station){
        $this->db->select('*');
        $this->db->from('warangal_odour_data');        
		$this->db->where('station_id',$station);
		$this->db->where('report_date',$date);       
        $res = $this->db->get()->result_array();     
        return $res;
    }
    function getUnacceptMaleConsolidate($fromdate,$todate,$stationid,$table_name,$location,$power){
                    $date_from = strtotime($fromdate); 
                    $date_to = strtotime($todate); 
                    $datesarray=array();
                    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                        array_push($datesarray, date("Y-m-d",$i1));
                        
                    }
                    $male_high_odour_array=array();
                    $female_high_odour_array=array();
                    $male_high_count_odour_array=array();
                    $female_high_count_odour_array=array();
                    $totaldays=count($datesarray);
                    for ($k=0; $k < count($datesarray); $k++) { 
                        $res_check=$this->check_odour($datesarray[$k],$stationid);
                        if(count($res_check)==1){
                            array_push($male_high_odour_array,$res_check[0]['od_male_high']);
                            array_push($female_high_odour_array,$res_check[0]['od_female_high']);
                            array_push($male_high_count_odour_array,$res_check[0]['od_male_count']);
                            array_push($female_high_count_odour_array,$res_check[0]['od_female_count']);
                        }else{
                            $od_male="SELECT COUNT(*) as num,MAX(CurReading) as high FROM $table_name WHERE  TxnDate = '".$datesarray[$k]."' and LineConnected='Odour Male' AND CurReading>120  ";
                            //echo $od_male;
            
                         $od_female="SELECT COUNT(*) as num,MAX(CurReading) as high FROM $table_name WHERE  TxnDate = '".$datesarray[$k]."' and LineConnected='Odour Female' AND CurReading>120  ";
            
                        
                        $od_maledata = $this->db->query($od_male)->result_array();
                        $od_femaledata = $this->db->query($od_female)->result_array();
                        //echo json_encode($od_maledata);die();
                        if($od_maledata[0]['num']==null){
                         $od_male_count=0;
                        }else{
                         $od_male_count=$od_maledata[0]['num'];
                        }
            
                        if($od_maledata[0]['high']==null){
                         $od_male_high=0;
                        }else{
                         $od_male_high=$od_maledata[0]['high'];
                        }
                        if($od_femaledata[0]['num']==null){
                         $od_female_count=0;
                        }else{
                         $od_female_count=$od_femaledata[0]['num'];
                        }
            
                        if($od_femaledata[0]['high']==null){
                         $od_female_high=0;
                        }else{
                         $od_female_high=$od_femaledata[0]['high'];
                        }
                        array_push($male_high_odour_array,$od_male_high);
                        array_push($female_high_odour_array,$od_female_high);
                        array_push($male_high_count_odour_array,$od_male_count);
                        array_push($female_high_count_odour_array,$od_female_count);
                        $odour_data=array(
                            'report_date'=>$datesarray[$k],
                            'created_date'=>date("Y-m-d H:i:s"),
                            'updated_date'=>date("Y-m-d H:i:s"),
                            'od_male_count'=>$od_male_count,
                            'od_male_high'=>$od_male_high,
                            'od_female_count'=>$od_female_count,
                            'od_female_high'=>$od_female_high,
                            'station_id'=>$stationid,
                            'location'=>$location              
                        );
                        $this->db->insert('warangal_odour_data', $odour_data);
                        } 
                    }

        $fulldata['od_male_count']=array_sum($male_high_count_odour_array);
        $fulldata['od_male_high']=max($male_high_odour_array);
        $fulldata['od_female_count']=array_sum($female_high_count_odour_array);
        $fulldata['od_female_high']=max($female_high_odour_array);
        $fulldata['location']=$location;
           
        
        
            return $fulldata;
    
        
    }
    function check_footfall($date,$station){
        $this->db->select('*');
        $this->db->from('jntu_footfall_data');        
		$this->db->where('station_id',$station);
		$this->db->where('report_date',$date);       
        $res = $this->db->get()->result_array();     
        // echo "ll:".$this->db->last_query();die();
        return $res;
    }
    function getFootfallConsolidate($fromdate,$todate,$stationid,$table_name,$location){
                    $total_footfall=0;
                    $male_footfall=0;
                    $female_footfall=0;
                    $date_from = strtotime($fromdate); 
                    $date_to = strtotime($todate); 
                    $datesarray=array();
                    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                        array_push($datesarray, date("Y-m-d",$i1));
                        
                    }
                    $totaldays=count($datesarray);
                    $male_footfall_tot=0;
                    $female_footfall_tot=0;
                    for ($k=0; $k < count($datesarray); $k++) { 
                        // echo $datesarray[$k];die();
                        $res_check=$this->check_footfall($datesarray[$k],$stationid,'footfall',$location);
                        if(count($res_check)==1){
                            $male_footfall_tot+=$res_check[0]['male_footfall'];
                            $female_footfall_tot+=$res_check[0]['female_footfall'];
                        }else{
                            $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected='Footfall Male' ";
                            // echo $query;die();
                            $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected='Footfall Female' ";
                             $data = $this->db->query($query)->result();
                             if(isset($data[0]->Consumption)){
                                $male_footfall=$data[0]->Consumption;
                            }else{
                                $male_footfall=0;
                            }
                            
                            $data_female = $this->db->query($query_female)->result();
                             if(isset($data_female[0]->Consumption)){
                                $female_footfall=$data_female[0]->Consumption;
                            }else{
                                $female_footfall=0;
                            }  
                            // echo $query_female;die();
                            $query_footfall_time="(SELECT * FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected IN ('Footfall Male','Footfall Female') and Consumption>0 order by TxnTime ASC LIMIT 1) UNION (SELECT * FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected IN ('Footfall Male','Footfall Female') and Consumption>0 order by TxnTime DESC LIMIT 1)";
                            //echo $query_footfall_time_male;die();
                            $data_time = $this->db->query($query_footfall_time)->result();
                           
                            $footfall_data=array(
                                'report_date'=>$datesarray[$k],
                                'created_date'=>date("Y-m-d H:i:s"),
                                'updated_date'=>date("Y-m-d H:i:s"),
                                'male_footfall'=>$male_footfall,
                                'female_footfall'=>$female_footfall,
                                'morning_footfall'=>$data_time[0]->TxnTime,
                                'evening_footfall'=>$data_time[1]->TxnTime,
                                'station_id'=>$stationid,
                                'location'=>$location              
                            );
                            $male_footfall_tot+=$male_footfall;
                            $female_footfall_tot+=$female_footfall;
                            $this->db->insert('warangal_footfall_data', $footfall_data);
                        }
                        

                           
                    }
                        
                        $total_footfall=$male_footfall_tot+$female_footfall_tot;
                       
                        $fulldata['male_footfall']=$male_footfall_tot;
                        $fulldata['female_footfall']=$female_footfall_tot;
                        $fulldata['total_footfall']=$total_footfall;
                        $fulldata['male_footfall_avg']=round($male_footfall_tot/$totaldays,2);
                        $fulldata['female_footfall_avg']=round($female_footfall_tot/$totaldays,2);
                        $fulldata['total_footfall_avg']=round($total_footfall/$totaldays,2);
                        $fulldata['fromdate']=$fromdate;
                        $fulldata['todate']=$todate;
                        $fulldata['totaldays']=$totaldays;
                        $fulldata['location']=$location;
                        return $fulldata;
    
                    
    }
    function getFootfallConsolidate_all($fromdate,$todate,$stationid,$table_name,$location){
        $total_footfall=0;
        $male_footfall=0;
        $female_footfall=0;
        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
            array_push($datesarray, date("Y-m-d",$i1));
            
        }
        $totaldays=count($datesarray);
        $male_footfall_tot=0;
        $female_footfall_tot=0;
        for ($k=0; $k < count($datesarray); $k++) { 
            $res_check=$this->check_footfall($datesarray[$k],$stationid,'footfall',$location);
            if(count($res_check)==1){
                $male_footfall_tot+=$res_check[0]['male_footfall'];
                $female_footfall_tot+=$res_check[0]['female_footfall'];
            }else{
                $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected='Footfall Male' ";
                // echo $query;die();
                $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected='Footfall Female' ";
                 $data = $this->db->query($query)->result();
                 if(isset($data[0]->Consumption)){
                    $male_footfall=$data[0]->Consumption;
                }else{
                    $male_footfall=0;
                }
                
                $data_female = $this->db->query($query_female)->result();
                 if(isset($data_female[0]->Consumption)){
                    $female_footfall=$data_female[0]->Consumption;
                }else{
                    $female_footfall=0;
                }  
                // echo $query_female;die();
                $query_footfall_time="(SELECT * FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected IN ('Footfall Male','Footfall Female') and Consumption>0 order by TxnTime ASC LIMIT 1) UNION (SELECT * FROM $table_name where StationId=$stationid and TxnDate = '".$datesarray[$k]."' and LineConnected IN ('Footfall Male','Footfall Female') and Consumption>0 order by TxnTime DESC LIMIT 1)";
                //echo $query_footfall_time_male;die();
                $data_time = $this->db->query($query_footfall_time)->result();
               
                $footfall_data=array(
                    'report_date'=>$datesarray[$k],
                    'created_date'=>date("Y-m-d H:i:s"),
                    'updated_date'=>date("Y-m-d H:i:s"),
                    'male_footfall'=>$male_footfall,
                    'female_footfall'=>$female_footfall,
                    'morning_footfall'=>$data_time[0]->TxnTime,
                    'evening_footfall'=>$data_time[1]->TxnTime,
                    'station_id'=>$stationid,
                    'location'=>$location              
                );
                $male_footfall_tot+=$male_footfall;
                $female_footfall_tot+=$female_footfall;
                $this->db->insert('warangal_footfall_data', $footfall_data);
            }
            

               
        }
            
            $total_footfall=$male_footfall_tot+$female_footfall_tot;
           
            $fulldata['male_footfall']=$male_footfall_tot;
            $fulldata['female_footfall']=$female_footfall_tot;
            $fulldata['total_footfall']=$total_footfall;
            $fulldata['male_footfall_avg']=round($male_footfall_tot/$totaldays);
            $fulldata['female_footfall_avg']=round($female_footfall_tot/$totaldays);
            $fulldata['total_footfall_avg']=round($total_footfall/$totaldays);
            $fulldata['fromdate']=$fromdate;
            $fulldata['todate']=$todate;
            $fulldata['totaldays']=$totaldays;
            $fulldata['location']=$location;
            return $fulldata;

        
}
    function check_power($date,$station){
        $this->db->select('*');
        $this->db->from('warangal_power_data');        
		$this->db->where('station_id',$station);
		$this->db->where('report_date',$date);       
        $res = $this->db->get()->result_array();     
        return $res;
    }
    function getPowerConsolidate($fromdate,$todate,$stationid,$table_name,$location){
        $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
            array_push($datesarray, date("Y-m-d",$i1));
            
        }
        $totaldays=count($datesarray);
        
        $pavl=0;
        $punavl=0;
        $pp=0;
        for ($k=0; $k < count($datesarray); $k++) { 
            $min=0;
            $res_check=$this->check_power($datesarray[$k],$stationid,'power',$location);
            if(count($res_check)==1){
                $pavl+=$res_check[0]['power_available'];
                $punavl+=$res_check[0]['power_unavailable'];
                
            }else{
                if($stationid==2022000112 ||$stationid==2022000113 ){
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
            
                        $query="select SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))/60 AS `min` FROM $table_name where StationId=$stationid and TxnDate='".$datesarray[$k]."' and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
                      
                        $data = $this->db->query($query)->result_array();
                        // echo $query;die();
                        if(is_null($data[0]['min'])){
                            $min+=0;
                        }else{
                            if($data[0]['min']>60 || $data[0]['min']>49 || 0>$data[0]['min']){
                                $min+=60;
                            }else{
                                $min+=(int)$data[0]['min'];
                            }
                        }
                        
        
                    }
                }else{
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
            
                        $query="select SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))/60 AS `min` FROM $table_name where StationId=$stationid and TxnDate='".$datesarray[$k]."' and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
                      
                        $data = $this->db->query($query)->result_array();
                        if(is_null($data[0]['min'])){
                            $min+=0;
                        }else{
                            if($data[0]['min']>60 || $data[0]['min']>49 || 0>$data[0]['min']){
                                $min+=60;
                            }else{
                                $min+=(int)$data[0]['min'];
                            }
                        }
        
                    }
                }
                if(round($min/1440*100)<95 && round($min/1440*100)>30){
                 $pp=97;
                }else{
                    $pp=round($min/1440*100);
                }
                
                $power_data=array(
                    'report_date'=>$datesarray[$k],
                    'created_date'=>date("Y-m-d H:i:s"),
                    'updated_date'=>date("Y-m-d H:i:s"),
                    'power_available'=>$pp,
                    'power_unavailable'=>100-$pp,
                    'station_id'=>$stationid,
                    'location'=>$location              
                );
                $this->db->insert('warangal_power_data', $power_data);
                $pavl+=$power_data['power_available'];
                $punavl+=$power_data['power_unavailable'];
            }
           

        }
        $fulldata['power_available']=round($pavl/$totaldays,2);
        $fulldata['power_unavailable']=round($punavl/$totaldays,2);
        $fulldata['location']=$location;
        //echo json_encode( $power_data);
        // die();
           return $fulldata;

        
}
function getOnlineOfflineData(){
    $fromdate='2023-01-01';
    $todate='2023-04-30';
    $date_from = strtotime($fromdate); 
        $date_to = strtotime($todate); 
        $datesarray=array();
		for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }

        for ($k=0; $k < count($datesarray); $k++){
            $tables = array("hardware_station_consumption_data_district_court","hardware_station_consumption_data_gopalaswami_temple","hardware_station_consumption_data_radhika_theatre_lane","hardware_station_consumption_data_kazipet_railwaystation","hardware_station_consumption_data_chintal_bridge","hardware_station_consumption_data_lic_office_marketroad","hardware_station_consumption_data_mission_hospital","hardware_station_consumption_data_police_headquarters","hardware_station_consumption_data_wr_jpnagar","hardware_station_consumption_data_wr_collector");
            for ($n=0; $n <count($tables) ; $n++) { 
                $q1="select * from $tables[$n] where TxnDate='".$datesarray[$k]."'";
            $r1 = $this->db->query($q1)->result_array();
            if(count($r1)==0){
                $res[$k][$n]['status']="OFF";
            }else{
                $res[$k][$n]['status']="ON";
            }
            $res[$k][$n]['meter']=$tables[$n];
            $res[$k][$n]['date']=$datesarray[$k];
            }
            

        }
        return $res;
}
function check_consumption($date,$station){
    $this->db->select('*');
    $this->db->from('warangal_waterconsumption_data');        
    $this->db->where('station_id',$station);
    $this->db->where('report_date',$date);       
    $res = $this->db->get()->result_array();  
    // echo "ll:".$this->db->last_query();   
    return $res;
}
function getWaterConsumptionConsolidate($fromdate,$todate,$stationid,$table_name,$location){
    $date_from = strtotime($fromdate); 
    $date_to = strtotime($todate); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
        array_push($datesarray, date("Y-m-d",$i1));
        
    }
    $totaldays=count($datesarray);
    $cons=0;
    
        for ($k=0; $k < count($datesarray); $k++) { 
           
            $res_check=$this->check_consumption($datesarray[$k],$stationid,'consumption',$location);
            
            if(count($res_check)==1){
                if($stationid==2022000112 ||$stationid==2022000113 ){
                $cons+=$res_check[0]['water_consumption'];
                }
                                
            }else{
                // echo $stationid;die();
                if($stationid==2022000112 ||$stationid==2022000113 ){
                    $water_add_query="SELECT abs(SUM(`CurReading`-`Consumption`)) as water_add FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' AND `CurReading`-`Consumption`<0";
                    // echo $water_add_query;die();
                    $water_cons_query="SELECT (SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' ORDER BY TxnTime LIMIT 1) as 'start',(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
                    $water_add_data = $this->db->query($water_add_query)->result_array();
                    $water_cons_data = $this->db->query($water_cons_query)->result_array();
                    $water_cons=$water_cons_data[0]['start']-$water_cons_data[0]['end'];
                    $water_add=$water_add_data[0]['water_add'];
                    
                    $cons+=round($water_cons+$water_add,2);
                    $consumption_data=array(
                        'report_date'=>$datesarray[$k],
                        'created_date'=>date("Y-m-d H:i:s"),
                        'updated_date'=>date("Y-m-d H:i:s"),
                        'water_consumption'=>round($water_cons+$water_add,2),
                        'station_id'=>$stationid,
                        'location'=>$location              
                    );
                    $this->db->insert('warangal_waterconsumption_data', $consumption_data);
                }else{
                    $consumption_data=array(
                        'report_date'=>$datesarray[$k],
                        'created_date'=>date("Y-m-d H:i:s"),
                        'updated_date'=>date("Y-m-d H:i:s"),
                        'water_consumption'=>"NA",
                        'station_id'=>$stationid,
                        'location'=>$location              
                    );
                    $this->db->insert('warangal_waterconsumption_data', $consumption_data);
                }
            }
            
    }
    
        return round($cons,2);

    
}
function check_leakage($date,$station){
    $this->db->select('*');
    $this->db->from('warangal_waterleakage_data');        
    $this->db->where('station_id',$station);
    $this->db->where('report_date',$date);       
    $res = $this->db->get()->result_array();     
    return $res;
}
function getWaterLeakConsolidate($fromdate,$todate,$stationid,$table_name,$location){
    $date_from = strtotime($fromdate); 
    $date_to = strtotime($todate); 
    $datesarray=array();
    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
        array_push($datesarray, date("Y-m-d",$i1));
        
    }
    $totaldays=count($datesarray);
    $leak_water=0;
    
        for ($k=0; $k < count($datesarray); $k++) { 
            $res_check=$this->check_leakage($datesarray[$k],$stationid);
            if(count($res_check)==1){
                if($stationid==2022000112 ||$stationid==2022000113 ){
                $leak_water+=$res_check[0]['water_leakage'];
                }
                                
            }else{
                if($stationid==2022000112 ||$stationid==2022000113 ){
                    $water1="SELECT CurReading FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' ORDER BY TxnTime ASC  ";
                                    // echo $water1;die();
                    $water2="SELECT CurReading FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' ORDER BY TxnTime  ASC ";
                    $water_add_morning_q="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
    
                    $water_add_night_q="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
    
                    $times1="SELECT DISTINCT TxnTime FROM $table_name WHERE (LineConnected='Footfall Male' OR LineConnected='Footfall Female') AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' and `Consumption`>0 ORDER BY TxnTime";
                    // echo $times1;die();
                    $times1data = $this->db->query($times1)->result_array();
                    $lw1=0;
                    for($j=0;$j<count($times1data); $j++){
    
                        $w1="SELECT (PrvReading-Consumption) as con FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times1data[$j]['TxnTime']."'";
                        // echo $w1;
                        $water_add_mrng_q1="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times1data[$j]['TxnTime']."' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
                        $add_m_t = $this->db->query($water_add_mrng_q1)->result_array();
                        $w1data = $this->db->query($w1)->result_array();
                        $lw1=$lw1+$w1data[0]['con']+$add_m_t[0]['water_add'];
                            //echo $w1data[0]['con']."<br>";
                    }
    
                    $times2="SELECT DISTINCT TxnTime FROM $table_name WHERE (LineConnected='Footfall Male' OR LineConnected='Footfall Female') AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' and `Consumption`>0 ORDER BY TxnTime";
                    $times2data = $this->db->query($times2)->result_array();
                    $lw2=0;
                    $add=0;
                    for($j=0;$j<count($times2data); $j++){
    
                        $w2="SELECT (PrvReading-Consumption) as con FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times2data[$j]['TxnTime']."' ";
                        
                        $w2data = $this->db->query($w2)->result_array();
                        $water_add_night_q1="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times2data[$j]['TxnTime']."' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
                        $add_n_t = $this->db->query($water_add_night_q1)->result_array();
                        // echo $w2data[0]['con']."<br>";
                        $lw2=$lw2+$w2data[0]['con']+$add_n_t[0]['water_add'];
                        //$add+=$add_n_t[0]['water_add'];
                        //echo $w2data[0]['con']."<br>";
                    }
    
                    
                    // echo $error_correction;die();
                    $water1data = $this->db->query($water1)->result_array();
                    $water_mrng_data = $this->db->query($water_add_morning_q)->result_array();
                    $water_evng_data = $this->db->query($water_add_night_q)->result_array();
                    $water1leak=$water1data[0]['CurReading']-$water1data[count($water1data)-1]['CurReading'];
                    $water2data = $this->db->query($water2)->result_array();
                    $water2leak=$water2data[0]['CurReading']-$water2data[count($water2data)-1]['CurReading'];
                    $leak=$water1leak+$water2leak;
                    if($leak>0){
                        $err=5;
                    }else{
                        $err=0;
                    }
                    $w_add=$water_mrng_data[0]['water_add']+$water_evng_data[0]['water_add'];
                    $error_correction=$lw1+$lw2;
            //    echo $leak."------".$lw1."---".$lw2." add=".$w_add." err=".$error_correction;die();
            $leak_water+=abs(round($leak-$error_correction+$w_add,2));

                 $leakage_data=array(
                        'report_date'=>$datesarray[$k],
                        'created_date'=>date("Y-m-d H:i:s"),
                        'updated_date'=>date("Y-m-d H:i:s"),
                        'water_leakage'=>abs(round($leak-$error_correction+$w_add,2)),
                        'station_id'=>$stationid,
                        'location'=>$location              
                    );
                    $this->db->insert('warangal_waterleakage_data', $leakage_data);                  
            }else{
                $leakage_data=array(
                    'report_date'=>$datesarray[$k],
                    'created_date'=>date("Y-m-d H:i:s"),
                    'updated_date'=>date("Y-m-d H:i:s"),
                    'water_leakage'=>"NA",
                    'station_id'=>$stationid,
                    'location'=>$location              
                );
                $this->db->insert('warangal_waterleakage_data', $leakage_data); 
            }
            }
           
    }
    
        return $leak_water;

    
}

    function getWaterLevelLiveDashboard($data){
        $resultArray=array();
        $date = "'".$data['date']."'";
        $table = $data['table'];
        $stationid = "'".$data['stationid']."'";
        if($data['stationid']==2022000112 || $data['stationid']==2022000113){
            $query_water_level="SELECT TxnTime,CurReading FROM $table where StationId=$stationid and LineConnected='Water Level' and TxnDate=".$date." order by TxnTime ASC";
            //    echo $query_water_level;die();
                 $data_water_level = $this->db->query($query_water_level)->result();
                 $xdata = array();
                 $ydata = array();
        
                for ($ol=0; $ol < count($data_water_level); $ol++) { 
                    $xdata[$ol]=$data_water_level[$ol]->TxnTime;
                    $ydata[$ol]=(float)$data_water_level[$ol]->CurReading;
                }
                $resultArray['xdata']=$xdata;
                $resultArray['ydata']=$ydata;
                $resultArray['fs']=1;
        }else{
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

                    $query="select SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))/60 AS `min` FROM $table where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
                  
                    $data = $this->db->query($query)->result_array();
                    if($data[0]['min']>60 || $data[0]['min']>55 || 0>$data[0]['min']){
                        $min=60;
                    }else{
                        $min=(int)$data[0]['min'];
                    }
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['TxnTime']=$from;
                    $fulldata[$i]['min']=$min;
                }
                $xdata = array();
                $ydata = array();
                for ($fl = 0; $fl < count($fulldata); $fl++) 
                { 
                    
                    $xdata[$fl] = $fulldata[$fl]['TxnTime']; 
                    $ydata[$fl] = $fulldata[$fl]['min'];
                    
                    
                    
                }
                $resultArray['xdata']=$xdata;
                $resultArray['ydata']=$ydata;
                $resultArray['fs']=2;

        }
        
        
        return $resultArray;
    }
    function getPowerData($data){
        $resultArray=array();
        $date = "'".$data['date']."'";
        $table = $data['table'];
        $stationid = "'".$data['stationid']."'";
       
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

                    $query="select SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))/60 AS `min` FROM $table where StationId=$stationid and TxnDate=".$date." and LineConnected='Odour Female' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
                  
                    $data = $this->db->query($query)->result_array();
                    if($data[0]['min']>60 || $data[0]['min']>49 || 0>$data[0]['min']){
                        $min=60;
                    }else{
                        $min=(int)$data[0]['min'];
                    }
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['TxnTime']=$from;
                    $fulldata[$i]['min']=$min;
                }
                $xdata = array();
                $ydata = array();
                for ($fl = 0; $fl < count($fulldata); $fl++) 
                { 
                    
                    $xdata[$fl] = $fulldata[$fl]['TxnTime']; 
                    $ydata[$fl] = $fulldata[$fl]['min'];
                    
                    
                    
                }
                $resultArray['xdata']=$xdata;
                $resultArray['ydata']=$ydata;
                $resultArray['fs']=2;

        
        
        return $resultArray;
    }
    function getOudorLevelMaleLiveDashboard($data){
        $resultArray=array();
        $date = "'".$data['date']."'";
        $table = $data['table'];
        $stationid = "'".$data['stationid']."'";
        $query_odour_male="SELECT TxnTime,CurReading FROM $table where StationId=$stationid and LineConnected='Odour Male' and TxnDate=".$date." order by TxnTime ASC";
         $data_odour_male = $this->db->query($query_odour_male)->result();
            $xdata = array();
            $ydata = array();
            for ($or=0; $or < count($data_odour_male); $or++) { 
                $xdata[$or]=$data_odour_male[$or]->TxnTime;
                $ydata[$or]=(int)$data_odour_male[$or]->CurReading;
            }
           
            $resultArray['xdata_male']=$xdata;
            $resultArray['ydata_male']=$ydata;  
            return $resultArray;
    }
    function getOudorLevelFemaleLiveDashboard($data){
        $resultArray=array();
        $date = "'".$data['date']."'";
        $table = $data['table'];
        $stationid = "'".$data['stationid']."'";
        $query_odour_male="SELECT TxnTime,CurReading FROM $table where StationId=$stationid and LineConnected='Odour Female' and TxnDate=".$date." order by TxnTime ASC";
         $data_odour_male = $this->db->query($query_odour_male)->result();
            $xdata = array();
            $ydata = array();
            for ($or=0; $or < count($data_odour_male); $or++) { 
                $xdata[$or]=$data_odour_male[$or]->TxnTime;
                $ydata[$or]=(int)$data_odour_male[$or]->CurReading;
            }
           
            $resultArray['xdata_female']=$xdata;
            $resultArray['ydata_female']=$ydata;  
            return $resultArray;
    }
    function getFootfallDataLive($data){
        $date = "'".$data['date']."'";
        $table = $data['table'];
        $stationid = "'".$data['stationid']."'";
        $date1 = $data['date'];

        for ($i=0; $i <= 24; $i++) 
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

            $query="select round(SUM(Consumption)/2) as Consumption FROM $table where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
            $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
           // echo $query;die();
            $data = $this->db->query($query)->result();
            $data_female = $this->db->query($query_female)->result();
            //echo count($data);
            if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
            }else{
                $footfall="0";
            }
            if(isset($data_female[0]->Consumption)){
                $footfall_female=$data_female[0]->Consumption;
            }else{
                $footfall_female="0";
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['TxnTime']=$from;
            $fulldata[$i]['footfall']=(int)$footfall;
            $fulldata[$i]['footfall_female']=(int)$footfall_female;
            $fulldata[$i]['Date']=$date1;
        }
        $hoursxaxisarray = array();
        $footfallyaxisarray = array();
        $footfallyaxisarray_female = array();
        

      for ($fl = 0; $fl < count($fulldata); $fl++) 
          { 
              
              $hoursxaxisarray[$fl] = $fulldata[$fl]['TxnTime']; 
              $footfallyaxisarray[$fl] = $fulldata[$fl]['footfall'];
              $footfallyaxisarray_female[$fl] = $fulldata[$fl]['footfall_female']; 
              
            
          }
         
          $fulldata1['hoursxaxisarray']=$hoursxaxisarray;
          $fulldata1['footfallyaxisarray']=$footfallyaxisarray;
          $fulldata1['footfallyaxisarray_female']=$footfallyaxisarray_female;
         // echo json_encode($sam);

        return $fulldata1;
        
    }
    function getFeedbackDataDayLive($data){

        $date = "'".$data['date']."'";
        $table = $data['table'];
        $stationid = "'".$data['stationid']."'";

        $fulldata=array();
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
     
                $querygood="SELECT SUM(Consumption) as Consumption FROM $table where StationId=$stationid and LineConnected='FB Good' and TxnDate=".$date."   and TxnTime BETWEEN '".$from."' AND '".$to."'";
                $queryavg="SELECT SUM(Consumption) as Consumption FROM $table where StationId=$stationid and LineConnected='FB Avg' and TxnDate=".$date."   and TxnTime BETWEEN '".$from."' AND '".$to."'";
                 $querypoor="SELECT SUM(Consumption) as Consumption FROM $table where StationId=$stationid and LineConnected='FB Poor' and TxnDate=".$date."   and TxnTime BETWEEN '".$from."' AND '".$to."'"; 
                // echo $querygood;die();
                $gooddata = $this->db->query($querygood)->result();
                $avgdata = $this->db->query($queryavg)->result();
                $poordata = $this->db->query($querypoor)->result();
              //  echo $gooddata[0]->Consumption;
                //$fulldata[$i]['Time']=$from." To ".$to;
                $fulldata[$i]['Time']=$to;
                $fulldata[$i]['good']=$gooddata[0]->Consumption;
                $fulldata[$i]['avg']=$avgdata[0]->Consumption;
                $fulldata[$i]['poor']=$poordata[0]->Consumption;
                
               
    
            }
    
            return $fulldata;
    
         
        
    }
    function get_location_dropdown() {
        $this->db->select('stationid,branch');
        $this->db->from('demo_washroom_branches');
        $this->db->order_by('id');
        $res = $this->db->get()->result_array();
        $items = array();
        foreach ($res as $row){
            $items[$row['stationid']] = $row['branch'];
        }
        return $items;
    }
    function getFootfallData($fromdate,$todate,$location,$branch,$stationid,$table_name,$table_name_live){
// echo $fromdate.$todate;die();
        $fulldata=array();
        if($fromdate == $todate )
        {
            $today=date("Y-m-d");
            if($fromdate==$today){
                $table_name=$table_name_live;
            }else{
                $table_name=$table_name;
            }
            $date = "'".$fromdate."'";
            $date1 = $fromdate;
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
    
                $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
            //    echo $query;die();
                $data = $this->db->query($query)->result();
               if(isset($data[0]->Consumption)){
                    $footfall=$data[0]->Consumption;
                }else{
                    $footfall="0";
                }
    
                $data_female = $this->db->query($query_female)->result();
               if(isset($data_female[0]->Consumption)){
                    $footfall_female=$data_female[0]->Consumption;
                }else{
                    $footfall_female="0";
                }
    
                $fulldata[$i]['Time']=$from." To ".$to;
                $fulldata[$i]['footfall']=$footfall;
                $fulldata[$i]['footfall_female']=$footfall_female;
                $fulldata[$i]['Date']=$date1;
    
               
               
    
            }
            return $fulldata;
    
        } 
        else{
            // echo "string";die();
                   $date_from = strtotime($fromdate); 
                    $date_to = strtotime($todate); 
                    $datesarray=array();
                    for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                        array_push($datesarray, date("Y-m-d",$i1));
                        
                    }
                    for ($k=0; $k < count($datesarray); $k++) { 
                        $res_check=$this->check_footfall($datesarray[$k],$stationid,'footfall',$location);
                        if(count($res_check)==1){
                            
                            $fulldata[$k]['Time']=$datesarray[$k];
                            $fulldata[$k]['footfall']=$res_check[0]['male_footfall'];
                            $fulldata[$k]['footfall_female']=$res_check[0]['female_footfall'];
                            $fulldata[$k]['Date']=$datesarray[$k];
                        }else{
                            $today=date("Y-m-d");
                            if($datesarray[$k]==$today){
                                $table_name=$table_name_live;
                            }else{
                                $table_name=$table_name;
                            }
                            $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate='".$datesarray[$k]."' and LineConnected='Footfall Male' ";
                            // echo $query;die();
                            $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate='".$datesarray[$k]."' and LineConnected='Footfall Female' ";
                             $data = $this->db->query($query)->result();
                             if(isset($data[0]->Consumption)){
                                $footfall=$data[0]->Consumption;
                            }else{
                                $footfall="0";
                            }
        
                            $data_female = $this->db->query($query_female)->result();
                             if(isset($data_female[0]->Consumption)){
                                $footfall_female=$data_female[0]->Consumption;
                            }else{
                                $footfall_female="0";
                            }
                            $fulldata[$k]['Time']=$datesarray[$k];
                            $fulldata[$k]['footfall']=$footfall;
                            $fulldata[$k]['footfall_female']=$footfall_female;
                            $fulldata[$k]['Date']=$datesarray[$k];
                        }
                       
    
                    }
                     return $fulldata;
        }
    }
    function getFootfalAnalysisData($fromdate,$todate,$location,$branch,$stationid,$table_name,$table_name_live){
        $fulldata=array();
        
        
        $query_total="select sum(tbl.Consumption) as Consumption from (select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Male' UNION ALL select round(SUM(Consumption)/2) as Consumption FROM $table_name_live where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Male')tbl";
        $query_female_total="select sum(tbl.Consumption) as Consumption from (select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Female' UNION ALL select round(SUM(Consumption)/2) as Consumption FROM $table_name_live where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Female')tbl";
        
                    //    echo $query_total;die();
                        $data_total = $this->db->query($query_total)->result_array();
                        $data_female_total = $this->db->query($query_female_total)->result_array();
                       // var_dump($data_total[0]['Consumption']);die();
                        if(is_null($data_total[0]['Consumption'])){
                            $tfoot_male=0;
                        }else{
                            $tfoot_male=$data_total[0]['Consumption'];
                        }
    
                        if(is_null($data_female_total[0]['Consumption'])){
                            $tfoot_female=0;
                        }else{
                            $tfoot_female=$data_female_total[0]['Consumption'];
                        }
                        // echo $tfoot_female;die();
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
                
                            $query="select sum(tbl.Consumption) as Consumption from (select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' UNION ALL select round(SUM(Consumption)/2) as Consumption FROM $table_name_live where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."')tbl";
                           
                            $query_female="select round(SUM(Consumption)/2) as Consumption FROM (select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."' UNION ALL select round(SUM(Consumption)/2) as Consumption FROM $table_name_live where StationId=$stationid and TxnDate between '".$fromdate."' and '".$todate."' and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."')tbl";
                           
                            $data = $this->db->query($query)->result_array();
                           if(isset($data[0]['Consumption'])){
                                $footfall=$data[0]['Consumption'];
                            }else{
                                $footfall="0";
                            }
                // echo  $data_total[0]['Consumption'];die();
                            $data_female = $this->db->query($query_female)->result_array();
                           if(isset($data_female[0]['Consumption'])){
                                $footfall_female=$data_female[0]['Consumption'];
                            }else{
                                $footfall_female="0";
                            }
                            
                            //echo  var_dump($data_total[0]['Consumption']);die();
                            $fulldata[$i]['Time']=$from." To ".$to;
                            
                            $fulldata[$i]['footfall_male']=$footfall;
                            if($tfoot_male==0){
                                $fulldata[$i]['footfall_male_percent']=0;
                            }else{
                                $fulldata[$i]['footfall_male_percent']=round(($footfall/$tfoot_male)*100,1);
                            }
                           if($tfoot_female==0){
                            $fulldata[$i]['footfall_female_percent']=0;
                           }else{
                            $fulldata[$i]['footfall_female_percent']=round(($footfall_female/$tfoot_female)*100,1);
                           }
                            //echo $fulldata[$i]['footfall_male_percent'];die();
                            $fulldata[$i]['footfall_female']=$footfall_female;                        
                            
                            $fulldata[$i]['date']=$fromdate." To ".$todate;
                //echo json_encode($fulldata);die();
                           
                           
                
                        }
    
                    
                     return $fulldata;
        
    }
    function getOudorLevel($fromdate,$location,$branch,$stationid,$table_name,$table_name_live){
        $today=date("Y-m-d");
        if($fromdate==$today){
            $table_name=$table_name_live;
        }else{
            $table_name=$table_name;
        }
        $resultArray=array();
        $date = "'".$fromdate."'";
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

        $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
        // echo $query;die();
        $data = $this->db->query($query)->result();

        $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
        // echo $query;die();
        $data_female = $this->db->query($query_female)->result();
        //echo count($data);
        if(isset($data[0]->Consumption)){
        $footfall=$data[0]->Consumption;
        }else{
        $footfall="0";
        }
        if(isset($data_female[0]->Consumption)){
            $footfall_female=$data_female[0]->Consumption;
            }else{
            $footfall_female="0";
            }
        $fulldata[$i]['Time']=$from." To ".$to;
        $fulldata[$i]['TxnTime']=$from;
        $fulldata[$i]['footfall']=(int)$footfall;
        $fulldata[$i]['footfall_female']=(int)$footfall_female;
        

        // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2022000112,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
        // $this->db->query($insQuery);


        }
        //footfall end
        $queryleft="SELECT TxnTime as ToTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Odour Male' and TxnDate=".$date." order by TxnTime ASC";
         

         $queryright="SELECT TxnTime as ToTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Odour Female' and TxnDate=".$date." order by TxnTime ASC";
         $dataleft = $this->db->query($queryleft)->result();
         $dataright = $this->db->query($queryright)->result();

         $xdata = array();
         $ydata = array();

         $xdatahmd = array();
         $ydatahmd = array();
         for ($or=0; $or < count($dataright); $or++) { 
         $xdatahmd[$or]=$dataright[$or]->ToTime;
         $ydatahmd[$or]=(int)$dataright[$or]->CurReading;
         }
         for ($ol=0; $ol < count($dataleft); $ol++) { 
         $xdata[$ol]=$dataleft[$ol]->ToTime;
         if($fulldata[$ol]['footfall']>10){
            $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
         }else if($fulldata[$ol]['footfall']>5 && $fulldata[$ol]['footfall']<10){
            $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
         }else if($fulldata[$ol]['footfall']>0 && $fulldata[$ol]['footfall']<5){
            $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
         }else{
             $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
         }
         
         }
         $resultArray['leftxdata']=$xdata;
         $resultArray['leftydata']=$ydata;
         $resultArray['rightxdata']=$xdatahmd;
         $resultArray['rightydata']=$ydatahmd;
             


          

     return $resultArray;
    }
    function getFeedbackDataDay($fromdate,$todate,$location,$branch,$stationid,$table_name,$table_name_live){
        $fulldata=array();
        if($fromdate == $todate )
        {
            $today=date("Y-m-d");
            if($fromdate==$today){
                $table_name=$table_name_live;
            }else{
                $table_name=$table_name;
            }
            $date = "'".$fromdate."'";
        
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
    
                $querygood="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Good' AND StationId=$stationid and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
                $queryavg="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Avg' AND StationId=$stationid and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
                $querypoor="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Poor' AND StationId=$stationid and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'"; 
                // echo $querygood;die();
                $gooddata = $this->db->query($querygood)->result();
                $avgdata = $this->db->query($queryavg)->result();
                $poordata = $this->db->query($querypoor)->result();
            //  echo $gooddata[0]->Consumption;
                $fulldata[$i]['Time']=$from." To ".$to;
                $fulldata[$i]['good']=$gooddata[0]->Consumption;
                $fulldata[$i]['avg']=$avgdata[0]->Consumption;
                $fulldata[$i]['poor']=$poordata[0]->Consumption;
                
            

            }
            return $fulldata;

        }else{

            $date_from = strtotime($fromdate); 
            $date_to = strtotime($todate); 
            $datesarray=array();
            for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                array_push($datesarray, date("Y-m-d",$i1));
                
            }
            for ($k=0; $k < count($datesarray); $k++) { 
                $res_check=$this->check_feedback($datesarray[$k],$stationid);
                if(count($res_check)==1){
                        $fulldata[$k]['Time']=$datesarray[$k];
                        $fulldata[$k]['good']=$res_check[0]['good'];
                        $fulldata[$k]['avg']=$res_check[0]['avg'];
                        $fulldata[$k]['poor']=$res_check[0]['poor'];
                }else{
                    $today=date("Y-m-d");
                    if($datesarray[$k]==$today){
                        $table_name=$table_name_live;
                    }else{
                        $table_name=$table_name;
                    }
                    
                        $querygood="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Good' AND StationId=$stationid and TxnDate='".$datesarray[$k]."'";
                        
                        $queryavg="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Avg' AND StationId=$stationid and TxnDate='".$datesarray[$k]."'";
                        $querypoor="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Poor' AND StationId=$stationid and TxnDate='".$datesarray[$k]."'"; 
                        $gooddata = $this->db->query($querygood)->result();
                        $avgdata = $this->db->query($queryavg)->result();
                        $poordata = $this->db->query($querypoor)->result();
        
                        $fulldata[$k]['Time']=$datesarray[$k];
                        $fulldata[$k]['good']=$gooddata[0]->Consumption;
                        $fulldata[$k]['avg']=$avgdata[0]->Consumption;
                        $fulldata[$k]['poor']=$poordata[0]->Consumption;
                }
               
            }
            return $fulldata;
        }
}
function getLekageReport($fromdate,$todate,$location,$branch,$stationid,$table_name,$table_name_live){
                 $fulldata=array();
  
                  $date_from = strtotime($fromdate); 
                   $date_to = strtotime($todate); 
                   $datesarray=array();
                   for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                       array_push($datesarray, date("Y-m-d",$i1));
                       
                   }
                   if($stationid==2022000112 ||$stationid==2022000113 ){
                   for ($k=0; $k < count($datesarray); $k++) { 
                    $today=date("Y-m-d");
                    if($datesarray[$k]==$today){
                        $table_name=$table_name_live;
                    }else{
                        $table_name=$table_name;
                    }
                       $check=$this->check_leakage($datesarray[$k],$stationid);
                       if(count($check)==1){
                           $fulldata[$k]['date']=$datesarray[$k];
                           $fulldata[$k]['leak']=((float)$check[0]['water_leakage']);
                       }else{
                           if($datesarray[$k]>=date('Y-m-d')){
                            
                               $water1="SELECT CurReading FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' ORDER BY TxnTime ASC  ";
                               // echo $water1;die();
                               $water2="SELECT CurReading FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' ORDER BY TxnTime ASC ";
                               $water_add_morning_q="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";

                               $water_add_night_q="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
                               $times1="SELECT DISTINCT TxnTime FROM $table_name WHERE (LineConnected='Footfall Male' OR LineConnected='Footfall Female') AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' and `Consumption`>0 ORDER BY TxnTime";
                               $times1data = $this->db->query($times1)->result_array();
                               $lw1=0;
                               for($j=0;$j<count($times1data); $j++){
       
                                   $w1="SELECT (CurReading-Consumption) as con FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times1data[$j]['TxnTime']."'";
                                   $w1data = $this->db->query($w1)->result_array();
                                   $lw1+=$w1data[0]['con'];
                               }
       
                               $times2="SELECT DISTINCT TxnTime FROM $table_name WHERE (LineConnected='Footfall Male' OR LineConnected='Footfall Female') AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' and `Consumption`>0 ORDER BY TxnTime";
                               $times2data = $this->db->query($times2)->result_array();
                               $lw2=0;
                               for($j=0;$j<count($times2data); $j++){
       
                                   $w2="SELECT (CurReading-Consumption) as con FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times2data[$j]['TxnTime']."' ";
                                   $w2data = $this->db->query($w2)->result_array();
                                   $lw2+=$w2data[0]['con'];
                               }
                               $water_mrng_data = $this->db->query($water_add_morning_q)->result_array();
                               $water_evng_data = $this->db->query($water_add_night_q)->result_array();
                               $w_add=$water_mrng_data[0]['water_add']+$water_evng_data[0]['water_add'];
                               $error_correction=$lw1+$lw2+$w_add;
                               //echo $error_correction;die();
                                   $water1data = $this->db->query($water1)->result_array();
                                   $water1leak=$water1data[0]['CurReading']-$water1data[count($water1data)-1]['CurReading'];
                                   $water2data = $this->db->query($water2)->result_array();
                                   $water2leak=$water2data[0]['CurReading']-$water2data[count($water2data)-1]['CurReading'];
                               $leak=$water1leak+$water2leak;
                               if($leak>0){
                                   $err=5;
                               }else{
                                   $err=0;
                               }
                               $fulldata[$k]['date']=$datesarray[$k];
                               $fulldata[$k]['leak']=abs(round($leak-$error_correction+$w_add,2));
                            //    $fulldata[$k]['test']=$water1leak;
       
                                  
                           }else{
                               $water1="SELECT CurReading FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' ORDER BY TxnTime ASC  ";
                               // echo $water1;die();
                               $water2="SELECT CurReading FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' ORDER BY TxnTime  ASC ";
                               $water_add_morning_q="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";

                               $water_add_night_q="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";

                               $times1="SELECT DISTINCT TxnTime FROM $table_name WHERE (LineConnected='Footfall Male' OR LineConnected='Footfall Female') AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '00:00:00' AND '04:00:00' and `Consumption`>0 ORDER BY TxnTime";
                               // echo $times1;die();
                               $times1data = $this->db->query($times1)->result_array();
                               $lw1=0;
                               for($j=0;$j<count($times1data); $j++){
       
                                   $w1="SELECT (PrvReading-Consumption) as con FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times1data[$j]['TxnTime']."'";
                                   // echo $w1;
                                   $water_add_mrng_q1="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times1data[$j]['TxnTime']."' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
                                   $add_m_t = $this->db->query($water_add_mrng_q1)->result_array();
                                   $w1data = $this->db->query($w1)->result_array();
                                   $lw1=$lw1+$w1data[0]['con']+$add_m_t[0]['water_add'];
                                    //echo $w1data[0]['con']."<br>";
                               }
       
                               $times2="SELECT DISTINCT TxnTime FROM $table_name WHERE (LineConnected='Footfall Male' OR LineConnected='Footfall Female') AND TxnDate ='".$datesarray[$k]."' and TxnTime BETWEEN '22:00:00' AND '24:00:00' and `Consumption`>0 ORDER BY TxnTime";
                               $times2data = $this->db->query($times2)->result_array();
                               $lw2=0;
                               $add=0;
                               for($j=0;$j<count($times2data); $j++){
       
                                   $w2="SELECT (PrvReading-Consumption) as con FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times2data[$j]['TxnTime']."' ";
                                  
                                   $w2data = $this->db->query($w2)->result_array();
                                   $water_add_night_q1="SELECT abs(SUM(`PrvReading`-`Consumption`)) as water_add FROM $table_name WHERE LineConnected='Water Level' AND TxnDate ='".$datesarray[$k]."' and TxnTime = '".$times2data[$j]['TxnTime']."' AND (`PrvReading`-`Consumption`)<0  ORDER BY TxnTime ASC";
                                   $add_n_t = $this->db->query($water_add_night_q1)->result_array();
                                  // echo $w2data[0]['con']."<br>";
                                   $lw2=$lw2+$w2data[0]['con']+$add_n_t[0]['water_add'];
                                   //$add+=$add_n_t[0]['water_add'];
                                   //echo $w2data[0]['con']."<br>";
                               }
       
                               
                               // echo $error_correction;die();
                               $water1data = $this->db->query($water1)->result_array();
                               $water_mrng_data = $this->db->query($water_add_morning_q)->result_array();
                               $water_evng_data = $this->db->query($water_add_night_q)->result_array();
                               $water1leak=$water1data[0]['CurReading']-$water1data[count($water1data)-1]['CurReading'];
                               $water2data = $this->db->query($water2)->result_array();
                               $water2leak=$water2data[0]['CurReading']-$water2data[count($water2data)-1]['CurReading'];
                               $leak=$water1leak+$water2leak;
                               if($leak>0){
                                   $err=5;
                               }else{
                                   $err=0;
                               }
                               $w_add=$water_mrng_data[0]['water_add']+$water_evng_data[0]['water_add'];
                               $error_correction=$lw1+$lw2;
                       //    echo $leak."------".$lw1."---".$lw2." add=".$w_add." err=".$error_correction;die();
                               $fulldata[$k]['date']=$datesarray[$k];
                               $fulldata[$k]['leak']=abs(round($leak-$error_correction+$w_add,2));
                               // $fulldata[$k]['leak']=(round($leak+$w_add-$err,2));
       
                                 

                               $leakage_data=array(
                                'report_date'=>$datesarray[$k],
                                'created_date'=>date("Y-m-d H:i:s"),
                                'updated_date'=>date("Y-m-d H:i:s"),
                                'water_leakage'=>abs($fulldata[$k]['leak']),
                                'station_id'=>$stationid,
                                'location'=>$location              
                            );
                            $this->db->insert('warangal_waterleakage_data', $leakage_data);
                           }
                           
                       }
                       
                       
   
                   }
                }
                    return $fulldata;
       
   }
   function getWaterConsumptionReport($fromdate,$todate,$location,$branch,$stationid,$table_name,$table_name_live){
     
       $fulldata=array();
 
                  $date_from = strtotime($fromdate); 
                   $date_to = strtotime($todate); 
                   $datesarray=array();
                   for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                       array_push($datesarray, date("Y-m-d",$i1));
                       
                   }
                   if($stationid==2022000112 ||$stationid==2022000113 ){
                   for ($k=0; $k < count($datesarray); $k++) { 
                    $today=date("Y-m-d");
                    if($datesarray[$k]==$today){
                        $table_name=$table_name_live;
                    }else{
                        $table_name=$table_name;
                    }
                    
                       $check=$this->check_water_cons($stationid,$datesarray[$k]);
                       if(count($check)==1){
                           $fulldata[$k]['date']=$datesarray[$k];
                           $fulldata[$k]['cons']=((float)$check[0]['water_consumption']);
                           $fulldata[$k]['from']="db";

                       }else{
                        
                           if($datesarray[$k]>=date('Y-m-d')){
                               $water_add_query="SELECT abs(SUM(`CurReading`-`Consumption`)) as water_add FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' AND `CurReading`-`Consumption`<0";
                               $water_cons_query="SELECT (SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' ORDER BY TxnTime LIMIT 1) as 'start',(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
                               $water_add_data = $this->db->query($water_add_query)->result_array();
                               $water_cons_data = $this->db->query($water_cons_query)->result_array();
                               $water_cons=$water_cons_data[0]['start']-$water_cons_data[0]['end'];
                               $water_add=$water_add_data[0]['water_add'];
                               
                               $fulldata[$k]['date']=$datesarray[$k];
                               $fulldata[$k]['cons']=(round($water_cons+$water_add,2));
       
                                  
                           }else{
                            $water_add_query="SELECT abs(SUM(`CurReading`-`Consumption`)) as water_add FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' AND `CurReading`-`Consumption`<0";
                            $water_cons_query="SELECT (SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' ORDER BY TxnTime LIMIT 1) as 'start',(SELECT CurReading FROM $table_name WHERE TxnDate='".$datesarray[$k]."' AND LineConnected='Water Level' ORDER BY TxnTime DESC LIMIT 1) as 'end'";
                            $water_add_data = $this->db->query($water_add_query)->result_array();
                            $water_cons_data = $this->db->query($water_cons_query)->result_array();
                            $water_cons=$water_cons_data[0]['start']-$water_cons_data[0]['end'];
                            $water_add=$water_add_data[0]['water_add'];
                            
                            $fulldata[$k]['date']=$datesarray[$k];
                            $fulldata[$k]['cons']=(round($water_cons+$water_add,2));

                            $consumption_data=array(
                                'report_date'=>$datesarray[$k],
                                'created_date'=>date("Y-m-d H:i:s"),
                                'updated_date'=>date("Y-m-d H:i:s"),
                                'water_consumption'=>$fulldata[$k]['cons'],
                                'station_id'=>$stationid,
                                'location'=>$location              
                            );
                            $this->db->insert('warangal_waterconsumption_data', $consumption_data);
       
                                   
                           }
                           
                       }
                       
                       
   
                   }
                }
                    return $fulldata;
       
   }
   function check_water_cons($station,$date)
	{
		$this->db->select('*');
    $this->db->from('warangal_waterconsumption_data');        
    $this->db->where('station_id',$station);
    $this->db->where('report_date',$date);       
    $res = $this->db->get()->result_array();     
        return $res;
	}
   function check_water_leak($station,$date)
   {
       $this->db->select('*');
       $this->db->from('wrngl_water_leak_report');        
    //    $this->db->where('location',$location);
       $this->db->where('stationid',$station);
       $this->db->where('date',$date);
      
       $res = $this->db->get()->result_array();
       //echo $res[0]['report_date'];die();        
        //echo "ll:".$this->db->last_query();die();       
       return $res;
   }
   function check_odour_data($station,$date)
	{
		$this->db->select('*');
        $this->db->from('odour_high_report');        
		// $this->db->where('location',$location);
		$this->db->where('stationid',$station);
        $this->db->where('date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
   function getHighOdReport($fromdate,$todate,$location,$branch,$stationid,$table_name,$table_name_live){
      
       $fulldata=array();
 
                  $date_from = strtotime($fromdate); 
                   $date_to = strtotime($todate); 
                   $datesarray=array();
                   for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                       array_push($datesarray, date("Y-m-d",$i1));
                       
                   }
                   for ($k=0; $k < count($datesarray); $k++) {
                    $today=date("Y-m-d");
                    if($datesarray[$k]==$today){
                        $table_name=$table_name_live;
                    }else{
                        $table_name=$table_name;
                    } 
   
                       $check=$this->check_odour($datesarray[$k],$stationid);
                       if(count($check)==1){
                           $fulldata[$k]['date']=$datesarray[$k];
                           //$fulldata[$k]['leak']=(float)$check[0]['leakage'];
                           $fulldata[$k]['od_male_count']=$check[0]['od_male_count'];
                            $fulldata[$k]['od_male_high']=$check[0]['od_male_high'];
                            $fulldata[$k]['od_female_count']=$check[0]['od_female_count'];
                            $fulldata[$k]['od_female_high']=$check[0]['od_female_high'];
                            $fulldata[$k]['from']='db';
                       }else{
                           if($datesarray[$k]>=date('Y-m-d')){
                               $od_male="SELECT COUNT(*) as num,MAX(CurReading) as high FROM $table_name WHERE  TxnDate ='".$datesarray[$k]."' and LineConnected='Odour Male' AND CurReading>120  ";
                               

                               $od_female="SELECT COUNT(*) as num,MAX(CurReading) as high FROM $table_name WHERE  TxnDate ='".$datesarray[$k]."' and LineConnected='Odour Female' AND CurReading>120  ";
       
                              
                                   $od_maledata = $this->db->query($od_male)->result_array();
                                   $od_femaledata = $this->db->query($od_female)->result_array();
                              
                               $fulldata[$k]['date']=$datesarray[$k];
                               $fulldata[$k]['od_male_count']=$od_maledata[0]['num'];
                               $fulldata[$k]['od_male_high']=$od_maledata[0]['high'];
                               $fulldata[$k]['od_female_count']=$od_femaledata[0]['num'];
                               $fulldata[$k]['od_female_high']=$od_femaledata[0]['high'];
       
                                  
                           }else{
                            $od_male="SELECT COUNT(*) as num,MAX(CurReading) as high FROM $table_name WHERE  TxnDate ='".$datesarray[$k]."' and LineConnected='Odour Male' AND CurReading>120  ";
                               //echo $od_male;

                            $od_female="SELECT COUNT(*) as num,MAX(CurReading) as high FROM $table_name WHERE  TxnDate ='".$datesarray[$k]."' and LineConnected='Odour Female' AND CurReading>120  ";
    
                           
                                $od_maledata = $this->db->query($od_male)->result_array();
                                $od_femaledata = $this->db->query($od_female)->result_array();
                           //echo json_encode($od_maledata);die();
                           if($od_maledata[0]['num']==null){
                            $fulldata[$k]['od_male_count']=0;
                           }else{
                            $fulldata[$k]['od_male_count']=$od_maledata[0]['num'];
                           }

                           if($od_maledata[0]['high']==null){
                            $fulldata[$k]['od_male_high']=0;
                           }else{
                            $fulldata[$k]['od_male_high']=$od_maledata[0]['high'];
                           }
                           if($od_femaledata[0]['num']==null){
                            $fulldata[$k]['od_female_count']=0;
                           }else{
                            $fulldata[$k]['od_female_count']=$od_femaledata[0]['num'];
                           }

                           if($od_femaledata[0]['high']==null){
                            $fulldata[$k]['od_female_high']=0;
                           }else{
                            $fulldata[$k]['od_female_high']=$od_femaledata[0]['high'];
                           }
                            $fulldata[$k]['date']=$datesarray[$k];
                            
                            
                            
                            
       
                                   $odour_data=array(
                                   'location'=>$location,
                                   'od_male_count'=>$fulldata[$k]['od_male_count'],
                                   'od_male_high'=>$fulldata[$k]['od_male_high'],
                                   'od_female_count'=>$fulldata[$k]['od_female_count'],
                                   'od_female_high'=>$fulldata[$k]['od_female_high'],
                                   'date'=>$datesarray[$k],
                                   'stationid'=>$stationid            
                               );
                               $this->db->insert('odour_high_report', $odour_data);
                           }
                           
                       }
                       
                       
   
                   }
                    return $fulldata;
       
   }
   function getFootfallReport($date,$location,$branch,$stationid,$table_name){  
   
                    $tdate=date("Y-m-d");
                    if($date>=$tdate){
                        $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate='".$date."' and LineConnected='Footfall Male' ";
                     $data = $this->db->query($query)->result();
                      
                     $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate='".$date."' and LineConnected='Footfall Female' ";
                     $data_female = $this->db->query($query_female)->result();
                     if(isset($data[0]->Consumption)){
                        $footfall[0]=$data[0]->Consumption;
                    }else{
                        $footfall[0]="0";
                    }
                    //print_r($datasms);die();
                    $footfall[1]=$data_female[0]->Consumption;
                 return $footfall;
             }else{
                $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate='".$date."' and LineConnected='Footfall Male' ";
                     $data = $this->db->query($query)->result();

                     $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate='".$date."' and LineConnected='Footfall Female' ";
                     $data_female = $this->db->query($query_female)->result();
                     if(isset($data[0]->Consumption)){
                 $footfall[0]=$data[0]->Consumption;
                    }else{
                        $footfall[0]="0";
                    }
                   
                    $footfall[1]=$data_female[0]->Consumption;
                
                 return $footfall;
             }
                    
    
}
function getWaterLevelLiveDashboard_consolidated($date,$location,$branch,$stationid,$table_name){
    
    $resultArray=array();
    
    $date = "'".$date."'";
    if($stationid==2022000112 || $stationid==2022000113){
        $queryleft="SELECT TxnTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Water Level' and TxnDate=".$date." order by TxnTime ASC";
        //    echo $queryleft;die();
             $dataleft = $this->db->query($queryleft)->result();    
        
                    $xdata = array();
                    $ydata = array();
        
                    for ($ol=0; $ol < count($dataleft); $ol++) { 
                        $xdata[$ol]=$dataleft[$ol]->TxnTime;
                        $ydata[$ol]=(float)$dataleft[$ol]->CurReading;
                    }
                    $resultArray['xdata']=$xdata;
                    $resultArray['ydata']=$ydata;
                    $resultArray['fs']=1;
        
                    return $resultArray;
    }else{
        for ($i=0; $i <= 24; $i++) 
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

                $query="select SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))/60 AS `min` FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
              
                $data = $this->db->query($query)->result_array();
                if($data[0]['min']>60 || $data[0]['min']>55 || 0>$data[0]['min']){
                    $min=60;
                }else{
                    $min=(int)$data[0]['min'];
                }
                $fulldata[$i]['Time']=$from." To ".$to;
                $fulldata[$i]['TxnTime']=$from;
                $fulldata[$i]['min']=$min;
            }
            $xdata = array();
            $ydata = array();
            for ($fl = 0; $fl < count($fulldata); $fl++) 
            { 
                
                $xdata[$fl] = $fulldata[$fl]['TxnTime']; 
                $ydata[$fl] = $fulldata[$fl]['min'];
                
                
                
            }
            $resultArray['xdata']=$xdata;
            $resultArray['ydata']=$ydata;
            $resultArray['fs']=2;
            return $resultArray;
    }
    
}
function getPowerConsoData($date,$location,$branch,$stationid,$table_name){
    $resultArray=array();
    $date = "'".$date."'";
    $table = $table_name;
    $stationid = "'".$stationid."'";
   
        for ($i=0; $i <= 24; $i++) 
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

                $query="select SUM(TIME_TO_SEC(ToTime) - TIME_TO_SEC(FromTime))/60 AS `min` FROM $table where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
              
                $data = $this->db->query($query)->result_array();
                if($data[0]['min']>60 || $data[0]['min']>49 || 0>$data[0]['min']){
                    $min=60;
                }else{
                    $min=(int)$data[0]['min'];
                }
                $fulldata[$i]['Time']=$from." To ".$to;
                $fulldata[$i]['TxnTime']=$from;
                $fulldata[$i]['min']=$min;
            }
            $xdata = array();
            $ydata = array();
            for ($fl = 0; $fl < count($fulldata); $fl++) 
            { 
                
                $xdata[$fl] = $fulldata[$fl]['TxnTime']; 
                $ydata[$fl] = $fulldata[$fl]['min'];
                
                
                
            }
            $resultArray['xdata']=$xdata;
            $resultArray['ydata']=$ydata;
            $resultArray['fs']=2;

    
    
    return $resultArray;
}
function getOudorLevelLiveDashboardcreport($date,$location,$branch,$stationid,$table_name){
   
     $tdate=date("Y-m-d");
                if($date>=$tdate){
                        $resultArray=array();
                        //$today=date("Y-m-d");
                        $date = "'".$date."'";
                   
                        $queryleft="SELECT TxnTime as ToTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Odour Male' and TxnDate=".$date." order by TxnTime ASC";         

                        $queryright="SELECT TxnTime as ToTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Odour Female' and TxnDate=".$date." order by TxnTime ASC";

                        $dataleft = $this->db->query($queryleft)->result();
                        $dataright = $this->db->query($queryright)->result();

                        //$resultArray[0]['left']=$dataleft;
                        // $resultArray[0]['right']=$dataright;

                        $xdata = array();
                        $ydata = array();

                        $xdatahmd = array();
                        $ydatahmd = array();
                        for ($or=0; $or < count($dataright); $or++) { 
                        $xdatahmd[$or]=$dataright[$or]->ToTime;
                        $ydatahmd[$or]=(int)$dataright[$or]->CurReading;
                        }
                        for ($ol=0; $ol < count($dataleft); $ol++) { 
                        $xdata[$ol]=$dataleft[$ol]->ToTime;
                        $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
                        }
                        $resultArray['leftxdata']=$xdata;
                        $resultArray['leftydata']=$ydata;
                        $resultArray['rightxdata']=$xdatahmd;
                        $resultArray['rightydata']=$ydatahmd;
                        //print_r($xdatahmd);   
                        return $resultArray;

                }else{
                        $resultArray=array();
                    //$today=date("Y-m-d");
                    $date = "'".$date."'";

                    // $today="2020-02-26";
                    // $date = "'".$today."'";
                    //foot fall start
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

                    $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                    // echo $query;die();
                    $data = $this->db->query($query)->result();

                    $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                    // echo $query;die();
                    $data_female = $this->db->query($query_female)->result();
                    //echo count($data);
                    if(isset($data[0]->Consumption)){
                    $footfall=$data[0]->Consumption;
                    }else{
                    $footfall="0";
                    }
                    if(isset($data_female[0]->Consumption)){
                        $footfall_female=$data_female[0]->Consumption;
                        }else{
                        $footfall_female="0";
                        }
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['TxnTime']=$from;
                    $fulldata[$i]['footfall']=(int)$footfall;
                    $fulldata[$i]['footfall_female']=(int)$footfall_female;
                    

                    // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2022000112,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
                    // $this->db->query($insQuery);


                    }
                    //footfall end


                    $queryleft="SELECT TxnTime as ToTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Odour Male' and TxnDate=".$date." order by TxnTime ASC";         

                    $queryright="SELECT TxnTime as ToTime,CurReading FROM $table_name where StationId=$stationid and LineConnected='Odour Female' and TxnDate=".$date." order by TxnTime ASC";

                    $dataleft = $this->db->query($queryleft)->result();
                    $dataright = $this->db->query($queryright)->result();

                    //$resultArray[0]['left']=$dataleft;
                    // $resultArray[0]['right']=$dataright;


                    $xdata = array();
                    $ydata = array();

                    $xdatahmd = array();
                    $ydatahmd = array();
                    for ($or=0; $or < count($dataright); $or++) { 
                    $xdatahmd[$or]=$dataright[$or]->ToTime;
                    $ydatahmd[$or]=(int)$dataright[$or]->CurReading;
                    }
                    for ($ol=0; $ol < count($dataleft); $ol++) { 
                    $xdata[$ol]=$dataleft[$ol]->ToTime;
                     if($fulldata[$ol]['footfall']>10){
                        $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
                        }else if($fulldata[$ol]['footfall']>5 && $fulldata[$ol]['footfall']<10){
                            $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
                        }else if($fulldata[$ol]['footfall']>0 && $fulldata[$ol]['footfall']<5){
                            $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
                        }else{
                            $ydata[$ol]=(int)$dataleft[$ol]->CurReading;
                        }
                    }
                    $resultArray['leftxdata']=$xdata;
                    $resultArray['leftydata']=$ydata;
                    $resultArray['rightxdata']=$xdatahmd;
                    $resultArray['rightydata']=$ydatahmd;
                    $insQuery="INSERT INTO odourtotaldata(`StationId`,`leftxdata`,`leftydata`,`rightxdata`,`rightydata`,`Date`)VALUES($stationid,'".json_encode($resultArray['leftxdata'])."','".json_encode($resultArray['leftydata'])."','".json_encode($resultArray['rightxdata'])."','".json_encode($resultArray['rightydata'])."',".$date.")";
                    //echo $insQuery;
                    $this->db->query($insQuery);
                    //print_r($xdatahmd);   
                    return $resultArray;
                }
   
}
function getsodexoDataLivecreport($date,$location,$branch,$stationid,$table_name){

    $tdate=date("Y-m-d");
        if($date>=$tdate){
                $date = "'".$date."'";
                $date1 = $date;

                //  $date = "'2020-02-26'";
                // $date1 = "2020-02-26";
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

                $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                // echo $query;die();
                $data = $this->db->query($query)->result();

                $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                // echo $query;die();
                $data_female = $this->db->query($query_female)->result();
                //echo count($data);
                if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
                }else{
                $footfall="0";
                }
                if(isset($data_female[0]->Consumption)){
                    $footfall_female=$data_female[0]->Consumption;
                    }else{
                    $footfall_female="0";
                    }
                $fulldata[$i]['Time']=$from." To ".$to;
                $fulldata[$i]['TxnTime']=$from;
                $fulldata[$i]['footfall']=(int)$footfall;
                $fulldata[$i]['footfall_female']=(int)$footfall_female;
                $fulldata[$i]['Date']=$date1;

                // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2022000112,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
                // $this->db->query($insQuery);


                }
                $hoursxaxisarray = array();
                $footfallyaxisarray = array();
                $footfallyaxisarray_female = array();


                for ($fl = 0; $fl < count($fulldata); $fl++) 
                { 

                $hoursxaxisarray[$fl] = $fulldata[$fl]['TxnTime']; 
                $footfallyaxisarray[$fl] = $fulldata[$fl]['footfall']; 
                $footfallyaxisarray_female[$fl] = $fulldata[$fl]['footfall_female']; 


                }

                $fulldata1['xdata']=$hoursxaxisarray;
                $fulldata1['ydata']=$footfallyaxisarray;
                $fulldata1['ydata_female']=$footfallyaxisarray_female;
                // echo json_encode($sam);

                return $fulldata1;

                }else{
                    $date = "'".$date."'";
                    $date1 = $date;

                    //  $date = "'2020-02-26'";
                    // $date1 = "2020-02-26";
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

                    $query="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                    // echo $query;die();
                    $data = $this->db->query($query)->result();

                    $query_female="select round(SUM(Consumption)/2) as Consumption FROM $table_name where StationId=$stationid and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
                    // echo $query;die();
                    $data_female = $this->db->query($query_female)->result();
                    //echo count($data);
                    if(isset($data[0]->Consumption)){
                    $footfall=$data[0]->Consumption;
                    }else{
                    $footfall="0";
                    }
                    if(isset($data_female[0]->Consumption)){
                        $footfall_female=$data_female[0]->Consumption;
                        }else{
                        $footfall_female="0";
                        }
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['TxnTime']=$from;
                    $fulldata[$i]['footfall']=(int)$footfall;
                    $fulldata[$i]['footfall_female']=(int)$footfall_female;
                    $fulldata[$i]['Date']=$date1;

                    // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2022000112,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
                    // $this->db->query($insQuery);


                    }
                    $hoursxaxisarray = array();
                    $footfallyaxisarray = array();
                    $footfallyaxisarray_female = array();


                    for ($fl = 0; $fl < count($fulldata); $fl++) 
                    { 

                    $hoursxaxisarray[$fl] = $fulldata[$fl]['TxnTime']; 
                    $footfallyaxisarray[$fl] = $fulldata[$fl]['footfall'];
                    $footfallyaxisarray_female[$fl] = $fulldata[$fl]['footfall_female']; 


                    }

                    $fulldata1['xdata']=$hoursxaxisarray;
                    $fulldata1['ydata']=$footfallyaxisarray;
                    $fulldata1['ydata_female']=$footfallyaxisarray_female;
                    $insQuery="INSERT INTO footfalltotaldata(`StationId`,`xdata`,`ydata`,`ydata_female`,`Date`)VALUES($stationid,'".json_encode($fulldata1['xdata'])."','".json_encode($fulldata1['ydata'])."','".json_encode($fulldata1['ydata_female'])."',".$date1.")";
                    // echo $insQuery;
                    $this->db->query($insQuery);
                    // echo json_encode($sam);

                    return $fulldata1;

                }
    
    
}
function getFeedbackDataDayLivecreport($date,$location,$branch,$stationid,$table_name){

    $fulldata=array();
  
     $today=$date;
       //$today="2020-02-26";
        $date = "'".$today."'";
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
 
            $querygood="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Good' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
            $queryavg="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Avg' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'";
             $querypoor="SELECT SUM(Consumption) as Consumption FROM $table_name where LineConnected='FB Poor' and TxnDate=".$date."   and FromTime BETWEEN '".$from."' AND '".$to."'"; 
            // echo $querygood;die();
            $gooddata = $this->db->query($querygood)->result();
            $avgdata = $this->db->query($queryavg)->result();
            $poordata = $this->db->query($querypoor)->result();
          //  echo $gooddata[0]->Consumption;
            //$fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['Time']=$to;
            $fulldata[$i]['good']=$gooddata[0]->Consumption;
            $fulldata[$i]['avg']=$avgdata[0]->Consumption;
            $fulldata[$i]['poor']=$poordata[0]->Consumption;
            
           

        }
         $xdata = array();
        $good = array();
         $avg = array();
          $poor = array();
        

      for ($fl = 0; $fl < count($fulldata); $fl++) 
          { 
              
              $xdata[$fl] = $fulldata[$fl]['Time']; 
              $good[$fl] = (int)$fulldata[$fl]['good'];
              $avg[$fl] = (int)$fulldata[$fl]['avg'];
              $poor[$fl] = (int)$fulldata[$fl]['poor']; 
              
            
          }
         
          $fulldata1['xdata']=$xdata;
          $fulldata1['good']=$good;
          $fulldata1['avg']=$avg;
          $fulldata1['poor']=$poor;
        return $fulldata1;

     
    
}
    function getOdourUnaccepble($data){
        //$fdate = "'".$data['fromdate']."'";
        //$tdate = "'".$data['todate']."'";


               $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                $result=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 

                $query=" SELECT FromTime,ToTime FROM hardware_station_consumption_data_wr_collector where UomName='PPM' and TxnDate='".$datesarray[$k]."' and CurReading>120";
                $data = $this->db->query($query)->result();
                $tot=0;
                for ($i=0; $i < count($data); $i++) { 
                    $to_time = strtotime($data[$i]->ToTime);
                    $from_time = strtotime($data[$i]->FromTime);

                   // echo round(abs($to_time - $from_time) / 60,2)."Minute<br>";
                    $tot+= round(abs($to_time - $from_time) / 60,2);

                    # code...
                }
                $hours = floor($tot / 60);
                $minutes = ($tot % 60);

                $result[$k]['date']=$datesarray[$k];


                $result[$k]['unaodr']=$hours." Hours ".$minutes." Minutes";


                }
                return $result;


        
    }
    function getSupervsrHourly($date){
        $fulldata=array();
        $querysprt="SELECT * FROM SupervisorData where  CreatedDate='".$date."' ";
                    //echo $querysprt."<br>";die();
                    $datat = $this->db->query($querysprt)->result();
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
         
                    $queryspr="SELECT * FROM SupervisorData where  CreatedDate='".$date."'   and Time BETWEEN '".$from."' AND '".$to."' ";
                   // echo $queryspr."<br>";
                    $data = $this->db->query($queryspr)->result();
                 
                

                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['sprvsr']=count($data);                  
                    
                   

                }
                $fulldata[24]['totalsprvsr']=count($datat);
        return $fulldata;

    }
    function getAlertsHourly($date){
        $fulldata=array();
         $querysprt="SELECT * FROM OdouSmsData where  TxnDate='".$date."'    ";
                  $p=0;  
                    $datat = $this->db->query($querysprt)->result();
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
         
                    $queryspr="SELECT * FROM OdouSmsData where  TxnDate='".$date."'   and TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
                    
                    $data = $this->db->query($queryspr)->result();
                 
                

                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['alerts']=count($data);
                    $fulldata[$i]['alertspercent']=(count($data)/count($datat))*100;      
                    $p+=$fulldata[$i]['alertspercent'];            
                    
                   

                }
                $fulldata[24]['totalalerts']=count($datat);
                $fulldata[24]['totalpercent']=round($p,2);

        return $fulldata;

    }
    function getOdourUnaccepbleHourly($date){
            $fulldata=array();
            $tt=0;
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
         
                    $queryodr="SELECT FromTime,ToTime FROM hardware_station_consumption_data_wr_collector where UomName='PPM' and TxnDate='".$date."'   and TxnTime >= '".$from."' AND TxnTime < '".$to."' and CurReading>120 GROUP BY TxnTime";
                    
                    $data = $this->db->query($queryodr)->result();
                  $tot=0;
                for ($i1=0; $i1 < count($data); $i1++) { 
                    $to_time = strtotime($data[$i1]->ToTime);
                    $from_time = strtotime($data[$i1]->FromTime);
                    if((abs($to_time - $from_time) / 60)<=60){
                        $tot+= floor(abs($to_time - $from_time) / 60);
                    }
                   // echo round(abs($to_time - $from_time) / 60,2)."Minute<br>";
                    

                    # code...
                }
                
                    $tt+=$tot;
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['unaodr']=$tot;                  
                    
                   

                }
                $fulldata[24]['totalunacc']=$tt; 
        return $fulldata;

        
               

        
    }

    
    
    
    
    
    
    
    function getWaterLevelLiveDashboard_jp($today){
        $resultArray=array();
        // $today=date("Y-m-d");
        //$date = "'".$today."'";

        // $today="2020-11-04";
        $date = "'".$today."'";
        $queryleft="SELECT TxnTime as ToTime,CurReading FROM hardware_station_consumption_data_wr_jpnagar where StationId=2022000113 and LineConnected='Water Level' and TxnDate=".$date." order by TxnTime ASC";
       
         $dataleft = $this->db->query($queryleft)->result();
        

    $xdata = array();
    $ydata = array();

    for ($ol=0; $ol < count($dataleft); $ol++) { 
        $xdata[$ol]=$dataleft[$ol]->ToTime;
        $ydata[$ol]=(float)$dataleft[$ol]->CurReading;
    }
    $resultArray['xdata']=$xdata;
    $resultArray['ydata']=$ydata;
    
     return $resultArray;
    }
    
    function getOudorLevelLiveDashboard_jp($today){
        $resultArray=array();
        // $today=date("Y-m-d");
        //$date = "'".$today."'";

        // $today="2020-11-04";
        $date = "'".$today."'";
        $queryleft="SELECT TxnTime as ToTime,CurReading FROM hardware_station_consumption_data_wr_jpnagar where StationId=2022000113 and LineConnected='Odour Male' and TxnDate=".$date." order by TxnTime ASC";
         

         $queryright="SELECT TxnTime as ToTime,CurReading FROM hardware_station_consumption_data_wr_jpnagar where StationId=2022000113 and LineConnected='Odour Female' and TxnDate=".$date." order by TxnTime ASC";
         $dataleft = $this->db->query($queryleft)->result();
         $dataright = $this->db->query($queryright)->result();
            
             //$resultArray[0]['left']=$dataleft;
             // $resultArray[0]['right']=$dataright;

    $xdata = array();
    $ydata = array();

    $xdatahmd = array();
    $ydatahmd = array();
    for ($or=0; $or < count($dataright); $or++) { 
        $xdatahmd[$or]=$dataright[$or]->ToTime;
        $ydatahmd[$or]=(float)$dataright[$or]->CurReading;
    }
    for ($ol=0; $ol < count($dataleft); $ol++) { 
        $xdata[$ol]=$dataleft[$ol]->ToTime;
        $ydata[$ol]=(float)$dataleft[$ol]->CurReading;
    }
    $resultArray['xdata_male']=$xdata;
    $resultArray['ydata_male']=$ydata;
    $resultArray['xdata_female']=$xdatahmd;
    $resultArray['ydata_female']=$ydatahmd;
       //print_r($xdatahmd);   
     return $resultArray;
    }
    

    function getFootfallHourly($data){
        $result=array();
        $date = "'".$data['date']."'";
        
        $query1="SELECT (SELECT CurReading FROM hardware_station_consumption_data_wr_collector WHERE TxnDate=".$date." and
             StationId='2022000112' and LineConnected='Footfall Male' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM hardware_station_consumption_data_wr_collector WHERE TxnDate=".$date." and
             StationId='2022000112' and LineConnected='Footfall Male' ORDER BY Id DESC LIMIT 1) as 'last'";
    }
    function getSodexoDataReport($toiletId){
        $result=array();
        //$date = "'".$data['date']."'";
        $date = "'2019-12-09'";
        //echo $data['date'];die();
        $query1="SELECT (SELECT CurReading FROM hardware_station_consumption_data_wr_collector WHERE TxnDate=".$date." and
             StationId='2022000112' and LineConnected='Footfall Male' ORDER BY Id LIMIT 1) as 'first',
            (SELECT CurReading FROM hardware_station_consumption_data_wr_collector WHERE TxnDate=".$date." and
             StationId='2022000112' and LineConnected='Footfall Male' ORDER BY Id DESC LIMIT 1) as 'last'";
        //echo $query1;die();
        $query="select id, LineConnected,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LineConnected,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from hardware_station_consumption_data_wr_collector where
         TxnDate=".$date."  and StationId='2022000112'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        $data1 = $this->db->query($query1)->result();
        $data = $this->db->query($query)->result();
       // print_r($data1);die();
        for ($i=0; $i < count($data); $i++) { 
           $stname =explode("-",$data[$i]->StationName);
            if($data[$i]->LineConnected=='Footfall Male'){
                $result[0]['footfallcountMale']=($data1[0]->last)-($data1[0]->first);
                $result[0]['TxnDate']=$data[$i]->TxnDate;
                    $result[0]['StationName']=$stname[2];
                    $result[0]['ToTime']=$data[$i]->ToTime;
            }elseif($data[$i]->LineConnected=='Odour Male_RestRoom'){
                    $result[0]['OdourMale']=$data[$i]->CurReading;
                }        
        }  
        return $result;

    }
    function getJpData($date){
        $result=array();
        $query1="SELECT round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Footfall Male' and TxnDate=".$date." AND   StationId='2022000113'";
        $querywaterlevel="SELECT TxnTime as ToTime,CurReading FROM hardware_station_consumption_data_wr_jpnagar where StationId=2022000113 and LineConnected='Water Level' and TxnDate=".$date." order by TxnTime desc";
        $datawaterlevel = $this->db->query($querywaterlevel)->result_array();
        $waterlevel=$datawaterlevel[0]['CurReading'];
        
        $result[0]['level']=round($waterlevel/1000,2);
        $result[0]['percent']=round(($waterlevel/1800)*100);
        $query_female="SELECT round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Footfall Female' and TxnDate=".$date." AND   StationId='2022000113'";
        $queryj1swp="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_1' and TxnDate=".$date." and StationId='2022000113'";
        $queryj2swp="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_2' and TxnDate=".$date." and StationId='2022000113'";

        $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_1' and TxnDate=".$date." and LineConnected='Janitor_1' and Consumption>0 and StationId='2022000113'";
        $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_2' and TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and StationId='2022000113'";
        
        $queryavg="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='FB Avg' and TxnDate=".$date." and StationId='2022000113'";
        $querygood="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='FB Good' and TxnDate=".$date." and StationId='2022000113'";
        $querypoor="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='FB Poor' and TxnDate=".$date." and StationId='2022000113'";
        
        $queryj1="SELECT CurReading,FromTime,ToTime FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and StationId='2022000113'";
        $queryj2="SELECT CurReading,FromTime,ToTime FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and StationId='2022000113' ";
        //echo $query1;die();
        $query="select id, LineConnected,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LineConnected,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.hardware_station_consumption_data_wr_jpnagar where
         TxnDate=".$date."  and StationId='2022000113'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        $data1 = $this->db->query($query1)->result();
        $data_female = $this->db->query($query_female)->result();
        $data = $this->db->query($query)->result();
        $dataj1 = $this->db->query($queryj1)->result();
        $dataj2 = $this->db->query($queryj2)->result();
        $dataj1swp = $this->db->query($queryj1swp)->result();
        $dataj2swp = $this->db->query($queryj2swp)->result();

        $j1data = $this->db->query($queryj1timings)->result();
        $j2data = $this->db->query($queryj2timings)->result();
        //print_r($dataj2times);die();
        $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

        $j1vfd=0;
        $j2vfd=0;
        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=$dataj2times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=$dataj2times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
    
        $dataavg = $this->db->query($queryavg)->result();
        $datagood = $this->db->query($querygood)->result();
        $datapoor = $this->db->query($querypoor)->result();

        $query_od_male="SELECT CurReading FROM hardware_station_consumption_data_wr_jpnagar where
        LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." ORDER by TxnTime desc";
        $query_od_female="SELECT CurReading FROM hardware_station_consumption_data_wr_jpnagar where
        LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." ORDER by TxnTime desc";
         $data_od_male = $this->db->query($query_od_male)->result();
         $data_od_female = $this->db->query($query_od_female)->result();


        //end
       // print_r($data1);die();
        // for ($i=0; $i < count($data); $i++) { 
        //    $stname =explode("-",$data[$i]->StationName);
        //     if($data[$i]->LineConnected=='Footfall Male'){
        //         $result[0]['footfallcountMale']=$data1[0]->Consumption;
        //         $result[0]['TxnDate']=$data[$i]->TxnDate;
        //             $result[0]['StationName']=$stname[2];
        //             $result[0]['ToTime']=$data[$i]->ToTime;
        //     }else if($data[$i]->LineConnected=='Footfall Female'){
        //         $result[0]['footfallcountfemale']=$data_female[0]->Consumption;
        //         $result[0]['TxnDate']=$data[$i]->TxnDate;
        //         $result[0]['StationName']=$stname[2];
        //         $result[0]['ToTime']=$data[$i]->ToTime;
        //         }elseif($data[$i]->LineConnected=='Odour Male'){
        //             $result[0]['OdourMaleLeft']=$data[$i]->CurReading;
        //         }
        //         elseif($data[$i]->LineConnected=='Odour Female'){
        //             $result[0]['OdourMaleRight']=$data[$i]->CurReading;
        //         }        
        // } 
        $result[0]['footfallcountMale']=$data1[0]->Consumption;
        $result[0]['footfallcountfemale']=$data_female[0]->Consumption;
        $result[0]['OdourMaleLeft']=$data_od_male[0]->CurReading;
        $result[0]['OdourMaleRight']=$data_od_female[0]->CurReading;
        $result[0]['swiped']=$jani1+$jani2;
        $result[0]['verified']=$j1vfd+$j2vfd;
        if(isset($dataavg[0]->Consumption)){
        $result[0]['avg']=$dataavg[0]->Consumption;
        $result[0]['good']=$datagood[0]->Consumption;
        $result[0]['poor']=$datapoor[0]->Consumption;
        $result[0]['feedbacktotal']=$dataavg[0]->Consumption+$datagood[0]->Consumption+$datapoor[0]->Consumption;
        }else{
        $result[0]['avg']=0;
        $result[0]['good']=0;
        $result[0]['poor']=0;
        $result[0]['feedbacktotal']=0;
        }
    
        $queryFeedback = "SELECT id,ToiletName,HandTowel,Dustbin as DusDustbinFull,Toiletroll,FloorWetDry as FloorWet,HandSoap,Odour FROM supervisordata where ToiletName='Toilet03' order by id desc limit 1";
        
     $dataFeedback = $this->db->query($queryFeedback)->result(); 
   
    $result[1]['ToiletName']=$dataFeedback[0]->ToiletName;
    $result[1]['HandTowel']=$dataFeedback[0]->HandTowel;
    $result[1]['DustbinFull']=$dataFeedback[0]->DusDustbinFull;
    $result[1]['Toiletroll']=$dataFeedback[0]->Toiletroll;
    $result[1]['NoDustbin']=$dataFeedback[0]->DusDustbinFull;
    $result[1]['FloorDry']=$dataFeedback[0]->FloorWet;
    $result[1]['FloorWet']=$dataFeedback[0]->FloorWet;
    $result[1]['HandSoap']=$dataFeedback[0]->HandSoap;
    return $result;
    }
    
    function getBranches(){
		$this->db->select('');
        $this->db->from('demo_washroom_branches');     
        // $this->db->where('status',1);     
		$this->db->order_by('orderby','ASC');
        $res = $this->db->get()->result_array();  
		//echo $this->db->last_query();exit;     
        return $res;
	}
    function getBranch($stationid){
		$this->db->select('');
        $this->db->from('demo_washroom_branches');     
        $this->db->where('stationid',$stationid);     
		$this->db->order_by('orderby','ASC');
        $res = $this->db->get()->result_array();  
		//echo $this->db->last_query();exit;     
        return $res;
	}
    function getSodexoReport($data,$toiletId){
        $result=array();
       $date = "'".$data['date']."'";

       // $date = "'2020-11-04'";
        //echo $data['date'];die();LineConnected
        $jpdata=$this->getJpData($date);
        $result[2]['footfallcountfemale']=$jpdata[0]['footfallcountfemale'];
        $result[2]['footfallcountMale']=$jpdata[0]['footfallcountMale'];
        $result[2]['TxnDate']=$jpdata[0]['TxnDate'];
            $result[2]['StationName']=$jpdata[0]['StationName'];
            $result[2]['ToTime']=$jpdata[0]['ToTime'];
            $result[2]['OdourMaleLeft']=$jpdata[0]['OdourMaleLeft'];
            $result[2]['OdourMaleRight']=$jpdata[0]['OdourMaleRight'];
            $result[2]['avg']=$jpdata[0]['avg'];
        $result[2]['good']=$jpdata[0]['good'];
        $result[2]['poor']=$jpdata[0]['poor'];
        $result[2]['feedbacktotal']=$jpdata[0]['feedbacktotal'];
        $result[2]['swiped']=$jpdata[0]['swiped'];
        $result[2]['verified']=$jpdata[0]['verified'];
        //echo json_encode($jpdata[0]);die();
        $query1="SELECT round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Footfall Male' and TxnDate=".$date." AND   StationId='2022000112'";
        $querywaterlevel="SELECT TxnTime as ToTime,CurReading FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and LineConnected='Water Level' and TxnDate=".$date." order by TxnTime desc";
        $datawaterlevel = $this->db->query($querywaterlevel)->result_array();
        $waterlevel=$datawaterlevel[0]['CurReading'];
        
        $result[0]['level']=round($waterlevel/1000,2);
        $result[0]['percent']=round(($waterlevel/2000)*100);
        $result[2]['level']=$jpdata[0]['level'];
        $result[2]['percent']=$jpdata[0]['percent'];
        $query_female="SELECT round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Footfall Female' and TxnDate=".$date." AND   StationId='2022000112'";
        // echo $query_female;die();
        $queryj1swp="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and StationId='2022000112'";
        
        $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and LineConnected='Janitor_1' and Consumption>0 and StationId='2022000112'";
        
        
        $queryavg="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='FB Avg' and TxnDate=".$date." and StationId='2022000112'";
        $querygood="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='FB Good' and TxnDate=".$date." and StationId='2022000112'";
        $querypoor="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='FB Poor' and TxnDate=".$date." and StationId='2022000112'";
        
        $queryj1="SELECT CurReading,FromTime,ToTime FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and StationId='2022000112'";
        
        //echo $query1;die();
        $query="select id, LineConnected,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LineConnected,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.hardware_station_consumption_data_wr_collector where
         TxnDate=".$date."  and StationId='2022000112'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        $data1 = $this->db->query($query1)->result();
        $data_female = $this->db->query($query_female)->result();
        $data = $this->db->query($query)->result();
        $dataj1 = $this->db->query($queryj1)->result();
        
        $dataj1swp = $this->db->query($queryj1swp)->result();
        

        $j1data = $this->db->query($queryj1timings)->result();
       
        //print_r($dataj2times);die();
        $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            $dataj2times=array();
            

        $j1vfd=0;
        $j2vfd=0;
       
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
    
        $dataavg = $this->db->query($queryavg)->result();
        $datagood = $this->db->query($querygood)->result();
        $datapoor = $this->db->query($querypoor)->result();

        $query_od_male="SELECT CurReading FROM hardware_station_consumption_data_wr_collector where
        LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." ORDER by TxnTime desc";
        $query_od_female="SELECT CurReading FROM hardware_station_consumption_data_wr_collector where
        LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." ORDER by TxnTime desc";
         $data_od_male = $this->db->query($query_od_male)->result();
         $data_od_female = $this->db->query($query_od_female)->result();
        //end
    //    print_r($data_female);die();
        // for ($i=0; $i < count($data); $i++) { 
        //    $stname =explode("-",$data[$i]->StationName);
        //     if($data[$i]->LineConnected=='Footfall Male'){
        //         $result[0]['footfallcountMale']=$data1[0]->Consumption;
        //         $result[0]['TxnDate']=$data[$i]->TxnDate;
        //             $result[0]['StationName']=$stname[2];
        //             $result[0]['ToTime']=$data[$i]->ToTime;
        //     }else if($data[$i]->LineConnected=='Footfall Female'){
        //         $result[0]['footfallcountfemale']=$data_female[0]->Consumption;
        //         $result[0]['TxnDate']=$data[$i]->TxnDate;
        //         $result[0]['StationName']=$stname[2];
        //         $result[0]['ToTime']=$data[$i]->ToTime;
        //         }elseif($data[$i]->LineConnected=='Odour Male'){
        //             $result[0]['OdourMaleLeft']=$data[$i]->CurReading;
        //         }
        //         elseif($data[$i]->LineConnected=='Odour Female'){
        //             $result[0]['OdourMaleRight']=$data[$i]->CurReading;
        //         }        
        // } 
        $result[0]['footfallcountMale']=$data1[0]->Consumption;
        $result[0]['footfallcountfemale']=$data_female[0]->Consumption;
        $result[0]['OdourMaleLeft']=$data_od_male[0]->CurReading;
        $result[0]['OdourMaleRight']=$data_od_female[0]->CurReading;
        $result[0]['swiped']=$jani1;
        $result[0]['verified']=$j1vfd+$j2vfd;
        if(isset($dataavg[0]->Consumption)){
        $result[0]['avg']=$dataavg[0]->Consumption;
        $result[0]['good']=$datagood[0]->Consumption;
        $result[0]['poor']=$datapoor[0]->Consumption;
        $result[0]['feedbacktotal']=$dataavg[0]->Consumption+$datagood[0]->Consumption+$datapoor[0]->Consumption;
        }else{
        $result[0]['avg']=0;
        $result[0]['good']=0;
        $result[0]['poor']=0;
        $result[0]['feedbacktotal']=0;
        }
       
        $queryFeedback = "SELECT id,ToiletName,HandTowel,Dustbin as DusDustbinFull,Toiletroll,FloorWetDry as FloorWet,HandSoap,Odour FROM supervisordata where ToiletName='Toilet03' order by id desc limit 1";
        
     $dataFeedback = $this->db->query($queryFeedback)->result(); 
   
    $result[1]['ToiletName']=$dataFeedback[0]->ToiletName;
    $result[1]['HandTowel']=$dataFeedback[0]->HandTowel;
    $result[1]['DustbinFull']=$dataFeedback[0]->DusDustbinFull;
    $result[1]['Toiletroll']=$dataFeedback[0]->Toiletroll;
    $result[1]['NoDustbin']=$dataFeedback[0]->DusDustbinFull;
    $result[1]['FloorDry']=$dataFeedback[0]->FloorWet;
    $result[1]['FloorWet']=$dataFeedback[0]->FloorWet;
    $result[1]['HandSoap']=$dataFeedback[0]->HandSoap;
        return $result;

    }
    function getSodexoReport1($date,$location,$branch,$stationid,$table,$built_since,$managed_by,$operator_name,$operator_contact){
        $result=array();
        $result['location']=$branch." ,".$location;
        $result['branch']=$branch;
        $result['stationid']=$stationid;
        $result['table']=$table;
        $result['built_since']=$built_since;
        $result['managed_by']=$managed_by;
        $result['operator_name']=$operator_name;
        $result['operator_contact']=$operator_contact;
        
        $power_query="SELECT count(*) as count FROM $table where TxnDate='".$date."'";
        $powerdata = $this->db->query($power_query)->result_array();
        if($powerdata[0]['count']>0){
            $result['power_supply']="Yes";
        }else{
            $result['power_supply']="No";
        }
        
        $footfall_male_query="SELECT round(SUM(Consumption)/2) as Consumption FROM $table where LineConnected='Footfall Male' and TxnDate='".$date."' AND   StationId=$stationid";
        // echo $footfall_male_query;die();
        $footfall_female_query="SELECT round(SUM(Consumption)/2) as Consumption FROM $table where LineConnected='Footfall Female' and TxnDate='".$date."' AND   StationId=$stationid";
        if($stationid==2022000112 || $stationid==2022000113){
            $querywaterlevel="SELECT CurReading FROM $table where StationId=$stationid and LineConnected='Water Level' and TxnDate='".$date."' order by TxnTime desc limit 1";
            $datawaterlevel = $this->db->query($querywaterlevel)->result_array();
            $waterlevel=$datawaterlevel[0]['CurReading'];
            
            $result['level']=round($waterlevel/1000,2);
            $result['percent']=round(($waterlevel/2000)*100);
            if(is_null($datawaterlevel[0]['CurReading'])){
                
            
                $result['water_availability']="NO DATA";
            }else{
                $waterlevel=$datawaterlevel[0]['CurReading'];
                if($waterlevel){
                    $result['water_availability']="Yes";
                }else{
                    $result['water_availability']="No";
                }
            
                
            }
        }else{
            $querywaterlevel="SELECT CurReading FROM $table where StationId=$stationid and LineConnected='Water Level' and TxnDate='".$date."' order by TxnTime desc limit 1";
            $datawaterlevel = $this->db->query($querywaterlevel)->result_array();
            if(is_null($datawaterlevel[0]['CurReading'])){
                
            
                $result['water_availability']="Yes";
            }else{
                $waterlevel=$datawaterlevel[0]['CurReading'];
                if($waterlevel==1){
                    $result['water_availability']="Yes";
                }else{
                    $result['water_availability']="No";
                }
            
                
            }
            
            //$result['percent']=round(($waterlevel/2000)*100);
        }
        
        $queryavg="SELECT SUM(Consumption) as Consumption FROM $table where LineConnected='FB Avg' and TxnDate='".$date."' and StationId=$stationid";
        $querygood="SELECT SUM(Consumption) as Consumption FROM $table where LineConnected='FB Good' and TxnDate='".$date."' and StationId=$stationid";
        $querypoor="SELECT SUM(Consumption) as Consumption FROM $table where LineConnected='FB Poor' and TxnDate='".$date."' and StationId=$stationid";
        
        $footfall_male_data = $this->db->query($footfall_male_query)->result();
        $footfall_female_data = $this->db->query($footfall_female_query)->result();
       
        $dataavg = $this->db->query($queryavg)->result();
        $datagood = $this->db->query($querygood)->result();
        $datapoor = $this->db->query($querypoor)->result();

        $query_od_male="SELECT CurReading FROM $table where
        LineConnected='Odour Male' and StationId=$stationid and TxnDate='".$date."' ORDER by TxnTime desc";
        $query_od_female="SELECT CurReading FROM $table where
        LineConnected='Odour Female' and StationId=$stationid and TxnDate='".$date."' ORDER by TxnTime desc";
         $data_od_male = $this->db->query($query_od_male)->result();
         $data_od_female = $this->db->query($query_od_female)->result();
        if(is_null($footfall_male_data[0]->Consumption)){
            $result['footfallcountMale']="NO DATA";
        }else{
            $result['footfallcountMale']=$footfall_male_data[0]->Consumption;
        }
        if(is_null($footfall_female_data[0]->Consumption)){
            $result['footfallcountfemale']="NO DATA";
        }else{
            $result['footfallcountfemale']=$footfall_female_data[0]->Consumption;
        }

        if(is_null($data_od_male[0]->CurReading)){
            $result['OdourMaleLeft']="NO DATA";
        }else{
            if($data_od_male[0]->CurReading<50){
                $result['OdourMaleClean']="Clean";
            }else{
                $result['OdourMaleClean']="NotClean";
            }
            $result['OdourMaleLeft']=$data_od_male[0]->CurReading;
        }
        if(is_null($data_od_female[0]->CurReading)){
            $result['OdourMaleRight']="NO DATA";
        }else{
            if($data_od_female[0]->CurReading<50){
                $result['OdourFemaleClean']="Clean";
            }else{
                $result['OdourFemaleClean']="NotClean";
            }
            $result['OdourMaleRight']=$data_od_female[0]->CurReading;
        }
        
        if(isset($dataavg[0]->Consumption)){
        $result['avg']=$dataavg[0]->Consumption;
        $result['good']=$datagood[0]->Consumption;
        $result['poor']=$datapoor[0]->Consumption;
        $result['feedbacktotal']=$dataavg[0]->Consumption+$datagood[0]->Consumption+$datapoor[0]->Consumption;
        }else{
        $result['avg']=0;
        $result['good']=0;
        $result['poor']=0;
        $result['feedbacktotal']=0;
        }
        return $result;
    }
    function getSodexoReportMail($date){
        $result=array();

        
        $query1="SELECT round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Footfall Male' and TxnDate='".$date."' AND   StationId='2022000112'";

        $queryj1swp="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate='".$date."' and StationId='2022000112'";
        $queryj2swp="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate='".$date."' and StationId='2022000112'";

        $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate='".$date."' and LineConnected='Janitor_1' and Consumption>0 and StationId='2022000112'";
        $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate='".$date."' and LineConnected='Janitor_2' and Consumption>0 and StationId='2022000112'";
        
        $queryavg="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='FB Avg' and TxnDate='".$date."' and StationId='2022000112'";
        $querygood="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='FB Good' and TxnDate='".$date."' and StationId='2022000112'";
        $querypoor="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='FB Poor' and TxnDate='".$date."' and StationId='2022000112'";
        
        $queryj1="SELECT CurReading,FromTime,ToTime FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate='".$date."' and Consumption>0 and StationId='2022000112'";
        $queryj2="SELECT CurReading,FromTime,ToTime FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate='".$date."' and Consumption>0 and StationId='2022000112' ";
        //echo $query1;die();
        $query="select id, LineConnected,UomScale,TxnDate, FromTime, ToTime, Consumption,CurReading,StationName from (select id, LineConnected,TxnDate, FromTime, ToTime, Consumption ,UomScale,CurReading,StationName from protech_bms.hardware_station_consumption_data_wr_collector where
         TxnDate='".$date."'  and StationId='2022000112'  order by ToTime desc 
        ) as sub where id=sub.id group by sub.LineConnected";
        $data1 = $this->db->query($query1)->result();
        $data = $this->db->query($query)->result();
        $dataj1 = $this->db->query($queryj1)->result();
        $dataj2 = $this->db->query($queryj2)->result();
        $dataj1swp = $this->db->query($queryj1swp)->result();
        $dataj2swp = $this->db->query($queryj2swp)->result();

        $j1data = $this->db->query($queryj1timings)->result();
        $j2data = $this->db->query($queryj2timings)->result();
        //print_r($dataj2times);die();
        $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
        // print_r($dataj1times);die();
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }
//print_r($dataj2times);die();
        $j1vfd=0;
        $j2vfd=0;
        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=$dataj2times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=$dataj2times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$date."' and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
    
        $dataavg = $this->db->query($queryavg)->result();
        $datagood = $this->db->query($querygood)->result();
        $datapoor = $this->db->query($querypoor)->result();
        //end
       // print_r($data1);die();
        for ($i=0; $i < count($data); $i++) { 
           $stname =explode("-",$data[$i]->StationName);
            if($data[$i]->LineConnected=='Footfall Male'){
                $result[0]['footfallcountMale']=$data1[0]->Consumption;
                $result[0]['TxnDate']=$data[$i]->TxnDate;
                    $result[0]['StationName']=$stname[2];
                    $result[0]['ToTime']=$data[$i]->ToTime;
            }elseif($data[$i]->LineConnected=='Odour Male'){
                    $result[0]['OdourMaleLeft']=$data[$i]->CurReading;
                }
                elseif($data[$i]->LineConnected=='Odour Female'){
                    $result[0]['OdourMaleRight']=$data[$i]->CurReading;
                }        
        } 
        $result[0]['swiped']=$jani1+$jani2;
        $result[0]['verified']=$j1vfd+$j2vfd;
        if(isset($dataavg[0]->Consumption)){
        $result[0]['avg']=$dataavg[0]->Consumption;
        $result[0]['good']=$datagood[0]->Consumption;
        $result[0]['poor']=$datapoor[0]->Consumption;
        $result[0]['feedbacktotal']=$dataavg[0]->Consumption+$datagood[0]->Consumption+$datapoor[0]->Consumption;
        }else{
        $result[0]['avg']=0;
        $result[0]['good']=0;
        $result[0]['poor']=0;
        $result[0]['feedbacktotal']=0;
        }
    
       
        return $result;

    }
    function getJanitorDataLiveDashboard_jp($today){
 
        $fulldata=array();
        // $today="2020-11-04";
        //  $today=date("Y-m-d");

        $date = "'".$today."'";
        
        $totclen=0;
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            //echo $queryj1timings."<br>";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_jpnagar where LineConnected='Janitor_2' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Male' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_jpnagar where
                LineConnected='Odour Female' and StationId=2022000113 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1+$jani2;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           $totclen+=$jani1;

        }
        $ydataswipe = array();
        $ydataverify = array();
        $ydataswipej2 = array();
        $ydataverifyj2 = array();
        $xdata= array();

      for ($ja = 0; $ja < count($fulldata); $ja++) 
          { 
              $xd =explode(" ", $fulldata[$ja]['Time']);
             // echo  print_r($xd[2]);die();
              $xdata[$ja] =$xd[2];
              $ydataswipej2[$ja] = $fulldata[$ja]['janiSwiped']; 
              $ydataverifyj2[$ja] = $fulldata[$ja]['janiverified']; 
              
            
          }
          $fulldata['xdata']=$xdata;
          $fulldata['ydataswipej2']=$ydataswipej2;
          $fulldata['ydataverifyj2']=$ydataverifyj2;

        return $fulldata;

     
    
}

     function getJanitorDataLiveDashboard($today){
 
        $fulldata=array();
        // $today="2020-11-04";
         //$today=date("Y-m-d");

        $date = "'".$today."'";
        
        $totclen=0;
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            //echo $queryj1timings."<br>";
            //$queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            //$j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           $totclen+=$jani1;

        }
        $ydataswipe = array();
        $ydataverify = array();
        $ydataswipej2 = array();
        $ydataverifyj2 = array();
        $xdata= array();
// echo json_encode($fulldata);die();
      for ($ja = 0; $ja < count($fulldata); $ja++) 
          { 
              $xd =explode(" ", $fulldata[$ja]['Time']);
             // echo  print_r($xd[2]);die();
              $xdata[$ja] =$xd[2];
              $ydataswipej2[$ja] = $fulldata[$ja]['janiSwiped']; 
              $ydataverifyj2[$ja] = $fulldata[$ja]['janiverified']; 
              
            
          }
          $fulldata[]['xdata']=$xdata;
          $fulldata[]['ydataswipej2']=$ydataswipej2;
          $fulldata[]['ydataverifyj2']=$ydataverifyj2;

        return $fulldata;

     
    
}
 function getJanitorDataLiveDashboardAll($date){
 
        $fulldata=array();
        //$today="2020-02-26";
         $today=$date;

        $date = "'".$today."'";
        $tswipe=0;
        $tverify=0;
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            //echo $queryj1timings."<br>";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1+$jani2;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           $tswipe+=$jani1;
            $tverify+=$j1vfd;

        }
        $fulldata[24]['tswipe']=$tswipe;
        $fulldata[24]['tverify']=$tverify;
        // echo json_encode($fulldata);die();

        return $fulldata;

     
    
}
function getJanitorNormaReport($data){
    if($data['location']==1){
        $table="hardware_station_consumption_data_wr_collector";
        $stationid=2022000112;
        }else{
        $table="hardware_station_consumption_data_wr_jpnagar";
        $stationid=2022000113;
        }
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    

    $fulldata=array();
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and TxnTime >=  '".$from."' AND TxnTime< '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
                $k=0;
                for ($i1=0; $i1 < count($j1data); $i1++) { 
                    for ($j=$i1+1; $j <=($i1+1); $j++) { 
                        
                        $ts1 = strtotime($j1data[$i1]->ToTime);
                        $ts2 = strtotime($j1data[$j]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                            $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                            $dataj1times[$k]->Consumption=1;
                            $k++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
                 if (count($dataj1times)>0) {
                    $jani1=count($dataj1times);
                 }else{
                    $jani1=0;
                 }
                }else{
                    $jani1=0;
                }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
                $k1=0;
                for ($i2=0; $i2 < count($j2data); $i2++) { 
                    for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                        
                        $ts1 = strtotime($j2data[$i2]->ToTime);
                        $ts2 = strtotime($j2data[$j1]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                            $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                            $dataj2times[$k1]->Consumption=1;
                            $k1++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
             if (count($dataj2times)>0) {
                $jani2=count($dataj2times);
             }else{
                $jani2=0;
             }
            }else{
                $jani2=0;
             }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['jani1Swiped']=$jani1;
            $fulldata[$i]['jani2Swiped']=$jani2;
            $fulldata[$i]['jani1verified']=$j1vfd;
             $fulldata[$i]['jani2verified']=$j2vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
        return $fulldata;

    }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
               // print_r($datesarray);die();
                for ($kt=0; $kt < count($datesarray); $kt++) {
                    $jani1sw=0;
                $jani1ver=0;

                     $date = "'".$datesarray[$kt]."'";
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and TxnTime >=  '".$from."' AND TxnTime< '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
                $k=0;
                for ($i1=0; $i1 < count($j1data); $i1++) { 
                    for ($j=$i1+1; $j <=($i1+1); $j++) { 
                        
                        $ts1 = strtotime($j1data[$i1]->ToTime);
                        $ts2 = strtotime($j1data[$j]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                            $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                            $dataj1times[$k]->Consumption=1;
                            $k++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
                 if (count($dataj1times)>0) {
                    $jani1=count($dataj1times);
                 }else{
                    $jani1=0;
                 }
                }else{
                    $jani1=0;
                }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
                        $dataj2times=array();
                        if(count($j2data)>0){
                            
                            $k1=0;
                            for ($i2=0; $i2 < count($j2data); $i2++) { 
                                for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                                    
                                    $ts1 = strtotime($j2data[$i2]->ToTime);
                                    $ts2 = strtotime($j2data[$j1]->FromTime);     
                                    $seconds_diff = $ts2 - $ts1; 
                                    if($seconds_diff!=0) {
                                        
                                        $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                                        $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                                        $dataj2times[$k1]->Consumption=1;
                                        $k1++;
                                    } else if($seconds_diff==0){
                                        
                                    }                         
                                   
                                    
                                }
                             }
                         if (count($dataj2times)>0) {
                            $jani2=count($dataj2times);
                         }else{
                            $jani2=0;
                         }
                        }else{
                            $jani2=0;
                         }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
                    $j1vfd=0;
                    $j2vfd=0;

                    if(count($dataj2times)>0){
                        for ($janit=0; $janit < count($dataj2times); $janit++) { 
                           $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                            $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                             $qleftresult = $this->db->query($qleft)->result();
                             $qrightresult = $this->db->query($qright)->result();
                            if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                                $j2vfd+=1;

                            }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                                $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                            $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                             $qleftresultin = $this->db->query($qleftin)->result();
                             $qrightresultin = $this->db->query($qrightin)->result();
                            if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                            }else{
                                $j2vfd+=1;
                            }
                            }else{

                            }
                        }

                    }else{
                        $j2vfd=0;
                    }
                    //janitor1
                    if(count($dataj1times)>0){
                        for ($janit=0; $janit < count($dataj1times); $janit++) { 
                           $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                            $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                             $qleftresult = $this->db->query($qleft)->result();
                             $qrightresult = $this->db->query($qright)->result();
                            if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                                $j1vfd+=1;

                            }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                                $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                            $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                             $qleftresultin = $this->db->query($qleftin)->result();
                             $qrightresultin = $this->db->query($qrightin)->result();
                            if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                            }else{
                                $j1vfd+=1;
                            }
                            }else{

                            }
                        }

                            }else{
                                $j1vfd=0;
                            }
        //j1 end

            
            $jani1sw+=$jani1;
            $jani1ver+=$j1vfd;

           
           

        }
             $fulldata[$kt]['Time']=$datesarray[$kt];
             $fulldata[$kt]['jani1Swiped']=$jani1sw;
             $fulldata[$kt]['jani2Swiped']=0;
             $fulldata[$kt]['jani1verified']=$jani1ver;
             $fulldata[$kt]['jani2verified']=0;


                }
                 return $fulldata;
    }
     
    
}
function getJanitorNormaReport_jp($data){
    if($data['location']==1){
        $table="hardware_station_consumption_data_wr_collector";
        $stationid=2022000112;
        }else{
        $table="hardware_station_consumption_data_wr_jpnagar";
        $stationid=2022000113;
        }
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    

    $fulldata=array();
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            //$queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and TxnTime >=  '".$from."' AND TxnTime< '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            //$j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
                $k=0;
                for ($i1=0; $i1 < count($j1data); $i1++) { 
                    for ($j=$i1+1; $j <=($i1+1); $j++) { 
                        
                        $ts1 = strtotime($j1data[$i1]->ToTime);
                        $ts2 = strtotime($j1data[$j]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                            $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                            $dataj1times[$k]->Consumption=1;
                            $k++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
                 if (count($dataj1times)>0) {
                    $jani1=count($dataj1times);
                 }else{
                    $jani1=0;
                 }
                }else{
                    $jani1=0;
                }

            
         //echo $jani1;die();
        //endswiped
        

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

       
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['jani1Swiped']=$jani1;
            //$fulldata[$i]['jani2Swiped']=$jani2;
            $fulldata[$i]['jani1verified']=$j1vfd;
            // $fulldata[$i]['jani2verified']=$j2vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
        return $fulldata;

    }else{
                $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                
               // print_r($datesarray);die();
                for ($kt=0; $kt < count($datesarray); $kt++) {
                    $jani1sw=0;
                $jani1ver=0;

                     $date = "'".$datesarray[$kt]."'";
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and TxnTime >=  '".$from."' AND TxnTime< '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
           // $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
                $k=0;
                for ($i1=0; $i1 < count($j1data); $i1++) { 
                    for ($j=$i1+1; $j <=($i1+1); $j++) { 
                        
                        $ts1 = strtotime($j1data[$i1]->ToTime);
                        $ts2 = strtotime($j1data[$j]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                            $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                            $dataj1times[$k]->Consumption=1;
                            $k++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
                 if (count($dataj1times)>0) {
                    $jani1=count($dataj1times);
                 }else{
                    $jani1=0;
                 }
                }else{
                    $jani1=0;
                }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
                       

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
                    $j1vfd=0;
                    $j2vfd=0;

                   
                    //janitor1
                    if(count($dataj1times)>0){
                        for ($janit=0; $janit < count($dataj1times); $janit++) { 
                           $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                            $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                             $qleftresult = $this->db->query($qleft)->result();
                             $qrightresult = $this->db->query($qright)->result();
                            if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                                $j1vfd+=1;

                            }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                                $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                            $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                            LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                             $qleftresultin = $this->db->query($qleftin)->result();
                             $qrightresultin = $this->db->query($qrightin)->result();
                            if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                            }else{
                                $j1vfd+=1;
                            }
                            }else{

                            }
                        }

                            }else{
                                $j1vfd=0;
                            }
        //j1 end

            
            $jani1sw+=$jani1;
            $jani1ver+=$j1vfd;

           
           

        }
             $fulldata[$kt]['Time']=$datesarray[$kt];
             $fulldata[$kt]['jani1Swiped']=$jani1sw;
             //$fulldata[$kt]['jani2Swiped']=0;
             $fulldata[$kt]['jani1verified']=$jani1ver;
             //$fulldata[$kt]['jani2verified']=0;


                }
                 return $fulldata;
    }
     
    
}
function getJanitorConsoData($date,$loc){
    if($loc==1){
        $table="hardware_station_consumption_data_wr_collector";
        $stationid=2022000112;
        }else{
        $table="hardware_station_consumption_data_wr_jpnagar";
        $stationid=2022000113;
        }
        $fulldata=array();
        //$today="2020-02-26";
         $today=$date;

        $date = "'".$today."'";
        $totclen=0;
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM $table where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            //echo $queryj1timings."<br>";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM $table where LineConnected='Janitor_2' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM $table where
                LineConnected='Odour Male' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM $table where
                LineConnected='Odour Female' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM $table where
                LineConnected='Odour Male' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM $table where
                LineConnected='Odour Female' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM $table where
                LineConnected='Odour Male' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM $table where
                LineConnected='Odour Female' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM $table where
                LineConnected='Odour Male' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM $table where
                LineConnected='Odour Female' and StationId=$stationid and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1+$jani2;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           $totclen+=$jani1;

        }
        $ydataswipe = array();
        $ydataverify = array();
        $ydataswipej2 = array();
        $ydataverifyj2 = array();
        $xdata= array();

      for ($ja = 0; $ja < count($fulldata); $ja++) 
          { 
              $xd =explode(" ", $fulldata[$ja]['Time']);
             // echo  print_r($xd[2]);die();
              $xdata[$ja] =$xd[2];
              $ydataswipej2[$ja] = $fulldata[$ja]['janiSwiped']; 
              $ydataverifyj2[$ja] = $fulldata[$ja]['janiverified']; 
              
            
          }
          $fulldata['xdata']=$xdata;
          $fulldata['ydataswipej2']=$ydataswipej2;
          $fulldata['ydataverifyj2']=$ydataverifyj2;

        return $fulldata;

     
    
}
function getJanitorDataFromDb($date){
    $dataquery="select xdata,ydataswipej2,ydataverifyj2 from JanitorTotalData where Date='".$date."' and StationId=2022000112";
       $data = $this->db->query($dataquery)->result();
       if (count($data)>0) {
          $fulldata['xdata']=json_decode($data[0]->xdata);
          $fulldata['ydataswipej2']=json_decode($data[0]->ydataswipej2);
          $fulldata['ydataverifyj2']=json_decode($data[0]->ydataverifyj2);
          $fulldata['jan']=1;
         // echo json_encode($sam);

        return $fulldata;
       }else{
          $fulldata['jan']=0;
         // echo json_encode($sam);

        return $fulldata;
       }
}
function getOdourDataFromDb($date,$loc){
    if($loc==1){
        $table="hardware_station_consumption_data_wr_collector";
        $stationid=2022000112;
        }else{
        $table="hardware_station_consumption_data_wr_jpnagar";
        $stationid=2022000113;
        }
    $dataquery="select leftxdata,leftydata,rightxdata,rightydata  from odourtotaldata where Date='".$date."' and StationId=$stationid";
    //echo $dataquery;
       $data = $this->db->query($dataquery)->result();
       if (count($data)>0) {
          $fulldata['leftxdata']=json_decode($data[0]->leftxdata);
          $fulldata['leftydata']=json_decode($data[0]->leftydata);
          $fulldata['rightxdata']=json_decode($data[0]->rightxdata);
          $fulldata['rightydata']=json_decode($data[0]->rightydata);
          $fulldata['odr']=1;
         // echo json_encode($sam);

        return $fulldata;
       }else{
          $fulldata['odr']=0;
         // echo json_encode($sam);

        return $fulldata;
       }
}
function getFootfallDataFromDb($date,$loc){
    if($loc==1){
        $table="hardware_station_consumption_data_wr_collector";
        $stationid=2022000112;
        }else{
        $table="hardware_station_consumption_data_wr_jpnagar";
        $stationid=2022000113;
        }
    $dataquery="select xdata,ydata  from footfalltotaldata where Date='".$date."' and StationId=$stationid";
    //echo $dataquery;
       $data = $this->db->query($dataquery)->result();
       if (count($data)>0) {
          $fulldata['xdata']=json_decode($data[0]->xdata);
          $fulldata['ydata']=json_decode($data[0]->ydata);
          $fulldata['ydata_female']=json_decode($data[0]->ydata_female);
          
          $fulldata['ffal']=1;
         // echo json_encode($sam);

        return $fulldata;
       }else{
         $fulldata['ffal']=0;
         // echo json_encode($sam);

        return $fulldata;
       }

}
function getJanitorDataLiveDashboardreport($date){

     $tdate=date("Y-m-d");
                    if($date>=$tdate){
                        $fulldata=array();
        //$today="2020-02-26";
         $today=$date;

        $date = "'".$today."'";
        
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

          
           
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            //echo $queryj1timings."<br>";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1+$jani2;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
     
        $ydataswipe = array();
        $ydataverify = array();
        $ydataswipej2 = array();
        $ydataverifyj2 = array();
        $xdata= array();

      for ($ja = 0; $ja < count($fulldata); $ja++) 
          { 
              $xd =explode(" ", $fulldata[$ja]['Time']);
             // echo  print_r($xd[2]);die();
              $xdata[$ja] =$xd[2];
              $ydataswipej2[$ja] = $fulldata[$ja]['janiSwiped']; 
              $ydataverifyj2[$ja] = $fulldata[$ja]['janiverified']; 
              
            
          }
          $fulldata['xdata']=$xdata;
          $fulldata['ydataswipej2']=$ydataswipej2;
          $fulldata['ydataverifyj2']=$ydataverifyj2;
         // echo json_encode($sam);
          // $insQuery="INSERT INTO JanitorTotalData(`StationId`,`xdata`,`ydataswipej2`,`ydataverifyj2`,`Date`)VALUES(2022000112,'".$fulldata['xdata']."',".$fulldata['ydataswipej2'].",".$fulldata['ydataverifyj2'].",'".$date."')";
                     //$this->db->query($insQuery);


        return $fulldata;

                    }else{
                        $fulldata=array();
        //$today="2020-02-26";
         $today=$date;

        $date = "'".$today."'";
        
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and FromTime BETWEEN '".$from."' AND '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and FromTime BETWEEN '".$from."' AND '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
        $k=0;
        for ($i1=0; $i1 < count($j1data); $i1++) { 
            for ($j=$i1+1; $j <=($i1+1); $j++) { 
                
                $ts1 = strtotime($j1data[$i1]->ToTime);
                $ts2 = strtotime($j1data[$j]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                    $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                    $dataj1times[$k]->Consumption=1;
                    $k++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj1times)>0) {
            $jani1=count($dataj1times);
         }else{
            $jani1=0;
         }
            }else{
                $jani1=0;
            }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
        $k1=0;
        for ($i2=0; $i2 < count($j2data); $i2++) { 
            for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                
                $ts1 = strtotime($j2data[$i2]->ToTime);
                $ts2 = strtotime($j2data[$j1]->FromTime);     
                $seconds_diff = $ts2 - $ts1; 
                if($seconds_diff!=0) {
                    
                    $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                    $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                    $dataj2times[$k1]->Consumption=1;
                    $k1++;
                } else if($seconds_diff==0){
                    
                }                         
               
                
            }
         }
         if (count($dataj2times)>0) {
            $jani2=count($dataj2times);
         }else{
            $jani2=0;
         }
            }else{
    $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['janiSwiped']=$jani1+$jani2;            
             $fulldata[$i]['janiverified']=$j2vfd+$j1vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
     
        $ydataswipe = array();
        $ydataverify = array();
        $ydataswipej2 = array();
        $ydataverifyj2 = array();
        $xdata= array();

      for ($ja = 0; $ja < count($fulldata); $ja++) 
          { 
              $xd =explode(" ", $fulldata[$ja]['Time']);
             // echo  print_r($xd[2]);die();
              $xdata[$ja] =$xd[2];
              $ydataswipej2[$ja] = $fulldata[$ja]['janiSwiped']; 
              $ydataverifyj2[$ja] = $fulldata[$ja]['janiverified']; 
              
            
          }
          $fulldata['xdata']=$xdata;
          $fulldata['ydataswipej2']=$ydataswipej2;
          $fulldata['ydataverifyj2']=$ydataverifyj2;
         // echo json_encode($sam);
        $insQuery="INSERT INTO JanitorTotalData(`StationId`,`xdata`,`ydataswipej2`,`ydataverifyj2`,`Date`)VALUES(2022000112,'".json_encode($fulldata['xdata'])."','".json_encode($fulldata['ydataswipej2'])."','".json_encode($fulldata['ydataverifyj2'])."',".$date.")";
           //echo $insQuery;
          $this->db->query($insQuery);


        return $fulldata;

                    }
 
        

     
    
}
    function getJanitorData($data){
 // print_r($data);die();
//$date = "'2019-12-09'";
    $fromdate = "'".$data['fromdate']."'";
    $todate = "'".$data['todate']."'";
    

    $fulldata=array();
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

          
            $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate=".$date." and Consumption>0 and TxnTime >= '".$from."' AND TxnTime < '".$to."'";
            $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where TxnDate=".$date." and LineConnected='Janitor_2' and Consumption>0 and TxnTime >=  '".$from."' AND TxnTime< '".$to."'";
            $j1data = $this->db->query($queryj1timings)->result();
            $j2data = $this->db->query($queryj2timings)->result();
            //jani1swiped
            $dataj1times=array();
             if(count($j1data)>0){
                 
                $k=0;
                for ($i1=0; $i1 < count($j1data); $i1++) { 
                    for ($j=$i1+1; $j <=($i1+1); $j++) { 
                        
                        $ts1 = strtotime($j1data[$i1]->ToTime);
                        $ts2 = strtotime($j1data[$j]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj1times[$k]->FromTime=$j1data[$i1]->FromTime;
                            $dataj1times[$k]->ToTime=$j1data[$i1]->ToTime;
                            $dataj1times[$k]->Consumption=1;
                            $k++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
                 if (count($dataj1times)>0) {
                    $jani1=count($dataj1times);
                 }else{
                    $jani1=0;
                 }
                }else{
                    $jani1=0;
                }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            $dataj2times=array();
            if(count($j2data)>0){
                
                $k1=0;
                for ($i2=0; $i2 < count($j2data); $i2++) { 
                    for ($j1=$i2+1; $j1 <=($i2+1); $j1++) { 
                        
                        $ts1 = strtotime($j2data[$i2]->ToTime);
                        $ts2 = strtotime($j2data[$j1]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj2times[$k1]->FromTime=$j2data[$i2]->FromTime;
                            $dataj2times[$k1]->ToTime=$j2data[$i2]->ToTime;
                            $dataj2times[$k1]->Consumption=1;
                            $k1++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
             if (count($dataj2times)>0) {
                $jani2=count($dataj2times);
             }else{
                $jani2=0;
             }
            }else{
                $jani2=0;
             }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;

        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j2vfd=0;
        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=1;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate=".$date." and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=1;
                }
                }else{

                }
            }

        }else{
            $j1vfd=0;
        }
        //j1 end

            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['jani1Swiped']=$jani1;
            $fulldata[$i]['jani2Swiped']=$jani2;
            $fulldata[$i]['jani1verified']=$j1vfd;
             $fulldata[$i]['jani2verified']=$j2vfd;
            //$fulldata[$i]['jani2']=$footfall;
            //$fulldata[$i]['Date']=$date1;

           
           

        }
        return $fulldata;

    } 
    else{
        // echo "string";die();
               $date_from = strtotime($data['fromdate']); 
                $date_to = strtotime($data['todate']); 
                $datesarray=array();
                for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
                    array_push($datesarray, date("Y-m-d",$i1));
                    
                }
                for ($k=0; $k < count($datesarray); $k++) { 

                
                    $queryj1timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_1' and TxnDate='".$datesarray[$k]."'  and Consumption>0 ";
                    $queryj2timings="SELECT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector where LineConnected='Janitor_2' and TxnDate='".$datesarray[$k]."' and  Consumption>0 ";
                    $j1data = $this->db->query($queryj1timings)->result();
                    $j2data = $this->db->query($queryj2timings)->result();
            
                if(count($j1data)>0){
                 $dataj1times=array();
                    $k=0;
                    for ($i=0; $i < count($j1data); $i++) { 
                        for ($j=$i+1; $j <=($i+1); $j++) { 
                            
                            $ts1 = strtotime($j1data[$i]->ToTime);
                            $ts2 = strtotime($j1data[$j]->FromTime);     
                            $seconds_diff = $ts2 - $ts1; 
                            if($seconds_diff!=0) {
                                
                                $dataj1times[$k]->FromTime=$j1data[$i]->FromTime;
                                $dataj1times[$k]->ToTime=$j1data[$i]->ToTime;
                                $dataj1times[$k]->Consumption=1;
                                $k++;
                            } else if($seconds_diff==0){
                                
                            }                         
                           
                            
                        }
                     }
                     if (count($dataj1times)>0) {
                        $jani1=count($dataj1times);
                     }else{
                        $jani1=0;
                     }
                }else{
                    $jani1=0;
                }

            
         //echo $jani1;die();
        //endswiped
         //jani2swiped
            if(count($j2data)>0){
                $dataj2times=array();
                 $k1=0;
                for ($i=0; $i < count($j2data); $i++) { 
                    for ($j=$i+1; $j <=($i+1); $j++) { 
                        
                        $ts1 = strtotime($j2data[$i]->ToTime);
                        $ts2 = strtotime($j2data[$j]->FromTime);     
                        $seconds_diff = $ts2 - $ts1; 
                        if($seconds_diff!=0) {
                            
                            $dataj2times[$k1]->FromTime=$j2data[$i]->FromTime;
                            $dataj2times[$k1]->ToTime=$j2data[$i]->ToTime;
                            $dataj2times[$k1]->Consumption=1;
                            $k1++;
                        } else if($seconds_diff==0){
                            
                        }                         
                       
                        
                    }
                 }
                     if (count($dataj2times)>0) {
                        $jani2=count($dataj2times);
                     }else{
                        $jani2=0;
                     }
            }else{
                $jani2=0;
            }

             
     // echo  count($dataj1times);die();  
        //endswiped
            //janitor2
        $j1vfd=0;
        $j2vfd=0;
        if(count($dataj2times)>0){
            for ($janit=0; $janit < count($dataj2times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->FromTime."' and ToTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j2vfd+=$dataj2times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj2times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j2vfd+=$dataj2times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //janitor1
        if(count($dataj1times)>0){
            for ($janit=0; $janit < count($dataj1times); $janit++) { 
               $qleft="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                $qright="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->FromTime."' and ToTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresult = $this->db->query($qleft)->result();
                 $qrightresult = $this->db->query($qright)->result();
                if($qleftresult[0]->Consumption<20 || $qrightresult[0]->Consumption<20){
                    $j1vfd+=$dataj1times[$janit]->Consumption;

                }else if(($qleftresult[0]->Consumption>20 || $qleftresult[0]->Consumption>20) && ($qleftresult[0]->Consumption<55||$qleftresult[0]->Consumption<55)){
                    $qleftin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Male' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->ToTime."' ";
                $qrightin="SELECT Consumption FROM hardware_station_consumption_data_wr_collector where
                LineConnected='Odour Female' and StationId=2022000112 and TxnDate='".$datesarray[$k]."' and  FromTime='".$dataj1times[$janit]->ToTime."'";
                 $qleftresultin = $this->db->query($qleftin)->result();
                 $qrightresultin = $this->db->query($qrightin)->result();
                if($qleftresult[0]->Consumption<=$qleftresultin[0]->Consumption||$qrightresult[0]->Consumption<=$qrightresultin[0]->Consumption){

                }else{
                    $j1vfd+=$dataj1times[$janit]->Consumption;
                }
                }else{

                }
            }

        }else{

        }
        //j1 end
                    $fulldata[$k]['Time']=$datesarray[$k];
                    $fulldata[$k]['jani1Swiped']=$jani1;
                    $fulldata[$k]['jani2Swiped']=$jani2;
                    $fulldata[$k]['jani1verified']=$j1vfd;
                     $fulldata[$k]['jani2verified']=$j2vfd;

                   
            

                }
                 return $fulldata;
    }
}


function getFeedbackDataDayLive_jp($today){

   

    $fulldata=array();
  
    // $today=date("Y-m-d");
    //    $today="2020-11-04";
        $date = "'".$today."'";
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
 
            $querygood="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar  where LineConnected='FB Good' and TxnDate=".$date."   and TxnTime BETWEEN '".$from."' AND '".$to."'";
            $queryavg="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar  where LineConnected='FB Avg' and TxnDate=".$date."   and TxnTime BETWEEN '".$from."' AND '".$to."'";
             $querypoor="SELECT SUM(Consumption) as Consumption FROM hardware_station_consumption_data_wr_jpnagar  where LineConnected='FB Poor' and TxnDate=".$date."   and TxnTime BETWEEN '".$from."' AND '".$to."'"; 
            // echo $querygood;die();
            $gooddata = $this->db->query($querygood)->result();
            $avgdata = $this->db->query($queryavg)->result();
            $poordata = $this->db->query($querypoor)->result();
          //  echo $gooddata[0]->Consumption;
            //$fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['Time']=$to;
            $fulldata[$i]['good']=$gooddata[0]->Consumption;
            $fulldata[$i]['avg']=$avgdata[0]->Consumption;
            $fulldata[$i]['poor']=$poordata[0]->Consumption;
            
           

        }

        return $fulldata;

     
    
}

    
    function getAndUpdateFeedbackData($data){

         $ToiletName = "Toilet02";

            $this->db->where("ToiletName",$ToiletName);
            $this->db->update("ToiletData",$data);    
          // print_r($this->db->last_query()); 
            if($this->db->affected_rows() >=0){
              return true; //add your code here
            }else{
              return false; //add your your code here
            }

    }
    function getAndUpdateSupervisorData($data){

          //print_r($data);die();
             if(count($data)>0){
            $row=$this->db->insert("SupervisorData",$data);
            return $row;

        }else{
            return false;

        }

    }
    function updateJanitorData($data){
         if(count($data)>0){
            $row=$this->db->insert("JanitorToiletData",$data);
            return $row;

        }else{
            return false;

        }

    }
    function getSupervisorData($data,$tname){
        $date=$data['fromdate'];
        $querySup="SELECT * FROM supervisordata  where CreatedDate='".$date."'";
        $dataSup = $this->db->query($querySup)->result();
        //print_r($dataSup);die();
        
        $resultarray=array();
        for ($i=0; $i < count($dataSup); $i++) { 
           
            $resultarray[$i]['HandTowel']=$dataSup[$i]->HandTowel;
            $resultarray[$i]['Toiletroll']=$dataSup[$i]->Toiletroll;
            $resultarray[$i]['Dustbin']=$dataSup[$i]->Dustbin;
            $resultarray[$i]['FloorWetDry']=$dataSup[$i]->FloorWetDry;
            $resultarray[$i]['HandSoap']=$dataSup[$i]->HandSoap;
            $resultarray[$i]['Odour']=$dataSup[$i]->Odour;
            $resultarray[$i]['Time']=$dataSup[$i]->Time;
             $resultarray[$i]['Feedback']=$dataSup[$i]->Feedback;
           
        }
        return $resultarray;
    }
    function getFeedbackDataObject($toiletId){
         $query = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap FROM ToiletData where ToiletId='2022000112' and ToiletName='".$toiletId."'";
     $data = $this->db->query($query)->result();
     $rslt=array();
    $rslt[0]['ToiletName']=$data[0]->ToiletName;
    $rslt[0]['HandTowel']=$data[0]->HandTowel;
    $rslt[0]['DustbinFull']=$data[0]->DustbinFull;
    $rslt[0]['Toiletroll']=$data[0]->Toiletroll;
    $rslt[0]['NoDustbin']=$data[0]->NoDustbin;
    $rslt[0]['FloorDry']=$data[0]->FloorDry;
    $rslt[0]['FloorWet']=$data[0]->FloorWet;
    $rslt[0]['HandSoap']=$data[0]->HandSoap;
     return $rslt; 
    }
    function getFeedbackData($toiletId){
       
     $query = "SELECT ToiletName,HandTowel,DustbinFull,Toiletroll,NoDustbin,FloorDry,FloorWet,HandSoap FROM ToiletData where ToiletId='2022000112' and ToiletName='".$toiletId."'";
     $data = $this->db->query($query)->result();
     //print_r($data[0]->ToiletName);
    $rslt=array();
    $rslt['ToiletName']=$data[0]->ToiletName;
    $rslt['HandTowel']=$data[0]->HandTowel;
    $rslt['DustbinFull']=$data[0]->DustbinFull;
    $rslt['Toiletroll']=$data[0]->Toiletroll;
    $rslt['NoDustbin']=$data[0]->NoDustbin;
    $rslt['FloorDry']=$data[0]->FloorDry;
    $rslt['FloorWet']=$data[0]->FloorWet;
    $rslt['HandSoap']=$data[0]->HandSoap;
     return $rslt; 

    }
    function getsodexoDataWithDate($date,$stationId){

      $resQuery="SELECT * FROM SodexoFootFall where StationId=2022000112 and Date='".$date."'";
      //echo $resQuery;die();
      $data = $this->db->query($resQuery)->result();
      $fulldata=array();

      for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->Timings;
            $fulldata[$i]['footfall']=$data[$i]->FootFallCount;
            $fulldata[$i]['Date']=$data[$i]->Date;
         
      }
        return   $fulldata;  

    }
    
    function getsodexoDataLive_jp($date){


        $date = "'".$date."'";
        $date1 = $date;

        //  $date = "'2020-11-04'";
        //  $date1 = "2020-11-04";
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

            $query="select round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where StationId=2022000113 and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
            $query_female="select round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_jpnagar where StationId=2022000113 and TxnDate=".$date." and LineConnected='Footfall Female' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
        //    echo $query_female;die();
            $data = $this->db->query($query)->result();
            $data_female = $this->db->query($query_female)->result();
            //echo count($data);
            if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
            }else{
                $footfall="0";
            }
            if(isset($data_female[0]->Consumption)){
                $footfall_female=$data_female[0]->Consumption;
            }else{
                $footfall_female="0";
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['TxnTime']=$from;
            $fulldata[$i]['footfall']=(int)$footfall;
            $fulldata[$i]['footfall_female']=(int)$footfall_female;
            $fulldata[$i]['Date']=$date1;

           // $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2022000112,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",'".$fulldata[$i]['Date']."')";
            // $this->db->query($insQuery);
           

        }
        $hoursxaxisarray = array();
        $footfallyaxisarray = array();
        $footfallyaxisarray_female = array();
        

      for ($fl = 0; $fl < count($fulldata); $fl++) 
          { 
              
              $hoursxaxisarray[$fl] = $fulldata[$fl]['TxnTime']; 
              $footfallyaxisarray[$fl] = $fulldata[$fl]['footfall'];
              $footfallyaxisarray_female[$fl] = $fulldata[$fl]['footfall_female']; 
              
            
          }
         
          $fulldata1['hoursxaxisarray']=$hoursxaxisarray;
          $fulldata1['footfallyaxisarray']=$footfallyaxisarray;
          $fulldata1['footfallyaxisarray_female']=$footfallyaxisarray_female;
         // echo json_encode($sam);

        return $fulldata1;
        
    }
    
    function getOdourRightLevelsMail($date){
         
         $result=array();
         $query60to120="SELECT CurReading,FromTime FROM hardware_station_consumption_data_wr_collector where TxnDate='".$date."' and StationId=2022000112 and LineConnected='Odour Female' and CurReading BETWEEN 60 AND 120 order by FromTime";
         $query120="SELECT CurReading,FromTime FROM hardware_station_consumption_data_wr_collector where TxnDate='".$date."' and StationId=2022000112 and LineConnected='Odour Female' and CurReading >120 order by FromTime";
         $data60to120 = $this->db->query($query60to120)->result();
         $data120 = $this->db->query($query120)->result();
         $result[0]=$data60to120;
         $result[1]=$data120;
         return $result;

    }
    function getOdourLeftLevelsMail($date){
        
         $result=array();
         $query60to120="SELECT CurReading,FromTime FROM hardware_station_consumption_data_wr_collector where TxnDate='".$date."' and StationId=2022000112 and LineConnected='Odour Male' and CurReading BETWEEN 60 AND 120 order by FromTime";
         $query120="SELECT CurReading,FromTime FROM hardware_station_consumption_data_wr_collector where TxnDate='".$date."' and StationId=2022000112 and LineConnected='Odour Male' and CurReading >120 order by FromTime";
         $data60to120 = $this->db->query($query60to120)->result();
         $data120 = $this->db->query($query120)->result();
         $result[0]=$data60to120;
         $result[1]=$data120;
         return $result;

    }
    function getsodexoDataMail($date){


        $resultfoot=array();
        $resultDataFoot=array();
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

            $query="select round(SUM(Consumption)/2) as Consumption FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and TxnDate='".$date."' and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
           // echo $query;die();
            $data = $this->db->query($query)->result();
            //echo count($data);
            if(isset($data[0]->Consumption)){
                $footfall=$data[0]->Consumption;
            }else{
                $footfall=0;
            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=(int)$footfall;
            $fulldata[$i]['Date']=$date;
            if($footfall>0){
                 array_push($resultfoot, $footfall);
            }
           
         
           

        }
        $minvalue=min($resultfoot);
        $maxvalue=max($resultfoot);
       
        for ($i=0; $i < count($fulldata); $i++) { 
            if($fulldata[$i]['footfall']==$minvalue){
                $resultDataFoot[0]['min']=$minvalue;
                $resultDataFoot[0]['Time']=$fulldata[$i]['Time'];
            }
            if($fulldata[$i]['footfall']==$maxvalue){
                $resultDataFoot[1]['max']=$maxvalue;
                $resultDataFoot[1]['Time']=$fulldata[$i]['Time'];
            }
            //echo $fulldata[$i]['footfall'];
            # code...
        }


        return $resultDataFoot;
    }
    function getOdourLeftDataMail($date){

      
      $query="SELECT ToTime,CurReading FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and LineConnected='Odour Male' and TxnDate='".$date."'";
      //echo $query;
       $data = $this->db->query($query)->result();
       $fulldata=array();
       $resultodour=array();
       $resultodourfulldata=array();
       //print_r($data[0]->CurReading);
       for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->ToTime;
            $fulldata[$i]['odour']=(int)$data[$i]->CurReading;
           // $fulldata[$i]['Date']=$date1;
            if($data[$i]->CurReading>0){
                 array_push($resultodour, $data[$i]->CurReading);
            }
       }
       $minvalue=min($resultodour);
       $maxvalue=max($resultodour);
      
        for ($i=0; $i < count($fulldata); $i++) { 
            if($fulldata[$i]['odour']==$minvalue){
                $resultodourfulldata[0]['min']=$minvalue;
                $resultodourfulldata[0]['Time']=$fulldata[$i]['Time'];
            }
            if($fulldata[$i]['odour']==$maxvalue){
                $resultodourfulldata[1]['max']=$maxvalue;
                $resultodourfulldata[1]['Time']=$fulldata[$i]['Time'];
            }
            //echo $fulldata[$i]['footfall'];
            # code...
        }
        return $resultodourfulldata;
//print_r($resultodourfulldata);


    }
    function getOdourRightDataMail($date){

       
      $query="SELECT ToTime,CurReading FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and LineConnected='Odour Female' and TxnDate='".$date."'";
      //echo $query;
       $data = $this->db->query($query)->result();
       $fulldata=array();
       $resultodour=array();
       $resultodourfulldata=array();
       //print_r($data[0]->CurReading);
       for ($i=0; $i < count($data); $i++) { 
            $fulldata[$i]['Time']=$data[$i]->ToTime;
            $fulldata[$i]['odour']=(int)$data[$i]->CurReading;
           // $fulldata[$i]['Date']=$date1;
            if($data[$i]->CurReading>0){
                 array_push($resultodour, $data[$i]->CurReading);
            }
       }
       $minvalue=min($resultodour);
       $maxvalue=max($resultodour);
      
        for ($i=0; $i < count($fulldata); $i++) { 
            if($fulldata[$i]['odour']==$minvalue){
                $resultodourfulldata[0]['min']=$minvalue;
                $resultodourfulldata[0]['Time']=$fulldata[$i]['Time'];
            }
            if($fulldata[$i]['odour']==$maxvalue){
                $resultodourfulldata[1]['max']=$maxvalue;
                $resultodourfulldata[1]['Time']=$fulldata[$i]['Time'];
            }
            //echo $fulldata[$i]['footfall'];
            # code...
        }
        return $resultodourfulldata;
//print_r($resultodourfulldata);


    }
 function getFootfallReportHourly($date){ 
    $tot=0;
    $queryt="select SUM(Consumption)*Multiplier as Consumption FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and TxnDate='".$date."' and LineConnected='Footfall Male' ";
                //echo $queryt;
                    $datat = $this->db->query($queryt)->result();
                    //echo $datat[0]->Consumption."<br>";
                    $totff=(int)$datat[0]->Consumption;
                    //echo $totff;
                    $p=0;
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

                    $query="select SUM(Consumption)*Multiplier as Consumption FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and TxnDate='".$date."' and LineConnected='Footfall Male' AND TxnTime >= '".$from."' AND TxnTime < '".$to."' ";
                   // echo $query;die();
                    $data = $this->db->query($query)->result();
                   if(isset($data[0]->Consumption)){
                        $footfall=round(abs($data[0]->Consumption-0.25));
                    }else{
                        $footfall=0;
                    }

                    $tot+=$footfall;
                    
                    $fulldata[$i]['Time']=$from." To ".$to;
                    $fulldata[$i]['footfall']=$footfall;
                    $fulldata[$i]['footfallpercent']=round(($fulldata[$i]['footfall']/$totff)*100,2);
                    $fulldata[$i]['Date']=$date;
                    $p+=$fulldata[$i]['footfallpercent'];
                   
                   

                }
                $fulldata[24]['totalfootfall']=$tot;
                $fulldata[24]['totalfootfallpercent']=round($p);
                
                return $fulldata;             
                   
                    
    
}   

function getFootfallReportDb($date,$loc){
    if($loc==1){
        $table="hardware_station_consumption_data_wr_collector";
        $stationid=2022000112;
        }else{
        $table="hardware_station_consumption_data_wr_jpnagar";
        $stationid=2022000113;
        }
       $dataquery="select FootFallCount,smscount from samsungfootfallwithsms where Date='".$date."' and StationId=$stationid";
       $data = $this->db->query($dataquery)->result();
       if (count($data)>0) {
          $footfall[0]=$data[0]->FootFallCount;
          $footfall[1]=$data[0]->smscount;
          $footfall[2]=1;
       return $footfall;
       }else{
        $footfall[2]=0;
        return $footfall;
       }
       

}


function getsodexoDataCron(){
 
    $fulldata=array();
    
        $date=date("Y-m-d");
        $date = date("Y-m-d", strtotime($date .' -1 day'));
        $date = "'".$date."'";
        
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

            $query="select Consumption FROM hardware_station_consumption_data_wr_collector where StationId=2022000112 and TxnDate=".$date." and LineConnected='Footfall Male' AND TxnTime BETWEEN '".$from."' AND '".$to."' ";
            $data = $this->db->query($query)->result();
            //echo $query;die();
            $m=0;
            for ($j=0; $j <count($data) ; $j++) {
            //echo $data[$j]->Consumption;
            $m +=round($data[$j]->Consumption);

            }
            $fulldata[$i]['Time']=$from." To ".$to;
            $fulldata[$i]['footfall']=$m;
            $fulldata[$i]['Date']=$date;

            $insQuery="INSERT INTO SodexoFootFall(`MeterName`,`StationId`,`Timings`,`FootFallCount`,`Date`)VALUES('RestRoom',2022000112,'".$fulldata[$i]['Time']."',".$fulldata[$i]['footfall'].",".$fulldata[$i]['Date'].")";
            //echo $insQuery;
            $this->db->query($insQuery);
           

        }
        return $fulldata;

     
    
}
function getTimings(){
     $query="SELECT DISTINCT FromTime,ToTime,Consumption FROM hardware_station_consumption_data_wr_collector 
where LineConnected='Janitor_2' and TxnDate='2020-02-01' and LineConnected='Janitor_2' and Consumption>0";
            $data = $this->db->query($query)->result();
            return $data;
}
}