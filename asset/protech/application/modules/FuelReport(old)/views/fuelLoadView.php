<?php
//echo "<pre>";print_r($meters);die();
//echo $meters[0]->MeterName;die();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Protech Dashboard</title>
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
  <link rel="shortcut icon" type="imag/x-icon" href="../../asset/common-utilits/dist/img/fav.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <link rel="stylesheet" href="../../asset/energymeterasset/css/energymeterStyle.css">

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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('header/header');?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view('navigation/navigator');?>
      <!-- Content Wrapper. Contains page content -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="    width: 57%;">
       Fuel Graph Report
        <!-- <small>Preview sample</small> -->
      </h1>
     
      <!-- <ol class="breadcrumb">
        <li><a href="#" style="color: #3c8dbc;font-size: 13px;"></i> Day Report</a></li>
        <li><a href="#">Week Report</a></li>
        <li class="active">Month Report</li>
      </ol> -->
    </section>
    <div id="alert"></div>
    <!-- Main content -->
    <section class="content">
      <div style="margin-bottom: 12px;">
        <div class="row meter-top">
            <label>Select Energy Meter : 
            </label>
        <select id="multiMeter" multiple="multiple" >
          <?php 
          foreach ($meters as $value) {
          ?>
            <option value="<?php echo $value->MeterName; ?>"> 
              <?php echo $value->MeterName; ?> 
            </option>
          <?php } ?>
        </select>
        <select id="day">
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
        <input type="date" name="fromdate" id="fromdate" data-placeholder="From Date" required aria-required="true">
        <input type="date" name="todate" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick="getFuelGraph()" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
      </div>
     </div>
     <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
      <div class="row" id="chart">
            <div class="col-md-12" id="rep_0">
              <!-- interactive chart -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Report :<span id="meter_0">Meter1</span>
                  </h3>
                </div>
                <div class="vl box-body">
                    <i class="fa fa-chevron-up" aria-hidden="true">
                    </i>
                    <p>Fuel Level
                    </p>
                  </div>
                <div class="chart">
                 <canvas id="fuelChart" style="height:290px !important"></canvas>
             </div>
             <div class="hl">
                  <i class="fa fa-chevron-right" aria-hidden="true">
                  </i>
                  <p>Time
                  </p>
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-12" id="rep_1">
              <!-- interactive chart -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title" >Report : <span id="meter_1">Meter2</span>
                  </h3>
                </div>
                <div class="vl box-body">
                    <i class="fa fa-chevron-up" aria-hidden="true">
                    </i>
                    <p>Fuel Level
                    </p>
                  </div>
                <div class="chart">
                 <canvas id="fuelChart_1" style="height:290px !important"></canvas>
             </div>
             <div class="hl">
                  <i class="fa fa-chevron-right" aria-hidden="true">
                  </i>
                  <p>Time
                  </p>
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-12" id="rep_2">
              <!-- interactive chart -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Report : <span id="meter_2">Meter3</span>
                  </h3>
                </div>
                <div class="vl box-body">
                    <i class="fa fa-chevron-up" aria-hidden="true">
                    </i>
                    <p>Fuel Level
                    </p>
                  </div>
                <div class="chart">
                 <canvas id="fuelChart_2" style="height:290px !important"></canvas>
             </div>
             <div class="hl">
                  <i class="fa fa-chevron-right" aria-hidden="true">
                  </i>
                  <p>Time
                  </p>
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
           
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="../../asset/Jquery/ajaxQueuePlugin.js"></script>
<script>
  $(function () {
       /*$('#chkday').multiselect({
          includeSelectAllOption: true
        });*/
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
  
</script>
<script type="text/javascript">

var canvas = document.getElementById("fuelChart");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ['01:00:00', '03:00:00', '06:00:00', '09:00:00', '12:00:00', '03:00:00', '06:00:00'],
  datasets: [{
      label: "Meter1 Fuel Level",
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "rgba(75, 192, 192, 1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "white",
          pointBackgroundColor: "black",
          pointBorderWidth: 1,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: "rgba(75, 192, 192, 1)",
          pointHoverBorderColor: "rgba(75, 192, 192, 1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          // notice the gap in the data and the spanGaps: false
          data:[10, 20, 60, 95, 64, 78, 90,,70,40,70,89],
          spanGaps: false,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});

//second graph

var canvas = document.getElementById("fuelChart_1");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ['01:00:00', '03:00:00', '06:00:00', '09:00:00', '12:00:00', '03:00:00', '06:00:00'],
  datasets: [{
      label: "Meter2 Fuel Level",
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "rgba(75, 192, 192, 1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "white",
          pointBackgroundColor: "black",
          pointBorderWidth: 1,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: "rgba(75, 192, 192, 1)",
          pointHoverBorderColor: "rgba(75, 192, 192, 1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          // notice the gap in the data and the spanGaps: false
          data:[9, 10, 30, 45, 54, 68, 70,80,40,50,19],
          spanGaps: false,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});

//third grpah

var canvas = document.getElementById("fuelChart_2");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ['01:00:00', '03:00:00', '06:00:00', '09:00:00', '12:00:00', '03:00:00', '06:00:00'],
  datasets: [{
      label: "Meter3 Fuel Level",
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "rgba(75, 192, 192, 1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "white",
          pointBackgroundColor: "black",
          pointBorderWidth: 1,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: "rgba(75, 192, 192, 1)",
          pointHoverBorderColor: "rgba(75, 192, 192, 1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          // notice the gap in the data and the spanGaps: false
          data:[20, 30, 40, 55, 64, 18, 25,,50,60,40,79],
          spanGaps: false,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});
</script>
<script type="text/javascript">
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
    var day = document.getElementById('day').value;
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
  function getFuelGraph(){
    var valid=validate();
    if(valid){
      document.getElementById("loading").style.display="block";
      var day = document.getElementById("day").value;
      var meterselect = document.getElementsByTagName('select')[0];
      var meter =getSelectValues(meterselect);
      var meter1 = meter.toString();
      var fromtime = document.getElementById("fromtime").value;
      var totime = document.getElementById("totime").value;
      var fromdate = document.getElementById("fromdate").value;
      var todate = document.getElementById("todate").value;
      var meters = meter1.split(",");
      var noofmeters = meters.length;
      //var from = parseDate(fromdate);
      //var to = parseDate(todate);
      console.log(day);
      console.log(meter);
      console.log(fromdate+" "+todate+" "+fromtime+" "+totime);
    }
  }
</script>
</body>
</html>
