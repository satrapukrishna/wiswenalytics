<?php
//echo "<pre>";print_r($meters);die();
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
       Temperature Alert's
        <!-- <small></small> -->
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
      <div class="row temp-alert">

       <ul class="nav nav-tabs">
        <li class="nav active"><a data-toggle="tab" href="#subscription">Alert Subscription</a></li>
        <li class="nav"><a data-toggle="tab" href="#dashboard">Alert Dashboard</a></li>
       </ul>

      <div class="tab-content">
        <!-- Show this tab by adding `active` class -->
        <div class="row alerts-new tab-pane fade in active" id="subscription">
            <form>
           <div class="col-md-6">
            <div class="individul">
            <label>Select Meter  
            </label>
        <select id="multiMeter" multiple="multiple">
           <option value="Select Meter">Select Meter
          </option>
          <option>Meter1</option>
          <option>Meter2</option>
          <option>Meter3</option>
          <option>Meter4</option>
          <option>Meter5</option>
          <option>Meter6</option>
        </select>
      </div>
      <div class="individul">
         <label>Select Days  
          </label>
        <select id="days" multiple="multiple">
           <option value="Select Day">Select Day
          </option>
          <option>Monday</option>
          <option>Tuesday</option>
          <option>Wednesday</option>
          <option>Thursday</option>
          <option>Friday</option>
          <option>Saturday</option>
          <option>Sunday</option>

        </select>
        </div>
        <div class="individul">
         <label>Select Hours From  
            </label>
        <select >
           <option value="Select Hours">Select Hours To
          </option>
         <option>00:00:00</option>
          <option>10:00:00</option>
           <option>20:00:00</option>
            <option>30:00:00</option>
        </select>
        </div>
        <div class="individul">
        <label>Select Hours To  
            </label>
        <select>
           <option value="Select Hours">Select Hours From
          </option>
          <option>00:00:00</option>
          <option>10:00:00</option>
           <option>20:00:00</option>
            <option>30:00:00</option>
        </select>
        </div>
        <div class="mini-alert">
          <label>
            Minimum Temp Alert
          </label>
          <input type="checkbox" name="" id="checkBox">
          <input type="text" name="" id="myText1" disabled>
        </div>
        <div class="mini-alert">
          <label>
            Maximum Temp Alert
          </label>
          <input type="checkbox" name="" id="checkBox1">
          <input type="text" name="" id="myText2" disabled>
        </div>
        <div class="">
          <button type="button" class="btn btn-info">Subscribe</button>
           <button type="reset" class="btn btn-default">Cancel</button>
        </div>
      </div>
      </form>
        </div>
        
        <!-- alert subscription end -->

        <!-- dashboard starts -->

        <div class="tab-pane fade" id="dashboard">
           <div class="">
            <marquee>
              <h2>Welcome to  Dashboard</h2>
            </marquee>
            <p>
              Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
            </p>
               
              </div>
        </div>
        <!-- dashboard end -->
        </div>
      </div>
  

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
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
         $('#days').multiselect({
          includeSelectAllOption: true
        });
      });

  //checkbox function start

   document.getElementById('checkBox').onchange = function() {
    document.getElementById('myText1').disabled = !this.checked;
};
 document.getElementById('checkBox1').onchange = function() {
    document.getElementById('myText2').disabled = !this.checked;
};
//checkbox function end

 
</script>
</body>
</html>
