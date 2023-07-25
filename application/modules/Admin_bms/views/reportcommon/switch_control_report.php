<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Switch Control Report</span>
<table class="RprtTbl" id="list">
			<tr> 
			
			<th colspan='11' >Switch Control Tower A Running Report</th> 
			</tr>
	<tr>
		<th>S. No.</th>
		<th>Meter</th>
		<!-- <th>Towers</th> -->
		<th>Date</th>
		<th>Emergency Running Times Morning</th>
		<th>Emergency Running Hours Morning </th>
		<th>Emergency Running Times Evening</th>
		<th>Emergency Running Hours Evening</th>
		<th>Non-Emergency Running Times Morning</th>
		<th>Non-Emergency Running Hours Morning </th>
		<th>Non-Emergency Running Times Evening</th>
		<th>Non-Emergency Running Hours Evening</th>
		
	</tr>
	<?php for($k=0;$k<count($switchcontrol_data['Tower-A']);$k++){ 
		for($i=0;$i<count($switchcontrol_data['Tower-A'][$k]);$i++){?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['hardware_name']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['date']."/".date('l', strtotime($switchcontrol_data['Tower-A'][$k][$i]['date'])); ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['emergency_running_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['non_emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['non_emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['non_emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-A'][$k][$i]['non_emergency_running_evng']; ?></td>
			
		</tr>
	<?php  }}?>

	<tr> 
			
			<th colspan='11' >Switch Control Tower B Running Report</th> 
			</tr>
	
	<?php for($k=0;$k<count($switchcontrol_data['Tower-B']);$k++){ 
		for($i=0;$i<count($switchcontrol_data['Tower-B'][$k]);$i++){?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['hardware_name']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['date']."/".date('l', strtotime($switchcontrol_data['Tower-B'][$k][$i]['date'])); ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['emergency_running_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['non_emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['non_emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['non_emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-B'][$k][$i]['non_emergency_running_evng']; ?></td>
			
		</tr>
	<?php  }}?>

	
	<tr> 
			
			<th colspan='11' >Switch Control Tower C Running Report</th> 
			</tr>
	
	<?php for($k=0;$k<count($switchcontrol_data['Tower-C']);$k++){ 
		for($i=0;$i<count($switchcontrol_data['Tower-C'][$k]);$i++){?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['hardware_name']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['date']."/".date('l', strtotime($switchcontrol_data['Tower-C'][$k][$i]['date'])); ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['emergency_running_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['non_emergency_running_start_end']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['non_emergency_running']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['non_emergency_running_start_end_evng']; ?></td>
			<td><?php echo $switchcontrol_data['Tower-C'][$k][$i]['non_emergency_running_evng']; ?></td>
			
		</tr>
	<?php  }}?>
</table>