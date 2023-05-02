//global Variables
var infoWindow = null;
var eventNameChanged = {
	"maptypechanged" : "maptypeid_changed",
	"zoomend" : "zoom_changed"
};

//Constants Start
//enum GMapPane = 01 Start
G_MAP_MAP_PANE = "0101";
G_MAP_OVERLAY_LAYER_PANE = "0102";
G_MAP_MARKER_SHADOW_PANE = "0103";
G_MAP_MARKER_PANE = "0104";
G_MAP_FLOAT_SHADOW_PANE = "0105";
G_MAP_MARKER_MOUSE_TARGET_PANE = "0106";
G_MAP_FLOAT_PANE = "0107";
//End enum GMapPane = 01
//enum GMapType = 02 Start
G_NORMAL_MAP = "0201";
G_SATELLITE_MAP = "0202";
G_AERIAL_MAP = "0203";
G_HYBRID_MAP = "0204";
G_AERIAL_HYBRID_MAP = "0205";
G_PHYSICAL_MAP = "0206";
//End enum GMapType = 02
//End Constatns

//Dummy
function GBrowserIsCompatible() {
	return true;
}

//Dummy
function GUnload() {
}

//GDownloadUrl Start

function GDownloadUrl(url, onloadFun) {

	$.ajax({
		url : url,
		success : onloadFun,
		error : function() {
			MyLogger.log('Error in GDownloadUrl and url:' + url);
		}
	});

	/*
	 $.get(url, function(data,status,xhr){
	 onloadFun(data,status);
	 }).error(function(){
	 MyLogger.log('Error in GDownloadUrl and url:'+ url);
	 });*/
}

//End GDownloadUrl

//GXml Start

function GXml() {
}

GXml.parse = function(xml) {
	MyLogger.log("GXml.parse()");
	try {
		MyLogger.log(xml);
		return xml;
		/*return $.parseXML( xml );*/
	} catch(err) {
		MyLogger.log('Error at GXml.parse and xml' + xml);
		return document.createElement('div');
	}

}
//End GXml

//GSize Start
function GSize(width, height) {
	MyLogger.log("GSize constructor()");
	return new google.maps.Size(width, height);
}

//End GSize

//GPoint Start
function GPoint(x, y) {
	MyLogger.log("GPoint Constructor()");
	return new google.maps.Point(x, y);
}

/*
GPoint.prototype.equals = function(other)
{
return this.point.equals(other.v3());
}

GPoint.prototype.toString =function()
{
return this.point.toString();
}

GPoint.prototype.v3 = function()
{
return this.point;
}*/

//End GPoint

//GLatLng Start
function GLatLng(lat, lng) {
	//MyLogger.log("GLatLng Constructor()");
	this.gLatLng = new google.maps.LatLng(Number(lat), Number(lng));
	this.x = this.gLatLng.lat();
	this.y = this.gLatLng.lng();
}

GLatLng.prototype.distanceFrom = function(otherLatlng, radius) {
	//MyLogger.log("GLatLng distanceFrom()");
	var distance = google.maps.geometry.spherical.computeDistanceBetween(this.gLatLng, otherLatlng.v3());
	return distance;
}

GLatLng.prototype.lng = function() {
	return this.gLatLng.lng();
}

GLatLng.prototype.lat = function() {
	return this.gLatLng.lat();
}
//return the v3 object
GLatLng.prototype.v3 = function() {
	return this.gLatLng;
};
//End GLatLng

//GLatLngBounds
function GLatLngBounds(sw, ne) {
	MyLogger.log("GLatLngBounds Constructor()");
	this.gLatLngBounds = new google.maps.LatLngBounds(sw.v3(), ne.v3());
}

GLatLngBounds.prototype.getSouthWest = function() {
	MyLogger.log("GLatLngBounds getSouthWest()");
	return GUtil.LatLngToGLatLng(this.gLatLngBounds.getSouthWest());
}

