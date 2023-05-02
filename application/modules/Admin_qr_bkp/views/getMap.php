<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wenalytics</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, height=device-height , 
    initial-scale=1.0,user-scalable=no, shrink-to-fit=yes" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <!-- <link rel="stylesheet" href="./css/checkbox.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"> 
    <!-- MAP SCRIPT STARTS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB9GnaeTRyHl9QorpZTphtBgpht21B45U&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <!-- MAP SCRIPT ENDS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <style type="text/css">
               .MultiCheckBox {
            font-family: 'Montserrat';
            padding: 12px 10px;
            background: #FFFFFF;
            border: 1px solid #DDDDDD;
            height: 45px;
            border-radius: 5px;
            cursor:pointer;
            font-weight: 500;
            font-size: 13px;
            line-height: 16px;
            color: #555555;
        }

        .MultiCheckBox .k-icon{ 
            font-size: 15px;
            float: right;
            font-weight: bolder;
            margin-top: -5px;
            height: 10px;
            width: 10px;
            color:#555555;
        } 

        .MultiCheckBoxDetail {
            width:210px;
            font-weight: 500;
            font-size: 13px;
            line-height: 16px;
            color: #444444;
            display:none;
            position: absolute;
            border:1px solid #DDDDDD;
            overflow-y:visible;
            z-index: 1000;
            background-color: aliceblue;
        }

        .MultiCheckBoxDetailBody {
            overflow-y:scroll;
        }

            .MultiCheckBoxDetail .cont  {
                clear:both;
                overflow: hidden;
                padding: 2px;
            }

            .MultiCheckBoxDetail .cont:hover  {
                background-color:#cfcfcf;
            }

            .MultiCheckBoxDetailBody > div > div {
                float:left;
                padding: 5px;
            }

        .MultiCheckBoxDetail>div>div:nth-child(1) {
        
        }

        .MultiCheckBoxDetailHeader {
            overflow:hidden;
            position:relative;
            height: 28px;
            background-color:#02918D;
        }

            .MultiCheckBoxDetailHeader>input {
                position: absolute;
                top: 8px;
                left: 8px;
            }

            .MultiCheckBoxDetailHeader>div {
                position: absolute;
                top: 5px;
                left: 30px;
                color:#fff;
            }
        body 
{
    font-family: 'Montserrat';
    font-size: 22px;
    background-color:#02918D;
}
.card
{
    margin: 10px 0px 0px 0px;
    box-shadow: 0px 2px 30px rgba(0, 0, 0, 0.1);
}
.card-header{
    background: #FFFFFF;
    border-radius: 0px;
    border-bottom: 2px solid #B2D1D0;
    padding: 0rem 0rem !important;
}
.card-body
{
    background: #FFFFFF;
    border-radius: 0px;
    padding: 0px!important;
}
.menudropdown
{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 22px;
    line-height: 29px;
    color: #02918D;
    padding: 15px 10px;
}
.LgnUsr{
    background: #DDF4F4;
    border-radius: 0px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #007C79;
    height:60px;
    border-radius: 0px 5px 0px 0px;
}
.LgoutBlk{
    background: #007C79;
    border-radius: 0px 5px 0px 0px;
    height:60px;
}
.BlkOne{
    background: #F9F9F9;
    padding: 10px 0px;
    border-bottom: 1px solid #F9F9F9;
}
.Drpbox
{
    width:100%;
    background: #FFFFFF;
    border: 1px solid #DDDDDD;
    box-sizing: border-box;
    border-radius: 5px;
    height: 45px;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #555555;
    padding: 0px 10px;
}
.Blkrow{
    margin-left: 0px !important;
    margin-right: 0px!important;
}
.ClnBlk{
    background: #5DAE41;
    border-radius: 5px;
    width:100%;
    height: 45px;
}


