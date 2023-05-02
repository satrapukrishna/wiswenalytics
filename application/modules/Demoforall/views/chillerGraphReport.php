<?php
$meterList1=array('Demo01');
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
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/prkhospitalasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>asset/prkhospitalasset/CSS/SliderCSS.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url(); ?>asset/demoforall/CSS/StyleSheet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/demoforall/CSS/simplebar.css" rel="stylesheet" />

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
  
    <link rel="stylesheet" type="text/css" 
          href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
    <!-- <link rel="stylesheet" type="text/css" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
    <!-- <script src="<?php echo base_url(); ?>asset/Jquery/bundle.js"></script> -->
    <script src="<?php echo base_url(); ?>asset/Jquery/simplebar.min.js"></script>

    <!-- highchart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>

        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <!-- end highchart -->
<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  border-radius: 2px;
  text-align: center;
}
th {
  background-color: #378fa7; 
  color: white;
  font-size: 13px;
  font-family: arial;
  font-weight: bold;
  text-align: center !important; 
  align-items: center;
}
td {
  background-color:  #f7f7f5;
  color: #4a4945;
  font-size: 13px;
  font-family: arial;
  font-weight: bold;
  text-align: center; 
  align-items: center;
}
.row-hari{
    margin-left: 20px;
}
.hari-table
{
    font-size: 16px;
}
</style>

</head>

<body >
    <div id="MnCtnr" class="DshMnCtnr">
        <div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">DEMO CLIENT</span>
            </div>
            <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <ul class="LnkHldr FrstLvl">
                    <li >
                        <a class="Lnk Arr Slct WtrTnk" href="#" id="dshbrdMasterId"><span id="wldiv2" class="Lnk Arr Slct DshBrdLnk">Water</span></a>
                        <ul class="ScndLvl" id="hidedashboard" style="display: none;">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv WtrTnk"><span class="Txt">Water Level</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk"><span class="Txt">Municipal Line</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Water Tankers</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Bore Wells</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk FrPmp"><span class="Txt">Fire Pumps</span></a>
                            </li>
                           
                        </ul>
                    </li>

                    <li >
                        <a class="Lnk Arr Slct EnrgMtr" href="#" id="dshbrdEnergyId"><span id="dsh" class="Lnk Arr Slct DshBrdLnk">Energy</span></a>
                        <ul class="ScndLvl" id="hideenergy" style="display: none;">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv"><span class="Txt">Energy Meters</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk DGSt"><span class="Txt">DG</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">UPS</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk LPGCnn"><span class="Txt">LPG</span></a>
                            </li>
                           
                        
                        </ul>
                    </li>

                     <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdAirId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Air</span></a>
                        <ul class="ScndLvl" id="hideair" style="display: none;">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv WtrTnk"><span class="Txt">AHU's</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk"><span class="Txt">Chillers</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Cooling Towers</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Exhaust Fans</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Pressurization Fans</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Ventilation Fans</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Indoor Air Quality</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk"><span class="Txt">Basement Co Sensor</span></a>
                            </li>
                        
                        </ul>
                    </li>


                     <li >
                        <a class="Lnk Arr Slct Dshbrd" href="#" id="dshbrdLightId"><span id="dsh" class="Lnk Arr Slct Dshbrd">Light</span></a>
                        <ul class="ScndLvl" id="hidelight" style="display: none;">
                            <li>
                                <a href="#wldiv2" class="Lnk Actv WtrTnk"><span class="Txt">Lights</span></a>
                            </li>
                            
                           
                        
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>
        <?php $this->load->view('header/demoheader');?>

        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <div class="DshBrdRprtSctn">
                <div class="RprtHldr">
                    <div class="RprtHdr">
                        <span class="TtlTxt">Chiller Graph Report</span>
                        <ul class="TtlBrdCrmb">
                            <li>
                                <a href="" class="Lnk">Reports</a>
                            </li>
                            <li>
                                <a href="" class="Lnk">Chillers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="SrchSctn">
                    
                        <div class="row-hari">
                            <label>Select Meter : </label>
                            <select >
                                <option>Chiller_1</option>
                                <option>Chiller_2</option>
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
                            <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
                            <button type="button" onclick="getChillerReport()" class="btn btn-success">Filter</button>
                            <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
                            <button type="button" class="btn btn-info"  id="export" disabled="true"  onclick="exportTableToExcel('list')">Export</button>

                        </div>
                    <div id="alert"></div>
                    <div class="box-body">
                      <div  id="container_runn1">
                        <!-- <canvas id="creditSat" style="height:250px"></canvas> -->
                      </div>

                                              
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">

     $(function () {
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
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
function getConsumptionReport(){
  var valid=validate();
  if(valid){
    
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var meter1 = meter.toString();
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
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
    var k = 1;
    $("#list tbody").empty();
    for (var j = 0; j < noofmeters; j++) {
      var urlString = "getEnergyMeterReport";
      $.ajaxQueue({
        url:urlString,
        type : 'GET',
        async: true,
        data: {meter: meter[j],fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
          var obj = JSON.parse(data);
          appendData(obj);
        }
      });
    }
    //document.getElementById("loading").style.display="block";
    
  }
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
function validate()
{
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter =="")
    {
      alertdiv.innerHTML="Please select meter";
      return false;
    }
    else if(fromtime == "Select Hours From")
    {
      // alertdiv.innerHTML="Please select From Hours";
      // return false;
      
    }
    else if(totime == "Select Hours To")
    {
      // alertdiv.innerHTML="Please select To Hours";
      // return false;

    }
    
    if(true)
    {
      if(Date.parse('01/01/2011 '+fromtime)>Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select timings properly";
        return false;
      }
      if(Date.parse('01/01/2011 '+fromtime)==Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select different timings ";
        return false;
      }
    }
    if(fromdate == "")
    {
      alertdiv.innerHTML="Please select date properly";
      return false;
    }
    else if(todate == "")
    {
      alertdiv.innerHTML="Please select date properly";
      return false;
    }
    else
    {
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
    

var dps1=['2020-03-01','2020-03-02','2020-03-03','2020-03-04'];
var dps2=['78','0','0','156'];
Highcharts.chart('container_runn1', {
    
    chart: {  
        type: 'column'
    },
      
    title: {
        text: 'RunningHours'
    },
    subtitle: {
        text: 'Chiller_1'
    },
    
    xAxis: {
        title: {      
          text: 'Time and Date'      
        },
        categories: [
            '2020-03-01',
            '2020-03-02',
            '2020-03-03',
            '2020-03-04'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Running Hours'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        
        name: 'Minutes',
        data: [78,0,0,156]

    }]
    //  xAxis: {
    //   title: {      
    //   text: 'Time and Date'      
    // },
    //   categories: dps1
    // },
    //  yAxis: {
    //   title: {      
    //   text: 'Minutes'      
    // }
    // },   
    //  series: [{
    //   name: 'Minutes',
    //     data: dps2
        
    // }]
});

</script>
<script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/commonjs.js"></script>
</html>