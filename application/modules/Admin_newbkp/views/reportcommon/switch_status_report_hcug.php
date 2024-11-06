<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Motor Running Report</span>
<?php if($switch_status_data[0][0]['type']==1){ ?>
	<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 3+count($switch_status_data[0][0]['runn_h']) ?>' >Motor Running Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<th rowspan="2">Date/Hours	</th>
			
			<th colspan='<?php echo count($switch_status_data[0][0]['runn_h']) ?>' >Running Min</th> 
		</tr>
		<tr>
		<?php for($j=0;$j<count($switch_status_data[0][0]['runn_h']);$j++){ ?>
			<th><?php echo $switch_status_data[0][0]['runn_h'][$j]['Time']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
		
	
	<?php for($j=0;$j<count($switch_status_data);$j++){ 
			for($i=0;$i<count($switch_status_data[$j]);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $switch_status_data[$j][$i]['meter']; ?></td>
					<?php }?>
					
					<td ><?php echo $switch_status_data[$j][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($switch_status_data[$j][$i]['runn_h']);$j1++){
					echo '<td>'. $switch_status_data[$j][$i]['runn_h'][$j1]['rh'].'</td>';}
					echo '</tr>';
				}
			}?>
					
	</tbody>
</table>
	<?php }else{?>
		<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			
			<th colspan='<?php echo 2+count($switch_status_data[0]) ?>' >Motor Running Report </th> 
			</tr>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Meter</th>
			<!-- <th>location</th> -->
			<!-- <th rowspan="2">Date/Hours	</th> -->
			<th colspan='<?php echo count($switch_status_data[0]) ?>'>Running Hrs</th>
		</tr>
		<tr>
		<?php for($j=0;$j<count($switch_status_data[0]);$j++){ ?>
			<th><?php echo $switch_status_data[0][$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
	</thead>
	<tbody>
	
	<?php for($j=0;$j<count($switch_status_data);$j++){ ?>
		<tr>
		<?php
			for($i=0;$i<count($switch_status_data[$j]);$i++){?>
				
					<?php if($i==0){ ?>
					<td ><?php echo $j+1; ?></td>
					<td ><?php echo $switch_status_data[$j][$i]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $switch_status_data[$j][$i]['runn_h']; ?></td>
					<?php }
					echo '</tr>';
			
			}?>	
	
	</tbody>
</table>
		<?php }?>
