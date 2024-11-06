
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
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
	div.LiquidTank.Smll span.LiquidStatus{    right: -104px!important;font-size: 28px!important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.SctnVwAll{margin: 12px 10px 0 0;}
	.DshBrdSctnTtl{margin-bottom:10px!important}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr {
	background-color: #fff!important;
    box-shadow: none!important;
	border-radius: 10px;
	border: 1px solid #ccc;
	}
    .wtTxt{
        padding-left: 42px;
        position: absolute;
    }
	.fire_waterpump {width:100%;margin-left:0%}
	/* .status-on{
	display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 8px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 60px!important;
    text-align: center!important;
} */
.status-off{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 8px 0!important;
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
.status-na{
	display: inline-block!important;
    background-color: #ab7241!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 8px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 85px!important;
    text-align: center!important;
}
.status-on{
	display: inline-block!important;
    background-color: #52c785!important;
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

img{
vertical-align: middle;
margin-right:10px;
}
div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.Lnk{
	padding: 21px 40px 18px 20px!important;
}
.col{
    cursor: pointer;
	z-index:1000000;
	margin: 23px 10px 0 0!important;
	
	}
	.sp{
        height:195px;
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
	


    /* data table highcharts */
    .chart-outer {
    max-width: 800px;
    margin: 2em auto;
}

.highcharts-data-table table {
    border-collapse: collapse;
    border-spacing: 0;
    background: white;
    min-width: 100%;
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 0.9em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    border: 1px solid silver;
    padding: 0.5em;
}
.highcharts-data-table tr:nth-child(even), .highcharts-data-table thead tr {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #eff;
}
.highcharts-data-table caption {
    border-bottom: none;
    font-size: 1.1em;
    font-weight: bold;
}
.spnclass{
    border-radius: 3px;
    background: white;
    margin-left: 10px;
    font-size: 14px;
    font-weight: bold;
}
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3_rainbow') ?>
		<?php $this->load->view('common/header2_rainbow') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="water" />
		
		</div>
		
		<?php if($id==1 || $id==3){ ?>

			
		<?php if(modules::run('Admin/Site/authlink','water_Water-Level')){ ?>
		<!-- Bore Wells code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/water-level.png" width="30" />WATER TANK LEVELS</span> <span class="spnclass">Vikrampuri</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
                    <span class="SctnVwAll Cllps dev" onclick="deviceall()" ></span>
					<!-- <span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span> -->
					
                </div>
				
				
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<!-- <h4 class="head-h4">Terrace</h4> -->
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				
				<div class="bxslider555" id="bxid">
					
					
				<?php for ($i=0; $i < count($waterlevel_data); $i++) 
         				 {
                              if($waterlevel_data[$i]['meter']=='Raw Water'){
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
						
                        <?php }}?>


                        <?php for ($i=0; $i < count($waterlevel_data); $i++) 
         				 {
                            if($waterlevel_data[$i]['meter'] != 'Raw Water'){
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
						
                        <?php }}?>
					
					
				</div>
                
				</div>
                   
                </div>
				
				</div>
            <!-- Bore Wells code ends -->
            <?php } ?>
			<?php }
			if($id==2 || $id==3){?>
            <?php if(modules::run('Admin/Site/authlink','water_Water-Level')){ ?>
		<!-- Bore Wells code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/water-level.png" width="30" />WATER TANK LEVELS</span> <span class="spnclass">Kondapur</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
                    <!-- <span class="SctnVwAll Cllps dev" onclick="deviceall()" ></span> -->
					<!-- <span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span> -->
					
                </div>
				
				
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
				<div class="DshBrdSctnDtls device devicebox556"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<!-- <h4 class="head-h4">Terrace</h4> -->
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				
				<div class="bxslider556" id="bxid">
					
					
				<?php for ($i=0; $i < count($waterlevel_data_konda); $i++) 
         				 {
                              if($waterlevel_data_konda[$i]['meter']=='Raw Water'){
							  ?>	
					
						<div class="fire_waterpump">
						<div class="SctnDtlsHldr">
						<div class="SldrCntnr" style="border: 1px solid #ccc;">
						<div class="SctnDtls WtrTnkLvl">
						<div class="TnksHldr">
						<div class="LftHldr" style="margin-top:4%">
						<div class="LiquidTank">
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>"></div>
						</div>
						
						</div>
						
						<div class="RgtHldr" style="margin-top:4%">
						<div class="LiquidTank Smll">
						
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>"></div>
						<span class="LiquidStatus"><?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>%</span>
						</div>
						</div>
						<span class="SctnTtl tank-title"><?php echo $waterlevel_data_konda[$i]['meter'];?></span>
						</div>
					   
						<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Total Capacity</div><div class="ClRgt"><?php echo $waterlevel_data_konda[$i]['capacity'];  ?> KL</div></li>
						<li><div class="ClLft">Current Level</div><div class="ClRgt"><?php echo $waterlevel_data_konda[$i]['currentlevel'];  ?> KL</div></li>
						<li><div class="ClLft">Filled</div><div class="ClRgt"><?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>%</div></li>
						</ul>
						</div>
						</div>
						</div>
						</div>
						
                        <?php }}?>


                        <?php for ($i=0; $i < count($waterlevel_data_konda); $i++) 
         				 {
                            if($waterlevel_data_konda[$i]['meter'] != 'Raw Water'){
							  ?>	
					
						<div class="fire_waterpump">
						<div class="SctnDtlsHldr">
						<div class="SldrCntnr" style="border: 1px solid #ccc;">
						<div class="SctnDtls WtrTnkLvl">
						<div class="TnksHldr">
						<div class="LftHldr" style="margin-top:4%">
						<div class="LiquidTank">
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>"></div>
						</div>
						
						</div>
						
						<div class="RgtHldr" style="margin-top:4%">
						<div class="LiquidTank Smll">
						
						<div class="Liquid Liquidhigh l-<?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>"></div>
						<span class="LiquidStatus"><?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>%</span>
						</div>
						</div>
						<span class="SctnTtl tank-title"><?php echo $waterlevel_data_konda[$i]['meter'];?></span>
						</div>
					   
						<ul class="SctnDtlsGrdTbl">
						<li><div class="ClLft">Total Capacity</div><div class="ClRgt"><?php echo $waterlevel_data_konda[$i]['capacity'];  ?> KL</div></li>
						<li><div class="ClLft">Current Level</div><div class="ClRgt"><?php echo $waterlevel_data_konda[$i]['currentlevel'];  ?> KL</div></li>
						<li><div class="ClLft">Filled</div><div class="ClRgt"><?php echo $waterlevel_data_konda[$i]['filledpercent_1'];?>%</div></li>
						</ul>
						</div>
						</div>
						</div>
						</div>
						
                        <?php }}?>
					
					
				</div>
                
				</div>
                   
                </div>
				
				</div>
            <!-- Bore Wells code ends -->
            <?php } ?>
			<?php }?>
           
			
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
  
</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css"> -->

<script>
    
$('.bxslider555').bxSlider({
        slideWidth: 291,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider8').bxSlider({
        slideWidth: 293,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider9').bxSlider({
        slideWidth: 350,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider556').bxSlider({
        slideWidth: 294,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider557').bxSlider({
        slideWidth: 300,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
	$('.bxslider558').bxSlider({
        slideWidth: 350,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
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
$("#drop").change(function () {
        var val = this.value;
       
          var url = '<?php echo base_url()."Admin/Home/rainbow_water/";?>'+val; 
        window.location = url; 
        
        
    });
 </script>	
 
</html>

