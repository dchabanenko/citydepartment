// don't forget to add gmaps-heatmap.js

$(window).ready(function() {

    var myLatlng = new google.maps.LatLng(49.8397, 23.9946);
// map options,
    var myOptions = {
        zoom: 12,
        center: myLatlng
    };
// standard map
    map = new google.maps.Map(document.getElementById("crime-map"), myOptions);

    var boundaries = district770.bounds;
    var districtPolygon = new google.maps.Polygon({
        paths: boundaries,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });
    districtPolygon.setMap(map);

    var boundaries = district771.bounds;
    var districtPolygon = new google.maps.Polygon({
        paths: boundaries,
        strokeColor: '#00FF00',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#00FF00',
        fillOpacity: 0.35
    });
    districtPolygon.setMap(map);
    var boundaries = district772.bounds;
    var districtPolygon = new google.maps.Polygon({
        paths: boundaries,
        strokeColor: '#0000FF',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#0000FF',
        fillOpacity: 0.35
    });
    districtPolygon.setMap(map);

});
