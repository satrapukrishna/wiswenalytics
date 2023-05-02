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
  


    
</head>
<body>
    <div class="LoginBgHldr">
        <div class="LoginHldr">
            <div class="LoginTtlHldr">
                <span class="LoginTtlNm">SWorks Demo</span><span class="LoginTtlNmee"></span>
            </div>
            
            <div class="LoginBx tabs">
               <!--  <ul class="nav nav-tabs tab-group LoginType">
                  <li class="Lnk active"><a data-toggle="tab" href="#client"><b>Client</b></a></li>
                  <li class="Lnk"><a data-toggle="tab" href="#employee"><b>Employee11</b></a></li>
                 
                </ul> -->

                <div class="tab-content">
                  <div id="client" class="tab-pane fade in active">
                  
                    <?php echo validation_errors(); ?>
                    <?php if(isset($errmsg)) echo '<p class="alert alert-danger">'.$errmsg.'</p>'; ?>
                    
                    <form action="<?php echo 'Login/autenticatewashrm';?>" method="post">
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
                        <!--  <li>
                            <span class="FrgtPssd">Super Admin Login?<a href="<?php echo site_url('SuperAdmin')?>" class="Lnk"> Click</a></span>
                        </li>  -->
                    </ul>
                </form>
                    
                  </div>
                  <div id="employee" class="tab-pane fade">
                    <?php echo validation_errors(); ?>
                    <?php if(isset($errmsg)) echo '<p class="alert alert-danger">'.$errmsg.'</p>'; ?>
                    
                    <form action="<?php echo 'Login/Login/autenticatewashrm';?>" method="post">
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
                       <li>
                            <span class="FrgtPssd">Client / Employee Login?<a href="<?php echo site_url('Admin')?>" class="Lnk"> Click</a></span>
                        </li> 
                    </ul>
                </form>
                  </div>
                 
                </div>
            </div>

           
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