GLatLngBounds.prototype.getNorthEast = function() {
	MyLogger.log("GLatLngBounds getNorthEast()");
	return GUtil.LatLngToGLatLng(this.gLatLngBounds.getNorthEast());
}
//return the v3 object
GLatLngBounds.prototype.v3 = function() {
	return this.gLatLngBounds;
};
//End GLatLngBounds

//GIcon Start
function GIcon(gBaseIcon, imageUrl) {
	MyLogger.log("GIcon Constructor()");
	//todo: DEFAULT_ICON
	if (gBaseIcon) {
		this.iconSize = gBaseIcon.iconSize;
		this.iconAnchor = gBaseIcon.iconAnchor;
	}
	if (imageUrl) {
		this.image = imageUrl;
	} else {
		this.image = "http://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png";
	}
}

GIcon.prototype.getImage = function() {
	MyLogger.log("GIcon getImage()");
	var imageIcon = {
		url : this.image,
		size : this.iconSize,
		origin : new google.maps.Point(0, 0),
		anchor : this.iconAnchor
	};
	return imageIcon;
}

GIcon.prototype.getShadow = function() {
	MyLogger.log("GIcon getShadow()");
	var shadowIcon = {
		url : this.shadow,
		size : this.shadowSize,
		origin : new google.maps.Point(0, 0),
		anchor : this.iconAnchor
	};
	return shadowIcon;
}

GIcon.prototype.getshape = function() {
	MyLogger.log("GIcon getShape()");
	if (this.imageMap) {
		return {
			coord : this.imageMap,
			type : 'poly'
		};
	}
	return {};
}
//End GIcon

//Overlays Region Start
//GMarker Start
function GMarker(gLatLng, gIcon) {
	MyLogger.log("GMarker Constructor()");
	var options = {
		position : gLatLng.v3()
	}
	if (gIcon) {
		if ( gIcon instanceof GIcon) {
			options.icon = gIcon.getImage();
			options.shadow = gIcon.getShadow();
			options.shape = gIcon.getshape();
		} else {
			if (gIcon.icon) {
				//options.icon = gIcon.icon;

				options.icon = gIcon.icon.getImage();
				options.shadow = gIcon.icon.getShadow();
				options.shape = gIcon.icon.getshape();
			}
			if (gIcon.title) {
				options.title = gIcon.title;
			}
			if (gIcon.clickable) {
				options.clickable = gIcon.clickable;
			}
			if (gIcon.draggable) {
				options.draggable = gIcon.draggable;
			}
		}
	}
	this.marker = new google.maps.Marker(options);
}

GMarker.prototype.setImage = function(url) {
	MyLogger.log("GMarker setImage()");
	//todo:
	this.marker.setOptions({
		icon : url
	});
}

GMarker.prototype.getLatLng = function() {
	MyLogger.log("GMarker getLatLng()");
	return GUtil.LatLngToGLatLng(this.marker.getPosition());
}

GMarker.prototype.closeInfoWindow = function() {
	MyLogger.log("GMarker closeInfoWindow()");
	infowindow.close();
}

GMarker.prototype.openInfoWindowHtml = function(content) {
	MyLogger.log("GMarkder openInfoWindowHtml()");
	infowindow.setContent(content);
	//infowindow.setPosition(gLatlng.v3());
	infowindow.open(this.marker.getMap(), this.marker);
}

GMarker.prototype.isCustomOverlay = function() {
	MyLogger.log("GMarker isCustomOverlay()");
	return false;
}
//return the v3 object
GMarker.prototype.v3 = function() {
	return this.marker;
};
//End GMarker

//GPolyline Start
function GPolyline(glatlngs, strokeColor, strokeWeight, strokeOpacity, opts) {
	MyLogger.log("GPolyline Constructor()");
	//todo: opts
	latLngs = GUtil.GLatLngsToLatLngs(glatlngs);

	var options = {
		path : latLngs,
		strokeColor : strokeColor,
		strokeOpacity : strokeOpacity,
		strokeWeight : strokeWeight
	};
	if (opts) {
		if (opts.geodesic != undefined) {
			options.geodesic = opts.geodesic;
		}
	}
	this.polyline = new google.maps.Polyline(options);
}

