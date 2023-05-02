<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url();?>Dashboard/dashboardView"><i class="fa fa-circle-o"></i>Dashboard View</a></li>
            <li class="active"><a href="<?php echo site_url();?>FuelReport/bolierDashboard"><i class="fa fa-circle-o"></i>Boilers Dashboard</a></li>
          </ul>
        </li>
         <li class="treeview active">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Energy Meter Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url();?>Energymeters/energymeterLoad"><i class="fa fa-circle-o"></i>Load Report</a></li>
            <li class="active"><a href="<?php echo site_url();?>Energymeters/energymeterView"><i class="fa fa-circle-o"></i>Consumption Report</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-thermometer-empty"></i> <span>Temperature Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url();?>Temperature/temperatureView"><i class="fa fa-circle-o"></i>Temperature View</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-spinner"></i> <span>Environmental Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url();?>HVACTemperature/hvacTempView"><i class="fa fa-circle-o"></i>HVAC Temperature View</a></li>
            
          </ul>
        </li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-tint"></i> <span>Fuel Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url();?>FuelReport/fuelLoadReport"><i class="fa fa-circle-o"></i>Load Report</a></li>
            <li class="active"><a href="<?php echo site_url();?>FuelReport/fuelConsumptionReport"><i class="fa fa-circle-o"></i>Consumption Report</a></li>
          </ul>
        </li>
        <!--
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-tint"></i> <span>Fuel Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url();?>FuelReport/fuelLoadReport"><i class="fa fa-circle-o"></i>Fuel Graph Report</a></li>
             <li class="active"><a href="<?php echo site_url();?>FuelReport/fuelConsumptionReport"><i class="fa fa-circle-o"></i>Fuel Consumption Report</a></li>
          </ul>
        </li>-->

        
          
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>