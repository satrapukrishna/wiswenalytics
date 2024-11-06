
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>/asset/ambienceasset/asset/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Scripts/Script.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <style type="text/css">
    body {
      overflow-x:hidden;overflow-y:hidden
    }
    .Wrapper {
      margin: 15px!important;
    } 
    div.DshbordCntr{
      margin:0px!important
    }
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
    .tick0::after {
    content: '\2715';
    font-size: 20px;
    line-height: 20px;
    font-weight: bold;
    color: red;
    }
    .tick1::after {
    content: '\2713';
    font-size: 20px;
    line-height: 20px;
    font-weight: bold;
    color: green;
    }
    .Table{
    width: 100%;
    /* table-layout: fixed; */
    }
    .fd{
    text-transform:capitalize;
    }
    #list2 td
    {
    text-align: center; 
    vertical-align: middle;
    }
    #list2 th 
    {
    text-align: center; 
    vertical-align: middle;
    }
    div.Header {
    height:5px!important;
    }
    .SgnOt{
    top: 15px!important;
    /*background-color: #02918d!important;*/
    margin-right:15px!important;
    }
    div.DshbordCntr div.DshbrdHdr div.SctnSlctr span.SctnNm {
    width: 100%!important;
    }
    span.SctnNm a{
    color:white!important;
    text-decoration: none!important;
    }
    
    div.DshbordCntr div.DshbrdHdr div.SctnSrch ul.SrchLst li {padding: 15px 5px 10px 5px!important;}
    .middle-content{position: absolute!important;
    top: 185px!important;
    bottom: 20px!important;
    right: 0!important;
    margin: 0px 15px 0px 15px!important;
    background: #fff!important;
    left: 0!important;
    overflow-y: auto!important;}
    table th{color:#02918d!important}
    .style-2::-webkit-scrollbar-track
    {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
    }

    .style-2::-webkit-scrollbar
    {
    width: 12px;
    background-color: #F5F5F5;
    }

    .style-2::-webkit-scrollbar-thumb
    {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #b9dcdb;
    }
    .btnrset{
    background: #07716f;
    color: #fff;
    padding: 5px 0;
    font: 600 11px 'Open Sans';
    cursor: pointer;
    border: none;
    width: 30%;
    border-radius: 10px;
    text-transform: uppercase;
    text-align: center;
    }
    .btnrset:hover{
    color: #fff;
    text-decoration: none;

    }
    .btn5{
      color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    }
    .lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
  margin-left:50%;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #073d2b;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}

    </style>
    <script type="text/javascript">  
    
  
  
  </script>
</head>
<body >
    <div class="Wrapper">
    <div style="position:absolute; top:15px; left:15px; height:70px; right:15px;overflow:hidden;">
        <div class="Header">
            <div class="Logo">
            </div>
            <div class="UserMenu">
              <a href="<?php echo base_url(); ?>Login/wrllogin"><img class="SgnOt" src="<?php echo base_url(); ?>asset/ambienceasset/images/MenuLogout-C.png"></a>
            </div>
          </div>
          <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr" style="border-bottom:#fff">
              <div class="row SctnSlctr" style="width: 100%;">
                <div class="col-md-1" style="width: 10%;" id="links">
                  <span class="SctnNm">
                    <a href="<?php echo site_url('WashroomData/demoData') ?>" class="Lnk">Dashboard</a>
                  </span>
                </div>
                <div class="col-md-1" style="width: 10%;" id="links">
                  <span class="SctnNm">
                    <a href="<?php echo site_url('WashroomData/getReport') ?>" class="Lnk">Reports</a>
                  </span>
                </div>
                <div class="col-md-1" style="width: 10%;" id="links">
                  <span class="SctnNm">
                    <a href="<?php echo site_url('WashroomData/map') ?>" class="Lnk">MapView</a>
                  </span>
                </div>
               
               
                <div class="col-md-1" style="width: 11%;margin-top:18px;" id="links">
                    <div class="LstRgt">
                      <input style="width:150px" type="date" name="fromdate" id="fromdate" data-placeholder="From date" required aria-required="true">
                    </div>
                </div>
                <div class="col-md-1" style="display: visible;width: 11%;margin-top:18px;" id="dst">
                    <div class="LstRgt" >
                      <input style="width:150px" type="date" name="todate" id="todate" data-placeholder="To date" required aria-required="true">
                    </div>
                </div>
                <div class="col-md-3" style="width: 20%;margin-top:10px;" id="reportsid">
                    <!-- <div class="LstRgt"> -->
                    <input type="button" class="btn5" value="Go" onclick="getReports();"/>
                    <input type="button" class="btn5" value="Reset" onClick="window.location.reload()"/>
                    <input type="button" class="btn5"  id="export"   onclick="exportTableToExcel('list1')" style="display: none;" value="Export">
                    <input type="button" class="btn5"  id="export_foot"   onclick="exportTableToExcel_foot('list_footfall')" style="display: none;" value="Export">
                    <input type="button" class="btn5"  id="export_water"   onclick="exportTableToExcel_water('list1_water')" style="display: none;" value="Export">
                    <input type="button" class="btn5"  id="export_water_con"   onclick="exportTableToExcel_water_con('list1_water_con')" style="display: none;" value="Export">
                    <input type="button" class="btn5"  id="export_odour"   onclick="exportTableToExcel_odour('list1_odour')" style="display: none;" value="Export">
                    <input type="button" class="btn5"  id="export1"   onclick="exportTableToExcel1('list3')" style="display:none;" value="Export">
                    <!-- </div> -->
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div id="DshBrd" class="DshbordCntr style-2" style="position:absolute; top:90px; bottom:40px; left:15px; right:15px; overflow:auto;">
        <div class="lds-ellipsis" id="loading" style="display:none;"><div></div><div></div><div></div><div></div></div>
          <div id="alert">

          </div>
          <div class="CntntHldr table-responsive">
            <div class="style-2"  id="consolidate" style="display: none;min-height: 500px;">
            </div>
          </div>
          <div class="CntntHldr table-responsive">

          </div>
          <div id="tab" style="display: none;">
            <table id ="list1" class="table table-bordered table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Meter</th>
                  <th>Date/Time</th>
                  <th>Footfall Male</th>
                  <th>Footfall Female</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div id="tab4" style="display: none;">
            <table id ="list_footfall" class="table table-bordered table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Meter</th>
                  <th>FromDate</th>
                  <th>ToDate</th>
                  <th>No Of Days</th>
                  <th>Total Footfall Male</th>
                  <th>Average Footfall Male</th>
                  <th>Total Footfall Female</th>
                  <th>Average Footfall Female</th>
                  <th>Total Footfall</th>
                  <th>Average Footfall Total</th>
                  <th>Power Availability</th>
                  <th>Water Consumption/ Availability</th>
                  <th>Leakage/ Unavialibility</th>
                  <th>Water Consumption per Footfall</th>
                  <th>Male Unacceptable  Odour Count</th>
                  <th>Male Unacceptable Highest Odour</th>
                  <th>Female Unacceptable  Odour Count</th>
                  <th>Female Unacceptable Highest Odour</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div id="tab2" style="display: none;">
            <table id ="list1_water" class="table table-bordered table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Water Leakage(Liters)</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div id="tab5" style="display: none;">
            <table id ="list1_water_con" class="table table-bordered table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Date</th>
                  <th>Consumption(Liters)</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div id="tab3" style="display: none;">
            <table id ="list1_odour" class="table table-bordered table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Date</th>
                  <th>Male Odour Count</th>
                  <th>Male High Odour</th>
                  <th>Female Odour Count</th>
                  <th>Female High Odour</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div id="supervsr" style="display: none;">
            <table id ="list2" class="table table-bordered table-hover" style="width: 100%;border: 1px">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Checking Time</th>
                  <th>Hand Towel</th>
                  <th>Toilet Roll</th>
                  <th>Dustbin</th>
                  <th>Floor Wet/Dry</th>
                  <th>Handsoap</th>
                  <th>Odour</th>
                  <th>Feedback</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
              <table id ="list3" class="table table-bordered table-hover" style="width: 100%;border: 1px;display: none;">
                <thead>
                  <tr>
                    <th>SNo</th>
                    <th>Checking Time</th>
                    <th>Hand Towel</th>
                    <th>Toilet Roll</th>
                    <th>Dustbin</th>
                    <th>Floor Wet/Dry</th>
                    <th>Handsoap</th>
                    <th>Odour</th>
                    <th>Feedback</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <div id="containter1" style="display: none;"></div>
            <div id="odourleft" style="display: none;"></div>
            <div id="odourright" style="display: none;"></div>
            <div id="janitor1" style="display: none;"></div>
            <div id="janitor2" style="display: none;"></div>
            <div id="feedback" style="display: none;"></div>
          </div>
          <div class="Footer" style="position:absolute; bottom:0px; height:40px; left:0px; right:0px; overflow:hidden;"> 
            <span class="Cpyrght">&copy; www.wenalytics.com</span>
          </div>
        </div>
</body>
<script type="text/javascript">

  
  function getReports(){
    var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
        var urlString = "<?php echo base_url(); ?>WashroomData/consolidatedReportTabular";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData(obj);
          }
        });
  }
  function appendData(obj){
    $("#list_footfall tbody").empty();
       
       document.getElementById("tab4").style.display="block";
       var rows="";
       var j=1;
       // alert(obj.length);
       // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
       for (var i = 0; i < obj.length; i++) 
       {
        if(obj[i]['station']==2022000112 || obj[i]['station']==2022000113){
          rows += "<tr><td>" + j + "</td><td>" +obj[i]['location'] + "</td><td>" +obj[i]['fromdate'] + "</td><td>" + obj[i]['todate'] + "</td><td>" + obj[i]['totaldays'] + "</td><td>" + obj[i]['male_footfall'] + "</td><td>" + obj[i]['male_footfall_avg'] + "</td><td>" + obj[i]['female_footfall'] + "</td><td>" + obj[i]['female_footfall_avg'] + "</td><td>" + obj[i]['total_footfall'] + "</td><td>" + obj[i]['total_footfall_avg'] + "</td><td>" + obj[i]['power'] + "</td><td>" + obj[i]['water_cons'] + "</td><td>" + obj[i]['water_leak'] + "</td><td>" + obj[i]['water_cons_per_footfall'] + "</td><td>" + obj[i]['unaccept']['od_male_count'] + "</td><td>" + obj[i]['unaccept']['od_male_high'] + "</td><td>" + obj[i]['unaccept']['od_female_count'] + "</td><td>" + obj[i]['unaccept']['od_female_high'] + "</td></tr>"; 
        }else{
          rows += "<tr><td>" + j + "</td><td>" +obj[i]['location'] + "</td><td>" +obj[i]['fromdate'] + "</td><td>" + obj[i]['todate'] + "</td><td>" + obj[i]['totaldays'] + "</td><td>" + obj[i]['male_footfall'] + "</td><td>" + obj[i]['male_footfall_avg'] + "</td><td>" + obj[i]['female_footfall'] + "</td><td>" + obj[i]['female_footfall_avg'] + "</td><td>" + obj[i]['total_footfall'] + "</td><td>" + obj[i]['total_footfall_avg'] + "</td><td>" + obj[i]['power'] + "</td><td>" + obj[i]['power'] + "</td><td>" + obj[i]['power_unavl'] + "</td><td>" + obj[i]['water_cons_per_footfall'] + "</td><td>" + obj[i]['unaccept']['od_male_count'] + "</td><td>" + obj[i]['unaccept']['od_male_high'] + "</td><td>" + obj[i]['unaccept']['od_female_count'] + "</td><td>" + obj[i]['unaccept']['od_female_high'] + "</td></tr>"; 
        }
                    
         j++;    
       }

       $(rows).appendTo("#list_footfall tbody");
       document.getElementById("loading").style.display="none";
       document.getElementById("export").style.display="none";
       document.getElementById("export_foot").style.display="inline";
  }
  function exportTableToExcel(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'FootfallReport.xls';
    
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
  function exportTableToExcel_foot(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'FootfallAnalysisReport.xls';
    
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
  function exportTableToExcel_water(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'LeakageReport.xls';
    
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
  function exportTableToExcel_water_con(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'WaterConsumptionReport.xls';
    
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
  function exportTableToExcel_odour(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'HigherOdourReport.xls';
    
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
  function exportTableToExcel1(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'SupervisorReport.xls';
    
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

  //start consolidate
  function isDate(dateArg) {
    var t = (dateArg instanceof Date) ? dateArg : (new Date(dateArg));
    return !isNaN(t.valueOf());
}

function isValidRange(minDate, maxDate) {
    return (new Date(minDate) <= new Date(maxDate));
}

function betweenDate(startDt, endDt) {
    var error = ((isDate(endDt)) && (isDate(startDt)) && (isValidRange(startDt, endDt))) ? false : true;
    var between = [];
    if (error) console.log('error occured!!!... Please Enter Valid Dates');
    else {
        var currentDate = new Date(startDt),
            end = new Date(endDt);
        while (currentDate <= end) {
            between.push(formatDate(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }
    }
    return between;
}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}



  //end consolidate
</script>
</html>
