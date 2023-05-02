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
        Flush Water Tank Level
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div id="lastUpdateTime"></div>
        </li>
        <li>
          <label>Total Liters</label> :
          <div id="FlushTotal"></div>
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
               
              <!-- flush code starts -->

              <div class="row">
                <div class="col-md-6 domestic-do" id="flush1"></div>
                <div class="col-md-6 domestic-do" id="flush2"></div>                
              </div> 
                  
              <!-- flush code end -->  
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
            displayFlushData(data);
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
  function displayFlushData(data)
  {
    var d = JSON.parse(data);
    for (var i = 0; i < d.length; i++)
    {
      var dateobj=GetTime(d[i]['TxnTime']);
      time=d[i]['TxnTime'];
      if(i==0)
      {
           time1=d[i]['TxnTime'];
      }
      if(time1<time)
      {
        high=time;
      }else{
        high=time1;
      }

      document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  GetTime(high);
      // document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  dateobj;
      // var n = d[i]['UtilityName'].includes("Volume_DT");
      if(d[i]['UtilityName']=='FT_1-4/17-20')
      { 
        var div="<div class='tank waterTankHere5'></div><div class='tank waterTankHere6'></div><div class='tanker-details'><h4 class='card-flush'>Flush Tank 1-4/17-20</h4><ul><li><label>TotalCapacity</label><div></div><span>380KL</span></li><li><label>CurrentLevel</label><div></div><span>"+Math.round(d[i]['Consumption']/1000)*4+"KL</span></li><li><label>Filled</label><div></div><span>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</span></li></ul></div></div> ";

        document.getElementById("flush1").innerHTML +=div;
        // document.getElementById("flushall1").innerHTML +=div;
        document.getElementById("FlushTotal").innerHTML +=parseInt(Math.round(d[i]['Consumption']/1000)*4);
        var currentPer= Math.round((d[i]['Consumption']*4)/380000*100);
        if(currentPer<30)
        {
          $('.waterTankHere5').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere6').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere5').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere6').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }
        else
        {
          $('.waterTankHere5').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100)
            
          })
          $('.waterTankHere6').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100)
          })
        }

        
      }
      else if(d[i]['UtilityName']=='FT_5-10/11-16')
      {
        var div="<div class='tank waterTankHere7'></div><div class='tank waterTankHere8'></div><div class='tanker-details'><h4 class='card-flush'>Flush Tank 5-10/11-16</h4><ul><li><label>TotalCapacity</label><div></div><span>380KL</span></li><li><label>CurrentLevel</label><div></div><span>"+Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)+6)*4+'KL'+"</span></li><li><label>Filled</label><div></div><span>"+Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)+"%</span></li></ul></div></div> ";

        document.getElementById("flush2").innerHTML +=div;
        // document.getElementById("domesticall2").innerHTML +=div;
        var domeval=parseInt(document.getElementById("FlushTotal").innerHTML)+parseInt(Math.round(d[i]['Consumption']/1000+d[i]['Consumption']/10000+6)*4);
        document.getElementById("FlushTotal").innerHTML = domeval+"KL";
        var currentPer= Math.round((d[i]['Consumption']*4)/380000*100+d[i]['Consumption']/10000+6);
        if(currentPer<30)
        {
          $('.waterTankHere7').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)
            
          })
          $('.waterTankHere8').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere7').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)
            
          })
          $('.waterTankHere8').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)
          })
        }
        else
        {
          $('.waterTankHere7').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)
            
          })
          $('.waterTankHere8').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round(((d[i]['Consumption']*4)/380000)*100+d[i]['Consumption']/10000+6)
          })
        }
        
      }
      
    }  
  }
</script>
</body>
</html>
