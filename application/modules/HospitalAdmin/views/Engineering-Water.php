<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Engineering - Water</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/BxSlider.css?ver=1" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/BxSlider.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/SliderScript.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
    <!-- <div class="AppMenu">
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
                        <span class="AppMenuAccrdnLnk EnggSltns Actv">
                            <span class="LnkTxt">Engineering Solutions</span>
                        </span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="MenuList">
                            <li>
                                <a href="Engineering.html" class="AppMenuLnk Engnrng Actv">
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
                                <a href="Sanitation.html" class="AppMenuLnk Snttn">
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
                        <span class="AppMenuAccrdnLnk FldOprtns">
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
                                <a href="Attendence.html" class="AppMenuLnk Attndnc">
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
    </div> -->
    <!-- <div class="AppFooter">
        <span class="LstUpdtTxt">Version:<span class="DtlTxt">v3.0.20</span></span>
        <span class="Cprght">Powered by<a href="#" class="LnkTxt">WIS</a></span>
    </div> -->
    <!-- <div class="AppHeader">
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
    </div> -->
    <!-- <div class="AppSbHdr">
        <div class="ContainerLeft">
            <div class="PrprtyPnl">
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
        <div class="ContainerRight">
            <div class="PrprtyPnl">
                <div class="PrprtyBscDtlsHldr">
                    <ul class="PrprtyBscDtlsLst">
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
                <div class="PrptyMpLnkHldr">
                    <ul class="PrprtyBscDtlsLst RgtLnk">
                        <li class="IcHldr MpVw">
                            <a href="Dashboard.html" class="BscDtlLnk">Map View</a>
                        </li>
                    </ul>
                </div>
                <div class="OthrCtyDrpDwnHldr">
                    <div class="CtyDrpDwn">
                        <span class="DrpdwnTxt">All 16 Locations</span>
                        <div class="DrpDwnHldr">
                            <a href="Dashboard.html" class="MpVwLnk">Map View</a>
                            <div class="accordion" id="accordionFlushCExample">
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseCOne"
                                            aria-expanded="false" aria-controls="flush-collapseCOne">
                                            <span class="CtyNme Lctn">Chennai</span>
                                            
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">0</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingCOne" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseCTwo"
                                            aria-expanded="false" aria-controls="flush-collapseCTwo">
                                            <span class="CtyNme Lctn">Delhi</span>
                                            
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">5</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingCTwo" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">3</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">2</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseCThree"
                                            aria-expanded="false" aria-controls="flush-collapseCThree">
                                            <span class="CtyNme Lctn">Hyderabad</span>
                                           
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">1</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingCThree" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">1</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseCFour"
                                            aria-expanded="false" aria-controls="flush-headingCFour">
                                            <span class="CtyNme Lctn">Kolkata</span>
                                           
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">3</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingCFour" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">2</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">1</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseCFive"
                                            aria-expanded="false" aria-controls="flush-headingCFour">
                                            <span class="CtyNme Lctn">Mumbai</span>
                                           
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">0</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCFive" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingCFive" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic
                                                        Banajara<span class="Ntfctns"><span
                                                                class="Val">0</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Engnrng">Engineering</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="LnkTxt Icn EnggWtr Actv">Water</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Energy" class="LnkTxt Icn EnggEnrgy">Energy</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_AirConditioning" class="LnkTxt Icn EnggArCndtng">Air Conditioning</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_AirQuality" class="LnkTxt Icn EnggArQlty">Air Quality</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="LnkTxt Icn EnggSftIntrgtn">Soft Integration</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SpecializedSolutions" class="LnkTxt Icn EnggSpclSltn">Specialized Solutions</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin/engineering" class="BrdCrmLnk">All Engineering</a>
                        </li>
                        <li>
                            <span class="PgTtl">Water</span>
                        </li>
                    </ul>
                </div>
                <div class="SlctDrpdwnHldr">
                    <div class="BttnHldr">
                        <span class="ExpCntrctBtn" onclick="deviceall()" id="all"></span>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr" >
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico WtrTnkLvls">Water Tank Levels</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp " >
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(1)" id="tnk1"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls " id="tanks1">
                        <span class="AraSctnTtl">Terrace</span>
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Domestic Tank</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-50"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-50"></div>
                                                <span class="LiquidStatus">50%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">50%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Flush Tank </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-40"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-40"></div>
                                                <span class="LiquidStatus">40%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">40%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Domestic Tank</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-20"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-20"></div>
                                                <span class="LiquidStatus">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="AraSctnTtl SldrScndTtl">Basement</span>
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Flush Tank - 01</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-50"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-50"></div>
                                                <span class="LiquidStatus">50%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">50%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Flush Tank - 02</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-40"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-40"></div>
                                                <span class="LiquidStatus">40%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">40%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Domestic Tank - 01</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-20"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-20"></div>
                                                <span class="LiquidStatus">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl InnrAra">Domestic Tank - 02</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght">
                                                <div class="Liquid l-80"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-80"></div>
                                                <span class="LiquidStatus">80%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">80%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico LnPrssr">Line Pressure</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(2)" id="tnk2"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks2">
                        <span class="AraSctnTtl">Line Pressure - 01</span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4" >
                                    <div id="container_speed" height="200"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="DtlsHldr LinePressure">
                                        <div class="row DtlsRow">
                                            <div class="col-12 LftHldr">
                                                <span class="TxtHldr">Present Pressure</span>
                                            </div>
                                            <div class="col-12 RgtHldr">
                                                <span class="TxtHldr">100 PSI</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-12 LftHldr">
                                                <span class="TxtHldr">Min. Threshold Pressure</span>
                                            </div>
                                            <div class="col-12 RgtHldr">
                                                <span class="TxtHldr">20 Kgs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-12 LftHldr">
                                                <span class="TxtHldr">Max. Threshold Pressure</span>
                                            </div>
                                            <div class="col-12 RgtHldr">
                                                <span class="TxtHldr">30 Kgs</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="container_pressure" height="200"></div>
                                    <!-- <script>
                                        var ctx = document.getElementById('LinePressureChart').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'line', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                            data: {
                                                labels: ['Male'],
                                                datasets: [
                                                    {
                                                        label: '',
                                                        data: [0, 6, 11, 14],
                                                        borderRadius: 5,
                                                        hoverBackgroundColor: [
                                                            'rgba(0, 0, 0, 0.5)'
                                                        ],
                                                        backgroundColor: [
                                                            'rgba(0, 0, 0, 0.2)'
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
                                    </script> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico MtrMntrng">Motor Monitoring</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(3)" id="tnk3"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks3">
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr MtrMntrng">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Motor - 01</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Motor Status</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr Stts On">On</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Today's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Yesterday's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Weekly Avg. Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr MtrMntrng">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Motor - 02</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Motor Status</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Today's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Yesterday's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Weekly Avg. Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr MtrMntrng">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Motor - 03</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Motor Status</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Today's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Yesterday's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Weekly Avg. Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr MtrMntrng">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Motor - 04</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Motor Status</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr Stts On">On</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Today's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Yesterday's Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-8 LftHldr">
                                                <span class="TxtHldr">Weekly Avg. Running Hrs.</span>
                                            </div>
                                            <div class="col-md-4 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico WtrMtr">Water Meter</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(4)" id="tnk4"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks4">
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Meter - 01</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Average Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Meter - 02</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Average Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Meter - 03</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Average Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Meter - 04</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday's Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Average Reading</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico FrePmp">Firepump</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(5)" id="tnk5"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks5">
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Jockey Pump</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Sprinkler Pump</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Hydrant Pump</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Diesel Pump</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid FrPmpGrphHldr">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="container_speed1" height="100"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="container_pressure1" height="100"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid FrPmpGrphHldr">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="SctnTtl">Diesel Generator</span>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Fuel Consumption</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0 Ltrs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Time</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0 Hrs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Fuel Added</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0 Ltrs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Available Fuel</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">200 Ltrs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Fuel Removed</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">0 Ltrs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Battery Voltage</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">23 Volts</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="LiquidTank Smll">
                                        <div class="Liquid l-70"></div>
                                        <span class="LiquidStatus">70%</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="LiquidTank Smll">
                                        <div class="Liquid Low"></div>
                                        <div class="Liquid Medium"></div>
                                        <div class="Liquid High"></div>
                                        <span class="LowTxt">Low</span>
                                        <span class="MedTxt">Medium</span>
                                        <span class="HghTxt">High</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="SlideHldr">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="SctnTtl">Fire Sump</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="LiquidTank FxdHght">
                                                    <div class="Liquid l-40"></div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-40"></div>
                                                    <span class="LiquidStatus">40%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="DtlsHldr">
                                            <div class="row DtlsRow">
                                                <div class="col-md-6 LftHldr">
                                                    <span class="TxtHldr">Total Capacity</span>
                                                </div>
                                                <div class="col-md-6 RgtHldr">
                                                    <span class="TxtHldr">500 KL</span>
                                                </div>
                                            </div>
                                            <div class="row DtlsRow">
                                                <div class="col-md-6 LftHldr">
                                                    <span class="TxtHldr">Current Level</span>
                                                </div>
                                                <div class="col-md-6 RgtHldr">
                                                    <span class="TxtHldr">375 KL</span>
                                                </div>
                                            </div>
                                            <div class="row DtlsRow">
                                                <div class="col-md-6 LftHldr">
                                                    <span class="TxtHldr">Filled</span>
                                                </div>
                                                <div class="col-md-6 RgtHldr">
                                                    <span class="TxtHldr">40%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid FrPmpGrphHldr">
                            <div class="row">
                                <div class="col-12">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Pumps</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Pumps Capacity</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Pressure Maintained</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Cut in Pressure</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Cut off Pressure</span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">Sprinkler Jockey Pump</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">10.8CU.M/HR/20HP</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">8.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">6.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt PrssStts Atmt">6.5Kg/cm2</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">Main Sprinkler Pump</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">10.8CU.M/HR/20HP</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">8.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">6.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt PrssStts Mnl">Manual</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">Main Hydrant Pump</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">10.8CU.M/HR/20HP</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">8.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">6.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt PrssStts Mnl">Manual</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">Diesel Pump</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">10.8CU.M/HR/20HP</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">8.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">6.5Kg/cm2</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt PrssStts Mnl">Manual</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico HydroPnSstm">Hydro Pnematic System</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(6)" id="tnk6"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks6">
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Pump 01</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Pump 02</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Pump 03</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Pump 04</span>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Switch Position</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts On">Auto</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Running Status</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr Stts Off">Off</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Today</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">1 Min</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Yesterday</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">2 Mins</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Last Week</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">12 Mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid FrPmpGrphHldr">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="container_speed2" height="200"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="DtlsHldr LinePressure">
                                        <div class="row DtlsRow">
                                            <div class="col-12 LftHldr">
                                                <span class="TxtHldr">Present Pressure</span>
                                            </div>
                                            <div class="col-12 RgtHldr">
                                                <span class="TxtHldr">100 PSI</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-12 LftHldr">
                                                <span class="TxtHldr">Min. Threshold Pressure</span>
                                            </div>
                                            <div class="col-12 RgtHldr">
                                                <span class="TxtHldr">20 Kgs</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-12 LftHldr">
                                                <span class="TxtHldr">Max. Threshold Pressure</span>
                                            </div>
                                            <div class="col-12 RgtHldr">
                                                <span class="TxtHldr">30 Kgs</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="container_pressure2" height="200"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico SwgTrtmntPlnt">Sewage Treatment Plant</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(7)" id="tnk7"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks7">

                    </div>
                </div>
                <div class="SrvcSbDshbrdHldr">
                    <div class="SbDshbrdHdr">
                        <div class="HdrTtlHldr">
                            <span class="SrvcInnrTtl Ico HtwtrTnk">Hot Water Tanks</span>
                        </div>
                        <div class="HdrDtlsHldr">
                            <ul class="MniDshbLst">
                                <li>
                                    <span class="SrvDsbIco MnpwrUt Updts"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Plumber</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr MnpowHldr">
                                            <span class="MnpowTtl">Electrician</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="MnpowVlu">10</span>
                                                    <span class="MnpowAttTxt">Assigned</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Prsnt">05</span>
                                                    <span class="MnpowAttTxt">Present</span>
                                                </li>
                                                <li>
                                                    <span class="MnpowVlu Absnt">05</span>
                                                    <span class="MnpowAttTxt">Absent</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="SrvDsbIco ChckLst"></span>
                                    <div class="MniDshbrdTlTp">
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 01</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Cmpltd">Completed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 02</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Dlyd">Delayed</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="TlTpDtlsHldr ChckLstHldr">
                                            <span class="ChckLstTtl">Checklist Name 03</span>
                                            <ul class="DtlLst">
                                                <li>
                                                    <span class="ChckLstSttsTxt Schdld">Scheduled</span>
                                                </li>
                                                <li>
                                                    <span class="TxtLnk"
                                                        onclick="javascript:ModalPopup();">Details</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="BtnHldr">
                                    <span class="ExpCntrctBtn Innr" onclick="device(8)" id="tnk8"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="SbDshbrdDtls" id="tanks8">
                        <div class="RsrsWtrDashSlider">
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Hot Water Tank - 01</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght Cold">
                                                <div class="Liquid l-50"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Cold Smll">
                                                <div class="Liquid l-50"></div>
                                                <span class="LiquidStatus">50%<span class="Temp">35°C</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Temp.</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">35°C</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">50%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Hot Water Tank - 02</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght Hot">
                                                <div class="Liquid l-40"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Hot Smll">
                                                <div class="Liquid l-40"></div>
                                                <span class="LiquidStatus">40%<span class="Temp">80°C</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Temp.</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">80°C</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">40%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Hot Water Tank - 03</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght MedHot">
                                                <div class="Liquid l-20"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank MedHot Smll">
                                                <div class="Liquid l-20"></div>
                                                <span class="LiquidStatus">20%<span class="Temp">59°C</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Temp.</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">59°C</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SlideHldr">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="SctnTtl">Hot Water Tank - 04</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="LiquidTank FxdHght Hot">
                                                <div class="Liquid l-80"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="LiquidTank Hot Smll">
                                                <div class="Liquid l-80"></div>
                                                <span class="LiquidStatus">80%<span class="Temp">92°C</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DtlsHldr">
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Temp.</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">92°C</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Total Capacity</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">500 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Current Level</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">375 KL</span>
                                            </div>
                                        </div>
                                        <div class="row DtlsRow">
                                            <div class="col-md-6 LftHldr">
                                                <span class="TxtHldr">Filled</span>
                                            </div>
                                            <div class="col-md-6 RgtHldr">
                                                <span class="TxtHldr">80%</span>
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
    </div>
    <div id="AppMdlHldr" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Water Tank Levels</span>
                    <span class="FtrTtl">Plumber</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                </div>
                <div class="ModalCntntHldr NoFnctnHdr">

                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $( document ).ready(function() {
    // change div color to blue on page ready
        $(".SbDshbrdDtls").addClass('SbDshbrdDtls Hide');
    });
    function device(a){
        // $("#tanks"+a).toggle("slow"); 
        // $("#tnk"+a).removeClass("ExpCntrctBtn Innr");
        // $("#tnk"+a).addClass("ExpCntrctBtn Innr");       
	if($( "#tanks"+a ).is( ":visible" ))
        {
			// alert("aaaa");
            $('#tanks'+a).hide('slow'); 
            $("#tnk"+a).removeClass("Actv");
            $("#tnk"+a).addClass("");
        }
        else if($( "#tanks"+a ).is( ":hidden" ))
        {
			// alert("bbb");
            $('#tanks'+a).show('slow'); 
            $("#tnk"+a).removeClass("");
            $("#tnk"+a).addClass("Actv");
            
        }
}
function deviceall(a){
        // $("#tanks"+a).toggle("slow"); 
        // $("#tnk"+a).removeClass("ExpCntrctBtn Innr");
        // $("#tnk"+a).addClass("ExpCntrctBtn Innr");       
	if($( "#tanks1" ).is( ":visible" ))
        {
			// alert("aaaa");
            $('#tanks1').hide('slow');
            $('#tanks2').hide('slow');
            $('#tanks3').hide('slow');
            $('#tanks4').hide('slow');
            $('#tanks5').hide('slow');
            $('#tanks6').hide('slow');
            $('#tanks7').hide('slow');
            $('#tanks8').hide('slow'); 
            $("#all").removeClass("Actv");
            $("#all").addClass("");
            $("#tnk1").removeClass("Actv");
            $("#tnk1").addClass("");
            $("#tnk2").removeClass("Actv");
            $("#tnk2").addClass("");
            $("#tnk3").removeClass("Actv");
            $("#tnk3").addClass("");
            $("#tnk4").removeClass("Actv");
            $("#tnk4").addClass("");
            $("#tnk5").removeClass("Actv");
            $("#tnk5").addClass("");
            $("#tnk6").removeClass("Actv");
            $("#tnk6").addClass("");
            $("#tnk7").removeClass("Actv");
            $("#tnk7").addClass("");
            $("#tnk8").removeClass("Actv");
            $("#tnk8").addClass("");
        }
        else if($( "#tanks1" ).is( ":hidden" ))
        {
			// alert("bbb");
            $('#tanks1').show('slow');
            $('#tanks2').show('slow');
            $('#tanks3').show('slow');
            $('#tanks4').show('slow'); 
            $('#tanks5').show('slow');
            $('#tanks6').show('slow'); 
            $('#tanks7').show('slow'); 
            $('#tanks8').show('slow'); 
          
           
            $("#all").removeClass("");
            $("#all").addClass("Actv");
            $("#tnk1").removeClass("");
            $("#tnk1").addClass("Actv");
            $("#tnk2").removeClass("");
            $("#tnk2").addClass("Actv");
            $("#tnk3").removeClass("");
            $("#tnk3").addClass("Actv");
            $("#tnk4").removeClass("");
            $("#tnk4").addClass("Actv");
            $("#tnk5").removeClass("");
            $("#tnk5").addClass("Actv");
            $("#tnk6").removeClass("");
            $("#tnk6").addClass("Actv");
            $("#tnk7").removeClass("");
            $("#tnk7").addClass("Actv");
            $("#tnk8").removeClass("");
            $("#tnk8").addClass("Actv");
            
        }
}

var dps1=[];
    var dps2=[];      
    dps1=[7.38, 7.37, 7.36, 7.35, 7.32, 7.31, 7.3, 7.3, 7.27, 7.26, 7.25, 7.24, 7.22, 7.2, 7.19, 7.17, 7.17, 7.15, 7.14, 7.14, 7.13, 7.12, 7.11, 7.11, 7.1, 7.08, 7.08, 6.85, 6.99, 6.46, 8.27, 8.24, 8.22, 8.22, 8.2, 8.19, 8.17, 8.15, 8.14, 8.12, 8.11, 8.1, 8.09, 8.07, 8.06, 8.05, 8.03, 8.02, 8, 8, 7.98, 7.96, 7.96, 7.94, 7.93, 7.91, 7.9, 7.88, 7.87, 7.86, 7.84, 7.84, 7.82, 7.81, 7.79, 7.78, 7.78, 7.77, 7.75, 7.74, 7.73, 7.71, 7.7, 7.68, 7.68, 7.66, 7.65, 7.64, 7.62, 7.61, 7.59, 7.58, 7.57, 7.56, 7.55, 7.54, 7.52, 7.51, 7.5, 7.49, 7.48, 7.46, 7.46, 7.44];
    dps2=["05:40:36", "05:52:10", "06:04:15", "06:16:20", "06:39:38", "06:50:52", "07:02:47", "07:13:50", "07:37:52", "07:49:52", "08:01:52", "08:13:31", "08:24:46", "08:35:59", "08:47:44", "08:58:57", "09:10:51", "09:22:41", "09:33:43", "09:44:35", "09:55:30", "10:06:47", "10:17:36", "10:28:53", "10:40:30", "10:51:39", "11:02:39", "11:13:56", "11:25:40", "11:36:55", "11:48:37", "12:10:38", "12:21:45", "12:32:37", "12:43:54", "12:55:56", "13:07:44", "13:18:34", "13:29:32", "13:40:49", "13:51:55", "14:03:43", "14:14:32", "14:25:48", "14:36:35", "14:47:38", "14:58:30", "15:09:46", "15:20:55", "15:32:51", "15:44:38", "15:55:34", "16:06:40", "16:17:34", "16:28:56", "16:40:40", "16:51:43", "17:02:35", "17:13:36", "17:24:29", "17:35:37", "17:46:57", "17:58:57", "18:10:50", "18:22:44", "18:33:53", "18:33:53", "18:45:36", "18:56:52", "19:08:42", "19:19:38", "19:30:57", "19:42:38", "19:53:36", "20:04:42", "20:15:46", "20:26:49", "20:38:34", "20:49:48", "21:00:51", "21:12:53", "21:24:48", "21:35:33", "21:46:46", "21:57:32", "22:08:44", "22:19:39", "22:30:32", "22:41:49", "22:52:47", "23:03:34", "23:14:53", "23:26:41", "23:37:57"]
    
    
var t=parseFloat(dps1[dps1.length-1]);
var pressurecontainer="container_pressure";
var speedcontainer="container_speed";

Highcharts.chart(pressurecontainer, {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
      
        type: 'line'
    },

                      credits: {
                          enabled: false
                      },
      
    title: {
        text: ''
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Bar'     
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: dps1
        
    }],
    responsive: {
    rules: [{
      condition: {
        
        maxHeight:100
      }
    }]
    }
}); 


 //speed guage
           //highchart
var H = Highcharts;
var each = H.each,
  merge = H.merge,
  pInt = H.pInt,
  pick = H.pick,
  isNumber = H.isNumber;


Highcharts.seriesTypes.gauge.prototype.translate = function() {
  var series = this,
    yAxis = series.yAxis,
    options = series.options,
    center = yAxis.center;

  series.generatePoints();

  each(series.points, function(point) {

    var dialOptions = merge(options.dial, point.dial),
      isRectanglePoint = point.series.userOptions.isRectanglePoint,
      radius = (pInt(pick(dialOptions.radius, 80)) * center[2]) / 200,
      baseLength = (pInt(pick(dialOptions.baseLength, 70)) * radius) / 100,
      rearLength = (pInt(pick(dialOptions.rearLength, 10)) * radius) / 100,
      baseWidth = dialOptions.baseWidth || 3,
      topWidth = dialOptions.topWidth || 1,
      overshoot = options.overshoot,
      rotation = yAxis.startAngleRad + yAxis.translate(point.y, null, null, null, true);

    // Handle the wrap and overshoot options
    if (isNumber(overshoot)) {
      overshoot = overshoot / 180 * Math.PI;
      rotation = Math.max(yAxis.startAngleRad - overshoot, Math.min(yAxis.endAngleRad + overshoot, rotation));

    } else if (options.wrap === false) {
      rotation = Math.max(yAxis.startAngleRad, Math.min(yAxis.endAngleRad, rotation));
    }
   

    rotation = rotation * 180 / Math.PI;

    // Checking series to draw dots
    if (isRectanglePoint) {  //draw new dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
           'M', -rearLength + 6, (-baseWidth / 2), 'L', -rearLength + 12, (-baseWidth / 2) + 6, -rearLength +6, (-baseWidth / 2) + 12, -rearLength, (-baseWidth / 2) + 6, 'z'
        ],
        translateX: center[0] - baseWidth - 1,
        translateY: center[1],
        rotation: rotation,
        style: 'stroke: white; stroke-width: 2;'
      };

    } else {  //draw standard dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
          'M', -rearLength, -baseWidth / 2,
          'L',
          baseLength, -baseWidth / 2,
          radius, -topWidth / 2,
          radius, topWidth / 2,
          baseLength, baseWidth / 2, -rearLength, baseWidth / 2,
          'z'
        ],
        translateX: center[0],
        translateY: center[1],
        rotation: rotation
      };

    }

    // Positions for data label
    point.plotX = center[0];
    point.plotY = center[1];


  });
}; // end of replaced function

