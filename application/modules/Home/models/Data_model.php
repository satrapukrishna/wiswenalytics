<?php
class Data_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function get_device_data(){
    	//$meter='EC';
    	date_default_timezone_set('Asia/Kolkata');
		//echo date('H:i');

    	$tt=date('H:m');
    	//echo $tt;die();

    	//$date='2021-03-15';
    	$date=date("Y-m-d");
    	//echo $date;die();
    	$result=array();
    	$list = "SELECT mname FROM demo_client group by mname";
    	$list1 = $this->db->query($list)->result();
    	//print_r($list1[0]->mname);
    	for ($i=0; $i < count($list1); $i++) { 
    		$queryD = "SELECT *  FROM demo_client where mname='".$list1[$i]->mname."' AND ddate='".$date."' and dtime <= '".$tt."'  order by id desc limit 1";
    		//echo $queryD;die();
    		$qr = "SELECT *  FROM demo_client where mname='".$list1[$i]->mname."' and dtime <= '".$tt."' AND ddate='".$date."' order by id asc";
    		//echo $qr;die();
    		$data1D = $this->db->query($queryD)->result();
    		$drd = $this->db->query($qr)->result();
    		//print_r($data1D[0]->ddate);
    		$result[$i][$list1[$i]->mname]['name']=$data1D[0]->mname;
    		$result[$i][$list1[$i]->mname]['value']=$data1D[0]->value;
    		$result[$i][$list1[$i]->mname]['time']=$data1D[0]->dtime;
    		$result[$i][$list1[$i]->mname]['date']=$data1D[0]->ddate;
    		$result[$i][$list1[$i]->mname]['total']=$drd;
    	}
    	//echo json_encode($result[0]['EC']);die();
    	//print_r($result);die();
    	//$queryD = "SELECT *  FROM demo_client where mname='".$meter."' AND ddate='".$date."' order by id desc limit 1";
    	//echo $queryD;
        //echo $queryD;die();AND ToTime BETWEEN '".$from."' AND '".$to."'
        //$data1D = $this->db->query($queryD)->result();
       // print_r($data1D);die();
        return $result;
    }
    function get_device_data_report($date){
    	//$meter='EC';
    	date_default_timezone_set('Asia/Kolkata');
		//echo date('H:i');
date("Y-m-d");
    	$tt=date('H:m');
    	//echo $tt;die();
    	$date1=date("Y-m-d");
    	//$date='2021-03-15';
    	$result=array();
    	if($date==''){

    	}else{
    		if($date==$date1){
    			$list = "SELECT mname FROM demo_client group by mname";
    	$list1 = $this->db->query($list)->result();
    	//print_r($list1[0]->mname);
    	for ($i=0; $i < count($list1); $i++) { 
    		$queryD = "SELECT *  FROM demo_client where mname='".$list1[$i]->mname."' AND ddate='".$date."' and dtime <= '".$tt."' order by id desc limit 1";
    		$qr = "SELECT *  FROM demo_client where mname='".$list1[$i]->mname."' AND ddate='".$date."' and dtime <= '".$tt."' order by id asc";
    		//echo $queryD;
    		$data1D = $this->db->query($queryD)->result();
    		$drd = $this->db->query($qr)->result();
    		//print_r($data1D[0]->ddate);
    		$result[$i][$list1[$i]->mname]['name']=$data1D[0]->mname;
    		$result[$i][$list1[$i]->mname]['value']=$data1D[0]->value;
    		$result[$i][$list1[$i]->mname]['time']=$data1D[0]->dtime;
    		$result[$i][$list1[$i]->mname]['date']=$data1D[0]->ddate;
    		$result[$i][$list1[$i]->mname]['total']=$drd;
    	}
    		}else{
    			$list = "SELECT mname FROM demo_client group by mname";
    	$list1 = $this->db->query($list)->result();
    	//print_r($list1[0]->mname);
    	for ($i=0; $i < count($list1); $i++) { 
    		$queryD = "SELECT *  FROM demo_client where mname='".$list1[$i]->mname."' AND ddate='".$date."' order by id desc limit 1";
    		$qr = "SELECT *  FROM demo_client where mname='".$list1[$i]->mname."' AND ddate='".$date."' order by id asc";
    		//echo $queryD;
    		$data1D = $this->db->query($queryD)->result();
    		$drd = $this->db->query($qr)->result();
    		//print_r($data1D[0]->ddate);
    		$result[$i][$list1[$i]->mname]['name']=$data1D[0]->mname;
    		$result[$i][$list1[$i]->mname]['value']=$data1D[0]->value;
    		$result[$i][$list1[$i]->mname]['time']=$data1D[0]->dtime;
    		$result[$i][$list1[$i]->mname]['date']=$data1D[0]->ddate;
    		$result[$i][$list1[$i]->mname]['total']=$drd;
    	}
    		}

    	
    	}
    	
    	
        return $result;
    }


    

    function saveData(){
        echo "test";
        $times="0:45,1:45,2:45,3:45,4:45,5:45,6:45,7:45,8:45,9:45,10:45,11:45,12:45,13:45,14:45,15:45,16:45,17:45,18:45,19:45,20:45,21:45,22:45,23:45";
        $vals="31.3,30.9,30.7,30.6,30.6,30.6,30.5,30.4,30.3,30.1,30.1,30,29.9,29.9,29.8,29.6,29.5,29.5,29.3,29.1,29.1,29,29,28.5";
        $t=explode(",", $times);
        $v=explode(",", $vals);
        //print_r($t);exit();
        $date_from = strtotime('2021-03-31'); 
        $date_to = strtotime('2021-03-31'); 
        //$vehicle='TDS';
        
        $datesarray=array();
        for ($i1=$date_from; $i1<=$date_to; $i1+=86400)
        {
          array_push($datesarray, date("Y-m-d",$i1));  
        }
        for ($i=0; $i < count($datesarray); $i++) { 
           
           for ($j=0; $j <count($t) ; $j++) { 
           	$query="insert into demo_client(mname,value,ddate,dtime,updateddate) values('Temperature','$v[$j]','$datesarray[$i]','$t[$j]','')";
           	$this->db->query($query);
           	echo $query."<br>";
           
           }
       
        
        }
    }
  }  