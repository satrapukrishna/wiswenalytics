<div  class="text-head"> Water Consumption Graph Report</div>

<div   id="container"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column',
        width:950
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Consumption Report'
    },
    xAxis: {
        categories: [
            '01-10-2020',
            '02-10-2020',
            '03-10-2020',
            '04-10-2020',
            '05-10-2020',
            '06-10-2020',
            '07-10-2020'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Ltr'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0,font-size:10px"><b>{point.y} Ltr</b></td></tr>',
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
        name: 'Water Meter1',
        data: [500, 350, 400, 450, 300, 500, 200]

    }]
});
</script>