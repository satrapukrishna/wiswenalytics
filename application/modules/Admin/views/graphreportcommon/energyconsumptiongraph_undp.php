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
<span class="SctnTtl">UN House  West Wing</span>
<?php for($p=0;$p<count($energydata['unww']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunww<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Security Gate</span>
<?php for($p=0;$p<count($energydata['unsg']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunsg<?php echo $p; ?>" ></div>
    </div>
<?php }?>
<span class="SctnTtl">Annexe Building</span>
<?php for($p=0;$p<count($energydata['unab']);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerunab<?php echo $p; ?>" ></div>
    </div>
<?php }?>


<script>
    <?php if($energydata['undp'][0][0]['sort']==2){ ?>
        <?php
    for ($k=0; $k < count($energydata['undp']); $k++) { 
        
        $fulldata=array();
        for($i=0;$i<count($energydata['undp'][$k]);$i++){ 
            $xdata=array();
            $ydata=array();
            for ($n=0; $n < count($energydata['undp'][$k][$i]['data']); $n++) { 
                array_push($xdata,$energydata['undp'][$k][$i]['data'][$n]['date']);
                array_push($ydata,round($energydata['undp'][$k][$i]['data'][$n]['consumption'],2));
            }
        
            $fulldata[$i]['xdata']=$xdata;
            $fulldata[$i]['ydata']=$ydata;
            $fulldata[$i]['meter']=$energydata['undp'][$k][$i]['meter'];
            $fulldata[$i]['date']=$energydata['undp'][$k][$i]['date'];
    
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
    for ($k=0; $k < count($energydata['uncw']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['uncw'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['uncw'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['uncw'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['uncw'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['uncw'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['uncw'][$k][$i]['date'];
    
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
    for ($k=0; $k < count($energydata['unew']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['unew'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['unew'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['unew'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['unew'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['unew'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['unew'][$k][$i]['date'];
    
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
    for ($k=0; $k < count($energydata['unff']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['unff'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['unff'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['unff'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['unff'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['unff'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['unff'][$k][$i]['date'];
    
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
    for ($k=0; $k < count($energydata['unww']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['unww'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['unww'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['unww'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['unww'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['unww'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['unww'][$k][$i]['date'];
    
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
    for ($k=0; $k < count($energydata['unsg']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['unsg'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['unsg'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['unsg'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['unsg'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['unsg'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['unsg'][$k][$i]['date'];
    
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
    for ($k=0; $k < count($energydata['unab']); $k++) { 
        
        $fulldata=array();
    for($i=0;$i<count($energydata['unab'][$k]);$i++){ 
        $xdata=array();
        $ydata=array();
        for ($n=0; $n < count($energydata['unab'][$k][$i]['data']); $n++) { 
            array_push($xdata,$energydata['unab'][$k][$i]['data'][$n]['date']);
            array_push($ydata,round($energydata['unab'][$k][$i]['data'][$n]['consumption'],2));
        }
    
        $fulldata[$i]['xdata']=$xdata;
        $fulldata[$i]['ydata']=$ydata;
        $fulldata[$i]['meter']=$energydata['unab'][$k][$i]['meter'];
        $fulldata[$i]['date']=$energydata['unab'][$k][$i]['date'];
    
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
<?php
    for ($k=0; $k < count($energydata['unsg']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['unsg'][$k]);$i++){ 
    array_push($xdata,$energydata['unsg'][$k][$i]['date']);
    array_push($ydata,round($energydata['unsg'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['unsg'][$k][0]['meter'];
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
    for ($k=0; $k < count($energydata['unab']); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($energydata['unab'][$k]);$i++){ 
    array_push($xdata,$energydata['unab'][$k][$i]['date']);
    array_push($ydata,round($energydata['unab'][$k][$i]['consumption'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$energydata['unab'][$k][0]['meter'];
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