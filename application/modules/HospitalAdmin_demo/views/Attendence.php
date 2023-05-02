<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendence</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/BxSlider.css?ver=1" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/BxSlider.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/SliderScript.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Attndnc">Attendance</span>
            <div class="AttndncDshBrd">
                <div class="BscDshbrd">
                    <span class="AttndncDate">Today, 19 June 2021</span>
                    <span class="AttndncTimeShft">Shift 01 - 08 AM to 04 PM</span>
                    <div class="FtrInnrDshbrd">
                        <div class="InnrDshbrdHldr">
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls">567</span>
                                <span class="FtrInnrTtl">Assigned</span>
                                <div class="GndrDvdsn">
                                    <span class="GndrIco Male">295</span>
                                    <span class="GndrIco FeMale">272</span>
                                </div>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Good">560</span>
                                <span class="FtrInnrTtl Good">Present</span>
                                <div class="GndrDvdsn">
                                    <span class="GndrIco Male">290</span>
                                    <span class="GndrIco FeMale">270</span>
                                </div>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Bad">7</span>
                                <span class="FtrInnrTtl Bad">Absent</span>
                                <div class="GndrDvdsn">
                                    <span class="GndrIco Male">5</span>
                                    <span class="GndrIco FeMale">2</span>
                                </div>
                            </div>
                        </div>
                        <div class="InnrDshbrdHldr">
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls">560</span>
                                <span class="FtrInnrTtl">Total Staff</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Icn Male">290</span>
                                <span class="FtrInnrTtl">Male Staff</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Icn FeMale">270</span>
                                <span class="FtrInnrTtl">Female Staff</span>
                            </div>
                        </div>
                        <div class="InnrDshbrdHldr">
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Good">553</span>
                                <span class="FtrInnrTtl Good">On time</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Stsfctry">5</span>
                                <span class="FtrInnrTtl Stsfctry">Late by<br />>30 mins</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Bad">2</span>
                                <span class="FtrInnrTtl Bad">Late by<br /><30 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl MdclStff"><span class="LnkTxt">Medical Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">350</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">198</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">152</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl NursngStff"><span class="LnkTxt">Nursing Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">178</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">67</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">111</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl ScrtyStff"><span class="LnkTxt">Security Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">15</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">10</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">5</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl EnggStff"><span class="LnkTxt">Engineering Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">8</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">8</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">0</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl AdmnStff"><span class="LnkTxt">Administrative Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">9</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">7</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">2</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">All Dept.s</span>
                        </li>
                    </ul>
                </div>
                <div class="SlctDrpdwnHldr">
                    <ul class="TbTtlLnkHldr">
                    <li>
                            <span class="TbLnk Grphvw" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin_demo/listView'">List</span>
                        </li>
                        <li>
                            <span class="TbLnk Grphvw Actv">Graph View</span>
                        </li>
                        <li>
                            <span class="TbLnk Grdvw">Grid View</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="InnrTtl">Today</span>
                            <span class="InnrTxt">19 June 2021</span>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="Browse Date" />
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Shift</option>
                                <option value="1">Shift 01</option>
                                <option value="2">Shift 02</option>
                                <option value="3">Shift 03</option>
                            </select>
                        </div>
                        <div class="col-md-6 BttnHldr">
                            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin_demo/attendenceCustomDate'" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SctnGrphDsh">
                <div class="GrphCol AtttnDshbrd">
                    <div class="GraphHldr">
                        <span class="GrphTtl">Attendence</span>
                        <canvas id="ICUChart" height="300"></canvas>
                        <script>
                            var ctx = document.getElementById('ICUChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Male', 'Female'],
                                    datasets: [
                                        {
                                            label: 'Total Staff',
                                            data: [53, 62],
                                            borderRadius: 5,
                                            hoverBackgroundColor: [
                                                'rgba(0, 0, 0, 0.5)'
                                            ],
                                            backgroundColor: [
                                                'rgba(0, 0, 0, 0.2)'
                                            ]
                                        },
                                        {
                                            label: 'Present',
                                            data: [45, 50],
                                            borderRadius: 5,
                                            hoverBackgroundColor: [
                                                'rgba(23, 169, 0, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(23, 169, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Absent',
                                            data: [8, 12],
                                            borderRadius: 5,
                                            hoverBackgroundColor: [
                                                'rgba(217, 27, 27, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(217, 27, 27, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="GrphCol AtttnDshbrd">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Gender Ratio</span>
                        <canvas id="OpThChart" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Male', 'Female'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 45],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(0, 137, 231, 1)',
                                                'rgba(236, 19, 188, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(0, 137, 231, 0.75)',
                                                'rgba(236, 19, 188, 0.75)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },

                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceDeptDetail" class="FtrTtl Icn MdclStff"><span class="LnkTxt">Medical Staff</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Dr. Chinmay Kant</span>
                                <span class="StffDsgntn">Dept. Supervisor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">360</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">355</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">5</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">348</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">2</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">LTICU - 1</span>
                                    <span class="FlrName">Floor - 1</span>
                                    <span class="StffCount">43</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">30</span>
                                        <span class="GndrIco FeMale">13</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ICU - 05</span>
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="StffCount">37</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">23</span>
                                        <span class="GndrIco FeMale">14</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ICU - 07</span>
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="StffCount">41</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">22</span>
                                        <span class="GndrIco FeMale">19</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ICU - 08</span>
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="StffCount">37</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">20</span>
                                        <span class="GndrIco FeMale">17</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">LTICU - 02</span>
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="StffCount">41</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">21</span>
                                        <span class="GndrIco FeMale">20</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">LTICU - 03</span>
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="StffCount">36</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">20</span>
                                        <span class="GndrIco FeMale">16</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ISO</span>
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="StffCount">42</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">26</span>
                                        <span class="GndrIco FeMale">16</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">HDO - 03</span>
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="StffCount">38</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">23</span>
                                        <span class="GndrIco FeMale">15</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">HDO - 04</span>
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="StffCount">35</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">13</span>
                                        <span class="GndrIco FeMale">22</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceDeptDetail" class="FtrTtl Icn NursngStff"><span class="LnkTxt">Nursing Staff</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Alka Chada</span>
                                <span class="StffDsgntn">Dept. Supervisor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">180</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">178</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">2</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">177</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">1</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">LTICU - 01</span>
                                    <span class="FlrName">Floor - 01</span>
                                    <span class="StffCount">16</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">5</span>
                                        <span class="GndrIco FeMale">11</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ICU - 05</span>
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="StffCount">19</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">6</span>
                                        <span class="GndrIco FeMale">13</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ICU - 07</span>
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="StffCount">22</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">8</span>
                                        <span class="GndrIco FeMale">14</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ICU - 08</span>
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="StffCount">21</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">8</span>
                                        <span class="GndrIco FeMale">13</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">LTICU - 02</span>
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="StffCount">16</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">7</span>
                                        <span class="GndrIco FeMale">9</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">LTICU - 03</span>
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="StffCount">20</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">9</span>
                                        <span class="GndrIco FeMale">11</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">ISO</span>
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="StffCount">17</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">5</span>
                                        <span class="GndrIco FeMale">12</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">HDO - 03</span>
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="StffCount">25</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">10</span>
                                        <span class="GndrIco FeMale">15</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">HDO - 04</span>
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="StffCount">22</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">9</span>
                                        <span class="GndrIco FeMale">13</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceDeptDetail" class="FtrTtl Icn ScrtyStff"><span class="LnkTxt">Security Staff</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Akshay Bera</span>
                                <span class="StffDsgntn">Dept. Supervisor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">15</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">15</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">0</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">13</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">1</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">1</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>


                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Tower - 01</span>
                                    <span class="FlrName">Gate - 01</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">2</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Tower - 01</span>
                                    <span class="FlrName">Exit Gate - 01</span>
                                    <span class="StffCount">2</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">2</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Tower - 02</span>
                                    <span class="FlrName">Gate - 01</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">2</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Tower - 02</span>
                                    <span class="FlrName">Exit Gate - 01</span>
                                    <span class="StffCount">2</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">2</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Tower - 03</span>
                                    <span class="FlrName">Gate - 01</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">1</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Tower - 03</span>
                                    <span class="FlrName">Exit Gate - 01</span>
                                    <span class="StffCount">2</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">2</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceDeptDetail" class="FtrTtl Icn EnggStff"><span class="LnkTxt">Engineering Staff</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Kamlesh Lall</span>
                                <span class="StffDsgntn">Dept. Supervisor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">8</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">8</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">0</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">7</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">1</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Plumber</span>
                                    <span class="FlrName">All Towers</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Electrician</span>
                                    <span class="FlrName">All Towers</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">A/C Technician</span>
                                    <span class="FlrName">All Towers</span>
                                    <span class="StffCount">2</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">2</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceDeptDetail" class="FtrTtl Icn AdmnStff"><span class="LnkTxt">Administrative Staff</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Baldev Shetty</span>
                                <span class="StffDsgntn">Dept. Supervisor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">9</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">9</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">0</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">8</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">1</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>


                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Receptionist</span>
                                    <span class="FlrName">Tower - 1</span>
                                    <span class="StffCount">1</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">0</span>
                                        <span class="GndrIco FeMale">1</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Receptionist</span>
                                    <span class="FlrName">Tower - 2</span>
                                    <span class="StffCount">1</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">0</span>
                                        <span class="GndrIco FeMale">1</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Cashier</span>
                                    <span class="FlrName">Tower - 1</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Cashier</span>
                                    <span class="FlrName">Tower - 2</span>
                                    <span class="StffCount">3</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">3</span>
                                        <span class="GndrIco FeMale">0</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <span class="DptName">Cashier</span>
                                    <span class="FlrName">Tower - 3</span>
                                    <span class="StffCount">1</span>
                                    <div class="GndrDvdsn">
                                        <span class="GndrIco Male">1</span>
                                        <span class="GndrIco FeMale">0</span>
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
</html>
