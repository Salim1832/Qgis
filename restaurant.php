<?php
    $scriptFile = 'leaflet-restaurant';
?>
<style>
    .jarak {
        margin: 20px 20px;
        position: fixed;
        bottom: 0;
        z-index: 10000;
        padding: 10px 10px;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
    .btn {
        margin-right:130px;
    }
</style>
<h1 style="text-align:center;margin:7px 0">GEOPORTAL DIY: Restaurant</h1>

<div id="map" style="height: 800px; margin-top: 25px"></div>
<div class="jarak">
    <label id="point1"></label>
    <label id="point2"></label>
    <label id="distance"><b>Hitung Jarak:</b> </label><br>
    <button type="button" class="btn btn-primary" onClick=reset()>Reset</button>
</div>