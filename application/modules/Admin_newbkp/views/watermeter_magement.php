<?php //echo json_encode($water_meter_data);die();?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css">
  <style>
	#divLargerImage
{
    display: none;
    width: 250px;
    height: 250px;
    position: absolute;
    top: 35%;
    left: 35%;
    z-index: 99;
}

#divOverlay
{
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #CCC;
    opacity: 0.5;
    width: 100%;
    height: 100%;
    z-index: 98;
}
	input[type="checkbox"][readonly] {
  pointer-events: none;
}
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="water" />
		
		</div>
		<div id="divLargerImage"></div>

        <div id="divOverlay"></div>
        
		<div class="WtrMngtDshHldr">
        <div class="DshBrdSctn" >
                <div class="DshBrdSctnTtl" id="watermeter">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/water-level.png" width="30" />Water Management Dashboard</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					
					
                </div>
        <div class="WtrMngtSrchSctn">
        
        <form  name="myForm" action="<?php echo site_url("Admin/Home/watermeterDashboard")?>" onsubmit="return validateForm()" method="post">
            <ul class="SrchBx">
                <li>
                    <span class="SrchTxtTtl">Today</span>
                    <span class="SrchTxt"><?php echo date("j  F Y "); ?></span>
                </li>
                <li>
                    <input type="date" value="<?php echo set_value('date') ?>" class="Inpt" name="date" />
                </li>
                <li class="BtnHldr">
                    <input type="submit" class="InptBtn" value="Submit" />
                    
                </li>
                <li class="BtnHldr">
                   
                    <a href="<?php echo site_url('Admin/Home/watermeterDashboard') ?>" class="InptBtn">Reset</a>
                </li>
            </ul>
</form>
        </div>
        <div class="WtrMngtDtlsHldr">
        <div class="devicebox5551" >
				
				<div class="bxslider555" id="bxid">
            <?php for ($i=0; $i < count($water_meter_data); $i++){?>
            <div class="WtrLnDtls">
                <span class="LnName MunWtrLn"><?php echo $water_meter_data[$i]['meter'] ?></span>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt"><?php echo $water_meter_data[$i]['today_reading'] ?></span>
                        <span class="DtlsTxtTtl">Today’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                       <div>
                           <?php /* ?>
                        <a href="#" class="TxtLnk">
                            <?php if(strpos($water_meter_data[$i]['today_reading_photo'], '.jpg')){ ?><img src="<?php echo $water_meter_data[$i]['today_reading_photo'] ?>" class="ImgHldr"/> 
                            <?php }else{?>
                                No Image
                            <?php }?></a>
                            <?php */?>
                            <?php if(strpos($water_meter_data[$i]['today_reading_photo'], '.jpg')){ ?>
                            <a href="<?php echo $water_meter_data[$i]['today_reading_photo'] ?>" class="TxtLnk" target="_blank">
                            View Image
                           </a>
                           <?php }else{?>
                            <a href="#" class="TxtLnk" > No Image</a>
                            <?php }?>
                        </div>
                       
                        
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt"><?php echo $water_meter_data[$i]['yesterday_reading'] ?></span>
                        <span class="DtlsTxtTtl">Yesterday’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt"><?php echo $water_meter_data[$i]['difference'] ?></span>
                        <span class="DtlsTxtTtl">Difference</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt"><?php echo $water_meter_data[$i]['time'] ?></span>
                        <span class="DtlsTxtTtl">Reading Time</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt"><?php echo $water_meter_data[$i]['emp_name'] ?></span>
                        <span class="DtlsTxtTtl">Recorded By</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxtTtl">Reading From</span>
                        
                    </div>
                    <div class="TxtDtlsHldr">
                        
                        <span class="DtlsTxt"><?php echo $water_meter_data[$i]['reading_from'] ?></span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv BtnHldr">
                    <div class="TxtDtlsHldr">
                    <?php if($water_meter_data[$i]['verify']==1){ ?>
                        <span class="DtlsTxtVrfctn YsVrd">Verified</span>
                        <?php }else{ ?>
                        
                        <span class="DtlsTxtVrfctn NtVrd">Not Verified</span>
                        <?php } ?>
                    </div>
                    <div class="TxtDtlsHldr">
                        <?php if($water_meter_data[$i]['today_reading']=='NA'){ ?>
                            <input type="button" onclick="popup('<?php echo $water_meter_data[$i]['meter_id'] ?>','<?php echo $water_meter_data[$i]['today_date'] ?>','<?php echo $water_meter_data[$i]['yesterday_date'] ?>')" class="VrEdBtn"  value="Input" />
                            <?php }else{?>
                                <input type="button" onclick="popup('<?php echo $water_meter_data[$i]['meter_id'] ?>','<?php echo $water_meter_data[$i]['today_date'] ?>','<?php echo $water_meter_data[$i]['yesterday_date'] ?>')" class="VrEdBtn"  value="Verfiy/ Edit" />
                                <?php }?>
                        
                        

                    </div>
                </div>
                
            </div>
            <?php } ?>
                        </div>
                        </div>
            
        </div>
