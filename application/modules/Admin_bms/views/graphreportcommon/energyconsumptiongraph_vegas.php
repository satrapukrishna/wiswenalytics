<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>
<span class="SctnTtl">Building Level Energy Consumption</span>
<?php for($p=0;$p<count($energydata['blec']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerblec<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Chiller Plant Equipment Energy Consumption</span>
<?php for($p=0;$p<count($energydata['cpeec']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainercpeec<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">AHUs Energy Consumption</span>
<?php for($p=0;$p<count($energydata['aec']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontaineraec<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Other Energy End uses</span>
<?php for($p=0;$p<count($energydata['oee']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontaineroee<?php echo $p; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php
    for ($k=0; $k < count($energydata['blec']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['blec'][$k]);$i++){ 
    array_push($xdata,$energydata['blec'][$k][$i]['date']);
    array_push($ydata,round($energydata['blec'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['blec'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerblec<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['cpeec']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['cpeec'][$k]);$i++){ 
    array_push($xdata,$energydata['cpeec'][$k][$i]['date']);
    array_push($ydata,round($energydata['cpeec'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['cpeec'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainercpeec<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['aec']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['aec'][$k]);$i++){ 
    array_push($xdata,$energydata['aec'][$k][$i]['date']);
    array_push($ydata,round($energydata['aec'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['aec'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontaineraec<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['oee']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['oee'][$k]);$i++){ 
    array_push($xdata,$energydata['oee'][$k][$i]['date']);
    array_push($ydata,round($energydata['oee'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['oee'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontaineroee<?php echo $k; ?>', {
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