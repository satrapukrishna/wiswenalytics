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
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="watermeter" />
		
		</div>
		
		
        
            <div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
                <div class="DshBrdSctnTtl" id="water">
                    <span class="TxtTtl imageadd">Add Water Meter Schedule</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
                </div>
				
				
                <div class="WtrMngtDshHldr">
                <span id="error" style="color:red"></span>
                <form name="watermeter" id="myForm" action="<?php echo site_url("Admin/Home/addschedule")?>" method="post" onSubmit="return formValidation();">	
                   
                    <div class="SttngsMnDv">
                        <div class="FrmMnDv">
                            <div class="FldHldr Hlf">
                                <span class="FrmTxt">Select Water Meter</span>
                               <?php echo form_dropdown('hardware', $meters, $this->input->post('hardware'), 'class="Inpt" id="hardware"'); ?>
                                <!-- <select id="Select1" class="Inpt">
                                    <option>Water Meter 1</option>
                                    <option>Water Meter 2</option>
                                    <option>Water Meter 3</option>
                                    <option>Water Meter 4</option>
                                    
                                </select> -->
                            </div>
                            <div class="FldHldr Hlf">
                                <span class="FrmTxt">No. of Schedules</span>
                                <select id="schedule" name="schedule" class="Inpt">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>

                                </select>
                            </div>

                        </div>
                        <div id="text">

                        </div>
                        <!-- <div class="FrmMnDv Hghlght">
                            <span class="FrmTxtTtl">Reading 1</span>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">From Time</span>
                                <select id="reading1from" name="reading1from" class="Inpt">
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">AM/ PM</span>
                                <select id="Select4" class="Inpt">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">To Time</span>
                                <select id="reading1to" name="reading1to" class="Inpt">
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">AM/ PM</span>
                                <select id="Select6" class="Inpt">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="FrmMnDv Hghlght">
                            <span class="FrmTxtTtl">Reading 2</span>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">From Time</span>
                                <select id="reading2from" name="reading2from" class="Inpt">
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">AM/ PM</span>
                                <select id="Select8" class="Inpt">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">To Time</span>
                                <select id="reading2to" name="reading2to" class="Inpt">
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">AM/ PM</span>
                                <select id="Select10" class="Inpt">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="FrmMnDv Hghlght">
                            <span class="FrmTxtTtl">Reading 3</span>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">From Time</span>
                                <select id="reading3from" name="reading3from" class="Inpt">
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">AM/ PM</span>
                                <select id="Select8" class="Inpt">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">To Time</span>
                                <select id="reading3to" name="reading3to" class="Inpt">
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                </select>
                            </div>
                            <div class="FldHldr Qtr">
                                <span class="FrmTxt">AM/ PM</span>
                                <select id="Select10" class="Inpt">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="FrmMnDv">
                            <div class="FldHldr Fll BtnHldr">
                            <button type="submit" id="filter" class="InptBtn">Filter</button>
                                <!-- <input id="Button1" class="InptBtn" type="button" value="Save" /> -->
                            </div>
                        </div>
                    </div>
</form>
                </div>
				</div>
            <!-- Bore Wells code ends -->
           
           
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
var createInputTextBox = ' <div class="FrmMnDv Hghlght"><span class="FrmTxtTtl">Reading '+x+'</span><div class="FldHldr Hlf"><span class="FrmTxt">From Time</span><select id="from'+x+'" name="from'+x+'" class="Inpt"><option value="">Please Select</option><option value="00:00:00">12:00 AM</option><option value="01:00:00">01:00 AM</option><option value="02:00:00">02:00 AM</option><option value="03:00:00">03:00 AM</option><option value="04:00:00">04:00 AM</option><option value="05:00:00">05:00 AM</option><option value="06:00:00">06:00 AM</option><option value="07:00:00">07:00 AM</option><option value="08:00:00">08:00 AM</option><option value="09:00:00">09:00 AM</option><option value="10:00:00">10:00 AM</option><option value="11:00:00">11:00 AM</option><option value="12:00:00">12:00 PM</option><option value="13:00:00">01:00 PM</option><option value="14:00:00">02:00 PM</option><option value="15:00:00">03:00 PM</option><option value="16:00:00">04:00 PM</option><option value="17:00:00">05:00 PM</option><option value="18:00:00">06:00 PM</option><option value="19:00:00">07:00 PM</option><option value="20:00:00">08:00 PM</option><option value="21:00:00">09:00 PM</option><option value="22:00:00">10:00 PM</option><option value="23:00:00">11:00 PM</option></select></div><div class="FldHldr Hlf"><span class="FrmTxt">To Time</span><select id="to'+x+'" name="to'+x+'" class="Inpt"><option value="">Please Select</option><option value="00:00:00">12:00 AM</option><option value="01:00:00">01:00 AM</option><option value="02:00:00">02:00 AM</option><option value="03:00:00">03:00 AM</option><option value="04:00:00">04:00 AM</option><option value="05:00:00">05:00 AM</option><option value="06:00:00">06:00 AM</option><option value="07:00:00">07:00 AM</option><option value="08:00:00">08:00 AM</option><option value="09:00:00">09:00 AM</option><option value="10:00:00">10:00 AM</option><option value="11:00:00">11:00 AM</option><option value="12:00:00">12:00 PM</option><option value="13:00:00">01:00 PM</option><option value="14:00:00">02:00 PM</option><option value="15:00:00">03:00 PM</option><option value="16:00:00">04:00 PM</option><option value="17:00:00">05:00 PM</option><option value="18:00:00">06:00 PM</option><option value="19:00:00">07:00 PM</option><option value="20:00:00">08:00 PM</option><option value="21:00:00">09:00 PM</option><option value="22:00:00">10:00 PM</option><option value="23:00:00">11:00 PM</option></select></div></div>';
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

