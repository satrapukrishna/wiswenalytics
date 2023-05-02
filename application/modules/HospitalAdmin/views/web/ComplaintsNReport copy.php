<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaints Report</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_web/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_web/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
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
                        <a href="Notifications.html" class="HdrIcoLnk Ntfctns Updts"></a>
                    </li>
                    <li>
                        <a href="Settings.html" class="HdrIcoLnk Sttngs"></a>
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
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintDashboard" class="LnkTxt">Complaints Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintList" class="LnkTxt">Complaints Admin</a>
                    </li>
                    <!-- <li>
                        <a href="<?php //echo base_url(); ?>Hospital/HospitalAdmin/complaintReports" class="LnkTxt Actv">Complaints Reports</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>Hospital/HospitalAdmin/complaintAttendence" class="LnkTxt">Attendence</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">New Complaints</span>
                        </li>
                    </ul>
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
                                <option selected>Select Area</option>
                                <option value="1">Area 01</option>
                                <option value="2">Area 02</option>
                                <option value="3">Area 03</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Block</option>
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
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Area Name</span>
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
                                <a href="#" class="BtnLnk">Assign Complaint</a>
                            </td>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Area Name</span>
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
                                <a href="#" class="BtnLnk">Assign Complaint</a>
                            </td>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Area Name</span>
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
                                <a href="#" class="BtnLnk">Assign Complaint</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Area Name</span>
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
                                <span class="DataTxt Good">Completed on 03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Area Name</span>
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
                                <span class="DataTxt Good">Completed on 03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Area Name</span>
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
                                <span class="DataTxt Good">Completed on 03-12-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
