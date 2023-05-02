<?php
//echo "<pre>";print_r($meters);die();
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
    <link rel="shortcut icon" type="imag/x-icon" href="../../dist/img/fav.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-horizon/0.1.1/bootstrap-horizon.css"/>
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
        <!-- Main content -->
        <section class="content">
            <!-- fliter section starts here -->

          <!-- fliter section  end -->

         <!--  multi garph start from here -->
          
          <div class="row">
            <div class="col-md-12">
              <!-- interactive chart -->
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
                  <div class="horizotal row-horizon chartWrapper">
                <div class="chart">
                 <canvas id="canvas" style="height:290px !important"></canvas>
             </div>
             <div class="hl">
                  <i class="fa fa-chevron-right" aria-hidden="true">
                  </i>
                  <p>Date
                  </p>
                </div>

             <div style="padding-left: 18px;padding-bottom: 10px;display: inline-flex;" id="meterslist">
                  <div style="width: 20px;height: 20px;background-color:rgba(255,99,132,1);margin-right: 13px;">
                  </div> 
                  <span style="margin-right: 10px;">EB_KW2
                  </span>
                  <div style="width: 20px;height: 20px;background-color: rgba(54, 162, 235, 1);margin-right: 13px;">
                  </div> 
                  <span style="margin-right: 10px;">EB_KW3
                  </span>
                 <!--  <div style="width: 20px;height: 20px;background-color: rgba(255, 206, 86, 1);margin-right: 13px;">
                  </div> 
                  <span style="margin-right: 10px;">EB_KW4
                  </span>
                  <div style="width: 20px;height: 20px;background-color: rgba(75, 192, 192, 1);margin-right: 13px;">
                  </div> 
                  <span style="margin-right: 10px;">EB_KW5
                  </span>
                  <div style="width: 20px;height: 20px;background-color: rgba(153, 102, 255, 1);margin-right: 13px;">
                  </div>
                  <span style="margin-right: 10px;">EB_KW6
                  </span>
                  <div style="width: 20px;height: 20px;background-color: rgba(255, 159, 64, 1);margin-right: 13px;">
                  </div> -->
                </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <!--  multi garph  end -->
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2018
          <a href="https://adminlte.io">Protech
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
   <script type="text/javascript">
   var ctx = document.getElementById("canvas");

Chart.pluginService.register({
    afterDraw: function(chart) {
        if (typeof chart.config.options.lineAt != 'undefined') {
            var lineAt = chart.config.options.lineAt;
            var ctxPlugin = chart.chart.ctx;
            var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
            var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
            
            // I'm not good at maths
            // So I couldn't find a way to make it work ...
            // ... without having the `min` property set to 0
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

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["20-08-2018(Monday)", "21-08-2018(Tuesday)", "22-08-2018(Wednesday)", "23-08-2018(Thursday)", "24-08-2018(Friday)", "25-08-2018(Saturday)","26-08-2018(Sunday)","27-08-2018(Monady)","28-08-2018(Tuesday)","29-08-2018(Wednesday)"],
        datasets: [{
            label: 'Energy Meter',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)'
            ],
            borderWidth: 1
        },
        {
            label: 'Energy Meter',
            data: [5, 10, 18, 23, 12, 6],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }
        ,
        {
            label: 'Energy Meter',
            data: [5, 10, 18, 23, 12, 6],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }
        ]
    }
    options: {
        lineAt: 10,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0
                }
            }]
        }
    }*/
});

</script>
  </body>
</html>