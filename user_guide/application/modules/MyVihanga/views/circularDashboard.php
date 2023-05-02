<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Home Vihanga</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">
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
    <link rel="shortcut icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini" onload="fetchMyhomeData()">
<div class="wrapper">

   <?php $this->load->view('header');?>
   <?php $this->load->view('navigation');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row water-tank">

      <h1>
        <img src="<?php echo base_url(); ?>asset/common-utilits/dist/img/Forma.png"  alt="">
         Tank Level Dashboard
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div id="lastUpdateTime"></div>
        </li>
        
      </ul>
      </div>
     
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row canvas">
      <!-- domestic starts -->
      <div class="col-md-6 individual">
        <h4>Domestic Tank</h4>
        <div class="col-md-6" id="domestic1">
             
        </div>
        <div class="col-md-6" id="domestic2">
        
        </div>
      </div>
      <!-- domestic End -->

      <!-- flush starts -->
      <div class="col-md-6 individual">
        <h4>Flush Tank</h4>

        <div class="col-md-6" id="flush1">
         
        </div>
        <div class="col-md-6" id="flush2">
        
        </div>
      </div>
      <!-- flush End -->

      <!-- Collection Strats -->
      <div class="row  individual">

        <h4>Collection Tank</h4>
        <div class="col-md-6">
        
          <div class="col-md-6" id="collection1">
         
          </div>
          <div class="col-md-6" id="collection2">
          
          </div>
        </div>
      
        <div class="col-md-6">
        
          <div class="col-md-6" id="collection3">        
          </div>
          <div class="col-md-6" id="collection4"> 
          </div>

        </div>
        <div class="col-md-6"> 
          <div class="col-md-6" id="collection5">        
          </div>
        </div>
    
      </div>

     <!-- Collection end -->


    
    
    <!-- <div class="circle" id="circles-3"></div>
    <div class="circle" id="circles-4"></div>
    <div class="circle" id="circles-5"></div> -->
    
  </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018<a href="">Wenalytics.in</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

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
  <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/waterTank.js"></script>

 <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/circles.js">
    </script>
 <script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/circles.min.js">
    </script>

