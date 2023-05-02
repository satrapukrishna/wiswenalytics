<?php //print_r($flowdata);die(); ?>
<table class="RprtTbl" id="list">
			<tr> 
			
			<th colspan='11' >Switch Status Running Report</th> 
			</tr>
	<tr>
		<th>S. No.</th>
		<th>Meter</th>
		<!-- <th>Towers</th> -->
		<th>Date</th>
		<th>Day</th>
		<th>ON Times Morning</th>
		<th>Running Hours Morning </th>
		<th>ON Times Evening</th>
		<th>Running Hours Evening</th>
		<th>Total Running Hours</th>
		
	</tr>
	
	<?php for($k=0;$k<count($switchcontrol_data);$k++){ 
		for($i=0;$i<count($switchcontrol_data[$k]);$i++){?>
		<tr>
			<td><?php echo $k+1; ?></td>
			<td><?php echo $switchcontrol_data[$k][$i]['hardware_name']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $switchcontrol_data[$k][$i]['date'] ?></td>
			<td><?php echo date('l', strtotime($switchcontrol_data[$k][$i]['date'])); ?></td>
			<td><?php echo $switchcontrol_data[$k][$i]['non_emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data[$k][$i]['non_emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data[$k][$i]['non_emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data[$k][$i]['non_emergency_running_evng']; ?></td>
			<td><?php echo $switchcontrol_data[$k][$i]['non_emergency_running_min_tot_hr']; ?></td>
			
		</tr>
	<?php  }}?>
	
</table>