﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="refresh" content="0;URL='<?php echo base_url(); ?>HospitalAdmin/engineering_Water'" />
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Engineering</title>
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
    <!-- <div class="AppMenu">
        <span class="AppMenuBtn">
            <span class="BtnTxt">Menu</span>
        </span>
        <ul class="MenuList">
            <li>
                <a href="<?php echo base_url(); ?>HospitalAdmin/dashboard" class="AppMenuLnk Map Actv">
                    <span class="LnkTxt">Map</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="AppMenuLnk Dshbrd">
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
                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering" class="AppMenuLnk Engnrng Actv">
                                    <span class="LnkTxt">BMS</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="AppMenuLnk Mchnry">
                                    <span class="LnkTxt">Machinery</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="AppMenuLnk Rsrcs">
                                    <span class="LnkTxt">Resources</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="AppMenuLnk Snttn">
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
                                <a href="<?php echo base_url(); ?>HospitalAdmin/repairMaintenance" class="AppMenuLnk ReprMntnnc">
                                    <span class="LnkTxt">Repairs & Maintenance</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/inventoryManagement" class="AppMenuLnk InvntryMngmnt">
                                    <span class="LnkTxt">Inventory Management</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="AppMenuLnk Chcklsts">
                                    <span class="LnkTxt">Checklists</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/pPM" class="AppMenuLnk PPM">
                                    <span class="LnkTxt">PPM</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="AppMenuLnk Attndnc">
                                    <span class="LnkTxt">Attendance</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancy" class="AppMenuLnk BdsOccpncy">
                                    <span class="LnkTxt">Beds & Occupancy</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/manpowerUtilization" class="AppMenuLnk MnpwrUtlztn">
                                    <span class="LnkTxt">Manpower Utilization</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/billingSoftware" class="AppMenuLnk BllngSftwr">
                                    <span class="LnkTxt">Billing Software</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="AppMenuLnk CmplntsFdbck">
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
                                <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="AppMenuLnk Adts">
                                    <span class="LnkTxt">Audits</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/benchmarking" class="AppMenuLnk Bnchmrkng">
                                    <span class="LnkTxt">Benchmarking</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="AppMenuLnk Rcmmndtns">
                                    <span class="LnkTxt">Recommendations</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/comparisions" class="AppMenuLnk Cmprsns">
                                    <span class="LnkTxt">Comparisions</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/carbonFootprint" class="AppMenuLnk CrbnFtprnt">
                                    <span class="LnkTxt">Carbon Footprint</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/plans" class="AppMenuLnk Plns">
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
    <?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
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
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCOne" aria-expanded="false" aria-controls="flush-collapseCOne">
                                            <span class="CtyNme Lctn">Chennai</span>
                                           
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">0</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCOne" class="accordion-collapse collapse" aria-labelledby="flush-headingCOne" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCTwo" aria-expanded="false" aria-controls="flush-collapseCTwo">
                                            <span class="CtyNme Lctn">Delhi</span>
                                            
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">5</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingCTwo" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">3</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">2</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCThree" aria-expanded="false" aria-controls="flush-collapseCThree">
                                            <span class="CtyNme Lctn">Hyderabad</span>
                                           
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">1</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCThree" class="accordion-collapse collapse" aria-labelledby="flush-headingCThree" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">1</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCFour" aria-expanded="false" aria-controls="flush-headingCFour">
                                            <span class="CtyNme Lctn">Kolkata</span>
                                            
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">3</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCFour" class="accordion-collapse collapse" aria-labelledby="flush-headingCFour" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">2</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">1</span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <span class="accordion-header" id="flush-headingCFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCFive" aria-expanded="false" aria-controls="flush-headingCFour">
                                            <span class="CtyNme Lctn">Mumbai</span>
                                           
                                            <span class="SbDtls Icn Ntfctns"><span class="Val">0</span></span>
                                        </button>
                                    </span>
                                    <div id="flush-collapseCFive" class="accordion-collapse collapse" aria-labelledby="flush-headingCFive" data-bs-parent="#accordionFlushCExample">
                                        <div class="accordion-body">
                                            <ul class="HsptlLst">
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="HospitalSelection.html" class="HsptlLnk">FirstMedic Banajara<span class="Ntfctns"><span class="Val">0</span></span></a>
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
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Engnrng">Engineering</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="LnkTxt Icn EnggWtr">Water</a>
                    </li>
                    <li>
                        <a href="Engineering-Energy.html" class="LnkTxt Icn EnggEnrgy">Energy</a>
                    </li>
                    <li>
                        <a href="Engineering-AirConditioning.html" class="LnkTxt Icn EnggArCndtng">Air Conditioning</a>
                    </li>
                    <li>
                        <a href="Engineering-AirQuality.html" class="LnkTxt Icn EnggArQlty">Air Quality</a>
                    </li>
                    <li>
                        <a href="Engineering-SoftIntegration.html" class="LnkTxt Icn EnggSftIntrgtn">Soft Integration</a>
                    </li>
                    <li>
                        <a href="Engineering-SpecializedSolutions.html" class="LnkTxt Icn EnggSpclSltn">Specialized Solutions</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">All Engineering</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
