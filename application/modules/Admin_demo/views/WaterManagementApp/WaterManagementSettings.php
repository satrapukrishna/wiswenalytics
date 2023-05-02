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
            <span class="TtlTxt">Water Meter Settings<input id="Button1" class="TtlBtn" type="button" value="Create New" /></span>
        </div>
        <div class="WtrMngtSrchSctn">
            <ul class="SrchBx">
                <li>
                    <span class="SrchOnlyTxtTtl">All Schedules</span>
                </li>
                <li>
                    <select id="Select1" class="Inpt">
                        <option>All Water Meter</option>
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
                </li>
                <li class="BtnHldr">
                    <input type="button" class="InptBtn" value="Filter" />
                </li>
            </ul>
        </div>
        <div class="SttngsMnDv">
            <table class="SttngsDtlsTbl">
                <tr>
                    <th>S. No.</th>
                    <th>Water Meter</th>
                    <th>Schedule</th>
                    <th>Time Range</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Water Meter 01</td>
                    <td>Reading 1</td>
                    <td>06:00 AM - 06:30 AM</td>
                    <td><a href="#" class="LnkTxt">Edit</a></td>
                    <td><a href="#" class="LnkTxt">Delete</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Water Meter 01</td>
                    <td>Reading 2</td>
                    <td>06:00 PM - 06:30 PM</td>
                    <td><a href="#" class="LnkTxt">Edit</a></td>
                    <td><a href="#" class="LnkTxt">Delete</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Water Meter 02</td>
                    <td>Reading 1</td>
                    <td>08:00 AM - 08:30 AM</td>
                    <td><a href="#" class="LnkTxt">Edit</a></td>
                    <td><a href="#" class="LnkTxt">Delete</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Water Meter 02</td>
                    <td>Reading 2</td>
                    <td>04:00 PM - 04:30 PM</td>
                    <td><a href="#" class="LnkTxt">Edit</a></td>
                    <td><a href="#" class="LnkTxt">Delete</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Water Meter 02</td>
                    <td>Reading 3</td>
                    <td>12:00 AM - 12:30 AM</td>
                    <td><a href="#" class="LnkTxt">Edit</a></td>
                    <td><a href="#" class="LnkTxt">Delete</a></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Water Meter 03</td>
                    <td>Reading 1</td>
                    <td>06:00 AM - 06:30 AM</td>
                    <td><a href="#" class="LnkTxt">Edit</a></td>
                    <td><a href="#" class="LnkTxt">Delete</a></td>
                </tr>
            </table>
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
