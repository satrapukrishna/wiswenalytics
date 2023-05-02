<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/SliderCSS.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JsSlider.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JavaScript.js"></script>
   
</head>
<body>
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">PRK Hospitals</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv WtrTnk"><span class="Txt">Water Tank</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk FlwMtr"><span class="Txt">Flow Meters</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk DGSt"><span class="Txt">DG Set</span></a>
                            </li>
                            <li>
                                <a href="#emdiv2" class="Lnk EnrgMtr"><span class="Txt">Energy Meter</span></a>
                            </li>
                            <li>
                                <a href="#fpdiv2" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="#lpgdiv2" class="Lnk LPGCnn"><span class="Txt">LPG Connection</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl Hide" id="reportsInnerId">
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">DG Set</span></a>
                                <ul class="ThrdLvl">
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getFuelGraph" class="Lnk Actv"><span class="Txt">Fuel Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getRunningHours" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/getWaterFlow" class="Lnk Arr"><span class="Txt">Water Flow</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Water Level</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Energy Meter</span></a>
                                <ul class="ThrdLvl">
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getConsumptionGraph" class="Lnk Actv"><span class="Txt">Consumption Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getConsumption" class="Lnk"><span class="Txt">Consumption Report</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/prkheader');?>
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- Water tank level code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="wldiv2">
                    <span class="TxtTtl WtrTnk">Water Tank Levels</span>
                    <span class="SctnVw Cllps FA" id="waterlevel"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls" id="tanks">
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls WtrTnkLvl">
                                        <div class="TnksHldr">
                                            <div class="LftHldr">
                                                <div class="LiquidTank">
                                                    <div class="Liquid l-70"></div>
                                                </div>
                                            </div>
                                            <div class="RgtHldr">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-70"></div>
                                                    <span class="LiquidStatus">70%</span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <span class="SctnTtl">Domestic Tank</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Capacity</div>
                                                <div class="ClRgt">500 Kl</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Current Level</div>
                                                <div class="ClRgt">375 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Filled</div>
                                                <div class="ClRgt">75%</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls WtrTnkLvl">
                                        <div class="TnksHldr">
                                            <div class="LftHldr">
                                                <div class="LiquidTank">
                                                    <div class="Liquid l-20"></div>
                                                </div>
                                            </div>
                                            <div class="RgtHldr">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-20"></div>
                                                    <span class="LiquidStatus">20%</span>
                                                </div>

                                            </div>
                                        </div>
                                        <span class="SctnTtl">Flush Tank</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Capacity</div>
                                                <div class="ClRgt">500 Kl</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Current Level</div>
                                                <div class="ClRgt">375 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Filled</div>
                                                <div class="ClRgt">75%</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls WtrTnkLvl">
                                        <div class="TnksHldr">
                                            <div class="LftHldr">
                                                <div class="LiquidTank">
                                                    <div class="Liquid l-70"></div>
                                                </div>
                                            </div>
                                            <div class="RgtHldr">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-70"></div>
                                                    <span class="LiquidStatus">70%</span>
                                                </div>

                                            </div>
                                        </div>
                                        <span class="SctnTtl">Domestic Tank</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Capacity</div>
                                                <div class="ClRgt">500 Kl</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Current Level</div>
                                                <div class="ClRgt">375 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Filled</div>
                                                <div class="ClRgt">75%</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Water tank level code ends -->
            <!-- Flow meters code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl FlwMtr">Flow Meters</span>
                    <span class="SctnVw Cllps" id="flowcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="flowmeters">
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <span class="SctnTtl">Flow meter - 01</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">200 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">900 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">1985 KL</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <span class="SctnTtl">Flow meter - 02</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">200 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">900 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">1985 KL</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <span class="SctnTtl">Flow meter - 03</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">200 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">900 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">1985 KL</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Flow meteres code ends -->

            <!-- DG Set code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="dgdiv2">
                    <span class="TxtTtl DGSt">DG Set</span>
                    <span class="SctnVw Cllps" id="dgcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="dgset">
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls DGGnrtrHldr">
                                        <span class="SctnTtl">DG Generator - 01</span>
                                        <div class="DGCol-1">
                                            <ul class="SctnDtlsGrdTbl">
                                                <li class="NoClr">
                                                    <div class="ClLft">Diesel Generator</div>
                                                    <div class="ClRgt">On Off</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Consumption</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Running Time</div>
                                                    <div class="ClRgt">15 mins</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Add</div>
                                                    <div class="ClRgt">10 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Available Fuel</div>
                                                    <div class="ClRgt">60 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Removed</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="DGCol-2">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-70"></div>
                                            </div>
                                        </div>
                                        <div class="DGCol-3">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid Low"></div>
                                                <div class="Liquid Medium"></div>
                                                <div class="Liquid High"></div>
                                                <span class="LowTxt">Low</span>
                                                <span class="MedTxt">Medium</span>
                                                <span class="HghTxt">High</span>
                                            </div>
                                        </div>
                                        <div class="DGCol-4">
                                            Add Javascript graph here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls DGGnrtrHldr">
                                        <span class="SctnTtl">DG Generator - 02</span>
                                        <div class="DGCol-1">
                                            <ul class="SctnDtlsGrdTbl">
                                                <li class="NoClr">
                                                    <div class="ClLft">Diesel Generator</div>
                                                    <div class="ClRgt">On Off</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Consumption</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Running Time</div>
                                                    <div class="ClRgt">15 mins</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Add</div>
                                                    <div class="ClRgt">10 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Available Fuel</div>
                                                    <div class="ClRgt">60 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Removed</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="DGCol-2">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-70"></div>
                                            </div>
                                        </div>
                                        <div class="DGCol-3">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid Low"></div>
                                                <div class="Liquid Medium"></div>
                                                <div class="Liquid High"></div>
                                                <span class="LowTxt">Low</span>
                                                <span class="MedTxt">Medium</span>
                                                <span class="HghTxt">High</span>
                                            </div>
                                        </div>
                                        <div class="DGCol-4">
                                            Add Javascript graph here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls DGGnrtrHldr">
                                        <span class="SctnTtl">DG Generator - 03</span>
                                        <div class="DGCol-1">
                                            <ul class="SctnDtlsGrdTbl">
                                                <li class="NoClr">
                                                    <div class="ClLft">Diesel Generator</div>
                                                    <div class="ClRgt">On Off</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Consumption</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Running Time</div>
                                                    <div class="ClRgt">15 mins</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Add</div>
                                                    <div class="ClRgt">10 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Available Fuel</div>
                                                    <div class="ClRgt">60 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Removed</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="DGCol-2">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-70"></div>
                                            </div>
                                        </div>
                                        <div class="DGCol-3">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid Low"></div>
                                                <div class="Liquid Medium"></div>
                                                <div class="Liquid High"></div>
                                                <span class="LowTxt">Low</span>
                                                <span class="MedTxt">Medium</span>
                                                <span class="HghTxt">High</span>
                                            </div>
                                        </div>
                                        <div class="DGCol-4">
                                            Add Javascript graph here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DG Set code ends -->
            <!-- Energy Meter Code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="emdiv2">
                    <span class="TxtTtl EnrgMtr">Energy Meters</span>
                    <span class="SctnVw Cllps" id="emcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="emeter">
                    <div class="DshBrdSctnTtl Innr">
                        <span class="TxtTtl">Floor - 01</span>
                        <span class="SctnVw Cllps"></span>
                        <span class="SctnVwAll Cllps"></span>
                    </div>
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Today Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">45 KWH</div>
                                            </li>
                                        </ul>
                                        <!-- <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul> -->
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 02</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Today Consumption</div>
                                                <div class="ClRgt">40 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">48 KWH</div>
                                            </li>
                                        </ul>
                                      <!--   <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul> -->
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 03</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Today Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">45 KWH</div>
                                            </li>
                                        </ul>
                                       <!--  <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul> -->
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="DshBrdSctnTtl Innr">
                        <span class="TxtTtl">Floor - 02</span>
                        <span class="SctnVw Cllps"></span>
                    </div>
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                       <!--  <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul> -->
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 02</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                      <!--   <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul> -->
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 03</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                       <!--  <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul> -->
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Energy Meter Code ends -->

            <!-- Fire pump code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fpdiv2">
                    <span class="TxtTtl FrPmp">Fire Pump</span>
                    <span class="SctnVw Cllps" id="fpcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp" id="fpump">
                    <table class="SctnDtlsDualGrd">
                        <tr>
                            <th class="Col-1">

                            </th>
                            <th class="Col-2">
                                Running Status
                            </th>
                            <th class="Col-3">
                                Today
                            </th>
                            <th class="Col-4">
                                Yesterday
                            </th>
                            <th class="Col-5">
                                Last Week
                            </th>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Jocky Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts On"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Hydrant Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Off"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Diesel Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Auto"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                    </table>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 01</span>
                        <span class="MtrVl">36 Kgs</span>
                    </div>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 02</span>
                        <span class="MtrVl">50 Kgs</span>
                    </div>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 03</span>
                        <span class="MtrVl">156 Kgs</span>
                    </div>
                </div>
            </div>
            <!-- Fire pump code ends -->
            <!-- Lpg code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="lpgdiv2">
                    <span class="TxtTtl LPGCnn">LPG Connection</span>
                    <span class="SctnVw Cllps" id="lpgcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd LPGCnn" id="lpg">
                    <div class="LPGCnnHldr">
                        <ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
                    </div>
                    <div class="LPGCnnHldr">
                        <span class="Ttl">PSI Bar</span>

                    </div>
                    <div class="LPGCnnHldr">
                        
                    </div>
                </div>
            </div>
            <!-- Lpg Code ends -->
        </div>
    </div>
