
<html>
<head>
    <?php $this->load->view('common/css3') ?>
    <link href="<?php echo base_url(); ?>asset/fairmontasset/CSS/StyleSheet.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>

    .status-on{
    display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
.status-off{
    display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 10px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 90px!important;
    text-align: center!important;
}
img {
vertical-align: middle;
margin-right:10px;}
div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.Lnk{
    padding: 21px 40px 18px 20px!important;
}
.col{
    cursor: pointer;
    z-index:1000000;
    margin: 18px 10px 0 0!important;
    
    }
    
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft, div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{padding:9px}
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl {padding:10px}
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: none !important;border-bottom: 1px solid #ddd;}
    .bx-wrapper .bx-prev{left: -28px !important;}
    .bx-wrapper .bx-next {right: -31px !important;}
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr {
    background-color: #fff!important;
    box-shadow: none!important;
    /*border-radius: 10px;*/
  border: 1px solid #ccc;
    }
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl{
    padding: 14px 0 9px 45px!important;
    }
    .imageadd img{ left: 0px!important;}
    div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr{padding:0px 0px 0px 10px}
    </style>
<body > 
    <div id="MnCtnr" class="DshMnCtnr">
        
        <?php $this->load->view('common/left_menu3') ?>
        <?php $this->load->view('common/header2') ?>
        
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
        
        <input type="hidden" id="page" value="firepump" />
        
        
        
        <!-- Bore Wells code starts -->
            <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="div555">
                    <span class="TxtTtl imageadd">HVAC Report</span>
                    
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
                    <span class="SctnVw Cllps" onclick="device(555)" id="device555"></span>
                    <span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
                    
                </div>
                <?php /*<div class="DshBrdSctnDtls" id="Bwmeter">*/?>
                <br/>
                <div class="DshBrdSctnDtls device" id="devicebox555">
                
                <div class="bxslider555" id="bxid">
                    
                    <div>
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <div><div class='hvac-bg-new'><div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'><div class='panel panel-default'><div class='panel-heading' role='tab' id='headingTwo'><h4 class='panel-title'><a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwoNovalis Ch WD-2' aria-expanded='false' aria-controls='collapseTwoNovalis Ch WD-2'>Novalis Ch WD-2</a><div class='left-icons'><div class='purple'><span>23.6&deg;C</span></div><div class='light-blue'><span>5.88%</span></div><div class='cool-img'><img src='http://wenalytics.in/asset/common-utilits/dist/img/hvac-coool.png'></div><div class='on-img'><img src='http://wenalytics.in/asset/common-utilits/dist/img/hvac-on.png'></div></div></h4><!--<hr>--></div><div id='collapseTwoNovalis Ch WD-2' class='panel-collapse' role='tabpanel' aria-labelledby='headingTwo'><div class='panel-body'><div class='rowdown-row'><div class='main-content'><div class='sub-one'><label>Status</label><div>ON</div></div><div class='sub-one'><label>SupplyAirTemp</label><div>17.4&deg;C</div></div><div class='sub-one'><label>SupplyWaterTemp</label><div>14&deg;C</div></div><div class='sub-one'><label>ActuatorLevel</label><div>5.88%</div></div><div class='sub-one'><label>FilterPressure</label><div>37.9 Pa</div></div><div class='sub-one'><label>Delta T</label><div>23</div></div></div><div class='main-content'><div class='sub-one'><label>Cooling</label><div>ON</div></div><div class='sub-one'><label>ReturnAirTemp</label><div>23.6&deg;C</div></div><div class='sub-one'><label>ReturnWaterTemp</label><div>13.4&deg;C</div></div><div class='sub-one'><label>VFDControl</label><div>NA</div></div><div class='sub-one'><label>Blockage</label><div>NA</div></div><div class='sub-one'><label>Set Temp</label><div>19.4&deg;C</div></div></div></div></div></div></div></div></div></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div>
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <div><div class='hvac-bg-new'><div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'><div class='panel panel-default'><div class='panel-heading' role='tab' id='headingTwo'><h4 class='panel-title'><a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwoNovalis Ch WD-2' aria-expanded='false' aria-controls='collapseTwoNovalis Ch WD-2'>Novalis Ch WD-2</a><div class='left-icons'><div class='purple'><span>23.6&deg;C</span></div><div class='light-blue'><span>5.88%</span></div><div class='cool-img'><img src='http://wenalytics.in/asset/common-utilits/dist/img/hvac-coool.png'></div><div class='on-img'><img src='http://wenalytics.in/asset/common-utilits/dist/img/hvac-on.png'></div></div></h4><!--<hr>--></div><div id='collapseTwoNovalis Ch WD-2' class='panel-collapse' role='tabpanel' aria-labelledby='headingTwo'><div class='panel-body'><div class='rowdown-row'><div class='main-content'><div class='sub-one'><label>Status</label><div>ON</div></div><div class='sub-one'><label>SupplyAirTemp</label><div>17.4&deg;C</div></div><div class='sub-one'><label>SupplyWaterTemp</label><div>14&deg;C</div></div><div class='sub-one'><label>ActuatorLevel</label><div>5.88%</div></div><div class='sub-one'><label>FilterPressure</label><div>37.9 Pa</div></div><div class='sub-one'><label>Delta T</label><div>23</div></div></div><div class='main-content'><div class='sub-one'><label>Cooling</label><div>ON</div></div><div class='sub-one'><label>ReturnAirTemp</label><div>23.6&deg;C</div></div><div class='sub-one'><label>ReturnWaterTemp</label><div>13.4&deg;C</div></div><div class='sub-one'><label>VFDControl</label><div>NA</div></div><div class='sub-one'><label>Blockage</label><div>NA</div></div><div class='sub-one'><label>Set Temp</label><div>19.4&deg;C</div></div></div></div></div></div></div></div></div></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    
                    
                    <div>
                    <div class="SctnDtlsHldr">
                    <div class="SldrCntnr">
                    <div class="SctnDtls BorewellHldr">
                    <div><div class='hvac-bg-new'><div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'><div class='panel panel-default'><div class='panel-heading' role='tab' id='headingTwo'><h4 class='panel-title'><a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwoNovalis Ch WD-2' aria-expanded='false' aria-controls='collapseTwoNovalis Ch WD-2'>Novalis Ch WD-2</a><div class='left-icons'><div class='purple'><span>23.6&deg;C</span></div><div class='light-blue'><span>5.88%</span></div><div class='cool-img'><img src='http://wenalytics.in/asset/common-utilits/dist/img/hvac-coool.png'></div><div class='on-img'><img src='http://wenalytics.in/asset/common-utilits/dist/img/hvac-on.png'></div></div></h4><!--<hr>--></div><div id='collapseTwoNovalis Ch WD-2' class='panel-collapse' role='tabpanel' aria-labelledby='headingTwo'><div class='panel-body'><div class='rowdown-row'><div class='main-content'><div class='sub-one'><label>Status</label><div>ON</div></div><div class='sub-one'><label>SupplyAirTemp</label><div>17.4&deg;C</div></div><div class='sub-one'><label>SupplyWaterTemp</label><div>14&deg;C</div></div><div class='sub-one'><label>ActuatorLevel</label><div>5.88%</div></div><div class='sub-one'><label>FilterPressure</label><div>37.9 Pa</div></div><div class='sub-one'><label>Delta T</label><div>23</div></div></div><div class='main-content'><div class='sub-one'><label>Cooling</label><div>ON</div></div><div class='sub-one'><label>ReturnAirTemp</label><div>23.6&deg;C</div></div><div class='sub-one'><label>ReturnWaterTemp</label><div>13.4&deg;C</div></div><div class='sub-one'><label>VFDControl</label><div>NA</div></div><div class='sub-one'><label>Blockage</label><div>NA</div></div><div class='sub-one'><label>Set Temp</label><div>19.4&deg;C</div></div></div></div></div></div></div></div></div></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                </div>
                   
                </div>
                
                

            </div>
            <!-- Bore Wells code ends -->
        
            
            
            <!-- IAQ start -->
             <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl IOQ">Indoor Air Quality</span>
                    <span class="SctnVw Cllps" id="flowcollapse"></span>
<!--                     <span class="SctnVwAll Cllps FA" id="collapseall"></span>
 -->                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd IOQ" id="flowmeters">
                    <div class="bxsliderFllWdth">
                        <div>
                            <div class="IOQArea">
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Temperature</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl TmprCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu TmpIco" id="temp">
                                                              
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    
                                                    <input class="FtrInpt" value="Present Temperature" readonly />
                                                    <input class="FtrInpt" id="temptext" value="" readonly />

                                                    
                                                </div>
                                                <div class="FtrGrph" >
                                                    <div  id="container_temp">
                                                    
                                                      </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Relative Humidity</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl HmdCool">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu RltHmd" id="hmd">%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    
                                                    <input class="FtrInpt" value="Present Humidity" readonly />
                                                    <input class="FtrInpt" id="hmdtext" value="" readonly />
                                                    
                                                    
                                                </div>
                                                <div class="FtrGrph">
                                                        <div  id="container_hmd">
                                                    
                                                      </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="IOQAreaSctn">
                                    <div class="SldrCntnr">
                                        <div class="SctnDtls IOQFtr">
                                            <span class="FtrTtl">Carbon Dioxide</span>
                                            <div class="FtrDts">
                                                <div class="FtrVlue">
                                                    <div class="FtrOtrCrcl CoGood">
                                                        <div class="FtrInnrCrcl">
                                                            <span class="FtrCrrntVlu Cotwo" id="co">
                                                                
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="FtrDrtn">
                                                    <select class="FtrDrpDwn">
                                                        <option value="">Present CO2</option>
                                                        <!-- <option value="">Weekly</option>
                                                        <option value="">Monthly</option> -->
                                                    </select>
                                                    <input class="FtrInpt" />
                                                   
                                                </div>
                                                <div class="FtrGrph">
                                                     <div  id="container_co">
                                                    
                                                      </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- IAQ End -->
            

        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
            <!-- btu -->
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BTU 01 </h4>
        </div>
        <div class="modal-body">
            <table class="table">
              
              <tbody>
                <tr>
                  <th scope="row">Energy Consumption</th>
                  <td>0.0 kWh</td>
                  
                </tr>
                <tr>
                  <th scope="row">Volume</th>
                  <td>0.0 M^3</td>
                 
                </tr>
                <tr>
                  <th scope="row">CHW Inlet Temperature</th>
                  <td>0.0 &#8451; </td>
                 
                </tr>
                <tr>
                  <th scope="row">CHW Outlet Temperature</th>
                  <td>0.0 &#8451; </td>
                 
                </tr>
                <tr>
                  <th scope="row">CHW Delta Temperature</th>
                  <td>0.0 &#8451; </td>
                 
                </tr>
                <tr>
                  <th scope="row">Present Load</th>
                  <td>0.0 Kw</td>
                 
                </tr>
                <tr>
                  <th scope="row">Volume Flow</th>
                  <td>0.0 L/Hr</td>
                 
                </tr>
                
                
              </tbody>
            </table>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
    </div>
    
  
</div>

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/energymeterasset/css/energymeterStyle.css">

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>


<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script>    
 
$('.bxslider555').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
    $('.bxslider556').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });
    $('.bxslider557').bxSlider({
        slideWidth: 500,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });

