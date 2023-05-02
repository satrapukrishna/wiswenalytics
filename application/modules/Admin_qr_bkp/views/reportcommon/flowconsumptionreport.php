<div  class="text-head"> Flow Meter Consumption Report</div>

<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
	<thead>
							<tr style="font-weight: bold;">
								<th class="text-center">Sno.</th>								
								<th class="text-center">Meter</th>
								<!-- <th class="text-center">location</th> -->
								<th class="text-center">Date/Hours	</th>
								<th class="text-center">Consumption</th>
								
								
								
							</tr>
						</thead>
						<tbody>
							
								<tr>
								<td class="text-center">1</td>
								
								<td class="text-center">Meter 01</td>
								<!-- <td class="text-center">Tower A</td> -->
								<td class="text-center"><?php echo date('d-m-Y') ?></td>
								<td class="text-center">700KL</td>
								
								
								</tr>
								<tr>
								<td class="text-center">2</td>
								
								<td class="text-center">Meter 01</td>
								<!-- <td class="text-center">Tower A</td> -->
								<td class="text-center"><?php echo date('d-m-Y', strtotime( $d . " -1 days")); ?></td>
								<td class="text-center">670KL</td>
								
								</tr><tr>
								<td class="text-center">3</td>
								
								<td class="text-center">Meter 01</td>
								<!-- <td class="text-center">Tower A</td> -->
								<td class="text-center"><?php echo date('d-m-Y', strtotime( $d . " -2 days")); ?></td>
								<td class="text-center">650KL</td>
								
								</tr>
								
								
							
						</tbody>
					</table>