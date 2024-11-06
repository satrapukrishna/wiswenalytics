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


                        <input type="hidden" id="page" value="management" />


                        <div class="panel-heading"> 


                            <h3 class="panel-title">Data Management</h3>


                            <div class="col-md-2 col-md-offset-10">


                            </div>


                        </div>


                        <div class="panel-body">


                            <div class="col-md-12">


                                <div>


                                    <form role="form" class="form-horizontal" action="" method="get">


                                        <div class="form-group">


                                            <div class="col-md-3"><label>Search By</label>     


                                                <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Type" value="<?php echo $this->input->get('search_keyword') ?>" autocomplete="off"/>


                                            </div>
                                            

                                            <div class="col-md-2 seach-button">



                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search </button> 


                                                &nbsp;<a href="" class="btn btn-default">Clear</a>


                                            </div>


                                            <?php //if(modules::run('admin/site/authlink','client_edit')){ ?>


                                                <div class="seach-button">


                                                    <label> &nbsp; </label>


                                                    <div class="col-xs-2">


                                                        <a href="" class="btn btn-success">Add Management</a>


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
                                            <th>UniqueID</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1001987</td>
                                            <td>API</td>
                                            <td>Protech BMS</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>1001989</td>
                                            <td>API</td>
                                            <td>Protech WMS</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>2022203</td>
                                            <td>IP</td>
                                            <td>Chekhra Test</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>3002876</td>
                                            <td>Database</td>
                                            <td>IGreen Test</td>
                                            
                                        </tr>
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
