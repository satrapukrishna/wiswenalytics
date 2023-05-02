<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendence Detail</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
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
                            <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="BrdCrmLnk">All Departments</a>
                        </li>
                        <li>
                            <span class="PgTtl">Medical Staff</span>
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
                            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin/attendenceCustomDate'" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="StffAttndDshb FullDetails">
                    <span class="DptTtl">Medical Staff</span>
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
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">LTICU - 1</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">ICU - 05</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">ICU - 07</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">ICU - 08</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">LTICU - 02</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">LTICU - 03</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">ISO</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">HDO - 03</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="AttDeptDtlsHldr">
                        <div class="DtlsHldrRow">
                            <span class="DptmntAreaTtl">HDO - 04</span>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff VLate">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr ML">Male</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Absent">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff OnTime">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="DptmntAreaStff Late">
                                <div class="StffDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg" />
                                        <span class="AttStts"></span>
                                    </div>
                                    <div class="StffDtlsHldr">
                                        <span class="StffName">Nivedita Kumari</span>
                                        <span class="StffGndr FM">Female</span>
                                        <span class="StffDesig">Staff</span>
                                        <span onclick="javascript:ModalPopup();" class="LnkTxt">View Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="AppMdlHldr" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr LdrShpPrfl">
            <div class="ModalTtlHldr LdrshpTtl">
                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="PrflImg TmImg">
                <span class="PrflName">Nivedita Kumari</span>
                <span class="PrflDsgntn">Medical Staff</span>
                <span class="PrflJnedDt">Joined on 21 June 2018</span>
                <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
            </div>
            <div class="ModalCntntHldr LdrshpDtl">
                <div class="LdrPrfDtlsHldr">
                    <div class="PrfDtl">
                        <span class="PrflDtlTxt">EMP-8851-417</span>
                        <span class="PrflDtlTtl">Employee ID</span>
                    </div>
                    <div class="PrfDtl">
                        <span class="PrflDtlTxt">+91 XXXXX XXXXX</span>
                        <span class="PrflDtlTtl">Contact No.</span>
                    </div>
                    <div class="PrfDtl">
                        <span class="PrflDtlTxt">xxxxxx@xxxx.com</span>
                        <span class="PrflDtlTtl">Email ID</span>
                    </div>
                    <div class="PrfDtl">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
