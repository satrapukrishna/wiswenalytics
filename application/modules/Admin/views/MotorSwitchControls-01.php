<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Switch Controls</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>aaset/PPM-Mobile-Final/Images/Blank.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/PPM-Mobile-Final/CSS/StyleSheet1.css" />
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <style>
        .loader {
    position: fixed;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: rgba(0,0,0,0.8) url(../../asset/admin/images/ajax-loader.gif) no-repeat center center;
	z-index: 9999;
}
    </style>
</head>

<body>

    <div class="AppHldr">
        <div class="AppHdrDv">
            <div class="HdrCntntList">
                <div class="SctnDtlsHldr">
                    
                </div>
                <div class="UsrDtlsHldr">
                    <div class="DtlDv">
                        <span class="UsrNme">Hyderabad Central University</span>
                        <span class="UsrID">Hyderabad</span>
                    </div>
                </div>
                <div class="UsrDtlsHldr SctnDtlsHldr">
                    
                </div>
            </div>
        </div>
        <div class="AppCntntDv">
            <div class="InnrHdrHldr">
                <div class="DtSlctnDv">
                    <div class="SctnNameDv">
                        <span class="SctnName Icn MSCIcn">Motor Switch Controls</span>
                    </div>
                </div>
            </div>
            <div class="CntntHldr" id="device" name="device">
            <div class="loader" id="loader" style="display:visible"></div>
            </div>
        </div>
        <div class="AppFtrDv">
            WIS Spaces
        </div>
    </div>
</body>
<script>
    $.ajax({
        type: 'GET',
        
        url: '<?php echo base_url(); ?>Admin/SwitchStatus/hcug_ajax1/',
        success: function (data){
            $('#loader').hide();
            $("#device").html(data);
            $("#device").trigger("chosen:updated");
        }
    });	
</script>
</html>