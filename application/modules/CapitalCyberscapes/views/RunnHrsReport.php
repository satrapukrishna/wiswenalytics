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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style type="text/css">
        #alert1{
            color: red;
            margin-left: 300px;
            font-size: 16px;
        }
    </style>
    
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
                   AHU Running Hours Report
                  </h2>
                </section>
                
                <section class="content">
                    <form>
                        <div id="alert"></div>
                        <div class="row meter-top">
                            <label>Select Meter : </label>
                            <select id="multiMeter" class="form-control">
                                
                                <option value=""> 
                                  OYO SecondFloor
                                </option>
                            </select>
                            
       
                            <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
                            <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
                            <button type="button" onclick="getHvacLevelReport()" class="btn btn-success">Filter</button>
                            <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
                            <button type="button" class="btn btn-info"  id="export" disabled="true"  onclick="exportTableToExcel('list')">Export</button>
                        </div>
                    </form>

                </section>
                <div id="alert1"></div>
                <div class="loader" id="loading" style="display: none;"></div>
                    <div id = "tab">
                        <table id = "list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Meter</th>
                                    <th>Date/Hours</th>
                                    <th>Running Hours</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div id="containter1" ></div>
                    </div>

                </div>
                <?php $this->load->view('footer/footer');?>
  
        </div>
    </div>

</body>

<script type="text/javascript">
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'RunningHoursReport.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
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

function getHvacLevelReport()
{
    // document.getElementById("list").style.display="none";
    // document.getElementById("list ").innerHTML="";
  var valid=validate();
  // alert(valid);
  if(valid)
  {
    // alert("hello");
    
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var meter = $('#multiMeter').find(":selected").text();
    str = meter.replace(/\s/g, '');

    $("#loading").css("display", "block");
    $("#list tbody").empty();
    var urlString1 = "getahuRunningMultiData";
    $.ajaxQueue({
        url:urlString1,
        type : 'GET',
        async: true,
        data: {meter: str,fromdate:fromdate,todate:todate},
        success: function(data)
        {
          // console.log(data);
          var obj = JSON.parse(data);
          appendData(obj);
          $("#loading").css("display", "none");

          // document.getElementById("list").style.display="block";
        }

    });
  
    //document.getElementById('graph_1Runn').style.display = "block";
  }
}

function appendData(data)
{
  // if (count==noooff) {
  //    document.getElementById("loading").style.display="none";
  // }
    $("#list tbody").empty();
    var hoursxaxisarray=[];
    var footfallyaxisarray=[];
    document.getElementById("export").disabled=false;

    var rows="";
    var j=1;
    // alert(data[0][meter]);
    for (var i = 0; i < data.length; i++) 
    {
        rows += "<tr><td align='center'>" + j + "</td><td align='center'>" + data[i]['meter'] + "</td><td align='center'>" + data[i]['Time'] + "</td><td align='center'>" +hours(Number(data[i]['rh']) )+ "</td> Min</tr>";            
                j++;    
    }
    $(rows).appendTo("#list tbody");
    // document.getElementById("export").style.display="block";
    for (var k = 0; k < data.length; k++) 
    {
      hoursxaxisarray[k]=data[k]['Time'];
      footfallyaxisarray[k]=parseInt(data[k]['rh']);
    }
    // console.log(hoursxaxisarray);
    // print_r(hoursxaxisarray);
    addGraph(hoursxaxisarray,footfallyaxisarray);
 

}
function addGraph(hoursxaxisarray,footfallyaxisarray)
{
    // $('#containter1').highcharts({
    Highcharts.chart('containter1',{
    
        chart: {
            type: 'column'
        },
        title: {
            text: 'RunningHours'
        },
        xAxis: {
            categories: hoursxaxisarray
        },
        yAxis: {
            title: {
                text: 'RunningHours'
            }
        },
        series: [{
            name: 'runninghrs',
            data: footfallyaxisarray
        }]
    });
    

}
function validate()
{
    //var meterselect = document.getElementsByTagName('select')[0];
    var meter = $('#multiMeter').find(":selected").text();

    //alert(conceptName);
    //var meter =getSelectValues(meterselect);
    // alert(meter);
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    // alert(fromdate);
    var alertdiv = document.getElementById("alert1");
    if(meter =="None Selected")
    {
      alertdiv.innerHTML="Please select meter";
      return false;
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
function hours(a)
{
  var hours = Math.trunc(a/60);
  var minutes = a % 60;
  return hours +" Hours "+ minutes+"Min";
  //console.log(hours +":"+ minutes);
}
</script>


</html>