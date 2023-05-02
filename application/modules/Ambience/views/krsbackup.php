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
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Dashboard.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Dashboard.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/asset/ambienceasset/asset/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Scripts/Script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
        .SgnOt {
                    
                    width: 40px;
                    height: 40px;
                    margin-right: 20px;
                    background-size: 48%;
                    cursor: pointer;
                    position: relative;
                }
    </style>
    <script type="text/javascript">    
      function showReport()
      {
          // alert("welcome report ui");
          document.getElementById("tab").style.display='block';
          document.getElementById("sodexodata").style.display='none';
          document.getElementById("reportsid").style.display='block';
          document.getElementById("containter1").style.display='block';
          // $('reportsid').addClass('SctnNm.Active');
          // document.getElementById("reportsid").style.border-bottom='8px solid #b9dcdb';
      }
      function showDashboard()
      {
          // alert("welcome report ui");
          document.getElementById("reportsid").style.display='none';
          document.getElementById("containter1").style.display='none';
          document.getElementById("sodexodata").style.display='block';
          document.getElementById("tab").style.display='none';
          
      }
      function getSodexoReport()
      {
        document.getElementById("loading").style.display="block";
        var fromtime = document.getElementById("fromtime").value;
        var totime = document.getElementById("totime").value;
        var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("fromdate").value;    
    
        var urlString = "<?php echo base_url(); ?>Sodexo/getSodexoReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData(obj);
          }
        });   
      }
      function appendData(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list1 tbody").empty();
        var hoursxaxisarray=[];
        var footfallyaxisarray=[];
        document.getElementById("tab").style.display="block";
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
        for (var k = 0; k < obj.length; k++) 
        {
          hoursxaxisarray[k]=obj[k]['Time'];
          footfallyaxisarray[k]=obj[k]['footfall'];
        }
        addGraph(hoursxaxisarray,footfallyaxisarray);
      }  
      function addGraph(hoursxaxisarray,footfallyaxisarray) 
      {
        // var data_click = <?php echo $click; ?>;
        // var data_viewer = <?php echo $viewer; ?>;
        $('#containter1').highcharts({
          chart: {
              type: 'column'
          },
          title: {
              text: 'Hourly Visited Members Report'
          },
          xAxis: {
              categories: hoursxaxisarray
          },
          yAxis: {
              title: {
                  text: 'FootFall'
              }
          },
          series: [{
              name: 'Hours',
              data: footfallyaxisarray
          }]
        });
      }

  </script>
</head>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">

<nav class="navbar navbar-inverse navbar-fixed-top" style="background: #07716f;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Wenalytics</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Dashboard</a></li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Graph Report</a></li>
            <li><a href="#">Janitor Report</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
     <div class="UserMenu" style="margin-left: 95%;">
            <a href="<?php echo base_url(); ?>Login/dltlogout"><img class="SgnOt" src="<?php echo base_url(); ?>/asset/ambienceasset/images/MenuLogout-W.png"></a>
                <!-- <span class="UsrNm">Sodexo User</span> -->
            </div>
  </div>
</nav>
  
<div class="container" style="margin-top:50px">
  <!-- <h3>Fixed Navbar</h3> -->
  <div class="row">
    <div>
          <div class="Wrapper">
           <div id="DshBrd" class="DshbordCntr">
            <div class="CntntHldr" id="sodexodata">
                              
            </div>
          </div>

          </div>
    </div>
    <div class="col-md-4"> 
      
    </div>
    <div class="col-md-4"> 
     
    </div>
  </div>
</div>


