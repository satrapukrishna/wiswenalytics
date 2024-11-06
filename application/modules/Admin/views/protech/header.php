<div class="AppHeader">
        <div class="AppMnuTtlHldr">
            <div class="TtlHldr">
                <div class="ClntLgoHldr">
                    <img src="<?php echo base_url(); ?>asset/protechs/Images/CompanyLogo.png" class="Lgo" />
                </div>
            </div>
        </div>
        <div class="AppUsrCntrlHldr">
            <ul class="UsrNav">
                <li>
                    <a href="#" class="NavLnk WISIcn-Notification"></a>
                </li>
                <li>
                    <a href="#" class="NavLnk WISIcn-Help"></a>
                </li>
                <li>
                    <div class="UsrDvHldr">
                        <div class="UsrDtls">
                            <div class="PrflNmeHldr">
                                <span class="Nme">NH Admin</span>
                            </div>
                           
                        </div>
                    </div>
                    <div class="HdrSbMnuHldr UsrDv">
                        <div class="InnrHldr">
                            <div class="PrflSbMnu">
                                <ul class="LnkLst">
                                    <li>
                                        <div class="PrflMiniView">
                                            
                                            <div class="PrflBscDtls">
                                                <span class="PrflName"><?php echo $this->session->userdata('client_name'); ?></span>
                                                <span class="PrflDesignation"></span>
                                                <span class="PrflEmail"><?php echo $this->session->userdata('user_name'); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="Lnk">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/logout'); ?>" class="Lnk">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>