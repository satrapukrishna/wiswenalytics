<div id="DshbrdLft" class="DshBrdLnk">
    <div class="BrndHldr">
        <span class="BrndNm">PRK Hospitals</span>
    </div>
    <div class="DshBrdLnkCntr">
        <ul class="LnkHldr FrstLvl">
            <li >
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