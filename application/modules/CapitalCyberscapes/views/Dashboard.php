<!-- firepump dashboard on 8th jan backup-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/capitalspasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/capitalspasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>asset/capitalspasset/CSS/SliderCSS.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url(); ?>asset/capitalspasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/capitalspasset/Scripts/jquery.easing.1.3.js"></script>
   
    <script src="<?php echo base_url(); ?>asset/capitalspasset/Scripts/JavaScript.js"></script>
    <!-- below are hari added files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"> 
    </script>
    </script> 
   
    <script type="text/javascript" 
            src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> 
    </script> 
    <!-- highchart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>

        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <!-- end highchart -->

    <link rel="stylesheet" type="text/css" 
          href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <style type="text/css">
        
    @media (max-width: 575.98px) { ... }

           // Small devices (landscape phones, 576px and up)
          // @media (min-width: 576px) and (max-width: 767.98px) { ... }

           @media (min-width: 666px) and (max-width: 867.98px) { ... }

           // Medium devices (tablets, 768px and up)
           @media (min-width: 768px) and (max-width: 991.98px) { ... }

           // Large devices (desktops, 992px and up)
           @media (min-width: 992px) and (max-width: 1199.98px) { ... }

           // Extra large devices (large desktops, 1200px and up)
           @media (min-width: 1200px) { ... }
           .btn-xl {
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 10px;
    background-color:red;
    width:20%;
}
    </style>
    <script type="text/javascript">
        window.onload = function() 
        {   
            AHUData(); 
            
        };

    </script>
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">Capital Cyberscapes</span>
                <!-- <div class="Logo">
                    <span class="CmpNm"> <img src="<?php echo base_url(); ?>/asset/prkhospitalasset/Images/wenalytics logo.png" width="180" height="50" class="HdrImg Footfall" /></span>
                </div> -->
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard">
                            <li>
                                <a href="#fmdiv2" class="Lnk Actv chlr"><span class="Txt">AHU</span></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl" id="reportsInnerId">
                            <li>
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">AHU Reports</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid">
                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>CapitalCyberscapes/getGraphReport" class="Lnk"><span class="Txt">AHU Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>CapitalCyberscapes/getRunnHrsReport" class="Lnk"><span class="Txt">AHU Running Report</span></a>
                                    </li>
                                </ul>

                            </li>
                            
                           
                        </ul>
                    </li>                
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/capitalheader');?>
       <input type="hidden" name="date" id="date" value="<?php  echo date('Y-m-d');?>">
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- chillers code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl chlr">AHU</span>
                    <span class="SctnVw Cllps FA" id="flowcollapse"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="flowmeters">
                    
                </div>

            </div>

            
            
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
        if($( "#flowmeters" ).is( ":hidden" ) &&  $( "#cooltowers" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" )  )
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

    $('#dgsetouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#dgsetinnerid").toggle();
          
    });
    $('#dshbrdMasterId').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#hidedashboard").toggle();
          
    });
    $('#reportsOuterId').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#reportsInnerId").toggle();
          
    });
    $('#emouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#eminnerid").toggle();
          
    });
    $('#cltrouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#cltrinnerid").toggle();
          
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="<?php echo base_url(); ?>asset/capitalspasset/CSS/SliderCSS.css" rel="stylesheet" />


<script type="text/javascript">
function AHUData(){

 // var meter_names = document.getElementById("boilers").value;
  var date = document.getElementById("date").value;
  //var meters = meter_names.split(",");
  //console.log(meters);console.log(date);
  for (var i = 0; i < 1; i++) {
    var urlString = "getHvacData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: 'OYO 2nd Floor',date:date},
        success: function(data){
          console.log("success"+data);
          appendAHUData(data);
        }
      });

  }

}
var ahu="";
function appendAHUData(data){
    var d = JSON.parse(data);

ahu+='<div class="bxslider" id="dgset">'; 
var sts,colr,onoff;
if(parseFloat(d[0]['Set_Temp'])>parseFloat(d[0]['Return Air Temp'])){
    if(d[0]['Unit_Status']==1){
        sts='ON';
        colr='green';
    }else{
        sts="OFF";
        colr='red';
    }
        ahu+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>OYO SecondFloor </b></span><span class="SctnTtl"><button type="button"  style="padding: 10px 20px;    font-size: 12px;    border-radius: 10px;   background-color:'+colr+';    width:70px;color:#fff;margin-left:80px;">'+sts+'</button></span><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Status</div><div class="ClRgt">'+sts+'</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d[0]['RunnHrs']+'</div></li><li><div class="ClLft">SupplyAirTemp</div><div class="ClRgt">'+d[0]['Supply Air Temp']+'<span></span></div></li><li><div class="ClLft">SupplyWaterTemp</div><div class="ClRgt">'+d[0]['CW Sup Temp']+'<span></span></div></li><li><div class="ClLft">ActuatorLevel</div><div class="ClRgt">NA</div></li><li><div class="ClLft">FilterPressure</div><div class="ClRgt">NA</div></li></ul></div><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Set Temp</div><div class="ClRgt">'+d[0]['Set_Temp']+'</div></li><li><div class="ClLft">ReturnAirTemp</div><div class="ClRgt">'+d[0]['Return Air Temp']+'</div></li><li><div class="ClLft">ReturnWaterTemp</div><div class="ClRgt">'+d[0]['CH Ret Temp']+'<span></span></div></li><li><div class="ClLft">VFDControl</div><div class="ClRgt">NA<span></span></div></li><li><div class="ClLft">Blockage</div><div class="ClRgt">NA</div></li></ul></div></div></div></div></div>';
     }else{
        if(d[0]['Unit_Status']==1){
        sts='ON';
        colr='green';
    }else{
        sts="OFF";
        colr='red';
    }
         ahu+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>OYO SecondFloor </b></span><span class="SctnTtl"><button type="button"  style="padding: 10px 20px;    font-size: 12px;    border-radius: 10px;   background-color:'+colr+';    width:70px;color:#fff;margin-left:80px;">'+sts+'</button></span><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Status</div><div class="ClRgt">'+sts+'</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d[0]['RunnHrs']+'</div></li><li><div class="ClLft">SupplyAirTemp</div><div class="ClRgt">'+d[0]['Supply Air Temp']+'<span></span></div></li><li><div class="ClLft">SupplyWaterTemp</div><div class="ClRgt">'+d[0]['CW Sup Temp']+'<span></span></div></li><li><div class="ClLft">ActuatorLevel</div><div class="ClRgt">NA</div></li><li><div class="ClLft">FilterPressure</div><div class="ClRgt">NA</div></li></ul></div><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Set Temp</div><div class="ClRgt">'+d[0]['Set_Temp']+'</div></li><li><div class="ClLft">ReturnAirTemp</div><div class="ClRgt">'+d[0]['Return Air Temp']+'</div></li><li><div class="ClLft">ReturnWaterTemp</div><div class="ClRgt">'+d[0]['CH Ret Temp']+'<span></span></div></li><li><div class="ClLft">VFDControl</div><div class="ClRgt">NA<span></span></div></li><li><div class="ClLft">Blockage</div><div class="ClRgt">NA</div></li></ul></div></div></div></div></div>';
     }
  
 ahu+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Sample Data </b></span><span class="SctnTtl"><button type="button"  style="padding: 10px 20px;    font-size: 12px;    border-radius: 10px;   background-color:red;    width:70px;color:#fff;margin-left:80px;">OFF</button></span><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Status</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">02:00:00</div></li><li><div class="ClLft">SupplyAirTemp</div><div class="ClRgt">'+d[0]['Supply Air Temp']+'<span></span></div></li><li><div class="ClLft">SupplyWaterTemp</div><div class="ClRgt">'+d[0]['CW Sup Temp']+'<span></span></div></li><li><div class="ClLft">ActuatorLevel</div><div class="ClRgt">NA</div></li><li><div class="ClLft">FilterPressure</div><div class="ClRgt">NA</div></li></ul></div><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Set Temp</div><div class="ClRgt">'+d[0]['Set_Temp']+'</div></li><li><div class="ClLft">ReturnAirTemp</div><div class="ClRgt">'+d[0]['Return Air Temp']+'</div></li><li><div class="ClLft">ReturnWaterTemp</div><div class="ClRgt">'+d[0]['CH Ret Temp']+'<span></span></div></li><li><div class="ClLft">VFDControl</div><div class="ClRgt">NA<span></span></div></li><li><div class="ClLft">Blockage</div><div class="ClRgt">NA</div></li></ul></div></div></div></div></div>';
 ahu+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Sample Data </b></span><span class="SctnTtl"><button type="button"  style="padding: 10px 20px;    font-size: 12px;    border-radius: 10px;   background-color:red;    width:70px;color:#fff;margin-left:80px;">OFF</button></span><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Status</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">02:00:00</div></li><li><div class="ClLft">SupplyAirTemp</div><div class="ClRgt">'+d[0]['Supply Air Temp']+'<span></span></div></li><li><div class="ClLft">SupplyWaterTemp</div><div class="ClRgt">'+d[0]['CW Sup Temp']+'<span></span></div></li><li><div class="ClLft">ActuatorLevel</div><div class="ClRgt">NA</div></li><li><div class="ClLft">FilterPressure</div><div class="ClRgt">NA</div></li></ul></div><div class="col-sm-4" style="background-color:lavender;width: 50%"><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling</div><div class="ClRgt">OFF</div></li><li><div class="ClLft">Set Temp</div><div class="ClRgt">'+d[0]['Set_Temp']+'</div></li><li><div class="ClLft">ReturnAirTemp</div><div class="ClRgt">'+d[0]['Return Air Temp']+'</div></li><li><div class="ClLft">ReturnWaterTemp</div><div class="ClRgt">'+d[0]['CH Ret Temp']+'<span></span></div></li><li><div class="ClLft">VFDControl</div><div class="ClRgt">NA<span></span></div></li><li><div class="ClLft">Blockage</div><div class="ClRgt">NA</div></li></ul></div></div></div></div></div>';
 //$('#ahudata').append(div);
 ahu+='</div>'; 
         $('#flowmeters').append(ahu);
         $('.bxslider').bxSlider({
        slideWidth: 440,
        minSlides: 1,
        maxSlides: 30,
        slideMargin: 10
    });
         //$("p:first").addClass("intro");

}








</script>


</html>