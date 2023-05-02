<?php 

$login = $this->session->userdata('login');
if($login){

}else{
  redirect(base_url().'Login');
 
}
$clientName = $this->session->userdata('ClientName');
$short = explode(" ", $clientName);
$ShortName = array();$i=0;
foreach ($short as $value) {
  $name = substr($value,0,1);
  $ShortName[$i] = $name;
  $i++;
}

$stVar = $this->session->userdata('Table');
$stationIdVar = explode("_", $stVar);

$stationIdspan = str_replace("[","",$stationIdVar[0]);




/*
echo $clientName;
if(($clientName)){
  echo "session unset";die();
  $this->load->view('login');
}*/
?>
<header class="main-header">

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"> AP</span> 

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> Apollo</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">

         <!--  <li class="dropdown messages-menu">
            <label>Store Name</label> : <span><?php echo $this->session->userdata('BrancheName');?></span>
          </li> -->
          <li class="dropdown messages-menu">
            <label>Station Id</label> : <span><?php echo $stationIdspan;?></span>
          </li>
          <li class="dropdown messages-menu">
            <label>Station Code</label> : <span><?php echo $this->session->userdata('StationCode');?></span>
          </li>
          <!-- alert's start here -->
         <!--  <li class="dropdown notifications-menu">
            <a href="<?php echo site_url();?>TemperatureAlerts/TemperatureAlert/tempAlert">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
          </li> -->
          <!-- alert's end here -->
          <!-- User Account: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->session->userdata('ProfileName'); ?></span>
            </a>
             <ul class="dropdown-menu">
              <li><i class="fa fa-user" aria-hidden="true"></i>Profile</li>
              <li><i class="fa fa-cog" aria-hidden="true"></i>Settings</li>
              <li><i class="fa fa-sign-out" aria-hidden="true"><a href="../Login/logout"> Log Out</a></i></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>