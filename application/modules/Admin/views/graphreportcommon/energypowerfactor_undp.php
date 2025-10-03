

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<span class="SctnTtl">Power Factor Graph Report</span>

<span class="SctnTtl">UN House Central Wing</span>
<?php for($i=0;$i<count($power_factor_data['uncw']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_uncw<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>

<span class="SctnTtl">Ford Foundation</span>
<?php for($i=0;$i<count($power_factor_data['unff']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_unff<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>

<span class="SctnTtl">AC Plant Room</span>
<?php for($i=0;$i<count($power_factor_data['undp']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_undp<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>

<script>

var data_undp=<?php echo json_encode($power_factor_data['undp']);?>;
    
    for(var k=0;k<data_undp.length;k++){
        var meter=data_undp[k]["meter"];
         var contain="container_pf_undp"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_undp[k]["pf_data"].length;i++){
        time = (new Date(data_undp[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_undp[k]["pf_data"][i]["CurReading"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: meter
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'PF'
        }
    },
    xAxis: {
      type: 'datetime',
    },tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: 'Power Factor',
      data: xdata,
    }]
  
});
    }

    var data_uncw=<?php echo json_encode($power_factor_data['uncw']);?>;
    
    for(var k=0;k<data_uncw.length;k++){
        var meter=data_uncw[k]["meter"];
         var contain="container_pf_uncw"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_uncw[k]["pf_data"].length;i++){
        time = (new Date(data_uncw[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_uncw[k]["pf_data"][i]["CurReading"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: meter
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'PF'
        }
    },
    xAxis: {
      type: 'datetime',
    },tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: 'Power Factor',
      data: xdata,
    }]
  
});
    }

    

    var data_unff=<?php echo json_encode($power_factor_data['unff']);?>;
    
    for(var k=0;k<data_unff.length;k++){
        var meter=data_unff[k]["meter"];
         var contain="container_pf_unff"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_unff[k]["pf_data"].length;i++){
        time = (new Date(data_unff[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_unff[k]["pf_data"][i]["CurReading"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: meter
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'PF'
        }
    },
    xAxis: {
      type: 'datetime',
    },tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: 'Power Factor',
      data: xdata,
    }]
  
});
    }
    
   
</script>
