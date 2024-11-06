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
		
       <input type="hidden" id="page" value="running" />
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong>Firepump Tabular Reports</strong>
                  </h3><br/>
                </section>
				<section class="content" >
					<span id="error" style="color:red"></span>
					<input type="hidden" id="page" value="running" />
					<form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/firepump_reports_search/Pumps")?>" method="post" onSubmit="return formValidation();">
						
							<div class="row meter-top col-md-12">
							
                           <?php
                          $options = array('0' => 'Select Report', '1' => 'Running Hours', '2' => 'Status View Hours', '3' => 'DG Running hours Report','4' => 'DG Fuel Added Report','5' => 'Consolidated Report');
                            echo form_dropdown('multiMeter1', $options, set_value('multiMeter1'), 'class="form-control chosen-select" id="multiMeter1"'); ?>
                           <?php echo form_dropdown('multiMeter', $devices, set_value('multiMeter'), 'class="form-control chosen-select" id="multiMeter"'); ?>
						   
							
							<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
							

							<input class="form-control" value="<?php echo set_value('todate') ?>" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="todate" id="todate" placeholder="To Date">
							<button type="submit" id="filter" class="btn btn-success">Filter</button>
							<a href="<?php echo site_url('Admin/Home/firepump_reports/Tabular') ?>" class="btn btn-info">Reset</a>
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
					//echo $status_view;
					if($runn==1){
						if (!empty($running_data)) {
							$this->load->view('reportcommon/runnreport');
						
					}
					}
						
					if($status_view==2){ 
					$this->load->view('reportcommon/statusview');  }

					if($dg==3){
						$this->load->view('reportcommon/dgreport');
						}
						if($fadded==4){
						$this->load->view('reportcommon/fadded');
						}
						if($consol==5){
						$this->load->view('reportcommon/runnreport');
						$this->load->view('reportcommon/statusview');
						$this->load->view('reportcommon/dgreport');
						$this->load->view('reportcommon/fadded');
						$this->load->view('reportcommon/alertstatus');

						}?>
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