var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

                      credits: {
                          enabled: false
                      },

    title: null,
    
    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'solid'
        }
    },
    
    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {

                plotBands: [{
            from: 0,
            to: 4,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 4,
            to: 8,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 8,
            to: 12,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 12,
            to: 16,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,16],
        tickAmount: 1,
        min: 0,
        max: 16,
        title: {
            y: -100
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
            },
                      marker: {
            enabled: true,
            symbol: 'triangle',
            }
        },
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart(speedcontainer, Highcharts.merge(gaugeOptions, {
    yAxis: {
    
    title: {
      text: 'Pressure in Bar'
        }
    },
   

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            // data: [t],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [t],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      }
    }
  ]

}));

//firepump
Highcharts.chart('container_pressure1', {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
      
        type: 'line'
    },

                      credits: {
                          enabled: false
                      },
      
    title: {
        text: ''
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Bar'     
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: dps1
        
    }],
    responsive: {
    rules: [{
      condition: {
        
        maxHeight:100
      }
    }]
    }
}); 


 //speed guage
           //highchart
var H = Highcharts;
var each = H.each,
  merge = H.merge,
  pInt = H.pInt,
  pick = H.pick,
  isNumber = H.isNumber;


Highcharts.seriesTypes.gauge.prototype.translate = function() {
  var series = this,
    yAxis = series.yAxis,
    options = series.options,
    center = yAxis.center;

  series.generatePoints();

  each(series.points, function(point) {

    var dialOptions = merge(options.dial, point.dial),
      isRectanglePoint = point.series.userOptions.isRectanglePoint,
      radius = (pInt(pick(dialOptions.radius, 80)) * center[2]) / 200,
      baseLength = (pInt(pick(dialOptions.baseLength, 70)) * radius) / 100,
      rearLength = (pInt(pick(dialOptions.rearLength, 10)) * radius) / 100,
      baseWidth = dialOptions.baseWidth || 3,
      topWidth = dialOptions.topWidth || 1,
      overshoot = options.overshoot,
      rotation = yAxis.startAngleRad + yAxis.translate(point.y, null, null, null, true);

    // Handle the wrap and overshoot options
    if (isNumber(overshoot)) {
      overshoot = overshoot / 180 * Math.PI;
      rotation = Math.max(yAxis.startAngleRad - overshoot, Math.min(yAxis.endAngleRad + overshoot, rotation));

    } else if (options.wrap === false) {
      rotation = Math.max(yAxis.startAngleRad, Math.min(yAxis.endAngleRad, rotation));
    }
   

    rotation = rotation * 180 / Math.PI;

    // Checking series to draw dots
    if (isRectanglePoint) {  //draw new dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
           'M', -rearLength + 6, (-baseWidth / 2), 'L', -rearLength + 12, (-baseWidth / 2) + 6, -rearLength +6, (-baseWidth / 2) + 12, -rearLength, (-baseWidth / 2) + 6, 'z'
        ],
        translateX: center[0] - baseWidth - 1,
        translateY: center[1],
        rotation: rotation,
        style: 'stroke: white; stroke-width: 2;'
      };

    } else {  //draw standard dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
          'M', -rearLength, -baseWidth / 2,
          'L',
          baseLength, -baseWidth / 2,
          radius, -topWidth / 2,
          radius, topWidth / 2,
          baseLength, baseWidth / 2, -rearLength, baseWidth / 2,
          'z'
        ],
        translateX: center[0],
        translateY: center[1],
        rotation: rotation
      };

    }

    // Positions for data label
    point.plotX = center[0];
    point.plotY = center[1];


  });
}; // end of replaced function

