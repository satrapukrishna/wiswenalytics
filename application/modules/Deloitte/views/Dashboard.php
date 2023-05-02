<?php 
//print_r($this->session->userdata());
$login = $this->session->userdata('login');
if($login){

}else{
  redirect(base_url().'Login');
 
}
$clientName = $this->session->userdata('ClientName');
$short = explode(" ", $clientName);
$ShortName = array();$i=0;
foreach ($short as $value) {
  $name = substr($value,0,1);
  $ShortName[$i] = $name;
  $i++;
}

$stVar = $this->session->userdata('Table');
$stationIdVar = explode("_", $stVar);

$stationIdspan = str_replace("[","",$stationIdVar[0]);
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Import materialize.css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/sodexoasset/bower_components/font-awesome/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

      <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/sodexoasset/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Wenalytics</title>
      <script type="text/javascript">
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
        function fetchSodexoData()
        {
          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();

          today = yyyy + '-' + mm + '-' + dd;

          console.log(today);
         
            var urlString = "<?php echo base_url();  ?>Sodexo/getSodexoData";
            $.ajax({
                url:urlString,
                type : 'GET',
                async: true,
                data: {date:today},
                success: function(data){
                  console.log("success"+data);
                  displaySodexoData(data);
                }
              });
        }
        function displaySodexoData(data)
        {
          var d = JSON.parse(data);
          var $container = $("#address");
          var $container2 = $("#footfall");
          var $container3 = $("#odour");
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
            var div="<div class='row dash-content' ><b>"+d[i]['StationName']+"</b></div>";
            $container.append(div);
            var div1=" <div class='col time-swipe'><div class='row'><p class='center'>No of Persons Walked in</p></div><div class='row'><span class='center'>"+Math.round((d[i]['footfallcountMale']/2))+"</span></div><button class='btn waves-effect waves-light center person-cen' type='button' name='action'>Details</button></div>";
            $container2.append(div1);
            var div2='<div class="col time-swipe perc1"><div class="row"><p class="center">Stink Level</p></div><div class="row det-btm"><span class="center">'+d[i]['OdourMale']+'%</span></div><button class="btn waves-effect waves-light center" type="button" name="action">Acceptable</button></div>';
            $container3.append(div2);
          }
        }

      </script>

    </head>

  <body onload="fetchSodexoData()">
     <!--  header section starts -->

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
 <li><i class="small material-icons">person</i><a href="#!">Profile</a></li>
  <li><i class="small material-icons">settings</i><a href="#!">Settings</a></li>
  <li><i class="small material-icons">lock_outline</i><a href="<?php echo base_url(); ?>Login/logout"> Log Out</a></li>
</ul>
<nav>
  <div class="nav-wrapper teal">
    <a href="#!" class="brand-logo">
      <img src="<?php echo base_url(); ?>/asset/sodexoasset/images/Logonew.png">
    </a>
    <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><?php echo $this->session->userdata('ProfileName'); ?><i class="material-icons right">expand_more</i></a></li>
    </ul>
  </div>
</nav>
<!-- header section end -->

<!-- main content satrts here -->

<main>
   <!--  first section here -->
  <div class="container-fluid">
    <div class="row top-row">
    
    </div>
  </div>
  <!--  first section end -->

  <!-- second section starts from here -->
  <div class="container-fluid second-cont">
    <div class="row second">
      <div class="col l2 " id="address">
        <div class="btm-btm">
          <h5>Dashboard</h5>
        </div>
        
      </div>
    
      <div class="col l2 center">
        <div class="btm-btm">
          <img src="<?php echo base_url(); ?>/asset/sodexoasset/images/RFID.png">
          <h6>RFID Janitor Attendance</h6>
        </div>

        <div class="col time-swipe">
          <div class="row"><p class="left">No of Times Swiped</p><span class="right">0</span></div>
          <div class="row det-btm"><p class="left">No of Times <br/>Cleaning Swiped</p><span class="right">0</span></div>
          <button class="btn waves-effect waves-light center" type="button" name="action">Details</button>
        </div>
       
      </div>

      <div class="col l2 center" id="odour">
        <div class="btm-btm">
          <img src="<?php echo base_url(); ?>/asset/sodexoasset/images/strink.png">
          <h6>Stink Sensor</h6>
        </div> 
      </div>

      <div class="col l2 center">
        <div class="btm-btm">
          <img src="<?php echo base_url(); ?>/asset/sodexoasset/images/waterlevel.png">
          <h6>Water Level Sensor</h6>
        </div>
        <div class="col time-swipe">
          <div class="row"><p class="center water">Water level</p></div>
          <div class="row"><span class="center">NA</span> <span class="smal-text"></span></div>
          <div class="row"><p class="center water">Water Consumed</p></div>
          <div class="row"><span class="center">NA</span> <span  class="smal-text"></span></div>  
        </div>
      </div>

      <div class="col l2 center" id="footfall">
        <div class="btm-btm">
          <img src="<?php echo base_url(); ?>/asset/sodexoasset/images/footfall.png">
          <h6>Footfall Sensor</h6>
        </div>
      </div>

      <div class="col l2 center">
        <div class="btm-btm">
          <img src="<?php echo base_url(); ?>/asset/sodexoasset/images/feedback.png">
          <h6>Feedback Buttons</h6>
        </div>

        <div class="col time-swipe">
          <div class="row"><p class="center">Feedback</p></div>
          <div class="progress">
            <div class="progress-bar  progress-bar-success active progress-bar-striped" role="progressbar"
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
              0% (Good) 
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar  progress-bar-warning active progress-bar-striped" role="progressbar"
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
              0% (Average) 
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-danger active progress-bar-striped" role="progressbar"
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
              0% (Bad) 
            </div>
          </div>
          
        </div>

      </div>
    </div>
  </div>
<!-- second section end  here -->

  <!-- hari code starts -->
      <div class="container-fluid second-cont">
          
          <table width="1000" border="1">
            <thead>
            <tr><th width="200" align="center">HandTowel</th><th width="200">ToiletRolls</th><th width="200">Dustbin</th><th width="200">Floor</th>
            <th width="250">Handsoap</th></tr>
            </thead>
            <tbody>
              <tr>
                <td><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/towel.png"></td>
                <td><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/toilet-paper.png"></td>
                <td><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/bin.png"></td>
                <td><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/wet-floor.png"></td>
                <td><img src="<?php echo base_url(); ?>/asset/sodexoasset/images/sponge.png"></td>
              </tr>
            </tbody>
          </table>

      </div>
    

  <!-- hari code ends -->
</main>

     <!-- footer section Starts here -->

      <footer class="page-footer teal lighten-2">
        <div class="footer-copyright">
          <div class="container">
          Copyright©2018, www.Wenalytics.com
         <!--  <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
          </div>
        </div>
      </footer>
         <!-- footer section End -->



      <!--Import jQuery before materialize.js-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
     
    
</body>
     <script type="text/javascript">
       $(document).ready(function(){
    $(".dropdown-trigger").dropdown();
  });
      document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.datepicker');
      var instances = M.Datepicker.init(elems);
    });
    </script>
  </html>