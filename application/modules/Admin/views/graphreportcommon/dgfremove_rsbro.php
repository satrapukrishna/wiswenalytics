<?php
$xdata=array();
$ydata=array();
$fulldata=array();
for($j=0;$j<count($dgdata);$j++){ 
    for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){  
array_push($xdata,$dgdata[$j]['consolidate'][$i]['date']);
array_push($ydata,$dgdata[$j]['consolidate'][$i]['fremove']);


}
$fulldata['xdata']=$xdata;
$fulldata['ydata']=$ydata;
$fulldata['meter']=$dgdata[$j]['consolidate'][$i]['dgname']; ?>
<span class="SctnTtl"><?php echo $dgdata[$j]['consolidate'][$i]['dgname']; ?> Fuel Removed Graph Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container_fremove<?php echo $j; ?>"></div>
</div>
<script>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
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
        data: ydata

    }]
});
<?php }?>
</script>