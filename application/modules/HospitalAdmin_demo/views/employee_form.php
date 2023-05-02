<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update List</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .or{
            text-align: center;
    font-weight: bold;
    font-size: 17px;
    text-align: center;
    margin-top: 10px;
    
        }
        .nn{
            font: 600 12px/100% 'Open Sans';
            color: #333;
            margin-left: 15px;
        }
        .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
  width: 100%;
    padding: 12px 40px 12px 12px;
    font: 600 12px/100% 'Open San';
}
.row1 {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: calc(var(--bs-gutter-x)/ -2);
    margin-left: calc(var(--bs-gutter-x)/ -2);
    margin-bottom: 15px;
}
label {
    padding-left: 50px;
}
/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
    </style>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer FllScrn">
    <div class="ContainerLeft">
            <span class="SctnTtl CmplntsFdbck">List View</span>
            <div class="SctnInnerLnks">
               
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listView" class="LnkTxt">Employee List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/updateList" class="LnkTxt Actv">Update List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt">Departments</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewVacancy" class="LnkTxt">Vacancies</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceList" class="LnkTxt">Attendence</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="ContainerRight">
               <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-left: 10px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class=""></i></a></li>
                        <li class="active"><a href="<?php echo site_url('HospitalAdmin_demo/updateList') ?>">Back</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-default">
                        <input type="hidden" id="page" value="employees" />
                        <div class="panel-heading"> 
                            <h3 class="panel-title">
                                <?php if ($mode == 'edit'): ?>
                                    Edit Employee
                                <?php else: ?>
                                   Add Employee
                                <?php endif; ?>
                            </h3>
                            <div class="col-md-2 col-md-offset-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if (isset($employee) && $employee): ?>
                                    <?php echo form_open_multipart('Admin/Employees/edit_employee/' . $employee['emp_id'] . '/edit', array('id' => 'edit_employee','class' => 'form-horizontal')); ?>
                                    <div class="row1">
                                        <?php if (isset($msg)): ?>
                                            <p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <p><?php echo validation_errors(); ?></p>
                                        <?php if (isset($error)): ?>
                                            <p class="alert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>    
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>
                                    </div>
										<div class="row1">
                                            <label class="col-md-2">Employee Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="empname" value="<?php echo $employee['name']  ?>" placeholder="Please Employee Name"/>
                                             </div>
											  <label class="col-md-2">Emplyee ID <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="empid" value="<?php echo $employee['emp_id']  ?>" placeholder="Please Enter Emplyee ID"/>
                                             </div> 
											 
                                        </div>
										
										
										
                                        <div class="row1">
                                            <label class="col-md-2">Email Id <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="email" class="form-control" name="email_id" value="<?php echo $employee['email_id']  ?>" placeholder="Please Enter Valid Email Id"/>
                                             </div>
                                             <label class="col-md-2">Gender<span class="required_fields"></span></label>

                                                <div class="col-md-3">
                                                <?php echo form_dropdown('gender', $gender, $employee['gender'], 'class="form-control chosen-select" id="gender" '); ?>
                                                </div>
                                            
                                        </div>
										<div class="row1">
                                            <label class="col-md-2 text-right">Department <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                             <?php echo form_dropdown('department',$department,$employee['department'],'class="form-control select2" id="department" onchange="getsubdepart()"'); ?>
                                             </div>
											  <label class="col-md-2">Job Title<span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                             <?php echo form_dropdown('sub_department', $device, $employee['sub_department'], 'class="form-control chosen-select" id="subdepart" '); ?>
                                             </div> 
											 
                                        </div>
										
										
                                        <div class="row1">
                                            <label class="col-md-2">Address <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <textarea class="form-control" name="address" placeholder="Please Enter Addess"><?php echo $employee['address']?></textarea>
                                             </div>
											  <label class="col-md-2">Contact Details <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="contact" value="<?php echo $employee['contact']  ?>" placeholder="Please Enter Contact Details"/>
                                             </div> 
											 
                                        </div>
										
										<div class="row1">									

											<label class="col-md-2">City</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="city" value="<?php echo $employee['city']  ?>" placeholder="Please Enter City"/>										
											</div>
											
											
											<label class="col-md-2">Date of Joining</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="date_of_joining" value="<?php echo $employee['date_of_joining']  ?>" id="datepicker"/>										
											</div>

											
											
										</div>	
										
										<div class="row1">
											 
                                            
											 <label class="col-md-2">Upload Document <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="files[]" multiple="multiple"/>
												<input  type="hidden" class="form-control" name="old_file" value="<?php echo $employee['doc'];?>"/> 
												<br/>
												<?php if($employee['doc']!=''){

												$str=explode(",",$employee['doc']);
												foreach($str as $stra)

												{?>
												<?php if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
												<img src="<?php echo site_url() ?>asset/hospital_admin/employee_docs/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> 
												<?php }else{ echo "<br>"; ?>
												<a href="<?php echo site_url() ?>asset/hospital_admin/employee_docs/<?php echo  $stra ?>"><i class="fa fa-cloud-download"></i> <?php echo  $stra ?></a>
												<?php } } 
												} ?>
										
                                             </div>
											 
											 <label class="col-md-2">Upload Photograph <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="image"/>
												 <input  type="hidden" class="form-control" name="old_image" value="<?php echo $employee['profile_pic'];?>"/> 
													<br/>
													<?php if($employee['profile_pic']!=''){

													$str=explode(",",$employee['profile_pic']);
													foreach($str as $stra)

													{?>
													<?php if(substr($stra,-4)=='.jpg' || substr($stra,-4)=='.png' || substr($stra,-4)=='.gif' || substr($stra,-5)=='.jpeg'){ ?>
													<img src="<?php echo site_url() ?>asset/hospital_admin/employee_pic/<?php echo  $stra ?>" class="img-thumbnail" width="150" height="100" /> 
													<?php } } 
													} ?>
											
												 </div>
                                        </div> 
										
										<div class="row1">
                                        <label class="col-md-2 text-right">Status <span class="required_fields"></span>(Active / Inactive)</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status" <?php echo ($employee['status']==1)?'checked':''?>>
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
										<div class="row1">
                                             <div class="col-md-12 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Employees'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
                                </form>
								<?php else: ?>
                                <p><?php echo validation_errors(); ?></p>
                                <?php echo form_open_multipart('HospitalAdmin_demo/create_employee/', array('id' => 'create_client','class' => 'form-horizontal')); ?>
                                    <div class="row1">
                                        <?php if (isset($msg)): ?>
										<p class="alert alert-success"><?php echo $msg; ?></p>
                                        <?php endif; ?>
                                        <?php if (isset($error)): ?>
                                            <p class="alert alert-danger"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?> 
                                        <?php if ($this->session->flashdata('msg') != '') { ?>
                                            <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>
                                        <?php } ?>  
                                    </div> 
                                    <div class="row1">
                                            <label class="col-md-2">Employee Name <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="empname" value="<?php echo set_value('empname')  ?>" placeholder="Please Employee Name"/>
                                             </div>
											  <label class="col-md-2">Emplyee ID <span class="required_fields">*</span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="empid" value="<?php echo set_value('empid')  ?>" placeholder="Please Enter Emp ID"/>
                                             </div> 
											 
                                        </div>
										
										
                                        <div class="row1">
                                            <label class="col-md-2">Email Id <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                                <input type="email" class="form-control" name="email_id" value="<?php echo set_value('email_id')  ?>" placeholder="Please Enter Valid Email Id"/>
                                             </div>
                                             <label class="col-md-2">Gender<span class="required_fields"></span></label>

                                                <div class="col-md-3">
                                                <?php echo form_dropdown('gender', $gender, '', 'class="form-control chosen-select" id="gender" '); ?>
                                                </div>
                                             
                                        </div>
										
										<div class="row1">
                                            <label class="col-md-2 text-right">Department <span class="required_fields">*</span></label>
                                             <div class="col-md-3">
                                             <?php echo form_dropdown('department',$department,'','class="form-control select2" id="department" onchange="getsubdepart()"'); ?>
                                             </div>
											  <label class="col-md-2">Job Title<span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                             <?php echo form_dropdown('sub_department', $device, '', 'class="form-control chosen-select" id="subdepart" '); ?>
                                             </div> 
											 
                                        </div>
										
                                        <div class="row1">
                                            <label class="col-md-2">Address <span class="required_fields"></span></label>
                                             <div class="col-md-3">
                                                <textarea class="form-control" name="address" placeholder="Please Enter Addess"></textarea>
                                             </div>
											  <label class="col-md-2">Contact Details <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="text" class="form-control" name="contact" value="<?php echo set_value('contact')  ?>" placeholder="Please Enter Contact Details"/>
                                             </div> 
											 
                                        </div>
										
										<div class="row1">									

											<label class="col-md-2">City</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="city" value="" placeholder="Please Enter City"/>										
											</div>
											
											
											<label class="col-md-2">Date of Joining</label>
											<div class="col-md-3">
											<input type="text" class="form-control" name="date_of_joining" value="" id="datepicker"/>										
											</div>

											
											
										</div>	
										
										<div class="row1">
											 
                                            
											 <label class="col-md-2">Upload Document <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control"  name="files[]" multiple="multiple">
                                             </div>
											 
											 <label class="col-md-2">Upload Photograph <span class="required_fields"></span></label>

                                             <div class="col-md-3">
                                                <input type="file" class="form-control" name="image"/>
                                             </div>
                                        </div> 
										
										<div class="row1">
											 
											 
											 <label class="col-md-2">Status <span class="required_fields"></span>( Active / Inactive )</label>
											 <div class="col-md-3">
												 <label class="switch">
												  <input type="checkbox" name="status">
												  <span class="slider round"></span>
												  </label>
											</div>
											
										</div>
										
									
										
										
										
										
										
                                        <div class="row1">
                                             <div class="col-md-6 text-center">
                                                 <button data-toggle="tooltip" title="Save" title="Save" type="submit" class="btn btn-success">Save</button> &nbsp;
                                                <a data-toggle="tooltip"  title="Cancle" href="<?php echo site_url('Admin/Employees'); ?>" class="btn btn-default">Cancel</a>
                                             </div>
                                        </div>
										
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
  <!-- /.content-wrapper -->          
           
           
        </div>
    </div>
    <div id="AppMdlHldr" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr LdrShpPrfl" style="height: 58%;">
                <div class="ModalTtlHldr LdrshpTtl" style="height: 100%;">
                    
                    <span class="PrflName">Add Employee</span>
                    
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                    <div class="ModalCntntHldr LdrshpDtl" style="top:60px">
                        <div class="or"></div>
                        <?php echo form_open_multipart('HospitalAdmin_demo/create_employee/', array('id' => 'create_employee','class' => 'form-horizontal')); ?>
                        <div style="border: 2px solid #8484997d;  box-sizing: border-box;width: 95%; margin-left: 10px;border-radius:8px">                           
                            <div class="row1">                        
                                <div class="col-md-6">
                                <input type="text" id="empname" name="empname" class="form-control InptBx Clndr" placeholder="Employee Name">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="email" name="email" class="form-control InptBx Clndr" placeholder="Email">
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row1">                        
                                <div class="col-md-6">
                                    <input type="text" id="phone" name="phone" class="form-control InptBx Clndr" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select InptBx" name="experience" aria-label="Default select example">
                                        <option selected>Experience</option>
                                        <option value="1">6 Months</option>
                                        <option value="2">1 Year</option>
                                        <option value="3">2+ Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row1">                        
                                <div class="col-md-6">
                                    <select class="form-select InptBx" name="dept" aria-label="Default select example">
                                        <option selected>Service Department</option>
                                        <!-- <option value="1">All</option> -->
                                        <option value="1">Electrical</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Nursing </option>
                                        <option value="4">Janitor</option>
                                        <option value="5">Plumber</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select InptBx" name="jobtl" aria-label="Default select example">
                                        <option selected>Job Title</option>
                                        <option value="1">Senior Electrician</option>
                                        <option value="2">Junior Electrician</option>
                                        <option value="3">DG Operator</option>
                                        <option value="3">Senior Janitor</option>
                                        <option value="3">Senior Plumber</option>
                                        <option value="3">Junior Plumber</option>
                                    </select>
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row1">
                                <div class="col-md-6">
                                    <input type="date" id="date" name="date" class="form-control InptBx Clndr" placeholder="Date">                                   
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select InptBx" name="gender" aria-label="Default select example">
                                        <option selected>Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="LdrPrfDtlsHldr" style="margin-left: 15px;margin-top:10px">                                
                                <button type="button" onclick="" class="btn btn-primary SbmtBtn" style="margin-left:30%">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
</body>
<script src="<?php echo base_url(); ?>asset/admin/js/bootstrap-datepicker.js"></script>
<script>

$('#datepicker').datepicker({
	   format: 'yyyy-mm-dd',
      autoclose: true
    });
function getsubdepart(){
    $("#subdepart").html("");
    var department = $("#department").val();
    
        // $(".device").show();
  
    $.ajax({
        type: 'GET',
        data: {
            department:department
        },
        url: '<?php echo base_url(); ?>HospitalAdmin_demo/ajax_sub_department_dropdown/',
        success: function (data){
            $("#subdepart").html(data);
            $("#subdepart").trigger("chosen:updated");
        }
    });
}



</script>
</html>
