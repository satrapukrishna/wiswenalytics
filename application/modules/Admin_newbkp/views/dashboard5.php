
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="firepump" />
		<div class="DshBrdSctnTtl">
		<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
		</div>
		</div>
		
		
		
		<!-- Bore Wells code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="div555">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />Energy Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(555)" id="device555"></span>
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox555" style="background-color:#fff;min-height: 355px;">
				<h4 style="padding: 10px;font-weight: 600;">Floor - 1</h4>
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;">EM 01 <span style="font-size:12px">(UPS INCOMER-01)</span><img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Consumed Active Energy</div><div class="ClRgt">382.0 kWh</div></li>
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
					<span class="SctnTtl" style="line-height: 72px;">EM 02 <span style="font-size:12px">(UPS INCOMER-02)</span><img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
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
					<span class="SctnTtl" style="line-height: 72px;">EM 03 <span style="font-size:12px">(RP INCOMER-01)</span><img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
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
					<span class="SctnTtl" style="line-height: 72px;">EM 04 <span style="font-size:12px">(Rp INCOMER-02)</span><img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
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
            <!-- Bore Wells code ends -->
		
			<!-- BTU code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div556">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />BTU Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(556)" id="device556"></span>
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox556">
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
					<span class="SctnTtl" style="height:105px;line-height: 72px;">BTU 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
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
            <!-- BTU code ends -->
            <!-- LPG code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div556">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />LPG</span>
          
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
          <span class="SctnVw Cllps" onclick="device(556)" id="device556"></span>
          
          
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
        <div class="DshBrdSctnDtls device" id="devicebox556">
        <div class="bxslider556" id="bxid">
          
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
           <div class="LPGCnnHldr">
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
                    <div class="LPGCnnHldr" >
                        <div id="lpg1"></div>

                        <span class="Ttl">PSI Bar</span>

                    </div>
                    
          </div>
          </div>
          </div>
          </div>
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
           <div class="LPGCnnHldr">
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
                    <div class="LPGCnnHldr">
                    <div id="lpg2"></div>
                        <span class="Ttl">PSI Bar</span>

                    </div>
                    <div class="LPGCnnHldr">

                    </div>
          </div>
          </div>
          </div>
          </div>
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="height:105px;line-height: 72px;">LPG 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
           <div class="LPGCnnHldr">
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
                    <div class="LPGCnnHldr">
                    <div id="lpg3"></div>
                        <span class="Ttl">PSI Bar</span>

                    </div>
                    <div class="LPGCnnHldr">

                    </div>
          </div>
          </div>
          </div>
          </div>
          
          
          
          
          
          
        </div>
                   
                </div>
        
        

            </div>
            <!-- LPG code ends -->
            
            <!-- UPS Start -->

            <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div556">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />UPS</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(556)" id="device556"></span>
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox556">
				<div class="bxslider557" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:105px;line-height: 72px;">UPS 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					
					<div style="width: 50%; float:left" >
   <ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Status</div><div class="ClRgt">Full Charge</div></li>
						<li><div class="ClLft">Number of Hours Used</div><div class="ClRgt">00:20:00</div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">No </div></li>
						
						
						<li class="em1" data-toggle="modal" data-target="#myModal" style="background-color:#eee;cursor:pointer;"><div class="ClLft" >More Details </div><div class="ClRgt"></div></li>
						
						
					</ul>
</div>

<div style="width: 50%; float:right">
  
						
						<div id="ups"></div>
						
						
					
</div>
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
            <!-- UPS End -->
			
