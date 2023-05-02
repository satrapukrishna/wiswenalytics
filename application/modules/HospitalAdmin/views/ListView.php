<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List View</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
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
                        <a href="<?php echo base_url(); ?>HospitalAdmin/listView" class="LnkTxt Actv">Employee List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/updateList" class="LnkTxt">Update List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/listViewDepartment" class="LnkTxt">Departments</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/listViewVacancy" class="LnkTxt">Vacancies</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="ContainerRight">
             <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-3" style="font: 600 15px/100% 'Open Sans';    color: #0078BA;    padding-top: 16px;
    font-weight: bold;width:18%">
                            Employee List
                        </div>
                        <!-- <div class="col-md-6 BttnHldr">
                            <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add New Employee</button>
                        </div> -->
                    </div>
                </div>
           
           
           
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Service Department</option>
                                <option value="1">All</option>
                                <option value="2">Electrical</option>
                                <option value="3">Supervisor</option>
                                <option value="4">HVAC</option>
                                <option value="5">Janitor</option>
                                <option value="6">Plumber</option>
                               
                            </select>
                        </div>
                        <div class="col-md-2">
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
                        <div class="col-md-2 BttnHldr">
                        <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Joining To Date</option>
                                
                                <option value="1">6 Months</option>
                                <option value="2">1 Year</option>
                                <option value="3">2+ Year</option>
                               
                            </select>
                            <!-- <input type="text" class="form-control InptBx Clndr" id="Text1" value="Joining To Date" /> -->
                        </div>
                       
                        
                        <div class="col-md-2 BttnHldr">
                            <button type="button" onclick="" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr"> 
            <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">Supervisor Department
                </span>
            
                <div class="TableHldr">
                
                    <table class="AppDataTbl">
                        <tbody>
                            <tr class="Hdr">
                                <th>
                                    <span class="DataTtl">S. No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Joined On</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Previous Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Experience</span>
                                </th>
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1005</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">8</span>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1006</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Y. Suresh</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">7</span>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1007</span>
                                </td>
                                <td>
                                    <span class="DataTxt">M. Rarayan</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">4</span>
                                </td>
                                <td>
                                    <span class="DataTxt">6</span>
                                </td>
                               
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                <div style="padding-top:25px"></div>
                <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">HVAC Department
                </span>
            
                <div class="TableHldr">
                
                    <table class="AppDataTbl">
                        <tbody>
                            <tr class="Hdr">
                                <th>
                                    <span class="DataTtl">S. No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Joined On</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Previous Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Experience</span>
                                </th>
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1001</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">HVAC</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior HVAC</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1004</span>
                                </td>
                                <td>
                                    <span class="DataTxt">R. Gopal</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior HVAC</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                               
                            </tr>
                           
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1011</span>
                                </td>
                                <td>
                                    <span class="DataTxt">K Rajesh</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior HVAC</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">6</span>
                                </td>
                                
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                <div style="padding-top:25px"></div>
                <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">Electrical Department
                </span>
            
                <div class="TableHldr">
                
                    <table class="AppDataTbl">
                        <tbody>
                            <tr class="Hdr">
                                <th>
                                    <span class="DataTtl">S. No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Joined On</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Previous Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Experience</span>
                                </th>
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1001</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Electrician</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1004</span>
                                </td>
                                <td>
                                    <span class="DataTxt">R. Gopal</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Electrician</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                               
                            </tr>
                           
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1011</span>
                                </td>
                                <td>
                                    <span class="DataTxt">K Rajesh</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Electrician</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">6</span>
                                </td>
                                
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                <div style="padding-top:25px"></div>
                <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">Plumber Department
                </span>
            
                <div class="TableHldr">
                
                    <table class="AppDataTbl">
                        <tbody>
                            <tr class="Hdr">
                                <th>
                                    <span class="DataTtl">S. No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Joined On</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Previous Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Experience</span>
                                </th>
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1002</span>
                                </td>
                                <td>
                                    <span class="DataTxt">S. Balu</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                               
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1007</span>
                                </td>
                                <td>
                                    <span class="DataTxt">M. Rarayan</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">4</span>
                                </td>
                                <td>
                                    <span class="DataTxt">6</span>
                                </td>
                               
                            </tr>
                           
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1012</span>
                                </td>
                                <td>
                                    <span class="DataTxt">S. Das</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">6</span>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding-top:25px"></div>
               
                <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">Janitor Department
                </span>
            
                <div class="TableHldr">
                
                    <table class="AppDataTbl">
                        <tbody>
                            <tr class="Hdr">
                                <th>
                                    <span class="DataTtl">S. No.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Emp. ID.</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Employee Name</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Joined On</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Previous Experience</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Total Experience</span>
                                </th>
                                
                            </tr>
                           
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1003</span>
                                </td>
                                <td>
                                    <span class="DataTxt">K. Syam</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitors</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1004</span>
                                </td>
                                <td>
                                    <span class="DataTxt">R. Gopal</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">EMP-1005</span>
                                </td>
                                <td>
                                    <span class="DataTxt">N. Raju</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">18-01-2020</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">5</span>
                                </td>
                                <td>
                                    <span class="DataTxt">8</span>
                                </td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
