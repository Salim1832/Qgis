<style>
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .legend {
        line-height: 18px;
        color: #555;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }
</style>
<script type="text/javascript" src="assets/geojson/pemerintah.js"></script>
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

    

    function geojsonMarkerOptions(feature) {
        return {
        radius: 8,
        fillColor: getColor(feature.properties.REMARK),
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
        };
    };
    

    function getDescription(feature, layer) {
        if (feature.properties) {
            var popupContent = "";
            if (feature.properties.REMARK) {
                popupContent += feature.properties.REMARK;
            }
            layer.bindPopup(popupContent);
        }
    }

    function setCircleMarker (feature, latlng) {
            return L.circleMarker(latlng, geojsonMarkerOptions(feature));
    }

    var legend = L.control({ position: 'bottomright' });

    legend.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'info legend'),
            grades = ["Kantor Gubernur", "Kantor Wali Kota" , "Kantor Bupati", "Kantor Camat", "Kantor Kepala Desa", "Kantor Lurah", "Kantor Polisi"],
            labels = [];

        // loop through our population intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            console.log(grades[i]);
            div.innerHTML +=
                '<i style="background: ' + getColor(grades[i]) + '"></i> ' +
                 grades[i] + "<br>";
        }

        return div;
    };

    legend.addTo(map);

    function getColor(kantor) {
        var warna = "";
        if (kantor === "Kantor Camat") {
            warna += "#FFC300";
        } else if (kantor === "Kantor Kepala Desa") {
            warna += "#DAF7A6";
        } else if (kantor === "Kantor Wali Kota") {
            warna += "#FF5733";
        } else if (kantor === "Kantor Gubernur") {
            warna += "#ff0000";
        } else if (kantor === "Kantor Polisi") {
            warna += "#a03018";
        } else if (kantor === "Kantor Lurah") {
            warna += "#3498db";
        } else if (kantor === "Kantor Bupati") {
            warna += "#82e0aa";
        }
        else {
            warna += "#000";
        }
        return warna;
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