.ClnImgOne{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat  center;
    width: 25px;
    height: 25px;
}
.ClnImgTwo{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat  center;
    width: 25px;
    height: 25px;
}
.ClnImgThree{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat  center;
    width: 25px;
    height: 25px;
}
.ClnImgFour{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat   center;
    width: 25px;
    height: 23.96px;
}
.ClnImgFve{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat  center;
    width: 25px;
    height: 25px;
}
.ClnImgSix{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat  center;
    width: 25px;
    height: 25px;
}
.ClnImgSvn{
    background:transparent url('<?php echo base_url(); ?>asset/admin/images/greenmarker.png') no-repeat  center;
    width: 25px;
    height: 25px;
}

.ClnWrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 14px;
    text-transform: uppercase;
    color: #FFFFFF;
}
.ClnImg{
    width: 30px;
    height: 30px;
    margin: 5px;
    display: inline-block;
    background:url("../Images/Clean.png");
    background-color: transparent;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}
/*.ClnWrd::before {
    background: transparent url(../Images/Clean.png) no-repeat center;
    background-size: 70%;
    content: " ";
    padding: 10px 20px;
    -o-background-size: 70%;
    -moz-background-size: 70%;
    -webkit-background-size: 70%;
 }*/
.ClnNoBlk{
    background: #FFFFFF;
    border: 1px solid #5DAE41;
    border-radius: 5px;
    height: 44px;
    text-align: center;
}
.ClnNo{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #555555;
}

.AccptBlk{
    background: #EA7B14;
    border-radius: 5px;
    width:100%;
    height: 45px;
}
.Acc-Img{
    width: 30px;
    height: 30px;
    margin: 5px;
    background:url("../Images/Accept.png");
    background-color: transparent;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}
.Acc-Wrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 14px;
    text-transform: uppercase;
    color: #FFFFFF;
}
/*.Acc-Wrd::before{
    background-image:url("../Images/Accept.png");
    background-color: transparent;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 70%;
    content: " ";
    padding: 10px 18px;
    -o-background-size: 70% ;
    -moz-background-size: 70% ;
    -webkit-background-size: 70%;
}*/
.Acc-Blk{
    background: #FFFFFF;
    border: 1px solid#EA7B14;
    border-radius: 5px;
    height: 44px;
    text-align: center;
}
.AccNo{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #555555;
}


.NeedBlk{
    background: #C54747;
    border-radius: 5px;
    width:100%;
    height: 45px;
}
.Need-Img{
    width: 30px;
    height: 30px;
    margin: 5px;
    display: inline-block;
    background:url("../Images/Needs.png");
    background-color: transparent;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}
.Need-Wrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 14px;
    text-transform: uppercase;
    color: #FFFFFF;
}
/*.Need-Wrd::before {
    background: transparent url(../Images/Needs.png) no-repeat center ;
    background-size: 70%;
    content: " ";
    padding: 10px 20px;
    -o-background-size: 70%;
    -moz-background-size: 70%;
    -webkit-background-size: 70%;
 }*/
.Need-Blk{
    background: #FFFFFF;
    border: 1px solid#C54747;
    border-radius: 5px;
    height: 44px;
    text-align: center;
}
.NeedNo{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #555555;
}
.WshRoomImg{
    background-image:url('../Images/Washtitle.png') ;
    width: 70px;
    height:70px;
}
.WshroomBlk{
    padding: 10px 15px;
}
.WshroomTableBlk{
    padding: 10px 15px; 
}
.FlrBox{
    background: #FFFFFF;
    border-top: 1px solid #DDDDDD;
    border-bottom: 1px solid #DDDDDD;
    border-left: 1px solid #DDDDDD;
    box-sizing: border-box;
    height: 205px;
    width:100%;
}
.FlrHd{
    background: #007C79;
    height: 45px;
}
.FlrWrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 42px;
    color:#FFFFFF;
    padding: 0px 20px;
}
.Flrone{
    width:20%;
    height: 205px;
    border: 1px solid #DDDDDD;
}
.Flrones{
    width:25%;
    height: 180px;
    border: 1px solid #DDDDDD;
}
.WshHd
{
    background: #02918D;
    height: 45px;
}
.WsBdy{
    height: 45px;
    border-bottom: 1px solid #DDDDDD;
}
.WsBdy div.col-lg-9, .WsBdy div.col-md-9, .WsBdy div.col-sm-9, .WsBdy div.col-9{
    padding-left:0px;
}
.Clnonemtr{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #5DAE41;
}
.Clntwomtr{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #EA7B14;
}
.Clnthremtr{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color:#C54747;
}
.ClnOrngmtr
{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #EA7B14;
}
.WshRmWrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #02918D;
}
.WshImg{
    text-align: left;
    padding: 10px 20px;
}
.WshWrdBlk{
    padding: 0px 20px;
}
.FtrMtr{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 13px;
    line-height: 16px;
    text-align: center;
    color: rgba(255, 255, 255, 0.75);
}
.FtrBlk{
    padding: 0px 0px;
}

