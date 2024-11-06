<div  class="text-head">Alert Status View Report</div>
<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr style="font-weight: bold;"> 
							<th align='center'>SNo</th>
                            <th align='center'>Date</th>                           
							<th align='center'>No of times Low Water level</th>
                            <th align='center'>No of times Over running hours alerts</th>
							
                            <th  align='center' colspan='2'>No of times Fuel Added and Quantity</th>
                            <th  align='center'>No of time Low Pressure Levels</th>
                           
							</tr>
							
							<?php 
							for($i=0;$i<count($alerts_data);$i++){								
							?>
							<tr>
							<td align='center'><?php echo $i+1;?></td>
							<td align='center'><?php echo $alerts_data[$i]['date']?></td>
							<td align='center' >0</td>
							
							<td align='center' >0</td>
                            <td align='center' >0</td>
							
							<td align='center' >0 Ltrs</td>
                            <td align='center' >0</td>
							
							
							</tr>
							<?php } ?>
                           
							
                            </thead>
						<tbody>
							
							
						</tbody>
					</table>