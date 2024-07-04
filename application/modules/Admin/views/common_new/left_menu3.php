<?php //echo print_r($this->session->userdata());die(); ?>
<style>
    a.MnDshbrdLnk {
        display: block;
        margin: 10px 5px;
        padding: 15px 15px 15px 35px;
        background: rgba(0,0,0,0.1) url(../../asset/loginasset/images/Dashboard-Icn.svg) no-repeat left 10px center;
        background-size: 15px;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }
</style>
<div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
            
                <a href="<?php echo site_url('Admin/Home/water')?>" ><span class="BrndNm"><?php echo $this->session->userdata('client_name')?></span></a>
            </div>
            <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <!-- <a href="#" class="MnDshbrdLnk">Dashboard</a> -->
                <ul class="LnkHldr FrstLvl">
                    
						
						<?php if( (modules::run('Admin/Site/authlink','energy_Energy-Meter'))  ) { ?>
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(556)" id="cat556"><img src="<?php echo site_url() ?>asset/demoforall/Images/energy-w.png" width="20px"/> <span id="dsh" class="Txt Arr Slct Dshbrd">Energy</span></a>
                        <ul class="ScndLvl" id="subcat556" style="display: none;">                          
                        <?php if(modules::run('Admin/Site/authlink','energy_Energy-Meter')){ ?>
                            <li>
                                
                                   
                                        <a href="<?php echo site_url('Admin/HomeNew/energy/')?>#energy" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Electric-Meter-W.png" width="22px"/> <span class="Txt">Energy Meter</span></a>
                                        
                                
                            </li>
                        <?php } ?>
                       

                                                        
                            
                        </ul>
                        </li>
						<?php } ?>                
						

                       
                        
                        
						
						
						
                    
                    <li>
                    <?php if($this->session->userdata('user_id')==19){ ?>
                    <a href="<?php echo site_url('Admin/Home/all_reports_demo') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } if($this->session->userdata('created_by')==37){?>
                        
                    
                    <a href="<?php echo site_url('Admin/HomeNew/all_reports_new') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } if($this->session->userdata('created_by')==35){?>
                        
                    
                        <a href="<?php echo site_url('Admin/Home/all_reports_vega') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } if($this->session->userdata('created_by')==33){?>
                        
                    
                        <a href="<?php echo site_url('Admin/Home/all_reports_rsbrother') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } if($this->session->userdata('user_id')==25){?>
                        
                    
                        <a href="<?php echo site_url('Admin/Home/all_reports_lonavala') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                        <?php } if($this->session->userdata('user_id')==27){?>
                        
                    
                        <a href="<?php echo site_url('Admin/Home/all_reports_mumbai') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                        <?php } if($this->session->userdata('created_by')==34){?>
                        
                    
                        <a href="<?php echo site_url('Admin/Home/all_reports_iithyd') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } if($this->session->userdata('user_id')==4){?>
                    
                    <a href="<?php echo site_url('Admin/Home/all_reports_cbre') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php }?>
                                
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        