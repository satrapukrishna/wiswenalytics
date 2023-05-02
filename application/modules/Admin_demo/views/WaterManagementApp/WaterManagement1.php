
<html>
<head>
  
  <?php $this->load->view('common/css') ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css">
  <style>
 input[type="checkbox"][readonly] {
  pointer-events: none;
}
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('common/header') ?>
  
  <?php $this->load->view('common/left_menu') ?>

   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">


    <div class="WtrMngtDshHldr">
        <div class="RprtHdr">
            <span class="TtlTxt">Daily Water Management Dashboard</span>
        </div>
        <div class="WtrMngtSrchSctn">
            <ul class="SrchBx">
                <li>
                    <span class="SrchTxtTtl">Today</span>
                    <span class="SrchTxt">10 August 2021</span>
                </li>
                <li>
                    <input type="text" class="Inpt Clndr" />
                </li>
                <li class="BtnHldr">
                    <input type="button" class="InptBtn" onclick="myFunction()" value="Submit" />
                </li>
            </ul>
        </div>
        <div class="WtrMngtDtlsHldr">
            <div class="WtrLnDtls">
                <span class="LnName MunWtrLn">Municipal Water Line #1</span>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">5359</span>
                        <span class="DtlsTxtTtl">Today’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/admin/wmdImages/WaterMeterSample.jpg" class="ImgHldr" />
                        <!-- <a href="#"  >View</a> -->
                        <button class="TxtLnk" id="myBtn">View</button>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">5216</span>
                        <span class="DtlsTxtTtl">Yesterday’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">143</span>
                        <span class="DtlsTxtTtl">Difference</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">06:30 pm</span>
                        <span class="DtlsTxtTtl">Reading Time</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">Vamshi</span>
                        <span class="DtlsTxtTtl">Recorded By</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv BtnHldr">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxtVrfctn NtVrd">Not Verified</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <input type="button" class="VrEdBtn" value="Verfiy/ Edit" />
                    </div>
                </div>
            </div>
            <div class="WtrLnDtls">
                <span class="LnName MunWtrLn">Municipal Water Line #2</span>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">3347</span>
                        <span class="DtlsTxtTtl">Today’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/admin/wmdImages/WaterMeterSample.jpg" class="ImgHldr" />
                        <button class="TxtLnk" id="myBtn">View</button>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">2919</span>
                        <span class="DtlsTxtTtl">Yesterday’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">428</span>
                        <span class="DtlsTxtTtl">Difference</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">06:42 pm</span>
                        <span class="DtlsTxtTtl">Reading Time</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">Vamshi</span>
                        <span class="DtlsTxtTtl">Recorded By</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv BtnHldr">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxtVrfctn YsVrd">Verified</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <input type="button" class="VrEdBtn" value="Edit" />
                    </div>
                </div>
            </div>
            <div class="WtrLnDtls">
                <span class="LnName TnkrWtrLn">Tanker Line #1</span>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">3500</span>
                        <span class="DtlsTxtTtl">Today’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <img src="<?php echo base_url(); ?>asset/admin/wmdImages/WaterMeterSample.jpg" class="ImgHldr" />
                        <button class="TxtLnk" id="myBtn">View</button>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">3100</span>
                        <span class="DtlsTxtTtl">Yesterday’s Reading</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">400</span>
                        <span class="DtlsTxtTtl">Difference</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">06:51 pm</span>
                        <span class="DtlsTxtTtl">Reading Time</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxt">Vamshi</span>
                        <span class="DtlsTxtTtl">Recorded By</span>
                    </div>
                </div>
                <div class="InnrDtlsMnDv BtnHldr">
                    <div class="TxtDtlsHldr">
                        <span class="DtlsTxtVrfctn YsVrd">Verified</span>
                    </div>
                    <div class="TxtDtlsHldr">
                        <input type="button" class="VrEdBtn" value="Edit" />
                    </div>
                </div>
            </div>
        </div>
        <div class="WtrMngtDtlsHldr">
            <div class="WtrTnksDtlsHldr">
                <div class="TnksDlts">
                    <span class="TnkNme WtrSmpTnk">Water Sump Tank #1</span>
                    <div class="WtrLvlHldr">
                        <div class="LiquidTank Smll">
                            <div class="Liquid Liquidhigh l-45"></div>
                        </div>
                    </div>
                    <div class="WtrTnkTxtDtlsHldr">
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">47%</span>
                                <span class="DtlsTxtTtl">Filled</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">2483 Lts</span>
                                <span class="DtlsTxtTtl">Available</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">2183 Lts</span>
                                <span class="DtlsTxtTtl">Yesterday</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4800 Lts</span>
                                <span class="DtlsTxtTtl">Today</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="TnksDlts">
                    <span class="TnkNme OvrhdTnk">Overhead Tanks #1</span>
                    <div class="WtrLvlHldr">
                        <div class="LiquidTank Smll">
                            <div class="Liquid Liquidhigh l-85"></div>
                        </div>
                    </div>
                    <div class="WtrTnkTxtDtlsHldr">
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">94%</span>
                                <span class="DtlsTxtTtl">Filled</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4830 Lts</span>
                                <span class="DtlsTxtTtl">Available</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">3340 Lts</span>
                                <span class="DtlsTxtTtl">Yesterday</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4988 Lts</span>
                                <span class="DtlsTxtTtl">Today</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="TnksDlts">
                    <span class="TnkNme OvrhdTnk">Overhead Tanks #2</span>
                    <div class="WtrLvlHldr">
                        <div class="LiquidTank Smll">
                            <div class="Liquid Liquidhigh l-45"></div>
                        </div>
                    </div>
                    <div class="WtrTnkTxtDtlsHldr">
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">89%</span>
                                <span class="DtlsTxtTtl">Filled</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4729 Lts</span>
                                <span class="DtlsTxtTtl">Available</span>
                            </div>
                        </div>
                        <div class="InnrDtlsMnDv">
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">3950 Lts</span>
                                <span class="DtlsTxtTtl">Yesterday</span>
                            </div>
                            <div class="TxtDtlsHldr">
                                <span class="DtlsTxt">4900 Lts</span>
                                <span class="DtlsTxtTtl">Today</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="OvrallFllDlts">
                    <div class="FtrDtls WtrTnk">
                        <span class="FtrDtlsTxt">9473 Lts</span>
                        <span class="FtrDtlsTtl">Yesterday’s Total Tanks volume</span>
                    </div>
                    <div class="FtrDtls TnkrLn">
                        <span class="FtrDtlsTxt">11235 Lts</span>
                        <span class="FtrDtlsTtl">Yesterday’s Total Intake</span>
                    </div>
                    <div class="FtrDtls WtrLvl">
                        <span class="FtrDtlsTxt">12042 Lts</span>
                        <span class="FtrDtlsTtl">Total Available Today</span>
                    </div>
                    <div class="FtrDtls Cnsmd">
                        <span class="FtrDtlsTxt">8666 Lts</span>
                        <span class="FtrDtlsTtl">Total Consumed</span>
                    </div>
                    <div class="FtrDtls AvgCnsmd">
                        <span class="FtrDtlsTxt">8120 Lts</span>
                        <span class="FtrDtlsTtl">Avg. Consumed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="PpUpMnHldr" id="myModal">
        <div class="PpUpDtlsHldr">
            <div class="TtlHdrDv">
                <span class="MtrLnNme">Municipal Water Meter #1</span>
                <span class="MtrLnDtls">Tower 1, Pradeep Apartments</span>
                <span class="MtrClsBtn"></span>
            </div>
            <div class="DtlsHdrDv">
                <div class="DtlsTxtDv">
                    <span class="RdnsTxtTtl">Date</span>
                    <span class="RdnsTxt">01-08-2021</span>
                </div>
                <div class="DtlsTxtDv">
                    <span class="RdnsTxtTtl">Reading</span>
                    <span class="RdnsTxt">5659</span>
                </div>
            </div>
            <div class="MtrImgHldr">
                <div class="DvImgHldr">
                    <img src="<?php echo base_url(); ?>asset/admin/wmdImages/WaterMeterSample.jpg" class="MtrImg" />
                </div>
            </div>
        </div>
    </div>


                </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
<style>.btn-xs{padding:4px}</style>
<script>
// Get the modal

    var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("MtrClsBtn")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>
</body>
</html>


