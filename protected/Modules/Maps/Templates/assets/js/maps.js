var myMap, myPlacemark, coords;

ymaps.ready(init);

function init() {

    myMap = new ymaps.Map('map', {
        center: [55.75358253, 37.62091000],
        zoom: 12
    });

    myMap.controls.remove('typeSelector');
    myMap.controls.remove('trafficControl');

    coords = myMap.getCenter();

    myPlacemark = new ymaps.Placemark([coords[0], coords[1]],{},{preset: 'islands#redDotIcon', draggable: true});

    myMap.geoObjects.add(myPlacemark);

    //установка начальных значений
    var mapWidth = $('#width');
    var mapHeight = $('#height');
    var mapContainer = myMap.container.getElement();
    var latitude = $('#latitude');
    var longitude = $('#longitude');
    var ptLatitude = $('#ptLatitude');
    var ptLongitude = $('#ptLongitude');

    if(mapWidth.val() && mapHeight.val()) {
        mapContainer.style.width = mapWidth.val() + 'px';
        mapContainer.style.height = mapHeight.val() + 'px';
        $('#map').width(mapWidth.val()).height(mapHeight.val());
        myMap.container.fitToViewport();
        myMap.setZoom($('#zoom').val());
        myMap.setCenter([latitude.val(), longitude.val()]);
        myPlacemark.geometry.setCoordinates([ptLatitude.val(), ptLongitude.val()]);
        coords = [ptLatitude.val(), ptLongitude.val()];
    } else {
        mapWidth.val($('#map').width());
        mapHeight.val($('#map').height());
        latitude.val(coords[0]);
        longitude.val(coords[1]);
        $('#zoom').val(myMap.getZoom());
        ptLatitude.val(coords[0]);
        ptLongitude.val(coords[1]);
    }

    myPlacemark.events.add("dragend", function (e) {
        coords = this.geometry.getCoordinates();
        savecoordinats();
    }, myPlacemark);

    myMap.events.add('click', function (e) {
        coords = e.get('coords');
        savecoordinats();
    });

    myMap.events.add('boundschange', function (event) {
        if (event.get('newZoom') != event.get('oldZoom')) {
            savecoordinats();
        }
        if (event.get('newCenter') != event.get('oldCenter')) {
            savecoordinats();
        }
    });

    //изменение размеров карты
    mapWidth.change(function () {
        $('#map').width($(this).val());
        myMap.container.fitToViewport();
    });

    mapHeight.change(function () {
        $('#map').height($(this).val());
        myMap.container.fitToViewport();
    });

}

function savecoordinats(){
    myPlacemark.geometry.setCoordinates(coords);
    var ptCoords = myPlacemark.geometry.getCoordinates();
    $('#ptLatitude').val(parseFloat(ptCoords[0]).toFixed(8));
    $('#ptLongitude').val(parseFloat(ptCoords[1]).toFixed(8));
    var zoom = myMap.getZoom();
    $('#zoom').val(zoom);
    var center = myMap.getCenter();
    $('#latitude').val(center[0].toFixed(8));
    $('#longitude').val(center[1].toFixed(8));
}