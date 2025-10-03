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
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/Theme/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/Theme/AppTheme/Fonts/IconFont.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="<?php echo base_url(); ?>asset/admin/Theme/Scripts/index.global.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/Theme/Scripts/index.global.min.js"></script>
<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>


<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<body>
    <div class="AppHeader">
        <div class="AppMnuTtlHldr">
            <div class="TtlHldr">
                <div class="ClntLgoHldr">
                    <img src="Images/CompanyLogo.png" class="Lgo" />
                </div>
            </div>
        </div>
        <div class="AppUsrCntrlHldr">
            <ul class="UsrNav">
                <li>
                    <a href="#" class="NavLnk WISIcn-Notification"></a>
                </li>
                <li>
                    <a href="#" class="NavLnk WISIcn-Help"></a>
                </li>
                <li>
                    <div class="UsrDvHldr">
                        <div class="UsrDtls">
                            <div class="PrflNmeHldr">
                                <span class="Nme">Frank</span>
                            </div>
                            <div class="PrflImgHldr">
                               
                                <span class="PrflTxtImg">
                                    <span class="Intls">F</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="HdrSbMnuHldr UsrDv">
                        <div class="InnrHldr">
                            <div class="PrflSbMnu">
                                <ul class="LnkLst">
                                    <li>
                                        <div class="PrflMiniView">
                                            <div class="PrflImgHldr">
                                                <span class="PrflTxtImg">
                                                    <span class="Intls">F</span>
                                                </span>
                                            </div>
                                            <div class="PrflBscDtls">
                                                <span class="PrflName">Frank</span>
                                                <span class="PrflDesignation">Site Admin</span>
                                                <span class="PrflEmail">frank@gmail.com</span>
                                                <span class="PrflPhone">+91 98490 98490</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="Lnk">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="index.html" class="Lnk">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="AppFooter">
        <div class="AppVrsnDtls">
            <span class="AppCurrVrsn">Version:<span class="Vrsn">v3.0.20</span></span>
        </div>
        <div class="AppPwrdDtls">
            <span class="CorpTxt">Powered by<a href="#" class="Lnk" target="_blank">WIS</a></span>
        </div>
    </div>
   
    <div class="AppMstrCntnr">
        <div class="GnPgHdrDvHldr FllDtlsHldr">
            <div class="TtlHldr">
                <a href="BMS-INDP-Energy-02.html" class="AppBtn IcnOnly WISIcn-ArrowLeft"></a>
                <span class="PgTtl">Back</span>
                
            </div>
            <div class="NvBtnHldr">
                <div class="Hldr DtDsplHldr">
                    <span class="DtTxt">10 Mar, 2023</span>
                </div>
                <div class="Hldr">
                    <div class="AppCmpctTbHldr NoMrgn">
                        <a href="#" class="TabLnk Actv dates actv_1">Today</a>
                        <a href="#" class="TabLnk dates actv_1">This Month</a>
                        <a href="#" class="TabLnk dates actv_1 datePicker">Custom Date</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="GnPgCntntDvHldr NoBG FllDtlsHldr">
            <div id="InnrCntntHldrDv" class="InnrCntntHldr FllPgScrllPd">
                <div class="FormHldr">
                    
                    <div class="row NoBrdr NoBG PaddBottom">
                        <div class="col-1 NoPd">
                            <div class="DashboardHldr TmpltTwo">
                                <div class="DshHdrHldr TmpltTwo Brdr ExtraPaddTpBt">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">
                                            <!-- <img class="IcnImg" src="AppTheme/ModIcon/BMS-Restaurant-EnergyMeter.svg"> -->
                                            Monthly Usage Overview</span>
                                    </div>
                                </div>
                                <div class="DshDtlHldr TmpltTwo">
                                    <div class="FormHldr">
                                        <div class="row NoBrdr PaddBottom NoBG">
                                            <div class="col-66 NoMrgn">
                                                <div class="FormHldr Search ThemeOne MrgnBttm">
                                                    <div class="row NoBG NoBrdr">
                                                        <div class="col-1">
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" type="radio" name="filter" value="0" checked="">
                                                                <label>Consumption</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" name="filter" value="1" type="radio">
                                                                <label>Day Consumption</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" name="filter" value="2" type="radio">
                                                                <label>Night Consumption</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: 100%; height: 100%;">
                                                    <div id="calendar"></div>
                                                   
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row PaddTop PaddBottom NoBG">
                                            <div class="col-1 NoPd">
                                                <div class="BMSDshbrdBlck ThemeOne NoBrdr NoMrgn">
                                                    <div class="BMSDshbrdDtlsHldr">
                                                        <div class="BMSDshbrdDtlDv GrphDv FllHght">
                                                            <div class="GrphHldr" id="container">
                                                                <!-- <div class="GrphDv" id="container" ></div> -->
                                                            </div>
                                                            <div class="GrphLgnds">
                                                                <ul class="LgndsLst">
                                                                    <li>
                                                                        <span class="Txt" style="color: #1E88E5;">Monthly Average (24 Hrs)</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="Txt" style="color: #26A69A;">28 December (24 Hrs)</span>
                                                                    </li>
                                                                </ul>
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
    </div>
