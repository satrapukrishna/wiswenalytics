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
                        <li class="active"><a href="<?php echo site_url('Admin/Holiday_shift') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="hardware" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                              
                                   Holiday Manager
                              
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            
                           
                                
                              <form>
                                    <div class="form-group">
                                    <label class="col-md-2">Upload Holiday List <span class="required_fields"></span></label>

                                        <div class="col-md-3">
                                        <input type="file" class="form-control"  name="files[]" multiple="multiple">
                                        </div>
                                            
										
										
										
										
										
									
										
                                    
										<input type="hidden" name="textbox_data" value="" id="textbox_data">
										<input type="hidden" name="dropdown_data" value="" id="dropdown_data">
										
                                        <div class="form-group">
                                             <div class="col-md-12 text-center"><br/><br/><br/><br/>
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Holiday_shift'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
                            
                        </div>
                    </div>
                </section>
            </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.textbox{padding:7px;border:1px solid;
            border-color:#d2d6de;}
			.red{color:red}</style>
<script>


</script>
</body>
</html>
