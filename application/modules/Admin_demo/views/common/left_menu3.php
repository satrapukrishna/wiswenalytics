
<?php //echo print_r($this->session->userdata());die(); ?>
<div id="DshbrdLft" class="DshBrdLnk">
            <div class="BrndHldr">
            
                <a href="<?php echo site_url('Admin_demo/Home/water')?>" ><span class="BrndNm"><?php echo $this->session->userdata('client_name')?></span></a>
            </div>
            <div class="DshBrdLnkCntr" id="root" data-simplebar>
                <ul class="LnkHldr FrstLvl">
                    
						<?php if( (modules::run('Admin_demo/Site/authlink','water_Water-Level')) || (modules::run('Admin_demo/Site/authlink','water_Water-Meter')) || (modules::run('Admin_demo/Site/authlink','water_Flow-Meter'))  || (modules::run('Admin_demo/Site/authlink','water_motorrunninghours'))  || (modules::run('Admin_demo/Site/authlink','water_linepressure'))  || (modules::run('Admin_demo/Site/authlink','water_hydropnematicpumps'))  || (modules::run('Admin_demo/Site/authlink','water_firepump'))  || (modules::run('Admin_demo/Site/authlink','water_borewells'))  || (modules::run('Admin_demo/Site/authlink','water_stp'))  || (modules::run('Admin_demo/Site/authlink','water_watertankers'))  || (modules::run('Admin_demo/Site/authlink','water_boilers'))  || (modules::run('Admin_demo/Site/authlink','water_hotwatertanker'))  || (modules::run('Admin_demo/Site/authlink','water_wetness')) ) { ?>
						
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(555)" id="cat555"><img src="<?php echo site_url() ?>asset/demoforall/Images/Water-Tank-W.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Water</span></a>
                        <ul class="ScndLvl" id="subcat555" style="display: none;">                          
                        <?php if(modules::run('Admin_demo/Site/authlink','water_Water-Level')){ ?>                            
							<li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/water_level_menu.png" width="22px"/> <span class="Txt">Water Level</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_linepressure')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#line" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/line-w.png" width="22px"/> <span class="Txt">Line Pressure</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_motorrunninghours')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#motor" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/motor-w.png" width="22px"/> <span class="Txt">Motor Monitoring</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_Water-Meter')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#water_meter" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-W.png" width="22px"/> <span class="Txt">Water Meter</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_Firepump')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#fire" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Fire-Pump-W.png" width="22px"/> <span class="Txt">Firepump</span></a>
                            </li>
						<?php } ?>
                        <?php if(modules::run('Admin_demo/Site/authlink','water_Firepump1')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#fire1" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Fire-Pump-W.png" width="22px"/> <span class="Txt">New Firepump</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_Hydro-Pnematic-System')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#hydro1" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/HydroPnematicSystem.png" width="22px"/> <span class="Txt">Hydro Pnematic System</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_Borewells')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#borewell" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/motor-w.png" width="22px"/> <span class="Txt">Borewells</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_stp')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#stp" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/STP.png" width="22px"/> <span class="Txt">STP</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_boilers')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#boilers" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Boilers.png" width="22px"/> <span class="Txt">Boilers</span></a>
                            </li>
						<?php } ?>
                        <?php if(modules::run('Admin_demo/Site/authlink','water_Flow-Meter')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#fmetr" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Flow-Meter.png" width="22px"/> <span class="Txt">Flow Meter</span></a>
                            </li>
						<?php } ?>
						<?php if(modules::run('Admin_demo/Site/authlink','water_hotwatertanker')){ ?>	
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/water/')?>#hot_water" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/HotWaterTanks.png" width="22px"/> <span class="Txt">Hotwater Tanks</span></a>
                            </li>
                        <?php } ?>
						
                        </ul>
                        </li> 
						<?php } ?>
						<?php if( (modules::run('Admin_demo/Site/authlink','energy_Energy-Meter')) || (modules::run('Admin_demo/Site/authlink','energy_btu_meters'))  || (modules::run('Admin_demo/Site/authlink','energy_DG'))  || (modules::run('Admin_demo/Site/authlink','energy_Power-Supply'))  || (modules::run('Admin_demo/Site/authlink','energy_dieselmeters'))  || (modules::run('Admin_demo/Site/authlink','energy_batteryvoltage'))  || (modules::run('Admin_demo/Site/authlink','energy_lpg'))  || (modules::run('Admin_demo/Site/authlink','energy_tripstatus'))  || (modules::run('Admin_demo/Site/authlink','energy_ard')) ) { ?>
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(556)" id="cat556"><img src="<?php echo site_url() ?>asset/demoforall/Images/energy-w.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Energy</span></a>
                        <ul class="ScndLvl" id="subcat556" style="display: none;">                          
                        <?php if(modules::run('Admin_demo/Site/authlink','energy_Energy-Meter')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#energy" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Electric-Meter-W.png" width="22px"/> <span class="Txt">Energy Meter</span></a>
                            </li>
                        <?php } ?>
                         <?php if(modules::run('Admin_demo/Site/authlink','energy_btu_meters')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#btu" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/btu-w.png" width="22px"/> <span class="Txt">BTU</span></a>
                            </li>
                             <?php } ?>

                              <?php if(modules::run('Admin_demo/Site/authlink','energy_Power-Supply')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#powersup" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DG.png" width="22px"/> <span class="Txt">Power Supply</span></a>
                            </li> <?php } ?>

                            <?php if(modules::run('Admin_demo/Site/authlink','energy_DG')){ ?>
                            <li>
                            <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#dg" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DG.png" width="22px"/> <span class="Txt">DG</span></a>
                            </li>
                            <?php } ?>
                             <?php if(modules::run('Admin_demo/Site/authlink','energy_UPS')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#upss" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/ups_menu.png" width="22px"/> <span class="Txt">UPS</span></a>
                            </li>
                              <?php } ?>
                              <?php if(modules::run('Admin_demo/Site/authlink','DG_Trip_Status')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#dgtrip" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DG-TripStatus.png" width="22px"/> <span class="Txt">DG Trip Status</span></a>
                            </li>
                              <?php } ?>
                             <?php if(modules::run('Admin_demo/Site/authlink','lpg')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#lpg" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/LPG-W.png" width="22px"/> <span class="Txt">LPG</span></a>
                            </li>
                             <?php } ?>
                             <?php if(modules::run('Admin_demo/Site/authlink','trip_status')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#trip" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/TripStatus.png" width="22px"/> <span class="Txt">Trip Status</span></a>
                            </li>
                             <?php } ?>
                             <?php if(modules::run('Admin_demo/Site/authlink','diesel_tank')){ ?>
                             <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#diesel_tank" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DieselTank.png" width="22px"/> <span class="Txt">Diesel Tank</span></a>
                            </li>
                            <?php } ?>
                            <?php if(modules::run('Admin_demo/Site/authlink','diesel_meters')){ ?>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/energy/')?>#diesel_meter" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DieselMeter.png" width="22px"/> <span class="Txt">Diesel Meters</span></a>
                            </li>
                            <?php } ?>                           
                            
                        </ul>
                        </li>
						<?php } ?>                
						<?php if( (modules::run('Admin_demo/Site/authlink','ahu')) || (modules::run('Admin_demo/Site/authlink','airconditioning_splitac'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_indoorunits'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_lightingdb'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_vrv'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_vrfs'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_heaters'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_chillers'))  || (modules::run('Admin_demo/Site/authlink','airconditioning_coolingtowers')) ) { ?>
						
						<li>
							<a class="Lnk Arr Slct" href="#" onclick="menushow(500)" id="cat595"><img src="<?php echo site_url() ?>asset/demoforall/Images/air_menu.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Air Conditioning</span></a>
							<ul class="ScndLvl" id="subcat500" style="display: none;">
								 <li>
								 <a href="<?php echo site_url('Admin_demo/Home/aircondition/')?>#hvac" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu-w.png" width="35px" style="margin-right:0px"/> <span class="Txt">AHU</span></a>
								 </li>
								 <li>
									<a href="<?php echo site_url('Admin_demo/Home/aircondition/')?>#div7" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Chillers.png" width="28px" style="margin-right:2px"/> <span class="Txt">Chiller</span></a>
								</li>
								 <li>
								  <a href="<?php echo site_url('Admin_demo/Home/aircondition/')?>#div8" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/cooling-w.png" width="22px"/> <span class="Txt">Cooling Tower</span></a>
								  </li>
                                  <li>
								  <a href="<?php echo site_url('Admin_demo/Home/aircondition/')?>#div88" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/IndoorAirQuality.png" width="22px"/> <span class="Txt">Indoor Air Quality</span></a>
								  </li>
							</ul>
						</li>
						<?php } ?>

                        <?php if( (modules::run('Admin_demo/Site/authlink','ESSENTIAL SERVICES_Water_Level')) || (modules::run('Admin_demo/Site/authlink','ESSENTIAL SERVICES_DG'))  || (modules::run('Admin_demo/Site/authlink','ESSENTIAL SERVICES_Oxygen_Plants'))  ) { ?>
						
                            <li>
							<a class="Lnk Arr Slct" href="#" onclick="menushow(559)" id="cat558"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Essential Services</span></a>
							<ul class="ScndLvl" id="subcat559" style="display: none;">
                            <?php if(modules::run('Admin_demo/Site/authlink','ESSENTIAL SERVICES_Water_Level')){ ?>
								 <li>
								 <a href="<?php echo site_url('Admin_demo/Home/essential/')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/water_level_menu.png" width="20px" style="margin-right:0px"/> <span class="Txt">Water Level</span></a>
								 </li>
                             <?php } ?> 
                             <?php if(modules::run('Admin_demo/Site/authlink','ESSENTIAL SERVICES_DG')){ ?>  
								 <li>
									<a href="<?php echo site_url('Admin_demo/Home/essential/')?>#dg" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DG.png" width="28px" style="margin-right:2px"/> <span class="Txt">DG </span></a>
								</li>
                                <?php } ?>
                                <?php if(modules::run('Admin_demo/Site/authlink','ESSENTIAL SERVICES_Oxygen_Plants')){ ?>
								 <li>
								  <a href="<?php echo site_url('Admin_demo/Home/essential/')?>#lpg" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/LPG-W.png" width="22px"/> <span class="Txt">Oxygen Plants</span></a>
								  </li>
                                  <?php } ?>
                               
							</ul>
						</li>
						<?php } ?>
                        <?php if( (modules::run('Admin_demo/Site/authlink','Fire Pump System_Firepump'))   ) { ?>
						
                        <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(909)" id="cat558"><img src="<?php echo site_url() ?>asset/demoforall/Images/Fire-Pump-W.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Fire Pump System</span></a>
                        <ul class="ScndLvl" id="subcat909" style="display: none;">
                        <?php if(modules::run('Admin_demo/Site/authlink','Fire Pump System_Firepump')){ ?>
                             <li>
                             <a href="<?php echo site_url('Admin_demo/Home/firepump/')?>#fire" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Fire-Pump-W.png" width="20px" style="margin-right:0px"/> <span class="Txt">Firepump</span></a>
                             </li>
                         <?php } ?> 
                         
                           
                        </ul>
                    </li>
                    <?php } ?>
                        <?php if( (modules::run('Admin_demo/Site/authlink','switch controls_Switch-Control')) || (modules::run('Admin_demo/Site/authlink','swimming_pool'))  || (modules::run('Admin_demo/Site/authlink','motor_switch_control'))  || (modules::run('Admin_demo/Site/authlink','lighting_automation'))   ) { ?>
						
						<li>
							<a class="Lnk Arr Slct" href="#" onclick="menushow(7)" id="cat7"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Switch Controls</span></a>
							<ul class="ScndLvl" id="subcat7" style="display: none;">
                            <?php if(modules::run('Admin_demo/Site/authlink','switch controls_Switch-Control')){ ?>
								 <li>
								 <a href="<?php echo site_url('Admin_demo/Home/switchcontrol/')?>#swtch" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control.png" width="35px" style="margin-right:0px"/> <span class="Txt">Switch Control</span></a>
								 </li>
                             <?php } ?> 
                             <?php if(modules::run('Admin_demo/Site/authlink','swimming_pool')){ ?>  
								 <li>
									<a href="<?php echo site_url('Admin_demo/Home/switchcontrol/')?>#swimm" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Swimming-Pool.png" width="28px" style="margin-right:2px"/> <span class="Txt">Swimming Pool </span></a>
								</li>
                                <?php } ?>
                                <?php if(modules::run('Admin_demo/Site/authlink','motor_switch_control')){ ?>
								 <li>
								  <a href="<?php echo site_url('Admin_demo/Home/switchcontrol/')?>#msc" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Motor-SwitchControl.png" width="22px"/> <span class="Txt">Motor Switch Control</span></a>
								  </li>
                                  <?php } ?>
                                <?php if(modules::run('Admin_demo/Site/authlink','lighting_automation')){ ?>
                                  <li>
								  <a href="<?php echo site_url('Admin_demo/Home/switchcontrol/')?>#lac" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Lighting-Automation.png" width="22px"/> <span class="Txt">Lighting Automation</span></a>
								  </li>
                                  <?php } ?>
							</ul>
						</li>
						<?php } ?>
                        <?php if( (modules::run('Admin_demo/Site/authlink','switch status_Switch-Status'))    ) { ?>
						
						<li>
							<a class="Lnk Arr Slct" href="#" onclick="menushow(559)" id="cat558"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Switch Status</span></a>
							<ul class="ScndLvl" id="subcat559" style="display: none;">
                            <?php if(modules::run('Admin_demo/Site/authlink','switch status_Switch-Status')){ ?>
								 <li>
								 <a href="<?php echo site_url('Admin_demo/Home/switchcontrol/')?>#swtch" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Switch-Control.png" width="35px" style="margin-right:0px"/> <span class="Txt">Switch Status</span></a>
								 </li>
                             <?php } ?> 
                            
							</ul>
						</li>
						<?php } ?>
						<?php if( (modules::run('Admin_demo/Site/authlink','indoor_units')) || (modules::run('Admin_demo/Site/authlink','airquality_carbonmonoxide'))  || (modules::run('Admin_demo/Site/authlink','airquality_humidity'))  || (modules::run('Admin_demo/Site/authlink','airquality_pressure'))  || (modules::run('Admin_demo/Site/authlink','airquality_temperature'))  || (modules::run('Admin_demo/Site/authlink','airquality_pm2.5'))  || (modules::run('Admin_demo/Site/authlink','airquality_pm10'))  || (modules::run('Admin_demo/Site/authlink','airquality_voc'))  || (modules::run('Admin_demo/Site/authlink','airquality_methane'))|| (modules::run('Admin_demo/Site/authlink','airquality_treatedfreshairunits'))|| (modules::run('Admin_demo/Site/authlink','airquality_toiletexhausts'))|| (modules::run('Admin_demo/Site/authlink','airquality_pressurisationfans'))|| (modules::run('Admin_demo/Site/authlink','airquality_ventilationsfans')) ) { ?>
						
						<li>
							<a class="Lnk Arr Slct" href="#" onclick="menushow(560)" id="cat560"><img src="<?php echo site_url() ?>asset/admin/images/AirQuality.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Air Quality</span></a>
							 <ul class="ScndLvl" id="subcat560" style="display: none;">
								 <li>
									 <a href="<?php echo site_url('Admin_demo/Home/airquality/')?>#airqua" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/IndoorAirQuality.png" width="22px"/> <span class="Txt">Indoor Air Quality </span></a>
								</li>
								 <li>
									 <a href="<?php echo site_url('Admin_demo/Home/airquality/')?>#toilet" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/ToiletExhaust.png" width="22px"/> <span class="Txt">Toilet Exhaust </span></a>
								</li>
								 <li>
									 <a href="<?php echo site_url('Admin_demo/Home/airquality/')?>#ventilation" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/VentilationFan.png" width="22px"/> <span class="Txt">Ventilation Fans</span></a>
								</li>
							 </ul>
						<!-- </li> -->

					 <!-- </ul> -->

                        </li>
						<?php } ?>
						<?php if( (modules::run('Admin_demo/Site/authlink','lifts')) ) { ?>
                         <li>
                                    <a class="Lnk Arr Slct" href="#" onclick="menushow(570)" id="cat558"><img src="<?php echo site_url() ?>asset/admin/images/SoftIntegration.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Soft Integration</span></a>
                                     <ul class="ScndLvl" id="subcat570" style="display: none;">
                                         <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/soft_integration/')?>#lifts" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Lifts.png" width="22px"/> <span class="Txt">Lifts </span></a>
                                        </li>
                                        <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/soft_integration/')?>#" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/DG.png" width="22px"/> <span class="Txt">DG </span></a>
                                        </li>
                                        <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/soft_integration/')?>#" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Invertor.png" width="22px"/> <span class="Txt">Invertor </span></a>
                                        </li>
                                         <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/soft_integration/')?>#" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/Chillers.png" width="22px"/> <span class="Txt">Chillers </span></a>
                                        </li>
                                        <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/soft_integration/')?>#" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/FireAlarm.png" width="22px"/> <span class="Txt">Fire Alarm System </span></a>
                                        </li>
                                        
                                     </ul>
                                <!-- </li> -->

                             <!-- </ul> -->

                        </li>
						<?php } ?>
						<?php if( (modules::run('Admin_demo/Site/authlink','lifts')) ) { ?>
                         <li>
                                    <a class="Lnk Arr Slct" href="#" onclick="menushow(571)" id="cat558"><img src="<?php echo site_url() ?>asset/admin/images/SpeacilizedSolutions.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Specialized Solution</span></a>
                                     <ul class="ScndLvl" id="subcat571" style="display: none;">
                                         <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/specialized/')?>#washroom" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/WashrromMonitoring.png" width="22px"/> <span class="Txt">Washroom Monitoring </span></a>
                                        </li>
                                        <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/specialized/')?>#cold_room" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/ColdRoom.png" width="22px"/> <span class="Txt">Cold Room </span></a>
                                        </li>
                                        <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/specialized/')?>#floor_wetness" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/FloorWet.png" width="22px"/> <span class="Txt">Floor Wetness </span></a>
                                        </li>
                                         <li>
                                             <a href="<?php echo site_url('Admin_demo/Home/specialized/')?>#door_open" class="Lnk"><img src="<?php echo site_url() ?>asset/admin/images/WashrromMonitoring.png" width="22px"/> <span class="Txt">Door -Open/Close </span></a>
                                        </li>
                                        
                                     </ul>
                                <!-- </li> -->

                             <!-- </ul> -->

                        </li>
						<?php } ?>
                       <!--  <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(557)" id="cat557"><img src="<?php echo site_url() ?>asset/demoforall/Images/air_menu.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Air</span></a>
                        <ul class="ScndLvl" id="subcat557" style="display: none;">                          

                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/air/')?>#hvac" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/ahu-w.png" width="35px" style="margin-right:0px"/> <span class="Txt">AHU</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/air/')?>#airqua" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/air_menu.png" width="22px"/> <span class="Txt">Indoor Air Quality </span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/air/')?>#div7" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/chiller-w.png" width="28px" style="margin-right:2px"/> <span class="Txt">Chiller</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/air/')?>#div8" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/cooling-w.png" width="22px"/> <span class="Txt">Cooling Tower</span></a>
                            </li>
                            
                            
                            
                        </ul>
                        </li> -->
                         <?php /*
                    <li>
                        <a href="" class="Lnk Arr" id="reports"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                        <ul class="ScndLvl" id="reportsmenu" style="display:none">
                            
                           <?php 
                            $devices1=$this->Api_data_model->get_devices('');
                            foreach($devices1 as $dev1){
                                ?>
                                <li><a href="" class="Lnk Arr" onclick="reports2(<?php echo $dev1['device_id']?>);return false;"><span class="Txt"><?php echo ucwords(strtolower($dev1['device_name']))?> Reports</span></a>
                                    <ul class="ThrdLvl" id="subreports<?php echo $dev1['device_id']?>" style="display:none">
                                    <li>
                                        <a href="<?php echo site_url('Admin_demo/Home/reports/' . $dev1['device_id']).'/Running_hours' ?>" class="Lnk"><span class="Txt">Running Hours Report</span></a>
                                    </li>
                                    <li>
                                        
                                        <a href="<?php echo site_url('Admin_demo/Home/reports/' . $dev1['device_id']).'/Graph' ?>" class="Lnk"><span class="Txt"><?php echo $dev1['device_name']?> GRAPH REPORT</span></a>
                                    </li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                        
                            <li><a href="" class="Lnk Arr" id="firepump"><span class="Txt">Energy Meter Reports</span></a>
                                    <ul class="ThrdLvl" id="subfirepump" style="display:none">
                                    <li>
                                        <a href="<?php echo site_url('Admin_demo/Home/energy_reports') ?>" class="Lnk"><span class="Txt">Consumption Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin_demo/Home/energy_graph_reports') ?>" class="Lnk"><span class="Txt">Consumption Graph Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin_demo/Home/energy_powerfctr_reports') ?>" class="Lnk"><span class="Txt">Power Factor</span></a>
                                    </li>
                                    
                                    </ul>
                            </li>
                            <li><a href="" class="Lnk Arr" id="firepump1"><span class="Txt">BTU Meter Reports</span></a>
                                    <ul class="ThrdLvl" id="subfirepump1" style="display:none">
                                    <li>
                                        <a href="<?php echo site_url('Admin_demo/Home/btu_reports') ?>" class="Lnk"><span class="Txt">Consumption Report</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin_demo/Home/btu_reports') ?>" class="Lnk"><span class="Txt">Graph Report</span></a>
                                    </li>
                                    
                                    </ul>
                            </li>
                            
                        </ul>
                    </li> 
                    */?>
                    <?php if($this->session->userdata('created_by')==26){?>
                    <li>
                        <a class="Lnk Arr Slct" href="#" onclick="menushow(5555)" id="cat5555"><img src="<?php echo site_url() ?>asset/demoforall/Images/Flow-Meter-W.png" width="20px"/> <span id="dsh" class="Lnk Arr Slct Dshbrd">Water Meter Management</span></a>
                        <ul class="ScndLvl" id="subcat5555" style="display: none;">                          
                                                 
							<!-- <li>
                                <a href="<?php echo site_url('Admin_demo/Home/waterMeterList/')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/MenuSettings-W.png" width="22px"/> <span class="Txt">Water Meter Schedules</span></a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/addwatermeter/')?>#water" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Dashboard-W.png" width="22px"/> <span class="Txt">Add Water Meter Schedule</span></a>
                            </li> -->
                            <li>
                                <a href="<?php echo site_url('Admin_demo/Home/watermeterDashboard/')?>#watermeter" class="Lnk"><img src="<?php echo site_url() ?>asset/demoforall/Images/Dashboard-W.png" width="22px"/> <span class="Txt">Water Meter Dashboard</span></a>
                            </li>
						

                        </ul>
                    </li>
                    <?php } ?>
                    <li>
                    <?php if($this->session->userdata('user_id')==19){ ?>
                    <a href="<?php echo site_url('Admin_demo/Home/all_reports_demo') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } elseif($this->session->userdata('user_id')==21){?>
                        
                    
                    <a href="<?php echo site_url('Admin_demo/Home/all_reports_chennai') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } elseif($this->session->userdata('user_id')==25){?>
                        
                    
                        <a href="<?php echo site_url('Admin_demo/Home/all_reports_lonavala') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                        <?php } elseif($this->session->userdata('user_id')==27){?>
                        
                    
                        <a href="<?php echo site_url('Admin_demo/Home/all_reports_mumbai') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } elseif($this->session->userdata('user_id')==4){?>
                    
                    <a href="<?php echo site_url('Admin_demo/Home/all_reports_cbre') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php }elseif($this->session->userdata('created_by')!=25){?>
                    
                    <a href="<?php echo site_url('Admin_demo/Home/all_reports') ?>" class="Lnk Arr" id="reportss"><img src="<?php echo site_url() ?>asset/admin/img/reports-img.png" width="20px"/> <span class="Txt">Reports</span></a>
                    <?php } ?>              
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        