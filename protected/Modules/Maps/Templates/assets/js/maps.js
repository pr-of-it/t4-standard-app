function LocationTool(map) {
    this._domView = new LocationTool.DOMView();
    this._mapView = new LocationTool.MapView(map);
    this._monitor = new ymaps.Monitor(this._mapView.state);
    this._setupMonitor();
    this._initDOMView();
}

LocationTool.prototype = {

    constructor: LocationTool,

    _initDOMView: function () {
        this._domView.render(this._mapView.state.getAll());
    },

    _setupMonitor: function () {
        this._monitor
            .add(['latitude', 'longitude', 'zoom', 'ptLatitude', 'ptLongitude'], this._onMapViewStateChange, this);
    },

    _clearMonitor: function () {
        this._monitor
            .removeAll();
    },

    _onMapViewStateChange: function (data) {
        this._domView.render(data);
    }
};

LocationTool.MapView = function (map) {
    this._map = map;
    this._updateTimeout = 10;
    this._marker = this._createDraggableMarker();
    map.geoObjects.add(this._marker);

    if($('input[name=id]').val()) {
        map.setCenter([$('#latitude').val(), $('#longitude').val()], $('#zoom').val());
        this._marker.geometry.setCoordinates([$('#ptLatitude').val(), $('#ptLongitude').val()]);
        map.container.getElement().style.width = $('#width').val() + 'px';
        map.container.getElement().style.height = $('#height').val() + 'px';
        $('#map').width($('#width').val()).height($('#height').val());
        map.container.fitToViewport();
    }

    this.state = new ymaps.data.Manager({
        latitude: map.getCenter()[0],
        longitude: map.getCenter()[1],
        zoom: map.getZoom(),
        ptLatitude: this._marker.geometry.getCoordinates()[0],
        ptLongitude:this._marker.geometry.getCoordinates()[1],
        width: map.container.getSize()[0],
        height: map.container.getSize()[1]
    });

    this._attachHandlers();
};

LocationTool.MapView.prototype = {

    constructor: LocationTool.MapView,

    _attachHandlers: function () {
        this._map.events
            .add('boundschange', this._onMapBoundsChange, this)
            .add('actiontick', this._onMapAction, this)
            .add('click', this._onClick, this)
            .add('actionbegin', this._onMapActionBegin, this)
            .add('actionend', this._onMapActionEnd, this);

        this._marker.events
            .add('drag', this._onMarkerDrag, this);
    },

    _detachHandlers: function () {
        this._marker.events
            .remove('drag', this._onMarkerDrag, this);

        this._map.events
            .remove('boundschange', this._onMapBoundsChange, this)
            .remove('actiontick', this._onMapAction, this)
            .remove('click', this._onClick, this)
            .remove('actionbegin', this._onMapActionBegin, this)
            .remove('actionend', this._onMapActionEnd, this);
    },

    _onClick: function (e) {
        this._marker.geometry.setCoordinates(e.get('coords'));
        this.state.set({
            ptLatitude: e.get('coords')[0],
            ptLongitude: e.get('coords')[1]
        });
    },

    _onMarkerDrag: function (e) {
        this.state.set({
            ptLatitude: e.get('target').geometry.getCoordinates()[0],
            ptLongitude: e.get('target').geometry.getCoordinates()[1]
        });
    },

    _onMapActionBegin: function (e) {
        if(this._intervalId) {
            return;
        }

        this._intervalId = window.setInterval(
            ymaps.util.bind(this._onMapAction, this),
            this._updateTimeout
        );
    },

    _onMapActionEnd: function (e) {
        window.clearInterval(this._intervalId);
        this._intervalId = null;
    },

    _onMapAction: function (e) {
        var state = this._map.action.getCurrentState(),
            zoom = state.zoom,
            center = this._map.options.get('projection').fromGlobalPixels(state.globalPixelCenter, zoom);
        this.state.set({
            latitude: center[0],
            longitude: center[1],
            zoom: zoom
        });
    },

    _onMapBoundsChange: function (e) {
        this.state.set({
            latitude: e.get('newCenter')[0],
            longitude: e.get('newCenter')[1],
            zoom: e.get('newZoom')
        });
    },

    _createDraggableMarker: function () {
        return new ymaps.Placemark(this._map.getCenter(), {
            hintContent: 'Перетащите метку'
        }, {
            draggable: true
        });
    }
};

LocationTool.DOMView = function () {
    this._element = $('form');
}

LocationTool.DOMView.prototype = {

    constructor: LocationTool.DOMView,

    render: function (data) {
        $.each(data, $.proxy(this._setData, this));
    },

    clear: function () {
        this._element.remove();
    },

    _setData: function (id, value) {
        switch (id) {
            case 'zoom':
            case 'width':
            case 'height':
                this._element.find('#' + id).val(value);
                break;
            default:
                this._element
                    .find('#' + id)
                    .val(Number(value).toFixed(8));
        }
    }
};

function init() {
    var myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 9
    });

    myMap.controls.remove('typeSelector');
    myMap.controls.remove('trafficControl');

    new LocationTool(myMap);

    $('#width').change(function () {
        $('#map').width($(this).val());
        myMap.container.fitToViewport();
    });

    $('#height').change(function () {
        $('#map').height($(this).val());
        myMap.container.fitToViewport();
    });
}

ymaps.ready(init);