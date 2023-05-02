

<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#28b3df">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Dashboard.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Dashboard.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>asset/ambienceasset/asset/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/ambienceasset/asset/Scripts/Script.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <style type="text/css">

  
  
  body{overflow-x:hidden;overflow-y:hidden}
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
  div.Header {
      height:5px!important;
    }
    .SgnOt{
      top: 15px!important;
      /*background-color: #02918d!important;*/
      margin-right:15px!important;
    }
    div.DshbordCntr div.DshbrdHdr div.SctnSlctr span.SctnNm {
      width: 100%!important;
    }
    #Hldrh{
      height:85px;
    }
@media only screen and (max-width: 768px) {
  #Hldrh{
      height:180px;
    }
}
  span.SctnNm a{
color:white!important;
text-decoration: none!important;
}  

div#sodexodatahead{
 position: -webkit-sticky!important;
  position: sticky!important;
  top: 0!important;
    padding-right: 7px!important;

}
div#Hdrname{
  width:16%!important;
}
div.DshbordCntr div.CntntHldr div.CntntDtls div.Frst {
    width: 15%!important;
    border-left: none!important;
}
div#sodexodata{
position: absolute!important;
    top: 180px!important;
    bottom: 20px!important;
    right: 0!important;
    margin: 0px 15px 0px 15px!important;
    background: #fff!important;
    left: 0!important;
    overflow-y: auto!important;

}

.Wrapper{margin: 15px!important;} 
  .content-details{
  background: #fff;
    padding: 10px;
  display: flex;
}
div.DshbordCntr{margin:0px!important}
.content-box{
  width: 24%!important;
  border-left: none;
  background: #e1f0f0;
  box-sizing: border-box;
    padding: 15px 10px 10px 10px;
    border-bottom: 1px solid #b9dcdb;
  border-left: 1px solid #b9dcdb;
  color: #07716f;
    font: 14px 'Open Sans';
    text-align: center;
    padding: 20px 0 0 0;
  height:90px
  }
.first{width: 24%!important;}
.secnd{width: 30%!important;}
.content-box img{text-align:center}
.content-box div{padding:5px;}

