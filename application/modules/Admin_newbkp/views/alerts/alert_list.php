
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	<style>
	.status-on{
	display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
.status-off{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
img {
vertical-align: middle;
margin-right:10px;}
div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.Lnk{
	padding: 21px 40px 18px 20px!important;
}
.col{
    cursor: pointer;
	z-index:1000000;
	margin: 23px 10px 0 0!important;
	
	}
.style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

.style-2::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

.style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #367fa8;
}	
.form-control{float:left;margin-right: 10px;width: 134px !important;}	
.btn{padding: 4px 12px;}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls.FrPmp table.SctnDtlsDualGrd td{background-color:none!important}
	</style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		
			
			<!-- Fire pump code starts -->
            <div class="DshBrdSctn">
				
               
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp device" id="devicebox<?php echo $dev['device_id']?>">
					<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
               
						<section class="content" >
						<form role="form" class="form-horizontal" action="" method="get">
						
							<div class="row meter-top">
							<input class="form-control" type="text" value="<?php echo set_value('search_keyword') ?>"  name="search_keyword" id="search_keyword" placeholder="Search">
							 <?php
							$options = array('' => 'Select Alert Type', 'regular' => 'Regular', 'moderate' => 'Moderate', 'critical' => 'Critical');
                            echo form_dropdown('alert_type', $options, set_value('alert_type'), 'class="form-control chosen-select" id="alert_type"'); ?>
							<?php
							
                            echo form_dropdown('device', $device, set_value('device'), 'class="form-control chosen-select" id="device" onchange="gethardware()"'); ?>
							
							<?php
							
                            //echo form_dropdown('hardware', $hardware, set_value('hardware'), 'class="form-control chosen-select" id="hardware"'); ?>
                          
							
                          
							<input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('from_date') ?>"  name="from_date" id="from_date" placeholder="From Date">
							

							<input class="form-control"  value="<?php echo set_value('to_date') ?>" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="to_date" id="to_date" placeholder="To Date">
							<button type="submit" id="filter" class="btn btn-success ">Filter</button>
							
							</div>
							</form>
							</section>
						</div>
                    <table class="SctnDtlsDualGrd">
                        <tr>
							
                        </tr>
						 <?php
							if (!empty($alerts)) {
							$i=1;
							foreach ($alerts as $row) {  
							if($row->alert_read==0){ ?>
								<tr style="background-color:#eee;border-top:#e4e4e4 2px solid">
								<?php }else{?>
								<tr style="background-color:#fff;border-top:#e4e4e4 2px solid">
							<?php } ?>	
							
							<?php 
							if($row->alert_type=="critical"){?>
							<td><i class="glyphicon glyphicon-bell" style="color:red"></i></td>
							<td style="color:red">
							<?php }elseif($row->alert_type=="regular"){ ?>
							<td><i class="glyphicon glyphicon-bell" style="color:orange"></i></td>
							<td style="color:orange">
							<?php }else{ ?>
							<td><i class="glyphicon glyphicon-bell" style="color:#bda985"></i></td>
							<td style="color:#bda985">
							<?php }
							echo ucfirst($row->alert_type);
							?>
							</td>
							<td width="12%"><a href="<?php echo site_url('Admin/Alerts/alert_detail/' . $row->alert_id) ?>"><?php echo $row->device_name?></a></td>
							<td><a href="<?php echo site_url('Admin/Alerts/alert_detail/' . $row->alert_id) ?>"><b><?php echo $row->alert_name?></b> - <?php echo substr($row->alert_message, 0, 100);?> ...
							</a></td>
							<td></td>
							<td width="12%" style="font-size:11px;"><?php echo date("d M. Y h:i A",strtotime($row->created_date))?></td>
							
						  </tr>
							<?php } } ?> 
							
                        
						
                       
                    </table>
                   
					<div class="row text-center text-center-xs"><?php echo $pagination; ?></div>
                    
					
					<!-- DG Set code ends -->
                                     
                </div>
            </div>
          
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>

<script>
function device(a){
	if($( "#devicebox"+a ).is( ":visible" ))
        {
            $('#devicebox'+a).toggle('slow'); 
            $("#device"+a).addClass("Expnd");
        }
        else if($( "#devicebox"+a ).is( ":hidden" ))
        {
            $('#devicebox'+a).toggle('slow'); 
            $("#device"+a).removeClass("Expnd");
        }
}

function deviceall(){
	if($( ".deviceall" ).is( ":visible" ))
        {
            $('.device').toggle('slow'); 
            $(".deviceall").addClass("Expnd");
        }
        else if($( ".deviceall" ).is( ":hidden" ))
        {
            $('.device').toggle('slow'); 
            $(".deviceall").removeClass("Expnd");
        }
	//$('.device').hide();
}

function gethardware(){
    $("#hardware").html("");
    var device = $("#device").val();
    
        // $(".device").show();
  
    $.ajax({
        type: 'GET',
        data: {
            device:device
        },
        url: BASE_URL+'Admin/Alerts/gethardwares/',
        success: function (data){
            $("#hardware").html(data);
            $("#hardware").trigger("chosen:updated");
        }
    });
}
 
 </script>	
</html>