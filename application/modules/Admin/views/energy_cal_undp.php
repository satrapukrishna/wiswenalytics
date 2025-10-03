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
		
		<?php $this->load->view('common/left_menu3t') ?>
		<?php $this->load->view('common/header2t') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="energy" />
		<div class="DshBrdSctnTtl">
		
		</div>
		</div>
		
		
		<div class="GnPgCntntDvHldr NoBG FllDtlsHldr" style="margin:10px;">
            <div id="InnrCntntHldrDv" class="InnrCntntHldr FllPgScrllPd">
                <div class="FormHldr">
                    
                    <div class="row NoBrdr NoBG PaddBottom">
                        <div class="col-1 NoPd">
                            <div class="DashboardHldr TmpltTwo">
                                <div class="DshHdrHldr TmpltTwo Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">
                                            <!-- <img class="IcnImg" src="AppTheme/ModIcon/BMS-Restaurant-EnergyMeter.svg"> -->
                                            Monthly Usage Overview</span>
                                    </div>
                                </div>
                                <div class="DshDtlHldr TmpltTwo">
                                    <div class="FormHldr">
                                        <div class="row NoBrdr PaddBottom NoBG">
                                            <div class="col-1 NoPd">
                                                <div class="FormHldr Search ThemeOne">
                                                    <div class="row NoBG NoBrdr">
                                                        <div class="col-1 NoPd">
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" type="radio" name="filter" value="0" checked="">
                                                                <label>Total Consumption</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" name="filter" value="1" type="radio">
                                                                <label>Day Consumption</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" name="filter" value="2" type="radio">
                                                                <label>Night Consumption</label>
                                                            </div>
                                                            <div class="FormCheck" style="margin-left: 50%">
                                                                
                                                                <label>Avg Consumption</label>
                                                                <label id='kwh'></label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: 100%; height: 100%;">
                                                    <div id="calendar"></div>
                                                    <div class="light_green"  style=" margin-right: 66%;font-weight: bold;" >Consumption 5% lower and higher than average .</div> <br>
                                                    <div class="dark_green"  style=" margin-right: 66%;font-weight: bold;color:#f0e9e9" >Consumption 10% lower than average .</div> <br>
                                                    <div class="yellow"  style=" margin-right: 66%;font-weight: bold;"  >Consumption 5% higher than average.</div> <br>
                                                    <div class="red"  style=" margin-right: 66%;font-weight: bold;" >Consumption 10% higher than average.<br></div> 
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row ExtraPaddTop PaddBottom NoBG">
                                            <div class="col-1 NoPd">
                                                <div class="BMSDshbrdBlck ThemeOne NoBrdr NoMrgn">
                                                    <div class="BMSDshbrdDtlsHldr">
                                                        <div class="BMSDshbrdDtlDv GrphDv FllHght">
                                                            <div class="GrphHldr" id="container">
                                                                <!-- <div class="GrphDv" id="container" ></div> -->
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
			
	

        <?php $this->load->view('common/footer3') ?>
            
        
    </div>
   
  
  
  
</div>

