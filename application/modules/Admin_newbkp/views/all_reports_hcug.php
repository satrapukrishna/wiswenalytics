<?php //echo "string"; ?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
<style>	
table.report-container {
    page-break-after: always;
}

thead.report-header {
    display: table-header-group;
}

tfoot.report-footer {
    display: table-footer-group;
}

.no-leftpad {
    padding-left: 0px !important;
}

#error {
	background: #ff0000;
    color: #ffff;
    padding: 0 10px;
    font: 600 14px/45px 'Open Sans' !important;
    position: absolute;
    display: block;
    bottom: -40px;
    left: 0;
    border-radius: 20px;
    width: 100%;
}

.table > thead > tr > th {
    border-bottom: 1px solid #3c8dbc !important;
}

.btn {
    font: 600 15px 'Open Sans' !important
}

img {
    vertical-align: middle;
    margin-right: 10px;
}




.loader {
    position: fixed;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: rgba(0,0,0,0.8) url(../../asset/admin/images/ajax-loader.gif) no-repeat center center;
	z-index: 9999;
}

@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.text-head {
    color: #fff;
    background: #468dbc;
    font: 600 18px 'Open Sans' !important;
    border-bottom: 1px solid #468dbc;
    padding: 10px;
}

select, input {
    margin-bottom: 10px;
    margin-right: 5px;
}

table th {
    color: #468dbc;
}

.report-text {
    padding: 10px 0;
	margin: 0;
    font: 700 18px 'Open Sans' !important;
    color: #3c8dbc;
	border-bottom: 1px solid #eee;
}


.label-name, .radio-inline {
    padding-left: 0px;
    font: 600 13px 'Open Sans' !important;
    color: #444;
}

div.search_box {
	display: flex;
	flex-wrap: nowrap;
	border-bottom: 1px solid #eee;
	padding: 10px 0;
}

.form-control1 {
	padding: 0 10px 0 0;
}

.form-control {
	width: auto!important;
	height: auto!important;
	font: 400 13px/100% 'Open Sans'!important;
	border-radius: 3px!important;
}

.filter-success {
    background: #3c8dbc;
    border: 1px solid #093956;
    color: #fff;
    padding-left: 25px;
    padding-right: 25px
}

    .filter-success:hover {
        background: #2c78a3;
        color: #fff
    }

.reset {
    padding-left: 25px;
    padding-right: 25px
}

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

/* UI CSS - Starts */
form {
    margin: 0 !important;
}

div.DshMnCtnr div.DshBrdCtnr {
    background: #fafafa;
}

    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn {
        padding: 10px;
        border: 0;
        position: fixed;
        width: 81%;
        top: 50px;
        height: calc(100% - 90px);
    }

div.SrchFullBx {
    padding: 0 10px;
    background: #FFFFFF;
	box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.08);
	border-radius: 10px;
	position: relative;
}

div.SrchBtnHldr {
    display: flex;
    flex-wrap: wrap;
	padding: 10px 0;
}

div.FullReportDtlsHldr {
	margin: 0;
	height: calc(100% - 180px);
    overflow: hidden;
	background: #FFFFFF;
	box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
	border-radius: 10px;
	transition: 0.3s;
}

div.FullReportDtlsHldr.FllHght {
	height: calc(100% - 85px);
	transition: 0.3s;
}

div.RprtDtlsInnrHldr {
	position: relative;
}

div.RprtDtlsInnrHldr div.RprtHdr {
	display: flex;
	flex-wrap: nowrap;
	padding: 15px 0;
	border-bottom: 1px solid #eee;
	flex-direction: row;
    align-items: center;
	display: none;
}

div.RprtDtlsInnrHldr div.RprtHdr div.TtlHldr {
	padding: 0 10px;
}

div.RprtDtlsInnrHldr div.RprtHdr div.TtlHldr span.TtlTxt {
	display: block;
	font: 700 18px/100% 'Open Sans';
	color: #222;
}

div.RprtDtlsInnrHldr div.RprtHdr div.RprtDtlsHldr {
	padding: 0 10px;
}

div.RprtDtlsInnrHldr div.RprtHdr div.RprtDtlsHldr span.Txt {
	display: block;
	font: 500 11px/100% 'Open Sans';
	color: #666;
}

div.RprtDtlsInnrHldr div.RprtHdr div.RprtDtlsHldr span.Txt.Bld {
	font: 600 13px/100% 'Open Sans';
	color: #222;
	padding: 3px 0 0 0;
}

