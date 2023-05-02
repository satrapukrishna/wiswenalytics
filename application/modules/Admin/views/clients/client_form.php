<html>
<head>
  
  <?php $this->load->view('common/css') ?>
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
                        <li class="active"><a href="<?php echo site_url('Admin/Clients') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="clients" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Client
                                <?php else: ?>
                                   Add Client
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
						<?php if (isset($client) && $client): ?>
						
						<div class="col-md-12" style="padding-left:0px">
						  <!-- Custom Tabs -->
						  <div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Info</a></li>
							  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="">Permissions</a></li>
							  
							</ul>
							<div class="tab-content">
							  <div class="tab-pane active" id="tab_1">
								<?php echo form_open_multipart('Admin/Clients/edit_client/' . $client['client_id'] . '/edit', array('id' => 'edit_client','class' => 'form-horizontal')); ?>
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
									<h4>Personal Information</h4><hr/>
									<div class="form-group">
                                            <label class="col-md-2">Client Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="client_name" value="<?php echo $client['client_name']  ?>" placeholder="Please Enter Client Name"/>
                                             </div>
											  <label class="col-md-2">Client Type <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="client_type" value="<?php echo $client['client_type']  ?>" placeholder="Please Enter Client Type"/>
                                             </div> 
											 
                                        </div>  
                                    <div class="form-group">
                                            <label class="col-md-2">Email Id <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="email" class="form-control" name="email_id" value="<?php echo $client['email_id']  ?>" placeholder="Please Enter Valid Email Id"/>
                                             </div>
                                             <label class="col-md-2">Password <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="password" class="form-control" name="password" value="" placeholder="Please Enter Password"/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Property Type <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <?php echo form_dropdown('property_type',$property_type,$client['property_type'],'class="form-control select2"'); ?>
                                             </div>
											 <label class="col-md-2">Mobile <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="mobile" value="<?php echo $client['mobile']  ?>" placeholder="Please Enter 10 Digit Mobile"/>
                                             </div> 
                                            
                                        </div>
										<div class="form-group">									

											<label class="col-md-2">City</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="city" value="<?php echo $client['city']  ?>" placeholder="Please Enter City"/>										
											</div>
											
											
											<label class="col-md-2">Address</label>
											<div class="col-md-3">
											<textarea class="form-control" name="address" placeholder="Please Enter Addess"><?php echo $client['address']  ?></textarea>										
											</div>

											
											
										</div>	
										<div class="form-group">									

											<label class="col-md-2">No Buildings</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="no_buildings" value="<?php echo $client['no_buildings']?>" placeholder="Please Enter no_buildings"/>
											</div>
											<div class="col-md-2">
												<?php if (!empty($buildings)) 
                                                    $count = $buildings->num_rows();
                                                 else 
                                                     $count=0;
                                                 ?>
                                                <input type="hidden" value="<?php echo $count; ?>" id="localcontactCount" name="localcontactCount"/>
                                                <input type="hidden" value="<?php echo set_value('hiddenlocal'); ?>" id="hiddenlocal" name="hiddenlocal"/>
                                                <a style="cursor: pointer;" class="btn btn-success btn-xs localdetails" onclick="addmorelocaldetails()"><i class="fa fa-plus-circle"></i> Add Building</a>
											</div>
										</div>
										
										<?php  $i=1;
										foreach ($buildings->result_array() as $bul) { ?> 
											
												<div id="localcontactdetails<?php echo $i; ?>" class="locdetails">  
											
											   <div class="col-md-12">
												<div class="form-group">
													<div class="col-md-3">
												   <b class="error"> <?php echo $i; ?>.</b>    <label class="lav">Building Name</label>
														<input type="text" class="form-control" name="building_name<?php echo $i; ?>" id="building_name<?php echo $i; ?>" value="<?php echo $bul['building_name'] ?>" placeholder="Building Name"/>
													<?php echo form_error('building_name'. $i); ?>
													</div>
													<div class="col-md-3">
														<label class="lav">No. of Floors</label>
														<input type="text" class="form-control" name="floors<?php echo $i; ?>" id="floors<?php echo $i; ?>" value="<?php echo $bul['floors']; ?>" placeholder="No. of Floors"/>
													<?php echo form_error('floors'. $i); ?>
													</div>   
													
													<div class="col-md-3">
														<label class="lav">Address</label>
														<textarea type="text" class="form-control" name="address<?php echo $i; ?>" id="address<?php echo $i; ?>" placeholder="Address"><?php echo $bul['address']; ?></textarea>
													   <?php echo form_error('address'. $i); ?>
													</div>                              
												   
												
													<div class="col-md-1 text-right">
													<br />
															<a style="cursor: pointer;"   class="btn btn-danger btn-xs pull-right localdetails" onclick="removelocaldetailss('<?php echo $bul['building_id']; ?>')"><i class="fa fa-times"></i></a>                                                
													</div> 
												</div> 	
<hr /> 												
																				  
												</div> 
												                          
											</div>
																									  
											  
										<?php $i++; } ?>
										
										<?php for($i=$count+1;$i<=10;$i++): ?> 
											
												<div id="localcontactdetails<?php echo $i; ?>" class="locdetails" style="display:none;">  
											
											   <div class="col-md-12">
												<div class="form-group">
													<div class="col-md-3">
												   <b class="error"> <?php echo $i; ?>.</b>    <label class="lav">Building Name</label>
														<input type="text" class="form-control" name="building_name<?php echo $i; ?>" id="building_name<?php echo $i; ?>" value="<?php echo set_value('building_name'.$i); ?>" placeholder="Building Name"/>
													<?php echo form_error('building_name'. $i); ?>
													</div>
													<div class="col-md-3">
														<label class="lav">No. of Floors</label>
														<input type="text" class="form-control" name="floors<?php echo $i; ?>" id="floors<?php echo $i; ?>" value="<?php echo set_value('floors'.$i); ?>" placeholder="No. of Floors"/>
													<?php echo form_error('floors'. $i); ?>
													</div>   
													
													<div class="col-md-3">
														<label class="lav">Address</label>
														<textarea type="text" class="form-control" name="address<?php echo $i; ?>" id="address<?php echo $i; ?>" placeholder="Address"><?php echo set_value('address'.$i); ?></textarea>
													   <?php echo form_error('address'. $i); ?>
													</div>                              
												   
												
													<div class="col-md-1 text-right">
													<br />
															<a style="cursor: pointer;"   class="btn btn-danger btn-xs pull-right localdetails" onclick="removelocaldetails('<?php echo $i ?>')"><i class="fa fa-times"></i></a>                                                
													</div> 
												</div> 	
