<?php
$xdata=array();
$ydata=array();
$fulldata=array();
for($i=0;$i<count($flowdata[0]);$i++){ 
array_push($xdata,$flowdata[0][$i]['date']);
array_push($ydata,$flowdata[0][$i]['consumption']);


}
$fulldata['xdata']=$xdata;
$fulldata['ydata']=$ydata;
$fulldata['meter']=$flowdata[0][0]['meter']; ?>
<span class="SctnTtl">Flow Meter Consumption Graph Report</span>
<div class="GrphMnHldr FlwCnsmptn">
    <div class="GrphDv" id="container"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Consumption Report'
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
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y:.1f} KL</b></td></tr>',
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
        color:'#de9e4b'

    }]
});
</script>