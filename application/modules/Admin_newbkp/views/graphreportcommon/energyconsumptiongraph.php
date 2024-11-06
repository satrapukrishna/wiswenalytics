<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>
<?php for($p=0;$p<count($energydata['consolidate']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainer<?php echo $p; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php
    for ($k=0; $k < count($energydata['consolidate']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['consolidate'][$k]);$i++){ 
    array_push($xdata,$energydata['consolidate'][$k][$i]['date']);
    array_push($ydata,round($energydata['consolidate'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['consolidate'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainer<?php echo $k; ?>', {
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
            text: 'Kwh'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Consumption: ' + this.point.y+'Kwh';
            }
        
        //valueDecimals: 2
    },
    
    series: [{
        name: meter,
        data: ydata,
        color:'#de9e4b'

    }]
});
<?php }?>
</script>