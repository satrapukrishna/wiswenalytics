<span class="SctnTtl" id="r_name" name="r_name">Firepump Report</span>
<table  class="RprtTbl" id="list">
			<tr> 
			
			<th colspan='5' ><?php echo $firepump_data[0]['meter'] ?> </th> 
			</tr>
		<tr> 
			
		<th colspan='5' ><?php echo $firepump_data[0]['meter'] ?> Running Hours Report</th> 
		</tr>
		<tr> 
		<th rowspan='2' >S. No.</th>
		<th rowspan='2' >Date</th>
			
		<th colspan='3' >Meters</th> 
		</tr>
		<tr>
		<?php for($i=0;$i<count($firepump_data[0]['fire_runn'][0]);$i++){ ?>
		<th><?php echo $firepump_data[0]['fire_runn'][0][$i]['meter'] ?></th>
		<?php }?>							
		</tr>
									
									
	
		<?php for($i=0;$i<count($firepump_data[0]['fire_runn']);$i++){ ?>
	<tr>
		<td ><?php echo $i+1; ?></td>
		<td ><?php echo $firepump_data[0]['fire_runn'][$i][0]['date']."/".date('l', strtotime($firepump_data[0]['fire_runn'][$i][0]['date'])); ?></td>						
		<?php for($j=0;$j<count($firepump_data[0]['fire_runn'][$i]);$j++){  ?>
			<td><?php echo $firepump_data[0]['fire_runn'][$i][$j]['running_hours']; ?></td>
			<?php }?>
									
	</tr>
	<?php }?>	
	<tr ><th colspan="9"></tr>
	<!-- DG -->
	<tr> 
							<th colspan="9"><?php echo $firepump_data[0]['meter'] ?> DG Running Hours Report</th>
                            
							</tr>
							<tr> 
							<th>S. No.</th>
                            <th>Date</th>
							<th>Generator</th> 
							    
							<th  >Running Hours</th> 
                            <th  >Fuel Consumed (In Ltrs)</th> 
                            <th  >Economy (Ltrs/Hr)</th> 
                            <th  >Fuel Added (In Ltrs)</th> 
                            <th  >Fuel Removed (In Ltrs)</th> 
                            <th  >Fuel Left (In Ltrs)</th>
							</tr>
							<?php for($i=0;$i<count($firepump_data[0]['fire_dg']);$i++){ ?>
							<tr>
							<td><?php echo $i+1; ?></td>
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['date']."/".date('l', strtotime($firepump_data[0]['fire_dg'][$i]['date'])); ?></td>
							<td><?php echo "Diesel Engine"; ?></td>
							
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['run']; ?></td>
                            <td><?php echo $firepump_data[0]['fire_dg'][$i]['fconsume']; ?></td>
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['economy']; ?></td>
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['fadd']; ?></td>
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['fremove']; ?></td>
                            <td><?php echo $firepump_data[0]['fire_dg'][$i]['availableFuel']; ?></td>							
							</tr>
							<?php }?>
							<!-- end DG -->
							<tr ><th colspan="9"></tr>

            <!-- Fuel Add Start -->
			<tr> 
							<th colspan="4"><?php echo $firepump_data[0]['meter'] ?> DG Fuel Added Report</th>
                            
							</tr>
							<tr> 
							<th style="width: 15%;">S. No.</th>
							<th style="width: 25%;">Date</th>
							<th style="width: 30%;">Generator</th>   
							
                            <th style="width: 30%;">Fuel Added (In Ltrs)</th>  
                           
							</tr>
							<?php for($i=0;$i<count($firepump_data[0]['fire_dg']);$i++){ ?>
							<tr>
							<td><?php echo $i+1; ?></td>
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['date']."/".date('l', strtotime($firepump_data[0]['fire_dg'][$i]['date'])); ?></td>
							<td><?php echo "Diesel Engine"; ?></td>
							
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['fadd']; ?></td>

                            						
							</tr>
							<?php }?>
							<!-- Fuel Add End -->
							<tr ><th colspan="4"></tr>
							<!-- Fuel Removed Start -->
							<tr> 
							<th colspan="4"><?php echo $firepump_data[0]['meter'] ?> DG Fuel Removed Report</th>
                            
							</tr>
							<tr> 
							<th style="width: 15%;">S. No.</th>
							<th style="width: 25%;">Date</th>
							<th style="width: 30%;">Generator</th>
							<th style="width: 30%;">Fuel Removed (In Ltrs)</th> 
                           
							</tr>
							<?php for($i=0;$i<count($firepump_data[0]['fire_dg']);$i++){ ?>
							<tr>
							<td><?php echo $i+1; ?></td>
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['date']."/".date('l', strtotime($firepump_data[0]['fire_dg'][$i]['date'])); ?></td>
							<td><?php echo "Diesel Engine"; ?></td>
							
							<td><?php echo $firepump_data[0]['fire_dg'][$i]['fremove']; ?></td>

                            						
							</tr>
							<?php }?>
							<!-- Fuel Removed End -->
							<tr ><th colspan="4"></tr>
							<tr ><th colspan="4"></tr>
							<!-- Phase 2 Start -->
							<tr> 
							<th colspan="4"><?php echo $firepump_data[1]['meter'] ?> </th>
                            
							</tr>
							<tr> 
							<th colspan="4"><?php echo $firepump_data[1]['meter'] ?> Running Hours Report</th>
                            
							</tr>
							<tr> 
							<th rowspan='2' >S. No.</th>
							<th rowspan='2' >Date</th>
							   
							<th colspan='2' >Meters</th> 
							</tr>
							
							<tr>
							<?php for($i=0;$i<count($firepump_data[1]['fire_runn'][0]);$i++){ ?>
							<th><?php echo $firepump_data[1]['fire_runn'][0][$i]['meter'] ?></th>
							<?php }?>							
							</tr>
														
														
						
							<?php for($i=0;$i<count($firepump_data[1]['fire_runn']);$i++){ ?>
						<tr>
							<td ><?php echo $i+1; ?></td>
							<td ><?php echo $firepump_data[1]['fire_runn'][$i][0]['date']."/".date('l', strtotime($firepump_data[1]['fire_runn'][$i][0]['date'])); ?></td>						
							<?php for($j=0;$j<count($firepump_data[1]['fire_runn'][$i]);$j++){  ?>
								<td><?php echo $firepump_data[1]['fire_runn'][$i][$j]['running_hours']; ?></td>
								<?php }?>
														
						</tr>
						<?php }?>	
						<tr ><th colspan="9"></tr>
						<tr> 
							<th colspan="9"><?php echo $firepump_data[1]['meter'] ?> DG Running Hours Report</th>
                            
							</tr>
							<tr> 
							<th>S. No.</th>
                            <th>Date</th>
							<th>Generator</th> 
							    
							<th  >Running Hours</th> 
                            <th  >Fuel Consumed (In Ltrs)</th> 
                            <th  >Economy (Ltrs/Hr)</th> 
                            <th  >Fuel Added (In Ltrs)</th> 
                            <th  >Fuel Removed (In Ltrs)</th> 
                            <th  >Fuel Left (In Ltrs)</th>
							</tr>
							<?php for($i=0;$i<count($firepump_data[1]['fire_dg']);$i++){ ?>
							<tr>
							<td><?php echo $i+1; ?></td>
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['date']."/".date('l', strtotime($firepump_data[1]['fire_dg'][$i]['date'])); ?></td>
							<td><?php echo "Diesel Engine"; ?></td>
							
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['run']; ?></td>
                            <td><?php echo $firepump_data[1]['fire_dg'][$i]['fconsume']; ?></td>
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['economy']; ?></td>
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['fadd']; ?></td>
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['fremove']; ?></td>
                            <td><?php echo $firepump_data[1]['fire_dg'][$i]['availableFuel']; ?></td>							
							</tr>
							<?php }?>
							<tr ><th colspan="4"></tr>
							<tr> 
							<th colspan="4"><?php echo $firepump_data[1]['meter'] ?> DG Fuel Added Report</th>
                            
							</tr>
							<tr> 
							<th style="width: 15%;">S. No.</th>
							<th style="width: 25%;">Date</th>
							<th style="width: 30%;">Generator</th>   
							
                            <th style="width: 30%;">Fuel Added (In Ltrs)</th> 
                           
							</tr>
							<?php for($i=0;$i<count($firepump_data[1]['fire_dg']);$i++){ ?>
							<tr>
							<td><?php echo $i+1; ?></td>
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['date']."/".date('l', strtotime($firepump_data[1]['fire_dg'][$i]['date'])); ?></td>
							<td><?php echo "Diesel Engine"; ?></td>
							
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['fadd']; ?></td>

                            						
							</tr>
							<?php }?>
							<tr ><th colspan="4"></tr>
							<tr> 
							<th colspan="4"><?php echo $firepump_data[1]['meter'] ?> DG Fuel Removed Report</th>
                            
							</tr>
		<tr> 
			<th style="width: 15%;">S. No.</th>
			<th style="width: 25%;">Date</th>
			<th style="width: 30%;">Generator</th>
			<th style="width: 30%;">Fuel Removed (In Ltrs)</th> 		
		</tr>
		<?php for($i=0;$i<count($firepump_data[1]['fire_dg']);$i++){ ?>
							<tr>
							<td><?php echo $i+1; ?></td>
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['date']."/".date('l', strtotime($firepump_data[1]['fire_dg'][$i]['date'])); ?></td>
							<td><?php echo "Diesel Engine"; ?></td>
							
							<td><?php echo $firepump_data[1]['fire_dg'][$i]['fremove']; ?></td>

                            						
							</tr>
							<?php }?>

</table>
					
					
			