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

    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    var crimes = $('.crimes-container').data('crimes');

    if ('1' != $('.crimes-container').data('heatmap')) {
        for (i = 0; i < crimes.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(crimes[i].lat, crimes[i].lng),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent('No info about this crime');
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    } else {
// heatmap layer
        heatmap = new HeatmapOverlay(map,
            {
                // radius should be small ONLY if scaleRadius is true (or small radius is intended)
                "radius": 0.007,
                "maxOpacity": 0.4,
                // scales the radius based on map zoom
                "scaleRadius": true,
                // if set to false the heatmap uses the global maximum for colorization
                // if activated: uses the data maximum within the current map boundaries
                //   (there will always be a red spot with useLocalExtremas true)
                "useLocalExtrema": true,
                // which field name in your data represents the latitude - default "lat"
                latField: 'lat',
                // which field name in your data represents the longitude - default "lng"
                lngField: 'lng',
                // which field name in your data represents the data value - default "value"
                valueField: 'count'
            }
        );

        var testData = {
            max: 500,
            data: crimes
        };

        heatmap.setData(testData);
    }

});
