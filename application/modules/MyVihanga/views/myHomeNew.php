<?php //print_r($myhomeData);die(); ?>
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
<body class="hold-transition skin-blue sidebar-mini">
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
        Water Tank Level
        
      </h1>
      <ul>
        <li>
          <label>Last Update Time</label> :
          <div id="lastUpdateTime"></div>
        </li>
        <li>
          <label>Total Liters</label> :
          <div id="displayDomestic"></div>
        </li>
      <!--   <li>
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
               <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                  <li class="active"><a href="#Domestic" data-toggle="tab">Domestic Tank</a></li>
                  <li><a href="#Flush" data-toggle="tab">Flush Tank</a></li>
                  <li><a href="#Collection" data-toggle="tab">Collection Tank</a></li>
                  <li><a href="#all" data-toggle="tab">All</a></li>
               </ul>

               <div class="tab-content">

                  <!-- domestic code starts -->
                  <div role="tabpanel" class="tab-pane fade in active" id="Domestic">
                    <div class='col-md-6' id="domestic1">
                    </div>
                    <div class='col-md-6' id="domestic2">
                    </div>
                  </div>
                  <!-- domestic code end -->

                  <!-- flush code starts -->

                  <div role="tabpanel" class="tab-pane fade" id="Flush">
                    <div class="row">
                      <div class="col-md-6" id="flush1">
                          
                      </div>
                      <div class="col-md-6" id="flush2">
                       
                      </div>
                    </div>
                  </div>
                  <!-- flush code end -->

                  <!-- colletion code starts -->

                  <div role="tabpanel" class="tab-pane fade" id="Collection">
                    <div class="row wrap">
                      <div class="col-md-6" id="collection1">
                          
                      </div>
                      <div class="col-md-6" id="collection2">
                          
                      </div>
                      <div class="col-md-6" id="collection3">
                          
                      </div>
                      <div class="col-md-6" id="collection4">
                          
                      </div>
                      <div class="col-md-6" id="collection5">
                          
                      </div>
                      <!--  -->
                    </div>
                  </div>
                  <!-- collection code end -->

                  <!-- all starts -->

                  <div role="tabpanel" class="tab-pane fade" id="all">
                  <div class="row wrap">

                    <!-- Domestic starts -->
                      <div class='col-md-6' id="domesticall1">
                      </div>
                       <div class='col-md-6' id="domesticall2">
                      </div>
                        
                    <div class="col-md-6" id="flushall1">
                      
                    </div>
                    <div class="col-md-6" id="flushall2">
                   
                    </div>
             <!-- collection start -->
              <div class="col-md-6" id="collectionall1">
                  
              </div>
              <div class="col-md-6" id="collectionall2">
                  
              </div>
              <div class="col-md-6" id="collectionall3">
                  
              </div>
              <div class="col-md-6" id="collectionall4">
                  
              </div>
              <div class="col-md-6" id="collectionall5">
                  
              </div>
                  </div>

                  </div>
                  <!-- all end -->
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
$(document).ready(function() {
 
});

