<?php 
//print_r($this->session->userdata());
$login = $this->session->userdata('login');
if($login){

}else{
  redirect(base_url().'Login');
 
}
$clientName = $this->session->userdata('ClientName');
$short = explode(" ", $clientName);
$ShortName = array();$i=0;
foreach ($short as $value) {
  $name = substr($value,0,1);
  $ShortName[$i] = $name;
  $i++;
}

$stVar = $this->session->userdata('Table');
$stationIdVar = explode("_", $stVar);

$stationIdspan = str_replace("[","",$stationIdVar[0]);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#28b3df">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Dashboard.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Dashboard.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>/asset/ambienceasset/asset/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Scripts/Script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style type="text/css">
        .logoutLblPos{
          position:fixed;
          right:10px;
          top:5px;
        }
        #submit2 {
          background-color: #02918d; /* Green */
          border: none;
          color: white;
          padding: 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
          border-radius: 50%;
        }
        div.DshbordCntr div.DshbrdHdr div.SctnSrch ul.SrchLst li input.Btn1
        {
          background: #07716f;
          color: #fff;
          padding: 5px 0;
          font: 600 11px 'Open Sans';
          cursor: pointer;
          border: none;
          width: 30%;
          border-radius: 10px;
          text-transform: uppercase;
        }
        .SgnOt {
                    
                    width: 40px;
                    height: 40px;
                    margin-right: 20px;
                    background-size: 48%;
                    cursor: pointer;
                    position: relative;
                }
    </style>
    <script type="text/javascript">    
      function showReport()
      {
          // alert("welcome report ui");
          //document.getElementById("tab").style.display='block';
          document.getElementById("sodexodata").style.display='none';
          document.getElementById("reportsid").style.display='block';
          document.getElementById("containter1").style.display='block';
          document.getElementById("odourleft").style.display="none";
       document.getElementById("odourright").style.display="none";
          // $('reportsid').addClass('SctnNm.Active');
          // document.getElementById("reportsid").style.border-bottom='8px solid #b9dcdb';
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
      function showDashboard()
      {
       // window.location('<?php echo base_url(); ?>SpInfocityClient/chillerGraphReport"');
          // alert("welcome report ui");
          document.getElementById("reportsid").style.display='none';
          document.getElementById("containter1").style.display='none';
          document.getElementById("sodexodata").style.display='block';
          document.getElementById("tab").style.display='none';
          document.getElementById("odourleft").style.display="none";
           document.getElementById("odourright").style.display="none";
           // document.getElementById("janitor").style.display="none";
          
      }
      function validate(){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    // var fromtime = document.getElementById("fromtime").value;
    // var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
     var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter =="None Selected"){
      alertdiv.innerHTML="Please select Report Type";
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
  function validate1(){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    // var fromtime = document.getElementById("fromtime").value;
    // var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
     var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter =="None Selected"){
      alertdiv.innerHTML="Please select Report Type";
      return false;
    }
   
   if(fromdate == ""){
      alertdiv.innerHTML="Please select date properly";
      return false;
    }
    alertdiv.innerHTML="";
    return true;
  }
      function getSodexoReport()
      {
        
        
        
         
        //var fromtime = document.getElementById("fromtime").value;
       // var totime = document.getElementById("totime").value;

       var mtype= $("#reports option:selected").text();
      
        if(mtype=='Odour Graph Report'){
          var valid1=validate1();
           if(valid1){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        // var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>Ambience/getOudorLevelReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addOdourData(obj);
          }
        }); 
           }
        
        }
       
       
       
      
        if(mtype=='Footfall Report'){
          var valid=validate();
           if(valid){
             document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>Ambience/getSodexoReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData(obj);
          }
        });
           }
        
       
       
      }
       if(mtype=='Janitor Report'){
       
       var valid=validate();
           if(valid){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>Ambience/getJanitorReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addjanigraph(obj);
          }
        });
           }
      }
      if(mtype=='None Selected'){
       
       var valid=validate();
           
      }

      
      
     
        
          
      }
      function addjanigraph(data){
        var d =  JSON.parse(JSON.stringify(data));
        document.getElementById("loading").style.display="none";
     document.getElementById("tab").style.display="none";
      document.getElementById("odourleft").style.display="none";
       document.getElementById("odourright").style.display="none";
       document.getElementById("containter1").style.display="none";
       document.getElementById("janitor1").style.display="block";
       document.getElementById("janitor2").style.display="block";
       var ydataswipe = new Array();
         var ydataverify = new Array();
         var ydataswipej2 = new Array();
         var ydataverifyj2 = new Array();
       var xdata = new Array();
      for (i = 0; i < d.length; i++) 
          { 
              xdata[i] = d[i]['Time'];
              ydataswipe[i] = parseInt(d[i]['jani1Swiped']); 
              ydataverify[i] = parseInt(d[i]['jani1verified']); 
              ydataswipej2[i] = parseInt(d[i]['jani2Swiped']); 
              ydataverifyj2[i] = parseInt(d[i]['jani2verified']); 
              
            
          }
          Highcharts.chart('janitor1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Janitor1 Swiped/Verified Graph'
    },
   
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Swiped/Verified'
        }
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Swiped',      
        data: ydataswipe

    }, {
       name: 'Verified',
        data: ydataverify

    }]
});          
   Highcharts.chart('janitor2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Janitor2 Swiped/Verified Graph'
    },
   
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Swiped/Verified'
        }
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Swiped',      
        data: ydataswipej2

    }, {
       name: 'Verified',
        data: ydataverifyj2

    }]
});  
  
  


}
function addOdourData(data){
    var d =  JSON.parse(JSON.stringify(data));
    document.getElementById("loading").style.display="none";
    document.getElementById("tab").style.display="none";
    document.getElementById("odourleft").style.display="block";
    document.getElementById("odourright").style.display="block";
    document.getElementById("containter1").style.display="none";
 document.getElementById("janitor1").style.display="none";
 document.getElementById("janitor2").style.display="none";


    var xdata = new Array();
    var ydata = new Array();

    var xdatahmd = new Array();
    var ydatahmd = new Array();

    var xdataco = new Array();
    var ydataco = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d[0]['left'].length; i++) 
    { 
        xdata[i] = d[0]['left'][i]['ToTime'];
        ydata[i] = parseInt(d[0]['left'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['right'].length; i++) 
    { 
        xdatahmd[i] = d[0]['right'][i]['ToTime'];
        ydatahmd[i] = parseInt(d[0]['right'][i]['CurReading']); 
        
      
    }
    Highcharts.chart('odourleft', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Odour Left'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Odour'
            },
                      tickInterval: 10,
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
            name: 'Odour',
            data: ydata
        }]
    });

    Highcharts.chart('odourright', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Odour Right'
        },
       
        xAxis: {
            categories: xdatahmd
        },
        yAxis: {
            title: {
                text: 'Odour'
            },
          tickInterval: 10,
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
            name: 'Odour',
            data: ydatahmd
        }]
    });

    



}
      function appendData(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list1 tbody").empty();
        var hoursxaxisarray=[];
        var footfallyaxisarray=[];
        document.getElementById("tab").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj.length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>RestRoom</td><td>" +obj[i]['Time'] + "</td><td>" + obj[i]['footfall'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1 tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="block";

        for (var k = 0; k < obj.length; k++) 
        {
          hoursxaxisarray[k]=obj[k]['Time'];
          footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
        }
        addGraph(hoursxaxisarray,footfallyaxisarray);
      }  
      function addGraph(hoursxaxisarray,footfallyaxisarray) 
      {
        if(hoursxaxisarray.length>20){
          document.getElementById("janitor1").style.display="none";
          document.getElementById("janitor2").style.display="none";
        // var data_click = <?php echo $click; ?>;
        // var data_viewer = <?php echo $viewer; ?>;
        $('#containter1').highcharts({
          chart: {
              type: 'column'
          },
          title: {
              text: 'Hourly Per Day Footfall'
          },
          xAxis: {
              categories: hoursxaxisarray
          },
          yAxis: {
              title: {
                  text: 'FootFall'
              }
          },
          series: [{
              name: 'Footfall',
              data: footfallyaxisarray
          }]
        });
        }else{
          document.getElementById("janitor1").style.display="none";
          document.getElementById("janitor2").style.display="none";
        // var data_click = <?php echo $click; ?>;
        // var data_viewer = <?php echo $viewer; ?>;
        $('#containter1').highcharts({
          chart: {
              type: 'column'
          },
          title: {
              text: 'Footfall'
          },
          xAxis: {
              categories: hoursxaxisarray
          },
          yAxis: {
              title: {
                  text: 'FootFall'
              }
          },
          series: [{
              name: 'Footfall',
              data: footfallyaxisarray
          }]
        });
        }

         
      }

  </script>
