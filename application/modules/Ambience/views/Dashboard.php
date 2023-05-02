<?php 
//print_r($this->session->userdata());
// echo base_url()."asset/Jquery/ajaxQueuePlugin.js";die();
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
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
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
          .tick0::after {
  content: '\2715';
  font-size: 20px;
  line-height: 20px;
  font-weight: bold;
  color: red;
}
.tick1::after {
  content: '\2713';
  font-size: 20px;
  line-height: 20px;
  font-weight: bold;
  color: green;
}
.Table{
    width: 100%;
    table-layout: fixed;
}
.fd{
  text-transform:capitalize;
}
#list2 td
{
    text-align: center; 
    vertical-align: middle;
}
#list2 th 
{
    text-align: center; 
    vertical-align: middle;
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
        location.reload();
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
        if(mtype=='Supervisor Report'){
          var valid1=validate1();
           if(valid1){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        // var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>Ambience/getSupervisorDayData";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendSupervsrData(obj);
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
      if(mtype=='Feedback Report'){
       
       var valid=validate();
           if(valid){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>Ambience/getFeedbackReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addfeedbackgraph(obj);
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
       document.getElementById("feedback").style.display="none";
       document.getElementById("supervsr").style.display="none";
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
function addfeedbackgraph(data){
        var d =  JSON.parse(JSON.stringify(data));
        document.getElementById("loading").style.display="none";
     document.getElementById("tab").style.display="none";
      document.getElementById("odourleft").style.display="none";
       document.getElementById("odourright").style.display="none";
       document.getElementById("containter1").style.display="none";
       document.getElementById("janitor1").style.display="none";
       document.getElementById("janitor2").style.display="none";
       document.getElementById("feedback").style.display="block";
      
         var ygood = new Array();
         var yavg= new Array();
         var ypoor = new Array();
         var xdata = new Array();
      for (i = 0; i < d.length; i++) 
          { 
              xdata[i] = d[i]['Time'];
              ygood[i] = parseInt(d[i]['good']); 
              yavg[i] = parseInt(d[i]['avg']); 
              ypoor[i] = parseInt(d[i]['poor']); 
             
              
            
          }
          Highcharts.chart('feedback', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Feedback Graph'
    },
   
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Feedback'
        }
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Poor',      
        data: ypoor

    }, {
       name: 'Average',
        data: yavg

    }
    , {
       name: 'Good',
        data: ygood

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
 document.getElementById("feedback").style.display="none";
 document.getElementById("supervsr").style.display="none";


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
      function appendSupervsrData(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list2 tbody").empty();
        $("#list3 tbody").empty();
        document.getElementById("supervsr").style.display="block";
        var rows="";
        var rows1="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj.length; i++) 
        {
          var ht,tr,dst,fwd,hs,od;
          if(obj[i]['HandTowel']==0){
            ht="NO";
          }else{
            ht="YES";
          }
          if(obj[i]['Toiletroll']==0){
            tr="NO";
          }else{
            tr="YES";
          }
          if(obj[i]['Dustbin']==0){
            dst="NO";
          }else{
            dst="YES";
          }
          if(obj[i]['FloorWetDry']==0){
            fwd="NO";
          }else{
            fwd="YES";
          }
          if(obj[i]['HandSoap']==0){
            hs="NO";
          }else{
            hs="YES";
          }
          if(obj[i]['Odour']==0){
            od="NO";
          }else{
            od="YES";
          }
          rows+='<tr><td>'+j+'</td><td>'+obj[i]['Time']+'</td><td><div class="tick'+obj[i]['HandTowel']+'"></div></td><td><div class="tick'+obj[i]['Toiletroll']+'"></div></td><td><div class="tick'+obj[i]['Dustbin']+'"></div></td><td><div class="tick'+obj[i]['FloorWetDry']+'"></div></td><td><div class="tick'+obj[i]['HandSoap']+'"></div></td><td><div class="tick'+obj[i]['Odour']+'"></div></td><td><div class="fd">'+obj[i]['Feedback']+'</div></td></tr>';
          rows1+='<tr><td>'+j+'</td><td>'+obj[i]['Time']+'</td><td>'+ht+'</td><td>'+tr+'</td><td>'+dst+'</td><td>'+fwd+'</td><td>'+hs+'</td><td>'+od+'</td><td><div class="fd">'+obj[i]['Feedback']+'</div></td></tr>';
               
          j++;    
        }
        

        $(rows).appendTo("#list2 tbody");
        $(rows1).appendTo("#list3 tbody");

        document.getElementById("loading").style.display="none";
        document.getElementById("export1").style.display="block";

      } 
      function addGraph(hoursxaxisarray,footfallyaxisarray) 
      {
        if(hoursxaxisarray.length>20){
          document.getElementById("janitor1").style.display="none";
          document.getElementById("janitor2").style.display="none";
          document.getElementById("feedback").style.display="none";
          document.getElementById("supervsr").style.display="none";
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
          document.getElementById("feedback").style.display="none";
          document.getElementById("supervsr").style.display="none";
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
<body onload="fetchSodexoData()">
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
                    <span class="SctnNm" onclick="showDashboard()">Dashboard</span>
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
                                    <option>Feedback Report</option>
                                    <option>Supervisor Report</option>
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
                            <input type="button" class="Btn1"  id="export1"   onclick="exportTableToExcel1('list3')" style="display: none;margin-left: 10px;" value="Export">
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
              <table id ="list1" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Meter</th><th>Date/Time</th><th>Footfall</th></tr></thead>

                <tbody>

                </tbody>
              </table>

            </div>
            <div id="supervsr" style="display: none;">
              <table id ="list2" class="table table-bordered table-hover" style="width: 100%;border: 1px">
                <thead><tr><th>SNo</th><th>Checking Time</th><th>Hand Towel</th><th>Toilet Roll</th><th>Dustbin</th><th>Floor Wet/Dry</th><th>Handsoap</th><th>Odour</th><th>Feedback</th></tr></thead>

                <tbody>
                
                </tbody>
              </table>
              <table id ="list3" class="table table-bordered table-hover" style="width: 100%;border: 1px;display: none;">
                <thead><tr><th>SNo</th><th>Checking Time</th><th>Hand Towel</th><th>Toilet Roll</th><th>Dustbin</th><th>Floor Wet/Dry</th><th>Handsoap</th><th>Odour</th><th>Feedback</th></tr></thead>

                <tbody>
                
                </tbody>
              </table>
            </div>
            <div id="containter1" style="display: none;"></div>
             <div id="odourleft" style="display: none;"></div>
              <div id="odourright" style="display: none;"></div>
              <div id="janitor1" style="display: none;"></div>
              <div id="janitor2" style="display: none;"></div>
              <div id="feedback" style="display: none;"></div>
            
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
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";

       
      }
       if(mtype=='Supervisor Report'){
        $("#dst").css("display","none");
                 document.getElementById("tab").style.display='none';
                  document.getElementById("containter1").style.display='none';
                   document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="block";

       
      }
      if(mtype=='Footfall Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='block';
        document.getElementById("containter1").style.display='block';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";

       
      }
      if(mtype=='Janitor Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
        document.getElementById("odourright").style.display='none';
         document.getElementById("janitor1").style.display="block";
         document.getElementById("janitor2").style.display="block";
         document.getElementById("feedback").style.display="none";
         document.getElementById("supervsr").style.display="none";


       
      }
      if(mtype=='Feedback Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
        document.getElementById("odourright").style.display='none';
         document.getElementById("janitor1").style.display="none";
         document.getElementById("janitor2").style.display="none";
         document.getElementById("feedback").style.display="block";

       
      }
      if(mtype=='None Selected'){
        //$("#dst").css("display","block");
        document.getElementById("tab").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";

       
      }

    });
});
  setInterval(fetchSodexoData, 1000000);
  function fetchSodexoData()
  {
     // document.getElementById("janitor").style.display="none";
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    console.log(today);
   
      var urlString = "<?php echo base_url();  ?>Ambience/getSodexoData";
      $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {date:today},
          success: function(data){
            console.log("success"+data);
            displaySodexoData(data);
          }
        });
  }
  function displaySodexoData(data)
  {
      var d = JSON.parse(data);
      $("#sodexodata").empty();
      var $container = $("#sodexodata");
      var div=''; 
      div+='<div class="CntntDtls Hdr"><div class="Frst Hdr"><span class="MnTtl">Dashboard</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg RFID" /><span class="HdrTtl">RFID Janitor Attendance</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Right</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Left</span></div><div class="Dtls Hdr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Footfall" /><span class="HdrTtl">Footfall Sensor</span></div><div class="Dtls Hdr Lst"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Feedback" /><span class="HdrTtl">Feedback Buttons</span></div></div>'; 
     div+='<div class="CntntDtls"><div class="Frst"><span class="TlNm Bld Txt">Ambience Tower 5th Floor</span><span class="Txt Bld">Address:</span><span class="Txt">Gurgaon</span></div><div class="Scnd"><div class="Dtls RFID"><div class="Hldr"><span class="Txt">No. of times swiped</span><span class="TxtHghlgt">'+d[0]['swiped']+'</span></div><div class="Hldr"><span class="Txt">No.of times cleaning verified</span><span class="TxtHghlgt">'+d[0]['verified']+'</span></div><div class="Hldr"><input type="button" class="Btn" value="Details"></div></div><div class="Dtls Footfall"><div class="Hldr"><span class="Txt">Odour Level</span><span class="TxtHghlgt">'+d[0]['OdourMaleRight']+' ppm</span></div><div class="Hldr"><input type="button" class="Btngreen" id="Btngreen" value="Acceptable"></div></div><div class="Dtls Footfall"><div class="Hldr"><span class="Txt">Odour Level</span><span class="TxtHghlgt">'+d[0]['OdourMaleLeft']+' ppm</span></div><div class="Hldr"><input type="button" class="Btngreenl" id="Btngreenl" value="Acceptable"></div></div><div class="Dtls Footfall"><div class="Hldr"><span class="Txt">No. of Persons Walked In</span><span class="TxtHghlgt">'+d[0]['footfallcountMale']+'</span></div><div class="Hldr"><input type="button" id="getreport" class="Btn" onclick="getReports()" value="Details"></div></div><div class="Dtls Feedback"><div class="Hldr"><span class="Txt">Feedback</span></div><div class="Hldr Fdbck Good"><span class="Grade">Good</span><span class="Value">'+d[0]['good']+'/'+d[0]['feedbacktotal']+'</span></div><div class="Hldr Fdbck Average"><span class="Grade">Average</span><span class="Value">'+d[0]['avg']+'/'+d[0]['feedbacktotal']+'</span></div><div class="Hldr Fdbck Bad"><span class="Grade">Bad</span><span class="Value">'+d[0]['poor']+'/'+d[0]['feedbacktotal']+'</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Hand Towel</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HndTwl Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="handavl" style="display: visible;">Available</span><span class="Stext" id="handnoavl" style="display: none;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Toilet Rolls</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="TltRlls Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="toiletrollavl" style="display: none;">Available</span><span class="Stext" id="toiletrollnoavl" style="display: visible;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Dustbin</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="DstBn Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="dustbinavl" style="display: none;">Available</span><span class="Stext" id="dustbinnoavl" style="display: visible;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Floor</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="Flr Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="flooravl" style="display: visible;">Dry</span><span class="NATxt" id="floornoavl" style="display: none;">FloorWet</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Hand Soap</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>/asset/ambienceasset/asset/Images/Blank.png" class="HndSp Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="handsoapavl" style="display: visible;">Available</span><span class="Stext" id="handsoapnoavl" style="display: none;">Not Available</span></div></div><div class="Dtls TltDtt1" id="janitorsv" style="display: none;"></div><div class="Dtls TltDtt1" id="odourrightdashboard" style="display: none;"></div><div class="Dtls TltDtt1" id="odourleftdashboard" style="display: none;"></div><div class="Dtls TltDtt1" id="footfalllive" style="display: none;"></div><div class="Dtls TltDtt1" id="feedbacklive" style="display: none;"></div></div></div>';

       // 
      
      $container.append(div);
     
     
      var urlString = "<?php echo base_url(); ?>Ambience/getJanitorReportLive";
        $.ajaxQueue({
          url:urlString,
          type : 'GET',
          async: true,
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addjanigraphLive(obj);
          }
        });
        var urlStringOdour = "<?php echo base_url(); ?>Ambience/getOudorLevelReportLiveDashboard";
        $.ajaxQueue({
          url:urlStringOdour,
          type : 'GET',
          async: true,         
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addOdourDataLiveDashboard(obj);
          }
        }); 
       var urlStringFootfall = "<?php echo base_url(); ?>Ambience/getSodexoReportLive";
        $.ajaxQueue({
          url:urlStringFootfall,
          type : 'GET',
          async: true,
          //data: {fromdate:fromdate,todate:fromdate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendFootfallLive(obj);
          }
        });
         var urlStringFeedback = "<?php echo base_url(); ?>Ambience/getFeedbackReportLive";
        $.ajax({
          url:urlStringFeedback,
          type : 'GET',
          async: true,
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addfeedbackgraphLive(obj);
          }
        });
        function addfeedbackgraphLive(data){
        var d =  JSON.parse(JSON.stringify(data));        
       document.getElementById("feedbacklive").style.display="block";
      
         var ygood = new Array();
         var yavg= new Array();
         var ypoor = new Array();
         var xdata = new Array();
      for (i = 0; i < d.length; i++) 
          { 
              xdata[i] = parseInt(d[i]['Time']);
              ygood[i] = parseInt(d[i]['good']); 
              yavg[i] = parseInt(d[i]['avg']); 
              ypoor[i] = parseInt(d[i]['poor']); 
             
              
            
          }
          Highcharts.chart('feedbacklive', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: xdata
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Feedback'
        },
        tickInterval: 1,
        stackLabels: {
            enabled: false,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
   
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [{
        name: 'Poor',
        data: ypoor
    }, {
        name: 'Average',
        data: yavg
    }, {
        name: 'Good',
        data: ygood
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top'
                }
            }
        }]
    }
});
                 
   

}
           function addOdourDataLiveDashboard(data){
    var d =  JSON.parse(JSON.stringify(data));
   
    document.getElementById("odourleftdashboard").style.display="block";
    document.getElementById("odourrightdashboard").style.display="block";
      document.getElementById("tab").style.display='none';
   
    var xdata = new Array();
    var ydata = new Array();

    var xdatahmd = new Array();
    var ydatahmd = new Array();

    var xdataco = new Array();
    var ydataco = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d[0]['left'].length; i++) 
    { 
        xdata[i] = parseInt(d[0]['left'][i]['ToTime']);
        ydata[i] = parseInt(d[0]['left'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d[0]['right'].length; i++) 
    { 
        xdatahmd[i] = parseInt(d[0]['right'][i]['ToTime']);
        ydatahmd[i] = parseInt(d[0]['right'][i]['CurReading']); 
        
      
    }
    Highcharts.chart('odourleftdashboard', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Odour'
            },
                      tickInterval: 20,
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
            name: 'Odour Left',
            data: ydata
        }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top'
                }
            }
        }]
    }
    });

    Highcharts.chart('odourrightdashboard', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
       
        xAxis: {
            categories: xdatahmd
        },
        yAxis: {
            title: {
                text: 'Odour'
            },
          tickInterval: 20,
                      min:0  

        },

        plotOptions: {
           
             line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
        },
       
        series: [{
            name: 'Odour Right',
            data: ydatahmd
        }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top'
                }
            }
        }]
    }
    });
}
function appendFootfallLive(obj)
      {
        var hoursxaxisarray = new Array();
    var footfallyaxisarray = new Array();
        document.getElementById("footfalllive").style.display="block";

        for (var k = 0; k < obj.length; k++) 
        {
          hoursxaxisarray[k]=parseInt(obj[k]['Time']);
          footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
        }
         $('#footfalllive').highcharts({
          chart: {
              type: 'column'
          },
          title: {
              text: ''
          },
          xAxis: {
              categories: hoursxaxisarray
          },
          yAxis: {
              title: {
                  text: 'FootFall'
              },tickInterval: 3,
                      min:0 ,
                      maxPadding: 1.5
          },
          series: [{
              name: 'Footfall',
              data: footfallyaxisarray
          }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top'
                }
            }
        }]
    }
        });
      }
        function addjanigraphLive(data){
        var d =  JSON.parse(JSON.stringify(data));
       
       document.getElementById("janitorsv").style.display="block";
         document.getElementById("tab").style.display='none';
      
       var ydataswipe = new Array();
         var ydataverify = new Array();
         var ydataswipej2 = new Array();
         var ydataverifyj2 = new Array();
       var xdata = new Array();
      for (i = 0; i < d.length; i++) 
          { 
              xdata[i] = parseInt(d[i]['Time']);
            
              ydataswipej2[i] = parseInt(d[i]['janiSwiped']); 
              ydataverifyj2[i] = parseInt(d[i]['janiverified']); 
              
            
          }
                   
   Highcharts.chart('janitorsv', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
   
    xAxis: {
        categories: xdata,
        crosshair: true,
         maxPadding: 2.5 
    },
    yAxis: {
      tickInterval: 1,
        min: 0,
        title: {
            text: 'Swiped/Verified'
        },
                      maxPadding: 0.5 
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.6,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Swiped',      
        data: ydataswipej2

    }, {
       name: 'Verified',
        data: ydataverifyj2

    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top'
                }
            }
        }]
    }
});  
  
  


}
//odour
var myEl = document.getElementById('getreport');

