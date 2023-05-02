<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">Borewell Running Report</span>
<table class="RprtTbl" id="list">
			<tr> 
			
			<th colspan='4' >Borewell Running Report </th> 
			</tr>
	<tr>
		<th>S. No.</th>
		<th>Meter</th>
		<!-- <th>location</th> -->
		<th>Date/Hours</th>
		<th>Running Hours</th>
	</tr>
	<?php for($k=0;$k<count($borewell_data);$k++){ 
		for($i=0;$i<count($borewell_data[$k]['consolidate']);$i++){?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $borewell_data[$k]['consolidate'][$i]['meter']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $borewell_data[$k]['consolidate'][$i]['date']."/".date('l', strtotime($borewell_data[$k]['consolidate'][$i]['date'])); ?></td>
			<td><?php echo $borewell_data[$k]['consolidate'][$i]['running']; ?></td>
		</tr>
	<?php  }}?>
</table>