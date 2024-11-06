<span class="SctnTtl">Fuel Added Report</span>
<table class="RprtTbl" id="list">
	<thead>
		<tr> 
			<th style="width: 15%;">S. No.</th>
			<th style="width: 25%;">Date</th>
			<th style="width: 30%;">Generator</th>
			<th style="width: 30%;">Fuel Added (In Ltrs)</th>
		</tr>
		<?php $k=1;
		for($j=0;$j<count($dgdata);$j++){ 
			
			for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $k; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[$j]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['dgname']."(".$dgdata[$j]['consolidate'][$i]['location'].")"; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['fadd']; ?></td>						
		</tr>
		<?php $k++;}
	}?>
	</thead>
	<tbody>
	</tbody>
</table>