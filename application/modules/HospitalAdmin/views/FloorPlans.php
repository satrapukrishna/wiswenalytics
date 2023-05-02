<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Floor Plans</title>
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
            <span class="SctnTtl Plns">Plans</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/floorPlans" class="LnkTxt FlrPln Icn Actv">Floor Plan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin/fireEvacuationPlans" class="LnkTxt FrExPln Icn">Fire Evacuation Plan</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">Floor Plans</span>
                        </li>
                    </ul>
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
                                <span class="DataTtl">Plan Name</span>
                            </th>
                            <th>
                                <span class="DataTtl">Version</span>
                            </th>
                            <th>
                                <span class="DataTtl">Uploaded on</span>
                            </th>
                            <th>
                                <span class="DataTtl">Uploaded by</span>
                            </th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">01</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 01</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span12" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">02</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 02</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span5" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">03</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 03</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span6" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">04</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 04</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span7" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">05</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 05</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span8" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">06</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 06</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span9" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">07</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 07</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span10" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="DataTxt">08</span>
                            </td>
                            <td>
                                <span class="DataTxt">Floor Name 08</span>
                            </td>
                            <td>
                                <span class="DataTxt">1.0</span>
                            </td>
                            <td>
                                <span class="DataTxt">21-05-2021</span>
                            </td>
                            <td>
                                <span class="DataTxt">User name</span>
                            </td>
                            <td>
                                <span id="Span11" onclick="javascript:ModalPopup();" class="DataLnk">View Plan</span>
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
                    <span class="SctnTtl">Plans</span>
                    <span class="FtrTtl">Plan Name</span>
                    <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                </div>
                <div class="ModalCntntHldr NoFnctnHdr">
                    <embed src="<?php echo base_url(); ?>asset/hospital_admin/Documents/example-plan.pdf" class="PDFVwr" />
                </div>
            </div>
        </div>
    </div>
</body>
</html>
