 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">.</li>
        <!-- Optionally, you can add icons to the links -->
		<li class="treeview" id="dashboard">
          <a href="<?php echo site_url('Admin/Home'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
		  <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Admin/Home'); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Manage Settings</a></li>
           
          </ul>
        </li>
        
        <?php if($this->session->userdata('role')=='admins'){
			 if($this->session->userdata('user_id')==1){?>
		
        <li class="treeview" id="clients">
          <a href="<?php echo site_url('Admin/Clients'); ?>"><i class="fa fa-users"></i> <span>Clients  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Admin/Clients'); ?>"><i class="fa fa-circle-o"></i> Manage Clients</a></li>
			<li><a href="<?php echo site_url('Admin/Clients/create_client'); ?>"><i class="fa fa-circle-o"></i> Add Client</a></li>
			
          </ul>
        </li>
		<?php } }?>
		<?php if($this->session->userdata('role')!='employee'){?>
		<li class="treeview" id="employees">
          <a href="<?php echo site_url('Admin/Employees'); ?>"><i class="fa fa-user"></i> <span>Employees  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Admin/Employees'); ?>"><i class="fa fa-circle-o"></i> Manage Employees</a></li>
			<li><a href="<?php echo site_url('Admin/Employees/create_employee'); ?>"><i class="fa fa-circle-o"></i> Add Employee</a></li>
			
          </ul>
        </li>
		<?php } ?>
		<li class="treeview" id="alerts">
          <a href="#"><i class="fa fa-cloud-download"></i> <span>Alerts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
		<li class="treeview" id="accounts">
          <a href="<?php echo site_url('Admin/Accounts'); ?>"><i class="glyphicon glyphicon-list-alt"></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Admin/Accounts'); ?>"><i class="fa fa-circle-o"></i> Manage Accounts</a></li>
			<li><a href="<?php echo site_url('Admin/Accounts/create_account'); ?>"><i class="fa fa-circle-o"></i> Add Account</a></li>
			
          </ul>
         
        </li>
		<?php /*<li class="treeview" id="billing">
          <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span>Billing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>*/ ?>
		<li class="treeview" id="partners">
          <a href="<?php echo site_url('Admin/Partners'); ?>"><i class="fa fa-user-plus"></i> <span>Partners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Admin/Partners'); ?>"><i class="fa fa-circle-o"></i> Manage Partners</a></li>
			<li><a href="<?php echo site_url('Admin/Partners/create_partner'); ?>"><i class="fa fa-circle-o"></i> Add Partner</a></li>
			
          </ul>
         
        </li>
		<li class="treeview" id="hardware">
          <a href="#"><i class="fa fa-cubes"></i> <span>Hardware</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
		<li class="treeview">
          <a href="#"><i class="fa fa-power-off"></i> <span>Logout </span>
           
          </a>
          
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
       