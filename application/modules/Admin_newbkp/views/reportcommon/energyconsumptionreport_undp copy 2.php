<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<?php if($energydata['undp'][0][0]['sort']==2){ ?>
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
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['undp'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['undp'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['undp'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['undp'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
	<?php for($j=0;$j<count($energydata['uncw']);$j++){ 
			for($i=0;$i<count($energydata['uncw'][$j]);$i++){?>
			<tr>
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['uncw'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['uncw'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['uncw'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['uncw'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House East Wing</td></tr>
	<?php for($j=0;$j<count($energydata['unew']);$j++){ 
			for($i=0;$i<count($energydata['unew'][$j]);$i++){?>
			<tr>
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['unew'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['unew'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['unew'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['unew'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Ford Foundation</td></tr>
	<?php for($j=0;$j<count($energydata['unff']);$j++){ 
			for($i=0;$i<count($energydata['unff'][$j]);$i++){?>
			<tr>
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['unff'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['unff'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['unff'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['unff'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House West Wing</td></tr>
	<?php for($j=0;$j<count($energydata['unww']);$j++){ 
			for($i=0;$i<count($energydata['unww'][$j]);$i++){?>
			<tr>
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['unww'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['unww'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['unww'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['unww'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Annexe Building</td></tr>
	<?php for($j=0;$j<count($energydata['unab']);$j++){ 
			for($i=0;$i<count($energydata['unab'][$j]);$i++){?>
			<tr>
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['unab'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['unab'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['unab'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['unab'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Security Gate</td></tr>
	<?php for($j=0;$j<count($energydata['unsg']);$j++){ 
			for($i=0;$i<count($energydata['unsg'][$j]);$i++){?>
			<tr>
				<td rowspan="24"><?php echo $i+1; ?></td>
				<td rowspan="24"><?php echo $energydata['unsg'][$j][$i]['meter']; ?></td>
				<!-- <td>Tower A</td> -->
				   <?php for($j1=0;$j1<count($energydata['unsg'][$j][$i]['data']);$j1++){  ?>
						<td><?php echo $energydata['unsg'][$j][$i]['data'][$j1]['date']; ?></td>
						<td><?php echo $energydata['unsg'][$j][$i]['data'][$j1]['consumption']; ?>Kwh</td>
						</tr>
					<?php }?>
				
			
			<?php  }}?>
			
	</tbody>
</table>
	<?php }else{?>
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
			
			
	</tbody>
</table>
		<?php }?>
