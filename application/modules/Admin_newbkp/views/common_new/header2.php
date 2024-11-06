<div id="DshbrdRgt" class="DshBrdHdr">
            <ul class="HdrLstng">
                <li class="MenuHldr">
                    <span id="MblMenuBtn" onclick="javascript:MblMenu();" class="MenuTggle"></span>
                </li>
                <!-- <li class="BrndHldr">
                    <span class="BrndNm">PKR Hospitals</span>
                </li> -->
                <?php if($this->session->userdata('user_id')!=29){ ?>
                <li class="notification">
				<?php if($this->session->userdata('created_by')!=1){
    
    $this->db->select('count(alert_id) as total');
        $this->db->from('alerts');
    $this->db->where('client_id',$this->session->userdata('created_by'));
    $this->db->where('alert_read',0);
    $res=$this->db->get()->row_array();
    //echo "<pre>";print_r($res);
    ?>   
					  <span class="notification-msg"><?php echo ($res['total']==0?'':$res['total'])?></span>
                      <a href="<?php echo base_url('Admin/Alerts')?>"><span class="glyphicon glyphicon-bell " style=" color:#fff;FONT-SIZE: 22PX;" aria-hidden="true"></span></a>
				<?php } ?>
                </li>
                <?php }?>
				<li>
                    <span class="UsrDtls">
                      <?php echo $this->session->userdata('employee_name') ?>
                    </span>
                </li>
                <li>
                    <span class="Sttngs"></span>
                    <?php if($this->session->userdata('created_by')==26){?>
                    <div class="InnrMnuHldr">
                <ul class="InnrMnuLst">
                    <li>
                        <a href="<?php echo site_url('Admin/Home/waterMeterList/')?>#water" class="InnrMnuLnk">Water Meter Schedules</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Admin/Home/addwatermeter/')?>#water" class="InnrMnuLnk">Add Water Meter Schedule</a>
                    </li>
                    <li>
                        <!-- <a href="#" class="InnrMnuLnk">Link 3</a> -->
                    </li>
                </ul>
            </div>
            <?php } ?>
                    
                </li>
                <li>
                    <a title="Logout" href="<?php echo base_url('Admin/logout'); ?>"><span class="SgnOt" ></span></a>
                </li>
            </ul>
        </div>



        