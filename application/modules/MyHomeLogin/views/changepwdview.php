<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Change Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <link rel="shortcut icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
      td
      {
        padding-top: 6px;
        padding-bottom: 6px;
      }
      .error-msg{
         /*background-color: Red;*/
        font-size: 14px;
        color: Red;
      }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
      var validateEmp="";
      $(document).ready(function () {
        $("#txtPassword").focus();
      });

      function ClientValidate()
      {
        var password1 = $("#txtPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        var errNewpwd = $("#erromsgNewpwd");
        var errCnfNewpwd = $("#errormsg-cnfNewpwd");
        if (password1 =="")
        {
          errNewpwd.html("Please Enter password");
          errNewpwd.addClass('error-msg');
          $("#txtPassword").focus();
          return 0;
        }
        else if (confirmPassword =="")
        {
          // var errNewpwd1 = $("#erromsgNewpwd").text();
          // alert(errNewpwd1);
          // document.getElementById('erromsgNewpwd').value = '';
          $("#erromsgNewpwd").html('');
          errCnfNewpwd.html("Please Enter Confirm password");
          errCnfNewpwd.addClass('error-msg');
          
          $("#txtConfirmPassword").focus();
          return 0;
        }
        else if(password1 != confirmPassword) 
        {
          $("#erromsgNewpwd").html('');
          errCnfNewpwd.html("Passwords do not match");
          errCnfNewpwd.addClass('error-msg');
            
          $("#txtConfirmPassword").focus();
          return 0;
        }
        else
        { 
          $("#errormsg-cnfNewpwd").html('');
          return 1;
        }
      }
      
      $(function () {
        $("#btnSubmit").click(function () 
        {
          validateEmp=ClientValidate();
          // alert(validateEmp);
          var password2 = $("#txtPassword").val();
          if(validateEmp==1)
          {
            // alert("welcome ");
            var urlString = "<?php echo base_url();  ?>MyHomeLogin/Updatepwd";
            $.ajax({
              url:urlString,
              type : 'GET',
              async: true,
              data: {newpwd:password2},
              success: function(data){
                console.log("success"+data);
                // displayDomesticData(data);
              }
            });
            
            // var urlString = "<?php echo base_url();  ?>MyVihanga/getMyhomeData";
            // $.ajax({
            //     url:urlString,
            //     type : 'GET',
            //     async: true,
            //     data: {newpwd:password2},
            //     success: function(data){
            //       console.log("success"+data);
            //       // displayDomesticData(data);
            //     }
            //   });
          }
          else
          {
            // alert("all fields not filled");
            // errCnfNewpwd.html("Passwords do  match");
            
          }
            // return true;
        });
      });

      // function viewPassword()
      // {
      //   alert("hello");
      //   // $("#txtPassword").show();
      //     // setTimeout(function()
      //     // {
      //     //   $("txtPassword").hide();
      //     // },5000);
      // }
      // function viewCnfPassword()
      // {
      //   alert("cnfpassword");
      // }

      $(".toggle-password").click(function() 
      {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if(input.attr("type") == "password") 
        {
          input.attr("type", "text");
        } 
        else 
        {
          input.attr("type", "password");
        }
      });
   
    </script>

    <style type="text/css">
      .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
      }

      .container{
        padding-top:50px;
        margin: auto;
      }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">

   <?php $this->load->view('header');?>
   <?php $this->load->view('navigation');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row water-tank">
        <h1>Change Password</h1>
      </div><br>
     
      <div>
        <b>New Password:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

        <input type="password" name="txtPassword" id="txtPassword" />
          <a><i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i></a>
          <span id="erromsgNewpwd"></span><br><br>
        <b>Confirm New Password:</b>&nbsp&nbsp&nbsp&nbsp

        <input type="password" name="txtConfirmPassword" id="txtConfirmPassword"/>
          <i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewCnfPassword()"></i>
        <span id="errormsg-cnfNewpwd"></span><br><br>

        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="Submit"  id="btnSubmit" value="Update"/>
        
      </div>
      
     
    </section>

   
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018<a href="">Wenalytics.in</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery/dist/jquery.min.js">
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/chart/Chart.js">
    </script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/fastclick/lib/fastclick.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/adminlte.min.js">
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/demo.js">
    </script>
    <!-- FLOT CHARTS -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.js">
    </script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.resize.js">
    </script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.pie.js">
    </script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.categories.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- page script -->
<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/waterTank.js"></script>
<script type="text/javascript">
// $(document).ready(function() {

  
// });

// window.onload = function() {
//     //animateSequence();
//     //animateRandom();
//     fetchMyhomeData();

</script>
</body>
</html>
