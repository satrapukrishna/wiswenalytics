
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	.ph-val{font: 600 40px 'Open Sans'!important;text-align: center;}
	.superscript {
    font-size: 13px;
    line-height: 0.5em;
    vertical-align: baseline;
    position: relative;
    top: -2.0em;
}
	.subhead{font-size:12px;color:#9c9494;border-bottom:1px solid #eae5e5;margin-top:10px;padding-bottom:5px}
	.head-h44{text-align:left;margin:0px;padding:0px;background-color: #fff;
    font: 600 16px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 0px solid #ddd;}
	.toilet-head1{ text-align:center;font: 600 13px 'Open Sans'!important; color:#3c8dbc}
	
	.small-box1{margin-top:20px;width:23.5%;float:left;border:1px solid #eae5e5;border-radius: 10px;padding:5px;margin-right:10px;}
	
	input[type=range]{
    -webkit-appearance: none;
}

input[type=range]::-webkit-slider-runnable-track {
    width: 300px;
    height: 8px;
    background-image: linear-gradient(to right, #00BFFF,#00FF7F,#FFDF00,#FE5A1C,#D51A13);
    border: none;
    border-radius: 3px;
}

input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background-image: radial-gradient(black, white, black);
    margin-top: -4px;
}

input[type=range]:focus {
    outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
    background-image: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);
}
	
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{width:55%}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{width:45%}
	.degree-text{color: #666;
    font-size: 12px;
    padding-left: 5px;}
	
	.status-working{letter-spacing: 1px;
	border-radius: 25px!important;
    padding: 5px 0!important;
    font: 600 10px 'Open Sans'!important;    
    width: 75px!important;
	display: inline-block!important;
    background-color: #148614!important;
    color: #fff!important;    
    box-sizing: border-box!important;
    text-align: center!important;}
	
	.status-stopped{letter-spacing: 1px;
	border-radius: 25px!important;
    padding: 5px 0!important;
    font: 600 10px 'Open Sans'!important;    
    width: 75px!important;
	display: inline-block!important;
    background-color: #de3939!important;
    color: #fff!important;    
    box-sizing: border-box!important;
    text-align: center!important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li{border-bottom: 1px solid #eee;border-top: none;}
	.bx-wrapper {
    margin-bottom:10px!important;
	}
	.bx-wrapper .bx-controls-auto, .bx-wrapper .bx-pager{bottom: -10px!important}
	.head-h4{margin:0px;padding:10px;background-color: #eee;
    font: 800 14px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 1px solid #ddd;}
	.inner_collaps{float: right;
    background-color: #367fa8;
    font: 600 12px 'Open Sans';
    color: #fff;
    margin: 14px 30px 0 0;
    padding: 7px 15px 7px 15px;
    cursor: pointer;
    border-radius: 30px;
    margin-top: -35px;
    margin-right: 5px;
	}
	.inner_collaps:before{
	content: 'Collapse';
    }
	.Expndd:before {
    content: 'Expand!!'!important;
	}
	.ClRgt{text-align:center}
	.liright{padding: 25px 10px!important}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls.WtrTnkLvl div.LftHldr{width: 58%!important;}
	div.LiquidTank.Smll span.LiquidStatus{    right: -97px!important;font-size: 28px!important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.SctnVwAll{margin: 10px 10px 0 0;}
	.DshBrdSctnTtl{margin-bottom:10px!important}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr {
	background-color: #fff!important;
    box-shadow: none!important;
	border-radius: 10px;
	border: 1px solid #ccc;
	}
	.fire_waterpump {width:100%;margin-left:0%}
	.status-on{
	display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 7px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 60px!important;
    text-align: center!important;
}
.status-off{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 7px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 60px!important;
    text-align: center!important;
}
.status-off1{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 8px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 85px!important;
    text-align: center!important;
}
	.tank-title{color: #000!important;
    margin-left: 10px;
    margin-top: 15px;
    font-size: 14px;
    font: 600 18px 'Open Sans';}
	div.LiquidTank div.Liquid.l-75, div.LiquidTank.Smll div.Liquid.l-75 {
    height: 121px;
    background-color: rgba(0, 220, 95, 0.7);

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
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft, div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{padding:9px}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl {padding:10px}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: none !important;border-bottom: 1px solid #ddd;}
	.bx-wrapper .bx-prev{left: -28px !important;}
	.bx-wrapper .bx-next {right: -31px !important;}
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl{
	padding: 14px 0 9px 45px!important;
	}
	.imageadd img{ left: 0px!important;}
	
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3_fire') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="water" />
		
		</div>
		
		
		
		
			
			<!-- Fire pump code starts -->
			
			<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
			
           
                <div class="DshBrdSctnTtl" id="fire">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/Fire-Pump-C.png" width="40" />FIREPUMP</span>
                    <?php /*<span class="SctnVw Cllps" id="fpcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(1111)" id="device1111"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp device devicebox1111" id="devicebox1111">
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
						
                        <tr>
                            <td>
                                <span class="Txt Ttl">Jockey Pump</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
								
                                
								<span class="Txt Stts auto" id=""></span>
								
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
								
								<span class="status-off1">OFF</span>
								
                                
                            </td>
							
                            <td>
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">1 Min</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">2 Mins</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">12 Mins</span>
                            </td>
							
                        </tr>
						<tr>
                            <td>
                                <span class="Txt Ttl">Sprinkler Pump</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
								
                                
								<span class="Txt Stts auto" id=""></span>
								
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
								
								<span class="status-off1">OFF</span>
								
                                
                            </td>
							
                            <td>
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">1 Min</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">2 Mins</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">12 Mins</span>
                            </td>
							
                        </tr>
						
						<tr>
                            <td>
                                <span class="Txt Ttl">Hydrant Pump</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
								
                                
								<span class="Txt Stts auto" id=""></span>
								
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
								
								<span class="status-off1">OFF</span>
								
                                
                            </td>
							
                            <td>
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">1 Min</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">2 Mins</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">12 Mins</span>
                            </td>
							
                        </tr>
						<tr>
                            <td>
                                <span class="Txt Ttl">Diesel  Pump</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
								
                                
								<span class="Txt Stts auto" id=""></span>
								
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
								
								<span class="status-off1">OFF</span>
								
                                
                            </td>
							
                            <td>
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">1 Min</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">2 Mins</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">12 Mins</span>
                            </td>
							
                        </tr>
						
                       
                    </table>
                    <div class=" EnrgyMtrGuge" style="padding:0px;width:50%;float:left">

                        
                        <div id="container_speed_10">
                            
                        </div>
                       <!--  <div id="container-speed">
                            
                        </div> -->
                       
                    </div>
                   
                    <div class="childclass1" style="height:300px;width:50%;margin-top:28px">
                         <!-- <div  id="container_pressure">
                
						</div>  -->
						<div id="container_pressure_10">
                            
                        </div>
                    </div>
                   
					<div class="fire_sub">
						<div class="fire_dgset">
						   
							<div class="DshBrdSctnDtls" id="dgset">
							<div class="childclass">
							<div class="SctnDtlsHldr">
							<div class="SldrCntnr" style="border:none">
							<div class="SctnDtls DGGnrtrHldr">
							
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">Diesel Generator</span>
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
														
							<button class="button_red">OFF</button>
							
							</span>
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">0Ltrs</div></li>
							<li><div class="ClLft">Running Time</div><div class="ClRgt"></div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt">0Ltrs</div></li>
							<li><div class="ClLft">Available Fuel</div><div class="ClRgt">200Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt">0Ltrs</div></li>
							 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt">23 Volts</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2">
							<div class="LiquidTank Smll">
							<?php 
							/*$total_fuel=$dgdata[0]['fuelCapacity'];*/
							$total_fuel=500;
							$avial_fuel=$dgdata[0]['currentFuel'];
							$fuel=($avial_fuel/$total_fuel)*100;
							// $fuel=40;
							?>
								<div class="Liquid l-70"></div>
							
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
							
							</div>
							</div>
							</div>
							</div>
							
							</div>
						</div>
						<div class="fire_waterpump" style="width:39%;    margin-left: 6%;">
						<span class="SctnTtl">FireSump</span>
						<div>
						<div class="SctnDtlsHldr">
						<div class="SldrCntnr" style="border:none">
						<div class="SctnDtls WtrTnkLvl">
						<div class="TnksHldr">
						<div class="LftHldr">
						<div class="LiquidTank">
						<div class="Liquid Liquidhigh l-50"></div>
						</div>
						</div>
						<div class="RgtHldr">
						<div class="LiquidTank Smll">
						<?php 
							/*$total_level=$rec['Volume'];*/
							$total_level=200;
							$avial_level=$water_level_sen->Consumption;
							$level=($avial_level/$total_level)*100;
							// $fuel=40;
							?>
								<div class="Liquid Liquidhigh l-50"></div>
							
						
						<span class="LiquidStatus">50%</span>
						</div>
						</div>
						</div>
					   
						<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Total Capacity</div><div class="ClRgt">200KL</div></li>
						<li><div class="ClLft">Current Level</div><div class="ClRgt">100KL</div></li>
						<li><div class="ClLft">Filled</div><div class="ClRgt">50%</div></li>
						</ul>
						</div>
						</div>
						</div>
						</div>
							
						</div>
					</div>
                      <!-- DG Set code starts -->
                    
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
							
								<tr>
									<td class="Col-1">
										<span class="Txt Ttl">Sprinkler Jockey Pump</span>
									</td>
									<td class="Col-2">
										<span class="Txt" id="">10.8CU.M/HR/20HP</span>
									</td>
									<td class="Col-3">
										<span class="Txt" id="mhrs">8.5Kg/cm2</span>
									</td>
									<td class="Col-4">
										<span class="Txt" id="mhrht">6.5Kg/cm2</span>
									</td>
									<td class="Col-5">
										
										<span class="Txt Stts cutoff_color" id="mhrhy">6.5Kg/cm2</span>
										
									</td>
								</tr>
								<tr>
									<td class="Col-1">
										<span class="Txt Ttl">Main Sprinkler Pump
</span>
									</td>
									<td class="Col-2">
										<span class="Txt" id="">10.8CU.M/HR/20HP</span>
									</td>
									<td class="Col-3">
										<span class="Txt" id="mhrs">8.5Kg/cm2</span>
									</td>
									<td class="Col-4">
										<span class="Txt" id="mhrht">6Kg/cm2</span>
									</td>
									<td class="Col-5">
										
										<span class="Txt Stts Manual" id="mhrhy">Manual</span>
										
									</td>
								</tr>
								<tr>
									<td class="Col-1">
										<span class="Txt Ttl">Main Hydrant Pump</span>
									</td>
									<td class="Col-2">
										<span class="Txt" id="">10.8CU.M/HR/20HP</span>
									</td>
									<td class="Col-3">
										<span class="Txt" id="mhrs">8.5Kg/cm2</span>
									</td>
									<td class="Col-4">
										<span class="Txt" id="mhrht">5Kg/cm2</span>
									</td>
									<td class="Col-5">
										
										<span class="Txt Stts Manual" id="mhrhy">Manual</span>
										
									</td>
								</tr>
								<tr>
									<td class="Col-1">
										<span class="Txt Ttl">Diesel Pump
</span>
									</td>
									<td class="Col-2">
										<span class="Txt" id="">10.8CU.M/HR/20HP</span>
									</td>
									<td class="Col-3">
										<span class="Txt" id="mhrs">8.5Kg/cm2</span>
									</td>
									<td class="Col-4">
										<span class="Txt" id="mhrht">5Kg/cm2</span>
									</td>
									<td class="Col-5">
										
										<span class="Txt Stts Manual" id="mhrhy">Manual</span>
										
									</td>
								</tr>
								
							
						</table>
					</div>
					<!-- DG Set code ends -->
                                     
                </div>
            </div>
            <!-- Fire pump code ends -->
            <!-- stp start -->
             <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="stp">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/STP-Clr.png" width="40" />Sewage Treatment Plant</span>
                   
                    <span class="SctnVw Cllps dev" onclick="device(558)" id="device558"></span>
                     
<!--                     <span class="SctnVwAll Cllps FA" id="collapseall"></span>
 -->                </div>
                <div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;padding:15px;border-bottom: 1px solid #d0cfcf;">
                    <h4 class="head-h44">Tank - 01</h4>
                    <div class="subhead"></div>
                    <div class="small-box1">
                        <div class="toilet-head1">pH</div>
                        <div class="subhead"></div>
                        <div><br/>
                        
                        <input type="range" id="volume" value="7.32" name="volume" min="0" max="30"><br/>
                        <div class="ph-val">7.32<span class="superscript">1</span></div>
                        </div>
                    </div>
                    <div class="small-box1">
                        <div class="toilet-head1">Temperature</div>
                        <div class="subhead"></div>
                        <div><br/>
                        
                        <input type="range" id="volume" value="28.71" name="volume" min="0" max="120"><br/>
                        <div class="ph-val">28.71<span class="superscript">&#8451;</span></div>
                        </div>
                    </div>
                    <div class="small-box1">
                        <div class="toilet-head1">Water hardness</div>
                        <div class="subhead"></div>
                        <div><br/>
                        
                        <input type="range" id="volume" value="120" name="volume" min="0" max="120"><br/>
                        <div class="ph-val">120<span class="superscript">ppm</span></div>
                        </div>
                    </div>
                    <div class="small-box1">
                        <div class="toilet-head1">CODeq</div>
                        <div class="subhead"></div>
                        <div><br/>
                        
                        <input type="range" id="volume" value="138.51" name="volume" min="0" max="300"><br/>
                        <div class="ph-val">138.51<span class="superscript">mg/l</span></div>
                        </div>
                    </div>
                    <div class="small-box1">
                        <div class="toilet-head1">BODeq</div>
                        <div class="subhead"></div>
                        <div><br/>
                        
                        <input type="range" id="volume" value="24.76" name="volume" min="0" max="200"><br/>
                        <div class="ph-val">24.76<span class="superscript">mg/l</span></div>
                        </div>
                    </div>
                    
                    <div style="clear:both"></div>
                </div>
            
               
                
            </div>
            <!-- stp End -->
			<!-- water meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="hot_water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />ENERGY METER</span>
                    
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
                    <span class="SctnVw Cllps dev" onclick="device(557)" id="device557"></span>
                    
                    
                </div>
                <!-- floor -1---->
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
                <h4 class="head-h4">Floor - 1</h4>
                <span class="inner_collaps" onclick="device1(55791)" id="device55791"></span>
                <div class=" devicebox91">
                <div class="bxslider9" id="bxid">
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Raw Power <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        <li><div class="ClLft">Name</div><div class="ClRgt">UPS INCOMER-01</div></li><li><div class="ClLft">Consumed Active Energy</div><div class="ClRgt">382.0 kWh</div></li>
                        <li><div class="ClLft">Maximum Demand Kw</div><div class="ClRgt">0.0 Kw</div></li>
                        <li><div class="ClLft">Frequency</div><div class="ClRgt">50.0 Hz</div></li>

                        <li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border: 1px solid #ccc;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
                        <div class="em-disc1" style="display:none">
                        <li><div class="ClLft">Active 3-Phase Power</div><div class="ClRgt">0.6 kWh</div></li>
                        <li><div class="ClLft">Inductive 3-Phase Power</div><div class="ClRgt">0.0 kvarL </div></li>
                        <li><div class="ClLft">Capactive 3-Phase Power</div><div class="ClRgt">0.0 kvarC</div></li>
                        <li><div class="ClLft">Apparent 3-Phase Power</div><div class="ClRgt">0.8 kVA</div></li>
                        <li><div class="ClLft">3-Phase Power Factor</div><div class="ClRgt">42949670.0 PF</div></li>
                        
                        <li><div class="ClLft">Maximum Demand kVA</div><div class="ClRgt">0.0 kVA</div></li>
                        <li><div class="ClLft">L1 Phase Voltage</div><div class="ClRgt">229.5 V</div></li>
                        <li><div class="ClLft">L2 Phase Voltage</div><div class="ClRgt">230.3 V</div></li>
                        <li><div class="ClLft">L3 Phase Voltage</div><div class="ClRgt">229.4 V</div></li>
                        <li><div class="ClLft">L1 Current</div><div class="ClRgt">1.5 A</div></li>
                        <li><div class="ClLft">L2 Current</div><div class="ClRgt">0.7 A</div></li>
                        <li><div class="ClLft">L3 Current</div><div class="ClRgt">1.2 A</div></li>
                        
                        <li><div class="ClLft">Netural Current</div><div class="ClRgt">0.0 A</div></li>
                        <li class="em-hide1" style="background-color:#eee;display:none"><div class="ClLft" onclick="em(1)">Hide Details </div><div class="ClRgt"></div></li>
                        </div>
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Generator <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        
                        <li><div class="ClLft">Name</div><div class="ClRgt">UPS INCOMER-02</div></li>
                        <li><div class="ClLft">Consumed Active Energy</div><div class="ClRgt">1428.0 kWh</div></li>
                        <li><div class="ClLft">Maximum Demand Kw</div><div class="ClRgt">0.0 Kw</div></li>
                        <li><div class="ClLft">Frequency</div><div class="ClRgt">50.0 Hz</div></li>
                        <li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border: 1px solid #ccc;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
                        <div class="em-disc2" style="display:none">
                        <li><div class="ClLft">Active 3-Phase Power</div><div class="ClRgt">2.4 kWh</div></li>
                        <li><div class="ClLft">Inductive 3-Phase Power</div><div class="ClRgt">0.0 kvarL </div></li>
                        <li><div class="ClLft">Capactive 3-Phase Power</div><div class="ClRgt">0.0 kvarC</div></li>
                        <li><div class="ClLft">Apparent 3-Phase Power</div><div class="ClRgt">0.8 kVA</div></li>
                        <li><div class="ClLft">3-Phase Power Factor</div><div class="ClRgt">42949670.0 PF</div></li>
                        
                        <li><div class="ClLft">Maximum Demand kVA</div><div class="ClRgt">0.0 kVA</div></li>
                        <li><div class="ClLft">L1 Phase Voltage</div><div class="ClRgt">229.5 V</div></li>
                        <li><div class="ClLft">L2 Phase Voltage</div><div class="ClRgt">230.3 V</div></li>
                        <li><div class="ClLft">L3 Phase Voltage</div><div class="ClRgt">229.4 V</div></li>
                        <li><div class="ClLft">L1 Current</div><div class="ClRgt">1.5 A</div></li>
                        <li><div class="ClLft">L2 Current</div><div class="ClRgt">0.7 A</div></li>
                        <li><div class="ClLft">L3 Current</div><div class="ClRgt">1.2 A</div></li>
                        
                        <li><div class="ClLft">Netural Current</div><div class="ClRgt">0.0 A</div></li>
                        <li class="em-hide2" style="background-color:#eee;display:none"><div class="ClLft" onclick="em(2)">Hide Details </div><div class="ClRgt"></div></li>
                        </div>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Solar <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        <li><div class="ClLft">Name</div><div class="ClRgt">UPS INCOMER-01</div></li>
                        <li><div class="ClLft">Consumed Active Energy</div><div class="ClRgt">5.0 kWh</div></li>
                        <li><div class="ClLft">Maximum Demand Kw</div><div class="ClRgt">0.0 Kw</div></li>
                        <li><div class="ClLft">Frequency</div><div class="ClRgt">50.0 Hz</div></li>
                        <li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border: 1px solid #ccc;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
                        <div class="em-disc3" style="display:none">
                        <li><div class="ClLft">Active 3-Phase Power</div><div class="ClRgt">0.0 kWh</div></li>
                        <li><div class="ClLft">Inductive 3-Phase Power</div><div class="ClRgt">0.0 kvarL </div></li>
                        <li><div class="ClLft">Capactive 3-Phase Power</div><div class="ClRgt">0.0 kvarC</div></li>
                        <li><div class="ClLft">Apparent 3-Phase Power</div><div class="ClRgt">0.8 kVA</div></li>
                        <li><div class="ClLft">3-Phase Power Factor</div><div class="ClRgt">42949670.0 PF</div></li>
                        
                        <li><div class="ClLft">Maximum Demand kVA</div><div class="ClRgt">0.0 kVA</div></li>
                        <li><div class="ClLft">L1 Phase Voltage</div><div class="ClRgt">229.5 V</div></li>
                        <li><div class="ClLft">L2 Phase Voltage</div><div class="ClRgt">230.3 V</div></li>
                        <li><div class="ClLft">L3 Phase Voltage</div><div class="ClRgt">229.4 V</div></li>
                        <li><div class="ClLft">L1 Current</div><div class="ClRgt">1.5 A</div></li>
                        <li><div class="ClLft">L2 Current</div><div class="ClRgt">0.7 A</div></li>
                        <li><div class="ClLft">L3 Current</div><div class="ClRgt">1.2 A</div></li>
                        
                        <li><div class="ClLft">Netural Current</div><div class="ClRgt">0.0 A</div></li>
                        <li class="em-hide3" style="background-color:#eee;display:none"><div class="ClLft" onclick="em(3)">Hide Details </div><div class="ClRgt"></div></li>
                        </div>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                </div>
                </div>
                   
                </div>
                <!-- floor -2---->
                
            </div>
            <!-- water meter ends -->
		<!-- water meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="hot_water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="40" />FLOW METER</span>
                    
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
                    <span class="SctnVw Cllps dev" onclick="device(557)" id="device557"></span>
                    
                    
                </div>
                <!-- floor -1---->
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
                <h4 class="head-h4">Floor - 1</h4>
                <span class="inner_collaps" onclick="device1(55791)" id="device55791"></span>
                <div class=" devicebox91">
                <div class="bxslider9" id="bxid">
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 01 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">200KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">195KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">201KL</div></li>
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 02 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                         <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">190KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">185KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">200KL</div></li>
                        
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 03 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">200KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">195KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">201KL</div></li>
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 04 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">170KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">190KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">187KL</div></li>
                        
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                </div>
                </div>
                   
                </div>
                <!-- floor -2---->
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
                <h4 class="head-h4">Floor - 2</h4>
                <span class="inner_collaps" onclick="device1(92)" id="device92"></span>
                <div class=" devicebox92">
                <div class="bxslider9" id="bxid">
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 01 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                         <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">250KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">245KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">250KL</div></li>
                        
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 02 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
 <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">200KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">195KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">201KL</div></li>
                        
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 03 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                        <li><div class="ClLft ">Today's Reading</div><div class="ClRgt">0</div></li>
                        <li><div class="ClLft ">Yesterday's Reading</div><div class="ClRgt">0</div></li>
                        <li><div class="ClLft ">Average Reading</div><div class="ClRgt">0</div></li>
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div style="width:320px">
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <span class="SctnTtl" style="line-height: 45px;">Meter 04 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="60" /></span>
                    <ul class="SctnDtlsGrdTbl">
                        
                         <li><div class="ClLft ">Total Consumption</div><div class="ClRgt">200KL</div></li>
                        <li><div class="ClLft ">Yesterday Consumption</div><div class="ClRgt">195KL</div></li>
                        <li><div class="ClLft ">Weekly Average</div><div class="ClRgt">201KL</div></li>
                        
                        
                        
                        
                        
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                </div>
                </div>
                   
                </div>
            </div>
            <!-- water meter ends -->
        <?php $this->load->view('common/footer3') ?>
            
        </div>
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
 
$('.bxslider9').bxSlider({
        slideWidth: 293,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
$('.bxslider90').bxSlider({
        slideWidth: 350,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
// firepump pressure
var fdps1=[];
    var fdps2=[];      
    fdps1=[7.38, 7.37, 7.36, 7.35, 7.32, 7.31, 7.3, 7.3, 7.27, 7.26, 7.25, 7.24, 7.22, 7.2, 7.19, 7.17, 7.17, 7.15, 7.14, 7.14, 7.13, 7.12, 7.11, 7.11, 7.1, 7.08, 7.08, 6.85, 6.99, 6.46, 8.27, 8.24, 8.22, 8.22, 8.2, 8.19, 8.17, 8.15, 8.14, 8.12, 8.11, 8.1, 8.09, 8.07, 8.06, 8.05, 8.03, 8.02, 8, 8, 7.98, 7.96, 7.96, 7.94, 7.93, 7.91, 7.9, 7.88, 7.87, 7.86, 7.84, 7.84, 7.82, 7.81, 7.79, 7.78, 7.78, 7.77, 7.75, 7.74, 7.73, 7.71, 7.7, 7.68, 7.68, 7.66, 7.65, 7.64, 7.62, 7.61, 7.59, 7.58, 7.57, 7.56, 7.55, 7.54, 7.52, 7.51, 7.5, 7.49, 7.48, 7.46, 7.46, 7.44];
    fdps2=["05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"]
    
    
var t1=parseFloat(fdps1[fdps1.length-1]);
var pressurecontainer1="container_pressure_10";
var speedcontainer1="container_speed_10";

Highcharts.chart(pressurecontainer1, {
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

                      credits: {
                          enabled: false
                      },
      
    title: {
        text: ''
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: fdps2
    },
     yAxis: {
      title: {      
      text: 'Bar'     
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: fdps1
        
    }],
    responsive: {
    rules: [{
      condition: {
        
        maxHeight:100
      }
    }]
    }
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
            y: -170
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
var chartSpeed = Highcharts.chart(speedcontainer1, Highcharts.merge(gaugeOptions, {
    yAxis: {
    
    title: {
      text: 'Pressure in Bar'
        }
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
      data: [t1],
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


 function em(id){ 	
	$('.em-disc'+id).toggle('slow'); 
	$('.em'+id).hide();
	$('.em-hide'+id).show();
 }
 function device(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
			// alert("aaaa");
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
			// alert("bbb");
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
        }
}
function device1(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
            // $(".inner_collaps").addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
            // $(".inner_collaps").removeClass("Expndd");
        }
}
function deviceall(){
	if($( ".device" ).is( ":visible" ))
        {
			
            $('.device').hide('slow'); 
            $(".deviceall").addClass("Expnd");
			$(".dev").addClass("Expndd");
        }
        else if($( ".device" ).is( ":hidden" ))
        {
			
            $('.device').show('slow'); 
            $(".deviceall").removeClass("Expnd");
			$(".dev").removeClass("Expndd");
        }
	//$('.device').hide();
}
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
 </script>	
</html>

