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


                            <h3 class="panel-title">Hardware Template</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">
											<p class="alert alert-success success">Template Deleted Successfully</p>
										</div>
                                        <div class="form-group">


                                            <div class="col-xs-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Category Name, Device Name" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>


                                            <div class="col-xs-5"><br>


                                                <label>&nbsp;</label>


                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 


                                                &nbsp;<a href="<?php echo site_url('Admin/Hardware_template') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="col-md-4"><br>


                                                    <label> &nbsp; </label>


                                                    <div class="col-md-2">

													<a href="<?php echo site_url('Admin/Hardware_template/create_hardware_template') ?>" class="btn btn-success">Create Hardware Template</a>
                                                       


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
                                            <th>Device Name</th>

											<th>status</th>
                                            <th>Actions</th>


                                        </tr>


                                    </thead>


                                    <tbody>


                                        <?php

										
                                        if (!empty($hardware_category1)) {


                                            foreach ($hardware_category1 as $row) {  ?>


                                                <tr id="sp<?php echo $row->device_id; ?>">


                                                    <td><?php echo $row->device_id; ?></td>


                                                    <td><?php echo $row->category_name; ?></td>
													
                                                    <td><?php echo $row->device_name; ?></td>


													<td><?php if($row->status==1){ echo '<span style="color:green;">Active</span>';}elseif($row->status==0){echo '<span style="color:red;">Inactive</span>';} ?></td>



                                                    <td>

                                                            <?php //if(modules::run('admin/site/authlink','employee_modify')){ ?>

																<a href="<?php echo site_url('Admin/Hardware_template/view_template/' . $row->category_id.'/'.$row->device_id) ?>" title="View Template" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>
																
                                                                <?php /*<a href="<?php echo site_url('Admin/Hardware_template/edit_template/' . $row->category_id.'/'.$row->device_id) ?>" title="Edit Device" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>*/ ?>


                                                                <button type="button" onclick="removeTemplate(<?php echo $row->category_id?>,<?php echo $row->device_id?>)" class="btn btn-danger btn-xs" title="Delete Template"><span class="glyphicon glyphicon-trash"></span></button>


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
<style>.btn-xs{padding:4px}.success{display:none}}</style>
<script>
	function removeTemplate(categoryId,deviceId){
		var ans = confirm("Do you want delete this, You Lost Template?");
		if(ans){
			$.ajax({
				type: 'GET',
				data: {
					category:categoryId,device:deviceId
				},
				url: BASE_URL+'Admin/Hardware_template/remove_template/',
				success: function (data){
					// alert(data);
					if(data == 1){
						$('.success').show();
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
