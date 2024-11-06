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


                        <input type="hidden" id="page" value="hardware" />


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Hardware Category</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">


                                            <div class="col-md-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Category Name" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


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


                                                &nbsp;<a href="<?php echo site_url('Admin/Hardware_category') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="seach-button">


                                                    <label> &nbsp; </label>


                                                    <div class="col-md-2">


                                                        <a href="<?php echo site_url('Admin/Hardware_category/create_category/category') ?>" class="btn btn-success">Add Hardware Category</a>


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
                                            <th>Menu Icon</th>
                                           
											<th>status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if (!empty($hardware_category)) {
											$i=1;


                                            foreach ($hardware_category as $row) {  ?>


                                                <tr id="cp<?php echo $row->category_id; ?>">


                                                    <td><?php echo $i ?></td>


                                                    <td><?php echo $row->category_name; ?></td>
                                                    <td><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $row->menu_icon ?>" width="50" style="background:#f1f1f1" /> </td>
                                                   


													<td><?php 
													if($row->status==1){ 
													?>
													<a href="<?php echo site_url('Admin/Hardware_category/status_change/' . $row->category_id.'/0') ?>" title="Active" class="btn btn-success btn-xs"><span>Active</span></a>
													<?php 
													}else{
														?>
														<a href="<?php echo site_url('Admin/Hardware_category/status_change/' . $row->category_id.'/1') ?>" title="Inactive" class="btn btn-warning btn-xs"><span>Inactive</span></a>
														<?php
														}
														?></td>



                                                    <td>

                                                            <?php //if(modules::run('admin/site/authlink','employee_modify')){ ?>
															
																<a href="<?php echo site_url('Admin/Hardware_category/view_category/' . $row->category_id) ?>" title="View Category" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>


                                                                <a href="<?php echo site_url('Admin/Hardware_category/edit_category/' . $row->category_id) ?>" title="Edit Category" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>


                                                                <button type="button" onclick="removeCategory(<?php echo $row->category_id; ?>)" class="btn btn-danger btn-xs" title="Delete Category"><span class="glyphicon glyphicon-trash"></span></button>


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
		var ans = confirm("Do you want delete this? You lost Hardware Device and Hardwares Related to this Hardware Type?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Hardware_category/remove_category/'+categoryId,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						$("#dp"+categoryId).fadeOut();
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}
	
	function removeDevice(deviceId){
		var ans = confirm("Do you want delete this? You lost Hardwares related to this Device?");
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