</body>
<body onload="fetchSodexoData()">
    <div class="Wrapper">
      <!--   <div class="Header">
            <div class="Logo">

                <span class="CmpNm"> <img src="<?php echo base_url(); ?>/asset/prkhospitalasset/Images/wenalytics logo.png" class="HdrImg Footfall" /></span>
            </div>
            <div class="UserMenu">
            <a href="<?php echo base_url(); ?>Login/dltlogout"><img class="SgnOt" src="<?php echo base_url(); ?>/asset/ambienceasset/images/MenuLogout-W.png"></a>
               
            </div>
                      
           
           
        </div> -->
        <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr">
                <div class="SctnSlctr">
                    <span class="SctnNm" onclick="showDashboard()">Dashboard</span>
                    <span class="SctnNm" onclick="showReport()">Reports</span>
                </div>
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
                            <input type="button" class="Btn1"  id="export"   onclick="exportTableToExcel('list1')" style="display: none;margin-left: 10px;" value="Export">
                        </li>
                    </ul>
                   
                </div>
            </div>
            

            <!-- <div id="DshBrd" class="DshbordCntr"> -->
           
           
            <!-- animation starts -->
            <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <!-- animation end -->

            <div id="tab" style="display: none;">
              <table id ="list1" class="table table-bordered table-hover" style="width: 1200px;">
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

            </div>
            <div id="containter1"></div>
            
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
   
      var urlString = "<?php echo base_url();  ?>Ambience/getSodexoData";
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
      div+='<div class="CntntDtls Hdr"><div class="Frst Hdr"><span class="MnTtl">Dashboard</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg RFID" /><span class="HdrTtl">RFID Janitor Attendance</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Right</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Left</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Footfall" /><span class="HdrTtl">Footfall Sensor</span></div><div class="Dtls Hdr Lst"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Feedback" /><span class="HdrTtl">Feedback Buttons</span></div></div>'; 
     div+='<div class="CntntDtls"><div class="Frst"><span class="TlNm Bld Txt">Ambiance Tower 5th Floor</span><span class="Txt Bld">Address:</span><span class="Txt">Gurgaon</span></div><div class="Scnd"><div class="Dtls RFID"><div class="Hldr"><span class="Txt">No. of times swiped</span><span class="TxtHghlgt">'+d[0]['swiped']+'</span></div><div class="Hldr"><span class="Txt">No.of times cleaning verified</span><span class="TxtHghlgt">'+d[0]['verified']+'</span></div><div class="Hldr"><input type="button" class="Btn" value="Details"></div></div><div class="Dtls Footfall"><div class="Hldr"><span class="Txt">Odour Level</span><span class="TxtHghlgt">'+d[0]['OdourMaleRight']+' ppm</span></div><div class="Hldr"><input type="button" class="Btngreen" id="Btngreen" value="Acceptable"></div></div><div class="Dtls Footfall"><div class="Hldr"><span class="Txt">Odour Level</span><span class="TxtHghlgt">'+d[0]['OdourMaleLeft']+' ppm</span></div><div class="Hldr"><input type="button" class="Btngreenl" id="Btngreenl" value="Acceptable"></div></div><div class="Dtls Footfall"><div class="Hldr"><span class="Txt">No. of Persons Walked In</span><span class="TxtHghlgt">'+Math.round((d[0]['footfallcountMale']/2))+'</span></div><div class="Hldr"><input type="button" class="Btn" value="Details"></div></div><div class="Dtls Feedback"><div class="Hldr"><span class="Txt">Feedback</span></div><div class="Hldr Fdbck Good"><span class="Grade">Good</span><span class="Value">00/00</span></div><div class="Hldr Fdbck Average"><span class="Grade">Average</span><span class="Value">00/00</span></div><div class="Hldr Fdbck Bad"><span class="Grade">Bad</span><span class="Value">00/00</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Hand Towel</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HndTwl Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="handavl" style="display: visible;">Available</span><span class="NATxt" id="handnoavl" style="display: none;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Toilet Rolls</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="TltRlls Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="toiletrollavl" style="display: none;">Available</span><span class="Stext" id="toiletrollnoavl" style="display: visible;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Dustbin</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="DstBn Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="dustbinavl" style="display: none;">Available</span><span class="Stext" id="dustbinnoavl" style="display: visible;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Floor</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="Flr Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="flooravl" style="display: visible;">Dry</span><span class="NATxt" id="floornoavl" style="display: none;">FloorWet</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Hand Soap</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HndSp Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="handsoapavl" style="display: visible;">Available</span><span class="NATxt" id="handsoapnoavl" style="display: none;">Not Available</span></div></div></div></div>';

       // 
      
      $container.append(div);
