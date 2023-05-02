<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview">
          <a  href="<?php echo site_url();?>Dashboard/dashboardView">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active">
              <a href="<?php echo site_url();?>AHU_demo/tomotherapy"><i class="fa fa-circle-o"></i>AHU Dashboard</a>
            </li>
            <!-- <li class="active">
              <a href="<?php //echo site_url();?>AHU/ahudata"><i class="fa fa-circle-o"></i>AHU Dashboard_Test</a>
            </li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tint"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
             <li class="active">
               <a href="<?php echo site_url();?>AHU_demo/hvacReport"><i class="fa fa-circle-o"></i>AHU Graph Report</a>
              </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>