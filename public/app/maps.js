var key = 'pk.eyJ1IjoicmluZ2dvMDciLCJhIjoiY2t4MHB2ZjJ0MHV3YzJycHo0OHhzZGIwOSJ9.odEp1QZ9gCcw9biNi2j6Tg';
var defaultLocation =  [105.2625, -5.42944]; 

mapboxgl.accessToken = key;

var currentMarkers = [];

// Initial Map
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/satellite-v9',
    center: [105.2625, -5.42944],
    zoom: 8,
    attributionControl: false,
});

// Search box 
const geocoder = new MapboxGeocoder({
    mapboxgl: mapboxgl,                                                                               
    accessToken: mapboxgl.accessToken,
    marker: false
});

geocoder.on('result', e => {
    // Remove markers
    if (currentMarkers!==null) {
        for (var i = currentMarkers.length - 1; i >= 0; i--) {
          currentMarkers[i].remove();
        }
    }  

    const marker = new mapboxgl.Marker({
    draggable: true,
    color: '#696cff'
    })
    .setLngLat(e.result.center)
    .addTo(map)

    currentMarkers.push(marker);

    marker.on('dragend',function(e){
    var lngLat = e.target.getLngLat();
    document.getElementById('lat').value = lngLat.lat;
    document.getElementById('lng').value = lngLat.lng;
    });
});

map.addControl(geocoder);

map.on('load', function(){ 
    // Set marker
    var marker = new mapboxgl.Marker({
    draggable: true,
    color: '#696cff'
    })
    .setLngLat(defaultLocation)
    .addTo(map);

    currentMarkers.push(marker);

    // Draggable marker
    function onDragEnd() {
        var lngLat = marker.getLngLat();
        document.getElementById('lat').value = lngLat.lat;
        document.getElementById('lng').value = lngLat.lng;
    }
    
    marker.on('dragend', onDragEnd);

    // Set navigation controller 
    const nav = new mapboxgl.NavigationControl();
    map.addControl(nav, 'top-left');

    map.addControl(new mapboxgl.FullscreenControl(), 'top-left');

    // Live GPS
    var geolocate = new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
            },
            trackUserLocation: true,
            showUserHeading: true
    });

    map.addControl(geolocate, 'top-left');

    geolocate.on('geolocate', locateUser);
    
    function locateUser(e) {
        document.getElementById('lat').value =  e.coords.longitude;
        document.getElementById('lng').value = e.coords.latitude;
        geolocate.off('geolocate', null);
    }

});


