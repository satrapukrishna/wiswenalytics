<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    
	
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');	?> <a href="#">Wenalytics</a>.</strong> All rights reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript">

    var BASE_URL = '<?php echo base_url(); ?>';

    var BASE_PATH = '<?php echo config_item('root_dir'); ?>';

</script>
<script src="<?php echo base_url(); ?>asset/admin/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>asset/admin/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/admin/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
	 

<script src="<?php echo base_url(); ?>asset/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/js/select2.full.min.js"></script>
<script>

  
  var page = $("#page").val();

   $("#"+page).addClass('active');
</script>