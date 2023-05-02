<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanitation - Washroom</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Snttn">Sanitation</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                   <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom" class="LnkTxt Wshrm Icn">Washroom</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_WasteManagement" class="LnkTxt WstMngmnt Icn Actv">Waste Management</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_PestControl" class="LnkTxt PstCntrl Icn">Pest Control</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_FacadeCleaning" class="LnkTxt FcdeClnng Icn">Facade Cleaning</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="BrdCrmLnk">All Sanitations</a>
                        </li>
                        <li>
                            <span class="PgTtl">Waste Management</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                
            </div>
        </div>
    </div>
</body>
</html>
