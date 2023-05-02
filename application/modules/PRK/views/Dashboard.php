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
    <link href="<?php echo base_url(); ?>asset/demoforall/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/demoforall/CSS/simplebar.css" rel="stylesheet" />

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
    <script src="<?php echo base_url(); ?>asset/Jquery/bundle.js"></script>
     <script src="<?php echo base_url(); ?>asset/Jquery/simplebar.min.js"></script>

    <!-- highchart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>

        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <!-- end highchart -->
<script src="https://cdn.jsdelivr.net/npm/moment@2/moment.min.js"></script>

</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">PRK HOSPITALS</span>
            </div>
              <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct WtrTnk" href="#" id="dshbrdMasterId"><span id="wldiv2" class="Lnk Arr Slct DshBrdLnk">Water</span></a>
                        <ul class="ScndLvl" id="hidedashboard" style="display: none;">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv WtrTnkLevel"><span class="Txt">Water Level</span></a>
                            </li>
                           <!-- <li>
                                <a href="#fmdiv2" class="Lnk MunLineMenu"><span class="Txt">Municipal Line</span></a>
                            </li>-->
                           <!-- <li>
                                <a href="#dgdiv2" class="Lnk Watertankmenu"><span class="Txt">Water Tankers</span></a>
                            </li>-->
                            <li>
                                <a href="#dgdiv2" class="Lnk Borewellmenu"><span class="Txt">Bore Wells</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk FrPmp"><span class="Txt">Fire Pumps</span></a>
                            </li>
                           
                        </ul>
                    </li>

                    <li >
                        <a class="Lnk Arr Slct EnrgMtr" href="#" id="dshbrdEnergyId"><span id="dsh" class="Lnk Arr Slct DshBrdLnk">Energy</span></a>
                        <ul class="ScndLvl" id="hideenergy" style="display: none;">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv Energymetermenu"><span class="Txt">Energy Meters</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk DGSt"><span class="Txt">DG</span></a>
                            </li>
                           <!-- <li>
                                <a href="#dgdiv2" class="Lnk upsmenu"><span class="Txt">UPS</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk LPGCnn"><span class="Txt">LPG</span></a>
                            </li>-->
                           
                        
                        </ul>
                    </li>

                  <!--   <li >
                        <a class="Lnk Arr Slct airmenu" href="#" id="dshbrdAirId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Air</span></a>
                        <ul class="ScndLvl" id="hideair" style="display: none;">

                            <li>
                                <a href="#dgdiv2" class="Lnk Indoormenu"><span class="Txt">Indoor Air Quality</span></a>
                            </li>
                            <li>
                                <a href="#wldiv2" class="Lnk ahusmenu"><span class="Txt">AHU's</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk chillermenu"><span class="Txt">Chillers</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk coolingmenu"><span class="Txt">Cooling Towers</span></a>
                            </li>
                        
                        
                            <li>
                                <a href="#dgdiv2" class="Lnk washroommenu"><span class="Txt">Washrooms</span></a>
                            </li>
                        
                        </ul>
                    </li>


                     <li >
                        <a class="Lnk light_menu" href="#" id="dshbrdLightId"><span id="dsh" class="Lnk">Light</span></a>
                       
                    </li>-->
                   
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/demoheader');?>


       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">

            <!-- Water tank level code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="wldiv2">
                    <span class="TxtTtl WtrTnk">Water Levels</span>

                    <span class="SctnVw Cllps FA" id="waterlevel"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                    <span class="reports_menu">Reports<img src="<?php echo base_url(); ?>asset/demoforall/Images/reports.png"></span>
                    
                   
                </div>
                <div class="DshBrdSctnDtls" id="alltank">
                    
                </div>
            </div>

            <!-- Water tank level code ends -->
             <!-- Municipal Water code starts 
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="mwdiv2">
                    <span class="TxtTtl MunWater imageadd">Municipal Line</span>

                    <span class="SctnVw Cllps" id="Mucollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd" id="">

                <div class="content_left">
                    <span class="content_left_title">Municipal Line</span>
                    <div class="content_left_inner">
                        
                        <div class="childclass">
                        <div class="SctnDtlsHldr">
                        <div class="SldrCntnr">
                        <div class="SctnDtls ErgyMtrHldr">                        
                        <span class="cont_left_img">
                        <img src="<?php echo base_url(); ?>asset/demoforall/Images/m_line_b.png">
                        </span>
                        <ul class="SctnDtlsGrdTbl">
                        <li><div class="ClLft">Today's Supply</div><div class="ClRgt"><span class="Txt" id="
                        mlt">400KL</span></div></li>
                        <li><div class="ClLft">Yesterday's Supply</div><div class="ClRgt" id="mly">450KL</div></li>
                        <li><div class="ClLft">Weekly Average</div><div class="ClRgt" id="mlw">322KL</div></li>
                        <li class="more_dets"><div class="ClLft">More Details</div></li>
                        </ul>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>

                </div>
                <div class="content_right"> <span><div id="container_graph"></div></span></div>
                    
                </div>
            </div>
            Municipal Water code ends -->
              <!-- Water Tanker code starts 
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="mwdiv2">
                    <span class="TxtTtl waterTank imageadd">Water Tankers</span>

                    <span class="SctnVw Cllps" id="Wtcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd" id="">

                <div class="content_left">
                
                    <div class="content_left_inner">
                        
                        <div class="childclass">
                        <div class="SctnDtlsHldr SctnDtlsadd">
                        <div class="SldrCntnr">
                        <div class="SctnDtls ErgyMtrHldr">
                        <ul class="SctnDtlsGrdTbl">

                        <li class="border_none"><div class="ClLft">Total Tankers</div><div class="ClRgt"><span class="Txt">23</span></div></li>
                        <li><div class="ClLft">Today's Water Supply</div><div class="ClRgt"><span class="Txt">125KL</span></div></li>
                        <li><div class="ClLft">Yesterday's Water Supply</div><div class="ClRgt">210KL</div></li>
                        <li><div class="ClLft">Weekly Water Supply</div><div class="ClRgt">173KL</div></li>
                        <li class="more_dets"><div class="ClLft">More Details</div></li>
                        </ul>
                        </div>
                        </div>
                        </div>
                        </div>

                    </div>

                </div>
                <div class="content_right cont_img_graph"> <span><div id="container_tank"></div></span></div>
                   
                    
                </div>
            </div>
            Water Tanker code ends -->



   <!-- Bore Wells code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="mwdiv2">
                    <span class="TxtTtl borewell imageadd">Bore Wells</span>

                    <span class="SctnVw Cllps" id="Bwcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="Bwmeter">
                    
                </div>
            </div>
            <!-- Bore Wells code ends -->
         


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
                                Switch Position
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
                                <span class="Txt Ttl">Jockey Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                 <span class="Txt Stts auto" id=""></span>
                               
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Manual" >NA</span>
                                
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">3 Mins</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">2 Mins</span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">15 Mins</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Sprinkler Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                              <span class="Txt Stts Mannual" id="">Manual</span>
                            </td>
                             <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Off" id=""></span>
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
                                <span class="Txt Ttl">Hydrant Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Off" id=""></span>
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
                        
                       
                        
                    </table>
                    <div class="EnrgyMtrGuge">

                        <span class="Ttl" style=" float: center">Pressure in Bar</span>
                        <div id="container-speed" style="width:300px; height: 200px; margin: 0 auto;">

                            
                        </div>
                        <!-- <div id="container-rpm" style="width: 300px; height: 100px; float: left"></div> -->
                        <!-- <span class="MtrVl">100 Kgs</span> -->
                    </div>
                   
                    <div class="childclass1" style="width: 50%">
                         <div  id="container_pressure">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div> 
                    </div>
                      <!-- DG Set code starts -->
                      <div class="fire_sub">
            <div class="fire_dgset">
               
                <div class="DshBrdSctnDtls" id="dgset">
                <div class="childclass">
                <div class="SctnDtlsHldr">
                <div class="SldrCntnr">
                <div class="SctnDtls DGGnrtrHldr">
               
                <div class="DGCol-1">
                <div class="SctnTtl_main"><span class="SctnTtl">Diesel Generator</span><span class="SctnTtl_buttn"><button>Add</button><button class="button_red">Off</button></span></div> 
                <ul class="SctnDtlsGrdTbl">
                <li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">0</div></li>
                <li><div class="ClLft">Running Time</div><div class="ClRgt">0</div></li>
                <li><div class="ClLft">Fuel Add</div><div class="ClRgt">0</div></li>
                <li><div class="ClLft">Available Fuel</div><div class="ClRgt">1000Ltr</div></li>
                <li><div class="ClLft">Fuel Removed</div><div class="ClRgt">0</div></li>
                 <li><div class="ClLft">Battery Voltage</div><div class="ClRgt">24 Volts</div></li>
                </ul>
                </div>
                <div class="DGCol-2">
                <div class="LiquidTank Smll">
                <div class="Liquid l-70">
                    
                </div>
                </div>
                </div> 
                <div class="DGCol-3"> 
                <div class="LiquidTank Smll">
                <div class="Liquid Low"></div>
                <div class="Liquid Medium">
                    
                </div>
                <div class="Liquid High"></div>
                <span class="LowTxt">Low</span>
                <span class="MedTxt">Medium</span><span class="HghTxt">High</span>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                
                </div>
            </div>

            <div class="fire_waterpump">
 <span class="SctnTtl">Fire Sump</span>
            <div>
            <div class="SctnDtlsHldr">
            <div class="SldrCntnr">
            <div class="SctnDtls WtrTnkLvl">
            <div class="TnksHldr">
            <div class="LftHldr">
            <div class="LiquidTank">
            <div class="Liquid Liquidhigh l"></div>
            </div>
            </div>
            <div class="RgtHldr">
            <div class="LiquidTank Smll">
            <div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'">
                
            </div>
            <span class="LiquidStatus">95%</span>
            </div>
            </div>
            </div>
           
            <ul class="SctnDtlsGrdTbl">
            <li><div class="ClLft">Total Capacity</div><div class="ClRgt">500KL</div></li>
            <li><div class="ClLft">Current Level</div><div class="ClRgt">375KL</div></li>
            <li><div class="ClLft">Filled</div><div class="ClRgt">95%</div></li>
            </ul>
            </div>
            </div>
            </div>
            </div>
                
            </div>

            </div>
            <div class="pump_details">
                 <table class="SctnDtlsDualGrd">
                        <tr>
                            <th class="Col-1">
                                Pumps
                            </th>
                            <th class="Col-2">
                                Pumps Capacity
                            </th>
                            <th class="Col-3">
                                Pressure Maintained
                            </th>
                            <th class="Col-4">
                                Cut in Pressure
                            </th>
                            <th class="Col-5">
                                Cut off Pressure
                            </th>
                           
                        </tr>
                         <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Jockey Pump</span>
                            </td>
                             <td class="Col-2">
                                
                                <span class="Txt" id="">10.8CU.M/HR/20HP</span>
                            </td>
                             <td class="Col-3">
                                
                                <span class="Txt" id="mhrs">8.5Kg/cm2</span>
                            </td>
                            <td class="Col-4">
                             
                                <span class="Txt" id="mhrht">6.5Kg/cm2</span>
                            </td>
                            <td class="Col-5">
                               
                                <span class="Txt Stts cutoff_color" id="mhrhy">6.5Kg/cm2</span>
                            </td>
                        
                           
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Hydrant Pump</span>
                            </td>
                           <td class="Col-2">
                                
                                <span class="Txt" id="">171CU.M/HR/100HP</span>
                            </td>
                             <td class="Col-3">
                                
                                <span class="Txt" id="mhrs">8.5Kg/cm2</span>
                            </td>
                            <td class="Col-4">
                             
                                <span class="Txt" id="mhrht">5Kg/cm2</span>
                            </td>
                            <td class="Col-5">
                               
                                <span class="Txt Stts Manual" id="mhrhy">Mannual</span>
                            </td>
                        
                           
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Sprinkler Pump</span>
                            </td>
                           <td class="Col-2">
                                
                                <span class="Txt" id="">171CU.M/HR/100HP</span>
                            </td>
                             <td class="Col-3">
                                
                                <span class="Txt" id="mhrs">8Kg/cm2</span>
                            </td>
                            <td class="Col-4">
                             
                                <span class="Txt" id="mhrht">5Kg/cm2</span>
                            </td>
                            <td class="Col-5">
                               
                                <span class="Txt Stts Manual" id="mhrhy">Mannual</span>
                            </td>
                        
                            
                        </tr>

                             <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Diesel Pump</span>
                            </td>
                            <td class="Col-2">
                                
                                <span class="Txt" id="">111 CU.M/HR/127HP</span>
                            </td>
                             <td class="Col-3">
                                
                                <span class="Txt" id="mhrs">8.5Kg/cm2</span>
                            </td>
                            <td class="Col-4">
                             
                                <span class="Txt" id="mhrht">4Kg/cm2</span>
                            </td>
                            <td class="Col-5">
                               
                                <span class="Txt Stts Manual" id="mhrhy">Mannual</span>
                            </td>
                        
                        </tr>
                        
                       
                        
                    </table>
            </div>
            <!-- DG Set code ends -->
                                     
                </div>
            </div>
            <!-- Fire pump code ends -->
            
        </div>
    </div>

