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
    <!-- <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/SliderCSS.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/spinfocityasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/jquery.easing.1.3.js"></script>
    <!-- <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JsSlider.js"></script> -->
    <script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/JavaScript.js"></script>
    <!-- below are hari added files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"> 
    </script>
    </script> 
   
    <script type="text/javascript" 
            src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> 
    </script> 
    <link rel="stylesheet" type="text/css" 
          href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
    <!-- <link rel="stylesheet" type="text/css" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <!-- highchart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>

        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

      
</head>
<body>
    <div id="MnCtnr" class="DshMnCtnr">

        <?php $this->load->view('header/prkheader');?>
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">Demo</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdMasterId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Dashboard</span></a>
                        <ul class="ScndLvl" id="hidedashboard">
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk  WtrTnk"><span class="Txt">Water Tank</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk FlwMtr"><span class="Txt">Flow Meters</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk DGSt"><span class="Txt">DG Set</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk EnrgMtr"><span class="Txt">Energy Meter</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk LPGCnn"><span class="Txt">LPG Connection</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk IOQ"><span class="Txt">IAQ</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk  chlr"><span class="Txt">Chillers</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/demodshboard" class="Lnk cooltwr"><span class="Txt">Cooling Towers</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="Lnk Arr Rprts" id="reportsOuterId"><span class="Txt">Reports</span></a>
                        <ul class="ScndLvl Hide" id="reportsInnerId">
                            <!-- <li>
                                <a href="" class="Lnk Arr"><span class="Txt">Water Level</span></a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url(); ?>Demoforall/getWaterFlow" class="Lnk Arr"><span class="Txt">Water Flow</span></a>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="dgsetouterid"><span class="Txt">DG Set</span></a>
                                <ul class="ThrdLvl" id="dgsetinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/getFuelGraph" class="Lnk Actv"><span class="Txt">Fuel Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/getRunningHours" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="" class="Lnk Arr" id="emouterid"><span class="Txt">Energy Meter</span></a>
                                <ul class="ThrdLvl" id="eminnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/getConsumptionGraph" class="Lnk Actv"><span class="Txt">Consumption Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/getConsumption" class="Lnk"><span class="Txt">Consumption Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="iaqouterid"><span class="Txt">IAQ Reports</span></a>
                                <ul class="ThrdLvl" id="iaqinnerid">
                                     <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/iaqGraphReport" class="Lnk"><span class="Txt"> Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="fpmpouterid"><span class="Txt">Firepump Report</span></a>
                                <ul class="ThrdLvl" id="fpmpinnerid">                                   
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/firepumpRunReport" class="Lnk"><span class="Txt"> Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/firepumpGraphReport" class="Lnk Actv"><span class="Txt"> Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>                           
                            <li>
                                <a href="" class="Lnk Arr" id="chlrouterid"><span class="Txt">Chillers Reports</span></a>
                                <ul class="ThrdLvl" id="chlrinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/chillerRunReport" class="Lnk Actv"><span class="Txt">Chiller Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/chillerGraphReport" class="Lnk"><span class="Txt">Chiller Graph Report</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="Lnk Arr" id="cltrouterid"><span class="Txt">Cooling Towers Reports</span></a>
                                <ul class="ThrdLvl" id="cltrinnerid">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/coolingRunReport" class="Lnk Actv"><span class="Txt">Cooling Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Demoforall/coolingGraphReport" class="Lnk"><span class="Txt">Cooling Graph Report</span></a>
                                    </li>
                                </ul>
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
              <span class="TtlTxt">IAQ Graph Report</span>
              <ul class="TtlBrdCrmb">
                <li>
                    <a href="" class="Lnk">Reports</a>
                </li>
                <li>
                    <a href="" class="Lnk">IAQ</a>
                </li>
              </ul>
            </div>
            <section class="content">
              <div id="alert"></div>
                <div class="row meter-top">
                  <label>Select Meter : </label>
                  <select id="multiMeter" class="form-control">
                  <option>Temparature</option>
                  <option>Humidity</option>
                  <option>C02</option>
                  </select>
                  <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
                            <!-- <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true"> -->
                  <button type="button" onclick="getIaqGraphReport()" class="btn btn-success">Filter</button>
                  <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
                </div>
            </section>
            <div class="loader" id="loading" align="center" 
            style="position: absolute;left: 50%;;display: none">
            </div>

            <div class="RprtDtlsHldr">
              <div id="alert"></div>
              <div id="container" style="width: 1100px;">
                 <!-- <div class="chart" id="container_1"></div>  -->
              </div>
              <div id="runn">
                 <!-- <div class="chart" id="container_1"></div>  -->
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/commonjs.js"></script>
<script type="text/javascript">

function getIaqGraphReport()
{
  // alert("hello");
  document.getElementById("loading").style.display="block";
  // $('#adddata').children().not("#first").remove();    
  var valid=validate();
  if(valid)
  {      
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    // alert(meter);
    var meter1 = meter.toString();
    var fromdate = document.getElementById("fromdate").value;
    var meters = meter1.split(",");
    var noofmeters = meters.length;
    var from = parseDate(fromdate);
    
    $("#list tbody").empty();
    
    plotGraph(meter);
    
  }

}

function validate()
{
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);   
    var fromdate = document.getElementById("fromdate").value;
    // var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter ==""){
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
function datediff(first, second) 
{
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second-first)/(1000*60*60*24));
}
function getSelectValues(select) 
{
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
function parseDate(str) 
{
  var mdy = str.split('-');
  //return new Date(mdy[2], mdy[0]-1, mdy[1]);
  return new Date(mdy[0], mdy[1]-1, mdy[2]);
}

function plotGraph(meter)
{
  var mt="Temparature";
  Time="Time";
  xdata=["00:00:00","01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00","24:00:00"];
  // ydata=["60","54","48","46","45","42","36","30","37","40","41","47","49","39","37","34","33","32","23","20","15","10","05","50"];
  ydata=[18,16,14,13,15,20,22,20,21,23,24,25,30,35,40,34,32,30,20,26,20,25,24,23,20];
  Highcharts.chart(container, {
    chart: {
        type: 'line'
    },
    title: {
        text: meter
    },
   
    xAxis: {
        title: {
            text: "Time"
        },
        categories: xdata
    },
    yAxis: {
        title: {
            text: mt
        },
        tickInterval: 10,
                  min:0,
                  max:50 
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
        name: mt,
        data: ydata
    }]
  });

}

</script>
</html>