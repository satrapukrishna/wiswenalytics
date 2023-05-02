<?php
//echo "<pre>";print_r($meters);
$meterList =array();
for ($i=0; $i < count($meters); $i++) { 
  array_push($meterList,$meters[$i]->MeterName);
}
//echo "<pre>";print_r($meterList);
//die();
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
   <link rel="stylesheet" href="../../asset/energymeterasset/css/energymeterStyle.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">


  </style>

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
      <h1>
      HVAC Performance Report
        
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">Inline Charts</li>
      </ol> -->
    </section>
    <div id="alert"></div>
    <!-- Main content -->
    <section class="content">
      
      <div style="margin-bottom: 12px;">
        <div class="row meter-top">
            <label>Select Hours From : 
            </label>
       
        <select  id="fromtime">
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
            //$list .= "<option value=".$value.">".$value."</option>";
              if($value == "00:00:00"){
                    $list .= "<option value=".$value." selected='true'>".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
            }
            echo $list;
          ?>
        </select>
        <label>Select Hours To : 
            </label>
        <select  id="totime">
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
              if($value == "24:00:00"){
                    $list .= "<option value=".$value." selected='true'>".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
            }
            echo $list;
          ?>
        </select>
        <input type="date" name="" id="fromdate" data-placeholder="From Date" required aria-required="true">
        <input type="date" name="" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="button" onclick="getHVACReport()" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
        <input type="hidden" name="meterList" id="meterList" value=<?php echo json_encode($meterList); ?>>
      </div>
     </div>
     <div class="lds-ellipsis" id="loading" style="display: none;margin: 7px !important;"><div></div><div></div><div></div><div></div></div>
     <div class="color-indic" id ="indications" style="display: none;">
              <div class="green"><div></div><span>Good</span></div>
              <div class="yellow"><div></div><span>Averege</span></div>
              <div class="red"><div></div><span>Bad</span></div>
            </div>
     
      <!-- <div class="row">
        <div class="col-xs-12">
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title"></h3>

            </div>
           
            <div class="box-body">
              <div class="row">
                <div class="col-xs-6 col-md-3 text-center">
                  <input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">

                  <div class="knob-label">data-width="90"</div>
                </div>
               
                <div class="col-xs-6 col-md-3 text-center">
                  <input type="text" class="knob" value="30" data-width="120" data-height="120" data-fgColor="#f56954">

                  <div class="knob-label">data-width="120"</div>
                </div>
                
                <div class="col-xs-6 col-md-3 text-center">
                  <input type="text" class="knob" value="30" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#00a65a">

                  <div class="knob-label">data-thickness="0.1"</div>
                </div>
                
                <div class="col-xs-6 col-md-3 text-center">
                  <input type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="30" data-width="120" data-height="120" data-fgColor="#00c0ef">

                  <div class="knob-label">data-angleArc="250"</div>
                </div>
                
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </div> -->

      <div class="row" style="display: block;" id="report">
        <!-- first temp end -->
        <div class="col-md-5 hvac" id="hvac_1" style="display: none;">
          <h4 style="text-align: center;" id="h4_1"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
              <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_1"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_1" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <div id="deltamintime_1" class="time"></div>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_1" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <div id="deltamaxtime_1" class="time"></div>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_1" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_1" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <div id="returnmintime_1" class="time"></div>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_1" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <div id="returnmaxtime_1" class="time"></div>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_1" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_1" class="dial"  data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_1" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_1" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_1" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_1" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_1" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_1" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_1" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_1" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        
        <!-- second temp start -->
        <div class="col-md-5 hvac" id="hvac_2" style="display: none;">
          <h4 style="text-align: center;" id="h4_2"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
               
              <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_2"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_2" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_2" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_2" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_2" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_2" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_2" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_2" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_2" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_2" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_2" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_2" class="dial"  data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_2" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_2" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_2" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_2" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_2" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_2" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_2" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_2" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- third temp starts -->
        <div class="col-md-5 hvac" id="hvac_3" style="display: none;">
          <h4 style="text-align: center;" id="h4_3"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
               
            <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_3"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_3" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_3" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_3" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_3" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_3" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_3" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_3" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_3" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_3" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_3" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_3" class="dial"  data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_3" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_3" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_3" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_3" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_3" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_3" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_3" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_3" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- fourth temp end -->
        <div class="col-md-5 hvac" id="hvac_4" style="display: none;">
          <h4 style="text-align: center;" id="h4_4"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
              
            <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_4"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_4" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_4" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_4" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_4" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_4" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_4" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_4" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_4" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_4" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_4" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_4" class="dial" value="100%" data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_4" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_4" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_4" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_4" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_4" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_4" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_4" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_4" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- fifth temp end --><!--padding: 15px;background: #fff;margin:7px 10px !important;-->
        <div class="col-md-5 hvac" id="hvac_5" style="display: none; ">
          <h4 style="text-align: center;" id="h4_5"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
               
            <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_5"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_5" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_5" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_5" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_5" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_5" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_5" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_5" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_5" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_5" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_5" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_5" class="dial" value="100%" data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_5" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_5" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_5" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_5" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_5" class="count time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_5" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_5" class="count time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_5" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- six temp end -->
        <div class="col-md-5 hvac" id="hvac_6" style="display: none;">
          <h4 style="text-align: center;" id="h4_6"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
               
            <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_6"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_6" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_6" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_6" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_6" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_6" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_6" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_6" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_6" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_6" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_6" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_6" class="dial" value="100%" data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_6" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_6" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_6" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_6" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_6" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_6" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_6" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_6" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- seven temp end -->
        <div class="col-md-5 hvac" id="hvac_7" style="display: none;">
          <h4 style="text-align: center;" id="h4_7"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
               
            <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_7"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_7" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_7" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_7" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_7" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_7" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_7" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_7" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_7" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_7" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_7" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_7" class="dial" value="100%" data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_7" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_7" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_7" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_7" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_7" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_7" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_7" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_7" class="count"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- eight temp end -->
        <div class="col-md-5 hvac" id="hvac_8" style="display: none;">
          <h4 style="text-align: center;" id="h4_8"></h4>
          <div class="row">
            <div class="col-md-6 text-center">
               
            <h4>deltaT</h4>
              <div class="delta">
                  <input type="text" class="dial" id="deltaT_8"   data-width="120"  data-height="120"  data-readonly="true"><!--data-fgColor="#28a745"-->
                </div>
                 
            <div class="height-max">
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="deltamintemp_8" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamintime_8" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="deltamaxtemp_8" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="deltamaxtime_8" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="deltaavgtemp_8" class="count"></span>
              </div>
            </div>
            <div class="retun">
              <h4>Return Air Temperature</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="returnmintemp_8" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmintime_8" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="returnmaxtemp_8" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="returnmaxtime_8" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="returnavgtemp_8" class="count"></span>
              </div>
            </div>
            </div>
            
            <div class="col-md-6 text-center">
              <div class="bottom"></div>
              <h4>Compressor Run</h4>
              <div class="delta">
                 <input type="text" id="consumption_8" class="dial" value="100%" data-width="120" data-height="120"   data-readonly="true"><!--data-fgColor="#ffc107"-->
               </div>
                 <div class="height-max">
              <div class="mini animated fadeInUp">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> Compressor Runtime</span> :  <span id="consumption_run_8" class="count"></span>
              </div>
              <div class="mini animated fadeInUp">
                 <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="total"> unit Runtime</span> : <span id="unit_run_8" class="count"></span>
              </div>
            </div>
             <div class="retun" id="filter_div_8" style="display: none;">
              <h4>Filter Pressure</h4>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Min Temp</span> : <span id="filter_min_temp_8" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_min_time_8" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Max Temp</span> : <span id="filter_max_temp_8" class="count"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="filter_max_time_8" class="time"></span>
              </div>
              <div class="mini animated fadeInUp">
                <div class="sequre"></div><span>Avg Temp</span> : <span id="filter_avg_temp_8" class="count"></span>
              </div>
            </div>
            </div>
          </div>
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
<!-- SlimScroll -->
<script src="../../asset/common-utilits/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../asset/common-utilits/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/common-utilits/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/common-utilits/dist/js/demo.js"></script>
<!-- jQuery Knob -->
<script src="../../asset/common-utilits/bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- Sparkline -->
<script src="../../asset/common-utilits/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- page script -->

