<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='4' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th>S. No.</th>
			<th>Meter</th>
			<!-- <th>location</th> -->
			<th>Date/Hours	</th>
			<th>Consumption</th>
		</tr>
	</thead>
	<tbody>
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Building Level Energy Consumption</td></tr>
	<?php for($j=0;$j<count($energydata['blec']);$j++){ 
			for($i=0;$i<count($energydata['blec'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['blec'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['blec'][$j][$i]['date']."/".date('l', strtotime($energydata['blec'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['blec'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Chiller Plant Equipment Energy Consumption</td></tr>
		<?php for($j=0;$j<count($energydata['cpeec']);$j++){ 
			for($i=0;$i<count($energydata['cpeec'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['cpeec'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['cpeec'][$j][$i]['date']."/".date('l', strtotime($energydata['cpeec'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['cpeec'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">AHUs Energy Consumption</td></tr>
			<?php for($j=0;$j<count($energydata['aec']);$j++){ 
			for($i=0;$i<count($energydata['aec'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['aec'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['aec'][$j][$i]['date']."/".date('l', strtotime($energydata['aec'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['aec'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Other Energy End uses</td></tr>
			<?php for($j=0;$j<count($energydata['oee']);$j++){ 
			for($i=0;$i<count($energydata['oee'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['oee'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['oee'][$j][$i]['date']."/".date('l', strtotime($energydata['oee'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['oee'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			
	</tbody>
</table>