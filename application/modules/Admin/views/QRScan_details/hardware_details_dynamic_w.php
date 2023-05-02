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
            <span class="SctnTtl">Hardware Name</span>
            <span class="SctnDtl"><?php echo $hardware['dashboard_name']; ?></span>
        </div>
    </div>
    <div class="QRDtls-DvcDtlsHldr ClntDtls">
        <div class="QRDtls-DvcDtlsSctn BB BR">
            <span class="SctnTtl">Client</span>
            <span class="SctnDtl"><?php echo $client['client_name']; ?></span>
            <!-- <span class="SctnDtlSb"><?php //echo $client['address']; ?></span> -->
        </div>
        
        <div class="QRDtls-DvcDtlsSctn BR">
            <span class="SctnTtl">Installed on</span>
            <span class="SctnDtl"><?php echo $hardware['date_of_installation']; ?></span>
            
        </div>
        
    </div>
    <div class="QRDtls-DvcDtlsHldr ClntDtls">
        <div class="QRDtls-DvcDtlsSctn BB BR">
            <span class="SctnTtl">Tank Height</span>
            <span class="SctnDtl"><?php echo $hardware['tank_height']; ?></span>
            
        </div>
        
        <div class="QRDtls-DvcDtlsSctn BR">
            <span class="SctnTtl">Tank Width</span>
            <span class="SctnDtl"><?php echo $hardware['tank_width']; ?></span>
            
        </div>
        
        
    </div>
    <div class="QRDtls-DvcDtlsHldr ClntDtls">
        <div class="QRDtls-DvcDtlsSctn BB BR">
            <span class="SctnTtl">Tank Breadth</span>
            <span class="SctnDtl"><?php echo "0"; ?></span>
            
        </div>
        
        <div class="QRDtls-DvcDtlsSctn">
            <span class="SctnTtl">AMC</span>
            <span class="SctnDtl">Yes</span>
            <span class="SctnDtlSb">Expires on 08/02/2022</span>
        </div>
        
        
    </div>
    <div class="QRDtls-DvcDtlsHldr ClntDtls">
        <div class="QRDtls-DvcDtlsSctn BB BR">
            <span class="SctnTtl">Tank Volume</span>
            <span class="SctnDtl"><?php echo $hardware['capacity']; ?>Liters</span>
            
        </div>
        <div class="QRDtls-DvcDtlsSctn BR">
            <span class="SctnTtl">Installed By</span>
            <span class="SctnDtl"><?php echo $hardware['installed_by']; ?></span>
            
        </div>
    
        
    </div>
    
</body>
</html>
