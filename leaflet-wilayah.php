
<script type="text/javascript" src="assets/geojson/wilayah.js"></script>
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

    function getDescription(feature, layer) {
        if (feature.properties) {
            var popupContent = "";
            if (feature.properties.KAB_KOTA) {
                popupContent += feature.properties.KAB_KOTA;
            }
            layer.bindPopup(popupContent);
        }
    }

    geojson = L.geoJSON(data, {
        onEachFeature: getDescription
    }).addTo(map);
</script>