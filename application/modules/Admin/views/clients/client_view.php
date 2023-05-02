<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('common/header') ?>
  
  <?php $this->load->view('common/left_menu') ?>
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class=""></i></a></li>
                        <li class="active"><a href="<?php echo site_url('Admin/Clients') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="clients" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                
                                   View Client
                                
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
						
									<table class="table table-condensed">
                                    <thead>
										<tr>
											<td colspan="2"><h4>Personal Information</h4></td>
										</tr>

                                        <tr>
											<th width="20%">Client Name</th>
                                            <td><?php echo $client['client_name']  ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>  
										<tr>
											<th>Client Type</th>
                                            <td><?php echo $client['client_type']  ?></td>
										</tr>
										<tr>
											<th>Email Id</th>
                                            <td><?php echo $client['email_id']  ?></td>
										</tr>
										<tr>
											<th>Property Type</th>
                                            <td><?php echo $client['property_type']  ?></td>
										</tr>
										<tr>
											<th>Mobile</th>
                                            <td><?php echo $client['mobile']  ?></td>
										</tr>
										<tr>
											<th>City</th>
                                            <td><?php echo $client['city']  ?></td>
										</tr>
										<tr>
											<th>Address</th>
                                            <td><?php echo $client['address']  ?></td>
										</tr>
										<tr>
											<th>No Buildings</th>
                                            <td><?php echo $client['no_buildings']  ?></td>
										</tr>
										<?php  $i=1;
										
										foreach ($buildings->result_array() as $bul) { ?> 
											
												<tr>
												<td colspan="2">
													<div class="col-md-3">
												   <b class="error"> <?php echo $i; ?>.</b>    <label class="lav">Building Name - </label>
														<?php echo $bul['building_name'] ?>
													</div>
													<div class="col-md-3">
														<label class="lav">No. of Floors - </label>
														<?php echo $bul['floors']; ?>
													</div>   
													
													<div class="col-md-5">
														<label class="lav">Address - </label>
														<?php echo $bul['address']; ?>
													</div>                              
												   
												
													
											</td>	
											<tr>
										<?php $i++; } ?>
										<tr>
											<th>Sale By</th>
                                            <td><?php echo $client['partner_name']  ?></td>
										</tr>
										<tr>
											<th>Status</th>
                                            <td><?php if($client['status']==1)
													 echo "Active";
													else echo "Inactive";?></td>
										</tr>
										<tr>
											<td colspan="2"><br><br><h4>Personal Information</h4></td>
										</tr>
										<tr>
											<th>Station ID</th>
                                            <td><?php echo $client['station_id']  ?></td>
										</tr>
										<tr>
											<th>Grant Type</th>
                                            <td><?php echo $client['grant_type']  ?></td>
										</tr>
										<tr>
											<th>Token Username</th>
                                            <td><?php echo $client['token_username']  ?></td>
										</tr>
										<tr>
											<th>Token Password</th>
                                            <td><?php echo $client['token_password']  ?></td>
										</tr>
										<tr>
											<th>Store Code</th>
                                            <td><?php echo $client['store_code']  ?></td>
										</tr>
										
                                    </tbody>
									</table>
                                    
								
                        </div>
                    </div>
                </section>
            </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>

</body>
</html>
