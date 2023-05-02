<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Machinery</title>
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
            <span class="SctnTtl Mchnry">Machinery</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn CGSSMchnry">CGSS Plant</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn ACPlntMchnry">A/C Plant</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn SbStnMchnry">Sub Station</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn BlrPlntMchnry">Boiler Plant</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn PmpRmMchnry">Pump Room</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn WtrClrMchnry">Water Coolers</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">All Machinery</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn CGSSMchnry">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="FtrTtl"><span class="LnkTxt">CGSS Plant</span></a>
                    </div>
                    <div class="MchnryFleDv">
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn ACPlntMchnry">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="FtrTtl"><span class="LnkTxt">A/C Plant</span></a>
                    </div>
                    <div class="MchnryFleDv">
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn SbStnMchnry">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="FtrTtl"><span class="LnkTxt">Sub Station</span></a>
                    </div>
                    <div class="MchnryFleDv">
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn BlrPlntMchnry">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="FtrTtl"><span class="LnkTxt">Boiler Plant</span></a>
                    </div>
                    <div class="MchnryFleDv">
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn PmpRmMchnry">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="FtrTtl"><span class="LnkTxt">Pump Room</span></a>
                    </div>
                    <div class="MchnryFleDv">
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn WtrClrMchnry">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="FtrTtl"><span class="LnkTxt">Water Coolers</span></a>
                    </div>
                    <div class="MchnryFleDv">
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rtrd">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Air Compressor Motor 15 HP</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Stsfctry">3 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr Rpr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Vacuum Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Bad">9+ Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="MchnryFleHldr">
                            <span class="MchnryQty">4</span>
                            <span class="MchnryName">Medical Air Compressor</span>
                            <div class="MchnryBtns">
                                <span class="MchnryIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
