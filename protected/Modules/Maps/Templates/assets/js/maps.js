var myMap, myPlacemark, coords;

ymaps.ready(init);

function init () {

    myMap = new ymaps.Map('map', {
        center: [55.753632, 37.620071],
        zoom: 12
    });

    myMap.controls.remove('typeSelector');
    myMap.controls.remove('trafficControl');

    coords = [55.753632, 37.620071];

    myPlacemark = new ymaps.Placemark([55.753632, 37.620071],{},{preset: 'islands#redDotIcon', draggable: true});

    myMap.geoObjects.add(myPlacemark);

    myPlacemark.events.add("dragend", function (e) {
        coords = this.geometry.getCoordinates();
        savecoordinats();
    }, myPlacemark);

    myMap.events.add('click', function (e) {
        coords = e.get('coords');
        savecoordinats();
    });

    var SearchControl = myMap.controls.get('searchControl');
    SearchControl.events.add("resultselect", function (e) {
        coords = SearchControl.getResultsArray()[e.get('resultIndex')].geometry.getCoordinates();
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
}

function savecoordinats (){
    myPlacemark.geometry.setCoordinates(coords);
    $('#ptLatitude').val(coords[0].toFixed(6));
    $('#ptLongitude').val(coords[1].toFixed(6));
    var zoom = myMap.getZoom();
    $('#zoom').val(zoom);
    var center = myMap.getCenter();
    $('#latitude').val(center[0].toFixed(6));
    $('#longitude').val(center[1].toFixed(6));
}