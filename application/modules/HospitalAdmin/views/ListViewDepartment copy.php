<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checklist Details</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
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
                        <a href="<?php echo base_url(); ?>HospitalAdmin/listView" class="LnkTxt">Employee List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/listView" class="LnkTxt">Update List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/listViewDepartment" class="LnkTxt Actv">Departments</a>
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
                            font-weight: bold;width:10%">
                            Departments
                        </div>
                        <div class="col-md-6 BttnHldr">
                            <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add/Update Department</button>
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
                                
                                
                            </tr>
                            <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Electrician</span>
                                </td>
                                
                                
                            </tr>
                            
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">3</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Electrical</span>
                                </td>
                                <td>
                                    <span class="DataTxt">DG Operator</span>
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
                                
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <span class="DataTxt">1</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Janitor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Janitor</span>
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
                               
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
                <div style="padding-top:25px"></div>
            </div>
        </div>
    </div>
    <div id="AppMdlHldr" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr">
            <div class="ModalTtlHldr">
                <div class="ModalTtlHldr">
                    <span class="SctnTtl">Electrical</span>
                    <span class="FtrTtl">Common Area Meter Reading</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                </div>
                <div class="ModalFnctnHldr">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="InnrTtl">Custom Dates</span>
                                <span class="InnrTxt">01 March 2021 - 07 March 2021</span>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control InptBx Clndr" id="Text2" value="From Date">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control InptBx Clndr" id="Text3" value="To Date">
                            </div>
                            <div class="col-md-5 BttnHldr">
                                <button type="button" class="btn btn-primary SbmtBtn">Submit</button>
                                <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                                <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ModalCntntHldr">
                    <div class="TableHldr">
                        <table class="AppDataTbl" style="width: 2000px;">
                            <tr class="Hdr">
                                <th rowspan="2"><span class="DataTtl">Date</span></th>
                                <th rowspan="2"><span class="DataTtl">Feeder name</span></th>
                                <th colspan="5" class="Cntr"><span class="DataTtl">Power Factor & Consumption</span></th>
                                <th colspan="3" class="Cntr"><span class="DataTtl">Single Phase Voltage (Volt)</span></th>
                                <th colspan="3" class="Cntr"><span class="DataTtl">Three Phase Voltage (Volt)</span></th>
                                <th colspan="3" class="Cntr"><span class="DataTtl">Current (Amp)</span></th>
                                <th rowspan="2"><span class="DataTtl">Technician</span></th>
                            </tr>
                            <tr class="Hdr">
                                <th class="Cntr"><span class="DataTtl">KVA</span></th>
                                <th class="Cntr"><span class="DataTtl">Opening KWH</span></th>
                                <th class="Cntr"><span class="DataTtl">Closing KWH</span></th>
                                <th class="Cntr"><span class="DataTtl">Consume KWH</span></th>
                                <th class="Cntr"><span class="DataTtl">Power Factor</span></th>
                                <th class="Cntr"><span class="DataTtl">RN</span></th>
                                <th class="Cntr"><span class="DataTtl">YN</span></th>
                                <th class="Cntr"><span class="DataTtl">BN</span></th>
                                <th class="Cntr"><span class="DataTtl">RY</span></th>
                                <th class="Cntr"><span class="DataTtl">YB</span></th>
                                <th class="Cntr"><span class="DataTtl">BR</span></th>
                                <th class="Cntr"><span class="DataTtl">R</span></th>
                                <th class="Cntr"><span class="DataTtl">Y</span></th>
                                <th class="Cntr"><span class="DataTtl">B</span></th>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Rd">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr class="Orng">
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                            <tr>
                                <td><span class="DataTxt">01-04-2021</span></td>
                                <td><span class="DataTxt">Vamshi Krishna</span></td>
                                <td class="Cntr"><span class="DataTxt">135</span></td>
                                <td class="Cntr"><span class="DataTxt">552</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td class="Cntr"><span class="DataTxt">554</span></td>
                                <td><span class="DataTxt">Praveen</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