</body>
<script type="text/javascript">

    $('#waterlevel').click(function(event) {
        $('#tanks').toggle();    
    });
    $('#flowcollapse').click(function(event) {
        $('#flowmeters').toggle();     
    });
    $('#dgcollapse').click(function(event) {
        $('#dgset').toggle();        
    });
    $('#emcollapse').click(function(event) {
        $('#emeter').toggle();  
    });
    $('#fpcollapse').click(function(event) {
        $('#fpump').toggle();   
    });
    $('#lpgcollapse').click(function(event) {
        $('#lpg').toggle();       
    });
    $('#collapseall').click(function(event) {
        if($( "#tanks" ).is( ":visible" )){ $('#tanks').toggle(); }
        else{}
        if($( "#flowmeters" ).is( ":visible" )){ $('#flowmeters').toggle(); }
        else{}
        if($( "#dgset" ).is( ":visible" )){ $('#dgset').toggle(); }
        else{}
        if($( "#emeter" ).is( ":visible" )){ $('#emeter').toggle(); }
        else{}
        if($( "#fpump" ).is( ":visible" )){ $('#fpump').toggle(); }
        else{}
        if($( "#lpg" ).is( ":visible" )){ $('#lpg').toggle(); }
        else{}      
    });

    $('#dshbrdMasterId').click(function(e) 
    {
        e.preventDefault();
        $("#hidedashboard").toggle(); 
    });
  
    $('#reportsOuterId').click(function(e) 
    {
        e.preventDefault();
        $("#reportsInnerId").toggle();
    });
    
</script>
</html>