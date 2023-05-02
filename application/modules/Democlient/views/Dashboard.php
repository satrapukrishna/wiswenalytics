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
    <!-- <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/SliderCSS.css" rel="stylesheet" /> -->
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
            FirepumpData();
            iaqDashData();
        };
        function fetchAllData()
        {
            // $('.bxslider').bxSlider();
            //var today = '2020-07-19';
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            // console.log(today);
             
            var urlString = "<?php echo base_url();?>Democlient/getwaterdata";
            $.ajax({
                url:urlString,
                type : 'GET',
                async: true,
                data: {date:today},
                success: function(data){
                  console.log("jlldata"+data);
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
                
                if(d[i]['UtilityName']=='UG Flush Tank')
                {   
                    if(c==0)
                    {
                        item+='<div class="bxslider" id="bxid">';
                    } 
                    c++;
                    item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/86000)*100))+'"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid l-'+(Math.round(((d[i]['Consumption'])/86000)*100))+'"></div><span class="LiquidStatus">'+Math.round(((d[i]['Consumption'])/86000)*100)+'%</span></div></div></div><span class="SctnTtl"> Flush Tank 01 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLiveData</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">86KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">'+Math.round(d[i]['Consumption']/1000)+'KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">'+Math.round(((d[i]['Consumption'])/86000)*100)+'%</div></li></ul></div></div></div></div>';
                    item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid l-54"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid l-54"></div><span class="LiquidStatus">54%</span></div></div></div><span class="SctnTtl">Flush Tank 02 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSampleData</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">459KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">54%</div></li></ul></div></div></div></div>';
                    item+='<div><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls WtrTnkLvl"><div class="TnksHldr"><div class="LftHldr"><div class="LiquidTank"><div class="Liquid l-35"></div></div></div><div class="RgtHldr"><div class="LiquidTank Smll"><div class="Liquid l-35"></div><span class="LiquidStatus">35%</span></div></div></div><span class="SctnTtl">Flush Tank 03 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSampleData</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Capacity</div><div class="ClRgt">850KL</div></li><li><div class="ClLft">Current Level</div><div class="ClRgt">298KL</div></li><li><div class="ClLft">Filled</div><div class="ClRgt">35%</div></li></ul></div></div></div></div>';
                    
                    
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
                <span class="BrndNm">Demo</span>
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
                                <a href="#fmdiv2" class="Lnk IOQ"><span class="Txt">IAQ</span></a>
                            </li>
                            
                            <li>
                                <a href="#wldiv2" class="Lnk cooltwr"><span class="Txt">WaterLevel</span></a>
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
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">IAQ Reports</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid">
                                     <li>
                                        <a href="<?php echo base_url(); ?>Democlient/iaqGraphReport" class="Lnk"><span class="Txt"> Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="eminnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>Democlient/firepumpRunReport" class="Lnk"><span class="Txt"> Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Democlient/firepumpGraphReport" class="Lnk Actv"><span class="Txt"> Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>                
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/democlient');?>
       <input type="hidden" name="date" id="date" value="<?php  echo date('Y-m-d');?>">
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- Iaq code starts -->
            <!-- <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl chlr">IAQ</span>
                    <span class="SctnVw Cllps FA" id="flowcollapse"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="flowmeters">
                    
                </div>

            </div> -->
            <!-- Iaq code ends -->

            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl IOQ">Indoor Air Quality</span>
                    <span class="SctnVw Cllps" id="flowcollapse"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd IOQ" id="flowmeters">
                    <div class="bxsliderFllWdth">
                        <div>
                            <div class="IOQArea">
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Temperature</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl TmprCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu TmpIco" id="temp">
                                                              
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    
                                                    <input class="FtrInpt" value="Present Temperature" readonly />
                                                    <input class="FtrInpt" id="temptext" value="" readonly />

                                                    
                                                </div>
                                                <div class="FtrGrph" >
                                                    <div  id="container_temp">
                                                    
                                                      </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Relative Humidity</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl HmdCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu RltHmd" id="hmd">%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    
                                                    <input class="FtrInpt" value="Present Humidity" readonly />
                                                    <input class="FtrInpt" id="hmdtext" value="" readonly />
                                                    
                                                    
                                                </div>
                                                <div class="FtrGrph">
                                                        <div  id="container_hmd">
                                                    
                                                      </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Carbon Dioxide</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl CoGood">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu Cotwo" id="co">
                                                                
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Present CO2</option>
                                                        <!-- <option value="">Weekly</option>
                                                        <option value="">Monthly</option> -->
                                                    </select>
                                                    <input class="FtrInpt" />
                                                   
                                                </div>
                                                <div class="FtrGrph">
                                                     <div  id="container_co">
                                                    
                                                      </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
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
                    <span class="TxtTtl WtrTnk">Water Tank Levels</span>
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
                                <span class="Txt Ttl">Hydrant Pump</span>
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
                                <span class="Txt">NA</span>
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
                                <span class="Txt Ttl">Jockey Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                                                <span class="Txt Stts Manual">NA</span>

                              <!-- <span class="Txt Stts Auto" id="sjss"></span> -->
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
                                <span class="Txt Ttl">Sprinkler Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Manual">NA</span>
                                <!-- <span class="Txt Stts Manual" id="mhss">NA</span> -->
                            </td>
                             <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                <span class="Txt Stts Manual">NA</span>
                                <!-- <span class="Txt Stts Off" id="mhrs"></span> -->
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt" id="mhrht">NA</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt" id="mhrhy">NA</span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt" id="mhrhl">NA</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Diesel Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Manual" id="msss">NA</span>
                            </td>
                             <td class="Col-3">
                                <span class="Txt MblTtl">Switch Status</span>
                                                                <span class="Txt Stts Manual">NA</span>

                                <!-- <span class="Txt Stts Off" id="msrs"></span> -->
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt" id="msrht">NA</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt" id="msrhy">NA</span>
                            </td>
                            <td class="Col-6">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt" id="msrhl">NA</span>
                            </td>
                        </tr>
                        
                    </table>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Line Pressure</span>
                        <div id="container-speed" style="width:300px; height: 200px; float: left"></div>
                        <!-- <div id="container-rpm" style="width: 300px; height: 100px; float: left"></div> -->
                        <!-- <span class="MtrVl">100 Kgs</span> -->
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
        if($( "#flowmeters" ).is( ":hidden" ) &&  $( "#alltank" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" )  )
        {
            
            $('#flowmeters').toggle();$("#flowcollapse").removeClass("Expnd");           
            $('#alltank').toggle();$("#wlcollapse").removeClass("Expnd");
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
            if($( "#alltank" ).is( ":visible" ))
            { 
                $('#alltank').toggle();  $("#wlcollapse").addClass("Expnd");
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
function iaqDashData(){
    var urlString = "iaqDashboardData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
       // data: {meter: 'CT Fan',date:date},
        success: function(data){
          
          addIAQData(data);
          //document.getElementById('graph_runn').style.display = "block";
        }
    });
}
function addIAQData(data){
var d = JSON.parse(data);
$("#temp").text(d[0]["temp"]+(' ℃'));
$("#hmd").text(Math.round(d[0]["humidity"])+(' %RH'));
$("#co").text(d[0]["co2"]+(''));
$("#temptext").val(d[0]["temp"]+(' ℃'));
$("#hmdtext").val(Math.round(d[0]["humidity"])+(' %RH'));

    var xdata = new Array();
    var ydata = new Array();

    var xdatahmd = new Array();
    var ydatahmd = new Array();

    var xdataco = new Array();
    var ydataco = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d[1]['tmp'].length; i++) 
    { 
        xdata[i] = d[1]['tmp'][i]['FromTime'];
        ydata[i] = parseFloat(d[1]['tmp'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[1]['hmd'].length; i++) 
    { 
        xdatahmd[i] = d[1]['hmd'][i]['FromTime'];
        ydatahmd[i] = parseInt(d[1]['hmd'][i]['CurReading']); 
        
      
    }
    Highcharts.chart('container_temp', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temperature oC'
            },
                      tickInterval: 10,
                      min:0,
                      max:60     

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Temperature',
            data: ydata
        }]
    });

    Highcharts.chart('container_hmd', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Humidity'
        },
       
        xAxis: {
            categories: xdatahmd
        },
        yAxis: {
            title: {
                text: 'Humidity %RH'
            },
          tickInterval: 10,
                      min:0,
                      max:100   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Humidity',
            data: ydatahmd
        }]
    });

    Highcharts.chart('container_co', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'CO2'
        },
       
        xAxis: {
            categories: xdataco
        },
        yAxis: {
            title: {
                text: 'CO2'
            }
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'CO2',
            data: ydataco
        }]
    });



}
function FirepumpData()
{
    var urlString = "fairmontdashBoardData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
       // data: {meter: 'CT Fan',date:date},
        success: function(data){
          console.log("firepump"+data);
          appendFirepumpDataData(data);
        }
    });
     var urlString1 = "getPressureDataDash";
    $.ajax({
        url:urlString1,
        type : 'GET',
        async: true,
       // data: {meter: 'CT Fan',date:date},
        success: function(data){
          
          appendGuagData(data);
        }
    });
   
}
function appendGuagData(data){
var d = JSON.parse(data);
var t=parseFloat(d[0]["Consumption"]);

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
            to: 1.5,
            color: '#ed1313',
            thickness: '40%'
        }, {
            from: 1.5,
            to: 2.0,
            color: '#ed5113',
            thickness: '40%'
        }, {
            from: 2.0,
            to: 3.0,
            color: '#04bd04',
            thickness: '40%'
        },
        {
            from: 3.0,
            to: 4.0,
            color: '#0e630e',
            thickness: '40%'
        }],
        lineWidth: 0,
        minorTickInterval: 1,
        tickPositions:[0,4],
        tickAmount: 1,
        min: 0,
        max: 4.0,
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
            text: 'bar'
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

function appendFirepumpDataData(data)
{
    var d = JSON.parse(data);
   
  
    
        //runnstatus
    if(d[0]["RunningStatus"]==0){
        $('#sjrs').removeClass($('#sjrs').attr('class')).addClass('Txt Stts off');
    }else{
        $('#sjrs').removeClass($('#sjrs').attr('class')).addClass('Txt Stts on');
    }
    
        
        $("#sjrht").text(d[0]["TodayRunn"]*12+(' Min'));
        $("#sjrhy").text(d[0]["YesterdayRunn"]*12+(' Min'));
        $("#sjrhl").text(d[0]["LastWeekRunn"]*12+(' Min'));

        


        
}







</script>


</html>