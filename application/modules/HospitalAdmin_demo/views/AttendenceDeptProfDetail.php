<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendence Detail</title>
    <link rel="shortcut icon" type="image/png" href="Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="Scripts/Script.js"></script>
</head>
<body>
    <div class="AppMenu">
        <span class="AppMenuBtn">
            <span class="BtnTxt">Menu</span>
        </span>
        <ul class="MenuList">
            <li>
                <a href="Dashboard.html" class="AppMenuLnk Map">
                    <span class="LnkTxt">Map</span>
                </a>
            </li>
            <li>
                <a href="HospitalSelection.html" class="AppMenuLnk Dshbrd">
                    <span class="LnkTxt">Dashboard</span>
                </a>
            </li>
        </ul>
        <div class="MenuAccrdn">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="AppMenuAccrdnLnk EnggSltns">
                            <span class="LnkTxt">Engineering Solutions</span>
                        </span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="MenuList">
                            <li>
                                <a href="Engineering.html" class="AppMenuLnk Engnrng">
                                    <span class="LnkTxt">BMS</span>
                                </a>
                            </li>
                            <li>
                                <a href="Machinery.html" class="AppMenuLnk Mchnry">
                                    <span class="LnkTxt">Machinery</span>
                                </a>
                            </li>
                            <li>
                                <a href="Resources.html" class="AppMenuLnk Rsrcs">
                                    <span class="LnkTxt">Resources</span>
                                </a>
                            </li>
                            <li>
                                <a href="Sanitation.html" class="AppMenuLnk Snttn Actv">
                                    <span class="LnkTxt">Sanitation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="AppMenuAccrdnLnk FldOprtns Actv">
                            <span class="LnkTxt">Field Operations</span>
                        </span>
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="MenuList">
                            <li>
                                <a href="RepairMaintenance.html" class="AppMenuLnk ReprMntnnc">
                                    <span class="LnkTxt">Repairs & Maintenance</span>
                                </a>
                            </li>
                            <li>
                                <a href="InventoryManagement.html" class="AppMenuLnk InvntryMngmnt">
                                    <span class="LnkTxt">Inventory Management</span>
                                </a>
                            </li>
                            <li>
                                <a href="Checklist.html" class="AppMenuLnk Chcklsts">
                                    <span class="LnkTxt">Checklists</span>
                                </a>
                            </li>
                            <li>
                                <a href="PPM.html" class="AppMenuLnk PPM">
                                    <span class="LnkTxt">PPM</span>
                                </a>
                            </li>
                            <li>
                                <a href="Attendence.html" class="AppMenuLnk Attndnc Actv">
                                    <span class="LnkTxt">Attendance</span>
                                </a>
                            </li>
                            <li>
                                <a href="BedsOccupancy.html" class="AppMenuLnk BdsOccpncy">
                                    <span class="LnkTxt">Beds & Occupancy</span>
                                </a>
                            </li>
                            <li>
                                <a href="ManpowerUtilization.html" class="AppMenuLnk MnpwrUtlztn">
                                    <span class="LnkTxt">Manpower Utilization</span>
                                </a>
                            </li>
                            <li>
                                <a href="BillingSoftware.html" class="AppMenuLnk BllngSftwr">
                                    <span class="LnkTxt">Billing Software</span>
                                </a>
                            </li>
                            <li>
                                <a href="ComplaintFeedback.html" class="AppMenuLnk CmplntsFdbck">
                                    <span class="LnkTxt">Complaints & Feedback</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="AppMenuAccrdnLnk ExtrMls">
                            <span class="LnkTxt">Extra Mile</span>
                        </span>
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="MenuList">
                            <li>
                                <a href="Audits.html" class="AppMenuLnk Adts">
                                    <span class="LnkTxt">Audits</span>
                                </a>
                            </li>
                            <li>
                                <a href="Benchmarking.html" class="AppMenuLnk Bnchmrkng">
                                    <span class="LnkTxt">Benchmarking</span>
                                </a>
                            </li>
                            <li>
                                <a href="Recommendations.html" class="AppMenuLnk Rcmmndtns">
                                    <span class="LnkTxt">Recommendations</span>
                                </a>
                            </li>
                            <li>
                                <a href="Comparisions.html" class="AppMenuLnk Cmprsns">
                                    <span class="LnkTxt">Comparisions</span>
                                </a>
                            </li>
                            <li>
                                <a href="CarbonFootprint.html" class="AppMenuLnk CrbnFtprnt">
                                    <span class="LnkTxt">Carbon Footprint</span>
                                </a>
                            </li>
                            <li>
                                <a href="Plans.html" class="AppMenuLnk Plns">
                                    <span class="LnkTxt">Plans</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <div class="AppFooter">
        <span class="LstUpdtTxt">Version:<span class="DtlTxt">v3.0.20</span></span>
        <span class="Cprght">Powered by<a href="#" class="LnkTxt">WIS</a></span>
    </div>
    <div class="AppHeader">
        <div class="ContainerLeft">
            <div class="AppClientLogo">
                <img src="Images/ClientLogo.png" class="ClientLogo" />
            </div>
        </div>
        <div class="ContainerRight">
            <div class="AppUsrLnks">
                <ul class="PrflHdrLnk">
                    <li>
                        <div class="PrfHldr">
                            <img src="Images/UserImg.jpg" class="UserImg" />
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
                        <a href="Login.html" class="HdrIcoLnk Lgout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="AppSbHdr">
        <div class="ContainerLeft">
            <div class="PrprtyPnl">
                <div class="row">
                    <div class="col-2"><a href="Dashboard.html" class="BackBtn"></a></div>
                    <div class="col-10">
                        <div class="PrptyDrpDwn">
                            <span class="PrptyNm">FirstMedic Banjara</span>
                            <div class="DrpDwnHldr">
                                <ul class="DrpDwnLst">
                                    <li>
                                        <a href="HospitalSelection.html" class="InnrPrptyNm">FirstMedic Banjara</a>
                                        <span class="InnrPrptyAddrs">Road No. 12, Banjara Hills, Hyderabad, Telangana.</span>
                                    </li>
                                    <li>
                                        <a href="HospitalSelection.html" class="InnrPrptyNm">FirstMedic Banjara</a>
                                        <span class="InnrPrptyAddrs">Road No. 12, Banjara Hills, Hyderabad, Telangana.</span>
                                    </li>
                                    <li>
                                        <a href="HospitalSelection.html" class="InnrPrptyNm">FirstMedic Banjara</a>
                                        <span class="InnrPrptyAddrs">Road No. 12, Banjara Hills, Hyderabad, Telangana.</span>
                                    </li>
                                    <li>
                                        <a href="HospitalSelection.html" class="InnrPrptyNm">FirstMedic Banjara</a>
                                        <span class="InnrPrptyAddrs">Road No. 12, Banjara Hills, Hyderabad, Telangana.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="PrprtyPnl">
                <div class="row">
                    <div class="col-10">
                        <ul class="PrprtyBscDtls">
                            <li class="IcHldr Estblshd">
                                <span class="BscDtlTxt">2005</span>
                                <span class="BscDtlTtl">Established</span>
                            </li>
                            <li class="IcHldr Twrs">
                                <span class="BscDtlTxt">03</span>
                                <span class="BscDtlTtl">Blocks/ Towers</span>
                            </li>
                            <li class="IcHldr Bds">
                                <span class="BscDtlTxt">300</span>
                                <span class="BscDtlTtl">Beds</span>
                            </li>
                            <li class="IcHldr Ntfctns">
                                <span class="BscDtlTxt">5</span>
                                <span class="BscDtlTtl">New Notifications</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul class="PrprtyBscDtls RgtLnk">
                            <li class="IcHldr MpVw">
                                <a href="Dashboard.html" class="BscDtlLnk">Map View</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <div class="FtrInnrDshbrd Actv">
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <ul class="DtlsBrdCrmb">
                                <li>
                                    <a href="Checklist.html" class="BrdCrmLnk">All Departments</a>
                                </li>
                                <li>
                                    <span class="PgTtl">Medical Staff</span>
                                </li>
                            </ul>
                        </div>
                        <!--<div class="col-2">
                            <select class="form-select DtlGnrcDrpDwn" aria-label="Default select example">
                                <option selected>Grid View</option>
                                <option value="1">List View</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select class="form-select DtlGnrcDrpDwn" aria-label="Default select example">
                                <option selected>Sort by</option>
                                <option value="1">Completed</option>
                                <option value="2">Scheduled</option>
                                <option value="3">Delayed</option>
                            </select>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="InnrTtl">Today</span>
                            <span class="InnrTxt">30 April 2021</span>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="Browse Date">
                        </div>
                        <div class="col-md-8 BttnHldr">
                            <button type="button" onclick="location.href='AttendenceCustomDate.html'" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="StffAttndDshb FullDetails">
                <span class="DptTtl">Medical Staff</span>
                <div class="StffAttndDshbHldr">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <div class="StffBscDtls">
                                    <div class="StffImgHldr">
                                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="StffImg Suprvsr" />
                                    </div>
                                    <div class="StffNmDtlsHldr">
                                        <span class="StffNme Suprvsr">Surya Kumari</span>
                                        <span class="StffDsgntn">Floor Supervisor</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="StffDshHghlgt Assgnd">
                                    <span class="Count">38</span>
                                    <span class="CntTtl">Assigned</span>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="StffDshHghlgt Prsnt">
                                    <span class="Count">34</span>
                                    <span class="CntTtl">Present</span>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="StffDshHghlgt Absnt">
                                    <span class="Count">04</span>
                                    <span class="CntTtl">Absent</span>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="StffDshHghlgt OnTm">
                                    <span class="Count">31</span>
                                    <span class="CntTtl">On time</span>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="StffDshHghlgt LtL">
                                    <span class="Count">02</span>
                                    <span class="CntTtl">Late by >30 mins</span>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="StffDshHghlgt LtM">
                                    <span class="Count">01</span>
                                    <span class="CntTtl">Late by <30 mins</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="AttDeptDtlsHldr">
                    <div class="container-fluid">
                        <div class="row DtlsHldrRow">
                            <div class="col-12">
                                <span class="DptmntAreaTtl">LTICU</span>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row DtlsHldrRow">
                            <div class="col-12">
                                <span class="DptmntAreaTtl">LTICU</span>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row DtlsHldrRow">
                            <div class="col-12">
                                <span class="DptmntAreaTtl">LTICU</span>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row DtlsHldrRow">
                            <div class="col-12">
                                <span class="DptmntAreaTtl">LTICU</span>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row DtlsHldrRow">
                            <div class="col-12">
                                <span class="DptmntAreaTtl">LTICU</span>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
                                            <a href="AttendenceDeptProfDetail.html" class="LnkTxt">View Profile</a>
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
    <div id="AppMdlHldr" class="AppModalHldr">
        <div class="AppModalInnrHldr">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Medical Staff</span>
                    <span class="FtrTtl">Nivedita Kumari</span>
                    <a href="AttendenceDeptDetail.html" class="ModalClsBtn"></a>
                </div>
                <div class="ModalCntntHldr NoFnctnHdr">
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
