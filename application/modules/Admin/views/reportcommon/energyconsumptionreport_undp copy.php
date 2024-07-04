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
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">AC Plant Room</td></tr>
	<?php for($j=0;$j<count($energydata['undp']);$j++){ 
			for($i=0;$i<count($energydata['undp'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['undp'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['undp'][$j][$i]['date']."/".date('l', strtotime($energydata['undp'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['undp'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
		<?php for($j=0;$j<count($energydata['uncw']);$j++){ 
			for($i=0;$i<count($energydata['uncw'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['uncw'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['uncw'][$j][$i]['date']."/".date('l', strtotime($energydata['uncw'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['uncw'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House East Wing</td></tr>
			<?php for($j=0;$j<count($energydata['unew']);$j++){ 
			for($i=0;$i<count($energydata['unew'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['unew'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['unew'][$j][$i]['date']."/".date('l', strtotime($energydata['unew'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['unew'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Ford Foundation</td></tr>
			<?php for($j=0;$j<count($energydata['unff']);$j++){ 
			for($i=0;$i<count($energydata['unff'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['unff'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['unff'][$j][$i]['date']."/".date('l', strtotime($energydata['unff'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['unff'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House  West Wing</td></tr>
			<?php for($j=0;$j<count($energydata['unww']);$j++){ 
			for($i=0;$i<count($energydata['unww'][$j]);$i++){?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $energydata['unww'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				<td><?php echo $energydata['unww'][$j][$i]['date']."/".date('l', strtotime($energydata['unww'][$j][$i]['date'])); ?></td>
				<td><?php echo $energydata['unww'][$j][$i]['consumption']; ?>Kwh</td>
			</tr>
			<?php $k++; }}?>
			
	</tbody>
</table>