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
  


    <!-- <style type="text/css">
        div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNm1, div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNmee1 {
                display: block;
                color: #fff;
                font: 800 18px 'Open Sans';
                text-align: center;
                text-transform: uppercase;
            }

            div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNm1 {
                font: 800 50px 'Open Sans';
                padding-top: 130px;
            }
             div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNmee1 {
                font: 600 18px/0% 'Open Sans';
            }
            div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNm1, div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNmee1 {
            display: inline-block;
            vertical-align: top;
            padding: 20px 0;
            font: 800 20px 'Open Sans';
        }
        div.LoginBgHldr div.LoginHldr div.LoginTtlHldr span.LoginTtlNmee1 {
                padding-left: 5px;
            }
    </style> -->
</head>
<body>
    <div class="LoginBgHldr">
        <div class="LoginHldr">
            <div class="LoginTtlHldr">
                <span class="LoginTtlNm">Admin</span><span class="LoginTtlNmee"></span>
            </div>
			
			<div class="LoginBx tabs">
				<ul class="nav nav-tabs tab-group LoginType">
				  <li class="Lnk active"><a data-toggle="tab" href="#client"><b>Client</b></a></li>
				  <li class="Lnk"><a data-toggle="tab" href="#employee"><b>Employee</b></a></li>
				 
				</ul>

				<div class="tab-content">
				  <div id="client" class="tab-pane fade in active">
				  
					<?php echo validation_errors(); ?>
					<?php if(isset($errmsg)) echo '<p class="alert alert-danger">'.$errmsg.'</p>'; ?>
					
					<form action="<?php echo base_url('Admin/login_user'); ?>" method="post">
                    <ul class="LoginFlds">
                        <li>
                            <input type="text" placeholder="Username" name="uname" id="uname"  class="Inpt" required autofocus />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="pwd" id="pwd" class="Inpt" required/>
                        </li>
                        <li>
                            <button type="submit" class="InptBtn" id="nextPage">Login</button>
                            <!-- <input type="button" class="InptBtn" id="nextPage" value="Login" /> -->
                        </li>
                        <!-- <li>
                            <span class="FrgtPssd">Forgot Password?<a href="" class="Lnk">Request for password change</a></span>
                        </li> -->
                    </ul>
                </form>
					
				  </div>
				  <div id="employee" class="tab-pane fade">
					<?php echo validation_errors(); ?>
					<?php if(isset($errmsg)) echo '<p class="alert alert-danger">'.$errmsg.'</p>'; ?>
					
					<form action="<?php echo base_url('Admin/employee_login_user'); ?>" method="post">
                    <ul class="LoginFlds">
                        <li>
                            <input type="text" placeholder="Username" name="uname" id="uname"  class="Inpt" required autofocus />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="pwd" id="pwd" class="Inpt" required/>
                        </li>
                        <li>
                            <button type="submit" class="InptBtn" id="nextPage">Login</button>
                            <!-- <input type="button" class="InptBtn" id="nextPage" value="Login" /> -->
                        </li>
                        <!-- <li>
                            <span class="FrgtPssd">Forgot Password?<a href="" class="Lnk">Request for password change</a></span>
                        </li> -->
                    </ul>
                </form>
				  </div>
				 
				</div>
			</div>

            <?php /*<div class="LoginBx tabs">
                <ul class="tab-group LoginType">
                    <li>
                        <span class="Lnk Actv">Client</span>
                    </li>
                   <li>
                        <span class="Lnk">Employee</span>
                    </li>
                </ul>
				
                <form action="<?php echo base_url('admin/login/login_user'); ?>" method="post">
                    <ul class="LoginFlds">
                        <li>
                            <input type="text" placeholder="Username" name="uname" id="uname"  class="Inpt" required autofocus />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="pwd" id="pwd" class="Inpt" required/>
                        </li>
                        <li>
                            <button type="submit" class="InptBtn" id="nextPage">Login</button>
                            <!-- <input type="button" class="InptBtn" id="nextPage" value="Login" /> -->
                        </li>
                        <!-- <li>
                            <span class="FrgtPssd">Forgot Password?<a href="" class="Lnk">Request for password change</a></span>
                        </li> -->
                    </ul>
                </form>
            </div>*/ ?>
        </div>
    </div>
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