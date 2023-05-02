
<div  class="text-head"> Feedback Graph Report</div>

              
<div   id="feedback"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var xdata=["2020-11-25", "2020-11-26", "2020-11-27", "2020-11-28", "2020-11-29", "2020-11-30"];
    var ypoor=[2, 1, 2, 0, 0, 0];
    var yavg=[1, 0, 2, 0, 0, 0];
    var ygood=[5, 1, 8, 0, 0, 0];
          
    

Highcharts.chart('feedback', {
    chart: {
        type: 'column',
        width:950
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Feedback Graph'
    },
   
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Feedback'
        }
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Poor',
        data: ypoor,
        color:'#ca5555'
    }, {
        name: 'Average',
        data: yavg,
        color:'#d6ce68'
    }, {
        name: 'Good',
        data: ygood,
        color:'#67b777'
    }],
}); 
</script>