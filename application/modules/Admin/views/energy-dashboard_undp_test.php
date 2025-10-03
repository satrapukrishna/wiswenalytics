<?php //echo json_encode($dg_data);
//echo json_encode($dg_data[0]);
//die(); ?>
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
                
				  <!-- <h4 class="head-h4">Power Supply</h4> -->
				<!-- <span class="inner_collaps" onclick="device1(5551)" id="device5551"></span> -->
				<div class=" devicebox5551">
				<div class="bxslider555" id="bxid">
				<?php if(isset($energy_meters_data['uncf'])){ ?>
				<?php for ($i=0; $i < count($energy_meters_data['uncf']); $i++) 
         				 {?>
					<div style="width:320px">
					<div class="SctnDtlsHldr">
					<div class="SldrCntnr">
					<div class="SctnDtls BorewellHldr">
					<span class="SctnTtl" style="line-height: 72px;"><?php echo $energy_meters_data['uncf'][$i]['meter'] ?> <img style="float:right"src="<?php echo site_url() ?>asset/admin/img/device_icon_20200715211126.png" width="80" /></span>
					<ul class="SctnDtlsGrdTbl">
						
						<li><div class="ClLft">Today`s Consumption</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['todaycons'] ?> kWh</div></li>
						<li><div class="ClLft">Yesterday`s Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['yestcons'] ?> kWh</div></li>
						<li><div class="ClLft">Last 30 Days Consumption </div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['monthcons'] ?> kWh</div></li>
						<li><div class="ClLft">Average Last 30 days</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['avgcons'] ?> kWh</div></li>
						<li><div class="ClLft">Live kW</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['kw'] ?> kW</div></li>
						<!-- <li><div class="ClLft">PF</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['pf'] ?> </div></li> -->
						<!-- <li><div class="ClLft">Voltage_1</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['voltage1'] ?></div></li> -->
						<!-- <li><div class="ClLft">Voltage_2</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['voltage2'] ?></div></li> -->
						<!-- <li><div class="ClLft">Voltage_3</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['voltage3'] ?></div></li> -->
						<li><div class="ClLft">Current_1</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['current1'] ?></div></li>
						<li><div class="ClLft">Current_2</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['current2'] ?></div></li>
						<li><div class="ClLft">Current_3</div><div class="ClRgt"><?php echo $energy_meters_data['uncf'][$i]['current3'] ?></div></li>
					</ul>
                     
					</div>
					</div>
					</div>
					</div>
					<?php }}?>
					
					
				</div>
				</div>
                <div id="container_energy" style="width:100%"></div>	
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Hourly wise Consumption(In Day)</h4>
                <div id="container_energy_hrs" style="width:100%"></div>	</div>
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Quarterly Weekday wise Consumption</h4>
                <div id="container_energy1" style="width:100%"></div>	</div>
                
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Monthly Weekday wise Consumption</h4>
                <div id="container_energy2" style="width:100%"></div>	</div>

                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Weekday wise Consumption</h4>
                <div id="container_energy3" style="width:100%"></div>	</div>

                <!-- <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Day vs Night Consumption In Percentage</h4>
                <div id="container_energy4" style="width:100%"></div></div>
                
                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Day vs Night Consumption</h4>
                <div id="container_energy5" style="width:100%"></div></div> -->

               

                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">WeekDay vs Weekend Consumption</h4>
                <div id="container_energy7" style="width:100%"></div></div>

                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Year-on-Year Change</h4>
                <div id="container_energy8" style="width:100%"></div></div>

                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Consumption</h4>
                <div id="container_energy9" style="width:100%"></div></div>

                <div class="DshBrdSctnDtls device devicebox9"  style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;">
				<h4 class="head-h4">Average Unit consumption</h4>
                <div id="container_energy10" style="width:100%"></div></div>


                </div>
                     <!-- // -->
                     
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
	$('.bxslider55').bxSlider({
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
var energy_data_c1=<?php echo json_encode($energydata['unicef']);?>;
    
    //for(var k=0;k<energy_data_c1.length;k++){
        var meter=energy_data_c1[0]["meter"];
        var meter2=energy_data_c1[1]["meter"];
        var meter3=energy_data_c1[2]["meter"];
        var meter4=energy_data_c1[3]["meter"];
        var meter5=energy_data_c1[4]["meter"];
        
        
        
         var contain="container_energy";
         var xdata=energy_data_c1[0]["cons"];
         var xdata2=energy_data_c1[1]["cons"];
         var xdata3=energy_data_c1[2]["cons"];
         var xdata4=energy_data_c1[3]["cons"];
         var xdata5=energy_data_c1[4]["cons"];
         
        
         var time=energy_data_c1[0]["time"];
        
        // for(var i=0;i<energy_data_c1[0]["c1_data"].length;i++){
        // time = (new Date(energy_data_c1[0]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        // xdata.push([time, parseFloat(energy_data_c1[0]["c1_data"][i]["CurReading"])]);
        // }
        // for(var i=0;i<energy_data_c1[1]["c1_data"].length;i++){
        //     time = (new Date(energy_data_c1[1]["c1_data"][i]["time"])).getTime()+(5*60+30)*60000;

        // xdata2.push([time, parseFloat(energy_data_c1[1]["c1_data"][i]["CurReading"])]);
        // }
        

        Highcharts.chart(contain, {
    

    credits: {
        enabled: false
    },
    title: {
        text: ""
    },credits: {
    enabled: false
  },
    chart: {
        type: 'line'
    },
    yAxis: {
       
        title: {
            text: 'Kwh'
        }
    },
    xAxis: {
      type: 'datetime',
      categories: time
    },tooltip: {
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
    },{
      name: meter2,
      data: xdata2,
    },{
      name: meter3,
      data: xdata3,
    },{
      name: meter4,
      data: xdata4,
    },{
      name: meter5,
      data: xdata5,
    }]
  
});
    
    var energy_quarter_data=<?php echo json_encode($energydat_quarterly_weekday_wise_consumption['tero']);?>;
    Highcharts.chart('container_energy1', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['<b>Quarter2(April 1st To June 30th)</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>Quarter3(July 1st To Sept 30th)</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },credits: {
    enabled: false
  },
    tooltip: {
        valueSuffix: ' Kwh'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: energy_quarter_data['meter'][0],
            data: energy_quarter_data['data'][0],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        },{
            name: energy_quarter_data['meter'][1],
            data: energy_quarter_data['data'][1],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        },
        {
            name: energy_quarter_data['meter'][2],
            data: energy_quarter_data['data'][2],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        },
        {
            name: energy_quarter_data['meter'][3],
            data: energy_quarter_data['data'][3],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        },
        {
            name: energy_quarter_data['meter'][4],
            data: energy_quarter_data['data'][4],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        }
    ]
});


