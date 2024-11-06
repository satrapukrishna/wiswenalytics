<div  class="text-head"> IAQ Graph Report</div>

<div   id="container_temp"></div>
<div   id="container_hmd"></div>
<div   id="container_pressure"></div>
<div   id="container_co2"></div>
<div   id="container_co"></div>
<div   id="container_pm"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    data = '[{"temp":30.7,"humidity":69.1,"co2":"NA"},{"tmp":[{"FromTime":"00:04:13","CurReading":"30.80"},{"FromTime":"00:19:43","CurReading":"30.80"},{"FromTime":"00:36:02","CurReading":"30.80"},{"FromTime":"00:51:31","CurReading":"30.80"},{"FromTime":"01:07:01","CurReading":"30.80"},{"FromTime":"01:22:33","CurReading":"30.80"},{"FromTime":"01:42:31","CurReading":"30.80"},{"FromTime":"02:02:18","CurReading":"30.70"},{"FromTime":"02:22:38","CurReading":"30.70"},{"FromTime":"02:42:27","CurReading":"30.70"},{"FromTime":"03:02:21","CurReading":"30.70"},{"FromTime":"03:22:25","CurReading":"30.70"},{"FromTime":"03:42:14","CurReading":"30.70"},{"FromTime":"04:02:11","CurReading":"30.70"},{"FromTime":"04:23:00","CurReading":"30.70"},{"FromTime":"04:43:55","CurReading":"30.80"},{"FromTime":"05:04:42","CurReading":"30.80"},{"FromTime":"05:25:30","CurReading":"30.70"},{"FromTime":"05:45:28","CurReading":"30.70"},{"FromTime":"06:05:46","CurReading":"30.70"},{"FromTime":"06:26:38","CurReading":"30.70"},{"FromTime":"06:46:28","CurReading":"30.60"},{"FromTime":"07:07:23","CurReading":"30.60"},{"FromTime":"07:26:36","CurReading":"30.60"},{"FromTime":"07:36:32","CurReading":"30.60"},{"FromTime":"07:46:26","CurReading":"30.60"},{"FromTime":"07:56:20","CurReading":"30.60"},{"FromTime":"08:06:15","CurReading":"30.60"},{"FromTime":"08:16:09","CurReading":"30.60"},{"FromTime":"08:26:32","CurReading":"30.50"},{"FromTime":"08:36:27","CurReading":"30.50"},{"FromTime":"08:46:22","CurReading":"30.50"},{"FromTime":"08:56:13","CurReading":"30.50"},{"FromTime":"09:06:36","CurReading":"30.50"},{"FromTime":"09:16:31","CurReading":"30.50"},{"FromTime":"09:26:26","CurReading":"30.40"},{"FromTime":"09:36:21","CurReading":"30.40"},{"FromTime":"09:46:17","CurReading":"30.50"},{"FromTime":"09:56:22","CurReading":"30.50"},{"FromTime":"10:06:17","CurReading":"30.50"},{"FromTime":"10:16:11","CurReading":"30.60"},{"FromTime":"10:26:35","CurReading":"30.60"},{"FromTime":"10:36:29","CurReading":"30.60"},{"FromTime":"10:46:24","CurReading":"30.60"},{"FromTime":"10:56:19","CurReading":"30.70"}],"hmd":[{"FromTime":"00:04:13","CurReading":"71.70"},{"FromTime":"00:19:43","CurReading":"71.90"},{"FromTime":"00:36:02","CurReading":"72.00"},{"FromTime":"00:51:31","CurReading":"71.80"},{"FromTime":"01:07:01","CurReading":"71.40"},{"FromTime":"01:22:33","CurReading":"71.10"},{"FromTime":"01:42:31","CurReading":"70.80"},{"FromTime":"02:02:18","CurReading":"69.90"},{"FromTime":"02:22:38","CurReading":"69.30"},{"FromTime":"02:42:27","CurReading":"69.10"},{"FromTime":"03:02:21","CurReading":"68.60"},{"FromTime":"03:22:25","CurReading":"67.90"},{"FromTime":"03:42:14","CurReading":"67.60"},{"FromTime":"04:02:11","CurReading":"67.80"},{"FromTime":"04:23:00","CurReading":"68.20"},{"FromTime":"04:43:55","CurReading":"69.10"},{"FromTime":"05:04:42","CurReading":"69.20"},{"FromTime":"05:25:30","CurReading":"69.80"},{"FromTime":"05:45:28","CurReading":"69.70"},{"FromTime":"06:05:46","CurReading":"69.70"},{"FromTime":"06:26:38","CurReading":"69.70"},{"FromTime":"06:46:28","CurReading":"69.50"},{"FromTime":"07:07:23","CurReading":"69.30"},{"FromTime":"07:26:36","CurReading":"69.20"},{"FromTime":"07:36:32","CurReading":"69.50"},{"FromTime":"07:46:26","CurReading":"69.50"},{"FromTime":"07:56:20","CurReading":"69.50"},{"FromTime":"08:06:15","CurReading":"69.60"},{"FromTime":"08:16:09","CurReading":"69.30"},{"FromTime":"08:26:32","CurReading":"69.00"},{"FromTime":"08:36:27","CurReading":"68.60"},{"FromTime":"08:46:22","CurReading":"68.50"},{"FromTime":"08:56:13","CurReading":"68.30"},{"FromTime":"09:06:36","CurReading":"68.40"},{"FromTime":"09:16:31","CurReading":"68.30"},{"FromTime":"09:26:26","CurReading":"67.80"},{"FromTime":"09:36:21","CurReading":"68.30"},{"FromTime":"09:46:17","CurReading":"68.20"},{"FromTime":"09:56:22","CurReading":"68.30"},{"FromTime":"10:06:17","CurReading":"68.50"},{"FromTime":"10:16:11","CurReading":"68.50"},{"FromTime":"10:26:35","CurReading":"68.60"},{"FromTime":"10:36:29","CurReading":"68.70"},{"FromTime":"10:46:24","CurReading":"69.10"},{"FromTime":"10:56:19","CurReading":"69.10"}],"co":0}]';

    var d1 = JSON.parse(data);


    var xdata = new Array();
    var ydata = new Array();

    var xdatahmd = new Array();
    var ydatahmd = new Array();

    var xdataco = new Array();
    var ydataco = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d1[1]['tmp'].length; i++) 
    { 
        xdata[i] = d1[1]['tmp'][i]['FromTime'];
        ydata[i] = parseFloat(d1[1]['tmp'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d1[1]['hmd'].length; i++) 
    { 
        xdatahmd[i] = d1[1]['hmd'][i]['FromTime'];
        ydatahmd[i] = parseInt(d1[1]['hmd'][i]['CurReading']); 
        
      
    }
Highcharts.chart('container_temp', {
        chart: {
            type: 'line',
            width:950
        },credits: {
                          enabled: false
                      },
        title: {
            text: 'Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temperature oC'
            },
                      tickInterval: 10,
                      min:0,
                      max:60     

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
            name: 'Temperature',
            data: ydata
        }]
    });

    Highcharts.chart('container_hmd', {
        chart: {
            type: 'line',
            width:950
        },
        credits: {
                          enabled: false
                      },
        title: {
            text: 'Humidity'
        },
       
        xAxis: {
            categories: xdatahmd
        },
        yAxis: {
            title: {
                text: 'Humidity %RH'
            },
          tickInterval: 10,
                      min:0,
                      max:100   

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
            name: 'Humidity',
            data: ydatahmd
        }]
    });

    Highcharts.chart('container_co2', {
        chart: {
            type: 'line',
            width:950
        },credits: {
                          enabled: false
                      },
        title: {
            text: 'CO2'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'CO2'
            }
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
            name: 'CO2',
            data: [50,51,54,56,60,61,62,65,70,72,74,70,69,67,65,62,60,59,58,55,53,50]
        }]
    });
    Highcharts.chart('container_co', {
        chart: {
            type: 'line',
            width:950
        },credits: {
                          enabled: false
                      },
        title: {
            text: ' '
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'CO'
            }
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
            name: 'CO',
            data: [30,34,32,34,35,32,34,35,30,33,32,30,34,32,34,35,30,29,28,28,30,32,34,35,30,26,28]
        }]
    });
     Highcharts.chart('container_pressure', {
        chart: {
            type: 'line',
            width:950
        },credits: {
                          enabled: false
                      },
        title: {
            text: ' '
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Bar'
            }
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
            name: 'Pressure1',
            data: ydata
        }]
    });
     Highcharts.chart('container_pm', {
        chart: {
            type: 'line',
            width:950
        },credits: {
                          enabled: false
                      },
        title: {
            text: ' '
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Micrograms per cubic meter'
            }
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
            name: 'PM2.5',
            data: [22,26,28,30,34,32,34,35,30,29,28,28,30,32,34,35,30,26,28,30,34,32,34,35,30,29,28,28,30,32,34,35,30,25,20,15]
        }]
    });
</script>