</body>
<script type="text/javascript">
window.onload = function() {
    
    fetchAllData();
    //fetchDGSetData();
     FirepumpData();
     fetchMunWaterData();
     fetchWaterTankerData();
     fetchBoreWellData();
    fetchFlowMeterData();
    fetchEnergyMeterData();

};
$('.myMenu ul li').hover(function() {
    $(this).children('ul').stop(true, false, true).slideToggle(300);
});
//$("#flowmwter").css({"float":"500", "position":"30","width":"350px"});

    $('#waterlevel').click(function(event) 
    {
        if($( "#alltank" ).is( ":visible" ))
        {
            $('#alltank').toggle(); 
            $("#waterlevel").addClass("Expnd");
        }
        else if($( "#alltank" ).is( ":hidden" ))
        {
            $('#alltank').toggle(); 
            $("#waterlevel").removeClass("Expnd");
        }
    });


    

     $('#Mucollapse').click(function(event) 
    {

        if($( "#Mwmeter" ).is( ":visible" ))
        {
            $('#Mwmeter').toggle(); 
            $("#Mucollapse").addClass("Expnd");
        }
        else if($( "#Mwmeter" ).is( ":hidden" ))
        {
            $('#Mwmeter').toggle(); 
            $("#Mucollapse").removeClass("Expnd");
        }
        // $('#Mwmeter').toggle();  
        // $("#Mucollapse").addClass("Expnd");   
    });

