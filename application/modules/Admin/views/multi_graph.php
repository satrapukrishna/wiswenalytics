<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/themes/adaptive.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        In Highcharts, pies can also be hollow, in which case they are commonly
        referred to as donut charts. This pie also has an inner chart, resulting
        in a hierarchical type of visualization.
    </p>
</figure>
<style>
    * {
    font-family:
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Roboto,
        Helvetica,
        Arial,
        "Apple Color Emoji",
        "Segoe UI Emoji",
        "Segoe UI Symbol",
        sans-serif;
}

.highcharts-figure {
    min-width: 320px;
    max-width: 660px;
    margin: 1em auto;
}

.highcharts-description {
    margin: 0.3rem 10px;
}


@media (prefers-color-scheme: dark) {
    body {
        background-color: #141414;
        color: #ffffff;
    }
}
    </style>

    <script>
        const colors = Highcharts.getOptions().colors,
    categories = [
        'EM01',
        'EM02',
        'EM03',
        'EM04',
        'EM05'
    ],
    data = [
        {
            y: 61.04,
            color: colors[2],
            drilldown: {
                name: 'EM01',
                categories: [
                    'Kwh'
                ],
                data: [
                    36.89
                ]
            }
        },
        {
            y: 9.47,
            color: colors[3],
            drilldown: {
                name: 'EM02',
                categories: [
                    'Kwh'
                ],
                data: [
                    5.1
                ]
            }
        },
        {
            y: 9.32,
            color: colors[5],
            drilldown: {
                name: 'EM03',
                categories: [
                    'Kwh'
                ],
                data: [
                    6.62
                ]
            }
        },
        {
            y: 8.15,
            color: colors[1],
            drilldown: {
                name: 'EM04',
                categories: [
                    'Kwh'
                ],
                data: [
                    4.17
                ]
            }
        },
        {
            y: 11.02,
            color: colors[6],
            drilldown: {
                name: 'EM05',
                categories: [
                    'Kwh'
                ],
                data: [
                    11.02
                ]
            }
        }
    ],
    browserData = [],
    versionsData = [],
    dataLen = data.length;

let i,
    j,
    drillDataLen,
    brightness;


// Build the data arrays
for (i = 0; i < dataLen; i += 1) {

    // add browser data
    browserData.push({
        name: categories[i],
        y: data[i].y,
        color: data[i].color
    });

    // add version data
    drillDataLen = data[i].drilldown.data.length;
    for (j = 0; j < drillDataLen; j += 1) {
        const name = data[i].drilldown.categories[j];
        brightness = 0.2 - (j / drillDataLen) / 5;
        versionsData.push({
            name,
            y: data[i].drilldown.data[j],
            color: Highcharts.color(data[i].color).brighten(brightness).get(),
            custom: {
                version: name.split(' ')[1] || name.split(' ')[0]
            }
        });
    }
}

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Browser market share, January, 2022'
    },
    subtitle: {
        text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },
    plotOptions: {
        pie: {
            shadow: false,
            center: ['50%', '50%']
        }
    },
    tooltip: {
        valueSuffix: '%'
    },
    series: [{
        name: 'Browsers',
        data: browserData,
        size: '45%',
        dataLabels: {
            color: '#ffffff',
            distance: '-50%'
        }
    }, {
        name: 'Versions',
        data: versionsData,
        size: '80%',
        innerSize: '60%',
        dataLabels: {
            format: '<b>{point.name}:</b> <span style="opacity: 0.5">' +
                '{y}%</span>',
            filter: {
                property: 'y',
                operator: '>',
                value: 1
            },
            style: {
                fontWeight: 'normal'
            }
        },
        id: 'versions'
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 400
            },
            chartOptions: {
                series: [{
                }, {
                    id: 'versions',
                    dataLabels: {
                        distance: 10,
                        format: '{point.custom.version}',
                        filter: {
                            property: 'percentage',
                            operator: '>',
                            value: 2
                        }
                    }
                }]
            }
        }]
    }
});

        </script>