<?php //echo json_encode($energydata['day']);die(); ?>
<span class="SctnTtl">Energy Consumption Graph Report</span>

<span class="SctnTtl">UN House Central Wing</span>
<?php for($p=0;$p<count($energydata['day']['uncw']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontaineruncw<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">UN House East Wing</span>
<?php for($p=0;$p<count($energydata['day']['unew']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunew<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Ford Foundation</span>
<?php for($p=0;$p<count($energydata['day']['unff']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunff<?php echo $p; ?>" ></div>
    </div>
<?php }?>

<span class="SctnTtl">Security Gate</span>
<?php for($p=0;$p<count($energydata['day']['unsg']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunsg<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Annexe Building</span>
<?php for($p=0;$p<count($energydata['day']['unab']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunab<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">AC Plant Room</span>
<?php for($p=0;$p<count($energydata['day']['undp']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerundp<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">UN House  West Wing</span>
<?php for($p=0;$p<count($energydata['day']['unww']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunww<?php echo $p; ?>" ></div>
    </div>
<?php }?>

<script>
    <?php if($energydata['day']['undp'][0][0]['sort']==2){ ?>
        <?php
    for ($k=0; $k < count($energydata['day']['undp']); $k++) { 
        
        $fulldata=array();
        for($i=0;$i<count($energydata['day']['undp'][$k]);$i++){ 
            $xdata=array();
            $ydata=array();
            for ($n=0; $n < count($energydata['day']['undp'][$k][$i]['data']); $n++) { 
                array_push($xdata,$energydata['day']['undp'][$k][$i]['data'][$n]['date']);
                array_push($ydata,round($energydata['day']['undp'][$k][$i]['data'][$n]['consumption'],2));
            }
        
            $fulldata[$i]['xdata']=$xdata;
            $fulldata[$i]['ydata']=$ydata;
            $fulldata[$i]['meter']=$energydata['day']['undp'][$k][$i]['meter'];
            $fulldata[$i]['date']=$energydata['day']['undp'][$k][$i]['date'];
    
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
Highcharts.chart('energycontainerundp<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['day']['uncw']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['day']['uncw'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['day']['uncw'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['day']['uncw'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['day']['uncw'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['day']['uncw'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['day']['uncw'][$k][$i]['date'];
    
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
<?php
    for ($k=0; $k < count($energydata['day']['unew']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['day']['unew'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['day']['unew'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['day']['unew'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['day']['unew'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['day']['unew'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['day']['unew'][$k][$i]['date'];
    
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
Highcharts.chart('energycontainerunew<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['day']['unff']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['day']['unff'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['day']['unff'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['day']['unff'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['day']['unff'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['day']['unff'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['day']['unff'][$k][$i]['date'];
    
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
Highcharts.chart('energycontainerunff<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['day']['unww']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['day']['unww'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['day']['unww'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['day']['unww'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['day']['unww'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['day']['unww'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['day']['unww'][$k][$i]['date'];
    
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
Highcharts.chart('energycontainerunww<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['day']['unsg']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['day']['unsg'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['day']['unsg'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['day']['unsg'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['day']['unsg'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['day']['unsg'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['day']['unsg'][$k][$i]['date'];
    
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
Highcharts.chart('energycontainerunsg<?php echo $k; ?>', {
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
<?php
    for ($k=0; $k < count($energydata['day']['unab']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['day']['unab'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['day']['unab'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['day']['unab'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['day']['unab'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['day']['unab'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['day']['unab'][$k][$i]['date'];
    
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
Highcharts.chart('energycontainerunab<?php echo $k; ?>', {
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
    for ($k=0; $k < count($energydata['day']['undp']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['undp'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['undp'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['undp'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['undp'][$k][0]['meter'];
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
    for ($k=0; $k < count($energydata['day']['uncw']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['uncw'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['uncw'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['uncw'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['uncw'][$k][0]['meter'];
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
    for ($k=0; $k < count($energydata['day']['unew']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['unew'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['unew'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['unew'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['unew'][$k][0]['meter'];
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
    for ($k=0; $k < count($energydata['day']['unff']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['unff'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['unff'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['unff'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['unff'][$k][0]['meter'];
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
    for ($k=0; $k < count($energydata['day']['unww']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['unww'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['unww'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['unww'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['unww'][$k][0]['meter'];
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
<?php
    for ($k=0; $k < count($energydata['day']['unsg']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['unsg'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['unsg'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['unsg'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['unsg'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerunsg<?php echo $k; ?>', {
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
    for ($k=0; $k < count($energydata['day']['unab']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['day']['unab'][$k]);$i++){ 
    array_push($xdata,$energydata['day']['unab'][$k][$i]['date']);
    array_push($ydata,round($energydata['day']['unab'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['day']['unab'][$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('energycontainerunab<?php echo $k; ?>', {
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