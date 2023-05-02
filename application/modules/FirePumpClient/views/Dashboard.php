<!-- firepump dashboard on 8th jan backup-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/spinfocityasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/spinfocityasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>asset/spinfocityasset/CSS/SliderCSS.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url(); ?>asset/spinfocityasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/spinfocityasset/Scripts/jquery.easing.1.3.js"></script>
   
    <script src="<?php echo base_url(); ?>asset/spinfocityasset/Scripts/JavaScript.js"></script>
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
    </style>
    <script type="text/javascript">
        window.onload = function() 
        {   
            ChillersData(); 
            CoolingTowersData(); 
            FirepumpData();
        };

    </script>
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">SP Infocity</span>
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
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl" id="reportsInnerId">
                            <li>
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">Chillers Reports</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>FirePumpClient/chillerRunReport" class="Lnk Actv"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>FirePumpClient/chillerGraphReport" class="Lnk"><span class="Txt">Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="" class="Lnk Arr" id="cltrouterid"><span class="Txt">Cooling Towers Reports</span></a>
                                <ul class="ThrdLvl" id="cltrinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>FirePumpClient/coolingRunReport" class="Lnk Actv"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>FirePumpClient/coolingGraphReport" class="Lnk"><span class="Txt">Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="eminnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>FirePumpClient/firepumpRunReport" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>FirePumpClient/firepumpGraphReport" class="Lnk Actv"><span class="Txt">Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>                
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/nclientheader');?>
       <input type="hidden" name="date" id="date" value="<?php  echo date('Y-m-d');?>">
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- chillers code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl chlr">Chillers</span>
                    <span class="SctnVw Cllps FA" id="flowcollapse"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="flowmeters">
                    
                </div>

            </div>

            <!-- chillers code ends -->
            <!-- cooling towers code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="cooltwrdiv2">
                    <span class="TxtTtl cooltwr">Cooling Towers</span>
                    <span class="SctnVw Cllps FA" id="cltowercollapse"></span>                   
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="cooltowers">
                    
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
                                Switch Status
                            </th>
                            <th class="Col-3">
                                Running Status
                            </th>
                            <th class="Col-4">
                                Today
                            </th>
                            <th class="Col-5">
                                Yesterday
                            </th>
                            <th class="Col-6">
                                Last Week
                            </th>
                        </tr>
                         <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Hydrant Jockey Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                
                                <span class="Txt Stts Manual">NA</span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Manual">NA</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">NA hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">NA</span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">NA</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Sprinkler Jockey Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                              <span class="Txt Stts Auto" id="sjss"></span>
                            </td>
                             <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Off" id="sjrs"></span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt" id="sjrht"></span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt" id="sjrhy"></span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt" id="sjrhl"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Main Hydrant Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Manual" id="mhss">NA</span>
                            </td>
                             <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Off" id="mhrs"></span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt" id="mhrht"></span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt" id="mhrhy"></span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt" id="mhrhl"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Main Sprinkler Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Manual" id="msss">NA</span>
                            </td>
                             <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Off" id="msrs"></span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt" id="msrht"></span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt" id="msrhy"></span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt" id="msrhl"></span>
                            </td>
                        </tr>
                        
                    </table>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 01</span>
                        <div id="container-speed" style="width:300px; height: 200px; float: left"></div>
                        <!-- <div id="container-rpm" style="width: 300px; height: 100px; float: left"></div> -->
                        <span class="MtrVl">100 Kgs</span>
                    </div>
                   
                    <div class="childclass1"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl">Diesel Pump</span><div class="DGCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Diesel Generator</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">NA Ltrs</div></li><li><div class="ClLft">Running Time</div><div class="ClRgt">NAhours</div></li><li><div class="ClLft">Fuel Add</div><div class="ClRgt">NA Ltrs</div></li><li><div class="ClLft">Available Fuel</div><div class="ClRgt">NA Ltrs</div></li><li><div class="ClLft">Fuel Removed</div><div class="ClRgt">NA</div></li></ul></div><div class="DGCol-2"><div class="LiquidTank Smll"><div class="Liquid l-70"></div></div></div> <div class="DGCol-3"> <div class="LiquidTank Smll"><div class="Liquid Low"></div><div class="Liquid Medium"></div><div class="Liquid High"></div><span class="LowTxt">Low</span><span class="MedTxt">Medium</span><span class="HghTxt">High</span></div></div></div></div></div></div>
                                     
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
<link href="<?php echo base_url(); ?>asset/spinfocityasset/CSS/SliderCSS.css" rel="stylesheet" />


