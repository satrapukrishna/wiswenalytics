<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl">Energy Meter Consumption Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Meter</th>
			<!-- <th>location</th> -->
			<th>Date/Hours	</th>
			<th>Consumption</th>
		</tr>
	</thead>
	<tbody>
		<?php for($j=0;$j<count($energydata['consolidate']);$j++){ 
			for($i=0;$i<count($energydata['consolidate'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['consolidate'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['consolidate'][$j][$i]['date']."/".date('l', strtotime($energydata['consolidate'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['consolidate'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
	</tbody>
</table>