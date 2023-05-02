<!-- sodexo dashboard1 reports on jan 8th -->
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
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/asset/sodexoasset/asset/Scripts/Script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <style type="text/css">
      .logoutLblPos{
         position:fixed;
         right:10px;
         top:5px;
      }
      #submit2 
      {
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
      div.DshbordCntr div.DshbrdHdr div.SctnSrch ul.SrchLst li input.Btn1
      {
        background: #07716f;
        color: #fff;
        padding: 5px 0;
        font: 600 11px 'Open Sans';
        cursor: pointer;
        border: none;
        width: 30%;
        border-radius: 10px;
        text-transform: uppercase;
      }
    </style>
    <script type="text/javascript"> 
    function showReport()
    {
        // alert("welcome report ui");
        document.getElementById("sodexodata").style.display='none';
        document.getElementById("reportsid").style.display='block';
        // $('reportsid').addClass('SctnNm.Active');
        // document.getElementById("reportsid").style.border-bottom='8px solid #b9dcdb';
    }
    function showDashboard()
    {
        // alert("welcome report ui");
        document.getElementById("reportsid").style.display='none';
        document.getElementById("sodexodata").style.display='block';
        
    }
    function getSodexoReport()
    {
      document.getElementById("loading").style.display="block";
      var fromtime = document.getElementById("fromtime").value;
      var totime = document.getElementById("totime").value;
      var fromdate = document.getElementById("fromdate").value;
      var todate = document.getElementById("fromdate").value;    
  
      var urlString = "<?php echo base_url(); ?>FuelReport/getSodexoReport";
      $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
          var obj = JSON.parse(data);
          console.log(obj);
          // alert(obj);
          // appendData(obj,k,noofmeters);
          //k++;
          appendData(obj);
        }
      });   
    }

    function appendData(obj)
    {
      // alert(obj);
      // document.getElementById("export").disabled=false;
      var rows="";
      var j=1;
      // alert(obj.length);
      for (var i = 0; i < obj.length; i++) 
      {
        rows += "<tr><td>" + j + "</td><td>RestRoom</td><td>" + obj[i]['Date'] + "</td><td>" +obj[i]['Time'] + "</td><td>" + obj[i]['footfall'] + "</td></tr>";            
        j++;    
      }

      $(rows).appendTo("#list1 tbody");
      document.getElementById("loading").style.display="none";
      document.getElementById("export").style.display="block";
      
    }

    </script>
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
                    <span class="SctnNm Active" onclick="showDashboard()">Dashboard</span>
                    <span class="SctnNm" onclick="showReport()">Reports</span>
                </div>
                <!-- reports related code starts  -->
                <div class="SctnSrch" style="display: none;" id="reportsid">
                    <ul class="SrchLst">
                        <li>
                            <div class="LstLft"><span class="Txt">Meter</span></div>
                            <div class="LstRgt">
                                <!-- <input type="text" class="Inpt" value="RestRoom" /> -->
                                <select class="Inpt">
                                    <option>RestRoom</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">From date</span></div>
                            <div class="LstRgt"><input type="date" name="fromdate" id="fromdate" data-placeholder="" required aria-required="true"></div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">From time</span></div>
                            <div class="LstRgt">
                               <select name="fromtime" id="fromtime">
                                   <option value="Select Hours From">Select Hours From</option>
                                      <?php 
                                        $j = 24;$list = "";$options = array();
                                        for($i=0;$i<=$j ;$i++){
                                        if($i<10)
                                        $options[$i] =  "0".$i.":00:00";
                                        else
                                        $options[$i] =  $i.":00:00";
                                        }
                                        foreach ($options as $value) {
                                        //$list .= "<option value=".$value.">".$value."</option>";
                                          if($value == "00:00:00"){
                                                $list .= "<option value=".$value." >".$value."</option>";
                                              }else{
                                                $list .= "<option value=".$value.">".$value."</option>";
                                              }
                                        }
                                        echo $list;
                                      ?>
                               </select>
                            </div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">To time</span></div>
                            <div class="LstRgt">    
                               <select id="totime" name="totime">
                                   <option value="Select Hours To">Select Hours To</option>
                                  <?php 
                                    $j = 24;$list = "";$options = array();
                                    for($i=0;$i<=$j ;$i++){
                                    if($i<10)
                                    $options[$i] =  "0".$i.":00:00";
                                    else
                                    $options[$i] =  $i.":00:00";
                                    }
                                    foreach ($options as $value) {
                                    //$list .= "<option value=".$value.">".$value."</option>";
                                      if($value == "00:00:00"){
                                            $list .= "<option value=".$value." >".$value."</option>";
                                          }else{
                                            $list .= "<option value=".$value.">".$value."</option>";
                                          }
                                    }
                                    echo $list;
                                  ?>
                               </select>
                            </div>
                        </li>
                        <li>
                            <input type="button" class="Btn1" value="Go" onclick="getSodexoReport()";/>
                            <input type="button" class="Btn1"  id="export"   onclick="exportTableToExcel('list')" style="display: none;" value="Export">
                        </li>
                    </ul>
                   
                </div>
                <!-- reports related code end -->
            </div>
            


            <div class="CntntHldr" id="sodexodata"> 
                
            </div>

            <!-- animation starts -->
            <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <!-- animation end -->

            <div id = "tab">
              <table id = "list1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SNo</th>
                    <th>Meter</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Footfall</th>                    
                  </tr>
                </thead>

                <tbody>

                </tbody>

              </table>
            </table>
        </div>
      <div class="Footer"><span class="Cpyrght">&copy; www.wenalytics.com</span></div>
    </div>
</body>
<script type="text/javascript">
setInterval(fetchSodexoData, 1000000);
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
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/towel.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['HandTowelTime']+'</b></div></li>';
     }
     if(d[1]['Toiletroll']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/toilet-paper.png" class="HdrImg" /></li>';
     }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/toilet-paper.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['ToiletrollTime']+'</b></div></li>';
     }
     if(d[1]['DustbinFull']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /></li>';
     }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['DustbinFullTime']+'</b></div></li>';
     }
     if(d[1]['FloorWet']==1){
        div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/wet-floor.png" class="HdrImg" /></li>';
    }else{
        div+='<li class="Dtls1 krishna" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/wet-floor.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['FloorWetTime']+'</b></div></li>';
    }
    if(d[1]['FloorDry']==1){
    div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/dry-floor.png" class="HdrImg" /></li>';
    }else{
       div+='<li class="Dtls1 krishna Lst" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/dry-floor.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['FloorDryTime']+'</b></div></li>'; 
    }
     if(d[1]['HandSoap']==1){
    div+='<li class="Dtls1 krishna" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/washing-hands.png" class="HdrImg" /></li>';
    }else{
       div+='<li class="Dtls1 krishna Lst" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/washing-hands.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['HandSoapTime']+'</b></div></li>'; 
    }
    if(d[1]['NoDustbin']==1){
    div+='<li class="Dtls1 krishna Lst" style="width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /></li>';
    }else{
       div+='<li class="Dtls1 krishna Lst" style="background:#f5737e;width:160px;"><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png" class="HdrImg" /><div style="background-color:white"><b>Time:'+d[1]['NoDustbinTime']+'</b></div></li>'; 
    }
    
  
    div+='</ul>';
    
    // }
    $container.append(div);
}

function exportTableToExcel(tableID,filename = '')
{
  // alert('hello');
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // // Specify file name
    filename = filename?filename+'.xls':'footfall.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
</html>
