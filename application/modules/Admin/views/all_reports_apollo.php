<?php //echo json_decode($ahdata);die(); ?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
<style>	

img {
vertical-align: middle;
margin-right:10px;}
.form-control{float:left}
table td,table th{border-right:1px solid #ccc;border: 1px solid black;}
table th,table tr{text-align:center}


.loader {
  border: 16px solid #e4e4e4;
  border-radius: 50%;
  border-top: 16px solid #5bc0de;
  margin-left: 50%;
  margin-top:20px;
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
    color: #468dbc;
    font-weight: bold;
    font-size: 18px;
	font-weight:400;
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
.report-text{padding:20px; font-size: 18px;
    color: #3c8dbc;
    padding: 15px;
    background: #fff;
    border-bottom: 1px solid #f3f3f3;border-top-left-radius: 10px;border-top-right-radius: 10px;font-weight:600;margin-bottom:0px}
.radio-but{margin-left:15px;margin-right:10px;padding-top:20px;}
.radio-inline{border-bottom:1px solid #f3f3f3;padding-bottom:14px}
.radio-inline:hover{border-bottom:1px solid #3c8dbc}
.label-name{padding-left:0px; font-weight:400}
.form-control1{float:left;width:150px;padding-top:5px;}
.form-control{border-radius: 5px !important;}
.filter-success{background:#3c8dbc;borber:1px solid #093956;color:#fff;padding-left:25px;padding-right:25px}
.filter-success:hover{background:#2c78a3;color:#fff}
.reset{padding-left:25px;padding-right:25px}


.multiselect-native-select {
		position: relative;
		select {
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
		
		<?php $this->load->view('common/left_menu3_apollo') ?>
		<?php $this->load->view('common/header2ap') ?>
		
       <input type="hidden" id="page" value="runninggg" />
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="DshBrdSctnDtls"  style="border-radius: 10px;background:#fff;padding-top: ">
				<h2 class="report-text">Reports</h2>
			</div>
			<div class="DshBrdSctnDtls"  style="background:#f3f3f3;height:18%">
				<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports_apollo")?>" method="post" onSubmit="return formValidation();">
                
					
                 
                
					<span id="error" style="color:red"></span>
					<input type="hidden" id="page" value="runninggg" />
					
						
							<div class="col-md-12" style="border-bottom:1px solid #ccc"><br/>
							<div class="form-control1">
							<label class="label-name">Select Device</label>
							<?php
							$options1 = array('' => 'Select Device', '1' => 'Tomo Therapy','2' => 'Cancer Block','3' => 'Operation Theater','4' => 'Boilers');
                            echo form_dropdown('category', $options1, set_value('category'), 'class="form-control chosen-select" onchange="getSolution()" name="cat" id="cat"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Select </label>
                            <?php
							$options11 = array('0' => 'Select Report');
                            echo form_dropdown('solution', $options11, set_value('solution'), 'class="form-control chosen-select" id="solution"'); ?>
							</div>
							
							
							
							
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
							<label class="label-name">Date</label>
						   
							
							
							<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('date') ?>"  name="date" id="date" placeholder="Select Date">
							
							</div>
							<label class="label-name"></label>
							<button type="submit" id="filter" class="btn  filter-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/all_reports_apollo') ?>" class="btn btn-info reset">Reset</a>
							<?php if (!empty($running_data)) {?>
								<label class="label-name"></label>
							<button type="submit" class="btn btn-info"  name="export" id="export">Export</button>
							<?php } ?>
							
						  </div>
						  <div class="col-md-11" >
						  
							</div>
					</form>
			</div>
			<div class="DshBrdSctnDtls"  style="background:#fff">
				<div class="row meter-top col-md-12">
					<div class="loader" id="loader" style="display: none;">
					<br/><br/><br/>
					</div>
					</div>
					
					
					
					<div class="graphical" >
						<?php 
						
						
					    //start water
					    if($m1==62 || $m1==63 || $m1==43 || $m1==44){
						$this->load->view('graphreportcommon/tomograph');
					    }
					    
					   
					    
					    //end water
					    

						?>
						
					</div>
			</div>
		</div>
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>

<script>
// var categ=<?php //echo $data['cat'] ?>;
// getSolution();


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

	<?php $sol=$data['solution']; ?>
	<?php //$rep=$data['report']; ?>
	 //alert(sol);
	 //alert(type);
		

			//graph solutions start
			$("#solution").html("");
			var category = $("#cat").val();
		if(category==1){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Report</option><option value="62" <?php echo ($sol=='62'?'selected':'');?>>Tomo Therapy</option><option value="63" <?php echo ($sol=='63'?'selected':'');?>>Waiting Hall</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==2){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Report</option><option value="43" <?php echo ($sol=='43'?'selected':'');?>>Novalis Ch WD-1</option><option value="44" <?php echo ($sol=='44'?'selected':'');?>>Novalis Ch WD-2</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==3){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Report</option><option value="51" <?php echo ($sol=='51'?'selected':'');?>>OT1</option>		<option value="52" <?php echo ($sol=='52'?'selected':'');?>>OT2</option><option value="53" <?php echo ($sol=='53'?'selected':'');?>>OT3</option><option value="54" <?php echo ($sol=='54'?'selected':'');?>>OT4</option><option value="55" <?php echo ($sol=='55'?'selected':'');?>>OT5</option><option value="56" <?php echo ($sol=='56'?'selected':'');?>>OT6</option><option value="57" <?php echo ($sol=='57'?'selected':'');?>>OT7</option><option value="58" <?php echo ($sol=='58'?'selected':'');?>>OT8</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==4){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Report</option><option value="71" <?php echo ($sol=='71'?'selected':'');?>>Fuel Consumption</option>		<option value="72" <?php echo ($sol=='72'?'selected':'');?>>Fuel Added</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==''){
		var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Report</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

			}
		
	//end solution
	
	
function formValidation()
{
var multiMeter = $("#multiMeter").val();
var multiMeter1 = $("#multiMeter1").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
// alert(multiMeter);return false;
if(multiMeter==''){
	$('#error').html("plaese select Meter");
	return false;	
}else if(multiMeter1==''){
	$('#error').html("plaese select Report");
	return false;	
}else if(fromdate==''){
	$('#error').html("plaese select From Date");
	return false;	
}else if(todate==''){
	$('#error').html("plaese select To Date");
	return false;	
}


$('#loader').show();
var ele = $("#loader");
setTimeout(function() { ele.hide(); }, 9000);

return true;
}
function getSolution(){
		
			var category = $("#cat").val();
			//air condition
		if(category==1){
			//var solution = $("#solution").val();
							
			var div='<select name="device" class="form-control chosen-select" id="device" ><option value="">Select Report</option>		<option value="62" <?php echo ($sol=='62'?'selected':'');?>>Tomo Therapy</option><option value="63" >Waiting Hall</option></select>';
			//var d='<option  value="61">AHU</option><option value="64">IAQ</option>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==2){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Report</option><option value="43">Novalis Ch WD-1</option><option value="44">Novalis Ch WD-2</option></select>';
			
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==3){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Report</option><option value="51">OT1</option>		<option value="52">OT2</option><option value="53">OT3</option><option value="54">OT4</option><option value="55">OT5</option><option value="56">OT6</option><option value="57">OT7</option><option value="58">OT8</option></select>';
		//	var d='<option value="56">Trip Status</option>'
			$("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==4){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Report</option><option value="71" >Fuel Consumption</option>		<option value="72" >Fuel Added</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		
	}

// $('#export').click(function(){
	// $("#myForm").submit(); 
	// location.reload(true);
// });


	
 </script>	
</html>