<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <style>
 input[type="checkbox"][readonly] {
  pointer-events: none;
}
  </style>
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


                        <input type="hidden" id="page" value="clients"/>


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Add Client >> Permissions</h3>

							
                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">
							 <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>    
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>
										
							<div class="col-md-12">
							  <div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
								  <h3 class="box-title">Software Configuration</h3>

								  <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
									</button>
								  </div>
								  <!-- /.box-tools -->
								</div>
								<!-- /.box-header -->
								<div class="box-body" style="display: none;">
								  <div class="col-md-12">
											
									<?php if($permissions->num_rows()>0){ $count = $permissions->num_rows(); $rows = floor($count/4);$i=0; ?>
											<table class="table">
												<?php /*<th><input type="checkbox" name="checked_all" id="checked_all" /></th><th>All</th>*/?>
												<?php foreach($permissions->result() as $row){ ++$i;  ?>
													<?php if($i==1){   ?>
														<tr>
														<?php } ?>
														<td><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" <?php echo ($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))) ? ' checked="checked"' : '' ?> name="permissions[]" readonly /></td>
														<td><?php echo $row->description; ?></td>
														<?php if($i==4){ $i = 0; ?>
														</tr>
													<?php } ?>
												<?php } ?>
											</table>
									<?php } ?>
								 </div>
								</div>
								<!-- /.box-body -->
							  </div>
							  <!-- /.box -->
							</div>
							<?php 
							$sol=array(1=>5,2=>6,3=>7,4=>8,5=>9,6=>10,7=>11,8=>12,9=>13,10=>14);
							// echo count($sol);
							for($j=1;count($sol)>=$j;$j++){
								$this->db->select('');
								$this->db->where('user_type', $sol[$j]);
								$this->db->from('permissions');
								$all_per = $this->db->get();
								// echo $this->db->last_query();
								//echo "<pre>";print_r($all_per->result());
								if($j==2 || $j==7 || $j==8){
									$num="box-default";
								}elseif($j % 2 == 0){
									$num="box-info";	
								}else{
									$num="box-warning";	
								}
								?>
								<div class="col-md-12">
								  <div class="box <?php echo $num ?> box-solid collapsed-box">
									<div class="box-header with-border">
									  <h3 class="box-title"><?php echo ucfirst($all_per->result()[0]->type_name)?></h3>

									  <div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
										</button>
									  </div>
									  <!-- /.box-tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body" style="display: none;">
									  <?php if($all_per->num_rows()>0){ $count = $all_per->num_rows(); $rows = floor($count/4);$i=0; ?>
										<table class="table">
										   <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
											<th>All</th>*/?>
											<?php foreach($all_per->result() as $row){ ++$i;  ?>
												<?php if($i==1){   ?>
														<tr>
														<?php } ?>
													
													<td style="width:30px"><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" <?php echo ($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))) ? '  checked="checked"' : '' ?> name="permissions[]" readonly /></td>
													<td><?php echo $row->description; ?></td>
												<?php if($i==4){ $i = 0; ?>
														</tr>
													<?php } ?>
											<?php } ?>
										</table>
									<?php } ?>              
									</div>
									<!-- /.box-body -->
								  </div>
								  <!-- /.box -->
								</div>
								
								
								<?php
							}
							
							?>
							
                        </div>


                    </div>


                </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.btn-xs{padding:4px}</style>

</body>
</html>
