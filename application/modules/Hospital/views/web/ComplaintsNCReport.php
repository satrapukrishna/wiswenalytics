<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaints Report Overview</title>
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
                                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintEReports" class="SbLnk">Employee Performance Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintCReports" class="SbLnk Actv">Complaints Report Overview</a>
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
                            <span class="PgTtl">Complaints Report Overview</span>
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
                <div class="GrphCol CRReport">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Complaints by</span>
                        <canvas id="OpThChart1" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChart1').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Visitors', 'Employee', 'Doctors'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 45, 22],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(0, 137, 231, 1)',
                                                'rgba(236, 19, 188, 1)',
                                                'rgba(32, 201, 151, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(0, 137, 231, 0.75)',
                                                'rgba(236, 19, 188, 0.75)',
                                                'rgba(32, 201, 151, 0.75)'
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
                <div class="GrphCol CRReport">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Total Complaints</span>
                        <canvas id="OpThChart" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Unassigned', 'In Process', 'Completed','Pending'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 45, 50,30],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(220, 53, 69, 1)',
                                                'rgba(253, 126, 20, 1)',
                                                'rgba(25, 135, 84, 1)',
                                                'rgba(250, 135, 84, 1)'
                                            ],
                                            backgroundColor: [
                                                'rgba(220, 53, 69, 0.75)',
                                                'rgba(253, 126, 20, 0.75',
                                                'rgba(25, 135, 84, 0.75)',
                                                'rgba(250, 135, 84, 0.75)'
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
                <div class="GrphCol CRReport">
                    <div class="GraphHldr ">
                        <span class="GrphTtl">Complaints Type</span>
                        <canvas id="OpThChartB" height="100"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChartB').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Heating/ Cooling', 'Cleanliness', 'Water', 'Equipment', 'Damages', 'Soap', 'Tissues', 'Drinking Water'],
                                    datasets: [
                                        {
                                            label: 'Male',
                                            data: [64, 30, 21, 45, 50, 50, 50, 66],
                                            borderWidth: 0,
                                            hoverBorderColor: 'rgba(255,255,255,1)',
                                            hoverBackgroundColor: [
                                                'rgba(13, 110, 253, 1)',
                                                'rgba(102, 16, 242, 1)',
                                                'rgba(214, 51, 132, 1)',
                                                'rgba(253, 126, 20, 1)',
                                                'rgba(32, 201, 151, 1)',
                                                'rgba(13, 202, 240, 1)',
                                                'rgba(108, 117, 125, 1)',
                                                'rgba(220, 53, 69, 1)'

                                            ],
                                            backgroundColor: [
                                                'rgba(13, 110, 253, 0.75)',
                                                'rgba(102, 16, 242, 0.75)',
                                                'rgba(214, 51, 132, 0.75)',
                                                'rgba(253, 126, 20, 0.75)',
                                                'rgba(32, 201, 151, 0.75)',
                                                'rgba(13, 202, 240, 0.75)',
                                                'rgba(108, 117, 125, 0.75)',
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
                
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1">
                            <span class="InnrTxt Only">Sort by</span>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Complaint by</option>
                                <option value="1">Visitor</option>
                                <option value="2">Employee</option>
                                <option value="3">Doctor</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Area</option>
                                <option value="1">Area 01</option>
                                <option value="2">Area 02</option>
                                <option value="3">Area 03</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Block</option>
                                <option value="1">Block A</option>
                                <option value="2">Block B</option>
                                <option value="3">Block C</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Room</option>
                                <option value="1">Patient Rooms</option>
                                <option value="2">Waiting Halls</option>
                                <option value="3">Out Patient</option>
                                <option value="4">Emergency</option>
                                <option value="5">ICU</option>
                                <option value="6">Washrooms</option>
                                <option value="7">Common Area</option>
                                <option value="8">Imaging</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Complaint Type</option>
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
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Allocation Status</option>
                                <option value="1">Created</option>
                                <option value="1">Not Assigned</option>
                                <option value="2">Completed</option>
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
                        <tr class="Hdr">
                            <th>
                                <span class="DataTtl">S. No.</span>
                            </th>
                            <th>
                                <span class="DataTtl">Complaint by</span>
                            </th>
                            <th>
                                <span class="DataTtl">Date</span>
                            </th>
                            <th>
                                <span class="DataTtl">Area</span>
                            </th>
                            <th>
                                <span class="DataTtl">Block</span>
                            </th>
                            <th>
                                <span class="DataTtl">Room</span>
                            </th>
                            <th>
                                <span class="DataTtl">Complaint Type</span>
                            </th>
                            <th>
                                <span class="DataTtl">Status</span>
                            </th>
                            <th>
                                <span class="DataTtl">Assigned to</span>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">2</span>
                            </td>
                            <td>
                                <span class="DataTxt">Doctors</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block B</span>
                            </td>
                            <td>
                                <span class="DataTxt">Room</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">3</span>
                            </td>
                            <td>
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">ICU</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">4</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 02</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block B</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">DrinkingWater</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">5</span>
                            </td>
                            <td>
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 02</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Room</span>
                            </td>
                            <td>
                                <span class="DataTxt">DrinkingWater</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">6</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Washroom</span>
                            </td>
                            <td>
                                <span class="DataTxt">Soap</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">7</span>
                            </td>
                            <td>
                                <span class="DataTxt">Doctors</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Water</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">8</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block B</span>
                            </td>
                            <td>
                                <span class="DataTxt">Room</span>
                            </td>
                            <td>
                                <span class="DataTxt">DrinkingWater</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">9</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 02</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">DrinkingWater</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">10</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Room</span>
                            </td>
                            <td>
                                <span class="DataTxt">Cleanliness</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">11</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block B</span>
                            </td>
                            <td>
                                <span class="DataTxt">Washrooms</span>
                            </td>
                            <td>
                                <span class="DataTxt">Tissues</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">12</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">13</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">14</span>
                            </td>
                            <td>
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Building 02</span>
                            </td>
                            <td>
                                <span class="DataTxt">Block A</span>
                            </td>
                            <td>
                                <span class="DataTxt">Waiting Hall - 1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