</head>
<body >
    <div class="Wrapper">
        <div class="Header">
            <div class="Logo">

                <span class="CmpNm"> <img src="<?php echo base_url(); ?>/asset/prkhospitalasset/Images/wenalytics logo.png" class="HdrImg Footfall" /></span>
            </div>
            <div class="UserMenu">
            <a href="<?php echo base_url(); ?>Login/dltlogout"><img class="SgnOt" src="<?php echo base_url(); ?>/asset/ambienceasset/images/MenuLogout-W.png"></a>
                <!-- <span class="UsrNm">Sodexo User</span> -->
            </div>
                      
           
           
        </div>
        <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr">
                <div class="SctnSlctr">
                
                    <span class="SctnNm" onclick="showDashboard()"><a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a></span>
                    <span class="SctnNm" onclick="showReport()">Reports</span>
                </div>
                
                <div class="SctnSrch" style="display: none;" id="reportsid">
                    <ul class="SrchLst">
                        <li>
                            <div class="LstLft"><span class="Txt">Report Type</span></div>
                            <div class="LstRgt">
                                <!-- <input type="text" class="Inpt" value="RestRoom" /> -->
                                <select class="Inpt" id="reports">
                                <option>None Selected</option>
                                    <option>Footfall Report</option>
                                    <option>Odour Graph Report</option>
                                    <option>Janitor Report</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">From date</span></div>
                            <div class="LstRgt"><input type="date" name="fromdate" id="fromdate" data-placeholder="" required aria-required="true"></div>
                        </li>
                        <li style="display: visible" id="dst">
                            <div class="LstLft"><span class="Txt">To date</span></div>
                            <div class="LstRgt"><input type="date" name="todate" id="todate" data-placeholder="" required aria-required="true"></div>
                        </li>
                       
                       
                        <li class="report_btn">
                            <input type="button" class="Btn1" value="Go" onclick="getSodexoReport()";/>

                            <input type="button" class="Btn1"    onclick="resetpage()" value="Reset">
                            <input type="button" class="Btn1"  id="export"   onclick="exportTableToExcel('list1')" style="display: none;margin-left: 10px;" value="Export">
                        </li>
                    </ul>
                   
                </div>
                 <div id="alert"></div>
            </div>
            

            <!-- <div id="DshBrd" class="DshbordCntr"> -->
           
            <div class="CntntHldr table-responsive" id="sodexodata">
                              
            </div>

            <!-- <div class="CntntHldr" id="odourleft">
                              
            </div>
            <div class="CntntHldr" id="odourright">
                              
            </div> -->
            <!-- animation starts -->
            <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <!-- animation end -->

            <div id="tab" style="display: none;">
              <table id ="list1" class="table table-bordered table-hover" style="width: 1200px;">
                <thead><tr><th>SNo</th><th>Meter</th><th>Date/Time</th><th>Footfall</th></tr></thead>

                <tbody>

                </tbody>
              </table>

            </div>
            <div id="containter1" style="display: none;"></div>
             <div id="odourleft" style="display: none;"></div>
              <div id="odourright" style="display: none;"></div>
              <div id="janitor1" style="display: none;"></div>
              <div id="janitor2" style="display: none;"></div>
            
        </div>
      <div class="Footer"><span class="Cpyrght">&copy; www.wenalytics.com</span></div>
    </div>
