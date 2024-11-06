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
		<?php for($i=0;$i<count($dgdata[0]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[0]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['dgname']; ?></td>
			
			<td><?php echo $dgdata[0]['consolidate'][$i]['run']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['fconsume']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['economy']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['fadd']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['fremove']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['availableFuel']; ?></td>							
		</tr>
		<?php }?>
	</thead>
	<tbody>
	</tbody>
</table>