<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Performance Report</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_web/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_web/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_web/Scripts/Script.js"></script>
</head>
<body>
    <div class="AppMenu">
        <span class="AppMenuBtn">
            <span class="BtnTxt">Menu</span>
        </span>
        <ul class="MenuList">
            <li>
                <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/dashboard" class="AppMenuLnk Map">
                    <span class="LnkTxt">Map</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintList" class="AppMenuLnk CmplntsFdbck Actv">
                    <span class="LnkTxt">Complaints</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="AppFooter">
        <span class="LstUpdtTxt">Version:<span class="DtlTxt">v3.0.20</span></span>
        <span class="Cprght">Powered by<a href="#" class="LnkTxt">WIS</a></span>
    </div>
    <div class="AppHeader">
        <div class="ContainerLeft">
            <div class="AppClientLogo">
                <span class="ClntNme">ESIC Sanath Nagar</span>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="AppUsrLnks">
                <ul class="PrflHdrLnk">
                    <li>
                        <div class="PrfHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_web/Images/UserImg.jpg" class="UserImg" />
                            <span class="UsrNme">Radhika K.</span>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/login" class="HdrIcoLnk Lgout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="AppFllContainer FllScrn">
        <div class="ContainerLeft">
            <span class="SctnTtl CmplntsFdbck">Complaints</span>
            <div class="SctnInnerLnks" style="padding-bottom: 0;">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintDashboard" class="LnkTxt">Complaints Dashboard</a>
                    </li>
                    <li>
                       <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintList" class="LnkTxt">Complaints Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintAttendence" class="LnkTxt">Attendence</a>
                    </li>
                </ul>
            </div>
            <div class="SctnInnerMenu" style="margin-top: 0;">
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button Actv" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFour">
                                Complaint Reports
                            </button>
                        </span>
                        <div id="flush-collapseFive" class="accordion-collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintEReports" class="SbLnk Actv">Employee Performance Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintCReports" class="SbLnk">Complaints Report Overview</a>
                                    </li>
                                </ul>
                            </div>
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
                            <span class="PgTtl">Employee Performance Report</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="InnrTtl">Today</span>
                            <span class="InnrTxt">08 December 2021</span>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="From Date" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="Text1" value="To Date" />
                        </div>
                        <div class="col-md-6 BttnHldr">
                            <button type="button" class="btn btn-primary SbmtBtn">
                                Submit
                            </button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SctnGrphDsh">
                <div class="GrphCol EPReport">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Employee Attendence</span>
                        <canvas id="OpThChart" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Present', 'absent'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 10],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(32, 201, 151, 1)',
                                                'rgba(220, 53, 69, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(32, 201, 151, 0.75)',
                                                'rgba(220, 53, 69, 0.75)'
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
                <div class="GrphCol EPReport">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Turn Around Time</span>
                        <canvas id="OpThChartA" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChartA').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Within half hour', 'Within 1 Hour', 'Above 1 Hour'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 45, 55],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(0, 137, 231, 1)',
                                                'rgba(236, 19, 188, 1)',
                                                'rgba(255, 193, 7, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(0, 137, 231, 0.75)',
                                                'rgba(236, 19, 188, 0.75)',
                                                'rgba(255, 193, 7, 0.75)'
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
                <div class="GrphCol EPReport">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Complaint Status</span>
                        <canvas id="OpThChartB" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChartB').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Allocated', 'Completed'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 45],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(220, 53, 69, 1)',
                                                'rgba(0, 137, 231, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(220, 53, 69, 0.75)',
                                                'rgba(0, 137, 231, 0.75)'
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
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx" id="staticEmail" value="Employee Name" />
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Service Department</option>
                                <option value="1">Heating/ Cooling</option>
                                <option value="2">Cleanliness</option>
                                <option value="3">Water</option>
                                <option value="4">Equipment</option>
                                <option value="5">Damages</option>
                                <option value="6">Soap</option>
                                <option value="7">Tissues</option>
                                <option value="8">Drinking Water</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="Joining From Date" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="Text1" value="Joining To Date" />
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Sort by</option>
                                <option value="1">Best Time</option>
                                <option value="2">Best Attendence</option>
                            </select>
                        </div>
                        <div class="col-md-1 BttnHldr">
                            <button type="button" onclick="" class="btn btn-primary SbmtBtn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="TableHldr">
                    <table class="AppDataTbl">
                        <tbody>
                            <tr class="Hdr">
                                <th>
                                    <span class="DataTtl">S. No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Joined On</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Tasks Completed</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Avg. Task per Day</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Assigned Tasks</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Tasks In Process</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Avg. Turn Around Time</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Attendence</span>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1001</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1002</span>
                                </td>
                                <td>
                                    <span class="DataTxt">S. Balu</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1200</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">25 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">75%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1003</span>
                                </td>
                                <td>
                                    <span class="DataTxt">K. Syam</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitors</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1180</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">28 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">77%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">4</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1004</span>
                                </td>
                                <td>
                                    <span class="DataTxt">R. Gopal</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1200</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1005</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">6</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1006</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Y. Suresh</span>
                                </td>
                                <td>
                                    <span class="DataTxt">HVAC</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1080</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">20 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">65%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">7</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1007</span>
                                </td>
                                <td>
                                    <span class="DataTxt">M. Rarayan</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr class="Rd">
                                <td>
                                    <span class="DataTxt">8</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1008</span>
                                </td>
                                <td>
                                    <span class="DataTxt">S. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">50 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">9</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1001</span>
                                </td>
                                <td>
                                    <span class="DataTxt">L. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitors</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">10</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1010</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Radha</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">11</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1011</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">12</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1012</span>
                                </td>
                                <td>
                                    <span class="DataTxt">S. Das</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitors</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1280</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">30 mins</span>
                                </td>
                                <td>
                                    <span class="DataTxt">85%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
