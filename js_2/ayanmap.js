var address_input = document.getElementById('address');
var ul_address = document.getElementById('address_result');
var city_input = document.getElementById('city_input');
var ul_city = document.getElementById('city_result');
var lng_input = document.getElementById('lng');
var lat_input = document.getElementById('lat');
var cid_input = document.getElementById('city_id');
var region_span = document.getElementById('region');
var rules_span = document.getElementById('rules');
var step_a = document.getElementById('stepNext');
var geojsonObject;
var temp_zoom = 13;
var temp_lng = 49.7018032;
var temp_lat = 34.0878804;
var temp_feature;


function ajaxRequest() {
    var activexmodes = ["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"]; //activeX versions to check for in IE
    if (window.ActiveXObject) { //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
        for (var i = 0; i < activexmodes.length; i++) {
            try {
                return new ActiveXObject(activexmodes[i]);
            }
            catch (e) {
                //suppress error
            }
        }
    }
    else if (window.XMLHttpRequest) // if Mozilla, Safari etc
        return new XMLHttpRequest();
    else
        return false;
}

window.addEventListener("load", function () {
    // Add a keyup event listener to our input element
    city_input.addEventListener("keyup", function (event) { hinter(event, "city") });
    address_input.addEventListener("keyup", function (event) { hinter(event, "road") });
    // create one global XHR object
    // so we can abort old requests when a new one is make
    //window.hinterXHR = new XMLHttpRequest();
    window.hinterXHR = new ajaxRequest();
});