GPolyline.fromEncoded = function(gOptions) {
	MyLogger.log("GPolyline fromEncoded()");
	var polylineObj = new google.maps.Polyline({
		path : google.maps.geometry.encoding.decodePath(gOptions.points),
		strokeColor : gOptions.color,
		strokeOpacity : gOptions.opacity,
		strokeWeight : gOptions.weight,
	});
	return polylineObj;
}
GPolyline.prototype.isCustomOverlay = function() {
	MyLogger.log("GPolyline isCustomOverlay");
	return false;
}
GPolyline.prototype.enableEditing = function(opts) {
	MyLogger.log("GPolyline enableEditing()");
	//todo:
	this.polyline.setEditable(true);
}
GPolyline.prototype.disableEditing = function() {
	MyLogger.log("GPolyline disableEditing()");
	//todo:
	this.polyline.setEditable(false);
}
GPolyline.prototype.deleteVertex = function(index) {
	MyLogger.log("GPolyline deleteVertex()");
	//todo:
	// I just added a limiter to stop deleting when the user has only 3 nodes left. Without it, the user can get down to just one node, and can't edit anymore:
	if (index != null && this.polyline.getPath().getLength() > 3) {
		this.polyline.getPath().removeAt(index);
	}
}
GPolyline.prototype.setStrokeStyle = function(opt) {
	//todo:
	var options = {};
	if(opt.color){
		options.strokeColor = opt.color;
	}
	if(opt.weight){
		options.strokeWeight = opt.weight;
	}
	if(opt.opacity){
		options.strokeOpacity = opt.opacity;
	}
	this.polyline.setOptions(options);
}

GPolyline.prototype.enableDrawing = function(opts) {
	//todo:
}
//return the v3 object
GPolyline.prototype.v3 = function() {
	return this.polyline;
};
//End GPolyline

//GPolygon Start
function GPolygon(glatlngs, strokeColor, strokeWeight, strokeOpacity, fillColor, fillOpacity, opts) {
	MyLogger.log("GPolygon Constructor()");
	//todo: opts
	latLngs = GUtil.GLatLngsToLatLngs(glatlngs);
	var options = {
		path : latLngs,
		strokeColor : strokeColor,
		strokeOpacity : strokeOpacity,
		strokeWeight : strokeWeight,
		fillColor : fillColor,
		fillOpacity : fillOpacity
	};
	if (opts) {
		if (opts.geodesic != undefined) {
			options.geodesic = opts.geodesic;
		}
	}
	this.polygon = new google.maps.Polygon(options);
}

GPolygon.fromEncoded = function(gOptions) {
	MyLogger.log("GPolygon fromEncoded()");
	var polygonObj = new google.maps.Polygon({
		path : google.maps.geometry.encoding.decodePath(gOptions.points),
		fillColor : gOptions.fill,
		strokeColor : gOptions.color,
		strokeOpacity : gOptions.opacity,
	});
	return polygonObj;
}

GPolygon.prototype.getArea = function() {
	MyLogger.log("GPolygon getArea()");
	//todo:
	return google.maps.geometry.spherical.computeArea(this.polygon.getPath());
}

GPolygon.prototype.deleteVertex = function(index) {
	MyLogger.log("GPolygon deleteVertex()");
	//todo:
	// I just added a limiter to stop deleting when the user has only 3 nodes left. Without it, the user can get down to just one node, and can't edit anymore:
	if (index != null && this.polygon.getPath().getLength() > 3) {
		this.polygon.getPath().removeAt(index);
	}
}

GPolygon.prototype.setStrokeStyle = function(opt) {
	//todo:
	var options = {};
	if(opt.color){
		options.strokeColor = opt.color;
	}
	if(opt.weight){
		options.strokeWeight = opt.weight;
	}
	if(opt.opacity){
		options.strokeOpacity = opt.opacity;
	}
	this.polygon.setOptions(options);
}

