<?php
$xdata=array();
$ydata=array();
$fulldata=array();
for($i=0;$i<count($dgdata[0]['consolidate']);$i++){ 
array_push($xdata,$dgdata[0]['consolidate'][$i]['date']);
array_push($ydata,$dgdata[0]['consolidate'][$i]['run1']);


}
$fulldata['xdata']=$xdata;
$fulldata['ydata']=$ydata;
$fulldata['meter']=$dgdata[0]['consolidate'][0]['dgname']; ?>

<span class="SctnTtl">DG Fuel Level Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_fuellevel_dg"></div>
</div>
<span class="SctnTtl">DG Running Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_dgrunn"></div>
</div>
<script>

var fl_data=<?php echo json_encode($dgdata[0]['fuel_level']['dg_fuel_level']);?>;
    
     
    var fl_meter='Fuel Level';
    var contain="container_fuellevel_dg";
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


    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
Highcharts.chart('container_dgrunn', {
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
</script>