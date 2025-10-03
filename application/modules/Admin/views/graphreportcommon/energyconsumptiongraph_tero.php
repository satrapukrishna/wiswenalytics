<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>

    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainertero" ></div>
        <div class="GrphDv" id="container" ></div>
        <div class="GrphDv" id="container2" ></div>
        <div class="GrphDv" id="container3" ></div>
    </div>



<script>
    <?php if($energydata['day']['tero'][0][0]['sort']==2){ ?>
        <?php
    for ($k=0; $k < count($energydata['day']['tero']); $k++) { 
        
        $fulldata=array();
        for($i=0;$i<count($energydata['day']['tero'][$k]);$i++){ 
            $xdata=array();
            $ydata=array();
            for ($n=0; $n < count($energydata['day']['tero'][$k][$i]['data']); $n++) { 
                array_push($xdata,$energydata['day']['tero'][$k][$i]['data'][$n]['date']);
                array_push($ydata,round($energydata['day']['tero'][$k][$i]['data'][$n]['consumption'],2));
            }
        
            $fulldata[$i]['xdata']=$xdata;
            $fulldata[$i]['ydata']=$ydata;
            $fulldata[$i]['meter']=$energydata['day']['tero'][$k][$i]['meter'];
            $fulldata[$i]['date']=$energydata['day']['tero'][$k][$i]['date'];
    
        }
    
     ?>

    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data[0]['xdata'];
    
    
    var meter=data[0]['meter'];
    var series = [],
        len = data.length,
        i = 0;
    
    for(i;i<len;i++){
        series.push({
            name: data[i]['date'],
            data:data[i]['ydata']
        });
    }
Highcharts.chart('energycontainertero', {
    chart: {
        type: 'line'
    },

    credits: {
        enabled: false
    },
    title: {
        text: meter
    },
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Consumption: ' + this.point.y+'Kwh';
            }
        
        //valueDecimals: 2
    },
    
    series: series
});
<?php }?>
        <?php
    for ($k=0; $k < count($energydata['day']['tero']); $k++) { 
        
        $fulldata=array();
        for($i=0;$i<count($energydata['day']['tero'][$k]);$i++){ 
            $xdata=array();
            $ydata=array();
            for ($n=0; $n < count($energydata['day']['tero'][$k][$i]['data']); $n++) { 
                array_push($xdata,$energydata['day']['tero'][$k][$i]['data'][$n]['date']);
                array_push($ydata,round($energydata['day']['tero'][$k][$i]['data'][$n]['consumption'],2));
            }
        
            $fulldata[$i]['xdata']=$xdata;
            $fulldata[$i]['ydata']=$ydata;
            $fulldata[$i]['meter']=$energydata['day']['tero'][$k][$i]['meter'];
            $fulldata[$i]['date']=$energydata['day']['tero'][$k][$i]['date'];
    
        }
    
     ?>

    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data[0]['xdata'];
    
    
    var meter=data[0]['meter'];
    var series = [],
        len = data.length,
        i = 0;
    
    for(i;i<len;i++){
        series.push({
            name: data[i]['date'],
            data:data[i]['ydata']
        });
    }
Highcharts.chart('energycontainertero', {
    chart: {
        type: 'line'
    },

    credits: {
        enabled: false
    },
    title: {
        text: meter
    },
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Consumption: ' + this.point.y+'Kwh';
            }
        
        //valueDecimals: 2
    },
    
    series: series
});
<?php }?>

    <?php }else{?>
        <?php
    for ($k=0; $k < count($energydata['day']['tero']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['tero'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['tero'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['tero'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['tero'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainertero', {
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
            text: 'Kwh'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Consumption: ' + this.point.y+'Kwh';
            }
        
        //valueDecimals: 2
    },
    
    series: [{
        name: meter,
        data: ydata,
        color:'#de9e4b'

    },]
});
<?php }?>
var data2=<?php echo json_encode($avgdata); ?>;
var avgweekday=data2['tero']['avgweekdaycons'];
var avgweekend=data2['tero']['avgweekendcons'];
var avgtotal=data2['tero']['avgcons'];
var weekday=data2['tero']['weekdaycons'];
var weekend=data2['tero']['weekendcons'];
var total=data2['tero']['totalcons'];
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total & WeekDay & Weekend Consumption'
    },
    subtitle: {
        text:
            ''
    },
    xAxis: {
        categories: ['Total', 'Weekday', 'Weekend'],
        crosshair: true,
        accessibility: {
            description: 'Energy Meters'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Consumption',
            data: [total, weekday, weekend]
        },
        {
            name: 'Avg.Consumption',
            data: [avgtotal, avgweekday, avgweekend]
        }
    ]
});
var data3=<?php echo json_encode($daynightdata); ?>;
var daydata=data3['tero']['daycons'];
var nightdata=data3['tero']['nightcons'];
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Day & Night & Total Consumption'
    },
    subtitle: {
        text:
            ''
    },
    xAxis: {
        categories: ['Total', 'Day', 'Night'],
        crosshair: true,
        accessibility: {
            description: 'Energy Meters'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Consumption',
            data: [{y: total, color: '#a677bf'},     // this point is red
            daydata,                        // default blue
      {y: nightdata, color: '#aaff99'}, // this will be greenish
      ]
      
        }
    ]
});

var data4=<?php echo json_encode($daynightdatamonthly); ?>;

Highcharts.chart('container3', {
    chart: {
        type: 'column',
        custom: {}
    },
    title: {
        text: 'Day & Night Consumption'
    },
    yAxis: {
        title: {
            text: 'Kwh'
        }
    },tooltip: {
        pointFormat: '{series.name}: <b>{point.y:.0f}Kwh</b>'
    },
    legend: {
        enabled: false
    },credits: {
    enabled: false
  },xAxis: {
        categories: data4['date'],
        accessibility: {
            description: ''
        }
    },
    accessibility: {
        point: {
            valueSuffix: ' Kwh'
        }
    },
    series: [
        {
            name: 'day',
            data: data4['day']
        },
        {
            name: 'night',
            data: data4['night']
        }
    ]
});
    <?php }?>
    
</script>