var energy_monthly_data=<?php echo json_encode($energydat_monthly_weekday_wise_consumption['tero']);?>;
    Highcharts.chart('container_energy2', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },credits: {
    enabled: false
  },
    xAxis: {
       // categories: ['<b>Jan</b>','Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>Feb</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>March</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>April</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>May</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>June</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>July</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>Aug</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],       
    categories: ['<b>June</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','<b>July</b>', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

       crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: energy_monthly_data['meter'][0],
            data: energy_monthly_data['mdata'][0],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        }, {
            name: energy_monthly_data['meter'][1],
            data: energy_monthly_data['mdata'][1],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        }, {
            name: energy_monthly_data['meter'][2],
            data: energy_monthly_data['mdata'][2],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        }, {
            name: energy_monthly_data['meter'][3],
            data: energy_monthly_data['mdata'][3],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        }, {
            name: energy_monthly_data['meter'][4],
            data: energy_monthly_data['mdata'][4],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                colr: 'Verdana, sans-serif'
            }
        }
        }
    ]
});
var energy_weekday_data=<?php echo json_encode($energydat_weekday_wise_consumption['tero']);?>;
var chart = Highcharts.chart('container_energy3', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },credits: {
    enabled: false
  },
    xAxis: {
        categories: ['Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],        crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    }
    
});

  for( let i = 0; i < energy_weekday_data['mdata'].length; i++ ) {
    this.chart.addSeries({
            name: energy_weekday_data['meter'][i],
            data: energy_weekday_data['mdata'][i],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    colr: 'Verdana, sans-serif'
                }   
            },
    }, false);
  }
  
  chart.redraw();




// var energy_day_night_data=<?php echo json_encode($energydat_day_night_consumption['tero']);?>;

// Highcharts.chart('container_energy4', {
//     chart: {
//         type: 'pie',
//         custom: {}
//     },
//     accessibility: {
//         point: {
//             valueSuffix: '%'
//         }
//     },
//     title: {
//         text: ''
//     },
//     tooltip: {
//         pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
//     },
//     legend: {
//         enabled: false
//     },credits: {
//     enabled: false
//   },
//     plotOptions: {
//         series: {
//             allowPointSelect: true,
//             cursor: 'pointer',
//             borderRadius: 8,
//             dataLabels: [{
//                 enabled: true,
//                 distance: 20,
//                 format: '{point.name}'
//             }, {
//                 enabled: true,
//                 distance: -15,
//                 format: '{point.percentage:.0f}%',
//                 style: {
//                     fontSize: '0.9em'
//                 }
//             }],
//             showInLegend: true
//         }
//     },
//     series: [{
//         name: energy_day_night_data['meter'],
//         colorByPoint: true,
//         innerSize: '75%',
//         data: [{
//             name: 'day',
//             y: energy_day_night_data['avgdaycons']
//         }, {
//             name: 'night',
//             y: energy_day_night_data['avgnightcons']
//         }]
//     }]
// });
// Highcharts.chart('container_energy5', {
//     chart: {
//         type: 'pie',
//         custom: {},
       
