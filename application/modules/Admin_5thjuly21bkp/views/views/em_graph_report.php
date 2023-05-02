<html>
<head>
    <?php $this->load->view('common/css3') ?>
<style>	
img {
vertical-align: middle;
margin-right:10px;}
.form-control{float:left}
table td,table th{border-right:1px solid #ccc}
table th,table th{text-align:center}

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
/*highcharts*/
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

	</style>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong>Energy Meter Consumption Graph Report</strong>
                  </h3><br/>
                </section>
				<section class="content" >
					<span id="error" style="color:red"></span>
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/reports_search/")?>" method="post" onSubmit="return formValidation();">
						
						<div class="row meter-top col-md-12">
                           
							<select class="form-control" placeholder="Select Meter" name="multiMeter"  id="multiMeter">
							  <option value="">Select Floor</option>
							 
								<option value="floor1"> 
								  Floor-1
								</option>
								<option value="floor2"> 
								  Floor-2
								</option>
							 
							</select> 
							<select class="form-control" placeholder="Select Meter" name="multiMeter"  id="multiMeter">
							  <option value="">Select Energy Meter</option>
							 
								<option value="em01"> 
								  EM-01
								</option>
								<option value="em02"> 
								  EM-02
								</option>
							 
							</select> 
							<input class="form-control" type="date" value="<?php echo date('m/d/Y') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
							<input class="form-control" value="<?php echo set_value('todate') ?>" type="date" name="todate" id="todate" placeholder="To Date">
							<button type="submit" id="filter" class="btn btn-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/energy_reports') ?>" class="btn btn-info">Reset</a>
							
						  </div>
					</form>
					<div class="row meter-top col-md-12">
					<div class="loader" id="loader" style="display: none;"></div>
					</div>
					<br/><br/><br/>
					<hr/>
					
					<div id="container"></div>
					
				</section>
			</div>
		</div>
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Consumption Report'
    },
    xAxis: {
        categories: [
            '01-10-2020',
            '02-10-2020',
            '03-10-2020',
            '04-10-2020',
            '05-10-2020',
            '06-10-2020',
            '07-10-2020'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kwh'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Kwh</b></td></tr>',
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
        name: 'EM-01',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6]

    }]
});


function formValidation()
{
var multiMeter = $("#multiMeter").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
// alert(multiMeter);return false;
if(multiMeter==''){
	$('#error').html("plaese select Meter");
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