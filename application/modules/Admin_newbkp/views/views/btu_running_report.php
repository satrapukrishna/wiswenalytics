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
	</style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong>BTU Running Hours Report</strong>
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
					
					<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr>
								<th class="text-center">Sno.</th>
								<th class="text-center">Floor</th>
								<th class="text-center">Meter</th>
								
								<th class="text-center">Date/Hours	</th>
								<th class="text-center">Energy Consumption
</th>
								
							</tr>
						</thead>
						<tbody>
							
								<tr>
								<td class="text-center">1</td>
								
								<td class="text-center">Floor-1</td>
								<td class="text-center">BTU01</td>
								<td class="text-center"><?php echo date('d-m-Y') ?></td>
								<td class="text-center">0.0 kWh
								
								</td>
								</tr>
								<tr>
								<td class="text-center">2</td>
								
								<td class="text-center">Floor-1</td>
								<td class="text-center">BTU02</td>
								<td class="text-center"><?php echo date('d-m-Y') ?></td>
								<td class="text-center">0.0 kWh
								
								</td>
								</tr><tr>
								<td class="text-center">3</td>
								
								<td class="text-center">Floor-2</td>
								<td class="text-center">BTU03</td>
								<td class="text-center"><?php echo date('d-m-Y') ?></td>
								<td class="text-center">5.0 kWh
								
								</td>
								</tr>
								
								
							
						</tbody>
					</table>
					
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