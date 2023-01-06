<script type="text/javascript" src="assets/geojson/restaurant.js"></script>
<script>
    var centerLatLng = [-7.800742,110.3715803];
    var mapOptions = {
        center: centerLatLng,
        zoom: 10
    }
    var map = L.map('map', mapOptions);

    var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    })
    tileLayer.addTo(map);

    var geojson;

    var geojsonMarkerOptions = {
        radius: 8,
        fillColor: "#ff7800",
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
    };

    function getDescription(feature, layer) {
        if (feature.properties) {
            var popupContent = "";
            if (feature.properties.name) {
                popupContent += feature.properties.name;
            }
            layer.bindPopup(popupContent);
        }
    }

    function setCircleMarker (feature, latlng) {
            return L.circleMarker(latlng, geojsonMarkerOptions);
    }

    geojson = L.geoJSON(data, {
        onEachFeature: getDescription,
        pointToLayer: setCircleMarker
    }).addTo(map);


</script>

<script>
    var marker1;
    var marker2;
    var polyline;
    var count = 0;
    function onClick(e) {
        if (count > 1) {
            alert("Anda sudah memilih dua koordinat!");
        } else {
            if (count == 0) {
                marker1 = L.marker(e.latlng);
                marker1.bindPopup("Location: " + e.latlng);
                marker1.addTo(map);
                marker1.openPopup();
                count++;
            } else {
                marker2 = L.marker(e.latlng);
                marker2.bindPopup("Location: " + e.latlng);
                marker2.addTo(map);
                marker2.openPopup();
                count++;
                var dist = marker2.getLatLng().distanceTo(marker1.getLatLng());
                document.getElementById("distance").innerHTML = "<b>Hitung Jarak:</b> " + Math.round(dist) + " m";

                var latlngs = [
                    marker1.getLatLng(),
                    marker2.getLatLng()
                ];

                polyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
            }
        }
    }
    map.on('click', onClick);

    function reset() {
        marker1.remove();
        marker2.remove();
        polyline.remove();
        count = 0;
        document.getElementById("distance").innerHTML = "<b>Hitung Jarak</b>: ";
    }
    </script>