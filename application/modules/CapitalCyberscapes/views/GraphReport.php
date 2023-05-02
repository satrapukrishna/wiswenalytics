<!-- firepump dashboard on 8th jan backup-->
<?php
$meterList1=array('Test01','Test02');
$meterList = array();
for ($i=0; $i < count($meterList1); $i++) { 

  array_push($meterList,$meterList1[$i]);
}
//print_r($meterList);die();
?>
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
        
       

        
    </style>
    <script type="text/javascript">
        

    </script>
</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">Capital Cyberscapes</span>
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
                                <a href="<?php echo base_url(); ?>CapitalCyberscapes/HVACDashboard" class="Lnk Actv chlr"><span class="Txt">AHU</span></a>
                            </li>
                          
                            
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl Show" id="reportsInnerId">
                            <li>
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">AHU Reports</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>CapitalCyberscapes/getGraphReport" class="Lnk Actv"><span class="Txt">AHU Graph Report</span></a>
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

            <div class="content-wrapper" style="min-height: 100%;">

                <section class="content-header">
                  <h2>
                   AHU Graph Report
                  </h2>
                </section>
                
                <section class="content">
                    <form>
                    <div id="alert"></div>
                        <div class="row meter-top">
                            <label>Select Meter : </label>
                            <select id="multiMeter" class="form-control">
                                
                                <option value=""> 
                                  OYO 2nd Floor
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
                            <!-- <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true"> -->
        <button type="button" onclick="getHvacLevelReport()" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
      </div>
        </form>

           </section>
           <div id="alert"></div>
            <div class="loader" id="loading" style="display: none;"></div>
           <!-- Main content -->
            <section class="content">
              <div class="row">
              <div class="col-md-12" id="graph_1" >
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Fuel</h3> -->
             </div>
            <div class="box-body">
              <div class="chart" id="running">
                
              </div>
              <div class="chart" id="settemp">
               
              </div>
              <div class="chart" id="returnair">
               
              </div>
              <div class="chart" id="supplyair">
               
              </div>
              <div class="chart" id="returnwater">
               
              </div>
              <div class="chart" id="supwater">
               
              </div>
              <div class="chart" id="actator">
               
              </div>
              <div class="chart" id="pressure">
               
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
<link href="<?php echo base_url(); ?>asset/capitalspasset/CSS/SliderCSS.css" rel="stylesheet" />


<script type="text/javascript">


