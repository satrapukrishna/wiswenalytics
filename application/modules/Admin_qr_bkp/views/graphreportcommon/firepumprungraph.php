<div  class="text-head"> FirePump Running Graph Report</div>

<div   id="container_runn"></div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
Highcharts.chart('container_runn', {
    chart: {
        type: 'column'
    },

    credits: {
        enabled: false
    },
    title: {
        text: ' '
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
            text: 'Minutes'
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
        name: 'Jockey Pump',
        data: [1, 1.5, 1, 0, 2, 1, 2.2],
        color:'#2ca832'

    },{
        name: 'Hydrent Pump',
        data: [2, 0, 1.5, 2.1, 0, 1, 0],
        color:'#2ca832'

    },{
        name: 'Sprinkler Pump',
        data: [0, 0, 2, 0.2, 0, 1.7, 0],
        color:'#2ca832'

    },{
        name: 'Diesel Pump',
        data: [0, 0, 1, 1.2, 0, 0, 0],
        color:'#2ca832'

    }

    ]
});

</script>