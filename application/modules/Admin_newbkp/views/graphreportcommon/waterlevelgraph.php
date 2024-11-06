<span class="SctnTtl">Water Level Graph Report</span>
<?php for($i=0;$i<count($watergraphdata);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="tank<?php echo $i; ?>"></div>
    </div>
<?php } ?>


<script>
    var data=<?php echo json_encode($watergraphdata);?>;
    
     for(var k=0;k<data.length;k++){
         var meter=data[k]["meter"];
         var contain="tank"+k;
         var xdata=[];
         var time;
        for(var i=0;i<data[k]["leveldata"].length;i++){
        time = (new Date(data[k]["leveldata"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data[k]["leveldata"][i]["level"])]);
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
        tickInterval: 20,
        tickAmount: 5,
        min:5,
        title: {
            text: 'KL'
        }
    },
    xAxis: {
      type: 'datetime',
    },tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y:.1f} KL</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
     }



    // var xdata=[];
    // var xdata2=[];
    // for(var i=0;i<data[0]["leveldata"].length;i++){
    //     var time = (new Date(data[0]["leveldata"][i]["time"])).getTime();

    //    xdata.push([time, parseFloat(data[0]["leveldata"][i]["level"])]);
    // }
   

</script>