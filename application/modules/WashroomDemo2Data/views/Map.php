<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/Washroom/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/Washroom/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/Washroom/CSS/StyleSheet1.css?ver=1" rel="stylesheet" />
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
        
        <div class="ContainerRight">
        <div class="Header">
            <div class="Logo">
            </div>
            <div class="UserMenu">
              <a href="<?php echo base_url(); ?>Login/wrllogin"><img class="SgnOt" src="<?php echo base_url(); ?>asset/ambienceasset/images/MenuLogout-C.png"></a>
            </div>
          </div>
        <div id="DshBrd" class="DshbordCntr">
        <div class="DshbrdHdr">
                <div class="row SctnSlctr" style="width: 100%;">
                    <div class="col-md-3" style="width: 10%;" id="links">
                    <span class="SctnNm">
                        <a href="<?php echo site_url('WashroomDemo2Data/demoData') ?>" class="Lnk">Dashboard</a>
                    </span>
                    </div>
                    <div class="col-md-3" style="width: 10%;" id="links">
                    <span class="SctnNm">
                        <a href="<?php echo site_url('WashroomDemo2Data/getReport') ?>" class="Lnk">Reports</a>
                    </span>
                    </div>
                    <div class="col-md-3" style="width: 10%;" id="links">
                    <span class="SctnNm">
                        <a href="<?php echo site_url('WashroomDemo2Data/map') ?>" class="Lnk">MapView</a>
                    </span>
                    </div>
                     
                </div>                
               
                 <div id="alert">

                 </div>
            </div>
            
        </div>
</div>
    </div>
    <div class="AppSbHdr DshbrdMpPg" style="left: 20px; top: 70px">
        <div class="ContainerLeft" style="width:20%; min-width: 400px;">
            <div class="CtyDrpDwn MpActv">
                <span class="DrpdwnTxt">All 10 Locations</span>
                <!-- <div class="MpSrchBx">
                    <input class="form-control MpSrchInpt" type="text" placeholder="Search by area name"
                        aria-label="default input example" />
                </div> -->
                <div class="DrpDwnHldr">
                    <div class="accordion" id="accordionFlushCExample">
                        <div class="accordion-item">
                            <span class="accordion-header" id="flush-headingCOne">
                                <button class="accordion-button collapsed" type="button">
                                    <span class="CtyNme Lctn">Warangal(10)</span>
                                    
                                </button>
                            </span>
                            <div id="flush-collapseCOne">
                                <div class="accordion-body" id="addDropdown">
                                    
                                </div>
                            </div>
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2MBysi9kUp0sHhKkOwrAfnGJNgnNnWLQ&sensor=false">
    </script>

<script type="text/javascript">

var branhurl = "<?php echo base_url(); ?>WashroomDemo2Data/getBranches";
            $.ajax({
            url:branhurl,
            type : 'GET',
            async: true,
            data: {},
            success: function(data){
                var obj = JSON.parse(data);
                console.log(obj);
                dropdown(obj);
            }
            });
