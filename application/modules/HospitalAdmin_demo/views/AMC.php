<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Audits</title>
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
            <span class="SctnTtl Adts">AMC</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="#" class="LnkTxt Actv">Completed (97)</a>
                    </li>
                    <li>
                        <a href="#" class="LnkTxt">On-going (23)</a>
                    </li>
                    <li>
                        <a href="#" class="LnkTxt">Upcoming (18)</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">AMC</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="From Date" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control InptBx Clndr" id="Text1" value="To Date" />
                        </div>
                        <div class="col-md-8 BttnHldr">
                            <button type="button" class="btn btn-primary SbmtBtn">Submit</button>
                            <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                            <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="TableHldr">
                    <table class="AppDataTbl">
                        <tr class="Hdr">
                            <th>
                                <span class="DataTtl">S. No.</span>
                            </th>
                            <th>
                                <span class="DataTtl">Type of AMC</span>
                            </th>
                            <th>
                                <span class="DataTtl">Reason</span>
                            </th>
                            <th>
                                <span class="DataTtl">From</span>
                            </th>
                            <th>
                                <span class="DataTtl">To</span>
                            </th>
                            <th>
                                <span class="DataTtl">Checklist Name</span>
                            </th>
                            <th>
                                <span class="DataTtl">Observations</span>
                            </th>
                            <th>
                                <span class="DataTtl">Recommendations</span>
                            </th>
                            <th>
                                <span class="DataTtl">Status</span>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">01</span>
                            </td>
                            <td>
                                <span class="DataTxt">AMC Name</span>
                            </td>
                            <td>
                                <span class="DataTxt">Period Expiry</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-01-2020</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Checklist Name</span>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Observations" class="DataLnk">View Observations</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Recommendations" class="DataLnk">View Recommendations</a>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">02</span>
                            </td>
                            <td>
                                <span class="DataTxt">AMC Name</span>
                            </td>
                            <td>
                                <span class="DataTxt">Period Expiry</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-01-2020</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Checklist Name</span>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Observations" class="DataLnk">View Observations</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Recommendations" class="DataLnk">View Recommendations</a>
                            </td>
                            <td>
                                <span class="DataTxt Bad">Delayed</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">03</span>
                            </td>
                            <td>
                                <span class="DataTxt">AMC Name</span>
                            </td>
                            <td>
                                <span class="DataTxt">Period Expiry</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-01-2020</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Checklist Name</span>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Observations" class="DataLnk">View Observations</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Recommendations" class="DataLnk">View Recommendations</a>
                            </td>
                            <td>
                                <span class="DataTxt Stsfctry">Scheduled</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">04</span>
                            </td>
                            <td>
                                <span class="DataTxt">AMC Name</span>
                            </td>
                            <td>
                                <span class="DataTxt">Period Expiry</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-01-2020</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Checklist Name</span>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Observations" class="DataLnk">View Observations</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Recommendations" class="DataLnk">View Recommendations</a>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">05</span>
                            </td>
                            <td>
                                <span class="DataTxt">AMC Name</span>
                            </td>
                            <td>
                                <span class="DataTxt">Period Expiry</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-01-2020</span>
                            </td>
                            <td>
                                <span class="DataTxt">04-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">Checklist Name</span>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Observations" class="DataLnk">View Observations</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/amc_Recommendations" class="DataLnk">View Recommendations</a>
                            </td>
                            <td>
                                <span class="DataTxt Good">Completed</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
