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
        
       

        
    </style>
   
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">SP Infocity</span>
               <!--  <div class="Logo">
                    <span class="CmpNm"> <img src="<?php echo base_url(); ?>/asset/prkhospitalasset/Images/wenalytics logo.png" width="180" height="50" class="HdrImg Footfall" /></span>
                </div> -->
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard">
                            <li>
                                <a href="<?php echo base_url(); ?>SpInfocityClient/FirepumpReqNewDashboard" class="Lnk Actv chlr"><span class="Txt">Chillers</span></a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url(); ?>SpInfocityClient/FirepumpReqNewDashboard" class="Lnk cooltwr"><span class="Txt">Cooling Towers</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>SpInfocityClient/FirepumpReqNewDashboard" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
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
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/chillerRunReport" class="Lnk Actv"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/chillerGraphReport" class="Lnk"><span class="Txt">Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="" class="Lnk Arr" id="cltrouterid"><span class="Txt">Cooling Towers Reports</span></a>
                                <ul class="ThrdLvl" id="cltrinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/coolingRunReport" class="Lnk Actv"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/coolingGraphReport" class="Lnk act"><span class="Txt">Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="eminnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/firepumpRunReport" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/firepumpGraphReport" class="Lnk Actv"><span class="Txt">Graph Report</span></a>
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
           

            <!-- chillers code ends -->
            <!-- cooling towers code starts -->
            <div class="content-wrapper" style="min-height: 100%;">
                <section class="content-header">
                  <h1>
                   Cooling Tower Graph Report
                  </h1>
                </section>
                <div id="alert"></div>
                <section class="content">
                    <form>
                        <div class="row meter-top">
                            <label>Select Meter : </label>
                            <select id="multiMeter" class="form-control">
                                
                                <option value=""> 
                                  CT Fan
                                </option>
                            </select>

                             <select  id="fromtime">
          <option value="Select Hours From">Select Hours From</option>
          <?php 
            $j = 24;$list = "";$options = array();
            for($i=0;$i<=$j ;$i++){
            if($i<10)
            $options[$i] =  "0".$i.":00:00";
            else
            $options[$i] =  $i.":00:00";
            }
            foreach ($options as $value) {
            //$list .= "<option value=".$value.">".$value."</option>";
              if($value == "00:00:00"){
                    $list .= "<option value=".$value." >".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
            }
            echo $list;
          ?>
        </select>

        <select  id="totime">
          <option value="Select Hours To">Select Hours To</option>
          <?php 
            $j = 24;$list = "";$options = array();
            for($i=0;$i<=$j ;$i++){
            if($i<10)
            $options[$i] =  "0".$i.":00:00";
            else
            $options[$i] =  $i.":00:00";
            }
            foreach ($options as $value) {
              if($value == "24:00:00"){
                    $list .= "<option value=".$value." >".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
            }
            echo $list;
          ?>
        </select>
                            <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
                            <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick="getGraphReport()" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
      </div>
        </form>

           </section>
            <!-- animation starts -->
        <div class="loader" id="loading" style="display: none;"></div>
        

        <!-- animation end -->
           <!-- Main content -->
            <section class="content">
              <div class="row">
              <div class="col-md-12" id="graph_runn1" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn1">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
                
              </div>
            </section>
            <!-- chillers code ends -->
            <!-- cooling towers code starts -->
           

            <!-- cooling tower code ends -->

            <!-- Fire pump code starts -->
            
            <!-- Fire pump code ends -->
            
        </div>
        <?php $this->load->view('footer/footer');?>

            <!-- cooling tower code ends -->

            <!-- Fire pump code starts -->
            
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
function getGraphReport(){
    var valid=validate();
    if(valid){
    
    
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var meter1 = meter.toString();
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var meters = meter1.split(",");
    var noofmeters = meters.length;
    var from = parseDate(fromdate);
    var to = parseDate(todate);
    var difference = datediff(from,to);
    if(difference == 0 || difference >= 1){
      difference += 1;
    }
    var k = 1,kl=1;
    for (var j = 0; j < noofmeters; j++) {
      $("#loading").css("display", "block");
     
       var urlString1 = "coolingTowerReport";
      $.ajax({
        url:urlString1,
        type : 'GET',
        async: true,
        data: {meter: meter[j],fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
          var me = meter[kl-1];
          var runningContainer = "container_runn"+kl;
         // var economycontainer="container_economy"+kl;
          //var economyGraph="graph_economy"+kl;
          var runnibgGraph = "graph_runn"+kl;
          plotRunnGraph(data,runningContainer,me,kl,noofmeters);
          
          document.getElementById(runnibgGraph).style.display = "block";
         
         

          kl++;
        }
      });
    }
    //document.getElementById('graph_1Runn').style.display = "block";
  }
}
function timeConvert(n) {
var num = n;
var hours = (num / 60);
var rhours = Math.floor(hours);
var minutes = (hours - rhours) * 60;
var rminutes = Math.round(minutes);
return rhours + " hour(s) and " + rminutes + " minute(s).";
}
function plotRunnGraph(data,runnContainer,meter,count,nooff){
  if (count==nooff) {
    $("#loading").css("display", "none");
  }
  
  var jsondata = JSON.parse(data);
  var myArray = new Array();
  //var d; var localTime;var localOffset;var utc;var offset = 5.5;var nd;
var dps1 = [];
var dps2 = [];
var runn = [];
var econ = [];
var r;
for(var i = 0; i < jsondata.length; i++) {
    r=parseInt(jsondata[i]["runninghrs"]);
    dps1.push(r);
    runn.push(timeConvert(jsondata[i]["runninghrs"]));
    dps2.push(jsondata[i]["Time"]);
   // econ.push(jsondata[i]["economy"]);
}
  
Highcharts.chart(runnContainer, {
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
      
        type: 'column'
    },
      
    title: {
        text: 'RunningHours'
    },
    subtitle: {
        text: meter
    },
    
     xAxis: {
      title: {      
      text: 'Time and Date'      
    },
      categories: dps2
    },
     yAxis: {
      title: {      
      text: 'Minutes'      
    }
    },   
     series: [{
      name: 'Minutes',
        data: dps1
        
    }]
});


}
function validate(){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter ==""){
      alertdiv.innerHTML="Please select meter";
      return false;
    }
    else if((fromtime == "Select Hours" && totime == "Select Hours")){
      
    }else if((fromtime != "Select Hours" && totime != "Select Hours")){

    }else{
      alertdiv.innerHTML="Please select timings properly";
      return false;
    }
    if(true){
      if(Date.parse('01/01/2011 '+fromtime)>Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select timings properly";
        return false;
      }
      if(Date.parse('01/01/2011 '+fromtime)==Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select different timings ";
        return false;
      }
    }
    if(fromdate == ""){
      alertdiv.innerHTML="Please select date properly";
      return false;
    }else if(todate == ""){
      alertdiv.innerHTML="Please select date properly";
      return false;
    }else{
      var d1 = new Date(fromdate);
      var d2 = new Date(todate);
      var same = d1.getTime() > d2.getTime();
      if(same){
        alertdiv.innerHTML="Please select dates properly";
        return false;
      }
    }
    alertdiv.innerHTML="";
    return true;
  }
  function getSelectValues(select) {
  var result = [];
  var options = select && select.options;
  var opt;

  for (var i=0, iLen=options.length; i<iLen; i++) {
    opt = options[i];

    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
  }
  return result;
}
function parseDate(str) {
  var mdy = str.split('-');
  //return new Date(mdy[2], mdy[0]-1, mdy[1]);
  return new Date(mdy[0], mdy[1]-1, mdy[2]);
}
function datediff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second-first)/(1000*60*60*24));
}
</script>


</html>