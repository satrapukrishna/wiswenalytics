<html>
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JavaScript.js"></script>
</head>
<body>
    <div id="MnCtnr" class="DshMnCtnr">
        <!-- <?php $this->load->view('header/leftsidenav');?> -->
        <?php $this->load->view('header/prkheader');?>
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">PRK Hospitals</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li>
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard" style="display: none;">
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk Actv WtrTnk"><span class="Txt">Water Tank</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk FlwMtr"><span class="Txt">Flow Meters</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk DGSt"><span class="Txt">DG Set</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk EnrgMtr"><span class="Txt">Energy Meter</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk LPGCnn"><span class="Txt">LPG Connection</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl" id="reportsInnerId">
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Water Level</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/getWaterFlow" class="Lnk Arr"><span class="Txt">Water Flow</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">DG Set</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid" style="display: none;">
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getFuelGraph" class="Lnk Actv"><span class="Txt">Fuel Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getRunningHours" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Energy Meter</span></a>
                                <ul class="ThrdLvl" id="eminnerid" style="display: none;">
                                  <li>
                                    <a href="<?php echo base_url(); ?>PRKHospital/getConsumptionGraph" class="Lnk Actv"><span class="Txt">Consumption Graph Report</span></a>
                                  </li>
                                  <li>
                                    <a href="<?php echo base_url(); ?>PRKHospital/getConsumption" class="Lnk"><span class="Txt">Consumption Report</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Fire Pump</span></a>
                            </li>              
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <div class="DshBrdRprtSctn">
                <div class="RprtHldr">
                    <div class="RprtHdr">
                        <span class="TtlTxt">Waterflow</span>
                        <ul class="TtlBrdCrmb">
                            <li>
                                <a href="" class="Lnk">Reports</a>
                            </li>
                            <li>
                                <a href="" class="Lnk">Waterflow</a>
                            </li>
                        </ul>
                    </div>
                    <div class="SrchSctn">
                        <ul class="SrchBx WtrFlow">
                            <li>
                                <span class="SrchTxtTtl">Select Flow Meter</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">From Date</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">To Date</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">From Time</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">To Time</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">Select Day</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li class="BtnHldr">
                                <input type="button" class="InptBtn" value="Search" />
                            </li>
                            <li class="BtnHldr">
                                <input type="button" class="InptBtn" value="Reset" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/commonjs.js"></script>
</html>