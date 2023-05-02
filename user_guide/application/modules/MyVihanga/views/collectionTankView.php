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
        Collection Water Tank Level
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div id="lastUpdateTime"></div>
        </li>
        <!-- <li>
          <label>Total Liters</label> :
          <div id="colletionTankTotal"></div>
        </li> -->
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
            <!-- colletion code starts -->
            <div class="row wrap domestic-do">
              <div class="col-md-4" id="collection1">
                  
              </div>
              <div class="col-md-4" id="collection2">
                  
              </div>
              <div class="col-md-4" id="collection3">
                  
              </div>
              <div class="col-md-4" id="collection4">
                  
              </div>
              <div class="col-md-4" id="collection5">
                  
              </div>
            </div>
                  
            <!-- collection code end -->
              
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
            displayCollectionData(data);
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
  function displayCollectionData(data)
  {
    var d = JSON.parse(data);
    // console.log(d);
    for (var i = 0; i < d.length; i++)
    {
      // var n = d[i]['UtilityName'].includes("Volume_DT");
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
      // document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  dateobj;
      if(d[i]['UtilityName']=='Volume_CT 1-6')
      {
        var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60;
          // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60);
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
            // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50);
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40;
          // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40);
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
          // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30);
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20;
          // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20);
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
            // var tank1=document.getElementById("colletionTankTotal").innerHTML+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)));
          
        }
        
        var filldata= Math.round((additionalData/150)*100); 

        
        var div="<div class='tank waterTankHere9'></div><div class='tank waterTankHere10'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 1-6</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";

        document.getElementById("collection1").innerHTML +=div;
        // document.getElementById("collectionall1").innerHTML +=div;
        
        // document.getElementById("colletionTankTotal").innerHTML+=tank1;
        
        //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+35;
        var currentPer= Math.round((additionalData/150)*100);
        if(currentPer<30)
        {
          $('.waterTankHere9').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere10').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere9').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere10').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere9').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere10').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level:  Math.round((additionalData/150)*100)
          })
        }
      }
      else if(d[i]['UtilityName']=='Volume_CT 8-10')
      {
        var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60;
          // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60)+"KL";
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
            // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50)+"KL";
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40;
          // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40)+"KL";
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
          // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30)+"KL";
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20;
          // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20)+"KL";
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)))+"KL";
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
            // var tank2=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60)+"KL";
          
        }
        var filldata= Math.round((additionalData/150)*100); 
        
        var div="<div class='tank waterTankHere11'></div><div class='tank waterTankHere12'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 7-10</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
        
        document.getElementById("collection2").innerHTML +=div;
        
        // document.getElementById("colletionTankTotal").innerHTML=tank2;
        
        var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
        var currentPer= Math.round((additionalData/150)*100);
        
        if(currentPer<30)
        {
          $('.waterTankHere11').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere12').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level:  Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere11').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere12').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level:  Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere11').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere12').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level:  Math.round((additionalData/150)*100)
          })
        }
        
      }
      else if(d[i]['UtilityName']=='Volume_CT 11-12')
      {
        
        var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+58;
           // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+58);
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+48;
            // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+48);
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+38;
          // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+38);
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+28;
          // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+28);
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+18;
          // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+18);
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
          // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
            // var tank3=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)));
          
        }
        var filldata= Math.round((additionalData/150)*100); 
     
        var div="<div class='tank waterTankHere13'></div><div class='tank waterTankHere14'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 11-12</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
        
        document.getElementById("collection3").innerHTML +=div;
       
        // document.getElementById("colletionTankTotal").innerHTML=tank3;
    
        //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        var currentPer= Math.round((additionalData/150)*100);
        // var currentPer= Math.round((d[i]['Consumption'])/52000*100);
        if(currentPer<30)
        {
          $('.waterTankHere13').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere14').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere13').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere14').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere13').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere14').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
          })
        }

      }
      else if(d[i]['UtilityName']=='Volume_CT 13-16')
      {
        var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60;
          // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+60);
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
             // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50);
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40;
           // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+40);
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
           // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30);
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20;
           // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+20);
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
           // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
             // var tank4=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)));
          
        }
        var filldata= Math.round((additionalData/150)*100); 

        var div="<div class='tank waterTankHere15'></div><div class='tank waterTankHere16'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 13-16</h4><ul><li><label>TotalCapacity</label><div>150KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
        // alert(Math.round((Math.round(d[i]['Consumption']/1000)+Math.round(d[i]['Consumption']/10000))/52*100));
        document.getElementById("collection4").innerHTML +=div;
        
        // document.getElementById("colletionTankTotal").innerHTML=tank4;
        
        //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        var currentPer= Math.round((additionalData/150)*100);
        // var currentPer= Math.round((d[i]['Consumption'])/52000*100);
        if(currentPer<30)
        {
          $('.waterTankHere15').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere16').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/150)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere15').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level:Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere16').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/150)*100)
          })
        }
        else
        {
          $('.waterTankHere15').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
            
          })
          $('.waterTankHere16').waterTank({
            width: 20,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/150)*100)
          })
        }

      }
      else if(d[i]['UtilityName']=='Volume_CT 17-20')
      {
        var clevel=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        if(clevel>25 && clevel<=75){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+204;
          // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+204)+"KL";
        }
        else if(clevel>75 && clevel<90){
          
            var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+200;
             // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+200)+"KL";
          
        }else if(clevel>90 && clevel<130){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+150;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+150)+"KL";
        }else if(clevel>130 && clevel<150){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+130;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+130)+"KL";
        }else if(clevel>150 && clevel<180){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+110;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+110)+"KL";
        }else if(clevel>180 && clevel<200){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+90;
           var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+90)+"KL";
        }else if(clevel>200 && clevel<220){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+70;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+70)+"KL";
        }
        else if(clevel>220 && clevel<240){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+50)+"KL";
        }
        else if(clevel>240 && clevel<260){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+30)+"KL";
        }
        else if(clevel>260 && clevel<280){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+10;
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000))+10)+"KL";
        }
        else if(clevel>280 && clevel<300){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)))+"KL";
        }
        else if(clevel>0 && clevel<10){
          var additionalData=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
           // var tank5=parseInt(document.getElementById("colletionTankTotal").innerHTML)+parseInt(Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000)))+"KL";
        }
        var filldata= Math.round((additionalData/300)*100); 

        var div="<div class='tank waterTankHere17'></div><div class='tank waterTankHere18'></div><div class='tanker-details'><h4 class='card-collection'>Collection Tank 17-20</h4><ul><li><label>TotalCapacity</label><div>300KL</div></li><li><label>CurrentLevel</label><div>"+additionalData+"KL</div></li><li><label>Filled</label><div>"+filldata+"%</div></li></ul></div> ";
        
        document.getElementById("collection5").innerHTML +=div;
        
        // document.getElementById("colletionTankTotal").innerHTML=tank5;
        
        //var total=Math.round((d[i]['Consumption']/1000)+(d[i]['Consumption']/10000));
        var currentPer= Math.round((additionalData/300)*100);
        // var currentPer= Math.round((d[i]['Consumption'])/52000*100);
        if(currentPer<30)
        {
          $('.waterTankHere17').waterTank({
            width: 200,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/300)*100)
            
          })
          $('.waterTankHere18').waterTank({
            width: 20,
            height: 180,
            color: '#FFA500',
            level: Math.round((additionalData/300)*100)
          })
        }
        else if(currentPer>=30 && currentPer<=60)
        {
          $('.waterTankHere17').waterTank({
            width: 200,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/300)*100)
            
          })
          $('.waterTankHere18').waterTank({
            width: 20,
            height: 180,
            color: '#68b1ba',
            level: Math.round((additionalData/300)*100)
          })
        }
        else
        {
          $('.waterTankHere17').waterTank({
            width: 200,
            height: 180,
            color: '#68ba8e',
            level: Math.round((additionalData/300)*100)
            
          })
          $('.waterTankHere18').waterTank({
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
