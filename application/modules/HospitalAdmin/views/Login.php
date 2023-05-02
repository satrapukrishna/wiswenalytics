<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
    <div class="LoginBxHldr">
        <div class="ClntLogoHldr">
            <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientLogo-Big.png" class="ClntLogo" />
        </div>
        <div class="LoginBox">
            <span class="TtlBx">Welcome</span>
            <span class="SbTtlBx">Please login with your credentials.</span>
            <div class="mb-3 row">
                <span class="FormTxt">Username</span>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="staticEmail" value="Enter Username or Email ID" />
                </div>
            </div>
            <div class="mb-3 row">
                <span class="FormTxt">Password</span>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword" value="Password" />
                </div>
            </div>
            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin/dashboard'"class="btn btn-primary">Submit</button>
            <a href="#" class="LgnLnkTxt">Forgot Password?</a>
        </div>
    </div>
    <div class="LoginBg"></div>
    <div class="LoginLftDvdr"></div>
</body>
</html>