$('.bxslider558').bxSlider({
        slideWidth: 300,
        minSlides: 2,
        maxSlides: 30,
        touchEnabled: false,
        slideMargin: 0
    });

    // iaq data start
    data = '[{"temp":30.7,"humidity":69.1,"co2":"NA"},{"tmp":[{"FromTime":"00:04:13","CurReading":"30.80"},{"FromTime":"00:19:43","CurReading":"30.80"},{"FromTime":"00:36:02","CurReading":"30.80"},{"FromTime":"00:51:31","CurReading":"30.80"},{"FromTime":"01:07:01","CurReading":"30.80"},{"FromTime":"01:22:33","CurReading":"30.80"},{"FromTime":"01:42:31","CurReading":"30.80"},{"FromTime":"02:02:18","CurReading":"30.70"},{"FromTime":"02:22:38","CurReading":"30.70"},{"FromTime":"02:42:27","CurReading":"30.70"},{"FromTime":"03:02:21","CurReading":"30.70"},{"FromTime":"03:22:25","CurReading":"30.70"},{"FromTime":"03:42:14","CurReading":"30.70"},{"FromTime":"04:02:11","CurReading":"30.70"},{"FromTime":"04:23:00","CurReading":"30.70"},{"FromTime":"04:43:55","CurReading":"30.80"},{"FromTime":"05:04:42","CurReading":"30.80"},{"FromTime":"05:25:30","CurReading":"30.70"},{"FromTime":"05:45:28","CurReading":"30.70"},{"FromTime":"06:05:46","CurReading":"30.70"},{"FromTime":"06:26:38","CurReading":"30.70"},{"FromTime":"06:46:28","CurReading":"30.60"},{"FromTime":"07:07:23","CurReading":"30.60"},{"FromTime":"07:26:36","CurReading":"30.60"},{"FromTime":"07:36:32","CurReading":"30.60"},{"FromTime":"07:46:26","CurReading":"30.60"},{"FromTime":"07:56:20","CurReading":"30.60"},{"FromTime":"08:06:15","CurReading":"30.60"},{"FromTime":"08:16:09","CurReading":"30.60"},{"FromTime":"08:26:32","CurReading":"30.50"},{"FromTime":"08:36:27","CurReading":"30.50"},{"FromTime":"08:46:22","CurReading":"30.50"},{"FromTime":"08:56:13","CurReading":"30.50"},{"FromTime":"09:06:36","CurReading":"30.50"},{"FromTime":"09:16:31","CurReading":"30.50"},{"FromTime":"09:26:26","CurReading":"30.40"},{"FromTime":"09:36:21","CurReading":"30.40"},{"FromTime":"09:46:17","CurReading":"30.50"},{"FromTime":"09:56:22","CurReading":"30.50"},{"FromTime":"10:06:17","CurReading":"30.50"},{"FromTime":"10:16:11","CurReading":"30.60"},{"FromTime":"10:26:35","CurReading":"30.60"},{"FromTime":"10:36:29","CurReading":"30.60"},{"FromTime":"10:46:24","CurReading":"30.60"},{"FromTime":"10:56:19","CurReading":"30.70"}],"hmd":[{"FromTime":"00:04:13","CurReading":"71.70"},{"FromTime":"00:19:43","CurReading":"71.90"},{"FromTime":"00:36:02","CurReading":"72.00"},{"FromTime":"00:51:31","CurReading":"71.80"},{"FromTime":"01:07:01","CurReading":"71.40"},{"FromTime":"01:22:33","CurReading":"71.10"},{"FromTime":"01:42:31","CurReading":"70.80"},{"FromTime":"02:02:18","CurReading":"69.90"},{"FromTime":"02:22:38","CurReading":"69.30"},{"FromTime":"02:42:27","CurReading":"69.10"},{"FromTime":"03:02:21","CurReading":"68.60"},{"FromTime":"03:22:25","CurReading":"67.90"},{"FromTime":"03:42:14","CurReading":"67.60"},{"FromTime":"04:02:11","CurReading":"67.80"},{"FromTime":"04:23:00","CurReading":"68.20"},{"FromTime":"04:43:55","CurReading":"69.10"},{"FromTime":"05:04:42","CurReading":"69.20"},{"FromTime":"05:25:30","CurReading":"69.80"},{"FromTime":"05:45:28","CurReading":"69.70"},{"FromTime":"06:05:46","CurReading":"69.70"},{"FromTime":"06:26:38","CurReading":"69.70"},{"FromTime":"06:46:28","CurReading":"69.50"},{"FromTime":"07:07:23","CurReading":"69.30"},{"FromTime":"07:26:36","CurReading":"69.20"},{"FromTime":"07:36:32","CurReading":"69.50"},{"FromTime":"07:46:26","CurReading":"69.50"},{"FromTime":"07:56:20","CurReading":"69.50"},{"FromTime":"08:06:15","CurReading":"69.60"},{"FromTime":"08:16:09","CurReading":"69.30"},{"FromTime":"08:26:32","CurReading":"69.00"},{"FromTime":"08:36:27","CurReading":"68.60"},{"FromTime":"08:46:22","CurReading":"68.50"},{"FromTime":"08:56:13","CurReading":"68.30"},{"FromTime":"09:06:36","CurReading":"68.40"},{"FromTime":"09:16:31","CurReading":"68.30"},{"FromTime":"09:26:26","CurReading":"67.80"},{"FromTime":"09:36:21","CurReading":"68.30"},{"FromTime":"09:46:17","CurReading":"68.20"},{"FromTime":"09:56:22","CurReading":"68.30"},{"FromTime":"10:06:17","CurReading":"68.50"},{"FromTime":"10:16:11","CurReading":"68.50"},{"FromTime":"10:26:35","CurReading":"68.60"},{"FromTime":"10:36:29","CurReading":"68.70"},{"FromTime":"10:46:24","CurReading":"69.10"},{"FromTime":"10:56:19","CurReading":"69.10"}],"co":0}]';

    var d1 = JSON.parse(data);
