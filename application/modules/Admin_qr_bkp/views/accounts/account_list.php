<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/datepicker3.css">
  
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


                        <input type="hidden" id="page" value="accounts" />


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Accounts</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">


                                            <div class="col-md-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Client, Account Type" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>
                                            <div class="col-md-2 seach-button">
                                            <input type="text" class="form-control" placeholder="From Date" name="from_date" value="<?php echo $this->input->get('from_date') ?>" id="datepicker"/>
                                            </div>
                                            <div class="col-md-2 seach-button">
                                            <input type="text" class="form-control" placeholder="To Date" name="to_date" value="<?php echo $this->input->get('to_date') ?>" id="datepicker1"/>
                                            </div>

                                            <div class="col-md-2 seach-button">



                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 


                                                &nbsp;<a href="<?php echo site_url('Admin/Accounts') ?>" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="seach-button">


                                                    <label> &nbsp; </label>


                                                    <div class="col-xs-2">


                                                        <a href="<?php echo site_url('Admin/Accounts/create_account') ?>" class="btn btn-success">Add Account</a>


                                                    </div>


                                                </div>


                                            <?php //} ?>


                                                                        


                                        </div>


                                    </form>


                                </div>
                                <br><br>
                                <div class="table-responsive">

                                <table class="table table-condensed">


                                    <thead>


                                        <tr>


                                            <th>S No.</th>


                                            <th>Client</th>
                                            <th>Account Type</th>
                                            <th>Document / Image</th>
                                            <th>Date</th>


                                            <th>Actions</th>


                                        </tr>


                                    </thead>


                                    <tbody>


                                        <?php


                                        if (!empty($accounts)) {
                                            $i=1;


                                            foreach ($accounts as $row) {  ?>


                                                <tr id="sp<?php echo $row->account_id; ?>">


                                                    <td><?php echo $i ?></td>

                                                    <td><?php echo $row->client; ?></td>
                                                    <td><?php echo $row->account_type; ?></td>
                                                    
                                                    <td>
                                                    
                                                    <?php 
                                                    $stra=$row->doc;
                                                    if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
                                                    <a href="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" target="_blank"><img src="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" class="img-thumbnail" width="80" /> </a>
                                                    <?php }else{ ?>
                                                    
                                                    <?php if(substr($stra,-4)=='.pdf'){?>
                                                    <a href="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" title="Download" target="_blank"><i class="fa fa-cloud-download"></i> View</a>
                                                    <?php }else{ ?>
                                                    <a href="<?php echo site_url() ?>asset/admin/account_docs/<?php echo  $stra ?>" title="Download" target="_blank"><i class="fa fa-cloud-download"></i> Download</a>
                                                    
                                                    <?php } }?><br>
                                                    
                                                    </td>
                                                    
                                                    <td><?php echo date('Y-M-d',strtotime($row->created_time)); ?></td>


                                                    <td>

                                                            <?php //if(modules::run('admin/site/authlink','employee_modify')){ ?>
                                                                
                                                                <a href="<?php echo site_url('Admin/Accounts/view_account/' . $row->account_id) ?>" title="View Account" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>

                                                                <a href="<?php echo site_url('Admin/Accounts/edit_account/' . $row->account_id) ?>" title="Edit Account" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>

                                                                <button type="button" onclick="removeAccount(<?php echo $row->account_id; ?>)" class="btn btn-danger btn-xs" title="Delete Account"><span class="glyphicon glyphicon-trash"></span></button>


                                                            <?php //} ?>

                                                    </td>


                                                     


                                                </tr>


                                            <?php $i++;}


                                            } else {


                                                echo '<tr class="text-info"><td colspan="5" class="text-center">No Records Found</td></tr>';


                                            }?>


                                    </tbody>


                                </table>


                            </div>
                            </div>


                            <div class="row text-center text-center-xs"><?php echo $pagination; ?></div>


                        </div>


                    </div>


                </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.btn-xs{padding:4px}</style>
<script src="<?php echo base_url(); ?>asset/admin/js/bootstrap-datepicker.js"></script>
<script>
    function removeAccount(accountId){
        var ans = confirm("Do you want delete this?");
        if(ans){
            $.ajax({
                url: BASE_URL+'Admin/Accounts/remove_account/'+accountId,
                dataType: 'text',
                success: function(data){
                    if(data == 1){
                        $("#sp"+accountId).fadeOut();
                    }else{
                        alert("Unable to delete this. Please try again later");
                    }
                }
            });
        }
    }
    
    $('#datepicker').datepicker({
      autoclose: true
    });
    $('#datepicker1').datepicker({
      autoclose: true
    });
</script>
</body>
</html>
