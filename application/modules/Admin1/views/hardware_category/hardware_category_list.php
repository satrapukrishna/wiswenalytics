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


                                            <div class="col-xs-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Category Name" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>


                                            <div class="col-xs-5"><br>


                                                <label>&nbsp;</label>


                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 


                                                &nbsp;<a href="<?php echo site_url('Admin/Hardware_category') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="col-md-4"><br>


                                                    <label> &nbsp; </label>


                                                    <div class="col-md-2">


                                                        <a href="<?php echo site_url('Admin/Hardware_category/create_category/category') ?>" class="btn btn-success">Add Hardware Category</a>


                                                    </div>


                                                </div>


                                            <?php //} ?>


                                                                        


                                        </div>


                                    </form>


                                </div>


                                <table class="table table-condensed">


                                    <thead>


                                        <tr>


                                            <th>Sno</th>
                                            <th>Catgeory Name</th>
											<th>status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if (!empty($hardware_category)) {


                                            foreach ($hardware_category as $row) {  ?>


                                                <tr id="cp<?php echo $row->category_id; ?>">


                                                    <td><?php echo $row->category_id; ?></td>


                                                    <td><?php echo $row->category_name; ?></td>


													<td><?php if($row->status==1){ echo '<span style="color:green;">Active</span>';}elseif($row->status==0){echo '<span style="color:red;">Inactive</span>';} ?></td>



                                                    <td>

                                                            <?php //if(modules::run('admin/site/authlink','employee_modify')){ ?>


                                                                <a href="<?php echo site_url('Admin/Hardware_category/edit_category/' . $row->category_id) ?>" title="Edit Category" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>


                                                                <button type="button" onclick="removeCategory(<?php echo $row->category_id; ?>)" class="btn btn-danger btn-xs" title="Delete Category"><span class="glyphicon glyphicon-trash"></span></button>


                                                            <?php //} ?>

                                                    </td>


                                                     


                                                </tr>


                                            <?php }


                                            } else {


                                                echo '<tr class="text-info"><td colspan="5" class="text-center">No Records Found</td></tr>';


                                            }?>


                                    </tbody>


                                </table>


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
