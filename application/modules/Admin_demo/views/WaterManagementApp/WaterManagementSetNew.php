<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
            <span class="TtlTxt Brdr">Add New Water Meter </span>
        </div>
        <div class="SttngsMnDv">
            <div class="FrmMnDv">
                <div class="FldHldr Hlf">
                    <span class="FrmTxt">Select Water Meter</span>
                    <select id="Select1" class="Inpt">
                        <option>Water Meter 1</option>
                        <option>Water Meter 2</option>
                        <option>Water Meter 3</option>
                        <option>Water Meter 4</option>
                        <option>Water Meter 5</option>
                        <option>Water Meter 6</option>
                        <option>Water Meter 7</option>
                        <option>Water Meter 8</option>
                        <option>Water Meter 9</option>
                    </select>
                </div>
                <div class="FldHldr Hlf">
                    <span class="FrmTxt">No. of Schedules</span>
                    <select id="Select2" class="Inpt">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                    </select>
                </div>
            </div>
            <div class="FrmMnDv Hghlght">
                <span class="FrmTxtTtl">Reading 1</span>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">From Time</span>
                    <select id="Select3" class="Inpt">
                        <option>01:00</option>
                        <option>01:30</option>
                        <option>02:00</option>
                        <option>02:30</option>
                        <option>03:00</option>
                        <option>03:30</option>
                        <option>04:00</option>
                        <option>04:30</option>
                        <option>05:00</option>
                        <option>05:30</option>
                        <option>06:00</option>
                        <option>06:30</option>
                        <option>07:00</option>
                        <option>07:30</option>
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                    </select>
                </div>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">AM/ PM</span>
                    <select id="Select4" class="Inpt">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">To Time</span>
                    <select id="Select5" class="Inpt">
                        <option>01:00</option>
                        <option>01:30</option>
                        <option>02:00</option>
                        <option>02:30</option>
                        <option>03:00</option>
                        <option>03:30</option>
                        <option>04:00</option>
                        <option>04:30</option>
                        <option>05:00</option>
                        <option>05:30</option>
                        <option>06:00</option>
                        <option>06:30</option>
                        <option>07:00</option>
                        <option>07:30</option>
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                    </select>
                </div>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">AM/ PM</span>
                    <select id="Select6" class="Inpt">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>
            <div class="FrmMnDv Hghlght">
                <span class="FrmTxtTtl">Reading 2</span>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">From Time</span>
                    <select id="Select7" class="Inpt">
                        <option>01:00</option>
                        <option>01:30</option>
                        <option>02:00</option>
                        <option>02:30</option>
                        <option>03:00</option>
                        <option>03:30</option>
                        <option>04:00</option>
                        <option>04:30</option>
                        <option>05:00</option>
                        <option>05:30</option>
                        <option>06:00</option>
                        <option>06:30</option>
                        <option>07:00</option>
                        <option>07:30</option>
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                    </select>
                </div>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">AM/ PM</span>
                    <select id="Select8" class="Inpt">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">To Time</span>
                    <select id="Select9" class="Inpt">
                        <option>01:00</option>
                        <option>01:30</option>
                        <option>02:00</option>
                        <option>02:30</option>
                        <option>03:00</option>
                        <option>03:30</option>
                        <option>04:00</option>
                        <option>04:30</option>
                        <option>05:00</option>
                        <option>05:30</option>
                        <option>06:00</option>
                        <option>06:30</option>
                        <option>07:00</option>
                        <option>07:30</option>
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                    </select>
                </div>
                <div class="FldHldr Qtr">
                    <span class="FrmTxt">AM/ PM</span>
                    <select id="Select10" class="Inpt">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>
            <div class="FrmMnDv">
                <div class="FldHldr Fll BtnHldr">
                    <input id="Button1" class="InptBtn" type="button" value="Save" />
                </div>
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
</body>
</html>