.RFID{width:35px;}
.table-responsive{padding:0px!important;background: #e1f0f0!important}
div.DshbordCntr div.CntntHldr div.CntntDtls div.Scnd div.Dtls{padding: 0px 10px 10px 10px;}
/*.Footer {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
   
    height: 30px;
}*/
.Footer{background: #02918d;clear: both;bottom: 0px;position: absolute;text-align: center;width: 100%;}
.con-data{height:500px; overflow-y:scroll}
.style-2::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  border-radius: 10px;
  background-color: #F5F5F5;
}

.style-2::-webkit-scrollbar
{
  width: 12px;
  background-color: #F5F5F5;
}

.style-2::-webkit-scrollbar-thumb
{
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #b9dcdb;
}
div.DshbordCntr div.CntntHldr div.CntntDtls > div{border-left:none!important}

    </style>
    <script type="text/javascript">    
     
      var initTopPosition= $('#sodexodatahead').offset().top;   
$(window).scroll(function(){
    if($(window).scrollTop() > initTopPosition)
        $('#sodexodatahead').css({'position':'fixed','top':'0px'});
    else
        $('#sodexodatahead').css({'position':'absolute','top':initTopPosition+'px'});
});
     
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
        type: 'column',
        height:200
    },

    credits: {
        enabled: false
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
        type: 'column',
        height:200
    },

    credits: {
        enabled: false
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
        type: 'column',
        height:200
    },

    credits: {
        enabled: false
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
        data: ypoor,
        color:'#ca5555'
    }, {
        name: 'Average',
        data: yavg,
        color:'#d6ce68'
    }, {
        name: 'Good',
        data: ygood,
        color:'#67b777'
    }],
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
            type: 'line',
        height:200
        },

    credits: {
        enabled: false
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
            type: 'line',
        height:200
        },

    credits: {
        enabled: false
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
        for (var i = 0; i < obj['hoursxaxisarray'].length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>RestRoom</td><td>" +obj['hoursxaxisarray'][i] +" To "+obj['hoursxaxisarray'][i+1]+ "</td><td>" + obj['footfallyaxisarray'][i] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1 tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="block";

        
        addGraph(obj['hoursxaxisarray'],obj['footfallyaxisarray']);
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
        // var data_click = ;
        // var data_viewer = ;
        $('#containter1').highcharts({
          chart: {
              type: 'column'
          },

    credits: {
        enabled: false
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
        // var data_click = ;
        // var data_viewer = ;
        $('#containter1').highcharts({
          chart: {
              type: 'column'
          },

    credits: {
        enabled: false
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

              <!--  <span class="CmpNm"> <img src="/asset/prkhospitalasset/Images/wenalytics logo.png" class="HdrImg Footfall" /></span>  -->
            </div>  
            <div class="UserMenu">
            <a href="<?php echo base_url(); ?>Login/wdemologout"><img class="SgnOt" src="<?php echo base_url(); ?>asset/ambienceasset/images/MenuLogout-C.png"></a>
                <!-- <span class="UsrNm">Sodexo User</span> -->
            </div>
                      
           
           
        </div>
        <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr">
                <div class="row SctnSlctr">
        <div class="col-md-6">
                    <span class="SctnNm"><a href="<?php echo base_url(); ?>Demo2/DemoDashboard/demoData">Dashboard</a></span>
        </div>
          <!--          <li>
<a href="" class="Lnk"><span class="Txt">Dashboard1</span></a>
</li>
<li>
<a href="" class="Lnk"><span class="Txt"><a href="">Report1</a></span>
</li> -->
          <div class="col-md-6">
            <span class="SctnNm"><a href="<?php echo base_url(); ?>Demo2/DemoDashboard/getReport">Reports</a></span>
          </div>
                </div>
                
               
                 <div id="alert"></div>
            </div>
            
      <div class="lds-ellipsis" id="loading1" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <div id="DshBrd" class="DshbordCntr"  style="margin-left: 0px;margin-right: 0px;" > 
           
            <div class="CntntHldr table-responsive">
            
            <div class="CntntDtls Hdr" id="sodexodatahead"><div class="Frst Hdr"><span class="MnTtl">Dashboard</span></div><div class="Dtls Hdr"  id="Hdrname"><img src="/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg RFID" /><span class="HdrTtl">RFID Janitor Attendance</span></div><div class="Dtls Hdr"  id="Hdrname"><img src="/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Right</span></div><div class="Dtls Hdr"  id="Hdrname"><img src="/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Left</span></div><div class="Dtls Hdr"  id="Hdrname"><img src="/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Footfall" /><span class="HdrTtl">Footfall Sensor</span></div><div class="Dtls Hdr Lst"><img src="/asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Feedback" /><span class="HdrTtl">Feedback Buttons</span></div></div>
            <div class="style-2"  id="sodexodata"></div>
            <!-- end head  -->
                              
            </div>  

      
      
            <!-- <div class="CntntHldr" id="odourleft">
                              
            </div>
            <div class="CntntHldr" id="odourright">
                              
            </div> -->
            <!-- animation starts -->
            <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <!-- animation end -->
      <div class="con-head"></div>
      <div class="con-data">
            <div id="tab" style="display: none;">
              <table id ="list1" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Meter</th><th>Date/Time</th><th>Footfall</th></tr></thead>

                <tbody>

                </tbody>
              </table>

            </div>
      </div>
      <div class="con-data">
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
            </div>
      
              <div id="containter1" style="display: none;"></div>
              <div id="odourleft" style="display: none;"></div>
              <div id="odourright" style="display: none;"></div>
              <div id="janitor1" style="display: none;"></div>
              <div id="janitor2" style="display: none;"></div>
              <div id="feedback" style="display: none;"></div>
            
        </div></div>

      <div class="Footer"><span class="Cpyrght">&copy; www.wenalytics.com</span></div>
    </div>
</body>
<script type="text/javascript">

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
     document.getElementById("loading1").style.display="block";
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    console.log(today);
   
      var urlString = "<?php echo base_url(); ?>Demo2/getSodexoData";
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
      // div+='<div class="CntntDtls Hdr"><div class="Frst Hdr"><span class="MnTtl">Dashboard</span></div><div class="Dtls Hdr"><img src="http://wenalytics.in//asset/ambienceasset/asset/Images/Blank.png" class="HdrImg RFID" /><span class="HdrTtl">RFID Janitor Attendance</span></div><div class="Dtls Hdr"><img src="http://wenalytics.in//asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Right</span></div><div class="Dtls Hdr"><img src="http://wenalytics.in//asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Stink" /><span class="HdrTtl">Odour Left</span></div><div class="Dtls Hdr"><img src="http://wenalytics.in//asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Footfall" /><span class="HdrTtl">Footfall Sensor</span></div><div class="Dtls Hdr Lst"><img src="http://wenalytics.in//asset/ambienceasset/asset/Images/Blank.png" class="HdrImg Feedback" /><span class="HdrTtl">Feedback Buttons</span></div></div>'; 
     div+='<div class="CntntDtls"><div class="Frst"><span class="TlNm Bld Txt">Demo Washroom</span><span class="Txt Bld">Address:</span><span class="Txt">Noida</span></div><div class="Scnd"><div class="Dtls RFID"><div id="Hldrh"><div class="Hldr"><span class="Txt">No. of times swiped</span><span class="TxtHghlgt">'+d[0]['swiped']+'</span></div><div class="Hldr"><span class="Txt">No.of times cleaning verified</span><span class="TxtHghlgt">'+d[0]['verified']+'</span></div></div><div class="Hldr"><input type="button" class="Btn" value="Details"></div></div><div class="Dtls Footfall"><div id="Hldrh"> <div class="Hldr"><span class="Txt">Odour Level</span><span class="TxtHghlgt">'+d[0]['OdourMaleRight']+' ppm</span></div></div><div class="Hldr"><input type="button" class="Btngreen" id="Btngreen" value="Acceptable"></div></div><div class="Dtls Footfall"><div id="Hldrh"><div class="Hldr"><span class="Txt">Odour Level</span><span class="TxtHghlgt">'+d[0]['OdourMaleLeft']+' ppm</span></div></div><div class="Hldr"><input type="button" class="Btngreenl" id="Btngreenl" value="Acceptable"></div></div><div class="Dtls Footfall"><div id="Hldrh"><div class="Hldr"><span class="Txt">No. of Persons Walked In</span><span class="TxtHghlgt">'+d[0]['footfallcountMale']+'</span></div></div><a href="<?php echo site_url('Demo2/getReport/1'); ?>"><div class="Hldr"><input type="button" id="getreport" class="Btn"  value="Details"> </div></div></a><div class="Dtls Feedback"><div class="Hldr"><span class="Txt">Feedback</span></div><div class="Hldr Fdbck Good"><span class="Grade">Good</span><span class="Value">'+d[0]['good']+'/'+d[0]['feedbacktotal']+'</span></div><div class="Hldr Fdbck Average"><span class="Grade">Average</span><span class="Value">'+d[0]['avg']+'/'+d[0]['feedbacktotal']+'</span></div><div class="Hldr Fdbck Bad"><span class="Grade">Bad</span><span class="Value">'+d[0]['poor']+'/'+d[0]['feedbacktotal']+'</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Hand Towel</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Blank.png" class="HndTwl Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="handavl" style="display: visible;">Available</span><span class="Stext" id="handnoavl" style="display: none;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Toilet Rolls</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Blank.png" class="TltRlls Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="toiletrollavl" style="display: none;">Available</span><span class="Stext" id="toiletrollnoavl" style="display: visible;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Dustbin</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Blank.png" class="DstBn Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="dustbinavl" style="display: none;">Available</span><span class="Stext" id="dustbinnoavl" style="display: visible;">Not Available</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Floor</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Blank.png" class="Flr Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="flooravl" style="display: visible;">Dry</span><span class="NATxt" id="floornoavl" style="display: none;">FloorWet</span></div></div><div class="Dtls TltDtt"><div class="InnrDtls TxtTtl">Hand Soap</div><div class="InnrDtls ImgHldr"><img src="<?php echo base_url(); ?>asset/ambienceasset/asset/Images/Blank.png" class="HndSp Actv" /></div><div class="InnrDtls Stts"><span class="ATxt" id="handsoapavl" style="display: visible;">Available</span><span class="Stext" id="handsoapnoavl" style="display: none;">Not Available</span></div></div><div class="Dtls TltDtt1" id="janitorsv" style="display: none;"></div><div class="Dtls TltDtt1" id="odourrightdashboard" style="display: none;"></div><div class="Dtls TltDtt1" id="odourleftdashboard" style="display: none;"></div><div class="Dtls TltDtt1" id="footfalllive" style="display: none;"></div><div class="Dtls TltDtt1" id="feedbacklive" style="display: none;"></div></div></div>';

       // 
      
      $container.append(div);
     
     
      var urlString = "<?php echo base_url(); ?>Demo2/getJanitorReportLive";
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
        var urlStringOdour = "<?php echo base_url(); ?>Demo2/getOudorLevelReportLiveDashboard";
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
       var urlStringFootfall = "<?php echo base_url(); ?>Demo2/getSodexoReportLive";
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
         var urlStringFeedback = "<?php echo base_url(); ?>Demo2/getFeedbackReportLive";
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
    document.getElementById("loading1").style.display="none";
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
        Highcharts.chart('feedbacklive', {
  chart: {
      type: 'column',
      height:200
  },

    credits: {
        enabled: false
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
      data: ypoor,
      color:'#ca5555'
  }, {
      name: 'Average',
      data: yavg,
      color:'#d6ce68'
  }, {
      name: 'Good',
      data: ygood,
      color:'#67b777'
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
   
    var xdata = d['xdata'];
    var ydata = d['ydata'];

    var xdatahmd = d['xdatahmd'];
    var ydatahmd = d['ydatahmd'];

    
    
    Highcharts.chart('odourleftdashboard', {
        chart: {
            type: 'line',
        height:200
        },

    credits: {
        enabled: false
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
            type: 'line',
        height:200
        },

    credits: {
        enabled: false
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
        var hoursxaxisarray = obj['hoursxaxisarray'];
    var footfallyaxisarray = obj['footfallyaxisarray'];
        document.getElementById("footfalllive").style.display="block";

        
         $('#footfalllive').highcharts({
          chart: {
              type: 'column'
          },

    credits: {
        enabled: false
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
         var ydataswipej2 = data['ydataswipej2'];
         var ydataverifyj2 = data['ydataverifyj2'];
       var xdata =data['xdata'];
      
                   
   Highcharts.chart('janitorsv', {
    chart: {
        type: 'column',
        height:200
    },

    credits: {
        enabled: false
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
  var urlString = "<?php echo base_url(); ?>Demo2/getSodexoReportLive";
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
          document.getElementById("sodexodatahead").style.display='none';
          document.getElementById("reportsid").style.display='block';
          document.getElementById("containter1").style.display='block';
           document.getElementById("odourleft").style.display="block";
       document.getElementById("odourright").style.display="block";
        document.getElementById("janitor1").style.display="block";
        document.getElementById("janitor2").style.display="block";
        document.getElementById("feedback").style.display="block";
       
        var urlString = "<?php echo base_url(); ?>Demo2/getSodexoReportLive";
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
  
  

  
</script>
</html>

