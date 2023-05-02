<?php
class TemperatureAlertModel extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
    function getMetersList(){
    	$db = $this->session->userdata('DB');
    	$table = $this->session->userdata('Table');
    	$this->load->database($db);//, [MeterSerial],'_'
        $query = "SELECT DISTINCT CONCAT([UtilityName], '_',[LocationName] )  AS [UtilityName],[LocationId] FROM ".$db.".[dbo].".$table." WHERE [MeterType] = 0003 AND [UomGraph] = 'SIN'";
    	$data = $this->db->query($query)->result();
    	return $data;
    }
    function updateTemperatureAlert($data){
      $userdb = $this->session->userdata('DB');//echo $db;die();
        $usertable = $this->session->userdata('Table');
        $userdb = "'".$userdb."'";$usertable = "'".$usertable."'";
        $db = '[protech_bms]';
        $this->load->database($db);
        $meters = implode(",", $data['meter']);
        $meters = str_replace(",", ", ", $meters);
        $meters = "'".$meters."'";
        $days = implode(",", $data['day']);
        $days = str_replace(",", ", ", $days);
        $days = "'".$days."'";
        $from = "'".$data['fromtime']."'";
        $to = "'".$data['totime']."'";
        $emailId = "'".$data['emailId']."'";
        $phonenos = "'".$data['phoneno']."'";
        $editid = $data['editid'];
        $insertquery = "UPDATE ".$db.".[dbo].[app_temp_alerts]
           SET [meter_name] =".$meters.",[days]=".$days.",[from_time]=".$from.",[to_time]=".$to;
        if($data['mintemp'] != "" && $data['mintempcheck'] == "true"){
            $insertquery .= ",[min_temp]=".$data['mintemp'];
        }if($data['maxtemp'] != "" && $data['maxtempcheck'] == "true"){
            $insertquery .= ",[max_temp]=".$data['maxtemp'];
        }
        $insertquery .= ",[sms_alert]='".$data['sms']."'";
        $insertquery .= ",[email_alert]='".$data['mail']."'";
        $insertquery .= ",[email]=".$emailId;
        $insertquery .= ",[contact_no]=".$phonenos;
        $insertquery .= ",[min_temp_check]='".$data['mintempcheck']."'";
        $insertquery .= ",[max_temp_check]='".$data['maxtempcheck']."'";  
        $insertquery .= ",[db]=".$userdb;
        $insertquery .= ",[table]=".$usertable;
        $insertquery .= " WHERE [id]=".$editid;
        $resdata = $this->db->query($insertquery);
        return $resdata;
    }
    function saveTemperatureAlert($data){
        $userdb = $this->session->userdata('DB');//echo $db;die();
        $usertable = $this->session->userdata('Table');
        $userdb = "'".$userdb."'";$usertable = "'".$usertable."'";
        $db = '[protech_bms]';
        $this->load->database($db);
        $meters = implode(",", $data['meter']);
        $meters = str_replace(",", ", ", $meters);
        $meters = "'".$meters."'";
        $days = implode(",", $data['day']);
        $days = str_replace(",", ", ", $days);
        $days = "'".$days."'";
        $from = "'".$data['fromtime']."'";
        $to = "'".$data['totime']."'";
        $emailId = "'".$data['emailId']."'";
        $phonenos = "'".$data['phoneno']."'";
        $insertquery = "INSERT INTO [dbo].[app_temp_alerts]
           ([meter_name]
           ,[days]
           ,[from_time]
           ,[to_time]";
        if($data['mintemp'] != "" && $data['mintempcheck'] == "true"){
            $insertquery .= ",[min_temp]";
        }if($data['maxtemp'] != "" && $data['maxtempcheck'] == "true"){
            $insertquery .= ",[max_temp]";
        }
           
           $insertquery .= ",[sms_alert]
           ,[email_alert]
           ,[email]
           ,[contact_no]
           ,[min_temp_check]
           ,[max_temp_check],[db],[table])
     VALUES (".$meters.",".$days.",".$from.",".$to;
        if($data['mintemp'] != "" && $data['mintempcheck'] == "true"){
            $insertquery .= ",".$data['mintemp'];
        }
        if($data['maxtemp'] != "" && $data['maxtempcheck'] == "true"){
            $insertquery .= ",".$data['maxtemp'];
        }
        $insertquery .= ",'".$data['sms']."','".$data['mail']."',".$emailId.",".$phonenos.",'".$data['mintempcheck']."','".$data['maxtempcheck']."',".$userdb.",".$usertable.")";
        $resdata = $this->db->query($insertquery);
        return $resdata;
    }
    function getSubscribedTemperratureAlerts($userdb,$usertable){
        $db = '[protech_bms]';
        $this->load->database($db);
        $query = "SELECT
      [id],[meter_name],[days],[from_time],[to_time],[min_temp],[max_temp],[sms_alert],[email_alert]
      ,[email]
      ,[contact_no]
      ,[min_temp_check]
      ,[max_temp_check]
  FROM [dbo].[app_temp_alerts] WHERE [db]=".$userdb." AND [table]=".$usertable."";
        $data = $this->db->query($query)->result();
        return $data;
    }
    function DeleteSubscribedAlert($id){
      $db = '[protech_bms]';
      $this->load->database($db);
      $query = "DELETE FROM ".$db.".[dbo].[app_temp_alerts] WHERE [id]=".$id;
      $data = $this->db->query($query);
      return $data;
    }
}