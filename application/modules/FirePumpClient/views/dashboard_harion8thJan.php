<!-- firepump dashboard on 8th jan backup-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/SliderCSS.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/jquery.easing.1.3.js"></script>
    <!-- <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JsSlider.js"></script> -->
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JavaScript.js"></script>
    <!-- below are hari added files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"> 
    </script>
    </script> 
   
    <script type="text/javascript" 
            src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> 
    </script> 
    <link rel="stylesheet" type="text/css" 
          href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
    <!-- <link rel="stylesheet" type="text/css" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <style type="text/css">
        
        div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl.chlr:before {
                        background: transparent url(<?php echo base_url(); ?>asset/sodexoasset/images/chiller-icon.png) no-repeat center center;
                        background-size: cover;
                    }
        div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.chlr:before {
                        background: transparent url(<?php echo base_url(); ?>asset/sodexoasset/images/chiller-icon.png) no-repeat center center;
                        background-size: cover;
                    }
        div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.cooltwr:before {
                        background: transparent url(<?php echo base_url(); ?>asset/sodexoasset/images/Cooling-Tower-water-1.png) no-repeat center center;
                        background-size: cover;
                    }
        div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl.cooltwr:before {
                        background: transparent url(<?php echo base_url(); ?>asset/sodexoasset/images/Cooling-Tower-water-1.png) no-repeat center center;
                        background-size: cover;
                    }
        div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls.DGGnrtrHldr div.ChillerCol-1 {
                    width: 88%;
                }
    </style>
    <script type="text/javascript">
        window.onload = function() 
        {   
            ChillersData(); 
            CoolingTowersData(); 
        };
    </script>
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">Wenalytics</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard">
                            <li>
                                <a href="#fmdiv2" class="Lnk Actv chlr"><span class="Txt">Chillers</span></a>
                            </li>
                            
                            <li>
                                <a href="#cooltwrdiv2" class="Lnk cooltwr"><span class="Txt">Cooling Towers</span></a>
                            </li>
                            <li>
                                <a href="#fpdiv2" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/nclientheader');?>
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- chillers code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl chlr">Chillers</span>
                    <span class="SctnVw Cllps FA" id="flowcollapse"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls" id="flowmeters">
                    
                </div>

            </div>

            <!-- chillers code ends -->
            <!-- cooling towers code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="cooltwrdiv2">
                    <span class="TxtTtl cooltwr">Cooling Towers</span>
                    <span class="SctnVw Cllps" id="cltowercollapse"></span>
                    <!-- <span class="SctnVwAll Cllps FA" id="collapseall"></span> -->
                </div>
                <div class="DshBrdSctnDtls" id="cooltowers">
                    
                </div>
            </div>
            <!-- cooling tower code ends -->

            <!-- Fire pump code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fpdiv2">
                    <span class="TxtTtl FrPmp">Fire Pump</span>
                    <span class="SctnVw Cllps" id="fpcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp" id="fpump">
                    <table class="SctnDtlsDualGrd">
                        <tr>
                            <th class="Col-1">

                            </th>
                            <th class="Col-2">
                                Running Status
                            </th>
                            <th class="Col-3">
                                Today
                            </th>
                            <th class="Col-4">
                                Yesterday
                            </th>
                            <th class="Col-5">
                                Last Week
                            </th>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Jocky Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts On"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Hydrant Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Off"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Diesel Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Auto"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                    </table>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 01</span>
                        <span class="MtrVl">36 Kgs</span>
                    </div>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 02</span>
                        <span class="MtrVl">50 Kgs</span>
                    </div>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 03</span>
                        <span class="MtrVl">156 Kgs</span>
                    </div>
                </div>
            </div>
            <!-- Fire pump code ends -->
            
        </div>
    </div>
</body>
<script type="text/javascript">

