<?php //print_r($dgdata); die();?>
<div  class="text-head"> DG Running Hours Report</div>
<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px" id="list">
						<thead>
							<tr style="font-weight: bold;"> 
							<th align='center'>SNo</th>
                            <th align='center'>Date</th>
							<th align='center'>Generator</th> 
							    
							<th  align='center'>Running Hours</th> 
                            <th  align='center'>Fuel Consumed(In Ltrs)</th> 
                            <th  align='center'>Economy(Ltrs/Hr)</th> 
                            <th  align='center'>Fuel Added(In Ltrs)</th> 
                            <th  align='center'>Fuel Removed(In Ltrs)</th> 
                            <th  align='center'>Fuel Left(In Ltrs)</th>
							</tr>
							<?php for($i=0;$i<count($dgdata[0]);$i++){ ?>
							<tr>
							<td align='center' ><?php echo $i+1; ?></td>
							<td align='center' ><?php echo $dgdata[0][$i]['date']; ?></td>
							<td align='center' ><?php echo $dgdata[0][$i]['dgname']; ?></td>
							
							<td align='center' ><?php echo $dgdata[0][$i]['run']; ?></td>
                            <td align='center' ><?php echo $dgdata[0][$i]['fconsume']; ?></td>
							<td align='center' ><?php echo $dgdata[0][$i]['economy']; ?></td>
							<td align='center' ><?php echo $dgdata[0][$i]['fadd']; ?></td>
							<td align='center' ><?php echo $dgdata[0][$i]['fremove']; ?></td>
                            <td align='center' ><?php echo $dgdata[0][$i]['availableFuel']; ?></td>							
							</tr>
							<?php }?>
							
                            </thead>
						<tbody>
							
							
						</tbody>
					</table>