// Autocomplete for form
function hinter(event, type) {
    //key up & down
    if (event.which === 40 || event.which === 38)
        return;

    var input = event.target;
    var index = -1;
    liSelected = null;

    var mLayers = map.getLayers();
    mLayers.forEach(function (layer) {
        if (layer.get('name') == 'roadsSearched') {
            console.log(layer.get('name'));
            map.removeLayer(layer);
        }
    });

    // minimum number of characters before we start to generate suggestions
    var min_characters = 3;

    if (!isNaN(input.value) || input.value.length < min_characters) {
        ul_city.style.display = ul_address.style.display = "none";
        ul_city.innerHTML = ul_address.innerHTML = "";
        temp_feature = null;
        view.animate({
            center: [temp_lng, temp_lat],
            zoom: temp_zoom,
            duration: 1000
        });
        return;
    } else {
        window.hinterXHR.abort();
        if (type == "road") {
            if (input.value.split('-')[input.value.split('-').length - 1].length < min_characters) {
                ul_address.style.display = "none";
                ul_address.innerHTML = "";
                return;
            }

            window.hinterXHR.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {


                    var response = JSON.parse(this.responseText);
                    geojsonObject = JSON.parse(response);
                    //step 1 dont exec
                    if (false && input.value.split('-').length == 1 && cid_input.value == '379') {
                        if (geojsonObject.length > 0) {
                            ul_address.style.display = "block";
                            ul_address.innerHTML = "";
                        }
                        geojsonObject.forEach(function (item) {
                            // Create a new <option> element.
                            var li = document.createElement('li');
                            li.setAttribute("onclick", "addAddress('" + item.name + "', '" + item.lng + "', '" + item.lat + "', " + item.zoom + ", false, 'road', -1, '-1')")
                            li.setAttribute("onmouseover", "showAddress('" + item.lng + "', '" + item.lat + "', 13)")
                            //li.setAttribute("onclick", "addAddress('" + item.name + "', '" + item.lng + "', '" + item.lat + "', " + item.zoom + ", true, 'city', "+ item.id +")")
                            li.appendChild(document.createTextNode(item.name));
                            ul_address.appendChild(li);
                        });
                    } else {
                        var vectorRoadSource = new ol.source.Vector({
                            features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
                        });
                        //var vectorRoadSource = new ol.source.GeoJSON({ text: textJson });
                        var vectorLayerRoads = new ol.layer.Vector({
                            name: "roadsSearched",
                            source: vectorRoadSource,
                            style: new ol.style.Style({
                                stroke: new ol.style.Stroke({
                                    color: 'red',
                                    width: 3
                                })
                            })
                        });
                        vectorLayerRoads.setOpacity(.8);
                        map.addLayer(vectorLayerRoads);

                        if (geojsonObject.features.length > 0) {
                            ul_address.style.display = "block";
                            ul_address.innerHTML = "";
                        }

                        var polygonJson = '{"type":"FeatureCollection","totalFeatures":2,"features":[{"type":"Feature","id":"mahalat.1","geometry":{"type":"MultiPolygon","coordinates":[[[[51.53070068,35.81060791],[51.52960205,35.80841064],[51.5291748,35.80731201],[51.52740479,35.80682373],[51.52783203,35.8057251],[51.52740479,35.80462646],[51.52716064,35.80352783],[51.52648926,35.80310059],[51.52587891,35.80310059],[51.52520752,35.80267334],[51.52429199,35.80267334],[51.52410889,35.80157471],[51.52362061,35.80090332],[51.52252197,35.80023193],[51.52209473,35.79956055],[51.52142334,35.79937744],[51.52056885,35.79870605],[51.51947021,35.79693604],[51.5177002,35.79516602],[51.51068115,35.79693604],[51.50848389,35.79736328],[51.50866699,35.79937744],[51.50427246,35.80004883],[51.50738525,35.80181885],[51.51135254,35.80639648],[51.51397705,35.80859375],[51.51525879,35.80950928],[51.51617432,35.81036377],[51.51641846,35.81103516],[51.51617432,35.81188965],[51.52032471,35.81280518],[51.52081299,35.81188965],[51.52056885,35.81079102],[51.52124023,35.81060791],[51.52191162,35.81060791],[51.52209473,35.80950928],[51.52386475,35.80859375],[51.52758789,35.81188965],[51.5291748,35.81365967],[51.53045654,35.81500244],[51.53198242,35.81518555],[51.5333252,35.81610107],[51.53442383,35.81585693],[51.53399658,35.8147583],[51.5324707,35.81408691],[51.53155518,35.81390381],[51.53155518,35.81237793],[51.53070068,35.81060791]]]]},"geometry_name":"the_geom","properties":{"Id":0,"name":"شماره 2"}},{"type":"Feature","id":"mahalat.2","geometry":{"type":"MultiPolygon","coordinates":[[[[51.51245117,35.81738281],[51.51416016,35.81652832],[51.5168457,35.81695557],[51.51861572,35.81542969],[51.51879883,35.81365967],[51.51922607,35.81256104],[51.51617432,35.81188965],[51.51641846,35.81103516],[51.51550293,35.81060791],[51.51306152,35.8081665],[51.51086426,35.80596924],[51.50848389,35.80334473],[51.50756836,35.80157471],[51.5045166,35.80023193],[51.50915527,35.79937744],[51.50848389,35.79785156],[51.50805664,35.79736328],[51.50054932,35.7989502],[51.4954834,35.80065918],[51.49615479,35.80310059],[51.49725342,35.80596924],[51.49749756,35.80731201],[51.49810791,35.80859375],[51.49920654,35.80859375],[51.49969482,35.81011963],[51.50189209,35.81170654],[51.50299072,35.81237793],[51.50360107,35.81170654],[51.50518799,35.81188965],[51.50604248,35.8114624],[51.50518799,35.81347656],[51.50646973,35.81433105],[51.50866699,35.81585693],[51.51025391,35.81677246],[51.51245117,35.81738281]]]]},"geometry_name":"the_geom","properties":{"Id":0,"name":"شماره یک"}}],"crs":{"type":"name","properties":{"name":"urn:ogc:def:crs:EPSG::4326"}}}';

                        polygonJson = JSON.parse(polygonJson);
                        geojsonObject.features.forEach(function (item) {
                            // Create a new <option> element.
                            polygonJson.features.forEach(function (item1) {
                                if (turf.intersect(item1.geometry, item.geometry)) {
                                    console.log(item1.properties.name + " has intersect");
                                }
                            });

                            if (temp_feature) {
                                if (turf.intersect(item.geometry, temp_feature.geometry)) {
                                    console.log(item.properties.name + " has intersect");
                                }

                                var options = { units: 'kilometers' };
                                var distance = turf.lineOffset(item.geometry, 0, options);
                                //console.log(item.properties.name + " distance" + distance + " has distance");
                            }
                            var li = document.createElement('li');
                            var fclass = "r_style";
                            var ftype = "[کوچه]";
                            var fzoom = 15;
                            var fid = item.id;
                            switch (item.properties.fclass) {
                                case "trunk":
                                case "trunk_link":
                                {
                                    fclass = "tr_style";
                                    ftype = "[آزادراه]";
                                    fzoom = 13;
                                    forder = 2;
                                }
                                    break;
                                case "primary":
                                case "primary_link":
                                {
                                    fclass = "p_style";
                                    ftype = "[بزرگراه]";
                                    fzoom = 13;
                                    forder = 3;
                                }
                                    break;
                                case "secondary":
                                {
                                    fclass = "s_style";
                                    ftype = "[خیابان اصلی]";
                                    fzoom = 14;
                                    forder = 4;
                                }
                                    break;
                                case "tertiary":
                                {
                                    fclass = "t_style";
                                    ftype = "[خیابان فرعی]";
                                    fzoom = 14;
                                    forder = 5;
                                }
                                    break;
                                case "residential":
                                {
                                    fclass = "r_style";
                                    ftype = "[کوچه]";
                                    fzoom = 15;
                                    forder = 6;
                                }
                                    break;
                                case "polygon":
                                {
                                    fclass = "poly_style";
                                    ftype = "[محله]";
                                    fzoom = 15;
                                    fid = -1;
                                    forder = 1;
                                }
                                    break;
                                default:
                                {
                                    fclass = "poly_style";
                                    ftype = "["+(item.properties.ffclass == null ? '': item.properties.ffclass)+"]";
                                    fzoom = 15;
                                    forder = 1;
                                }
                                    break;
                            }
                            if(item.geometry.type == 'Point'){
                                li.setAttribute("onclick", "addAddress('" + item.properties.name + "', '" + item.geometry.coordinates[0] + "', '" + item.geometry.coordinates[1] + "', "+fzoom+", false, 'road', -1, '"+ fid +"')");
                                li.setAttribute("onmouseover", "showAddress('" + item.geometry.coordinates[0] + "', '" + item.geometry.coordinates[1] + "', 13)");
                            } else if(item.geometry.type == 'MultiPolygon') {
                                li.setAttribute("onclick", "addAddress('" + item.properties.name + "', '" + item.geometry.coordinates[0][0][0][0] + "', '" + item.geometry.coordinates[0][0][0][1] + "', "+fzoom+", false, 'road', -1, '"+ fid +"')");
                                li.setAttribute("onmouseover", "showAddress('" + item.geometry.coordinates[0][0][0][0] + "', '" + item.geometry.coordinates[0][0][0][1] + "', 13)");

                            } else {
                                li.setAttribute("onclick", "addAddress('" + item.properties.name + "', '" + item.geometry.coordinates[0][0][0] + "', '" + item.geometry.coordinates[0][0][1] + "', "+fzoom+", false, 'road', -1, '"+ fid +"')");
                                li.setAttribute("onmouseover", "showAddress('" + item.geometry.coordinates[0][0][0] + "', '" + item.geometry.coordinates[0][0][1] + "', 13)");
                            }
                            li.setAttribute("class", fclass);
                            li.appendChild(document.createTextNode(item.properties.name+'-'+ftype));
                            ul_address.appendChild(li);
                        });
                    }
                    sortList(ul_address);
                    ul = document.getElementById('address_result');
                }
            };
            var bbox;
            if (temp_feature) {
                bbox = turf.bbox(temp_feature.geometry);
            } else {
                bbox = map.getView().calculateExtent(map.getSize());
            }
            window.hinterXHR.open("GET", "http://185.113.56.117:8183/Service1.svc/SearchRoad?name=" +
                input.value.split('-')[input.value.split('-').length - 1].trim() +
                "&bbox=" + bbox +
                "&cityId=" + cid_input.value + "&step="+input.value.split('-').length , true);

        } else {
            window.hinterXHR.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    response = JSON.parse(response);

                    if (response.length > 0) {
                        ul_city.style.display = "block";
                        ul_city.innerHTML = "";
                    }
                    response.forEach(function (item) {
                        // Create a new <option> element.
                        var li = document.createElement('li');
                        li.setAttribute("onclick", "addAddress('" + item.name + "', '" + item.lng + "', '" + item.lat + "', " + item.zoom + ", true, 'city', " + item.id + ", -1, '-1')")
                        li.appendChild(document.createTextNode(item.name));
                        ul_city.appendChild(li);
                    });
                    ul = document.getElementById('city_result');
                }
            };
            window.hinterXHR.open("GET", "http://185.113.56.117:8183/Service1.svc/SearchCity?name=" + input.value, true);
        }
        window.hinterXHR.send();
    }
}

