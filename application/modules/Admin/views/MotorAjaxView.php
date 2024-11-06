<div class="CntntHldr">
                <div class="SwtchCntrlHldr">
                    <div class="DrpDwnHldr">
                        <select class="Input">
                            <option>VC-Bungalow</option>
                            
                          </select>
                    </div>
                    <div class="SctnHldr">
                        <span class="ScnTtl">Device Status</span>
                        <div class="DtlScnHldr">
                            <div class="DtlSctnDtl Hlf">
                                <span class="SctnTxtTtl">Near Borewell</span>
								
                                <span class="SttsTxt <?php echo $switchdata["d2"][0]["DeviceStatus"]; ?>"><?php echo $switchdata["d2"][0]["DeviceStatus"]; ?></span>
                                <span class="Updtxt">
                                    <span class="TxtSml">Last updated on</span>
                                    <span class="TxtDtTm"><?php echo $switchdata["d2"][0]["DeviceUpdatedDate"]; ?></span>
                                </span>
                            </div>
                            <div class="DtlSctnDtl Hlf">
                                <span class="SctnTxtTtl">Near Sump</span>
                                <span class="SttsTxt <?php echo $switchdata["d2"][1]["DeviceStatus"]; ?>"><?php echo $switchdata["d2"][1]["DeviceStatus"]; ?></span>
                                <span class="Updtxt">
                                    <span class="TxtSml">Last updated on</span>
                                    <span class="TxtDtTm"><?php echo $switchdata["d2"][1]["DeviceUpdatedDate"]; ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="SctnHldr">
                        <span class="ScnTtl">Water Level</span>
                        <div class="DtlScnHldr">

                            <div class="DtlSctnDtl Hlf">
                                <span class="SctnTxtTtl"><?php echo $switchdata["d1"][1]["Device"]; ?></span>
                                <?php if($switchdata["d1"][1]["CurReading"]==1){ ?>
                                <span class="SttsTxt Down">Down</span>
                                <?php }elseif($switchdata["d1"][1]["CurReading"]==0){?>
                                <span class="SttsTxt Full">Full</span>
                                <?php }else{ ?>
                                    <span class="SttsTxt Down">Offline</span>
                                    <?php }?>
                                
                            </div>
                            <div class="DtlSctnDtl Hlf">
                                <span class="SctnTxtTtl"><?php echo $switchdata["d1"][0]["Device"]; ?></span>
                                <?php if($switchdata["d1"][0]["CurReading"]==1){ ?>
                                <span class="SttsTxt Down">Down</span>
                                <?php }elseif($switchdata["d1"][0]["CurReading"]==0){?>
                                <span class="SttsTxt Full">Full</span>
                                <?php }else{ ?>
                                    <span class="SttsTxt Down">Offline</span>
                                    <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="SctnHldr">
                        <span class="ScnTtl">Motor Status</span>
                        <div class="DtlScnHldr">
                            <div class="DtlSctnDtl OneThrd">
                                <span class="SctnTxtTtl">Borewell</span>
                            </div>
                            <div class="DtlSctnDtl OneThrd">
                                <span class="SctnTxtTtl">Status</span>
                                <?php if($switchdata["d2"][0]["status"]==0){ ?>
                                    <span class="SttsTxt Off">Off</span>
                                    <?php }else if($switchdata["d2"][0]["status"]==1){?>
                                        <span class="SttsTxt On">On</span>
                                        <?php }elseif($switchdata["d2"][0]["status"]==2){?>
                                            <span class="SttsTxt Off">Offline</span>
                                            <?php }else{?>
                                                <span class="SttsTxt Off">No Data</span>
                                                <?php }?>
                                
                            </div>
                            <div class="DtlSctnDtl OneThrd">
                                <span class="SctnTxtTtl">Running Hours</span>
                                <span class="SttsTxt Hrs"><?php echo $switchdata["d2"][0]["todayrunn"]; ?></span>
                            </div>
                        </div>
                        <div class="DtlScnHldr">
                            <div class="DtlSctnDtl OneThrd">
                                <span class="SctnTxtTtl">Sump</span>
                            </div>
                            <div class="DtlSctnDtl OneThrd">
                                <span class="SctnTxtTtl">Status</span>
                                <?php if($switchdata["d2"][1]["status"]==0){ ?>
                                    <span class="SttsTxt Off">Off</span>
                                    <?php }else if($switchdata["d2"][1]["status"]==1){?>
                                        <span class="SttsTxt On">On</span>
                                        <?php }elseif($switchdata["d2"][1]["status"]==2){?>
                                            <span class="SttsTxt Off">Offline</span>
                                            <?php }else{?>
                                                <span class="SttsTxt Off">No Data</span>
                                                <?php }?>
                            </div>
                            <div class="DtlSctnDtl OneThrd">
                                <span class="SctnTxtTtl">Running Hours</span>
                                <span class="SttsTxt Hrs"><?php echo $switchdata["d2"][1]["todayrunn"]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>