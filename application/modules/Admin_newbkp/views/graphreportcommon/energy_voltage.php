<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<span class="SctnTtl">Voltage Graph Report</span>

<?php for($i=0;$i<count($voltage['PF']);$i++){ ?>
    
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_voltage<?php echo $i; ?>"></div>
    </div>
<?php } ?>
<script>




    var data=<?php echo json_encode($voltage['PF']);?>;
    for(var k=0;k<data.length;k++){
        var meter=data[k]["meter"];
         var contain="container_voltage"+k;
         var xdata=[];
         var xdata2=[];
         var xdata3=[];
         var time;
         var time2;
         var time3;
        for(var i=0;i<data[k]["v1_data"].length;i++){
        time = (new Date(data[k]["v1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data[k]["v1_data"][i]["CurReading"])]);
        }
        for(var i=0;i<data[k]["v2_data"].length;i++){
            time2 = (new Date(data[k]["v2_data"][i]["time"])).getTime()+(5*60+30)*60000;
        xdata2.push([time2, parseFloat(data[k]["v2_data"][i]["CurReading"])]);
        }
        for(var i=0;i<data[k]["v3_data"].length;i++){
            time3 = (new Date(data[k]["v3_data"][i]["time"])).getTime()+(5*60+30)*60000;
       xdata3.push([time3, parseFloat(data[k]["v3_data"][i]["CurReading"])]);
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
            text: 'Volt'
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
      name: 'Voltage_1',
      data: xdata,
    },{
      name: 'Voltage_2',
      data: xdata2,
    },{
      name: 'Voltage_3',
      data: xdata3,
    }]
  
});
    }

   
</script>
