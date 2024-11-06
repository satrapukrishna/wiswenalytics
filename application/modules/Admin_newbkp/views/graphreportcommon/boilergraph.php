<div  class="text-head"> Boiler Graph Report</div>

<div   id="container"></div>
<div   id="runnContainer"></div>
<div   id="econContainer"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    
Highcharts.chart('container', {
    chart: {
        type: 'area',
        width:950
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Boiler 01'
    },
    xAxis: {
        categories: ["05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KL'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} KL</b></td></tr>',
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
        name: 'Date/Time',
        data: [null, null, null, null, null, 6, 11, 32, 110, 235,
            369, 370, 370, 376, 376, 305, 400, 420, 400, 154,
            204, 241, 273, 294, 310, 319, 320, 312, 292, 273,
            266, 269, 279, 289, 289, 278, 255, 257, 248, 246,
            243, 234, 237, 240, 243, 242, 244, 243, 235, 223,
            210, 240, 243, 242, 244, 243, 235, 223,
            210,240, 243, 242, 244, 243, 235, 223,
            210,240, 243, 242, 244, 243, 235, 223,
            210]

    }]
});



Highcharts.chart('runnContainer', {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
      
        type: 'column',
        width:950
    },
      
    title: {
        text: 'RunningHours'
    },
    subtitle: {
        text: 'Boiler01'
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: ["00:00:00 To 1:00:00", "1:00:00 To 2:00:00", "2:00:00 To 3:00:00", "3:00:00 To 4:00:00", "4:00:00 To 5:00:00", "5:00:00 To 6:00:00", "6:00:00 To 7:00:00", "7:00:00 To 8:00:00", "8:00:00 To 9:00:00", "9:00:00 To 10:00:00", "10:00:00 To 11:00:00", "11:00:00 To 12:00:00", "12:00:00 To 13:00:00", "13:00:00 To 14:00:00", "14:00:00 To 15:00:00", "15:00:00 To 16:00:00", "16:00:00 To 17:00:00", "17:00:00 To 18:00:00", "18:00:00 To 19:00:00", "19:00:00 To 20:00:00", "20:00:00 To 21:00:00", "21:00:00 To 22:00:00", "22:00:00 To 23:00:00", "23:00:00 To 24:00:00"]
    },
     yAxis: {
      title: {      
      text: 'Minutes'      
    }
    },   
     series: [{
      name: 'Minutes',
        data: [33, 42, 38, 14, 31, 27, 33, 16, 19, 36, 40, 6, 0, 0, 0, 0, 40, 44, 40, 32, 8, 0, 0, 0]
        
    }]
});

Highcharts.chart('econContainer', {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
       
        type: 'column',
        width:950
    },
    title: {
        text: 'Economy'
    },
    subtitle: {
        text: 'Boiler01'
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: ["00:00:00 To 1:00:00", "1:00:00 To 2:00:00", "2:00:00 To 3:00:00", "3:00:00 To 4:00:00", "4:00:00 To 5:00:00", "5:00:00 To 6:00:00", "6:00:00 To 7:00:00", "7:00:00 To 8:00:00", "8:00:00 To 9:00:00", "9:00:00 To 10:00:00", "10:00:00 To 11:00:00", "11:00:00 To 12:00:00", "12:00:00 To 13:00:00", "13:00:00 To 14:00:00", "14:00:00 To 15:00:00", "15:00:00 To 16:00:00", "16:00:00 To 17:00:00", "17:00:00 To 18:00:00", "18:00:00 To 19:00:00", "19:00:00 To 20:00:00", "20:00:00 To 21:00:00", "21:00:00 To 22:00:00", "22:00:00 To 23:00:00", "23:00:00 To 24:00:00"]
    },
     yAxis: {
      title: {      
      text: 'Economy'      
    }
    },
   
     series: [{
      name: 'Economy',
        data: [0, 0, 0, 0, 4.134, 4.969, 6.275, 0, 0, 9.963, 7.658, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
        
    }]
});
</script>