</body>
<script type="text/javascript">
function resetpage(){

// document.getElementById("sodexodata").style.display='none';
// document.getElementById("reportsid").style.display='block';

// $("#reportsid").load(location.href + " #reportsid");
document.getElementById("reports").value='None Selected';

}
$(function() {
    $("#reports").change(function() {
      var mtype=$('option:selected', this).text();
      if(mtype=='Odour Graph Report'){
        $("#dst").css("display","none");
        document.getElementById("tab").style.display='none';
                  document.getElementById("containter1").style.display='none';
                   document.getElementById("odourleft").style.display='block';
                    document.getElementById("odourright").style.display='block';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";

       
      }
      if(mtype=='Footfall Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='block';
        document.getElementById("containter1").style.display='block';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";

       
      }
      if(mtype=='Janitor Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
        document.getElementById("odourright").style.display='none';
         document.getElementById("janitor1").style.display="block";
         document.getElementById("janitor2").style.display="block";

       
      }
      if(mtype=='None Selected'){
        //$("#dst").css("display","block");
        document.getElementById("tab").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";

       
      }

    });
});
  
  function getReports(){
    //alert("h");

          document.getElementById("loading").style.display="block";
          document.getElementById("tab").style.display='block';
          document.getElementById("sodexodata").style.display='none';
          document.getElementById("reportsid").style.display='block';
          document.getElementById("containter1").style.display='block';
           document.getElementById("odourleft").style.display="block";
       document.getElementById("odourright").style.display="block";
        document.getElementById("janitor1").style.display="block";
        document.getElementById("janitor2").style.display="block";
       
        var urlString = "<?php echo base_url(); ?>Ambience/getSodexoReportLive";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          //data: {fromdate:fromdate,todate:fromdate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData(obj);
          }
        });
  }
  function exportTableToExcel(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'FootfallReport.xls';
    
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

  
</script>
</html>
