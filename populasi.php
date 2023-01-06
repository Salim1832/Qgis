<?php
    $scriptFile = 'leaflet-populasi';
?>
<style>
    .tahun {
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
<script>
    function leaflet_populasi(){
        pilihTahun(); 
        year();
    }
</script>
<h1 style="text-align:center;margin:7px 0" id="title">GEOPORTAL DIY: POPULASI TAHUN 2022</h1>
<div id="map" style="height: 800px; margin-top: 25px"></div>
<div class="tahun">
    <label for="cars">Pilih Tahun:</label>
    <select id="tahun" name="tahun" onchange=leaflet_populasi()>
        <option selected="selected" value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
    </select> 
</div>