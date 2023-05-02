<?php 
//print_r($this->session->userdata());
$login = $this->session->userdata('login');
if($login){

}else{
  redirect(base_url().'Login');
 
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
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#28b3df">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Dashboard.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Dashboard.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/asset/sodexoasset/asset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Scripts/Script.js"></script>
    <style type="text/css">
        .logoutLblPos{
           position:fixed;
           right:10px;
           top:5px;
        }
        #submit2 {
          background-color: #02918d; /* Green */
          border: none;
          color: white;
          padding: 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
          border-radius: 50%;
        }
    </style>
</head>
<body onload="fetchSodexoData()">
    <div class="Wrapper">
        <div class="Header">
            <div class="Logo">
                <span class="CmpNm">WenAlytics</span>
            </div>
            <div class="UserMenu">
                <!-- <span class="UsrNm">Sodexo User</span> -->
            </div>
            <div id="DshbrdRgt" class="UserMenu">
            
            </div>
            <label class="logoutLblPos">
              <a href="<?php echo base_url(); ?>Login/logout"><input name="submit2" type="submit" id="submit2" value="Log out"></a>

            </label>
        </div>
        <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr">
                <div class="SctnSlctr">
                    <span class="SctnNm Active">Dashboard</span>
                    <span class="SctnNm">Report</span>
                </div>
                <!-- <div class="SctnSrch">
                    <ul class="SrchLst">
                        <li>
                            <div class="LstLft"><span class="Txt">Today</span></div>
                            <div class="LstRgt"><input type="text" class="Inpt" /></div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">Month</span></div>
                            <div class="LstRgt"><input type="text" class="Inpt" /></div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">From</span></div>
                            <div class="LstRgt"><input type="text" class="Inpt" /></div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">To</span></div>
                            <div class="LstRgt"><input type="text" class="Inpt" /></div>
                        </li>
                        <li>
                            <input type="button" class="Btn" value="Go" />
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="CntntHldr" id="sodexodata">
                <!-- <ul class="CntntDtls">
                    <li class="Frst Hdr">
                        <span class="MnTtl">Dashboard</span>
                    </li>
                    <li class="Dtls Hdr">
                        <img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg RFID" />
                        <span class="HdrTtl">RFID Janitor Attendance</span>
                    </li>
                    <li class="Dtls Hdr">
                        <img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg Stink" />
                        <span class="HdrTtl">Stink Sensor</span>
                    </li>
                    <li class="Dtls Hdr">
                        <img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg WaterLevel" />
                        <span class="HdrTtl">Water Level Sensor</span>
                    </li>
                    <li class="Dtls Hdr">
                        <img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg Footfall" />
                        <span class="HdrTtl">Footfall Sensor</span>
                    </li>
                    <li class="Dtls Hdr Lst">
                        <img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg Feedback" />
                        <span class="HdrTtl">Feedback Buttons</span>
                    </li>
                </ul>
                <ul class="CntntDtls" >
                    <li class="Frst">
                        <span class="TlNm Bld Txt">Sodexo Clean Toilets</span>
                        <span class="Txt Bld">Address:</span>
                        <span class="Txt">Swachh Public Toilet, Jai Hind Gandhi Rd, VIP Hills, Jai Hind Enclave, Madhapur, Hyderabad, Telangana - 500001</span>
                    </li>
                    <li class="Dtls RFID">
                        <div class="Hldr">
                            <span class="Txt">No. of times swiped</span>
                            <span class="TxtHghlgt">6</span>
                        </div>
                        <div class="Hldr">
                            <span class="Txt">No. of times cleaning verified</span>
                            <span class="TxtHghlgt">3</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Details">
                        </div>
                    </li>
                    <li class="Dtls Stink Good">
                        <div class="Hldr">
                            <span class="Txt">Stink Level</span>
                            <span class="TxtHghlgt">16%</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Acceptable">
                        </div>
                    </li>
                    <li class="Dtls WaterLevel">
                        <div class="Hldr">
                            <span class="TxtTtl">Water Level</span>
                            <span class="TxtHghlgt">50%</span>
                            <span class="Txt">25 Lts</span>
                        </div>
                        <div class="Hldr">
                            <span class="TxtTtl">Water Consumed</span>
                            <span class="TxtHghlgt">25</span>
                            <span class="Txt">Lts</span>
                        </div>
                    </li>
                    <li class="Dtls Footfall">
                        <div class="Hldr">
                            <span class="Txt">No. of Person's Walked In</span>
                            <span class="TxtHghlgt">362</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Details">
                        </div>
                    </li>
                    <li class="Dtls Feedback">
                        <div class="Hldr">
                            <span class="Txt">Feedback</span>
                        </div>
                        <div class="Hldr Fdbck Good">
                            <span class="Grade">Good</span>
                            <span class="Value">60/80</span>
                        </div>
                        <div class="Hldr Fdbck Average">
                            <span class="Grade">Average</span>
                            <span class="Value">15/80</span>
                        </div>
                        <div class="Hldr Fdbck Bad">
                            <span class="Grade">Bad</span>
                            <span class="Value">5/80</span>
                        </div>
                    </li>
                </ul> -->
               <!--  <ul class="CntntDtls">
                    <li class="Frst">
                        <span class="TlNm Bld Txt">Ameerpet Clean Toilets</span>
                        <span class="Txt Bld">Address:</span>
                        <span class="Txt">Swachh Public Toilet, Jai Hind Gandhi Rd, VIP Hills, Jai Hind Enclave, Madhapur, Hyderabad, Telangana - 500001</span>
                    </li>
                    <li class="Dtls RFID">
                        <div class="Hldr">
                            <span class="Txt">No. of times swiped</span>
                            <span class="TxtHghlgt">6</span>
                        </div>
                        <div class="Hldr">
                            <span class="Txt">No. of times cleaning verified</span>
                            <span class="TxtHghlgt">3</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Details">
                        </div>
                    </li>
                    <li class="Dtls Stink Average">
                        <div class="Hldr">
                            <span class="Txt">Stink Level</span>
                            <span class="TxtHghlgt">40%</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Acceptable">
                        </div>
                    </li>
                    <li class="Dtls WaterLevel">
                        <div class="Hldr">
                            <span class="TxtTtl">Water Level</span>
                            <span class="TxtHghlgt">50%</span>
                            <span class="Txt">25 Lts</span>
                        </div>
                        <div class="Hldr">
                            <span class="TxtTtl">Water Consumed</span>
                            <span class="TxtHghlgt">18</span>
                            <span class="Txt">Lts</span>
                        </div>
                    </li>
                    <li class="Dtls Footfall">
                        <div class="Hldr">
                            <span class="Txt">No. of Person's Walked In</span>
                            <span class="TxtHghlgt">362</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Details">
                        </div>
                    </li>
                    <li class="Dtls Feedback">
                        <div class="Hldr">
                            <span class="Txt">Feedback</span>
                        </div>
                        <div class="Hldr Fdbck Good">
                            <span class="Grade">Good</span>
                            <span class="Value">60/80</span>
                        </div>
                        <div class="Hldr Fdbck Average">
                            <span class="Grade">Average</span>
                            <span class="Value">15/80</span>
                        </div>
                        <div class="Hldr Fdbck Bad">
                            <span class="Grade">Bad</span>
                            <span class="Value">5/80</span>
                        </div>
                    </li>
                </ul>
                <ul class="CntntDtls">
                    <li class="Frst">
                        <span class="TlNm Bld Txt">Hi-Tech City Clean Toilets</span>
                        <span class="Txt Bld">Address:</span>
                        <span class="Txt">Swachh Public Toilet, Jai Hind Gandhi Rd, VIP Hills, Jai Hind Enclave, Madhapur, Hyderabad, Telangana - 500001</span>
                    </li>
                    <li class="Dtls RFID">
                        <div class="Hldr">
                            <span class="Txt">No. of times swiped</span>
                            <span class="TxtHghlgt">6</span>
                        </div>
                        <div class="Hldr">
                            <span class="Txt">No. of times cleaning verified</span>
                            <span class="TxtHghlgt">3</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Details">
                        </div>
                    </li>
                    <li class="Dtls Stink Bad">
                        <div class="Hldr">
                            <span class="Txt">Stink Level</span>
                            <span class="TxtHghlgt">50%</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Acceptable">
                        </div>
                    </li>
                    <li class="Dtls WaterLevel">
                        <div class="Hldr">
                            <span class="TxtTtl">Water Level</span>
                            <span class="TxtHghlgt">50%</span>
                            <span class="Txt">25 Lts</span>
                        </div>
                        <div class="Hldr">
                            <span class="TxtTtl">Water Consumed</span>
                            <span class="TxtHghlgt">5</span>
                            <span class="Txt">Lts</span>
                        </div>
                    </li>
                    <li class="Dtls Footfall">
                        <div class="Hldr">
                            <span class="Txt">No. of Person's Walked In</span>
                            <span class="TxtHghlgt">362</span>
                        </div>
                        <div class="Hldr">
                            <input type="button" class="Btn" value="Details">
                        </div>
                    </li>
                    <li class="Dtls Feedback">
                        <div class="Hldr">
                            <span class="Txt">Feedback</span>
                        </div>
                        <div class="Hldr Fdbck Good">
                            <span class="Grade">Good</span>
                            <span class="Value">60/80</span>
                        </div>
                        <div class="Hldr Fdbck Average">
                            <span class="Grade">Average</span>
                            <span class="Value">15/80</span>
                        </div>
                        <div class="Hldr Fdbck Bad">
                            <span class="Grade">Bad</span>
                            <span class="Value">5/80</span>
                        </div>
                    </li>
                </ul> -->
            </div>
        </div>
      <div class="Footer"><span class="Cpyrght">&copy; www.wenalytics.com</span></div>
    </div>
