

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<span class="SctnTtl">Power Factor Graph Report</span>

<?php for($i=0;$i<count($power_factor_data['PF']);$i++){ ?>
    <div class="GrphMnHldr WtrLvl">
        <div class="GrphDv" id="container_pf<?php echo $i; ?>"></div>
    </div>
    
<?php } ?>

<script>

var data=<?php echo json_encode($power_factor_data['PF']);?>;
    
    for(var k=0;k<data.length;k++){
        var meter=data[k]["meter"];
         var contain="container_pf"+k;
         var xdata=[];
         
         var time;
         
        for(var i=0;i<data[k]["pf_data"].length;i++){
        time = (new Date(data[k]["pf_data"][i]["time"])).getTime()+(5*60+30)*60000;

        xdata.push([time, parseFloat(data[k]["pf_data"][i]["CurReading"])]);
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