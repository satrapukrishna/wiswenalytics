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
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Chcklsts">Checklist</span>
            <div class="SctnInnerMenu">
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Electrical
                            </button>
                        </span>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">Common Area Meter Reading</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">DG Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">Diesel Consumption</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">Elevator Weekly</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">HT Meter</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_electrical" class="SbLnk">UPS</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                ELV
                            </button>
                        </span>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">CCTV Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">CCTV Monthly</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">FAS Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">Fire Alarm Control Panel</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">Fire Alarm Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">Fire Alarm System</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_elv" class="SbLnk">PA System</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Fire
                            </button>
                        </span>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Extinguisher Service Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Extinguisher Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Extinguisher Weekly</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Fighting Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire Hydrant Box</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Fire System Testing</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_fire" class="SbLnk">Sprinkler Main Tap Off Valve</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed Actv" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-headingFour">
                                HVAC
                            </button>
                        </span>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Chiller Log Book</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">AC Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">AHU</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Daily Exhaust System</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Daily Fresh Air Fan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Daily Jet Fan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Spilt A/C</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Ventilation Fan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_hvac" class="SbLnk">Ventilation</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <span class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFour">
                                PHE
                            </button>
                        </span>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="SbLnk">
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Sewage Treatment Plant</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Daily Plumbing Leakage B4 Shaft</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Pump Room  JWC</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">RO Plant Log Book</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Sewage Treatment Plant</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Sump Pump</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Consumption Log</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Pump Daily</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Softner Log</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Tank Level Status</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklistDetails_phe" class="SbLnk">Water Treatment Plant Log</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin_demo/checklist" class="BrdCrmLnk">All Checklists</a>
                        </li>
                        <li>
                            <span class="PgTtl">HVAC</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1">
                            <span class="InnrTtl">Today</span>
                            <span class="InnrTxt">30 April 2021</span>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Checklist</option>
                                <option value="1">All</option>
                                <option value="1">Electrical</option>
                                <option value="2">ELV</option>
                                <option value="3">Fire </option>
                                <option value="3">HVAC</option>
                                <option value="3">PHE</option>
                               
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="From Date" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="Text1" value="To Date" />
                        </div>
                        <div class="col-md-5 BttnHldr">
                            <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin_demo/checklistSubDetails'" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                
                 <span class="SctnTtl CmplntsFdbck" style="font: 600 15px/100% 'Open Sans';color: #101010d9;padding-top: 16px;        font-weight: bold;width:18%">HVAC
                 </span>
                 <div class="TableHldr">
                    <table class="AppDataTbl">
                        <tr class="Hdr">
                            <th>
                                <span class="DataTtl">S. No.</span>
                            </th>
                            <th>
                                <span class="DataTtl">Checklist Name</span>
                            </th>
                            <th>
                                <span class="DataTtl">Reccurence</span>
                            </th>
                            <th>
                                <span class="DataTtl">Status</span>
                            </th>
                            <th>
                                <span class="DataTtl">Assigned/ Completed by</span>
                            </th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Chiller Log Book</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn1" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">02</span>
                            </td>
                            <td>
                                <span class="DataTxt">AC Unit</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn2" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">03</span>
                            </td>
                            <td>
                                <span class="DataTxt">AHU</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Stsfctry">Scheduled</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn3" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">04</span></td>
                            <td>
                                <span class="DataTxt">Exhaust System</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Bad">Delayed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn4" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">05</span>
                            </td>
                            <td>
                                <span class="DataTxt">Fresh Air Fan</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn5" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">06</span>
                            </td>
                            <td>
                                <span class="DataTxt">Jet Fan</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn5" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">07</span>
                            </td>
                            <td>
                                <span class="DataTxt">Spilt A/C</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn5" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">08</span>
                            </td>
                            <td>
                                <span class="DataTxt">Ventilation Fan</span>
                            </td>
                            <td>
                                <span class="DataTxt">Daily</span>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                            <td>
                                <span class="DataTxt">Vamshi Krishna</span>
                            </td>
                            <td>
                                <span id="LnkBtn5" onclick="javascript:ModalPopup();" class="DataLnk DtlsArr">Detailed Report</span>
                            </td>
                        </tr>
                        
                    </table>
                </div>
                
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
