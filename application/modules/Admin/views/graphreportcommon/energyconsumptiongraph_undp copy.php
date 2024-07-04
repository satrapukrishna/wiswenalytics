<?php //echo json_encode($energydata);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>
<span class="SctnTtl">AC Plant Room</span>
<?php for($p=0;$p<count($energydata['undp']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerundp<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">UN House Central Wing</span>
<?php for($p=0;$p<count($energydata['uncw']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontaineruncw<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">UN House East Wing</span>
<?php for($p=0;$p<count($energydata['unew']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunew<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Ford Foundation</span>
<?php for($p=0;$p<count($energydata['unff']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunff<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">UN House  West Wing-unww</span>
<?php for($p=0;$p<count($energydata['unww']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunww<?php echo $p; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php
    for ($k=0; $k < count($energydata['undp']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['undp'][$k]);$i++){ 
    array_push($xdata,$energydata['undp'][$k][$i]['date']);
    array_push($ydata,round($energydata['undp'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['undp'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerundp<?php echo $k; ?>', {
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
    for ($k=0; $k < count($energydata['uncw']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['uncw'][$k]);$i++){ 
    array_push($xdata,$energydata['uncw'][$k][$i]['date']);
    array_push($ydata,round($energydata['uncw'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['uncw'][$k][0]['meter'];
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
<?php
    for ($k=0; $k < count($energydata['unew']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['unew'][$k]);$i++){ 
    array_push($xdata,$energydata['unew'][$k][$i]['date']);
    array_push($ydata,round($energydata['unew'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['unew'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerunew<?php echo $k; ?>', {
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
    for ($k=0; $k < count($energydata['unff']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['unff'][$k]);$i++){ 
    array_push($xdata,$energydata['unff'][$k][$i]['date']);
    array_push($ydata,round($energydata['unff'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['unff'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerunff<?php echo $k; ?>', {
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
    for ($k=0; $k < count($energydata['unww']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['unww'][$k]);$i++){ 
    array_push($xdata,$energydata['unww'][$k][$i]['date']);
    array_push($ydata,round($energydata['unww'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['unww'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerunww<?php echo $k; ?>', {
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