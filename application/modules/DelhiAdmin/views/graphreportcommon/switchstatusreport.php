<span class="SctnTtl">Running Report</span>
<div class="GrphMnHldr FllWdth WtrMtr">
    <div class="GrphDv" id="container"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    <?php 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
 
    for($k=0;$k<count($switchcontrol_data);$k++){ 
		for($i=0;$i<count($switchcontrol_data[$k]);$i++){
    array_push($xdata,$switchcontrol_data[$k][$i]['date']);
    array_push($ydata,$switchcontrol_data[$k][$i]['non_emergency_running_min_tot']);
    
        }
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$switchcontrol_data[0][0]['hardware_name'];
     ?>
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
        text: 'Running Report'
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
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="font-size:8px"><b></b> </td>' +
            '<td style="font-size:8px"><b>{point.y} Min</b></td></tr>',
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
        color:'#70a0db'

    }]
});

</script>