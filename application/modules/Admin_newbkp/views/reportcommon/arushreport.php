<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<table id="list" class="RprtTbl">
			
	<tr>
		
		<th>Year</th>
		<th>Month</th>
		<th>Day</th>
		<th>Hour</th>
		<?php for($j=0;$j<count($energy_meters_data[0][0]['data']);$j++){ ?>
			<th><?php echo $energy_meters_data[0][0]['data'][$j]['meter'] ?>(kwh)</th>
			<?php }?>
	</tr>
	<?php for($j=0;$j<count($energy_meters_data);$j++){ 
		for($i=0;$i<count($energy_meters_data[$j]);$i++){?>
		<tr>
			<td><?php echo $energy_meters_data[$j][$i]['year']; ?></td>
			<td><?php echo $energy_meters_data[$j][$i]['month']; ?></td>
			<td><?php echo $energy_meters_data[$j][$i]['date']; ?></td>
			<td><?php echo $energy_meters_data[$j][$i]['hour']; ?></td>
			<?php for($m=0;$m<count($energy_meters_data[$j][$i]['data']);$m++){ ?>
				<td><?php echo $energy_meters_data[$j][$i]['data'][$m]['cons']; ?></td>
				<?php }?>
						
		</tr>
	<?php }}?>
</table>