window.onload = function() {
    fetchMyhomeData();
};

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
          generateCard(data);
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
function generateCard(data)
{
  var d = JSON.parse(data);
  for (var i = 0; i < d.length; i++)
  {
    //domestic start
    if(d[i]['UtilityName']=='Volume_DT 1-4/27-20')
    {
      var div="<div class='tank waterTankHere1'></div><div class='tank waterTankHere2'></div><div class='tanker-details'><h4>Domestic Tank 1-4/27-20</h4><div style='display: flex;'><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul><div>"+Math.round(d[i]['Consumption']/1000)*6+"KL</div></div></div></div> ";
 
      document.getElementById("domestic1").innerHTML +=div;
      document.getElementById("domesticall1").innerHTML +=div;
      
      document.getElementById("displayDomestic").innerHTML =Math.round(d[i]['Consumption']/1000)*6;
       
      var dateobj=GetTime(d[i]['TxnTime']);
      // console.log(dateobj);alert(dateobj);
      // var dateresult = dateobj.toString();
      document.getElementById("lastUpdateTime").innerHTML =d[i]['TxnDate']+  dateobj;
      $('.waterTankHere1').waterTank({
          width: 200,
          height: 180,
          color: '#eda7a7',
          level:Math.round(((d[i]['Consumption'])/149000)*100)
          
        })
      $('.waterTankHere2').waterTank({
        width: 20,
        height: 180,
        color: '#eda7a7',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    }
    else if(d[i]['UtilityName']=='Volume_DT 5-10/11-16')
    {
      var div="<div class='tank waterTankHere3'></div><div class='tank waterTankHere4'></div><div class='tanker-details'><h4>Domestic Tank 5-10/11-16</h4><div style='display: flex;'><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul><div>"+Math.round(d[i]['Consumption']/1000)*6+"KL</div></div></div> ";

      document.getElementById("domestic2").innerHTML +=div;
      document.getElementById("domesticall2").innerHTML +=div;
      var domeval1=parseInt(document.getElementById("displayDomestic").innerHTML)+parseInt(Math.round(d[i]['Consumption']/1000)*6);
      document.getElementById("displayDomestic").innerHTML = domeval1+"KL";

      $('.waterTankHere3').waterTank({
        width: 200,
        height: 180,
        color: '#68b1ba',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
        
      })
 
      $('.waterTankHere4').waterTank({
        width: 20,
        height: 180,
        color: '#68b1ba',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    
    }
    //domestic end
    //flush start
    else if(d[i]['UtilityName']=='Volume_FT 1-4/17-20')
    {
      var  siva=parseInt(document.getElementById("displayDomestic").innerHTML)+parseInt(Math.round(d[i]['Consumption']/1000)*4);
      console.log("Flash1"+siva);
      document.getElementById("displayDomestic").innerHTML="";
      var div="<div class='tank waterTankHere5'></div><div class='tank waterTankHere6'></div><div class='tanker-details'><h4>Flush Tank 1-4/17-20</h4><div style='display:flex;'><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul><div>"+Math.round(d[i]['Consumption']/1000)*4+"KL</div></div></div> ";

      document.getElementById("flush1").innerHTML +=div;
      document.getElementById("flushall1").innerHTML +=div;
      document.getElementById("displayDomestic").innerHTML +=parseInt(Math.round(d[i]['Consumption']/1000)*4);


      $('.waterTankHere5').waterTank({
        width: 200,
        height: 180,
        color: '#68ba8e',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
        
      })
  
      $('.waterTankHere6').waterTank({
        width: 20,
        height: 180,
        color: '#68ba8e',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })

    }
    else if(d[i]['UtilityName']=='Volume_FT 5-10/11-16')
    {
      var div="<div class='tank waterTankHere7'></div><div class='tank waterTankHere8'></div><div class='tanker-details'><h4>Flush Tank 5-10/11-16</h4><div style='display:flex;'><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul><div>"+Math.round(d[i]['Consumption']/1000)*4+"KL</div></div><</div> ";

      document.getElementById("flush2").innerHTML +=div;
      document.getElementById("flushall2").innerHTML +=div;
      document.getElementById("displayDomestic").innerHTML=parseInt(document.getElementById("displayDomestic").innerHTML)+parseInt(Math.round(d[i]['Consumption']/1000)*4);
     
      $('.waterTankHere7').waterTank({
        width: 200,
        height: 180,
        color: '#68b1ba',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
          
      })
        
      $('.waterTankHere8').waterTank({
        width: 20,
        height: 180,
        color: '#68b1ba',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    }
    // //collection start
    else if(d[i]['UtilityName']=='CT_1-6')
    {
      var div="<div class='tank waterTankHere9'></div><div class='tank waterTankHere10'></div><div class='tanker-details'><h4>Collection Tank 1-6</h4><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul></div> ";

      document.getElementById("collection1").innerHTML +=div;
      document.getElementById("collectionall1").innerHTML +=div;
      document.getElementById("displayDomestic").innerHTML="";
      
      $('.waterTankHere9').waterTank({
        width: 200,
        height: 180,
        color: '#68b1ba',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
          
      })
       
      $('.waterTankHere10').waterTank({
        width: 20,
        height: 180,
        color: '#68b1ba',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })

    }
    else if(d[i]['UtilityName']=='CT_8-10')
    {
      var div="<div class='tank waterTankHere11'></div><div class='tank waterTankHere12'></div><div class='tanker-details'><h4>Collection Tank 8-10</h4><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul></div> ";

      document.getElementById("collection2").innerHTML +=div;
      document.getElementById("collectionall2").innerHTML +=div;
      
      $('.waterTankHere11').waterTank({
        width: 200,
        height: 180,
        color: '#eda7a7',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
          
      })
        
      $('.waterTankHere12').waterTank({
        width: 20,
        height: 180,
        color: '#eda7a7',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    }
    else if(d[i]['UtilityName']=='CT_11-12')
    {
      var div="<div class='tank waterTankHere13'></div><div class='tank waterTankHere14'></div><div class='tanker-details'><h4>Collection Tank 11-12</h4><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul></div> ";

      document.getElementById("collection3").innerHTML +=div;
      document.getElementById("collectionall3").innerHTML +=div;
    
      $('.waterTankHere13').waterTank({
        width: 200,
        height: 180,
        color: '#68ba8e',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
          
      })
        
      $('.waterTankHere14').waterTank({
        width: 20,
        height: 180,
        color: '#68ba8e',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    }
    else if(d[i]['UtilityName']=='CT_13-16')
    {
      var div="<div class='tank waterTankHere15'></div><div class='tank waterTankHere16'></div><div class='tanker-details'><h4>Collection Tank 13-16</h4><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul></div> ";

      document.getElementById("collection4").innerHTML +=div;
      document.getElementById("collectionall4").innerHTML +=div;
      $('.waterTankHere15').waterTank({
        width: 200,
        height: 180,
        color: '#c5cae9',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
          
      })
        
      $('.waterTankHere16').waterTank({
        width: 20,
        height: 180,
        color: '#c5cae9',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    }
    else if(d[i]['UtilityName']=='CT_17-20')
    {
      var div="<div class='tank waterTankHere17'></div><div class='tank waterTankHere18'></div><div class='tanker-details'><h4>Collection Tank 17-20</h4><ul><li><label>CurrentLevel</label><div>"+Math.round(d[i]['Consumption']/1000)+"KL</div></li><li><label>TotalCapacity</label><div>149KL</div></li><li><label>Filled</label><div>"+Math.round(((d[i]['Consumption'])/149000)*100)+"%</div></li></ul></div> ";

      document.getElementById("collection5").innerHTML +=div;
      document.getElementById("collectionall5").innerHTML +=div;
      $('.waterTankHere17').waterTank({
        width: 200,
        height: 180,
        color: '#b3e5fc',
        level:Math.round(((d[i]['Consumption'])/149000)*100)
          
      })
        
      $('.waterTankHere18').waterTank({
        width: 20,
        height: 180,
        color: '#b3e5fc',
        level: Math.round(((d[i]['Consumption'])/149000)*100)
      })
    }
  }
  //console.log(d);
}
</script>

</body>
</html>
