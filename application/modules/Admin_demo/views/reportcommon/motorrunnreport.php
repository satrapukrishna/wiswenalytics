<div  class="text-head"> Motor Monitoring Running Hours Report</div>

<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
						<thead>
							<tr style="font-weight: bold;">
								<th class="text-center">Sno.</th>								
								<th class="text-center">Meter</th>
								<th class="text-center">location</th>
								<th class="text-center">Date/Hours	</th>
								<th class="text-center">Today Consumption</th>
								<th class="text-center">Avg Consumption</th>
								
								<th class="text-center">% Diffrence</th>
								
							</tr>
						</thead>
						<tbody>
							
								<tr>
								<td class="text-center">1</td>
								
								<td class="text-center">Motor-1</td>
								<td class="text-center">Tower A</td>
								<td class="text-center"><?php echo date('d-m-Y') ?></td>
								<td class="text-center">0.0KL</td>
								<td class="text-center">0.0KL</td>
								
								<td class="text-center">0</td>
								</tr>
								<tr>
								<td class="text-center">2</td>
								
								<td class="text-center">Motor-1</td>
								<td class="text-center">Tower A</td>
								<td class="text-center"><?php echo date('d-m-Y', strtotime( $d . " -1 days")); ?></td>
								<td class="text-center">0.0KL</td>
								<td class="text-center">0.0KL</td>
								
								<td class="text-center">0</td>
								</tr><tr>
								<td class="text-center">3</td>
								
								<td class="text-center">Motor-1</td>
								<td class="text-center">Tower A</td>
								<td class="text-center"><?php echo date('d-m-Y', strtotime( $d . " -2 days")); ?></td>
								<td class="text-center">0.0KL</td>
								<td class="text-center">0.0KL</td>
								
								<td class="text-center">0</td>
								</tr>
						</thead>
						<tbody>
							
							
						</tbody>
					</table>