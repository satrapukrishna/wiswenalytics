<div  class="text-head"> AHU Graph Report</div>

<div  id="running">
                
              </div>
              <div  id="settemp">
               
              </div>
              <div  id="returnair">
               
              </div>
              <div  id="supplyair">
               
              </div>
              <div  id="returnwater">
               
              </div>
              <div  id="supwater">
               
              </div>
              <div  id="actator">
               
              </div>
              <div  id="pressure">
               
              </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
   var d=<?php echo json_encode($ahdata); ?>;
    //var d =  JSON.parse(dd);
    

    var xdatasat = new Array();
    var ydatasat = new Array();

    var xdatarat = new Array();
    var ydatarat = new Array();

    var xdatarwt = new Array();
    var ydatarwt = new Array();

    var xdataswt = new Array();
    var ydataswt = new Array();

    var xdataactu = new Array();
    var ydataactu = new Array();

    var xdatastemp = new Array();
    var ydatastemp = new Array();

    var xdatapressure = new Array();
    var ydatapressure = new Array();

    var xdatarun = new Array();
    var ydatarun = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d[0]['sat'].length; i++) 
    { 
        xdatasat[i] = d[0]['sat'][i]['TxnTime'];
        ydatasat[i] = parseInt(d[0]['sat'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['rat'].length; i++) 
    { 
        xdatarat[i] = d[0]['rat'][i]['TxnTime'];
        ydatarat[i] = parseInt(d[0]['rat'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['rwt'].length; i++) 
    { 
        xdatarwt[i] = d[0]['rwt'][i]['TxnTime'];
        ydatarwt[i] = parseInt(d[0]['rwt'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['swt'].length; i++) 
    { 
        xdataswt[i] = d[0]['swt'][i]['TxnTime'];
        ydataswt[i] = parseInt(d[0]['swt'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['actu'].length; i++) 
    { 
        xdataactu[i] = d[0]['actu'][i]['TxnTime'];
        ydataactu[i] = parseInt(d[0]['actu'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['stemp'].length; i++) 
    { 
        xdatastemp[i] = d[0]['stemp'][i]['TxnTime'];
        ydatastemp[i] = parseInt(d[0]['stemp'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['pressure'].length; i++) 
    { 
        xdatapressure[i] = d[0]['pressure'][i]['TxnTime'];
        ydatapressure[i] = parseInt(d[0]['pressure'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['run'].length; i++) 
    { 
        xdatarun[i] = d[0]['run'][i]['Time'];
        ydatarun[i] = parseInt(d[0]['run'][i]['rh']); 
        
      
    }
    Highcharts.chart('running', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Running Hours'
        },
       credits: {
    enabled: false
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
            type: 'line'
        },
        title: {
            text: 'Set Temperature'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdatastemp
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
            type: 'line'
        },
        title: {
            text: 'Return Air Temperature'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdatarat
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
            type: 'line'
        },
        title: {
            text: 'Supply Air Temperature'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdatasat
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
            type: 'line'
        },
        title: {
            text: 'Return Water Temperature'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdatarwt
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
            type: 'line'
        },
        title: {
            text: 'Supply Water Temperature'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdataswt
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
            type: 'line'
        },
        title: {
            text: 'Actuator Level'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdataactu
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
            type: 'line'
        },
        title: {
            text: 'Filter Pressure'
        },
       credits: {
    enabled: false
  },

        xAxis: {
            categories: xdatapressure
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