function addAddress(address, lng, lat, zoom, empty, type, city_id, feature_id) {
    var feature;
    if (type == "city") {
        city_input.value = address;
        cid_input.value = city_id;
        address_input.value = "";
        temp_lng = lng;
        temp_lat = lat;
        temp_zoom = zoom;
    }
    else if (empty)
        address_input.value = address + " - ";
    else {
        var address_items = address_input.value.split('-');
        var address_text = "";
        for (var i = 0; i < address_items.length - 1; i++) {
            if (address_text.length > 0)
                address_text += address_items[i].trim() + " - ";
            else
                address_text = address_items[i].trim() + " - ";
        }
        address_input.value = address_text + address + " - ";
        if( feature_id != '-1'){
            geojsonObject.features.forEach(function (item) {
                if (item.id == feature_id) {
                    console.log(item.id);
                    feature = item;
                }
            });
        }
    }

    var point = ol.proj.fromLonLat([lng, lat]);
    endPointFeature.setGeometry(new ol.geom.Point([lng, lat]));
    setRegionID(lng, lat);
    //getResellerId(lng, lat);
    if (feature && feature_id != '-1') {
        //var extentFeature = feature.getGeometry().getExtent();
        //map.getView().fitExtent(extent, map.getSize());
        //var bounds = feature.geometry;
        temp_feature = feature;
        var vectorLayer1 = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: (new ol.format.GeoJSON()).readFeatures(feature)
            })
        });
        view.fit(vectorLayer1.getSource().getExtent(), {duration: 1000});

    } else {
        if (map.getView().getZoom() > zoom)
            zoom = map.getView().getZoom();
        view.animate({
            center: [lng, lat],
            zoom: zoom,
            duration: 1000
        });
    }
    lng_input.value = lng;
    lat_input.value = lat;
    //view.setCenter(ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857'));
    //map.setView(new ol.View({ extent: mapExtent, projection: projection, center: [lng, lat], zoom: 6 }));

    ul_city.style.display = ul_address.style.display = "none";
    ul_city.innerHTML = ul_address.innerHTML = "";
    address_input.focus();

    var mLayers = map.getLayers();
    mLayers.forEach(function (layer) {
        if (layer.get('name') == 'roadsSearched') {
            console.log(layer.get('name'));
            map.removeLayer(layer);
        }
    });
}

