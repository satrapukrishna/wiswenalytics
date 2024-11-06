<?php //echo count($energydata_table['consolidate'][0]);echo json_encode($energydata_table['consolidate'][0][0]['meter']);die(); ?>
<span class="SctnTtl">Energy Meter Consumption Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr>
			<th rowspan="2">S. No.</th>
			<th rowspan="2">Date/Day	</th>
			<th colspan="<?php echo count($energydata_table['consolidate'][0]);?>">Meters</th>
			
		</tr>
		<?php for($j=0;$j<count($energydata_table['consolidate'][0]);$j++){ ?>
			<th ><?php echo $energydata_table['consolidate'][0][$j]['meter']; ?></th>
       <?php } ?>
	</thead>
	<tbody>
		<?php for($j=0;$j<count($energydata_table['consolidate']);$j++){ 
			?>
			<tr>
				<td><?php echo $j+1; ?></td>
				<td><?php echo $energydata_table['consolidate'][$j][0]['date']."/".date('l', strtotime($energydata_table['consolidate'][$j][0]['date'])); ?></td>
				<?php for($i=0;$i<count($energydata_table['consolidate'][$j]);$i++){?>
				
				<td><?php echo $energydata_table['consolidate'][$j][$i]['consumption']; ?>Kwh</td>
				<?php }?>
			</tr>
			<?php $k++; }?>
	</tbody>
</table>