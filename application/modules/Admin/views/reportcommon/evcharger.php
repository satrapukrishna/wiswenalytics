<?php //print_r($flowdata);die(); ?>
<span class="SctnTtl" id="r_name" name="r_name">EV Charger Report</span>
<table class="RprtTbl" id="list">
			<tr> 
			
			<th colspan='6' >EV Charger Report </th> 
			</tr>
	<tr>
		<th>S. No.</th>
		<th>Month</th>
		<th>Meter</th>
		<th>Units Consumed</th>
		<th>Rate per Unit</th>
		<th>Cost per Month</th>
	</tr>
	<?php for($k=0;$k<count($evch['data']);$k++){ 
		for($i=0;$i<count($evch['data'][$k]);$i++){?>
		<tr>
			
			<?php if($i==0){ ?>
				<td rowspan="<?php echo count($evch['data'][$k]); ?>"><?php echo $k+1; ?></td>
				<td rowspan="<?php echo count($evch['data'][$k]); ?>"><?php echo $evch['data'][$k][$i]['month']; ?></td>
				<?php }?>
			
			<td><?php echo $evch['data'][$k][$i]['meter']; ?></td>
			<td><?php echo $evch['data'][$k][$i]['consumption']; ?></td>
			<!-- <td>Tower A</td> -->
			<td><?php echo $evch['data'][$k][$i]['ratepercost']; ?></td>
			<td><?php echo $evch['data'][$k][$i]['percost']; ?></td>
		</tr>
	<?php  }}?>
</table>