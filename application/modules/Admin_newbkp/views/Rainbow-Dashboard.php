<?php //echo json_encode($rainbow_main_data);die();?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css"> -->
  <style>
	
	input[type="checkbox"][readonly] {
  pointer-events: none;
}
	
	.ph-val{font: 600 40px 'Open Sans'!important;text-align: center;}
	.superscript {
    font-size: 13px;
    line-height: 0.5em;
    vertical-align: baseline;
    position: relative;
    top: -2.0em;
}
	.subhead{font-size:12px;color:#9c9494;border-bottom:1px solid #eae5e5;margin-top:10px;padding-bottom:5px}
	.head-h44{text-align:left;margin:0px;padding:0px;background-color: #fff;
    font: 600 16px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 0px solid #ddd;}
	.toilet-head1{ text-align:center;font: 600 13px 'Open Sans'!important; color:#3c8dbc}
	
	.small-box1{margin-top:20px;width:23.5%;float:left;border:1px solid #eae5e5;border-radius: 10px;padding:5px;margin-right:10px;}
	
	input[type=range]{
    -webkit-appearance: none;
}

input[type=range]::-webkit-slider-runnable-track {
    width: 300px;
    height: 8px;
    background-image: linear-gradient(to right, #00BFFF,#00FF7F,#FFDF00,#FE5A1C,#D51A13);
    border: none;
    border-radius: 3px;
}

input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background-image: radial-gradient(black, white, black);
    margin-top: -4px;
}

input[type=range]:focus {
    outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
    background-image: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);
}
	
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft{width:55%}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{width:45%}
	.degree-text{color: #666;
    font-size: 12px;
    padding-left: 5px;}
	
	.status-working{letter-spacing: 1px;
	border-radius: 25px!important;
    padding: 5px 0!important;
    font: 600 10px 'Open Sans'!important;    
    width: 75px!important;
	display: inline-block!important;
    background-color: #148614!important;
    color: #fff!important;    
    box-sizing: border-box!important;
    text-align: center!important;}
	
	.status-stopped{letter-spacing: 1px;
	border-radius: 25px!important;
    padding: 5px 0!important;
    font: 600 10px 'Open Sans'!important;    
    width: 75px!important;
	display: inline-block!important;
    background-color: #de3939!important;
    color: #fff!important;    
    box-sizing: border-box!important;
    text-align: center!important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li{border-bottom: 1px solid #eee;border-top: none;}
	.bx-wrapper {
    margin-bottom:10px!important;
	}
	.bx-wrapper .bx-controls-auto, .bx-wrapper .bx-pager{bottom: -10px!important}
	.head-h4{margin:0px;padding:10px;background-color: #eee;
    font: 800 14px 'Open Sans';
    color: #3c8dbc;    
    border-bottom: 1px solid #ddd;}
	.inner_collaps{float: right;
    background-color: #367fa8;
    font: 600 12px 'Open Sans';
    color: #fff;
    margin: 14px 30px 0 0;
    padding: 7px 15px 7px 15px;
    cursor: pointer;
    border-radius: 30px;
    margin-top: -35px;
    margin-right: 5px;
	}
	.inner_collaps:before{
	content: 'Collapse';
    }
	.Expndd:before {
    content: 'Expand!!'!important;
	}
	.ClRgt{text-align:center}
	.liright{padding: 25px 10px!important}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls.WtrTnkLvl div.LftHldr{width: 58%!important;}
	div.LiquidTank.Smll span.LiquidStatus{ right: -97px!important;font-size: 26px!important;}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.SctnVwAll{margin: 10px 10px 0 0;}
	.DshBrdSctnTtl{margin-bottom:10px!important}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr {
	background-color: #fff!important;
    box-shadow: none!important;
	border-radius: 10px;
	border: 1px solid #ccc;
	}
	.fire_waterpump {width:100%;margin-left:0%}
	.status-on{
	display: inline-block!important;
    background-color: #52c785!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 7px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 60px!important;
    text-align: center!important;
}
.status-off{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 7px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 60px!important;
    text-align: center!important;
}
.status-off1{
	display: inline-block!important;
    background-color: #d16262!important;
    color: #fff!important;
    border-radius: 30px!important;
    padding: 8px 0!important;
    font: 600 12px 'Open Sans'!important;
    box-sizing: border-box!important;
    width: 85px!important;
    text-align: center!important;
}
	.tank-title{color: #000!important;
    margin-left: 10px;
    margin-top: 15px;
    font-size: 14px;
    font: 600 18px 'Open Sans';}
	div.LiquidTank div.Liquid.l-75, div.LiquidTank.Smll div.Liquid.l-75 {
    height: 121px;
    background-color: rgba(0, 220, 95, 0.7);
    }

img {
vertical-align: middle;
margin-right:10px;}
div.DshMnCtnr div.DshBrdLnk div.DshBrdLnkCntr ul.LnkHldr li a.Lnk{
	padding: 21px 40px 18px 20px!important;
}
.col{
    cursor: pointer;
	z-index:1000000;
	margin: 23px 10px 0 0!important;
	
	}
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClLft, div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls ul.SctnDtlsGrdTbl li div.ClRgt{padding:9px}
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnDtls div.SctnDtlsHldr div.SldrCntnr div.SctnDtls span.SctnTtl {padding:10px}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: none !important;border-bottom: 1px solid #ddd;}
	.bx-wrapper .bx-prev{left: -28px !important;}
	.bx-wrapper .bx-next {right: -31px !important;}
	
	div.DshMnCtnr div.DshBrdCtnr div.DshBrdSctn div.DshBrdSctnTtl span.TxtTtl{
	padding: 14px 0 9px 45px!important;
	}
	.imageadd img{ left: 0px!important;}
	
    div.DtClndrHldr {
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 0;
        display: flex;
        flex-wrap: nowrap;
    }

    div.DtClndrHldr div.DtSlctrHldr {
        display: flex;
        flex-wrap: nowrap;
        margin-left: auto;
        padding: 0 20px;
    }

    div.DtClndrHldr div.DtSlctrHldr div.DtTxtHldr {
        padding-right: 10px;        
    }

    div.DtClndrHldr div.DtSlctrHldr div.DtTxtHldr span.TxtTp {
        display: block;
        font: 500 12px/100% 'Open Sans';
        color: #666;
    }

    div.DtClndrHldr div.DtSlctrHldr div.DtTxtHldr span.TxtDte {
        display: block;
        font: 600 14px/100% 'Open Sans';
        color: #222;
        padding: 3px 0 0 0;
    }

    

    div.DtClndrHldr div.DtSlctrHldr div.DtIcnHldr a.DtIcn {
        display: block;
        text-decoration: none;
        width: 34px;
        height: 34px;
        border: 1px solid #ddd;
        border-radius: 20px;
        background: transparent url(../../asset/loginasset/images/Icn-Calendar.svg) no-repeat center center;
        background-size: 15px;
        transition: 0.3s;
    }

    div.DtClndrHldr div.DtSlctrHldr div.DtIcnHldr a.DtIcn:hover {
        border-color: #367FA8;
        transition: 0.3s;
    }

    div.RnbwDshbrdFllHldr {
        padding: 10px;
        display: flex;
        flex-wrap: wrap;

    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld {
        width: calc(33.33% - 20px);
        margin: 10px;
        background: #FFFFFF;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld {
        width: calc(33.33% - 20px);
        margin: 10px;
        background: #FFFFFF;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LocationHldr {
        padding: 20px;
        display: flex;
        flex-wrap: nowrap;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LocationHldr div.LocationDtls span.LocaitonName {
        display: block;
        font: 700 18px/100% 'Open Sans';
        color: #367FA8;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LocationHldr div.LocationDtls span.LocaitonBscDtls {
        display: block;
        font: 600 14px/100% 'Open Sans';
        padding: 5px 0 0 0;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LocationHldr div.LocationLnkHldr {
        margin-left: auto;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LocationHldr div.LocationLnkHldr a.LcnLnk {
        display: inline-block;
        width: 36px;
        height: 36px;
        text-decoration: none;
        color: #367FA8;
        background: #eee;
        border-radius: 30px;
        position: relative;
        text-align: center;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LocationHldr div.LocationLnkHldr a.LcnLnk:before {
        position: absolute;
        font-family: 'FA-Icon';
        top: 5px;
        left: 10px;
        content: '\f107';
        font-size: 24px;
        transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr {
        border-top: 1px solid #eee;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst {
        list-style: none;
        margin: 0;
        padding: 10px 20px;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li {
        padding: 15px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        flex-wrap: nowrap;
        position: relative;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.NmeHldr {
        display: block;
        color: #222;
        font: 600 15px/100% 'Open Sans';
        position: relative;
        padding: 0 0 0 30px;
    }
    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.NmeHldr_head {
        display: block;
        color: #222;
        font: 600 15px/100% 'Open Sans';
        position: relative;
        padding: 0 0 0 146px;
        font-weight: bold;
    }
    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.NmeHldr_head2 {
        display: block;
        color: #222;
        font: 600 15px/100% 'Open Sans';
        position: relative;
        padding: 0 0 0 100px;
        font-weight: bold;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.NmeHldr:before {
        content: '';
        width: 20px;
        height: 20px;
        position: absolute;
        left: 0;
        top: calc(50% - 10px);
        background-color: transparent !important;
        background-repeat: none !important;
        background-size: 20px !important;
        background-position: center center !important;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.Water:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-Water.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.Energy:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-Energy.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.Fuel:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-Fuel.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.MedicalGas:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-MedicalGas.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.Occupancy:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-Occupancy.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.InPatient:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-InPatient.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcNm span.OutPatient:before {
        background-image: url(../../asset/loginasset/images/RnBwIcn-OutPatient.svg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcVluDtls {
        margin-left: auto;

    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcVluDtls span.VluNmb {
        display: inline-block;
        text-align: right;
        font: 600 15px/100% 'Open Sans';
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.SrvcVluDtls span.VluDsc {
        display: inline-block;
        text-align: left;
        width: 60px;
        font: 600 15px/100% 'Open Sans';
        padding: 0 10px 0 3px;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp {
        position: absolute;
        width: 100%;
        left: -5px;
        bottom: calc(-100% + 5px);
        padding: 15px;
        background: #FAFAFA;
        box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.3);
        border-radius: 6px;
        z-index: 1;
        display: none;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li:hover div.TtlTp {
        display: flex;
        flex-wrap: wrap;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp div.TtlTpLft span.TxtHldr {
        font: 600 13px/100% 'Open Sans';
        color: #444;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp div.TtlTpRgt {
        margin-left: auto;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp div.TtlTpRgt span.VluNmb {
        font: 600 13px/100% 'Open Sans';
        color: #444;
        position: relative;
        padding: 0 30px 0 0;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp div.TtlTpRgt span.VluNmb:before {
        content: '';
        position: absolute;
        width: 8px;
        height: 8px;
        right: 10px;
        top: calc(50% - 4px);
        border: solid #fff;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 3px;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp div.TtlTpRgt span.VluNmb.Up:before {
        border-color: #0D9D00;
        transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld div.LcFllDtlsHldr ul.LcLst li div.TtlTp div.TtlTpRgt span.VluNmb.Down:before {
        border-color: #D92700;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld.Offline {
        opacity: 0.5;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    div.RnbwDshbrdFllHldr div.DtlsFllHld.Offline div.LcFllDtlsHldr ul.LcLst li:hover div.TtlTp {
        display: none !important;
    }


	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
	    <?php $this->load->view('common/Rainbow-Dashboard-LeftMenu') ?>
		<?php $this->load->view('common/header2_rainbow') ?>
        <div class="DshBrdCtnr">
            <div class="DtClndrHldr">
                <div class="DtSlctrHldr">
                    <div class="DtTxtHldr">
                        <span class="TxtTp">Data Date</span>
                        <span class="TxtDte"><?php echo date('j  F Y',strtotime($rainbow_main_data[0]['date'])); ?></span>
                    </div>
                    <form  name="myForm" action="<?php echo site_url("Admin/Home/rainbowMainDashboard")?>" onsubmit="return validateForm()" method="post">
                    <div class="DtIcnHldr">
                        
                    <input type="date" value="<?php echo set_value('date') ?>" class="DtIcn" name="d_date" />
                    <input type="submit" class="btnRnbw btn-primary" value="GO" />
                        <!-- <a href="#" class="DtIcn"></a> -->
                    </div>
                    </form>
                </div>
            </div>
            <div class="RnbwDshbrdFllHldr">
            <?php for ($i=0; $i < count($rainbow_main_data); $i++){?>
                <div class="DtlsFllHld">
                    <div class="LocationHldr">
                    <div class="LocationDtls">
                        <?php if(ucwords($rainbow_main_data[$i]['location'])=='Vikrampuri'){ ?>
                            <span class="LocaitonName"><?php echo ucwords($rainbow_main_data[$i]['location']) ?></span>
                            <span class="LocaitonBscDtls">114 Beds/ 52000 Sq. Ft.</span>
                        <?php }else{?>
                            <span class="LocaitonName">Kondapur IP Block</span>
                            <span class="LocaitonBscDtls">55 Beds/ 30000 Sq. Ft.</span>
                            <?php }?>
                        
                    </div>
                    <div class="LocationLnkHldr">
                    <?php if(ucwords($rainbow_main_data[$i]['location'])=='Vikrampuri'){ ?>
                        <a href="<?php echo base_url('Admin/Home/rainbow_water?id=1&loc=1')?>" class="LcnLnk"></a>
                         <?php }else{?>
                            <a href="<?php echo base_url('Admin/Home/rainbow_water?id=2&loc=2')?>" class="LcnLnk"></a>
                            <?php }?>
                    </div>
                    </div>
                    <div class="LcFllDtlsHldr">
                        <ul class="LcLst">
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Utilities</span>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Water">Water</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb"><?php echo $rainbow_main_data[$i]['water'] ?> KL</span>
                                    <!-- <span class="VluDsc">KL</span> -->
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                            Avg. <span class="Vlu"><?php echo $rainbow_main_data[$i]['water_avg'] ?></span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                        <?php if($rainbow_main_data[$i]['water_avg_percent']>=0){ ?>
                                        <span class="VluNmb Up"><?php echo abs($rainbow_main_data[$i]['water_avg_percent']) ?>%</span>
                                        <?php }else{ ?>
                                            <span class="VluNmb Down"><?php echo abs($rainbow_main_data[$i]['water_avg_percent']) ?>%</span>
                                            <?php }?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Energy">Energy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb"><?php echo $rainbow_main_data[$i]['energy'] ?> Kwh</span>
                                    <!-- <span class="VluDsc">kwh</span> -->
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu"><?php echo $rainbow_main_data[$i]['energy_avg'] ?></span><span class="VluFrmt">Kwh</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <?php if($rainbow_main_data[$i]['energy_avg_percent']>=0){ ?>
                                        <span class="VluNmb Up"><?php echo abs($rainbow_main_data[$i]['energy_avg_percent']) ?>%</span>
                                        <?php }else{ ?>
                                            <span class="VluNmb Down"><?php echo abs($rainbow_main_data[$i]['energy_avg_percent']) ?>%</span>
                                            <?php }?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Fuel">Fuel</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb"><?php echo $rainbow_main_data[$i]['fuel'] ?> Lts</span>
                                    <!-- <span class="VluDsc">Lts</span> -->
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu"><?php echo abs($rainbow_main_data[$i]['fuel_avg']) ?></span><span class="VluFrmt">Litrs</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <?php if($rainbow_main_data[$i]['fuel_avg_percent']>=0){ ?>
                                        <span class="VluNmb Up"><?php echo abs($rainbow_main_data[$i]['fuel_avg_percent']) ?>%</span>
                                        <?php }else{ ?>
                                            <span class="VluNmb Down"><?php echo abs($rainbow_main_data[$i]['fuel_avg_percent']) ?>%</span>
                                            <?php }?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr MedicalGas">Medical Gas</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb"><?php echo $rainbow_main_data[$i]['gas'] ?> KG</span>
                                    <!-- <span class="VluDsc">KG</span> -->
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu"><?php echo $rainbow_main_data[$i]['gas_avg'] ?></span><span class="VluFrmt">KG</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <?php if($rainbow_main_data[$i]['gas_avg_percent']>=0){ ?>
                                        <span class="VluNmb Up"><?php echo abs($rainbow_main_data[$i]['gas_avg_percent']) ?>%</span>
                                        <?php }else{ ?>
                                            <span class="VluNmb Down"><?php echo abs($rainbow_main_data[$i]['gas_avg_percent']) ?>%</span>
                                            <?php }?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Occupancy</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr InPatient">In Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb"><?php echo $rainbow_main_data[$i]['inpatient'] ?> nos</span>
                                    <!-- <span class="VluDsc">nos</span> -->
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu"><?php echo $rainbow_main_data[$i]['inpatient_avg'] ?></span><span class="VluFrmt">nos</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <?php if($rainbow_main_data[$i]['inpatient_avg_percent']>=0){ ?>
                                        <span class="VluNmb Up"><?php echo abs($rainbow_main_data[$i]['inpatient_avg_percent']) ?>%</span>
                                        <?php }else{ ?>
                                            <span class="VluNmb Down"><?php echo abs($rainbow_main_data[$i]['inpatient_avg_percent']) ?>%</span>
                                            <?php }?>
                                    </div>
                                </div>
                            </li>
                           
                                   
                                    

                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head2">Energy cost per day (Rs)</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr"><?php echo round(($rainbow_main_data[$i]['energy']*9.2+$rainbow_main_data[$i]['fuel']*96)/52000,2) ?></span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Sft</span>
                                    
                                </div>
                               
                            </li>
                           
                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr"><?php echo round(($rainbow_main_data[$i]['energy']*9.2+$rainbow_main_data[$i]['fuel']*96)/$rainbow_main_data[$i]['inpatient'],2) ?></span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Bed</span>
                                   
                                </div>
                               
                            </li>
                                             
                            
                        </ul>
                    </div>
                </div>
                <?php }?>
                <!-- <div class="DtlsFllHld">
                    <div class="LocationHldr">
                    <div class="LocationDtls">
                        <span class="LocaitonName">Kondapur</span>
                        <span class="LocaitonBscDtls">58 Beds/ 3580 Sq. Ft.</span>
                    </div>
                    <div class="LocationLnkHldr">
                        <a href="<?php echo base_url('Admin/Home/rainbow_water/2')?>" class="LcnLnk"></a>
                    </div>
                    </div>
                    <div class="LcFllDtlsHldr">
                        <ul class="LcLst">
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Water">Water</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">5000</span>
                                    <span class="VluDsc">KL</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                            Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                        <span class="VluNmb Up">10%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Energy">Energy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">500000</span>
                                    <span class="VluDsc">kwh</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">10%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Fuel">Fuel</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">5000</span>
                                    <span class="VluDsc">Lts</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">10%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr MedicalGas">Medical Gas</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">5000</span>
                                    <span class="VluDsc">Lts</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">10%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Occupancy">Occupancy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">5000</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">10%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr InPatient">In Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">5000</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">10%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr OutPatient">Out Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">5000</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">557</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">10%</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="DtlsFllHld Offline">
                    <div class="LocationHldr">
                    <div class="LocationDtls">
                        <span class="LocaitonName">Unit3</span>
                        <span class="LocaitonBscDtls">58 Beds/ 3580 Sq. Ft.</span>
                    </div>
                    <div class="LocationLnkHldr">
                        <a href="#" class="LcnLnk"></a>
                    </div>
                    </div>
                    <div class="LcFllDtlsHldr">
                        <ul class="LcLst">
                        <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Utilities</span>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Water">Water</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">55</span>
                                    <span class="VluDsc">KL</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                            Avg. <span class="Vlu">50</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Energy">Energy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">2321</span>
                                    <span class="VluDsc">kwh</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">44</span><span class="VluFrmt">Kwh</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Fuel">Fuel</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">32</span>
                                    <span class="VluDsc">Lts</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">22</span><span class="VluFrmt">Litrs</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">55%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr MedicalGas">Medical Gas</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">6</span>
                                    <span class="VluDsc">KG</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">6</span><span class="VluFrmt">KG</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Occupancy</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr InPatient">In Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">66</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">55</span><span class="VluFrmt">nos</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                           
                                   
                                    

                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head2">Energy cost per day (Rs)</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">1.6</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Sft</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                           
                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">5</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Bed</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="DtlsFllHld Offline">
                    <div class="LocationHldr">
                    <div class="LocationDtls">
                        <span class="LocaitonName">Unit4</span>
                        <span class="LocaitonBscDtls">58 Beds/ 3580 Sq. Ft.</span>
                    </div>
                    <div class="LocationLnkHldr">
                        <a href="#" class="LcnLnk"></a>
                    </div>
                    </div>
                    <div class="LcFllDtlsHldr">
                        <ul class="LcLst">
                        <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Utilities</span>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Water">Water</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">55</span>
                                    <span class="VluDsc">KL</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                            Avg. <span class="Vlu">50</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Energy">Energy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">2321</span>
                                    <span class="VluDsc">kwh</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">44</span><span class="VluFrmt">Kwh</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Fuel">Fuel</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">32</span>
                                    <span class="VluDsc">Lts</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">22</span><span class="VluFrmt">Litrs</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">55%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr MedicalGas">Medical Gas</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">6</span>
                                    <span class="VluDsc">KG</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">6</span><span class="VluFrmt">KG</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Occupancy</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr InPatient">In Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">66</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">55</span><span class="VluFrmt">nos</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                           
                                   
                                    

                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head2">Energy cost per day (Rs)</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">1.6</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Sft</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                           
                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">5</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Bed</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="DtlsFllHld Offline">
                    <div class="LocationHldr">
                    <div class="LocationDtls">
                        <span class="LocaitonName">Unit5</span>
                        <span class="LocaitonBscDtls">58 Beds/ 3580 Sq. Ft.</span>
                    </div>
                    <div class="LocationLnkHldr">
                        <a href="#" class="LcnLnk"></a>
                    </div>
                    </div>
                    <div class="LcFllDtlsHldr">
                        <ul class="LcLst">
                        <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Utilities</span>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Water">Water</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">55</span>
                                    <span class="VluDsc">KL</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                            Avg. <span class="Vlu">50</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Energy">Energy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">2321</span>
                                    <span class="VluDsc">kwh</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">44</span><span class="VluFrmt">Kwh</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Fuel">Fuel</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">32</span>
                                    <span class="VluDsc">Lts</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">22</span><span class="VluFrmt">Litrs</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">55%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr MedicalGas">Medical Gas</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">6</span>
                                    <span class="VluDsc">KG</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">6</span><span class="VluFrmt">KG</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Occupancy</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr InPatient">In Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">66</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">55</span><span class="VluFrmt">nos</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                           
                                   
                                    

                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head2">Energy cost per day (Rs)</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">1.6</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Sft</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                           
                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">5</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Bed</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="DtlsFllHld Offline">
                    <div class="LocationHldr">
                    <div class="LocationDtls">
                        <span class="LocaitonName">Unit6</span>
                        <span class="LocaitonBscDtls">58 Beds/ 3580 Sq. Ft.</span>
                    </div>
                    <div class="LocationLnkHldr">
                        <a href="#" class="LcnLnk"></a>
                    </div>
                    </div>
                    <div class="LcFllDtlsHldr">
                        <ul class="LcLst">
                        <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Utilities</span>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Water">Water</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">55</span>
                                    <span class="VluDsc">KL</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                            Avg. <span class="Vlu">50</span><span class="VluFrmt">kl</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Energy">Energy</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">2321</span>
                                    <span class="VluDsc">kwh</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">44</span><span class="VluFrmt">Kwh</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr Fuel">Fuel</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">32</span>
                                    <span class="VluDsc">Lts</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">22</span><span class="VluFrmt">Litrs</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">55%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr MedicalGas">Medical Gas</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">6</span>
                                    <span class="VluDsc">KG</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">6</span><span class="VluFrmt">KG</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Up">77%</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head Water">Occupancy</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr InPatient">In Patient</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">66</span>
                                    <span class="VluDsc">nos</span>
                                </div>
                                <div class="TtlTp">
                                    <div class="TtlTpLft">
                                        <span class="TxtHldr">
                                        Avg. <span class="Vlu">55</span><span class="VluFrmt">nos</span> per day
                                        </span>
                                    </div>
                                    <div class="TtlTpRgt">
                                    <span class="VluNmb Down">66%</span>
                                    </div>
                                </div>
                            </li>
                           
                                   
                                    

                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr_head2">Energy cost per day (Rs)</span>
                                </div>
                            </li>
                            
                            <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">1.6</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Sft</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                           
                                    <li>
                                <div class="SrvcNm">
                                    <span class="NmeHldr">5</span>
                                </div>
                                <div class="SrvcVluDtls">
                                    <span class="VluNmb">per Bed</span>
                                    <span class="VluDsc"></span>
                                </div>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css" rel="stylesheet" />

<script>


 function em(id){ 	
	$('.em-disc'+id).toggle('slow'); 
	$('.em'+id).hide();
	$('.em-hide'+id).show();
 }
 function device(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
			// alert("aaaa");
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
			// alert("bbb");
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
        }
}
function device1(a){
	if($( ".devicebox"+a ).is( ":visible" ))
        {
            $('.devicebox'+a).hide('slow'); 
            $("#device"+a).addClass("Expndd");
            // $(".inner_collaps").addClass("Expndd");
        }
        else if($( ".devicebox"+a ).is( ":hidden" ))
        {
            $('.devicebox'+a).show('slow'); 
            $("#device"+a).removeClass("Expndd");
            // $(".inner_collaps").removeClass("Expndd");
        }
}
function deviceall(){
	if($( ".device" ).is( ":visible" ))
        {
			
            $('.device').hide('slow'); 
            $(".deviceall").addClass("Expnd");
			$(".dev").addClass("Expndd");
        }
        else if($( ".device" ).is( ":hidden" ))
        {
			
            $('.device').show('slow'); 
            $(".deviceall").removeClass("Expnd");
			$(".dev").removeClass("Expndd");
        }
	//$('.device').hide();
}
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
$("#drop").change(function () {
        var val = this.value;
       
          var url = '<?php echo base_url()."Admin/Home/rainbow_water/";?>'+val; 
        window.location = url; 
        
        
    });
    $('#drop').hide();

 </script>	
</html>

