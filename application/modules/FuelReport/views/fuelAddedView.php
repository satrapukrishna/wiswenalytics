
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wenalytics
    </title>
    <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: center;
}
</style>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
    <link rel="icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php $this->load->view('header/header');?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view('navigation/navigator');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="    width: 57%;">
            Fuel Added Report
            <!-- <small>Preview sample</small> -->
          </h1>
        </section>
        <div id="alert"></div>
        <!-- Main content -->
        <section class="content">
          <form>
          <div class="row meter-top">        
        <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
        <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick="getFuelReport()"; class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
        <button type="button" class="btn btn-info"  id="export" disabled="true"  onclick="exportTableToExcel('list')">Export</button>
      </div>
        </form>
        <!-- animation starts -->

        <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>

        <!-- animation end -->
       
    <div id = "tab">
        <table id = "list" class="table table-bordered table-hover">
            <thead>
            <!-- <tr>
    <th rowspan="2" align="center">SNo</th>
    <th rowspan="2" align="center">Date</th>
    <th colspan="3" align="center">Meters</th>
  </tr> -->
               
            </thead>

            <tbody>

            </tbody>
        </table>
</div>
          <div class="row" id="chart">
            <div class="col-md-12" >

             
              
            </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('footer/footer');?>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/jquery/dist/jquery.min.js">
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/chart/Chart.js">
    </script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/fastclick/lib/fastclick.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/adminlte.min.js">
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/dist/js/demo.js">
    </script>
    <!-- FLOT CHARTS -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.js">
    </script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.resize.js">
    </script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.pie.js">
    </script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/Flot/jquery.flot.categories.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- page script -->
    <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script>
<script>
       
      $(function () {
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
      });
function exportTableToExcel(tableID, filename = '')
{
  var downloadLink;
  var dataType = 'application/vnd.ms-excel';
  var tableSelect = document.getElementById(tableID);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
  // Specify file name
  filename = filename?filename+'.xls':'FuelAddedReport.xls';
    
  // Create download link element
  downloadLink = document.createElement("a");
    
  document.body.appendChild(downloadLink);
    
  if(navigator.msSaveOrOpenBlob)
  {
      var blob = new Blob(['\ufeff', tableHTML], {
          type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
  }
  else
  {
    // Create a link to the file
    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

    // Setting the file name
    downloadLink.download = filename;
    
    //triggering the function
    downloadLink.click();
  }
}
function getFuelReport()
{
  var valid=validate();
  if(valid)
  {
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
    if(difference == 0 || difference >= 1)
    {
      difference += 1;
    }
    var k = 1;
    $("#list tbody").empty();
    
      var urlString = "getFuelAddedReport";
      $.ajaxQueue({
        url:urlString,
        type : 'GET',
        async: true,
        data: {fromdate:fromdate,todate:todate},
        success: function(data){
          var obj = JSON.parse(data);
          // console.log(obj);
          appendData(obj);
        }
      });
    
    document.getElementById("loading").style.display="block";
    
  }
}

function appendData(data)
{
  //document.getElementById("list").style.display="block";
  //document.getElementById("export").style.display="block";
  document.getElementById("export").disabled=false;
  var rows="";
  var j=1;
  for (var i = 0; i < data.length; i++) 
  {
    if(i==0)
    {
      
      rows +="<tr> <th rowspan='2' align='center'>SNo</th><th rowspan='2' align='center'>Date</th>    <th colspan='3' align='center'>Meters</th> </tr>";
      rows += "<tr><td>" + data[0][0]["meter"] + "</td><td>" + data[0][1]["meter"] + "</td><td>" + data[0][2]["meter"] + "</td><td>" + data[0][3]["meter"] + "</td><td>" + data[0][4]["meter"] + "</td></tr>";
    }
    rows += "<tr>";
    for (var i1 = 0; i1 < data[i].length; i1++) 
    {
      if(i1==0)
      {
        rows += "<td align='center'>" + j + "</td><td align='center'>" + data[i][i1]["date"] + "</td>";
      }
      rows += "<td>" + data[i][i1]["FuelAdded"] + "</td>";
    }
    rows += "</tr>";
    //rows += "<tr><td>" + j + "</td><td>" + data[0][1]["date"] + "</td><td>" + data[i]['FuelAdded'] + "</td><td>" + data[i]['runninghrs'] + "</td><td>" + data[i]['FuelAdded'] + "</td><td>" + data[i]['Fuelconsume'] + "</td><td>" + data[i]['economy'] + "</td></tr>";
            
    j++;
    
  }
  $(rows).appendTo("#list tbody");
  document.getElementById("loading").style.display="none";

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

function datediff(first, second) 
{
  // Take the difference between the dates and divide by milliseconds per day.
  // Round to nearest whole number to deal with DST.
  return Math.round((second-first)/(1000*60*60*24));
}

function validate()
{
  //var meterselect = document.getElementsByTagName('select')[0];
  //var meter =getSelectValues(meterselect);
  //var fromtime = document.getElementById("fromtime").value;
  //var totime = document.getElementById("totime").value;
  var fromdate = document.getElementById("fromdate").value;
  var todate = document.getElementById("todate").value;
  var alertdiv = document.getElementById("alert");
  

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
</script>

</body>

</html>