/* cleaning alerts */
.FlrHead{
    background: #007C79;
    border-radius: 0px;
    height: 45px;
}
.FlrNme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #FFFFFF;
    padding: 0px 15px;
    border-right: 1px solid rgba(255, 255, 255, 0.3);
}
.BdnNme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #FFFFFF;
}
.BdnSwth{
    background: #FFFFFF;
    border-radius: 50px;
    border :1px solid #FFFFFF;
    cursor: pointer;
    width: 135px;
    height: 30px;
    margin: 8px 0px;
}
span.BdnSwtNme{
    font-weight: 500;
    font-size: 13px;
    color: #007C79;
    line-height: 16px;
    cursor: pointer;
    padding: 6px 8px;
    position: absolute;
}
.WshNme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #FFFFFF;
    padding: 0px 15px;
}
.WshNme_one{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #FFFFFF;
    padding: 0px 15px;
    border-right: 1px solid rgba(255, 255, 255, 0.3);
}
.ClnHdr{
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    display: -ms-flexbox;
}
.ClnHdrs{
    width:80%;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    
}
.ClnScrl{
    width: auto;
    overflow-x: scroll;
    overflow-y: scroll;
    height:190px;
    white-space: nowrap;

}
.Clntblhd{
    background: #F3F3F3;
    border-radius: 0px;
    height: 40px;
}
.Clntblhdnme{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
    background: #F3F3F3;
    position: sticky;
    top:0;
}
.Clntblrownme{
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    color: #666666;
}
.HeadNme_one{
    background: #02918D;
    height: 45px;
    padding-right: 0px!important;
    padding-left: 0px !important;
}
.HeadNme_one_nme{
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #FFFFFF;
    padding: 0px 15px ;
}
.HeadNme_two{
    height: 45px;
    background: #32AAA7;
    border-radius: 0px;
    padding-right: 0px!important;
    padding-left: 0px !important;
}
.HeadNme_two_nme{
    font-weight: bold;
    font-size: 14px;
    line-height: 17px;
    color: #FFFFFF;
    padding: 0px 15px ;
}
.HeadNme_three{
    height: 45px;
    background: #32AAA7;
    border-radius: 0px;
    padding-right: 0px!important;
    padding-left: 0px !important;
}
.HeadNme_three_nme{
    font-weight: bold;
    font-size: 14px;
    line-height: 17px;
    color: #FFFFFF;
    padding: 0px 15px ;
}
.Tablhd{
    background: #F3F3F3;
    border-radius: 0px;
    height: 50px;
}
.TableBdy{
    height: 45px;
}
.TblHdnme{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
}
.Tblsubnme{
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    color: #cccccc;
}
.Headbox{
    display: inline-block;
}
.Fstrow{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;   
}
.Nxtrow{
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    color: #666666;
}
.Vrtcl {
    position: relative;
    height: 200px;
    overflow: auto;
    }
    .Vrtcl-Y {
    display: block;
    }