div.RprtTabDv {
		border-bottom: 1px solid #eee;
		position: relative;
		z-index: 1;
		padding: 10px;
		display: flex;
		flex-wrap: nowrap;
	}

	div.RprtTabDv span.TabLnk {
		display: block;
		margin: 0 5px 0 0;
		padding: 15px;
		font: 600 14px/100% 'Open Sans';
		color: #fff;
		background: #666;
		border-radius: 5px;
		position: relative;
		cursor: pointer;
		transition: 0.3s;
		z-index: 2;
	}

	div.RprtTabDv span.TabLnk:hover, div.RprtTabDv span.TabLnk.Actv {
		background: #367FA8;
		transition: 0.3s;
	}

	div.RprtTabDv span.TabLnk.Actv:after {
		content: '';
		position: absolute;
		width: 0; 
		height: 0; 
		border-left: 10px solid transparent;
		border-right: 10px solid transparent;
		border-bottom: 10px solid #fff;
		bottom: -1px;
		left: calc(50% - 10px);
		z-index: 3;
		display: none;
	}

	div.RprtTabDv span.TabLnk.Icn {
		padding-left: 40px;
		background-position: left 12px top 12px !important;
		background-repeat: no-repeat !important;
		background-size: 20px !important;
	}

	div.RprtTabDv span.TabLnk.Icn.Wtr {
		background-image: url(../../asset/demoforall/Images/Water-Tank-W.png);
	}

	div.RprtTabDv span.TabLnk.Icn.WtrMtr {
		background-image: url(../../asset/demoforall/Images/Flow-Meter-W.png);
	}

	div.RprtTabDv span.TabLnk.Icn.WtrLvl {
		background-image: url(../../asset/demoforall/Images/water_level_menu.png);
	}

	div.RprtTabDv span.TabLnk.Icn.FrPmp {
		background-image: url(../../asset/demoforall/Images/Fire-Pump-W.png);
	}

	div.RprtTabDv span.TabLnk.Icn.HydPneSys {
		background-image: url(../../asset/admin/images/HydroPnematicSystem.png);
	}

	div.RprtTabDv span.TabLnk.Icn.Enrgy {
		background-image: url(../../asset/demoforall/Images/energy-w.png);
	}

	div.RprtTabDv span.TabLnk.Icn.EnrgyMtr {
		background-image: url(../../asset/demoforall/Images/Electric-Meter-W.png);
	}

	div.RprtTabDv span.TabLnk.Icn.DG {
		background-image: url(../../asset/admin/images/DG.png);
	}


div.RprtFullDv {
	padding: 0 10px;
	display: flex;
	flex-wrap: wrap;
	position: relative;
    width: 100%;
    height: calc(100% - 70px);
    overflow-y: scroll;
}

div.RprtFullDv.FllHght {
	height: 100%;
}

div.RprtFullDv span.CatTtlTxt {
	display: block;
	width: 100%;
	padding: 15px 20px;
	margin: 10px 0 0 0;
	font: 700 15px/100% 'Open Sans';
	background: #367FA8;
	color: #fff;
	border-radius: 5px;
}

span.SctnTtl {
	display: block;
	width: 100%;
	padding: 15px 20px;
	border-bottom: 1px solid #eee;
	font: 700 14px/100% 'Open Sans';
	color: #222;
}

div.RprtFullDv div.GrphMnHldr {
	border: 1px solid #ddd;
	border-radius: 10px;
	padding: 10px;
	margin: 10px;
	width: calc(50% - 20px);
}

div.RprtFullDv div.GrphMnHldr.FllWdth {
	margin: 10px;
	width: calc(100% - 20px);
}

table.RprtTbl {
	width: 100%;
	margin: 10px 0 30px 0;
}

table.RprtTbl th, table.RprtTbl td {
	padding: 25px;
	font: 500 12px/120% 'Open Sans';
	color: #555;
	border: 1px solid #eee;
	text-align: center;
}

table.RprtTbl th {
	background: #fafafa;
	font-weight: 700;
	color: #333;
	border-color: #ddd;
}

div.SmmryDtlsTblHldr {
	width: 100%;
	border-radius: 10px;
	border: 1px solid #ddd;
	overflow: hidden;
	margin: 10px 0 30px 0;
}

div.SmmryDtlsTblHldr table.RprtTbl {
	margin: 0 0 10px 0;
}

div.SmmryDtlsTblHldr table.RprtTbl th, div.SmmryDtlsTblHldr table.RprtTbl td {
	border: 0;
	padding: 15px 10px;
	width: 20%;
}

div.SmmryDtlsTblHldr table.RprtTbl th {
	font-size: 13px;
}

div.SmmryDtlsTblHldr table.RprtTbl td {
	padding-top: 0;
}

div.SmmryDtlsTblHldr table.RprtTbl td.Brdr {
	border-bottom: 1px solid #eee;
	padding-bottom: 15px;
}

