<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/datepicker3.css">
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
                        <li class="active"><a href="<?php echo site_url('Admin/Hardware') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="hardware" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Hardware
                                <?php else: ?>
                                   Add Hardware
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if (isset($hardware) && $hardware): ?>
                                    <?php echo form_open_multipart('Admin/Hardware/edit_hardware/' . $hardware['hardware_id'] . '/edit', array('id' => 'edit_partner','class' => 'form-horizontal')); ?>
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
                                          
                                            <label class="col-md-2 text-right">Hardware Category <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                               <?php echo form_dropdown('hardware_category',$category,$hardware['hardware_category'],'class="form-control select2" id="category" onchange="getdevices()"'); ?>
                                             </div>
									
											  <label class="col-md-2 text-right">Hardware Device <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <?php echo form_dropdown('hardware_device', $device, $hardware['hardware_device'], 'class="form-control chosen-select" id="device" onchange="getfloors()"'); ?>
                                             </div> 
											 
                                        </div>  
										<div class="form-group">
                                          
										<label class="col-md-2 text-right">Dashboard Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="dashboard_name" value="<?php echo $hardware['dashboard_name']  ?>" placeholder="Please Enter Hardware Dashboard Name"/>
										 </div>
										 <label class="col-md-2 text-right">API Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="api_name" value="<?php echo $hardware['api_name']  ?>" placeholder="Please Enter Hardware API Name"/>
										 </div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Factory Serial No.<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="factory_sr_no" value="<?php echo $hardware['factory_sr_no']  ?>" placeholder="Please Enter Factory SR No."/>
										 </div>
										 
										  <label class="col-md-2 text-right floor">Floor <span class="required_fields">*</span></label>
                                             <div class="col-md-3 floor">
                                               <?php 
											   $floor=array(""=>"Select Floor",'Terrace'=>'Terrace','Basement-2'=>'Basement-2');
											   echo form_dropdown('floor',$floor,$hardware['floor'],'class="form-control select2" id="floor"'); ?>
                                             </div>
									</div>
									<div class="form-group">
                                          
										<label class="col-md-2 text-right capacity">Tank Height<span class="required_fields">*</span></label>
										 <div class="col-md-3 capacity">
										   <input type="text" class="form-control" name="tankheight" value="<?php echo $hardware['tank_height']  ?>" placeholder="Please Enter Tank Height."/>
										 </div>
										 
										 <label class="col-md-2 text-right capacity">Tank Width<span class="required_fields">*</span></label>
										 <div class="col-md-3 capacity">
										   <input type="text" class="form-control" name="tankwidth" value="<?php echo $hardware['tank_width']  ?>" placeholder="Please Enter Tank Width."/>
										 </div>
									</div><br/>
									<?php /*
								<div class="form-group">									   
								<div class="text-center col-md-9 col-md-offset-1 well well-sm no-shadow">
									<div class="form-group"><br/>
									<?php 
									
										if ($template->num_rows()!=0){
                                            foreach ($template->result() as $row) {  
											
											$template_values = $this->Hardware_model->get_hardware_template_values($hardware['hardware_id'],$row->temp_id);
											
											// echo "<pre>";print_r($template_values);
											?>
											
											<input type="hidden" class="form-control" name="<?php echo $row->control_name?>_id" value="<?php echo $row->temp_id?>"/>
											<label class="col-md-3"><?php echo ucfirst(str_replace("_"," ",$row->control_name));?> <span class="required_fields"></span></label>
											 <div class="col-md-3" style="margin-bottom:20px;">
											 
											 <?php if($row->control_type=="dropdown"){
												$a=$row->control_value;
												$b=json_decode($a,TRUE);
			
											$items = array();
											foreach($b as $key=>$value)
											{
												$items[$value]=$value;
											}
		
											 echo form_dropdown($row->control_name,$items,$template_values['field_value'],'class="form-control select2"'); ?>
											 
											 <?php }elseif($row->control_type=="textbox"){ ?>
											 
												<input type="text" class="form-control" name="<?php echo $row->control_name?>" value="<?php echo $template_values['field_value']?>"/>
												
											 <?php }else{?>
												<label class="switch text-left">
												  <input type="checkbox" name="<?php echo $row->control_name ?>" <?php echo ($template_values['field_value']=='on'?'checked':'');?>>
												  <span class="slider round"></span>
												  </label> 
											<?php } ?>
											 </div>
										<?php } }else{
											?>
											<h1>Template Not Created</h1>
											<a href="<?php echo site_url('Admin/Hardware_template/create_hardware_template')?>">Click Here</a> to Create Template
											<?php
										}?>
										  
									</div>  
								
								</div>
						
							</div> */?>
									
										
									<div class="form-group">
										<div class="col-md-10 text-center">
										<h3>Installation</h3>
										</div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Installation Location<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="installation_location" value="<?php echo $hardware['installation_location']  ?>" placeholder="Please Enter Installation Location"/>
										 </div>
										 <label class="col-md-2 text-right">Date of Installation<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="installation_date"  id="datepicker" value="<?php echo $hardware['date_of_installation']  ?>" placeholder="Please Enter Installation Date"/>
										 </div>
									</div>
									
									
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Installed By<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="installed_by" value="<?php echo $hardware['installed_by']  ?>" placeholder="Please Enter Installed By">
										 </div>
										 <label class="col-md-2 text-right">Supervised By<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="supervised_by" value="<?php echo $hardware['supervised_by']  ?>" placeholder="Please Enter Supervised By"/>
										 </div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Upload Picture<span class="required_fields"></span></label>
										
										   <div class="col-md-3">
                                                <input type="file" class="form-control" name="pic"/>
												<input  type="hidden" class="form-control" name="old_file" value="<?php echo $hardware['upload_pic'];?>"/> 
												<br/>
												<?php if($hardware['upload_pic']!=''){

												$str=explode(",",$hardware['upload_pic']);
												foreach($str as $stra)

												{?>
												<?php if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
												<img src="<?php echo site_url() ?>asset/admin/installation_pic/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> 
												<?php }} 
												} ?>
										
                                             </div>
										
									</div>
									
									<div class="form-group">
										<div class="col-md-10 text-center">
										<h3>Api Info</h3>
										</div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Utility Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="UtilityName" value="<?php echo $hardware['UtilityName']  ?>" placeholder="Please Enter Utility Name"/>
										 </div>
										 
										 <label class="col-md-2 text-right not">Line Connected<span class="required_fields">*</span></label>
										 <div class="col-md-3 not">
										   <input type="text" class="form-control" name="LineConnected" value="<?php echo $hardware['LineConnected']  ?>" placeholder="Please Enter Line Connected"/>
										 </div>
									</div>
									<div class="form-group firepump">
                                          
										<label class="col-md-2 text-right">Line Connected Auto<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="LineConnectedAuto" value="<?php echo $hardware['LineConnectedAuto']  ?>" placeholder="Please Enter LineConnectedAuto"/>
										 </div>
										 
										 <label class="col-md-2 text-right">Line Connected Manual<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="LineConnectedManual" value="<?php echo $hardware['LineConnectedManual']  ?>" placeholder="Please Enter LineConnectedManual"/>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-2 text-right">Uom Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="UomName" value="<?php echo $hardware['UomName']  ?>" placeholder="Please Enter Uom Name"/>
										 </div>
										 <label class="col-md-2 text-right">Location Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="LocationName" value="<?php echo $hardware['LocationName']  ?>"  placeholder="Please Enter Location Name"/>
										 </div>
										 
									</div>
									<div class="form-group">
										<label class="col-md-2 text-right">Status <span class="required_fields"></span>(Active / Inactive)</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status" <?php echo ($hardware['status']==1)?'checked':''?>>
												  <span class="slider round"></span>
												  </label>
											</div>
											<label class="col-md-2 text-right capacity">Tank Capacity<span class="required_fields">*</span></label>
											<div class="col-md-2 capacity">
												<input type="text" class="form-control" name="capacity" value="<?php echo $hardware['capacity']  ?>" placeholder="Please Enter Tank Capacity"/>
											</div>
											<div class="col-md-1 capacity"><label style="float:left">K Ltrs</label></div>
									</div>
									<div class="form-group">
										
											<label class="col-md-2 text-right capacity">Multiplier</label>
											<div class="col-md-2 capacity">
												<input type="text" class="form-control" name="multiplier" value="<?php echo $hardware['multiplier']  ?>" placeholder="Please Enter Multiplier"/>
											</div>
											
									</div>
										<div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<?php else: ?>
                                <p><?php echo validation_errors(); ?></p>
                                <?php echo form_open_multipart('Admin/Hardware/create_hardware/', array('id' => 'create_hardware_template','class' => 'form-horizontal')); ?>
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
										 <div class="col-md-3">
										   <?php echo form_dropdown('hardware_category',$category,'','class="form-control select2" id="category" onchange="getdevices()"'); ?>
										 </div>
								
										  <label class="col-md-2  text-right">Hardware Device <span class="required_fields">*</span></label>

										 <div class="col-md-3">
											<?php /*echo form_dropdown('hardware_device', $device, '', 'class="form-control chosen-select" id="device" onchange="gettemplate()"'); */?>
											<?php echo form_dropdown('hardware_device', $device, '', 'class="form-control chosen-select" id="device" onchange="getfloors()"'); ?>
										 </div> 
											 
                                    </div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Dashboard Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="dashboard_name" value="<?php echo set_value('dashboard_name')  ?>" placeholder="Please Enter Hardware Dashboard Name"/>
										 </div>
										 <label class="col-md-2 text-right">API Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="api_name" value="<?php echo set_value('api_name')  ?>" placeholder="Please Enter Hardware API Name"/>
										 </div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Factory Serial No.<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="factory_sr_no" value="<?php echo set_value('factory_sr_no')  ?>" placeholder="Please Enter Factory SR No."/>
										 </div>
										 
										 <label class="col-md-2 text-right floor">Floor <span class="required_fields">*</span></label>
                                             <div class="col-md-3 floor">
                                               <?php 
											   $floor=array(""=>"Select Floor",'Terrace'=>'Terrace','Basement-2'=>'Basement-2');
											   echo form_dropdown('floor',$floor,"",'class="form-control select2" id="floor" '); ?>
                                             </div>
									</div>
									<div class="form-group">
                                          
										<label class="col-md-2 text-right capacity">Tank Height<span class="required_fields">*</span></label>
										 <div class="col-md-3 capacity">
										   <input type="text" class="form-control" name="tankheight" value="<?php echo set_value('tankheight')  ?>" placeholder="Please Enter Tank Height."/>
										 </div>
										 
										 <label class="col-md-2 text-right capacity">Tank Width<span class="required_fields">*</span></label>
										 <div class="col-md-3 capacity">
										   <input type="text" class="form-control" name="tankwidth" value="<?php echo set_value('tankwidth')  ?>" placeholder="Please Enter Tank Width."/>
										 </div>
									</div>
									
									<?php /*<div id="hardware_template">
									</div>*/?>
									
									<div class="form-group">
										<div class="col-md-10 text-center">
										<h3>Installation</h3>
										</div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Installation Location<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="installation_location" value="<?php echo set_value('installation_location')  ?>" placeholder="Please Enter Installation Location"/>
										 </div>
										 <label class="col-md-2 text-right">Date of Installation<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="installation_date"  id="datepicker" value="<?php echo set_value('installation_date')  ?>" placeholder="Please Enter Installation Date"/>
										 </div>
									</div>
									
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Installed By<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="installed_by" value="<?php echo set_value('installed_by')  ?>" placeholder="Please Enter Installed By">
										 </div>
										 <label class="col-md-2 text-right">Supervised By<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="supervised_by" value="<?php echo set_value('supervised_by')  ?>" placeholder="Please Enter Supervised By"/>
										 </div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Upload Picture<span class="required_fields"></span></label>
										 <div class="col-md-3">
										   <input type="file" class="form-control" name="pic" value="<?php echo set_value('installated_by')  ?>" placeholder="Please Enter Installated By">
										 </div>
									</div>
									
									<div class="form-group">
										<div class="col-md-10 text-center">
										<h3>Api Info</h3>
										</div>
									</div>
									
									<div class="form-group">
                                          
										<label class="col-md-2 text-right">Utility Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="UtilityName" value="<?php echo set_value('UtilityName')  ?>" placeholder="Please Enter Utility Name"/>
										 </div>
										 
										 <label class="col-md-2 text-right not">Line Connected<span class="required_fields">*</span></label>
										 <div class="col-md-3 not">
										   <input type="text" class="form-control" name="LineConnected" value="<?php echo set_value('LineConnected')  ?>" placeholder="Please Enter Line Connected"/>
										 </div>
									</div>
									<div class="form-group firepump">
                                          
										<label class="col-md-2 text-right">Line Connected Auto<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="LineConnectedAuto" value="<?php echo set_value('LineConnectedAuto')  ?>" placeholder="Please Enter LineConnectedAuto"/>
										 </div>
										 
										 <label class="col-md-2 text-right">Line Connected Manual<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="LineConnectedManual" value="<?php echo set_value('LineConnectedManual')  ?>" placeholder="Please Enter LineConnectedManual"/>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-2 text-right">Uom Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="UomName" value="<?php echo set_value('UomName')  ?>" placeholder="Please Enter Uom Name"/>
										 </div>
										 <label class="col-md-2 text-right">Location Name<span class="required_fields">*</span></label>
										 <div class="col-md-3">
										   <input type="text" class="form-control" name="LocationName" placeholder="Please Enter Location Name"/>
										 </div>
									</div>
									<div class="form-group">
										 <label class="col-md-2 text-right">Status <span class="required_fields"></span>(Active / Inactive)</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status">
												  <span class="slider round"></span>
												  </label>
											</div>
											
										 <label class="col-md-2 text-right capacity">Tank Capacity<span class="required_fields">*</span></label>
										 <div class="col-md-2 capacity">
										   <input type="text" class="form-control" name="capacity" placeholder="Please Enter Tank Capacity"/>
										 </div>
										 <div class="col-md-1 capacity"><label style="float:left">K Ltrs</label></div>
									</div>
									<div class="form-group">
										
											<label class="col-md-2 text-right capacity">Multiplier</label>
											<div class="col-md-2 capacity">
												<input type="text" class="form-control" name="multiplier"  placeholder="Please Enter Multiplier"/>
											</div>
											
									</div>
										 
										
										
                                        <div class="form-group">
                                             <div class="col-md-12 text-center"><br/><br/><br/><br/>
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware'); ?>" class="btn btn-default">Cancel</a>
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
<style>.required_fields{color:red}</style>
<script src="<?php echo base_url(); ?>asset/admin/js/bootstrap-datepicker.js"></script>