.Tblerespnse{
    position: relative;
    height: 600px;
    overflow-y: scroll;
    padding: 5px;
}
.Tblerespnse-Y {
    display: block;
}
.JntorBlk{
    border:1px solid #E0E0E0;
    height: 280px;
}
.JntorAttBlk{
    border:1px solid #E0E0E0;
    height: 200px;
}
.JntorAttCl{
    border-right:1px solid #E0E0E0;
    height: 200px;
    width:12%;
    padding: 5px 10px!important;
}
.JntorAttCltwo{
    border-right:1px solid #E0E0E0;
    height: 200px;
    width:18%;
    padding: 0px!important;
}
.JntorCl{
    border-right:1px solid #E0E0E0;
    height: 280px;
}
.JntorClone{
    border-right:1px solid #E0E0E0;
    height: 280px;
    padding: 25px 15px;
}
.PIcnAtt{
    background: #FFFF;
    border: 1px solid #EEEEEE;
    border-radius: 10px;
}
.PIcnAttDty{
    padding: 10px 0px;
}
.Crcle{
    font-weight: 600;
    font-size: 12px;
    line-height: 15px;
    color: #5DAE41;
    position: absolute;
    padding: 10px 8px;
}
.CrcleImg{
    margin: 0px 10px;
    width:15px;
    height: 15px;
}
.PIcnImgAtt{
    background: transparent url('../Images/PersonIcon.png') no-repeat center center;
    width:45px;
    height: 50px;
    padding: 60px 0px;
}
.DutyBox{
    border: 1px solid #5DAE41;
    box-sizing: border-box;
    border-radius: 50px;
    
}
.PIcn{
    background: #FFFF;
    border: 1px solid #EEEEEE;
    border-radius: 10px;
    height: 200px;
}
.PIcnImg{
    padding: 75px 0px;
    background: transparent url('../Images/PersonIcon.png') no-repeat center center;
    width:60px;
    height:70px;
}




.progress{
    width: 75px;
    height: 75px;
    line-height: 150px;
    background: none;
    margin: 10px 0px 0px 30px;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 7px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 85%;
    height: 85%;
    border-radius: 50%;
    position: absolute;
    top: 7.5%;
    left: 7.5%;
    font-weight: bold;
    font-size: 16px;
    line-height: 60px;
    text-align: center;
    color: #5DAE41;
}
.progress.blue .progress-bar{
    border-color: #5DAE41;
}
.progress.blue .progress-value{
    color: #5DAE41;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1.5s linear forwards 1.8s;
}
.progress.yellow .progress-bar{
    border-color: #5DAE41;
}
.progress.yellow .progress-value{
    color: #5DAE41;
}
.progress.yellow .progress-left .progress-bar{
    animation: loading-3 1s linear forwards 1.8s;
}
@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
    }
}
@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

