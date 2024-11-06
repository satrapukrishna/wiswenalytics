<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS - Indoor Air Quality</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/protechs/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/protechs/AppTheme/Fonts/IconFont.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function () {
            $('.KPIDashboard').bxSlider({
                minSlides: 1,
                maxSlides: 1,
                moveSlides: 1,
                hideControlOnEnd: true,
                infiniteLoop: false
            });
        });
    </script>
<style>
    .highcharts-container {
        height: 200px !important;
    }
    </style>

</head>
<body>
    <div class="AppHeader">
        <div class="AppMnuTtlHldr">
            <div class="TtlHldr">
                <div class="ClntLgoHldr">
                    <img src="<?php echo base_url(); ?>asset/protechs/Images/protech.png" class="Lgo" />
                </div>
            </div>
        </div>
    </div>
    <div class="AppMstrCntnr FllScrn FllHghtwHdr">
        <div class="GnPgCntntDvHldr DashboardView FullViewWOFooter">
            <div id="InnrCntntHldrDv" class="InnrCntntHldr">
                <div class="FormHldr">
                    <div id="KPIDashboard" class="row NoBrdr NoBG">
                        <div class="col-1 NoPd">
                            <div class="DashboardHldr TmpltTwo">
                                <div class="DshHdrHldr TmpltTwo Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">Room KPI Dashboard Showing status</span>
                                    </div>
                                </div>
                                <div class="DshDtlHldr TmpltTwo">
                                    <div class="SldrHldr">
                                        <div class="KPIDashboard">
                                             <?php for ($i=0; $i < count($iaq_data); $i++) {?>
                                            <div class="slide">
                                                <div class="DshInnrAccrdn" style="margin: 0 !important;">
                                                    <div class="DshInnrAccrdnHdrHldr">
                                                        <div class="TtlHldr">
                                                            <span class="TtlTxt"><?php echo $iaq_data[$i]['meter']?></span>
                                                        </div>
                                                        <div class="ActnBtnHldr">
                                                            <a href="#" class="Lnk WISIcn-Reset"></a>
                                                        </div>
                                                    </div>
                                                    <div class="DshInnrAccrdnDtlHldr">
                                                        <div class="FormHldr">
                                                            <div class="row NoBrdr NoBG">
                                                                <div class="col-4 NoPd">
                                                                    <div class="BMSDshbrdBlck ThemeOne">
                                                                        <div class="BMSDshbrdTtlHldr">
                                                                            <div class="TtlHldr">
                                                                                <div class="TxtHldr">
                                                                                    <span class="TtlTxt">Temperature</span>
                                                                                </div>
                                                                                <div class="InfoHldr">
                                                                                    <div class="InfoBxHldr">
                                                                                        <span class="InfoBtn WISIcn-Information"></span>
                                                                                        <div class="InfoToolTip">
                                                                                            <p class="Txt">
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="BMSDshbrdDtlsHldr AddPd">
                                                                            <div class="FormHldr">
                                                                                <div class="row NoBrdr NoBG AlignItmsCntr">
                                                                                    <div class="col-66 NoPd FllHght">
                                                                                        <div class="BMSDshbrdDtlDv ArQltyMtrHldr" id="temp<?php echo $i?>">
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3 NoPd">
                                                                                        <div class="FormHldr">
                                                                                            <div class="row NoBrdr NoBG">
                                                                                                <div class="col-1 NoPd">
                                                                                                    <div class="BMSDshbrdDtlDv ThemeOne">
                                                                                                        <div class="TxtDv">
                                                                                                            <span class="VluTtl">Max.</span>
                                                                                                            <span class="VluTxt"><?php echo $iaq_data[$i]['tempMax']?><sup>°F</sup></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-1 NoPd">
                                                                                                    <div class="BMSDshbrdDtlDv ThemeTwo">
                                                                                                        <div class="TxtDv">
                                                                                                            <span class="VluTtl">Min.</span>
                                                                                                            <span class="VluTxt"><?php echo $iaq_data[$i]['tempMin']?><sup>°F</sup></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-1 NoPd">
                                                                                                    <div class="BMSDshbrdDtlDv ThemeThree">
                                                                                                        <div class="TxtDv">
                                                                                                            <span class="VluTtl">Avg.</span>
                                                                                                            <span class="VluTxt"><?php echo $iaq_data[$i]['tempAvg']?><sup>°F</sup></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row NoBrdr NoBG">
                                                                                    <div class="col-1">
                                                                                        <div class="TableLegends FormHldr JstfyCntntCntr">
                                                                                            <div class="Hldr">
                                                                                                <span class="Blk InvType Theme1-TempBlue">32°F-66°F</span>
                                                                                                <span class="Blk InvType Theme1-TempGreen">67°F-76°F</span>
                                                                                                <span class="Blk InvType Theme1-TempOrange">77°F-86°F</span>
                                                                                                <span class="Blk InvType Theme1-TempRed">86°F+</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 NoPd">
                                                                    <div class="BMSDshbrdBlck ThemeOne">
                                                                        <div class="BMSDshbrdTtlHldr">
                                                                            <div class="TtlHldr">
                                                                                <div class="TxtHldr">
                                                                                    <span class="TtlTxt">Relative Humidity</span>
                                                                                </div>
                                                                                <div class="InfoHldr">
                                                                                    <div class="InfoBxHldr">
                                                                                        <span class="InfoBtn WISIcn-Information"></span>
                                                                                        <div class="InfoToolTip">
                                                                                            <p class="Txt">
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="BMSDshbrdDtlsHldr AddPd">
                                                                            <div class="FormHldr">
                                                                                <div class="row NoBrdr NoBG AlignItmsCntr">
                                                                                    <div class="col-66 NoPd ">
                                                                                        <div class="BMSDshbrdDtlDv ArQltyMtrHldr" id="humidity<?php echo $i?>">
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3 NoPd">
                                                                                        <div class="FormHldr">
                                                                                            <div class="row NoBrdr NoBG">
                                                                                                <div class="col-1 NoPd">
                                                                                                    <div class="BMSDshbrdDtlDv ThemeOne">
                                                                                                        <div class="TxtDv">
                                                                                                            <span class="VluTtl">Max.</span>
                                                                                                            <span class="VluTxt"><?php echo $iaq_data[$i]['humMax']?>%RH<sup></sup></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-1 NoPd">
                                                                                                    <div class="BMSDshbrdDtlDv ThemeTwo">
                                                                                                        <div class="TxtDv">
                                                                                                            <span class="VluTtl">Min.</span>
                                                                                                            <span class="VluTxt"><?php echo $iaq_data[$i]['humMin']?>%RH<sup></sup></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-1 NoPd">
                                                                                                    <div class="BMSDshbrdDtlDv ThemeThree">
                                                                                                        <div class="TxtDv">
                                                                                                            <span class="VluTtl">Avg.</span>
                                                                                                            <span class="VluTxt"><?php echo $iaq_data[$i]['humAvg']?>%RH<sup></sup></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row NoBrdr NoBG">
                                                                                    <div class="col-1">
                                                                                        <div class="TableLegends FormHldr JstfyCntntCntr">
                                                                                            <div class="Hldr">
                                                                                                <span class="Blk InvType Theme1-RHSand">0-50%</span>
                                                                                                <span class="Blk InvType Theme1-RHGreen">50-60%</span>
                                                                                                <span class="Blk InvType Theme1-RHOrange">61-75%</span>
                                                                                                <span class="Blk InvType Theme1-RHRed">76-100%</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <?php }?>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="DshDtlHldr TmpltTwo PaddBtm">
                                    <iframe width="100%" height="280" frameborder="0" style="border-radius: 10px;" src="https://www.youtube.com/embed/Gqn9Ctwk-f8?mute=1&autoplay=1&loop=1&controls=0" allow="autoplay"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>


