<?php
//echo "<pre>";print_r($meters);
$meterList =array();
for ($i=0; $i < count($meters); $i++) { 
  array_push($meterList,$meters[$i]->MeterName);
}

// if (in_array("Trubeam AHU-1", $meterList)) {
//     echo "Got Irix";
// }
// if (in_array("Waiting Hall", $meterList)) {
//     echo "Got mac";
// }
// die();
//print_r($meterList);die();
//$meters_names = implode(",", $meterList);
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

  <!-- <link rel="stylesheet" href="<?php // echo base_url(); ?>asset/ahu/css/ahuStyle.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

  <link rel="icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
  
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php $this->load->view('header/ahuheader');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('navigation/ahunavigator');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       HVAC Graph Report
      </h1>
     
    </section>
    <div id="alert"></div>
        <!-- Main content -->
        <section class="content">
          <form>
          <div class="row meter-top">
            <label>Select HVAC : 
            </label>
        <select id="multiMeter" >
        <option>None Selected</option>
          <?php 
          foreach ($meterList as $value) {
          ?>
            <option value="<?php echo $value; ?>"> 
              <?php echo $value; ?> 
            </option>
          <?php } ?>
        </select>
        
        <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
        <!-- <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true"> -->
        <button type="button" onclick="getHvacLevelReport()"; class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
      </div>
        </form>
        <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <!--  first fuel graph start -->

        <div class="col-md-12" id="graph_1">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
            <?php //if() ?>
              <div class="chart" id="running" style="display: none;">
                
              </div>
              <div class="chart" id="settemp" style="display: none;">
               
              </div>
              <div class="chart" id="rasettemp" style="display: none;">
               
              </div>
              <div class="chart" id="humidity" style="display: none;">
               
              </div>
              <div class="chart" id="returnair">
               
              </div>
              <div class="chart" id="supplyair">
               
              </div>
              <div class="chart" id="returnwater">
               
              </div>
              <div class="chart" id="supwater">
               
              </div>
              <div class="chart" id="actator">
               
              </div>
              <div class="chart" id="pressure">
               
              </div>
              <div class="chart" id="deltat" style="display: none;">
               
               </div>
               <div class="chart" id="deltatwt" style="display: none;">
                
               </div>  
               <div class="chart" id="fan1power" style="display: none;">
               
               </div>
               <div class="chart" id="fan2power" style="display: none;">
                
               </div>  
               <div class="chart" id="heater1" style="display: none;">
                
                </div> 
                <div class="chart" id="heater2" style="display: none;">
                
                </div> 
                <div class="chart" id="heater3" style="display: none;">
                
                </div>                    
            </div>

          </div>
          
        </div>
      
        <!-- first fuel graph end -->

        
        
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