.RtngNo{
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    text-align: center;
    color: #007C79;
}
.Ratng{
    padding: 30px 0px 0px 0px;
}
.RtngCnt{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    text-align: center;
    color: #444444;
    padding: 15px 0px 0px 0px;
}
.JntorTble{
    position: relative;
    height: 280px;
    overflow-y: scroll;
}
.JntorTbleBlks{
    padding-left: 0px!important;
    padding-right: 15px !important;
}
.JntrTbHd{
    background: #F3F3F3;
    height: 50px!important;
}
.JntrTbhdnme{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
    position: sticky;
    top:0;
    background-color: #F3F3F3;
}
.JntrTbrow{
    font-weight: 500;
    color: #666666;
    font-size: 12px;
    line-height: 15px;
}
.ShftHead{
    background: #F3F3F3;
    border-radius: 0px;
    height: 45px;
    border: 1px solid #DDDDDD;
}
.Shftnme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #444444;
    padding: 0px 15px;
    border-right: 1px solid rgba(68, 68, 68, 0.3);
}
.Shftme{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #444444;
    padding: 0px 15px;
}
.ShftBody{
    width:100%;
    border: 1px solid #DDDDDD;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 20px 15px;
}
.Icn{
    width:14%;
    padding: 20px;
}
.IcnFlr{
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #444444;
}
.Wshno{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
    display: block;
    padding-left: 20px;
}
.Jntnme{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
    display: block;
    padding-left: 20px;
}
.JnAss{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color:#C54747;
    display: block;
    padding-left: 20px;
}
@media (min-width: 576px){
    .MdlVw 
    {
        max-width: 800px !important;
        margin: 5rem auto;
    }
}
.MdlHdr{
    font-weight: 600;
    font-size: 21px;
    line-height: 26px;
    color: #007C79;
}
.MdlTblhd{
    padding:15px 0px;
}
.MdlBg{
    background: #F3F3F3;
    border-radius: 0px;
}
.MdlHdnme
{
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #444444;
}
.MdlFlrnme{
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #444444;
    display: block;
}
.MdlWshno{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
    display: block;
}
.MdlRespnsve{
    position: relative;
    height: 400px;
    overflow: auto;
}
.MdlRespnsve-Y{
    display: block;
}
.footer{
    padding:20px 0px;
}
.Svbtn{
    border: 1px solid #02918D;
    box-sizing: border-box;
    border-radius: 80px;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #007C79;
}
.TypeBox{
    border: 1px solid #DDDDDD;
    box-sizing: border-box;
    border-radius: 5px;
    height:55px;
    padding: 10px;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #555555;
    width:100%;
}
.Boxes{
    padding: 5px 5px;
}
.JntorAttClthree{
    border-right:1px solid #E0E0E0;
    height: 200px;
    width:18%;
    padding: 0px!important;
    background-color: #F3F3F3;
}
.Boxess{
    padding: 16px 0px;
    border: 1px solid #DDDDDD;
    text-align: center;

}
.Bldnme{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
}
.JntorAttClFr{
    height: 200px;
    width:52%;
    text-align: center;
}
.Boxe{
    padding: 16px 0px;
    border-bottom:1px solid #DDDDDD;
}
.FlrBx{
    display: inline-block;
    padding: 0px 20px;
}
.FlRnme{
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
}
.FlrRespnsve{
    position: relative;
    overflow: auto;
    height:200px;
}
.FlrRespnsve-Y{
    display: block;
}
.RdCrcle{
    font-weight: 600;
    font-size: 12px;
    line-height: 15px;
    color:#C54747;
    position: absolute;
    padding: 10px 4px;
}
.RdDutyBox{
    border: 1px solid #C54747;
    box-sizing: border-box;
    border-radius: 50px;
}
.dropdown-item:hover{
    background-color: #007C79;
    color:#ffffff;
}
.headTb{
    position:sticky;
    background-color: #F3F3F3;
    top: 0 ;
}
.table_flow {
    position: relative;
    overflow-x: scroll;
    white-space: nowrap;
}
.mapbox{
    background: #02918D;
}
.mapcard{
    margin: 15px 15px;
    background-color: white;
    box-shadow: 0px 2px 30px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding-bottom: 15px;
}
.ScltBlk{
    background: #F9F9F9;
    padding: 10px 0px;
    margin-left: 0px!important;
    margin-right: 0px!important;
}
#map{
    width: 100%;
    height:550px;
}
.mapblk{
    padding: 15px 15px 0px 15px;
}
.LctnBlk{
    background-color: white;
    box-shadow: 0px 2px 30px rgba(0, 0, 0, 0.1);
    
}
.LctnScl{
    overflow-y: scroll;
    height: 550px;
    position: relative;
}
.LctnHd{
    background: #007C79;
    width: 100%;
    margin-left: 0px!important;
    margin-right: 0px!important;
    padding: 10px 0px;
}
.LctnWrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #FFFFFF;
}
.HdeBlk{
    background: #FFFFFF;
    border-radius: 50px;
    padding: 10px 25px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #007C79;
}
.LctnAre{
    background: #F3F3F3;
    padding: 10px 15px;
}
.AreWrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #444444;
    display: block;
}
.AreNme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #666666;
    display: block;
    padding: 2px 0px;
}
.LctnDts{
    padding: 25px 0px 0px 0px;
}
.LctnName{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #444444;
    display: block;
}
.BrfDts{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
    display: block;
}
.GrnBox{
    background: #FFFFFF;
    border: 1px solid #007C79;
    box-sizing: border-box;
    border-radius: 50px;
    width:100%;
    padding: 0px 10px;
}
.Opn-Wrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 15px;
    color: #5DAE41;
   
}
.Imge{
    padding-right:5px ;
}
.Hrs{
    padding: 0px 10px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 13px;
    line-height: 16px;
    color: #444444;
}
.RdBox{
    background: #FFFFFF;
    border: 1px solid #C54747;
    box-sizing: border-box;
    border-radius: 50px;
    width:100%;
    padding: 0px 10px;
}
.Clse-Wrd{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 15px;
    color: #C54747;   
}
.ArrwBg{
    background: #007C79;
    padding: 5px 15px;
    border-radius: 50%;
    position: relative;
}
.LftImg{
    position: absolute;
    width: 10px;
    height: 20px;
    top: 7px;
    right: 8px;
}
.RgtArw{
    width: 22px;
    height: 22px;
    padding: 0px 5px;
}
.LcWshImgAre{
    padding: 8px 15px;
}
.LcWshImg{
    width: 35px;
    height: 35px;
    display: inline-block;
}
.LctnWshnme{
    padding: 0px 10px ;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #02918D;

}
.Blks{
    width:100%;
    height: 45px;
    background-color: #02918D;
    border: 1px solid #FFF;
}
.nopad{
    padding-left: 0px!important;
    padding-right: 0px!important;
}
.Blksnme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
    color: #FFFFFF;
}
.ImgBlk{
    text-align: right;
}
.DatBox{
    height: 45px;
    border-bottom: 1px solid #DDDDDD;
}
.Dtnme{
    
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #5DAE41;
}
.Dtnme-E{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #EA7B14;
}
.Dtnme-R{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    color: #C54747;
}
.ShBox{
    padding: 25px 0px;
}
.SFDnme{
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 16px;
    text-align: center;
    color: #007C79;
    background: #FFFFFF;
    border: 1px solid #02918D;
    border-radius: 80px;
    padding: 10px 15px;
}
    </style>
   