</div>


        <div class="WtrMngtDtlsHldr">
            <div class="WtrTnksDtlsHldr">
                <?php for ($i=0; $i < count($water_meter_data_times['readings']); $i++){ ?>
                <div class="TnksDlts">
                    <span class="TnkNme WtrSmpTnk"><?php echo $water_meter_data_times['readings'][$i]['meter'] ?></span>
                    <div class="WtrLvlHldr">
                        <div class="LiquidTank Smll">
                            <div class="Liquid Liquidhigh l-<?php echo $water_meter_data_times['readings'][$i]['filled'] ?>"></div>
                        </div>
                    </div>
                    <div class="WtrTnkTxtDtlsHldr">
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt"><?php echo $water_meter_data_times['readings'][$i]['filled'] ?>%</span>
                                <span class="DtlsTxtTtl">Filled</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt"><?php echo $water_meter_data_times['readings'][$i]['today_reading'] ?>  </span>
                                <span class="DtlsTxtTtl">Available</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt"><?php echo $water_meter_data_times['readings'][$i]['yesterday_reading'] ?> </span>
                                <span class="DtlsTxtTtl">Yesterday</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt"><?php echo $water_meter_data_times['readings'][$i]['today_reading'] ?> </span>
                                <span class="DtlsTxtTtl">Today</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt"><?php echo $water_meter_data_times['readings'][$i]['time'] ?></span>
                                <span class="DtlsTxtTtl">Yesterday Reading Time</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt"><?php echo $water_meter_data_times['readings'][$i]['time'] ?></span>
                                <span class="DtlsTxtTtl"> Today Reading Time</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <?php }?>
                <!-- <div class="TnksDlts">
                    <span class="TnkNme OvrhdTnk">Overhead Tanks #1</span>
                    <div class="WtrLvlHldr">
                        <div class="LiquidTank Smll">
                            <div class="Liquid Liquidhigh l-85"></div>
                        </div>
                    </div>
                    <div class="WtrTnkTxtDtlsHldr">
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">94%</span>
                                <span class="DtlsTxtTtl">Filled</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4830 Lts</span>
                                <span class="DtlsTxtTtl">Available</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">3340 Lts</span>
                                <span class="DtlsTxtTtl">Yesterday</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4988 Lts</span>
                                <span class="DtlsTxtTtl">Today</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="TnksDlts">
                    <span class="TnkNme OvrhdTnk">Overhead Tanks #2</span>
                    <div class="WtrLvlHldr">
                        <div class="LiquidTank Smll">
                            <div class="Liquid Liquidhigh l-45"></div>
                        </div>
                    </div>
                    <div class="WtrTnkTxtDtlsHldr">
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">89%</span>
                                <span class="DtlsTxtTtl">Filled</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4729 Lts</span>
                                <span class="DtlsTxtTtl">Available</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">3950 Lts</span>
                                <span class="DtlsTxtTtl">Yesterday</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4900 Lts</span>
                                <span class="DtlsTxtTtl">Today</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="OvrallFllDlts">
                    <div class="FtrDtls WtrLvl">
                        <span class="FtrDtlsTxt"><?php echo $water_meter_data_times['volume']['yesterday_total'] ?> </span>
                        <span class="FtrDtlsTtl">Yesterday’s Available</span>
                    </div>
                    <div class="FtrDtls WtrLvl">
                        <span class="FtrDtlsTxt"><?php echo $water_meter_data_times['volume']['today_total'] ?> </span>
                        <span class="FtrDtlsTtl">Today`s Available</span>
                    </div>
                    <div class="FtrDtls TnkrLn">
                        <span class="FtrDtlsTxt"><?php echo $water_meter_data_times['volume']['yesterday_total_intake'] ?></span>
                        <span class="FtrDtlsTtl">Today’s Intake</span>
                    </div>
                    <!-- <div class="FtrDtls TnkrLn">
                        <span class="FtrDtlsTxt"><?php //echo $water_meter_data_times['volume']['yesterday_total_intake'] ?></span>
                        <span class="FtrDtlsTtl">Yesterday’s Total Intake</span>
                    </div> -->
                    
                    <div class="FtrDtls Cnsmd">
                        <span class="FtrDtlsTxt"><?php echo $water_meter_data_times['volume']['yesterday_total_consume'] ?></span>
                        <span class="FtrDtlsTtl">Total Consumed</span>
                    </div>
                    <!-- <div class="FtrDtls AvgCnsmd">
                        <span class="FtrDtlsTxt">8120 Lts</span>
                        <span class="FtrDtlsTtl">Avg. Consumed</span>
                    </div> -->
                </div>
            </div>
        </div>


        <div class="PpUpMnHldr" id="formpopup">
        
        <!-- <div class="PpUpDtlsHldr"> -->
            <!-- <form  name="myForm" action="<?php echo site_url("Admin/Home/watermeterDashboard")?>" onsubmit="return validatepop()" method="post">
            <div class="TtlHdrDv">
                <span class="MtrLnNme">Municipal Water Meter #1</span>
                <span class="MtrLnDtls">Tower 1, Pradeep Apartments</span>
                <span class="MtrClsBtn" onClick="test()" ></span>
            </div>
            <div class="DtlsHdrDv">
                <div class="DtlsTxtDv">
                    <span class="RdnsTxtTtl">Yesterday’s Reading</span>
                    <span class="RdnsTxt">5659</span>
                </div>
                <div class="DtlsTxtDv">
                    <span class="RdnsTxtTtl">Today’s Reading</span>
                    <span class="RdnsTxt">5659</span>
                    <input type="text" class="MtrInpt" />
                    <input  class="MtrInpt" type="hidden" value="" />
                </div>
            </div>
            <div class="MtrImgHldr">
                <div class="DvImgHldr Hlf">
                    <img src="Images/WaterMeterSample.jpg" class="MtrImg" />
                </div>
                <div class="DvImgHldr Hlf">
                    <img src="Images/WaterMeterSample.jpg" class="MtrImg" />
                </div>
            </div>
            <div class="MtrBtnHldr">
            <input type="submit" class="SveBtn" value="Verify and Save" />
                
            </div>
        </div>
        </form> -->
    <!-- </div> -->
            
    </div>
		
            
   
			
			
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
   
	
  
</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />

<script>
    
    $('a img').click(function () {
    var $img = $(this);
    $('#divLargerImage').html($img.clone().height(400).width(400)).add($('#divOverlay')).fadeIn();
});
$('#divLargerImage').add($('#divOverlay')).click(function () {
    $('#divLargerImage').add($('#divOverlay')).fadeOut(function () {
        $('#divLargerImage').empty();
    });
});
function popup(id,today,yesterday){    
    
    $.ajax({
        type: 'GET',
        data: {
            meter_id:id,
			today:today
        },
        url: BASE_URL+'Admin/Home/getWaterMeterReadingAjax',
        success: function (data){
            addData(data);
            
        }
    }); 
}
function addData(data){
    //alert(data);
    //var meter_id=id;
    var div='';
    var meter_data=JSON.parse(data);
     div='<div class="PpUpDtlsHldr"><form  name="myForm" action="<?php echo site_url("Admin/Home/watermeterDashboard")?>" onsubmit="return validatepop()" method="post">            <div class="TtlHdrDv">                <span class="MtrLnNme">'+meter_data['meter']+'</span>                                <span class="MtrClsBtn" onClick="test()" ></span>            </div>            <div class="DtlsHdrDv">                <div class="DtlsTxtDv">                    <span class="RdnsTxtTtl">Yesterday’s Reading</span>                    <span class="RdnsTxt">'+meter_data['yesterday_reading']+'</span> <input  type="number" name="yesterday_reading" id="yesterday_reading"  class="MtrInpt" placeholder="Yesterday Reading" /> <input  type="hidden" name="prv_yesterday_reading" id="prv_yesterday_reading"  class="MtrInpt" value="'+meter_data['yesterday_reading']+'"  />                  </div>                <div class="DtlsTxtDv">                    <span class="RdnsTxtTtl">Today’s Reading</span>                    <span class="RdnsTxt">'+meter_data['today_reading']+'</span>                    <input type="number" class="MtrInpt" name="today_reading" id="today_reading" placeholder="Today Reading"/><input type="hidden" class="MtrInpt" name="prv_today_reading" id="prv_today_reading" value="'+meter_data['today_reading']+'" /> <input type="hidden" class="MtrInpt" name="meter_id" value="'+meter_data['meter_id']+'" /><input type="hidden" class="MtrInpt" name="meter_name" value="'+meter_data['meter']+'" /> <input type="hidden" class="MtrInpt" name="today_date" value="'+meter_data['today_date']+'" /> <input type="hidden" class="MtrInpt" name="yesterday_date" id="yesterday_date" value="'+meter_data['yesterday_date']+'" />                  </div>            </div>            <div class="MtrImgHldr">                <div class="DvImgHldr Hlf">                    <img src="'+meter_data['yesterday_reading_photo']+'" class="MtrImg" />                </div>                <div class="DvImgHldr Hlf">                    <img src="'+meter_data['today_reading_photo']+'" class="MtrImg" />                </div>            </div>            <div class="MtrBtnHldr">            <input type="submit" class="SveBtn" value="Verify and Save" />        </div>        </div>        </form></div>';
    $(".PpUpMnHldr").append(div);

    $(".PpUpMnHldr").css("display", "block");
 
   
    

}
function test(){
    $(".PpUpMnHldr").css("display", "none");
}
function close(){
    $(".PpUpMnHldr").css("display", "none");
}
function validateForm()
{
    var date = $("#date").val();
    if(date==''){
        alert("Plaese Select Date");

	
	
	return false;	
}
}
function validatepop()
{
    var today_reading= $('#today_reading').val();
    var yesterday_reading= $('#yesterday_reading').val();
    var prv_today_reading= $('#prv_today_reading').val();
    var prv_yesterday_reading= $('#prv_yesterday_reading').val();
    if(today_reading!='' && yesterday_reading=='' && prv_yesterday_reading!='NA'){
    if(Number(prv_yesterday_reading)>Number(today_reading)){
        alert('Invalid Reading');
        return false;
    }else{
        return true;
    }
    }else if(yesterday_reading!='' && today_reading!=''){
        if(Number(yesterday_reading)>Number(today_reading)){
        alert('Invalid Reading');
        return false;
        }

    }else if(yesterday_reading!='' && prv_today_reading!='NA'){
        if(Number(yesterday_reading)>Number(prv_today_reading)){
        alert('Invalid Reading');
        return false;
        }

    }else if(prv_today_reading=='NA' && prv_yesterday_reading=='NA' && today_reading=='' && yesterday_reading==''){
        alert('Please Add Reading');
        return false;

    }
    
    
    
}
$('.bxslider555').bxSlider({
        slideWidth: 291,
        minSlides: 2,
        maxSlides: 30,
		touchEnabled: false,
        slideMargin: 0,
        infiniteLoop:false
    });
    </script>

	
</html>