<script>
$('.floor').hide();
$('.capacity').hide();
<?php if (isset($hardware)){ ?>
// alert("asdasdsad");
var device_id=<?php echo $hardware['hardware_device']?>;
if(device_id!=3){
	$('.firepump').hide();
}
if(device_id==19){
	$('.floor').show();
	$('.capacity').show();
}
<?php } ?>
$('#datepicker').datepicker({
	   format: 'yyyy-mm-dd',
      autoclose: true
    });
function getdevices(){
    $("#device").html("");
    var category = $("#category").val();
    
        // $(".device").show();
  
    $.ajax({
        type: 'GET',
        data: {
            category:category
        },
        url: BASE_URL+'Admin/Hardware_template/ajax_hardware_device_dropdown/',
        success: function (data){
            $("#device").html(data);
            $("#device").trigger("chosen:updated");
        }
    });
}

function gettemplate(){    
    var category = $("#category").val();
	var device = $("#device").val();
	if(device==3){
		$('.firepump').show();		
	}else{
		$('.firepump').hide();	
	}
    $.ajax({
        type: 'GET',
        data: {
            category:category,
			device:device
        },
        url: BASE_URL+'Admin/Hardware/ajax_hardware_template/',
        success: function (data){
            $("#hardware_template").html(data);
            
        }
    }); 
}

function getfloors(){
	var device = $("#device").val();
	// alert(device);
	if(device==19){
		$('.floor').show();
		$('.capacity').show();
	}
}

</script>
</body>
</html>