function showAddress(lng, lat, zoom) {
    var point = ol.proj.fromLonLat([lng, lat]);
    endPointFeature.setGeometry(new ol.geom.Point([lng, lat]));
    //view.animate({
    //center: [lng, lat],
    //zoom: zoom,
    //duration: 1000
    //});
}

function getResellerId(lng, lat) {
    window.hinterXHR.abort();
    window.hinterXHR.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('reseller').innerHTML = this.responseText;
            //searchRoadByPoint([[lng], [lat]]);
        }
    };
    window.hinterXHR.open("GET", "http://185.113.56.117:8183/Service1.svc/GetResellerId?lng=" + lng + "&lat=" + lat, true);
    window.hinterXHR.send();
}

var ul = document.getElementById('city_result');
var liSelected;
var index = -1;

document.addEventListener('keydown', function (event) {
    var len = ul.getElementsByTagName('li').length - 1;
    if (event.which === 40) {
        index++;
        //down
        if (liSelected) {
            removeClass(liSelected, 'selected');
            next = ul.getElementsByTagName('li')[index];
            if (typeof next !== undefined && index <= len) {
                liSelected = next;
            } else {
                index = 0;
                liSelected = ul.getElementsByTagName('li')[0];
            }
            addClass(liSelected, 'selected');
            console.log(index);
        } else {
            index = 0;
            liSelected = ul.getElementsByTagName('li')[0];
            addClass(liSelected, 'selected');
        }
    } else if (event.which === 38) {
        //up
        if (liSelected) {
            removeClass(liSelected, 'selected');
            index--;
            console.log(index);
            next = ul.getElementsByTagName('li')[index];
            if (typeof next !== undefined && index >= 0) {
                liSelected = next;
            } else {
                index = len;
                liSelected = ul.getElementsByTagName('li')[len];
            }
            addClass(liSelected, 'selected');
        } else {
            index = 0;
            liSelected = ul.getElementsByTagName('li')[len];
            addClass(liSelected, 'selected');
        }
    } else if (event.which === 13) {
        if (liSelected) {
            liSelected.onclick();
        }
    }
}, false);