$('#Wtcollapse').click(function(event) 
    {

        if($( "#Wtmeter" ).is( ":visible" ))
        {
            $('#Wtmeter').toggle(); 
            $("#Wtcollapse").addClass("Expnd");
        }
        else if($( "#Wtmeter" ).is( ":hidden" ))
        {
            $('#Wtmeter').toggle(); 
            $("#Wtcollapse").removeClass("Expnd");
        }
        // $('#Mwmeter').toggle();  
        // $("#Mucollapse").addClass("Expnd");   
    });

$('#Bwcollapse').click(function(event) 
    {

        if($( "#Bwmeter" ).is( ":visible" ))
        {
            $('#Bwmeter').toggle(); 
            $("#Bwcollapse").addClass("Expnd");
        }
        else if($( "#Bwmeter" ).is( ":hidden" ))
        {
            $('#Bwmeter').toggle(); 
            $("#Bwcollapse").removeClass("Expnd");
        }
        // $('#Mwmeter').toggle();  
        // $("#Mucollapse").addClass("Expnd");   
    });


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

    $('#dgcollapse').click(function(event) 
    {
        if($( "#dgset" ).is( ":visible" ))
        {
            $('#dgset').toggle(); 
            $("#dgcollapse").addClass("Expnd");
        }
        else if($( "#dgset" ).is( ":hidden" ))
        {
            $('#dgset').toggle(); 
            $("#dgcollapse").removeClass("Expnd");
        }
        // $('#dgset').toggle(); 
        // $("#dgcollapse").addClass("Expnd");       
    });
    $('#emcollapse').click(function(event) 
    {
        if($( "#emeter" ).is( ":visible" ))
        {
            $('#emeter').toggle(); 
            $("#emcollapse").addClass("Expnd");
        }
        else if($( "#emeter" ).is( ":hidden" ))
        {
            $('#emeter').toggle(); 
            $("#emcollapse").removeClass("Expnd");
        }
        // $('#emeter').toggle(); 
        // $("#emcollapse").addClass("Expnd"); 
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
    $('#lpgcollapse').click(function(event) 
    {
        if($( "#lpg" ).is( ":visible" ))
        {
            $('#lpg').toggle(); 
            $("#lpgcollapse").addClass("Expnd");
        }
        else if($( "#lpg" ).is( ":hidden" ))
        {
            $('#lpg').toggle(); 
            $("#lpgcollapse").removeClass("Expnd");
        }
        // $('#lpg').toggle();
        // $("#lpgcollapse").addClass("Expnd");       
    });
    $('#collapseall').click(function(event) 
    {
        if($( "#alltank" ).is( ":hidden" ) && $( "#Mwmeter" ).is( ":hidden" ) && $( "#Wtmeter" ).is( ":hidden" ) && $( "#Bwmeter" ).is( ":hidden" ) && $( "#flowmeters" ).is( ":hidden" ) && $( "#dgset" ).is( ":hidden" ) && $( "#emeter" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" ) && $( "#lpg" ).is( ":hidden" ) )
        {

            $('#alltank').toggle();$("#waterlevel").removeClass("Expnd");
            $('#Mwmeter').toggle();$("#Mucollapse").removeClass("Expnd");
            $('#Wtmeter').toggle();$("#Wtcollapse").removeClass("Expnd");
            $('#Bwmeter').toggle();$("#Bwcollapse").removeClass("Expnd");
            $('#flowmeters').toggle();$("#flowcollapse").removeClass("Expnd");
            $('#dgset').toggle();$("#dgcollapse").removeClass("Expnd");
            $('#emeter').toggle();$("#emcollapse").removeClass("Expnd");
            $('#fpump').toggle();$("#fpcollapse").removeClass("Expnd");
            $('#lpg').toggle();$("#lpgcollapse").removeClass("Expnd");
            // $("#lpgcollapse").addClass("Expnd");
            $("#collapseall").removeClass("SctnVwAll Expnd");
            $("#collapseall").addClass("SctnVwAll Cllps");
        } 
        else
        {
            $("#collapseall").addClass("SctnVwAll Expnd");
            if($( "#alltank" ).is( ":visible" ))
            {
                $('#alltank').toggle(); $("#waterlevel").addClass("Expnd");
            }
            else{}
            if($( "#Mwmeter" ).is( ":visible" ))
            { 
                $('#Mwmeter').toggle(); $("#Mucollapse").addClass("Expnd"); 
            }
             else{}
            if($( "#Wtmeter" ).is( ":visible" ))
            { 
                $('#Wtmeter').toggle(); $("#Wtcollapse").addClass("Expnd"); 
            }
             else{}
            if($( "#Bwmeter" ).is( ":visible" ))
            { 
                $('#Bwmeter').toggle(); $("#Bwcollapse").addClass("Expnd"); 
            }
             else{}
            if($( "#flowmeters" ).is( ":visible" ))
            { 
                $('#flowmeters').toggle(); $("#flowcollapse").addClass("Expnd"); 
            }
            else{}
            if($( "#dgset" ).is( ":visible" ))
            { 
                $('#dgset').toggle();  $("#dgcollapse").addClass("Expnd");
            }
            else{}
            if($( "#emeter" ).is( ":visible" ))
            {
                $('#emeter').toggle(); $("#emcollapse").addClass("Expnd");
            }
            else{}
            if($( "#fpump" ).is( ":visible" ))
            { 
                $('#fpump').toggle(); $("#fpcollapse").addClass("Expnd");
            }
            else{}
            if($( "#lpg" ).is( ":visible" ))
            { 
                $('#lpg').toggle(); $("#lpgcollapse").addClass("Expnd");
            }
            else{}

        }
                
    });

    // $('#eminnercollpaseall').click(function(event) 
    // {
    //     if($( "#alltank" ).is( ":hidden" ) && $( "#flowmeters" ).is( ":hidden" ) && $( "#dgset" ).is( ":hidden" ) && $( "#emeter" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" ) && $( "#lpg" ).is( ":hidden" ) )
    //     {

           
    //     } 
    //     else
    //     {
    //     }
                
    // });
    
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

     $('#dshbrdEnergyId').click(function(e) 
    {
        e.preventDefault();
        $("#hideenergy").toggle();  
    });
      $('#dshbrdAirId').click(function(e) 
    {
        e.preventDefault();
        $("#hideair").toggle();  
    });
       $('#dshbrdLightId').click(function(e) 
    {
        e.preventDefault();
        $("#hidelight").toggle();  
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
const currentMoment = moment().subtract(6, 'days');
const endMoment = moment().add(1, 'days');
var dar=[];
while (currentMoment.isBefore(endMoment, 'day')) {
 // console.log(`Loop at ${currentMoment.format('YYYY-MM-DD')}`);
  dar.push(currentMoment.format('YYYY-MM-DD'));
  currentMoment.add(1, 'days');

  
}
//alert(dar);
Highcharts.chart('container_graph', {
    
         chart: {

         height: 350,
         type: 'column'
    },
    title: {
        text: '<b>Total :</b> 2250KL        <b>Average :</b> 322KL'
    },
    xAxis: {
        categories: dar,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Liters'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Liters</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: ' ',
        data: [280,300,270,320,398,360,280]

    }]
});
Highcharts.chart('container_tank', {
    chart: {
        height: 250,
        type: 'column'
    },
    title: {
        text: '<b>Total :</b> 1215KL        <b>Average :</b> 173KL'
    },
    xAxis: {
         categories: dar,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Liters'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Liters</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: ' ',
        data: [280,300,270,320,398,360,280]

    }]
});
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
          //console.log("myhomedata"+data);
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

    for (var i = 0; i < 1; i++)
    {
        
        if(d[i]['UtilityName']!='Volume_CT 13-16')
       {   
            if(c==0)
            {
                item+='<div class="bxslider" id="bxid">';
            } 
            c++;
            item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)*6+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</div></li></ul></div></div></div></div>';
            item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)*6+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</div></li></ul></div></div></div></div>';
            item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid Liquidhigh l-'+(Math.round(((d[i]['Consumption'])/142000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)*6+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/142000)*100)+'%</div></li></ul></div></div></div></div>';
            // item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid Liquidhigh l-25"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid Liquidhigh l-25"></div><span class="LiquidStatus">25%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">26KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt"25%</div></li></ul></div></div></div></div>';
            // item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid Liquidhigh l-25"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid Liquidhigh l-25"></div><span class="LiquidStatus">25%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">26KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt"25%</div></li></ul></div></div></div></div>';
            //  item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid Liquidhigh l-25"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid Liquidhigh l-25"></div><span class="LiquidStatus">25%</span></div></div></div><span class="SctnTtl">Domestic Tank 1-4/17-20</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">26KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt"25%</div></li></ul></div></div></div></div>';
            
            
        } 
    }
   $('#alltank').append(item);
    $('.bxslider').bxSlider({
        slideWidth: 550,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });

}
var emitem="";
function fetchEnergyMeterData()
{
    emitem+='<div class="bxslider" >';
    emitem+='<div ><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 01</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
    emitem+='<div><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 02</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
    emitem+='<div><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 03</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
     emitem+='<div><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 03</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
    
        emitem+='</div>'; 
         $('#emeter').append(emitem);
         $('.bxslider').bxSlider({
        slideWidth: 550,       
        minSlides: 2,
        maxSlides: 30

    });

}
var mlitem="";
function fetchMunWaterData(){

    mlitem+='<div class="bxslider" >';
    mlitem+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls MuMtrHldr"><div class="MuMtrImgHldr"><img class="MuMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/Muwater.png" /></div><span class="SctnTtl">Municipal Line - 01</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    mlitem+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls MuMtrHldr"><div class="MuMtrImgHldr"><img class="MuMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/Muwater.png" /></div><span class="SctnTtl">Municipal Line - 02</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    mlitem+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls MuMtrHldr"><div class="MuMtrImgHldr"><img class="MuMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/Muwater.png" /></div><span class="SctnTtl">Municipal Line - 03</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    mlitem+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls MuMtrHldr"><div class="MuMtrImgHldr"><img class="MuMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/Muwater.png" /></div><span class="SctnTtl">Municipal Line - 04</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    
    
        mlitem+='</div>'; 
         $('#Mwmeter').append(mlitem);
         $('.bxslider').bxSlider({
        slideWidth: 550,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500", "position":"30","width":"350px"});
         
         
    
}
var wtank='';
function fetchWaterTankerData(){

    wtank+='<div class="bxslider" >';
    wtank+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WatertankHldr"><div class="WatertankImgHldr"><img class="WtMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/watertanker-b.png" /></div><span class="SctnTtl"> Water Tanker - 01</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    wtank+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WatertankHldr"><div class="WatertankImgHldr"><img class="WtMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/watertanker-b.png" /></div><span class="SctnTtl"> Water Tanker - 02</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    wtank+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WatertankHldr"><div class="WatertankImgHldr"><img class="WtMtr" src="<?php echo base_url(); ?>asset/demoforall/Images/watertanker-b.png" /></div><span class="SctnTtl">Water Tanker - 03</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';

   
    
    
        wtank+='</div>'; 
         $('#Wtmeter').append(wtank);
         $('.bxslider').bxSlider({
        slideWidth: 550,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500", "position":"30","width":"350px"});
         
         
    
}
var Bwells='';
function fetchBoreWellData(){

   Bwells+='<div class="bxslider" >';
    Bwells+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls BorewellHldr"><span class="SctnTtl"> Bore Well - 01</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Running</div><div class="ClRgt">02:30:00</div></li><li><div class="ClLft">Yesterday Running</div><div class="ClRgt">03:00:00 </div></li><li><div class="ClLft">Weekly Running</div><div class="ClRgt">02:50:00</div></li></ul></div></div></div></div>';
    Bwells+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls BorewellHldr"><span class="SctnTtl"> Bore Well - 02</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Running</div><div class="ClRgt">02:30:00</div></li><li><div class="ClLft">Yesterday Running</div><div class="ClRgt">03:00:00 </div></li><li><div class="ClLft">Weekly Running</div><div class="ClRgt">02:50:00</div></li></ul></div></div></div></div>';
   Bwells+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls BorewellHldr"><span class="SctnTtl"> Bore Well - 03</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Running</div><div class="ClRgt">02:30:00</div></li><li><div class="ClLft">Yesterday Running</div><div class="ClRgt">03:00:00 </div></li><li><div class="ClLft">Weekly Running</div><div class="ClRgt">02:50:00</div></li></ul></div></div></div></div>';
    
    
    
        Bwells+='</div>'; 
         $('#Bwmeter').append(Bwells);
         $('.bxslider').bxSlider({
        slideWidth: 550,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500", "position":"30","width":"350px"});
         
         
    
}
var flitem='';
function fetchFlowMeterData(){

    flitem+='<div class="bxslider" >';
    flitem+='<div id="flowmwter"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls FlwMtrHldr"><div class="FlwMtrImgHldr"><img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" /></div><span class="SctnTtl">Flow meter - 01</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    flitem+='<div id="flowmwter"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls FlwMtrHldr"><div class="FlwMtrImgHldr"><img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" /></div><span class="SctnTtl">Flow meter - 02</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    flitem+='<div id="flowmwter"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls FlwMtrHldr"><div class="FlwMtrImgHldr"><img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" /></div><span class="SctnTtl">Flow meter - 03</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    
        flitem+='</div>'; 
         $('#flowmeters').append(flitem);
         $('.bxslider').bxSlider({
        slideWidth: 550,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500",550 "position":"30","width":"350px"});
         
         
    
}
function fetchDGSetData()
{
    var myArray = new Array();
    // var MrgData=Array();
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd; 
    var dgmetersalldata = <?php echo json_encode($meters); ?>;
    // console.log(dgmetersalldata);
    var k=0;
    for(var j=0;j<dgmetersalldata.length;j++)
    {
        
        // alert(j);
        // console.log(dgmetersalldata.length);
        var metername= dgmetersalldata[j].vname;
        // console.log(metername);
        var urlString1 = "http://chekhra.net/chekhranew/Generators/chekhraMaps/show_all_prk.php?&generatorsId="+metername+"&clientId=534";
        // console.log(urlString);

        $.ajax({
            
            url:urlString1,
            type : 'GET',
            async: true,
            data: {date:today},
            success: function(dgdata)
            {
                k++;
                displayDGSetDataOnline(dgdata,k,dgmetersalldata.length);
              
            }
        });
        
    }

}

//var dgitem="";
var  k=0; var flcnsmd="";
 var dgitem="";

function displayDGSetDataOnline(dgdata,tt,ss)
{
    var d1 = JSON.parse(dgdata);
    if(tt==1){
       dgitem+='<div class="bxslider" id="dgset">'; 
        dgitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl">'+d1[0]['generatorId']+'</span><div class="DGCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Diesel Generator</div><div class="ClRgt">'+d1[0]['status']+'</div></li><li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">'+d1[0]['fcons']+'</div></li><li><div class="ClLft">Running Time</div><div class="ClRgt">'+d1[0]['ruhnnin']+'</div></li><li><div class="ClLft">Fuel Add</div><div class="ClRgt">'+d1[0]['fuelAdded']+'</div></li><li><div class="ClLft">Available Fuel</div><div class="ClRgt">'+d1[0]['currentFuel']+'</div></li><li><div class="ClLft">Fuel Removed</div><div class="ClRgt">'+d1[0]['fuelTheft']+'</div></li></ul></div><div class="DGCol-2"><div class="LiquidTank Smll"><div class="Liquid l-70"></div></div></div> <div class="DGCol-3"> <div class="LiquidTank Smll"><div class="Liquid Low"></div><div class="Liquid Medium"></div><div class="Liquid High"></div><span class="LowTxt">Low</span><span class="MedTxt">Medium</span><span class="HghTxt">High</span></div></div></div></div></div></div>';
    }
    dgitem+='<div class="childclass"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl">'+d1[0]['generatorId']+'</span><div class="DGCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Diesel Generator</div><div class="ClRgt">'+d1[0]['status']+'</div></li><li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">'+d1[0]['fcons']+'</div></li><li><div class="ClLft">Running Time</div><div class="ClRgt">'+d1[0]['ruhnnin']+'</div></li><li><div class="ClLft">Fuel Add</div><div class="ClRgt">'+d1[0]['fuelAdded']+'</div></li><li><div class="ClLft">Available Fuel</div><div class="ClRgt">'+d1[0]['currentFuel']+'</div></li><li><div class="ClLft">Fuel Removed</div><div class="ClRgt">'+d1[0]['fuelTheft']+'</div></li></ul></div><div class="DGCol-2"><div class="LiquidTank Smll"><div class="Liquid l-70"></div></div></div> <div class="DGCol-3"> <div class="LiquidTank Smll"><div class="Liquid Low"></div><div class="Liquid Medium"></div><div class="Liquid High"></div><span class="LowTxt">Low</span><span class="MedTxt">Medium</span><span class="HghTxt">High</span></div></div></div></div></div></div>';
    if(tt==ss){
        dgitem+='</div>'; 
         $('#dgset').append(dgitem);
         $('.bxslider').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
         $(".childclass").css({"float":"500", "position":"30","width":"500px"});
         
         
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
          //console.log("success"+data);
          appendFirepumpDataData(data);
        }
      });

   

}
function appendFirepumpDataData(data){
        var d = JSON.parse(data);       
         if(d[0]["SwitchStatus"]=='OFF'){
           $('#hjss').removeClass($('#hjss').attr('class')).addClass('Txt Stts off');
         }else if(d[0]["SwitchStatus"]=='Manual'){
            $('#hjss').removeClass($('#hjss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[0]["SwitchStatus"]=='NA'){
            $('#hjss').removeClass($('#hjss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#hjss').removeClass($('#hjss').attr('class')).addClass('Txt Stts Auto');
        }

        if(d[1]["SwitchStatus"]=='OFF'){
           $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts off');
         }else if(d[1]["SwitchStatus"]=='Manual'){
            $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[1]["SwitchStatus"]=='NA'){
            $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#sjss').removeClass($('#sjss').attr('class')).addClass('Txt Stts Auto');
        }

        if(d[2]["SwitchStatus"]=='OFF'){
           $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts off');
         }else if(d[2]["SwitchStatus"]=='Manual'){
            $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[2]["SwitchStatus"]=='NA'){
            $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#mhss').removeClass($('#mhss').attr('class')).addClass('Txt Stts Auto');
        }

        if(d[3]["SwitchStatus"]=='OFF'){
           $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts off');
         }else if(d[3]["SwitchStatus"]=='Manual'){
            $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Manual');
        }else if(d[3]["SwitchStatus"]=='NA'){
            $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Manual');
        }else{
          $('#msss').removeClass($('#msss').attr('class')).addClass('Txt Stts Auto');
        }
        //runnstatus
        if(d[1]["RunningStatus"]==1){
            $('#sjrs').removeClass($('#sjrs').attr('class')).addClass('Txt Stts on');
        }else{
            $('#sjrs').removeClass($('#sjrs').attr('class')).addClass('Txt Stts off');
            
        }
        if(d[2]["RunningStatus"]==1){
             $('#mhrs').removeClass($('#mhrs').attr('class')).addClass('Txt Stts on');
        }else{
            $('#mhrs').removeClass($('#mhrs').attr('class')).addClass('Txt Stts off');
           
        }
        if(d[3]["RunningStatus"]==1){
            $('#msrs').removeClass($('#msrs').attr('class')).addClass('Txt Stts on');
        }else{
            $('#msrs').removeClass($('#msrs').attr('class')).addClass('Txt Stts off');
            
        }
        // if(d[0]["RunningStatus"]==1){
        //     $('#hjrs').removeClass($('#hjrs').attr('class')).addClass('Txt Stts on');
        // }else{
        //     $('#hjrs').removeClass($('#hjrs').attr('class')).addClass('Txt Stts off');
            
        // }

        
        $("#sjrht").text(d[1]["TodayRunn"]+(' Min'));
        $("#sjrhy").text(d[1]["YesterdayRunn"]+(' Min'));
        $("#sjrhl").text(d[1]["LastWeekRunn"]+(' Min'));

        $("#mhrht").text(d[2]["TodayRunn"]+(' Min'));
        $("#mhrhy").text(d[2]["YesterdayRunn"]+(' Min'));
        $("#mhrhl").text(d[2]["LastWeekRunn"]+(' Min'));

        $("#msrht").text(d[3]["TodayRunn"]+(' Min'));
        $("#msrhy").text(d[3]["YesterdayRunn"]+(' Min'));
        $("#msrhl").text(d[3]["LastWeekRunn"]+(' Min'));
var urlString = "getLivePressure";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
       // data: {meter: 'CT Fan',date:date},
        success: function(data){
         // console.log("success"+data);
          appendPressureData(data);
        }
      });

        //presure
        function appendPressureData(data){
            var jsondata = JSON.parse(data);
  var myArray = new Array();
  //var d; var localTime;var localOffset;var utc;var offset = 5.5;var nd;
var dps1 = [];
var dps2 = [];
var t=parseFloat(jsondata[jsondata.length-1]["CurReading"]);
var r;
for(var i = 0; i < jsondata.length; i++) {
    r=parseFloat(jsondata[i]["CurReading"]);
    dps1.push(r);
    dps2.push(jsondata[i]["ToTime"]);
   // econ.push(jsondata[i]["economy"]);
}
           Highcharts.chart('container_pressure', {
    exporting: {
        chartOptions: { // specific options for the exported image
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                }
            }
        },
        fallbackToExportServer: false
    },

    chart: {
      
        type: 'line'
    },
      
    title: {
        text: ''
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Pressure in Bar'      
    }
    },   
     series: [{
      name: 'Line Pressure',
        data: dps1
        
    }]
}); 
           //speed guage
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
            to: 8,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 8,
            to: 12,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 12,
            to: 16,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,16],
        tickAmount: 1,
        min: 0,
        max: 16,
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
            text: ''
        },
    },

    credits: {
        enabled: false
    },

    series: [
    {
            name: 'Speed',
            // data: [t],
            dataLabels: 1,
            tooltip: {
                valueSuffix: ' km/h'
            },
        },
    {
      name: 'Customer Dot',
      isRectanglePoint: false,
      type: 'gauge',
      data: [t],
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
        }

//end pressure


        
} 
</script>


</html>