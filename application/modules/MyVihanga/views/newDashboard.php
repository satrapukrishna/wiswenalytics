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
   <link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/LineProgressbar-master/jquery.lineProgressbar.css" />
    
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
      
      <div class="row table-responsive">
     
        <table class="col-md-12 table-bordered table-striped table-condensed" id="show_report1"> 

        </table>
       <!--  <table class="col-md-12 table-bordered table-striped table-condensed" id="show_report2"> 

        </table> -->
        <!-- <table class="col-md-12 table-bordered table-striped table-condensed" id="show_report3"> 

        </table> -->
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


<script src="<?php echo base_url(); ?>asset/common-utilits/bower_components/watertank/LineProgressbar-master/jquery.lineProgressbar.js"></script>

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
  var p = JSON.parse(data);
  // console.log(d);
  var table1 = "";
  
  // table1.innerHTML = "";
  table1 = document.getElementById("show_report1");
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
  var l=0,k=0,p=0;
  var colors = [
    ['#EEE', '#FFA500'], ['#EEE', '#68b1ba'], ['#EEE', '#68ba8e'], ['#F8F9B6', '#D2D558'], ['#F4BCBF', '#D43A43']
    ], circles = [];
  var leninc=d.length+5;
  var lenred=leninc;
  for (var i = 0; i < leninc; i++)
  { 
    if(i>d.length-1)
    {
      var diff=i-lenred;
      for (var j = 0; j < diff+1; j++)
      {
        var dateobj=GetTime(d[j]['TxnTime']);
        time=d[j]['TxnTime'];
        if(j==0)
        {
          time1=d[j]['TxnTime'];
        }
        if(time1<time)
        {
          high=time;
        }
        else
        {
          high=time1;
        }

        document.getElementById("lastUpdateTime").innerHTML =d[j]['TxnDate']+  GetTime(high);
        if(d[j]['UtilityName']=='CT_1-6' || d[j]['UtilityName']=='CT_8-10' || d[j]['UtilityName']=='CT_11-12' || d[j]['UtilityName']=='CT_13-16' || d[j]['UtilityName']=='CT_17-20')
        {
          if(l%5==0)
          {  
            table1.innerHTML += "<tr class='collection-new'><th style='font-size: 12px;color: #fff;'>Collection Tank</th><th style='font-size: 12px;color: #fff;'>Total Capacity</th>"
                      +"<th style='font-size: 12px;color: #fff;'>Current Level</th>"
                      +"<th style='font-size: 12px;color: #fff;'>Filled</th>"
                      +"<th style='font-size: 12px;color: #fff;'>Level</th></tr>"; 
          }
          
          appendContent2 += "<tr>";
          if(d[j]['UtilityName']=='CT_1-6')
          {
            l++;
            var clevel=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+60;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+50;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+40;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+30;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+20;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
          
        }
        
        var filldata1= Math.round((additionalData/150)*100); 
            
            appendContent2 += "<td>Collection Tank 1-6</td>";
            appendContent2 += "<td>150KL&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>";
            appendContent2 += "<td>"+additionalData+"KL</td>";
            appendContent2 += "<td>"+filldata1+"%</td>";
            var collectionVal1 = Math.round((additionalData/150)*100);
            appendContent2 += "<td><progress max='100' id='collectionprog1'></progress></td>";
            collectionval+=additionalData;
            // collectionfilled+=filldata1;
            $("#collectionprog1").ready(function(){
              document.getElementById('collectionprog1').value=collectionVal1;
            })
            
          }
          else if(d[j]['UtilityName']=='CT_8-10')
          {
            var clevel=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+60;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+50;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+40;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+30;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+20;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
          
        }
            
            var filldata2= Math.round((additionalData/150)*100); 

            appendContent2 += "<td>Collection Tank 7-10</td>";
            appendContent2 += "<td>150KL</td>";
            appendContent2 += "<td>"+additionalData+"KL</td>";
            appendContent2 += "<td>"+filldata2+"%</td>";
            var collectionVal2 = Math.round((additionalData/150)*100);
            collectionval+=additionalData;
            appendContent2 += "<td><progress max='100' id='collectionprog2'></progress></td>";
            appendContent2 += "<tr>";
            appendContent2 += "<td><b>Total Volume</b></td>";
            appendContent2 += "<td>900KL</td>";
            appendContent2 += "<td>"+collectionval+"KL</td>";
            appendContent2 += "<td></td>";
            appendContent2 += "<td></td>";
            appendContent2 += "</tr>";
            $("#collectionprog2").ready(function(){
              document.getElementById('collectionprog2').value=collectionVal2;
            })
          }
          else if(d[j]['UtilityName']=='CT_11-12')
          {
            l++;
            var clevel=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+58;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+48;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+38;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+28;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+18;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
          
        }
            var filldata3= Math.round((additionalData/150)*100); 

            appendContent2 += "<td>Collection Tank 11-12</td>";
            appendContent2 += "<td>150KL</td>";
            appendContent2 += "<td>"+additionalData+"KL</td>";
            appendContent2 += "<td>"+filldata3+"%</td>";
            var collectionVal3 = Math.round((additionalData/150)*100);
            appendContent2 += "<td><progress max='100' id='collectionprog3'></progress></td>";
            collectionval+=additionalData;
            // collectionfilled+=filldata3;
            $("#collectionprog3").ready(function(){
              document.getElementById('collectionprog3').value=collectionVal3;
            })
          }
          else if(d[j]['UtilityName']=='CT_13-16')
          {
            l++;
            var clevel=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));

        if(clevel>10 && clevel<37){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+60;
        }
        else if(clevel>37 && clevel<75){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+50;
          
        }else if(clevel>75 && clevel<90){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+40;
        }else if(clevel>90 && clevel<120){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+30;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+20;
        }else if(clevel>120 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        }else if(clevel>0 && clevel<10){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
          
        }
            var filldata4= Math.round((additionalData/150)*100);

            appendContent2 += "<td>Collection Tank 13-16</td>";
            appendContent2 += "<td>150KL</td>";
            appendContent2 += "<td>"+additionalData+"KL</td>";
            appendContent2 += "<td>"+filldata4+"%</td>";
            var collectionVal4 = Math.round((additionalData/150)*100);
            appendContent2 += "<td><progress max='100' id='collectionprog4'></progress></td>";
            collectionval+=additionalData;
            // collectionfilled+=filldata4;
            $("#collectionprog4").ready(function(){
              document.getElementById('collectionprog4').value=collectionVal4;
            })
          }
          else if(d[j]['UtilityName']=='CT_17-20')
          {
            l++;
            
            var clevel=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        if(clevel>25 && clevel<=75){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+204;
        }
        else if(clevel>75 && clevel<90){
          
            var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+200;
          
        }else if(clevel>90 && clevel<130){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+150;
        }else if(clevel>130 && clevel<150){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+130;
        }else if(clevel>150 && clevel<180){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+110;
        }else if(clevel>180 && clevel<200){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+90;
        }else if(clevel>200 && clevel<220){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+70;
        }
        else if(clevel>220 && clevel<240){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+50;
        }
        else if(clevel>240 && clevel<260){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+30;
        }
        else if(clevel>260 && clevel<280){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000))+10;
        }
        else if(clevel>280 && clevel<300){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        }
        else if(clevel>0 && clevel<10){
          var additionalData=Math.round((d[j]['Consumption']/1000)+(d[j]['Consumption']/10000));
        }
            var filldata5= Math.round((additionalData/300)*100);

            appendContent2 += "<td>Collection Tank 17-20</td>";
            appendContent2 += "<td>300KL</td>";
            appendContent2 += "<td>"+additionalData+"KL</td>";
            appendContent2 += "<td>"+filldata5+"%</td>";
            var collectionVal5 = Math.round((additionalData/300)*100);
            appendContent2 += "<td><progress max='100' id='collectionprog5'></progress></td>";
            collectionval+=additionalData;
            // collectionfilled+=filldata5;
            
            $("#collectionprog5").ready(function(){
              document.getElementById('collectionprog5').value=collectionVal5;
            }) 
          }
          appendContent2 += "</tr>";
          table1.innerHTML = table1.innerHTML + appendContent2;
          appendContent2 ="";
        }
      }

    }

    if(d[i]['UtilityName']=='Volume_DT 1-4/27-20' || d[i]['UtilityName']=='Volume_DT 5-10/11-16')
    {
      if(p%2==0)
      {
        table1 .innerHTML += "<tr class='domestic-new'><th style='font-size: 12px;color: #fff;'>Domestic Tank</th><th style='font-size: 12px;color: #fff;'>Total Capacity</th>"
                  +"<th style='font-size: 12px;color: #fff;'>Current Level</th>"
                  +"<th style='font-size: 12px;color: #fff;'>Filled</th>"
                  +"<th style='font-size: 12px;color: #fff;'>Level</th></tr>"; 
      }
      appendContent += "<tr>";
      if(d[i]['UtilityName']=='Volume_DT 1-4/27-20')
      {
        ++p;
        appendContent += "<td>DomesticTank 1-4/17-20</td>";
        appendContent += "<td class='new-spa'>850KL</td>";
        appendContent += "<td class='new-spa'>"+Math.round(d[i]['Consumption']/1000)*6+'KL'+"</td>";
        appendContent += "<td>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</td>";
        domeval+=Math.round(d[i]['Consumption']/1000);
        domesticfilled+=Math.round(((d[i]['Consumption'])/142000)*100);
        var domeVal1=Math.round(((d[i]['Consumption'])/142000)*100);
        appendContent += "<td><progress max='100' id='domesticprog1'></progress></td>";
        $("#domesticprog1").ready(function(){
          document.getElementById('domesticprog1').value=domeVal1;
        })
        
      }
      else if(d[i]['UtilityName']=='Volume_DT 5-10/11-16')
      {
        appendContent += "<td>DomesticTank 5-10/11-16</td>";
        appendContent += "<td class='new-spa'>850KL</td>";
        appendContent += "<td class='new-spa'>"+Math.round(d[i]['Consumption']/1000)*6+'KL'+"</td>";
        appendContent += "<td>"+Math.round(((d[i]['Consumption'])/142000)*100)+"%</td>";
        domeval+=Math.round(d[i]['Consumption']/1000);
        domesticfilled+=Math.round(((d[i]['Consumption'])/142000)*100);
        var domeVal2=Math.round(((d[i]['Consumption'])/142000)*100);
        // var domeVal2 = domeVal_dup/100;
        appendContent += "<td><progress max='100' id='domesticprog2'></progress></td>";
        appendContent += "</tr>";
        appendContent += "<tr>";
        appendContent += "<td><b>Total Volume</b></td>";
        appendContent += "<td class='new-spa'>1700KL</td>";
        appendContent += "<td class='new-spa'>"+(domeval*6)+"KL</td>";
        appendContent += "<td></td>";
        appendContent += "<td></td>";
        appendContent += "</tr>";
        $("#domesticprog2").ready(function(){
          document.getElementById('domesticprog2').value=domeVal2;
        })
        
      }
      table1.innerHTML = table1.innerHTML + appendContent;
      appendContent="";
    }
    if(d[i]['UtilityName']=='Volume_FT 1-4/17-20' || d[i]['UtilityName']=='Volume_FT 5-10/11-16')
    {
      if(k%2==0)
      {
        table1 .innerHTML += "<tr class='flush-new'><th style='font-size: 12px;color: #fff;'>Flush Tank</th><th style='font-size: 12px;color: #fff;'>Total Capacity</th>"
                    +"<th style='font-size: 12px;color: #fff;'>Current Level</th>"
                    +"<th style='font-size: 12px;color: #fff;'>Filled</th>"
                    +"<th style='font-size: 12px;color: #fff;'>Level</th></tr>";
      }
      appendContent1 += "<tr>";
      if(d[i]['UtilityName']=='Volume_FT 1-4/17-20')
      {
        k++; 
        appendContent1 += "<td>Flush Tank 1-4/17-20</td>";
        appendContent1 += "<td class='new-spa'>380KL</td>";
        appendContent1 += "<td class='new-spa'>"+Math.round(d[i]['Consumption']/1000)*4+'KL'+"</td>";
        appendContent1 += "<td>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</td>";
        var flushVal1=Math.round(((d[i]['Consumption']*4)/380000)*100);
        flushval+=Math.round(d[i]['Consumption']/1000);
        appendContent1+= "<td><progress max='100' id='flushprog1'></progress></td>";
        flushfilled+=Math.round(((d[i]['Consumption']*4)/380000)*100);
        $("#flushprog1").ready(function(){
            document.getElementById('flushprog1').value=flushVal1;
        })
      }
      else if(d[i]['UtilityName']=='Volume_FT 5-10/11-16')
      {
       
        appendContent1 += "<td>Flush Tank 5-10/11-16</td>";
        appendContent1 += "<td class='new-spa'>380KL</td>";
        appendContent1 += "<td class='new-spa'>"+Math.round(d[i]['Consumption']/1000)*4+'KL'+"</td>";
        appendContent1 += "<td>"+Math.round(((d[i]['Consumption']*4)/380000)*100)+"%</td>";
        var flushVal2=Math.round(((d[i]['Consumption']*4)/380000)*100);
        flushval+=Math.round(d[i]['Consumption']/1000);
        flushfilled+=Math.round(((d[i]['Consumption']*4)/380000)*100);
        appendContent1+= "<td><progress max='100' id='flushprog2'></progress></td>";
        appendContent1 += "</tr>";
        appendContent1 += "<tr>";
        appendContent1 += "<td><b>Total Volume</b></td>";
        appendContent1 += "<td class='new-spa'>760KL</td>";
        appendContent1 += "<td class='new-spa'>"+(flushval*4)+"KL</td>";
        appendContent1 += "<td></td>";
        appendContent1 += "<td></td>";
        appendContent1 += "</tr>";
        $("#flushprog2").ready(function(){
            document.getElementById('flushprog2').value=flushVal2;
        })
      }

      appendContent1 += "</tr>";
      table1.innerHTML = table1.innerHTML + appendContent1;
      appendContent1="";
    }
    lenred--;

  }

}
</script>
</body>
</html>
