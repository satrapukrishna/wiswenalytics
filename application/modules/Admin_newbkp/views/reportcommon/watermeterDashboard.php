<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl">Water Meter Dashboard Report</span>
<table id="list" class="RprtTbl">
<tr>
    <th rowspan="3">SNo</th>
    <th rowspan="3">Date</th>
    <th colspan="3">Opening</th>
    <th colspan="3">Water IN</th>
    <th colspan="3">Closing</th>
    <th rowspan="3">Consumption</th>
  </tr>
  <tr>
    <th colspan="2">Sumps</th>
    <th rowspan="2">Over Head Tanks</th>
    <th rowspan="2">BMC</th>
    <th rowspan="2">Tanker</th>
    <th rowspan="2">RO</th>
    <th colspan="2">Sumps</th>
    <th rowspan="2">Over Head Tanks</th>
  </tr>
  <tr>
  	<th>Fire</th>
    <th>Domestic</th>
    <th>Fire</th>
    <th>Domestic</th>
   </tr>
	<?php for($j=0;$j<count($water_dashboard_report);$j++){ 
		?>
		<tr>
			<td><?php echo $j+1; ?></td>
			<td><?php echo $water_dashboard_report[$j]['date']."/".date('l', strtotime($water_dashboard_report[$j]['date'])); ?></td>
			<td><?php echo $water_dashboard_report[$j]['fire_open_sum']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['domestic_open_sum']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['overhead_open_sum']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['bmc_in']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['tanker_in']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['ro_in']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['fire_close_sum']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['domestic_close_sum']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['overhead_close_sum']; ?></td>
			<td><?php echo $water_dashboard_report[$j]['total_consume']; ?></td>			
		</tr>
	<?php }?>
</table>