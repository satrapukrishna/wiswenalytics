<?php
$meterList1=array($meters[0],$meters[1],$meters[2]);
$meterList = array();
for ($i=0; $i < count($meterList1); $i++) { 

  array_push($meterList,$meterList1[$i]->MeterName);
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wenalytics</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

  <link rel="icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
                                        
            </div>

          </div>
          
        </div>
        <div class="col-md-12" id="graph_runn1" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn1">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
          <div class="col-md-12" id="graph_economy1" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div   id="container_economy1">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
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
              <!-- <div class="running-status">
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
              </div> -->                            
            </div>

          </div>
  
        </div>
        <div class="col-md-12" id="graph_runn2" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
          <div class="col-md-12" id="graph_economy2" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div   id="container_economy2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
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
              <!-- <div class="running-status">
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
              </div> -->                              
            </div>

          </div>
  
        </div>
        <div class="col-md-12" id="graph_runn3" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn3">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
          <div class="col-md-12" id="graph_economy3" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  style="position: relative;width: 100%;" id="container_economy3">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
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
             <!--  <div class="running-status">
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
              </div> -->                            
            </div>

          </div>
  
        </div>
        <div class="col-md-12" id="graph_runn4" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn4">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
          <div class="col-md-12" id="graph_economy4" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div   id="container_economy4">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
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
      <strong>Copyright &copy; 2019<a href="">Wenalytics.in</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/chart/Chart.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- page script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script>
 --><script src="https://code.highcharts.com/modules/offline-exporting.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
<script type="text/javascript">
  $(function () {
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
</script>

<script type="text/javascript">
function timeConvert(n) {
var num = n;
var hours = (num / 60);
var rhours = Math.floor(hours);
var minutes = (hours - rhours) * 60;
var rminutes = Math.round(minutes);
return rhours + " hour(s) and " + rminutes + " minute(s).";
}
function plotRunnGraph(data,runnContainer,econContainer,meter,count,nooff){
  if (count==nooff) {
    $("#loading").css("display", "none");
  }
  
  var jsondata = JSON.parse(data);
  var myArray = new Array();
  //var d; var localTime;var localOffset;var utc;var offset = 5.5;var nd;
var dps1 = [];
var dps2 = [];
var runn = [];
var econ = [];
var r;
for(var i = 0; i < jsondata.length; i++) {
    r=parseInt(jsondata[i]["runninghrs"]);
    dps1.push(r);
    runn.push(timeConvert(jsondata[i]["runninghrs"]));
    dps2.push(jsondata[i]["Time"]);
    econ.push(jsondata[i]["economy"]);
}
  
Highcharts.chart(runnContainer, {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
      
        type: 'column'
    },
      
    title: {
        text: 'RunningHours'
    },
    subtitle: {
        text: meter
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Minutes'      
    }
    },   
     series: [{
      name: 'Minutes',
        data: dps1
        
    }]
});

Highcharts.chart(econContainer, {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
       
        type: 'column'
    },
    title: {
        text: 'Economy'
    },
    subtitle: {
        text: meter
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Economy'      
    }
    },
   
     series: [{
      name: 'Economy',
        data: econ
        
    }]
});
}

function plotGraph(data,container,meter,count,nooff){


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
        text: 'Fuel Level'
    },
    subtitle: {
        text: meter
    },
     
      xAxis: {
          type: 'datetime',
          title: {
              text: 'Date And Time'
          }
      },
      yAxis: {
        min: -50,
        startOnTick: false,
          title: {
              text: 'Ltrs'
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
  // var urlString = "getFuelLevelResult";
  // var fromtime = document.getElementById("fromtime").value;
  // var totime = document.getElementById("totime").value;
  // var fromdate = document.getElementById("fromdate").value;
  // var todate = document.getElementById("todate").value;
  // var run = "run_"+count;
  // var fill = "fill_"+count;
  // var con = "con_"+count;
  // var eco = "eco_"+count;
  // document.getElementById(fill).innerHTML ="";
  // document.getElementById(run).innerHTML ="";
  // document.getElementById(con).innerHTML ="";
  // document.getElementById(eco).innerHTML ="";
  // $.ajax({
  //       url:urlString,
  //       type : 'GET',
  //       async: true,
  //       data: {meter: meter,fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
  //       success: function(data){
  //         //console.log("success"+data);
  //         var res = JSON.parse(data);
  //         document.getElementById(run).innerHTML = res['RunningHours'];
  //         document.getElementById(fill).innerHTML = res['FuelFilled'];
  //         document.getElementById(con).innerHTML = res['FuelConsumed'];
  //         document.getElementById(eco).innerHTML = res['Economy'];
  //       }
  //     });


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
    var k = 1,kl=1;
    for (var j = 0; j < noofmeters; j++) {
      $("#loading").css("display", "block");
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
          plotGraph(data,containername,me,k,noofmeters);
          document.getElementById(graph).style.display = "block";

          k++;
        }
      });
       var urlString1 = "getRunninGraphReport";
      $.ajaxQueue({
        url:urlString1,
        type : 'GET',
        async: true,
        data: {meter: meter[j],fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
          var me = meter[kl-1];
          var runningContainer = "container_runn"+kl;
          var economycontainer="container_economy"+kl;
          var economyGraph="graph_economy"+kl;
          var runnibgGraph = "graph_runn"+kl;
          plotRunnGraph(data,runningContainer,economycontainer,me,kl,noofmeters);
          
          document.getElementById(runnibgGraph).style.display = "block";
          document.getElementById(economyGraph).style.display = "block";
         

          kl++;
        }
      });
    }
    //document.getElementById('graph_1Runn').style.display = "block";
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
