<?php
//echo "<pre>";print_r($meters);die();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Protech Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../asset/common-utilits/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/common-utilits/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../asset/common-utilits/dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" type="imag/x-icon" href="../../asset/common-utilits/dist/img/fav.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <link rel="stylesheet" href="../../asset/energymeterasset/css/energymeterStyle.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="    width: 57%;">
       Temperature Alert's
        <!-- <small></small> -->
      </h1>
    </section>
    <div id="alert"></div>
    <!-- Main content -->
    <section class="content">
      <div class="row temp-alert">

       <ul class="nav nav-tabs">
        <li class="nav active"><a data-toggle="tab" href="#subscription">Alert Subscription</a></li>
        <li class="nav"><a data-toggle="tab" href="#dashboard">Alert Dashboard</a></li>
        <li class="nav" onclick="getAlertsData()"><a data-toggle="tab" href="#subscribed-alerts">Subscribed Alert's</a></li>
       </ul>

      <div class="tab-content">
        <div id="alert"></div>
        <!-- Show this tab by adding `active` class -->
        <div class="row alerts-new tab-pane fade in active" id="subscription">
            <form id="alertform">
           <div class="col-md-6">
            <div class="individul tempalert">
            <label>Select Meter  
            </label>
        <select id="multiMeter" name="multiMeter" multiple="multiple">
          <?php 
          foreach ($meters as $value) {
          ?>
            <option value="<?php echo $value; ?>"> 
              <?php echo $value; ?> 
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="individul">
         <label>Select Days  
          </label>
        <select id="days" name="days" multiple="multiple">
          <option>Monday</option>
          <option>Tuesday</option>
          <option>Wednesday</option>
          <option>Thursday</option>
          <option>Friday</option>
          <option>Saturday</option>
          <option>Sunday</option>

        </select>
        </div>
        <div class="individul">
         <label>Select Hours From  
            </label>
        <select id="fromtime">
            <option value="Select Hours">Select Hours From
          </option>
          <?php 
            $j = 24;$list = "";$options = array();
            for($i=0;$i<=$j ;$i++){
            if($i<10)
            $options[$i] =  "0".$i.":00:00";
            else
            $options[$i] =  $i.":00:00";
            }
            foreach ($options as $value) {
              $list .= "<option value=".$value.">".$value."</option>";
            }
            echo $list;
          ?>
        </select>
        </div>
        <div class="individul">
        <label>Select Hours To  
            </label>
        <select id="totime">
          <option value="Select Hours">Select Hours To
          </option>
          <?php 
            $j = 24;$list = "";$options = array();
            for($i=0;$i<=$j ;$i++){
            if($i<10)
            $options[$i] =  "0".$i.":00:00";
            else
            $options[$i] =  $i.":00:00";
            }
            foreach ($options as $value) {
              $list .= "<option value=".$value.">".$value."</option>";
              /*if($value == "24:00:00"){
                    $list .= "<option value=".$value." selected='true'>".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }*/
            }
            echo $list;
          ?>
        </select>
        </div>
        <div class="mini-alert">
          <label>
            Minimum Temp Alert
          </label>
          <input type="checkbox" name="mintempcheck" id="mintempcheck">
          <input type="number" name="mintemp" id="mintemp" disabled>
        </div>
        <div class="mini-alert">
          <label>
            Maximum Temp Alert
          </label>
          <input type="checkbox" name="maxtempcheck" id="maxtempcheck">
          <input type="number" name="maxtemp" id="maxtemp" disabled>
        </div>
        <div class="mini-alert">
          <label>
            SMS Alert
          </label>
          <input type="checkbox" name="sms" id="sms">
          <label>
            Mail Alert
          </label>
          <input type="checkbox" name="mail" id="mail">
        </div>
        <div class="individul">
          <label>
            Email
          </label>
         <input type="email" name="emailId" id="emailId" placeholder="multiple email-ids with , seperation">
        </div>
        <div class="individul">
          <label>
            Phone Number
          </label>
         <input type="text" name="phonenumber" id="phonenumber" placeholder="multiple phone numbers with , seperation">
        </div>
        <div class="">
          <button type="button" onclick="saveAlert();" class="btn btn-info">Subscribe</button>
           <button type="reset" class="btn btn-default">Cancel</button>
        </div>
      </div>
      </form>
        </div>
        
        <!-- alert subscription end -->

        <!-- dashboard starts -->

        <div class="tab-pane fade" id="dashboard">
           <div class="">
            <marquee>
              <h2>Welcome to  Dashboard</h2>
            </marquee>
            <p>
              Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
            </p>
               
              </div>
        </div>
        <!-- dashboard end -->

        <!-- subscribed alerts starts from -->
        <div class="tab-pane fade" id="subscribed-alerts">
          <div class="alerts-new">
            <table id="example1" class="table table-bordered table-striped" style="display: block;">
                <!--class="table table-bordered table-striped"-->
                
            </table>
          </div>
        </div>
        <!-- subscribed alerts end  -->

        <!-- Modal starts -->

          <div class="modal fade" id="myModal" role="dialog">
            
          </div>
       <!-- Modal end -->


       <!--Edit Modal starts -->

          <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Subscriber Alert's Edit</h4>
                </div>
                <div class="modal-body" id="editfromdata">
                  <div id="editalert"></div>
                  <form id="alertform1">
                    <div class="individul tempalert">
                    <label>Select Meter  
                    </label>
                      <select id="editmultiMeter" name="editmultiMeter" multiple="multiple" data-toggle="tooltip" data-placement="top" title="Press Control Button  for Multiple Meter Selection" style="height: initial !important">
                        <?php 
                        foreach ($meters as $value) {
                        ?>
                          <option value="<?php echo $value; ?>"> 
                            <?php echo $value; ?> 
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="individul">
                       <label>Select Days  
                        </label>
                      <select id="editdays" name="days" multiple="multiple" data-toggle="tooltip" data-placement="top" title="Press Control Button  for Multiple days Selection" style="height: initial !important">
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                        <option>Sunday</option>

                      </select>
                      </div>
                      <div class="individul">
                       <label>Select Hours From  
                          </label>
                      <select id="editfromtime">
                          <option value="Select Hours">Select Hours From
                        </option>
                        <?php 
                          $j = 24;$list = "";$options = array();
                          for($i=0;$i<=$j ;$i++){
                          if($i<10)
                          $options[$i] =  "0".$i.":00:00";
                          else
                          $options[$i] =  $i.":00:00";
                          }
                          foreach ($options as $value) {
                            $list .= "<option value=".$value.">".$value."</option>";
                          }
                          echo $list;
                        ?>
                      </select>
                      </div>
                      <div class="individul">
                      <label>Select Hours To  
                          </label>
                      <select id="edittotime">
                        <option value="Select Hours">Select Hours To
                        </option>
                        <?php 
                          $j = 24;$list = "";$options = array();
                          for($i=0;$i<=$j ;$i++){
                          if($i<10)
                          $options[$i] =  "0".$i.":00:00";
                          else
                          $options[$i] =  $i.":00:00";
                          }
                          foreach ($options as $value) {
                            $list .= "<option value=".$value.">".$value."</option>";
                            /*if($value == "24:00:00"){
                                  $list .= "<option value=".$value." selected='true'>".$value."</option>";
                                }else{
                                  $list .= "<option value=".$value.">".$value."</option>";
                                }*/
                          }
                          echo $list;
                        ?>
                      </select>
                      </div>
                      <div class="mini-alert">
                        <label>
                          Minimum Temp Alert
                        </label>
                        <input type="checkbox" name="mintempcheck" id="editmintempcheck">
                        <input type="number" name="mintemp" id="editmintemp" disabled>
                      </div>
                      <div class="mini-alert">
                        <label>
                          Maximum Temp Alert
                        </label>
                        <input type="checkbox" name="maxtempcheck" id="editmaxtempcheck">
                        <input type="number" name="maxtemp" id="editmaxtemp" disabled>
                      </div>
                      <div class="mini-alert">
                        <label>
                          SMS Alert
                        </label>
                        <input type="checkbox" name="sms" id="editsms">
                        <label>
                          Mail Alert
                        </label>
                        <input type="checkbox" name="mail" id="editmail">
                      </div>
                      <div class="individul">
                        <label>
                          Email
                        </label>
                       <input type="email" name="emailId" id="editemailId" placeholder="multiple email-ids with , seperation">
                      </div>
                      <div class="individul">
                        <label>
                          Phone Number
                        </label>
                       <input type="text" name="phonenumber" id="editphonenumber" placeholder="multiple phone numbers with , seperation">
                        <input type="hidden" name="editid" id="editid" value="">
                      </div>

                      <div class="">
                        <button type="button" onclick="editAlert();" class="btn btn-info">Update</button>
                         <button type="reset" class="btn btn-default">Cancel</button>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
       <!-- Edit Modal end -->
        </div>
      </div>
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2018<a href="">Protech</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../asset/common-utilits/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../asset/common-utilits/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../../asset/common-utilits/bower_components/Chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../../asset/common-utilits/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/common-utilits/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/common-utilits/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../../asset/common-utilits/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- page script -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="../../asset/Jquery/ajaxQueuePlugin.js"></script>
<script>
  $(function () {
        $('#multiMeter').multiselect({
          includeSelectAllOption: true
        });
        /*$('#editmultiMeter').multiselect({
          includeSelectAllOption: true
        });*/
         $('#days').multiselect({
          includeSelectAllOption: true
        });
        /* $('#editdays').multiselect({
          includeSelectAllOption: true
        });*/
      });

  //checkbox function start

   document.getElementById('mintempcheck').onchange = function() {
    document.getElementById('mintemp').disabled = !this.checked;
};
 document.getElementById('maxtempcheck').onchange = function() {
    document.getElementById('maxtemp').disabled = !this.checked;
};
document.getElementById('editmintempcheck').onchange = function() {
    document.getElementById('editmintemp').disabled = !this.checked;
};
 document.getElementById('editmaxtempcheck').onchange = function() {
    document.getElementById('editmaxtemp').disabled = !this.checked;
};
function editAlert(){
  var valid=editvalidate();
  if(valid){
    var meter = $('#editmultiMeter').val();
    var day = $('#editdays').val();
    var fromtime = document.getElementById("editfromtime").value;
    var totime = document.getElementById("edittotime").value;
    var alertdiv = document.getElementById("editalert");
    var mintempcheck = document.getElementById("editmintempcheck").checked;
    var maxtempcheck = document.getElementById("editmaxtempcheck").checked;
    var mintemp = document.getElementById("editmintemp").value;
    var maxtemp = document.getElementById("editmaxtemp").value;
    var sms = document.getElementById("editsms").checked;
    var mail = document.getElementById("editmail").checked;
    var emailId = document.getElementById("editemailId").value;
    var phonenumber = document.getElementById("editphonenumber").value;
    var editid = document.getElementById("editid").value;
    var urlString = "tempAlertUpdate";
    $.ajax({
      url:urlString,
      type : 'POST',
      async: true,
      data: {meter: meter,fromtime:fromtime,totime:totime,day:day,mintempcheck:mintempcheck,maxtempcheck:maxtempcheck,mintemp:mintemp,maxtemp:maxtemp,sms:sms,mail:mail,emailId:emailId,phoneno:phonenumber,editid:editid},
      success: function(data){
        alertdiv.innerHTML = data;
        if(data = "Alert Updated sucessfully"){
          getAlertsData();
          document.getElementById("alertform1").reset();
        }
      }
    });
  }
}
//checkbox function end
function saveAlert(){
  var valid=validate();
  if(valid){
    var meterselect = document.getElementsByTagName('select')[0];
    var meter =getSelectValues(meterselect);
    var dayselect = document.getElementsByTagName('select')[1];
    var day =getSelectValues(dayselect);
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var alertdiv = document.getElementById("alert");
    var mintempcheck = document.getElementById("mintempcheck").checked;
    var maxtempcheck = document.getElementById("maxtempcheck").checked;
    var mintemp = document.getElementById("mintemp").value;
    var maxtemp = document.getElementById("maxtemp").value;
    var sms = document.getElementById("sms").checked;
    var mail = document.getElementById("mail").checked;
    var emailId = document.getElementById("emailId").value;
    var phoneno = document.getElementById("phonenumber").value;
    var urlString = "tempAlertSubmit";
    $.ajax({
      url:urlString,
      type : 'POST',
      async: true,
      data: {meter: meter,fromtime:fromtime,totime:totime,day:day,mintempcheck:mintempcheck,maxtempcheck:maxtempcheck,mintemp:mintemp,maxtemp:maxtemp,sms:sms,mail:mail,emailId:emailId,phoneno:phoneno},
      success: function(data){
        alertdiv.innerHTML = data;
        if(data = "Alert Added sucessfully"){

          document.getElementById("alertform").reset();

        }
      }
    });
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
function validate(){
  var meterselect = document.getElementsByTagName('select')[0];
  var meter =getSelectValues(meterselect);
  var dayselect = document.getElementsByTagName('select')[1];
  var day =getSelectValues(dayselect);
  var fromtime = document.getElementById("fromtime").value;
  var totime = document.getElementById("totime").value;
  var alertdiv = document.getElementById("alert");
  var mintempcheck = document.getElementById("mintempcheck").checked;
  var maxtempcheck = document.getElementById("maxtempcheck").checked;
  var mintemp = document.getElementById("mintemp").value;
  var maxtemp = document.getElementById("maxtemp").value;
  var sms = document.getElementById("sms").checked;
  var mail = document.getElementById("mail").checked;
  var emailId = document.getElementById("emailId").value;
  var phonenumber = document.getElementById("phonenumber").value;
  if(meter ==""){
    alertdiv.innerHTML="Please select meter";
    return false;
  }
  if(day ==""){
    alertdiv.innerHTML="Please select days";
    return false;
  }
  else if((fromtime == "Select Hours" || totime == "Select Hours")){
    alertdiv.innerHTML="Please select timings properly";
    return false;
  }else if((fromtime != "Select Hours" && totime != "Select Hours")){

  }else{
    alertdiv.innerHTML="Please select timings properly";
    return false;
  }
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
  if(mintempcheck && mintemp==""){
      alertdiv.innerHTML="Please enter minimum temperature";
      return false;
  }
  if(maxtempcheck && maxtemp==""){
      alertdiv.innerHTML="Please enter maximum temperature";
      return false;
  }
  if(mintempcheck || maxtempcheck){

  }else{
    alertdiv.innerHTML="Please select one of the alert value (min or max)";
    return false;
  }
  if(mail || sms){

  }else{
    alertdiv.innerHTML="Please select one of the alert (SMS or Email)";
    return false;
  }
  if(mail && emailId == ""){
    alertdiv.innerHTML="Please enter emailId's properly";
    return false;
  }
  if(sms && phonenumber == ""){
    alertdiv.innerHTML="Please enter phone number's properly";
    return false;
  }
  alertdiv.innerHTML="";
  return true;
}
function editvalidate(){

  var meter =$('#editmultiMeter').val();
  var day =$('#editdays').val();
  var fromtime = document.getElementById("editfromtime").value;
  var totime = document.getElementById("edittotime").value;
  var alertdiv = document.getElementById("editalert");
  var mintempcheck = document.getElementById("editmintempcheck").checked;
  var maxtempcheck = document.getElementById("editmaxtempcheck").checked;
  var mintemp = document.getElementById("editmintemp").value;
  var maxtemp = document.getElementById("editmaxtemp").value;
  var sms = document.getElementById("editsms").checked;
  var mail = document.getElementById("editmail").checked;
  var emailId = document.getElementById("editemailId").value;
  var phonenumber = document.getElementById("editphonenumber").value;
  if(meter ==""){
    alertdiv.innerHTML="Please select meter";
    return false;
  }
  if(day ==""){
    alertdiv.innerHTML="Please select days";
    return false;
  }
  else if((fromtime == "Select Hours" || totime == "Select Hours")){
    alertdiv.innerHTML="Please select timings properly";
    return false;
  }else if((fromtime != "Select Hours" && totime != "Select Hours")){

  }else{
    alertdiv.innerHTML="Please select timings properly";
    return false;
  }
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
  if(mintempcheck && mintemp==""){
      alertdiv.innerHTML="Please enter minimum temperature";
      return false;
  }
  if(maxtempcheck && maxtemp==""){
      alertdiv.innerHTML="Please enter maximum temperature";
      return false;
  }
  if(mintempcheck || maxtempcheck){

  }else{
    alertdiv.innerHTML="Please select one of the alert value (min or max)";
    return false;
  }
  if(mail || sms){

  }else{
    alertdiv.innerHTML="Please select one of the alert (SMS or Email)";
    return false;
  }
  if(mail && emailId == ""){
    alertdiv.innerHTML="Please enter emailId's properly";
    return false;
  }
  if(sms && phonenumber == ""){
    alertdiv.innerHTML="Please enter phone number's properly";
    return false;
  }
  alertdiv.innerHTML="";
  return true;
}
function getAlertsData(){
  //document.getElementById("example1").style.display = "none";
  var urlString = "subscribedAlerts";
  $.ajax({
    url:urlString,
    type : 'GET',    
    success: function(data){
      var res = JSON.parse(data);
      addalertsData(res);

    }
  });
}
function addalertsData(res){
  var alertdiv = document.getElementById("alert");
  alertdiv.innerHTML = "";
  var table = document.getElementById("example1");
  var tableData = "<thead>";
  tableData += "<tr><th style='width: 5%'>S.No</th><th style='width: 15%'>Meter Name</th><th style='width: 10%'>Day</th><th style='width: 10%'>Hours From</th>";
  tableData += "<th style='width: 10%'>Hours To</th><th style='width: 10%'>Min Temp</th><th style='width: 10%'>Max Temp</th><th style='width: 10%'>Email</th><th style='width: 10%'>Phone Number</th><th style='width: 10%'>Action</th></tr></thead><tbody>";
  if(res.length == 0){
    tableData += "<tr><td colspan='10' align='center'>No records found</td></tr>"
  }else{
    for (var i = 0; i < res.length; i++) {
      j = i+1;
      var from = res[i]['from_time'].split('.');
      var to = res[i]['to_time'].split('.');
      var meter = res[i]['meter_name'].replace(",",", ");
      var days = res[i]['days'].replace(",",", ");
      var mail = res[i]['email'].replace(",",", ");
      var contacts = res[i]['contact_no'].replace(",",", ");
      tableData += "<tr><td style='width: 5%'>"+j+"</td><td style='width: 15%;word-wrap: break-word;'>"+meter+"</td><td><div style='word-wrap: break-word;'>";
      tableData += days+"</div></td><td style='width: 10%'>"+from[0]+"</td><td style='width: 10%'>"+to[0]+"</td><td style='width: 10%'>";
      tableData += res[i]['min_temp']+"</td><td style='width: 10%'>"+res[i]['max_temp']+"</td><td style='width: 10%'>"+mail+"</td><td style='width: 10%'>";
      tableData += contacts+"</td><td style='width: 10%'>";
      tableData += "<a href='#' data-toggle='modal' data-target='#myModal' onclick='showAlertDetails("+JSON.stringify(res[i])+")' data-placement='top' title='More Details'>";
      tableData += "<i class='fa fa-id-card-o' aria-hidden='true' style='margin-right: 10px;'></i>";
      tableData += "</a> <a href='#' data-toggle='modal' data-target='#editModal' onclick='editData("+JSON.stringify(res[i])+")' data-placement='top' title='Edit'><i class='fa fa-pencil' aria-hidden='true' style='margin-right: 10px;'></i>";
      tableData += "</a><a href='#' data-toggle='tooltip' onclick='deleteData("+res[i]['id']+")' data-placement='top' title='Delete'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
    }
  }
  table.innerHTML = tableData;

}
function deleteData(id){
  var urlString = "DeleteAlert/"+id;
  $.ajax({
    url:urlString,
    type : 'GET',    
    success: function(data){
      getAlertsData();
    }
  });
}
function editData(res){
  var from = document.getElementById("editfromtime");
  var time1 =  res.from_time.split(".");
  for (var i = 0; i < from.options.length; i++) {
    if (from.options[i].value== time1[0]) {
      from.options[i].selected = true;       
    }
  }
  var to = document.getElementById("edittotime");
  var time2 =  res.to_time.split(".");
  for (var i = 0; i < to.options.length; i++) {
    if (to.options[i].value== time2[0]) {
      to.options[i].selected = true;       
    }
  }
  if(res.min_temp_check == "true"){
    document.getElementById("editmintempcheck").checked = true;
     document.getElementById('editmintemp').disabled =false;
     document.getElementById('editmintemp').value = res.min_temp;
  }
  if(res.max_temp_check == "true"){
    document.getElementById("editmaxtempcheck").checked = true;
     document.getElementById('editmaxtemp').disabled =false;
     document.getElementById('editmaxtemp').value = res.max_temp;
  }
  if(res.email_alert == "true"){
    document.getElementById("editmail").checked = true;
  }
  if(res.sms_alert == "true"){
    document.getElementById("editsms").checked = true;
  }
  document.getElementById("editemailId").value =res.email;
  document.getElementById("editphonenumber").value =res.contact_no;
  document.getElementById("editid").value = res.id;
  var metervalues = res.meter_name;
  var daysvalues = res.days;
  //var values = "Temperature_DessertsCounter";
  var valuearr = res.meter_name.split(",");
  var daysarr = res.days.split(",");
  var len = valuearr.length;
  var len1 = daysarr.length; 
  for (var i = 0; i < len; i++) {
    metervalues = metervalues.replace(", ",",");
  }
  for (var i = 0; i < len1; i++) {
    daysvalues = daysvalues.replace(", ",",");
  }
  var splitValues = metervalues.split(",");
  var multi = document.getElementById('editmultiMeter');
  var splitValues1 = daysvalues.split(",");
  var multi1 = document.getElementById('editdays');

  //multi.value = null; // Reset pre-selected options (just in case)
  var multiLen = multi.options.length;
  for (var i = 0; i < multiLen; i++) {
    if(multi.options[i].value == splitValues[i]){
       multi.options[i].selected = true;
    }

  }
  var multiLen1 = multi1.options.length;
  for (var j = 0; j< multiLen1; j++) {
    if(multi1.options[j].value == splitValues1[j]){
       multi1.options[j].selected = true;
    }

  }
  //var multi = document.getElementsByClassName("multiselect-container dropdown-menu");

}
function showAlertDetails(res){
  var alertdiv = document.getElementById("alert");
  alertdiv.innerHTML = "";
  var dialogue = document.getElementById("myModal");
  var data = "<div class='modal-dialog'>";
  data += "<div class='modal-content'><div class='modal-header'>";
  data += "<button type='button' class='close' data-dismiss='modal'>&times;</button><h4 class='modal-title'>Subscribed Alert's</h4></div>";
  data += "<div class='modal-body'><div class='det'><label>Meters</label> :<div style='word-wrap: break-word;'>"+res.meter_name+"</div></div>";
  data += "<div class='det'><label>Days</label> :<div>"+res.days+"</div></div>";
  data += "<div class='det'><label>Hours From</label> :<div>"+res.from_time+"</div></div>";
  data += "<div class='det'><label>Hours To</label> :<div>"+res.to_time+"</div></div>";
  if(res.min_temp_check == "true"){
    data += "<div class='det'><label>Min Temperature Alert</label> :<div>YES</div></div>";
  }else{
    data += "<div class='det'><label>Min Temperature Alert</label> :<div>NO</div></div>";
  }
  if(res.min_temp_check == "true"){
    data += "<div class='det'><label>Min Temperature</label> :<div>"+res.min_temp+"</div></div>";
  }else{
    data += "<div class='det'><label>Min Temperature</label> :<div>NA</div></div>";
  }
  if(res.max_temp_check == "true"){
    data += "<div class='det'><label>Max Temperature Alert</label> :<div>YES</div></div>";
  }else{
    data += "<div class='det'><label>Max Temperature Alert</label> :<div>NO</div></div>";
  }
  if(res.max_temp_check == "true"){
    data += "<div class='det'><label>Max Temperature</label> :<div>"+res.max_temp+"</div></div>";
  }else{
    data += "<div class='det'><label>Max Temperature</label> :<div>NA</div></div>";
  }
  if(res.email_alert == "true"){
    data += "<div class='det'><label>Email Alert</label> :<div>YES</div></div>";
  }else{
    data += "<div class='det'><label>Email Alert</label> :<div>NO</div></div>";
  }
  data += "<div class='det'><label>Email</label> :<div>"+res.email+"</div></div>";
  if(res.sms_alert == "true"){
    data += "<div class='det'><label>SMS Alert</label> :<div>YES</div></div>";
  }else{
    data += "<div class='det'><label>SMS Alert</label> :<div>NO</div></div>";
  }
  data += "<div class='det'><label>Phone Number</label> :<div>"+res.contact_no+"</div></div>";
  data += "</div><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></div></div>";
  dialogue.innerHTML = data;
}
</script>
</body>
</html>
