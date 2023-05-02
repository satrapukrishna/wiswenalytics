

<span class="SctnTtl"><?php echo $firepump_data[1]['meter'] ?> Line Pressure</span>

    <div class="GrphMnHldr FllWdth WtrLvl">
        <div class="GrphDv" id="pressure_f2"></div>
    </div>



<script>
    var data=<?php echo json_encode($firepump_data[1]['fire_pressure']);?>;
    
     
         var meter='Line Pressure';
         var contain="pressure_f2";
         var xdata=[];
         var time;
        for(var i=0;i<data.length;i++){
        time = (new Date(data[i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data[i]["pressure"])]);
        }

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ' '
    },
    chart: {
        type: 'line'
    },
    yAxis: {
        tickInterval: 1,
        tickAmount: 5,
        min: 2,
        title: {
            text: 'Bar'
        }
    },
    xAxis: {
      type: 'datetime',
    },tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Bar</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
     



    // var xdata=[];
    // var xdata2=[];
    // for(var i=0;i<data[0]["leveldata"].length;i++){
    //     var time = (new Date(data[0]["leveldata"][i]["time"])).getTime();

    //    xdata.push([time, parseFloat(data[0]["leveldata"][i]["level"])]);
    // }
   

</script>