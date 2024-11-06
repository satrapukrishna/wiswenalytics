<?php
class Usa_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
  
	function getEmbessyData($date,$yest,$week,$devices){
        $date_from_week = strtotime($week); 
        $date_to_week = strtotime($yest); 
        $datesarray_week=array();
		for ($i1=$date_from_week; $i1<=$date_to_week; $i1+=86400)
        {
          array_push($datesarray_week, date("Y-m-d",$i1));  
        }
             for ($i=0; $i < count($devices); $i++) { 
                
                $startEndConsQuery="SELECT (SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Total)' and TxnDate='".$date."' ORDER BY TxnTime asc LIMIT 1) as 'start',(SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."'  and UtilityName='Energy (Total)' and TxnDate='".$date."' ORDER BY TxnTime desc LIMIT 1) as 'end'";
                $check_y=$this->chech_energy_consumotion($devices[$i]['LineConnected'],$yest);
                if(count($check_y)==1){
                    $cons_yest =$check_y[0]['consumption'];
                }else{
                    $startEndConsQuery_yest="SELECT (SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Total)' and TxnDate='".$yest."' ORDER BY TxnTime asc LIMIT 1) as 'start',(SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."'  and UtilityName='Energy (Total)' and TxnDate='".$yest."' ORDER BY TxnTime desc LIMIT 1) as 'end'";
                    $dataStartEndConsyest = $this->db->query($startEndConsQuery_yest)->result();
            $cons_yest=$dataStartEndConsyest[0]->end-$dataStartEndConsyest[0]->start;
                }

            
            $cons1=0;
            for ($k=0; $k <count($datesarray_week) ; $k++) { 
                $check=$this->chech_energy_consumotion($devices[$i]['LineConnected'],$datesarray_week[$k]);
					if(count($check)==1){
                        $cons1+=$check[0]['consumption'];
					}else{
                        $startEndConsQuery_week="SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Last 24 Hour)' and TxnDate='".$datesarray_week[$k]."' ORDER BY TxnTime asc LIMIT 1";
                        $dataStartEndConsweek = $this->db->query($startEndConsQuery_week)->result();
                        $energy_cons_query=array(
							'location_name'=>$devices[$i]['LineConnected'],
							'report_date'=>$datesarray_week[$k],
							'created_date'=>date('Y-m-d H:i:s'),
							'consumption'=>$dataStartEndConsweek[0]->Consumption,
							'meter_name'=>$devices[$i]['LineConnected']              
						);
						$this->db->insert('energy_consumption_report_tbl_usa', $energy_cons_query);
                        $cons1+=$dataStartEndConsweek[0]->Consumption;
                    }
                
            }
            
            $dataStartEndCons = $this->db->query($startEndConsQuery)->result();
            $cons=$dataStartEndCons[0]->end-$dataStartEndCons[0]->start;

            

            
            $avg=$cons1/count($datesarray_week);
            $data[$i]['meter']=$devices[$i]['LineConnected'];
            $data[$i]['today_cons']=round($cons,2);
            $data[$i]['today_cons_percent']="";
            //$data[$i]['today_cons_percent']=round(($cons/$avg)*100-100,2)."%";
            $data[$i]['yesterday_cons']=round($cons_yest,2);
            $data[$i]['yesterday_cons_percent']="";
            // $data[$i]['yesterday_cons_percent']=round(($cons_yest/$avg)*100-100,2)."%";
            $data[$i]['avg']=round($avg,2);
            $data[$i]['costing']="$6";
            
            // $data[$i]['query']=$startEndConsQuery;

             }
            
            return $data;
                            
    }
    function chech_energy_consumotion($location_name,$date)
	{
		$this->db->select('*');
        $this->db->from('energy_consumption_report_tbl_usa');        
		$this->db->where('location_name',$location_name);
		$this->db->where('report_date',$date);
       
        $res = $this->db->get()->result_array();
		//echo $res[0]['report_date'];die();        
		 //echo "ll:".$this->db->last_query();die();       
        return $res;
	}
    function getEmbessyReportData($sdate,$edate,$devices){
        $date_from_week = strtotime($sdate); 
        $date_to_week = strtotime($edate); 
        $datesarray_week=array();
		for ($i1=$date_from_week; $i1<=$date_to_week; $i1+=86400)
        {
          array_push($datesarray_week, date("Y-m-d",$i1));  
        }
             for ($i=0; $i < count($devices); $i++) { 
             
                for ($k=0; $k <count($datesarray_week) ; $k++) { 
                    $startEndConsQuery="SELECT (SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Total)' and TxnDate='".$datesarray_week[$k]."' ORDER BY TxnTime asc LIMIT 1) as 'start',(SELECT Consumption FROM hardware_station_consumption_data_embessy_test WHERE LineConnected='".$devices[$i]['LineConnected']."'  and UtilityName='Energy (Total)' and TxnDate='".$datesarray_week[$k]."' ORDER BY TxnTime desc LIMIT 1) as 'end'";
                    $dataStartEndCons = $this->db->query($startEndConsQuery)->result();
                    $cons=$dataStartEndCons[0]->end-$dataStartEndCons[0]->start;
                    $data[$i][$k]['meter']=$devices[$i]['LineConnected'];
                    $data[$i][$k]['cons']=round($cons,2);
                    $data[$i][$k]['date']=$datesarray_week[$k];
                }
            
             }
            
            return $data;

    }
    function getEmbessyFullData($sdate,$edate,$devices,$utility){
        $date_from_week = strtotime($sdate); 
        $date_to_week = strtotime($edate); 
        $datesarray_week=array();
		for ($i1=$date_from_week; $i1<=$date_to_week; $i1+=86400)
        {
          array_push($datesarray_week, date("Y-m-d",$i1));  
        }
            $n=0;
             for ($i=0; $i < count($devices); $i++) {
                // for ($i=0; $i < count($devices); $i++) { 
                    for ($k=0; $k <count($datesarray_week) ; $k++) {
                        $times="SELECT distinct TxnTime FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."' and LineConnected='".$devices[$i]['LineConnected']."' order by TxnTime  ASC"; 
                        $times1 = $this->db->query($times)->result_array();
                        for ($h=0; $h < count($times1); $h++) { 
                            $a1="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='RSSI' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a2="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Capacitor Voltage' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a3="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Internal Temperature' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a4="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Current' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a5="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Power' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a6="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Total)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a7="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Min Current' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a8="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Max Current' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a9="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Kilo Ampere Hour (Total)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a10="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Kilo Ampere Hour (Last Hour)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a11="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Kilo Ampere Hour (Last 24 Hour)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a12="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Last Hour)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a13="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Energy (Last 24 Hour)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a14="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Total Time Machine Down  (Last 24 hours)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a15="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Total Time Machine Running Time (Last 24 hours)' and TxnTime='".$times1[$h]['TxnTime']."'";
                            $a16="SELECT Consumption FROM protech_bms.hardware_station_consumption_data_embessy_test where TxnDate='".$datesarray_week[$k]."'  and LineConnected='".$devices[$i]['LineConnected']."' and UtilityName='Multipler' and TxnTime='".$times1[$h]['TxnTime']."'";
                         
                            $b1 = $this->db->query($a1)->result_array();
                            $b2 = $this->db->query($a2)->result_array();
                            $b3 = $this->db->query($a3)->result_array();
                            $b4 = $this->db->query($a4)->result_array();
                            $b5 = $this->db->query($a5)->result_array();
                            $b6 = $this->db->query($a6)->result_array();
                            $b7 = $this->db->query($a7)->result_array();
                            $b8 = $this->db->query($a8)->result_array();
                            $b9 = $this->db->query($a9)->result_array();
                            $b10 = $this->db->query($a10)->result_array();
                            $b11= $this->db->query($a11)->result_array();
                            $b12 = $this->db->query($a12)->result_array();
                            $b13 = $this->db->query($a13)->result_array();
                            $b14 = $this->db->query($a14)->result_array();
                            $b15 = $this->db->query($a15)->result_array();
                            $b16 = $this->db->query($a16)->result_array();
                            $data[$n]['MeterName']=$devices[$i]['LineConnected'];
                            $data[$n]['TxnDate']=$datesarray_week[$k];
                            $data[$n]['TxnTime']=$times1[$h]['TxnTime'];
                            $data[$n]['RSSI']=$b1[0]['Consumption'];
                            $data[$n]['Capacitor Voltage']=$b2[0]['Consumption'];
                            $data[$n]['Internal Temperature']=$b3[0]['Consumption'];
                            $data[$n]['Current']=$b4[0]['Consumption'];
                            $data[$n]['Power']=$b5[0]['Consumption'];
                            $data[$n]['Energy (Total)']=$b6[0]['Consumption'];
                            $data[$n]['Min Current']=$b7[0]['Consumption'];
                            $data[$n]['Max Current']=$b8[0]['Consumption'];
                            $data[$n]['Kilo Ampere Hour (Total)']=$b9[0]['Consumption'];
                            $data[$n]['Kilo Ampere Hour (Last Hour)']=$b10[0]['Consumption'];
                            $data[$n]['Kilo Ampere Hour (Last 24 Hour)']=$b11[0]['Consumption'];
                            $data[$n]['Energy (Last Hour)']=$b12[0]['Consumption'];
                            $data[$n]['Energy (Last 24 Hour)']=$b13[0]['Consumption'];
                            $data[$n]['Total Time Machine Down  (Last 24 hours)']=$b14[0]['Consumption'];
                            $data[$n]['Total Time Machine Running Time (Last 24 hours)']=$b15[0]['Consumption'];
                            $data[$n]['Multipler']=$b16[0]['Consumption'];
                            

                            
                            $n++;
                        }
                        
                    }  
                
             
                
            
             }
            
            return $data;
    }
    function getDevicesData(){
        $query="SELECT distinct LineConnected FROM protech_bms.hardware_station_consumption_data_embessy_test";
        $dataDevices = $this->db->query($query)->result_array();
        return $dataDevices;
    }
    function getUtilityData(){
        $query="SELECT distinct UtilityName FROM protech_bms.hardware_station_consumption_data_embessy_test";
        $dataDevices = $this->db->query($query)->result_array();
        return $dataDevices;
    }
	
	
    
}