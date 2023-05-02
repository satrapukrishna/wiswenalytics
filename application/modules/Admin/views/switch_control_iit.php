
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
.status-no{
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
.middle{
	padding: 19PX;
    padding-left: 0px;
	
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
.status-yes{
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
.left{
	width: 18%;
    float: left;
    padding-left: 10px;
    padding-top: 3px;
	padding-left: 7px;
    font-size: 12px;
    font-weight: bold;
}
.right{
	width: 36%;
    float: right;
    padding-left: 37px;
    padding-top: 3px;
    padding-bottom: 11px;
    font-size: 12px;
    font-weight: bold;
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
		
		
		<?php if(modules::run('Admin/Site/authlink','switch status_Switch-Status')){ ?>
		<!-- energy meter -->
        <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="swtch">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control-Clr.png" width="40" />Switch Status</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					
					
                </div>
                
				<div class="DshBrdSctnDtls device devicebox556" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;" id="devicebox556">
				<div class="bxslider556" id="bxid">
				<?php
				 
				for($k=0;$k<count($switch_status_data);$k++){
					if(isset($switch_status_data[$k]['phase'])){
						$res[$switch_status_data[$k]['phase']['meter']]['meter']=$switch_status_data[$k]['phase']['meter'];
						$res[$switch_status_data[$k]['phase']['meter']]['rphase']=$switch_status_data[$k]['phase']['rphase'];
						$res[$switch_status_data[$k]['phase']['meter']]['yphase']=$switch_status_data[$k]['phase']['yphase'];
						$res[$switch_status_data[$k]['phase']['meter']]['bphase']=$switch_status_data[$k]['phase']['bphase'];
						
					}

				}
				$t=0;
				$p=0;
				for($k=0;$k<count($switch_status_data);$k++){
					if($switch_status_data[$k]['meter']=="DG Room" || $switch_status_data[$k]['meter']=="Mains"){
						$res1[$t]['meter']=$switch_status_data[$k]['meter'];
						$res1[$t]['status']=$switch_status_data[$k]['status'];
						$res1[$t]['trip']=$switch_status_data[$k]['trip'];
						$t++;
						
					}else{
						$res2[$p]['meter']=$switch_status_data[$k]['meter'];
						$res2[$p]['status']=$switch_status_data[$k]['status'];
						$res2[$p]['trip']=$switch_status_data[$k]['trip'];
						$p++;
					}

				}
				//echo json_encode($res1[0]);die();
				
				

							  
							  ?>
							 
					
					
					
					<?php for ($i=0; $i < count($res1); $i++) 
         				 {?>
						<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">Status </span>
					<!-- <span class="SctnTtl"> </span> -->
					<ul class="SctnDtlsGrdTbl">
						<li class="middle"><div class="ClLft"><?php echo $res1[$i]['meter'] ?></div><div class="ClRgt">
                       
                                        
                                       
                        </div></li>
						<li class="middle"><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                        <span class="status-<?php echo $res1[$i]['status'] ?>"><?php echo strtoupper($res1[$i]['status']) ?></span>
                                       
                        </div></li>
						<?php /* if($res1[$i]['trip']='no'){ ?>
						<li class="middle"><div>
                       
                                        <span class="status-<?php echo $res1[$i]['trip'] ?>">NO TRIP</span>
                                       
                        </div></li>
						<?php }else{?>
							<li class="middle"><div>
                       
                                        <span class="status-<?php echo $res1[$i]['trip'] ?>">TRIP</span>
                                       
                        </div></li>
						<?php } */?>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php } ?>
					<?php for ($i=0; $i < count($res2); $i++) 
         				 {?>
						<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<!-- <span class="SctnTtl"><?php //echo $res2[$i]['meter'] ?> </span> -->
					<span class="SctnTtl">Status </span>
					<ul class="SctnDtlsGrdTbl">
					<li class="middle"><div class="ClLft"><?php echo $res2[$i]['meter'] ?></div><div class="ClRgt">
                       
                                        
                                       
					   </div></li>
						<li class="middle"><div class="ClLft">Switch Status</div><div class="ClRgt">
                       
                                        <span class="status-<?php echo $res2[$i]['status'] ?>"><?php echo strtoupper($res2[$i]['status']) ?></span>
                                       
                        </div></li>
						<?php /* if($res2[$i]['trip']='no'){ ?>
						<li class="middle"><div>
                       
                                        <span class="status-<?php echo $res2[$i]['trip'] ?>">NO TRIP</span>
                                       
                        </div></li>
						<?php }else{?>
							<li class="middle"><div>
                       
                                        <span class="status-<?php echo $res2[$i]['trip'] ?>">TRIP</span>
                                       
                        </div></li>
						<?php } */?>
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php } ?>
					
					
					
				</div>
				<!-- <div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">SB </span>
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
					<span class="SctnTtl">BG BUILDING </span>
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
					<span class="SctnTtl">FIRE FIGHTING </span>
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
					<span class="SctnTtl">LSB </span>
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
                    
					
				</div> -->
				<!-- <div class="bxslider556" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl">PROJECT </span>
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
					<span class="SctnTtl">MARKETING OFFICE </span>
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
					<span class="SctnTtl">PDB PUMP </span>
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

					
					
				</div> -->
                   
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
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider556').bxSlider({
        slideWidth: 355,
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
        slideWidth: 490,
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

