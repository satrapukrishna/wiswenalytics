<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendence Dates</title>
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
                    <span class="AttndncDate">Today, 20 March 2021</span>
                    <span class="AttndncTimeShft">08 AM - 08 PM - Shift 01</span>
                    <div class="FtrInnrDshbrd">
                        <div class="InnrDshbrdHldr">
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls">109</span>
                                <span class="FtrInnrTtl">Total Staff</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Icn Male">64</span>
                                <span class="FtrInnrTtl">Male Staff</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Icn FeMale">45</span>
                                <span class="FtrInnrTtl">Female Staff</span>
                            </div>
                        </div>
                        <div class="InnrDshbrdHldr">
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls">95</span>
                                <span class="FtrInnrTtl">Assigned</span>
                                <div class="GndrDvdsn">
                                    <span class="GndrIco Male">50</span>
                                    <span class="GndrIco FeMale">50</span>
                                </div>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Good">92</span>
                                <span class="FtrInnrTtl Good">Present</span>
                                <div class="GndrDvdsn">
                                    <span class="GndrIco Male">50</span>
                                    <span class="GndrIco FeMale">50</span>
                                </div>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Bad">03</span>
                                <span class="FtrInnrTtl Bad">Absent</span>
                                <div class="GndrDvdsn">
                                    <span class="GndrIco Male">50</span>
                                    <span class="GndrIco FeMale">50</span>
                                </div>
                            </div>
                        </div>
                        <div class="InnrDshbrdHldr">
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Good">85</span>
                                <span class="FtrInnrTtl Good">On time</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Stsfctry">05</span>
                                <span class="FtrInnrTtl Stsfctry">Late by >30 mins</span>
                            </div>
                            <div class="InnrDshbrd">
                                <span class="FtrInrDtls Bad">45</span>
                                <span class="FtrInnrTtl Bad">Late by <30 mins</span>
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
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
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
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl PlmbgStff"><span class="LnkTxt">Plumbing Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
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
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
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
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
                            <span class="FtrInnrTtl">Female Staff</span>
                        </div>
                    </div>
                </div>
                <div class="FtrInnrDshbrd">
                    <div class="FtrTtlHldr">
                        <a href="#" class="FtrTtl MdclStff"><span class="LnkTxt">Medical Staff</span></a>
                    </div>
                    <div class="InnrDshbrdHldr">
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
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
                            <span class="FtrInrDtls">109</span>
                            <span class="FtrInnrTtl">Total Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn Male">64</span>
                            <span class="FtrInnrTtl">Male Staff</span>
                        </div>
                        <div class="InnrDshbrd">
                            <span class="FtrInrDtls Icn FeMale">45</span>
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
                            <span class="PgTtl">All Departments</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="InnrTtl">Custom Date</span>
                            <span class="InnrTxt">30 April 2021</span>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="Browse Date">
                        </div>
                        <div class="col-md-8 BttnHldr">
                            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin/attendenceCustomDate'" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
