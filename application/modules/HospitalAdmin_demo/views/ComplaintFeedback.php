<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaint & Feedback</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_web/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_web/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer FllScrn">
        <div class="ContainerLeft">
            <span class="SctnTtl CmplntsFdbck">Complaints</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/complaintDashboard" class="LnkTxt">Complaints Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/complaintList" class="LnkTxt Actv">Complaints Admin</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/complaintAttendence" class="LnkTxt">Attendence</a>
                    </li>
                </ul>
            </div>
            <div class="SctnInnerMenu" style="margin-top: 0;">
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFour">
                                Complaint Reports
                            </button>
                        </span>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/complaintEReports" class="SbLnk">Employee Performance Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/complaintCReports" class="SbLnk">Complaints Report Overview</a>
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
                            <span class="PgTtl">Complaints Admin</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="AppWdgtHldr InnrHldr Cmplnts">
                <div class="WdgtDv">
                    <div class="WdgtDtls">
                        <div class="WdgtIcnDv">
                            <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="WdgtIcnHldr TtCmplnts" />
                        </div>
                        <div class="WdgtTxtDtlsDv">
                            <span class="WdgtVlu">23</span>
                            <span class="WdgtNme">Total Complaints</span>
                        </div>
                    </div>
                </div>
                <div class="WdgtDv">
                    <div class="WdgtDtls">
                        <div class="WdgtIcnDv">
                            <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="WdgtIcnHldr UnAssgnd" />
                        </div>
                        <div class="WdgtTxtDtlsDv">
                            <span class="WdgtVlu">5</span>
                            <span class="WdgtNme">Un-Assigned</span>
                        </div>
                    </div>
                </div>
                <div class="WdgtDv">
                    <div class="WdgtDtls">
                        <div class="WdgtIcnDv">
                            <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="WdgtIcnHldr InPrcss" />
                        </div>
                        <div class="WdgtTxtDtlsDv">
                            <span class="WdgtVlu">6</span>
                            <span class="WdgtNme">In Process</span>
                        </div>
                    </div>
                </div>
                <div class="WdgtDv">
                    <div class="WdgtDtls">
                        <div class="WdgtIcnDv">
                            <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="WdgtIcnHldr Cmpltd" />
                        </div>
                        <div class="WdgtTxtDtlsDv">
                            <span class="WdgtVlu">12</span>
                            <span class="WdgtNme">Completed</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1">
                            <span class="InnrTtl">Date</span>
                            <span class="InnrTxt">05-12-2021</span>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Complaint Type</option>
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
                                <option selected>Floor</option>
                                <option value="1">Floor 01</option>
                                <option value="2">Floor 02</option>
                                <option value="3">Floor 03</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Room</option>
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
                                <option selected>Complaint by</option>
                                <option value="1">All</option>
                                <option value="2">Patient</option>
                                <option value="3">Visitor</option>
                                <option value="4">Employee</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Status</option>
                                <option value="1">Not Assigned</option>
                                <option value="2">Under Process</option>
                                <option value="3">Completed</option>
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
                                <span class="DataTtl">Complaint Type</span>
                            </th>
                            <th>
                                <span class="DataTtl">Block</span>
                            </th>
                            <th>
                                <span class="DataTtl">Floor</span>
                            </th>
                            <th>
                                <span class="DataTtl">Room</span>
                            </th>
                            <th>
                                <span class="DataTtl">Complaint given by</span>
                            </th>
                            <th>
                                <span class="DataTtl">Complaint time</span>
                            </th>
                            <th>
                                <span class="DataTtl">Status</span>
                            </th>
                            <th>
                                <span class="DataTtl">Completed by</span>
                            </th>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">23</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk">Assign Complaint</span>
                            </td>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">22</span>
                            </td>
                            <td>
                                <span class="DataTxt">Cleanliness</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk">Assign Complaint</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">21</span>
                            </td>
                            <td>
                                <span class="DataTxt">Drinking Water</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">20</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt Bad">03:00 PM (+2 Hour)</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk">Assign Complaint</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">19</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">B. Gopal</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">18</span>
                            </td>
                            <td>
                                <span class="DataTxt">DrinkingWater</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupTwo();" class="BtnLnk Prcss">In Process</span>
                            </td>
                            <td>
                                <span class="DataTxt">Syam Rao</span>
                            </td>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">17</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk">Assign Complaint</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">16</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Gopal</span>
                            </td>
                        </tr>
                        <tr class="Rd">
                            <td>
                                <span class="DataTxt">15</span>
                            </td>
                            <td>
                                <span class="DataTxt">Cleanliness</span>
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
                                <span class="DataTxt">Visitor</span>
                            </td>
                            <td>
                                <span class="DataTxt Bad">03:00 PM (+2 Hour)</span>
                            </td>
                            <td>
                                <span class="DataTxt">Not Assigned</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk">Assign Complaint</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">14</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">Gopal L</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">13</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupTwo();" class="BtnLnk Prcss">In Process</span>
                            </td>
                            <td>
                                <span class="DataTxt">L Prem</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">12</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Gopal</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">11</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">10</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupTwo();" class="BtnLnk Prcss">In Process</span>
                            </td>
                            <td>
                                <span class="DataTxt">K. Prem</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">9</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">8</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Gopal</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">7</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupTwo();" class="BtnLnk Prcss">In Process</span>
                            </td>
                            <td>
                                <span class="DataTxt">S. Arvind</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">6</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">5</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">S. Syam</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">4</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupTwo();" class="BtnLnk Prcss">In Process</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">3</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Patient</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">N. Raju</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">2</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupThree();" class="BtnLnk Cmpltd">Completed (1hr 35 mins)</span>
                            </td>
                            <td>
                                <span class="DataTxt">K. Roja N</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">1</span>
                            </td>
                            <td>
                                <span class="DataTxt">Heating/ Cooling</span>
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
                                <span class="DataTxt">Employee</span>
                            </td>
                            <td>
                                <span class="DataTxt">03:00 PM (+1 Hour)</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopupTwo();" class="BtnLnk Prcss">In Process</span>
                            </td>
                            <td>
                                <span class="DataTxt"> Raju</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="AppMdlHldr" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr Smllr">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Assigned Complaint</span>
                    <span class="FtrTtl">Heating/ Cooling</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                </div>
                <div class="ModalFnctnHldr">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="InnrTtl">Date</span>
                                <span class="InnrTxt">06-12-2021</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Area</span>
                                <span class="InnrTxt">Area Name</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Block</span>
                                <span class="InnrTxt">Block A</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Room</span>
                                <span class="InnrTxt">Wating Hall - 1</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Complaint by</span>
                                <span class="InnrTxt">Patient</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Complaint Time</span>
                                <span class="InnrTxt Bad">03:00 PM (+2 Hour)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ModalCntntHldr">
                    <div class="ModalFnctnHldr HeightAuto" style="background: #fff6ff; border-color: #e7bde7;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="InnrTtl">Patient Name</span>
                                    <span class="InnrTxt">Naveen Kumar</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="InnrTtl">Contact No.</span>
                                    <span class="InnrTxt">+91 1234567890</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="InnrTtl">Patient ID</span>
                                    <span class="InnrTxt">AA88565-55615</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="InnrTtl">Comment</span>
                                    <span class="InnrTxt">A/c is not cooling</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="TableHldr">
                        <table class="AppDataTbl">
                            <tr class="Hdr">
                                <th>

                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Contact No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Shift Timing</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Assigned</span>
                                </th>
                                <th>
                                    <span class="DataTtl">In Progress</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Task Completed</span>
                                </th>
                            </tr>
                            <tr>
                                <td class="Cntr">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1001</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">+91 8987876567</span>
                                </td>
                                <td>
                                    <span class="DataTxt">09:00 AM to 07:00 PM</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">8</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="Cntr">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1002</span>
                                </td>
                                <td>
                                    <span class="DataTxt">B Gopal</span>
                                </td>
                                <td>
                                    <span class="DataTxt">+91 9898789098</span>
                                </td>
                                <td>
                                    <span class="DataTxt">09:00 AM to 07:00 PM</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">7</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="Cntr">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1003</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">+91 9098789098</span>
                                </td>
                                <td>
                                    <span class="DataTxt">09:00 AM to 07:00 PM</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">15</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="ModalFnctnHldr" style="background: #fff;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="InnrTtl">Recommended To</span>
                                    <span class="InnrTxt">N. Raju (EMP-1001)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="DvBtnHldr">
                        <button type="button" onclick="location.href = '<?php echo site_url('HospitalAdmin_demo/complaintList1'); ?>'" class="btn btn-primary SbmtBtn">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="AppMdlHldrTwo" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr Smllr">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Assigned Complaint</span>
                    <span class="FtrTtl">Heating/ Cooling</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopupTwo();" class="ModalClsBtn"></span>
                </div>
                <div class="ModalFnctnHldr">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="InnrTtl">Date</span>
                                <span class="InnrTxt">06-12-2021</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Area</span>
                                <span class="InnrTxt">Area Name</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Block</span>
                                <span class="InnrTxt">Block A</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Room</span>
                                <span class="InnrTxt">Wating Hall - 1</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Complaint by</span>
                                <span class="InnrTxt">Patient</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Complaint Time</span>
                                <span class="InnrTxt Bad">03:00 PM (+2 Hour)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ModalCntntHldr">
                    <div class="ModalFnctnHldr HeightAuto" style="background: #fff6ff; border-color: #e7bde7;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="InnrTtl">Patient Name</span>
                                    <span class="InnrTxt">Naveen Kumar</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="InnrTtl">Contact No.</span>
                                    <span class="InnrTxt">+91 1234567890</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="InnrTtl">Patient ID</span>
                                    <span class="InnrTxt">AA88565-55615</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="InnrTtl">Comment</span>
                                    <span class="InnrTxt">A/c is not cooling</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ModalFnctnHldr HeightAuto" style="background: #ecffe6; border-color: #81e562;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="InnrTtl">Assigned to</span>
                                    <span class="InnrTxt">N. Raju (EMP-1001)</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="InnrTtl">Assigned time</span>
                                    <span class="InnrTxt">05:18 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ModalFnctnHldr" style="background: #fff;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control InptBx" id="Text2" value="Notes">
                                </div>
                                <div class="col-md-3">
                                    <span class="InnrTtl">Status</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault8">
                                        <label class="form-check-label" for="flexRadioDefault8">
                                            Pending
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <span class="InnrTtl">&nbsp;</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Complete
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="DvBtnHldr">
                        <button type="button" onclick="" class="btn btn-primary SbmtBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="AppMdlHldrThree" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr Smllr">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Assigned Complaint</span>
                    <span class="FtrTtl">Heating/ Cooling</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopupThree();" class="ModalClsBtn"></span>
                </div>
                <div class="ModalFnctnHldr">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="InnrTtl">Date</span>
                                <span class="InnrTxt">06-12-2021</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Area</span>
                                <span class="InnrTxt">Building 01</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Block</span>
                                <span class="InnrTxt">Block A</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Room</span>
                                <span class="InnrTxt">Wating Hall - 1</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Complaint by</span>
                                <span class="InnrTxt">Patient</span>
                            </div>
                            <div class="col-md-2">
                                <span class="InnrTtl">Complaint Time</span>
                                <span class="InnrTxt Bad">03:00 PM (+2 Hour)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ModalCntntHldr">
                    <div class="ModalFnctnHldr HeightAuto" style="background: #fff6ff; border-color: #e7bde7;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="InnrTtl">Patient Name</span>
                                    <span class="InnrTxt">Naveen Kumar</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="InnrTtl">Contact No.</span>
                                    <span class="InnrTxt">+91 1234567890</span>
                                </div>
                                <div class="col-md-2">
                                    <span class="InnrTtl">Patient ID</span>
                                    <span class="InnrTxt">AA88565-55615</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="InnrTtl">Comment</span>
                                    <span class="InnrTxt">A/c is not cooling</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ModalFnctnHldr HeightAuto" style="background: #ecffe6; border-color: #81e562;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="InnrTtl">Assigned to</span>
                                    <span class="InnrTxt">N. Raju (EMP-1001)</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="InnrTtl">Assigned time</span>
                                    <span class="InnrTxt">05:18 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ModalFnctnHldr HeightAuto" style="background: #ecffe6; border-color: #81e562;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="InnrTtl">Note</span>
                                    <span class="InnrTxt">Resolve this action immediately.</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="InnrTtl">Status</span>
                                    <span class="InnrTxt">Complete</span>
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
