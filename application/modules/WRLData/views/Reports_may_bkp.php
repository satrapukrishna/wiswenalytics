<?php 
//print_r($this->session->userdata());
// echo base_url()."asset/Jquery/ajaxQueuePlugin.js";die();
//echo $id;die();
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
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <style type="text/css">
  body{overflow-x:hidden;overflow-y:hidden}
  .Wrapper{margin: 15px!important;} 
  div.DshbordCntr{margin:0px!important}

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
span.SctnNm a{
color:white!important;
text-decoration: none!important;
}
#links{
/*width: 40%!important;
    padding: 0px 10px!important;*/
}
div.DshbordCntr div.DshbrdHdr div.SctnSrch ul.SrchLst li {padding: 15px 5px 10px 5px!important;}
.middle-content{position: absolute!important;
    top: 185px!important;
    bottom: 20px!important;
    right: 0!important;
    margin: 0px 15px 0px 15px!important;
    background: #fff!important;
    left: 0!important;
overflow-y: auto!important;}
table th{color:#02918d!important}
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
.btnrset{
      background: #07716f;
    color: #fff;
    padding: 5px 0;
    font: 600 11px 'Open Sans';
    cursor: pointer;
    border: none;
    width: 30%;
    border-radius: 10px;
    text-transform: uppercase;
    text-align: center;
  }
  .btnrset:hover{
    color: #fff;
    text-decoration: none;

  }
    </style>
    <script type="text/javascript">  
    <?php if($id==1){ ?>
   
     var g=<?php echo $id; ?>;
     if(g==1){
      //document.getElementById("loading").style.display="block";
           var dt = new Date();
            var fromdate = dt.getFullYear()+"-"+(dt.getMonth() + 1)+"-"+dt.getDate();
            //alert(fromdate);
            //var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getSodexoReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:fromdate},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendDataFootfalldatails(obj);
          }
        });
     }
      <?php }?>  
      function showReport()
      {
          // alert("welcome report ui");
          //document.getElementById("tab").style.display='block';
          document.getElementById("sodexodata").style.display='none';
          document.getElementById("sodexodatahead").style.display='none';
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
  function validate3(){
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
        
        $( "#consolidate" ).empty();
        
         
        //var fromtime = document.getElementById("fromtime").value;
       // var totime = document.getElementById("totime").value;
       // 
       var mtype= $("#reports option:selected").text();
       var location= $('#location').val();
       

      //  if(mtype=='Consolidate Report'){
       
        
      //    document.getElementById("loading12").style.display="block";
         
        
      //   var valid=validate3();
      //   if (valid) {

      //     var fromdate = document.getElementById("fromdate").value;
      // var todate = document.getElementById("todate").value;
      // var c=betweenDate(fromdate, todate);
      // //alert(c);
      // var dd='';
      // for (var i = 0; i < c.length; i++) {
      //    dd+='<div class="CntntDtls" ><div class="Dtls TltDtt1" style="text-align: center;font-size: 17px;text-align: center;font-weight: bold;padding-top: 75px;" id="dateid'+i+'"><div id="foot'+i+'"></div></div><div class="Dtls TltDtt1" id="janitorsv'+i+'" style="display: none;"></div><div class="Dtls TltDtt1" id="odourrightdashboard'+i+'" style="display: none;"></div><div class="Dtls TltDtt1" id="odourleftdashboard'+i+'" style="display: none;"></div><div class="Dtls TltDtt1" id="footfalllive'+i+'" style="display: none;"></div><div class="Dtls TltDtt1" id="feedbacklive'+i+'" style="display: none;"></div></div>';

      // }
      // $('#consolidate').append(dd);
      

      //  addconsolidate(c);

      //   }
      
    
      //         }
      
        if(mtype=='Odour Graph Report'){
          var valid1=validate1();
           if(valid1){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        // var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getOudorLevelReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,location:location},
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
      document.getElementById("export").style.display="none";
      //document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        // var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getSupervisorDayData";
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
           // var location = document.getElementById("location").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getSodexoReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate,location:location},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData(obj);
          }
        });
           }
        
       
       
      }
      if(mtype=='Footfall Analysis Report'){
          var valid=validate();
           if(valid){
             document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
           // var location = document.getElementById("location").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getFootfalAnalysisReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate,location:location},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData1(obj);
          }
        });
           }
        
       
       
      }
      if(mtype=='Water Leakage Report'){

          var valid=validate();
           if(valid){
             document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;
           // var location = document.getElementById("location").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getWaterLekageReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate,location:location},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            appendData_water(obj);
          }
        });
           }
        
       
       
      }
      if(mtype=='Water Consumption Report'){

var valid=validate();
 if(valid){
   document.getElementById("loading").style.display="block";
  var fromdate = document.getElementById("fromdate").value;
  var todate = document.getElementById("todate").value;
 // var location = document.getElementById("location").value;    

var urlString = "<?php echo base_url(); ?>WRLData/getWaterConsReport";
$.ajax({
url:urlString,
type : 'GET',
async: true,
data: {fromdate:fromdate,todate:todate,location:location},
success: function(data){
  var obj = JSON.parse(data);
  console.log(obj);
  appendData_water_con(obj);
}
});
 }



}
      if(mtype=='High Odour Report'){

        var valid=validate();
        if(valid){
        document.getElementById("loading").style.display="block";
        var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value;
        // var location = document.getElementById("location").value;    

        var urlString = "<?php echo base_url(); ?>WRLData/getHighOdourReport";
        $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {fromdate:fromdate,todate:todate,location:location},
        success: function(data){
        var obj = JSON.parse(data);
        console.log(obj);
        appendData_odour(obj);
        }
        });
        }



        }
       if(mtype=='Consolidate Report'){
        
        
          var valid=validate();
           if(valid){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
            var todate = document.getElementById("todate").value;  
                  

        var c=betweenDate(fromdate, todate);
      //alert(c);
      var dd='';
      for (var i = 0; i < c.length; i++) {

         dd+='<div class="CntntDtls" ><div class="Dtls TltDtt1" style="text-align: center;font-size: 17px;text-align: center;font-weight: bold;padding-top: 75px;width:14% !important" id="dateid'+i+'"><div id="foot'+i+'"></div></div><div class="Dtls TltDtt1"  id="water'+i+'" style="display: none;width:14% !important"></div><div class="Dtls TltDtt1" id="janitorsv'+i+'" style="display: block;width:14% !important"></div><div class="Dtls TltDtt1" id="odourleftdashboard'+i+'" style="display: none;width:14% !important"></div><div class="Dtls TltDtt1" id="odourrightdashboard'+i+'" style="display: none;"></div><div class="Dtls TltDtt1" id="footfalllive'+i+'" style="display: none;width:14% !important"></div><div class="Dtls TltDtt1" id="feedbacklive'+i+'" style="display: none;width:14% !important"></div></div>';

      }
      $('#consolidate').html(dd);
document.getElementById("consolidate").style.display="block";
      for (var i1 = 0; i1 < c.length; i1++) {
        document.getElementById("dateid"+i1).innerHTML = c[i1];
          var urlStringfoot = "<?php echo base_url(); ?>WRLData/consolidateReport?date="+c[i1]+"&location="+location;
     
           $.ajax({
              url:urlStringfoot,
              type : 'GET',
              async: false,
              success: function(data){
              var obj = JSON.parse(data);
              var cd='<br>Male Footfall:'+obj['footfallcount'][0]+'<br>Female Footfall:'+obj['footfallcount'][1];
                        $("#dateid"+i1).append(cd);
                         addWaterlevelLive(obj['waterlevel'],i1);
                         addjanigraphLive(obj['janitor'],i1);
                         addOdourDataLiveDashboard(obj['odour'],i1);
                         appendFootfallLive(obj['footfall'],i1);
                         addfeedbackgraphLive(obj['feedback'],i1,c.length);
        
                                  }
                  });
      }

function addfeedbackgraphLive(data,v,t){
  //document.getElementById("loading12").style.display="block";
  document.getElementById("loading").style.display="none";
           var d =  JSON.parse(JSON.stringify(data)); 
           var fbr='feedbacklive'+v;  
               // obj['xdata']
               var xdata = d['xdata'];
              var ygood = d['good'];

              var yavg = d['avg'];
              var ypoor = d['poor'];
           document.getElementById(fbr).style.display="block";
           if(v==(t-1)){
            //document.getElementById("loading12").style.display="none";
           }
            
            
                 Highcharts.chart('feedbacklive'+v, {
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
function addOdourDataLiveDashboard(data,v){
              var d =  JSON.parse(JSON.stringify(data));
             
              document.getElementById('odourrightdashboard'+v).style.display="block";
              document.getElementById('odourleftdashboard'+v).style.display="block";
                document.getElementById("tab").style.display='none';
                document.getElementById("tab2").style.display='none';
                document.getElementById("tab3").style.display='none';
                document.getElementById("tab4").style.display='none';
                document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
              var xdata = d['leftxdata'];
              var ydata = d['leftydata'];

              var xdatahmd = d['rightxdata'];
              var ydatahmd = d['rightydata'];

    
    
                         Highcharts.chart('odourleftdashboard'+v, {
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
                                name: 'Odour Male',
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

                          Highcharts.chart('odourrightdashboard'+v, {
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
                                  name: 'Odour Female',
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
function appendFootfallLive(obj,v)
      {
        var hoursxaxisarray = obj['xdata'];
         var footfallyaxisarray = obj['ydata'];
         var footfallyaxisarray_female = obj['ydata_female'];
        document.getElementById('footfalllive'+v).style.display="block";

        
         Highcharts.chart('footfalllive'+v, {
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
              name: 'Footfall Male',
              data: footfallyaxisarray
          },{
              name: 'Footfall Female',
              data: footfallyaxisarray_female
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
function addjanigraphLive(data,v){
        var d =  JSON.parse(JSON.stringify(data));
       
         document.getElementById('janitorsv'+v).style.display="block";
         document.getElementById("tab").style.display='none';
         document.getElementById("tab2").style.display='none';
         document.getElementById("tab3").style.display='none';
         document.getElementById("tab4").style.display='none';
         document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
         var ydataswipe = new Array();
         var ydataverify = new Array();
         var ydataswipej2 = data['ydataswipej2'];
         var ydataverifyj2 = data['ydataverifyj2'];
          var xdata =data['xdata'];
      
                   
                   Highcharts.chart('janitorsv'+v, {
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
  function addWaterlevelLive(data,v){
        var d =  JSON.parse(JSON.stringify(data));
       
         document.getElementById('water'+v).style.display="block";
         document.getElementById("tab").style.display='none';
         document.getElementById("tab2").style.display='none';
         document.getElementById("tab3").style.display='none';
         document.getElementById("tab4").style.display='none';
         document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
         
         var ydata = data['ydata'];
          var xdata =data['xdata'];
      
                   
                   Highcharts.chart('water'+v, {
                    chart: {
                        type: 'area',
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
                            text: 'Liters'
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
                        name: 'Water Level',      
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
                  
  }
      
           }
        
       
       
      }
       if(mtype=='Janitor Report'){
       
       var valid=validate();
           if(valid){
            document.getElementById("loading").style.display="block";
            var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value;    
    
        var urlString = "<?php echo base_url(); ?>WRLData/getJanitorReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate,location:location},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addjanigraph(obj,location);
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
    
        var urlString = "<?php echo base_url(); ?>WRLData/getFeedbackReport";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {fromdate:fromdate,todate:todate,location:location},
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
      function addjanigraph(data,loc){
        if(loc==1){
          var d =  JSON.parse(JSON.stringify(data['od_collector']));
          document.getElementById("loading").style.display="none";
          document.getElementById("tab").style.display="none";
          document.getElementById("tab2").style.display='none';
          document.getElementById("tab3").style.display='none';
          document.getElementById("tab4").style.display='none';
          document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
          document.getElementById("odourleft").style.display="none";
          document.getElementById("odourright").style.display="none";
          document.getElementById("containter1").style.display="none";
          document.getElementById("janitor1").style.display="block";
          document.getElementById("janitor2").style.display="none";
          document.getElementById("feedback").style.display="none";
          document.getElementById("supervsr").style.display="none";
          document.getElementById("consolidate").style.display="none";

          var ydataswipe = new Array();
          var ydataverify = new Array();
        //  var ydataswipej2 = new Array();
        //  var ydataverifyj2 = new Array();
          var xdata = new Array();
          for (i = 0; i < d.length; i++) 
              { 
                  xdata[i] = d[i]['Time'];
                  ydataswipe[i] = parseInt(d[i]['jani1Swiped']); 
                  ydataverify[i] = parseInt(d[i]['jani1verified']); 
                  // ydataswipej2[i] = parseInt(d[i]['jani2Swiped']); 
                  // ydataverifyj2[i] = parseInt(d[i]['jani2verified']); 
                  
                
              }
          Highcharts.chart('janitor1', {
                    chart: {
                        type: 'column'
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
   
        }else{
          var d =  JSON.parse(JSON.stringify(data['od_jp']));
                  document.getElementById("loading").style.display="none";
              document.getElementById("tab").style.display="none";
              document.getElementById("tab2").style.display='none';
              document.getElementById("tab3").style.display='none';
              document.getElementById("tab4").style.display='none';
              document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
                document.getElementById("odourleft").style.display="none";
                document.getElementById("odourright").style.display="none";
                document.getElementById("containter1").style.display="none";
                document.getElementById("janitor1").style.display="block";
                document.getElementById("janitor2").style.display="block";
                document.getElementById("feedback").style.display="none";
                document.getElementById("supervsr").style.display="none";
                    document.getElementById("consolidate").style.display="none";

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
                  type: 'column'
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
  
  


}
function addfeedbackgraph(data){
        var d =  JSON.parse(JSON.stringify(data));
        document.getElementById("loading").style.display="none";
     document.getElementById("tab").style.display="none";
     document.getElementById("tab2").style.display='none';
     document.getElementById("tab3").style.display='none';
     document.getElementById("tab4").style.display='none';
     document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
      document.getElementById("odourleft").style.display="none";
       document.getElementById("odourright").style.display="none";
       document.getElementById("containter1").style.display="none";
       document.getElementById("janitor1").style.display="none";
       document.getElementById("janitor2").style.display="none";
       document.getElementById("feedback").style.display="block";
                  document.getElementById("consolidate").style.display="none";

      
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
    document.getElementById("tab2").style.display='none';
    document.getElementById("tab3").style.display='none';
    document.getElementById("tab4").style.display='none';
    document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
    document.getElementById("odourleft").style.display="block";
    document.getElementById("odourright").style.display="block";
    document.getElementById("containter1").style.display="none";
 document.getElementById("janitor1").style.display="none";
 document.getElementById("janitor2").style.display="none";
 document.getElementById("feedback").style.display="none";
 document.getElementById("supervsr").style.display="none";
            document.getElementById("consolidate").style.display="none";



    var xdata = new Array();
    var ydata = new Array();

    var xdatahmd = new Array();
    var ydatahmd = new Array();

    var xdataco = new Array();
    var ydataco = new Array();
    //var jsondata = JSON.parse(data);

    xdata = d['leftxdata'];
        ydata = d['leftydata']; 
        xdatahmd = d['rightxdata'];
        ydatahmd = d['rightydata']; 
    
    Highcharts.chart('odourleft', {
        chart: {
            type: 'line'
        },

    credits: {
        enabled: false
    },
        title: {
            text: 'Odour Male'
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

    credits: {
        enabled: false
    },
        title: {
            text: 'Odour Female'
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
        var footfallyaxisarray_female=[];
        document.getElementById("tab").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj.length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>RestRoom</td><td>" +obj[i]['Time'] + "</td><td>" + obj[i]['footfall'] + "</td><td>" + obj[i]['footfall_female'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1 tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="block";

        for (var k = 0; k < obj.length; k++) 
        {
          hoursxaxisarray[k]=obj[k]['Time'];
          footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
          footfallyaxisarray_female[k]=parseInt(obj[k]['footfall_female']);
        }
        addGraph(hoursxaxisarray,footfallyaxisarray,footfallyaxisarray_female);
      }
      function appendData1(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list_footfall tbody").empty();
       
        document.getElementById("tab4").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj.length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>" +obj[i]['date'] + "</td><td>" +obj[i]['Time'] + "</td><td>" + obj[i]['footfall_male'] + "</td><td>" + obj[i]['footfall_male_percent'] + "</td><td>" + obj[i]['footfall_female'] + "</td><td>" + obj[i]['footfall_female_percent'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list_footfall tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export_foot").style.display="block";

      }
      function appendData_water(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list1_water tbody").empty();
       // var hoursxaxisarray=[];
        // var footfallyaxisarray=[];
        // var footfallyaxisarray_female=[];
        document.getElementById("tab2").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj['water_leak'].length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>" +obj['water_leak'][i]['leak'] + "</td><td>" + obj['water_leak'][i]['date'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1_water tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="none";
         document.getElementById("export_water").style.display="block";
         document.getElementById("export_odour").style.display="none";
        // for (var k = 0; k < obj.length; k++) 
        // {
        //   hoursxaxisarray[k]=obj[k]['Time'];
        //   footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
        //   footfallyaxisarray_female[k]=parseInt(obj[k]['footfall_female']);
        // }
        // addGraph(hoursxaxisarray,footfallyaxisarray,footfallyaxisarray_female);
      } 
      function appendData_water_con(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list1_water_con tbody").empty();
       // var hoursxaxisarray=[];
        // var footfallyaxisarray=[];
        // var footfallyaxisarray_female=[];
        document.getElementById("tab5").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj['water_cons'].length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>" +obj['water_cons'][i]['date'] + "</td><td>" + obj['water_cons'][i]['cons'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1_water_con tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="none";
         document.getElementById("export_water").style.display="none";
         document.getElementById("export_water_con").style.display="block";
         document.getElementById("export_odour").style.display="none";
        // for (var k = 0; k < obj.length; k++) 
        // {
        //   hoursxaxisarray[k]=obj[k]['Time'];
        //   footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
        //   footfallyaxisarray_female[k]=parseInt(obj[k]['footfall_female']);
        // }
        // addGraph(hoursxaxisarray,footfallyaxisarray,footfallyaxisarray_female);
      } 
      function appendData_odour(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list1_odour tbody").empty();
       // var hoursxaxisarray=[];
        // var footfallyaxisarray=[];
        // var footfallyaxisarray_female=[];
        document.getElementById("tab3").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj['high_odour'].length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>" +obj['high_odour'][i]['date'] + "</td><td>" + obj['high_odour'][i]['od_male_count'] + "</td><td>" + obj['high_odour'][i]['od_male_high'] + "</td><td>" + obj['high_odour'][i]['od_female_count'] + "</td><td>" + obj['high_odour'][i]['od_female_high'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1_odour tbody");
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="none";
         document.getElementById("export_water").style.display="none";
         document.getElementById("export_odour").style.display="block";
        // for (var k = 0; k < obj.length; k++) 
        // {
        //   hoursxaxisarray[k]=obj[k]['Time'];
        //   footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
        //   footfallyaxisarray_female[k]=parseInt(obj[k]['footfall_female']);
        // }
        // addGraph(hoursxaxisarray,footfallyaxisarray,footfallyaxisarray_female);
      } 
      function appendDataFootfalldatails(obj)
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
         // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj.length; i++) 
        {
          rows += "<tr><td>" + j + "</td><td>RestRoom</td><td>" +obj[i]['Time'] + "</td><td>" + obj[i]['footfall'] + "</td></tr>";            
          j++;    
        }
        $(rows).appendTo("#list1 tbody");

       
        document.getElementById("export").style.display="block";

        for (var k = 0; k < obj.length; k++) 
        {
          hoursxaxisarray[k]=obj[k]['Time'];
          footfallyaxisarray[k]=parseInt(obj[k]['footfall']);
        }
        document.getElementById("containter1").style.display='block';
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
                   document.getElementById("consolidate").style.display="none";

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
        document.getElementById("export").style.display="none";

      } 
      function addGraph(hoursxaxisarray,footfallyaxisarray,footfallyaxisarray_female) 
      {
        if(hoursxaxisarray.length>20){
          document.getElementById("janitor1").style.display="none";
          document.getElementById("janitor2").style.display="none";
          document.getElementById("feedback").style.display="none";
          document.getElementById("supervsr").style.display="none";
                     document.getElementById("consolidate").style.display="none";

        
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
              name: 'Footfall Male',
              data: footfallyaxisarray
          },{
              name: 'Footfall Female',
              data: footfallyaxisarray_female
          }]
        });
        }else{
          document.getElementById("janitor1").style.display="none";
          document.getElementById("janitor2").style.display="none";
          document.getElementById("feedback").style.display="none";
          document.getElementById("supervsr").style.display="none";
        
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
              name: 'Footfall Male',
              data: footfallyaxisarray
          },{
              name: 'Footfall Female',
              data: footfallyaxisarray_female
          }]
        });
        }

         
      }

  </script>
</head>
<body >
    <div class="Wrapper">
    <div style="position:absolute; top:15px; left:15px; height:70px; right:15px;overflow:hidden;">
        <div class="Header">
            <div class="Logo">

             <!--   <span class="CmpNm"> <img src="<?php //echo base_url(); ?>/asset/prkhospitalasset/Images/wenalytics logo.png" class="HdrImg Footfall" /></span>  -->
            </div>
            <div class="UserMenu">
            <a href="<?php echo base_url(); ?>Login/wshrmmntrlogin"><img class="SgnOt" src="<?php echo base_url(); ?>asset/ambienceasset/images/MenuLogout-C.png"></a>
                <!-- <span class="UsrNm">Sodexo User</span> -->
            </div>
                      
           
           
        </div>
    
        <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr">
               <div class="row SctnSlctr">
        <div class="col-md-6" id="links">
                    <span class="SctnNm"><a href="<?php echo site_url('WRLData/demoData') ?>" class="Lnk">Dashboard</a></span>
        </div>
          <!--          <li>
<a href="<?php //echo site_url('Demo/demoData') ?>" class="Lnk"><span class="Txt">Dashboard1</span></a>
</li>
<li>
<a href="<?php //echo site_url('Demo/getReport') ?>" class="Lnk"><span class="Txt">Report1</span></a>
</li> -->
          <div class="col-md-6" id="links">
            <span class="SctnNm"><a href="<?php echo site_url('WRLData/getReport') ?>" class="Lnk">Reports</a></span>
          </div>
                </div>
                
                <div class="SctnSrch"  id="reportsid">
                    <ul class="SrchLst">
                        <li>
                            <div class="LstLft"><span class="Txt">Select Location</span></div>
                            <div class="LstRgt">
                                <!-- <input type="text" class="Inpt" value="RestRoom" /> -->
                                <select class="Inpt" id="location">
                                <option value="0">None Selected</option>
                                    <option value="1">Warangal Collector Office</option>
                                    <!-- <option>Footfall Report1</option> -->
                                    <option value="2">Warangal JP Nagar</option>
                                    
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="LstLft"><span class="Txt">Report Type</span></div>
                            <div class="LstRgt">
                                <!-- <input type="text" class="Inpt" value="RestRoom" /> -->
                                <select class="Inpt" id="reports">
                                <option>None Selected</option>
                                    <option>Footfall Report</option>
                                    <option>Footfall Analysis Report</option>
                                    <option>Odour Graph Report</option>
                                    <option>Janitor Report</option>
                                    <option>Feedback Report</option>
                                    <option>Water Leakage Report</option>
                                    <option>Water Consumption Report</option>
                                    <option>High Odour Report</option>
                                    <option>Consolidate Report</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="LstRgt"><input style="width:150px" type="date" name="fromdate" id="fromdate" data-placeholder="From date" required aria-required="true"></div>
                        </li>
                        <li style="display: visible" id="dst">
                            <?php /*<div class="LstLft"><span class="Txt">To date</span></div>*/?>
                            <div class="LstRgt"><input style="width:150px" type="date" name="todate" id="todate" data-placeholder="To date" required aria-required="true"></div>
                        </li>
                       
                       
                        <li class="report_btn" style="padding:0px">
                            <input type="button" class="Btn1" value="Go" onclick="getSodexoReport();"/>
                            <input type="button" class="Btn1" value="Reset" onClick="window.location.reload()"/>
                           
                            <input type="button" class="Btn1"  id="export"   onclick="exportTableToExcel('list1')" style="display: none;margin-left: 10px;" value="Export">
                            <input type="button" class="Btn1"  id="export_foot"   onclick="exportTableToExcel_foot('list_footfall')" style="display: none;margin-left: 10px;" value="Export">
                            <input type="button" class="Btn1"  id="export_water"   onclick="exportTableToExcel_water('list1_water')" style="display: none;margin-left: 10px;" value="Export">
                            <input type="button" class="Btn1"  id="export_water_con"   onclick="exportTableToExcel_water_con('list1_water_con')" style="display: none;margin-left: 10px;" value="Export">
                            <input type="button" class="Btn1"  id="export_odour"   onclick="exportTableToExcel_odour('list1_odour')" style="display: none;margin-left: 10px;" value="Export">
                            <input type="button" class="Btn1"  id="export1"   onclick="exportTableToExcel1('list3')" style="display:none;margin-left: 10px;" value="Export">
                        </li>
                    </ul>
                   
                </div>
                 
            </div>
            </div>
            </div>
            <div id="DshBrd" class="DshbordCntr style-2" style="position:absolute; top:90px; bottom:40px; left:15px; right:15px; overflow:auto;"> 
      
 <div class="lds-ellipsis" id="loading12" style="display: none;"><div></div><div></div><div></div><div></div></div>
            

            <!-- <div class="CntntHldr" id="odourleft">
                              
            </div>
            <div class="CntntHldr" id="odourright">
                              
            </div> -->
            <!-- animation starts -->
            <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <!-- animation end -->

          <!-- consolidate start -->
<div id="alert"></div>
       <div class="CntntHldr table-responsive">
        <div class="style-2"  id="consolidate" style="display: none;min-height: 500px;">
          
          

        </div>
          <!-- <div   id="consolidate"></div>            -->
                              
      </div>
      <div class="CntntHldr table-responsive">
      </div>
      <!-- consolidate end -->


           <div id="tab" style="display: none;">
              <table id ="list1" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Meter</th><th>Date/Time</th><th>Footfall Male</th><th>Footfall Female</th></tr></thead>

                <tbody>

                </tbody>
              </table>
              

            </div>
            <div id="tab4" style="display: none;">
              <table id ="list_footfall" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Date</th><th>Time</th><th>Footfall Male</th><th>Footfall Male Percent</th><th>Footfall Female</th><th>Footfall Female Percent</th></tr></thead>

                <tbody>

                </tbody>
              </table>
              

            </div>
            <div id="tab2" style="display: none;">
              <table id ="list1_water" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Water Leakage(Liters)</th><th>Date</th></tr></thead>
              
                <tbody>

                </tbody>
              </table>
              

            </div>
            <div id="tab5" style="display: none;">
              <table id ="list1_water_con" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Date</th><th>Consumption(Liters)</th></tr></thead>
              
                <tbody>

                </tbody>
              </table>
              

            </div>
            <div id="tab3" style="display: none;">
              <table id ="list1_odour" class="table table-bordered table-hover" style="width: 100%;">
                <thead><tr><th>SNo</th><th>Date</th><th>Male Odour Count</th><th>Male High Odour</th><th>Female Odour Count</th><th>Female High Odour</th></tr></thead>

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
     

      <div class="Footer" style="position:absolute; bottom:0px; height:40px; left:0px; right:0px; overflow:hidden;"> <span class="Cpyrght">&copy; www.wenalytics.com</span></div>
    </div>
</body>
<script type="text/javascript">

$(function() {
    $("#reports").change(function() {
    
      var mtype=$('option:selected', this).text();
    //alert(mtype);
     if(mtype=='Consolidate Report'){
      //document.getElementById("loading12").style.display="block";
               $("#dst").css("display","flex");
                 document.getElementById("tab").style.display='none';
                 document.getElementById("tab2").style.display='none';
                 document.getElementById("tab3").style.display='none';
                 document.getElementById("tab4").style.display='none';
                 document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
                  document.getElementById("containter1").style.display='none';
                   document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
                    document.getElementById("consolidate").style.display="none";

           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_odour").style.display="none";

       
      }
      if(mtype=='Odour Graph Report'){
        $("#dst").css("display","none");
                 document.getElementById("tab").style.display='none';
                 document.getElementById("tab2").style.display='none';
                 document.getElementById("tab3").style.display='none';
                 document.getElementById("tab4").style.display='none';
                 document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
                  document.getElementById("containter1").style.display='none';
                   document.getElementById("odourleft").style.display='block';
                    document.getElementById("odourright").style.display='block';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
                                document.getElementById("consolidate").style.display="none";

           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_odour").style.display="none";

       
      }
       if(mtype=='Supervisor Report'){
        $("#dst").css("display","none");
                 document.getElementById("tab").style.display='none';
                 document.getElementById("tab2").style.display='none';
                 document.getElementById("tab3").style.display='none';
                 document.getElementById("tab4").style.display='none';
                 document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
                  document.getElementById("containter1").style.display='none';
                   document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="block";
                     document.getElementById("export1").style.display="block";
                     document.getElementById("export_water").style.display="none";
                     document.getElementById("export").style.display="none";
                     document.getElementById("export_odour").style.display="none";
                                document.getElementById("consolidate").style.display="none";


       
      }
      if(mtype=='Footfall Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='block';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='none';
        document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
        document.getElementById("containter1").style.display='block';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_odour").style.display="none";
                      document.getElementById("consolidate").style.display="none";


       
      }
      if(mtype=='Footfall Analysis Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='block';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_odour").style.display="none";
                      document.getElementById("consolidate").style.display="none";


       
      }
      if(mtype=='Water Leakage Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='block';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='none';
        document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="block";
           document.getElementById("export_odour").style.display="none";
                      document.getElementById("consolidate").style.display="none";
                      document.getElementById("export").style.display="none";


       
      }
      if(mtype=='Water Consumption Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='none';
        document.getElementById("tab5").style.display='block';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_water_con").style.display="block";
           document.getElementById("export_odour").style.display="none";
                      document.getElementById("consolidate").style.display="none";
                      document.getElementById("export").style.display="none";


       
      }
      if(mtype=='High Odour Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='block';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_odour").style.display="block";
                      document.getElementById("consolidate").style.display="none";
                      document.getElementById("export").style.display="none";


       
      }
      if(mtype=='Janitor Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='none';
        document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
        document.getElementById("odourright").style.display='none';
         document.getElementById("janitor1").style.display="block";
         document.getElementById("janitor2").style.display="block";
         document.getElementById("feedback").style.display="none";
         document.getElementById("supervsr").style.display="none";
     document.getElementById("export1").style.display="none";
     document.getElementById("export_water").style.display="none";
     document.getElementById("export_odour").style.display="none";
                document.getElementById("consolidate").style.display="none";



       
      }
      if(mtype=='Feedback Report'){
        $("#dst").css("display","flex");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='none';
        document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
        document.getElementById("odourright").style.display='none';
         document.getElementById("janitor1").style.display="none";
         document.getElementById("janitor2").style.display="none";
         document.getElementById("feedback").style.display="block";
     document.getElementById("export1").style.display="none";
                document.getElementById("consolidate").style.display="none";


       
      }
      if(mtype=='None Selected'){
        //$("#dst").css("display","block");
        document.getElementById("tab").style.display='none';
        document.getElementById("tab2").style.display='none';
        document.getElementById("tab3").style.display='none';
        document.getElementById("tab4").style.display='none';
        document.getElementById("export_water_con").style.display="none";
        document.getElementById("tab5").style.display='none';
        document.getElementById("containter1").style.display='none';
        document.getElementById("odourleft").style.display='none';
                    document.getElementById("odourright").style.display='none';
                     document.getElementById("janitor1").style.display="none";
                     document.getElementById("janitor2").style.display="none";
                     document.getElementById("feedback").style.display="none";
                     document.getElementById("supervsr").style.display="none";
           document.getElementById("export1").style.display="none";
           document.getElementById("export_water").style.display="none";
           document.getElementById("export_odour").style.display="none";
                      document.getElementById("consolidate").style.display="none";


       
      }

    });
});
  
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
       
        var urlString = "<?php echo base_url(); ?>WRLData/getSodexoReportLive";
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
  function exportTableToExcel_foot(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'FootfallAnalysisReport.xls';
    
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
  function exportTableToExcel_water(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'LeakageReport.xls';
    
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
  function exportTableToExcel_water_con(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'WaterConsumptionReport.xls';
    
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
  function exportTableToExcel_odour(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'HigherOdourReport.xls';
    
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

  //start consolidate
  function isDate(dateArg) {
    var t = (dateArg instanceof Date) ? dateArg : (new Date(dateArg));
    return !isNaN(t.valueOf());
}

function isValidRange(minDate, maxDate) {
    return (new Date(minDate) <= new Date(maxDate));
}

function betweenDate(startDt, endDt) {
    var error = ((isDate(endDt)) && (isDate(startDt)) && (isValidRange(startDt, endDt))) ? false : true;
    var between = [];
    if (error) console.log('error occured!!!... Please Enter Valid Dates');
    else {
        var currentDate = new Date(startDt),
            end = new Date(endDt);
        while (currentDate <= end) {
            between.push(formatDate(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }
    }
    return between;
}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}



  //end consolidate
</script>
</html>
