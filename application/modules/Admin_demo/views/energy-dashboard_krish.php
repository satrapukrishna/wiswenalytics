
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

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>


<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
	<style>
	.ClLft1{width:40%!important;padding:5px;}.ClRgt1{width:30%!important;padding:5px;}.ClRgt2{width:30%!important;padding:5px;}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li:hover{background:#fff}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{border-bottom: 1px solid #3c8dbc!important;
    border:none;
	color:#3c8dbc!important
	}
	.green-button{letter-spacing: 1px;
	border-radius: 25px!important;
    padding: 5px 5px!important;
    font: 600 10px 'Open Sans'!important;   
	display: inline-block!important;
    background-color: #148614!important;
    color: #fff!important;    
    box-sizing: border-box!important;
    text-align: center!important;}
	.degree-text{color: #666;
    font-size: 12px;
    margin-top: 5px;}
	
	.red-button{letter-spacing: 1px;
	border-radius: 25px!important;
    padding: 5px 5px!important;
    font: 600 10px 'Open Sans'!important;   
	display: inline-block!important;
    background-color: #de3939!important;
    color: #fff!important;    
    box-sizing: border-box!important;
    text-align: center!important;}
	.degree-text{color: #666;
    font-size: 12px;
    margin-top: 5px;}
	
	
	.bx-wrapper {
    margin-bottom:10px!important;
	}
	.bx-wrapper .bx-controls-auto, .bx-wrapper .bx-pager{bottom: -10px!important}
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
	
	
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls.DGGnrtrHldr div.DGCol-1 {width:60%!important}
div.LiquidTank{height:208px}
div.LiquidTank div.Liquid.l-70, div.LiquidTank.Smll div.Liquid.l-70{height:182px;}
div.LiquidTank.Smll div.Liquid.High{height:80px}
.head-h4{margin:0px;padding:10px;background-color: #eee;
    font: 800 14px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 1px solid #ddd;}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{    width: 43%; }
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{    width: 57%;}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li{border-bottom: 1px solid #eee;border-top: none;}
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
	.DshBrdSctnTtl{margin-bottom:5px!important}
	 .upsdiv li .ClRgt{padding:15px!important;}
	.SctnTtl_buttn {top:50px!important}
	.lpgpad{width: 27% !important;   line-height: 47px !important;}
	.lpgpad1{width: 63% !important;   line-height: 47px !important;}
	.upspad{width: 27% !important;   line-height: 35px !important;}
	.upspad1{width: 63% !important;   line-height: 35px !important;}
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="energy" />
		<div class="DshBrdSctnTtl">
		
		</div>
		</div>
		
		
		<?php if(modules::run('Admin/Site/authlink','energy_Energy-Meter')){ ?>
		<!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="energy">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />Energy Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Floor - 1</h4>
				<span class="inner_collaps" onclick="device1(5551)" id="device5551"></span>
				<div class=" devicebox5551">
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
				
				<!--- floor -2----->
				<div class="DshBrdSctnDtls device devicebox555" style="background-color:#fff;padding:10px">
				<h4 class="head-h4">Floor - 2</h4>
				<span class="inner_collaps" onclick="device1(5552)" id="device5552"></span>
				<div class="  devicebox5552">
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
            <?php } ?>
            <?php if(modules::run('Admin/Site/authlink','energy_btumeters')){ ?>
			<!-- Btu -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="btu">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/btu-c.png" width="40" />BTU Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox556"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				
				<div>
				<div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 01 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/btu-c.png" width="80" /></span>
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 02 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/btu-c.png" width="80" /></span>
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 03 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/btu-c.png" width="80" /></span>
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 01 <img style="float:right"src="<?php echo site_url() ?>asset/demoforall/Images/btu-c.png" width="80" /></span>
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
			<?php } ?>
            <?php if(modules::run('Admin/Site/authlink','energy_dg')){ ?>
			<!-- dg start -->
				<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="dg">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/DG-Clr.png" width="40" />DG SET</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(600)" id="device600"></span>
					
					
                </div>
                <div class="DshBrdSctnDtls"  style="background-color:#fff">
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device devicebox600" style="padding:10px" id="devicebox600">
				<div class="bxslider600" id="bxid">
					
					
					
					<div>
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
						<div class="SctnDtls DGGnrtrHldr">
							
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">DG Generator - 01</span><br>
							<span style="font-size:12px;color:#ab9f9f;padding:10px">Diesel Generator
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
														
							<button class="button_red">OFF</button>
							
							
							
							</span>
							<!--<span style="padding-left: 25px;">
							<span style="color:green">On</span>
							<label class="switch" style="padding: 12px;margin: 5px;">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label><span style="color:red">Off</span>
							</span>-->
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
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
							<div id="ddg1" style="width:400px"></div>
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
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<button>ON</button>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
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
							<div id="ddg2" style="width:400px"></div>
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
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<button>ON</button>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
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
							<div id="ddg3" style="width:400px"></div>
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
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<button>ON</button>
							</span>
							
							
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Running Hours</div><div class="ClRgt">00:20:00</div></li>
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">10Ltrs</div></li>
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
							<div id="ddg4" style="width:400px"></div>
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
<?php } ?>

<!-- UPS Start -->

            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="upss">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/ups-c.png" width="40" />UPS</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(558)" id="device558"></span>
					
					
                </div>
                <div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;padding:10px">
				
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls  " style="padding:10px" id="devicebox558">
				<div class="bxslider558" id="bxid">
					
					<div id="ups" >
					<h4 class="head-h4">UPS - 1</h4>
					<div class="SctnDtlsHldr" style="border: 1px solid #ddd;border-radius: 10px;margin-top: 24px;padding-top: 4px;background-color:#f9f9f9;">
					
					<div class="SctnDtls BorewellHldr">
					
						<ul class="SctnDtlsGrdTbl upsdiv">
						
						<li><div class="ClLft upspad1">Status</div><div class="ClRgt upspad">Full Charge</div></li>
						<li><div class="ClLft upspad1">Number of Hours Used</div><div class="ClRgt upspad">00:20:00</div></li>
						<li><div class="ClLft upspad1">Trip Status</div><div class="ClRgt upspad">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft upspad1" >More Details </div><div class="ClRgt upspad"></div></li>
						
						
					</ul>

					

					</div>
					
					</div>
					</div>
					
					
					
					<div>
					<h4 class="head-h4">&nbsp;</h4>
					<div class="SctnDtlsHldr"  style="margin-top:14px;margin-left:10px;">
					
					<div class="SctnDtls BorewellHldr">
					
					<div id="uups1" style="width:410px; height:265px;border: 1px solid #ddd;border-radius: 10px;"></div>
					
					</div>
					
					</div>
					</div>

					<div id="ups" >
					<h4 class="head-h4">UPS - 2</h4>
					<div class="SctnDtlsHldr" style="border: 1px solid #ddd;border-radius: 10px;margin-top: 24px;padding-top: 4px;background-color:#f9f9f9;">
					
					<div class="SctnDtls BorewellHldr">
					
						<ul class="SctnDtlsGrdTbl upsdiv">
						
						<li><div class="ClLft upspad1">Status</div><div class="ClRgt upspad">Full Charge</div></li>
						<li><div class="ClLft upspad1">Number of Hours Used</div><div class="ClRgt upspad">00:20:00</div></li>
						<li><div class="ClLft upspad1">Trip Status</div><div class="ClRgt upspad">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft upspad1" >More Details </div><div class="ClRgt upspad"></div></li>
						
						
					</ul>
					
					</div>
					
					</div>
					</div>
					<div>
					<h4 class="head-h4">&nbsp;</h4>
					<div class="SctnDtlsHldr"  style="margin-top:14px;margin-left:10px;">
					
					<div class="SctnDtls BorewellHldr">
					
					<div id="uups2" style="width:410px; height:265px;border: 1px solid #ddd;border-radius: 10px;"></div>
					
					</div>
					
					</div>
					</div>
					
				</div>
                   
                </div>
				
				</div>

            </div>
            <!-- UPS End -->
             <?php if(modules::run('Admin/Site/authlink','energy_lpg')){ ?>
			<!-- lpg -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
			
                <div class="DshBrdSctnTtl" id="lpg">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/LPG-C.png" width="40" />LPG CONNECTION</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(557)" id="device557"></span>
					
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox557"  style="background-color:#fff;border-bottom: 1px solid #d0cfcf;padding:10px">
				<h4 class="head-h4">LPG - 1</h4>
				
				<div >
				
					
					<div style="width:32%;float:left;border: 1px solid #ddd;border-radius: 10px;margin-top: 24px;    margin-left:10px;padding-top: 4px;background-color:#f9f9f9;">
					<div class="SctnDtlsHldr">					
					<div class="SctnDtls BorewellHldr">
					<!-- <span class="SctnTtl" style="font: 600 16px 'Open Sans';padding-left:5px"></span><br/><br/> -->
					<ul class="SctnDtlsGrdTbl lpgdiv">
                            <li>
                                <div class="ClLft lpgpad1">Pressure</div>
                                <div class="ClRgt lpgpad">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft lpgpad1">Todays's Consumption</div>
                                <div class="ClRgt lpgpad">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft lpgpad1">Yesterday's Consumption</div>
                                <div class="ClRgt lpgpad">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft lpgpad1">Weekly Average</div>
                                <div class="ClRgt lpgpad">200 Kgs</div>
                            </li>
                        </ul>
						<?php /*<div id="llpg1"></div>*/?>
					</div>
					</div>					
					</div>
					
					<div style="width:33%;float:left">
					<div class="SctnDtlsHldr">					
					<div id="container_speed1" style="height:290px;margin-top: 15px;border: 1px solid #ddd;border-radius: 10px;"></div>
					</div>					
					</div>
					
					<div style="">
					<div class="SctnDtlsHldr">					
						<div id="llpg1" style="width:33%;height:290px;margin-top: 15px;border: 1px solid #ddd;border-radius: 10px;"></div>
					
					</div>					
					</div>
					
					
					
					
					
					
					
				
				</div>
                   
                </div>
			</div>
			
            <!-- LPG code -->
            <?php } ?>
			<?php if(modules::run('Admin/Site/authlink','energy_tripstatus')){ ?>
             <!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="trip">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/TripStatus-Clr.png" width="40" />Trip Status</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(701)" id="device701"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox701"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				<div class=" devicebox701">
				<div class="bxslider701" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 60px;">Trip Status - 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/TripStatus-Clr.png" width="60" />
					
					</span>
					
					
						
					<ul class="SctnDtlsGrdTbl">
						
						<li style="background:#fff;border-top: 1px solid #eee;"><div class="ClLft" style="color:#3c8dbc">Asset</div><div class="ClRgt"  style="color:#3c8dbc">Trip Status</div></li>
						<li><div class="ClLft">DG1</div><div class="ClRgt"><span class="green-button">YES</span></div></li>
						<li><div class="ClLft">DG2</div><div class="ClRgt"><span class="red-button">NO</span></div></li>
						<li><div class="ClLft">Hydro Pnematic System1</div><div class="ClRgt"><span class="green-button">YES</span></div></li>
						<li><div class="ClLft">Hydro Pnematic System2</div><div class="ClRgt"><span class="green-button">YES</span></div></li>

						
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 60px;">Trip Status - 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/TripStatus-Clr.png" width="60" />
					
					</span>
					
					
						
					<ul class="SctnDtlsGrdTbl">
						
						<li style="background:#fff;border-top: 1px solid #eee;"><div class="ClLft" style="color:#3c8dbc">Asset</div><div class="ClRgt"  style="color:#3c8dbc">Trip Status</div></li>
						
						<li><div class="ClLft">MCB1</div><div class="ClRgt"><span class="green-button">YES</span></div></li>
						<li><div class="ClLft">MCB2</div><div class="ClRgt"><span class="green-button">YES</span></div></li>
						<li><div class="ClLft">MCB3</div><div class="ClRgt"><span class="red-button">NO</span></div></li>
						<li><div class="ClLft">MCB4</div><div class="ClRgt"><span class="green-button">YES</span></div></li>

						
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 60px;">Trip Status - 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/TripStatus-Clr.png" width="60" />
					
					</span>
					
					
						
					<ul class="SctnDtlsGrdTbl">
						
						<li style="background:#fff;border-top: 1px solid #eee;"><div class="ClLft" style="color:#3c8dbc">Asset</div><div class="ClRgt"  style="color:#3c8dbc">Trip Status</div></li>
						
						<li><div class="ClLft">Ventilation Fan1</div><div class="ClRgt"><span class="red-button">NO</span></div></li>
						<li><div class="ClLft">Ventilation Fan2</div><div class="ClRgt"><span class="green-button">YES</span></div></li>
						<li><div class="ClLft">UPS1</div><div class="ClRgt"><span class="red-button">NO</span></div></li>
						<li><div class="ClLft">UPS2</div><div class="ClRgt"><span class="green-button">YES</span></div></li>

						
						
						
						
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
            <?php } ?>
			<?php if(modules::run('Admin/Site/authlink','energy_dieseltank')){ ?>
            <!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="diesel_tank">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/DieselTank-Clr.png" width="40" />Diesel Tank</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(601)" id="device601"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox601"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				<div class=" devicebox601">
				<div class="bxslider601" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Diesel Tank - 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/DieselTank-Clr.png" width="70" />
					<br/><span class="green-button">750 Lts-75% Capacity</span>
					</span>
					
					<div class="nav-tabs-custom" style="border-top:1px solid #ccc">
							<ul class="nav nav-tabs">
							  <li><a href="#tab_1" data-toggle="tab" aria-expanded="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
							  <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">&nbsp;&nbsp;&nbsp;Inflow Details&nbsp;&nbsp;&nbsp;</a></li>

							  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="">&nbsp;&nbsp;&nbsp;Outflow Details&nbsp;&nbsp;&nbsp;</a></li>
							  
							</ul>
							
					</div>
						
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft1">Today</div><div class="ClRgt1">Nil</div><div class="ClRgt2">Nil</div></li>
						<li><div class="ClLft1">Month till date</div><div class="ClRgt1">7500 Lts</div><div class="ClRgt2">7500 Lts</div></li>
						<li><div class="ClLft1">Last Month</div><div class="ClRgt1">8300 Lts</div><div class="ClRgt2">8300 Lts</div></li>
						<li><div class="ClLft1">Year till date</div><div class="ClRgt1">96000 Lts</div><div class="ClRgt2">96000 Lts</div></li>

						
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Diesel Tank - 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/DieselTank-Clr.png" width="70" />
					<br/><span class="red-button">150 Lts-15% Capacity</span>
					</span>
					
					<div class="nav-tabs-custom" style="border-top:1px solid #ccc">
							<ul class="nav nav-tabs">
							  <li><a href="#tab_1" data-toggle="tab" aria-expanded="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
							  <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">&nbsp;&nbsp;&nbsp;Inflow Details&nbsp;&nbsp;&nbsp;</a></li>

							  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="">&nbsp;&nbsp;&nbsp;Outflow Details&nbsp;&nbsp;&nbsp;</a></li>
							  
							</ul>
							
					</div>
						
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft1">Today</div><div class="ClRgt1">Nil</div><div class="ClRgt2">Nil</div></li>
						<li><div class="ClLft1">Month till date</div><div class="ClRgt1">7500 Lts</div><div class="ClRgt2">7500 Lts</div></li>
						<li><div class="ClLft1">Last Month</div><div class="ClRgt1">8300 Lts</div><div class="ClRgt2">8300 Lts</div></li>
						<li><div class="ClLft1">Year till date</div><div class="ClRgt1">96000 Lts</div><div class="ClRgt2">96000 Lts</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Diesel Tank - 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/DieselTank-Clr.png" width="70" />
					<br/><span class="green-button">750 Lts-75% Capacity</span>
					</span>
					
					<div class="nav-tabs-custom" style="border-top:1px solid #ccc">
							<ul class="nav nav-tabs">
							  <li><a href="#tab_1" data-toggle="tab" aria-expanded="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
							  <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">&nbsp;&nbsp;&nbsp;Inflow Details&nbsp;&nbsp;&nbsp;</a></li>

							  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="">&nbsp;&nbsp;&nbsp;Outflow Details&nbsp;&nbsp;&nbsp;</a></li>
							  
							</ul>
							
					</div>
						
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft1">Today</div><div class="ClRgt1">Nil</div><div class="ClRgt2">Nil</div></li>
						<li><div class="ClLft1">Month till date</div><div class="ClRgt1">7500 Lts</div><div class="ClRgt2">7500 Lts</div></li>
						<li><div class="ClLft1">Last Month</div><div class="ClRgt1">8300 Lts</div><div class="ClRgt2">8300 Lts</div></li>
						<li><div class="ClLft1">Year till date</div><div class="ClRgt1">96000 Lts</div><div class="ClRgt2">96000 Lts</div></li>

						
						
						
						
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
             <?php } ?>
			<?php if(modules::run('Admin/Site/authlink','energy_dieselmeters')){ ?>
            <!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="diesel_meter">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/DieselMeter-Clr.png" width="40" />Diesel Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(559)" id="device559"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox559"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Inflow</h4>
				<span class="inner_collaps" onclick="device1(5591)" id="device5591"></span>
				<div class=" devicebox5591">
				<div class="bxslider559" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 101<br/><span class="degree-text">Tank - 01</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">55845 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">86 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">565 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">55845 Lts</div></li>

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 102<br/><span class="degree-text">Tank - 02</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">55845 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">86 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">565 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">55845 Lts</div></li>

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 103<br/><span class="degree-text">Tank - 03</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">55845 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">86 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">565 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">55845 Lts</div></li>

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 104<br/><span class="degree-text">Tank - 04</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">55845 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">86 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">565 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">55845 Lts</div></li>

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
				
				<!--- floor -2----->
				<div class="DshBrdSctnDtls device devicebox559" style="background-color:#fff;padding:10px">
				<h4 class="head-h4">Outflow</h4>
				<span class="inner_collaps" onclick="device1(5592)" id="device5592"></span>
				<div class="  devicebox5592">
				<div class="bxslider559" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 201<br/><span class="degree-text">Tank - 01</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">49998 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">70 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">66 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">50009 Lts</div></li>

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 202<br/><span class="degree-text">Tank - 02</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">49998 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">70 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">66 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">50009 Lts</div></li>

						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 203<br/><span class="degree-text">Tank - 03</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">49998 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">70 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">66 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">50009 Lts</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Diesel Meter 204<br/><span class="degree-text">Tank - 04</span></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Current Reading </div><div class="ClRgt">49998 Lts</div></li><li><div class="ClLft">Avg. Reading/Day</div><div class="ClRgt">70 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Month</div><div class="ClRgt">66 Lts</div></li>
						<li><div class="ClLft">Avg. Reading/Year</div><div class="ClRgt">50009 Lts</div></li>

						
						
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
				<?php } ?>
			
	
<!-- <div class="DshBrdSctn" style="padding: 0px 30px 0 38px;">LPG
	<div id="llpg1"></div>
	<div id="llpg2"></div>
	<div id="llpg3"></div>
	
</div> -->

<!-- <div class="DshBrdSctn" style="padding: 0px 30px 0 38px;">DG
	
	<div id="ddg1"></div>
	<div id="ddg2"></div>
	<div id="ddg3"></div>
	
</div> -->
<!-- <div class="DshBrdSctn" style="padding: 0px 30px 0 38px;">UPS
	<div id="uups1"></div>
	<div id="uups2"></div>
	<div id="uups3"></div>
	<div id="uups4"></div>
	
</div> -->

        <?php $this->load->view('common/footer3') ?>
            
        
    </div>
   
  
  
  
</div>

</body>



<script>	


<?php if(modules::run('Admin/Site/authlink','energy_lpg')){ ?>
for (var i = 1; i < 2; i++) {
	var cnt='llpg'+i;
	Highcharts.chart(cnt, {
    chart: {
        type: 'column'
    },

                      credits: {
                          enabled: false
                      },
    title: {
        text: ' '
    },
   
    xAxis: {
        categories: [
            'Mon',
            'Tue',
            'Wed',
            'Thur',
            'Fri',
            'Sat',
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thur',
            'Fri'
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
        pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:10px">{series.name}: </td>' +
            '<td style="padding:0;font-size:10px"><b>{point.y:.1f} KG</b></td></tr>',
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
        name: ' ',
        data: [5.9, 6.5, 10.4, 8.2, 4.0, 5.0, 6.6, 4.5, 3.4, 6.1, 7.6, 5.4]

    }]
});

	}
	
// LPG end
<?php } ?>
//DG Start

for (var i1 = 1; i1 < 5; i1++) {
	var cnt2='ddg'+i1;
	var nm='DG Generator - 0'+i1;
	Highcharts.chart(cnt2, {
    chart: {
        type: 'column'
    },

                      credits: {
                          enabled: false
                      },
    title: {
        text: ' '
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
            text: 'Running Hours'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:10px">{series.name}: </td>' +
            '<td style="padding:0;font-size:10px"><b>{point.y} Hours</b></td></tr>',
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
        name: ' ',
        data: [3, 4, 2, 6, 6, 7, 3, 5, 8, 4, 6, 4]

    }]
});

	}
	
	//DG End
	//UPS Start

for (var i2 = 1; i2 < 3; i2++) {
	var ups='uups'+i2;
	Highcharts.chart(ups, {
    chart: {
        type: 'line'
    },

                      credits: {
                          enabled: false
                      },
    title: {
        text: 'Charging Level'
    },
   
    xAxis: {
        categories: [
            "00:40:36", "01:52:10", "02:04:15", "03:16:20", "04:39:38", "05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '%'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:10px">{series.name}: </td>' +
            '<td style="padding:0;font-size:10px"><b>{point.y:.1f} %</b></td></tr>',
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
        name: 'UPS1',
        data: [90, 90, 90, 90, 90, 90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90,90, 90, 90, 90, 90]

    }]
});

	}
	
	//UPS end
$('.bxslider555').bxSlider({
        slideWidth: 293,
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
        slideWidth: 450,
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
	$('.bxslider559').bxSlider({
        slideWidth: 294,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	
	$('.bxslider601').bxSlider({
        slideWidth: 490,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });

$('.bxslider600').bxSlider({
        slideWidth: 490,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
$('.bxslider701').bxSlider({
        slideWidth: 294,
        minSlides: 3,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
// Highcharts.chart('ups', {
//     chart: {
//         type: 'spline'
//     },
//     title: {
//         text: 'UPS'
//     },
//     xAxis: {
//         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
//             'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
//     },
//     yAxis: {
//         title: {
//             text: 'Temperature'
//         },
//         labels: {
//             formatter: function () {
//                 return this.value + '°';
//             }
//         }
//     },
//     tooltip: {
//         crosshairs: true,
//         shared: true
//     },
//     plotOptions: {
//         spline: {
//             marker: {
//                 radius: 4,
//                 lineColor: '#666666',
//                 lineWidth: 1
//             }
//         }
//     },
//     series: [{
//         name: 'Tokyo',
//         marker: {
//             symbol: 'square'
//         },
//         data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,  23.3, 18.3, 13.9, 9.6]

//     }]
// });
// LPG Start

	
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

//speed guage
           //highchart
 <?php if(modules::run('Admin/Site/authlink','energy_lpg')){ ?>
var t=8.5;
var speedcontainer="container_speed1";
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
      text: 'Bar'
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
<?php } ?>

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

