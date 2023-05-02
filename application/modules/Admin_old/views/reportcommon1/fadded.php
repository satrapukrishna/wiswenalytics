<div  class="text-head"> Fuel Added Report</div>
<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr style="font-weight: bold;"> 
							<th align='center'>SNo</th>
                            <th align='center'>Date</th>
							<th align='center'>Generator</th>    
							<th align='center'>Floor</th> 
                            <th  align='center'>Fuel Added(In Ltrs)</th> 
                           
							</tr>
							
							<?php 
							for($i=0;$i<count($dgfadd_data);$i++){								
							?>
							<tr>
							<td align='center'><?php echo $i+1;?></td>
							<td align='center'><?php echo $dgfadd_data[$i]['date']?></td>
							<td align='center'><?php echo $dgfadd_data[$i]['meter']?></td>
							<td align='center'>Floor1</td>
							<td align='center'><?php echo $dgfadd_data[$i]['fadd']?></td>
							
							
							</tr>
							<?php } ?>
                            </thead>
						<tbody>
							
							
						</tbody>
					</table>