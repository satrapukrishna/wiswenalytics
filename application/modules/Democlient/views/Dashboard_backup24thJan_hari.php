<!-- firepump dashboard on 8th jan backup-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/fairmontasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/fairmontasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/SliderCSS.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/StyleSheet.css" rel="stylesheet" />
    <!-- <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" /> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/fairmontasset/Scripts/jquery.easing.1.3.js"></script>
   
    <script src="<?php echo base_url(); ?>asset/fairmontasset/Scripts/JavaScript.js"></script>
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
            fetchAllData();
        };
        function fetchAllData()
        {
            // $('.bxslider').bxSlider();
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            // console.log(today);
             
            var urlString = "<?php echo base_url();?>MyVihanga/getMyhomeData";
            $.ajax({
                url:urlString,
                type : 'GET',
                async: true,
                data: {date:today},
                success: function(data){
                  console.log("myhomedata"+data);
                  displayAlData(data);
                }
            });
        }

        function displayAlData(data)
        {
            var d = JSON.parse(data);
            var firstasgnsldr=d[0]['UtilityName'];
            var item="";
            var c=0;

            for (var i = 0; i < d.length; i++)
            {
                
                if(d[i]['UtilityName']=='Volume_DT 1-4/27-20')
                {   
                    if(c==0)
                    {
                        item+='<div class="bxslider" id="bxid">';
                    } 
                    c++;
                    item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)*6+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</div></li></ul></div></div></div></div>';
                    item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)*6+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</div></li></ul></div></div></div></div>';
                    item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)*6+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</div></li></ul></div></div></div></div>';
                    
                    
                } 
            }
            $('#alltank').append(item);
            $('.bxslider').bxSlider({
                slideWidth: 490,
                minSlides: 2,
                maxSlides: 30,
                slideMargin: 10
            });

        }
    </script>
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">Fair Mont</span>
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
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/chillerRunReport" class="Lnk Actv"><span class="Txt">Chiller Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/chillerGraphReport" class="Lnk"><span class="Txt">Chiller Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="" class="Lnk Arr" id="cltrouterid"><span class="Txt">Cooling Towers Reports</span></a>
                                <ul class="ThrdLvl" id="cltrinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/coolingRunReport" class="Lnk Actv"><span class="Txt">Cooling Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/coolingGraphReport" class="Lnk"><span class="Txt">Cooling Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="eminnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/firepumpRunReport" class="Lnk"><span class="Txt">FirePump Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/firepumpGraphReport" class="Lnk Actv"><span class="Txt">FirePump Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>                
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/fairmontheader');?>
       <input type="hidden" name="date" id="date" value="<?php  echo date('Y-m-d');?>">
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- Iaq code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl chlr">IAQ</span>
                    <span class="SctnVw Cllps FA" id="flowcollapse"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="flowmeters">
                    
                </div>

            </div>
            <!-- Iaq code ends -->

            <!-- waterlevel code starts -->
            <!-- <div class="DshBrdSctn">
                    <div class="DshBrdSctnTtl" id="fmdiv2">
                        <span class="TxtTtl chlr">Chillers</span>
                        <span class="SctnVw Cllps FA" id="flowcollapse"></span>
                        <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                    </div>
                    <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="flowmeters">
                        
                    </div>

                </div> -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="wldiv2">
                    <span class="TxtTtl chlr">Water Tank Levels</span>
                    <span class="SctnVw Cllps FA" id="wlcollapse"></span>
                    
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="alltank">
                    
                </div>
            </div>

            <!-- waterlevel code ends -->

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
                        <!-- <span class="MtrVl">100 Kgs</span> -->
                    </div>
                   
                    <div class="childclass1"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl">Diesel Pump</span><div class="DGCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Diesel Generator</div><div class="ClRgt">ON</div></li><li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">NA Ltrs</div></li><li><div class="ClLft">Running Time</div><div class="ClRgt">NAhours</div></li><li><div class="ClLft">Fuel Add</div><div class="ClRgt">NA Ltrs</div></li><li><div class="ClLft">Available Fuel</div><div class="ClRgt">NA Ltrs</div></li><li><div class="ClLft">Fuel Removed</div><div class="ClRgt">NA</div></li></ul></div><div class="DGCol-2"><div class="LiquidTank1 Smll"><div class="Liquid1 l-70"></div></div></div> <div class="DGCol-3"> <div class="LiquidTank1 Smll"><div class="Liquid1 Low"></div><div class="Liquid1 Medium"></div><div class="Liquid1 High"></div><span class="LowTxt">Low</span><span class="MedTxt">Medium</span><span class="HghTxt">High</span></div></div></div></div></div></div>
                                     
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

    $('#wlcollapse').click(function(event) 
    {
        if($( "#alltank" ).is( ":visible" ))
        {
            $('#alltank').toggle(); 
            $("#wlcollapse").addClass("Expnd");
        }
        else if($( "#alltank" ).is( ":hidden" ))
        {
            $('#alltank').toggle(); 
            $("#wlcollapse").removeClass("Expnd");
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
<link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/SliderCSS.css" rel="stylesheet" />


<script type="text/javascript">


function FirepumpData()
{
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

function appendFirepumpDataData(data)
{
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
  
    if(d[0]["SwitchStatus"]=='OFF')
    {
        $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts off');
    }
    else if(d[0]["SwitchStatus"]=='Manual')
    {
        $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Manual');
    }
    else if(d[0]["SwitchStatus"]=='NA')
    {
        $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Manual');
    }
    else
    {
        $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Auto');
    }

    if(d[1]["SwitchStatus"]=='OFF')
    {
        $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts off');
    
    }
    else if(d[1]["SwitchStatus"]=='Manual')
    {
        $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Manual');
    }
    else if(d[1]["SwitchStatus"]=='NA')
    {
        $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Manual');
    }
    else
    {
        $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Auto');
    }

    if(d[2]["SwitchStatus"]=='OFF')
    {
        $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts off');
    }
    else if(d[2]["SwitchStatus"]=='Manual')
    {
        $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Manual');
    }
    else if(d[2]["SwitchStatus"]=='NA')
    {
        $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Manual');
    }
    else{
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
            to: 10,
            color: '#436ce8',
            thickness: '40%'
        },
        {
            from: 10,
            to: 13,
            color: '#de6a66',
            thickness: '40%'
        },
        {
            from: 13,
            to: 15,
            color: '#ed1313',
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
            text: 'Pressure'
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