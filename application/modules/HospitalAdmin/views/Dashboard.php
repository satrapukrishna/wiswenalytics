<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashbaord</title>
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
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>

<body onload="initialize()">
    <div class="AppMenu">
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
                        <span class="AppMenuAccrdnLnk EnggSltns">
                            <span class="LnkTxt">Engineering Solutions</span>
                        </span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="MenuList">
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering" class="AppMenuLnk Engnrng">
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
                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="AppMenuLnk Attndnc">
                                    <span class="LnkTxt">Attendance</span>
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
                                <a href="<?php echo base_url(); ?>HospitalAdmin/aMC" class="AppMenuLnk PPM">
                                    <span class="LnkTxt">AMC</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="AppMenuLnk CmplntsFdbck">
                                    <span class="LnkTxt">Complaints & Feedback</span>
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
                                <a href="<?php echo base_url(); ?>HospitalAdmin/inventoryManagement" class="AppMenuLnk InvntryMngmnt">
                                    <span class="LnkTxt">Inventory Management</span>
                                </a>
                            </li>
                            
                           <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/repairMaintenance" class="AppMenuLnk ReprMntnnc">
                                    <span class="LnkTxt">Repairs & Maintenance</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>HospitalAdmin/billingSoftware" class="AppMenuLnk BllngSftwr">
                                    <span class="LnkTxt">Billing Software</span>
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
        
    </div>
    <div class="AppFooter">
        <span class="LstUpdtTxt">Version:<span class="DtlTxt">v3.0.20</span></span>
        <span class="Cprght">Powered by<a href="#" class="LnkTxt">WIS</a></span>
    </div>
    <div class="AppHeader DshbrdMpPg">
        <div class="ContainerLeft">
            <div class="AppClientLogo">
                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientLogo.png" class="ClientLogo" />
            </div>
        </div>
        <div class="ContainerRight">
            <div class="AppUsrLnks">
                <ul class="PrflHdrLnk">
                    <li>
                        <div class="PrfHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/UserImg.jpg" class="UserImg" />
                            <span class="UsrNme">Radhika K.</span>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/notifications" class="HdrIcoLnk Ntfctns Updts"></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/settings" class="HdrIcoLnk Sttngs"></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/login" class="HdrIcoLnk Lgout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="AppSbHdr DshbrdMpPg">
        <div class="ContainerLeft">
        </div>
        <div class="ContainerRight">
            <div class="CtyDrpDwn MpActv">
                <span class="DrpdwnTxt">All 16 Locations</span>
                <div class="MpSrchBx">
                    <input class="form-control MpSrchInpt" type="text" placeholder="Search by area name"
                        aria-label="default input example" />
                </div>
                <div class="DrpDwnHldr">
                    <div class="accordion" id="accordionFlushCExample">
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCOne" aria-expanded="false"
                                    aria-controls="flush-collapseCOne">
                                    <span class="CtyNme Lctn">Chennai</span>
                                    <span class="SbDtls Icn Hsptl"><span class="Val">4</span></span>
                                    <!--<span class="SbDtls Icn HsptlBds"><span class="Val">970</span></span>-->
                                    <span class="SbDtls Icn Ntfctns"><span class="Val">0</span></span>
                                </button>
                            </span>
                            <div id="flush-collapseCOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingCOne" data-bs-parent="#accordionFlushCExample">
                                <div class="accordion-body">
                                    <ul class="HsptlLst">
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Koyambedu<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Velechary<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic
                                                Thoraipakkam<span class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic
                                                Tiruvottiyur<span class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCTwo" aria-expanded="false"
                                    aria-controls="flush-collapseCTwo">
                                    <span class="CtyNme Lctn">Delhi</span>
                                    <span class="SbDtls Icn Hsptl"><span class="Val">4</span></span>
                                    <!--<span class="SbDtls Icn HsptlBds"><span class="Val">970</span></span>-->
                                    <span class="SbDtls Icn Ntfctns"><span class="Val">5</span></span>
                                </button>
                            </span>
                            <div id="flush-collapseCTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingCTwo" data-bs-parent="#accordionFlushCExample">
                                <div class="accordion-body">
                                    <ul class="HsptlLst">
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Pitam Pura<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Chandini
                                                Chowk<span class="Ntfctns"><span class="Val">3</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Bhajanpura<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Karol Bagh<span
                                                    class="Ntfctns"><span class="Val">2</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCThree" aria-expanded="false"
                                    aria-controls="flush-collapseCThree">
                                    <span class="CtyNme Lctn">Hyderabad</span>
                                    <span class="SbDtls Icn Hsptl"><span class="Val">3</span></span>
                                    <!--<span class="SbDtls Icn HsptlBds"><span class="Val">970</span></span>-->
                                    <span class="SbDtls Icn Ntfctns"><span class="Val">1</span></span>
                                </button>
                            </span>
                            <div id="flush-collapseCThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingCThree" data-bs-parent="#accordionFlushCExample">
                                <div class="accordion-body">
                                    <ul class="HsptlLst">
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Kukatpally<span
                                                    class="Ntfctns"><span class="Val">1</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Kompally<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Banjara
                                                Hills<span class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCFour" aria-expanded="false"
                                    aria-controls="flush-headingCFour">
                                    <span class="CtyNme Lctn">Kolkata</span>
                                    <span class="SbDtls Icn Hsptl"><span class="Val">5</span></span>
                                    <!--<span class="SbDtls Icn HsptlBds"><span class="Val">970</span></span>-->
                                    <span class="SbDtls Icn Ntfctns"><span class="Val">3</span></span>
                                </button>
                            </span>
                            <div id="flush-collapseCFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingCFour" data-bs-parent="#accordionFlushCExample">
                                <div class="accordion-body">
                                    <ul class="HsptlLst">
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Khardaha<span
                                                    class="Ntfctns"><span class="Val">2</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic
                                                Bidhannagar<span class="Ntfctns"><span class="Val">1</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Tangra<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Chakpra<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic
                                                Santragachi<span class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCFive" aria-expanded="false"
                                    aria-controls="flush-headingCFour">
                                    <span class="CtyNme Lctn">Mumbai</span>
                                    <span class="SbDtls Icn Hsptl"><span class="Val">4</span></span>
                                    <!--<span class="SbDtls Icn HsptlBds"><span class="Val">970</span></span>-->
                                    <span class="SbDtls Icn Ntfctns"><span class="Val">0</span></span>
                                </button>
                            </span>
                            <div id="flush-collapseCFive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingCFive" data-bs-parent="#accordionFlushCExample">
                                <div class="accordion-body">
                                    <ul class="HsptlLst">
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Nav Pada<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Sundar
                                                Nagar<span class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Dadar<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="HsptlLnk">FirstMedic Chembur<span
                                                    class="Ntfctns"><span class="Val">0</span></span></a>
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
    <div class="AppFllContainer DshbordPg">
        <div id="map" class="DshMpHldr"></div>
        <div class="MapLegends">
            <ul class="LegendsLst">
                <!-- <li>
                    <span class="LgndTtl">Map Legends</span>
                </li> -->
                <li class="Ico LocGd">
                    <span class="LgndTxtTtl">City</span>
                    <span class="LgndTxt Good">0 Issues</span>
                </li>
                <li class="Ico LocStts">
                    <span class="LgndTxtTtl">City</span>
                    <span class="LgndTxt Stsfctry">Moderate Issues</span>
                </li>
                <li class="Ico LocBd">
                    <span class="LgndTxtTtl">City</span>
                    <span class="LgndTxt Bad">Critical Issues</span>
                </li>
                <!-- <li class="Ico HlsptlGd">
                    <span class="LgndTxtTtl">Hospital</span>
                    <span class="LgndTxt Good">0 Issues</span>
                </li>
                <li class="Ico HlsptlStts">
                    <span class="LgndTxtTtl">Hospital</span>
                    <span class="LgndTxt Stsfctry">3+ Issues</span>
                </li>
                <li class="Ico HlsptlBd">
                    <span class="LgndTxtTtl">Hospital</span>
                    <span class="LgndTxt Bad">8+ Issues</span>
                </li> -->
            </ul>
        </div>
    </div>
