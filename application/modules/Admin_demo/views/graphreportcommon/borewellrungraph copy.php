<span class="SctnTtl">Borewell Running Graph Report</span>
<div class="GrphMnHldr BrwlRnGrph">
    <div class="GrphDv" id="container"></div>
    <div class="GrphDv" id="container_flow"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Running Report'
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
            text: 'Hours'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0,font-size:10px"><b>{point.y} Hours</b></td></tr>',
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
        name: 'Borewell01',
        data: [5, 6, 4, 2, 0, 1, 6],
        color:'#2ca832'

    },
    {
        name: 'Borewell02',
        data: [3, 4, 6, 3, 2, 1, 8],
        color:'#2ca832'

    }]
});


Highcharts.chart('container_flow', {

    title: {
        text: 'Flow Rate'
    },

    xAxis: {
        tickInterval: 1,
        accessibility: {
            rangeDescription: 'Range: 1 to 10'
        }
    },

    yAxis: {
        
        minorTickInterval: 0.5,
        accessibility: {
            rangeDescription: 'Range: 0.5 to 100'
        }
    },

    tooltip: {
        headerFormat: '<b>{series.name}</b><br />',
        pointFormat: 'x = {point.x}, y = {point.y}'
    },

    series: [{
        name: 'Avg Flow rate',
        data: [2.2, 2.2, 2.2, 2.2, 2.2, 2.2, 2.2, 2.2, 2.2, 2.2],
        pointStart: 1
    },{
        name: 'Present Flow rate',
        data: [2.5, 2.5, 3, 2.5, 1.9, 2.7, 2.6, 2.4, 2.4, 2.3],
        pointStart: 1
    }]
});
</script>