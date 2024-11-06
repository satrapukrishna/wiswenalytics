<?php //print_r($flowdata[0][1]); ?>
<span class="SctnTtl">Flow Meter Consumption Report</span>
<table class="RprtTbl">
	<thead>
							<tr >
								<th >S. No.</th>								
								<th >Meter</th>
								<!-- <th >location</th> -->
								<th >Date/Hours	</th>
								<th >Inflow</th>
								
								
								
							</tr>
						</thead>
						<tbody>
							<?php for($i=0;$i<count($flowdata[0]);$i++){ ?>
								<tr>
								<td ><?php echo $i+1; ?></td>
								
								<td ><?php echo $flowdata[0][$i]['meter']; ?></td>
								<!-- <td >Tower A</td> -->
								<td ><?php echo $flowdata[0][$i]['date']."/".date('l', strtotime($flowdata[0][$i]['date'])); ?></td>
								<td ><?php echo $flowdata[0][$i]['consumption']; ?>KL</td>
								
								
								</tr>
								<?php }?>
								
								
								
							
						</tbody>
					</table>