<script>
  $(function () {
    /* jQueryKnob */

    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */
})
</script>
<script>
  function draw () {//knob1
    /* jQueryKnob */
    //var k = '.'+knob1;
    $(".knob").knob({
     // $(k).knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);
          
          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }
          
          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();
          
          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();
          
          return false;
        }
      }
    });
    /* END JQUERY KNOB */
}
</script>
<script>
function validate()
{
  var fromtime = document.getElementById("fromtime").value;
  var totime = document.getElementById("totime").value;
  var fromdate = document.getElementById("fromdate").value;
  var todate = document.getElementById("todate").value;
  var alertdiv = document.getElementById("alert");

  if((fromtime == "Select Hours" && totime == "Select Hours")){
    
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
function parseDate(str) {
  var mdy = str.split('-');
  return new Date(mdy[0], mdy[1]-1, mdy[2]);
}
function datediff(first, second) {
    return Math.round((second-first)/(1000*60*60*24));
}
function generateReport(data,j){
  var report = document.getElementById("report");
  var hvacid = "hvac_"+j;
  var deltaT = "deltaT_"+j;
  var consumption = "consumption_"+j;
  var filter_div = "filter_div_"+j;
  var h4 = "h4_"+j;
  var Dcolor ="";var Ccolor="";
  var deltamintemp = "deltamintemp_"+j;
  var deltamaxtemp = "deltamaxtemp_"+j;
  var deltaavgtemp = "deltaavgtemp_"+j;
  var deltamintime = "deltamintime_"+j;
  var deltamaxtime = "deltamaxtime_"+j;
  if(data['Delta']['delta']<8){
    Dcolor = "#dc3545";
  }else if(data['Delta']['delta']>8 && data['Delta']['delta']<12){
    Dcolor = "#ffc107";
  }else if(data['Delta']['delta']>12){
    Dcolor = "#28a745";
  }
  document.getElementById(h4).innerHTML = "";
  document.getElementById(h4).innerHTML = data['meter']; 
  document.getElementById(deltaT).value = "";
  document.getElementById(deltaT).value = data['Delta']['delta'];
  /*$(".dial").knob({
    fgColor: Dcolor,
  });*/
  var id = '#'+deltaT;
  //var $dial = $('.dial');
  var $dial = $(id);
  $dial.knob({
    'fgColor': Dcolor
  });
  //$("input.colorChange").trigger(deltaT);
  //document.getElementById(deltaT).data = Dcolor;
  document.getElementById(deltamintemp).innerHTML = "";
  document.getElementById(deltamaxtemp).innerHTML = "";
  document.getElementById(deltaavgtemp).innerHTML = "";
  document.getElementById(deltamintime).innerHTML = "";
  document.getElementById(deltamaxtime).innerHTML = "";

  document.getElementById(deltamintemp).innerHTML = data['Delta']['minValue'];
  document.getElementById(deltamaxtemp).innerHTML = data['Delta']['maxValue'];
  document.getElementById(deltaavgtemp).innerHTML = data['Delta']['avg'];
  document.getElementById(deltamintime).innerHTML = data['Delta']['minTime'];
  document.getElementById(deltamaxtime).innerHTML = data['Delta']['maxTime'];
  //document.getElementById(hvacid).style.display = "block";
  var returnmintemp = "returnmintemp_"+j;
  var returnmaxtemp = "returnmaxtemp_"+j;
  var returnmintime = "returnmintime_"+j;
  var returnmaxtime = "returnmaxtime_"+j;
  var returnavgtime = "returnavgtemp_"+j;

  document.getElementById(returnmintemp).innerHTML = "";
  document.getElementById(returnmaxtemp).innerHTML = "";
  document.getElementById(returnmintime).innerHTML = "";
  document.getElementById(returnmaxtime).innerHTML = "";
  document.getElementById(returnavgtime).innerHTML = "";

  document.getElementById(returnmintemp).innerHTML = data['returnAirTemp']['MinTemp'];
  document.getElementById(returnmaxtemp).innerHTML = data['returnAirTemp']['MaxTemp'];
  document.getElementById(returnmintime).innerHTML = data['returnAirTemp']['MinTime'];
  document.getElementById(returnmaxtime).innerHTML = data['returnAirTemp']['MaxTime'];
  document.getElementById(returnavgtime).innerHTML = data['returnAirTemp']['AvgTemp'];
  if(data['consumption']['value']>80){
    Ccolor= "#dc3545";
  }else if(data['consumption']['value']>50 && data['consumption']['value']<80){
    Ccolor = "#ffc107";
  }else if(data['consumption']['value']<50){
    Ccolor = "#28a745";
  }
  var id1 = '#'+consumption;
  var $dial1 = $(id1);
  $dial1.knob({
    'fgColor': Ccolor
  });
  var consumption = "consumption_"+j;
  var consumption_run = "consumption_run_"+j;
  var unit_run = "unit_run_"+j;
  document.getElementById(consumption).value = "";
  document.getElementById(consumption).value = data['consumption']['value'];

  document.getElementById(consumption_run).innerHTML = "";
  document.getElementById(unit_run).innerHTML = "";

  document.getElementById(consumption_run).innerHTML = data['consumption']['cruntime'];
  document.getElementById(unit_run).innerHTML = data['consumption']['uruntime'];

  var filter_min_temp = "filter_min_temp_"+j;
  var filter_max_temp = "filter_max_temp_"+j;
  var filter_min_time = "filter_min_time_"+j;
  var filter_max_time = "filter_max_time_"+j;
  var filter_avg_temp = "filter_avg_temp_"+j;
  if(data['pressure']['MinTemp'] != null){
    document.getElementById(filter_div).style.display = "block";
    document.getElementById(filter_min_temp).innerHTML = "";
    document.getElementById(filter_max_temp).innerHTML = "";
    document.getElementById(filter_min_temp).innerHTML = data['pressure']['MinTemp'];
    document.getElementById(filter_max_temp).innerHTML = data['pressure']['MaxTemp'];
  }
  document.getElementById(filter_min_time).innerHTML = "";
  document.getElementById(filter_max_time).innerHTML = "";
  document.getElementById(filter_avg_temp).innerHTML = "";

  document.getElementById(filter_min_time).innerHTML = data['pressure']['MinTime'];
  document.getElementById(filter_max_time).innerHTML = data['pressure']['MaxTime'];
  document.getElementById(filter_avg_temp).innerHTML = data['pressure']['AvgTemp'];
  document.getElementById(hvacid).style.display = "block";
}
function getHVACReport(){
  var valid=validate();
  if(valid){
    document.getElementById("loading").style.display="block";
    document.getElementById("indications").style.display="block";
    var fromtime = document.getElementById("fromtime").value;
    var totime = document.getElementById("totime").value;
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var from = parseDate(fromdate);
    var to = parseDate(todate);
    var difference = datediff(from,to);
    if(difference == 0 || difference >= 1){
      difference += 1;
    }
    var meterList = document.getElementById("meterList").value;
    meterList = JSON.parse(meterList);
    var noofmeters = Object.keys(meterList).length;
    console.log(noofmeters);
    var j = 0;
    for (var i = 0; i < noofmeters; i++) {
     
      //console.log(meterList[i]);
      var urlString = "HAVCPerformance";
      $.ajax({
        url:urlString,
        //type : 'GET',
        type : 'POST',
        async : true,
        data: {meters: meterList[i],fromtime:fromtime,totime:totime,fromdate:fromdate,todate:todate},
        success: function(data){
           j++;
          //console.log(data);
          var res = JSON.parse(data);
          generateReport(res,j);
          
          if(noofmeters == j){
            draw();
            document.getElementById("loading").style.display="none";
            document.getElementById("report").style.display="block";
          }
        }
      });
    }
    
      
  }
}
</script>
</body>
</html>