</body>


<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
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
            max-width: 1000px;
            width: 100%;
            margin: 20px;
            background: #fff;
            border-radius: 12px;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .kwh-box {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .kwh-value {
            font-size: 18px;
        }

        .kwh-unit {
            font-size: 12px;
            color: #666;
        }
        
        .low {
            background: #d4f8d4 !important;
        }        
        .medium {
            background: #fff3cd !important;
        }
        
        .high {
            background: #f8d7da !important;
        }        
        .none {
            background: #f0f0f0 !important;
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
 function createCalendar(data,[]) {
    var calendarEl = document.getElementById('calendar');
    const kwhData = data[0]['consumption'];
calendar = new FullCalendar.Calendar(calendarEl, {
  headerToolbar: {
    left: 'prev',
    center: 'title',
    right: 'next'
  },
  initialDate: '2025-08-23',
  dayCellDidMount: function (info) {                    
                    const d = info.date;
                    const dateStr = d.getFullYear() + '-' +
                        String(d.getMonth() + 1).padStart(2, '0') + '-' +
                        String(d.getDate()).padStart(2, '0');

                    const frame = info.el.querySelector('.fc-daygrid-day-frame');
                    
                    const dayNumEl = info.el.querySelector('.fc-daygrid-day-number');
                    if (dayNumEl) {
                        dayNumEl.textContent = String(info.date.getDate()).padStart(2, '0');
                    }

                    const val = kwhData[dateStr];
                    let displayVal = '-';
                    let bucketClass = 'none';

                    if (typeof val === 'number') {
                        displayVal = val;
                        bucketClass = (val <= 10) ? 'low' : (val <= 15 ? 'medium' : 'high');
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
                    addgraph(data);
                    // box.innerHTML = '';
                },
  navLinks: true, // can click day/week names to navigate views
  editable: true,
//   dayMaxEvents: true, // allow "more" link when too many events
  
});
// Refresh full calendar
calendar.refetchEvents(); // reloads events dynamically
  calendar.render(); 
addgraph(data);
return calendar;
    }
    function addgraph(){
        Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total & WeekDay & Weekend Consumption'
    },
    subtitle: {
        text:
            ''
    },
    xAxis: {
        categories: ['Total', 'Weekday', 'Weekend'],
        crosshair: true,
        accessibility: {
            description: 'Energy Meters'
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
            name: 'Consumption',
            data: [25, 5, 5]
        },
        {
            name: 'Avg.Consumption',
            data: [8, 66, 5]
        }
    ]
});
    }
$(document).on("change", "input[name='filter']", function () {
    var client_id=43;
    var device_id=41;
    var selectedValue = $('input[name="filter"]:checked').val();
    
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,filter:selectedValue
        },
        url: 'http://localhost/wiswenalytics/Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                        if (window.calendar) {
                            window.calendar.destroy();
                        }
                       createCalendar(data.data.hardware_data, []);
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
    
    var client_id=43;
    var device_id=41;
    var selectedValue = $('input[name="filter"]:checked').val();
    if(selectedValue==0){
        $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id,filter:0
        },
        url: 'http://localhost/wiswenalytics/Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                       
                       createCalendar(data.data.hardware_data, []);
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
        url: 'http://localhost/wiswenalytics/Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                       
                       createCalendar(data.data.hardware_data, []);
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
        url: 'http://localhost/wiswenalytics/Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
               
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                       
                       createCalendar(data.data.hardware_data, []);
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
