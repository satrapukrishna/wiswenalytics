<?php //echo json_encode($ahudata); die();?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
    <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/StyleSheet.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
	.bx-wrapper img{display:inline!important}
	.bxheight{/*height:400px!important;*/}
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
        
        <?php $this->load->view('common/left_menu3_apollo') ?>
        <?php $this->load->view('common/header2ap') ?>
        
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
        <div class="DshBrdSctn">
    <input type="hidden" id="page" value="aircondition" />
    </div>
	
	
   
    
                    
					<!-- Boiler meter -->
  <?php  ?>
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="boilers">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="40" />Boilers</span>
          
                    
          
          <span class="SctnVw Cllps dev" onclick="device(8)" id="device8"></span>
          
                </div>
                <!-- floor -1---->
        <div class="DshBrdSctnDtls device devicebox8"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
        <h4 class="head-h4">Basement - 1</h4>
        <span class="inner_collaps" onclick="device1(81)" id="device81"></span>
        <div class=" devicebox81">
        <div class="bxslider8" id="bxid">
          
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="line-height: 40px;">Boiler 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
          <br/><span class="status-working">ON</span> 
          </span>
          <ul class="SctnDtlsGrdTbl">
            
            <li><div class="ClLft">Running Hours</div><div class="ClRgt">09 Hours 02Min</div></li>
            <li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">250 Ltrs</div></li>
            <li><div class="ClLft">Fuel Added</div><div class="ClRgt">200 Ltrs</div></li>
            <li><div class="ClLft">Economy</div><div class="ClRgt">27.7</div></li>

            
            
            
          </ul>
          </div>
          </div>
          </div>
          </div>
          
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="line-height: 40px;">Boiler 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
          <br/><span class="status-stopped">OFF</span> 
          </span>
          <ul class="SctnDtlsGrdTbl">
            
            
            <li><div class="ClLft">Running Hours</div><div class="ClRgt">00 Hours 02Min</div></li>
            <li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">0 Ltrs</div></li>
            <li><div class="ClLft">Fuel Added</div><div class="ClRgt">0 Ltrs</div></li>
            <li><div class="ClLft">Economy</div><div class="ClRgt">0</div></li>

            
            
            
          </ul>
          </div>
          </div>
          </div>
          </div>
          
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="line-height: 40px;">Boiler 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
          <br/><span class="status-working">ON</span> 
          </span>
          <ul class="SctnDtlsGrdTbl">
            
            <li><div class="ClLft">Running Hours</div><div class="ClRgt">08 Hours 02Min</div></li>
            <li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">179 Ltrs</div></li>
            <li><div class="ClLft">Fuel Added</div><div class="ClRgt">180 Ltrs</div></li>
            <li><div class="ClLft">Economy</div><div class="ClRgt">22.3</div></li>

            
            
            
          </ul>
          </div>
          </div>
          </div>
          </div>
          
          <div style="width:320px">
          <div class="SctnDtlsHldr">
          <div class="SldrCntnr">
          <div class="SctnDtls BorewellHldr">
          <span class="SctnTtl" style="line-height: 40px;">Boiler 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
          <br/><span class="status-working">ON</span> 
          </span>
          <ul class="SctnDtlsGrdTbl">
            
            <li><div class="ClLft">Running Hours</div><div class="ClRgt">5 Hours 02Min</div></li>
            <li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">140 Ltrs</div></li>
            <li><div class="ClLft">Fuel Added</div><div class="ClRgt">160 Ltrs</div></li>
            <li><div class="ClLft">Economy</div><div class="ClRgt">28</div></li>

            
            
            
          </ul>
          </div>
          </div>
          </div>
          </div>
          
        </div>
        </div>
                   
                </div>
              
            </div>
            <?php  ?>
            <!-- Boiler meter ends -->
                    
                    
                
                </div>
                </div>
                   
                </div>
    </div>
    <!-- AHU ends -->
    
	<!-- Boiler meter -->
	<?php  ?>
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="boilers">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="40" />Boilers</span>
					
                    
					
					<span class="SctnVw Cllps dev" onclick="device(8)" id="device8"></span>
					
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox8"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Basement - 1</h4>
				<span class="inner_collaps" onclick="device1(81)" id="device81"></span>
				<div class=" devicebox81">
				<div class="bxslider8" id="bxid">
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 01 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-working">ON</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Running Hours</div><div class="ClRgt">09 Hours 02Min</div></li>
						<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">250 Ltrs</div></li>
						<li><div class="ClLft">Fuel Added</div><div class="ClRgt">200 Ltrs</div></li>
						<li><div class="ClLft">Economy</div><div class="ClRgt">27.7</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 02 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-stopped">OFF</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						
						<li><div class="ClLft">Running Hours</div><div class="ClRgt">00 Hours 02Min</div></li>
						<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">0 Ltrs</div></li>
						<li><div class="ClLft">Fuel Added</div><div class="ClRgt">0 Ltrs</div></li>
						<li><div class="ClLft">Economy</div><div class="ClRgt">0</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 03 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-working">ON</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Running Hours</div><div class="ClRgt">08 Hours 02Min</div></li>
						<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">179 Ltrs</div></li>
						<li><div class="ClLft">Fuel Added</div><div class="ClRgt">180 Ltrs</div></li>
						<li><div class="ClLft">Economy</div><div class="ClRgt">22.3</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 40px;">Boiler 04 <img style="float:right"src="<?php echo site_url() ?>asset/admin/images/Boilers-Clr.png" width="70" />
					<br/><span class="status-working">ON</span> 
					</span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Running Hours</div><div class="ClRgt">5 Hours 02Min</div></li>
						<li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">140 Ltrs</div></li>
						<li><div class="ClLft">Fuel Added</div><div class="ClRgt">160 Ltrs</div></li>
						<li><div class="ClLft">Economy</div><div class="ClRgt">28</div></li>

						
						
						
					</ul>
					</div>
					</div>
					</div>
					</div>
					
				</div>
				</div>
                   
                </div>
              
            </div>
            <?php  ?>
            <!-- Boiler meter ends -->
	
			
			
      
         
        

        <?php $this->load->view('common/footer3') ?>
            
       

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
        slideMargin: 0
    });
$('.bxslider8').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
$('.bxslider9').bxSlider({
        slideWidth: 450,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
$('.bxslider10').bxSlider({
        slideWidth: 435,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
$('.bxslider11').bxSlider({
        slideWidth: 435,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });

$('.bxslider558').bxSlider({
        slideWidth: 300,
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

