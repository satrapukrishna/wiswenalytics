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
    <style>
        th,td {
  text-align: center !important;
  width: 33%; 
}
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
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewDepartment" class="LnkTxt Actv">Departments List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/listViewVacancy" class="LnkTxt">Vacancies</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/attendenceList" class="LnkTxt">Attendence</a>
                    </li>
                    <!-- <li>
                        <a href="<?php //echo base_url(); ?>HospitalAdmin_demo/departments" class="LnkTxt">Departments</a>
                    </li> -->
                </ul>
            </div>
            
        </div>
        <div class="ContainerRight">
             <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                <?php echo form_open_multipart('HospitalAdmin_demo/create_department_excel/', array('id' => 'create_department','class' => 'form-horizontal')); ?>
                        
                     <div class="row">
                        
                        <div class="col-md-2 BttnHldr">
                            <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add Department</button>
                        </div>
                        <div class="col-md-1 BttnHldr or">OR</div>
                       
                        <div class="col-md-2 BttnHldr">
                            <a href="<?php echo base_url(); ?>asset/hospital_admin/Documents/sample_department.csv" class="btn" download><i class="fa fa-download"></i>Sample Department</a>                           
                        </div>
                        
                        <!-- <form method="post" action="rainbow_data_upload" enctype="multipart/form-data"> -->
                       
                        <div class="col-md-3 BttnHldr">
                            <input type="file" name="file"  class="btn btn-primary"></input>
                        </div>
                        <div class="col-md-2 BttnHldr">
                            <button type="submit"   class="btn btn-primary">Submit</button>
                           
                        </div>
                        <div class="col-md-1 BttnHldr">
                        <a href="<?php echo site_url('HospitalAdmin_demo/listViewDepartment') ?>" class="btn btn-info reset">Reset</a>
                        </div>
                        
                    </div>
                    </form>
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
                <?php //echo json_encode($ddata[0][0]['service_department_name']); ?>
                <?php for($i=0;$i<count($ddata);$i++){ ?>
                <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%"><?php echo ucfirst($ddata[$i][0]['service_department_name']) ?> Department
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
                                    <span class="DataTtl">Action</span>
                                </th>
                                
                                
                            </tr>
                            <?php for ($k=0; $k <count($ddata[$i]) ; $k++) { ?>
                                <tr>
                                <td>
                                    <span class="DataTxt"><?php echo $k+1 ?></span>
                                </td>
                                <td>
                                    <span class="DataTxt"><?php echo $ddata[$i][$k]['service_department_name'] ?></span>
                                </td>
                                <td>
                                    <span class="DataTxt"><?php echo $ddata[$i][$k]['service_sub_department_name'] ?></span>
                                </td>
                                <td>
                                    <div class="row">
                                    <div class="col-md-1 BttnHldr">
                                    <button type="button" onclick="editDepartment(<?php echo $ddata[$i][$k]['department_id']; ?>)" class="btn btn-primary SbmtBtn">Edit</button>
                                    
                                    <!-- <a href="<?php //echo site_url('HospitalAdmin_demo/edit_department/' . $ddata[$i][0]['department_id']) ?>" title="Edit Department" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil">Edit</span></a> -->

                                    </div>
                                    <div class="col-md-1 BttnHldr" style="margin-left: 40px;">                                   
                                        <button type="button" onclick="removeDepartment(<?php echo $ddata[$i][$k]['department_id']; ?>)" class="btn btn-danger btn-xs" title="Delete Department"><span class="glyphicon glyphicon-trash">Delete</span></button>
                                    </div>
                                    </div>
                            </td>
                                
                            </tr>
                            <?php } ?>
                           
                        </tbody>
                    </table>
                </div>
                <div style="padding-top:25px"></div>
                <?php } ?>
                <?php /*<span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">Supervisor Department
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
                                    <span class="DataTtl">Action</span>
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
                                    <div class="row">
                                    <div class="col-md-1 BttnHldr">
                                    <a href="<?php echo site_url('Admin/Employees/edit_employee/' . $row->emp_id) ?>" title="Edit Employee" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil">edit</span></a>

                                    </div>
                                    <div class="col-md-1 BttnHldr" style="margin-left: 40px;">                                   
                                        <button type="button" onclick="removeEmployee(<?php echo $row->emp_id; ?>)" class="btn btn-danger btn-xs" title="Delete Employee"><span class="glyphicon glyphicon-trash">delete</span></button>
                                    </div>
                                    </div>
                            </td>
                                
                            </tr>
                            <!-- <tr>
                                <td>
                                    <span class="DataTxt">2</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Supervisor</span>
                                </td>
                                <td>
                                    <span class="DataTxt">Junior Supervisor</span>
                                </td>
                               
                            </tr> -->
                            
                            
                            
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
                <div style="padding-top:25px"></div> */?>
            </div>
        </div>
    </div>
<div id="AppMdlHldr" class="AppModalHldr Hide">
    <div class="AppModalInnrHldr LdrShpPrfl" style="height: 40%;width:40%;left:30%;top:30%">
        <div class="ModalTtlHldr LdrshpTtl" style="height: 100%;">
          
            <span class="PrflName">Add/Update Attendence</span>
            <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                <div class="ModalCntntHldr LdrshpDtl" style="top:25px;height:90%">
                    <div class="or"></div>
                    <?php echo form_open_multipart('HospitalAdmin_demo/create_department/', array('id' => 'create_department','class' => 'form-horizontal')); ?>
                    <div style="border: 2px solid #8484997d;  box-sizing: border-box;width: 95%; margin-left: 10px;border-radius:8px;height:90%">
                        <div class="or"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="department_name" name="department_name" class="form-control InptBx Clndr" placeholder="Service Department Name">
                                <input type="hidden" id="id" name="id" class="form-control InptBx Clndr" placeholder="Service Department Name">                                   
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
<script>
    function editDepartment(did){

       

        $.ajax({
				url: '<?php echo base_url(); ?>HospitalAdmin_demo/get_department/'+did,
                dataType:"json",
                method:"get",
                //data:{did:did},
                success:function(data){
                    // data = JSON.parse(response);
                    console.log(data);
                    $('#id').val(data[0]['department_id']); //id name of the modal; the hidden type
                    $('#department_name').val(data[0]['service_department_name']);
                    $('#department_sub_name').val(data[0]['service_sub_department_name']);
                    if (document.getElementById('AppMdlHldr').getAttribute('class') == 'AppModalHldr Hide') {
                    document.getElementById('AppMdlHldr').setAttribute('class', 'AppModalHldr');
                }
                    else {
                        document.getElementById('AppMdlHldr').setAttribute('class', 'AppModalHldr Hide');
                    }
                    return false;
                }

			});
        

    }
function removeDepartment(departmentId){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: '<?php echo base_url(); ?>HospitalAdmin_demo/remove_department/'+departmentId,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						//$("#sp"+departmentId).fadeOut();
                        // reload('<?php //echo base_url(); ?>HospitalAdmin_demo/listViewDepartment');
                        window.location.href = '<?php echo base_url(); ?>HospitalAdmin_demo/listViewDepartment';


					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}
    </script>
</html>
