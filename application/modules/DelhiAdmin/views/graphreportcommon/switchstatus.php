<?php
 ?>
<div  class="text-head"> Switch Status Graph Report</div>
<?php for($p=0;$p<count($switch_status_data);$p++){ ?>
<div class="container-fluid"  id="container<?php echo $p; ?>" ></div>
<?php }?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    <?php
    for ($k=0; $k < count($switch_status_data); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($switch_status_data[$k]);$i++){ 
    array_push($xdata,$switch_status_data[$k][$i]['date']);
    array_push($ydata,$switch_status_data[$k][$i]['consumption']);
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$switch_status_data[$k][0]['meter'];
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
        pointFormat: '<tr><td style="font-size:8px"><b>Inflow:</b> </td>' +
            '<td style="font-size:8px"><b>{point.y} KL</b></td></tr>',
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
<?php }?>
</script>