</body>
<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB2MBysi9kUp0sHhKkOwrAfnGJNgnNnWLQ&sensor=false">
    </script>

<script type="text/javascript">
    let map;
    const icons = {
        blue: {
            icon: "<?php echo base_url(); ?>asset/hospital_admin/Images/AppIcon-MapMarker-BNew-Med.png",
        },
        green: {
            icon: "<?php echo base_url(); ?>asset/hospital_admin/Images/AppIcon-MapMarker-GNew-Med.png",
        },
        orange: {
            icon: "<?php echo base_url(); ?>asset/hospital_admin/Images/AppIcon-MapMarker-ONew-Med.png",
        },
        blue_sub: {
            icon: "<?php echo base_url(); ?>asset/hospital_admin/Images/AppIcon-MapMarker-BAddNew-Med.png",
        },
        green_sub: {
            icon: "<?php echo base_url(); ?>asset/hospital_admin/Images/AppIcon-MapMarker-GAddNew-Med.png",
        },
        orange_sub: {
            icon: "<?php echo base_url(); ?>asset/hospital_admin/Images/AppIcon-MapMarker-OAddNew-Med.png",
        }

    };
    var markers = [
        {
            "title": 'Chennai',
            "lat": '13.0474878',
            "lng": '80.0689252',
            "description": 'Road No. 11, Perumbur,Chennai.',
            "label": { text: '4', color: 'white' },
            "type": "blue"
        },
        {
            "title": 'Delhi',
            "lat": '28.6677609',
            "lng": '77.0817763',
            "description": 'Road No. 3, Gurudwara,Delhi.',
            "label": { text: '4', color: 'white' },
            "type": "green"
        },
        {
            "title": 'Hyderabad',
            "lat": '17.421553',
            "lng": '78.5095709',
            "description": 'Road No. 10, Banjara Hills,Hyderabad.',
            "label": { text: '3', color: 'white' },
            "type": "green"
        },
        {
            "title": 'Kolkata',
            "lat": '22.624024897162062',
            "lng": '88.38165324853352',
            "description": 'Road No. 6, Howra,Kolkata.',
            "label": { text: '5', color: 'white' },
            "type": "orange"
        },
        {
            "title": 'Mumbai',
            "lat": '19.0710761',
            "lng": '72.878541',
            "description": 'Road No. 44, Pejawar,Mumbai.',
            "label": { text: '4', color: 'white' },
            "type": "blue"
        }
    ];
    var markers_hyd = [
        {
            "title": 'Kukatpally',
            "lat": '17.4892366',
            "lng": '78.3871933',
            "description": 'Road No. 5, Kukatpally,Hyderabad.',
            "label": { text: '4', color: 'white' },
            "type": "green_sub",
            "notificatins": "1"
            // "label":{text:'',color: 'white'}
        },
        {
            "title": 'Kompally',
            "lat": '17.541503482565275',
            "lng": '78.48332015255916',
            "description": 'Road No. 7, Kompally,Hyderabad.',
            "type": "blue_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Banjara Hills',
            "lat": '17.424365063679176',
            "lng": '78.43840296917173',
            "description": 'Road No. 9, Banjara Hills,Hyderabad.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        }
    ];
    var markers_delhi = [
        {
            "title": 'Pitam Pura',
            "lat": '28.701666512657624',
            "lng": '77.14021999967916',
            "description": 'Road No. 5, Pitam Pura,Delhi.',
            //"label":{text:'4',color: 'white'},
            "type": "blue_sub",
            "notificatins": "0"
            // "label":{text:'',color: 'white'}
        },
        {
            "title": 'Chandini Chowk',
            "lat": '28.662010569245126',
            "lng": '77.23385343290118',
            "description": 'Road No. 7, Chandini Chowk,Delhi.',
            "type": "orange_sub",
            "notificatins": "3"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Bhajanpura',
            "lat": '28.701508192473813',
            "lng": '77.25567045367838',
            "description": 'Road No. 9, Bhajanpura,Delhi.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Karol Bagh',
            "lat": '28.655831277267172',
            "lng": '77.18924415454681',
            "description": 'Road No. 9, Karol Bagh,Delhi.',
            "type": "orange_sub",
            "notificatins": "2"
            //"label":{text:'',color: 'white'}
        }
    ];
    var markers_chennai = [
        {
            "title": 'Koyambedu',
            "lat": '13.07594809038351',
            "lng": '80.19671679866437',
            "description": 'Road No. 5, Koyambedu,Chennai.',
            //"label":{text:'4',color: 'white'},
            "type": "green_sub",
            "notificatins": "0"
            // "label":{text:'',color: 'white'}
        },
        {
            "title": 'Velechary',
            "lat": '12.987393599429565',
            "lng": '80.20873171577185',
            "description": 'Road No. 7, Velechary,Chennai.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Thoraipakkam',
            "lat": '12.944122728458519',
            "lng": '80.21865708207801',
            "description": 'Road No. 9, Thoraipakkam,Chennai.',
            "type": "orange_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Tiruvottiyur',
            "lat": '13.167522741515175',
            "lng": '80.29231374782381',
            "description": 'Road No. 9, Tiruvottiyur,Chennai.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        }
    ];
    var markers_kolkata = [
        {
            "title": 'Khardaha',
            "lat": '22.70234032452594',
            "lng": '88.38029213927798',
            "description": 'Road No. 5, Khardaha,Kolkata.',
            //"label":{text:'4',color: 'white'},
            "type": "blue_sub",
            "notificatins": "2"
            // "label":{text:'',color: 'white'}
        },
        {
            "title": 'Bidhannagar',
            "lat": '22.583612330659257',
            "lng": '88.39494883104109',
            "description": 'Road No. 7, Bidhannagar,Kolkata.',
            "type": "green_sub",
            "notificatins": "1"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Tangra',
            "lat": '22.55812498389414',
            "lng": '88.38736730960358',
            "description": 'Road No. 4, Tangra,Kolkata.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Chakpra',
            "lat": '22.626929794486863',
            "lng": '88.31825008513708',
            "description": 'Road No. 6, Chakpra,Kolkata.',
            "type": "orange_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Santragachi',
            "lat": '22.586924615354196',
            "lng": '88.2852044602824',
            "description": 'Road No. 11, Santragachi,Kolkata.',
            "type": "orange_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        }
    ];
    var markers_mumbai = [
        {
            "title": 'Nav Pada',
            "lat": '19.08438049944212',
            "lng": '72.8899671758985',
            "description": 'Road No. 5, Nav Pada,Mumbai.',
            //"label":{text:'4',color: 'white'},
            "type": "green_sub",
            "notificatins": "0"
            // "label":{text:'',color: 'white'}
        },
        {
            "title": 'Sundar Nagar',
            "lat": '19.082120147207135',
            "lng": '72.86282602419422',
            "description": 'Road No. 7, Sundar Nagar,Mumbai.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Dadar',
            "lat": '19.020098910975776',
            "lng": '72.8486353980781',
            "description": 'Road No. 6, Dadar,Mumbai.',
            "type": "blue_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Chembur',
            "lat": '19.053111397909763',
            "lng": '72.89993077644988',
            "description": 'Road No. 13, Chembur,Mumbai.',
            "type": "orange_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        }
    ];
    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(23.9627207, 76.1788614),
            zoom: 5,
            mapTypeControl: false,
            //draggable: false,
            scaleControl: false,
            zoomControl: false,
            //scrollwheel: false,
            navigationControl: false,
            streetViewControl: false,
            mapTypeId: "terrain"
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);

        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow();

        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            //alert(data.type);
            var marker = new google.maps.Marker({
                position: myLatlng,
                icon: icons[data.type].icon,
                map: map,
                label: data.label,
                title: data.title
            });

            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    add(data.title);
                    clearMarker(marker);
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    map.setZoom(11);
                    map.panTo(this.getPosition());
                    //infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>5</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                    //infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        function clearMarker(marker) {
            marker.setMap(null);


        }
        function add(t) {
            if (t == 'Hyderabad') {
                for (var i1 = 0; i1 < markers_hyd.length; i1++) {
                    var data = markers_hyd[i1];
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons[data.type].icon,
                        map: map,
                        // label: data.label ,           
                        title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                            infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><img src='<?php echo base_url(); ?>asset/hospital_admin/Images/dash_map.png' style='width:100%;  image-rendering: auto; image-rendering:crisp-edges;  image-rendering: pixelated;  image-rendering: -webkit-optimize-contrast;'></div></div></li></ul>");
                            // infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>" + data.notificatins + "</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
            }
            if (t == 'Delhi') {
                for (var i1 = 0; i1 < markers_delhi.length; i1++) {
                    var data = markers_delhi[i1];
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons[data.type].icon,
                        map: map,
                        // label: data.label ,           
                        title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                            //infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>" + data.notificatins + "</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                            infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><img src='<?php echo base_url(); ?>asset/hospital_admin/Images/dash_map.png' style='width:100%;  image-rendering: auto; image-rendering:crisp-edges;  image-rendering: pixelated;  image-rendering: -webkit-optimize-contrast;'></div></div></li></ul>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
            }
            if (t == 'Chennai') {
                for (var i1 = 0; i1 < markers_chennai.length; i1++) {
                    var data = markers_chennai[i1];
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons[data.type].icon,
                        map: map,
                        // label: data.label ,           
                        title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                           // infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>" + data.notificatins + "</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                           infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><img src='<?php echo base_url(); ?>asset/hospital_admin/Images/dash_map.png' style='width:100%;  image-rendering: auto; image-rendering:crisp-edges;  image-rendering: pixelated;  image-rendering: -webkit-optimize-contrast;'></div></div></li></ul>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
            }
            if (t == 'Kolkata') {
                for (var i1 = 0; i1 < markers_kolkata.length; i1++) {
                    var data = markers_kolkata[i1];
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons[data.type].icon,
                        map: map,
                        // label: data.label ,           
                        title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                            //infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>" + data.notificatins + "</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                            infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><img src='<?php echo base_url(); ?>asset/hospital_admin/Images/dash_map.png' style='width:100%;  image-rendering: auto; image-rendering:crisp-edges;  image-rendering: pixelated;  image-rendering: -webkit-optimize-contrast;'></div></div></li></ul>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
            }
            if (t == 'Mumbai') {
                for (var i1 = 0; i1 < markers_mumbai.length; i1++) {
                    var data = markers_mumbai[i1];
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons[data.type].icon,
                        map: map,
                        // label: data.label ,           
                        title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                           // infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>" + data.notificatins + "</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                           infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><img src='<?php echo base_url(); ?>asset/hospital_admin/Images/dash_map.png' style='width:100%;  image-rendering: auto; image-rendering:crisp-edges;  image-rendering: pixelated;  image-rendering: -webkit-optimize-contrast;'></div></div></li></ul>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
            }

        }

    }
</script>
</html>