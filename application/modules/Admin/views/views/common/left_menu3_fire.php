<div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
            
                <a href="<?php echo site_url('Admin/Home/')?>" ><span class="BrndNm"><?php echo $this->session->userdata('client_name')?></span></a>
            </div>
            <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <ul class="LnkHldr FrstLvl">
                    
                    
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(555)" id="cat555"><img src="<?php echo site_url() ?>asset/demoforall/Images/Water-Tank-W.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Water</span></a>
                        <ul class="ScndLvl" id="subcat555" style="display: none;">                          
                        
                            
                            <li>
                                <a href="<?php echo site_url('Admin/Home/water_fire/')?>#fire" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Fire-Pump-W.png" width="22px"/> <span class="Txt">Fire Pump</span></a>
                            </li>
                            
                            
                        </ul>
                        </li> 
                       
                       
                    <li>
                        <a href="<?php echo site_url('Admin/Home/all_reports_fire') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
        