function removeClass(el, className) {
    if (el.classList) {
        el.classList.remove(className);
    } else {
        el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }
};
function addClass(el, className) {
    if (el.classList) {
        el.classList.add(className);
    } else {
        el.className += ' ' + className;
    }
    //el.scrollIntoView(true);
    el.onmouseover();
};
function sortList(ul) {
    var new_ul = ul.cloneNode(false);

    // Add all lis to an array
    var lis = [];
    for (var i = ul.childNodes.length; i--;) {
        if (ul.childNodes[i].nodeName === 'LI' && ul.childNodes[i].className == "poly_style")
            lis.push(ul.childNodes[i]);
    }
    for (var i = ul.childNodes.length; i--;) {
        if (ul.childNodes[i].nodeName === 'LI' && ul.childNodes[i].className == "tr_style")
            lis.push(ul.childNodes[i]);
    }
    for (var i = ul.childNodes.length; i--;) {
        if (ul.childNodes[i].nodeName === 'LI' && ul.childNodes[i].className == "p_style")
            lis.push(ul.childNodes[i]);
    }
    for (var i = ul.childNodes.length; i--;) {
        if (ul.childNodes[i].nodeName === 'LI' && ul.childNodes[i].className == "s_style")
            lis.push(ul.childNodes[i]);
    }
    for (var i = ul.childNodes.length; i--;) {
        if (ul.childNodes[i].nodeName === 'LI' && ul.childNodes[i].className == "t_style")
            lis.push(ul.childNodes[i]);
    }
    for (var i = ul.childNodes.length; i--;) {
        if (ul.childNodes[i].nodeName === 'LI' && ul.childNodes[i].className == "r_style")
            lis.push(ul.childNodes[i]);
    }

    // Sort the lis in descending order
    //lis.sort(function (a, b) {
    //    return parseInt(b.childNodes[0].getAttribute('order'), 10) -
    //           parseInt(a.childNodes[0].getAttribute('order'), 10);
    //});

    // Add them into the ul in order
    while (ul.childNodes.length > 0) {
        ul.removeChild(ul.childNodes[0]);
    }

    for (var i = 0; i < lis.length; i++)
        ul.appendChild(lis[i]);
    //ul.parentNode.replaceChild(new_ul, ul);)
}

//city_input.value = 'تهران - تهران';
//cid_input.value = 379;
//address_input.focus();
var bounds = [44.0331258, 25.0652748, 63.3556599, 39.796795];
var format = 'image/png';
var projection = ol.proj.get('EPSG:4326');
var projectionExtent = projection.getExtent();
var mapExtent = [44.0331258, 25.0652748, 63.3556599, 39.796795];
var matrixIds = new Array(22);

for (var z = 0; z < 22; ++z) {
    matrixIds[z] = "EPSG:4326:" + z;;
}
resolutions = [
    0.703125, 0.3515625, 0.17578125, 0.087890625,
    0.0439453125, 0.02197265625, 0.010986328125,
    0.0054931640625, 0.00274658203125, 0.001373291015625,
    6.866455078125E-4, 3.4332275390625E-4, 1.71661376953125E-4,
    8.58306884765625E-5, 4.291534423828125E-5, 2.1457672119140625E-5,
    1.0728836059570312E-5, 5.364418029785156E-6, 2.682209014892578E-6,
    1.341104507446289E-6, 6.705522537231445E-7, 3.3527612686157227E-7
];
var untiled = new ol.layer.Image({
    source: new ol.source.ImageWMS({
        ratio: 1,
        url: 'http://185.113.56.14:8082/geoserver/arak/wms',
        params: {
            'FORMAT': format,
            'VERSION': '1.1.1',
            STYLES: '',
            LAYERS: 'arak:arakmap',
        }
    })
});

