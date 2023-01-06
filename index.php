<?php
include "helper.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

$pageFile = 'pages/' . $page . '.php';
?>

<!DOCTYPE html>
<html lang="eng">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Document</title>
<?php include("layouts/head.php"); ?>

<body>
    
    <?php 
        include "layouts/nav.php"; 
        if ($page == "home") {
        } else if ($page == "wilayah") {}
        else {
            include "scripts/hitung-jarak.php";
            
        }
    
    ?>
    <div class="main">
        <?php include($pageFile); ?>
    </div>

    <?php
    if (isset($scriptFile)) {
        include 'scripts/' . $scriptFile . '.php';
    }
    ?>
</body>

</html>