<!-- dg start -->
 <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div556">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />DG Meter</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(558)" id="device558"></span>
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox558">
				<div class="bxslider558" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
						<div class="SctnDtls BorewellHldr">
							<?php 
							
							 $dgdata =  $dgdata = array("generatorId"=>"01SISMKPHB","status"=>"Off","lat"=>"17.49367","lng"=>"78.40086","currentFuel"=>779.607,"date"=>"04-09-2020","time"=>"03:50:07 PM","fuelCapacity"=>"1000.00","addr"=>"Sri Sai Plaza, Mumbai Hwy, KPHB Phase I, K P H B Phase 1, Kukatpally, Hyderabad, Telangana 500072, India","runningHours"=>"00:00:00","fuelConsumed"=>0,"Economy"=>0,"fuelAdded"=>0,"fuelTheft"=>0,"batVoltage"=>0,"batAlarm"=>0,"fuelAlarm"=>0);
							
							?>
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">Diesel Generator1</span>
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<?php if($dgdata['status']!='off'){?>							
							<button class="button_red">OFF</button>
							<?php }else{ ?>
							<button>ON</button>
							<?php }	?>
							</span>
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt"><?php echo $dgdata['fuelConsumed']?>0Ltrs</div></li>
							<li><div class="ClLft">Running Time</div><div class="ClRgt"><?php echo $dgdata['runningHours']?></div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt"><?php echo $dgdata['fuelAdded']?>Ltrs</div></li>
							<li><div class="ClLft">Available Fuel</div><div class="ClRgt"><?php echo $dgdata['currentFuel']?>Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt"><?php echo $dgdata['fuelTheft']?>Ltrs</div></li>
							 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt"><?php echo $dgdata['batVoltage']+23?> Volts</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2">
							<div class="LiquidTank Smll">
							<?php 
							/*$total_fuel=$dgdata[0]['fuelCapacity'];*/
							$total_fuel=500;
							$avial_fuel=$dgdata['currentFuel'];
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
							
							</div>
					
					</div>
					</div>
					</div>
					
					
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
							<?php 
							
							 $dgdata =  $dgdata = array("generatorId"=>"01SISMKPHB","status"=>"Off","lat"=>"17.49367","lng"=>"78.40086","currentFuel"=>779.607,"date"=>"04-09-2020","time"=>"03:50:07 PM","fuelCapacity"=>"1000.00","addr"=>"Sri Sai Plaza, Mumbai Hwy, KPHB Phase I, K P H B Phase 1, Kukatpally, Hyderabad, Telangana 500072, India","runningHours"=>"00:00:00","fuelConsumed"=>0,"Economy"=>0,"fuelAdded"=>0,"fuelTheft"=>0,"batVoltage"=>0,"batAlarm"=>0,"fuelAlarm"=>0);
							
							?>
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">Diesel Generator2</span>
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<?php if($dgdata['status']!='off'){?>							
							<button class="button_red">OFF</button>
							<?php }else{ ?>
							<button>ON</button>
							<?php }	?>
							</span>
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt"><?php echo $dgdata['fuelConsumed']?>0Ltrs</div></li>
							<li><div class="ClLft">Running Time</div><div class="ClRgt"><?php echo $dgdata['runningHours']?></div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt"><?php echo $dgdata['fuelAdded']?>Ltrs</div></li>
							<li><div class="ClLft">Available Fuel</div><div class="ClRgt"><?php echo $dgdata['currentFuel']?>Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt"><?php echo $dgdata['fuelTheft']?>Ltrs</div></li>
							 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt"><?php echo $dgdata['batVoltage']+23?> Volts</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2">
							<div class="LiquidTank Smll">
							<?php 
							/*$total_fuel=$dgdata[0]['fuelCapacity'];*/
							$total_fuel=500;
							$avial_fuel=$dgdata['currentFuel'];
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
							
							</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
							<?php 
							
							 $dgdata =  $dgdata = array("generatorId"=>"01SISMKPHB","status"=>"Off","lat"=>"17.49367","lng"=>"78.40086","currentFuel"=>779.607,"date"=>"04-09-2020","time"=>"03:50:07 PM","fuelCapacity"=>"1000.00","addr"=>"Sri Sai Plaza, Mumbai Hwy, KPHB Phase I, K P H B Phase 1, Kukatpally, Hyderabad, Telangana 500072, India","runningHours"=>"00:00:00","fuelConsumed"=>0,"Economy"=>0,"fuelAdded"=>0,"fuelTheft"=>0,"batVoltage"=>0,"batAlarm"=>0,"fuelAlarm"=>0);
							
							?>
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">Diesel Generator3</span>
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<?php if($dgdata['status']!='off'){?>							
							<button class="button_red">OFF</button>
							<?php }else{ ?>
							<button>ON</button>
							<?php }	?>
							</span>
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt"><?php echo $dgdata['fuelConsumed']?>0Ltrs</div></li>
							<li><div class="ClLft">Running Time</div><div class="ClRgt"><?php echo $dgdata['runningHours']?></div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt"><?php echo $dgdata['fuelAdded']?>Ltrs</div></li>
							<li><div class="ClLft">Available Fuel</div><div class="ClRgt"><?php echo $dgdata['currentFuel']?>Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt"><?php echo $dgdata['fuelTheft']?>Ltrs</div></li>
							 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt"><?php echo $dgdata['batVoltage']+23?> Volts</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2">
							<div class="LiquidTank Smll">
							<?php 
							/*$total_fuel=$dgdata[0]['fuelCapacity'];*/
							$total_fuel=500;
							$avial_fuel=$dgdata['currentFuel'];
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
							
							</div>
					</div>
					</div>
					</div>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
							<?php 
							
							 $dgdata =  $dgdata = array("generatorId"=>"01SISMKPHB","status"=>"Off","lat"=>"17.49367","lng"=>"78.40086","currentFuel"=>779.607,"date"=>"04-09-2020","time"=>"03:50:07 PM","fuelCapacity"=>"1000.00","addr"=>"Sri Sai Plaza, Mumbai Hwy, KPHB Phase I, K P H B Phase 1, Kukatpally, Hyderabad, Telangana 500072, India","runningHours"=>"00:00:00","fuelConsumed"=>0,"Economy"=>0,"fuelAdded"=>0,"fuelTheft"=>0,"batVoltage"=>0,"batAlarm"=>0,"fuelAlarm"=>0);
							
							?>
							<div class="DGCol-1">
							<div class="SctnTtl_main">
							<span class="SctnTtl">Diesel Generator4</span>
							<span class="SctnTtl_buttn">
							<button>AUTO</button>
							<?php if($dgdata['status']!='off'){?>							
							<button class="button_red">OFF</button>
							<?php }else{ ?>
							<button>ON</button>
							<?php }	?>
							</span>
							</div> 
							<ul class="SctnDtlsGrdTbl">
							<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt"><?php echo $dgdata['fuelConsumed']?>0Ltrs</div></li>
							<li><div class="ClLft">Running Time</div><div class="ClRgt"><?php echo $dgdata['runningHours']?></div></li>
							<li><div class="ClLft">Fuel Added</div><div class="ClRgt"><?php echo $dgdata['fuelAdded']?>Ltrs</div></li>
							<li><div class="ClLft">Available Fuel</div><div class="ClRgt"><?php echo $dgdata['currentFuel']?>Ltrs</div></li>
							<li><div class="ClLft">Fuel Removed</div><div class="ClRgt"><?php echo $dgdata['fuelTheft']?>Ltrs</div></li>
							 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt"><?php echo $dgdata['batVoltage']+23?> Volts</div></li>
							</ul>
							</div>
							
							<div class="DGCol-2">
							<div class="LiquidTank Smll">
							<?php 
							/*$total_fuel=$dgdata[0]['fuelCapacity'];*/
							$total_fuel=500;
							$avial_fuel=$dgdata['currentFuel'];
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
							
							</div>
					</div>
					</div>
					</div>
					
				</div>
                   
                </div>
				
				

            </div>
<!-- dg end -->
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
 
$('.bxslider555').bxSlider({
        slideWidth: 296,
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

$('.bxslider558').bxSlider({
        slideWidth: 300,
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

