<?php
class Login_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function validate_user($uname,$pwd)
    { 
    	$u = "'".$uname."'";
    	$p = "'".$pwd."'";
    	$query = "SELECT profile.user_id,user_type_id,first_name,last_name
		  FROM app_users users
		  INNER JOIN app_users_profile profile ON users.id = profile.user_id WHERE users.username=".$u." AND users.password=".$p;

    	//$query = "SELECT TOP (1000) * FROM [dbo].[2018000041_YC]";
    	//$this->db->from('[dbo].[2018000041_YC]');
		  
		//echo $query;
    	$data = $this->db->query($query);//->result()
    	$data1 = $data->result();
    	//echo 
    	$numberOfRows=$data->num_rows();
    	// print_r($numberOfRows);
    	if($numberOfRows ==1){
	    	$query1 ="SELECT branch_name,station_id,client_name,station_code
				      ,client_address
				      ,client_database_name,branch_id
				FROM app_users_to_branches utob 
				RIGHT JOIN app_client_branches acb ON utob.branch_id = acb.id
				INNER JOIN app_client ac ON acb.client_id = ac.id
				WHERE utob.user_id =".$data1[0]->user_id;
			//echo $query1;die();
			$data2 = $this->db->query($query1)->result();
	    	$result = array();
	    	$result['branch'] = $data2;
	    	$result['user'] = $data1[0];
	    	return $result;
    	}else if($numberOfRows == 0){
    		//echo "false";
    		return false;
    	}
    }
}