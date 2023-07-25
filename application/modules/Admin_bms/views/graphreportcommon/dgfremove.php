<?php
$xdata=array();
$ydata=array();
$fulldata=array();
for($i=0;$i<count($dgdata[0]['consolidate']);$i++){ 
array_push($xdata,$dgdata[0]['consolidate'][$i]['date']);
array_push($ydata,$dgdata[0]['consolidate'][$i]['fremove']);


}
$fulldata['xdata']=$xdata;
$fulldata['ydata']=$ydata;
$fulldata['meter']=$dgdata[0]['consolidate'][0]['dgname']; ?>
<span class="SctnTtl">DG Fuel Removed Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_fremove"></div>
</div>
<script>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
Highcharts.chart('container_fremove', {
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
        data: ydata

    }]
});
</script>