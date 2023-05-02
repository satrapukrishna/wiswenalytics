<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comparisions</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>

<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Cmprsns">Comparisions</span>

        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">Custom Comparisions</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Hospital 1</option>
                                <option value="1">FirstMedic Banjara</option>
                                <option value="2">FirstMedic Kompally</option>
                                <option value="3">FirstMedic Kukatpally</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Hospital 1</option>
                                <option value="1">FirstMedic Banjara</option>
                                <option value="2">FirstMedic Kompally</option>
                                <option value="3">FirstMedic Kukatpally</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select InptBx" aria-label="Default select example">
                                <option selected>Select Category</option>
                                    <option value="1">All Categories</option>
                                    <option value="2">Beds & Occupancy</option>
                                    <option value="3">Attendence</option>
                                    <option value="4">Resources</option>
                                    <option value="5">Engineering</option>
                                    <option value="6">Checklist</option>
                                    <option value="7">Sanitation</option>
                                    <option value="8">Machinery</option>
                                    <option value="9">PPM</option>
                                    <option value="10">Manpower Utilization</option>
                                    <option value="11">Complaints & Feedback</option>
                                    <option value="12">Inventory Management</option>
                                    <option value="13">Audits</option>
                                    <option value="14">Carbon Footprint</option>
                                    <option value="15">Benchmarking</option>
                                    <option value="16">Recommendations</option>
                                    <option value="17">Comparisions</option>
                                    <option value="18">Plans</option>
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
        </div>
    </div>
</body>

</html>