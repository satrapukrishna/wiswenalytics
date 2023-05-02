<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory Management - Sanitation</title>
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
            <span class="SctnTtl InvntryMngmnt">Inventory Management</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="#" class="LnkTxt Snttn Icn Actv">Sanitation</a>
                    </li>
                    <li>
                        <a href="#" class="LnkTxt MdclEqupmnt Icn">Medical Equipments</a>
                    </li>
                    <li>
                        <a href="#" class="LnkTxt WhelChrStrchrs Icn">Wheelchairs and Stretchers</a>
                    </li>
                    <li>
                        <a href="#" class="LnkTxt Engnrrng Icn">Engineering</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">Sanitation Inventory</span>
                        </li>
                    </ul>
                </div>
                <div class="SlctDrpdwnHldr">
                    <ul class="TbTtlLnkHldr">
                        <li>
                            <span class="TbLnk Grphvw Actv">Graph View</span>
                        </li>
                        <li>
                            <span class="TbLnk Grdvw">Grid View</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="InvnthryDshbrdMnHldr">
                    <div class="ChcklstDshbrdHldr InvntyDshbrd HlfVw">
                        <div class="FtrTtlHldr Icn Twr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitationDetails" class="FtrTtl"><span class="LnkTxt">Tower 01</span></a>
                        </div>
                        <div class="StckDtlsRprt">
                            <span class="RprtTxt">
                                <span class="DysTxt">08</span><span class="DtlTxt">days of stock remaining.</span>
                            </span>
                        </div>
                        <div class="InventryBscDtls">
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Toilet Paper</span>
                                <div class="InvtryDtl Icn TltPpr">
                                    <span class="VluTxt">212</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Hand Towel</span>
                                <div class="InvtryDtl Icn HndTwl">
                                    <span class="VluTxt">285</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Hand Wash</span>
                                <div class="InvtryDtl Icn HndWsh">
                                    <span class="VluTxt">352</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Room Freshner</span>
                                <div class="InvtryDtl Icn RmFrshnr">
                                    <span class="VluTxt">10</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Trash Bin Cover</span>
                                <div class="InvtryDtl Icn ThrshBnCvr">
                                    <span class="VluTxt">158</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Dustpan</span>
                                <div class="InvtryDtl Icn DstPn">
                                    <span class="VluTxt">25</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Gloves</span>
                                <div class="InvtryDtl Icn Glvs">
                                    <span class="VluTxt">83</span>
                                    <span class="VluTtl">Pairs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Plunger</span>
                                <div class="InvtryDtl Icn Plngr">
                                    <span class="VluTxt">17</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Sprayer</span>
                                <div class="InvtryDtl Icn Spryr">
                                    <span class="VluTxt">19</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Bucket</span>
                                <div class="InvtryDtl Icn Bckt">
                                    <span class="VluTxt">5</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Wiper</span>
                                <div class="InvtryDtl Icn Wpr">
                                    <span class="VluTxt">16</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Broom</span>
                                <div class="InvtryDtl Icn Brm">
                                    <span class="VluTxt">4</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ChcklstDshbrdHldr InvntyDshbrd HlfVw">
                        <div class="FtrTtlHldr Icn Twr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitationDetails" class="FtrTtl"><span class="LnkTxt">Tower 02</span></a>
                        </div>
                        <div class="StckDtlsRprt">
                            <span class="RprtTxt">
                                <span class="DysTxt">08</span><span class="DtlTxt">days of stock remaining.</span>
                            </span>
                        </div>
                        <div class="InventryBscDtls">
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Toilet Paper</span>
                                <div class="InvtryDtl Icn TltPpr">
                                    <span class="VluTxt">212</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Hand Towel</span>
                                <div class="InvtryDtl Icn HndTwl">
                                    <span class="VluTxt">285</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Hand Wash</span>
                                <div class="InvtryDtl Icn HndWsh">
                                    <span class="VluTxt">352</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Room Freshner</span>
                                <div class="InvtryDtl Icn RmFrshnr">
                                    <span class="VluTxt">10</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Trash Bin Cover</span>
                                <div class="InvtryDtl Icn ThrshBnCvr">
                                    <span class="VluTxt">158</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Dustpan</span>
                                <div class="InvtryDtl Icn DstPn">
                                    <span class="VluTxt">25</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Gloves</span>
                                <div class="InvtryDtl Icn Glvs">
                                    <span class="VluTxt">83</span>
                                    <span class="VluTtl">Pairs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Plunger</span>
                                <div class="InvtryDtl Icn Plngr">
                                    <span class="VluTxt">17</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Sprayer</span>
                                <div class="InvtryDtl Icn Spryr">
                                    <span class="VluTxt">19</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Bucket</span>
                                <div class="InvtryDtl Icn Bckt">
                                    <span class="VluTxt">5</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Wiper</span>
                                <div class="InvtryDtl Icn Wpr">
                                    <span class="VluTxt">16</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Broom</span>
                                <div class="InvtryDtl Icn Brm">
                                    <span class="VluTxt">4</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ChcklstDshbrdHldr InvntyDshbrd HlfVw">
                        <div class="FtrTtlHldr Icn Twr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitationDetails" class="FtrTtl"><span class="LnkTxt">Tower 03</span></a>
                        </div>
                        <div class="StckDtlsRprt">
                            <span class="RprtTxt">
                                <span class="DysTxt">08</span><span class="DtlTxt">days of stock remaining.</span>
                            </span>
                        </div>
                        <div class="InventryBscDtls">
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Toilet Paper</span>
                                <div class="InvtryDtl Icn TltPpr">
                                    <span class="VluTxt">212</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Hand Towel</span>
                                <div class="InvtryDtl Icn HndTwl">
                                    <span class="VluTxt">285</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Hand Wash</span>
                                <div class="InvtryDtl Icn HndWsh">
                                    <span class="VluTxt">352</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Room Freshner</span>
                                <div class="InvtryDtl Icn RmFrshnr">
                                    <span class="VluTxt">10</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Trash Bin Cover</span>
                                <div class="InvtryDtl Icn ThrshBnCvr">
                                    <span class="VluTxt">158</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Dustpan</span>
                                <div class="InvtryDtl Icn DstPn">
                                    <span class="VluTxt">25</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Gloves</span>
                                <div class="InvtryDtl Icn Glvs">
                                    <span class="VluTxt">83</span>
                                    <span class="VluTtl">Pairs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Plunger</span>
                                <div class="InvtryDtl Icn Plngr">
                                    <span class="VluTxt">17</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Sprayer</span>
                                <div class="InvtryDtl Icn Spryr">
                                    <span class="VluTxt">19</span>
                                    <span class="VluTtl">Lts</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Bucket</span>
                                <div class="InvtryDtl Icn Bckt">
                                    <span class="VluTxt">5</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Wiper</span>
                                <div class="InvtryDtl Icn Wpr">
                                    <span class="VluTxt">16</span>
                                    <span class="VluTtl">Pcs</span>
                                </div>
                            </div>
                            <div class="BscDtlsHldr">
                                <span class="InvtryTypTtl">Broom</span>
                                <div class="InvtryDtl Icn Brm">
                                    <span class="VluTxt">4</span>
                                    <span class="VluTtl">Pcs</span>
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
