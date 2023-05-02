<?php
 ?>
<span class="SctnTtl">Water Meter Consumption Graph Report</span>
<?php for($p=0;$p<count($flowdata);$p++){ ?>
<div class="GrphMnHldr WtrMtr">
    <div class="GrphDv" id="container<?php echo $p; ?>" ></div>
</div>
<?php }?>


    <div class="GrphMnHldr FllWdth WtrLvl">
        <div class="GrphDv" id="water_meter"></div>
    </div>

<script>
    <?php
    for ($k=0; $k < count($flowdata); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($flowdata[$k]['consolidate']);$i++){ 
    array_push($xdata,$flowdata[$k]['consolidate'][$i]['date']);
    array_push($ydata,$flowdata[$k]['consolidate'][$i]['consumption']);
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$flowdata[$k]['consolidate'][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('container<?php echo $k; ?>', {
    chart: {
        type: 'column'
    },

    credits: {
        enabled: false
    },
    title: {
        text: ' '
    },
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KL'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Inflow: ' + this.point.y+'KL';
            }
        
        //valueDecimals: 2
    },
    // tooltip: {
    //     headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
    //     pointFormat: '<tr><td style="font-size:8px"><b>Inflow:</b> </td>' +
    //         '<td style="font-size:8px"><b>{point.y} KL</b></td></tr>',
    //     footerFormat: '</table>',
    //     shared: true,
    //     useHTML: true
    // },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: ydata,
        color:'#70a0db'

    }]
});
<?php }?>

const dps1=new Array();
var dps2=[];
   var data=<?php echo json_encode($water_meter_data_month); ?>;
   
   //var array = [10,20,30,40,50]
    
    var series = [],
        len = dps1.length,
        i = 0;
    
    for(i;i<data.length;i++){
        series.push({
            name: data[i]['meter'],
            data:data[i]['conses']
        });
    }
var pressurecontainer9="water_meter";


Highcharts.chart(pressurecontainer9, {
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
      
        type: 'line'
    },

                      credits: {
                          enabled: false
                      },
      
    title: {
        text: 'Consumption'
    },
    
     xAxis: {
      title: {      
      text: 'Meter'      
    },
      categories: data[0]['dates']
    },
     yAxis: {
      title: {      
      text: 'Consumption (KL)'     
    }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Consumption: ' + this.point.y+'KL';
            }
        
        //valueDecimals: 2
    },  
     series
     ,plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    responsive: {
    rules: [{
      condition: {
        
        maxHeight:100
      }
    }]
    }
}); 
</script>