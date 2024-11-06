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
		
		<?php $this->load->view('common/left_menu2') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong><?php echo ucfirst($device['device_name'])?> Running Hours Report</strong>
                  </h3><br/>
                </section>
				<section class="content" >
					<span id="error" style="color:red"></span>
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/reports_search/".$device_id)?>" method="post" onSubmit="return formValidation();">
						
						<div class="row meter-top col-md-12">
                            <?php 
							if($device_id!=3){
							?>
							<select class="form-control" placeholder="Select Meter" name="multiMeter"  id="multiMeter">
							  <option value="">Select Meter</option>
							  <?php 
							  foreach ($hardware as $value) {
							  ?>
								<option value="<?php echo $value; ?>" <?php echo ($value==set_value('multiMeter')?'selected':'')?>> 
								  <?php echo $value; ?> 
								</option>
							  <?php } ?>
							</select> 
							<select class="form-control" name="fromtime" id="fromtime">
							  <option value="Select Hours From">Select Hours From</option>
							  <?php 
								$j = 24;$list = "";$options = array();
								for($i=0;$i<=$j ;$i++){
								if($i<10)
								$options[$i] =  "0".$i.":00:00";
								else
								$options[$i] =  $i.":00:00";
								}
								foreach ($options as $value) {
								//$list .= "<option value=".$value.">".$value."</option>";
								  if($value == "00:00:00"){
										$list .= "<option value=".$value." >".$value."</option>";
									  }else{
										$list .= "<option value=".$value.">".$value."</option>";
									  }
								}
								echo $list;
							  ?>
							</select>

							<select class="form-control" name="totime"  id="totime">
							  <option value="Select Hours To">Select Hours To</option>
							  <?php 
								$j = 24;$list = "";$options = array();
								for($i=0;$i<=$j ;$i++){
								if($i<10)
								$options[$i] =  "0".$i.":00:00";
								else
								$options[$i] =  $i.":00:00";
								}
								foreach ($options as $value) {
								  if($value == "24:00:00"){
										$list .= "<option value=".$value." >".$value."</option>";
									  }else{
										$list .= "<option value=".$value.">".$value."</option>";
									  }
								}
								echo $list;
							  ?>
							</select>
							<?php } ?>
							<input class="form-control" type="date" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
							<input class="form-control" value="<?php echo set_value('todate') ?>" type="date" name="todate" id="todate" placeholder="To Date">
							<button type="submit" id="filter" class="btn btn-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/reports/'.$device_id.'/Running_hours') ?>" class="btn btn-info">Reset</a>
							<?php if (!empty($running_data)) {?>
							<button type="submit" class="btn btn-info"  name="export" id="export">Export</button>
							<?php } ?>
						  </div>
					</form>
					<div class="row meter-top col-md-12">
					<div class="loader" id="loader" style="display: none;"></div>
					</div>
					<br/><br/><br/>
					<hr/>
					<?php 
					if($device_id!=3){
					if (!empty($running_data)) {
						?>
					<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr>
								<th class="text-center">Sno.</th>
								<th class="text-center">Meter</th>
								<th class="text-center">Date/Hours	</th>
								<th class="text-center">Running Hours</th>
								
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
								<td class="text-center">
								
								<?php 
								$t = $row['runninghrs'];
								$h = floor($t/60) ? floor($t/60) .' Hours' : '0 Hours';
								$m = $t%60 ? $t%60 .' Min' : '0 Min';
								echo $h && $m ? $h.' '.$m : $h.$m;
								
								?></td>
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