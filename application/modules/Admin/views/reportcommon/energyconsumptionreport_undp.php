<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<?php if($energydata['undp'][0][0]['sort']==2){ ?>
	<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 3+count($energydata['undp'][0][0]['data']) ?>' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<th rowspan="2">Date/Hours	</th>
			
			<th colspan='<?php echo count($energydata['undp'][0][0]['data']) ?>' >Consumption(Kwh)</th> 
		</tr>
		<tr>
		<?php for($j=0;$j<count($energydata['undp'][0][0]['data']);$j++){ ?>
			<th><?php echo $energydata['undp'][0][0]['data'][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
		
	<tr ><td colspan='<?php echo 3+count($energydata['undp'][0][0]['data']) ?>' style="text-align: center; font-weight: bold;">AC Plant Room</td></tr>
	<?php for($j=0;$j<count($energydata['undp']);$j++){ 
			for($i=0;$i<count($energydata['undp'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['undp'][$j][$i]['meter']; ?></td>
					<?php }?>
					
					<td ><?php echo $energydata['undp'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['undp'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['undp'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
		<?php for($j=0;$j<count($energydata['uncw']);$j++){ 
			for($i=0;$i<count($energydata['uncw'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['uncw'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['uncw'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['uncw'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['uncw'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House East Wing</td></tr>
		<?php for($j=0;$j<count($energydata['unew']);$j++){ 
			for($i=0;$i<count($energydata['unew'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['unew'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unew'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['unew'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['unew'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Ford Foundation</td></tr>
		<?php for($j=0;$j<count($energydata['unff']);$j++){ 
			for($i=0;$i<count($energydata['unff'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['unff'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unff'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['unff'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['unff'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House  West Wing</td></tr>
		<?php for($j=0;$j<count($energydata['unww']);$j++){ 
			for($i=0;$i<count($energydata['unww'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['unww'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unww'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['unww'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['unww'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Security Gate</td></tr>
		<?php for($j=0;$j<count($energydata['unsg']);$j++){ 
			for($i=0;$i<count($energydata['unsg'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['unsg'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unsg'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['unsg'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['unsg'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Annexe Building</td></tr>
		<?php for($j=0;$j<count($energydata['unab']);$j++){ 
			for($i=0;$i<count($energydata['unab'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['unab'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unab'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['unab'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['unab'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>				
	</tbody>
</table>
	<?php }else{?>
		<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 2+count($energydata['undp'][0]) ?>' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<!-- <th rowspan="2">Date/Hours	</th> -->
			<th colspan='<?php echo count($energydata['undp'][0]) ?>'>Consumption(Kwh)</th>
		</tr>
		<tr>
		<?php for($j=0;$j<count($energydata['undp'][0]);$j++){ ?>
			<th><?php echo $energydata['undp'][0][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">AC Plant Room</td></tr>
	<?php for($j=0;$j<count($energydata['undp']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['undp'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['undp'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['undp'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
	<?php for($j=0;$j<count($energydata['uncw']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['uncw'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['uncw'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['uncw'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>		
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House East Wing</td></tr>
	<?php for($j=0;$j<count($energydata['unew']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['unew'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['unew'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unew'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Ford Foundation</td></tr>
	<?php for($j=0;$j<count($energydata['unff']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['unff'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['unff'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unff'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House  West Wing</td></tr>
	<?php for($j=0;$j<count($energydata['unww']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['unww'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['unww'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unww'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Security Gate</td></tr>
	<?php for($j=0;$j<count($energydata['unsg']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['unsg'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['unsg'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unsg'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	<tr ><td colspan="4" style="text-align: center; font-weight: bold;">Annexe Building</td></tr>
	<?php for($j=0;$j<count($energydata['unab']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['unab'][$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $energydata['unab'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['unab'][$j][$i]['consumption']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	</tbody>
</table>
		<?php }?>
