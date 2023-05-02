<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPM</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer" >
    
        <div class="ContainerRight" style="width:100%">
            <div class="SrchFltrDv ChckLst">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-3" style="font: 600 11px/100% 'Open Sans';    color: #0078BA;    padding-top: 16px;
    font-weight: bold;width:18%">
                            PREVENTIVE MAINTENANCE PLAN
                        </div>
                        <div class="col-md-6 BttnHldr">
                            <button type="button" onclick="javascript:ModalPopup();" class="btn btn-primary SbmtBtn">Add New</button>
                        </div>
                    </div>
                </div>
            </div>
         
        <img src="<?php echo base_url(); ?>asset/hospital_admin/Images/ppm5.png" style="width:100%;  image-rendering: auto;
  image-rendering: crisp-edges;
  image-rendering: pixelated;

  /* Safari seems to support, but seems deprecated and does the same thing as the others. */
  image-rendering: -webkit-optimize-contrast;
">
    
        </div>
    </div>

    <div id="AppMdlHldr" class="AppModalHldr Hide">
        <div class="AppModalInnrHldr LdrShpPrfl" style="width:32%;height:32%">
            <div class="ModalTtlHldr LdrshpTtl">
               
                <span class="PrflName_2">Add New Preventive Maintenace Plan</span>
                
                <span id="AppMdlClsBtn" onclick="javascript:ModalPopup();" class="ModalClsBtn"></span>
                <div class="row" style="padding-left:10px">
                    <div class="col">
                        <span class="PrflDtlTtl" style="    font-weight: bold;">Site ID</span>
                        <span class="PrflDtlTxt"><input type="text" class="form-control" style="width:40%;    font-size: 11px;"  name="email_id" value="" placeholder="Site Id"/></span>
                    </div>
                    
                    <div class="w-100"></div>
                    <div class="col"><span class="PrflDtlTtl" style="    font-weight: bold;">Service Name</span>
                        <span class="PrflDtlTxt"> <?php $options2 = array('0' => 'Service Name','1' => 'Service one','2' => 'Service Two'); echo form_dropdown('account_type',$options2,'','class="form-control" style="width:82%;    font-size: 11px;"'); ?></span></div>
                    <div class="col"><span class="PrflDtlTtl" style="    font-weight: bold;">Device Name</span>
                        <span class="PrflDtlTxt"><input type="text" class="form-control" name="email_id" style="width:82%;    font-size: 11px;" value="<?php echo $employee['email_id']  ?>" placeholder="Enter Device Name"/></span></div>
                    
                        <div class="w-100"></div>
                        <div class="col"><span class="PrflDtlTtl" style="    font-weight: bold;">Recurrence</span>
                        <span class="PrflDtlTxt"><?php $options3 = array('0' => 'Select Recurrence','1' => 'Recurrence one','2' => 'Recurrence Two'); echo form_dropdown('account_type',$options3,'','class="form-control" style="width:82%;    font-size: 11px;"'); ?></span></div>
                    <div class="col"><span class="PrflDtlTtl" style="    font-weight: bold;">Date</span>
                        <span class="PrflDtlTxt"><input type="date" class="form-control" style="width:82%;    font-size: 11px;" name="email_id" value="" placeholder="Site Id"/></span></div>
                        <div class="w-100"></div>
                    <div class="col" style="padding-top:10px"><button type="button"  class="btn btn-primary SbmtBtn">Submit</button></div>
                        
                </div>

            </div>
            
           
        </div>
    </div>
</body>
</html>
