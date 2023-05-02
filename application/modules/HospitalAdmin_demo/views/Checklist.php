<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checklist</title>
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
            <span class="SctnTtl Chcklsts">Checklist</span>
            <div class="SctnInnerMenu">
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Electrical
                            </button>
                        </span>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">Common Area Meter Reading</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">DG Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">Diesel Consumption</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">Elevator Weekly</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">HT Meter</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">UPS</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                ELV
                            </button>
                        </span>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">CCTV Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">CCTV Monthly</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">FAS Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">Fire Alarm Control Panel</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">Fire Alarm Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">Fire Alarm System</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">PA System</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Fire
                            </button>
                        </span>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Extinguisher Service Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Extinguisher Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Extinguisher Weekly</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Fighting Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Hydrant Box</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire System Testing</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Sprinkler Main Tap Off Valve</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-headingFour">
                                HVAC
                            </button>
                        </span>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Chiller Log Book</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">AC Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">AHU</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Daily Exhaust System</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Daily Fresh Air Fan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Daily Jet Fan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Spilt A/C</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Ventilation Fan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Ventilation</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFour">
                                PHE
                            </button>
                        </span>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Sewage Treatment Plant</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Daily Plumbing Leakage B4 Shaft</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Pump Room  JWC</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">RO Plant Log Book</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Sewage Treatment Plant</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Sump Pump</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Consumption Log</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Pump Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Softner Log</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Tank Level Status</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Treatment Plant Log</a>
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
                            <span class="PgTtl">All Checklists</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails" class="FtrTtl"><span class="LnkTxt">Electrical</span></a>
                    </div>
                    <div class="ChcklstFleDv">
                        <div class="ChklstFleHldr Schdld">
                            <span class="ChklstStts Schdld">Scheduled</span>
                            <span class="ChcklstName">Common Area Meter Reading</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">DG Daily</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Diesel Consumption</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Dlyd">
                            <span class="ChklstStts Dlyd">Delayed</span>
                            <span class="ChcklstName">Elevator Weekly</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">HT Meter</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">UPS</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="FtrTtl"><span class="LnkTxt">ELV</span></a>
                    </div>
                    <div class="ChcklstFleDv">
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">CCTV Daily</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">CCTV Monthly</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Schdld">
                            <span class="ChklstStts Schdld">Scheduled</span>
                            <span class="ChcklstName">FAS Daily</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Fire Alarm Control Panel</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Fire Alarm Report</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Fire Alarm System</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Dlyd">
                            <span class="ChklstStts Dlyd">Delayed</span>
                            <span class="ChcklstName">PA System</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="FtrTtl"><span class="LnkTxt">Fire</span></a>
                    </div>
                    <div class="ChcklstFleDv">
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Extinguisher Service Report</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Fire Extinguisher Daily</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Schdld">
                            <span class="ChklstStts Schdld">Scheduled</span>
                            <span class="ChcklstName">Fire Extinguisher Weekly</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Fire Fighting Daily</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Dlyd">
                            <span class="ChklstStts Dlyd">Delayed</span>
                            <span class="ChcklstName">Fire Hydrant Box</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Fire System Testing</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Sprinkler Main Tap Off Valve</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="FtrTtl"><span class="LnkTxt">HVAC</span></a>
                    </div>
                    <div class="ChcklstFleDv">
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Chiller Log Book</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Dlyd">
                            <span class="ChklstStts Dlyd">Delayed</span>
                            <span class="ChcklstName">A/C Unit</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Schdld">
                            <span class="ChklstStts Schdld">Scheduled</span>
                            <span class="ChcklstName">AHU</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Daily Exhaust System</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Daily Fresh Air Fan</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Daily Jet Fan</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Spilt A/C</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Ventilation Fan</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Ventilation</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="FtrTtl"><span class="LnkTxt">PHE</span></a>
                    </div>
                    <div class="ChcklstFleDv">
                        <div class="ChklstFleHldr Dlyd">
                            <span class="ChklstStts Dlyd">Delayed</span>
                            <span class="ChcklstName">Sewage Treatment Plant</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Daily Plumbing Leakage B4 Shaft</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Pump Room JWC</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">RO Plant Log Book</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Sewage Treatment Plant</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Sump Pump</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Water Consumption Log</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Water Pump Daily</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr Schdld">
                            <span class="ChklstStts Schdld">Scheduled</span>
                            <span class="ChcklstName">Water Softner Log</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Water Tank Level Status</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="ChklstFleHldr">
                            <span class="ChklstStts Cmpltd">Completed</span>
                            <span class="ChcklstName">Water Treatment Plant Log</span>
                            <div class="ChcklstBtns">
                                <span class="ChcklstRouting">Daily</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
