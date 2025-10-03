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
                                                                <input class="RadioInput" type="radio" name="filter" checked="">
                                                                <label>Units</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" name="filter" type="radio">
                                                                <label>Max Load</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: 100%; height: 100%;">
                                                    <div id="calendar"></div>
                                                    <div class="GrdntLgnd">
                                                        <div class="LgndClrBr" style="background: linear-gradient(90deg, rgba(36, 138, 61, 0.50) 0%, rgba(255, 112, 67, 0.50) 52.6%, rgba(215, 0, 21, 0.50) 100%);"></div>
                                                        <div class="LgndVlusHldr">
                                                            <span class="VluTxt" style="color: #248A3D;">0 KwH</span>
                                                            <span class="VluTxt" style="color: #9E7C40;">10 KwH</span>
                                                            <span class="VluTxt" style="color: #FF7043;">15 KwH</span>
                                                            <span class="VluTxt" style="color: #EA362B;">20 KwH</span>
                                                            <span class="VluTxt" style="color: #D70015;">25 KwH+</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row PaddTop PaddBottom NoBG">
                                            <div class="col-1 NoPd">
                                                <div class="BMSDshbrdBlck ThemeOne NoBrdr NoMrgn">
                                                    <div class="BMSDshbrdDtlsHldr">
                                                        <div class="BMSDshbrdDtlDv GrphDv FllHght">
                                                            <div class="GrphHldr">
                                                                <img src="Images/EM-Monthly-Graph-1.png" class="GrphImg">
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

<script>
 function createCalendar(data,[]) {
    const kwhData = {
            "2025-08-03": 12,
            "2025-08-04": 8,
            "2025-08-05": 6,
            "2025-08-06": 15,
            "2025-08-07": 10,
            "2025-08-08": 18,
            "2025-08-09": 9,
            "2025-08-10": 14,
            "2025-08-11": 11,
            "2025-08-12": 7,
            "2025-08-13": 20,
            "2025-08-14": 8,
            "2025-08-15": 13,
            "2025-08-16": 16,
            "2025-08-17": 10,
            "2025-08-18": 22,
            "2025-08-19": 12,
            "2025-08-20": 7,
            "2025-08-21": 14,
            "2025-08-22": 9,
            "2025-08-23": 17,
            "2025-08-24": 10,
            "2025-08-25": 19,
            "2025-08-26": 6,
            "2025-08-27": 12,
            "2025-08-28": 15,
            "2025-08-29": 8,
            "2025-08-30": 20,
            "2025-08-31": 11
        };

        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2025-08-01',
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
                    box.className = 'kwh-box';
                    box.innerHTML = `
            <div class="kwh-value">${displayVal}</div>
            <div class="kwh-unit">kWh</div>
          `;
                    frame.appendChild(box);
                }
            });

            calendar.render();
        });
    }
$(document).on("change", "input[name='filter']", function () {
    var client_id=43;
    var device_id=41;
    
    $.ajax({
        type: 'GET',
        data: {
            client_id:client_id,device_id:device_id
        },
        url: 'http://localhost/wiswenalytics/Admin/Services/getHardwareDataEnergy',
          
            success: function(data) {
                //var data = jQuery.parseJSON(data);
                console.log(data);
                if (data.status == true) {
                    if (data.data != '') {
                        if (calendar) {
                            calendar.destroy();
                        }
                        calendar = createCalendar(data.data.hardware_data, []);
                        calendar.render();
                        // $('.fc-resourceTimelineDay-button').attr('title', 'Day View');
                        // $('.fc-resourceTimelineWeek-button').attr('title', 'Week View');
                        // $('.fc-dayGridMonth-button').attr('title', 'Month View');
                        // $('.fc-quarter-button').attr('title', 'Quarter View');
                        // $('.fc-halfYear-button').attr('title', 'Half-Year View');
                        // $('.fc-multiMonthYear-button').attr('title', 'Year View');
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
 });
    $(document).ready(function () {
    $(".DtTxt").html(moment().format('DD MMM, YYYY'));
    $('.NCLR').hide();
    });

    $(document).on('click', '.dates', function () {
    $(".actv_1").not($(this).addClass('Actv')).removeClass('Actv');
    if ($(this).text() == 'Today') {
        $(".DtTxt").html(moment().format('DD MMM, YYYY'));
    } else if ($(this).text() == 'This Month') {
        $(".DtTxt").html(moment().startOf('month').format('DD MMM, YYYY') + ' - ' + moment().endOf(
            'month').format('DD MMM, YYYY'));
    }
    });
    
    $(function () {
    $('.datePicker').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
        $(".DtTxt").html(start.format('DD MMM, YYYY') + ' - ' + end.format('DD MMM, YYYY'));
    });
    });

    $('.AppBtn').click(function() {
        $(this).toggleClass('Inactive');
    });
    
    $('.Txt_toggle').click(function() {
    $('.TableGraph').toggle();
    });
   
    $('.arrowdown').click(function() {
    $('.SctnFlDtls').toggle();
    $(this).toggleClass('WISIcn-ArrowUp WISIcn-ArrowDown');
    }); 
     
    document.addEventListener('DOMContentLoaded', function() {
        calendar.render();
    });

  

// toggle function


</script>
</html>
