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
  <link rel="stylesheet" href="../../asset/common-utilits/dashboard/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/common-utilits/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../asset/common-utilits/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="../../asset/dashboardasset/css/dashboardStyle.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-horizon/0.1.1/bootstrap-horizon.css"/>

  <link rel="shortcut icon" type="imag/x-icon" href="../../asset/common-utilits/dist/img/fav.ico">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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
      <h1 class="cssanimation sequence leFadeInLeft">
       Dashboard
       
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Branch</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- start energy meters view -->
      <div class="row" style="margin: 0 0px;">
        <div class="col-md-12 meter-first">
          <h3 style="color:#706e6e">Energy Meters</h3>
          <div class="col-md-1 hello">
            <div class="meter"><img src="../../asset/common-utilits/dist/img/electric-meter.png"></div>
             <div><label>Consumption (<small>Kwh</small>)</label></div>
             <div><label>Load (<small>Kw</small>)</label></div>
          </div>
          <div class="horizotal row-horizon">
          <div class="col-md-3 main-card">
            <h3>EB_KW1</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>250</span>
            <span>50 </span>
            <span>100 </span>
          </div>
          <div class="value">
            <span>50 </span>
            <span>20 </span>
            <span>50 </span>
          </div>
          </div>
         <div class="col-md-3 main-card">
            <h3>EB_KW2</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>150 </span>
            <span>20 </span>
            <span>40 </span>
          </div>
          <div class="value">
            <span>35 </span>
            <span>15 </span>
            <span>75 </span>
          </div>
          </div>
          <div class="col-md-3 main-card">
            <h3>EB_KW3</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>35 </span>
            <span>28 </span>
            <span>120 </span>
          </div>
          <div class="value">
            <span>20 </span>
            <span>16 </span>
            <span>80 </span>
          </div>
          </div>
          <div class="col-md-3 main-card">
            <h3>EB_KW4</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>35 </span>
            <span>28 </span>
            <span>120 </span>
          </div>
          <div class="value">
            <span>20 </span>
            <span>16 </span>
            <span>80 </span>
          </div>
          </div>
          <div class="col-md-3 main-card">
            <h3>EB_KW5</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>35 </span>
            <span>28 </span>
            <span>120 </span>
          </div>
          <div class="value">
            <span>20 </span>
            <span>16 </span>
            <span>80 </span>
          </div>
          </div>
          <div class="col-md-3 main-card">
            <h3>EB_KW6</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>35 </span>
            <span>28 </span>
            <span>120 </span>
          </div>
          <div class="value">
            <span>20 </span>
            <span>16 </span>
            <span>80 </span>
          </div>
          </div>
          </div>
          
          </div>
          
          
        </div>
<!-- end energy meters view -->

<!-- dgset meters view -->

