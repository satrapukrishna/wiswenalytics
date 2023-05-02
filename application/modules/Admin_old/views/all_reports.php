<?php //echo "string"; ?>
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
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       <input type="hidden" id="page" value="runninggg" />
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="DshBrdSctnDtls"  style="border-radius: 10px;background:#fff">
				<h2 class="report-text">Reports</h2>
			</div>
			<div class="DshBrdSctnDtls"  style="background:#f3f3f3;height:50%">
				<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports")?>" method="post" onSubmit="return formValidation();">
                
					<div class="radio-but"style="border-bottom:1px solid #ccc">
						<label class="radio-inline">
						  <input type="radio" id="typec" name="report_type" class="checkbox_check" value="0" onchange="getCatagory('0')"  checked>Tabular Report
						</label>
						<label class="radio-inline">
						  <input type="radio" id="typed" name="report_type" class="checkbox_check" value="1" onchange="getCatagory('1')"  >Graphical Report
						</label>
					</div>
                  <?php /*<h3>
                   <!-- <strong>Tabular Reports</strong> -->
                   <?php
                          $options1 = array('0' => 'Tabular Report', '1' => 'Graphical Report');
                            echo form_dropdown('report_type', $options1, set_value('report_type'), 'class="form-control chosen-select" onchange="getCatagory()" id="type"'); ?>
                  </h3><br/>*/?>
                
					<span id="error" style="color:red"></span>
					<input type="hidden" id="page" value="runninggg" />
					
						
							<div class="col-md-12" style="border-bottom:1px solid #ccc;padding-bottom:20px;"><br/>
							<div class="form-control1">
							<label class="label-name">Category</label>
							<?php
							$options1 = array('' => 'Select Catagory', '17' => 'Water', '18' => 'Energy', '16' => 'Air Condioning', '19' => 'Air Quality', '20' => 'Soft Integration', '21' => 'Specialized Solution');
                            echo form_dropdown('category', $options1, set_value('category'), 'class="form-control chosen-select" onchange="getSolution()" name="cat" id="cat"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Solution</label>
                            <?php
							$options11 = array('0' => 'Select Solution');
                            echo form_dropdown('solution', $options11, set_value('solution'), 'class="form-control chosen-select" id="solution" onchange="getReports()"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Location</label>
                            <?php                         
                           $floorsoptions = array('0' => 'Select Location','1' => 'Floor1','2' => 'Floor2','3' => 'Floor3');
                            echo form_dropdown('floors', $floorsoptions, set_value('floors'), 'class="form-control chosen-select" id="floors"'); ?>
							</div>
							<div class="form-control1">
							<label class="label-name">Device</label>
                             <?php
                          $options11 = array('0' => 'Select Device');
                            echo form_dropdown('device', $options11, set_value('device'), 'class="form-control chosen-select" id="device" '); ?></div>
							<div class="form-control1">
							<label class="label-name">Report</label>
							
                           <?php
                         // $options = array('0' => 'Select Report', '1' => 'Running Hours', '2' => 'Status View Hours', '3' => 'DG Running hours Report','4' => 'DG Fuel Added Report','5' => 'Consolidated Report');
                           $options = array('0' => 'Select Report');
                            echo form_dropdown('report', $options, set_value('report'), 'class="form-control chosen-select" id="report"'); ?>
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
						  <button type="submit" id="filter" class="btn  filter-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/all_reports') ?>" class="btn btn-info reset">Reset</a>
							<?php if (!empty($running_data)) {?>
							<button type="submit" class="btn btn-info"  name="export" id="export">Export</button>
							<?php } ?>
							</div>
					</form>
			</div>
			
					<div class="row meter-top col-md-12">
					<div class="loader" id="loader" style="display: none;">
					<br/><br/><br/>
					</div>
					</div>
					
					
					<div class="tabular" id="tabular" style="display: none;">
					<div class="DshBrdSctnDtls" style="background:#fff">
					<hr/>
						<?php 
					//echo $m1;
					// energy start
					if($m1=='ecr'){
						$this->load->view('reportcommon/energyconsumptionreport');
					}
					if($m1=='brr'){
						$this->load->view('reportcommon/bturunnreport');
					}
					if($m1=='dgrr'){
						$this->load->view('reportcommon/dgreport');
					}
					if($m1=='dgfar'){
						$this->load->view('reportcommon/fadded');
					}if($m1=='uprr'){
						$this->load->view('reportcommon/upsrunreport');
					}
					if($m1=='lprr'){
						$this->load->view('reportcommon/lpgconsreport');
					}
					// energy end
					//water start
					
					if($m1=='mrr'){
						$this->load->view('reportcommon/motorrunnreport');
					}if($m1=='fprr'){
						$this->load->view('reportcommon/runnreport');
					}if($m1=='fpsvr'){
						$this->load->view('reportcommon/statusview');
					}if($m1=='fpdrr'){
						$this->load->view('reportcommon/dgreport');
					}
					if($m1=='fpdfar'){
						$this->load->view('reportcommon/fadded');
					} 
					if($m1=='fpcr'){
						$this->load->view('reportcommon/runnreport');
						$this->load->view('reportcommon/statusview');
						$this->load->view('reportcommon/dgreport');
						$this->load->view('reportcommon/fadded');
						$this->load->view('reportcommon/alertstatus');
					} 
					if($m1=='hpsprr'){
						$this->load->view('reportcommon/hydrorunreport');
					} 
					if($m1=='hpspsvr'){
						$this->load->view('reportcommon/hpsstausviewreport');
					} 
					if($m1=='hpspcr'){
						$this->load->view('reportcommon/hydrorunreport');
						$this->load->view('reportcommon/hpsstausviewreport');
					} 
					if($m1=='wtcr'){
						$this->load->view('reportcommon/watermeterconsreport');
						
					}
					if($m1=='boirr'){
						$this->load->view('reportcommon/boilerrunn');
						
					}

					// $this->load->view('reportcommon/ventilationfansrun');
				//	$this->load->view('graphreportcommon/ventilationfangraph');


					//water end
					//air quality
						
						if($m1=='ter'){
							$this->load->view('reportcommon/toiletexaustrunn');
						}
						if($m1=='vfr'){
							$this->load->view('reportcommon/ventilationfansrun');
						}
						//air quality end
					//air start
					if($m1=='chrn'){
						$this->load->view('reportcommon/chillerrunreport');
					}
					if($m1=='clrun'){
						$this->load->view('reportcommon/coolingrunreport');
					}
					if($m1=='m1'){
						$this->load->view('reportcommon/ahureport');
					}
					if($m1=='iaqr'){
						$this->load->view('reportcommon/iaqreport');
					}
					//air end
					//specialized solution

					//end specialized
					
						?>
					</div>
					</div>
					<div class="graphical" id="graphical" style="display: none;">
					<div class="DshBrdSctnDtls" style="background:#fff">
					<hr/>
						<?php 
						//start energy
						if($m1=='ecgr'){
						$this->load->view('graphreportcommon/energyconsumptiongraph');
					    }
					    if($m1=='epwgr'){
						$this->load->view('graphreportcommon/energypowerfactor');
					    }
					     if($m1=='btrhgr'){
						$this->load->view('graphreportcommon/btugraph');
					    }
					     if($m1=='dgrgr'){
						$this->load->view('graphreportcommon/dgrungraph');
					    }
					     if($m1=='dgfagr'){
						$this->load->view('graphreportcommon/dgfadd');
					    }
					    if($m1=='upsgr'){
						$this->load->view('graphreportcommon/upsrungraph');
					    }
					     if($m1=='lpggr'){
						$this->load->view('graphreportcommon/lpggraph');
					    }
					     if($m1=='lpggr'){
						$this->load->view('graphreportcommon/lpggraph');
					    }
						//end energy
						
					    //start water
					    if($m1=='wlgr'){
						$this->load->view('graphreportcommon/waterlevelgraph');
					    }
					    if($m1=='lpgr'){
						$this->load->view('graphreportcommon/waterlinepressure');
					    }
					    if($m1=='mrgr'){
						$this->load->view('graphreportcommon/motorrungraph');
					    }
					    if($m1=='fprgr'){
						$this->load->view('graphreportcommon/firepumprungraph');
					    }
					    if($m1=='fplpgr'){
						$this->load->view('graphreportcommon/firepumplinepressure');
					    }
					    if($m1=='fpwlgr'){
						$this->load->view('graphreportcommon/firepumpwaterlevel');
					    }
					    if($m1=='hpsprrg'){
						$this->load->view('graphreportcommon/hpsgraph');
					    }
					    if($m1=='wtcrg'){
						$this->load->view('graphreportcommon/watermeterconsgraph');
						
						}
						if($m1=='boirrg'){
						$this->load->view('graphreportcommon/boilergraph');
						
						} 
						if($m1=='hwtl'){
						$this->load->view('graphreportcommon/hotwatertanklevel');
						
						} 
					    //end water
					    //air condition
						if($m1=='ahug'){
							$this->load->view('graphreportcommon/ahugraph');
						}
						if($m1=='chrgr'){
							$this->load->view('graphreportcommon/chillergraph');
						}
						if($m1=='ctgr'){
							$this->load->view('graphreportcommon/coolinggraph');
						}
					//end air condition
						//air quality
						if($m1=='iaqgr'){
							$this->load->view('graphreportcommon/iaqgraph');
						}
						if($m1=='teg'){
							$this->load->view('graphreportcommon/toiletexaustrunngraph');
						}
						if($m1=='vfg'){
							$this->load->view('graphreportcommon/ventilationcolevelgraph');
						}
						//air quality end
						//specialized solutuion
						if($m1=='wffr'){
							$this->load->view('graphreportcommon/washroomfootfall');
						}
						if($m1=='wodr'){
							$this->load->view('graphreportcommon/washroomodour');
						}
						if($m1=='wjr'){
							$this->load->view('graphreportcommon/washroomjanitor');

						}
						if($m1=='wfbr'){
							$this->load->view('graphreportcommon/washroomfeedback');
						}
						//end specialized

						?>
						
					</div>
					</div>
			
		</div>
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>
    <script src="<?php echo base_url(); ?>asset/admin/commonjs/report.js"></script>

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
<?php if(!empty($radio)){
	?>
	var type = <?php echo $radio; ?>;
		$("input[name=report_type][value='1']").prop("checked",true);
		//$("#cat").val('');	
	// var radios = $('input:radio[name=report_type]');
 //    if(radios.is(':checked') === false) {
 //        radios.filter('[value=1]').prop('checked', true);
 //    }

	<?php

}else{ ?>
	var type='';
	$("input[name=report_type][value='0']").prop("checked",true);
	//$("#cat").val('');
<?php } ?>
	
	// var type = $('input[name="report_type"]:checked').val();

	if (type==0) {
		$('#tabular').show();
		$('#graphical').hide();

	}else{
		
	    $('#tabular').hide();
		$('#graphical').show();
	}
	function getCatagory(type){
		$("#cat").val('');
   var type = $('input[name="report_type"]:checked').val();
	if (type==0) {		 
		
		$('#tabular').show();
		$('#graphical').hide();
    
	}else{
		//$("#cat").html("");
		//var div='<select name="device" class="form-control chosen-select" id="device" name="device"  name="cat" id="cat"><option value="" selected="selected">Select Catagory</option><option value="17">Water</option><option value="18">Energy</option><option value="16">Air Condioning</option><option value="19">Air Quality</option><option value="20">Soft Integration</option><option value="21">Specialized Solution</option></select>';
			 //$("#cat").html(div);
             //$("#cat").trigger("chosen:updated");
		$('#tabular').hide();
		$('#graphical').show();

//alert("graph")
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

	var type = $('input[name="report_type"]:checked').val();
	var sol=<?php echo $data['solution'] ?>;
	<?php $sol=$data['solution']; ?>
	<?php $rep=$data['report']; ?>
	 //alert(sol);
	 //alert(type);
		if(type==0){

			//Solutons start
			var category = $("#cat").val();
			//air condition
		if(category==16){
			//var solution = $("#solution").val();
							
			var div='<select name="device" class="form-control chosen-select" id="device" ><option value="" >Select Solution</option>		<option value="62" <?php echo ($sol=='62'?'selected':'');?>>Chiller</option><option value="63" <?php echo ($sol=='63'?'selected':'');?>>Cooling Tower</option></select>';
			//var d='<option  value="61">AHU</option><option value="64">IAQ</option>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==17){
         
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="">Select Solution</option><option value="43" <?php echo ($sol=='43'?'selected':'');?>>Motor Running</option><option value="44" <?php echo ($sol=='44'?'selected':'');?>>Firepump</option><option value="45" <?php echo ($sol=='45'?'selected':'');?>>Water Meter</option><option value="46" <?php echo ($sol=='46'?'selected':'');?>>Hydro Pnematic System</option><option value="47" <?php echo ($sol=='47'?'selected':'');?>>STP</option><option value="48" <?php echo ($sol=='48'?'selected':'');?>>Boilers</option></select>';
			//var d='<option value="41">Water Level</option>		<option value="42">Line Pressure</option><option value="45">Water Meter</option>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==18){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="">Select Solution</option><option value="51" <?php echo ($sol=='51'?'selected':'');?>>Energy Meter</option>		<option value="52" <?php echo ($sol=='52'?'selected':'');?>>BTU</option><option value="53" <?php echo ($sol=='53'?'selected':'');?>>DG</option><option value="54" <?php echo ($sol=='54'?'selected':'');?>>UPS</option><option value="55" <?php echo ($sol=='55'?'selected':'');?>>LPG</option><option value="56" <?php echo ($sol=='56'?'selected':'');?>>Trip Status</option><option value="57" <?php echo ($sol=='57'?'selected':'');?>>Diesel Tank</option><option value="58" <?php echo ($sol=='58'?'selected':'');?>>Diesel Meters</option></select>';
		//	var d='<option value="56">Trip Status</option>'
			$("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==19){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Solution</option><option value="71" <?php echo ($sol=='71'?'selected':'');?>>IAQ</option><option value="72" <?php echo ($sol=='72'?'selected':'');?>>Toilet Exaust</option><option value="73" <?php echo ($sol=='73'?'selected':'');?>>Ventilation Fan</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==20){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Solution</option><option value="81" <?php echo ($sol=='81'?'selected':'');?>>Lifts</option><option value="82" <?php echo ($sol=='82'?'selected':'');?>>DG</option><option value="83" <?php echo ($sol=='83'?'selected':'');?>>Inverter</option><option value="84" <?php echo ($sol=='84'?'selected':'');?>>Chillers</option><option value="85" <?php echo ($sol=='85'?'selected':'');?>>Fire Alarm System</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==21){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Solution</option><option value="91" <?php echo ($sol=='91'?'selected':'');?>>Washroom Monitoring</option><option value="92" <?php echo ($sol=='92'?'selected':'');?>>Cold Room</option><option value="93" <?php echo ($sol=='93'?'selected':'');?>>Floor Wetness</option><option value="94" <?php echo ($sol=='94'?'selected':'');?>>Door Open/Close</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		//solutions end
		//reports start
		var solution = $("#solution").val();
		
		//water report start
		
		if(solution==41 ){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==42){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==43){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="mrr" <?php echo ($rep=='mrr'?'selected':'');?>>Motor Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Motor1</option><option value="m1">Motor2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==44){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="fprr" <?php echo ($rep=='fprr'?'selected':'');?>>Running Report</option><option value="fpsvr" <?php echo ($rep=='fpsvr'?'selected':'');?>>Status View Report</option><option value="fpdrr" <?php echo ($rep=='fpdrr'?'selected':'');?>>DG Running Report</option><option value="fpdfar" <?php echo ($rep=='fpdfar'?'selected':'');?>>DG Fuel Added Report</option><option value="fpcr" <?php echo ($rep=='fpcr'?'selected':'');?>>Consolidated Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Firepump1</option><option value="m1">Firepump2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if( solution==45){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wtcr" <?php echo ($rep=='wtcr'?'selected':'');?>>Consumption Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Water Meter1</option><option value="m1">Water Meter2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==46){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="hpsprr" <?php echo ($rep=='hpsprr'?'selected':'');?>>Running Report</option><option value="hpspsvr" <?php echo ($rep=='hpspsvr'?'selected':'');?>>Status View Report</option><option value="hpspcr" <?php echo ($rep=='hpspcr'?'selected':'');?>>Consolidated Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">HPS1</option><option value="m1">HPS2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==47){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==48){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="boirr" <?php echo ($rep=='boirr'?'selected':'');?>>Boilers Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Boiler 01</option><option value="m1">Boiler 02</option><option value="m1">Boiler 03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}

		//end water report
		
		//air report start
		
		if(solution==62){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="chrn" <?php echo ($rep=='chrn'?'selected':'');?>>Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="chrn2">Chiller1</option><option value="chrn3">Chiller2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==63){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="clrun" <?php echo ($rep=='clrun'?'selected':'');?>>Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="clrun2">CT Fan1</option><option value="m1">CT Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==64){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="iaqr" <?php echo ($rep=='iaqr'?'selected':'');?>>IAQ Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">IAQ1</option><option value="iaq2">IAQ2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//air report end
		//air qualty
		if(solution==72){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ter" <?php echo ($rep=='ter'?'selected':'');?>>Toilet Exaust Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Toilet Exaust1</option><option value="m1">Toilet Exaust2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==73){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="vfr" <?php echo ($rep=='vfr'?'selected':'');?>>Ventilation Fan Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Ventilation Fan1</option><option value="m1">Ventilation Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end air quality

		//energy report start
		if(solution==51){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Report</option><option value="ecr" <?php echo ($rep=='ecr'?'selected':'');?>>Consumption Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">EM01</option><option value="m1">EM02</option><option value="m1">EM03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==52){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="brr" <?php echo ($rep=='brr'?'selected':'');?>>Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">BTU01</option><option value="m1">BTU02</option><option value="m1">BTU03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==53){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option><option value="dgrr" <?php echo ($rep=='dgrr'?'selected':'');?>>Running Report</option><option value="dgfar">Fuel Added Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">DG1</option><option value="m1">DG2</option><option value="m1">DG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==54){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="uprr" <?php echo ($rep=='uprr'?'selected':'');?>>UPS Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">UPS1</option><option value="m1">UPS2</option><option value="m1">UPS3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==55){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="lprr" <?php echo ($rep=='lprr'?'selected':'');?>>LPG  Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">LPG1</option><option value="m1">LPG2</option><option value="m1">LPG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==56){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Trip Status1</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end energy report
		//reports end
		

		}else{

			//graph solutions start
			$("#solution").html("");
			var category = $("#cat").val();
		if(category==16){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Solution</option><option value="61" <?php echo ($sol=='61'?'selected':'');?>>AHU</option>		<option value="62" <?php echo ($sol=='62'?'selected':'');?>>Chiller</option><option value="63" <?php echo ($sol=='63'?'selected':'');?>>Cooling Tower</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}if(category==17){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" >Select Solution</option><option value="41" <?php echo ($sol=='41'?'selected':'');?>>Water Level</option>		<option value="42" <?php echo ($sol=='42'?'selected':'');?>>Line Pressure</option><option value="43" <?php echo ($sol=='43'?'selected':'');?>>Motor Running</option><option value="44" <?php echo ($sol=='44'?'selected':'');?>>Firepump</option><option value="45" <?php echo ($sol=='45'?'selected':'');?>>Water Meter</option><option value="46" <?php echo ($sol=='46'?'selected':'');?>>Hydro Pnematic System</option><option value="47" <?php echo ($sol=='47'?'selected':'');?>>STP</option><option value="48" <?php echo ($sol=='48'?'selected':'');?>>Boilers</option><option value="49" <?php echo ($sol=='49'?'selected':'');?>>Hotwater Tanks</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==18){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="">Select Solution</option><option value="51" <?php echo ($sol=='51'?'selected':'');?>>Energy Meter</option>		<option value="52" <?php echo ($sol=='52'?'selected':'');?>>BTU</option><option value="53" <?php echo ($sol=='53'?'selected':'');?>>DG</option><option value="54" <?php echo ($sol=='54'?'selected':'');?>>UPS</option><option value="55" <?php echo ($sol=='55'?'selected':'');?>>LPG</option><option value="56" <?php echo ($sol=='56'?'selected':'');?>>Trip Status</option><option value="57" <?php echo ($sol=='57'?'selected':'');?>>Diesel Tank</option><option value="58" <?php echo ($sol=='58'?'selected':'');?>>Diesel Meters</option></select>';
			$("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==19){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Solution</option><option value="71" <?php echo ($sol=='71'?'selected':'');?>>IAQ</option><option value="72" <?php echo ($sol=='72'?'selected':'');?>>Toilet Exaust</option><option value="73" <?php echo ($sol=='73'?'selected':'');?>>Ventilation Fan</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==20){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Solution</option><option value="81" <?php echo ($sol=='81'?'selected':'');?>>Lifts</option><option value="82" <?php echo ($sol=='82'?'selected':'');?>>DG</option><option value="83" <?php echo ($sol=='83'?'selected':'');?>>Inverter</option><option value="84" <?php echo ($sol=='84'?'selected':'');?>>Chillers</option><option value="85" <?php echo ($sol=='85'?'selected':'');?>>Fire Alarm System</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==21){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Solution</option><option value="91" <?php echo ($sol=='91'?'selected':'');?>>Washroom Monitoring</option><option value="92" <?php echo ($sol=='92'?'selected':'');?>>Cold Room</option><option value="93" <?php echo ($sol=='93'?'selected':'');?>>Floor Wetness</option><option value="94" <?php echo ($sol=='94'?'selected':'');?>>Door Open/Close</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		//graph solution end
		//graph report start
		var solution = $("#solution").val();
		//alert(solution);
		//air report start
		//air condition
		if(solution==61){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ahug" <?php echo ($rep=='ahug'?'selected':'');?>>AHU Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">AHU1</option><option value="m1">AHU2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==62){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="chrgr" <?php echo ($rep=='chrgr'?'selected':'');?> >Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Chiller1</option><option value="m1">Chiller2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==63){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ctgr" <?php echo ($rep=='ctgr'?'selected':'');?>>Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">CT Fan1</option><option value="m1">CT Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end air condition
		//air quality
		if(solution==71){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="iaqgr" <?php echo ($rep=='iaqgr'?'selected':'');?>>IAQ Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">IAQ1</option><option value="m1">IAQ2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==72){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="teg" <?php echo ($rep=='teg'?'selected':'');?>>Toilet Exaust Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Toilet Exaust1</option><option value="m1">Toilet Exaust2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==73){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="vfg" <?php echo ($rep=='vfg'?'selected':'');?>>Ventilation Fan Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Ventilation Fan1</option><option value="m1">Ventilation Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//air quality end
		//water report start
		if(solution==41){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wlgr" <?php echo ($rep=='wlgr'?'selected':'');?>>Water Level Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="fpdfar">Water Level01</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==42){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="lpgr" <?php echo ($rep=='lpgr'?'selected':'');?>>LinePressure</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="fpwlgr">LinePressure1</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==43){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="mrgr" <?php echo ($rep=='mrgr'?'selected':'');?>>Motor Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Motor1</option><option value="m1">Motor2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==44){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="fprgr" <?php echo ($rep=='fprgr'?'selected':'');?>>Running Hours</option><option value="fplpgr" <?php echo ($rep=='fplpgr'?'selected':'');?>>LinePressure</option><option value="fpwlgr" <?php echo ($rep=='fpwlgr'?'selected':'');?>>Water Level</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Firepump1</option><option value="m1">Firepump2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}

		if(solution==45){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wtcrg" <?php echo ($rep=='wtcrg'?'selected':'');?>>Consumption Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Water Meter1</option><option value="m1">Water Meter2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==46){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="hpsprrg" <?php echo ($rep=='hpsprrg'?'selected':'');?>>Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">HPS1</option><option value="m1">HPS2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==48){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="boirrg" <?php echo ($rep=='boirrg'?'selected':'');?>>Boilers Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Boiler 01</option><option value="m1">Boiler 02</option><option value="m1">Boiler 03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==49){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="hwtl" <?php echo ($rep=='hwtl'?'selected':'');?>>Hotwater Tank Level</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">HotwaterTank 01</option><option value="m1">HotwaterTank 02</option><option value="m1">HotwaterTank 03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end water report
		//energy report start
		if(solution==51){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="">Select Report</option><option value="ecgr" <?php echo ($rep=='ecgr'?'selected':'');?>>Consumption Graph Report</option><option value="epwgr" <?php echo ($rep=='epwgr'?'selected':'');?>>Power Factor</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">EM01</option><option value="m1">EM02</option><option value="m1">EM03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==52){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option><option value="btrhgr" <?php echo ($rep=='btrhgr'?'selected':'');?>>Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">BTU01</option><option value="m1">BTU02</option><option value="m1">BTU03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==53){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option><option value="dgrgr" <?php echo ($rep=='dgrgr'?'selected':'');?>>Running Graph Report</option><option value="dgfagr" <?php echo ($rep=='dgfagr'?'selected':'');?>>Fuel Added Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">DG1</option><option value="m1">DG2</option><option value="m1">DG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==54){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option><option value="upsgr" <?php echo ($rep=='upsgr'?'selected':'');?>>Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">UPS1</option><option value="m1">UPS2</option><option value="m1">UPS3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==55){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option><option value="lpggr" <?php echo ($rep=='lpggr'?'selected':'');?>>LPG  Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">LPG1</option><option value="m1">LPG2</option><option value="m1">LPG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==56){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Trip Status1</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end energy report
		//specialized solution
		if(solution==91){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" >Select Report</option><option value="wffr" <?php echo ($rep=='wffr'?'selected':'');?>>Footfall Report</option><option value="wodr" <?php echo ($rep=='wodr'?'selected':'');?>>Odour Report</option><option value="wjr" <?php echo ($rep=='wjr'?'selected':'');?>>Janitor Report</option><option value="wfbr" <?php echo ($rep=='wfbr'?'selected':'');?>>Feedback Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Toilet Exaust1</option><option value="m1">Toilet Exaust2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end specialized
		//graph report end


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

// $('#export').click(function(){
	// $("#myForm").submit(); 
	// location.reload(true);
// });


	
 </script>	
</html>