</head>
<body >
    <div class="mapbox">
        <div class="mapcard">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-sm-12 col-12">
                    <div class="menudropdown">
                        <div class="dropdown">
                            <span class="dropdown-toggle" data-toggle="dropdown">Map View </span>
                            <div class="dropdown-menu">
                                <!--<a class="dropdown-item" href="index.html">Master Dashboard</a>
                                <a class="dropdown-item" href="consume.html">Consumables</a>
                                <a class="dropdown-item" href="cleaning.html">Alerts</a>
                                <a class="dropdown-item" href="shiftplan.html">Shift Planner</a>
                                <a class="dropdown-item" href="janitorattendance.html">Janitor Attendence</a>
                                <a class="dropdown-item" href="janitorreport.html">Janitor Reports</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="LgnUsr">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                                <div class="dropdown" style="padding:20px;">
                                    <span class="dropdown-toggle" data-toggle="dropdown"> Sunil Manohar</span>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Link 1</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="LgoutBlk text-center">
                                    <img src="./Images/Logout.png" width="30px" height="21px" style="margin: 20px 0px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ScltBlk">
                <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                    <select id="multiple-checkboxes" multiple="multiple">
        <option value="1">Telangana</option>
        <option value="2">Andhra Pradesh</option>
        
    </select>
                    <!-- <select id="selectbox" class="target">
                        <option value="17.8684255,77.2783288">Telangana</option>
                    </select> -->
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                    <select id="selectbox2">
                        <option>Adilabad</option>
                        <option>Bhadradri Kothagudem</option>
                        <option>Hyderabad</option>
                        <option>Jagitial</option>
                        <option>Kamareddy</option>
                        <option>Karimnagar</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                    <select id="selectbox3">
                        <option>Ameerpet</option>
                        <option>Sanathnagar</option>
                        <option>Khairatabad</option>
                        <option>Madhapur</option>
                        <option>Secunderabad</option>
                        <option>Patancheru</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                    <select id="selectbox4">
                        <option>Cleaned Areas</option>
                        <option>UnCleaned Areas</option>
                        <option>Needs Cleaning Areas</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                    <div class="mapblk">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <div class="LctnBlk LctnScl">
                        <div class="row LctnHd ">
                            <div class="col">
                                <span class="LctnWrd">Location List</span>
                            </div>
                            <div class="col text-center">
                                <span class="HdeBlk">Hide</span>
                            </div>
                        </div>
                        <div class="LctnAre">
                            <span class="AreWrd">Madhapur Area</span>
                            <span class="AreNme">Hyderabad, Telangana</span>
                        </div>
                        <div class="ClnHdr LctnDts">
                            <div class="col-10">
                                <span class="LctnName">Location name</span>
                                <span class="BrfDts">Brief Details</span>
                                <span class="GrnBox">
                                    <span class="Imge"><img src="./Images/greencircle.png"></span>
                                    <span class="Opn-Wrd">Open</span>
                                </span>
                                <span class="Hrs">24/7</span>
                            </div>
                            <div class="col-2">
                                <a href="">
                                    <span class="ArrwBg">
                                        <img src="./Images/LeftArrow.png" class="LftImg">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="ClnHdr LctnDts">
                            <div class="col-10">
                                <span class="LctnName">Location name</span>
                                <span class="BrfDts">Brief Details</span>
                                <span class="GrnBox">
                                    <span class="Imge"><img src="./Images/greencircle.png"></span>
                                    <span class="Opn-Wrd">Open</span>
                                </span>
                                <span class="Hrs">Mon-Sat 9 AM - 10 PM</span>
                            </div>
                            <div class="col-2">
                                <a href="">
                                    <span class="ArrwBg">
                                        <img src="./Images/LeftArrow.png" class="LftImg">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="ClnHdr LctnDts">
                            <div class="col-10">
                                <span class="LctnName">Location name</span>
                                <span class="BrfDts">Brief Details</span>
                                <span class="RdBox">
                                    <span class="Imge"><img src="./Images/redcircle.png"></span>
                                    <span class="Clse-Wrd">Closed</span>
                                </span>
                                <span class="Hrs">24/7</span>
                            </div>
                            <div class="col-2">
                                <a href="">
                                    <span class="ArrwBg">
                                        <img src="./Images/LeftArrow.png" class="LftImg">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center">
                <strong class="FtrMtr">© www.wenalytics.com</strong>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
    $('#multiple-checkboxes').change(function() {
        // var ltng=
       var g= $('#multiple-checkboxes').val();
      var locations = 
        [
            ['Telangana', 17.8684255,77.2783288],
            ['Hyderabad', 17.4093387,78.3174632],
            ['Madhapur', 17.4484772,78.3741361]
        ];
    const icons = {
        parking: {
            icon: "<?php echo base_url(); ?>asset/admin/images/greenmarker.png",
        },
        library: {
            icon: "<?php echo base_url(); ?>asset/admin/images/greenmarker.png",
        },
        info: {
            icon: "<?php echo base_url(); ?>asset/admin/images/greenmarker.png",
        },
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(17.8684255,77.2783288),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < locations.length; i++) 
    {  
        if(i == 1 ){
            marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon: icons['library'].icon,
            map: map
            });
        }
        else{
            marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon: icons['parking'].icon,
            map: map
        });
        }
        
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() 
            {
                map.setZoom(15);
                marker.setIcon("Images/greenmarker.png");                                    
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }


//         var myLatlng = new google.maps.LatLng(17.8684255,77.2783288);
// var mapOptions = {
//   zoom: 4,
//   center: myLatlng
// }
// var map = new google.maps.Map(document.getElementById("map"), mapOptions);

// var marker = new google.maps.Marker({
//     position: myLatlng,
//     title:"Hello World!"
// });

// // To add the marker to the map, call setMap();
// marker.setMap(map);

        //alert('test');
    });
});

    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
          includeSelectAllOption: true,
        });
    });
    $(document).ready(function () {
        $("#selectbox").CreateMultiCheckBox({ width: 'auto',defaultText : 'Select State' });
    });
    $(document).ready(function () {
        $("#selectbox2").CreateMultiCheckBox({ width: 'auto', defaultText : 'Select District'});
    });
    $(document).ready(function () {
        $("#selectbox3").CreateMultiCheckBox({ width: 'auto', defaultText : 'Select Area'});
    });
    $(document).ready(function () {
        $("#selectbox4").CreateMultiCheckBox({ width: 'auto', defaultText : 'Status'});
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
    $('.target').change(function() {   
        var coordinate = $('select option:selected').val();
        alert(coordinate);
    //  alert(google_map(coordinate));
    });
    });

    // Initialize and add the map
    function initMap() {


    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(17.8684255,77.2783288),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
}
</script>
 
</html>