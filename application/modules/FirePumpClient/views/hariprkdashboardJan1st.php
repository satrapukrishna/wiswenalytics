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
    <!-- watertankercode starts -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <link rel="shortcut icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- Watertankercode ends -->
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">PRK Hospitals</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv WtrTnk"><span class="Txt">Water Tank</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk FlwMtr"><span class="Txt">Flow Meters</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk DGSt"><span class="Txt">DG Set</span></a>
                            </li>
                            <li>
                                <a href="#emdiv2" class="Lnk EnrgMtr"><span class="Txt">Energy Meter</span></a>
                            </li>
                            <li>
                                <a href="#fpdiv2" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="#lpgdiv2" class="Lnk LPGCnn"><span class="Txt">LPG Connection</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl Hide" id="reportsInnerId">
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Water Level</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>PRKHospital/getWaterFlow" class="Lnk Arr"><span class="Txt">Water Flow</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">DG Set</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getFuelGraph" class="Lnk Actv"><span class="Txt">Fuel Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getRunningHours" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Energy Meter</span></a>
                                <ul class="ThrdLvl" id="eminnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getConsumptionGraph" class="Lnk Actv"><span class="Txt">Consumption Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>PRKHospital/getConsumption" class="Lnk"><span class="Txt">Consumption Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Fire Pump</span></a>
                            </li>
                            
                           
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/prkheader');?>
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- Water tank level code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="wldiv2">
                    <span class="TxtTtl WtrTnk">Water Tank Levels</span>
                    <span class="SctnVw Cllps FA" id="waterlevel"></span>
                    <span class="SctnVwAll Cllps FA" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls" id="alltank">
                    
                </div>
            </div>

            <!-- Water tank level code ends -->
            <!-- Flow meters code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl FlwMtr">Flow Meters</span>
                    <span class="SctnVw Cllps" id="flowcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="flowmeters">
                    
                </div>
            </div>
            <!-- Flow meteres code ends -->

            <!-- DG Set code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="dgdiv2">
                    <span class="TxtTtl DGSt">DG Set</span>
                    <span class="SctnVw Cllps" id="dgcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="dgset">
                
                </div>
            </div>
            <!-- DG Set code ends -->
            <!-- Energy Meter Code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="emdiv2">
                    <span class="TxtTtl EnrgMtr">Energy Meters</span>
                    <span class="SctnVw Cllps" id="emcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="emeter">
                    <div class="DshBrdSctnTtl Innr">
                        <span class="TxtTtl">Floor - 01</span>
                        <span class="SctnVw Cllps" id="eminnercollapse"></span>
                        <span class="SctnVwAll Cllps" id="eminnercollpaseall"></span>
                    </div>                      
                </div>
            </div>
            <!-- Energy Meter Code ends -->

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
            <!-- Lpg code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="lpgdiv2">
                    <span class="TxtTtl LPGCnn">LPG Connection</span>
                    <span class="SctnVw Cllps" id="lpgcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd LPGCnn" id="lpg">
                    <div class="LPGCnnHldr">
                        <ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
                    </div>
                    <div class="LPGCnnHldr">
                        <span class="Ttl">PSI Bar</span>

                    </div>
                    <div class="LPGCnnHldr">
                        
                    </div>
                </div>
            </div>
            <!-- Lpg Code ends -->
        </div>
    </div>
</body>
<script type="text/javascript">
window.onload = function() {
    
    fetchAllData();
    fetchDGSetData();
    fetchFlowMeterData();
    fetchEnergyMeterData();
};
$("#flowmwter").css({"float":"500", "position":"30","width":"350px"});

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
        if($( "#alltank" ).is( ":hidden" ) && $( "#flowmeters" ).is( ":hidden" ) && $( "#dgset" ).is( ":hidden" ) && $( "#emeter" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" ) && $( "#lpg" ).is( ":hidden" ) )
        {

            $('#alltank').toggle();$("#waterlevel").removeClass("Expnd");
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
            // largSmlTankLevel = Math.round(((d[i]['Consumption'])/142000)*100);
            // if(largSmlTankLevel>0 && largSmlTankLevel<=10)
            //     OrgLevel=10;
           
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
var emitem="";
function fetchEnergyMeterData()
{
    emitem+='<div class="bxslider" >';
    emitem+='<div ><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 01</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
    emitem+='<div><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 02</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
    emitem+='<div><div class="SctnDtlsHldr" ><div class="SldrCntnr"><div class="SctnDtls ErgyMtrHldr"><span class="SctnTtl">Meter - 03</span><div class="ErgyMtrImgHldr"><img class="ErgyMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png"/></div><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Today Consumption</div><div class="ClRgt">30 KWH</div></li><li><div class="ClLft">Yesterdays Consumption</div><div class="ClRgt">50 KWH</div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">45 KWH</div></li></ul><span class="SctnDtlsGrdTblLnk More"></span></div></div></div></div>';
    
        emitem+='</div>'; 
         $('#emeter').append(emitem);
         $('.bxslider').bxSlider({
        slideWidth: 400,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });

}
var flitem="";
function fetchFlowMeterData(){

    flitem+='<div class="bxslider" >';
    flitem+='<div id="flowmwter"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls FlwMtrHldr"><div class="FlwMtrImgHldr"><img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" /></div><span class="SctnTtl">Flow meter - 01</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    flitem+='<div id="flowmwter"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls FlwMtrHldr"><div class="FlwMtrImgHldr"><img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" /></div><span class="SctnTtl">Flow meter - 02</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    flitem+='<div id="flowmwter"><div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls FlwMtrHldr"><div class="FlwMtrImgHldr"><img class="FlwMtr" src="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Blank.png" /></div><span class="SctnTtl">Flow meter - 03</span><ul class="SctnDtlsGrdTbl"><li><div class="ClLft">Total Consumption</div><div class="ClRgt">200 KL</div></li><li><div class="ClLft">Yesterday Consumption</div><div class="ClRgt">900 KL </div></li><li><div class="ClLft">Weekly Average</div><div class="ClRgt">1985 KL</div></li></ul></div></div></div></div>';
    
        flitem+='</div>'; 
         $('#flowmeters').append(flitem);
         $('.bxslider').bxSlider({
        slideWidth: 490,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
  // $(".flowmwter").css({"float":"500", "position":"30","width":"350px"});
         
         
    
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
        slideWidth: 600,
        minSlides: 2,
        maxSlides: 30,
        slideMargin: 10
    });
         $(".childclass").css({"float":"500", "position":"30","width":"450px"});
         
         
    }   
   
}   
</script>


</html>