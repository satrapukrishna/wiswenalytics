<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<span class="SctnTtl">voltage Graph Report</span>
<span class="SctnTtl">AC Plant Room</span>
<?php for($i=0;$i<count($voltage['undp']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_voltage_undp<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">UN House Central Wing</span>
<?php for($i=0;$i<count($voltage['uncw']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_voltage_uncw<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<!-- <span class="SctnTtl">UN House East Wing</span> -->
<?php /*for($i=0;$i<count($voltage['unew']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_voltage_unew<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>
<span class="SctnTtl">UN House  West Wing</span>
<?php for($i=0;$i<count($voltage['unww']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_voltage_unww<?php echo $i; ?>"></div>
    </div>
    
<?php } */?>
<span class="SctnTtl">Ford Foundation</span>
<?php for($i=0;$i<count($voltage['unff']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_voltage_unff<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>



<script>

    var energy_data_c1=<?php echo json_encode($voltage['undp']);?>;
    
    for(var k=0;k<energy_data_c1.length;k++){
        var meter=energy_data_c1[k]["meter"];
         var contain="container_voltage_undp"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c1[k]["v1_data"].length;i++){
        time = (new Date(energy_data_c1[k]["v1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c1[k]["v1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c1[k]["v2_data"].length;i++){
            time2 = (new Date(energy_data_c1[k]["v2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c1[k]["v2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c1[k]["v3_data"].length;i++){
            time3 = (new Date(energy_data_c1[k]["v3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c1[k]["v3_data"][i]["CurReading"])]);
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
      name: 'voltage_1',
      data: xdata,
    },{
      name: 'voltage_2',
      data: xdata2,
    },{
      name: 'voltage_3',
      data: xdata3,
    }]
  
});
    }

    var energy_data_c2=<?php echo json_encode($voltage['uncw']);?>;
    
    for(var k=0;k<energy_data_c2.length;k++){
        var meter=energy_data_c2[k]["meter"];
         var contain="container_voltage_uncw"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c2[k]["v1_data"].length;i++){
        time = (new Date(energy_data_c2[k]["v1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c2[k]["v1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c2[k]["v2_data"].length;i++){
            time2 = (new Date(energy_data_c2[k]["v2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c2[k]["v2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c2[k]["v3_data"].length;i++){
            time3 = (new Date(energy_data_c2[k]["v3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c2[k]["v3_data"][i]["CurReading"])]);
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
      name: 'voltage_1',
      data: xdata,
    },{
      name: 'voltage_2',
      data: xdata2,
    },{
      name: 'voltage_3',
      data: xdata3,
    }]
  
});
    }

    

    var energy_data_c4=<?php echo json_encode($voltage['unff']);?>;
    
    for(var k=0;k<energy_data_c4.length;k++){
        var meter=energy_data_c4[k]["meter"];
         var contain="container_voltage_unff"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<energy_data_c4[k]["v1_data"].length;i++){
        time = (new Date(energy_data_c4[k]["v1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(energy_data_c4[k]["v1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c4[k]["v2_data"].length;i++){
            time2 = (new Date(energy_data_c4[k]["v2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(energy_data_c4[k]["v2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<energy_data_c4[k]["v3_data"].length;i++){
            time3 = (new Date(energy_data_c4[k]["v3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(energy_data_c4[k]["v3_data"][i]["CurReading"])]);
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
      name: 'voltage_1',
      data: xdata,
    },{
      name: 'voltage_2',
      data: xdata2,
    },{
      name: 'voltage_3',
      data: xdata3,
    }]
  
});
    }
   
   
</script>
