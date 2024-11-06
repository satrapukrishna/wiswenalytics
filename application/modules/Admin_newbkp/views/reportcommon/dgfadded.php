<span class="SctnTtl">Fuel Added Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			<th style="width: 15%;">S. No.</th>
			<th style="width: 25%;">Date</th>
			<th style="width: 30%;">Generator</th>
			<th style="width: 30%;">Fuel Added (In Ltrs)</th>
		</tr>
		<?php for($i=0;$i<count($dgdata[0]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[0]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['dgname']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['fadd']; ?></td>
		</tr>
		<?php }?>
	</thead>
	<tbody>
	</tbody>
</table>