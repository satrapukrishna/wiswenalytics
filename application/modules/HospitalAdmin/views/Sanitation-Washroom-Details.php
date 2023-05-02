<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanitation - Washroom Floor</title>
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
                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="BrdCrmLnk">Washroom</a>
                        </li>
                        <li>
                            <span class="PgTtl">Tower 01</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="ChcklstDshbrdHldr WhsrmSlider">
                    <div class="WshrmFlrFllDtlsHldr">
                        <div class="WhrmFlrBscDtls">
                            <div class="WshrmTtlHldr">
                                <span class="WshrmFlrTtl">Floor 01</span>
                            </div>
                            <ul class="BscLst">
                                <li>
                                    <span class="BscVluTxt">6</span>
                                    <span class="BscVluTtl">Washrooms</span>
                                </li>
                                <li>
                                    <span class="BscVluTxt">4</span>
                                    <span class="BscVluTtl">Automatic</span>
                                </li>
                                <li>
                                    <span class="BscVluTxt">2</span>
                                    <span class="BscVluTtl">Manual</span>
                                </li>
                            </ul>sanitation_Washroom_Full_Details
                        </div>
                        <div class="WsrmFllDtls">
                            <div class="SnglWshrmDashSlider">
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #101 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Next Scheduled Cleaning (Auto)</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #102 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #103 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #104 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Next Scheduled Cleaning (Auto)</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #105 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #106 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr WhsrmSlider">
                    <div class="WshrmFlrFllDtlsHldr">
                        <div class="WhrmFlrBscDtls">
                            <div class="WshrmTtlHldr">
                                <span class="WshrmFlrTtl">Floor 02</span>
                            </div>
                            <ul class="BscLst">
                                <li>
                                    <span class="BscVluTxt">6</span>
                                    <span class="BscVluTtl">Washrooms</span>
                                </li>
                                <li>
                                    <span class="BscVluTxt">4</span>
                                    <span class="BscVluTtl">Automatic</span>
                                </li>
                                <li>
                                    <span class="BscVluTxt">2</span>
                                    <span class="BscVluTtl">Manual</span>
                                </li>
                            </ul>
                        </div>
                        <div class="WsrmFllDtls">
                            <div class="SnglWshrmDashSlider">
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #201 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #202 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl ">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #203 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #204 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #205 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #206 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr WhsrmSlider">
                    <div class="WshrmFlrFllDtlsHldr">
                        <div class="WhrmFlrBscDtls">
                            <div class="WshrmTtlHldr">
                                <span class="WshrmFlrTtl">Floor 03</span>
                            </div>
                            <ul class="BscLst">
                                <li>
                                    <span class="BscVluTxt">6</span>
                                    <span class="BscVluTtl">Washrooms</span>
                                </li>
                                <li>
                                    <span class="BscVluTxt">4</span>
                                    <span class="BscVluTtl">Automatic</span>
                                </li>
                                <li>
                                    <span class="BscVluTxt">2</span>
                                    <span class="BscVluTtl">Manual</span>
                                </li>
                            </ul>
                        </div>
                        <div class="WsrmFllDtls">
                            <div class="SnglWshrmDashSlider">
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #301 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #302 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #303 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #304 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #305 (Male)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="SnglWshDtl">
                                        <div class="WshrmTtlHldr">
                                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Full_Details" class="WshrmFlrTtl">Washroom #306 (Female)</a>
                                        </div>
                                        <ul class="FllLst">
                                            <li class="Fll">
                                                <div class="WshrmDtlsTxtHldr Ico Schdl MnlAlrt">
                                                    <span class="TxtTtl">Manual Alert Cleaning</span>
                                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                    <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                                                    <span class="TxtTtl">Consumables last refilled at 07:56 pm</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                                    <span class="TxtTtl">3 New Feedbacks</span>
                                                </div>
                                            </li>
                                            <li class="Hlf">
                                                <div class="WshrmDtlsTxtHldr Ico RpDmgs NtAvlbl">
                                                    <span class="TxtTtl">Repairs/ Damages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico Spbr NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico ThrshBg NtAvlbl">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                                </div>
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
</body>
</html>
