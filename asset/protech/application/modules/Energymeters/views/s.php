function drawfullgraph(data1){
        var div = document.getElementById("meterslist");
        var res = JSON.parse(data1);
        //console.log(res);
        var len = Object.keys(res).length;
        //console.log(len);
        var labeldata = new Array();
        for (var i = 0; i < len; i++) {
          labeldata.push(res[i][0]['date']+" ("+res[i][0]['day']+")");
        }
        //console.log(labeldata);
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas)
        /* this data for seting up the ui of bar graph*/
        //var label = 'Meter';
        var divcolors = ['#d4d8df','#6eaacd','#e3b96a','#ff6666'];
        var fillColors = ['rgba(210, 214, 222, 1)','rgba(60,141,188,0.9)','rgba(255,165,0,0.9)','rgba(255, 102 ,102)'];
        var strokeColors = ['rgba(210, 214, 222, 1)','rgba(60,141,188,0.8)','rgba(255,165,0,0.8)','rgba(255, 102 ,102)'];
        var pointColors = ['rgba(210, 214, 222, 1)','rgba(60,141,188,1)','rgba(255,165,0,1)','rgba(255, 102 ,102)'];
        var pointStrokeColors = ['#c1c7d1','#3b8bba','#ffa500','#ff6666'];
        var pointHighlightFills = ['#fff','#fff','#fff','#ff6666'];
        var pointHighlightStrokes = ['rgba(220,220,220,1)','rgba(60,141,188,1)','rgba(255,165,0,1)','rgba(255, 102 ,102)'];
        var dataarrays = new Array();
        var inleng = Object.keys(res[0]).length;
        for (var i = 0; i < len; i++) {
          var consumption = new Array();
          for (var j = 0; j < inleng; j++) {
            consumption.push(res[i][j]['consumption']);
          }
          dataarrays.push(consumption);
        }
        var metersList = Array();
        for(var j = 0; j < inleng; j++){
          metersList.push(res[0][j]['meters']);
        }
        var locList = Array();
        for(var j = 0; j < inleng; j++){
          locList.push(res[0][j]['location']);
        }
        var d= transpose(dataarrays);
        var datasetsresult = Array();// = Array(Array());
        
        for (var i = 0; i < dataarrays.length; i++) {
          var element = {};
          element.label = 'Meter';
          element.fillColor = fillColors[i];
          element.strokeColor = strokeColors[i];
          element.pointColor = pointColors[i];
          element.pointStrokeColor = pointStrokeColors[i];
          element.pointHighlightFill = pointHighlightFills[i];
          element.pointHighlightStroke = pointHighlightStrokes[i];
          element.data = d[i];
          datasetsresult[i] = element;
          
        }
        var metersnames = "";
        for (var i = 0; i < metersList.length; i++) {
          metersnames += "<div style='width: 20px;height: 20px;background-color: "+divcolors[i]+";margin-right: 13px;'></div> <span style='margin-right: 10px;'>"+metersList[i]+"_"+locList[i]+"</span>"; 
        }
        div.innerHTML = metersnames;

        var areaChartDataNew = {
          
          labels  : labeldata,//[ '06-08-2018 (Monday)',  '07-08-2018 (Tuesday)',  '08-08-2018 (Wednesday)', '09-08-2018 (Thursday)','10-08-2018 (Friday)','Average(Week)'],
          
          datasets:datasetsresult /*[
            {
              label               : 'Meter',
              fillColor           : 'rgba(210, 214, 222, 1)',
              strokeColor         : 'rgba(210, 214, 222, 1)',
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : [45, 19, 80, 81,45,35]
            },
            {
              label               : 'Meter',
              fillColor           : 'rgba(210, 214, 222, 1)',
              strokeColor         : 'rgba(210, 214, 222, 1)',
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : [35, 19, 80, 81,45,35]
            }
          ]*/

        }
        console.log(areaChartDataNew);
        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale               : true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines      : false,
          //String - Colour of the grid lines
          scaleGridLineColor      : 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth      : 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines  : true,
          //Boolean - Whether the line is curved between points
          bezierCurve             : true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension      : 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot                : false,
          //Number - Radius of each point dot in pixels
          pointDotRadius          : 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth     : 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius : 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke           : true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth      : 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill             : true,
          //String - A legend template
          legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio     : true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive              : true
        }

        //Create the line chart
        areaChart.Line(areaChartDataNew, areaChartOptions)

       
        //- BAR CHART -
        //-------------
        var barChartCanvas                   = $('#barTuesdayChart').get(0).getContext('2d')
        var barChart                         = new Chart(barChartCanvas)
        var barChartData                     = areaChartDataNew
       // barChartData.datasets[1].fillColor   = '#00a65a'
        //barChartData.datasets[1].strokeColor = '#00a65a'
        //barChartData.datasets[1].pointColor  = '#00a65a'
        var barChartOptions                  = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero        : true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines      : true,
          //String - Colour of the grid lines
          scaleGridLineColor      : 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth      : 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines  : true,
          //Boolean - If there is a stroke on each bar
          barShowStroke           : true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth          : 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing         : 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing       : 1,
          //String - A legend template
          legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to make the chart responsive
          responsive              : true,
          maintainAspectRatio     : true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
      }
      /*[
                {
                    label: 'Energy Meter',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Energy Meter',
                    data: [5, 10, 18, 23, 12, 6],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
                ,
                {
                    label: 'Energy Meter',
                    data: [5, 10, 18, 23, 12, 6],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
                ]*/