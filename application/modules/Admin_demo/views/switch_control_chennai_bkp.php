
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
.status-trip{
	display: inline-block!important;
    background-color: #7678a5!important;
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
		
		
		<?php if(modules::run('Admin/Site/authlink','switchStatus')){ ?>
		<!-- energy meter -->
        <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="swtch">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control-Clr.png" width="40" />Switch Status</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox556" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
				<div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MAINS</span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">R PHASE</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">Y PHASE</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">B PHASE</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">MAINS MCB </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                        <span class="status-off">OFF</span>
                                       
                        </div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">
                       
                                        <span class="status-on">NO</span>
                                       
                        </div></li>
						<li></li>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">GENERATOR </span>
					<ul class="SctnDtlsGrdTbl">
					<li><div class="ClLft">R PHASE</div><div class="ClRgt">
                        
						<span class="status-on">ON</span>
								  
					</div></li>
					<li><div class="ClLft">Y PHASE</div><div class="ClRgt">
					
						<span class="status-on">ON</span>
								  
					</div></li>
					<li><div class="ClLft">B PHASE</div><div class="ClRgt">
					
						<span class="status-on">ON</span>
								  
					</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">GENERATOR MCB </span>
					<ul class="SctnDtlsGrdTbl">
					<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
					   <span class="status-off">OFF</span>
					  
						</div></li>
						<li><div class="ClLft">Trip Status</div><div class="ClRgt">
						
										<span class="status-on">NO</span>
										
						</div></li>
						<li></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php for ($i=6; $i <= 10; $i++) {                         
                     ?>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status <?php echo $i; ?> </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-off">OFF</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <?php } ?>
					
				</div>
				<div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status 11 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">03:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">09:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status 12 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                        
                                    <span class="status-on">ON</span>
                                   
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">05:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">06:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status 13 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                        <span class="status-trip">TRIP</span>
                                       
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">04:40:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">12:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Control 14 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-trip">TRIP</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Control 15 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-off">OFF</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php for ($i=16; $i <= 20; $i++) {                         
                     ?>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status <?php echo $i; ?> </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-trip">TRIP</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <?php } ?>
					
				</div>
				<div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status 21 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                        
                            <span class="status-trip">TRIP</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">03:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">09:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status 22 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                        
                                    <span class="status-off">OFF</span>
                                   
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">05:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">06:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status 23 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                        <span class="status-trip">TRIP</span>
                                       
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">04:40:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">12:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>

					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Control 24 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-off">OFF</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Control 25 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-off">OFF</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php for ($i=26; $i <= 30; $i++) {                         
                     ?>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Switch Status <?php echo $i; ?> </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                    <span class="status-off">OFF</span>
                                    
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">07:30:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">14:40:00</div></li>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <?php } ?>
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- energy meter ends -->
            <?php } ?>
            <?php if(modules::run('Admin/Site/authlink','swimming_pool')){ ?>
			<!-- Btu -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="swimm">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/motor-c.png" width="40" />Swimming Pool Controls</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(557)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox557" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox557">
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Swimming Pool Control 01 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Status</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">03:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">09:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Swimming Pool Control 02 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Status</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">13:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">05:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					
					
				</div>
                   
                </div>
				
				

            </div>
			<!---btu end --->
			<?php } ?>
            <?php if(modules::run('Admin/Site/authlink','motor_switch_control')){ ?>
			<!-- dg start -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="msc">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/motor-c.png" width="40" />Motor Switch Controls</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(558)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox558" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Motor Switch Control 01 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Status</div><div class="ClRgt">
                        
                        <span class="status-off">OFF</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">03:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">09:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Motor Switch Control 02 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Status</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">13:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">05:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					
					
				</div>
                   
                </div>
				
				

            </div>
<!-- dg end -->
<?php } ?>
<?php if(modules::run('Admin/Site/authlink','lighting_automation')){ ?>
<!-- UPS Start -->

<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="lac">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/motor-c.png" width="40" />Lighting Automation</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(559)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox559" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
				<div class="bxslider555" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Lighting Automation 01 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Status</div><div class="ClRgt">
                        
                            <span class="status-on">ON</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">03:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">09:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
                    <div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Lighting Automation 02 </span>
					<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Status</div><div class="ClRgt">
                        
                        <span class="status-off">OFF</span>
                                      
                        </div></li>
						<li><div class="ClLft">On Hours</div><div class="ClRgt">13:00:40</div></li>
						<li><div class="ClLft">Off Hours</div><div class="ClRgt">05:40:00</div></li>
						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					
					
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- UPS End -->
            <?php } ?>
             
	

        <?php $this->load->view('common/footer3') ?>
            
        
    </div>
   
  
  
  
</div>

</body>



<script>	



$('.bxslider555').bxSlider({
        slideWidth: 500,
        minSlides: 1,
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
