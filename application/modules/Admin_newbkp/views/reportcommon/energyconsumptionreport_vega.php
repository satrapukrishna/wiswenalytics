<?php //echo json_encode($energy_meters_data[0][0]['ename']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='4' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th>S. No.</th>
			<th>Meter</th>
			<th>Date</th>
			<th>Time	</th>
			<th>Consumption</th>
		</tr>
	</thead>
	<tbody>
		<?php for($j=0;$j<count($energy_meters_data);$j++){ 
			for($i=0;$i<count($energy_meters_data[$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energy_meters_data[$j][$i]['ename']; ?></td>
				<td><?php echo $energy_meters_data[$j][$i]['date']; ?></td>
				<td><?php echo $energy_meters_data[$j][$i]['time']; ?></td>
				<td><?php echo $energy_meters_data[$j][$i]['todaycons']; ?>Kwh</td>
			</tr>
			<?php  }}?>
	</tbody>
</table>