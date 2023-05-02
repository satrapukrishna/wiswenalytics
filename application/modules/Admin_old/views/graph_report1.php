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
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong><?php echo ucfirst($device['device_name'])?> Graph Report</strong>
                  </h3><br/>
                </section>
				<section class="content" >
					<span id="error" style="color:red"></span>
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/graph_reports_search/".$device_id)?>" method="post" onSubmit="return formValidation();">
						
						<div class="row meter-top col-md-12">
                            <?php 
							if($device_id!=3){
							?>
							<select class="form-control" placeholder="Select Meter" name="multiMeter"  id="multiMeter">
							  <option value="">Select Meter</option>
							  <?php 
							  foreach ($devices as $value) {
							  ?>
								<option value="<?php echo $value; ?>" <?php echo ($value==set_value('multiMeter')?'selected':'')?>> 
								  <?php echo $value; ?> 
								</option>
							  <?php } ?>
							</select> 
							
							
							<?php } ?>
							<input class="form-control" type="date" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
							<input class="form-control" value="<?php echo set_value('todate') ?>" type="date" name="todate" id="todate" placeholder="To Date">
							<button type="submit" id="filter" class="btn btn-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/reports/'.$device_id.'/Running_hours') ?>" class="btn btn-info">Reset</a>
							
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
							<?php if($device!=3){?>
							<div class="box-body">
								<div  id="container_runn">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
								</div>												  
							</div>
							<?php }else{ ?>
							<div class="box-body">
							  <div  id="container_runn1">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
							  </div>
							  <div  id="container_runn2">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
							  </div>
								<div  id="container_runn3">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
							  </div>
							  <div  id="container_runn4">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
							  </div>
							  <div  id="container_pipepressure">
								<!-- <canvas id="creditSat" style="height:250px"></canvas> -->
							  </div>                      
							</div>
							<?php } ?>
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

function menushow(id){
	$("#subcat"+id).toggle('slow');
}
function reports2(id){
	$("#subreports"+id).toggle('slow');
	return false;
}

$('#reports').click(function(){
	$('#reportsmenu').toggle('slow');
	return false;
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
}else if(fromdate == ""){
      $('#error').html("Please select From date");
      return false;
    }else if(todate == ""){
      $('#error').html("Please select To date");
      return false;
    }else{
      var d1 = new Date(fromdate);
      var d2 = new Date(todate);
      var same = d1.getTime() > d2.getTime();
      if(same){
        $('#error').html("Please select dates properly");
        return false;
      }
    }



$('#loader').show();
// var ele = $("#loader");
// setTimeout(function() { ele.hide(); }, 9000);

return true;
}

<?php 
if($device_id!=3){
if (!empty($running_data)) { ?>
var meter=$("#multiMeter").val();
var dps1=[];
var c=<?php echo json_encode($dps1)?>;
for(var i = 0; i < c.length; i++) {
    r=parseFloat(c[i]);
    dps1.push(r);	
}

var dps2=[];
var t=parseFloat(c[c.length-1]);

dps2=<?php echo json_encode($dps2)?>;

Highcharts.chart('container_runn', {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {     
        type: 'column'
    },
      
    title: {
        text: 'RunningHours'
    },
    subtitle: {
        text: meter
    },
    
    xAxis: {
        title: {      
          text: 'Time and Date'      
        },
        categories: dps2
    },
    yAxis: {
        title: {      
          text: 'Minutes'      
        }
    },   
    series: [{
      name: 'Minutes',
        data: dps1
        
    }]
}); 
<?php } } ?>

	<?php /*
	
	for($i = 0; $i < $running_data; $i++) {
		?>
		
		var dps1 = [];
		var dps2 = [];
		var runn = [];
		var econ = [];

		var r;
		var t=1;
			<?php 
			for ($j = 0; $j < count($running_data[$i]); $j++) {
			?>
			
			var running=<?php echo json_encode($running_data[$i][$j]['RunningHours'])?>;
			var dtime=<?php echo json_encode($running_data[$i][$j]['date'])?>;
			
				r=parseInt(running);
				dps1.push(r);
				runn.push(timeConvert(running));
				dps2.push(dtime);
				
			<?php } ?>
			var meter= <?php echo $running_data[$i][0]['meter']?>;
		
			var cnt='container_runn'+<?php echo $i+1?>;
		  
		Highchart	`us.chart(cnt, {
			exporting: {
				chartOptions: { // specific options for the exported image
					plotOptions: {
						series: {
							dataLabels: {
								enabled: true
							}
						}
					}
				},
				fallbackToExportServer: false
			},

			chart: {
			  
				type: 'column'
			},
			  
			title: {
				text: 'RunningHours'
			},
			subtitle: {
				text: meter
			},
			
			 xAxis: {
				 
			  title: {      
			  text: 'Time and Date'      
			},
			  categories: dps2
			},
			 yAxis: {
			  title: {      
			  text: 'Minutes'      
			}
			},   
			 series: [{
			  name: 'Minutes',
				data: dps1
				
			}]
		});

		
	
		*/?>

function timeConvert(n) {
var num = n;
var hours = (num / 60);
var rhours = Math.floor(hours);
var minutes = (hours - rhours) * 60;
var rminutes = Math.round(minutes);
return rhours + " hour(s) and " + rminutes + " minute(s).";
}
	
 </script>	
</html>