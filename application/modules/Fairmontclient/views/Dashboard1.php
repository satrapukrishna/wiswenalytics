﻿<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="CSS/SliderCSS.css" rel="stylesheet" />
    <link href="CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="Scripts/jquery.easing.1.3.js"></script>
    <script src="Scripts/JsSlider.js"></script>
    <script src="Scripts/JavaScript.js"></script>
</head>
<body>
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">PKR Hospitals</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li>
                        <a href="" class="Lnk Arr Slct Dshbrd"><span class="Txt">Dashboard</span></a>
                        <ul class="ScndLvl">
                            <li>
                                <a href="" class="Lnk Actv WtrTnk"><span class="Txt">Water Tank</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk FlwMtr"><span class="Txt">Flow Meters</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk DGSt"><span class="Txt">DG Set</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk EnrgMtr"><span class="Txt">Energy Meter</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk LPGCnn"><span class="Txt">LPG Connection</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl Hide NoIcon">
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">DG Set</span></a>
                                <ul class="ThrdLvl">
                                    <li>
                                        <a href="" class="Lnk Actv"><span class="Txt">Fuel Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Water Flow</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Water Level</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Energy Meter</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="DshbrdRgt" class="DshBrdHdr">
            <ul class="HdrLstng">
                <li class="MenuHldr">
                    <span id="MblMenuBtn" onclick="javascript:MblMenu();" class="MenuTggle"></span>
                </li>
                <li class="BrndHldr">
                    <span class="BrndNm">PKR Hospitals</span>
                </li>
                <li>
                    <span class="UsrDtls">Mr. User</span>
                </li>
                <li>
                    <span class="Sttngs"></span>
                </li>
                <li>
                    <span class="SgnOt"></span>
                </li>
            </ul>
        </div>
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl WtrTnk">Water Tank Levels</span>
                    <span class="SctnVw Cllps FA"></span>
                    <span class="SctnVwAll Cllps FA"></span>
                </div>
                <div class="DshBrdSctnDtls">
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
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl FlwMtr">Flow Meters</span>
                    <span class="SctnVw Cllps"></span>
                </div>
                <div class="DshBrdSctnDtls">
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="Images/Blank.png" />
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
                                            <img class="FlwMtr" src="Images/Blank.png" />
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
                                            <img class="FlwMtr" src="Images/Blank.png" />
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
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl DGSt">DG Set</span>
                    <span class="SctnVw Cllps"></span>
                </div>
                <div class="DshBrdSctnDtls">
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
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl EnrgMtr">Energy Meters</span>
                    <span class="SctnVw Cllps"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr">
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
                                            <img class="ErgyMtr" src="Images/Blank.png" />
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
                                        <ul class="SctnDtlsGrdTbl">
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
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="Images/Blank.png" />
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
                                        <ul class="SctnDtlsGrdTbl">
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
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="Images/Blank.png" />
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
                                        <ul class="SctnDtlsGrdTbl">
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
                                        </ul>
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
                                            <img class="ErgyMtr" src="Images/Blank.png" />
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
                                        <ul class="SctnDtlsGrdTbl">
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
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="Images/Blank.png" />
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
                                        <ul class="SctnDtlsGrdTbl">
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
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="Images/Blank.png" />
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
                                        <ul class="SctnDtlsGrdTbl">
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
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl FrPmp">Fire Pump</span>
                    <span class="SctnVw Cllps"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp">
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
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl LPGCnn">LPG Connection</span>
                    <span class="SctnVw Cllps"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd LPGCnn">
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
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl IOQ">Indoor Air Quality</span>
                    <span class="SctnVw Cllps"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd IOQ">
                    <div class="bxsliderFllWdth">
                        <div>
                            <div class="IOQArea">
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Temperature</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl TmprCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu TmpIco">
                                                                18&#176; C
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Relative Humidity</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl HmdCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu RltHmd">
                                                                52.3%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Carbon Dioxide</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl CoGood">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu Cotwo">
                                                                N/A
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="IOQArea">
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Temperature</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl TmprCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu TmpIco">
                                                                18&#176; C
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Relative Humidity</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl HmdCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu RltHmd">
                                                                52.3%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Carbon Dioxide</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl CoGood">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu Cotwo">
                                                                N/A
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="IOQArea">
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Temperature</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl TmprCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu TmpIco">
                                                                18&#176; C
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Relative Humidity</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl HmdCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu RltHmd">
                                                                52.3%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Carbon Dioxide</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl CoGood">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu Cotwo">
                                                                N/A
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                    <input class="FtrInpt" />
                                                    <select class="FtrDrpDwn Optn">
                                                        <option value="">Today</option>
                                                        <option value="">Weekly</option>
                                                        <option value="">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="FtrGrph">

                                                </div>
                                            </div>
                                        </div>
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