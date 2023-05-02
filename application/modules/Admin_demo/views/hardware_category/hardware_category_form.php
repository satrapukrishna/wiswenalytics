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
                        <li class="active">
						<?php if (isset($category_name) && $category_name){?>						
						<a href="<?php echo site_url('Admin/Hardware_category') ?>">Back</a>
						<?php }else{?>
						<a href="<?php echo site_url('Admin/Hardware_category/device') ?>">Back</a>
						<?php } ?>
						</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="hardware" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Hardware Category / Device
                                <?php else: ?>
                                   Add Hardware Category / Device
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if (isset($category_name) && $category_name){ ?>
                                    <?php echo form_open_multipart('Admin/Hardware_category/edit_category/' . $category_name['category_id'] . '/edit', array('id' => 'edit_category','class' => 'form-horizontal')); ?>
                                    <div class="form-group">
                                        <?php if (isset($msg)): ?>
                                            <p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <p><?php echo validation_errors(); ?></p>
                                        <?php if (isset($error)): ?>
                                            <p class="al
											ert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>    
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>
                                    </div>
									
									<div class="form-group">
                                            <label class="col-md-2 text-right">Hardware Category <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                                <input type="text" class="form-control" name="category_name" value="<?php echo $category_name['category_name']  ?>" placeholder="Please Enter Hardware Category Name"/>
                                             </div>
											 
                                        </div>  
										
										<div class="form-group">
                                            <label class="col-md-2 text-right">Menu Icon <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
											 <input type="file" class="form-control" name="menu_icon"/>
											<input  type="hidden" class="form-control" name="old_menu_icon" value="<?php echo $category_name['menu_icon'];?>"/> 
											<?php if($category_name['menu_icon']!=''){?>
											<img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $category_name['menu_icon'] ?>" width="50" style="background:#f1f1f1" />
											<?php } ?>
                                               <?php /*<input type="text" class="form-control" name="icon" value="<?php echo $device['icon']  ?>" placeholder="Please Enter Hardware Icon"/>*/?>
                                             </div>											 
                                    </div> 
									<div class="form-group">
                                            

											 <label class="col-md-2 text-right">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status" <?php echo ($category_name['status']==1)?'checked':''?>>
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
                                  
										<br>
                                        <div class="form-group">
                                             <div class="col-md-8 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware_category'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
							<?php }else	if (isset($device) && $device){ ?>
								<?php echo form_open_multipart('Admin/Hardware_category/edit_device/' . $device['device_id'] . '/edit', array('id' => 'edit_device','class' => 'form-horizontal')); ?>
                                    
									<div class="form-group">
                                        <?php if (isset($msg)): ?>
                                            <p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <p><?php echo validation_errors(); ?></p>
                                        <?php if (isset($error)): ?>
                                            <p class="al
											ert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>    
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>
                                    </div>
									
									<div class="form-group">
                                            <label class="col-md-2 text-right">Hardware Category <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <?php echo form_dropdown('parent_id',$category,$device['category_id'],'class="form-control select2"'); ?>
                                             </div>
											 
                                        </div>  
									<div class="form-group">
                                            <label class="col-md-2 text-right">Hardware Device <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <input type="text" class="form-control" name="device_name" value="<?php echo $device['device_name']  ?>" placeholder="Please Enter Hardware Device Name"/>
                                             </div>											 
                                    </div>
									<div class="form-group">
                                            <label class="col-md-2 text-right">Menu Icon <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
											 <input type="file" class="form-control" name="menu_icon"/>
											<input  type="hidden" class="form-control" name="old_menu_icon" value="<?php echo $device['menu_icon'];?>"/> 
											<?php if($device['menu_icon']!=''){?>
											<img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $device['menu_icon'] ?>" width="50" style="background:#f1f1f1" />
											<?php } ?>
                                               <?php /*<input type="text" class="form-control" name="icon" value="<?php echo $device['icon']  ?>" placeholder="Please Enter Hardware Icon"/>*/?>
                                             </div>											 
                                    </div> 
									<div class="form-group">
                                            <label class="col-md-2 text-right">Dashboard Icon <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
											 <input type="file" class="form-control" name="dashboard_icon"/>
											<input  type="hidden" class="form-control" name="old_dashboard_icon" value="<?php echo $device['dashboard_icon'];?>"/> 
											<?php if($device['dashboard_icon']!=''){?>
											<img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $device['dashboard_icon'] ?>" width="50" />
											<?php } ?>
                                               <?php /*<input type="text" class="form-control" name="icon" value="<?php echo $device['icon']  ?>" placeholder="Please Enter Hardware Icon"/>*/?>
                                             </div>											 
                                    </div> 
									<div class="form-group">
                                            

											 <label class="col-md-2  text-right">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status" <?php echo ($device['status']==1)?'checked':''?>>
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
									
                                  
										<br>
                                        <div class="form-group">
                                             <div class="col-md-8 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware_category/device'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
							<?php }else{ ?>
							<?php if($this->uri->segment(4)=='category'){?>
                                <p><?php echo validation_errors(); ?></p>
                                <?php echo form_open_multipart('Admin/Hardware_category/create_category/', array('id' => 'create_category','class' => 'form-horizontal')); ?>
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
                                            <label class="col-md-2 text-right">Hardware Category <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                                <input type="text" class="form-control" name="category_name" value="<?php echo set_value('category_name')  ?>" placeholder="Please Enter Hardware Category Name"/>
                                             </div>
											 
                                        </div> 
										<div class="form-group">
                                            <label class="col-md-2 text-right">Menu Icon <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <input type="file" name="menu_icon" class="form-control">
                                             </div>											 
                                    </div> 
									<div class="form-group">
                                            

											 <label class="col-md-2 text-right">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status">
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
                                  
										<br>
                                        <div class="form-group">
                                             <div class="col-md-8 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware_category'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<hr>
							<?php }else{ ?> 
								
								<?php echo form_open_multipart('Admin/Hardware_category/create_hardware_device/', array('id' => 'create_hardware_device','class' => 'form-horizontal')); ?>
                                    
									<div class="form-group">
                                        <?php if (isset($msg)): ?>
                                            <p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <p><?php echo validation_errors(); ?></p>
                                        <?php if (isset($error)): ?>
                                            <p class="al
											ert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>    
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>
                                    </div>
									
									
                                    <div class="form-group">
                                            <label class="col-md-2 text-right">Hardware Category <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <?php echo form_dropdown('parent_id',$category,'','class="form-control select2"'); ?>
                                             </div>
											 
                                        </div>  
									<div class="form-group">
                                            <label class="col-md-2 text-right">Hardware Device <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <input type="text" class="form-control" name="device_name" value="<?php echo set_value('device_name')  ?>" placeholder="Please Enter Hardware Device Name"/>
                                             </div>
											 
                                    </div>
									<div class="form-group">
                                            <label class="col-md-2 text-right">Menu Icon <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <input type="file" name="menu_icon" class="form-control">
                                             </div>											 
                                    </div> 
									
									<div class="form-group">
                                            <label class="col-md-2 text-right">Dashboard Icon <span class="required_fields">*</span></label>
                                             <div class="col-md-5">
                                               <input type="file" name="dashboard_icon" class="form-control">
                                             </div>											 
                                    </div> 
									<div class="form-group">
                                            

											 <label class="col-md-2 text-right">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status">
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
															
                                  
										<br>
                                        <div class="form-group">
                                             <div class="col-md-8 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware_category/device'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
                            <?php } } ?>
                        </div>
                    </div>
                </section>
            </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>

</body>
</html>
