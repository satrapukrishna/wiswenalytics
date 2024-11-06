<?php //echo json_encode($$switch_status_data);die(); ?>
<span class="SctnTtl">Motor Running Graph Report</span>

<?php for($p=0;$p<count($switch_status_data);$p++){ ?>
    <div class="GrphMnHldr EnrgyCnsmptn">
        <div class="GrphDv" id="energycontainerundp<?php echo $p; ?>" ></div>
    </div>
<?php }?>



<script>
    <?php if($switch_status_data[0][0]['type']==1){ ?>
        <?php
    for ($k=0; $k < count($switch_status_data); $k++) { 
        
        $fulldata=array();
        for($i=0;$i<count($switch_status_data[$k]);$i++){ 
            $xdata=array();
            $ydata=array();
            for ($n=0; $n < count($switch_status_data[$k][$i]['runn_h']); $n++) { 
                array_push($xdata,$switch_status_data[$k][$i]['runn_h'][$n]['Time']);
                array_push($ydata,round($switch_status_data[$k][$i]['runn_h'][$n]['rh'],2));
            }
        
            $fulldata[$i]['xdata']=$xdata;
            $fulldata[$i]['ydata']=$ydata;
            $fulldata[$i]['meter']=$switch_status_data[$k][$i]['meter'];
            $fulldata[$i]['date']=$switch_status_data[$k][$i]['date'];
    
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
        type: 'column'
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
            text: 'Min'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Running: ' + this.point.y+'Min';
            }
        
        //valueDecimals: 2
    },
    
    series: series
});
<?php }?>

    <?php }else{?>
        <?php
    for ($k=0; $k < count($switch_status_data); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($switch_status_data[$k]);$i++){ 
    array_push($xdata,$switch_status_data[$k][$i]['date']);
    array_push($ydata,round($switch_status_data[$k][$i]['runn_m'],2));
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$switch_status_data[$k][0]['meter'];
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
            text: 'Min'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Running: ' + this.point.y+'Min';
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