<?php print_r($running_data); ?>
<div  class="text-head"> Firepump Running Hours Report</div>

<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr style="font-weight: bold;"> 
							<th rowspan='2' align='center'>SNo</th>
							<th rowspan='2' align='center'>Date</th>
							<th rowspan='2' align='center'>Floor</th>
							<th rowspan='2' align='center'>FirePump</th>    
							<th colspan='4' align='center'>Meters</th> 
							</tr>
							<tr>
							<?php for($j=0;$j<count($running_data[0])-1;$j++){
							echo "<td>".$running_data[0][$j]['meter']."</td>";
							}
							?>
							
							</tr>
							<?php 
							for($i=0;$i<count($running_data);$i++){								
							?>
							<tr>
							<td align='center'><?php echo $i+1;?></td>
							<td align='center'><?php echo $running_data[$i][0]['date']?></td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<?php
								for($j=0;$j<count($running_data[$i])-1;$j++){									
									echo "<td>".$running_data[$i][$j]['RunningHours']."</td>";
								}
								?>
							
							</tr>
							<?php } ?>



							
							<!-- <tr style="font-weight: bold;">
							<th>Jockey Pump</th><th>Sprinkler Pump</th><th>Hydrant Pump</th><th>Diesel Pump</th>							
							</tr>
														<tr>
							<td align='center'>1</td>
							<td align='center'>2020-11-01</td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<td>0</td><td>0</td><td>0</td><td>0</td>							
							</tr>
														<tr>
							<td align='center'>2</td>
							<td align='center'>2020-11-02</td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<td>0</td><td>0</td><td>0</td><td>0</td>							
							</tr>
														<tr>
							<td align='center'>3</td>
							<td align='center'>2020-11-03</td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<td>0</td><td>0</td><td>0</td><td>0</td>							
							</tr>
														<tr>
							<td align='center'>4</td>
							<td align='center'>2020-11-04</td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<td>0</td><td>0</td><td>0</td><td>0</td>							
							</tr>
														<tr>
							<td align='center'>5</td>
							<td align='center'>2020-11-05</td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<td>0</td><td>0</td><td>0</td><td>0</td>							
							</tr>
														<tr>
							<td align='center'>6</td>
							<td align='center'>2020-11-06</td>
							<td align='center'>Floor1</td>
							<td align='center'>Firepump1</td>
								<td>0</td><td>0</td><td>0</td><td>0</td>							
							</tr> -->
						</thead>
						<tbody>
							
							
						</tbody>
					</table>