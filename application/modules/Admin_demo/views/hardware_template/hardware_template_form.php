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
                        <li class="active"><a href="<?php echo site_url('Admin/Hardware_template') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="hardware" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Hardware Template
                                <?php else: ?>
                                   Add Hardware Template
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if (isset($template) && $template): ?>
                                    <?php echo form_open_multipart('Admin/Hardware_template/edit_template/' . $category_id . '/edit', array('id' => 'edit_partner','class' => 'form-horizontal')); ?>
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
                                               <?php echo form_dropdown('hardware_category',$category,$category_id,'class="form-control select2" id="category" onchange="getdevices()"'); ?>
                                             </div>
									
											  <label class="col-md-2">Hardware Device <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <?php echo form_dropdown('hardware_device', $device, $device_id, 'class="form-control chosen-select" id="device"'); ?>
                                             </div> 
											 
                                        </div>  
										<br/><br/>
										
										
										<div class="col-md-4 text-center">
											<input id="btnAdd1" class="btn btn-info" type="button" value="Add Dropdown" />
											<br />
											<br />
											<div id="DropdownContainer">
												<!--Dropdown will be added here -->
											</div>
										</div>
										
										<div class="col-md-3 text-center">
											<input id="btnAdd" class="btn btn-info" type="button" value="Add Textbox" />
											<br />
											<br />
											<div id="TextBoxContainer">
												<!--Dropdown will be added here -->
											</div>
										</div>
										
										
										
										<div class="col-md-3 text-center">
											<input id="btnAdd2" class="btn btn-info" i type="button" value="Add Radio Button" />
											<br />
											<br />
											<div id="RadioContainer">
												<!--Radio will be added here -->
											</div>
										</div>
										
                                    
										<input type="hidden" name="textbox_data" value="" id="textbox_data">
										<input type="hidden" name="dropdown_data" value="" id="dropdown_data"><br><br>
										<div class="form-group">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Partners'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<?php else: ?>
                                <p><?php echo validation_errors(); ?></p>
                                <?php echo form_open_multipart('Admin/Hardware_template/create_hardware_template/', array('id' => 'create_hardware_template','class' => 'form-horizontal')); ?>
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
									
											  <label class="col-md-2">Hardware Device <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <?php echo form_dropdown('hardware_device', $device, '', 'class="form-control chosen-select" id="device"'); ?>
                                             </div> 
											 
                                        </div>  
										<br/><br/>
										
										
										<div class="col-md-4 text-center">
											<input id="btnAdd1" class="btn btn-info" type="button" value="Add Dropdown" />
											<br />
											<br />
											<div id="DropdownContainer">
												<!--Dropdown will be added here -->
											</div>
										</div>
										
										<div class="col-md-3 text-center">
											<input id="btnAdd" class="btn btn-info" type="button" value="Add Textbox" />
											<br />
											<br />
											<div id="TextBoxContainer">
												<!--Dropdown will be added here -->
											</div>
										</div>
										
										
										
										<div class="col-md-3 text-center">
											<input id="btnAdd2" class="btn btn-info" i type="button" value="Add Radio Button" />
											<br />
											<br />
											<div id="RadioContainer">
												<!--Radio will be added here -->
											</div>
										</div>
										
                                    
										<input type="hidden" name="textbox_data" value="" id="textbox_data">
										<input type="hidden" name="dropdown_data" value="" id="dropdown_data">
										
                                        <div class="form-group">
                                             <div class="col-md-12 text-center"><br/><br/><br/><br/>
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Hardware_template'); ?>" class="btn btn-default">Cancel</a>
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
<style>.textbox{padding:7px;border:1px solid;
            border-color:#d2d6de;}
			.red{color:red}</style>
<script>
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


$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<div />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
	$("#btnAdd1").one("click", function () {
		
        var div = $("<div />");
        var aaa = $('<div class="col-md-8"><input name = "Dynamicdropdownname" placeholder="Enter Dropdown Name" class="col-md-12 textbox" type="text" value = "" /></div><input type="button" value="Add Items" class="col-md-3 additem btn btn-small btn-info" /><br/><br/>');
        // div.html(GetDynamicDropdown(""));
        $("#DropdownContainer").append(div);
        $("#DropdownContainer").append(aaa);
    });
	$("#btnAdd2").one("click", function () {
        var div = $("<div />");
        div.html(GetDynamicRadio(""));
        $("#RadioContainer").append(div);
    });
	
	$("body").on("click", ".additem", function () {
		var div = $("<div />");
		div.html(GetDynamicDropdown(""));
        $("#DropdownContainer").append(div);
	});
    $("#create_hardware_template").bind("click", function () {
        var values = "";
        $("input[name=DynamicTextBox]").each(function () {
            values += $(this).val()+',';
        });
		
		var dvalues = "";
        $("input[name=Dynamicdropdown]").each(function () {
            dvalues += $(this).val()+',';
        });
		$("#textbox_data").val(values);
		$("#dropdown_data").val(dvalues);
		// alert(values);
        
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });
});
function GetDynamicTextBox(value) {
    return '<input name = "DynamicTextBox" placeholder="Enter Textbox Label Name" class="col-md-10 textbox" type="text" value = "' + value + '" /><input type="button" value="X" class="remove btn btn-small btn-danger" /><br/><br/>'
}
function GetDynamicDropdown(value) {
    return '<div class="col-md-8"><input name = "Dynamicdropdown[]" placeholder="Enter Item Name" class="col-md-12 textbox" type="text" value = "' + value + '" /></div><input type="button" value="X" class="col-md-1 remove btn btn-small btn-danger" /><br/><br/>'
}
function GetDynamicRadio(value) {
    return '<div class="col-md-10"><input name = "DynamicRadio" placeholder="Enter Radio Button Name" class="col-md-12 textbox" type="text" value = "' + value + '" /></div><input type="button" value="X" class="remove btn btn-small btn-danger" /><br/><br/><span class="red">Radio Button Options Will be <b>Yes / No</b></span>'
}

</script>
</body>
</html>
