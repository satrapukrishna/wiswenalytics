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
    <title>Wenalytics
    </title>
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
    <link rel="shortcut icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/fav.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <input type="hidden" name="hvac" id="hvac" value="<?php  echo $meters_names;?>">
    <div class="wrapper">
      <?php $this->load->view('header/header');?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view('navigation/navigator');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper tomo-bg">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="    width: 57%;">
            HVAC Report
            <!-- <small>Preview sample</small> -->
          </h1>
        </section>
        <div id="alert"></div>
        <!-- Main content -->
        <section class="content">
          
        <!-- animation starts -->

        <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>

        <!-- animation end -->

        <div class="row" id="hvaccards">

          
        
        </div>

         
         
      </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('footer/footer');?>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery/dist/jquery.min.js">
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/chart/Chart.js">
    </script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/fastclick/lib/fastclick.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/adminlte.min.js">
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/demo.js">
    </script>
    <!-- FLOT CHARTS -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.js">
    </script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.resize.js">
    </script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.pie.js">
    </script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.categories.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- page script -->
    <script type="text/javascript">

      $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
    </script>
    <script type="text/javascript">
window.onload = function() {
    //animateSequence();
    //animateRandom();
    fetchHvacData();
};
function fetchHvacData(){
  var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

  var meter_names = document.getElementById("hvac").value;
  
  var meters = meter_names.split(",");
  console.log(meters);console.log(today);
  for (var i = 0; i < meters.length; i++) {
    var urlString = "getHvacData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: meters[i],date:today},
        success: function(data){
          console.log("success"+data);
          generateCard(data);
        }
      });

  }

}
function generateCard(data){
   var d = JSON.parse(data);
  if(d.length>0){
  //document.getElementById("cardparent").innerHTML="";hvaccards
  
  // alert(d);
  if(parseFloat(d[0]['Set_Temp'])>parseFloat(d[0]['Return Air Temp'])){
    var div="<div class='col-md-6'><div class='hvac-bg-new'><div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'><div class='panel panel-default'><div class='panel-heading' role='tab' id='headingTwo'><h4 class='panel-title'><a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo"+d[0]['LocationName']+"' aria-expanded='false' aria-controls='collapseTwo"+d[0]['LocationName']+"'>"+d[0]['LocationName']+"</a><div class='left-icons'><div class='purple'><span>"+d[0]['Return Air Temp']+"</span></div><div class='light-blue'><span>"+parseFloat(d[0]['Actuator Level']).toFixed(2)+"%</span></div><div class='cool-img'><img src='<?php echo base_url();?>asset/common-utilits/dist/img/hvac-cool.png'></div><div class='on-img'><img src='<?php echo base_url();?>asset/common-utilits/dist/img/hvac-on.png'></div></div></h4><!--<hr>--></div><div id='collapseTwo"+d[0]['LocationName']+"' class='panel-collapse' role='tabpanel' aria-labelledby='headingTwo'><div class='panel-body'><div class='rowdown-row'><div class='main-content'><div class='sub-one'><label>Status</label><div>ON</div></div><div class='sub-one'><label>SupplyAirTemp</label><div>"+d[0]['Supply Air Temp']+"</div></div><div class='sub-one'><label>SupplyWaterTemp</label><div>"+d[0]['CW Sup Temp']+"</div></div><div class='sub-one'><label>ActuatorLevel</label><div>"+parseFloat(d[0]['Actuator Level']).toFixed(2)+"%</div></div><div class='sub-one'><label>FilterPressure</label><div>"+d[0]['Filter Pressure']+"</div></div><div class='sub-one'><label>Delta T</label><div>"+d[0]['Delta T']+"</div></div></div><div class='main-content'><div class='sub-one'><label>Cooling</label><div>OFF</div></div><div class='sub-one'><label>ReturnAirTemp</label><div>"+d[0]['Return Air Temp']+"</div></div><div class='sub-one'><label>ReturnWaterTemp</label><div>"+d[0]['CH Ret Temp']+"</div></div><div class='sub-one'><label>VFDControl</label><div>NA</div></div><div class='sub-one'><label>Blockage</label><div>NA</div></div><div class='sub-one'><label>Set Temp</label><div>"+d[0]['Set_Temp']+"</div></div></div></div></div></div></div></div></div></div>";
  }else{
    var div="<div class='col-md-6'><div class='hvac-bg-new'><div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'><div class='panel panel-default'><div class='panel-heading' role='tab' id='headingTwo'><h4 class='panel-title'><a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo"+d[0]['LocationName']+"' aria-expanded='false' aria-controls='collapseTwo"+d[0]['LocationName']+"'>"+d[0]['LocationName']+"</a><div class='left-icons'><div class='purple'><span>"+d[0]['Return Air Temp']+"</span></div><div class='light-blue'><span>"+parseFloat(d[0]['Actuator Level']).toFixed(2)+"%</span></div><div class='cool-img'><img src='<?php echo base_url();?>asset/common-utilits/dist/img/hvac-coool.png'></div><div class='on-img'><img src='<?php echo base_url();?>asset/common-utilits/dist/img/hvac-on.png'></div></div></h4><!--<hr>--></div><div id='collapseTwo"+d[0]['LocationName']+"' class='panel-collapse' role='tabpanel' aria-labelledby='headingTwo'><div class='panel-body'><div class='rowdown-row'><div class='main-content'><div class='sub-one'><label>Status</label><div>ON</div></div><div class='sub-one'><label>SupplyAirTemp</label><div>"+d[0]['Supply Air Temp']+"</div></div><div class='sub-one'><label>SupplyWaterTemp</label><div>"+d[0]['CW Sup Temp']+"</div></div><div class='sub-one'><label>ActuatorLevel</label><div>"+parseFloat(d[0]['Actuator Level']).toFixed(2)+"%</div></div><div class='sub-one'><label>FilterPressure</label><div>"+d[0]['Filter Pressure']+"</div></div><div class='sub-one'><label>Delta T</label><div>"+d[0]['Delta T']+"</div></div></div><div class='main-content'><div class='sub-one'><label>Cooling</label><div>ON</div></div><div class='sub-one'><label>ReturnAirTemp</label><div>"+d[0]['Return Air Temp']+"</div></div><div class='sub-one'><label>ReturnWaterTemp</label><div>"+d[0]['CH Ret Temp']+"</div></div><div class='sub-one'><label>VFDControl</label><div>NA</div></div><div class='sub-one'><label>Blockage</label><div>NA</div></div><div class='sub-one'><label>Set Temp</label><div>"+d[0]['Set_Temp']+"</div></div></div></div></div></div></div></div></div></div>";
  }
  

  document.getElementById("hvaccards").innerHTML +=div;
}

  }
</script>
  </body>
</html>