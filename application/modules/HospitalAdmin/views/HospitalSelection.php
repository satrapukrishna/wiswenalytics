<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Details</title>
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
            <span class="SctnTtl Hsptls Twlne"><span class="LneSml">Other Hospitals in</span><span
                    class="LneBig">Hyderabad</span></span>
            <ul class="PrtyDshbrdLst">
                <li>
                    <div class="PrtyDshbrdDtls">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="PrptyNme">FirstMedic Kompally</a>
                        <span class="PrptyAdd">Road No. 7, Kompally, Hyderabad, Telangana.</span>
                        <div class="PrptySbDtlsRw">
                            <div class="DtlsHldr Estblshd">
                                <span class="DtlTxt">2007</span>
                                <span class="DtlTtl">Established</span>
                            </div>
                            <div class="DtlsHldr Twrs">
                                <span class="DtlTxt">02</span>
                                <span class="DtlTtl">Blocks/ Towers</span>
                            </div>
                        </div>
                        <div class="PrptySbDtlsRw">
                            <div class="DtlsHldr Bds">
                                <span class="DtlTxt">160</span>
                                <span class="DtlTtl">Beds</span>
                            </div>
                            <div class="DtlsHldr Ntfctns">
                                <span class="DtlTxt">2</span>
                                <span class="DtlTtl">New Notifications</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="PrtyDshbrdDtls">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/hospitalSelection" class="PrptyNme">FirstMedic Kukatpally</a>
                        <span class="PrptyAdd">Road No. 5, Kukatpally, Hyderabad, Telangana.</span>
                        <div class="PrptySbDtlsRw">
                            <div class="DtlsHldr Estblshd">
                                <span class="DtlTxt">2008</span>
                                <span class="DtlTtl">Established</span>
                            </div>
                            <div class="DtlsHldr Twrs">
                                <span class="DtlTxt">02</span>
                                <span class="DtlTtl">Blocks/ Towers</span>
                            </div>
                        </div>
                        <div class="PrptySbDtlsRw">
                            <div class="DtlsHldr Bds">
                                <span class="DtlTxt">195</span>
                                <span class="DtlTtl">Beds</span>
                            </div>
                            <div class="DtlsHldr Ntfctns">
                                <span class="DtlTxt">8</span>
                                <span class="DtlTtl">New Notifications</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ContainerRight">
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="InnrTtl">Today</span>
                            <span class="InnrTxt">30 April 2021</span>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="From Date" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="Text1" value="To Date" />
                        </div>
                        <div class="col-md-5 BttnHldr">
                            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin/checklistSubDetails'"
                                class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/about" class="FtrTtl Icn Abt"><span class="LnkTxt">About</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrAbtEstblshd">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/about" class="FtrInrTtl">2005<br />Established</a>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrAbtTwrs">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/about" class="FtrInrTtl">03<br />Blocks/ Towers</a>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrAbtBds">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/about" class="FtrInrTtl">300<br />Beds</a>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrAbtNtfc">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/about" class="FtrInrTtl">05<br />Notifications</a>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrTtl Icn LdrshpTm"><span class="LnkTxt">Leadership
                            Team</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrLdrshpAdmin">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrInrTtl">Administrative Department</a>
                        <span class="IssStts">3 Profiles</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrLdrshpFinc">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrInrTtl">Finance Department</a>
                        <span class="IssStts">8 Profiles</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrLdrshpDptHd">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrInrTtl">Department Head</a>
                        <span class="IssStts">43 Profiles</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrLdrshpEnggDpt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrInrTtl">Engineering Department</a>
                        <span class="IssStts">21 Profiles</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrLdrshpScrDpt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrInrTtl">Security Department</a>
                        <span class="IssStts">12 Profiles</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrLdrshpITDpt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/leadershipTeam" class="FtrInrTtl">IT Department</a>
                        <span class="IssStts">7 Profiles</span>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancy" class="FtrTtl Icn BdsOccpncy"><span class="LnkTxt">Beds &
                            Occupancy</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr DbleDv">
                        <div class="Col Fll">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrTwrBdNOccu">
                            <span class="FtrInrTtl">Tower 01<br />140 Beds</span>
                        </div>
                        <div class="Col Hlf Lft">
                            <span class="FtrInrTtl Good">92</span>
                            <span class="FtrInrTtl SnglLn">Available</span>
                        </div>
                        <div class="Col Hlf Rgt">
                            <span class="FtrInrTtl Stsfctry">48</span>
                            <span class="FtrInrTtl SnglLn">Occupied</span>
                        </div>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyDetails" class="SctnTtl">Tower 01</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Operations</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">23</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Planned</span>
                                                        <span class="BDOTxt">23</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Complete</span>
                                                        <span class="BDOTxt Good">18</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">On-going</span>
                                                        <span class="BDOTxt Stsfctry">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">23</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Medical ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Paediatric ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">23</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Neonatal ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">23</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">General Ward</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Sharing Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Executive Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr DbleDv">
                        <div class="Col Fll">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrTwrBdNOccu">
                            <span class="FtrInrTtl">Tower 02<br />75 Beds</span>
                        </div>
                        <div class="Col Hlf Lft">
                            <span class="FtrInrTtl Good">48</span>
                            <span class="FtrInrTtl SnglLn">Available</span>
                        </div>
                        <div class="Col Hlf Rgt">
                            <span class="FtrInrTtl Stsfctry">27</span>
                            <span class="FtrInrTtl SnglLn">Occupied</span>
                        </div>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyDetails" class="SctnTtl">Tower 02</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Operations</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Planned</span>
                                                        <span class="BDOTxt">9</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Complete</span>
                                                        <span class="BDOTxt Good">6</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">On-going</span>
                                                        <span class="BDOTxt Stsfctry">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">5</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Medical ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">14</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">1</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Paediatric ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">5</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Neonatal ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">12</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">4</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">General Ward</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">20</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">14</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">6</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Sharing Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Executive Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr DbleDv">
                        <div class="Col Fll">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrTwrBdNOccu">
                            <span class="FtrInrTtl">Tower 03<br />85 Beds</span>
                        </div>
                        <div class="Col Hlf Lft">
                            <span class="FtrInrTtl Good">31</span>
                            <span class="FtrInrTtl SnglLn">Available</span>
                        </div>
                        <div class="Col Hlf Rgt">
                            <span class="FtrInrTtl Stsfctry">54</span>
                            <span class="FtrInrTtl SnglLn">Occupied</span>
                        </div>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyDetails" class="SctnTtl">Tower 03</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Operations</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">12</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Planned</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Complete</span>
                                                        <span class="BDOTxt Good">7</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">On-going</span>
                                                        <span class="BDOTxt Stsfctry">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Medical ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">11</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">4</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Paediatric ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">13</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">5</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Neonatal ICU</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">General Ward</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">27</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">20</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">7</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Sharing Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Executive Room</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Total</span>
                                                        <span class="BDOTxt">24</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Available</span>
                                                        <span class="BDOTxt Good">16</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Occupied</span>
                                                        <span class="BDOTxt Stsfctry">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/bedsOccupancyFullDetails" class="BtnIssue">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="FtrTtl Icn Attndnc"><span class="LnkTxt">Attendance</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg MdclStff" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="FtrInrTtl">Medical Staff</a>
                        <span class="AttAllot">1153 Total Staff</span>
                        <span class="AttPrsnt">1062 Alloted</span>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="SctnTtl">Medical Staff</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 01</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">08:00 AM - 04:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">354</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">350</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">4</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 02</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">04:00 PM - 00:00 AM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">354</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 03</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">00:00 AM - 08:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">354</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg NursngStff" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="FtrInrTtl">Nursing Staff</a>
                        <span class="AttAllot">482 Total Staff</span>
                        <span class="AttPrsnt">460 Alloted</span>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="SctnTtl">Nursing Staff</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 01</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">08:00 AM - 04:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">180</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">178</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 02</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">04:00 PM - 00:00 AM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">180</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 03</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">00:00 AM - 08:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">122</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg ScrtyStff" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="FtrInrTtl">Security Staff</a>
                        <span class="AttAllot">40 Alloted</span>
                        <span class="AttPrsnt">32 Alloted</span>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="SctnTtl">Security Staff</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 01</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">08:00 AM - 04:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 02</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">04:00 PM - 00:00 AM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">15</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 03</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">00:00 AM - 08:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg EnggStff" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="FtrInrTtl">Engineering Staff</a>
                        <span class="AttAllot">20 Total sTaff</span>
                        <span class="AttPrsnt">17 Alloted</span>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="SctnTtl">Engineering Staff</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 01</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">08:00 AM - 04:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 02</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">04:00 PM - 00:00 AM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">8</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 03</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">00:00 AM - 08:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">4</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg AdmnStff" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="FtrInrTtl">Administrative Staff</a>
                        <span class="AttAllot">30 Total Staff</span>
                        <span class="AttPrsnt">25 Alloted</span>
                        <div class="DshHvr">
                            <div class="HvrDtlsHldr NoBttn">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/attendence" class="SctnTtl">Administrative Staff</a>
                                </div>
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 01</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">08:00 AM - 04:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">9</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">1</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 02</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">04:00 PM - 00:00 AM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">10</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <div class="HvrTtlHldr">
                                                    <span class="IssTtl">Shift 03</span>
                                                </div>
                                                <div class="HvrInnrDtlsHldr Clmns">
                                                    <span class="IssSbTtl">00:00 AM - 08:00 PM</span>
                                                    <div class="ClmnFll">
                                                        <span class="BDOTtl">Alloted</span>
                                                        <span class="BDOTxt">5</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Present</span>
                                                        <span class="BDOTxt Good">-</span>
                                                    </div>
                                                    <div class="ClmnHlf">
                                                        <span class="BDOTtl">Absent</span>
                                                        <span class="BDOTxt Stsfctry">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/attendenceDeptDetail" class="BtnIssue">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="FtrTtl Icn Rsrcs"><span class="LnkTxt">Resources</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRsrcsWtr" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="FtrInrTtl">Water</a>
                        <span class="IssStts Stsfctry">2 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="SctnTtl">Water</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">2 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="IssueLstLnk">No Water from Municipal
                                                    Lines.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="IssueLstLnk">Order Water Tankers
                                                    Immediately.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRsrcsEnrgy" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="FtrInrTtl">Energy</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="SctnTtl">Energy</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="IssueLstLnk">Power Consumption - 10%
                                                    higher than average in Cancer Block.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRsrcsOxgn" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="FtrInrTtl">Oxygen</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRsrcsUPS" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="FtrInrTtl">Backup Power (UPS)</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRsrcsDsl" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="FtrInrTtl">Diesel</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="SctnTtl">Diesel</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/resources" class="IssueLstLnk">DG 2 - Low Diesel Level.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/engineering" class="FtrTtl Icn Engnrng"><span class="LnkTxt">Engineering</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg WtrRsrcs" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="FtrInrTtl">Water</a>
                        <span class="IssStts Stsfctry">2 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="SctnTtl">Water</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">3 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="IssueLstLnk">No Water from
                                                    Municipal Lines.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="IssueLstLnk">Order Water Tankers
                                                    Immediately.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Water" class="IssueLstLnk">Water leakage at
                                                    Tower #1, Floor #5.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg ElecRsrcs" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Energy" class="FtrInrTtl">Electricity</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Energy" class="SctnTtl">Electricity</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_Energy" class="IssueLstLnk">Power consumption
                                                    - 10% higher than average in Cancer Block.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg ArCndRsrcs" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_AirConditioning" class="FtrInrTtl">Air Conditioning</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_AirConditioning" class="SctnTtl">Air Conditioning</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_AirConditioning" class="IssueLstLnk">Chemotherapy Room - Low cooling complaint.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg ArQltyRsrcs" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_AirQuality" class="FtrInrTtl">Air Quality</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg SftIntgRsrcs" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="FtrInrTtl">Soft Integration</a>
                        <span class="IssStts Stsfctry">2 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="SctnTtl">Soft Integration</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">2 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="IssueLstLnk">Lift 4 - Maintenance Alert.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="IssueLstLnk">DG 3 - Low Pressure Alert.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="SldDtlsHldr Flipper">
                        <div class="FlipInner">
                            <div class="FlipFront">
                                <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg SftIntgRsrcs" />
                                <span class="FtrInrTtl">Soft Integration</span>
                                <span class="IssStts Stsfctry">3 Issues</span>
                            </div>
                            <div class="FlipBack">
                                <div class="FlpIssueSlider">
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <span class="IssueNumb Stsfctry">Issue #01</span>
                                                <span class="IssueTxt">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.</span>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="BtnIssue">View
                                                    Issue</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <span class="IssueNumb Stsfctry">Issue #02</span>
                                                <span class="IssueTxt">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit.</span>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="BtnIssue">View
                                                    Issue</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="FlpSlideHldr">
                                            <div class="HvrDtlsHldr">
                                                <span class="IssueNumb Stsfctry">Issue #03</span>
                                                <span class="IssueTxt">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.</span>
                                            </div>
                                            <div class="HvrBtnHldr">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SoftIntegration" class="BtnIssue">View
                                                    Issue</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg SplSolRsrcs" />
                        <a href="<?php echo base_url(); ?>HospitalAdmin/engineering_SpecializedSolutions" class="FtrInrTtl">Specialized Solution</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="FtrTtl Icn Chcklsts"><span class="LnkTxt">Checklist</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="FtrInrTtl">Electrical</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="SctnTtl">Electrical</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/checklistDetails" class="IssueLstLnk">CCTV - 4 cameras
                                                    offline.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="FtrInrTtl">ELV</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="FtrInrTtl">Fire</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="SctnTtl">Fire</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/checklistDetails" class="IssueLstLnk">Fire Pump 2 - High
                                                    Jockey Pump running hours.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="FtrInrTtl">HVAC</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="FtrInrTtl">PHE</a>
                        <span class="IssStts Stsfctry">2 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/checklist" class="SctnTtl">PHE</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">2 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/checklistDetails" class="IssueLstLnk">Sewage Treatment
                                                    Plant - Blower Issue.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/checklistDetails" class="IssueLstLnk">Sump Pump 4 - Breakdown.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="FtrTtl Icn Snttn"><span class="LnkTxt">Sanitation</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrSnttnWshrm">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom" class="FtrInrTtl">Washroom</a>
                        <span class="IssStts Stsfctry">3 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom" class="SctnTtl">Washroom</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">3 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="IssueLstLnk">Tower #1,
                                                    Floor #2 - Outpatient block high stink level.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="IssueLstLnk">Tower #1,
                                                    Floor #4 - Pending Cleaning.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="IssueLstLnk">Tower #2,
                                                    Floor #3 - No Tissue Paper.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrSnttnWstMngmnt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_WasteManagement" class="FtrInrTtl">Waste Management</a>
                        <span class="IssStts Good">0 Issue</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrSnttnPstCntrl">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_PestControl" class="FtrInrTtl">Pest Control</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrSnttnFcdClng">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_FacadeCleaning" class="FtrInrTtl">Facade Cleaning</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_FacadeCleaning" class="SctnTtl">Facade Cleaning</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom_Details" class="IssueLstLnk">Tower #2
                                                    - Facade Cleaning pending for more than 16 days.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="FtrTtl Icn Mchnry"><span class="LnkTxt">Machinery</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMchnCgss">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/machineryDetails" class="FtrInrTtl">CGSS Plant</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMchnAcPlnt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="FtrInrTtl">A/C Plant</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="SctnTtl">A/C Plant</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/machineryDetails" class="IssueLstLnk">Chiller 2 tripping
                                                    frequently.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMchnSbSttn">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="FtrInrTtl">Sub Station</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMchnBlrPlnt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="FtrInrTtl">Boiler Plant</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="SctnTtl">Boiler Plant</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/machineryDetails" class="IssueLstLnk">Boiler Plant - AMC
                                                    renewal pending.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMchnPmpRm">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="FtrInrTtl">Pump Room</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMchnWtrClr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/machinery" class="FtrInrTtl">Water Coolers</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/pPM" class="FtrTtl Icn PPM"><span class="LnkTxt">PPM</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/pPM" class="FtrInrTtl BgTxt Good">60</a>
                        <span class="IssStts Good">Completed</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/pPM" class="FtrInrTtl BgTxt Bad">47</a>
                        <span class="IssStts Bad">Pending</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/pPM" class="FtrInrTtl BgTxt Stsfctry">6</a>
                        <span class="IssStts Stsfctry">Ongoing</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/pPM" class="FtrInrTtl BgTxt">7</a>
                        <span class="IssStts">Future</span>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/manpowerUtilization" class="FtrTtl Icn MnpwrUtlztn"><span class="LnkTxt">Manpower
                            Utilization</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMnpwrAllc">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/manpowerUtilization" class="FtrInrTtl">Manpower Allocation</a>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMnpwrCmplnt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/manpowerUtilization" class="FtrInrTtl">Complaint Turn around time</a>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMnpwrEffncy">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/manpowerUtilization" class="FtrInrTtl">Manpower Efficiency</a>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrTtl Icn CmplntsFdbck"><span class="LnkTxt">Complaints &
                            Feedback</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="DvsHldr">
                        <div class="DvsnTtlHldr">
                            <span class="DvsnTtl">Internal</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrInrTtl BgTxt">385</a>
                            <span class="IssStts">Total</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrInrTtl BgTxt Good">349</a>
                            <span class="IssStts Good">Completed</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrInrTtl BgTxt Bad">36</a>
                            <span class="IssStts Bad">Pending</span>
                        </div>
                    </div>
                    <div class="DvsHldr">
                        <div class="DvsnTtlHldr">
                            <span class="DvsnTtl">External</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrInrTtl BgTxt">417</a>
                            <span class="IssStts">Total</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrInrTtl BgTxt Good">409</a>
                            <span class="IssStts Good">Completed</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/complaintFeedback" class="FtrInrTtl BgTxt Bad">8</a>
                            <span class="IssStts Bad">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/inventoryManagement" class="FtrTtl Icn InvntryMngmnt"><span class="LnkTxt">Inventory
                            Management</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrSnttnInvt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="FtrInrTtl">Sanitation</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrMdclEqpmntInvt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="FtrInrTtl">Medical Equipments</a>
                        <span class="IssStts Stsfctry">1 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="SctnTtl">Medical Equipments</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">1 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="IssueLstLnk">Shortage of PPE
                                                    Kits.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrWhlChrStrchInvt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="FtrInrTtl">Wheelchairs and Strechers</a>
                        <span class="IssStts Good">0 Issues</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrEngnrngInvt">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="FtrInrTtl">Engineering</a>
                        <span class="IssStts Stsfctry">2 Issues</span>
                        <div class="DshHvr">
                            <div class="FlpSlideHldr NoSlider">
                                <div class="HvrSctnTtlHldr">
                                    <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="SctnTtl">Engineering</a>
                                </div>
                                <div class="HvrDtlsHldr NoBttn">
                                    <div class="HvrTtlHldr">
                                        <span class="IssTtl">2 Issues</span>
                                    </div>
                                    <div class="HvrInnrDtlsHldr FllLst">
                                        <ol class="IssueLst">
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="IssueLstLnk">Shortage of Tube
                                                    Lights.</a>
                                            </li>
                                            <li class="Bad">
                                                <a href="<?php echo base_url(); ?>HospitalAdmin/inventorySanitation" class="IssueLstLnk">Shortage of
                                                    Taps.</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrTtl Icn Adts"><span class="LnkTxt">Audits</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="DvsHldr">
                        <div class="DvsnTtlHldr">
                            <span class="DvsnTtl">Internal</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrInrTtl BgTxt Good">109</a>
                            <span class="IssStts Good">Completed</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrInrTtl BgTxt Stsfctry">4</a>
                            <span class="IssStts Stsfctry">On-going</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrInrTtl BgTxt Bad">2</a>
                            <span class="IssStts Bad">Upcoming</span>
                            <div class="DshHvr">
                                <div class="FlpSlideHldr NoSlider">
                                    <div class="HvrDtlsHldr NoBttn">
                                        <div class="HvrTtlHldr">
                                            <span class="IssTtl">Upcoming</span>
                                        </div>
                                        <div class="HvrInnrDtlsHldr FllLst">
                                            <ol class="IssueLst">
                                                <li>
                                                    <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="IssueLstLnk">NAVH Audit on 15 July
                                                        2021.</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="IssueLstLnk">NAVM Audit on 18 July
                                                        2021.</a>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="DvsHldr">
                        <div class="DvsnTtlHldr">
                            <span class="DvsnTtl">External</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrInrTtl BgTxt Good">103</a>
                            <span class="IssStts Good">Completed</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrInrTtl BgTxt Stsfctry">0</a>
                            <span class="IssStts Stsfctry">On-going</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="FtrInrTtl BgTxt Bad">1</a>
                            <span class="IssStts Bad">Upcoming</span>
                            <div class="DshHvr">
                                <div class="FlpSlideHldr NoSlider">
                                    <div class="HvrDtlsHldr NoBttn">
                                        <div class="HvrTtlHldr">
                                            <span class="IssTtl">Upcoming</span>
                                        </div>
                                        <div class="HvrInnrDtlsHldr FllLst">
                                            <ol class="IssueLst">
                                                <li>
                                                    <a href="<?php echo base_url(); ?>HospitalAdmin/audits" class="IssueLstLnk">NAVH Audit on 15 July
                                                        2021.</a>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/carbonFootprint" class="FtrTtl Icn CrbnFtprnt"><span class="LnkTxt">Carbon
                            Footprint</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrCrbnFtCrrnt">
                        <span class="IssStts">Current Footprint</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrCrbnFtPlnActn">
                        <span class="IssStts Good">Plan of Action</span>
                    </div>
                    <div class="SldDtlsHldr">
                        <a href="#" class="FtrInrTtl BgTxt Stsfctry">30%</a>
                        <span class="IssStts Stsfctry">In-Progress</span>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/benchmarking" class="FtrTtl Icn Bnchmrkng"><span
                            class="LnkTxt">Benchmarking</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr BnchMrkng">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrBnchEnrgy">
                        <span class="FtrInrTtl BgTxt SnglLn">Rank No. 08</span>
                        <span class="FtrInrTtl SnglLn">in Energy Efficiency</span>
                    </div>
                    <div class="SldDtlsHldr BnchMrkng">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrBnchWtr">
                        <span class="FtrInrTtl BgTxt SnglLn">Rank No. 03</span>
                        <span class="FtrInrTtl SnglLn">in Water Efficiency</span>
                    </div>
                    <div class="SldDtlsHldr BnchMrkng">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrBnchMnpwr">
                        <span class="FtrInrTtl BgTxt SnglLn">Rank No. 12</span>
                        <span class="FtrInrTtl SnglLn">in Manpower Utilization</span>
                    </div>
                    <div class="SldDtlsHldr BnchMrkng">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrBnchCrbnFtp">
                        <span class="FtrInrTtl BgTxt SnglLn">Rank No. 18</span>
                        <span class="FtrInrTtl SnglLn">in Carbon Footprint</span>
                    </div>
                    <div class="SldDtlsHldr BnchMrkng">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrBnchCmplnt">
                        <span class="FtrInrTtl BgTxt SnglLn">Rank No. 15</span>
                        <span class="FtrInrTtl SnglLn">in Complaints</span>
                    </div>
                    <div class="SldDtlsHldr BnchMrkng">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrBnchOccpnc">
                        <span class="FtrInrTtl BgTxt SnglLn">Rank No. 06</span>
                        <span class="FtrInrTtl SnglLn">in Occupancy</span>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrTtl Icn Rcmmndtns"><span
                            class="LnkTxt">Recommendations</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="DvsHldr">
                        <div class="DvsnTtlHldr">
                            <span class="DvsnTtl">Internal</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmEnrgy">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Energy Optimization</a>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmWtr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Water Optimization</a>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmMnpwr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Manpower Optimization</a>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmOthr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Other Recommendations</a>
                        </div>
                    </div>
                    <div class="DvsHldr">
                        <div class="DvsnTtlHldr">
                            <span class="DvsnTtl">External</span>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmEnrgy">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Energy Optimization</a>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmWtr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Water Optimization</a>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmMnpwr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Manpower Optimization</a>
                        </div>
                        <div class="SldDtlsHldr">
                            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrRcmmOthr">
                            <a href="<?php echo base_url(); ?>HospitalAdmin/recommendations" class="FtrInrTtl">Other Recommendations</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/comparisions" class="FtrTtl Icn Cmprsns"><span class="LnkTxt">Comparisions</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-select DrpDwn" aria-label="Default select example">
                                    <option selected>Select Hospital 1</option>
                                    <option value="1">FirstMedic Banjara</option>
                                    <option value="2">FirstMedic Kompally</option>
                                    <option value="3">FirstMedic Kukatpally</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select DrpDwn" aria-label="Default select example">
                                    <option selected>Select Hospital 1</option>
                                    <option value="1">FirstMedic Banjara</option>
                                    <option value="2">FirstMedic Kompally</option>
                                    <option value="3">FirstMedic Kukatpally</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select DrpDwn" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    <option value="1">All Categories</option>
                                    <option value="2">Beds & Occupancy</option>
                                    <option value="3">Attendence</option>
                                    <option value="4">Resources</option>
                                    <option value="5">Engineering</option>
                                    <option value="6">Checklist</option>
                                    <option value="7">Sanitation</option>
                                    <option value="8">Machinery</option>
                                    <option value="9">PPM</option>
                                    <option value="10">Manpower Utilization</option>
                                    <option value="11">Complaints & Feedback</option>
                                    <option value="12">Inventory Management</option>
                                    <option value="13">Audits</option>
                                    <option value="14">Carbon Footprint</option>
                                    <option value="15">Benchmarking</option>
                                    <option value="16">Recommendations</option>
                                    <option value="17">Comparisions</option>
                                    <option value="18">Plans</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary SbmtBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PrptyFtrsDshbrd NoSlider">
                <div class="FtrTtlHldr">
                    <a href="<?php echo base_url(); ?>HospitalAdmin/plans" class="FtrTtl Icn Plns"><span class="LnkTxt">Plans</span></a>
                </div>
                <div class="DshbrdFtrSldrHldr NoSlider">
                    <div class="SldDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrFlrPln">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/floorPlans" class="FtrInrTtl">Floor Plans</a>
                        <span class="IssStts">12 Documents</span>
                    </div>
                    <div class="SldDtlsHldr"><img src="<?php echo base_url(); ?>asset/hospital_admin/Images/Blank.png" class="FtrInrTtlImg FrFrEvctnPln">
                        <a href="<?php echo base_url(); ?>HospitalAdmin/fireEvacuationPlans" class="FtrInrTtl">Fire Evacuation Plans</a>
                        <span class="IssStts">15 Documents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // change div color to blue on page ready
            $(".SldDtlsHldr.Flipper").addClass('Flip');
        });
    </script>
</body>
</html>