</body>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/Theme/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/Theme/AppTheme/Fonts/IconFont.css" />
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
<style>
    
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: #f5f5f5;
        }

        #calendar {
            /* max-width: 1000px; */
            width: 100%;
            margin: 20px 0; 
            /* background: #fff;
            border-radius: 12px;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
        }

        .kwh-box {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .kwh-value {
            font-size: 18px;
            color: #0a0a0a;
        }

        .kwh-unit {
            font-size: 12px;
            color: #0a0a0a;
        }
        
        .light_green {
          
            background:rgb(144, 238, 144) !important;
        }        
        .dark_green {
            background:rgb(4, 102, 40) !important;
        }
        
        .yellow {
            background:rgb(255, 165, 0) !important;
        }        
        .red {
            background:rgb(248, 45, 45) !important;
        }
        .fc {
            font-family: Arial, Helvetica, sans-serif !important;
            font-weight: normal;
        }
        .energy-value {
            font-weight: bold;
        }
    </style>
<script>
    var calendar;
 function createCalendar(data,[],fval) {
    let today = new Date();
    let ymd = today.toISOString().split('T')[0]; 
    graph_data(ymd);
    var calendarEl = document.getElementById('calendar');
    const kwhData = data[0]['consumption'];
   
calendar = new FullCalendar.Calendar(calendarEl, {
  headerToolbar: {
    left: 'prev',
    center: 'title',
    right: 'next'
  },
//   initialDate: '2025-08-23',
  dayCellDidMount: function (info) {                    
                    const d = info.date;
                    const dateStr = d.getFullYear() + '-' +
                        String(d.getMonth() + 1).padStart(2, '0') + '-' +
                        String(d.getDate()).padStart(2, '0');

                    const frame = info.el.querySelector('.fc-daygrid-day-frame');
                    
                    const dayNumEl = info.el.querySelector('.fc-daygrid-day-number');
                    // if (dayNumEl) {
                    //     dayNumEl.textContent = String(info.date.getDate()).padStart(2, '0');
                    // }

                    const val = kwhData[dateStr];
                    let displayVal = '-';
                    let bucketClass = 'none';
                    if(fval==0){
                        document.getElementById("kwh").innerText = "207.8 kWh";
                        // document.getElementById("bartxt").innerText = "";
                        if (typeof val === 'number') {
                        displayVal = val;
                        if(val >= 197.41 && val <= 218.19){
                            bucketClass ='light_green';
                        }else if(val < 197.41){
                            bucketClass ='dark_green';
                        }else if(val > 218.19 && val <= 228.58){
                            bucketClass ='yellow';
                        }else if(val > 228.58){
                            bucketClass ='red';
                        }
                        //bucketClass = (val <= 488 && val >= 540) ? 'light_green' : ((val <= 541 && val >= 565) ? 'dark_green' : 'yellow');
                    }

                    }else if(fval==1){
                        document.getElementById("kwh").innerText = "151.8 kWh";
                        if (typeof val === 'number') {
                        displayVal = val;
                        if(val >= 144.21 && val <= 159.39){
                            bucketClass ='light_green';
                        }else if(val < 144.21){
                            bucketClass ='dark_green';
                        }else if(val > 159.39 && val <= 166.98){
                            bucketClass ='yellow';
                        }else if(val > 166.98){
                            bucketClass ='red';
                        }
                        //bucketClass = (val <= 488 && val >= 540) ? 'light_green' : ((val <= 541 && val >= 565) ? 'dark_green' : 'yellow');
                    }

                    }else{
                        document.getElementById("kwh").innerText = "56 kWh";
                        if (typeof val === 'number') {
                        displayVal = val;
                        if(val >= 53.2 && val <= 58.8){
                            bucketClass ='light_green';
                        }else if(val < 53.2){
                            bucketClass ='dark_green';
                        }else if(val > 58.8 && val <= 61.6){
                            bucketClass ='yellow';
                        }else if(val > 61.6){
                            bucketClass ='red';
                        }
                        //bucketClass = (val <= 488 && val >= 540) ? 'light_green' : ((val <= 541 && val >= 565) ? 'dark_green' : 'yellow');
                    }
                    }
                    

                    info.el.classList.add(bucketClass);

                    const box = document.createElement('div');
                    if (box) {
                        box.innerHTML = '';
                        }
                    box.className = 'kwh-box';
                    box.innerHTML = `
            <div class="kwh-value">${displayVal}</div>
            <div class="kwh-unit">kWh</div>
          `;
                   // 
                    frame.appendChild(box);
                    
                    // box.innerHTML = '';
                },
                dateClick: function(info) {
                    //addgraph(dateStr);
                    const d = info.date;
                    const dateStr = d.getFullYear() + '-' +
                        String(d.getMonth() + 1).padStart(2, '0') + '-' +
                        String(d.getDate()).padStart(2, '0');
                        graph_data(dateStr);
    // alert('Event: ' + dateStr);
    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    // alert('View: ' + info.view.type);

    // change the border color just for fun
    info.el.style.borderColor = 'red';
  },
  navLinks: true, // can click day/week names to navigate views
  editable: true,
//   dayMaxEvents: true, // allow "more" link when too many events
  
});
// Refresh full calendar
calendar.refetchEvents(); // reloads events dynamically
  calendar.render(); 
// addgraph(data);
return calendar;
    }
    function graph_data(date_data){
        var client_id=38;
    var device_id=41;
    var selectedValue = $('input[name="filter"]:checked').val();
    
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,date:date_data,filter:selectedValue
        },
        url: BASE_URL+'Admin/Services/getHardwareDataEnergyGraph',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                      
                        addgraph(data.data.hardware_data);
                       
                    }
                } else {
                    $(".MsgTxt").html(data.message);
                    $(".GenMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    }
    function addgraph(date){
        // date['hourly']['xdata']
        Highcharts.chart('container', {
            chart: {
        type: 'column'
    },

    credits: {
        enabled: false
    },
    title: {
        text: ' '
    },
    xAxis: {
        categories: date['hourly']['xdata'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },tooltip: {
        formatter: function () {
                
                return '<b>' + this.key + '</b><br>Consumption: ' + this.point.y+'Kwh';
            }
        
        //valueDecimals: 2
    },
    
    series: [{
        name: date['hourly']['date'],
        data: date['hourly']['ydata'],
        color:'#de9e4b'

    }
    ]
});
    }
$(document).on("change", "input[name='filter']", function () {
    var client_id=38;
    var device_id=41;
    var selectedValue = $('input[name="filter"]:checked').val();
    
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,filter:selectedValue
        },
        url: BASE_URL+'Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                        if (window.calendar) {
                            window.calendar.destroy();
                        }
                       createCalendar(data.data.hardware_data, [],selectedValue);
                       window.calendar.render();
                       
                    }
                } else {
                    $(".MsgTxt").html(data.message);
                    $(".GenMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    

    // calendarEl.fullCalendar( ‘refresh’ )
    //calendar.render();

    
 });
    
    var client_id=38;
    var device_id=41;
    var selectedValue = $('input[name="filter"]:checked').val();
    if(selectedValue==0){
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,filter:0
        },
        url: BASE_URL+'Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                       
                       createCalendar(data.data.hardware_data, [],selectedValue);
                    }
                } else {
                    $(".MsgTxt").html(data.message);
                    $(".GenMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    }else if(selectedValue==1){
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,filter:1
        },
        url: BASE_URL+'Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                       
                       createCalendar(data.data.hardware_data, [],selectedValue);
                    }
                } else {
                    $(".MsgTxt").html(data.message);
                    $(".GenMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    }else{
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,filter:2
        },
        url: BASE_URL+'Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                       
                       createCalendar(data.data.hardware_data, [],selectedValue);
                    }
                } else {
                    $(".MsgTxt").html(data.message);
                    $(".GenMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    }
        


// toggle function


</script>
</html>