div.SmmryDtlsTblHldr table.RprtTbl td.Bld {
	font-size: 13px;
	font-weight: 700;
	color: #222;
	padding-bottom: 0;
	padding-top: 15px;
}

div.SmmryDtlsTblHldr table.RprtTbl.Dual td:first-child {
	padding-top: 0;
}

div.SmmryDtlsTblHldr table.RprtTbl.FireTank td:first-child, div.SmmryDtlsTblHldr table.RprtTbl.FireTank td {
	padding-top: 10px;
	padding-bottom: 10px;
	border-bottom: 1px solid #eee;
}

div.SmmryDtlsTblHldr table.RprtTbl.Sngl td {
	padding: 15px 10px!important;
}




div.RprtDtlsInnrHldr div.RprtFtr {
	border-top: 1px solid #ddd;
	display: none;
}

div.RprtDtlsInnrHldr div.RprtFtr span.FtrTxt {
	display: block;
	text-align: center;
	padding: 20px;
	font: 600 11px/100% 'Open Sans';
	color: #222;
}

div.RprtDtlsInnrHldr div.RprtFtr span.FtrTxt {
	display: block;
	text-align: center;
	padding: 20px;
	font: 600 11px/100% 'Open Sans';
	color: #222;
}



footer {
	width: 100%;
    margin: 0 !important;
    padding: 14px 10px 0 10px;
    height: 40px;
    position: fixed;
    bottom: 0;
    font: 400 11px/100% 'Open Sans'!important;
}

/* UI CSS - Ends */
@page {
  
}
@media print {
    /*body * {
        visibility: hidden;
    }

    #FullReportDtlsHldr * {
        visibility: visible;
    }

    #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
    }*/

	thead {
		display: table-header-group!important;
	}

	tbody {
		display: table-row-group!important;
	}

	table.RprtTbl {
		page-break-inside: avoid;
	}
	div.FullReportDtlsHldr {
		height: auto;
		overflow: inherit;
	}
	
	div.RprtDtlsInnrHldr div.RprtHdr {
		flex-wrap: wrap;
		border-color: #000;
		padding-top: 0;
		display: flex;
	}

	div.RprtDtlsInnrHldr div.RprtHdr div.TtlHldr {
		width: 100%;
		padding: 0 0 10px 0;
	}

	div.RprtDtlsInnrHldr div.RprtHdr div.TtlHldr span.TtlTxt {
		font-size: 22px;
	}

	div.RprtDtlsInnrHldr div.RprtHdr div.RprtDtlsHldr {
		width: 33.33%;
		padding: 10px 10px 0 0;
	}

	div.RprtTabDv {
		display: none;
	}
	
	div.RprtFullDv {
		padding: 0;
		height: auto;
		overflow: visible;
	}

	span.CatTtlTxt {
		border: 1px solid #000;
		background-color: #000;
		color: #fff;
		border-radius: 0px!important;
		-webkit-print-color-adjust: exact; 
	}

	span.SctnTtl {
		display: table!important;
		border-bottom: 1px dashed #000;
		font-size: 15px;
		padding-left: 0;
	}

	
	div.RprtFullDv div.GrphMnHldr {
		width: 100%;
		margin: 10px 0;
	}

	div.SmmryDtlsTblHldr {
		margin-bottom: 10px;
		border: none;
		border-radius: 0;
		overflow: inherit;
	}

	

	div.SmmryDtlsTblHldr table.RprtTbl {
		border: 1px solid #000;
	}

	div.SmmryDtlsTblHldr table.RprtTbl th, div.SmmryDtlsTblHldr table.RprtTbl td.Brdr {
		border-bottom: 1px solid #000;
	}

	div.SmmryDtlsTblHldr table.RprtTbl.FireTank td:first-child, div.SmmryDtlsTblHldr table.RprtTbl.FireTank td {
		border-bottom: 1px solid #000;
	}

	div.RprtDtlsInnrHldr div.RprtFtr {
		display: block;
	}
}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<body>
	<div class="loader" id="loader" style="display:none"></div>
    <div id="MnCtnr" class="DshMnCtnr">
		<?php $this->load->view('common/left_menu_hcug3') ?>
		<?php $this->load->view('common/header2') ?>
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
			<div class="DshBrdSctn">
				<div class="DshBrdSctnDtls">
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports_hcug")?>" method="post" onSubmit="return formValidation();">
						<div class=SrchFullBx>
							<h2 class="report-text">Reports</h2>
							<div class="search_box" >
								<div class="radio-but">
									<label class="radio-inline">
										<input type="radio" id="typec" name="report_type" class="checkbox_check" value="0" onchange="getCatagory('0')"  checked>Tabular Report
									</label>
									<label class="radio-inline">
										<input type="radio" id="typed" name="report_type" class="checkbox_check" value="1" onchange="getCatagory('1')"  >Graphical Report
									</label>
																														
								</div>
							</div>							
							<input type="hidden" id="page" value="runninggg"/>					
							<span id="error"></span>
							<div class="search_box">
								<div class="form-control1" id="categorydiv">							
									<?php echo form_dropdown('category', $category, $this->input->post('category'), 'class="form-control chosen-select" onchange="getsolutions()" name="cat" id="category"'); ?>
								</div>
								
								<div class="form-control1" id="solutiondiv">
									<?php echo form_dropdown('device', $solution, $this->input->post('device'), 'class="form-control chosen-select" id="solution" onchange="getdevices()"'); ?>
								</div>
								<div class="form-control1">
									<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
								</div>
								<div class="form-control1">
									<!-- <label class="label-name">To Date</label> -->
									<input class="form-control" onfocus="(this.type='date')" value="<?php echo set_value('todate') ?>" type="text" name="todate" id="todate" placeholder="To Date">
								</div>
								
							</div>
							<div class="SrchBtnHldr">
								<span class="show_button hide_button">
								<button type="submit" id="filter" class="btn  filter-success">Filter</button>
								<a href="<?php echo site_url('Admin/Home/all_reports_hcug') ?>" class="btn btn-info reset">Reset</a></span>
								<a class="btn btn-info hide_button search_box" style="background:#fff;color:#3c8dbc;margin-left:4px">Hide Search Box</a>
								<a class="btn btn-info change_search show_button hide_button" style="background:#fff;color:#3c8dbc;display:none;margin-left:4px">Change Search Fields</a>		
								<input type="button" style="margin-left:4px" class="btn btn-info" onclick="printDiv('content')" value="Export" />
								<input type="button" style="margin-left:4px" class="btn btn-info" name="exporttbl" id="exporttbl" onclick="exportTableToExcel('content')" value="ExportToExcel" />
								
							</div>
						</div>
					</form>
				</div>
				
				<div class="FullReportDtlsHldr" id="content">

					
					
					
					<div class="RprtDtlsInnrHldr">
					<div class="RprtFullDv FllHght">
					<?php 	
						//echo print_r($data['device']);die();
						//water tabular
						
						
						if($data['device']==37 && $data['report_type']==0){							
							$this->load->view('reportcommon/switch_status_report_hcug',$data);
							
						}
						
					?>
					
					
					<?php
						//water grapical
						
						if($data['device']==37 && $data['report_type']==1){
						$this->load->view('graphreportcommon/motorrunninggraph_hcug');								
						}
						//end water
						//start energy
						if($data['device']==41 && $data['report_type']==1){							
							$this->load->view('graphreportcommon/energyconsumptiongraph');
							}
						if($data['device']==51 && $data['report_type']==1){
							$this->load->view('graphreportcommon/energypowerfactor');
						}	?>
						</div>
					</div>
				</div>
			<?php $this->load->view('common/footer3') ?>
		</div>
    </div>
