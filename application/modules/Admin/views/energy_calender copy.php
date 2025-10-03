<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS - Energy 03</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/Theme/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/Theme/AppTheme/Fonts/IconFont.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="<?php echo base_url(); ?>asset/admin/Theme/Scripts/index.global.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/Theme/Scripts/index.global.min.js"></script>
</head>

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
    <div class="AppMnuHldr">
        <div class="MnuLstHldr">
            <ul class="MnuLst">
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Dashboard"></span>
                        <span class="LnkTxt">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Requests"></span>
                        <span class="LnkTxt">Requests</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Inventory"></span>
                        <span class="LnkTxt">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-PurchaseOrders"></span>
                        <span class="LnkTxt">Purchase Orders</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Approvals"></span>
                        <span class="LnkTxt">Approvals</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Audits"></span>
                        <span class="LnkTxt">Audits</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Reports"></span>
                        <span class="LnkTxt">Reports</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="AppMstrCntnr">
        <div class="GnPgHdrDvHldr FllDtlsHldr">
            <div class="TtlHldr">
                <a href="BMS-INDP-Energy-02.html" class="AppBtn IcnOnly WISIcn-ArrowLeft"></a>
                <span class="PgTtl">Location #1</span>
                <div class="TtlSbDtlsHldr HtlMngment">
                    <span class="RoomsDtls">4 Energy Meter</span>
                    <span class="LocationDtls WISIcn-Menu-Map">Street Name, Area Name</span>
                </div>
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
                                                                <input class="RadioInput" type="radio" checked="">
                                                                <label>Units</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" type="radio">
                                                                <label>Max Load</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" type="radio">
                                                                <label>PF</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" type="radio">
                                                                <label>Voltage</label>
                                                            </div>
                                                            <div class="FormCheck">
                                                                <input class="RadioInput" type="radio">
                                                                <label>Current</label>
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
<!-- scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
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

    // Calender 

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      initialDate: '2025-08-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
    {
      title: 'My Event 1',
      start: '2025-08-18T10:00:00',
      end: '2025-08-18T12:00:00',
      //customData: 'This is some custom information for Event 1', // Custom data attribute
     // anotherAttribute: 'Value for Event 1' ,// Another custom attribute
      overlap: false,
	  display: 'background',
      color: '#030ffc'
    },
    {
      title: 'My Event 2',
      start: '2025-08-19T14:00:00',
      customData: 'More custom data for Event 2',
      overlap: false,
	  display: 'background',
      color: '#030ffc'
    }
  ],
//   display: "background",
//       color: "rgba(28, 184, 28, 0.2)" // Another custom attribute
    //   events: [
    //     {
    //       title: '111',
    //       start: '2023-01-01'
    //     },
    //     {
    //         title: '135',
    //       start: '2023-01-02'
    //     },
    //     {
    //         title: '171',
    //       start: '2023-01-03'
    //     },
    //     {
    //         title: '120',
    //       start: '2023-01-04'
    //     },
    //     {
    //         title: '116',
    //       start: '2023-01-05'
    //     },
    //     {
    //         title: '103',
    //       start: '2023-01-06'
    //     },
    //     {
    //         title: '169',
    //       start: '2023-01-07'
    //     },
    //     {
    //         title: '166',
    //       start: '2023-01-08'
    //     },
    //     {
    //         title: '152',
    //       start: '2023-01-09'
    //     },
    //     {
    //         title: '136',
    //       start: '2023-01-10'
    //     },
    //     {
    //         title: '140',
    //       start: '2023-01-11'
    //     },
    //     {
    //         title: '132',
    //       start: '2023-01-12'
    //     },
    //     {
    //         title: '136',
    //       start: '2023-01-13'
    //     },
    //     {
    //         title: '125',
    //       start: '2023-01-14'
    //     },
    //     {
    //         title: '130',
    //       start: '2023-01-15'
    //     },
    //     {
    //         title: '144',
    //       start: '2023-01-16'
    //     },
    //     {
    //         title: '156',
    //       start: '2023-01-17'
    //     },
    //     {
    //         title: '182',
    //       start: '2023-01-18'
    //     },
    //     {
    //         title: '118',
    //       start: '2023-01-19'
    //     },
    //     {
    //         title: '123',
    //       start: '2023-01-20'
    //     },
    //     {
    //         title: '102',
    //       start: '2023-01-21'
    //     },
    //     {
    //         title: '112',
    //       start: '2023-01-22'
    //     },
    //     {
    //         title: '126',
    //       start: '2023-01-23'
    //     },
    //     {
    //         title: '151',
    //       start: '2023-01-24'
    //     },
    //     {
    //         title: '158',
    //       start: '2023-01-25'
    //     },
    //     {
    //         title: '132',
    //       start: '2023-01-26'
    //     },
    //     {
    //         title: '102',
    //       start: '2023-01-27'
    //     },
    //     {
    //         title: '114',
    //       start: '2023-01-28'
    //     },
    //     {
    //         title: '137',
    //       start: '2023-01-29'
    //     },
    //     {
    //         title: '151',
    //       start: '2023-01-30'
    //     },
    //     {
    //         title: '119',
    //       start: '2023-01-31'
    //     }
    //     ],
        eventContent: function(arg) {
      // Customize the content of each event
      return {
        html: `<div class="event-title">${arg.event.title}</div><div class="event-description">Units</div>`
      };
    } 
    });

    calendar.render();
  });
  document.addEventListener('DOMContentLoaded', function() {
    var clickableCell = document.querySelector('.clickable-cell');

    clickableCell.addEventListener('click', function() {
        // Toggle the 'selected' class on the specific cell
        clickableCell.classList.toggle('selected');
    });
});

const ctx_c_stage = document.getElementById('LineGraph');
new Chart(ctx_c_stage, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
            {
                label: '',
                data: [125, 145, 135, 145, 150, 140, 140],
                backgroundColor: ['rgba(54, 206, 78, 0.2)'],
                borderColor: ['rgba(54, 206, 78, 0.5)'],
                borderWidth: 2,
                fill: true,
                lineTension: 0.6,
            },
            {
                label: '',
                data: [145, 140, 140, 150, 140, 140, 150],
                backgroundColor: ['rgba(221, 221, 221, 0.2)'],
                borderColor: ['rgba(221, 221, 221, 0.5)'],
                borderWidth: 2,
                fill: true,
                lineTension: 0.6,
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            datalabels: {
                color: 'transparent',
            },
            title: {
                display: false,
                text: 'Chart.js Line Chart',
            },
            legend: {
                display: false,
            },
        },
        interaction: {
            mode: 'index',
            intersect: false,
        },
        scales: {
            x: {
                grid: {
                    display: false, // Remove x-axis grid lines
                },
            },
        },
    },
});

// toggle function


</script>
</html>