$("#temp").text(d1[0]["temp"]+(' \u2103'));
$("#hmd").text(Math.round(d1[0]["humidity"])+(' %RH'));
$("#co").text(d1[0]["co2"]+(''));
$("#temptext").val(d1[0]["temp"]+(' \u2103'));
$("#hmdtext").val(Math.round(d1[0]["humidity"])+(' %RH'));

    var xdata = new Array();
    var ydata = new Array();

    var xdatahmd = new Array();
    var ydatahmd = new Array();

    var xdataco = new Array();
    var ydataco = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < d1[1]['tmp'].length; i++) 
    { 
        xdata[i] = d1[1]['tmp'][i]['FromTime'];
        ydata[i] = parseFloat(d1[1]['tmp'][i]['CurReading']); 
        
      
    }
     for (i = 0; i < d1[1]['hmd'].length; i++) 
    { 
        xdatahmd[i] = d1[1]['hmd'][i]['FromTime'];
        ydatahmd[i] = parseInt(d1[1]['hmd'][i]['CurReading']); 
        
      
    }
    Highcharts.chart('container_temp', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Temperature'
        },
       
        xAxis: {
            categories: xdata
        },
        yAxis: {
            title: {
                text: 'Temperature oC'
            },
                      tickInterval: 10,
                      min:0,
                      max:60     

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Temperature',
            data: ydata
        }]
    });

    Highcharts.chart('container_hmd', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Humidity'
        },
       
        xAxis: {
            categories: xdatahmd
        },
        yAxis: {
            title: {
                text: 'Humidity %RH'
            },
          tickInterval: 10,
                      min:0,
                      max:100   

        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'Humidity',
            data: ydatahmd
        }]
    });

    Highcharts.chart('container_co', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'CO2'
        },
       
        xAxis: {
            categories: xdataco
        },
        yAxis: {
            title: {
                text: 'CO2'
            }
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            }
        },
       
        series: [{
            name: 'CO2',
            data: ydataco
        }]
    });
    // iaq data end
// $('.bxslider555').bxSlider({
  // minSlides: 2,
  // maxSlides: 4,
  // slideWidth: 300,
  // slideMargin: 0,
  // responsive: false
// });

// $( window ).resize(function () {
  // console.log('rs');
  // bxSlider.reloadSlider();
// });
 function em(id){   
    $('.em-disc'+id).toggle('slow'); 
    $('.em'+id).hide();
    $('.em-hide'+id).show();
 }
 function device(a){
    if($( "#devicebox"+a ).is( ":visible" ))
        {
            $('#devicebox'+a).toggle('slow'); 
            $("#device"+a).addClass("Expnd");
        }
        else if($( "#devicebox"+a ).is( ":hidden" ))
        {
            $('#devicebox'+a).toggle('slow'); 
            $("#device"+a).removeClass("Expnd");
        }
}

function deviceall(){
    if($( ".deviceall" ).is( ":visible" ))
        {
            $('.device').toggle('slow'); 
            $(".deviceall").addClass("Expnd");
        }
        else if($( ".deviceall" ).is( ":hidden" ))
        {
            $('.device').toggle('slow'); 
            $(".deviceall").removeClass("Expnd");
        }
    //$('.device').hide();
}
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
 </script>  
</html>