<div class="row" style="margin: 0 0px;margin-top: 9px;">
        <div class="col-md-12 meter-first ">
          <h3 style="color:#706e6e">DG Sets</h3>
          <div class="col-md-1">
            <div class="meter"><img src="../../asset/common-utilits/dist/img/oil-tanker.png"></div>
            <div class="value-new">
              <div>Running Hours (<small>Hrs</small>)</div>
              <div>Units</div>
              <div>Load (<small>Kw</small>)</div>
              <div>Fuel Consumption (<small>Ltrs</small>)</div>
            </div>
          </div>
          <div class="col-md-3 main-card1">
            <h3>DG 2</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>02:00</span>
            <span>04:00</span>
            <span>12:00</span>
          </div>
          <div class="value">
            <span>150 </span>
            <span>50 </span>
            <span>170 </span>
          </div>
          <div class="value">
            <span>15 </span>
            <span>5 </span>
            <span>15 </span>
          </div>
          <div class="value">
            <span>16 </span>
            <span>06 </span>
            <span>34 </span>
          </div>
          </div>
          <div class="col-md-3 main-card1">
            <h3>DG 3</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>06:00</span>
            <span>03:00</span>
            <span>12:00</span>
          </div>
          <div class="value">
            <span>15 </span>
            <span>25 </span>
            <span>105 </span>
          </div>
          <div class="value">
            <span>5 </span>
            <span>10 </span>
            <span>37 </span>
          </div>
          <div class="value">
            <span>18 </span>
            <span>7 </span>
            <span>42 </span>
          </div>
          </div>
          <div class="col-md-3 main-card1">
            <h3>DG 4</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>01:00</span>
            <span>04:00</span>
            <span>42:00</span>
          </div>
          <div class="value">
            <span>10 </span>
            <span>75 </span>
            <span>130 </span>
          </div>
          <div class="value">
            <span>15</span>
            <span>5 </span>
            <span>55</span>
          </div>
          <div class="value">
            <span>15 </span>
            <span>10 </span>
            <span>98 </span>
          </div>
          </div>
        </div>
        <!-- dgset meters view end -->
      </div>

      <!-- hvac meters view -->

      <div class="row" style="margin: 0 0px;margin-top: 9px;">
        <div class="col-md-12 meter-first ">
          <h3 style="color:#706e6e">HVAC</h3>
          <div class="col-md-1">
            <div class="meter"><img src="../../asset/common-utilits/dist/img/fan.png"></div>
            <div class="value-new">
              <div>Running Hours (<small>Hrs</small>)</div>
              <div>Units</div>
              <div>Load (<small>Kw</small>)</div>
              
            </div>
          </div>
          <div class="col-md-3 main-card2">
            <h3>HVAC 1</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>06:00</span>
            <span>04:00</span>
            <span>12:00</span>
          </div>
          <div class="value">
            <span>50 </span>
            <span>5 </span>
            <span>170 </span>
          </div>
          <div class="value">
            <span>25 </span>
            <span>37 </span>
            <span>124 </span>
          </div>
         
          </div>
          <div class="col-md-3 main-card2">
            <h3>HVAC 2</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>03:00</span>
            <span>06:00</span>
            <span>22:00</span>
          </div>
          <div class="value">
            <span>10 </span>
            <span>60 </span>
            <span>190 </span>
          </div>
          <div class="value">
            <span>35 </span>
            <span>25 </span>
            <span>155 </span>
          </div>
          
          </div>
          <div class="col-md-3 main-card2">
            <h3>HVAC 2</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>10:00</span>
            <span>05:00</span>
            <span>14:00</span>
          </div>
          <div class="value">
            <span>150 </span>
            <span>50 </span>
            <span>170 </span>
          </div>
          <div class="value">
            <span>15</span>
            <span>5 </span>
            <span>135</span>
          </div>
         
          </div>
        </div>
      </div>
        <!-- end hvac meters view -->

        <!-- temp view starts -->

        <div class="row" style="margin: 0 0px;margin-top: 9px;">
        <div class="col-md-12 meter-first ">
          <h3 style="color:#706e6e">Temperature</h3>
          <div class="col-md-1">
            <div class="meter"><img src="../../asset/common-utilits/dist/img/low-temperature.png"></div>
            <div class="value-new">
              <div>Average Temp (<small>Degrees</small>)</div>
            </div>
          </div>
          <div class="col-md-3 main-card3">
            <h3>Temp 1</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>06</span>
            <span>03</span>
            <span>16</span>
          </div>
          </div>
           <div class="col-md-3 main-card3">
            <h3>Temp 2</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>01</span>
            <span>05</span>
            <span>45</span>
          </div>
          </div>
           <div class="col-md-3 main-card3">
            <h3>Temp 3</h3>
            <div class="value">
              <div>Today</div>
              <div>Yesterday</div>
              <div>Month Average</div>
            </div>
            <div class="value">
            <span>00</span>
            <span>00</span>
            <span>00</span>
          </div>
          </div>
         
        </div>
      </div>
        <!-- temp view end -->


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
<!-- jQuery UI 1.11.4 -->
<script src="../../asset/common-utilits/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../asset/common-utilits/bower_components/raphael/raphael.min.js"></script>
<script src="../../asset/common-utilits/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../asset/common-utilits/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="../../asset/common-utilits/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../asset/common-utilits/bower_components/moment/min/moment.min.js"></script>
<script src="../../asset/common-utilits/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../asset/common-utilits/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<script src="../../asset/common-utilits/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../asset/common-utilits/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/common-utilits/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../asset/common-utilits/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/common-utilits/dist/js/demo.js"></script>




</body>
<script type="text/javascript">
window.onload = function() {
    animateSequence();
    animateRandom();
};

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