function plotGraph(data){
    var d =  JSON.parse(data);
    $("#loading").css("display", "none");


    var xdatasat = new Array();
    var ydatasat = new Array();

    var xdatarat = new Array();
    var ydatarat = new Array();

    var xdatarwt = new Array();
    var ydatarwt = new Array();

    var xdataswt = new Array();
    var ydataswt = new Array();

    var xdataactu = new Array();
    var ydataactu = new Array();

    var xdatastemp = new Array();
    var ydatastemp = new Array();

    var xdatapressure = new Array();
    var ydatapressure = new Array();

    var xdatarun = new Array();
    var ydatarun = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d[0]['sat'].length; i++) 
    { 
        xdatasat[i] = d[0]['sat'][i]['Fromtime'];
        ydatasat[i] = parseFloat(d[0]['sat'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['rat'].length; i++) 
    { 
        xdatarat[i] = d[0]['rat'][i]['Fromtime'];
        ydatarat[i] = parseFloat(d[0]['rat'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['rwt'].length; i++) 
    { 
        xdatarwt[i] = d[0]['rwt'][i]['Fromtime'];
        ydatarwt[i] = parseFloat(d[0]['rwt'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['swt'].length; i++) 
    { 
        xdataswt[i] = d[0]['swt'][i]['Fromtime'];
        ydataswt[i] = parseFloat(d[0]['swt'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['actu'].length; i++) 
    { 
        xdataactu[i] = d[0]['actu'][i]['Fromtime'];
        ydataactu[i] = parseFloat(d[0]['actu'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['stemp'].length; i++) 
    { 
        xdatastemp[i] = d[0]['stemp'][i]['Fromtime'];
        ydatastemp[i] = parseFloat(d[0]['stemp'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['pressure'].length; i++) 
    { 
        xdatapressure[i] = d[0]['pressure'][i]['Fromtime'];
        ydatapressure[i] = parseFloat(d[0]['pressure'][i]['Consumption']); 
        
      
    }
     for (i = 0; i < d[0]['run'].length; i++) 
    { 
        xdatarun[i] = d[0]['run'][i]['Time'];
        ydatarun[i] = parseInt(d[0]['run'][i]['rh']); 
        
      
    }
    Highcharts.chart('running', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Running Hours'
        },
       
        xAxis: {
            categories: xdatarun
        },
        yAxis: {
            title: {
                text: 'Min'
            },
                      tickInterval: 2,
                      min:0     

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
            name: 'Running Hours',
            data: ydatarun
        }]
    });

    Highcharts.chart('settemp', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Set Temperature'
        },
       
        xAxis: {
            categories: xdatastemp
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Set Temperature',
            data: ydatastemp
        }]
    });
    Highcharts.chart('returnair', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Return Air Temperature'
        },
       
        xAxis: {
            categories: xdatarat
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Return Air Temp',
            data: ydatarat
        }]
    });
     Highcharts.chart('supplyair', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Supply Air Temperature'
        },
       
        xAxis: {
            categories: xdatasat
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Supply Air Temperature',
            data: ydatasat
        }]
    });
     Highcharts.chart('returnwater', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Return Water Temperature'
        },
       
        xAxis: {
            categories: xdatarwt
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Return Water Temperature',
            data: ydatarwt
        }]
    });
     Highcharts.chart('supwater', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Supply Water Temperature'
        },
       
        xAxis: {
            categories: xdataswt
        },
        yAxis: {
            title: {
                text: 'Temp'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Supply Water Temperature',
            data: ydataswt
        }]
    });

Highcharts.chart('actator', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Actuator Level'
        },
       
        xAxis: {
            categories: xdataactu
        },
        yAxis: {
            title: {
                text: 'Percentage(%)'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Actuator Level',
            data: ydataactu
        }]
    });
Highcharts.chart('pressure', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Filter Pressure'
        },
       
        xAxis: {
            categories: xdatapressure
        },
        yAxis: {
            title: {
                text: 'Pa'
            },
          tickInterval: 2,
                      min:0   

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
            name: 'Filter Pressure',
            data: ydatapressure
        }]
    });

    



}

function getHvacLevelReport()
{
  var valid=validate();
  // alert(valid);
  if(valid)
  {
    // alert("hello");
  
    var fromdate = document.getElementById("fromdate").value;
    var meter = $('#multiMeter').find(":selected").text();
    //str = meter;
 // str = meter.replace(/\s/g, '');
    
    
      $("#loading").css("display", "block");
    
       var urlString1 = "getahuData";
      $.ajaxQueue({
        url:urlString1,
        type : 'GET',
        async: true,
        data: {meter: "OYO 2nd Floor",fromdate:fromdate},
        success: function(data){
          
          plotGraph(data);
          
        
        }
      });
  
    //document.getElementById('graph_1Runn').style.display = "block";
  }
}


function validate()
{
    //var meterselect = document.getElementsByTagName('select')[0];
    var meter = $('#multiMeter').find(":selected").text();

   //  alert(conceptName);
    //var meter =getSelectValues(meterselect);
    // alert(meter);
    var fromdate = document.getElementById("fromdate").value;
    // alert(fromdate);
    var alertdiv = document.getElementById("alert");
    if(meter =="None Selected")
    {
      alertdiv.innerHTML="Please select meter";
      return false;
    }
      
    if(fromdate == "")
    {
      alertdiv.innerHTML="Please select date properly";
      return false;
    }
   
    alertdiv.innerHTML="";
    return true;
}
</script>


</html>