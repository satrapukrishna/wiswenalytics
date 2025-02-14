<?php //echo count($energydata['consolidate']);echo json_encode($energydata['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Open / Close Report</span>

	<table class="RprtTbl" id="list">
	<thead>
		
		<tr>
			<th rowspan="3">S. No.</th>
			<th rowspan="3">Meter</th>
			<!-- <th>location</th> -->
			<th rowspan="3">Date/Hours	</th>
			
			<th colspan='<?php echo count($tempdata[0]['data']) ?>' >Open / Close Count Report</th> 
		</tr>
		<tr>
		<?php for($j=0;$j<count($tempdata);$j++){ ?>
			<th colspan="2"><?php echo $tempdata[$j]['date']; ?></th>
			
		<?php } ?>	
		</tr>
		<tr>
		<?php for($j=0;$j<count($tempdata);$j++){ ?>
			
		<th>Open</th>
		<th>Close</th>
		
			
		<?php } ?>	
		</tr>
		
	</thead>
	<tbody>
		
	
		
		<?php  for($j=0;$j<count($tempdata);$j++){ 
			for($i=0;$i<count($tempdata[$j]['data']);$i++){?>
				<tr>
					<?php if($i==0){ ?>
					<td rowspan="24"><?php echo $j+1; ?></td>
					<td rowspan="24"><?php echo $tempdata[$j]['meter']; ?></td>
					<?php }?>
					<td ><?php echo $tempdata[$j]['data'][$i]['date']; ?></td>
					<?php for($j1=0;$j1<count($tempdata[$j]['data']);$j1++){
					echo '<td>'. $tempdata[$j1]['data'][$i]['open'].'</td>';
					echo '<td>'. $tempdata[$j1]['data'][$i]['close'].'</td>';}
					echo '</tr>';
				}
			}?>	
			
			?>	
		
			
			
			
	</tbody>
</table>
