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
                    <!-- <li>
                        <a href="<?php //echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt">Departments</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt">Departments List</a>
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
             <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-2 BttnHldr">
                            <!-- <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add New Employee</button> -->
                            <a href="<?php echo site_url('HospitalAdmin_demo/create_employee') ?>" class="btn btn-success">Add Employee</a>
                        </div>
                        <div class="col-md-1 BttnHldr or">OR</div>
                        <div class="col-md-3 BttnHldr">
                       <a href="<?php echo base_url(); ?>asset/hospital_admin/Documents/employee_sheet.csv" class="btn" download><i class="fa fa-download"></i>
                        Existing Employee List
                                </a>                           
                        </div>
                        
                        <div class="col-md-3 BttnHldr">
                            <input type="file"  class="btn btn-primary"></input>
                        </div>
                        <div class="col-md-2 BttnHldr">
                            <button type="button"  class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
             </div>          
           
           
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
                            <div class="row">                        
                                <div class="col-md-6">
                                <input type="text" id="empname" name="empname" class="form-control InptBx Clndr" placeholder="Employee Name">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="email" name="email" class="form-control InptBx Clndr" placeholder="Email">
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row">                        
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
                            <div class="row">                        
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
                            <div class="row">
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
</html>
