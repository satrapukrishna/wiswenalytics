<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Departments</title>
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
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/updateList" class="LnkTxt">Update List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt">Departments List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewVacancy" class="LnkTxt">Vacancies</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceList" class="LnkTxt">Attendence</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/departments" class="LnkTxt Actv">Departments</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="ContainerRight">
             <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-2 BttnHldr">
                            <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add Department</button>
                        </div>
                        <div class="col-md-1 BttnHldr or">OR</div>
                        
                        <div class="col-md-2 BttnHldr">
                            <a href="<?php echo base_url(); ?>asset/hospital_admin/Documents/Attendance_sheet.xlsx" class="btn" download><i class="fa fa-download"></i>Sample Department</a>                           
                        </div>
                        
                        
                        <div class="col-md-3 BttnHldr">
                            <input type="file"  class="btn btn-primary"></input>
                        </div>
                        <div class="col-md-1 BttnHldr">
                            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin_demo/attendence'"  class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                   
                </div>
             </div> 
             <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-6">
                        <p><?php echo validation_errors(); ?></p>
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
                       
                    </div>
                    
                </div>
             </div>          
           
           
        </div>
    </div>
<div id="AppMdlHldr" class="AppModalHldr Hide">
    <div class="AppModalInnrHldr LdrShpPrfl" style="height: 40%;width:40%;left:30%;top:30%">
        <div class="ModalTtlHldr LdrshpTtl" style="height: 100%;">
            <span class="PrflName">Add Attendence</span>
            <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                <div class="ModalCntntHldr LdrshpDtl" style="top:25px;height:90%">
                    <div class="or"></div>
                    <?php echo form_open_multipart('HospitalAdmin_demo/create_department/', array('id' => 'create_department','class' => 'form-horizontal')); ?>
                    <div style="border: 2px solid #8484997d;  box-sizing: border-box;width: 95%; margin-left: 10px;border-radius:8px;height:90%">
                        <div class="or"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="department_name" name="department_name" class="form-control InptBx Clndr" placeholder="Service Department Name">                                   
                            </div>                               
                        </div>
                        <div class="or"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="department_sub_name" name="department_sub_name" class="form-control InptBx Clndr" placeholder="Job Title">
                            </div>
                        </div>
                        <div class="or"></div>
                        <div class="row">
                            <label class="col-md-2 text-right">Status <span class="required_fields"></span>( Active / Inactive )</label>
                            <div class="col-md-3">
                                <label class="switch">
                                    <input type="checkbox" name="status">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="or"></div>
                        <div class="LdrPrfDtlsHldr" style="margin-left: 15px;margin-top:10px">
                            <button type="submit"  class="btn btn-primary SbmtBtn" >Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>
</body>
</html>
