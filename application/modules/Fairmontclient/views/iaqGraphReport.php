<?php
$meterList1=array('Temperature','Humidity','CO2');
$meterList = array();
for ($i=0; $i < count($meterList1); $i++) { 

  array_push($meterList,$meterList1[$i]);
}
//print_r($meterList);die();
?>
<html>
<?php $this->load->view('cssFiles');?>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">FAIRMONT</span>
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
                                <a href="<?php echo base_url(); ?>Fairmontclient/frmntdshbrd"" class="Lnk IOQ"><span class="Txt">IAQ</span></a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url(); ?>Fairmontclient/frmntdshbrd"" class="Lnk cooltwr"><span class="Txt">WaterLevel</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Fairmontclient/frmntdshbrd"" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
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
                                        <a href="<?php echo base_url(); ?>Fairmontclient/iaqGraphReport" class="Lnk Actv act"><span class="Txt"> Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="eminnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>Fairmontclient/firepumpRunReport" class="Lnk"><span class="Txt"> Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Fairmontclient/firepumpGraphReport" class="Lnk Actv"><span class="Txt"> Graph Report</span></a>
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
            <!-- chillers code starts -->
           <div class="content-wrapper" style="min-height: 100%;">
                <section class="content-header">
                  <h1>
                   IAQ Graph Report
                  </h1>
                </section>
                <div id="alert"></div>
                <section class="content">
                    <form>
                    <div id="alert"></div>
                        <div class="row meter-top">
                            <label>Select Meter : </label>
                        
        <select id="multiMeter" multiple="multiple"  class="form-control">
          <?php 
          foreach ($meterList as $value) {
          ?>
            <option value="<?php echo $value; ?>"> 
              <?php echo $value; ?> 
            </option>
          <?php } ?>
        </select> 
                           
                            <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
                            <!-- <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true"> -->
        <button type="button" onclick="getIaqGraphReport()" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
        <!-- <button type="button" class="btn btn-info"  id="export" disabled="true"  onclick="exportTableToExcel('list')">Export</button> -->
      </div>
        </form> 
           </section>
            
        <div class="loader" id="loading" style="display: none;"></div>
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
              <div  id="container_runn2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>
                <div  id="container_runn3">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>
              <div  id="container_pipepressure1">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>  
               <div  id="container_pipepressure2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>                      
            </div>

          </div>
          
        </div>
        <div class="col-md-12" id="graph_runn2" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
        <div class="col-md-12" id="graph_runn3" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_runn3">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
        <div class="col-md-12" id="graph_runn4" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_pipepressure1">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
         <div class="col-md-12" id="graph_runn4" style="display: none;">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div  id="container_pipepressure2">
                <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
              </div>

                                      
            </div>

          </div>
          
        </div>
                
              </div>
            </section>
            
        </div>
        <?php $this->load->view('footer/footer');?>
    </div>
        
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
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
var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#fromdate').attr('max', maxDate);
$(function () 
{
    $('#multiMeter').multiselect({
      includeSelectAllOption: true
    });
});
      
function getIaqGraphReport()
{
    var valid=validate();
    if(valid)
    {
        var meterselect = document.getElementsByTagName('select')[0];
        var meter =getSelectValues(meterselect);
        var meter1 = meter.toString();
        // var fromtime = document.getElementById("fromtime").value;
        //var totime = document.getElementById("totime").value;
        var fromdate = document.getElementById("fromdate").value;
        //var todate = document.getElementById("todate").value;
        var meters = meter1.split(",");
        var noofmeters = meters.length;
        // var from = parseDate(fromdate);
        // var to = parseDate(todate);
        // var difference = datediff(from,to);
        // if(difference == 0 || difference >= 1){
        //   difference += 1;
        // }
   

        var k = 1,kl=1;
        //var mt;
            var mt = new Array();

        for (var j = 0; j < noofmeters; j++) 
        {

            
            $("#loading").css("display", "block");
     
            var urlString1 = "iaqDataReport";
      
            $.ajaxQueue({
                url:urlString1,
                type : 'GET',
                async: false,
                data: {meter: meter[j],fromdate:fromdate},
                success: function(data)
                {   console.log(data);                    
                    // var me = meter[kl-1];
                    var runningContainer = "container_runn"+kl;
                    // var economycontainer="container_economy"+kl;
                    //var economyGraph="graph_economy"+kl;
                    var runnibgGraph = "graph_runn"+kl;
                    plotRunnGraph(data,runningContainer,kl,meter[j]);
                      
                    document.getElementById(runnibgGraph).style.display = "block";
                    kl++;
                }
            });
        
        }
    
  }

}
function plotRunnGraph(data,runnContainer,count,meter)
{
            document.getElementById("loading").style.display="block";

    var mt;
    if(meter=='Temperature'){
                mt='Temperature oC';
    var xdata = new Array();
    var ydata = new Array();
    var jsondata = JSON.parse(data);
    for (i = 0; i < jsondata.length; i++) 
    { 
        xdata[i] = jsondata[i]['FromTime'];
        ydata[i] = parseInt(jsondata[i]['CurReading']);
       
       
        //myArray.push(sec);
    }
     Highcharts.chart(runnContainer, {
        chart: {
            type: 'line'
        },
        title: {
            text: meter
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: mt
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
            name: meter,
            data: ydata
        }]
    });
            }
                        if(meter=='Humidity'){
                             mt='Humidity %RH';
                             var xdata = new Array();
    var ydata = new Array();
    var jsondata = JSON.parse(data);
    for (i = 0; i < jsondata.length; i++) 
    { 
       xdata[i] = jsondata[i]['FromTime'];
        ydata[i] = parseInt(jsondata[i]['CurReading']);
       
        //myArray.push(sec);
    }
     Highcharts.chart(runnContainer, {
        chart: {
            type: 'line'
        },
        title: {
            text: meter
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: mt
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
            name: meter,
            data: ydata
        }]
    });
                
            }
                        if(meter=='CO2'){
                             mt='CO2 ppm';
                             Highcharts.chart(runnContainer, {
        chart: {
            type: 'line'
        },
        title: {
            text: meter
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: mt
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
            name: meter,
            data: ydata
        }]
    });
                
            }
  //container_pipepressure
    

   
      
    // var cnt='container_runn'+(jsondata.length+1);
    document.getElementById("loading").style.display="none";
}

function hours(a){
  var hours = Math.trunc(a/60);
  var minutes = a % 60;
  return hours +" Hours "+ minutes+"Min";
  //console.log(hours +":"+ minutes);
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
function validate(){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    // var fromtime = document.getElementById("fromtime").value;
    // var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
   // var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter ==""){
      alertdiv.innerHTML="Please select meter";
      return false;
    }
   
    // else{
    //   alertdiv.innerHTML="Please select timings properly";
    //   return false;
    // }
    // if(true){
    //   if(Date.parse('01/01/2011 '+fromtime)>Date.parse('01/01/2011 '+totime)){
    //     alertdiv.innerHTML="Please select timings properly";
    //     return false;
    //   }
    //   if(Date.parse('01/01/2011 '+fromtime)==Date.parse('01/01/2011 '+totime)){
    //     alertdiv.innerHTML="Please select different timings ";
    //     return false;
    //   }
    // }
    if(fromdate == ""){
      alertdiv.innerHTML="Please select date properly";
      return false;
    }
    alertdiv.innerHTML="";
    return true;
  }
</script>


</html>