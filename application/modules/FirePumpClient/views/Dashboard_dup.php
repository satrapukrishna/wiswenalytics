<?php 
// header("Access-Control-Allow-Origin: *");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/asset/prkhospitalasset/CSS/SliderCSS.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/asset/prkhospitalasset/CSS/StyleSheet.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/asset/prkhospitalasset/Scripts/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url(); ?>/asset/prkhospitalasset/Scripts/JsSlider.js"></script>
    <script src="<?php echo base_url(); ?>/asset/prkhospitalasset/Scripts/JavaScript.js"></script>
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
    function fetchDGSetData()
    {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '-' + mm + '-' + dd; 

      var urlStringWaterLevel = "<?php echo base_url();  ?>MyVihanga/getMyhomeData";
    $.ajax({
        url:urlStringWaterLevel,
        type : 'GET',
        async: true,
        data: {date:today},
        success: function(data){
          console.log("success"+data);
          displayDomesticData(data);
        }
      });

        var urlString = "http://chekhra.net/chekhranew/Generators/chekhraMaps/show_all_prk.php?&generatorsId=SISM02KPET&clientId=438";
        $.ajax({
            url:urlString,
            type : 'GET',
            async: true,
            success: function(data){
              // console.log("success"+data);
              displayDGSetData(data);
            }
          });
    }
function displayDomesticData(data)
{
    var d = JSON.parse(data);
    var $container = $("#tanks");
     var v, div="";
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
   
         var volume=Math.round(((d[i]['Consumption'])/142000)*100);
   
  
    v='Liquid l-'+volume;
     // var div1="<div class='bxslider' ><div><div class='SctnDtlsHldr'><div class='SldrCntnr'><div class='SctnDtls WtrTnkLvl'><div class='TnksHldr'><div class='LftHldr'><div class='LiquidTank'><div class='"+v+"'></div></div></div><div class='RgtHldr'><div class='LiquidTank Smll'><div class='"+v+"'></div> <span class='LiquidStatus'>'"+i+"'%</span></div></div></div><span class='SctnTtl'>Domestic Tank</span><ul class='SctnDtlsGrdTbl'><li><div class='ClLft'>Total Capacity</div><div class='ClRgt'>500 Kl</div></li><li><div class='ClLft'>Current Level</div><div class='ClRgt'>375 KL</div> </li><li><div class='ClLft'>Filled</div><div class='ClRgt'>75%</div></li> </ul></div></div></div></div></div>";
   
   // $('#tanks').append(div1);
// $("#tanks").after(div);
  div="<div><div class='SctnDtlsHldr'><div class='SldrCntnr'><div class='SctnDtls WtrTnkLvl'><div class='TnksHldr'><div class='LftHldr'><div class='LiquidTank'><div class='Liquid l-70'></div></div></div><div class='RgtHldr'><div class='LiquidTank Smll'><div class='" + v + "'></div><span class='LiquidStatus'>70%</span></div></div></div><span class='SctnTtl'>Domestic Tank</span><ul class='SctnDtlsGrdTbl'><li><div class='ClLft'>Total Capacity</div><div class='ClRgt'>500 Kl</div></li><li><div class='ClLft'>Current Level</div><div class='ClRgt'>375 KL</div></li><li><div class='ClLft'>Filled</div><div class='ClRgt'>75%</div></li></ul></div></div></div></div></div>";



     
     
     // $(".Liquid").addClass("l-70");
}
//div+="</div>";
$container.append(div);
  }
    function displayDGSetData(data)
    {
        var d1 = JSON.parse(data);
        console.log(d1);
        var $dgcontainer = $("#dgset");
        // var div1;
        // alert(d1.length);fuelConsumed ruhnnin fuelAdded currentFuel fuelTheft
        for (var i = 0; i < d1.length; i++)
        {
            var dglevel=d1[i]['currentFuel'];
            div1='<div class="SctnDtlsHldr"><div class="SldrCntnr"><div class="SctnDtls DGGnrtrHldr"><span class="SctnTtl">DG Generator - 01</span><div class="DGCol-1"><ul class="SctnDtlsGrdTbl"><li class="NoClr"><div class="ClLft">Diesel Generator</div><div class="ClRgt">'+d1[i]['status']+'</div></li><li><div class="ClLft">Fuel Consumption</div><div class="ClRgt">'+d1[i]['fuelConsumed']+'</div></li><li><div class="ClLft">Running Time</div><div class="ClRgt">'+d1[i]['ruhnnin']+'</div></li><li><div class="ClLft">Fuel Add</div><div class="ClRgt">'+d1[i]['fuelAdded']+'</div></li><li><div class="ClLft">Available Fuel</div><div class="ClRgt">'+d1[i]['currentFuel']+'</div></li><li><div class="ClLft">Fuel Removed</div><div class="ClRgt">'+d1[i]['fuelTheft']+'</div</li></ul></div><div class="DGCol-2"><div class="LiquidTank Smll"><div class="Liquid l-80"></div></div></div><div class="DGCol-3"><div class="LiquidTank Smll"><div class="Liquid Low"></div><div class="Liquid Medium"></div><div class="Liquid High"></div><span class="LowTxt">Low</span><span class="MedTxt">Medium</span><span class="HghTxt">High</span></div></div></div></div></div>';
            $dgcontainer.append(div1);
        }
    }

    </script>
