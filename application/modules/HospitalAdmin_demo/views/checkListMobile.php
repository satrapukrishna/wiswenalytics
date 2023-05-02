<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendence List</title>
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
   
        <div class="ContainerRight">
             <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                      
                        <div class="col-md-2">
                                    <select class="form-select InptBx" aria-label="Default select example">
                                        <option selected>Select List</option>
                                        <option value="1">Electrical</option>
                                        <option value="1">ELV</option>
                                        <option value="2">Fire</option>
                                        <option value="3">HVAC </option>
                                        <option value="3">PHE</option>
                                        <!-- <option value="3">Plumber</option> -->
                                    
                                    </select>
                        </div>
                        <div class="col-md-2">
                                    <select class="form-select InptBx" aria-label="Default select example">
                                        <option selected>Select Sub List</option>
                                        <option value="1">Common Area Meter Reading</option>
                                        <option value="1">DG Daily</option>
                                        <option value="2">Diesel Consumption</option>
                                        <option value="3">HT Meter </option>
                                        <option value="3">UPS</option>
                                        <!-- <option value="3">Plumber</option> -->
                                    
                                    </select>
                        </div>
                        <div class="col-md-2 BttnHldr">
                            <a href="<?php echo base_url(); ?>asset/hospital_admin/Documents/CommonAreaMeterReading_sheet.xlsx" class="btn" download><i class="fa fa-download"></i>Sample Form</a>                           
                        </div>
                        
                        
                        <div class="col-md-3 BttnHldr">
                            <input type="file"  class="btn btn-primary"></input>
                        </div>
                        <div class="col-md-1 BttnHldr">
                            <button type="button" onclick=""  class="btn btn-primary">Submit</button>
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
                        <div style="border: 2px solid #8484997d;  box-sizing: border-box;width: 95%; margin-left: 10px;border-radius:8px;height:90%">
                            <!-- <div class="LdrPrfDtlsHldr" style="margin-left: 15px;margin-top:10px;">
                                <span  class="nn">Employee Name:</span><br>
                                <input type="text" id="fname" name="fname" placeholder="Employee Name"><br>
                                <span class="nn">Department:</span><br>
                                <input type="text" id="lname" name="lname">
                                
                                
                            
                            </div>
                            <div class="LdrPrfDtlsHldr" style="margin-left: 15px;margin-top:10px">
                                <span  class="nn">Department:</span><br>
                                <input type="text" id="fname" name="fname"><br>
                                <span class="nn">Job Title:</span><br>
                                <input type="text" id="lname" name="lname">
                              
                            </div> -->
                            <div class="or"></div>
                            <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Employee Name">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Employee ID">
                                </div>
                            </div>
                            <div class="or"></div>
                            
                            <div class="row">
                        
                                <div class="col-md-6">
                                    <select class="form-select InptBx" aria-label="Default select example">
                                        <option selected>Service Department</option>
                                        <!-- <option value="1">All</option> -->
                                        <option value="1">Electrical</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Nursing </option>
                                        <option value="3">Janitor</option>
                                        <option value="3">Plumber</option>
                                    
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select InptBx" aria-label="Default select example">
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
                        
                                <!-- <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Date">
                                   
                                </div> -->
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="CheckInTime">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="CheckOutTime">
                                   
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Shift">
                                   
                                </div>
                                <!-- <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Present">
                                   
                                </div> -->
                            </div>
                            <!-- <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="CheckOutTime">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Present">
                                   
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Obsent">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Late">
                                   
                                </div>
                            </div>
                            <div class="or"></div>
                             <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="OverTime">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="SickLeave">
                                   
                                </div>
                            </div>
                            <div class="or"></div>
                             <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="CasualLeave">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="MeternatyLeave">
                                   
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Holiday">
                                   
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="NationalHoliday">
                                   
                                </div>
                            </div>
                            <div class="or"></div>
                            <div class="row">
                        
                                <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control InptBx Clndr" placeholder="Festive Holiday">
                                   
                                </div>
                                
                            </div> -->
                            <div class="or"></div>
                            
                            <div class="LdrPrfDtlsHldr" style="margin-left: 15px;margin-top:10px">
                                
                                <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin_demo/attendence'" class="btn btn-primary SbmtBtn" >Submit</button>
                            
                            </div>
                        </div>
                        
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