<script type="text/javascript">
function fetchMyhomeData()
{
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;

  console.log(today);
 
    var urlString = "<?php echo base_url();  ?>MyVihanga/getMyhomeData";
    $.ajax({
        url:urlString,
        type : 'GET',
        async: true,
        data: {date:today},
        success: function(data){
          console.log("success"+data);
          displayDomesticData(data);
        }
      });
}
function GetTime(date)
{
  var tmpArr = date.split(':'), time12;
  if(+tmpArr[0] == 12) {
  time12 = tmpArr[0] + ':' + tmpArr[1] + ' pm';
  } else {
  if(+tmpArr[0] == 00) {
  time12 = '12:' + tmpArr[1] + ' am';
  } else {
  if(+tmpArr[0] > 12) {
  time12 = (+tmpArr[0]-12) + ':' + tmpArr[1] + ' pm';
  } else {
  time12 = (+tmpArr[0]) + ':' + tmpArr[1] + ' am';
  }
  }
  }
  return " "+" "+time12;
}
function displayDomesticData(data)
{
  var d = JSON.parse(data);
  // console.log(d);
  var table1 = "";
  var table2 = "";
  var table3 = "";
  // table1.innerHTML = "";
  table1 = document.getElementById("show_report1");
  table2 = document.getElementById("show_report2");
  table3 = document.getElementById("show_report3");
  var appendContent ="";
  var appendContent1 ="";
  var appendContent2 ="";
  var domeval = 0;
  var flushval = 0;
  var collectionval = 0;
  var domesticfilled = 0;
  var flushfilled = 0;
  var collectionfilled = 0;
  var time1=0;var high=0,lowest=0;
  for (var i = 0; i < d.length; i++)
  { 
    var dateobj=GetTime(d[i]['ToTime']);
    time=d[i]['ToTime'];
    if(i==0)
    {
         time1=d[i]['ToTime'];
    }
    if(time1<time)
    {
      high=time;
    }else{
      high=time1;
    }

    document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  GetTime(high);
    if(d[i]['UtilityName']=='Volume_DT 1-4/27-20')
    { 
      var div="<div class='circle' id='circles-1'></div><div class='tanker-details' ><h4 class=''>Domestic Tank 1-4/17-20</h4><ul><li><label>TotalCapacity</label><div>850KL</div></li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*6+'KL'+"</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</div></li></ul></div> ";
      document.getElementById("domestic1").innerHTML +=div;
      // document.getElementById("domesticall1").innerHTML +=div;
      var child = document.getElementById('circles-1');    
      var currentPer= Math.round((d[i]['Consumption'])/142000*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
  
    }
    else if(d[i]['UtilityName']=='Volume_DT 5-10/11-16')
    { 
      var div="<div class='circle' id='circles-2'></div><div class='tanker-details' ><h4 class=''>Domestic Tank 5-10/11-16</h4><ul><li><label>TotalCapacity</label><div>850KL</div></li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*6+'KL'+"</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</div></li></ul></div> ";
      document.getElementById("domestic2").innerHTML +=div;
      // document.getElementById("domesticall1").innerHTML +=div;
      var child = document.getElementById('circles-2');     
      var currentPer= Math.round((d[i]['Consumption'])/142000*100);

      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
    else if(d[i]['UtilityName']=="Volume_FT 1-4/17-20")
    { 
      var div="<div class='circle' id='circles-3'></div><div class='tanker-details'><h4 class=''>Flush Tank 1-4/17-20</h4><ul><li><label>TotalCapacity</label><div>380KL</div</li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*4+"KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</div></li></ul></div> ";

      document.getElementById("flush1").innerHTML +=div;
      var child = document.getElementById('circles-3'); 
      var currentPer= Math.round((d[i]['Consumption']*4)/380000*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }

    else if(d[i]['UtilityName']=="Volume_FT 5-10/11-16")
    { 
      var div="<div class='circle' id='circles-4'></div><div class='tanker-details'><h4 class=''>Flush Tank 5-10/11-16</h4><ul><li><label>TotalCapacity</label><div>380KL</div</li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*4+"KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</div></li></ul></div> ";

      document.getElementById("flush2").innerHTML +=div;
      var child = document.getElementById('circles-4'); 
      var currentPer= Math.round((d[i]['Consumption']*4)/380000*100);
       if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
    else if(d[i]['UtilityName']=="Volume_CT 1-6")
    {
       var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          
        }
        
        var filldata= Math.round((additionalData/150)*100); 
      var div="<div class='circle' id='circles-5'></div><div class='tanker-details'><h4 class=''>Collection Tank 1-6</h4><ul><li><label>TotalCapacity</label><div>150KL</div</li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div>";

      document.getElementById("collection1").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var child = document.getElementById('circles-5'); 
      var currentPer= Math.round((additionalData/150)*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
    else if(d[i]['UtilityName']=="Volume_CT 8-10")
    {
      var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          
        }
        var filldata1= Math.round((additionalData/150)*100);
      var div="<div class='circle' id='circles-6'></div><div class='tanker-details'><h4 class=''>Collection Tank 7-10</h4><ul><li><label>TotalCapacity</label><div>150KL</div</li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata1+"%</div></li></ul></div>";

      document.getElementById("collection2").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var child = document.getElementById('circles-6'); 
      var currentPer= Math.round((additionalData/150)*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
    else if(d[i]['UtilityName']=="Volume_CT 11-12")
    {
       
      var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+58;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+48;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+38;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+28;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+18;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          
        }
        var filldata2= Math.round((additionalData/150)*100); 
      var div="<div class='circle' id='circles-7'></div><div class='tanker-details'><h4 class=''>Collection Tank 11-12</h4><ul><li><label>TotalCapacity</label><div>150KL</div</li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata2+"%</div></li></ul></div>";

      document.getElementById("collection3").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var child = document.getElementById('circles-7'); 
      var currentPer= Math.round((additionalData/150)*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
    else if(d[i]['UtilityName']=="Volume_CT 13-16")
    {
      var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          
        }
        var filldata3= Math.round((additionalData/150)*100);  
      var div="<div class='circle' id='circles-8'></div><div class='tanker-details'><h4 class=''>Collection Tank 13-16</h4><ul><li><label>TotalCapacity</label><div>150KL</div</li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata3+"%</div></li></ul></div>";

      document.getElementById("collection4").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var child = document.getElementById('circles-8'); 
      var currentPer= Math.round((additionalData/150)*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
    else if(d[i]['UtilityName']=="Volume_CT 17-20")
    {
      var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        if(clevel>25 && clevel<=75){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+204;
        }
        else if(clevel>75 && clevel<90){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+200;
          
        }else if(clevel>90 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+150;
        }else if(clevel>130 && clevel<150){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+130;
        }else if(clevel>150 && clevel<180){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+110;
        }else if(clevel>180 && clevel<200){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+90;
        }else if(clevel>200 && clevel<220){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+70;
        }
        else if(clevel>220 && clevel<240){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
        }
        else if(clevel>240 && clevel<260){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
        }
        else if(clevel>260 && clevel<280){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+10;
        }
        else if(clevel>280 && clevel<300){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        else if(clevel>0 && clevel<10){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        var filldata4= Math.round((additionalData/300)*100); 
      var div="<div class='circle' id='circles-9'></div><div class='tanker-details'><h4 class=''>Collection Tank 17-20</h4><ul><li><label>TotalCapacity</label><div>300KL</div</li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata4+"%</div></li></ul></div>";

      document.getElementById("collection5").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var child = document.getElementById('circles-9'); 
      var currentPer= Math.round((additionalData/300)*100);
      if(currentPer<30)
      {  
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[0]
        }));
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[1]
        }));
      }
      else
      {
        circles.push(Circles.create({
          id:         child.id,
          value:    currentPer,
          radius:     60,
          width:      20,
          colors:     colors[2]
        }));
      }
    }
  }
}
</script>

<!-- //circular code starts here -->
<script type="text/javascript">
    //@ http://jsfromhell.com/array/shuffle [v1.0]
    function shuffle(o){ //v1.0
      for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
      return o;
    }

    var colors = [
      ['#D3D3D3', '#FFA500'], ['#D3D3D3', '#68b1ba'], ['#D3D3D3', '#68ba8e'], ['#F8F9B6', '#D2D558'], ['#F4BCBF', '#D43A43']
    ], circles = [];


  </script>
</body>
</html>
