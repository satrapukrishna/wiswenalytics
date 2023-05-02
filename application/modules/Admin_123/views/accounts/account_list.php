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


                        <input type="hidden" id="page" value="accounts" />


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Accounts</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">


                                            <div class="col-xs-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Client, Account Type" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>


                                            <div class="col-xs-5"><br>


                                                <label>&nbsp;</label>


                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 


                                                &nbsp;<a href="<?php echo site_url('Admin/Accounts') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="col-md-4"><br>


                                                    <label> &nbsp; </label>


                                                    <div class="col-md-2">


                                                        <a href="<?php echo site_url('Admin/Accounts/create_account') ?>" class="btn btn-success">Add Account</a>


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


                                            <th>Client Name</th>


                                            <th>Account Type</th>
                                            <th>Document / Image</th>


                                            <th>Actions</th>


                                        </tr>


                                    </thead>


                                    <tbody>


                                        <?php


                                        if (!empty($accounts)) {


                                            foreach ($accounts as $row) {  ?>


                                                <tr id="sp<?php echo $row->account_id; ?>">


                                                    <td><?php echo $row->account_id; ?></td>


                                                    <td><?php echo $row->client_name; ?></td>


                                                    <td><?php echo $row->account_type; ?></td>
													
                                                    <td>
													
													<?php 
													$stra=$row->doc;
													if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
													<a href="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" target="_blank"><img src="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> </a>
													<?php }else{ echo "<br>"; ?>
													<a href="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" title="Download"><i class="fa fa-cloud-download"></i> <?php echo  $stra ?></a>
													<?php }?>
													</td>


                                                    <td>

                                                            <?php //if(modules::run('admin/site/authlink','employee_modify')){ ?>

                                                                <button type="button" onclick="removeAccount(<?php echo $row->account_id; ?>)" class="btn btn-danger btn-xs" title="Delete account"><span class="glyphicon glyphicon-trash"></span></button>


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
	function removeAccount(accountId){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Accounts/remove_account/'+accountId,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						$("#sp"+accountId).fadeOut();
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