<script type="text/javascript">
function ChillersData(){

 // var meter_names = document.getElementById("boilers").value;
  var date = document.getElementById("date").value;
  //var meters = meter_names.split(",");
  //console.log(meters);console.log(date);
  for (var i = 0; i < 1; i++) {
    var urlString = "getChillerData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: 'Chiller_4',date:date},
        success: function(data){
          console.log("success"+data);
          appendChillersData(data);
        }
      });

  }

}
function CoolingTowersData(){

 // var meter_names = document.getElementById("boilers").value;
  var date = document.getElementById("date").value;
  //var meters = meter_names.split(",");
  //console.log(meters);console.log(date);
  for (var i = 0; i < 1; i++) {
    var urlString = "getCoolingData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: 'CT Fan',date:date},
        success: function(data){
          console.log("success"+data);
          appendCoolingTowersData(data);
        }
      });

  }

}
function FirepumpData(){
   // var meter_names = document.getElementById("boilers").value;
  //var date = document.getElementById("date").value;
  //var meters = meter_names.split(",");
  //console.log(meters);console.log(date);

    var urlString = "dashBoardData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
       // data: {meter: 'CT Fan',date:date},
        success: function(data){
          console.log("success"+data);
          appendFirepumpDataData(data);
        }
      });

   

}
function appendFirepumpDataData(data){
        var d = JSON.parse(data);
// sjss
// sjrht
// sjrhy
// sjrhl
// mhss
// mhrs
// mhrht
// mhrhy
// mhrhl
// msss
// msrs
// msrht
// msrhy
// msrhl
//alert($('#sjrs').attr('class'));

       
         if(d[0]["SwitchStatus"]=='OFF'){
           $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts off');
         }else if(d[0]["SwitchStatus"]=='Manual'){
            $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[0]["SwitchStatus"]=='NA'){
            $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Auto');
        }

        if(d[1]["SwitchStatus"]=='OFF'){
           $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts off');
         }else if(d[1]["SwitchStatus"]=='Manual'){
            $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[1]["SwitchStatus"]=='NA'){
            $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Auto');
        }

        if(d[2]["SwitchStatus"]=='OFF'){
           $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts off');
         }else if(d[2]["SwitchStatus"]=='Manual'){
            $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[2]["SwitchStatus"]=='NA'){
            $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Auto');
        }
        //runnstatus
        if(d[0]["RunningStatus"]==0){
            $('#sjrs').removeClass($('#sjrs').attr('class')).addClass('Txt Stts off');
        }else{
            $('#sjrs').removeClass($('#sjrs').attr('class')).addClass('Txt Stts on');
        }
        if(d[1]["RunningStatus"]==0){
            $('#mhrs').removeClass($('#mhrs').attr('class')).addClass('Txt Stts off');
        }else{
            $('#mhrs').removeClass($('#mhrs').attr('class')).addClass('Txt Stts on');
        }
        if(d[2]["RunningStatus"]==0){
            $('#msrs').removeClass($('#msrs').attr('class')).addClass('Txt Stts off');
        }else{
            $('#msrs').removeClass($('#msrs').attr('class')).addClass('Txt Stts on');
        }

        
        $("#sjrht").text(d[0]["TodayRunn"]*12+(' Min'));
        $("#sjrhy").text(d[0]["YesterdayRunn"]*12+(' Min'));
        $("#sjrhl").text(d[0]["LastWeekRunn"]*12+(' Min'));

        $("#mhrht").text(d[1]["TodayRunn"]*12+(' Min'));
        $("#mhrhy").text(d[1]["YesterdayRunn"]*12+(' Min'));
        $("#mhrhl").text(d[1]["LastWeekRunn"]*12+(' Min'));

        $("#msrht").text(d[2]["TodayRunn"]*12+(' Min'));
        $("#msrhy").text(d[2]["YesterdayRunn"]*12+(' Min'));
        $("#msrhl").text(d[2]["LastWeekRunn"]*12+(' Min'));


        
}
var chitem="";
function appendChillersData(data)
{
var d = JSON.parse(data);
chitem+='<div class="bxslider" id="dgset">'; 
    if(d['status']==0){
         chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>'+d['meter']+' </b></span><span class="SctnTtl"><b>Live Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Chiller Status</div><div class="ClRgt"><span class="Txt Stts Off">OFF</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d['RunningHours']+'</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">NA<span>&#8451;</span></div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">NA<span>&#8451;</span></div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">NA Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">NA Pa.</div></li></ul></div></div></div></div>';
    }else{
        chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>'+d['meter']+' </b></span><span class="SctnTtl"><b>Live Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Chiller Status</div><div class="ClRgt"><span class="Txt Stts auto">ON</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d['RunningHours']+'</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">NA<span>&#8451;</span></div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">NA<span>&#8451;</span></div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">NA Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">NA Pa.</div></li></ul></div></div></div></div>';
    }
    // chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>'+d['meter']+' </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Chiller Status</div><div class="ClRgt"><span class="Txt Stts on">on</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d['RunningHours']+'</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">NA<span>&#8451;</span></div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">NA<span>&#8451;</span></div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">NA Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">NA Pa.</div></li></ul></div></div></div></div>';
   
    chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Chiller -02 </b></span><span class="SctnTtl"><b>Sample Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Chiller Status</div><div class="ClRgt"><span class="Txt Stts auto">ON</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">18 Mins</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">18<span>&#8451;</span></div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">8<span>&#8451;</span></div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">12 Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">11 Pa.</div></li></ul></div></div></div></div>';
    chitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Chiller -03 </b></span><span class="SctnTtl"><b>Sample Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Chiller Status</div><div class="ClRgt"><span class="Txt Stts auto">ON</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">2Hours30Mins</div></li><li><div class="ClLft">InletWaterTemp</div><div class="ClRgt">18<span>&#8451;</span></div></li><li><div class="ClLft">OutletWaterTemp</div><div class="ClRgt">8<span>&#8451;</span></div></li><li><div class="ClLft">InletWaterPressure</div><div class="ClRgt">12 Pa.</div></li><li><div class="ClLft">OutletWaterPressure</div><div class="ClRgt">11 Pa.</div></li></ul></div></div></div></div>';
    
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
function appendCoolingTowersData(data)
{
   var d = JSON.parse(data);
    coolitem+='<div class="bxslider" id="dgset">'; 
    if(d['status']==0){
        coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>'+d['meter']+' </b></span><span class="SctnTtl"><b>Live Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling Status</div><div class="ClRgt"><span class="Txt Stts Off">OFF</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d['RunningHours']+'</div></li></ul></div></div></div></div>';
    }else{
         coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>'+d['meter']+' </b></span><span class="SctnTtl"><b>Live Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling Status</div><div class="ClRgt"><span class="Txt Stts auto">ON</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">'+d['RunningHours']+'</div></li></ul></div></div></div></div>';
    }
    // coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Cooling Tower-01 </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling Status</div><div class="ClRgt"><span class="Txt Stts Off">Off</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">2Hours30Mins</div></li></ul></div></div></div></div>';
    coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Cooling Tower-01 </b></span><span class="SctnTtl"><b>Sample Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling Status</div><div class="ClRgt"><span class="Txt Stts auto">ON</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">NA Mins</div></li></ul></div></div></div></div>';
    coolitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl"><b>Cooling Tower-01 </b></span><span class="SctnTtl"><b>Sample Data </b></span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Cooling Status</div><div class="ClRgt"><span class="Txt Stts Off">OFF</span></div></li><li><div class="ClLft">Running Hours</div><div class="ClRgt">NA Mins</div></li></ul></div></div></div></div>';
    
    
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

//highchart
var H = Highcharts;
var each = H.each,
  merge = H.merge,
  pInt = H.pInt,
  pick = H.pick,
  isNumber = H.isNumber;


Highcharts.seriesTypes.gauge.prototype.translate = function() {
  var series = this,
    yAxis = series.yAxis,
    options = series.options,
    center = yAxis.center;

  series.generatePoints();

  each(series.points, function(point) {

    var dialOptions = merge(options.dial, point.dial),
      isRectanglePoint = point.series.userOptions.isRectanglePoint,
      radius = (pInt(pick(dialOptions.radius, 80)) * center[2]) / 200,
      baseLength = (pInt(pick(dialOptions.baseLength, 70)) * radius) / 100,
      rearLength = (pInt(pick(dialOptions.rearLength, 10)) * radius) / 100,
      baseWidth = dialOptions.baseWidth || 3,
      topWidth = dialOptions.topWidth || 1,
      overshoot = options.overshoot,
      rotation = yAxis.startAngleRad + yAxis.translate(point.y, null, null, null, true);

    // Handle the wrap and overshoot options
    if (isNumber(overshoot)) {
      overshoot = overshoot / 180 * Math.PI;
      rotation = Math.max(yAxis.startAngleRad - overshoot, Math.min(yAxis.endAngleRad + overshoot, rotation));

    } else if (options.wrap === false) {
      rotation = Math.max(yAxis.startAngleRad, Math.min(yAxis.endAngleRad, rotation));
    }
   

    rotation = rotation * 180 / Math.PI;

    // Checking series to draw dots
    if (isRectanglePoint) {  //draw new dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
           'M', -rearLength + 6, (-baseWidth / 2), 'L', -rearLength + 12, (-baseWidth / 2) + 6, -rearLength +6, (-baseWidth / 2) + 12, -rearLength, (-baseWidth / 2) + 6, 'z'
        ],
        translateX: center[0] - baseWidth - 1,
        translateY: center[1],
        rotation: rotation,
        style: 'stroke: white; stroke-width: 2;'
      };

    } else {  //draw standard dial
      point.shapeType = 'path';
      point.shapeArgs = {
        d: dialOptions.path || [
          'M', -rearLength, -baseWidth / 2,
          'L',
          baseLength, -baseWidth / 2,
          radius, -topWidth / 2,
          radius, topWidth / 2,
          baseLength, baseWidth / 2, -rearLength, baseWidth / 2,
          'z'
        ],
        translateX: center[0],
        translateY: center[1],
        rotation: rotation
      };

    }

    // Positions for data label
    point.plotX = center[0];
    point.plotY = center[1];


  });
}; // end of replaced function

var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '85%'],
        size: '160%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'solid'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
                plotBands: [{
            from: 0,
            to: 4,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 4,
            to: 5,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 5,
            to: 6.5,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 6.5,
            to: 8,
            color: '#0e630e',
            thickness: '40%'
        },
        {
            from: 8,
            to: 8.5,
            color: '#ebddb9',
            thickness: '40%'
        },
        {
            from: 8.5,
            to: 15,
            color: '#6e94e6',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,15],
        tickAmount: 1,
        min: 0,
        max: 15,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
            },
                      marker: {
            enabled: true,
            symbol: 'triangle',
            }
        },
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
    yAxis: {
        title: {
            text: 'Speed'
        },
    },

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            data: [0],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [8],
      dial: {
        // backgroundColor: Highcharts.getOptions().colors[1],
        rearLength: '10%'
      },
      dataLabels: {
        enabled: true
      },
      pivot: {
        radius: 0
      }
    }
  ]

}));




</script>


</html>