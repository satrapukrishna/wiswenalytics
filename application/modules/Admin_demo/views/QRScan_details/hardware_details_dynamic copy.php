<?php //print_r($client);die(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hardware Details</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/admin/images/WISIcon-W.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/admin/css/StyleSheet_qr.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/js/Script_qr.js"></script>
</head>
<body>
    <div class="QRDtls-Header">
        <div class="LogoHdlr">
            <img src="<?php echo base_url(); ?>asset/admin/images/Blank.png" class="LogoImg" />
        </div>
        <div class="BrdCrmbHldr">
            <ul class="BrdCrmbLst">
                <li>
                    <span class="SrvcNme"><?php echo $catogory_name; ?></span>
                </li>
                <li>
                    <span class="DviceNme"><?php echo $device_name; ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="QRDtls-DvcDtlsHldr BseDtls">
        <div class="QRDtls-DvcDtlsSctn">
            <span class="SctnTtl">Device Name</span>
            <span class="SctnDtl"><?php echo $device_name; ?></span>
        </div>
        <div class="QRDtls-DvcDtlsSctn">
            <span class="SctnTtl">Serial No.</span>
            <span class="SctnDtl"><?php echo $hardware['factory_sr_no']; ?></span>
        </div>
    </div>
    <div class="QRDtls-DvcDtlsHldr ClntDtls">
        <div class="QRDtls-DvcDtlsSctn BB BR">
            <span class="SctnTtl">Client</span>
            <span class="SctnDtl"><?php echo $client['client_name']; ?></span>
            <!-- <span class="SctnDtlSb"><?php //echo $client['address']; ?></span> -->
        </div>
        <div class="QRDtls-DvcDtlsSctn BB">
            <span class="SctnTtl">Installed by</span>
            <span class="SctnDtl"><?php echo $hardware['installed_by']; ?></span>
            <span class="SctnDtlSb"><?php if($hardware['status']==1){ echo "Active";}else{ echo "Inactive";} ?></span>
        </div>
        <div class="QRDtls-DvcDtlsSctn BR">
            <span class="SctnTtl">Installed on</span>
            <span class="SctnDtl"><?php echo $hardware['date_of_installation']; ?></span>
            <span class="SctnDtlSb"><?php 
            $now = time(); 
$your_date = strtotime($hardware['date_of_installation']);
$datediff = $now - $your_date;

echo round($datediff / (60 * 60 * 24));
 ?> Days</span>
        </div>
        <div class="QRDtls-DvcDtlsSctn">
            <span class="SctnTtl">AMC</span>
            <span class="SctnDtl">Yes</span>
            <span class="SctnDtlSb">Expires on 08/02/2022</span>
        </div>
    </div>
    <div class="QRDtls-Tabs">
        <div class="tabs-menu">
            <div id="tab-1" class="tabs-menu-item active">
                <img src="<?php echo base_url(); ?>asset/admin/images/Blank.png" class="TabTtlImg Dcmnts" />
                <span class="TabTtl">Documents</span>
                <span class="TabTtlSb">3 Files</span>
            </div>
            <div id="tab-2" class="tabs-menu-item">
                <img src="<?php echo base_url(); ?>asset/admin/images/Blank.png" class="TabTtlImg Snsrs" />
                <span class="TabTtl">Sensors</span>
                <span class="TabTtlSb">1 Hardware</span>
            </div>
            <div id="tab-3" class="tabs-menu-item">
                <img src="<?php echo base_url(); ?>asset/admin/images/Blank.png" class="TabTtlImg Issus" />
                <span class="TabTtl">Issues</span>
                <span class="TabTtlSb">0</span>
            </div>
        </div>
        <div class="tabs">
            <div class="tab tab-1 current">
                <div class="DtlsSctnldr Dcmnts">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Hardware Document</span>
                        <span class="TtlSbTxt">uploaded on 02/08/2020</span>
                    </div>
                    <div class="LnkDtls">
                        <a href="#" class="LnkBtn PDF"></a>
                    </div>
                </div>
                <div class="DtlsSctnldr Dcmnts">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Installation Document</span>
                        <span class="TtlSbTxt">uploaded on 02/08/2020</span>
                    </div>
                    <div class="LnkDtls">
                        <a href="#" class="LnkBtn PDF"></a>
                    </div>
                </div>
                <div class="DtlsSctnldr Dcmnts">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Warranty Document</span>
                        <span class="TtlSbTxt">uploaded on 02/08/2020</span>
                    </div>
                    <div class="LnkDtls">
                        <a href="#" class="LnkBtn PDF"></a>
                    </div>
                </div>
            </div>
            <div class="tab tab-2">
                <div class="DtlsSctnldr Snsrs">
                    <div class="TxtDtls">
                        <span class="TtlTxt"><?php echo $device_name; ?></span>
                        <span class="TtlSbTxt"><?php echo $hardware['dashboard_name']; ?></span>
                    </div>
                </div>
                <!-- <div class="DtlsSctnldr Snsrs">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Supply Water Temperature Sensor</span>
                        <span class="TtlSbTxt">APO22T2</span>
                    </div>
                </div>
                <div class="DtlsSctnldr Snsrs">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Supply Air Temperature Sensor</span>
                        <span class="TtlSbTxt">APO22T3</span>
                    </div>
                </div>
                <div class="DtlsSctnldr Snsrs">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Supply Air Temperature Sensor</span>
                        <span class="TtlSbTxt">APO22T3</span>
                    </div>
                    <div class="LnkDtls">
                        <a href="#" class="LnkBtn Srvc"></a>
                    </div>
                    <div class="InnrDtlsDv">
                        <span class="DtlsTxt Paid">Wire Replaced on 21/03/2021</span>
                    </div>
                </div> -->
            </div>
            <div class="tab tab-3">
                <!-- <span class="TxtTtlHldr">Active</span>
                <div class="DtlsSctnldr Issus">
                    <div class="TxtDtls">
                        <span class="TtlTxt">No Data from Device</span>
                        <span class="TtlSbTxt">Internal</span>
                    </div>
                    <div class="InnrDtlsDv">
                        <span class="DtlsTxt">Authorised by: Rajesh</span>
                    </div>
                </div>
                <span class="TxtTtlHldr">Inactive</span>
                <div class="DtlsSctnldr Issus">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Return Air Temperature not reading</span>
                        <span class="TtlSbTxt">Client</span>
                    </div>
                    <div class="InnrDtlsDv">
                        <span class="DtlsTxt">Sensor Replaced: 05/05/2021</span>
                        <span class="DtlsTxt">Authorised by: Rajesh</span>
                        <span class="DtlsTxt">Turn Around Time: 5 Days</span>
                    </div>
                </div>
                <div class="DtlsSctnldr Issus">
                    <div class="TxtDtls">
                        <span class="TtlTxt">Cooling Complaint</span>
                        <span class="TtlSbTxt">Client</span>
                    </div>
                    <div class="InnrDtlsDv">
                        <span class="DtlsTxt">Sensor Replaced: 05/05/2021</span>
                        <span class="DtlsTxt Paid">Authorised by: Rajesh</span>
                        <span class="DtlsTxt">Turn Around Time: 5 Days</span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>
</html>