//     },
//     accessibility: {
//         point: {
//             valueSuffix: 'Kwh'
//         }
//     },
//     title: {
//         text: ''
//     },
//     tooltip: {
//         pointFormat: '{series.name}: <b>{point.y:.0f}Kwh</b>'
//     },
//     legend: {
//         enabled: false
//     },credits: {
//     enabled: false
//   },
//     plotOptions: {
//         series: {
//             allowPointSelect: true,
//             cursor: 'pointer',
//             borderRadius: 8,
//             dataLabels: [{
//                 enabled: true,
//                 distance: 20,
//                 format: '{point.name}'
//             }, {
//                 enabled: true,
//                 distance: -15,
//                 format: '{point.y:.0f}Kwh',
//                 style: {
//                     fontSize: '0.9em'
//                 }
//             }],
//             showInLegend: true
//         }
//     },
//     series: [{
//         name: 'Consumption',
//         colorByPoint: true,
//         innerSize: '75%',
//         data: [{
//             name: 'day',
//             y: energy_day_night_data['daycons']
//         }, {
//             name: 'night',
//             y: energy_day_night_data['nightcons']
//         }]
//     }]
// });
// Highcharts.setOptions({
//     colors: Highcharts.getOptions().colors.map(function (color) {
//         return {
//             radialGradient: {
//                 cx: 0.5,
//                 cy: 0.3,
//                 r: 0.7
//             },
//             stops: [
//                 [0, color],
//                 [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
//             ]
//         };
//     })
// });

var energy_weekday_weekend_data=<?php echo json_encode($energydat_weekday_wise_consumption['tero']);?>;
// Build the chart
Highcharts.chart('container_energy7', {
    chart: {
        type: 'pie',
        zooming: {
            type: 'xy'
        },
        panning: {
            enabled: true,
            type: 'xy'
        },
        panKey: 'shift'
    },credits: {
    enabled: false
  },
    title: {
        text: ''
    },
    tooltip: {
        valueSuffix: 'Kwh'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.y:.1f}Kwh',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Consumption',
            colorByPoint: true,
            data: [
                {
                    name: 'Weekend',
                    y: energy_weekday_weekend_data['weekend']
                },
                {
                    name: 'Weekdays',
                    sliced: true,
                    selected: true,
                    y: energy_weekday_weekend_data['weekdays']
                }
            ]
        }
    ]
});
var energy_year_to_year_data=<?php echo json_encode($energydat_monthly_year_to_year_consumption['tero']);?>;
var chart_2=Highcharts.chart('container_energy8', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ''
    },credits: {
    enabled: false
  },
    xAxis: {
        categories: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        accessibility: {
            description: 'Months of the year'
        }
    },
    yAxis: {
        title: {
            text: 'Temperature'
        },
        labels: {
            format: '{value}°'
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
    
});
for( let i = 0; i < energy_weekday_data['mdata'].length; i++ ) {
    this.chart_2.addSeries({
            name: energy_year_to_year_data['this_yaer'][i],
            data: energy_year_to_year_data['this_yaer_data'][i],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    colr: 'Verdana, sans-serif'
                }   
            },
    }, false);
    this.chart_2.addSeries({
            name: energy_year_to_year_data['last_yaer'][i],
            data: energy_year_to_year_data['last_yaer_data'][i],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    colr: 'Verdana, sans-serif'
                }   
            },
    }, false);
  }
  
  chart_2.redraw();

var chart_3=Highcharts.chart('container_energy9', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },credits: {
    enabled: false
  },
    xAxis: {
        categories: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        crosshair: true,
        accessibility: {
            description: ''
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh</b>'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    }
});
for( let i = 0; i < energy_year_to_year_data['this_yaer_data'].length; i++ ) {
    this.chart_3.addSeries({
            name: energy_year_to_year_data['meter'][i],
            data: energy_year_to_year_data['this_yaer_data'][i],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    colr: 'Verdana, sans-serif'
                }   
            },
    }, false);
    
  }
  
  chart_3.redraw();
var chart_4=Highcharts.chart('container_energy10', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    }, credits: {
    enabled: false
  },
    xAxis: {
        categories: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        crosshair: true,
        accessibility: {
            description: ''
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh</b>'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    }
});
for( let i = 0; i < energy_year_to_year_data['this_yaer_data_avg'].length; i++ ) {
    this.chart_4.addSeries({
            name: energy_year_to_year_data['meter'][i],
            data: energy_year_to_year_data['this_yaer_data_avg'][i],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    colr: 'Verdana, sans-serif'
                }   
            },
    }, false);
    
  }
  
  chart_4.redraw();
  var energydat_hourly_wise_consumption=<?php echo json_encode($energydat_hourly_wise_consumption);?>;

  var chart_5=Highcharts.chart('container_energy_hrs', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ''
    }, credits: {
    enabled: false
  },
    xAxis: {
        
        crosshair: true,
        accessibility: {
            description: ''
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        valueSuffix: ' Kwh</b>'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    }
});
for( let i = 0; i < energydat_hourly_wise_consumption['unicef'].length; i++ ) {
    this.chart_5.addSeries({
            name: energydat_hourly_wise_consumption['unicef'][i]['meter'],
            data: energydat_hourly_wise_consumption['unicef'][i]['cons'],
            dataLabels: {
            enabled: true,
            // rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            // y: 1, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    colr: 'Verdana, sans-serif'
                }   
            },
    }, false);
    
  }
  
  chart_5.redraw();
 </script>
</html>

