<?php
//print_r($metervalues);
//die();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Protech Dashboard
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
            Fuel Consumption Report
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
        <select id="multiMeter" multiple="multiple" >
          <option>Meter1</option>
          <option>Meter2</option>
          <option>Meter3</option>
          <option>Meter4</option>
          <option>Meter5</option>
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
             <label>Select Hours From : 
            </label>
        <select  id="fromtime">
          <option value="Select Hours">Select Hours From
          </option>
          <option>00:00:00</option>
          <option>01:00:00</option>
          <option>02:00:00</option>
          <option>03:00:00</option>
          <option>04:00:00</option>
        </select>
         <label>Select Hours To : 
            </label>
        <select  id="totime">
          <option value="Select Hours">Select Hours To
          </option>
         <option>00:00:00</option>
          <option>01:00:00</option>
          <option>02:00:00</option>
          <option>03:00:00</option>
          <option>04:00:00</option>
        </select>
        <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
        <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick=""; class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
      </div>
        </form>
        <!-- animation starts -->

        <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>

        <!-- animation end -->

          <div class="row" id="chart">
            <div class="col-md-12" >

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
                 <canvas id="bar-chart-grouped" style="height:290px !important"></canvas>
                </div>
                 <div class="hl">
                      <i class="fa fa-chevron-right" aria-hidden="true">
                      </i>
                      <p>Date
                      </p>
                  </div>
                    <!-- <div style="padding-left: 18px;padding-bottom: 10px;display: inline-flex !important;" id="meterslist">
                      <div style="width: 20px;height: 20px;background-color:rgba(0,0,255,1);margin-right: 13px;float: left;">
                      </div> 
                      <span id="avgspan" style="margin-right: 10px;">
                      </span>
                  </div> -->
                
                
                </div>
              
            </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2018
          <a href="">Protech
          </a>.
        </strong> All rights
        reserved.
      </footer>
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
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
    </script>
<script>
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["Meter1", "Meter2", "Meter3", "Meter3"],
      datasets: [
        {
          label: "Fuel Level",
          backgroundColor: "rgba(255, 99, 132, 0.2)",
          borderColor:"rgba(255,99,132,1)",
          borderWidth: 1,
          data: [13,22,78,24],

        }, 
        {
          label: "Fuel Consumption",
          backgroundColor: "rgba(54, 162, 235,0.2)",
          borderColor:"rgba(54, 162, 235, 1)",
          borderWidth: 1,
          data: [8,47,75,34]
        },
        {
          label: "Fuel Added",
          backgroundColor: "rgba(255, 206, 86,0.2)",
          borderColor:"rgba(255, 206, 86, 1)",
          borderWidth: 1,
          data: [40,54,67,73]
        },
        {
          label: "Fuel Removed",
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor:"rgba(75, 192, 192, 1)",
          borderWidth: 1,
          data: [18,37,47,56]
        }

      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});
</script>
  </body>
</html>