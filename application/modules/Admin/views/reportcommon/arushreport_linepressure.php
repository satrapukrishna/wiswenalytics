<?php //print_r($waterlevel_data);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Pressure Report</span>
<table id="list" class="RprtTbl">
			
	<tr>
		
		<th>Year</th>
		<th>Month</th>
		<th>Day</th>
		<th>Hour</th>
		<?php for($j=0;$j<count($pressure_data[0][0]['data']);$j++){ ?>
			<th><?php echo $pressure_data[0][0]['data'][$j]['meter'] ?> Running Minutes</th>
			<th>Pressure</th>
			<?php }?>
	</tr>
	<?php for($j=0;$j<count($pressure_data);$j++){ 
		for($i=0;$i<count($pressure_data[$j]);$i++){?>
		<tr>
			<td><?php echo $pressure_data[$j][$i]['year']; ?></td>
			<td><?php echo $pressure_data[$j][$i]['month']; ?></td>
			<td><?php echo $pressure_data[$j][$i]['date']; ?></td>
			<td><?php echo $pressure_data[$j][$i]['hour']; ?></td>
			<?php for($m=0;$m<count($pressure_data[$j][$i]['data']);$m++){ ?>
				<td><?php echo $pressure_data[$j][$i]['data'][$m]['run']; ?></td>
				<td><?php echo $pressure_data[$j][$i]['data'][$m]['pressure']; ?></td>
				<?php }?>
						
		</tr>
	<?php }}?>
</table>