$("#flowmwter").css({"float":"500", "position":"30","width":"350px"});

    $('#flowcollapse').click(function(event) 
    {

        if($( "#flowmeters" ).is( ":visible" ))
        {
            $('#flowmeters').toggle(); 
            $("#flowcollapse").addClass("Expnd");
        }
        else if($( "#flowmeters" ).is( ":hidden" ))
        {
            $('#flowmeters').toggle(); 
            $("#flowcollapse").removeClass("Expnd");
        }
        // $('#flowmeters').toggle();  
        // $("#flowcollapse").addClass("Expnd");   
    });

    $('#cltowercollapse').click(function(event) 
    {
        if($( "#cooltowers" ).is( ":visible" ))
        {
            $('#cooltowers').toggle(); 
            $("#cltowercollapse").addClass("Expnd");
        }
        else if($( "#cooltowers" ).is( ":hidden" ))
        {
            $('#cooltowers').toggle(); 
            $("#cltowercollapse").removeClass("Expnd");
        }
        // $('#dgset').toggle(); 
        // $("#dgcollapse").addClass("Expnd");       
    });
    
    $('#fpcollapse').click(function(event) 
    {
        if($( "#fpump" ).is( ":visible" ))
        {
            $('#fpump').toggle(); 
            $("#fpcollapse").addClass("Expnd");
        }
        else if($( "#fpump" ).is( ":hidden" ))
        {
            $('#fpump').toggle(); 
            $("#fpcollapse").removeClass("Expnd");
        }
        // $('#fpump').toggle(); 
        // $("#fpcollapse").addClass("Expnd");  
    });
   
    $('#collapseall').click(function(event) 
    {
        if($( "#flowmeters" ).is( ":hidden" ) &&  $( "#cooltowers" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" ) && $( "#lpg" ).is( ":hidden" ) )
        {
            
            $('#flowmeters').toggle();$("#flowcollapse").removeClass("Expnd");           
            $('#cooltowers').toggle();$("#cltowercollapse").removeClass("Expnd");
            $('#fpump').toggle();$("#fpcollapse").removeClass("Expnd");
            // $("#lpgcollapse").addClass("Expnd");
            $("#collapseall").removeClass("SctnVwAll Expnd");
            $("#collapseall").addClass("SctnVwAll Cllps");
        } 
        else
        {
            $("#collapseall").addClass("SctnVwAll Expnd");
            
            if($( "#flowmeters" ).is( ":visible" ))
            { 
                $('#flowmeters').toggle(); $("#flowcollapse").addClass("Expnd"); 
            }
            else{}
            if($( "#cooltowers" ).is( ":visible" ))
            { 
                $('#cooltowers').toggle();  $("#cltowercollapse").addClass("Expnd");
            }
            else{}
            if($( "#fpump" ).is( ":visible" ))
            { 
                $('#fpump').toggle(); $("#fpcollapse").addClass("Expnd");
            }
            else{}
            
        }
                
    });

    
    $('#eminnercollapse').click(function(e) 
    {
        e.preventDefault();
        $("#emeterfirstfloorOuterdiv").toggle(); 
        // $("#emeter").addClass("Expnd"); 
    });

    $('#dshbrdMasterId').click(function(e) 
    {
        e.preventDefault();
        $("#hidedashboard").toggle();  
    });
  
    $('#reportsOuterId').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#reportsInnerId").toggle();
          
    });
    $('#dgsetouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#dgsetinnerid").toggle();
          
    });
    $('#emouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#eminnerid").toggle();
          
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />


<script type="text/javascript">
var chitem="";
function ChillersData()
{

    chitem+='<div class="bxslider" id="dgset">'; 
    chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl"><b>Chiller -01</b></span><div class="ChillerCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Chiller Status</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">2Hours30Mins</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">30</div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">22</div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">100 Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">100 Pa.</div></li></ul></div></div></div></div></div>';
    chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl"><b>Chiller -02</b></span><div class="ChillerCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Chiller Status</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">1Hours30Mins</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">36</div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">25</div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">250 Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">250 Pa.</div></li></ul></div></div></div></div></div>';
    chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl"><b>Chiller -03</b></span><div class="ChillerCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Chiller Status</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">00Hours 00Mins</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">NA</div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">NA</div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">NA</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">NA</div></li></ul></div></div></div></div></div>';
    
        chitem+='</div>'; 
         $('#flowmeters').append(chitem);
         $('.bxslider').bxSlider({
        slideWidth: 490,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500", "position":"30","width":"350px"});
         
           
}
var coolitem="";
function CoolingTowersData()
{
    coolitem+='<div class="bxslider" id="dgset">'; 
    coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl"><b>CoolingTower -01</b></span><div class="ChillerCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">CoolTower Status</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">1Hours45Mins</div></li></ul></div></div></div></div></div>';
    coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl"><b>CoolingTower -02</b></span><div class="ChillerCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">CoolTower Status</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">1Hours24Mins</div></li></ul></div></div></div></div></div>';
    coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl"><b>Chiller -03</b></span><div class="ChillerCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Chiller Status</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">00Hours 00Mins</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">NA</div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">NA</div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">NA</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">NA</div></li></ul></div></div></div></div></div>';
    
        coolitem+='</div>'; 
         $('#cooltowers').append(coolitem);
         $('.bxslider').bxSlider({
        slideWidth: 490,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500", "position":"30","width":"350px"});
         
           
}
</script>


</html>