<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 300);
class Fairmontclient extends CI_Controller 
{
	function __construct(){
		//
		parent::__construct();
		$this->load->model('Fire_model');
	}
	
	function frmntdshbrd()
	{	
		// $data['meters'] = $this->Prk_model->getMeterList();
		$this->load->view('Dashboard');
		// $this->load->view('Dashboard');
	}
	function demo()
    {   
        // $data['meters'] = $this->Prk_model->getMeterList();
        $this->load->view('dashboardDemo');
        // $this->load->view('Dashboard');
    }

    function firepumpRunReport(){
    	$this->load->view('firepumpRunReport');
    }
    function firepumpGraphReport(){
    	$this->load->view('firepumpGraphReport');
    }
	function iaqGraphReport(){
        $this->load->view('iaqGraphReport');
    }
	
	function fairmontdashBoardData(){
		$fireList=$this->Fire_model->getfairmontFireListData();
		
        $fireData=$this->Fire_model->fairmontgetDashBoardData($fireList);
        echo json_encode($fireData);
    }
    function firerunrprt(){
        $fireData=$this->Fire_model->putFireRunHrs();
        echo json_encode($fireData);
        
    }
    
    function firepumpGraphData(){
    	$data=$this->Fire_model->getFirepumpGraphData($this->input->get());
    	echo json_encode($data);
    }
    function fairmontfirePumpRunningReport(){
    	$data=$this->Fire_model->fairmontfirePumpRunnDataAll($this->input->get());
    	echo json_encode($data);
    }

    public function getwaterdata(){
        $myhomeData=$this->Fire_model->getjllwaterdata($this->input->get());
        $result=array();
        if(count($myhomeData)>0){
            echo json_encode($myhomeData);
        }

    }
     function getPressureData(){
       $data=$this->Fire_model->getPressureData($this->input->get());
        echo json_encode($data); 
     }
     function getPressureDataDash(){
       $data=$this->Fire_model->getPressureDataDash();
        echo json_encode($data); 
     }
     function iaqDataReport(){
        $data=$this->Fire_model->getIaqData($this->input->get());
        echo json_encode($data);
    }
    function iaqDashboardData(){
        $data=$this->Fire_model->getIaqDashData();
        echo json_encode($data);
    }
    function iaqDashboardDataGraph(){
        $data=$this->Fire_model->getIaqDashData();
        echo json_encode($data);
    }
    function sendIAQMails(){
         $date = date('Y-m-d',strtotime("-1 days"));
         $dataTemp=$this->Fire_model->getTempMails($date);
          $dataHumidity=$this->Fire_model->getHimidMails($date);
          //echo json_encode($data);

            $msg_data =   "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Hi,</b><br>";
            $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Date: ".$date." </b><br>";
            $msg_data.= "<b style='font-size: 13px;font-family: arial; line-height: 25px;'>Client Name : 
            Fairmont</b>";
            $msg_data.= '<table bgcolor="#fffff0" style="width:100%;"><tr><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="6">Hourly Report</th></tr><tr><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " rowspan="2">S.No</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " rowspan="2">Time</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="2">Temperature</th><th style=" background-color: #378fa7; color: white;font-size: 13px;font-family: arial;font-weight: bold; " colspan="2">Humidity</th></tr><tr><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Min</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Max</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Min</th><th style=" background-color: #378fa7; color: white; font-size: 13px;font-family: arial;font-weight: bold;">Max</th></tr>';
          $j=1;
            for ($i=0; $i < count($dataTemp); $i++) { 
               $msg_data.= "<tr style='background-color: #e6f1f5;'><td align='center' style='font-family:arial;font-size: 12px;line-height: 25px;'>".$j."</td><td align='center' style='font-family:arial;font-size: 12px;line-height: 25px;'>".$dataTemp[$i]['Time']."</td><td align='center' style='font-family:arial;font-size: 12px;line-height: 25px;'>".$dataTemp[$i]['min']."</td><td align='center' style='font-family:arial;font-size: 12px;line-height: 25px;'>".$dataTemp[$i]['max']."</td><td align='center' style='font-family:arial;font-size: 12px;line-height: 25px;'>".$dataHumidity[$i]['min']."</td><td align='center' style='font-family:arial;font-size: 12px;line-height: 25px;'>".$dataHumidity[$i]['max']."</td></tr>";
               $j++;
            }
         
            
           $msg_data.= '</table><br>Thanks and Regards,<br />Wenalytics Team<br />';
            echo $msg_data;
            $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'ChekhraApp@gmail.com',
        'smtp_pass' => 'Chk@1234',
        'mailtype'  => 'html', 
        'charset' => 'utf-8',
        'wordwrap' => TRUE

    );
    // echo $msg_data;die();
    $this->load->library('email');
    $this->email->initialize($config);   
    $this->email->set_newline("\r\n"); 
    $this->email->set_mailtype("html");   
    $this->email->from('Wenalytics@gmail.com', 'Wenalytics');
    $list = array('Dinesh.Malokar@ap.jll.com','Pratik.Mangaonkar@ap.jll.com','krishna3175@gmail.com');
    //$list = array('sunilmanohar9@gmail.com');
    $this->email->to($list);
    $this->email->subject('Daily Mail');
    $this->email->message($msg_data);
    

    $this->email->send();
    }
}

