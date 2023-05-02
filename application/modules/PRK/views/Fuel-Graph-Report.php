<?php
//echo "<pre>";print_r($meters);
$meterList =array();
for ($i=0; $i < count($meters); $i++) { 
  array_push($meterList,$meters[$i]->vname);
}
sort($meterList);
//print_r();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JavaScript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- multiselect -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<!-- highchart -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
    <div id="MnCtnr" class="DshMnCtnr">
      <!-- <?php $this->load->view('header/leftsidenav');?> -->
      <?php $this->load->view('header/prkheader');?>
      <div id="DshbrdLft" class="DshBrdLnk">
        <div class="BrndHldr">
            <span class="BrndNm">PRK Hospitals</span>
        </div>
        <div class="DshBrdLnkCntr">
          <ul class="LnkHldr FrstLvl">
              <li>
                  <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                  <ul class="ScndLvl" id="hidedashboard" style="display: none;">
                      <li>
                          <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk Actv WtrTnk"><span class="Txt">Water Tank</span></a>
                      </li>
                      <li>
                          <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk FlwMtr"><span class="Txt">Flow Meters</span></a>
                      </li>
                      <li>
                          <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk DGSt"><span class="Txt">DG Set</span></a>
                      </li>
                      <li>
                          <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk EnrgMtr"><span class="Txt">Energy Meter</span></a>
                      </li>
                      <li>
                          <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                      </li>
                      <li>
                          <a href="<?php echo base_url(); ?>PRKHospital/prkDashboard" class="Lnk LPGCnn"><span class="Txt">LPG Connection</span></a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                  <ul class="ScndLvl" id="reportsInnerId">
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
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <div class="DshBrdRprtSctn">
                <div class="RprtHldr">
                    <div class="RprtHdr">
                        <span class="TtlTxt">Fuel Graph Report</span>
                        <ul class="TtlBrdCrmb">
                            <li>
                                <a href="" class="Lnk">Reports</a>
                            </li>
                            <li>
                                <a href="" class="Lnk">DG Set</a>
                            </li>
                        </ul>
                    </div>
                    <div class="SrchSctn">
                        <ul class="SrchBx FlGrphRprt">
                            <li>
                                <span class="SrchTxtTtl">Select Flow Meter</span>
                                <select class="Inpt" id="multiMeter" multiple="multiple" >
                                      <?php 
                                      foreach ($meterList as $value) {
                                      ?>
                                        <option value="<?php echo $value; ?>"> 
                                          <?php echo $value; ?> 
                                        </option>
                                      <?php } ?>
                                    </select>
                                <!-- <input type="text" class="Inpt" /> -->
                            </li>
                            <li>
                                <span class="SrchTxtTtl">From Date</span>
                                <input type="date" class="Inpt" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
       
                                <!-- <input type="text" class="Inpt" /> -->
                            </li>
                            <li>
                                <span class="SrchTxtTtl">To Date</span>
                                 <input type="date" class="Inpt" name="" id="todate" data-placeholder="To Date" required aria-required="true">
                            </li>
                            <li class="BtnHldr">
                                <input type="button" onclick="getFuelLevelReport()" class="InptBtn" value="Filter" />
                            </li>
                            <li class="BtnHldr">
                                <input type="button" class="InptBtn" onClick="window.location.reload()" value="Reset" />
                            </li>
                        </ul>

                    </div>
                      <div id="alert"></div>
                      <div class="loader" id="loading" align="center" style="position: absolute;
  left: 50%;;display: none"></div>
                    <div id="container">
                       <!-- <div class="chart" id="container_1"></div>  -->
                    </div>
                    <div id="runn">
                       <!-- <div class="chart" id="container_1"></div>  -->
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function () {
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
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
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter ==""){
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
    function getFuelLevelReport(){
  var valid=validate();
  if(valid){ 
  document.getElementById("loading").style.display="block";     
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var meter1 = meter.toString();
    
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
      
      var urlString = "http://chekhra.net/chekhranew/Generators/fuelSensor/fuelGraph_submit_prk.php";
      $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {generatorId: meter[j],from_date:fromdate,to_date:todate,client:534},
        success: function(data){
          var me = meter[k-1];
        
          plotGraph(data,me,k);
          //document.getElementById(graph).style.display = "block";
            document.getElementById("loading").style.display="none";
          k++;
        }
      });
      
    }
    //document.getElementById('graph_1Runn').style.display = "block";
  }
}
function plotGraph(data,meter,count){
    var $div = $("<div>", {id: "first"+count, "class": "chart"});
    var divid=$div[0]['id'];
//var chartDiv = document.createElement('div'); // Create a new div
//
$('#container').append($div);
  var jsondata = JSON.parse(data);
  var myArray = new Array();
  var myArray1 = new Array();
  var gnerator;
  
  //var d; var localTime;var localOffset;var utc;var offset = 5.5;var nd;
  for (i = 0; i < jsondata.length; i++) { 
    if(jsondata["data"]=='offline'){
      var sec = new Array();
    var tm = new Array();
    tm[0]=0;
    sec[0] = 0;
    sec[1] = 0;
    myArray.push(sec);
    myArray1.push(tm);
    gnerator=jsondata["generater"];
    }else{
      var datetime=jsondata[i]['timeVal'].split(" ");
      var time=datetime[1];
    var sec = new Array();
    var tm = new Array();
    tm[0]=time;
    sec[0] = jsondata[i]['timeVal'];
    sec[1] = parseInt(jsondata[i]['fuelVal']);
    myArray.push(sec);
    myArray1.push(tm);
    gnerator=jsondata[0]['generater'];
    }

      
  }
  Highcharts.setOptions({
      time: {
          timezone: 'Asia/Calcutta',
          timezoneOffset:5
      }
  });
  Highcharts.chart(divid, {
      time: {
        timezone: 'Asia/Calcutta',
        timezoneOffset:5
      },
      chart: {
          zoomType: 'x'
      },
      title: {
        text: 'Fuel Level'
    },
    subtitle: {
        text: gnerator
    },
     
      xAxis: {
          type: 'datetime',
          categories:myArray1,
          title: {
              text: 'Date And Time'
          }
      },
      yAxis: {
        min: -50,
        startOnTick: false,
          title: {
              text: 'Ltrs'
          }
      },
      legend: {
          enabled: false
      },
      plotOptions: {
          area: {
              fillColor: {
                  linearGradient: {
                      x1: 0,
                      y1: 0,
                      x2: 0,
                      y2: 1
                  },
                  stops: [
                      [0, Highcharts.getOptions().colors[0]],
                      [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                  ]
              },
              marker: {
                  radius: 2
              },
              lineWidth: 1,
              states: {
                  hover: {
                      lineWidth: 1
                  }
              },
              threshold: null,
              turboThreshold:0
          }
      },

      series: [{
          type: 'area',
          name: 'Fuel Level',
          data: myArray
      }]
  });
  


}
</script>
<script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/commonjs.js"></script>
<!-- <script>
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
</script> -->

</html>