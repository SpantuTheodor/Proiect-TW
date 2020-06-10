<?php

if(!isset($_COOKIE['id'])){
    header("Location: ../login/login.php");
}

class DB
{
    private static $db = NULL;
    public static function get_connnection()
    {
        if (is_null(self::$db)) {
            self::$db = new PDO('mysql:host=localhost;dbname=forg_database', 'root', '');
        }
        return self::$db;
    }
}

$id = $_COOKIE['id'];

$sql = "SELECT m.nume,m.imagine,m.categorie,m.id FROM mancare_preferata p JOIN mancare m ON p.id_mancare = m.id WHERE p.id_utilizator = :index";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'index' => "$id"
]);
$data = $cerere->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=6.0">
    <meta name="description" content="Pagina mancarurilor favorite.">
    <?php echo "<title>$_COOKIE[user]'s Favorite Food</title>";?>
    <link rel="shortcut icon" href="../home/assets/banana_de_nigga.png">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/favorite_food/favorite_food.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../logout.js"></script>
</head>
<body>
    <div id="app_content" class="container">
        <header class="nav-bar">
            <?php $us = $_COOKIE['user']; echo "<h3 id='greeting'> $us's favorite foods</h3>";?>
            <a id="logout" onclick="logout()">LOGOUT</a>
        </header>
        <div class="main_content">
            <div class="food_wrapper">
            <?php
                foreach($data as $mancare){
                    echo "<div class='favorite_food' id='fav$mancare[3]'>
                    <img class='remove_favorite_icon' src='assets/icons/x.png' alt='remove from favorite icon' style=\"height:25px;width:25px;\" onclick=\"deleteFrom('$mancare[3]');deleteJS('fav$mancare[3]')\">
                    <img class='food_pic' src='../Categories/$mancare[1]' style=\"object-fit:cover\" alt='food pic'>
                    <p class='food_title'>$mancare[0]</p>
                    <p class='food_basic_info'>$mancare[2]</p>
                    </div>";
                }
            ?>    
            </div>
        </div>
        <div class="spacer"></div>
        <!-- FOOTER START -->
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
    </div>
    <script src="../js/favorite_foods.js" async></script>
</body>
</html>