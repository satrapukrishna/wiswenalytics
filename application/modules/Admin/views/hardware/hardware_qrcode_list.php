﻿<?php //print_r($hardwares);die(); ?>
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
    
    <!-- Main content -->
    <section class="content">


                    <div class="panel panel-default">


                        <input type="hidden" id="page" value="hardware" />


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Hardwares QRCode List</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">


                                            <div class="col-md-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Hardware Name, Type Name, Device Name" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>


                                            


                                            <div class="col-lg-3 seach-button">

                                               

                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 
                                                <button type="submit" class="btn btn-primary" onclick="printDiv()" ><span class="glyphicon glyphicon-print"></span> Print </button> 


                                                &nbsp;<a href="<?php echo site_url('Admin/Hardware/Qrcodes') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                           


                                                                        


                                        </div>


                                    </form>


                                </div>
								<br><br>

								<div class="table-responsive" >
                                <table class="table table-striped" id="printableTable">


                                    <thead>


                                        <tr>


                                            <th>S No.</th>
                                            <th>Category Name</th>
                                            <th>Device Name</th>
                                            <th>Hardware Name</th>
                                            <th>QR CODE Link</th>
                                            <th>QR CODE Device Id</th>
                                            
										
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if (!empty($hardwares)) {

											$i=1;
                                            foreach ($hardwares as $row) {  ?>


                                                <tr id="dp<?php echo $row->hardware_id; ?>">


                                                    <td><?php echo $i; ?></td>


                                                    <td><?php echo $row->category_name; ?></td>
                                                    <td><?php echo $row->device_name; ?></td>
                                                    <td><?php echo $row->dashboard_name; ?></td>
                                                   
                                                    <td><img src="<?php echo site_url() ?><?php echo  $row->qrcode_img_path ?>" width="150" /></td>
                                                    <td><img src="<?php echo site_url() ?><?php echo  $row->qrcode_device_path ?>" width="150" /></td>
													


                                                     


                                                </tr>


                                            <?php $i++; }


                                            } else {


                                                echo '<tr class="text-info"><td colspan="5" class="text-center">No Records Found</td></tr>';


                                            }?>


                                    </tbody>


                                </table>


                            </div>
                            <!-- <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe> -->
                            </div>


                            <div class="row text-center text-center-xs"><?php echo $pagination; ?></div>


                        </div>


                    </div>
					


                </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.btn-xs{padding:4px}
th{font-size: 14px;}

@media print {
  * {
    display: none;
  }
  #printableTable {
    display: block;
  }
}</style>
<script>
    function printDiv()
{
   var divToPrint=document.getElementById("printableTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}


    function printDiv88() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
	function removeHardware(hardwareId){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Hardware/remove_hardware/'+hardwareId,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						$("#dp"+hardwareId).fadeOut();
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}
	
</script>
</body>
</html>
