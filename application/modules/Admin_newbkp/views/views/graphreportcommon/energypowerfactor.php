<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div  class="text-head"> Energy Power Factor</div>

<div id="container"></div>
<script>

Highcharts.chart('container', {
    chart: {
        type: 'line'
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Power Factor'
    },
    xAxis: {
        categories: [
            '00:00',
            '01:00',
            '02:00',
            '03:00',
            '04:00',
            '05:00',
            '06:00'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Power Factor'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Power Factor</b></td></tr>',
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
        name: 'Time',
        data: [0.94, 0.96, 0.95,0.94,0.96,0.96,0.95]

    }]
});
</script>
