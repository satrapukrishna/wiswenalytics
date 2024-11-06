<html>
<head>
    <?php $this->load->view('common/css3') ?>
  <!-- highchart -->
       <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- end highchart -->
<style> 
img {
vertical-align: middle;
margin-right:10px;}
.form-control{float:left}
table td,table th{border-right:1px solid #ccc}
table th,table th{text-align:center}

.loader {
  border: 16px solid #e4e4e4;
  border-radius: 50%;
  border-top: 16px solid #5bc0de;
  margin-left: 50%;
  margin-top:20px;
  width: 50px;
  height: 50px;
  -webkit-animation-duration: 7s;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
    
    <?php $this->load->view('common/left_menu2') ?>
    <?php $this->load->view('common/header2') ?>
    
       <input type="hidden" id="page" value="running" />
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
    <div class="DshBrdSctn">
      <div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong><?php echo ucfirst($device['device_name'])?> Graph Report</strong>
                  </h3><br/>
                </section>
        <section class="content" >
          <span id="error" style="color:red"></span>
          
          <form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/firepump_graph_search/Pumps")?>" method="post" onSubmit="return formValidation();">
            
              <div class="row meter-top col-md-12">
                           <?php 
                            $options = array('0' => 'Select Report', '1' => 'Running Hours', '2' => 'Status View ', '3' => 'Line Pressure','4' => 'Water Level');
                            echo form_dropdown('multiMeter1', $options, set_value('multiMeter1'), 'class="form-control chosen-select" id="multiMeter1"'); 

                           echo form_dropdown('multiMeter', $devices, set_value('multiMeter'), 'class="form-control chosen-select" id="multiMeter"'); ?>
               
              
              <input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
              

              <input class="form-control" value="<?php echo set_value('todate') ?>" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="todate" id="todate" placeholder="To Date">
              <button type="submit" id="filter" class="btn btn-success">Filter</button>
              <a href="<?php echo site_url('Admin/Home/firepump_reports/Graphical') ?>" class="btn btn-info">Reset</a>
              
              </div>
          </form>
          
          <div class="row meter-top col-md-12">
          
          <div class="loader" id="loader" style="display: none;"></div>
          </div>
          <br/><br/><br/>
          <hr/>
          
          <div class="col-md-12" id="graph_runn1">
            <div class="box box-primary">
              <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
              </div>
              
              
              <div class="box-body">
            <?php if($runn==1){
               for ($i=0; $i < count($running_data); $i++) { 
               ?>
                <div id="<?php echo "container_runn_".$running_data[$i][0]['id'] ?>">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                <?php }}
                 else if($status_view==2){
              //echo "string";
               ?>
                <div id="status">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                 <div id="status2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                 <div id="status3">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                 <div id="status4">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                <?php }
              else if($linepressure==3){
                  //echo "string";
              
               ?>
                <div id="line">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                <?php }
                 else if($waterlevel==4){
              
               ?>
                <div id="waterlevel_view">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                </div>
                <?php }?>

             




            
                                     
              </div>
              
            </div>          
          </div>
                
            
        </section>
      </div>
    </div>
    
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>

<script>


function formValidation()
{
var multiMeter = $("#multiMeter").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
// alert(multiMeter);return false;
if(multiMeter==''){
  $('#error').html("plaese select Meter");
  return false; 
}else if(fromdate == ""){
      $('#error').html("Please select From date");
      return false;
    }else if(todate == ""){
      $('#error').html("Please select To date");
      return false;
    }else{
      var d1 = new Date(fromdate);
      var d2 = new Date(todate);
      var same = d1.getTime() > d2.getTime();
      if(same){
        $('#error').html("Please select dates properly");
        return false;
      }
    }



$('#loader').show();
// var ele = $("#loader");
// setTimeout(function() { ele.hide(); }, 9000);

return true;
}

<?php 

if (!empty($running_data)) { ?>
  var jsondata=<?php echo json_encode($running_data)?>;
  for(var i = 0; i < jsondata.length; i++) {
var dps1 = [];
var dps2 = [];
var runn = [];
var econ = [];

var r;
var t=1;
    for (var j = 0; j < jsondata[i].length; j++) {
      if(j==1 || j==4 && i==1){
        if(jsondata[i][j]["RunningHours"]==null){
            jsondata[i][j]["RunningHours"]=2;
        }
        r=parseInt('2');
        dps1.push(r);
        runn.push(timeConvert(jsondata[i][j]["RunningHours"]));
        dps2.push(jsondata[i][j]["date"]);
      }else{
if(jsondata[i][j]["RunningHours"]==null){
            jsondata[i][j]["RunningHours"]=0;
        }
        r=parseInt(jsondata[i][j]["RunningHours"]);
        dps1.push(r);
        runn.push(timeConvert(jsondata[i][j]["RunningHours"]));
        dps2.push(jsondata[i][j]["date"]);
      }
        
    }
 var meter= jsondata[i][0]['meter'];


  var cnt="container_runn_"+jsondata[i][0]['id'];
Highcharts.chart(cnt, {
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

}
 
<?php }  ?>
//lnepressure
  
  <?php if($linepressure==3){?>
  var jsondata1=<?php echo json_encode($pressure_data)?>;
  //for(var i = 0; i < jsondata.length; i++) {
    var xdata33 = new Array();
     var ydata33 = new Array();
    for (var j = 0; j < jsondata1[0]['pdata'].length; j++) {
      xdata33[j] = jsondata1[0]['pdata'][j]['TxnTime'];
     ydata33[j] = parseFloat(jsondata1[0]['pdata'][j]['CurReading']);
    }
    
Highcharts.chart('line', {

    title: {
        text: 'Line Pressure Graph'
    },

    yAxis: {
         title: {
            text: 'Psi'
        },
        tickInterval: 2,
                      min:0,
                      max:16  
    },

    xAxis: {
        categories: xdata33
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
         name: 'Line Pressure',
        data: ydata33,
        dashStyle: 'DashDot'
    }]

});
  
    <?php }?>
     

  
 

  //end line pressure
   //water level
    <?php if($waterlevel==4){?>
  Highcharts.chart('waterlevel_view', {
    chart: {
        type: 'area',
        scrollablePlotArea: {
            minWidth: 600,
            scrollPositionX: 1
        }
    },
    title: {
        text: 'Water Sump',
        align: 'center'
    },
    
    xAxis: {
     categories: ['01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00','06:00:00', '07:00:00', '08:00:00', '09:00:00', '10:00:00','11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00','16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00', '23:00:00', '24:00:00'],
        type: 'datetime',
        labels: {
            overflow: 'justify'
        }
    },
    yAxis: {
        title: {
            text: 'KL'
        },
        minorGridLineWidth: 0,
        gridLineWidth: 0,
        alternateGridColor: null
    },
    tooltip: {
        valueSuffix: ' KL'
    },
    plotOptions: {
        spline: {
            lineWidth: 4,
            states: {
                hover: {
                    lineWidth: 2
                }
            },
            marker: {
                enabled: false
            },
            pointStart: Date.UTC(2010, 0, 1),
            pointInterval: 60
        }
    },
    series: [{
        name: 'Water Level',
        data: [
            122, 123, 122, 125, 125, 122, 123, 122, 125, 125, 122, 123, 122, 125, 125, 122, 123, 122, 125, 125, 122, 123, 122, 125
        ]

    }]
});
  <?php }?>
  //end water level
  //Status view
  <?php if($status_view==2){?>
  Highcharts.chart('status', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jockey Pump Status View'
    },
    xAxis: {
        categories: ['01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00','06:00:00', '07:00:00', '08:00:00', '09:00:00', '10:00:00','11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00','16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00', '23:00:00', '24:00:00']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Minutes'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'Mins'
        }
    },
    series: [{
        name: 'Auto',
        data: [55, 55, 55, 40, 30,55,55,40,60,30,55, 55, 55, 40, 30,55,55,40,60,30,55,40,60,30],
        color:'#73d179'
    }, {
        name: 'Manual',
        data: [0, 0, 0, 10,  20, 0, 0,10, 0,0,0, 0, 0, 10,  20, 0, 0,10, 0,0,0,10, 0,0],
        color:'#daeb59'
    }, {
        name: 'Off',
        data: [5, 5, 5, 10, 10,5,5,10,0,30,5, 5, 5, 10, 10,5,5,10,0,30,5,10,0,30],
        color: '#FF0000'
    }]
});
  Highcharts.chart('status2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sprinkler Pump Status View'
    },
    xAxis: {
        categories: ['01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00','06:00:00', '07:00:00', '08:00:00', '09:00:00', '10:00:00','11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00','16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00', '23:00:00', '24:00:00']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Minutes'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'Mins'
        }
    },
    series: [{
        name: 'Auto',
        data: [55, 55, 55, 40, 30,55,55,40,60,30,55, 55, 55, 40, 30,55,55,40,60,30,55,40,60,30],
        color:'#73d179'
    }, {
        name: 'Manual',
        data: [0, 0, 0, 10,  20, 0, 0,10, 0,0,0, 0, 0, 10,  20, 0, 0,10, 0,0,0,10, 0,0],
        color:'#daeb59'
    }, {
        name: 'Off',
        data: [5, 5, 5, 10, 10,5,5,10,0,30,5, 5, 5, 10, 10,5,5,10,0,30,5,10,0,30],
        color: '#FF0000'
    }]
});
  Highcharts.chart('status3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Hydrant Pump Status View'
    },
    xAxis: {
        categories: ['01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00','06:00:00', '07:00:00', '08:00:00', '09:00:00', '10:00:00','11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00','16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00', '23:00:00', '24:00:00']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Minutes'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'Mins'
        }
    },
    series: [{
        name: 'Auto',
        data: [55, 55, 55, 40, 30,55,55,40,60,30,55, 55, 55, 40, 30,55,55,40,60,30,55,40,60,30],
        color:'#73d179'
    }, {
        name: 'Manual',
        data: [0, 0, 0, 10,  20, 0, 0,10, 0,0,0, 0, 0, 10,  20, 0, 0,10, 0,0,0,10, 0,0],
        color:'#daeb59'
    }, {
        name: 'Off',
        data: [5, 5, 5, 10, 10,5,5,10,0,30,5, 5, 5, 10, 10,5,5,10,0,30,5,10,0,30],
        color: '#FF0000'
    }]
});
   Highcharts.chart('status4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Diesel Pump Status View'
    },
    xAxis: {
        categories: ['01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00','06:00:00', '07:00:00', '08:00:00', '09:00:00', '10:00:00','11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00','16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00', '23:00:00', '24:00:00']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Minutes'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'Mins'
        }
    },
    series: [{
        name: 'Auto',
        data: [55, 55, 55, 40, 30,55,55,40,60,30,55, 55, 55, 40, 30,55,55,40,60,30,55,40,60,30],
        color:'#73d179'
    }, {
        name: 'Manual',
        data: [0, 0, 0, 10,  20, 0, 0,10, 0,0,0, 0, 0, 10,  20, 0, 0,10, 0,0,0,10, 0,0],
        color:'#daeb59'
    }, {
        name: 'Off',
        data: [5, 5, 5, 10, 10,5,5,10,0,30,5, 5, 5, 10, 10,5,5,10,0,30,5,10,0,30],
        color: '#FF0000'
    }]
});
  <?php }?>
  //end status view
  



function timeConvert(n) {
var num = n;
var hours = (num / 60);
var rhours = Math.floor(hours);
var minutes = (hours - rhours) * 60;
var rminutes = Math.round(minutes);
return rhours + " hour(s) and " + rminutes + " minute(s).";
}
  $('#firepump').click(function(){
  $('#subfirepump').toggle('slow');
  return false;
});
 
  
 </script>  
</html>