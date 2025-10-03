<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Energy Meter Consumption Report</span>
<?php if($energydata['hourly']['tero'][0][0]['sort']==2){ ?>
	<table class="RprtTbl" id="list">
	<thead>
	<tr> 
			
			<th colspan='<?php echo 3+count($energydata['hourly']['tero'][0][0]['data']) ?>' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<th rowspan="2">Date/Hours	</th>
			
			<th colspan='<?php echo count($energydata['hourly']['tero'][0][0]['data']) ?>' >Consumption(Kwh)</th> 
		</tr>
		<tr>
		<?php for($j=0;$j<count($energydata['hourly']['tero'][0][0]['data']);$j++){ ?>
			<th><?php echo $energydata['hourly']['tero'][0][0]['data'][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
		
	
		<tr ><td colspan="4" style="text-align: center; font-weight: bold;">UN House Central Wing</td></tr>
		<?php for($j=0;$j<count($energydata['hourly']['tero']);$j++){ 
			for($i=0;$i<count($energydata['hourly']['tero'][$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $energydata['hourly']['tero'][$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $energydata['hourly']['tero'][$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($energydata['hourly']['tero'][$j][$i]['data']);$j1++){
					echo '<td>'. $energydata['hourly']['tero'][$j][$i]['data'][$j1]['consumption'].'</td>';}
					echo '</tr>';
				}
			}?>	
			
	</tbody>
</table>
	<?php }else{?>
		<table class="RprtTbl" id="list">
	<thead>
	<tr> 
			
			<th colspan='5' >Energy Meter Consumption Report </th> 
			</tr>
		<tr>
			<th >S. No.</th>
			<th >Meter</th>
			<th>Date</th>
			<th >Day	</th>
			<th >Total Consumption(Kwh)</th>
			<th >Day Consumption(Kwh)</th>
			<th >Night Consumption(Kwh)</th>
		</tr>
		
	</thead>
	<tbody>
	
	
	<?php for($j=0;$j<count($energydata['day']['tero']);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($energydata['day']['tero'][$j]);$i++){?>
				
					
					<td ><?php echo $i+1; ?></td>
					<td ><?php echo $energydata['day']['tero'][$j][$i]['meter']; ?></td>
					<td><?php echo $energydata['day']['tero'][$j][$i]['date']; ?></td>
					<td><?php echo date('l', strtotime($energydata['day']['tero'][$j][$i]['date'])); ?></td>
					<td ><?php echo $energydata['day']['tero'][$j][$i]['consumption']; ?></td>
					<td ><?php echo $energydata['day']['tero'][$j][$i]['day_consumption']; ?></td>
					<td ><?php echo $energydata['day']['tero'][$j][$i]['night_consumption']; ?></td>
			</tr>
					<?php }
					
			
			}?>	
			
			<th colspan='8' >WeekDay & Weekend & Total Consumption </th> 
			</tr>
			
			<tr>
			<th>S. No.</th>
			<th>Meter</th>
			<!-- <th>date</th> -->
			<th >WeekDay Consumption	</th>
			<th >Avg. WeekDay Consumption	</th>
			<th >Weekend Consumption(Kwh)</th>			
			<th >Avg. Weekend Consumption(Kwh)</th>
			<th >Total Consumption(Kwh)</th>
			<th >Avg. Consumption(Kwh)</th>
		</tr>
			
	
		<tr>
		<?php
			?>
				
					
					<td ><?php echo $i+1; ?></td>
					<td ><?php echo $avgdata['tero']['meter']; ?></td>
					<td><?php echo $avgdata['tero']['weekdaycons']; ?></td>
					
					<td><?php echo $avgdata['tero']['avgweekdaycons']; ?></td>
					<td ><?php echo $avgdata['tero']['weekendcons']; ?></td>
					<td ><?php echo $avgdata['tero']['avgweekendcons']; ?></td>
					<td ><?php echo $avgdata['tero']['totalcons']; ?></td>
					<td ><?php echo $avgdata['tero']['avgcons']; ?></td>
					
					</tr>;
					
					<th colspan='8' >Day & Night & Total Consumption </th> 
			</tr>
			
			<tr>
			<th>S. No.</th>
			<th>Meter</th>
			<!-- <th>date</th> -->
			<th >Total Consumption	</th>
			<th >Night Consumption(Kwh)	</th>
			<th >Day Consumption(Kwh)</th>	
		</tr>
			
	
		<tr>
		<?php
			?>
				
					
					<td ><?php echo $i+1; ?></td>
					<td ><?php echo $daynightdata['tero']['meter']; ?></td>				
					<td><?php echo $avgdata['tero']['totalcons']; ?></td>
					<td ><?php echo $daynightdata['tero']['nightcons']; ?></td>
					<td ><?php echo $daynightdata['tero']['daycons']; ?></td>
					
					</tr>;		
			
				
	
	</tbody>
</table>
		<?php }?>
