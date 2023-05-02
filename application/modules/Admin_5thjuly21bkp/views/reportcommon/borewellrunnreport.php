<div  class="text-head"> Borewell Running Report</div>

<table cellpadding="10" class="table table-condensed" style="background:#fff;padding:10px">
	<thead>
							<tr style="font-weight: bold;">
								<th class="text-center">Sno.</th>								
								<th class="text-center">Meter</th>
								<th class="text-center">location</th>
								<th class="text-center">Date/Hours	</th>
								<th class="text-center">Running Hours</th>
								<th class="text-center">Avg Flow Rate</th>
								<th class="text-center">Present Flow</th>
								<th class="text-center">% Diffrence</th>
								
							</tr>
						</thead>
						<tbody>
							
								<tr>
								<td class="text-center">1</td>
								
								<td class="text-center">Borewell-1</td>
								<td class="text-center">Tower A</td>
								<td class="text-center"><?php echo date('d-m-Y') ?></td>
								<td class="text-center">1 hour 10 mins</td>
								<td class="text-center">120KL</td>
								<td class="text-center">100KL</td>
								<td class="text-center">60</td>
								</tr>
								<tr>
								<td class="text-center">2</td>
								
								<td class="text-center">Borewell-1</td>
								<td class="text-center">Tower A</td>
								<td class="text-center"><?php echo date('d-m-Y', strtotime( $d . " -1 days")); ?></td>
								<td class="text-center">0 hour 36 mins</td>
								<td class="text-center">170KL</td>
								<td class="text-center">160KL</td>
								<td class="text-center">70</td>
								</tr><tr>
								<td class="text-center">3</td>
								
								<td class="text-center">Borewell-1</td>
								<td class="text-center">Tower A</td>
								<td class="text-center"><?php echo date('d-m-Y', strtotime( $d . " -2 days")); ?></td>
								<td class="text-center">2 hours 8 mins</td>
								<td class="text-center">150KL</td>
								<td class="text-center">145KL</td>
								<td class="text-center">65</td>
								</tr>
								
								
							
						</tbody>
					</table>