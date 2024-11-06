<div  class="text-head"> DG Running Hours Report</div>
<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr style="font-weight: bold;"> 
							<th align='center'>SNo</th>
                            <th align='center'>Date</th>
							<th align='center'>Generator</th> 
							<th align='center'>Floor</th>    
							<th  align='center'>Running Hours</th> 
                            <th  align='center'>Fuel Consumed(In Ltrs)</th> 
                            <th  align='center'>Economy(Ltrs/Hr)</th> 
                            <th  align='center'>Fuel Added(In Ltrs)</th> 
                            <th  align='center'>Fuel Removed(In Ltrs)</th> 
                            <th  align='center'>Fuel Level(In Ltrs)</th>
							</tr>
							<?php 
							for($i=0;$i<count($dgrunn_data);$i++){								
							?>
							<tr>
							<td align='center'><?php echo $i+1;?></td>
							<td align='center'><?php echo $dgrunn_data[$i]['date']?></td>
							<td align='center'><?php echo $dgrunn_data[$i]['meter']?></td>
							<td align='center'>Floor1</td>
							<td align='center'><?php echo $dgrunn_data[$i]['RunningHours']?></td>
							<td align='center'>0</td>
							<td align='center'>0</td>
							<td align='center'>0</td>
							<td align='center'>0</td>
							<td align='center'>500</td>	
							
							</tr>
							<?php } ?>



							
                            </thead>
						<tbody>
							
							
						</tbody>
					</table>
