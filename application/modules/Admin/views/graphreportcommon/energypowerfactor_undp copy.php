

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
<span class="SctnTtl">UN House East Wing</span>
<?php for($i=0;$i<count($power_factor_data['unew']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_unew<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">Ford Foundation</span>
<?php for($i=0;$i<count($power_factor_data['unff']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_unff<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">Security Gate</span>
<?php for($i=0;$i<count($power_factor_data['unsg']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_unsg<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">Annexe Building</span>
<?php for($i=0;$i<count($power_factor_data['unab']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_unab<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">AC Plant Room</span>
<?php for($i=0;$i<count($power_factor_data['undp']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_undp<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">UN House  West Wing</span>
<?php for($i=0;$i<count($power_factor_data['unww']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf_unww<?php echo $i; ?>"></div>
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

    var data_unew=<?php echo json_encode($power_factor_data['unew']);?>;
    
    for(var k=0;k<data_unew.length;k++){
        var meter=data_unew[k]["meter"];
         var contain="container_pf_unew"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_unew[k]["pf_data"].length;i++){
        time = (new Date(data_unew[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_unew[k]["pf_data"][i]["CurReading"])]);
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
    var data_unsg=<?php echo json_encode($power_factor_data['unsg']);?>;
    
    for(var k=0;k<data_unsg.length;k++){
        var meter=data_unsg[k]["meter"];
         var contain="container_pf_unsg"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_unsg[k]["pf_data"].length;i++){
        time = (new Date(data_unsg[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_unsg[k]["pf_data"][i]["CurReading"])]);
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
    var data_unab=<?php echo json_encode($power_factor_data['unab']);?>;
    
    for(var k=0;k<data_unab.length;k++){
        var meter=data_unab[k]["meter"];
         var contain="container_pf_unab"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_unab[k]["pf_data"].length;i++){
        time = (new Date(data_unab[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_unab[k]["pf_data"][i]["CurReading"])]);
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
    var data_unww=<?php echo json_encode($power_factor_data['unww']);?>;
    
    for(var k=0;k<data_unww.length;k++){
        var meter=data_unww[k]["meter"];
         var contain="container_pf_unww"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data_unww[k]["pf_data"].length;i++){
        time = (new Date(data_unww[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data_unww[k]["pf_data"][i]["CurReading"])]);
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
