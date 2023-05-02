<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/datepicker3.css">
  <style>
  .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{border-top: none;}
  table{font-size:13px;}
  </style>
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
                        <li class="active"><a href="<?php echo site_url('Admin/Employees') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="employees" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Employee
                                <?php else: ?>
                                   Add Employee
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if (isset($employee) && $employee): ?>
                                    <?php echo form_open_multipart('Admin/Employees/edit_employee/' . $employee['emp_id'] . '/edit', array('id' => 'edit_employee','class' => 'form-horizontal')); ?>
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
                                            <label class="col-md-2">First Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="firstname" value="<?php echo $employee['firstname']  ?>" placeholder="Please Enter First Name"/>
                                             </div>
											  <label class="col-md-2">Last Name <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="lastname" value="<?php echo $employee['lastname']  ?>" placeholder="Please Enter Last Name"/>
                                             </div> 
											 
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-2">User Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="username" value="<?php echo $employee['username']  ?>" placeholder="Please Enter User Name"/>
                                             </div>
                                             <label class="col-md-2">Password <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="password" class="form-control" name="password" value="" placeholder="Please Enter Password"/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Email Id <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="email" class="form-control" name="email_id" value="<?php echo $employee['email_id']  ?>" placeholder="Please Enter Valid Email Id"/>
                                             </div>
                                             
                                            
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-2">Designation <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="designation" value="<?php echo $employee['designation']  ?>" placeholder="Please Enter Designation"/>
                                             </div>
											  <label class="col-md-2">Job Type<span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="job_type" value="<?php echo $employee['job_type']  ?>" placeholder="Please Enter Job Type"/>
                                             </div> 
											 
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-md-2">Address <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <textarea class="form-control" name="address" placeholder="Please Enter Addess"><?php echo $employee['address']?></textarea>
                                             </div>
											  <label class="col-md-2">Contact Details <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="contact" value="<?php echo $employee['contact']  ?>" placeholder="Please Enter Contact Details"/>
                                             </div> 
											 
                                        </div>
										
										<div class="form-group">									

											<label class="col-md-2">City</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="city" value="<?php echo $employee['city']  ?>" placeholder="Please Enter City"/>										
											</div>
											
											
											<label class="col-md-2">Date of Joining</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="date_of_joining" value="<?php echo $employee['date_of_joining']  ?>" id="datepicker"/>										
											</div>

											
											
										</div>	
										
										<div class="form-group">
											 
                                            
											 <label class="col-md-2">Upload Document <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="files[]" multiple="multiple"/>
												<input  type="hidden" class="form-control" name="old_file" value="<?php echo $employee['doc'];?>"/> 
												<br/>
												<?php if($employee['doc']!=''){

												$str=explode(",",$employee['doc']);
												foreach($str as $stra)

												{?>
												<?php if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
												<img src="<?php echo site_url() ?>asset/admin/employee_docs/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> 
												<?php }else{ echo "<br>"; ?>
												<a href="<?php echo site_url() ?>asset/admin/employee_docs/<?php echo  $stra ?>"><i class="fa fa-cloud-download"></i> <?php echo  $stra ?></a>
												<?php } } 
												} ?>
										
                                             </div>
											 
											 <label class="col-md-2">Upload Photograph <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="image"/>
												 <input  type="hidden" class="form-control" name="old_image" value="<?php echo $employee['profile_pic'];?>"/> 
													<br/>
													<?php if($employee['profile_pic']!=''){

													$str=explode(",",$employee['profile_pic']);
													foreach($str as $stra)

													{?>
													<?php if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
													<img src="<?php echo site_url() ?>asset/admin/employee_pic/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> 
													<?php } } 
													} ?>
											
												 </div>
                                        </div> 
										
										<div class="form-group">
											<label class="col-md-2">Department <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="department" value="<?php echo $employee['department']?>" placeholder="Please Enter Department"/>
                                             </div>
                                            
											 <label class="col-md-2">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status" <?php echo ($employee['status']==1)?'checked':''?>>
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
										
										<?php if($this->session->userdata('user_id')!=1){
										
										$per=explode(",",$client['permissions']);
										
										// echo "<pre>";print_r($per);
										?>
										<h4>Employee Access Permissions</h4><hr/>
										
										<div class="form-group">
                                            <label class="col-md-12">Software Configuration <span class="required_fields"></span></label>
                                             <div class="col-md-12">
                                                <?php if($config->num_rows()>0){ $count = $config->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                           <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
															<th>All</th>*/?>
                                                            <?php foreach($config->result() as $row){  ?>
															
															<?php if($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))){  ++$i;?>
																
															
															
                                                                <?php if($i==1){   ?>
                                                                    <tr>
                                                                <?php } ?>
                                                                    <td><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" <?php echo ($employee['permissions'] !='' && in_array($row->key,explode(',',$employee['permissions']))) ? ' checked="checked"' : '' ?> name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
                                                                <?php if($i==4){ $i = 0; ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } } ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
                                        </div><br>
										
										<div class="form-group">
                                            <label class="col-md-12">Solution Selection <span class="required_fields"></span></label><br/><br/>
											
											<?php 
											// $sol=array(0=>5,1=>6,2=>7,3=>8,4=>9,5=>10,6=>11,7=>12);
											// echo "<pre>";print_r($per);exit;
											$sol=array(1=>'water',2=>'energy',3=>'Air Quality',3=>'Air Conditioning',4=>'Remote Control',5=>'Soft Integrations',6=>'Specialised Solutions',7=>'Billing',8=>'Switch Controls',9=>'Switch Status',10=>'ESSENTIAL SERVICES',11=>'Fire Pump System');
											// echo count($sol);
											for($j=1;count($sol)>=$j;$j++){
												$this->db->select('');
												$this->db->where('type_name', $sol[$j]);
												$this->db->from('permissions');
												$all_per = $this->db->get();
												
												?>
												
												
												<?php 
												// $per_cat=explode("_",$per[$j-1]);
												// echo $per_cat[0];echo "<br/>";
												// echo "<pre>";print_r($sol);echo "<br/>";
												// if(in_array($per_cat[0],$sol)){
												// if($per_cat[0]==$sol[$j]){
												
												?>
												<div class="col-md-3">
												
                                                <?php if($all_per->num_rows()>0){ $count = $all_per->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                           <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
															<th>All</th>*/?>
															
                                                            <?php $n=0; foreach($all_per->result() as $row){ 
															
															if($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))){
																?>
																<label>
																<?php 
                                                                if($n==0){
                                                                    echo ucfirst($all_per->result()[0]->type_name);
                                                                }
																$n++;
																// echo ucfirst($sol[$j])
																?>
																</label>
																<?php
																++$i;  
																?>                                                                
																<tr>
                                                                    <td style="width:30px"><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" <?php echo ($employee['permissions'] !='' && in_array($row->key,explode(',',$employee['permissions']))) ? ' checked="checked"' : '' ?> name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
																</tr>
                                                                <?php //if($i==4){ $i = 0; ?>
                                                                    
                                                                <?php //} ?>
                                                            <?php } } ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
												<?php
											}
											//}
											
											?>
                                             
												
                                        </div>
										<?php } ?>
										<br><br>
										<div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Employees'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<?php else: ?>
                                <p><?php echo validation_errors(); ?></p>
                                <?php echo form_open_multipart('Admin/Employees/create_employee/', array('id' => 'create_client','class' => 'form-horizontal')); ?>
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
                                            <label class="col-md-2">First Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname')  ?>" placeholder="Please Enter First Name"/>
                                             </div>
											  <label class="col-md-2">Last Name <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname')  ?>" placeholder="Please Enter Last Name"/>
                                             </div> 
											 
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-2">User Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="username" value="<?php echo set_value('username')  ?>" placeholder="Please Enter User Name"/>
                                             </div>
                                             <label class="col-md-2">Password <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="password" class="form-control" name="password" value="" placeholder="Please Enter Password"/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Email Id <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="email" class="form-control" name="email_id" value="<?php echo set_value('email_id')  ?>" placeholder="Please Enter Valid Email Id"/>
                                             </div>
                                             
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-2">Designation <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="designation" value="<?php echo set_value('designation')  ?>" placeholder="Please Enter Designation"/>
                                             </div>
											  <label class="col-md-2">Job Type<span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="job_type" value="<?php echo set_value('job_type')  ?>" placeholder="Please Enter Job Type"/>
                                             </div> 
											 
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-md-2">Address <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <textarea class="form-control" name="address" placeholder="Please Enter Addess"></textarea>
                                             </div>
											  <label class="col-md-2">Contact Details <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="contact" value="<?php echo set_value('contact')  ?>" placeholder="Please Enter Contact Details"/>
                                             </div> 
											 
                                        </div>
										
										<div class="form-group">									

											<label class="col-md-2">City</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="city" value="" placeholder="Please Enter City"/>										
											</div>
											
											
											<label class="col-md-2">Date of Joining</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="date_of_joining" value="" id="datepicker"/>										
											</div>

											
											
										</div>	
										
										<div class="form-group">
											 
                                            
											 <label class="col-md-2">Upload Document <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control"  name="files[]" multiple="multiple">
                                             </div>
											 
											 <label class="col-md-2">Upload Photograph <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="image"/>
                                             </div>
                                        </div> 
										
										<div class="form-group">
											 <label class="col-md-2">Department <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="department" value="" placeholder="Please Enter Department"/>
                                             </div>
											 
											 <label class="col-md-2">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status">
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
										
										<h4>Employee Access Permissions</h4><hr/>
										<?php $per=explode(",",$client['permissions']); ?>
										<div class="form-group">
                                            <label class="col-md-12">Software Configuration <span class="required_fields"></span></label>
                                             <div class="col-md-12">
                                                <?php if($config->num_rows()>0){ $count = $config->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                          
                                                            <?php foreach($config->result() as $row){  ?>
															
															<?php if($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))){  ++$i;?>
                                                                    <tr>       
                                                                    <td><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
                                                                
                                                                    </tr>
                                                               
                                                            <?php } } ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
                                        </div><br>
										
										<div class="form-group">
                                            <label class="col-md-12">Solution Selection <span class="required_fields"></span></label><br/><br/>
											
											<?php 
											// $sol=array(0=>5,1=>6,2=>7,3=>8,4=>9,5=>10,6=>11,7=>12);
											// echo "<pre>";print_r($per);exit;
											$sol=array(1=>'water',2=>'energy',3=>'Air Quality',3=>'Air Conditioning',4=>'Remote Control',5=>'Soft Integrations',6=>'Specialised Solutions',7=>'Billing',8=>'Switch Controls',9=>'ESSENTIAL SERVICES',10=>'Fire Pump System');
											// echo count($sol);
											for($j=1;count($sol)>=$j;$j++){
												$this->db->select('');
												$this->db->where('type_name', $sol[$j]);
												$this->db->from('permissions');
												$all_per = $this->db->get();
												//echo print_r($all_per->result());
												?>
												
												
												<?php 
												// $per_cat=explode("_",$per[$j-1]);
												// echo $per_cat[0];echo "<br/>";
												// echo "<pre>";print_r($sol);echo "<br/>";
												// if(in_array($per_cat[0],$sol)){
												// if($per_cat[0]==$sol[$j]){
												
												?>
                                                 <?php if($all_per->num_rows()>0){ $count = $all_per->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                    <?php //if(in_array($all_per->result()[0]->type_name,explode(',',$client['permissions'])) ){
                                                        echo $all_per->result()[0]->type_name."<br>";
                                                    //} ?>
												<div class="col-md-3">
												
                                               
                                                        <table class="table">
                                                           <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
															<th>All</th>*/?>
															
                                                            <?php $n=0;foreach($all_per->result() as $row){ 
															//echo $row->key;
															if($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))){
                                                                
																?>
																<label>
																<?php 
                                                                //if($n==0){
                                                                    echo ucfirst($all_per->result()[0]->type_name);
                                                                //}
																$n++;
																// echo ucfirst($sol[$j])
																?>
																</label>
																<?php
																++$i;  
																?>                                                                
																<tr>
                                                                    <td style="width:30px"><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
																</tr>
                                                                <?php //if($i==4){ $i = 0; ?>
                                                                    
                                                                <?php //} ?>
                                                            <?php } }  ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
												<?php
											}
											//}
											
											?>
                                             
												
                                        </div>
										
										
										
                                        <div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Employees'); ?>" class="btn btn-default">Cancel</a>
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

<script src="<?php echo base_url(); ?>asset/admin/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function() {
		$('#checked_all').click(function(event) {
			if(this.checked) {
				$('.selectCheckboxes').each(function() {
					this.checked = true;
					});
			}else{
				$('.selectCheckboxes').each(function() {
					this.checked = false;   
					});
				}
		});
		$('.selectCheckboxes').click(function() {
			$('#checked_all').attr('checked',true);
			$('.selectCheckboxes').each(function() {
				if(!this.checked) {
					$('#checked_all').attr('checked',false);
				}
			});
		});
		$('.selectCheckboxes').each(function() {
			if(!this.checked) {
				$('#checked_all').attr('checked',false);
			}else{
			   $('#checked_all').attr('checked',true); 
			}
		});
	});
	
	$('#datepicker').datepicker({
      autoclose: true
    });

	
	
</script>
</body>
</html>
