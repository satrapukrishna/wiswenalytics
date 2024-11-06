
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
.form-control{float:left;margin-right: 10px;}	
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
				
               
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp device" style="display:block">
					<div class="content-wrapper" style="min-height: 100%">
               
						<div class="panel panel-default">
                        <input type="hidden" id="page" value="alerts" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                
                                  Read Alert Notification<span style="font-size:12px;float:right;"><a style="text-decoration: none;"href="<?php echo site_url('Admin/Alerts') ?>">> Back</a></span>
                                
                            </h3>
                            
                        </div>
                        <div class="panel-body">
						
									<div class="col-md-12">
							  <div class="box box-primary">
								<div class="box-header with-border">
								  <h3 class="box-title"></h3>

								 
								</div>
								<!-- /.box-header -->
								<div class="box-body no-padding">
								  <div class="mailbox-read-info">
									<h3><?php echo $alert['alert_name']?></h3>
									<h5>Device: <?php echo $alert['device_name']?><br>
									Hardware: <?php echo $alert['hardware_name']?>
									  <span class="mailbox-read-time pull-right"><?php echo date("d M. Y h:i A",strtotime($alert['created_date']))?></span></h5>
								  </div>
								  
									
								  </div>
								  <!-- /.mailbox-controls -->
								  <div class="mailbox-read-message">
									<p></p>

									<p><?php echo $alert['alert_message']?></p>

									
								  </div>
								  <!-- /.mailbox-read-message -->
								</div>
								
								
							  </div>
							  <!-- /. box -->
							</div>
                                    
								
                        </div>
                    </div>
						</div>
                    
                    
					
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

 
 </script>	
</html>