GPolygon.prototype.setFillStyle = function(opt) {
	//todo:
	var options = {};
	if(opt.color){
		options.fillColor = opt.color;
	}
	// if(opt.weight){
		// options.strokeWeight = opt.weight;
	// }
	if(opt.opacity){
		options.fillOpacity = opt.opacity;
	}
	this.polygon.setOptions(options);
}

GPolygon.prototype.enableDrawing = function(opts) {
	//todo:
}

GPolygon.prototype.disableEditing = function() {
	MyLogger.log("GPolygon disableEditing()");
	//todo:
	this.polygon.setEditable(false);
}

GPolygon.prototype.enableEditing = function(opts) {
	MyLogger.log("GPolygon enableEditing()");
	//todo:
	this.polygon.setEditable(true);
}

GPolygon.prototype.isCustomOverlay = function() {
	MyLogger.log("GPolygon isCustomOverlay()");
	return false;
}
//return the v3 object
GPolygon.prototype.v3 = function() {
	return this.polygon;
};
//End GPolygon
//GOverlay Start
function GOverlay() {
}

GOverlay.prototype.isCustomOverlay = function() {
	return true;
}

GOverlay.prototype.initialize = function(gMap) {
}

GOverlay.prototype.remove = function() {
}

GOverlay.prototype.copy = function() {
}

GOverlay.prototype.redraw = function(force) {
}

GOverlay.prototype.getKml = function(callbackFun) {
}

GOverlay.getZIndex = function(latitude) {
	var z = 1000 * (90 - latitude);
	return z;
}
//End GOverlay
//CustomGOverlay Start
CustomGOverlay.prototype = new google.maps.OverlayView();

function CustomGOverlay(mygOverlay, gmap) {
	MyLogger.log("CustomGOverlay Constructor()");
	this.mygOverlay = mygOverlay;
	this.gmap = gmap;
}

CustomGOverlay.prototype.draw = function() {
	MyLogger.log("CustomGOverlay draw()");
	//todo: check usage if argument value is false
	this.mygOverlay.redraw(true);
}

CustomGOverlay.prototype.onAdd = function() {
	MyLogger.log("CustomGOverlay onAdd()");
	this.gmap.setCustomOverlay(this);
	//todo: map
	this.mygOverlay.initialize(this.gmap);
}

CustomGOverlay.prototype.onRemove = function() {
	MyLogger.log("CustomGOverlay onRemove()");
	this.mygOverlay.remove();
}
//End CustomGOverlay
//End Overlays Region
//GClientGeocoder Start
function GClientGeocoder() {
	MyLogger.log("GClientGecoder Constructor()");
	this.geocoder = new google.maps.Geocoder();
}

GClientGeocoder.prototype.getLocations = function(gLatLng_address, callbackFun) {
	MyLogger.log("GClientGeocoder getLocations()");
	//todo:
	var options = {};
	if ( typeof gLatLng_address == 'string') {
		options['address'] = gLatLng_address;
	} else {
		options['location'] = gLatLng_address.v3();
	}

	this.geocoder.geocode(options, function(results, status) {

		MyLogger.log(results)

		var statusCode;
		var response = {};
		if (status == google.maps.GeocoderStatus.OK) {
			var statusCode = 200;
			MyLogger.log("countryCode: "+getGecoderResponseCountryCode(results));

			var index = 0;
			var point = results[index].geometry.location;

			var place = {};
			place["address"] = results[index].formatted_address;
			place["AddressDetails"] = {
				"Country" : {
					"CountryNameCode" : getGecoderResponseCountryCode(results)
				},
				"Accuracy" : -1
			};
			place["Point"] = {
				"coordinates" : [point.lng(), point.lat()]
			}

			response["name"] = results[index].formatted_address;
			response["Status"] = {
				"request" : "geocode",
				"code" : statusCode
			};
			response["Placemark"] = [place];
		} else {
			response["Status"] = {
				"request" : "geocode",
				"code" : status
			};
			MyLogger.log("Gecoder not found: " + status);
		}

		callbackFun(response);
	});
}
function getGecoderResponseCountryCode(results) {

	if (results[1]) {
		for (var i = 0; i < results[0].address_components.length; i++) {
			for (var b = 0; b < results[0].address_components[i].types.length; b++) {

				if (results[0].address_components[i].types[b] == "country") {
					
					country = results[0].address_components[i];
					return country.short_name;
				}
			}
		}
	}
	return "";
}

