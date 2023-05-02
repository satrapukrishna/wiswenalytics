<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaints Dasboard</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_web/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_web/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>asset/hospital_web/CSS/BxSlider.css?ver=1" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>asset/hospital_web/Scripts/BxSlider.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_web/Scripts/SliderScript.js"></script>
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
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDashboard" class="LnkTxt Actv">Complaints Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintList" class="LnkTxt">Complaints Admin</a>
                    </li>
                    <!-- <li>
                        <a href="<?php //echo base_url(); ?>HospitalAdmin/complaintReports" class="LnkTxt">Complaints Reports</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintAttendence" class="LnkTxt">Attendence</a>
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
                                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintCReports" class="SbLnk">Complaints Report Overview</a>
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
                            <span class="PgTtl">Complaints Dashboard</span>
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
                        <div class="col-md-2">
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
                        <div class="col-md-1 BttnHldr">
                            <button type="button" onclick="" class="btn btn-primary SbmtBtn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <span class="DptTtl">Building 01</span>
                    </div>
                    <div class="StffAttndDshbHldr Cmplnt">
                        <div class="StffBscDtls">
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Only">Block A</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">68</span>
                                <span class="CntTtl">Complaint Raised</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">8</span>
                                <span class="CntTtl">New</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">10</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">50</span>
                                <span class="CntTtl">Completed</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 1</span> -->
                                    <span class="FlrName">Floor - 1</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 05</span> -->
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="CmplntCount">12</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 07</span> -->
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="CmplntCount">6</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 08</span> -->
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="CmplntCount">5</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 02</span> -->
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="CmplntCount">10</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 03</span> -->
                                    <span class="FlrName">Floor - 06</span>
                                    <span class="CmplntCount">2</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ISO</span> -->
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="CmplntCount">6</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 03</span> -->
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="CmplntCount">11</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 04</span> -->
                                    <span class="FlrName">Floor - 09</span>
                                    <span class="CmplntCount">7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="StffAttndDshbHldr Cmplnt">
                        <div class="StffBscDtls">
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Only">Block B</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">77</span>
                                <span class="CntTtl">Complaint Raised</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">12</span>
                                <span class="CntTtl">New</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">13</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">52</span>
                                <span class="CntTtl">Completed</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 1</span> -->
                                    <span class="FlrName">Floor - 1</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 05</span> -->
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="CmplntCount">2</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 07</span> -->
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 08</span> -->
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="CmplntCount">11</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 02</span> -->
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="CmplntCount">12</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 03</span> -->
                                    <span class="FlrName">Floor - 06</span>
                                    <span class="CmplntCount">6</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ISO</span> -->
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="CmplntCount">11</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 03</span> -->
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 04</span> -->
                                    <span class="FlrName">Floor - 09</span>
                                    <span class="CmplntCount">8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="StffAttndDshbHldr Cmplnt">
                        <div class="StffBscDtls">
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Only">Block C</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">60</span>
                                <span class="CntTtl">Complaint Raised</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">7</span>
                                <span class="CntTtl">New</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">5</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">48</span>
                                <span class="CntTtl">Completed</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 1</span> -->
                                    <span class="FlrName">Floor - 1</span>
                                    <span class="CmplntCount">11</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 05</span> -->
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="CmplntCount">8</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 07</span> -->
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 08</span> -->
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="CmplntCount">6</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 02</span> -->
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="CmplntCount">12</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 03</span> -->
                                    <span class="FlrName">Floor - 06</span>
                                    <span class="CmplntCount">5</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ISO</span> -->
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="CmplntCount">3</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 03</span> -->
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="CmplntCount">1</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 04</span> -->
                                    <span class="FlrName">Floor - 09</span>
                                    <span class="CmplntCount">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <span class="DptTtl">Building 02</span>
                    </div>
                    <div class="StffAttndDshbHldr Cmplnt">
                        <div class="StffBscDtls">
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Only">Block A</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">61</span>
                                <span class="CntTtl">Complaint Raised</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">2</span>
                                <span class="CntTtl">New</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">3</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">56</span>
                                <span class="CntTtl">Completed</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 1</span> -->
                                    <span class="FlrName">Floor - 1</span>
                                    <span class="CmplntCount">8</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 05</span> -->
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="CmplntCount">13</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 07</span> -->
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="CmplntCount">6</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 08</span> -->
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="CmplntCount">8</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 02</span> -->
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="CmplntCount">4</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 03</span> -->
                                    <span class="FlrName">Floor - 06</span>
                                    <span class="CmplntCount">7</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ISO</span> -->
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="CmplntCount">11</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 03</span> -->
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="CmplntCount">4</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 04</span> -->
                                    <span class="FlrName">Floor - 09</span>
                                    <span class="CmplntCount">2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="StffAttndDshbHldr Cmplnt">
                        <div class="StffBscDtls">
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Only">Block C</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">74</span>
                                <span class="CntTtl">Complaint Raised</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">9</span>
                                <span class="CntTtl">New</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">13</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">52</span>
                                <span class="CntTtl">Completed</span>
                            </div>
                        </div>
                    </div>
                    <div class="StffDptAttnd">
                        <div class="AttdnDashSlider">
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 1</span> -->
                                    <span class="FlrName">Floor - 1</span>
                                    <span class="CmplntCount">10</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 05</span> -->
                                    <span class="FlrName">Floor - 02</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 07</span> -->
                                    <span class="FlrName">Floor - 03</span>
                                    <span class="CmplntCount">11</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ICU - 08</span> -->
                                    <span class="FlrName">Floor - 04</span>
                                    <span class="CmplntCount">12</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 02</span> -->
                                    <span class="FlrName">Floor - 05</span>
                                    <span class="CmplntCount">8</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">LTICU - 03</span> -->
                                    <span class="FlrName">Floor - 06</span>
                                    <span class="CmplntCount">9</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">ISO</span> -->
                                    <span class="FlrName">Floor - 07</span>
                                    <span class="CmplntCount">5</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 03</span> -->
                                    <span class="FlrName">Floor - 08</span>
                                    <span class="CmplntCount">7</span>
                                </div>
                            </div>
                            <div>
                                <div class="DptHldr">
                                    <!-- <span class="DptName">HDO - 04</span> -->
                                    <span class="FlrName">Floor - 09</span>
                                    <span class="CmplntCount">3</span>
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
