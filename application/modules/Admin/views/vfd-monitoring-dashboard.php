
<html>
<head>
    <?php $this->load->view('common/css3')?>
    <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/StyleSheet.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
	.bx-wrapper img{display:inline!important}
	/* .bxheight{height:400px!important;} */
	img{padding:0px;margin:0px;}
	.box{margin-top:5px;width:33.33%;float:left;}
	.small-box{width:33.33%;float:left; text-align:center;padding:5px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;}
	h3{font: 600 16px 'Open Sans'!important; color:#000;padding:0px;margin:0px}
	h5{font: 600 10px 'Open Sans'!important; color:#868181;margin-top:7px;margin-bottom:0px}
	.ahu-list{background-color:#f4f4f4; padding:5px;border-bottom:1px solid #dcd4d4}
	.no-border-right{border-right:none!important}
	.no-border-bottom{border-bottom:none!important}
	.bx-wrapper {
    margin-bottom:40px!important;
  }
  .no-radius-bottom{border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;}
  .status-working{
	  margin-top:3px;
	  letter-spacing: 1px;
    border-radius: 25px!important;
    padding: 3px 0!important;
    font: 600 10px 'Open Sans'!important;
    width: 55px!important;
    display: inline-block!important;
    background-color: #148614!important;
    color: #fff!important;
    box-sizing: border-box!important;
    text-align: center!important;
  }
  .status-stopped {
    letter-spacing: 1px;
	margin-top:3px;
    border-radius: 25px!important;
    padding: 5px 0!important;
    font: 600 10px 'Open Sans'!important;
    width: 75px!important;
    display: inline-block!important;
    background-color: #de3939!important;
    color: #fff!important;
    box-sizing: border-box!important;
    text-align: center!important;
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
  margin: 8px 10px 0 0!important;

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
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl{color:#000}

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
  text-align:left;
    border-bottom: 1px solid #ddd;}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{width:43%}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{width:57%}

    .imageadd img{ left: 0px!important;}
    .panel-group{margin-bottom:0px}
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls.IOQ div.SctnDtls.IOQFtr {
    padding: 20px;
    box-sizing: border-box;
    }
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr{padding:5px}
  .panel-title{color: #555!important;
    font-size: 16px!important;
    font-weight: bold!important;
    text-transform: uppercase!important;
    letter-spacing: 1px!important;
    word-spacing: 3px!important;
    text-decoration: none;line-height: 64px!important;}
  .hvac-bg-new{box-shadow: none!important;border-radius:15px!important}
  .panel-group .panel{border-radius:15px!important;}
  .panel-default{border-color: #ffffff;}
  .panel-default>.panel-heading{background-color: #fff;}
  .panel-default>.panel-heading+.panel-collapse>.panel-body{background-color:#f9f9f9}
  .panel-body{padding:0px!important}
  .sub-one{border-top:1px solid #eee;
  padding:10px!important;height:auto!important}
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
  .inner_collaps1{float: right;
    font: 600 22px 'Open Sans';
    color: #3c8dbc;
    margin-top: -18px;
    margin-right: 10px;
   cursor:pointer;
  }
  .inner_collaps:before{
  content: 'Collapse';
    }
  .Expndd:before {
    content: 'Expand!!'!important;
  }

  .Expndd1:before {
    content: '-'!important;
  }
  .on-img{margin-left:-22px}
  .cool-img{margin-left:-3px}
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls.IOQ div.SctnDtls.IOQFtr div.FtrOtrCrcl.presure-bg {background-color:#a3f3f7!important;}

    </style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">

        <?php $this->load->view('common/left_menu3')?>
        <?php $this->load->view('common/header2')?>


        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
        <div class="DshBrdSctn">
    <input type="hidden" id="page" value="aircondition" />
    </div>

	<!-- AHU starts -->
	<?php if (modules::run('Admin/Site/authlink', 'ahu')) {?>
           <!-- dg start -->
		   <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
		   		<div class="DshBrdSctnTtl" id="msc">
					<span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Motor-SwitchControl-Clr.png" width="40" />VFD Monitpring</span>
					<span class="SctnVw Cllps dev" onclick="device(558)" id="device556"></span>
				</div>
				<div class="DshBrdSctnDtls device devicebox558" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
					<div class="bxslider555" id="bxid">
						<div style="width:320px">
							<div class="SctnDtlsHldr">
								<div class="SldrCntnr">
									<div class="SctnDtls BorewellHldr">
										<span class="SctnTtl">VFD 01 </span>
										<ul class="SctnDtlsGrdTbl">
											<li>
												<div class="ClLft">Status</div>
												<div class="ClRgt"><span class="status-off">OFF</span></div>
											</li>
											<li>
												<div class="ClLft">Set Frequence</div>
												<div class="ClRgt">5 Min</div>
											</li>
											<li>
												<div class="ClLft">Running Hours</div>
												<div class="ClRgt">09:40:00</div>
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
										<span class="SctnTtl">VFD 02 </span>
										<ul class="SctnDtlsGrdTbl">
											<li>
												<div class="ClLft">Status</div>
												<div class="ClRgt"><span class="status-on">ON</span></div>
											</li>
											<li>
												<div class="ClLft">Set Frequence</div>
												<div class="ClRgt">5 Min</div>
											</li>
											<li>
												<div class="ClLft">Running Hours</div>
												<div class="ClRgt">05:40:00</div>
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
										<span class="SctnTtl">VFD 03 </span>
										<ul class="SctnDtlsGrdTbl">
											<li>
												<div class="ClLft">Status</div>
												<div class="ClRgt"><span class="status-on">ON</span></div>
											</li>
											<li>
												<div class="ClLft">Set Frequence</div>
												<div class="ClRgt">5 Min</div>
											</li>
											<li>
												<div class="ClLft">Running Hours</div>
												<div class="ClRgt">05:40:00</div>
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
										<span class="SctnTtl">VFD 04 </span>
										<ul class="SctnDtlsGrdTbl">
											<li>
												<div class="ClLft">Status</div>
												<div class="ClRgt"><span class="status-on">ON</span></div>
											</li>
											<li>
												<div class="ClLft">Set Frequence</div>
												<div class="ClRgt">5 Min</div>
											</li>
											<li>
												<div class="ClLft">Running Hours</div>
												<div class="ClRgt">05:40:00</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    <!-- AHU ends -->
    <?php }?>
			<?php if (modules::run('Admin/Site/authlink', 'trip_status')) {?>
	<!-- Chillers starts -->
    <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
        <div class="DshBrdSctnTtl" id="div7">
        <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/chillers2.png" width="45" />Chillers</span>

        <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
        <span class="SctnVw Cllps dev" onclick="device(5556)" id="device5556"></span>


		</div>
        <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>

        <div class="DshBrdSctnDtls device devicebox5556" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;margin-bottom:10px;">


			<div class="devicebox5556">
            <div class="bxslider9" id="bxid">

				<div class="box bxc1 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Chiller #01 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>5:25:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('c1')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc1" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('c2')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc2" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>
				<div class="box bxc2 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Chiller #02 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>11:45:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('c3')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc3" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('c4')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc4" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>
				<div class="box bxc3 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Chiller #03 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>14:09:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('c5')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc5" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('c6')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc6" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>
				<div class="box bxc4 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Chiller #04 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>9:08:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('c7')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc7" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('c8')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxc8" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Supply Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Return Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Supply Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Return Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Supply Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Return Air Temp.</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>




				</div>
                <!--<div style="clear:both"></div>  -->
            </div>
        </div>
	</div>
	<!-- Chiller ends -->
	<?php }?>
			<?php if (modules::run('Admin/Site/authlink', 'trip_status')) {?>
	<!-- Cooling starts -->
    <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
        <div class="DshBrdSctnTtl" id="div8">
        <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/cooling-c.png" width="45" />Cooling Tower</span>

        <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
        <span class="SctnVw Cllps dev" onclick="device3(5557)" id="device5557"></span>


		</div>
        <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>

        <div class="DshBrdSctnDtls device devicebox5557" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;margin-bottom:10px;">


			<div class="devicebox5557">
            <div class="bxslider11" id="bxid">

				<div class="box bxc1 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Cooling Tower #01 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>5:25:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('d1')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd1" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('d2')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd2" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>
				<div class="box bxc2 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Cooling Tower #02 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>11:45:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('d3')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd3" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('d4')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd4" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>
				<div class="box bxc3 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Cooling Tower #03 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>14:09:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('d5')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd5" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('d6')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd6" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>
				<div class="box bxc4 bxheight">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
						<span class="SctnTtl" style="line-height: 30px;border-bottom:1px solid #ccc;font: 600 16px 'Open Sans';color:#3c8dbc">Cooling Tower #04 </span>
						<div>
						<div class="small-box" style="width:25%">
						<span class="status-working">ON</span><br/>
						<h5>Status</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/run.png' width='20'>9:08:00</h3>
						<h5>Running Hrs  </h5>
						</div>
						<div class="small-box no-border-right">
						<h3><img src='<?php echo base_url(); ?>asset/admin/images/cool22.png' width='10'> 14&#8451;</h3>
						<h5>Set Point</h5>
						</div>
						<div style="clear:both"></div>

						</div>
						<div>
						<div class="small-box"  style="width:40%">
						<h3>14&#8451;</h3>
						<h5>Inlet Water Temp.</h5>
						</div>
						<div class="small-box" style="width:40%">
						<h3>20&#8451;</h3>
						<h5>Outlet Water Temp.</h5>
						</div>
						<div class="small-box no-border-right" style="width:20%">
						<h3>30&#8451;</h3>
						<h5>DeltaT </h5>
						</div>
						<div style="clear:both"></div>
						</div>
						<div class="ahu-list">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 1</h5>
						<span class="inner_collaps1" onclick="device2('d7')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd7" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>350 PSI</h3>
							<h5>Condensor Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>340 PSI</h3>
							<h5>Condensor Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Evaporator Pressure</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>30&#8451;</h3>
							<h5>Evaporator Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Enter Oil Temperature</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Suction Oil Temperature</h5>
							</div>

							<div style="clear:both"></div>
							</div>

						<div class="ahu-list no-border-bottom">
						<h5><img src='<?php echo base_url(); ?>asset/admin/images/com.png' width='20'> Compressor 2</h5>
						<span class="inner_collaps1" onclick="device2('d8')"><i class="fa fa-angle-down "></i></span>
						</div>
							<div class="deviceboxd8" style="display:none;background-color:#fff">
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Supply Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Return Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Supply Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Return Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>14&#8451;</h3>
							<h5>Supply Air Temp.</h5>
							</div>
							<div class="small-box" style="width:50%">
							<h3>26&#8451;</h3>
							<h5>Return Air Temp.</h5>
							</div>

							<div style="clear:both"></div>
							</div>
					</div>
					</div>
					</div>
				</div>




				</div>
                <!--<div style="clear:both"></div>  -->
            </div>
        </div>
	</div>
	<!-- Cooling ends -->
	<?php }?>





        <?php /*

<?php
$j=0;
foreach ($devices as $dev) {
$hardwares=$this->Api_data_model->get_hardwares($dev['category_id'],$dev['device_id']);
// $permission=str_replace(' ','_',$dev['device_name']);
// $permissions=$this->session->userdata('permissions');
if(($dev['device_id']!=9)&&($dev['device_id']!=10)){
if($hardwares->num_rows()>0){

// if(in_array($permission,explode(',',$permissions))){

?>

<!-- Bore Wells code starts -->
<div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
<div class="DshBrdSctnTtl" id="div<?php echo $dev['device_id']?>">
<span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $dev['dashboard_icon'] ?>" width="40" /><?php echo ucwords(strtolower($dev['device_name'])); ?></span>

<span class="SctnVw Cllps dev" onclick="device(<?php echo $dev['device_id']?> )" id="device<?php echo $dev['device_id']?>"></span>

</div>

<div class="DshBrdSctnDtls device devicebox<?php echo $dev['device_id']?>" style="background-color:#fff;" id="devicebox<?php echo $dev['device_id']?>">
<div class="device devicebox<?php echo $dev['device_id']?>">
<div class="bxslider<?php echo $dev['device_id']?>" id="bxid">
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

<div style="padding-top:20px;padding-bottom:20px">
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

</div>
<!-- Bore Wells code ends -->
<?php

}
}$j++;
}
?>

 */?>






        <?php $this->load->view('common/footer3')?>



</div>
</div>

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
<?php /*
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
 */?>
<script>

$('.bxslider555').bxSlider({
        slideWidth: 290,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
    $('.bxslider556').bxSlider({
        slideWidth: 500,
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
$('.bxslider7').bxSlider({
         slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
    touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });
$('.bxslider8').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });
$('.bxslider9').bxSlider({
        slideWidth: 450,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });
$('.bxslider10').bxSlider({
        slideWidth: 435,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });
$('.bxslider11').bxSlider({
        slideWidth: 435,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });

$('.bxslider558').bxSlider({
        slideWidth: 300,
        minSlides: 3,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });
<?php /*
// iaq data start
data = '[{"temp":30.7,"humidity":69.1,"co2":"NA"},{"tmp":[{"FromTime":"00:04:13","CurReading":"30.80"},{"FromTime":"00:19:43","CurReading":"30.80"},{"FromTime":"00:36:02","CurReading":"30.80"},{"FromTime":"00:51:31","CurReading":"30.80"},{"FromTime":"01:07:01","CurReading":"30.80"},{"FromTime":"01:22:33","CurReading":"30.80"},{"FromTime":"01:42:31","CurReading":"30.80"},{"FromTime":"02:02:18","CurReading":"30.70"},{"FromTime":"02:22:38","CurReading":"30.70"},{"FromTime":"02:42:27","CurReading":"30.70"},{"FromTime":"03:02:21","CurReading":"30.70"},{"FromTime":"03:22:25","CurReading":"30.70"},{"FromTime":"03:42:14","CurReading":"30.70"},{"FromTime":"04:02:11","CurReading":"30.70"},{"FromTime":"04:23:00","CurReading":"30.70"},{"FromTime":"04:43:55","CurReading":"30.80"},{"FromTime":"05:04:42","CurReading":"30.80"},{"FromTime":"05:25:30","CurReading":"30.70"},{"FromTime":"05:45:28","CurReading":"30.70"},{"FromTime":"06:05:46","CurReading":"30.70"},{"FromTime":"06:26:38","CurReading":"30.70"},{"FromTime":"06:46:28","CurReading":"30.60"},{"FromTime":"07:07:23","CurReading":"30.60"},{"FromTime":"07:26:36","CurReading":"30.60"},{"FromTime":"07:36:32","CurReading":"30.60"},{"FromTime":"07:46:26","CurReading":"30.60"},{"FromTime":"07:56:20","CurReading":"30.60"},{"FromTime":"08:06:15","CurReading":"30.60"},{"FromTime":"08:16:09","CurReading":"30.60"},{"FromTime":"08:26:32","CurReading":"30.50"},{"FromTime":"08:36:27","CurReading":"30.50"},{"FromTime":"08:46:22","CurReading":"30.50"},{"FromTime":"08:56:13","CurReading":"30.50"},{"FromTime":"09:06:36","CurReading":"30.50"},{"FromTime":"09:16:31","CurReading":"30.50"},{"FromTime":"09:26:26","CurReading":"30.40"},{"FromTime":"09:36:21","CurReading":"30.40"},{"FromTime":"09:46:17","CurReading":"30.50"},{"FromTime":"09:56:22","CurReading":"30.50"},{"FromTime":"10:06:17","CurReading":"30.50"},{"FromTime":"10:16:11","CurReading":"30.60"},{"FromTime":"10:26:35","CurReading":"30.60"},{"FromTime":"10:36:29","CurReading":"30.60"},{"FromTime":"10:46:24","CurReading":"30.60"},{"FromTime":"10:56:19","CurReading":"30.70"}],"hmd":[{"FromTime":"00:04:13","CurReading":"71.70"},{"FromTime":"00:19:43","CurReading":"71.90"},{"FromTime":"00:36:02","CurReading":"72.00"},{"FromTime":"00:51:31","CurReading":"71.80"},{"FromTime":"01:07:01","CurReading":"71.40"},{"FromTime":"01:22:33","CurReading":"71.10"},{"FromTime":"01:42:31","CurReading":"70.80"},{"FromTime":"02:02:18","CurReading":"69.90"},{"FromTime":"02:22:38","CurReading":"69.30"},{"FromTime":"02:42:27","CurReading":"69.10"},{"FromTime":"03:02:21","CurReading":"68.60"},{"FromTime":"03:22:25","CurReading":"67.90"},{"FromTime":"03:42:14","CurReading":"67.60"},{"FromTime":"04:02:11","CurReading":"67.80"},{"FromTime":"04:23:00","CurReading":"68.20"},{"FromTime":"04:43:55","CurReading":"69.10"},{"FromTime":"05:04:42","CurReading":"69.20"},{"FromTime":"05:25:30","CurReading":"69.80"},{"FromTime":"05:45:28","CurReading":"69.70"},{"FromTime":"06:05:46","CurReading":"69.70"},{"FromTime":"06:26:38","CurReading":"69.70"},{"FromTime":"06:46:28","CurReading":"69.50"},{"FromTime":"07:07:23","CurReading":"69.30"},{"FromTime":"07:26:36","CurReading":"69.20"},{"FromTime":"07:36:32","CurReading":"69.50"},{"FromTime":"07:46:26","CurReading":"69.50"},{"FromTime":"07:56:20","CurReading":"69.50"},{"FromTime":"08:06:15","CurReading":"69.60"},{"FromTime":"08:16:09","CurReading":"69.30"},{"FromTime":"08:26:32","CurReading":"69.00"},{"FromTime":"08:36:27","CurReading":"68.60"},{"FromTime":"08:46:22","CurReading":"68.50"},{"FromTime":"08:56:13","CurReading":"68.30"},{"FromTime":"09:06:36","CurReading":"68.40"},{"FromTime":"09:16:31","CurReading":"68.30"},{"FromTime":"09:26:26","CurReading":"67.80"},{"FromTime":"09:36:21","CurReading":"68.30"},{"FromTime":"09:46:17","CurReading":"68.20"},{"FromTime":"09:56:22","CurReading":"68.30"},{"FromTime":"10:06:17","CurReading":"68.50"},{"FromTime":"10:16:11","CurReading":"68.50"},{"FromTime":"10:26:35","CurReading":"68.60"},{"FromTime":"10:36:29","CurReading":"68.70"},{"FromTime":"10:46:24","CurReading":"69.10"},{"FromTime":"10:56:19","CurReading":"69.10"}],"co":0}]';

var d1 = JSON.parse(data);
$("#temp").text(d1[0]["temp"]+(' \u2103'));
$("#hmd").text(Math.round(d1[0]["humidity"])+(' %RH'));
$("#co").text(d1[0]["co2"]+(''));
$("#temptext").val(d1[0]["temp"]+(' \u2103'));
$("#hmdtext").val(Math.round(d1[0]["humidity"])+(' %RH'));

var xdata = new Array();
var ydata = new Array();

var xdatahmd = new Array();
var ydatahmd = new Array();

var xdataco = new Array();
var ydataco = new Array();
//var jsondata = JSON.parse(data);
for (i = 0; i < d1[1]['tmp'].length; i++)
{
xdata[i] = d1[1]['tmp'][i]['FromTime'];
ydata[i] = parseFloat(d1[1]['tmp'][i]['CurReading']);

}
for (i = 0; i < d1[1]['hmd'].length; i++)
{
xdatahmd[i] = d1[1]['hmd'][i]['FromTime'];
ydatahmd[i] = parseInt(d1[1]['hmd'][i]['CurReading']);

}
Highcharts.chart('container_temp', {
chart: {
type: 'line'
},credits: {
enabled: false
},
title: {
text: 'Temperature'
},

xAxis: {
categories: xdata
},
yAxis: {
title: {
text: 'Temperature oC'
},
tickInterval: 10,
min:0,
max:60

},

plotOptions: {
series: {
label: {
connectorAllowed: false
},
pointStart: 0
}
},

series: [{
name: 'Temperature',
data: ydata
}]
});

Highcharts.chart('container_hmd', {
chart: {
type: 'line'
},
credits: {
enabled: false
},
title: {
text: 'Humidity'
},

xAxis: {
categories: xdatahmd
},
yAxis: {
title: {
text: 'Humidity %RH'
},
tickInterval: 10,
min:0,
max:100

},

plotOptions: {
series: {
label: {
connectorAllowed: false
},
pointStart: 0
}
},

series: [{
name: 'Humidity',
data: ydatahmd
}]
});

Highcharts.chart('container_co2', {
chart: {
type: 'line'
},credits: {
enabled: false
},
title: {
text: 'CO2'
},

xAxis: {
categories: xdata
},
yAxis: {
title: {
text: 'CO2'
}
},

plotOptions: {
series: {
label: {
connectorAllowed: false
},
pointStart: 0
}
},

series: [{
name: 'CO2',
data: ydata
}]
});
Highcharts.chart('container_co', {
chart: {
type: 'line'
},credits: {
enabled: false
},
title: {
text: ' '
},

xAxis: {
categories: xdata
},
yAxis: {
title: {
text: 'CO'
}
},

plotOptions: {
series: {
label: {
connectorAllowed: false
},
pointStart: 0
}
},

series: [{
name: 'CO',
data: ydata
}]
});
Highcharts.chart('container_pressure', {
chart: {
type: 'line'
},credits: {
enabled: false
},
title: {
text: ' '
},

xAxis: {
categories: xdata
},
yAxis: {
title: {
text: 'Bar'
}
},

plotOptions: {
series: {
label: {
connectorAllowed: false
},
pointStart: 0
}
},

series: [{
name: 'Pressure1',
data: ydata
}]
});
Highcharts.chart('container_pm', {
chart: {
type: 'line'
},credits: {
enabled: false
},
title: {
text: ' '
},

xAxis: {
categories: xdata
},
yAxis: {
title: {
text: 'Micrograms per cubic meter'
}
},

plotOptions: {
series: {
label: {
connectorAllowed: false
},
pointStart: 0
}
},

series: [{
name: 'PM2.5',
data: ydata
}]
});
// iaq data end
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

 */?>
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
function device3(a){
  if($( ".devicebox"+a ).is( ":visible" ))
        {
       //alert("aaaa");
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
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow');
            $("#device"+a).removeClass("Expndd");
        }
}
function device2(a){
  if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow');
            $("#device"+a).addClass("Expndd1");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow');
            $("#device"+a).removeClass("Expndd1");
			$('.bx'+a).addClass("bxheight");
			//$(".devicebox5555").css("height", "500px");
			$(".bx-viewport").css("height", "fit-content");
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