//End GClientGeocoder

//Controls Region Start
//GSmallZoomControl Start
function GSmallZoomControl() {
	MyLogger.log("GSmallZoomControl Constructor()");
	this.options = {
		zoomControl : true,
		zoomControlOptions : {
			style : google.maps.ZoomControlStyle.SMALL
		}
	};
}

GSmallZoomControl.prototype.isCustomControl = function() {
	MyLogger.log("GSmallZoomControl isCustomControl()");
	return false;
}
GSmallZoomControl.prototype.getOptions = function() {
	MyLogger.log("GSmallZoomControl getOptions()");
	return this.options;
}
//End GSmallZoomControl

//GSmallMapControl Start
function GSmallMapControl() {
	MyLogger.log("GSmallMapControl Constructor()");
	this.options = {
		zoomControl : true,
		zoomControlOptions : {
			style : google.maps.ZoomControlStyle.SMALL
		},
		panControl : true
	};
}

GSmallMapControl.prototype.isCustomControl = function() {
	MyLogger.log("GSmallMapControl isCustomControl()");
	return false;
}
GSmallMapControl.prototype.getOptions = function() {
	MyLogger.log("GSmallMapControl getOptions()");
	return this.options;
}
//End GSmallMapControl

//GMenuMapTypeControl Start
function GMenuMapTypeControl() {
	MyLogger.log("GMenuMapTypeControl Constructor()");
	this.options = {
		mapTypeControl : true,
		mapTypeControlOptions : {
			style : google.maps.MapTypeControlStyle.HORIZONTAL_BAR
		}
	};
}

GMenuMapTypeControl.prototype.isCustomControl = function() {
	MyLogger.log("GMenuMapTypeControl isCustomControl()");
	return false;
}
GMenuMapTypeControl.prototype.getOptions = function() {
	MyLogger.log("GMenuMapTypeControl getOptions()");
	return this.options;
}
//End GMenuMapTypeControl

//GMapTypeControl Start
function GMapTypeControl() {
	MyLogger.log("GMapTypeControl Constructor()");
	//todo:
	this.options = {
		mapTypeControl : true,
		mapTypeControlOptions : {
			style : google.maps.MapTypeControlStyle.HORIZONTAL_BAR
		}
	};
}

GMapTypeControl.prototype.isCustomControl = function() {
	MyLogger.log("GMapTypeControl isCustomControl()");
	return false;
}
GMapTypeControl.prototype.getOptions = function() {
	MyLogger.log("GMapTypeControl getOptions()");
	return this.options;
}
//End GMenuMapTypeControl

//GScaleControl Start
function GScaleControl() {
	MyLogger.log("GScaleControl Constructor()");
	this.options = {
		scaleControl : true,
		scaleControlOptions : {
		}
	};
}

GScaleControl.prototype.isCustomControl = function() {
	MyLogger.log("GScaleControl isCustomControl()");
	return false;
}
GScaleControl.prototype.getOptions = function() {
	MyLogger.log("GScaleControl getOptions()");
	return this.options;
}
//End GScaleControl
//End Controls Region

//Projection Start
function ChProjection(gMap) {
	this.gMap = gMap;
}

ChProjection.prototype.fromLatLngToPixel = function(gLatLng, zoomNum) {
	return this.gMap.fromLatLngToContainerPixel(gLatLng);
}
ChProjection.prototype.fromPixelToLatLng = function(gPoint, zoomNum) {
	return this.gMap.fromContainerPixelToLatLng(gPoint);
}
//End Projection

