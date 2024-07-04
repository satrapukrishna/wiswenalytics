
<html>
<head>
    <?php $this->load->view('common/css3')?>
    <!-- <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/StyleSheet.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/ahuasset/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/ahuasset/AppTheme/Fonts/IconFont.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/ahuasset/AppTheme/style.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
	.bx-wrapper img{display:inline!important}
	/* .bxheight{height:400px!important;} */
	img{padding:0px;margin:0px;}
	.box{margin-top:5px;width:33.33%;float:left;}
	.small-box{width:33.33%;float:left; text-align:center;padding:5px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;}
	h3{font: 600 16px 'Open Sans'!important; color:#000;padding:0px;margin:0px}
	h5{font: 600 10px 'Open Sans'!important; color:#868181;margin-top:7px;margin-bottom:0px}
	.ahu-list{background-color:#f4f4f4; padding:5px;border-bottom:1px solid #dcd4d4}
	.no-border-right{border-right:none!important}
	.no-border-bottom{border-bottom:none!important}
	.bx-wrapper {
    margin-bottom:40px!important;
  }
  .no-radius-bottom{border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;}
  .status-working{
	  margin-top:3px;
	  letter-spacing: 1px;
    border-radius: 25px!important;
    padding: 3px 0!important;
    font: 600 10px 'Open Sans'!important;
    width: 55px!important;
    display: inline-block!important;
    background-color: #148614!important;
    color: #fff!important;
    box-sizing: border-box!important;
    text-align: center!important;
  }
  .status-stopped {
    letter-spacing: 1px;
	margin-top:3px;
    border-radius: 25px!important;
    padding: 5px 0!important;
    font: 600 10px 'Open Sans'!important;
    width: 75px!important;
    display: inline-block!important;
    background-color: #de3939!important;
    color: #fff!important;
    box-sizing: border-box!important;
    text-align: center!important;
}
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
  margin: 8px 10px 0 0!important;

  }

  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft, div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{padding:9px}
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl {padding:10px}
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: none !important;border-bottom: 1px solid #ddd;}
  .bx-wrapper .bx-prev{left: -28px !important;}
  .bx-wrapper .bx-next {right: -31px !important;}
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr {
  background-color: #fff!important;
    box-shadow: none!important;
  border-radius: 10px;
  border: 1px solid #ccc;
  }
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl{
  padding: 14px 0 9px 45px!important;
  }
  .imageadd img{ left: 0px!important;}
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl{color:#000}

  .switch {
  position: relative;
  display: inline-block;
  width: 55px;
  height: 24px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls.DGGnrtrHldr div.DGCol-1 {width:60%!important}
div.LiquidTank{height:208px}
div.LiquidTank div.Liquid.l-70, div.LiquidTank.Smll div.Liquid.l-70{height:182px;}
div.LiquidTank.Smll div.Liquid.High{height:80px}
.head-h4{margin:0px;padding:10px;background-color: #eee;
    font: 800 14px 'Open Sans';
    color: #3c8dbc;
  text-align:left;
    border-bottom: 1px solid #ddd;}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{width:43%}
div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{width:57%}

    .imageadd img{ left: 0px!important;}
    .panel-group{margin-bottom:0px}
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls.IOQ div.SctnDtls.IOQFtr {
    padding: 20px;
    box-sizing: border-box;
    }
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr{padding:5px}
  .panel-title{color: #555!important;
    font-size: 16px!important;
    font-weight: bold!important;
    text-transform: uppercase!important;
    letter-spacing: 1px!important;
    word-spacing: 3px!important;
    text-decoration: none;line-height: 64px!important;}
  .hvac-bg-new{box-shadow: none!important;border-radius:15px!important}
  .panel-group .panel{border-radius:15px!important;}
  .panel-default{border-color: #ffffff;}
  .panel-default>.panel-heading{background-color: #fff;}
  .panel-default>.panel-heading+.panel-collapse>.panel-body{background-color:#f9f9f9}
  .panel-body{padding:0px!important}
  .sub-one{border-top:1px solid #eee;
  padding:10px!important;height:auto!important}
  .inner_collaps{float: right;
    background-color: #367fa8;
    font: 600 12px 'Open Sans';
    color: #fff;
    margin: 14px 30px 0 0;
    padding: 7px 15px 7px 15px;
    cursor: pointer;
    border-radius: 30px;
    margin-top: -35px;
    margin-right: 5px;
  }
  .inner_collaps1{float: right;
    font: 600 22px 'Open Sans';
    color: #3c8dbc;
    margin-top: -18px;
    margin-right: 10px;
   cursor:pointer;
  }
  .inner_collaps:before{
  content: 'Collapse';
    }
  .Expndd:before {
    content: 'Expand!!'!important;
  }

  .Expndd1:before {
    content: '-'!important;
  }
  .on-img{margin-left:-22px}
  .cool-img{margin-left:-3px}
  div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls.IOQ div.SctnDtls.IOQFtr div.FtrOtrCrcl.presure-bg {background-color:#a3f3f7!important;}
.panel-body{
	margin-left: 10px;
    margin-top: 15px;
}
.button {
  background-color: #367fa8;
  border: none;
  color: white;
  padding: 12px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 15px;
}
    </style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">

        <?php $this->load->view('common/left_menu3')?>
        <?php $this->load->view('common/header2')?>


        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
        <div class="DshBrdSctn">
    <input type="hidden" id="page" value="aircondition" />
    </div>

	<!-- AHU starts -->
	<?php if (modules::run('Admin/Site/authlink', 'ahu')) {?>
           <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="hvac">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu.png" width="45" />AHU Controlling</span>

                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
                    <span class="SctnVw Cllps dev" onclick="device(5555)" id="device5555"></span>
                    <span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>



                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>


                <div class="DshBrdSctnDtls device devicebox5555" style="background-color:#fff;padding:10px;border-bottom: 1px solid #d0cfcf;margin-bottom:10px;">

        
        <div class="devicebox5555">
			

                <div class="bxslider10" id="bxid">
				<?php for ($i=0; $i < count($ahudata); $i++) {?>
			
					 <div class="col-4 FllHght">
                                    <div class="LocationDtlsGrd PosReltv">
                                        <div class="DshHdrHldr Grd">
                                            <button class="Grdbtn BtnPsn"><?php echo $i+1; ?></button>
                                            <div class="TtlHldr">
                                                <span class="TtlGrd" id="mt"><?php echo $ahudata[$i]['meter']."-".$ahudata[$i]['LocationName'] ?></span>
                                            </div>
                                            <div class="ActnBtnHldr">
                                                <img src="<?php echo site_url() ?>new_assets/Images/switch-green.svg" alt="switch" />
                                            </div>
                                        </div>
                                        <div class="DvlstGrdVw">
                                            <div class="DvlstGVw set1" onclick="showpopup('<?php echo $ahudata[$i]['meter'] ?>','<?php echo $ahudata[$i]['LocationName'] ?>','<?php echo $ahudata[$i]['sid'] ?>')">
                                                <span class="TtGdvw">Set temp.</span>
                                                <span class="TtlGrd" ><?php echo $ahudata[$i]['set_temp'] ?>&deg;C <a href="#"
                                                        class="Settings WISIcn-Menu-Masters" 
                                                        style="color: #003550;text-decoration: none;font-size: 15px;"></a></span>
                                            </div>
                                            <div class="DvlstGVw set2">
                                                <span class="TtGdvw">Room temp.</span>
                                                <span class="TtlGrdDrk"><?php echo $ahudata[$i]['Return Air Temp'] ?>&deg;C</span>
                                            </div>
                                            <div class="DvlstGVw NoBrrght set3">
                                                <span class="TtGdvw">Humidity</span>
                                                <span class="TtlGrdDrk">75Hz</span>
                                            </div>
                                        </div>
                                        <div class="DshHdrHldr Grd">
                                            <div class="ActnBtnHldr RmMrgn">
                                                <div class="BtnHldr">
                                                    <a href="#" class="pdtp AppBtn IcnOnly WISIcn-Group InActv"></a>
                                                </div>
                                            </div>
                                            <div class="ActnBtnHldr BGGrdVw">
                                                <div class="BtnHldr">
                                                    <a href="#" class="pdtp AppBtn IcnOnly WISIcn-Location"></a>
                                                </div>
                                                <div class="BtnHldr Brrght">
                                                    <a href="#" class="pdtp AppBtn IcnOnly WISIcn-Weather"></a>
                                                </div>
                                                <div class="BtnHldr Brrght">
                                                    <a href="#"
                                                        class="pdtp AppBtn IcnOnly WISIcn-Menu-Masters InActv"></a>
                                                </div>
                                                <div class="BtnHldr Brrght">
                                                    <a href="#"
                                                        class="pdtp AppBtn IcnOnly WISIcn-Calendar-Day InActv"></a>
                                                </div>
                                                <div class="BtnHldrb Brrght">
                                                    <a href="#" class="pdtp AppBtn IcnOnly WISIcn-MenuVertical"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
					
						
					<?php }?>
                </div>
                </div>

                </div>

    </div>
	<div class="PopUpBG Settings_popup" style="display: none;"></div>
	<div id="addpopup">
	
	</div>
   
    <!-- AHU ends -->
    <?php }?>
			
        <?php $this->load->view('common/footer3')?>



</div>
</div>

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css"> -->

<script>
function showpopup(mtr,loc,sid){
	$(".Settings_popup").css("display", "block");
	var html='';
	html+='<div class="PopUpHldr Settings_popup"        style="display: visible;width: 500px;height: 280px;top:250px;left: calc(50% - 200px);box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.3);">        <div class="PopUpHedr" style="background: #E65100;">            <div class="HdrTtlHldr">                <span class="TtlTxt">Update Set Temperature</span>            </div>        </div>        <div class="PopUpBdy" style="border-radius: 0px 0px 10px 10px">            <div class="InnrCntntHldr">                <div class="FormHldr">                    <div class="row">                        <div class="col-1"                            style="display: flex;padding-top: 10px;padding-bottom: 0px;padding-right: 0px;">                            <div style="width: 70%;">                                <select id="selUser" class="Input" style="width: 70%;height: 42px;">                                    <option value="0"selected>Select</option>                                    <option value="15.00">15.00&deg;C</option>                                    <option value="16.00">16.00&deg;C</option>                                    <option value="17.01">17.01&deg;C</option>                                    <option value="18.00">18.00&deg;C</option>                                    <option value="19.1">19.1&deg;C</option>                                    <option value="20">20.0&deg;C</option>                                    <option value="211.01">211.01&deg;C</option>                                    <option value="22">22.0&deg;C</option>                                    <option value="23">23.0&deg;C</option>                                    <option value="24">24.0&deg;C</option>                                    <option value="25">25.0&deg;C</option>                                    <option value="26">26.0&deg;C</option>                                    <option value="27">27.0&deg;C</option>                                    <option value="28">28.0&deg;C</option>                                    <option value="29">29.0&deg;C</option>                                    <option value="30">30.0&deg;C</option>                                </select>                                <div id="result"></div>                            </div>                        </div>                    </div>                </div>            </div>            <div class="PopUpBtnFtr" style="padding-top: 10px;">                <div class="FormHldr">                    <div class="row">                        <div class="col-1 BtnHldr">                            <a href="#" class="AppBtn Icn Scndry WISIcn-Cross-Big Settingsclose_btn">Cancel</a>                            <a href="#" class="AppBtn  Settingsclose_btn" onclick="addAHU(\''+mtr+'\',\''+loc+'\',\''+sid+'\')">Save</a>                        </div>                    </div>                </div>            </div>        </div>    </div>';
	$("#addpopup").html(html);

	$(".Settingsclose_btn").click(function () {
            $(".Settings_popup").css("display", "none");
        });

}
function addAHU(meter,location,switchId){
	var temp=$('#selUser').val();
	// alert(temp);
	if(temp==0){
		
	}else{

	}
	//var loc = `'${location}'`;

	$.ajax({
        type: 'GET',
        data: {
            temp:temp,sid:switchId
        },
        url: BASE_URL+'Admin/SwitchUpdate/updateAhu',
        success: function (data){
			window.location.reload();

			// alert(data);return false;
            // $("#solution").html(data);
            // $("#solution").trigger("chosen:updated");
        }
    });
}
$('.bxslider10').bxSlider({
        slideWidth: 345,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0,
		infiniteLoop:false
    });



 function em(id){
    $('.em-disc'+id).toggle('slow');
    $('.em'+id).hide();
    $('.em-hide'+id).show();
 }
function device(a){
  if($( ".devicebox"+a ).is( ":visible" ))
        {
      // alert("aaaa");
            $('.devicebox'+a).hide('slow');
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
      // alert("bbb");
            $('.devicebox'+a).show('slow');
            $("#device"+a).removeClass("Expndd");
        }
}
function device3(a){
  if($( ".devicebox"+a ).is( ":visible" ))
        {
       //alert("aaaa");
            $('.devicebox'+a).hide('slow');
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
      // alert("bbb");
            $('.devicebox'+a).show('slow');
            $("#device"+a).removeClass("Expndd");
        }
}
function device1(a){
  if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow');
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow');
            $("#device"+a).removeClass("Expndd");
        }
}
function device2(a){
  if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow');
            $("#device"+a).addClass("Expndd1");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow');
            $("#device"+a).removeClass("Expndd1");
			$('.bx'+a).addClass("bxheight");
			//$(".devicebox5555").css("height", "500px");
			$(".bx-viewport").css("height", "fit-content");
        }
}


function deviceall(){
  if($( ".device" ).is( ":visible" ))
        {

            $('.device').hide('slow');
            $(".deviceall").addClass("Expnd");
      $(".dev").addClass("Expndd");
        }
        else if($( ".device" ).is( ":hidden" ))
        {

            $('.device').show('slow');
            $(".deviceall").removeClass("Expnd");
      $(".dev").removeClass("Expndd");
        }
  //$('.device').hide();
}
$(".Settings").click(function () {
	
	//alert($("#mt").text());
            $(".Settings_popup").css("display", "block");
        });
        $(".Settingsclose_btn").click(function () {
            $(".Settings_popup").css("display", "none");
        });
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
 </script>
</html>

