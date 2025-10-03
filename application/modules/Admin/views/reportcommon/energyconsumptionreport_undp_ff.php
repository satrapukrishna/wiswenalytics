<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<?php if($energydata['hourly']['undp'][0][0]['sort']==2){ ?>
	<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 3+count($energydata['hourly']['undp'][0][0]['data']) ?>' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<th rowspan="2">Date/Hours	</th>
			
			<th colspan='<?php echo count($energydata['hourly']['undp'][0][0]['data']) ?>' >Consumption(Kwh)</th> 
		</tr>
		<tr>
		<?php for($j=0;$j<count($energydata['hourly']['undp'][0][0]['data']);$j++){ ?>
			<th><?php echo $energydata['hourly']['undp'][0][0]['data'][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Ford Foundation</td></tr>
		<?php for($j=0;$j<count($energydata['hourly']['unff']);$j++){ 
			for($i=0;$i<count($energydata['hourly']['unff'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['hourly']['unff'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['hourly']['unff'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['hourly']['unff'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['hourly']['unff'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
		
			
			
	</tbody>
</table>
	<?php }else{?>
		<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 2+count($energydata['day']['undp'][0]) ?>' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<!-- <th rowspan="2">Date/Hours	</th> -->
			<th colspan='<?php echo count($energydata['day']['undp'][0]) ?>'>Consumption(Kwh)</th>
		</tr>
		<tr>
		<?php for($j=0;$j<count($energydata['day']['undp'][0]);$j++){ ?>
			<th><?php echo $energydata['day']['undp'][0][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Ford Foundation</td></tr>
	<?php for($j=0;$j<count($energydata['day']['unff']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['unff'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['unff'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['unff'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	
	
	
	</tbody>
</table>
		<?php }?>
