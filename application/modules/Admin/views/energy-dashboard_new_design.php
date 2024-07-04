<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Meters</title>
    <link rel="stylesheet" href="<?php echo site_url() ?>new_assets/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo site_url() ?>new_assets/AppTheme/Fonts/IconFont.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <style>
        .block {
            padding: 0px 10px 10px 10px !important;
        }

        .sub_block {
            background-color: #F3E5F5;
            padding: 10px 10px 10px 10px;
            border-radius: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .subblock2 {
            background-color: #E3F2FD !important;
            padding-top: 0px !important;
        }

        .subblock3 {
            background-color: #E0F2F1 !important;
            padding-top: 0px !important;
        }

        .subblock4 {
            background-color: #F1F8E9 !important;
            padding-top: 0px !important;
        }

        .submainhead {
            color: #1E538F;
            font-weight: 700;
            font-size: 15px;
        }

        .sub_head {
            color: #4A148C;
            font-weight: 700;
            font-size: 14px;
        }

        .inner_block {
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(33, 52, 85, 0.3);
            padding: 10px 0px 10px 0px;
        }

        .inner_block2 {
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(33, 52, 85, 0.3);
            padding: 10px 0px 10px 0px;
        }

        .smalltext {
            display: flex;
            flex-direction: column;
            padding: 0px 50px 0px 0px;
            width: 120px;
        }

        .smalltext2 {
            display: flex;
            flex-direction: column;
            padding: 0px 0px 0px 30px;
            border-left: 1px solid rgba(33, 52, 85, 0.3);
        }

        div.AppMstrCntnr div.GnPgCntntDvHldr.DashboardView div.InnrCntntHldr div.FormHldr div.row {
            border-color: rgba(247, 249, 250, 0.3);
        }

        .subhead {
            color: #222222;
            font-weight: 600;
            font-size: 12px;
            padding-bottom: 5px;
        }

        .subres {
            color: #4A148C;
            font-weight: 700;
            font-size: 13px;
        }

        .subres2 {
            color: #1565C0;
            font-weight: 700;
            font-size: 13px;
        }

        .subres3 {
            color: #00695C;
            font-weight: 700;
            font-size: 13px;
        }

        .subres4 {
            color: #558B2F;
            font-weight: 700;
            font-size: 13px;
        }

        .info {
            margin: 0px 0px 0px 10px !important;
        }

        .totalsubblock {
            background: #FFFFFF !important;
        }

        .graph_head {
            color: #222222 !important;
            font-weight: 700 !important;
            font-size: 15px !important;
        }

        .graphblk {
            padding: 10px !important;
        }

        .graphblkhead {
            border-bottom: 1px solid #EFEBE9 !important;
            background: white !important;
            padding-left: 5px !important;
        }

        .popup_head {
            color: #1E538F;
            font-weight: 700;
            font-size: 18px;
        }

        .popup_headdiv {
            border-bottom: 1px solid #EFEBE9 !important;
            width: 500px;
            padding: 10px 10px 15px 10px;
        }

        .popupsubheaddiv {
            display: flex;
            border-bottom: 1px solid #EFEBE9 !important;
            width: 500px;
            padding: 15px 0px 0px 10px;
            margin: 0px 15px 0px 15px;
        }

        .popupheadselect {
            padding-bottom: 15px;
            margin-right: 20px;
            width: 77px;
        }

        .popupsubhead {
            color: #666666;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
        }

        .popdtldiv {
            display: flex;
            flex-direction: column;
            padding: 14px 0px 15px 10px;
            margin: 0px 15px 0px 15px;
            border-bottom: 1px solid #EFEBE9;
            width: 500px;
        }

        .popdtldiv2 {
            display: flex;
            flex-direction: column;
            padding: 14px 0px 15px 10px;
            margin: 0px 15px 0px 15px;
            border-bottom: 1px solid #EFEBE9;
            width: 221px;
        }

        .popdtl1 {
            color: #666666;
            font-weight: 500;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .popdtl2 {
            color: #222222;
            font-weight: 600;
            font-size: 13px;
        }

        .popupdivsub {
            display: flex;
        }

        .popuptbl {
            width: 460px;
            margin: 10px 20px 10px 15px;
        }

        .tbh {
            color: #1E538F !important;
            font-weight: 700 !important;
            font-size: 12px !important;
        }

        .tbd {
            color: #444444 !important;
            font-weight: 500 !important;
            font-size: 12px !important;
        }

        .mainimg {
            width: 200px;
            height: 200px;
            margin: 15px 60px 20px 130px;
        }

        .smallimg {
            width: 30px;
            height: 30px;
        }

        .Actv {
            border-bottom: 1px solid #1E538F;
        }

        .InfoBtn {
            background: #003550 !important;
            color: #fff !important;
            border-radius: 15px;
            border: 1px solid #003550;
        }
    </style>
</head>

<body>
    <div class="AppHeader">
        <div class="AppMnuTtlHldr">
            <div class="TtlHldr">
                <div class="ClntLgoHldr">
                    <img src="<?php echo site_url() ?>new_assets/Images/CompanyLogo.png" class="Lgo" />
                </div>
            </div>
        </div>
        <div class="AppUsrCntrlHldr">
            <ul class="UsrNav">
                <li>
                    <a href="#" class="NavLnk WISIcn-Notification"></a>
                </li>
                <li>
                    <a href="#" class="NavLnk WISIcn-Help"></a>
                </li>
                <li>
                    <div class="UsrDvHldr">
                        <div class="UsrDtls">
                            <div class="PrflNmeHldr">
                                <span class="Nme">Vinay Kumar</span>
                            </div>
                            <div class="PrflImgHldr">
                                <img src="<?php echo site_url() ?>new_assets/Images/ProfileImage.jpg" class="PrfImg" />
                            </div>
                        </div>
                    </div>
                    <div class="HdrSbMnuHldr UsrDv">
                        <div class="InnrHldr">
                            <div class="PrflSbMnu">
                                <ul class="LnkLst">
                                    <li>
                                        <div class="PrflMiniView">
                                            <div class="PrflImgHldr">
                                                <img src="<?php echo site_url() ?>new_assets/Images/ProfileImage.jpg" class="PrfImg" />
                                            </div>
                                            <div class="PrflBscDtls">
                                                <span class="PrflName">Vinay Kumar</span>
                                                <span class="PrflDesignation">Site Admin</span>
                                                <span class="PrflEmail">vinay.kumar@gmail.com</span>
                                                <span class="PrflPhone">+91 98490 98490</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="Lnk">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="index.html" class="Lnk">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="AppFooter">
        <div class="AppVrsnDtls">
            <span class="AppCurrVrsn">Version:<span class="Vrsn">v3.0.20</span></span>
        </div>
        <div class="AppPwrdDtls">
            <span class="CorpTxt">Powered by<a href="#" class="Lnk" target="_blank">WIS</a></span>
        </div>
    </div>
    <div class="AppMnuHldr">
        <div class="MnuLstHldr">
            <ul class="MnuLst">
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Dashboard"></span>
                        <span class="LnkTxt">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Map"></span>
                        <span class="LnkTxt">Locations</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Employees"></span>
                        <span class="LnkTxt">Employees</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-AccessControl"></span>
                        <span class="LnkTxt">Access Control</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Masters"></span>
                        <span class="LnkTxt">Masters</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="Lnk">
                        <span class="LnkIcn WISIcn-Menu-Reports"></span>
                        <span class="LnkTxt">Reports</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="AppMstrCntnr">
        <div class="GnPgHdrDvHldr">
            <div class="TtlHldr">
                <span class="PgTtl">ENERGY METERS</span>
            </div>
            <div class="NvBtnHldr">
                <div class="Hldr">
                    <div class="DtDsplHldr">
                        <span class="DtTxt">11 May 2023</span>
                    </div>
                </div>
                <div class="Hldr">
                    <div class="AppCmpctTbHldr">
                        <a href="#" class="TabLnk date Act_2 Actv">Today</a>
                        <a href="#" class="TabLnk date Act_2">This Week</a>
                        <a href="#" class="TabLnk date Act_2 datePicker">Custom Date</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="GnPgCntntDvHldr DashboardView">
            <div class="InnrCntntHldr">
                <div class="FormHldr">
                    <div class="row NoBG">
                        <div class="col-1 FllHght">
                            <div class="SldrHldr">
                                <div class="CmpltsBrkDwnSlider">
                                    <div class="slide">
                                        <div class="DashboardHldr" style="width: 320px;">
                                            <div class="DshHdrHldr Brdr totalsubblock">
                                                <div class="TtlHldr">
                                                    <span class="submainhead">Container Office</span>
                                                </div>
                                                <div class="ActnBtnHldr">
                                                    <a href="#" class="Lnk WISIcn-Reset"></a>
                                                </div>
                                                <div class="ActnBtnHldr info ">
                                                    <span href="javascript:void(0);" class="InfoBtn WISIcn-Information popup-trigger"
                                                        style="cursor: pointer;"
                                                        data-popup-text="Container Office"></span>
                                                </div>
                                            </div>
                                            <div class="DshDtlHldr FllPddng block">
                                                <div class="FormHldr">
                                                    <div class="row NoBrdr">
                                                        <div class="sub_block">
                                                            <span class="sub_head">Consumption</span>
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">This Month</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Average/Day</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock2">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current KW</span>
                                                                    <span class="subres2">2.269 kW</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">PF</span>
                                                                    <span class="subres2">0.963 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">KVA</span>
                                                                    <span class="subres2">2.356 kVA</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">KVAH</span>
                                                                    <span class="subres2">0.305 kVAH</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock3">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_1</span>
                                                                    <span class="subres3">245.032 V</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Voltage_2</span>
                                                                    <span class="subres3">246.427 V</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_3</span>
                                                                    <span class="subres3">245.492 V</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock4">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_1</span>
                                                                    <span class="subres4">0.39 A</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Current_2</span>
                                                                    <span class="subres4">0.161 A</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_3</span>
                                                                    <span class="subres4">9.048 A</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="DashboardHldr" style="width: 320px;">
                                            <div class="DshHdrHldr Brdr totalsubblock">
                                                <div class="TtlHldr">
                                                    <span class="submainhead">A4 Building</span>
                                                </div>
                                                <div class="ActnBtnHldr">
                                                    <a href="#" class="Lnk WISIcn-Reset"></a>
                                                </div>
                                                <div class="ActnBtnHldr info">
                                                    <div class="ActnBtnHldr info ">
                                                        <span href="javascript:void(0);"
                                                            class="InfoBtn WISIcn-Information popup-trigger" style="cursor: pointer;"
                                                             data-popup-text="A4 Building"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="DshDtlHldr FllPddng block">
                                                <div class="FormHldr">
                                                    <div class="row NoBrdr">
                                                        <div class="sub_block">
                                                            <span class="sub_head">Consumption</span>
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">This Month</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Average/Day</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock2">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current KW</span>
                                                                    <span class="subres2">2.269 kW</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">PF</span>
                                                                    <span class="subres2">0.963 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">KVA</span>
                                                                    <span class="subres2">2.356 kVA</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">KVAH</span>
                                                                    <span class="subres2">0.305 kVAH</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock3">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_1</span>
                                                                    <span class="subres3">245.032 V</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Voltage_2</span>
                                                                    <span class="subres3">246.427 V</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_3</span>
                                                                    <span class="subres3">245.492 V</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock4">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_1</span>
                                                                    <span class="subres4">0.39 A</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Current_2</span>
                                                                    <span class="subres4">0.161 A</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_3</span>
                                                                    <span class="subres4">9.048 A</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="DashboardHldr" style="width: 320px;">
                                            <div class="DshHdrHldr Brdr totalsubblock">
                                                <div class="TtlHldr">
                                                    <span class="submainhead">LDB (Pump room)</span>
                                                </div>
                                                <div class="ActnBtnHldr">
                                                    <a href="#" class="Lnk WISIcn-Reset"></a>
                                                </div>
                                                <div class="ActnBtnHldr info">
                                                    <div class="ActnBtnHldr info ">
                                                        <span href="javascript:void(0);"
                                                            class="InfoBtn WISIcn-Information popup-trigger" style="cursor: pointer;"
                                                            data-popup-text="LDB (Pump Room)"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="DshDtlHldr FllPddng block">
                                                <div class="FormHldr">
                                                    <div class="row NoBrdr">
                                                        <div class="sub_block">
                                                            <span class="sub_head">Consumption</span>
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">This Month</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Average/Day</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock2">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current KW</span>
                                                                    <span class="subres2">2.269 kW</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">PF</span>
                                                                    <span class="subres2">0.963 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">KVA</span>
                                                                    <span class="subres2">2.356 kVA</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">KVAH</span>
                                                                    <span class="subres2">0.305 kVAH</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock3">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_1</span>
                                                                    <span class="subres3">245.032 V</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Voltage_2</span>
                                                                    <span class="subres3">246.427 V</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_3</span>
                                                                    <span class="subres3">245.492 V</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock4">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_1</span>
                                                                    <span class="subres4">0.39 A</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Current_2</span>
                                                                    <span class="subres4">0.161 A</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_3</span>
                                                                    <span class="subres4">9.048 A</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="DashboardHldr" style="width: 320px;">
                                            <div class="DshHdrHldr Brdr totalsubblock">
                                                <div class="TtlHldr">
                                                    <span class="submainhead">Main I/C (EB)</span>
                                                </div>
                                                <div class="ActnBtnHldr">
                                                    <a href="#" class="Lnk WISIcn-Reset"></a>
                                                </div>
                                                <div class="ActnBtnHldr info">
                                                    <div class="ActnBtnHldr info ">
                                                        <span href="javascript:void(0);"
                                                            class="InfoBtn WISIcn-Information popup-trigger" style="cursor: pointer;"
                                                            data-popup-text="Main I/C(EB)"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="DshDtlHldr FllPddng block">
                                                <div class="FormHldr">
                                                    <div class="row NoBrdr">
                                                        <div class="sub_block">
                                                            <span class="sub_head">Consumption</span>
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">This Month</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Average/Day</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock2">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current KW</span>
                                                                    <span class="subres2">2.269 kW</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">PF</span>
                                                                    <span class="subres2">0.963 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">KVA</span>
                                                                    <span class="subres2">2.356 kVA</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">KVAH</span>
                                                                    <span class="subres2">0.305 kVAH</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock3">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_1</span>
                                                                    <span class="subres3">245.032 V</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Voltage_2</span>
                                                                    <span class="subres3">246.427 V</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_3</span>
                                                                    <span class="subres3">245.492 V</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock4">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_1</span>
                                                                    <span class="subres4">0.39 A</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Current_2</span>
                                                                    <span class="subres4">0.161 A</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_3</span>
                                                                    <span class="subres4">9.048 A</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="DashboardHldr" style="width: 320px;">
                                            <div class="DshHdrHldr Brdr totalsubblock">
                                                <div class="TtlHldr">
                                                    <span class="submainhead">LDB (Pump room)</span>
                                                </div>
                                                <div class="ActnBtnHldr">
                                                    <a href="#" class="Lnk WISIcn-Reset"></a>
                                                </div>
                                                <div class="ActnBtnHldr info">
                                                    <div class="ActnBtnHldr info ">
                                                        <span href="javascript:void(0);"
                                                            class="InfoBtn WISIcn-Information popup-trigger" style="cursor: pointer;"                                                            
                                                            data-popup-text="LDB (Pump Room)"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="DshDtlHldr FllPddng block">
                                                <div class="FormHldr">
                                                    <div class="row NoBrdr">
                                                        <div class="sub_block">
                                                            <span class="sub_head">Consumption</span>
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Today's</span>
                                                                    <span class="subres">70.14 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">This Month</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Average/Day</span>
                                                                    <span class="subres">140.28 kWh</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock2">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current KW</span>
                                                                    <span class="subres2">2.269 kW</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">PF</span>
                                                                    <span class="subres2">0.963 kWh</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">KVA</span>
                                                                    <span class="subres2">2.356 kVA</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">KVAH</span>
                                                                    <span class="subres2">0.305 kVAH</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock3">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_1</span>
                                                                    <span class="subres3">245.032 V</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Voltage_2</span>
                                                                    <span class="subres3">246.427 V</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Voltage_3</span>
                                                                    <span class="subres3">245.492 V</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sub_block subblock4">
                                                            <div class="inner_block">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_1</span>
                                                                    <span class="subres4">0.39 A</span>
                                                                </div>
                                                                <div class="smalltext2">
                                                                    <span class="subhead">Current_2</span>
                                                                    <span class="subres4">0.161 A</span>
                                                                </div>
                                                            </div>
                                                            <div class="inner_block2">
                                                                <div class="smalltext">
                                                                    <span class="subhead">Current_3</span>
                                                                    <span class="subres4">9.048 A</span>
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
                    <div class="row NoBrdr NoBG">
                        <div class="col-2 FllHght">
                            <div class="DashboardHldr graphblk">
                                <div class="DshHdrHldr Brdr graphblkhead">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt SmlCse graph_head">Present Load</span>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="FormHldr">
                                        <div class="row NoBrdr">
                                            <div class="col-66 NoPd">
                                                <div class="GrphHldr CmpltRprt PChrt">
                                                    <canvas id="CmpltStatus"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-3 FllHght NoPd AlgnCntntCntr">
                                                <div class="GrphLgd">
                                                    <ul class="LgndLst">
                                                        <li>
                                                            <span class="LgndClr" style="background: #BCAAA4;"></span>
                                                            <span class="LgndNumb">31</span>
                                                            <span class="LgndTxt">Lighting</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #42A5F5;"></span>
                                                            <span class="LgndNumb">15</span>
                                                            <span class="LgndTxt">Plumbing</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #FF7043;"></span>
                                                            <span class="LgndNumb">22</span>
                                                            <span class="LgndTxt">HVAC</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #FF4069;"></span>
                                                            <span class="LgndNumb">23</span>
                                                            <span class="LgndTxt">Recepiticles</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #22CFCF;"></span>
                                                            <span class="LgndNumb">9</span>
                                                            <span class="LgndTxt">Misc</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 FllHght">
                            <div class="DashboardHldr graphblk">
                                <div class="DshHdrHldr Brdr graphblkhead">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt SmlCse graph_head">Configured Load</span>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="FormHldr">
                                        <div class="row NoBrdr">
                                            <div class="col-66 NoPd">
                                                <div class="GrphHldr CmpltRprt PChrt">
                                                    <canvas id="CmpltDep"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-3 FllHght NoPd AlgnCntntCntr">
                                                <div class="GrphLgd">
                                                    <ul class="LgndLst">
                                                        <li>
                                                            <span class="LgndClr" style="background: #66BB6A;"></span>
                                                            <span class="LgndNumb">35</span>
                                                            <span class="LgndTxt">Lighting</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #EF5350;"></span>
                                                            <span class="LgndNumb">12</span>
                                                            <span class="LgndTxt">Plumbing</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #FB8C00;"></span>
                                                            <span class="LgndNumb">20</span>
                                                            <span class="LgndTxt">HVAC</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #FF7043;"></span>
                                                            <span class="LgndNumb">25</span>
                                                            <span class="LgndTxt">Recepiticles</span>
                                                        </li>
                                                        <li>
                                                            <span class="LgndClr" style="background: #26A69A;"></span>
                                                            <span class="LgndNumb">8</span>
                                                            <span class="LgndTxt">Misc</span>
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
            </div>
        </div>
    </div>
    <!-- info button pop up -->
    <div class="PopUpBG popup_div" style="display: none;"></div>
    <div class="PopUpHldr popup_div"
        style="width: 500px;height: 600px;margin-top: 70px;margin-left:40px;display: none;">
        <div class="PopUpHedr">
            <div class="HdrTtlHldr">
                <span class="TtlTxt">Energy Meter Details</span>
            </div>
            <div class="HdrBtnHldr">
                <span class="AppBtn IcnOnly Close close_btn"></span>
            </div>
        </div>
        <div class="PopUpBdy" style="border-radius: 10px;">
            <div class="InnrCntntHldr">
                <div class="popup_headdiv">
                    <span class="popup_head"></span>
                </div>
                <div class="popupsubheaddiv">
                    <div class="popupheadselect Act_1 Actv" data-section="1"><span class="popupsubhead">Basic
                            Info.</span></div>
                    <div class="popupheadselect Act_1" data-section="2"><span class="popupsubhead">Maintenance</span>
                    </div>
                    <div class="popupheadselect Act_1" data-section="3"><span class="popupsubhead"
                            style="margin-left: 15px;">Loads</span></div>
                    <div class="popupheadselect Act_1" data-section="4"><span class="popupsubhead">Gallery</span></div>
                </div>
                <div class="popupdetails1" style="display:block;">
                    <div class="popdtldiv">
                        <span class="popdtl1">S. No.</span>
                        <span class="popdtl2">A55887669</span>
                    </div>
                    <div class="popupdivsub">
                        <div class="popdtldiv2" style="margin: 0px 0px 0px 15px;">
                            <span class="popdtl1">Make</span>
                            <span class="popdtl2">Siemens</span>
                        </div>
                        <div class="popdtldiv2" style="margin: 0px 15px 0px 0px;">
                            <span class="popdtl1">Model</span>
                            <span class="popdtl2">Meter-669A</span>
                        </div>
                    </div>
                    <div class="popdtldiv">
                        <span class="popdtl1">Location</span>
                        <span class="popdtl2">Administrative Building, IIT Campus</span>
                    </div>
                </div>
                <div class="popupdetails2" style="display:none;">
                    <div class="popupdivsub">
                        <div class="popdtldiv2" style="margin: 0px 0px 0px 15px;">
                            <span class="popdtl1">Installed on</span>
                            <span class="popdtl2">08 February 2019</span>
                        </div>
                        <div class="popdtldiv2" style="margin: 0px 15px 0px 0px;">
                            <span class="popdtl1">Last Calibration Date</span>
                            <span class="popdtl2">08 February 2023</span>
                        </div>
                    </div>
                    <div class="popupdivsub">
                        <div class="popdtldiv2" style="margin: 0px 0px 0px 15px;">
                            <span class="popdtl1">Calibrated by</span>
                            <span class="popdtl2">K. Prasad [EMP22017]</span>
                        </div>
                        <div class="popdtldiv2" style="margin: 0px 15px 0px 0px;">
                            <span class="popdtl1">Next Calibration</span>
                            <span class="popdtl2">08 February 2024</span>
                        </div>
                    </div>
                </div>
                <div class="popupdetails3" style="display:none;">
                    <div class="popuptbl">
                        <table class="AppGenTable NoMrgnTop VAMiddle">
                            <thead>
                                <tr>
                                    <th class="tbh">S. No.</th>
                                    <th class="tbh">Complaint Type</th>
                                    <th class="tbh">Assigned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tbd">1</td>
                                    <td class="tbd">Microwave</td>
                                    <td class="tbd">68</td>
                                </tr>
                                <tr>
                                    <td class="tbd">2</td>
                                    <td class="tbd">Refrigerator</td>
                                    <td class="tbd">22</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="popupdetails4" style="display:none;">
                    <div>
                        <img src="public\assets\Images\71iHgbQ+0LS.jpg" alt="" class="mainimg">
                    </div>
                    <div style="display: flex;">
                        <div style="margin: 0px 10px 10px 120px;border: 1px solid #DDDDDD;
                        padding: 10px;"><img src="public\assets\Images\71iHgbQ+0LS.jpg" alt="" class="smallimg"></div>
                        <div style="margin: 0px 10px 10px 30px;border: 1px solid #DDDDDD;
                        padding: 10px;"><img src="public\assets\Images/image2.jpeg" alt="" class="smallimg"></div>
                        <div style="margin: 0px 10px 10px 30px;border: 1px solid #DDDDDD;
                        padding: 10px;"><img src="public\assets\Images\Watt-Hour-Meter-251x300.jpg" alt=""
                                class="smallimg"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" type="text/css"
        src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).on('click', '.popupheadselect', function () {
            $(".Act_1").not($(this).addClass('Actv')).removeClass('Actv');
            var sectionToShow = $(this).data('section');
            $('[class^="popupdetails"]').hide(); // Hide all sections with class starting with 'popupdetails'
            $('.popupdetails' + sectionToShow).show();
        });
        $('body').on('mousedown', '.popup-trigger', function () {
            var popupText = $(this).data('popup-text');
            $('.popup_head').html(popupText);
            $('.popup_div').show();
        });
        $('body').on('click', '.close_btn', function () {
            $('.popup_div').hide();
        });
        $(document).on('click', '.smallimg', function () {
            var imgSrc = $(this).attr('src');
            $('.mainimg').attr('src', imgSrc);
        });
        $(document).ready(function () {
            $('.CmpltsBrkDwnSlider').bxSlider({
                slideWidth: 320,
                minSlides: 3,
                maxSlides: 6,
                moveSlides: 1,
                hideControlOnEnd: true,
                infiniteLoop: false,
                slideMargin: 10
            });
        });
        //Date Picker//
        $(document).ready(function () {
            $(".DtTxt").html(moment().format('DD MMM, YYYY'));
        });
        $(document).on('click', '.date', function () {
            $(".Act_2").not($(this).addClass('Actv')).removeClass('Actv');

            if ($(this).text() == 'This Week') {
                $(".DtTxt").html(moment().startOf('week').format('DD MMM, YYYY') + ' - ' + moment().endOf(
                    'week').format('DD MMM, YYYY'));
            } else if ($(this).text() == 'Today') {
                $(".DtTxt").html(moment().startOf('day').format('DD MMM, YYYY'));
            }
        });
        $(function () {
            $('.datePicker').daterangepicker({
                opens: 'left'
            }, function (start, end, label) {
                $(".DtTxt").html(start.format('DD MMM, YYYY') + ' - ' + end.format('DD MMM, YYYY'));
            });
        });

        const ctx_c_Status = document.getElementById('CmpltStatus');
        new Chart(ctx_c_Status, {
            type: 'doughnut',
            data: {
                labels: ['Lighting', 'Plumbing', 'HVAC', 'Recepiticles', 'Misc'],
                datasets: [{
                    label: '',
                    data: [31, 15, 22, 23, 9],
                    backgroundColor: [
                        '#BCAAA4',
                        '#42A5F5',
                        '#FF7043',
                        '#FF4069',
                        '#22CFCF'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                family: "'Nunito Sans', sans-serif",
                                size: 14
                            }
                        }
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Bar Chart'
                    }
                }
            }
        });

        const ctx_c_Dep = document.getElementById('CmpltDep');
        new Chart(ctx_c_Dep, {
            type: 'doughnut',
            data: {
                labels: ['Lighting', 'Plumbing', 'HVAC', 'Recepiticles', 'Misc'],
                datasets: [{
                    label: '',
                    data: [35, 12, 20, 25, 8],
                    backgroundColor: [
                        '#66BB6A',
                        '#EF5350',
                        '#FB8C00',
                        '#FF7043',
                        '#26A69A'
                    ],
                    borderWidth: 0
                }],

            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                family: "'Nunito Sans', sans-serif",
                                size: 14
                            }
                        }
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Bar Chart'
                    }
                }
            }
        });

		function em(id){ 	
	$('.em-disc'+id).toggle('slow'); 
	$('.em'+id).hide();
	$('.em-hide'+id).show();
 }
 function device(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
			// alert("aaaa");
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
			// alert("bbb");
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
        }
}
function device1(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
            // $(".inner_collaps").addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
            // $(".inner_collaps").removeClass("Expndd");
        }
}

function deviceall(){
	if($( ".device" ).is( ":visible" ))
        {
			
            $('.device').hide('slow'); 
            $(".deviceall").addClass("Expnd");
			$(".dev").addClass("Expndd");
			

	        }
        else if($( ".device" ).is( ":hidden" ))
        {
			
            $('.device').show('slow'); 
            $(".deviceall").removeClass("Expnd");
			$(".dev").removeClass("Expndd");
			
        }
	//$('.device').hide();
}
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    </script>
</body>

</html>