var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

                      credits: {
                          enabled: false
                      },

    title: null,
    
    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'solid'
        }
    },
    
    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {

                plotBands: [{
            from: 0,
            to: 4,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 4,
            to: 8,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 8,
            to: 12,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 12,
            to: 16,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,16],
        tickAmount: 1,
        min: 0,
        max: 16,
        title: {
            y: -100
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
            },
                      marker: {
            enabled: true,
            symbol: 'triangle',
            }
        },
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('container_speed1', Highcharts.merge(gaugeOptions, {
    yAxis: {
    
    title: {
      text: 'Pressure in Bar'
        }
    },
   

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            // data: [t],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [t],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      }
    }
  ]

}));
//hydronematic
Highcharts.chart('container_pressure2', {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
      
        type: 'line'
    },

                      credits: {
                          enabled: false
                      },
      
    title: {
        text: ''
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Bar'     
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: dps1
        
    }],
    responsive: {
    rules: [{
      condition: {
        
        maxHeight:100
      }
    }]
    }
}); 


 //speed guage
           //highchart
var H = Highcharts;
var each = H.each,
  merge = H.merge,
  pInt = H.pInt,
  pick = H.pick,
  isNumber = H.isNumber;


Highcharts.seriesTypes.gauge.prototype.translate = function() {
  var series = this,
    yAxis = series.yAxis,
    options = series.options,
    center = yAxis.center;

  series.generatePoints();

  each(series.points, function(point) {

    var dialOptions = merge(options.dial, point.dial),
      isRectanglePoint = point.series.userOptions.isRectanglePoint,
      radius = (pInt(pick(dialOptions.radius, 80)) * center[2]) / 200,
      baseLength = (pInt(pick(dialOptions.baseLength, 70)) * radius) / 100,
      rearLength = (pInt(pick(dialOptions.rearLength, 10)) * radius) / 100,
      baseWidth = dialOptions.baseWidth || 3,
      topWidth = dialOptions.topWidth || 1,
      overshoot = options.overshoot,
      rotation = yAxis.startAngleRad + yAxis.translate(point.y, null, null, null, true);

    // Handle the wrap and overshoot options
    if (isNumber(overshoot)) {
      overshoot = overshoot / 180 * Math.PI;
      rotation = Math.max(yAxis.startAngleRad - overshoot, Math.min(yAxis.endAngleRad + overshoot, rotation));

    } else if (options.wrap === false) {
      rotation = Math.max(yAxis.startAngleRad, Math.min(yAxis.endAngleRad, rotation));
    }
   

    rotation = rotation * 180 / Math.PI;

    // Checking series to draw dots
    if (isRectanglePoint) {  //draw new dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
           'M', -rearLength + 6, (-baseWidth / 2), 'L', -rearLength + 12, (-baseWidth / 2) + 6, -rearLength +6, (-baseWidth / 2) + 12, -rearLength, (-baseWidth / 2) + 6, 'z'
        ],
        translateX: center[0] - baseWidth - 1,
        translateY: center[1],
        rotation: rotation,
        style: 'stroke: white; stroke-width: 2;'
      };

    } else {  //draw standard dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
          'M', -rearLength, -baseWidth / 2,
          'L',
          baseLength, -baseWidth / 2,
          radius, -topWidth / 2,
          radius, topWidth / 2,
          baseLength, baseWidth / 2, -rearLength, baseWidth / 2,
          'z'
        ],
        translateX: center[0],
        translateY: center[1],
        rotation: rotation
      };

    }

    // Positions for data label
    point.plotX = center[0];
    point.plotY = center[1];


  });
}; // end of replaced function

var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

                      credits: {
                          enabled: false
                      },

    title: null,
    
    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'solid'
        }
    },
    
    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {

                plotBands: [{
            from: 0,
            to: 4,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 4,
            to: 8,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 8,
            to: 12,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 12,
            to: 16,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,16],
        tickAmount: 1,
        min: 0,
        max: 16,
        title: {
            y: -100
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
            },
                      marker: {
            enabled: true,
            symbol: 'triangle',
            }
        },
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('container_speed2', Highcharts.merge(gaugeOptions, {
    yAxis: {
    
    title: {
      text: 'Pressure in Bar'
        }
    },
   

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            // data: [t],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [t],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      }
    }
  ]

}));

</script>
</html>