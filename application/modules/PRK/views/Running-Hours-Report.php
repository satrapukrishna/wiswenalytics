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

     <!-- multiselect -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
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
              <span class="TtlTxt">Running Hours Report</span>
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
              <ul class="SrchBx RnngHrs">
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
                <!--  <li>
                    <span class="SrchTxtTtl">From Time</span>
                    <input type="text" class="Inpt" />
                </li>
                <li>
                    <span class="SrchTxtTtl">To Time</span>
                    <input type="text" class="Inpt" />
                </li> -->
                <li class="BtnHldr">
                    <input type="button" class="InptBtn" onclick="getRunningReport()" value="Submit" />
                </li>
                <li class="BtnHldr">
                    <input type="button" class="InptBtn" onClick="window.location.reload()" value="Reset" />
                </li>
                <li><button type="button" class="InptBtn"  id="export" disabled="true"   onclick="exportTableToExcel('list')">Export</button></li>
              </ul>
            </div>
            <div class="loader" id="loading" align="center" 
            style="position: absolute;left: 50%;;display: none">
            </div>

            <div class="RprtDtlsHldr">
              <div id="alert"></div>
              <div class="RptDvHldr">
                <div class="RprtTblHldr NoTtl">
                  <div class="RprtDvTbl" id="adddata">  
                    <table id = "list" class="table table-bordered table-hover" >
                      <thead>
                        <tr>
                          <th style="font-size: 14px;">SNo</th>
                          <th style="font-size: 14px;">Meter</th>
                          <th style="font-size: 14px;">Date/Hours</th>
                          <th style="font-size: 14px;">RunningHours</th>
                          <th style="font-size: 14px;">FuelAdd</th>
                          <th style="font-size: 14px;">FuelRemove</th>
                          <th style="font-size: 14px;">Fuel Consumed</th>
                          <th style="font-size: 14px;">Economy</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>                            
                  </div>
                </div>
              </div>
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
     function getRunningReport(){
        document.getElementById("loading").style.display="block";
        //$('#adddata').children().not("#first").remove();
       
  var valid=validate();
  if(valid){      
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
    $("#list tbody").empty();
    var k = 1,kl=1;
    for (var j = 0; j < noofmeters; j++) {
      // $("#loading").css("display", "block");
    //  http://chekhra.net/chekhranew/Generators/fuelSensor/fuelGraph_submit_prk.php?generatorId=PRKDG02&from_date=2019-11-11&to_date=2019-11-11&client=534
      var urlString = "http://chekhra.net/chekhranew/Generators/fuelSensor/runningHours_prk.php";
      $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {generatorId: meter[j],from_date:fromdate,to_date:todate,client:534},
        success: function(data){
          var me = meter[k-1];
          //document.getElementById("loading").style.display="block";
          addTableData(data,me,k);
          //
          //document.getElementById(graph).style.display = "block";

          k++;
          if(k==(noofmeters+1)){
            document.getElementById("loading").style.display="none";
          }
        }
      });
      
    }

    //document.getElementById('graph_1Runn').style.display = "block";
  }
     }
     function addTableData(data,meter,k){



         document.getElementById("export").disabled=false;
         var jsondata = JSON.parse(data);
  var rows="";
 var j=1;
  for (var i = 0; i < jsondata.length; i++) {


    rows += "<tr><td>" + j + "</td><td>" + meter + "</td><td>" + jsondata[i]["date"] + "</td><td>" + jsondata[i]["running"] + "</td><td>" + jsondata[i]["fueladd"] + "</td><td>" + jsondata[i]["fremove"] + "</td><td>" + jsondata[i]["fconsume"] + "</td><td>" + jsondata[i]["economy"] + "</td></tr>";
            
            j++;
    
  }
  $(rows).appendTo("#list tbody");



        //document.getElementById("loading").style.display="none";
        // var jsondata = JSON.parse(data);
        // var j=1;
        // var div="";
        // for (var i = 0; i < jsondata.length; i++) {

        //     div+=' <div class="RprtDvRow"><div class="RprtDvCll Cntr">' + j + '</div><div class="RprtDvCll">'+meter+'</div><div class="RprtDvCll">'+jsondata[i]["date"]+'</div><div class="RprtDvCll">'+jsondata[i]["running"]+'</div><div class="RprtDvCll">'+jsondata[i]["fueladd"]+'</div><div class="RprtDvCll">'+jsondata[i]["fremove"]+'</div><div class="RprtDvCll">'+jsondata[i]["fconsume"]+'</div><div class="RprtDvCll">'+jsondata[i]["economy"]+'</div></div>';
           
                    
        //             j++;
            
        //   }
        //   //document.getElementById("loading").style.display="none";
        //   $("#adddata").append(div);

     }
</script>
<script src="<?php echo base_url(); ?>asset/prkhospitalasset/Scripts/commonjs.js"></script>
</html>