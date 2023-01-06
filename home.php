<?php
// include "helper.php";

// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     $page = 'home';
// }

// $pageFile = 'pages/' . $page . '.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display:flex;
            margin-top:300px;
            justify-content:center;
            flex-direction:row
        }

        .item {
            display:flex;
            flex-direction:column
        }

        .fa-solid {
            margin: 0 20px;
        }

        .teks {
            text-align:center
        }

        a {
            text-decoration:none
        }
    </style>
</head>
<body>
<h1 style="text-align:center;margin:7px 0">GEOPORTAL DIY</h1>
    <div class="container">
        <div class="item">
            <a href=<?= getPage('wilayah') ?>><i class="fa-solid fa-map fa-5x"></i>
            <p class="teks">Wilayah</p></a>
        </div>
        <div class="item">
            <a href=<?= getPage('pemerintah') ?>><i class="fa-solid fa-building-columns fa-5x"></i>
            <p class="teks">Pemerintah</p></a>
        </div>
        
        <div class="item">
            <a href=<?= getPage('restaurant') ?>><i class="fa-solid fa-utensils fa-5x"></i>
            <p class="teks">Restaurant</p></a>
        </div>
        <div class="item">
            <a href=<?= getPage("rumah-sakit") ?>><i class="fa-solid fa-hospital fa-5x"></i>
            <p class="teks">Rumah Sakit</p></a>
        </div>
        <div class="item">
            <a href=<?= getPage('universitas') ?>><i class="fa-solid fa-school fa-5x"></i>
            <p class="teks">Universitas</p></a>
        </div>
    </div>

    <?php
    if (isset($scriptFile)) {
        include 'scripts/' . $scriptFile . '.php';
    }
    ?>
</body>
</html>