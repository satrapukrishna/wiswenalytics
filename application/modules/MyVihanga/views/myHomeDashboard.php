<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Home Vihanga</title>
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
<div class="wrapper">

   <?php $this->load->view('header');?>
   <?php $this->load->view('navigation');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row water-tank">

      <h1>
        <img src="<?php echo base_url(); ?>asset/common-utilits/dist/img/Forma.png"  alt="">
        Water Tank Level
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div>08/04/2019 11:12:14</div>
        </li>
        <li>
          <label>Total Liters</label> :
          <div>15,000 Kilo Ltrs</div>
        </li>
        <li>
          <label>Municipal Water</label> :
          <div>8000 Ltrs</div>
        </li>
      </ul>
      </div>
     
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
       
        <section class="">
              <div class="row">
               <div class="col-md-3">
                  <div class="tank waterTankHere1"></div>
                  <div class="tank waterTankHere2"></div>
                  <div class="tanker-details">
                    <h4>Over Tank 1</h4>
                    <ul>
                      <li>
                        <label>Current  Level</label>
                        <div>500 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>5000 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>30%</div>
                      </li>
                    </ul>
                  </div>
               </div>
                <div class="col-md-3">
                  <div class="tank waterTankHere3"></div>
                  <div class="tank waterTankHere4"></div>
                  <div class="tanker-details">
                    <h4>Sump 1</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>1500 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>8000 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>55%</div>
                      </li>
                    </ul>
                  </div>
               </div>
                <div class="col-md-3">
                  <div class="tank waterTankHere5"></div>
                  <div class="tank waterTankHere6"></div>
                  <div class="tanker-details">
                    <h4>Over Tank 2</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>1000 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>7500 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>85%</div>
                      </li>
                    </ul>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="tank waterTankHere13"></div>
                  <div class="tank waterTankHere14"></div>
                  <div class="tanker-details">
                    <h4>Over Tank 3</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>1000 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>7500 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>85%</div>
                      </li>
                    </ul>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-3">
                  <div class="tank waterTankHere7"></div>
                  <div class="tank waterTankHere8"></div>
                  <div class="tanker-details">
                    <h4>Sump 2</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>400 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>9500 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>30%</div>
                      </li>
                    </ul>
                  </div>
               </div>
                <div class="col-md-3">
                  <div class="tank waterTankHere9"></div>
                  <div class="tank waterTankHere10"></div>
                  <div class="tanker-details">
                    <h4>Over Tank 4</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>700 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>8500 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>55%</div>
                      </li>
                    </ul>
                  </div>
               </div>
                <div class="col-md-3">
                  <div class="tank waterTankHere11"></div>
                  <div class="tank waterTankHere12"></div>
                  <div class="tanker-details">
                    <h4>Over Tank 5</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>7000 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>7500 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>85%</div>
                      </li>
                    </ul>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="tank waterTankHere15"></div>
                  <div class="tank waterTankHere16"></div>
                  <div class="tanker-details">
                    <h4>Sump 6</h4>
                    <ul>
                      <li>
                        <label>Current Level</label>
                        <div>1000 Ltrs</div>
                      </li>
                      <li>
                        <label>Total Capacity</label>
                        <div>7500 Litre</div>
                      </li>
                      <li>
                        <label>Filled</label>
                        <div>85%</div>
                      </li>
                    </ul>
                  </div>
               </div>
             </div>  
        </section>
      </div>
      <!-- /.row (main row) -->

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
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/waterTank.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  
  $('.waterTankHere1').waterTank({
    width: 200,
    height: 180,
    color: '#eda7a7',
    level:30
    
  })
  
  $('.waterTankHere2').waterTank({
    width: 20,
    height: 180,
    color: '#eda7a7',
    level: 30
  })

  $('.waterTankHere3').waterTank({
    width: 200,
    height: 180,
    color: '#68b1ba',
    level:55
    
  })
  
  $('.waterTankHere4').waterTank({
    width: 20,
    height: 180,
    color: '#68b1ba',
    level: 55
  })

  $('.waterTankHere5').waterTank({
    width: 200,
    height: 180,
    color: '#68ba8e',
    level:100
    
  })
  
  $('.waterTankHere6').waterTank({
    width: 20,
    height: 180,
    color: '#68ba8e',
    level: 100
  })
  $('.waterTankHere7').waterTank({
    width: 200,
    height: 180,
    color: '#68ba8e',
    level: 45
    
  })
  
  $('.waterTankHere8').waterTank({
    width: 20,
    height: 180,
    color: '#68ba8e',
    level: 45
  })
  $('.waterTankHere9').waterTank({
    width: 200,
    height: 180,
    color: '#eda7a7',
    level: 25
    
  })
  
  $('.waterTankHere10').waterTank({
    width: 20,
    height: 180,
    color: '#eda7a7',
    level: 25
  })
  $('.waterTankHere11').waterTank({
    width: 200,
    height: 180,
    color: '#68b1ba',
    level: 15
    
  })
  
  $('.waterTankHere12').waterTank({
    width: 20,
    height: 180,
    color: '#68b1ba',
    level: 15
  })
  $('.waterTankHere13').waterTank({
    width: 200,
    height: 180,
    color: '#68b1ba',
    level: 15
    
  })
  
  $('.waterTankHere14').waterTank({
    width: 20,
    height: 180,
    color: '#68b1ba',
    level: 15
  })
  $('.waterTankHere15').waterTank({
    width: 200,
    height: 180,
    color: '#eda7a7',
    level: 45
    
  })
  
  $('.waterTankHere16').waterTank({
    width: 20,
    height: 180,
    color: '#eda7a7',
    level: 45
  })


});
</script>

</body>
</html>