//GMapType Start
function GMapType(gMap) {
	MyLogger.log("GMapType Constructor()");
	this.gMap = gMap;
}

GMapType.prototype.getProjection = function() {
	MyLogger.log("GMapType getProjection()");
	var projection = new ChProjection(this.gMap);
	return projection;
}
GMapType.prototype.getName = function() {
	MyLogger.log("GMapType getName()");
	//todo:
	mapTypeId = this.gMap.map.getMapTypeId();

	if ( typeof mapTypeId == 'string') {
		if (mapTypeId == "ROADMAP") {
			//todo: normal
			return "Map";
		} else if (mapTypeId == "SATELLITE") {
			return "Satellite";
		} else if (mapTypeId == "HYBRID") {
			return "Hybrid";
		} else if (mapTypeId == "TERRAIN") {
			return "Physical ";
		}
	} else {
		if (mapTypeId == google.maps.MapTypeId.ROADMAP) {
			//todo: normal
			return "Map";
		} else if (mapTypeId == google.maps.MapTypeId.SATELLITE) {
			return "Satellite";
		} else if (mapTypeId == google.maps.MapTypeId.HYBRID) {
			return "Hybrid";
		} else if (mapTypeId == google.maps.MapTypeId.TERRAIN) {
			return "Physical ";
		}
	}
	MyLogger.log("unable to find and mapTypeId: " + mapTypeId);
	return "";
}
//End GMapType

//MapCanvasProjection Start
function MapCanvasProjection(gmap) {
	MyLogger.log("MapCanvasProjection Constructor");
	this.gmap = gmap;
}

