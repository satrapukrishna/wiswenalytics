<div  class="text-head"> AHU Graph Report</div>

<div   id="running"></div>
<div   id="settemp"></div>
<div   id="returnair"></div>
<div   id="supplyair"></div>
<div   id="returnwater"></div>
<div   id="supwater"></div>
<div   id="actator"></div>
<div   id="pressure"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
   
    var xdata =["00:04:17", "00:14:11", "00:24:18", "00:34:17", "00:44:14", "00:54:12", "01:04:16", "01:14:12", "01:24:11", "01:34:14", "01:44:10", "01:54:12", "02:04:16", "02:14:30", "02:24:24", "02:34:14", "02:44:13", "02:54:12", "03:04:17", "03:14:15", "03:24:15", "03:34:13", "03:44:59", "03:55:22", "04:05:11", "04:15:18", "04:25:12", "04:35:24", "04:45:16", "04:55:16", "05:05:13", "05:15:15", "05:25:28", "05:35:11", "05:45:10", "05:55:10", "06:05:11", "06:15:19", "06:25:21", "06:35:16", "06:45:17", "06:55:15", "07:05:18", "07:15:30", "07:25:17", "07:35:21", "07:45:12", "07:55:11", "08:05:29", "08:15:14", "08:25:19", "08:35:10", "08:45:27", "08:55:14", "09:05:17", "09:15:28", "09:25:09", "09:35:11", "09:45:26", "09:55:29", "10:05:12", "10:15:12", "10:25:31", "10:35:10", "10:45:19", "10:55:14", "11:05:12", "11:15:29", "11:25:11", "11:35:16", "11:45:12", "11:55:16", "12:05:12", "12:15:12", "12:25:10", "12:35:12", "12:45:22", "12:55:12", "13:05:24", "13:15:10", "13:25:14", "13:35:13", "13:45:17", "13:55:13", "14:05:12", "14:15:14", "14:25:14", "14:35:25", "14:45:11", "14:55:29", "15:05:16", "15:15:24", "15:25:10", "15:35:10", "15:45:29", "15:55:15", "16:05:13", "16:15:22", "16:25:16"];

    var ydatasat = [15, 16, 16, 16, 16, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 18, 17, 16, 15, 14, 14, 13, 13, 12, 12, 13, 13, 14, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13];

    
    var ydatarat =[20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 20, 20, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20]

    
    var ydatarwt = [18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 19, 18, 18, 18, 17, 17, 16, 16, 16, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 18, 18, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18];

    
    var ydataswt = [15, 15, 16, 16, 16, 16, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 17, 16, 15, 14, 14, 13, 13, 13, 13, 14, 14, 14, 14, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 14, 13, 13, 14, 13, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14];

    
    var ydataactu = [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 94, 70, 52, 47, 29, 35, 35, 35, 35, 52, 52, 47, 52, 52, 52, 47, 58, 64, 64, 64, 70, 64, 70, 76, 82, 82, 82, 82, 94, 99, 94, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99];

    
    var ydatastemp = [23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19];

    
    var ydatapressure = [1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1];

    var xdatarun =  ["00:00:00 To 01:00:00", "01:00:00 To 02:00:00", "02:00:00 To 03:00:00", "03:00:00 To 04:00:00", "04:00:00 To 05:00:00", "05:00:00 To 06:00:00", "06:00:00 To 07:00:00", "07:00:00 To 08:00:00", "08:00:00 To 09:00:00", "09:00:00 To 010:00:00", "10:00:00 To 11:00:00", "11:00:00 To 12:00:00", "12:00:00 To 13:00:00", "13:00:00 To 14:00:00", "14:00:00 To 15:00:00", "15:00:00 To 16:00:00", "16:00:00 To 17:00:00", "17:00:00 To 18:00:00", "18:00:00 To 19:00:00", "19:00:00 To 20:00:00", "20:00:00 To 21:00:00", "21:00:00 To 22:00:00", "22:00:00 To 23:00:00", "23:00:00 To 24:00:00"];
    var ydatarun =[60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 50, 60, 60, 60, 60];
   
    Highcharts.chart('running', {
        chart: {
            type: 'column',
            width:950
        },
        title: {
            text: 'Running Hours'
        },
       
        xAxis: {
            categories: xdatarun
        },
        yAxis: {
            title: {
                text: 'Min'
            },
                      tickInterval: 2,
                      min:0     

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Running Hours',
            data: ydatarun
        }]
    });

    Highcharts.chart('settemp', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Set Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Set Temperature',
            data: ydatastemp
        }]
    });
    Highcharts.chart('returnair', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Return Air Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Return Air Temp',
            data: ydatarat
        }]
    });
     Highcharts.chart('supplyair', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Supply Air Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Supply Air Temperature',
            data: ydatasat
        }]
    });
     Highcharts.chart('returnwater', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Return Water Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Return Water Temperature',
            data: ydatarwt
        }]
    });
     Highcharts.chart('supwater', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Supply Water Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Supply Water Temperature',
            data: ydataswt
        }]
    });

Highcharts.chart('actator', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Actuator Level'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Percentage(%)'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Actuator Level',
            data: ydataactu
        }]
    });
Highcharts.chart('pressure', {
        chart: {
            type: 'line',
            width:950
        },
        title: {
            text: 'Filter Pressure'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Pa'
            },
          tickInterval: 2,
                      min:0   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Filter Pressure',
            data: ydatapressure
        }]
     
    });
</script>