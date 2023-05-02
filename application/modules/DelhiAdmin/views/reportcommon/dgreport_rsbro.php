<?php //print_r($dgdata); die();?>
<span class="SctnTtl">DG Running Hours Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			<th>S. No.</th>
			<th>Date</th>
			<th>Generator</th> 
			<th>Running Hours</th> 
			<th>Fuel Consumed (In Ltrs)</th> 
			<th>Economy (Ltrs/Hr)</th> 
			<th>Fuel Added (In Ltrs)</th> 
			<th>Fuel Removed (In Ltrs)</th> 
			<th>Fuel Left (In Ltrs)</th>
		</tr>
		<?php $k=1;
		for($j=0;$j<count($dgdata);$j++){ 
			
			for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $k; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[$j]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['dgname']; ?></td>
			
			<td><?php echo $dgdata[$j]['consolidate'][$i]['run']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['fconsume']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['economy']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['fadd']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['fremove']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['availableFuel']; ?></td>							
		</tr>
		<?php $k++;}
	}?>
	</thead>
	<tbody>
	</tbody>
</table>