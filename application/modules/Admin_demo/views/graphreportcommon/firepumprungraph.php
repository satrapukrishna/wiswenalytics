<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl"><?php echo $firepump_data[0]['meter'] ?></span>
<span class="SctnTtl"><?php echo $firepump_data[0]['meter'] ?> Running Hours Graph Report</span>

<?php for ($l=0; $l < count($firepump_data[0]['fire_runn'][0]); $l++) { ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="fire_one<?php echo $l; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl"><?php echo $firepump_data[0]['meter'] ?> Fuel Level Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_fuellevel_f1"></div>
</div>
<span class="SctnTtl"><?php echo $firepump_data[0]['meter'] ?> DG Running Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_dgrunn_f1"></div>
</div>
<span class="SctnTtl"><?php echo $firepump_data[0]['meter'] ?> DG Fuel Added Graph Report</span>
<div class="GrphMnHldr FllWdth DgfAdd">
    <div class="GrphDv" id="container_fadd_f1"></div>
</div>
<span class="SctnTtl"><?php echo $firepump_data[0]['meter'] ?> DG Fuel Removed Graph Report</span>
<div class="GrphMnHldr FllWdth DgfAdd">
    <div class="GrphDv" id="container_fremove_f1"></div>
</div>

<script>
    <?php
    for ($l=0; $l < count($firepump_data[0]['fire_runn'][0]); $l++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for ($k=0; $k <count($firepump_data[0]['fire_runn']) ; $k++) { 
    array_push($xdata,$firepump_data[0]['fire_runn'][$k][$l]['date']);
    array_push($ydata,$firepump_data[0]['fire_runn'][$k][$l]['running_hours1']);    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$firepump_data[0]['fire_runn'][0][$l]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('fire_one<?php echo $l; ?>', {
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
            text: 'Min'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Running: ' + this.point.y+'Min';
            }
        
        //valueDecimals: 2
    },
    // tooltip: {
    //     headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
    //     pointFormat: '<tr><td style="font-size:8px"><b>Consumption</b>: </td>' +
    //         '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
    //     footerFormat: '</table>',
    //     shared: true,
    //     useHTML: true
    // },
    series: [{
        name: meter,
        data: ydata,
        color:'#de9e4b'

    }]
});
<?php }?>

var fl_data=<?php echo json_encode($firepump_data[0]['fire_fuel_level']);?>;
    
     
         var fl_meter='Fuel Level';
         var contain="container_fuellevel_f1";
         var xdata_fl=[];
         var time;
        for(var i=0;i<fl_data.length;i++){
        time = (new Date(fl_data[i]["time"])).getTime()+(5*60+30)*60000;

        xdata_fl.push([time, parseFloat(fl_data[i]["flevel"])]);
        }

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ' '
    },
    chart: {
        type: 'line'
    },
    yAxis: {
        tickInterval: 1,
        tickAmount: 5,
        min: 2,
        title: {
            text: 'Liters'
        }
    },
    xAxis: {
      type: 'datetime',
    },tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Liters</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: fl_meter,
      data: xdata_fl,
    }]
  
});

<?php
$xdata=array();
$ydata_runn=array();
$ydata_add=array();
$ydata_remove=array();
$fulldata=array();
for($i=0;$i<count($firepump_data[0]['fire_dg']);$i++){ 
array_push($xdata,$firepump_data[0]['fire_dg'][$i]['date']);
array_push($ydata_runn,$firepump_data[0]['fire_dg'][$i]['run']);
array_push($ydata_add,$firepump_data[0]['fire_dg'][$i]['fadd']);
array_push($ydata_remove,$firepump_data[0]['fire_dg'][$i]['fremove']);


}
$fulldata['xdata']=$xdata;
$fulldata['ydata_run']=$ydata_runn;
$fulldata['ydata_add']=$ydata_add;
$fulldata['ydata_remove']=$ydata_remove;
$fulldata['meter']=$firepump_data[0]['fire_dg'][0]['name']; ?>
 var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata_run=data['ydata_run'];
    var ydata_add=data['ydata_add'];
    var ydata_remove=data['ydata_remove'];
    var meter=data['meter'];
Highcharts.chart('container_dgrunn_f1', {
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
            text: 'Min'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Min</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: ydata_run

    }]
});
Highcharts.chart('container_fadd_f1', {
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
            text: 'Liters'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Liters</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: ydata_add

    }]
});
Highcharts.chart('container_fremove_f1', {
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
            text: 'Liters'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Liters</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: ydata_remove

    }]
});


</script>