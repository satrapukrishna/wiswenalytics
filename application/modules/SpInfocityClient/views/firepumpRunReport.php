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
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/coolingGraphReport" class="Lnk"><span class="Txt">Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="eminnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>SpInfocityClient/firepumpRunReport" class="Lnk act"><span class="Txt">Running Hours Report</span></a>
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
           

            <!-- cooling tower code ends -->

            <!-- Fire pump code starts -->
            <div class="content-wrapper" style="min-height: 100%;">
                <section class="content-header">
                  <h1>
                   Firepump Running Hours Report
                  </h1>
                </section>
                
                <section class="content">
                    <form>
                    <div id="alert"></div>
                        <div class="row meter-top">
                           
                            <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
                            <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick="getFuelReport()" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
         <button type="button" class="btn btn-info"  id="export" disabled="true"  onclick="exportTableToExcel('list')">Export</button>
      </div>
        </form>
       <!-- animation starts -->
        <div class="loader" id="loading" style="display: none;"></div>
        

        <!-- animation end -->
               <div id = "tab">
        <table id = "list" class="table table-bordered table-hover">
            <thead>
           
               
            </thead>

            <tbody>

            </tbody>
        </table>
</div>
           </section>
        </div>
        <?php $this->load->view('footer/footer');?>
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
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'FuelAddedReport.xls';
    
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
      function getFuelReport(){
  var valid=validate();
  if(valid){
    
   // var meterselect = document.getElementsByTagName('select')[0];
    //var meter =getSelectValues(meterselect);
   // var meter1 = meter.toString();
    //var fromtime = document.getElementById("fromtime").value;
  //  var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
   // var meters = meter1.split(",");
   // var noofmeters = meters.length;
    var from = parseDate(fromdate);
    var to = parseDate(todate);
    var difference = datediff(from,to);
    if(difference == 0 || difference >= 1){
      difference += 1;
    }
    var k = 1;
    $("#list tbody").empty();
    
      var urlString = "firePumpRunningReport";
      $.ajaxQueue({
        url:urlString,
        type : 'GET',
        async: true,
        data: {fromdate:fromdate,todate:todate},
        success: function(data){
          var obj = JSON.parse(data);
          appendData(obj);
        }
      });
    
    document.getElementById("loading").style.display="block";
    
  }
}
function appendData(data){
   //document.getElementById("list").style.display="block";
   //document.getElementById("export").style.display="block";
   document.getElementById("export").disabled=false;
  var rows="";
 var j=1;
  for (var i = 0; i < data.length; i++) {
if(i==0){
  
  rows +="<tr> <th rowspan='2' align='center'>SNo</th><th rowspan='2' align='center'>Date</th>    <th colspan='3' align='center'>Meters</th> </tr>";
  rows += "<tr><td align='center'>" + data[0][0]["meter"] + "</td><td align='center'>" + data[0][1]["meter"] + "</td><td align='center'>" + data[0][2]["meter"] + "</td></tr>";
}
rows += "<tr>";
for (var i1 = 0; i1 < data[i].length; i1++) {
  if(i1==0){
    rows += "<td align='center'>" + j + "</td><td align='center'>" + data[i][i1]["date"] + "</td>";
  }
  rows += "<td align='center'>" + data[i][i1]["RunningHours"] + " Min</td>";
}
rows += "</tr>";
    //rows += "<tr><td>" + j + "</td><td>" + data[0][1]["date"] + "</td><td>" + data[i]['FuelAdded'] + "</td><td>" + data[i]['runninghrs'] + "</td><td>" + data[i]['FuelAdded'] + "</td><td>" + data[i]['Fuelconsume'] + "</td><td>" + data[i]['economy'] + "</td></tr>";
            
            j++;
    
  }
  $(rows).appendTo("#list tbody");
  document.getElementById("loading").style.display="none";

}
// function getSelectValues(select) {
//   var result = [];
//   var options = select && select.options;
//   var opt;

//   for (var i=0, iLen=options.length; i<iLen; i++) {
//     opt = options[i];

//     if (opt.selected) {
//       result.push(opt.value || opt.text);
//     }
//   }
//   return result;
// }
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
    //var meterselect = document.getElementsByTagName('select')[0];
    //var meter =getSelectValues(meterselect);
    //var fromtime = document.getElementById("fromtime").value;
    //var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    
  
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
</script>


</html>