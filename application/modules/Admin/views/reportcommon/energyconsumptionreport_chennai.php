<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<?php if($energydata['chennai'][0][0]['sort']==2){ ?>
	<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 3+count($energydata['chennai'][0][0]['data']) ?>' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<th rowspan="2">Date/Hours	</th>
			
			<th colspan='<?php echo count($energydata['chennai'][0][0]['data']) ?>' >Consumption(Kwh)</th> 
		</tr>
		<tr>
		<?php for($j=0;$j<count($energydata['chennai'][0][0]['data']);$j++){ ?>
			<th><?php echo $energydata['chennai'][0][0]['data'][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
	
	<?php for($j=0;$j<count($energydata['chennai']);$j++){ 
			for($i=0;$i<count($energydata['chennai'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['chennai'][$j][$i]['meter']; ?></td>
					<?php }?>
					
					<td ><?php echo $energydata['chennai'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['chennai'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['chennai'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>
		
			
					
	</tbody>
</table>
	<?php }?>
		
