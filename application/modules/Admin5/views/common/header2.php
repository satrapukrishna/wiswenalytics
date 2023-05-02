<div id="DshbrdRgt" class="DshBrdHdr">
            <ul class="HdrLstng">
                <li class="MenuHldr">
                    <span id="MblMenuBtn" onclick="javascript:MblMenu();" class="MenuTggle"></span>
                </li>
                <!-- <li class="BrndHldr">
                    <span class="BrndNm">PKR Hospitals</span>
                </li> -->
                <li>
                    <span class="UsrDtls">
                      <?php echo $this->session->userdata('employee_name') ?>
                    </span>
                </li>
                <li>
                    <span class="Sttngs"></span>
                </li>
                <li>
                    <a title="Logout" href="<?php echo base_url('Admin/logout'); ?>"><span class="SgnOt" ></span></a>
                </li>
            </ul>
        </div>