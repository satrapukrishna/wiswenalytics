<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Water Meter Consumption Report</span>
<table id="list" class="RprtTbl">
			<tr> 
			
			<th colspan='4' >Water Meter Consumption Report</th> 
			</tr>
	<tr>
		<th>S. No.</th>
		<th>Meter</th>
		<!-- <th>location</th> -->
		<th>Date/ Hours</th>
		<th>Inflow</th>
	</tr>
	<?php $k=0; for($j=0;$j<count($flowdata);$j++){ 
		for($i=0;$i<count($flowdata[$j]['consolidate']);$i++){?>
		<tr>
			<td><?php echo $flowdata[$j]['consolidate'][$i]['sno']; ?></td>
			<td><?php echo $flowdata[$j]['consolidate'][$i]['meter']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $flowdata[$j]['consolidate'][$i]['date']."/".date('l', strtotime($flowdata[$j]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $flowdata[$j]['consolidate'][$i]['consumption']; ?>KL</td>			
		</tr>
	<?php $k++; }}?>
</table>