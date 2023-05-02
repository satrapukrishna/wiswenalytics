
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
	
	
	</style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu2') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="firepump" />
		<div class="DshBrdSctnTtl">
		<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
		</div>
		</div>
		
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="div<?php echo $dev['device_id']?>">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $dev['dashboard_icon'] ?>" width="40" /><?php echo ucwords(strtolower($dev['device_name'])); ?></span>
                    <?php /*<span class="SctnVw Cllps" id="fpcollapse"></span>*/?>
					<span class="SctnVw Cllps" onclick="device(<?php echo $dev['device_id']?> )" id="device<?php echo $dev['device_id']?>"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp device" id="devicebox<?php echo $dev['device_id']?>">
                    <table class="SctnDtlsDualGrd">
                        <tr>
                            <th>

                            </th>
                            <th>
                                Switch Position
                            </th>
                            <th>
                                Running Status
                            </th>
                            <th>
                                Today
                            </th>
                            <th>
                                Yesterday
                            </th>
                            <th>
                                Last Week
                            </th>
                        </tr>
					
                        <tr>
                            <td>
                                <span class="Txt Ttl">sdsadas</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Running Status</span>
								
                                
                               
                            </td>
                            <td>
                                <span class="Txt MblTtl">Switch Status</span>
                                
                                
                            </td>
                            <td>
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">dfdsf</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">dfdsfds</span>
                            </td>
                            <td>
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">fdsfdsfdsf</span>
                            </td>
                        </tr>
						
                       
                    </table>
                    
					
                    
					
                                     
                </div>
            </div>
            <!-- Fire pump code ends -->
			
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>


<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
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