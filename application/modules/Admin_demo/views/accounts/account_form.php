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
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class=""></i></a></li>
                        <li class="active"><a href="<?php echo site_url('Admin/Accounts') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="accounts" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Document
                                <?php else: ?>
                                   Add Document
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            
								<?php if (isset($account) && $account): ?>
                                    <?php echo form_open_multipart('Admin/Accounts/edit_account/' . $account['account_id'] . '/edit', array('id' => 'edit_account','class' => 'form-horizontal')); ?>
                                    <div class="form-group">
                                        <?php if (isset($msg)): ?>
                                            <p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <p><?php echo validation_errors(); ?></p>
                                        <?php if (isset($error)): ?>
                                            <p class="alert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>    
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>
                                    </div>
									
									<div class="form-group">
                                            <label class="col-md-2">Client <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                 <input type="text" class="form-control" name="client" value="<?php echo $account['client']  ?>" placeholder="Please Enter Client Name"/>
                                             </div>
											  
											 
                                        </div>  
										<div class="form-group">
											<label class="col-md-2">Type of Document<span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <?php echo form_dropdown('account_type',$account_type,$account['account_type'],'class="form-control select2"'); ?>
                                             </div> 
											  
											 
                                        </div>  
                                        <div class="form-group">
											
											 <label class="col-md-2">Upload Document <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="file"/>
												<input  type="hidden" class="form-control" name="old_file" value="<?php echo $account['doc'];?>"/> 
												<br/>
												<?php if($account['doc']!=''){

												$str=explode(",",$account['doc']);
												foreach($str as $stra)

												{?>
												<?php if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
												<img src="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> 
												<?php }else{?>
												<a href="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>"><i class="fa fa-cloud-download"></i> <?php echo  $stra ?></a>
												<?php } } 
												} ?>
										
                                             </div>
                                        </div>
										<br><br>
										<div class="form-group">
                                             <div class="col-md-12">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Accounts'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<?php else: ?>
                                <p><?php echo validation_errors(); ?></p>
                                <?php echo form_open_multipart('Admin/Accounts/create_account/', array('id' => 'create_account','class' => 'form-horizontal')); ?>
                                    <div class="form-group">
                                        <?php if (isset($msg)): ?>
										<p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <?php if (isset($error)): ?>
                                            <p class="alert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?> 
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>  
                                    </div> 
										<div class="form-group">
                                            <label class="col-md-2">Client <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                 <input type="text" class="form-control" name="client" value="<?php echo set_value('client_name')  ?>" placeholder="Please Enter Client Name"/>
                                             </div>
											  
											 
                                        </div>  
										<div class="form-group">
											<label class="col-md-2">Type of Document<span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <?php echo form_dropdown('account_type',$account_type,'','class="form-control select2"'); ?>
                                             </div> 
											  
											 
                                        </div>  
                                    
                                        <div class="form-group">
											 
                                            
											 <label class="col-md-2">Upload Document <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control"  name="files[]" multiple="multiple" required/>
                                             </div>
                                        </div>
																			
										
										<br><br>
                                        <div class="form-group">
                                             <div class="col-md-12">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Accounts'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>

</body>
</html>