</body>
    

<script>
	function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Report.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
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
			// getreports();
		<?php } ?>
		
		$('.graph-data').show();
		$('.tablular-data').hide();
		$('#exporttbl').hide();
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
	$('#exporttbl').hide();

	//$("#cat").val('');
<?php } ?>
	
	// var type = $('input[name="report_type"]:checked').val();

	if (type==0) {
		$('#tabular').show();
		$('#graphical').hide();
		$('.graph-data').hide();
		$('.tablular-data').show();
		$('#loader').hide();
		$('#exporttbl').show();
	}else{
		
	    $('#tabular').hide();
		$('#graphical').show();
		$('.graph-data').show();
		$('.tablular-data').hide();
		$('#loader').hide();
		$('#exporttbl').hide();
	}
	function getCatagory(type){
		$("#cat").val('');
		getsolutions();
		
		if (type==0) {	 
			
			$('#tabular').show();
			$('#graphical').hide();
			$('.graph-data').hide();
		$('.tablular-data').show();
		$('#loader').hide();
		$('#exporttbl').show();
		
		}else{
			
			$('#tabular').hide();
			$('#graphical').show();
			$('.graph-data').show();
		$('.tablular-data').hide();
		$('#loader').hide();
		$('#exporttbl').hide();

	
		}
	}


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


return true;
}


function getsolutions(){
    $("#solution").html("");
    var category = $("#category").val();
	var type = $('input[name="report_type"]:checked').val();
    
        // $(".device").show();
  
    $.ajax({
        type: 'GET',
        data: {
            category:category,type:type
        },
        url: BASE_URL+'Admin/Home/ajax_hardware_device_dropdown_hcug/',
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
	$('.FullReportDtlsHldr').toggleClass("FllHght");
});

</script>
</html>