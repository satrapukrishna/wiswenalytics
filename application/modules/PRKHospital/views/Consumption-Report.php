<?php
//print_r($metervalues);
//die();
$meterList =array();
for ($i=0; $i < count($meters); $i++) { 
  array_push($meterList,$meters[$i]->MeterName);
}
sort($meterList);
//echo '<pre>'; print_r($this->session->all_userdata());
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
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
                        <span class="TtlTxt">Consumption Report</span>
                        <ul class="TtlBrdCrmb">
                            <li>
                                <a href="" class="Lnk">Reports</a>
                            </li>
                            <li>
                                <a href="" class="Lnk">Energy Meter</a>
                            </li>
                        </ul>
                    </div>
                    <div class="SrchSctn">
                        <ul class="SrchBx CnsmptnRprt">
                            <li>
                                <span class="SrchTxtTtl">Select Meter</span>
                                <select id="multiMeter" multiple="multiple" class="Inpt" >
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
                                <span class="SrchTxtTtl">Select Floor</span>
                                <input type="text" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">From Date</span>
                                <input type="date" id="fromdate" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">To Date</span>
                                <input type="date" id="todate" class="Inpt" />
                            </li>
                            <li>
                                <span class="SrchTxtTtl">From Time</span>
                                <select  id="fromtime" class="Inpt">
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
                                <!-- <input type="text" class="Inpt" /> -->
                            </li>
                            <li>
                                <span class="SrchTxtTtl">To Time</span>
                                 <select  id="totime" class="Inpt">
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
                                <!-- <input type="text" class="Inpt" /> -->
                            </li>
                            <li class="BtnHldr">
                                <input type="button" onclick="getConsumptionReport()"; class="InptBtn" value="Filter" />
                            </li>
                            <li class="BtnHldr">
                                <input type="button" class="InptBtn" onClick="window.location.reload()" value="Reset" />
                            </li>
                            <li class="BtnHldr">
                                <input type="button" class="InptBtn" value="Export" id="export" disabled="true"  onclick="exportTableToExcel('list')" />
                            </li>
                        </ul>
                    </div>
                     <div id="alert"></div>
                    <div class="RprtDtlsHldr">
                        <div class="RptDvHldr Hlf">
                            <div class="RprtTblHldr">
                                <span class="RprtTblTtl">Floor - 1 (Table Format)</span>
                                <table class="RprtTbl">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Meter</th>
                                        <th>Date</th>
                                        <th>Consumption</th>
                                    </tr>
                                </thead>
                                    <tbody>

                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                        <!-- <div class="RptDvHldr Hlf">
                            <div class="RprtTblHldr">
                                <span class="RprtTblTtl">Floor - 1 (Div Format)</span>
                                <div class="RprtDvTbl">
                                    <div class="RprtDvRow">
                                        <div class="RprtDvHdr">S. No.</div>
                                        <div class="RprtDvHdr">Meter</div>
                                        <div class="RprtDvHdr">Date</div>
                                        <div class="RprtDvHdr">Consumption</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">1</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">2</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">3</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">4</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="RptDvHldr Hlf">
                            <div class="RprtTblHldr">
                                <span class="RprtTblTtl">Floor - 1 (Div Format)</span>
                                <div class="RprtDvTbl">
                                    <div class="RprtDvRow">
                                        <div class="RprtDvHdr">S. No.</div>
                                        <div class="RprtDvHdr">Meter</div>
                                        <div class="RprtDvHdr">Date</div>
                                        <div class="RprtDvHdr">Consumption</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">1</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">2</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">3</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                    <div class="RprtDvRow">
                                        <div class="RprtDvCll">4</div>
                                        <div class="RprtDvCll">Meter 1</div>
                                        <div class="RprtDvCll">24-09-2019</div>
                                        <div class="RprtDvCll">80 KWH</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
function validate(){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var alertdiv = document.getElementById("alert");
    if(meter ==""){
      alertdiv.innerHTML="Please select meter";
      return false;
    }
    else if(fromtime == "Select Hours From"){
      // alertdiv.innerHTML="Please select From Hours";
      // return false;
      
    }else if(totime == "Select Hours To"){
      // alertdiv.innerHTML="Please select To Hours";
      // return false;

    }
    // else{
    //   alertdiv.innerHTML="Please select timings properly";
    //   return false;
    // }
    if(true){
      if(Date.parse('01/01/2011 '+fromtime)>Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select timings properly";
        return false;
      }
      if(Date.parse('01/01/2011 '+fromtime)==Date.parse('01/01/2011 '+totime)){
        alertdiv.innerHTML="Please select different timings ";
        return false;
      }
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
</script>
<script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/commonjs.js"></script>
</html>