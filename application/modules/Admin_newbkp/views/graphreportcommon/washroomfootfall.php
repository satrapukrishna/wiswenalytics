
<div  class="text-head"> FootFall Report</div>

              <table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
    <thead><tr><th>SNo</th><th>Meter</th><th>Date/Time</th><th>Footfall</th></tr></thead>

                <tbody><tr><td>1</td><td>RestRoom</td><td>2020-11-27</td><td>259</td></tr><tr><td>2</td><td>RestRoom</td><td>2020-11-28</td><td>182</td></tr><tr><td>3</td><td>RestRoom</td><td>2020-11-29</td><td>6</td></tr><tr><td>4</td><td>RestRoom</td><td>2020-11-30</td><td>48</td></tr></tbody>
                    
                    </table>


<div   id="container"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var xdata=["2020-11-27", "2020-11-28", "2020-11-29", "2020-11-30"];
    var ydata=[259, 182, 6, 48];
          


Highcharts.chart('container', {
    chart: {
        type: 'column',
        width:950
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Footfall Report'
    },
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Footfall'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Footfall</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Washroom 01',
        data: ydata

    }]
});
</script>