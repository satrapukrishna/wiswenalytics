<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS - Water</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin_bms/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin_bms//AppTheme/Fonts/IconFont.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function () {
            $('.WaterTankLevels').bxSlider({
                slideWidth: 400,
                minSlides: 2,
                maxSlides: 3,
                moveSlides: 1,
                hideControlOnEnd: true,
                infiniteLoop: false
            });
            $('.WaterMeter').bxSlider({
                slideWidth: 400,
                minSlides: 2,
                maxSlides: 3,
                moveSlides: 1,
                hideControlOnEnd: true,
                infiniteLoop: false
            });
            $('.BorewellRunningHours').bxSlider({
                slideWidth: 400,
                minSlides: 2,
                maxSlides: 3,
                moveSlides: 1,
                hideControlOnEnd: true,
                infiniteLoop: false
            });
        });
    </script>
</head>

<body>
<?php $this->load->view('common/header') ?>
<?php $this->load->view('common/footer') ?>
<?php $this->load->view('common/leftmenu') ?>
    <div class="AppMstrCntnr">
        <div class="GnPgCntntDvHldr DashboardView FullView">
            <div class="InnrCntntHldr">
                <div class="FormHldr">
                    <div class="row NoBrdr NoBG ExtraPaddTop ExtraPaddBottom">
                        <div class="col-1">
                            <div class="DashboardHldr">
                                <div class="DshHdrHldr Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">Water Tank Levels</span>
                                    </div>
                                    <div class="ActnBtnHldr">
                                        <a href="#" class="AppBtn">Expand All</a>
                                        <a href="#" class="AppBtn Scndry">Collapse</a>
                                        <a href="#" class="Lnk WISIcn-Reset"></a>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="SldrHldr FllWdth">
                                        <div class="WaterTankLevels">
                                        <?php for ($i=0; $i < count($waterlevel_data); $i++)  {?>
         				
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt"><?php echo $waterlevel_data[$i]['meter'];?></span>
                                                    </div>
                                                    <div class="OvrvwHldr">
                                                        <div class="TankDV">
                                                            <div class="LiquidTank">
                                                                <div class="Liquid Liquidhigh l-<?php echo $waterlevel_data[$i]['filledpercent_1'];?>"></div>
                                                            </div>
                                                        </div>
                                                        <div class="TankDV">
                                                            <span class="VluType">Filled</span>
                                                            <span class="Vlu"><?php echo $waterlevel_data[$i]['filledpercent_1'];?>%</span>
                                                        </div>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Total Capacity</span>
                                                            <span class="Txt"><?php echo $waterlevel_data[$i]['capacity'];  ?> KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Current Level</span>
                                                            <span class="Txt"><?php echo $waterlevel_data[$i]['currentlevel'];  ?> KL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   

                                        <?php }?>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row NoBG ExtraPaddTop ExtraPaddBottom">
                        <div class="col-1">
                            <div class="DashboardHldr">
                                <div class="DshHdrHldr Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">Water Meter</span>
                                    </div>
                                    <div class="ActnBtnHldr">
                                        <a href="#" class="AppBtn Scndry">Collapse</a>
                                        <a href="#" class="Lnk WISIcn-Reset"></a>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="SldrHldr FllWdth">
                                        <div class="WaterMeter">
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Borewell 1 (IN)</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Todays Inflow</span>
                                                            <span class="Txt">44.6 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Yesterday Inflow</span>
                                                            <span class="Txt">21.8 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">This Month's Inflow</span>
                                                            <span class="Txt">1565.6 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Average/day</span>
                                                            <span class="Txt">50.5 KL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Borewell 2 (IN)</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Todays Inflow</span>
                                                            <span class="Txt">39.2 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Yesterday Inflow</span>
                                                            <span class="Txt">20.8 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">This Month's Inflow</span>
                                                            <span class="Txt">2120.5 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Average/day</span>
                                                            <span class="Txt">68.4 KL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Marketing Office & Garden</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Todays Inflow</span>
                                                            <span class="Txt">0.6 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Yesterday Inflow</span>
                                                            <span class="Txt">0 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">This Month's Inflow</span>
                                                            <span class="Txt">87.9 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Average/day</span>
                                                            <span class="Txt">2.84 KL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">TPI (OUT)</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Todays Inflow</span>
                                                            <span class="Txt">63 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Yesterday Inflow</span>
                                                            <span class="Txt">35 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">This Month's Inflow</span>
                                                            <span class="Txt">1860 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Average/day</span>
                                                            <span class="Txt">60 KL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">A4 Building (Out)</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Todays Inflow</span>
                                                            <span class="Txt">21 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Yesterday Inflow</span>
                                                            <span class="Txt">6 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">This Month's Inflow</span>
                                                            <span class="Txt">764 KL</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Average/day</span>
                                                            <span class="Txt">24.65 KL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">Monthly Consumption Graph Area</div>
                            </div>
                        </div>
                    </div>
                    <div class="row NoBG ExtraPaddTop ExtraPaddBottom">
                        <div class="col-1">
                            <div class="DashboardHldr">
                                <div class="DshHdrHldr Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">Phase 1 Fire Pump System</span>
                                    </div>
                                    <div class="ActnBtnHldr">
                                        <a href="#" class="AppBtn Scndry">Collapse</a>
                                        <a href="#" class="Lnk WISIcn-Reset"></a>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="FormHldr">
                                        <div class="row NoBG NoBrdr">
                                            <div class="col-1">
                                                <table class="AppGenTable VAMiddle">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="CntrAlgn">Switch Position</th>
                                                            <th class="CntrAlgn">Running Status</th>
                                                            <th>Today</th>
                                                            <th>Yesterday</th>
                                                            <th>Last Weeek</th>
                                                            <th>Monthly</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Panel Power Supply</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-On">On</span>
                                                            </td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Off">Off</span>
                                                            </td>
                                                            <td>12 hr, 6 mins</td>
                                                            <td>7 hr, 53 mins</td>
                                                            <td>13 hr, 12 mins</td>
                                                            <td>18 days, 15 hr 42 mins</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jockey Pump</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Auto">Auto</span>
                                                            </td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Off">Off</span>
                                                            </td>
                                                            <td>12 hr, 6 mins</td>
                                                            <td>7 hr, 53 mins</td>
                                                            <td>13 hr, 12 mins</td>
                                                            <td>18 days, 15 hr 42 mins</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Main Pump</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Auto">Auto</span>
                                                            </td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Off">Off</span>
                                                            </td>
                                                            <td>12 hr, 6 mins</td>
                                                            <td>7 hr, 53 mins</td>
                                                            <td>13 hr, 12 mins</td>
                                                            <td>18 days, 15 hr 42 mins</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Diesel Engine Driven Pump</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Auto">Auto</span>
                                                            </td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Off">Off</span>
                                                            </td>
                                                            <td>12 hr, 6 mins</td>
                                                            <td>7 hr, 53 mins</td>
                                                            <td>13 hr, 12 mins</td>
                                                            <td>18 days, 15 hr 42 mins</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row NoBG NoBrdr">
                                            <div class="col-3">
                                                Graph 1
                                            </div>
                                            <div class="col-3">
                                                Graph 2
                                            </div>
                                            <div class="col-3">
                                                <div class="BMSDashBlck NoMrgn">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Diesel Engine</span>
                                                    </div>
                                                    <div class="OvrvwHldr">
                                                        <div class="TankDV">
                                                            <div class="LiquidTank">
                                                                <div class="Liquid Liquidhigh l-15"></div>
                                                            </div>
                                                        </div>
                                                        <div class="TankDV">
                                                            <span class="Stts Theme1-Off">Off</span>
                                                            <span class="VluType">Filled</span>
                                                            <span class="Vlu">15%</span>
                                                        </div>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Fuel Consumption</span>
                                                            <span class="Txt">0</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Running Time</span>
                                                            <span class="Txt">00:00</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Fuel Added</span>
                                                            <span class="Txt">3 Lts</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Available Fuel</span>
                                                            <span class="Txt">25 Lts</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Fuel Removed</span>
                                                            <span class="Txt">0 Lts</span>
                                                        </div>
                                                        <div class="DtlDv">
                                                            <span class="Ttl">Battery Voltage</span>
                                                            <span class="Txt">389 Volts</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row NoBG NoBrdr">
                                            <div class="col-1">
                                                <table class="AppGenTable VAMiddle NoMrgnTop">
                                                    <thead>
                                                        <tr>
                                                            <th>Pumps</th>
                                                            <th>Pumps Capacity</th>
                                                            <th>Pressure Maintained</th>
                                                            <th>Cut in Pressure</th>
                                                            <th class="CntrAlgn">Running Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Diesel Engine Driven Pump</td>
                                                            <td>14.0CU.M/HR/2925RMP</td>
                                                            <td>9Kg/cm2</td>
                                                            <td>7Kg/cm2</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Value">9Kg/cm2</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jockey Pump</td>
                                                            <td>270CU.M/HR/2150RMP</td>
                                                            <td>9Kg/cm2</td>
                                                            <td>5Kg/cm2</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Manual">Manual</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row NoBG ExtraPaddTop ExtraPaddBottom">
                        <div class="col-1">
                            <div class="DashboardHldr">
                                <div class="DshHdrHldr Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">Hydro Pnematic System</span>
                                    </div>
                                    <div class="ActnBtnHldr">
                                        <a href="#" class="AppBtn Scndry">Collapse</a>
                                        <a href="#" class="Lnk WISIcn-Reset"></a>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="FormHldr">
                                        <div class="row NoBG NoBrdr">
                                            <div class="col-1">
                                                <table class="AppGenTable VAMiddle">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="CntrAlgn">Running Status</th>
                                                            <th>Today</th>
                                                            <th>Yesterday</th>
                                                            <th>Last Weeek</th>
                                                            <th>Monthly</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Motor-1</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-On">On</span>
                                                            </td>
                                                            <td>12 hr, 6 mins</td>
                                                            <td>7 hr, 53 mins</td>
                                                            <td>13 hr, 12 mins</td>
                                                            <td>18 days, 15 hr 42 mins</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Motor-2</td>
                                                            <td class="CntrAlgn">
                                                                <span class="SttsType Theme1-Off">Off</span>
                                                            </td>
                                                            <td>12 hr, 6 mins</td>
                                                            <td>7 hr, 53 mins</td>
                                                            <td>13 hr, 12 mins</td>
                                                            <td>18 days, 15 hr 42 mins</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row NoBG NoBrdr">
                                            <div class="col-3">
                                                <div class="BMSDashBlck NoMrgn">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Present Pressure</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Min. Threshold Pressure</span>
                                                            <span class="Txt">2.4 Kg/cm2</span>
                                                        </div>
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Max. Threshold Pressure</span>
                                                            <span class="Txt">3.4 kg/cm2</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                Graph 1
                                            </div>
                                            <div class="col-3">
                                                Graph 2
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row NoBG ExtraPaddTop ExtraPaddBottom">
                        <div class="col-1">
                            <div class="DashboardHldr">
                                <div class="DshHdrHldr Brdr">
                                    <div class="TtlHldr">
                                        <span class="TtlTxt">Borewell Running Hours</span>
                                    </div>
                                    <div class="ActnBtnHldr">
                                        <a href="#" class="AppBtn Scndry">Collapse</a>
                                        <a href="#" class="Lnk WISIcn-Reset"></a>
                                    </div>
                                </div>
                                <div class="DshDtlHldr FllPddng">
                                    <div class="SldrHldr FllWdth">
                                        <div class="BorewellRunningHours">
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Borewell 01</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Today's Running Hours</span>
                                                            <span class="Txt">10 hours 9 minutes</span>
                                                        </div>
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Yesterday Running Hours</span>
                                                            <span class="Txt">4 hours 58 minutes</span>
                                                        </div>
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Average/Day</span>
                                                            <span class="Txt">23 hours 53 minutes</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="BMSDashBlck">
                                                    <div class="TtlHldr">
                                                        <span class="TtlTxt">Borewell 02</span>
                                                    </div>
                                                    <div class="DtlsHldr">
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Today's Running Hours</span>
                                                            <span class="Txt">9 hours 35 minutes</span>
                                                        </div>
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Yesterday Running Hours</span>
                                                            <span class="Txt">4 hours 58 minutes</span>
                                                        </div>
                                                        <div class="DtlDv Fll">
                                                            <span class="Ttl">Average/Day</span>
                                                            <span class="Txt">7 hours 11 minutes</span>
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
        </div>
    </div>
</body>
</html>