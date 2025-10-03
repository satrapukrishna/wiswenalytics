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
		
	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
		<?php for($j=0;$j<count($energydata['hourly']['uncw']);$j++){ 
			for($i=0;$i<count($energydata['hourly']['uncw'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['hourly']['uncw'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['hourly']['uncw'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['hourly']['uncw'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['hourly']['uncw'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House East Wing</td></tr>
		<?php for($j=0;$j<count($energydata['hourly']['unew']);$j++){ 
			for($i=0;$i<count($energydata['hourly']['unew'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['hourly']['unew'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['hourly']['unew'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['hourly']['unew'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['hourly']['unew'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
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
		
			<?php if(isset($energydata['hourly']['unsg'])){ ?>
				<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Security Gate</td></tr>
				<?php for($j=0;$j<count($energydata['hourly']['unsg']);$j++){ 
				for($i=0;$i<count($energydata['hourly']['unsg'][$j]);$i++){?>
					<tr>
						<?php if($i==0){ ?>
						<td rowspan="24"><?php echo $j+1; ?></td>
						<td rowspan="24"><?php echo $energydata['hourly']['unsg'][$j][$i]['meter']; ?></td>
						<?php }?>
						<td ><?php echo $energydata['hourly']['unsg'][$j][$i]['date']; ?></td>
						<?php for($j1=0;$j1<count($energydata['hourly']['unsg'][$j][$i]['data']);$j1++){
						echo '<td>'. $energydata['hourly']['unsg'][$j][$i]['data'][$j1]['consumption'].'</td>';}
						echo '</tr>';
					}
				}?>	
			<?php } ?>
			<?php if(isset($energydata['hourly']['unab'])){ ?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Annexe Building</td></tr>
			<?php for($j=0;$j<count($energydata['hourly']['unab']);$j++){ 
				for($i=0;$i<count($energydata['hourly']['unab'][$j]);$i++){?>
					<tr>
						<?php if($i==0){ ?>
						<td rowspan="24"><?php echo $j+1; ?></td>
						<td rowspan="24"><?php echo $energydata['hourly']['unab'][$j][$i]['meter']; ?></td>
						<?php }?>
						<td ><?php echo $energydata['hourly']['unab'][$j][$i]['date']; ?></td>
						<?php for($j1=0;$j1<count($energydata['hourly']['unab'][$j][$i]['data']);$j1++){
						echo '<td>'. $energydata['hourly']['unab'][$j][$i]['data'][$j1]['consumption'].'</td>';}
						echo '</tr>';
					}
				}?>	
			<?php } ?>
			<tr ><td colspan='<?php echo 3+count($energydata['hourly']['undp'][0][0]['data']) ?>' style="text-align: center; font-weight: bold;">AC Plant Room</td></tr>
	<?php for($j=0;$j<count($energydata['hourly']['undp']);$j++){ 
			for($i=0;$i<count($energydata['hourly']['undp'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['hourly']['undp'][$j][$i]['meter']; ?></td>
					<?php }?>
					
					<td ><?php echo $energydata['hourly']['undp'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['hourly']['undp'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['hourly']['undp'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>
			<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House  West Wing</td></tr>
		<?php for($j=0;$j<count($energydata['hourly']['unww']);$j++){ 
			for($i=0;$i<count($energydata['hourly']['unww'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['hourly']['unww'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['hourly']['unww'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['hourly']['unww'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['hourly']['unww'][$j][$i]['data'][$j1]['consumption'].'</td>';}
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
	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
	<?php for($j=0;$j<count($energydata['day']['uncw']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['uncw'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['uncw'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['uncw'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>		
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House East Wing</td></tr>
	<?php for($j=0;$j<count($energydata['day']['unew']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['unew'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['unew'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['unew'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
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
	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Security Gate</td></tr>
	<?php for($j=0;$j<count($energydata['day']['unsg']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['unsg'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['unsg'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['unsg'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Annexe Building</td></tr>
	<?php for($j=0;$j<count($energydata['day']['unab']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['unab'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['unab'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['unab'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">AC Plant Room</td></tr>
	<?php for($j=0;$j<count($energydata['day']['undp']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['undp'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['undp'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['undp'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House  West Wing</td></tr>
	<?php for($j=0;$j<count($energydata['day']['unww']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['unww'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['day']['unww'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['day']['unww'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	</tbody>
</table>
		<?php }?>
