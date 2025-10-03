<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>

    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainertero" ></div>
        <div class="GrphDv" id="energycontaineravg" ></div>
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

    },{
        name: meter,
        data: 55,
        color:'#de9e4b'

    }]
});
<?php }?>
var data2=<?php echo json_encode($avgdata); ?>;
var avgweekday=data2['tero']['avgweekdaycons'];
var avgweekend=data2['tero']['avgweekendcons'];
// var avgtotal=data2['tero']['avgcons'];
(function (H) {
    H.seriesTypes.pie.prototype.animate = function (init) {
        const series = this,
            chart = series.chart,
            points = series.points,
            {
                animation
            } = series.options,
            {
                startAngleRad
            } = series;

        function fanAnimate(point, startAngleRad) {
            const graphic = point.graphic,
                args = point.shapeArgs;

            if (graphic && args) {

                graphic
                    // Set inital animation values
                    .attr({
                        start: startAngleRad,
                        end: startAngleRad,
                        opacity: 1
                    })
                    // Animate to the final position
                    .animate({
                        start: args.start,
                        end: args.end
                    }, {
                        duration: animation.duration / points.length
                    }, function () {
                        // On complete, start animating the next point
                        if (points[point.index + 1]) {
                            fanAnimate(points[point.index + 1], args.end);
                        }
                        // On the last point, fade in the data labels, then
                        // apply the inner size
                        if (point.index === series.points.length - 1) {
                            series.dataLabelsGroup.animate({
                                opacity: 1
                            },
                            void 0,
                            function () {
                                points.forEach(point => {
                                    point.opacity = 1;
                                });
                                series.update({
                                    enableMouseTracking: true
                                }, false);
                                chart.update({
                                    plotOptions: {
                                        pie: {
                                            innerSize: '40%',
                                            borderRadius: 8
                                        }
                                    }
                                });
                            });
                        }
                    });
            }
        }

        if (init) {
            // Hide points on init
            points.forEach(point => {
                point.opacity = 0;
            });
        } else {
            fanAnimate(points[0], startAngleRad);
        }
    };
}

(Highcharts));

Highcharts.chart('energycontaineravg', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Avg of WeekDay & Weekend & Total Consumption'
    },
    subtitle: {
        text: ''
    },
    tooltip: {
        headerFormat: '',
        pointFormat:
            '<span style="color:{point.color}">\u25cf</span> ' +
            '{point.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            borderWidth: 2,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage}%',
                distance: 20
            }
        }
    },
    series: [{
        // Disable mouse tracking on load, enable after custom animation
        enableMouseTracking: false,
        animation: {
            duration: 2000
        },
        colorByPoint: true,
        data: [{
            name: 'Avg. of Weekday Consumption',
            y: avgweekday
        }, {
            name: 'Avg. of Weekend Consumption',
            y: avgweekend
        },]
    }]
});
    <?php }?>
    
</script>