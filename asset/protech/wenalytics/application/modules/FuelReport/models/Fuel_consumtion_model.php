<?php
class Fuel_consumtion_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function putDbData($data){
        if(count($data)>0){
            $row=$this->db->insert("app_device_station_consumtion",$data);
            return $row;

        }else{
            return false;

        }
        //print_r($data);die();

    }
    function putDbData1($data){
        if(count($data)>0){

            $row=$this->db->query($data);
            return $row;

        }else{
            return false;

        }
        //print_r($data);die();

    }
    function getFuelRunnData($data){
       // print_r($data);die();
    	$db = str_replace( array('[',']') , ''  , $this->session->userdata('DB') );//echo $db;die();
        $table =str_replace( array('[',']') , ''  , $this->session->userdata('Table') ); 
    	$this->load->database($db);
    	$fromdate = "'".$data['fromdate']."'";
    	$todate = "'".$data['todate']."'";
    	$fromtime = "'".$data['fromtime']."'";
    	$totime = "'".$data['totime']."'";
    	$meter = "'".$data['meter']."'";
    	//echo $fromtime;
    	// if($data['fromtime']=='Select Hours From'){
    	// 	echo "string";
    	// }die();
    	$fulldata=array();
    	if($data['fromdate'] == $data['todate'] && $data['fromtime']=='Select Hours From'){

    		$date = "'".$data['fromdate']."'";
    		for ($i=0; $i < 24; $i++) { 
    			if($i>9){
    			$from =  $i.":00:00";
    			$to =  ($i+1).":00:00"; 	
    		}else{
    			$from =  "0".$i.":00:00";
    			$to =  "0".($i+1).":00:00"; 
    		}
    			
    			$query = "SELECT CurReading,Consumption  FROM ".$db.".`dbo.".$table."` where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='DG_Running_Time' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
    			$data = $this->db->query($query)->result();
    			//echo count($data)."<br>";
    			//echo  $query."<br>";
    			$m=0;
    			for ($j=0; $j <count($data) ; $j++) {
    				$m +=$data[$j]->Consumption;

    				# code...
    			}
    			if($m>60){
    				$s=60;
    			}else{
    				$s=$m;
    			}
    			$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
    			$fulldata[$i]['meter']=$meter;
    			$fulldata[$i]['Time']=$from." To ".$to;
    			$fulldata[$i]['runninghrs']=$s." min";
    			$fulldata[$i]['Fuelconsume']=$consume;
    			$fulldata[$i]['economy']=round($consume/($s/60),3);
    			//print_r($fulldata);die();

    			
    		}
    		
    		//$data = $this->db->query($query)->result();
    		return $fulldata;
    		
    	}
    	else if($data['fromdate'] == $data['todate'] && $data['fromtime']!='Select Hours From'){
    		$date = "'".$data['fromdate']."'";
    		$t=explode(':', $data['totime']);
    		for ($i=0; $i < $t[0]; $i++) { 
    			if($i>9){
    			$from =  $i.":00:00";
    			$to =  ($i+1).":00:00"; 	
    		}else{
    			$from =  "0".$i.":00:00";
    			$to =  "0".($i+1).":00:00"; 
    		}
    		$query = "SELECT CurReading,Consumption  FROM ".$db.".`dbo.".$table."` where LocationName=".$meter." AND TxnDate=".$date." AND UtilityName='DG_Running_Time' AND FromTime BETWEEN '".$from."' AND '".$to."' AND ToTime BETWEEN '".$from."' AND '".$to."'";
    			$data = $this->db->query($query)->result();
    			//echo count($data)."<br>";
    			//echo  $query."<br>";
    			$m=0;
    			for ($j=0; $j <count($data) ; $j++) {
    				$m +=$data[$j]->Consumption;

    				# code...
    			}
    			if($m>60){
    				$s=60;
    			}else{
    				$s=$m;
    			}
    			$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
    			$fulldata[$i]['meter']=$meter;
    			$fulldata[$i]['Time']=$from." To ".$to;
    			$fulldata[$i]['runninghrs']=$s." min";
    			$fulldata[$i]['Fuelconsume']=$consume;
    			$fulldata[$i]['economy']=round($consume/($s/60),3);
    		

    	}
    	return $fulldata;
    }
    	else{
    		if($data['fromtime']!='Select Hours From'){
    			$date_from = strtotime($data['fromdate']); 
				$date_to = strtotime($data['todate']); 
				$datesarray=array();
				for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
					array_push($datesarray, date("Y-m-d",$i1));
					
				}
				for ($k=0; $k < count($datesarray); $k++) { 
					$query =  "SELECT CurReading,Consumption  FROM ".$db.".`dbo.".$table."` where LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='DG_Running_Time' AND FromTime BETWEEN ".$fromtime." AND ".$totime." AND ToTime BETWEEN ".$fromtime." AND ".$totime."";
					//echo $query;
					$data = $this->db->query($query)->result();
					$m=0;
				    			for ($j=0; $j <count($data) ; $j++) {
				    				$m +=$data[$j]->Consumption;

				    				# code...
				    			}
				    			
				    			$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
				    			$fulldata[$k]['meter']=$meter;
				    			$fulldata[$k]['Time']=$datesarray[$k];
				    			$fulldata[$k]['runninghrs']=floor($m / 60).':'.($m - floor($m / 60) * 60);
				    			$fulldata[$k]['Fuelconsume']=$consume;
				    			$fulldata[$k]['economy']=round($consume/($m/60),3);
				    			//print_r($fulldata);die();

				    			
				    		}
				    		
				    		//$data = $this->db->query($query)->result();
				    		return $fulldata;

    		}else{
    			$date_from = strtotime($data['fromdate']); 
				$date_to = strtotime($data['todate']); 
				$datesarray=array();
				for ($i1=$date_from; $i1<=$date_to; $i1+=86400) {
					array_push($datesarray, date("Y-m-d",$i1));
					
				}
				for ($k=0; $k < count($datesarray); $k++) { 
					$query = "SELECT CurReading,Consumption  FROM ".$db.".`dbo.".$table."` where LocationName=".$meter." AND TxnDate='".$datesarray[$k]."' AND UtilityName='DG_Running_Time'";
					$data = $this->db->query($query)->result();
					$m=0;
				    			for ($j=0; $j <count($data) ; $j++) {
				    				$m +=$data[$j]->Consumption;

				    				# code...
				    			}
				    			
				    			$consume=$data[count($data)-1]->CurReading-$data[0]->CurReading;
				    			$fulldata[$k]['meter']=$meter;
				    			$fulldata[$k]['Time']=$datesarray[$k];
				    			$fulldata[$k]['runninghrs']=floor($m / 60).':'.($m - floor($m / 60) * 60);
				    			$fulldata[$k]['Fuelconsume']=$consume;
				    			$fulldata[$k]['economy']=round($consume/($m/60),3);
				    			//print_r($fulldata);die();

				    			
				    		}
				    		
				    		//$data = $this->db->query($query)->result();
				    		return $fulldata;
    		}

				
				
				}

				    		
				    	}
    }
    	
   