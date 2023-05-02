<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo site_url('Admin/Home/client_dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Wenalytics Admin</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <?php if($this->session->userdata('user_id')!=1){
    
    $this->db->select('count(alert_id) as total');
        $this->db->from('alerts');
    $this->db->where('client_id',$this->session->userdata('user_id'));
    $this->db->where('alert_read',0);
    $res=$this->db->get()->row_array();
    //echo "<pre>";print_r($res);
    ?>   
      <li class="dropdown notifications-menu" style="margin-top:4px;margin-right:25px;">
            <a href="<?php echo base_url('Admin/Alerts')?>">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger"><?php echo ($res['total']==0?'':$res['total'])?></span>
            </a>
            <?php /*<ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>*/?>
          </li>
          <!-- User Account Menu -->
     <?php } ?>
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <i class="fa fa-user"></i>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span><?php echo $this->session->userdata('client_name'); ?><?php echo $this->session->userdata('employee_name'); ?><?php echo $this->session->userdata('user_name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!--<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                                <p>
        <b>Email : </b> <?php echo $this->session->userdata('email_id'); ?>
                 
                </p>
              </li>
             
      
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('Admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
     
         
        </ul>
      </div>
    </nav>
  </header>