<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="<?php echo base_url(); ?>asset/protechs/Js/index.js"></script>
<script>
    
	function getRefresh(){
		location.reload();
	}
	
	
	<?php //if(modules::run('Admin/Site/authlink','energy_DG')){ ?>
//DG Start
var iaq_data=<?php echo json_encode($iaq_data); ?>;
for (var i1 = 0; i1 < iaq_data.length; i1++) {
	if(iaq_data[i1]["tempMin"]=="NA"){

	}else{
var cnt_temp='temp'+i1;
	var cnt_humi='humidity'+i1;
	var meter=iaq_data[i1]["meter"];

	
     
	// var time=[];
	// var run=[];
	// for(var k=0;k<iaq_data[i1]['graph'].length;k++){
	// 	time.push(iaq_data[i1]['graph'][k]['time']);
    //     run.push(iaq_data[i1]['graph'][k]['runninghrs']);
        
	// }
	// alert(iaq_data[i1]["tempGraph"].length);
	var temp=parseFloat(iaq_data[i1]['tempGraph'][iaq_data[i1]['tempGraph'].length-1]['CurReading']);
	
	var humidity=parseFloat(iaq_data[i1]["humiGraph"][iaq_data[i1]["humiGraph"].length-1]['CurReading']);
var tempContainer=cnt_temp;
var humiContainer=cnt_humi;
var H = Highcharts;
var each = H.each,
  merge = H.merge,
  pInt = H.pInt,
  pick = H.pick,
  isNumber = H.isNumber;


Highcharts.seriesTypes.gauge.prototype.translate = function() {
  var series = this,
    yAxis = series.yAxis,
    options = series.options,
    center = yAxis.center;

  series.generatePoints();

  each(series.points, function(point) {

    var dialOptions = merge(options.dial, point.dial),
      isRectanglePoint = point.series.userOptions.isRectanglePoint,
      radius = (pInt(pick(dialOptions.radius, 80)) * center[2]) / 200,
      baseLength = (pInt(pick(dialOptions.baseLength, 70)) * radius) / 100,
      rearLength = (pInt(pick(dialOptions.rearLength, 10)) * radius) / 100,
      baseWidth = dialOptions.baseWidth || 3,
      topWidth = dialOptions.topWidth || 1,
      overshoot = options.overshoot,
      rotation = yAxis.startAngleRad + yAxis.translate(point.y, null, null, null, true);

    // Handle the wrap and overshoot options
    if (isNumber(overshoot)) {
      overshoot = overshoot / 180 * Math.PI;
      rotation = Math.max(yAxis.startAngleRad - overshoot, Math.min(yAxis.endAngleRad + overshoot, rotation));

    } else if (options.wrap === false) {
      rotation = Math.max(yAxis.startAngleRad, Math.min(yAxis.endAngleRad, rotation));
    }
   

    rotation = rotation * 180 / Math.PI;

    // Checking series to draw dots
    if (isRectanglePoint) {  //draw new dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
           'M', -rearLength + 6, (-baseWidth / 2), 'L', -rearLength + 12, (-baseWidth / 2) + 6, -rearLength +6, (-baseWidth / 2) + 12, -rearLength, (-baseWidth / 2) + 6, 'z'
        ],
        translateX: center[0] - baseWidth - 1,
        translateY: center[1],
        rotation: rotation,
        style: 'stroke: white; stroke-width: 2;'
      };

    } else {  //draw standard dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
          'M', -rearLength, -baseWidth / 2,
          'L',
          baseLength, -baseWidth / 2,
          radius, -topWidth / 2,
          radius, topWidth / 2,
          baseLength, baseWidth / 2, -rearLength, baseWidth / 2,
          'z'
        ],
        translateX: center[0],
        translateY: center[1],
        rotation: rotation
      };

    }

    // Positions for data label
    point.plotX = center[0];
    point.plotY = center[1];


  });
}; // end of replaced function

var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

                      credits: {
                          enabled: false
                      },

    title: null,
	
    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'solid'
        }
    },
	
    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {

                plotBands: [{
            from: 0,
            to: 19,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 20,
            to: 49,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 50,
            to: 79,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 80,
            to: 100,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,100],
        tickAmount: 10,
        min: 0,
        max: 100,
        title: {
            y: -100
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
            },
                      marker: {
            enabled: true,
            symbol: 'triangle',
            }
        },
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart(tempContainer, Highcharts.merge(gaugeOptions, {
	yAxis: {
    
    
	},
   

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            // data: [t],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [temp],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      },
      height: '80%'
    }
  ],
  exporting: {
    enabled: false
  }

}));



	

	// The speed gauge
var chartSpeed = Highcharts.chart(humiContainer, Highcharts.merge(gaugeOptions, {
	yAxis: {
    
   
	},
   

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            // data: [t],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [humidity],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      },
      height: '80%'
    }
  ],
  exporting: {
    enabled: false
  }

}));


	

	}
}
	
	//DG End
	<?php //} ?>
	</script>
</body>
</html>