myEl.addEventListener('click', function() {
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
    
}, false);
if (d[0]['OdourMaleRight']>=0 && d[0]['OdourMaleRight']<55 ) {
$('#Btngreen').val("Clean");
}
if (d[0]['OdourMaleRight']>=55 && d[0]['OdourMaleRight']<125 ) {
$('.Btngreen').addClass('Btnyellow').removeClass('Btngreen');
$('#Btngreen').val("Acceptable");
}
if (d[0]['OdourMaleRight']>125 ) {
$('.Btngreen').addClass('Btnred').removeClass('Btngreen');
$('#Btngreen').val("Unacceptable");
}


if (d[0]['OdourMaleLeft']>=0 && d[0]['OdourMaleLeft']<55 ) {
$('#Btngreenl').val("Clean");
}
if (d[0]['OdourMaleLeft']>=55 && d[0]['OdourMaleLeft']<125 ) {
$('.Btngreenl').addClass('Btnyellowl').removeClass('Btngreenl');
$('#Btngreenl').val("Acceptable");
}
if (d[0]['OdourMaleLeft']>125 ) {
$('.Btngreenl').addClass('Btnredl').removeClass('Btngreenl');
$('#Btngreenl').val("Unacceptable");
}
//oudor end
      if(d[1]['HandTowel']==1){
          $("#handavl").show();
          $("#handnoavl").hide();
      }else{
          $("#handavl").hide();
          $("#handnoavl").show(); 
                 
      }  
      if(d[1]['DustbinFull']==1){
          $("#dustbinavl").show();
          $("#dustbinnoavl").hide();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');
      }else{
          $("#dustbinavl").hide();
          $("#dustbinnoavl").show();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');

      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl").show();
          $("#toiletrollnoavl").hide();
      }else{
          $("#toiletrollavl").hide();
          $("#toiletrollnoavl").show();
      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl").show();
          $("#toiletrollnoavl").hide();
      }else{
          $("#toiletrollavl").hide();
          $("#toiletrollnoavl").show();
      }
      if(d[1]['FloorWet']==1){
          $("#flooravl").show();
          $("#floornoavl").hide();
      }else{
          $("#flooravl").hide();
          $("#floornoavl").show();
      }
      if(d[1]['HandSoap']==1){
          $("#handsoapavl").show();
          $("#handsoapnoavl").hide();
      }else{
          $("#handsoapavl").hide();
          $("#handsoapnoavl").show();
      }

      if(d[1]['HandTowel']==1){
          $("#handavl").show();
          $("#handnoavl").hide();
      }else{
          $("#handavl").hide();
          $("#handnoavl").show(); 
                 
      }  
      if(d[1]['DustbinFull']==1){
          $("#dustbinavl1").show();
          $("#dustbinnoavl1").hide();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');
      }else{
          $("#dustbinavl1").hide();
          $("#dustbinnoavl1").show();
          $('.DstBn Actv').addClass('DstBn NA Actv').removeClass('DstBn Actv');

      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl1").show();
          $("#toiletrollnoavl1").hide();
      }else{
          $("#toiletrollavl1").hide();
          $("#toiletrollnoavl1").show();
      }
      if(d[1]['Toiletroll']==1){
          $("#toiletrollavl1").show();
          $("#toiletrollnoavl1").hide();
      }else{
          $("#toiletrollavl1").hide();
          $("#toiletrollnoavl1").show();
      }
      if(d[1]['FloorWet']==1){
          $("#flooravl1").show();
          $("#floornoavl1").hide();
      }else{
          $("#flooravl1").hide();
          $("#floornoavl1").show();
      }
      if(d[1]['HandSoap']==1){
          $("#handsoapavl1").show();
          $("#handsoapnoavl1").hide();
      }else{
          $("#handsoapavl1").hide();
          $("#handsoapnoavl1").show();
      }

  }
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
        document.getElementById("feedback").style.display="block";
       
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
  function exportTableToExcel1(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'SupervisorReport.xls';
    
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
