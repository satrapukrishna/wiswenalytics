<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Borewell RunningHours Graph Report</span>
<?php for($p=0;$p<count($borewell_data);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="borewell<?php echo $p; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php
    for ($k=0; $k < count($borewell_data); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($borewell_data[$k]['consolidate']);$i++){ 
    array_push($xdata,$borewell_data[$k]['consolidate'][$i]['date']);
    array_push($ydata,$borewell_data[$k]['consolidate'][$i]['running1']);
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$borewell_data[$k]['consolidate'][$k]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('borewell<?php echo $k; ?>', {
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
                
                return '<b>' + this.key + '</b><br>Running Minutes: ' + this.point.y+'';
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