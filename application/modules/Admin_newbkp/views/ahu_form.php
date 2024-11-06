<?php //echo "jjj";die();?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css">
  <style>
	
	input[type="checkbox"][readonly] {
  pointer-events: none;
}
</style>
	
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		<div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2" style="top:20px">
			<div class="DshBrdSctn">
				<input type="hidden" id="page" value="watermeter" />
			</div>
			<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <small></small>
                    </h1>
                    
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="accounts" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                               AHU Controlling
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
							<?php echo form_open_multipart('Admin/Home/create_account/', array('id' => 'create_account','class' => 'form-horizontal')); ?>
                                    
										
                                        <div class="form-group">
											<label class="col-md-2">Select AHU<span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <?php $ahus= array('1' => 'AHU 1','2'=>'AHU2'); echo form_dropdown('ahus',$ahus,'','class="form-control select2"'); ?>
                                             </div> 
											  
											 
                                        </div>  
										<div class="form-group">
											<label class="col-md-2">Status<span class="required_fields">*</span></label>

                                             <div class="col-md-3">
											 	<div class="switch-field">
													<input type="radio" id="radio-one" name="switch-one" value="yes" checked/>
													<label for="radio-one">ON</label>
													<input type="radio" id="radio-two" name="switch-one" value="no" style="margin-left:25px" />
													<label for="radio-two">OFF</label>
												</div>
                                             </div> 
											  
											 
                                        </div>  
                                    
                                        <div class="form-group">
											 
                                            
											 <label class="col-md-2">Set Temperature <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
											 <input type="text" class="form-control" name="client_name" value="26.5" />
                                             </div>
                                        </div>
																			
										
										<br><br>
                                        <div class="form-group">
                                             <div class="col-md-12">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Update</button> &nbsp;
                                                <!-- <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Accounts'); ?>" class="btn btn-default">Cancel</a> -->
                                             </div>
                                        </div>
                                </form>
                            
                        </div>
                    </div>
                </section>
            </div>
  <!-- /.content-wrapper -->
			<?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
  
  
</div>

</body>


<script>

$('select#schedule').change(function () {
$('.Hghlght').remove();
var val = $(this).val();
for (var x = 1; x <= val; x++) {
var createInputTextBox = ' <div class="FrmMnDv Hghlght"><span class="FrmTxtTtl">Reading '+x+'</span><div class="FldHldr Hlf"><span class="FrmTxt">From Time</span><select id="from'+x+'" name="from'+x+'" class="Inpt"><option value="">Please Select</option><option value="07:00:00">07:00 AM</option><option value="10:00:00">10:00 AM</option><option value="14:00:00">02:00 PM</option><option value="18:00:00">06:00 PM</option></select></div><div class="FldHldr Hlf"><span class="FrmTxt">To Time</span><select id="to'+x+'" name="to'+x+'" class="Inpt"><option value="">Please Select</option><option value="09:00:00">09:00 AM</option><option value="12:00:00">12:00 PM</option><option value="16:00:00">04:00 PM</option><option value="20:00:00">08:00 PM</option></select></div></div>';
$('div#text').append(createInputTextBox);
}
});
function formValidation()
{
var meter = $("#hardware").val();
var schedule = $("#schedule").val();

// alert(multiMeter);return false;
if(meter==''){
	$('#error').html("plaese select Meter");
	// $('.search_box').show();
	// $('.show_button').show();
	// $('.change_search').hide();
	return false;	
}
if(schedule==0){
	$('#error').html("plaese select Schedule");
	// $('.search_box').show();
	// $('.show_button').show();
	// $('.change_search').hide();
	return false;	
}


$('#loader').show();
var ele = $("#loader");
setTimeout(function() { ele.hide(); }, 10000);

return true;
}

 </script>	
</html>

