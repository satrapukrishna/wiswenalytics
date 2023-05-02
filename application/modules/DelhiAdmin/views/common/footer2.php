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
<script src="<?php echo base_url(); ?>asset/admin/js/jquery-3.3.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>asset/admin/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/js/scripts.js"></script>
<script>

  
  var page = $("#page").val();

   $("#"+page).addClass('active');
</script>