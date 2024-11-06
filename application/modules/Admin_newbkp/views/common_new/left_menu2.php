<div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
			
                <a href="<?php echo site_url('Admin/Home/')?>" ><span class="BrndNm"><?php echo $this->session->userdata('client_name')?></span></a>
            </div>
            <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <ul class="LnkHldr FrstLvl">
					
                    
					<?php 
					$this->load->model('Api_data_model');
					$categories=$this->Api_data_model->get_categories();
					foreach($categories as $cat){
						$devices=$this->Api_data_model->get_devices($cat['category_id']);
						?>
						<li >
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(<?php echo $cat['category_id']?> )" id="cat<?php echo $cat['category_id']?>"><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $cat['menu_icon'] ?>" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd"><?php echo ucwords(strtolower($cat['category_name']))?></span></a>
						<ul class="ScndLvl" id="subcat<?php echo $cat['category_id']?>" style="display: none;">                          
						<?php 
						foreach($devices as $dev){
							$permission=str_replace(' ','_',$dev['device_name']);
							$permissions=$this->session->userdata('permissions');
							if(in_array($permission,explode(',',$permissions))){
							?>
							
							<li>
                                <a href="<?php echo site_url('Admin/Home/')?>#div<?php echo $dev['device_id']?>" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/img/<?php echo  $dev['menu_icon'] ?>" width="22px"/> <span class="Txt"><?php echo ucwords(strtolower($dev['device_name']))?></span></a>
                            </li>
							<?php } 
						}
						?>
						</ul>
						</li>
						<?php
					}
					
					?>
					<li>
                        <a href="" class="Lnk Arr" id="reports"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                        <ul class="ScndLvl" id="reportsmenu" style="display:none">
                            
							<?php /*<?php 
							$devices1=$this->Api_data_model->get_devices('');
							foreach($devices1 as $dev1){
								?>
								<li><a href="" class="Lnk Arr" onclick="reports2(<?php echo $dev1['device_id']?>);return false;"><span class="Txt"><?php echo ucwords(strtolower($dev1['device_name']))?> Reports</span></a>
									<ul class="ThrdLvl" id="subreports<?php echo $dev1['device_id']?>" style="display:none">
                                    <li>
                                        <a href="<?php echo site_url('Admin/Home/reports/' . $dev1['device_id']).'/Running_hours' ?>" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        
										<a href="<?php echo site_url('Admin/Home/reports/' . $dev1['device_id']).'/Graph' ?>" class="Lnk"><span class="Txt"><?php echo $dev1['device_name']?> GRAPH REPORT</span></a>
                                    </li>
									</ul>
								</li>
								<?php
							}
							?>*/?>
							<?php 
							$permission="firepump_report";
							$permissions=$this->session->userdata('permissions');
							if(in_array($permission,explode(',',$permissions))){
							?>
							<li>
							<a href="" class="Lnk Arr" id="firepump"><span class="Txt">Firepump Reports</span></a>
									<ul class="ThrdLvl" id="subfirepump" style="display:none">
                                   <?php /* ?> <li>
                                        <a href="<?php echo site_url('Admin/Home/firepump_reports/Running_hours') ?>" class="Lnk"><span class="Txt">Pumps Running Hours Report</span></a>
                                    </li>
									<li>
                                        <a href="<?php echo site_url('Admin/Home/firepump_reports/Graph') ?>" class="Lnk"><span class="Txt">Pumps Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/Home/firepump_reports/PressureGraph') ?>" class="Lnk"><span class="Txt">Pressure Graph Report</span></a>
                                    </li>
                                    <?php */?>
                                    <li>
                                        <a href="<?php echo site_url('Admin/Home/firepump_reports/Tabular') ?>" class="Lnk"><span class="Txt">Tabular</span></a>
                                    </li>
									<li>
                                        <a href="<?php echo site_url('Admin/Home/firepump_reports/Graphical') ?>" class="Lnk"><span class="Txt">Graphical</span></a>
                                    </li>
									</ul>
							</li>
							<?php } ?>
                                
                                <?php /**/?>
                           
                             
                        </ul>
                    </li> 
					
                </ul>
            </div>
        </div>
		