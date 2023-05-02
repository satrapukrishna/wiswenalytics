<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Home Vihanga</title>
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
    <link rel="shortcut icon" type="imag/x-icon" href="<?php echo base_url(); ?>asset/common-utilits/dist/img/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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
        All Water Tank Level
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div id="lastUpdateTime"></div>
        </li>
        <!-- <li>
          <label>Total Liters</label> :
          <div>15,000 Kilo Ltrs</div>
        </li>
        <li>
          <label>Municipal Water</label> :
          <div>8000 Ltrs</div>
        </li> -->
      </ul>
      </div>
     
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
       
        <section class="">
               
               <!-- all starts -->
                  <div class="row">

                    <!-- Domestic and flush starts -->

                    <div class="col-md-6 individual">
                      <h4>Domestic</h4>
                      <div class="col-md-6 col-12" id="domestic3">
               
                      </div>
                      <div class="col-md-6 col-12" id="domestic4">
                      </div>
                    </div>
                    <div class="col-md-6 individual">
                      <h4>Flush</h4>
                        <div class="col-md-6 col-12" id="flush3"></div>
                        <div class="col-md-6 col-12" id="flush4"></div>  
                    </div>
                  </div>

                     <!-- Domestic and flush  end -->

                     <!-- collection start  -->

                 <div class="row wrap individual">
                 <h4>Collection</h4>
              <div class="col-md-3" id="collection1">
                  
              </div>
              <div class="col-md-3" id="collection2">
                  
              </div>
              <div class="col-md-3" id="collection3">
                  
              </div>
              <div class="col-md-3" id="collection4">
                  
              </div>
              <div class="col-md-3" id="collection5">
                  
              </div>
            </div>
        </section>
      </div>
      <!-- /.row (main row) -->

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
          displayAlData(data);
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
function displayAlData(data)
{
  var d = JSON.parse(data);
  
  for (var i = 0; i < d.length; i++)
  {
    var dateobj=GetTime(d[i]['TxnTime']);
    document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  dateobj;
    // var n = d[i]['UtilityName'].includes("Volume_DT");
    if(d[i]['UtilityName']=='DT_1-4/27-20')
    { 
      var div="<div class='tank waterTankHere19'></div><div class='tank waterTankHere20'></div><div class='tanker-details'><h4 class='card-domestic'>Domestic Tank 1-4/17-20</h4><ul><li><label>TotalCapacity</label><div>850KL</div></li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*6+"KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</div></li></ul></div></div></div> ";
      document.getElementById("domestic3").innerHTML +=div;
      // document.getElementById("domesticall1").innerHTML +=div;
      var currentPer= Math.round((d[i]['Consumption'])/142000*100);
        if(currentPer<30)
        {
          $('.waterTankHere19').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round(((d[i]['Consumption'])/142000)*100)
            
          })
          $('.waterTankHere20').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round(((d[i]['Consumption'])/142000)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere19').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round(((d[i]['Consumption'])/142000)*100)
            
          })
          $('.waterTankHere20').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round(((d[i]['Consumption'])/142000)*100)
          })
        }
        else
        {
          $('.waterTankHere19').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round(((d[i]['Consumption'])/142000)*100)
            
          })
          $('.waterTankHere20').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round(((d[i]['Consumption'])/142000)*100)
          })
        }

    }
    else if(d[i]['UtilityName']=='DT_5-10/11-16')
    {
      var div="<div class='tank waterTankHere21'></div><div class='tank waterTankHere22'></div><div class='tanker-details'><h4 class='card-domestic'>Domestic Tank 5-10/11-16</h4><ul><li><label>TotalCapacity</label><div>850KL</div></li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*6+"KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</div></li></ul></div></div> ";
      document.getElementById("domestic4").innerHTML +=div;
      // document.getElementById("domesticall2").innerHTML +=div;
  
      var currentPer= Math.round((d[i]['Consumption'])/142000*100);
        if(currentPer<30)
        {
          $('.waterTankHere21').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round(((d[i]['Consumption'])/142000)*100)
            
          })
          $('.waterTankHere22').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round(((d[i]['Consumption'])/142000)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere21').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round(((d[i]['Consumption'])/142000)*100)
            
          })
          $('.waterTankHere22').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round(((d[i]['Consumption'])/142000)*100)
          })
        }
        else
        {
          $('.waterTankHere21').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round(((d[i]['Consumption'])/142000)*100)
            
          })
          $('.waterTankHere22').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round(((d[i]['Consumption'])/142000)*100)
          })
        }
    }

    //domestic end

    //flush start
    else if(d[i]['UtilityName']=='FT_1-4/17-20')
    { 
      var div="<div class='tank waterTankHere23'></div><div class='tank waterTankHere24'></div><div class='tanker-details'><h4 class='card-flush'>Flush Tank 1-4/17-20</h4><ul><li><label>TotalCapacity</label><div>380KL</div></li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*4+"KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</div></li></ul></div></div> ";

      document.getElementById("flush3").innerHTML +=div;
      // document.getElementById("flushall1").innerHTML +=div;
      var currentPer= Math.round((d[i]['Consumption']*4)/380000*100);
        if(currentPer<30)
        {
          $('.waterTankHere23').waterTank({
            width: 200,
            height: 180,
            color:  '#FFA500',      //'#eda7a7',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere24').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere23').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere24').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
        else
        {
          $('.waterTankHere23').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere24').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
    }
    else if(d[i]['UtilityName']=='FT_5-10/11-16')
    {
      var div="<div class='tank waterTankHere25'></div><div class='tank waterTankHere26'></div><div class='tanker-details'><h4 class='card-flush'>Flush Tank  5-10/11-16</h4><ul><li><label>TotalCapacity</label><div>380KL</div></li><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)*4+"KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</div></li></ul></div></div> ";
      document.getElementById("flush4").innerHTML +=div;
      // document.getElementById("domesticall2").innerHTML +=div;
      var currentPer= Math.round((d[i]['Consumption']*4)/380000*100);
        if(currentPer<30)
        {
          $('.waterTankHere25').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere26').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere25').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere26').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
        else
        {
          $('.waterTankHere25').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere26').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
    }
       
    //flush end
    else if(d[i]['UtilityName']=='CT_1-6')
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
          
        }else{
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        
        var filldata= Math.round((additionalData/200)*100); 
      var div="<div class='tank waterTankHere27'></div><div class='tank waterTankHere28'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 1-6</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";

      document.getElementById("collection1").innerHTML +=div;
      // document.getElementById("collectionall1").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var currentPer= Math.round((additionalData/150)*100);
      // var currentPer= Math.round((d[i]['Consumption'])/87360*100);
        if(currentPer<30)
        {
          $('.waterTankHere27').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere28').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere27').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere28').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere27').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere28').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
          })
        }

    }
    else if(d[i]['UtilityName']=='CT_8-10')
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
          
        }else{
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        var filldata= Math.round((additionalData/200)*100); 
      var div="<div class='tank waterTankHere29'></div><div class='tank waterTankHere30'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 7-10</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
      
      document.getElementById("collection2").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var currentPer= Math.round((additionalData/150)*100);
      // var currentPer= Math.round((d[i]['Consumption'])/87360*100);
        if(currentPer<30)
        {
          $('.waterTankHere29').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere30').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere29').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere30').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere29').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere30').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
          })
        }

    }
    else if(d[i]['UtilityName']=='CT_11-12')
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
          
        }else{
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        var filldata= Math.round((additionalData/200)*100); 
      var div="<div class='tank waterTankHere31'></div><div class='tank waterTankHere32'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 11-12</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
      
      document.getElementById("collection3").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var currentPer= Math.round((additionalData/150)*100);
      // var currentPer= Math.round((d[i]['Consumption'])/52000*100);
        if(currentPer<30)
        {
          $('.waterTankHere31').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere32').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere31').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere32').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere31').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere32').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
          })
        }
    }
    else if(d[i]['UtilityName']=='CT_13-16')
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
          
        }else{
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        var filldata= Math.round((additionalData/200)*100);  
      var div="<div class='tank waterTankHere33'></div><div class='tank waterTankHere34'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 13-16</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
     
      document.getElementById("collection4").innerHTML +=div;
     // var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var currentPer= Math.round((additionalData/150)*100);
      // var currentPer= Math.round((d[i]['Consumption'])/52000*100);
        if(currentPer<30)
        {
          $('.waterTankHere33').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere34').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere33').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere34').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere33').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere34').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
          })
        }
      
    }
    else if(d[i]['UtilityName']=='CT_17-20')
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
        }else{
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        }
        var filldata= Math.round((additionalData/300)*100); 

      var div="<div class='tank waterTankHere35'></div><div class='tank waterTankHere36'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 17-20</h4><ul><li><label>TotalCapacity</label><div>300KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
     
      document.getElementById("collection5").innerHTML +=div;
      //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
      var currentPer= Math.round((additionalData/300)*100);
      // var currentPer= Math.round((d[i]['Consumption'])/52000*100);
        if(currentPer<30)
        {
          $('.waterTankHere35').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/300)*100)
            
          })
          $('.waterTankHere36').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/300)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere35').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/300)*100)
            
          })
          $('.waterTankHere36').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/300)*100)
          })
        }
        else
        {
          $('.waterTankHere35').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/300)*100)
            
          })
          $('.waterTankHere36').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/300)*100)
          })
        }
      
      
    }
  }  
}

</script>
</body>
</html>
