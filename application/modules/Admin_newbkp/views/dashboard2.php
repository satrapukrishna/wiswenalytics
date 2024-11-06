<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/dashboard.css">
</head>

<body class="hold-transition skin-blue" >
<div class="wrapper">

  <?php $this->load->view('common/header') ?>
  
  <?php $this->load->view('common/left_menu') ?>

   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	 <input type="hidden" id="page" value="dashboard" />
      <h1>
        <?php 
		if($this->session->userdata('role')=='admins'){
			
				echo "Client Dashboard"; 
			}elseif($this->session->userdata('role')=='superadmin'){
				echo " Super Admin Dashboard "; 
			}else{
			echo "Employee Dashboard";
		}?>  
		
        <small>...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
	  
	  
    </section>
	<br/>
    <!-- Main content -->
    

	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>

</body>
</html>
