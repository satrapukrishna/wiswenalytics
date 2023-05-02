<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('common/header') ?>
  
  <?php $this->load->view('common/left_menu') ?>

   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">



			<div class="panel panel-default">


                        

                        <div class="panel-heading"> 


                            <h3 class="panel-title">Alert Notifications</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">
			<div class="col-md-12">
				  <div class="box box-primary">
					<div class="box-header with-border">
					  <br/>

					  <div class="box-tools" style="width:250px">
						
						<form role="form" class="form-horizontal" action="" method="get">
						<input type="text" name="search_keyword" id="search_keyword" class="form-control pull-right col-md-6 input-sm" placeholder="Search " value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off" style="float:left"/>
						<button type="submit" class="btn btn-success pull-right" style="position:absolute;right:0px;"><span class="glyphicon glyphicon-search"></span> <span class="`form-control-feedback"></span> </button> 
						</form>
						 
						
					  </div>
					  <!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
					  
					  <div class="table-responsive mailbox-messages">
						<table class="table table-hover">
						  <tbody>
						  <?php
							if (!empty($alerts)) {
							$i=1;
							foreach ($alerts as $row) {  
							if($row->alert_read==0){?>
								<tr style="background-color:#cccccc;border-top:#fff 2px solid">
							<?php }else{?>
								<tr style="background-color:#fff">
							<?php } ?>	
							
							<td class="mailbox-star"><i class="fa fa-bell-o text-yellow"></i></td>
							<td class="mailbox-name"><a href="<?php echo site_url('Admin/Alerts/alert_detail/' . $row->alert_id) ?>"><?php echo $row->device_name?></a></td>
							<td class="mailbox-subject"><a href="<?php echo site_url('Admin/Alerts/alert_detail/' . $row->alert_id) ?>"><b><?php echo $row->alert_name?></b> - <?php echo substr($row->alert_message, 0, 100);?> ...
							</a></td>
							<td class="mailbox-attachment"></td>
							<td class="mailbox-date"><?php echo date("d M. Y h:i A",strtotime($row->created_date))?></td>
						  </tr>
							<?php } } ?> 
						  </tbody>
						</table>
						<!-- /.table -->
						
						
					  </div>
					  <!-- /.mail-box-messages -->
					  <div class="row text-center text-center-xs"><?php echo $pagination; ?></div>
					</div>
					
				</div>


                  
					


                </section>
    <!-- /.content -->
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.btn-xs{padding:4px}
th{font-size: 14px;}
td.hover{background:#fff}
</style>

</body>
</html>
