<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<span class="SctnTtl">Current Graph Report</span>

<span class="SctnTtl">UN House Central Wing</span>
<?php for($i=0;$i<count($current['uncw']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_uncw<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<!-- <span class="SctnTtl">UN House East Wing</span> -->
<?php /*for($i=0;$i<count($current['unew']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_unew<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">Security Gate</span>
<?php for($i=0;$i<count($current['unsg']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_unsg<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">Annexe Building</span>
<?php for($i=0;$i<count($current['unab']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_unab<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">UN House  West Wing</span>
<?php for($i=0;$i<count($current['unww']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_unww<?php echo $i; ?>"></div>
    </div>
    
<?php } */ ?>
<span class="SctnTtl">Ford Foundation</span>
<?php for($i=0;$i<count($current['unff']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_unff<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>

<span class="SctnTtl">AC Plant Room</span>
<?php for($i=0;$i<count($current['undp']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_current_undp<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>

<script>

    var energy_data_c1=<?php echo json_encode($current['undp']);?>;
    
    for(var k=0;k<energy_data_c1.length;k++){
        var meter=energy_data_c1[k]["meter"];
         var contain="container_current_undp"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c1[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c1[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c1[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c1[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c1[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c1[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c1[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c1[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c1[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    }

    var energy_data_c2=<?php echo json_encode($current['uncw']);?>;
    
    for(var k=0;k<energy_data_c2.length;k++){
        var meter=energy_data_c2[k]["meter"];
         var contain="container_current_uncw"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c2[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c2[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c2[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c2[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c2[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c2[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c2[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c2[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c2[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    }

    var energy_data_c3=<?php echo json_encode($current['unew']);?>;
    
    for(var k=0;k<energy_data_c3.length;k++){
        var meter=energy_data_c3[k]["meter"];
         var contain="container_current_unew"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c3[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c3[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c3[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c3[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c3[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c3[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c3[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c3[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c3[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    }

    var energy_data_c4=<?php echo json_encode($current['unff']);?>;
    
    for(var k=0;k<energy_data_c4.length;k++){
        var meter=energy_data_c4[k]["meter"];
         var contain="container_current_unff"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c4[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c4[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c4[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c4[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c4[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c4[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c4[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c4[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c4[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    }
    var energy_data_c5=<?php echo json_encode($current['unww']);?>;
    
    for(var k=0;k<energy_data_c5.length;k++){
        var meter=energy_data_c5[k]["meter"];
         var contain="container_current_unww"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c5[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c5[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c5[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c5[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c5[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c5[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c5[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c5[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c5[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    }
    var energy_data_c6=<?php echo json_encode($current['unsg']);?>;
    
    for(var k=0;k<energy_data_c6.length;k++){
        var meter=energy_data_c6[k]["meter"];
         var contain="container_current_unsg"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c6[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c6[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c6[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c6[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c6[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c6[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c6[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c6[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c6[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    }
    var energy_data_c7=<?php echo json_encode($current['unab']);?>;
    
    for(var k=0;k<energy_data_c7.length;k++){
        var meter=energy_data_c7[k]["meter"];
         var contain="container_current_unab"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c7[k]["c1_data"].length;i++){
        time = (new Date(energy_data_c7[k]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c7[k]["c1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c7[k]["c2_data"].length;i++){
            time2 = (new Date(energy_data_c7[k]["c2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c7[k]["c2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c7[k]["c3_data"].length;i++){
            time3 = (new Date(energy_data_c7[k]["c3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c7[k]["c3_data"][i]["CurReading"])]);
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
            text: 'Amp'
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
      name: 'Current_1',
      data: xdata,
    },{
      name: 'Current_2',
      data: xdata2,
    },{
      name: 'Current_3',
      data: xdata3,
    }]
  
});
    } 
</script>
