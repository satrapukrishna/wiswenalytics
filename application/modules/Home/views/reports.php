<html>
<head>
    <?php $this->load->view('css3') ?>
<style>	
img {
vertical-align: middle;
margin-right:10px;}
.form-control{float:left}
table td,table th{border-right:1px solid #ccc}
table th,table th{text-align:center}

.loader {
  border: 16px solid #e4e4e4;
  border-radius: 50%;
  border-top: 16px solid #5bc0de;
  margin-left: 50%;
  margin-top:20px;
  width: 50px;
  height: 50px;
  -webkit-animation-duration: 7s;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
	</style>
<body >
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('left_menu_water_quality') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
		<div class="DshBrdSctn">
			<div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h3>
                   <strong>Water Quality Report</strong>
                  </h3><br/>
                </section>
				<section class="content" >
					<span id="error" style="color:red"></span>
					<form name="reports" id="myForm" action="<?php echo site_url("Home/reports/")?>" method="post" onSubmit="return formValidation();">
						
						<div class="row meter-top col-md-12">
                           
							
							<input class="form-control" type="date" value="<?php echo date('m/d/Y') ?>"  name="fromdate" id="fromdate" placeholder="Enter Date">
							
							<button type="submit" id="filter" class="btn btn-success">Filter</button>
							<a href="<?php echo site_url('Home/reports') ?>" class="btn btn-info">Reset</a>
							
						  </div>
					</form>
					<div class="row meter-top col-md-12">
					<div class="loader" id="loader" style="display: none;"></div>
					</div>
					
					
					
				</section>
				<div>
						<div id="container_ec" style="width: 100%"></div>
					<div id="container_tds"></div>
					<div id="container_ph"></div>
					<div id="container_temp"></div>
					</div>
			</div>
		</div>
		
        
            
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />
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
<script >
data1=<?php echo json_encode($data); ?>;
console.log(data1);

    

    var xdataec = new Array();
    var ydataec = new Array();

    var xdatatds = new Array();
    var ydatatds = new Array();

    var xdataph = new Array();
    var ydataph = new Array();

    var xdatatemp = new Array();
    var ydatatemp = new Array();
    //var jsondata = JSON.parse(data);
    for (i = 0; i < data1[0]["EC"]["total"].length; i++) 
    { 
        xdataec[i] = data1[0]["EC"]["total"][i]['dtime'];
        ydataec[i] = parseFloat(data1[0]["EC"]["total"][i]['value']); 
        
      
    }
     for (i = 0; i < data1[2]["TDS"]["total"].length; i++) 
    { 
        xdatatds[i] = data1[2]["TDS"]["total"][i]['dtime'];
        ydatatds[i] = parseFloat(data1[2]["TDS"]["total"][i]['value']); 
        
      
    }
    for (i = 0; i < data1[1]["pH"]["total"].length; i++) 
    { 
        xdataph[i] = data1[1]["pH"]["total"][i]['dtime'];
        ydataph[i] = parseFloat(data1[1]["pH"]["total"][i]['value']); 
        
      
    }
    for (i = 0; i < data1[3]["Temperature"]["total"].length; i++) 
    { 
        xdatatemp[i] = data1[3]["Temperature"]["total"][i]['dtime'];
        ydatatemp[i] = parseFloat(data1[3]["Temperature"]["total"][i]['value']); 
        
      
    }
    Highcharts.chart('container_ec', {
        chart: {
            type: 'line'
        },credits: {
                          enabled: false
                      },
        title: {
            text: 'EC '
        },
       
        xAxis: {
            categories: xdataec
        },
        yAxis: {
            title: {
                text: 'ms'
            },
                      tickInterval: 0.15,
                      min:0,
                      max:1     

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
            name: 'EC',
            data: ydataec
        }]
    });
    Highcharts.chart('container_tds', {
        chart: {
            type: 'line'
        },credits: {
                          enabled: false
                      },
        title: {
            text: 'TDS '
        },
       
        xAxis: {
            categories: xdatatds
        },
        yAxis: {
            title: {
                text: 'ppt'
            },
                      tickInterval: 0.15,
                      min:0,
                      max:1     

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
            name: 'TDS',
            data: ydatatds
        }]
    });
    Highcharts.chart('container_ph', {
        chart: {
            type: 'line'
        },credits: {
                          enabled: false
                      },
        title: {
            text: 'pH '
        },
       
        xAxis: {
            categories: xdataph
        },
        yAxis: {
            title: {
                text: 'pH'
            },
                      tickInterval: 2,
                      min:0,
                      max:10     

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
            name: 'pH',
            data: ydataph
        }]
    });
    Highcharts.chart('container_temp', {
        chart: {
            type: 'line'
        },credits: {
                          enabled: false
                      },
        title: {
            text: 'Temperature '
        },
       
        xAxis: {
            categories: xdataph
        },
        yAxis: {
            title: {
                text: 'degrees'
            },
                      tickInterval: 2,
                      min:0,
                      max:50     

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
            data: ydatatemp
        }]
    });
</script>   

<script>


function formValidation()
{
var multiMeter = $("#multiMeter").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
// alert(multiMeter);return false;
if(multiMeter==''){
	$('#error').html("plaese select Meter");
	return false;	
}else if(fromdate==''){
	$('#error').html("plaese select Date");
	return false;	
}


$('#loader').show();
var ele = $("#loader");
setTimeout(function() { ele.hide(); }, 9000);

return true;
}

// $('#export').click(function(){
	// $("#myForm").submit(); 
	// location.reload(true);
// });


	
 </script>	
</html>