<?php
class Api_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function saveToken($data){
       // echo $data["access_token"];
        $date =date("Y-m-d");
        $idata=array('token'=>$data["access_token"],'date'=>$date);
       $row=$this->db->insert("token_data",$idata);
       


    }
    function getToken(){
        $this->db->select('token');
        $this->db->from('token_data');
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0];
    }
    function checkData($stationid,$fromtime,$totime,$utilityname,$newdate){
    	$wherearray=array('StationId'=>$stationid,'FromTime'=>$fromtime,'ToTime'=>$totime,'LocationWithUtility'=>$utilityname,'TxnDate'=>$newdate);
    	 	$this->db->select('*');
        	$this->db->from('app_device_station_consumtion');
        	$this->db->where($wherearray);        	
        	$query = $this->db->get();
			$rowcount = $query->num_rows();
       		return $rowcount;
       
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
}