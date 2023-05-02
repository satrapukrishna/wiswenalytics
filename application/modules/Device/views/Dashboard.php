<?php //print_r( $jll); die();?>
<html>
<head>
    <?php $this->load->view('css3') ?>
	
  
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
	.bst {
		    background-color: #aaf593;
    width: 100%;
    line-height: 30px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
	}
	.bst1 {
		    background-color: #f2a099;
    width: 100%;
    line-height: 30px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
	}
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="firepump" />
		
		</div>
		
		
		
		
            
            <!-- Apollo code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div556">
                    <span class="TxtTtl imageadd">Client Name: Apollo</span>
                    <span class="TxtTtl imageadd">Total Devices: <?php echo count($apollo); ?> </span>
					
                    
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox556">
				<div class="bxslider556" id="bxid">
					<?php for ($i=0; $i <count($apollo) ; $i++) { 
						?>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:26%;line-height: 35px;text-align: center;"><?php echo $apollo[$i]['Device'];?> </span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Last Received Date</div><div class="ClRgt"><?php echo $apollo[$i]['Date'];?></div></li>
						<li><div class="ClLft">Last Received Time</div><div class="ClRgt"><?php echo $apollo[$i]['Time'];?></div></li>
						<li><div class="ClLft">Time Delay</div><div class="ClRgt"><?php echo $apollo[$i]['LateTime'];?></div></li>
						<li><div class="ClLft">Early Data Entry Time</div><div class="ClRgt"><?php echo $apollo[$i]['EarlyTime'];?></div></li>
						<?php if($apollo[$i]['status']==1){
							?>
						<li><div  class="bst">Data Received</div></li>	
							<?php
						}else{?>
						<li><div class="bst1">Data Not Received</div></li>
						<?php }?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					<?php } ?>
					
					
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- apollo code ends -->
            <!-- JLL code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div557">
                    <span class="TxtTtl imageadd">Client Name: JLL</span>
					<span class="TxtTtl imageadd">Total Devices: <?php echo count($jll); ?> </span>
                    
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox557">
				<div class="bxslider557" id="bxid">
					<?php for ($i=0; $i <count($jll) ; $i++) { 
						?>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:26%;line-height: 35px;text-align: center;"><?php echo $jll[$i]['Device'];?> </span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Last Received Date</div><div class="ClRgt"><?php echo $jll[$i]['Date'];?></div></li>
						<li><div class="ClLft">Last Received Time</div><div class="ClRgt"><?php echo $jll[$i]['Time'];?></div></li>
						<li><div class="ClLft">Time Delay</div><div class="ClRgt"><?php echo $jll[$i]['LateTime'];?></div></li>
						<li><div class="ClLft">Early Data Entry Time</div><div class="ClRgt"><?php echo $jll[$i]['EarlyTime'];?></div></li>
						<?php if($jll[$i]['status']==1){
							?>
						<li><div  class="bst">Data Received</div></li>	
							<?php
						}else{?>
						<li><div class="bst1">Data Not Received</div></li>
						<?php }?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					<?php } ?>
					
					
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- Jll code ends -->
            <!-- myhome code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 0 38px;">
                <div class="DshBrdSctnTtl" id="div557">
                    <span class="TxtTtl imageadd">Client Name: MyHome</span>
					<span class="TxtTtl imageadd">Total Devices: <?php echo count($myhome); ?> </span>
                    
					
					
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device" id="devicebox557">
				<div class="bxslider557" id="bxid">
					<?php for ($i=0; $i <count($myhome) ; $i++) { 
						?>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="height:26%;line-height: 35px;text-align: center;"><?php echo $myhome[$i]['Device'];?> </span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Last Received Date</div><div class="ClRgt"><?php echo $myhome[$i]['Date'];?></div></li>
						<li><div class="ClLft">Last Received Time</div><div class="ClRgt"><?php echo $myhome[$i]['Time'];?></div></li>
						<li><div class="ClLft">Time Delay</div><div class="ClRgt"><?php echo $myhome[$i]['LateTime'];?></div></li>
						<li><div class="ClLft">Early Data Entry Time</div><div class="ClRgt"><?php echo $myhome[$i]['EarlyTime'];?></div></li>
						<?php if($myhome[$i]['status']==1){
							?>
						<li><div  class="bst">Data Received</div></li>	
							<?php
						}else{?>
						<li><div class="bst1">Data Not Received</div></li>
						<?php }?>
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					
					<?php } ?>
					
					
					
				</div>
                   
                </div>
				
				

            </div>
            <!-- myhome code ends -->
	
        
            
        </div>
    </div>
   
  
  
</div>

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />



<script>	
 
$('.bxslider556').bxSlider({
        slideWidth: 296,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0
    });
$('.bxslider557').bxSlider({
        slideWidth: 296,
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
 

 </script>	
</html>

