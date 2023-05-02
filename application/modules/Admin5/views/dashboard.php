
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	<style>
	.status-on{
	display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
.status-off{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
img {
vertical-align: middle;
margin-right:10px;}
div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.Lnk{
	padding: 21px 40px 18px 20px!important;
}
.col{
    cursor: pointer;
	z-index:1000000;
	margin: 23px 10px 0 0!important;
	
	}
	
	
	</style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu2') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
		
		<div class="DshBrdSctnTtl">
		<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
		</div>
		</div>
		
		<?php
		$j=0;
		foreach ($devices as $dev) {
		$hardwares=$this->Api_data_model->get_hardwares($dev['category_id'],$dev['device_id']);	
		$permission=str_replace(' ','_',$dev['device_name']);
		// echo $permission;
		$permissions=$this->session->userdata('permissions');
		// echo $permissions;
		if(($dev['device_id']!=9)&&($dev['device_id']!=10)&&($dev['device_id']!=11)&&($dev['device_id']!=15)&&($dev['device_id']!=16)&&($dev['device_id']!=12)){
		if($hardwares->num_rows()>0){
		
		if(in_array($permission,explode(',',$permissions))){
			
			?>
			<!-- Bore Wells code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="div<?php echo $dev['device_id']?>">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $dev['dashboard_icon'] ?>" width="40" /><?php echo ucwords(strtolower($dev['device_name'])); ?></span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(<?php echo $dev['device_id']?> )" id="device<?php echo $dev['device_id']?>"></span>
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox<?php echo $dev['device_id']?>">
				<div class="bxslider" id="bxid">
					<?php 
					
					if($hardwares->num_rows()>0){
						
						foreach($hardwares->result() as $row){ 
						$hdata=array(
						'station_id'=>$this->session->userdata('station_id'),
						'api_name'=>$row->api_name
						);
						$hardware_api_data=$this->Api_data_model->get_hardware_api_data($hdata);
						// echo "<pre>";print_r($hardware_api_data);
						?>
				
					<div style="width:540px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl"><?php echo $row->dashboard_name;?></span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft"><?php echo ucwords(strtolower($dev['device_name'])); ?> Status</div><div class="ClRgt">
						<?php if($hardware_api_data['status']==0){?>
									<span class="status-off">OFF</span>
									<?php }else{
										?>
										<span class="status-on">ON</span>
										<?php
									} ?>
						</div></li>
						<li><div class="ClLft">Running Hours</div><div class="ClRgt"><?php echo $hardware_api_data['RunningHours']?></div></li>
						<li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">NA </div></li>
						<li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">NA</div></li>
						<li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">NA Pa.</div></li>
						<li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">NA Pa.</div></li>
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php 
						}
					}
					
					?>
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- Bore Wells code ends -->
			<?php 
		}	
		
		}
		}else{
			// echo $permissions;
			if(in_array($permission,explode(',',$permissions))){
				
			$firepumps=$this->Api_data_model->get_firepumpdata($dev['device_id'],'Pumps');
			$pumps=$firepumps;		
			$fireData=$this->Api_data_model->getDashBoardData($firepumps->result());
			$water_level=$this->Api_data_model->get_firepumpdata($dev['device_id'],'Water Level Sensors');
			
			$line_pressure=$this->Api_data_model->get_firepumpdata($dev['device_id'],'Pressure Sensor');
			
			$j=0;
			foreach($line_pressure->result() as $rec){
				$data1[]=$this->Api_data_model->getPressureToday($rec->LineConnected);			
				for($i=0;count($data1[$j])>$i;$i++){
					$pdata[$rec->LineConnected]['readings'][$i]=$data1[$j][$i]->CurReading;
					$pdata[$rec->LineConnected]['timings'][$i]=$data1[$j][$i]->ToTime;				
				}			
			$j++;
			}
			// echo "<pre>";print_r($data1);
			?>
			
			<!-- Fire pump code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="div<?php echo $dev['device_id']?>">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $dev['dashboard_icon'] ?>" width="40" /><?php echo ucwords(strtolower($dev['device_name'])); ?></span>
                    <?php /*<span class="SctnVw Cllps" id="fpcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(<?php echo $dev['device_id']?> )" id="device<?php echo $dev['device_id']?>"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp device" id="devicebox<?php echo $dev['device_id']?>">
                    <table class="SctnDtlsDualGrd">
                        <tr>
                            <th>

                            </th>
                            <th>
                                Switch Position
                            </th>
                            <th>
                                Running Status
                            </th>
                            <th>
                                Today
                            </th>
                            <th>
                                Yesterday
                            </th>
                            <th>
                                Last Week
                            </th>
                        </tr>
						<?php
						for($i=0;$i<count($fireData);$i++){
						?>
                        <tr>
                            <td>
                                <span class="Txt Ttl"><?php echo $fireData[$i]['meter']?></span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
								<?php if($fireData[$i]['RunningStatus']==1){ ?>
								<span class="Txt Stts auto" id=""></span>
								<?php }elseif($fireData[$i]['RunningStatus']==0){?>
								<span class="Txt Stts Off" id=""></span>
								<?php }else{ ?>
								<span class="Txt Stts Manual">NA</span>
								<?php } ?>
                                 
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                                <?php if($fireData[$i]['SwitchStatus']=='Manual'){ ?>
								<span class="Txt Stts auto" id=""></span>
								<?php }elseif($fireData[$i]['SwitchStatus']=='Auto'){?>
								<span class="Txt Stts Off" id=""></span>
								<?php }else{ ?>
								<span class="Txt Stts Manual" >NA</span>
								<?php } ?>
                                
                            </td>
                            <td>
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt"><?php echo ($fireData[$i]['TodayRunn']!="NA"?$fireData[$i]['TodayRunn'].' Min':'NA');?></span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt"><?php echo ($fireData[$i]['YesterdayRunn']!="NA"?$fireData[$i]['YesterdayRunn'].' Min':'NA');?></span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt"><?php echo ($fireData[$i]['LastWeekRunn']!="NA"?$fireData[$i]['LastWeekRunn'].' Min':'NA');?></span>
                            </td>
                        </tr>
						<?php } ?>
                       
                    </table>
                    <?php
                    foreach($line_pressure->result() as $rec1){
                     ?>
					
                    <div class="col-md-6 EnrgyMtrGuge" style="padding:0px">

                        
                        <div id="<?php echo "container_speed_".$rec1->hardware_id ?>">
                            
                        </div>
                       <!--  <div id="container-speed">
                            
                        </div> -->
                       
                    </div>
                   
                    <div class="childclass1 col-md-6">
                         <!-- <div  id="container_pressure">
                
						</div>  -->
						<div id="<?php echo "container_pressure_".$rec1->hardware_id ?>">
                            
                        </div>
                    </div>
                    <?php } ?>
                      <!-- DG Set code starts -->
                    <div class="fire_sub">
						<div class="fire_dgset">
						   
							<div class="DshBrdSctnDtls" id="dgset">
							<div class="childclass">
							<div class="SctnDtlsHldr">
							<div class="SldrCntnr">
							<div class="SctnDtls DGGnrtrHldr">
							<?php 
							$diesel=$this->Api_data_model->get_firepumpdata($dev['device_id'],'Diesel Pump');
							$disel_data=$diesel->result_array();
							// echo "<pre>";print_r($disel_data);
							// echo $disel_data[0]['api_name'];
							// $data = '{"generatorId":"01SISMKPHB","status":"Off","lat":"17.49367","lng":"78.40086","currentFuel":779.607,"date":"04-09-2020","time":"03:50:07 PM","fuelCapacity":"1000.00","addr":"Sri Sai Plaza, Mumbai Hwy, KPHB Phase I, K P H B Phase 1, Kukatpally, Hyderabad, Telangana 500072, India","runningHours":"0 Hr and 0 Mn","fuelConsumed":0,"Economy":0,"fuelAdded":0,"fuelTheft":0,"batVoltage":0,"batAlarm":0,"fuelAlarm":0}';
							// $data = '{"generatorId":"RSBABIDS","status":"Off","lat":"17.38801","lng":"78.47724","currentFuel":196.096,"date":"04-09-2020","time":"08:14:59 PM","fuelCapacity":"500.00","addr":"Kundas Estate, Street Number 1, Hanuman Tekdi, Koti, Hyderabad, Telangana 500001, India","runningHours":"0 Hours and 0 Mins","fuelConsumed":0,"Economy":0,"fuelAdded":0,"fuelTheft":0,"batVoltage":0,"batAlarm":0,"fuelAlarm":0}';
							// $obj = json_decode($data);	
							// echo $disel_data[0]['api_name'];
							// echo "<br>";
							// echo $dgdata['generatorId'];
							
							if($disel_data[0]['api_name']==$dgdata[0]['generatorId']){
							
							?>
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">Diesel Generator</span>
							<span class="SctnTtl_buttn">
							<?php if($dgdata[0]['status']=='off'){?>							
							<button class="button_red">OFF</button>
							<?php }else{ ?>
							<button>ON</button>
							<?php }	?>
							</span>
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt"><?php echo $dgdata[0]['fuelConsumed']?></div></li>
							<li><div class="ClLft">Running Time</div><div class="ClRgt"><?php echo $dgdata[0]['ruhnnin']?></div></li>
							<li><div class="ClLft">Fuel Add</div><div class="ClRgt"><?php echo $dgdata[0]['fuelAdded']?></div></li>
							<li><div class="ClLft">Available Fuel</div><div class="ClRgt"><?php echo $dgdata[0]['currentFuel']?>Ltr</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt"><?php echo $dgdata[0]['fuelTheft']?></div></li>
							 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt"><?php echo $dgdata[0]['batVoltage']?> Volts</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2">
							<div class="LiquidTank Smll">
							<?php 
							$total_fuel=$dgdata[0]['fuelCapacity'];
							$avial_fuel=$dgdata[0]['currentFuel'];
							$fuel=($avial_fuel/$total_fuel)*100;
							// $fuel=40;
							if($fuel>=50){?>
								<div class="Liquid l-70"></div>
							<?php }else if($fuel>=30){?>
								<div class="Liquid l-50"></div>
							<?php }else{
								?>
								<div class="Liquid l-30"></div>
								<?php
							}	?>
							
							</div>
							</div> 
							
							<div class="DGCol-3"> 
							<div class="LiquidTank Smll">
							<div class="Liquid Low"></div>
							<div class="Liquid Medium">
								
							</div>
							<div class="Liquid High"></div>
							<span class="LowTxt">Low</span>
							<span class="MedTxt">Medium</span>
							<span class="HghTxt">High</span>
							</div>
							</div>
							<?php } ?>
							</div>
							</div>
							</div>
							</div>
							
							</div>
						</div>
						<?php 
						
						foreach($water_level->result_array() as $rec){
							$water_level_sen=$this->Api_data_model->getWaterLevel($rec['api_name']);
							// echo "<pre>";print_r($water_level_sen);
						?>
						<div class="fire_waterpump">
						<span class="SctnTtl"><?php echo $rec['pump_name']?></span>
						<div>
						<div class="SctnDtlsHldr">
						<div class="SldrCntnr">
						<div class="SctnDtls WtrTnkLvl">
						<div class="TnksHldr">
						<div class="LftHldr">
						<div class="LiquidTank">
						<div class="Liquid Liquidhigh l"></div>
						</div>
						</div>
						<div class="RgtHldr">
						<div class="LiquidTank Smll">
						<?php 
							$total_level=$rec['Volume'];
							$avial_level=$water_level_sen->Consumption;
							$level=($avial_level/$total_level)*100;
							// $fuel=40;
							if($level>=50){?>
								<div class="Liquid Liquidhigh l-70"></div>
							<?php }else if($level>=30){?>
								<div class="Liquid Liquidhigh l-50"></div>
							<?php }else{
								?>
								<div class="Liquid Liquidhigh l-30"></div>
								<?php
							}	?>
						
						<span class="LiquidStatus"><?php echo $level?>%</span>
						</div>
						</div>
						</div>
					   
						<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Total Capacity</div><div class="ClRgt"><?php echo $rec['Volume']?>KL</div></li>
						<li><div class="ClLft">Current Level</div><div class="ClRgt"><?php echo $water_level_sen->Consumption?>KL</div></li>
						<li><div class="ClLft">Filled</div><div class="ClRgt"><?php echo $level?>%</div></li>
						</ul>
						</div>
						</div>
						</div>
						</div>
							
						</div>
						<?php } ?>

					</div>
					<div class="pump_details">
						<table class="SctnDtlsDualGrd">
							<tr>
								<th class="Col-1">
									Pumps
								</th>
								<th class="Col-2">
									Pumps Capacity
								</th>
								<th class="Col-3">
									Pressure Maintained
								</th>
								<th class="Col-4">
									Cut in Pressure
								</th>
								<th class="Col-5">
									Cut off Pressure
								</th>							   
							</tr>
							<?php 
							foreach($pumps->result_array() as $row){
								?>
								<tr>
									<td class="Col-1">
										<span class="Txt Ttl"><?php echo $row['pump_name']?></span>
									</td>
									<td class="Col-2">
										<span class="Txt" id=""><?php echo $row['PumpsCapacity']?></span>
									</td>
									<td class="Col-3">
										<span class="Txt" id="mhrs"><?php echo $row['PressureMaintained']?></span>
									</td>
									<td class="Col-4">
										<span class="Txt" id="mhrht"><?php echo $row['CutInPressure']?></span>
									</td>
									<td class="Col-5">
										<?php if($row['CutOutPressure']!='Mannual'){ ?>
										<span class="Txt Stts cutoff_color" id="mhrhy"><?php echo $row['CutOutPressure'] ?></span>
										<?php }else{ ?>
										<span class="Txt Stts Manual" id="mhrhy">Mannual</span>
										<?php } ?>
									</td>
								</tr>
								<?php
							}
							?>
							
						</table>
					</div>
					<!-- DG Set code ends -->
                                     
                </div>
            </div>
            <!-- Fire pump code ends -->
			<?php
		}
		
		}
		$j++;
		}
		?>
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />


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

	<?php
	foreach($firepump_id as $dev){
	$line_pressure=$this->Api_data_model->get_firepumpdata($dev['device_id'],'Pressure Sensor');
	foreach($line_pressure->result() as $rec){
	 ?>
	var dps1=[];
	var dps2=[];
	var r;
	 c1=<?php echo json_encode($pdata[$rec->LineConnected]['readings'])?>;
	 for(var i = 0; i < c1.length; i++) {
    r=parseFloat(c1[i]);
    dps1.push(r);
   
   // econ.push(jsondata[i]["economy"]);
   }
	 dps2=<?php echo json_encode($pdata[$rec->LineConnected]['timings'])?>;
var t=parseFloat(c1[c1.length-1]);
var pressurecontainer=<?php echo "container_pressure_".$rec->hardware_id ?>;
var speedcontainer=<?php echo "container_speed_".$rec->hardware_id ?>;

Highcharts.chart(pressurecontainer, {
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
var chartSpeed = Highcharts.chart(speedcontainer, Highcharts.merge(gaugeOptions, {
    yAxis: {
        title: {
            text: 'Pressure in Bar'
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


	<?php } }?>
	


        

//end pressure
});


function device(a){
	if($( "#devicebox"+a ).is( ":visible" ))
        {
            $('#devicebox'+a).toggle('slow'); 
            $("#device"+a).addClass("Expnd");
        }
        else if($( "#devicebox"+a ).is( ":hidden" ))
        {
            $('#devicebox'+a).toggle('slow'); 
            $("#device"+a).removeClass("Expnd");
        }
}

function deviceall(){
	if($( ".deviceall" ).is( ":visible" ))
        {
            $('.device').toggle('slow'); 
            $(".deviceall").addClass("Expnd");
        }
        else if($( ".deviceall" ).is( ":hidden" ))
        {
            $('.device').toggle('slow'); 
            $(".deviceall").removeClass("Expnd");
        }
	//$('.device').hide();
}

  function menushow(id){
	$("#subcat"+id).toggle('slow');
}
function reports2(id){
	$("#subreports"+id).toggle('slow');
	return false;
}

$('#reports').click(function(){
	$('#reportsmenu').toggle('slow');
	return false;
});
$('#firepump').click(function(){
	$('#subfirepump').toggle('slow');
	return false;
});

	
 </script>	
</html>