function plotGraph(data){
    var d =  JSON.parse(data);
    $("#loading").css("display", "none");

if(d[0]['meter']=='Trubeam AHU-1' || d[0]['meter']=='Trubeam AHU-2'){
    $("#running").css("display", "none");
    $("#settemp").css("display", "none");
    $("#actator").css("display", "none");
    $("#rasettemp").css("display", "block");
    $("#humidity").css("display", "block");
    $("#deltat").css("display", "block");
    $("#deltatwt").css("display", "block");
    $("#fan1power").css("display", "block");
    $("#fan2power").css("display", "block");
    $("#heater1").css("display", "block");
    $("#heater2").css("display", "block");
    $("#heater3").css("display", "block");
    var xdatahum = new Array();
    var ydatahum = new Array();

    var xdatastempra = new Array();
    var ydatastempra = new Array();

    var xdatadeltat = new Array();
    var ydatadeltat = new Array();

    var xdatadeltatwt = new Array();
    var ydatadeltatwt = new Array();

    var xdatafan1 = new Array();
    var ydatafan1 = new Array();

    var xdatafan2 = new Array();
    var ydatafan2 = new Array();

    var xheater1 = new Array();
    var yheater1 = new Array();

    var xheater2 = new Array();
    var yheater2 = new Array();

    var xheater3 = new Array();
    var yheater3 = new Array();


    for (i = 0; i < d[0]['humidity'].length; i++) 
    { 
        xdatahum[i] = d[0]['humidity'][i]['TxnTime'];
        ydatahum[i] = parseFloat(d[0]['humidity'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['rastemp'].length; i++) 
    { 
        xdatastempra[i] = d[0]['rastemp'][i]['TxnTime'];
        ydatastempra[i] = parseFloat(d[0]['rastemp'][i]['Consumption']); 
        
      
    }
    for (i = 0; i < d[0]['deltachill'].length; i++) 
    { 
        xdatadeltatwt[i] = d[0]['deltachill'][i]['TxnTime'];
        ydatadeltatwt[i] = parseFloat(d[0]['deltachill'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['deltaair'].length; i++) 
    { 
        xdatadeltat[i] = d[0]['deltaair'][i]['TxnTime'];
        ydatadeltat[i] = parseFloat(d[0]['deltaair'][i]['Consumption']); 
        
      
    }
    for (i = 0; i < d[0]['fan1power'].length; i++) 
    { 
        xdatafan1[i] = d[0]['fan1power'][i]['TxnTime'];
        ydatafan1[i] = parseFloat(d[0]['fan1power'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['fan2power'].length; i++) 
    { 
        xdatafan2[i] = d[0]['fan2power'][i]['TxnTime'];
        ydatafan2[i] = parseFloat(d[0]['fan2power'][i]['Consumption']); 
        
      
    }
    for (i = 0; i < d[0]['heater1'].length; i++) 
    { 
        xheater1[i] = d[0]['heater1'][i]['TxnTime'];
        yheater1[i] = parseInt(d[0]['heater1'][i]['Consumption']); 
        
      
    }
    for (i = 0; i < d[0]['heater2'].length; i++) 
    { 
        xheater2[i] = d[0]['heater2'][i]['TxnTime'];
        yheater2[i] = parseInt(d[0]['heater2'][i]['Consumption']); 
        
      
    }
    for (i = 0; i < d[0]['heater3'].length; i++) 
    { 
        xheater3[i] = d[0]['heater3'][i]['TxnTime'];
        yheater3[i] = parseInt(d[0]['heater3'][i]['Consumption']); 
        
      
    }
}else{
    $("#running").css("display", "block");
    $("#settemp").css("display", "block");
    $("#actator").css("display", "block");
    $("#rasettemp").css("display", "none");
    $("#humidity").css("display", "none");
    $("#deltat").css("display", "none");
    $("#deltatwt").css("display", "none");
    $("#fan1power").css("display", "none");
    $("#fan2power").css("display", "none");
    $("#heater1").css("display", "none");
    $("#heater2").css("display", "none");
    $("#heater3").css("display", "none");
}
    var xdatasat = new Array();
    var ydatasat = new Array();

    var xdatarat = new Array();
    var ydatarat = new Array();

    var xdatarwt = new Array();
    var ydatarwt = new Array();

    var xdataswt = new Array();
    var ydataswt = new Array();

    var xdataactu = new Array();
    var ydataactu = new Array();

    var xdatastemp = new Array();
    var ydatastemp = new Array();

    var xdatapressure = new Array();
    var ydatapressure = new Array();

    var xdatarun = new Array();
    var ydatarun = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d[0]['sat'].length; i++) 
    { 
        xdatasat[i] = d[0]['sat'][i]['TxnTime'];
        ydatasat[i] = parseInt(d[0]['sat'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['rat'].length; i++) 
    { 
        xdatarat[i] = d[0]['rat'][i]['TxnTime'];
        ydatarat[i] = parseInt(d[0]['rat'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['rwt'].length; i++) 
    { 
        xdatarwt[i] = d[0]['rwt'][i]['TxnTime'];
        ydatarwt[i] = parseInt(d[0]['rwt'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['swt'].length; i++) 
    { 
        xdataswt[i] = d[0]['swt'][i]['TxnTime'];
        ydataswt[i] = parseInt(d[0]['swt'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['actu'].length; i++) 
    { 
        xdataactu[i] = d[0]['actu'][i]['TxnTime'];
        ydataactu[i] = parseInt(d[0]['actu'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['stemp'].length; i++) 
    { 
        xdatastemp[i] = d[0]['stemp'][i]['TxnTime'];
        ydatastemp[i] = parseInt(d[0]['stemp'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['pressure'].length; i++) 
    { 
        xdatapressure[i] = d[0]['pressure'][i]['TxnTime'];
        ydatapressure[i] = parseInt(d[0]['pressure'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['run'].length; i++) 
    { 
        xdatarun[i] = d[0]['run'][i]['Time'];
        ydatarun[i] = parseInt(d[0]['run'][i]['rh']); 
        
      
    }
    Highcharts.chart('running', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Running Hours'
        },
       
        xAxis: {
            categories: xdatarun
        },
        yAxis: {
            title: {
                text: 'Min'
            },
                      tickInterval: 2,
                      min:0     

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Running Hours',
            data: ydatarun
        }]
    });

    Highcharts.chart('settemp', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Set Temperature'
        },
       
        xAxis: {
            categories: xdatastemp
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Set Temperature',
            data: ydatastemp
        }]
    });
    Highcharts.chart('returnair', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Return Air Temperature'
        },
       
        xAxis: {
            categories: xdatarat
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Return Air Temp',
            data: ydatarat
        }]
    });
     Highcharts.chart('supplyair', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Supply Air Temperature'
        },
       
        xAxis: {
            categories: xdatasat
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Supply Air Temperature',
            data: ydatasat
        }]
    });
     Highcharts.chart('returnwater', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Return Water Temperature'
        },
       
        xAxis: {
            categories: xdatarwt
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Return Water Temperature',
            data: ydatarwt
        }]
    });
     Highcharts.chart('supwater', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Supply Water Temperature'
        },
       
        xAxis: {
            categories: xdataswt
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Supply Water Temperature',
            data: ydataswt
        }]
    });

Highcharts.chart('actator', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Actuator Level'
        },
       
        xAxis: {
            categories: xdataactu
        },
        yAxis: {
            title: {
                text: 'Percentage(%)'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Actuator Level',
            data: ydataactu
        }]
    });
