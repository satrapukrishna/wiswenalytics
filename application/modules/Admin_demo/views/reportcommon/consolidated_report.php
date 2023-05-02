
<?php
 ?>
<div  class="text-head"> Water Meter Consumption Graph Report</div>
<?php for($p=0;$p<count($flowdata);$p++){ ?>
<div class="container-fluid"  id="container<?php echo $p; ?>" ></div>
<?php }?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    <?php
    for ($k=0; $k < count($flowdata); $k++) { 
    $xdata=array();
    $ydata=array();
    $fulldata=array();
    for($i=0;$i<count($flowdata[$k]);$i++){ 
    array_push($xdata,$flowdata[$k][$i]['date']);
    array_push($ydata,$flowdata[$k][$i]['consumption']);
    
    
    }
    $fulldata['xdata']=$xdata;
    $fulldata['ydata']=$ydata;
    $fulldata['meter']=$flowdata[$k][0]['meter'];
     ?>
    var data=<?php echo json_encode($fulldata); ?>;
    var xdata=data['xdata'];
    var ydata=data['ydata'];
    var meter=data['meter'];
    
Highcharts.chart('container<?php echo $k; ?>', {
    chart: {
        type: 'column'
    },

    credits: {
        enabled: false
    },
    title: {
        text: 'Consumption Report'
    },
    xAxis: {
        categories: xdata,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KL'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
        pointFormat: '<tr><td style="font-size:8px"><b>Inflow:</b> </td>' +
            '<td style="font-size:8px"><b>{point.y} KL</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: meter,
        data: ydata,
        color:'#70a0db'

    }]
});
<?php }?>
</script>
<div  class="text-head"> Water Meter Consumption Report</div>

<table id = "list" cellpadding="10" class="table table-condensed"   style="background:#fff;padding:10px">

	<thead>
							<tr style="font-weight: bold;">
								<th class="text-center">Sno.</th>								
								<th class="text-center">Meter</th>
								<!-- <th class="text-center">location</th> -->
								<th class="text-center">Date/Hours	</th>
								<th class="text-center">Inflow</th>
								
								
								
							</tr>
						</thead>
						<tbody>
							<?php $k=0; for($j=0;$j<count($flowdata);$j++){ 
								for($i=0;$i<count($flowdata[$j]);$i++){?>
								<tr>
								<td class="text-center"><?php echo $k+1; ?></td>
								
								<td class="text-center"><?php echo $flowdata[$j][$i]['meter']; ?></td>
								<!-- <td class="text-center">Tower A</td> -->
								<td class="text-center"><?php echo $flowdata[$j][$i]['date']; ?></td>
								<td class="text-center"><?php echo $flowdata[$j][$i]['consumption']; ?>KL</td>
								
								
								</tr>
								<?php $k++; }}?>
								
								
								
							
						</tbody>
					</table>


                    