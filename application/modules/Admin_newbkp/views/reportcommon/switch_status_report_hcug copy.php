<?php //print_r($flowdata);die(); ?>
<table class="RprtTbl" id="list">
			<tr> 
			
			<th colspan='11' >Motor Running Report</th> 
			</tr>
	<tr>
		<th>S. No.</th>
		<th>Meter</th>
		<!-- <th>Towers</th> -->
		<th>Date</th>
		<th>Day</th>
		<th>Running Hours</th>
		
	</tr>
	
	<?php for($k=0;$k<count($switch_status_data);$k++){ 
		for($i=0;$i<count($switch_status_data[$k]);$i++){?>
		<tr>
			<td><?php echo $k+1; ?></td>
			<td><?php echo $switch_status_data[$k][$i]['meter']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $switch_status_data[$k][$i]['date'] ?></td>
			<td><?php echo date('l', strtotime($switch_status_data[$k][$i]['date'])); ?></td>
			<td><?php echo $switch_status_data[$k][$i]['runn_h']; ?></td>
			
			
		</tr>
	<?php  }}?>
	
</table>