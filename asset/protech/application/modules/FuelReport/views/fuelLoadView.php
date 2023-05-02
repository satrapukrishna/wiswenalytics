<?php
//echo "<pre>";print_r($meters);
$meterList =array();
for ($i=0; $i < count($meters); $i++) { 
  array_push($meterList,$meters[$i]->MeterName);
}
//print_r($meterList);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Protech | Dashboard</title>
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="margin:0px !important">
<div class="wrapper">

   <?php $this->load->view('header/header');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('navigation/navigator');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Fuel Graph Report
      </h1>
     
    </section>
    <div id="alert"></div>
        <!-- Main content -->
        <section class="content">
          <form>
          <div class="row meter-top">
            <label>Select Meter : 
            </label>
        <select id="multiMeter" multiple="multiple" >
          <?php 
          foreach ($meterList as $value) {
          ?>
            <option value="<?php echo $value; ?>"> 
              <?php echo $value; ?> 
            </option>
          <?php } ?>
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
            //$list .= "<option value=".$value.">".$value."</option>";
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
        <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
        <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick="getFuelLevelReport()"; class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
      </div>
        </form>
        <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <!--  first fuel graph start -->

        <div class="col-md-12" id="graph_1" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div class="chart" id="container_1">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>
              <div class="running-status">
              <div class="economy">   
              <div>
                <b>Running Hours : </b><span id="run_1"></span>
              </div>
              <div>
                <b>Fuel Consumed : </b><span id="con_1"></span>
              </div> 
              </div>
               
              <div class="economy">
              <div>
                <b>Fuel Filled : </b><span id="fill_1"></span>
              </div>
              <div>
                <b>Economy : </b><span id="eco_1"></span>
              </div>
              </div> 
              </div>                            
            </div>

          </div>
          
        </div>
        <div class="col-md-12" id="graph_2" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div class="chart" id="container_2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>
              <div class="running-status">
              <div class="economy">   
              <div>
                <b>Running Hours : </b><span id="run_2"></span>
              </div>
              <div>
                <b>Fuel Consumed : </b><span id="con_2"></span>
              </div> 
              </div>
               
              <div class="economy">
              <div>
                <b>Fuel Filled : </b><span id="fill_2"></span>
              </div>
              <div>
                <b>Economy : </b><span id="eco_2"></span>
              </div>
              </div> 
              </div>                            
            </div>

          </div>
  
        </div>
        <div class="col-md-12" id="graph_3" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div class="chart" id="container_3">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div> 
              <div class="running-status">
              <div class="economy">   
              <div>
                <b>Running Hours : </b><span id="run_3"></span>
              </div>
              <div>
                <b>Fuel Consumed : </b><span id="con_3"></span>
              </div> 
              </div>
               
              <div class="economy">
              <div>
                <b>Fuel Filled : </b><span id="fill_3"></span>
              </div>
              <div>
                <b>Economy : </b><span id="eco_3"></span>
              </div>
              </div> 
              </div>                              
            </div>

          </div>
  
        </div>
        <div class="col-md-12" id="graph_4" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div class="chart" id="container_4">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>   
              <div class="running-status">
              <div class="economy">   
              <div>
                <b>Running Hours : </b><span id="run_4"></span>
              </div>
              <div>
                <b>Fuel Consumed : </b><span id="con_4"></span>
              </div> 
              </div>
               
              <div class="economy">
              <div>
                <b>Fuel Filled : </b><span id="fill_4"></span>
              </div>
              <div>
                <b>Economy : </b><span id="eco_4"></span>
              </div>
              </div> 
              </div>                            
            </div>

          </div>
  
        </div>
        <!-- first fuel graph end -->

        <!-- second fuel graph start -->

         <div class="col-md-12" style="display: none;">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fuel</h3>
             </div>
            <div class="box-body">
              <div class='vl'><i class='fa fa-chevron-up' aria-hidden='true'></i><p>Fuel</p></div>
              <div class="chart">
                <canvas id="areaChart1" style="height:250px"></canvas>
              </div>
            </div>
            <div class='hl'><i class='fa fa-chevron-right' aria-hidden='true'></i><p>Date</p></div>
            <!-- /.box-body -->
            <div style='padding-left: 18px;padding-bottom: 10px;display: inline-flex !important'>
              <div style='width: 20px;height: 20px;background-color:#c1c7d1;margin-right: 13px;float: left;'></div>
              <span id='avgspan' style='margin-right: 10px;'>Fuel Added</span>
              <div style='width: 20px;height: 20px;background-color:#3b8bba;margin-right: 13px;float: left;'></div>
              <span id='avgspan' style='margin-right: 10px;'>Fuel Removed</span>
            </div>
          </div>
  
        </div>
        <!-- second fuel graph end -->
        
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2018<a href="">Protech</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../asset/common-utilits/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../../asset/common-utilits/bower_components/Chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../../asset/common-utilits/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/common-utilits/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/common-utilits/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- page script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="../../asset/Jquery/ajaxQueuePlugin.js"></script>
<script type="text/javascript">
  $(function () {
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
</script>

<script type="text/javascript">
  
function plotGraph(data,container,meter,count){
  var jsondata = JSON.parse(data);
  var myArray = new Array();
  //var d; var localTime;var localOffset;var utc;var offset = 5.5;var nd;
  for (i = 0; i < jsondata.length; i++) { 
    var d = new Date(jsondata[i][0]);
    d.setHours(d.getHours() + 5);
    d.setMinutes(d.getMinutes() + 30);
    var n = d.getTime();
    var sec = new Array();
    sec[0] = n;
    sec[1] = jsondata[i][1];
    myArray.push(sec);
  }
  Highcharts.setOptions({
      time: {
          timezone: 'Asia/Calcutta',
          timezoneOffset:5
      }
  });
  Highcharts.chart(container, {
      time: {
        timezone: 'Asia/Calcutta',
        timezoneOffset:5
      },
      chart: {
          zoomType: 'x'
      },
      title: {
          text: meter
      },
     
      xAxis: {
          type: 'datetime'
      },
      yAxis: {
          title: {
              text: 'Time'
          }
      },
      legend: {
          enabled: false
      },
      plotOptions: {
          area: {
              fillColor: {
                  linearGradient: {
                      x1: 0,
                      y1: 0,
                      x2: 0,
                      y2: 1
                  },
                  stops: [
                      [0, Highcharts.getOptions().colors[0]],
                      [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                  ]
              },
              marker: {
                  radius: 2
              },
              lineWidth: 1,
              states: {
                  hover: {
                      lineWidth: 1
                  }
              },
              threshold: null,
              turboThreshold:0
          }
      },

      series: [{
          type: 'area',
          name: 'Fuel Level',
          data: myArray
      }]
  });
  var urlString = "getFuelLevelResult";
  var fromtime = document.getElementById("fromtime").value;
  var totime = document.getElementById("totime").value;
  var fromdate = document.getElementById("fromdate").value;
  var todate = document.getElementById("todate").value;
  var run = "run_"+count;
  var fill = "fill_"+count;
  var con = "con_"+count;
  var eco = "eco_"+count;
  document.getElementById(fill).innerHTML ="";
  document.getElementById(run).innerHTML ="";
  document.getElementById(con).innerHTML ="";
  document.getElementById(eco).innerHTML ="";
  $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: meter,fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
          //console.log("success"+data);
          var res = JSON.parse(data);
          document.getElementById(run).innerHTML = res['RunningHours'];
          document.getElementById(fill).innerHTML = res['FuelFilled'];
          document.getElementById(con).innerHTML = res['FuelConsumed'];
          document.getElementById(eco).innerHTML = res['Economy'];
        }
      });
}
function parseDate(str) {
  var mdy = str.split('-');
  //return new Date(mdy[2], mdy[0]-1, mdy[1]);
  return new Date(mdy[0], mdy[1]-1, mdy[2]);
}
function datediff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second-first)/(1000*60*60*24));
}
function getFuelLevelReport(){
  var valid=validate();
  if(valid){
    document.getElementById("loading").style.display="block";
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var meter1 = meter.toString();
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var meters = meter1.split(",");
    var noofmeters = meters.length;
    var from = parseDate(fromdate);
    var to = parseDate(todate);
    var difference = datediff(from,to);
    if(difference == 0 || difference >= 1){
      difference += 1;
    }
    var k = 1;
    for (var j = 0; j < noofmeters; j++) {
      var urlString = "getFuelLevelReport";
      $.ajaxQueue({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: meter[j],fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
          var me = meter[k-1];
          var containername = "container_"+k;
          var graph = "graph_"+k;
          plotGraph(data,containername,me,k);
          document.getElementById(graph).style.display = "block";
          k++;
        }
      });
    }
  }
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
function validate(){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter ==""){
      alertdiv.innerHTML="Please select meter";
      return false;
    }
    else if((fromtime == "Select Hours" && totime == "Select Hours")){
      
    }else if((fromtime != "Select Hours" && totime != "Select Hours")){

    }else{
      alertdiv.innerHTML="Please select timings properly";
      return false;
    }
    if(true){
      if(Date.parse('01/01/2011 '+fromtime)>Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select timings properly";
        return false;
      }
      if(Date.parse('01/01/2011 '+fromtime)==Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select different timings ";
        return false;
      }
    }
    if(fromdate == ""){
      alertdiv.innerHTML="Please select date properly";
      return false;
    }else if(todate == ""){
      alertdiv.innerHTML="Please select date properly";
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
</script>
</body>
</html>
