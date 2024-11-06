
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />



	<style>
	.feedleft{padding:7px!important}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{
		width:55%;
	}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt {
	width: 45%;
	}
	.washroom_lft{width:85%!important}
	.washroom_rgt{width:15%!important}
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
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft, div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{padding:6px}
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
		<input type="hidden" id="page" value="specialized" />
		<div class="DshBrdSctnTtl">
		
		</div>
		</div>
		
		<!-- Btu -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="washroom">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/WashrromMonitoring-Clr.png" width="40" />Washroom Monitoring System</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(558)" id="device558"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				
				
				<div>
				<div class="bxslider558" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">RFID Janitor <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/RFID-Clr.png" width="70" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft washroom_lft">No.of Times Swiped</div><div class="ClRgt washroom_rgt">15</div></li>
						<li><div class="ClLft washroom_lft">No.of Times Cleaning Verified</div><div class="ClRgt washroom_rgt">15</div></li>
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" style="width:100%;text-align: center;"><span class="status-working">Details</span> </div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">Odour Status <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Stink-Clr.png" width="70" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Odour Left</div><div class="ClRgt">6ppm</div></li>
						<li><div class="ClLft">Odour Right</div><div class="ClRgt">0ppm</div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" style="width:100%;text-align: center;"><span class="status-working">Clean</span> </div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">Footfall Sensor <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Footfall-Clr.png" width="60" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft washroom_lft" style="line-height:45px">No.of Persons Walked In</div><div class="ClRgt washroom_rgt" style="line-height:45px">376</div></li>
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" style="width:100%;text-align: center;"><span class="status-working">Details</span> </div></li>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">Feedback <img style="float:right"src="<?php echo site_url() ?>asset/ambienceasset/asset/Images/Feedback.png" width="70" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft feedleft ">Good</div><div class="ClRgt ">6</div></li>
						<li><div class="ClLft feedleft">Average</div><div class="ClRgt">0</div></li>
						<li><div class="ClLft feedleft">Bad</div><div class="ClRgt">0</div></li>
						
						
						
						
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
		
		<!-- coldroom meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="cold_room">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/ColdRoom-Clr.png" width="40" />Cold Room</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Basement - 1</h4>
				<span class="inner_collaps" onclick="device1(5551)" id="device5551"></span>
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Veg Cold Room - 1 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/ColdRoom-Clr.png" width="70" />
					<br/><span class="status-stopped">Door Open</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Temp. Mentained</div><div class="ClRgt">-9 degree</div></li><li><div class="ClLft">Number of times door opened</div><div class="ClRgt">15</div></li>
						<li><div class="ClLft">Door Open time</div><div class="ClRgt">15 Min</div></li>
						<li><div class="ClLft">Avg.Door Open time</div><div class="ClRgt">8 Min</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Veg Cold Room - 2 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/ColdRoom-Clr.png" width="70" />
					<br/><span class="status-working">Door Close</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						
						<li><div class="ClLft">Temp. Mentained</div><div class="ClRgt">-9 degree</div></li><li><div class="ClLft">Number of times door opened</div><div class="ClRgt">11</div></li>
						<li><div class="ClLft">Door Open time</div><div class="ClRgt">20 Min</div></li>
						<li><div class="ClLft">Avg.Door Open time</div><div class="ClRgt">9 Min</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Veg Cold Room - 3 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/ColdRoom-Clr.png" width="70" />
					<br/><span class="status-working">Door Close</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Temp. Mentained</div><div class="ClRgt">-9 degree</div></li><li><div class="ClLft">Number of times door opened</div><div class="ClRgt">22</div></li>
						<li><div class="ClLft">Door Open time</div><div class="ClRgt">30 Min</div></li>
						<li><div class="ClLft">Avg.Door Open time</div><div class="ClRgt">10 Min</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Veg Cold Room - 4 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/ColdRoom-Clr.png" width="70" />
					<br/><span class="status-working">Door Close</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Temp. Mentained</div><div class="ClRgt">-9 degree</div></li><li><div class="ClLft">Number of times door opened</div><div class="ClRgt">15</div></li>
						<li><div class="ClLft">Door Open time</div><div class="ClRgt">13 Min</div></li>
						<li><div class="ClLft">Avg.Door Open time</div><div class="ClRgt">7 Min</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
				
				
				
				

            </div>
            <!-- coldroom meter ends -->
			
			<!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="floor_wetness">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/FloorWet-Clr.png" width="40" />Floor Wetness</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox556"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Basement - 1</h4>
				<span class="inner_collaps" onclick="device1(5561)" id="device5561"></span>
				<div class=" devicebox5561">
				<div class="bxslider556" id="bxid">
					
					<div style="width:300px;float:left">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">STP Room <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/FloorWet-Clr.png" width="70" />
					<br/><span class="status-stopped">Wet</span>
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Priority</div><div class="ClRgt">High</div></li><li><div class="ClLft">Issue raised</div><div class="ClRgt">25/11/2020 10:30PM</div></li>
						

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:300px;float:left">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Hydro Pnematic Room <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/FloorWet-Clr.png" width="70" />
					<br/><span class="status-working">Dry</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Priority</div><div class="ClRgt">NA</div></li><li><div class="ClLft">Issue raised</div><div class="ClRgt">NA</div></li>
						

						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:300px;float:left">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">DG Room <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/FloorWet-Clr.png" width="70" />
					<br/><span class="status-working">Dry</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Priority</div><div class="ClRgt">NA</div></li><li><div class="ClLft">Issue raised</div><div class="ClRgt">NA</div></li>
						

						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="clear:both"></div>
					
				</div>
				</div>
                   
                </div>
				
				
				
				
				
				

            </div>
            <!-- energy meter ends -->
			
			<!-- energy meter -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="door_open">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/DoorOpenClose-Clr.png" width="40" />Door - Open/Close</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(557)" id="device557"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox557"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Basement - 1</h4>
				<span class="inner_collaps" onclick="device1(5571)" id="device5571"></span>
				<div class=" devicebox5571">
				<div class="bxslider557" id="bxid">
					
					<div style="width:300px;float:left">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">STP Room <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/DoorOpenClose-Clr.png" width="70" />
					<br/><span class="status-stopped">Door Open</span>
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Priority</div><div class="ClRgt">High</div></li><li><div class="ClLft">Door Open Since</div><div class="ClRgt">25/11/2020 10:30PM</div></li>
						

						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:300px;float:left">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Hydro Pnematic Room <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/DoorOpenClose-Clr.png" width="70" />
					<br/><span class="status-working">Door Close</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Priority</div><div class="ClRgt">NA</div></li><li><div class="ClLft">Door Open Since</div><div class="ClRgt">NA</div></li>
						

						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:300px;float:left">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">DG Room <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/DoorOpenClose-Clr.png" width="70" />
					<br/><span class="status-working">Door Close</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Priority</div><div class="ClRgt">NA</div></li><li><div class="ClLft">Door Open Since</div><div class="ClRgt">NA</div></li>
						

						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="clear:both"></div>
					
				</div>
				</div>
                   
                </div>
				
				
				
				

            </div>
            <!-- energy meter ends -->
			
			
			
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
	
$('.bxslider555').bxSlider({
        slideWidth: 290,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	$('.bxslider558').bxSlider({
        slideWidth: 290,
        slideHeight: 290,
        minSlides: 4,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
	



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