//odour
if (d[0]['OdourMaleRight']>=0 && d[0]['OdourMaleRight']<55 ) {
$('#Btngreen').val("Clean");
}
if (d[0]['OdourMaleRight']>=55 && d[0]['OdourMaleRight']<125 ) {
$('.Btngreen').addClass('Btnyellow').removeClass('Btngreen');
$('#Btngreen').val("Acceptable");
}
if (d[0]['OdourMaleRight']>125 ) {
$('.Btngreen').addClass('Btnred').removeClass('Btngreen');
$('#Btngreen').val("Unacceptable");
}


if (d[0]['OdourMaleLeft']>=0 && d[0]['OdourMaleLeft']<55 ) {
$('#Btngreenl').val("Clean");
}
if (d[0]['OdourMaleLeft']>=55 && d[0]['OdourMaleLeft']<125 ) {
$('.Btngreenl').addClass('Btnyellowl').removeClass('Btngreenl');
$('#Btngreenl').val("Acceptable");
}
if (d[0]['OdourMaleLeft']>125 ) {
$('.Btngreenl').addClass('Btnredl').removeClass('Btngreenl');
$('#Btngreenl').val("Unacceptable");
}
//oudor end
      if(d[1]['HandTowel']==1){
          $("#handavl").show();
          $("#handnoavl").hide();
      }else{
          $("#handavl").hide();
          $("#handnoavl").show(); 
                 
      }  
      if(d[1]['DustbinFull']==1){
          $("#dustbinavl").show();
          $("#dustbinnoavl").hide();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');
      }else{
          $("#dustbinavl").hide();
          $("#dustbinnoavl").show();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');

      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl").show();
          $("#toiletrollnoavl").hide();
      }else{
          $("#toiletrollavl").hide();
          $("#toiletrollnoavl").show();
      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl").show();
          $("#toiletrollnoavl").hide();
      }else{
          $("#toiletrollavl").hide();
          $("#toiletrollnoavl").show();
      }
      if(d[1]['FloorWet']==1){
          $("#flooravl").show();
          $("#floornoavl").hide();
      }else{
          $("#flooravl").hide();
          $("#floornoavl").show();
      }
      if(d[1]['HandSoap']==1){
          $("#handsoapavl").show();
          $("#handsoapnoavl").hide();
      }else{
          $("#handsoapavl").hide();
          $("#handsoapnoavl").show();
      }

      if(d[1]['HandTowel']==1){
          $("#handavl").show();
          $("#handnoavl").hide();
      }else{
          $("#handavl").hide();
          $("#handnoavl").show(); 
                 
      }  
      if(d[1]['DustbinFull']==1){
          $("#dustbinavl1").show();
          $("#dustbinnoavl1").hide();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');
      }else{
          $("#dustbinavl1").hide();
          $("#dustbinnoavl1").show();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');

      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl1").show();
          $("#toiletrollnoavl1").hide();
      }else{
          $("#toiletrollavl1").hide();
          $("#toiletrollnoavl1").show();
      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl1").show();
          $("#toiletrollnoavl1").hide();
      }else{
          $("#toiletrollavl1").hide();
          $("#toiletrollnoavl1").show();
      }
      if(d[1]['FloorWet']==1){
          $("#flooravl1").show();
          $("#floornoavl1").hide();
      }else{
          $("#flooravl1").hide();
          $("#floornoavl1").show();
      }
      if(d[1]['HandSoap']==1){
          $("#handsoapavl1").show();
          $("#handsoapnoavl1").hide();
      }else{
          $("#handsoapavl1").hide();
          $("#handsoapnoavl1").show();
      }

  }
  function exportTableToExcel(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'SodexohourlyReport.xls';
    
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
