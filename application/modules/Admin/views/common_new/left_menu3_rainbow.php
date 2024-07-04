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
            
                <a href="<?php echo site_url('Admin/Home/rainbow_dashboard')?>" ><span class="BrndNm"><?php echo $this->session->userdata('client_name')?></span></a>
            </div>
            <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <a href="<?php echo site_url('Admin/Home/rainbow_dashboard')?>" class="MnDshbrdLnk">Dashboard</a>
                <ul class="LnkHldr FrstLvl">
                    
						<?php if( (modules::run('Admin/Site/authlink','water_Water-Level'))  ) { ?>
						
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(555)" id="cat555"><img src="<?php echo site_url() ?>asset/demoforall/Images/Water-Tank-W.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Water</span></a>
                        <ul class="ScndLvl" id="subcat555" style="display: none;">                          
                        <?php if(modules::run('Admin/Site/authlink','water_Water-Level')){ ?>                            
							<li>
                                <?php if($loc==0){ ?>
                                <a href="<?php echo site_url('Admin/Home/rainbow_water?id=3&loc=0')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/water_level_menu.png" width="22px"/> <span class="Txt">Water Level</span></a>
                                <?php }else if($loc==1){?>
                                    <a href="<?php echo site_url('Admin/Home/rainbow_water?id=1&loc=1')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/water_level_menu.png" width="22px"/> <span class="Txt">Water Level</span></a>
                                    <?php }else if($loc==2){?>
                                        <a href="<?php echo site_url('Admin/Home/rainbow_water?id=2&loc=2')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/water_level_menu.png" width="22px"/> <span class="Txt">Water Level</span></a>
                                        <?php }?>
                                          
                            </li>
						<?php } ?>
						
						
                        </ul>
                        </li> 
						<?php } ?>
						<?php if( (modules::run('Admin/Site/authlink','energy_Energy-Meter'))  ) { ?>
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(556)" id="cat556"><img src="<?php echo site_url() ?>asset/demoforall/Images/energy-w.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Energy</span></a>
                        <ul class="ScndLvl" id="subcat556" style="display: none;">                          
                        <?php if(modules::run('Admin/Site/authlink','energy_Energy-Meter')){ ?>
                            <li>
                            <?php if($loc==0){ ?>
                                <a href="<?php echo site_url('Admin/Home/rainbow_energy?id=3&loc=0')?>#energy" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Electric-Meter-W.png" width="22px"/> <span class="Txt">Energy Meter</span></a>
                                <?php }else if($loc==1){?>
                                    <a href="<?php echo site_url('Admin/Home/rainbow_energy?id=1&loc=1')?>#energy" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Electric-Meter-W.png" width="22px"/> <span class="Txt">Energy Meter</span></a>
                                    <?php }else if($loc==2){?>
                                        <a href="<?php echo site_url('Admin/Home/rainbow_energy?id=2&loc=2')?>#energy" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Electric-Meter-W.png" width="22px"/> <span class="Txt">Energy Meter</span></a>
                                        <?php }?>
                               
                            </li>
                        <?php } ?>
                                                
                            
                        </ul>
                        </li>
						<?php } ?>                
						<?php if( (modules::run('Admin/Site/authlink','ahu'))  ) { ?>
						
						<li>
							<a class="Lnk Arr Slct" href="#" onclick="menushow(595)" id="cat558"><img src="<?php echo site_url() ?>asset/demoforall/Images/air_menu.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Air Conditioning</span></a>
							<ul class="ScndLvl" id="subcat595" style="display: none;">
                            <?php if(modules::run('Admin/Site/authlink','ahu')){ ?>
								
                                <li>
                                <?php if($loc==0){ ?>
                                    <a href="<?php echo site_url('Admin/Home/aircondition_rainbow?id=3&loc=0')?>#hvac" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu-w.png" width="35px" style="margin-right:0px"/> <span class="Txt">AHU</span></a>
                                    <?php }else if($loc==1){?>
                                        <a href="<?php echo site_url('Admin/Home/aircondition_rainbow?id=1&loc=1')?>#hvac" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu-w.png" width="35px" style="margin-right:0px"/> <span class="Txt">AHU</span></a>
                                        <?php }else if($loc==2){?>
                                            <a href="<?php echo site_url('Admin/Home/aircondition_rainbow?id=2&loc=2')?>#hvac" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu-w.png" width="35px" style="margin-right:0px"/> <span class="Txt">AHU</span></a>
                                            <?php }?>
								 
								 </li>
                                
                                 <?php } ?>
                            
							</ul>
						</li>
						<?php } ?>

                    <li>
                    <a href="<?php echo site_url('Admin/Home/all_reports_rainbow') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>                                
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        