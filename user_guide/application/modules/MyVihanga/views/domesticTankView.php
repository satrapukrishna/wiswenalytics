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
        Domestic Water Tank Level
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div id="lastUpdateTime"></div>
        </li>
        <li>
          <label>Total Liters</label> :
          <div id="domesticTotal"></div>
        </li>
        <!-- <li>
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
               
              <!-- domestic code starts -->

              <div class="row">
                <div class="col-md-6 domestic-do" id="domestic1"></div>
                <div class="col-md-6 domestic-do" id="domestic2"></div>
              </div> 
                  
              <!-- domestic code end -->
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
// $(document).ready(function() {

  
// });

// window.onload = function() {
//     //animateSequence();
//     //animateRandom();
//     fetchMyhomeData();
// };
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
  
  for (var i = 0; i < d.length; i++)
  {
    // var n = d[i]['UtilityName'].includes("Volume_DT");
    // var dateobj=GetTime(d[i]['ToTime']);
    // document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  dateobj;
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
      var div="<div class='tank waterTankHere1'></div><div class='tank waterTankHere2'></div><div class='tanker-details'><h4 class='card-domestic'>Domestic Tank 1-4/17-20</h4><ul><li><label>TotalCapacity</label><div></div><span>850KL</span></li><li><label>CurrentLevel</label><div></div><span>"+Math.round(d[i]['Consumption']/1000)*6+'KL'+"</span></li><li><label>Filled</label><div></div><span>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</span></li></ul></div></div></div> ";
      document.getElementById("domestic1").innerHTML +=div;
      // document.getElementById("domesticall1").innerHTML +=div;
      
      document.getElementById("domesticTotal").innerHTML +=parseInt(Math.round(d[i]['Consumption']/1000)*6);
      var currentPer= Math.round((d[i]['Consumption'])/142000*100);
      if(currentPer<30)
      {
        $('.waterTankHere1').waterTank({
          width: 200,
          height: 180,
          color: '#FFA500', //#eda7a7
          level:Math.round(((d[i]['Consumption'])/142000)*100)
          
        })
        $('.waterTankHere2').waterTank({
          width: 20,
          height: 180,
          color: '#FFA500',
          level: Math.round(((d[i]['Consumption'])/142000)*100)
        })
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        $('.waterTankHere1').waterTank({
          width: 200,
          height: 180,
          color: '#68b1ba',
          level:Math.round(((d[i]['Consumption'])/142000)*100)
          
        })
        $('.waterTankHere2').waterTank({
          width: 20,
          height: 180,
          color: '#68b1ba',
          level: Math.round(((d[i]['Consumption'])/142000)*100)
        })
      }
      else
      {
        $('.waterTankHere1').waterTank({
          width: 200,
          height: 180,
          color: '#68ba8e',
          level:Math.round(((d[i]['Consumption'])/142000)*100)
          
        })
        $('.waterTankHere2').waterTank({
          width: 20,
          height: 180,
          color: '#68ba8e',
          level: Math.round(((d[i]['Consumption'])/142000)*100)
        })
      }
      
    }
    else if(d[i]['UtilityName']=='Volume_DT 5-10/11-16')
    {
      var div="<div class='tank waterTankHere3'></div><div class='tank waterTankHere4'></div><div class='tanker-details'><h4 class='card-domestic'>Domestic Tank 5-10/11-16</h4><ul><li><label>TotalCapacity</label><div></div><span>850KL</span></li><li><label>CurrentLevel</label><div></div><span>"+Math.round(d[i]['Consumption']/1000)*6+'KL'+"</span></li><li><label>Filled</label><div></div><span>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</span></li></ul></div> ";
      document.getElementById("domestic2").innerHTML +=div;
      // document.getElementById("domesticall2").innerHTML +=div;
      var domeval=parseInt(document.getElementById("domesticTotal").innerHTML)+parseInt(Math.round(d[i]['Consumption']/1000)*6);
      document.getElementById("domesticTotal").innerHTML = domeval+"KL";


      var currentPer= Math.round((d[i]['Consumption'])/142000*100);
      if(currentPer<30)
      {
        $('.waterTankHere3').waterTank({
          width: 200,
          height: 180,
          color: '#FFA500',
          level:Math.round(((d[i]['Consumption'])/142000)*100)
          
        })
        $('.waterTankHere4').waterTank({
          width: 20,
          height: 180,
          color: '#FFA500',
          level: Math.round(((d[i]['Consumption'])/142000)*100)
        })
      }
      else if(currentPer>=30 && currentPer<=60)
      {
        $('.waterTankHere3').waterTank({
          width: 200,
          height: 180,
          color: '#68b1ba',
          level:Math.round(((d[i]['Consumption'])/142000)*100)
          
        })
        $('.waterTankHere4').waterTank({
          width: 20,
          height: 180,
          color: '#68b1ba',
          level: Math.round(((d[i]['Consumption'])/142000)*100)
        })
      }
      else
      {
        $('.waterTankHere3').waterTank({
          width: 200,
          height: 180,
          color: '#68ba8e',
          level:Math.round(((d[i]['Consumption'])/142000)*100)
          
        })
        $('.waterTankHere4').waterTank({
          width: 20,
          height: 180,
          color: '#68ba8e',
          level: Math.round(((d[i]['Consumption'])/142000)*100)
        })
      }
     
    }
    // var dateobj=GetTime(d[i]['ToTime']);
    // document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  dateobj;
  }  
}
</script>
</body>
</html>
