<?php //echo json_encode($dg_data);
//echo json_encode($dg_data[0]);
//die(); ?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />


	<style>
	.ClLft1{width:40%!important;padding:5px;}.ClRgt1{width:30%!important;padding:5px;}.ClRgt2{width:30%!important;padding:5px;}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li:hover{background:#fff}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{border-bottom: 1px solid #3c8dbc!important;
    border:none;
	color:#3c8dbc!important
	}
	.bx-viewport{
			/* overflow: visible !important; */
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
.status-trip{
	display: inline-block!important;
    background-color: #e8e186!important;
    color: #10101c!important;
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
			<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="energy">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />Energy Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
                </div>
                <!-- floor -1---->
				
				
				  <div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">UN House Central Wing</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['uncw'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['uncw']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['uncw'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['uncw'][$i]['current3'] ?></div></li>
					</ul>
					
					</div>
					<div>
					<div id="energycontaineruncw<?php echo $i; ?>" style="width:400px"></div> 
				</div>
					 
					</div>
					
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                   
                </div>
				  <!-- floor -1---->
				  <div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">UN House East Wing</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['unew'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['unew']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['unew'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
					<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['unew'][$i]['current3'] ?></div></li>
						
					</ul>
					</div>
					<div id="energycontainerunew<?php echo $i; ?>" style="width:400px"></div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                   
                </div>

				  <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Ford Foundation</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['unff'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['unff']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['unff'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
					<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['unff'][$i]['current3'] ?></div></li>
						
					</ul>
					</div>
					<div id="energycontainerunff<?php echo $i; ?>" style="width:400px"></div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                   
                </div>
				
				

				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Security Gate</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['unsg'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['unsg']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['unsg'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
					<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['unsg'][$i]['current3'] ?></div></li>
						
					</ul>
					</div>
					<div id="energycontainerunsg<?php echo $i; ?>" style="width:400px"></div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                   
                </div>

				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Annexe Building</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['unab'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['unab']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['unab'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
					<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['unab'][$i]['current3'] ?></div></li>
						
					</ul>
					</div>
					<div id="energycontainerunab<?php echo $i; ?>" style="width:400px"></div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>                   
                </div>
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">AC Plant Room</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['undp'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['undp']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['undp'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['undp'][$i]['current3'] ?></div></li>
					</ul>
					</div>
					<div id="energycontainerundp<?php echo $i; ?>" style="width:400px"></div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                   
                </div>
				  <!-- floor -1---->
				  <div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">UN House  West Wing</h4>
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['unww'])){ ?>	
				<?php for ($i=0; $i < count($energy_meters_data['unww']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['unww'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
					<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['pf'] ?> </div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['voltage1'] ?></div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['voltage2'] ?></div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['voltage3'] ?></div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['unww'][$i]['current3'] ?></div></li>
						
					</ul>
					</div>
					<div id="energycontainerunww<?php echo $i; ?>" style="width:400px"></div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                   
                </div>
            <!-- energy meter ends -->
            <?php } ?>
           
			
	

        <?php $this->load->view('common/footer3') ?>
            
        
    </div>
   
  
  
  
</div>

</body>



<script>	



	
$('.bxslider555').bxSlider({
        slideWidth: 400,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider556').bxSlider({
        slideWidth: 390,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider558').bxSlider({
        slideWidth: 450,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
    $('.bxslider557').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider559').bxSlider({
        slideWidth: 294,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	
	$('.bxslider601').bxSlider({
        slideWidth: 490,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });

$('.bxslider600').bxSlider({
        slideWidth: 560,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
$('.bxslider701').bxSlider({
        slideWidth: 294,
        minSlides: 3,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });

//speed guage
           //highchart
	var energy_data_c1=<?php echo json_encode($energy_meters_data['uncw']);?>;
    
    for(var k=0;k<energy_data_c1.length;k++){
        var meter=energy_data_c1[k]["meter"];
         var contain="energycontaineruncw"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_c1[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_c1[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
	var energy_data_unew=<?php echo json_encode($energy_meters_data['unew']);?>;
    
    for(var k=0;k<energy_data_unew.length;k++){
        var meter=energy_data_unew[k]["meter"];
         var contain="energycontainerunew"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_unew[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_unew[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
	var energy_data_unff=<?php echo json_encode($energy_meters_data['unff']);?>;
    
    for(var k=0;k<energy_data_unff.length;k++){
        var meter=energy_data_unff[k]["meter"];
         var contain="energycontainerunff"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_unff[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_unff[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
	var energy_data_unsg=<?php echo json_encode($energy_meters_data['unsg']);?>;
    
    for(var k=0;k<energy_data_unsg.length;k++){
        var meter=energy_data_unsg[k]["meter"];
         var contain="energycontainerunsg"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_unsg[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_unsg[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
	var energy_data_unab=<?php echo json_encode($energy_meters_data['unab']);?>;
    
    for(var k=0;k<energy_data_unab.length;k++){
        var meter=energy_data_unab[k]["meter"];
         var contain="energycontainerunab"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_unab[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_unab[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
	
	var energy_data_undp=<?php echo json_encode($energy_meters_data['undp']);?>;
    
    for(var k=0;k<energy_data_undp.length;k++){
        var meter=energy_data_undp[k]["meter"];
         var contain="energycontainerundp"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_undp[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_undp[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
	var energy_data_unww=<?php echo json_encode($energy_meters_data['unww']);?>;
    
    for(var k=0;k<energy_data_unww.length;k++){
        var meter=energy_data_unww[k]["meter"];
         var contain="energycontainerunww"+k;
         var xdata=[];
        
         var time=[];
        
        for(var i=0;i<energy_data_unww[k]["live"].length;i++){
		//time.push([parseFloat(energy_data_c1[k]["live"][i]["date"])]);
        xdata.push([parseFloat(energy_data_unww[k]["live"][i]["consumption"])]);
        }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },xAxis: {
        categories: [
            '00', '02', '03', '04', '05', '06',
            '07', '08', '09', '10', '11', '12','13','14'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
   tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="color:{series.color};font-size:8px">{series.name}: </td>' +
            '<td style="font-size:8px"><b>{point.y} Kwh</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: [{
      name: meter,
      data: xdata,
    }]
  
});
    }
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