</body>
<script type="text/javascript">
setInterval(fetchSodexoData, 10000);
    function fetchSodexoData()
              {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                console.log(today);
               
                  var urlString = "<?php echo base_url();  ?>Sodexo/getSodexoData";
                  $.ajax({
                      url:urlString,
                      type : 'GET',
                      async: true,
                      data: {date:today},
                      success: function(data){
                        console.log("success"+data);
                        displaySodexoData(data);
                      }
                    });
              }
function displaySodexoData(data)
    {
    var d = JSON.parse(data);
    $("#sodexodata").empty();
    var $container = $("#sodexodata");
    var div='';
    
    // for (var i = 0; i < d.length; i++)
    // {
        // if(i==0){
            div+='<ul class="CntntDtls"><li class="Frst Hdr"><span class="MnTtl">Dashboard</span></li><li class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg RFID" /><span class="HdrTtl">RFID Janitor Attendance</span></li><li class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Stink Sensor</span></li><li class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg WaterLevel" /><span class="HdrTtl">Water Level Sensor</span></li><li class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg Footfall" /><span class="HdrTtl">Footfall Sensor</span></li><li class="Dtls Hdr Lst"><img src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Images/Blank.png" class="HdrImg Feedback" /><span class="HdrTtl">Feedback Buttons</span></li></ul>';
        // }
    
     div+='<ul class="CntntDtls"><li class="Frst"><span class="TlNm Bld Txt">Sodexo Clean Toilets</span><span class="Txt Bld">Address:</span><span class="Txt">'+d[0]['StationName']+'</span></li><li class="Dtls RFID"><div class="Hldr"><span class="Txt">No. of times swiped</span><span class="TxtHghlgt">6</span></div><div class="Hldr"><span class="Txt">No. of times cleaning verified</span><span class="TxtHghlgt">3</span></div><div class="Hldr"><input type="button" class="Btn" value="Details"></div></li><li class="Dtls Stink Good"><div class="Hldr"><span class="Txt">Stink Level</span><span class="TxtHghlgt">16%</span></div><div class="Hldr"><input type="button" class="Btn" value="Acceptable"></div></li><li class="Dtls WaterLevel"><div class="Hldr"><span class="TxtTtl">Water Level</span><span class="TxtHghlgt">50%</span><span class="Txt">25 Lts</span></div><div class="Hldr"><span class="TxtTtl">Water Consumed</span><span class="TxtHghlgt">25</span><span class="Txt">Lts</span></div></li><li class="Dtls Footfall"><div class="Hldr"><span class="Txt">No. of Persons Walked In</span><span class="TxtHghlgt">'+Math.round((d[0]['footfallcountMale']/2))+'</span></div><div class="Hldr"><input type="button" class="Btn" value="Details"></div></li><li class="Dtls Feedback"><div class="Hldr"><span class="Txt">Feedback</span></div><div class="Hldr Fdbck Good"><span class="Grade">Good</span><span class="Value">60/80</span></div><div class="Hldr Fdbck Average"><span class="Grade">Average</span><span class="Value">15/80</span></div><div class="Hldr Fdbck Bad"><span class="Grade">Bad</span><span class="Value">5/80</span></div></li></ul>';

     div+='<ul class="CntntDtls">';
     if(d[1]['HandTowel']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/towel.png" class="HdrImg" /></li>';
     }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/towel.png" class="HdrImg" /></li>';
     }
     if(d[1]['Toiletroll']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/toilet-paper.png" class="HdrImg" /></li>';
     }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/toilet-paper.png" class="HdrImg" /></li>';
     }
     if(d[1]['DustbinFull']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /></li>';
     }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /></li>';
     }
     if(d[1]['FloorWet']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/wet-floor.png" class="HdrImg" /></li>';
    }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/wet-floor.png" class="HdrImg" /></li>';
    }
    if(d[1]['FloorDry']==1){
    div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/dry-floor.png" class="HdrImg" /></li>';
    }else{
       div+='<li class="Dtls1 krishna Lst" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/dry-floor.png" class="HdrImg" /></li>'; 
    }
     if(d[1]['HandSoap']==1){
    div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/washing-hands.png" class="HdrImg" /></li>';
    }else{
       div+='<li class="Dtls1 krishna Lst" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/washing-hands.png" class="HdrImg" /></li>'; 
    }
    if(d[1]['NoDustbin']==1){
    div+='<li class="Dtls1 krishna Lst" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /></li>';
    }else{
       div+='<li class="Dtls1 krishna Lst" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /></li>'; 
    }
    
  
    div+='</ul>';
    
    // }
    $container.append(div);
}
</script>
</html>
