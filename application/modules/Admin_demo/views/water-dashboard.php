<?php //echo "jjj";die();?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css"> -->
  <style>
	
	input[type="checkbox"][readonly] {
  pointer-events: none;
}
	
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
	div.LiquidTank.Smll span.LiquidStatus{ right: -97px!important;font-size: 26px!important;}
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
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="water" />
		
		</div>
		
		
		<?php if(modules::run('Admin/Site/authlink','water_Water-Level')){ ?>
		<!-- Bore Wells code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/water-level.png" width="30" />WATER TANK LEVELS</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
					
                </div>
				
				
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
                <?php if(count($waterlevel_independent_data)>0){ ?>
                <h4 class="head-h4">Terrace</h4>
                <div class=" devicebox5551">
				
				<div class="bxslider555" id="bxid">
					
					
                <?php for ($i=0; $i < count($waterlevel_independent_data); $i++) 
         				 {
							  ?>	
					
						<div class="fire_waterpump">
						<div class="SctnDtlsHldr">
						<div class="SldrCntnr" style="border: 1px solid #ccc;">
						<div class="SctnDtls WtrTnkLvl">
						<div class="TnksHldr">
						<div class="LftHldr" style="margin-top:4%">
						<div class="LiquidTank">
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_independent_data[$i]['filledpercent_1'];?>"></div>
						</div>
						
						</div>
						
						<div class="RgtHldr" style="margin-top:4%">
						<div class="LiquidTank Smll">
						
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_independent_data[$i]['filledpercent_1'];?>"></div>
						<span class="LiquidStatus"><?php echo $waterlevel_independent_data[$i]['filledpercent_1'];?>%</span>
						</div>
						</div>
						<span class="SctnTtl tank-title"><?php echo $waterlevel_independent_data[$i]['meter'];?></span>
						</div>
					   
						<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Total Capacity</div><div class="ClRgt"><?php echo $waterlevel_independent_data[$i]['capacity'];  ?> KL</div></li>
						<li><div class="ClLft">Current Level</div><div class="ClRgt"><?php echo $waterlevel_independent_data[$i]['currentlevel'];  ?> KL</div></li>
						<li><div class="ClLft">Filled</div><div class="ClRgt"><?php echo $waterlevel_independent_data[$i]['filledpercent_1'];?>%</div></li>
						</ul>
						</div>
						</div>
						</div>
						</div>
						
                        <?php }?>
					
					
					
					
					
					
					
				</div>
                
				</div>
                <?php }?>
                <h4 class="head-h4">Basement</h4>
				

				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				
				<div class="bxslider555" id="bxid">
					
					
                <?php for ($i=0; $i < count($waterlevel_data); $i++) 
         				 {
							  ?>	
					
						<div class="fire_waterpump">
						<div class="SctnDtlsHldr">
						<div class="SldrCntnr" style="border: 1px solid #ccc;">
						<div class="SctnDtls WtrTnkLvl">
						<div class="TnksHldr">
						<div class="LftHldr" style="margin-top:4%">
						<div class="LiquidTank">
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_data[$i]['filledpercent_1'];?>"></div>
						</div>
						
						</div>
						
						<div class="RgtHldr" style="margin-top:4%">
						<div class="LiquidTank Smll">
						
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_data[$i]['filledpercent_1'];?>"></div>
						<span class="LiquidStatus"><?php echo $waterlevel_data[$i]['filledpercent_1'];?>%</span>
						</div>
						</div>
						<span class="SctnTtl tank-title"><?php echo $waterlevel_data[$i]['meter'];?></span>
						</div>
					   
						<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Total Capacity</div><div class="ClRgt"><?php echo $waterlevel_data[$i]['capacity'];  ?> KL</div></li>
						<li><div class="ClLft">Current Level</div><div class="ClRgt"><?php echo $waterlevel_data[$i]['currentlevel'];  ?> KL</div></li>
						<li><div class="ClLft">Filled</div><div class="ClRgt"><?php echo $waterlevel_data[$i]['filledpercent_1'];?>%</div></li>
						</ul>
						</div>
						</div>
						</div>
						</div>
						
                        <?php }?>
					
					
					
					
					
					
					
				</div>
                
				</div>
                   
                </div>
				
				</div>
            <!-- Bore Wells code ends -->
            <?php } ?>
            <?php if(modules::run('Admin/Site/authlink','water_linepressure')){ ?>
			<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="line">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/line.png" width="40" />LINE PRESSURE</span>
                    <?php /*<span class="SctnVw Cllps" id="fpcollapse"></span>*/?>
                    <span class="SctnVw Cllps dev"onclick="device1(558)" id="device558"></span>                </div>
                
				<div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;border-bottom: 1px solid #d0cfcf;padding:10px">
				<h4 class="head-h4">Line Pressure - 1</h4>
                    
                    <div style="width:32%;float:left;border: 1px solid #ddd;border-radius: 10px;margin-top: 24px;    margin-left:10px;padding-top: 4px;background-color:#f9f9f9;">
					<div class="SctnDtlsHldr">					
					<div class="SctnDtls BorewellHldr">
					<ul class="SctnDtlsGrdTbl lpgdiv">
                            <li>
                                <div class="ClLft liright">Present Pressure</div>
                                <div class="ClRgt liright">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft liright">Min Threshold Pressure</div>
                                <div class="ClRgt liright">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft liright">Max Threshold Pressure</div>
                                <div class="ClRgt liright">30 Kgs</div>
                            </li>
                            
                        </ul>
						<?php /*<div id="llpg1"></div>*/?>
					</div>
					</div>					
					</div>
					
					<div style="width:33%;float:left">
					<div class="SctnDtlsHldr">					
					<div id="container_speed_9" style="height:230px;margin-top: 15px;border: 1px solid #ddd;border-radius: 10px;"></div>
					</div>					
					</div>
                    
                   
					<div style="">
					<div class="SctnDtlsHldr">					
						<div id="container_pressure_9" style="width:33%;height:230px;margin-top: 15px;border: 1px solid #ddd;border-radius: 10px;"></div>
					
					</div>					
					</div>
					
                      
                </div>
            </div>
			<!-- BTU code starts -->
			<?php } ?>
            <?php if(modules::run('Admin/Site/authlink','water_motorrunninghours')){ ?>
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="motor">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/motor-c.png" width="40" />MOTOR MONITORING</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox556" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
				<div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MOTOR 01 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Motor Status</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Yesterday's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Weekly Average Running Hours</div><div class="ClRgt">0</div></li>
						
						
						<?php /*<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
						</div>*/?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MOTOR 02 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Motor Status</div><div class="ClRgt">
                        
                                    <span class="status-off">OFF</span>
                                   
                        </div></li>
						<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Yesterday's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Weekly Average Running Hours</div><div class="ClRgt">0</div></li>
						
						<?php /*
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
						</div>*/?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MOTOR 03 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Motor Status</div><div class="ClRgt">
                       
                                        <span class="status-on">ON</span>
                                       
                        </div></li>
						<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Yesterday's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Weekly Average Running Hours</div><div class="ClRgt">0</div></li>
						
						<?php /*
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
						</div>*/?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MOTOR 04 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Motor Status</div><div class="ClRgt">
                       
                                    <span class="status-off">OFF</span>
                                    
                        </div></li>
						<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Yesterday's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Weekly Average Running Hours</div><div class="ClRgt">0</div></li>
						
						<?php /*
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
						</div>*/?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MOTOR 05 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Motor Status</div><div class="ClRgt">
                       
                                        <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Yesterday's Running Hours</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft">Weekly Average Running Hours</div><div class="ClRgt">0</div></li>
						
						<?php /*
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
						</div>*/?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- Bore Wells code ends -->
            <?php } ?>
            <?php if(modules::run('Admin/Site/authlink','water_Flow-Meter')){ ?>
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="fmetr">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Flow-Meter-Clr.png" width="40" />FLOW METER</span>
					<!-- MUNICIPAL WATER INLET -->
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox556" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
				<div class="bxslider556" id="bxid">
					
                <?php for ($i=0; $i < count($flowmeter_data); $i++) 
         				 {
							  ?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl"><?php echo $flowmeter_data[$i]['meter']; ?> </span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Today's Inflow</div><div class="ClRgt"><?php echo $flowmeter_data[$i]['todayconsumption']; ?>KL</div></li>
						<li><div class="ClLft">Yesterday Inflow</div><div class="ClRgt"><?php echo $flowmeter_data[$i]['yesterdayconsumption']; ?>KL</div></li>
						<li><div class="ClLft">Weekly Average</div><div class="ClRgt"><?php echo $flowmeter_data[$i]['weeklyavg']; ?>KL</div></li>
						
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					<?php   } ?> ?>
					

					
					
				</div>
                   
                </div>
				
				

            </div>
            <?php } ?>
            <?php if(modules::run('Admin/Site/authlink','water_Water-Meter')){ ?>
             <!-- water meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="hot_water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-C.png" width="40" />WATER METER</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(557)" id="device557"></span>
					
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				<!-- <span class="inner_collaps" onclick="device1(55791)" id="device55791"></span> -->
				<div class=" devicebox91">
				<div class="bxslider99" id="bxid">
				<?php foreach($water_meter_data as $rec){ ?>
					<div style="width:340px">
                        <div class="WtrMngtDtlsHldr" style="display:block">
                            <div class="WtrLnDtls ">
                                <span class="LnName MunWtrLn"><?php echo $rec['meter']; ?></span>
                                <div class="InnrDtlsMnDv">
                                    <div class="TxtDtlsHldr">
                                        <span class="DtlsTxt"><?php echo $rec['today_reading']; ?></span>
                                        <span class="DtlsTxtTtl">Today’s Reading</span>
                                    </div>
                                    <div class="TxtDtlsHldr">
                                        <!-- <img src="Images/WaterMeterSample.jpg" class="ImgHldr" /> -->
                                        <img src="<?php echo site_url() ?>asset/admin/scheduled_doc/<?php echo  $rec['today_reading_photo'] ?>" class="ImgHldr" /> 
                                        <a href="<?php echo site_url() ?>asset/admin/scheduled_doc/<?php echo  $rec['today_reading_photo'] ?> " target="_blank">View</a>
                                        <!-- <a href="#" class="TxtLnk">View</a> -->
                                    </div>
                                </div>
                                <div class="InnrDtlsMnDv">
                                    <div class="TxtDtlsHldr">
                                        <span class="DtlsTxt"><?php echo $rec['yesterday_reading']; ?></span>
                                        <span class="DtlsTxtTtl">Yesterday’s Reading</span>
                                    </div>
                                    <div class="TxtDtlsHldr">
                                        <span class="DtlsTxt"><?php echo $rec['difference']; ?></span>
                                        <span class="DtlsTxtTtl">Difference</span>
                                    </div>
                                </div>
                                <div class="InnrDtlsMnDv">
                                    <div class="TxtDtlsHldr">
                                        <span class="DtlsTxt"><?php echo $rec['time']; ?></span>
                                        <span class="DtlsTxtTtl">Reading Time</span>
                                    </div>
                                    <div class="TxtDtlsHldr">
                                        <span class="DtlsTxt"><?php echo $rec['emp_name']; ?></span>
                                        <span class="DtlsTxtTtl">Recorded By</span>
                                    </div>
                                </div>
                                <div class="InnrDtlsMnDv BtnHldr">
                                    <div class="TxtDtlsHldr">
                                        <span class="DtlsTxtVrfctn NtVrd">Not Verified</span>
                                    </div>
                                    <div class="TxtDtlsHldr">
                                        <input type="button" class="VrEdBtn" value="Verfiy/ Edit" />
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<?php }?>
					
					
					
					
				</div>
				</div>
                   
                </div>
               
            </div>
            <!-- water meter ends -->
			<?php } ?>
            <?php if(modules::run('Admin/Site/authlink','water_firepump')){ ?>
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
            <?php } ?>
            <?php if(modules::run('Admin/Site/authlink','water_firepump1')){ ?>
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

                        
                        <div id="container_speed_11">
                            
                        </div>
                       <!--  <div id="container-speed">
                            
                        </div> -->
                       
                    </div>
                   
                    <div class="childclass1" style="height:300px;width:50%;margin-top:28px">
                         <!-- <div  id="container_pressure">
                
						</div>  -->
						<div id="container_pressure_11">
                            
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
            <?php } ?>
			<?php if(modules::run('Admin/Site/authlink','water_hydropnematicpumps')){ ?>
			<!-- Hydero phonematic start -->
			<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">          
                <div class="DshBrdSctnTtl" id="hydro1">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/HydroPnematicSystem-Clr.png" width="40" height="80" />
					Hydro Pnematic System</span>
                    <?php /*<span class="SctnVw Cllps" id="fpcollapse"></span>*/?>
				<span class="SctnVw Cllps dev" onclick="device(1112)" id="device1112"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp device devicebox1112" id="devicebox1112">
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
                                <span class="Txt Ttl">Pump1</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
                
                                
                <span class="Txt Stts auto" id=""></span>
                
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
                
                <span class="status-off">OFF</span>
                
                                
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
                                <span class="Txt Ttl">Pump2</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
                
                                
                <span class="Txt Stts auto" id=""></span>
                
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
                
                <span class="status-off">OFF</span>
                
                                
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
                                <span class="Txt Ttl">Pump3</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
                
                                
                <span class="Txt Stts auto" id=""></span>
                
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                               
                
                <span class="status-off">OFF</span>
                
                                
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
					<div style="width:32%;float:left;border: 1px solid #ddd;border-radius: 10px;margin-top: 24px;height:230px;    margin-left:10px;padding-top: 4px;background-color:#f9f9f9;">
					<div class="SctnDtlsHldr">					
					<div class="SctnDtls BorewellHldr">
					<ul class="SctnDtlsGrdTbl lpgdiv">
                            <li>
                                <div class="ClLft liright">Present Pressure</div>
                                <div class="ClRgt liright">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft liright">Min Threshold Pressure</div>
                                <div class="ClRgt liright">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft liright">Max Threshold Pressure</div>
                                <div class="ClRgt liright">30 Kgs</div>
                            </li>
                            
                        </ul>
						<?php /*<div id="llpg1"></div>*/?>
					</div>
					</div>					
					</div>
                     <div class=" EnrgyMtrGuge" style="padding:0px;width:33%;float:left;margin-top:20px">

                        
                        <div id="container_speed_13" style="height:230px;border: 1px solid #ddd;border-radius: 10px;margin:10px">
                            
                        </div>
                       <!--  <div id="container-speed">
                            
                        </div> -->
                       
                    </div>
                   
                    <div class="childclass1" style="height:260px;width:33%;margin-top:28px">
                         <!-- <div  id="container_pressure">
                
					</div>  -->
					<div id="container_pressure_13" style="height:230px;border: 1px solid #ddd;border-radius: 10px;">
                            
                        </div>
                    </div>
					
                   
          
                      
                </div>
            </div>
           
			<!-- Hydro End -->
			<?php } ?>
			<?php if(modules::run('Admin/Site/authlink','savege_plant')){ ?>
			<!-- Ventilator start -->
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
            <!-- Ventilation End -->
			<?php } ?>
			<?php if(modules::run('Admin/Site/authlink','boiler')){ ?>
			<!-- Boiler meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="boilers">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="40" />Boilers</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					<span class="SctnVw Cllps dev" onclick="device(8)" id="device8"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox8"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Basement - 1</h4>
				<span class="inner_collaps" onclick="device1(81)" id="device81"></span>
				<div class=" devicebox81">
				<div class="bxslider8" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-working">ON</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Set Temp.</div><div class="ClRgt">90 degree</div></li>
						<li><div class="ClLft">Avg. Temp.</div><div class="ClRgt">90 degree</div></li>
						<li><div class="ClLft">Avg.Energy Consum.</div><div class="ClRgt">300.02 Watt</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-stopped">OFF</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						
						<li><div class="ClLft">Set Temp.</div><div class="ClRgt">-- degree</div></li>
						<li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">21 degree</div></li>
						<li><div class="ClLft">Avg.Energy Consum.</div><div class="ClRgt">400 Watt</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-working">ON</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Set Temp.</div><div class="ClRgt">90 degree</div></li>
						<li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degree</div></li>
						<li><div class="ClLft">Avg.Energy Consum.</div><div class="ClRgt">800 Watts</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-working">ON</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Set Temp.</div><div class="ClRgt">90 degree</div></li>
						<li><div class="ClLft">Avg. Temp.</div><div class="ClRgt">90 degree</div></li>
						<li><div class="ClLft">Avg.Energy Consum.</div><div class="ClRgt">300.02 Watt</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
              
            </div>
            <!-- Boiler meter ends -->
            <?php } ?>
			<?php if(modules::run('Admin/Site/authlink','hotwater')){ ?>
            <!-- Hotwater meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="hot_water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="40" />Hot Water Tanks</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(9)" id="device9"></span>
					
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Tower-1 Roof</h4>
				<span class="inner_collaps" onclick="device1(91)" id="device91"></span>
				<div class=" devicebox91">
				<div class="bxslider9" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
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
				<h4 class="head-h4">Tower-2 Roof</h4>
				<span class="inner_collaps" onclick="device1(92)" id="device92"></span>
				<div class=" devicebox92">
				<div class="bxslider9" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 45px;">Tank 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Temp</div><div class="ClRgt">92 degrees</div></li><li><div class="ClLft">Avg.Temp.</div><div class="ClRgt">90 degrees</div></li>
						<li><div class="ClLft">Total Volume</div><div class="ClRgt">3000 Ltrs</div></li>
						<li><div class="ClLft">Curr.Pressure</div><div class="ClRgt">800 PSI</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
            </div>
            <!-- Hotwater meter ends -->
		<?php }?>
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    		<!-- btu -->
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BTU 01 </h4>
        </div>
        <div class="modal-body">
			<table class="table">
			  
			  <tbody>
				<tr>
				  <th scope="row">Energy Consumption</th>
				  <td>0.0 kWh</td>
				  
				</tr>
				<tr>
				  <th scope="row">Volume</th>
				  <td>0.0 M^3</td>
				 
				</tr>
				<tr>
				  <th scope="row">CHW Inlet Temperature</th>
				  <td>0.0 &#8451; </td>
				 
				</tr>
				<tr>
				  <th scope="row">CHW Outlet Temperature</th>
				  <td>0.0 &#8451; </td>
				 
				</tr>
				<tr>
				  <th scope="row">CHW Delta Temperature</th>
				  <td>0.0 &#8451; </td>
				 
				</tr>
				<tr>
				  <th scope="row">Present Load</th>
				  <td>0.0 Kw</td>
				 
				</tr>
				<tr>
				  <th scope="row">Volume Flow</th>
				  <td>0.0 L/Hr</td>
				 
				</tr>
				
				
			  </tbody>
			</table>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
    </div>
	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EM 01 <span style="font-size:12px">(UPS INCOMER-01)</span></h4>
        </div>
        <div class="modal-body">
			<table class="table">
			  
			  <tbody>
				<tr>
				  <th scope="row">Consumed Active Energy</th>
				  <td>5.0 kWh</td>
				  
				</tr>
				<tr>
				  <th scope="row">Active 3-Phase Power</th>
				  <td>0.0 kWh</td>
				 
				</tr>
				<tr>
				  <th scope="row">Inductive 3-Phase Power</th>
				  <td>0.0 kvarL</td>
				 
				</tr>
				<tr>
				  <th scope="row">Capactive 3-Phase Power</th>
				  <td>0.0 kvarL</td>
				 
				</tr>
				<tr>
				  <th scope="row">Apparent 3-Phase Power</th>
				  <td>0.8 kVA</td>
				 
				</tr>
				<tr>
				  <th scope="row">3-Phase Power Factor</th>
				  <td>42949670.0 PF</td>
				 
				</tr>
				<tr>
				  <th scope="row">Maximum Demand Kw</th>
				  <td>0.0 kw</td>
				 
				</tr>
				<tr>
				  <th scope="row">Maximum Demand kVA</th>
				  <td>0.0 kVA</td>
				 
				</tr>
				<tr>
				  <th scope="row">L1 Phase Voltage</th>
				  <td>229 v</td>
				 
				</tr>
				<tr>
				  <th scope="row">L2 Phase Voltage</th>
				  <td>230 v</td>
				 
				</tr>
				<tr>
				  <th scope="row">L3 Phase Voltage</th>
				  <td>229 v</td>
				 
				</tr>
				<tr>
				  <th scope="row">L1 Current</th>
				  <td>1.5 A</td>
				 
				</tr>
				<tr>
				  <th scope="row">L2 Current</th>
				  <td>0.5 A</td>
				 
				</tr>
				<tr>
				  <th scope="row">L3 Current</th>
				  <td>1.7 A</td>
				 
				</tr>
				<tr>
				  <th scope="row">Frequency</th>
				  <td>50 Hz</td>
				 
				</tr>
				<tr>
				  <th scope="row">Netural Current</th>
				  <td>0.0 A</td>
				 
				</tr>
				
			  </tbody>
			</table>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>

      
      
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

