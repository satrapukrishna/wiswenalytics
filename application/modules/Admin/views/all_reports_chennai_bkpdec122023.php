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
	background: rgba(255,255,255,0.8);
	z-index: 9999;
}

.loader:before {
	content: '';
    position: absolute;
    width: 240px;
    height: 140px;
    background: transparent url(../../asset/admin/images/WIS-Spaces-Logo.svg) no-repeat center center;
    background-size: 280px;
    left: calc(50% - 100px);
    top: calc(50% - 300px);
}

.loader:after {
	content: 'Loading. Please wait.';
    position: absolute;
    width: 240px;
    height: 80px;
    background: transparent url(../../asset/admin/images/LoadingSmpl.gif) no-repeat center center;
    background-size: 84px;
    left: calc(50% - 100px);
    top: calc(50% - 150px);
    text-align: center;
    font: 600 15px 'Open Sans';
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
	align-content: start;
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
	padding: 10px;
	font: 500 12px/120% 'Open Sans';
	color: #555;
	border: 1px solid #eee;
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

	
	table.RprtTbl th, table.RprtTbl td {
		font: 500 9px/120% 'Open Sans' !important;
		padding: 2px !important;
	}

	table.RprtTbl th {
		font-weight: 600 !important;
	}

	div.FullReportDtlsHldr {
		height: auto;
		overflow: inherit;
	}
	
	div.RprtDtlsInnrHldr div.RprtHdr {
		flex-wrap: wrap;
		border-color: #000;
		padding: 5px;
		display: flex;
	}

	div.RprtDtlsInnrHldr div.RprtHdr div.TtlHldr {
		width: 100%;
		padding: 0 0 10px 0;
	}

	div.RprtDtlsInnrHldr div.RprtHdr div.TtlHldr span.TtlTxt {
		font-size: 16x;
	}

	div.RprtDtlsInnrHldr div.RprtHdr div.RprtDtlsHldr span.Txt, div.RprtDtlsInnrHldr div.RprtHdr div.RprtDtlsHldr span.Txt.Bld {
		font-size: 9px !important;
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
		display: flex !important;
		flex-wrap: wrap !important;
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
		font-size: 11px;
		padding: 5px 0 5px 0;
		margin: 5px 0 0 0;
	}

	div.RprtFullDv span.CatTtlTxt {
		font-size: 12px;
		padding: 10px !important;
	}

	
	div.RprtFullDv div.GrphMnHldr {
		/* width: 50%;*/
		width: calc(50% - 20px);
		margin: 10px !important;
		padding: 0 !important;
	}

	div.SmmryDtlsTblHldr {
		margin-bottom: 10px;
		border: none;
		border-radius: 0;
		overflow: inherit;
	}

	.highcharts-container, .highcharts-root {
		width: 100% !important;
	}

	.highcharts-axis-labels text {
		color: #000 !important;
		font-size: 9px !important;
	}

	div.SmmryDtlsTblHldr table.RprtTbl {
		border: 1px solid #000;
		margin: 0 0 5px 0;
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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<body>
	<div class="loader" id="loader" style="display:none"></div>
    <div id="MnCtnr" class="DshMnCtnr">
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
			<div class="DshBrdSctn">
				<div class="DshBrdSctnDtls">
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/all_reports_chennai")?>" method="post" onSubmit="return formValidation();">
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
									<?php if($this->session->userdata('user_id')!=29){ ?>
									<label class="radio-inline">
										<input type="radio" id="typee" name="report_type" class="checkbox_check" value="2" onchange="getCatagory('2')"  >Consolidate Report
									</label>
									<label class="radio-inline">
										<input type="radio" id="typee" name="report_type" class="checkbox_check" value="3" onchange="getCatagory('3')"  >Summary Report
									</label>
									<label class="radio-inline">
										<input type="radio" id="typee" name="report_type" class="checkbox_check" value="4" onchange="getCatagory('4')"  >Detailed Report
									</label>	
									<?php }?>																				
								</div>
							</div>							
							<input type="hidden" id="page" value="runninggg"/>					
							<span id="error"></span>
							<div class="search_box">
								<div class="form-control1" id="categorydiv">							
									<?php echo form_dropdown('category', $category, $this->input->post('category'), 'class="form-control chosen-select" onchange="getsolutions()" name="cat" id="category"'); ?>
								</div>
								<div class="form-control1" id="consolidate">
									<?php	$options1 = array('1' => 'Consolidate Report');
									echo form_dropdown('consolidaterpt', $options1, $this->input->post('consolidaterpt'), 'class="form-control chosen-select"  id="consolidaterpt"'); ?>
								</div>
								<div class="form-control1" id="summery">
									<?php	$options2 = array('1' => 'Summary Report');
									echo form_dropdown('summeryrpt', $options2, $this->input->post('summeryrpt'), 'class="form-control chosen-select"  id="summeryrpt"'); ?>
								</div>
								<div class="form-control1" id="detailed">
									<?php	$options3 = array('1' => 'Detailed Report');
									echo form_dropdown('detailedrpt', $options3, $this->input->post('detailedrpt'), 'class="form-control chosen-select"  id="detailedrpt"'); ?>
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
								
								<div class="form-control1" id="fr">
									<!-- <label class="label-name">From Time</label> -->
									<?php $fromtimeoptions = array('Select FromTime' => 'Select FromTime','00:00:00' => '00:00:00','01:00:00' => '01:00:00','02:00:00' => '02:00:00','03:00:00' => '03:00:00','04:00:00' => '04:00:00','05:00:00' => '05:00:00','06:00:00' => '06:00:00','07:00:00' => '07:00:00','08:00:00' => '08:00:00','09:00:00' => '09:00:00','10:00:00' => '10:00:00','11:00:00' => '11:00:00','12:00:00' => '12:00:00','13:00:00' => '13:00:00','14:00:00' => '14:00:00','15:00:00' => '15:00:00','16:00:00' => '16:00:00','17:00:00' => '17:00:00','18:00:00' => '18:00:00','19:00:00' => '19:00:00','20:00:00' => '20:00:00','21:00:00' => '21:00:00','22:00:00' => '22:00:00','23:00:00' => '23:00:00','24:00:00' => '24:00:00');
									echo form_dropdown('fromtime', $fromtimeoptions, set_value('fromtime'), 'class="form-control chosen-select" id="fromtime"'); ?>
								</div>
								<div class="form-control1" id="to">
									<!-- <label class="label-name">To Time</label> -->
									<?php  $totimesoptions = array('Select ToTime' => 'Select ToTime','00:00:00' => '00:00:00','01:00:00' => '01:00:00','02:00:00' => '02:00:00','03:00:00' => '03:00:00','04:00:00' => '04:00:00','05:00:00' => '05:00:00','06:00:00' => '06:00:00','07:00:00' => '07:00:00','08:00:00' => '08:00:00','09:00:00' => '09:00:00','10:00:00' => '10:00:00','11:00:00' => '11:00:00','12:00:00' => '12:00:00','13:00:00' => '13:00:00','14:00:00' => '14:00:00','15:00:00' => '15:00:00','16:00:00' => '16:00:00','17:00:00' => '17:00:00','18:00:00' => '18:00:00','19:00:00' => '19:00:00','20:00:00' => '20:00:00','21:00:00' => '21:00:00','22:00:00' => '22:00:00','23:00:00' => '23:00:00','24:00:00' => '24:00:00');
									echo form_dropdown('totime', $totimesoptions, set_value('totime'), 'class="form-control chosen-select" id="totime"'); ?>
								</div>
							</div>
							<div class="SrchBtnHldr">
								<span class="show_button hide_button">
								<button type="submit" id="filter" class="btn  filter-success">Filter</button>
								<a href="<?php echo site_url('Admin/Home/all_reports_chennai') ?>" class="btn btn-info reset">Reset</a></span>
								<a class="btn btn-info hide_button search_box" style="background:#fff;color:#3c8dbc">Hide Search Box</a>
								<a class="btn btn-info change_search show_button hide_button" style="background:#fff;color:#3c8dbc;display:none">Change Search Fields</a>		
								<input type="button" class="btn btn-info" onclick="printDiv('content')" value="Export" />
								<input type="button" class="btn btn-info" onclick="exportTableToExcel('list','')" value="Export TO Excel" id="tblexport" name="tblexport" />
							</div>
						</div>
					</form>
				</div>
				
				<div class="FullReportDtlsHldr" id="content">

					<?php if($data['report_type']==3){ ?>
						<div class="RprtDtlsInnrHldr">
						<div class="RprtHdr">
							<div class="TtlHldr">
								<span class="TtlTxt">Summary Report</span>
							</div>
							<div class="RprtDtlsHldr">
									<span class="Txt">Generated by</span>
									<span class="Txt Bld"><?php echo $this->session->userdata('employee_name')  ?></span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Generated on</span>
									<span class="Txt Bld"><?php echo date("Y-m-d h:m") ?></span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Report Period</span>
									<span class="Txt Bld"><?php echo $_POST['fromdate']." to ".$_POST['todate'] ?></span>
								</div>
						</div>
						<!-- <div class="RprtTabDv">
							<span class="TabLnk Icn WtrMtr Actv">Water Meter</span>
							<span class="TabLnk Icn WtrLvl">Water Level</span>
							<span class="TabLnk Icn FrPmp">Fire Pump</span>
							<span class="TabLnk Icn HydPneSys">Hydro Pnematic System</span>
							<span class="TabLnk Icn EnrgyMtr">Energy Meter</span>
							<span class="TabLnk Icn DG">Diesel Generator</span>
						</div> -->
						<div class="RprtFullDv">
							<span class="CatTtlTxt">Water</span>
							<span class="SctnTtl">Water Meters</span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Water In</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  for($j=0;$j<count($flowdata);$j++){
										if($flowdata[$j]['summery']['meter']=='Borewell 1 (IN)' || $flowdata[$j]['summery']['meter']=='Borewell 2 (IN)'){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $flowdata[$j]['summery']['meter']; ?></td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['totalconsumption']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['avgperday']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['max']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['min']; ?> KL</td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['maxdate']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['mindate']; ?></td>
									</tr>
									<?php }}?>
									
								</table>
								<table class="RprtTbl Dual">
									<tr>
										<th>Water Consumption</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php   for($j=0;$j<count($flowdata);$j++){
										if($flowdata[$j]['summery']['meter']!='Borewell 1 (IN)' && $flowdata[$j]['summery']['meter']!='Borewell 2 (IN)'){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $flowdata[$j]['summery']['meter']; ?></td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['totalconsumption']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['avgperday']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['max']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['min']; ?> KL</td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['maxdate']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['mindate']; ?></td>
									</tr>
									<?php }}?>
									
								</table>
								
							</div>
							<!-- <span class="SctnTtl">Water Level</span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual FireTank">
									<tr>
										<th>Tanks</th>
										<th>Level 80-100 %</th>
										<th>Level 30-60 %</th>
										<th>Level 0-30 %</th>
										
									</tr>
									<?php //$meters=['Fire Water Tank 01','Fire Water Tank 02','Fire Water Tank 03','Raw Water Tank 01'];   for($j=0;$j<count($meters);$j++){
								?>
									<tr>
										<td  class="Bld"><?php //echo $meters[$j]; ?></td>
										<td class="Bld"><?php //echo "30% "; ?></td>
										<td class="Bld"><?php //echo "60% "; ?></td>
										<td class="Bld"><?php //echo "10% "; ?></td>
										
									</tr>
									
									<?php //}?>
									
								</table>
								
								
							</div> -->
							<!-- <span class="SctnTtl"></span> -->
							<span class="SctnTtl">Motor Running Hours(Borewell Motors)</span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Motor</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  $k=0; for($j=0;$j<count($borewell_data);$j++){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $borewell_data[$j]['summery']['meter']; ?></td>
										<td class="Bld"><?php echo $borewell_data[$j]['summery']['totalrun']; ?></td>
										<td class="Bld"><?php echo $borewell_data[$j]['summery']['avgperday']; ?></td>
										<td class="Bld"><?php echo $borewell_data[$j]['summery']['max']; ?> </td>
										<td class="Bld"><?php echo $borewell_data[$j]['summery']['min']; ?></td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $borewell_data[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $borewell_data[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr"><?php echo $borewell_data[$j]['summery']['maxdate']; ?></td>
										<td class="Brdr"><?php echo $borewell_data[$j]['summery']['mindate']; ?></td>
									</tr>
									<?php }?>
									
								</table>
								
							</div>
							<span class="SctnTtl">Fire Pump Systems</span>
							<span class="SctnTtl"><?php echo $firepump_data[0]['meter']; ?></span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Pumps</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  $k=0; for($j=0;$j<count($firepump_data[0]['summery']);$j++){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $firepump_data[0]['summery'][$j]['meter']; ?></td>
										<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['totalrun']; ?></td>
										<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['avgperday']; ?></td>
										<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['max']; ?></td>
										<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['min']; ?></td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $firepump_data[0]['summery'][$j]['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $firepump_data[0]['summery'][$j]['totaldays']; ?></td>
										<td class="Brdr"><?php echo $firepump_data[0]['summery'][$j]['maxdate']; ?></td>
										<td class="Brdr"><?php echo $firepump_data[0]['summery'][$j]['mindate']; ?></td>
									</tr>
									<?php }?>
									
								</table>
								<table class="RprtTbl Sngl">
									<tr>
										<th>Diesel Engine Fuel Tank</th>
										<th>Fuel Added</th>
										<th>Fuel Consumed</th>
										<th>Economy</th>
										<th>Avg. Volume Maintained</th>
									</tr>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php //echo $firepump_data[0]['dg']['name']; ?></td>
										<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_added']; ?> Lts</td>
										<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_consumed']; ?> Lts</td>
										<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_economy']; ?> </td>
										<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_avg']; ?> Lts</td>
									</tr>									
								</table>
							</div>
							<span class="SctnTtl"><?php echo $firepump_data[1]['meter']; ?></span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Pumps</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  $k=0; for($j=0;$j<count($firepump_data[1]['summery']);$j++){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $firepump_data[1]['summery'][$j]['meter']; ?></td>
										<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['totalrun']; ?></td>
										<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['avgperday']; ?></td>
										<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['max']; ?></td>
										<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['min']; ?></td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $firepump_data[1]['summery'][$j]['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $firepump_data[1]['summery'][$j]['totaldays']; ?></td>
										<td class="Brdr"><?php echo $firepump_data[1]['summery'][$j]['maxdate']; ?></td>
										<td class="Brdr"><?php echo $firepump_data[1]['summery'][$j]['mindate']; ?></td>
									</tr>
									<?php }?>
									
								</table>
								<table class="RprtTbl Sngl">
									<tr>
										<th>Diesel Engine Fuel Tank</th>
										<th>Fuel Added</th>
										<th>Fuel Consumed</th>
										<th>Economy</th>
										<th>Avg. Volume Maintained</th>
									</tr>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php //echo $firepump_data[1]['dg']['name']; ?></td>
										<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_added']; ?> Lts</td>
										<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_consumed']; ?> Lts</td>
										<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_economy']; ?> </td>
										<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_avg']; ?> Lts</td>
									</tr>									
								</table>
							</div>
							<span class="SctnTtl">Hydro Pnematic System </span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Hydro Pnematic System</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  $k=0; for($j=0;$j<count($hydro_data[0]['summery']);$j++){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $hydro_data[0]['summery'][$j]['meter']; ?></td>
										<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['totalrun']; ?></td>
										<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['avgperday']; ?></td>
										<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['max']; ?></td>
										<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['min']; ?></td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $hydro_data[0]['summery'][$j]['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $hydro_data[0]['summery'][$j]['totaldays']; ?></td>
										<td class="Brdr"><?php echo $hydro_data[0]['summery'][$j]['maxdate']; ?></td>
										<td class="Brdr"><?php echo $hydro_data[0]['summery'][$j]['mindate']; ?></td>
									</tr>
									<?php }?>
									
								</table>
							</div>
							<span class="CatTtlTxt">Energy</span>
							<span class="SctnTtl">Energy Meters</span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Meter</th>
										<th>Total Reading</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  for($k=0;$k<count($energydata['summery']);$k++){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $energydata['summery'][$k]['meter']; ?> </td>
										<td class="Bld"><?php echo $energydata['summery'][$k]['totalconsumption']; ?> Kwh</td>
										<td class="Bld"><?php echo $energydata['summery'][$k]['avgperday']; ?> Kwh</td>
										<td class="Bld"><?php echo $energydata['summery'][$k]['max']; ?> Kwh</td>
										<td class="Bld"><?php echo $energydata['summery'][$k]['min']; ?> Kwh</td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $energydata['summery'][$k]['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $energydata['summery'][$k]['totaldays']; ?></td>
										<td class="Brdr"><?php echo $energydata['summery'][$k]['maxdate']; ?> </td>
										<td class="Brdr"><?php echo $energydata['summery'][$k]['mindate']; ?> </td>
									</tr>
									<?php  } ?>
									
								</table>
							</div>
							<span class="SctnTtl">DG SET</span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Meter</th>
										<th>Total Running</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  //for($k=0;$k<count($energydata['summery']);$k++){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld">Diesel Generator </td>
										<td class="Bld"><?php echo $dgdata[0]['summery']['totalrun']; ?> </td>
										<td class="Bld"><?php echo $dgdata[0]['summery']['avgperday']; ?> </td>
										<td class="Bld"><?php echo $dgdata[0]['summery']['max']; ?> </td>
										<td class="Bld"><?php echo $dgdata[0]['summery']['min']; ?> </td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $dgdata[0]['summery']['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $dgdata[0]['summery']['totaldays']; ?></td>
										<td class="Brdr"><?php echo $dgdata[0]['summery']['maxdate']; ?> </td>
										<td class="Brdr"><?php echo $dgdata[0]['summery']['mindate']; ?> </td>
									</tr>
									<?php  //} ?>
									
								</table>
								<table class="RprtTbl Sngl">
									<tr>
										<th>Diesel Generator Fuel Tank</th>
										<th>Fuel Added</th>
										<th>Fuel Consumed</th>
										<th>Economy</th>
										<th>Avg. Volume Maintained</th>
									</tr>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php //echo $dgdata[0]['dg']['name']; ?></td>
										<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_added']; ?> Lts</td>
										<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_consumed']; ?> Lts</td>
										<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_economy']; ?> </td>
										<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_avg']; ?> Lts</td>
									</tr>									
								</table>
							</div>
						</div>
						<div class="RprtFtr">
							<span class="FtrTxt">© Wenalytics | All rights reserved.</span>
						</div>
						</div>
					<?php }?>
					<?php if($data['report_type']==2){ ?>
						<div class="RprtDtlsInnrHldr">
							<div class="RprtHdr">
								<div class="TtlHldr">
									<span class="TtlTxt">Consolidated Report</span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Generated by</span>
									<span class="Txt Bld"><?php echo $this->session->userdata('employee_name')  ?></span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Generated on</span>
									<span class="Txt Bld"><?php echo date("Y-m-d h:m") ?></span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Report Period</span>
									<span class="Txt Bld"><?php echo $_POST['fromdate']." to ".$_POST['todate'] ?></span>
								</div>
							</div>
							<!-- <div class="RprtTabDv">
								<span class="TabLnk Icn WtrMtr Actv">Water Meter</span>
								<span class="TabLnk Icn WtrLvl">Water Level</span>
								<span class="TabLnk Icn FrPmp">Fire Pump</span>
								<span class="TabLnk Icn HydPneSys">Hydro Pnematic System</span>
								<span class="TabLnk Icn EnrgyMtr">Energy Meter</span>
								<span class="TabLnk Icn DG">Diesel Generator</span>
							</div> -->
							<div class="RprtFullDv">
								<?php 
									echo '<span class="CatTtlTxt">Water: (Water Meter)</span>';
									// $this->load->view('reportcommon/header');
									$this->load->view('graphreportcommon/watermeter');
									$this->load->view('reportcommon/watermeter');
									echo '<span class="CatTtlTxt">Water: (Water Level)</span>';
									$this->load->view('graphreportcommon/waterlevelgraph');
									echo '<span class="CatTtlTxt">Water: (Borewll)</span>';
									$this->load->view('graphreportcommon/borewellrungraph');
									$this->load->view('reportcommon/borewellrunnreport_dyn');
									echo '<span class="CatTtlTxt">Water: (Firepump)</span>';
									$this->load->view('graphreportcommon/firepumprungraph');
									$this->load->view('graphreportcommon/firepumprungraph_phase2');
									$this->load->view('graphreportcommon/firepumplinepressure');
									$this->load->view('reportcommon/firepumprunnreport_dyn');
									echo '<span class="CatTtlTxt">Water: (Hydro Pnematic System)</span>';
									$this->load->view('graphreportcommon/hydrorungraph');
									$this->load->view('graphreportcommon/hydrolinepressure');
									$this->load->view('reportcommon/hydroreport');
									echo '<span class="CatTtlTxt">Energy: (Energy Meter)</span>';
									$this->load->view('graphreportcommon/energyconsumptiongraph');
									$this->load->view('graphreportcommon/energypowerfactor');
									$this->load->view('graphreportcommon/energy_current');
								  $this->load->view('graphreportcommon/energy_voltage');
									$this->load->view('reportcommon/energyconsumptionreport');
									echo '<span class="CatTtlTxt">Energy: (DG)</span>';
									$this->load->view('graphreportcommon/dgrungraph');
									$this->load->view('graphreportcommon/dgfadd');
									$this->load->view('graphreportcommon/dgfremove');
									$this->load->view('reportcommon/dgreport');
									$this->load->view('reportcommon/dgfadded');
									$this->load->view('reportcommon/dgfremove');
									//echo '<span class="CatTtlTxt">Energy: (Power Factor)</span>';
									//$this->load->view('graphreportcommon/energypowerfactor');
									//$this->load->view('graphreportcommon/energy_current');
								  // $this->load->view('graphreportcommon/energy_voltage');
									//$this->load->view('reportcommon/footer');
								?>
							</div>
							<div class="RprtFtr">
								<span class="FtrTxt">© Wenalytics | All rights reserved.</span>
							</div>
						</div>
					<?php }?>
					<?php if($data['report_type']==4){ ?>
						<div class="RprtDtlsInnrHldr">
							<div class="RprtHdr">
								<div class="TtlHldr">
									<span class="TtlTxt">Detailed Report</span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Generated by</span>
									<span class="Txt Bld"><?php echo $this->session->userdata('employee_name')  ?></span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Generated on</span>
									<span class="Txt Bld"><?php echo date("Y-m-d h:m") ?></span>
								</div>
								<div class="RprtDtlsHldr">
									<span class="Txt">Report Period</span>
									<span class="Txt Bld"><?php echo $_POST['fromdate']." to ".$_POST['todate'] ?></span>
								</div>
							</div>
							<!-- <div class="RprtTabDv">
								<span class="TabLnk Icn WtrMtr Actv">Water Meter</span>
								<span class="TabLnk Icn WtrLvl">Water Level</span>
								<span class="TabLnk Icn FrPmp">Fire Pump</span>
								<span class="TabLnk Icn HydPneSys">Hydro Pnematic System</span>
								<span class="TabLnk Icn EnrgyMtr">Energy Meter</span>
								<span class="TabLnk Icn DG">Diesel Generator</span>
							</div> -->
							<div class="RprtFullDv">
							<?php echo '<span class="CatTtlTxt">Water</span>'; ?>
							<span class="SctnTtl">Water Meters</span>
							<div class="SmmryDtlsTblHldr">
								<table class="RprtTbl Dual">
									<tr>
										<th>Water In</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php  for($j=0;$j<count($flowdata);$j++){
										if($flowdata[$j]['summery']['meter']=='Borewell 1 (IN)' || $flowdata[$j]['summery']['meter']=='Borewell 2 (IN)'){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $flowdata[$j]['summery']['meter']; ?></td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['totalconsumption']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['avgperday']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['max']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['min']; ?> KL</td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['maxdate']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['mindate']; ?></td>
									</tr>
									<?php }}?>
									
								</table>
								<table class="RprtTbl Dual">
									<tr>
										<th>Water Consumption</th>
										<th>Total</th>
										<th>Avg. per Day</th>
										<th>Highest</th>
										<th>Lowest</th>
									</tr>
									<?php   for($j=0;$j<count($flowdata);$j++){
										if($flowdata[$j]['summery']['meter']!='Borewell 1 (IN)' && $flowdata[$j]['summery']['meter']!='Borewell 2 (IN)'){ ?>
									<tr>
										<td rowspan="2" class="Brdr Bld"><?php echo $flowdata[$j]['summery']['meter']; ?></td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['totalconsumption']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['avgperday']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['max']; ?> KL</td>
										<td class="Bld"><?php echo $flowdata[$j]['summery']['min']; ?> KL</td>
									</tr>
									<tr>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr">No. of Days: <?php echo $flowdata[$j]['summery']['totaldays']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['maxdate']; ?></td>
										<td class="Brdr"><?php echo $flowdata[$j]['summery']['mindate']; ?></td>
									</tr>
									<?php }}?>
									
								</table>
								
							</div>
								<?php 
									//echo '<span class="CatTtlTxt">Water: (Water Meter)</span>';
									// $this->load->view('reportcommon/header');
									
									$this->load->view('graphreportcommon/watermeter');
									$this->load->view('reportcommon/watermeter'); ?>
									
									<?php 
									//echo '<span class="CatTtlTxt">Water: (Borewll)</span>';
									$this->load->view('graphreportcommon/borewellrungraph');
									$this->load->view('reportcommon/borewellrunnreport_dyn');
									echo '<span class="CatTtlTxt">Water: (Water Level)</span>'; ?>
									
									<?php

									$this->load->view('graphreportcommon/waterlevelgraph'); ?>
									<span class="CatTtlTxt">Water: (Firepump)</span>
									<span class="SctnTtl"><?php echo $firepump_data[0]['meter']; ?></span>
									<div class="SmmryDtlsTblHldr">
										<table class="RprtTbl Dual">
											<tr>
												<th>Pumps</th>
												<th>Total</th>
												<th>Avg. per Day</th>
												<th>Highest</th>
												<th>Lowest</th>
											</tr>
											<?php  $k=0; for($j=0;$j<count($firepump_data[0]['summery']);$j++){ ?>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php echo $firepump_data[0]['summery'][$j]['meter']; ?></td>
												<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['totalrun']; ?></td>
												<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['avgperday']; ?></td>
												<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['max']; ?></td>
												<td class="Bld"><?php echo $firepump_data[0]['summery'][$j]['min']; ?></td>
											</tr>
											<tr>
												<td class="Brdr">No. of Days: <?php echo $firepump_data[0]['summery'][$j]['totaldays']; ?></td>
												<td class="Brdr">No. of Days: <?php echo $firepump_data[0]['summery'][$j]['totaldays']; ?></td>
												<td class="Brdr"><?php echo $firepump_data[0]['summery'][$j]['maxdate']; ?></td>
												<td class="Brdr"><?php echo $firepump_data[0]['summery'][$j]['mindate']; ?></td>
											</tr>
											<?php }?>
											
										</table>
										<table class="RprtTbl Sngl">
											<tr>
												<th>Diesel Engine Fuel Tank</th>
												<th>Fuel Added</th>
												<th>Fuel Consumed</th>
												<th>Economy</th>
												<th>Avg. Volume Maintained</th>
											</tr>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php //echo $firepump_data[0]['dg']['name']; ?></td>
												<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_added']; ?> Lts</td>
												<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_consumed']; ?> Lts</td>
												<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_economy']; ?> </td>
												<td class="Bld Brdr"><?php echo $firepump_data[0]['dg']['fuel_avg']; ?> Lts</td>
											</tr>									
										</table>
									</div>
									<?php 
									$this->load->view('graphreportcommon/firepumprungraph');
									
									$this->load->view('reportcommon/firepumprunnreport_dyn_p1'); ?>
									<span class="SctnTtl"><?php echo $firepump_data[1]['meter']; ?></span>
									<div class="SmmryDtlsTblHldr">
										<table class="RprtTbl Dual">
											<tr>
												<th><?php echo $firepump_data[1]['meter']; ?></th>
												<th>Total</th>
												<th>Avg. per Day</th>
												<th>Highest</th>
												<th>Lowest</th>
											</tr>
											<?php  $k=0; for($j=0;$j<count($firepump_data[1]['summery']);$j++){ ?>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php echo $firepump_data[1]['summery'][$j]['meter']; ?></td>
												<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['totalrun']; ?></td>
												<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['avgperday']; ?></td>
												<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['max']; ?></td>
												<td class="Bld"><?php echo $firepump_data[1]['summery'][$j]['min']; ?></td>
											</tr>
											<tr>
												<td class="Brdr">No. of Days: <?php echo $firepump_data[1]['summery'][$j]['totaldays']; ?></td>
												<td class="Brdr">No. of Days: <?php echo $firepump_data[1]['summery'][$j]['totaldays']; ?></td>
												<td class="Brdr"><?php echo $firepump_data[1]['summery'][$j]['maxdate']; ?></td>
												<td class="Brdr"><?php echo $firepump_data[1]['summery'][$j]['mindate']; ?></td>
											</tr>
											<?php }?>
											
										</table>
										<table class="RprtTbl Sngl">
											<tr>
												<th>Diesel Engine Fuel Tank</th>
												<th>Fuel Added</th>
												<th>Fuel Consumed</th>
												<th>Economy</th>
												<th>Avg. Volume Maintained</th>
											</tr>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php //echo $firepump_data[1]['dg']['name']; ?></td>
												<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_added']; ?> Lts</td>
												<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_consumed']; ?> Lts</td>
												<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_economy']; ?> </td>
												<td class="Bld Brdr"><?php echo $firepump_data[1]['dg']['fuel_avg']; ?> Lts</td>
											</tr>									
										</table>
									</div>
									<?php 
									$this->load->view('graphreportcommon/firepumprungraph_phase2');
									$this->load->view('graphreportcommon/firepumplinepressure');
									$this->load->view('reportcommon/firepumprunnreport_dyn_p2'); ?>
									<!-- <span class="SctnTtl">Hydro Pnematic System </span> -->
									<span class="CatTtlTxt">Water: (Hydro Pnematic System)</span>
									<div class="SmmryDtlsTblHldr">
										<table class="RprtTbl Dual">
											<tr>
												<th>Hydro Pnematic System</th>
												<th>Total</th>
												<th>Avg. per Day</th>
												<th>Highest</th>
												<th>Lowest</th>
											</tr>
											<?php  $k=0; for($j=0;$j<count($hydro_data[0]['summery']);$j++){ ?>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php echo $hydro_data[0]['summery'][$j]['meter']; ?></td>
												<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['totalrun']; ?></td>
												<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['avgperday']; ?></td>
												<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['max']; ?></td>
												<td class="Bld"><?php echo $hydro_data[0]['summery'][$j]['min']; ?></td>
											</tr>
											<tr>
												<td class="Brdr">No. of Days: <?php echo $hydro_data[0]['summery'][$j]['totaldays']; ?></td>
												<td class="Brdr">No. of Days: <?php echo $hydro_data[0]['summery'][$j]['totaldays']; ?></td>
												<td class="Brdr"><?php echo $hydro_data[0]['summery'][$j]['maxdate']; ?></td>
												<td class="Brdr"><?php echo $hydro_data[0]['summery'][$j]['mindate']; ?></td>
											</tr>
											<?php }?>
											
										</table>
									</div>
									<?php
									//echo '<span class="CatTtlTxt">Water: (Hydro Pnematic System)</span>';
									$this->load->view('graphreportcommon/hydrorungraph');
									$this->load->view('graphreportcommon/hydrolinepressure');
									$this->load->view('reportcommon/hydroreport'); ?>
									<!-- <span class="CatTtlTxt">Energy</span> -->
									<span class="CatTtlTxt">Energy: (Energy Meters)</span>
									<span class="SctnTtl">Energy Meters</span>
									<div class="SmmryDtlsTblHldr">
										<table class="RprtTbl Dual">
											<tr>
												<th>Meter</th>
												<th>Total Reading</th>
												<th>Avg. per Day</th>
												<th>Highest</th>
												<th>Lowest</th>
											</tr>
											<?php  for($k=0;$k<count($energydata['summery']);$k++){ ?>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php echo $energydata['summery'][$k]['meter']; ?> </td>
												<td class="Bld"><?php echo $energydata['summery'][$k]['totalconsumption']; ?> Kwh</td>
												<td class="Bld"><?php echo $energydata['summery'][$k]['avgperday']; ?> Kwh</td>
												<td class="Bld"><?php echo $energydata['summery'][$k]['max']; ?> Kwh</td>
												<td class="Bld"><?php echo $energydata['summery'][$k]['min']; ?> Kwh</td>
											</tr>
											<tr>
												<td class="Brdr">No. of Days: <?php echo $energydata['summery'][$k]['totaldays']; ?></td>
												<td class="Brdr">No. of Days: <?php echo $energydata['summery'][$k]['totaldays']; ?></td>
												<td class="Brdr"><?php echo $energydata['summery'][$k]['maxdate']; ?> </td>
												<td class="Brdr"><?php echo $energydata['summery'][$k]['mindate']; ?> </td>
											</tr>
											<?php  } ?>
											
										</table>
									</div>
									<?php
									//echo '<span class="CatTtlTxt">Energy: (Energy Meter)</span>';
									$this->load->view('graphreportcommon/energyconsumptiongraph');
									$this->load->view('graphreportcommon/energypowerfactor');
									$this->load->view('graphreportcommon/energy_current');
								  $this->load->view('graphreportcommon/energy_voltage');
									$this->load->view('reportcommon/energyconsumptionreport'); ?>
									<!-- <span class="SctnTtl">DG</span> -->
									<span class="CatTtlTxt">Energy: (DG)</span>
									<div class="SmmryDtlsTblHldr">
										<table class="RprtTbl Dual">
											<tr>
												<th>Meter</th>
												<th>Total Running</th>
												<th>Avg. per Day</th>
												<th>Highest</th>
												<th>Lowest</th>
											</tr>
											<?php  //for($k=0;$k<count($energydata['summery']);$k++){ ?>
											<tr>
												<td rowspan="2" class="Brdr Bld">Diesel Generator </td>
												<td class="Bld"><?php echo $dgdata[0]['summery']['totalrun']; ?> </td>
												<td class="Bld"><?php echo $dgdata[0]['summery']['avgperday']; ?> </td>
												<td class="Bld"><?php echo $dgdata[0]['summery']['max']; ?> </td>
												<td class="Bld"><?php echo $dgdata[0]['summery']['min']; ?> </td>
											</tr>
											<tr>
												<td class="Brdr">No. of Days: <?php echo $dgdata[0]['summery']['totaldays']; ?></td>
												<td class="Brdr">No. of Days: <?php echo $dgdata[0]['summery']['totaldays']; ?></td>
												<td class="Brdr"><?php echo $dgdata[0]['summery']['maxdate']; ?> </td>
												<td class="Brdr"><?php echo $dgdata[0]['summery']['mindate']; ?> </td>
											</tr>
											<?php  //} ?>
											
										</table>
										<table class="RprtTbl Sngl">
											<tr>
												<th>Diesel Generator Fuel Tank</th>
												<th>Fuel Added</th>
												<th>Fuel Consumed</th>
												<th>Economy</th>
												<th>Avg. Volume Maintained</th>
											</tr>
											<tr>
												<td rowspan="2" class="Brdr Bld"><?php //echo $dgdata[0]['dg']['name']; ?></td>
												<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_added']; ?> Lts</td>
												<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_consumed']; ?> Lts</td>
												<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_economy']; ?> </td>
												<td class="Bld Brdr"><?php echo $dgdata[0]['dg']['fuel_avg']; ?> Lts</td>
											</tr>									
										</table>
									</div>
									<?php
									//echo '<span class="CatTtlTxt">Energy: (DG)</span>';
									$this->load->view('graphreportcommon/dgrungraph');
									$this->load->view('graphreportcommon/dgfadd');
									$this->load->view('graphreportcommon/dgfremove');
									$this->load->view('reportcommon/dgreport');
									$this->load->view('reportcommon/dgfadded');
									$this->load->view('reportcommon/dgfremove');
									//echo '<span class="CatTtlTxt">Energy: (Power Factor)</span>';
									//$this->load->view('graphreportcommon/energypowerfactor');
									//$this->load->view('graphreportcommon/energy_current');
								//$this->load->view('graphreportcommon/energy_voltage');
									//$this->load->view('reportcommon/footer');
								?>
							</div>
							<div class="RprtFtr">
								<span class="FtrTxt">© Wenalytics | All rights reserved.</span>
							</div>
						</div>
					<?php }?>
					<div class="RprtDtlsInnrHldr">
					<div class="RprtFullDv FllHght">
					<?php 	
						//echo print_r($data['device']);die();
						//water tabular
						
						if($data['device']==19 && $data['report_type']==0){
							$this->load->view('reportcommon/waterlevelreport');
						}
						if($data['device']==27 && $data['report_type']==0){
							$this->load->view('reportcommon/borewellrunnreport_dyn');
						}
						if($data['device']==20 && $data['report_type']==0){
							$this->load->view('reportcommon/firepumprunnreport_dyn');
							
						}
						if($data['device']==39 && $data['report_type']==0){
							$this->load->view('reportcommon/firepumprunnreport');
							$this->load->view('reportcommon/statusview1');
							$this->load->view('reportcommon/dgreport');
							$this->load->view('reportcommon/dgfadded');
						}
						if($data['device']==26 && $data['report_type']==0){
							$this->load->view('reportcommon/hydrorunnreport_dyn');
							//$this->load->view('reportcommon/hpsrunnreport');
							//$this->load->view('reportcommon/hpsstatusview');
						}
						if($data['device']==25 && $data['report_type']==0){
							
							$this->load->view('reportcommon/watermeter');
						}
						
						//end water
						//Energy tabular
						if($data['device']==28 && $data['report_type']==0){
							$this->load->view('reportcommon/dgreport_all');
							// $this->load->view('reportcommon/dgfadded');
							// $this->load->view('reportcommon/dgfremove');							
						}
						if($data['device']==41 && $data['report_type']==0){
							$this->load->view('reportcommon/energyconsumptionreport');						
							
						}
						if($data['device']==34 && $data['report_type']==0){							
							$this->load->view('reportcommon/flowconsumptionreport',$data);
							
						}
					?>
					
					
					<?php
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
							$this->load->view('graphreportcommon/dgfremove');
						}
						if($data['device']==30 && $data['report_type']==1){
							$this->load->view('graphreportcommon/dgtrip');
						}
						if($data['device']==27 && $data['report_type']==1){
							$this->load->view('graphreportcommon/borewellrungraph');
						}
						if($data['device']==20 && $data['report_type']==1){
							$this->load->view('graphreportcommon/firepumprungraph');
							$this->load->view('graphreportcommon/firepumplinepressure_f1');
							$this->load->view('graphreportcommon/firepumprungraph_phase2');
						$this->load->view('graphreportcommon/firepumplinepressure');
						//$this->load->view('graphreportcommon/dgrungraph');
						//$this->load->view('graphreportcommon/dgfadd');
						}
						if($data['device']==39 && $data['report_type']==1){
							$this->load->view('graphreportcommon/firepumprungraph1');
						$this->load->view('graphreportcommon/firepumplinepressure_f1');
						$this->load->view('graphreportcommon/dgrungraph');
						$this->load->view('graphreportcommon/dgfadd');
						}
						if($data['device']==26 && $data['report_type']==1){
							$this->load->view('graphreportcommon/hydrorungraph');
							$this->load->view('graphreportcommon/hydrolinepressure');
							//$this->load->view('graphreportcommon/hpsrun');
						//$this->load->view('graphreportcommon/firepumplinepressure');								
						}
						if($data['device']==25 && $data['report_type']==1){
						$this->load->view('graphreportcommon/watermeter');								
						}
						//end water
						//start energy
						if($data['device']==41 && $data['report_type']==1){							
							$this->load->view('graphreportcommon/energyconsumptiongraph');
							
							}
							if($data['device']==57 && $data['report_type']==1){							
								
								$this->load->view('graphreportcommon/energy_current');
								
								}
								if($data['device']==58 && $data['report_type']==1){							
									
									$this->load->view('graphreportcommon/energy_voltage');
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
		var filename = $("#r_name").text();    

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

	var type;

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




<?php if($radio==1){
	?>
	type = <?php echo $radio; ?>;
	
		$("input[name=report_type][value='1']").prop("checked",true);
		<?php if($m1==''){ ?>
			//getreports();
		<?php } ?>
		
		$('.graph-data').show();
		$('.tablular-data').hide();
		

	<?php

}else if($radio==2){ ?>
	type='2';
	$("input[name=report_type][value='2']").prop("checked",true);
	<?php if($m1==''){ ?>
			//getreports();
		<?php } ?>
	$('.tablular-data').show();
	$('.graph-data').hide();
	//$("#cat").val('');
<?php }else if($radio==3){ ?>
	type='3';
	$("input[name=report_type][value='3']").prop("checked",true);
	<?php if($m1==''){ ?>
			//getreports();
		<?php } ?>
	$('.tablular-data').show();
	$('.graph-data').hide();
	//$("#cat").val('');
<?php }else if($radio==4){ ?>
	type='4';
	$("input[name=report_type][value='4']").prop("checked",true);
	<?php if($m1==''){ ?>
			//getreports();
		<?php } ?>
	$('.tablular-data').show();
	$('.graph-data').hide();
	//$("#cat").val('');
<?php }else{ ?>
	type='0';
	$("input[name=report_type][value='0']").prop("checked",true);
	<?php if($m1==''){ ?>
			//getreports();
		<?php } ?>
	$('.tablular-data').show();
	$('.graph-data').hide();
	<?php }?>
	

	if (type==0) {	 
			
			$('#tabular').show();
			$('#graphical').hide();
			$('.graph-data').hide();
			$('.tablular-data').show();
			$('#fr').show();
			$('#to').show();
			$('#categorydiv').show();
			$('#solutiondiv').show();
			$('#consolidate').hide();
			$('#summery').hide();
			$('#detailed').hide();
			$("#tblexport").show();

			var d = new Date($.now());
			
			newPageTitle = 'Tabular Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
		}else if(type==1){
			
			$('#tabular').hide();
			$('#graphical').show();
			$('.graph-data').show();
			$('.tablular-data').hide();
			$('#fr').show();
			$('#to').show();
			$('#categorydiv').show();
			$('#solutiondiv').show();
			$('#consolidate').hide();
			$('#summery').hide();
			$('#detailed').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Graphical Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
	
		}else if(type==2){
			$('#tabular').hide();
			$('#graphical').hide();
			$('.graph-data').show();
		    $('.tablular-data').show();
			$('#fr').hide();
			$('#to').hide();
			$('#categorydiv').hide();
			$('#solutiondiv').hide();
			$('#consolidate').show();
			$('#summery').hide();
			$('#detailed').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Consolidated Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
			
		}else if(type==3){
			//$('#tabular').hide();
			//$('#graphical').hide();
			//$('.graph-data').show();
		    //$('.tablular-data').show();
			$('#fr').hide();
			$('#to').hide();
			$('#categorydiv').hide();
			$('#solutiondiv').hide();
			$('#consolidate').hide();
			$('#summery').show();
			$('#detailed').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Summary Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
			
			
		}else if(type==4){
			//$('#tabular').hide();
			//$('#graphical').hide();
			//$('.graph-data').show();
		    //$('.tablular-data').show();
			$('#fr').hide();
			$('#to').hide();
			$('#categorydiv').hide();
			$('#solutiondiv').hide();
			$('#consolidate').hide();
			$('#summery').hide();
			$("#tblexport").hide();
			$('#detailed').show();
			var d = new Date($.now());
			newPageTitle = 'Detailed Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
			
			
		}
	function getCatagory(type){
		type=type;
		$("#cat").val('');
		getsolutions();
		
		if (type==0) {	 
			
			$('#tabular').show();
			$('#graphical').hide();
			$('#content').hide();
			$('.graph-data').hide();
			$('.tablular-data').show();
			$('#fr').show();
			$('#to').show();
			$('#categorydiv').show();
			$('#solutiondiv').show();
			$('#consolidate').hide();
			$('#summery').hide();
			$('#detailed').hide();
			$('#loader').hide();
			$("#tblexport").show();
			var d = new Date($.now());
			
			newPageTitle = 'Tabular Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
		}else if(type==1){
			
			$('#tabular').hide();
			$('#graphical').show();
			$('.graph-data').show();
			$('.tablular-data').hide();
			$('#fr').show();
			$('#to').show();
			$('#categorydiv').show();
			$('#solutiondiv').show();
			$('#consolidate').hide();
			$('#summery').hide();
			$('#detailed').hide();
			$('#loader').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Graphical Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
	
		}else if(type==2){
			$('#tabular').hide();
			$('#graphical').hide();
			$('.graph-data').show();
		    $('.tablular-data').show();
			$('#fr').hide();
			$('#to').hide();
			$('#categorydiv').hide();
			$('#solutiondiv').hide();
			$('#consolidate').show();
			$('#summery').hide();
			$('#detailed').hide();
			$('#loader').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Consolidated Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
			
			
		}else if(type==3){
			//$('#tabular').hide();
			//$('#graphical').hide();
			//$('.graph-data').show();
		    //$('.tablular-data').show();
			$('#fr').hide();
			$('#to').hide();
			$('#categorydiv').hide();
			$('#solutiondiv').hide();
			$('#consolidate').hide();
			$('#summery').show();
			$('#detailed').hide();
			$('#loader').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Summary Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
			
		}
		else if(type==4){
			//$('#tabular').hide();
			//$('#graphical').hide();
			//$('.graph-data').show();
		    //$('.tablular-data').show();
			$('#fr').hide();
			$('#to').hide();
			$('#categorydiv').hide();
			$('#solutiondiv').hide();
			$('#consolidate').hide();
			$('#summery').hide();
			$('#detailed').show();
			$('#loader').hide();
			$("#tblexport").hide();
			var d = new Date($.now());
			newPageTitle = 'Detailed Report - '+d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            document.title = newPageTitle;
			
		}
	}


	
	
function formValidation()
{
	

if(type==2){
	var consoleidate = $("#consolidaterpt").val();
	var fromdate = $("#fromdate").val();
	var todate = $("#todate").val();
	if(fromdate==''){
	$('#error').html("Please Select From Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(todate==''){
	$('#error').html("Please Select To Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
}else if(type==3){
	var summeryrpt = $("#summeryrpt").val();
	var fromdate = $("#fromdate").val();
	var todate = $("#todate").val();
	if(fromdate==''){
	$('#error').html("Please Select From Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(todate==''){
	$('#error').html("Please Select To Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
}else if(type==4){
	//var summeryrpt = $("#summeryrpt").val();
	var fromdate = $("#fromdate").val();
	var todate = $("#todate").val();
	if(fromdate==''){
	$('#error').html("Please Select From Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(todate==''){
	$('#error').html("Please Select To Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
}else{
	var category = $("#category").val();
var solution = $("#solution").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
var fromtime = $("#fromtime").val();
var totime = $("#totime").val();
// alert(multiMeter);return false;
if(category==''){
	$('#error').html("Please Select Category");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(solution==''){
	$('#error').html("Please Select Solution");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(fromdate==''){
	$('#error').html("Please Select From Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(todate==''){
	$('#error').html("Please Select To Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
else if(fromtime!='Select FromTime' && totime=='Select ToTime'){
	$('#error').html("Please Select To Time");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
else if(fromtime=='Select FromTime' && totime!='Select ToTime'){
	$('#error').html("Please Select From Time");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
else if(fromtime>totime){
	$('#error').html("Please Select Proper Time");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}
}



$('#loader').show();
// var ele = $("#loader");
// setTimeout(function() { ele.hide(); }, 20000);

return true;
}


function getsolutions(){
    $("#solution").html("");
    var category = $("#category").val();
	type = $('input[name="report_type"]:checked').val();
    
       
  
    $.ajax({
        type: 'GET',
        data: {
            category:category,type:type
        },
        url: BASE_URL+'Admin/Home/ajax_hardware_device_dropdown_chennai/',
        success: function (data){
			
            $("#solution").html(data);
            $("#solution").trigger("chosen:updated");
        }
    });
}

function getdevices(){
	
	
	
    $("#device").html("");
    var category = $("#category").val();
    var solution = $("#solution").val();
	if(solution==20){
	
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
	type=$('input[name="report_type"]:checked').val();
	
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

$('.hide_button').click(function(){
	$('.search_box').toggle();
	$('.show_button').toggle();
	$('.FullReportDtlsHldr').toggleClass("FllHght");

});
$('#export').click(function(){
	$("#myForm").submit(); 
	location.reload(true);
});

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});


</script>
</html>