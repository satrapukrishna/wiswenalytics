<?php //echo "jjj";die();?>
<html>
<head>
    <?php $this->load->view('common/css') ?>
	
  
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
		<div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
			
			<div class="DshBrdSctn">
				<div class="DshBrdSctnTtl" id="water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu.png" width="30" />AHU Controlling</span>
				</div>
				<div class="WtrMngtDshHldr">
                	<form name="watermeter" id="myForm" action="" method="post" onSubmit="return formValidation();">
						<div class="SttngsMnDv">
							<div class="FrmMnDv">
                            <div class="FldHldr Hlf">
                                <span class="FrmTxt" ><b>Select AHU<b></span>
                               <?php //echo form_dropdown('hardware', $meters, $scheduled['meter_id'], 'class="Inpt" id="hardware"'); ?>
                                <select id="Select1" class="Inpt">
                                    <option>AHU 1</option>
                                    <option>AHU 2</option>
                                    <option>AHU 3</option>
                                    <option>AHU 4</option>
                                    
                                </select>
                            </div>
                            

                        	</div>
							<div class="FrmMnDv">
                            <div class="FldHldr Hlf">
                                <span class="FrmTxt" ><b>Status<b></span>
                               <?php //echo form_dropdown('hardware', $meters, $scheduled['meter_id'], 'class="Inpt" id="hardware"'); ?>
                               
								<div class="switch-field">
									<input type="radio" id="radio-one" name="switch-one" value="yes" checked/>
									<label for="radio-one">ON</label>
									<input type="radio" id="radio-two" name="switch-one" value="no" />
									<label for="radio-two">OFF</label>
								</div>

                            </div>
						 	</div>
							<div class="FrmMnDv">
                            <div class="FldHldr Hlf">
                                <span class="FrmTxt" ><b>Set Temperature<b></span>
                               <?php //echo form_dropdown('hardware', $meters, $scheduled['meter_id'], 'class="Inpt" id="hardware"'); ?>
                               
								<div >
									<input type="text"  value="26.8" />
									
								</div>

                            </div>
							</div>
							<div class="FrmMnDv">
                            <div class="FldHldr Fll BtnHldr">
                            	<button type="submit" id="filter" class="InptBtn">Update</button>
                            </div>
                        	</div>
						</div>
					</form>
                </div>
			</div>
			<?php $this->load->view('common/footer3') ?>
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