var osm_layer = new ol.layer.Tile({
    source: new ol.source.OSM(),
    isBaseLayer: true
});

var wms_source = new ol.source.TileWMS(({
    url: 'http://185.113.56.14:8082/geoserver/arak/wms',
    params: { 'LAYERS': 'arak:arakmap' }
}));
var wms_Layer = new ol.layer.Tile({
    title: 'arakMap',
    source: wms_source
});
var wms_projection = new ol.proj.Projection({
    code: 'EPSG:4326',
    units: 'degrees',
    axisOrientation: 'neu',
    global: true
});
var wms_view = new ol.View({
    projection: wms_projection,
    center: [48.813908, 34.303194],
    zoom: 15,
    maxZoom: 19,
    minZoom: 11
});

var mainLayer = new ol.layer.Tile({
    source: new ol.source.WMTS({
        url: 'http://185.113.56.14:8082/geoserver/gwc/service/wmts',
        layer: 'arak:arakmap',
        matrixSet: 'EPSG:4326',
        format: 'image/png',
        projection: projection,
        tileGrid: new ol.tilegrid.WMTS({
            origin: ol.extent.getTopLeft(projectionExtent),
            resolutions: resolutions,
            matrixIds: matrixIds
        })
    })
});
var gooale_sat = new ol.layer.Tile({
    source: new ol.source.TileImage({
        projection: 'EPSG:3857',
        url: 'http://khm{0-3}.googleapis.com/kh?v=742&hl=pl&&x={x}&y={y}&z={z}'
    })
});
var gooale_map = new ol.layer.Tile({
    source: new ol.source.TileImage({
        projection: 'EPSG:3857',
        url: 'http://maps.google.com/maps/vt?pb=!1m5!1m4!1i{z}!2i{x}!3i{y}!4i256!2m3!1e0!2sm!3i375060738!3m9!2spl!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0'
    })
});
var sourceWMSSat = new ol.source.TileWMS(({
    url: 'http://185.113.56.14:8082/geoserver/arak/wms',
    params: { 'LAYERS': 'arak:arak_satellite' }
}));
var satLayer = new ol.layer.Tile({
    title: 'arakMapSat',
    source: sourceWMSSat
});
var view = new ol.View({
    extent: mapExtent,
    projection: projection,
    maxZoom: 19,
    minZoom: 1
});

var map = new ol.Map({
    layers: [satLayer],
    target: 'map',
    logo: false,
    view: view
});

mainLayer.setOpacity(0.8);
map.addLayer(mainLayer);
satLayer.setVisible(true);
map.getView().fit(bounds, map.getSize());

var state_source_wms = new ol.source.TileWMS(({
    url: 'http://185.113.56.14:8082/geoserver/wms',
    params: { 'LAYERS': 'arak:states' }
}));
var states_layer = new ol.layer.Tile({
    title: 'states_arak',
    source: state_source_wms
});
//map.addLayer(states_layer);

var pinFeatures = [];
var endPointFeature = new ol.Feature({ geometry: new ol.geom.Point([1, 1]), name: 'مرکز شهر', population: 4000, rainfall: 500 });
var endPointStyle = new ol.style.Style({ image: new ol.style.Icon(({ anchor: [0.5, 20], anchorXUnits: 'fraction', anchorYUnits: 'pixels', opacity: 0.75, src: 'http://185.113.56.117:8183/img/pin_red.png' })), zIndex: 100000 });
endPointFeature.setStyle(endPointStyle);
pinFeatures.push(endPointFeature);
var pinVectorSource = new ol.source.Vector({
    features: pinFeatures
});

var pinVectorLayer = new ol.layer.Vector({
    name: 'pin',
    source: pinVectorSource
});
map.addLayer(pinVectorLayer);

