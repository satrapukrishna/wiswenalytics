<html>
<head>
    <?php $this->load->view('common/css3') ?>
	<!-- highchart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>

        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <!-- end highchart -->
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
	</style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu2') ?>
		<?php $this->load->view('common/header2') ?>
		
       <input type="hidden" id="page" value="running" />
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong><?php echo ucfirst($device['device_name'])?> Pressure Graph Report</strong>
                  </h3><br/>
                </section>
				<section class="content" >
					<span id="error" style="color:red"></span>
					
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/firepump_pressure_graph_search/Pressure Sensor")?>" method="post" onSubmit="return formValidation();">
						
							<div class="row meter-top col-md-12">
                           <?php echo form_dropdown('multiMeter', $devices, set_value('multiMeter'), 'class="form-control chosen-select" id="multiMeter"'); ?>
						   
							
							<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="Date">
							

							
							<button type="submit" id="filter" class="btn btn-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/firepump_reports/PressureGraph') ?>" class="btn btn-info">Reset</a>
							
						  </div>
					</form>
					<div class="row meter-top col-md-12">
					<div class="loader" id="loader" style="display: none;"></div>
					</div>
					<br/><br/><br/>
					<hr/>
					
					<div class="col-md-12" id="graph_runn1">
						<div class="box box-primary">
							<div class="box-header with-border">
							<!-- <h3 class="box-title">Fuel</h3> -->
							</div>
							
							
							<div class="box-body">
							<?php for ($i=0; $i < count($pressure_data); $i++) { 
							 ?>
							  <div id="<?php echo "container_pressure_".$i ?>">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
							  </div>
							  <?php }?>
							                       
							</div>
							
						</div>				  
					</div>
                
            
				</section>
			</div>
		</div>
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>

<script>


function formValidation()
{
var multiMeter = $("#multiMeter").val();
var fromdate = $("#fromdate").val();
// alert(multiMeter);return false;
if(multiMeter==''){
	$('#error').html("plaese select Meter");
	return false;	
}else if(fromdate == ""){
      $('#error').html("Please select From date");
      return false;
    }



$('#loader').show();
// var ele = $("#loader");
// setTimeout(function() { ele.hide(); }, 9000);

return true;
}

<?php 

if (!empty($pressure_data)) { ?>
  var jsondata=<?php echo json_encode($pressure_data)?>;
  for(var i = 0; i < jsondata.length; i++) {
    var xdata = new Array();
     var ydata = new Array();
    for (var j = 0; j < jsondata[i]['pdata'].length; j++) {
      xdata[j] = jsondata[i]['pdata'][j]['TxnTime'];
     ydata[j] = parseFloat(jsondata[i]['pdata'][j]['CurReading']);
    }
    var cnt="container_pressure_"+i;
    var meter=jsondata[i]['meter'];
    Highcharts.chart(cnt, {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Line Pressure Graph'
    },
   
    xAxis: {
        categories: xdata
    },
    yAxis: {
        title: {
            text: 'Psi'
        },
        tickInterval: 2,
                      min:0,
                      max:16   
    },
    subtitle: {
        text: meter
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },
   
    series: [{
        name: 'Line Pressure',
        data: ydata,
        dashStyle: 'DashDot'
    }]
});
  }
	
    
     

  
 
<?php }  ?>

	

function timeConvert(n) {
var num = n;
var hours = (num / 60);
var rhours = Math.floor(hours);
var minutes = (hours - rhours) * 60;
var rminutes = Math.round(minutes);
return rhours + " hour(s) and " + rminutes + " minute(s).";
}
$('#firepump').click(function(){
  $('#subfirepump').toggle('slow');
  return false;
});
	
 </script>	
</html>