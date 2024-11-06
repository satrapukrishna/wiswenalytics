<span class="SctnTtl" id="r_name" name="r_name">DG Report</span>
<table class="RprtTbl" id="list">
	<thead>
			<tr> 
			
			<th colspan='9' >DG Running Hours Report </th> 
			</tr>
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
		<tr ><th colspan="4"></tr>
		<tr> 
			
			<th colspan='4' >Fuel Added Report </th> 
			</tr>
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
		<tr ><th colspan="4"></tr>
		<tr> 
			
			<th colspan='4' >Fuel Removed Report </th> 
			</tr>
		<tr> 
		<tr> 
			<th style="width: 15%;">S. No.</th>
			<th style="width: 25%;">Date</th>
			<th style="width: 30%;">Generator</th>
			<th style="width: 30%;">Fuel Removed (In Ltrs)</th>
		</tr>
		<?php for($i=0;$i<count($dgdata[0]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[0]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['dgname']; ?></td>
			<td><?php echo $dgdata[0]['consolidate'][$i]['fremove']; ?></td>
		</tr>
		<?php }?>
	</thead>
	<tbody>
	</tbody>
</table>