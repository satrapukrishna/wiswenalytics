<?php //echo json_encode($dg_data);
//echo json_encode($dg_data[0]);
//die(); ?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />


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
    background-color: #e8e186!important;
    color: #10101c!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
.wtTxt{
        margin-top:-16px;
        position: absolute;
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
	margin: 12px 10px 0 0!important;
	
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
		<input type="hidden" id="page" value="energy" />
		<div class="DshBrdSctnTtl">
		
		</div>
		</div>
		
		
		<?php if(modules::run('Admin/Site/authlink','energy_Energy-Meter')){ ?>
		<!-- energy meter -->
		<?php  if($id==1 || $id==3){?> 
				<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="energy">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />Energy Meter</span><span class="spnclass">Vikrampuri</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox555"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<!-- <h4 class="head-h4">Floor - 1</h4> -->
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php for ($i=0; $i < count($energy_meters_data); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data[$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
                    <li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data[$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Month`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data[$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average/Day</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['avgcons'] ?> kWh</div></li>
						<!-- <li><div class="ClLft">Current KW</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['kw'] ?> kW</div></li> -->
						<!-- <li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['pf'] ?> </div></li> -->
						<!-- <li><div class="ClLft">KVA</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['kva'] ?> kVA</div></li> -->
						<!-- <li><div class="ClLft">KVAH</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['kvah'] ?> kVAH</div></li> -->
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['voltage1'] ?> V</div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['voltage2'] ?> V</div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['voltage3'] ?> V</div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['current1'] ?> A</div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['current2'] ?> A</div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data[$i]['current3'] ?> A</div></li>
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php }?>
					
					
				</div>
				</div>
                   
                </div>
				
				<!--- floor -2----->
				
				
				

            </div>
			<?php } if($id==2 || $id==3){?>
				<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="energy">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="40" />Energy Meter</span><span class="spnclass">Kondapur</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
					<span class="SctnVw Cllps dev" onclick="device(556)" id="device556"></span>
					<!-- <span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span> -->
                </div>
                <!-- floor -1---->
				<div class="DshBrdSctnDtls device devicebox556"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<!-- <h4 class="head-h4">Floor - 1</h4> -->
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php for ($i=0; $i < count($energy_meters_data_konda); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data_konda[$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Month`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average/Day</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Current KW</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['kw'] ?> kW</div></li>
						<li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['pf'] ?> </div></li>
						<li><div class="ClLft">KVA</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['kva'] ?> kVA</div></li>
						<li><div class="ClLft">KVAH</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['kvah'] ?> kVAH</div></li>
						<li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['voltage1'] ?> V</div></li>
						<li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['voltage2'] ?> V</div></li>
						<li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['voltage3'] ?> V</div></li>
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['current1'] ?> A</div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['current2'] ?> A</div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data_konda[$i]['current3'] ?> A</div></li>
					</ul>
					</div>
					</div>
					</div>
					</div>
					<?php }?>
					
					
				</div>
				</div>
                   
                </div>
				
				<!--- floor -2----->
				
				
				

            </div>
            <!-- energy meter ends -->
            <?php } } ?>
           

        <?php $this->load->view('common/footer3') ?>
            
        
    </div>
   
  
  
  
</div>

</body>



<script>	


$('.bxslider555').bxSlider({
        slideWidth: 300,
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
	$('.em'+id).show();
	$('.em-hide'+id).hide();
 }
 function em1(id){ 	
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

