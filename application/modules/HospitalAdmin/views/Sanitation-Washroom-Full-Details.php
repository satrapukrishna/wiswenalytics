<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanitation - Washroom Details</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/BxSlider.css?ver=1" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/BxSlider.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/SliderScript.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl Snttn">Sanitation</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_Washroom" class="LnkTxt Wshrm Icn Actv">Washroom</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_WasteManagement" class="LnkTxt WstMngmnt Icn">Waste Management</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_PestControl" class="LnkTxt PstCntrl Icn">Pest Control</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation_FacadeCleaning" class="LnkTxt FcdeClnng Icn">Facade Cleaning</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="BrdCrmLnk">All Sanitations</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>HospitalAdmin/sanitation" class="BrdCrmLnk">Washroom</a>
                        </li>
                        <li>
                            <span class="PgTtl">Tower 01</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <span class="WshrmFllDtlsTtl">Washroom #101 (Male)</span>
                <div class="WshrmFllsDshDtls MnlAlrt">
                    <div class="SchdlDtls ">
                        <ul class="FllLst">
                            <li>
                                <div class="WshrmDtlsTxtHldr Ico Schdl">
                                    <span class="TxtTtl">Next Scheduled Cleaning (Auto)</span>
                                    <span class="TxtDtl">08:45 PM (K. Prashanth)</span>
                                </div>
                            </li>
                            <li class="FllDtl">
                                <div class="WshrmDtlsTxtHldr Ico Prrty">
                                    <span class="TxtTtl">Priority</span>
                                    <span class="TxtDtl">Normal</span>
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico Clng">
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico TltRll">
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico PprRll">
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico Spbr">
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico RmFrshnr">
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico ThrshBg">
                                </div>
                            </li>
                            <li class="FllDtl Ico">
                                <div class="WshrmDtlsTxtHldr Ico WtCtn">
                                </div>
                            </li>
                            <li class="FllDtl">
                                <div class="WshrmDtlsTxtHldr Ico Fdbck">
                                    <span class="TxtTtl">Feedbacks</span>
                                    <span class="TxtDtl">Consumables has not been refilled.</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ClngDtls">
                        <div class="WshrmDtlsTxtHldr Ico Clng">
                            <span class="TxtTtl">Cleaning last done at 07:56 pm</span>
                            <span class="TxtDtl">07:45 PM (M. Raju)</span>
                        </div>
                    </div>
                    <div class="CnsmblsDtls">
                        <div class="WshrmDtlsTxtHldr Ico Cnsmbls">
                            <span class="TxtTtl">Consumables last refilled at</span>
                            <span class="TxtDtl">07:56 PM</span>
                        </div>
                    </div>
                </div>
                <div class="WshrmFllsNumbDtls">
                    <div class="DrpdwnHldr">
                        <select class="form-select DrpDwn" aria-label="Default select example">
                            <option value="1">Last Week</option>
                            <option value="2">Last Month</option>
                            <option value="3">Last Year</option>
                          </select>
                    </div>
                    <div class="NumbDtlsHldr">
                        <span class="ValTxt">122</span>
                        <span class="ValTtl">Todays Footfall</span>
                    </div>
                    <div class="NumbDtlsHldr">
                        <span class="ValTxt">119</span>
                        <span class="ValTtl">Average Footfall</span>
                    </div>
                    <div class="NumbDtlsHldr">
                        <span class="ValTxt">1214</span>
                        <span class="ValTtl">User’s Feedback</span>
                    </div>
                    <div class="NumbDtlsHldr">
                        <span class="ValTxt">80%</span>
                        <span class="ValTtl">Positive User Feedback</span>
                    </div>
                    <div class="NumbDtlsHldr">
                        <span class="ValTxt">12%</span>
                        <span class="ValTtl">Negative User Feedback</span>
                    </div>
                    <div class="NumbDtlsHldr">
                        <span class="ValTxt">3.5/<span class="AvgSml">5</span></span>
                        <span class="ValTtl">Avg. User Feedback</span>
                    </div>
                </div>
                <div class="TableHldr Hstry">
                    <div class="SrchFltrDv ChckLst">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="InnrTtl">History</span>
                                    <span class="InnrTxt">01-01-2021 to 13-01-2021</span>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select DrpDwn" aria-label="Default select example">
                                        <option selected="">Consumables</option>
                                        <option value="1">Cleaning</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control InptBx Clndr" id="Text1" value="From Date">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control InptBx Clndr" id="staticEmail" value="To Date">
                                </div>
                                <div class="col-md-4 BttnHldr">
                                    <button type="button" onclick="location.href='<?php echo base_url(); ?>HospitalAdmin/attendenceCustomDate'" class="btn btn-primary SbmtBtn">Submit</button>
                                    <button type="button" class="btn btn-primary FnctnBtn Prnt">Print</button>
                                    <button type="button" class="btn btn-primary FnctnBtn Dwnld">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="AppDataTbl">
                        <tbody><tr class="Hdr">
                            <th>
                                <span class="DataTtl">Date</span>
                            </th>
                            <th>
                                <span class="DataTtl">Hand Towels</span>
                            </th>
                            <th>
                                <span class="DataTtl">Toilet Paper</span>
                            </th>
                            <th>
                                <span class="DataTtl">Soap</span>
                            </th>
                            <th>
                                <span class="DataTtl">Room Freshner</span>
                            </th>
                            <th>
                                <span class="DataTtl">Trash Bin Covers</span>
                            </th>
                            <th>
                                <span class="DataTtl">Footfall</span>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">01-01-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">72 (~3 Avg./ hr)</span>
                            </td>
                            <td>
                                <span class="DataTxt">410 (~32 Avg.)</span>
                            </td>
                            <td>
                                <span class="DataTxt">535 (~41 Avg.)</span>
                            </td>
                            <td>
                                <span class="DataTxt">26 (~2 Avg.)</span>
                            </td>
                            <td>
                                <span class="DataTxt">26 (~2 Avg.)</span>
                            </td>
                            <td>
                                <span class="DataTxt">2471 (~190 Avg.)</span>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