function dropdown(obj){
    var drop = $("#addDropdown");
    var div='';
    div+='<ul class="HsptlLst" >';
    for (var i1 = 0; i1 < obj.length; i1++) {
        var data = obj[i1];
        div+='<li><button class="accordion-button"><span class="CtyNme" onclick="showLocation('+data.stationid+','+data.lat+','+data.lng+')">' + data.title + '<span class="EstbshTxt">Since '+data.built_since+'</span></span><div class="BrfDtlHldr"><div class="DtlDv" style="width: 20%;"><div class="IcnDv"><img alt="Urinal" title="Urinal" class="IcnImg" src="<?php echo base_url(); ?>asset/Washroom/Images/Icn-UrmlTlt.svg" /></div><div class="VluDv"><span title="No. of Urinals" class="VluTxt Male">'+data.no_of_urinals_male+'</span></div></div><div class="DtlDv" style="width: 30%;"><div class="IcnDv"><img alt="Indian Seats" title="Indian Seats" class="IcnImg" src="<?php echo base_url(); ?>asset/Washroom/Images/Icn-IndnTlt.svg" /></div><div class="VluDv"><span title="Male Indian Seats" class="VluTxt Male">'+data.indian_seats_male+'</span><span  title="Female Indian Seats" class="VluTxt FeMale">'+data.indian_seats_famale+'</span></div></div><div class="DtlDv" style="width: 30%;"><div class="IcnDv"><img alt="Western Seats" title="Western Seats" class="IcnImg" src="<?php echo base_url(); ?>asset/Washroom/Images/Icn-WstrnTlt.svg" /></div><div class="VluDv"><span title="Male Western Seats" class="VluTxt Male">'+data.western_seats_male+'</span><span title="Female Western Seats" class="VluTxt FeMale">'+data.western_seats_female+'</span></div></div><div class="DtlDv" style="width: 20%;"><div class="IcnDv"><img alt="Handicapped Seats" title="Handicapped Seats" class="IcnImg" src="<?php echo base_url(); ?>asset/Washroom/Images/Icn-Hndcp.svg" /></div><div class="VluDv"><span title="No. of Handicapped Seats" class="VluTxt">'+data.handicapped_seats+'</span></div></div></div></button></li>';
    }
    div+='</ul>';
    drop.append(div);
    
}
function showLocation(stationid,lat,lng){
    var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
    var urlString = "<?php echo base_url(); ?>WashroomDemo2Data/getWashroomDemo2DataIndividual";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {stationid:stationid,date:today},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addpopup(obj,lat,lng);
          }
        });
}
function addpopup(data,lat,lng){
    const icons = {
        blue: {
            icon: "<?php echo base_url(); ?>asset/Washroom/Images/AppIcon-MapMarker-Smll.png"
        }

    };
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
        var infoWindow = new google.maps.InfoWindow();
    var myLatlng = new google.maps.LatLng(lat, lng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: icons['blue'].icon,
                        map: map,
                        // label: data.label ,           
                       // title: data.title
                    });

                    //Attach click event to the marker.
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            map.setZoom(12);
                            map.panTo(this.getPosition());
                            infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='' class='PrptyNme'>" + data.location + "<span class='EstbshTxt'>Since " + data.built_since + "</span></a><div class='PrptyOpDtls'><span title='Managed by' class='OprtrCmpny'>" + data.managed_by + "</span><span title='Operator Name' class='OprtrName'>" + data.operator_name + "</span><span title='Operator Contact' class='OprtrCntct'>+91 " + data.operator_contact + "</span></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Water"+data.water_availability+"'><span class='DtlTtl'>Water</span></div><div class='DtlsHldr Power"+data.power_supply+"'><span class='DtlTtl'>Power</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Male'><span class='DtlTxt'>" + data.footfallcountMale + "</span><span class='DtlTtl'>Footfall</span></div><div class='DtlsHldr Blank'><span class='DtlTxt'>" + data.OdourMaleLeft + "</span><span class='DtlTtl'>Odour</span></div><div class='DtlsHldr "+data.OdourMaleClean+"'><span class='DtlTtl'>" + data.OdourMaleClean + "</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Female'><span class='DtlTxt'>" + data.footfallcountfemale + "</span><span class='DtlTtl'>Footfall</span></div><div class='DtlsHldr Blank'><span class='DtlTxt'>" + data.OdourMaleRight + "</span><span class='DtlTtl'>Odour</span></div><div class='DtlsHldr "+data.OdourMaleClean+"'><span class='DtlTtl'>" + data.OdourFemaleClean + "</span></div></div><div class='PrptySbDtlsRw'></div></div></li></ul>");
                            infoWindow.open(map, marker);
                            
                        });
                    })(marker, data);
}

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
            "description": 'Warangal.',
            "label": { text: '10', color: '#ffffff' },
            "type": "blue"
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
                });
            })(marker, data);
        }
        function clearMarker(marker) {
            marker.setMap(null);


        }
        function add(t) {
            var urlString = "<?php echo base_url(); ?>WashroomDemo2Data/getBranches";
            $.ajax({
            url:urlString,
            type : 'GET',
            async: true,
            data: {},
            success: function(data){
                var obj = JSON.parse(data);
                console.log(obj);
                plotBranches(obj,t);
            }
            });
        }
        function addInnerdata(data){
            infoWindow.setContent("<ul class='PrtyDshbrdLst MpInnr'><li><div class='PrtyDshbrdDtls'><a href='' class='PrptyNme'>" + data.location + "<span class='EstbshTxt'>Since " + data.built_since + "</span></a><div class='PrptyOpDtls'><span title='Managed by' class='OprtrCmpny'>" + data.managed_by + "</span><span title='Operator Name' class='OprtrName'>" + data.operator_name + "</span><span title='Operator Contact' class='OprtrCntct'>+91 " + data.operator_contact + "</span></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Water"+data.water_availability+"'><span class='DtlTtl'>Water</span></div><div class='DtlsHldr Power"+data.power_supply+"'><span class='DtlTtl'>Power</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Male'><span class='DtlTxt'>" + data.footfallcountMale + "</span><span class='DtlTtl'>Footfall</span></div><div class='DtlsHldr Blank'><span class='DtlTxt'>" + data.OdourMaleLeft + "</span><span class='DtlTtl'>Odour</span></div><div class='DtlsHldr "+data.OdourMaleClean+"'><span class='DtlTtl'>" + data.OdourMaleClean + "</span></div></div><div class='PrptySbDtlsRw'><div class='DtlsHldr Female'><span class='DtlTxt'>" + data.footfallcountfemale + "</span><span class='DtlTtl'>Footfall</span></div><div class='DtlsHldr Blank'><span class='DtlTxt'>" + data.OdourMaleRight + "</span><span class='DtlTtl'>Odour</span></div><div class='DtlsHldr "+data.OdourMaleClean+"'><span class='DtlTtl'>" + data.OdourFemaleClean + "</span></div></div><div class='PrptySbDtlsRw'></div></div></li></ul>");
                            infoWindow.open(map, marker);
        }
        function addData(stationid) {
            var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
            var urlString = "<?php echo base_url(); ?>WashroomDemo2Data/getWashroomDemo2DataIndividual";
        $.ajax({
          url:urlString,
          type : 'GET',
          async: true,
          data: {stationid:stationid,date:today},
          success: function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            addInnerdata(obj);
          }
        });
        }
        function plotBranches(markers_warangals,t){
            if (t == 'Warangal') {
                for (var i1 = 0; i1 <= markers_warangals.length; i1++) {
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
                            addData(data.stationid);
                            
                        });
                    })(marker, data);
                }
            }

        }

    }
</script>
</html>