<?php if(modules::run('Admin/Site/authlink','water_linepressure')){ ?>
 var dps1=[];
    var dps2=[];      
    dps1=[7.38, 7.37, 7.36, 7.35, 7.32, 7.31, 7.3, 7.3, 7.27, 7.26, 7.25, 7.24, 7.22, 7.2, 7.19, 7.17, 7.17, 7.15, 7.14, 7.14, 7.13, 7.12, 7.11, 7.11, 7.1, 7.08, 7.08, 6.85, 6.99, 6.46, 8.27, 8.24, 8.22, 8.22, 8.2, 8.19, 8.17, 8.15, 8.14, 8.12, 8.11, 8.1, 8.09, 8.07, 8.06, 8.05, 8.03, 8.02, 8, 8, 7.98, 7.96, 7.96, 7.94, 7.93, 7.91, 7.9, 7.88, 7.87, 7.86, 7.84, 7.84, 7.82, 7.81, 7.79, 7.78, 7.78, 7.77, 7.75, 7.74, 7.73, 7.71, 7.7, 7.68, 7.68, 7.66, 7.65, 7.64, 7.62, 7.61, 7.59, 7.58, 7.57, 7.56, 7.55, 7.54, 7.52, 7.51, 7.5, 7.49, 7.48, 7.46, 7.46, 7.44];
    dps2=["05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"]
    
    
var t=parseFloat(dps1[dps1.length-1]);
var pressurecontainer="container_pressure_9";
var speedcontainer="container_speed_9";

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
var chartSpeed = Highcharts.chart(speedcontainer, Highcharts.merge(gaugeOptions, {
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
<?php }?>
<?php if(modules::run('Admin/Site/authlink','water_firepump')){ ?>
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
<?php }?>
<?php if(modules::run('Admin/Site/authlink','water_firepump1')){ ?>
// firepump pressure
var fdps1=[];
    var fdps2=[];      
    fdps1=[7.38, 7.37, 7.36, 7.35, 7.32, 7.31, 7.3, 7.3, 7.27, 7.26, 7.25, 7.24, 7.22, 7.2, 7.19, 7.17, 7.17, 7.15, 7.14, 7.14, 7.13, 7.12, 7.11, 7.11, 7.1, 7.08, 7.08, 6.85, 6.99, 6.46, 8.27, 8.24, 8.22, 8.22, 8.2, 8.19, 8.17, 8.15, 8.14, 8.12, 8.11, 8.1, 8.09, 8.07, 8.06, 8.05, 8.03, 8.02, 8, 8, 7.98, 7.96, 7.96, 7.94, 7.93, 7.91, 7.9, 7.88, 7.87, 7.86, 7.84, 7.84, 7.82, 7.81, 7.79, 7.78, 7.78, 7.77, 7.75, 7.74, 7.73, 7.71, 7.7, 7.68, 7.68, 7.66, 7.65, 7.64, 7.62, 7.61, 7.59, 7.58, 7.57, 7.56, 7.55, 7.54, 7.52, 7.51, 7.5, 7.49, 7.48, 7.46, 7.46, 7.44];
    fdps2=["05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"]
    
    
var t1=parseFloat(fdps1[fdps1.length-1]);
var pressurecontainer1="container_pressure_11";
var speedcontainer1="container_speed_11";

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
<?php }?>
<?php if(modules::run('Admin/Site/authlink','water_hydropnematicpumps')){ ?>
// Hydrovar pdps1=[];
    var pdps2=[];      
    pdps1=[7.38, 7.37, 7.36, 7.35, 7.32, 7.31, 7.3, 7.3, 7.27, 7.26, 7.25, 7.24, 7.22, 7.2, 7.19, 7.17, 7.17, 7.15, 7.14, 7.14, 7.13, 7.12, 7.11, 7.11, 7.1, 7.08, 7.08, 6.85, 6.99, 6.46, 8.27, 8.24, 8.22, 8.22, 8.2, 8.19, 8.17, 8.15, 8.14, 8.12, 8.11, 8.1, 8.09, 8.07, 8.06, 8.05, 8.03, 8.02, 8, 8, 7.98, 7.96, 7.96, 7.94, 7.93, 7.91, 7.9, 7.88, 7.87, 7.86, 7.84, 7.84, 7.82, 7.81, 7.79, 7.78, 7.78, 7.77, 7.75, 7.74, 7.73, 7.71, 7.7, 7.68, 7.68, 7.66, 7.65, 7.64, 7.62, 7.61, 7.59, 7.58, 7.57, 7.56, 7.55, 7.54, 7.52, 7.51, 7.5, 7.49, 7.48, 7.46, 7.46, 7.44];
    pdps2=["05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"]
    
    
var t2=parseFloat(pdps1[pdps1.length-1]);
var pressurecontainer2="container_pressure_13";
var speedcontainer2="container_speed_13";

Highcharts.chart(pressurecontainer2, {
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
      text: ''      
    },
      categories: pdps2
    },
     yAxis: {
      title: {      
      text: 'Bar'     
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: pdps1
        
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
var chartSpeed = Highcharts.chart(speedcontainer2, Highcharts.merge(gaugeOptions, {
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
      data: [t2],
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
<?php }?>
$('.bxslider555').bxSlider({
        slideWidth: 291,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider8').bxSlider({
        slideWidth: 293,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider9').bxSlider({
        slideWidth: 320,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
    $('.bxslider99').bxSlider({
        slideWidth: 360,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider556').bxSlider({
        slideWidth: 294,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider557').bxSlider({
        slideWidth: 350,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	
// $('.bxslider555').bxSlider({
  // minSlides: 2,
  // maxSlides: 4,
  // slideWidth: 300,
  // slideMargin: 0,
  // responsive: false
// });

// $( window ).resize(function () {
  // console.log('rs');
  // bxSlider.reloadSlider();
// });
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

