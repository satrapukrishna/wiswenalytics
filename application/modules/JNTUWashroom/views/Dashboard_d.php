<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashbaord</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/Washroom/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/Washroom/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!-- <script src="<?php echo base_url(); ?>asset/Washroom/Scripts/Script.js"></script> -->
</head>

<body onload="initialize()">
   
    <div class="AppFooter">
        <span class="LstUpdtTxt">Version:<span class="DtlTxt">v3.0.20</span></span>
        <span class="Cprght">Powered by<a href="#" class="LnkTxt">WIS</a></span>
    </div>
   
    <div class="AppHeader DshbrdMpPg">
        <div class="ContainerLeft" >

        </div>
        <div class="ContainerRight">
            <div class="AppUsrLnks">
                <ul class="PrflHdrLnk">
                    <li  style="margin-right:10%;"><button class="accordion-button">
                        <span class="CtyNme Lctn">ListView</span></button>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>/Login/wrllogin" class="HdrIcoLnk Lgout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="AppSbHdr DshbrdMpPg">
        <div class="ContainerLeft" style="width:20%;">
            <div class="CtyDrpDwn MpActv">
                <span class="DrpdwnTxt">All 16 Locations</span>
                <div class="MpSrchBx">
                    <input class="form-control MpSrchInpt" type="text" placeholder="Search by area name"
                        aria-label="default input example" />
                </div>
                <div class="DrpDwnHldr">
                    <div class="accordion" id="accordionFlushCExample">
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCOne" aria-expanded="false"
                                    aria-controls="flush-collapseCOne">
                                    <span class="CtyNme Lctn">Warangal(6)</span>
                                    
                                </button>
                            </span>
                            <div id="flush-collapseCOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingCOne" data-bs-parent="#accordionFlushCExample">
                                <div class="accordion-body">
                                    <ul class="HsptlLst">
                                        <li>
                                            <button class="accordion-button">
                                             <span class="CtyNme Lctn">Kazipet Railway station washroom</span>

                                            </button>
                                        
                                           
                                        </li>
                                        <li>
                                            <button class="accordion-button">
                                             <span class="CtyNme Lctn">Near police headquarters</span>
                                            </button>
                                            
                                        </li>
                                        <li>
                                            <button class="accordion-button">
                                             <span class="CtyNme Lctn">Maternity Hospital</span>
                                            </button>                                            
                                        </li>
                                        <li>
                                            <button class="accordion-button" type="button" >
                                             <span class="CtyNme Lctn">Market Place</span>
                                            </button>
                                           
                                        </li>
                                        <li>
                                            <button class="accordion-button">
                                             <span class="CtyNme Lctn">Collector Office</span>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="accordion-button">
                                             <span class="CtyNme Lctn">JP Nagar</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCTwo" aria-expanded="false"
                                    aria-controls="flush-collapseCTwo">
                                    <span class="CtyNme Lctn">Kondapur(0)</span>
                                    
                                </button>
                            </span>
                           
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCThree" aria-expanded="false"
                                    aria-controls="flush-collapseCThree">
                                    <span class="CtyNme Lctn">Madhapur(0)</span>
                                    
                                </button>
                            </span>
                          
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCFour" aria-expanded="false"
                                    aria-controls="flush-headingCFour">
                                    <span class="CtyNme Lctn">Kompally(0)</span>
                                    
                                </button>
                            </span>
                            
                        </div>
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseCFive" aria-expanded="false"
                                    aria-controls="flush-headingCFour">
                                    <span class="CtyNme Lctn">Kukatpally(0)</span>
                                    
                                </button>
                            </span>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ContainerRight">
            
        </div>
    </div>
    <div class="AppFllContainer DshbordPg">
        <div id="map" class="DshMpHldr"></div>
        <div class="MapLegends">
            <ul class="LegendsLst">
              
            </ul>
        </div>
    </div>
</body>
<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB2MBysi9kUp0sHhKkOwrAfnGJNgnNnWLQ&sensor=false">
    </script>

<script type="text/javascript">
    let map;
    const icons = {
        blue: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-BNew-Med.png",
        },
        green: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-GNew-Med.png",
        },
        orange: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-ONew-Med.png",
        },
        blue_sub: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-BAddNew-Med.png",
        },
        green_sub: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-GAddNew-Med.png",
        },
        orange_sub: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-OAddNew-Med.png",
        }

    };
    var markers = [
        {
            
            "title": 'Warangal',
            "lat": '17.9581358',
            "lng": '79.5325131',
            "description": 'Road No. 11, Perumbur,Chennai.',
            "label": { text: '6', color: 'white' },
            "type": "blue"
        }
    ];
    var markers_warangals = [
        {
            "title": 'Kazipet Railway station washroom',
            "lat": '17.9768753',
            "lng": '79.5083628',
            "description": 'Kazipet Railway station washroom,Warangal.',
            "label": { text: '4', color: 'white' },
            "type": "green_sub",
            "notificatins": "1"
            // "label":{text:'',color: 'white'},
        },
        {
            "title": 'Near police headquarters',
            "lat": '18.0270197',
            "lng": '79.5124777',
            "description": 'Near police headquarters,Warangal.',
            "type": "blue_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'}
        },
        {
            "title": 'Maternity Hospital',
            "lat": '18.0086956',
            "lng": '79.5643396',
            "description": 'Maternity Hospital,Warangal.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'},
        },
        {
            "title": 'Market Place',
            "lat": '18.0047779',
            "lng": '79.556695',
            "description": 'Market Place,Warangal.',
            "type": "green_sub",
            "notificatins": "0"
            //"label":{text:'',color: 'white'},
        }
    ];
    
    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(17.9581358, 79.5325131),
            zoom: 5,
            mapTypeControl: false,
            //draggable: false,
            scaleControl: false,
            zoomControl: false,
            //scrollwheel: false,
            navigationControl: false,
            streetViewControl: false,
            mapTypeId: "terrain"
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);

        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow();

        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            //alert(data.type);
            var marker = new google.maps.Marker({
                position: myLatlng,
                icon: icons[data.type].icon,
                map: map,
                label: data.label,
                title: data.title
            });

            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    add(data.title);
                    clearMarker(marker);
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    map.setZoom(11);
                    map.panTo(this.getPosition());
                    //infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>5</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                    //infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        function clearMarker(marker) {
            marker.setMap(null);


        }
        function add(t) {
            if (t == 'Warangal') {
                for (var i1 = 0; i1 < markers_warangals.length; i1++) {
                    var data = markers_warangals[i1];
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons[data.type].icon,
                        map: map,
                        // label: data.label ,           
                        title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                            infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>" + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'></div></div></li></ul>");
                            // infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='<?php echo base_url(); ?>HospitalAdmin/hospitalSelection' class='PrptyNme'>FirstMedic " + data.title + "</a><span class='PrptyAdd'>" + data.description + "</span><div class='PrptySbDtlsRw'><div class='DtlsHldr Estblshd'><span class='DtlTxt'>2005</span><span class='DtlTtl'>Established</span></div><div class='DtlsHldr Twrs'><span class='DtlTxt'>03</span><span class='DtlTtl'>Blocks/ Towers</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Bds'><span class='DtlTxt'>300</span><span class='DtlTtl'>Beds</span></div><div class='DtlsHldr Ntfctns'><span class='DtlTxt'>" + data.notificatins + "</span><span class='DtlTtl'>New Notifications</span></div></div></div></li></ul>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
            }
           
          

        }

    }
</script>
</html>