</head>
<body onload="fetchDGSetData()">
    <div id="MnCtnr" class="DshMnCtnr">
        <div class="DshBrdLnk">
            <div class="BrndHldr">
                <span class="BrndNm">PRK Hospitals</span>
            </div>
            <div class="DshBrdLnkCntr">
                <ul class="LnkHldr FrstLvl">
                    <li>
                        <a href="" class="Lnk Arr Slct Dshbrd"><span class="Txt">Dashboard</span></a>
                        <ul class="ScndLvl Active">
                            <li>
                                <a href="" class="Lnk Arr Slct WtrTnk"><span class="Txt">Water Tank</span></a>
                            </li>
                            <li>
                                <a href="#fmdiv2" class="Lnk Arr Slct FlwMtr"><span class="Txt">Flow Meters</span></a>
                            </li>
                            <li>
                                <a href="#dgdiv2" class="Lnk Arr Slct DGSt"><span class="Txt">DG Set</span></a>
                            </li>
                            <li>
                                <a href="#emdiv2" class="Lnk Arr Slct EnrgMtr"><span class="Txt">Energy Meter</span></a>
                            </li>
                            <li>
                                <a href="#fpdiv2" class="Lnk Arr Slct FrPmp"><span class="Txt">Fire Pump</span></a>
                            </li>
                            <li>
                                <a href="#lpgdiv2" class="Lnk Arr Slct LPGCnn"><span class="Txt">LPG Connection</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="DshBrdHdr">

        </div>
        <div class="DshBrdCtnr">
            <!-- Water tank level code starts  -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="wldiv2">
                    <span class="TxtTtl WtrTnk">Water Tank Levels</span>
                    <span class="SctnVw Cllps" id="waterlevel"></span>
                    <span class="SctnVwAll Cllps" id="collapseall"></span>
                </div>
                <div class="DshBrdSctnDtls" id="tanks">
                    <!-- <div class="bxslider" > 
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls WtrTnkLvl">
                                        <div class="TnksHldr">
                                            <div class="LftHldr">
                                                <div class="LiquidTank">
                                                   <div class="Liquid l-70"></div>
                                                </div>
                                            </div>
                                            <div class="RgtHldr">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-70"></div>
                                                    <span class="LiquidStatus">70%</span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <span class="SctnTtl">Domestic Tank</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Capacity</div>
                                                <div class="ClRgt">500 Kl</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Current Level</div>
                                                <div class="ClRgt">375 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Filled</div>
                                                <div class="ClRgt">75%</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls WtrTnkLvl">
                                        <div class="TnksHldr">
                                            <div class="LftHldr">
                                                <div class="LiquidTank">
                                                    <div class="Liquid l-20"></div>
                                                </div>
                                            </div>
                                            <div class="RgtHldr">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-20"></div>
                                                    <span class="LiquidStatus">20%</span>
                                                </div>

                                            </div>
                                        </div>
                                        <span class="SctnTtl">Flush Tank</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Capacity</div>
                                                <div class="ClRgt">500 Kl</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Current Level</div>
                                                <div class="ClRgt">375 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Filled</div>
                                                <div class="ClRgt">75%</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls WtrTnkLvl">
                                        <div class="TnksHldr">
                                            <div class="LftHldr">
                                                <div class="LiquidTank">
                                                    <div class="Liquid l-70"></div>
                                                </div>
                                            </div>
                                            <div class="RgtHldr">
                                                <div class="LiquidTank Smll">
                                                    <div class="Liquid l-70"></div>
                                                    <span class="LiquidStatus">70%</span>
                                                </div>

                                            </div>
                                        </div>
                                        <span class="SctnTtl">Domestic Tank</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Capacity</div>
                                                <div class="ClRgt">500 Kl</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Current Level</div>
                                                <div class="ClRgt">375 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Filled</div>
                                                <div class="ClRgt">75%</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> -->
                </div>
            </div>
            <!-- Water tank level code ends here -->

            <!-- Flow meters code starts here -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="fmdiv2">
                    <span class="TxtTtl FlwMtr">Flow Meters</span>
                    <span class="SctnVw Cllps" id="flowcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="flowmeters">
                    <div class="bxslider" id="">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <span class="SctnTtl">Flow meter - 01</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">200 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">900 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">1985 KL</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <span class="SctnTtl">Flow meter - 02</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">200 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">900 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">1985 KL</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls FlwMtrHldr">
                                        <div class="FlwMtrImgHldr">
                                            <img class="FlwMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <span class="SctnTtl">Flow meter - 03</span>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">200 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">900 KL</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">1985 KL</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- flow meters code ends here -->

            <!-- DG Set code starts  -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="dgdiv2">
                    <span class="TxtTtl DGSt">DG Set</span>
                    <span class="SctnVw Cllps" id="dgcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls" id="dgset">
                   <!--  <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls DGGnrtrHldr">
                                        <span class="SctnTtl">DG Generator - 01</span>
                                        <div class="DGCol-1">
                                            <ul class="SctnDtlsGrdTbl">
                                                <li class="NoClr">
                                                    <div class="ClLft">Diesel Generator</div>
                                                    <div class="ClRgt">On Off</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Consumption</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Running Time</div>
                                                    <div class="ClRgt">15 mins</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Add</div>
                                                    <div class="ClRgt">10 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Available Fuel</div>
                                                    <div class="ClRgt">60 Ltr</div>
                                                </li>
                                                <li>
                                                    <div class="ClLft">Fuel Removed</div>
                                                    <div class="ClRgt">20 Ltr</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="DGCol-2">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid l-70"></div>
                                            </div>
                                        </div>
                                        <div class="DGCol-3">
                                            <div class="LiquidTank Smll">
                                                <div class="Liquid Low"></div>
                                                <div class="Liquid Medium"></div>
                                                <div class="Liquid High"></div>
                                                <span class="LowTxt">Low</span>
                                                <span class="MedTxt">Medium</span>
                                                <span class="HghTxt">High</span>
                                            </div>
                                        </div>
                                        <div class="DGCol-4">
                                            Add Javascript graph here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- DG Set code ends here -->

            <!-- Energy meters code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="emdiv2">
                    <span class="TxtTtl EnrgMtr">Energy Meters</span>
                    <span class="SctnVw Cllps" id="emcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd EnrgyMtr" id="emeter">
                    <div class="DshBrdSctnTtl Innr">
                        <span class="TxtTtl">Floor - 01</span>
                        <span class="SctnVw Cllps"></span>
                        <span class="SctnVwAll Cllps"></span>
                    </div>
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="DshBrdSctnTtl Innr">
                        <span class="TxtTtl">Floor - 02</span>
                        <span class="SctnVw Cllps"></span>
                    </div>
                    <div class="bxslider">
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="SctnDtlsHldr">
                                <div class="SldrCntnr">
                                    <div class="SctnDtls ErgyMtrHldr">
                                        <span class="SctnTtl">Meter - 01</span>
                                        <div class="ErgyMtrImgHldr">
                                            <img class="ErgyMtr" src="<?php echo base_url(); ?>/asset/prkhospitalasset/images/Blank.png" />
                                        </div>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Total Consumption</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Yesterday's Consumption</div>
                                                <div class="ClRgt">50 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Weekly Average</div>
                                                <div class="ClRgt">200 KWH</div>
                                            </li>
                                        </ul>
                                        <ul class="SctnDtlsGrdTbl">
                                            <li>
                                                <div class="ClLft">Extra Details 01</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 02</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 03</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                            <li>
                                                <div class="ClLft">Extra Details 04</div>
                                                <div class="ClRgt">30 KWH</div>
                                            </li>
                                        </ul>
                                        <span class="SctnDtlsGrdTblLnk More"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Energy meters code ends here -->

            <!-- Fire pump code starts  -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl">
                    <span class="TxtTtl FrPmp" id="fpdiv2">Fire Pump</span>
                    <span class="SctnVw Cllps" id="fpcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd FrPmp" id="fpump">
                    <table class="SctnDtlsDualGrd">
                        <tr>
                            <th class="Col-1">

                            </th>
                            <th class="Col-2">
                                Running Status
                            </th>
                            <th class="Col-3">
                                Today
                            </th>
                            <th class="Col-4">
                                Yesterday
                            </th>
                            <th class="Col-5">
                                Last Week
                            </th>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Jocky Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts On"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Hydrant Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Off"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="Col-1">
                                <span class="Txt Ttl">Diesel Pump</span>
                            </td>
                            <td class="Col-2">
                                <span class="Txt MblTtl">Running Status</span>
                                <span class="Txt Stts Auto"></span>
                            </td>
                            <td class="Col-3">
                                <span class="Txt MblTtl">Today</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-4">
                                <span class="Txt MblTtl">Yesterday</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                            <td class="Col-5">
                                <span class="Txt MblTtl">Last Week</span>
                                <span class="Txt">00:00:00 hrs</span>
                            </td>
                        </tr>
                    </table>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 01</span>
                        <span class="MtrVl">36 Kgs</span>
                    </div>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 02</span>
                        <span class="MtrVl">50 Kgs</span>
                    </div>
                    <div class="EnrgyMtrGuge">
                        <span class="Ttl">Meter - 03</span>
                        <span class="MtrVl">156 Kgs</span>
                    </div>
                </div>
            </div>
            <!-- Fire pump code ends here -->

            <!-- LPG Connection code starts -->
            <div class="DshBrdSctn">
                <div class="DshBrdSctnTtl" id="lpgdiv2">
                    <span class="TxtTtl LPGCnn">LPG Connection</span>
                    <span class="SctnVw Cllps" id="lpgcollapse"></span>
                </div>
                <div class="DshBrdSctnDtls WhtBkgrnd LPGCnn" id="lpg">
                    <div class="LPGCnnHldr">
                        <ul class="SctnDtlsGrdTbl">
                            <li>
                                <div class="ClLft">Pressure</div>
                                <div class="ClRgt">100 PSI</div>
                            </li>
                            <li>
                                <div class="ClLft">Todays's Consumption</div>
                                <div class="ClRgt">20 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Yesterday's Consumption</div>
                                <div class="ClRgt">30 Kgs</div>
                            </li>
                            <li>
                                <div class="ClLft">Weekly Average</div>
                                <div class="ClRgt">200 Kgs</div>
                            </li>
                        </ul>
                    </div>
                    <div class="LPGCnnHldr">
                        <span class="Ttl">PSI Bar</span>

                    </div>
                    <div class="LPGCnnHldr">
                        
                    </div>
                </div>
            </div>
            <!-- LPG Connection code ends here -->
        </div>
    </div>
</body>

<script type="text/javascript">

    $('#waterlevel').click(function(event) {
        $('#tanks').toggle();    
    });
    $('#flowcollapse').click(function(event) {
        $('#flowmeters').toggle();     
    });
    $('#dgcollapse').click(function(event) {
        $('#dgset').toggle();        
    });
    $('#emcollapse').click(function(event) {
        $('#emeter').toggle();  
    });
    $('#fpcollapse').click(function(event) {
        $('#fpump').toggle();   
    });
    $('#lpgcollapse').click(function(event) {
        $('#lpg').toggle();       
    });
    $('#collapseall').click(function(event) {
        $('#tanks').toggle();
        $('#flowmeters').toggle();
        $('#dgset').toggle();
        $('#emeter').toggle();
        $('#fpump').toggle();
        $('#lpg').toggle();       
    });



</script>
</html>