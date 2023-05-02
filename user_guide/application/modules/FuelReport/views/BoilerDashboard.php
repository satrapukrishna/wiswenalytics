<?php
//echo "<pre>";print_r($meters);
$meterList =array();
for ($i=0; $i < count($meters); $i++) { 
  array_push($meterList,$meters[$i]->MeterName);
}
//print_r($meterList);
$meters_names = implode(",", $meterList);
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dashboardasset/css/dashboardStyle.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-horizon/0.1.1/bootstrap-horizon.css"/>

  <link rel="icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<input type="hidden" name="boilers" id="boilers" value="<?php  echo $meters_names;?>">
<input type="hidden" name="date" id="date" value="<?php  echo date('Y-m-d');?>">
<div class="wrapper">

   <?php $this->load->view('header/header');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('navigation/navigator');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background:linear-gradient(60deg,#222d32,#3c8dbc);">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="cssanimation sequence leFadeInLeft">
       Boiler Dashboard
       
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Branch</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

<!-- dgset meters view -->

<div class="row" style="margin: 0 0px;margin-top: 9px;">
  <!-- meter-first -->
        <!--<div class="col-md-12"> 
          
          <h3 style="color:rgb(234, 245, 252)">DG Sets</h3>
          <div class="col-md-2 col-md-3">
            <div class="meter"><img src="../../asset/common-utilits/dist/img/oil-tanker1.png"></div>
            <div class="value1">
              <div>Running Hours (<small>Hrs</small>)</div>
              <div>Fuel Consumption (<small>Ltrs</small>)</div>
              <div>Fuel Added (<small>Ltrs</small>)</div>
              <div>Fuel Removed (<small>Ltrs</small>)</div>
              <div>High Consumption Time </div>
              <div>Low Consumption Time </div>
            </div>
          </div>
          <div class="horizotal row-horizon"> 
          <div class="col-md-4 col-md-7 boil-card1">
            <h3>DG 2</h3>
            <div class="b-value">
              <div>Today</div>
              <div>Last Week</div>
              <div>Last Month</div>
              <div>This Month till Date</div>
            </div>
            <div class="b-value">
            <span>02:00</span>
            <span>04:00</span>
            <span>12:00</span>
            <span>02:00</span>
          </div>
          <div class="b-value">
            <span class="gold">150 </span>
            <span class="gold">50 </span>
            <span class="gold">170 </span>
            <span class="gold">30</span>
          </div>
          <div class="b-value">
            <span class="sp-colo">15 </span>
            <span class="sp-colo">5 </span>
            <span class="sp-colo">15 </span>
            <span class="sp-colo">4</span>
          </div>
          <div class="b-value">
            <span class="orag">16 </span>
            <span class="orag">06 </span>
            <span class="orag">34 </span>
            <span class="orag">20</span>
          </div>
          <div class="b-time">
            <span>22/10/2018</span><span class="pipe">00:04</span>
            <span>12/10/2018</span><span class="pipe">00:04</span>
            <span>03/09/2018</span><span class="pipe">00:04</span>
            <span>02/10/2018</span><span>00:04</span>
          </div>
          <div class="b-time">
            <span>22/10/2018</span><span class="pipe">00:04</span>
            <span>04/10/2018</span><span class="pipe">00:04</span>
            <span>11/09/2018</span><span class="pipe">00:04</span>
            <span>28/10/2018</span><span>00:04</span>
          </div>
          </div>
          <div class="col-md-4 col-md-7 boil-card1">
            <h3>DG 3</h3>
             <div class="b-value">
              <div>Today</div>
              <div>Last Week</div>
              <div>Last Month</div>
              <div>This Month till Date</div>
            </div>
            <div class="b-value">
            <span>06:00</span>
            <span>03:00</span>
            <span>12:00</span>
            <span>04:00</span>
          </div>
          <div class="b-value">
            <span class="gold">15 </span>
            <span class="gold">25 </span>
            <span class="gold">105 </span>
            <span class="gold">45</span>
          </div>
          <div class="b-value">
            <span class="sp-colo">5 </span>
            <span class="sp-colo">10 </span>
            <span class="sp-colo">37 </span>
            <span class="sp-colo">60</span>
          </div>
          <div class="b-value">
            <span class="orag">18 </span>
            <span class="orag">7 </span>
            <span class="orag">42 </span>
            <span class="orag">23</span>
          </div>
          <div class="b-time">
            <span>22/10/2018</span><span class="pipe">00:04</span>
            <span>12/10/2018</span><span class="pipe">00:04</span>
            <span>03/09/2018</span><span class="pipe">00:04</span>
            <span>02/10/2018</span><span>00:04</span>
          </div>
          <div class="b-time">
            <span>22/10/2018</span><span class="pipe">00:04</span>
            <span>04/10/2018</span><span class="pipe">00:04</span>
            <span>11/09/2018</span><span class="pipe">00:04</span>
            <span>28/10/2018</span><span>00:04</span>
          </div>
          </div>
          
          </div>
        </div>-->
        <!-- dgset meters view end -->

        <div class=" row col-md-12"> <!-- meter-first -->
          <h3 style="color:rgb(234, 245, 252)">Boiler</h3>
          <div class=" col-md-3">
            <div class="meter"><img src="<?php echo base_url(); ?>asset/common-utilits/dist/img/old-boiler.png"></div>
            <div class="value1">
              <div>Running Hours (<small>Hrs</small>)</div>
              <div>Fuel Consumption (<small>Ltrs</small>)</div>
              <div>Fuel Added (<small>Ltrs</small>)</div>
              <div>Economy (<small>Ltrs/Hrs</small>)</div>
              <!--<div>High Consumption Time </div>
              <div>Low Consumption Time </div>-->
            </div>
          </div>
          <div class="horizotal row-horizon" id="cardparent" style="margin:0px !important"> <!-- horizotal row-horizon -->
            <!--<div class="col-md-4 col-md-7 boil-card1">
              <h3>Boiler 1</h3>
              <div class="b-value">
                <div>Today</div>
                <div>Last Week</div>
                <div>Last Month</div>
                <div>This Month till Date</div>
              </div>
              <div class="b-value">
                <span>02:00</span>
                <span>04:00</span>
                <span>12:00</span>
                <span>02:00</span>
              </div>
              <div class="b-value">
                <span class="gold">150 </span>
                <span class="gold">50 </span>
                <span class="gold">170 </span>
                <span class="gold">30</span>
              </div>
              <div class="b-value">
                <span class="sp-colo">15 </span>
                <span class="sp-colo">5 </span>
                <span class="sp-colo">15 </span>
                <span class="sp-colo">4</span>
              </div>
              <div class="b-time">
                <span>22/10/2018</span><span class="pipe">00:04</span>
                <span>12/10/2018</span><span class="pipe">00:04</span>
                <span>03/09/2018</span><span class="pipe">00:04</span>
                <span>02/10/2018</span><span>00:04</span>
              </div>
              <div class="b-time">
                <span>22/10/2018</span><span class="pipe">00:04</span>
                <span>04/10/2018</span><span class="pipe">00:04</span>
                <span>11/09/2018</span><span class="pipe">00:04</span>
                <span>28/10/2018</span><span>00:04</span>
              </div>
            </div>-->
            
          </div>
        
        <!-- dgset meters view end -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('footer/footer');?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!-- <script src="../../asset/common-utilits/bower_components/raphael/raphael.min.js"></script>
<script src="../../asset/common-utilits/bower_components/morris.js/morris.min.js"></script> -->

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>asset/common-utilits/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/common-utilits/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>asset/common-utilits/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
</body>
<script type="text/javascript">
window.onload = function() {
    animateSequence();
    animateRandom();
    fetchboilerData();
};
function fetchboilerData(){

  var meter_names = document.getElementById("boilers").value;
  var date = document.getElementById("date").value;
  var meters = meter_names.split(",");
  console.log(meters);console.log(date);
  for (var i = 0; i < meters.length; i++) {
    var urlString = "getDashBoardData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: meters[i],date:date},
        success: function(data){
          console.log("success"+data);
          generateCard(data);
        }
      });

  }

}
function generateCard(data){
  //document.getElementById("cardparent").innerHTML="";
  var d = JSON.parse(data);
 //console.log(d);
  var div= "<div class='col-lg-12 col-md-12 col-12 boil-card1'>";
  div +="<h3>"+d['meter']+"</h3><div class='b-value'><div>Yesterday(Cum/Avg)</div><div>Today(Cum/Avg)</div><div>Last Week(Cum/Avg)</div><div>Last Month(Cum/Avg)</div><div>This Month till Date(Cum/Avg)</div></div>";
  div +="<div class='b-value'><span><span class='sp-count'>"+d['runningHours']['yesterday']['cum']+"</span>/<span class='sp-count'>"+d['runningHours']['yesterday']['avg']+"</span></span><span><span class='sp-count'>"+d['runningHours']['today']['cum']+"</span>/<span class='sp-count'>"+d['runningHours']['today']['avg']+"</span></span><span><span class='sp-count'>"+d['runningHours']['lastweek']['cum']+"</span>/<span class='sp-count'>"+d['runningHours']['lastweek']['avg']+"</span></span><span><span class='sp-count'>"+d['runningHours']['lastmonth']['cum']+"</span>/<span class='sp-count'>"+d['runningHours']['lastmonth']['avg']+"</span></span><span><span class='sp-count'>"+d['runningHours']['thismonth']['cum']+"</span>/<span class='sp-count'>"+d['runningHours']['thismonth']['avg']+"</span></span></div>";
  div +="<div class='b-value'><span><span class='sp-count gold'>"+d['consumed']['yesterday']['cum']+"</span>/<span class='sp-count gold'>"+d['consumed']['yesterday']['avg']+"</span></span><span><span class='sp-count gold'>"+d['consumed']['today']['cum']+"</span>/<span class='sp-count gold'>"+d['consumed']['today']['avg']+"</span></span><span><span class='sp-count gold'>"+d['consumed']['lastweek']['cum']+"</span>/<span class='sp-count gold'>"+d['consumed']['lastweek']['avg']+"</span></span><span><span class='sp-count gold'>"+d['consumed']['lastmonth']['cum']+"</span>/<span class='sp-count gold'>"+d['consumed']['lastmonth']['avg']+"</span></span><span><span class='sp-count gold'>"+d['consumed']['thismonth']['cum']+"</span>/<span class='sp-count gold'>"+d['consumed']['thismonth']['avg']+"</span></span></div>";
  div +="<div class='b-value'><span><span class='sp-count sp-colo'>"+d['added']['yesterday']['cum']+"</span>/<span class='sp-count sp-colo'>"+d['added']['yesterday']['avg']+"</span></span><span><span class='sp-count sp-colo'>"+d['added']['today']['cum']+"</span>/<span class='sp-count sp-colo'>"+d['added']['today']['avg']+"</span></span><span><span class='sp-count sp-colo'>"+d['added']['lastweek']['cum']+"</span>/<span class='sp-count sp-colo'>"+d['added']['lastweek']['avg']+"</span></span><span><span class='sp-count sp-colo'>"+d['added']['lastmonth']['cum']+"</span>/<span class='sp-count sp-colo'>"+d['added']['lastmonth']['avg']+"</span></span><span><span class='sp-count sp-colo'>"+d['added']['thismonth']['cum']+"</span>/<span class='sp-count sp-colo'>"+d['added']['thismonth']['avg']+"</span></span></div>";
  div +="<div class='b-value'><span>"+d['economy']['yesterday']+"</span><span>"+d['economy']['today']+"</span><span>"+d['economy']['lastweek']+"</span><span>"+d['economy']['lastmonth']+"</span><span>"+d['economy']['thismonth']+"</span></div>";
  //div +="<div class='b-time'><span>"+d['high']['today']['time']+"/"+d['high']['today']['con']+"</span><span>"+d['high']['lastweek']['time']+"/"+d['high']['lastweek']['con']+"</span><span>"+d['high']['lastmonth']['time']+"/"+d['high']['lastmonth']['con']+"</span><span>"+d['high']['thismonth']['time']+"/"+d['high']['thismonth']['con']+"</span></div>";
  //div +="<div class='b-time'><span>"+d['low']['today']['time']+"/"+d['low']['today']['con']+"</span><span>"+d['low']['lastweek']['time']+"/"+d['low']['lastweek']['con']+"</span><span>"+d['low']['lastmonth']['time']+"/"+d['low']['lastmonth']['con']+"</span><span>"+d['low']['thismonth']['time']+"/"+d['low']['thismonth']['con']+"</span></div>";
  document.getElementById("cardparent").innerHTML +=div;
}
function animateSequence() {
    var a = document.getElementsByClassName('sequence');
    for (var i = 0; i < a.length; i++) {
        var $this = a[i];
        var letter = $this.innerHTML;
        letter = letter.trim();
        var str = '';
        var delay = 100;
        for (l = 0; l < letter.length; l++) {
            if (letter[l] != ' ') {
                str += '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + letter[l] + '</span>';
                delay += 150;
            } else
                str += letter[l];
        }
        $this.innerHTML = str;
    }
}

function animateRandom() {
    var a = document.getElementsByClassName('random');
    for (var i = 0; i < a.length; i++) {
        var $this = a[i];
        var letter = $this.innerHTML;
        letter = letter.trim();
        var delay = 70;
        var delayArray = new Array;
        var randLetter = new Array;
        for (j = 0; j < letter.length; j++) {
            while (1) {
                var random = getRandomInt(0, (letter.length - 1));
                if (delayArray.indexOf(random) == -1)
                    break;
            }
            delayArray[j] = random;
        }
        for (l = 0; l < delayArray.length; l++) {
            var str = '';
            var index = delayArray[l];
            if (letter[index] != ' ') {
                str = '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + letter[index] + '</span>';
                randLetter[index] = str;
            } else
                randLetter[index] = letter[index];
            delay += 80;
        }
        randLetter = randLetter.join("");
        $this.innerHTML = randLetter;
    }
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

</script>
</html>
