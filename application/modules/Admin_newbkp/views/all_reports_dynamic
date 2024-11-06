<?php //echo "string"; ?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
<style>	
body{font: 400 12px 'Open Sans'!important;}
#error{padding-left:20px!important;}
.table>thead>tr>th{border-bottom: 1px solid #3c8dbc!important;}
.btn{font: 600 15px 'Open Sans'!important}
.form-control {
    
    width: 175px !important;
}
img {
vertical-align: middle;
margin-right:10px;}
.form-control{float:left}
table td,table th,.table>thead>tr>th{font:500 15px 'Open Sans'!important;border-right:1px solid #3c8dbc;border: 1px solid #3c8dbc;}
table th,table tr{text-align:center}


.loader {
  border: 16px solid #e4e4e4;
  border-radius: 50%;
  border-top: 16px solid #5bc0de;
  margin-left: 50%;
  margin-top:-42px;
  width: 50px;
  height: 50px;
  -webkit-animation-duration: 7s;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.text-head{
    color: #fff;
	background: #468dbc;
   font:600 18px 'Open Sans'!important;
    border-bottom:1px solid #468dbc;
    padding: 10px;
}
select,input{
	margin-bottom: 10px;
	margin-right: 5px;
}
table th{
	color: #468dbc;
}
.report-text{
	padding:15px; 
	font: 700 20px 'Open Sans'!important;
	
    color: #3c8dbc;
   
    background: #fff;
    border-bottom: 1px solid #f3f3f3;border-top-left-radius: 10px;border-top-right-radius: 10px;font-weight:600;margin-bottom:0px
}
	
.radio-but{margin-left:15px;margin-right:10px;padding-top:20px;}
.radio-inline{border-bottom:1px solid #f3f3f3;padding-bottom:14px}
.radio-inline:hover{border-bottom:1px solid #3c8dbc}
.label-name,.radio-inline{padding-left:0px; font: 600 14px 'Open Sans'!important;color:#656262}
.form-control1{float:left;width:185px;padding-top:5px;padding-bottom:15px;}
.form-control{border-radius: 5px !important;font: 400 13px 'Open Sans'!important;color:#656262}
.filter-success{background:#3c8dbc;borber:1px solid #093956;color:#fff;padding-left:25px;padding-right:25px}
.filter-success:hover{background:#2c78a3;color:#fff}
.reset{padding-left:25px;padding-right:25px}


.multiselect-native-select {
		position: relative;		
		border: 0 !important;
		clip: rect(0 0 0 0) !important;
		height: 1px !important;
		margin: -1px -1px -1px -3px !important;
		overflow: hidden !important;
		padding: 0 !important;
		position: absolute !important;
		width: 1px !important;
		left: 50%;
		top: 30px;
		
	}
	.multiselect-container {
		position: absolute;
		list-style-type: none;
		margin: 0;
		padding: 0;
		.input-group {
			margin: 5px;
		}
		li {
			padding: 0;
			.multiselect-all {
				label {
					font-weight: 700;
				}
			}
			a {
				padding: 0;
				label {
					margin: 0;
					height: 100%;
					cursor: pointer;
					font-weight: 400;
					padding: 3px 20px 3px 40px;
					input[type=checkbox] {
						margin-bottom: 5px;
					}
				}
				label.radio {
					margin: 0;
				}
				label.checkbox {
					margin: 0;
				}
			}
		}
		li.multiselect-group {
			label {
				margin: 0;
				padding: 3px 20px 3px 20px;
				height: 100%;
				font-weight: 700;
			}
		}
		li.multiselect-group-clickable {
			label {
				cursor: pointer;
			}
		}


	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>


<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       <input type="hidden" id="page" value="runninggg" />
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn" style="padding: 10px 30px 10px 38px;">
			<div class="DshBrdSctnDtls">
				<h2 class="report-text">Reports</h2>
			
			<div style="background:#fff;">
			<?php //echo "<pre>";print_r($_POST);?>
				<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports_search")?>" method="post" onSubmit="return formValidation();">				
					<div class="col-md-12" style="background: #f3f3f3;margin-top: -13px;padding-bottom:20px;border-bottom:#ccc 1px solid">
							<div class="search_box">
							<div class="radio-but"style="border-bottom:1px solid #ccc">
								<label class="radio-inline">
								  <input type="radio" id="typec" name="report_type" class="checkbox_check" value="0" onchange="getCatagory('0')"  checked>Tabular Report
								</label>
								<label class="radio-inline">
								  <input type="radio" id="typed" name="report_type" class="checkbox_check" value="1" onchange="getCatagory('1')"  >Graphical Report
								</label>
							</div>
							</div>
							<span id="error" style="color:red"></span>
							<input type="hidden" id="page" value="runninggg" />
					
						
							<div class="col-md-12 search_box" style="border-bottom:1px solid #ccc;padding-bottom:5px;">
							<div class="form-control1">
							<label class="label-name">Category</label>
							<?php
							//$options1 = array('' => 'Select Catagory', '17' => 'Water', '18' => 'Energy', '16' => 'Air Condioning', '19' => 'Air Quality', '20' => 'Soft Integration', '21' => 'Specialized Solution');
                            echo form_dropdown('category', $category, $this->input->post('category'), 'class="form-control chosen-select" onchange="getsolutions()" name="cat" id="category"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Solution</label>
                            <?php
							//$options11 = array('0' => 'Select Solution');
                            echo form_dropdown('device', $solution, $this->input->post('device'), 'class="form-control chosen-select" id="solution" onchange="getdevices()"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Location</label>
                            <?php                         
                           $floorsoptions = array('0' => 'Select Location','1' => 'Floor1','2' => 'Floor2','3' => 'Floor3');
                            echo form_dropdown('floors', $floorsoptions, $this->input->post('floors'), 'class="form-control chosen-select" id="floors"'); ?>
							</div>
							<div class="form-control1 device">
							<label class="label-name">Device</label>
                             <?php
							// $options11 = array('0' => 'Select Device');
                            echo form_dropdown('hardware', $hardware,$this->input->post('hardware'), 'class="form-control chosen-select" id="device" onchange="getreports()"'); ?>
							
							
							</div>
							
							<div class="form-control1 firepump-dropdown" style="display:none">
							<label class="label-name">Device</label>
							<?php 
							$hardware1=array(''=>'Select Device',20=>'Firepump');
							echo form_dropdown('fire_hardware', $hardware1,$this->input->post('fire_hardware'), 'class="form-control chosen-select " onchange="getreports()"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Report</label>
							
                           <?php
							//$options = array('0' => 'Select Report', '1' => 'Running Hours', '2' => 'Status View Hours', '3' => 'DG Running hours Report','4' => 'DG Fuel Added Report','5' => 'Consolidated Report');
							//$options = array('0' => 'Select Report');
                            echo form_dropdown('report', $options,3, 'class="form-control chosen-select" id="report"'); ?>
                            </div>
							<?php /*?><div class="form-control1">
							<label class="label-name">Filter Type</label>
                           <select id="day">
              <option value="">Select Day
              </option>
              <option value="1">Monday
              </option>
              <option value="2">Tuesday
              </option>
              <option value="3">Wednesday
              </option>
              <option value="4">Thursday
              </option>
              <option value="5">Friday
              </option>
              <option value="6">Saturday
              </option>
              <option value="0">Sunday
              </option>
            </select>
							</div>
							<?php */?>
							<div class="form-control1">
							<label class="label-name">From Time</label>
                             <?php                         
                           $fromtimeoptions = array('0' => 'Select FromTime','1' => '00:00:00','2' => '01:00:00','3' => '02:00:00','4' => '03:00:00','5' => '04:00:00','6' => '05:00:00','7' => '06:00:00','6' => '07:00:00','7' => '08:00:00','8' => '09:00:00','9' => '10:00:00','10' => '11:00:00','11' => '12:00:00','12' => '13:00:00','13' => '14:00:00','14' => '15:00:00','15' => '16:00:00','16' => '17:00:00','17' => '18:00:00','18' => '19:00:00','19' => '20:00:00','20' => '21:00:00','21' => '22:00:00','22' => '23:00:00','23' => '24:00:00');
                            echo form_dropdown('fromtime', $fromtimeoptions, set_value('fromtime'), 'class="form-control chosen-select" id="fromtime"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">To Time</label>
                             <?php                         
                          $totimesoptions = array('0' => 'Select ToTime','1' => '00:00:00','2' => '01:00:00','3' => '02:00:00','4' => '03:00:00','5' => '04:00:00','6' => '05:00:00','7' => '06:00:00','6' => '07:00:00','7' => '08:00:00','8' => '09:00:00','9' => '10:00:00','10' => '11:00:00','11' => '12:00:00','12' => '13:00:00','13' => '14:00:00','14' => '15:00:00','15' => '16:00:00','16' => '17:00:00','17' => '18:00:00','18' => '19:00:00','19' => '20:00:00','20' => '21:00:00','21' => '22:00:00','22' => '23:00:00','23' => '24:00:00');
                            echo form_dropdown('totime', $totimesoptions, set_value('totime'), 'class="form-control chosen-select" id="totime"'); ?>

                          </div>
							<div class="form-control1">
							<label class="label-name">From Date</label>
						   
							
							<?php /*<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">*/?>
							<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
							
							</div>
							<div class="form-control1">
							<label class="label-name">To Date</label>
							<input class="form-control" onfocus="(this.type='date')" value="<?php echo set_value('todate') ?>" type="text" name="todate" id="todate" placeholder="To Date">
							</div>
							
						  </div>
						  <div class="col-md-11" ><br/>
							<span class="show_button hide_button">
							<button type="submit" id="filter" class="btn  filter-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/all_reports') ?>" class="btn btn-info reset">Reset</a>
							</span>
							<a class="btn btn-info hide_button search_box" style="background:#fff;color:#3c8dbc">Hide Search Box</a>
							<a class="btn btn-info change_search show_button hide_button" style="background:#fff;color:#3c8dbc;display:none">Change Search Fields</a>
							<?php if (!empty($running_data)) {?>
							<button type="submit" class="btn btn-info"  name="export" id="export">Export</button>
							<?php } ?>
							<div class="loader" id="loader" style="display:none"></div>
							</div>
							</div>
					</form>
					</div>
					</div>
					<div style="clear:both"></div>
					<div class="DshBrdSctnDtls tablular-data"  style="background:#fff">
										
							<?php 
							if($device_id!=20){
							if (!empty($running_data)) {
								?>
								<br/>
								<div  class="text-head">Water Level Report</div>
							<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
								<thead>
									<tr>
										<th class="text-center"><b>Sno.</b></th>
										<th class="text-center"><b>Meter</b></th>
										<th class="text-center"><b>Date/Hours</b>	</th>
										
										<th class="text-center"><b>Current Level ( KLtr )</b></th>
										
									</tr>
								</thead>
								<tbody>
									<?php
									
									$i=1;
									foreach($running_data as $row){
										
										?>
										
										<tr>
										<td class="text-center"><?php echo $i?></td>
										<td class="text-center"><?php echo $row['Meter']?></td>
										<td class="text-center"><?php echo $row['Time']?></td>
										<?php /*<td class="text-center">
										<?php echo $row['runninghrs'] ?> KLts
										<?php /*
										$t = $row['runninghrs'];
										$h = floor($t/60) ? floor($t/60) .' Hours' : '0 Hours';
										$m = $t%60 ? $t%60 .' Min' : '0 Min';
										echo $h && $m ? $h.' '.$m : $h.$m;
										
										
										
										</td>*/?>
										<td class="text-center"><?php echo $row['Current_capacity']?></td>
										</tr>
										<?php
										
									$i++;
										
									}
															
								?>
									
								</tbody>
							</table>
							
							<?php }
							}else{
								if (!empty($running_data)) {
								?>
								<div  class="text-head"> Firepump Running Report</div>
								<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
									<thead>
										<tr> 
										<th rowspan='2' align='center'>SNo</th>
										<th rowspan='2' align='center'>Date</th>    
										<th colspan='4' align='center'>Meters</th> 
										</tr>
										
										<tr>
										<?php for($j=0;$j<count($running_data[0]);$j++){
										echo "<td>".$running_data[0][$j]['meter']."</td>";
										}
										?>
										
										</tr>
										<?php 
										for($i=0;$i<count($running_data);$i++){								
										?>
										<tr>
										<td align='center'><?php echo $i+1;?></td>
										<td align='center'><?php echo $running_data[$i][0]['date']?></td>
											<?php
											for($j=0;$j<count($running_data[$i]);$j++){									
												echo "<td>".$running_data[$i][$j]['RunningHours']."</td>";
											}
											?>
										
										</tr>
										<?php } ?>
									</thead>
									<tbody>
										
										
									</tbody>
								</table>
								<?php
							}
							}
							?>
							
							<?php if (!empty($dgdata)) {
								?>
								<br/>
								<div  class="text-head">DG Running Hours Report</div>
							<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
								<thead>
									<tr>
										<th class="text-center"><b>Sno.</b></th>
										<th class="text-center"><b>Date</b>	</th>
										<th class="text-center"><b>Running Hrs</b>	</th>
										<th class="text-center"><b>Fuel Consume</b>	</th>
										<th class="text-center"><b>Economy</b>	</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php
									
									
									
									for($x=0;$x<count($dgdata);$x++){
										
										?>
										
										
										<tr>
										<td class="text-center"><?php echo $x+1?></td>
										<td class="text-center"><?php echo $dgdata[$x][0]?></td>
										<td class="text-center"><?php echo $dgdata[$x][1]?></td>
										<td class="text-center"><?php echo $dgdata[$x][2]?></td>
										<td class="text-center"><?php echo $dgdata[$x][3]?></td>
										
										</tr>
										<?php
										
									$i++;
										
									}
															
								?>
									
								</tbody>
							</table>
							
							<?php } ?>
							
							
					</div>
					
					<?php 
					if (!empty($running_data)) {
					?>
					<div class="DshBrdSctnDtls graph-data"  style="background:#fff;border: 1px solid #3c8dbc;">
						<div  class="text-head"> Water Level Running Hours Report</div>

						<div   id="container"></div>
					</div>
					<?php } ?>
					
					<?php 
					if (!empty($pressure_data)) {
					?>
					<div class="DshBrdSctnDtls graph-data"  style="background:#fff;border: 1px solid #3c8dbc;">
						<div  class="text-head"> Line Pressure Report</div>

						<div   id="linepressure"></div>
					</div>
					<?php } ?>
					
					
			</div>
		
			
		
      <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
    </div>

</body>
    <script src="<?php echo base_url(); ?>asset/admin/commonjs/report.js"></script>

<script>
// var categ=<?php //echo $data['cat'] ?>;
// getSolution();
<?php 
if(!empty($running_data)){
	?>
	$('.search_box').hide();
	$('.show_button').hide();
	$('.change_search').show();
	<?php
}
if($firepump==20){
	?>
	var data="<select name='device' id='device' onchange='getreports()'><option value=''>Select Device</option><option value='20' selected>Firepump</option></select>";
	$("#device").html(data);
<?php } ?>

 $(document).ready(function() {
  $('#multiselect').multiselect({
    buttonWidth : '160px',
    includeSelectAllOption : true,
		nonSelectedText: 'Select an Option'
  });
});

function getSelectedValues() {
  var selectedVal = $("#multiselect").val();
	for(var i=0; i<selectedVal.length; i++){
		function innerFunc(i) {
			setTimeout(function() {
				location.href = selectedVal[i];
			}, i*2000);
		}
		innerFunc(i);
	}
}
<?php if($radio==1){
	?>
	var type = <?php echo $radio; ?>;
	
		$("input[name=report_type][value='1']").prop("checked",true);
		getreports();
		$('.graph-data').show();
		$('.tablular-data').hide();
		//$("#cat").val('');	
	// var radios = $('input:radio[name=report_type]');
 //    if(radios.is(':checked') === false) {
 //        radios.filter('[value=1]').prop('checked', true);
 //    }

	<?php

}else{ ?>
	var type='0';
	$("input[name=report_type][value='0']").prop("checked",true);
	getreports();
	$('.tablular-data').show();
	$('.graph-data').hide();
	//$("#cat").val('');
<?php } ?>
	
	// var type = $('input[name="report_type"]:checked').val();

	if (type==0) {
		$('#tabular').show();
		$('#graphical').hide();
		$('.graph-data').hide();
		$('.tablular-data').show();
	}else{
		
	    $('#tabular').hide();
		$('#graphical').show();
		$('.graph-data').show();
		$('.tablular-data').hide();
	}
	function getCatagory(type){
		$("#cat").val('');
		
		/*var category = $("#category").val();
		var solution = $("#solution").val();
		var device = $("#device").val();
		var type = $('input[name="report_type"]:checked').val();
		
		
		$.ajax({
			type: 'GET',
			data: {
				category:category,solution:solution,device:device,report_type:type
			},
			url: BASE_URL+'Admin/Home/ajax_report_dropdown/',
			success: function (data){
				 // alert(data);return false;
				$("#report").html(data);
				$("#report").trigger("chosen:updated");
			}
		});	*/
		getreports();
		if (type==0) {	 
			
			$('#tabular').show();
			$('#graphical').hide();
			$('.graph-data').hide();
		$('.tablular-data').show();
		
		}else{
			//$("#cat").html("");
			//var div='<select name="device" class="form-control chosen-select" id="device" name="device"  name="cat" id="cat"><option value="" selected="selected">Select Catagory</option><option value="17">Water</option><option value="18">Energy</option><option value="16">Air Condioning</option><option value="19">Air Quality</option><option value="20">Soft Integration</option><option value="21">Specialized Solution</option></select>';
				 //$("#cat").html(div);
				 //$("#cat").trigger("chosen:updated");
			$('#tabular').hide();
			$('#graphical').show();
			$('.graph-data').show();
		$('.tablular-data').hide();

	
		}
	}


	
	// var category = $("#cat").val();
	// if(category==17){
	// 		var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="41">Water Level</option>		<option value="42">Line Pressure</option><option value="43">Motor Running</option><option value="44">Firepump</option><option value="45">Water Meter</option><option value="46">Hydro Pnematic System</option><option value="47">STP</option><option value="48">Boilers</option><option value="49">Hotwater Tanks</option></select>';
	// 		 $("#solution").html(div);
 //             $("#solution").trigger("chosen:updated");

	// 	}
	// 	if(category==18){
	// 		var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="51">Energy Meter</option>		<option value="52">BTU</option><option value="53">DG</option><option value="54">UPS</option><option value="55">LPG</option><option value="56">Trip Status</option></select>';
	// 		$("#solution").html(div);
 //             $("#solution").trigger("chosen:updated");

	// 	}
	// 	if(category==16){
	// 		var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="61">AHU</option>		<option value="62">Chiller</option><option value="63">Cooling Tower</option></select>';
	// 		 $("#solution").html(div);
 //             $("#solution").trigger("chosen:updated");
	// 	}
		
		
	// 	if(category==19){
	// 		var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="71">IAQ</option><option value="72">Toilet Exaust</option><option value="73">Ventilation Fan</option></select>';
	// 		 $("#solution").html(div);
 //             $("#solution").trigger("chosen:updated");
	// 	}
	// 	if(category==20){
	// 		var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="81">Lifts</option><option value="82">DG</option><option value="83">Inverter</option><option value="84">Chillers</option><option value="85">Fire Alarm System</option></select>';
	// 		 $("#solution").html(div);
 //             $("#solution").trigger("chosen:updated");
	// 	}
	// 	if(category==21){
	// 		var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="91">Washroom Monitoring</option><option value="92">Cold Room</option><option value="93">Floor Wetness</option><option value="94">Door Open/Close</option></select>';
	// 		 $("#solution").html(div);
 //             $("#solution").trigger("chosen:updated");
	// 	}
	//solution

	
	//end solution
	
	
function formValidation()
{
var category = $("#category").val();
var solution = $("#solution").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
// alert(multiMeter);return false;
if(category==''){
	$('#error').html("plaese select Category");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(solution==''){
	$('#error').html("plaese select solution");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(fromdate==''){
	$('#error').html("plaese select From Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(todate==''){
	$('#error').html("plaese select To Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}


$('#loader').show();
var ele = $("#loader");
setTimeout(function() { ele.hide(); }, 10000);

return true;
}


function getsolutions(){
    $("#solution").html("");
    var category = $("#category").val();
    
        // $(".device").show();
  
    $.ajax({
        type: 'GET',
        data: {
            category:category
        },
        url: BASE_URL+'Admin/Home/ajax_hardware_device_dropdown/',
        success: function (data){
			// alert(data);return false;
            $("#solution").html(data);
            $("#solution").trigger("chosen:updated");
        }
    });
}

function getdevices(){
	getreports();
    $("#device").html("");
    var category = $("#category").val();
    var solution = $("#solution").val();
	if(solution==20){
		// var data="<select name='device' id='device' onchange='getreports()'><option value=''>Select Device</option><option value='20'>Firepump</option></select>";
		// $("#device").html(data);
		$('.firepump-dropdown').show();
		$('.device').hide();
		
	}else{
		
	$('.firepump-dropdown').hide();
	$('.device').show();
    $.ajax({
        type: 'GET',
        data: {
            category:category,solution:solution
        },
        url: BASE_URL+'Admin/Home/ajax_hardware_dropdown/',
        success: function (data){
			 // alert(data);return false;
            $("#device").html(data);
            $("#device").trigger("chosen:updated");
        }
    });	
	 }
	
}

function getreports(){
	var category = $("#category").val();
    var solution = $("#solution").val();
    var device = $("#device").val();
    // var type='';
	var type=$('input[name="report_type"]:checked').val();
	// alert(category);
	// alert(solution);
	// alert(device);
	$.ajax({
        type: 'GET',
        data: {
            category:category,solution:solution,device:device,report_type:type
        },
        url: BASE_URL+'Admin/Home/ajax_report_dropdown/',
        success: function (data){
			//alert(data);return false;
            $("#report").html(data);
            $("#report").trigger("chosen:updated");
        }
    });	
}

// function search_box(){
	// $('.search_box').toggle('slow');
// }

$('.hide_button').click(function(){
	$('.search_box').toggle();
	$('.show_button').toggle();
});

</script>	

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
<?php if(modules::run('Admin/Site/authlink','water_waterlevel')){ ?>
	var dps1=[];
	var dps2=[];
	var meter=<?php echo "'".$meter."'"?>;
	 dps1=<?php echo json_encode($time)?>;
	 dps2=<?php echo json_encode($level)?>;


Highcharts.chart('container', {
    chart: {
        type: 'area',
        width:950
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Water Level'
    },
    xAxis: {
        categories: dps1,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KL'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} KL</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: dps2

    }]
});

<?php } ?>

<?php if(modules::run('Admin/Site/authlink','water_firepump')){ ?>
	var time=[];
	var cons=[];
	var meter=<?php echo "'".$meter."'"?>;
	 time=<?php echo json_encode($time)?>;
	 cons=<?php echo json_encode($consumption)?>;


Highcharts.chart('linepressure', {
    chart: {
        type: 'line',
        width:950
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Line Pressure'
    },
    xAxis: {
        categories: time,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pressure'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Pressure</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: cons

    }]
});
<?php } ?>
</script>
</html>