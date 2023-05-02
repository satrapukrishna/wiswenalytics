<?php
//echo "<pre>";print_r($meters);
//echo "<pre>";print_r($location);
$metervalues = array();
for ($i=0; $i < count($meters); $i++) { 
  //echo $meters[$i]."<br>";
  $meter_names = explode("_", $meters[$i]);
  if(isset($meter_names[4])){
    //print_r($meter_names);echo "<br>";
    $meter_name = $meter_names[0]."_".$meter_names[1]."_".$meter_names[3]."_".$meter_names[4];
  }else if(isset($meter_names[3])){
    $meter_name = $meter_names[0]."_".$meter_names[1]."_".$meter_names[3];
  }else{
    $meter_name = $meter_names[0]."_".$meter_names[1];
  }
  
  //echo $meter_name."<br>";
  array_push($metervalues, $meter_name);
}
//print_r($metervalues);
//die();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wenalytics
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/common-utilits/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../asset/common-utilits/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../asset/common-utilits/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../asset/common-utilits/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../asset/energymeterasset/css/energymeterStyle.css">
    <link rel="shortcut icon" type="imag/x-icon" href="../../asset/common-utilits/dist/img/fav.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php $this->load->view('header/header');?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view('navigation/navigator');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="    width: 57%;">
            Energy Meter Consumption Report
            <!-- <small>Preview sample</small> -->
          </h1>
        </section>
        <div id="alert"></div>
        <!-- Main content -->
        <section class="content">
          <form>
          <div class="row meter-top">
            <label>Select Energy Meter : 
            </label>
            <!--<select id="multiMeter" multiple="multiple" onchange="checkDays()">
              <?php 
            foreach ($meters as $value) {
            ?>
              <option value="<?php echo $value; ?>"> 
                <?php echo $value; ?> 
              </option>
              <?php } ?>
            </select>-->
            <select id="multiMeter" multiple="multiple" onchange="checkDays()">
              <?php 
              for ($i=0; $i < count($meters); $i++) { 
                ?>
                <option value="<?php echo $meters[$i]; ?>"> 
                <?php echo $metervalues[$i]; ?> 
                </option>
              <?php
              }
              ?>
            </select>
            <!--<label>Select Day : 
            </label>-->
            <select id="day" class="">
              <option value="">Select Day
              </option>
              <option value="Monday">Monday
              </option>
              <option value="Tuesday">Tuesday
              </option>
              <option value="Wednesday">Wednesday
              </option>
              <option value="Thursday">Thursday
              </option>
              <option value="Friday">Friday
              </option>
              <option value="Saturday">Saturday
              </option>
              <option value="Sunday">Sunday
              </option>
            </select>
            <select  id="fromtime">
              <option value="Select Hours">Select Hours From
              </option>
              <?php 
                $j = 24;$list = "";$options = array();
                for($i=0;$i<=$j ;$i++){
                if($i<10)
                $options[$i] =  "0".$i.":00:00";
                else
                $options[$i] =  $i.":00:00";
                }
                foreach ($options as $value) {
                  if($value == "00:00:00"){
                    $list .= "<option value=".$value." selected='true'>".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
                
                }
                echo $list;
              ?>
            </select>
            <select  id="totime">
              <option value="Select Hours">Select Hours To
              </option>
              <?php 
                $j = 24;$list = "";$options = array();
                for($i=0;$i<=$j ;$i++){
                if($i<10)
                $options[$i] =  "0".$i.":00:00";
                else
                $options[$i] =  $i.":00:00";
                }
                foreach ($options as $value) {
                  if($value == "24:00:00"){
                    $list .= "<option value=".$value." selected='true'>".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
                }
                echo $list;
              ?>
            </select>
            
            <input type="date" name="fromdate" id="fromdate"  data-placeholder="From Date" required aria-required="true">
            <input type="date" name="todate" id="todate"  data-placeholder="To Date" required aria-required="true">
            <label>Average as per selections </label> <input type="checkbox" id="specific" style="margin-left: 7px;"/>
            <select id="averageType" style="margin-top: 5px;">
              <option value="avgperday">Average Per Day</option>
              <option value="maxperday">Maximum Per Day</option>
              <option value="minperday">Minimum Per Day</option>
              <option value="lastweek">Average Per Last Week</option>
              <option value="lastmonth">Average Per Last Month</option>
              <option value="last6months">Average per Last 6 Months</option>
            </select>
            <button type="button" onclick="getReport()"; class="btn btn-success">Filter
            </button>
            <button  class="btn btn-info" type="reset" >Reset
            </button>
          </div>
        </form>
        <!-- animation starts -->

        <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>

        <!-- animation end -->

          <div class="row" id="chart" style="display: none;">
            <!--<div class="col-md-12" >

              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Report
                  </h3>
                </div>
                <div class="vl box-body">
                  <i class="fa fa-chevron-up" aria-hidden="true">
                  </i>
                  <p>Consumption
                  </p>
                </div>
                <div class="chart" id="chart1">
                 <canvas id="canvas" style="height:290px !important"></canvas>
                </div>
                 <div class="hl">
                      <i class="fa fa-chevron-right" aria-hidden="true">
                      </i>
                      <p>Date
                      </p>
                  </div>
                    <div style="padding-left: 18px;padding-bottom: 10px;display: inline-flex !important;" id="meterslist">
                      <div style="width: 20px;height: 20px;background-color:rgba(0,0,255,1);margin-right: 13px;float: left;">
                      </div> 
                      <span id="avgspan" style="margin-right: 10px;">
                      </span>
                  </div>
                
                
                </div>
              -->
            </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('footer/footer');?>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="../../asset/common-utilits/bower_components/jquery/dist/jquery.min.js">
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>
    <!-- ChartJS -->
    <script src="../../asset/common-utilits/bower_components/Chart.js/Chart.js">
    </script>
    <!-- FastClick -->
    <script src="../../asset/common-utilits/bower_components/fastclick/lib/fastclick.js">
    </script>
    <!-- AdminLTE App -->
    <script src="../../asset/common-utilits/dist/js/adminlte.min.js">
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../asset/common-utilits/dist/js/demo.js">
    </script>
    <!-- FLOT CHARTS -->
    <script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.js">
    </script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.resize.js">
    </script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.pie.js">
    </script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.categories.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#chkday').multiselect({
          includeSelectAllOption: true
        });
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
      function checkDays(){
        var meterselect = document.getElementsByTagName('select')[0];
        var meter =getSelectValues(meterselect);
        var dayselect = document.getElementsByTagName('select')[1];
        var day =getSelectValues(dayselect);
        var meter1 = meter.toString();
          //alert(meter);
        var total=meterselect.options.length;
        var meters = meter1.split(",");
        var noofmeters = meters.length;

      }
      function transpose(a) {
          return Object.keys(a[0]).map(function (c) {
              return a.map(function (r) {
                  return r[c];
              });
          });
      }
      function drawgraph(reportdata){
        var chartdiv = document.getElementById("chart");
        chartdiv.innerHTML = "";
        var divdata = "<div class='col-md-12' >";
        divdata += "<div class='box box-info'>";
        divdata += "<div class='box-header with-border'>";
        divdata += "<h3 class='box-title'>Report</h3></div>";
        divdata += "<div class='vl box-body'><i class='fa fa-chevron-up' aria-hidden='true'></i><p>Consumption</p></div>";
        divdata += "<div class='chart' id='chart1'><canvas id='canvas' style='height:290px !important'></canvas></div>";
        divdata += "<div class='hl'><i class='fa fa-chevron-right' aria-hidden='true'></i><p>Date</p></div>";
        divdata += "<div style='padding-left: 18px;padding-bottom: 10px;display: inline-flex !important;' id='meterslist'>";
        divdata += "<div style='width: 20px;height: 20px;background-color:rgba(0,0,255,1);margin-right: 13px;float: left;'></div>"; 
        divdata += "<span id='avgspan' style='margin-right: 10px;'></span></div></div>";
        chartdiv.innerHTML = divdata;            
                  
        //chartdiv.innerHTML = divdata;
        document.getElementById("avgspan").innerHTML = "";
        var res = JSON.parse(reportdata);

        var len = Object.keys(res).length;
        var ctx = document.getElementById("canvas");
        Chart.pluginService.register({
            afterDraw: function(chart) {
                if (typeof chart.config.options.lineAt != 'undefined') {
                    var lineAt = chart.config.options.lineAt;
                    var ctxPlugin = chart.chart.ctx;
                    var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
                    var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
                    if(yAxe.min != 0) return;
                    
                    ctxPlugin.strokeStyle = "blue";
                    ctxPlugin.beginPath();
                    lineAt = (lineAt - yAxe.min) * (100 / yAxe.max);
                    lineAt = (100 - lineAt) / 100 * (yAxe.height) + yAxe.top;
                    ctxPlugin.moveTo(xAxe.left, lineAt);
                    ctxPlugin.lineTo(xAxe.right, lineAt);
                    ctxPlugin.stroke();
                }
            }
        });
        var backgroundColors = ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'];
        var borderColors = ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)'];
        var labeldata = new Array();
        var dataArray = new Array();
        var backgroundColorData = new Array();
        var borderColorsData = new Array();
        for (var i = 0; i < len-1; i++) {
          labeldata.push(res[i]['date']+" ("+res[i]['day']+")");
          dataArray.push(res[i]['consumption']);
          backgroundColorData.push(backgroundColors[0]);
          borderColorsData.push(borderColors[0]);
        }
        var meterLables = res[0]['meters']+"_"+res[0]['location'];
        var ctx = document.getElementById("canvas").getContext("2d");
        if(window.bar != undefined){
          window.bar.destroy();
        }
        window.bar = new Chart(ctx,{});
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labeldata,
                datasets: [{
                    label: meterLables,
                    data: dataArray,
                    backgroundColor: backgroundColorData,
                    borderColor: borderColorsData,
                    borderWidth: 1
                }
                ]
            },
            options: {
                lineAt: res['avg']['consumption'],
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0
                        }
                    }]
                }
            }
        });
        var avgtype=document.getElementById("averageType").value;
        if(avgtype == 'avgperday' || avgtype == 'lastweek' ||  avgtype == 'lastmonth' || avgtype == 'last6months'){
          document.getElementById("avgspan").innerHTML = "Average : "+res['avg']['consumption'];
        }else if(avgtype == 'maxperday'){
          document.getElementById("avgspan").innerHTML = "Maximum : "+res['avg']['consumption'];
        }else if(avgtype == 'minperday'){
          document.getElementById("avgspan").innerHTML = "Minimum : "+res['avg']['consumption'];
        }
        
        document.getElementById("meterslist").style.display = "block";

      }
      function drawfullgraph(data1){
        var chartdiv = document.getElementById("chart");
        chartdiv.innerHTML = "";
        var divdata = "<div class='col-md-12' >";
        divdata += "<div class='box box-info'>";
        divdata += "<div class='box-header with-border'>";
        divdata += "<h3 class='box-title'>Report</h3></div>";
        divdata += "<div class='vl box-body'><i class='fa fa-chevron-up' aria-hidden='true'></i><p>Consumption</p></div>";
        divdata += "<div class='chart' id='chart1'><canvas id='canvas' style='height:290px !important'></canvas></div>";
        divdata += "<div class='hl'><i class='fa fa-chevron-right' aria-hidden='true'></i><p>Date</p></div>";
        divdata += "<div style='padding-left: 18px;padding-bottom: 10px;display: inline-flex !important;' id='meterslist'>";
        divdata += "<div style='width: 20px;height: 20px;background-color:rgba(0,0,255,1);margin-right: 13px;float: left;'></div>"; 
        divdata += "<span id='avgspan' style='margin-right: 10px;'></span></div></div>";
        chartdiv.innerHTML = divdata;    
        
        document.getElementById("meterslist").style.display = "none";
        var res = JSON.parse(data1);
        console.log(res);
        var meterlen = Object.keys(res['meters']).length;
        var dayslen = Object.keys(res['days']).length;
        var ctx = document.getElementById("canvas");

        Chart.pluginService.register({
            afterDraw: function(chart) {
                if (typeof chart.config.options.lineAt != 'undefined') {
                    var lineAt = chart.config.options.lineAt;
                    var ctxPlugin = chart.chart.ctx;
                    var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
                    var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
                    if(yAxe.min != 0) return;
                    
                    ctxPlugin.strokeStyle = "red";
                    ctxPlugin.beginPath();
                    lineAt = (lineAt - yAxe.min) * (100 / yAxe.max);
                    lineAt = (100 - lineAt) / 100 * (yAxe.height) + yAxe.top;
                    ctxPlugin.moveTo(xAxe.left, lineAt);
                    ctxPlugin.lineTo(xAxe.right, lineAt);
                    ctxPlugin.stroke();
                }
            }
        });
        var backgroundColors = ['rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(40, 53, 147, 0.2)','rgba(130,119,23,0.2)','rgba(0,96,100,0.2)','rgba(38,50,56,0.2)'];
        var borderColors = ['rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(40, 53, 147, 1)', 'rgba(130,119,23,1)','rgba(0,96,100,1)','rgba(38,50,56,1)'];
        var datasetres = new Array();
        for (var i = 0; i < meterlen; i++) {
          var backgroundColorres = new Array();
          var borderColorres =  new Array();
          for (var j = 0; j < dayslen; j++) {
            backgroundColorres[j] = backgroundColors[i];
          }
          for (var k = 0; k < dayslen; k++) {
            borderColorres[k] = borderColors[i];
          }
          var element = {};
          element.label = res['meters'][i];
          element.data = res['Data'][i];
         
          element.backgroundColor = backgroundColorres;
          element.borderColor = borderColorres;
          element.borderWidth = 1;
          datasetres[i] = element;
        }
        var ctx = document.getElementById("canvas").getContext("2d");
        if(window.bar != undefined){
          window.bar.destroy();
        }
        window.bar = new Chart(ctx,{});
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: res['days'],//["20-08-2018(Monday)", "21-08-2018(Tuesday)", "22-08-2018(Wednesday)", "23-08-2018(Thursday)", "24-08-2018(Friday)", "25-08-2018(Saturday)","26-08-2018(Sunday)","27-08-2018(Monady)","28-08-2018(Tuesday)","29-08-2018(Wednesday)"]
                datasets:datasetres 
            }
        });
      }
      
      function getReport(){
        var valid=validate();
        if(valid){
          document.getElementById("loading").style.display = "block";
          //document.getElementById("singlemetername").innerHTML="";
          var validateday = document.getElementById("day").value;
          var avg = document.getElementById("averageType").value;
          var specific = document.getElementById("specific").checked;
          //alert(specific);
          //document.getElementById("singleRemove").widget = "collapse";
          document.getElementById("chart").style.display = "none";
          var meterselect = document.getElementsByTagName('select')[0];
          var meter =getSelectValues(meterselect);
          var meter1 = meter.toString();
          //alert(meter);
          var meters = meter1.split(",");
          var noofmeters = meters.length;
          if(noofmeters == 1 && validateday ==""){
            var dayselect = document.getElementsByTagName('select')[1];
            var day =getSelectValues(dayselect);
            var fromtime = document.getElementById("fromtime").value;
            var totime = document.getElementById("totime").value;
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
            //console.log(day);
            var urlString = "getenergyMeterConsumptionReport";
            $.ajax({
              url:urlString,
              type : 'GET',
              data: {meters: meter,fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate,avg:avg,specific : specific},
              success: function(data){
                //console.log(data);
                document.getElementById("chart").style.display = "block";
                document.getElementById("loading").style.display = "none";
                drawgraph(data);
              }
            });
          }else if(noofmeters == 1 ){
            var dayselect = document.getElementsByTagName('select')[1];
            var day =getSelectValues(dayselect);
            var fromtime = document.getElementById("fromtime").value;
            var totime = document.getElementById("totime").value;
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
            var urlString = "getenergyMeterConsumptionReport";
            $.ajax({
              url:urlString,
              type : 'GET',
              data: {meters: meter, days: day,fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate,avg:avg,specific : specific},
              success: function(data){
                //console.log(data);
                document.getElementById("chart").style.display = "block";
                document.getElementById("loading").style.display = "none";
                drawgraph(data);
              }
            });
          }
          else if(noofmeters > 1 && validateday ==""){//all selected with out day selection
            var fromtime = document.getElementById("fromtime").value;
            var totime = document.getElementById("totime").value;
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
            var urlString = "getenergyMeterConsumptionReport";
            $.ajax({
              url:urlString,
              type : 'GET',
              data: {meters: meter,fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate,avg:avg,specific : specific},
              success: function(data){
                //document.getElementById("singlemeterreport").style.display = "block";
                document.getElementById("chart").style.display = "block";
                document.getElementById("loading").style.display = "none";
                drawfullgraph(data);

              }
            });
          }else if(noofmeters > 1 && validateday !=""){
            console.log("meet the cond");
            var dayselect = document.getElementsByTagName('select')[1];
            var day =getSelectValues(dayselect);
            var fromtime = document.getElementById("fromtime").value;
            var totime = document.getElementById("totime").value;
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
            var urlString = "getenergyMeterConsumptionReport";
            $.ajax({
              url:urlString,
              type : 'GET',
              data: {meters: meter, days: day,fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate,avg:avg,specific : specific},
              success: function(data){
                //console.log(data);
                document.getElementById("chart").style.display = "block";
                document.getElementById("loading").style.display = "none";
                drawfullgraph(data);
              }
            });
          }
        }
      }
      function validate(){
        var meterselect = document.getElementsByTagName('select')[0];
        var meter =getSelectValues(meterselect);
        var dayselect = document.getElementsByTagName('select')[1];
        var day =getSelectValues(dayselect);
        var fromtime = document.getElementById("fromtime").value;
        var totime = document.getElementById("totime").value;
        var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value;
        var alertdiv = document.getElementById("alert");
        if(meter ==""){
          alertdiv.innerHTML="Please select meter";
          return false;
        }
        /*else if(day == ""){

          alertdiv.innerHTML="Please select day";
          return false;
        }*/
        else if(fromtime == "Select Hours" || totime == "Select Hours"){
          alertdiv.innerHTML="Please select timings properly";
          return false;
        }else{
          if(Date.parse('01/01/2011 '+fromtime)>Date.parse('01/01/2011 '+totime)){
            alertdiv.innerHTML="Please select timings properly";
            return false;
          }
          if(Date.parse('01/01/2011 '+fromtime)==Date.parse('01/01/2011 '+totime)){
            alertdiv.innerHTML="Please select different timings ";
            return false;
          }
        }
        if(fromdate == "" || todate == ""){
          alertdiv.innerHTML="Please select dates properly";
          return false;
        }else{
          var d1 = new Date(fromdate);
          var d2 = new Date(todate);
          var same = d1.getTime() > d2.getTime();
          if(same){
            alertdiv.innerHTML="Please select dates properly";
            return false;
          }
        }
        alertdiv.innerHTML="";
        return true;
      }
      function getSelectValues(select) {
        var result = [];
        var options = select && select.options;
        var opt;

        for (var i=0, iLen=options.length; i<iLen; i++) {
          opt = options[i];

          if (opt.selected) {
            result.push(opt.value || opt.text);
          }
        }
        return result;
      }
    </script>
  </body>
</html>