map.on('click', function (event) {
    setEndPoint(event.coordinate);
    var view = map.getView();
    var viewResolution = view.getResolution();
    var source = untiled.getSource();
    var url = source.getGetFeatureInfoUrl(
        event.coordinate, viewResolution, view.getProjection(),
        { 'INFO_FORMAT': 'application/json', 'FEATURE_COUNT': 50 });
    if (url) {
        window.hinterXHR.abort();
        window.hinterXHR.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var geojsonObject1 = JSON.parse(response);
                if (geojsonObject1.features.length > 0) {
                    ul_address.style.display = "block";
                    ul_address.innerHTML = "";
                }
                geojsonObject1.features.forEach(function (item) {
                    if (item.properties.name == '') return;
                    var li = document.createElement('li');
                    li.setAttribute("onclick", "addAddress('" + item.properties.name + "', '" + item.geometry.coordinates[0][0][0] + "', '" + item.geometry.coordinates[0][0][1] + "', 15, false, 'road', -1, '" + item.id + "')")
                    li.setAttribute("onmouseover", "showAddress('" + item.geometry.coordinates[0][0][0] + "', '" + item.geometry.coordinates[0][0][1] + "', 13)")
                    var fclass = "r_style";
                    switch (item.properties.fclass) {
                        case "trunk":
                        case "trunk_link":
                            fclass = "tr_style";
                            break;
                        case "primary":
                        case "primary_link":
                            fclass = "p_style";
                            break;
                        case "secondary":
                            fclass = "s_style";
                            break;
                        case "tertiary":
                            fclass = "t_style";
                            break;
                    }
                    li.setAttribute("class", fclass);
                    li.appendChild(document.createTextNode(item.properties.name));
                    ul_address.appendChild(li);
                });
                ul = document.getElementById('address_result');
                getResellerId(event.coordinate[0], event.coordinate[1]);
            }
        }
        window.hinterXHR.open("GET", "http://185.113.56.117:8183/Service1.svc/SearchRoadByPoint?" + url.split('&')[url.split('&').length - 1], true);
        //window.hinterXHR.send();
    }
});
function setEndPoint(coord) {
    lng_input.value = coord[0];
    lat_input.value = coord[1];
    endPointFeature.setGeometry(new ol.geom.Point(coord));
    //showDistanceFromStations(coord[0], coord[1]);
    setRegionID(coord[0], coord[1]);
}
function searchRoadByPoint(coord) {
    var view = map.getView();
    var viewResolution = view.getResolution();
    var source = untiled.getSource();
    var url = source.getGetFeatureInfoUrl(
        coord, viewResolution, view.getProjection(),
        { 'INFO_FORMAT': 'application/json', 'FEATURE_COUNT': 50 });

    if (url) {
        //console.log(url);
        //return;
        window.hinterXHR.abort();
        window.hinterXHR.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                var response = JSON.parse(this.responseText);
                var geojsonObject1 = JSON.parse(response);
                if (geojsonObject1.features.length > 0) {
                    ul_address.style.display = "block";
                    ul_address.innerHTML = "";
                }
                geojsonObject1.features.forEach(function (item) {
                    var li = document.createElement('li');
                    li.setAttribute("onclick", "addAddress('" + item.properties.name + "', '" + item.geometry.coordinates[0][0][0] + "', '" + item.geometry.coordinates[0][0][1] + "', 15, false, 'road', -1, '" + item.id + "')")
                    li.setAttribute("onmouseover", "showAddress('" + item.geometry.coordinates[0][0][0] + "', '" + item.geometry.coordinates[0][0][1] + "', 13)")
                    var fclass = "r_style";
                    switch (item.properties.fclass) {
                        case "trunk":
                        case "trunk_link":
                            fclass = "tr_style";
                            break;
                        case "primary":
                        case "primary_link":
                            fclass = "p_style";
                            break;
                        case "secondary":
                            fclass = "s_style";
                            break;
                        case "tertiary":
                            fclass = "t_style";
                            break;
                    }
                    li.setAttribute("class", fclass);
                    li.appendChild(document.createTextNode(item.properties.name));
                    ul_address.appendChild(li);
                });
                ul = document.getElementById('address_result');
            }
        }
        window.hinterXHR.open("GET", "http://185.113.56.117:8183/Service1.svc/SearchRoadByPoint?" + url.split('&')[url.split('&').length - 1], true);
        //window.hinterXHR.open("GET", "http://185.113.56.117:8183/Service1.svc/SearchRoadByPoint?BBOX=51.41667544841767,35.7469367980957,51.41775906085969,35.74802041053772", true);
        window.hinterXHR.send();
        //alert(url.split('&')[url.split('&').length - 1]);
    }
}
function changeSattelliteLayer(checkbox) {
    if (checkbox.checked)
        gooale_map.setVisible(true);
    else
        gooale_map.setVisible(false);
    //map.addLayer(stationVectorLayer);
    //map.addLayer(vehicleVectorLayer);
    //map.addLayer(routeVectorLayer);
    //map.addLayer(pinVectorLayer);

}
function changeRoadLayer(checkbox) {
    if (checkbox.checked)
        mainLayer.setVisible(true);
    else
        mainLayer.setVisible(false);
    //map.addLayer(stationVectorLayer);
    //map.addLayer(vehicleVectorLayer);
    //map.addLayer(routeVectorLayer);
    //map.addLayer(pinVectorLayer);
}
function setRegionID(lat, lon) {
    var mygetrequest = new ajaxRequest();
    mygetrequest.onreadystatechange = function () {
        if (mygetrequest.readyState == 4) {
            if (mygetrequest.status == 200 || window.location.href.indexOf("http") == -1) {
                var rules = '';
                var regionId ='-1';
                var rulesId = '-1';
                var ringId = '-1';
                var response = mygetrequest.responseText;
                response = JSON.parse(response);
                response.forEach(function (item) {
                    if(item.type == 2){
                        region_span.innerHTML = item.name;
                        regionId = item.id;
                    } else {
                        if(item.type == 1){
                            rulesId = item.id;
                            rules = item.name;
                            ringId = '-1';
                        }
                        if(item.type == 3 && rulesId =='-1'){
                            ringId = item.id;
                            rules = item.name;
                        }
                    }
                });
                if (rules == '')
                    rules_span.innerHTML = 'اطلاعاتی یافت نشد.';
                else
                    rules_span.innerHTML = rules;
                step_a.href = 'dlrules.php?rid='+regionId+'&ruid='+rulesId+'&riid='+ringId;
            } else {
                alert("An error has occured making the request");
            }
        }
    }
    var parameters = "Latitude=" + lat + "&Longitude=" + lon;
    mygetrequest.open("GET", "SetRegion.php?" + parameters, true);
    mygetrequest.send();
}
//addAddress('مرکزی - اراک', '49.6913344', '34.0956347', 14, true, 'city', 1199, -1, '-1');
addAddress('مرکزی - اراک', '49.70240592956543', '34.086713790893555', 14, true, 'city', 1199, -1, '-1');

