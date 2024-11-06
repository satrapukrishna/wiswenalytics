
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
	<style>
	.bx-wrapper {
    margin-bottom:40px!important;
	}
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
	margin: 10px 10px 0 0!important;
	
	}
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft, div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{padding:9px}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl {padding:10px}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: none !important;border-bottom: 1px solid #ddd;}
	.bx-wrapper .bx-prev{left: -28px !important;}
	.bx-wrapper .bx-next {right: -31px !important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr {
	background-color: #fff!important;
    box-shadow: none!important;
	border-radius: 10px;
  border: 1px solid #ccc;
	}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl{
	padding: 14px 0 9px 45px!important;
	}
	.imageadd img{ left: 0px!important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl{color:#000!important}
	
	.switch {
  position: relative;
  display: inline-block;
  width: 55px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls.DGGnrtrHldr div.DGCol-1 {width:60%!important}
div.LiquidTank{height:208px}
div.LiquidTank div.Liquid.l-70, div.LiquidTank.Smll div.Liquid.l-70{height:182px;}
div.LiquidTank.Smll div.Liquid.High{height:80px}
.head-h4{margin:0px;padding:10px;background-color: #eee;
    font: 800 14px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 1px solid #ddd;}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{width:43%}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{width:57%}
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
    content: 'Expand!  '!important;
	}
	.DshBrdSctnTtl{margin-bottom:5px!important}
	
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2" style="min-height:400px">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="firepump" />
		<div class="DshBrdSctnTtl">
		
		</div>
		</div>
		
		
		
		<!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="energy">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />Energy Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps" onclick="device(555)" id="device555"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Floor - 1</h4>
				<span class="inner_collaps" onclick="device1(5551)" id="device5551"></span>
				<div class="deviceboxall devicebox555 devicebox5551">
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;">EM 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
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
					<div class="DshBrdSctn" style="padding: 0px 30px 0 38px;">LPG
						<div id="lpg4"></div>
						<div id="lpg5"></div>
						<div id="lpg3"></div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;">EM 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
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
					<span class="SctnTtl" style="line-height: 72px;">EM 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Name</div><div class="ClRgt">RP INCOMER-01</div></li>
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
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;">EM 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						
						<li><div class="ClLft">Name</div><div class="ClRgt">Rp INCOMER-02</div></li>
						<li><div class="ClLft">Consumed Active Energy</div><div class="ClRgt">1202.0 kWh</div></li>
						<li><div class="ClLft">Maximum Demand Kw</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Frequency</div><div class="ClRgt">50.0 Hz</div></li>
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border: 1px solid #ccc;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
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
						<li class="em-hide4" style="background-color:#eee;display:none"><div class="ClLft" onclick="em(4)">Hide Details </div><div class="ClRgt"></div></li>
						</div>
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
				
				<!--- floor -2----->
				<div class="DshBrdSctnDtls device" style="background-color:#fff;padding:10px">
				<h4 class="head-h4">Floor - 2</h4>
				<span class="inner_collaps" onclick="device1(5552)" id="device5552"></span>
				<div class="devicebox555 devicebox5552">
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;">EM 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
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
					<span class="SctnTtl" style="line-height: 72px;">EM 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
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
					<span class="SctnTtl" style="line-height: 72px;">EM 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Name</div><div class="ClRgt">RP INCOMER-01</div></li>
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
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;">EM 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						
						<li><div class="ClLft">Name</div><div class="ClRgt">Rp INCOMER-02</div></li>
						<li><div class="ClLft">Consumed Active Energy</div><div class="ClRgt">1202.0 kWh</div></li>
						<li><div class="ClLft">Maximum Demand Kw</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Frequency</div><div class="ClRgt">50.0 Hz</div></li>
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border: 1px solid #ccc;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
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
						<li class="em-hide4" style="background-color:#eee;display:none"><div class="ClLft" onclick="em(4)">Hide Details </div><div class="ClRgt"></div></li>
						</div>
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
				
				

            </div>
            <!-- energy meter ends -->
			<!-- Btu -->
            <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="btu">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />BTU Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device1(556)" id="device556"></span>
					
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox556"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				
				<div>
				<div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Energy Consumption</div><div class="ClRgt">0.0 kWh</div></li>
						<li><div class="ClLft">Volume</div><div class="ClRgt">0.0 M^3</div></li>
						<li><div class="ClLft">CHW Inlet Temperature</div><div class="ClRgt">0.0 &#8451; </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Energy Consumption</div><div class="ClRgt">0.0 kWh</div></li>
						<li><div class="ClLft">Volume</div><div class="ClRgt">0.0 M^3</div></li>
						<li><div class="ClLft">CHW Inlet Temperature</div><div class="ClRgt">0.0 &#8451; </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Energy Consumption</div><div class="ClRgt">0.0 kWh</div></li>
						<li><div class="ClLft">Volume</div><div class="ClRgt">0.0 M^3</div></li>
						<li><div class="ClLft">CHW Inlet Temperature</div><div class="ClRgt">0.0 &#8451; </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Energy Consumption</div><div class="ClRgt">0.0 kWh</div></li>
						<li><div class="ClLft">Volume</div><div class="ClRgt">0.0 M^3</div></li>
						<li><div class="ClLft">CHW Inlet Temperature</div><div class="ClRgt">0.0 &#8451; </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						<div class="em-disc4" style="display:none">
						<li><div class="ClLft">CHW Outlet Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">CHW Delta Temperature</div><div class="ClRgt">0.0 &#8451;</div></li>
						<li><div class="ClLft">Present Load</div><div class="ClRgt">0.0 Kw</div></li>
						<li><div class="ClLft">Volume Flow</div><div class="ClRgt">0.0 L/Hr</div></li>
						</div>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
			</div>
			<!---btu end --->
			<!-- lpg -->
            <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="lpg">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />LPG</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device1(557)" id="device557"></span>
					
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox557"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				
				<div>
				<div class="bxslider557" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
						<div id="lpg1"></div>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
			</div>
			
            <!-- LPG code -->
            
            
            <!-- UPS Start -->

            <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="upss">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />UPS</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(558)" id="device558"></span>
					
					
                </div>
                <div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox558">
				<div class="bxslider558" id="bxid">
					
					<div style="width:320px" id="ups">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">UPS 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					
					
   <ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Status</div><div class="ClRgt">Full Charge</div></li>
						<li><div class="ClLft">Number of Hours Used</div><div class="ClRgt">00:20:00</div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						
						
					</ul>



					</div>
					</div>
					</div>
					</div>
					
					
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">UPS 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Status</div><div class="ClRgt">Full Charge</div></li>
						<li><div class="ClLft">Number of Hours Used</div><div class="ClRgt">00:20:00</div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">UPS 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Status</div><div class="ClRgt">Full Charge</div></li>
						<li><div class="ClLft">Number of Hours Used</div><div class="ClRgt">00:20:00</div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">UPS 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Status</div><div class="ClRgt">Full Charge</div></li>
						<li><div class="ClLft">Number of Hours Used</div><div class="ClRgt">00:20:00</div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
                   
                </div>
				
				</div>

            </div>
            <!-- UPS End -->
			
				<!-- dg start -->
				<div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="dg">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />DG SET</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(600)" id="device600"></span>
					
					
                </div>
                <div class="DshBrdSctnDtls device devicebox557"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox600">
				<div class="bxslider600" id="bxid">
					
					
					
					<div>
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
						<div class="SctnDtls DGGnrtrHldr">
							
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">DG Generator - 01</span><br>
							<span style="font-size:12px;color:#ab9f9f;padding:10px">Diesel Generator
							<span style="padding-left: 25px;">
							<span style="color:green">On</span>
							<label class="switch" style="padding: 12px;margin: 5px;">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label><span style="color:red">Off</span>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Today's Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
							<li><div class="ClLft">Available Fuel </div><div class="ClRgt">200Ltrs</div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt">20Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt">0Ltrs</div></li>
							 <li><div class="ClLft">Economy</div><div class="ClRgt">20.6</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2" style="margin-top:22%">
							<div class="LiquidTank Smll">
							
								<div class="Liquid l-70"></div>
							
							
							</div>
							</div> 
							
							<div class="DGCol-3" style="margin-top:22%"> 
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
							<div>
							<div id="dg1"></div>
							</div>
							<div class="DshBrdSctn" style="padding: 0px 30px 0 38px;">DG
								<div id="dg4"></div>
								<div id="dg3"></div>
							</div>
					</div>
					</div>
					</div>
					</div>
					
					
					<div>
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
						<div class="SctnDtls DGGnrtrHldr">
							
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">DG Generator - 02</span><br>
							<span style="font-size:12px;color:#ab9f9f;padding:10px">Diesel Generator
							<span style="padding-left: 25px;">
							<span style="color:green">On</span>
							<label class="switch" style="padding: 12px;margin: 5px;">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label><span style="color:red">Off</span>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Today's Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
							<li><div class="ClLft">Available Fuel </div><div class="ClRgt">200Ltrs</div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt">20Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt">0Ltrs</div></li>
							 <li><div class="ClLft">Economy</div><div class="ClRgt">20.6</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2" style="margin-top:22%">
							<div class="LiquidTank Smll">
							
								<div class="Liquid l-70"></div>
							
							
							</div>
							</div> 
							
							<div class="DGCol-3" style="margin-top:22%"> 
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
					

					<div>
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
						<div class="SctnDtls DGGnrtrHldr">
							
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">DG Generator - 03</span><br>
							<span style="font-size:12px;color:#ab9f9f;padding:10px">Diesel Generator
							<span style="padding-left: 25px;">
							<span style="color:green">On</span>
							<label class="switch" style="padding: 12px;margin: 5px;">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label><span style="color:red">Off</span>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Today's Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
							<li><div class="ClLft">Available Fuel </div><div class="ClRgt">200Ltrs</div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt">20Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt">0Ltrs</div></li>
							 <li><div class="ClLft">Economy</div><div class="ClRgt">20.6</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2" style="margin-top:22%">
							<div class="LiquidTank Smll">
							
								<div class="Liquid l-70"></div>
						
							</div>
							</div> 
							
							<div class="DGCol-3" style="margin-top:22%"> 
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
					
					
					<div>
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
						<div class="SctnDtls DGGnrtrHldr">
							
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">DG Generator - 04</span><br>
							<span style="font-size:12px;color:#ab9f9f;padding:10px">Diesel Generator
							<span style="padding-left: 25px;">
							<span style="color:green">On</span>
							<label class="switch" style="padding: 12px;margin: 5px;">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label><span style="color:red">Off</span>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Today's Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Today's Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
							<li><div class="ClLft">Available Fuel </div><div class="ClRgt">200Ltrs</div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt">20Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt">0Ltrs</div></li>
							 <li><div class="ClLft">Economy</div><div class="ClRgt">20.6</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2" style="margin-top:22%">
							<div class="LiquidTank Smll">
							
								<div class="Liquid l-70"></div>
							
							</div>
							</div> 
							
							<div class="DGCol-3" style="margin-top:22%"> 
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
				
				</div>

            </div>
<!-- dg end -->
			
				



<div class="DshBrdSctn" style="padding: 0px 30px 0 38px;">UPS
	<div id="ups1"></div>
	<div id="ups2"></div>
	<div id="ups3"></div>
	
</div> 

        <?php $this->load->view('common/footer3') ?>
            
        
    </div>
   
  
  
  
</div>

</body>



<script>	
 
$('.bxslider555').bxSlider({
        slideWidth: 290,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider556').bxSlider({
        slideWidth: 290,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider558').bxSlider({
        slideWidth: 290,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
    $('.bxslider557').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });

$('.bxslider600').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
Highcharts.chart('ups', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'UPS'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Temperature'
        },
        labels: {
            formatter: function () {
                return this.value + '°';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Tokyo',
        marker: {
            symbol: 'square'
        },
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,  23.3, 18.3, 13.9, 9.6]

    }]
});
//LPG Start
<?php if($lpg==6){?>
for (var i = 1; i < 4; i++) {
	var cnt='lpg'+i;
	Highcharts.chart(cnt, {
    chart: {
        type: 'column'
    },
    title: {
        text: 'LPG'
    },
   
    xAxis: {
        categories: [
            '01-10-2020',
            '02-10-2020',
            '03-10-2020',
            '04-10-2020',
            '05-10-2020',
            '06-10-2020',
            '07-10-2020',
            '08-10-2020',
            '09-10-2020',
            '10-10-2020',
            '11-10-2020',
            '12-10-2020'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KG'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} KG</b></td></tr>',
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
        name: 'LPG',
        data: [5.9, 6.5, 10.4, 8.2, 4.0, 5.0, 6.6, 4.5, 3.4, 6.1, 7.6, 5.4]

    }]
});

	}
	<?php }?>
// LPG end
//DG Start
<?php if($dg==7){?>
for (var i1 = 1; i1 < 4; i1++) {
	var cnt2='dg'+i1;
	Highcharts.chart(cnt2, {
    chart: {
        type: 'column'
    },
    title: {
        text: 'DG'
    },
   
    xAxis: {
        categories: [
            '01-10-2020',
            '02-10-2020',
            '03-10-2020',
            '04-10-2020',
            '05-10-2020',
            '06-10-2020',
            '07-10-2020',
            '08-10-2020',
            '09-10-2020',
            '10-10-2020',
            '11-10-2020',
            '12-10-2020'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KG'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} KG</b></td></tr>',
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
        name: 'DG',
        data: [5.9, 6.5, 10.4, 8.2, 4.0, 5.0, 6.6, 4.5, 3.4, 6.1, 7.6, 5.4]

    }]
});

	}
	<?php }?>
	//DG End
	//UPS Start
<?php if($ups==8){?>
for (var i1 = 1; i1 < 4; i1++) {
	var cnt2='ups'+i1;
	Highcharts.chart(cnt2, {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Charging Level'
    },
   
    xAxis: {
        categories: [
            '01-10-2020',
            '02-10-2020',
            '03-10-2020',
            '04-10-2020',
            '05-10-2020',
            '06-10-2020',
            '07-10-2020',
            '08-10-2020',
            '09-10-2020',
            '10-10-2020',
            '11-10-2020',
            '12-10-2020'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'UPS'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} KG</b></td></tr>',
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
        name: 'UPS',
        data: [5.9, 6.5, 10.4, 8.2, 4.0, 5.0, 6.6, 4.5, 3.4, 6.1, 7.6, 5.4]

    }]
});

	}
	<?php } ?>
	//UPS end
	
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
            $('.devicebox'+a).toggle('slow'); 
            $("#device"+a).addClass("Expnd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).toggle('slow'); 
            $("#device"+a).removeClass("Expnd");
        }
}
function device1(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).toggle('slow'); 
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).toggle('slow'); 
            $("#device"+a).removeClass("Expndd");
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

