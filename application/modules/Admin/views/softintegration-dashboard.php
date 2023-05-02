
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	.box1{width:30%;float:left;border-radius: 10px;border: 1px solid #ccc;margin-top:20px;margin-right:20px;padding-left:10px;padding-top:10px;}
	
	.box3{width: 80%;
    height: 188px;
    border-radius: 10px;
    border: 1px solid #ccc;
    padding: 50% 0px;
    text-align: center;
    font: 600 18px 'Open Sans'!important;
    color: #3c8dbc;
	background-color:#fff;
	float:left}
	
	.box2{width: 50%;
    height: 190px;
    border-radius: 10px;
	padding-top:-2px;
    border: 1px solid #ccc;
	background-color:#f3f3f3;float:left;
	}
	.box4{padding: 60% 0px;}
	.box4 i{font-size:24px;padding-left:6px;}
	.box5{width:50%;padding-left:10px;float:left}
	.box5 h4{font: 600 16px 'Open Sans'!important;}
	.inner-box{background-color: #f3f3f3;    
    border-bottom-right-radius: 10px;
    border-top-left-radius: 10px;
    width: 100%;
    height: 123px;}
	.inner-box ul{margin: 0px;
    padding: 0px;}
	
	.inner-box ul li{list-style: none;
    padding: 5px;
    border-bottom: 1px solid #d8d0d0;color:#928585}
	.status-on{
	display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 3px 5px!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
   
    text-align: center!important;
}
.status-off{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 3px 5px!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    
    text-align: center!important;
}
	
	.subhead{font-size:12px;color:#9c9494;border-bottom:1px solid #eae5e5;margin-top:10px;padding-bottom:5px}
	.head-h44{text-align:left;margin:0px;padding:0px;background-color: #fff;
    font: 600 16px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 0px solid #ddd;}
	.toilet-head1{ text-align:center;font: 600 13px 'Open Sans'!important; color:#3c8dbc}
	
	.small-box1{margin-top:20px;width:23.5%;float:left;border:1px solid #eae5e5;border-radius: 10px;padding:5px;margin-right:10px;}
	.head-h4{margin:0px;padding:10px;background-color: #eee;
    font: 800 14px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 1px solid #ddd;}
	.inner_collaps{float: right;
    background-color: #367fa8;
    font: 600 12px 'Open Sans';
    color: #fff;
    margin: 14px 30px 0 0;
    padding: 7px 15px 7px 15px;
    cursor: pointer;
    border-radius: 30px;
    margin-top: -35px;
    margin-right: 5px;
	}
	.inner_collaps:before{
	content: 'Collapse';
    }
	.Expndd:before {
    content: 'Expand!!'!important;
	}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.SctnVwAll{margin: 10px 10px 0 0;}
	
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="water" />
		
		</div>
		
		
			
			<!-- Ventilator start -->
             <div class="DshBrdSctn" style="padding: 10px 30px 25px 38px;">
                <div class="DshBrdSctnTtl" id="lifts">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/admin/images/lift.png" width="40" /> &nbsp;Lifts</span>
                   
                    <span class="SctnVw Cllps dev" onclick="device(558)" id="device558"></span>
                     <span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
<!--                     <span class="SctnVwAll Cllps FA" id="collapseall"></span>
 -->                </div>
					<div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;padding:15px;border-bottom: 1px solid #d0cfcf;">
						<h4 class="head-h44">Tower 1</h4>
						<div class="subhead"></div>
						<div class="box1">
							<div class="box2">
								<div class="box3">
								Floor<br/>10
								</div>
								<div class="box4">
								<i class="fa fa-caret-up" aria-hidden="true"></i><br/>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>							
							</div>
							<div class="box5">
								<h4>Lift - 01</h4>
								<span class="status-on">Working</span>
								<span class="status-off">ARD</span><br/><br/>
								<div class="inner-box">
								<ul>
								<li>Door  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Closed</li>
								<li>Moving  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</li>
								<li>Floor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</li>
								</div>
							</div>
						</div>
						<div class="box1">
							<div class="box2">
								<div class="box3">
								Floor<br/>8
								</div>
								<div class="box4">
								<i class="fa fa-caret-up" aria-hidden="true"></i><br/>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>							
							</div>
							<div class="box5">
								<h4>Lift - 02</h4>
								<span class="status-on">Working</span>
								<span class="status-off">ARD</span><br/><br/>
								<div class="inner-box">
								<ul>
								<li>Door  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Closed</li>
								<li>Moving  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Up</li>
								<li>Floor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8</li>
								</div>
							</div>
						</div>
						<div class="box1">
							<div class="box2">
								<div class="box3">
								Floor<br/>4
								</div>
								<div class="box4">
								<i class="fa fa-caret-up" aria-hidden="true"></i><br/>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>							
							</div>
							<div class="box5">
								<h4>Lift - 03</h4>
								<span class="status-off">Not Working</span>
								<span class="status-on">ARD</span><br/><br/>
								<div class="inner-box">
								<ul>
								<li>Door  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open</li>
								<li>Moving  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</li>
								<li>Floor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4</li>
								</div>
							</div>
						</div>
						<div style="clear:both"></div><br/><br/>
					</div>
					
					<div class="DshBrdSctnDtls device devicebox558"  style="background-color:#fff;padding:15px;border-bottom: 1px solid #d0cfcf;">
						<h4 class="head-h44">Tower 1</h4>
						<div class="subhead"></div>
						<div class="box1">
							<div class="box2">
								<div class="box3">
								Floor<br/>10
								</div>
								<div class="box4">
								<i class="fa fa-caret-up" aria-hidden="true"></i><br/>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>							
							</div>
							<div class="box5">
								<h4>Lift - 01</h4>
								<span class="status-on">Working</span>
								<span class="status-off">ARD</span><br/><br/>
								<div class="inner-box">
								<ul>
								<li>Door  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Closed</li>
								<li>Moving  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</li>
								<li>Floor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</li>
								</div>
							</div>
						</div>
						<div class="box1">
							<div class="box2">
								<div class="box3">
								Floor<br/>8
								</div>
								<div class="box4">
								<i class="fa fa-caret-up" aria-hidden="true"></i><br/>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>							
							</div>
							<div class="box5">
								<h4>Lift - 02</h4>
								<span class="status-on">Working</span>
								<span class="status-off">ARD</span><br/><br/>
								<div class="inner-box">
								<ul>
								<li>Door  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Closed</li>
								<li>Moving  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Up</li>
								<li>Floor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8</li>
								</div>
							</div>
						</div>
						<div class="box1">
							<div class="box2">
								<div class="box3">
								Floor<br/>4
								</div>
								<div class="box4">
								<i class="fa fa-caret-up" aria-hidden="true"></i><br/>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>							
							</div>
							<div class="box5">
								<h4>Lift - 03</h4>
								<span class="status-off">Not Working</span>
								<span class="status-off">ARD</span><br/><br/>
								<div class="inner-box">
								<ul>
								<li>Door  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open</li>
								<li>Moving  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</li>
								<li>Floor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4</li>
								</div>
							</div>
						</div>
						<div style="clear:both"></div>
					</div>
            
			   
                
            </div>
            <!-- Ventilation End -->
			
			
		
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
	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EM 01 <span style="font-size:12px">(UPS INCOMER-01)</span></h4>
        </div>
        <div class="modal-body">
			<table class="table">
			  
			  <tbody>
				<tr>
				  <th scope="row">Consumed Active Energy</th>
				  <td>5.0 kWh</td>
				  
				</tr>
				<tr>
				  <th scope="row">Active 3-Phase Power</th>
				  <td>0.0 kWh</td>
				 
				</tr>
				<tr>
				  <th scope="row">Inductive 3-Phase Power</th>
				  <td>0.0 kvarL</td>
				 
				</tr>
				<tr>
				  <th scope="row">Capactive 3-Phase Power</th>
				  <td>0.0 kvarL</td>
				 
				</tr>
				<tr>
				  <th scope="row">Apparent 3-Phase Power</th>
				  <td>0.8 kVA</td>
				 
				</tr>
				<tr>
				  <th scope="row">3-Phase Power Factor</th>
				  <td>42949670.0 PF</td>
				 
				</tr>
				<tr>
				  <th scope="row">Maximum Demand Kw</th>
				  <td>0.0 kw</td>
				 
				</tr>
				<tr>
				  <th scope="row">Maximum Demand kVA</th>
				  <td>0.0 kVA</td>
				 
				</tr>
				<tr>
				  <th scope="row">L1 Phase Voltage</th>
				  <td>229 v</td>
				 
				</tr>
				<tr>
				  <th scope="row">L2 Phase Voltage</th>
				  <td>230 v</td>
				 
				</tr>
				<tr>
				  <th scope="row">L3 Phase Voltage</th>
				  <td>229 v</td>
				 
				</tr>
				<tr>
				  <th scope="row">L1 Current</th>
				  <td>1.5 A</td>
				 
				</tr>
				<tr>
				  <th scope="row">L2 Current</th>
				  <td>0.5 A</td>
				 
				</tr>
				<tr>
				  <th scope="row">L3 Current</th>
				  <td>1.7 A</td>
				 
				</tr>
				<tr>
				  <th scope="row">Frequency</th>
				  <td>50 Hz</td>
				 
				</tr>
				<tr>
				  <th scope="row">Netural Current</th>
				  <td>0.0 A</td>
				 
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
	if($( ".devicebox"+a ).is( ":visible" ))
        {
			// alert("aaaa");
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
			// alert("bbb");
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
        }
}
function device1(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
            // $(".inner_collaps").addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
            // $(".inner_collaps").removeClass("Expndd");
        }
}
function deviceall(){
	if($( ".device" ).is( ":visible" ))
        {
			
            $('.device').hide('slow'); 
            $(".deviceall").addClass("Expnd");
			$(".dev").addClass("Expndd");
        }
        else if($( ".device" ).is( ":hidden" ))
        {
			
            $('.device').show('slow'); 
            $(".deviceall").removeClass("Expnd");
			$(".dev").removeClass("Expndd");
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

