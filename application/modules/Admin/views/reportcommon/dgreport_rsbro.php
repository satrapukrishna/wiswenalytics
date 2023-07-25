<?php //print_r($dgdata); die();?>
<!-- <span class="SctnTtl">DG Running Hours Report</span> -->
<table class="RprtTbl" id="list">
	<thead>
	<tr> 
			
			<th colspan='9' >DG Running Hours Report1 </th> 
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
		<?php $k=1;
		for($j=0;$j<count($dgdata);$j++){ 
			
			for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $k; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[$j]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['dgname']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['fadd']; ?></td>						
		</tr>
		<?php $k++;}
	}?>
	<tr ><th colspan="4"></tr>
		<tr> 
			
			<th colspan='4' >Fuel Removed Report </th> 
			</tr>
		
		<tr> 
			<th style="width: 15%;">S. No.</th>
			<th style="width: 25%;">Date</th>
			<th style="width: 30%;">Generator</th>
			<th style="width: 30%;">Fuel Removed (In Ltrs)</th>
		</tr>
		<?php $k=1;
		for($j=0;$j<count($dgdata);$j++){ 
			
			for($i=0;$i<count($dgdata[$j]['consolidate']);$i++){ ?>
		<tr>
			<td><?php echo $k; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['date']."/".date('l', strtotime($dgdata[$j]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['dgname']; ?></td>
			<td><?php echo $dgdata[$j]['consolidate'][$i]['fremove']; ?></td>					
		</tr>
		<?php $k++;}
	}?>
	</thead>
	<tbody>
	</tbody>
</table>