<hr /> 												
																				  
												</div> 
												                          
											</div>
																									  
											  
										<?php endfor; ?>
										
										
										<div class="form-group">
                                            <label class="col-md-2">Sale By <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <?php echo form_dropdown('partner_id',$partners,$client['partner_id'],'class="form-control  select2"'); ?>
                                             </div>
											 <label class="col-md-2">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status" <?php echo ($client['status']==1)?'checked':''?>>
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
										<br/>
										<h4>Generating Access Token</h4><hr/>
										
										<div class="form-group">
                                            <label class="col-md-2">Station ID <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="station_id"
												value="<?php echo $client['station_id']  ?>" placeholder="Please Enter StationId"/>
                                             </div>
											  <label class="col-md-2">Grant Type <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="grand_type" value="<?php echo $client['grant_type']  ?>" placeholder="Please Enter Grand Type"/>
                                             </div> 
											 
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2">Token Username <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="token_username" value="<?php echo $client['token_username']  ?>" placeholder="Please Enter Valid Token UserName"/>
                                             </div>
                                             <label class="col-md-2">Token Password <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="password" class="form-control" name="token_password" placeholder="Please Enter Token Password"/>
                                             </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2">Store Code<span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="store_code" value="<?php echo $client['store_code']  ?>" placeholder="Please Enter Client Store Code"/>
                                             </div>
										</div><br/>
										<h4>Client Access Permissions</h4><hr/>
										
										<div class="form-group">
                                            <label class="col-md-12">Software Configuration <span class="required_fields"></span></label>
                                             <div class="col-md-12">
											
                                                <?php if($permissions->num_rows()>0){ $count = $permissions->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                            <?php /*<th><input type="checkbox" name="checked_all" id="checked_all" /></th><th>All</th>*/?>
                                                            <?php foreach($permissions->result() as $row){ ++$i;  ?>
                                                                <?php if($i==1){   ?>
                                                                    <tr>
																	<?php } ?>
                                                                    <td><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" <?php echo ($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))) ? ' checked="checked"' : '' ?> name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
																	<?php if($i==4){ $i = 0; ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </table>
                                                <?php } ?>
                                             </div>
                                        </div>
										<br><br>
										<div class="form-group">
                                            <label class="col-md-12">Solution Selection <span class="required_fields"></span></label><br/><br/>
											
											<?php 
											$sol=array(0=>5,1=>6,2=>7,3=>8,4=>9,5=>10,6=>11,7=>12,8=>13,9=>14,10=>15,11=>16,11=>17,12=>18);
											// echo count($sol);
											for($j=0;count($sol)>$j;$j++){
												$this->db->select('');
												$this->db->where('user_type', $sol[$j]);
												$this->db->from('permissions');
												$all_per = $this->db->get();
												// echo $this->db->last_query();
												//echo "<pre>";print_r($all_per->result());
												?>
												<div class="col-md-3" style="min-height:100px">
												<label><?php echo ucfirst($all_per->result()[0]->type_name)?></label>
                                                <?php if($all_per->num_rows()>0){ $count = $all_per->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                           <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
															<th>All</th>*/?>
                                                            <?php foreach($all_per->result() as $row){ ++$i;  ?>
                                                                
																<tr>
																	
                                                                    <td style="width:30px"><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" <?php echo ($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))) ? ' checked="checked"' : '' ?> name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
																</tr>
                                                                <?php //if($i==4){ $i = 0; ?>
                                                                    
                                                                <?php //} ?>
                                                            <?php } ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
												<?php
											}
											
											?>
                                             
												
                                        </div>
										
										
										<br/>
										<div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Clients'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
							  </div>
							  <!-- /.tab-pane -->
							  <div class="tab-pane" id="tab_2">
									
								<?php echo form_open_multipart('Admin/Clients/edit_client_permissions/' . $client['client_id'] . '/edit', array('id' => 'edit_client','class' => 'form-horizontal')); ?>		
							<div class="panel-body">
							
							<?php 
							$sol=array(1=>5,2=>6,3=>7,4=>8,5=>9,6=>10,7=>11,8=>12,);
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
								<div class="col-md-12" style="padding-left:0px">
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
									<?php 
									if($all_per->num_rows()>0){ 
									foreach($all_per->result() as $row){ 
										if($client['permissions'] !='' && in_array($row->key,explode(',',$client['permissions']))){ 
										?>
										<div class="col-md-12 offset-md-4">
										<h4 class="text-aqua"><?php echo  $row->description;?></h4>
										
										<?php 
										$this->db->select('');
										$this->db->where('per_id', $row->id);
										$this->db->from('permission_inner');
										$level1 = $this->db->get();
										?>
											
										<div class="col-md-4"><h5 class="text-light-blue"><strong>Tabular Report</strong></h5>
										<?php 
										
										foreach($level1->result() as $row1){ 
										if($row1->type=='tabular'){
											?>
											<input type="checkbox" class="selectCheckboxes" value="<?php echo $row1->per_key; ?>" <?php echo ($client['inner_permissions'] !='' && in_array($row1->per_key,explode(',',$client['inner_permissions']))) ? ' checked="checked"' : '' ?>   name="inner_permissions[]"/>&nbsp;&nbsp;&nbsp;<?php echo $row1->per_description; ?><br/>
											<?php 
										}
										}?>
										
										</div>
										<div class="col-md-4"><h5 class="text-light-blue"><strong>Graphical Report</strong></h5>
										<?php 
										
										foreach($level1->result() as $row1){ 
										if($row1->type=='graphical'){
											?>
											<input type="checkbox" class="selectCheckboxes" value="<?php echo $row1->per_key; ?>" <?php echo ($client['inner_permissions'] !='' && in_array($row1->per_key,explode(',',$client['inner_permissions']))) ? ' checked="checked"' : '' ?>  name="inner_permissions[]"/>&nbsp;&nbsp;&nbsp;<?php echo $row1->per_description; ?><br/>
											<?php 
										}
										}?>
										</div>
										<div class="col-md-4"><h5 class="text-light-blue"><strong>Alerts</strong></h5>
										<?php 
										
										foreach($level1->result() as $row1){ 
										if($row1->type=='alerts'){
											?>
											<input type="checkbox" class="selectCheckboxes" value="<?php echo $row1->per_key; ?>" <?php echo ($client['inner_permissions'] !='' && in_array($row1->per_key,explode(',',$client['inner_permissions']))) ? ' checked="checked"' : '' ?>   name="inner_permissions[]"/>&nbsp;&nbsp;&nbsp;<?php echo $row1->per_description; ?><br/>
											<?php 
										}
										}?>
										</div>
										
										<div style="clear:both"></div>
										<hr/>
										</div>
										<?php 
										}
									}
									}									
									?>              
									</div>
									<!-- /.box-body -->
								  </div>
								  <!-- /.box -->
								</div>
								
								
								<?php
							}
							
							?>
							
							</div>
							<div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Clients'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
							</form>
							  </div>
							  <!-- /.tab-pane -->
							  
							</div>
							<!-- /.tab-content -->
						  </div>
						  <!-- nav-tabs-custom -->
						</div>

								
						<?php else: ?>
                        <p><?php echo validation_errors(); ?></p>
						
						<div class="col-md-12" style="padding-left:0px">
						  <!-- Custom Tabs -->
						  <div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Info</a></li>
							  <!--<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="">Permissions</a></li>-->
							  
							</ul>
							<div class="tab-content">
							  <div class="tab-pane active" id="tab_1">
								<?php echo form_open_multipart('Admin/Clients/create_client/', array('id' => 'create_client','class' => 'form-horizontal')); ?>
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
									<h4>Personal Information</h4><hr/>
                                    <div class="form-group">
                                            <label class="col-md-2">Client Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="client_name" value="<?php echo set_value('client_name')  ?>" placeholder="Please Enter Client Name"/>
                                             </div>
											  <label class="col-md-2">Client Type <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="client_type" value="<?php echo set_value('client_type')  ?>" placeholder="Please Enter Client Type"/>
                                             </div> 
											 
                                        </div>  
                                    <div class="form-group">
                                            <label class="col-md-2">Email Id <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="email" class="form-control" name="email_id" value="<?php echo set_value('email_id')  ?>" placeholder="Please Enter Valid Email Id"/>
                                             </div>
                                             <label class="col-md-2">Password <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="password" class="form-control" name="password" value="" placeholder="Please Enter Password"/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Property Type <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <?php echo form_dropdown('property_type',$property_type,'','class="form-control select2"'); ?>
                                             </div>
											 <label class="col-md-2">Mobile <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile')  ?>" placeholder="Please Enter 10 Digit Mobile"/>
                                             </div> 
                                            
                                        </div>
										<div class="form-group">									

											<label class="col-md-2">City</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="city" value="" placeholder="Please Enter City"/>										
											</div>
											
											
											<label class="col-md-2">Address</label>
											<div class="col-md-3">
											<textarea class="form-control" name="address" placeholder="Please Enter Addess"></textarea>										
											</div>

											
											
										</div>	
										
										<div class="form-group">									

											<label class="col-md-2">No Buildings</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="no_buildings" value="" placeholder="Please Enter no_buildings"/>
											</div>
											<div class="col-md-2">
												<?php if(set_value('localcontactCount')!=''): 
                                                    $count = set_value('localcontactCount');
                                                 else: 
                                                     $count=0;
                                                endif; ?>
                                                <input type="hidden" value="<?php echo $count; ?>" id="localcontactCount" name="localcontactCount"/>
                                                <input type="hidden" value="<?php echo set_value('hiddenlocal'); ?>" id="hiddenlocal" name="hiddenlocal"/>
                                                <a style="cursor: pointer;margin-right: 5px;" class="btn btn-success btn-xs localdetails" onclick="addmorelocaldetails()"><i class="fa fa-plus-circle"></i> Add Building</a>
											</div>
										</div>
										
										<?php for($i=1;$i<=10;$i++): ?> 
											
												<div id="localcontactdetails<?php echo $i; ?>" class="locdetails" style="display:none;">  
											
											   <div class="col-md-12">
												<div class="form-group">
													<div class="col-md-3">
												   <b class="error"> <?php echo $i; ?>.</b>    <label class="lav">Building Name</label>
														<input type="text" class="form-control" name="building_name<?php echo $i; ?>" id="building_name<?php echo $i; ?>" value="<?php echo set_value('building_name'.$i); ?>" placeholder="Building Name"/>
													<?php echo form_error('building_name'. $i); ?>
													</div>
													<div class="col-md-3">
														<label class="lav">No. of Floors</label>
														<input type="text" class="form-control" name="floors<?php echo $i; ?>" id="floors<?php echo $i; ?>" value="<?php echo set_value('floors'.$i); ?>" placeholder="No. of Floors"/>
													<?php echo form_error('floors'. $i); ?>
													</div>   
													
													<div class="col-md-3">
														<label class="lav">Address</label>
														<textarea type="text" class="form-control" name="address<?php echo $i; ?>" id="address<?php echo $i; ?>" placeholder="Address"><?php echo set_value('address'.$i); ?></textarea>
													   <?php echo form_error('address'. $i); ?>
													</div>                              
												   
												
													<div class="col-md-1 text-right">
													<br />
															<a style="cursor: pointer;"   class="btn btn-danger btn-xs pull-right localdetails" onclick="removelocaldetails('<?php echo $i ?>')"><i class="fa fa-times"></i></a>                                                
													</div> 
												</div> 	
<hr /> 												
																				  
												</div> 
												                          
											</div>
																									  
											  
										<?php endfor; ?>				
										
										
										<div class="form-group">
                                            <label class="col-md-2">Sale By <span class="required_fields"></span> </label>
                                             <div class="col-md-3">
                                                <?php echo form_dropdown('partner_id',$partners,'','class="form-control select2"'); ?>
                                             </div>
											 <label class="col-md-2">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status">
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
										<br/>
										<h4>Classifications</h4><hr/>
										
										<div class="form-group">
                                            <label class="col-md-2">Type</label>
                                             <div class="col-md-3">
                                                <?php $tp = array('' => 'Select Type', '1' => 'New BMS','2' => 'Existing BMS','2' => 'WMS'); echo form_dropdown('tp',$tp,'','class="form-control select2"'); ?>
                                             </div>
											 <label class="col-md-2">Data </label>

                                             <div class="col-md-3">
                                                <?php $tp2 = array('' => 'Select Data', '1' => 'API','2' => 'IP','3' => 'Database'); echo form_dropdown('tp',$tp2,'','class="form-control select2"'); ?>
                                             </div>
											
                                            
                                        </div>
										<div class="form-group">
                                        
											 <label class="col-md-2">List </label>

                                             <div class="col-md-3">
                                                <?php $tp3 = array('' => 'Select List', '1' => 'Protech BMS','2' => 'Protech WMS'); echo form_dropdown('tp',$tp3,'','class="form-control select2"'); ?>
                                             </div>
                                            
                                        </div>
										<br/>
										<h4>Template</h4><hr/>
										
										<div class="form-group">
                                            <label class="col-md-2">Client Type</label>
                                             <div class="col-md-3">
                                                <?php $tp4 = array('' => 'Select Client Type', '1' => 'Hospital','2' => 'Hotel','3' => 'Commercial Complex'); echo form_dropdown('tp',$tp4,'','class="form-control select2"'); ?>
                                             </div>
											 <label class="col-md-2">Template </label>

                                             <div class="col-md-3">
                                                <?php $tp5 = array('' => 'Select Template', '1' => 'Standard'); echo form_dropdown('tp',$tp5,'','class="form-control select2"'); ?>
                                             </div>
											
                                            
                                        </div>
										<br/>
										<h4>Generating Access Token</h4><hr/>
										
										<div class="form-group">
                                            <label class="col-md-2">Station ID <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="station_id"
												value="<?php echo set_value('station_id')  ?>" placeholder="Please Enter StationId"/>
                                             </div>
											  <label class="col-md-2">Grant Type <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="grand_type" value="<?php echo set_value('grand_type')  ?>" placeholder="Please Enter Grant Type"/>
                                             </div> 
											 
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2">Token Username <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="token_username" value="<?php echo set_value('token_username')  ?>" placeholder="Please Enter Valid Token UserName"/>
                                             </div>
                                             <label class="col-md-2">Token Password <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="password" class="form-control" name="token_password" value="" placeholder="Please Enter Token Password"/>
                                             </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2">Store Code<span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="store_code" value="<?php echo set_value('store_code')  ?>" placeholder="Please Enter Client Store Code"/>
                                             </div>
										</div>
										
										<br/>
										<h4>Client Access Permissions</h4><hr/>
										<?php if($this->session->userdata('user_id')==1){?>
										<div class="form-group">
                                            <label class="col-md-12">Software Configuration <span class="required_fields"></span></label>
                                             <div class="col-md-12">
                                                <?php if($permissions->num_rows()>0){ $count = $permissions->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                           <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
															<th>All</th>*/?>
                                                            <?php foreach($permissions->result() as $row){ ++$i;  ?>
                                                                <?php if($i==1){   ?>
                                                                    <tr>
                                                                <?php } ?>
                                                                    <td><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
                                                                <?php if($i==4){ $i = 0; ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
                                        </div><br>
										
										<div class="form-group">
                                            <label class="col-md-12">Solution Selection <span class="required_fields"></span></label><br/><br/>
											
											<?php 
											$sol=array(0=>5,1=>6,2=>7,3=>8,4=>9,5=>10,6=>11,7=>12,8=>13,9=>14,10=>15,11=>16,12=>17,13=>18);
											// echo count($sol);
											for($j=0;count($sol)>$j;$j++){
												$this->db->select('');
												$this->db->where('user_type', $sol[$j]);
												$this->db->from('permissions');
												$all_per = $this->db->get();
												// echo $this->db->last_query();
												//echo "<pre>";print_r($all_per->result());
												?>
												<div class="col-md-3" style="min-height:100px">
												<label><?php echo ucfirst($all_per->result()[0]->type_name)?></label>
                                                <?php if($all_per->num_rows()>0){ $count = $all_per->num_rows(); $rows = floor($count/4);$i=0; ?>
                                                        <table class="table">
                                                           <?php /* <th><input type="checkbox" name="checked_all" id="checked_all" /></th>
															<th>All</th>*/?>
                                                            <?php foreach($all_per->result() as $row){ ++$i;  ?>
                                                                
																<tr>
                                                                    <td style="width:30px"><input type="checkbox" class="selectCheckboxes" value="<?php echo $row->key; ?>" name="permissions[]"/></td>
                                                                    <td><?php echo $row->description; ?></td>
																</tr>
                                                                <?php //if($i==4){ $i = 0; ?>
                                                                    
                                                                <?php //} ?>
                                                            <?php } ?>
                                                        </table>
                                                <?php } ?>                                             
												</div>
												<?php
											}
											
											?>
                                             
												
                                        </div>
										<?php } ?>
										
										<br/>
										
                                        <div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Clients'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<br/><br/>
								<?php echo form_open_multipart('Admin/Clients/create_permission/', array('id' => 'create_per','class' => 'form-horizontal')); ?>
										<div class="form-group col-md-3">
                                            <label class="col-md-12">Customised Automation <span class="required_fields">*</span></label><br/>
                                             <div class="col-md-12">
                                                <input type="text" class="form-control" name="per_key" value="<?php echo set_value('per_key')  ?>" placeholder="Enter Permission Name" required/>
                                             </div>
										</div>	 
										<div class="form-group col-md-3">
										
                                             <label class="col-md-12">Permission Type <span class="required_fields">*</span></label>
                                             <div class="col-md-12">
                                                <?php 
												$p_type=array(''=>'select',5=>'Water',6=>'Energy',7=>'Air Quality',8=>'Air Conditioning',9=>'Remote Control',10=>'Soft Integrations',11=>'Specialised Solutions',12=>'Billing',13=>'Switch Controls');
												echo form_dropdown('per_type',$p_type,'','class="form-control select2" required'); ?>
                                             </div>
                                        </div>
										<div class="form-group col-md-2">
											<label class="col-md-12"><span class="required_fields">&nbsp;</span></label>
                                             <div class="col-md-12 text-center">
                                                 <input type="submit" class="btn btn-success" value="Add">
                                                
                                             </div>
                                        </div>
									</form>
									<div style="clear:both"></div>
							  </div>
							  
							  <!--<div class="tab-pane" id="tab_2">
							  jhsdgahsgdhdghasg 2
							  </div>-->
							</div>
						  </div>
						</div>
								
                                
								
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.required_fields{color:red}</style>
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

	function addmorelocaldetails(){
               var count = parseInt($("#localcontactCount").val())+1;
               if(count<11){
                
                   $("#localcontactdetails"+count).show();
                   $("#localcontactCount").val(count);
                   
                    
               }else{
                   alert('You reached max limit');
               }               
    }
	function removelocaldetails(row){
		   var count = $("#hiddenlocal").val().trim();
		   $("#localcontactdetails"+row).hide();
		   $('#dob'+row).val('');
		   $('#passportisuedat'+row).val('');
		   $('#passportexp'+row).val('');
		   if(count.length==0){                   
			   $("#hiddenlocal").val(row);                   
		   }else{
			   $("#localcontactdetails"+row).remove();
			   count = count+','+row;
			   $("#hiddenlocal").val(count);
		   }               
	}
	
	function removelocaldetailss(bid){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Clients/remove_building/'+bid,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}
	
	// function create_per() {
  // alert( "Handler for  called." );
  // event.preventDefault();
// }

</script>
</body>
</html>
