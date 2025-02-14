﻿<html>
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


                        <input type="hidden" id="page" value="hardware" />


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Hardware Device</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">


                                            <div class="col-md-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Category Name, Device Name" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>


                                            <div class="col-md-2 seach-button">
                                                <select name="status" class="form-control">
												<option>Select Status</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
                                             </div>


                                            <div class="col-md-3 seach-button">


                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 


                                                &nbsp;<a href="<?php echo site_url('Admin/Hardware_category/device') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="seach-button">


                                                    <label> &nbsp; </label>


                                                    <div class="col-md-2">

													<a href="<?php echo site_url('Admin/Hardware_category/create_category') ?>" class="btn btn-success">Add Hardware Device</a>
                                                       


                                                    </div>


                                                </div>


                                            <?php //} ?>


                                                                        


                                        </div>


                                    </form>


                                </div>
								<br><br>
								<div class="table-responsive">


                                <table class="table table-condensed">


                                    <thead>


                                        <tr>


                                            <th>S No.</th>


                                            <th>Category Name</th>
                                            <th>Device Name</th>
                                            <th>Menu Icon</th>
                                            <th>Dashboard Icon</th>
                                            <!-- <th>QR Code</th> -->
											<th>status</th>
                                            <th>Actions</th>


                                        </tr>


                                    </thead>


                                    <tbody>


                                        <?php


                                        if (!empty($hardware_category1)) {
											
											$i=1;


                                            foreach ($hardware_category1 as $row) {  ?>


                                                <tr id="sp<?php echo $row->device_id; ?>">


                                                    <td><?php echo $i ?></td>


                                                    <td><?php echo $row->category_name; ?></td>
													
                                                    <td><?php echo $row->device_name; ?></td>
													
													 <td><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $row->menu_icon ?>" width="50" style="background:#f1f1f1" /> </td>
													 <td><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $row->dashboard_icon ?>" width="50" /> </td>
                                                     <!-- <td><img src="<?php //echo site_url() ?><?php //echo  $row->qrcode ?>" width="150" /> </td> -->

													<td><?php 
													if($row->status==1){ 
													?>
													<a href="<?php echo site_url('Admin/Hardware_category/status_change1/' . $row->device_id.'/0') ?>" title="Active" style="width:50px !important;" class="btn btn-success btn-xs"><span>Active</span></a>
													<?php 
													}else{
														?>
														<a href="<?php echo site_url('Admin/Hardware_category/status_change1/' . $row->device_id.'/1') ?>" title="Inactive" class="btn btn-warning btn-xs"><span>Inactive</span></a>
														<?php
														}
														?></td>

                                                    <td>

                                                            <?php //if(modules::run('admin/site/authlink','employee_modify')){ ?>
															
																<a href="<?php echo site_url('Admin/Hardware_category/view_device/' . $row->device_id) ?>" title="View Device" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>


                                                                <a href="<?php echo site_url('Admin/Hardware_category/edit_device/' . $row->device_id) ?>" title="Edit Device" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>


                                                                <button type="button" onclick="removeDevice(<?php echo $row->device_id; ?>)" class="btn btn-danger btn-xs" title="Delete Device"><span class="glyphicon glyphicon-trash"></span></button>


                                                            <?php //} ?>

                                                    </td>


                                                     


                                                </tr>


                                            <?php $i++;}


                                            } else {


                                                echo '<tr class="text-info"><td colspan="5" class="text-center">No Records Found</td></tr>';


                                            }?>


                                    </tbody>


                                </table>


                            </div>
                            </div>


                            <div class="row text-center text-center-xs"><?php echo $pagination; ?></div>


                        </div>


                    </div>


                </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.btn-xs{padding:4px}</style>
<script>
	function removeCategory(categoryId){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Hardware_category/remove_category/'+categoryId,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						$("#cp"+categoryId).fadeOut();
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}
	
	function removeDevice(deviceId){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Hardware_category/remove_device/'+deviceId,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						$("#dp"+deviceId).fadeOut();
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}
</script>
</body>
</html>