function changeSattelliteLayer(checkbox) {
    if (checkbox.checked)
        satLayer.setVisible(true);
    else
        satLayer.setVisible(false);
    /*map.addLayer(stationVectorLayer);
    map.addLayer(vehicleVectorLayer);
    map.addLayer(routeVectorLayer);*/
    map.addLayer(pinVectorLayer);

}
function changeRoadLayer(checkbox) {
    if (checkbox.checked)
        mainLayer.setVisible(true);
    else
        mainLayer.setVisible(false);
    /*map.addLayer(stationVectorLayer);
    map.addLayer(vehicleVectorLayer);
    map.addLayer(routeVectorLayer);*/
    map.addLayer(pinVectorLayer);

}


/*function setRegionID(lat, lon) {
    var mygetrequest = new ajaxRequest();
    mygetrequest.onreadystatechange = function () {
        if (mygetrequest.readyState == 4) {
            if (mygetrequest.status == 200 || window.location.href.indexOf("http") == -1) {
                var regionId = mygetrequest.responseText;
                console.log(regionId);
                /!*let option;
                var ddlArea = document.getElementsByName('cf_1014');
                for (var x = 0; x < ddlArea[0].length; x++) {
                    if (regionName == ddlArea[0].options[x].text) {
                        ddlArea[0].selectedIndex = x;
                        $('select[name=cf_1014]').select2();
                    }
                }*!/
            } else {
                alert("An error has occured making the request");
            }
        }
    }
    var parameters = "Latitude=" + lat + "&Longitude=" + lon;
    mygetrequest.open("GET", "SetRegion.php?" + parameters, true);
    mygetrequest.send();
}*/