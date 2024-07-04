
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
  table td,table th{border-right:1px solid #ccc;text-align:center}
table th,table th{text-align:center}
    </style>
    <script type="text/javascript">  
    
     
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
      function appendData(obj)
      {
        // alert(obj);
        // document.getElementById("export").disabled=false;
        
        //document.getElementById("list1").value="";
        $("#list1 tbody").empty();
        var hoursxaxisarray=[];
        var footfallyaxisarray=[];
        document.getElementById("tab").style.display="block";
        document.getElementById("loading").style.display="none";
        document.getElementById("export").style.display="block";
        var rows="";
        var j=1;
        // alert(obj.length);
        // rows+="<thead><tr><th>SNo</th><th>Meter</th><th>Date</th><th>Time</th><th>Footfall</th></tr></thead>"
        for (var i = 0; i < obj.length; i++) 
        {
          rows += "<tr align='center'><td align='center'>" + j + "</td><td>RestRoom</td><td>" +obj[i]['date'] + "</td><td>" + obj[i]['unaodr'] + "</td></tr>";            
          j++;    
        }

        $(rows).appendTo("#list1 tbody");
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
            <a href="<?php echo base_url(); ?>Login/wdemologout"><img class="SgnOt" src="<?php echo base_url(); ?>asset/ambienceasset/images/MenuLogout-C.png"></a>
                <!-- <span class="UsrNm">Sodexo User</span> -->
            </div>
                      
           
           
        </div>
    
        <div id="DshBrd" class="DshbordCntr">
            <div class="DshbrdHdr">
               <div class="row SctnSlctr">
        
          <!--          <li>
<a href="<?php //echo site_url('Demo/demoData') ?>" class="Lnk"><span class="Txt">Dashboard1</span></a>
</li>
<li>
<a href="<?php //echo site_url('Demo/getReport') ?>" class="Lnk"><span class="Txt">Report1</span></a>
</li> -->
          <div class="col-md-6" id="links">
            <span class="SctnNm"><a href="<?php echo site_url('Demo2/getOdourUnaccReport') ?>" class="Lnk">Reports</a></span>
          </div>
                </div>
                
                <div class="SctnSrch"  id="reportsid">
                    <ul class="SrchLst">
                        <li>
                            <div class="LstLft"><span class="Txt">Report Type</span></div>
                            <div class="LstRgt">
                                <!-- <input type="text" class="Inpt" value="RestRoom" /> -->
                                <select class="Inpt" id="reports">
                                <option>None Selected</option>
                                   
                                    <option>Odour Unacceptbe Report</option>
                                   
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="LstRgt"><input style="width:150px" type="date" name="fromdate" id="fromdate" data-placeholder="From date" required aria-required="true"></div>
                        </li>
                        <li >
                           
                            <div class="LstRgt"><input style="width:150px" type="date" name="todate" id="todate" data-placeholder="To date" required aria-required="true"></div>
                        </li>
                       
                       
                        <li class="report_btn" style="padding:0px">
                            <input type="button" class="btnrset" value="Go" onclick="getReports();"/>
                            <a href="<?php echo site_url('Demo2/getOdourUnaccReport') ?>" class="btnrset">Reset</a>
                            <!-- <input type="button" class="Btn1"    onclick="resetpage()" value="Reset"> -->
                            <input type="button" class="Btn1"  id="export"   onclick="exportTableToExcel1('list1')" style="display: none;margin-left: 10px;" value="Export">
                            
                        </li>
                    </ul>
                   
                </div>
                 
            </div>
            </div>
            </div>
            <div id="DshBrd" class="DshbordCntr style-2" style="position:absolute; top:90px; bottom:40px; left:15px; right:15px; overflow:auto;"> 
 
            <!-- animation starts -->
            <div class="lds-ellipsis" id="loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
            <!-- animation end -->

          <!-- consolidate start -->
<div id="alert"></div>
       
      


           <div id="tab" style="display: none;">
              <table id ="list1" class="table table-bordered table-hover" style="width: 100%;border: 1px">
                <thead><tr align="center"><th>SNo</th><th>Location</th><th>Date</th><th>Odour Unacceptable Time</th></tr></thead>

                <tbody>

                </tbody>
              </table>

            </div>
            
            
            
            
        </div>
     

      <div class="Footer" style="position:absolute; bottom:0px; height:40px; left:0px; right:0px; overflow:hidden;"> <span class="Cpyrght">&copy; www.wenalytics.com</span></div>
    </div>
</body>
<script type="text/javascript">


  function getReports(){
    //alert("h");

          document.getElementById("loading").style.display="block";
          document.getElementById("tab").style.display='block';
         var fromdate = document.getElementById("fromdate").value;
     var todate = document.getElementById("todate").value;
       
        var urlString = "<?php echo base_url(); ?>Demo2/getOdorUnacceptleReport";
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
  
  function exportTableToExcel1(tableID, filename = '')
  {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'OdourUnaccReport.xls';
    
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
