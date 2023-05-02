<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/spinfocityasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/spinfocityasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/spinfocityasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Login Page - Starts */

            div.LoginBg {
                position: fixed;
                width: 100%;
                height: 100%;
                background: transparent url(../asset/loginasset/images/LoginBG.jpg) no-repeat center center;
                background-size: cover;
                z-index: 1;
            }

            div.LoginLftDvdr {
                position: fixed;
                width: 10px;
                height: 100%;
                background: linear-gradient(180deg, #1F97DD 0%, #0078BA 100%);
                left: 0;
                top: 0;
                z-index: 3;
            }

            div.LoginBxHldr {
                position: fixed;
                right: 0;
                top: 0;
                width: 25%;
                height: 100%;
                background: linear-gradient(127.23deg, rgba(60, 141, 188, 0.94) 0%, rgba(42, 126, 175, 0.94) 71.59%);
                box-shadow: -10px 0px 50px rgba(0, 0, 0, 0.12);
                border-radius: 20px 0px 0px 20px;
                z-index: 3;
            }

                div.LoginBxHldr div.ClntLogoHldr {
                    position: relative;
                    margin-top: 15%;
                    left: -40px;
                    width: calc(100% + 40px);
                    background: #FFFFFF;
                    padding: 40px 40px 40px 80px;
                    box-sizing: border-box;
                    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.12);
                    border-radius: 20px 0px 0px 20px;
                }

                div.LoginBxHldr div.LoginBox {
                    padding: 20px 40px;
                }

                    div.LoginBxHldr div.LoginBox span.TtlBx {
                        display: block;
                        font: 700 31px/100% 'Open Sans';
                        color: #fff;
                        padding: 0 0 14px 0;
                        border-bottom: 1px solid rgba(249, 249, 249, 0.2);
                    }

                    div.LoginBxHldr div.LoginBox span.SbTtlBx {
                        display: block;
                        font: 600 14px/100% 'Open Sans';
                        color: #fff;
                        padding: 15px 0 30px 0;
                    }

                    div.LoginBxHldr div.LoginBox span.FormTxt {
                        display: block;
                        font: 400 13px/100% 'Open Sans';
                        color: #fff;
                        padding-left: 14px;
                        padding-bottom: 10px;
                    }

                    div.LoginBxHldr div.LoginBox .form-control {
                        border: none;
                        font: 400 13px/100% 'Open Sans';
                        color: #555;
                        padding-top: 20px;
                        padding-bottom: 20px;
                        margin-bottom: 20px;
                    }

                    div.LoginBxHldr div.LoginBox .btn-primary {
                        margin-top: 10px;
                        border: 0;
                        background: #222D31;
                        background-size: 10px;
                        color: #fff;
                        font: 400 15px/100% 'Open Sans';
                        padding: 15px 40px 15px 20px;
                    }

                    div.LoginBxHldr div.LoginBox a.LgnLnkTxt {
                        display: block;
                        font: 400 13px/100% 'Open Sans';
                        color: #fff;
                        padding: 10px 0;
                        margin-top: 10px;
                        text-decoration: underline;
                    }

            /* Login Page - Ends */
    </style>
</head>
<body>
<div class="LoginBxHldr">
        <div class="ClntLogoHldr">
            <img src="<?php echo base_url(); ?>asset/loginasset/images/Rainbow-Logo.png" class="ClntLogo" />
        </div>
        <?php echo validation_errors(); ?>
					<?php if(isset($errmsg)) echo '<p class="alert alert-danger">'.$errmsg.'</p>'; ?>
        <form action="<?php echo base_url('Admin/rainbow_emp_login_user'); ?>" method="post">
        <div class="LoginBox">
            <span class="TtlBx">Welcome</span>
            <span class="SbTtlBx">Please login with your credentials.</span>
            <div class="mb-3 row">
                <span class="FormTxt">Username</span>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="uname" id="uname"  placeholder="Enter Username or Email ID" required autofocus />
                </div>
            </div>
            <div class="mb-3 row">
                <span class="FormTxt">Password</span>
                <div class="col-sm-12">
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" required/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- <a href="#" class="LgnLnkTxt">Forgot Password?</a> -->
        </div>
        </form>
    </div>
    <div class="LoginBg"></div>
    <div class="LoginLftDvdr"></div>
</body>
<!-- jQuery library -->
<style>

						.nav-tabs{border-bottom-color: #FFE;}
						.nav-tabs>li.lnk>span{border-bottom: 2px solid #FFF;}
						.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {border:none;border-bottom:none;border-bottom: 2px solid #367fa8;color:#367fa8;text-align:center;font: 400 14px 'Open Sans';}
						.nav-tabs>li>a{font: 400 14px 'Open Sans';text-align:center}
						</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>