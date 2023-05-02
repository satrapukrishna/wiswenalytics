<?php  
//set_time_limit(0);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Wenalytics
    </title>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/loginasset/css/loginStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/loginasset/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="icon" type="imag/x-icon" sizes="16x16" href="<?php echo base_url();?>asset/loginasset/images/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <body>
    <div class="text-center"> 
    </div>
    <div class="container" >
      <div class="row">
        <div class="left">
          <div>
            <h3>Welcome To Wenalytics Login
            </h3>
          </div>
        </div>
        <div class="right">
          <h2>Sign In
          </h2>
          <form action="<?php echo 'Login/Login/autenticate';?>" method="post">
            <div class="" id="loginalert">
            </div>
            <div class="input-Box">
              <i class="fa fa-user" aria-hidden="true">
              </i>
              <input type="text"  placeholder="Username" name="uname" id="uname" required autofocus>
              <!--<div class="mandtory-req">This field is required</div>-->
            </div>
            <div class="input-Box">
              <i class="fa fa-lock" aria-hidden="true">
              </i>
              <input type="password"  placeholder="Password" name="pwd" id="pwd" required>
              <!-- <div  class="mandtory-req">This field is required</div>-->
            </div>
            <div class="login_bottom">
              <div class="Sign-in">
                <button type="submit" class="btn btn-primary" id="nextPage">Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>  
    </div>
    <?php
//clearstatcache();
// $this->load->database();
/*
$data = $this->db->query("SELECT TOP (1000) [AutoId],[StationId] FROM [BNation123].[dbo].[2017000060_YC]")->result_array();
echo "<pre>";print_r($data);*/
?>
  </body>
  <script type="text/javascript">
    document.getElementById("nextPage").onclick = function () {
      //window.location.href = "///H:/code_base/uma_new/protech/AdminLTE-3/dashboard.html";
    };
  </script>
</html>