Highcharts.chart('pressure', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Filter Pressure'
        },
       
        xAxis: {
            categories: xdatapressure
        },
        yAxis: {
            title: {
                text: 'Pa'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Filter Pressure',
            data: ydatapressure
        }]
    });

    Highcharts.chart('rasettemp', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'RA Set Temp'
        },
       
        xAxis: {
            categories: xdatastempra
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'RA Set Temp',
            data: ydatastempra
        }]
    });
    Highcharts.chart('humidity', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'RA Humidity'
        },
       
        xAxis: {
            categories: xdatahum
        },
        yAxis: {
            title: {
                text: '%RH'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'RA Humidity',
            data: ydatahum
        }]
    });
    Highcharts.chart('deltat', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'DeltaT Air'
        },
       
        xAxis: {
            categories: xdatadeltat
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'DeltaT Air',
            data: ydatadeltat
        }]
    });

    Highcharts.chart('deltatwt', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'DeltaT Chiller Water'
        },
       
        xAxis: {
            categories: xdatadeltatwt
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'DeltaT Chiller Water',
            data: ydatadeltatwt
        }]
    });

    Highcharts.chart('fan1power', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fan 1 Power'
        },
       
        xAxis: {
            categories: xdatafan1
        },
        yAxis: {
            title: {
                text: 'kW'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Fan 1 Power',
            data: ydatafan1
        }]
    });

    Highcharts.chart('fan2power', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fan 2 Power'
        },
       
        xAxis: {
            categories: xdatafan2
        },
        yAxis: {
            title: {
                text: 'kW'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Fan 2 Power',
            data: ydatafan2
        }]
    });

    Highcharts.chart('heater1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Heater 1 Status'
        },
       
        xAxis: {
            categories: xheater1
        },
        yAxis: {
            title: {
                text: 'Status'
            },
          tickInterval: 1,
                      min:0   

        },
        tooltip: {
      backgroundColor: null,
      borderWidth: 0,
      shadow: false,
      useHTML: true,
      style: {
        padding: 0
      },
      formatter: function() {
        if (this.point.y == 1){
            var txt='Status:ON<br>Time:'+this.x;
          return txt;
        }else{
            var txt='Status:OFF<br>Time:'+this.x;
          return txt;
        }
        
      }
    },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Heater 1 Status',
            data: yheater1
        }]
    });


    Highcharts.chart('heater2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Heater 2 Status'
        },
       
        xAxis: {
            categories: xheater2
        },
        yAxis: {
            title: {
                text: 'Status'
            },
          tickInterval: 1,
                      min:0   

        },
        tooltip: {
      backgroundColor: null,
      borderWidth: 0,
      shadow: false,
      useHTML: true,
      style: {
        padding: 0
      },
      formatter: function() {
        if (this.point.y == 1){
            var txt='Status:ON<br>Time:'+this.x;
          return txt;
        }else{
            var txt='Status:OFF<br>Time:'+this.x;
          return txt;
        }
        
      }
    },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Heater 2 Status',
            data: yheater2
        }]
    });


    Highcharts.chart('heater3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Heater 3 Status'
        },
       
        xAxis: {
            categories: xheater3
        },
        yAxis: {
            title: {
                text: 'Status'
            },
          tickInterval: 1,
                      min:0   

        },
        tooltip: {
      backgroundColor: null,
      borderWidth: 0,
      shadow: false,
      useHTML: true,
      style: {
        padding: 0
      },
      formatter: function() {
        if (this.point.y == 1){
            var txt='Status:ON<br>Time:'+this.x;
          return txt;
        }else{
            var txt='Status:OFF<br>Time:'+this.x;
          return txt;
        }
        
      }
    },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Heater 3 Status',
            data: yheater3
        }]
    });

    
   
    
}

function getHvacLevelReport()
{
  var valid=validate();
  // alert(valid);
  if(valid)
  {
    // alert("hello");
  
    var fromdate = document.getElementById("fromdate").value;
    var meter = $('#multiMeter').find(":selected").text();
     

    str1 = $.trim(meter);
    str = str1.split(' ').join('_');

    
    
      $("#loading").css("display", "block");
    
       var urlString1 = "getahuData";
      $.ajaxQueue({
        url:urlString1,
        type : 'GET',
        async: true,
        data: {meter: str,fromdate:fromdate},
        success: function(data){
          
          plotGraph(data);
          
        
        }
      });
  
    //document.getElementById('graph_1Runn').style.display = "block";
  }
}


function validate()
{
    //var meterselect = document.getElementsByTagName('select')[0];
    var meter = $('#multiMeter').find(":selected").text();

   //  alert(conceptName);
    //var meter =getSelectValues(meterselect);
    // alert(meter);
    var fromdate = document.getElementById("fromdate").value;
    // alert(fromdate);
    var alertdiv = document.getElementById("alert");
    if(meter =="None Selected")
    {
      alertdiv.innerHTML="Please select meter";
      return false;
    }
      
    if(fromdate == "")
    {
      alertdiv.innerHTML="Please select date properly";
      return false;
    }
   
    alertdiv.innerHTML="";
    return true;
}
</script>
</body>
</html>
