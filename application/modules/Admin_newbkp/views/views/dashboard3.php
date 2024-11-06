<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/dashboard.css">
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/samples/static/highslide.css" />


<style>
.title{
    font-size:25px!important;
    color: #367fa8!important;
	padding-top:10px;
    text-transform: uppercase;
    position: relative;}
</style>

</head>

<body class="hold-transition skin-blue" >
<div class="wrapper">

  <?php $this->load->view('common/header') ?>
  
  <?php $this->load->view('common/left_menu') ?>

   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	 <input type="hidden" id="page" value="dashboard" />
      <h1>
        <?php 
		if($this->session->userdata('role')=='admins'){
			if($this->session->userdata('user_id')==1){
				echo "Super Admin Dashboard"; 
			}else{
				echo " "; 
			}
		}else{
			echo "";
		}?>  
		
      </h1>
    
	  
    </section>
	<?php //echo "<pre>";print_r($this->session->userdata());?>
	
	<!-- Main content -->
    <section class="content">
		<div class="col-md-12">
		<?php
		foreach ($devices as $dev) {
			$hardwares=$this->Api_data_model->get_hardwares($dev['category_id'],$dev['device_id']);		
			if($hardwares->num_rows()>0){
			?>
			<br/>
			<?php 

			$permission=str_replace(' ','_',$dev['device_name']);
			$permissions=$this->session->userdata('permissions');
			if(in_array($permission,explode(',',$permissions))){			
			?>
			<div class="box box-info">
				<div class="box-header with-border">
				  <strong><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $dev['icon'] ?>" width="40" /> <span class="title"><?php echo $dev['device_name']; ?></span></strong>

				  <div class="box-tools pull-right">
					
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					
				  </div>
				</div>
				<div class="box-body no-padding" style="display: block;">
				<?php 
				if($dev['device_id']!=3){
					if($hardwares->num_rows()>0){
					?>
					<div class="col-md-12">						
						<div class="carousel-controls testimonial-carousel-control<?php echo $dev['device_id']?>">
						<div class="control prev"><i class="fa fa-chevron-left text-white">&nbsp;</i></div>
						<div class="control next"><i class="fa fa-chevron-right text-white">&nbsp;</i></div>
						</div>
						<div class="testimonial-carousel<?php echo $dev['device_id']?>">
						<?php 
						foreach($hardwares->result() as $row){ 
						$hdata=array(
						'station_id'=>$this->session->userdata('station_id'),
						'api_name'=>$row->api_name
						);
						$hardware_api_data=$this->Api_data_model->get_hardware_api_data($hdata);
						// echo "<pre>";print_r($hardware_api_data);exit;
						?>
						<div class="one-slide white">
							<div class="box box-widget widget-user-2">
							<!-- Add the bg color to the header using any of the bg-* classes -->
							<div class="widget-user-header">              
							<h3 class=""><?php echo $row->dashboard_name;?></h3>
							<div class="box-tools pull-right"><?php echo $hardware_api_data['livedata'];?></div>
							</div>
							
							<div class="box-footer no-padding">
								<ul class="nav nav-stacked">
									<li><a href="#">Chiller Status
									<?php if($hardware_api_data['status']==0){?>
									<span class="pull-right badge bg-red">OFF</span>
									<?php }else{
										?>
										<span class="pull-right badge bg-green">ON</span>
										<?php
									} ?>
									</a></li>
									<li><a href="#">Running Hours
									<span class="pull-right"><?php echo $hardware_api_data['RunningHours']?></span></a></li>
									<li><a href="#">InletWaterTemp <span class="pull-right">NA<span>&#8451;</span></span></a></li>
									<li><a href="#">OutletWaterTemp <span class="pull-right">NA<span>&#8451;</span></span></a></li>
									<li><a href="#">InletWaterPressure <span class="pull-right">NA Pa.</a></li>
									<li><a href="#">OutletWaterPressure <span class="pull-right">NA Pa.</span></a></li>
									
								  </ul>
							</div>
							</div>
						</div>
						
						<?php } ?>
						</div>
					</div>
					<?php
					}
				}else{
				?>
				<div class="col-md-12">
					<div class="" style="background-color:#fff">
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin">
									<thead style="background-color:#f1f1f1">
									<tr>
									<th></th>
									<th class="text-center">Switch Status</th>
									<th class="text-center">Running Status</th>
									<th class="text-center">Today</th>
									<th class="text-center">Yesterday</th>
									<th class="text-center">Last Week</th>
									</tr>
									</thead>
									<tbody>
									<?php
									for($i=0;$i<count($fireData);$i++){
									?>
									<tr>
									<td><?php echo $fireData[$i]['meter']?></td>
									<td align="center">
									<?php if($fireData[$i]['SwitchStatus']=='Manual'){ ?>
									<span class="badge bg-green">AUTO</span>
									<?php }elseif($fireData[$i]['SwitchStatus']=='Auto'){
									?>
									<span class="badge bg-aqua">MANUAL</span>
									<?php
									}else{
									?>
									<span class="badge">NA</span>
									<?php
									} ?>
									</td>
									<td align="center">
									<?php
									if($fireData[$i]['RunningStatus']==0){ ?>
									<span class="badge bg-red">OFF</span>
									<?php }elseif($fireData[$i]['RunningStatus']==1){
									?>
									<span class="badge bg-green">ON</span>
									<?php
									}else{
									?>
									<span class="badge">NA</span>
									<?php
									} ?>
									</td>
									<td align="center"><?php echo ($fireData[$i]['TodayRunn']=="NA"?'NA':' Min');?> </td>
									<td align="center"><?php echo ($fireData[$i]['YesterdayRunn']=="NA"?'NA':' Min');?> </td>
									<td align="center"><?php echo ($fireData[$i]['LastWeekRunn']=="NA"?'NA':' Min');?> </td>
									</tr>
									<?php
									}
									?>
									</tbody>
								</table>
							</div>
						</div>					
					</div>			
				</div>
				<div class="col-md-12">
					<div class="" style="background-color:#fff">
						<div class="box-body">
						<div class="col-md-6">
							<div id="container-speed">
							</div>
						</div>
						<div class="col-md-6">
							<figure class="highcharts-figure">
								<div  id="container_pressure"></div>
								
							</figure>
						</div>
				
				</div>
				</div>
				</div>
			<?php			
			}
		}
		?>
		</div>
			<?php } ?><!--- Permission condition code--->
		<?php }  ?>
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
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
<script>	
 $(document).ready(function() {
	 
	 <?php foreach($device_list as $r){?>
	 
	 var id=<?php echo $r['hardware_device']?>;	 
	 var nums=<?php echo $r['item_show']?>;	 
	 
	 $(".testimonial-carousel"+id).slick({
        infinite: !0,
        slidesToShow: +nums,
        slidesToScroll: 1,
        autoplay: 1,
        arrows:true,
        prevArrow: $(".testimonial-carousel-control"+id+" .prev"),
        nextArrow: $(".testimonial-carousel-control"+id+" .next"),
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1
            }
        }]
    });
	 <?php } ?>
	 

var dps1=[];
var c=<?php echo json_encode($dps1)?>;
for(var i = 0; i < c.length; i++) {
    r=parseFloat(c[i]);
    dps1.push(r);	
}

var dps2=[];
var t=parseFloat(c[c.length-1]);

dps2=<?php echo json_encode($dps2)?>;

Highcharts.chart('container_pressure', {
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
      
        type: 'line'
    },
      
    title: {
        text: ''
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Bar'      
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: dps1
        
    }]
}); 


 //speed guage
           //highchart
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
            to: 4,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 4,
            to: 8,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 8,
            to: 12,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 12,
            to: 16,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,16],
        tickAmount: 1,
        min: 0,
        max: 16,
        title: {
            y: -70
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
var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
    yAxis: {
        title: {
            text: 'bar'
        },
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
      data: [t],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      }
    }
  ]

}));
        

//end pressure
});
 </script>	
</body>
</html>
