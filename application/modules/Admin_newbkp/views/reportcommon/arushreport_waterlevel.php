<?php //print_r($waterlevel_data);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Water Level Report</span>
<table id="list" class="RprtTbl">
			
	<tr>
		
		<th>Year</th>
		<th>Month</th>
		<th>Day</th>
		<th>Hour</th>
		<?php for($j=0;$j<count($waterlevel_data[0][0]['data']);$j++){ ?>
			<th><?php echo $waterlevel_data[0][0]['data'][$j]['meter'] ?>(KL)</th>
			<?php }?>
	</tr>
	<?php for($j=0;$j<count($waterlevel_data);$j++){ 
		for($i=0;$i<count($waterlevel_data[$j]);$i++){?>
		<tr>
			<td><?php echo $waterlevel_data[$j][$i]['year']; ?></td>
			<td><?php echo $waterlevel_data[$j][$i]['month']; ?></td>
			<td><?php echo $waterlevel_data[$j][$i]['date']; ?></td>
			<td><?php echo $waterlevel_data[$j][$i]['hour']; ?></td>
			<?php for($m=0;$m<count($waterlevel_data[$j][$i]['data']);$m++){ ?>
				<td><?php echo $waterlevel_data[$j][$i]['data'][$m]['level']; ?></td>
				<?php }?>
						
		</tr>
	<?php }}?>
</table>