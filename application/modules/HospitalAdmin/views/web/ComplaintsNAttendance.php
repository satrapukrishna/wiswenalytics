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
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDashboard" class="LnkTxt">Complaints Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintList" class="LnkTxt">Complaints Admin</a>
                    </li>
                    <!-- <li>
                        <a href="<?php //echo base_url(); ?>HospitalAdmin/complaintReports" class="LnkTxt">Complaints Reports</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintAttendence" class="LnkTxt Actv">Attendence</a>
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
                            <span class="PgTtl">Attendence Dashboard</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDetReports" class="FtrTtl"><span class="LnkTxt">Engineering Staff</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Chinmay Kant</span>
                                <span class="StffDsgntn">Dept. Supervisor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">5</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">4</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">1</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">4</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDetReports" class="FtrTtl"><span class="LnkTxt">HVAC</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Ram Nath</span>
                                <span class="StffDsgntn">Dept. HAAC</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">7</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">5</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">2</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">3</span>
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
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDetReports" class="FtrTtl"><span class="LnkTxt">Plumber</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Ramu</span>
                                <span class="StffDsgntn">Dept. Plumber</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">10</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">9</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">1</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">9</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDetReports" class="FtrTtl"><span class="LnkTxt">Electrician</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Sudha Rao</span>
                                <span class="StffDsgntn">Dept. Electrician</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">8</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">6</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">2</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">6</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrptyFtrsDshbrd StffAttndDshb">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/complaintDetReports" class="FtrTtl"><span class="LnkTxt">Janitors</span></a>
                    </div>
                    <div class="StffAttndDshbHldr">
                        <div class="StffBscDtls">
                            <div class="StffImgHldr">
                                <img src="<?php echo base_url(); ?>asset/hospital_web/Images/Blank.png" class="StffImg Suprvsr" />
                            </div>
                            <div class="StffNmDtlsHldr">
                                <span class="StffNme Suprvsr">Chinmay Kant</span>
                                <span class="StffDsgntn">Dept. Janitor</span>
                            </div>
                        </div>
                        <div class="StffDshHghlgtHldr">
                            <div class="StffDshHghlgt Assgnd">
                                <span class="Count">7</span>
                                <span class="CntTtl">Assigned</span>
                            </div>
                            <div class="StffDshHghlgt Prsnt">
                                <span class="Count">6</span>
                                <span class="CntTtl">Present</span>
                            </div>
                            <div class="StffDshHghlgt Absnt">
                                <span class="Count">1</span>
                                <span class="CntTtl">Absent</span>
                            </div>
                            <div class="StffDshHghlgt OnTm">
                                <span class="Count">6</span>
                                <span class="CntTtl">On time</span>
                            </div>
                            <div class="StffDshHghlgt LtL">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by >30 mins</span>
                            </div>
                            <div class="StffDshHghlgt LtM">
                                <span class="Count">0</span>
                                <span class="CntTtl">Late by <30 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
