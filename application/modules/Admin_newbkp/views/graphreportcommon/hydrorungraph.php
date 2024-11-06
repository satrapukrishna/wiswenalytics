<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl"><?php echo $hydro_data[0]['meter'] ?></span>
<span class="SctnTtl"><?php echo $hydro_data[0]['meter'] ?> Running Hours Graph Report</span>

<?php for ($l=0; $l < count($hydro_data[0]['fire_runn'][0]); $l++) { ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="hydro<?php echo $l; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php
    for ($l=0; $l < count($hydro_data[0]['fire_runn'][0]); $l++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for ($k=0; $k <count($hydro_data[0]['fire_runn']) ; $k++) { 
    array_push($xdata,$hydro_data[0]['fire_runn'][$k][$l]['date']);
    array_push($ydata,$hydro_data[0]['fire_runn'][$k][$l]['running_hours1']);    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$hydro_data[0]['fire_runn'][0][$l]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('hydro<?php echo $l; ?>', {
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
            text: 'Hours'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Running: ' + this.point.y+'Hours';
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


</script>