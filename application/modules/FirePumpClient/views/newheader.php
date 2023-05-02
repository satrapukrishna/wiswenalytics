<?php 

$login = $this->session->userdata('login');
if($login){

}else{
  redirect(base_url().'FirePumpLogin');
 
}
$clientName = $this->session->userdata('ClientName');
$short = explode(" ", $clientName);
$ShortName = array();$i=0;
foreach ($short as $value) {
  $name = substr($value,0,1);
  $ShortName[$i] = $name;
  $i++;
}

$stVar = $this->session->userdata('Table');
$stationIdVar = explode("_", $stVar);

$stationIdspan = str_replace("[","",$stationIdVar[0]);




/*
echo $clientName;
if(($clientName)){
  echo "session unset";die();
  $this->load->view('login');
}*/
?>
<div id="DshbrdRgt" class="DshBrdHdr">
            <ul class="HdrLstng">
                <li class="MenuHldr">
                    <span id="MblMenuBtn" onclick="javascript:MblMenu();" class="MenuTggle"></span>
                </li>
                <!-- <li class="BrndHldr">
                    <span class="BrndNm">PKR Hospitals</span>
                </li> -->
                <li>
                    <span class="UsrDtls1"><?php echo $this->session->userdata('ProfileName'); ?></span>
                    
                </li>
                <li>
                    <span class="Sttngs"></span>
                </li>
                <li>
                    <a href="../FirePumpLogin/logout"><span class="SgnOt" ></span></a>
                </li>
            </ul>
        </div>