MapCanvasProjection.prototype.fromLatLngToPixel = function(gLatLng, zoomNum) {
	MyLogger.log("MapCanvasProjection fromLatLngToPixel()");
	//todo:
	return this.gmap.fromLatLngToContainerPixel(gLatlng);
}
MapCanvasProjection.prototype.fromPixelToLatLng = function(point, zoomNum) {
	MyLogger.log("MapCanvasProjection fromPixelToLatLng()");
	//todo:
	return this.gmap.fromContainerPixelToLatLng(point);
}
//MapCanvasProjection
//GMap2 Start
function GMap2(domId) {
	MyLogger.log("GMap2 Constructor");
	options = {
		disableDefaultUI : true,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	this.map = new google.maps.Map(domId, options);
	this.gMapType = new GMapType(this);
	infowindow = new google.maps.InfoWindow();
}

GMap2.prototype.setCenter = function(gLatLng, zoomNum) {
	MyLogger.log("GMap2 setCenter()");
	this.map.setCenter(gLatLng.v3());
	this.map.setZoom(zoomNum);
};

GMap2.prototype.getCenter = function() {
	MyLogger.log("GMap2 getCenter()");
	return GUtil.LatLngToGLatLng(this.map.getCenter());
}

GMap2.prototype.setUIToDefault = function() {
	MyLogger.log("GMap2 setUIToDefault()");
	this.map.setOptions({
		disableDefaultUI : false,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	});
};

GMap2.prototype.enableScrollWheelZoom = function() {
	MyLogger.log("GMap2 enableScrollWheelZoom()");
	this.map.setOptions({
		scrollwheel : true
	});
}
//Not available in v3
GMap2.prototype.enableContinuousZoom = function() {
	MyLogger.log("GMap2 enableContinuousZoom()");
	// this.map.setOptions({
	// });
}

GMap2.prototype.addControl = function(controlObj) {
	MyLogger.log("GMap2 addControl()");
	/*if(controlObj.isCustomControl == 'undefined')
	 {
	 //todo:

	 }*/
	if (controlObj.isCustomControl()) {
		//todo
		MyLogger.log('not implemented')
	} else {
		MyLogger.log(controlObj.getOptions());
		this.map.setOptions(controlObj.getOptions());
	}
}
//todo: not yet initilaze the maps
GMap2.prototype.getBounds = function() {
	MyLogger.log("GMap2 getBounds()");
	return GUtil.LatLngBoundsToGLatLngBounds(this.map.getBounds());
}

GMap2.prototype.clearOverlays = function() {
	MyLogger.log("GMap2 clearOverlays()");
	//todo:
}
//todo check all types of overlays
GMap2.prototype.addOverlay = function(overlay) {
	MyLogger.log("GMap2 addOverlay()");
	if (overlay.isCustomOverlay()) {
		new CustomGOverlay(overlay, this).setMap(this.map);
	} else {
		overlay.v3().setMap(this.map);
	}
}

GMap2.prototype.setMapType = function(gMapTypeConstant) {
	MyLogger.log("GMap2 setMapType()");
	//todo:
	if (gMapTypeConstant == G_NORMAL_MAP) {
		this.map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
	} else if (gMapTypeConstant == G_SATELLITE_MAP) {
		this.map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
	} else if (gMapTypeConstant == G_HYBRID_MAP) {
		this.map.setMapTypeId(google.maps.MapTypeId.HYBRID);
	} else if (gMapTypeConstant == G_PHYSICAL_MAP) {
		this.map.setMapTypeId(google.maps.MapTypeId.TERRAIN);
	} else {
		MyLogger.log("not implemented and gMapTypeConstant: " + gMapTypeConstant);
	}

}
GMap2.prototype.getCurrentMapType = function() {
	MyLogger.log("GMap2 getCurrentMapType()");
	//todo:
	return this.gMapType;
}

GMap2.prototype.getProjection = function() {
	MyLogger.log("GMap2 getProjection()");
	return new MapCanvasProjection(this);
}

GMap2.prototype.fromContainerPixelToLatLng = function(point) {
	MyLogger.log("GMap2 fromContainerPixelToLatLng()");
	return GUtil.LatLngToGLatLng(this.customGOverlay.getProjection().fromContainerPixelToLatLng(point));
}

GMap2.prototype.fromLatLngToContainerPixel = function(gLatLng) {
	MyLogger.log("GMap2 fromLatLngToContainerPixel()");
	return this.customGOverlay.getProjection().fromLatLngToContainerPixel(gLatLng.v3());
}

GMap2.prototype.fromLatLngToDivPixel = function(gLatlng) {
	MyLogger.log("GMap2 fromLatLngToDivPixel()");
	return this.customGOverlay.getProjection().fromLatLngToDivPixel(gLatlng.v3());
}

GMap2.prototype.fromDivPixelToLatLng = function(point) {
	MyLogger.log("GMap2 fromDivPixelToLatLng()");
	return GUtil.LatLngToGLatLng(this.customGOverlay.getProjection().fromDivPixelToLatLng(point));
}

GMap2.prototype.setCustomOverlay = function(customGOverlay) {
	MyLogger.log("GMap2 setCustomOverlay()");
	this.customGOverlay = customGOverlay;
}

GMap2.prototype.getPane = function(pane) {
	MyLogger.log("GMap2 getPane()");
	/*if(this.customGOverlay == undefined)
	 {
	 MyLogger.log('customGOverlay is undefined')
	 }*/
	if (G_MAP_MAP_PANE == pane) {
		return this.customGOverlay.getPanes().mapPane;
	} else if (G_MAP_OVERLAY_LAYER_PANE == pane) {
		return this.customGOverlay.getPanes().overlayLayer;
	} else if (G_MAP_MARKER_SHADOW_PANE == pane) {
		return this.customGOverlay.getPanes().overlayShadow;
	} else if (G_MAP_MARKER_PANE == pane) {
		return this.customGOverlay.getPanes().overlayImage;
	} else if (G_MAP_FLOAT_SHADOW_PANE == pane) {
		return this.customGOverlay.getPanes().floatShadow;
	} else if (G_MAP_MARKER_MOUSE_TARGET_PANE == pane) {
		return this.customGOverlay.getPanes().overlayMouseTarget;
	} else if (G_MAP_FLOAT_PANE == pane) {
		return this.customGOverlay.getPanes().floatPane;
	}
	MyLogger.log('Pane not found and pane:' + pane);
}

GMap2.prototype.removeoverlay = function(overlay) {
	MyLogger.log("GMap2 removeoverlay()");
	overlay.setMap(null);
}

GMap2.prototype.getZoom = function() {
	this.map.getZoom();
}

GMap2.prototype.openInfoWindow = function(gLatlng, node) {
	MyLogger.log("GMap2 openInfoWindow()");
	infowindow.setContent(node);
	infowindow.setPosition(gLatlng.v3());
	infowindow.open(this.map);
}
//return the v3 object
GMap2.prototype.v3 = function() {
	return this.map;
};

GMap2.prototype.handlerFun = function(evtString, handler) {
	MyLogger.log("GMap2 handlerFun()");
	if (evtString == 'click') {
		return function(event) {
			handler(null, GUtil.LatLngToGLatLng(event.latLng));
		};
	}
	return handler;
}
//End GMap2

//GDirections start
function GDirections(map,domId){
//    gdir = new GDirections(map, document.getElementById("directions"));
	this.directionsService = new google.maps.DirectionsService();
	this.directionsDisplay = new google.maps.DirectionsRenderer();		
	this.directionsDisplay.setMap(map);
}

GDirections.prototype.load = function(from,to,locale){
  //gdir.load("from: " + fromAddress + " to: " + toAddress,
  //{ "locale": locale , "getSteps":true});
	var request = {
  origin: from, 
  destination: to,
  travelMode: google.maps.DirectionsTravelMode.DRIVING
};
  directionsService.route(request,function(response,status){
		
	});
}
//GDirection end

//GEvent Start
function GEvent() {
	
}

GEvent.addListener = function(obj, evtString, handlerFun) {
	MyLogger.log("GEvent addListener()");
	var v3EvtString = evtString;
	if (eventNameChanged[evtString]) {
		v3EvtString = eventNameChanged[evtString];
	}
	if (obj.handlerFun) {
		google.maps.event.addListener(obj.v3(), v3EvtString, obj.handlerFun(evtString, handlerFun));
	} else {
		google.maps.event.addListener(obj.v3(), v3EvtString, handlerFun);
	}

}

GEvent.callback = function(instance, method) {
	MyLogger.log("GEvent callback()");
	return function() {
		return method.apply(instance, arguments);
	};
}

GEvent.removeListener = function(handler) {
	MyLogger.log("GEvent removeListener()");
	google.maps.event.removeListener(handler);
}

GEvent.bind = function(sourc, event, obj, method) {
	MyLogger.log("GEvent bind()");
	//toddo:
}
//End GEvent

//GUtils Starts
function GUtil() {
}

GUtil.LatLngToGLatLng = function(latLng) {
	MyLogger.log("GUtil LatLngToGLatLng()");
	return new GLatLng(latLng.lat(), latLng.lng());
}

GUtil.LatLngBoundsToGLatLngBounds = function(latLngBounds) {
	MyLogger.log("GUtil LatLngBoundsToGLatLngBounds()");
	return new GLatLngBounds(GUtil.LatLngToGLatLng(latLngBounds.getSouthWest()), GUtil.LatLngToGLatLng(latLngBounds.getNorthEast()));
}

GUtil.GLatLngsToLatLngs = function(gLatlngs) {
	MyLogger.log("GUtil GLatLngsToLatLngs()");
	var latLngs = new Array();
	for (var i = 0; i < gLatlngs.length; i++) {
		latLngs[i] = gLatlngs[i].v3();
	};

	return latLngs;
}
//End GUtil

//MyLogger Starts
function MyLogger() {
}

MyLogger.log = function(value) {
}
//End MyLogger

//Custom Region Start
//ChCircle Start
function CHCircle(options, map) {

	oCircle = new google.maps.Circle(options);
	oCircle.setMap(map);
}

//End ChCircle
//End Custom Region
