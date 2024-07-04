<?php
$xdata=array();
$ydata=array();
$fulldata=array();
// echo json_encode($dgdata);die();
for($j=0;$j<count($dgdata);$j++){ 
// for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){ 
// array_push($xdata,$dgdata[$j]['consolidate'][$i]['date']);
// array_push($ydata,$dgdata[$j]['consolidate'][$i]['run1']);


// }
// $fulldata['xdata']=$xdata;
// $fulldata['ydata']=$ydata;
// $fulldata['meter']=$dgdata[0]['consolidate'][0]['dgname']; 
?>

<span class="SctnTtl"><?php echo $dgdata[$j]['consolidate'][0]['dgname']."(".$dgdata[$j]['consolidate'][0]['location'].")" ?> Fuel Level Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_fuellevel_dg<?php echo $j; ?>"></div>
</div>
<span class="SctnTtl"><?php echo $dgdata[$j]['consolidate'][0]['dgname']."(".$dgdata[$j]['consolidate'][0]['location'].")" ?> Running Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_dgrunn<?php echo $j; ?>"></div>
</div>
<span class="SctnTtl"><?php echo $dgdata[$j]['consolidate'][0]['dgname']."(".$dgdata[$j]['consolidate'][0]['location'].")" ?> Fuel Added Graph Report</span>
<div class="GrphMnHldr FllWdth DgfAdd">
    <div class="GrphDv" id="container_fadd<?php echo $j; ?>"></div>
</div>
<span class="SctnTtl"><?php echo $dgdata[$j]['consolidate'][0]['dgname']."(".$dgdata[$j]['consolidate'][0]['location'].")" ?> Fuel Removed Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_fremove<?php echo $j; ?>"></div>
</div>
<?php }?>
<script>
<?php for($j=0;$j<count($dgdata);$j++){  ?>
var fl_data=<?php echo json_encode($dgdata[$j]['fuel_level']['dg_fuel_level']);?>;
    
     
    var fl_meter='Fuel Level';
    var contain="container_fuellevel_dg<?php echo $j; ?>";
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
    tickInterval: 50,
        tickAmount: 5,
        min: 50,
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

<?php }?>
<?php

// echo json_encode($dgdata);die();
for($j=0;$j<count($dgdata);$j++){ 
    $xdata=array();
$ydata=array();
$ydata_add=array();
$ydata_remove=array();
$fulldata=array();
for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){ 
array_push($xdata,$dgdata[$j]['consolidate'][$i]['date']);
array_push($ydata,$dgdata[$j]['consolidate'][$i]['run1']);
array_push($ydata_add,$dgdata[$j]['consolidate'][$i]['fadd']);
array_push($ydata_remove,$dgdata[$j]['consolidate'][$i]['fremove']);


}
$fulldata['xdata']=$xdata;
$fulldata['ydata']=$ydata;
$fulldata['ydata_add']=$ydata_add;
$fulldata['ydata_remove']=$ydata_remove;
$fulldata['meter']=$dgdata[$j]['consolidate'][0]['dgname']; 
?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var ydata_add=data['ydata_add'];
    var ydata_remove=data['ydata_remove'];
    var meter=data['meter'];
Highcharts.chart('container_dgrunn<?php echo $j; ?>', {
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
        pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:10px">{series.name}: </td>' +
            '<td style="padding:0;font-size:10px"><b>{point.y} Min</b></td></tr>',
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
        data: ydata,
        color:'#2ca832'

    }]
});
Highcharts.chart('container_fadd<?php echo $j; ?>', {
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
Highcharts.chart('container_fremove<?php echo $j; ?>', {
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
<?php }?>
</script>