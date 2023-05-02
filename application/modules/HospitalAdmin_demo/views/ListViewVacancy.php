<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vacancies</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <style>
        td ,th{
        width: 25% ;
        }
.DataTxt{
    width: 25% ;  
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
                    <!-- <li>
                        <a href="<?php //echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt">Departments</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt">Departments List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewVacancy" class="LnkTxt Actv">Vacancies</a>
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
                                <div class="col-md-3" style="font: 600 15px/100% 'Open Sans';    color: #0078BA;    padding-top: 16px;
                                            font-weight: bold;width:10%">
                                    Vacancies
                                </div>
                                <div class="col-md-6 BttnHldr">
                                    <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add New Vacancy</button>
                                </div>
                            </div>
                    </div>
                </div>
                
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Service Department</option>
                                <option value="1">All</option>
                                <option value="1">Electrical</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Nursing </option>
                                <option value="3">Janitor</option>
                                <option value="3">Plumber</option>
                               
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
                       
                       
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Sort by</option>
                                <option value="1">Job Title</option>
                                <option value="2">Service Department</option>
                               
                            </select>
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
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Number Of Vacancies</span>
                                </th>
                                
                                
                            </tr>
                           
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">32</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">2</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
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
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Number Of Vacancies</span>
                                </th>
                                
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Electrician</span>
                                </td>
                                <td>
                                    <span class="DataTxt">22</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Electrician</span>
                                </td>
                                <td>
                                    <span class="DataTxt">12</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
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
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Number Of Vacancies</span>
                                </th>
                                
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">6</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Plumber</span>
                                </td>
                                <td>
                                    <span class="DataTxt">12</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
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
                                    <span class="DataTtl">Service Department</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Job Title</span>
                                </th>
                                <th>
                                    <span class="DataTtl">Number Of Vacancies</span>
                                </th>
                                
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Senior Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">3</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">22</span>
                                    <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="BtnLnk" style="color:blue">View</span>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="AppMdlHldr" class="AppModalHldr Hide">
    <div class="AppModalInnrHldr" style="width:50%;height:40%;left:30%;top:16%">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Electrical</span>
                    <span class="FtrTtl">Vacancies List</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                </div>
                
                <div class="ModalCntntHldr" style="top:60px;height:100%">
                    <div class="TableHldr">
                        <table class="AppDataTbl" style="width: 100%;">
                            <tr class="Hdr">
                                <th ><span class="DataTtl">Sno</span></th>
                                <th ><span class="DataTtl">Service Department</span></th>
                                <th ><span class="DataTtl">Branch Name</span></th>
                                
                                <th  ><span class="DataTtl">Job Title</span></th>
                                <th  ><span class="DataTtl">Vacancies</span></th>
                                <th  ><span class="DataTtl">Expired</span></th>
                                <th  ><span class="DataTtl">Action</span></th>
                                
                            </tr>
                            
                            <tr>
                                <td><span class="DataTxt">1</span></td>
                                <td><span class="DataTxt">Electrical</span></td>
                                <td><span class="DataTxt">Kondapur</span></td>
                                <td ><span class="DataTxt">Senior Electrician</span></td>
                                <td ><span class="DataTxt">3</span></td>
                                <td><span class="DataTxt">12-05-2022</span></td>
                                <td><button type="button" onclick="" class="btn btn-primary SbmtBtn">Update</button></td>
                                
                            </tr>
                            <tr>
                                <td><span class="DataTxt">2</span></td>
                                <td><span class="DataTxt">Electrical</span></td>
                                <td><span class="DataTxt">Visakapatnam</span></td>
                                <td ><span class="DataTxt">Junior Electrician</span></td>
                                <td ><span class="DataTxt">3</span></td>
                                <td ><span class="DataTxt">12-05-2022</span></td>
                                <td><button type="button" onclick="" class="btn btn-primary SbmtBtn">Update</button></td>
                            </tr>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
