<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>
<?php for($p=0;$p<count($energydata['unicef']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontaineruncw<?php echo $p; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php if($energydata['unicef'][0][0]['sort']==2){ ?>
        <?php
    for ($k=0; $k < count($energydata['unicef']); $k++) { 
        
        $fulldata=array();
        for($i=0;$i<count($energydata['unicef'][$k]);$i++){ 
            $xdata=array();
            $ydata=array();
            for ($n=0; $n < count($energydata['unicef'][$k][$i]['data']); $n++) { 
                array_push($xdata,$energydata['unicef'][$k][$i]['data'][$n]['date']);
                array_push($ydata,round($energydata['unicef'][$k][$i]['data'][$n]['consumption'],2));
            }
        
            $fulldata[$i]['xdata']=$xdata;
            $fulldata[$i]['ydata']=$ydata;
            $fulldata[$i]['meter']=$energydata['unicef'][$k][$i]['meter'];
            $fulldata[$i]['date']=$energydata['unicef'][$k][$i]['date'];
    
        }
    
     ?>

    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data[0]['xdata'];
    
    
    var meter=data[0]['meter'];
    var series = [],
        len = data.length,
        i = 0;
    
    for(i;i<len;i++){
        series.push({
            name: data[i]['date'],
            data:data[i]['ydata']
        });
    }
Highcharts.chart('energycontaineruncw<?php echo $k; ?>', {
    chart: {
        type: 'line'
    },

    credits: {
        enabled: false
    },
    title: {
        text: meter
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
    
    series: series
});
<?php }?>

    <?php }else{?>
        <?php
    for ($k=0; $k < count($energydata['unicef']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['unicef'][$k]);$i++){ 
    array_push($xdata,$energydata['unicef'][$k][$i]['date']);
    array_push($ydata,round($energydata['unicef'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['unicef'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontaineruncw<?php echo $k; ?>', {
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

    <?php }?>
    
</script>