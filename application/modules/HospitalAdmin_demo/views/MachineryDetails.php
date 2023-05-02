<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Machinery Details</title>
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
            <span class="SctnTtl Mchnry">Machinery</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn CGSSMchnry">CGSS Plant</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn ACPlntMchnry">A/C Plant</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn SbStnMchnry">Sub Station</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn BlrPlntMchnry">Boiler Plant</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn PmpRmMchnry">Pump Room</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machineryDetails" class="LnkTxt Icn WtrClrMchnry">Water Coolers</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin_demo/machinery" class="BrdCrmLnk">All Machinery</a>
                        </li>
                        <li>
                            <span class="PgTtl">CGSS Plant</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv Mchnry">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <select class="form-select DrpDwn" aria-label="Default select example">
                                <option selected>All Machinery</option>
                                <option value="1">CGSS Plant</option>
                                <option value="2">A/C Plant</option>
                                <option value="3">Sub Station</option>
                                <option value="4">Boiler Plant</option>
                                <option value="5">Pump Room</option>
                                <option value="6">Water Coolers</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select DrpDwn" aria-label="Default select example">
                                <option selected>Machine ID</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select DrpDwn" aria-label="Default select example">
                                <option selected>Status</option>
                                <option value="1">Working</option>
                                <option value="2">Standby</option>
                                <option value="3">Retired</option>
                                <option value="4">Repair</option>
                            </select>
                        </div>
                        <div class="col-md-6 BttnHldr">
                            <button type="button" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="InnrAccrdn MchnryDtlsHldr">
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Medical Air Compressor
                                </button>
                            </span>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Ins. ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Make</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Purchased on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Installed on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Expiring</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Vendor</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Scheduled</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Contract</span>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-01</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Working</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-02</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Standby</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Retired">
                                                    <td>
                                                        <span class="DataTxt">MAC-03</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Stsfctry">Retired</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Repair">
                                                    <td>
                                                        <span class="DataTxt">MAC-04</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Bad">Repair</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-05</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Completed</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Air Compressor Motor 15 HP
                                </button>
                            </span>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Ins. ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Make</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Purchased on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Installed on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Expiring</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Vendor</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Scheduled</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Contract</span>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-01</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Working</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-02</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Standby</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Retired">
                                                    <td>
                                                        <span class="DataTxt">MAC-03</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Stsfctry">Retired</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Repair">
                                                    <td>
                                                        <span class="DataTxt">MAC-04</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Bad">Repair</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-05</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Completed</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Vacuum Compressor
                                </button>
                            </span>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Ins. ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Make</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Purchased on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Installed on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Expiring</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Vendor</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Scheduled</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Contract</span>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-01</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Working</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-02</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Standby</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Retired">
                                                    <td>
                                                        <span class="DataTxt">MAC-03</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Stsfctry">Retired</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Repair">
                                                    <td>
                                                        <span class="DataTxt">MAC-04</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Bad">Repair</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-05</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Completed</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-headingFour">
                                    Vacuum Compressor Motor 10 HP
                                </button>
                            </span>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Ins. ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Make</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Purchased on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Installed on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Expiring</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Vendor</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Scheduled</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Contract</span>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-01</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Working</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-02</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Standby</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Retired">
                                                    <td>
                                                        <span class="DataTxt">MAC-03</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Stsfctry">Retired</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Repair">
                                                    <td>
                                                        <span class="DataTxt">MAC-04</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Bad">Repair</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-05</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Completed</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFive">
                                    Air Drier
                                </button>
                            </span>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Ins. ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Make</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Purchased on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Installed on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Expiring</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Vendor</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Scheduled</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Contract</span>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-01</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Working</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-02</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Standby</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Retired">
                                                    <td>
                                                        <span class="DataTxt">MAC-03</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Stsfctry">Retired</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Repair">
                                                    <td>
                                                        <span class="DataTxt">MAC-04</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Bad">Repair</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-05</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Completed</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-headingSix">
                                    Scavenging Pump
                                </button>
                            </span>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="TableHldr">
                                        <table class="AppDataTbl">
                                            <tbody>
                                                <tr class="Hdr">
                                                    <th>
                                                        <span class="DataTtl">Ins. ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Make</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Purchased on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">Installed on</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Expiring</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">AMC Vendor</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Scheduled</span>
                                                    </th>
                                                    <th>
                                                        <span class="DataTtl">PPM Contract</span>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-01</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Working</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-02</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Standby</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Retired">
                                                    <td>
                                                        <span class="DataTxt">MAC-03</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Stsfctry">Retired</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr class="Repair">
                                                    <td>
                                                        <span class="DataTxt">MAC-04</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Bad">Repair</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="DataTxt">MAC-05</span>
                                                        <div class="DataToolTp LftFxd">
                                                            <span class="DTlTpTtl">Location</span>
                                                            <span class="DTlTpTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt Good">Completed</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">Kirloskar</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">RepairConsulting</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">18/04/2014</span>
                                                    </td>
                                                    <td>
                                                        <span class="DataTxt">PPMConsulting</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk Details"></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="IcnLnk History"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
