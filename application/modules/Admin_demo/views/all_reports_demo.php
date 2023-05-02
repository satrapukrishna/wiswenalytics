<?php //echo "string"; ?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
<style>	
.no-leftpad{padding-left:0px!important;}
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
	margin-top:5px;
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
.form-control1{float:left;width:185px;padding-top:5px;padding-bottom:5px;}
.form-control{border-radius: 5px !important;font: 400 13px 'Open Sans'!important;color:#656262}
.filter-success{background:#3c8dbc;border:1px solid #093956;color:#fff;padding-left:25px;padding-right:25px}
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
	/* .multiselect-container {
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
		} */
		/* li.multiselect-group {
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
		} */


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
		<div class="DshBrdSctn" style="padding: 10px 10px 10px 15px;">
			<div class="DshBrdSctnDtls">
			<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports_demo")?>" method="post" onSubmit="return formValidation();">
				<h2 class="report-text">Reports</h2>
			
			<div style="background:#fff;">
			<?php //echo "<pre>";print_r($_POST);?>
				<?php /*<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports_search")?>" method="post" onSubmit="return formValidation();">*/?>
				
					<div class="col-md-12" style="background: #f3f3f3;margin-top: -13px;padding-bottom:20px;border-bottom:#ccc 1px solid">
							<div class="search_box" style="position: absolute;top: 10ox;top: -54px;left:150px;">
							<div class="radio-but"style="border-bottom:1px solid #ccc">
								<label class="radio-inline">
								  <input type="radio" id="typec" name="report_type" class="checkbox_check" value="0" onchange="getCatagory('0')"  checked>Tabular Report
								</label>
								<label class="radio-inline">
								  <input type="radio" id="typed" name="report_type" class="checkbox_check" value="1" onchange="getCatagory('1')"  >Graphical Report
								</label>
							</div>
							<span id="error" style="color:red"></span>
							</div>
							
							<input type="hidden" id="page" value="runninggg"/>
					
						
							<div class="col-md-12 no-leftpad search_box" style="border-bottom:1px solid #ccc;padding-bottom:5px;">
							<div class="form-control1">
							<!-- <label class="label-name">Category</label> -->
							<?php
							//$options1 = array('' => 'Select Catagory', '17' => 'Water', '18' => 'Energy', '16' => 'Air Condioning', '19' => 'Air Quality', '20' => 'Soft Integration', '21' => 'Specialized Solution');
                            echo form_dropdown('category', $category, $this->input->post('category'), 'class="form-control chosen-select" onchange="getsolutions()" name="cat" id="category"'); ?>
							</div>
							<div class="form-control1">
							<!-- <label class="label-name">Solution</label> -->
                            <?php
							//$options11 = array('0' => 'Select Solution');
                            echo form_dropdown('device', $solution, $this->input->post('device'), 'class="form-control chosen-select" id="solution" onchange="getdevices()"'); ?>
							</div>
							<div class="form-control1">
							<!-- <label class="label-name">Location</label> -->
                            <?php                         
                           $floorsoptions = array('0' => 'Select Location','1' => 'Floor1','2' => 'Floor2','3' => 'Floor3');
                            echo form_dropdown('floors', $floorsoptions, $this->input->post('floors'), 'class="form-control chosen-select" id="floors"'); ?>
							</div>
							<!-- <div class="form-control1 device"> -->
							<!-- <label class="label-name">Device</label> -->
                             <?php
							// $options11 = array('0' => 'Select Device');
                           // echo form_dropdown('hardware', $hardware,$this->input->post('hardware'), 'class="form-control chosen-select" id="device" onchange="getreports()"'); ?>
							
							
							<!-- </div> -->
							
							<!-- <div class="form-control1 firepump-dropdown" style="display:none"> -->
							<!-- <label class="label-name">Device</label> -->
							<?php 
							//$hardware1=array(''=>'Select Device',20=>'Firepump');
							//echo form_dropdown('fire_hardware', $hardware1,$this->input->post('fire_hardware'), 'class="form-control chosen-select " onchange="getreports()"'); ?>
							<!-- </div> -->
							
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
							<!-- <label class="label-name">From Time</label> -->
                             <?php                         
                           $fromtimeoptions = array('0' => 'Select FromTime','1' => '00:00:00','2' => '01:00:00','3' => '02:00:00','4' => '03:00:00','5' => '04:00:00','6' => '05:00:00','7' => '06:00:00','6' => '07:00:00','7' => '08:00:00','8' => '09:00:00','9' => '10:00:00','10' => '11:00:00','11' => '12:00:00','12' => '13:00:00','13' => '14:00:00','14' => '15:00:00','15' => '16:00:00','16' => '17:00:00','17' => '18:00:00','18' => '19:00:00','19' => '20:00:00','20' => '21:00:00','21' => '22:00:00','22' => '23:00:00','23' => '24:00:00');
                            echo form_dropdown('fromtime', $fromtimeoptions, set_value('fromtime'), 'class="form-control chosen-select" id="fromtime"'); ?>
							</div>
							<div class="form-control1">
							<!-- <label class="label-name">To Time</label> -->
                             <?php                         
                          $totimesoptions = array('0' => 'Select ToTime','1' => '00:00:00','2' => '01:00:00','3' => '02:00:00','4' => '03:00:00','5' => '04:00:00','6' => '05:00:00','7' => '06:00:00','6' => '07:00:00','7' => '08:00:00','8' => '09:00:00','9' => '10:00:00','10' => '11:00:00','11' => '12:00:00','12' => '13:00:00','13' => '14:00:00','14' => '15:00:00','15' => '16:00:00','16' => '17:00:00','17' => '18:00:00','18' => '19:00:00','19' => '20:00:00','20' => '21:00:00','21' => '22:00:00','22' => '23:00:00','23' => '24:00:00');
                            echo form_dropdown('totime', $totimesoptions, set_value('totime'), 'class="form-control chosen-select" id="totime"'); ?>

                          </div>
							<div class="form-control1">
							<!-- <label class="label-name">From Date</label> -->
						   
							
							<?php /*<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">*/?>
							<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
							
							</div>
							<div class="form-control1">
							<!-- <label class="label-name">To Date</label> -->
							<input class="form-control" onfocus="(this.type='date')" value="<?php echo set_value('todate') ?>" type="text" name="todate" id="todate" placeholder="To Date">
							</div>
							
						  </div>
						  <div class="col-md-11 no-leftpad" ><br/>
							<span class="show_button hide_button">
							<button type="submit" id="filter" class="btn  filter-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/all_reports_demo') ?>" class="btn btn-info reset">Reset</a>
							</span>
							<a class="btn btn-info hide_button search_box" style="background:#fff;color:#3c8dbc">Hide Search Box</a>
							<a class="btn btn-info change_search show_button hide_button" style="background:#fff;color:#3c8dbc;display:none">Change Search Fields</a>
							<?php if (!empty($running_data)) {?>
							<button type="submit" class="btn btn-info"  name="export" id="export">Export</button>
							<?php } ?>
							<div class="loader" id="loader" style="display:none"></div>
							</div>
							</div>
					
					</div>
					</form>
					</div>
					<div style="clear:both"></div>
					<div class="DshBrdSctnDtls tablular-data"  style="background:#fff">
						<?php 	
						//echo print_r($data['category']);die();
						//water tabular
						if($data['device']==19 && $data['report_type']==0){
							$this->load->view('reportcommon/waterlevelreport');
						}
						if($data['device']==34 && $data['report_type']==0){
							$this->load->view('reportcommon/flowconsumptionreport');
						}
						//end water
						//Energy tabular
						if($data['device']==28 && $data['report_type']==0){
							$this->load->view('reportcommon/dgreport');
							$this->load->view('reportcommon/dgfadded');
							$this->load->view('reportcommon/economy');
							
						}
						if($data['device']==30 && $data['report_type']==0){
							$this->load->view('reportcommon/dgtrip');
							
							
						}
						//end Energy
						//Switch Controls
						
						//end Switch controlls
						if($m1==11){
						$this->load->view('reportcommon/borewellrunnreport');
						}
						if($m1==8){
						$this->load->view('reportcommon/motorrunnreport');
						}
						if($m1==1){
						$this->load->view('reportcommon/waterconsumptionreport');
						}
						if($m1==25){
						$this->load->view('reportcommon/waterlevelreport');
						}if($m1==4){
						$this->load->view('reportcommon/firepumprunnreport');
						}if($m1==5){
						$this->load->view('reportcommon/statusview');
						}if($m1==7){
						$this->load->view('reportcommon/dgreport');
						}if($m1==13){
						$this->load->view('reportcommon/dgfadded');
						}

						if($m1==14){
							$this->load->view('reportcommon/firepumprunnreport');
							$this->load->view('reportcommon/statusview');
							$this->load->view('reportcommon/dgreport');
							$this->load->view('reportcommon/dgfadded');
						}
						if($m1==18){
						$this->load->view('reportcommon/hpsrunnreport');
						}
						if($m1==19){
						$this->load->view('reportcommon/hpsstatusview');
						}if($m1==20){
							$this->load->view('reportcommon/hpsrunnreport');
							$this->load->view('reportcommon/hpsstatusview');
						}
						if($m1==23){
						$this->load->view('reportcommon/watermeterconsreport');
						}
						
						if($m1==26){
						$this->load->view('reportcommon/dgreport');
						}if($m1==27){
						$this->load->view('reportcommon/dgfadded');
						}
						if($m1==30){
						$this->load->view('reportcommon/upsrunreport');
						}
                        if($m1==34){
                            $this->load->view('reportcommon/flowconsumptionreport');
                            }
						if($m1==37){
								$this->load->view('reportcommon/dgtrip');
								}
						?>
							
							
					</div>
					<div class="DshBrdSctnDtls"  style="background:#fff">
					<?php 
					// if($m1==6){
					// 	$this->load->view('graphreportcommon/firepumplinepressure');
					// 	}if($m1==17){
					// 	$this->load->view('graphreportcommon/dgfadd');
					// 	}if($m1==15){
					// 	$this->load->view('graphreportcommon/firepumprungraph');
					// 	}if($m1==16){
					// 	$this->load->view('graphreportcommon/dgrungraph');
					// 	}
						// if($m1==21){
						// $this->load->view('graphreportcommon/hpsgraph');
						// }if($m1==22){
						// $this->load->view('graphreportcommon/firepumplinepressure');
						// }
						//water grapical
						if($data['device']==19 && $data['report_type']==1){
							$this->load->view('graphreportcommon/waterlevelgraph');
						}
						if($data['device']==34 && $data['report_type']==1){
							$this->load->view('graphreportcommon/flowconsumption')	;
						}
						if($data['device']==28 && $data['report_type']==1){
							$this->load->view('graphreportcommon/dgrungraph');
							$this->load->view('graphreportcommon/dgfadd');
							$this->load->view('graphreportcommon/economygraph');
						}
						if($data['device']==30 && $data['report_type']==1){
							$this->load->view('graphreportcommon/dgtrip');
							
						}
						//end water
						if($m1==10){
						$this->load->view('graphreportcommon/firepumplinepressure');
						}if($m1==9){
						$this->load->view('graphreportcommon/motorrungraph');
						}if($m1==3){
						$this->load->view('graphreportcommon/waterlevelgraph');
						}if($m1==2){
						$this->load->view('graphreportcommon/waterconsgraph');
						}if($m1==24){
						$this->load->view('graphreportcommon/watermeterconsgraph');
						}if($m1==12){
						$this->load->view('graphreportcommon/borewellrungraph');
						}
						
					
						if($m1==29){
						$this->load->view('graphreportcommon/dgfadd');
						}if($m1==28){
						$this->load->view('graphreportcommon/dgrungraph');
						}if($m1==31){
						$this->load->view('graphreportcommon/upsrungraph');
						}

						if($m1==32){
						$this->load->view('graphreportcommon/firepumprungraph');
						$this->load->view('graphreportcommon/firepumplinepressure');
						$this->load->view('graphreportcommon/dgrungraph');
						$this->load->view('graphreportcommon/dgfadd');

						}
						if($m1==33){						
						$this->load->view('graphreportcommon/hpsgraph')	;				
						$this->load->view('graphreportcommon/firepumplinepressure');

						}
                        if($m1==35){						
                            $this->load->view('graphreportcommon/flowconsumption')	;				
                          
    
                            }
					    if($m1==36){						
								$this->load->view('graphreportcommon/dgtrip')	;
								//$this->load->view('graphreportcommon/economygraph')	;				
							  
		
								}
                           
					?>
					
					</div>
					
			</div>
		
			
		
      <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
    </div>

</body>
    

<script>
// var categ=<?php //echo $data['cat'] ?>;
// getSolution();
<?php 
if(!empty($m1)){
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
		<?php if($m1==''){ ?>
			getreports();
		<?php } ?>
		
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
	<?php if($m1==''){ ?>
			//getreports();
		<?php } ?>
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
		//getreports();
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
        url: BASE_URL+'Admin/Home/ajax_hardware_device_dropdown_demo/',
        success: function (data){
			// alert(data);return false;
            $("#solution").html(data);
            $("#solution").trigger("chosen:updated");
        }
    });
}

function getdevices(){
	
	//getreports();
	
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

function getreports7(){
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
</html>