<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanitation - Washroom</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/BxSlider.css?ver=1" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/BxSlider.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/SliderScript.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Snttn">Sanitation</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom" class="LnkTxt Wshrm Icn Actv">Washroom</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_WasteManagement" class="LnkTxt WstMngmnt Icn">Waste Management</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_PestControl" class="LnkTxt PstCntrl Icn">Pest Control</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_FacadeCleaning" class="LnkTxt FcdeClnng Icn">Facade Cleaning</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="BrdCrmLnk">All Sanitations</a>
                        </li>
                        <li>
                            <span class="PgTtl">Washroom</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="ChcklstDshbrdHldr WithSlider">
                    <div class="FtrTtlHldr Icn Twr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="FtrTtl"><span class="LnkTxt">Tower 01</span></a>
                    </div>
                    <div class="SantWshrmFleDv">
                        <div class="SantWshrmDashSlider">
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 01</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Good">0 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr Issue">
                                    <span class="SantWshrmArName">Floor 02</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Bad">8 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 03</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Stsfctry">3 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 04</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Good">0 Issues</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr WithSlider">
                    <div class="FtrTtlHldr Icn Twr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="FtrTtl"><span class="LnkTxt">Tower 02</span></a>
                    </div>
                    <div class="SantWshrmFleDv">
                        <div class="SantWshrmDashSlider">
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 01</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Good">0 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr Issue">
                                    <span class="SantWshrmArName">Floor 02</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Bad">8 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 03</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Stsfctry">3 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 04</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Good">0 Issues</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr WithSlider">
                    <div class="FtrTtlHldr Icn Twr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="FtrTtl"><span class="LnkTxt">Tower 03</span></a>
                    </div>
                    <div class="SantWshrmFleDv">
                        <div class="SantWshrmDashSlider">
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 01</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Good">0 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr Issue">
                                    <span class="SantWshrmArName">Floor 02</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Bad">8 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 03</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Stsfctry">3 Issues</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="SantWshrmFleHldr">
                                    <span class="SantWshrmArName">Floor 04</span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 SantWshrmQtyDtsHldr Brdr">
                                                <span class="SantWshrmQty">06</span>
                                                <span class="SantWshrmQtyTtl">Washrooms</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Atmtc">04</span>
                                                <span class="SantWshrmQtyTtl Atmtc">Automatic</span>
                                            </div>
                                            <div class="col-6 SantWshrmQtyDtsHldr">
                                                <span class="SantWshrmQty Mnul">02</span>
                                                <span class="SantWshrmQtyTtl Mnul">Manual</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SantWshrmBtns">
                                        <span class="SantWshrmIsss Good">0 Issues</span>
                                    </div>
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
